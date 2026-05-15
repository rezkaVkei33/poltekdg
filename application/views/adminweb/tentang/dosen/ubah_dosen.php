<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH DOSEN</h2>
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
<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('dosen'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;" id="modalTitle">UBAH DOSEN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="POST" action="<?= base_url('dosen/update/' . $dosen->id_dosen); ?>" enctype="multipart/form-data">
                                            <!-- NAMA -->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Nama Dosen</label>
                                                  <input type="text" value="<?= $dosen->nama; ?>" class="form-control" name="nama" required>
                                              </div>
                                            <!-- GELAR -->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Gelar</label>
                                                  <input type="text" value="<?= $dosen->gelar; ?>" class="form-control" name="gelar" required>
                                              </div>
                                            <!-- BIDANG KEAHLIAN -->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Bidang Keahlian</label>
                                                  <input type="text" value="<?= $dosen->bidang_keahlian; ?>" class="form-control" name="bidang_keahlian" required>
                                              </div>
                                              <!-- Email-->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Email</label>
                                                  <input type="email" value="<?= $dosen->email; ?>" class="form-control" name="email">
                                              </div>
                                              <!-- Telepon-->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Telepon</label>
                                                  <input type="number" value="<?= $dosen->telepon; ?>" class="form-control" name="telepon">
                                              </div>
                                            <!-- STATUS -->
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select class="form-select" name="status" required>
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value="Tetap" <?= $dosen->status == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                                <option value="Tidak Tetap" <?= $dosen->status == 'Tidak Tetap' ? 'selected' : '' ?>>Tidak Tetap</option>
                                                </select>
                                            </div>
                                            <!-- PRODI -->
                                            <div class="mb-3">
                                            <label class="form-label fw-semibold">Program Studi</label>
                                                <select class="form-select" name="prodi" required>
                                                <option value="" disabled selected>Pilih Prodi</option>
                                                <option value="D3-Sistem Informasi" <?= $dosen->prodi == 'D3-Sistem Informasi' ? 'selected' : '' ?>>D3-Sistem Informasi</option>
                                                <option value="D3-Perhotelan" <?= $dosen->prodi == 'D3-Perhotelan' ? 'selected' : '' ?>>D3-Perhotelan</option>
                                            </select>
                                            </div>
                                            <!-- GAMBAR -->
                                              <div class="mb-3">
                                                <label class="form-label fw-semibold">Gambar Lama</label><br>
                                                <?php if ($dosen->gambar): ?>
                                                    <img src="<?= base_url('uploads/dosen/' . $dosen->gambar) ?>" width="100"><br>
                                                <?php endif; ?>
                                                <input type="file" name="gambar" class="form-control">
                                             </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4">
                <button type="button" class="btn btn-outline-poltek" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-poltek" form="dataForm">Ubah Data</button>
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
