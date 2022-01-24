<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row justify-content">
        <div class="col-md-7">
            <?= form_open_multipart('user/editprofile'); ?>
                <div class="row form-group">
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm 10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
                            </div>
                            <input name="email" id="email" value="<?= $user['email']; ?>" type="text" class="form-control">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 col-form-label" for="nama">Full Nama</label>
                    <div class="col-sm 10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input name="nama" id="nama" value="<?= $user['user']; ?>" type="text" class="form-control">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                        Gambar
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/img/') . $user['image']; ?> " class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-edit"></i> Edit</button>
                    </div>
                </div>
            </form>
              
        </div>
    </div>
</div>


