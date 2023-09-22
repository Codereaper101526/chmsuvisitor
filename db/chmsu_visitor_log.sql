-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 01:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chmsu_visitor_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_administrator`
--

CREATE TABLE `tbl_administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_administrator`
--

INSERT INTO `tbl_administrator` (`id`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive_visitors`
--

CREATE TABLE `tbl_archive_visitors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `timein` datetime NOT NULL,
  `visitortimeout` datetime NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `passnumber` text NOT NULL,
  `platenumber` text NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `imagename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_archive_visitors`
--

INSERT INTO `tbl_archive_visitors` (`id`, `fullname`, `destination`, `timein`, `visitortimeout`, `purpose`, `passnumber`, `platenumber`, `remarks`, `imagename`) VALUES
(2, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  1', '2023-09-15 16:30:03', '2023-09-15 19:41:13', 'DELIVERY', '1', '', '', 'captured_image_202309150428PM.jpg'),
(3, 'fsadadasdasd', 'SUPPLIES OFFICE  1', '2023-09-15 16:31:00', '2023-09-15 19:40:24', 'adasdasdadasdaad', '1', 'fghfghfgh', 'adaasdad', 'captured_image_202309150430PM.jpg'),
(4, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  1', '2023-09-15 16:31:58', '2023-09-15 19:40:22', 'adasdasdadasdaad', '2', '', '', 'captured_image_202309150431PM.jpg'),
(5, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  1', '2023-09-15 16:32:18', '2023-09-15 19:40:21', 'DELIVERY', '1', '', '', 'captured_image_202309150432PM.jpg'),
(7, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  1', '2023-09-15 18:19:35', '2023-09-15 18:22:09', 'DELIVERY', '1', '', '', 'captured_image_202309150619PM.jpg'),
(10, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  11', '2023-09-15 19:45:40', '2023-09-15 19:45:48', 'adasdasdadasdaad', '1', 'adasdadada', 'adaasdad', 'Captured_visitor_202309150745PM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `department_name`, `description`) VALUES
(3, 'SUPPLIES OFFICE  11', 'SUPPLIES OFFICE LAB SCHOOL2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `Timein` datetime NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `passnumber` text NOT NULL,
  `platenumber` text NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `imagename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`id`, `fullname`, `destination`, `Timein`, `purpose`, `passnumber`, `platenumber`, `remarks`, `imagename`) VALUES
(9, 'ALBERT RHEY A DEJALDE', 'SUPPLIES OFFICE  11', '2023-09-15 19:40:58', 'adasdasdadasdaad', '1', '', '', 'captured_image_202309150740PM.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_archive_visitors`
--
ALTER TABLE `tbl_archive_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_administrator`
--
ALTER TABLE `tbl_administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_archive_visitors`
--
ALTER TABLE `tbl_archive_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
