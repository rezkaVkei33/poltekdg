<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vmts extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Vmts_model');
    }

    public function index() {
        $data = [
            'title' => 'VMTS - Poltek DG',
            'subtitle' => 'VMTS',
            'data_vmts' => $this->Vmts_model->get_all()
        ];
        $this->load->view('adminweb/tentang/vmts/vmts', $data);
    }
    public function tambah_vmts() {
        $this->load->view('adminweb/tentang/vmts/tambah_vmts');
    }
    public function simpan_vmts() {
        $this->load->model('Vmts_model');
        // Validasi input
        $data = array(
            'nama_vm' => $this->input->post('nama_vm'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'tujuan' => $this->input->post('tujuan'),
            'strategi' => $this->input->post('strategi'),
            'prospek_kerja' => $this->input->post('prospek_kerja'),
            'visi_en' => $this->input->post('visi_en'),
            'misi_en' => $this->input->post('misi_en'),
            'tujuan_en' => $this->input->post('tujuan_en'),
            'strategi_en' => $this->input->post('strategi_en'),
            'prospek_kerja_en' => $this->input->post('prospek_kerja_en')
        );

        $this->Vmts_model->insert($data);
        $this->session->set_flashdata('success', 'Data Visi Misi berhasil ditambahkan.');
        redirect('vmts');
    }
    public function ubah_vmts($id) {
        $data['vmts'] = $this->Vmts_model->get_by_id($id);

        if (!$data['vmts']) {
            show_404();
        }
        $this->load->view('adminweb/tentang/vmts/ubah_vmts', $data);
    }
    public function update($id) {
        $this->load->model('Vmts_model');
        // Validasi input
        $data = array(
            'nama_vm' => $this->input->post('nama_vm'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'tujuan' => $this->input->post('tujuan'),
            'prospek_kerja' => $this->input->post('prospek_kerja'),
            'strategi' => $this->input->post('strategi'),
            'visi_en' => $this->input->post('visi_en'),
            'misi_en' => $this->input->post('misi_en'),
            'tujuan_en' => $this->input->post('tujuan_en'),
            'strategi_en' => $this->input->post('strategi_en'),
            'prospek_kerja_en' => $this->input->post('prospek_kerja_en')
        );

        $this->Vmts_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data Visi Misi berhasil diubah.');
        redirect('vmts');
    }
    public function hapus_vmts($id) {
        $this->load->model('Vmts_model');
        $this->Vmts_model->delete($id);
        $this->session->set_flashdata('success', 'Data Visi Misi berhasil dihapus.');
        redirect('vmts');
    }
}