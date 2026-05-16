<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_model extends CI_Model {

    public function get_all() {
        return $this->db->get('arsip')->result();
    }

    private function apply_search($keyword)
    {
        if ($keyword !== '') {
            $this->db->group_start()
                ->like('nama_dokumen', $keyword)
                ->or_like('keterangan', $keyword)
                ->or_like('file_upload', $keyword)
                ->group_end();
        }
    }

    public function get_paginated($limit, $offset, $keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->order_by('tanggal_upload', 'DESC')
            ->limit($limit, $offset)
            ->get('arsip')
            ->result();
    }

    public function count_filtered($keyword = '')
    {
        $this->apply_search($keyword);
        return $this->db->count_all_results('arsip');
    }

    public function insert($data) {
        return $this->db->insert('arsip', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('arsip', ['id_arsip' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_arsip', $id);
        return $this->db->update('arsip', $data);
    }
    public function delete($id) {
        $this->db->where('id_arsip', $id);
        return $this->db->delete('arsip');
    }

}
