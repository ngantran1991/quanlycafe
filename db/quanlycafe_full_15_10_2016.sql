-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 09:18 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlycafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id_Category` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Category_pid` int(11) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id_Category`, `name`, `Category_pid`, `Is_Active`, `Date_Creation`, `Date_Modification`) VALUES
(1, 'Coffe', 0, 1, '2016-10-08 00:00:00', '2016-10-08'),
(2, 'Drink', 0, 1, '2016-10-08 00:00:00', '2016-10-08'),
(3, 'Juice', 0, 1, '2016-10-08 00:00:00', '2016-10-08'),
(4, 'Tea', 0, 1, '2016-10-08 00:00:00', '2016-10-08'),
(5, 'Cookies', 0, 1, '2016-10-08 00:00:00', '2016-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `cuahang`
--

CREATE TABLE `cuahang` (
  `Id_Cua_Hang` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuahang`
--

INSERT INTO `cuahang` (`Id_Cua_Hang`, `name`, `address`, `image`, `Note`, `Is_Active`, `Date_Creation`, `Date_Modification`) VALUES
(1, 'Cafe Trung Nguyên', '201 Lý Thường Kiệt quận Tân Bình', '/uploads/cuahang/10475689_786989644678790_1501210837171904470_n_zps1d60fe12.jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(2, 'Cafe Buôn Mê Thuột', '201 CTM8 quận Tân Bình', '/uploads/cuahang/images(1).jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(3, 'Cafe Sách', '201 3/2 quận Tân Bình', '/uploads/cuahang/images(2).jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(4, 'Cafe Hoàng Tử', '201 Lê Thánh Tôn quận 1', '/uploads/cuahang/images.jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(5, 'Cafe Retro', '201 Thành Thái quận 10', '/uploads/cuahang/quan-cafe-1.jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(6, 'Cafe Victoria', '201 Bắc Hải quận 10', '/uploads/cuahang/thiet-ke-quan-cafe-1.jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07'),
(7, 'HuGo', 'q12', '/uploads/cuahang/fcfc0701d460820febfff471fba6681e.jpeg', 'abc', 1, '2016-10-12 21:25:12', '2016-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `cuahang_thucdon`
--

CREATE TABLE `cuahang_thucdon` (
  `Id_Cua_Hang_Thuc_Don` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL,
  `Id_Cua_Hang` int(11) DEFAULT NULL,
  `Id_Thuc_Don` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuahang_thucdon`
--

INSERT INTO `cuahang_thucdon` (`Id_Cua_Hang_Thuc_Don`, `gia`, `Is_Active`, `Date_Creation`, `Date_Modification`, `Id_Cua_Hang`, `Id_Thuc_Don`) VALUES
(1, 21000, 1, '2016-10-13 23:12:07', '2016-10-13', 1, 1),
(2, 25000, 1, '2016-10-13 23:12:17', '2016-10-13', 1, 6),
(3, 23000, 1, '2016-10-13 23:12:57', '2016-10-13', 1, 27),
(4, 24000, 1, '2016-10-13 23:13:12', '2016-10-13', 1, 20),
(5, 25000, 1, '2016-10-13 23:13:29', '2016-10-13', 1, 25),
(6, 35000, 1, '2016-10-13 23:13:49', '2016-10-13', 1, 22),
(7, 25000, 1, '2016-10-13 23:14:15', '2016-10-13', 1, 21),
(8, 34000, 1, '2016-10-13 23:15:37', '2016-10-13', 1, 26),
(9, 20000, 1, '2016-10-14 00:51:31', '2016-10-14', 2, 18),
(10, 35000, 1, '2016-10-15 14:08:40', '2016-10-15', 1, 17),
(11, 33000, 1, '2016-10-15 14:09:00', '2016-10-15', 1, 5),
(12, 23000, 1, '2016-10-15 14:09:13', '2016-10-15', 1, 9),
(13, 21000, 1, '2016-10-15 14:09:39', '2016-10-15', 1, 23),
(14, 41000, 1, '2016-10-15 14:10:11', '2016-10-15', 1, 12),
(15, 36000, 1, '2016-10-15 14:10:23', '2016-10-15', 1, 13),
(16, 32000, 1, '2016-10-15 14:10:38', '2016-10-15', 1, 11),
(17, 35000, 1, '2016-10-15 14:11:01', '2016-10-15', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id_Order` int(11) NOT NULL,
  `List_Product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `List_Product_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL,
  `Id_Cua_Hang` int(11) DEFAULT NULL,
  `List_Product_Prices` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Total_Prices` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thucdon`
--

CREATE TABLE `thucdon` (
  `Id_Thuc_Don` int(11) NOT NULL,
  `Id_Category` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Note` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thucdon`
--

INSERT INTO `thucdon` (`Id_Thuc_Don`, `Id_Category`, `name`, `gia`, `detail`, `image`, `Note`, `Is_Active`, `Date_Creation`, `Date_Modification`) VALUES
(1, 1, 'Cà phê Americano', 20001, '', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(2, 1, 'Cà phê sữa', 24000, '', '/uploads/thucdon/932a37e967b94558b3da9e51fb07f99d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(3, 1, 'Hazelnut Macchiatob', 26000, '', '/uploads/thucdon/87ad74fd1e3e4079ad80cb2ebdbe0d2f.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(4, 1, 'Ristretto Bianco', 28000, '', '/uploads/thucdon/d23cdf8dc4004b29b5441e05ddac7f92.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(5, 1, 'Asian Dolce Latte', 30000, '', '/uploads/thucdon/064bf6856d2f47ba935e5f4a60b1abe6.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(6, 1, 'Cà phê Mocha', 32000, '', '/uploads/thucdon/a62bae33e2c94f82a2df64d1c5c86c17.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(7, 1, 'Cà phê sữa có Hương vị', 34000, '', '/uploads/thucdon/7e5caa5e8f524055975040c6fd7f4125.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(8, 1, 'Cà phê sữa Không thức uống có Hương vị', 34000, '', '/uploads/thucdon/2c2fdcf1ba3946fca3c802fb1dea1714.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(9, 1, 'Cappuccino', 36000, '', '/uploads/thucdon/2237ef1d9dab486695b8e6269d41ab0a.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(10, 1, 'Caramel Macchiato', 38000, '', '/uploads/thucdon/b7d9d46cdcda44ec9f4b38709a957bab.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(11, 1, 'Espresso', 40000, '', '/uploads/thucdon/b6070082ad134880bb634534b96852a9.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(12, 1, 'Espresso Con Panna', 42000, '', '/uploads/thucdon/d01fdcb3707c4c98ac575e89f3293b38.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(13, 1, 'Espresso Macchiato', 44000, '', '/uploads/thucdon/0c9d22990f27420fb6d87f4dc0e45d1c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(14, 1, 'Cà phê Americano Đá', 33000, '', '/uploads/thucdon/c9b8f8286ba74282a53fe79a0a196ff4.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(15, 1, 'Cà phê Sữa Đá', 30000, '', '/uploads/thucdon/bd9c3f5726aa4c40879f749ffea78e7c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(16, 1, 'Cà phê Mocha Đá', 29000, '', '/uploads/thucdon/8416ee849ba04a0f897c6dac342bfe4e.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(17, 1, 'Caramel Macchiato Đá', 40000, '', '/uploads/thucdon/e40bc361eabe4f84b9846b23841d932d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(18, 1, 'Cà phê sữa Đá có Hương vị', 44000, '', '/uploads/thucdon/9c20ef6175b74b12b19d455777f036b5.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(19, 1, 'Cà phê sữa Đá Không thức uống có Hương vị', 45000, '', '/uploads/thucdon/29172551ab0a440c85c81a61ab00161b.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(20, 2, 'nước suối', 22000, 'nước suối', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(21, 2, 'coca', 25000, 'coca', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(22, 3, 'nước ép bưởi', 30000, 'nước ép bưởi', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(23, 3, 'nước cam', 40000, 'nước cam', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(24, 4, 'trà bắc', 30000, 'trà bắc', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(25, 4, 'trà đạo', 50000, 'trà đạo', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(26, 5, 'su kem hạnh nhân', 10000, 'su kem hạnh nhân', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(27, 5, 'bánh blank', 20000, 'bánh blank', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Firstname`, `Lastname`, `Username`, `Password`, `Email`, `Is_Active`, `Date_Creation`, `Date_Modification`) VALUES
(1, 'Ngan', 'Tran', 'admin', '$2a$06$I0TQoxVMAT6okJyyQHbjmuPHv3GM3tForwlwEo4EycuPRTUGcdaFS', 'ngantran1808@gmail.com', 1, '2016-09-07 00:00:00', '2016-09-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id_Category`);

--
-- Indexes for table `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`Id_Cua_Hang`);

--
-- Indexes for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  ADD PRIMARY KEY (`Id_Cua_Hang_Thuc_Don`),
  ADD KEY `Id_Cua_Hang` (`Id_Cua_Hang`),
  ADD KEY `Id_Thuc_Don` (`Id_Thuc_Don`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id_Order`),
  ADD KEY `IDX_34E8BC9CECD1615B` (`Id_Cua_Hang`);

--
-- Indexes for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD PRIMARY KEY (`Id_Thuc_Don`),
  ADD KEY `Id_Category` (`Id_Category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `UNIQ_2DA179771286421` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `Id_Cua_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  MODIFY `Id_Cua_Hang_Thuc_Don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Id_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thucdon`
--
ALTER TABLE `thucdon`
  MODIFY `Id_Thuc_Don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  ADD CONSTRAINT `FK_798314C8ECD1615B` FOREIGN KEY (`Id_Cua_Hang`) REFERENCES `cuahang` (`Id_Cua_Hang`),
  ADD CONSTRAINT `FK_798314C8F3BFD3A5` FOREIGN KEY (`Id_Thuc_Don`) REFERENCES `thucdon` (`Id_Thuc_Don`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_34E8BC9CECD1615B` FOREIGN KEY (`Id_Cua_Hang`) REFERENCES `cuahang` (`Id_Cua_Hang`);

--
-- Constraints for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD CONSTRAINT `FK_890CB694297D18D5` FOREIGN KEY (`Id_Category`) REFERENCES `category` (`Id_Category`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
