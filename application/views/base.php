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
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Program Studi</h2>
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
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Sistem Informasi</h3>
                                <p class="text-gray-600 mb-4">Fokus pada analisis sistem dan manajemen data</p>
                                <a href="<?= base_url('base/prodi_si') ?>" class="text-purple-600 font-semibold hover:text-purple-700">Pelajari →</a>
                            </div>
                            <div class="card-hover bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center border border-blue-200">
                                <div class="bg-blue-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-hotel text-white text-2xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Perhotelan</h3>
                                <p class="text-gray-600 mb-4">Fokus pada manajemen hotel, hospitality, dan layanan pariwisata</p>
                                <a href="<?= base_url('base/prodi_ph') ?>" class="text-blue-600 font-semibold hover:text-blue-700">Pelajari →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Brosur Slider Section -->
            <section class="py-16 bg-gradient-to-r from-amber-500 to-orange-600">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <!-- Text Content -->
                        <div class="text-white">
                            <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                                Jelajahi Brosur Kampus Kami
                            </h2>
                            <p class="text-xl text-amber-100 mb-8">
                                Dapatkan informasi lengkap tentang program studi, fasilitas, dan beasiswa yang tersedia di Politeknik Darma Ganesha
                            </p>
                        </div>

                        <!-- Slider -->
                        <div class="relative">
                            <div class="broswur-slider-wrapper overflow-hidden rounded-2xl shadow-2xl">
                                <div class="broswur-slider flex transition-transform duration-500">
                                    <!-- Slide 1 -->
                                    <div class="broswur-slide w-full flex-shrink-0">
                                        <img src="<?= base_url('assets/images/brosur-1.jpeg') ?>" alt="Brosur Kampus 1" class="w-full h-auto object-cover">
                                    </div> 
                                    <!-- Slide 2 -->
                                    <div class="broswur-slide w-full flex-shrink-0">
                                        <img src="<?= base_url('assets/images/brosur-2.jpeg') ?>" alt="Brosur Kampus 2" class="w-full h-auto object-cover">
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <button class="broswur-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 lg:-translate-x-12 bg-white rounded-full w-12 h-12 flex items-center justify-center hover:bg-gray-100 transition-all shadow-lg">
                                <i class="fas fa-chevron-left text-amber-600 text-lg"></i>
                            </button>
                            <button class="broswur-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 lg:translate-x-12 bg-white rounded-full w-12 h-12 flex items-center justify-center hover:bg-gray-100 transition-all shadow-lg">
                                <i class="fas fa-chevron-right text-amber-600 text-lg"></i>
                            </button>

                            <!-- Dots Navigation -->
                            <div class="flex justify-center gap-2 mt-4">
                                <button class="broswur-dot w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-all" data-slide="0"></button>
                                <button class="broswur-dot w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-all" data-slide="1"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Berita Kampus Section -->
            <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Berita Kampus</h2>
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
                                <p class="text-gray-500 text-lg">Belum ada berita</p>
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
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Fasilitas Modern</h2>
                         <div class="flex justify-center mb-6">
                            <div class="w-16 h-1 rounded-full" style="background: linear-gradient(to right, orange, yellow);"></div>
                        </div>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Nikmati fasilitas lengkap dan modern untuk mendukung proses pembelajaran yang optimal
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-laptop-code text-4xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Lab Komputer</h3>
                            <p class="text-gray-600">Laboratorium komputer dengan perangkat terbaru dan software berlisensi</p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-wifi text-4xl text-purple-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">WiFi Campus</h3>
                            <p class="text-gray-600">Akses internet cepat dan stabil di seluruh area kampus</p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <i class="fas fa-book text-4xl text-green-500 mb-4"></i>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Perpustakaan</h3>
                            <p class="text-gray-600">Koleksi buku dan jurnal lengkap dengan sistem digital</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-gradient-to-r from-amber-500 to-orange-600">
                <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                        Siap Memulai Perjalanan Pendidikan Anda?
                    </h2>
                    <p class="text-xl text-amber-100 mb-8">
                        Bergabunglah dengan ribuan mahasiswa yang telah merasakan pendidikan berkualitas di Politeknik Darma Ganesha
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="<?= base_url('base/pendaftaran') ?>" class="bg-white text-amber-600 px-8 py-4 rounded-full hover:bg-gray-100 transition-all font-semibold shadow-lg">
                            Daftar Online
                        </a>
                        <a href="<?= base_url('base/kontak') ?>" class="border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-amber-600 transition-all font-semibold">
                            Hubungi Kami
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
