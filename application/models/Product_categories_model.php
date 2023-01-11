<?php

class Product_categories_model extends CI_Model
{

    protected $table = 'product_categories';

    public function insert($data)
    {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all()
    {
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function getCategoryId($product_id)
    {
        $this->db->select('categories_id');
        $this->db->where('products_id', $product_id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectById($id){

        $this->db->select('p.*, b.title AS brandtitle, b.logo, b.history, c.title AS cattitle');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'right');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->where('p.id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function selectDataByCategoryId($category_id,$per, $segment)
    {
        $this->db->select('p.*, c.title AS cattitle');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'right');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->or_where_in('pc.categories_id', $category_id);
        $this->db->where('p.status', 1);
        $this->db->limit($per, $segment);
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function selectLastProduct($category_id,$limit)
    {
        $this->db->select('p.*, c.title AS cattitle, i.path');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'left');
        $this->db->join('images i', 'p.id=i.product_id', 'left');
        $this->db->where('pc.categories_id', $category_id);
        $this->db->where('p.status', 1);
        $this->db->where('i.main', 1);
        $this->db->order_by('p.id', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();

        return $query->result();
    }

    public function countProduct($category_id)
    {
        $this->db->select('p.*, c.title AS cattitle');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'left');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->or_where_in('pc.categories_id', $category_id);
        $this->db->where('p.status', 1);
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->count_all_results();

        return $query;
    }

    public function selectProduct($category_id, $limit)
    {
        $this->db->select('p.*, i.path as image');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'right');
        $this->db->join('images i', 'p.id=i.product_id', 'left');
        $this->db->where('pc.categories_id', $category_id);
        $this->db->where('p.status', 1);
        $this->db->where('i.main', 1);
        $this->db->limit($limit);
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function update($id,$data){
        $this->db->where('products_id', $id);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }
}