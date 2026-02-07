
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 my-2" id="sidenav-main" style="background-color: #ffecb3;">
    <div class="sidenav-header"> 
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="<?= base_url('admin'); ?>" target="_blank"> 
        <img src="<?= base_url('assets/images/LogoPoltek.png'); ?>" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">Admin PoltekDG</span>
      </a> 
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Dashboard</h6>
      </li>
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- HOME -->
          <a class="nav-link text-dark" href="<?= base_url('admin'); ?>">
            <i class="material-symbols-rounded opacity-5">home</i>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- Sambutan -->
          <a class="nav-link text-dark" href="<?= base_url('sambutan'); ?>">
            <i class="material-symbols-rounded opacity-5">campaign</i>
            <span class="nav-link-text ms-1">Sambutan</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- Sejarah -->
          <a class="nav-link text-dark" href="<?= base_url('sejarah'); ?>">
            <i class="material-symbols-rounded opacity-5">history_edu</i>
            <span class="nav-link-text ms-1">Sejarah</span>
          </a>
        </li>
        <!-- Visi Misi -->
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('vmts'); ?>"> 
            <i class="material-symbols-rounded opacity-5">visibility</i>
            <span class="nav-link-text ms-1">Visi & Misi</span>
          </a>
        </li>
        <!-- Renstra -->
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('renstra'); ?>"> 
            <i class="material-symbols-rounded opacity-5">trending_up</i>
            <span class="nav-link-text ms-1">Renstra</span> 
          </a>
        </li>
        <!-- dosen -->
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('dosen'); ?>">   
            <i class="material-symbols-rounded opacity-5">badge</i>
            <span class="nav-link-text ms-1">Dosen</span>
          </a>
        </li>
        <hr class="horizontal dark mt-0 mb-2">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Akademik</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('kalender'); ?>"> 
            <i class="material-symbols-rounded opacity-5">event_note</i>
            <span class="nav-link-text ms-1">Kalender Akademik</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('arsip'); ?>"> 
            <i class="material-symbols-rounded opacity-5">inventory_2</i>
            <span class="nav-link-text ms-1">Arsip</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('prodi'); ?>"> 
            <i class="material-symbols-rounded opacity-5">class</i>
            <span class="nav-link-text ms-1">Program Studi</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Event</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('pengumuman'); ?>"> 
            <i class="material-symbols-rounded opacity-5">campaign</i>
            <span class="nav-link-text ms-1">Pengumuman</span>
          </a>
      </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('berita'); ?>"> 
            <i class="material-symbols-rounded opacity-5">article</i>
            <span class="nav-link-text ms-1">Berita</span>
          </a>
      </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('kegiatan'); ?>"> 
            <i class="material-symbols-rounded opacity-5">event</i>
            <span class="nav-link-text ms-1">Kegiatan</span>
          </a>
      </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('galeri'); ?>"> 
            <i class="material-symbols-rounded opacity-5">image</i>
            <span class="nav-link-text ms-1">Galeri</span>
          </a>
      </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Kontak</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="<?= base_url('kontak'); ?>"> 
            <i class="material-symbols-rounded opacity-5">contacts</i>
            <span class="nav-link-text ms-1">Kontak</span>
          </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Akun</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('register'); ?>">
          <i class="material-symbols-rounded opacity-5">person_add</i>
          <span class="nav-link-text ms-1">Register</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('login/logout'); ?>">
          <i class="material-symbols-rounded opacity-5">logout</i>
          <span class="nav-link-text ms-1">Keluar</span>
        </a>
      </li>
    </ul>
    </div>  
  </aside>