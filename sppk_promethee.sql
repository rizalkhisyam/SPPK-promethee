-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2018 at 03:24 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppk_promethee`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapenilayan`
--

CREATE TABLE `datapenilayan` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `ktp` varchar(225) NOT NULL,
  `sik` int(11) NOT NULL,
  `ktn` int(11) NOT NULL,
  `uk` int(11) NOT NULL,
  `jk` int(11) NOT NULL,
  `cpib` int(11) NOT NULL,
  `cbb` int(11) NOT NULL,
  `kodeunik` varchar(225) NOT NULL,
  `status` enum('diproses','diterima','ditolak') NOT NULL DEFAULT 'diproses',
  `lf` double DEFAULT NULL,
  `ef` double DEFAULT NULL,
  `nf` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datapenilayan`
--

INSERT INTO `datapenilayan` (`id`, `nama`, `foto`, `ktp`, `sik`, `ktn`, `uk`, `jk`, `cpib`, `cbb`, `kodeunik`, `status`, `lf`, `ef`, `nf`) VALUES
(2, 'joko', 'main@2x (1).png', 'amat_20170720_120346.jpg', 1, 1, 1, 0, 0, 1, 'HXVVS7K2', 'diterima', 0.4, 0.433, -0.033),
(3, 'faisal', '101994-OM0XMB-226.png', '120365-OPOGI8-38.jpg', 1, 1, 3, 3, 1, 0, 'UHTO23DW', 'diterima', 0.7, 0.1, 0.6),
(8, 'jony', '120365-OPOGI8-38_1543631329_1543631329.jpg', 'IMG_0882.JPG', 1, 0, 3, 1, 0, 0, 'U4PY3ABO', 'diproses', 0.333, 0.5, -0.167),
(16, 'jejen', '101994-OM0XMB-226.png', 'IMG_0882.JPG', 1, 0, 1, 0, 0, 0, 'RU6X7D2P', 'diproses', 0.133, 0.7, -0.566),
(17, 'hanung', 'Screenshot_6.jpg', 'IMG_0882.JPG', 0, 1, 0, 1, 0, 1, '6ZTF3RH5', 'diproses', 0.333, 0.633, -0.3),
(18, 'bony', '120365-OPOGI8-38_1543639359_1543639359.jpg', 'IMG_0882.JPG', 0, 1, 2, 2, 1, 1, 'K3O2YZWY', 'diterima', 0.733, 0.333, 0.4),
(19, 'nanda', 'mati.jpg', 'mati.jpg', 1, 0, 1, 3, 1, 0, '0U5DEY2A', 'diproses', 0.466, 0.367, 0.1),
(20, 'yuki', 'Screenshot_1.jpg', 'mati.jpg', 1, 1, 0, 1, 1, 0, 'G2EARF5D', 'diproses', 0.367, 0.4, -0.033);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'ardi', 'ardi@test.test', '$2y$10$nMr3K7BQz0c6Bi5QfjvhdOgSoKyit4Vh0gXMVG04cgC0EvVGTF57q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapenilayan`
--
ALTER TABLE `datapenilayan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapenilayan`
--
ALTER TABLE `datapenilayan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
