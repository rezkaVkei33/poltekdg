<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Sejarah_model');
    }

    public function index(){
        $data = [
            'title' => 'Sejarah - Poltek DG',
            'subtitle' => 'Sejarah',
            'sejarah' => $this->Sejarah_model->get_all()
        ];
        $this->load->view('adminweb/tentang/sejarah/sejarah', $data);
    }
    public function tambah_sejarah() {
        $this->load->view('adminweb/tentang/sejarah/tambah_sejarah');
    }
    public function simpan_sejarah(){
        $this->load->model('Sejarah_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/sejarah/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE; 
        
        
        $this->load->library('upload', $config);

        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {
            // Proses upload gambar
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            }
            else{
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('sejarah/tambah_sejarah');
                return;
            }
        }

        // Validasi input
        $data = array(
            'nama_penulis' => $this->input->post('nama_penulis'),
            'teks_sejarah' => $this->input->post('teks_sejarah'),
            'tanggal_berdiri' => $this->input->post('tanggal_berdiri'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'gambar'=> $gambar,
            'tanggal_update' => date('Y-m-d H:i:s')
        );
        $this->Sejarah_model->insert($data);

        $this->session->set_flashdata('success', 'Sejarah berhasil ditambahkan.');
        redirect('sejarah');
    }
    
    public function ubah_sejarah($id) {
        $this->load->model('Sejarah_model');
        $data['sejarah'] = $this->Sejarah_model->get_by_id($id);

        if(!$data['sejarah']){
            show_404();
        }
        $this->load->view('adminweb/tentang/sejarah/ubah_sejarah', $data);
    }
    public function update($id) {
        $this->load->model('Sejarah_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/sejarah/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE; 

        $this->load->library('upload', $config);

        $sejarah = $this->Sejarah_model->get_by_id($id);
        $gambar = $sejarah->gambar; 

        if (!empty($_FILES['gambar']['name'])) {
            // Proses upload gambar
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                if ($sejarah->gambar && file_exists('./uploads/sejarah/' . $sejarah->gambar)) {
                    unlink('./uploads/sejarah/' . $sejarah->gambar);
                }
            }
            else{
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('sejarah/ubah_sejarah/'.$id);
                return;
            }
        }

        // Validasi input
        $data = array(
            'nama_penulis' => $this->input->post('nama_penulis'),
            'teks_sejarah' => $this->input->post('teks_sejarah'),
            'tanggal_berdiri' => $this->input->post('tanggal_berdiri'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'tanggal_update' => date('Y-m-d H:i:s')
        );
        
        if (!empty($gambar)) {
            $data['gambar'] = $gambar; 
        }
        $this->Sejarah_model->update($id, $data);
        $this->session->set_flashdata('success', 'Sejarah berhasil diubah.'); 
        redirect('sejarah');
    }
    public function hapus_sejarah($id) {
        $this->load->model('Sejarah_model');
        $sejarah = $this->Sejarah_model->get_by_id($id);

        if ($sejarah) {
            if ($sejarah->gambar && file_exists('./uploads/sejarah/' . $sejarah->gambar)) {
                unlink('./uploads/sejarah/' . $sejarah->gambar);
            }
            $this->Sejarah_model->delete($id);
            $this->session->set_flashdata('success', 'Sejarah berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data sejarah tidak ditemukan.');
        }
        redirect('sejarah');
    }
}