<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="home_assets/img/favicon.png" rel="icon">
  <link href="home_assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="home_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="home_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="home_assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="home_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="home_assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?= base_url('/'); ?>" class="logo d-flex align-items-center">
        <img src="<?= base_url('home_assets/img/logo/logo.png'); ?>" alt="">
        <span><?= $information[0]['app_name']; ?></span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if ($title != 'CoffeeAI - Detection') { ?>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#articles">Articles</a></li>
            <li><a class="nav-link scrollto" href="#coffeetype">Coffee Bean Type</a></li>
            <?php if ($sponsors != null) : ?>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <?php endif; ?>
            <li><a class="nav-link scrollto" href="#faq">FaQ</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="signin scrollto" href="<?= base_url('/detection'); ?>">Detection</a></li>
            <i class="bi bi-list mobile-nav-toggle"></i>
          <?php } ?>
          <?php if (session()->get('fullname') != null) : ?>
            <li><a class="signin scrollto" href="<?= base_url('/signout'); ?>">Sign Out</a></li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->