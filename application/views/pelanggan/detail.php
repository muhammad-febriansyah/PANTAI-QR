<?php 
$q = $this->db->query("select pesanan.*,wahana.nama,wahana.harga,pelanggan.nama as pelanggan from pesanan inner join wahana on wahana.id = pesanan.idwahana inner join pelanggan on pelanggan.nama = pesanan.pelanggan where pesanan.idpesan='$id'");
$row = $q->row();
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="home/">Beranda</a></li>
          <li><a href="home/wahana">Wahana Wisata</a></li>
        </ol>
        <h2>Detail <?php echo $row->nama ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
<center>
    
<div class="col-lg-8 entries">

<article class="entry entry-single">

  <div class="entry-img">
    <img src="qr/images/<?php echo $row->qr ?>" alt="" class="img-fluid">
  </div>

  <h2 class="entry-title">
    <a ><?php echo $row->nama ?></a>
  </h2>

  <div class="entry-meta">
    <ul>
      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($row->date)) ?></time></a></li>
    </ul>
  </div>

  <div class="entry-content">
    <p>
    <table class="table table-striped table-bordered">
      <tr class="table-success">
              <td>Nama Pelanggan</td>
              <td><?php echo $row->pelanggan ?></td>
          </tr>
          <tr>
              <td>Bukti Transfer</td>
              <td>
                  <img src="image/<?php echo $row->gambar ?>" class="img img-thumbnail img-fluid" width="190" alt="">
              </td>
          </tr>
          <tr>
              <td>Wahana</td>
              <td><?php echo $row->nama ?></td>
          </tr>
          <tr>
              <td>Harga Pertiket</td>
              <td><?php echo $row->harga ?></td>
          </tr>
          <tr>
              <td>Jumlah Yang Dipesan</td>
              <td><?php echo $row->jml ?></td>
          </tr>
          <tr>
              <td>Jumlah Yang Dibayarkan</td>
              <td><?php echo number_format($row->total,0,',','.') ?></td>
          </tr>
          <tr>
              <td>Tanggal Pemesanan</td>
              <td><?php echo $row->date ?></td>
          </tr>
          <tr>
              <td>Tanggal Respon Dari Admin</td>
              <td><?php echo $row->tglkonfirm ?></td>
          </tr>
          <tr>
              <td>Tanggal Kadaluarsa</td>
              <td><?php echo $row->tglkadaluarsa ?></td>
          </tr>
          <tr>
              <td>Status</td>
              <td>
                  <?php if($row->status == "Ditolak"){ ?>
                    <span class="text text-danger">
                    <?php echo $row->status ?>

                    </span>
                    <?php }else{ ?>
                        <span class="text text-primary">
                    <?php echo $row->status ?>

                    </span>
                        <?php } ?>
              </td>
          </tr>
      </table>
    </p>
  </div>



</article><!-- End blog entry -->

</div><!-- End blog entries list -->


</center>
        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
