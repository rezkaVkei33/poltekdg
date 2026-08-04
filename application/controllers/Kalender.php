<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->checkLogin();

        $this->load->model('Kalender_model');
    }

    public function index() {
        $data = [
            'title' => 'Kalender Akademik - Poltek DG',
            'subtitle' => 'Kalender Akademik',
            'kalender_akademik' => $this->Kalender_model->get_all()
        ];
        $this->load->view('adminweb/tentang/kalender/kalender', $data);
    }
    public function tambah_kalender() {
        $this->load->view('adminweb/tentang/kalender/tambah_kalender');
    }
    public function simpan_kalender(){
        $this->load->model('Kalender_model');
        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/kalender/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $gambar = '';
        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = convert_image_to_webp('./uploads/kalender/', $upload_data['file_name']);
                if ($gambar === FALSE) {
                    @unlink($upload_data['full_path']);
                    $this->session->set_flashdata('error', 'Gambar tidak dapat dikonversi ke WebP. Pastikan ekstensi GD PHP aktif.');
                    redirect('kalender/tambah_kalender');
                    return;
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kalender/tambah_kalender');
                return;
            } 
        }

        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'deskripsi_en' => $this->input->post('deskripsi_en'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'gambar' => $gambar,
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
        );
        $this->Kalender_model->insert($data);
        $this->session->set_flashdata('success', 'Kalender akademik berhasil ditambahkan.');
        redirect('kalender');
    }
    public function ubah_kalender($id){
        $data['kalender_akademik'] = $this->Kalender_model->get_by_id($id);

        if (!$data['kalender_akademik']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/kalender/ubah_kalender', $data);
    }
    public function update($id){
        $this->load->model('Kalender_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/kalender/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $kalender = $this->Kalender_model->get_by_id($id);
        $gambar = $kalender->gambar;

        if(!empty($_FILES['gambar']['name'])){
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = convert_image_to_webp('./uploads/kalender/', $upload_data['file_name']);
                if ($gambar === FALSE) {
                    @unlink($upload_data['full_path']);
                    $this->session->set_flashdata('error', 'Gambar tidak dapat dikonversi ke WebP. Pastikan ekstensi GD PHP aktif.');
                    redirect('kalender/ubah_kalender/' . $id);
                    return;
                }
                // hapus gambar lama jika ada
                if(!empty($kalender->gambar) && file_exists('./uploads/kalender/' . $kalender->gambar)) {
                    unlink('./uploads/kalender/' . $kalender->gambar);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('kalender/ubah_kalender/' . $id);
                return;
            } 
        }

        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'deskripsi_en' => $this->input->post('deskripsi_en'),
            'tahun_akademik' => $this->input->post('tahun_akademik'),
            'gambar' => $gambar,
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
        );

        if(!empty($gambar)){
            $data['gambar'] = $gambar;
        }

        $this->Kalender_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kalender akademik berhasil diperbarui.');
        redirect('kalender');
    }
    public function hapus_kalender($id) {
        $this->load->model('kalender_model');
        $kalender = $this->Kalender_model->get_by_id($id);

        if(!$kalender){
            $this->session->set_flashdata('error', 'kalender tidak ditemukan.');
            redirect('kalender');
        }

        // hapus gambar jika ada
        if(!empty($kalender->gambar) && file_exists('./uploads/kalender/' . $kalender->gambar)) {
            unlink('./uploads/kalender/' . $kalender->gambar);
        }

        $this->Kalender_model->delete($id);
        $this->session->set_flashdata('success', 'kalender berhasil dihapus.');
        redirect('kalender');
    }
}
