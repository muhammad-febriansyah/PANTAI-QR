<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header bg-info text-light">
                    Form Tambah Produk Wahana
                </div>
                <div class="card-body table-responsive">
                <form action="main/saveproduk" id="save" method="post" enctype="multipart/form-data">
      
                    <table class="table">
                        <tr>
                            <td>Nama Wahana</td>
                            <td>
                                <input type="text" class="form-control" name="nama">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>
                                <input type="text" class="form-control uang" name="harga">
                            </td>
                        </tr>
                        <tr>
                            <td>Lokasi Wahana</td>
                            <td>
                                <input type="text" class="form-control" name="lokasi">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto / Gambar</td>
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
                            <a href="main/produk" class="btn btn-warning"><i class="fa fa-sync-alt"></i> Kembali</a>
                          </td>
                        </tr>
                    </table>
</form>
                </div>
                </div>
          </div>
        </section>
      
      </div>
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