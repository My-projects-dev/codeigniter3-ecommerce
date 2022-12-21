<?php

class Order_products_model extends CI_Model
{

    protected $table = 'order_products';

    public function insert($data)
    {

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all()
    {
        $this->db->select('o.*,  p.title AS title, op.*');
        $this->db->from('order_products op');
        $this->db->join('orders o', 'op.order_id=o.id', 'left');;
        $this->db->join('products p', 'op.product_id=p.id', 'left');
        $this->db->order_by('op.id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function selectDataById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        return $this->db->affected_rows();
    }

    public function active($id)
    {
        $this->db->set('status', '1');
        $this->db->where('id', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function passive($id)
    {
        $this->db->set('status', '0
        ');
        $this->db->where('id', $id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }
}