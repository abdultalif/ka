<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelStok extends CI_Model
{

    public function getmasuk()
    {
        $this->db->select('id_masuk, barang, nama, jumlah_masuk, user, harga_beli, total_harga, date_format(tanggal_masuk,"%d %M %Y") as tanggal_masuk, barang.id_barang, barang_masuk.id_barang, supplier.id_supplier, barang_masuk.id_supplier, user.id_user, barang_masuk.id_user');
        $this->db->join('supplier', 'supplier.id_supplier = barang_masuk.id_supplier');
        $this->db->join('user', 'user.id_user = barang_masuk.id_user');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang');
        $this->db->order_by('id_masuk', 'DESC');
        return $this->db->get('barang_masuk');
    }

    public function barangmasuk($data)
    {
        return $this->db->insert('barang_masuk', $data);
    }

    public function updatestok($total, $id)
    {
        $sql = ("UPDATE barang SET stok='$total' WHERE id_barang = '$id'");
        return $this->db->query($sql);
    }

    public function updatestokmasuk($jumlah, $id)
    {
        $sql = ("UPDATE barang SET stok= stok - '$jumlah' WHERE id_barang = '$id'");
        return $this->db->query($sql);
    }

    public function updatestokkeluar($hitung, $id)
    {
        $sql = ("UPDATE barang SET stok='$hitung' WHERE id_barang = '$id'");
        return $this->db->query($sql);
    }

    public function bmasuk()
    {
        $sql = "SELECT * FROM barang_masuk INNER JOIN supplier ON barang_masuk.id_supplier = supplier.id_supplier INNER JOIN barang ON barang_masuk.id_barang = barang.id_barang ORDER BY barang_masuk.id_masuk DESC limit 5";
        return $this->db->query($sql);
    }

    public function bkeluar()
    {
        $sql = "SELECT * FROM barang_keluar INNER JOIN barang ON barang_keluar.id_barang = barang.id_barang ORDER BY barang_keluar.id_keluar DESC limit 5";
        return $this->db->query($sql);
    }

    public function getkeluar()
    {
        $this->db->select('user.id_user, barang_keluar.id_user, barang.id_barang, barang_keluar.id_barang, date_format(tanggal_keluar,"%d %M %Y") as tanggal_keluar, id_keluar, barang, jumlah_keluar, keterangan, user');
        $this->db->join('user', 'user.id_user = barang_keluar.id_user');
        $this->db->join('barang', 'barang.id_barang = barang_keluar.id_barang');
        return $this->db->get('barang_keluar');
    }

    public function delete_masuk($id)
    {
        return $this->db->delete('barang_masuk', $id);
    }

    public function barangkeluar($data)
    {
        return $this->db->insert('barang_keluar', $data);
    }

    public function getjumlahbyidkeluar($id)
    {
        return $this->db->get_where('barang_keluar', $id);
    }

    public function getjumlahbyidmasuk($id)
    {
        return $this->db->get_where('barang_masuk', $id);
    }

    public function getstokbyid($id)
    {
        return $this->db->get_where('barang', $id);
    }

    public function delete_Keluar($id)
    {
        return $this->db->delete('barang_keluar', $id);
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }
}
