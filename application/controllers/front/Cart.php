<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Cart_model', 'cart_md');
    }

    public function index()
    {
        $data['cart'] = [];
        $product = [];

        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['cart'] = $this->cart_md->selectProduct($userId);
            $data['total'] = $this->cart_md->total_amount($userId)[0]['total'];
        } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {
            $total_amount = [];
            $cart_products = explode(',', get_cookie('cart_products'));
            $cart_quantities = explode(',', get_cookie('cart_quantities'));

            foreach ($cart_products as $key => $value) {
                $product = $this->product_md->brandImageProduct($value);
                $data['cart'] = (object)array_merge((array)$data['cart'], (array)$product);
            }

            foreach ($data['cart'] as $key => $value) {
                $value->amount = $cart_quantities[$key];
                $total = $value->amount * $value->sales_prices;
                array_push($total_amount, $total);
            }

            $data['total'] = array_sum($total_amount);
        }
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

        $data['title'] = 'Cart';
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('include/shopping/cart', $data);
    }


    public function update_quantity($id)
    {
        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);
            $userId = $this->session->userdata("user")->id;

            $this->load->library('form_validation');

            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|integer|greater_than[0]');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');
            $this->form_validation->set_message('integer', 'Yalnızca tam ədəd girilə bilər');
            $this->form_validation->set_message('greater_than', 'Sıfırdan böyük ədəd girin');

            if ($this->form_validation->run()) {
                $quantity = $this->security->xss_clean($this->input->post('quantity'));
                if ($this->session->has_userdata('userloggedin')) {
                    $request_data = ['quantity' => $quantity];
                    $affected_rows = $this->cart_md->update_quantity($userId, $id, $request_data);

                    if ($affected_rows > 0) {
                        //$this->session->set_flashdata('success_message', 'Məlumat uğurla dəyişdi');
                        redirect('cart');
                    } else {
                        $this->session->set_flashdata('error_message', 'Dəyişmə uğursuz oldu');
                        redirect('cart');
                    }
                } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {

                    $cart_products = explode(',', get_cookie('cart_products'));
                    $cart_quantities = explode(',', get_cookie('cart_quantities'));
                    $combine = array_combine($cart_products, $cart_quantities);
                    if (array_key_exists($id, $combine)) {
                        $combine[$id] = $quantity;
                        $cart_products = array_keys($combine);
                        $cart_quantities = array_values($combine);
                        $cart_product = implode(',', $cart_products);
                        $cart_quantity = implode(',', $cart_quantities);
                        set_cookie('cart_products', $cart_product, 86400);
                        set_cookie('cart_quantities', $cart_quantity, 86400);
                    }
                }
            }
        }
        redirect('cart');
    }

    public function add_cart($productId)
    {
        $productId = $this->security->xss_clean($productId);
        $product = $this->product_md->selectDataById($productId);
        if (!empty($product)) {
            if ($this->session->has_userdata('userloggedin')) {
                $userId = $this->session->userdata("user")->id;
                $hasProduct = $this->cart_md->hasProduct($userId, $productId);

                if (empty($hasProduct)) {
                    $data = [
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'quantity' => 1,
                    ];

                    $insertId = $this->cart_md->insert($data);
                    if ($insertId > 0) {
                        $this->session->set_flashdata('success_message', 'Karta əlavə edildi');
                    } else {
                        $this->session->set_flashdata('error_message', 'Karta əlavə etmək mümkün olmadı');
                    }
                }
            } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {

                $cart_products = explode(',', get_cookie('cart_products'));
                $cart_quantities = explode(',', get_cookie('cart_quantities'));
                $combine = array_combine($cart_products, $cart_quantities);

                if (array_key_exists($productId, $combine)) {
                    $combine[$productId] += 1;
                    $cart_products = array_keys($combine);
                    $cart_quantities = array_values($combine);
                } else {
                    array_push($cart_products, $productId);
                    array_push($cart_quantities, 1);
                }

                $cart_product = implode(',', $cart_products);
                $cart_quantity = implode(',', $cart_quantities);
                set_cookie('cart_products', $cart_product, 86400);
                set_cookie('cart_quantities', $cart_quantity, 86400);
            } else {
                $cart_products[] = $productId;
                $cart_quantities[] = 1;
                $cart_product = implode(',', $cart_products);
                $cart_quantity = implode(',', $cart_quantities);
                set_cookie('cart_products', $cart_product, 86400);
                set_cookie('cart_quantities', $cart_quantity, 86400);
            }
            redirect('cart');
        } else {
            $this->session->set_flashdata('error_message', 'Məhsul tapılmadı');
            redirect('wishlist');
        }
    }


    public
    function add_to_cart()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->security->xss_clean($this->input->post('id'));
            $quantity = $this->security->xss_clean($this->input->post('quantity'));

            $product = $this->product_md->selectDataById($id);
            if (!empty($product)) {
                if ($this->session->has_userdata('userloggedin')) {
                    $userId = $this->session->userdata("user")->id;
                    $hasProduct = $this->cart_md->hasProduct($userId, $id);

                    if (empty($hasProduct)) {
                        $data = [
                            'user_id' => $userId,
                            'product_id' => $id,
                            'quantity' => $quantity
                        ];

                        $this->cart_md->insert($data);

                    } else {
                        $quantity += $hasProduct->quantity;
                        $data = ['quantity' => $quantity];
                        $this->cart_md->update_quantity($userId, $id, $data);
                    }
                } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {

                    $cart_products = explode(',', get_cookie('cart_products'));
                    $cart_quantities = explode(',', get_cookie('cart_quantities'));

                    $combine = array_combine($cart_products, $cart_quantities);

                    if (array_key_exists($id, $combine)) {
                        $combine[$id] += $quantity;
                        $cart_products = array_keys($combine);
                        $cart_quantities = array_values($combine);
                    } else {
                        array_push($cart_products, $id);
                        array_push($cart_quantities, $quantity);
                    }

                    $cart_product = implode(',', $cart_products);
                    $cart_quantity = implode(',', $cart_quantities);

                    set_cookie('cart_products', $cart_product, 86400);
                    set_cookie('cart_quantities', $cart_quantity, 86400);
                } else {
                    $cart_products[] = $id;
                    $cart_quantities[] = $quantity;
                    $cart_product = implode(',', $cart_products);
                    $cart_quantity = implode(',', $cart_quantities);
                    set_cookie('cart_products', $cart_product, 86400);
                    set_cookie('cart_quantities', $cart_quantity, 86400);
                }
                echo json_encode(['products' => get_cookie('cart_products')]);
                echo json_encode(['quantities' => get_cookie('cart_quantities')]);
            }
        }
    }

    public
    function delete($productId)
    {
        $productId = $this->security->xss_clean($productId);

        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;

            $item = $this->cart_md->delete($productId, $userId);

            if ($item > 0) {
                $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
            } else {
                $this->session->set_flashdata('error_message', 'Silinmək mümkün olmadı');
            }
        } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {

            $cart_products = explode(',', get_cookie('cart_products'));
            $cart_quantities = explode(',', get_cookie('cart_quantities'));
            if (in_array($productId, $cart_products)) {
                $index = array_search($productId, $cart_products);
                unset($cart_quantities[$index]);
                $cart_products = array_diff($cart_products, [$productId]);

                $cart_product = implode(',', $cart_products);
                $cart_quantity = implode(',', $cart_quantities);
                set_cookie('cart_products', $cart_product, 86400);
                set_cookie('cart_quantities', $cart_quantity, 86400);
            }
        }
        redirect('cart');
    }
}
