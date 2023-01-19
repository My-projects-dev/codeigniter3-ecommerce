<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Faq_model', 'faq_md');
        $this->load->model('Category_model', 'categories_md');
    }

    public function index()
    {
        $data['title'] = 'FAQ';
        $data['faq'] = $this->faq_md->select_all();
        $data['categories'] = category_tree($this->categories_md->select_all());

        $this->load->front('include/information/faq', $data);
    }
}
