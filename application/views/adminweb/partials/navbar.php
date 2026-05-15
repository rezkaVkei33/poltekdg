<style>
    .navbar-poltekdg.admin-navbar-gradient {
        background: linear-gradient(135deg, #06162f 0%, #0b2d66 48%, #4a1d95 100%) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.16) !important;
        box-shadow: 0 10px 26px rgba(6, 22, 47, 0.22);
    }

    .admin-navbar-gradient .navbar-brand,
    .admin-navbar-gradient .navbar-brand span,
    .admin-navbar-gradient .navbar-nav .nav-link {
        color: #f8fbff !important;
        background: none;
        -webkit-text-fill-color: #f8fbff;
    }

    .admin-navbar-gradient .navbar-nav .nav-link:hover,
    .admin-navbar-gradient .navbar-nav .nav-link:focus {
        background-color: rgba(255, 255, 255, 0.14);
        color: #ffffff !important;
    }

    .admin-navbar-gradient .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.35);
    }
</style>

<!-- Navbar dengan posisi terpusat -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-poltekdg admin-navbar-gradient">
    <div class="container-fluid px-4">
        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url('admin'); ?>">
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
                    <a class="nav-link" href="<?= base_url('admin'); ?>">Dashboard</a>
                </li>
                
                <!-- PROFIL - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('sambutan'); ?>">Sambutan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('vmts'); ?>">Visi & Misi</a></li>
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
                        <li><a class="dropdown-item" href="<?= base_url('kalender'); ?>">Kalender Akademik</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('prodi'); ?>">Program Studi</a></li>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kontakDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kontak
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kontakDropdown">
                        <li class="dropdown-item">
                            <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link" href="<?= base_url('kunjungan'); ?>">Kunjungan Web</a>
                        </li>
                    </ul>
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
