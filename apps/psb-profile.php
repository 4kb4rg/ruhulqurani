
<br><br><br><br>
<!-- Page Title -->
<div class="page-title">
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.php">Beranda</a></li>
        <li class="current">Profile</li>
      </ol>
    </div>
  </nav>
</div>
<!-- End Page Title -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
          <div class="row gy-4">
            <!-- Page Heading -->
            <div class="heading">
              <div class="container">
                <div class="row d-flex justify-content-center text-center">
                  <div class="col-lg-8">
                    <h1>Profile User</h1>
                  </div>
                </div>
              </div>
            </div>
            <section id="blog" class="blog">
              <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row gy-4">
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                        $data = mysql_fetch_array(mysql_query("SELECT *
                                    FROM `rb_psb_user` WHERE id_psb = '$_SESSION[id]'"));
                        $name=$data['name'];
                        $email=$data['email'];
                        $phone=$data['phone'];
                        ?>
                      <div class="card shadow mb-2">
                        <div class="card-body">
                          <form action="" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            <input type="hidden" name="reff" value="">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="col-md-10 form-group  mt-3">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" name="nik" value="<?php  echo $name ?>" require="">
                                </div>
                                <div class="col-md-10 form-group  mt-3">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="nis" value="<?php  echo $email; ?>" require="">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="col-md-10 form-group  mt-3">
                                  <label>Nomor Whatsapp</label>
                                  <input type="text" class="form-control" name="nama"  value="<?php  echo $phone; ?>" require="">
                                </div>
                                <div class="col-md-10 form-group  mt-3">
                                  <label>Password </label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div onclick="myFunction()" class="input-group-text pointer"><i id="icon"
                                        class="bi bi-eye"></i></div>
                                    </div>
                                    <input type="text" class="active form-control" name="password"
                                      placeholder="Password" value="" require="">
                                  </div>
                                </div>
                              </div>
                              <div class="pt-3 form-group row">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                  <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                    data-target="#Kebijakan">Simpan</button>
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
</div>