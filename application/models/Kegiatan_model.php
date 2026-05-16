<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kegiatan')->result();
    }

    private function apply_search($keyword)
    {
        if ($keyword !== '') {
            $this->db->group_start()
                ->like('nama_kegiatan', $keyword)
                ->or_like('deskripsi', $keyword)
                ->or_like('lokasi', $keyword)
                ->group_end();
        }
    }

    public function get_paginated($limit, $offset, $keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->order_by('tanggal_mulai', 'DESC')
            ->limit($limit, $offset)
            ->get('kegiatan')
            ->result();
    }

    public function count_filtered($keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->count_all_results('kegiatan');
    }

    public function get_by_id($id) {
        return $this->db->get_where('kegiatan', ['id_kegiatan' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('kegiatan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_kegiatan', $id);
        return $this->db->update('kegiatan', $data);
    }
    
    public function delete($id) {
        $this->db->where('id_kegiatan', $id);
        return $this->db->delete('kegiatan');
    }
}
