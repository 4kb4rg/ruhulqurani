<?php 
  session_start();
  error_reporting(1);
  include "config/koneksi.php";
  
  if (isset($_POST['submit'])) {
    $email = mysql_real_escape_string($_POST['email']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $admin = mysql_query("SELECT * FROM rb_psb_user WHERE email='$email' or phone='$phone'");
    $hitungadmin = mysql_num_rows($admin);
    
    if ($hitungadmin >= 1) {
        $r = mysql_fetch_array($admin);
      echo "<script>document.location='register.php?id=3';</script>";
      exit();
    }
  
    if ($_POST['password'] <> $_POST['repassword']) {
      echo "<script>document.location='register.php?id=2';</script>"; // Redirect jika ada yang kosong
  }else {
          // Jika semua sudah terisi, lakukan operasi insert
          $data = md5($_POST['password']);
          $passs = hash("sha512", $data);
          $date = date("Y-m-d H:i:s");
          $sql = "INSERT INTO `rb_psb_user` 
                  ( 
                  psb_id,
                  name,
                  email,
                  phone,
                  password,
                  status,
                  createddate
                  ) 
                  VALUES 
                  (
                  '$hp',
                  '$_POST[name]',
                  '$_POST[email]',
                  '$_POST[phone]',
                  '$passs',
                  '1',
                  NOW()
                  )";
  $phone = $_POST[phone];
  
  if (!preg_match("/[^+0-9]/", trim($phone))) {
    // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
    if (substr(trim($phone), 0, 2) == "62") {
        $hp = trim($phone);
    }
    // cek apakah no hp karakter ke 1 adalah angka 0
    else if (substr(trim($phone), 0, 1) == "0") {
        $hp = "62" . substr(trim($phone), 1);
    }
  }
  
          if (mysql_query($sql)) {
                    $curl = curl_init();
                      $token = "mfi1gyoODwh2EUGZOhWUD2MglPAmMdx1Of0gDPyS05XVutj1ZRpchdzw01xeGfnc";
                      $phone = "$hp";
                      
                      // Data yang digunakan dalam pesan otomatis
                      $nama = $_POST[name];  // Ganti dengan variabel yang menyimpan nama pengguna
                      $email = $_POST[email];  // Ganti dengan variabel email pengguna
                      $password = $_POST['password'];  // Ganti dengan variabel password
                      
                      // Format pesan otomatis
                      $message = urlencode("Selamat! Pendaftaran Anda di Website Ruhul Qurani berhasil dengan rincian data sebagai berikut:\n\nNama : $nama\nEmail : $email\nPassword : $password\n\nInformasi ini bersifat rahasia. Mohon untuk tidak membagikannya kepada siapa pun.");
                      
                  // Kirim pesan menggunakan Wablas API
                  curl_setopt($curl, CURLOPT_URL, "https://solo.wablas.com/api/send-message?phone=$phone&message=$message&token=$token");
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Ini untuk menyimpan output, bukan menampilkannya langsung
                  $result = curl_exec($curl);
                  curl_close($curl);
              echo "<script>document.location='login.php?reg=JHkhu7Wer';</script>"; // Redirect jika berhasil
          } else {
              echo "Error: " . mysql_error(); // Tampilkan pesan error jika query gagal
          }
          
      }
    }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ruhul Qurani</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">
    <link href="login/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="login/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="login/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="login/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="login/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="login/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="login/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="login/assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <?php 
                  if ($_GET['id'] == '2') {
                  echo '
                  <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                  <div class="toast-body">
                  <b>Maaf,</b> Password yang anda masukkan tidak sama dengan password kedua!
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  </div>
                  <br>'; }
                  if ($_GET['id'] == '3') {
                    echo '
                    <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                    <div class="toast-body">
                    <b>Maaf,</b> Email atau Nomor HP anda sudah terdaftar!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    </div>
                    <br>'; }
                  ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Ruhul Qurani</h5>
                      <p class="text-center small">Masukkan Detail Pribadi Anda untuk Membuat Akun.</p>
                    </div>
                    <form class="row g-3 needs-validation" action="" method="POST" enctype='multipart/form-data' novalidate>
                      <div class="col-12">
                        <label for="yourName" class="form-label">Nama Anda</label>
                        <input type="text" name="name" class="form-control"required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                      </div>
                      <div class="col-12">
                        <label for="yourEmail" class="form-label">Email Anda</label>
                        <input type="email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>
                      <div class="col-12">
                        <label for="yourUsername" class="form-label">No. Whatsapp</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text" id="inputGroupPrepend">Whatsapp</span>
                          <input type="number" name="phone" class="form-control" required>
                          <div class="invalid-feedback">Please choose a username.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      <div class="col-12">
                        <label for="yourRePassword" class="form-label">Ulangi-Password</label>
                        <input type="password" id="repassword" name="repassword" class="form-control" required>
                        <div class="invalid-feedback">Please enter your re-password!</div>
                      </div>
                      <div class="col-12">
                        <input type="checkbox" id="showPassword"> Tampilkan Password
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">Saya setuju dan menerima  <a href="#">Syarat dan Ketentuan</a></label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" name="submit" type="submit">Buat Akun</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Sudah punya akun? Masuk <a href="login.php">Log in</a></p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="login/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="login/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="login/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="login/assets/vendor/echarts/echarts.min.js"></script>
    <script src="login/assets/vendor/quill/quill.js"></script>
    <script src="login/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="login/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="login/assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="login/assets/js/main.js"></script>
    <script>
      document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('password');
        var rePasswordInput = document.getElementById('repassword');
        
        if (this.checked) {
          passwordInput.type = 'text';
          rePasswordInput.type = 'text';
        } else {
          passwordInput.type = 'password';
          rePasswordInput.type = 'password';
        }
      });
    </script>
    <script>
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function (toastEl) {
      return new bootstrap.Toast(toastEl, {
        autohide: true, // Mengatur apakah toast akan hilang otomatis
        delay: 10000    // Durasi toast ditampilkan (dalam milidetik)
      })
      });
      
      // Untuk menampilkan toast secara manual
      toastList.forEach(toast => toast.show());
    </script>
  </body>
</html>