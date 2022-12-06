<?php

//panggil koneksi database
include "koneksi.php";

$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST['password']);
$role = mysqli_escape_string($koneksi, $_POST['role']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and role ='$role'");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai

        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['id_user'] = $user_valid['id_user'];
        $_SESSION['role'] = $user_valid['role'];

        //uji role user
        if ($role == "admin") {
            echo "<script>alert('Login Berhasil');document.location='../admin/dashboard_admin.php'</script>";
        } elseif ($role == "user") {
            echo "<script>alert('Login Berhasil');document.location='../user/dashboard_user.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='../login.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='../login.php'</script>";
}
