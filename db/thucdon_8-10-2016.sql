-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2016 at 05:47 AM
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
-- Table structure for table `thucdon`
--

CREATE TABLE `thucdon` (
  `Id_Thuc_Don` int(11) NOT NULL,
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

INSERT INTO `thucdon` (`Id_Thuc_Don`, `name`, `gia`, `detail`, `image`, `Note`, `Is_Active`, `Date_Creation`, `Date_Modification`) VALUES
(1, 'Cà phê Americano', 20000, '', '/uploads/thucdon/67c30b9dacd4406db797b1690ac22475.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(2, 'Cà phê sữa', 24000, '', '/uploads/thucdon/932a37e967b94558b3da9e51fb07f99d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(3, 'Hazelnut Macchiatob', 26000, '', '/uploads/thucdon/87ad74fd1e3e4079ad80cb2ebdbe0d2f.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(4, 'Ristretto Bianco', 28000, '', '/uploads/thucdon/d23cdf8dc4004b29b5441e05ddac7f92.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(5, 'Asian Dolce Latte', 30000, '', '/uploads/thucdon/064bf6856d2f47ba935e5f4a60b1abe6.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(6, 'Cà phê Mocha', 32000, '', '/uploads/thucdon/a62bae33e2c94f82a2df64d1c5c86c17.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(7, 'Cà phê sữa có Hương vị', 34000, '', '/uploads/thucdon/7e5caa5e8f524055975040c6fd7f4125.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(8, 'Cà phê sữa Không thức uống có Hương vị', 34000, '', '/uploads/thucdon/2c2fdcf1ba3946fca3c802fb1dea1714.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(9, 'Cappuccino', 36000, '', '/uploads/thucdon/2237ef1d9dab486695b8e6269d41ab0a.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(10, 'Caramel Macchiato', 38000, '', '/uploads/thucdon/b7d9d46cdcda44ec9f4b38709a957bab.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(11, 'Espresso', 40000, '', '/uploads/thucdon/b6070082ad134880bb634534b96852a9.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(12, 'Espresso Con Panna', 42000, '', '/uploads/thucdon/d01fdcb3707c4c98ac575e89f3293b38.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(13, 'Espresso Macchiato', 44000, '', '/uploads/thucdon/0c9d22990f27420fb6d87f4dc0e45d1c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(14, 'Cà phê Americano Đá', 33000, '', '/uploads/thucdon/c9b8f8286ba74282a53fe79a0a196ff4.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(15, 'Cà phê Sữa Đá', 30000, '', '/uploads/thucdon/bd9c3f5726aa4c40879f749ffea78e7c.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(16, 'Cà phê Mocha Đá', 29000, '', '/uploads/thucdon/8416ee849ba04a0f897c6dac342bfe4e.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(17, 'Caramel Macchiato Đá', 40000, '', '/uploads/thucdon/e40bc361eabe4f84b9846b23841d932d.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(18, 'Cà phê sữa Đá có Hương vị', 44000, '', '/uploads/thucdon/9c20ef6175b74b12b19d455777f036b5.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08'),
(19, 'Cà phê sữa Đá Không thức uống có Hương vị', 45000, '', '/uploads/thucdon/29172551ab0a440c85c81a61ab00161b.jpg', NULL, 1, '2016-10-08 00:00:00', '2016-10-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thucdon`
--
ALTER TABLE `thucdon`
  ADD PRIMARY KEY (`Id_Thuc_Don`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thucdon`
--
ALTER TABLE `thucdon`
  MODIFY `Id_Thuc_Don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
