<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renstra_model extends CI_Model {

    public function get_all() {
        return $this->db->get('renstra')->result();
    }
    public function insert($data) {
        return $this->db->insert('renstra', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('renstra', ['id_renstra' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_renstra', $id);
        return $this->db->update('renstra', $data);
    }
    public function delete($id) {
        $this->db->where('id_renstra', $id);
        return $this->db->delete('renstra');
    }

}