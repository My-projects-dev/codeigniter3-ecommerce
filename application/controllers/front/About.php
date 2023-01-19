<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

       $this->load->model('Category_model', 'categories_md');
       $this->load->model('AboutUS_model', 'about_md');

    }

    public function index()
    {
        $data['title'] = 'About Us';

        $data['categories'] = category_tree($this->categories_md->select_all());
        $data['about'] = $this->about_md->selectActiveDataById(1);

        $this->load->front('include/information/about', $data);
    }
}
