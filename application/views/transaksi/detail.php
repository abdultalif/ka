<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow-sm border-bottom-secondary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                        <?= $judul; ?> - <?= $detail['invoice']; ?>
                    </h4>
                </div>
                <div class="col-auto">
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        <span class="text">
                            Kembali
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Invoice</strong></td>
                            <td>:</td>
                            <td><?= $detail['invoice']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Kasir</strong></td>
                            <td>:</td>
                            <td><?= $detail['user']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Waktu Penjualan</strong></td>
                            <td>:</td>
                            <td><?= $detail['tanggal']; ?>, <?= $detail['waktu']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Pelanggan</strong></td>
                            <td>:</td>
                            <td><?= $detail['nama']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Bayar</strong></td>
                            <td>:</td>
                            <td>Rp. <?= number_format($detail['bayar']); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Kembalian</strong></td>
                            <td>:</td>
                            <td>Rp. <?= number_format($detail['kembalian']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah Beli</th>
                            <th>Satuan</th>
                            <th>Total</th>
                            <th>Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($detail_transaksi as $d) {
                        ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $d['id_barang']; ?></td>
                                <td><?= $d['barang']; ?></td>
                                <td>Rp. <?= number_format($d['harga']); ?></td>
                                <td><?= $d['jumlah']; ?></td>
                                <td><?= $d['satuan']; ?></td>
                                <td>Rp. <?= number_format($d['total_harga']); ?></td>
                                <td><?= $d['user']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" style="text-align: right;">Total Bayar</th>
                            <th>Rp. <?= number_format($d['total']); ?></th>
                            <td style="background:#ddd"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>