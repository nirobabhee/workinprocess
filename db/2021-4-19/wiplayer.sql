-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2021 at 05:26 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_id`, `menu_admin_name`, `menu_admin_parent_menu`, `menu_admin_child`, `menu_admin_url`, `menu_admin_icon`, `menu_admin_sort_order`, `menu_admin_user_privilege`, `menu_admin_chain`, `menu_admin_type`, `menu_admin_status`) VALUES
(1, 'Developer', 0, '2,4,6,7,8', NULL, 'fa fa-lg fa-fw fa-code', 20, 'developer', '1', 'side_menu', 'active'),
(2, 'Admin Menu Setting', 1, '14,15', '', 'fa fa-lg fa-fw fa-bookmark-o', 1, 'developer', '1,2', 'side_menu', 'active'),
(3, 'USER', 0, '', 'ironman/user_c', 'fal fa-user', 2, 'developer', '', 'side_menu', 'active'),
(4, 'SMS', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,3', 'left_top_nav', 'active'),
(5, 'Report 1', 0, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '5', 'right_nav', 'active'),
(6, 'Report 2', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,2', 'mobile_top_menu', 'active'),
(7, 'Report 3', 1, '', 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,5', 'right_nav', 'active'),
(8, 'Link Page', 0, '', 'home_c', 'fa fa-lg fa-fw fa-info', 100, 'accounts', '8', 'side_menu', 'active'),
(15, 'Menu', 2, '', 'ironman/menu_setting_c', 'fal fa-crown', 3, 'accounts', '', 'side_menu', 'active'),
(14, 'Xaviera Curtis', 2, '', 'Dolor consectetur et', 'gucyxigah', 20, '', '1,2,14', 'side_menu', 'active'),
(16, 'Trial', 8, '', 'ironman/basic_table_c', 'fal fa-crown', 2, 'audit', '8,16', 'side_menu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `rm_id` int NOT NULL AUTO_INCREMENT,
  `rm_name` varchar(65) NOT NULL,
  `rm_sku` varchar(30) NOT NULL,
  `rm_category` int NOT NULL,
  `rm_attribute` varchar(30) NOT NULL,
  `rm_unit_of_production` int NOT NULL,
  `rm_unit_of_purchase` int NOT NULL,
  `rm_unit_conversion` varchar(256) NOT NULL,
  `rm_minimum_stock_level` int NOT NULL,
  `rm_maximum_stock_level` int NOT NULL,
  `rm_unit_price` double(35,5) NOT NULL,
  `rm_image` varchar(50) NOT NULL,
  `rm_tag` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`rm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`rm_id`, `rm_name`, `rm_sku`, `rm_category`, `rm_attribute`, `rm_unit_of_production`, `rm_unit_of_purchase`, `rm_unit_conversion`, `rm_minimum_stock_level`, `rm_maximum_stock_level`, `rm_unit_price`, `rm_image`, `rm_tag`) VALUES
(1, 'hhhhgff', '11', 1, 'ff', 1, 1, 'ff', 522, 41, 561.00000, '', NULL),
(2, 'ggg', 'ggg', 2, 'ggg', 1, 1, 'ggg', 555, 52, 666.00000, 'raw_material_1618738811.jpg', 'hello'),
(3, 'Lisandra Morton', 'Dolorem ut cupidatat', 3, '3', 1, 2, '555', 70, 70, 99.00000, '', 'he');

-- --------------------------------------------------------

--
-- Table structure for table `rm_attribute`
--

DROP TABLE IF EXISTS `rm_attribute`;
CREATE TABLE IF NOT EXISTS `rm_attribute` (
  `rm_attribute_id` int NOT NULL AUTO_INCREMENT,
  `rm_attribute_name` varchar(65) NOT NULL,
  PRIMARY KEY (`rm_attribute_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_attribute`
--

INSERT INTO `rm_attribute` (`rm_attribute_id`, `rm_attribute_name`) VALUES
(1, 'light'),
(2, 'lacquer'),
(3, 'white'),
(4, 'red'),
(5, 'blue'),
(6, 'black');

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
(1, 'solid', '1', '1', 'active'),
(2, 'liquid', '2', '2', 'active'),
(3, 'metal', '1,3', '3', 'active'),
(4, 'plastic', '1,4', '4', 'active'),
(5, 'chemical', '2,5', '5', 'active'),
(6, 'combustible', '2,5,6', '6', 'active'),
(7, 'gas', '7', '7', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `setting_backend`
--

DROP TABLE IF EXISTS `setting_backend`;
CREATE TABLE IF NOT EXISTS `setting_backend` (
  `setting_backend_id` int NOT NULL AUTO_INCREMENT,
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

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'pcs'),
(2, 'sft');

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_phone`, `user_email`, `user_password`, `user_full_name`, `user_group`, `user_section`, `user_picture`, `user_mac_address`, `user_status`, `user_godown`, `user_crud`, `user_theme_settings`) VALUES
(42, '0158-6215874', 'mukul@gmail.com', '12345', 'Mukul', 'it', 0, 'http://localhost:8080/user_img/sample_image.jpg', '12:45:78:96:63:32', '', 0, 'c,r,u,d', ''),
(40, '01825181825', 'nirob@gmail.com', 'nirob@gmail.com', 'Nirob', 'it', 1, '', 'https://chat.google.com/dm/oIbFjQAAAAE', 'active', 0, 'c,r,u,d', ''),
(41, '(0193)-2154885', 'solaiman@gmail.com', 'solaiman@gmail.com', 'Solaiman', 'accounts', 1, '', '01:45:24:11:10:00', 'active', 1, 'r,u,d', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
