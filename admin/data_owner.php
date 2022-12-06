<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Owner</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../fungsi/logout.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Owner</li>
            </ol>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah_owner"><i class="fa-solid fa-file-circle-plus"></i> Tambah Owner </button>
            <hr>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Owner
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Owner</th>
                                <th>Jabatan</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Owner</th>
                                <th>Jabatan</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_owner = mysqli_query($koneksi, "SELECT * FROM data_owner");
                            while ($do = mysqli_fetch_array($data_owner)) {
                                $id_owner = $do['id_owner'];
                                $nama_owner = $do['nama_owner'];
                                $jabatan = $do['jabatan'];
                                $no_tlp = $do['no_tlp'];
                                $alamat = $do['alamat'];
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $nama_owner; ?></td>
                                    <td><?= $jabatan; ?></td>
                                    <td><?= $no_tlp; ?></td>
                                    <td><?= $alamat; ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block mx-auto">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $id_owner; ?>" type="button">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $id_owner; ?>" type="button">Delete <i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal" id="edit<?= $id_owner; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Owner</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_owner" value="<?= $id_owner; ?>">
                                                    <div class="mb-3">
                                                        <label for="nama_owner" class="form-label">Nama Owner</label>
                                                        <input type="text" class="form-control" id="nama_owner" name="nama_owner" value="<?= $nama_owner; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jabatan" class="form-label">Jabatan</label>
                                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $jabatan; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="no_tlp" class="form-label">No Telepon</label>
                                                        <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $no_tlp; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                                                    </div>
                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="edit_owner">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete -->
                                <div class="modal" id="delete<?= $id_owner; ?>">
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
                                                    <input type="hidden" name="id_owner" value="<?= $id_owner; ?>">
                                                    <br>
                                                    <h4 class="modal-title text-center">
                                                        Apakah anda yakin ingin menghapus owner <?= $nama_owner; ?> ?
                                                    </h4>
                                                    <br>
                                                    <br>
                                                    <!-- Button  Modal Delete -->
                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete_owner" class="btn btn-danger">Delete</button>
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
    <!-- Modal Tambah Owner -->
    <div class="modal" id="tambah_owner">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Owner</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_owner" name="nama_owner" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telepon</label>
                            <input type="number" class="form-control" id="no_tlp" name="no_tlp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="tambah_owner" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Owner -->
    <?php
    require_once("footer.php")
    ?>