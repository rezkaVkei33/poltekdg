<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur_model extends CI_Model
{
    private $table = 'brosur';
    private $primary_key = 'id_brosur';

    public function get_single()
    {
        return $this->db->limit(1)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data)
    {
        $brosur = $this->get_single();
        if (!$brosur) {
            return FALSE;
        }

        return $this->db->where($this->primary_key, $brosur->{$this->primary_key})
            ->update($this->table, $data);
    }
}
