<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function get_by_users(){
        return $this->db->get('users')->result();
    }

    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function insert($data){
        $this->db->insert('users', $data);
    }
    public function get_by_id($id) {
    return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}
