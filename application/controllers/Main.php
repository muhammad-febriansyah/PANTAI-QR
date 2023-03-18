<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        if (!$this->session->userdata("id")) {
            redirect('welcome', 'refresh');
        }
        // date_default_timezone_set('Asia/Ujung_Pandang');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/index');
        $this->load->view('assets/bawah');
    }
    public function produk()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/produk');
        $this->load->view('assets/bawah');
    }
    public function addproduk()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/addproduk');
        $this->load->view('assets/bawah');
    }

    public function saveproduk()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nama = $_POST['nama'];
            $harga = str_replace(",", "", $_POST['harga']);
            $lokasi = $_POST['lokasi'];
            $gambar = $gbr['file_name'];
            $this->db->query("insert into wahana values('','$nama','$gambar','$harga','$lokasi','0',now())");
            $this->session->set_flashdata('msg', 'success');
            redirect('main/produk');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('main/produk');
        }
    }

    public function hapusproduk($id = '')
    {
        $q = $this->db->query("select * from wahana where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from wahana where id='$id'");
        $this->session->set_flashdata('msg', 'hapus');
        redirect('main/produk', 'refresh');
    }

    public function editproduk($id = '')
    {
        $data['id'] = $id;
        $this->load->view('assets/atas');
        $this->load->view('assets/editproduk', $data);
        $this->load->view('assets/bawah');
    }


    public function updateproduk($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['new_image']        = './getfile/thumb/' . $gbr['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '50%';
                $config['width']            = 256;
                $config['height']           = 256;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $nama = $_POST['nama'];
                $harga = str_replace(",", "", $_POST['harga']);
                $lokasi = $_POST['lokasi'];
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from wahana where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $this->db->query("UPDATE wahana SET nama='$nama',gambar='$gambar',harga='$harga',lokasi='$lokasi'  WHERE id='$id'");
                $this->session->set_flashdata('msg', 'edit');
                redirect('main/produk');
            }
        } else {
            $nama = $_POST['nama'];
            $harga = str_replace(",", "", $_POST['harga']);
            $lokasi = $_POST['lokasi'];
            $this->db->query("UPDATE wahana SET nama='$nama',harga='$harga',lokasi='$lokasi'  WHERE id='$id'");
            $this->session->set_flashdata('msg', 'edit');
            redirect('main/produk');
        }
    }


    public function pelanggan()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/pelanggan');
        $this->load->view('assets/bawah');
    }

    public function pesanan()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/pesanan');
        $this->load->view('assets/bawah');
    }
    public function konfirmasi($nota = '')
    {
        $data['nota'] = $nota;
        $this->load->view('assets/atas');
        $this->load->view('assets/detailpesanan', $data);
        $this->load->view('assets/bawah');
    }
    public function batalkan($nota = '')
    {
        $data['nota'] = $nota;
        $this->load->view('assets/atas');
        $this->load->view('assets/batalkan', $data);
        $this->load->view('assets/bawah');
    }

    // public function konfirmasi($id='')
    // {
    //     $this->load->library('PHPMailer_load'); //Load Library PHPMailer

    // }

    public function konfirmasipesanan($nota = '')
    {
        $ket = $_POST['ket'];
        $now = date("Y-m-d H:i:s");

        $we = $this->db->query("select pesanan.*,wahana.id,wahana.nama,wahana.harga,pelanggan.email,pelanggan.nama as pelanggan from pesanan inner join pelanggan on pelanggan.nama = pesanan.pelanggan inner join wahana on wahana.id = pesanan.idwahana where  pesanan.id='$nota'");
        $rowsd = $we->row();
        $this->db->query("update pesan_tiket set status='2' where id='$rowsd->idpesan'");
        $this->db->query("update pesanan set status='Terkonfirmasi',tglkadaluarsa='$ket',tglkonfirm='$now' where id='$nota'");
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'beachpanritalopi@gmail.com';
        $mail->Password = '@Wisataku123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('beachpanritalopi@gmail.com', "Pesanan Anda Berhasil Dikonfirmasi Oleh Admin!"); // Sumber email
        $getpelanggan = $this->db->query("select pesanan.*,wahana.id,wahana.nama,wahana.harga,pelanggan.email,pelanggan.nama as pelanggan from pesanan inner join pelanggan on pelanggan.nama = pesanan.pelanggan inner join wahana on wahana.id = pesanan.idwahana where  pesanan.id='$nota'");
        $row = $getpelanggan->row();
        $mail->addAddress($row->email);
        $mail->Subject = "Pesan masuk"; // Subjek Email
        $mail->msgHtml("
        <table border=1>
    <thead>
        <tr>
            <th>Wahana</th>
            <th>Jumlah Tiket Yang Dipesan</th>
            <th>Jumlah  Yang Dibayar</th>
            <th>Tanggal Konfirmasi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$row->nama</td>
            <td>$row->jml</td>
            <td>$row->total</td>
            <td>$now</td>
            <td>Terkonfirmasi</td>

        </tr>
        
    </tbody>
</table>
            "); // Isi email dengan format HTML
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message sent!";
        } // Kirim email dengan cek kondisi
        $this->session->set_flashdata('msg', 'kirim');
        redirect('main/pesanan', 'refresh');
    }

    public function batalgan($nota = '')
    {
        $ket = $_POST['ket'];
        $now = date("Y-m-d H:i:s");
        $we = $this->db->query("select pesanan.*,wahana.id,wahana.nama,wahana.harga,pelanggan.email,pelanggan.nama as pelanggan from pesanan inner join pelanggan on pelanggan.nama = pesanan.pelanggan inner join wahana on wahana.id = pesanan.idwahana where  pesanan.id='$nota'");
        $row = $we->row();
        $this->db->query("update pesan_tiket set status='3' where id='$row->idpesan'");
        $this->db->query("update pesanan set status='Ditolak',tglkadaluarsa='$ket',tglkonfirm='$now' where id='$nota'");
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'beachpanritalopi@gmail.com';
        $mail->Password = '@Wisataku123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('beachpanritalopi@gmail.com', "Pesanan Anda Ditolak Oleh Admin!"); // Sumber email
        // $getpelanggan = $this->db->query("select pesanan.*,wahana.id,wahana.nama,wahana.harga,pelanggan.email,pelanggan.nama as pelanggan from pesanan inner join pelanggan on pelanggan.nama = pesanan.pelanggan inner join wahana on wahana.id = pesanan.idwahana where  pesanan.id='$nota'");
        // $row = $getpelanggan->row();
        $mail->addAddress($row->email);
        $mail->Subject = "Pesan masuk"; // Subjek Email
        $mail->msgHtml("
        <table border=1>
    <thead>
        <tr>
            <th>Wahana</th>
            <th>Jumlah Tiket Yang Dipesan</th>
            <th>Jumlah  Yang Dibayar</th>
            <th>Tanggal Konfirmasi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$row->nama</td>
            <td>$row->jml</td>
            <td>$row->total</td>
            <td>$now</td>
            <td>Ditolak</td>
        </tr>
        
    </tbody>
</table>
            "); // Isi email dengan format HTML
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            //echo "Message sent!";
        } // Kirim email dengan cek kondisi

        $this->session->set_flashdata('msg', 'tolak');
        redirect('main/pesanan', 'refresh');
    }

    public function hapuspelanggan($id = '')
    {
        $this->db->query("delete from pelanggan where id='$id'");
        $this->session->set_flashdata('msg', 'hapus');
        redirect('main/pelanggan', 'refresh');
    }


    public function setnorek()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/setnorek');
        $this->load->view('assets/bawah');
    }
    public function scan()
    {
        $this->load->view('assets/scan');
    }

    public function setrek()
    {
        $nama = $_POST['nama'];
        $norek = $_POST['norek'];
        $bank = $_POST['bank'];

        $this->db->query("update norek set nama='$nama',norek='$norek',bank='$bank'");
        $this->session->set_flashdata('msg', 'edit');
        redirect('main/setnorek', 'refresh');
    }
}

/* End of file Main.php */
