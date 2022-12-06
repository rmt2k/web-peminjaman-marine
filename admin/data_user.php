<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../fungsi/logout.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah_user"><i class="fa-solid fa-file-circle-plus"></i> Tambah User </button>
            <hr>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data User
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'user' ");
                            while ($du = mysqli_fetch_array($data_user)) {
                                $id_user = $du['id_user'];
                                $username = $du['username'];
                                $role = $du['role'];
                                $password = $du['password'];
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $username; ?></td>
                                    <td><?= $role; ?></td>
                                    <td><?= $password; ?></td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block mx-auto">
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $id_user; ?>" type="button">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $id_user; ?>" type="button">Delete <i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal Edit -->
                                <div class="modal" id="edit<?= $id_user; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit User</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="user" value="<?= $id_user; ?>">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="role" class="form-label">Role</label>
                                                        <input type="text" class="form-control" id="role" name="role" value="<?= $role; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="text" class="form-control" id="password" name="password" value="<?= $password; ?>">
                                                    </div>
                                                    <!-- Hidden Input -->
                                                    <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                    <!-- Button -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="edit_user">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Delete -->
                                <div class="modal" id="delete<?= $id_user; ?>">
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
                                                    <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                    <br>
                                                    <h4 class="modal-title text-center">
                                                        Apakah anda yakin ingin menghapus <?= $username; ?> ?
                                                    </h4>
                                                    <!-- Hidden Input -->
                                                    <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                    <!-- Button  Modal Delete -->
                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
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
    <!-- Modal Tambah User -->
    <div class="modal" id="tambah_user">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="myInput" name="password" required>
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>
                        <!-- Hidden Input -->
                        <input type="hidden" name="role" value="user">
                        <input type="hidden" name="role" value="<?= $id_user; ?>">
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                        <div class="modal-footer">
                            <button type="submit" name="tambah_user" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah User -->
    <?php
    require_once("footer.php")
    ?>