<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Kegiatan_model');
    }
    
    public function index() {
        $data = [
            'title' => 'Kegiatan - Poltek DG',
            'subtitle' => 'Kegiatan',
            'kegiatan' => $this->Kegiatan_model->get_all()
        ];
        $this->load->view('adminweb/tentang/kegiatan/kegiatan', $data);
    }
    public function tambah_kegiatan() {
        $this->load->view('adminweb/tentang/kegiatan/tambah_kegiatan');
    }
    public function simpan_kegiatan() {
        $this->load->model('Kegiatan_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/kegiatan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kegiatan/tambah_kegiatan');
                return;
            } 
        }
        
        // validasi input
        $data = array(
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'lokasi' => $this->input->post('lokasi'),
            'gambar' => $gambar,
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        $this->Kegiatan_model->insert($data);
        $this->session->set_flashdata('success', 'Kegiatan berhasil ditambahkan.');
        redirect('kegiatan');
    }
    public function ubah_kegiatan($id){
        $data['kegiatan'] = $this->Kegiatan_model->get_by_id($id);

        if (!$data['kegiatan']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/kegiatan/ubah_kegiatan', $data);
    }
    public function update($id) {
        $this->load->model('Kegiatan_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/kegiatan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $gambar = '';

        if(!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                 // hapus gambar lama jika ada
                if(!empty($kegiatan->gambar) && file_exists('./uploads/kegiatan/' . $kegiatan->gambar)) {
                    unlink('./uploads/kegiatan/' . $kegiatan->gambar);
                }
                
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kegiatan/ubah_kegiatan/' . $id);
                return;
            } 
        }

        // validasi input
        $data = array(
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'lokasi' => $this->input->post('lokasi'),
            'gambar' => !empty($gambar) ? $gambar : null,
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        if(!empty($gambar)){
            $data['gambar'] = $gambar;
        }
        $this->Kegiatan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kegiatan berhasil diperbarui.');
        redirect('kegiatan');
    }
    public function hapus_kegiatan($id) {
        $this->load->model('Kegiatan_model');
        $kegiatan = $this->Kegiatan_model->get_by_id($id);

        if(!$kegiatan){
            $this->session->set_flashdata('error', 'kegiatan tidak ditemukan.');
            redirect('kegiatan');
        }

        // hapus gambar jika ada
        if(!empty($kegiatan->gambar) && file_exists('./uploads/kegiatan/' . $kegiatan->gambar)) {
            unlink('./uploads/kegiatan/' . $kegiatan->gambar);
        }

        $this->Kegiatan_model->delete($id);
        $this->session->set_flashdata('success', 'kegiatan berhasil dihapus.');
        redirect('kegiatan');
    }
}