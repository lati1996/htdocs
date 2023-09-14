-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2023 at 04:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Account` text DEFAULT NULL,
  `Password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Name`, `Email`, `Account`, `Password`) VALUES
(1, 'Minh Hoang', 'mhoang1996@gmail.com', 'mhoang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Id` int(11) NOT NULL,
  `CategoryName` text DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Id`, `CategoryName`, `Description`) VALUES
(1, 'Màn cửa', 'Màn cửa'),
(2, 'Drap', 'Drap'),
(5, 'Bộ rèm cửa', 'Bộ rèm cửa'),
(6, 'Chiếu', 'Chiếu'),
(7, 'Ruột gối', 'Ruột gối'),
(8, 'Chăn Cotton', 'Chăn Cotton'),
(9, 'Set Drap', 'Set Drap'),
(10, 'Set Drap Mền', 'Set Drap Mền'),
(11, 'Mùng ngủ', 'Mùng ngủ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `Id` int(11) NOT NULL,
  `ProductName` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `IdCate` int(11) DEFAULT NULL,
  `Image` text DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Size` text DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`Id`, `ProductName`, `Description`, `IdCate`, `Image`, `Quantity`, `Size`, `Price`) VALUES
(1, 'Bộ Drap gối', 'Bộ Drap gối', 1, '1', 10, '160x200x15cm', 10000),
(4, 'Drap Cotton TL', 'Drap Cotton TL', 2, '1', 10, '160x200x10cm', 10000),
(5, 'Áo gối', 'Áo gối', 7, '2', 100, '40x60cm', 10000),
(6, 'Mùng ngủ', 'Mùng ngủ loại thường', 6, '11', 100, '120x200', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Phone` text DEFAULT NULL,
  `Account` text DEFAULT NULL,
  `Password` text DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Ward` text DEFAULT NULL,
  `District` text DEFAULT NULL,
  `Province` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id`, `Name`, `Email`, `Phone`, `Account`, `Password`, `Address`, `Ward`, `District`, `Province`) VALUES
(1, 'Minh Hoang', 'xxsxsxsxsx@fvfvfvfvfv', '0398936410', 'mhoang222', '123', '561 Nguyễn Trãi', 'Lái Thiêu', 'Thuận An', 'Bình Dương'),
(2, 'My An', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', NULL, NULL, NULL, NULL),
(3, 'Minh Bao', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', 'Lái Thiêu', NULL, NULL, NULL),
(5, 'Bao', 'bao2021@gmail.com', '0398936410', 'bao2021', '222222', 'Lái Thiêu', NULL, NULL, NULL),
(7, 'minh bảo', 'mbao@gmail.com', '0398936410', 'mbao', '123', 'Bình Dương', NULL, NULL, NULL),
(9, 'minh bảo', 'mbao@gmail.com', '0398936410', 'mbao', '123', 'Bình Dương', NULL, NULL, NULL),
(13, 'My An', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', NULL, NULL, NULL, NULL),
(20, 'Minh bảo', 'mbao2021@gmail.com', '0292920292929', 'mbao2021', '123456', 'Lái Thiêu', NULL, NULL, NULL),
(22, 'mhoang', 'mhoang@gmail.com', NULL, 'mhoang', '123', 'Lai thieu', NULL, NULL, NULL),
(23, 'mhoang', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '333', 'Bình Dương', NULL, NULL, NULL),
(24, 'AN', 'ann@gmail.com', '121231212', 'AN', '123', 'HCM', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
