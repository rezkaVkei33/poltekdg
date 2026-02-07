<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php $this->load->view('adminweb/styles'); ?>
  <title>
    <?= isset($title) ? $title : 'Register Akun - Poltek DG' ?>
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
  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5 class="mb-0">Data Pengguna</h5>
           <!-- Message -->
            <?php if($this->session->flashdata('success')): ?>
              <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-3">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Lengkap</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td><?= $user->nama_lengkap; ?></td>
                  <td><?= $user->username; ?></td>
                  <td><?= $user->role; ?></td>
                  <td>
                    <a href="<?= base_url('register/edit/' . $user->id); ?>" class="btn btn-warning btn-sm">
                      <i class="material-symbols-rounded opacity-5">edit</i>
                    Ubah</a>
                    <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_user-<?= $user->id; ?>">
                      <i class="material-symbols-rounded opacity-5">delete</i>
                    Hapus</a>
                   <!-- Modal Hapus Akun -->
                <div class="modal fade" id="hapus_user-<?= $user->id; ?>" tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title text-white" id="modalLabel">HAPUS AKUN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                          </div>
                          <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin <br>
                            menghapus Akun dari <strong><?= $user->username; ?></strong>?</p>
                          </div>
                          <div class="modal-footer">
                            <a href="<?= base_url('register/delete/' . $user->id); ?>" class="btn btn-danger">Ya, Hapus</a> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- End Modal Hapus Akun -->
                  </td>
                </tr>
                <?php endforeach; ?>
                    <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center text-danger">Tidak ada data pengguna.</td>
                </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- FORM TAMBAH/EDIT -->
    <div class="col-md-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h5 class="mb-0"><?= isset($edit) ? 'Ubah Pengguna' : 'Tambah Pengguna' ?></h5>
        </div>
        <div class="card-body">
          <form action="<?= isset($edit) ? base_url('register/update/' . $edit->id) : base_url('register/simpan_register') ?>" method="post">
            <div class="input-group input-group-outline mb-3">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" value="<?= isset($edit) ? $edit->nama_lengkap : '' ?>" required>
            </div>
            <div class="input-group input-group-outline mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" value="<?= isset($edit) ? $edit->username : '' ?>" required>
            </div>
            <div class="input-group input-group-outline mb-3">
              <label for="password" class="form-label">Password <?= isset($edit) ? '(Kosongkan jika tidak diubah)' : '' ?></label>
              <input type="password" name="password" class="form-control" <?= isset($edit) ? '' : 'required' ?>>
            </div>
            <button type="submit" class="btn btn-primary"><?= isset($edit) ? 'Update' : 'Simpan' ?></button>
            <?php if (isset($edit)): ?>
            <a href="<?= base_url('register'); ?>" class="btn btn-secondary">Batal</a>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- End Table -->
        
  <!-- end konten -->
     
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
    <script>
      // Inisialisasi semua modal
      var myModal = document.querySelectorAll('.modal');
      myModal.forEach(function(modal) {
        new bootstrap.Modal(modal);
      });
    </script>

</body>

</html>