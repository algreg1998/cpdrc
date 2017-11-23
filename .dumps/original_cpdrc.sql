-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 03:21 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpdrc`
--
CREATE DATABASE IF NOT EXISTS `cpdrc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cpdrc`;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `inmate_id` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT '192x192.jpg',
  `added_by` int(11) unsigned zerofill NOT NULL,
  `img_set` enum('0','1') NOT NULL DEFAULT '0',
  UNIQUE KEY `inmate_id_2` (`inmate_id`),
  KEY `inmate_id` (`inmate_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`inmate_id`, `filename`, `added_by`, `img_set`) VALUES
('001', '192x192.jpg', 00000000001, '1');

-- --------------------------------------------------------

--
-- Table structure for table `inmate`
--

CREATE TABLE IF NOT EXISTS `inmate` (
  `inmate_id` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `inmate_fname` varchar(255) NOT NULL,
  `inmate_lname` varchar(255) NOT NULL,
  `inmate_mi` varchar(255) NOT NULL,
  `inmate_alias` varchar(255) NOT NULL,
  `status` enum('Pending','Detainee','Convict','Probation') DEFAULT 'Pending',
  `date_detained` datetime NOT NULL,
  `date_convict` datetime NOT NULL,
  `date_probation` datetime NOT NULL,
  `datetime_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`inmate_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmate`
--

INSERT INTO `inmate` (`inmate_id`, `cell_no`, `inmate_fname`, `inmate_lname`, `inmate_mi`, `inmate_alias`, `status`, `datetime_added`, `added_by`) VALUES
('001', '001', 'Paul Angelo', 'Villarante', 'Villasan', 'Pauldoy', 'Active', '2001-12-31 16:56:14', 00000000001);

-- --------------------------------------------------------

--
-- Table structure for table `inmate_2d`
--

CREATE TABLE IF NOT EXISTS `inmate_2d` (
  `inmate_id` varchar(255) NOT NULL,
  `x_coor` int(11) NOT NULL,
  `y_coor` int(11) NOT NULL,
  `mark_name` varchar(255) NOT NULL,
  `mark_desc` text NOT NULL,
  KEY `inmate_id` (`inmate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_auth_visitor`
--

CREATE TABLE IF NOT EXISTS `inmate_auth_visitor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `inmate_id` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `added_by` int(10) unsigned zerofill NOT NULL,
  `visit_filename` varchar(255) NOT NULL DEFAULT '192x192.jpg',
  `img_set` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `inmate_id` (`inmate_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `inmate_auth_visitor`
--

INSERT INTO `inmate_auth_visitor` (`id`, `inmate_id`, `datetime`, `fullname`, `relation`, `address`, `contact_number`, `added_by`, `visit_filename`, `img_set`) VALUES
(24, '001', '2001-12-31 17:12:43', 'Jay Piquero', 'Friend', 'Cabancalan Mandaue City', '09326148146', 0000000001, '192x192.jpg', '1'),
(25, '001', '2001-12-31 17:14:35', 'Jay Anthony Bibal', 'Friend', 'Bakilid Mandaue City', '0922245421', 0000000001, '192x192.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `inmate_build`
--

CREATE TABLE IF NOT EXISTS `inmate_build` (
  `inmate_id` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `complexion` varchar(255) NOT NULL,
  `build` text NOT NULL,
  `hair` varchar(255) NOT NULL,
  `hair_peculiarities` text NOT NULL,
  UNIQUE KEY `inmate_id_2` (`inmate_id`),
  KEY `inmate_id` (`inmate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmate_build`
--

INSERT INTO `inmate_build` (`inmate_id`, `height`, `weight`, `complexion`, `build`, `hair`, `hair_peculiarities`) VALUES
('001', 152, 60, 'Slim Bulk', 'Slim Tall', 'Black', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `inmate_case_info`
--

CREATE TABLE IF NOT EXISTS `inmate_case_info` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `inmate_id` varchar(255) NOT NULL,
  `case_no` varchar(255) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `date_confinment` date NOT NULL,
  `crime` text NOT NULL,
  `sentence` text NOT NULL,
  `commencing` varchar(255) NOT NULL,
  `expire_good` date NOT NULL,
  `expire_bad` date NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`),
  KEY `inmate_id` (`inmate_id`),
  KEY `inmate_id_2` (`inmate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inmate_case_info`
--

INSERT INTO `inmate_case_info` (`cid`, `inmate_id`, `case_no`, `court_name`, `date_confinment`, `crime`, `sentence`, `commencing`, `expire_good`, `expire_bad`, `time_added`) VALUES
(6, '001', '152C', 'Regional Trial Court Mandaue Branch', '2002-01-02', 'Hacking', '3 years imprisonment', 'none', '2002-01-26', '2005-01-14', '2001-12-31 16:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `inmate_conduct_rec`
--

CREATE TABLE IF NOT EXISTS `inmate_conduct_rec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inmate_id` varchar(255) NOT NULL,
  `date_occur` date NOT NULL,
  `punishment` text NOT NULL,
  `cause` text NOT NULL,
  `warden_id` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inmate_id` (`inmate_id`),
  KEY `warden_id` (`warden_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `inmate_conduct_rec`
--

INSERT INTO `inmate_conduct_rec` (`id`, `inmate_id`, `date_occur`, `punishment`, `cause`, `warden_id`) VALUES
(19, '001', '2015-01-14', 'Bartulina', 'Gang war', 00000000001);

-- --------------------------------------------------------

--
-- Table structure for table `inmate_fp`
--

CREATE TABLE IF NOT EXISTS `inmate_fp` (
  `inmate_id` varchar(255) NOT NULL,
  `file_no` int(11) NOT NULL,
  `taken_by` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `classified_by` varchar(255) NOT NULL,
  `verified_by` varchar(255) NOT NULL,
  `r_thumb` varchar(255) NOT NULL,
  `r_index` varchar(255) NOT NULL,
  `r_middle` varchar(255) NOT NULL,
  `r_ring` varchar(255) NOT NULL,
  `r_little` varchar(255) NOT NULL,
  `l_thumb` varchar(255) NOT NULL,
  `l_index` varchar(255) NOT NULL,
  `l_middle` varchar(255) NOT NULL,
  `l_ring` varchar(255) NOT NULL,
  `l_little` varchar(255) NOT NULL,
  `l_amp` varchar(255) NOT NULL,
  `r_amp` varchar(255) NOT NULL,
  `left_thumb` varchar(255) NOT NULL,
  `right_thumb` varchar(255) NOT NULL,
  `left_hand` varchar(255) NOT NULL,
  `right_hand` varchar(255) NOT NULL,
  KEY `inmate_id` (`inmate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_info`
--

CREATE TABLE IF NOT EXISTS `inmate_info` (
  `inmate_id` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `status` enum('Single','Married','Widow','Widower') NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `born_in` varchar(255) NOT NULL,
  `home_add` varchar(255) NOT NULL,
  `province_add` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `relative` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  UNIQUE KEY `inmate_id_2` (`inmate_id`),
  KEY `inmate_id` (`inmate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmate_info`
--

INSERT INTO `inmate_info` (`inmate_id`, `nationality`, `status`, `birthdate`, `age`, `gender`, `born_in`, `home_add`, `province_add`, `occupation`, `father`, `mother`, `relative`, `relation`, `address`) VALUES
('001', 'Filipino', 'Single', '1995-03-31', 20, 'Male', 'Cebu City', 'Alang-alang Mandaue City', 'Cebu City', 'IT Programmer', 'Asis M. Villarante', 'Adela V. Villarante', 'John Doe', 'Niece', 'Alang-alang Mandaue City');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `actor` int(11) unsigned zerofill NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actor` (`actor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `actor`, `time`, `agent`) VALUES
(1, 'Log in', 00000000001, '2001-12-31 16:02:16', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(2, 'Log in', 00000000001, '2001-12-31 16:09:20', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(3, 'Log out', 00000000001, '2001-12-31 16:13:34', ''),
(6, 'Log in', 00000000001, '2001-12-31 16:14:25', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(7, 'Log out', 00000000001, '2001-12-31 16:21:49', ''),
(10, 'Log in', 00000000001, '2001-12-31 16:22:27', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(11, 'Log out', 00000000001, '2001-12-31 16:23:33', ''),
(14, 'Log in', 00000000001, '2001-12-31 16:25:26', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(15, 'Log out', 00000000001, '2001-12-31 17:58:25', ''),
(16, 'Log in', 00000000001, '2001-12-31 17:58:33', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(17, 'Log out', 00000000001, '2001-12-31 18:06:23', ''),
(20, 'Log in', 00000000001, '2001-12-31 18:24:05', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(21, 'Log out', 00000000001, '2001-12-31 19:29:29', ''),
(24, 'Log in', 00000000001, '2001-12-31 19:33:07', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(25, 'Log out', 00000000001, '2001-12-31 19:37:53', ''),
(26, 'Log in', 00000000001, '2001-12-31 19:37:58', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(27, 'Log out', 00000000001, '2001-12-31 19:38:01', ''),
(30, 'Log in', 00000000001, '2001-12-31 19:38:11', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(31, 'Log in', 00000000001, '2001-12-31 16:02:37', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(32, 'Log in', 00000000001, '2001-12-31 16:04:28', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(33, 'Log in', 00000000001, '2001-12-31 18:09:52', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(34, 'Log in', 00000000001, '2001-12-31 18:34:09', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(35, 'Log in', 00000000001, '2001-12-31 16:43:09', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(36, 'Log in', 00000000001, '2001-12-31 16:04:06', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(37, 'Log in', 00000000001, '2001-12-31 18:26:57', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(38, 'Log out', 00000000001, '2001-12-31 18:27:02', ''),
(41, 'Log in', 00000000001, '2001-12-31 18:29:48', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(42, 'Log out', 00000000001, '2001-12-31 18:31:31', ''),
(43, 'Log in', 00000000001, '2001-12-31 16:03:00', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(44, 'Log out', 00000000001, '2001-12-31 16:40:06', ''),
(47, 'Log in', 00000000001, '2001-12-31 16:40:44', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(48, 'Log out', 00000000001, '2001-12-31 16:54:13', ''),
(49, 'Log in', 00000000001, '2001-12-31 16:54:18', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(50, 'Log out', 00000000001, '2001-12-31 16:55:22', ''),
(51, 'Log in', 00000000001, '2001-12-31 16:55:26', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(52, 'Log out', 00000000001, '2001-12-31 17:04:01', ''),
(55, 'Log in', 00000000001, '2001-12-31 17:08:01', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(56, 'Log out', 00000000001, '2001-12-31 17:10:42', ''),
(59, 'Log in', 00000000001, '2001-12-31 17:10:55', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(60, 'Log out', 00000000001, '2001-12-31 17:14:31', ''),
(67, 'Log in', 00000000001, '2001-12-31 17:23:27', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(68, 'Log out', 00000000001, '2001-12-31 17:28:10', ''),
(71, 'Log in', 00000000001, '2001-12-31 17:28:25', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(72, 'Log out', 00000000001, '2001-12-31 19:07:06', ''),
(75, 'Log in', 00000000001, '2001-12-31 19:07:31', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(76, 'Log out', 00000000001, '2001-12-31 19:12:01', ''),
(77, 'Log in', 00000000001, '2001-12-31 19:12:09', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(78, 'Log out', 00000000001, '2001-12-31 19:29:06', ''),
(79, 'Log in', 00000000001, '2001-12-31 19:29:20', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(80, 'Log out', 00000000001, '2001-12-31 19:29:25', ''),
(83, 'Log in', 00000000001, '2001-12-31 19:29:59', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(84, 'Log in', 00000000001, '2001-12-31 16:04:27', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(85, 'Log out', 00000000001, '2001-12-31 16:27:22', ''),
(86, 'Log in', 00000000001, '2001-12-31 16:27:29', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(87, 'Log out', 00000000001, '2001-12-31 16:28:52', ''),
(90, 'Log in', 00000000001, '2001-12-31 16:29:14', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(91, 'Log out', 00000000001, '2001-12-31 16:30:58', ''),
(94, 'Log in', 00000000001, '2001-12-31 16:31:17', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(95, 'Log out', 00000000001, '2001-12-31 17:16:14', ''),
(100, 'Log in', 00000000001, '2001-12-31 17:22:41', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(101, 'Log out', 00000000001, '2001-12-31 17:51:17', ''),
(102, 'Log in', 00000000001, '2001-12-31 16:02:52', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(103, 'Log out', 00000000001, '2001-12-31 16:05:54', ''),
(108, 'Log in', 00000000001, '2001-12-31 16:32:50', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(109, 'Log out', 00000000001, '2001-12-31 17:39:31', ''),
(110, 'Log in', 00000000001, '2001-12-31 17:39:42', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(111, 'Log out', 00000000001, '2001-12-31 17:40:55', ''),
(112, 'Log in', 00000000001, '2001-12-31 17:41:04', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(113, 'Log in', 00000000001, '2001-12-31 16:02:43', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(114, 'Log out', 00000000001, '2001-12-31 16:07:56', ''),
(117, 'Log in', 00000000001, '2001-12-31 16:26:16', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(118, 'Log out', 00000000001, '2001-12-31 16:26:28', ''),
(121, 'Log in', 00000000001, '2001-12-31 16:46:07', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(122, 'Log out', 00000000001, '2001-12-31 16:51:40', ''),
(125, 'Log in', 00000000001, '2001-12-31 17:09:04', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(126, 'Log out', 00000000001, '2001-12-31 17:23:46', ''),
(127, 'Log in', 00000000001, '2001-12-31 16:02:11', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(128, 'Log out', 00000000001, '2001-12-31 18:12:08', ''),
(129, 'Log in', 00000000001, '2001-12-31 18:12:19', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(130, 'Log in', 00000000001, '2001-12-31 16:03:07', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(131, 'Log in', 00000000001, '2001-12-31 16:04:03', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(132, 'Log out', 00000000001, '2001-12-31 17:08:08', ''),
(135, 'Log in', 00000000001, '2001-12-31 17:11:11', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(136, 'Log out', 00000000001, '2001-12-31 17:11:55', ''),
(139, 'Log in', 00000000001, '2001-12-31 17:12:29', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(140, 'Log out', 00000000001, '2001-12-31 17:14:26', ''),
(143, 'Log in', 00000000001, '2001-12-31 17:14:54', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(144, 'Log out', 00000000001, '2001-12-31 17:35:55', ''),
(147, 'Log in', 00000000001, '2001-12-31 17:36:25', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(148, 'Log out', 00000000001, '2001-12-31 18:27:03', ''),
(149, 'Log in', 00000000001, '2001-12-31 16:03:00', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(150, 'Log out', 00000000001, '2001-12-31 17:44:42', ''),
(151, 'Log in', 00000000001, '2001-12-31 16:03:23', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(152, 'Log out', 00000000001, '2001-12-31 16:49:55', ''),
(155, 'Log in', 00000000001, '2001-12-31 16:51:45', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(156, 'Log out', 00000000001, '2001-12-31 16:53:16', ''),
(157, 'Log in', 00000000001, '2001-12-31 16:04:17', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(161, 'Log out', 00000000001, '2001-12-31 18:19:25', ''),
(162, 'Log in', 00000000001, '2001-12-31 18:30:30', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(163, 'Log out', 00000000001, '2001-12-31 18:31:27', ''),
(164, 'Log in', 00000000001, '2001-12-31 16:02:49', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(165, 'Log out', 00000000001, '2001-12-31 16:36:08', ''),
(166, 'Log in', 00000000001, '2001-12-31 16:36:14', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(167, 'Log out', 00000000001, '2001-12-31 16:36:31', ''),
(168, 'Log in', 00000000001, '2001-12-31 16:36:34', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(169, 'Log out', 00000000001, '2001-12-31 16:36:49', ''),
(170, 'Log in', 00000000001, '2001-12-31 16:37:02', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(171, 'Log out', 00000000001, '2001-12-31 17:02:56', ''),
(172, 'Log in', 00000000016, '2001-12-31 17:03:02', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(173, 'Log out', 00000000016, '2001-12-31 17:03:13', ''),
(174, 'Log in', 00000000016, '2001-12-31 17:03:19', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(175, 'Log out', 00000000016, '2001-12-31 17:04:37', ''),
(176, 'Log in', 00000000001, '2001-12-31 17:04:42', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(177, 'Log out', 00000000001, '2001-12-31 17:10:14', ''),
(178, 'Log in', 00000000016, '2001-12-31 17:10:20', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(179, 'Log out', 00000000016, '2001-12-31 18:01:56', ''),
(180, 'Log in', 00000000016, '2001-12-31 18:02:16', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(181, 'Log out', 00000000016, '2001-12-31 18:02:19', ''),
(182, 'Log in', 00000000001, '2001-12-31 18:02:24', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(183, 'Log in', 00000000001, '2001-12-31 16:03:20', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(184, 'Log out', 00000000001, '2001-12-31 16:57:34', ''),
(185, 'Log in', 00000000001, '2001-12-31 17:11:49', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(186, 'Log in', 00000000001, '2001-12-31 16:02:47', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(187, 'Log out', 00000000001, '2001-12-31 16:05:53', ''),
(188, 'Log in', 00000000001, '2001-12-31 16:05:57', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(189, 'Log out', 00000000001, '2001-12-31 18:37:23', ''),
(190, 'Log in', 00000000001, '2001-12-31 18:37:26', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(191, 'Log out', 00000000001, '2001-12-31 19:22:42', ''),
(192, 'Log in', 00000000001, '2001-12-31 16:04:01', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(193, 'Log out', 00000000001, '2001-12-31 17:56:16', ''),
(194, 'Log in', 00000000016, '2001-12-31 17:56:35', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(195, 'Log out', 00000000016, '2001-12-31 17:57:30', ''),
(196, 'Log in', 00000000001, '2001-12-31 17:58:08', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(197, 'Log out', 00000000001, '2001-12-31 17:58:13', ''),
(198, 'Log in', 00000000016, '2001-12-31 17:58:23', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(199, 'Log out', 00000000016, '2001-12-31 17:58:58', ''),
(200, 'Log in', 00000000001, '2001-12-31 17:59:02', 'Chrome  v.21.0.1180.89 on Unknown Windows OS'),
(201, 'Log in', 00000000001, '2015-01-13 01:39:28', 'Chrome  v.39.0.2171.95 on Unknown Windows OS'),
(202, 'Log out', 00000000001, '2015-01-13 01:47:41', ''),
(203, 'Log in', 00000000001, '2015-01-13 01:47:50', 'Chrome  v.39.0.2171.95 on Unknown Windows OS');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_mi` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `type` enum('0','1') NOT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active',
  `user_filename` varchar(255) NOT NULL DEFAULT '192x192.jpg',
  `img_set` enum('0','1') NOT NULL DEFAULT '0',
  `added_by` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `password`, `user_fname`, `user_lname`, `user_mi`, `user_address`, `user_contact`, `type`, `status`, `user_filename`, `img_set`, `added_by`) VALUES
(00000000001, 'admin', 'admin', 'CPDRC', 'Administrator', '', 'Alang-alang Mandaue City', '09434528795', '1', 'Active', '192x192.jpg', '1', 00000000000),
(00000000016, 'vicbern', 'vicbern', 'Vic Bernard', 'Garcia', 'B', 'Ramos Cebu City', '09164544577', '0', 'Active', '192x192.jpg', '1', 00000000001),
(00000000018, 'noor', 'noorayman', 'Noor Ayman', 'Noor', 'A', 'Talamban Cebu', '254-5544', '0', 'Active', '192x192.jpg', '1', 00000000001);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_ff` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`added_by`) REFERENCES `user_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate`
--
ALTER TABLE `inmate`
  ADD CONSTRAINT `fk_ad` FOREIGN KEY (`added_by`) REFERENCES `user_account` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inmate_2d`
--
ALTER TABLE `inmate_2d`
  ADD CONSTRAINT `fk_td` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate_auth_visitor`
--
ALTER TABLE `inmate_auth_visitor`
  ADD CONSTRAINT `fk_aa` FOREIGN KEY (`added_by`) REFERENCES `user_account` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vs` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate_build`
--
ALTER TABLE `inmate_build`
  ADD CONSTRAINT `fk_bb` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate_case_info`
--
ALTER TABLE `inmate_case_info`
  ADD CONSTRAINT `fk_ca` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate_conduct_rec`
--
ALTER TABLE `inmate_conduct_rec`
  ADD CONSTRAINT `fk_cn` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uu` FOREIGN KEY (`warden_id`) REFERENCES `user_account` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `inmate_fp`
--
ALTER TABLE `inmate_fp`
  ADD CONSTRAINT `fk_fp` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inmate_info`
--
ALTER TABLE `inmate_info`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_lg` FOREIGN KEY (`actor`) REFERENCES `user_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
