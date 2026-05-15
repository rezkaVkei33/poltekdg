<?php $this->load->view('adminweb/partials/header'); ?>
<!-- Main Content -->
<main class="admin-landing container my-4">
    <!-- Header Section -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;" id="pageTitle">UBAH KONTAK</h2>
            <p class="text-muted" style="color: #b68b40 !important;" id="pageSubtitle">Lengkapi form berikut sesuai data yang dibutuhkan</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="card-vanilla p-4">
        <form method="POST" action="<?= base_url('kontak/update/' . $kontak->id_kontak); ?>" enctype="multipart/form-data">
                                <!-- KONTAK -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Kontak</label> 
                                  <input type="text" value="<?= $kontak->judul_kontak; ?>" class="form-control" name="nama_prodi" required>
                              </div>
                              <!-- ISI KONTAK -->
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Isi Kontak</label>
                                  <input type="text" value="<?= $kontak->isi_kontak; ?>" class="form-control" name="isi_kontak" required>
                              </div>
                                <!-- TOMBOL SIMPAN -->
                                <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('kontak'); ?>" class="btn btn-secondary">Kembali</a>
                              </div>
                            </form>
    </div>
</main>

<?php $this->load->view('adminweb/partials/footer'); ?>
