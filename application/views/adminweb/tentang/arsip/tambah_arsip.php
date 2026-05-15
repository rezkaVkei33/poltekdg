<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH DATA ARSIP</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('arsip/simpan_arsip'); ?>" enctype="multipart/form-data">
                                <!-- NAMA ARSIP -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Nama Arsip</label>
                                  <input type="text" class="form-control" name="nama_dokumen" required>
                              </div>
                              <!-- KETERANGAN -->
                              <p>
                                <small>Keterangan :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="keterangan" rows="5" required></textarea>
                            </div>
                              <!-- FILE -->
                              <div class="form-group">
                                  <label>Upload File</label>
                                  <input type="file" name="file_upload" class="input-group input-group-outline mb-3">
                                  <small class="form-text text-muted">Format dokumen: pdf, doc, docx. Maksimal ukuran: 5MB.</small>
                                </div>
                                <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('arsip'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
