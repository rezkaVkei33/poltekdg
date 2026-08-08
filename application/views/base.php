<!DOCTYPE html>
<html lang="id">
<head>
    <title>Politeknik Darma Ganesha</title>
   <?php $this->load->view('partials/header'); ?>
</head>
<body class="bg-gray-50">
    <div class="mobile-layout">
        
    <?php $this->load->view('partials/kontak') ?>

        <?php $this->load->view('partials/navbar'); ?>

        <!-- Main Content -->
        <main class="mobile-content">
            <?php $this->load->view('partials/hero'); ?>
            <!-- Program Studi Section -->
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= lang('study_program'); ?></h2>
                         <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-2xl">
                            <div class="card-hover bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center border border-purple-200">
                                <div class="bg-purple-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-database text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2"><?= lang('d3_information_system') ?></h3>
                                <p class="text-gray-600 mb-4"><?= lang('prodi_si_desc') ?></p>
                                <a href="<?= base_url('base/prodi_si') ?>" class="text-purple-600 font-semibold hover:text-purple-700"><?= lang('learn_more') ?> →</a>
                            </div>
                            <div class="card-hover bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                                <div class="bg-blue-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-hotel text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2"><?= lang('d3_hospitality') ?></h3>
                                <p class="text-gray-600 mb-4"><?= lang('prodi_hospitality_desc') ?></p>
                                <a href="<?= base_url('base/prodi_ph') ?>" class="text-blue-600 font-semibold hover:text-blue-700"><?= lang('learn_more') ?> →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <?php
            $brosur_images = [];
            if (!empty($brosur)) {
                foreach (['img_1', 'img_2', 'img_3'] as $field) {
                    if (!empty($brosur->{$field})) {
                        $brosur_images[] = $brosur->{$field};
                    }
                }
            }
            $is_english = ($current_language ?? 'indonesia') === 'english';
            $brosur_title = '';
            $brosur_description = '';
            if (!empty($brosur)) {
                $brosur_title = $is_english ? $brosur->judul_en : $brosur->judul;
                $brosur_description = $is_english ? $brosur->deskripsi_en : $brosur->deskripsi;
            }
            ?>
            <?php if (!empty($brosur_images)): ?>
            <!-- Brosur Section -->
            <section class="py-16 bg-gradient-to-r from-amber-500 to-orange-600">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-white max-w-3xl mx-auto">
                            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                                <?= html_escape($brosur_title ?: lang('explore_brochure')); ?>
                            </h2>
                            <p class="text-lg lg:text-xl text-amber-100">
                                <?= html_escape($brosur_description ?: lang('brochure_description')); ?>
                            </p>
                    </div>

                    <div class="mt-10 flex flex-wrap justify-center gap-4 lg:gap-6">
                        <?php foreach ($brosur_images as $index => $image): ?>
                            <a href="<?= base_url('uploads/brosur/' . rawurlencode($image)); ?>" target="_blank" class="block w-40 sm:w-48 lg:w-56 overflow-hidden rounded-xl border-2 border-white/50 bg-white/10 shadow-lg transition-transform duration-300 hover:scale-105" aria-label="Lihat brosur <?= $index + 1; ?> ukuran penuh">
                                <img src="<?= base_url('uploads/brosur/' . rawurlencode($image)); ?>" alt="<?= html_escape($brosur_title ?: 'Brosur Kampus'); ?> - <?= $index + 1; ?>" class="block h-56 sm:h-64 lg:h-72 w-full object-cover" loading="lazy" decoding="async">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Berita Kampus Section -->
            <section id="berita" class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= lang('campus_news') ?></h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                        <a href="<?= site_url('base/semua_berita'); ?>" class="inline-flex items-center text-amber-700 font-semibold hover:text-amber-800"><?= lang('all_news'); ?> →</a>
                    </div>

                    <!-- News Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php if (!empty($data_berita)): ?>
                            <?php foreach ($data_berita as $news): ?>
                                <?php
                                $judul_berita = trans($news, 'judul');
                                $isi_berita = trans($news, 'isi');
                                $tanggal_berita = !empty($news->tanggal_terbit) ? $news->tanggal_terbit : $news->tanggal_update;
                                $berita_unggulan = in_array((int) $news->id_berita, [6, 7, 8], TRUE);
                                ?>
                                <a href="<?= site_url('base/berita/' . berita_token($news->id_berita)); ?>" class="block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 card-hover focus:outline-none focus:ring-2 focus:ring-amber-500" aria-label="Baca berita: <?= html_escape($judul_berita); ?>">
                                    <div class="relative h-48 overflow-hidden bg-gradient-to-br from-amber-100 to-orange-200">
                                        <?php if (!empty($news->gambar)): ?>
                                            <img src="<?= base_url('uploads/berita/' . rawurlencode($news->gambar)); ?>" alt="<?= html_escape($judul_berita); ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy" decoding="async">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-amber-700"><i class="fas fa-newspaper text-5xl" aria-hidden="true"></i></div>
                                        <?php endif; ?>
                                        <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            <?= date('d M', strtotime($tanggal_berita)); ?>
                                        </div>
                                        <?php if ($berita_unggulan): ?>
                                            <div class="absolute top-4 left-4 bg-gray-900/80 text-white px-3 py-1 rounded-full text-xs font-semibold"><?= lang('featured_news'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2"><?= html_escape($judul_berita); ?></h3>
                                        <p class="text-gray-600 mb-4 line-clamp-3"><?= html_escape(word_limiter(strip_tags($isi_berita), 24)); ?></p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-500"><?= date('d F Y', strtotime($tanggal_berita)); ?></span>
                                            <span class="text-amber-600 font-semibold"><?= lang('read_more'); ?> →</span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-3 text-center py-12">
                                <p class="text-gray-500 text-lg"><?= lang('no_news') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </section>

            <!-- Fasilitas Section -->
            <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= lang('modern_facilities') ?></h2>
                         <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            <?= lang('modern_facilities_desc') ?>
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-laptop-code text-4xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3"><?= lang('computer_lab') ?></h3>
                            <p class="text-gray-600"><?= lang('computer_lab_desc') ?></p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-wifi text-4xl text-purple-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3"><?= lang('campus_wifi') ?></h3>
                            <p class="text-gray-600"><?= lang('campus_wifi_desc') ?></p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-book text-4xl text-green-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3"><?= lang('library') ?></h3>
                            <p class="text-gray-600"><?= lang('library_desc') ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-gradient-to-r from-amber-500 to-orange-600">
                <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                        <?= lang('ready_to_start') ?>
                    </h2>
                    <p class="text-xl text-amber-100 mb-8">
                        <?= lang('join_students') ?>
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="<?= base_url('base/pendaftaran') ?>" class="bg-white text-amber-600 px-8 py-4 rounded-full hover:bg-gray-100 transition-all font-semibold shadow-lg">
                            <?= lang('apply_online') ?>
                        </a>
                        <a href="<?= base_url('base/kontak') ?>" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-amber-600 transition-all font-semibold">
                            <?= lang('contact_us') ?>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        
        <?php $this->load->view('partials/footer') ?>
    </div>

<?php $this->load->view('partials/scripts') ?>
</body>
</html>
