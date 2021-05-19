-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2021 at 06:43 AM
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
-- Table structure for table `rm_category`
--

DROP TABLE IF EXISTS `rm_category`;
CREATE TABLE IF NOT EXISTS `rm_category` (
  `rm_category_id` int NOT NULL AUTO_INCREMENT,
  `rm_category_name` varchar(65) NOT NULL,
  `rm_category_chain_parent` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rm_category_chain_child` varchar(40) NOT NULL,
  `rm_category_status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`rm_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_category`
--

INSERT INTO `rm_category` (`rm_category_id`, `rm_category_name`, `rm_category_chain_parent`, `rm_category_chain_child`, `rm_category_status`) VALUES
(1, 'solid', '1', '1,3,4', 'active'),
(2, 'liquid', '2', '2,5,6', 'active'),
(3, 'metal', '1,3', '3', 'active'),
(4, 'plastic', '1,4', '4', 'active'),
(5, 'chemical', '2,5', '5,6', 'active'),
(6, 'combustible', '2,5,6', '6', 'active'),
(7, 'gas', '7', '7', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
