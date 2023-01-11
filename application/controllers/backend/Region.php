<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Region extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged();

        $this->load->model('Region_model', 'region_md');
        $this->load->model('Country_model', 'country_md');

    }

    public function index()
    {
        $data['title'] = 'Country Region';

        $data['lists'] = $this->region_md->select_all();

        $this->load->admin('region/index', $data);
    }

    public function create()
    {

        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('region_name', 'Region name', 'required');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');

            if ($this->form_validation->run()) {

                $country_id = $this->security->xss_clean($this->input->post('country_name'));

                $item = $this->country_md->selectActiveDataById($country_id);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Ölkə seçilmədi');
                    redirect('backend/region/create/');;
                } else {

                    $request_data = [
                        'region_name' => $this->security->xss_clean($this->input->post('region_name')),
                        'country_id' => $country_id,
                        'status' => ($this->input->post('status') == 1) ? 1 : 0
                    ];

                    $insert_id = $this->region_md->insert($request_data);

                    if ($insert_id > 0) {
                        $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');
                        redirect('backend/region/create');
                    } else {
                        $this->session->set_flashdata('error_message', 'Yükləmə işləmi baş tutmadı');
                    }
                }
            }
        }

        $data['title'] = 'Create';
        $data['list'] = $this->country_md->selectActive();

        $this->load->admin('region/create', $data);
    }

    public function edit($id)
    {

        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('region_name', 'Region name', 'required');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');

            if ($this->form_validation->run()) {

                $country_id = $this->security->xss_clean($this->input->post('country_name'));

                $item = $this->country_md->selectActiveDataById($country_id);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Ölkə seçilmədi');
                    redirect('backend/region/edit/'.$id);
                } else {

                    $request_data = [
                        'region_name' => $this->security->xss_clean($this->input->post('region_name')),
                        'country_id' => $country_id,
                        'status' => ($this->input->post('status') == 1) ? 1 : 0
                    ];


                    $affected_rows = $this->region_md->update($id, $request_data);

                    if ($affected_rows > 0) {
                        $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                        redirect('backend/region/edit/' . $id);
                    } else {
                        $this->session->set_flashdata('error_message', 'Dəyişdirmə uğursuz oldu');
                        redirect('backend/region/edit/' . $id);
                    }
                }
            }
        }

        $item = $this->region_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/region');
        }

        $data['item'] = $item;

        $data['title'] = 'Region Edit';
        $data['list'] = $this->country_md->selectActive();

        $this->load->admin('region/edit', $data);
    }


    public function delete($id)
    {
        $id = $this->security->xss_clean($id);
        $item = $this->region_md->delete($id);

        if ($item > 0) {
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/region');
    }

}
