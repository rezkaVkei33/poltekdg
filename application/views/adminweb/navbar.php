<nav class="navbar navbar-expand-lg fixed-top navbar-poltekdg">
  <div class="container-fluid px-4">

    <!-- LOGO -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url('admin'); ?>">
      <img src="<?= base_url('assets/images/LogoPoltek.png'); ?>" width="36">
      <span>PoltekDG</span>
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#poltekNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="poltekNavbar">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>

        <!-- PROFIL -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Profil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('sambutan'); ?>">Sambutan</a></li>
            <!-- <li><a class="dropdown-item" href="#">Sejarah</a></li> -->
            <li><a class="dropdown-item" href="<?= base_url('vmts'); ?>">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="<?= base_url('renstra'); ?>">Renstra</a></li>
            <li><a class="dropdown-item" href="<?= base_url('dosen'); ?>">Dosen</a></li>
          </ul>
        </li>

        <!-- AKADEMIK -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Akademik
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('kalender'); ?>">Kalender Akademik</a></li>
            <li><a class="dropdown-item" href="<?= base_url('prodi'); ?>">Program Studi</a></li>
            <li><a class="dropdown-item" href="<?= base_url('arsip'); ?>">Arsip</a></li>
          </ul>
        </li>

        <!-- EVENT -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Event
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
            <li><a class="dropdown-item" href="<?= base_url('berita'); ?>">Berita</a></li>
            <li><a class="dropdown-item" href="<?= base_url('kegiatan'); ?>">Kegiatan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('galeri'); ?>">Galeri</a></li>
          </ul>
        </li>

        <!-- KONTAK -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a>
        </li>

        <!-- AKUN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Akun
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= base_url('register'); ?>">Register</a></li>
            <li><a class="dropdown-item text-danger" href="<?= base_url('login/logout'); ?>">Keluar</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
