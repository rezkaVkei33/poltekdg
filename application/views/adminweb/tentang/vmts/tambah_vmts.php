<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH VMTS</h2>
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
<div class="modal fade" id="dataModal" tabindex="-1" data-bs-backdrop="static" data-return-url="<?= base_url('vmts'); ?>">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="color: #7a561f;" id="modalTitle">TAMBAH VMTS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body p-4">
                <form id="dataForm" method="POST" action="<?= base_url('vmts/simpan_vmts') ?>" enctype="multipart/form-data">
                                                <!-- TANDA TANGAN -->
                                              <div class="mb-3">
                                                  <label class="form-label fw-semibold">Nama VM</label>
                                                  <input type="text" class="form-control" name="nama_vm" required>
                                              </div>
                                              <!-- VISI -->
                                              <label class="form-label fw-semibold">Visi :</label>
                                              <div class="mb-3">
                                
                                                <textarea class="form-control" name="visi" rows="5" required></textarea>
                                              </div>
                                              <!-- MISI -->
                                              <label class="form-label fw-semibold">Misi :</label>
                                              <div class="mb-3">
                                
                                                <textarea class="form-control" name="misi" rows="5" required></textarea>
                                              </div>
                                              <!-- TUJUAN -->
                                              <label class="form-label fw-semibold">Tujuan :</label>
                                              <div class="mb-3">
                                
                                                <textarea class="form-control" name="tujuan" rows="5" required></textarea>
                                              </div>
                                              <!-- STRATEGI -->
                                              <label class="form-label fw-semibold">Strategi :</label>
                                              <div class="mb-3">
                                
                                                <textarea class="form-control" name="strategi" rows="5" required></textarea>
                                              </div>
                                              <!-- PROSPEK KERJA -->
                                              <label class="form-label fw-semibold">Prospek Kerja :</label>
                                              <div class="mb-3">
                                
                                                <textarea class="form-control" name="prospek_kerja" rows="5" required></textarea>
                                              </div>
                                            </form>
            </div>
            <div class="modal-footer border-0 pt-0 pb-4">
                <button type="button" class="btn btn-outline-poltek" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-poltek" form="dataForm">Simpan Data</button>
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
