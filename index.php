<?php 
  session_start();
  error_reporting(1);
  require "config/koneksi.php";
  include "config/parser-php-version.php";
  include "config/library.php";
  include "config/fungsi_indotgl.php";
  include "config/fungsi_seo.php";
  
  ini_set('session.gc_maxlifetime', 604800); 
  session_set_cookie_params(604800); 
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ruhul Qurani</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body class="blog-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="#" class="logo d-flex align-items-center me-auto">
          <img src="assets/img/logo_2.jpg" alt="">
          <h3 class="sitename">Dayah Ruhul Qur'ani</h3>
        </a>
        <nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="index.php#hero">Beranda<br></a></li>
    <li class="dropdown">
      <a href="#"><span>Dayah Ruhul Qurani</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
        <li><a href="index.php?view=akademik&idt=3">Akademik Dayah Ruhul Qurani</a></li>
      </ul>
    </li>

    
    <li class="dropdown">
          <a href="#"><span>MTsS </span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="index.php?view=profile&idt=4">Profil Madrasah Tsanawiyah Ruhul Qurani</a></li>
            <li><a href="index.php?view=akademik&idt=5">Akademik MTsS Ruhul Qurani</a></li>
            <li><a href="index.php?view=kesiswaan&idt=6">Kesiswaan MTsS Ruhul Qurani</a></li>
          </ul>
        </li>

        
        <li class="dropdown">
          <a href="#"><span>MAS </span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="index.php?view=profile&idt=7">Profil Madrasah Aliyah Ruhul Qurani</a></li>
            <li><a href="index.php?view=akademik&idt=8">Akademik MAS Ruhul Qurani</a></li>
            <li><a href="index.php?view=kesiswaan&idt=10">Kesiswaan MAS Ruhul Qurani</a></li>
          </ul>
        </li>

    <li class="dropdown">
      <a href="#"><span>Berita</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
      <li><a href="index.php?view=berita&cat=1&page=1">Dayah Ruhul Qurani</a></li>
        <li><a href="index.php?view=berita&cat=2&page=1">MTsS Ruhul Qurani</a></li>
        <li><a href="index.php?view=berita&cat=3&page=1">MAS Ruhul Qurani</a></li>
      </ul>
    </li>
    
    <li><a href="index.php?view=profile&idt=2">Tentang</a></li>
    <li><a href="index.php?view=harga">Biaya Pendaftaran</a></li>
    <?php  if (!isset($_SESSION['id'])) {
        echo '<li><a class="btn-getstarted flex-md-shrink-0" href="index.php?view=psb">PSB</a><li>';
      } else {
        echo '
        <li class="dropdown"><a href="#"><span><b>Hai, ' . $_SESSION['namalengkap'] . '</b></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="index.php?view=psb">PSB</a></li>
            <li><a href="index.php?view=psb-profile">Profile</a></li>
            <li><a href="index.php?view=logout">Logout</a></li>
          </ul>
        </li>';
      }
    ?>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>

      </div>
    </header>
    <main class="main">
      <?php 
        include "apps/privilage.php";
        ?>
    </main>
    <footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="container section-title" data-aos="fade-up">
            <h2>Quote</h2>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-lg-12">
              <h4>“Barangsiapa yang menghendaki kehidupan dunia, maka wajib baginya memiliki ilmu, dan barang siapa yang
                menghendaki kehidupan akhirat, maka wajib baginya memiliki ilmu, dan barang siapa menghendaki keduanya
                maka wajib baginya memiliki ilmu.”
              </h4>
              <h5>(HR. Turmudzi)</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-6 col-md-6 footer-about">
            <a href="index.php" class="d-flex align-items-center">
            <span class="sitename">Ruhul Qur'ani</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Meulaboh - Lapang, Kec. Johan Pahlawan,</p>
              <p>Kabupaten Aceh Barat, Aceh 23618</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+62 0852 9696 2778</span></p>
              <p><strong>Email:</strong> <span>info@ruhulqurani.sch.id</span></p>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <h4>Follow Us</h4>
            <p>Ikuti Akun Media Sosial Ruhul Qurani :</p>
            <div class="social-links d-flex">
              <a href="https://www.facebook.com/profile.php?id=100083028549972&locale=id_ID"><i
                class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/ruhulqurani/"><i class="bi bi-instagram"></i></a>
              <a href="https://ruhulqurani.sch.id/"><i class="bi bi-globe"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Ruhul Qurani</strong> <span>All Rights Reserved</span>
        </p>
        <div class="credits">
          Designed by <a href="https://gitamitech.com/">Gitamitech</a>
        </div>
      </div>
    </footer>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>