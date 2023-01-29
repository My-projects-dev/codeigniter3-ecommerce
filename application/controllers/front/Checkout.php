<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Order_products_model', 'order_product_md');
        $this->load->model('Delivery_methods_model', 'delivery_md');
        $this->load->model('Payment_methods_model', 'payment_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Country_model', 'country_md');
        $this->load->model('Region_model', 'region_md');
        $this->load->model('Orders_model', 'order_md');
        $this->load->model('Users_model', 'user_md');
        $this->load->model('Cart_model', 'cart_md');
    }

    public function index()
    {
        $data['cart'] = [];

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

        // ------ select region by country ----------------------------
        $data['region'] = [];
        if ($this->input->is_ajax_request()) {
            $id = $this->security->xss_clean($this->input->post('id'));

            $country = $this->country_md->selectDataById($id);
            if (!empty($country)) {
                $region = $this->country_md->selectActiveDataById($id);
                echo json_encode($region);
            }
        }
        // ------ End. select region by country ----------------------------   }


        $data['title'] = 'Checkout';
        $data['region'] = $this->region_md->selectActive();
        $data['country'] = $this->country_md->selectActive();
        $data['payments'] = $this->payment_md->select_all();
        $data['deliveries'] = $this->delivery_md->select_all();
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('include/shopping/checkout', $data);
    }


    public function insert()
    {

        if ($this->session->has_userdata('userloggedin')) {
            $userId = $this->session->userdata("user")->id;
            $countCart = $this->cart_md->countCart($userId);
            if ($countCart > 0) {

                $carts = $this->cart_md->selectProduct($userId);
                $total_amount = $this->cart_md->total_amount($userId)[0]['total'];

                $payment_method = $this->security->xss_clean($this->input->post('payment'));
                $payment = $this->delivery_md->selectDataById($payment_method);
                if (empty($payment)) {
                    $this->session->set_flashdata('error_message', 'Ödəmə metodu tapılmadı');
                    redirect('checkout');
                }

                $delivery_method = $this->security->xss_clean($this->input->post('delivery'));
                $delivery = $this->delivery_md->selectDataById($delivery_method);
                if (empty($delivery)) {
                    $this->session->set_flashdata('error_message', 'Çatdırılma metodu tapılmadı');
                    redirect('checkout');
                }

                $data = [
                    'user_id' => $userId,
                    'payment_method' => $payment_method,
                    'delivery_method' => $delivery_method,
                    'total_amount' => $total_amount,
                    'status_id' => 1,
                    'status' => 1
                ];

                $order_id = $this->order_md->insert($data);
                if ($order_id == null) {
                    $this->session->set_flashdata('error_message', 'Sifariş qeydə alına bilmədi');
                    redirect('checkout');
                }

                $order_product = [];
                foreach ($carts as $key => $value) {
                    $dat = [
                        'order_id' => $order_id,
                        'product_id' => $value->id,
                        'quantity' => $value->quantity,
                        'price' => $value->sales_prices,
                        'amount' => $value->sales_prices * $value->amount,
                        'status' => 1
                    ];
                    array_push($order_product, $dat);
                }

                $affected_rows = $this->order_product_md->insertArray($order_product);
                if ($affected_rows > 0) {
                    //$this->cart_md->delete_user_products($userId);
                    if ($payment_method==2){

                        $this->load->library('Payriff');
                        $payriff = $this->payriff->create_order($data);
                        redirect($payriff['payment_url']);
                    }

                    $this->session->set_flashdata('success_message', 'Sifariş qeydə alındı');
                } else {
                    $this->session->set_flashdata('error_message', 'Sifariş qeydə alına bilmədi');
                }
            }
            redirect('checkout');
        } elseif (!empty(get_cookie('cart_products')) and !empty(get_cookie('cart_quantities'))) {

            if ($this->input->post()) {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('firstname', 'First name', 'trim|required');
                $this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('telephone', 'Telephone', 'required');
                $this->form_validation->set_rules('address_1', 'Address', 'required');
                $this->form_validation->set_rules('city', 'city', 'required');
                $this->form_validation->set_rules('postcode', 'postcode', 'required');
                $this->form_validation->set_rules('country_id', 'Country', 'required');
                $this->form_validation->set_rules('zone_id', 'Region', 'required');

                $this->form_validation->set_message('required', 'Boş buraxmayin');
                $this->form_validation->set_message('is_unique', '{field} mövcuddur');

                if ($this->form_validation->run()) {

                    $email = $this->security->xss_clean($this->input->post('email'));

                    $hasEmail = $this->user_md->hasEmail($email);
                    if (!empty($hasEmail)) {
                        $userId = $hasEmail->id;
                    } else {

                        $country_id = $this->security->xss_clean($this->input->post('country_id'));
                        $region_id = $this->security->xss_clean($this->input->post('zone_id'));

                        $country = $this->country_md->selectActiveDataById($country_id);
                        $region = $this->country_md->selectActiveDataById($region_id);

                        if (empty($country) || empty($region)) {
                            $this->session->set_flashdata('error_message', 'Ölkə və bölgə seçin');
                            redirect('checkout/');
                        } else {

                            $request_data = [
                                'name' => $this->security->xss_clean($this->input->post('firstname')),
                                'surname' => $this->security->xss_clean($this->input->post('lastname')),
                                'email' => $email,
                                'fax' => $this->security->xss_clean($this->input->post('fax')),
                                'phone' => $this->security->xss_clean($this->input->post('telephone')),
                                'address1' => $this->security->xss_clean($this->input->post('address_1')),
                                'address2' => $this->security->xss_clean($this->input->post('address_2')),
                                'city' => $this->security->xss_clean($this->input->post('city')),
                                'post_code' => $this->security->xss_clean($this->input->post('postcode')),
                                'company' => $this->security->xss_clean($this->input->post('company')),
                                'country_id' => $country_id,
                                'region_id' => $region_id,
                                'newsletter' => ($this->input->post('newsletter') == 1) ? 1 : 0
                            ];

                            $userId = $this->user_md->insert($request_data);
                        }
                    }

                    $cart_products = explode(',', get_cookie('cart_products'));
                    $cart_quantities = explode(',', get_cookie('cart_quantities'));
                    $total_amount = array_sum($cart_quantities);

                    $payment_method = $this->security->xss_clean($this->input->post('payment'));
                    $payment = $this->delivery_md->selectDataById($payment_method);
                    if (empty($payment)) {
                        $this->session->set_flashdata('error_message', 'Ödəmə metodu tapılmadı');
                        redirect('checkout');
                    }

                    $delivery_method = $this->security->xss_clean($this->input->post('delivery'));
                    $delivery = $this->delivery_md->selectDataById($delivery_method);
                    if (empty($delivery)) {
                        $this->session->set_flashdata('error_message', 'Çatdırılma metodu tapılmadı');
                        redirect('checkout');
                    }

                    $data = [
                        'user_id' => $userId,
                        'payment_method' => $payment_method,
                        'delivery_method' => $delivery_method,
                        'total_amount' => $total_amount,
                        'status_id' => 1,
                        'status' => 1
                    ];

                    $order_id = $this->order_md->insert($data);
                    if ($order_id == null) {
                        $this->session->set_flashdata('error_message', 'Sifariş qeydə alına bilmədi');
                        redirect('checkout');
                    }

                    $combine = array_combine($cart_products, $cart_quantities);

                    $order_product = [];
                    foreach ($combine as $key => $value) {
                        $product = $this->product_md->selectDataById($key);

                        $dat = [
                            'order_id' => $order_id,
                            'product_id' => $key,
                            'quantity' => $value,
                            'price' => $product->sales_prices,
                            'amount' => $product->sales_prices * $value,
                            'status' => 1
                        ];
                        array_push($order_product, $dat);
                    }

                    $affected_rows = $this->order_product_md->insertArray($order_product);
                    if ($affected_rows > 0) {
                        $this->cart_md->delete_user_products($userId);
                        delete_cookie('cart_products');
                        delete_cookie('cart_quantities');
                        $this->session->set_flashdata('success_message', 'Sifariş qeydə alındı');
                    } else {
                        $this->session->set_flashdata('error_message', 'Sifariş qeydə alına bilmədi');
                    }
                }


            }
            redirect('checkout');
        } else {
            $this->session->set_flashdata('error_message', 'Məhsul seçməmisiniz');
            redirect('checkout/');
        }
    }


    public function get_regions()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->security->xss_clean($this->input->post('id'));

            $country = $this->country_md->selectDataById($id);
            if (!empty($country)) {
                $region = $this->region_md->selectActiveDataByCountryId($id);
                echo json_encode($region);
            }
        }
    }
}
