<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('adminweb/styles'); ?>
  <title><?= isset($title) ? $title : 'Admin - Poltek DG' ?></title> 
  
  <link rel="stylesheet" href="<?= base_url('material-dashboard/assets/css/material-dashboard.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .modal-dialog {
      width: 500px;
      resize: both;
      overflow: auto;
    }
  </style>
</head>

<style>
    /* Pastikan modal berada di atas segalanya */
  .modal {
    z-index: 2000;
  }

  .modal-backdrop {
    z-index: 1900;
    background-color: rgba(0, 0, 0, 0.5);
  }

  /* Blur sidebar saat modal terbuka (opsional) */
  body.modal-open .sidenav {
    filter: blur(10px);
    pointer-events: none;
  }

</style>

<body class="g-sidenav-show  bg-gray-100">
  
  <?php $this->load->view('adminweb/sidebar'); ?>
  
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

      <!-- footer -->
       <?php $this->load->view('adminweb/footer'); ?>
       
      </div>
      <!-- end konten -->
    
    
    </main>
    <?php $this->load->view('adminweb/scripts'); ?>

    <script src="<?= base_url('material-dashboard/assets/js/core/popper.min.js'); ?>"></script>
    
    <script>
        document.querySelectorAll('.trim-text').forEach(cell => {
          const maxLength = 20; // Panjang maksimal teks
          const text = cell.textContent;
          if (text.length > maxLength) {
            cell.textContent = text.substring(0, maxLength) + '...';
          }
        });
      </script>

      <!-- modal geser dengan kursor-->
      <script>
        // Ambil elemen modal
        const modal = document.querySelector('.modal-dialog');
        const header = document.getElementById('modalHeader');
      
        let isDragging = false;
        let offsetX, offsetY;
      
        header.style.cursor = 'move';
      
        header.addEventListener('mousedown', (e) => {
          isDragging = true;
          offsetX = e.clientX - modal.offsetLeft;
          offsetY = e.clientY - modal.offsetTop;
        });
      
        document.addEventListener('mousemove', (e) => {
          if (isDragging) {
            modal.style.position = 'absolute';
            modal.style.margin = 0;
            modal.style.left = `${e.clientX - offsetX}px`;
            modal.style.top = `${e.clientY - offsetY}px`;
          }
        });
      
        document.addEventListener('mouseup', () => {
          isDragging = false;
        });
      </script>
           
      
</body>

</html>