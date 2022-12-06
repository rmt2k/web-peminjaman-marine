<?php
// Menanggapi Pinjaman
if (isset($_POST["tanggapi"])) {
    if (beri_respon($_POST) > 0) {
        echo "<script>
        alert('Berhasil Ditanggapi');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Ditanggapi');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    }
}
function beri_respon($beri_respon)
{
    global $koneksi;

    $id_pinjaman = $beri_respon['id_pinjaman'];
    $status_pinjam = $beri_respon['status_pinjam'];
    $komentar = $beri_respon['komentar'];

    $tanggapi = " UPDATE data_pinjaman SET 
    
    status_pinjam = '$status_pinjam',
    komentar = '$komentar'

    WHERE id_pinjaman = $id_pinjaman
    
    ";

    mysqli_query($koneksi, $tanggapi);

    return mysqli_affected_rows($koneksi);
}

// Menambahkan Riwayat
if (isset($_POST["tanggapi"])) {
    if (tambah_riwayat($_POST) > 0) {
        echo "<script>
        alert('Berhasil Ditanggapi');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    } else {
        return false;
    }
}
function tambah_riwayat($beri_riwayat)
{
    global $koneksi;

    $id_barang = $beri_riwayat['id_barang'];
    $nama_barang = $beri_riwayat['nama_barang'];
    $serial_number = $beri_riwayat['serial_number'];
    $part_number = $beri_riwayat['part_number'];
    $nama_owner = $beri_riwayat['nama_owner'];
    $kondisi_barang = $beri_riwayat['kondisi_barang'];
    $lokasi_barang = $beri_riwayat['lokasi_barang'];
    $jumlah_pinjam = $beri_riwayat['jumlah_pinjam'];
    $mulai_pinjam = $beri_riwayat['mulai_pinjam'];
    $selesai_pinjam = $beri_riwayat['selesai_pinjam'];
    $id_user = $beri_riwayat['id_user'];
    $username = $beri_riwayat['username'];
    $status_pinjam = $beri_riwayat['status_pinjam'];
    $komentar = $beri_riwayat['komentar'];
    $gambar_barang = $beri_riwayat['gambar_barang'];

    $tambah_riwayat = " INSERT INTO riwayat_peminjaman VALUES ('', '$id_barang', '$nama_barang', '$serial_number', '$part_number', '$nama_owner','$kondisi_barang', '$lokasi_barang', '$jumlah_pinjam', '$mulai_pinjam', '$selesai_pinjam', '$id_user','$username','$status_pinjam','$komentar','$gambar_barang')";

    mysqli_query($koneksi, $tambah_riwayat);

    return mysqli_affected_rows($koneksi);
}
