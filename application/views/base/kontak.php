<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<title><?= isset($title) ? $title : 'POLITEKNIK DARMA GANESHA' ?></title>
<body>

<?php $this->load->view('partials/kontak'); ?>
<?php $this->load->view('partials/navbar'); ?>
<!-- Main Content -->
        <main class="mobile-content">
            <!-- Program Studi Section -->
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Kontak Kami</h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Bisa Hubungi Kami Melalui:
                        </p>
                        <div class="text-center mt-4">
                        <?php if (!empty($data_kontak)): ?>
                            <?php foreach ($data_kontak as $kontak): ?>
                          <p class="text-center mt-3"><?= nl2br($kontak->judul_kontak) ?> : <?= nl2br($kontak->isi_kontak) ?></p>
                            <?php endforeach;?>
                            <?php else: ?>
                            <div class="alert alert-info text-center">Belum ada Kontak.</div>
                          <?php endif; ?>
                        </div>
                    
                     
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
