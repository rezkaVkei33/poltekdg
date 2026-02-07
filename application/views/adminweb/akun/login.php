
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('material-dashboard/assets/img/apple-icon.png'); ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/images/LogoPoltek.png'); ?>">
  <title>
    login - Politeknik Darma Ganesha
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('material-dashboard/assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('material-dashboard/assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('material-dashboard/assets/css/material-dashboard.css'); ?>" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-secondary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center align-items-center">
                <img src="<?= base_url('assets/images/LogoPoltek.png'); ?>" alt="Logo POLTEK DG" class="img-fluid" style="max-height: 200px;">
                <h4 class="text-white mt-4">POLITEKNIK DARMA GANESHA</h4>
              </div>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('success'); ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                  <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('error'); ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                  
                  <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <h4 class="font-weight-bolder text-white text-center"><?= strtoupper($title ?? 'LOGIN'); ?></h4>
                  </div>
                </div>

                <div class="card-body">
                  <form role="form" method="POST" action="<?= base_url('login/proses_login'); ?>">
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">MASUK</button>
                    </div>
                  </form>
                </div>
                </div>

                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    akun hanya bisa diakses admin, <br>
                    jika anda belum memiliki akun <br>
                     silahkan hubungi admin.
                    
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

  <!--   Core JS Files   -->
  <script src="<?= base_url('material-dashboard/assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?= base_url('material-dashboard/assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('material-dashboard/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
  <script src="<?= base_url('material-dashboard/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('material-dashboard/assets/js/material-dashboard.min.js'); ?>"></script>
</body>

</html>