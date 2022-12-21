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

    public function update($id,$data){
        $this->db->where('products_id', $id);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }
}