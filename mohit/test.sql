-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2015 at 10:16 AM
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
(150, '2013-02-01', 76, 4, 73, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2013-02-01'),
(241, '2013-07-21', 212, 0, 212, 'sumit', 'b 404 pune', 2147483647, 'Dr Sumit , polaris', 'not require dnow', '2013-07-21'),
(442, '2014-11-20', 130, 0, 130, 'Unknown', 'Not provided', 0, 'Not provided', ' Nothing ', '2014-11-20'),
(183, '2013-03-22', 128, 0, 128, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2014-11-20'),
(203, '2013-04-12', 28, 0, 28, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2014-11-20'),
(333, '2013-08-28', 8, 0, 8, 'Unknown', 'Not provided', 0, 'Not provided', ' Nothing ', '2014-11-20'),
(276, '2013-08-25', 80, 0, 80, 'Unknown', 'Not provided', 0, 'Not provided', ' Nothing ', '2014-11-20'),
(274, '2013-08-25', 280, 5, 266, 'Unknown', 'Not provided', 0, 'Not provided', ' Nothing ', '2014-11-20'),
(221, '2013-07-08', 20, 0, 20, 'ABC', 'Not sure', 2147483647, 'DR ABC', ' Nothing ', '2014-11-20'),
(467, '2014-11-20', 200, 0, 200, 'Unknown', 'Not provided', 0, 'Not provided', ' Nothing ', '2014-11-20');

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
('demo', 'demo', 'Demo User', 'SUPER'),
('local', 'local', 'Local_User', 'NORMAL');

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
(149, 617);

-- --------------------------------------------------------

--
-- Table structure for table `m_master_store`
--

CREATE TABLE IF NOT EXISTS `m_master_store` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `desc` varchar(100) NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `exp_date` date NOT NULL,
  `s_price` float NOT NULL,
  `qty` int(5) NOT NULL,
  `trg` int(3) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `batchno` varchar(30) NOT NULL,
  `unitval` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=296 ;

--
-- Dumping data for table `m_master_store`
--

INSERT INTO `m_master_store` (`id`, `desc`, `capacity`, `exp_date`, `s_price`, `qty`, `trg`, `storage`, `cmp_name`, `batchno`, `unitval`) VALUES
(66, 'REGESTRONE', '12ML', '2016-12-12', 56.5, 104, 20, 'NOT SURE', '(SANDOZ)', 'RG4E55F|ABCD', 10),
(67, ' OFLOXACIN', '', '2014-08-15', 0, 100, 20, 'NOT SURE', '(V-OF-200)', 'NOT PROVIDED', 1),
(68, 'PULMOCEF', '', '2016-04-15', 158, 100, 20, 'NOT SURE', '(MICRO)', 'PCTB0124', 1),
(69, 'HORN O', '', '2016-06-15', 70, 100, 20, 'NOT SURE', 'DEYS', 'NOT PROVIDED', 1),
(70, 'NERVIJEN', '', '2015-12-15', 97, 100, 20, 'NOT SURE', 'JENBURET', 'NNP051433', 1),
(71, 'FEED', '', '2016-05-15', 11.4, 100, 20, 'NOT SURE', 'SANTO', 'S-1086', 1),
(72, 'COBADEX FORTE', '', '2016-10-10', 15.65, 106, 20, 'NOT SURE', 'NOT PROVIDED', 'MN437|ABCG', 1),
(73, 'REDPROPLUS', '', '2015-03-15', 30, 100, 20, 'NOT SURE', 'PHARMA SYNTH', 'C-3061', 1),
(74, 'BEFER', '', '2016-03-15', 66.35, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'WC080', 1),
(75, 'BONEST', '', '2015-08-15', 54, 100, 20, 'NOT SURE', 'A-LALABS RESEARCH PVT LTD', 'B-T- 1403130', 1),
(76, 'LEVEFLOXACIN TABLETS IP LEE', '5OO MG', '2016-02-15', 50.83, 100, 20, 'NOT SURE', 'SHREYA', 'R14461102', 1),
(77, 'NUFORCE', '', '2016-01-15', 90, 100, 20, 'NOT SURE', 'MANKIND', 'B8CGN014', 1),
(78, 'COMCEF', '200 DT', '2016-10-15', 90, 100, 20, 'NOT SURE', 'LIFECOM', 'BA 334', 1),
(79, 'LACTOBLON FORTE CAPSULES', '', '2016-02-15', 0, 100, 20, 'NOT SURE', 'PHARMA SYNTH', 'C-4045', 1),
(80, 'MONOTAX-CV', '', '2015-03-15', 219.6, 100, 20, 'NOT SURE', 'PLATINEX', 'MTV31004', 1),
(81, 'SWICH CV', '325', '2016-07-15', 240, 100, 20, 'NOT SURE', 'UITICARE', 'NOT PROVIDED', 1),
(82, 'PECEF', '200', '2016-06-15', 125, 100, 20, 'NOT SURE', 'DR. REDDYS', 'CF40707', 1),
(83, 'C-FURO', '250', '2016-09-15', 105, 100, 20, 'NOT SURE', 'HETERO', 'NOT PROVIDED', 1),
(84, 'IBA', '150', '2015-11-15', 170, 100, 20, 'NOT SURE', 'HYGIEIA', 'CT33716', 1),
(85, 'AZITHROMYCIN', '500', '2016-01-15', 0, 100, 20, 'NOT SURE', 'AZID', 'ARL4002', 1),
(86, 'AZOMID', '250', '2016-03-15', 61.56, 100, 20, 'NOT SURE', 'MIDAS', 'SAT-2222', 1),
(87, 'HIFEN-AZ', '', '2016-06-15', 169, 100, 20, 'NOT SURE', 'HETERO', 'NOT PROVIDED', 1),
(88, 'BIOCLAR', '250', '2016-07-15', 150.49, 100, 20, 'NOT SURE', 'BIOCHEM', 'TA1144014', 1),
(89, 'LUMETHER FORTE DT', '', '2015-06-15', 160, 100, 20, 'NOT SURE', 'THEMIS', 'LFD307', 1),
(90, 'MOXIMAC', '', '2016-07-15', 190, 100, 20, 'NOT SURE', 'MACLEODS', 'BMCI3184', 1),
(91, 'AKELLO', '625', '0000-00-00', 165, 100, 20, 'NOT SURE', 'TULIP LAB', '273AB21', 1),
(92, 'LIZOFORCE', '600', '2016-02-15', 120, 100, 20, 'NOT SURE', 'MANKIND', 'C8AZN011', 1),
(93, 'LINID', '', '2016-06-15', 455, 100, 20, 'NOT SURE', 'LINU', 'HB137', 1),
(94, 'OCUVIR', '800 DT', '2016-07-15', 131.75, 100, 20, 'NOT SURE', 'FDC', 'DFT4081', 1),
(95, 'OCUVIR', '400 DT', '2016-06-15', 64.85, 100, 20, 'NOT SURE', 'FDC', 'DCT4072', 1),
(96, 'XYLOMIST', '', '2016-12-15', 54, 100, 20, 'NOT SURE', 'GERMAN  REMEDIES', 'UP1035', 1),
(97, 'ANNAFORTAN', '', '2015-08-15', 36.75, 99, 20, 'NOT SURE', 'ABBOTT', 'AN34005', 1),
(98, 'MUCORIS(PAEDIATRIC)', '', '2015-04-15', 27.5, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'JWV2051', 1),
(99, 'NAM COLD', '', '2016-01-15', 0, 100, 20, 'NOT SURE', 'LINCOLN', 'NOT PROVIDED', 1),
(100, 'NOWORM', '', '2015-07-15', 15.54, 100, 20, 'NOT SURE', 'ALKEM', 'NWS', 1),
(101, 'NASCON', '', '2015-12-15', 50, 100, 20, 'NOT SURE', 'DIVINE', 'NOT PROVIDED', 1),
(102, 'NAZOMAC-AF', '', '2015-09-15', 215, 100, 20, 'NOT SURE', 'MACLEODS', 'BND0201', 1),
(103, 'OTRIVEN', '', '2016-02-15', 55, 100, 20, 'NOT SURE', 'NOVARTIS', '30355V', 1),
(104, 'ORASEP', '', '2016-02-15', 48, 100, 20, 'NOT SURE', 'ELAN PHARMA', 'E403', 1),
(105, 'AVAMYS', '', '2015-02-15', 0, 100, 20, 'NOT SURE', 'GLAXOSMITHKLINE', 'C619156', 1),
(106, 'WAXIKLIN', '', '2015-07-15', 53, 100, 20, 'NOT SURE', 'ELAN PHARMA', 'E3010', 1),
(107, 'ORASEP-OT', '', '2017-01-15', 52, 100, 20, 'NOT SURE', 'ELAN PHARMA', 'E402', 1),
(108, 'NEOSPORIN', '', '2015-11-15', 47.85, 100, 20, 'NOT SURE', 'GLAXOSMITHKLINE', 'B378', 1),
(109, 'ENTOF', '', '2015-03-15', 0, 100, 20, 'NOT SURE', 'DEYS', 'D3003', 1),
(110, 'ZENFLOX', '', '2015-06-15', 25, 100, 20, 'NOT SURE', 'MANKIND PHARMA', 'DOAQM014', 1),
(111, 'TOBASTAR', '', '2015-12-15', 33, 100, 20, 'NOT SURE', 'LIFESTAR', 'AIATN001', 1),
(112, 'O-CARE', '', '2014-03-15', 55, 100, 20, 'NOT SURE', 'DIVINE', 'NOT PROVIDED', 1),
(113, 'LANAC-SP', '', '2016-05-15', 59.5, 100, 20, 'NOT SURE', 'LA ENTERPRISES', 'NOT PROVIDED', 10),
(114, 'ACTIHEAL D', '', '2016-05-15', 160, 100, 20, 'NOT SURE', 'MACLEODS', 'HTD4196', 10),
(115, 'DICLOMOL-SP', '10 MG', '2015-12-15', 49.5, 100, 20, 'NOT SURE', 'WM MEDICARE', 'NA0180', 10),
(116, 'ARCECLO-P', '', '2015-10-15', 45, 100, 20, 'NOT SURE', 'ARAN', 'NOT PROVIDED', 10),
(117, 'JUST 90 MR', '', '2015-05-15', 45.3, 100, 20, 'NOT SURE', 'ACCENT PHARMA', 'JGN1201', 10),
(118, 'FLUCLOX', '150 MG', '2015-11-15', 15.17, 100, 20, 'NOT SURE', 'BIOCHEM', 'DD13807', 10),
(119, 'FEXONA', '', '2015-12-15', 79, 100, 20, 'NOT SURE', 'HETRO', 'GT140086', 10),
(120, 'AIRLUNG', '', '2016-02-15', 65, 99, 20, 'NOT SURE', 'PLATINEX', 'BA8509', 10),
(121, 'DOXINATE PLUS', '', '2016-12-15', 118, 100, 20, 'NOT SURE', 'SVIZERA', 'DAM1401', 30),
(122, 'DRIPRID', '4 MG', '2015-10-15', 30, 100, 20, 'NOT SURE', 'UNIQUE', 'XDW-A008', 10),
(123, 'LIBOTRYP-E25', '5 MG', '2016-06-15', 60, 100, 20, 'NOT SURE', 'WOCKHART', 'WAF4001', 10),
(124, 'MEFTAL SPAS', '', '2016-12-15', 29, 100, 20, 'NOT SURE', 'BLUE CROSS', 'YMS1430', 10),
(125, 'DEFLATE D', '', '2016-06-15', 149, 100, 20, 'NOT SURE', 'SHREYA', 'R14482102', 10),
(126, 'MEFTAL P', '', '2017-06-15', 10, 100, 20, 'NOT SURE', 'BLUE CROSS', 'HMP1429', 10),
(127, 'LYSOFLAM', '', '2016-04-15', 75, 100, 20, 'NOT SURE', 'CACHET', 'LFT/4060C', 10),
(128, 'ACUVIN', '32.5 MG', '2016-07-15', 78, 100, 20, 'NOT SURE', 'ABBOTT', 'TM14147', 10),
(129, 'ACLOPRIDE SP', '', '2016-06-15', 79, 100, 20, 'NOT SURE', 'INNOVATIVE PHARMA', 'APST-005', 10),
(130, 'URGENDOL P', '', '2016-02-15', 74, 100, 20, 'NOT SURE', 'WIN MEDICARE', 'C0134', 10),
(131, 'TRYPKEM', '', '2015-10-15', 330, 100, 20, 'NOT SURE', 'KEEPWELL CARE', 'BNT-1405022', 10),
(132, 'TRAZODZC', '', '2015-05-15', 89, 100, 20, 'NOT SURE', 'CADILA', 'JK13001', 10),
(133, 'SISTAL FORTE', '', '2017-01-15', 115, 100, 20, 'NOT SURE', 'SALUTE BESTOCHEM', 'SBT-1408254', 10),
(134, 'TAXIMAX', '1500 MG', '2017-01-15', 41, 100, 20, 'NOT SURE', 'ALKEM', 'NOT PROVIDED', 1),
(135, 'MONOTAX', '19 MG', '2016-07-15', 60, 100, 20, 'NOT SURE', 'BIOCHEM', 'EA9144844', 1),
(136, 'TAXIM', '19 MG', '2016-07-15', 33, 100, 20, 'NOT SURE', 'ALKEM', 'NOT PROVIDED', 1),
(137, 'TAXIM', '125 MG', '2016-09-15', 14, 100, 20, 'NOT SURE', 'ALKEM', 'NOT PROVIDED', 1),
(138, 'TAXIM', '250 MG', '2016-05-15', 16, 100, 20, 'NOT SURE', 'ALKEM', 'NOT PROVIDED', 1),
(139, 'MONOTAX-SB', '1.5 MG', '2016-06-15', 70, 100, 20, 'NOT SURE', 'BIOCHEM', 'ND8144030', 1),
(140, 'TAXIM`', '500 MG', '2016-08-15', 16, 100, 20, 'NOT SURE', 'ALKEM', 'NOT PROVIDED', 1),
(141, 'PANTODAC', '40 MG', '2016-05-15', 53, 100, 20, 'NOT SURE', 'ALIDAC CORZA', 'MP6069', 1),
(142, 'KEFI', '', '2016-06-15', 172, 100, 20, 'NOT SURE', 'MACLEODS', 'CCFZH02A', 1),
(143, 'BIOPIME', '19 MG', '2015-08-15', 108, 100, 20, 'NOT SURE', 'BIOCHEM', 'BD7143001', 1),
(144, 'ZALACORT', '6 MG', '2016-05-15', 92, 100, 20, 'NOT SURE', 'BAXTOM', 'UDT-4427A', 10),
(145, 'VETIGEN', '', '2016-05-15', 28, 100, 20, 'NOT SURE', 'GENO', '3T157', 10),
(146, 'CINZAN', '25 DT', '2015-12-15', 24, 100, 20, 'NOT SURE', 'FDC', 'ZNT4011', 10),
(147, 'FLUNER', '10 MG', '2016-05-15', 43, 100, 20, 'NOT SURE', 'GENO', '3T062', 10),
(148, 'IGTG FORTE', '', '2015-11-15', 170, 100, 20, 'NOT SURE', 'ALCHEMIST', 'EIGI4B25', 1),
(149, 'DERIPHYLIN', '300 MG', '2017-04-15', 7.38, 100, 20, 'NOT SURE', 'ZYDUS HEALTHCARE', 'ZHP2223', 10),
(150, 'AMLOKIND-AT', '', '2016-02-15', 14.5, 100, 20, 'NOT SURE', 'MANKIND PHARMA', 'AZAFN080', 1),
(151, 'METROGYL', '400 MG', '2017-09-15', 11.22, 100, 20, 'NOT SURE', 'JP CHEMICALS/UNIQUE', 'TM83239', 15),
(152, 'PICSUL', '', '2016-01-15', 35, 100, 20, 'NOT SURE', 'MISSION RESEARCH', 'PLT-688', 10),
(153, 'PIOMED', '30 MG', '2015-12-15', 63.5, 100, 20, 'NOT SURE', 'IPCA', 'DQP03100', 20),
(154, 'TALECALM PLUS', '', '2016-06-15', 10, 100, 20, 'NOT SURE', 'TALENT INDIA', 'T-3539', 10),
(155, 'DROMIS', '8 MG', '2015-11-15', 25, 100, 20, 'NOT SURE', 'MISSION RESEARCH', 'PLT-642', 10),
(156, 'DELCON PLUS', '', '2015-12-15', 30.8, 100, 20, 'NOT SURE', 'VERITAZ', 'DPR14A003', 10),
(157, 'LEVOCETIRIZA', '', '2015-07-15', 35, 100, 20, 'NOT SURE', 'AUSTRO LABS', '3A6CTA', 10),
(158, 'AUS-Q', '', '2015-07-15', 30, 98, 20, 'NOT SURE', 'AUSTRO LABS', 'MT-13357', 10),
(159, 'CONCET-A', '', '2016-09-15', 22, 100, 20, 'NOT SURE', 'LIFECOM', 'CT-789', 10),
(160, 'ALLRITE VAP', '', '2014-12-15', 36, 100, 20, 'NOT SURE', 'SOFTECH PHARMA', 'SLS0412', 10),
(161, 'MUCONELT A', '', '2015-05-15', 69, 100, 20, 'NOT SURE', 'VENUS REMEDIES', 'NOT PROVIDED', 1),
(162, 'NEOMOL', '', '2017-04-15', 7, 100, 20, 'NOT SURE', 'NEON', 'SM91111', 1),
(163, 'RANTAC', '', '2016-01-15', 3, 100, 20, 'NOT SURE', 'UNIQUE', 'YR24211', 1),
(164, 'REVICL', '', '2017-04-15', 45, 100, 20, 'NOT SURE', 'KEE PHARMA', 'REC 14-05', 1),
(165, 'HAEMACCEL', '100 MG', '2017-02-15', 300, 100, 20, 'NOT SURE', 'ABBOTT', 'HMA4042', 1),
(166, 'LINID', '600 MG', '2015-08-15', 376, 100, 20, 'NOT SURE', 'ZYDUS CADILA', 'AP1043', 1),
(167, 'CELEMIN', '', '2016-04-15', 360, 100, 20, 'NOT SURE', 'CLARIS OTSUKA', 'C441487', 1),
(168, 'AUGPIN', '1.2 MG', '2014-02-15', 133, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'CKD14005', 1),
(169, 'CIFIGOLD', '', '2016-01-15', 28, 100, 20, 'NOT SURE', 'PHARMA SYNTH', 'TH-437', 1),
(170, 'MEGA-CV', '300 MG', '2014-08-15', 73, 100, 20, 'NOT SURE', 'ARISTA', 'P-1409042', 1),
(171, 'MOXCLAV', '1.2 MG', '2014-03-15', 133, 100, 20, 'NOT SURE', 'RANBAXY', 'M10S14', 1),
(172, 'TRANZI', '500 MG', '2016-03-15', 49, 100, 20, 'NOT SURE', 'PHARMA SYNTH', 'UDA-4089', 1),
(173, 'DUVADILAN', '5 MG', '2016-12-15', 12, 100, 20, 'NOT SURE', 'ABBOTT', 'CCE-003', 1),
(174, 'MVI', '', '2015-06-15', 14, 100, 20, 'NOT SURE', 'NBZPHARMA', 'NP14183', 1),
(175, 'THIOSAL', '500MG', '2016-05-15', 44, 100, 20, 'NOT SURE', 'NEON', 'NOT PROVIDED', 1),
(176, 'K-STAT', '2 ML', '2016-12-15', 29, 100, 20, 'NOT SURE', 'MERCURY LABORATORIES', 'NOT PROVIDED', 1),
(177, 'MYOSTIGMINO', '.5MG', '2016-10-15', 21, 100, 20, 'NOT SURE', 'NEON', 'NOT PROVIDED', 1),
(178, 'PYROLATE', '0.2 MG', '2017-01-15', 1, 100, 20, 'NOT SURE', 'NEON', 'NOT PROVIDED', 1),
(179, 'TROPINE', '', '2016-05-15', 4, 100, 20, 'NOT SURE', 'NEON', 'NOT PROVIDED', 1),
(180, 'INJECK', '1 ML', '2015-07-15', 12, 100, 20, 'NOT SURE', 'NEON', 'NOT PROVIDED', 1),
(181, 'ANACIN', '20 ML', '2017-02-15', 73, 100, 20, 'NOT SURE', 'NEON', 'SU10760', 1),
(182, 'LASIX', '2 ML', '2017-04-15', 3, 100, 20, 'NOT SURE', 'SANOFI', 'NOT PROVIDED', 1),
(183, 'EPIDOSIN', '', '2017-03-15', 15, 100, 20, 'NOT SURE', 'TTK PRODUCT', '14AB16', 1),
(184, 'BUSCOGAST', '', '2016-05-15', 4, 100, 20, 'NOT SURE', 'BOEHRINGER INGELHEIM', 'SBI4002', 1),
(185, 'BRUDOL', '2 ML', '2015-12-15', 24, 100, 20, 'NOT SURE', 'MEDICROSS', 'AAI-03', 1),
(186, 'DERIPHYLIN', '2 ML', '2018-08-15', 3, 100, 20, 'NOT SURE', 'CADILA HEALTHCARE', 'A9P1078', 1),
(187, 'EPSOLIN', '2 ML', '2017-07-15', 10, 100, 20, 'NOT SURE', 'ZYDUS', 'WN1103', 1),
(188, 'RTSONATE', '60 MG', '2016-04-15', 221, 100, 20, 'NOT SURE', 'THEMIS MEDICARE', 'GA4001', 1),
(189, 'DROTIKIND', '2 ML', '2016-08-15', 16, 100, 20, 'NOT SURE', 'LIFESTAR', 'B5AAN008', 1),
(190, 'AVIL', '2 ML', '2017-01-15', 3, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'NOT PROVIDED', 1),
(191, 'PHENERGAN', '2 ML', '2016-08-15', 10, 100, 20, 'NOT SURE', 'ABBOTT', 'NAH-13015', 1),
(192, 'GENTICYN', '60 MG', '2015-01-15', 6, 100, 20, 'NOT SURE', 'ABBOTT', 'EAIB2003', 1),
(193, 'NEUROBION FORTE', '2 ML', '2015-02-15', 7, 100, 20, 'NOT SURE', 'MERCK', 'O33119513', 1),
(194, 'CERVIPRIME', '0.5 MG', '2015-02-15', 237.4, 100, 20, 'NOT SURE', 'ASTRAZENECA', 'PGN005K', 1),
(195, 'ABHAYRAB', '', '2018-10-15', 337, 100, 20, 'NOT SURE', 'HUMAN BIOLOGICALS INSTITUTE', 'B11502', 1),
(196, 'MEROMAC', '1 MG', '2016-08-15', 592, 100, 20, 'NOT SURE', 'MACLEODS', 'CM1423A', 1),
(197, 'GRAVICARE', '2 ML', '2016-06-15', 175, 100, 20, 'NOT SURE', 'SANTO', 'HP-374', 1),
(198, 'DORMIN', '5 ML', '2016-05-15', 30, 100, 20, 'NOT SURE', 'NEON', '890226', 1),
(199, 'CLINCIN', '4 ML', '2016-05-15', 168, 100, 20, 'NOT SURE', 'INDI', 'CIZ024B', 1),
(200, 'DECAMID-25', '1 ML', '2015-12-15', 86, 100, 20, 'NOT SURE', 'MIDAS', 'SBA-076', 1),
(201, 'DECAMID-50', '1 ML', '2015-06-15', 135, 100, 20, 'NOT SURE', 'SYMBIOTIC', 'L-279', 1),
(202, 'SUCOL', '', '2015-10-15', 67, 100, 20, 'NOT SURE', 'NEON ', '248194', 1),
(203, 'HEP', '', '2015-07-15', 236.5, 100, 20, 'NOT SURE', 'BALWAN GROUP', 'LLA020', 1),
(204, 'ZETRI-1G', '', '2015-09-15', 53, 100, 20, 'NOT SURE', 'SANDOZ', 'ZA.3J09K', 1),
(205, 'MONOCEF', '500 MG', '2016-06-15', 46, 100, 20, 'NOT SURE', 'ARISTO', 'M96A134', 1),
(206, 'MONOCEF', '250 MG', '2016-07-15', 27, 100, 20, 'NOT SURE', 'ARISTO', 'B017B084', 1),
(207, 'MONOCEF', '125 MG', '2016-12-15', 21, 100, 20, 'NOT SURE', 'ARISTO', 'B094G034', 1),
(208, 'TAZOMAC', '4.5 MG', '2016-10-15', 202, 100, 20, 'NOT SURE', 'MACLEODS', 'CPK4102A', 1),
(209, 'PANTODAC', '', '2016-05-15', 53, 100, 20, 'NOT SURE', 'CORZA', 'MP6069', 1),
(210, 'XTUM', '375 MG', '2016-05-15', 49, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'R14214103', 1),
(211, 'PEP-T', '', '2016-08-15', 413, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'AI14079', 1),
(212, 'ORNIGYL', '100 ML', '2016-01-15', 80, 100, 20, 'NOT SURE', 'UNIQUE,JB CHEMICALS & PHARMACEUTICAL LTD', 'IGY4001', 1),
(213, 'LEVOBACT', '100 ML', '2015-10-15', 100, 100, 20, 'NOT SURE', 'MICRO', 'LVJA093', 1),
(214, 'OF PLUS', '100 ML', '2015-07-15', 126, 100, 20, 'NOT SURE', 'UNIQUE,JB CHEMICALS & PHARMACEUTICAL LTD', 'XFP4010', 1),
(215, 'POLYBION', '2 ML', '2015-03-15', 3, 100, 20, 'NOT SURE', 'MERCK', 'G06919213', 1),
(216, 'BETHADOXIN', '122 ML', '2017-09-15', 5, 100, 20, 'NOT SURE', 'BIOLOGICAL E LIMITED', 'NB015', 1),
(217, 'LOX 2% ADRENALINE', '30 ML', '2015-05-15', 28, 100, 20, 'NOT SURE', 'NEON', 'SM20896', 1),
(218, 'HALOTHANE', '50 ML', '2018-12-15', 300, 100, 20, 'NOT SURE', 'RAMON', 'H-14012', 1),
(219, 'GENTICYN', '', '2016-08-15', 4, 100, 20, 'NOT SURE', 'ABBOTT', 'AHN302458', 1),
(220, 'BIOTOCYLIN', '1 ML', '2015-03-15', 18, 100, 20, 'NOT SURE', 'SPECTRUM', 'BC-800', 1),
(221, 'METHARMED', '1 ML', '2016-03-15', 14, 100, 20, 'NOT SURE', 'GERMAN  REMEDIES(GERMED)', 'QI-1409', 1),
(222, 'NEUROCETAM-1200', '', '2017-04-15', 190, 100, 20, 'NOT SURE', 'MICRO', 'MRFY0040', 10),
(223, 'GLYCOMET-GP-1', '1', '2016-06-15', 75, 100, 20, 'NOT SURE', 'USV', '48004117', 10),
(224, 'N FLOX-TZ', '', '2015-08-15', 60, 100, 20, 'NOT SURE', 'LABORATE', 'PCNTT-001', 10),
(225, 'ISV UMP', '', '2016-04-15', 53, 100, 20, 'NOT SURE', 'GALPHA LABORATORIES', 'ISVT4004B', 10),
(226, 'ZONDEL', '', '2014-12-15', 33, 100, 20, 'NOT SURE', 'VERITAZ', 'ZTR139002', 1),
(227, 'DOLOPAR-650', '', '2018-01-15', 22, 100, 20, 'NOT SURE', 'MICRO LABS LIMITED', 'DUFD0038', 10),
(228, 'FEPANIL', '500 MG', '2017-07-15', 10, 100, 20, 'NOT SURE', 'VERITAZ', 'FTD14H048', 10),
(229, 'PANTOSHARP D', '', '2016-06-15', 80, 100, 20, 'NOT SURE', 'UNIBIOTECH', 'UBC-3188', 1),
(230, 'HIMALAYA LIV-52', '', '2015-07-15', 75, 100, 20, 'NOT SURE', 'WORLDWIDE', ' C-AUS,19300474F', 100),
(231, 'LUKOL', '', '2015-03-15', 90, 100, 20, 'NOT SURE', 'HIMALAYA', '373003443', 1),
(232, 'GASEX', '', '2017-11-15', 75, 100, 20, 'NOT SURE', 'NOT PROVIDED', '19200812F', 100),
(233, 'REPSIA D', '', '2016-07-15', 46, 100, 20, 'NOT SURE', 'INDI PHARMA', 'RSP40604', 10),
(234, 'P-ZIDE 750', '', '2018-08-15', 77, 100, 20, 'NOT SURE', 'CADILA', 'JK14008', 10),
(235, 'MYCONEX', '800 MG', '2017-07-15', 70, 100, 20, 'NOT SURE', 'CADILA', 'JK14005', 10),
(236, 'MYCUBUTOL', '800 MG', '2018-06-15', 41.75, 100, 20, 'NOT SURE', 'CADILA', 'JK14009', 1),
(237, 'COMBIFLAM', '', '2017-05-15', 16, 100, 20, 'NOT SURE', 'SANOFI', '2140831', 15),
(238, 'R-CIN', '300 MG', '2015-03-15', 31, 100, 20, 'NOT SURE', 'LUPIN', 'A301867', 10),
(239, 'COMBUTOL', '600 MG', '2016-05-15', 31, 100, 20, 'NOT SURE', 'LUPIN', '1301460', 10),
(240, 'MYCURIT', '4 MG', '2016-07-15', 25.7, 100, 20, 'NOT SURE', 'CADILA', '14039', 8),
(241, 'MYCOCOX', '', '2016-07-15', 16.8, 100, 20, 'NOT SURE', 'CADILA', '14023', 10),
(242, 'AMPILOX', '500 MG', '2015-11-15', 50.3, 100, 20, 'NOT SURE', 'BIOCHEM', 'AA1136285', 10),
(243, 'OCID 20', '', '2015-11-15', 47.5, 100, 20, 'NOT SURE', 'ZYDUS CADILA', 'ZHP1616', 15),
(244, 'RANTAC', '150 MG', '2016-06-15', 19, 100, 20, 'NOT SURE', 'UNIQUE', 'OR34277', 30),
(245, 'K-STAT-250', '', '2016-08-15', 80, 100, 20, 'NOT SURE', 'MERCURY ', 'BH02209', 10),
(246, 'RHUMACORT', '', '2017-06-15', 23.5, 100, 20, 'NOT SURE', 'GALPHA LABORATORIES', 'RCT4074B', 10),
(247, 'METHERGIN', '', '2017-04-15', 79, 100, 20, 'NOT SURE', 'INTAS', 'T-1405181', 10),
(248, 'OINTMENT BETADINE', '15 MG', '2016-09-15', 82, 100, 20, 'NOT SURE', 'WIN-MEDICARE', 'RC0064', 1),
(249, 'OINTMENT JUST 90', '30 MG', '2015-09-15', 60.65, 100, 20, 'NOT SURE', 'INDI PHARMA', 'J395', 1),
(250, 'OINTMENT EUMOSONE-M', '', '2016-01-15', 69.3, 100, 20, 'NOT SURE', 'GSK', 'EL205', 1),
(251, 'OINTMENT NADOXIN', '', '2016-02-15', 70.5, 100, 20, 'NOT SURE', 'WOCKHARDT', 'JP10305', 1),
(252, 'BEAP GEL', '', '2015-11-15', 69, 100, 20, 'NOT SURE', 'BE', 'PB012', 1),
(253, 'SOFRAMYCIN', '', '2017-02-15', 28.5, 100, 20, 'NOT SURE', 'SANOFI', 'E4424', 1),
(254, 'NEOSPORIN', '', '2016-07-15', 31, 100, 20, 'NOT SURE', 'GLAXOSMITHKLINE', 'BB403', 1),
(255, 'BETNOVATE-C', '', '2016-08-15', 30.3, 100, 20, 'NOT SURE', 'GLAXOSMITHKLINE', 'Z302', 1),
(256, 'THROMBOTAS', '', '2015-10-15', 65, 100, 20, 'NOT SURE', 'INTAS', 'T1308', 1),
(257, 'LEXANOX PLUS', '', '2015-11-15', 64, 100, 20, 'NOT SURE', 'MACLEODS', 'O64', 1),
(258, 'HIXADINE OINTMENT USP', '', '2016-07-15', 252, 100, 20, 'NOT SURE', 'HICKS', 'HX-61', 1),
(259, 'SODIUM PHOSPHATES ENEMA BP', '100 ML', '2016-01-15', 46.4, 100, 20, 'NOT SURE', 'GODJAY', 'EN-16', 1),
(260, 'EZNAC ENEMA', '', '2016-06-15', 36, 100, 20, 'NOT SURE', 'GL', 'EZE4011', 1),
(261, 'NEEDLE', '26 G', '2019-01-15', 2, 100, 20, 'NOT SURE', 'HMD', '06463D', 1),
(262, 'NEEDLE', '15 G', '2018-11-15', 2, 100, 20, 'NOT SURE', 'HMD', '49351D', 1),
(263, 'HYDROGEN P', '', '2016-01-15', 10, 100, 20, 'NOT SURE', 'UNIQUE LABS', '29', 1),
(264, 'MAVEX KID', '', '2015-12-15', 25, 100, 20, 'NOT SURE', 'MAV INDIA', 'CS339', 1),
(265, 'ZONDEL', '', '2016-05-15', 33, 100, 20, 'NOT SURE', 'VERITAZ', 'ZLR14K003', 1),
(266, 'RED PLUS DROP', '', '2015-08-15', 40, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'S3306', 1),
(267, 'IMAL', '', '2016-08-15', 19.2, 100, 20, 'NOT SURE', 'ALIDAC FORTIZA', 'HP1180', 1),
(268, 'COZI FLU', '', '2016-04-15', 38, 100, 20, 'NOT SURE', 'UNIBIOTECH', 'UBC-3039', 1),
(269, 'DROP MEFTAL P', '', '2015-09-15', 27, 100, 20, 'NOT SURE', 'BLUE CROSS', 'ZNM-1403', 1),
(270, 'STAMIN DROP', '', '2015-05-15', 10.5, 100, 20, 'NOT SURE', 'IND-SWIFR', 'BSTM-160', 1),
(271, 'CAF VECTOR', '', '2015-12-15', 53.5, 100, 20, 'NOT SURE', 'SANDOZ', 'CH4A06V', 1),
(272, 'FEPANIL 250', '', '2016-03-15', 35, 100, 20, 'NOT SURE', 'VERITAZ', 'FLH140011', 1),
(273, 'MALIDENS DS', '', '2016-05-15', 32, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'M140543', 1),
(274, 'FEVEREX PLUS', '', '2016-11-15', 42.5, 100, 20, 'NOT SURE', 'INDOCO  REMEDIES LTD', 'FCM513E', 1),
(275, 'COSCOPEN', '', '2016-03-15', 43, 100, 20, 'NOT SURE', 'BIOLOGICAL E LIMITED', 'U300', 1),
(276, 'SOLACID-O', '', '2017-06-15', 50, 100, 20, 'NOT SURE', 'DEYS', '1523', 1),
(277, 'HEXIDE GARGYL', '', '2016-05-15', 35, 100, 20, 'NOT SURE', 'DEYS', '263', 1),
(278, 'CYPEMIX', '', '2015-02-15', 68, 100, 20, 'NOT SURE', 'NIX PHARMA', 'C-101239', 1),
(279, 'HEPATO', '', '2017-03-15', 80, 100, 20, 'NOT SURE', 'SANTO', 'AY-0781', 1),
(280, 'BETHADOXIN-12 M', '', '2015-10-15', 66.45, 100, 20, 'NOT SURE', 'BIOLOGICAL ', 'U368', 1),
(281, 'BESTOZYML', '', '2015-08-15', 60, 100, 20, 'NOT SURE', 'BIOLOGICAL E LIMITED', 'U395', 1),
(282, 'NEURO', '', '2016-05-15', 202, 100, 20, 'NOT SURE', 'MICRO', 'NU11052', 1),
(283, 'IMMUNEOD', '', '2015-11-15', 57.5, 100, 20, 'NOT SURE', 'WOCKHARDT LIMITED', 'WPA3007', 1),
(284, 'COLISTOP', '', '2015-12-15', 34, 100, 20, 'NOT SURE', 'INDI PHARMA', 'CPR4004', 1),
(285, 'KEFLOR', '125 MG', '2015-09-15', 119, 100, 20, 'NOT SURE', 'RANBAXY', '2608866', 1),
(286, 'AC', '', '2015-12-15', 53, 100, 20, 'NOT SURE', 'DEYS', 'SRAC54', 1),
(287, 'T-98', '', '2016-02-15', 20.16, 100, 20, 'NOT SURE', 'MANKIND', 'B9AJN046', 1),
(288, 'IPECO', '', '2016-10-15', 60.5, 100, 20, 'NOT SURE', 'CIPLA', 'A32420', 1),
(289, 'GUTRIFE SACHET', '', '2015-05-15', 7.5, 100, 20, 'NOT SURE', 'FDC LIMITED', 'GXQ3121', 1),
(290, 'ZENOCIN OZ', '', '2015-06-15', 76.5, 100, 20, 'NOT SURE', 'RANBAXY', '713', 1),
(291, 'DROP T-98', '', '2015-08-15', 25.5, 100, 20, 'NOT SURE', 'MANKIND', 'D4BEN030', 1),
(292, 'NUTANE', '', '2016-10-15', 100, 100, 20, 'NOT SURE', 'AGUSEWICH', '102', 1),
(293, 'BLUECODYN', '', '2015-11-15', 70, 100, 20, 'NOT SURE', 'NOT PROVIDED', 'L13180', 1),
(294, 'LEUKOKIND', '', '2016-10-15', 750, 100, 20, 'NOT SURE', 'BSM MEDICAL', 'L13GB067', 1),
(295, 'COPTIKA PLUS', '', '2015-08-15', 74, 100, 20, 'NOT SURE', 'KS SURGICAL', 'CB-13', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `m_vendor`
--

INSERT INTO `m_vendor` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Some new vendor', '8767789889', 'A-26  hlkhnl b bjh bjbcjv cjsvcsj '),
(2, 'Vendor123', '989952', 'i AM NOT SURE'),
(3, 'Vendor 2', '0708808', 'A45 yyard'),
(9, 'DR reddy labs', '9988776655', 'not sure now'),
(10, 'Azx pharma', '989952', 'b jlkj lj ank nlnl xcnla 778 dn ldjnld '),
(11, 'bcd   vendor', '9988777789', 'nkk kkad kjdba');

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
  `total` float NOT NULL,
  `amount_paid` float NOT NULL,
  `balance` float NOT NULL,
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
(119, '2013-01-31', 2, 'A23234DFFF', 'CREDIT', 122, 122, 0, 'None', 'Sudhir'),
(120, '2013-02-01', 1, 'A23456', 'CASH', 1448, 1448, 0, 'None', 'Sudhir'),
(121, '2013-07-19', 2, '556666', 'CASH', 500, 500, 0, 'None', 'Demo User'),
(122, '2013-08-28', 2, '12234', 'CASH', 310, 310, 0, 'None', 'demo user'),
(123, '2013-08-31', 1, '12434', 'CASH', 4000, 4000, 0, 'None', 'Demo User'),
(124, '2014-11-14', 9, '123', 'CASH', 42, 40, 2, 'None', 'Demo User'),
(125, '2014-11-20', 1, '4567', 'CASH', 2400, 2400, 0, 'FULLY PAID', 'Demo User'),
(126, '2014-12-05', 2, '1234', 'CASH', 60, 60, 0, 'None', 'Demo User'),
(127, '2014-12-05', 2, '1234', 'CASH', 700, 600, 100, 'None', 'Demo User'),
(128, '2014-12-14', 2, '11111111', 'CASH', 17, 17, 0, 'None', 'Demo User'),
(129, '2014-12-15', 2, '1234', 'CASH', 200, 200, 0, 'None', 'Demo User'),
(130, '2014-12-15', 1, '1234', 'CASH', 1, 1, 0, 'None', 'Demo User'),
(131, '2014-12-15', 2, '1234', 'CASH', 12, 12, 0, 'None', 'Demo User'),
(132, '2014-12-15', 2, '1234', 'CASH', 400, 400, 0, 'None', 'Demo User'),
(133, '2014-12-17', 1, '1234', 'CASH', 40, 40, 0, 'None', 'Demo User'),
(134, '2014-12-17', 1, '1234', 'CASH', 200, 200, 0, 'None', 'Demo User'),
(135, '2014-12-17', 1, '1234', 'CASH', 100, 100, 0, 'None', 'Demo User'),
(136, '2014-12-17', 1, '1234', 'CASH', 1, 1, 0, 'None', 'Demo User'),
(137, '2015-01-08', 1, '5678', 'CASH', 500, 500, 0, 'None', 'Demo User'),
(138, '2015-01-08', 1, '1234', 'CASH', 360, 360, 0, 'None', 'Demo User'),
(139, '2015-01-16', 1, '123', 'CASH', 25, 25, 0, 'None', 'Demo User'),
(140, '2015-01-16', 1, '1234', 'CASH', 25, 25, 0, 'None', 'Demo User'),
(141, '2015-01-27', 1, '1234', 'CASH', 45, 45, 0, 'None', 'Demo User'),
(142, '2015-01-27', 1, '1234', 'CASH', 600, 1, 0, 'None', 'Demo User'),
(143, '2015-01-27', 1, '1234', 'CASH', 1000, 1000, 0, 'None', 'Demo User'),
(144, '2015-01-27', 1, '1234', 'CASH', 1, 1, 0, 'None', 'Demo User'),
(145, '2015-01-27', 1, '1234', 'CASH', 1, 1, 0, 'None', 'Demo User'),
(146, '2015-01-27', 1, '1234', 'CASH', 100, 1, 0, 'None', 'Demo User'),
(147, '2015-01-27', 1, '1234', 'CASH', 500, 500, 0, 'None', 'Demo User'),
(148, '2015-02-03', 1, '1234', 'CASH', 220, 220, 0, 'None', 'Demo User');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
  `purchaseid` int(10) NOT NULL,
  `ited_id` int(10) NOT NULL,
  `quantity` int(4) NOT NULL,
  `expiary` date NOT NULL,
  `purchase_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `indiv_tot` float NOT NULL,
  `batchno` varchar(30) NOT NULL,
  `unitval` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`purchaseid`, `ited_id`, `quantity`, `expiary`, `purchase_price`, `sell_price`, `indiv_tot`, `batchno`, `unitval`) VALUES
(101, 5, 150, '2012-12-12', 17, 12, 2550, '', 0),
(101, 2, 150, '2012-12-13', 15, 25, 2250, '', 0),
(101, 5, 150, '2012-12-12', 15, 12, 2250, '', 0),
(101, 5, 150, '2012-12-13', 15, 12, 2250, '', 0),
(102, 5, 150, '2012-12-12', 18, 12, 2700, '', 0),
(102, 3, 150, '2012-12-13', 15, 14, 2250, '', 0),
(102, 5, 150, '2012-12-13', 15, 12, 2250, '', 0),
(102, 6, 150, '2012-12-13', 15, 0, 2250, '', 0),
(103, 5, 150, '2012-12-12', 15, 12, 2250, '', 0),
(103, 6, 150, '2012-12-13', 5, 9, 750, '', 0),
(104, 5, 200, '2015-08-12', 8, 12, 1600, '', 0),
(104, 8, 110, '2012-12-13', 6, 8, 660, '', 0),
(104, 10, 120, '2012-12-12', 7, 10, 840, '', 0),
(104, 7, 130, '2012-12-13', 8, 10, 1040, '', 0),
(104, 9, 120, '2012-12-12', 8, 10, 960, '', 0),
(105, 5, 100, '2012-12-12', 10, 12, 1000, '', 0),
(106, 7, 20, '2017-12-15', 8, 10, 160, '', 0),
(106, 9, 200, '2017-12-15', 7, 10, 1400, '', 0),
(107, 5, 200, '2014-12-11', 8, 12, 1600, '', 0),
(107, 7, 200, '2015-12-11', 3, 10, 600, '', 0),
(108, 7, 100, '2012-12-07', 8, 10, 800, '', 0),
(109, 6, 20, '2012-12-06', 4, 9, 80, '', 0),
(109, 8, 20, '2012-12-06', 4, 8, 80, '', 0),
(109, 10, 20, '2012-12-06', 4, 10, 80, '', 0),
(110, 5, 200, '2015-08-07', 10, 12, 2000, '', 0),
(110, 10, 200, '2015-08-07', 8, 10, 1600, '', 0),
(110, 9, 200, '2015-08-07', 8, 10, 1600, '', 0),
(111, 7, 1, '2013-01-17', 20, 10, 20, '', 0),
(111, 8, 1, '2013-01-23', 10, 8, 10, '', 0),
(112, 11, 1, '2015-01-15', 15, 20, 15, '', 0),
(112, 8, 1, '2015-01-22', 4, 8, 4, '', 0),
(113, 9, 20, '2013-01-17', 8, 10, 160, '', 0),
(113, 10, 10, '2013-01-31', 5, 10, 50, '', 0),
(114, 6, 20, '2014-01-16', 5, 9, 100, '', 0),
(114, 10, 10, '2015-01-15', 8, 10, 80, '', 0),
(115, 8, 100, '2015-01-15', 6, 8, 600, '', 0),
(116, 12, 10, '2014-01-23', 8, 12, 80, '', 0),
(117, 6, 20, '2014-01-17', 6, 9, 120, '', 0),
(118, 6, 1, '2013-01-10', 9, 10, 9, '', 0),
(118, 8, 1, '2013-01-24', 6, 8, 6, '', 0),
(119, 5, 5, '2012-12-12', 10, 12, 50, '', 0),
(119, 10, 9, '2012-12-12', 8, 10, 72, '', 0),
(120, 13, 100, '2015-03-20', 14, 20, 1400, '', 0),
(120, 10, 6, '2015-03-20', 8, 10, 48, '', 0),
(121, 18, 50, '2014-08-12', 10, 12, 500, '', 0),
(122, 5, 15, '2015-10-10', 10, 12, 150, '', 0),
(122, 18, 20, '2015-10-10', 8, 12, 160, '', 0),
(123, 21, 100, '2016-09-20', 20, 30, 2000, '', 0),
(123, 19, 200, '2016-09-20', 10, 20, 2000, '', 0),
(124, 5, 7, '2016-12-30', 6, 12, 42, '', 0),
(125, 22, 200, '2014-12-12', 12, 20, 2400, '', 0),
(126, 5, 12, '2016-12-12', 5, 12, 60, '', 0),
(127, 9, 50, '2015-10-10', 12, 10, 600, '', 0),
(127, 17, 10, '2016-10-10', 10, 20, 100, '', 0),
(131, 5, 12, '2016-12-12', 1, 50, 12, 'ae3050', 0),
(132, 5, 20, '2016-12-12', 20, 50, 400, 'ae3050', 0),
(133, 11, 20, '2016-12-12', 2, 30, 40, 'AE3050', 0),
(134, 11, 20, '2016-12-12', 10, 30, 200, 'AE3050', 0),
(135, 11, 10, '2016-12-12', 10, 30, 100, 'AE3070', 0),
(136, 11, 1, '2016-12-12', 1, 30, 1, 'AE3090', 0),
(137, 25, 50, '2015-05-20', 10, 20, 500, 'CEBT679', 0),
(138, 25, 30, '2016-12-12', 12, 20, 360, 'CEBT679', 0),
(140, 6, 5, '2016-12-12', 5, 10, 25, 'ABCD', 0),
(141, 38, 15, '2016-12-12', 30, 84, 45, 'ABCD', 10),
(142, 38, 20, '2016-12-12', 30, 84, 600, 'AE3050', 0),
(143, 38, 20, '2016-12-12', 50, 84, 1000, 'ABCD', 0),
(144, 38, 1, '2016-12-12', 1, 84, 1, '', 0),
(145, 38, 1, '2016-12-12', 1, 84, 1, 'ABCD', 0),
(146, 38, 2, '2016-12-12', 50, 84, 100, 'ABCD', 10),
(147, 38, 10, '2016-12-12', 50, 100, 500, 'ABCD', 12),
(148, 66, 4, '2016-12-12', 40, 56.5, 160, 'ABCD', 10),
(148, 72, 6, '2016-10-10', 10, 15.65, 60, 'ABCG', 1);

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
  `total` float NOT NULL,
  `discount` int(5) NOT NULL,
  `netpay` float NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_addr` varchar(200) NOT NULL,
  `cust_contact` varchar(20) NOT NULL,
  `dr_name` varchar(50) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  PRIMARY KEY (`billno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_invoice`
--

INSERT INTO `sell_invoice` (`billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name`, `p_type`) VALUES
(108, '2013-01-02', 7800, 0, 7800, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(109, '2013-01-08', 3300, 0, 3300, 'Sumit', 'B 404', '2147483647', 'DR Sumit', ''),
(110, '2013-01-08', 6090, 0, 6090, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(111, '2013-01-08', 12000, 20, 9600, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(112, '2013-01-09', 120, 0, 120, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(113, '2013-01-17', 30, 0, 30, 'ABC', 'Not sure', '989954', 'DR ABC', ''),
(114, '2013-01-17', 380, 10, 342, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(116, '2013-01-17', 80, 0, 80, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(117, '2013-01-18', 100, 0, 100, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(118, '2013-01-18', 4000, 10, 3600, 'Amit kumar', 'B 403', '2147483647', 'DR Ky patil', ''),
(119, '2013-01-18', 260, 10, 234, 'AMit kumar', 'B 403 costa rica', '2147483647', 'DR Patil', ''),
(120, '2013-01-18', 10, 0, 10, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(121, '2013-01-18', 40, 0, 40, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(122, '2013-01-18', 40, 0, 40, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(123, '2013-01-18', 80, 0, 80, 'ABC', 'Not sure', '989952', 'DR ABC', ''),
(126, '2013-01-18', 100, 0, 100, 'ABC', 'Not sure', '2147483647', 'DR ABC', ''),
(127, '2013-01-18', 9, 0, 9, 'ABC', 'Not sure', '9764001455', 'DR ABC', ''),
(128, '2013-01-18', 40, 10, 36, 'AMit kumar', 'b 405 some society', '9999999999', 'DR kishore', ''),
(129, '2013-01-18', 12, 0, 12, 'Some user', 'A 503 somr soviety', '9899675544', 'DR suresh kumar', ''),
(130, '2013-01-18', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(131, '2013-01-18', 8, 0, 8, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(132, '2013-01-18', 19, 0, 19, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(137, '2013-01-18', 866, 20, 693, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(138, '2013-01-21', 60, 10, 54, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(139, '2013-01-22', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(140, '2013-01-26', 160, 10, 144, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(141, '2013-01-29', 138, 0, 138, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(142, '2013-01-31', 302, 0, 302, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(143, '2013-01-31', 30, 0, 30, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(144, '2013-01-31', 30, 0, 30, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(148, '2013-02-01', 228, 20, 182, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(149, '2013-02-01', 104, 10, 94, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(154, '2013-02-01', 64, 0, 64, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(159, '2013-02-02', 162, 5, 154, 'Amit kumar', 'B 405 costa rica', '9899526644', 'Dr Sunita  sharma', ''),
(161, '2013-02-02', 94, 0, 94, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(163, '2013-02-02', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(164, '2013-02-02', 22, 0, 22, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(165, '2013-02-02', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(166, '2013-02-02', 184, 0, 184, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(167, '2013-02-06', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(169, '2013-03-01', 72, 10, 65, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(182, '2013-03-17', 120, 0, 120, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(187, '2013-04-04', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC', ''),
(204, '2013-04-12', 12, 0, 12, 'ABC', 'Not sure', '9999999999', 'DR ABC', 'CREDIT'),
(205, '2013-04-12', 36, 0, 36, 'ABC', 'Not sure', '9999999999', 'DR ABC', 'CREDIT'),
(223, '2013-07-08', 8, 0, 8, 'Unknown', 'Not provided', 'Not provided', 'Dr Sumit , polaris', 'CASH'),
(226, '2013-07-08', 64, 0, 64, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(228, '2013-07-19', 40, 10, 36, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(233, '2013-07-19', 24, 0, 24, 'Unknown', 'Not provided', 'Not provided', 'Dr Sumit , polaris', 'CASH'),
(239, '2013-07-21', 320, 0, 320, 'Unknown', 'Not provided', 'Not provided', 'Dr Sumit , polaris', 'CASH'),
(244, '2013-07-25', 10, 0, 10, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(298, '2013-08-28', 18, 0, 18, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(350, '2013-08-29', 8, 0, 8, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(351, '2013-08-29', 12, 0, 12, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(353, '2013-08-29', 10, 0, 10, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CREDIT'),
(356, '2013-08-29', 8, 0, 8, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CARD'),
(359, '2013-08-29', 16, 0, 16, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CARD'),
(362, '2013-08-29', 8, 0, 8, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(382, '2013-08-29', 344, 5, 327, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CARD'),
(385, '2013-08-30', 8, 0, 8, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(404, '2013-08-31', 800, 0, 800, 'Amit', 'wakad', 'Not provided', 'Dr Sumit , polaris', 'CASH'),
(407, '2013-09-01', 108, 5, 103, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(421, '2014-11-08', 10, 0, 10, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(422, '2014-11-08', 20, 0, 20, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(426, '2014-11-12', 18, 0, 18, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(430, '2014-11-14', 38, 0, 38, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(432, '2014-11-14', 32, 0, 32, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(433, '2014-11-14', 80, 0, 80, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(438, '2014-11-14', 72, 10, 65, 'sumit', 'k strreet', '80808080808808', 'subhas', 'CASH'),
(456, '2014-11-20', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(457, '2014-11-20', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(458, '2014-11-20', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(460, '2014-11-20', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(463, '2014-11-20', 10, 0, 10, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(465, '2014-11-20', 20, 0, 20, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(475, '2014-11-20', 32, 0, 32, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(476, '2014-11-20', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(477, '2014-11-20', 20, 0, 20, 'abc', 'bac', '8888888', 'abc', 'CASH'),
(478, '2014-11-20', 200, 0, 200, 'Amit', 'sipri bajar', '8888888', 'Dr Tripathi', 'CASH'),
(481, '2014-11-20', 400, 10, 360, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(483, '2014-11-20', 40, 0, 40, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(489, '2014-12-05', 0, 0, 0, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(518, '2014-12-17', 30, 0, 30, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(519, '2014-12-17', 30, 0, 30, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(520, '2014-12-17', 30, 0, 30, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(522, '2014-12-17', 30, 0, 30, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(523, '2014-12-17', 30, 0, 30, 'Unknown', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(525, '2014-12-17', 30, 0, 30, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(527, '2014-12-17', 50, 0, 50, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(531, '2014-12-17', 30, 0, 30, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(532, '2014-12-17', 30, 0, 30, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(533, '2014-12-17', 30, 0, 30, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(535, '2014-12-18', 50, 0, 50, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(537, '2015-01-08', 20, 0, 20, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(541, '2015-01-08', 400, 0, 400, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(543, '2015-01-08', 30, 0, 30, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(545, '2015-01-08', 520, 10, 468, 'Amit', 'sipri bajar', '9999999999', 'Dr Tripathi', 'CASH'),
(548, '2015-01-16', 10, 0, 10, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(554, '2015-01-16', 84, 0, 84, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(560, '2015-01-19', 332, 0, 332, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(583, '2015-01-27', 50, 0, 50, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(585, '2015-01-27', 151.2, 0, 151.2, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(590, '2015-01-27', 16.8, 0, 16.8, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(595, '2015-01-27', 8.4, 0, 8.4, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(597, '2015-01-27', 200, 0, 200, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(599, '2015-01-28', 565, 0, 565, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(607, '2015-02-02', 6.5, 0, 6.5, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH'),
(609, '2015-02-03', 42.75, 0, 42.75, 'Not provided', 'Not provided', 'Not provided', 'Not provided', 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `sell_items`
--

CREATE TABLE IF NOT EXISTS `sell_items` (
  `billno` int(5) NOT NULL,
  `itemid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total` float NOT NULL,
  `batchno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_items`
--

INSERT INTO `sell_items` (`billno`, `itemid`, `qty`, `total`, `batchno`) VALUES
(104, 10, 40, 400, ''),
(104, 9, 100, 1000, ''),
(105, 7, 6, 60, ''),
(105, 9, 10, 100, ''),
(106, 8, 10, 80, ''),
(107, 8, 2000, 16000, ''),
(107, 9, 2000, 20000, ''),
(107, 9, 2000, 20000, ''),
(107, 10, 1000, 10000, ''),
(108, 7, 300, 3000, ''),
(108, 6, 200, 1800, ''),
(108, 7, 300, 3000, ''),
(109, 6, 100, 900, ''),
(109, 5, 200, 2400, ''),
(110, 6, 10, 90, ''),
(110, 5, 500, 6000, ''),
(111, 5, 1000, 12000, ''),
(112, 11, 1, 20, ''),
(112, 7, 10, 100, ''),
(113, 7, 1, 10, ''),
(113, 9, 2, 20, ''),
(114, 6, 20, 180, ''),
(114, 10, 20, 200, ''),
(115, 6, 10, 90, ''),
(116, 8, 10, 80, ''),
(117, 7, 10, 100, ''),
(118, 7, 100, 1000, ''),
(118, 10, 200, 2000, ''),
(118, 7, 100, 1000, ''),
(119, 8, 20, 160, ''),
(119, 10, 10, 100, ''),
(120, 9, 1, 10, ''),
(121, 10, 4, 40, ''),
(122, 9, 4, 40, ''),
(123, 8, 10, 80, ''),
(124, 5, 2, 24, ''),
(125, 9, 2, 20, ''),
(126, 10, 10, 100, ''),
(127, 6, 1, 9, ''),
(128, 10, 4, 40, ''),
(129, 5, 1, 12, ''),
(130, 5, 1, 12, ''),
(130, 10, 1, 10, ''),
(131, 8, 1, 8, ''),
(132, 6, 1, 9, ''),
(132, 10, 1, 10, ''),
(137, 5, 38, 456, ''),
(137, 8, 40, 320, ''),
(137, 9, 9, 90, ''),
(138, 12, 5, 60, ''),
(139, 5, 1, 12, ''),
(139, 9, 1, 10, ''),
(140, 5, 5, 60, ''),
(140, 9, 10, 100, ''),
(141, 5, 4, 48, ''),
(141, 6, 9, 90, ''),
(142, 5, 12, 144, ''),
(142, 6, 15, 150, ''),
(142, 8, 1, 8, ''),
(144, 5, 1, 12, ''),
(144, 8, 1, 8, ''),
(144, 10, 1, 10, ''),
(143, 6, 1, 10, ''),
(143, 9, 1, 10, ''),
(143, 10, 1, 10, ''),
(148, 5, 7, 84, ''),
(148, 10, 12, 120, ''),
(148, 12, 2, 24, ''),
(149, 5, 2, 24, ''),
(149, 9, 8, 80, ''),
(150, 5, 3, 36, ''),
(150, 6, 4, 40, ''),
(152, 5, 2, 24, ''),
(152, 8, 5, 40, ''),
(154, 5, 2, 24, ''),
(154, 9, 4, 40, ''),
(159, 5, 6, 72, ''),
(159, 6, 9, 90, ''),
(161, 5, 7, 84, ''),
(161, 6, 1, 10, ''),
(163, 5, 1, 12, ''),
(164, 5, 1, 12, ''),
(164, 10, 1, 10, ''),
(165, 5, 1, 12, ''),
(166, 5, 7, 84, ''),
(166, 6, 10, 100, ''),
(167, 5, 1, 12, ''),
(169, 5, 5, 60, ''),
(169, 12, 1, 12, ''),
(182, 5, 10, 120, ''),
(183, 5, 4, 48, ''),
(183, 8, 10, 80, ''),
(187, 5, 1, 12, ''),
(203, 8, 1, 8, ''),
(203, 13, 1, 20, ''),
(204, 5, 1, 12, ''),
(205, 5, 3, 36, ''),
(223, 8, 1, 8, ''),
(226, 9, 4, 40, ''),
(226, 5, 2, 24, ''),
(228, 8, 5, 40, ''),
(233, 18, 2, 24, ''),
(239, 8, 10, 80, ''),
(239, 5, 20, 240, ''),
(241, 9, 20, 200, ''),
(241, 5, 1, 12, ''),
(244, 9, 1, 10, ''),
(298, 8, 1, 8, ''),
(298, 9, 1, 10, ''),
(350, 8, 1, 8, ''),
(351, 5, 1, 12, ''),
(353, 9, 1, 10, ''),
(356, 8, 1, 8, ''),
(359, 8, 2, 16, ''),
(362, 8, 1, 8, ''),
(382, 8, 10, 80, ''),
(382, 9, 4, 40, ''),
(382, 13, 3, 60, ''),
(382, 5, 10, 120, ''),
(382, 8, 3, 24, ''),
(382, 9, 2, 20, ''),
(385, 8, 1, 8, ''),
(404, 21, 20, 600, ''),
(404, 19, 10, 200, ''),
(407, 9, 10, 100, ''),
(407, 8, 1, 8, ''),
(421, 9, 1, 10, ''),
(422, 13, 1, 20, ''),
(426, 8, 1, 8, ''),
(426, 9, 1, 10, ''),
(430, 9, 1, 10, ''),
(430, 8, 1, 8, ''),
(430, 19, 1, 20, ''),
(432, 19, 1, 20, ''),
(432, 18, 1, 12, ''),
(433, 19, 2, 40, ''),
(433, 9, 4, 40, ''),
(438, 8, 9, 72, ''),
(442, 9, 5, 50, ''),
(442, 19, 4, 80, ''),
(456, 17, 1, 0, ''),
(457, 15, 1, 0, ''),
(458, 16, 1, 0, ''),
(460, 21, 0, 0, ''),
(463, 9, 1, 10, ''),
(463, 20, 1, 0, ''),
(465, 19, 1, 20, ''),
(475, 8, 4, 32, ''),
(476, 17, 1, 0, ''),
(477, 22, 1, 20, ''),
(477, 22, 1, 20, ''),
(477, 22, 1, 20, ''),
(478, 13, 5, 100, ''),
(478, 19, 5, 100, ''),
(481, 9, 10, 100, ''),
(481, 21, 10, 300, ''),
(483, 22, 1, 20, ''),
(483, 22, 1, 20, ''),
(489, 24, 1, 0, ''),
(520, 11, 1, 30, 'AE3050 | AE3070|AE3090 '),
(522, 11, 1, 30, 'AE3050 | AE3070|AE3090 '),
(523, 11, 1, 30, 'AE3050 '),
(525, 11, 1, 30, 'AE3050'),
(527, 11, 1, 30, 'AE3050   '),
(527, 17, 1, 20, ' '),
(531, 11, 1, 30, 'AE3050   '),
(532, 11, 1, 30, 'AE3050   '),
(533, 11, 1, 30, 'AE3050   '),
(535, 11, 1, 30, 'AE3050   '),
(535, 22, 1, 20, ' '),
(537, 22, 1, 20, ' '),
(541, 25, 20, 400, '|CEBT679|CEBT679 '),
(543, 25, 1, 20, 'CEBT679 '),
(543, 9, 1, 10, ' '),
(545, 25, 10, 200, 'CEBT679  '),
(545, 22, 10, 200, ' '),
(545, 9, 12, 120, ' '),
(548, 6, 1, 10, ' '),
(554, 27, 1, 84, 'ZhP2685 '),
(560, 36, 5, 332, 'WC080 '),
(583, 38, 1, 8, 'ZhP2685'),
(583, 38, 5, 42, 'ZhP2685'),
(585, 38, 4, 33.6, 'ZhP2685'),
(585, 38, 14, 117.6, 'ZhP2685'),
(590, 38, 2, 16.8, 'ZhP2685|ABCD|AE3050|ABCD||ABCD'),
(595, 38, 1, 8.4, 'ABCD '),
(597, 38, 24, 200, '|ABCD |ABCD'),
(599, 58, 10, 0, 'NOT PROVIDED'),
(599, 57, 10, 565, 'RG4E55F'),
(607, 120, 1, 6.5, 'BA8509'),
(609, 97, 1, 36.75, 'AN34005'),
(609, 158, 2, 6, 'MT-13357');

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
