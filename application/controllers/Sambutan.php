<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_Admin_Controller.php');

class Sambutan extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Sambutan_model');
    }

    public function index(){
        $data = [
            'title' => 'Sambutan - Poltek DG',
            'subtitle' => 'Sambutan',
            'sambutan' => $this->Sambutan_model->get_all()
        ];
        $this->load->view('adminweb/tentang/sambutan/sambutan', $data);
    }
    public function tambah_sambutan(){
        $this->load->view('adminweb/tentang/sambutan/tambah_sambutan');

    }

    public function simpan_sambutan(){
        $this->load->model('Sambutan_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/sambutan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Format gambar yang diizinkan
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE; // Enkripsi nama file untuk menghindari duplikasi
        
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
                redirect('sambutan/tambah_sambutan');
                return;
            }
        }

        // Validasi input
        $data = array(
            'teks_sambutan' => $this->input->post('teks_sambutan'),
            'tempat' => $this->input->post('tempat'),
            'tanda_tangan' => $this->input->post('tanda_tangan'),
            'gambar' => $gambar,
            'tanggal_update' => date('Y-m-d H:i:s')
        );
        $this->Sambutan_model->insert($data);

        $this->session->set_flashdata('success', 'Sambutan berhasil ditambahkan.');
        redirect('sambutan');

    }
    public function ubah_sambutan($id) {
        $this->load->model('Sambutan_model');
        $data['sambutan'] = $this->Sambutan_model->get_by_id($id);
        
        if (!$data['sambutan']) {
            show_404();
        }

        $this->load->view('adminweb/tentang/sambutan/ubah_sambutan', $data);
    }
    public function update($id) {
        $this->load->model('Sambutan_model');

        // konfigurasi upload gambar
        $config['upload_path'] = './uploads/sambutan/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
        $config['max_size'] = 3072; // 3MB
        $config['encrypt_name'] = TRUE; 

        $this->load->library('upload', $config);

        $sambutan = $this->Sambutan_model->get_by_id($id);
        $gambar = $sambutan->gambar; 

        if (!empty($_FILES['gambar']['name'])) {
            // Proses upload gambar
            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // hapus file gambar lama jika ada
                if(!empty($sambutan->gambar) && file_exists('./uploads/sambutan/' . $sambutan->gambar)) {
                    unlink('./uploads/sambutan/' . $sambutan->gambar);
                }
            }
            else{
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('sambutan/ubah_sambutan/' . $id);
                return;
            }
        }

        // Validasi input
        $data = array(
            'teks_sambutan' => $this->input->post('teks_sambutan'),
            'tempat' => $this->input->post('tempat'),
            'tanda_tangan' => $this->input->post('tanda_tangan'),
            'tanggal_update' => date('Y-m-d H:i:s')
        );

        if (!empty($gambar)) {
            $data['gambar'] = $gambar; // hanya update gambar jika ada
        }
        $this->Sambutan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Sambutan berhasil diperbarui.');
         // Redirect ke halaman sambutan
        redirect('sambutan');
    }

    public function hapus_sambutan($id){
        $this->load->model('Sambutan_model');

        $sambutan = $this->Sambutan_model->get_by_id($id);

        if(!$sambutan){
            $this->session->set_flashdata('error', 'Sambutan tidak ditemukan.');
            redirect('sambutan');
        }

        // Hapus gambar jika ada
        if(!empty($sambutan->gambar) && file_exists('./uploads/sambutan/' . $sambutan->gambar)) {
            unlink('./uploads/sambutan/' . $sambutan->gambar);
        }

        $this->Sambutan_model->delete($id);
        $this->session->set_flashdata('success', 'Sambutan berhasil dihapus.');
        
    }


}