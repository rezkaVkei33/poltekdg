<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH DOSEN</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('dosen/update/' . $dosen->id_dosen); ?>" enctype="multipart/form-data">
                            <!-- NAMA -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Nama Dosen</label>
                                  <input type="text" value="<?= $dosen->nama; ?>" class="form-control" name="nama" required>
                              </div>
                            <!-- GELAR -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Gelar</label>
                                  <input type="text" value="<?= $dosen->gelar; ?>" class="form-control" name="gelar" required>
                              </div>
                            <!-- BIDANG KEAHLIAN -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Bidang Keahlian</label>
                                  <input type="text" value="<?= $dosen->bidang_keahlian; ?>" class="form-control" name="bidang_keahlian" required>
                              </div>
                              <!-- Email-->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Email</label>
                                  <input type="email" value="<?= $dosen->email; ?>" class="form-control" name="email">
                              </div>
                              <!-- Telepon-->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Telepon</label>
                                  <input type="number" value="<?= $dosen->telepon; ?>" class="form-control" name="telepon">
                              </div>
                            <!-- STATUS -->
                            <div class="input-group input-group-outline mb-3">
                                <select class="form-control" name="status" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="Tetap" <?= $dosen->status == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                <option value="Tidak Tetap" <?= $dosen->status == 'Tidak Tetap' ? 'selected' : '' ?>>Tidak Tetap</option>
                                </select>
                            </div>
                            <!-- PRODI -->
                            <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="prodi" required>
                                <option value="" disabled selected>Pilih Prodi</option>
                                <option value="D3-Sistem Informasi" <?= $dosen->prodi == 'D3-Sistem Informasi' ? 'selected' : '' ?>>D3-Sistem Informasi</option>
                                <option value="D3-Perhotelan" <?= $dosen->prodi == 'D3-Perhotelan' ? 'selected' : '' ?>>D3-Perhotelan</option>
                            </select>
                            </div>
                            <!-- GAMBAR -->
                              <div class="form-group">
                                <label>Gambar Lama</label><br>
                                <?php if ($dosen->gambar): ?>
                                    <img src="<?= base_url('uploads/dosen/' . $dosen->gambar) ?>" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                             </div>
                               <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('dosen'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
