
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Pantai Panrita Lopi</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="frontend/vendor/purecounter/purecounter.js"></script>
  <script src="frontend/vendor/aos/aos.js"></script>
  <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="frontend/js/main.js"></script>

</body>

</html>


<?php if($this->session->flashdata("msg") == "success"){ ?>
  <script>
    Swal.fire(
      "Informasi",
      "Terima kasih, anda berhasil registrasi untuk melakukan login!",
      "success"
    );
  </script>
  <?php }  ?>