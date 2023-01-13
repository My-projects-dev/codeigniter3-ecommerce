<?php

class Banner_model extends CI_Model {

    protected $table = 'banner';

    public function insert($data){


        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectActive(){
        $this->db->where('status', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectActiveLimit($limit){
        $this->db->where('status', 1);
         $this->db->limit($limit);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectDataById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectActiveDataById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
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