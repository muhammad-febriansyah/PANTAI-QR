
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat Datang Di Pantai Panrita Lopi</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Website tentang informasi dan pemesanan tiket di Pantai Panrita Lopi</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="home/register" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Daftar Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/hero.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Pantai Panrita Lopi</h3>
              <h2>Pantai Panrita Lopi memiliki fasilitas yang lengkap.</h2>
              <p>
              seperti, gazebo, kamar mandi, toilet, dan mushala. Alat outdoor tenda dome, hammock, tikar, dan lainnya dapat diperoleh dengan cara menyewa .

Baca artikel detikTravel, "Inilah Pantai Panrita Lopi, Terbaik di Kutai Kartanegara" 
              </p>
              <!-- <div class="text-center text-lg-start">
                <a href="home/about" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/pantai.jpeg" class="img-fluid img-thumbnail img" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->


    
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <p>Wahana Wisata Terbaru</p>
        </header>

        <div class="row">
<?php
    $q = $this->db->query("select * from wahana order by id desc limit 3");
    foreach($q->result() as $row){
?>
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="image/<?php echo $row->gambar ?>" class="img-fluid" alt=""></div>
              <span class="post-date"><?php echo date("d F Y",strtotime($row->date)) ?></span>
              <h3 class="post-title"><?php echo $row->nama ?></h3>
              <a href="home/detailwahana/<?php echo $row->id ?>" class="readmore stretched-link mt-auto"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
<?php }  ?>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->
    <section id="about" class="about">
    <header class="section-header">
          <p>Lokasi Pantai Panrita Lopi</p>
        </header>

<div class="container" data-aos="fade-up">
<div id="map" style="width: 1100px; height: 400px;"></div>

</div>

</section><!-- End About Section -->


  </main><!-- End #main -->

  <script>
      
	var map = L.map('map').setView([-0.2095420812512594, 117.43689430734636], 13);

var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(map);

var marker = L.marker([-0.2095420812512594, 117.43689430734636]).addTo(map)
    .bindPopup('<b>Lokasi</b><br />Lokasi Pantai Panrita Lopi.').openPopup();



  </script>