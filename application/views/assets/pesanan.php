<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->
      <div class="card">
        <div class="card-header bg-info text-light">
          Data Pesanan
        </div>
        <div class="card-body table-responsive">
          <table class="table dt table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Wahana</th>
                <th>Harga Tiket</th>
                <th>Nama Pelanggan</th>
                <th>Nota</th>
                <th>Status</th>
                <th>Jumlah Yang Dipesan</th>
                <th>Total</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $q = $this->db->query("select pesanan.*,wahana.nama,wahana.harga,pelanggan.nama as pelanggan from pesanan left join wahana on wahana.id = pesanan.idwahana left join pelanggan on pelanggan.nama = pesanan.pelanggan order by pesanan.id desc");
              foreach ($q->result() as $row) {
              ?>
                <tr>
                  <td><?php echo $no; ?></td>

                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo number_format($row->harga, 0, ',', '.') ?></td>
                  <td><?php echo $row->pelanggan; ?></td>
                  <td><?php echo $row->nota; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td><?php echo $row->jml; ?></td>
                  <td><?php echo number_format($row->total, 0, ',', '.') ?></td>
                  <td><?php echo date("d-m-Y",strtotime($row->date)); ?></td>
                  <td><?php echo $row->tglkadaluarsa; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td>
                    <!-- <a href="main/hapuspesanan/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-trash"></i> Hapus</a> -->
                    <?php if ($row->status == "Terkonfirmasi") { ?>
                      <a href="main/batalkan/<?php echo $row->id ?>" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Batalkan</a>
                    <?php } elseif ($row->status == "Proses") { ?>
                      <a href="main/konfirmasi/<?php echo $row->id ?>" class="btn btn-info"><i class="fa fa-check"></i> Konfirmasi</a>
                      <a href="main/batalkan/<?php echo $row->id ?>" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Batalkan</a>
                    <?php } else { ?>
                      <a href="main/konfirmasi/<?php echo $row->id ?>" class="btn btn-info"><i class="fa fa-check"></i> Konfirmasi</a>
                    <?php }  ?>
                  </td>
                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</div>
<script>
  $(".dt").DataTable();
</script>