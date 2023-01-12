<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product_categories_model', 'product_cat_md');
        $this->load->model('Products_model', 'product_md');
        $this->load->model('Category_model', 'categories_md');
        $this->load->model('Images_model', 'images_md');
    }

    public function index($id)
    {
        $id = $this->security->xss_clean($id);

        // Category way
        $ids = $id;
        $parentCat = array();

        while ($ids != null) {
            $parent = $this->categories_md->parentId($ids);
            if (!$parent->parent_id) {
                break;
            }

            $subCat = array_merge($parentCat, array_values((array)$parent));
            $ids = $parent->parent_id;
        }

        array_push($parentCat, $id);

        $data['category'] = $this->categories_md->selectDataByIds($parentCat);
        // end category way

        // Latest Product
        $data['latestProduct'] = $this->product_md->product_mainImage(3);
        // end Latest Product

        // Subcategories Product
        $data['subCategoriesProduct'] = [];
        $child = $this->categories_md->getChildId($id);

        foreach ($child as $key => $value) {
            $product = $this->product_cat_md->selectProduct($value->id, 2);

            if ($product) {
                $data['subCategoriesProduct'] = (object)array_merge((array)$data['subCategoriesProduct'], (array)$product);
            }
        }
        // end Subcategories Product

        // Products
        $data['product'] = [];
        $ids = $id;

        $subCat = array();
        while ($ids != null) {
            $parent = $this->categories_md->parentId($ids);
            if (!$parent->parent_id) {
                break;
            }

            $subCat = array_merge($subCat, array_values((array)$parent));
            $ids = $parent->parent_id;
        }

        array_unshift($subCat, $id);
        $countProduct = $this->product_cat_md->countProduct($subCat);
        $this->load->library('pagination');

        $config['base_url'] = base_url('category/'.$id);
        $config['total_rows'] = $countProduct;
        $config['per_page'] = 12;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '<li><a href=# ><span>';
        $config['cur_tag_close'] = '</span></a ></li > ';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();


        $product = $this->product_cat_md->selectDataByCategoryId($subCat, $config['per_page'], $this->uri->segment(3, 0));

        foreach ($product as $key => $value) {
            $image = $this->images_md->selectDataByProductId($value->id);

            $value->image = [];
            $value->image = (object)array_merge((array)$value->image, (array)$image);
        }

        $data['product'] = $product;
        // End-Products

        $data['title'] = 'Category product';
        $data['categories'] = category_tree($this->categories_md->select_all());

        $this->load->main([
            'include/category_product/shop_by',
            'include/category_product/latest_product',
            'include/category_product/banner',
            'include/category_product/subcategories_product',
            'include/category_product/category_product',
        ], $data);
    }
}
