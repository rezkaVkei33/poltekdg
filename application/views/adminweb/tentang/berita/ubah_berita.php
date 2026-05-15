<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH BERITA</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('berita/update/' . $berita->id_berita); ?>" enctype="multipart/form-data">
                                <!-- JUDUL -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Judul</label>
                                  <input type="text" value="<?= $berita->judul; ?>" class="form-control" name="judul" required>
                              </div>
                              <!-- DESKRIPSI -->
                              <p>
                                <small>Deskripsi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="isi" rows="5" required><?= $berita->isi; ?></textarea>
                              </div>
                              <!-- PENULIS -->
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" value="<?= $berita->penulis; ?>" class="form-control" name="penulis" required>
                            </div>
                              <!-- TANGGAL TERBIT -->
                               <p>
                                <small>Tanggal Terbit :</small>
                              </p>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="date" value="<?= $berita->tanggal_terbit; ?>" class="form-control" name="tanggal_terbit" required>
                            </div>
                               <!-- GAMBAR -->
                              <div class="form-group">
                                <label>Gambar Lama</label><br>
                                <?php if ($berita->gambar): ?>
                                    <img src="<?= base_url('uploads/berita/' . $berita->gambar) ?>" width="100"><br>
                                <?php endif; ?>
                                <input type="file" name="gambar" class="input-group input-group-outline mb-3">
                             </div>
                                <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('berita'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
