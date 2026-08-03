<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->checkLogin();

        $this->load->model('Visitor_model');
    }

    public function index()
    {
        // Mingguan
        $weekly = $this->Visitor_model->visitor_mingguan();

        $labels_week = [];
        $data_week = [];
        $days_of_week = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];

        foreach($weekly as $row){
            $day_index = date('w', strtotime($row->tanggal));
            $day_name = $days_of_week[$day_index];
            $labels_week[] = $day_name;
            $data_week[] = $row->total;
        }

        // Bulanan
        $monthly = $this->Visitor_model->visitor_bulanan();

        $labels_month = [];
        $data_month = [];

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        foreach($monthly as $row){
            $labels_month[] = $bulan[$row->bulan];
            $data_month[] = $row->total;
        }

        // Tahunan
        $yearly = $this->Visitor_model->visitor_tahunan();

        $labels_year = [];
        $data_year = [];

        foreach($yearly as $row){
            $labels_year[] = $row->tahun;
            $data_year[] = $row->total;
        }

        $data = array(
            'title' => 'Admin - Poltek DG',
            'total_visitor' => $this->Visitor_model->total_visitor(),
            'visitor_today' => $this->Visitor_model->visitor_hari_ini(),

            'labels_week' => $labels_week,
            'data_week' => $data_week,

            'labels_month' => $labels_month,
            'data_month' => $data_month,

            'labels_year' => $labels_year,
            'data_year' => $data_year,
        );

        $this->load->view('adminweb/kunjungan/kunjungan_web', $data);
    }
}