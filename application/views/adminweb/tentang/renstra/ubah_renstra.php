<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH RENCANA STRATEGIS</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('renstra/update/' . $renstra->id_renstra); ?>" enctype="multipart/form-data">
                                <!-- PROGRAM STUDI -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Judul</label>
                                  <input type="text" value="<?= $renstra->judul; ?>" class="form-control" name="judul" required>
                              </div>
                              <!-- DESKRIPSI -->           
                              <p><small>Deskripsi :</small></p>
                              <div class="input-group input-group-outline mb-3">
                                <textarea class="form-control" name="isi" rows="5" required><?= $renstra->isi; ?></textarea>
                              </div>
                              <!-- FILE -->
                              <div class="mb-3">
                                <label class="form-label">Upload File</label>
                                <input type="file" name="file_upload" class="form-control">
                                <small class="form-text text-muted">Format dokumen: pdf, doc, docx. Maksimal ukuran: 5MB.</small>
                              </div>
                              <?php if (!empty($renstra->file_upload)): ?>
                                <div class="mb-2">
                                  <small>File saat ini: 
                                    <a href="<?= base_url('uploads/renstra/' . $renstra->file_upload); ?>" target="_blank">
                                      <?= $renstra->file_upload; ?>
                                    </a>
                                  </small>
                                </div>
                              <?php endif; ?>
                                <!-- TOMBOL UBAH -->
                               <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('renstra'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
