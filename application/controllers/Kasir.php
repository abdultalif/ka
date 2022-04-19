<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data = [
            'judul' => 'Halaman Dashboard',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'stok' => $this->ModelCrud->sum('barang', 'stok'),
            'laku' => $this->ModelCrud->laku('detail_transaksi', 'jumlah'),
            'b_masuk' => $this->ModelStok->bmasuk()->result_array(),
            'b_keluar' => $this->ModelStok->bkeluar()->result_array(),
            'barang_masuk' => $this->ModelStok->count('barang_masuk'),
            'barang_keluar' => $this->ModelStok->count('barang_keluar')
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer', $data);
    }
}
