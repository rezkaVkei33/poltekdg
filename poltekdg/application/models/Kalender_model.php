<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kalender_akademik')->result();
    }
    public function insert($data) {
        $this->db->insert('kalender_akademik', $data);
    }
    public function get_by_id($id) {
        return $this->db->get_where('kalender_akademik', ['id_kalender' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_kalender', $id);
        return $this->db->update('kalender_akademik', $data);
    }
    public function delete($id) {
        $this->db->where('id_kalender', $id);
        return $this->db->delete('kalender_akademik');
    }
    
}