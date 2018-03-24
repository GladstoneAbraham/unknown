-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 04:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unknown`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_entries`
--

CREATE TABLE `user_entries` (
  `Id` int(6) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FailedLogin` int(10) NOT NULL,
  `LastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_entries`
--

INSERT INTO `user_entries` (`Id`, `Name`, `Password`, `FailedLogin`, `LastLogin`) VALUES
(1, 'stormworm', '86ee9ec673586976cc93b14d72b9072b', 0, '2018-03-24 14:34:01'),
(3, 'sw', '81dc9bdb52d04dc20036dbd8313ed055', 10, '2018-03-24 15:37:18'),
(4, 'sw1', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2018-03-23 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_entries`
--
ALTER TABLE `user_entries`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_entries`
--
ALTER TABLE `user_entries`
  MODIFY `Id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
