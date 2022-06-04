<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model(['modeltransaksi', 'modelaporan']);
    }

    public function index()
    {
        $data = [
            'user' => $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(),
            'judul' => 'Transaksi',
            'penjualan' => $this->modeltransaksi->getpenjualan()->result_array(),
            'pelanggan' => $this->ModelCrud->getpelanggan()->result_array(),
            'transaksi' => $this->modelaporan->transaksi()->result_array(),
            'barang' => $this->ModelCrud->getbarang()->result_array(),
            'cari' => '',
            'kode' => $this->modeltransaksi->kodeOtomatis()
        ];

        if ($this->input->get('keyword')) {
            $keyword = $this->input->get('keyword');
            $data['cari'] = $this->modeltransaksi->ambil_data($keyword)->result_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_barang = $this->uri->segment('3');
        $data = [
            'id_barang' => $id_barang,
            'id_user' => $this->session->userdata('id_user'),
            'jumlah' => 0,
            'total' => 0
        ];

        $this->modeltransaksi->addpen($data);
        redirect('transaksi');
    }

    public function hapusbyid($id)
    {
        $this->modeltransaksi->hapusbyid(['id_penjualan' => $id]);
        redirect('transaksi');
    }

    public function hapus()
    {
        $this->modeltransaksi->hapus();
        redirect('transaksi');
    }

    public function jumlahbeli()
    {
        $id_barang = $this->input->post('id_barang');
        $id_penjualan = $this->input->post('id_penjualan');
        $stok = $this->input->post('stok');
        $jb = $this->input->post('jumlah');
        $barang = $this->input->post('barang');
        if ($stok >= $jb) {
            $harga = $this->ModelCrud->getbarangbyid(['id_barang' => $id_barang])->row_array()['harga'];
            $total = $harga * $jb;
            $this->modeltransaksi->updatetotal($total, $jb, $id_penjualan);
            redirect('transaksi');
        } else {
            if ($stok == 0) {
?>
                <script type="text/javascript">
                    alert("Stok <?= $barang; ?> Telah Habis");
                    window.location.href = "<?= base_url('transaksi'); ?>";
                </script>
            <?php
            } elseif ($jb > $stok) {
            ?>
                <script type="text/javascript">
                    alert("Stok <?= $barang; ?> kurang, stok hanya tersisa <?= $stok; ?>");
                    window.location.href = "<?= base_url('transaksi'); ?>";
                </script>
            <?php
            }
        }
    }

    public function bayar()
    {
        $invoice = $this->input->post('kode');
        $kasir = $this->input->post('id_user');
        $total = $this->input->post('total_semua');
        $pelanggan = $this->input->post('pelanggan');
        $bayar = $this->input->post('bayar');
        $kembali = $this->input->post('kembali');
        $tanggal = date("Y-m-d");
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("H:i:s");

        if ($total > $bayar) {
            ?>
            <script type="text/javascript">
                alert("Uang Anda Kurang");
                window.location.href = "<?= base_url('transaksi'); ?>";
            </script>
<?php
        } else {
            $data = [
                'invoice' => $invoice,
                'id_pelanggan' => $pelanggan,
                'id_user' => $kasir,
                'total' => $total,
                'bayar' => $bayar,
                'kembalian' => $kembali,
                'tanggal' => $tanggal,
                'waktu' => $waktu
            ];
            $this->modeltransaksi->simpan($data);
            $this->modeltransaksi->simpanDetail($invoice);
            $this->modeltransaksi->hapus();
            redirect('transaksi');
        }
    }

    public function selesai()
    {
        $data['judul'] = 'Transaksi Selesai';
        $data['user'] = $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Detail Transaksi';
        $data['detail'] = $this->modelaporan->detailbyid($id)->row_array();
        $data['detail_transaksi'] = $this->modelaporan->detailid($id)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail', $data);
        $this->load->view('templates/footer');
    }

    public function printbyid($invoice)
    {
        $data['judul'] = 'Kwitansi Transaksi';
        $data['detail'] = $this->modelaporan->detailbyid($invoice)->row_array();
        $data['detail_transaksi'] = $this->modelaporan->detailid($invoice)->result_array();
        $data['d_transaksi'] = $this->modelaporan->detailid($invoice)->num_rows();
        $this->load->library('pdf');
        $paper_size = 'A6'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $this->pdf->set_paper($paper_size, $orientation);
        $this->pdf->filename = "kwitansi-transaksi-$invoice.pdf";
        // nama file pdf yang di hasilkan
        $this->pdf->load_view('transaksi/kwitansi', $data);
    }

    public function riwayat()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['riwayat'] = $this->modelaporan->transaksi()->result_array();
        $data['judul'] = 'Riwayat Transaksi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/riwayat', $data);
        $this->load->view('templates/footer');
    }
}
