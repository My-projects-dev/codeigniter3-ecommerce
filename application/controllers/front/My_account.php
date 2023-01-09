<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admins_model', 'admins_md');

    }

    public function index()
    {
        $data['title'] = 'My Account';

        $data['lists'] = $this->admins_md->select_all();

        $this->load->front('include/myaccount/my_account', $data);
    }
}
