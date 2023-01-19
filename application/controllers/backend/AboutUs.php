<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged();

        $this->load->model('AboutUs_model', 'about_md');

    }

    public function index()
    {
        $id=1;
        $data['title'] = 'About Us';

        $data['about'] = $this->about_md->selectDataById($id);

        if ($this->input->post()) {

            if (!empty($data['about'])) {
                $this->edit($id);
            } else {
                $this->create();
            }
        }
        $this->load->admin('about/index', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            if (empty($_FILES["image"]["tmp_name"])) {
                $this->form_validation->set_rules('image', 'Image', 'required');
            }

            $this->form_validation->set_message('required', 'Boş keçilə bilməz');

            if ($this->form_validation->run()) {

                if ($_FILES["image"]["tmp_name"]) {

                    $path = 'uploads/aboutus_image/';

                    if (!file_exists("uploads")) {
                        mkdir("uploads");
                    }
                    if (!file_exists($path)) {
                        mkdir($path);
                    }

                    $allowedTypes = 'gif|jpg|png';

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');

                    if ($uploadImage == false) {
                        redirect('backend/aboutus');
                    } else {
                        $request_data = [
                            'title' => $this->security->xss_clean($this->input->post('title')),
                            'description' => $this->security->xss_clean($this->input->post('description')),
                            'status' => ($this->input->post('status') == 1) ? 1 : 0,
                            'image' => $uploadImage,
                        ];

                        $insert_id = $this->about_md->insert($request_data);

                        if ($insert_id > 0) {
                            $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');
                        } else {
                            if (file_exists($request_data['image'])) {
                                unlink($request_data['image']);
                            }
                            $this->session->set_flashdata('error_message', 'Yükləmə işləmi baş tutmadı');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Şəkil seçilmədi');
                    redirect('backend/aboutus');
                }
            }
        }

        redirect('backend/aboutus');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            $this->form_validation->set_message('required', 'Boş keçilə bilməz');

            if ($this->form_validation->run()) {


                $request_data = [
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $path = 'uploads/slider/';
                $allowedTypes = 'gif|jpg|png';

                if ($_FILES["image"]["tmp_name"]) {

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');

                    if ($uploadImage!=false){
                        $request_data = ['image'=>$uploadImage];
                    }
                }


                $old_img = $this->input->post('old_image');

                $affected_rows = $this->about_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                    if ($request_data['image'] and file_exists($old_img)) {
                        unlink($old_img);
                    }

                    redirect('backend/aboutus/');
                } else {
                    $this->session->set_flashdata('error_message', 'Yeniləmə uğursuz oldu');
                    redirect('backend/aboutus/');
                }
            }
        }

        redirect('backend/aboutus/');
    }
}