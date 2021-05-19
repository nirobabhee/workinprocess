-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2021 at 11:03 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

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
-- Table structure for table `bom`
--

DROP TABLE IF EXISTS `bom`;
CREATE TABLE IF NOT EXISTS `bom` (
  `bom_id` int NOT NULL AUTO_INCREMENT,
  `bom_fg_id` int NOT NULL,
  `bom_fg_attribute` varchar(50) NOT NULL,
  `bom_created_by` varchar(50) NOT NULL,
  `bom_approved_by` varchar(50) NOT NULL,
  `bom_details` text NOT NULL COMMENT 'json for bom details',
  `bom_status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'enum active or inactive..if bom authorization not approved then status = inactive',
  `bom_authorization` enum('approved','pending') NOT NULL COMMENT 'enum approved and pending',
  `bom_json` json NOT NULL,
  PRIMARY KEY (`bom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`bom_id`, `bom_fg_id`, `bom_fg_attribute`, `bom_created_by`, `bom_approved_by`, `bom_details`, `bom_status`, `bom_authorization`, `bom_json`) VALUES
(1, 0, '', '', '', '{\"\":[{\"bom_name\":\"Galvin Lawrence\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"73\",\"bom_length_mixture\":\"98\",\"bom_width\":\"32\",\"bom_width_mixture\":\"57\",\"bom_thickness\":\"31\",\"bom_thickness_mixture\":\"20\",\"bom_machine\":\"Consequuntur sapient\",\"bom_machine_uses_hours\":\"85\",\"bom_per_person\":\"96\",\"bom_per_person_hours\":\"63\",\"bom_qty\":\"526\",\"bom_wastage_max_percent\":\"93\",\"bom_final_qty\":\"392\",\"bom_unit_price\":\"829\",\"bom_total_cost\":\"93\",\"bom_start_day\":\"2\",\"bom_end_day\":\"27\"},{\"bom_name\":\"Winter Ashley\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"98\",\"bom_length_mixture\":\"97\",\"bom_width\":\"46\",\"bom_width_mixture\":\"77\",\"bom_thickness\":\"73\",\"bom_thickness_mixture\":\"13\",\"bom_machine\":\"Dolorem consectetur \",\"bom_machine_uses_hours\":\"32\",\"bom_per_person\":\"8\",\"bom_per_person_hours\":\"68\",\"bom_qty\":\"65\",\"bom_wastage_max_percent\":\"46\",\"bom_final_qty\":\"889\",\"bom_unit_price\":\"817\",\"bom_total_cost\":\"12\",\"bom_start_day\":\"16\",\"bom_end_day\":\"27\"}]}', 'active', 'approved', 'null'),
(2, 0, '', '', '', '{\"red wood\":[{\"bom_name\":\"Galvin Lawrence\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"73\",\"bom_length_mixture\":\"98\",\"bom_width\":\"32\",\"bom_width_mixture\":\"57\",\"bom_thickness\":\"31\",\"bom_thickness_mixture\":\"20\",\"bom_machine\":\"Consequuntur sapient\",\"bom_machine_uses_hours\":\"85\",\"bom_per_person\":\"96\",\"bom_per_person_hours\":\"63\",\"bom_qty\":\"526\",\"bom_wastage_max_percent\":\"93\",\"bom_final_qty\":\"392\",\"bom_unit_price\":\"829\",\"bom_total_cost\":\"93\",\"bom_start_day\":\"2\",\"bom_end_day\":\"27\"},{\"bom_name\":\"Winter Ashley\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"98\",\"bom_length_mixture\":\"97\",\"bom_width\":\"46\",\"bom_width_mixture\":\"77\",\"bom_thickness\":\"73\",\"bom_thickness_mixture\":\"13\",\"bom_machine\":\"Dolorem consectetur \",\"bom_machine_uses_hours\":\"32\",\"bom_per_person\":\"8\",\"bom_per_person_hours\":\"68\",\"bom_qty\":\"65\",\"bom_wastage_max_percent\":\"46\",\"bom_final_qty\":\"889\",\"bom_unit_price\":\"817\",\"bom_total_cost\":\"12\",\"bom_start_day\":\"16\",\"bom_end_day\":\"27\"}]}', 'active', 'approved', 'null'),
(3, 0, '', '', '', '{\"wood\":[{\"bom_name\":\"Daniel Chen\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"80\",\"bom_length_mixture\":\"39\",\"bom_width\":\"60\",\"bom_width_mixture\":\"24\",\"bom_thickness\":\"95\",\"bom_thickness_mixture\":\"27\",\"bom_machine\":\"Charger Drill Machine\",\"bom_machine_uses_hours\":\"11\",\"bom_per_person\":\"21\",\"bom_per_person_hours\":\"59\",\"bom_qty\":\"819\",\"bom_wastage_max_percent\":\"40\",\"bom_final_qty\":\"0\",\"bom_unit_price\":\"847\",\"bom_total_cost\":\"0\",\"bom_start_day\":\"3\",\"bom_end_day\":\"19\",\"bom_section\":\"wood\"},{\"bom_name\":\"Basil Gonzales\",\"bom_alternative\":\"As per demand\",\"bom_length\":\"56\",\"bom_length_mixture\":\"54\",\"bom_width\":\"84\",\"bom_width_mixture\":\"81\",\"bom_thickness\":\"70\",\"bom_thickness_mixture\":\"17\",\"bom_machine\":\"Leg Cutter Machine\",\"bom_machine_uses_hours\":\"53\",\"bom_per_person\":\"16\",\"bom_per_person_hours\":\"28\",\"bom_qty\":\"311\",\"bom_wastage_max_percent\":\"47\",\"bom_final_qty\":\"0\",\"bom_unit_price\":\"239\",\"bom_total_cost\":\"0\",\"bom_start_day\":\"6\",\"bom_end_day\":\"15\",\"bom_section\":\"wood\"}]}', 'active', 'approved', 'null'),
(4, 0, '', '', '', '{\r\n    \"redwood\": [\r\n        {\r\n            \"bom_name\": \"Daniel Chen\",\r\n            \"bom_alternative\": \"As per demand\",\r\n            \"bom_length\": \"80\",\r\n            \"bom_length_mixture\": \"39\",\r\n            \"bom_width\": \"60\",\r\n            \"bom_width_mixture\": \"24\",\r\n            \"bom_thickness\": \"95\",\r\n            \"bom_thickness_mixture\": \"27\",\r\n            \"bom_machine\": \"Charger Drill Machine\",\r\n            \"bom_machine_uses_hours\": \"11\",\r\n            \"bom_per_person\": \"21\",\r\n            \"bom_per_person_hours\": \"59\",\r\n            \"bom_qty\": \"819\",\r\n            \"bom_wastage_max_percent\": \"40\",\r\n            \"bom_final_qty\": \"0\",\r\n            \"bom_unit_price\": \"847\",\r\n            \"bom_total_cost\": \"0\",\r\n            \"bom_start_day\": \"3\",\r\n            \"bom_end_day\": \"19\",\r\n            \"bom_section\": \"red wood\"\r\n        },\r\n        {\r\n            \"bom_name\": \"Basil Gonzales\",\r\n            \"bom_alternative\": \"As per demand\",\r\n            \"bom_length\": \"56\",\r\n            \"bom_length_mixture\": \"54\",\r\n            \"bom_width\": \"84\",\r\n            \"bom_width_mixture\": \"81\",\r\n            \"bom_thickness\": \"70\",\r\n            \"bom_thickness_mixture\": \"17\",\r\n            \"bom_machine\": \"Leg Cutter Machine\",\r\n            \"bom_machine_uses_hours\": \"53\",\r\n            \"bom_per_person\": \"16\",\r\n            \"bom_per_person_hours\": \"28\",\r\n            \"bom_qty\": \"311\",\r\n            \"bom_wastage_max_percent\": \"47\",\r\n            \"bom_final_qty\": \"0\",\r\n            \"bom_unit_price\": \"239\",\r\n            \"bom_total_cost\": \"0\",\r\n            \"bom_start_day\": \"6\",\r\n            \"bom_end_day\": \"15\",\r\n            \"bom_section\": \"red wood\"\r\n        }\r\n    ],\r\n    \"wood\": [\r\n        {\r\n            \"bom_name\": \"Daniel Chen\",\r\n            \"bom_alternative\": \"As per demand\",\r\n            \"bom_length\": \"80\",\r\n            \"bom_length_mixture\": \"39\",\r\n            \"bom_width\": \"60\",\r\n            \"bom_width_mixture\": \"24\",\r\n            \"bom_thickness\": \"95\",\r\n            \"bom_thickness_mixture\": \"27\",\r\n            \"bom_machine\": \"Charger Drill Machine\",\r\n            \"bom_machine_uses_hours\": \"11\",\r\n            \"bom_per_person\": \"21\",\r\n            \"bom_per_person_hours\": \"59\",\r\n            \"bom_qty\": \"819\",\r\n            \"bom_wastage_max_percent\": \"40\",\r\n            \"bom_final_qty\": \"0\",\r\n            \"bom_unit_price\": \"847\",\r\n            \"bom_total_cost\": \"0\",\r\n            \"bom_start_day\": \"3\",\r\n            \"bom_end_day\": \"19\",\r\n            \"bom_section\": \"wood\"\r\n        },\r\n        {\r\n            \"bom_name\": \"Basil Gonzales\",\r\n            \"bom_alternative\": \"As per demand\",\r\n            \"bom_length\": \"56\",\r\n            \"bom_length_mixture\": \"54\",\r\n            \"bom_width\": \"84\",\r\n            \"bom_width_mixture\": \"81\",\r\n            \"bom_thickness\": \"70\",\r\n            \"bom_thickness_mixture\": \"17\",\r\n            \"bom_machine\": \"Leg Cutter Machine\",\r\n            \"bom_machine_uses_hours\": \"53\",\r\n            \"bom_per_person\": \"16\",\r\n            \"bom_per_person_hours\": \"28\",\r\n            \"bom_qty\": \"311\",\r\n            \"bom_wastage_max_percent\": \"47\",\r\n            \"bom_final_qty\": \"0\",\r\n            \"bom_unit_price\": \"239\",\r\n            \"bom_total_cost\": \"0\",\r\n            \"bom_start_day\": \"6\",\r\n            \"bom_end_day\": \"15\",\r\n            \"bom_section\": \"wood\"\r\n        }\r\n    ]\r\n}', 'active', 'approved', 'null');

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
-- Table structure for table `lineup`
--

