<br><br><br><br>
<main class="main">
  <!-- Page Title -->
  <div class="page-title">
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Fasilitas</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Page Title -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">
            <article class="article">
              <?php 
                $sql=mysql_query(" select * from rb_web_dayah where id=$_GET[idt]");
                while($r=mysql_fetch_array($sql)){ 
                    $Description=$r['Description'];
                    echo "$Description";}?>
            </article>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>