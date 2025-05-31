-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 12:08 AM
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
-- Table structure for table `tm_pemenang`
--

CREATE TABLE `tm_pemenang` (
  `id_pemenang` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_hadiah` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_pemenang`
--

INSERT INTO `tm_pemenang` (`id_pemenang`, `nip`, `nama`, `id_hadiah`, `id_event`, `keterangan`, `tgl_create`, `user_create`) VALUES
(1, 'XXXXXXXX42', 'RENI MISNIARTI', 1, 22, 'TEST HADIAH', '2023-02-23 06:07:23', 'PENGUNDI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_pemenang`
--
ALTER TABLE `tm_pemenang`
  ADD PRIMARY KEY (`id_pemenang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_pemenang`
--
ALTER TABLE `tm_pemenang`
  MODIFY `id_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
