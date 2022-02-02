<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Barang</h5>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <button data-toggle="modal" data-target="#addbarang" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Barang </button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
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
                        $total = 0;
                        $no = 1;
                        foreach ($barang as $b) {
                            $total += $b['stok'];
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
                                    <a href="<?= base_url('data/ubahbarang/') . $b['id_barang']; ?>" class="badge badge-secondary"><i class="fa fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('data/hapusbarang/') . $b['id_barang']; ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $b['barang']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="text-right">Total Stok</th>
                            <th><?= $total; ?></th>
                            <th colspan="2" style="background-color : #ddd;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah -->
<div class="modal fade" id="addbarang" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('data/barang'); ?>" method="post">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="id" class="form-control" readonly value="<?= $id; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Barang">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <div class="input-group">
                            <input type="hidden" name="id_kategori" id="id_kategori">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Pilih Kategori" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalkategori"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_satuan" id="id_satuan">
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Pilih Satuan" readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalsatuan"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" placeholder="Harga Jual">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>