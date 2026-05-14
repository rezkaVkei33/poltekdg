<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('adminweb/styles'); ?>
  <title><?= isset($title) ? $title : 'Admin - Poltek DG' ?></title> 
  
  <link rel="stylesheet" href="<?= base_url('material-dashboard/assets/css/material-dashboard.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/custom/styles.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .modal-dialog {
      width: 500px;
      resize: both;
      overflow: auto;
    }
  </style>
</head>

<style>
    /* Pastikan modal berada di atas segalanya */
  .modal {
    z-index: 2000;
  }

  .modal-backdrop {
    z-index: 1900;
    background-color: rgba(0, 0, 0, 0.5);
  }

  /* Blur sidebar saat modal terbuka (opsional) */
  body.modal-open .sidenav {
    filter: blur(10px);
    pointer-events: none;
  }

</style>

<body class="g-sidenav-show  bg-gray-100">
  