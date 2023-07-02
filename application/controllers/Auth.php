<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '{field} belum di isi',
            'valid_email' => '{field} tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => '{field} belum di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user'],
                        'user' => $user['user'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 'Admin') {
                        redirect('admin');
                    } elseif ($user['role_id'] == 'Owner') {
                        redirect('owner');
                    } else {
                        redirect('kasir');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password Salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Akun Belum Di Aktifasi!! Silahkan Hubungi Owner');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Email Tidak Terdaftar');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('user');

        $this->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect('auth');
    }
}
