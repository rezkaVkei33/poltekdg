<?php $this->load->view('adminweb/header'); ?>
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
                    <h3 class="mb-0 h4 font-weight-bolder">TAMBAH BERITA</h3>
                    </p>
                   
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
                <div class="container"> 
                    <form method="POST" action="<?= base_url('berita/simpan_berita'); ?>" enctype="multipart/form-data">
                        <!-- JUDUL -->
                      <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Judul</label>
                          <input type="text" class="form-control" name="judul" required>
                      </div>
                      <!-- DESKRIPSI -->
                      <p>
                        <small>Deskripsi :</small>
                      </p>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <textarea class="form-control" name="isi" rows="5" required></textarea>
                      </div>
                      <!-- PENULIS -->
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis" required>
                    </div>
                      <!-- TANGGAL TERBIT -->
                       <p>
                        <small>Tanggal Terbit :</small>
                      </p>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="date" class="form-control" name="tanggal_terbit" required>
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
                        <a href="<?= base_url('berita'); ?>" class="btn btn-secondary">Kembali</a>
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

<!-- footer -->
<?php $this->load->view('adminweb/footer'); ?>