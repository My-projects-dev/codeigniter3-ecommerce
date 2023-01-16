<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model', 'users_md');
        $this->load->model('Category_model', 'category_md');
    }

    public function index()
    {
        no_user_logged();

        if ($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Şifrə', 'required');

            $this->form_validation->set_message('required', '{field} boş keçilə bilməz');
            $this->form_validation->set_message('valid_email', '{field} adresi doğru deyil');
            if ($this->form_validation->run()) {

                $request_data = [
                    'email' => $this->security->xss_clean($this->input->post('email')),
                    'password' => md5($this->input->post('password'))
                ];

                $data['user'] = $this->users_md->loggedin($request_data['email'], $request_data['password']);

                if ($data['user']) {
                    $this->session->set_flashdata('success_message', 'Success');
                    $this->session->set_userdata('user', $data['user']);
                    $this->session->set_userdata('userloggedin', 1);
                    redirect('order_history');
                } else {
                    $this->session->set_flashdata('error_message', 'Şifrə və ya meil yanlışdır');
                    redirect('login');
                }
            }
        }

        $data['title'] = 'Login';
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('login', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('userloggedin');

        redirect('home');
    }
}
