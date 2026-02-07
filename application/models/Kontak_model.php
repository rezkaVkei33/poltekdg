<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {
   
    public function get_all() {
        return $this->db->get('kontak')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('kontak', ['id_kontak' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('kontak', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_kontak', $id);
        return $this->db->update('kontak', $data);
    }

    public function delete($id) {
        $this->db->where('id_kontak', $id);
        return $this->db->delete('kontak');
    }
}