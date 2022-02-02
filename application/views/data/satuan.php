<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Satuan</h5>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <button data-toggle="modal" data-target="#addsatuan" class="btn btn-primary mb-3">Tambah Satuan</button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Satuan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($satuan as $s) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s['satuan']; ?></td>
                                <td>
                                    <button type="submit" data-toggle="modal" data-target="#editsatuan<?= $s['id_satuan']; ?>" class="badge badge-warning fa fa-edit">Ubah</button>
                                    <a href="<?= base_url('data/hapussat/') . $s['id_satuan']; ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $s['satuan']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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
<div class="modal fade" id="addsatuan" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('data/satuan'); ?>" method="post">
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control">
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


<?php foreach ($satuan as $s) {
?>
    <!-- Modal Edit -->
    <div class="modal fade" id="editsatuan<?= $s['id_satuan']; ?>" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newStudentModalLabel">Edit Satuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('data/ubahsatuan'); ?>" method="post">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="hidden" name="id" value="<?= $s['id_satuan']; ?>">
                            <input type="text" name="satuan" class="form-control" value="<?= $s['satuan']; ?>">
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