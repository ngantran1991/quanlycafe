-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 03:32 PM
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
-- Indexes for table `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`Id_Cua_Hang`);

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
-- AUTO_INCREMENT for table `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `Id_Cua_Hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
