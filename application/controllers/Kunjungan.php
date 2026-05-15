<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Visitor_model');
    }

    public function index()
    {
        // Mingguan
        $weekly = $this->Visitor_model->visitor_mingguan();

        $labels_week = [];
        $data_week = [];

        foreach($weekly as $row){
            $labels_week[] = date('d M', strtotime($row->tanggal));
            $data_week[] = $row->total;
        }

        // Bulanan
        $monthly = $this->Visitor_model->visitor_bulanan();

        $labels_month = [];
        $data_month = [];

        foreach($monthly as $row){

            $bulan = [
                1 => 'Jan',
                2 => 'Feb',
                3 => 'Mar',
                4 => 'Apr',
                5 => 'Mei',
                6 => 'Jun',
                7 => 'Jul',
                8 => 'Agu',
                9 => 'Sep',
                10 => 'Okt',
                11 => 'Nov',
                12 => 'Des'
            ];

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
            'title' => 'Kunjungan',
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