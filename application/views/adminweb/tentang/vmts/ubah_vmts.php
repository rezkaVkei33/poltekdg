<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH VMTS</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('vmts/update/' . $vmts->id_vm) ?>" enctype="multipart/form-data">
                                <!-- TANDA TANGAN -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Nama VM</label>
                                  <input type="text" value="<?= $vmts->nama_vm; ?>" class="form-control" name="nama_vm" required>
                              </div>
                              <!-- VISI -->
                              <p>
                                <small>Visi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="visi" rows="5" required><?= $vmts->visi; ?></textarea>
                              </div>
                              <!-- MISI -->
                              <p>
                                <small>Misi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="misi" rows="5" required><?= $vmts->misi; ?></textarea>
                              </div>
                              <!-- TUJUAN -->
                              <p>
                                <small>Tujuan :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="tujuan" rows="5" required><?= $vmts->tujuan; ?></textarea>
                              </div>
                              <!-- STRATEGI -->
                              <p>
                                <small>Strategi :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="strategi" rows="5" required><?= $vmts->strategi; ?></textarea>
                              </div>
                              <!-- PROSPEK KERJA -->
                              <p>
                                <small>Prospek Kerja :</small>
                              </p>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <textarea class="form-control" name="prospek_kerja" rows="5"><?= $vmts->prospek_kerja; ?></textarea>
                              </div>
                               <!-- TOMBOL SIMPAN -->
                                 <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('vmts'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
