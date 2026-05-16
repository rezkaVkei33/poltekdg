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
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Pilih program studi yang sesuai dengan minat dan bakat Anda untuk masa depan yang cerah
                        </p>
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
                                        <img src="#" alt="Brosur Kampus 1" class="w-full h-auto object-cover">
                                    </div>
                                    <!-- Slide 2 -->
                                    <div class="broswur-slide w-full flex-shrink-0">
                                        <img src="#" alt="Brosur Kampus 2" class="w-full h-auto object-cover">
                                    </div>
                                    <!-- Slide 3 -->
                                    <div class="broswur-slide w-full flex-shrink-0">
                                        <img src="#" alt="Brosur Kampus 3" class="w-full h-auto object-cover">
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
                                <button class="broswur-dot w-3 h-3 rounded-full bg-white opacity-75 hover:opacity-100 transition-all" data-slide="2"></button>
                            </div>
                        </div>
                    </div>
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
