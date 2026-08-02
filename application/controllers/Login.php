<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('adminweb/akun/login');
    }

    public function proses_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek apakah username ada
        $user = $this->Auth_model->get_by_username($username);
        if (!$user) {
            $this->session->set_flashdata('error', 'Username tidak ditemukan.');
            redirect('login');
            return;
        }

        // Verifikasi password
        if (password_verify($password, $user->password)) {
            // Set session data lengkap
            $this->session->set_userdata([
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'nama_lengkap' => $user->nama_lengkap,
                'logged_in' => TRUE // <<< ini yang paling penting!
            ]);

            redirect('admin'); // Ganti dengan halaman yang sesuai setelah login
        } else {
            $this->session->set_flashdata('error', 'Password salah.');
            redirect('login');
        }

        
        
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}