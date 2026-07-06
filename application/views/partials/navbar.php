<!-- Navbar -->
        <nav class="sticky-navbar bg-white shadow-lg border-b-4 border-amber-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center">
                            <img src="<?= base_url('assets/images/LogoPoltek.png') ?>" alt="Logo Politeknik Darma Ganesha" class="w-8 h-8 object-contain">
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-xl font-bold text-gray-800">POLTEKDG</h1>
                        </div>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="<?= base_url('base'); ?>" class="text-gray-700 hover:text-amber-600 font-medium transition-colors">Beranda</a>
                        
                        <div class="dropdown relative">
                            <a href="#" class="text-gray-700 hover:text-amber-600 font-medium transition-colors flex items-center">
                                Tentang <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('base/sambutan'); ?>">Sambutan</a> 
                                <a href="<?= site_url('base/visi_misi'); ?>">Visi & Misi</a>
                                <a href="<?= site_url('base/renstra'); ?>">Renstra</a> 
                                <a href="<?= site_url('base/dosen'); ?>">Dosen</a>
                            </div>
                        </div>

                        <div class="dropdown relative">
                            <a href="#" class="text-gray-700 hover:text-amber-600 font-medium transition-colors flex items-center">
                                Program Studi <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('base/prodi_si') ?>">D3 Sistem Informasi</a>
                                <a href="<?= site_url('base/prodi_ph') ?>">D3 Perhotelan</a>
                            </div>
                        </div>
                        <div class="dropdown relative">
                            <a href="#" class="text-gray-700 hover:text-amber-600 font-medium transition-colors flex items-center">
                                Akademik <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('base/kalender') ?>">Kalender Akademik</a>
                                <a href="#">SIAKAD</a>
                                <a href="<?= site_url('base/arsip') ?>">Arsip</a>
                            </div>
                        </div>

                        <a href="<?= site_url('base/kontak') ?>" class="text-gray-700 hover:text-amber-600 font-medium transition-colors">Kontak</a>
                        
                        <a href="<?= site_url('base/pendaftaran') ?>" class="bg-gradient-to-r from-amber-400 to-orange-500 text-white px-6 py-2 rounded-full hover:from-amber-500 hover:to-orange-600 transition-all font-medium shadow-lg">
                            Daftar Sekarang
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-700 hover:text-amber-600" onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="mobile-menu md:hidden bg-white border-t">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md">Beranda</a>
                        
                        <div class="mobile-dropdown-container">
                            <button onclick="toggleMobileDropdown('tentang')" class="w-full flex items-center justify-between px-3 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md">
                                Tentang <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="tentang" class="mobile-dropdown pl-4">
                                <a href="<?= site_url('base/sambutan') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">Sambutan</a>
                                <a href="<?= site_url('base/renstra') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">Renstra</a>
                                <a href="<?= site_url('base/dosen') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">Dosen</a>
                            </div>
                        </div>
                        
                        <div class="mobile-dropdown-container">
                            <button onclick="toggleMobileDropdown('prodi')" class="w-full flex items-center justify-between px-3 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md">
                                Program Studi <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="prodi" class="mobile-dropdown pl-4">
                                <a href="<?= site_url('base/prodi_si') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">D3 Sistem Informasi</a>
                                <a href="<?= site_url('base/prodi_ph') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">D3 Perhotelan</a>
                            </div>
                        </div>

                        <div class="mobile-dropdown-container">
                            <button onclick="toggleMobileDropdown('akademik')" class="w-full flex items-center justify-between px-3 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md">
                                Akademik <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div id="akademik" class="mobile-dropdown pl-4">
                                <a href="<?= site_url('base/kalender') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">Kalender</a>
                                <!-- <a href="" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">SIAKAD</a> -->
                                <a href="<?= site_url('base/arsip') ?>" class="block px-3 py-2 text-gray-600 hover:bg-amber-50 hover:text-amber-600 rounded-md">Arsip</a>
                            </div>
                        </div>
                        
                        <a href="<?= site_url('base/kontak') ?>" class="block px-3 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md">Kontak</a>
                        <!-- Tombol Translate Lingkaran dengan Dropdown -->
                        <div class="relative">
                            <button id="languageToggle" type="button" onclick="toggleLanguageMenu()" class="w-10 h-10 rounded-full border border-gray-200 bg-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-amber-200">
                                <img src="https://flagcdn.com/w40/gb.png" alt="English" class="w-6 h-6">
                            </button>
                            <div id="languageMenu" class="hidden absolute left-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-amber-50">Indonesia</a>
                                <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-amber-50">English</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>