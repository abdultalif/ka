<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Barang Keluar</h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Input Barang Keluar
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('stok/keluar') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <form action="<?= base_url('stok/tambah_Keluar'); ?>" method="post">
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="id barang masuk">Id Barang Keluar</label>
                            <div class="col-md-6">
                                <input type="hidden" name="user" value="<?= $user['id_user']; ?>">
                                <input name="id" type="text" class="form-control" value="<?= $id_keluar; ?>" readonly>
                                <?= form_error('id', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="tanggal masuk">Tanggal Masuk</label>
                            <div class="col-md-6">
                                <input name="tanggal" readonly type="text" class="form-control" <?= date_default_timezone_set('asia/jakarta'); ?> value="<?php echo date('Y-m-d'); ?>">
                                <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="barang">Barang</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="text" name="barang" id="barang" class="form-control" readonly placeholder="Pilih Barang">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="stok">Stok</label>
                            <div class="col-md-6">
                                <input name="stok" id="stok" type="number" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="jumlah_keluar">Jumlah Keluar</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input name="jumlah_keluar" id="jumlah_keluar" type="number" onkeyup="kurang_stok();" class="form-control" placeholder="Jumlah Masuk...">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="satuan">Satuan</span>
                                    </div>
                                </div>
                                <?= form_error('jumlah_masuk', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="total stok">Total Stok</label>
                            <div class="col-md-6">
                                <input name="total_stok" id="total_stok" type="number" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="keterangan">keterangan Keluar</label>
                            <div class="col-md-6">
                                <textarea name="keterangan" class="form-control" cols="3" rows="3"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- modal Barang -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center" id="dataTable" cellspacing="0">
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
                                if ($b['stok'] > 0) {
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
                                            <button id="select" class="badge badge-info" data-id="<?= $b['id_barang']; ?>" data-barang="<?= $b['barang']; ?>" data-stok="<?= $b['stok']; ?>" data-satuan="<?= $b['satuan']; ?>"><i class="fa fa-check"></i> Pilih</button>
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
</div>