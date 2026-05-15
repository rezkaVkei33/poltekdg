<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH KALENDER AKADEMIK</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('kalender/update/' . $kalender_akademik->id_kalender); ?>" enctype="multipart/form-data"> 
                                <!-- JUDUL -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Judul</label>
                                  <input value="<?= $kalender_akademik->judul; ?>" type="text" class="form-control" name="judul" required>
                              </div>
                              <!-- DESKRIPSI -->
                              <p>
                                <small>Deskripsi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label> 
                                <textarea class="form-control" name="deskripsi" rows="5" required><?= $kalender_akademik->deskripsi; ?></textarea>
                              </div>
                              <!-- TAHUN AKADEMIK -->
                            <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="tahun_akademik" required>
                                <option value="" disabled selected>Pilih Tahun Akademik</option>
                                <option value="2024/2025"<?= $kalender_akademik->tahun_akademik == '2024/2025' ? 'selected' : '' ?>>2024/2025</option>
                                <option value="2025/2026"<?= $kalender_akademik->tahun_akademik == '2025/2026' ? 'selected' : '' ?>>2025/2026</option>
                                <option value="2026/2027"<?= $kalender_akademik->tahun_akademik == '2026/2027' ? 'selected' : '' ?>>2026/2027</option>
                                <option value="2027/2028"<?= $kalender_akademik->tahun_akademik == '2027/2028' ? 'selected' : '' ?>>2027/2028</option>
                            </select>
                            </div>
                            <!-- TANGGAL MULAI -->
                             <p>
                                <small>Tanggal Mulai :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label"></label>
                                  <input type="date" value="<?= $kalender_akademik->tanggal_mulai; ?>" class="form-control" name="tanggal_mulai" required>
                              </div>
                               <!-- TANGGAL SELESAI -->
                                <p>
                                <small>Tanggal Selesai :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label"></label>
                                  <input type="date" value="<?= $kalender_akademik->tanggal_selesai; ?>" class="form-control" name="tanggal_selesai" required>
                              </div>
                              <!-- GAMBAR -->
                              <div class="form-group">
                                <label>Gambar Lama</label><br>
                                <?php if ($kalender_akademik->gambar): ?>
                                    <img src="<?= base_url('uploads/kalender/' . $kalender_akademik->gambar) ?>" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                             </div>
                                <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('kalender'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
