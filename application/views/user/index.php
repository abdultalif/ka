<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">User Management</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Data User</h5>
        </div>
        <div class="card-body">
            <div class="pesan-sukses" data-sukses="<?= $this->session->flashdata('sukses'); ?>"></div>
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-sm btn-primary mb-3 btn-icon-split">
                <span class="icon">
                    <i class="fa fa-user-plus"></i>
                </span>
                <span class="text">
                    Input User
                </span>
            </a>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $u) {
                            if ($u['role_id']  != 'Owner') {
                        ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><img width="50" src="<?= base_url('assets/img/') . $u['image'];  ?>"></td>
                                    <td><?= $u['user']; ?></td>
                                    <td><?= $u['email']; ?></td>
                                    <td><?= $u['role_id']; ?></td>
                                    <td>
                                        <?php
                                        if ($u['is_active'] == 1) { ?>
                                            <a href="<?= base_url('user/activeuser/') . $u['id_user']; ?>" class="badge badge-success" title="<?= $u['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                        <?php
                                        } else { ?>
                                            <a href="<?= base_url('user/activeuser/') . $u['id_user']; ?>" class="badge badge-secondary" title="<?= $u['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <a href="<?= base_url('user/ubahuser/') . $u['id_user']; ?>" class="badge badge-warning"><i class="fa fa-user-edit"></i></a>
                                        <a href="<?= base_url('user/hapususer/') . $u['id_user']; ?>" class="badge badge-dark" id="data-hapus"><i class="fa fa-trash-alt"></i></a>
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
<!-- /.container-fluid -->