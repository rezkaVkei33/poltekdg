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

    .admin-navbar-gradient .user-icon-circle {
        border: 1px solid rgba(255, 255, 255, 0.75);
        border-radius: 50%;
        padding: 0.18rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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
                    <a class="nav-link" href="<?= base_url('admin'); ?>"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                </li>
                
                <!-- PROFIL - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-badge me-2"></i>Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('sambutan'); ?>"><i class="bi bi-chat-left-text me-2"></i>Sambutan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('vmts'); ?>"><i class="bi bi-eye me-2"></i>Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('renstra'); ?>"><i class="bi bi-journal-bookmark me-2"></i>Renstra</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('dosen'); ?>"><i class="bi bi-people me-2"></i>Dosen</a></li>
                    </ul>
                </li>
                
                <!-- AKADEMIK - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-mortarboard me-2"></i>Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('kalender'); ?>"><i class="bi bi-calendar3 me-2"></i>Kalender Akademik</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('prodi'); ?>"><i class="bi bi-book me-2"></i>Program Studi</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('arsip'); ?>"><i class="bi bi-archive me-2"></i>Arsip</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('brosur'); ?>"><i class="bi bi-file-earmark-image me-2"></i>Brosur</a></li>
                    </ul>
                </li>
                
                <!-- EVENT - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="eventDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-calendar-event me-2"></i>Event
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>"><i class="bi bi-megaphone me-2"></i>Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('berita'); ?>"><i class="bi bi-newspaper me-2"></i>Berita</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('kegiatan'); ?>"><i class="bi bi-briefcase me-2"></i>Kegiatan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('galeri'); ?>"><i class="bi bi-images me-2"></i>Galeri</a></li>
                    </ul>
                </li>
                
                <!-- KONTAK -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kontakDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-envelope me-2"></i>Kontak
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kontakDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('kontak'); ?>"><i class="bi bi-telephone me-2"></i>Kontak</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('kunjungan'); ?>"><i class="bi bi-globe me-2"></i>Kunjungan Web</a>
                        </li>
                    </ul>
                </li>
                
                <!-- AKUN - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akunDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-2"></i><?= $this->session->userdata('username') ? $this->session->userdata('username') : 'Akun'; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="akunDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('register'); ?>"><i class="bi bi-person-plus me-2"></i>Register</a></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
