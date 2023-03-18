<script src="assets/bundles/chartjs/chart.min.js"></script>
<?php 
  $pelanggan = $this->db->query("select * from pelanggan")->num_rows();
  $proses = $this->db->query("select * from pesanan where status='Proses'")->num_rows();
  $ditolak = $this->db->query("select * from pesanan where status='Ditolak'")->num_rows();
  $konfirmasi = $this->db->query("select * from pesanan where status='Terkonfirmasi'")->num_rows();

  $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
  for($bulan = 1;$bulan < 13;$bulan++)
  {
    $query = $this->db->query("select count(*) as jml from pesanan where MONTH(date)='$bulan'")->result();
    foreach($query as $query){
      $jml[] = $query->jml;
    }
    // $row = $query->fetch_array();
    // $jumlah_produk[] = $row['jumlah'];
  }
  
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="alert alert-info" role="alert">
              <strong>Selamat Datang</strong> <?php echo $this->session->userdata("nama") ?> Disistem Pemesanan Tiket Pantai Panrita Lopi
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $pelanggan; ?>
                        </h3>
                        <span class="text-muted">Pelanggan</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-sync-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $proses ?>
                        </h3>
                        <span class="text-muted">Status Proses</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-check-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $konfirmasi; ?>
                        </h3>
                        <span class="text-muted">Status Konfirmasi</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-orange">
                    <i class="fas fa-window-close"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> <?php echo $ditolak ?>
                        </h3>
                        <span class="text-muted">Status Ditolak</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
  <div class="card-body">
  <canvas style="width: 600px; height: 400px;" id="ngadu"></canvas>
  </div>
</div>

          </div>
        </section>
      
      </div>
     
      <script>
        var ctx = document.getElementById("ngadu").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Grafik Pemeriksaan Perbulan',
					data: <?php echo json_encode($jml); ?>,
          borderWidth: 2,
          backgroundColor: '#6777ef',
          borderColor: '#6777ef',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
      </script>