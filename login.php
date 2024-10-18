<?php 
  session_start();
  error_reporting(1);
  include "config/koneksi.php";
  include "config/library.php";
  include "config/fungsi_seo.php";
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dayah Ruhul Qur'ani</title>
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
                    <?php if ($_GET['reg'] == 'JHkhu7Wer') {
    echo '
            <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body">
                    <b>Selamat,</b> Pendaftaran anda telah Sukses!<br>
                    Silahkan Login.
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div>
              <br>'; }?>
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Dayah Ruhul Qur'ani</h5>
                    <p class="text-center small">Masukkan Email & Password untuk login.</p>
                  </div>

                  <form  class="row g-3 needs-validation"  method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="text" name='a' class="form-control" id="emailaddress" required>
                        <div class="invalid-feedback">Masukkan Email anda.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name='b' class="form-control" id="password" required>
                      <div class="invalid-feedback">Masukkan Password anda.</div>
                    </div>
                        
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" value="lsRememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat saya</label>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      
                      <button class="btn btn-primary w-100" type="submit" name='login' onclick="lsRememberMe()">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-2" style="text-align: center;">Belum punya akun?</a></p>
                       <a class="btn btn-warning w-50 btn-center btn-sm" href="register.php">Buat akun</a> 
                    </div>
                    <div class="col-12">
                      <p class="small mb-0" style="text-align: center;">Kembali ke Beranda? <a href="index.php"><b>Klik di sini</b></a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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
<script>
    let rmCheck = document.getElementById("rememberMe"),
    passwordInput = document.getElementById("password"),
    emailInput = document.getElementById("emailaddress");

if (localStorage.checkbox && localStorage.checkbox != "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
  passwordInput.value = localStorage.password;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
  passwordInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value != "" && passwordInput.value != "") {
    localStorage.username = emailInput.value;
    localStorage.password = passwordInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.passoword = "";
    localStorage.checkbox = "";
  }
}
</script>
</body> 

</html>

<?php 

if (isset($_POST['login'])){
 $data=md5(anti_injection($_POST['b']));
 $passlain=hash("sha512",$data);
 $siswa = mysql_query("SELECT * FROM  rb_psb_user WHERE email='".anti_injection($_POST['a'])."' AND password='$passlain'");
 
 
 $hitungsiswa = mysql_num_rows($siswa);
 if ($hitungsiswa >= 1){
    $r = mysql_fetch_array($siswa);
    $_SESSION['id']     = $r['id_psb'];
    $_SESSION['namalengkap']  = $r['name'];
    $_SESSION['password']  = $r['password'];
    $_SESSION['telepon']  = $r['phone'];
    $_SESSION['email']  = $r['email'];
    $_SESSION['level']    = 'siswa';
    include "config/user_agent.php";
    echo "<script>document.location='index.php?view=psb';</script>";
 }else{
    echo "<script>window.alert('Wrong Password or Email');
                                  window.location=('login.php')</script>";
 }
}
?>

          
