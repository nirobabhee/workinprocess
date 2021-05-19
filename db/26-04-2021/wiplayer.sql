-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2021 at 08:36 AM
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
-- Table structure for table `fg_category`
--

DROP TABLE IF EXISTS `fg_category`;
CREATE TABLE IF NOT EXISTS `fg_category` (
  `fg_category_id` int NOT NULL AUTO_INCREMENT,
  `fg_category_name` varchar(65) NOT NULL,
  `fg_category_chain_parent` varchar(40) NOT NULL,
  `fg_category_chain_child` varchar(40) NOT NULL,
  `fg_category_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`fg_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fg_category`
--

INSERT INTO `fg_category` (`fg_category_id`, `fg_category_name`, `fg_category_chain_parent`, `fg_category_chain_child`, `fg_category_status`) VALUES
(23, 'black oil', '23', '23,24', 'inactive'),
(24, 'black-100', '23,24', '24', 'inactive'),
(28, 'oil-o', '28', '28,29', 'active'),
(27, 'Grij', '22,27', '27', 'active'),
(26, 'ss-steal', '26', '26', 'active'),
(25, 'iron', '25', '25', 'active'),
(22, 'Liquid', '22', '22,27', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fg_godown`
--

DROP TABLE IF EXISTS `fg_godown`;
CREATE TABLE IF NOT EXISTS `fg_godown` (
  `fg_godown_id` int NOT NULL AUTO_INCREMENT,
  `fg_godown_name` varchar(50) NOT NULL,
  `fg_godown_chain_parent` varchar(40) NOT NULL,
  `fg_godown_chain_child` varchar(40) NOT NULL,
  `fg_godown_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`fg_godown_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fg_godown`
--

INSERT INTO `fg_godown` (`fg_godown_id`, `fg_godown_name`, `fg_godown_chain_parent`, `fg_godown_chain_child`, `fg_godown_status`) VALUES
(1, 'good', '1', '1,2,3', 'inactive'),
(2, 'very', '1,2', '2,3', 'active'),
(3, 'best', '1,2,3', '3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `menu_admin`
--

DROP TABLE IF EXISTS `menu_admin`;
CREATE TABLE IF NOT EXISTS `menu_admin` (
  `menu_admin_id` int NOT NULL AUTO_INCREMENT,
  `menu_admin_name` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_parent_menu` int NOT NULL DEFAULT '0',
  `menu_admin_url` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `menu_admin_icon` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'fa fa-lg fa-fw fa-info',
  `menu_admin_sort_order` int NOT NULL,
  `menu_admin_user_privilege` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '''developer'',''management'',''accounts'',''administrator'',''pd'',''qc'',''pdqms'',''wip_incharge'',''wip'',''store_incharge'',''store'',''purchase_and_procurement'',''logistic'',''marketing'',''hr'',''audit'',''interior'',''data_entry''',
  `menu_admin_chain` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_type` enum('side_menu','left_top_nav','right_nav','mobile_top_menu') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `menu_admin_status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`menu_admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_id`, `menu_admin_name`, `menu_admin_parent_menu`, `menu_admin_url`, `menu_admin_icon`, `menu_admin_sort_order`, `menu_admin_user_privilege`, `menu_admin_chain`, `menu_admin_type`, `menu_admin_status`) VALUES
(1, 'Developer', 0, '', 'fa fa-lg fa-fw fa-code', 20, 'accounts,administrator,audit,data_entry,developer', '', 'side_menu', 'active'),
(2, 'Admin Menu Setting', 1, '', 'fa fa-lg fa-fw fa-bookmark-o', 1, 'developer', '1,2', 'side_menu', 'active'),
(3, 'USER', 0, 'ironman/user_c', 'fal fa-user', 2, 'accounts,administrator,audit,developer,hr', '', 'side_menu', 'active'),
(5, 'Report 1', 0, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '5', 'right_nav', 'inactive'),
(6, 'Mobile menu 2', 0, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 3, 'developer', '', 'mobile_top_menu', 'active'),
(7, 'Report 3', 1, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,5', 'right_nav', 'active'),
(8, 'Link Page', 0, 'home_c', 'fa fa-lg fa-fw fa-info', 100, 'accounts,administrator', '', 'side_menu', 'active'),
(15, 'Menu', 1, 'ironman/menu_setting_c', 'fal fa-crown', 3, 'accounts', '', 'side_menu', 'active'),
(14, 'Xaviera Curtis', 2, 'Dolor consectetur et', 'fal fa-user', 20, 'administrator', '', 'side_menu', 'inactive'),
(16, 'Trial', 0, 'ironman/basic_table_c', 'fal fa-crown', 2, 'developer', '', 'side_menu', 'active'),
(17, 'Raw Material', 0, 'ironman/raw_material_c', 'fal fa-crown', 4, 'accounts', '', 'side_menu', 'inactive'),
(22, 'p-child', 0, '', '', 101, 'accounts', '', 'side_menu', 'inactive'),
(20, 'Menu top', 0, '/ironman/menu_setting_c/', 'fa fa-lg fa-fw fa-info', 2, 'administrator,developer', '', 'side_menu', 'inactive'),
(23, 'menu', 0, '', '', 55, 'accounts,administrator,audit,developer,hr,it,interior,management,marketing,pd,pdqms,purchase_and_procurement', '', 'side_menu', 'inactive'),
(27, 'Top mmmm', 0, '', '', 2, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '27', 'side_menu', 'inactive'),
(24, 'Menu', 0, '', '', 22, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '24', 'side_menu', 'inactive'),
(25, 'menu3', 0, '', '', 33, 'accounts,administrator,audit,hr,it,logistic', '', 'side_menu', 'inactive'),
(26, 'menu', 0, '', '', 1, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '26', 'side_menu', 'inactive'),
(35, 'Left Top Menu', 0, '', '', 1, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing', '', 'left_top_nav', 'inactive'),
(31, 'left top', 0, 'Kim Mcdonald', 'Delectus modi sequi', 5, 'interior,logistic,pd,pdqms', '', 'side_menu', 'inactive'),
(33, 'Right Top Menu', 0, '', '', 4, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '33', 'right_nav', 'active'),
(34, 'Mobile menu', 0, '', '', 2, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '', 'mobile_top_menu', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`rm_id`, `rm_name`, `rm_sku`, `rm_category`, `rm_attribute`, `rm_unit_price`, `rm_cost_price`, `rm_minimum_stock_level`, `rm_maximum_stock_level`, `rm_image`, `rm_tag`) VALUES
(3, 'Tarpin', 'ABC', 6, '1,2,4', 10.00000, 20.00000, 20, 30, 'raw_material_ABC.jpg', 'NIROB'),
(4, 'Oil', 'ZYX', 5, '1,2,3,4,5,6', 2.00000, 1.00000, 2, 5, 'raw_material_ZYX.jpg', 'NAFIZ');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_category`
--

INSERT INTO `rm_category` (`rm_category_id`, `rm_category_name`, `rm_category_chain_parent`, `rm_category_chain_child`, `rm_category_status`) VALUES
(1, 'solid', '1', '1,9,14', 'active'),
(2, 'liquid', '2', '2,8', 'active'),
(3, 'metal', '1,3', '3,9', 'active'),
(4, 'plastic', '1,4', '4', 'active'),
(5, 'chemical', '2,5', '5,8', 'active'),
(6, 'combustible', '2,5,6', '6', 'active'),
(7, 'gas', '7', '7', 'inactive'),
(8, 'ddd', '2,5,8', '8', 'active'),
(9, 'iron', '1,3,9', '9', 'inactive'),
(10, 'Wood', '10', '10,11,12,13', 'active'),
(11, 'goran wood', '10,11', '11', 'active'),
(13, 'zoo', '10,13', '13', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rm_godown`
--

DROP TABLE IF EXISTS `rm_godown`;
CREATE TABLE IF NOT EXISTS `rm_godown` (
  `rm_godown_id` int NOT NULL AUTO_INCREMENT,
  `rm_godown_name` varchar(50) NOT NULL,
  `rm_godown_chain_parent` varchar(40) NOT NULL,
  `rm_godown_chain_child` varchar(40) NOT NULL,
  `rm_godown_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`rm_godown_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_godown`
--

INSERT INTO `rm_godown` (`rm_godown_id`, `rm_godown_name`, `rm_godown_chain_parent`, `rm_godown_chain_child`, `rm_godown_status`) VALUES
(1, 'Raw Material', '1', '1,2,3', 'active'),
(2, 'Pin', '1,2', '2,3', 'active'),
(3, 'Tarpin', '1,2,3', '3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int NOT NULL AUTO_INCREMENT,
  `section_name` varchar(50) NOT NULL,
  `section_chain_parent` varchar(40) NOT NULL,
  `section_chain_child` varchar(40) NOT NULL,
  `section_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `section_chain_parent`, `section_chain_child`, `section_status`) VALUES
(12, 'red wood', '11,12', '12', 'active'),
(11, 'wood', '11', '11,12', 'active');

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
(1, 'ICT Layer12', '0193-9835112', '0123545981112', 'ictlayer@gmail.com', 'dhaka', 150, 12, '');

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
  `user_rm_godown` varchar(40) NOT NULL,
  `user_fg_godown` varchar(40) NOT NULL,
  `user_crud` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'c,r,u,d',
  `user_theme_settings` char(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_phone` (`user_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_phone`, `user_email`, `user_password`, `user_full_name`, `user_group`, `user_section`, `user_picture`, `user_mac_address`, `user_status`, `user_rm_godown`, `user_fg_godown`, `user_crud`, `user_theme_settings`) VALUES
(42, '0158-6215874', 'mukul@gmail.com', 'mukul@gmail.com', 'Mukul', 'it', 0, 'http://localhost:8080/user_img/sample_image.jpg', '12:45:78:96:63:32', 'active', 'rm_godown-1', 'fg_godown-1', 'c,r,u,d', ''),
(47, '00000000000', 'nirob@gmail.com', 'nirob@gmail.com', 'Nirob', 'developer', 4, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '1', '1', 'c,r,u,d', ''),
(41, '01932154885', 'solaiman@gmail.com', 'solaiman@gmail.com', 'Solaiman', 'accounts', 1, '', '01:45:24:11:10:00', 'active', 'rm_godown-1', '', 'r,u,', ''),
(44, '01333333333', 'nafiz@gmail.com', 'nafiz@gmail.com', 'Nafiz', 'it', 2, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '1', '1', 'c,r,u,d', ''),
(45, '01587452122', 'tanay@yahoo.com', 'tanay@yahoo.com', 'Tanay', 'developer', 0, 'http://localhost:8080/user_img/sample_image.jpg', '45:44:44:44:44:55', 'inactive', '2', '3', 'c,r,u,d', ''),
(46, '01587452120', 'salehin@yahoo.com', 'salehin@yahoo.com', 'Salehin', 'it', 0, 'http://localhost:8080/user_img/sample_image.jpg', '45:44:44:44:44:55', 'inactive', '2', '3', 'c,r,u,d', ''),
(48, '11355575418', 'nirobshekh@gmail.comapamailina', 'Illum et maiores en', 'Amaya Sykes', 'wip_incharge', 4, 'http://localhost:8080/user_img/sample_image.jpg', '16:26:51:35:41:9_', 'active', '1', '2', 'c,r,u,d', ''),
(49, '14036038751', 'ictlayer@gmail.com', 'ictlayer@gmail.com', 'JONYs', 'supplier', 1, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '1', '2', 'c', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;