-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2021 at 06:03 AM
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
-- Table structure for table `menu_admin`
--

DROP TABLE IF EXISTS `menu_admin`;
CREATE TABLE IF NOT EXISTS `menu_admin` (
  `menu_admin_id` int NOT NULL AUTO_INCREMENT,
  `menu_admin_name` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_parent_menu` int NOT NULL DEFAULT '0',
  `menu_admin_child` varchar(30) NOT NULL,
  `menu_admin_url` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `menu_admin_icon` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'fa fa-lg fa-fw fa-info',
  `menu_admin_sort_order` int NOT NULL,
  `menu_admin_user_privilege` enum('developer','management','accounts','administrator','pd','qc','pdqms','wip_incharge','wip','store_incharge','store','purchase_and_procurement','logistic','marketing','hr','audit','interior','data_entry') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_chain` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_type` enum('side_menu','left_top_nav','right_nav','mobile_top_menu') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`menu_admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_id`, `menu_admin_name`, `menu_admin_parent_menu`, `menu_admin_child`, `menu_admin_url`, `menu_admin_icon`, `menu_admin_sort_order`, `menu_admin_user_privilege`, `menu_admin_chain`, `menu_admin_type`, `menu_admin_status`) VALUES
(1, 'Developer', 0, '2,4,6,7,8', NULL, 'fa fa-lg fa-fw fa-code', 20, 'developer', '1', 'side_menu', 'active'),
(2, 'Admin Menu Setting', 1, '14,15', '', 'fa fa-lg fa-fw fa-bookmark-o', 1, 'developer', '1,2', 'side_menu', 'active'),
(3, 'SMS', 0, '', '', 'fa fa-lg fa-fw fa-send', 2, 'developer', '3', 'side_menu', 'active'),
(4, 'SMS', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,3', 'left_top_nav', 'active'),
(5, 'Report 1', 0, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '5', 'right_nav', 'active'),
(6, 'Report 2', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,2', 'mobile_top_menu', 'active'),
(7, 'Report 3', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,5', 'right_nav', 'active'),
(8, 'test', 0, '', '', 'fa fa-lg fa-fw fa-info', 22, 'accounts', '1,2', 'side_menu', 'active'),
(15, 'Florence Stanton', 2, '', 'Ut nihil aut quaerat', 'gyqugahe', 48, 'audit', '1,2,15', 'side_menu', 'active'),
(14, 'Xaviera Curtis', 2, '', 'Dolor consectetur et', 'gucyxigah', 9, '', '1,2,14', 'side_menu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_phone` char(15) NOT NULL,
  `user_email` char(30) NOT NULL,
  `user_password` char(30) NOT NULL,
  `user_full_name` char(50) NOT NULL,
  `user_group` enum('developer','management','accounts','administrator','pd','qc','pdqms','wip_incharge','wip','store_incharge','store','purchase_and_procurement','logistic','marketing','hr','audit','interior','data_entry','it','sales_person','supplier') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_section` int DEFAULT NULL,
  `user_picture` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'http://localhost:8080/user_img/sample_image.jpg',
  `user_mac_address` char(255) DEFAULT NULL,
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `user_godown` int DEFAULT NULL,
  `user_crud` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'c,r,u,d',
  `user_theme_settings` char(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_phone` (`user_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_phone`, `user_email`, `user_password`, `user_full_name`, `user_group`, `user_section`, `user_picture`, `user_mac_address`, `user_status`, `user_godown`, `user_crud`, `user_theme_settings`) VALUES
(1, '01303397704', 'info@and.com.bd', 'info@and.com.bd', 'ICTLayer', 'developer', 1, '', NULL, 'active', NULL, 'c,r,u,d', ''),
(35, '1212121', 'karim@gmail.com', '1212121', 'karim', 'accounts', 3, '', '', 'active', 0, 'on,on', ''),
(3, '01844096541', 'admin@gmail.com', 'admin@gmail.com', 'Admin', 'developer', 1, '', NULL, 'active', NULL, 'c,r', ''),
(38, '566566', 'fyxin@mailinator.com', '566566', 'Lynn Sharpe nafiz', 'supplier', 0, '', '+1 (799) 163-9788', 'active', 0, 'on', ''),
(39, '121245457878', 'karim2@gmail.com', '121245457878', 'karim2', 'accounts', 0, '', '', 'active', 0, 'on', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
