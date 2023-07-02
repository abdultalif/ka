<!-- Modal Kategori -->
<div class="modal fade" id="Modalkategori" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Daftar Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabelkategori" class="table table-bordered table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kategori as $k) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $k['nama_kategori']; ?></td>
                                <td>
                                    <button class="badge badge-info" id="btnkategori" data-id_kategori="<?= $k['id_kategori']; ?>" data-kategori="<?= $k['nama_kategori']; ?>"><i class="fa fa-check"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>




<!-- Modal Satuan -->
<div class="modal fade" id="Modalsatuan" tabindex="-1" aria-labelledby="newStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newStudentModalLabel">Daftar Satuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="tabelsatuan" class="table table-bordered table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($satuan as $s) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $s['satuan']; ?></td>
                                <td>
                                    <button id="satuan" class="badge badge-info" data-id_satuan="<?= $s['id_satuan']; ?>" data-satuan="<?= $s['satuan']; ?>"><i class="fa fa-check"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>








<!-- Footer -->
<footer class="sticky-footer bg-white mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; <a href="https://abdullt85.netlify.app/" target="_blank">Abdul Talif Parinduri</a> <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>


<script>
    if ($('.pesan-error').data('error')) {
        const flashData = $('.pesan-error').data('error');
        if (flashData) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: flashData,
            })
        }
    } else {
        const flashData = $('.pesan-sukses').data('sukses');
        if (flashData) {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: flashData,
            })
        }
    }

    $(document).on('click', '#data-hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Data ini dihapus ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });

    $(document).on('click', '#button-bayar', function(e) {
        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        Swal.fire({
            title: 'Apakah anda ingin melakukan transaksi ini ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-bayar').submit();
            }
        })
    })



    $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Logout?',
            text: "Apakah anda ingin Keluar??",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya, Saya ingin logout'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>


<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Total Transaksi",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "#5a5c69",
                pointHoverBorderColor: "#5a5c69",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($transaksi); ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: 5
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Barang Masuk", "Barang Keluar"],
            datasets: [{
                data: [<?= $barang_masuk; ?>, <?= $barang_keluar; ?>],
                backgroundColor: ['#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#17a673', '#a13228'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<script>
    $('#tabeltransaksi').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, 'ALL']
        ],
        responsive: true,
        initComplete: function() {
            this.api()
                .columns([2, 3, 4])
                .every(function() {
                    var column = this;
                    var title = column.footer().textContent;

                    // Create input element and add event listener
                    $('<input type="text" class="form-control" placeholder="Search ' + title + '" />')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change clear', function() {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
        },
        "language": {
            "lengthMenu": "_MENU_ baris perhalaman",
            "search": "Cari:",
            "zeroRecords": "Belum Ada Data",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data Masih Kosong",
            "infoFiltered": "(Disaring dari _MAX_ total data)",
            "paginate": {

                "first": "«",

                "last": "»",

                "next": "›",

                "previous": "‹"

            },

        }
    });

    $(document).ready(function() {
        $('#tabelsatuan').DataTable();
    });

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    $(document).ready(function() {
        $('#tabelsupplier').DataTable();
    });

    $(document).ready(function() {
        $('#databarang').DataTable();
    });

    $(document).ready(function() {
        $(document).on('click', '#tambahsupp', function() {
            var id_supplier = $(this).data('id_supplier');
            var supplier = $(this).data('supplier');
            $('#id_supplier').val(id_supplier);
            $('#supplier').val(supplier);
            $('#datasupplier').modal('hide');
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#btnkategori', function() {
            var id_kategori = $(this).data('id_kategori');
            var kategori = $(this).data('kategori');
            $('#id_kategori').val(id_kategori);
            $('#kategori').val(kategori);
            $('#Modalkategori').modal('hide');
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#satuan', function() {
            var id_satuan = $(this).data('id_satuan');
            var satuan = $(this).data('satuan');
            $('#id_satuan').val(id_satuan);
            $('#satuan').val(satuan);
            $('#Modalsatuan').modal('hide');
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            var id_masuk = $(this).data('id_masuk');
            var nama = $(this).data('nama');
            var user = $(this).data('user');
            var barang = $(this).data('barang');
            var jumlah_masuk = $(this).data('jumlah_masuk');
            var harga = $(this).data('harga');
            var total_harga = $(this).data('total_harga');
            var tanggal_masuk = $(this).data('tanggal_masuk');
            $('#id_masuk').text(id_masuk);
            $('#nama').text(nama);
            $('#user').text(user);
            $('#barang').text(barang);
            $('#jumlah_masuk').text(jumlah_masuk);
            $('#harga').text(harga);
            $('#total_harga').text(total_harga);
            $('#tanggal_masuk').text(tanggal_masuk);
        })
    })


    $(document).ready(function() {
        $(document).on('click', '#detailpen', function() {
            var invoice = $(this).data('invoice');
            var pelanggan = $(this).data('pelanggan');
            var tanggal = $(this).data('tanggal');
            var kasir = $(this).data('kasir');
            var total = $(this).data('total');
            var bayar = $(this).data('bayar');
            var kembalian = $(this).data('kembalian');
            var id_barang = $(this).data('id_barang');
            var barang = $(this).data('barang');
            var harga = $(this).data('harga');
            var jml = $(this).data('jml');
            var satuan = $(this).data('satuan');
            $('#invoice').text(invoice);
            $('#pelanggan').text(pelanggan);
            $('#tanggal').text(tanggal);
            $('#kasir').text(kasir);
            $('#total').text(total);
            $('#bayar').text(bayar);
            $('#kembalian').text(kembalian);
            $('#id_barang').text(id_barang);
            $('#barang').text(barang);
            $('#harga').text(harga);
            $('#jml').text(jml);
            $('#satuan').text(satuan);
        })
    })

    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_barang = $(this).data('id');
            var barang = $(this).data('barang');
            var stok = $(this).data('stok');
            var satuan = $(this).data('satuan')
            $('#id_barang').val(id_barang);
            $('#barang').val(barang);
            $('#stok').val(stok);
            $('#total_stok').val(stok);
            $('#satuan').html(satuan);
            $('.bd-example-modal-lg').modal('hide');
        })
    })


    function tambah_stok() {
        var jumlah_masuk = document.getElementById('jumlah_masuk').value;
        var stok = document.getElementById('stok').value;
        var tambah = parseInt(jumlah_masuk) + parseInt(stok);

        if (!isNaN(tambah)) {
            document.getElementById('total_stok').value = tambah;
        }
    }

    function kurang_stok() {
        var jumlah_keluar = document.getElementById('jumlah_keluar').value;
        var stok = document.getElementById('stok').value;
        var tambah = parseInt(stok) - parseInt(jumlah_keluar);

        if (!isNaN(tambah)) {
            document.getElementById('total_stok').value = tambah;
        }
    }

    function transaksi() {
        var total = document.getElementById('total').value;
        var bayar = document.getElementById('bayar').value;
        var kurang = parseInt(bayar) - parseInt(total);

        if (!isNaN(kurang)) {
            document.getElementById('kembali').value = kurang;
        }
    }
</script>

<script>
    const flashData = $('.flash-data').data('flashdata');
    console.log(flashData);
</script>

</body>

</html>