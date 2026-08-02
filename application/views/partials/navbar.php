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
                        
                        <!-- multy language menu  -->
                         <div class="dropdown">
                            <a href="#"
                            class="text-gray-700 hover:text-amber-600 font-medium transition-colors d-flex align-items-center"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                                <i class="fas fa-globe-asia me-2"></i>

                                ID

                                <i class="fas fa-chevron-down ms-2 small"></i>

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">

                                <li>

                                    <a class="dropdown-item d-flex align-items-center py-2"
                                    href="<?= site_url('language/switch/id') ?>">

                                        <img src="<?= base_url('assets/images/flags/id.png') ?>"
                                            width="22"
                                            class="me-3">

                                        Bahasa Indonesia

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item d-flex align-items-center py-2"
                                    href="<?= site_url('language/switch/en') ?>">

                                        <img src="<?= base_url('assets/images/flags/en.png') ?>"
                                            width="22"
                                            class="me-3">

                                        English

                                    </a>

                                </li>

                            </ul>

                        </div>
                        
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
                        
                        
                        <!-- multy language menu  -->
                         <div class="dropdown">
                                <a href="#"
                                class="text-gray-700 hover:text-amber-600 font-medium text-decoration-none d-flex align-items-center"
                                data-bs-toggle="dropdown">

                                    <i class="fas fa-globe me-2"></i>

                                    Indonesia

                                    <i class="fas fa-angle-down ms-2"></i>

                                </a>

                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow">

                                    <li>

                                        <a class="dropdown-item d-flex align-items-center py-2"
                                        href="#">

                                            <img src="<?= base_url('assets/images/flags/id.png') ?>"
                                                width="20"
                                                class="me-3">

                                            Bahasa Indonesia

                                        </a>

                                    </li>

                                    <li>

                                        <a class="dropdown-item d-flex align-items-center py-2"
                                        href="#">

                                            <img src="<?= base_url('assets/images/flags/us.png') ?>"
                                                width="20"
                                                class="me-3">

                                            English

                                        </a>

                                    </li>

                                </ul>

                            </div>
                        
                </div>
            </div>
        </nav>