<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('adminweb/styles'); ?>
  <title>
    <?= isset($title) ? $title : 'Tambah Dosen - Poltek DG' ?>
</title> 
  
  <link rel="stylesheet" href="<?= base_url('material-dashboard/assets/css/material-dashboard.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .modal-dialog {
      width: 500px;
      resize: both;
      overflow: auto;
    }
  </style>
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
</head>


<body class="g-sidenav-show  bg-gray-100">
  
  <?php $this->load->view('adminweb/sidebar'); ?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- navbar -->
    <?php $this->load->view('adminweb/navbar'); ?>

    <div class="container-fluid py-2">
      <div class="row mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="row">
                  <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">TAMBAH DOSEN</h3>
                    </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
                <div class="container"> 
                    <form method="POST" action="<?= base_url('dosen/simpan_dosen'); ?>" enctype="multipart/form-data">
                    <!-- NAMA -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Nama Dosen</label>
                          <input type="text" class="form-control" name="nama" required>
                      </div>
                    <!-- GELAR -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Gelar</label>
                          <input type="text" class="form-control" name="gelar" required>
                      </div>
                    <!-- BIDANG KEAHLIAN -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Bidang Keahlian</label>
                          <input type="text" class="form-control" name="bidang_keahlian" required>
                      </div>
                      <!-- Email-->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" name="email">
                      </div>
                      <!-- Telepon-->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Telepon</label>
                          <input type="number" class="form-control" name="telepon">
                      </div>
                    <!-- STATUS -->
                    <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Tidak Tetap">Tidak Tetap</option>
                    </select>
                    </div>
                    <!-- PRODI -->
                    <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="prodi" required>
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option value="D3-Sistem Informasi">D3-Sistem Informasi</option>
                        <option value="Perhotelan">D3-Perhotelan</option>
                    </select>
                    </div>
                    <!-- GAMBAR -->
                      <div class="form-group">
                          <label>Upload Gambar</label>
                          <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                          <small class="form-text text-muted">Format gambar: jpg, jpeg, png. Maksimal ukuran: 3MB.</small>
                        </div>
                       <!-- TOMBOL SIMPAN -->
                         <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('dosen'); ?>" class="btn btn-secondary">Kembali</a>
                      </div>
                    </form>
                </div>
          <!-- konten -->

   
</div>
</div>
</div>
</div>
<!-- Modal Tambah Sambutan -->
</div>


<!-- end card -->

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