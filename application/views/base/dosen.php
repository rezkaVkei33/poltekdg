<!DOCTYPE html>
<html lang="en">
<title><?= isset($title) ? $title : 'POLITEKNIK DARMA GANESHA' ?></title>

<?php $this->load->view('partials/header'); ?>
<body>
    <?php $this->load->view('partials/kontak') ?>
    <?php $this->load->view('partials/navbar'); ?>
<!-- Main Content -->
        <main class="mobile-content">
            <!-- Program Studi Section -->
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= strtoupper($subtitle ?? lang('our_lecturer')) ?></h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            <?= lang('content') ?>
                        </p>
                    </div>
                    <?php if (!empty($data_dosen)): ?>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            <?php foreach ($data_dosen as $dosen): ?>
                                <div class="card-hover bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center border border-purple-200">
                                    <div class="w-full h-52 mb-4 rounded-xl overflow-hidden flex items-start justify-center bg-purple-100 border border-purple-300" style="border-top-left-radius: 1.25rem; border-top-right-radius: 1.25rem;">
                                        <img src="<?= base_url('uploads/dosen/' . ($dosen->gambar ?? 'default.png')) ?>" alt="Dosen Sistem Informasi" class="object-cover w-full h-full object-top" loading="lazy" decoding="async">
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2"><?= $dosen->nama ?><?= $dosen->gelar ? ', ' . $dosen->gelar : '' ?></h3>
                                    <p class="text-gray-600 mb-4"><?= $dosen->bidang_keahlian ?></p>
                                    <p>Status: <span class="badge badge-primary"><?= ucfirst($dosen->status) ?></span></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center">Belum ada data dosen.</div>
                        </div>
                    <?php endif; ?>

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
