<?php

require '../fungsi/function.php';

?>
<html>

<head>
    <title>Data Barang</title>
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
        <a href="data_barang.php" type="button" class="btn btn-secondary">Kembali</a>
        <br>
        <h2>Data Barang</h2>

        <div class="data-tables datatable-dark">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Serial Number</th>
                        <th>Pemilik</th>
                        <th>Lokasi Barang</th>
                        <th>Kondisi Barang</th>
                        <th>Jumlah Barang</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $data_barang = mysqli_query($koneksi, "SELECT * FROM data_barang");
                    while ($row = mysqli_fetch_array($data_barang)) {
                        $id_barang = $row['id_barang'];
                        $nama_barang = $row['nama_barang'];
                        $serial_number = $row['serial_number'];
                        $part_number = $row['part_number'];
                        $nama_owner = $row['nama_owner'];
                        $lokasi_barang = $row['lokasi_barang'];
                        $kondisi_barang = $row['kondisi_barang'];
                        $jumlah_barang = $row['jumlah_barang'];
                        $gambar_barang = $row['gambar_barang'];
                    ?>



                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_barang"]; ?></td>
                            <td><?= $row["serial_number"]; ?></td>
                            <td><?= $row["nama_owner"]; ?></td>
                            <td><?= $row["lokasi_barang"]; ?> </td>
                            <td><?= $row["kondisi_barang"]; ?></td>
                            <td><?= $row["jumlah_barang"]; ?></td>
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