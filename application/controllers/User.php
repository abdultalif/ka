<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'User Management';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->ModelUser->getusers()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function activeuser($id)
    {
        $status = $this->ModelUser->is_active('user', ['id_user' => $id])['is_active'];
        if ($status == 1) {
            $active = 0;
            $this->ModelUser->update(['is_active' => $active], ['id_user' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> User dinonaktifkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $active = 1;
            $this->ModelUser->update(['is_active' => $active], ['id_user' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> User diaktifkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
        redirect('user');
    }

    public function hapususer($id)
    {
        $this->ModelUser->hapususer(['id_user' => $id]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Success!</strong> User Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('user');
    }

    public function myprofile()
    {
        $data['judul'] = 'My Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/myprofile', $data);
        $this->load->view('templates/footer');
    }

    public function editprofile()
    {
        $data['judul'] = 'Edit Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');

            //if image uploaded
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->ModelUser->editprofile($nama, $email);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Profile kamu berhasil di ubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/myprofile');
        }
    }

    public function changepassword()
    {
        $data['judul'] = 'Change Password';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_lama', 'Curent Password', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'New Password', 'trim|required|min_length[3]|matches[confirm]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password_baru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepass', $data);
            $this->load->view('templates/footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-icon alert-dismissible fade show"><strong>Error!</strong> Password Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('user/changepassword');
            } else {
                $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Password berhasil di ubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('user/changepassword');
            }
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'is_active' => 0,
                'tanggal_input' => time()
            ];

            $this->ModelUser->tambah($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> Akun Berhasil Di Buat Silahkan Aktivasi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
        }
    }

    public function ubahuser()
    {
        $id = $this->uri->segment('3');
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->ModelUser->cekData(['id_user' => $id])->row_array();
        $data['role'] = ['Admin', 'Kasir'];

        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'user' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role')
            ];

            $this->ModelUser->update($data, ['id_user' => $id]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-icon alert-dismissible fade show"><strong>Success!</strong> User berhasil di ubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user');
        }
    }
}
