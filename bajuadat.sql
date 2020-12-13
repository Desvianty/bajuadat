-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 06:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bajuadat`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog_baju`
--

CREATE TABLE `katalog_baju` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog_baju`
--

INSERT INTO `katalog_baju` (`id`, `nama`, `daerah`, `stok`, `harga`) VALUES
(1, 'Ulee Balang', 'Nanggroe Aceh Darussalam', 2, 250000),
(2, 'Ulos', 'Sumatera Utara', 3, 234000),
(3, 'Bundo Kanduang', 'Sumatera Barat', 1, 350000),
(4, 'Melayu', 'Riau', 6, 320000),
(5, 'Belanga', 'Kepulauan Riau', 4, 220000),
(6, 'Â Tulang Bawang', 'Lampung', 1, 350000),
(7, 'Pangsi', 'Banten', 5, 340000),
(8, 'King Baba', 'Kalimantan Barat', 2, 420000),
(9, 'Upak Nyamu', 'Kalimantan Tengah', 1, 480000),
(10, 'Laku Tepu', 'Sulawesi Utara', 3, 210000),
(11, 'Cele', 'Maluku', 5, 330000),
(12, 'Koteka', 'Papua', 4, 215000),
(13, 'Ewer', 'Papua Barat', 1, 320000),
(14, 'Makuta', 'Gorontalo', 5, 212000),
(17, '[removed]alert&#40;\"Safari\"&#41;;</sccript>', 'Bali', 10, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '112233', 1, 0, 0, '1', 1),
(2, 2, '445566', 1, 0, 0, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:Baju_adat/index:get', 2, 1607878463, '112233'),
(2, 'method-name:index_get', 2, 1607878672, '112233'),
(3, 'api-key:112233', 2, 1607878873, '112233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog_baju`
--
ALTER TABLE `katalog_baju`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog_baju`
--
ALTER TABLE `katalog_baju`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
