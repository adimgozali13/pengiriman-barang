-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 01:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengiriman_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int(11) NOT NULL,
  `nomor_kapal` varchar(20) NOT NULL,
  `nama_kapal` varchar(60) NOT NULL,
  `panjang` int(9) NOT NULL,
  `lebar` int(9) NOT NULL,
  `kapasitas_kontainer` int(11) NOT NULL,
  `kapasitas_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nomor_kapal`, `nama_kapal`, `panjang`, `lebar`, `kapasitas_kontainer`, `kapasitas_tersedia`) VALUES
(1, '654005796', 'KM Brawijaya', 300, 35, 130, 127),
(2, '594130351', 'KM Solo', 250, 25, 100, 97),
(3, '702732608', 'KM Kelud', 200, 20, 80, 80);

-- --------------------------------------------------------

--
-- Table structure for table `kontainer`
--

CREATE TABLE `kontainer` (
  `id_kontainer` int(11) NOT NULL,
  `nama_kontainer` varchar(60) NOT NULL,
  `nomor_kontainer` int(11) NOT NULL,
  `ukuran` int(4) NOT NULL,
  `kapasitas_berat` bigint(11) NOT NULL,
  `kapasitas_tersedia_k` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontainer`
--

INSERT INTO `kontainer` (`id_kontainer`, `nama_kontainer`, `nomor_kontainer`, `ukuran`, `kapasitas_berat`, `kapasitas_tersedia_k`, `id_kapal`) VALUES
(2, 'KB01', 20967389, 10, 1000, 1000, 1),
(3, 'KB02', 302507562, 10, 1000, 700, 1),
(4, 'KB03', 184706889, 10, 1000, 1000, 1),
(5, 'KS01', 356339460, 10, 1000, 850, 2),
(6, 'KS02', 708047297, 10, 1000, 1000, 2),
(7, 'KS03', 948750416, 10, 1000, 550, 2);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id_negara` int(11) NOT NULL,
  `nama_negara` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `nama_negara`) VALUES
(1, 'Indonesia'),
(3, 'Singapura'),
(4, 'Jerman'),
(5, 'Tiongkok'),
(6, 'Hong Kong'),
(7, 'Belanda'),
(8, 'Malaysia'),
(9, 'Korea Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `pelabuhan`
--

CREATE TABLE `pelabuhan` (
  `id_pelabuhan` int(11) NOT NULL,
  `nama_pelabuhan` varchar(60) NOT NULL,
  `id_negara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelabuhan`
--

INSERT INTO `pelabuhan` (`id_pelabuhan`, `nama_pelabuhan`, `id_negara`) VALUES
(1, 'Tanjung Perak', 1),
(2, 'Shanghai', 5),
(3, 'Singapore', 3),
(4, 'Shenzen', 5),
(5, 'Busan', 9),
(6, 'Port Klang', 2),
(7, 'Port Klang', 8),
(8, 'Hamburg', 4),
(9, 'Tanjung Pelepas', 8),
(10, 'Tanjung Priok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `nomor_barang` int(11) NOT NULL,
  `nama_barang` varchar(60) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `pelabuhan_asal` varchar(60) NOT NULL,
  `pelabuhan_tujuan` varchar(60) NOT NULL,
  `status_pengiriman` enum('Dikirim','Terkirim','','') NOT NULL,
  `id_kontainer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nomor_barang`, `nama_barang`, `berat_barang`, `pelabuhan_asal`, `pelabuhan_tujuan`, `status_pengiriman`, `id_kontainer`) VALUES
(2, 657754782, 'Makanan Pokok', 600, 'Tanjung Perak', 'Hamburg', 'Terkirim', 2),
(3, 361169072, 'Barang Elektronik', 300, 'Tanjung Perak', 'Hamburg', 'Dikirim', 3),
(4, 811601766, 'Pangan', 450, 'Tanjung Perak', 'Shanghai', 'Dikirim', 7),
(5, 593638057, 'Makanan', 150, 'Tanjung Perak', 'Shenzen', 'Dikirim', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `level` enum('Super Admin','Operator Pelabuhan','','') NOT NULL,
  `id_pelabuhan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `id_pelabuhan`) VALUES
(1, 'admin@gmail.com', '$2y$10$NGSIw5oO.pXLeapYU259y.kkNaRUpcn2er2dkSzWMZkAaMVQrzMaO', 'Super Admin', NULL),
(3, 'user', '$2y$10$Ed5eX9V79BYfyXdNona5LO.2/MePSpr.6Q0HIqbsFonipZTTchEd6', 'Operator Pelabuhan', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `kontainer`
--
ALTER TABLE `kontainer`
  ADD PRIMARY KEY (`id_kontainer`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  ADD PRIMARY KEY (`id_pelabuhan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontainer`
--
ALTER TABLE `kontainer`
  MODIFY `id_kontainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelabuhan`
--
ALTER TABLE `pelabuhan`
  MODIFY `id_pelabuhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
