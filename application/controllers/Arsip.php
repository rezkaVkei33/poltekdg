<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Arsip_model');
    }

    public function index() {
        $data['arsip'] = $this->Arsip_model->get_all();
        $this->load->view('adminweb/tentang/arsip/arsip',$data);
    }
    public function tambah_arsip() {
        $this->load->view('adminweb/tentang/arsip/tambah_arsip');
    }
    public function simpan_arsip() {
        $config['upload_path'] = './uploads/arsip/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size'] = 5120;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $file_upload = '';
        if (!empty($_FILES['file_upload']['name'])) {
            if ($this->upload->do_upload('file_upload')) {
                $file_upload = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('arsip/tambah');
                return;
            }
        }

        $data = [
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'keterangan' => $this->input->post('keterangan'),
            'file_upload' => $file_upload
        ];

        $this->Arsip_model->insert($data);
        $this->session->set_flashdata('success', 'Dokumen berhasil diarsipkan.');
        redirect('arsip');
    }
    public function ubah_arsip($id){
        $data['arsip'] = $this->Arsip_model->get_by_id($id);

        if (!$data['arsip']) {
            show_404();
        }

        $this->load->view('adminweb/tentang/arsip/ubah_arsip', $data);
    }
    public function update($id) {
        $config['upload_path'] = './uploads/arsip/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx';
        $config['max_size'] = 5120;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $file_upload = '';
        if (!empty($_FILES['file_upload']['name'])) {
            if ($this->upload->do_upload('file_upload')) {
                $file_upload = $this->upload->data('file_name');

                if (!empty($arsip->file_upload) && file_exists('./uploads/arsip/' . $arsip->file_upload)) {
                unlink('./uploads/arsip/' . $arsip->file_upload);
            }} else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('arsip/ubah_arsip/' . $id);
                return;
            }
        }

        if(!empty($file_upload)){
            $data['file_upload'] = $file_upload;
        }

        $data = [
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'keterangan' => $this->input->post('keterangan'),
            'file_upload' => !empty($file_upload) ? $file_upload : $this->input->post('existing_file')
        ];

        if (empty($file_upload)) {
        unset($data['file_upload']);
    }

        $this->Arsip_model->update($id, $data);
        $this->session->set_flashdata('success', 'Dokumen berhasil diperbarui.');
        redirect('arsip');
    }
    public function hapus_arsip($id) {
        $arsip = $this->Arsip_model->get_by_id($id);
        if ($arsip && !empty($arsip->file_upload)) {
            if (file_exists('./uploads/arsip/' . $arsip->file_upload)) {
                unlink('./uploads/arsip/' . $arsip->file_upload);
            }
        }
        $this->Arsip_model->delete($id);
        $this->session->set_flashdata('success', 'Dokumen berhasil dihapus.');
        redirect('arsip');
    }

}