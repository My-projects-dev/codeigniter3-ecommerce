<?php

class Products_model extends CI_Model {

    protected $table = 'products';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){

        $this->db->select('p.*, b.title as brandtitle');
        $this->db->from('products p');
        $this->db->join('brands b', 'b.id=p.brand_id', 'left');
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