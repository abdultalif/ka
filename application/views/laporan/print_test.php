<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-container {
            display: flex;
            flex-wrap: wrap;
        }

        .table-container table {
            width: 100%;
            border: 1px solid #000;
            margin-bottom: 20px;
        }
        .table {
            width: 30%;
            float:right;
            border: 1px, solid, #000 
        }
    </style>
</head>
<body>
    <h2>Laporan Transaksi</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2023-06-25</td>
                    <td>Produk A</td>
                    <td>5</td>
                    <td>$10</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2023-06-25</td>
                    <td>Produk B</td>
                    <td>3</td>
                    <td>$15</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2023-06-26</td>
                    <td>Produk C</td>
                    <td>2</td>
                    <td>$20</td>
                </tr>
            </tbody>
        </table>
    </div>
        <table class="table">
            <tbody>
                <tr>
                    <td>Total:</td>
                    <td>$50</td>
                </tr>
                <tr>
                    <td>Bayar:</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>Kembalian:</td>
                    <td>$50</td>
                </tr>
            </tbody>
        </table>
</body>
</html>
