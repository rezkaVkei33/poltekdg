<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model'); // <== Ini WAJIB
        $this->load->helper('text');
    }

    public function index()
    {
        $data['data_pengumuman'] = $this->Base_model->get_pengumuman();
        $data['data_berita'] = $this->Base_model->get_berita();
        $data['data_kegiatan'] = $this->Base_model->get_kegiatan();
        $data['galeri'] = $this->Base_model->get_galeri();
        $this->load->view('base', $data);
    }
    public function sambutan()
    {
        $data['title'] = lang('title_welcome');
        $data['subtitle'] = lang('welcome');
        $data['data_sambutan'] = $this->Base_model->get_sambutan(); 
        $this->load->view('base/sambutan', $data);

    }
    public function kalender()
    {
        $data['title'] = lang('title_calendar');
        $data['subtitle'] = lang('calendar_academic');
        $data['data_kalender'] = $this->Base_model->get_kalender(); 
        $this->load->view('base/kalender', $data);

    }
    public function visi_misi()
    {
        $data['title'] = lang('title_vmts');
        $data['subtitle'] = lang('vmts');
        $data['data_vmts'] = $this->Base_model->get_vmts('Politeknik Darma Ganesha'); 
        $this->load->view('base/visi-misi', $data);

    }
    public function dosen()
    {
        $data['title'] = lang('title_lecturer');
        $data['subtitle'] = lang('our_lecturer');
        $data['data_dosen'] = $this->Base_model->get_dosen(); 
        $this->load->view('base/dosen', $data);

    }
    public function kontak()
    {
        $data['title'] = lang('title_contact');
        $data['subtitle'] = lang('contact');
        $data['data_kontak'] = $this->Base_model->get_kontak(); 
        $this->load->view('base/kontak', $data);

    }
    public function arsip()
    {
        $data['title'] = 'Arsip - Poltek DG';
        $data['subtitle'] = 'Arsip';
        $data['data_arsip'] = $this->Base_model->get_arsip(); 
        $this->load->view('base/arsip', $data);

    }
    public function prodi_si()
    {
        $data['title'] = lang('title_study_program');
        $data['subtitle'] = lang('study_program');
        $data['data_prodi_si'] = $this->Base_model->get_prodi_si('D3 Sistem Informasi'); 
        $this->load->view('base/prodi-si', $data);

    }
    public function prodi_ph()
    {
        $data['title'] = lang('title_study_program');
        $data['subtitle'] = lang('study_program');
        $data['data_prodi_ph'] = $this->Base_model->get_prodi_ph('D3 Perhotelan'); 
        $this->load->view('base/prodi-ph', $data);

    }
    public function pendaftaran() {
    $data['title'] = lang('title_registration');
    $data['subtitle'] = lang('contact_pmb');
    $this->load->view('base/form_pendaftaran', $data);
}

        
}
