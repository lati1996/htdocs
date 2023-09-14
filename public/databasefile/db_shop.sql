-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th9 14, 2023 lúc 04:49 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Account` text DEFAULT NULL,
  `Password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Name`, `Email`, `Account`, `Password`) VALUES
(1, 'Minh Hoang', 'mhoang1996@gmail.com', 'mhoang', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `Id` int(11) NOT NULL,
  `CategoryName` text DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`Id`, `CategoryName`, `Description`) VALUES
(2, 'Drap', 'Drap'),
(8, 'Chăn Cotton', 'Chăn Cotton'),
(9, 'Set Drap', 'Set Drap'),
(10, 'Set Drap Mền', 'Set Drap Mền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `Id` int(11) NOT NULL,
  `ProductName` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `IdCate` int(11) DEFAULT NULL,
  `Image` text DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Size` text DEFAULT NULL,
  `ProdCode` text DEFAULT NULL,
  `Material` text DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`Id`, `ProductName`, `Description`, `IdCate`, `Image`, `Quantity`, `Size`, `ProdCode`, `Material`, `Price`, `Rating`) VALUES
(9, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-2-696x1042.jpeg', 1, '160 x 200 x 20cm', 'setdrap', 'Tencent', 2400000, 4),
(18, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-3-696x928.jpeg', 1, '180 x 200 x 20cm', 'setdrap', 'Cotton Korea', 1800000, 4),
(19, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-4-696x928.jpeg', 1, '160 x 200 x 20cm', 'setdrap', 'Cotton TL', 1100000, 4),
(20, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-5-696x1044.jpeg', 1, '160 x 200 x 20cm', 'setdrap', 'Modal', 2200000, 4),
(21, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-6-696x696.jpeg', 1, '160 x 200 x 20cm', 'setdrap', 'Cotton Korea', 1700000, 4),
(22, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-7-696x922.jpeg', 1, '160 x 200 x 20cm', 'setdrap', 'Tencent 60s', 2400000, 5),
(23, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-11-696x883.jpeg', 1, '180 x 200 x 20cm', 'setdrap', 'Tencent 60s', 2600000, 5),
(24, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'drap-giuong-cotton-12-696x890.jpeg', 1, '200 x 220 x 20cm', 'setdrap', 'Tencent 60s', 3000000, 4),
(25, 'Set drap', 'Set drap bao gồm: 02 áo gối<br/>01 áo gối ôm<br/>01 drap trải nệm<br/>01 chăn đắp', 10, 'c82d984164dab19e8d823438eadc86d8.jpeg', 3, '160 x 200 x 20cm', 'setdrap', 'Tencent 100s', 2700000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
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
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`Id`, `Name`, `Email`, `Phone`, `Account`, `Password`, `Address`, `Ward`, `District`, `Province`) VALUES
(1, 'Minh Hoang', 'xxsxsxsxsx@fvfvfvfvfv', '0398936410', 'mhoang222', '1231232131231', '561 Nguyễn Trãi', 'Lái Thiêu', 'Thuận An', 'Bình Dương'),
(2, 'My An', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', NULL, NULL, NULL, NULL),
(3, 'Minh Bao', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', 'Lái Thiêu', NULL, NULL, NULL),
(5, 'Bao', 'bao2021@gmail.com', '0398936410', 'bao2021', '222222', 'Lái Thiêu', NULL, NULL, NULL),
(7, 'minh bảo', 'mbao@gmail.com', '0398936410', 'mbao', '123', 'Bình Dương', NULL, NULL, NULL),
(9, 'minh bảo', 'mbao@gmail.com', '0398936410', 'mbao', '123', 'Bình Dương', NULL, NULL, NULL),
(10, 'minh bảo', 'mbao@gmail.com', '0398936410', 'mbao', '123', 'Bình Dương', NULL, NULL, NULL),
(13, 'My An', 'mhoang1996@gmail.com', '0398936410', 'mhoang', '1', NULL, NULL, NULL, NULL),
(20, 'Minh bảo', 'mbao2021@gmail.com', '0292920292929', 'mbao2021', '123456', 'Lái Thiêu', NULL, NULL, NULL),
(21, 'man', 'man@gmail.com', '2131231231231', 'man', '21312312', 'Lái thiêu', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
