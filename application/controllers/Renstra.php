<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renstra extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Renstra_model');
    }

    public function index() {
        $data = [
            'title' => 'Renstra - Poltek DG',
            'subtitle' => 'Renstra',
            'renstra' => $this->Renstra_model->get_all()
        ];
        $this->load->view('adminweb/tentang/renstra/renstra', $data);
    }
    public function tambah_renstra() {
        $this->load->view('adminweb/tentang/renstra/tambah_renstra');
    }
    public function simpan_renstra() {
        $this->load->model('Renstra_model');

        // konfigurasi upload file
        $config['upload_path'] = './uploads/renstra/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 5120; // 5MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $file_upload = '';
        
        if(!empty($_FILES['file_upload']['name'])){
            if ($this->upload->do_upload('file_upload')) {
                $upload_data = $this->upload->data();
                $file_upload = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('renstra/tambah_renstra');
                return;
            } 
        }

        // validasi input
        $data = array(
            'judul' => $this->input->post('judul'),
            'file_upload' => $file_upload,
            'isi' => $this->input->post('isi'),
        );

        $this->Renstra_model->insert($data);

        $this->session->set_flashdata('success', 'Renstra berhasil ditambahkan.');
        redirect('renstra');
    }
    public function ubah_renstra($id) {
        $data['renstra'] = $this->Renstra_model->get_by_id($id);

        if (!$data['renstra']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/renstra/ubah_renstra', $data);
    }
    public function update($id) {
    $this->load->model('Renstra_model');

    // Konfigurasi upload file
    $config['upload_path'] = './uploads/renstra/';
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size'] = 5120; // 5MB
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    $renstra = $this->Renstra_model->get_by_id($id);
    $file_upload = $renstra->file_upload;

    if (!empty($_FILES['file_upload']['name'])) {
        if ($this->upload->do_upload('file_upload')) {
            $upload_data = $this->upload->data();
            $file_upload = $upload_data['file_name'];

            if (!empty($renstra->file_upload) && file_exists('./uploads/renstra/' . $renstra->file_upload)) {
                unlink('./uploads/renstra/' . $renstra->file_upload);
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('renstra/ubah_renstra/' . $id);
            return;
        }
    }

    $data = array(
        'judul' => $this->input->post('judul'),
        'isi' => $this->input->post('isi'),
        'file_upload' => $file_upload
    );

    if (empty($file_upload)) {
        unset($data['file_upload']);
    }

    $this->Renstra_model->update($id, $data);
    $this->session->set_flashdata('success', 'Renstra berhasil diubah.');
    redirect('renstra');
    }
    public function hapus_renstra($id) {
        $renstra = $this->Renstra_model->get_by_id($id);
        if (!empty($renstra->file_upload) && file_exists('./uploads/renstra/' . $renstra->file_upload)) {
            unlink('./uploads/renstra/' . $renstra->file_upload);
        }
        $this->Renstra_model->delete($id);
        $this->session->set_flashdata('success', 'Renstra berhasil dihapus.');
        redirect('renstra');
    }

}