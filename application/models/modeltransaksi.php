<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modeltransaksi extends CI_Model
{
	public function ambil_data($keyword = null)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('satuan', 'satuan.id_satuan = barang.id_satuan');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
		if (!empty($keyword)) {
			$this->db->like('nama_kategori', $keyword);
			$this->db->or_like('barang', $keyword);
		}
		return $this->db->get();
	}

	public function addpen($data)
	{
		return $this->db->insert('penjualan', $data);
	}

	public function getpenjualan()
	{
		$this->db->select('*');
		$this->db->join('barang', 'penjualan.id_barang = barang.id_barang');
		$this->db->join('user', 'penjualan.id_user = user.id_user');
		$this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan');
		return $this->db->get('penjualan');
	}

	public function hapusbyid($id)
	{
		$this->db->delete('penjualan', $id);
	}

	public function hapus()
	{
		$sql = "DELETE FROM penjualan";
		return $this->db->query($sql);
	}

	public function updatetotal($total, $jb, $id)
	{
		$sql = "UPDATE penjualan SET jumlah='$jb', total='$total' WHERE id_penjualan = '$id'";
		return $this->db->query($sql);
	}

	public function simpan($data)
	{
		return $this->db->insert('transaksi', $data);
	}

	public function kodeOtomatis()
	{
		// Mendapatkan dan men-generate kode transaksi barang masuk
		$kode = 'PY-' . date('ymd');
		$kode_terakhir = $this->ModelCrud->getMax('transaksi', 'invoice', $kode);
		$kode_tambah = substr($kode_terakhir, -5, 5);
		$kode_tambah++;
		$number = str_pad($kode_tambah, 5, '01', STR_PAD_LEFT);
		return $kodejadi = $kode . $number;
	}

	public function simpanDetail($where)
	{
		$sql = "INSERT INTO detail_transaksi (invoice, id_barang, id_user, jumlah, total_harga) SELECT transaksi.invoice, penjualan.id_barang, penjualan.id_user, penjualan.jumlah, penjualan.total FROM transaksi, penjualan WHERE transaksi.invoice = '$where'";
		$this->db->query($sql);
	}

	public function charttransaksi($bulan)
	{
		$like = 'PY-' . date('y') . $bulan;
		$this->db->like('invoice', $like, 'after');
		return count($this->db->get('transaksi')->result_array());
	}
}
