<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Edit User
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <form action="<?= base_url('user/ubahuser'); ?>" method="post">
                        <div class="row form-group">
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm 9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                                    </div>
                                    <input name="nama" type="text" class="form-control" placeholder="Masukan Nama" value="<?= $users['user']; ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm 9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $users['id_user']; ?>">
                                    <input name="email" type="text" class="form-control" placeholder="Masukan Email" value="<?= $users['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2 col-form-label" for="role">Role</label>
                            <div class="col-sm 9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                                    </div>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Pilih Role</option>
                                        <?php
                                        foreach ($role as $r) {
                                            if ($r == $users['role_id']) {
                                                echo "<option value='$r'selected>$r</option>";
                                            } else {
                                                echo "<option value='$r'>$r</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>