<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('adminweb/styles'); ?>
  <title>
    <?= isset($title) ? $title : 'ubah VMTS - Poltek DG' ?>
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
                    <h3 class="mb-0 h4 font-weight-bolder">UBAH VMTS</h3>
                    </p>
                   
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
                <div class="container"> 
                    <form method="POST" action="<?= base_url('vmts/update/' . $vmts->id_vm) ?>" enctype="multipart/form-data">
                        <!-- TANDA TANGAN -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Nama VM</label>
                          <input type="text" value="<?= $vmts->nama_vm; ?>" class="form-control" name="nama_vm" required>
                      </div>
                      <!-- VISI -->
                      <p>
                        <small>Visi :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="visi" rows="5" required><?= $vmts->visi; ?></textarea>
                      </div>
                      <!-- MISI -->
                      <p>
                        <small>Misi :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="misi" rows="5" required><?= $vmts->misi; ?></textarea>
                      </div>
                      <!-- TUJUAN -->
                      <p>
                        <small>Tujuan :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="tujuan" rows="5" required><?= $vmts->tujuan; ?></textarea>
                      </div>
                      <!-- STRATEGI -->
                      <p>
                        <small>Strategi :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="strategi" rows="5" required><?= $vmts->strategi; ?></textarea>
                      </div>
                      <!-- PROSPEK KERJA -->
                      <p>
                        <small>Prospek Kerja :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="prospek_kerja" rows="5"><?= $vmts->prospek_kerja; ?></textarea>
                      </div>
                       <!-- TOMBOL SIMPAN -->
                         <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="<?= base_url('vmts'); ?>" class="btn btn-secondary">Kembali</a>
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