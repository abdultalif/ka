<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    Digital Strategist
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>Nicole Pearson</b></h2>
                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="<?= base_url('assets/img/' . $user['image']); ?>" alt="" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="#" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> View Profile
                        </a>
                    </div>
                </div>
            </div>


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