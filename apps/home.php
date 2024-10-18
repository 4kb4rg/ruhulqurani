<style>

  @media (max-width: 768px) {
    iframe {
  height: 300px;
  }
    .carousel-caption {
        font-size: 14px;
        padding: 5px;
    }
}
.carousel-item img {
    width: 100%;
    height: auto;
}

  .carousel-caption h5, 
.carousel-caption p {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

</style>


<section >
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="assets/img/hero-carousel/1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block" style="background-color: rgba(0, 0, 0, 0.2); padding: 10px; border-radius: 10px; position: absolute; bottom: 0; left: 0; right: 0;">
          <h5 class="text-white">Masjid Ruhul Qur'ani</h5>
          <p class="text-white">Pusat spiritual dan aktivitas keagamaan yang menjadi jantung dari setiap kegiatan santri.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/img/hero-carousel/2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block" style="background-color: rgba(0, 0, 0, 0.2); padding: 10px; border-radius: 10px; position: absolute; bottom: 0; left: 0; right: 0;">
          <h5 class="text-white">Asrama Ruhul Qur'ani</h5>
          <p class="text-white">Tempat pembinaan karakter islami dan pengembangan potensi diri bagi santri putri kami.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/hero-carousel/3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block" style="background-color: rgba(0, 0, 0, 0.2); padding: 10px; border-radius: 10px; position: absolute; bottom: 0; left: 0; right: 0;">
          <h5 class="text-white">Upacara Pembukaan Ruhul Qur'ani</h5>
          <p class="text-white">Momen kebersamaan dan disiplin santri dalam rangkaian acara formal pembukaan kegiatan pesantren.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/hero-carousel/4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block" style="background-color: rgba(0, 0, 0, 0.2); padding: 10px; border-radius: 10px; position: absolute; bottom: 0; left: 0; right: 0;">
          <h5 class="text-white">Seminar Ilmiah Ruhul Qur'ani</h5>
          <p class="text-white">Menggali ilmu dan menanamkan semangat inovasi dengan menghadirkan pembicara ahli.</p>
      </div>
    </div>
  </div>
  
  <!-- Next and Previous controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</section>
<section id="news" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>News</h2>
    <p>Berita Seputar Dayah Ruhul Qurani, MTsS dan MAS</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">
          <div class="container">
            <div class="row gy-2">
              <div class="col-12">
                <?php
                  // Query untuk mengambil data dari tabel rb_web_berita
                  $query = mysql_query("SELECT A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                  FROM rb_web_berita A
                  LEFT JOIN rb_users B ON A.update_id = B.id_user
                  LEFT JOIN rb_users C ON A.created_id = C.id_user
                  WHERE A.status = 2
                  ORDER BY A.id DESC LIMIT 1");
                  
                  // Loop untuk menampilkan setiap berita
                  while ($row = mysql_fetch_array($query)) {
                      echo "
                      <article>
                          <div class='post-img text-center'>
                  <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='img-fluid'>
                  </div>
                  
                          <h2 class='title'>
                              <a href='index.php?view=detail-berita&id=" . $row['header'] . "'>" . $row['header'] . "</a>
                          </h2>
                          <div class='meta-top'>
                              <ul>
                                  <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Oleh : " . $row['created_id'] . "</a></li>
                                  <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Editor : " . $row['update_id'] . "</a></li>
                                  <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='#'><time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d M Y - H:i', strtotime($row['update_date'])) . "</time></a></li>
                              </ul>
                          </div>
                          <div class='content'>
                              <p>" . substr($row['description'], 0, 150) . "...</p>
                              <div class='read-more'>
                                  <a href='index.php?view=detail-berita&id=" . $row['id'] . "'>Read More</a>
                              </div>
                          </div>
                      </article>
                      ";
                  }
                  ?>
              </div>
            </div>
            <!-- End blog posts list -->
          </div>
        </section>
        <!-- /Blog Posts Section -->
      </div>
      <div class="col-lg-4 sidebar">
        <div class="widgets-container">
          <div class="recent-posts-widget widget-item">
            <h3 class="widget-title">Top 3 Berita Dayah</h3>
            <?php
              // Query untuk mengambil 3 berita terbaru dari tabel rb_web_berita
              $query = mysql_query("SELECT A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                                    FROM rb_web_berita A
                                    LEFT JOIN rb_users B ON A.update_id = B.id_user
                                    LEFT JOIN rb_users C ON A.created_id = C.id_user
                                    WHERE A.status = 2  and A.category=1
                                    ORDER BY A.id DESC
                                    LIMIT 3");
              
              // Loop untuk menampilkan data berita
              while ($row = mysql_fetch_array($query)) {
                  echo "
                  <div class='post-item'>
                      <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='flex-shrink-0'>
                      <div>
                          <h4><a href='index.php?view=detail-berita&id=" . $row['id'] . "'>" . $row['header'] . "</a></h4>
                          <time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d F Y', strtotime($row['update_date'])) . "</time>
                      </div>
                  </div>
                  ";
              }
              ?>
          </div>
          <div class="recent-posts-widget widget-item">
            <h3 class="widget-title">Top 3 Berita MTsS</h3>
            <?php
              // Query untuk mengambil 3 berita terbaru dari tabel rb_web_berita
              $query = mysql_query("SELECT A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                                    FROM rb_web_berita A
                                    LEFT JOIN rb_users B ON A.update_id = B.id_user
                                    LEFT JOIN rb_users C ON A.created_id = C.id_user
                                    WHERE A.status = 2  and A.category=2
                                    ORDER BY A.id DESC
                                    LIMIT 3");
              
              // Loop untuk menampilkan data berita
              while ($row = mysql_fetch_array($query)) {
                  echo "
                  <div class='post-item'>
                      <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='flex-shrink-0'>
                      <div>
                          <h4><a href='index.php?view=detail-berita&id=" . $row['id'] . "'>" . $row['header'] . "</a></h4>
                          <time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d F Y', strtotime($row['update_date'])) . "</time>
                      </div>
                  </div>
                  ";
              }
              ?>
          </div>
          <div class="recent-posts-widget widget-item">
            <h3 class="widget-title">Top 3 Berita MAS</h3>
            <?php
              // Query untuk mengambil 3 berita terbaru dari tabel rb_web_berita
              $query = mysql_query("SELECT A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                                    FROM rb_web_berita A
                                    LEFT JOIN rb_users B ON A.update_id = B.id_user
                                    LEFT JOIN rb_users C ON A.created_id = C.id_user
                                    WHERE A.status = 2  and A.category=3
                                    ORDER BY A.id DESC
                                    LIMIT 3");
              
              // Loop untuk menampilkan data berita
              while ($row = mysql_fetch_array($query)) {
                  echo "
                  <div class='post-item'>
                      <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='flex-shrink-0'>
                      <div>
                          <h4><a href='index.php?view=detail-berita&id=" . $row['id'] . "'>" . $row['header'] . "</a></h4>
                          <time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d F Y', strtotime($row['update_date'])) . "</time>
                      </div>
                  </div>
                  ";
              }
              ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="portfolio" class="portfolio section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Map</h2>
    <p>Dayah Ruhul Qurani</p>
  </div>
  <div class="container">
    <div class="col-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14403.609505210847!2d96.1257106!3d4.1954716!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303ec392d4ff2e3f%3A0xc67f1a213eda9110!2sDayah%20Ruhul%20Qurani!5e1!3m2!1sen!2sid!4v1728621261286!5m2!1sen!2sid" 
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>
<section id="contact" class="contact section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Hubungi Kami</p>
  </div>
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>Meulaboh - Lapang, Kec. Johan Pahlawan,</p>
              <p>Kabupaten Aceh Barat, Aceh 23618</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+62 852 9696 2778</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>info@ruhulqurani.co.id</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Senin - Minggu</p>
              <p>07:00AM - 17:00PM</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
          data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>
            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>
            <div class="col-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>
            <div class="col-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>
            <div class="col-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
  var myCarousel = document.querySelector('#carouselExample');
var carousel = new bootstrap.Carousel(myCarousel, {
  interval: 5000, // 5000ms = 5 detik
  ride: 'carousel'
});

</script>