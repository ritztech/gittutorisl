-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2013 at 09:17 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_return`
--

CREATE TABLE IF NOT EXISTS `bill_return` (
  `billno` int(5) NOT NULL,
  `sell_date` date NOT NULL,
  `total` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `netpay` int(5) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_addr` varchar(200) NOT NULL,
  `cust_contact` int(12) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_return`
--

INSERT INTO `bill_return` (`billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name`, `remarks`, `return_date`) VALUES
(104, '2012-12-22', 1400, 10, 1260, 'ABC', 'Not sure', 2147483647, 'DR ABC', 'Bought in access', '2013-01-17'),
(105, '2012-12-22', 160, 20, 128, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-01-08'),
(104, '2012-12-22', 1400, 10, 1260, 'ABC', 'Not sure', 2147483647, 'DR ABC', 'some issue', '2013-01-08'),
(107, '2013-01-01', 66000, 20, 52800, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-01-08'),
(106, '2013-01-01', 80, 0, 80, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-01-08'),
(105, '2012-12-22', 160, 20, 128, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-01-17'),
(115, '2013-01-17', 90, 0, 90, 'ABC', 'Not sure', 989952, 'DR ABC', ' Nothing ', '2013-01-17'),
(125, '2013-01-18', 20, 0, 20, 'ABC', 'Not sure', 976400, 'DR ABC', ' Nothing ', '2013-01-18'),
(124, '2013-01-18', 24, 0, 24, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-01-18'),
(152, '2013-02-01', 64, 10, 58, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-02-01'),
(150, '2013-02-01', 76, 4, 73, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `dno` int(10) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`emp_id`, `emp_name`, `salary`, `dno`, `image`) VALUES
(224, 'today', 20, 10, 'img1.jpg'),
(225, 'today', 10, 10, '123'),
(226, 'riti', 20, 10, '123'),
(227, 'rit1', 20, 10, '123'),
(228, 'rit1', 20, 10, '123'),
(229, 'rit1', 20, 10, '123'),
(230, 'rit2', 20, 10, '123'),
(231, 'rit2', 20, 10, '123');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `address`, `city`) VALUES
(1, 'Raj', '10 street dane', 'Pune'),
(11, 'amit', 'puna', 'puna'),
(12, 'sumit', 'puna', 'puna');

-- --------------------------------------------------------

--
-- Table structure for table `master1_item`
--

CREATE TABLE IF NOT EXISTS `master1_item` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) NOT NULL,
  `price` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `master1_item`
--

INSERT INTO `master1_item` (`id`, `desc`, `price`) VALUES
(59, 'item1', 10),
(60, 'item2', 20),
(61, 'chips1', 10),
(62, 'chips2', 10),
(63, 'Paneer1', 50),
(64, 'Paneer2', 20),
(65, 'samosa', 5),
(66, 'abc123', 10);

-- --------------------------------------------------------

--
-- Table structure for table `medical_temp`
--

CREATE TABLE IF NOT EXISTS `medical_temp` (
  `id` int(4) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `sprice` int(4) NOT NULL,
  `exp_date` date NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_tab_name`
--

