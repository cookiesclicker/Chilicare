-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 11:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perawatan_cabai`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_kasus`
--

CREATE TABLE `basis_kasus` (
  `id_kasus` int(11) NOT NULL,
  `G001` int(11) DEFAULT NULL,
  `G002` int(11) DEFAULT NULL,
  `G003` int(11) DEFAULT NULL,
  `G004` int(11) DEFAULT NULL,
  `G005` int(11) DEFAULT NULL,
  `G006` int(11) DEFAULT NULL,
  `G007` int(11) DEFAULT NULL,
  `G008` int(11) DEFAULT NULL,
  `G009` int(11) DEFAULT NULL,
  `solusi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basis_kasus`
--

INSERT INTO `basis_kasus` (`id_kasus`, `G001`, `G002`, `G003`, `G004`, `G005`, `G006`, `G007`, `G008`, `G009`, `solusi`) VALUES
(1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 'P01'),
(2, 0, 1, 0, 0, 1, 1, 0, 1, 0, 'P02'),
(3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `bobot`) VALUES
('G001', 'Kelembaban tanah rendah', 5),
('G002', 'Suhu rendah', 3),
('G003', 'Suhu optimal', 5),
('G004', 'Kelembaban tanah optimal', 5),
('G005', 'Suhu sedang (rata-rata)', 3),
('G006', 'Kelembaban tanah sedang', 3),
('G007', 'Kesuburan tanah optimal', 5),
('G008', 'Kesuburan tanah sedang', 3),
('G009', 'Kesuburan tanah rendah', 5);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` varchar(10) NOT NULL,
  `deskripsi_solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `deskripsi_solusi`) VALUES
('P01', 'Jaga kelembaban tanah dengan menyiram secara teratur, tambahkan pupuk kompos atau pupuk kandang.'),
('P02', 'Buat saluran air agar tidak tergenang, tutupi tanah dengan mulsa dan tambahkan pupuk.'),
('P03', 'Buat saluran drainase, tambahkan kapur dolomit, dan hindari penyiraman berlebihan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_kasus`
--
ALTER TABLE `basis_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_kasus`
--
ALTER TABLE `basis_kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
