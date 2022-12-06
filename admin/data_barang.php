<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Barang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="dashboard_admin.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Owner</li>
            </ol>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah_barang"><i class="fa-solid fa-file-circle-plus"></i> Tambah Barang </button>
            <a href="export_data_barang.php" class="btn btn-info btn-sm"><i class="fa-solid fa-download"></i> Export Data Barang</a>
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
                                <th>Nama Barang</th>
                                <th>Serial Number</th>
                                <th>Part Number</th>
                                <th>Owner</th>
                                <th>Lokasi Barang</th>
                                <th>Kondisi Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Serial Number</th>
                                <th>Part Number</th>
                                <th>Owner</th>
                                <th>Lokasi Barang</th>
                                <th>Kondisi Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_barang = mysqli_query($koneksi, "SELECT * FROM data_barang");
                            while ($db = mysqli_fetch_array($data_barang)) {
                                $id_barang = $db['id_barang'];
                                $nama_barang = $db['nama_barang'];
                                $serial_number = $db['serial_number'];
                                $part_number = $db['part_number'];
                                $nama_owner = $db['nama_owner'];
                                $lokasi_barang = $db['lokasi_barang'];
                                $kondisi_barang = $db['kondisi_barang'];
                                $jumlah_barang = $db['jumlah_barang'];
                                $gambar_barang = $db['gambar_barang'];
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $nama_barang; ?></td>
                                    <td><?= $serial_number; ?></td>
                                    <td><?= $part_number; ?></td>
                                    <td><?= $nama_owner; ?></td>
                                    <td><?= $lokasi_barang; ?></td>
                                    <td><?= $kondisi_barang; ?></td>
                                    <td><?= $jumlah_barang; ?></td>
                                    <td><img class="zoomable" src="img/<?= $db["gambar_barang"]; ?>" alt=""></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-success btn-sm me-md" data-bs-toggle="modal" data-bs-target="#edit<?= $id_barang; ?>" type="button">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $id_barang; ?>" type="button">Delete <i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal" id="edit<?= $id_barang; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $nama_barang; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= $serial_number; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="part_number" class="form-label">Part Number</label>
                                                        <input type="text" class="form-control" id="part_number" name="part_number" value="<?= $part_number; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Nama Owner</label>
                                                        <select name="nama_owner" class="form-control">
                                                            <?php
                                                            $ambildataowner = mysqli_query($koneksi, "SELECT * FROM data_owner");
                                                            while ($fetcharray = mysqli_fetch_array($ambildataowner)) {
                                                                $nama_owner = $fetcharray['nama_owner'];
                                                                $id_owner = $fetcharray['id_owner'];
                                                                $jabatan_owner = $fetcharray['jabatan_owner'];

                                                            ?>

                                                                <option value="<?= $nama_owner; ?>"><?= $nama_owner; ?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="lokasi_barang" class="form-label">Lokasi Barang</label>
                                                        <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang" value="<?= $lokasi_barang; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Pilih Kondisi Barang</label>
                                                        <div class="form-label-group">
                                                            <select class="form-control" name="kondisi_barang">
                                                                <option value="Bagus">Bagus</option>
                                                                <option value="Rusak">Rusak</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                                        <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $jumlah_barang; ?>">
                                                    </div>
                                                    <label>Replace Image</label>
                                                    <center><img class="modalgede" id="preimage" width="200px"></center>
                                                    <script type="text/javascript">
                                                        function loadfile(event) {
                                                            var output = document.getElementById('preimage');
                                                            output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                    </script>
                                                    <br>
                                                    <input type="file" class="form-control" name="gambar_barang" onchange="loadfile(event)" value="<?= $row["gambar_barang"]; ?>">
                                                    <!-- HIDDEN INPUT -->
                                                    <input type="hidden" name="id_barang" value="<?= $id_barang; ?>">
                                                    <input type="hidden" name="gambar_barang_lama" value="<?= $db["gambar_barang"]; ?>">
                                                    <!-- HIDDEN INPUT -->
                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="edit_barang">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete -->
                                <div class="modal" id="delete<?= $id_barang; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal Heading</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_barang" value="<?= $id_barang; ?>">
                                                    <br>
                                                    <h4 class="modal-title text-center">
                                                        Apakah anda yakin ingin menghapus <?= $nama_barang; ?> ?
                                                    </h4>
                                                    <br>
                                                    <br>
                                                    <!-- Button  Modal Delete -->
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_barang" class="btn btn-danger">Delete</button>
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
    <!-- Modal Tambah Barang -->
    <div class="modal" id="tambah_barang">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Serial Number</label>
                            <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Part Number</label>
                            <input type="text" class="form-control" id="part_number" name="part_number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Owner</label>
                            <select name="owner" class="form-control">
                                <?php
                                $ambildataowner = mysqli_query($koneksi, "SELECT * FROM data_owner");
                                while ($ado = mysqli_fetch_array($ambildataowner)) {
                                    $id_owner = $ado['id_owner'];
                                    $nama_owner = $ado['nama_owner'];
                                ?>

                                    <option value="<?= $nama_owner; ?>"><?= $nama_owner; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Barang</label>
                            <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi Barang</label>
                            <select class="form-select" name="kondisi_barang" id="kondisi_barang">
                                <option value="Bagus">Bagus</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-group">Gambar</label>
                            <input type="file" class="form-control-file" id="gambar_barang" name="gambar_barang" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah_barang" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Barang -->
    <?php
    require_once("footer.php")
    ?>