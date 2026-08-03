<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_Admin_Controller.php');

class Pengumuman extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Pengumuman_model');
    }

    public function index() {
        $data = [
            'title' => 'Pengumuman - Poltek DG',
            'subtitle' => 'Pengumuman',
            'pengumuman' => $this->Pengumuman_model->get_all()
        ];
        $this->load->view('adminweb/tentang/pengumuman/pengumuman', $data);
    }
    public function tambah_pengumuman(){
        $this->load->view('adminweb/tentang/pengumuman/tambah_pengumuman');
    }
    public function simpan_pengumuman() {
        $this->load->model('Pengumuman_model');
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            'penulis' => $this->input->post('penulis'),
            'status' => $this->input->post('status')
        );
        $this->Pengumuman_model->insert($data);
        $this->session->set_flashdata('success', 'Pengumuman berhasil ditambahkan.');
        redirect('pengumuman');
    }
    public function ubah_pengumuman($id){
        $data['pengumuman'] = $this->Pengumuman_model->get_by_id($id);

        if (!$data['pengumuman']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/pengumuman/ubah_pengumuman', $data);
    }
    public function update($id){
        $this->load->model('Pengumuman_model');
        $pengumuman = $this->Pengumuman_model->get_by_id($id);
        
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'tanggal' => $this->input->post('tanggal'),
            'penulis' => $this->input->post('penulis'),
            'status' => $this->input->post('status')
        );
        $this->Pengumuman_model->update($id, $data);
        $this->session->set_flashdata('success', 'Pengumuman berhasil diubah.');
        redirect('pengumuman');
    }
    public function hapus_pengumuman($id) {
        $this->load->model('Pengumuman_model');
        $this->Pengumuman_model->delete($id);
        $this->session->set_flashdata('success', 'Pengumuman berhasil dihapus.');
        redirect('pengumuman');
    }
}