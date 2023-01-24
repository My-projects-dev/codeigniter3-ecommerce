<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product_categories_model', 'product_category_md');
        $this->load->model('Wishlist_model', 'wishlist_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Images_model', 'images_md');

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
        // ---------- Has wishlist ----------------------------------
        if ($this->session->has_userdata('userloggedin')) {

            $userId = $this->session->userdata("user")->id;

            $wishlist = $this->wishlist_md->selectProductId($userId);
            $data['wishlist_product_id'] = array_column($wishlist, 'product_id');

        } elseif (!empty(get_cookie('wishlist_products'))) {
            $data['wishlist-product_id'] = explode(',', get_cookie('wishlist_products'));
            print_r($data['wishlist-product_id']);
        }
        // ---------- End WishList ----------------------------------

        $slug = $this->security->xss_clean($url);

        $id = $this->product_md->selectSlug($slug)->id;

        if ($id==null) {
            redirect('/');
        }

        $catId = $this->product_category_md->getCategoryId($id)->categories_id;
        $ids = $catId;
        $subCat = array();

        while ($ids != 0) {
            $parent = $this->category_md->parentId($ids);
            if (!$parent->parent_id) {
                break;
            }

            $subCat = array_merge($subCat, array_values((array)$parent));
            $ids = $parent->parent_id;
        }

        array_push($subCat, $catId);

        // Related Product
        $data['related'] = $this->product_category_md->selectLastProduct($catId,4);
        // Related Product

        // Upsel Product
        $brandId = $this->product_md->getBrandId($id)->brand_id;
        $upsell = $this->product_md->select_by_brand_id($brandId);
        foreach ($upsell as $key => $value) {
            $value->image = $this->images_md->selectOnePassive($value->id)->path ?? $upsell[$key]->path;
        }
        // Upsel Product

        $data['category'] = $this->category_md->selectDataByIds($subCat);
        $data['product'] = $this->product_category_md->selectById($id);
        $data['images'] = $this->images_md->selectDataByProductId($id);

        $data['title'] = 'Product';
        $data['upsell'] = $upsell;
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->main([
            'include/product/product_detail',
            'include/product/related_products',
            'include/product/description',
            'include/product/upsell_products',
        ], $data);
    }


}
