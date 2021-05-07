-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 04:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webix_pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `stok_penjualan`
--

CREATE TABLE `stok_penjualan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_barang` int(21) NOT NULL,
  `kuantitas` varchar(54) NOT NULL,
  `harga` int(21) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_penjualan`
--

INSERT INTO `stok_penjualan` (`id`, `nama_barang`, `kode_barang`, `kuantitas`, `harga`, `stock`) VALUES
(26, 'ayam', 49921, 'kilo', 13000, 88),
(27, 'daia', 299331, 'pcs', 13000, 293),
(28, 'rinso', 29913, 'pcs', 15000, 211),
(31, 'telur ayam negri', 350201, 'kilo', 13000, 25),
(32, 'telur ayam kampung', 350300, 'kilo', 16000, 17),
(33, 'barang bagus', 98882, 'pcs', 2000, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stok_penjualan`
--
ALTER TABLE `stok_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stok_penjualan`
--
ALTER TABLE `stok_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
