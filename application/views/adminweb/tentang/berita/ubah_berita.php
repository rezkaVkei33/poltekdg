<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH BERITA</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
        <div>
            <button type="button" class="btn btn-poltek" data-bs-toggle="modal" data-bs-target="#dataModal">
                <i class="bi bi-pencil-square me-2"></i>Buka Form
            </button>
        </div>
    </div>
</main>

<!-- Modal Add/Edit Data -->
<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('berita'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;" id="modalTitle">UBAH BERITA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="POST" action="<?= base_url('berita/update/' . $berita->id_berita); ?>" enctype="multipart/form-data">
                        <!-- JUDUL -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul</label>
                        <input type="text" value="<?= $berita->judul; ?>" class="form-control" name="judul" required>
                    </div>
                    <!-- DESKRIPSI -->
                    <label class="form-label fw-semibold">Deskripsi :</label>
                    <div class="mb-3">
                                                
                        <textarea class="form-control" name="isi" rows="5" required><?= $berita->isi; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul (English)</label>
                        <input type="text" value="<?= html_escape($berita->judul_en); ?>" class="form-control" name="judul_en">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi (English)</label>
                        <textarea class="form-control" name="isi_en" rows="5"><?= html_escape($berita->isi_en); ?></textarea>
                    </div>
                    <!-- PENULIS -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Penulis</label>
                        <input type="text" value="<?= $berita->penulis; ?>" class="form-control" name="penulis" required>
                    </div>
                    <!-- TANGGAL TERBIT -->
                    <label class="form-label fw-semibold">Tanggal Terbit :</label>
                    <div class="mb-3">
                                                
                        <input type="date" value="<?= $berita->tanggal_terbit; ?>" class="form-control" name="tanggal_terbit" required>
                    </div>
                    <!-- GAMBAR -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Lama</label><br>
                        <?php if ($berita->gambar): ?>
                            <img src="<?= base_url('uploads/berita/' . $berita->gambar) ?>" width="100"><br>
                        <?php endif; ?>
                        <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-primary" form="dataForm">Ubah Data</button>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modalElement = document.getElementById('dataModal');
    const dataModal = new bootstrap.Modal(modalElement);
    let isSubmitting = false;

    document.getElementById('dataForm').addEventListener('submit', function() {
      isSubmitting = true;
    });

    modalElement.addEventListener('hidden.bs.modal', function() {
      if (!isSubmitting) {
        window.location.href = modalElement.dataset.returnUrl;
      }
    });

    dataModal.show();
  });
</script>

<?php $this->load->view('adminweb/partials/footer'); ?>
