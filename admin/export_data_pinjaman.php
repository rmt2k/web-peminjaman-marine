<?php

require '../fungsi/function.php';

?>
<html>

<head>
    <title>Data Pinjaman Masuk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <br>
        <h2>Export Pinjaman Masuk</h2>
        <br>
        <a href="pinjaman_masuk.php" type="button" class="btn btn-secondary">Kembali</a>
        <hr>
        <div class="data-tables datatable-dark">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peminjam</th>
                        <th>Nama Barang</th>
                        <th>Serial Number</th>
                        <th>Part Number</th>
                        <th>Owner</th>
                        <th>Jumlah Pinjam</th>
                        <th>Status Pinjam</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $data_reservasi = mysqli_query($koneksi, "SELECT * FROM data_pinjaman");
                    while ($row = mysqli_fetch_array($data_reservasi)) {

                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td><?= $row["nama_barang"]; ?></td>
                            <td><?= $row["serial_number"]; ?></td>
                            <td><?= $row["part_number"]; ?> </td>
                            <td><?= $row["nama_owner"]; ?></td>
                            <td><?= $row["jumlah_pinjam"]; ?></td>
                            <td><?= $row["status_pinjam"]; ?></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    </table>

    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>