<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Slider_model', 'slider_md');

    }

    public function index()
    {
        $data['title'] = 'Sliders List';

        $data['lists'] = $this->slider_md->select_all();

        $this->load->admin('slider/index', $data);
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
            if (empty($_FILES["background"]["tmp_name"])) {
                $this->form_validation->set_rules('background', 'Background', 'required');
            }

            $this->form_validation->set_message('required', 'Boş keçilə bilməz');

            if ($this->form_validation->run()) {

                if ($_FILES["image"]["tmp_name"] and $_FILES["background"]["tmp_name"]) {

                    $path = 'uploads/slider/';

                    if (!file_exists("uploads")) {
                        mkdir("uploads");
                    }
                    if (!file_exists($path)) {
                        mkdir($path);
                    }

                    $allowedTypes = 'gif|jpg|png';

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');
                    $uploadBackground = uploadFile($path, $allowedTypes, 'background');

                    if ($uploadImage == false || $uploadBackground == false) {
                        redirect('backend/slider/create');
                    } else {
                        $request_data = [
                            'link' => $this->security->xss_clean($this->input->post('link')),
                            'title' => $this->security->xss_clean($this->input->post('title')),
                            'message' => $this->security->xss_clean($this->input->post('message')),
                            'description' => $this->security->xss_clean($this->input->post('description')),
                            'status' => ($this->input->post('status') == 1) ? 1 : 0,
                            'image' => $uploadImage,
                            'background' => $uploadBackground
                        ];

                        $insert_id = $this->slider_md->insert($request_data);

                        if ($insert_id > 0) {
                            $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');
                        } else {
                            if (file_exists($request_data['image'])) {
                                unlink($request_data['image']);
                            }
                            if (file_exists($request_data['background'])) {
                                unlink($request_data['background']);
                            }
                            $this->session->set_flashdata('error_message', 'Yükləmə işləmi baş tutmadı');
                        }
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Şəkil seçilmədi');
                    redirect('backend/slider/create');
                }
            }
        }

        $data['title'] = 'Create Slider';

        $this->load->admin('slider/create', $data);

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
                    'message' => $this->security->xss_clean($this->input->post('message')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $path = 'uploads/slider/';
                $allowedTypes = 'gif|jpg|png';

                if ($_FILES["image"]["tmp_name"]) {

                    $uploadImage = uploadFile($path, $allowedTypes, 'image');

                    if ($uploadImage!=false){
                        $request_data = ['image'=>$uploadImage];
                        //$unlink_image++;
                    }
                }

                if ($_FILES["background"]["tmp_name"]) {

                    $uploadBackground = uploadFile($path, $allowedTypes, 'background');

                    if ($uploadBackground!=false){
                        $request_data = ['background'=>$uploadBackground];
                        //$unlink_background++;
                    }
                }


                $old_img = $this->input->post('old_image');
                $old_background = $this->input->post('old_background');

                $affected_rows = $this->slider_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                    if ($request_data['image'] and file_exists($old_img)) {
                        unlink($old_img);
                    }

                    if ($request_data['background'] and file_exists($old_background)) {
                        unlink($old_background);
                    }

                    redirect('backend/slider/edit/' . $id);
                } else {
                    $this->session->set_flashdata('error_message', 'Yeniləmə uğursuz oldu');
                    redirect('backend/slider/edit/' . $id);
                }
            }
        }


        $item = $this->slider_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/slider');
        }

        $data['item'] = $item;

        $data['title'] = 'Edit Slider ';

        $this->load->admin('slider/edit', $data);

    }


    public function delete($id)
    {
        $id = $this->security->xss_clean($id);

        $select = $this->slider_md->selectDataById($id);
        $image = $select->image;
        $background = $select->background;

        $item = $this->slider_md->delete($id);

        if ($item > 0) {
            if (file_exists($image)) {
                unlink($image);
            }
            if (file_exists($background)) {
                unlink($background);
            }
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/slider');
    }

}