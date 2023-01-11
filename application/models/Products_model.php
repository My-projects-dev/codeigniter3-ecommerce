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

    public function selectDataById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        return $query->row();
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