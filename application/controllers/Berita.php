<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model');
    }

    public function index() {
        $data = [
            'title' => 'Berita - Poltek DG',
            'subtitle' => 'Berita',
            'berita' => $this->Berita_model->get_all()
        ];
        $this->load->view('adminweb/tentang/berita/berita', $data);
    }
    public function tambah_berita() {
        $this->load->view('adminweb/tentang/berita/tambah_berita');
    }
    public function simpan_berita(){
        $this->load->model('Berita_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('berita/tambah_berita');
                return;
            } 
        }
        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'penulis' => $this->input->post('penulis'),
            'tanggal_terbit' => $this->input->post('tanggal_terbit'),
            'gambar' => $gambar,
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        $this->Berita_model->insert($data);
        $this->session->set_flashdata('success', 'Berita berhasil ditambahkan.');
        redirect('berita');
    }
    public function ubah_berita($id){
        $data['berita'] = $this->Berita_model->get_by_id($id);

        if (!$data['berita']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/berita/ubah_berita', $data);
    }
    public function update($id) {
        $this->load->model('Berita_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('berita/ubah_berita/' . $id);
                return;
            } 
        }

        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'penulis' => $this->input->post('penulis'),
            'tanggal_terbit' => $this->input->post('tanggal_terbit'),
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        if ($gambar) {
            $data['gambar'] = $gambar;
        }

        $this->Berita_model->update($id, $data);
        $this->session->set_flashdata('success', 'Berita berhasil diperbarui.');
        redirect('berita');
    }
    public function hapus_berita($id) {
        $this->load->model('Berita_model');
        $berita = $this->Berita_model->get_by_id($id);

        if(!$berita){
            $this->session->set_flashdata('error', 'Berita tidak ditemukan.');
            redirect('berita');
        }

        // hapus gambar jika ada
        if(!empty($berita->gambar) && file_exists('./uploads/berita/' . $berita->gambar)) {
            unlink('./uploads/berita/' . $berita->gambar);
        }

        $this->Berita_model->delete($id);
        $this->session->set_flashdata('success', 'Berita berhasil dihapus.');
        redirect('berita');
    }
}