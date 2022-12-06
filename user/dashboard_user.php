<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <?php
        $iduser = $_SESSION["id_user"];
        $count_pinjaman_masuk = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_pinjaman WHERE status_pinjam = 'Pending' AND id_user = $iduser ");
        $cpm = mysqli_fetch_assoc($count_pinjaman_masuk);

        $count_pinjaman_setuju = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_pinjaman WHERE status_pinjam = 'Setuju' AND id_user = $iduser ");
        $cps = mysqli_fetch_assoc($count_pinjaman_setuju);

        $count_pinjaman_ditolak = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_pinjaman WHERE status_pinjam = 'Tolak' AND id_user = $iduser");
        $cpd = mysqli_fetch_assoc($count_pinjaman_ditolak);

        $count_total_barang = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_barang");
        $ctb = mysqli_fetch_assoc($count_total_barang);

        ?>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <br>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Pinjaman Pending
                            <p>Total : <?php echo $cpm['total'] ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="../user/data_pinjaman.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Pinjaman Disetujui
                            <p>Total : <?php echo $cps['total'] ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="../user/data_pinjaman.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Pinjaman Ditolak
                            <p>Total : <?php echo $cpd['total'] ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="../user/data_pinjaman.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Data Barang
                            <p>Total : <?php echo $ctb['total'] ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="../user/data_barang.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once("footer.php")
    ?>