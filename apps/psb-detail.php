<?php 
    session_start();
    error_reporting(1);
    require "config/koneksi.php";
    include "config/parser-php-version.php";
    include "config/library.php";
    include "config/fungsi_indotgl.php";
    include "config/fungsi_seo.php";
    include "psb-insert.php";

    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    } else {
        if ($_SESSION['level'] == 'siswa') {
            $iden = mysql_fetch_array(mysql_query("SELECT * FROM rb_siswa WHERE nipd = '$_SESSION[id]'"));
            $nama = $iden['nama'];
            $level = 'siswa';
        }
    }

    ini_set('session.gc_maxlifetime', 604800); 
    session_set_cookie_params(604800); 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ruhul Qurani</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
      rel="stylesheet"
    />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .nav-tabs {
        overflow-x: auto;
        white-space: nowrap;
      }
      .nav-item {
        flex-shrink: 0; /* Agar item tidak mengecil */
      }
      .nav-tabs::-webkit-scrollbar {
        display: none; /* Hilangkan scrollbar pada browser yang mendukung */
      }
    </style>
  </head>

  <body class="blog-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.php" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="assets/img/logo.png" alt="" />
          <h3 class="sitename">Ruhul Qur'ani</h3>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="index.php#hero">Beranda<br /></a>
            </li>
            <li><a href="index.php#alt-features">Visi dan Misi</a></li>
            <li><a href="index.php#faq">Tanya Jawab</a></li>
            <li><a href="index.php#portfolio">Galeri</a></li>
            <li><a href="index.php#contact">Kontak</a></li>
            <?php  if (!isset($_SESSION['id'])) {
                echo'<li>
            <a class="btn-getstarted flex-md-shrink-0" href="psb.php">PSB</a>
            <li>'; } else { echo'</li>

            <li class="dropdown"><a href="#"><span><b>Hai, ' . $_SESSION['namalengkap'] . '</b></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                          <ul>
                            <li><a href="psb.php">PSB</a></li>
                            <li><a href="psb-profile.php">Data Santri</a></li>
                            <li><a href="psb-profile.php">SPP</a></li>
                            <li><a href="psb-profile.php">Profile</a></li>
                            <li><a href="logout.php">Logout</a></li>
                          </ul>
                      </li>
            '; } ?>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </header>
    <main class="main">
      <!-- Page Title -->
      <div class="page-title">
        <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.php">Beranda</a></li>
              <li class="current">PSB (Pendaftaraan Santri Baru)</li>
            </ol>
          </div>
        </nav>
      </div>
      <!-- End Page Title -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <section id="blog" class="blog">
              <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row gy-4">
                  <!-- Page Heading -->
                  <div class="heading">
                    <div class="container">
                      <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                          <h1>Pendaftaran Peserta Didik Baru Ruhul Qurani</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row gy-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card-body">
                          <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data" novalidate>
                            <input type="hidden" name="reff" value="" />
                            <div class="row">
                              <div class="col-md-3">
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi</b></h6>
                                  </div>
                                  <div class="card-body">
                                    <img src="https://jettpedia.com/demo/sekolah/assets/img/data/default.jpg" class="img-thumbnail" />
                                    <br />
                                    <br />
                                    <table style="font-size: 14px;" cellpadding="3">
                                      <tbody>
                                        <tr>
                                          <td>Nomor Daftar</td>
                                          <td>: <b>SIS00008</b></td>
                                        </tr>
                                        <tr>
                                          <td>Nama</td>
                                          <td>: Akbar</td>
                                        </tr>
                                        <tr>
                                          <td>Daftar Ulang</td>
                                          <td>: <span class="badge badge-danger badge-pill disabled" aria-disabled="true">Belum Bayar</span></td>
                                        </tr>
                                        <tr>
                                          <td>Status</td>
                                          <td>: <span class="badge badge-warning badge-pill disabled" aria-disabled="true">Pending</span></td>
                                        </tr>
                                        <tr>
                                          <td>Tanggal Daftar</td>
                                          <td>: 18 Sep 2024</td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td>: akbar@gmail.com</td>
                                        </tr>
                                        <tr>
                                          <td>NIS</td>
                                          <td>: 123456</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi Daftar Ulang</b></h6>
                                  </div>
                                  <div class="card-body">
                                    <table style="font-size: 14px;" cellpadding="3">
                                      <tbody>
                                        <tr>
                                          <td>Pembayaran Testing</td>
                                          <td>: Rp.1.000.000</td>
                                        </tr>
                                        <tr>
                                          <td>Pemabayaran Aplikasi Cashless</td>
                                          <td>: Rp.50.000</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <br />
                                    <h5>Total pembayaran : <b>Rp.1.050.000,-</b></h5>
                                  </div>
                                  
                                  <div class="card-footer">
                                    <form action="" method="POST">
                                      <button type="submit" name="update" class="btn btn-success w-100 btn-xl"><i class="bi bi-credit-card"></i> Bayar <b>Rp.1.050.000</b></button>
                                    </form>
                                  </div>
                                </div>
                                <!-- Payment Modal-->
                                <div class="modal fade" id="payModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pilih Jenis Pembayaran :</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="https://jettpedia.com/demo/sekolah/home/ppdb/payment" method="post" id="payy">
                                          <input type="hidden" name="jumlah" />
                                          <div id="jenis_pay"></div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" onclick="$('#payy').submit()"><i class="bi bi-credit-card"></i> Bayar <b>Rp.1.050.000</b></button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-image fa-fw"></i> <b>Data Foto</b></h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="card border-left-success shadow h-100 py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto siswa</div>
                                                <span></span>
                                              </div>
                                              <div class="col-auto">
                                                <img src="assets/img/services.jpg" width="100" height="85" class="img-thumbnail" id="zoomImage" data-bs-toggle="modal" data-bs-target="#siswaModal" />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <div class="card border-left-info shadow h-100 py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto KK</div>
                                                <span></span>
                                              </div>
                                              <div class="col-auto">
                                                <img src="assets/img/services.jpg" width="100" height="85" class="img-thumbnail" id="zoomImage" data-bs-toggle="modal" data-bs-target="#KKModal" />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto Ijazah</div>
                                                <span></span>
                                              </div>
                                              <div class="col-auto">
                                                <img src="assets/img/services.jpg" width="100" height="85" class="img-thumbnail" id="zoomImage" data-bs-toggle="modal" data-bs-target="#IjazahModal" />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <div class="card border-left-success shadow h-100 py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto siswi</div>
                                              </div>
                                              <div class="col-auto">
                                                <img
                                                  src="assets/img/values-1.png"
                                                  width="100"
                                                  height="85"
                                                  class="img-thumbnail"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#imageModal"
                                                  data-img-src="assets/img/values-1.png"
                                                  data-img-name="values-1.png"
                                                />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-sm-12">
                                        <div class="card border-left-success shadow h-100 py-2">
                                          <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                              <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto siswa</div>
                                              </div>
                                              <div class="col-auto">
                                                <img
                                                  src="assets/img/services.jpg"
                                                  width="100"
                                                  height="85"
                                                  class="img-thumbnail"
                                                  data-bs-toggle="modal"
                                                  data-bs-target="#imageModal"
                                                  data-img-src="assets/img/services.jpg"
                                                  data-img-name="services.jpg"
                                                />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-9">
                                <div class="card shadow mb-4">
                                  <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group mb-3 mt-3">
                                            <div class="card shadow mb-4">
                                              <div class="card-header py-3 bg-primary">
                                                <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-file-alt fa-fw"></i> Data Santri/Santriwati</h6>
                                              </div>
                                              <div class="card-body">
                                                <div class="row">
                                                  <!-- Column 1 -->
                                                  <div class="col-md-6">
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="Muhammad Iqbal" />
                                                      <label for="nama_lengkap">Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="Bandung" />
                                                      <label for="tempat_lahir">Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="2005-06-15" />
                                                      <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="agama" name="agama">
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                      </select>
                                                      <label for="agama">Agama</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                        <option value="">Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                      </select>
                                                      <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="jalur_prestasi" name="jalur_prestasi">
                                                        <option value="">Pilih Jalur</option>
                                                        <option value="Prestasi">Prestasi</option>
                                                        <option value="Reguler">Reguler</option>
                                                      </select>
                                                      <label for="jalur_prestasi">Jalur Prestasi atau Reguler</label>
                                                    </div>
                                                    <!-- Additional fields for Prestasi -->
                                                    <div id="prestasi-fields" style="display: none;">
                                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                        <input hidden type="file" name="img_siswa_1" class="file" accept="image/*" id="imgSiswa_1" />
                                                        <div class="input-group my-3">
                                                          <input type="text" class="form-control" disabled placeholder="Raport MI/Sederajat Kelas V peringkat kelas 1 - 3" id="fileSiswa_1" />
                                                          <div class="input-group-append">
                                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <!-- Duplicate names corrected -->
                                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                        <input hidden type="file" name="img_siswa_2" class="file" accept="image/*" id="imgSiswa_2" />
                                                        <div class="input-group my-3">
                                                          <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 KSM/OSN" id="fileSiswa_2" />
                                                          <div class="input-group-append">
                                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <!-- Duplicate names corrected -->
                                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                        <input hidden type="file" name="img_siswa_3" class="file" accept="image/*" id="imgSiswa_3" />
                                                        <div class="input-group my-3">
                                                          <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 MTQ Min. Tingkat Kabupaten" id="fileSiswa_3" />
                                                          <div class="input-group-append">
                                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <!-- Duplicate names corrected -->
                                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                        <input hidden type="file" name="img_siswa_4" class="file" accept="image/*" id="imgSiswa_4" />
                                                        <div class="input-group my-3">
                                                          <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 Prestasi olahraga, min tingkat kabupaten" id="fileSiswa_4" />
                                                          <div class="input-group-append">
                                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input hidden type="file" name="kartu_keluarga" class="file" accept="image/*" id="kartu_keluarga" />
                                                      <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Photo Kartu Keluarga" id="fileKartuKeluarga" />
                                                        <div class="input-group-append">
                                                          <button type="button" class="browse btn btn-primary">Browse</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input hidden type="file" name="photo_santri" class="file" accept="image/*" id="photo_santri" />
                                                      <div class="input-group my-3">
                                                        <input type="text" class="form-control" disabled placeholder="Photo Santri/Santriwati" id="fileSantri" />
                                                        <div class="input-group-append">
                                                          <button type="button" class="browse btn btn-primary">Browse</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- Column 2 -->
                                                  <div class="col-md-6">
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Nama Sekolah Asal" value="SDN 01 Bandung" />
                                                      <label for="sekolah_asal">Nama Sekolah Asal</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" />
                                                      <label for="nisn">NISN</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" />
                                                      <label for="nik">NIK</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Alamat Lengkap" value="Jl. Merdeka No. 123, Bandung" />
                                                      <label for="alamat_lengkap">Alamat Lengkap</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="jenjang_madrasah" name="jenjang_madrasah">
                                                        <option value="">Pilih Jenjang</option>
                                                        <option value="MTS RQ">MTS RQ</option>
                                                        <option value="MA RQ">MA RQ</option>
                                                      </select>
                                                      <label for="jenjang_madrasah">Jenjang Madrasah yang Diinginkan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="08123456789" />
                                                      <label for="no_hp">No HP</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="example@gmail.com" />
                                                      <label for="email">Alamat Email</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Data Orang Tua (Ayah) -->
                                        <div class="col-md-6">
                                          <div class="form-group mb-3 mt-3">
                                            <div class="card shadow mb-4">
                                              <div class="card-header py-3 bg-primary">
                                                <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-university fa-fw"></i> Data Orang Tua (Ayah)</h6>
                                              </div>
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="form-group mb-3">
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap Ayah" />
                                                      <label for="nama_ayah">Nama Lengkap Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="status_ayah" name="status_ayah">
                                                        <option value="">Pilih Status</option>
                                                        <option value="Hidup">Masih Hidup</option>
                                                        <option value="Meninggal">Sudah Meninggal</option>
                                                      </select>
                                                      <label for="status_ayah">Status Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah" />
                                                      <label for="nik_ayah">NIK Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah" />
                                                      <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" />
                                                      <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="agama_ayah" name="agama_ayah">
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                      </select>
                                                      <label for="agama_ayah">Agama Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Pendidikan Terakhir Ayah" />
                                                      <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" />
                                                      <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah">
                                                        <option value="">Pilih Penghasilan</option>
                                                        <option value="2000000-3000000">2.000.000 – 3.000.000</option>
                                                        <option value="3000000-4000000">3.000.000 – 4.000.000</option>
                                                        <option value="4000000-5000000">4.000.000 – 5.000.000</option>
                                                        <option value=">5000000">> 5.000.000</option>
                                                      </select>
                                                      <label for="penghasilan_ayah">Penghasilan Ayah Per Bulan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="tel" class="form-control" id="no_hp_ayah" name="no_hp_ayah" placeholder="No HP Ayah" />
                                                      <label for="no_hp_ayah">No HP Ayah</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" placeholder="Alamat Lengkap Ayah"></textarea>
                                                      <label for="alamat_ayah">Alamat Lengkap Ayah</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- Data Orang Tua (Ibu) -->
                                        <div class="col-md-6">
                                          <div class="form-group mb-3 mt-3">
                                            <div class="card shadow mb-4">
                                              <div class="card-header py-3 bg-primary">
                                                <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-university fa-fw"></i> Data Orang Tua (Ibu)</h6>
                                              </div>
                                              <div class="card-body">
                                                <div class="row">
                                                  <div class="form-group mb-3">
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap Ibu" />
                                                      <label for="nama_ibu">Nama Lengkap Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="status_ibu" name="status_ibu">
                                                        <option value="">Pilih Status</option>
                                                        <option value="Hidup">Masih Hidup</option>
                                                        <option value="Meninggal">Sudah Meninggal</option>
                                                      </select>
                                                      <label for="status_ibu">Status Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu" />
                                                      <label for="nik_ibu">NIK Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" />
                                                      <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" />
                                                      <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="agama_ibu" name="agama_ibu">
                                                        <option value="">Pilih Agama</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen">Kristen</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                      </select>
                                                      <label for="agama_ibu">Agama Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Terakhir Ibu" />
                                                      <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" />
                                                      <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu">
                                                        <option value="">Pilih Penghasilan</option>
                                                        <option value="2000000-3000000">2.000.000 – 3.000.000</option>
                                                        <option value="3000000-4000000">3.000.000 – 4.000.000</option>
                                                        <option value="4000000-5000000">4.000.000 – 5.000.000</option>
                                                        <option value=">5000000">> 5.000.000</option>
                                                      </select>
                                                      <label for="penghasilan_ibu">Penghasilan Ibu Per Bulan</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <input type="tel" class="form-control" id="no_hp_ibu" name="no_hp_ibu" placeholder="No HP Ibu" />
                                                      <label for="no_hp_ibu">No HP Ibu</label>
                                                    </div>
                                                    <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                                      <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" placeholder="Alamat Lengkap Ibu"></textarea>
                                                      <label for="alamat_ibu">Alamat Lengkap Ibu</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="pt-3 form-group row">
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                          <button type="submit" onclick="return confirm('Lanjutkan Simpan Data?');" class="btn btn-block btn-primary"><i class="bi bi-arrow-clockwise"></i> Update Data</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="container section-title" data-aos="fade-up">
            <h2>Quote</h2>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-lg-12">
              <h4>
                “Barangsiapa yang menghendaki kehidupan dunia, maka wajib baginya memiliki ilmu, dan barang siapa yang menghendaki kehidupan akhirat, maka wajib baginya memiliki ilmu, dan barang siapa menghendaki keduanya maka wajib baginya
                memiliki ilmu.”
              </h4>
              <h5>(HR. Turmudzi)</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.php" class="d-flex align-items-center">
              <span class="sitename">Ruhul Qur'ani</span>
            </a>
            <div class="footer-contact pt-3">
              <p>Meulaboh - Lapang, Kec. Johan Pahlawan,</p>
              <p>Kabupaten Aceh Barat, Aceh 23618</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+62 0852 9696 2778</span></p>
              <p><strong>Email:</strong> <span>info@ruhulqurani.co.id</span></p>
            </div>
          </div>
          <div class="col-lg-4 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="bi bi-chevron-right"></i><a href="#hero" class="active">Beranda<br /></a>
              </li>
              <li><i class="bi bi-chevron-right"></i><a href="#alt-features">Visi dan Misi</a></li>
              <li><i class="bi bi-chevron-right"></i><a href="#faq">Tanya Jawab</a></li>
              <li><i class="bi bi-chevron-right"></i><a href="#portfolio">Galeri</a></li>
              <li><i class="bi bi-chevron-right"></i><a href="#contact">Kontak</a></li>
              <li><i class="bi bi-chevron-right"></i><a href="psb.php">PPDB</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-12">
            <h4>Follow Us</h4>
            <p>Ikuti Akun Media Sosial Ruhul Qurani :</p>
            <div class="social-links d-flex">
              <a href="https://www.facebook.com/profile.php?id=100083028549972&locale=id_ID"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/ruhulqurani/"><i class="bi bi-instagram"></i></a>
              <a href="https://ruhulqurani.id/"><i class="bi bi-globe"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Ruhul Qurani</strong> <span>All Rights Reserved</span></p>
        <div class="credits">Designed by <a href="https://gitamitech.com/">Gitamitech</a></div>
      </div>
    </footer>
    <!-- Single Bootstrap Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Zoomed Image</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="" id="modalImage" class="img-fluid" alt="Zoomed Image" />
          </div>
          <div class="modal-footer">
            <a id="downloadLink" href="#" download="" class="btn btn-primary">Download</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Scroll Top -->
    <a href="index.php#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      $(document).on("click", ".browse3", function () {
        var file = $(this).parents().find(".file3");
        file.trigger("click");
      });

      $("#imgInp3").change(function (e) {
        var fileName = e.target.files[0].name;
        $("#file3").val(fileName);
      });
    </script>
    <script>
      // JavaScript to handle the modal image
      document.querySelectorAll('img[data-bs-target="#imageModal"]').forEach((img) => {
        img.addEventListener("click", function () {
          // Get the source and name for the image
          var imgSrc = this.getAttribute("data-img-src");
          var imgName = this.getAttribute("data-img-name");

          // Set the modal image source and download link
          var modalImage = document.getElementById("modalImage");
          var downloadLink = document.getElementById("downloadLink");

          modalImage.src = imgSrc;
          downloadLink.href = imgSrc;
          downloadLink.download = imgName;
        });
      });
    </script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Get all browse buttons and file inputs
        var browseButtons = document.querySelectorAll(".browse");
        var fileInputs = document.querySelectorAll('input[type="file"]');

        // Loop through each browse button to add event listener
        browseButtons.forEach(function (browseButton, index) {
          browseButton.addEventListener("click", function () {
            // Trigger click on the corresponding file input
            fileInputs[index].click();
          });
        });

        // Loop through each file input to update the file name in the text input
        fileInputs.forEach(function (fileInput) {
          fileInput.addEventListener("change", function () {
            var fileName = fileInput.files[0].name;
            // Find the text input associated with this file input
            var fileText = fileInput.parentElement.querySelector('input[type="text"]');
            fileText.value = fileName;
          });
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        // Show/Hide Prestasi fields based on dropdown selection
        $("#jalur_prestasi").change(function () {
          if ($(this).val() === "Prestasi") {
            $("#prestasi-fields").show();
          } else {
            $("#prestasi-fields").hide();
          }
        });
      });
    </script>
  </body>
</html>
