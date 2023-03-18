<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="home/index">Beranda</a></li>
          <li><a >Registrasi Pelanggan</a></li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">


      <div class="card">
  <div class="card-header bg-info text-light">
    Form Registrasi Pelaggan
  </div>
  <div class="card-body">
      <form action="home/saveregis" method="post">
          <table class="table">
              <tr>
                  <td>Nama</td>
                  <td>
                      <input type="text" required class="form-control" name="nama">
                  </td>
              </tr>
              <tr>
                  <td>Email</td>
                  <td>
                      <input type="email" required class="form-control" name="email">
                  </td>
              </tr>
              <tr>
                  <td>No. HP</td>
                  <td>
                      <input type="number" required class="form-control" name="telp">
                  </td>
              </tr>
              <tr>
                  <td>Username</td>
                  <td>
                      <input type="text" required class="form-control" name="username">
                  </td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td>
                      <input type="password" required class="form-control" name="password">
                  </td>
              </tr>
              <tr>
                  <td></td>
                  <td>
                      <button type="reset" class="btn btn-danger">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </td>
              </tr>
          </table>
      </form>
      <a href="home/login">Sudah Punya Akun ? Login Disini!</a>
  </div>
</div>




      </div>
    </section>

    
</main>
