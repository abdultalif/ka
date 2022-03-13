<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Supplier</h5>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>

            <button data-toggle="modal" data-target="#addsupp" class="btn btn-secondary mb-3"><i class="fa fa-plus"></i> Tambah Supplier </button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($supplier as $s) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['no_telp']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#editsupp<?= $s['id_supplier']; ?>" class="badge badge-warning fa fa-edit">Ubah</button>
                                    <a href="<?= base_url('supplier/hapus/') . $s['id_supplier']; ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $s['nama']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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

<!-- Modal Tambah -->
<div class="modal fade" id="addsupp" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('supplier'); ?>" method="post">
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($supplier as $s) {
?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editsupp<?= $s['id_supplier']; ?>" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newStudentModalLabel">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('supplier/ubah'); ?>" method="post">
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="hidden" name="id" value="<?= $s['id_supplier']; ?>">
                            <input type="text" name="nama" class="form-control" value="<?= $s['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="text" name="no" class="form-control" value="<?= $s['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat"><?= $s['alamat']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>