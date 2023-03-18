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
    <a ><?php echo $row->nama ?></a>
  </h2>

  <div class="entry-meta">
    <ul>
      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a ><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($row->date)) ?></time></a></li>
    </ul>
  </div>

  <div class="entry-content">
    <p>
        <table class="table table-striped">
            <tr>
                <td>Nama Wahana</td>
                <td>:</td>
                <td><?php echo $row->nama ?></td>
            </tr>
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
           
        </table>
<?php
    $zh = $this->db->query("select * from norek")->row();
?>
        <table class="table">
            <tr class="alert-success">
                <td colspan="3">Silahka transfer ke nomor rekening ini!</td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>:</td>
                <td><?php echo $zh->bank ?></td>
            </tr>
            <tr>
                <td>Atas Nama</td>
                <td>:</td>
                <td><?php echo $zh->nama ?></td>
            </tr>
            <tr>
                <td>Nomor Rekening</td>
                <td>:</td>
                <td><?php echo $zh->norek ?></td>
            </tr>
        </table>

        <form action="" method="post">
            <table class="table">
                <tr>
                    <td>NOTA</td>
                    <td>
                        <input type="text" readonly name="nota" id=""  value="<?php echo "NOTA - ".date("dmYHis") ?>"class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" readonly name="nama" id=""  value="<?php echo $this->session->userdata("nama") ?>"class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Tiket Yang Dipesan</td>
                    <td>
                        <input type="number" name="peserta" id="" class="form-control">
                    </td>
                </tr>
                <tr>
                            <td>Bukti Transfer</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

                            </td>
                        </tr>
                        <tr>
                          <td></td>
                          <td>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <a href="pelanggan" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Kembali</a>
                          </td>
                        </tr>
            </table>
        </form>
    </p>
  </div>



</article><!-- End blog entry -->

</div><!-- End blog entries list -->


</center>
        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
