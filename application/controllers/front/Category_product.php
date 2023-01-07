<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product_categories_model', 'product_cat_md');
        $this->load->model('Category_model', 'categories_md');
        $this->load->model('Images_model', 'images_md');
    }

    public function index($id)
    {
        $id = $this->security->xss_clean($id);

        // child category
        $data['childCategoryProduct'] = [];
        $child = $this->categories_md->getChildId($id);
        foreach($child as $key=>$value){
            $product = $this->product_cat_md->selectProduct($value->id);
            if ($product){
                array_push($data['childCategoryProduct'], $product);
            }
        }
        // end child category


        // Products
        $data['product'] = [];

        $ids = $id;
        while ($ids != null) {
            $parent = $this->categories_md->parentId($ids);

            $product = $this->product_cat_md->selectDataByCategoryId($ids);

            foreach ($product as $key => $value) {
                $image = $this->images_md->selectDataByProductId($value->id);

                $value->image = [];
                $value->image = (object)array_merge((array)$value->image, (array)$image);
            }

            $data['product'] = (object)array_merge((array)$data['product'], (array)$product);
            $ids = $parent->parent_id;
        }

        //echo '<hr>';
        //print_r($data['product']);

        // End-Products


        $this->load->main([
            'include/category_product/shop_by',
            'include/category_product/latest_product',
            'include/category_product/category_product',
        ], $data);
    }
}
