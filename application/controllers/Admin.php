<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Admin_Controller {

    public function __construct() {
        parent::__construct();

        // load model
        $this->load->model('Prodi_model');
        $this->load->model('Dosen_model');
        $this->load->model('Berita_model');
        $this->load->model('Galeri_model');
    }

    public function index()
    {
        $data = array(
            'total_prodi' => $this->Prodi_model->count_prodi(),
            'total_dosen' => $this->Dosen_model->count_dosen(),
            'total_berita' => $this->Berita_model->count_berita(),
            'total_galeri' => $this->Galeri_model->count_galeri(),
        );
        $this->load->view('adminweb/admin.php',$data);
    }
}
