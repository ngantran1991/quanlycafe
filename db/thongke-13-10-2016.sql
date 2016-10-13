-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 03:36 PM
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
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `Id_Thong_Ke` int(11) NOT NULL,
  `Gia_Tren_Bill` int(11) NOT NULL,
  `Gia_Thuc_Te` int(11) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Start` datetime NOT NULL,
  `Date_End` datetime NOT NULL,
  `Note` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL,
  `Id_Cua_Hang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`Id_Thong_Ke`),
  ADD KEY `Id_Cua_Hang` (`Id_Cua_Hang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongke`
--
ALTER TABLE `thongke`
  MODIFY `Id_Thong_Ke` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `thongke`
--
ALTER TABLE `thongke`
  ADD CONSTRAINT `FK_D0721FDECD1615B` FOREIGN KEY (`Id_Cua_Hang`) REFERENCES `cuahang` (`Id_Cua_Hang`);
  
ALTER TABLE `category` CHANGE `Category_pid` `Category_pid` INT(11) NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
