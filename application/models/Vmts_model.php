<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vmts_model extends CI_Model {

    public function get_all() {
        return $this->db->get('vmts')->result();
    }
    public function insert($data) {
        return $this->db->insert('vmts', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('vmts', ['id_vm' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_vm', $id);
        return $this->db->update('vmts', $data);
    }
    public function delete($id) {
        $this->db->where('id_vm', $id);
        return $this->db->delete('vmts');
    }
}