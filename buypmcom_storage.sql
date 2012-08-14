-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2012 at 03:22 PM
-- Server version: 5.1.63
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buypmcom_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `buyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(20) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `contact`, `postcode`, `name`) VALUES
(5, 'mlnixon55@hotmail.co', '3737', 'Lorraine W'),
(6, 'eramke@pedarecc.sa.e', '5127', 'Emma Ramke'),
(7, '', '4223', ''),
(8, '', '6160', ''),
(9, '', '4505', ''),
(10, '', '3844', ''),
(11, '', '2486', ''),
(12, '', '4132', ''),
(13, '', '4566', ''),
(14, '', '2486', ''),
(15, '', '2460', ''),
(16, '', '3064', ''),
(17, '', '6054', ''),
(18, '', '2580', ''),
(19, '', '2835', ''),
(20, '', '3953', ''),
(21, '', '4551', ''),
(22, '', '3127', ''),
(23, '', '5333', ''),
(24, '', '4075', ''),
(25, '', '5126', ''),
(26, '', '4680', ''),
(27, '', '2640', ''),
(28, '', '4861', ''),
(29, '', '6450', '');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE IF NOT EXISTS `ordered_product` (
  `ordered_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `packaging` varchar(10) NOT NULL,
  `supply_order_id` int(11) NOT NULL,
  PRIMARY KEY (`ordered_product_id`),
  KEY `supply_order_id` (`supply_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_size` varchar(10) DEFAULT NULL,
  `product_weight` int(10) NOT NULL DEFAULT '0',
  `product_images` varchar(40) DEFAULT NULL,
  `product_price` int(11) NOT NULL DEFAULT '0',
  `product_cost` int(11) NOT NULL DEFAULT '0',
  `supplier` varchar(20) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_code`, `product_size`, `product_weight`, `product_images`, `product_price`, `product_cost`, `supplier`, `description`) VALUES
(17, 5, 'FD40', 'FD40', '23*23*38', 6, 'FD40_02.png', 99, 38, '8', 'BOX SIZE: 27*27*48,\r\n\r\nBURNER SIZE: 0.4L,\r\n\r\nCOLOUR: MIRROR,\r\n\r\nBURNING TIME: 1 HOUR'),
(18, 5, 'FD47R_B', 'FD47R_B', '35*11*30', 6, 'FD47RBlack_03.png', 99, 28, '8', 'BOX SIZE: 39*15*37,\r\n\r\nBURNER SIZE: 0.4L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 1 HOUR,'),
(19, 5, 'FD47R_WT', 'FD47R_WT', '35*11*30', 6, 'FD47RWhite_04.png', 99, 28, '8', 'BOX SIZE: 39*15*37,\r\n\r\nBURNER SIZE: 0.4L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 1 HOUR,'),
(20, 5, 'FD37_B', 'FD37_B', '38*15*39', 10, 'FD37Black_04.png', 149, 45, '8', 'BOX SIZE: 42*23*36,\r\n\r\nBURNER SIZE: 0.4L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 1 HOUR,'),
(21, 5, 'FD37_WT', 'FD37_WT', '38*15*39', 10, 'FD37White_04.png', 149, 45, '8', 'BOX SIZE: 42*23*36,\r\n\r\nBURNER SIZE: 0.4L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 1 HOUR,'),
(22, 5, 'FD18_B', 'FD18_B', '36*26*9', 7, 'FD18Black_02.png', 149, 45, '8', 'BOX SIZE: 42*32*15,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 3 HOUR,'),
(23, 5, 'FD18_WT', 'FD18_WT', '39*26*9', 7, 'FD18White_02.png', 149, 45, '8', 'BOX SIZE: 42*32*15,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 3 HOUR,'),
(24, 5, 'FD18_WD', 'FD18_WD', '36*26*9', 7, 'FD18Wood_02.png', 149, 45, '8', 'BOX SIZE: 42*32*15,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WOOD,\r\n\r\nBURNING TIME: 3 HOURS,\r\n'),
(25, 5, 'FD35_B', 'FD35_B', '40*40*50', 18, 'FD35Black_02.png', 199, 68, '8', 'BOX SIZE: 46*46*27,\r\n\r\nBURNER SIZE: 2L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 3.5 HOURS,'),
(26, 5, 'FD35_WT', 'FD35_WT', '40*40*50', 18, 'FD35White_02.png', 199, 68, '8', 'BOX SIZE: 46*46*27,\r\n\r\nBURNER SIZE: 2L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 3.5 HOURS,'),
(27, 5, 'FD20_B', 'FD20_B', '40*40*15', 16, 'FD20Black_04.png', 199, 60, '8', 'BOX SIZE: 46*46*23,\r\n\r\nBURNER SIZE: 2.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 6 HOURS,'),
(28, 5, 'FD20_WT', 'FD20_WT', '40*40*15', 18, 'FD20White_02.png', 199, 60, '8', 'BOX SIZE: 46*46*23,\r\n\r\nBURNER SIZE: 2.5l,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 6 HOURS,'),
(29, 5, 'FD11S_B', 'FD11S_B', '52*20*42', 14, 'FD11SBlack_02.png', 199, 70, '8', 'BOX SIZE: 58*25*48,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 3 HOURS,'),
(30, 5, 'FD11S_WT', 'FD11S_WT', '52*20*42', 14, 'FD11SWhite_04.png', 199, 70, '8', 'BOX SIZE: 58*25*48,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 3 HOURS,'),
(31, 5, 'FD79_B', 'FD79_B', '80*30*68', 26, 'FD79Black_02.png', 299, 85, '8', 'BOX SIZE: 91*38*75,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 3 HOURS,'),
(32, 5, 'FD79_WT', 'FD79_WT', '80*30*68', 26, 'FD79White_02.png', 299, 85, '8', 'BOX SIZE: 91*38*75,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 3 HOURS,\r\n\r\n'),
(33, 5, 'FD89S_B', 'FD89S_B', '55*20*46', 22, 'FD89SBlack_04.png', 249, 70, '8', 'BOX SIZE: 62*30*54,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 3 HOURS,'),
(34, 5, 'FD89S_WT', 'FD89S_WT', '50*20*46', 22, 'FD89SWhite_04.png', 249, 70, '8', 'BOX SIZE: 62*30*54,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 3 HOURS,'),
(35, 5, 'OX023', 'OX023', '80*30*60', 26, 'OX023_01.png', 299, 75, '8', 'BOX SIZE: 88*28*54,\r\n\r\nBURNER SIZE: 1.5L,\r\n\r\nCOLOUR: WHITE & BLACK,\r\n\r\nBURNING TIME: 3 HOURS, '),
(36, 5, 'OX015_B', 'OX015_B', '80*25*65', 22, 'OX015Black_02.png', 299, 78, '8', 'BOX SIZE: 88*32*73,\r\n\r\nBURNER SIZE: 1.2L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 2.5 HOURS,'),
(37, 5, 'OX15_WT', 'OX15_WT', '80*25*65', 22, 'OX015White_02.png', 299, 78, '8', 'BOX SIZE: 88*32*73,\r\n\r\nBURNER SIZE: 1.2L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 2.5 HOURS,'),
(38, 5, 'OX010_B', 'OX010_B', '110*42*90', 26, 'OX010Black_02.png', 399, 125, '8', 'BOX SIZE: 117.5*46*68,\r\n\r\nBURNER SIZE: 2.5L,\r\n\r\nCOLOUR: BLACK,\r\n\r\nBURNING TIME: 6 HOURS,'),
(39, 5, 'OX010_WT', 'OX010_WT', '110*42*90', 26, 'OX010White_02.png', 399, 125, '8', 'BOX SIZE: 117.5*46*68,\r\n\r\nBURNER SIZE: 2.5L,\r\n\r\nCOLOUR: WHITE,\r\n\r\nBURNING TIME: 6 HOURS,'),
(40, 5, 'FD15', 'FD15', '30*14*90', 12, 'FD15_04.png', 149, 50, '8', 'BOX SIZE: 34*17*95,\r\n\r\nBURNER SIZE: O.4L,\r\n\r\nCOLOUR: BLACK & SILVER,\r\n\r\nBURNING TIME: 1 HOUR,'),
(41, 5, 'FD30', 'FD30', '110*14*54', 18, 'FD30.png', 349, 75, '8', 'BOX SIZE: 116*19*61,\r\n\r\nBURNER SIZE: 1.5L*2,\r\n\r\nCOLOUR: SILVER,\r\n\r\nBURNING TIME: 3 HOURS,'),
(42, 5, 'FD30B', 'FD30B', '136*14*54', 26, 'FD30B.jpg', 399, 99, '8', 'BOX SIZE: 144*21*62,\r\n\r\nBURNER SIZE: 1.5L*3,\r\n\r\nCOLOUR: SILVER,\r\n\r\nBURNING TIME: 3 HOURS,'),
(43, 5, 'OX021', 'OX021', '110*16*60', 30, 'OX021.jpg', 399, 135, '8', 'BOX SIZE: 118*23*68,\r\n\r\nBURNER SIZE: 1.5L*3,\r\n\r\nCOLOUR: MIRROR,\r\n\r\nBURNING TIME: 3 HOURS,'),
(44, 5, 'FD55', 'FD55', '115*18*61', 28, 'FD55_05_WP.png', 349, 95, '8', 'BOX SIZE: 123*25*69,\r\n\r\nBURNER SIZE: 1.5L*2,\r\n\r\nCOLOUR: SILVER,\r\n\r\nBURNING TIME: 3 HOURS,'),
(45, 13, 'SWAG', 'TV0-2151', '215*140*85', 10, 'swag2_09.png', 0, 71, '9', 'BOX SIZE: 140*27*27,\r\n\r\nCOLOUR: GREEN,\r\n\r\nSPACE: 2 PEOPLE'),
(46, 13, 'SWAG', 'TV0-2152', '215*140*85', 10, 'swag_12.png', 0, 70, '9', 'BOX SIZE: 140*27*27,\r\n\r\nCOLOUR: GREEN,\r\n\r\nSPACE: 2 PEOPLE,'),
(47, 13, 'TENT FOR 2 PEOPLE', 'TV0-2154', '200*120*10', 2, '2person_07.png', 0, 7, '9', 'BOX SIZE: 65*9*8.5,\r\n\r\nCOLOUR: BLUE,\r\n\r\nSPACE: 2 PEOPLE,'),
(48, 13, 'TENT FOR 2 PEOPLE', 'TV0-2155', '200*150*10', 3, '2person2_05.png', 0, 12, '9', 'BOX SIZE: 59*11*11,\r\n\r\nCOLOUR: BLUE,\r\n\r\nSPACE: 2 PEOPLE,'),
(49, 13, 'TENT FOR 3-4 PEOPLE', 'TV0-2156', '200*200*13', 4, '3-4person_04.png', 0, 26, '9', 'BOX SIZE: 110*15*12.5,\r\n\r\nCOLOUR: RED,\r\n\r\nSPACE: 3-4 PEOPLE,\r\n\r\nFEATURE: AUTOMATIC,'),
(50, 13, 'TENT FOR 8-10 PEOPLE', 'TV0-2157', '360*360*18', 7, '8-10person_03.png', 0, 56, '9', 'BOX SIZE: 70*12.5*20,\r\n\r\nCOLOUR: YELLOW,\r\n\r\nSPACE: 8-10 PEOPLE,'),
(51, 13, 'TENT FOR 6 PEOPLE', 'TV0-2158', '570*200*19', 9, '2rooms1hall_07.png', 0, 46, '9', 'BOX SIZE: 70*25*25,\r\n\r\nCOLOUR: BLUE,\r\n\r\nSPACE: 5-6 PEOPLE,\r\n\r\nFEATURE: 2 ROOMS + 1 HALL'),
(52, 13, 'TENT OF 8-12 PEOPLE', 'TV0-2159', '615*700*14', 24, NULL, 0, 161, '9', 'BOX SIZE: 78*40*40,\r\n\r\nCOLOUR: WINE, GREY, YELLOW,\r\n\r\nSPACE: 8-12 PEOPLE,\r\n\r\nFEATURE: 4 ROOMS AND 1 HALL,'),
(53, 13, 'POP UP TENT', 'TV0-2160', '240*140*90', 3, 'foldedtent1_02.png', 0, 33, '9', 'BOX SIZE: 80*80*5,\r\n\r\nCOLOUR: ORANGE,\r\n\r\nSPACE: 2 PEOPLE,\r\n\r\nFEATURE: DOUBLE DECK WINDOW'),
(54, 13, 'POP UP TENT', 'TV0-2161', '240*120*90', 2, 'foldedtent2_02.png', 0, 26, '9', 'BOX SIZE: 80*80*5,\r\n\r\nCOLOUR: ORANGE,\r\n\r\nSPACE: 2 PEOPLE,\r\n\r\nFEATURE: SINGLE DECK'),
(55, 14, 'ALUMINIUM ALLOY TABL', 'TV0-2162', '89*38*11', 10, 'table_set_Alloy_01.jpg', 0, 32, '9', 'BOX SIZE: 89*38*11,\r\n\r\nCOLOUR: SILVER,\r\n\r\nSPACE: 4 PEOPLE,\r\n\r\nTABLE LOADING: 30KG,\r\n\r\nTABLE SIZE: 85*67,\r\n\r\nCHAIR SIZE: 27*29,'),
(56, 14, '8 IN 1 COOKWARE', 'PS-W1038', '18.5*18.5*', 0, 'cookingset_08.png', 0, 12, '9', 'BOX SIZE: 18.5*18.5*13.5,\r\n\r\nCOLOUR: BLACK,\r\n\r\nVOLUME: 3-4 PEOPLE,\r\n\r\nFEATURE: 2 POTS, 2 FRY PANS, 2 SPOONS, 4 BOWLS and 1 SPONGE,\r\n\r\n'),
(57, 11, 'BAMBOO', '12JUN001', '9\\''6*23\\"*', 9, '12JUN001_04.png', 0, 224, '10', 'BOX SIZE: 300*15*60,\r\n\r\nNOSE: ROUND,\r\n\r\nTAIL: PIN ROUND,\r\n\r\nFIN: 2*G5+9,\r\n\r\nLOGO: DECK,'),
(58, 11, 'BAMBOO', '12JUN002', '9\\\\\\''6*23\\', 9, '12JUN001_04.png', 0, 224, '10', 'BOX SIZE: 300*60*15,\r\n\r\nNOSE: ROUND,\r\n\r\nTAIL: PIN ROUND,\r\n\r\nFIN: 2*G5+9,\r\n\r\nLOGO: DECK,');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE IF NOT EXISTS `products_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`product_category_id`, `parent_id`, `category_name`) VALUES
(1, 0, 'Surfboards'),
(5, 0, 'Fireplace'),
(11, 1, '9''6 Long Board'),
(12, 0, 'Camping'),
(13, 12, 'Tent'),
(14, 12, 'Accessories'),
(15, 11, '9\\''6'),
(16, 1, '9''2 Long Board'),
(17, 1, '9'' Long Board'),
(19, 1, '8''6 Mini Mal'),
(20, 1, '8''6 Big Fish'),
(21, 1, '8'' Mini Mal'),
(22, 1, '8'' Big Fish'),
(23, 1, '7''10 Short Board'),
(24, 1, '7''6 Short Board'),
(25, 1, '7''2 Short Board'),
(26, 1, '7''6 Big Fish');

