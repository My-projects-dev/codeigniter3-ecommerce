<?php

class Category_model extends CI_Model
{

    protected $table = 'category';

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function select_all()
    {
        $this->db->select('b.*, c.title as cattitle');
        $this->db->from('category b');
        $this->db->join('category c', 'c.id=b.parent_id', 'left');
        $query = $this->db->get()->result();

        return $query;
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

    public function lastCategory()
    {
        $this->db->select('id');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectLimit($limit)
    {
        $this->db->select('id');
        $this->db->where('status', 1);
        $this->db->limit($limit);
        $query = $this->db->get($this->table);

        return $query->result_array();
    }

    public function orderBYRandom($limit)
    {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit($limit);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function parentId($id)
    {
        $this->db->select('parent_id');
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function getChild($parent_id)
    {
        $this->db->where('parent_id', $parent_id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query;
    }

    public function getChildId($parent_id)
    {
        $this->db->select('id');
        $this->db->where('parent_id', $parent_id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectActiveDataById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectActive_isNotId($id)
    {
        $this->db->where('id!=', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function select_all_active()
    {
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function selectDataById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);

        return $query->row();
    }

    public function selectDataByIds($id)
    {
        $this->db->or_where_in('id', $id);
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);

        return $this->db->affected_rows();
    }

}