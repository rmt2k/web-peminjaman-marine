<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_wpb");

// Fungsi Tambah Owner
if (isset($_POST["tambah_owner"])) {
    if (tambah_data_owner($_POST) > 0)
        echo "<script>
                alert('Owner Baru berhasil ditambahkan');
                document.location.href = '../admin/data_owner.php';
            </script>";
    else {
        echo "Gagal";
    }
}

function tambah_data_owner($data_owner)
{
    global $koneksi;

    $nama_owner = $data_owner["nama_owner"];
    $jabatan = $data_owner["jabatan"];
    $no_tlp = $data_owner["no_tlp"];
    $alamat = $data_owner["alamat"];

    $query = "INSERT INTO data_owner VALUES ('', '$nama_owner', '$jabatan', '$no_tlp', '$alamat')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi Edit Owner
if (isset($_POST["edit_owner"])) {
    if (edit_data_owner($_POST) > 0)
        echo "<script>
                alert('Owner berhasil diubah');
                document.location.href = '../admin/data_owner.php';
            </script>";
    else {
        echo "Gagal";
    }
}
function edit_data_owner($data_owner)
{
    global $koneksi;

    $id_owner = $data_owner["id_owner"];
    $nama_owner = $data_owner["nama_owner"];
    $jabatan = $data_owner["jabatan"];
    $no_tlp = $data_owner["no_tlp"];
    $alamat = $data_owner["alamat"];

    $query = "UPDATE data_owner SET 
    nama_owner = '$nama_owner', 
    jabatan = '$jabatan', 
    no_tlp = '$no_tlp', 
    alamat = '$alamat'
    
    WHERE id_owner = '$id_owner' 
    ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
// Fungsi Delete Owner
if (isset($_POST["delete_owner"])) {

    if (delete_data_owner($_POST) > 0)
        echo "<script>
                alert('Owner berhasil Dihapus');
                document.location.href = '../admin/data_owner.php';
            </script>";
    else {
        echo "<script>
        alert('Owner Gagal Dihapus');
        document.location.href = '../admin/data_owner.php';
    </script>";
    }
}
function delete_data_owner($data_owner)
{
    global $koneksi;

    $id_owner = $data_owner["id_owner"];

    mysqli_query($koneksi, "DELETE FROM data_owner WHERE id_owner = '$id_owner' ");

    return mysqli_affected_rows($koneksi);
}
// Menambah Barang Baru
if (isset($_POST["tambah_barang"])) {
    if (tambah_data_barang($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = '../admin/data_barang.php';
        </script>";
    } else {
        return false;
    }
}
function upload()
{
    $nama_gambar = $_FILES['gambar_barang']['name'];
    $ukuran_gambar = $_FILES['gambar_barang']['size'];
    $error = $_FILES['gambar_barang']['error'];
    $tmp_gambar = $_FILES['gambar_barang']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('Masukkan Gambar');
        document.location.href = '../admin/data_barang.php';
        </script>";
        return false;
    }
    // Cek Gambar Valid
    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    $ekstensi_gambar = explode('.', $nama_gambar);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
        echo "<script>
            alert('Format Gambar anda tidak di dukung');
            document.location.href = '../admin/data_barang.php';
            </script>";
        return false;
    }
    // Cek Ukuran Gambar
    if ($ukuran_gambar > 5000000) {
        echo "<script>
        alert('Ukuran Terlalu Besar');
        document.location.href = '../admin/data_barang.php';
        </script>";
        return false;
    }
    // Generate Nama Baru
    $nama_gambar_baru = uniqid();
    $nama_gambar_baru .= '.';
    $nama_gambar_baru .= $ekstensi_gambar;

    move_uploaded_file($tmp_gambar, 'img/' . $nama_gambar_baru);

    return $nama_gambar_baru;
}


function tambah_data_barang($data_barang)
{
    global $koneksi;

    $nama_barang = $data_barang['nama_barang'];
    $serial_number = $data_barang['serial_number'];
    $part_number = $data_barang['part_number'];
    $owner = $data_barang['owner'];
    $lokasi_barang = $data_barang['lokasi_barang'];
    $kondisi_barang = $data_barang['kondisi_barang'];
    $jumlah_barang = $data_barang['jumlah_barang'];
    // Upload Gambar
    $gambar_barang = upload();
    if (!$gambar_barang) {
        return false;
    }

    $tambah_data_barang = " INSERT INTO data_barang VALUES ('', '$nama_barang', '$serial_number','$part_number', '$owner', '$lokasi_barang', '$kondisi_barang', '$jumlah_barang', '$gambar_barang')";

    mysqli_query($koneksi, $tambah_data_barang);

    return mysqli_affected_rows($koneksi);
}
// Mengubah data Barang 
if (isset($_POST["edit_barang"])) {
    if (ubah_data_barang($_POST) > 0) {
        echo "<script>
        alert('Data Berhasil Diubah');
        document.location.href = '../admin/data_barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Mengubah Data');
        document.location.href = '../admin/data_barang.php';
        </script>";
    }
}

