<?php
session_start();
  if (!isset($_GET['view'])) {
    include "apps/home.php";
  
  /* PSB */
  } elseif ($_GET['view'] == 'psb') {
    
    if (!isset($_SESSION['id'])) {
      header("Location: login.php");
      exit();
    } 
    include "apps/psb.php";
    
    
  /* profile */
  } elseif ($_GET['view'] == 'psb-profile') {
    include "apps/psb-profile.php";

    
  /* psb data */
  } elseif ($_GET['view'] == 'psb-data') {
    include "apps/psb-data.php";


      /* Berita */
  } elseif ($_GET['view'] == 'berita') {
    include "apps/news.php";
   
    
/* Detail Berita */
  } elseif ($_GET['view'] == 'detail-berita') {
    include "apps/news-detail.php";
    
      /* Detail akademik */
  } elseif ($_GET['view'] == 'akademik') {
    include "apps/page-akademik.php";

      /* Detail profile */
    } elseif ($_GET['view'] == 'profile') {
      include "apps/page-profile.php";
  
      /* Detail profile */
    } elseif ($_GET['view'] == 'kesiswaan') {
      include "apps/page-kesiswaan.php";

      /* Detail Fasilitas */
  } elseif ($_GET['view'] == 'fasilitas') {
      include "apps/page-fasilitas.php";

      /* Detail Fasilitas */
    } elseif ($_GET['view'] == 'galeri') {
      include "apps/page-gallery.php";



      /* harga */
  } elseif ($_GET['view'] == 'harga') {
    include "apps/page-harga.php";
    
    
  /* LOGIN */
  } elseif ($_GET['view'] == 'login') {
    include "login.php";
  
  /* LOGIN */
  } elseif ($_GET['view'] == 'logout') {
    include "logout.php";
  
  } elseif ($_GET['view'] == '') {
    include "apps/dashboard_caleg.php";
  
  } elseif ($_GET['view'] == 'stp_profile' ||  $_SESSION['level'] == '2') {
    include "apps/setup/stp_supervisor.php";
  }
  
  ?>