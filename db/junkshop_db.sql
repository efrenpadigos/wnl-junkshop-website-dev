-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2016 at 11:12 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `junkshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pos`
--

CREATE TABLE IF NOT EXISTS `admin_pos` (
  `admin_pos_id` int(20) NOT NULL AUTO_INCREMENT,
  `rs_no` varchar(50) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_pos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `admin_pos`
--

INSERT INTO `admin_pos` (`admin_pos_id`, `rs_no`, `item_category`, `item_description`, `unit`, `price`, `total`, `username`) VALUES
(13, 'RS-3437022', 'solid', 'kilo', '15', '10.00', '150', 'manang'),
(14, 'RS-3437022', 'bronze', 'kilo', '5', '150.00', '750', 'manang'),
(15, 'RS-3437022', 'bottles', 'piece', '20', '1.00', '20', 'manang'),
(16, 'RS-023223', 'solid', 'kilo', '30', '30.00', '900', 'manang'),
(17, 'RS-023223', 'bronze', 'kilo', '20', '150.00', '3000', 'manang'),
(18, 'RS-202334', 'solid', 'kilo', '30', '20.00', '600', 'bebe'),
(19, 'RS-202334', 'bronze', 'kilo', '3', '160.00', '480', 'bebe');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `capital` decimal(10,2) NOT NULL,
  PRIMARY KEY (`branch_id`),
  KEY `branch_name` (`branch_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `address`, `capital`) VALUES
(29, 'WNL MAIN', 'Monte Alegre Zamboanga del Sur', '5505.00'),
(32, 'WNL Kapatagan', 'Kapatagan lanao del norte', '1000.00'),
(33, 'WNL Maranding', 'Maranding lala lanao del norte', '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `collectors_credit`
--

CREATE TABLE IF NOT EXISTS `collectors_credit` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `new_credit` decimal(10,2) NOT NULL,
  `date_of_credit` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `address`, `cellphone`, `username`, `password`) VALUES
(3, 'Junril', 'Pateno', 'molave', '09094038147', 'lalang', '7af46676f8bb48e1bc6eca536fada549ad57f1cf'),
(4, 'Debbie', 'Blanco', 'molave zamboanga del sur', '09109776214', 'dd', '388ad1c312a488ee9e12998fe097f2258fa8d5ee'),
(5, 'a', 'a', 'a', '33343', 'ee', '1f444844b1ca616009c2b0e3564fecc065872b5b'),
(6, 'Anielyn', 'Laguitao', 'molave zamboanga del sur', '09097160022', 'an', 'de73eac0c305038f0437bc6a1f994a5a4379ed28');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit_of_measure` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`inventory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `item_category`, `quantity`, `price`, `unit_of_measure`, `total`, `branch_name`) VALUES
(12, 'bottles', '46.75', '2.75', 'piece', '-302.50', 'wnl Mahayag'),
(13, '', '', '0.00', '', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_description` varchar(30) NOT NULL,
  `item_category` varchar(30) NOT NULL,
  `price_per_unit` double NOT NULL,
  `unit_of_measure` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`),
  KEY `item_category` (`item_category`),
  KEY `unit_of_measure` (`unit_of_measure`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_description`, `item_category`, `price_per_unit`, `unit_of_measure`, `date_created`) VALUES
(1, 'kabilya', 'Solid Material(METAL)', 12, 'kg', '2016-02-10 07:09:20'),
(17, 'Kulafu', 'Bottle', 0.75, 'pc', '2016-02-15 04:34:58'),
(18, 'Tanduay', 'Bottle', 1.2, 'pc', '2016-02-15 04:54:29'),
(19, 'Mineral', 'Plastic(Soft)', 1, 'kg', '2016-02-15 04:55:11'),
(20, 'Cup of Cokes', 'Plastic(Soft)', 1, 'kg', '2016-02-15 04:55:52'),
(21, 'Wire', 'Copper', 200, 'kg', '2016-02-16 06:59:50'),
(22, 'Payong', 'Light-Material(METAL)', 2, 'kg', '2016-02-17 06:59:50'),
(23, 'Cassette', 'Light-Material(METAL)', 2, 'kg', '2016-02-17 07:00:21'),
(24, 'Gas Stove', 'Light-Material(METAL)', 2, 'kg', '2016-02-17 07:00:41'),
(25, 'Door Handle', 'Light-Material(METAL)', 2, 'kg', '2016-02-17 07:01:15'),
(26, 'Lata', 'Thin Material(METAL)', 0.5, 'kg', '2016-02-17 07:01:59'),
(27, 'Motor', 'Battery', 15, 'kg', '2016-02-18 11:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE IF NOT EXISTS `item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`) VALUES
(38, 'Non-Ferrous'),
(39, 'Battery'),
(40, 'Bottle'),
(41, 'Plastic(Soft)'),
(42, 'Monobloc'),
(43, 'Light-Material(METAL)'),
(44, 'Solid Material(METAL)'),
(45, 'Thin Material(METAL)'),
(48, 'asdd'),
(49, 'Ferrous');

-- --------------------------------------------------------

--
-- Table structure for table `message_form`
--

CREATE TABLE IF NOT EXISTS `message_form` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_no` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`order_item_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_no`, `item`, `qty`, `customer`, `total`, `status`) VALUES
(7, '1', '6', 'lalang', '60', 'For Approval'),
(8, '2', '5', 'lalang', '100', 'For Approval'),
(9, '1', '3', 'lalang', '30', 'For Approval'),
(11, '2', '2', 'lalang', '40', 'For Approval');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE IF NOT EXISTS `pos` (
  `pos_no` int(100) NOT NULL AUTO_INCREMENT,
  `rs_no` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`pos_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`pos_no`, `rs_no`, `total`, `username`) VALUES
(1, 'RS-3437022', '920', 'manang'),
(2, 'RS-023223', '3900', 'manang'),
(3, 'RS-202334', '1080', 'bebe');

-- --------------------------------------------------------

--
-- Table structure for table `posted_item`
--

CREATE TABLE IF NOT EXISTS `posted_item` (
  `item_posted_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(10) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_description` varchar(500) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`item_posted_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posted_item`
--

INSERT INTO `posted_item` (`item_posted_id`, `customer_id`, `item_category`, `item_description`, `weight`, `photo`, `date`) VALUES
(7, '3', '9', 'sasa', '4', 'Jellyfish.jpg', '01-13-2016'),
(8, '3', '11', 'Tanduay 1.0 Liter', '6', 'Hydrangeas.jpg', 'Jan-13-201');

-- --------------------------------------------------------

--
-- Table structure for table `recycled_item`
--

CREATE TABLE IF NOT EXISTS `recycled_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `date_uploaded` date NOT NULL,
  `price` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `recycled_item`
--

INSERT INTO `recycled_item` (`item_id`, `item_category`, `name`, `weight`, `file_name`, `date_uploaded`, `price`, `branch_name`) VALUES
(1, 'plastic', 'dd', '3', 'Desert.jpg', '2015-03-28', '10.00', 'main branch'),
(2, 'plastic', 'balde', '5', 'Desert.jpg', '2015-03-28', '20.00', 'main branch');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category_name` varchar(50) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `no_of_unit` varchar(50) NOT NULL,
  `price_per_unit` decimal(10,2) NOT NULL,
  `purchase_code` varchar(50) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=274 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_category_name`, `item_description`, `no_of_unit`, `price_per_unit`, `purchase_code`, `purchase_date`, `branch_name`, `status`) VALUES
(268, 'solid', 'kabilya', '5', '10.00', 'WMY-BLZ', '2015-12-18 01:56:00', 'wnl Mahayag', 0),
(269, 'bottles', 'kulafo 1L', '5', '1.00', 'WMY-BLZ', '2015-12-18 01:58:00', 'wnl Mahayag', 0),
(270, 'light-mterial', 'takore', '5', '52.00', 'WMY-BLZ', '2015-12-18 02:05:00', 'wnl Mahayag', 0),
(271, 'light-mterial', 'burb wire', '3', '25.00', 'WMY-BLZ', '2015-12-18 02:11:00', 'wnl Mahayag', 0),
(272, 'solid', 'kabilya', '0.5', '10.00', 'WMY-BLZ', '2015-12-18 02:12:00', 'wnl Mahayag', 0),
(273, 'solid', 'kabilya', '8', '10.00', 'EBCR-4P4', '2016-01-19 09:10:00', 'WNL2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_recycle`
--

CREATE TABLE IF NOT EXISTS `sales_recycle` (
  `sales_recycle_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `unit_of_measure` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sales_recycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sell_recycled_item`
--

CREATE TABLE IF NOT EXISTS `sell_recycled_item` (
  `sell_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `date_sold` date NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_inventory`
--

CREATE TABLE IF NOT EXISTS `temp_inventory` (
  `inventory_id` int(20) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit_of_measure` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `date_delived` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_recycled_item`
--

CREATE TABLE IF NOT EXISTS `temp_recycled_item` (
  `item_id` int(20) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `date_uploaded` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `branch_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales_recycle`
--

CREATE TABLE IF NOT EXISTS `temp_sales_recycle` (
  `sales_recycle_id` int(11) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `unit_of_measure` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sales_recycle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sell_recycle_item`
--

CREATE TABLE IF NOT EXISTS `temp_sell_recycle_item` (
  `sell_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `date_sold` date NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measurements`
--

CREATE TABLE IF NOT EXISTS `unit_of_measurements` (
  `unit_of_measure_id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`unit_of_measure_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `unit_of_measurements`
--

INSERT INTO `unit_of_measurements` (`unit_of_measure_id`, `alias`, `name`) VALUES
(1, 'kg', 'kilogram'),
(2, 'pc', 'piece');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE IF NOT EXISTS `user_accounts` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `position` (`position`),
  KEY `branch` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `username`, `password`, `position`, `branch_id`, `date_created`, `status`) VALUES
(1, 'efren', 'bf5ad43a46e292ed6cb3d783e0ec41301783429d', 'superadmin', 29, '2016-01-25 13:56:32', 0),
(23, 'nMDel', 'MXAA2Qau', 'cashier', 29, '2016-02-10 07:19:43', 0),
(24, 'JyquL', '8BW0qMd6', 'admin', 29, '2016-02-10 07:24:31', 0),
(25, '7rANh', 'Nw0FAdFH', 'admin', 32, '2016-02-10 07:26:09', 0),
(26, 'cashier', 'cashier1', 'cashier', 32, '2016-02-10 07:42:39', 0),
(27, 'nvxXe', 'kAJ4Thja', 'admin', 33, '2016-02-10 08:09:24', 0),
(28, 'bnrys', 'ceqVGrzW', 'cashier', 33, '2016-02-10 08:10:36', 0),
(29, 'cdV3I', 'HDJZQD3y', 'collector', 29, '2016-02-10 08:12:08', 0),
(30, '89Aax', 'KwjjH4QF', 'collector', 32, '2016-02-10 08:13:44', 0),
(31, '2JKJt', 'geT1jDIG', 'collector', 33, '2016-02-10 08:17:27', 0),
(32, 'eLWHk', '4Lf9qJ5l', 'collector', 29, '2016-02-16 09:35:00', 0),
(33, 'admin1', 'admin1', 'admin', 33, '2016-02-17 06:38:51', 0),
(34, 'admin2', 'admin2', 'admin', 29, '2016-02-18 02:39:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`profile_id`, `firstname`, `lastname`, `middlename`, `gender`, `birthdate`, `address`, `phonenumber`, `date_created`, `user_id`) VALUES
(1, 'Efren', 'Padigos', 'Caruana', 'male', '1993-03-15', 'Molave, ZdS', '09121234567', '2016-01-25 13:52:42', 1),
(22, 'Anielyn', 'Laguitao', 'Redillas', 'female', '1993-10-06', 'Tambulig zamboanga del sur\r\nmolave zamboanga del sur', '09109776214', '2016-02-10 07:19:43', 23),
(23, 'Virginia', 'Padigos', 'Caruana', 'female', '1969-02-08', 'Madasigon, Molave Zamboanga del Sur', '09097160022', '2016-02-10 07:24:31', 24),
(24, 'Vincent', 'Padigos', 'Caruana', 'male', '1992-12-08', 'Madasigon, Molave Zamboanga del Sur ', '09214598364', '2016-02-10 07:26:10', 25),
(25, 'Evony', 'Padigos', 'Caruana', 'female', '2002-03-16', 'Madasigon, Molave Zamboanga del Sur', '09085442978', '2016-02-10 07:42:39', 26),
(26, 'Debbie', 'Blanco', 'Gerbese', 'female', '1995-10-25', 'Blancia, Molave Zamboanga del Sur', '09107826822', '2016-02-10 08:09:24', 27),
(27, 'Bethressa Miren', 'Caruana', 'Galitguit', 'female', '1993-11-11', 'Dumingag, Zamboanga del Sur', '09122396679', '2016-02-10 08:10:36', 28),
(28, 'Dennis', 'Padigos', 'Caruana', 'male', '1995-04-17', 'Josepina, Zamboanga del Sur', '09072355352', '2016-02-10 08:12:08', 29),
(29, 'Shem', 'Lague', 'De Luna', 'male', '1993-04-15', 'Tamulig Zamboanga del Sur', '09494538794', '2016-02-10 08:13:44', 30),
(30, 'Ricardo', 'Oledan', 'Kalit', 'male', '1989-02-02', 'Dumingag, Zamboanga del Sur', '09092740613', '2016-02-10 08:17:27', 31),
(31, 'Geson', 'Pancho', 'Aljas', 'male', '1996-06-30', 'Molave Zamboanga del Sur', '09196955333', '2016-02-16 09:35:00', 32),
(32, 'Eva Agnes', 'Padigos', 'Caruana', 'female', '1997-08-19', 'Madasigon, Molave Zamboanga del Sur', '09123456789', '2016-02-17 06:38:51', 33),
(33, 'Bernard Aldo', 'Caruana', 'Galitguit', 'male', '1993-07-28', 'Molave Zamboanga del Sur', '09998745663', '2016-02-18 02:39:38', 34);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(30) NOT NULL,
  PRIMARY KEY (`user_type_id`),
  KEY `position` (`position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `position`) VALUES
(2, 'admin'),
(3, 'cashier'),
(5, 'collector'),
(4, 'customer'),
(1, 'superadmin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_ibfk_1` FOREIGN KEY (`position`) REFERENCES `user_types` (`position`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_accounts_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
