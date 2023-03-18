<?php 
    $q = $this->db->query("select pesan_tiket.*,wahana.*,wahana.id as idwahana from pesan_tiket inner join wahana on wahana.id = pesan_tiket.idwahana where pesan_tiket.id='$id'");
    $row = $q->row();
    // $zx = $this->db->query("select * from pesan_tiket where id='$id'");
    // $row = $zx->row();
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
                <td>Harga Pertiket</td>
                <td>:</td>
                <td><?php echo number_format($row->harga,0,',','.') ?></td>
            </tr>
            <tr>
                <td>Jumlah Tiket Yang Dibeli</td>
                <td>:</td>
                <td><?php echo $row->jml ?></td>
            </tr>
          
            <tr>
                <td>Total</td>
                <td>:</td>
                <td><?php echo number_format($row->total,0,',','.') ?></td>
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

        <form action="pelanggan/simpanbayar" method="post" enctype="multipart/form-data">
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
                    <td>Atas Nama</td>
                    <td>
                        <input type="text" placeholder="Atas Nama Bank..." name="atasnama" id="" class="form-control">
                        <input type="hidden" value="<?php echo $row->idwahana; ?>" placeholder="Atas Nama Bank..." name="idwahana" id="" class="form-control">
                        <input type="hidden" value="<?php echo $id; ?>" placeholder="Atas Nama Bank..." name="idpesan" id="" class="form-control">
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
                            <a href="pelanggan" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
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

  <script>
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	
     </script>