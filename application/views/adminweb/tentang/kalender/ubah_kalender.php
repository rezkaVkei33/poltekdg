<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH KALENDER AKADEMIK</h2>
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
<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('kalender'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;" id="modalTitle">UBAH KALENDER AKADEMIK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="POST" action="<?= base_url('kalender/update/' . $kalender_akademik->id_kalender); ?>" enctype="multipart/form-data"> 
                        <!-- JUDUL -->
                      <div class="mb-3">
                          <label class="form-label fw-semibold">Judul</label>
                          <input value="<?= $kalender_akademik->judul; ?>" type="text" class="form-control" name="judul" required>
                      </div>
                      <!-- DESKRIPSI -->
                      <label class="form-label fw-semibold">Deskripsi :</label>
                      <div class="mb-3">
                                 
                        <textarea class="form-control" name="deskripsi" rows="5" required><?= $kalender_akademik->deskripsi; ?></textarea>
                      </div>
                      <!-- TAHUN AKADEMIK -->
                    <div class="mb-3">
                    <label class="form-label fw-semibold">Tahun Akademik</label>
                        <select class="form-select" name="tahun_akademik" required>
                        <option value="" disabled selected>Pilih Tahun Akademik</option>
                        <option value="2024/2025"<?= $kalender_akademik->tahun_akademik == '2024/2025' ? 'selected' : '' ?>>2024/2025</option>
                        <option value="2025/2026"<?= $kalender_akademik->tahun_akademik == '2025/2026' ? 'selected' : '' ?>>2025/2026</option>
                        <option value="2026/2027"<?= $kalender_akademik->tahun_akademik == '2026/2027' ? 'selected' : '' ?>>2026/2027</option>
                        <option value="2027/2028"<?= $kalender_akademik->tahun_akademik == '2027/2028' ? 'selected' : '' ?>>2027/2028</option>
                    </select>
                    </div>
                    <!-- TANGGAL MULAI -->
                     <label class="form-label fw-semibold">Tanggal Mulai :</label>
                      <div class="mb-3">
                                  
                          <input type="date" value="<?= $kalender_akademik->tanggal_mulai; ?>" class="form-control" name="tanggal_mulai" required>
                      </div>
                       <!-- TANGGAL SELESAI -->
                        <label class="form-label fw-semibold">Tanggal Selesai :</label>
                      <div class="mb-3">
                                  
                          <input type="date" value="<?= $kalender_akademik->tanggal_selesai; ?>" class="form-control" name="tanggal_selesai" required>
                      </div>
                      <!-- GAMBAR -->
                      <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Lama</label><br>
                        <?php if ($kalender_akademik->gambar): ?>
                            <img src="<?= base_url('uploads/kalender/' . $kalender_akademik->gambar) ?>" width="100"><br>
                        <?php endif; ?>
                        <input type="file" name="gambar" class="form-control">
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
