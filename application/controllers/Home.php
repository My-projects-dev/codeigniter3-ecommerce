<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Category_model', 'category_md');
        $this->load->model('Slider_model', 'slider_md');
        $this->load->model('Banner_model', 'banner_md');
        $this->load->model('Brands_model', 'brand_md');
    }

    public function index()
    {
        $data['title'] = 'Home';


        $data['categories'] = category_tree($this->category_md->select_all());
        $data['sliders'] = $this->slider_md->selectActive();
        $data['banners'] = $this->banner_md->selectActiveLimit(4);
        $data['brands'] = $this->brand_md->select_all_active();

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
