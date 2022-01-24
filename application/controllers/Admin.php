<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['user'] = $this->ModelUser->cekData(['role_id' => $this->session->userdata('role_id')])->row_array();
        $data['stok'] = $this->ModelCrud->sum('barang', 'stok');
        $data['laku'] = $this->ModelCrud->laku('detail_transaksi', 'jumlah');
        $data['b_masuk'] = $this->ModelStok->bmasuk()->result_array();
        $data['b_keluar'] = $this->ModelStok->bkeluar()->result_array();
        $data['barang_masuk'] = $this->ModelStok->count('barang_masuk');
        $data['barang_keluar'] = $this->ModelStok->count('barang_keluar');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
