-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 06:14 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bundelkhanddental`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledger_rep_a`
--

CREATE TABLE IF NOT EXISTS `ledger_rep_a` (
  `cust_id` int(5) NOT NULL,
  `l_type` varchar(20) NOT NULL,
  `o_date` date NOT NULL,
  `refid` int(5) NOT NULL,
  `debit` float NOT NULL,
  `credit` float NOT NULL,
  `detail` varchar(50) NOT NULL,
  `scr_name` varchar(100) NOT NULL,
  `del_scr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
