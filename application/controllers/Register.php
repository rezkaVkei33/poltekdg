<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Auth_model');
        $this->load->library('session');
    }

    public function index() {
        $data['users'] = $this->Auth_model->get_by_users(); 

        $this->load->view('adminweb/tentang/register/register', $data);
    }

    public function simpan_register(){
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $nama_lengkap = $this->input->post('nama_lengkap');

        // Cek apakah username sudah ada
        $user_exist = $this->Auth_model->get_by_username($username);
        if($user_exist) {
            $this->session->set_flashdata('error', 'Username sudah terdaftar.');
            redirect('register');
            return;
        } 

        $data = [
            'username' => $username,
            'password' => $password,
            'nama_lengkap' => $nama_lengkap,
            'role' => 'admin',
        ];
        $this->Auth_model->insert($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil.');
        redirect('register'); 
    }
    public function edit($id) {
    $data['users'] = $this->Auth_model->get_by_users(); // Untuk tampilkan tabel di sebelah kiri
    $data['edit'] = $this->Auth_model->get_by_id($id); // Ambil data yang akan diedit

    // Tampilkan form yang sama, tetapi dengan data yang diisi
    $this->load->view('adminweb/tentang/register/register', $data);
}

    public function update($id) {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Siapkan data update
    $data = [
        'nama_lengkap' => $nama_lengkap,
        'username' => $username,
    ];

    // Update password jika diisi
    if (!empty($password)) {
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $this->Auth_model->update($id, $data);
    $this->session->set_flashdata('success', 'Data pengguna berhasil diupdate.');
    redirect('register');
    }
    public function delete($id) {
        // Hapus data pengguna berdasarkan ID
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data pengguna berhasil dihapus.');
        redirect('register');
    }
}
