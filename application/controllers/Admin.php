<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['stock'] = $this->db->get_where('stok_penjualan')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('stok-penjualan');
    }
    public function kasir()
    {
        $this->load->view('templates/header');
        $this->load->view('kasir.php');
    }
    public function laporan()
    {
        $this->load->view('templates/header');
        $this->load->view('laporan-penjualan.php');
    }
}
