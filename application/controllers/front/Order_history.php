<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_history extends CI_Controller
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

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $cart_products = explode(',', get_cookie('wishlist_products'));
            $data['count'] = count($cart_products);
        } else {$data['count'] = '0';}
        // ---------- End Count Wishlist --------------------


        $data['title'] = 'Order history';


        $this->load->front('include/order/order_history', $data);
    }
}
