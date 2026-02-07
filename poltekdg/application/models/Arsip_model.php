<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip_model extends CI_Model {

    public function get_all() {
        return $this->db->get('arsip')->result();
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