function ubah_data_barang($data_barang)
{
    global $koneksi;

    $id_barang = $data_barang["id_barang"];
    $nama_barang = $data_barang['nama_barang'];
    $serial_number = $data_barang['serial_number'];
    $part_number = $data_barang['part_number'];
    $nama_owner = $data_barang['nama_owner'];
    $lokasi_barang = $data_barang['lokasi_barang'];
    $kondisi_barang = $data_barang['kondisi_barang'];
    $jumlah_barang = $data_barang['jumlah_barang'];
    $gambar_barang_lama = $data_barang['gambar_barang_lama'];

    // Cek User input gambar baru atau tidak
    if ($_FILES['gambar_barang']['error'] === 4) {
        $gambar_barang = $gambar_barang_lama;
    } else {
        $gambar_barang = upload();
    }


    $ubah_data_barang = " UPDATE data_barang SET 
    
    nama_barang = '$nama_barang',
    serial_number = '$serial_number',
    part_number = '$part_number',
    nama_owner = '$nama_owner',
    lokasi_barang = '$lokasi_barang',
    kondisi_barang = '$kondisi_barang',
    jumlah_barang = '$jumlah_barang',
    gambar_barang = '$gambar_barang'

    WHERE id_barang = $id_barang

    ";

    mysqli_query($koneksi, $ubah_data_barang);

    return mysqli_affected_rows($koneksi);
}
// Menghapus Barang
if (isset($_POST['hapus_barang'])) {

    $id_barang = $_POST['id_barang'];

    $hapus_barang = mysqli_query($koneksi, " DELETE FROM data_barang WHERE id_barang = '$id_barang' ");

    if ($hapus_barang) {
        echo "<script>
        alert('Data Berhasil Dihapus');
        document.location.href = '../admin/data_barang.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Menghapus Data');
        document.location.href = '../admin/data_barang.php';
        </script>";
    }
}
// Membuat Pinjaman
if (isset($_POST["pinjam_barang"])) {
    if (pinjam_barang($_POST) > 0) {
        echo "<script>
        alert('Order berhasil dibuat');
        document.location.href = '../user/data_barang.php';
        </script>";
    } else {
        return false;
    }
}
function pinjam_barang($pesan_barang)
{
    global $koneksi;

    $id_barang = $pesan_barang['id_barang'];
    $nama_barang = $pesan_barang['nama_barang'];
    $serial_number = $pesan_barang['serial_number'];
    $part_number = $pesan_barang['part_number'];
    $nama_owner = $pesan_barang['nama_owner'];
    $kondisi_barang = $pesan_barang['kondisi_barang'];
    $lokasi_barang = $pesan_barang['lokasi_barang'];
    $id_user = $pesan_barang['id_user'];
    $username = $pesan_barang['username'];
    $jumlah_pinjam = $pesan_barang['jumlah_pinjam'];
    $jumlah_barang = $pesan_barang['jumlah_barang'];
    $mulai_pinjam = $pesan_barang['mulai_pinjam'];
    $selesai_pinjam = $pesan_barang['selesai_pinjam'];
    $status_pinjam = $pesan_barang['status_pinjam'];
    $komentar = $pesan_barang['komentar'];
    $gambar_barang = $pesan_barang['gambar_barang'];

    $pinjam_barang = " INSERT INTO data_pinjaman VALUES ('', '$id_barang', '$nama_barang', '$serial_number', '$part_number', '$nama_owner','$kondisi_barang', '$lokasi_barang', '$jumlah_pinjam','$jumlah_barang', '$mulai_pinjam', '$selesai_pinjam', '$id_user','$username','$status_pinjam', '$komentar','$gambar_barang')";

    mysqli_query($koneksi, $pinjam_barang);

    return mysqli_affected_rows($koneksi);
}
// Respond Status by Admin
if (isset($_POST['tanggapi'])) {
    $id_pinjaman = $_POST['id_pinjaman'];
    $id_barang = $_POST['id_barang'];
    $status_pinjam = $_POST['status_pinjam'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $komentar = $_POST['komentar'];

    // Jika Ingin Di ACC
    $cek_total_barang = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE id_pinjaman = '$id_pinjaman' ");
    $ctb = mysqli_fetch_array($cek_total_barang);
    $a = $ctb['jumlah_barang'];

    $cek_total_pinjam = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE id_pinjaman = '$id_pinjaman' ");
    $ctp = mysqli_fetch_array($cek_total_pinjam);
    $b = $ctp['jumlah_pinjam'];

    $acc = $a - $b;
    // Jika Ingin Di Reject
    $cek_total_barang = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE id_pinjaman = '$id_pinjaman' ");
    $ctb = mysqli_fetch_array($cek_total_barang);
    $a = $ctb['jumlah_barang'];

    $cek_total_pinjam = mysqli_query($koneksi, "SELECT * FROM data_pinjaman WHERE id_pinjaman = '$id_pinjaman' ");
    $ctp = mysqli_fetch_array($cek_total_pinjam);
    $b = $ctp['jumlah_pinjam'];

    $reject = $a + 0;

    if ($_POST['status_pinjam'] == 'Setuju') {
        $update_acc = mysqli_query($koneksi, "UPDATE data_pinjaman SET status_pinjam ='$status_pinjam', jumlah_barang='$acc', komentar='$komentar' WHERE id_pinjaman = '$id_pinjaman' ");

        $update_acc = mysqli_query($koneksi, "UPDATE data_barang SET jumlah_barang ='$acc'  WHERE id_barang = '$id_barang' ");

        echo "<script>
        alert('Berhasil Ditanggapi');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    } else if ($_POST['status_pinjam'] == 'Tolak') {
        $update_status_tabel_order = mysqli_query($koneksi, "UPDATE data_pinjaman SET status_pinjam ='$status_pinjam', komentar='$komentar' WHERE id_pinjaman = '$id_pinjaman' ");

        $update_barang = mysqli_query($koneksi, "UPDATE data_barang SET jumlah_barang ='$reject'  WHERE id_barang = '$id_barang' ");

        echo "<script>
        alert('Berhasil Ditanggapi');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal');
        document.location.href = '../admin/pinjaman_masuk.php';
        </script>";
    }
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
// Selesai Pinjam
if (isset($_POST['akhiri_pinjaman']) == 1) {

    $id_pinjaman = $_POST['id_pinjaman'];
    $id_barang = $_POST['id_barang'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $kembali = $_POST['kembali'];

    // Hapus Di Pinjaman Berlangsung
    $akhiri_pinjaman = mysqli_query($koneksi, " DELETE FROM data_pinjaman WHERE id_pinjaman = '$id_pinjaman' ");

    // mengembalikan barang

    $kembalikanbarang = mysqli_query($koneksi, "UPDATE data_barang SET jumlah_barang='$kembali' WHERE id_barang= '$id_barang'");


    if ($akhiri_pinjaman && $kembalikanbarang) {
        echo "<script>
        alert('Pinjaman Diakhiri');
        document.location.href = '../admin/pinjaman_berlangsung.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal');
        document.location.href = '../admin/pinjaman_berlangsung.php';
        </script>";
    }
}
// Fungsi Tambah User
if (isset($_POST["tambah_user"])) {
    if (tambah_data_user($_POST) > 0)
        echo "<script>
                alert('User Baru berhasil ditambahkan');
                document.location.href = '../admin/data_user.php';
            </script>";
    else {
        echo "Gagal";
    }
}
function tambah_data_user($data_user)
{
    global $koneksi;

    $username = $data_user["username"];
    $role = $data_user["role"];
    $password = $data_user["password"];

    $query = "INSERT INTO user VALUES ('', '$username', '$password', '$role')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi Edit User
if (isset($_POST["edit_user"])) {
    if (edit_data_user($_POST) > 0)
        echo "<script>
                alert('User berhasil diubah');
                document.location.href = '../admin/data_user.php';
            </script>";
    else {
        echo "Gagal";
    }
}
function edit_data_user($data_user)
{
    global $koneksi;

    $id_user = $data_user["id_user"];
    $username = $data_user["username"];
    $role = $data_user["role"];
    $password = $data_user["password"];

    $edit_user = "UPDATE user SET 

    username = '$username', 
    role = '$role', 
    password = '$password'
    
    WHERE id_user = '$id_user' 

    ";

    mysqli_query($koneksi, $edit_user);

    return mysqli_affected_rows($koneksi);
}
// Fungsi Delete Owner
if (isset($_POST["delete_user"])) {

    if (delete_data_user($_POST) > 0)
        echo "<script>
                alert('Owner berhasil Dihapus');
                document.location.href = '../admin/data_user.php';
            </script>";
    else {
        echo "<script>
        alert('Owner Gagal Dihapus');
        document.location.href = '../admin/data_user.php';
    </script>";
    }
}
function delete_data_user($data_user)
{
    global $koneksi;

    $id_user = $data_user["id_user"];

    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user' ");

    return mysqli_affected_rows($koneksi);
}
// Query Barang
function query_barang($query_barang)
{
    global $koneksi;
    $hasil_data_barang = mysqli_query($koneksi, $query_barang);
    $banyak_baris_barang = [];
    while ($baris_barang = mysqli_fetch_array($hasil_data_barang)) {
        $banyak_baris_barang[] = $baris_barang;
    }
    return $banyak_baris_barang;
}
