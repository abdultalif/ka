<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelCrud->getkategori()->result_array();
        $data['judul'] = 'Halaman Kategori';

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/kategori');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kategori' => $this->input->post('kategori')
            ];
            $this->ModelCrud->tambahkat($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data');
        }
    }

    public function ubahkategori()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelCrud->getkategori()->result_array();
        $data['judul'] = 'Ubah Kategori';

        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/kategori');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama_kategori' => $this->input->post('kategori')
            ];
            $this->ModelCrud->ubahkat($data, ['id_kategori' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data');
        }
    }

    public function hapuskat($id)
    {
        $this->ModelCrud->hapuskat(['id_kategori' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil DiHapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data');
    }

    public function satuan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->ModelCrud->getsatuan()->result_array();
        $data['judul'] = 'Halaman Satuan';

        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/satuan');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'satuan' => $this->input->post('satuan')
            ];
            $this->ModelCrud->tambahsat($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data/satuan');
        }
    }

    public function ubahsatuan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['satuan'] = $this->ModelCrud->getsatuan()->result_array();
        $data['judul'] = 'Ubah Satuan';

        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/satuan');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'satuan' => $this->input->post('satuan')
            ];
            $this->ModelCrud->ubahsat($data, ['id_satuan' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil DiUbah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data/satuan');
        }
    }

    public function hapussat($id)
    {
        $this->ModelCrud->hapussat(['id_satuan' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil DiHapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data/satuan');
    }

    public function barang()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelCrud->getbarang()->result_array();
        $data['kategori'] = $this->ModelCrud->getkategori()->result_array();
        $data['satuan'] = $this->ModelCrud->getsatuan()->result_array();
        $data['judul'] = 'Halaman Barang';

        // Mendapatkan dan men-generate kode transaksi barang
        $kode = 'DB-' . date('ymd');
        $kode_terakhir = $this->ModelCrud->getMax('barang', 'id_barang', $kode);
        $kode_tambah = substr($kode_terakhir, -2, 2);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 2, '01', STR_PAD_LEFT);
        $data['id'] = $kode . $number;

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|integer');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/barang', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id_barang' => $this->input->post('id'),
                'barang' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_satuan' => $this->input->post('id_satuan'),
                'harga' => $this->input->post('harga')
            ];
            $this->ModelCrud->tambahbarang($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data/barang');
        }
    }

    public function hapusbarang($id)
    {
        $this->ModelCrud->hapusbarang(['id_barang' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('data/barang');
    }

    public function ubahbarang()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->ModelCrud->getbarangbyid(['id_barang' => $this->uri->segment('3')])->row_array();
        $data['kategori'] = $this->ModelCrud->getkategori()->result_array();
        $data['satuan'] = $this->ModelCrud->getsatuan()->result_array();
        $data['judul'] = 'Ubah Barang';

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|integer');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/ubah_barang');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'barang' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('kategori'),
                'id_satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga')
            ];
            $this->ModelCrud->ubahbarang($data, ['id_barang' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Di Ubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('data/barang');
        }
    }
}
