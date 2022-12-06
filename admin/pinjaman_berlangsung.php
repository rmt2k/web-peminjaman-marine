<?php
require_once("header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-group">
                    <div class="card">
                        <div class="col-sm-12">
                            <div class="product-details mr-2">
                                <br>
                                <h6 class="mb-0">Events Calendar</h6>
                                <br>
                                <div class="container">
                                    <div id="calendar">
                                        <script>
                                            $(document).ready(function() {
                                                var calendar = $('#calendar').fullCalendar({
                                                    editable: true,
                                                    header: {
                                                        left: 'prev,next today',
                                                        center: 'title',
                                                        right: 'month,agendaWeek,agendaDay'
                                                    },
                                                    events: '../admin/kalender.php',
                                                    selectable: true,
                                                    selectHelper: true,
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Mulai Pinjam</th>
                                        <th>Selesai Pinjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Mulai Pinjam</th>
                                        <th>Selesai Pinjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $data_pinjaman = mysqli_query($koneksi, "SELECT * FROM data_pinjaman");
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
                                        $jumlah_barang = $dp['jumlah_barang'];
                                        $peminjam = $dp['username'];
                                        $status_pinjam = $dp['status_pinjam'];
                                        $kondisi_barang = $dp['kondisi_barang'];
                                        $mulai_pinjam = $dp['mulai_pinjam'];
                                        $selesai_pinjam = $dp['selesai_pinjam'];
                                        $komentar = $dp['komentar'];
                                        $gambar_barang = $dp['gambar_barang'];
                                        $kembali = $jumlah_barang + $jumlah_pinjam;
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $username; ?></td>
                                            <td><?= $nama_barang; ?></td>
                                            <td><?= $mulai_pinjam; ?></td>
                                            <td><?= $selesai_pinjam; ?></td>
                                            <td><button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#rincian<?= $id_pinjaman; ?>'>Rincian</button></td>
                                        </tr>
                                </tbody>
                                <!-- Modal Rincian -->
                                <div class="modal" id="rincian<?= $id_pinjaman; ?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="text-center">Anda Yakin Ingin Menyelesaikan Pinjaman?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <!-- Kanan -->
                                                                <div class="project-info-box">
                                                                    <p><b>Peminjam : </b><?= $username; ?></p>
                                                                    <p><b>Nama Barang : </b><?= $nama_barang; ?></p>
                                                                    <p><b>Serial Number : </b> <?= $serial_number; ?></p>
                                                                    <p><b>Part Number : </b><?= $part_number; ?></p>
                                                                    <p><b>Jumlah Pinjaman : </b><?= $jumlah_pinjam; ?></p>
                                                                    <p><b>Owner : </b><?= $nama_owner; ?></p>
                                                                    <p><b>Kondisi Barang : </b><?= $kondisi_barang; ?></p>
                                                                    <p class="mb-0"><b>Mulai Pinjam : </b> <?= $mulai_pinjam; ?></p><br>
                                                                    <p class="mb-0"><b>Selesai Pinjam : </b> <?= $selesai_pinjam; ?></p>
                                                                </div>
                                                            </div>
                                                            <!-- Kiri -->
                                                            <div class="col-md-7">
                                                                <br><br><br>
                                                                <center><img class="zoomable card-image" src="../admin/img/<?php echo $gambar_barang ?>" alt="project-image"></center>
                                                                <br><br><br><br>
                                                            </div>
                                                            <!-- Hidden Input -->
                                                            <input id="kembali" name="kembali" type="hidden" value="<?= $kembali; ?>">

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

                                                            <input type="hidden" name="status_pinjam" value="<?= $status_pinjam; ?>">

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="akhiri_pinjaman">Submit</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                </form>

                                                <!-- /Respond -->
                                            </div><!-- / Detail -->
                                        </div><!-- / column Kanan -->
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </table>
            </div>
        </div>
</div>
</div>
</div>
</main>
<?php
require_once("footer.php")
?>