-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2021 at 04:49 AM
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
-- Table structure for table `lineup`
--

DROP TABLE IF EXISTS `lineup`;
CREATE TABLE IF NOT EXISTS `lineup` (
  `lineup_id` int(11) NOT NULL AUTO_INCREMENT,
  `lineup_code` varchar(50) NOT NULL,
  `lineup_name` varchar(50) NOT NULL,
  `lineup_section` json NOT NULL,
  `lineup_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`lineup_id`),
  UNIQUE KEY `lineup_code` (`lineup_code`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lineup`
--

INSERT INTO `lineup` (`lineup_id`, `lineup_code`, `lineup_name`, `lineup_section`, `lineup_status`) VALUES
(2, 'asdf123', 'asdf', '[{\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"1\", \"section_name\": \"1\"}, {\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"0\", \"section_name\": \"2\"}, {\"location_id\": \"1\", \"process_day\": \"0\", \"short_order\": \"0\", \"section_name\": \"3\"}]', 'active'),
(3, 'asdf1234', 'asdf123', '[{\"location_id\": \"1\", \"process_day\": \"4\", \"short_order\": \"1\", \"section_name\": \"1\"}, {\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"2\", \"section_name\": \"3\"}]', 'active'),
(4, 'A1', 'A1', '[{\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"1\", \"section_name\": \"1\"}, {\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"0\", \"section_name\": \"2\"}]', 'active'),
(5, 'A2', 'A2', '[{\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"1\", \"section_name\": \"1\"}, {\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"2\", \"section_name\": \"2\"}, {\"location_id\": \"1\", \"process_day\": \"1\", \"short_order\": \"2\", \"section_name\": \"4\"}]', 'active'),
(6, 'A3', 'A3', '[{\"location_id\": \"1\", \"process_day\": \"4\", \"short_order\": \"2\", \"section_name\": \"1\"}, {\"location_id\": \"1\", \"process_day\": \"3\", \"short_order\": \"3\", \"section_name\": \"2\"}, {\"location_id\": \"1\", \"process_day\": \"4\", \"short_order\": \"1\", \"section_name\": \"\"}]', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
