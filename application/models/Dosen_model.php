<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    public function get_all() {
        return $this->db->get('dosen')->result();
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
}