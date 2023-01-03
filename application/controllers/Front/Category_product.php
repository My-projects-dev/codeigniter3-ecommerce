<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_product extends CI_Controller
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
            'include/category_product/shop_by',
            'include/category_product/latest_product',
            'include/category_product/category_product',
        ], $data);
    }
}