DROP TABLE IF EXISTS `lineup`;
CREATE TABLE IF NOT EXISTS `lineup` (
  `lineup_id` int NOT NULL AUTO_INCREMENT,
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

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) NOT NULL,
  `location_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `location_status`) VALUES
(1, 'Hemayetpur', 'active'),
(2, 'Birulia', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

DROP TABLE IF EXISTS `machine`;
CREATE TABLE IF NOT EXISTS `machine` (
  `machine_id` int NOT NULL AUTO_INCREMENT,
  `machine_name` varchar(50) NOT NULL,
  PRIMARY KEY (`machine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_name`) VALUES
(1, 'N/A'),
(2, 'Swing machine-1'),
(3, 'Leg Cutter Machine'),
(4, 'Hand Trimmer Machine'),
(5, 'Hot Air Gun'),
(6, 'Charger Drill Machine');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_id`, `menu_admin_name`, `menu_admin_parent_menu`, `menu_admin_url`, `menu_admin_icon`, `menu_admin_sort_order`, `menu_admin_user_privilege`, `menu_admin_chain`, `menu_admin_type`, `menu_admin_status`) VALUES
(1, 'Developer', 0, '', 'fa fa-lg fa-fw fa-code', 20, 'accounts,administrator,audit,data_entry,developer', '', 'side_menu', 'active'),
(2, 'Admin Menu Setting', 1, '', 'fa fa-lg fa-fw fa-bookmark-o', 1, 'developer', '1,2', 'side_menu', 'active'),
(3, 'USER', 0, 'ironman/user_c', 'fal fa-user', 2, 'accounts,administrator,audit,developer,hr', '', 'side_menu', 'active'),
(5, 'Report 1', 0, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '5', 'right_nav', 'active'),
(6, 'Report 2', 1, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,2', 'mobile_top_menu', 'inactive'),
(7, 'Report 3', 1, 'superman/sms_controller/sms_option', 'fa fa-lg fa-fw fa-send', 2, 'developer', '1,5', 'right_nav', 'active'),
(8, 'Link Page', 0, 'home_c', 'fa fa-lg fa-fw fa-info', 100, 'accounts,administrator', '', 'side_menu', 'active'),
(15, 'Menu', 1, 'ironman/menu_setting_c', 'fal fa-crown', 3, 'accounts', '', 'side_menu', 'active'),
(14, 'Xaviera Curtis', 2, 'Dolor consectetur et', 'fal fa-user', 20, 'administrator', '', 'side_menu', 'inactive'),
(16, 'Trial', 0, 'ironman/basic_table_c', 'fal fa-crown', 2, 'developer', '', 'side_menu', 'active'),
(17, 'Raw Material', 0, 'ironman/raw_material_c', 'fal fa-crown', 4, 'accounts', '', 'side_menu', 'active'),
(22, 'p-child', 0, '', '', 101, 'accounts', '', 'side_menu', 'inactive'),
(20, 'Menu top', 0, '/ironman/menu_setting_c/', 'fa fa-lg fa-fw fa-info', 2, 'developer', '1', 'left_top_nav', 'active'),
(23, 'menu', 0, '', '', 55, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '23', 'side_menu', 'inactive'),
(24, 'Menu', 0, '', '', 22, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '24', 'side_menu', 'active'),
(25, 'menu3', 0, '', '', 33, 'accounts,administrator,audit,hr,it,logistic', '', 'side_menu', 'inactive'),
(26, 'menu', 0, '', '', 1, 'accounts,administrator,audit,data_entry,developer,hr,it,interior,logistic,management,marketing,pd,pdqms,purchase_and_procurement,qc,sales_person,store_incharge,store,supplier,wip,wip_incharge', '26', 'side_menu', 'inactive');

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
  `rm_category_chain_parent` varchar(40) NOT NULL,
  `rm_category_chain_child` varchar(40) NOT NULL,
  `rm_category_parent_id` int NOT NULL DEFAULT '0',
  `rm_category_status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`rm_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_category`
--

INSERT INTO `rm_category` (`rm_category_id`, `rm_category_name`, `rm_category_chain_parent`, `rm_category_chain_child`, `rm_category_parent_id`, `rm_category_status`) VALUES
(1, 'Solid', '1', '1,3,5,6,4', 0, 'active'),
(2, 'Liquid', '2', '2,5,6', 0, 'active'),
(3, 'Metal', '1,3', '3,4,5,6', 1, 'active'),
(4, 'plastic', '1,3,4', '4', 1, 'active'),
(5, 'Chemical', '2,5', '5,6', 2, 'active'),
(6, 'Combustible ', '2,5,6', '6', 5, 'active'),
(7, 'Gas', '7', '7', 0, 'active');

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
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
  `user_login_status` enum('online','offline') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_phone` (`user_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_phone`, `user_email`, `user_password`, `user_full_name`, `user_group`, `user_section`, `user_picture`, `user_mac_address`, `user_status`, `user_rm_godown`, `user_fg_godown`, `user_crud`, `user_theme_settings`, `user_login_status`) VALUES
(42, '0158-6215874', 'mukul@gmail.com', 'mukul@gmail.com', 'Mukul', 'it', 0, 'http://localhost:8080/user_img/sample_image.jpg', '12:45:78:96:63:32', 'active', 'rm_godown-1', 'fg_godown-1', 'c,r,u,d', '', 'online'),
(40, '01825181825', 'nirob@gmail.com', '2e550cbb4b28608e215b7431d79a98ef', 'Nirobhhhhh', 'it', 0, '', 'https://chat.google.com/dm/oIbFjQAAAAE', 'active', '1', '1', 'c,r,u,d', '', 'online'),
(41, '01932154885', 'solaiman@gmail.com', 'solaiman@gmail.com', 'Solaiman', 'accounts', 1, '', '01:45:24:11:10:00', 'active', 'rm_godown-1', '', 'r,u,', '', 'online'),
(44, '01333333333', 'nafiz@gmail.com', 'nafiz@gmail.com', 'Nafiz', 'developer', 2, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '1', '1', 'c,r,u,d', '', 'online'),
(45, '01587452122', 'tanay@yahoo.com', 'tanay@yahoo.com', 'Tanay', 'developer', 0, 'http://localhost:8080/user_img/sample_image.jpg', '45:44:44:44:44:55', 'active', '2', '3', 'c,r,u,d', '', 'online'),
(46, '12121212121', '_@_._dakuzommailinator.com', 'Excepturi molestiae', 'Kadeem Wiley', 'accounts', 4, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '1', '2', 'c,r,d', '', 'online'),
(47, '77777777777', '_@_._xojimailinator.com', 'Distinctio Totam qu', 'Adrian Farley', 'audit', 1, 'http://localhost:8080/user_img/sample_image.jpg', '', 'active', '2', '2', 'u,d', '', 'online');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
