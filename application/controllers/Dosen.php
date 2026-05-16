<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Dosen_model');
    }

    public function index() {
        $data = [
            'title' => 'Dosen - Poltek DG',
            'subtitle' => 'Dosen',
            'dosen' => $this->Dosen_model->get_all()
        ];
        $this->load->view('adminweb/tentang/dosen/dosen', $data);
    }

    public function tambah_dosen() {
        $this->load->view('adminweb/tentang/dosen/tambah_dosen');
    }

    public function simpan_dosen() {
        $this->load->model('Dosen_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/dosen/';
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
                redirect('dosen/tambah_dosen');
                return;
            } 
        }

        // validasi input
        $data = array(
            'nama' => $this->input->post('nama'),
            'gelar' => $this->input->post('gelar'),
            'bidang_keahlian' => $this->input->post('bidang_keahlian'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'gambar' => $gambar,
            'status' => $this->input->post('status'),
            'prodi' => $this->input->post('prodi'),
        );

        $this->Dosen_model->insert($data);

        $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan.');
        redirect('dosen');
    }
    public function ubah_dosen($id) {
        $data['dosen'] = $this->Dosen_model->get_by_id($id);

        if (!$data['dosen']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/dosen/ubah_dosen', $data);
    }
    public function update($id){
        $this->load->model('Dosen_model');

        // konfirmasi upload gambar
        $config['upload_path'] = './uploads/dosen/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $dosen = $this->Dosen_model->get_by_id($id);
        $gambar = $dosen->gambar; 

        if(!empty($_FILES['gambar']['name'])){
            // proses upload gambar
            if($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // hapus gambar lama jika ada
                if(!empty($dosen->gambar) && file_exists('./uploads/dosen/' . $dosen->gambar)) {
                    unlink('./uploads/dosen/' . $dosen->gambar);
                }
            }else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('dosen/ubah_dosen/' . $id);
                return;
            }
        }

        // validasi input
        $data = array(
            'nama' => $this->input->post('nama'),
            'gelar' => $this->input->post('gelar'),
            'bidang_keahlian' => $this->input->post('bidang_keahlian'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'gambar' => $gambar,
            'status' => $this->input->post('status'),
            'prodi' => $this->input->post('prodi'),
        );
        if(!empty($gambar)){
            $data['gambar'] = $gambar;
        }

        $this->Dosen_model->update($id, $data);
        $this->session->set_flashdata('success', 'Dosen berhasil diupdate.');
        redirect('dosen');
    }
    public function hapus_dosen($id) {
        $this->load->model('Dosen_model');
        $dosen = $this->Dosen_model->get_by_id($id);

        if(!$dosen){
            $this->session->set_flashdata('error', 'Dosen tidak ditemukan.');
            redirect('dosen');
        }

        // hapus gambar jika ada
        if(!empty($dosen->gambar) && file_exists('./uploads/dosen/' . $dosen->gambar)) {
            unlink('./uploads/dosen/' . $dosen->gambar);
        }

        $this->Dosen_model->delete($id);
        $this->session->set_flashdata('success', 'Dosen berhasil dihapus.');
        redirect('dosen');
    }
}