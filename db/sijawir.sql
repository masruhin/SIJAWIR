-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 07:01 PM
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
  `kd_dok` varchar(100) NOT NULL,
  `nm_dok` varchar(255) NOT NULL,
  `id_jenis` int(100) NOT NULL,
  `id_univ` int(100) DEFAULT NULL,
  `id_fakultas` int(100) DEFAULT NULL,
  `id_prodi` int(100) DEFAULT NULL,
  `thn_dok` date NOT NULL,
  `ket_dok` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dok`, `kd_dok`, `nm_dok`, `id_jenis`, `id_univ`, `id_fakultas`, `id_prodi`, `thn_dok`, `ket_dok`) VALUES
(1, 'kd01', 'ok', 1, 1, 1, 1, '2023-12-28', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `dok_jenis`
--

CREATE TABLE `dok_jenis` (
  `id_jenis` int(100) NOT NULL,
  `kd_jenis` varchar(255) NOT NULL,
  `nm_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(100) NOT NULL,
  `nm_fakultas` varchar(255) NOT NULL,
  `keterangan_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(100) NOT NULL,
  `id_fakultas` int(100) NOT NULL,
  `nm_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `univ`
--

CREATE TABLE `univ` (
  `id_univ` int(100) NOT NULL,
  `nm_univ` varchar(100) NOT NULL,
  `ket_univ` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', 'Setiawan Dimas', 'dimas95@gmail.com', 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'roland09', 'Roland Pugel', 'roland09@gmail.com', 2, '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'candra34', 'Candra Sidauruk', 'candra34@gmail.com', 3, '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'adam', 'adam', 'admin@gmail.com', 1, '1d7c2923c1684726dc23d2901c4d8157'),
(5, 'ruhin', 'ruhin', 'admin@gmail.com', 1, 'a1a2b31d553de2856ea582c2e071c1d7'),
(6, 'ari', 'ari', 'admin@gmail.com', 1, 'fc292bd7df071858c2d0f955545673c1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dok`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`),
  ADD UNIQUE KEY `id_univ` (`id_univ`),
  ADD UNIQUE KEY `id_fakultas` (`id_fakultas`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

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
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `univ`
--
ALTER TABLE `univ`
  ADD UNIQUE KEY `id_univ` (`id_univ`);

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
  MODIFY `id_dok` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dok_jenis`
--
ALTER TABLE `dok_jenis`
  MODIFY `id_jenis` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dok_jenis`
--
ALTER TABLE `dok_jenis`
  ADD CONSTRAINT `dok_jenis_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `dokumen` (`id_jenis`);

--
-- Constraints for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `dokumen` (`id_fakultas`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `dokumen` (`id_prodi`),
  ADD CONSTRAINT `prodi_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `univ`
--
ALTER TABLE `univ`
  ADD CONSTRAINT `univ_ibfk_1` FOREIGN KEY (`id_univ`) REFERENCES `dokumen` (`id_univ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
