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
        $this->load->model('Wishlist_model', 'wishlist_md');

    }

    public function index($url)
    {
        // ---------- Count Wishlist --------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['count'] = $this->wishlist_md->wishlistCount($userId);

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $cart_products = explode(',', get_cookie('wishlist_products'));
            $data['count'] = count($cart_products);
        } else {$data['count'] = '0';}
        // ---------- End Count Wishlist --------------------


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
