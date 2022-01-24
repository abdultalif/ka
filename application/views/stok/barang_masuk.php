<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Riwayat Data Barang Masuk</h5>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('stok/tambah_masuk') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Input Barang Masuk</a>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah Masuk</th>
                            <th>Tanggal Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($barang_m as $b) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $b['id_masuk']; ?></td>
                            <td><?= $b['barang']; ?></td>
                            <td><?=$b['nama']; ?></td>
                            <td><?= $b['jumlah_masuk']; ?></td>
                            <td><i class="fa fa-calendar-alt"></i> <?= $b['tanggal_masuk']; ?></td>
                            <td>
                                <button id="detail" class="badge badge-dark" data-toggle="modal" data-target=".detail-barang"
                                    data-id_masuk = "<?= $b['id_masuk']; ?>"
                                    data-nama = "<?= $b['nama']; ?>"
                                    data-user = "<?= $b['user']; ?>"
                                    data-barang = "<?= $b['barang']; ?>"
                                    data-jumlah_masuk = "<?= $b['jumlah_masuk']; ?>"
                                    data-harga = "<?= $b['harga_beli']; ?>"
                                    data-total_harga = "<?= $b['total_harga']; ?>"
                                    data-tanggal_masuk = "<?= $b['tanggal_masuk']; ?>"
                                ><i class="fa fa-eye"></i> Detail</button>
                            

                                <a href="<?= base_url('stok/hapus_masuk/') . $b['id_masuk'] . '/' . $b['id_barang']  ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $b['barang']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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
<!-- /.container-fluid -->



<div class="modal fade detail-barang" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5" id="mySmallModalLabel">Detail Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No Transaksi</th>
                        <td><span id="id_masuk"></span></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><span id="barang"></span></td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td><span id="nama"></span></td>
                    </tr>
                    <tr>
                        <th>Harga Beli</th>
                        <td>Rp. <span id="harga"></span></td>
                    </tr>
                    <tr>
                        <th>Jumlah Masuk</th>
                        <td><span id="jumlah_masuk"></span></td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td>Rp. <span id="total_harga"></span></td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td><span id="tanggal_masuk"></span></td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td><span id="user"></span></td>
                    </tr>                 
                </table>
            </div>
        </div>
    </div>
</div>