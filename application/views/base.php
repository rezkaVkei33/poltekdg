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
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4"><?= lang('campus_news') ?></h2>
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                    </div>

                    <!-- News Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                        <?php if (!empty($berita)): ?>
                            <?php foreach($berita as $news): ?>
                                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 card-hover">
                                    <div class="relative h-48 overflow-hidden bg-gray-200">
                                        <img src="<?= base_url($news['gambar']) ?>" alt="<?= $news['judul'] ?>" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                        <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            <?= date('d M', strtotime($news['created_at'])) ?>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2"><?= $news['judul'] ?></h3>
                                        <p class="text-gray-600 mb-4 line-clamp-3"><?= $news['deskripsi'] ?></p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-500"><?= date('d F Y', strtotime($news['created_at'])) ?></span>
                                            <a href="<?= base_url('base/berita/') ?><?= $news['id'] ?>" class="text-amber-600 font-semibold hover:text-amber-700">Baca →</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-3 text-center py-12">
                                <p class="text-gray-500 text-lg"><?= lang('no_news') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Pagination -->
                    <?php if (!empty($pagination)): ?>
                        <nav aria-label="Page navigation" class="flex justify-center">
                            <ul class="flex gap-2 items-center">
                                <!-- Previous Button -->
                                <?php if ($current_page > 1): ?>
                                    <li>
                                        <a href="<?= base_url('base?page=' . ($current_page - 1)) ?>" class="px-4 py-2 rounded-lg border border-gray-300 hover:border-amber-500 hover:text-amber-600 transition-all">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <span class="px-4 py-2 rounded-lg border border-gray-300 opacity-50 cursor-not-allowed">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    </li>
                                <?php endif; ?>

                                <!-- Page Numbers -->
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li>
                                        <?php if ($i == $current_page): ?>
                                            <span class="px-3 py-2 rounded-lg bg-amber-600 text-white border border-amber-600">
                                                <?= $i ?>
                                            </span>
                                        <?php else: ?>
                                            <a href="<?= base_url('base?page=' . $i) ?>" class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:border-amber-500 hover:text-amber-600 transition-all">
                                                <?= $i ?>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endfor; ?>

                                <!-- Next Button -->
                                <?php if ($current_page < $total_pages): ?>
                                    <li>
                                        <a href="<?= base_url('base?page=' . ($current_page + 1)) ?>" class="px-4 py-2 rounded-lg border border-gray-300 hover:border-amber-500 hover:text-amber-600 transition-all">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <span class="px-4 py-2 rounded-lg border border-gray-300 opacity-50 cursor-not-allowed">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
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
