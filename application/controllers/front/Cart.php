<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Category_model', 'category_md');

    }

    public function index()
    {
        $data['title'] = 'Cart';
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('include/shopping/cart', $data);
    }
}
