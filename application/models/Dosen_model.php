<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function get_all() {
        return $this->db->get('dosen')->result();
    }

    private function apply_search($keyword)
    {
        if ($keyword !== '') {
            $this->db->group_start()
                ->like('nama', $keyword)
                ->or_like('gelar', $keyword)
                ->or_like('bidang_keahlian', $keyword)
                ->or_like('email', $keyword)
                ->or_like('telepon', $keyword)
                ->or_like('status', $keyword)
                ->or_like('prodi', $keyword)
                ->group_end();
        }
    }

    public function get_paginated($limit, $offset, $keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->order_by('nama', 'ASC')
            ->limit($limit, $offset)
            ->get('dosen')
            ->result();
    }

    public function count_filtered($keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->count_all_results('dosen');
    }

    public function insert($data) {
        return $this->db->insert('dosen', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('dosen', ['id_dosen' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_dosen', $id);
        return $this->db->update('dosen', $data);
    }
    public function delete($id) {
        $this->db->where('id_dosen', $id);
        return $this->db->delete('dosen');
    }

    // dosen count 
    public function count_dosen()
    {
        return $this->db->count_all('dosen');
    }

}
