<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

  public function index()
  {
    $data['title'] = 'Contoh SweetAlert dengan Tabel';
    $data['users'] = array(
      array('id' => 1, 'nama' => 'John Doe', 'usia' => 25),
      array('id' => 2, 'nama' => 'Jane Smith', 'usia' => 30),
      array('id' => 2, 'nama' => 'Jane Smith', 'usia' => 30),
      array('id' => 2, 'nama' => 'Jane Smith', 'usia' => 30),
      array('id' => 3, 'nama' => 'Mark Johnson', 'usia' => 28),
      array('id' => 3, 'nama' => 'Mark Johnson', 'usia' => 28),
      array('id' => 3, 'nama' => 'Mark Johnson', 'usia' => 28),
      array('id' => 3, 'nama' => 'Mark Johnson', 'usia' => 28),
    );

    $this->load->view('example_view', $data);
  }

}
