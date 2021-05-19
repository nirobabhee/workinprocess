-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2021 at 12:14 PM
-- Server version: 5.7.31
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
-- Table structure for table `setting_backend`
--

DROP TABLE IF EXISTS `setting_backend`;
CREATE TABLE IF NOT EXISTS `setting_backend` (
  `setting_backend_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_backend_company_name` char(50) NOT NULL,
  `setting_backend_phone` char(15) NOT NULL,
  `setting_backend_registration_no` char(30) NOT NULL,
  `setting_backend_email` char(30) NOT NULL,
  `setting_backend_address` char(255) NOT NULL,
  `setting_backend_vat` double DEFAULT '0',
  `setting_backend_tax` double DEFAULT NULL,
  `setting_backend_logo` char(255) NOT NULL,
  PRIMARY KEY (`setting_backend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_backend`
--

INSERT INTO `setting_backend` (`setting_backend_id`, `setting_backend_company_name`, `setting_backend_phone`, `setting_backend_registration_no`, `setting_backend_email`, `setting_backend_address`, `setting_backend_vat`, `setting_backend_tax`, `setting_backend_logo`) VALUES
(1, 'ICT Layer12', '0193-9835112', '0123545981112', 'ictlayer@gmail.com', 'dhaka', 155, 12, 'backend_logo.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
