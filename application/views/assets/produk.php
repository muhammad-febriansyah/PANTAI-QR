<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
  <div class="card-header bg-info text-light">
    Data Produk Wahana
  </div>
  <div class="card-body">
      <table class="table dt table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Gambar / Foto</th>
                  <th>Nama Wahana</th>
                  <th>Harga</th>
                  <th>Lokasi</th>
                  <th>Views</th>
                  <th>Tanggal Post</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php
                $no = 1;
                $q = $this->db->query("select * from wahana order by id desc");
                foreach($q->result() as $row){
              ?>
              <tr>
                  <td><?php  echo $no; ?></td>
                  <td>
                      <img src="image/<?php echo $row->gambar ?>" alt="" width="130" class="img img-thumbail img-fluid">
                  </td>
                  <td><?php  echo $row->nama; ?></td>
                  <td>Rp. <?php  echo number_format($row->harga,0,'','.') ?></td>
                  <td><?php  echo $row->lokasi; ?></td>
                  <td><?php  echo $row->views; ?> Views</td>
                  <td><?php  echo $row->date; ?></td>
                  <td>
                      <a href="main/hapusproduk/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-trash"></i></a>
                      <a href="main/editproduk/<?php echo $row->id ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                  </td>
              </tr>
              <?php  $no++; } ?>
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