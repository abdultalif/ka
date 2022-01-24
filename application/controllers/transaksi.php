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
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Transaksi';
        $data['penjualan'] = $this->modeltransaksi->getpenjualan()->result_array();
        $data['pelanggan'] = $this->ModelCrud->getpelanggan()->result_array();
        $data['transaksi'] = $this->modelaporan->transaksi()->result_array();

        $data['cari'] = '';
        if ($this->input->get('keyword')) {
            $keyword = $this->input->get('keyword');
            $data['cari'] = $this->modeltransaksi->ambil_data($keyword)->result_array();
        }

        $data['kode'] = $this->modeltransaksi->kodeOtomatis();


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
}
