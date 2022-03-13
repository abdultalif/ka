<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-search"></i> Cari Barang</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('transaksi'); ?>" method="get">
                        <input type="text" name="keyword" class="form-control" Placeholder="Input Barang / Kategori [ENTER]">
                    </form>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fa fa-list"></i> Hasil Pencarian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            if ($cari != '') {
                                foreach ($cari as $c) {
                            ?>
                                    <tr class="text-center">
                                        <td><?= $no++ ?></td>
                                        <td><?= $c['id_barang']; ?></td>
                                        <td><?= $c['barang']; ?></td>
                                        <td><?= $c['nama_kategori']; ?></td>
                                        <td>Rp. <?= number_format($c['harga']); ?></td>
                                        <?php if ($c['stok'] == 0) {
                                            $stok = "Habis";
                                        } else {
                                            $stok = $c['stok'];
                                        } ?>
                                        <td><?= $stok; ?></td>
                                        <td><?= $c['satuan']; ?></td>
                                        <td>
                                            <?php
                                                if ($c['stok'] == 0) {
                                            ?>
                                                    <a href="" class="btn btn-danger" disable><i class="fa fa-cart-plus"></i></a>
                                            <?php
                                                } else { ?>
                                                    <a href="<?= base_url('transaksi/add/') . $c['id_barang']; ?>" class="btn btn-success"><i class="fa fa-cart-plus"></i></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('transaksi/hapus') ?>" class="btn btn-danger float-right ml-1"><i class="fa fa-trash-alt"></i> Reset Keranjang</a>
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search"></i> Daftar Barang</button>
            <h5 class="m-0 font-weight-bold text-dark"><i class="fa fa-shopping-cart"></i> Keranjang Belanjaan</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered mb-3">
                <tr>
                    <td style="text-align: center;"><b>Kode Invoice</b></td>
                    <td><input type="text" readonly="readonly" class="form-control" name="kode" value="<?= $kode; ?>"></td>
                </tr>
            </table>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_bayar = 0;
                        $no = 1;
                        foreach ($penjualan as $p) {
                            $total_bayar += $p['total'];
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['id_barang']; ?></td>
                                <td><?= $p['barang']; ?></td>
                                <td>Rp. <?= number_format($p['harga']); ?></td>
                                <td>
                                    <form action="<?= base_url('transaksi/jumlahbeli') ?>" method="post">
                                        <input type="number" name="jumlah" class="form-control" Placeholder="Masukan Jumlah Beli" value=<?= $p['jumlah']; ?>>
                                        <input type="hidden" name="id_barang" value="<?= $p['id_barang']; ?>">
                                        <input type="hidden" name="barang" value="<?= $p['barang']; ?>">
                                        <input type="hidden" name="id_penjualan" value="<?= $p['id_penjualan']; ?>">
                                        <input type="hidden" name="stok" value="<?= $p['stok']; ?>">
                                    </form>
                                </td>
                                <td><?= $p['satuan']; ?></td>
                                <td>Rp. <?= number_format($p['total']); ?></td>
                                <td><?= $p['user']; ?></td>
                                <td>
                                    <a href="<?= base_url('transaksi/hapusbyid/') . $p['id_penjualan'] ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <table class="table table-stripped mt-4">
                    <form method="post" action="<?= base_url('transaksi/bayar'); ?>">
                        <?php
                        foreach ($penjualan as $p) { ?>
                            <input type="hidden" name="id_barang" value="<?= $p['id_barang']; ?>">
                            <input type="hidden" name="id_user" value="<?= $p['id_user']; ?>">
                            <input type="hidden" name="jumlah" value="<?= $p['jumlah']; ?>">
                            <input type="hidden" name="total" value="<?= $p['total']; ?>">
                        <?php
                        }
                        ?>
                        <tr>
                            <td>Total Semua </td>
                            <td>
                                <input type="text" class="form-control" name="total_semua" id="total" value="<?= $total_bayar; ?>" readonly>
                            </td>
                            <td>Pelanggan </td>
                            <td>
                                <select name="pelanggan" class=form-control>
                                    <?php
                                    foreach ($pelanggan as $p) {
                                    ?>
                                        <option value="<?= $p['id_pelanggan'] ?>"><?= $p['nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kembalian</td>
                            <td><input type="text" class="form-control" name="kembali" id="kembali" readonly></td>
                            <td>Bayar</td>
                            <td>
                                <input type="number" class="form-control" onkeyup="transaksi();" name="bayar" id="bayar">
                                <input type="hidden" name="kode" value="<?= $kode; ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda ingin melakukan transaksi ini ???')"><i class="fa fa-shopping-cart"></i> Bayar</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark text-center">Riwayat Transaksi</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="tabeltransaksi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($user['user']) {
                            foreach ($transaksi as $f) {
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $f['invoice']; ?></td>
                                    <td><i class="fa fa-calendar-alt"></i> <?= $f['tanggal']; ?> <?= $f['waktu'] ?></td>
                                    <td><?= $f['nama']; ?></td>
                                    <td><?= $f['user']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail/') . $f['invoice']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('transaksi/printbyid/') . $f['invoice']; ?>" class="btn btn-warning" target="blank"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal Barang -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Pilih Barang Yang Ingin Di Beli</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="databarang" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang as $b) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $b['id_barang']; ?></td>
                                    <td><?= $b['barang']; ?></td>
                                    <td><?= $b['nama_kategori']; ?></td>
                                    <td>Rp. <?= number_format($b['harga']); ?></td>
                                    <td><?= $b['stok']; ?></td>
                                    <td><?= $b['satuan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/add/') . $b['id_barang']; ?>" id="select" class="btn btn-success btn-sm"><i class="fa fa-cart-plus"></i> Beli</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>