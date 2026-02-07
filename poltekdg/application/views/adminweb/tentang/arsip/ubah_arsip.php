<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('adminweb/styles'); ?>
  <title>
    <?= isset($title) ? $title : 'Ubah Arsip - Poltek DG' ?>
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
                    <h3 class="mb-0 h4 font-weight-bolder">UBAH ARSIP</h3>
                    </p>
                   
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
                <div class="container"> 
                    <form method="POST" action="<?= base_url('arsip/update/' . $arsip->id_arsip); ?>" enctype="multipart/form-data">
                        <!-- NAMA ARSIP -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Nama Arsip</label> 
                          <input type="text" value="<?= $arsip->nama_dokumen; ?>" class="form-control" name="nama_dokumen" required>
                      </div>
                      <!-- KETERANGAN -->
                      <p>
                        <small>Keterangan :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="keterangan" rows="5" required><?= $arsip->keterangan; ?></textarea>
                    </div>
                      <!-- FILE -->
                      <div class="mb-3">
                        <label class="form-label">Upload File</label>
                        <input type="file" name="file_upload" class="form-control">
                        <small class="form-text text-muted">Format dokumen: pdf, doc, docx. Maksimal ukuran: 5MB.</small>
                      </div>
                      <?php if (!empty($arsip->file_upload)): ?>
                        <div class="mb-2">
                          <small>File saat ini: 
                            <a href="<?= base_url('uploads/arsip/' . $arsip->file_upload); ?>" target="_blank">
                              <?= $arsip->file_upload; ?>
                            </a>
                          </small>
                        </div>
                      <?php endif; ?>
                        <!-- TOMBOL SIMPAN -->
                         <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="<?= base_url('arsip'); ?>" class="btn btn-secondary">Kembali</a>
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