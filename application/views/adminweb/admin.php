<?php $this->load->view('adminweb/header'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- navbar -->
    <?php $this->load->view('adminweb/navbar'); ?>

    <div class="container-fluid py-2">

      <div class="row">

      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h2 class="mb-3 text-center">Selamat Datang <?= $this->session->userdata('nama_lengkap'); ?> <br><strong>Halaman Admin Poltek DG</strong></h2>
            <p>
              Halaman ini merupakan pusat kendali untuk mengelola seluruh data dan fitur yang tersedia pada sistem informasi Poltek DG. Silakan gunakan menu di sidebar untuk mengakses fitur-fitur berikut:
            </p>
            <ul>
              <li><strong>Dashboard:</strong> Melihat ringkasan data dan statistik penting.</li>
              <li><strong>Manajemen User:</strong> Tambah, edit, atau hapus data pengguna/admin.</li>
              <li><strong>Manajemen Data Mahasiswa:</strong> Kelola data mahasiswa, termasuk penambahan, pengubahan, dan penghapusan data.</li>
              <li><strong>Manajemen Data Dosen:</strong> Kelola data dosen yang terdaftar di Poltek DG.</li>
              <li><strong>Manajemen Mata Kuliah:</strong> Atur data mata kuliah yang tersedia.</li>
              <li><strong>Manajemen Jadwal:</strong> Atur jadwal perkuliahan dan kegiatan akademik lainnya.</li>
              <li><strong>Laporan:</strong> Lihat dan unduh laporan terkait data akademik dan administrasi.</li>
              <li><strong>Pengaturan:</strong> Ubah pengaturan sistem sesuai kebutuhan institusi.</li>
            </ul>
            <hr>
            <p>
              Untuk bantuan lebih lanjut, silakan hubungi administrator sistem atau lihat dokumentasi yang tersedia.
            </p>
          </div>
        </div>
      </div>
        
      </div>
        
          </div>
        </div>

        
      </div>
      <!-- end konten -->
    </main>
    <!-- footer -->
     <?php $this->load->view('adminweb/footer'); ?>
   