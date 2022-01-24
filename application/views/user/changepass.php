<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                <?= $judul; ?>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label" for="nama">Current Password</label>
                            <div class="col-sm 10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-lock"></i></span>
                                    </div>
                                    <input name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama">
                                </div>
                                <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label" for="nama">New Password</label>
                            <div class="col-sm 10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-lock"></i></span>
                                    </div>
                                    <input name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru">
                                </div>
                                <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 col-form-label" for="nama">Confirm Password</label>
                            <div class="col-sm 10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-sign-in-alt"></i></span>
                                    </div>
                                    <input name="confirm" id="confirm" type="password" class="form-control" placeholder="Confirm Password">
                                </div>
                                <?= form_error('confirm', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>