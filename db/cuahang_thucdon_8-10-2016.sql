-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 07:20 AM
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
-- Table structure for table `cuahang_thucdon`
--

CREATE TABLE `cuahang_thucdon` (
  `Id_Cua_Hang_Thuc_Don` int(11) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `Date_Creation` datetime NOT NULL,
  `Date_Modification` date DEFAULT NULL,
  `Id_Cua_Hang` int(11) DEFAULT NULL,
  `Id_Thuc_Don` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  ADD PRIMARY KEY (`Id_Cua_Hang_Thuc_Don`),
  ADD KEY `Id_Cua_Hang` (`Id_Cua_Hang`),
  ADD KEY `Id_Thuc_Don` (`Id_Thuc_Don`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  MODIFY `Id_Cua_Hang_Thuc_Don` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuahang_thucdon`
--
ALTER TABLE `cuahang_thucdon`
  ADD CONSTRAINT `FK_798314C8ECD1615B` FOREIGN KEY (`Id_Cua_Hang`) REFERENCES `cuahang` (`Id_Cua_Hang`),
  ADD CONSTRAINT `FK_798314C8F3BFD3A5` FOREIGN KEY (`Id_Thuc_Don`) REFERENCES `thucdon` (`Id_Thuc_Don`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