CREATE TABLE IF NOT EXISTS `med_tab_name` (
  `tab_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_tab_name`
--

INSERT INTO `med_tab_name` (`tab_name`) VALUES
('bill_return'),
('muser'),
('m_auto_id'),
('m_master_store'),
('m_vendor'),
('other_expense'),
('purchase_invoice'),
('purchase_item'),
('sell_invoice'),
('sell_items');

-- --------------------------------------------------------

--
-- Table structure for table `muser`
--

CREATE TABLE IF NOT EXISTS `muser` (
  `id` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `auth` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muser`
--

INSERT INTO `muser` (`id`, `pass`, `name`, `auth`) VALUES
('demo', 'demo', 'Sudhir', 'SUPER'),
('abc', 'abc', 'abc_user', 'NORMAL'),
('sudhir', 'sudhir', 'some name', 'SUPER');

-- --------------------------------------------------------

--
-- Table structure for table `m_auto_id`
--

CREATE TABLE IF NOT EXISTS `m_auto_id` (
  `purchase_id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_auto_id`
--

INSERT INTO `m_auto_id` (`purchase_id`, `sell_id`) VALUES
(121, 167);

-- --------------------------------------------------------

--
-- Table structure for table `m_master_store`
--

CREATE TABLE IF NOT EXISTS `m_master_store` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `exp_date` date NOT NULL,
  `s_price` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `trg` int(3) NOT NULL,
  `storage` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `m_master_store`
--

INSERT INTO `m_master_store` (`id`, `desc`, `capacity`, `exp_date`, `s_price`, `qty`, `trg`, `storage`) VALUES
(5, 'Supramine', '30mg', '2012-12-12', 12, 50, 50, 'Not sure'),
(6, 'texamine', '50ML', '2013-01-10', 10, 150, 100, 'Not sure'),
(7, 'Drug a', '20mg', '2013-01-17', 10, -21, 50, 'Not sure'),
(8, 'c drug', '200ML', '2013-01-24', 8, 194, 50, 'Not sure'),
(9, 'Drug a', '500mg', '2013-01-17', 10, 676, 40, 'Not sure'),
(10, 'sdrug', '100ML', '2015-03-20', 10, 208, 100, 'Not sure'),
(11, 'yax', '200 MG', '2015-01-15', 20, 0, 20, 'Not sure'),
(12, 'Dexin', '20ML', '2014-01-23', 12, 3, 20, 'K 20'),
(13, 'nextra', '500 ML', '2015-03-20', 20, 100, 50, 'Not sure');

-- --------------------------------------------------------

--
-- Table structure for table `m_vendor`
--

CREATE TABLE IF NOT EXISTS `m_vendor` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `m_vendor`
--

INSERT INTO `m_vendor` (`id`, `name`, `contact`, `address`) VALUES
(1, 'M  seller', '976777777', 'A-26  hlkhnl b bjh bjbcjv cjsvcsj '),
(2, 'Vendor123', '989952', 'i AM NOT SURE'),
(3, 'Vendor 2', '0708808', 'A45 yyard'),
(9, 'DR reddy labs', '9988776655', 'not sure now'),
(10, 'Azx pharma', '989952', 'b jlkj lj ank nlnl xcnla 778 dn ldjnld ');

-- --------------------------------------------------------

--
-- Table structure for table `other_expense`
--

CREATE TABLE IF NOT EXISTS `other_expense` (
  `exp_id` int(4) NOT NULL AUTO_INCREMENT,
  `exp_type` varchar(50) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_amount` int(4) NOT NULL,
  `exp_rem` varchar(200) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `other_expense`
--

INSERT INTO `other_expense` (`exp_id`, `exp_type`, `exp_date`, `exp_amount`, `exp_rem`) VALUES
(1, 'RENT PAID', '2012-12-06', 12000, ' Nothing '),
(2, 'society colllection', '2013-01-10', 500, ' Nothing '),
(3, 'some thing', '2013-01-10', 2000, ' Nothing '),
(4, 'Furniture', '2013-01-16', 5000, 'Bought furniture for shop '),
(5, 'EMplyee', '2013-02-14', 1000, ' Nothing ');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `purchaseid` int(10) NOT NULL,
  `p_date` date NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `p_receipt` varchar(20) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `total` int(4) NOT NULL,
  `amount_paid` int(4) NOT NULL,
  `balance` int(4) NOT NULL,
  `p_notes` varchar(200) NOT NULL,
  `user_ent` varchar(100) NOT NULL,
  PRIMARY KEY (`purchaseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_invoice`
--

INSERT INTO `purchase_invoice` (`purchaseid`, `p_date`, `vendor_id`, `p_receipt`, `p_type`, `total`, `amount_paid`, `balance`, `p_notes`, `user_ent`) VALUES
(101, '2012-12-13', 1, 'A1234', 'CASH', 9300, 9300, 0, 'Fully paid', 'Sudhir'),
(102, '2012-12-13', 2, 'B43567A', 'CASH', 9450, 9450, 0, 'will give ', 'Sudhir'),
(103, '2012-12-14', 1, '80800', 'CREDIT', 3000, 3000, 0, 'will', 'Sudhir'),
(104, '2012-12-22', 2, '12244', 'CASH', 5100, 5100, 0, 'None', 'Sudhir'),
(105, '2012-12-22', 2, '1233', 'CREDIT', 1000, 1000, 0, 'Paid', 'Sudhir'),
(106, '2012-12-19', 2, '1225466', 'CASH', 1560, 1560, 0, '', 'Sudhir'),
(107, '2012-12-13', 2, '1311313', 'CREDIT', 2200, 1000, 1200, 'will see today', 'Sudhir'),
(108, '2012-12-30', 3, '44524525', 'CASH', 800, 800, 0, 'None', 'Sudhir'),
(109, '2012-12-30', 2, '123456', 'CASH', 240, 240, 0, 'None', 'Sudhir'),
(110, '2013-01-02', 2, '6699989', 'CASH', 5200, 5200, 0, 'None', 'Sudhir'),
(111, '2013-01-02', 3, '698996', 'CASH', 30, 30, 0, 'all set', 'Sudhir'),
(112, '2013-01-09', 3, '7770709', 'CASH', 19, 19, 0, 'None', 'Sudhir'),
(113, '2013-01-17', 2, '23456', 'CASH', 210, 210, 0, 'None', 'Sudhir'),
(114, '2013-01-17', 3, '5678', 'CREDIT', 180, 100, 80, 'None', 'Sudhir'),
(115, '2013-01-17', 3, '9696986', 'CREDIT', 600, 600, 0, 'will pay by 20 jan', 'Sudhir'),
(116, '2013-01-18', 1, 'A123456789', 'CASH', 80, 80, 0, 'None', 'kripa upa'),
(117, '2013-01-21', 2, '687669', 'CASH', 120, 100, 20, 'will pay', 'Sudhir'),
(118, '2013-01-26', 2, 'gggk', 'CASH', 15, 10, 5, 'will pay byu weekedn ', 'Sudhir'),
(119, '2013-01-31', 2, 'A23234DFFF', 'CREDIT', 122, 120, 2, 'None', 'Sudhir'),
(120, '2013-02-01', 1, 'A23456', 'CASH', 1448, 1448, 0, 'None', 'Sudhir');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
  `purchaseid` int(10) NOT NULL,
  `ited_id` int(10) NOT NULL,
  `quantity` int(4) NOT NULL,
  `expiary` date NOT NULL,
  `purchase_price` int(4) NOT NULL,
  `sell_price` int(4) NOT NULL,
  `indiv_tot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`purchaseid`, `ited_id`, `quantity`, `expiary`, `purchase_price`, `sell_price`, `indiv_tot`) VALUES
(101, 5, 150, '2012-12-12', 17, 12, 2550),
(101, 2, 150, '2012-12-13', 15, 25, 2250),
(101, 5, 150, '2012-12-12', 15, 12, 2250),
(101, 5, 150, '2012-12-13', 15, 12, 2250),
(102, 5, 150, '2012-12-12', 18, 12, 2700),
(102, 3, 150, '2012-12-13', 15, 14, 2250),
(102, 5, 150, '2012-12-13', 15, 12, 2250),
(102, 6, 150, '2012-12-13', 15, 0, 2250),
(103, 5, 150, '2012-12-12', 15, 12, 2250),
(103, 6, 150, '2012-12-13', 5, 9, 750),
(104, 5, 200, '2015-08-12', 8, 12, 1600),
(104, 8, 110, '2012-12-13', 6, 8, 660),
(104, 10, 120, '2012-12-12', 7, 10, 840),
(104, 7, 130, '2012-12-13', 8, 10, 1040),
(104, 9, 120, '2012-12-12', 8, 10, 960),
(105, 5, 100, '2012-12-12', 10, 12, 1000),
(106, 7, 20, '2017-12-15', 8, 10, 160),
(106, 9, 200, '2017-12-15', 7, 10, 1400),
(107, 5, 200, '2014-12-11', 8, 12, 1600),
(107, 7, 200, '2015-12-11', 3, 10, 600),
(108, 7, 100, '2012-12-07', 8, 10, 800),
(109, 6, 20, '2012-12-06', 4, 9, 80),
(109, 8, 20, '2012-12-06', 4, 8, 80),
(109, 10, 20, '2012-12-06', 4, 10, 80),
(110, 5, 200, '2015-08-07', 10, 12, 2000),
(110, 10, 200, '2015-08-07', 8, 10, 1600),
(110, 9, 200, '2015-08-07', 8, 10, 1600),
(111, 7, 1, '2013-01-17', 20, 10, 20),
(111, 8, 1, '2013-01-23', 10, 8, 10),
(112, 11, 1, '2015-01-15', 15, 20, 15),
(112, 8, 1, '2015-01-22', 4, 8, 4),
(113, 9, 20, '2013-01-17', 8, 10, 160),
(113, 10, 10, '2013-01-31', 5, 10, 50),
(114, 6, 20, '2014-01-16', 5, 9, 100),
(114, 10, 10, '2015-01-15', 8, 10, 80),
(115, 8, 100, '2015-01-15', 6, 8, 600),
(116, 12, 10, '2014-01-23', 8, 12, 80),
(117, 6, 20, '2014-01-17', 6, 9, 120),
(118, 6, 1, '2013-01-10', 9, 10, 9),
(118, 8, 1, '2013-01-24', 6, 8, 6),
(119, 5, 5, '2012-12-12', 10, 12, 50),
(119, 10, 9, '2012-12-12', 8, 10, 72),
(120, 13, 100, '2015-03-20', 14, 20, 1400),
(120, 10, 6, '2015-03-20', 8, 10, 48);

-- --------------------------------------------------------

--
-- Table structure for table `p_details`
--

CREATE TABLE IF NOT EXISTS `p_details` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `addrs` varchar(200) NOT NULL,
  `doj` date NOT NULL,
  `image1` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `p_medical_temp`
--

CREATE TABLE IF NOT EXISTS `p_medical_temp` (
  `id` int(4) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `sprice` int(4) NOT NULL,
  `exp_date` date NOT NULL,
  `qty` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sell_invoice`
--

CREATE TABLE IF NOT EXISTS `sell_invoice` (
  `billno` int(5) NOT NULL,
  `sell_date` date NOT NULL,
  `total` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `netpay` int(5) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_addr` varchar(200) NOT NULL,
  `cust_contact` varchar(20) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  PRIMARY KEY (`billno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_invoice`
--

INSERT INTO `sell_invoice` (`billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name`) VALUES
(108, '2013-01-02', 7800, 0, 7800, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(109, '2013-01-08', 3300, 0, 3300, 'Sumit', 'B 404', '2147483647', 'DR Sumit'),
(110, '2013-01-08', 6090, 0, 6090, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(111, '2013-01-08', 12000, 20, 9600, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(112, '2013-01-09', 120, 0, 120, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(113, '2013-01-17', 30, 0, 30, 'ABC', 'Not sure', '989954', 'DR ABC'),
(114, '2013-01-17', 380, 10, 342, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(116, '2013-01-17', 80, 0, 80, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(117, '2013-01-18', 100, 0, 100, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(118, '2013-01-18', 4000, 10, 3600, 'Amit kumar', 'B 403', '2147483647', 'DR Ky patil'),
(119, '2013-01-18', 260, 10, 234, 'AMit kumar', 'B 403 costa rica', '2147483647', 'DR Patil'),
(120, '2013-01-18', 10, 0, 10, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(121, '2013-01-18', 40, 0, 40, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(122, '2013-01-18', 40, 0, 40, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(123, '2013-01-18', 80, 0, 80, 'ABC', 'Not sure', '989952', 'DR ABC'),
(126, '2013-01-18', 100, 0, 100, 'ABC', 'Not sure', '2147483647', 'DR ABC'),
(127, '2013-01-18', 9, 0, 9, 'ABC', 'Not sure', '9764001455', 'DR ABC'),
(128, '2013-01-18', 40, 10, 36, 'AMit kumar', 'b 405 some society', '9999999999', 'DR kishore'),
(129, '2013-01-18', 12, 0, 12, 'Some user', 'A 503 somr soviety', '9899675544', 'DR suresh kumar'),
(130, '2013-01-18', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(131, '2013-01-18', 8, 0, 8, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(132, '2013-01-18', 19, 0, 19, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(137, '2013-01-18', 866, 20, 693, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(138, '2013-01-21', 60, 10, 54, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(139, '2013-01-22', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(140, '2013-01-26', 160, 10, 144, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(141, '2013-01-29', 138, 0, 138, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(142, '2013-01-31', 302, 0, 302, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(143, '2013-01-31', 30, 0, 30, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(144, '2013-01-31', 30, 0, 30, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(148, '2013-02-01', 228, 20, 182, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(149, '2013-02-01', 104, 10, 94, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(154, '2013-02-01', 64, 0, 64, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(159, '2013-02-02', 162, 5, 154, 'Amit kumar', 'B 405 costa rica', '9899526644', 'Dr Sunita  sharma'),
(161, '2013-02-02', 94, 0, 94, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(163, '2013-02-02', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(164, '2013-02-02', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(165, '2013-02-02', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC'),
(166, '2013-02-02', 184, 0, 184, 'ABC', 'Not sure', '9999999999', 'DR ABC');

-- --------------------------------------------------------

--
-- Table structure for table `sell_items`
--

CREATE TABLE IF NOT EXISTS `sell_items` (
  `billno` int(5) NOT NULL,
  `itemid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_items`
--

INSERT INTO `sell_items` (`billno`, `itemid`, `qty`, `total`) VALUES
(104, 10, 40, 400),
(104, 9, 100, 1000),
(105, 7, 6, 60),
(105, 9, 10, 100),
(106, 8, 10, 80),
(107, 8, 2000, 16000),
(107, 9, 2000, 20000),
(107, 9, 2000, 20000),
(107, 10, 1000, 10000),
(108, 7, 300, 3000),
(108, 6, 200, 1800),
(108, 7, 300, 3000),
(109, 6, 100, 900),
(109, 5, 200, 2400),
(110, 6, 10, 90),
(110, 5, 500, 6000),
(111, 5, 1000, 12000),
(112, 11, 1, 20),
(112, 7, 10, 100),
(113, 7, 1, 10),
(113, 9, 2, 20),
(114, 6, 20, 180),
(114, 10, 20, 200),
(115, 6, 10, 90),
(116, 8, 10, 80),
(117, 7, 10, 100),
(118, 7, 100, 1000),
(118, 10, 200, 2000),
(118, 7, 100, 1000),
(119, 8, 20, 160),
(119, 10, 10, 100),
(120, 9, 1, 10),
(121, 10, 4, 40),
(122, 9, 4, 40),
(123, 8, 10, 80),
(124, 5, 2, 24),
(125, 9, 2, 20),
(126, 10, 10, 100),
(127, 6, 1, 9),
(128, 10, 4, 40),
(129, 5, 1, 12),
(130, 5, 1, 12),
(130, 10, 1, 10),
(131, 8, 1, 8),
(132, 6, 1, 9),
(132, 10, 1, 10),
(137, 5, 38, 456),
(137, 8, 40, 320),
(137, 9, 9, 90),
(138, 12, 5, 60),
(139, 5, 1, 12),
(139, 9, 1, 10),
(140, 5, 5, 60),
(140, 9, 10, 100),
(141, 5, 4, 48),
(141, 6, 9, 90),
(142, 5, 12, 144),
(142, 6, 15, 150),
(142, 8, 1, 8),
(144, 5, 1, 12),
(144, 8, 1, 8),
(144, 10, 1, 10),
(143, 6, 1, 10),
(143, 9, 1, 10),
(143, 10, 1, 10),
(148, 5, 7, 84),
(148, 10, 12, 120),
(148, 12, 2, 24),
(149, 5, 2, 24),
(149, 9, 8, 80),
(150, 5, 3, 36),
(150, 6, 4, 40),
(152, 5, 2, 24),
(152, 8, 5, 40),
(154, 5, 2, 24),
(154, 9, 4, 40),
(159, 5, 6, 72),
(159, 6, 9, 90),
(161, 5, 7, 84),
(161, 6, 1, 10),
(163, 5, 1, 12),
(164, 5, 1, 12),
(164, 10, 1, 10),
(165, 5, 1, 12),
(166, 5, 7, 84),
(166, 6, 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `temp_items`
--

CREATE TABLE IF NOT EXISTS `temp_items` (
  `ID` int(10) NOT NULL,
  `DESC` varchar(50) NOT NULL,
  `PRICE` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_items`
--

INSERT INTO `temp_items` (`ID`, `DESC`, `PRICE`) VALUES
(61, 'chips1', 10),
(63, 'Paneer1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `id` varchar(20) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `pwd`, `name`, `emailid`) VALUES
('abc', 'abc', 'abc_user', 'abc'),
('amit', 'amit', 'amit kumar', 'amit'),
('ank', 'ank', 'ank', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
