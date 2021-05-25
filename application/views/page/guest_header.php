<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="<?= base_url('assets/'); ?>aset/fonts/amatic.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>aset/fonts/poppins.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>aset/fonts/lora.css" rel="stylesheet">
    
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/animate.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>new/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>aset/assets/plugins/sweetalert2/sweetalert2.css">
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-primary ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand text-dark" href="<?= base_url('guest') ?>">Mejapintar</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

        
          

	      <div class="collapse navbar-collapse" id="ftco-nav">
          <form action="<?= base_url('guest/search_all') ?>" class="search-form mt-2" method="get">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="text" name="input" autocomplete="off" class="form-control" placeholder="Search...">
                </div>
              </form>

	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?= base_url('guest') ?>" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Materi</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="<?= base_url('guest/materi_sd') ?>">SD</a>
              	<a class="dropdown-item" href="<?= base_url('guest/materi_smp') ?>">SMP</a>
                <a class="dropdown-item" href="<?= base_url('guest/materi_smak') ?>">SMA/K</a>
              </div>
            </li>
	          <li class="nav-item"><a href="<?= base_url('guest/about') ?>" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="<?= base_url('welcome/registration')?>" class="nav-link">Sign Up</a></li>
	          <li class="nav-item"><a href="<?= base_url('welcome/')?>" class="nav-link">Sign In</a></li>

	        </ul>
	      </div>
	  </nav>
