<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model', 'users_md');
        $this->load->model('Region_model', 'region_md');
        $this->load->model('Country_model', 'country_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Wishlist_model', 'wishlist_md');

    }

    public function index()
    {
        no_user_logged();


        // ---------- Count Wishlist --------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;
            $data['count'] = $this->wishlist_md->wishlistCount($userId);

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $cart_products = explode(',', get_cookie('wishlist_products'));
            $data['count'] = count($cart_products);
        } else {$data['count'] = '0';}
        // ---------- End Count Wishlist --------------------


        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('firstname', 'First name', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('telephone', 'Telephone', 'required');
            $this->form_validation->set_rules('address_1', 'Address', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('postcode', 'postcode', 'required');
            $this->form_validation->set_rules('country_id', 'Country', 'required');
            $this->form_validation->set_rules('zone_id', 'Region', 'required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm', 'Password confirm', 'trim|required|matches[password]');

            $this->form_validation->set_message('required', 'Boş buraxmayin');
            $this->form_validation->set_message('is_unique', '{field} mövcuddur');
            $this->form_validation->set_message('matches', 'Sifrələr eyni deyil');


            if ($this->form_validation->run()) {

                $country_id = $this->security->xss_clean($this->input->post('country_id'));
                $region_id = $this->security->xss_clean($this->input->post('zone_id'));

                $country = $this->country_md->selectActiveDataById($country_id);
                $region = $this->country_md->selectActiveDataById($region_id);

                if (empty($country) || empty($region)) {
                    $this->session->set_flashdata('error_message', 'Ölkə və bölgə seçin');
                    redirect('register/');
                } else {

                    $request_data = [
                        'name' => $this->security->xss_clean($this->input->post('firstname')),
                        'surname' => $this->security->xss_clean($this->input->post('lastname')),
                        'email' => $this->security->xss_clean($this->input->post('email')),
                        'fax' => $this->security->xss_clean($this->input->post('fax')),
                        'phone' => $this->security->xss_clean($this->input->post('telephone')),
                        'address1' => $this->security->xss_clean($this->input->post('address_1')),
                        'address2' => $this->security->xss_clean($this->input->post('address_2')),
                        'city' => $this->security->xss_clean($this->input->post('city')),
                        'post_code' => $this->security->xss_clean($this->input->post('postcode')),
                        'company' => $this->security->xss_clean($this->input->post('company')),
                        'country_id' => $country_id,
                        'region_id' => $region_id,
                        'password' => md5($this->input->post('confirm')),
                        'newsletter' => ($this->input->post('newsletter') == 1) ? 1 : 0,
                        'status' => 1
                    ];

                    $insert_id = $this->users_md->insert($request_data);

                    if ($insert_id > 0) {
                        $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi');

                        redirect('login');
                    }
                }
            }
        }


        $data['title'] = 'Register';

        $data['country'] = $this->country_md->selectActive();
        $data['region'] = $this->region_md->selectActive();
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->front('register', $data);
    }
}
