<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>
  <button onclick="showTable()">Tampilkan Tabel</button>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    function showTable() {
      const data = <?php echo json_encode($users); ?>;

      let table = '<table><thead><tr><th>ID</th><th>Nama</th><th>Usia</th></tr></thead><tbody>';

      data.forEach(row => {
        table += `<tr><th>${row.id}</th><th>${row.nama}</th><th>${row.usia}</th></tr>`;
      });

      table += '</tbody></table>';

      Swal.fire({
        title: '<?php echo $title; ?>',
        html: table,
        showCloseButton: true,
        showConfirmButton: false,
        customClass: {
          content: 'table-alert',
        },
      });
    }
  </script>

  <style>
    .table-alert table {
      width: 100%;
      border-collapse: collapse;
    }

    .table-alert th,
    .table-alert td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .table-alert th {
      background-color: #f2f2f2;
    }
  </style>
</body>
</html>
