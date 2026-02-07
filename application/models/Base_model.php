<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model {

    public function get_sambutan(){
        return $this->db->get('sambutan')->result();
    }

    public function get_sejarah(){
        return $this->db->get('sejarah')->result();
    }

    public function get_dosen(){
        return $this->db->get('dosen')->result();
    }

    public function get_kalender(){
        return $this->db->get('kalender_akademik')->result();
    }

    public function get_kontak(){
        return $this->db->get('kontak')->result();
    }

    public function get_arsip(){
        return $this->db->get('arsip')->result();
    }

    public function get_galeri(){
        return $this->db->get_where('galeri', ['status' => 'tampil'])->result_array();
    }

    public function get_vmts($nama_vm){
        return $this->db
                ->get_where('vmts', ['nama_vm' => $nama_vm])
                ->row();
    }

    public function get_prodi_si($nama_prodi){
        return $this->db
                ->get_where('prodi', ['nama_prodi' => $nama_prodi])
                ->row();
    }

    public function get_prodi_ph($nama_prodi){
        return $this->db
                ->get_where('prodi', ['nama_prodi' => $nama_prodi])
                ->row();
    }

    public function get_pengumuman($limit = 1){
        return $this->db->where('status', 'publikasi')
                    ->order_by('tanggal_update', 'DESC')
                    ->limit($limit)
                    ->get('pengumuman')
                    ->result(); // <-- jadi array of object
    }

    public function get_berita($limit = 6){
        return $this->db->order_by('tanggal_terbit', 'DESC')
                    ->limit($limit)->get('berita')->result();
    }

    public function get_kegiatan($limit = 5){
        return $this->db->order_by('tanggal_update', 'DESC')
                    ->limit($limit)->get('kegiatan')
                    ->result();
    }
    

}