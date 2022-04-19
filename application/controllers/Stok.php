<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Barang Masuk';
        $data['user'] = $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['barang_m'] = $this->ModelStok->getmasuk()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_masuk()
    {
        $data['judul'] = 'Input Barang Masuk';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->ModelCrud->getsupp()->result_array();
        $data['barang'] = $this->ModelCrud->getbarang()->result_array();


        // Mendapatkan dan men-generate kode transaksi barang masuk
        $kode = 'A-TP-' . date('ymd');
        $kode_terakhir = $this->ModelCrud->getMax('barang_masuk', 'id_masuk', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '01', STR_PAD_LEFT);
        $data['id_masuk'] = $kode . $number;

        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('stok/tambah_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_barang');
            $total = $this->input->post('total_stok');
            $data = [
                'id_masuk' => $this->input->post('id'),
                'id_supplier' => $this->input->post('id_supplier'),
                'id_user' => $this->input->post('user'),
                'harga_beli' => $this->input->post('harga'),
                'total_harga' => $this->input->post('harga') * $this->input->post('jumlah_masuk'),
                'id_barang' => $this->input->post('id_barang'),
                'jumlah_masuk' => $this->input->post('jumlah_masuk'),
                'tanggal_masuk' => $this->input->post('tanggal'),
            ];

            $this->ModelStok->updatestok($total, $id);
            $this->ModelStok->barangmasuk($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Di Tambah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('stok');
        }
    }


    public function hapus_masuk()
    {
        $id_masuk = $this->uri->segment(3);
        $id_barang = $this->uri->segment(4);

        $jumlah = $this->ModelStok->getjumlahbyidmasuk(['id_masuk' => $id_masuk])->row_array()['jumlah_masuk'];
        $stok = $this->ModelStok->getstokbyid(['id_barang' => $id_barang])->row_array()['stok'];
        $this->ModelStok->updatestokmasuk($jumlah, $id_barang);
        $this->ModelStok->delete_masuk(['id_masuk' => $id_masuk]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Barang Berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('stok');
    }

    public function keluar()
    {
        $data['judul'] = 'Data Barang Keluar';
        $data['user'] = $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['barang_k'] = $this->ModelStok->getkeluar()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/barang_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_keluar()
    {
        $data['judul'] = 'Input Barang Keluar';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelCrud->getbarang()->result_array();


        // Mendapatkan dan men-generate kode transaksi barang Keluar
        $kode = 'D-BK-' . date('ymd');
        $kode_terakhir = $this->ModelCrud->getMax('barang_keluar', 'id_keluar', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '01', STR_PAD_LEFT);
        $data['id_keluar'] = $kode . $number;
        // $id_barang = $this->input->post('id_barang');
        // $stok = $this->ModelStok->getbarangbyid($id_barang)->row_array()['stok'];


        $this->form_validation->set_rules('barang', 'Barang', 'required');
        // $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('stok/tambah_keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id_barang');
            $total = $this->input->post('total_stok');
            $data = [
                'id_keluar' => $this->input->post('id'),
                'id_user' => $this->input->post('user'),
                'id_barang' => $this->input->post('id_barang'),
                'jumlah_keluar' => $this->input->post('jumlah_keluar'),
                'tanggal_keluar' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->ModelStok->updatestok($total, $id);
            $this->ModelStok->barangkeluar($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Di Simpan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('stok/keluar');
        }
    }

    public function hapus_keluar()
    {
        $id_keluar = $this->uri->segment('3');
        $id_barang = $this->uri->segment('4');
        $jumlah = $this->ModelStok->getjumlahbyidkeluar(['id_keluar' => $id_keluar])->row_array()['jumlah_keluar'];
        $stok = $this->ModelStok->getstokbyid(['id_barang' => $id_barang])->row_array()['stok'];
        $hitung = $stok + $jumlah;

        $this->ModelStok->updatestokkeluar($hitung, $id_barang);
        $this->ModelStok->delete_Keluar(['id_keluar' => $id_keluar]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Barang Berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('stok/keluar');
    }
}
