<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("id")) {
            redirect('home/login', 'refresh');
        }
        // date_default_timezone_set('Asia/Ujung_Pandang');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    }


    public function index()
    {
        $this->load->view('pelanggan/atas');
        $this->load->view('pelanggan/index');
        $this->load->view('pelanggan/bawah');
    }



    public function tiket()
    {
        $this->load->view('pelanggan/atas');
        $this->load->view('pelanggan/tiket');
        $this->load->view('pelanggan/bawah');
    }


    public function pesanansaya()
    {
        $this->load->view('pelanggan/atas');
        $this->load->view('pelanggan/pesanansaya');
        $this->load->view('pelanggan/bawah');
    }


    public function pesantiket($id = '')
    {
        $data['id'] = $id;
        $this->load->view('pelanggan/atas');
        $this->load->view('pelanggan/pesantiket', $data);
        $this->load->view('pelanggan/bawah');
    }

    public function pesantiketpelanggan()
    {
        $tiket = $_POST['tiket'];
        $idwahana = $_POST['idwahana'];
        $idpelanggan = $_POST['idpelanggan'];
        $harga = $_POST['harga'];
        $tgl = $_POST['tgl'];
        $total = $tiket * $harga;
        $this->db->query("insert into pesan_tiket values('','$idwahana','$idpelanggan','$tiket','$total','$tgl','0')");
        $this->session->set_flashdata('msg', 'pesan');
        redirect("pelanggan/tiket");
    }

    public function bayar($id = '')
    {
        $data['id'] = $id;
        $this->load->view('pelanggan/atas');
        $this->load->view('pelanggan/bayar', $data);
        $this->load->view('pelanggan/bawah');
    }

    public function simpanbayar()
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
            $idwahana = $_POST['idwahana'];
            $idpesan = $_POST['idpesan'];
            $tiket = $this->db->query("select * from pesan_tiket where id='$idpesan'")->row();
            $jml = $tiket->jml;
            $total = $tiket->total;
            $gambar = $gbr['file_name'];
            $atasnama = $_POST['atasnama'];
            $nota = $_POST['nota'];
            $date = date("Y-m-d H:i:s");
            $nama = $_POST['nama'];
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './qr/'; //string, the default is application/cache/
            $config['errorlog']     = './qr/'; //string, the default is application/logs/
            $config['imagedir']     = './qr/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);

            $image_name = $nota . '.png'; //buat name dari qr code sesuai dengan nota

            $params['data'] = $nota; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            $this->db->query("update pesan_tiket set status='1' where id='$idpesan'");
            $this->db->query("insert into pesanan values('','$idwahana','$idpesan','$nama','$nota','Proses','$jml','$total',now(),'$gambar','','','$image_name','0')");
            $this->session->set_flashdata('msg', 'bayar');
            redirect("pelanggan/pesanansaya");
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect("pelanggan/pesanansaya");
        }
    }

    public function detail($id = '')
    {
        $data['id'] = $id;
        $this->load->view('pelanggan/atas', $data, FALSE);
        $this->load->view('pelanggan/detail', $data, FALSE);
        $this->load->view('pelanggan/bawah', $data, FALSE);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home/login', 'refresh');
    }
}

/* End of file Pelanggan.php */
