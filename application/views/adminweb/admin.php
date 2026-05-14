<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Admin Panel | PoltekDG Landing</title>
    <!-- Bootstrap 5 CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff9ef;
            background-image: radial-gradient(circle at 10% 20%, rgba(255,245,215,0.4) 0%, rgba(255,250,225,0.2) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 76px;
        }

        /* Navbar styling - lebih ke tengah */
        .navbar-poltekdg {
            background: #fef7e6;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03), 0 2px 4px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid #f0e2c5;
        }

        /* Container navbar dibuat lebih rapi dan terpusat */
        .navbar-poltekdg .container-fluid {
            max-width: 1400px;
            margin: 0 auto;
            justify-content: center !important;
        }

        /* Brand/Logo di tengah pada desktop */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.45rem;
            letter-spacing: -0.3px;
            color: #b57c1c !important;
            margin-right: 2rem;
        }

        .navbar-brand span {
            background: linear-gradient(135deg, #b87a2a, #946f2e);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        /* Navbar nav wrapper agar menu terpusat */
        .navbar-collapse {
            flex-grow: 0 !important;
        }

        .navbar-nav {
            gap: 0.25rem;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #5c3f12 !important;
            transition: all 0.2s ease;
            margin: 0 0.1rem;
            border-radius: 40px;
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            background-color: #f4e6d2;
            color: #a5651a !important;
        }

        /* Dropdown hover style */
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            transition: opacity 0.2s ease, transform 0.2s ease;
        }

        .dropdown-menu {
            display: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
            background-color: #fffcf5;
            border: 1px solid #f0e2ce;
            border-radius: 1rem;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.05);
            padding: 0.5rem 0;
            margin-top: 0.5rem;
        }

        @media (hover: hover) {
            .dropdown:hover .dropdown-menu {
                display: block;
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
        }

        .dropdown-toggle::after {
            transition: transform 0.2s ease;
        }
        
        .dropdown:hover .dropdown-toggle::after {
            transform: rotate(180deg);
        }

        .dropdown-item {
            color: #5c3f12;
            font-weight: 450;
            padding: 0.55rem 1.5rem;
            transition: background 0.2s;
        }

        .dropdown-item:hover, .dropdown-item:focus {
            background-color: #f8efdf;
            color: #b1620c;
        }

        .dropdown-item.text-danger:hover {
            background-color: #ffe6e5;
            color: #c7252e !important;
        }

        /* Main container */
        .admin-landing {
            flex: 1 0 auto;
        }

        /* Stat cards */
        .stat-card {
            background: linear-gradient(135deg, #fffefa, #fff7ec);
            border: 1px solid #f7e9d4;
            border-radius: 2rem;
            transition: transform 0.2s ease, box-shadow 0.2s;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.02);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 28px -8px rgba(100, 70, 20, 0.12);
            border-color: #ebd5b0;
        }

        .icon-circle {
            width: 54px;
            height: 54px;
            background: #fdf2e2;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #c0822c;
            font-size: 1.8rem;
        }

        .card-vanilla {
            background: #fffff7;
            border-radius: 1.5rem;
            border: 1px solid #f3e8d8;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
        }

        .btn-outline-poltek {
            border-color: #e9dbbc;
            color: #9b6f2c;
            border-radius: 40px;
            padding: 0.4rem 1.2rem;
            font-weight: 500;
        }

        .btn-outline-poltek:hover {
            background-color: #fbf3e6;
            border-color: #cfb175;
            color: #b06718;
        }

        /* Footer auto-hide */
        .footer-auto-hide {
            background: #fff6ea;
            border-top: 1px solid #f0e2ca;
            color: #8b6b3c;
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.85rem;
            transition: transform 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1), opacity 0.3s ease;
            transform: translateY(0);
            opacity: 1;
        }

        .footer-auto-hide.footer-hidden {
            transform: translateY(100%);
            opacity: 0;
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 991px) {
            body {
                padding-top: 68px;
            }
            
            /* Di mobile, navbar kembali ke kiri normal */
            .navbar-poltekdg .container-fluid {
                justify-content: space-between !important;
            }
            
            .navbar-brand {
                margin-right: 0;
            }
            
            .navbar-collapse {
                flex-grow: 1 !important;
                margin-top: 1rem;
            }
            
            .navbar-nav {
                gap: 0.5rem;
            }
            
            .navbar-brand img {
                width: 30px;
            }
            
            .navbar-brand span {
                font-size: 1.2rem;
            }
            
            .stat-card {
                margin-bottom: 1rem;
            }
            
            .icon-circle {
                width: 44px;
                height: 44px;
                font-size: 1.4rem;
            }
            
            /* Di mobile, hover dinonaktifkan */
            .dropdown:hover .dropdown-menu {
                display: none;
            }
            
            .dropdown-menu.show {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateY(0) !important;
            }
        }

        @media (max-width: 576px) {
            .navbar-nav .nav-link {
                padding: 0.4rem 0.8rem;
            }
        }

        @media (min-width: 992px) {
            /* Pada desktop, navbar terpusat sempurna */
            .navbar-poltekdg .container-fluid {
                justify-content: center !important;
            }
            
            .navbar-brand {
                position: relative;
                left: 0;
            }
        }

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f8efdf;
        }
        ::-webkit-scrollbar-thumb {
            background: #ddc8a8;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<!-- Navbar dengan posisi terpusat -->
<nav class="navbar navbar-expand-lg fixed-top navbar-poltekdg">
    <div class="container-fluid px-4">
        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="#" onclick="dashboardActive(); return false;">
            <img src="https://placehold.co/400x400/f5e6d3/b57c1c?text=PDG" width="36" alt="LogoPoltek" style="border-radius: 10px;">
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
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Sambutan');return false;">Sambutan</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Visi & Misi');return false;">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Renstra');return false;">Renstra</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Dosen');return false;">Dosen</a></li>
                    </ul>
                </li>
                
                <!-- AKADEMIK - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akademik
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Kalender Akademik');return false;">Kalender Akademik</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Program Studi');return false;">Program Studi</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Arsip');return false;">Arsip</a></li>
                    </ul>
                </li>
                
                <!-- EVENT - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="eventDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Event
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="eventDropdown">
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Pengumuman');return false;">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Berita');return false;">Berita</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Kegiatan');return false;">Kegiatan</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Galeri');return false;">Galeri</a></li>
                    </ul>
                </li>
                
                <!-- KONTAK -->
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showAlert('Kontak');return false;">Kontak</a>
                </li>
                
                <!-- AKUN - Dropdown Hover -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="akunDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="akunDropdown">
                        <li><a class="dropdown-item" href="#" onclick="showAlert('Register');return false;">Register</a></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="logoutAlert();return false;">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main konten -->
