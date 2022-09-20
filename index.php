<?php
  session_start();
  error_reporting(0);
  include 'function/connect.php';
  
  date_default_timezone_set('Asia/Jakarta');

  if($_SESSION['hak_akses']=="2"){
    header("location:pegawai/index.php");
  }else if ($_SESSION['hak_akses']=="1") {
    header("Location:admin/index.php");
  }
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi Penggajian - PT. HADAR</title>
  <meta content="Aplikasi Penggajian Karyawan" name="description">
  <meta content="Aplikasi Penggajian" name="keywords">

  <!-- Favicons -->
  <link href="techie/assets/img/favicon.png" rel="icon">
  <link href="techie/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="techie/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="techie/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="techie/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="techie/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="techie/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="techie/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="techie/assets/css/style.css" rel="stylesheet">
</head>

<body>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.html">Gaji Karyawan</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#informasi">Informasi</a></li>
          <li><a class="getstarted scrollto" href="login.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Penggajian Karyawan</h1>
          <h2>Selamat Datang di aplikasi sistem informasi penggajian karyawan PT. HADAR</h2>
          <div><a href="login.php" class="btn-get-started scrollto">Login</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="techie/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->


  <main id="main">

     <!-- ======= About Section ======= -->
    <section id="informasi" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="techie/assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Informasi tentang Aplikasi Gaji Karyawan PT. HADAR</h3>
            <p class="fst-italic">
              Berikut Informasi Terkait Aplikasi Gaji Karyawan di PT. HADAR
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Penentuan Tanggal Gajian Otomatis</li>
              <li><i class="bi bi-check-circle"></i> Terdapat Fitur Laporan Gaji Dan Slip Gaji Karyawan.</li>
              <li><i class="bi bi-check-circle"></i> Tampilan bersifat Responsif</li>
            </ul>
            <a href="login.php" class="read-more">Login <i class="bi bi-long-arrow-right"></i></a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="copyright">
            &copy; Copyright <strong><span>Gaji Karyawan</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">PT. HADAR</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="techie/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="techie/assets/vendor/aos/aos.js"></script>
  <script src="techie/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="techie/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="techie/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="techie/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="techie/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="techie/assets/js/main.js"></script>

</body>

</html>