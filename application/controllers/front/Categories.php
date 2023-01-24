<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Category_model', 'categories_md');

    }

    public function index()
    {
        // ---------- Count Wishlist --------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['count'] = $this->wishlist_md->wishlistCount($userId);

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $cart_products = explode(',', get_cookie('wishlist_products'));
            $data['count'] = count($cart_products);
        } else {
            $data['count'] = '0';
        }
        // ---------- End Count Wishlist --------------------


        $data['title'] = 'Categories';
        $data['categories'] = category_tree($this->categories_md->select_all());
        $data['category'] = $this->categories_md->selectAll();

        $this->load->front('include/categories/categories', $data);
    }
}
