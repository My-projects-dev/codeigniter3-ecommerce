<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged();

        $this->load->model('Products_model', 'products_md');
        $this->load->model('Brands_model', 'brands_md');
        $this->load->model('Images_model', 'images_md');
        $this->load->model('Category_model', 'category_md');
        $this->load->model('Product_categories_model', 'pr_cat_md');
        $this->load->model('Product_images_model', 'pr_img_md');
    }

    public function index()
    {
        $data['title'] = 'Products List';

        $data['lists'] = $this->products_md->select_all();

        $this->load->admin('products/index', $data);
    }

    public function create()
    {

        if ($this->input->post()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('sales_prices', 'Sales prices', 'required|numeric');

            if (empty($_FILES["main"]["tmp_name"])) {
                $this->form_validation->set_rules('main', 'Main image', 'required');
            }

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');
            $this->form_validation->set_message('numeric', 'Yalnızca rəqəm girilə bilər');

            if ($this->form_validation->run()) {

                $brand = $this->security->xss_clean($this->input->post('brand'));
                $item = $this->brands_md->selectActiveDataById($brand);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Brend tapılmadı' . $brand);
                    redirect('backend/products/create');
                }

                $category = $this->security->xss_clean($this->input->post('category'));
                $item = $this->category_md->selectActiveDataById($category);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Kateqoriya tapılmadı');
                    redirect('backend/products/create');
                }


                $request_data = [
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'quantity' => floor(abs($this->security->xss_clean($this->input->post('quantity')))),
                    'price' => abs($this->security->xss_clean($this->input->post('price'))),
                    'sales_prices' => abs($this->security->xss_clean($this->input->post('sales_prices'))),
                    'brand_id' => $brand,
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $insert_id = $this->products_md->insert($request_data);

                if ($insert_id > 0) {

                    $data = [
                        'products_id' => $insert_id,
                        'categories_id' => $category
                    ];

                    $this->pr_cat_md->insert($data);

                    $countFiles = count($_FILES['images']['name']);
                    $countUploadFiles = 0;
                    $countErrorUploadFiles = 0;

                    $allowedTypes = 'gif|jpg|png';
                    $path = 'uploads/Product_images/';


                    if (!file_exists("uploads")) {
                        mkdir("uploads");
                    }
                    if (!file_exists($path)) {
                        mkdir($path);
                    }

                    if ($_FILES["main"]["tmp_name"]) {

                        $uploadStatus = uploadFile($path, $allowedTypes, 'main');

                        if ($uploadStatus == false) {
                            $countErrorUploadFiles++;
                        } else {
                            $mainImageData = [
                                'path' => $uploadStatus,
                                'product_id' => $insert_id,
                                'main' => 1
                            ];

                            $last_id = $this->images_md->insert($mainImageData);

                            if ($last_id > 0) {
                                $data = [
                                    'products_id' => $insert_id,
                                    'images_id' => $last_id
                                ];
                                $this->pr_img_md->insert($data);
                                $countUploadFiles++;
                            } else {
                                $countErrorUploadFiles++;
                                if (file_exists($uploadStatus)) {
                                    unlink($uploadStatus);
                                }

                            }
                        }
                    }

                    if ($_FILES['images']['name'][0]) {

                        for ($i = 0; $i < $countFiles; $i++) {

                            $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                            $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                            $_FILES['image']['size'] = $_FILES['images']['size'][$i];
                            $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['image']['error'] = $_FILES['images']['error'][$i];

                            $uploadStatus = uploadFile($path, $allowedTypes, 'image');

                            if ($uploadStatus == false) {
                                $countErrorUploadFiles++;
                            } else {

                                $data = [
                                    'path' => $uploadStatus,
                                    'product_id' => $insert_id,
                                ];

                                $last_id = $this->images_md->insert($data);

                                if ($last_id > 0) {
                                    $data = [
                                        'products_id' => $insert_id,
                                        'images_id' => $last_id
                                    ];
                                    $this->pr_img_md->insert($data);
                                    $countUploadFiles++;
                                } else {
                                    $countErrorUploadFiles++;
                                    if (file_exists($uploadStatus)) {
                                        unlink($uploadStatus);
                                    }

                                }
                            }
                        }
                    }

                    $this->session->set_flashdata('success_message', 'Məlumat uğurla əlavə edildi. ' . $countUploadFiles . ' şəkil yükləndi. Yüklənməyən şəkil ' . $countErrorUploadFiles);
                } else {
                    $this->session->set_flashdata('error_message', 'Şəkil seçilmədi');
                }
            }
        }

        $data['title'] = 'Product Create';
        $data['lists'] = $this->brands_md->select_all_active();
        $data['category'] = $this->category_md->select_all_active();

        $this->load->admin('products/create', $data);
    }

    public function edit($id)
    {

        if ($this->input->post()) {
            $id = $this->security->xss_clean($id);

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('sales_prices', 'Sales prices', 'required|numeric');

            $this->form_validation->set_message('required', 'Boş buraxıla bilməz');
            $this->form_validation->set_message('numeric', 'Yalnızca rəqəm girilə bilər');

            if ($this->form_validation->run()) {

                $brand = $this->security->xss_clean($this->input->post('brand'));
                $item = $this->brands_md->selectActiveDataById($brand);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Brend tapılmadı');
                    redirect('backend/products/edit/' . $id);
                }

                $category = $this->security->xss_clean($this->input->post('category'));
                $item = $this->category_md->selectActiveDataById($category);

                if (empty($item)) {
                    $this->session->set_flashdata('error_message', 'Kateqoriya tapılmadı' . $category);
                    redirect('backend/products/edit/' . $id);
                }

                $request_data = [
                    'title' => $this->security->xss_clean($this->input->post('title')),
                    'description' => $this->security->xss_clean($this->input->post('description')),
                    'quantity' => floor(abs($this->security->xss_clean($this->input->post('quantity')))),
                    'price' => abs($this->security->xss_clean($this->input->post('price'))),
                    'sales_prices' => abs($this->security->xss_clean($this->input->post('sales_prices'))),
                    'brand_id' => $brand,
                    'status' => ($this->input->post('status') == 1) ? 1 : 0
                ];

                $affected_rows = $this->products_md->update($id, $request_data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurlu şəkildə dəyişdi.');

                    redirect('backend/products/edit/' . $id);
                }

                $data = ['categories_id' => $category];

                $affected_rows = $this->pr_cat_md->update($id, $data);

                if ($affected_rows > 0) {
                    $this->session->set_flashdata('success_message', 'Məlumat uğurlu şəkildə dəyişdi.');

                    redirect('backend/products/edit/' . $id);
                }


                $allowedTypes = 'gif|jpg|png';
                $path = 'uploads/Product_images/';

                if (!file_exists("uploads")) {
                    mkdir("uploads");
                }
                if (!file_exists($path)) {
                    mkdir($path);
                }

                $countFiles = count($this->images_md->selectDataByProductId($id));
                $countUploadFiles = 0;
                $countErrorUploadFiles = 0;

                for ($i = 0; $i < $countFiles; $i++) {

                    $img = $this->input->post('img' . $i);
                    $imgId = $this->security->xss_clean($this->input->post('id' . $i));
                    $main = $this->input->post('main');


                    if ($main == $i) {
                        $main = 1;

                        $radio['main'] = $main;

                        $rows = $this->images_md->update2($imgId, $radio, $id);

                        if ($rows > 0) {
                            $this->session->set_flashdata('success_message', 'Məlumat uğurlu şəkildə dəyişdirildi.');
                        } else {
                            $this->session->set_flashdata('error_message', 'Uğursuz işləm');
                        }
                    }

                    if ($_FILES['image' . $i]["tmp_name"]) {

                        $uploadStatus = uploadFile($path, $allowedTypes, 'image' . $i);

                        if ($uploadStatus == false) {
                            $countErrorUploadFiles++;
                        } else {

                            $datas = [
                                'path' => $uploadStatus,
                                'main' => $main,
                            ];

                            $rows = $this->images_md->update2($imgId, $datas, $id);

                            if ($rows > 0) {
                                $countUploadFiles++;
                                if (file_exists($img)) {
                                    unlink($img);
                                }

                                $this->session->set_flashdata('success_message', 'Məlumat uğurlu şəkildə dəyişdirildi. ' . $countUploadFiles . ' şəkil dəyişdi. Dəyişməyən ' . $countErrorUploadFiles);

                            } else {
                                $countErrorUploadFiles++;
                                if (file_exists($uploadStatus)) {
                                    unlink($uploadStatus);
                                }
                            }
                        }

                    }
                }

                $countFiles = count($_FILES['images']['name']);

                if ($_FILES['images']['name'][0]) {

                    for ($i = 0; $i < $countFiles; $i++) {

                        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                        $_FILES['image']['size'] = $_FILES['images']['size'][$i];
                        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                        $_FILES['image']['error'] = $_FILES['images']['error'][$i];

                        $uploadStatus = uploadFile($path, $allowedTypes, 'image');

                        if ($uploadStatus == false) {
                            $countErrorUploadFiles++;
                        } else {

                            $data = [
                                'path' => $uploadStatus,
                                'product_id' => $id,
                            ];

                            $last_id = $this->images_md->insert($data);

                            if ($last_id > 0) {
                                $data = [
                                    'products_id' => $id,
                                    'images_id' => $last_id
                                ];
                                $this->pr_img_md->insert($data);
                                $countUploadFiles++;
                            } else {
                                $countErrorUploadFiles++;
                                if (file_exists($uploadStatus)) {
                                    unlink($uploadStatus);
                                }
                            }
                        }
                        //$this->session->set_flashdata('success_message', $countUploadFiles . ' şəkil yükləndi. Yüklənməyən şəkil ' . $countErrorUploadFiles);
                    }
                }

            }

        }

        $item = $this->products_md->selectDataById($id);

        if (empty($item)) {
            $this->session->set_flashdata('error_message', 'Bu məlumat tapılmadı');

            redirect('backend/products');
        }

        $data['item'] = $item;

        $data['title'] = 'Product Edit';

        $data['lists'] = $this->brands_md->select_all_active();
        $data['category'] = $this->category_md->select_all_active();
        $data['selected_category'] = $this->pr_cat_md->getCategoryId($id);
        $data['images'] = $this->images_md->selectDataByProductId($id);

        $this->load->admin('products/edit', $data);
    }


    public function delete($id)
    {
        $id = $this->security->xss_clean($id);
        $item = $this->products_md->delete($id);

        if ($item > 0) {
            $this->session->set_flashdata('success_message', 'Uğurlu şəkildə silindi');
        } else {
            $this->session->set_flashdata('error_message', 'Silinmə zamanı xəta baş verdi');
        }

        redirect('backend/products');
    }


}