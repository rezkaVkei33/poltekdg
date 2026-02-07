<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan_model extends CI_Model {
    
    public function get_all(){
        return $this->db->get('sambutan')->result();
    }

    public function insert($data) {
        return $this->db->insert('sambutan', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('sambutan', ['id_sambutan' => $id])->row();
    }
    public function update($id, $data) {
        $this->db->where('id_sambutan', $id);
        return $this->db->update('sambutan', $data);
    }

    public function delete($id){
        $this->db->where('id_sambutan', $id);
        return $this->db->delete('sambutan');
    }

}
