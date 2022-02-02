<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelaporan extends CI_Model
{
    public function filter($datadari, $datasampai)
    {
        $sql = "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN user ON transaksi.id_user = user.id_user WHERE tanggal BETWEEN '$datadari' AND '$datasampai'";
        return $this->db->query($sql);
    }

    public function transaksi()
    {
        $this->db->select('invoice, total, bayar, nama, user, waktu, date_format(tanggal,"%d %M %Y") as tanggal, transaksi.id_pelanggan, pelanggan.id_pelanggan, transaksi.id_user, user.id_user');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->join('user', 'transaksi.id_user = user.id_user');
        $this->db->order_by('invoice', 'DESC');
        return $this->db->get();
    }

    public function detailbyid($id)
    {
        $this->db->select('total, bayar, nama, user, waktu, kembalian, date_format(tanggal,"%d %M %Y") as tanggal, transaksi.id_pelanggan, pelanggan.id_pelanggan, transaksi.id_user, user.id_user, detail_transaksi.invoice, transaksi.invoice');
        $this->db->from('transaksi');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi.id_pelanggan');
        $this->db->join('detail_transaksi', 'detail_transaksi.invoice = transaksi.invoice');
        $this->db->where('transaksi.invoice', $id);
        return $this->db->get();
    }

    public function detailid($id)
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('user', 'user.id_user = detail_transaksi.id_user');
        $this->db->join('transaksi', 'transaksi.invoice = detail_transaksi.invoice');
        $this->db->join('barang', 'barang.id_barang = detail_transaksi.id_barang');
        $this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan');
        $this->db->where('transaksi.invoice', $id);
        return $this->db->get();
    }

    public function filtermasuk($dari, $sampai)
    {
        $sql = "SELECT * From barang_masuk INNER JOIN supplier ON supplier.id_supplier = barang_masuk.id_supplier INNER JOIN user ON user.id_user = barang_masuk.id_user INNER JOIN barang ON barang.id_barang = barang_masuk.id_barang INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan WHERE tanggal_masuk BETWEEN '$dari' AND '$sampai'";
        return $this->db->query($sql);
    }

    public function filterkeluar($dari, $sampai)
    {
        $sql = "SELECT * From barang_keluar INNER JOIN user ON user.id_user = barang_keluar.id_user INNER JOIN barang ON barang.id_barang = barang_keluar.id_barang WHERE tanggal_keluar BETWEEN '$dari' AND '$sampai' ORDER BY tanggal_keluar ASC";
        return $this->db->query($sql);
    }
}
