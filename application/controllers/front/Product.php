<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product_categories_model', 'product_category_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Images_model', 'images_md');
        $this->load->model('Products_model', 'product_md');
    }

    public function index($url)
    {
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

        $data['category'] = $this->category_md->selectDataByIds($subCat);
        $data['product'] = $this->product_category_md->selectById($id);
        $data['images'] = $this->images_md->selectDataByProductId($id);

        $data['title'] = 'Product';
        $data['categories'] = category_tree($this->category_md->select_all());

        $this->load->main([
            'include/product/product_detail',
            'include/product/related_products',
            'include/product/description',
            'include/product/upsell_products',
        ], $data);
    }
}
