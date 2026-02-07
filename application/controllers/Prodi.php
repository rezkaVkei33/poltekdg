<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Prodi_model');
    }

    public function index() {
        $data['prodi'] = $this->Prodi_model->get_all();
        $this->load->view('adminweb/tentang/prodi/prodi', $data);
    }
    public function tambah_prodi() {
        $this->load->view('adminweb/tentang/prodi/tambah_prodi');
    }
    public function simpan_prodi(){
        $this->load->model('Prodi_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/prodi/';
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
                redirect('prodi/tambah_prodi');
                return;
            } 
        }
        // validasi input
        $data = array(
            'nama_prodi' => $this->input->post('nama_prodi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar,
        );

        $this->Prodi_model->insert($data);
        $this->session->set_flashdata('success', 'Program Studi berhasil ditambahkan.');
        redirect('prodi');
    }
    public function ubah_prodi($id) {
        $data['prodi'] = $this->Prodi_model->get_by_id($id);

        if (!$data['prodi']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/prodi/ubah_prodi', $data);
    }
    public function update($id){
        $this->load->model('Prodi_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/prodi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $prodi = $this->Prodi_model->get_by_id($id);
        $gambar = $prodi->gambar;

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // Hapus gambar lama jika ada
                if (!empty($prodi->gambar) && file_exists('./uploads/prodi/' . $prodi->gambar)) {
                    unlink('./uploads/prodi/' . $prodi->gambar);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('prodi/ubah_prodi/' . $id);
                return;
            } 
        }
        // validasi input
        $data = array(
            'nama_prodi' => $this->input->post('nama_prodi'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $gambar,
        );

        if(!empty($gambar)){
            $data['gambar'] = $gambar;
        }

        $this->Prodi_model->update($id, $data);
        $this->session->set_flashdata('success', 'Program Studi berhasil diubah.');
        redirect('prodi');
    }
    public function hapus_prodi($id) {
        $this->load->model('Prodi_model');
        $prodi = $this->Prodi_model->get_by_id($id);

        if (!$prodi) {
            $this->session->set_flashdata('error', 'Program Studi tidak ditemukan.');
            redirect('prodi');
            return;
        }

        // Hapus gambar jika ada
        if (!empty($prodi->gambar) && file_exists('./uploads/prodi/' . $prodi->gambar)) {
            unlink('./uploads/prodi/' . $prodi->gambar);
        }

        $this->Prodi_model->delete($id);
        $this->session->set_flashdata('success', 'Program Studi berhasil dihapus.');
        redirect('prodi');
    }

}