<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCrud extends CI_Model
{
    public function getsupp()
    {
        return $this->db->get('supplier');
    }

    public function getsuppbyid($id)
    {
        return $this->db->get_where('supplier', $id);
    }

    public function tambahsupp($data)
    {
        return $this->db->insert('supplier', $data);
    }

    public function ubahsupp($data, $id)
    {
        return $this->db->update('supplier', $data, $id);
    }

    public function hapussupp($id)
    {
        return $this->db->delete('supplier', $id);
    }

    public function getkategori()
    {
        return $this->db->get('kategori');
    }

    public function tambahkat($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function getkatbyid($id)
    {
        return $this->db->get_where('kategori', $id);
    }

    public function ubahkat($data, $id)
    {
        return $this->db->update('kategori', $data, $id);
    }

    public function hapuskat($id)
    {
        return $this->db->delete('kategori', $id);
    }

    public function getsatuan()
    {
        return $this->db->get('satuan');
    }

    public function tambahsat($data)
    {
        return $this->db->insert('satuan', $data);
    }

    public function getsatbyid($id)
    {
        return $this->db->get_where('satuan', $id);
    }

    public function ubahsat($data, $id)
    {
        return $this->db->update('satuan', $data, $id);
    }

    public function hapussat($id)
    {
        return $this->db->delete('satuan', $id);
    }

    public function getbarang()
    {
        $sql = "SELECT * FROM barang INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan ORDER BY id_barang DESC";
        return $this->db->query($sql);
    }

    public function tambahbarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function getbarangbyid($id)
    {
        return $this->db->get_where('barang', $id);
    }

    public function ubahbarang($data, $id)
    {
        return $this->db->update('barang', $data, $id);
    }

    public function hapusbarang($id)
    {
        return $this->db->delete('barang', $id);
    }

    public function getpelanggan()
    {
        return $this->db->get('pelanggan');
    }

    public function tambahpelanggan($data)
    {
        return $this->db->insert('pelanggan', $data);
    }

    public function ubahpelanggan($data, $id)
    {
        return $this->db->update('pelanggan', $data, $id);
    }

    public function deletePelanggan($id)
    {
        return $this->db->delete('pelanggan', $id);
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function laku($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }
}
