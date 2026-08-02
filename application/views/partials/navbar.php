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
                <a href="<?= base_url('base'); ?>" class="font-medium text-gray-700 transition-colors hover:text-amber-600"><?= lang('home'); ?></a>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        <?= lang('about'); ?> <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/sambutan'); ?>"><?= lang('welcome'); ?></a>
                        <a href="<?= site_url('base/visi_misi'); ?>"><?= lang('vision_mission'); ?></a>
                        <a href="<?= site_url('base/renstra'); ?>"><?= lang('strategic_plan'); ?></a>
                        <a href="<?= site_url('base/dosen'); ?>"><?= lang('lecturer'); ?></a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        <?= lang('study_program'); ?> <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/prodi_si') ?>"><?= lang('d3_information_system'); ?></a>
                        <a href="<?= site_url('base/prodi_ph') ?>"><?= lang('d3_hospitality'); ?></a>
                    </div>
                </div>

                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600">
                        <?= lang('academic'); ?> <i class="ml-1 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('base/kalender') ?>"><?= lang('academic_calendar'); ?></a>
                        <a href="#">SIAKAD</a>
                        <a href="<?= site_url('base/arsip') ?>"><?= lang('archive'); ?></a>
                    </div>
                </div>

                <a href="<?= site_url('base/kontak') ?>" class="font-medium text-gray-700 transition-colors hover:text-amber-600"><?= lang('contact'); ?></a>

                <?php $current = $this->session->userdata('site_language'); ?>
 
                <!-- Language Dropdown -->
                <div class="dropdown relative">
                    <a href="#" class="flex items-center font-medium text-gray-700 transition-colors hover:text-amber-600" aria-label="Pilih bahasa">
                        <i class="mr-2 fas fa-globe-asia"><?= lang($current); ?></i>
                        <i class="ml-2 text-xs fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a href="<?= site_url('language/change/indonesia'); ?>" class="flex items-center gap-3">
                            <img src="<?= base_url('assets/images/flag/idn-flag.png') ?>" alt="Bendera Indonesia" class="w-5 h-5 object-contain flex-shrink-0">
                            <span><?= lang('indonesia'); ?></span>
                        </a>
                        <a href="<?= site_url('language/change/english'); ?>" class="flex items-center gap-3">
                            <img src="<?= base_url('assets/images/flag/us-flag.png') ?>" alt="United States flag" class="w-5 h-5 object-contain flex-shrink-0">
                            <span><?= lang('english'); ?></span>
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
                <a href="<?= base_url('base'); ?>" class="block px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('home'); ?></a>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('tentang')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        <?= lang('about'); ?> <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="tentang" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/sambutan') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('welcome'); ?></a>
                        <a href="<?= site_url('base/visi_misi') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('vision_mission'); ?></a>
                        <a href="<?= site_url('base/renstra') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('strategic_plan'); ?></a>
                        <a href="<?= site_url('base/dosen') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('lecturer'); ?></a>
                    </div>
                </div>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('prodi')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        <?= lang('study_program'); ?> <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="prodi" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/prodi_si') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('d3_information_system'); ?></a>
                        <a href="<?= site_url('base/prodi_ph') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('d3_hospitality'); ?></a>
                    </div>
                </div>

                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('akademik')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        <?= lang('academic'); ?> <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="akademik" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('base/kalender') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('calendar'); ?></a>
                        <a href="<?= site_url('base/arsip') ?>" class="block px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('archive'); ?></a>
                    </div>
                </div>

                <a href="<?= site_url('base/kontak') ?>" class="block px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600"><?= lang('contact'); ?></a>

                <!-- Language Dropdown -->
                 <?php $current = $this->session->userdata('site_language'); ?>
                <div class="mobile-dropdown-container">
                    <button type="button" onclick="toggleMobileDropdown('language')" class="flex items-center justify-between w-full px-3 py-2 text-gray-700 rounded-md hover:bg-amber-50 hover:text-amber-600">
                        <span><i class="mr-2 fas fa-globe-asia"></i><?= lang($current); ?></span>
                        <i class="text-xs fas fa-chevron-down"></i>
                    </button>
                    <div id="language" class="mobile-dropdown pl-4">
                        <a href="<?= site_url('language/change/indonesia'); ?>" class="flex items-center gap-3 px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">
                            <img src="<?= base_url('assets/images/flag/idn-flag.png') ?>" alt="Bendera Indonesia" class="w-5 h-5 object-contain flex-shrink-0">
                            <span><?= lang('indonesia'); ?></span>
                        </a>
                        <a href="<?= site_url('language/change/english'); ?>" class="flex items-center gap-3 px-3 py-2 text-gray-600 rounded-md hover:bg-amber-50 hover:text-amber-600">
                            <img src="<?= base_url('assets/images/flag/us-flag.png') ?>" alt="United States flag" class="w-5 h-5 object-contain flex-shrink-0">
                            <span><?= lang('english'); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
