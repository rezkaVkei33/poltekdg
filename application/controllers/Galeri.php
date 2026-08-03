<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->checkLogin();

        $this->load->model('Galeri_model');
    }

    public function index() {
        $keyword = trim((string) $this->input->get('q', TRUE));
        $per_page = 10;
        $total_rows = $this->Galeri_model->count_filtered($keyword);
        $offset = $this->admin_pagination_offset($total_rows, $per_page);

        $this->pagination->initialize($this->admin_pagination_config(base_url('galeri'), $total_rows, $per_page));

        $data = [
            'title' => 'Galeri - Poltek DG',
            'subtitle' => 'Galeri',
            'galeri' => $this->Galeri_model->get_paginated($per_page, $offset, $keyword),
            'keyword' => $keyword,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'start_no' => $offset + 1,
            'pagination_links' => $this->pagination->create_links()
        ];
        $this->load->view('adminweb/tentang/galeri/galeri', $data);
    }
    public function tambah_galeri() {
        $this->load->view('adminweb/tentang/galeri/tambah_galeri');
    }
    public function simpan_galeri(){
        $this->load->model('Galeri_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png';
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
                redirect('galeri/tambah_galeri');
                return;
            } 
        }

        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar,
            'status' => $this->input->post('status'),
        );
        $this->Galeri_model->insert($data);
        $this->session->set_flashdata('success', 'Galeri berhasil ditambahkan.');
        redirect('galeri');
    }
    public function ubah_galeri($id) {
        $data['galeri'] = $this->Galeri_model->get_by_id($id);

        if (!$data['galeri']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/galeri/ubah_galeri', $data);
    }
    public function update($id){
        $this->load->model('Galeri_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $galeri = $this->Galeri_model->get_by_id($id);
        $gambar = $galeri->gambar;

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($galeri->gambar) && file_exists('./uploads/galeri/' . $galeri->gambar)) {
                    unlink('./uploads/galeri/' . $galeri->gambar);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('galeri/ubah_galeri/' . $id);
                return;
            } 
        }
        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status' => $this->input->post('status'),
            'gambar' => $gambar,
        );

        if(!empty($gambar)){
            $data['gambar'] = $gambar;
        }

        $this->Galeri_model->update($id, $data);
        $this->session->set_flashdata('success', 'Galeri berhasil diubah.');
        redirect('galeri');
    }
    public function hapus_galeri($id) {
        $this->load->model('Galeri_model');
        $galeri = $this->Galeri_model->get_by_id($id);

        if (!$galeri) {
            $this->session->set_flashdata('error', 'Galeri tidak ditemukan.');
            redirect('galeri');
            return;
        }

        // Hapus gambar jika ada
        if (!empty($galeri->gambar) && file_exists('./uploads/galeri/' . $galeri->gambar)) {
            unlink('./uploads/galeri/' . $galeri->gambar);
        }

        $this->Galeri_model->delete($id);
        $this->session->set_flashdata('success', 'Galeri berhasil dihapus.');
        redirect('galeri');
    }
}
