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

    public function get_brosur()
    {
        return $this->db->limit(1)->get('brosur')->row();
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

    private $berita_unggulan_ids = [6, 7, 8];

    /**
     * Berita unggulan selalu berada paling atas (ID 6, 7, 8). Berita lainnya
     * diurutkan dari tanggal terbit terbaru, bukan tanggal pembaruan.
     */
    public function get_berita($limit = 6)
    {
        $unggulan = $this->get_berita_unggulan();
        $sisa = max(0, (int) $limit - count($unggulan));

        if ($sisa === 0) {
            return array_slice($unggulan, 0, $limit);
        }

        $lainnya = $this->db
            ->where_not_in('id_berita', $this->berita_unggulan_ids)
            ->order_by('tanggal_terbit', 'DESC')
            ->order_by('id_berita', 'DESC')
            ->limit($sisa)
            ->get('berita')
            ->result();

        return array_merge($unggulan, $lainnya);
    }

    public function get_semua_berita()
    {
        return array_merge(
            $this->get_berita_unggulan(),
            $this->db
                ->where_not_in('id_berita', $this->berita_unggulan_ids)
                ->order_by('tanggal_terbit', 'DESC')
                ->order_by('id_berita', 'DESC')
                ->get('berita')
                ->result()
        );
    }

    private function get_berita_unggulan()
    {
        return $this->db
            ->where_in('id_berita', $this->berita_unggulan_ids)
            ->order_by('id_berita', 'ASC')
            ->get('berita')
            ->result();
    }

    public function get_berita_by_id($id)
    {
        return $this->db->get_where('berita', ['id_berita' => (int) $id])->row();
    }

    public function get_kegiatan($limit = 5){
        return $this->db->order_by('tanggal_update', 'DESC')
                    ->limit($limit)->get('kegiatan')
                    ->result();
    }
    

}
