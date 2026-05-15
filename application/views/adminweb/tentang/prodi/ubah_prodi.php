<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH PROGRAM STUDI</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('prodi/update/' . $prodi->id_prodi); ?>" enctype="multipart/form-data">
                                <!-- PROGRAM STUDI -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Program Studi</label> 
                                  <input type="text" value="<?= $prodi->nama_prodi; ?>" class="form-control" name="nama_prodi" required>
                              </div>
                              <!-- DESKRIPSI -->
                              <p>
                                <small>Deskripsi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="deskripsi" rows="5" required><?= $prodi->deskripsi; ?></textarea>
                            </div>
                               <!-- GAMBAR -->
                              <div class="form-group">
                                <label>Gambar Lama</label><br>
                                <?php if ($prodi->gambar): ?>
                                    <img src="<?= base_url('uploads/prodi/' . $prodi->gambar) ?>" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                             </div>
                                <!-- TOMBOL SIMPAN -->
                                <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('prodi'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
