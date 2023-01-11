<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Country extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged();

        $this->load->model('Country_model', 'country_md');

    }

    public function index()
    {
        $data['title'] = 'Country';

        $data['lists'] = $this->country_md->select_all();

        $this->load->admin('country/index', $data);
    }

    public function create()
    {

        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('country_name', 'Country name', 'required|is_unique[country.country_name]');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');
            $this->form_validation->set_message('is_unique', 'Bu adda ölkə mövcuddur');

            if ($this->form_validation->run()) {

                $request_data = [
                    'country_name' => $this->security->xss_clean($this->input->post('country_name')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $insert_id = $this->country_md->insert($request_data);

                if ($insert_id > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');
                    redirect('backend/country/create');
                } else {
                    $this->session->set_flashdata('error_message', 'Yükləmə işləmi baş tutmadı');
                }
            }
        }

        $data['title'] = 'Create';

        $this->load->admin('country/create', $data);
    }

     public function edit($id)
    {
        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('country_name', 'Country name', 'required');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');

            if ($this->form_validation->run()) {

                $request_data = [
                    'country_name' => $this->security->xss_clean($this->input->post('country_name')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $another_id_has_mail = $this->country_md->has_country_name($id, $request_data['country_name']);

                if ($another_id_has_mail > 0) {

                    $this->session->set_flashdata('error_message', $request_data['country_name'].' mövcuddur');

                } else {

                    $affected_rows = $this->country_md->update($id, $request_data);

                    if ($affected_rows > 0) {
                        $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdi');

                        redirect('backend/country/edit/' . $id);
                    }
                }
            }
        }

        $item = $this->country_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/country');
        }

        $data['item'] = $item;

        $data['title'] = 'Country Edit';

        $this->load->admin('country/edit', $data);

    }


    public
    function delete($id)
    {
        $id = $this->security->xss_clean($id);
        $item = $this->country_md->delete($id);

        if ($item > 0) {
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/country');
    }

}
