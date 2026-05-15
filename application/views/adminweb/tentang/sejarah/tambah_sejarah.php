<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH SEJARAH</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('sejarah/simpan_sejarah') ?>" enctype="multipart/form-data">
                                <!-- TANDA TANGAN -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Nama Penulis</label>
                                  <input type="text" class="form-control" name="nama_penulis" required>
                              </div>
                              <!-- ALAMAT -->
                              <p>
                                <small>Alamat :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="alamat" rows="5" required></textarea>
                            </div>
                              <!-- Tempat-->
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="number" class="form-control" name="telepon">
                            </div>
                            <!-- Tempat-->
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <!-- TANGGAL-->
                            <p>
                                <small>Tanggal Berdiri</small>
                            </p>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">tanggal</label>
                                <input type="date" class="form-control" name="tanggal_berdiri" required>
                              </div>
                              <!-- ISI (textarea) -->
                                <p>
                                  <small>Teks :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="teks_sejarah" rows="5" required></textarea>
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
                                <a href="<?= base_url('sejarah'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
