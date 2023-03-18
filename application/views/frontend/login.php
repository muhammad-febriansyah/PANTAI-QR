<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="home/index">Beranda</a></li>
          <li><a >Login Pelanggan</a></li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">


      <div class="card">
  <div class="card-header bg-info text-light">
    Form Login Pelaggan
  </div>
  <div class="card-body">
      <form action="home/loginpelanggan" method="post">
          <table class="table">
             
              <tr>
                  <td>Username</td>
                  <td>
                      <input type="text" class="form-control" required name="username">
                  </td>
              </tr>
              <tr>
                  <td>Password</td>
                  <td>
                      <input type="password" class="form-control" required name="password">
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
      <a href="home/register">Belum Punya Akun ? Registrasi Disini!</a>
  </div>
</div>




      </div>
    </section>

    
</main>


<?php if($this->session->flashdata("msg") == "errorlogin"){ ?>
    <script>
        Swal.fire(
            "Informasi",
            "Username atau password anda salah!",
            "warning"
        );
    </script>
    <?php }  ?>