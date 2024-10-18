<?php
  if(isset($_POST['update'])){
      
    $uploadDir = 'images/'; // Direktori tempat menyimpan file yang diupload
  
  // Fungsi untuk proses upload file dan penamaan ulang file
  function uploadPhoto($fileInputName, $uploadDir) {
    if(!empty($_FILES[$fileInputName]['name'])) {
        $fileExtension = pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION);
        // Gunakan microtime untuk mendapatkan waktu unik (dalam mikrodetik)
        $newFileName = date('dmYHis') . substr((string)microtime(), 2, 6) . '.' . $fileExtension;
        $targetFile = $uploadDir . $newFileName;
  
        // Pindahkan file ke folder yang diinginkan
        if(move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)){
            return $targetFile; // Return path file jika sukses
        }
    }
    return null; // Return null jika tidak ada file yang diupload
  }
  
  
    // Proses upload masing-masing file
    $photoSantri = uploadPhoto('photo_santri', $uploadDir);
    $imgSiswa1 = uploadPhoto('img_siswa_1', $uploadDir);
    $imgSiswa2 = uploadPhoto('img_siswa_2', $uploadDir);
    $imgSiswa3 = uploadPhoto('img_siswa_3', $uploadDir);
    $imgSiswa4 = uploadPhoto('img_siswa_4', $uploadDir);
    $kartuKeluarga = uploadPhoto('kartu_keluarga', $uploadDir);
  
    // Siapkan query update dengan kondisi untuk setiap file
    $updateQuery = "UPDATE rb_psb_pendaftaran_new SET 
  
        nama_lengkap = '$_POST[nama_lengkap]', 
        tempat_lahir = '$_POST[tempat_lahir]', 
        tanggal_lahir = '$_POST[tanggal_lahir]', 
        agama = '$_POST[agama]', 
        jenis_kelamin = '$_POST[jenis_kelamin]', 
        sekolah_asal = '$_POST[sekolah_asal]', 
        nisn = '$_POST[nisn]', 
        nik = '$_POST[nik]', 
        alamat_lengkap = '$_POST[alamat_lengkap]', 
        jenjang_madrasah = '$_POST[jenjang_madrasah]', 
        no_hp = '$_POST[no_hp]', 
        email = '$_POST[email]', 
        nama_ayah = '$_POST[nama_ayah]', 
        status_ayah = '$_POST[status_ayah]', 
        nik_ayah = '$_POST[nik_ayah]', 
        tempat_lahir_ayah = '$_POST[tempat_lahir_ayah]', 
        tanggal_lahir_ayah = '$_POST[tanggal_lahir_ayah]', 
        agama_ayah = '$_POST[agama_ayah]', 
        pendidikan_ayah = '$_POST[pendidikan_ayah]', 
        pekerjaan_ayah = '$_POST[pekerjaan_ayah]', 
        penghasilan_ayah = '$_POST[penghasilan_ayah]', 
        no_hp_ayah = '$_POST[no_hp_ayah]', 
        alamat_ayah = '$_POST[alamat_ayah]', 
        nama_ibu = '$_POST[nama_ibu]', 
        status_ibu = '$_POST[status_ibu]', 
        nik_ibu = '$_POST[nik_ibu]', 
        tempat_lahir_ibu = '$_POST[tempat_lahir_ibu]', 
        tanggal_lahir_ibu = '$_POST[tanggal_lahir_ibu]', 
        agama_ibu = '$_POST[agama_ibu]', 
        pendidikan_ibu = '$_POST[pendidikan_ibu]', 
        pekerjaan_ibu = '$_POST[pekerjaan_ibu]', 
        penghasilan_ibu = '$_POST[penghasilan_ibu]', 
        no_hp_ibu = '$_POST[no_hp_ibu]', 
        alamat_ibu = '$_POST[alamat_ibu]', 
        update_date = NOW() ";
  
    // Tambahkan kondisi untuk setiap foto jika file diupload
    if($photoSantri) {
        $updateQuery .= ", photo_santri = '$photoSantri'";
    }
    if($imgSiswa1) {
        $updateQuery .= ", img_siswa_1 = '$imgSiswa1'";
    }
    if($imgSiswa2) {
        $updateQuery .= ", img_siswa_2 = '$imgSiswa2'";
    }
    if($imgSiswa3) {
        $updateQuery .= ", img_siswa_3 = '$imgSiswa3'";
    }
    if($imgSiswa4) {
        $updateQuery .= ", img_siswa_4 = '$imgSiswa4'";
    }
    if($kartuKeluarga) {
        $updateQuery .= ", kartu_keluarga = '$kartuKeluarga'";
    }
  
    // Tambahkan kondisi WHERE untuk update_id
    $updateQuery .= " WHERE update_id = '$_SESSION[id]'";
  
      $Query_1 = "UPDATE rb_psb_aktivasi SET status_data='3' where kode_pendaftaran='" . $_POST['reff'] . "'";
      
    // Eksekusi query
    $result_1 = mysql_query($updateQuery);
    $result_2 = mysql_query($Query_1);
  
    if (!$result_1 || !$result_2) {
            echo "<script>document.location='index.php?view=psb-data';</script>";
            exit();
    } else {
        echo "Record and photos updated successfully";
    }
  }
  
  
  
    if (!isset($_SESSION['id'])) {
      header("Location: login.php");
      exit();
    } 
    
  
   
      $sql=mysql_query("SELECT 
      A.id, 
      A.reff, 
      A.nama_lengkap, 
      A.tempat_lahir, 
      A.tanggal_lahir, 
      A.agama, 
      A.jenis_kelamin, 
      A.jalur_prestasi, 
      A.sekolah_asal, 
      A.nisn, 
      A.nik, 
      A.alamat_lengkap, 
      A.jenjang_madrasah, 
      A.no_hp, 
      A.email, 
      A.nama_ayah, 
      A.status_ayah, 
      A.nik_ayah, 
      A.tempat_lahir_ayah, 
      A.tanggal_lahir_ayah, 
      A.agama_ayah, 
      A.pendidikan_ayah, 
      A.pekerjaan_ayah, 
      A.penghasilan_ayah, 
      A.no_hp_ayah, 
      A.alamat_ayah, 
      A.nama_ibu, 
      A.status_ibu, 
      A.nik_ibu, 
      A.tempat_lahir_ibu, 
      A.tanggal_lahir_ibu, 
      A.agama_ibu, 
      A.pendidikan_ibu, 
      A.pekerjaan_ibu, 
      A.penghasilan_ibu, 
      A.no_hp_ibu, 
      A.alamat_ibu, 
      CASE 
          WHEN A.kartu_keluarga ='' THEN 'images/images.jpeg' 
          ELSE A.kartu_keluarga 
      END AS kartu_keluarga,  
      CASE 
          WHEN A.photo_santri ='' THEN 'images/images.jpeg' 
          ELSE A.photo_santri 
      END AS photo_santri, 
      CASE 
          WHEN A.img_siswa_1 ='' THEN 'images/images-dummy.png' 
          ELSE A.img_siswa_1 
      END AS img_siswa_1,  
      CASE 
          WHEN A.img_siswa_2 ='' THEN 'images/images-dummy.png' 
          ELSE A.img_siswa_2 
      END AS img_siswa_2,  
      CASE 
          WHEN A.img_siswa_3 ='' THEN 'images/images-dummy.png' 
          ELSE A.img_siswa_3 
      END AS img_siswa_3,  
      CASE 
          WHEN A.img_siswa_4 ='' THEN 'images/images-dummy.png' 
          ELSE A.img_siswa_4 
      END AS img_siswa_4,   
      A.update_date, 
      A.update_id,
      B.status,
      
      case when B.status_pendaftaran='0' then 'Belum Bayar' else 'Sudah Bayar'end as desc_pendaftaran,
      case when B.status_pendaftaran='0' then 'danger' else 'success'end as status_pendaftaran,
      B.status_pendaftaran as status_p,
      
      
      case when B.status_data='0' then 'Belum Verifikasi' when B.status_data='1' then 'Revisi' when B.status_data='2' then 'Verifikasi' else 'Sudah Di revisi' end as desc_data,
      case when B.status_data='0' then 'danger' when B.status_data='1' then 'warning' when B.status_data='2' then 'success' else 'warning'end as status_data,
      B.status_data as status_d,
      
      
      case when B.status_ujian='0' then 'Belum di Tes' when B.status_ujian='1' then 'Lulus' when B.status_ujian='2' then 'Tidak Lulus' else 'Sudah Di revisi' end as desc_data_ujian,
      case when B.status_ujian='0' then 'danger' when B.status_ujian='1' then 'success' when B.status_ujian='2' then 'danger' else 'warning'end as status_ujian,
      B.status_ujian as status_u,
      
      case when B.status_medical_checkup='0' then 'Belum di Tes' when B.status_medical_checkup='1' then 'Lulus' when B.status_medical_checkup='2' then 'Tidak Lulus' else 'Sudah Di revisi' end as desc_medical_checkup,
      case when B.status_medical_checkup='0' then 'danger' when B.status_medical_checkup='1' then 'success' when B.status_medical_checkup='2' then 'danger' else 'warning' end as status_medical_checkup,
      B.status_medical_checkup as status_m,
      
      
      case when B.status_daftar_ulang='0' then 'Belum Bayar' when B.status_daftar_ulang='1' then 'Sudah Bayar'  end as desc_daftar_ulang,
      case when B.status_daftar_ulang='0' then 'danger' when B.status_daftar_ulang='1' then 'success' when B.status_daftar_ulang='2' then 'danger' else 'warning' end as status_daftar_ulang,
      B.status_daftar_ulang as status_du,
      
      
      C.phone
  FROM rb_psb_pendaftaran_new A
  INNER JOIN rb_psb_aktivasi B on A.reff=B.kode_pendaftaran
  LEFT JOIN rb_psb_user C on A.update_id=C.id_psb
  
  where A.update_id=".$_SESSION['id']." ");
      while($data = mysql_fetch_array($sql)){
      $id= $data['id'];
    
    // Status Pendaftaran
    $status_p = $data['status_p'];
    $status_pendaftaran = $data['status_pendaftaran'];
    $desc_pendaftaran = $data['desc_pendaftaran'];
    
    // Status Data
    $status_d = $data['status_d'];
    $status_data = $data['status_data'];
    $desc_data = $data['desc_data'];
    
    // Status Ujian
    $status_u = $data['status_u'];
    $status_ujian = $data['status_ujian'];
    $desc_data_ujian = $data['desc_data_ujian'];
    
    // Status Medical Checkup
    $status_m = $data['status_m'];
    $status_medical_checkup = $data['status_medical_checkup'];
    $desc_medical_checkup = $data['desc_medical_checkup']; 
    
    // Status Daftar Ulang
    $status_du = $data['status_du'];
    $status_daftar_ulang = $data['status_daftar_ulang'];
    $desc_daftar_ulang = $data['desc_daftar_ulang'];

      
      $reff = $data['reff'];
      $nama_lengkap = $data['nama_lengkap'];
      $tempat_lahir = $data['tempat_lahir'];
      $tanggal_lahir = $data['tanggal_lahir'];
      $agama = $data['agama'];
      $jenis_kelamin = $data['jenis_kelamin'];
      $jalur_prestasi = $data['jalur_prestasi'];
      $sekolah_asal = $data['sekolah_asal'];
      $nisn = $data['nisn'];
      $nik = $data['nik'];
      $alamat_lengkap = $data['alamat_lengkap'];
      $jenjang_madrasah = $data['jenjang_madrasah'];
      $no_hp = $data['no_hp'];
      $email = $data['email'];
      $nama_ayah = $data['nama_ayah'];
      $status_ayah = $data['status_ayah'];
      $nik_ayah = $data['nik_ayah'];
      $tempat_lahir_ayah = $data['tempat_lahir_ayah'];
      $tanggal_lahir_ayah = $data['tanggal_lahir_ayah'];
      $agama_ayah = $data['agama_ayah'];
      $pendidikan_ayah = $data['pendidikan_ayah'];
      $pekerjaan_ayah = $data['pekerjaan_ayah'];
      $penghasilan_ayah = $data['penghasilan_ayah'];
      $no_hp_ayah = $data['no_hp_ayah'];
      $alamat_ayah = $data['alamat_ayah'];
      $nama_ibu = $data['nama_ibu'];
      $status_ibu = $data['status_ibu'];
      $nik_ibu = $data['nik_ibu'];
      $tempat_lahir_ibu = $data['tempat_lahir_ibu'];
      $tanggal_lahir_ibu = $data['tanggal_lahir_ibu'];
      $agama_ibu = $data['agama_ibu'];
      $pendidikan_ibu = $data['pendidikan_ibu'];
      $pekerjaan_ibu = $data['pekerjaan_ibu'];
      $penghasilan_ibu = $data['penghasilan_ibu'];
      $no_hp_ibu = $data['no_hp_ibu'];
      $alamat_ibu = $data['alamat_ibu'];
      $kartu_keluarga = $data['kartu_keluarga'];
      $photo_santri = $data['photo_santri'];
      $img_siswa_1 = $data['img_siswa_1'];
      $img_siswa_2 = $data['img_siswa_2'];
      $img_siswa_3 = $data['img_siswa_3'];
      $img_siswa_4 = $data['img_siswa_4'];
      $update_date = $data['update_date'];
      $update_id = $data['update_id'];
      
      }
      
            $revisi=mysql_query("select description FROM rb_psb_revisi where id_psb=".$id." 
  ORDER BY id desc
  limit 1");
   while($data = mysql_fetch_array($revisi)){
     
   $desc = $data['description'];
   }
      ?>
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
  .image-container {
  display: flex;
  justify-content: center;
  }
</style>
<br><br><br><br>
<div class="page-title">
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.php">Beranda</a></li>
        <li class="current">PSB</li>
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
            <div class="row">
              <?php 
                if ($status_d == '1') {
                echo '
                <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">Revisi!</h4>
                <p>'.$desc.'</p>
                <hr>
                <p class="mb-0">Update Data Sebelum tgl 10-10-2024.</p>
                </div>'; }
                if ($_GET['id_st'] == '9') {
                echo '
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Berhasil!</h4>
                <p>Pembayaran anda berhasil dan akan di beritahu informasi selanjut nya.</p>
                </div>'; }
                if ($_GET['id_st'] == 'Hui87') {
                echo '
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Berhasil!</h4>
                <p>Pembayaran Pendaftaran Ulang anda telah berhasil.</p>
                </div>'; }
                ?>
              <div class="col-md-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Informasi</b></h6>
                  </div>
                  <div class="card-body">
                    <div class="image-container">
                      <img src="<?php echo $photo_santri; ?>" class="img-thumbnail">
                    </div>
                    <br /><br />
                    <table style="font-size: 14px;" cellpadding="3">
                      <tbody>
                        <tr>
                          <td>Nomor Daftar</td>
                          <td>: <b><?php echo $reff; ?></b></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td>: <?php echo $nama_lengkap;?></td>
                        </tr>
                        <tr>
                          <td>1. Pembayaran Pendaftaran</td>
                          <td>: <span class="badge bg-<?php echo $status_pendaftaran; ?>"><?php echo $desc_pendaftaran; ?></span></td>
                        </tr>
                        <tr>
                          <td>2. Status Data</td>
                          <td>: <span class="badge bg-<?php echo $status_data; ?>"><?php echo $desc_data; ?></span></td>
                        </tr>
                        <tr>
                          <td>3. Hasil Ujian</td>
                          <td>: <span class="badge bg-<?php echo $status_ujian; ?>"><?php echo $desc_data_ujian; ?></span></td>
                        </tr>
                        <tr>
                          <td>3. Hasil Medical Checkup</td>
                          <td>: <span class="badge bg-<?php echo $status_medical_checkup; ?>"><?php echo $desc_medical_checkup; ?></span></td>
                        </tr>
                        <tr>
                          <td>4. Status Calon Santri/Santriwati</td>
                          <td>: <span class="badge bg-<?php echo $status_ujian; ?>"><?php echo $desc_data_ujian; ?></span></td>
                        </tr>
                        <tr>
                          <td>5. Pendaftaran Ulang</td>
                          <td>: <span class="badge bg-<?php echo $status_daftar_ulang; ?>"><?php echo $desc_daftar_ulang; ?></span></td>
                        </tr>
                        <tr>
                          <td>Tanggal Daftar</td>
                          <td>: <?php echo $update_date; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php 
                  if ($status_p == '0') {
                      echo '
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Biaya Pendaftaran</b></h6>
                          </div>
                          <div class="card-body">
                              <table style="font-size: 14px;" cellpadding="3">
                                  <tbody>
                                      <tr>
                                          <td>Pembayaran</td>
                                          <td>: Rp.200.000</td>
                                      </tr>
                                      <tr>
                                          <td>Admin - Bank</td>
                                          <td>: Rp.5.000</td>
                                      </tr>
                                  </tbody>
                              </table>
                              <br>
                              <h5>Total pembayaran : <b>Rp.205.000,-</b></h5>
                          </div>
                          <div class="card-footer">
                              <form action="apps/test_xendit.php" method="POST">
                                  <input type="hidden" name="reff" value="' . $reff . '">
                                  <input type="hidden" name="name" value="' . $nama_lengkap . '">
                                  <button type="submit" name="update" class="btn btn-success w-100 btn-xl">
                                      <i class="bi bi-credit-card"></i> Bayar <b>Rp.205.000</b>
                                  </button>
                              </form>
                          </div>
                      </div>';
                  }
                  
                  if ($status_m == '1') {
                      echo '
                      <div class="card shadow mb-4">
                          <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Biaya Daftar Ulang</b></h6>
                          </div>
                          <div class="card-body">
                              <table style="font-size: 14px;" cellpadding="3">
                                  <tbody>
                                      <tr>
                                          <td>Pembayaran Gedung</td>
                                          <td>: Rp.10.000.000</td>
                                      </tr>
                                      <tr>
                                          <td>Pembayaran Baju</td>
                                          <td>: Rp.2.000.000</td>
                                      </tr>
                                      <tr>
                                          <td>Admin - Bank</td>
                                          <td>: Rp.50.000</td>
                                      </tr>
                                  </tbody>
                              </table>
                              <br>
                              <h5>Total pembayaran : <b>Rp.12.050.000,-</b></h5>
                          </div>
                          <div class="card-footer">
                              <form action="apps/daftarulang_xendit.php" method="POST">
                                  <input type="hidden" name="reff" value="' . $reff . '">
                                  <button type="submit" name="update" class="btn btn-primary w-100 btn-xl">
                                      <i class="bi bi-credit-card"></i> Bayar <b>Rp.12.050.000</b>
                                  </button>
                              </form>
                          </div>
                      </div>';
                  }
                   if ($status_d == '2') {
                      echo '
                      <div class="card shadow mb-4">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-warning"><i class="fa fa-list-alt fa-fw"></i> <b>Jadwal dan Kartu Ujian</b></h6>
                  </div>
                  <div class="card-body">
                  <div class="col-md-12 form-group mt-3 form-floating mb-3">
                    <select class="form-control" id="jenjang_madrasah" name="jenjang_madrasah" required>
                      <option value="">GRUP A (08:00 - 10:25)</option>
                    </select>
                    <label for="jenjang_madrasah">Jadwal Ujian</label>
                  </div>
                  <div class="col-sm-12">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <!-- Menggunakan href untuk mengarah ke file card.php yang menghasilkan PDF -->
                            <a href="card.php" target="_blank" class="btn btn-warning w-100 btn-xl">
                              <i class="bi bi-credit-card"></i> Download Kartu Ujian
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  </div>';
                  }
                  ?>
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Raport MI/Sederajat Kelas V peringkat kelas 1 - 3</div>
                                <span></span>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $img_siswa_1; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $img_siswa_1; ?>" data-img-name="<?php echo $img_siswa_1; ?>">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Juara 1 s/d 3 KSM/OSN</div>
                                <span></span>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $img_siswa_2; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $img_siswa_2; ?>" data-img-name="<?php echo $img_siswa_2; ?>">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Juara 1 s/d 3 MTQ Min. Tingkat Kabupaten</div>
                                <span></span>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $img_siswa_3; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $img_siswa_3; ?>" data-img-name="<?php echo $img_siswa_3; ?>">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Juara 1 s/d 3 Prestasi olahraga, min tingkat kabupaten</div>
                                <span></span>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $img_siswa_4; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $img_siswa_4; ?>" data-img-name="<?php echo $img_siswa_4; ?>">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto KK</div>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $kartu_keluarga; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $kartu_keluarga; ?>" data-img-name="<?php echo $kartu_keluarga; ?>">
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Foto Santri</div>
                              </div>
                              <div class="col-auto">
                                <img src="<?php echo $photo_santri; ?>" width="100" height="85" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="<?php echo $photo_santri; ?>" data-img-name="<?php echo $photo_santri; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list-alt fa-fw"></i> <b>Form Data Diri</b></h6>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                      <input type="hidden"  name="reff" value="<?php echo $reff;?>">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- Data Diri -->
                          <div class="row">
                            <div class="col-6">
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $nama_lengkap;?>" required style="text-transform: uppercase;">
                                <label for="nama_lengkap">Nama Lengkap</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir;?>" required>
                                <label for="tempat_lahir">Tempat Lahir</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" required>
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <select class="form-control" id="agama" name="agama" required>
                                  <option value="">Pilih Agama</option>
                                  <option value="Islam" <?php if($agama == 'Islam') echo 'selected';?>>Islam</option>
                                  <option value="Kristen" <?php if($agama == 'Kristen') echo 'selected';?>>Kristen</option>
                                  <option value="Hindu" <?php if($agama == 'Hindu') echo 'selected';?>>Hindu</option>
                                  <option value="Budha" <?php if($agama == 'Budha') echo 'selected';?>>Budha</option>
                                </select>
                                <label for="agama">Agama</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                  <option value="">Jenis Kelamin</option>
                                  <option value="1" <?php if($jenis_kelamin == '1') echo 'selected';?>>Laki-laki</option>
                                  <option value="2" <?php if($jenis_kelamin == '2') echo 'selected';?>>Perempuan</option>
                                </select>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <select class="form-control" id="jalur_prestasi" name="jalur_prestasi" disabled>
                                  <option value="">Pilih Jalur</option>
                                  <option value="Prestasi" <?php if($jalur_prestasi == 'Prestasi') echo 'selected';?>>Prestasi</option>
                                  <option value="Reguler" <?php if($jalur_prestasi == 'Reguler') echo 'selected';?>>Reguler</option>
                                </select>
                                <label for="jalur_prestasi">Jalur Prestasi atau Reguler</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" value="<?php echo $sekolah_asal;?>" required>
                                <label for="sekolah_asal">Nama Sekolah Asal</label>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn;?>" required>
                                <label for="nisn">NISN</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                  <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik;?>"  title="Masukkan 16 digit NIK">
                                <label for="nik">NIK</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="<?php echo $alamat_lengkap;?>" required>
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <select class="form-control" id="jenjang_madrasah" name="jenjang_madrasah" required>
                                  <option value="">Pilih Jenjang</option>
                                  <option value="MTS RQ" <?php if($jenjang_madrasah == 'MTS RQ') echo 'selected';?>>MTS RQ</option>
                                  <option value="MA RQ" <?php if($jenjang_madrasah == 'MA RQ') echo 'selected';?>>MA RQ</option>
                                </select>
                                <label for="jenjang_madrasah">Jenjang Madrasah yang Diinginkan</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp;?>" required>
                                <label for="no_hp">No HP</label>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" required>
                                <label for="email">Alamat Email</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="img_siswa_1" class="file" accept="image/*" id="imgSiswa_1" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Raport MI/Sederajat Kelas V peringkat kelas 1 - 3" id="fileSiswa_1">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="img_siswa_2" class="file" accept="image/*" id="imgSiswa_2" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 KSM/OSN" id="fileSiswa_2">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="img_siswa_3" class="file" accept="image/*" id="imgSiswa_3" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 MTQ Min. Tingkat Kabupaten" id="fileSiswa_3">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="img_siswa_4" class="file" accept="image/*" id="imgSiswa_4" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 Prestasi olahraga, min tingkat kabupaten" id="fileSiswa_4">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="kartu_keluarga" class="file" accept="image/*" id="kartu_keluarga" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Photo Kartu Keluarga" id="fileKartuKeluarga">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                <input hidden type="file" name="photo_santri" class="file" accept="image/*" id="photo_santri" >
                                <div class="input-group my-3">
                                  <input type="text" class="form-control" disabled placeholder="Photo Santri/Santriwati" id="fileSantri">
                                  <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Data Ayah -->
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group mb-3 mt-3">
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3 bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-university fa-fw"></i> Data Orang Tua (Ayah)</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="form-group mb-3">
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $nama_ayah;?>" required>
                                          <label for="nama_ayah">Nama Lengkap Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="status_ayah" name="status_ayah" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Hidup" <?php if($status_ayah == 'Hidup') echo 'selected';?>>Masih Hidup</option>
                                            <option value="Meninggal" <?php if($status_ayah == 'Meninggal') echo 'selected';?>>Sudah Meninggal</option>
                                          </select>
                                          <label for="status_ayah">Status Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" value="<?php echo $nik_ayah;?>" required>
                                          <label for="nik_ayah">NIK Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="<?php echo $tempat_lahir_ayah;?>" required>
                                          <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="<?php echo $tanggal_lahir_ayah;?>" required>
                                          <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="agama_ayah" name="agama_ayah" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam" <?php if($agama_ayah == 'Islam') echo 'selected';?>>Islam</option>
                                            <option value="Kristen" <?php if($agama_ayah == 'Kristen') echo 'selected';?>>Kristen</option>
                                            <option value="Hindu" <?php if($agama_ayah == 'Hindu') echo 'selected';?>>Hindu</option>
                                            <option value="Budha" <?php if($agama_ayah == 'Budha') echo 'selected';?>>Budha</option>
                                          </select>
                                          <label for="agama_ayah">Agama Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" value="<?php echo $pendidikan_ayah;?>" required>
                                          <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo $pekerjaan_ayah;?>" required>
                                          <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" required>
                                            <option value="">Pilih Penghasilan</option>
                                            <option value="0" <?php if($penghasilan_ayah == '0') echo 'selected';?>>0 – 2.000.000</option>
                                            <option value="2000000-3000000" <?php if($penghasilan_ayah == '2000000-3000000') echo 'selected';?>>2.000.000 – 3.000.000</option>
                                            <option value="3000000-4000000" <?php if($penghasilan_ayah == '3000000-4000000') echo 'selected';?>>3.000.000 – 4.000.000</option>
                                            <option value="4000000-5000000" <?php if($penghasilan_ayah == '4000000-5000000') echo 'selected';?>>4.000.000 – 5.000.000</option>
                                            <option value=">5000000" <?php if($penghasilan_ayah == '>5000000') echo 'selected';?>>> 5.000.000</option>
                                          </select>
                                          <label for="penghasilan_ayah">Penghasilan Ayah Per Bulan</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="tel" class="form-control" id="no_hp_ayah" name="no_hp_ayah" value="<?php echo $no_hp_ayah;?>" required>
                                          <label for="no_hp_ayah">No HP Ayah</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" required><?php echo $alamat_ayah;?></textarea>
                                          <label for="alamat_ayah">Alamat Lengkap Ayah</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <!-- Data Ibu -->
                              <div class="form-group mb-3 mt-3">
                                <div class="card shadow mb-4">
                                  <div class="card-header py-3 bg-primary">
                                    <h6 class="m-0 font-weight-bold text-white"><i class="fa fa-university fa-fw"></i> Data Orang Tua (Ibu)</h6>
                                  </div>
                                  <div class="card-body">
                                    <div class="row">
                                      <div class="form-group mb-3">
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $nama_ibu;?>" required>
                                          <label for="nama_ibu">Nama Lengkap Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="status_ibu" name="status_ibu" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Hidup" <?php if($status_ibu == 'Hidup') echo 'selected';?>>Masih Hidup</option>
                                            <option value="Meninggal" <?php if($status_ibu == 'Meninggal') echo 'selected';?>>Sudah Meninggal</option>
                                          </select>
                                          <label for="status_ibu">Status Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="<?php echo $nik_ibu;?>" required>
                                          <label for="nik_ibu">NIK Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="<?php echo $tempat_lahir_ibu;?>" required>
                                          <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" value="<?php echo $tanggal_lahir_ibu;?>" required>
                                          <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="agama_ibu" name="agama_ibu" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam" <?php if($agama_ibu == 'Islam') echo 'selected';?>>Islam</option>
                                            <option value="Kristen" <?php if($agama_ibu == 'Kristen') echo 'selected';?>>Kristen</option>
                                            <option value="Hindu" <?php if($agama_ibu == 'Hindu') echo 'selected';?>>Hindu</option>
                                            <option value="Budha" <?php if($agama_ibu == 'Budha') echo 'selected';?>>Budha</option>
                                          </select>
                                          <label for="agama_ibu">Agama Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" value="<?php echo $pendidikan_ibu;?>" required>
                                          <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo $pekerjaan_ibu;?>" required>
                                          <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" required>
                                            <option value="">Pilih Penghasilan</option>
                                            <option value="0" <?php if($penghasilan_ibu == '0') echo 'selected';?>>0 – 2.000.000</option>
                                            <option value="2000000-3000000" <?php if($penghasilan_ibu == '2000000-3000000') echo 'selected';?>>2.000.000 – 3.000.000</option>
                                            <option value="3000000-4000000" <?php if($penghasilan_ibu == '3000000-4000000') echo 'selected';?>>3.000.000 – 4.000.000</option>
                                            <option value="4000000-5000000" <?php if($penghasilan_ibu == '4000000-5000000') echo 'selected';?>>4.000.000 – 5.000.000</option>
                                            <option value=">5000000" <?php if($penghasilan_ibu == '>5000000') echo 'selected';?>>> 5.000.000</option>
                                          </select>
                                          <label for="penghasilan_ibu">Penghasilan Ibu Per Bulan</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <input type="tel" class="form-control" id="no_hp_ibu" name="no_hp_ibu" value="<?php echo $no_hp_ibu;?>" required>
                                          <label for="no_hp_ibu">No HP Ibu</label>
                                        </div>
                                        <div class="col-md-12 form-group mt-3 form-floating mb-3">
                                          <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" required><?php echo $alamat_ibu;?></textarea>
                                          <label for="alamat_ibu">Alamat Lengkap Ibu</label>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php 
                        if ($status_d <> '2' ) {
                            echo '
                            <div class="pt-3 form-group row">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                      <button type="update" name="update" onclick="return confirm("Lanjutkan Simpan Data?");" class="btn btn-block btn-primary"><i class="bi bi-arrow-clockwise"></i> Update Data</button>
                                    </div>';
                        }
                        ?>
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
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Zoomed Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="" id="modalImage" class="img-fluid" alt="Zoomed Image">
      </div>
      <div class="modal-footer">
        <a id="downloadLink" href="#" download="" class="btn btn-primary">Download</a>
      </div>
    </div>
  </div>
</div>
<script src="assets/js/main.js"></script>
<script>$(document).on("click", ".browse3", function () {
  var file = $(this).parents().find(".file3");
  file.trigger("click");
  });
  
  $('#imgInp3').change(function (e) {
  var fileName = e.target.files[0].name;
  $("#file3").val(fileName);
  });
</script>
<script>
  // JavaScript to handle the modal image
  document.querySelectorAll('img[data-bs-target="#imageModal"]').forEach(img => {
    img.addEventListener('click', function() {
      // Get the source and name for the image
      var imgSrc = this.getAttribute('data-img-src');
      var imgName = this.getAttribute('data-img-name');
      
      // Set the modal image source and download link
      var modalImage = document.getElementById('modalImage');
      var downloadLink = document.getElementById('downloadLink');
      
      modalImage.src = imgSrc;
      downloadLink.href = imgSrc;
      downloadLink.download = imgName;
    });
  });
  
      
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
  // Get all browse buttons and file inputs
  var browseButtons = document.querySelectorAll('.browse');
  var fileInputs = document.querySelectorAll('input[type="file"]');
  
  // Loop through each browse button to add event listener
  browseButtons.forEach(function(browseButton, index) {
  browseButton.addEventListener('click', function () {
      // Trigger click on the corresponding file input
      fileInputs[index].click();
  });
  });
  
  // Loop through each file input to update the file name in the text input
  fileInputs.forEach(function(fileInput) {
  fileInput.addEventListener('change', function () {
      var fileName = fileInput.files[0].name;
      // Find the text input associated with this file input
      var fileText = fileInput.parentElement.querySelector('input[type="text"]');
      fileText.value = fileName;
  });
  });
  });
  
</script>
<script>
  $(document).ready(function() {
      // Show/Hide Prestasi fields based on dropdown selection
      $('#jalur_prestasi').change(function() {
          if ($(this).val() === 'Prestasi') {
              $('#prestasi-fields').show();
          } else {
              $('#prestasi-fields').hide();
          }
      });
  });
</script>