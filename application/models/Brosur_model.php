<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur_model extends CI_Model
{
    private $table = 'brosur';
    private $primary_key = 'id_brousur';

    private function apply_search($keyword)
    {
        if ($keyword !== '') {
            $this->db->group_start()
                ->like('judul', $keyword)
                ->or_like('deskripsi', $keyword)
                ->or_like('judul_en', $keyword)
                ->or_like('deskripsi_en', $keyword)
                ->group_end();
        }
    }

    public function get_all()
    {
        return $this->db->order_by($this->primary_key, 'DESC')->get($this->table)->result();
    }

    public function get_paginated($limit, $offset, $keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->order_by($this->primary_key, 'DESC')
            ->limit($limit, $offset)
            ->get($this->table)
            ->result();
    }

    public function count_filtered($keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->count_all_results($this->table);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, [$this->primary_key => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->where($this->primary_key, $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where($this->primary_key, $id)->delete($this->table);
    }
}
