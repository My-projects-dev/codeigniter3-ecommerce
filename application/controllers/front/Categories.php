<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Category_model', 'categories_md');

    }

    public function index()
    {
        $data['title'] = 'Categories';
        $data['categories'] = category_tree($this->categories_md->select_all());
        $data['category'] = $this->categories_md->selectAll();

        $this->load->front('include/categories/categories', $data);
    }
}
