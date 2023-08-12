<?php
require 'db.php';
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $pageTitle ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">CarRental<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto" href="index.php">Home</a></li>
        <li><a class="nav-link scrollto" href="car_listing.php">Car-listing</a></li>
        <li><a class="nav-link scrollto" href="login.php">Login</a></li>
        <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

    <?php if (!empty(($_SESSION['user_id']))) : ?>
      <a href="profile/" class="d-flex align-items-center gap-2 p-2 rounded px-4 hover-shadow" style="margin-left: 20px;">
        <i class="fas fa-user-circle text-primary"></i>
        <p class="d-block my-auto w-responsive">
          <?php 
            $user = find('users', $_SESSION['user_id']);
            echo substr($user['name'], 0, 6);
          ?>
        </p>
    </a>
        <a href="logout.php" class="btn btn-primary">Log out</a>
      </a>
    <?php endif; ?>

  </div>
</nav>
     
      </nav><!-- .navbar -->

      <a href="signup.php" class="get-started-btn scrollto my-auto w-responsive mx-3">Sign up</a>
    </div>

    
  </header><!-- End Header -->



