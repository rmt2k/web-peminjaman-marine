<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1>Data Barang</h1>
            <div class="card mb-4">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="text" name="cari" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        </div>
                    </form>
                </nav>
                <div class="card-header">
                    <div class="container" style="margin-top:50px;">
                        <div class="row">
                            <?php
                            $no = 1;
                            $data_barang = mysqli_query($koneksi, "SELECT * FROM data_barang LIMIT 8");
                            if (isset($_GET['cari'])) {
                                $data_barang = mysqli_query($koneksi, "SELECT * FROM data_barang WHERE 
                                nama_barang LIKE '%" . $_GET['cari'] . "%' OR 
                                serial_number LIKE '%" . $_GET['cari'] . "%' OR 
                                part_number LIKE '%" . $_GET['cari'] . "%' OR 
                                nama_owner LIKE '%" . $_GET['cari'] . "%' OR 
                                lokasi_barang LIKE '%" . $_GET['cari'] . "%' OR 
                                kondisi_barang LIKE '%" . $_GET['cari'] . "%' OR 
                                jumlah_barang LIKE '%" . $_GET['cari'] . "%' OR
                                gambar_barang LIKE '%" . $_GET['cari'] . "%'
                                ");
                            }
                            while ($row = mysqli_fetch_array($data_barang)) {
                            ?>
                                <div class="col-md-3">
                                    <div class="card-sl">
                                        <div class="card-image">
                                            <img class="zoomable card-image" src="../admin/img/<?php echo $row['gambar_barang'] ?>" alt="">
                                        </div>
                                        <div class="card-heading">
                                            <?= $row["nama_barang"]; ?>
                                        </div>
                                        <div class="card-text">
                                            Part Number : <?= $row["serial_number"]; ?>
                                            <br>
                                            Serial Number : <?= $row["part_number"]; ?>
                                        </div>
                                        <div class="card-text">
                                            Qty : <?= $row["jumlah_barang"]; ?>
                                        </div>
                                        <a href="#" class="card-button" data-bs-toggle="modal" data-bs-target="#pinjam<?= $row["id_barang"]; ?>"> Pinjam Barang</a>
                                    </div>
                                    <br>
                                </div>
                            <?php } ?>
                            <?php
                            $no = 1;
                            $db = mysqli_query($koneksi, "SELECT * FROM data_barang");
                            while ($row = mysqli_fetch_array($db)) {
                            ?>
                                <!-- Modal Pinjam Barang -->
                                <div class="modal" id="pinjam<?= $row["id_barang"]; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Pinjam Barang</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $row["nama_barang"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Serial Number</label>
                                                        <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?= $row["serial_number"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Part Number</label>
                                                        <input type="text" class="form-control" id="part_number" name="part_number" value="<?= $row["part_number"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Owner</label>
                                                        <input type="text" class="form-control" id="nama_owner" name="nama_owner" value="<?= $row["nama_owner"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Kondisi Barang</label>
                                                        <input type="text" class="form-control" id="kondisi_barang" name="kondisi_barang" value="<?= $row["kondisi_barang"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Lokasi Barang</label>
                                                        <input type="text" class="form-control" id="lokasi_barang" name="lokasi_barang" value="<?= $row["lokasi_barang"]; ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Peminjam</label>
                                                        <input class="form-control" id="username" name="username" type="text" value="<?= $_SESSION['username'] ?>" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Mulai Pinjam</label>
                                                        <input type="date" class="form-control" id="mulai_pinjam" name="mulai_pinjam" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Selesai Pinjam</label>
                                                        <input type="date" class="form-control" id="selesai_pinjam" name="selesai_pinjam" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah Pesanan</label>
                                                        <input type="number" min="1" max="<?= $row["jumlah_barang"]; ?>" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" required>
                                                    </div>
                                                    <input id="id_user" name="id_user" type="hidden" value="<?= $_SESSION['id_user'] ?>">
                                                    <!-- Hidden Input -->
                                                    <input id="id_barang" name="id_barang" type="hidden" value="<?= $row['id_barang']; ?>">

                                                    <input id="id_user" name="id_user" type="hidden" value="<?= $_SESSION['id_user'] ?>">

                                                    <input id="nama_barang" name="nama_barang" type="hidden" value="<?= $row['nama_barang'] ?>">

                                                    <input id="serial_number" name="serial_number" type="hidden" value="<?= $row['serial_number'] ?>">

                                                    <input id="part_number" name="part_number" type="hidden" value="<?= $row['part_number'] ?>">

                                                    <input id="nama_owner" name="nama_owner" type="hidden" value="<?= $row["nama_owner"]; ?>">

                                                    <input id="kondisi_barang" name="kondisi_barang" type="hidden" value="<?= $row["kondisi_barang"]; ?>">

                                                    <input id="lokasi_barang" name="lokasi_barang" type="hidden" value="<?= $row["lokasi_barang"]; ?>">

                                                    <input id="username" name="username" type="hidden" value="<?= $_SESSION['username'] ?>">

                                                    <input id="status_pinjam" name="status_pinjam" type="hidden" value="Pending">

                                                    <input id="jumlah_barang" name="jumlah_barang" type="hidden" value="<?= $row['jumlah_barang']; ?>">

                                                    <input id="gambar_barang" name="gambar_barang" type="hidden" value="<?= $row["gambar_barang"]; ?>">

                                                    <!-- End Hidden Input -->
                                                    <div class="modal-footer">
                                                        <button type="submit" name="pinjam_barang" class="btn btn-primary">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                                <!-- Modal footer -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Pinjam Barang -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php
    require_once("footer.php")
    ?>