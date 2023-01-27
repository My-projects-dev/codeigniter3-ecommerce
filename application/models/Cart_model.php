<?php

class Cart_model extends CI_Model
{

    protected $table = 'cart';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function countCart($userId)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->where('user_id', $userId);
        $count = $this->db->count_all_results();
        return $count;
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

    public function selectProduct($userId)
    {
        $this->db->select('p.*, c.quantity as amount, i.path, b.title AS brand');
        $this->db->from($this->table . ' c');
        $this->db->join('products p', 'p.id=c.product_id');
        $this->db->join('images i', 'i.product_id=p.id', 'left');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
        $this->db->where('c.user_id', $userId);
        $this->db->where('i.main', 1);
        $this->db->order_by("p.created_at", "desc");
        $query = $this->db->get();

        return $query->result();
    }


    public function update_quantity($userId, $productId, $data)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $productId);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }


    public function total_amount($userId)
    {
        $this->db->select('SUM( p.sales_prices*c.quantity) AS total', FALSE);
        $this->db->from($this->table . ' c');
        $this->db->join('products p', 'p.id=c.product_id');
        $this->db->where('c.user_id', $userId);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function delete($productId, $userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $productId);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }


    public function delete_user_products($userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }
}