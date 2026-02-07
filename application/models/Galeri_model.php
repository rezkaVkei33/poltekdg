<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        return $this->db->get('galeri')->result();
    }
    public function insert($data) {
        return $this->db->insert('galeri', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('galeri', ['id_galeri' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_galeri', $id);
        return $this->db->update('galeri', $data);
    }
    public function delete($id) {
        $this->db->where('id_galeri', $id);
        return $this->db->delete('galeri');
    }
}