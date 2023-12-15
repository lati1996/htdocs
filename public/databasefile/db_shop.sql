-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2023 lúc 07:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

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
(1, 'Minh Hoang', 'mhoang1996@gmail.com', 'mhoang', 'c6fe2a559417c636b2840542ad58ce6f9d815b15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `Id` int(11) NOT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `IdProd` int(11) DEFAULT NULL,
  `Quanity` int(11) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `IdOrder` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`Id`, `IdUser`, `IdProd`, `Quanity`, `Status`, `IdOrder`) VALUES
(74, 33, 9, 1, 1, 'HT-Wed09-231206094531'),
(75, 33, 21, 1, 1, 'HT-Wed16-231206043112'),
(76, 33, 20, 1, 1, 'HT-Wed16-231206043112'),
(77, 33, 22, 1, 1, 'HT-Wed16-231206043112');

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
(9, 'Set Drap (Không chăn)', 'Set Drap (Không chăn)'),
(10, 'Set Drap Full', 'Set Drap Full'),
(11, 'Nệm', 'Nệm'),
(12, 'Rèm vải gấm', 'Rèm vải gấm'),
(15, 'Rèm sáo', 'Rèm sáo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_groupmenu`
--

CREATE TABLE `tbl_groupmenu` (
  `Id` int(11) NOT NULL,
  `MenuGroupName` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_groupmenu`
--

INSERT INTO `tbl_groupmenu` (`Id`, `MenuGroupName`) VALUES
(1, 'TopBanner'),
(2, 'TopInfo'),
(3, 'BottomInfo'),
(4, 'IconInfoTop'),
(5, 'Carousel'),
(6, 'AboutPage'),
(7, 'ContactPage');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_img`
--

CREATE TABLE `tbl_img` (
  `Id` int(11) NOT NULL,
  `IdProd` int(11) DEFAULT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_img`
--

INSERT INTO `tbl_img` (`Id`, `IdProd`, `Image`) VALUES
(120, 39, 'z4929747578732_bb15f4b07878d07207cc1c0a02110080.jpg'),
(121, 40, 'z4929747362385_348105df3cfcf1d72e9d0309e670252b.jpg'),
(122, 40, 'z4929747594171_4383b3a02aeda6c84e8236a39187961c.jpg'),
(123, 41, 'z4929747457269_111d86e5c8f9ff29dc3688ffb529b500.jpg'),
(124, 41, 'z4929747464731_b32e23c68124d964d38bf3d8aa1b5524.jpg'),
(125, 41, 'z4929747491044_e4e130756882b2481890adcd920e074c.jpg'),
(126, 41, 'z4929747536688_7464c8fe22a06ce999ff8934fae2b711.jpg'),
(127, 41, 'z4929747556775_88dce7dd8779490e1522eea8ec22de4e.jpg'),
(129, 43, 'z4929747537968_1a947f7c86bd3a4e1bc3609da9406904.jpg'),
(130, 42, 'z4929747431331_428961f9b8f457730476547e74399c57.jpg'),
(131, 45, 'z4929747436689_05f813eb32462f7c2577b4812c0de48d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_menuitem`
--

CREATE TABLE `tbl_menuitem` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `IdGroup` int(11) NOT NULL,
  `Link` text NOT NULL,
  `OrderNum` int(11) NOT NULL,
  `Icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_menuitem`
--

INSERT INTO `tbl_menuitem` (`Id`, `Name`, `IdGroup`, `Link`, `OrderNum`, `Icon`) VALUES
(1, 'Trang chủ', 1, '/Home', 1, ''),
(2, 'Sản phẩm', 1, '/Products', 2, ''),
(3, 'Giới thiệu', 1, '/About', 3, ''),
(4, 'Liên hệ', 1, '/Contact', 4, ''),
(5, '039 8 936 410\r\n', 2, '#', 1, 'fa fa-phone fa-fw'),
(6, 'mhoang1996@gmail.com\r\n', 2, '#', 2, 'fas fa-envelope fa-fw'),
(7, 'Admin', 1, '/Manage', 5, ''),
(8, '561B Nguyễn Tr&atilde;i, Phường L&aacute;i Thi&ecirc;u , Th&agrave;nh phố Thu&acirc;n An, Tỉnh B&igrave;nh Dương\r\n', 2, '#', 3, 'fas fa-map-marker-alt fa-fw'),
(9, 'Facebook', 4, 'https://www.facebook.com/nguyenminh.hoang.18659', 1, 'fab fa-facebook-f fa-sm fa-fw me-2'),
(10, 'Ins', 4, '#', 2, 'fab fa-instagram fa-sm fa-fw me-2'),
(11, 'Tw', 4, '#', 3, 'fab fa-twitter fa-sm fa-fw me-2'),
(12, 'Linkedin', 4, '#', 4, 'fab fa-linkedin fa-sm fa-fw'),
(16, ' <h1 class=\"h1 text-success\"><b>hT</b> Store</h1>\r\n                             <h3 class=\"h2\">Thoải mái cuộc sống đến từ giấc ngủ</h3>\r\n                             <p>\r\n                                 hT Store là nơi chuyên cung cấp các mặc hàng Ga gối nệm\r\n                                 Với chất liệu và mẫu mã cao cấp, theo trend thị trường.\r\n                                 Mang đến sự thoải mái, thoáng mái khi sử dụng.\r\n                             </p>', 5, '#', 1, 'carousel1.png'),
(17, ' <h1 class=\"h1\">Màu sắc đa dạng phù hợp mọi lứa tuổi</h1>\r\n                             <h3 class=\"h2\">Mẫu mà được cập nhật hàng ngày</h3>\r\n                             <p>\r\n                                 Đến với\r\n                             <h1 class=\"h1 text-success\"><b>hT</b> Store</h1> bạn sẽ được chọn lựa thoải mái về kiểu dáng, màu sắc, kích thước, chất liệu\r\n                             </p>', 5, '#', 2, 'carousel2.png'),
(18, ' <h1 class=\"h1\">Chất liệu cao cấp</h1>\r\n                             <h3 class=\"h2\">hT Store cam kết chất lượng 100% </h3>\r\n                             <p>\r\n                                 Được hình thành bởi những chất liệu tốt nhất ngành may mặc, sản phẩm Dra, gối của\r\n                             <h1 class=\"h1 text-success\"><b>hT</b> Store</h1> đảm bảo về chất lượng sản phẩm cũng như sức khoẻ, thân thiện với người dùng\r\n                             </p>', 5, '#', 3, '333648256_858874405202349_8096384277268839749_n.jpg'),
(19, '<h1>About Us</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', 6, '#', 1, 'about-hero.svg'),
(20, '<h1 class=\"h1\">Contact Us</h1>\r\n        <p>\r\n            Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            Lorem ipsum dolor sit amet.\r\n        </p>', 7, '#', 1, ''),
(22, '   <h1 class=\"h1\">Our Services</h1>\r\n            <p>\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                Lorem ipsum dolor sit amet.\r\n            </p>', 6, '#', 2, ''),
(23, '<p>Delivery Services</p>\r\n', 6, '#', 3, 'fa fa-truck fa-lg'),
(24, '<p>Shipping &amp; Return</p>\r\n', 6, '#', 4, 'fas fa-exchange-alt'),
(25, '<p>Promotion</p>\r\n', 6, '#', 5, 'fa fa-percent'),
(26, '<p>24 Hours Service</p>\r\n', 6, '#', 6, 'fa fa-user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `Id` varchar(30) NOT NULL,
  `TotalItem` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `PaymentStatus` int(11) NOT NULL,
  `DeliveryAddress` text DEFAULT NULL,
  `DateCreate` date DEFAULT NULL,
  `PaymentMethod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Quanity` int(11) DEFAULT NULL,
  `Size` text DEFAULT NULL,
  `ProdCode` text DEFAULT NULL,
  `Material` text DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`Id`, `ProductName`, `Description`, `IdCate`, `Image`, `Quanity`, `Size`, `ProdCode`, `Material`, `Price`, `Rating`) VALUES
(39, 'Nệm cao su non', '<p>Nệm cao su non, bề mặt lỗ tho&aacute;ng kh&iacute;..........dcdcdc</p>\r\n', 11, 'z4929747576865_94fc674b9886b589be5c9a601bc189a2.jpg', 10, '160 x 200 x 10cm', 'nem01', 'Cao su non', 1500000, 4),
(40, 'Nệm cao su Vạn Thành', '<p>Nệm cao su thi&ecirc;n nhi&ecirc;n thương hiện Vạn Th&agrave;nh</p>\r\n', 11, 'z4929747603647_1f2a1811040a6c5fff2f5e23c3f42b4d.jpg', 10, '180 x 200 x 10cm', 'nemvanthanh01', '100% cao su thiên nhiên', 10000000, 5),
(41, 'Rèm chống nắng 99%', '<p>R&egrave;m chống nắng, k&iacute;ch thước theo y&ecirc;u cầu, đ&atilde; bao gồm thanh treo.</p>\r\n', 12, 'z4929747566687_c9f98edee75a221caacf8996e749c124.jpg', 10, 'Theo yêu cầu', 'remchongnang', 'Vải gấm trán cao su', 600000, 5),
(42, 'Rèm sáo cuộn (Roller)', '<p>R&egrave;m s&aacute;o cuộn, th&iacute;ch thước theo y&ecirc;u cầu.</p>\r\n', 15, 'z4929747432973_003260ea47d6d64f79865e7b7e76dc8f.jpg', 10, 'Theo yêu cầu', 'remroller', 'Sợi cao su nhân tạo, sợi vải', 450000, 5),
(43, 'Rèm âm trần', '<p>R&egrave;m vải gấm gắn trần, k&iacute;ch thước theo y&ecirc;u cầu, gi&aacute; th&agrave;nh đ&atilde; bao gồm thanh treo.</p>\r\n', 12, 'z4929747537009_e67e15ec073adbdcb1518d0cd0ad7736.jpg', 10, 'Theo yêu cầu', 'remamtran', 'Vải gấm', 700000, 5),
(44, 'Nệm xếp gấp 3 tấm', '<p>Nệm gấp 3 tấm, chất liệu m&aacute;t, kh&ocirc;ng n&oacute;ng, c&oacute; vỏ bọc gấm k&egrave;m theo nệm.</p>\r\n', 11, 'z4929747405202_26d541d2a5218d73533d7c58510bce65.jpg', 10, '160 x 200 x 9cm', 'nemgap3', 'Gòn ép', 1800000, 4),
(45, 'Rèm cuộn cầu vòng', '<p>R&egrave;m cầu v&ograve;ng thiết kế sang trong, d&agrave;nh cho ph&ograve;ng cần lấy &aacute;nh s&aacute;ng tự nhi&ecirc;n, kh&ocirc;ng g&acirc;y ch&oacute;i nắng.</p>\r\n', 15, 'z4929747440490_b8b07b5c6aa97bffe83a8be7dbe5bad8.jpg', 10, 'Theo yêu cầu', 'remcauvong', 'Vải, nhựa', 550000, 5);

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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_groupmenu`
--
ALTER TABLE `tbl_groupmenu`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_menuitem`
--
ALTER TABLE `tbl_menuitem`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
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
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_groupmenu`
--
ALTER TABLE `tbl_groupmenu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `tbl_menuitem`
--
ALTER TABLE `tbl_menuitem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
