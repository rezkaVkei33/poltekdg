<!-- Navbar -->
<nav class="sticky-navbar bg-white shadow-lg border-b-4 border-amber-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-lg">
                    <img src="<?= base_url('assets/images/LogoPoltek.png') ?>" alt="Logo Politeknik Darma Ganesha" class="object-contain w-8 h-8">
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-xl font-bold text-gray-800">POLTEKDG</h1>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden items-center space-x-8 md:flex">
                <a href="<?= base_url('base'); ?>" class="font-medium text-gray-700 transition-colors hover:text-amber-600">Beranda</a>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        Tentang <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/sambutan'); ?>">Sambutan</a>
                        <a href="<?= site_url('base/visi_misi'); ?>">Visi &amp; Misi</a>
                        <a href="<?= site_url('base/renstra'); ?>">Renstra</a>
                        <a href="<?= site_url('base/dosen'); ?>">Dosen</a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        Program Studi <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/prodi_si') ?>">D3 Sistem Informasi</a>
                        <a href="<?= site_url('base/prodi_ph') ?>">D3 Perhotelan</a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        Akademik <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/kalender') ?>">Kalender Akademik</a>
                        <a href="#">SIAKAD</a>
                        <a href="<?= site_url('base/arsip') ?>">Arsip</a>
                    </div>
                </div>

                <a href="<?= site_url('base/kontak') ?>" class="font-medium text-gray-700 transition-colors hover:text-amber-600">Kontak</a>

                <!-- Language Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600" aria-label="Pilih bahasa">
                        <i class="mr-2 fas fa-globe-asia"></i>
                        Language
                        <i class="ml-2 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('language/switch/id') ?>" class="flex items-center">
                            <img src="<?= base_url('assets/images/flag/idn-flag.png') ?>" alt="Bendera Indonesia" class="w-5 mr-3">
                            ID
                        </a>
                        <a href="<?= site_url('language/switch/en') ?>" class="flex items-center">
                            <img src="<?= base_url('assets/images/flag/us-flag.png') ?>" alt="United States flag" class="w-5 mr-3">
                            EN
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" class="text-gray-700 md:hidden hover:text-amber-600" onclick="toggleMobileMenu()" aria-label="Buka menu">
                <i class="text-xl fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu bg-white border-t md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?= base_url('base'); ?>" class="block px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">Beranda</a>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('tentang')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        Tentang <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="tentang" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/sambutan') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Sambutan</a>
                        <a href="<?= site_url('base/visi_misi') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Visi &amp; Misi</a>
                        <a href="<?= site_url('base/renstra') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Renstra</a>
                        <a href="<?= site_url('base/dosen') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Dosen</a>
                    </div>
                </div>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('prodi')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        Program Studi <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="prodi" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/prodi_si') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">D3 Sistem Informasi</a>
                        <a href="<?= site_url('base/prodi_ph') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">D3 Perhotelan</a>
                    </div>
                </div>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('akademik')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        Akademik <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="akademik" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/kalender') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Kalender Akademik</a>
                        <a href="<?= site_url('base/arsip') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">Arsip</a>
                    </div>
                </div>

                <a href="<?= site_url('base/kontak') ?>" class="block px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">Kontak</a>

                <!-- Language Dropdown -->
                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('language')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        <span><i class="mr-2 fas fa-globe-asia"></i>Language</span>
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="language" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('language/switch/id') ?>" class="flex items-center px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">
                            <img src="<?= base_url('assets/images/flag/idn-flag.png') ?>" alt="Bendera Indonesia" class="w-5 mr-3">
                            ID
                        </a>
                        <a href="<?= site_url('language/switch/en') ?>" class="flex items-center px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">
                            <img src="<?= base_url('assets/images/flag/us-flag.png') ?>" alt="United States flag" class="w-5 mr-3">
                            EN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
