<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
    public function __construct() {
        parent::__construct();
        cek_login();
    }
    
    public function index() {
        $data['judul'] = 'Halaman Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasir/index', $data);
        $this->load->view('templates/footer');
    }
}