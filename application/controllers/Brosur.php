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
        $data = [
            'title' => 'Brosur - Admin PoltekDG',
            'subtitle' => 'Brosur',
            'brosur' => $this->Brosur_model->get_single()
        ];

        $this->load->view('adminweb/tentang/brosur/brosur', $data);
    }

    public function tambah_brosur()
    {
        if ($this->Brosur_model->get_single()) {
            redirect('brosur/ubah_brosur');
            return;
        }

        $this->load->view('adminweb/tentang/brosur/tambah_brosur');
    }

    public function simpan_brosur()
    {
        if ($this->Brosur_model->get_single()) {
            $this->session->set_flashdata('error', 'Hanya satu data brosur yang dapat disimpan. Silakan ubah data yang ada.');
            redirect('brosur');
            return;
        }

        $images = $this->upload_images();
        if ($images === FALSE) {
            redirect('brosur/tambah_brosur');
            return;
        }

        $this->Brosur_model->insert(array_merge($this->brosur_data(), $images));
        $this->session->set_flashdata('success', 'Brosur berhasil ditambahkan.');
        redirect('brosur');
    }

    public function ubah_brosur()
    {
        $data['brosur'] = $this->Brosur_model->get_single();

        if (!$data['brosur']) {
            show_404();
        }

        $this->load->view('adminweb/tentang/brosur/update_brosur', $data);
    }

    public function update()
    {
        $brosur = $this->Brosur_model->get_single();
        if (!$brosur) {
            show_404();
        }

        $images = $this->upload_images();
        if ($images === FALSE) {
            redirect('brosur/ubah_brosur');
            return;
        }

        $data = $this->brosur_data();
        foreach ($this->image_fields as $field) {
            if (!empty($images[$field])) {
                $data[$field] = $images[$field];
            }
        }

        if ($this->Brosur_model->update($data)) {
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

            $filename = $this->upload->data('file_name');
            $webp_filename = $this->convert_to_webp($filename);
            if ($webp_filename === FALSE) {
                foreach ($images as $uploaded_filename) {
                    $this->delete_image($uploaded_filename);
                }
                $this->delete_image($filename);
                $this->session->set_flashdata('error', 'Gambar tidak dapat dikonversi ke format WebP.');
                return FALSE;
            }

            $images[$field] = $webp_filename;
        }

        return $images;
    }

    private function delete_image($filename)
    {
        if (!empty($filename) && file_exists($this->upload_path . $filename)) {
            unlink($this->upload_path . $filename);
        }
    }

    private function convert_to_webp($filename)
    {
        $source = $this->upload_path . $filename;
        $target = $this->upload_path . pathinfo($filename, PATHINFO_FILENAME) . '.webp';

        if (strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'webp') {
            return $filename;
        }

        if (!is_executable('/usr/bin/convert')) {
            return FALSE;
        }

        $command = '/usr/bin/convert ' . escapeshellarg($source)
            . ' -quality 82 ' . escapeshellarg($target) . ' 2>&1';
        exec($command, $output, $exit_code);

        if ($exit_code !== 0 || !file_exists($target)) {
            return FALSE;
        }

        if ($source !== $target) {
            unlink($source);
        }

        return basename($target);
    }
}
