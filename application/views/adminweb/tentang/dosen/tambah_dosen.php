<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH DOSEN</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
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
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
