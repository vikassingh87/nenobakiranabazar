-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2020 at 02:31 PM
-- Server version: 5.5.28-log
-- PHP Version: 5.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nenobakirana`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ac_no` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `adhar_no` varchar(255) NOT NULL,
  `nominee_name` varchar(255) NOT NULL,
  `nominee_relation` varchar(255) NOT NULL,
  `nominee_age` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved,2=rejected',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `direct_referal`
--

CREATE TABLE IF NOT EXISTS `direct_referal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(225) NOT NULL,
  `refer_id` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `e_wallet`
--

CREATE TABLE IF NOT EXISTS `e_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `day_bal` int(11) DEFAULT '0',
  `current_bal` int(11) DEFAULT '0',
  `total_bal` int(11) DEFAULT '0',
  `balance` int(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income_received`
--

CREATE TABLE IF NOT EXISTS `income_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payout`
--

CREATE TABLE IF NOT EXISTS `payout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `level_payout_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `referral_payout_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `direct_referral_payout_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `performance_payout_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payout`
--

INSERT INTO `payout` (`id`, `user_id`, `level_payout_amount`, `referral_payout_amount`, `direct_referral_payout_amount`, `performance_payout_amount`, `created_date`) VALUES
(1, 'NKB808298', '360.00', '300.00', '0.00', '100.00', '2020-01-26 08:25:26'),
(2, 'NKB280018', '160.00', '200.00', '500.00', '0.00', '2020-01-26 09:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `pin_list`
--

CREATE TABLE IF NOT EXISTS `pin_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pin_list`
--

INSERT INTO `pin_list` (`id`, `uname`, `pin`, `status`) VALUES
(1, 'NKB808298', 578426, 'open'),
(2, 'NKB808298', 708043, 'open'),
(3, 'NKB808298', 176349, 'open'),
(4, 'NKB808298', 464287, 'open'),
(5, 'NKB808298', 887289, 'open'),
(6, 'NKB808298', 292570, 'open'),
(7, 'NKB808298', 313327, 'open'),
(8, 'NKB808298', 515545, 'open'),
(9, 'NKB808298', 533939, 'open'),
(10, 'NKB808298', 228075, 'open'),
(11, 'NKB808298', 887651, 'close'),
(12, 'NKB808298', 978218, 'close'),
(13, 'NKB808298', 840404, 'close'),
(14, 'NKB808298', 592150, 'close'),
(15, 'NKB808298', 743857, 'close');

-- --------------------------------------------------------

--
-- Table structure for table `pin_request`
--

CREATE TABLE IF NOT EXISTS `pin_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `slip` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pin_request`
--

INSERT INTO `pin_request` (`id`, `uname`, `amount`, `slip`, `date`, `status`) VALUES
(1, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(2, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(3, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(4, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(5, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(6, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(7, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(8, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(9, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(10, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(11, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(12, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(13, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(14, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close'),
(15, 'NKB808298', '2100', 'IMG_20191217_154912.jpg', '2020-01-26', 'close');

-- --------------------------------------------------------

--
-- Table structure for table `pin_transfer`
--

CREATE TABLE IF NOT EXISTS `pin_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=694 ;

-- --------------------------------------------------------

--
-- Table structure for table `roi_income`
--

CREATE TABLE IF NOT EXISTS `roi_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `income` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roi_list`
--

CREATE TABLE IF NOT EXISTS `roi_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paid_amt` varchar(255) NOT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `admin` varchar(255) NOT NULL,
  `tds` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) DEFAULT NULL,
  `sponsorid` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tree`
--

CREATE TABLE IF NOT EXISTS `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) DEFAULT NULL,
  `left` varchar(50) DEFAULT NULL,
  `right` varchar(50) DEFAULT NULL,
  `leftcount` int(11) DEFAULT '0',
  `rightcount` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `payment_mode` varchar(255) NOT NULL DEFAULT '0',
  `is_eligible_for_direct_referral_income_payout` int(11) NOT NULL DEFAULT '0',
  `my_team_count` int(11) NOT NULL DEFAULT '0',
  `my_direct_team_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `user_name`, `sponsor_id`, `sponsor_name`, `mobile`, `pancard`, `email`, `password`, `date_joining`, `status`, `package`, `active_date`, `diff_date`, `type`, `payment_mode`, `is_eligible_for_direct_referral_income_payout`, `my_team_count`, `my_direct_team_count`) VALUES
(1, 'admin', '', '', '', '', NULL, NULL, '123', '2019-12-11 18:57:14', 1, NULL, NULL, NULL, 'admin', '0', 0, 0, 0),
(2, 'NKB808298', 'NKB', 'admin', 'NKB', '0987654321', 'ASWSFTF54YBD', 'nkb@gmail.com', '123', '2019-12-11 18:58:37', 1, '2100', '2020-01-09 08:45:43', '2020-01-09 08:45:43', NULL, '0', 0, 33, 3),
(34, 'NKB423273', 'chauhan', 'NKB808298', 'NKB', '09876543210', 'fgg34w3bbbbb', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 10, 10),
(35, 'NKB485450', 'chauhan', 'NKB808298', 'NKB', '09876543210', 'fgg34w3bbbbba', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 10, 10),
(36, 'NKB925727', 'chauhan', 'NKB808298', 'NKB', '09876543210', 'dd', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 10, 10),
(37, 'NKB972408', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'fghjklm', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(38, 'NKB274227', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'sde', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(39, 'NKB645244', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'ddddsss', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(40, 'NKB963740', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'fghjklmd', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(41, 'NKB331951', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'scd', 'sandeep@gmail.com', '123', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(42, 'NKB443149', 'Charli', 'NKB485450', 'chauhan', '09876543210', 'fghjklmsss', 'sandeep@gmail.com', '93598', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(43, 'NKB833886', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'sdvsd', 'sandeep@gmail.com', '78131', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(44, 'NKB121864', 'chauhan', 'NKB485450', 'WEHI', '09876543210', 'sdvsds', 'sandeep@gmail.com', '30231', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(45, 'NKB191714', 'Charli', 'NKB485450', 'chauhan', '09876543210', 'sxsd', 'sandeep@gmail.com', '58561', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(46, 'NKB471308', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'sdad', 'sandeep@gmail.com', '15920', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(47, 'NKB534052', 'sandeep chauhan', 'NKB925727', 'chauhan', '8286548055', 'fgg34w3asas', 'sandeep11012@gmail.com', '29482', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(48, 'NKB862789', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'fgg34w3sdsd', 'sandeep@gmail.com', '87479', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(49, 'NKB923931', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'fgg34w3dfsdf', 'sandeep@gmail.com', '96078', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(50, 'NKB748180', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'fgg34w3zfsd', 'sandeep@gmail.com', '76701', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(51, 'NKB323296', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'fgg34w3sfas', 'sandeep@gmail.com', '56901', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(52, 'NKB937424', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'asdada', 'sandeep@gmail.com', '93067', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(53, 'NKB853957', 'chauhan', 'NKB423273', 'WEHI', '09876543210', 'asdadas', 'sandeep@gmail.com', '37713', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(54, 'NKB108069', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'sdfsdfs', 'sandeep@gmail.com', '68471', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(55, 'NKB730694', 'chauhan', 'NKB423273', 'chauhan', '09876543210', 'sasw', 'sandeep@gmail.com', '24711', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(56, 'NKB920000', 'chauhan', 'NKB423273', 'WEHI', '09876543210', 'saswsdf', 'sandeep@gmail.com', '27957', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(57, 'NKB473901', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'qwew', 'sandeep@gmail.com', '29170', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(58, 'NKB773430', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'erter', 'sandeep@gmail.com', '45955', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(59, 'NKB454154', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'yuy', 'sandeep@gmail.com', '26439', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(60, 'NKB605969', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'fgg34w3sdfdf', 'sandeep@gmail.com', '56669', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(61, 'NKB841386', 'chauhan', 'NKB485450', 'chauhan', '09876543210', 'kgf', 'sandeep@gmail.com', '64871', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(62, 'NKB809868', 'chauhan', 'NKB925727', 'WEHI', '09876543210', 'fgg34w3klasdk', 'sandeep@gmail.com', '27698', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(63, 'NKB915270', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'sdejf', 'sandeep@gmail.com', '54857', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(64, 'NKB140780', 'chauhan', 'NKB925727', 'WEHI', '09876543210', 'sdejfss', 'sandeep@gmail.com', '29225', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(65, 'NKB516889', 'chauhan', 'NKB925727', 'WEHI', '09876543210', 'sdejfssdd', 'sandeep@gmail.com', '95361', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(66, 'NKB265846', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'sdfdsksd', 'sandeep@gmail.com', '42230', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0),
(67, 'NKB697272', 'chauhan', 'NKB925727', 'chauhan', '09876543210', 'sdfdsksddd', 'sandeep@gmail.com', '65140', '2020-01-28 18:30:00', 0, NULL, NULL, NULL, NULL, '0', 0, 0, 0);

--
-- Triggers `user`
--
DROP TRIGGER IF EXISTS `add_in_user_rank`;
DELIMITER //
CREATE TRIGGER `add_in_user_rank` AFTER INSERT ON `user`
 FOR EACH ROW INSERT INTO user_rank(user_id) VALUES (NEW.id)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_fund_eligibility`
