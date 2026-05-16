<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get_all() {
    
        return $this->db->get('berita')->result();
    }

    private function apply_search($keyword)
    {
        if ($keyword !== '') {
            $this->db->group_start()
                ->like('judul', $keyword)
                ->or_like('isi', $keyword)
                ->or_like('penulis', $keyword)
                ->group_end();
        }
    }

    public function get_paginated($limit, $offset, $keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->order_by('tanggal_terbit', 'DESC')
            ->limit($limit, $offset)
            ->get('berita')
            ->result();
    }

    public function count_filtered($keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->count_all_results('berita');
    }

    public function insert($data) {
        return $this->db->insert('berita', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('berita', ['id_berita' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_berita', $id);
        return $this->db->update('berita', $data);
    }
    public function delete($id) {
        $this->db->where('id_berita', $id);
        return $this->db->delete('berita');
    }

    // berita count
    public function count_berita()
    {
        return $this->db->count_all('berita');
    }
}
