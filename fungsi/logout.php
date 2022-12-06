<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['role']);

session_destroy();
echo "<script>alert('Logout Berhasil');document.location='../login.php'</script>";
