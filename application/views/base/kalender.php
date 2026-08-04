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
                          <?= strtoupper($subtitle ?? lang('academic_calendar')) ?>
                        </h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                         <?php if (!empty($data_kalender)): ?>
                          <?php foreach ($data_kalender as $kalender): ?>
                          <!-- Gambar Full Width -->
                          <div class="mb-4 text-center">
                            <img src="<?= base_url('uploads/kalender/' . $kalender->gambar) ?>" loading="lazy" decoding="async"
                                alt="Kalender Akademik" 
                                class="img-fluid rounded shadow" 
                                style="width: 100%; object-fit: cover;">
                          </div>

                          <!-- Konten Kalender -->
                          <div class="bg-white p-4 rounded shadow-sm mb-5">
                            <h3 class="fw-bold"><?= $kalender->judul ?></h3>
                            <small class="text-muted">Update | <?= date('j F Y', strtotime($kalender->tanggal_update)) ?></small>
                            <p class="mt-3 text-justify"><?= nl2br(trans($kalender, 'deskripsi')) ?></p>
                            <hr style="border-top: 2px solid #ccc;">
                            <div class="mt-3">
                              <h5 class="fw-semibold"><?= lang('explanation') ?>:</h5>
                              <ul class="list-unstyled">
                                <li><strong><?= lang('academic_year') ?>:</strong> <?= $kalender->tahun_akademik ?></li>
                                <li><strong><?= lang('start_date') ?>:</strong> <?= date('d M Y', strtotime($kalender->tanggal_mulai)) ?></li>
                                <li><strong><?= lang('end_date') ?>:</strong> <?= date('d M Y', strtotime($kalender->tanggal_selesai)) ?></li>
                              </ul>
                            </div>
                            <hr style="border-top: 2px solid #ccc;">
                          </div>
                      <?php endforeach; ?>
                      <?php else: ?>
                        <div class="alert alert-info text-center">Belum ada Kalender tersedia.</div>
                      <?php endif; ?>
                        </div>
                    
                     
                      <div class="text-center mt-4">
                        <a href="<?= base_url('base') ?>" class="btn" style="background: linear-gradient(90deg, #007BFF 0%, #00BFFF 100%); color: #fff; border: 0; padding: .5rem 1rem; border-radius: .375rem; box-shadow: 0 6px 18px rgba(0, 123, 255, 0.25); text-decoration: none; display: inline-block;"
                        onmouseover="this.style.boxShadow='0 10px 26px rgba(0, 123, 255, 0.35)'; this.style.transform='translateY(-2px)';"
                        onmouseout="this.style.boxShadow='0 6px 18px rgba(0, 123, 255, 0.25)'; this.style.transform='translateY(0)';"
                        aria-label="Kembali ke Beranda">
                        &#8592;<?= lang('back_home'); ?>
                        </a>
                        </div>
                </div>
            </section>
        </main>

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/scripts'); ?>

</body>
</html>
