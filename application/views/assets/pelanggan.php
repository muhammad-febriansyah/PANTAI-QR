<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
  <div class="card-header bg-info text-light">
    Data Pelanggan
  </div>
  <div class="card-body">
      <table class="table dt table-striped">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No.HP</th>
                  <th>Tanggal Daftar</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php
                $no = 1;
                $q = $this->db->query("select * from pelanggan order by id desc");
                foreach($q->result() as $row){
              ?>
              <tr>
                  <td><?php  echo $no; ?></td>
                  <td><?php  echo $row->nama; ?></td>
                  <td><?php  echo $row->email; ?></td>
                  <td><?php  echo $row->telp; ?></td>
                  <td><?php  echo $row->date; ?></td>
                  <td>
                      <a href="main/hapuspelanggan/<?php echo $row->id ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-trash"></i></a>
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