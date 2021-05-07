<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{

    public function index()
    {
        $data_stok = $this->db->get_where('stok_penjualan')->result();
        echo json_encode($data_stok);
    }
    public function save()
    {
        $id = $this->input->post('id');
        $NamaBarang = $this->input->post('nama_barang');
        $KodeBarang = $this->input->post('kode_barang');
        $Kuantitas = $this->input->post('kuantitas');
        $Harga = $this->input->post('harga');
        $Stock = $this->input->post('stock');
        $data = array(
            'nama_barang' => $NamaBarang,
            'kode_barang' => $KodeBarang,
            'kuantitas' => $Kuantitas,
            'harga' => $Harga,
            'stock' => $Stock
        );
        if ($id == "") {
            $this->db->insert('stok_penjualan', $data);
        } else {
            $where = array(
                'id' => $id
            );
            $this->db->update('stok_penjualan', $data, $where);
        }
    }
    public function hapus()
    {
        $id = $this->input->post('id');

        $where = array(
            'id' => $id
        );
        $this->db->delete('stok_penjualan', $where);
    }
}