<main class="admin-landing container my-4">
    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-1">
        <div>
            <h2 class="fw-semibold" style="color: #7a561f;">Halo, Admin PoltekDG</h2>
            <p class="text-muted" style="color: #b68b40 !important;">Kelola konten & dashboard akademik dengan mudah</p>
        </div>
        <div class="mt-2 mt-sm-0">
            <span class="badge bg-light text-dark px-3 py-2 rounded-pill border" style="background-color:#fdf0df!important; color:#936e33">
                <i class="bi bi-calendar3 me-1"></i> <span id="currentDate"></span>
            </span>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-3">
            <div class="stat-card p-3 h-100 d-flex align-items-center">
                <div class="icon-circle me-3">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;">24</h5>
                    <span class="small text-secondary">Berita & Event</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card p-3 h-100 d-flex align-items-center">
                <div class="icon-circle me-3">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;">18</h5>
                    <span class="small text-secondary">Dosen Aktif</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card p-3 h-100 d-flex align-items-center">
                <div class="icon-circle me-3">
                    <i class="bi bi-journal-bookmark-fill"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;">7</h5>
                    <span class="small text-secondary">Program Studi</span>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card p-3 h-100 d-flex align-items-center">
                <div class="icon-circle me-3">
                    <i class="bi bi-images"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;">142</h5>
                    <span class="small text-secondary">Galeri Media</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Area konten -->
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card-vanilla p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                    <h5 class="fw-semibold mb-0" style="color:#6d4c24;"><i class="bi bi-megaphone me-2"></i>Pengumuman Terbaru</h5>
                    <a href="#" class="btn btn-outline-poltek btn-sm" onclick="showAlert('Lihat semua pengumuman');return false;">Lihat Semua <i class="bi bi-arrow-right-short"></i></a>
                </div>
                <ul class="list-unstyled mb-0">
                    <li class="py-3 border-bottom border-light">
                        <div class="d-flex"><i class="bi bi-chat-right-quote me-2 text-warning"></i> <span><strong>Pendaftaran Praktikum</strong> – Gelombang 2 dibuka 10-25 Mei 2025.</span><small class="text-muted ms-2">2 jam lalu</small></div>
                    </li>
                    <li class="py-3 border-bottom border-light">
                        <div class="d-flex"><i class="bi bi-calendar-event me-2 text-warning"></i> <span><strong>Wisuda ke-XXIV</strong> – Persiapan wisuda Agustus 2025, info lebih lanjut.</span><small class="text-muted ms-2">Kemarin</small></div>
                    </li>
                    <li class="py-3 border-bottom border-light">
                        <div class="d-flex"><i class="bi bi-mortarboard me-2 text-warning"></i> <span><strong>Beasiswa Prestasi</strong> – Pendaftaran hingga 30 April 2025.</span><small class="text-muted ms-2">3 hari lalu</small></div>
                    </li>
                    <li class="pt-3">
                        <div class="d-flex"><i class="bi bi-book me-2 text-warning"></i> <span><strong>Renstra 2025-2029</strong> – Dokumen rencana strategis telah dirilis.</span><small class="text-muted ms-2">1 minggu lalu</small></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-vanilla p-4 h-100">
                <h5 class="fw-semibold mb-3" style="color:#6d4c24;"><i class="bi bi-calendar-week me-2"></i>Agenda Akademik</h5>
                <div class="d-flex mb-3 align-items-start">
                    <div class="bg-warning bg-opacity-25 rounded-3 px-3 py-1 me-3 text-center" style="min-width: 55px;">
                        <span class="fw-bold" style="color:#a5661a">20</span><br><span class="small">Apr</span>
                    </div>
                    <div><strong>UTS Ganjil</strong><br><span class="small text-secondary">Pelaksanaan Ujian Tengah Semester</span></div>
                </div>
                <div class="d-flex mb-3 align-items-start">
                    <div class="bg-warning bg-opacity-25 rounded-3 px-3 py-1 me-3 text-center" style="min-width: 55px;">
                        <span class="fw-bold" style="color:#a5661a">28</span><br><span class="small">Apr</span>
                    </div>
                    <div><strong>Libur Hari Buruh</strong><br><span class="small text-secondary">Libur nasional, tidak ada kegiatan akademik</span></div>
                </div>
                <div class="d-flex mb-3 align-items-start">
                    <div class="bg-warning bg-opacity-25 rounded-3 px-3 py-1 me-3 text-center" style="min-width: 55px;">
                        <span class="fw-bold" style="color:#a5661a">05</span><br><span class="small">Mei</span>
                    </div>
                    <div><strong>Seminar Proposal</strong><br><span class="small text-secondary">Mahasiswa semester akhir</span></div>
                </div>
                <div class="mt-3 text-center">
                    <a href="#" class="small text-decoration-none" style="color:#b87a2a;" onclick="showAlert('Kalender Akademik lengkap');return false;"><i class="bi bi-calendar2-range"></i> Lihat kalender penuh</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Shortcut menu -->
    <div class="row mt-5 g-3">
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important; cursor:pointer;" onclick="showAlert('Kelola Berita');">
                <i class="bi bi-file-post fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Kelola Berita</p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important;" onclick="showAlert('Kelola Galeri');">
                <i class="bi bi-camera fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Galeri Foto</p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important;" onclick="showAlert('Data Prodi');">
                <i class="bi bi-diagram-3 fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Program Studi</p>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important;" onclick="showAlert('Manajemen Dosen');">
                <i class="bi bi-person-badge fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Dosen & Staff</p>
            </div>
        </div>
    </div>
