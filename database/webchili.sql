-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webchili`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password_hash`, `created_at`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2024-12-16 01:35:59');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basis_kasus`
--

INSERT INTO `basis_kasus` (`id_kasus`, `G001`, `G002`, `G003`, `G004`, `G005`, `G006`, `G007`, `G008`, `G009`, `solusi`) VALUES
(1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 'P01'),
(2, 1, 1, 0, 0, 1, 1, 0, 1, 0, 'P02'),
(3, 1, 0, 0, 0, 1, 0, 0, 0, 1, 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `kode` varchar(10) NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `P01` tinyint(1) NOT NULL DEFAULT 0,
  `P02` tinyint(1) NOT NULL DEFAULT 0,
  `P03` tinyint(1) NOT NULL DEFAULT 0,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`kode`, `gejala`, `P01`, `P02`, `P03`, `bobot`) VALUES
('G001', 'Kelembaban tanah rendah', 0, 1, 1, 5),
('G002', 'Suhu rendah', 0, 1, 0, 3),
('G003', 'Suhu optimal', 1, 0, 0, 5),
('G004', 'Kelembaban tanah optimal', 1, 0, 0, 5),
('G005', 'Suhu sedang (rata-rata)', 0, 1, 1, 3),
('G006', 'Kelembaban tanah sedang (rata-rata)', 0, 1, 0, 3),
('G007', 'Kesuburan tanah optimal', 1, 0, 0, 5),
('G008', 'Kesuburan tanah sedang', 0, 1, 0, 3),
('G009', 'Kesuburan tanah rendah', 0, 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `rule_base`
--

CREATE TABLE `rule_base` (
  `id` int(11) NOT NULL,
  `rule_number` varchar(10) DEFAULT NULL,
  `conditions` text DEFAULT NULL,
  `conclusion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rule_base`
--

INSERT INTO `rule_base` (`id`, `rule_number`, `conditions`, `conclusion`) VALUES
(2, 'R1', 'IF G004 AND G003 AND G007', 'P01'),
(3, 'R2', 'IF G001 OR G006 OR G002 OR G005 OR G008 ', 'P02'),
(6, 'R3', 'IF G001 OR G005 OR G009 ', 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `suhu` decimal(10,2) NOT NULL,
  `kelembaban` int(11) NOT NULL,
  `kesuburan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `suhu`, `kelembaban`, `kesuburan`) VALUES
(210, '15.00', 25, 75);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `id_solusi` varchar(10) NOT NULL,
  `deskripsi_solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `deskripsi_solusi`) VALUES
('P01', 'Jaga kelembaban tanah dengan menyiram secara teratur, tambahkan pupuk kompos atau pupuk kandang.'),
('P02', 'Buat saluran air agar tidak tergenang, tutupi tanah dengan mulsa dan tambahkan pupuk.'),
('P03', 'Buat saluran drainase, tambahkan kapur dolomit, dan hindari penyiraman berlebihan.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nama`, `Email`, `Username`, `Password`) VALUES
(2, 'Venesse', 'v.kaylasha@gmail.com', 'sasasasasa', '$2y$10$srRunMRwBBgSxm1kbD25r.MDwMGq/KyfeLFFPEA/irHJc21g04UOy'),
(3, 'sasa', 'rizkizyx09@gmail.com', 'icang', '$2y$10$BZYXmi8HZ4H1JEBP40/hteYGfUHe.ddcl9u/s7LBr.2nJOxhBHUAW'),
(5, 'Kay', 'Alinda@gmail.com', 'user', '$2y$10$masULxDHc2O3k9/XglxHZ.SHy3.UJuTjjMHBQxqGgfbdUKoCsfUi.'),
(8, 'Nay', 'Alinda@gmail.com', 'user', 'user'),
(10, 'Venesse', 'kayla@gmail.com', 'user', '$2y$10$u1lNF1cQkUdmZTx5SSyaUu2qs3cQ0ob63rwvfGTLJ04xnAkVV5/DS'),
(11, 'Niory', 'f6156xb247@dicoding.org', 'user', '$2y$10$aVMlFG9i8hUeBXmkcofqhevAHR1CDA9sCm/mz5TrtY/1MQ3iSHjB.'),
(12, 'anu', 'anu@gmail.com', 'le', '$2y$10$qijDfaEJ9GftADKOYicGquQVXSsSxbg.a.mDDR5leAkJ1dTIZaj5.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `basis_kasus`
--
ALTER TABLE `basis_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `rule_base`
--
ALTER TABLE `rule_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basis_kasus`
--
ALTER TABLE `basis_kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rule_base`
--
ALTER TABLE `rule_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
