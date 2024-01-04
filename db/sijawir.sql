-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 08:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sijawir`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dok` int(100) NOT NULL,
  `kd_dok` varchar(100) DEFAULT NULL,
  `nm_dok` varchar(255) DEFAULT NULL,
  `id_jenis` int(100) NOT NULL,
  `id_fakultas` int(100) DEFAULT NULL,
  `id_prodi` int(100) DEFAULT NULL,
  `thn_dok` date NOT NULL,
  `ket_dok` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dok`, `kd_dok`, `nm_dok`, `id_jenis`, `id_fakultas`, `id_prodi`, `thn_dok`, `ket_dok`) VALUES
(9, 'DOK002', NULL, 2, 1, 1, '2024-01-05', 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `dok_jenis`
--

CREATE TABLE `dok_jenis` (
  `id_jenis` int(11) NOT NULL,
  `kd_jenis` varchar(255) NOT NULL,
  `nm_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_jenis`
--

INSERT INTO `dok_jenis` (`id_jenis`, `kd_jenis`, `nm_jenis`) VALUES
(1, 'D001', 'Pedoman'),
(2, 'D002', 'Panduan'),
(3, 'D003', 'Laporan'),
(4, 'D004', 'Dokumen Lainya');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nm_fakultas` varchar(255) NOT NULL,
  `keterangan_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nm_fakultas`, `keterangan_fakultas`) VALUES
(1, 'FIKES', ''),
(2, 'FIKOM', ''),
(3, 'FEB', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nm_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nm_prodi`) VALUES
(1, 1, 'Ilmu Keperawatan (S1)'),
(2, 1, 'Farmasi (S1)'),
(3, 1, 'Kebidanan (D3)'),
(4, 1, 'Keperawatan (D3)'),
(5, 1, 'Keselamatan dan Kesehatan Kerja (D4)'),
(6, 1, 'Profesi Ners'),
(7, 2, 'Informatika (S1)'),
(8, 3, 'Bisnis Digital (S1)'),
(9, 3, 'Kewirausahaan (S1)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama`, `email`, `level`, `password`) VALUES
(1, 'admin', 'Setiawan Dimas', 'dimas95@gmail.com', 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 'adea', 'Roland Pugel', 'roland09@gmail.com', 1, 'b7b6c1a04b80bc734b435e5a74b70c5a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dok`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`),
  ADD UNIQUE KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_jenis_2` (`id_jenis`),
  ADD KEY `id_jenis_3` (`id_jenis`,`id_fakultas`,`id_prodi`),
  ADD KEY `id_prodi` (`id_prodi`) USING BTREE;

--
-- Indexes for table `dok_jenis`
--
ALTER TABLE `dok_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dok_jenis`
--
ALTER TABLE `dok_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
