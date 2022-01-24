<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Riwayat Data Barang Keluar</h5>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('stok/tambah_keluar') ?>" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Input Barang Masuk</a>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Keluar</th>
                            <th>Keterangan</th>
                            <th>Tanggal Keluar</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($barang_k as $k) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $k['id_keluar']; ?></td>
                            <td><?= $k['barang']; ?></td>
                            <td><?= $k['jumlah_keluar']; ?></td>
                            <td><?= $k['keterangan']; ?></td>
                            <td><?= $k['tanggal_keluar']; ?></td>
                            <td><?= $k['user']; ?></td>
                            <td>
                                <a href="<?= base_url('stok/hapus_keluar/') . $k['id_keluar'] . '/' . $k['id_barang']  ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $k['barang']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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
