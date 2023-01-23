<?php

class Wishlist_model extends CI_Model
{

    protected $table = 'wishlist';

    public function insert($data)
    {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }


    public function selectProductId($userId)
    {
        $this->db->select('product_id');
        $this->db->where('user_id', $userId);
        $this->db->order_by("created_at", "desc");
        $query = $this->db->get($this->table);

        return $query->result_array();
    }


    public function hasProduct($userId, $product_id)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get($this->table);

        return $query->row();
    }


    public function wishlistCount($userId)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('user_id', $userId);
        $count = $this->db->count_all_results();

        return $count;
    }


    public function delete($ProductId, $userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $ProductId);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }
}