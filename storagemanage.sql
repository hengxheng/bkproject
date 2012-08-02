-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2012 at 12:12 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storagemanage`
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
  PRIMARY KEY (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `contact`, `postcode`) VALUES
(1, '0433567890', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `cooking_set`
--

CREATE TABLE IF NOT EXISTS `cooking_set` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `weight` int(5) NOT NULL DEFAULT '0',
  `size` varchar(10) NOT NULL,
  `length` int(5) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL DEFAULT '0',
  `thickness` int(5) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cooking_set`
--

INSERT INTO `cooking_set` (`product_id`, `item_code`, `product_name`, `type`, `images`, `weight`, `size`, `length`, `width`, `thickness`, `price`, `product_category_id`) VALUES
(3, '2', '1', '3', NULL, 9, '5', 6, 7, 8, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE IF NOT EXISTS `cover` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `length` int(5) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL DEFAULT '0',
  `thickness` int(5) NOT NULL DEFAULT '0',
  `weight` int(5) NOT NULL DEFAULT '0',
  `slot` varchar(5) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fin`
--

CREATE TABLE IF NOT EXISTS `fin` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `images` varchar(20) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `weight` int(11) DEFAULT '0',
  `price` int(11) DEFAULT NULL,
  `product_name` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fin`
--

INSERT INTO `fin` (`product_id`, `item_code`, `product_category_id`, `images`, `size`, `weight`, `price`, `product_name`) VALUES
(1, 'new fin', 2, NULL, '11''3', 1, 40, 'seconded'),
(2, 'et43t3', NULL, NULL, '3454444', 44444, 5444, 'rt453q25'),
(4, 'vfr', 2, NULL, 'vr', 0, 0, 'vfr');

-- --------------------------------------------------------

--
-- Table structure for table `fireplace`
--

CREATE TABLE IF NOT EXISTS `fireplace` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` int(11) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  `color` varchar(5) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fireplace`
--

INSERT INTO `fireplace` (`product_id`, `item_code`, `product_name`, `product_category_id`, `images`, `size`, `weight`, `color`, `price`) VALUES
(1, 1, '2', 5, NULL, '3', 4, '5', 6);

-- --------------------------------------------------------

--
-- Table structure for table `folded_table`
--

CREATE TABLE IF NOT EXISTS `folded_table` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `color` varchar(5) NOT NULL,
  `size` varchar(5) NOT NULL,
  `length` int(5) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL DEFAULT '0',
  `thickness` int(5) NOT NULL DEFAULT '0',
  `weight` int(5) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE IF NOT EXISTS `ordered_product` (
  `ordered_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `packaging` varchar(10) NOT NULL,
  `supply_order_id` int(11) NOT NULL,
  PRIMARY KEY (`ordered_product_id`),
  KEY `supply_order_id` (`supply_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE IF NOT EXISTS `products_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(15) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`product_category_id`, `category_name`) VALUES
(1, 'Surfboard'),
(2, 'Fin'),
(3, 'Wetsuit'),
(4, 'Cover'),
(5, 'Fireplace'),
(6, 'Tent'),
(7, 'Folded Table'),
(8, 'Umbrela'),
(9, 'Sleeping Bag'),
(10, 'Cooking Set');

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
  `date` varchar(10) NOT NULL,
  `dispatch_date` varchar(10) NOT NULL,
  `real_postage` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `sales_source` varchar(10) NOT NULL,
  `sales_status` varchar(10) NOT NULL,
  `comment` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `buyer_id` (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `product_category_id`, `product_quantity`, `sales_price`, `charged_postage`, `date`, `dispatch_date`, `real_postage`, `buyer_id`, `sales_source`, `sales_status`, `comment`) VALUES
(1, 'fuu', 1, 2, 0, 0, '08/01/2012', '08/01/2012', 0, 1, 'ebay', 'Sent', '65647u'),
(2, 'JAN001', 1, 0, 0, 0, '08/01/2012', '08/01/2012', 0, 1, 'ebay', 'Append', 'yu6'),
(3, 'new fin', 2, 5, 4, 0, '08/01/2012', '08/01/2012', 0, 1, 'ebay', 'Append', 'yh'),
(4, 'fuu', 1, 1, 0, 0, '08/01/2012', '08/01/2012', 0, 1, 'ebay', 'Append', 'u6'),
(5, 'JAN001', 2, 1, 23, 34, '08/03/2012', '08/06/2012', 34, 1, 'ausurfing', 'Paid', '34');

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
-- Table structure for table `sleeping_bag`
--

CREATE TABLE IF NOT EXISTS `sleeping_bag` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `color` varchar(10) NOT NULL,
  `weight` int(5) NOT NULL DEFAULT '0',
  `filling` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockup_product`
--

CREATE TABLE IF NOT EXISTS `stockup_product` (
  `stockup_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `item_code` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `stockup_date` varchar(15) NOT NULL,
  `supply_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stockup_product_id`),
  KEY `supply_order_id` (`supply_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `stockup_product`
--

INSERT INTO `stockup_product` (`stockup_product_id`, `supplier_id`, `item_code`, `product_category_id`, `product_quantity`, `stockup_date`, `supply_order_id`) VALUES
(8, 4, 'JAN001', 1, 3, '07/03/2012', 1),
(9, 2, '3', 4, 5, '6', 1),
(10, 2, 'JAN001', 4, 5, '6', 1),
(11, 2, 'JAN001', 4, 5, '6', 1),
(12, 1, 'JAN001', 1, 21, '08/01/2012', 1),
(13, 1, 'fuu', 1, 4, '08/01/2012', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stock_info`
--

INSERT INTO `stock_info` (`id`, `item_code`, `product_quantity`, `product_category_id`) VALUES
(1, '3', 5, 4),
(2, 'JAN001', 30, 4),
(3, 'fuu', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(10) NOT NULL,
  `contact_name` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `qq` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `contact_name`, `phone`, `address`, `qq`, `email`) VALUES
(1, 'abc', 'ab', '111sfd', '11', '111', '1111'),
(4, 'abc1', 'ab', '111', '11', '111', '1111'),
(5, 'abc2', 'ab', '1', '11', '111', '1111');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `supply_order`
--

INSERT INTO `supply_order` (`supply_order_id`, `order_date`, `deposit`, `final_payment`, `freight`, `local_fee`, `supplier_id`) VALUES
(1, '2012-07-11', 34, 34, 34, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `surfboard`
--

CREATE TABLE IF NOT EXISTS `surfboard` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `price` int(5) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `length` int(5) DEFAULT '0',
  `width` int(5) DEFAULT '0',
  `thickness` int(5) DEFAULT '0',
  `nose` varchar(10) DEFAULT NULL,
  `tail` varchar(10) DEFAULT NULL,
  `fin` varchar(10) DEFAULT NULL,
  `weight` int(5) NOT NULL DEFAULT '0',
  `bottom` varchar(10) NOT NULL,
  `material` varchar(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `surfboard`
--

INSERT INTO `surfboard` (`product_id`, `item_code`, `product_name`, `type`, `product_category_id`, `price`, `images`, `size`, `length`, `width`, `thickness`, `nose`, `tail`, `fin`, `weight`, `bottom`, `material`) VALUES
(3, 'JAN001', 'Ocean', 'Longboard', 1, 100, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 0, '213', '123'),
(9, 'fuu', 'addnewd', '2', 1, 0, NULL, '11''3', 0, 0, 0, '', '', '', 0, '', ''),
(10, 'fuuh45y45', 'addnewd444', '2', 1, 0, NULL, '11''3', 0, 0, 0, '', '', '', 0, '', ''),
(12, 'sfe', 'sffe', '2', 1, 0, NULL, '12', 0, 0, 0, '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surfboard_type`
--

CREATE TABLE IF NOT EXISTS `surfboard_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `surfboard_type`
--

INSERT INTO `surfboard_type` (`type_id`, `type_name`) VALUES
(2, 'Fish Board'),
(3, 'Short Board'),
(4, 'Mini Mal'),
(5, 'Malibu'),
(6, 'Bodyboard'),
(7, 'SUP Paddle Board');

-- --------------------------------------------------------

--
-- Table structure for table `tent`
--

CREATE TABLE IF NOT EXISTS `tent` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `color` varchar(5) NOT NULL,
  `size` varchar(10) NOT NULL,
  `length` int(5) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL DEFAULT '0',
  `thickness` int(5) NOT NULL DEFAULT '0',
  `weight` int(5) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `umbrela`
--

CREATE TABLE IF NOT EXISTS `umbrela` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `color` varchar(5) NOT NULL,
  `size` varchar(5) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '0',
  `material` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wetsuit`
--

CREATE TABLE IF NOT EXISTS `wetsuit` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(10) NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `images` varchar(20) DEFAULT NULL,
  `size` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wetsuit`
--

INSERT INTO `wetsuit` (`product_id`, `item_code`, `product_name`, `product_category_id`, `type`, `images`, `size`, `price`) VALUES
(1, 'new ', 'nice', 3, 'Kid', '', '12', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cooking_set`
--
ALTER TABLE `cooking_set`
  ADD CONSTRAINT `cooking_set_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `cover`
--
ALTER TABLE `cover`
  ADD CONSTRAINT `cover_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `fin`
--
ALTER TABLE `fin`
  ADD CONSTRAINT `fin_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `fireplace`
--
ALTER TABLE `fireplace`
  ADD CONSTRAINT `fireplace_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `folded_table`
--
ALTER TABLE `folded_table`
  ADD CONSTRAINT `folded_table_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`),
  ADD CONSTRAINT `folded_table_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

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
-- Constraints for table `sleeping_bag`
--
ALTER TABLE `sleeping_bag`
  ADD CONSTRAINT `sleeping_bag_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

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

--
-- Constraints for table `surfboard`
--
ALTER TABLE `surfboard`
  ADD CONSTRAINT `surfboard_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `tent`
--
ALTER TABLE `tent`
  ADD CONSTRAINT `tent_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `umbrela`
--
ALTER TABLE `umbrela`
  ADD CONSTRAINT `umbrela_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

--
-- Constraints for table `wetsuit`
--
ALTER TABLE `wetsuit`
  ADD CONSTRAINT `wetsuit_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`),
  ADD CONSTRAINT `wetsuit_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `products_category` (`product_category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
