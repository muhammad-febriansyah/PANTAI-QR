<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="pelanggan/">Beranda</a></li>
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
    foreach($q->result() as $row){
?>
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="image/<?php echo $row->gambar ?>" class="img-fluid" alt=""></div>
              <table class="table table-hover table-bordered">
                <tr>
                  <td>Nama Wahana</td>
                  <td><?php echo $row->nama ?></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td><?php echo number_format($row->harga,0,',','.') ?></td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td><?php echo $row->lokasi ?></td>
                </tr>
              <form action="pelanggan/pesantiketpelanggan" method="post">
                <tr>
                  <td>Tanggal</td>
                  <td>
                    <input type="date" required name="tgl" id="" class="form-control">
                  </td>
                </tr>
              </table>
                <table class="table">
                  <tr>
                  <td>Pesan Tiket</td>
                <td>
                <div class="btn-group">
                  <input type="number" required autocomplete="off" name="tiket" class="form-control" placeholder="Jumlah Tiket Yanng Dipesan">
                  <input type="hidden" autocomplete="off" name="idwahana" value="<?php echo $row->id ?>" class="form-control" placeholder="Jumlah Tiket Yanng Dipesan">
                  <input type="hidden" autocomplete="off" name="harga" value="<?php echo $row->harga ?>" class="form-control" placeholder="Jumlah Tiket Yanng Dipesan">
                  <input type="hidden" autocomplete="off" name="idpelanggan" class="form-control" value="<?php echo $this->session->userdata("id") ?>" placeholder="Jumlah Tiket Yanng Dipesan">
                  <button type="submit" class="btn btn-primary">Pesan</button>
                  </div>
                </td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
<?php }  ?>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->
 

</main>


<?php if($this->session->flashdata("msg") == "pesan"){ ?>
  <script>
    Swal.fire(
      "Informasi",
      "Berhasil Memesan Tiket!",
      "success"
    );
  </script>
  <?php }  ?>