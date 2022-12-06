<?php
include '../fungsi/koneksi.php';

$tampil = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE status_pinjam = 'Setuju' ");

$dataArr = array();
while ($data = mysqli_fetch_array($tampil)) {
    $dataArr[] = array(
        'id' => $data['id_pinjaman'],
        'title' => $data['username'] . " " . $data['nama_barang'],
        'start' => $data['mulai_pinjam'],
        'end' => $data['selesai_pinjam'],
    );
}

echo json_encode($dataArr);
