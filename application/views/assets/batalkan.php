<?php
$q = $this->db->query("select pesanan.*,wahana.nama,wahana.harga,pelanggan.nama as pelanggan from pesanan inner join wahana on wahana.id = pesanan.idwahana inner join pelanggan on pelanggan.nama = pesanan.pelanggan where pesanan.id='$nota'");
$row = $q->row();

?>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->

            <div class="card">
                <div class="card-header bg-info text-light">
                    Detail Pesanan
                </div>
                <div class="card-body">
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
                            <td><?php echo $row->total ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td><?php echo date("d-m-Y",strtotime($row->date)) ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td><?php echo $row->status ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info text-light">
                    Konfirmasi Pesanan <?php echo $row->pelanggan ?>
                </div>

                <div class="card-body">
                    <form action="main/batalgan/<?php echo $nota; ?>" method="post">
                        <table class="table">
                            <tr>
                                <td>Set Tanggal Kadaluarsa</td>
                                <td>
                                    <input type="date" class="form-control" required name="ket" placeholder="Keterangan...">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="main/pesanan" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Konfirmasi</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>