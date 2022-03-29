-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 06:20 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsach`
--

-- --------------------------------------------------------

--
-- Table structure for table `thongtinsach`
--

CREATE TABLE `thongtinsach` (
  `tensach` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tentacgia` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dongia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngayphathanh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinsach`
--

INSERT INTO `thongtinsach` (`tensach`, `tentacgia`, `soluong`, `dongia`, `ngayphathanh`) VALUES
('Ngày em xa tôi', 'Phát', '12', '100000', '2021-10-13'),
('Thanh không iu tôi', 'Phát', '13', '60000', '2021-10-09'),
('Mùa thu xa em', 'Phát cry', '15', '40000', '2021-10-02'),
('The baby', 'Kenny Phat', '5', '40000', '2021-10-16'),
('Khi tôi khóc', 'Văn Phát', '134', '42300', '2021-10-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
