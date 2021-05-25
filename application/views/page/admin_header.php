<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="stylesheet" href="<?= base_url('assets/') ?>aset/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>aset/assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="base_url('assets/') ?>aset/assets/plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">    

  <link rel="stylesheet" href="<?= base_url('assets/DataTables/datatables.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fonts/fontawesome/css/fontawesome-all.css">
  <script src="<?= base_url('assets/aset/jquery/jquery-3.4.1.min.js'); ?>"></script>
  <script src="<?= base_url('assets/') ?>DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/') ?>DataTables/JSZip-2.5.0/jszip.min.js"></script>

    <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/dataTables.print.min.js"></script>
    <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/dataTables.html5.min.js"></script>
    <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/dataTables.flash.min.js"></script>
    <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/buttons.bootstrap.min.js"></script>
    

  <script src="<?= base_url('assets/') ?>DataTables/Responsive-2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/') ?>DataTables/Scroller-2.0.1/js/dataTables.scroller.min.js"></script>
  <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
  
  
    <!-- <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/style.css">   -->

  <link rel="stylesheet" href="<?= base_url('assets/') ?>aset/assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>aset/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>aset/assets/plugins/sweetalert2/sweetalert2.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light">
    <!-- Sidebar link -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-fw fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- End navbar -->

   <!-- Sidebar Content -->
  <aside class="main-sidebar sidebar-light-primary elevation-3">
    


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Panel -->
      <div class="mt-3 p-2 mb-3 d-flex navbar-info">
        <div class="info">
          <a href="#" class="d-block">Menu</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?= base_url('admin/home') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-home"></i>
              <p>
                Home
              </p>
            </a>
          <li class="nav-item">
            <a href="<?= base_url('admin/user') ?>" class="nav-link">
              <i class="nav-icon fa fa-fw fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/materi') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-book"></i>
              <p>
                Materi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/soal') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-question-circle"></i>
              <p>
                Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/news') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-newspaper"></i>
              <p>
                News
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/diskusi') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-comment-alt"></i>
              <p>
                Diskusi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/feedback') ?>" class="nav-link">
              <i class="nav-icon fas fa-fw fa-meh"></i>
              <p>
                Feedback
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fw fa-comments"></i>
              <p>
                Comments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/comment_materi') ?>" class="nav-link">
                  <i class="nav-icon fas fa-fw fa-comment-dots"></i>
                  <p>Comments Materi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/comment_news') ?>" class="nav-link">
                  <i class="nav-icon fas fa-fw fa-comment"></i>
                  <p>Comments News</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('welcome/logout') ?>" class="nav-link">
                  <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                  <!-- <p>Sign Out</p> -->
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

