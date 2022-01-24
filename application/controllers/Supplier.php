<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->ModelCrud->getsupp()->result_array();
        $data['judul'] = 'Halaman Supplier';

        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('no', 'No', 'trim|required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->ModelCrud->tambahsupp($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supplier');
        }
    }

    public function ubah()
    {
        $data['user'] = $this->ModelUser->cekData(['email', $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('no', 'No', 'trim|required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('supplier/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->ModelCrud->ubahsupp($data, ['id_supplier' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil DiUbah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supplier');
        }
    }

    public function hapus($id)
    {
        $this->ModelCrud->hapussupp(['id_supplier' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('supplier');
    }

    public function pelanggan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelCrud->getpelanggan()->result_array();
        $data['judul'] = 'Halaman Pelanggan';

        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'Number', 'trim|required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/pelanggan');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->ModelCrud->tambahpelanggan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supplier/pelanggan');
        }
    }

    public function ubahpelanggan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelCrud->getpelanggan()->result_array();
        $data['judul'] = 'Ubah Pelanggan';

        $this->form_validation->set_rules('nama', 'Name', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'Number', 'trim|required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/pelanggan');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->ModelCrud->ubahpelanggan($data, ['id_pelanggan' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil DiUbah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('supplier/pelanggan');
        }
    }

    public function hapuspelanggan($id)
    {
        $this->ModelCrud->deletePelanggan(['id_pelanggan' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> Data Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('supplier/pelanggan');
    }
}
