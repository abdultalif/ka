<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('modelaporan');
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Laporan Penjualan';
        $data['transaksi'] = $this->modelaporan->transaksi()->result_array();

        $this->form_validation->set_rules('dari', 'Dari', 'required', [
            'required' => 'From Tanggal Harus Di Isi'
        ]);
        $this->form_validation->set_rules('sampai', 'Sampai', 'required', [
            'required' => 'From Tanggal Harus Di Isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $datadari = $this->input->post('dari');
            $datasampai = $this->input->post('sampai');
            $data['judul'] = 'Laporan Transaksi';
            $data['title'] = "Laporan Dari Tanggal : " . $datadari . " Sampai Tanggal : " . $datasampai;
            $data['filterbytanggal'] = $this->modelaporan->filter($datadari, $datasampai)->result_array();
            $filter = $this->modelaporan->filter($datadari, $datasampai)->result_array();

            foreach ($filter as $f) {
                $invoice = $f['invoice'];
            }
            $data['detail'] = $this->modelaporan->detailid($invoice)->result_array();


            $this->load->library('pdf');
            $paper_size = 'A3'; // ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $this->pdf->set_paper($paper_size, $orientation);
            $this->pdf->filename = "laporan-transaksi.pdf";
            // nama file pdf yang di hasilkan
            $this->pdf->load_view('laporan/print_transaksi', $data);
        }
    }

    public function stok()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Laporan Stok Barang';

        $this->form_validation->set_rules('dari', 'Dari', 'required', [
            'required' => 'Pilih Tanggal'
        ]);
        $this->form_validation->set_rules('sampai', 'Sampai', 'required', [
            'required' => 'Pilih Tanggal'
        ]);
        $this->form_validation->set_rules('stok', 'Sampai', 'required', [
            'required' => 'Pilih Laporan Stok'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/stok', $data);
            $this->load->view('templates/footer');
        } else {
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $stok = $this->input->post('stok');

            if ($stok == "Barang Masuk") {
                $data['title'] = "Laporan Barang Masuk Dari : " . $dari . " s/d " . $sampai;
                $data['judul'] = "Laporan Stok Barang Masuk";
                $data['filterm'] = $this->modelaporan->filtermasuk($dari, $sampai)->result_array();

                $this->load->library('pdf');
                $paper_size = 'A4'; // ukuran kertas
                $orientation = 'landscape'; //tipe format kertas potrait atau landscape
                $this->pdf->set_paper($paper_size, $orientation);
                $this->pdf->filename = "laporan-barang-masuk.pdf";
                // nama file pdf yang di hasilkan
                $this->pdf->load_view('laporan/printmasuk', $data);
            } else {
                $data['title'] = "Laporan Barang Keluar Dari : " . $dari . " s/d " . $sampai;
                $data['judul'] = "Laporan Stok Barang Keluar";
                $data['filterk'] = $this->modelaporan->filterkeluar($dari, $sampai)->result_array();

                $this->load->library('pdf');
                $paper_size = 'A4'; // ukuran kertas
                $orientation = 'landscape'; //tipe format kertas potrait atau landscape
                $this->pdf->set_paper($paper_size, $orientation);
                $this->pdf->filename = "laporan-barang-keluar.pdf";
                // nama file pdf yang di hasilkan
                $this->pdf->load_view('laporan/printkeluar', $data);
            }
        }
    }
}
