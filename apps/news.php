<br><br><br><br><br>
<!-- Page Title -->
<div class="page-title">
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">Berita</li>
      </ol>
    </div>
  </nav>
</div>
<!-- End Page Title -->
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <!-- Blog Posts Section -->
      <section id="blog-posts" class="blog-posts section">
        <div class="container">
          <div class="row gy-4">
            <?php
              // Tentukan berapa banyak data yang ingin ditampilkan per halaman
              $limit = 4;
              
              // Ambil nomor halaman saat ini, defaultnya adalah 1 jika tidak ada
              $page = isset($_GET['page']) ? $_GET['page'] : 1;
              
              // Hitung offset (data yang dilewati)
              $offset = ($page - 1) * $limit;
              
              // Query untuk mengambil data dari tabel rb_web_berita dengan LIMIT dan OFFSET
              $query = mysql_query("SELECT 
              case A.category when 1 then 'DAYAH' when 2 then 'MTsS' when 3 then 'MAS' end as category,
              A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
              FROM rb_web_berita A
              LEFT JOIN rb_users B ON A.update_id = B.id_user
              LEFT JOIN rb_users C ON A.created_id = C.id_user
              WHERE A.status = 2 AND A.category = '$_GET[cat]'
              ORDER BY A.id
              LIMIT $limit OFFSET $offset");
              
              // Loop untuk menampilkan berita
              while ($row = mysql_fetch_array($query)) {
                  echo "
                  <div class='col-12'>
                      <article>
                          <div class='post-img text-center'>
                              <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='img-fluid'>
                          </div>
                          <h2 class='title'>
                          <a href='index.php?view=detail-berita&id=" . $row['id'] . "'>" . $row['header'] . "</a>
                          </h2>
                          <div class='meta-top'>
                              <ul>
                                  <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Oleh: " . $row['created_id'] . "</a></li>
                                  <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Editor: " . $row['update_id'] . "</a></li>
                                  <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='#'><time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d M Y - H:i', strtotime($row['update_date'])) . "</time></a></li>
                              </ul>
                          </div>
                          <div class='content'>
                              <p>" . substr($row['description'], 0, 350) . "...</p>
                              <div class='read-more'>
                                  <a href='index.php?view=detail-berita&id=" . $row['id'] . "'>Read More</a>
                              </div>
                          </div>
                      </article>
                  </div>";
              }
              ?>
          </div>
          <br>
          <!-- Pagination Section -->
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
                // Query untuk menghitung total berita
                $total_query = mysql_query("SELECT COUNT(*) as total FROM rb_web_berita WHERE status = 2 AND category = '$_GET[cat]'");
                $total_row = mysql_fetch_array($total_query);
                $total_data = $total_row['total'];
                
                // Hitung total halaman
                $total_pages = ceil($total_data / $limit);
                
                // Link untuk tombol Previous
                if ($page > 1): ?>
              <li class="page-item">
                <a class="page-link" href="index.php?view=berita&cat=<?php echo $_GET['cat']; ?>&page=<?php echo $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php endif;
                // Looping untuk halaman
                for ($i = 1; $i <= $total_pages; $i++): ?>
              <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                <a class="page-link" href="index.php?view=berita&cat=<?php echo $_GET['cat']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
              <?php endfor;
                // Link untuk tombol Next
                if ($page < $total_pages): ?>
              <li class="page-item">
                <a class="page-link" href="index.php?view=berita&cat=<?php echo $_GET['cat']; ?>&page=<?php echo $page + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </section>
    </div>
    <div class="col-lg-4 sidebar">
      <div class="widgets-container">
        <!-- Recent Posts Widget -->
        <div class="recent-posts-widget widget-item">
          <h3 class="widget-title">Top 5 News</h3>
          <?php
            // Query untuk mengambil 3 berita terbaru dari tabel rb_web_berita
            $query = mysql_query("SELECT A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                                  FROM rb_web_berita A
                                  LEFT JOIN rb_users B ON A.update_id = B.id_user
                                  LEFT JOIN rb_users C ON A.created_id = C.id_user
                                  WHERE A.status = 2  and A.category= '$_GET[cat]'
                                  ORDER BY A.id DESC
                                  LIMIT 5");
            
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
        <!--/Recent Posts Widget -->
      </div>
    </div>
  </div>
</div>