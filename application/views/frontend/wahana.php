<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="home/">Beranda</a></li>
        <li>Wahana Pantai Panrita Lopi</li>
      </ol>
      <h2>Wahana Pantai Panrita Lopi</h2>

    </div>
  </section><!-- End Breadcrumbs -->


  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Wahana Pantai Panrita Lopi</p>
      </header>

      <div class="row">
        <?php
        $q = $this->db->query("select * from wahana ");
        foreach ($q->result() as $row) {
        ?>
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="image/<?php echo $row->gambar ?>" class="img-fluid" alt=""></div>
              <span class="post-date"><?php echo date("d F Y", strtotime($row->date)) ?></span>
              <h3 class="post-title"><?php echo $row->nama ?></h3>
              <a href="home/detailwahana/<?php echo $row->id ?>" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        <?php }  ?>

      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->


</main>