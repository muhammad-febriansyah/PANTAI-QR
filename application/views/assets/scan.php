<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Pantai Panrita Lopi</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/icon.png' />
    <script src="assets/js/app.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="jquery.inputmask.bundle.js"></script>
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="zxing/zxing.min.js"></script>

    <style>
        .bg {
            background-color: #abe9cd;
            background-image: linear-gradient(315deg, #abe9cd 0%, #3eadcf 74%);

        }
    </style>
</head>

<body class="hold-transition layout-top-nav">

    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg ">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1> -->
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content" id="demo-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-warning mb-2" role="alert">
                                    <strong><i class="fa fa-exclamation-triangle"></i> Informasi</strong> Untuk melakukan cek QR Code, silahkan scan QRCODE anda disini!
                                </div>
                                <?php
                                $attributes = array('id' => 'button');
                                echo form_open('scan/cek_id', $attributes); ?>
                                <center>

                                    <select id="pilihKamera" class="form-control mb-2" style="max-width:400px">
                                    </select>
                                    <video id="previewKamera" class="img img-thumbnail" style="width: 800;height: 500px;"></video>

                                </center>
                                <input type="hidden" name="id" style="display: none;" id="hasilscan">
                                <div id="hilang">
                                    <input type="submit" id="button" class="btn btn-success btn-md" value="Cek"></span>
                                </div>
                                <?= form_close(); ?>
                                <script>
                                    $("#hilang").hide()
                                    let selectedDeviceId = null;
                                    const codeReader = new ZXing.BrowserMultiFormatReader();
                                    const sourceSelect = $("#pilihKamera");
                                    let audio = new Audio("assets/audio/beep.mp3");

                                    $(document).on('change', '#pilihKamera', function() {
                                        selectedDeviceId = $(this).val();
                                        if (codeReader) {
                                            codeReader.reset()
                                            initScanner()
                                        }
                                    })

                                    function initScanner() {
                                        codeReader
                                            .listVideoInputDevices()
                                            .then(videoInputDevices => {
                                                videoInputDevices.forEach(device =>
                                                    console.log(`${device.label}, ${device.deviceId}`)
                                                );

                                                if (videoInputDevices.length > 0) {

                                                    if (selectedDeviceId == null) {
                                                        if (videoInputDevices.length > 1) {
                                                            selectedDeviceId = videoInputDevices[1].deviceId
                                                        } else {
                                                            selectedDeviceId = videoInputDevices[0].deviceId
                                                        }
                                                    }


                                                    if (videoInputDevices.length >= 1) {
                                                        sourceSelect.html('');
                                                        videoInputDevices.forEach((element) => {
                                                            const sourceOption = document.createElement('option')
                                                            sourceOption.text = element.label
                                                            sourceOption.value = element.deviceId
                                                            if (element.deviceId == selectedDeviceId) {
                                                                sourceOption.selected = 'selected';
                                                            }
                                                            sourceSelect.append(sourceOption)
                                                        })

                                                    }

                                                    codeReader
                                                        .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                                                        .then(result => {
                                                            audio.play();
                                                            //hasil scan
                                                            console.log(result.text)
                                                            $("#hasilscan").val(result.text);
                                                            $("#button").submit();

                                                        })
                                                        .catch((err) => {
                                                            console.error(err)
                                                            document.getElementById('result').textContent = err
                                                        })

                                                } else {
                                                    alert("Camera not found!")
                                                }
                                            })
                                            .catch(err => console.error(err));
                                    }


                                    if (navigator.mediaDevices) {


                                        initScanner()


                                    } else {
                                        alert('Cannot access camera.');
                                    }
                                </script>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <!-- AdminLTE for demo purposes -->
</body>

</html>
<?php
if ($this->session->flashdata('msg') == 'bener') {
?>
    <script>
        Swal.fire(
            "Informasi",
            'Berhasil Scan QR Code',
            "success"
        );
    </script>
<?php } ?>

<?php
if ($this->session->flashdata('msg') == 'salah') {
?>
    <script>
        Swal.fire(
            "Informasi",
            'Maaf, gagal menemukan data di QRCODE tersebut!',
            "warning"
        );
    </script>
<?php } ?>