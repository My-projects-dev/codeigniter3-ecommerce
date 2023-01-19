<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged();

        $this->load->model('Faq_model', 'faq_md');

    }

    public function index()
    {
        $data['title'] = 'Faq List';

        $data['lists'] = $this->faq_md->select_all();

        $this->load->admin('faq/index', $data);
    }

    public function create()
    {
        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('question', 'Question', 'required|is_unique[faq.question]');
            $this->form_validation->set_rules('answer', 'Answer', 'required');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');
            $this->form_validation->set_message('is_unique', 'Bu sual mövcuddur');

            if ($this->form_validation->run()) {

                $request_data = [
                    'question' => $this->security->xss_clean($this->input->post('question')),
                    'answer' => $this->security->xss_clean($this->input->post('answer')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];


                $insert_id = $this->faq_md->insert($request_data);

                if ($insert_id > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');
                } else {
                    $this->session->set_flashdata('error_message', 'Yükləmə işləmi baş tutmadı');
                }
            }
        }

        $data['title'] = 'Create Faq';

        $this->load->admin('faq/create', $data);

    }

    public function edit($id)
    {

        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('question', 'Question', 'required');
            $this->form_validation->set_rules('answer', 'Answer', 'required');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');

            if ($this->form_validation->run()) {

                $request_data = [
                    'question' => $this->security->xss_clean($this->input->post('question')),
                    'answer' => $this->security->xss_clean($this->input->post('answer')),
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $another_id_has_question = $this->faq_md->another_id_has_question($id, $request_data['question']);

                if ($another_id_has_question > 0) {

                    $this->session->set_flashdata('error_message', $request_data['question'] . ' adlı açar mövcuddur');

                } else {

                    $affected_rows = $this->faq_md->update($id, $request_data);

                    if ($affected_rows > 0) {
                        $this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdirildi');

                        redirect('backend/faq/edit/' . $id);
                    } else {
                        $this->session->set_flashdata('error_message', 'Dəyişmə uğursuz oldu');
                        redirect('backend/faq/edit/' . $id);
                    }
                }


            }
        }

        $item = $this->faq_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/faq');
        }

        $data['item'] = $item;

        $data['title'] = 'Edit faq';

        $this->load->admin('faq/edit', $data);

    }


    public function delete($id)
    {
        $id = $this->security->xss_clean($id);
        $item = $this->faq_md->delete($id);

        if ($item > 0) {
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/faq');
    }

}