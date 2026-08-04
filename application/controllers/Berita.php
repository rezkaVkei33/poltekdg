<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->checkLogin();
        
        $this->load->model('Berita_model');
    }

    public function index() {
        $keyword = trim((string) $this->input->get('q', TRUE));
        $per_page = 10;
        $total_rows = $this->Berita_model->count_filtered($keyword);
        $offset = $this->admin_pagination_offset($total_rows, $per_page);

        $this->pagination->initialize($this->admin_pagination_config(base_url('berita'), $total_rows, $per_page));

        $data = [
            'title' => 'Berita - Poltek DG',
            'subtitle' => 'Berita',
            'berita' => $this->Berita_model->get_paginated($per_page, $offset, $keyword),
            'keyword' => $keyword,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'start_no' => $offset + 1,
            'pagination_links' => $this->pagination->create_links()
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
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = convert_image_to_webp('./uploads/berita/', $upload_data['file_name']);
                if ($gambar === FALSE) {
                    @unlink($upload_data['full_path']);
                    $this->session->set_flashdata('error', 'Gambar tidak dapat dikonversi ke WebP. Pastikan ekstensi GD PHP aktif.');
                    redirect('berita/tambah_berita');
                    return;
                }
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
            'judul_en' => $this->input->post('judul_en'),
            'isi_en' => $this->input->post('isi_en'),
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
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = convert_image_to_webp('./uploads/berita/', $upload_data['file_name']);
                if ($gambar === FALSE) {
                    @unlink($upload_data['full_path']);
                    $this->session->set_flashdata('error', 'Gambar tidak dapat dikonversi ke WebP. Pastikan ekstensi GD PHP aktif.');
                    redirect('berita/ubah_berita/' . $id);
                    return;
                }
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
            'judul_en' => $this->input->post('judul_en'),
            'isi_en' => $this->input->post('isi_en'),
            'penulis' => $this->input->post('penulis'),
            'tanggal_terbit' => $this->input->post('tanggal_terbit'),
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        if ($gambar) {
            $data['gambar'] = $gambar;
            $berita_lama = $this->Berita_model->get_by_id($id);
            if ($berita_lama && !empty($berita_lama->gambar) && file_exists('./uploads/berita/' . $berita_lama->gambar)) {
                unlink('./uploads/berita/' . $berita_lama->gambar);
            }
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
