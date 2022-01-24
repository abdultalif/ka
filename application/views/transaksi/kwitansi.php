<html mozNoMarginBoxes mozDisallowSelectionPrint>

<head>
    <title><?= $judul; ?></title>

    <style typa="text/css">
        html {
            font-family: "verdana, arial";
        }

        .content {
            width: 120mm;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 5px;
            padding-bottom: 10px;
            border-bottom: 1px dashed;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            padding-top: 10px;
            font-size: 11px;
            text-align: center;
            border-top: 1px dashed;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }

        table tr td {
            vertical-align: text-top;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <b>Warung Ali</b>
            <br>
            <small>Jl. Bojong Mentang, Ciomas. Bogor</small><br>
            <small>Telp. 08954567765434</small>
        </div>


        <div class="head">
            <table cellspacong="0" cellpadding="0">
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td style="width:120px"><?= $detail['tanggal']; ?>, <?= $detail['waktu']; ?></td>
                    <td>Kasir</td>
                    <td style="text-align:center;">:</td>
                    <td style="text-align:right"><?= $detail['user']; ?></td>
                </tr>
                <tr>
                    <td>Invoice</td>
                    <td>:</td>
                    <td><?= $detail['invoice']; ?></td>
                    <td>Pelanggan</td>
                    <td style="text-align:center;">:</td>
                    <td style="text-align:right"><?= $detail['nama']; ?></td>
                </tr>
            </table>
        </div>

        <div class="transaction">
            <table class="transaction-table" cellspacong="0" cellpadding="0">
                <tr>
                    <td style="min-width: 130px">Kode Barang</td>
                    <td style="min-width: 130px">Nama Barang</td>
                    <td style="text-align:center;">Harga</td>
                    <td style="text-align:right;">Jml</td>
                    <td style="text-align:right;">Satuan</td>
                    <td style="text-align:right;">Total</td>
                </tr>

                <tr>
                    <td colspan="6" style="border-bottom:1px dashed; padding-top:5px;"></td>
                </tr>
                <?php
                foreach ($detail_transaksi as $d) {
                ?>
                    <tr>
                        <td><?= $d['id_barang']; ?></td>
                        <td style="text-align:left;"><?= $d['barang']; ?></td>
                        <td style="text-align:center;"><?= number_format($d['harga']); ?><br>
                        <td style="text-align:center;"><?= $d['jumlah']; ?></td>
                        <td style="text-align:center;"><?= $d['satuan']; ?></td>
                        <td style="text-align:right;"><?= number_format($d['total_harga']);; ?></td>
                    </tr>
                <?php
                }
                ?>

                <tr>
                    <td colspan="5" style="border-top:1px dashed; text-align:right; padding: 5px 0"><b>Total Belanja</b></td>
                    <td style="border-top:1px dashed; text-align:right; padding: 5px 0"><b><?= number_format($d['total']); ?></b></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;"><b>Tunai</b></td>
                    <td style="text-align:right;"><b><?= number_format($d['bayar']); ?></b></td>
                </tr>
                <tr>
                    <td colspan="5" style="border-top:1px dashed; text-align:right; padding: 5px 0"><b>Kembalian</b></td>
                    <td style="border-top:1px dashed; text-align:right; padding: 5px 0"><b><?= number_format($d['kembalian']); ?></b></td>
                </tr>
                <tr>
                    <td style="text-align:left;"><b><?= $d_transaksi; ?> Items Barang</b></td>
                </tr>

            </table>
        </div>
        <div class="thanks">
            <b>Terima Kasih, Silahkan datang kembali.</b>
        </div>
    </div>
</body>

</html>