-- --------------------------------------------------------

--
-- Table structure for table `products_to_categories`
--

CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returned`
--

CREATE TABLE IF NOT EXISTS `returned` (
  `returned_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `refund` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`returned_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `sales_price` int(11) NOT NULL,
  `charged_postage` int(11) NOT NULL,
  `date` date NOT NULL,
  `dispatch_date` varchar(10) NOT NULL,
  `real_postage` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `sales_source` varchar(10) NOT NULL,
  `sales_status` varchar(10) NOT NULL,
  `comment` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `buyer_id` (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `product_category_id`, `product_quantity`, `sales_price`, `charged_postage`, `date`, `dispatch_date`, `real_postage`, `buyer_id`, `sales_source`, `sales_status`, `comment`) VALUES
(21, 'FD30', 5, 1, 197, 0, '2012-08-13', '2012-08-14', 0, 5, 'ebay', 'Sent', 'AUCTION'),
(22, 'FD55', 5, 1, 359, 0, '2012-08-13', '2012-08-14', 0, 6, 'ebay', 'Sent', 'FIX PRICE'),
(23, 'TV0-2162', 14, 1, 45, 12, '2012-07-22', '2012-07-23', 0, 7, 'ebay', 'Sent', 'FIX PRICE'),
(24, 'TV0-2162', 14, 1, 45, 12, '2012-07-24', '2012-07-25', 0, 8, 'ebay', 'Sent', 'FIX PRICE'),
(25, 'TV0-2162', 14, 1, 45, 12, '2012-07-27', '2012-07-27', 0, 9, 'ebay', 'Sent', 'FIX PRICE'),
(26, 'TV0-2152', 13, 1, 149, 19, '2012-07-28', '2012-07-30', 0, 10, 'ebay', 'Sent', 'FIX PRICE'),
(27, 'TV0-2152', 13, 1, 149, 19, '2012-07-30', '2012-07-30', 0, 11, 'ebay', 'Sent', 'FIX PRICE'),
(28, 'TV0-2154', 13, 1, 15, 9, '2012-07-30', '2012-07-30', 0, 12, 'ebay', 'Sent', 'FIX PRICE'),
(29, 'TV0-2152', 13, 1, 149, 19, '2012-08-02', '2012-08-02', 0, 13, 'ebay', 'Sent', 'FIX PRICE'),
(30, 'TV0-2154', 13, 1, 15, 9, '2012-08-03', '2012-08-03', 0, 14, 'ebay', 'Sent', 'AUCTION'),
(31, 'TV0-2152', 13, 1, 147, 19, '2012-08-03', '2012-08-03', 0, 15, 'ebay', 'Sent', 'AUCTION'),
(32, 'TV0-2158', 13, 1, 99, 19, '2012-08-03', '2012-08-03', 0, 16, 'ebay', 'Sent', 'FIX PRICE'),
(33, 'TV0-2162', 14, 1, 45, 12, '2012-08-04', '2012-08-06', 0, 17, 'ebay', 'Sent', 'FIX PRICE'),
(34, 'TV0-2158', 13, 1, 99, 19, '2012-08-05', '2012-08-06', 0, 18, 'ebay', 'Sent', 'FIX PRICE'),
(35, 'TV0-2152', 13, 1, 149, 19, '2012-08-07', '2012-08-07', 0, 19, 'ebay', 'Sent', 'FIX PRICE'),
(36, 'TV0-2161', 13, 1, 49, 10, '2012-08-07', '2012-08-07', 0, 20, 'ebay', 'Sent', 'AUCTION'),
(37, 'TV0-2156', 13, 1, 29, 15, '2012-08-07', '2012-08-07', 0, 21, 'ebay', 'Sent', 'AUCTION'),
(38, 'TV0-2154', 13, 1, 14, 0, '2012-08-08', '2012-08-08', 0, 22, 'ebay', 'Sent', 'FIX PRICE'),
(39, 'TV0-2158', 13, 1, 99, 19, '2012-08-09', '2012-08-09', 0, 23, 'ebay', 'Sent', 'FIX PRICE'),
(40, 'TV0-2151', 13, 1, 149, 19, '2012-08-10', '2012-08-10', 0, 24, 'ebay', 'Sent', 'FIX PRICE'),
(41, 'TV0-2151', 13, 1, 125, 19, '2012-08-11', '2012-08-13', 0, 25, 'ebay', 'Sent', 'AUCTION'),
(42, 'TV0-2162', 14, 1, 64, 12, '2012-08-11', '2012-08-13', 0, 26, 'ebay', 'Append', 'AUCTION'),
(43, 'TV0-2154', 13, 1, 17, 9, '2012-08-11', '2012-08-13', 0, 27, 'ebay', 'Sent', 'AUCTION'),
(44, 'TV0-2152', 13, 1, 123, 19, '2012-08-14', '', 0, 28, 'ebay', 'Sent', 'AUCTION'),
(45, 'TV0-2151', 13, 1, 134, 19, '2012-08-14', '2012-08-14', 0, 29, 'ebay', 'Sent', 'AUCTION');

--
-- Triggers `sales`
--
DROP TRIGGER IF EXISTS `sales_after_insert`;
DELIMITER //
CREATE TRIGGER `sales_after_insert` AFTER INSERT ON `sales`
 FOR EACH ROW begin

UPDATE stock_info SET product_quantity = product_quantity - NEW.product_quantity WHERE item_code = NEW.item_code;
 

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stockup_product`
--

