<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Barang</h1>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Edit Barang
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <form action="<?=  base_url('data/ubahbarang'); ?>" method="post">
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="nama_satuan">Nama Barang</label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" value="<?= $barang['id_barang']; ?>">
                                <input value="<?= $barang['barang']; ?>" name="nama" type="text" class="form-control">
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="kategori">Kategori</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select name="kategori" class="custom-select">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) { 
                                            if ( $k['id_kategori'] == $barang['id_kategori']) {
                                                echo "<option value='$k[id_kategori]'selected>$k[nama_kategori]</option>";
                                            } else {
                                                echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
                                            }
                                        } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" href="<?= base_url('data'); ?>"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="satuan">Satuan</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select name="satuan" class="custom-select">
                                        <option value="" selected disabled>Pilih Satuan</option>
                                        <?php foreach ($satuan as $s) { 
                                            if ( $s['id_satuan'] == $barang['id_satuan']) {
                                                echo "<option value='$s[id_satuan]'selected>$s[satuan]</option>";
                                            } else {
                                                echo "<option value='$s[id_satuan]'>$s[satuan]</option>";
                                            }
                                        } ?>
                                    </select>
                                    <div class="input-group-append">
                                        <a class="btn btn-primary" href="<?= base_url('data/satuan'); ?>"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                                <?= form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right" for="harga">Harga</label>
                            <div class="col-md-9">
                                <input value="<?= $barang['harga']; ?>" name="harga" type="text" class="form-control">
                                <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>