<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark text-center">Riwayat Transaksi</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="tabeltransaksi" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Tanggal</th>
                            <th>Pelanggan</th>
                            <th>Kasir</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($riwayat as $f) {
                            if ($this->session->userdata('user') == $f['user']) {
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $f['invoice']; ?></td>
                                    <td><i class="fa fa-calendar-alt"></i> <?= $f['tanggal']; ?> <?= $f['waktu'] ?></td>
                                    <td><?= $f['nama']; ?></td>
                                    <td><?= $f['user']; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail/') . $f['invoice']; ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="<?= base_url('transaksi/printbyid/') . $f['invoice']; ?>" class="btn btn-warning" target="blank"><i class="fa fa-print"></i></a>
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