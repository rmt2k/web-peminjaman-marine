<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pinjaman Masuk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="dashboard_admin.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Pinjaman Masuk</li>
            </ol>
            <hr>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Barang
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
                                <th>Jumlah Pinjam</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                <th>Jumlah Pinjam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $iduser = $_SESSION['id_user'];
                            $data_pinjaman = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE id_user = $iduser ");
                            while ($dp = mysqli_fetch_array($data_pinjaman)) {
                                $id_pinjaman = $dp['id_pinjaman'];
                                $id_barang = $dp['id_barang'];
                                $id_user = $dp['id_user'];
                                $username = $dp['username'];
                                $nama_barang = $dp['nama_barang'];
                                $serial_number = $dp['serial_number'];
                                $part_number = $dp['part_number'];
                                $nama_owner = $dp['nama_owner'];
                                $lokasi_barang = $dp['lokasi_barang'];
                                $jumlah_pinjam = $dp['jumlah_pinjam'];
                                $peminjam = $dp['username'];
                                $status_pinjam = $dp['status_pinjam'];
                                $kondisi_barang = $dp['kondisi_barang'];
                                $mulai_pinjam = $dp['mulai_pinjam'];
                                $selesai_pinjam = $dp['selesai_pinjam'];
                                $komentar = $dp['komentar'];
                                $gambar_barang = $dp['gambar_barang'];
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $peminjam; ?></td>
                                    <td><?= $nama_barang; ?></td>
                                    <td><?= $serial_number; ?></td>
                                    <td><?= $part_number; ?></td>
                                    <td><?= $nama_owner; ?></td>
                                    <td><?= $jumlah_pinjam; ?></td>
                                    <td>
                                        <center>
                                            <?php if ($status_pinjam == 'Pending') {
                                                echo "<span class='badge bg-secondary'>Pending</span>";
                                            } else if ($status_pinjam == 'Setuju') {
                                                echo "<span class='badge bg-success'>Accepted</span>";
                                            } else if ($status_pinjam == 'Tolak') {
                                                echo "<span class='badge bg-danger'>Rejected</span>";
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            $pending = "pending";
                                            $setuju = "setuju";
                                            $tolak = "tolak";
                                            $ip = $dp['id_pinjaman'];
                                            $acc = $setuju . $ip;
                                            $rjct = $tolak . $ip;
                                            $pndg = $pending . $ip;
                                            if ($status_pinjam == 'Pending') {
                                                echo "<button class='btn btn-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#$pndg'><i class='fa-solid fa-file-circle-plus'></i>Rincian</button>
                                                          ";
                                            } else if ($status_pinjam == 'Setuju') {
                                                echo "<button class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#$acc'><i class='fa-solid fa-file-circle-plus'></i>Rincian</button>
                                                          </button>
                                                          ";
                                            } else if ($status_pinjam == 'Tolak') {
                                                echo "<button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#$rjct'><i class='fa-solid fa-file-circle-plus'></i>Rincian</button>
                                                </button>
                                                          ";
                                            } ?>
                                        </center>
                                    </td>
                                </tr>
                                <!-- Modal Pending -->
                                <div class="modal" id="pending<?= $ip; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Beri Tanggapan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $nama_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= $serial_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="part_number" class="form-label">Part Number</label>
                                                        <input type="text" class="form-control" id="part_number" name="part_number" value="<?= $part_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Nama Owner</label>
                                                        <input type="text" class="form-control" id="form-control" name="nama_owner" value="<?= $nama_owner; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Kondisi Barang</label>
                                                        <input type="text" class="form-control" id="form-control" name="kondisi_barang" value="<?= $kondisi_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_pinjam" class="form-label">Jumlah Pinjam</label>
                                                        <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="<?= $jumlah_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mulai_pinjam" class="form-label">Mulai Pinjam</label>
                                                        <input type="text" class="form-control" id="mulai_pinjam" name="mulai_pinjam" value="<?= $mulai_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="selesai_pinjam" class="form-label">Selesai Pinjam</label>
                                                        <input type="text" class="form-control" id="selesai_pinjam" name="selesai_pinjam" value="<?= $selesai_pinjam; ?>" disabled>
                                                    </div>
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <div class="card">
                                                        <center><img class="zoomable card-image" src="../admin/img/<?= $gambar_barang; ?>" alt="project-image"></center>
                                                    </div>
                                                    <!-- HIDDEN INPUT -->
                                                    <input id="id_pinjaman" name="id_pinjaman" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="id_barang" name="id_barang" type="hidden" value="<?= $id_barang; ?>">

                                                    <input id="nama_barang" name="nama_barang" type="hidden" value="<?= $nama_barang; ?>">

                                                    <input id="serial_number" name="serial_number" type="hidden" value="<?= $serial_number; ?>">

                                                    <input id="part_number" name="part_number" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="nama_owner" name="nama_owner" type="hidden" value="<?= $nama_owner; ?>">

                                                    <input id="kondisi_barang" name="kondisi_barang" type="hidden" value="<?= $kondisi_barang; ?>">

                                                    <input id="lokasi_barang" name="lokasi_barang" type="hidden" value="<?= $lokasi_barang; ?>">

                                                    <input id="jumlah_pinjam" name="jumlah_pinjam" type="hidden" value="<?= $jumlah_pinjam; ?>">

                                                    <input id="jumlah_barang" name="jumlah_barang" type="hidden" value="<?= $jumlah_barang; ?>">

                                                    <input id="mulai_pinjam" name="mulai_pinjam" type="hidden" value="<?= $mulai_pinjam; ?>">

                                                    <input id="selesai_pinjam" name="selesai_pinjam" type="hidden" value="<?= $selesai_pinjam; ?>">

                                                    <input id="id_user" name="id_user" type="hidden" value="<?= $id_user; ?>">

                                                    <input id="username" name="username" type="hidden" value="<?= $username; ?>">

                                                    <input type="hidden" name="gambar_barang" value="<?= $gambar_barang; ?>">

                                                    <!-- HIDDEN INPUT -->

                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Setuju -->
                                <div class="modal" id="setuju<?= $ip; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Rincian Disetujui</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $nama_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= $serial_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="part_number" class="form-label">Part Number</label>
                                                        <input type="text" class="form-control" id="part_number" name="part_number" value="<?= $part_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Nama Owner</label>
                                                        <input type="text" class="form-control" id="form-control" name="nama_owner" value="<?= $nama_owner; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Kondisi Barang</label>
                                                        <input type="text" class="form-control" id="form-control" name="kondisi_barang" value="<?= $kondisi_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Jumlah Pinjam</label>
                                                        <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="<?= $jumlah_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Mulai Pinjam</label>
                                                        <input type="text" class="form-control" id="mulai_pinjam" name="mulai_pinjam" value="<?= $mulai_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Selesai Pinjam</label>
                                                        <input type="text" class="form-control" id="selesai_pinjam" name="selesai_pinjam" value="<?= $selesai_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="card">
                                                        <center><img class="zoomable card-image" src="../admin/img/<?= $gambar_barang; ?>" alt="project-image"></center>
                                                    </div>
                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="status_pinjam" class="form-label">Status Pinjaman</label>
                                                        <input type="text" class="form-control" id="status_pinjam" name="status_pinjam" value="<?= $status_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Komentar</label>
                                                        <input type="text" class="form-control" id="komentar" name="komentar" value="<?= $komentar; ?>" disabled>
                                                    </div>
                                                    <br>
                                                    <!-- HIDDEN INPUT -->
                                                    <input id="id_pinjaman" name="id_pinjaman" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="id_barang" name="id_barang" type="hidden" value="<?= $id_barang; ?>">

                                                    <input id="nama_barang" name="nama_barang" type="hidden" value="<?= $nama_barang; ?>">

                                                    <input id="serial_number" name="serial_number" type="hidden" value="<?= $serial_number; ?>">

                                                    <input id="part_number" name="part_number" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="nama_owner" name="nama_owner" type="hidden" value="<?= $nama_owner; ?>">

                                                    <input id="kondisi_barang" name="kondisi_barang" type="hidden" value="<?= $kondisi_barang; ?>">

                                                    <input id="lokasi_barang" name="lokasi_barang" type="hidden" value="<?= $lokasi_barang; ?>">

                                                    <input id="jumlah_pinjam" name="jumlah_pinjam" type="hidden" value="<?= $jumlah_pinjam; ?>">

                                                    <input id="jumlah_barang" name="jumlah_barang" type="hidden" value="<?= $jumlah_barang; ?>">

                                                    <input id="mulai_pinjam" name="mulai_pinjam" type="hidden" value="<?= $mulai_pinjam; ?>">

                                                    <input id="selesai_pinjam" name="selesai_pinjam" type="hidden" value="<?= $selesai_pinjam; ?>">

                                                    <input id="id_user" name="id_user" type="hidden" value="<?= $id_user; ?>">

                                                    <input id="username" name="username" type="hidden" value="<?= $username; ?>">

                                                    <input type="hidden" name="gambar_barang" value="<?= $gambar_barang; ?>">

                                                    <!-- HIDDEN INPUT -->

                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Tolak -->
                                <div class="modal" id="tolak<?= $ip; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Rincian Penolakan</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $nama_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= $serial_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="part_number" class="form-label">Part Number</label>
                                                        <input type="text" class="form-control" id="part_number" name="part_number" value="<?= $part_number; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Nama Owner</label>
                                                        <input type="text" class="form-control" id="form-control" name="nama_owner" value="<?= $nama_owner; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Kondisi Barang</label>
                                                        <input type="text" class="form-control" id="form-control" name="kondisi_barang" value="<?= $kondisi_barang; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Jumlah Pinjam</label>
                                                        <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" value="<?= $jumlah_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Mulai Pinjam</label>
                                                        <input type="text" class="form-control" id="mulai_pinjam" name="mulai_pinjam" value="<?= $mulai_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Selesai Pinjam</label>
                                                        <input type="text" class="form-control" id="selesai_pinjam" name="selesai_pinjam" value="<?= $selesai_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="card">
                                                        <center><img class="zoomable card-image" src="../admin/img/<?= $gambar_barang; ?>" alt="project-image"></center>
                                                    </div>
                                                    <br>
                                                    <div class="mb-3">
                                                        <label for="status_pinjam" class="form-label">Status Pinjaman</label>
                                                        <input type="text" class="form-control" id="status_pinjam" name="status_pinjam" value="<?= $status_pinjam; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Alasan Penolakan</label>
                                                        <input type="text" class="form-control" id="komentar" name="komentar" value="<?= $komentar; ?>" disabled>
                                                    </div>
                                                    <br>
                                                    <!-- HIDDEN INPUT -->
                                                    <input id="id_pinjaman" name="id_pinjaman" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="id_barang" name="id_barang" type="hidden" value="<?= $id_barang; ?>">

                                                    <input id="nama_barang" name="nama_barang" type="hidden" value="<?= $nama_barang; ?>">

                                                    <input id="serial_number" name="serial_number" type="hidden" value="<?= $serial_number; ?>">

                                                    <input id="part_number" name="part_number" type="hidden" value="<?= $id_pinjaman; ?>">

                                                    <input id="nama_owner" name="nama_owner" type="hidden" value="<?= $nama_owner; ?>">

                                                    <input id="kondisi_barang" name="kondisi_barang" type="hidden" value="<?= $kondisi_barang; ?>">

                                                    <input id="lokasi_barang" name="lokasi_barang" type="hidden" value="<?= $lokasi_barang; ?>">

                                                    <input id="jumlah_pinjam" name="jumlah_pinjam" type="hidden" value="<?= $jumlah_pinjam; ?>">

                                                    <input id="jumlah_barang" name="jumlah_barang" type="hidden" value="<?= $jumlah_barang; ?>">

                                                    <input id="mulai_pinjam" name="mulai_pinjam" type="hidden" value="<?= $mulai_pinjam; ?>">

                                                    <input id="selesai_pinjam" name="selesai_pinjam" type="hidden" value="<?= $selesai_pinjam; ?>">

                                                    <input id="id_user" name="id_user" type="hidden" value="<?= $id_user; ?>">

                                                    <input id="username" name="username" type="hidden" value="<?= $username; ?>">

                                                    <input type="hidden" name="gambar_barang" value="<?= $gambar_barang; ?>">

                                                    <!-- HIDDEN INPUT -->

                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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