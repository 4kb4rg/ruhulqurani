<br><br><br><br><br>
<main class="main">
  <div class="page-title">
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="#">Home</a></li>
          <li class="current">Berita Details</li>
        </ol>
      </div>
    </nav>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <section id="blog-details" class="blog-details section">
          <div class="container">
            <?php
              $id = intval($_GET['id']);
              $query = mysql_query("SELECT 
                                    case A.category when 1 then 'DAYAH' when 2 then 'MTsS' when 3 then 'MAS' end as category,
                                    A.id, A.header, A.cover, A.description, C.nama_lengkap AS created_id, B.nama_lengkap AS update_id, A.update_date, A.created_date
                                    FROM rb_web_berita A
                                    LEFT JOIN rb_users B ON A.update_id = B.id_user
                                    LEFT JOIN rb_users C ON A.created_id = C.id_user
                                    WHERE A.status = 2 AND A.id = $id
                                    ORDER BY A.id DESC");

              if ($row = mysql_fetch_array($query)) {
                echo "
                <article class='article'>
                  <div class='post-img text-center'>
                    <img src='https://admindata.ruhulqurani.sch.id/" . $row['cover'] . "' alt='' class='img-fluid'>
                  </div>
              
                  <h2 class='title'>" . $row['header'] . "</h2>
              
                  <div class='meta-top'>
                    <ul>
                      <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Oleh : " . $row['created_id'] . "</a></li>
                      <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'>Editor : " . $row['update_id'] . "</a></li>
                      <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='#'><time datetime='" . date('Y-m-d', strtotime($row['update_date'])) . "'>" . date('d M Y - H:i', strtotime($row['update_date'])) . "</time></a></li>
                    </ul>
                  </div>
              
                  <div class='content'>
                    <p>" . nl2br($row['description']) . "</p>
                  </div>
              
                  <div class='meta-bottom'>
                    <i class='bi bi-folder'></i>
                    <ul class='cats'>
                      <li><a href='#'>CAT : " . $row['category'] . "</a></li>
                    </ul>
                  </div>
                </article>
                ";
              } else {
                echo "<p>Berita tidak ditemukan.</p>";
              }
            ?>
          </div>
        </section>
      </div>
      
      <div class="col-lg-3 sidebar">
        <div class="widgets-container">
          <div class="recent-posts-widget widget-item">
            <h3 class="widget-title">Recent Posts</h3>
            <?php
              $recentQuery = mysql_query("SELECT id, header, cover, update_date FROM rb_web_berita WHERE status = 2 ORDER BY id DESC LIMIT 5");
              
              while ($recentRow = mysql_fetch_array($recentQuery)) {
                echo "
                <div class='post-item'>
                  <img src='https://admindata.ruhulqurani.sch.id/" . $recentRow['cover'] . "' alt='' class='flex-shrink-0'>
                  <div>
                    <h4><a href='index.php?view=detail-berita&id=" . $recentRow['id'] . "'>" . $recentRow['header'] . "</a></h4>
                    <time datetime='" . date('Y-m-d', strtotime($recentRow['update_date'])) . "'>" . date('d M Y', strtotime($recentRow['update_date'])) . "</time>
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
</main>
