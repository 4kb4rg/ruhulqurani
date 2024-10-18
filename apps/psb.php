<?php
  $psb = mysql_query("SELECT * FROM  rb_psb_pendaftaran_new WHERE update_id=".$_SESSION['id']." ");
   $hitungpsb = mysql_num_rows($psb);
  if ($hitungpsb >= 1){
   echo "<script>document.location='index.php?view=psb-data';</script>";
   exit();
  }
   include "psb-insert.php";
  ?>
<style> 
  .nav-tabs {
  overflow-x: auto;
  white-space: nowrap;
  }
  .nav-item {
  flex-shrink: 0; 
  }
  .nav-tabs::-webkit-scrollbar {
  display: none;
  }
</style>
<br><br><br><br><br><br>
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
                  <div class="card shadow mb-2">
                    <div class="card-body">
                      <form class="row g-3 needs-validation" action="" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" name="update_id" value="<?PHP ECHO $_SESSION[id]; ?>">
                        <input type="hidden" name="update_date" value="<?php echo date("Y-m-d H:i:s"); ?>">
                        <input type="hidden" name="reff" value="">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group mb-3 mt-3">
                              <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-primary">
                                  <h6 class="m-0 font-weight-bold text-white">
                                    <i class="fa fa-file-alt fa-fw"></i> Data Santri/Santriwati
                                  </h6>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-6">
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required style="text-transform: uppercase;">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required style="text-transform: uppercase;">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="agama" name="agama" required>
                                          <option value="">Pilih Agama</option>
                                          <option value="Islam">Islam</option>
                                          <option value="Kristen">Kristen</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Budha">Budha</option>
                                        </select>
                                        <label for="agama">Agama</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                          <option value="">Jenis Kelamin</option>
                                          <option value="1">Laki-laki</option>
                                          <option value="2">Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="jalur_prestasi" name="jalur_prestasi" required>
                                          <option value="">Pilih Jalur</option>
                                          <option value="Prestasi">Prestasi</option>
                                          <option value="Reguler">Reguler</option>
                                        </select>
                                        <label for="jalur_prestasi">Jalur Prestasi atau Reguler</label>
                                      </div>
                                      <!-- Additional fields for Prestasi -->
                                      <div id="prestasi-fields" style="display: none;">
                                        <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                          <input hidden type="file" name="img_siswa_1" class="file" accept="image/*" id="imgSiswa_1" >
                                          <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Raport MI/Sederajat Kelas V peringkat kelas 1 - 3" id="fileSiswa_1">
                                            <div class="input-group-append">
                                              <button type="button" class="browse btn btn-primary">Browse</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                          <input hidden type="file" name="img_siswa_2" class="file" accept="image/*" id="imgSiswa_2" >
                                          <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 KSM/OSN" id="fileSiswa_2">
                                            <div class="input-group-append">
                                              <button type="button" class="browse btn btn-primary">Browse</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                          <input hidden type="file" name="img_siswa_3" class="file" accept="image/*" id="imgSiswa_3" >
                                          <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 MTQ Min. Tingkat Kabupaten" id="fileSiswa_3">
                                            <div class="input-group-append">
                                              <button type="button" class="browse btn btn-primary">Browse</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                          <input hidden type="file" name="img_siswa_4" class="file" accept="image/*" id="imgSiswa_4" >
                                          <div class="input-group my-3">
                                            <input type="text" class="form-control" disabled placeholder="Juara 1 s/d 3 Prestasi olahraga, min tingkat kabupaten" id="fileSiswa_4">
                                            <div class="input-group-append">
                                              <button type="button" class="browse btn btn-primary">Browse</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input hidden type="file" name="kartu_keluarga" class="file" accept="image/*" id="kartu_keluarga">
                                        <div class="input-group my-3">
                                          <input type="text" class="form-control" readonly placeholder="Photo Kartu Keluarga" id="fileKartuKeluarga"required>
                                          <div class="input-group-append">
                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input hidden type="file" name="photo_santri" class="file" accept="image/*" id="photo_santri">
                                        <div class="input-group my-3">
                                          <input type="text" class="form-control"  readonly placeholder="Photo Santri/Santriwati" id="fileSantri" required>
                                          <div class="input-group-append">
                                            <button type="button" class="browse btn btn-primary">Browse</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Column 2 -->
                                    <div class="col-md-6">
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" placeholder="Nama Sekolah Asal" required style="text-transform: uppercase;">
                                        <label for="sekolah_asal">Nama Sekolah Asal</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="number" class="form-control" id="nisn" name="nisn" placeholder="NISN" required>
                                        <label for="nisn">NISN</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                                        <label for="nik">NIK</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Alamat Lengkap" required style="text-transform: uppercase;">
                                        <label for="alamat_lengkap">Alamat Lengkap</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="jenjang_madrasah" name="jenjang_madrasah" required>
                                          <option value="">Pilih Jenjang</option>
                                          <option value="MTS RQ">MTS RQ</option>
                                          <option value="MA RQ">MA RQ</option>
                                        </select>
                                        <label for="jenjang_madrasah">Jenjang Madrasah yang Diinginkan</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>
                                        <label for="no_hp">No HP</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
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
                                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Lengkap Ayah" required style="text-transform: uppercase;">
                                        <label for="nama_ayah">Nama Lengkap Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="status_ayah" name="status_ayah" required>
                                          <option value="">Pilih Status</option>
                                          <option value="Hidup">Masih Hidup</option>
                                          <option value="Meninggal">Sudah Meninggal</option>
                                        </select>
                                        <label for="status_ayah">Status Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="NIK Ayah" required>
                                        <label for="nik_ayah">NIK Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah" required style="text-transform: uppercase;">
                                        <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required>
                                        <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="agama_ayah" name="agama_ayah" required>
                                          <option value="">Pilih Agama</option>
                                          <option value="Islam">Islam</option>
                                          <option value="Kristen">Kristen</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Budha">Budha</option>
                                        </select>
                                        <label for="agama_ayah">Agama Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Pendidikan Terakhir Ayah" required style="text-transform: uppercase;">
                                        <label for="pendidikan_ayah">Pendidikan Terakhir Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required style="text-transform: uppercase;">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="penghasilan_ayah" name="penghasilan_ayah" required>
                                          <option value="">Pilih Penghasilan</option>
                                          <option value="0">0 – 2.000.000</option>
                                          <option value="2000000-3000000">2.000.000 – 3.000.000</option>
                                          <option value="3000000-4000000">3.000.000 – 4.000.000</option>
                                          <option value="4000000-5000000">4.000.000 – 5.000.000</option>
                                          <option value=">5000000">> 5.000.000</option>
                                        </select>
                                        <label for="penghasilan_ayah">Penghasilan Ayah Per Bulan</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="tel" class="form-control" id="no_hp_ayah" name="no_hp_ayah" placeholder="No HP Ayah" required>
                                        <label for="no_hp_ayah">No HP Ayah</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" placeholder="Alamat Lengkap Ayah" required style="text-transform: uppercase;"></textarea>
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
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap Ibu" required style="text-transform: uppercase;">
                                        <label for="nama_ibu">Nama Lengkap Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="status_ibu" name="status_ibu" required>
                                          <option value="">Pilih Status</option>
                                          <option value="Hidup">Masih Hidup</option>
                                          <option value="Meninggal">Sudah Meninggal</option>
                                        </select>
                                        <label for="status_ibu">Status Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="NIK Ibu" required>
                                        <label for="nik_ibu">NIK Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" required style="text-transform: uppercase;">
                                        <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" required>
                                        <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="agama_ibu" name="agama_ibu" required>
                                          <option value="">Pilih Agama</option>
                                          <option value="Islam">Islam</option>
                                          <option value="Kristen">Kristen</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Budha">Budha</option>
                                        </select>
                                        <label for="agama_ibu">Agama Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Pendidikan Terakhir Ibu" required style="text-transform: uppercase;">
                                        <label for="pendidikan_ibu">Pendidikan Terakhir Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required style="text-transform: uppercase;">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <select class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" required>
                                          <option value="">Pilih Penghasilan</option>
                                          <option value="0">0 – 2.000.000</option>
                                          <option value="2000000-3000000">2.000.000 – 3.000.000</option>
                                          <option value="3000000-4000000">3.000.000 – 4.000.000</option>
                                          <option value="4000000-5000000">4.000.000 – 5.000.000</option>
                                          <option value=">5000000">> 5.000.000</option>
                                        </select>
                                        <label for="penghasilan_ibu">Penghasilan Ibu Per Bulan</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <input type="tel" class="form-control" id="no_hp_ibu" name="no_hp_ibu" placeholder="No HP Ibu" required>
                                        <label for="no_hp_ibu">No HP Ibu</label>
                                      </div>
                                      <div class="col-md-10 form-group mt-3 form-floating mb-3">
                                        <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" placeholder="Alamat Lengkap Ibu" required style="text-transform: uppercase;"></textarea>
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
                            <input class="btn btn-lg btn-primary" type="submit" name="daftar" value="Daftar">
                          </div>
                        </div>
                      </form>
                    </div>
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
<!-- Single Bootstrap Modal -->
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
<!-- Scroll Top -->
<a href="index.php#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
  class="bi bi-arrow-up-short"></i></a>
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