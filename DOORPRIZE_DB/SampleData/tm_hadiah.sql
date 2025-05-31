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
-- Table structure for table `tm_hadiah`
--

CREATE TABLE `tm_hadiah` (
  `id_hadiah` int(11) NOT NULL,
  `nama_hadiah` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `max_jml` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_hadiah`
--

INSERT INTO `tm_hadiah` (`id_hadiah`, `nama_hadiah`, `harga_satuan`, `max_jml`, `id_event`, `tgl_create`, `user_create`) VALUES
(1, 'TEST HADIAH', 0, 1000, 22, '2023-02-23 05:46:43', 'SYSTEM'),
(2, '--PILIH DOORPRIZE--', 0, 0, 22, '2023-02-23 05:46:50', 'SYSTEM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_hadiah`
--
ALTER TABLE `tm_hadiah`
  ADD PRIMARY KEY (`id_hadiah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_hadiah`
--
ALTER TABLE `tm_hadiah`
  MODIFY `id_hadiah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
