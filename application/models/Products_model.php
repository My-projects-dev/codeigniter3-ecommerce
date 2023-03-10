<?php

class Products_model extends CI_Model {

    protected $table = 'products';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){

        $this->db->select('p.*, b.title AS brandtitle, b.history, c.title AS cattitle');
        $this->db->from('product_categories pc');
        $this->db->join('category c', 'c.id=pc.categories_id', 'left');
        $this->db->join('products p', 'p.id=pc.products_id', 'right');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function product_mainImage($limit){

        $this->db->select('p.*, i.path');
        $this->db->from('products p');
        $this->db->join('images i', 'i.product_id=p.id', 'left');
        $this->db->where('i.main', 1);
        $this->db->limit($limit);
        $this->db->order_by('p.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function brandImageProduct($id=array())
    {
        $this->db->select('p.*, i.path, b.title AS brand');
        $this->db->from($this->table.' p');
        $this->db->join('images i', 'p.id=i.product_id', 'left');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->or_where_in('p.id', $id);
        $this->db->where('i.main', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function select_by_brand_id($brandİd)
    {
        $this->db->select('p.*, i.path, b.title AS brand');
        $this->db->from($this->table.' p');
        $this->db->join('images i', 'p.id=i.product_id', 'left');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->where('b.id', $brandİd);
        $this->db->where('i.main', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function getBrandId($productId){
        $this->db->select('brand_id');
        $this->db->where('id',$productId);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectDataById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectSlug($slug)
    {
        $this->db->select('id');
        $this->db->where('slug', $slug);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectSlugNotId($slug, $id)
    {
        $this->db->select('id');
        $this->db->where('slug', $slug);
        $this->db->where('id!=', $id);
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

     public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }

}