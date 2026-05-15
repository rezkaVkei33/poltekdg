<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends CI_Model {

    // Simpan visitor
    public function simpan_visitor($data)
    {
        return $this->db->insert('visitor', $data);
    }

    // Total semua visitor
    public function total_visitor()
    {
        return $this->db->count_all('visitor');
    }

    // Visitor hari ini
    public function visitor_hari_ini()
    {
        $this->db->where('tanggal', date('Y-m-d'));
        return $this->db->count_all_results('visitor');
    }

    // Data mingguan
    public function visitor_mingguan()
    {
        $this->db->select('DATE(created_at) as tanggal, COUNT(*) as total');
        $this->db->where('created_at >=', date('Y-m-d', strtotime('-6 days')));
        $this->db->group_by('DATE(created_at)');
        $this->db->order_by('tanggal', 'ASC');

        return $this->db->get('visitor')->result();
    }

    // Data bulanan
    public function visitor_bulanan()
    {
        $this->db->select('MONTH(created_at) as bulan, COUNT(*) as total');
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->group_by('MONTH(created_at)');
        $this->db->order_by('bulan', 'ASC');

        return $this->db->get('visitor')->result();
    }

    // Data tahunan
    public function visitor_tahunan()
    {
        $this->db->select('YEAR(created_at) as tahun, COUNT(*) as total');
        $this->db->group_by('YEAR(created_at)');
        $this->db->order_by('tahun', 'ASC');

        return $this->db->get('visitor')->result();
    }
}