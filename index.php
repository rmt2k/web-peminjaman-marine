<?php
include "fungsi/koneksi.php";
require "fungsi/function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .zoomable {
            width: 300px;
            height: 200px;
        }

        .zoomable:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }

        .modalgede {
            width: 300px;
        }

        .modalgede:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }


        /* Card Styles */

        .card-sl {
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .card-image img {
            max-height: 100%;
            max-width: 100%;
            border-radius: 8px 8px 0px 0;
        }

        .card-action {
            position: relative;
            float: right;
            margin-top: -25px;
            margin-right: 20px;
            z-index: 2;
            color: #E26D5C;
            background: #fff;
            border-radius: 100%;
            padding: 15px;
            font-size: 15px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
        }

        .card-action:hover {
            color: #fff;
            background: #E26D5C;
            -webkit-animation: pulse 1.5s infinite;
        }

        .card-heading {
            font-size: 18px;
            font-weight: bold;
            background: #fff;
            padding: 10px 15px;
        }

        .card-text {
            padding: 10px 15px;
            background: #fff;
            font-size: 14px;
            color: #636262;
        }

        .card-button {
            display: flex;
            justify-content: center;
            padding: 10px 0;
            width: 100%;
            background-color: #1F487E;
            color: #fff;
            border-radius: 0 0 8px 8px;
        }

        .card-button:hover {
            text-decoration: none;
            background-color: #1D3461;
            color: #fff;

        }


        @-webkit-keyframes pulse {
            0% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
            }

            70% {
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-transform: scale(1);
                transform: scale(1);
                box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
            }

            100% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
                box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
            }
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    </nav>
    <div id="layoutSidenav_content">
        <br><br><br>
        <main>
            <div class="container-fluid">
                <center>
                    <h1>Data Barang</h1>
                </center>
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
                                                <img class="zoomable card-image" src="admin/img/<?php echo $row['gambar_barang'] ?>" alt="">
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
                                                    <h4 class="modal-title">Maaf</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <br>
                                                    <h6 class="text-center">Silahkan Login Untuk Melanjutkan Peminjaman</h6>
                                                    <br>
                                                    <center><a href="login.php" type="button" class="btn btn-primary">Login</a></center>
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
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>