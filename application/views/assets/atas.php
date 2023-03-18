<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pantai Panrita Lopi</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/icon.png' />
  <script src="assets/js/app.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="jquery.inputmask.bundle.js"></script>
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="zxing/zxing.min.js"></script>

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg bg-info main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>

          </ul>
        </div>
        <ul class="navbar-nav navbar-right ">

          <li class="dropdown"><a data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/pria.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $this->session->userdata("nama") ?></div>

              <div class="dropdown-divider"></div>
              <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="main/"> <img alt="image" src="assets/icon.png" class="header-logo" /> <span class="logo-name">Panrita Lopi</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="main/" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="main/pelanggan" class="nav-link"><i data-feather="users"></i><span>Data Pelanggan</span></a>
            </li>
            <li class="dropdown">
              <a href="main/pesanan" class="nav-link"><i data-feather="book"></i><span>Data Pemesanan</span></a>
            </li>
            <li class="dropdown">
              <a href="main/scan" target="_blank" class="nav-link"><i data-feather="camera"></i><span>Scan QR Code</span></a>
            </li>
            <li class="dropdown">
              <a class="menu-toggle nav-link has-dropdown"><i data-feather="book"></i><span>Produk</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="main/produk">Data Produk</a></li>
                <li><a class="nav-link" href="main/addproduk">Form Produk</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="main/setnorek" class="nav-link"><i data-feather="book"></i><span>Setting Nomor Rekening</span></a>
            </li>
            <li class="dropdown">
              <a href="welcome/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
            </li>

          </ul>
        </aside>
      </div>
      <!-- Main Content -->