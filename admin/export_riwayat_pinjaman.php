<?php

require '../fungsi/function.php';

?>
<html>

<head>
    <title>Riwayat Pinjaman</title>
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
        <a href="riwayat_pinjaman.php" type="button" class="btn btn-secondary">Kembali</a>
        <br>
        <h2>Riwayat Pinjaman</h2>

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
                        <th>Kondisi Barang</th>
                        <th>Lokasi Barang</th>
                        <th>Jumlah Pinjam</th>
                        <th>Mulai Pinjam</th>
                        <th>Selesai Pinjam</th>
                        <th>Status Pinjam</th>
                        <th>Komentar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $riwayat = mysqli_query($koneksi, "SELECT * FROM riwayat_peminjaman");
                    while ($row = mysqli_fetch_array($riwayat)) {
                        $id_riwayat_pinjaman = $row['id_riwayat_pinjaman'];
                        $id_barang = $row['id_barang'];
                        $nama_barang = $row['nama_barang'];
                        $serial_number = $row['serial_number'];
                        $part_number = $row['part_number'];
                        $nama_owner = $row['nama_owner'];
                        $kondisi_barang = $row['kondisi_barang'];
                        $lokasi_barang = $row['lokasi_barang'];
                        $jumlah_pinjaman = $row['jumlah_pinjaman'];
                        $mulai_pinjam = $row['mulai_pinjam'];
                        $selesai_pinjam = $row['selesai_pinjam'];
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $status_pinjam = $row['status_pinjam'];
                        $komentar = $row['komentar'];
                    ?>



                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $username; ?></td>
                            <td><?= $nama_barang; ?></td>
                            <td><?= $serial_number; ?></td>
                            <td><?= $part_number; ?> </td>
                            <td><?= $nama_owner; ?></td>
                            <td><?= $kondisi_barang; ?></td>
                            <td><?= $lokasi_barang; ?></td>
                            <td><?= $jumlah_pinjaman; ?></td>
                            <td><?= $mulai_pinjam; ?></td>
                            <td><?= $selesai_pinjam; ?></td>
                            <td><?= $status_pinjam; ?></td>
                            <td><?= $komentar; ?></td>
                        </tr>
                    <?php } ?>
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