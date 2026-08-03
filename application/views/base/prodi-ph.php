<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<title><?= isset($title) ? $title : 'POLITEKNIK DARMA GANESHA' ?></title>
<body>
<?php $this->load->view('partials/kontak') ?>
<?php $this->load->view('partials/navbar'); ?>


<main class="mobile-content">
<!-- Program Studi Section -->
  <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                <?= strtoupper($subtitle ?? lang('study_program')) ?> <?= strtoupper(trans($data_prodi_ph, 'nama_prodi')) ?>
              </h2>
              <div class="flex justify-center mb-6">
                  <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
              </div>
                
    <?php if (!empty($data_prodi_ph)): ?>
    <div class="row mb-5 align-items-start">
      <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
        <div class="mx-auto d-flex justify-content-center align-items-center"
         style="background: #fff; box-shadow: 0 8px 24px rgba(255,140,0,0.18);">
          <img src="<?= base_url('uploads/prodi/' . $data_prodi_ph->gambar) ?>"
           alt="Foto Prodi Sistem Informasi"
           class="img-fluid d-block mx-auto rounded shadow"
           style="max-width: 100%; max-height: 220px; object-fit: contain; border: 3px solid; border-image: linear-gradient(90deg, orange, gold) 1;">
        </div>
      </div>
      <div class="col-md-8 col-12 d-flex flex-column justify-content-start">
        <div class="mb-2">
          <h3 class="fw-bold"><?= strtoupper(trans($data_prodi_ph, 'nama_prodi')) ?></h3>
          <small class="text-muted">Update | <?= date('l, j F Y', strtotime($data_prodi_ph->tanggal_update)) ?></small>
          <hr class="mb-3">
        </div>
        <div class="flex-grow-1">
          <p class="text-justify" style="text-align: justify;"><?= nl2br(trans($data_prodi_ph, 'deskripsi')) ?></p>
        </div>
      </div>
      </div>
    </div>
    <?php else: ?>
      <div class="alert alert-info">Belum ada prodi tersedia.</div>
    <?php endif; ?>
                     
                      <div class="text-center mt-4">
                        <a href="<?= base_url('base') ?>" class="btn" style="background: linear-gradient(90deg, #007BFF 0%, #00BFFF 100%); color: #fff; border: 0; padding: .5rem 1rem; border-radius: .375rem; box-shadow: 0 6px 18px rgba(0, 123, 255, 0.25); text-decoration: none; display: inline-block;"
                        onmouseover="this.style.boxShadow='0 10px 26px rgba(0, 123, 255, 0.35)'; this.style.transform='translateY(-2px)';"
                        onmouseout="this.style.boxShadow='0 6px 18px rgba(0, 123, 255, 0.25)'; this.style.transform='translateY(0)';"
                        aria-label="Kembali ke Beranda">
                        &#8592; ke Beranda
                        </a>
                        </div>
                </div>
            </section>
        </main>

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/scripts'); ?>

</body>
</html>
