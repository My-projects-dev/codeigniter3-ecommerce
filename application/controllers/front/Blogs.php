<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Blog_model', 'blog_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Category_model', 'category_md');
    }

    public function index()
    {
        $data['title'] = 'Blogs';
        $data['blogs'] = $this->blog_md->selectActive();
        $data['latestProduct'] = $this->product_md->product_mainImage(4);
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->main([
            'include/blog/latest_product',
            'include/blog/blogs',
        ], $data);
    }
}
