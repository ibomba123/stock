-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 02:21 PM
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
-- Database: `aotdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aot_system`
--

CREATE TABLE `aot_system` (
  `id_system` int(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aot_tool`
--

CREATE TABLE `aot_tool` (
  `id_tool` int(4) NOT NULL,
  `id_system` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(4) NOT NULL DEFAULT '0',
  `service` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aot_user`
--

CREATE TABLE `aot_user` (
  `id_user` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aot_user`
--

INSERT INTO `aot_user` (`id_user`, `email`, `password`, `admin`) VALUES
(1, 'test@airportthai.co.th', '123456', 1),
(2, 'boriwat.p@airportthai.co.th', 'Ibomba123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aot_system`
--
ALTER TABLE `aot_system`
  ADD PRIMARY KEY (`id_system`);

--
-- Indexes for table `aot_tool`
--
ALTER TABLE `aot_tool`
  ADD PRIMARY KEY (`id_tool`);

--
-- Indexes for table `aot_user`
--
ALTER TABLE `aot_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aot_system`
--
ALTER TABLE `aot_system`
  MODIFY `id_system` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aot_tool`
--
ALTER TABLE `aot_tool`
  MODIFY `id_tool` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aot_user`
--
ALTER TABLE `aot_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
