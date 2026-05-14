<!-- Navbar dengan posisi terpusat -->
<nav class="navbar navbar-expand-lg fixed-top navbar-poltekdg">
    <div class="container-fluid px-4">
        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="#" onclick="dashboardActive(); return false;">
            <img src="<?= base_url('assets/images/LogoPoltek.png'); ?>" width="36" alt="LogoPoltek" style="border-radius: 10px;">
            <span>PoltekDG</span>
        </a>
        
        <!-- TOGGLER (untuk mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#poltekNavbar" aria-controls="poltekNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="poltekNavbar">
            <ul class="navbar-nav ms-auto me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="dashboardActive();return false;">Dashboard</a>
                </li>
                
                <!-- PROFIL - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('sambutan'); ?>">Sambutan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('visi-misi'); ?>">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('renstra'); ?>">Renstra</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('dosen'); ?>">Dosen</a></li>
                    </ul>
                </li>
                
                <!-- AKADEMIK - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('kalender-akademik'); ?>">Kalender Akademik</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('program-studi'); ?>">Program Studi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('arsip'); ?>">Arsip</a></li>
                    </ul>
                </li>
                
                <!-- EVENT - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="eventDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Event
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('berita'); ?>">Berita</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('kegiatan'); ?>">Kegiatan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('galeri'); ?>">Galeri</a></li>
                    </ul>
                </li>
                
                <!-- KONTAK -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak'); ?>" onclick="showAlert('Kontak');return false;">Kontak</a>
                </li>
                
                <!-- AKUN - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akunDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="akunDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('register'); ?>">Register</a></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>