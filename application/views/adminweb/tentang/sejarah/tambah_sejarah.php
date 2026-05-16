<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH SEJARAH</h2>
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
<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('sejarah'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;" id="modalTitle">TAMBAH SEJARAH</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="POST" action="<?= base_url('sejarah/simpan_sejarah') ?>" enctype="multipart/form-data">
                    <!-- TANDA TANGAN -->
                  <div class="mb-3">
                      <label class="form-label fw-semibold">Nama Penulis</label>
                      <input type="text" class="form-control" name="nama_penulis" required>
                  </div>
                  <!-- ALAMAT -->
                  <label class="form-label fw-semibold">Alamat :</label>
                  <div class="mb-3">
                                
                    <textarea class="form-control" name="alamat" rows="5" required></textarea>
                </div>
                  <!-- Tempat-->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Telepon</label>
                    <input type="number" class="form-control" name="telepon">
                </div>
                <!-- Tempat-->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <!-- TANGGAL-->
                <label class="form-label fw-semibold">Tanggal Berdiri</label>
                <div class="mb-3">
                    <label class="form-label fw-semibold">tanggal</label>
                    <input type="date" class="form-control" name="tanggal_berdiri" required>
                  </div>
                  <!-- ISI (textarea) -->
                    <label class="form-label fw-semibold">Teks :</label>
                  <div class="mb-3">
                                
                    <textarea class="form-control" name="teks_sejarah" rows="5" required></textarea>
                  </div>
                  <!-- GAMBAR -->
                  <div class="mb-3">
                      <label class="form-label fw-semibold">Upload Gambar</label>
                      <input type="file" name="gambar" class="form-control">
                      <small class="form-text text-muted">Format gambar: jpg, jpeg, png. Maksimal ukuran: 3MB.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-primary" form="dataForm">Simpan Data</button>
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
