-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 06:48 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

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
(6, 'Cafe Victoria', '201 Bắc Hải quận 10', '/uploads/cuahang/thiet-ke-quan-cafe-1.jpg', NULL, 1, '2016-10-07 00:00:00', '2016-10-07');

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
(1, NULL, 'Cà phê Americano', 20000, '', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(2, NULL, 'Cà phê sữa', 24000, '', '/uploads/thucdon/932a37e967b94558b3da9e51fb07f99d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(3, NULL, 'Hazelnut Macchiatob', 26000, '', '/uploads/thucdon/87ad74fd1e3e4079ad80cb2ebdbe0d2f.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(4, NULL, 'Ristretto Bianco', 28000, '', '/uploads/thucdon/d23cdf8dc4004b29b5441e05ddac7f92.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(5, NULL, 'Asian Dolce Latte', 30000, '', '/uploads/thucdon/064bf6856d2f47ba935e5f4a60b1abe6.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(6, NULL, 'Cà phê Mocha', 32000, '', '/uploads/thucdon/a62bae33e2c94f82a2df64d1c5c86c17.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(7, NULL, 'Cà phê sữa có Hương vị', 34000, '', '/uploads/thucdon/7e5caa5e8f524055975040c6fd7f4125.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(8, NULL, 'Cà phê sữa Không thức uống có Hương vị', 34000, '', '/uploads/thucdon/2c2fdcf1ba3946fca3c802fb1dea1714.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(9, NULL, 'Cappuccino', 36000, '', '/uploads/thucdon/2237ef1d9dab486695b8e6269d41ab0a.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(10, NULL, 'Caramel Macchiato', 38000, '', '/uploads/thucdon/b7d9d46cdcda44ec9f4b38709a957bab.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(11, NULL, 'Espresso', 40000, '', '/uploads/thucdon/b6070082ad134880bb634534b96852a9.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(12, NULL, 'Espresso Con Panna', 42000, '', '/uploads/thucdon/d01fdcb3707c4c98ac575e89f3293b38.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(13, NULL, 'Espresso Macchiato', 44000, '', '/uploads/thucdon/0c9d22990f27420fb6d87f4dc0e45d1c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(14, NULL, 'Cà phê Americano Đá', 33000, '', '/uploads/thucdon/c9b8f8286ba74282a53fe79a0a196ff4.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(15, NULL, 'Cà phê Sữa Đá', 30000, '', '/uploads/thucdon/bd9c3f5726aa4c40879f749ffea78e7c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(16, NULL, 'Cà phê Mocha Đá', 29000, '', '/uploads/thucdon/8416ee849ba04a0f897c6dac342bfe4e.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(17, NULL, 'Caramel Macchiato Đá', 40000, '', '/uploads/thucdon/e40bc361eabe4f84b9846b23841d932d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(18, NULL, 'Cà phê sữa Đá có Hương vị', 44000, '', '/uploads/thucdon/9c20ef6175b74b12b19d455777f036b5.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(19, NULL, 'Cà phê sữa Đá Không thức uống có Hương vị', 45000, '', '/uploads/thucdon/29172551ab0a440c85c81a61ab00161b.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08');

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
  MODIFY `Id_Category` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `Id_Cua_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `thucdon`
--
ALTER TABLE `thucdon`
  MODIFY `Id_Thuc_Don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD CONSTRAINT `FK_890CB694297D18D5` FOREIGN KEY (`Id_Category`) REFERENCES `category` (`Id_Category`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
