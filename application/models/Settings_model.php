<?php

class Settings_model extends CI_Model {

    protected $table = 'settings';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $query = $this->db->get($this->table);

        return $query->result();
    }


    public function selectDataById($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function select_data($key)
    {
        $this->db->select('value');
        $this->db->where('status', 1);
        $this->db->where('key', $key);
        $query = $this->db->get($this->table);
        return $query->row()->value;
    }

    public function has_key($key)
    {
        $this->db->where('key', $key);
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function another_id_has_key($id, $key)
    {
        $this->db->where('id!=', $id);
        $this->db->where('key', $key);
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