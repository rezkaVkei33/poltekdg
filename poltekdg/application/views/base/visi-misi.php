<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<title><?= isset($title) ? $title : 'VMTS - Poltek DG' ?></title>
<body>
<?php $this->load->view('partials/kontak') ?>
<?php $this->load->view('partials/navbar'); ?>

<!-- Main Content -->
        <main class="mobile-content">
            <!-- Program Studi Section -->
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                          <?= strtoupper($subtitle ?? 'VMTS - Poltek DG') ?>
                        </h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>

                        <?php if (!empty($data_vmts)): ?>
                        <h3 class="fw-bold mb-4"><?= $data_vmts->nama_vm; ?></h3>

                          <div class="section-block mb-4">
                            <h5 class="text-muted">Visi</h5>
                            <hr class="mx-auto" style="width: 80px; border: 2px solid #007BFF;">
                            <p class="text-center mt-3"><?= nl2br($data_vmts->visi) ?></p>
                          </div>

                          <div class="section-block mb-4">
                            <h5 class="text-muted">Misi</h5>
                            <hr class="mx-auto" style="width: 80px; border: 2px solid #28A745;">
                            <p class="text-center mt-3"><?= nl2br($data_vmts->misi) ?></p>
                          </div>

                          <div class="section-block mb-4">
                            <h5 class="text-muted">Tujuan</h5>
                            <hr class="mx-auto" style="width: 80px; border: 2px solid #FFC107;">
                            <p class="text-center mt-3"><?= nl2br($data_vmts->tujuan) ?></p>
                          </div>
                        </div>
                         <?php else: ?>
                        <div class="alert alert-info text-center">Belum ada VMTS tersedia.</div>
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
