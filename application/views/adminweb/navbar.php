<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">User</a>
              
              </li>
            </li>
            <li class="breadcrumb-item text-sm">  
              <?php
                // Tampilkan nama lengkap user yang sedang login
                if ($this->session->userdata('nama_lengkap')) {
                  echo htmlspecialchars($this->session->userdata('nama_lengkap'));
                }
              ?>
                </li>
        </ol>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        
        <ul class="navbar-nav d-flex align-items-center  justify-content-end">
          
          <li class="mt-1">
            <a class="github-button" href="" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
            </a>
          </li>
          
          <li class="nav-item d-flex align-items-center">
            <a href="<?= base_url('register'); ?>" class="nav-link text-body font-weight-bold px-0">
              <i class="material-symbols-rounded">account_circle</i>
            </a>
          </li>
          
              
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->