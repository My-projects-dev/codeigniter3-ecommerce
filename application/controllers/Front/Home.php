<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
            'include/home/slider',
            'include/home/banner',
            'include/home/hot_deals',
            'include/home/best_sellers',
            'include/home/first_three_category_products',
            'include/home/media',
            'include/home/brands',
        ], $data);
    }
}
