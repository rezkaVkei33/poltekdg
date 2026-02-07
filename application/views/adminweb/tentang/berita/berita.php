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
                    <h3 class="mb-0 h4 font-weight-bolder">DATA BERITA</h3>
                    </p>
                    
                    <!-- Message -->
                     <?php if($this->session->flashdata('success')): ?>
                      <div class="alert alert-success text-white alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                   
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
        <div class="table-responsive">
                
          <!-- konten -->


          <!-- Table -->
    <div class="container">
      <a class="btn btn-success btn-sm" href="<?= base_url('berita/tambah_berita'); ?>">
        <i class="material-symbols-rounded opacity-5">add</i>
        Tambah Data
      </a>
    </div>
    <div class="table-responsive">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penulis</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Terbit</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Update</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; ?>
    <?php if(!empty($berita)) : ?>
        <?php foreach($berita as $data): ?>
            <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $data->judul; ?></td>
            <td class="trim-text"><?= $data->isi; ?></td>
            <td><?= $data->penulis; ?></td>
            <td><?= date('d-m-Y', strtotime($data->tanggal_terbit)); ?></td>
            <td><?= date('d-m-Y', strtotime($data->tanggal_update)); ?></td>
            <td>
                <?php if(!empty($data->gambar)): ?>
                    <img src="<?= base_url('uploads/berita/'.$data->gambar); ?>" alt="Gambar_berita" class="img-fluid " style="max-width: 100px;">
                <?php else: ?>
                Tidak ada gambar
                <?php endif; ?>
            </td>
            <td class="text-center">
                <a href="<?= base_url('berita/ubah_berita/' . $data->id_berita); ?>" class="btn btn-warning btn-sm"> 
                <i class="material-symbols-rounded opacity-5">edit</i>
                Ubah
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus_berita-<?= $data->id_berita; ?>"> 
                <i class="material-symbols-rounded opacity-5">delete</i>
                Hapus
                </button>

              <!-- Modal Hapus Sambutan -->
            <div class="modal fade" id="hapus_berita-<?= $data->id_berita; ?>" tabindex="-1" aria-labelledby="modalLabel>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title text-white" id="modalLabel">HAPUS BERITA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                      </div>
                      <div class="modal-body text-center">
                        <p>Apakah Anda yakin ingin <br>
                        menghapus Berita <strong><?= $data->judul; ?></strong>?</p>
                      </div>
                      <div class="modal-footer">
                        <a href="<?= base_url('berita/hapus_berita/' . $data->id_berita); ?>" class="btn btn-danger">Ya, Hapus</a> 
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- End Modal Hapus Sambutan -->
            </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-danger ">Tidak ada Berita.</td>
            </tr>
        <?php endif; ?>
    </tbody>
  </table>
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

<!-- footer -->
<?php $this->load->view('adminweb/footer'); ?>