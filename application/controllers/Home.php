<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Ujung_Pandang');

    }
    
    public function index()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/index');
        $this->load->view('frontend/bawah');
    }

    public function about()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/about');
        $this->load->view('frontend/bawah');
    }

    public function wahana()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/wahana');
        $this->load->view('frontend/bawah');
    }
    public function register()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/registrasi');
        $this->load->view('frontend/bawah');
    }
    public function detailwahana($id='')
    {
        $this->db->query("update wahana set views=views+1 where id='$id'");
        $data['id'] = $id;
        $this->load->view('frontend/atas');
        $this->load->view('frontend/detailwahana',$data);
        $this->load->view('frontend/bawah');
    }


    public function saveregis()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->db->query("insert into pelanggan values('','$nama','$email','$telp','$username',md5('$password'),now())");
        $this->session->set_flashdata('msg', 'success');
        redirect('home/register','refresh');
    }

    public function login()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/login');
        $this->load->view('frontend/bawah');
    }

    public function loginpelanggan()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $q = $this->db->query("select * from pelanggan where username='$username' and password=md5('$password')");
        if($q->num_rows() > 0){
            $row = $q->row();
            $data = [
                "id" => $row->id,
                "nama"  => $row->nama,
                "telp"  => $row->telp,
                "email" => $row->email
            ];
            $this->session->set_userdata($data);
            redirect('pelanggan','refresh');
        }else{
            $this->session->set_flashdata('msg', 'errorlogin');
            redirect('home/login','refresh');
        }
    }

    public function logout()
    {
        
        $this->session->sess_destroy();
        
        redirect('home/login','refresh');
        
    }
}

/* End of file Home.php */
