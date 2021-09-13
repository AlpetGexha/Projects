-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 11:38 PM
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
-- Database: `ag_kontakti`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `contactID` int(11) NOT NULL,
  `contactBody` longtext NOT NULL,
  `contactTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`contactID`, `contactBody`, `contactTime`) VALUES
(1, 'vdfgds', '2021-09-12 23:15:23'),
(2, 'dasdasd', '2021-09-12 23:15:25'),
(3, 'tesst', '2021-09-12 23:16:02'),
(4, 'tesst', '2021-09-12 23:17:10'),
(5, 'dasdas', '2021-09-12 23:35:37'),
(6, 'dasdas', '2021-09-12 23:35:47'),
(7, 'dad', '2021-09-12 23:35:49'),
(8, 'dad', '2021-09-12 23:35:57'),
(9, 'dad', '2021-09-12 23:35:59'),
(10, 'das', '2021-09-12 23:36:01'),
(11, 'das', '2021-09-12 23:36:03'),
(12, 'das', '2021-09-12 23:36:49'),
(13, 'dasdas', '2021-09-12 23:36:52'),
(14, 'das', '2021-09-12 23:36:54'),
(15, 'dasd', '2021-09-12 23:37:05'),
(16, 'dassdasda', '2021-09-12 23:37:45'),
(17, 'gfdgdfg', '2021-09-12 23:38:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontakti`
--
ALTER TABLE `kontakti`
  ADD PRIMARY KEY (`contactID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakti`
--
ALTER TABLE `kontakti`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
