<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kegiatan')->result();
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