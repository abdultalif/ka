<!DOCTYPE html>
<html>

<head>
    <title><?= $judul; ?></title>
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .table tr th,
        .table tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table th {
            background-color: red;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center><?= $title; ?></center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Nama Kasir</th>
                <th>Pelanggan</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th>Tanggal</th>
                <th>Barang yg dibeli</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($filterbytanggal as $f) {
            ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $f['invoice']; ?></td>
                    <td><?= $f['user']; ?></td>
                    <td><?= $f['nama']; ?></td>
                    <td><?= $f['bayar']; ?></td>
                    <td><?= $f['kembalian']; ?></td>
                    <td><?= $f['tanggal']; ?></td>
                    <td>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah Beli</th>
                                    <th>Satuan</th>
                                    <th>Total</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail as $d) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $d['id_barang']; ?></td>
                                        <td><?= $d['barang']; ?></td>
                                        <td>Rp. <?= number_format($d['harga']); ?></td>
                                        <td><?= $d['jumlah']; ?></td>
                                        <td><?= $d['satuan']; ?></td>
                                        <td>Rp. <?= number_format($d['total_harga']); ?></td>
                                        <td><?= $d['user']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" style="text-align: right;"><b>Total Bayar</b></td>
                                    <td><b>Rp. <?= number_format($d['total']); ?></b></td>
                                    <td style="background:#ddd"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>