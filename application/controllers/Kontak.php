<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Kontak_model');
    }

    public function index() {
        $data['kontak'] = $this->Kontak_model->get_all();
        $this->load->view('adminweb/tentang/kontak/kontak', $data);
    }
    public function tambah_kontak() {
        $this->load->view('adminweb/tentang/kontak/tambah_kontak');
    }
    public function simpan_kontak() {
        $this->load->model('Kontak_model');
        // validasi input
        $data = array(
            'judul_kontak' => $this->input->post('judul_kontak'),
            'isi_kontak' => $this->input->post('isi_kontak'),
        );

        $this->Kontak_model->insert($data);
        $this->session->set_flashdata('success', 'Kontak berhasil ditambahkan.');
        redirect('kontak');
    }
    public function ubah_kontak($id) {
        $data['kontak'] = $this->Kontak_model->get_by_id($id);

        if (!$data['kontak']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/kontak/ubah_kontak', $data);
    }
    public function update($id) {
        $this->load->model('Kontak_model');
        // validasi input
        $data = array(
            'judul_kontak' => $this->input->post('judul_kontak'),
            'isi_kontak' => $this->input->post('isi_kontak'),
        );

        $this->Kontak_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kontak berhasil diubah.');
        redirect('kontak');
    }
    public function hapus_kontak($id) {
        $this->Kontak_model->delete($id);
        $this->session->set_flashdata('success', 'Kontak berhasil dihapus.');
        redirect('kontak');
    }
    
}