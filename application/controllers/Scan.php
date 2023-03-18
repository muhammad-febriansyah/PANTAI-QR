<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{
    public function cek_id()
    {
        $id = $_POST['id'];
        $cek_id = $this->db->query("select * from pesanan where nota='$id' and status='Terkonfirmasi' and statusqr='0'");
        if ($cek_id->num_rows() > 0) {
            $this->db->query("update pesanan set statusqr='1' where nota='$id'");
            $this->session->set_flashdata('msg', 'bener');
            redirect("main/scan");
        } else {
            $this->session->set_flashdata('msg', 'salah');
            redirect("main/scan");
        }
    }
}

/* End of file Scan.php */
