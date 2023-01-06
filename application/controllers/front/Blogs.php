<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admins_model', 'admins_md');

    }

    public function index()
    {
        $data['title'] = 'Admins List';

        $data['lists'] = $this->admins_md->select_all();

        $this->load->main([
            'include/blog/blog_category',
            'include/blog/latest_product',
            'include/blog/blogs',
        ], $data);
    }
}