</main>

<!-- Footer auto-hide -->
<footer id="autoHideFooter" class="footer-auto-hide">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <span>© 2025 <strong>Politeknik DG</strong> | All rights reserved | Admin Panel</span>
            </div>
            <div class="col-md-6 text-md-end">
                <span><i class="bi bi-envelope"></i> admin@poltekdg.ac.id | <i class="bi bi-telephone"></i> (0411) 123456</span>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Set tanggal
    function setCurrentDate() {
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formatted = now.toLocaleDateString('id-ID', options);
        const dateSpan = document.getElementById('currentDate');
        if(dateSpan) dateSpan.innerText = formatted;
    }
    setCurrentDate();

    // Simulasi alert untuk menu
    window.showAlert = function(menuName) {
        alert(`Navigasi ke: ${menuName}\nFungsi siap diintegrasikan dengan backend.`);
    };
    
    window.dashboardActive = function() {
        alert("Dashboard Admin: ringkasan statistik dan aktivitas terbaru.");
    };
    
    window.logoutAlert = function() {
        if(confirm("Yakin ingin keluar dari sesi admin?")) {
            alert("Anda telah logout. (Simulasi)");
        }
    };
    
    // Untuk perangkat sentuh, pastikan dropdown tetap berfungsi dengan klik
    if ('ontouchstart' in window) {
        const style = document.createElement('style');
        style.textContent = `
            .dropdown:hover .dropdown-menu {
                display: none;
            }
            .dropdown-menu.show {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: translateY(0) !important;
            }
        `;
        document.head.appendChild(style);
    }
    
    // FOOTER AUTO-HIDE
    let footerTimeout;
    const footer = document.getElementById('autoHideFooter');
    
    function showFooter() {
        if(footer.classList.contains('footer-hidden')) {
            footer.classList.remove('footer-hidden');
        }
        clearTimeout(footerTimeout);
        footerTimeout = setTimeout(() => {
            if(!footer.classList.contains('footer-hidden')) {
                footer.classList.add('footer-hidden');
            }
        }, 2500);
    }
    
    const events = ['mousemove', 'scroll', 'click', 'touchstart', 'keydown'];
    events.forEach(ev => {
        window.addEventListener(ev, showFooter);
        document.addEventListener(ev, showFooter);
    });
    
    window.addEventListener('load', () => {
        showFooter();
        clearTimeout(footerTimeout);
        footerTimeout = setTimeout(() => {
            if(footer && !footer.classList.contains('footer-hidden')) {
                footer.classList.add('footer-hidden');
            }
        }, 3000);
    });
    
    document.body.addEventListener('mouseenter', showFooter);
    
    const dropdownItems = document.querySelectorAll('.dropdown');
    dropdownItems.forEach(item => {
        item.addEventListener('mouseenter', showFooter);
        item.addEventListener('click', showFooter);
    });
    
    const toggler = document.querySelector('.navbar-toggler');
    if(toggler) {
        toggler.addEventListener('click', showFooter);
    }
</script>
</body>
</html>