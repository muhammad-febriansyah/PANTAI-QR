<?php 
    $q = $this->db->query("select * from wahana where id='$id'");
    $row = $q->row()
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
    <img src="image/<?php echo $row->gambar ?>" alt="" class="img-fluid">
  </div>

  <h2 class="entry-title">
    <a href="home/detailwahana/<?php echo $row->id ?>"><?php echo $row->nama ?></a>
  </h2>

  <div class="entry-meta">
    <ul>
      <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="home/detailwahana/<?php echo $row->id ?>"><?php echo $row->views ?> Pengunjung</a></li>
      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailwahana/<?php echo $row->id ?>"><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($row->date)) ?></time></a></li>
    </ul>
  </div>

  <div class="entry-content">
    <p>
        <table class="table table-striped">
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><?php echo $row->lokasi ?></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><?php echo number_format($row->harga,0,',','.') ?></td>
            </tr>
            <tr class="table-warning">
                <td colspan="3" >Informasi : Untuk memesan tiket anda diwajibkan untuk registrasi akun terlebih dahulu!</td>
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
