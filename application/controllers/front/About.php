<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

       $this->load->model('Category_model', 'categories_md');

    }

    public function index()
    {
        $data['title'] = 'About';

        $data['categories'] = category_tree($this->categories_md->select_all());

        $this->load->front('include/information/about', $data);
    }
}
