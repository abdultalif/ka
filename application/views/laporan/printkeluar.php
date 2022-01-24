<!DOCTYPE html>
<html>

<head>
    <title><?= $judul; ?></title>
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
                <th>No Transaksi</th>
                <th>Nama Barang</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
                <th>Tanggal Keluar</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($filterk as $f) {
            ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $f['id_keluar']; ?></td>
                    <td><?= $f['barang']; ?></td>
                    <td><?= $f['jumlah_keluar']; ?></td>
                    <td><?= $f['keterangan']; ?></td>
                    <td><?= $f['tanggal_keluar']; ?></td>
                    <td><?= $f['user']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>