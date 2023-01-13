<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Banner_model', 'banner_md');

    }

    public function index()
    {
        $data['title'] = 'Banners List';

        $data['lists'] = $this->banner_md->select_all();

        $this->load->admin('banner/index', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');

            $this->form_validation->set_message('required', 'Boş keçilə bilməz');

            if ($this->form_validation->run()) {

                if ($_FILES["image"]["tmp_name"]) {

                    $path = 'uploads/banner/';
                    $allowedTypes = 'gif|jpg|png';

                    if (!file_exists("uploads")) {
                        mkdir("uploads");
                    }
                    if (!file_exists($path)) {
                        mkdir($path);
                    }

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');

                    if ($uploadImage == false) {
                        redirect('backend/banner/create');
                    } else {
                        $request_data = [
                            'link' => $this->security->xss_clean($this->input->post('link')),
                            'title' => $this->security->xss_clean($this->input->post('title')),
                            'description' => $this->security->xss_clean($this->input->post('description')),
                            'status' => ($this->input->post('status') == 1) ? 1 : 0,
                            'image' => $uploadImage,
                        ];

                        $insert_id = $this->banner_md->insert($request_data);

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
                    redirect('backend/banner/create');
                }
            }
        }

        $data['title'] = 'Create Banner';

        $this->load->admin('banner/create', $data);

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
                    'link' => $this->security->xss_clean($this->input->post('link')),
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $path = 'uploads/banner/';
                $allowedTypes = 'gif|jpg|png';

                if ($_FILES["image"]["tmp_name"]) {

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');

                    if ($uploadImage!=false){
                        $request_data = ['image'=>$uploadImage];
                        //$unlink_image++;
                    }
                }


                $old_img = $this->input->post('old_image');

                $affected_rows = $this->banner_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                    if ($request_data['image'] and file_exists($old_img)) {
                        unlink($old_img);
                    }

                    redirect('backend/banner/edit/' . $id);
                } else {
                    $this->session->set_flashdata('error_message', 'Yeniləmə uğursuz oldu');
                    redirect('backend/banner/edit/' . $id);
                }
            }
        }


        $item = $this->banner_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/banner');
        }

        $data['item'] = $item;

        $data['title'] = 'Edit Banner ';

        $this->load->admin('banner/edit', $data);

    }


    public function delete($id)
    {
        $id = $this->security->xss_clean($id);

        $select = $this->banner_md->selectDataById($id);
        $image = $select->image;

        $item = $this->banner_md->delete($id);

        if ($item > 0) {
            if (file_exists($image)) {
                unlink($image);
            }
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/banner');
    }

}