CREATE TABLE IF NOT EXISTS `stockup_product` (
  `stockup_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) DEFAULT NULL,
  `item_code` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `stockup_date` date NOT NULL,
  `supply_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stockup_product_id`),
  KEY `supply_order_id` (`supply_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `stockup_product`
--

INSERT INTO `stockup_product` (`stockup_product_id`, `supplier_id`, `item_code`, `product_category_id`, `product_quantity`, `stockup_date`, `supply_order_id`) VALUES
(42, NULL, 's1', 11, 1, '2012-08-13', NULL),
(43, NULL, 'FD40', 5, 40, '2012-07-02', NULL),
(44, NULL, 'FD47R_B', 5, 10, '2012-07-02', NULL),
(45, NULL, 'FD47R_WT', 5, 30, '2012-07-02', NULL),
(46, NULL, 'FD37_B', 5, 20, '2012-07-02', NULL),
(47, NULL, 'FD37_WT', 5, 10, '2012-07-02', NULL),
(48, NULL, 'FD18_B', 5, 15, '2012-07-02', NULL),
(49, NULL, 'FD18_WT', 5, 10, '2012-07-02', NULL),
(50, NULL, 'FD18_WD', 5, 5, '2012-07-02', NULL),
(51, NULL, 'FD35_B', 5, 20, '2012-07-02', NULL),
(52, NULL, 'FD35_WT', 5, 10, '2012-07-02', NULL),
(53, NULL, 'FD20_B', 5, 20, '2012-07-02', NULL),
(54, NULL, 'FD20_WT', 5, 10, '2012-07-02', NULL),
(55, NULL, 'FD11S_B', 5, 15, '2012-07-02', NULL),
(56, NULL, 'FD11S_WT', 5, 15, '2012-07-02', NULL),
(57, NULL, 'FD79_B', 5, 20, '2012-07-02', NULL),
(58, NULL, 'FD79_WT', 5, 10, '2012-07-02', NULL),
(59, NULL, 'FD89S_B', 5, 20, '2012-07-02', NULL),
(60, NULL, 'FD89S_WT', 5, 10, '2012-07-02', NULL),
(61, NULL, 'OX023', 5, 30, '2012-07-02', NULL),
(62, NULL, 'OX015_B', 5, 10, '2012-07-02', NULL),
(63, NULL, 'OX15_WT', 5, 30, '2012-07-02', NULL),
(64, NULL, 'OX010_B', 5, 5, '2012-07-02', NULL),
(65, NULL, 'OX010_WT', 5, 25, '2012-07-02', NULL),
(66, NULL, 'FD15', 5, 30, '2012-07-02', NULL),
(67, NULL, 'FD30', 5, 30, '2012-07-02', NULL),
(68, NULL, 'FD30B', 5, 30, '2012-07-02', NULL),
(69, NULL, 'OX021', 5, 40, '2012-07-02', NULL),
(70, NULL, 'FD40', 5, 30, '2012-07-02', NULL),
(71, NULL, 'TV0-2151', 13, 100, '2012-06-30', NULL),
(72, NULL, 'TV0-2152', 13, 100, '2012-06-30', NULL),
(73, NULL, 'TV0-2154', 13, 108, '2012-06-30', NULL),
(74, NULL, 'TV0-2155', 13, 54, '2012-06-30', NULL),
(75, NULL, 'TV0-2156', 13, 100, '2012-06-30', NULL),
(76, NULL, 'TV0-2157', 13, 100, '2012-06-30', NULL),
(77, NULL, 'TV0-2158', 13, 100, '2012-06-30', NULL),
(78, NULL, 'TV0-2159', 13, 100, '2012-06-30', NULL),
(79, NULL, 'TV0-2160', 13, 150, '2012-06-30', NULL),
(80, NULL, 'TV0-2161', 13, 150, '2012-06-30', NULL),
(81, NULL, 'TV0-2162', 14, 100, '2012-06-30', NULL),
(82, NULL, 'PS-W1038', 14, 240, '2012-06-30', NULL),
(83, NULL, '12JUN001', 11, 1, '2012-07-20', NULL),
(84, NULL, '12JUN002', 11, 1, '2012-07-20', NULL);

--
-- Triggers `stockup_product`
--
DROP TRIGGER IF EXISTS `stockup_after_insert`;
DELIMITER //
CREATE TRIGGER `stockup_after_insert` AFTER INSERT ON `stockup_product`
 FOR EACH ROW begin
 DECLARE _item_code VARCHAR(20);
 SELECT item_code INTO _item_code FROM stock_info WHERE item_code = NEW.item_code;
 IF (NEW.item_code = _item_code) THEN
 update stock_info set product_quantity = product_quantity + NEW.product_quantity where item_code = NEW.item_code;
 ELSE
 insert into stock_info (item_code, product_category_id, product_quantity) values (NEW.item_code, NEW.product_category_id, NEW.product_quantity);
 END IF;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_info`
--

CREATE TABLE IF NOT EXISTS `stock_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `stock_info`
--

INSERT INTO `stock_info` (`id`, `item_code`, `product_quantity`, `product_category_id`) VALUES
(23, 'FD40', 70, 5),
(24, 'FD47R_B', 10, 5),
(25, 'FD47R_WT', 30, 5),
(26, 'FD37_B', 20, 5),
(27, 'FD37_WT', 10, 5),
(28, 'FD18_B', 15, 5),
(29, 'FD18_WT', 10, 5),
(30, 'FD18_WD', 5, 5),
(31, 'FD35_B', 20, 5),
(32, 'FD35_WT', 10, 5),
(33, 'FD20_B', 20, 5),
(34, 'FD20_WT', 10, 5),
(35, 'FD11S_B', 15, 5),
(36, 'FD11S_WT', 15, 5),
(37, 'FD79_B', 20, 5),
(38, 'FD79_WT', 10, 5),
(39, 'FD89S_B', 20, 5),
(40, 'FD89S_WT', 10, 5),
(41, 'OX023', 30, 5),
(42, 'OX015_B', 10, 5),
(43, 'OX15_WT', 30, 5),
(44, 'OX010_B', 5, 5),
(45, 'OX010_WT', 25, 5),
(46, 'FD15', 30, 5),
(47, 'FD30', 29, 5),
(48, 'FD30B', 30, 5),
(49, 'OX021', 40, 5),
(50, 'TV0-2151', 97, 13),
(51, 'TV0-2152', 94, 13),
(52, 'TV0-2154', 104, 13),
(53, 'TV0-2155', 54, 13),
(54, 'TV0-2156', 99, 13),
(55, 'TV0-2157', 100, 13),
(56, 'TV0-2158', 97, 13),
(57, 'TV0-2159', 100, 13),
(58, 'TV0-2160', 150, 13),
(59, 'TV0-2161', 149, 13),
(60, 'TV0-2162', 95, 14),
(61, 'PS-W1038', 240, 14),
(62, '12JUN001', 1, 11),
(63, '12JUN002', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(40) NOT NULL,
  `contact_name` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `qq` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contact_name`, `phone`, `address`, `qq`, `email`) VALUES
(8, 'Yongkang Sempo', '', '86-579-872', 'HARDWARE SCIENCE&TECHNOLOGY  INDUSTRY AREA,YONGKANG,CHINA 321300', '', ''),
(9, 'Ningbo Shindak', '', '', '19F NO.5 CENTURY ORIENTAL PLAZA JIANGDONG DISTRICT, 315040 NINGBO CHINA', '', ''),
(10, 'Shaoxing Shuangjun', 'Qing Li', '0575-84627', 'MUSHAN VILLAGE, LANTING TOWN, SHAOXING COUNTY', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supply_order`
--

CREATE TABLE IF NOT EXISTS `supply_order` (
  `supply_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `final_payment` int(11) DEFAULT NULL,
  `freight` int(11) DEFAULT NULL,
  `local_fee` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`supply_order_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD CONSTRAINT `ordered_product_ibfk_1` FOREIGN KEY (`supply_order_id`) REFERENCES `supply_order` (`supply_order_id`);

--
-- Constraints for table `returned`
--
ALTER TABLE `returned`
  ADD CONSTRAINT `returned_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `buyer` (`buyer_id`);

--
-- Constraints for table `stockup_product`
--
ALTER TABLE `stockup_product`
  ADD CONSTRAINT `stockup_product_ibfk_1` FOREIGN KEY (`supply_order_id`) REFERENCES `supply_order` (`supply_order_id`);

--
-- Constraints for table `supply_order`
--
ALTER TABLE `supply_order`
  ADD CONSTRAINT `supply_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
