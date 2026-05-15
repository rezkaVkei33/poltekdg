<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH SAMBUTAN</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form action="<?= base_url('index.php/sambutan/update/' . $sambutan->id_sambutan) ?>" method="post" enctype="multipart/form-data">
                                  <!-- TANDA TANGAN -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Tanda Tangan</label> 
                                  <input type="text" value="<?= $sambutan->tanda_tangan; ?>" class="form-control" name="tanda_tangan" required>
                              </div>
                                <!-- Tempat-->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Tempat</label>
                                  <input type="text" value="<?= $sambutan->tempat; ?>" class="form-control" name="tempat" required>
                              </div>
          
                              <!-- ISI (textarea) -->
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="teks_sambutan" rows="5" required><?= $sambutan->teks_sambutan; ?></textarea>
                              </div>
            
                              <!-- GAMBAR -->
                              <div class="form-group">
                                <label>Gambar Lama</label><br>
                                <?php if ($sambutan->gambar): ?>
                                    <img src="<?= base_url('uploads/sambutan/' . $sambutan->gambar) ?>" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                             </div>
                                <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('sambutan'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
