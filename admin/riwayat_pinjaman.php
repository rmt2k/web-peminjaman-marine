<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Riwayat Pinjaman</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../fungsi/logout.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Riwayat Pinjaman</li>
            </ol>
            <a href="export_riwayat_pinjaman.php" class="btn btn-info btn-sm"><i class="fa-solid fa-download"></i>Export Riwayat Pinjaman</a>
            <hr>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Riwayat Pinjaman
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
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
                        <tfoot>
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
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $riwayat_peminjaman = mysqli_query($koneksi, "SELECT * FROM riwayat_peminjaman");
                            while ($rp = mysqli_fetch_array($riwayat_peminjaman)) {
                                $id_riwayat_pinjaman = $rp['id_riwayat_pinjaman'];
                                $id_barang = $rp['id_barang'];
                                $nama_barang = $rp['nama_barang'];
                                $serial_number = $rp['serial_number'];
                                $part_number = $rp['part_number'];
                                $nama_owner = $rp['nama_owner'];
                                $kondisi_barang = $rp['kondisi_barang'];
                                $lokasi_barang = $rp['lokasi_barang'];
                                $jumlah_pinjaman = $rp['jumlah_pinjaman'];
                                $mulai_pinjam = $rp['mulai_pinjam'];
                                $selesai_pinjam = $rp['selesai_pinjam'];
                                $status_pinjam = $rp['status_pinjam'];
                                $komentar = $rp['komentar'];
                                $username = $rp['username'];
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $username; ?></td>
                                    <td><?= $nama_barang; ?></td>
                                    <td><?= $serial_number; ?></td>
                                    <td><?= $part_number; ?></td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("footer.php")
    ?>