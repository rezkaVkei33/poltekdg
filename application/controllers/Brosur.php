<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brosur extends MY_Controller
{
    private $upload_path = './uploads/brosur/';
    private $image_fields = ['img_1', 'img_2', 'img_3'];

    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('Brosur_model');
    }

    public function index()
    {
        $keyword = trim((string) $this->input->get('q', TRUE));
        $per_page = 10;
        $total_rows = $this->Brosur_model->count_filtered($keyword);
        $offset = $this->admin_pagination_offset($total_rows, $per_page);

        $this->pagination->initialize($this->admin_pagination_config(base_url('brosur'), $total_rows, $per_page));

        $data = [
            'title' => 'Brosur - Admin PoltekDG',
            'subtitle' => 'Brosur',
            'brosur' => $this->Brosur_model->get_paginated($per_page, $offset, $keyword),
            'keyword' => $keyword,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'start_no' => $offset + 1,
            'pagination_links' => $this->pagination->create_links()
        ];

        $this->load->view('adminweb/tentang/brosur/brosur', $data);
    }

    public function tambah_brosur()
    {
        $this->load->view('adminweb/tentang/brosur/tambah_brosur');
    }

    public function simpan_brosur()
    {
        $images = $this->upload_images();
        if ($images === FALSE) {
            redirect('brosur/tambah_brosur');
            return;
        }

        $this->Brosur_model->insert(array_merge($this->brosur_data(), $images));
        $this->session->set_flashdata('success', 'Brosur berhasil ditambahkan.');
        redirect('brosur');
    }

    public function ubah_brosur($id)
    {
        $data['brosur'] = $this->Brosur_model->get_by_id((int) $id);

        if (!$data['brosur']) {
            show_404();
        }

        $this->load->view('adminweb/tentang/brosur/update_brosur', $data);
    }

    public function update($id)
    {
        $brosur = $this->Brosur_model->get_by_id((int) $id);
        if (!$brosur) {
            show_404();
        }

        $images = $this->upload_images();
        if ($images === FALSE) {
            redirect('brosur/ubah_brosur/' . $id);
            return;
        }

        $data = $this->brosur_data();
        foreach ($this->image_fields as $field) {
            if (!empty($images[$field])) {
                $data[$field] = $images[$field];
            }
        }

        if ($this->Brosur_model->update((int) $id, $data)) {
            foreach ($this->image_fields as $field) {
                if (!empty($images[$field]) && !empty($brosur->{$field})) {
                    $this->delete_image($brosur->{$field});
                }
            }
            $this->session->set_flashdata('success', 'Brosur berhasil diperbarui.');
        } else {
            foreach ($images as $filename) {
                $this->delete_image($filename);
            }
            $this->session->set_flashdata('error', 'Brosur gagal diperbarui.');
        }

        redirect('brosur');
    }

    public function hapus_brosur($id)
    {
        $brosur = $this->Brosur_model->get_by_id((int) $id);
        if (!$brosur) {
            $this->session->set_flashdata('error', 'Brosur tidak ditemukan.');
            redirect('brosur');
            return;
        }

        if ($this->Brosur_model->delete((int) $id)) {
            foreach ($this->image_fields as $field) {
                $this->delete_image($brosur->{$field});
            }
            $this->session->set_flashdata('success', 'Brosur berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Brosur gagal dihapus.');
        }

        redirect('brosur');
    }

    private function brosur_data()
    {
        return [
            'judul' => $this->input->post('judul', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'judul_en' => $this->input->post('judul_en', TRUE),
            'deskripsi_en' => $this->input->post('deskripsi_en', TRUE)
        ];
    }

    private function upload_images()
    {
        if (!is_dir($this->upload_path) && !mkdir($this->upload_path, 0755, TRUE)) {
            $this->session->set_flashdata('error', 'Folder unggahan brosur tidak dapat dibuat.');
            return FALSE;
        }

        $config = [
            'upload_path' => $this->upload_path,
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size' => 3072,
            'encrypt_name' => TRUE
        ];
        $this->load->library('upload', $config);

        $images = array_fill_keys($this->image_fields, '');
        foreach ($this->image_fields as $field) {
            if (empty($_FILES[$field]['name'])) {
                continue;
            }

            if (!$this->upload->do_upload($field)) {
                foreach ($images as $filename) {
                    $this->delete_image($filename);
                }
                $this->session->set_flashdata('error', strip_tags($this->upload->display_errors()));
                return FALSE;
            }

            $images[$field] = $this->upload->data('file_name');
        }

        return $images;
    }

    private function delete_image($filename)
    {
        if (!empty($filename) && file_exists($this->upload_path . $filename)) {
            unlink($this->upload_path . $filename);
        }
    }
}
