-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 12:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doorprize`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_halaman`
--

CREATE TABLE `tm_halaman` (
  `id_halaman` int(11) NOT NULL,
  `kode_halaman` varchar(100) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `total_pemenang` int(11) NOT NULL COMMENT 'Jumlah pemenang sekali muncul',
  `tgl_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_halaman`
--

INSERT INTO `tm_halaman` (`id_halaman`, `kode_halaman`, `id_hadiah`, `total_pemenang`, `tgl_create`, `user_create`) VALUES
(1, 'aprize', 1, 1, '2023-02-23 05:47:52', 'SYSTEM'),
(2, 'index', 2, 0, '2023-02-23 05:47:57', 'SYSTEM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_halaman`
--
ALTER TABLE `tm_halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_halaman`
--
ALTER TABLE `tm_halaman`
  MODIFY `id_halaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
