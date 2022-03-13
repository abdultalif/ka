<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Daftar Menjadi Member!</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth/registrasi'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('nama', '<div class="pl-3">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('email', '<div class="pl-3">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?= form_error('password1') ? 'is-invalid' : ''; ?>" id="password1" name="password1" placeholder="Password">
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= form_error('password1', '<div class="pl-3">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user <?= form_error('password2') ? 'is-invalid' : ''; ?>" id="password2" name="password2" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-user btn-block">
                                        Daftar Menjadi Member
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small text-secondary" href="<?= base_url('auth'); ?>">Sudah Menjadi Member? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>