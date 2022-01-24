<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model {
    public function simpanuser($data) {
        return $this->db->insert('user', $data);
    }

    public function cekData($where) {
        return $this->db->get_where('user', $where);
    }

    public function getusers() {
        return $this->db->get('user');
    }

    public function is_active($table, $data = null, $where = null) {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }   
    }

    public function update($where, $data) {
        return $this->db->update('user', $where, $data);
    }

    public function hapususer($id) {
        return $this->db->delete('user', $id);
    }

    public function editprofile($nama, $email) {
        $this->db->set('user', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    public function tambah($data) {
        return $this->db->insert('user', $data);
    }
}