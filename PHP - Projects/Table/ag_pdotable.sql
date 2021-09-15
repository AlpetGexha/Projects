-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 02:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_pdotable`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `tableID` int(11) NOT NULL,
  `tableName` varchar(255) NOT NULL,
  `tableSurname` varchar(255) NOT NULL,
  `tableEmail` varchar(255) NOT NULL,
  `tableTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`tableID`, `tableName`, `tableSurname`, `tableEmail`, `tableTime`) VALUES
(7, 'cvx', 'vcxvcx', 'agdah@fkajss.coj', '2021-09-12 02:58:52'),
(9, 'f', 'fdsfds', 'dasa@gmai.das', '2021-09-12 03:06:54'),
(11, 'fghhfghfg', 'das', 'adsA@fa.copm', '2021-09-12 04:48:54'),
(12, 'ewq', 'ewq', 'adsA@fa.copm', '2021-09-12 04:49:02'),
(13, 'e', 'das', 'adsA@fa.copm', '2021-09-12 04:49:50'),
(14, 'das', 'dasd', 'adsA@fa.copm', '2021-09-12 04:49:50'),
(17, 'das', 'dasd', 'agdah@fkajss.coj', '2021-09-12 05:02:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`tableID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
