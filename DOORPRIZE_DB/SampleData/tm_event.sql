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
-- Table structure for table `tm_event`
--

CREATE TABLE `tm_event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `home` varchar(100) NOT NULL,
  `tgl_create` datetime NOT NULL DEFAULT current_timestamp(),
  `user_create` varchar(20) NOT NULL DEFAULT 'SYSTEM'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_event`
--

INSERT INTO `tm_event` (`id_event`, `nama_event`, `tahun`, `home`, `tgl_create`, `user_create`) VALUES
(22, 'Testing', '2022', 'sample', '2023-02-23 05:45:00', 'SYSTEM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_event`
--
ALTER TABLE `tm_event`
  ADD PRIMARY KEY (`id_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_event`
--
ALTER TABLE `tm_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
