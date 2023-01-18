<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Blog_model', 'blog_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Category_model', 'category_md');

    }

    public function index($url)
    {
        $slug = $this->security->xss_clean($url);

        $id = $this->blog_md->selectSlug($slug)->id;

        if ($id==null) {
            redirect('blog/');
        }

        $data['title'] = 'Blog_detail';
        $data['blog'] = $this->blog_md->selectDataById($id);
        $data['latestProduct'] = $this->product_md->product_mainImage(4);
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->main([
            'include/blog/latest_product',
            'include/blog/blog_detail'
        ], $data);
    }
}
