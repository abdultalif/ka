<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-bottom-secondary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                                Form Laporan Barang
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('laporan/stok'); ?>" method="post">
                        <div class="form-group row">
                            <label for="dari tanggal" class="col-sm-3 col-form-label">Dari Tanggal</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="dari" id="dari" type="date" class="form-control">
                                </div>
                                <?= form_error("dari", "<small class='text-danger'>", "</small>"); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sampai tanggal" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-calendar-alt"></i></span>
                                    </div>
                                    <input name="sampai" id="sampai" type="date" class="form-control">
                                </div>
                                <?= form_error("sampai", "<small class='text-danger'>", "</small>"); ?>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Laporan Stok</legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stok" id="stok" value="Barang Masuk">
                                        <label class="form-check-label" for="stok">
                                            Barang Masuk
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="stok" id="stok" value="Barang keluar">
                                        <label class="form-check-label" for="stok">
                                            Barang keluar
                                        </label>
                                    </div>
                                    <?= form_error("stok", "<small class='text-danger'>", "</small>"); ?>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row form-group">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-file-pdf"></i> Cetak</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>