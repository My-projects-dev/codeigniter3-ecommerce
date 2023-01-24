<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Products_model', 'product_md');
    }

    public function index()
    {
        $data['wishlist'] = [];
        $productId = [];

        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;

            $wishlist = $this->wishlist_md->selectProductId($userId);

            foreach ($wishlist as $key => $value) {
                array_push($productId, $value['product_id']);
            }

            if (!empty($productId)) {
                $data['wishlist'] = $this->product_md->brandImageProduct($productId);
            }

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $wishlist_products = explode(',', get_cookie('wishlist_products'));

            $data['wishlist'] = $this->product_md->brandImageProduct($wishlist_products);
        }


        // ---------- Count Wishlist --------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['count'] = $this->wishlist_md->wishlistCount($userId);

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $cart_products = explode(',', get_cookie('wishlist_products'));
            $data['count'] = count($cart_products);
        } else {$data['count'] = '0';}
        // ---------- End Count Wishlist --------------------


        $data['title'] = 'Wishlist';

        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('include/shopping/wishlist', $data);
    }


    public function add_to_wish_list()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->security->xss_clean($this->input->post('id'));

            $product = $this->product_md->selectDataById($id);
            if (!empty($product)) {
                if ($this->session->has_userdata('userloggedin')) {

                    $user = $this->session->userdata("user");
                    $hasProduct = $this->wishlist_md->hasProduct($user->id, $id);

                    if (empty($hasProduct)) {

                        $data = [
                            'user_id' => $user->id,
                            'product_id' => $id
                        ];

                        $this->wishlist_md->insert($data);
                    }

                } elseif (!empty(get_cookie('wishlist_products'))) {
                    $wishlist_products = explode(',', get_cookie('wishlist_products'));
                    array_push($wishlist_products, $id);
                    $wishlist_products = array_unique($wishlist_products);
                    $wishlist_product = implode(',', $wishlist_products);
                    set_cookie('wishlist_products', $wishlist_product, 86400);
                } else {
                    $wishlist_products[] = $id;
                    $wishlist_product = implode(',', $wishlist_products);
                    set_cookie('wishlist_products', $wishlist_product, 86400);
                }
            }
        }
    }


        public function delete($productId)
    {
        $productId = $this->security->xss_clean($productId);

        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;

            $item = $this->wishlist_md->delete($productId, $userId);

            if ($item > 0) {
                $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
            } else {
                $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
            }
        } elseif (!empty(get_cookie('wishlist_products'))) {

            $wishlist_products = explode(',', get_cookie('wishlist_products'));
            if (in_array($productId, $wishlist_products)) {
                $wishlist_products = array_diff($wishlist_products, [$productId]);
                $wishlist_product = implode(',', $wishlist_products);
                set_cookie('wishlist_products', $wishlist_product, 86400);
            }
        }
        redirect('wishlist');
    }
}
