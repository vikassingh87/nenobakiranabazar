-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2020 at 12:07 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nenobakirana`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ac_no` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `uname`, `name`, `ac_no`, `ifsc`, `branch`, `pan_no`, `mobile`, `bank`) VALUES
(1, 'GSS808298', 'Asmita Bhosale', '45345676543', 'SBI34523', 'Vazira,Boriwali', '3425456743', '9869687928', 'State Bank Of India');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `direct_referal`
--

CREATE TABLE `direct_referal` (
  `id` int(11) NOT NULL,
  `user_id` varchar(225) NOT NULL,
  `refer_id` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_wallet`
--

CREATE TABLE `e_wallet` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_wallet`
--

INSERT INTO `e_wallet` (`id`, `user_id`, `amount`, `balance`, `created_date`) VALUES
(1, 'GSS808298', '40', NULL, '2019-11-30 12:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `day_bal` int(11) DEFAULT '0',
  `current_bal` int(11) DEFAULT '0',
  `total_bal` int(11) DEFAULT '0',
  `balance` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_received`
--

CREATE TABLE `income_received` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pin_list`
--

CREATE TABLE `pin_list` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_list`
--

INSERT INTO `pin_list` (`id`, `uname`, `pin`, `status`) VALUES
(1, 'GSS808298', 378809, 'close'),
(2, 'GSS808298', 620595, 'close'),
(3, 'GSS808298', 363392, 'close'),
(4, 'GSS808298', 729850, 'close'),
(5, 'GSS808298', 197688, 'open'),
(6, 'GSS808298', 404974, 'open'),
(7, 'NKB808298', 203333, 'close'),
(8, 'NKB808298', 360997, 'close'),
(9, 'NKB808298', 294867, 'open'),
(10, 'NKB808298', 103727, 'close'),
(11, 'NKB808298', 109258, 'close'),
(12, '', 780799, 'open'),
(13, 'NKB808298', 735192, 'close'),
(14, 'NKB136836', 490860, 'close'),
(15, 'NKB136836', 108102, 'close'),
(16, 'NKB550225', 169497, 'close'),
(17, 'NKB606574', 197981, 'close');

-- --------------------------------------------------------

--
-- Table structure for table `pin_request`
--

CREATE TABLE `pin_request` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `slip` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_request`
--

INSERT INTO `pin_request` (`id`, `uname`, `amount`, `slip`, `date`, `status`) VALUES
(1, 'GSS808298', 'Cr', 'Desert.jpg', '2019-11-26', 'close'),
(2, 'GSS808298', '5000', 'Desert.jpg', '2019-11-26', 'close'),
(3, 'GSS808298', '5000', 'Desert.jpg', '2019-11-27', 'close'),
(4, 'GSS808298', '5000', 'Lighthouse.jpg', '2019-11-27', 'close'),
(5, 'GSS808298', '5000', 'Penguins.jpg', '2019-11-28', 'close'),
(6, 'GSS808298', 'Cr', 'Screenshot (1).png', '2019-11-30', 'close'),
(7, 'NKB808298', 'Cr', 'HC_281116530859.jpg', '2019-12-12', 'close'),
(8, 'NKB808298', 'Cr', '1576157753882..jpg', '2019-12-12', 'close'),
(9, 'NKB808298', '2100', 'Chrysanthemum.jpg', '2019-12-12', 'close'),
(10, 'NKB808298', '2100', 'Chrysanthemum.jpg', '2019-12-12', 'close'),
(11, '', '2100', 'HC_261016210956.jpg', '2019-12-12', 'close'),
(12, 'NKB808298', '2100', 'VID-20191212-WA0043.mp4', '2019-12-12', 'close'),
(13, 'NKB808298', '2100', 'VID-20191212-WA0043.mp4', '2019-12-12', 'close'),
(14, 'NKB808298', '2100', 'IMG-20191212-WA0045.jpg', '2019-12-12', 'close'),
(15, 'NKB136836', '2100', 'IMG-20191212-WA0042.jpg', '2019-12-12', 'close'),
(16, 'NKB136836', '2100', 'IMG-20191212-WA0038.jpg', '2019-12-12', 'close'),
(17, 'NKB550225', '2100', 'IMG-20191213-WA0006.jpg', '2019-12-13', 'close'),
(18, 'NKB606574', '2100', 'IMG_20191217_154912.jpg', '2019-12-24', 'close');

-- --------------------------------------------------------

--
-- Table structure for table `pin_transfer`
--

CREATE TABLE `pin_transfer` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roi_income`
--

CREATE TABLE `roi_income` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `income` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roi_list`
--

CREATE TABLE `roi_list` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paid_amt` varchar(255) NOT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `admin` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `sponsorid` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE `tree` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `left` varchar(50) DEFAULT NULL,
  `right` varchar(50) DEFAULT NULL,
  `leftcount` int(11) DEFAULT '0',
  `rightcount` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `sponsor_id` varchar(12) NOT NULL,
  `sponsor_name` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `pancard` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_joining` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(255) NOT NULL,
  `package` varchar(255) DEFAULT NULL,
  `active_date` datetime DEFAULT NULL,
  `diff_date` datetime DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `sponsor_id`, `sponsor_name`, `mobile`, `pancard`, `email`, `password`, `date_joining`, `status`, `package`, `active_date`, `diff_date`, `type`, `payment_mode`) VALUES
(1, 'admin', '', '', '', '', NULL, NULL, 'admin123', '2019-12-11 18:57:14', 0, NULL, NULL, NULL, 'admin', '0'),
(2, 'NKB808298', 'NKB', 'NKB808298', 'NKB', '0987654321', 'ASWSFTF54YBD', 'nkb@gmail.com', '123', '2019-12-11 18:58:37', 1, '2100', '2019-12-12 00:00:00', NULL, NULL, '0'),
(3, 'NKB936705', ' AJAY1', 'NKB808298', '', '9834637366', '1294', 'ajaykanojiya066@gmail.com', '27406', '2019-12-12 07:00:00', 1, '2100', '2019-12-12 07:35:27', '2019-12-12 07:35:27', NULL, '0'),
(4, 'NKB450257', 'Ajay2', 'NKB808298', '', '1234567890', '123', 'ajaykanojiya066@gmail.com', '60479', '2019-12-12 07:00:00', 1, '2100', '2019-12-12 07:52:04', '2019-12-12 07:52:04', NULL, '0'),
(5, 'NKB712771', 'Ajay3', 'NKB808298', '', '123456456', '1423', 'ajaykanojiya066@gmail.com', '11181', '2019-12-12 07:00:00', 1, '2100', '2019-12-14 06:57:08', '2019-12-14 06:57:08', NULL, '0'),
(6, 'NKB691549', 'Ajay4', 'NKB808298', '', '98989898', '9898', 'ajaykanojiya066@gmail.com', '61906', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(7, 'NKB167265', 'Ajay5', 'NKB808298', '', '89898989', '1234', 'ajaykanojiya066@gmail.com', '10030', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(8, 'NKB856263', 'Aj1', 'NKB936705', '', '9898989', '898', 'ajaykanojiya066@gmail.com', '74741', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(9, 'NKB492939', 'Aj2', 'NKB936705', '', '1235689', '652', 'ajaykanojiya066@gmail.com', '77010', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(10, 'NKB770830', 'Aj3', 'NKB936705', '', '89898989', '808', 'ajaykanojiya066@gmail.com', '14580', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(11, 'NKB256127', 'Aj4', 'NKB936705', '', '989895699', '649', 'ajaykanojiya066@gmail.com', '44170', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(12, 'NKB868297', 'Aj5', 'NKB936705', '', '95958963', '340', 'ajaykanojiya066@gmail.com', '54730', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(13, 'NKB576246', 'A1', 'NKB450257', '', '8989898989', '582', 'ajaykanojiya066@gmail.com', '46665', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(14, 'NKB885173', 'A2', 'NKB450257', '', '989898989', '635', 'ajaykanojiya066@gmail.com', '35294', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(15, 'NKB453167', 'A3', 'NKB450257', '', '9898569', '741', 'ajaykanojiya066@gmail.com', '83417', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(16, 'NKB989883', 'A4', 'NKB450257', '', '98565575', '893', 'ajaykanojiya066@gmail.com', '16808', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(17, 'NKB425180', 'A5', 'NKB450257', '', '986534998', '000', 'ajaykanojiya066@gmail.com', '79291', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(18, 'NKB516040', 'B1', 'NKB712771', '', '989653375', '509', 'ajaykanojiya066@gmail.com', '38099', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(19, 'NKB447581', 'B2', 'NKB712771', '', '9696969', '601', 'ajaykanojiya066@gmail.com', '88002', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(20, 'NKB338842', 'B2', 'NKB712771', '', '6969885696', '1', 'ajaykanojiya066@gmail.com', '77196', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(21, 'NKB233396', 'B3', 'NKB712771', '', '68956866', '2', 'ajaykanojiya066@gmail.com', '37020', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(22, 'NKB300946', 'B4', 'NKB712771', '', '89895600', '4', 'ajaykanojiya066@gmail.com', '90166', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(23, 'NKB893267', 'B5', 'NKB712771', '', '85080963', '5', 'ajaykanojiya066@gmail.com', '51308', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(24, 'NKB271494', 'C1', 'NKB691549', '', '989563478', '6', 'ajaykanojiya066@gmail.com', '58802', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(25, 'NKB459344', 'C2', 'NKB691549', '', '89658899', '7', 'ajaykanojiya066@gmail.com', '76247', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(26, 'NKB586520', 'C3', 'NKB691549', '', '9857558', '8', 'ajaykanojiya066@gmail.com', '61218', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(27, 'NKB627323', 'C4', 'NKB691549', '', '58896522', '9', 'ajaykanojiya066@gmail.com', '29755', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(28, 'NKB699528', 'C5', 'NKB691549', '', '985668744', '90', 'ajaykanojiya066@gmail.com', '23760', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(29, 'NKB150470', 'D1', 'NKB167265', '', '58988555', '11', 'ajaykanojiya066@gmail.com', '53696', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(30, 'NKB808632', 'D2', 'NKB167265', '', '98985566', '12', 'ajaykanojiya066@gmail.com', '59276', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(31, 'NKB550225', 'D3', 'NKB167265', '', '98566558', '13', 'ajaykanojiya066@gmail.com', '39133', '2019-12-12 07:00:00', 1, '2100', '2019-12-13 09:32:08', '2019-12-13 09:32:08', NULL, '0'),
(32, 'NKB594020', 'D4', 'NKB167265', '', '9898950', '14', 'ajaykanojiya066@gmail.com', '82712', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(33, 'NKB997048', 'D5', 'NKB167265', '', '658998555', '15', 'ajaykanojiya066@gmail.com', '81271', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(34, 'NKB411000', 'sandeep', 'NKB808298', '', '08291946479', 'fgg34w3', 'digicraftsolution@yahoo.com', '87839', '2019-12-12 07:00:00', 1, '2100', '2019-12-14 06:58:03', '2019-12-14 06:58:03', NULL, '0'),
(35, 'NKB921353', 'sandeep chauhan', 'NKB808298', 'NKB', '09876543210', 'fghjklm', 'sandeep@gmail.com', '12046', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(36, 'NKB127250', 'Ashutosh', 'NKB808298', 'NKB', '9322383838', '4667899', 'vrajpurohit2014@gmail.com', '14489', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(37, 'NKB788454', 'ADMIN', 'NKB808298', 'NKB', '9322383838', 'Hhsjjz', 'msbalwansha123@gmail.com', '67677', '2019-12-12 07:00:00', 1, '2100', '2019-12-14 06:59:32', '2019-12-14 06:59:32', NULL, '0'),
(38, 'NKB402951', 'Ashutosh', 'NKB808298', 'NKB', '9322383838', 'Gjdghbjjfdhj', 'msbalwansha123@gmail.com', '40212', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(39, 'NKB136836', 'Arvind', 'NKB808298', 'NKB', '8087411275', 'Abhjl', 'natharam80874@gmail.com', '96448', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(40, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '8087496157', 'Astdgg', 'natharam80874@gmail.com', '66539', '2019-12-12 07:00:00', 1, '2100', '2019-12-12 10:38:02', '2019-12-12 10:38:02', NULL, '0'),
(41, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '8087496157', 'Zpcvb', 'natharam80874@gmail.com', '79571', '2019-12-12 07:00:00', 1, '2100', '2019-12-12 10:45:26', '2019-12-12 10:45:26', NULL, '0'),
(42, 'NKB893616', 'ADMIN3', 'NKB808298', 'NKB', '9322383838', 'Vjfhjurvji', 'msbalwansha123@gmail.com', '34965', '2019-12-12 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(43, 'NKB627754', 'xncjjd', 'NKB808298', 'NKB', '945652122222', 'ddff5555', 'hhfhfhh@gmail.com', '91242', '2019-12-14 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(44, 'NKB809539', 'Charli', 'NKB627754', 'xncjjd', '09876543210', 'asgrfhg', 'digicraftsolution@yahoo.com', '82199', '2019-12-24 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(45, 'NKB915246', 'sandeep chauhan', 'NKB627754', 'xncjjd', '8286548055', 'yfghj', 'sandeep11012@gmail.com', '96591', '2019-12-24 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(46, 'NKB606574', 'Abhay', 'NKB808298', 'NKB', '9834637366', '00000', 'ajaykanojiya066@gmail.com', '65970', '2019-12-24 07:00:00', 1, '2100', '2019-12-24 10:22:59', '2019-12-24 10:22:59', NULL, '0'),
(47, 'NKB960640', 'Pasi', 'NKB808298', 'NKB3', '9322383838', 'Chffhjjgg', 'vrajpurohit2014@gmail.com', '67137', '2019-12-26 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(48, 'NKB746913', 'Sumitra Sen', 'NKB808298', 'NKB3', '9322383838', 'Fjrhjgknddg', 'vrajpurohit2014@gmail.com', '35653', '2019-12-26 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(49, 'NKB740154', 'Sumitra Sen', 'NKB808298', 'NKB', '9322383838', 'Avkpurmlsj', 'vrajpurohit2014@gmail.com', '25361', '2019-12-26 07:00:00', 0, NULL, NULL, NULL, NULL, '0'),
(50, 'NKB793806', 'Jasraj sen', 'NKB740154', 'Sumitra Sen', '9322383838', 'Llojmlgysvn', 'vrajpurohit2014@gmail.com', '48675', '2019-12-26 07:00:00', 0, NULL, NULL, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(255) NOT NULL,
  `sponsar_id` varchar(255) NOT NULL,
  `sponsar_name` varchar(255) NOT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `side` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_list`
--

CREATE TABLE `withdrawal_list` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paid_amt` varchar(255) NOT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `admin` varchar(255) NOT NULL,
  `tds` float NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal_list`
--

INSERT INTO `withdrawal_list` (`id`, `uname`, `amount`, `paid_amt`, `paymode`, `admin`, `tds`, `date`, `status`) VALUES
(1, 'GSS808298', '40', '', NULL, '', 0, '2019-11-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_request`
--

CREATE TABLE `withdrawal_request` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paid` varchar(255) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `tds` float DEFAULT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `working_income`
--

CREATE TABLE `working_income` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_income`
--

INSERT INTO `working_income` (`id`, `user_id`, `income`, `created_date`) VALUES
(1, 'GSS808298', '', '2019-11-26 08:40:33'),
(2, 'GSS98918', '', '2019-11-26 09:18:08'),
(3, 'GSS84106', '', '2019-11-26 09:35:06'),
(4, 'GSS36462', '', '2019-11-26 11:18:18'),
(5, '', '', '2019-11-27 05:41:09'),
(6, 'ADMIN', '', '2019-11-28 05:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `working_new_income`
--

CREATE TABLE `working_new_income` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `sponsor_id` varchar(255) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `activation_date` date DEFAULT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_new_income`
--

INSERT INTO `working_new_income` (`id`, `user_id`, `user_name`, `sponsor_id`, `sponsor_name`, `income`, `activation_date`, `level`) VALUES
(1, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-11-30', '1'),
(2, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-11-30', '2'),
(3, 'GSS11694', 'kk2', 'GSS808298', 'asmita', '0', '2019-11-30', '2'),
(4, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-11-30', '1'),
(5, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-11-30', '1'),
(6, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-11-30', '1'),
(7, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-11-30', '1'),
(8, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-11-30', '2'),
(9, 'GSS69060', 'kk3', 'GSS84106', 'asmita1', '0', '2019-11-30', '2'),
(10, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-11-30', '1'),
(11, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-11-30', '2'),
(12, 'GSS31540', 'kk4', 'GSS98918', 'asmita2', '0', '2019-11-30', '2'),
(13, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-11-30', '1'),
(14, 'GSS32377', 'asmita4', 'GSS36462', 'asmita3', '0', '2019-11-30', '2'),
(15, 'GSS52059', 'kk4', 'GSS36462', 'asmita3', '0', '2019-11-30', '2'),
(16, 'GSS76166', 'kk5', 'GSS36462', 'asmita3', '0', '2019-11-30', '2'),
(17, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-11-30', '3'),
(18, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-11-30', '3'),
(19, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-04', '1'),
(20, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-04', '2'),
(21, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-04', '3'),
(22, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-04', '1'),
(23, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-04', '1'),
(24, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-04', '1'),
(25, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-04', '1'),
(26, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-04', '2'),
(27, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-04', '3'),
(28, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-04', '1'),
(29, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-04', '2'),
(30, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-04', '1'),
(31, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-05', '1'),
(32, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-05', '2'),
(33, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-05', '3'),
(34, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-05', '1'),
(35, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-05', '1'),
(36, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-05', '1'),
(37, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-05', '1'),
(38, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-05', '2'),
(39, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-05', '3'),
(40, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-05', '1'),
(41, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-05', '2'),
(42, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-05', '1'),
(43, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-08', '1'),
(44, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-08', '2'),
(45, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-08', '3'),
(46, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-08', '1'),
(47, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-08', '1'),
(48, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-08', '1'),
(49, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-08', '1'),
(50, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-08', '2'),
(51, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-08', '3'),
(52, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-08', '1'),
(53, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-08', '2'),
(54, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-08', '1'),
(55, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-09', '1'),
(56, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-09', '2'),
(57, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-09', '3'),
(58, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-09', '1'),
(59, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-09', '1'),
(60, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-09', '1'),
(61, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-09', '1'),
(62, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-09', '2'),
(63, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-09', '3'),
(64, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-09', '1'),
(65, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-09', '2'),
(66, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-09', '1'),
(67, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-10', '1'),
(68, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-10', '2'),
(69, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-10', '3'),
(70, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-10', '1'),
(71, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-10', '1'),
(72, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-10', '1'),
(73, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-10', '1'),
(74, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-10', '2'),
(75, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-10', '3'),
(76, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-10', '1'),
(77, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-10', '2'),
(78, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-10', '1'),
(79, 'GSS84106', 'asmita', 'GSS808298', 'Globe super ', '17.5', '2019-12-11', '1'),
(80, 'GSS98918', 'asmita1', 'GSS808298', 'asmita', '10', '2019-12-11', '2'),
(81, 'GSS36462', 'asmita2', 'GSS808298', 'asmita1', '10', '2019-12-11', '3'),
(82, 'GSS92332', 'kk1', 'GSS808298', 'Globe super ', '17.5', '2019-12-11', '1'),
(83, 'GSS28104', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-11', '1'),
(84, 'GSS35578', 'sandeep', 'GSS808298', 'Globe super ', '17.5', '2019-12-11', '1'),
(85, 'GSS98918', 'asmita1', 'GSS84106', 'asmita', '17.5', '2019-12-11', '1'),
(86, 'GSS36462', 'asmita2', 'GSS84106', 'asmita1', '10', '2019-12-11', '2'),
(87, 'GSS27257', 'asmita3', 'GSS84106', 'asmita2', '10', '2019-12-11', '3'),
(88, 'GSS36462', 'asmita2', 'GSS98918', 'asmita1', '17.5', '2019-12-11', '1'),
(89, 'GSS27257', 'asmita3', 'GSS98918', 'asmita2', '10', '2019-12-11', '2'),
(90, 'GSS27257', 'asmita3', 'GSS36462', 'asmita2', '17.5', '2019-12-11', '1'),
(91, 'NKB936705', ' AJAY1', 'NKB808298', '', '0', '2019-12-12', '1'),
(92, 'NKB450257', 'Ajay2', 'NKB808298', '', '0', '2019-12-12', '1'),
(93, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-12', '1'),
(94, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-12', '1'),
(95, 'NKB936705', ' AJAY1', 'NKB808298', '', '7.35', '2019-12-13', '1'),
(96, 'NKB450257', 'Ajay2', 'NKB808298', '', '7.35', '2019-12-13', '1'),
(97, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-13', '1'),
(98, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-13', '1'),
(99, 'NKB550225', 'D3', 'NKB167265', '', '7.35', '2019-12-13', '1'),
(100, 'NKB936705', ' AJAY1', 'NKB808298', '', '7.35', '2019-12-14', '1'),
(101, 'NKB450257', 'Ajay2', 'NKB808298', '', '7.35', '2019-12-14', '1'),
(102, 'NKB550225', 'D3', 'NKB167265', '', '7.35', '2019-12-14', '1'),
(103, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-14', '1'),
(104, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-14', '1'),
(105, 'NKB712771', 'Ajay3', 'NKB808298', '', '7.35', '2019-12-14', '1'),
(106, 'NKB411000', 'sandeep', 'NKB808298', '', '7.35', '2019-12-14', '1'),
(107, 'NKB788454', 'ADMIN', 'NKB808298', 'NKB', '7.35', '2019-12-14', '1'),
(108, 'NKB936705', ' AJAY1', 'NKB808298', '', '7.35', '2019-12-23', '1'),
(109, 'NKB450257', 'Ajay2', 'NKB808298', '', '7.35', '2019-12-23', '1'),
(110, 'NKB712771', 'Ajay3', 'NKB808298', '', '7.35', '2019-12-23', '1'),
(111, 'NKB411000', 'sandeep', 'NKB808298', '', '7.35', '2019-12-23', '1'),
(112, 'NKB788454', 'ADMIN', 'NKB808298', 'NKB', '7.35', '2019-12-23', '1'),
(113, 'NKB550225', 'D3', 'NKB167265', '', '7.35', '2019-12-23', '1'),
(114, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-23', '1'),
(115, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-23', '1'),
(116, 'NKB936705', ' AJAY1', 'NKB808298', '', '7.35', '2019-12-24', '1'),
(117, 'NKB450257', 'Ajay2', 'NKB808298', '', '7.35', '2019-12-24', '1'),
(118, 'NKB712771', 'Ajay3', 'NKB808298', '', '7.35', '2019-12-24', '1'),
(119, 'NKB411000', 'sandeep', 'NKB808298', '', '7.35', '2019-12-24', '1'),
(120, 'NKB788454', 'ADMIN', 'NKB808298', 'NKB', '7.35', '2019-12-24', '1'),
(121, 'NKB550225', 'D3', 'NKB167265', '', '7.35', '2019-12-24', '1'),
(122, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-24', '1'),
(123, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-24', '1'),
(124, 'NKB606574', 'Abhay', 'NKB808298', 'NKB', '7.35', '2019-12-24', '1'),
(125, 'NKB936705', ' AJAY1', 'NKB808298', '', '7.35', '2019-12-25', '1'),
(126, 'NKB450257', 'Ajay2', 'NKB808298', '', '7.35', '2019-12-25', '1'),
(127, 'NKB712771', 'Ajay3', 'NKB808298', '', '7.35', '2019-12-25', '1'),
(128, 'NKB411000', 'sandeep', 'NKB808298', '', '7.35', '2019-12-25', '1'),
(129, 'NKB788454', 'ADMIN', 'NKB808298', 'NKB', '7.35', '2019-12-25', '1'),
(130, 'NKB606574', 'Abhay', 'NKB808298', 'NKB', '7.35', '2019-12-25', '1'),
(131, 'NKB550225', 'D3', 'NKB167265', '', '7.35', '2019-12-25', '1'),
(132, 'NKB603753', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-25', '1'),
(133, 'NKB867048', 'Natharam', 'NKB136836', 'Arvind', '7.35', '2019-12-25', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_referal`
--
ALTER TABLE `direct_referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_wallet`
--
ALTER TABLE `e_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_received`
--
ALTER TABLE `income_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_list`
--
ALTER TABLE `pin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_request`
--
ALTER TABLE `pin_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin_transfer`
--
ALTER TABLE `pin_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roi_income`
--
ALTER TABLE `roi_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roi_list`
--
ALTER TABLE `roi_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_list`
--
ALTER TABLE `withdrawal_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_request`
--
ALTER TABLE `withdrawal_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_income`
--
ALTER TABLE `working_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_new_income`
--
ALTER TABLE `working_new_income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `direct_referal`
--
ALTER TABLE `direct_referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_wallet`
--
ALTER TABLE `e_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_received`
--
ALTER TABLE `income_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pin_list`
--
ALTER TABLE `pin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pin_request`
--
ALTER TABLE `pin_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pin_transfer`
--
ALTER TABLE `pin_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=694;

--
-- AUTO_INCREMENT for table `roi_income`
--
ALTER TABLE `roi_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roi_list`
--
ALTER TABLE `roi_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawal_list`
--
ALTER TABLE `withdrawal_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawal_request`
--
ALTER TABLE `withdrawal_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_income`
--
ALTER TABLE `working_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `working_new_income`
--
ALTER TABLE `working_new_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
