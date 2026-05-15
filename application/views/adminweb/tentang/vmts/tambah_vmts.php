<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">TAMBAH VMTS</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('vmts/simpan_vmts') ?>" enctype="multipart/form-data">
                                <!-- TANDA TANGAN -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Nama VM</label>
                                  <input type="text" class="form-control" name="nama_vm" required>
                              </div>
                              <!-- VISI -->
                              <p>
                                <small>Visi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="visi" rows="5" required></textarea>
                              </div>
                              <!-- MISI -->
                              <p>
                                <small>Misi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="misi" rows="5" required></textarea>
                              </div>
                              <!-- TUJUAN -->
                              <p>
                                <small>Tujuan :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="tujuan" rows="5" required></textarea>
                              </div>
                              <!-- STRATEGI -->
                              <p>
                                <small>Strategi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="strategi" rows="5" required></textarea>
                              </div>
                              <!-- PROSPEK KERJA -->
                              <p>
                                <small>Prospek Kerja :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="prospek_kerja" rows="5" required></textarea>
                              </div>
                                <!-- TOMBOL SIMPAN -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('vmts'); ?>" class="btn btn-secondary">Kembali</a> 
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
