<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {

    public function get_all() {
        return $this->db->get('prodi')->result();
    }
    public function insert($data) {
        return $this->db->insert('prodi', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('prodi', ['id_prodi' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_prodi', $id);
        return $this->db->update('prodi', $data);
    }
    public function delete($id) {
        $this->db->where('id_prodi', $id);
        return $this->db->delete('prodi');
    }
}