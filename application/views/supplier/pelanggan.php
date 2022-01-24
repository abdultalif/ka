<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <button data-toggle="modal" data-target="#addpelanggan" class="btn btn-primary mb-3">Tambah Pelanggan </button>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pelanggan</th>
                            <th>Gender</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Pelanggan</th>
                            <th>Gender</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($pelanggan as $p) {
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['jk']; ?></td>
                            <td><?= $p['no_telp']; ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td>    
                                <button data-toggle="modal" data-target="#editsupp<?= $p['id_pelanggan']; ?>" class="badge badge-warning fa fa-edit">Ubah</button>
                                <a href="<?= base_url('supplier/hapuspelanggan/') . $p['id_pelanggan']; ?>" class="badge badge-danger" onclick="return confirm('Hapus <?= $p['nama']; ?> ??')"><i class="fa fa-trash-alt"></i> Hapus</a>
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
<div class="modal fade" id="addpelanggan" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('supplier/pelanggan'); ?>" method="post">
                    <div class="form-group">
                        <label>pelanggan</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="jk" class="form-control">
                            <option value="">Pilih Gender</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
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







<?php foreach ($pelanggan as $p) {
?>
<!-- Modal Edit -->
<div class="modal fade" id="editsupp<?= $p['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Edit Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('supplier/ubahpelanggan'); ?>" method="post">
                <div class="form-group">
                        <label>pelanggan</label>
                        <input type="hidden" name="id" value="<?= $p['id_pelanggan']; ?>">
                        <input type="text" name="nama" class="form-control" value="<?= $p['nama']; ?>">
                    </div>
                    <?php $jk = ['Pria', 'Wanita']; ?>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="jk" class="form-control">
                            <option value="">Pilih Gender</option>
                            <?php
                                foreach ($jk as $j) {
                                    if ($j == $p['jk']) {
                                        echo "<option value='$j'selected>$j</option>";
                                    } else {
                                        echo "<option value='$j'>$j</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telp" class="form-control" value="<?= $p['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat"><?= $p['alamat']; ?></textarea>
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