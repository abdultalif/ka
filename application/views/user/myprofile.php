<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-lg-8">



            <?= $this->session->flashdata('pesan'); ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/' . $user['image']); ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['user']; ?></h5>
                            <p class="card-text"><?= $user['email']; ?> <span class="badge badge-<?= ($user['role_id'] == 'Admin') ? 'success' : 'warning' ?>"><?= $user['role_id']; ?></span></p>

                            <p class="card-text"><small class="text-muted">Join Since <?= date('d F Y', $user['tanggal_input']); ?></small></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->