--

CREATE TABLE IF NOT EXISTS `user_fund_eligibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `bike_fund` int(11) NOT NULL DEFAULT '0',
  `car_fund` int(11) NOT NULL DEFAULT '0',
  `laxury_car_fund` int(11) NOT NULL DEFAULT '0',
  `house_fund` int(11) NOT NULL DEFAULT '0',
  `banglow_fund` int(11) NOT NULL DEFAULT '0',
  `club_fund` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_fund_eligibility_ibfk_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_fund_eligibility`
--

INSERT INTO `user_fund_eligibility` (`id`, `user_id`, `bike_fund`, `car_fund`, `laxury_car_fund`, `house_fund`, `banglow_fund`, `club_fund`) VALUES
(1, 2, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rank`
--

CREATE TABLE IF NOT EXISTS `user_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sale_executive` int(11) NOT NULL DEFAULT '1',
  `senior_sales_executive` int(11) NOT NULL DEFAULT '0',
  `star_executive` int(11) NOT NULL DEFAULT '0',
  `senior_star_executive` int(11) NOT NULL DEFAULT '0',
  `pearl_executive` int(11) NOT NULL DEFAULT '0',
  `silver_executive` int(11) NOT NULL DEFAULT '0',
  `gold_executive` int(11) NOT NULL DEFAULT '0',
  `platinum_executive` int(11) NOT NULL DEFAULT '0',
  `diamond_executive` int(11) NOT NULL DEFAULT '0',
  `kohinoor_executive` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_UserId` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `user_rank`
--

INSERT INTO `user_rank` (`id`, `user_id`, `sale_executive`, `senior_sales_executive`, `star_executive`, `senior_star_executive`, `pearl_executive`, `silver_executive`, `gold_executive`, `platinum_executive`, `diamond_executive`, `kohinoor_executive`) VALUES
(9, 2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(41, 34, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(42, 35, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(43, 36, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0),
(44, 37, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 38, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 39, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 40, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 41, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 42, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 43, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 44, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 45, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 46, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 47, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 48, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 49, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 50, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 51, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 52, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 53, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 54, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 55, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 56, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 57, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 58, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 59, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 60, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 61, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 62, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 63, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 64, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 65, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 66, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 67, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
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
  `status` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_list`
--

CREATE TABLE IF NOT EXISTS `withdrawal_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `paid_amt` varchar(255) NOT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `admin` varchar(255) NOT NULL,
  `tds` float NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_request`
--

CREATE TABLE IF NOT EXISTS `withdrawal_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `working_income`
--

CREATE TABLE IF NOT EXISTS `working_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `working_new_income`
--

CREATE TABLE IF NOT EXISTS `working_new_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `sponsor_id` varchar(255) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL,
  `activation_date` date DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_fund_eligibility`
--
ALTER TABLE `user_fund_eligibility`
  ADD CONSTRAINT `user_fund_eligibility_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_fund_eligibility_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_rank`
--
ALTER TABLE `user_rank`
  ADD CONSTRAINT `FK_UserId` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
