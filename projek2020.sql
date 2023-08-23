-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 11:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `hargasewa_perhari` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_barang`, `brand`, `hargasewa_perhari`, `gambar`) VALUES
(1, 'Hammock', 'Consina', 20000, 'hammock.jpg'),
(24, 'Daypack', 'Eiger', 20000, 'daypack.jpg'),
(25, 'Matras', 'Consina', 5000, 'matras.jpg'),
(26, 'Sepatu gunung', 'Consina', 20000, 'sepatu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `alamat_penyewa` varchar(50) NOT NULL,
  `notelp_penyewa` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `hargasewa_perhari` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama_sewa(hari)` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id`, `id_alat`, `nama_penyewa`, `alamat_penyewa`, `notelp_penyewa`, `nama_barang`, `brand`, `hargasewa_perhari`, `tgl_ambil`, `tgl_kembali`, `lama_sewa(hari)`, `total`) VALUES
(41, 3, 24, 'Cantika Annabila', 'Kasongan, Bantul', '087845678999', 'Daypack', 'Eiger', 20000, '2020-05-10', '2020-05-14', 3, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_` varchar(50) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_`, `nilai`) VALUES
(3, 'cantika', '12345-', '0'),
(5, 'viaa', 'via123', '0'),
(6, 'admin', 'akuadmin', '1'),
(16, 'alex', 'alex', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id` (`id`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
