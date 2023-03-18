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
        <p>Pesanan Saya</p>
      </header>
      <div class="card">
        <div class="card-header bg-primary text-light">
          Pesanan Saya
        </div>
        <div class="card-body">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Wahana</th>
                <th>Jumlah Tiket</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal Pemesanan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $id = $this->session->userdata("id");
              $today = date("Y-m-d");
              $q = $this->db->query("select pesan_tiket.*,wahana.nama,pelanggan.nama as pelanggan from pesan_tiket left join wahana on wahana.id = pesan_tiket.idwahana left join pelanggan on pelanggan.id = pesan_tiket.idpelanggan where pesan_tiket.idpelanggan='$id' and pesan_tiket.date>='$today'");
              foreach ($q->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row->nama ?></td>
                  <td><?php echo $row->jml ?></td>
                  <td>Rp. <?php echo number_format($row->total, 0, ',', '.') ?></td>
                  <td>
                    <?php if ($row->status == 0) { ?>
                      <span class="badge bg-warning text-dark">Belum Dibayar</span>
                    <?php } elseif ($row->status == 1) { ?>
                      <span class="badge bg-success text-light">Proses</span>
                    <?php } elseif ($row->status == 2) {  ?>
                      <span class="badge bg-info text-light">Terkonfirmasi</span>
                    <?php } else {  ?>
                      <span class="badge bg-danger text-light">Ditolak</span>
                    <?php }  ?>
                  </td>
                  <td><?php echo date("d-m-Y",strtotime($row->date)) ?></td>
                  <td>
                    <?php if ($row->status == 0) { ?>
                      <a href="pelanggan/bayar/<?php echo $row->id ?>" class="btn btn-info">Bayar</a>

                    <?php } elseif ($row->status == 1) { ?>
                      <span class="text-info">Sedang menunggu konfirmasi dari admin!</span>
                    <?php } elseif ($row->status == 2) {  ?>
                      <a href="pelanggan/detail/<?php echo $row->id ?>" class="btn btn-info">Detail</a>

                    <?php } else {  ?>
                      <a href="pelanggan/detail/<?php echo $row->id ?>" class="btn btn-info">Detail</a>
                    <?php }  ?>

                  </td>

                </tr>
              <?php $no++;
              }  ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->


</main>


<?php if ($this->session->flashdata("msg") == "pesan") { ?>
  <script>
    Swal.fire(
      "Informasi",
      "Berhasil Memesan Tiket!",
      "success"
    );
  </script>
<?php }  ?>