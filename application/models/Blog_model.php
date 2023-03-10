<?php

class Blog_model extends CI_Model {

    protected $table = 'blog';

    public function insert($data){

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all(){
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectActive(){
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectActiveLimit($limit){

        $this->db->where('status', 1);
        $this->db->limit($limit);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);

        return $query->result();
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