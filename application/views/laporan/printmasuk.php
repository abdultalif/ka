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
				<th>Supplier</th>
				<th>Harga Beli</th>
				<th>Jumlah Masuk</th>
				<th>Satuan</th>
				<th>Total Harga</th>
				<th>Tanggal Masuk</th>
				<th>User</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$total = 0;
			foreach ($filterm as $f) {
				$total += $f['total_harga'];
			?>
				<tr>
					<th><?= $no++; ?></th>
					<td><?= $f['id_masuk']; ?></td>
					<td><?= $f['barang']; ?></td>
					<td><?= $f['nama']; ?></td>
					<td>Rp. <?= number_format($f['harga_beli']); ?></td>
					<td><?= $f['jumlah_masuk']; ?></td>
					<td><?= $f['satuan']; ?></td>
					<td>Rp. <?= number_format($f['total_harga']); ?></td>
					<td><?= $f['tanggal_masuk']; ?></td>
					<td><?= $f['user']; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>

</html>