<footer class="main-footer">
        <div class="footer-left">
          <a >&copy; Pantai Panrita Lopi <?php echo date("Y") ?></a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>
<script>
    $('.uang').inputmask("numeric", {
        removeMaskOnSubmit: true,
        radixPoint: ".",
        groupSeparator: ",",
        digits: 2,
        autoGroup: true,
        rightAlign: false,
      });
</script>


<?php if($this->session->flashdata("msg") == "error"){ ?>
    <script>
        Swal.fire(
            "Informasi",
            "Ada kesalahan sistem",
            "error"
        );
    </script>
    <?php }elseif($this->session->flashdata("msg") == "success"){  ?>
        <script>
        Swal.fire(
            "Informasi",
            "Data Berhasil ditambahkan!",
            "success"
        );
    </script>
    <?php }elseif($this->session->flashdata("msg") == "edit"){  ?>
        <script>
        Swal.fire(
            "Informasi",
            "Data Berhasil diedit!",
            "success"
        );
    </script>
    <?php }elseif($this->session->flashdata("msg") == "hapus"){  ?>
        <script>
        Swal.fire(
            "Informasi",
            "Data Berhasil Dihapus!",
            "success"
        );
    </script>
    <?php }elseif($this->session->flashdata("msg") == "kirim"){  ?>
        <script>
        Swal.fire(
            "Informasi",
            "Berhasil mengubah status dan mengirimkan email ke pelanggan!",
            "success"
        );
    </script>
    <?php }elseif($this->session->flashdata("msg") == "tolak"){  ?>
        <script>
        Swal.fire(
            "Informasi",
            "Berhasil mengubah status dan mengirimkan email ke pelanggan!",
            "info"
        );
    </script>
    <?php } ?>