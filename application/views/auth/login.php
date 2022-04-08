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
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Login!!</h1>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('email', '<div class="pl-3">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('password', '<div class="pl-3">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-user btn-block">
                                        Masuk
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>