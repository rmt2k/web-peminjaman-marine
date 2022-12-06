-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 11:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `lokasi_barang` varchar(255) NOT NULL,
  `kondisi_barang` enum('Bagus','Rusak') NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `serial_number`, `part_number`, `nama_owner`, `lokasi_barang`, `kondisi_barang`, `jumlah_barang`, `gambar_barang`) VALUES
(6, 'Boyancy', 'BY-2322', 'BY-1', 'Roy', 'Marine Base', 'Bagus', 10, '6305ca62e9e87.jpg'),
(7, 'Life Work Vest', 'LWV-3223', 'LWV-1', 'Roy', 'Marine Base', 'Bagus', 20, '631830e973153.png'),
(8, 'Ring Buoy', 'RB-2311', 'RB-1', 'Roy', 'Marine Base', 'Bagus', 20, '63182f8c752c6.jpg'),
(9, 'Radio Kapal', 'RK-4322', 'RK-01', 'Budi', 'Marine Base', 'Bagus', 9, '631832810971f.jpg'),
(10, 'Lifebouy Light', 'LL-2123', 'LF-22', 'Roy', 'Marine Base', 'Bagus', 30, '631833036e6ef.png'),
(11, 'Body Harness', 'BH-1123', 'BH-Y-1', 'Budi', 'Marine Office', 'Bagus', 15, '6318351707a49.jpg'),
(12, 'Helm Safety', 'HS-1112', 'HS-Y-1', 'Roy', 'Marine Office', 'Bagus', 49, '631835ecb19db.jpg'),
(13, 'Safety Google', 'SG-1322', 'SG-B-12', 'Roy', 'Marine Office', 'Bagus', 49, '63183674a13d0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_owner`
--

CREATE TABLE `data_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_owner`
--

INSERT INTO `data_owner` (`id_owner`, `nama_owner`, `jabatan`, `no_tlp`, `alamat`) VALUES
(20, 'Roy', 'Kepala Gudang', '0895338502511', 'Batu Aji'),
(25, 'Budi', 'Kepala Gudang', '08132132313', 'Saguba');

-- --------------------------------------------------------

--
-- Table structure for table `data_pinjaman`
--

CREATE TABLE `data_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `kondisi_barang` enum('Bagus','Rusak') NOT NULL,
  `lokasi_barang` varchar(255) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `mulai_pinjam` date NOT NULL,
  `selesai_pinjam` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status_pinjam` enum('Pending','Setuju','Tolak') NOT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `gambar_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pinjaman`
--

INSERT INTO `data_pinjaman` (`id_pinjaman`, `id_barang`, `nama_barang`, `serial_number`, `part_number`, `nama_owner`, `kondisi_barang`, `lokasi_barang`, `jumlah_pinjam`, `jumlah_barang`, `mulai_pinjam`, `selesai_pinjam`, `id_user`, `username`, `status_pinjam`, `komentar`, `gambar_barang`) VALUES
(34, 12, 'Helm Safety', 'HS-1112', 'HS-Y-1', 'Roy', 'Bagus', 'Marine Office', 1, 49, '2022-09-08', '2022-09-10', 2, 'user', 'Setuju', 'tolong dijaga', '631835ecb19db.jpg'),
(35, 13, 'Safety Google', 'SG-1322', 'SG-B-12', 'Roy', 'Bagus', 'Marine Office', 1, 49, '2022-09-08', '2022-09-10', 2, 'user', 'Setuju', 'tolong dijaga', '63183674a13d0.jpg'),
(36, 9, 'Radio Kapal', 'RK-4322', 'RK-01', 'Budi', 'Bagus', 'Marine Base', 1, 9, '2022-09-08', '2022-09-12', 10, 'user2', 'Setuju', 'tolong dijaga', '631832810971f.jpg'),
(37, 11, 'Body Harness', 'BH-1123', 'BH-Y-1', 'Budi', 'Bagus', 'Marine Office', 1, 15, '2022-09-08', '2022-09-12', 10, 'user2', 'Tolak', 'akan digunakan untuk projek lain', '6318351707a49.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_peminjaman`
--

CREATE TABLE `riwayat_peminjaman` (
  `id_riwayat_pinjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `lokasi_barang` varchar(255) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `mulai_pinjam` date NOT NULL,
  `selesai_pinjam` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status_pinjam` enum('Setuju','Tolak') NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_peminjaman`
--

INSERT INTO `riwayat_peminjaman` (`id_riwayat_pinjaman`, `id_barang`, `nama_barang`, `serial_number`, `part_number`, `nama_owner`, `kondisi_barang`, `lokasi_barang`, `jumlah_pinjaman`, `mulai_pinjam`, `selesai_pinjam`, `user_id`, `username`, `status_pinjam`, `komentar`, `gambar_barang`) VALUES
(32, 12, 'Helm Safety', 'HS-1112', '34', 'Roy', 'Bagus', 'Marine Office', 1, '2022-09-08', '2022-09-10', 2, 'user', 'Setuju', 'tolong dijaga', '631835ecb19db.jpg'),
(33, 13, 'Safety Google', 'SG-1322', '35', 'Roy', 'Bagus', 'Marine Office', 1, '2022-09-08', '2022-09-10', 2, 'user', 'Setuju', 'tolong dijaga', '63183674a13d0.jpg'),
(34, 9, 'Radio Kapal', 'RK-4322', '36', 'Budi', 'Bagus', 'Marine Base', 1, '2022-09-08', '2022-09-12', 10, 'user2', 'Setuju', 'tolong dijaga', '631832810971f.jpg'),
(35, 11, 'Body Harness', 'BH-1123', '37', 'Budi', 'Bagus', 'Marine Office', 1, '2022-09-08', '2022-09-12', 10, 'user2', 'Tolak', 'akan digunakan untuk projek lain', '6318351707a49.jpg'),
(36, 7, 'Life Work Vest', 'LWV-3223', '38', 'Roy', 'Bagus', 'Marine Base', 1, '2022-09-08', '2022-09-10', 10, 'user2', 'Setuju', 'tolong dijaga', '631830e973153.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user'),
(10, 'user2', 'user2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `data_owner`
--
ALTER TABLE `data_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `data_pinjaman`
--
ALTER TABLE `data_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  ADD PRIMARY KEY (`id_riwayat_pinjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_owner`
--
ALTER TABLE `data_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_pinjaman`
--
ALTER TABLE `data_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `riwayat_peminjaman`
--
ALTER TABLE `riwayat_peminjaman`
  MODIFY `id_riwayat_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
