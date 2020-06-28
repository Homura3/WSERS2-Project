-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 05:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazons_little_cousin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `FiUser` int(10) UNSIGNED NOT NULL,
  `FiItem` int(10) UNSIGNED NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`FiUser`, `FiItem`, `TimeStamp`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(1, 1, '0000-00-00 00:00:00'),
(1, 1, '2020-06-25 19:51:44'),
(1, 5, '2020-06-25 19:51:44'),
(2, 1, '2020-06-28 14:21:06'),
(2, 1, '2020-06-28 14:27:04'),
(2, 1, '2020-06-28 14:27:06'),
(2, 1, '2020-06-28 14:27:09'),
(2, 1, '2020-06-28 15:24:03'),
(2, 1, '2020-06-28 15:24:03'),
(2, 2, '2020-06-28 15:24:03'),
(2, 5, '2020-06-28 15:24:03'),
(2, 6, '2020-06-28 15:24:03'),
(2, 7, '2020-06-28 15:24:03'),
(2, 1, '2020-06-28 15:25:53'),
(2, 2, '2020-06-28 15:25:53'),
(2, 5, '2020-06-28 15:25:53'),
(2, 1, '2020-06-28 15:26:25'),
(2, 2, '2020-06-28 15:26:25'),
(2, 5, '2020-06-28 15:26:25'),
(2, 1, '2020-06-28 15:28:44'),
(2, 2, '2020-06-28 15:28:44'),
(2, 5, '2020-06-28 15:28:44'),
(2, 2, '2020-06-28 15:29:02'),
(2, 1, '2020-06-28 15:29:47'),
(2, 1, '2020-06-28 15:46:40'),
(2, 1, '2020-06-28 15:46:40'),
(1, 1, '2020-06-28 15:48:37'),
(1, 2, '2020-06-28 15:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `ID` int(11) UNSIGNED NOT NULL,
  `itmname` varchar(255) NOT NULL,
  `itmdescr` varchar(255) NOT NULL,
  `itmprice` varchar(255) NOT NULL,
  `ItmLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ID`, `itmname`, `itmdescr`, `itmprice`, `ItmLink`) VALUES
(1, 'Corona 6-Pack', 'You can have every brew you want, but only if its a Corona.', '6.69', 'corona6er.png'),
(2, 'Face Masks', 'Protects you from the deadly Corona, sits tight and holds on.', '23.49', 'facemasks.jpg'),
(5, 'Hand Sanitizer', 'Keeps your Hands free from Coronavirus.', '17.99', 'sanitizer.png'),
(6, 'Medical Gloves', 'Stop don\'t touch me there this is my no no square.', '12.99', 'gloves.png'),
(7, 'Toilet Paper', 'Keeps your after clean.', '20.29', 'toiletpaper.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(11) UNSIGNED NOT NULL,
  `usrname` varchar(16) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `adminstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `usrname`, `psw`, `adminstatus`) VALUES
(1, 'User1', 'user1', 0),
(2, 'Chris', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD KEY `FiUser` (`FiUser`),
  ADD KEY `FiItem` (`FiItem`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `usrname` (`usrname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD CONSTRAINT `tblorders_ibfk_1` FOREIGN KEY (`FiUser`) REFERENCES `tbluser` (`ID`),
  ADD CONSTRAINT `tblorders_ibfk_2` FOREIGN KEY (`FiItem`) REFERENCES `tblproducts` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
