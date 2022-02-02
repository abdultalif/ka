<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card shadow-sm border-left-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-dark"><i class="fa fa-print"></i>
                                Print Kwitansi Pembayaran
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Transaksi Sukses Silahkan Cetak Kwitansi Barang</p>
                    <h5>Kembalian Anda : <b>Rp. 23000</b></h5>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url() ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon"><i class="fa fa-arrow-left"></i></span><span class="text">Kembali</span></a>
                    <a href="<?= base_url() ?>" class="btn btn-sm btn-success btn-icon-split"><span class="icon"><i class="fa fa-print"></i></span><span class="text">Print</span></a>
                </div>
            </div>
        </div>
    </div>
</div>