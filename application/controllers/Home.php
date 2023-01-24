<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Blog_model', 'blog_md');
        $this->load->model('Brands_model', 'brand_md');
        $this->load->model('Slider_model', 'slider_md');
        $this->load->model('Banner_model', 'banner_md');
        $this->load->model('Images_model', 'images_md');
        $this->load->model('Settings_model', 'setting_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Product_categories_model', 'product_category_md');

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

        //Best sellers
        $bestSeller = $this->product_category_md->randomProduct(8);
        foreach ($bestSeller as $key => $value) {
            $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $bestSeller[$key]->path;
        }
        // end bestsellers


        // last category product
        $lastId = $this->category_md->lastCategory(3);
        $prod = $this->product_category_md->selectLastProduct($lastId->id, 7);
        foreach ($prod as $key => $value) {
            $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $prod[$key]->path;
        }
        // end last category product

        // first 3 category
        $catId = $this->category_md->selectLimit(3);

        $limit = 6;
        $products = [];
        foreach ($catId as $key => $value) {

            $product['bannerLeft'] = $this->banner_md->selectBanner('Home > Category products > left side ' . $key);
            $product['bannerCenter'] = $this->banner_md->selectBanner('Home > Category products > center side ' . $key);
            $product['underProductBanner'] = $this->banner_md->selectBanner('Home > Under Category products ' . $key);

            foreach ($value as $keyy => $valuee) {

                $pr = $this->product_category_md->selectOrderBy($valuee, $limit, 'price');
                $qu = $this->product_category_md->selectOrderBy($valuee, $limit, 'quantity');
                $dt = $this->product_category_md->selectOrderBy($valuee, $limit, 'updated_at');
                $sl = $this->product_category_md->selectOrderBy($valuee, $limit, 'sales_prices');

                foreach ($pr as $key => $value) {
                    $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $pr[$key]->mainImage;
                }
                foreach ($qu as $key => $value) {
                    $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $qu[$key]->mainImage;
                }
                foreach ($dt as $key => $value) {
                    $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $dt[$key]->mainImage;
                }
                foreach ($sl as $key => $value) {
                    $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $sl[$key]->mainImage;
                }

                $product['sale'] = $sl;
                $product['date'] = $dt;
                $product['price'] = $pr;
                $product['quantity'] = $qu;
                $product['hotCategory'] = $this->category_md->orderBYRandom(6);

            }
            array_push($products, $product);
        }
        // end firs 3 product


        $data['underSliderBanner'] = $this->banner_md->selectBanners(4, 'Under slider');
        $data['categories'] = category_tree($this->category_md->select_all());
        $data['sliders'] = $this->slider_md->selectActive();
        $data['brands'] = $this->brand_md->select_all_active();
        $data['lastBlogs'] = $this->blog_md->selectActiveLimit(2);
        $data['bestSeller'] = $bestSeller;
        $data['bestSeller2'] = $bestSeller;
        $data['hotDeals'] = $prod;
        $data['products'] = $products;
        $data['title'] = 'Home';

        $this->load->main([
            'include/home/slider',
            'include/home/banner',
            'include/home/hot_deals',
            'include/home/best_sellers',
            'include/home/first_three_category_products',
            'include/home/media',
            'include/home/brands',
        ], $data);
    }
}
