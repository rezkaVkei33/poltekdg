<?php $this->load->view('adminweb/partials/header'); ?>

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
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;"><?= $total_berita ?></h5>
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
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;"><?= $total_dosen ?></h5>
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
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;"><?= $total_prodi ?></h5>
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
                    <h5 class="mb-0 fw-bold" style="color:#ac751f;"><?= $total_galeri ?></h5>
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
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important; cursor:pointer;">
                <a href="<?= base_url('berita') ?>"><i class="bi bi-file-post fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Kelola Berita</p></a>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important; cursor:pointer;">
                <a href="<?= base_url('galeri') ?>"><i class="bi bi-camera fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Galeri Foto</p></a>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important; cursor:pointer;">
                <a href="<?= base_url('prodi') ?>"><i class="bi bi-diagram-3 fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Program Studi</p></a>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center">
            <div class="p-3 rounded-4 bg-white bg-opacity-60 shadow-sm" style="background:#fffcf3!important; cursor:pointer;">
                <a href="<?= base_url('dosen') ?>"><i class="bi bi-person-badge fs-3" style="color:#c6882f;"></i>
                <p class="mb-0 mt-2 fw-medium small">Dosen & Staff</p></a>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('adminweb/partials/footer'); ?>