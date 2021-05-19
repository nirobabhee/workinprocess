-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2021 at 05:31 AM
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
-- Table structure for table `chat_messenger`
--

DROP TABLE IF EXISTS `chat_messenger`;
CREATE TABLE IF NOT EXISTS `chat_messenger` (
  `cm_id` int NOT NULL AUTO_INCREMENT,
  `cm_sender` int NOT NULL,
  `cm_receiver` int NOT NULL,
  `cm_date_time` datetime NOT NULL,
  `cm_message` text NOT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_messenger`
--

INSERT INTO `chat_messenger` (`cm_id`, `cm_sender`, `cm_receiver`, `cm_date_time`, `cm_message`) VALUES
(1, 1, 40, '2021-04-29 14:59:52', 'Hello !'),
(2, 1, 40, '2021-05-02 01:43:33', 'who are you !'),
(3, 40, 3, '2021-05-02 01:57:20', 'Hi Admin !'),
(4, 40, 3, '2021-05-02 01:58:36', 'How are you admin ?'),
(5, 40, 3, '2021-05-02 01:59:29', 'Yessss !');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
