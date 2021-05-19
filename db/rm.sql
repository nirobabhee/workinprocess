-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2021 at 09:08 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiplayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

DROP TABLE IF EXISTS `rm`;
CREATE TABLE IF NOT EXISTS `rm` (
  `rm_id` int NOT NULL AUTO_INCREMENT,
  `rm_name` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rm_sku` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rm_category` int NOT NULL,
  `rm_attribute` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rm_unit_price` double(35,5) NOT NULL,
  `rm_cost_price` double(35,5) NOT NULL,
  `rm_minimum_stock_level` int NOT NULL,
  `rm_maximum_stock_level` int NOT NULL,
  `rm_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rm_tag` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`rm_id`),
  UNIQUE KEY `rm_sku` (`rm_sku`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm`
--

INSERT INTO `rm` (`rm_id`, `rm_name`, `rm_sku`, `rm_category`, `rm_attribute`, `rm_unit_price`, `rm_cost_price`, `rm_minimum_stock_level`, `rm_maximum_stock_level`, `rm_image`, `rm_tag`) VALUES
(1, 'DEF', 'ABC', 4, '2,4', 10.00000, 15.00000, 1, 5, 'raw_material_ABC.jpg', 'NONE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
