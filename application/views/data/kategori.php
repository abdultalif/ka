<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Kategori</h5>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <button data-toggle="modal" data-target="#addkategori" class="btn btn-primary mb-3">Tambah Kategori </button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($kategori as $k) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $k['nama_kategori']; ?></td>
                            <td>    
                                <button data-toggle="modal" data-target="#editkategori<?= $k['id_kategori']; ?>" class="badge badge-warning fa fa-edit">Ubah</button>
                                <a href="<?= base_url('data/hapuskat/') . $k['id_kategori']; ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $k['nama_kategori']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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
<div class="modal fade" id="addkategori" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('data'); ?>" method="post">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control">
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



<?php foreach ($kategori as $k) {
?>
<!-- Modal Edit -->
<div class="modal fade" id="editkategori<?= $k['id_kategori']; ?>" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('data/ubahkategori'); ?>" method="post">
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="hidden" name="id" value="<?= $k['id_kategori']; ?>">
                        <input type="text" name="kategori" class="form-control" value="<?= $k['nama_kategori']; ?>">
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