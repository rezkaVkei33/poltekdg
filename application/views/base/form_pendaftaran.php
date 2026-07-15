<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<title><?= isset($title) ? $title : 'Pendaftaran Mahasiswa Baru | POLITEKNIK DARMA GANESHA' ?></title>
<body>
<?php $this->load->view('partials/kontak') ?>
<?php $this->load->view('partials/navbar'); ?>

<main class="mobile-content">
    <!-- Pendaftaran Section -->
<section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= strtoupper($subtitle ?? 'Pendaftaran Mahasiswa Baru') ?></h2>
              <div class="flex justify-center mb-6">
                  <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
              </div>
              
              <div class="text-center mt-4">
              <p class="mt-4">Silahkan scan QR Code berikut untuk mendapatkan informasi lebih lanjut</p>
                <div class="text-center">
                  <img src="<?= base_url('assets/images/pmb.jpeg') ?>" alt="QR Code Formulir PMB" class="img-fluid mt-3 shadow rounded" style="max-width: 250px; display: block; margin-left: auto; margin-right: auto;">
                </div>
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
