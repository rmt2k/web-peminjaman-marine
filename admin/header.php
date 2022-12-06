<?php
session_start();
//include "cekuser.php";
include "../fungsi/koneksi.php";
require "../fungsi/function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .zoomable {
            width: 200px;
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
    </style>
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/jquery-ui.min.js"></script>
    <script src="../assets/moment.min.js"></script>
    <script src="../assets/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="../assets/fullcalendar.css">
    <link rel="stylesheet" href="../assets/bootstrap.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['username']; ?> </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../fungsi/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Kelola Barang & User</div>
                        <a class="nav-link" href="data_barang.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            Data Barang
                        </a>
                        <a class="nav-link" href="data_owner.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Data Owner
                        </a>
                        <a class="nav-link" href="data_user.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data User
                        </a>
                        <div class="sb-sidenav-menu-heading">Kelola Pinjaman</div>
                        <a class="nav-link" href="pinjaman_masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Data Pinjaman
                        </a>
                        <a class="nav-link" href="pinjaman_berlangsung.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Pinjaman Berlangsung
                        </a>
                        <a class="nav-link" href="riwayat_pinjaman.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                            Riwayat Pinjaman
                        </a>
                    </div>
                </div>
            </nav>
        </div>