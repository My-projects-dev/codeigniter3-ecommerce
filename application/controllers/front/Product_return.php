<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_return extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Wishlist_model', 'wishlist_md');

    }

    public function index()
    {
        // ---------- Count Wishlist --------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['count'] = $this->wishlist_md->wishlistCount($userId);

        } elseif (!empty(get_cookie('cart_products'))) {
            $cart_products = explode(',', get_cookie('cart_products'));
            $data['count'] = count($cart_products);
        } else {$data['count'] = '0';}
        // ---------- End Count Wishlist --------------------


        $data['title'] = 'Product return';

        $data['lists'] = $this->admins_md->select_all();

        $this->load->front('include/myaccount/product_return', $data);
    }
}
