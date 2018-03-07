-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 09:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpdrc-ic`
--

-- --------------------------------------------------------

--
-- Table structure for table `cell`
--

CREATE TABLE `cell` (
  `cellId` int(11) NOT NULL,
  `cellNumber` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `status` enum('active','deleted','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`cellId`, `cellNumber`, `capacity`, `status`) VALUES
(1, 1, 20, 'active'),
(2, 2, 20, 'active'),
(3, 3, 20, 'active'),
(4, 4, 20, 'active'),
(5, 5, 20, 'active'),
(6, 6, 20, 'active'),
(7, 7, 20, 'active'),
(8, 8, 20, 'active'),
(9, 9, 20, 'active'),
(10, 10, 20, 'active'),
(11, 11, 20, 'active'),
(12, 12, 20, 'active'),
(13, 13, 20, 'active'),
(14, 14, 20, 'active'),
(15, 15, 20, 'active'),
(16, 16, 20, 'active'),
(17, 17, 20, 'active'),
(18, 18, 20, 'active'),
(19, 19, 20, 'active'),
(20, 20, 20, 'active'),
(21, 21, 20, 'active'),
(22, 22, 20, 'active'),
(23, 23, 20, 'active'),
(24, 24, 20, 'active'),
(25, 25, 20, 'active'),
(26, 26, 20, 'active'),
(27, 27, 20, 'active'),
(28, 28, 20, 'active'),
(29, 29, 20, 'active'),
(30, 30, 20, 'active'),
(31, 31, 20, 'active'),
(32, 32, 20, 'active'),
(33, 33, 20, 'active'),
(34, 34, 20, 'active'),
(35, 35, 20, 'active'),
(36, 36, 20, 'active'),
(37, 37, 20, 'active'),
(38, 38, 20, 'active'),
(39, 39, 20, 'active'),
(40, 40, 20, 'active'),
(41, 41, 20, 'active'),
(42, 42, 20, 'active'),
(43, 43, 20, 'active'),
(44, 44, 20, 'active'),
(45, 45, 20, 'active'),
(46, 46, 20, 'active'),
(47, 47, 20, 'active'),
(48, 48, 20, 'active'),
(49, 49, 20, 'active'),
(50, 50, 20, 'active'),
(51, 51, 20, 'active'),
(52, 52, 20, 'active'),
(53, 53, 20, 'active'),
(54, 54, 20, 'active'),
(55, 55, 20, 'active'),
(56, 56, 20, 'active'),
(57, 57, 20, 'active'),
(58, 58, 20, 'active'),
(59, 59, 20, 'active'),
(60, 60, 20, 'active'),
(61, 61, 20, 'active'),
(62, 62, 20, 'active'),
(63, 63, 20, 'active'),
(64, 64, 20, 'active'),
(65, 65, 20, 'active'),
(66, 66, 20, 'active'),
(67, 67, 20, 'active'),
(68, 68, 20, 'active'),
(69, 69, 20, 'active'),
(70, 70, 20, 'active'),
(71, 71, 20, 'active'),
(72, 72, 20, 'active'),
(73, 73, 20, 'active'),
(74, 74, 20, 'active'),
(75, 75, 20, 'active'),
(76, 76, 20, 'active'),
(77, 77, 20, 'active'),
(78, 78, 20, 'active'),
(79, 79, 20, 'active'),
(80, 80, 20, 'active'),
(81, 81, 20, 'active'),
(82, 82, 20, 'active'),
(83, 83, 20, 'active'),
(84, 84, 20, 'active'),
(85, 85, 20, 'active'),
(86, 86, 20, 'active'),
(87, 87, 20, 'active'),
(88, 88, 20, 'active'),
(89, 89, 20, 'active'),
(90, 90, 20, 'active'),
(91, 91, 20, 'active'),
(92, 92, 20, 'active'),
(93, 93, 20, 'active'),
(94, 94, 20, 'active'),
(95, 95, 21, 'active'),
(96, 96, 20, 'active'),
(97, 97, 20, 'active'),
(98, 98, 20, 'active'),
(99, 99, 20, 'active'),
(100, 100, 20, 'active'),
(101, 101, 20, 'active'),
(102, 102, 20, 'active'),
(103, 103, 20, 'active'),
(104, 104, 20, 'active'),
(105, 105, 20, 'active'),
(106, 106, 20, 'active'),
(107, 107, 20, 'active'),
(108, 108, 20, 'active'),
(109, 109, 20, 'active'),
(110, 110, 20, 'active'),
(111, 111, 20, 'active'),
(112, 112, 20, 'active'),
(113, 113, 20, 'active'),
(114, 114, 20, 'active'),
(115, 115, 20, 'active'),
(116, 116, 20, 'active'),
(117, 117, 20, 'active'),
(118, 118, 20, 'active'),
(119, 119, 20, 'active'),
(120, 120, 20, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(12) NOT NULL,
  `court_name` varchar(50) NOT NULL,
  `court_mun` int(12) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `court_name`, `court_mun`, `status`) VALUES
(1, 'RTC Branch 1', 1, 'active'),
(2, 'RTC Branch 2546', 1, 'active'),
(3, 'h', 3, 'deleted'),
(4, 'ih', 4, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `cs_administrators`
--

CREATE TABLE `cs_administrators` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `type` enum('general','standard') NOT NULL DEFAULT 'standard',
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(30) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `last_activity` int(11) UNSIGNED DEFAULT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_appearance_schedules`
--

CREATE TABLE `cs_appearance_schedules` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `reason_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `date` datetime NOT NULL,
  `place` varchar(50) NOT NULL,
  `assistedCourt` varchar(255) NOT NULL,
  `assistingCourt` varchar(255) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `status` enum('Finished','Postpone','Pending') DEFAULT 'Pending',
  `is_read` int(2) NOT NULL DEFAULT '0',
  `time_departed` datetime NOT NULL,
  `time_returned` datetime NOT NULL,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_appearance_schedule_personnels`
--

CREATE TABLE `cs_appearance_schedule_personnels` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `appearance_schedule_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `type` enum('judge','jail_officer','lawyer') DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_cases`
--

CREATE TABLE `cs_cases` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `reasons_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `case_no` varchar(15) NOT NULL,
  `violation_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL,
  `s_min_year` varchar(255) DEFAULT NULL,
  `s_max_year` varchar(255) DEFAULT NULL,
  `s_min_month` varchar(255) DEFAULT NULL,
  `s_max_month` varchar(255) DEFAULT NULL,
  `s_min_day` varchar(255) DEFAULT NULL,
  `s_max_day` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `reasons` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cs_cases_full`
--
CREATE TABLE `cs_cases_full` (
`case_id` int(11) unsigned zerofill
,`reasons_id` int(11) unsigned zerofill
,`case_no` varchar(15)
,`case_created_on` int(11) unsigned
,`case_modified_on` int(11) unsigned
,`case_status` varchar(255)
,`case_reasons` text
,`violation_id` int(11) unsigned zerofill
,`id` int(11) unsigned zerofill
,`violations_category_id` int(11) unsigned zerofill
,`name` varchar(255)
,`level` enum('1','2','3','4','5','lifetime','none')
,`description` mediumtext
,`RepublicAct` varchar(255)
,`min_year` varchar(255)
,`max_year` varchar(255)
,`min_month` varchar(255)
,`max_month` varchar(255)
,`min_day` varchar(255)
,`max_day` varchar(255)
,`status` varchar(200)
,`created_on` int(11) unsigned
,`modified_on` int(11) unsigned
,`violation_category_id` int(11) unsigned zerofill
,`violation_category_name` varchar(255)
,`violation_category_description` text
);

-- --------------------------------------------------------

--
-- Table structure for table `cs_logs`
--

CREATE TABLE `cs_logs` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `linked_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `table_field` varchar(255) DEFAULT NULL,
  `subject` text,
  `reasons` text,
  `update_by` int(11) UNSIGNED ZEROFILL NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_reasons`
--

CREATE TABLE `cs_reasons` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `inmate_id` varchar(20) NOT NULL,
  `status` enum('Active','Done') DEFAULT 'Active',
  `type` enum('Detainee','Convict','Probation','Pending') DEFAULT 'Pending',
  `start_date` datetime DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `number_of_years` float DEFAULT NULL,
  `number_of_months` float DEFAULT NULL,
  `number_of_days` float DEFAULT NULL,
  `court_order_number` varchar(255) NOT NULL,
  `is_read` int(2) NOT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_sessions`
--

CREATE TABLE `cs_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_sessions`
--

INSERT INTO `cs_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f0bbcdb3f3f3c4f04924518acf29bcb2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', 1520411678, 'a:5:{s:9:"user_data";s:0:"";s:12:"is_logged_in";b:1;s:9:"user_type";s:20:"Warden Administrator";s:7:"user_id";s:11:"00000000001";s:9:"logged_in";a:6:{s:8:"username";s:5:"admin";s:8:"password";s:128:"08f9ef3c42adfe2fbb0e979604c7eb30aa12705fac8b1a9ead899e67b46fd7348c0041721d2be1d64902b66535380e6ff68ee4ed1e9baebf7a7d3dc4285e5391";s:5:"fname";s:5:"CPDRC";s:5:"lname";s:13:"Administrator";s:4:"type";s:20:"Warden Administrator";s:7:"user_id";s:11:"00000000001";}}');

-- --------------------------------------------------------

--
-- Table structure for table `cs_users`
--

CREATE TABLE `cs_users` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `position` enum('judge','lawyer') NOT NULL DEFAULT 'judge',
  `photo` varchar(50) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `last_activity` int(11) UNSIGNED DEFAULT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL,
  `deleted_on` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs_violations`
--

CREATE TABLE `cs_violations` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `violations_category_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` enum('1','2','3','4','5','lifetime','none') DEFAULT NULL,
  `description` mediumtext,
  `RepublicAct` varchar(255) DEFAULT NULL,
  `min_year` varchar(255) DEFAULT NULL,
  `max_year` varchar(255) DEFAULT NULL,
  `min_month` varchar(255) DEFAULT NULL,
  `max_month` varchar(255) DEFAULT NULL,
  `min_day` varchar(255) DEFAULT NULL,
  `max_day` varchar(255) DEFAULT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_violations`
--

INSERT INTO `cs_violations` (`id`, `violations_category_id`, `name`, `level`, `description`, `RepublicAct`, `min_year`, `max_year`, `min_month`, `max_month`, `min_day`, `max_day`, `status`, `created_on`, `modified_on`) VALUES
(00000000003, 00000000000, 'ABDUCTION W/ RAPE', '1', '', '', '1', '3', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000004, 00000000000, 'ACTS OF LASCIVIOSNESS & STATUTORY RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000005, 00000000000, 'ACTS OF LASCIVIOSNESS / ROBBERY WITH FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000006, 00000000000, 'ACTS OF LASCIVIOUSNES IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000007, 00000000000, 'ACTS OF LASCIVIOUSNESS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000008, 00000000000, 'ACTS OF LASCIVIOUSNESS (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000009, 00000000000, 'ACTS OF LASCIVIOUSNESS (5 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000010, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000011, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000012, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL TO RA 7610 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000013, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL TO RA 7610  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000014, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL TO RA 7610 (2 COUNTS) / INCEST RAPE (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000015, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL. RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000016, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000017, 00000000000, 'ACTS OF LASCIVIOUSNESS IN REL. TO RA 7610 (2 counts) & RAPE IN REL. R.A. 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000018, 00000000000, 'ACTS OF LASCIVIOUSNESS RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000019, 00000000000, 'ALARMS & SCANDAL IN REL TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000020, 00000000000, 'ARSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000021, 00000000000, 'ARSON / OTHER CASE OF ARSON / GRAVE COERCION IN REL TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000022, 00000000000, 'ATTEMP. MURDER/FRUST. MURDER/MURDER/VIOL OF RA 9516/VIOL OPF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000023, 00000000000, 'ATTEMPTED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000024, 00000000000, 'ATTEMPTED HOMICIDE IN REL TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000025, 00000000000, 'ATTEMPTED HOMICIDE IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000026, 00000000000, 'ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000027, 00000000000, 'ATTEMPTED MURDER  /  VIOL. OF RA 7166 COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000028, 00000000000, 'ATTEMPTED MURDER & ARSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000029, 00000000000, 'ATTEMPTED MURDER & FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000030, 00000000000, 'ATTEMPTED MURDER ( 2 counts )', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000031, 00000000000, 'ATTEMPTED MURDER / DIRECT ASSAULT WITH ATTEMPTED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000032, 00000000000, 'ATTEMPTED MURDER / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000033, 00000000000, 'ATTEMPTED MURDER IN REL RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000034, 00000000000, 'ATTEMPTED PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000035, 00000000000, 'ATTEMPTED PARRICIDE IN REL. RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000036, 00000000000, 'ATTEMPTED RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000037, 00000000000, 'ATTEMPTED RAPE (MV)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000038, 00000000000, 'ATTEMPTED RAPE IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000039, 00000000000, 'ATTEMPTED ROBBERY W/ FORCE & INTIMIDATION OF PERSON / VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN IN REL. TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000040, 00000000000, 'ATTEMPTED ROBBERY W/ HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000041, 00000000000, 'ATTEMTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000042, 00000000000, 'ATTEMTED PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000043, 00000000000, 'CARNAPPING', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000044, 00000000000, 'COM. RES. NO .7764 & VIL. OF SEC 11', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000045, 00000000000, 'CONSENTED ABDUCTION / VIOL. OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000046, 00000000000, 'DIRECT ASSAULT W/ HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000047, 00000000000, 'DIRECT ASSAULT W/ MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000048, 00000000000, 'DOUBLE KIDNAPPING / VIOL. OF SEC. 10 RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000049, 00000000000, 'ESTAFA', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000050, 00000000000, 'ESTAFA(13 counts & ILLEGAL RECRUITMENT IN LARGE SCALE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000051, 00000000000, 'FORCIBLE ABDUCTION W/ RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000052, 00000000000, 'FORCIBLE ABDUCTION WITH RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000053, 00000000000, 'FRUST. MURDER IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000054, 00000000000, 'FRUSTRATED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000055, 00000000000, 'FRUSTRATED HOMICIDE / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000056, 00000000000, 'FRUSTRATED HOMICIDE / VIOL OF RA 10631', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000057, 00000000000, 'FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000058, 00000000000, 'FRUSTRATED MURDER & ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000059, 00000000000, 'FRUSTRATED MURDER & ROBBERY & PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000060, 00000000000, 'FRUSTRATED MURDER ( 2 counts )', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000061, 00000000000, 'FRUSTRATED MURDER (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000062, 00000000000, 'FRUSTRATED MURDER (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000063, 00000000000, 'FRUSTRATED MURDER / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000064, 00000000000, 'FRUSTRATED MURDER / ROBBERY W/ VIOL. AGAINST INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000065, 00000000000, 'FRUSTRATED MURDER / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000066, 00000000000, 'FRUSTRATED MURDER IN REL. TO RA 7610/FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000067, 00000000000, 'FRUSTRATED MURDER WITH ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000068, 00000000000, 'FRUSTRATTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000069, 00000000000, 'GRAVE ORAL DEFAMATION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000070, 00000000000, 'GRAVE THREATS IN REL. RA 7610 VIOL OF BLG.6 / VIOL. OF BLG. 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000071, 00000000000, 'GRAVE THREATS IN REL. TO RA 7610 / VIOL. OF SEC. 5 (B) ART. III RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000072, 00000000000, 'GRAVE THREATS IN REL. TO SEC 29, OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000073, 00000000000, 'HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000074, 00000000000, 'HOMICIDE / VIOL. OF BP BLG. 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000075, 00000000000, 'INCEST RAPE / RAPE (MINOR VICTIM)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000076, 00000000000, 'INCESTIOUS RAPE IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000077, 00000000000, 'KIDNAPPING', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000078, 00000000000, 'KIDNAPPING AND SERIOUS  ILLEGAL DETENTION / PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000079, 00000000000, 'KIDNAPPING W/ MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000080, 00000000000, 'MUIRDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000081, 00000000000, 'MULTIPLE MURDER & PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000082, 00000000000, 'MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000083, 00000000000, 'MURDER  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000084, 00000000000, 'MURDER      ( 2 COUNTS )', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000085, 00000000000, 'MURDER &  FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000086, 00000000000, 'MURDER &  VIOLATION OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000087, 00000000000, 'MURDER & ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000088, 00000000000, 'MURDER & ATTEMPTED MURDER (ESCAPED BUT SURRENDERED)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000089, 00000000000, 'MURDER & ATTEMPTED MURDER / VIOL OF SEC 11, ART II RA 9165 / VIOL OF RA 10591 / VIOL OF RA 9516', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000090, 00000000000, 'MURDER & FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000091, 00000000000, 'MURDER & ROBBERY', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000092, 00000000000, 'MURDER & VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000093, 00000000000, 'MURDER (3 COUNTS) / VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000094, 00000000000, 'MURDER , ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000095, 00000000000, 'MURDER / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000096, 00000000000, 'MURDER / ATTEMPTED MURDER / MURDER UNDER ART.248 OF THE RPC / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000097, 00000000000, 'MURDER / ATTEMPTED MURDER / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000098, 00000000000, 'MURDER / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000099, 00000000000, 'MURDER / FRUSTRATED MURDER (2 COUNTS) / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000100, 00000000000, 'MURDER / HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000101, 00000000000, 'MURDER / ROBBERY W/ VIOLENCE & INTIMIDATION AGAINST PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000102, 00000000000, 'MURDER / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000103, 00000000000, 'MURDER / VIOL. OF RA 9516 / VIOL. OF COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000104, 00000000000, 'MURDER / VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF COMELEC RES. 9561-A', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000105, 00000000000, 'MURDER IN REL TO RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL TO COMELEC GUN BAN / VIOL. OF RA 4136', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000106, 00000000000, 'MURDER IN REL TO SEC 29 OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000107, 00000000000, 'MURDER IN REL TO SEC. 29 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000108, 00000000000, 'MURDER IN REL. RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000109, 00000000000, 'MURDER IN REL. TO RA 10591 / ATTEMPTED MURDER (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000110, 00000000000, 'MURDER IN REL. TO SEC. 29 OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000111, 00000000000, 'MURDER IN REL. TO SEC. 29 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000112, 00000000000, 'MURDER W/ ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000113, 00000000000, 'MURDER W/ ATTEMPTED MURDER / DIRECT ASSAULT W/ ATTEMPTED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000114, 00000000000, 'MURDER/ FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000115, 00000000000, 'MURDER/ARSON/FRUST. PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000116, 00000000000, 'MURDER/VIOL. OF COM. RES. NO. 7764', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000117, 00000000000, 'MURDER/VIOL.OF PD 1866/VIOL.OF SEC.32 RA7166 IN REL COM RES 9608', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000118, 00000000000, 'OTHER ACTS OF ABUSE & CRUELTY (SEC. 10 OF RA 7610)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000119, 00000000000, 'OTHER MISCHIEF / QUALIFIED TRESPASS TO DWELLING / GRAVE THREAT NOT SUBJECT TO CONDITION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000120, 00000000000, 'PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000121, 00000000000, 'PARRICIDE & FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000122, 00000000000, 'PARRICIDE / DIRECT ASSAULT UPON AN AGENT OF PERSON IN AUTHORITY', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000123, 00000000000, 'PARRICIDE / DIRECT ASSAULT UPON AN AGENT OF PERSON IN AUTHORITY / ATTEMPTED ARSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000124, 00000000000, 'QUALIFIED RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000125, 00000000000, 'QUALIFIED RAPE / RAPE (3 COUNTS) / VIOL. OF SEC. 5 PAR (b) OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000126, 00000000000, 'QUALIFIED RAPE THROUGH SEXUAL INTERCOURSE IN REL. RA 7610 (2 COUNTS) / QUALIFIED RAPE THROUGH SEXUAL ASSAULT IN REL. RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000127, 00000000000, 'QUALIFIED THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000128, 00000000000, 'QUALIFIED THEFT  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000129, 00000000000, 'QUALIFIED THEFT (2 COUNTS) / QUALIFIED THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000130, 00000000000, 'QUALIFIED THEFT (4 COUNTS) / VIOL. OF RA 8048 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000131, 00000000000, 'QUALIFIED THEFT THRU FALSIFICATION OF COMMERCIAL DOCUMENTS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000132, 00000000000, 'QUALIFIED TRAFFICKING / VIOL. OF RA 9775', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000133, 00000000000, 'QUALIFIED TRAFFICKING IN PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000134, 00000000000, 'QUALIFIED TRESPASS TO DWELLING', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000135, 00000000000, 'RA 8353 IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000136, 00000000000, 'RA 8353 IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000137, 00000000000, 'RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000138, 00000000000, 'RA 9516 (ILLEGAL POSSESSION OF EXPLOSIVES) / VIOL OF SEC 28 (E) OF RA 10591 / VIOL OF SEC 11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000139, 00000000000, 'RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000140, 00000000000, 'RAPE ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000141, 00000000000, 'RAPE  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000142, 00000000000, 'RAPE        (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000143, 00000000000, 'RAPE  ( 3 counts ) / VIOL. OF SEC. 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000144, 00000000000, 'RAPE  IN  REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000145, 00000000000, 'RAPE & ATTEMPTED FORCIBLE ABDUCTION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000146, 00000000000, 'RAPE & ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000147, 00000000000, 'RAPE ( MINOR VICTIM )', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000148, 00000000000, 'RAPE (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000149, 00000000000, 'RAPE (2COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000150, 00000000000, 'RAPE (MINOR VICTIM)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000151, 00000000000, 'RAPE (MV)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000152, 00000000000, 'RAPE (MV) (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000153, 00000000000, 'RAPE (THRU SEXUAL ASSAULT)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000154, 00000000000, 'RAPE / SERIOUS ILLEGAL DETENTION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000155, 00000000000, 'RAPE / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000156, 00000000000, 'RAPE / VIOL. OF SEC. 5 OF RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000157, 00000000000, 'RAPE / VIOLATION OF RA 9262 / ,ATTEMPTED RAPE / SLIGHT PHYSICAL INJURIES IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000158, 00000000000, 'RAPE IN RE4L TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000159, 00000000000, 'RAPE IN REALTION TO RA 7610 ( 2 counts )', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000160, 00000000000, 'RAPE IN REL 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000161, 00000000000, 'RAPE IN REL RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000162, 00000000000, 'RAPE IN REL TO R.A. 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000163, 00000000000, 'RAPE IN REL TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000164, 00000000000, 'RAPE IN REL TO RA 7610 / STATUTORY RAPE / RAPE / STATUTORY RAPE / RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000165, 00000000000, 'RAPE IN REL TO RA 7610 / VIOL OF SEC 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000166, 00000000000, 'RAPE IN REL. 7610 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000167, 00000000000, 'RAPE IN REL. RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000168, 00000000000, 'RAPE IN REL. RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000169, 00000000000, 'RAPE IN REL. TO RA  7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000170, 00000000000, 'RAPE IN REL. TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000171, 00000000000, 'RAPE IN REL. TO RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000172, 00000000000, 'RAPE IN REL. TO RA 7610 (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000173, 00000000000, 'RAPE IN REL. TO RA 7610/STATUTORY RAPE (2 counts)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000174, 00000000000, 'RAPE IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000175, 00000000000, 'RAPE MINOR VICTIM', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000176, 00000000000, 'RAPE MV', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000177, 00000000000, 'RAPE MV (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000178, 00000000000, 'RAPE THROUGH SEXUAL ASSAULT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000179, 00000000000, 'RAPE THROUGH SEXUAL ASSAULT / RAPE UNDER RPC PURSUANT TO RA 8353', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000180, 00000000000, 'RAPE THROUGH SEXUAL ASSAULT IN REL. RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000181, 00000000000, 'RAPE THROUGH SEXUAL ASSAULT IN REL. RA 7610 / ACTS OF LASCIVIOUSNESS IN REL RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000182, 00000000000, 'RAPE THRU SEXUAL ASSAULT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000183, 00000000000, 'RAPE THRU SEXUAL ASSAULT (MV)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000184, 00000000000, 'RAPE THRU SEXUAL ASSAULT IN REL TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000185, 00000000000, 'RAPE THRU SEXUAL ASSAULT RA 8353', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000186, 00000000000, 'RAPE UNDER ART 266-A IN REL. ART 266-B (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000187, 00000000000, 'RAPE UNDER ART 266-A RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000188, 00000000000, 'RAPE UNDER PAR 1 ART. 266-A, RA 8353 IN REL TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000189, 00000000000, 'RESISTANCE & DISOBEDIENCE OF PERSONS IN AUTHORITY / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000190, 00000000000, 'ROB. W/ HOMICIDE & ROB. W. FRUST. HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000191, 00000000000, 'ROBBERY', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000192, 00000000000, 'ROBBERY & ROBBERY W/ RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000193, 00000000000, 'ROBBERY BY THE USE OF FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000194, 00000000000, 'ROBBERY IN AN INHABITED HOUSE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000195, 00000000000, 'ROBBERY IN AN INHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000196, 00000000000, 'ROBBERY IN AN INHABITED PLACE / GRAVE THREATS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000197, 00000000000, 'ROBBERY IN AN INHABITED PLACE / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000198, 00000000000, 'ROBBERY IN AN INHABITED PLACE / VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000199, 00000000000, 'ROBBERY IN AN UNINHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000200, 00000000000, 'ROBBERY IN AN UNINHABITED PLACE / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000201, 00000000000, 'ROBBERY IN AN UNUNINHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000202, 00000000000, 'ROBBERY IN BOND', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000203, 00000000000, 'ROBBERY W/ DOUBLE  HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000204, 00000000000, 'ROBBERY W/ DOUBLE HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000205, 00000000000, 'ROBBERY W/ FORCE & INTIMIDATION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000206, 00000000000, 'ROBBERY W/ FORCE & INTIMIDATION OF PERSON / VIOL. OF RA 6539 / VIOL. OF PD 1866 AS AMENDED', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000207, 00000000000, 'ROBBERY W/ FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000208, 00000000000, 'ROBBERY W/ FORCE UPON THINGS / ROBBERY WITH HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000209, 00000000000, 'ROBBERY W/ FORCE UPON THINGS / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000210, 00000000000, 'ROBBERY W/ HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000211, 00000000000, 'ROBBERY W/ HOMICIDE / VIOL. OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000212, 00000000000, 'ROBBERY W/ HOMICIDE / VIOLATION OF SEC. 28 (e) RA 10591 & VIOLATION OF SEC.11 ART.2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000213, 00000000000, 'ROBBERY W/ INTIMIDATION / VIOL. OF COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000214, 00000000000, 'ROBBERY W/ INTIMIDATION OF PERSON (2 COUNTS) / VIOL. OF COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000215, 00000000000, 'ROBBERY W/ INTIMIDATION OF PERSON / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000216, 00000000000, 'ROBBERY W/ INTIMIDATION OF PERSON/VIOL. OF SEC 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000217, 00000000000, 'ROBBERY W/ MULT. RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000218, 00000000000, 'ROBBERY W/ MULTIPLE HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000219, 00000000000, 'ROBBERY W/ VIOLENCE & INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000220, 00000000000, 'ROBBERY W/ VIOLENCE AGAINST & INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000221, 00000000000, 'ROBBERY W/ VIOLENCE AGAINST OR INTIMIDATION OF PERSONS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000222, 00000000000, 'ROBBERY W/ VIOLENCE AGAINSTS & INTIMIDATION OF PERSON / VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000223, 00000000000, 'ROBBERY WITH FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000224, 00000000000, 'ROBBERY WITH FORCE UPON THINGS / ROBBERY WITH FORCE UPON THINGS & VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000225, 00000000000, 'ROBBERY WITH FORCE UPON THINGS / VIOL OF BLG.6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000226, 00000000000, 'ROBBERY WITH HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000227, 00000000000, 'ROBBERY WITH HOMICIDE / ARSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000228, 00000000000, 'ROBBERY WITH INTIMADATION OF PERSON( (2 counts)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000229, 00000000000, 'ROBBERY WITH INTIMIDATION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000230, 00000000000, 'ROBBERY WITH INTIMIDATION OF ART. 294(5) & ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000231, 00000000000, 'ROBBERY WITH INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000232, 00000000000, 'ROBBERY WITH INTIMIDATION OF PERSONS IN REL TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000233, 00000000000, 'ROBBERY WITH RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000234, 00000000000, 'ROBBERY WITH VIOLENCE & INTIMIDATION UPON PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000235, 00000000000, 'ROBBERY WITH VIOLENCE / VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000236, 00000000000, 'ROBBERY WITH VIOLENCE AGAINST AND INTIMIDATION OF PERSON ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000237, 00000000000, 'ROBBERY WITH VIOLENCE AGAINST AND INTIMIDATION OF PERSON & ROBBERY W/ RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000238, 00000000000, 'ROBBERY WITH VIOLENCE AGAINST AND INTIMIDATION OF PERSON / ROBBERY WITH FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000239, 00000000000, 'ROBBERY WITH VIOLENCE AGAINST OR INTIMIDATION OF PERSONS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000240, 00000000000, 'ROBBERY WITH VIOLENCE AGAINST PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000241, 00000000000, 'SEC. 11 ART. 2 OF RA 9165 / PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000242, 00000000000, 'SER.111.DETENTION W/ RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000243, 00000000000, 'SERIOUS ILLEGAL DETENTION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000244, 00000000000, 'SERIOUS ILLEGAL DETENTION (MINOR) 2 COUNTS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000245, 00000000000, 'SERIOUS ILLEGAL DETENTION (OF MINOR)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000246, 00000000000, 'SERIOUS ILLEGAL DETENTION IN REL. TO RA 7610 / VIOL. OF SEC.10 RA 7610 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000247, 00000000000, 'SEXUAL ASSAULT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000248, 00000000000, 'SEXUAL ASSAULT DEFINED UNDER PAR 2 226 OF RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000249, 00000000000, 'STATURORY RAPE (3 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000250, 00000000000, 'STATUTORY RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000251, 00000000000, 'STATUTORY RAPE (3 COUNTS) / RAPE (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000252, 00000000000, 'STATUTORY RAPE / ACTS OF LASCIVIOUSNESS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000253, 00000000000, 'STATUTORY RAPE IN REL. RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000254, 00000000000, 'STATUTORY RAPE IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000255, 00000000000, 'THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000256, 00000000000, 'THEFT / VIOL OF PD 1612', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000257, 00000000000, 'THEFT / VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000258, 00000000000, 'THEFT / VIOL OF SEC 12, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000259, 00000000000, 'THEFT / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000260, 00000000000, 'VIO. OF SEC.11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000261, 00000000000, 'VIOALTION OF RA 8353 IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000262, 00000000000, 'VIOL OF PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000263, 00000000000, 'VIOL OF PD 1866 AS MANDED RA 8294 / SEC 11 ART.2 RA 9165 / DIRECT ASSAULT / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000264, 00000000000, 'VIOL OF PD 532 (HIGHWAY ROBBERY)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000265, 00000000000, 'VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000266, 00000000000, 'VIOL OF RA 10591 (2X) / VIOL OF SEC 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000267, 00000000000, 'VIOL OF RA 10591 (ILLEGAL POSSESSION OF FIREARMS & AMMOS.) / ROBBERY WITH FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000268, 00000000000, 'VIOL OF RA 10591 (ILLEGAL POSSESSION OF FIREARMS & AMMOS.) / VIOL OF RA 9516 (ILLEGAL POSSESSION OF EXPLOSIVES)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000269, 00000000000, 'VIOL OF RA 10591 / GRAVE THREATS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000270, 00000000000, 'VIOL OF RA 10591 / VIOL OF RA 9516', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000271, 00000000000, 'VIOL OF RA 10591 / VIOL OF RA 9516 (ILLEGAL POSSESSION OF EXPLOSIVES)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000272, 00000000000, 'VIOL OF RA 10591 / VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000273, 00000000000, 'VIOL OF RA 10591 / VIOL OF SEC 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000274, 00000000000, 'VIOL OF RA 10883', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000275, 00000000000, 'VIOL OF RA 10883 (ANTI- CARNAPPING ACT)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000276, 00000000000, 'VIOL OF RA 10883 / VIOL OF SEC 11, ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000277, 00000000000, 'VIOL OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000278, 00000000000, 'VIOL OF RA 6539 (ANTI-CARNAPPING)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000279, 00000000000, 'VIOL OF RA 6539 / ROBBERY WITH VIOLENCE AGAINST AND INTIMIDATION OF PERSONS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000280, 00000000000, 'VIOL OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000281, 00000000000, 'VIOL OF RA 7166 IN REL TO COMELEC RES. NO. 10015 IN REL TO SEC 29 OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000282, 00000000000, 'VIOL OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000283, 00000000000, 'VIOL OF RA 7610 (3X) / RAPE (SEXUAL ASSAULT) / STATUTORY RAPE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000284, 00000000000, 'VIOL OF RA 8049 IN RELATION TO RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000285, 00000000000, 'VIOL OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000286, 00000000000, 'VIOL OF RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000287, 00000000000, 'VIOL OF RA 9516 (ILLEGAL POSSESION OF EXPLOSIVES)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000288, 00000000000, 'VIOL OF RA 9516 (ILLEGAL POSSESSION OF EXPLOSIVES) / VIOL OF RA 10591 (ILLEGAL POSSESSION OF FIREARMS & AMMOS.). / VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000289, 00000000000, 'VIOL OF RA 9516 / FRUSTRATED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000290, 00000000000, 'VIOL OF RA 9516 / VIOL OF BLG.6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000291, 00000000000, 'VIOL OF SEC  5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000292, 00000000000, 'VIOL OF SEC 10 PAR. (A) RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000293, 00000000000, 'VIOL OF SEC 10(a) ARTICLE VI, RA 7610 / VIOL OF SEC 10(a) ARTICLE VI, RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000294, 00000000000, 'VIOL OF SEC 10(A), RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000295, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000296, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000297, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF ART 151 OF RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000298, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000299, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000300, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF RA 10591 / VIOL OF PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000301, 00000000000, 'VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF SEC 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000302, 00000000000, 'VIOL OF SEC 11 & 12, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000303, 00000000000, 'VIOL OF SEC 11 & 12, ART II RA 9165 / VIOL OF RA 10591 /  VIOL OF RA 10591(live ammus.)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000304, 00000000000, 'VIOL OF SEC 11 & 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000305, 00000000000, 'VIOL OF SEC 11 & 5 ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000306, 00000000000, 'VIOL OF SEC 11 & 5, ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000307, 00000000000, 'VIOL OF SEC 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000308, 00000000000, 'VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000309, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000310, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / RESISTANCE AND DISOBEDIENCE OF AN AGENT OF A PERSON IN AUTHORITY / VIOL OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000311, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000312, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / VIOL OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000313, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / VIOL OF RA 8042', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000314, 00000000000, 'VIOL OF SEC 11 ART II RA 9165 / VIOL OF SEC 5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000315, 00000000000, 'VIOL OF SEC 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000316, 00000000000, ' VIOL OF SEC 11 RA 9165 & ROB W/ FORCE UPON THINGS ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000317, 00000000000, 'VIOL OF SEC 11& 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000318, 00000000000, 'VIOL OF SEC 11, 12 & 5, ART II RA 9165 / VIOL OF RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000319, 00000000000, 'VIOL OF SEC 11, 5 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000320, 00000000000, 'VIOL OF SEC 11, 5 & 6 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000321, 00000000000, 'VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000322, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000323, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 / ATTEMPTED HOMICIDE IN REL. TO SEC 29 OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000324, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 / VIOL OF BLG. 6 (CONCEALING DEADLY WEAPON)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000325, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 / VIOL OF RA 10591 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000326, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 / VIOL OF SEC 11, ART II RA 9165 / VIOL OF SEC 5, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000327, 00000000000, 'VIOL OF SEC 11, ART II RA 9165 / VIOL OF SEC 28(E) OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000328, 00000000000, 'VIOL OF SEC 11,12 & 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000329, 00000000000, 'VIOL OF SEC 11ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000330, 00000000000, 'VIOL OF SEC 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000331, 00000000000, 'VIOL OF SEC 12, ART II RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000332, 00000000000, 'VIOL OF SEC 13 & 14 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000333, 00000000000, 'VIOL OF SEC 13 & 14, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000334, 00000000000, 'VIOL OF SEC 13 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000335, 00000000000, 'VIOL OF SEC 13, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000336, 00000000000, 'VIOL OF SEC 14 ART II RA 9165 / VIOL OF SEC 7 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000337, 00000000000, 'VIOL OF SEC 15, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000338, 00000000000, 'VIOL OF SEC 28 (E) OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000339, 00000000000, 'VIOL OF SEC 28 (par. e) RA 10591 / VIOL OF SEC 5 & 11 ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000340, 00000000000, 'VIOL OF SEC 32, RA 7166 / VIOL OF SEC 11, RA 9165 / VIOL OF BLG-6 / VIOL OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000341, 00000000000, 'VIOL OF SEC 4(A) OF RA 9775 IN REL. TO RA 10175 / VIOL OF SEC 4, IN REL SEC 6(A & d) OF RA 9208 AS AMENDED BY RA 10364 / VIOL OF SEC 4, IN REL TO SEC 6(A & D) OF RA 9208 AS AMENDED BY RA 10364 / VIOL OF SEC 9 OF RA 7610 (SPECIAL PROTECTION OF CHILDREN AGA', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000342, 00000000000, 'VIOL OF SEC 5  & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000343, 00000000000, 'VIOL OF SEC 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000344, 00000000000, 'VIOL OF SEC 5 & 11 ART II OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000345, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000346, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000347, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9165 / VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000348, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9165 / VIOL OF SEC 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000349, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9165 / VIOL OF SEC RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000350, 00000000000, 'VIOL OF SEC 5 & 11 ART II RA 9615', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000351, 00000000000, 'VIOL OF SEC 5 & 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000352, 00000000000, 'VIOL OF SEC 5 & 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000353, 00000000000, 'VIOL OF SEC 5 & 11, ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000354, 00000000000, 'VIOL OF SEC 5 & 11, ART II RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000355, 00000000000, 'VIOL OF SEC 5 & 11, ART II RA 9165 / VIOL OF ART 151OF RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000356, 00000000000, 'VIOL OF SEC 5 & 11, ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000357, 00000000000, 'VIOL OF SEC 5 & 11ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000358, 00000000000, 'VIOL OF SEC 5 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000359, 00000000000, 'VIOL OF SEC 5 & 6 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000360, 00000000000, 'VIOL OF SEC 5 & ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000361, 00000000000, 'VIOL OF SEC 5 (a) AND (b) OF RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000362, 00000000000, 'VIOL OF SEC 5 (a) RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000363, 00000000000, 'VIOL OF SEC 5 (b) OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000364, 00000000000, 'VIOL OF SEC 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000365, 00000000000, 'VIOL OF SEC 5 ART II OF RA 9165 / VIOL OF SEC 11, ART II RA 9165 / VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000366, 00000000000, 'VIOL OF SEC 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000367, 00000000000, 'VIOL OF SEC 5 ART II RA 9165 / VIOL OF SEC 11 & 12 ART II RA 9165 / VIOL OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL);
INSERT INTO `cs_violations` (`id`, `violations_category_id`, `name`, `level`, `description`, `RepublicAct`, `min_year`, `max_year`, `min_month`, `max_month`, `min_day`, `max_day`, `status`, `created_on`, `modified_on`) VALUES
(00000000368, 00000000000, 'VIOL OF SEC 5 ART II RA 9165 / VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000369, 00000000000, 'VIOL OF SEC 5 IN REL TO SEC 26 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000370, 00000000000, 'VIOL OF SEC 5 IN REL TO SEC 26 ART II RA 9165 / VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000371, 00000000000, 'VIOL OF SEC 5 PAR. (B) RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000372, 00000000000, 'VIOL OF SEC 5 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000373, 00000000000, 'VIOL OF SEC 5(b) RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000374, 00000000000, 'VIOL OF SEC 5, 11 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000375, 00000000000, 'VIOL OF SEC 5, 11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000376, 00000000000, 'VIOL OF SEC 5, 11 & 12, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000377, 00000000000, 'VIOL OF SEC 5, 11 & 12, ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000378, 00000000000, 'VIOL OF SEC 5, 16, 11 & 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000379, 00000000000, 'VIOL OF SEC 5, 6 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000380, 00000000000, 'VIOL OF SEC 5, 6, & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000381, 00000000000, 'VIOL OF SEC 5, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000382, 00000000000, 'VIOL OF SEC 5, ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000383, 00000000000, 'VIOL OF SEC 5, ART II RA 9165 / VIOL OF SEC 12, ART II RA 9165 / VIOL OF RA 10591 / VIOL OF SEC 6, ART II RA 9165 / VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000384, 00000000000, 'VIOL OF SEC 5,11 & 12 ART 2 RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000385, 00000000000, 'VIOL OF SEC 5,11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000386, 00000000000, 'VIOL OF SEC 5,11 & 12 ART II RA 9165 / VIOL OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000387, 00000000000, 'VIOL OF SEC 5,6,11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000388, 00000000000, 'VIOL OF SEC 6 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000389, 00000000000, 'VIOL OF SEC 6 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000390, 00000000000, 'VIOL OF SEC 7 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000391, 00000000000, 'VIOL OF SEC 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000392, 00000000000, 'VIOL OF SEC 7 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000393, 00000000000, 'VIOL OF SEC. 10 (a), RA 7610 (OTHER ACTS OF CHILD ABUSE)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000394, 00000000000, 'VIOL OF SEC. 5 ART II RA 9165Q', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000395, 00000000000, 'VIOL OF SEC.5 & 11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000396, 00000000000, 'VIOL SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF PD 1829', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000397, 00000000000, 'VIOL, OF SEC. 5, 11 & 12 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000398, 00000000000, 'VIOL. ,OF PD 1866 / VIOL. OF SEC. 11 RSA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000399, 00000000000, 'VIOL. OF COMELEC GUN BAN / ILLEGAL POSSESSION OF EXPLOSIVE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000400, 00000000000, 'VIOL. OF PD 1866 AS AMENDED BY RA 8294/VIOL. OF SEC. 32 RA 7166 COM. RES 9608', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000401, 00000000000, 'VIOL. OF PD 1866 RA 8294 / VIOL. OF SEC. 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000402, 00000000000, 'VIOL. OF PD 1866/VIOL OF SEC. 32 RA 7166/VIOL. OF SEC 11 ART. 2 RA 9165/ATT. MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000403, 00000000000, 'VIOL. OF PD 519 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000404, 00000000000, 'VIOL. OF RA 10175 / VIOL. OF RA 9995 / VIOL. OF RA 7610 / VIOL. OF RA 9208 AS AMENDED BY RA 10364', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000405, 00000000000, 'VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000406, 00000000000, 'VIOL. OF RA 10591 & MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000407, 00000000000, 'VIOL. OF RA 10591 & VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000408, 00000000000, 'VIOL. OF RA 10591 / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000409, 00000000000, 'VIOL. OF RA 10591 / DIRECT ASSAULT W/ MULTIPLE ATTEMPTED MURDER / VIOL. OF SEC. 12 ART 2 RA 9165 / MURDER /FRUSTRATED MURDER / VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000410, 00000000000, 'VIOL. OF RA 10591 / GRAVE THREATS IN REL TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000411, 00000000000, 'VIOL. OF RA 10591 / HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000412, 00000000000, 'VIOL. OF RA 10591 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000413, 00000000000, 'VIOL. OF RA 10591 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000414, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF PD 1602 / ROBBERY', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000415, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF RA 9516', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000416, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF RA 9516 (2 COUNTS) / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000417, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF RA 9516 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000418, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF RA 9516 / VIOL. OF SEC. 5, 6, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000419, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC 19 RA 4136', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000420, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000421, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / LESS SERIOUS PHYSICAL INJURIES', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000422, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 11 & 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000423, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000424, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 13 & 14 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000425, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000426, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000427, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000428, 00000000000, 'VIOL. OF RA 10591 / VIOL. OF SEC. 5, 11 & 12 ART2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000429, 00000000000, 'VIOL. OF RA 10883 (ANTI-CARNAPPING ACT)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000430, 00000000000, 'VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000431, 00000000000, 'VIOL. OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000432, 00000000000, 'VIOL. OF RA 7166 / GRAVE THREATS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000433, 00000000000, 'VIOL. OF RA 7166 IN REL TO RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000434, 00000000000, 'VIOL. OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000435, 00000000000, 'VIOL. OF RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000436, 00000000000, 'VIOL. OF RA 7610 / VIOL. OF PD 1829 (OBSTRUCTION OF JUSTICE)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000437, 00000000000, 'VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000438, 00000000000, 'VIOL. OF RA 8294 / VIOL. OF RA 9516 / VIOL. OF SEC.11 ART II RA 9165 / VIOL. OF SEC. 12 ART 2 RA 9165 / VIOL. OF SEC.11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000439, 00000000000, 'VIOL. OF RA 8294 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000440, 00000000000, 'VIOL. OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000441, 00000000000, 'VIOL. OF RA 9208', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000442, 00000000000, 'VIOL. OF RA 9262 SEC 5 (a)  2 COUNTS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000443, 00000000000, 'VIOL. OF RA 9516', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000444, 00000000000, 'VIOL. OF RA 9516 & VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000445, 00000000000, 'VIOL. OF RA 9516 ( ILLEGAL POSSSESSION OF EXPLOSIVES) / VIOL. OF SEC.11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000446, 00000000000, 'VIOL. OF RA 9516 (ILLEGAL POSSSESSION OF EXPLOSIVES) / VIOL OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000447, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000448, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000449, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF RA 10591 / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000450, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000451, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF RA 10591 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000452, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF RA 10591 / VIOL. OF SEC. 19 RA 4136', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000453, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 11 & 12 ART II RA 9165 / MURDER WITH ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000454, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000455, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000456, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 12 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000457, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 13 & 14 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000458, 00000000000, 'VIOL. OF RA 9516 / VIOL. OF SEC. 5, 11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000459, 00000000000, 'VIOL. OF RA 9516/VIOL. OF PD 1866/VIOL. OF SEC. 32 RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000460, 00000000000, 'VIOL. OF RA 9516/VIOL. OF SEC 11 ART. 2 RA 9165/VIOL. OF PD 1866/VIOL. OF SEC 32 RA 7166/VIOL. OF SEC 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000461, 00000000000, 'VIOL. OF RA 9516/VIOL. OF SEC. 32 RA 7166/VIOL. OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000462, 00000000000, 'VIOL. OF RA 9775 (ANTI CHILD PORNOGRAPHY) / VIOL. OF SEC. 4 IN REL. TO SEC. 6 OF RA 9206 AS AMENDED BY RA 10364 (QUALIFIED TRAFFICKING)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000463, 00000000000, 'VIOL. OF RA NO. 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000464, 00000000000, 'VIOL. OF SEC 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000465, 00000000000, 'VIOL. OF SEC 11 ART.2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000466, 00000000000, 'VIOL. OF SEC 12 & 11 RA 9165 / VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000467, 00000000000, 'VIOL. OF SEC 16 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000468, 00000000000, 'VIOL. OF SEC 4 (a)  IN REL. TO SEC. 6 (a & c) RA 9208 RA 10364', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000469, 00000000000, 'VIOL. OF SEC 5 &  11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000470, 00000000000, 'VIOL. OF SEC 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000471, 00000000000, 'VIOL. OF SEC 5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000472, 00000000000, 'VIOL. OF SEC 5 & 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000473, 00000000000, 'VIOL. OF SEC 5 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000474, 00000000000, 'VIOL. OF SEC. 10 (a) ART VI RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000475, 00000000000, 'VIOL. OF SEC. 10 RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000476, 00000000000, 'VIOL. OF SEC. 10 RA 7610 / SERIOUS ILLEGAL DETENTION', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000477, 00000000000, 'VIOL. OF SEC. 11  & 12 ART 2 RA 9165 / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000478, 00000000000, 'VIOL. OF SEC. 11  & 12 ART 2 RA 9165 / VIOL. OF RA 8294 AMENDED RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000479, 00000000000, 'VIOL. OF SEC. 11  ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000480, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000481, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000482, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000483, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ATTEMPTED HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000484, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ILLEGAL POSSESSION OF F/A', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000485, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ROBBERY IN AN INHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000486, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ROBBERY W/ FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000487, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ROBBERY W/ VIOLENCE AGAINST & INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000488, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / SLIGHT PHYSICAL INJURIES', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000489, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000490, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF PD 1602 IN REL TO PD 519', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000491, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF PD 1866 RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000492, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10054(HELMET ACT) / VIOL. OF SEC. 19 RA 4136(DRIVING W/OUT LICENSE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000493, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000494, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000495, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000496, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 28 ART V RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000497, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000498, 00000000000, 'VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000499, 00000000000, 'VIOL. OF SEC. 11 & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000500, 00000000000, 'VIOL. OF SEC. 11 & 12 ART II RA 9165 / VIOL. OF SEC. 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000501, 00000000000, 'VIOL. OF SEC. 11 & 12,  ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000502, 00000000000, 'VIOL. OF SEC. 11 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000503, 00000000000, 'VIOL. OF SEC. 11 & 13 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000504, 00000000000, 'VIOL. OF SEC. 11 & 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000505, 00000000000, 'VIOL. OF SEC. 11 & 5 ART 2 RA 9165 / VIOL. OF SEC. 12 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000506, 00000000000, 'VIOL. OF SEC. 11 , ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000507, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 91 65', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000508, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000509, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000510, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000511, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / GRAVE THREATS IN REL. TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000512, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000513, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / MURDER / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000514, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / QUALIFIED THEFT / VIOL. OF BP BLG. 6 / ROBBERY W/ INTIMIDATION OF PERSONS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000515, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / ROBBERY IN AN INHABITED HOUSE (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000516, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / ROBBERY IN AN INHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000517, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / ROBBERY W/ VIOLENCE AGAINST INTIMIDATION OF PERSON IN REL. SEC. 29 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000518, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / ROBBERY W/ VIOLENCE AGAINSTS INTIMIDATION OF PERSON', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000519, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000520, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL.  OF RA 7166 IN REL. TO RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000521, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000522, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF BP BLG 6 / VIOL. OF RA 6539 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000523, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000524, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000525, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 10591 / ROBBERY WITH VIOLENCE AGAINST AND INTIMIDATION OF PERSONS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000526, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000527, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 7166 / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000528, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000529, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000530, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000531, 00000000000, 'VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF SEC. 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000532, 00000000000, 'VIOL. OF SEC. 11 ART II RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000533, 00000000000, 'VIOL. OF SEC. 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000534, 00000000000, 'VIOL. OF SEC. 11 ART. 2 RA 9165, CARNAPPING', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000535, 00000000000, 'VIOL. OF SEC. 11 ART. 2 RA 9165, VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000536, 00000000000, 'VIOL. OF SEC. 11 ART. 2 RA 9165/ROBBERY', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000537, 00000000000, 'VIOL. OF SEC. 11 RA 9165/RA 8294/ COMELEC GUNBAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000538, 00000000000, 'VIOL. OF SEC. 11,  ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000539, 00000000000, 'VIOL. OF SEC. 11, 12 & 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000540, 00000000000, 'VIOL. OF SEC. 11, 12 & 6 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000541, 00000000000, 'VIOL. OF SEC. 11, 13 & 14 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000542, 00000000000, 'VIOL. OF SEC. 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000543, 00000000000, 'VIOL. OF SEC. 11, ART. 2 RA 9165 & THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000544, 00000000000, 'VIOL. OF SEC. 11, ART. 2 RA 9165 / VIOL. OF ART. 168 RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000545, 00000000000, 'VIOL. OF SEC. 11, ART. 2 RA 9165/VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000546, 00000000000, 'VIOL. OF SEC. 12 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000547, 00000000000, 'VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000548, 00000000000, 'VIOL. OF SEC. 12 ART 2 RA 9165 / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000549, 00000000000, 'VIOL. OF SEC. 12 ART 2 RA 9165 / ROBBERY W/ FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000550, 00000000000, 'VIOL. OF SEC. 12 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000551, 00000000000, 'VIOL. OF SEC. 12 ART 2 RA 9165 / VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000552, 00000000000, 'VIOL. OF SEC. 13 & 14 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000553, 00000000000, 'VIOL. OF SEC. 13 & 14 ART 2 RA 9165 / GRAVE THREATS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000554, 00000000000, 'VIOL. OF SEC. 13 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000555, 00000000000, 'VIOL. OF SEC. 13, 14, 6 & 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000556, 00000000000, 'VIOL. OF SEC. 14 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000557, 00000000000, 'VIOL. OF SEC. 16 ART 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000558, 00000000000, 'VIOL. OF SEC. 16 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000559, 00000000000, 'VIOL. OF SEC. 16 ART RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000560, 00000000000, 'VIOL. OF SEC. 28 AMENDED RA 10591 / VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF BP BLG.6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000561, 00000000000, 'VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000562, 00000000000, 'VIOL. OF SEC. 28 RA 10591 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000563, 00000000000, 'VIOL. OF SEC. 28 RA 10591 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000564, 00000000000, 'VIOL. OF SEC. 28 RA 10591 / VIOL. OF SEC. 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000565, 00000000000, 'VIOL. OF SEC. 32 RA 7166 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000566, 00000000000, 'VIOL. OF SEC. 32 RA 7166 COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000567, 00000000000, 'VIOL. OF SEC. 32 RA 7166 COMELEC GUN BAN / ROBBERY IN UNINHABITED PLACE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000568, 00000000000, 'VIOL. OF SEC. 32 RA 7166 COMELEC GUN BAN / VIOL. OF BLG.6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000569, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL TO COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000570, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL TO COMELEC GUN BAN / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000571, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000572, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN / ILLEGAL POSSESSION OF F/A / VIOL. OF SEC. 6 ART 2 RA 9165 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000573, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000574, 00000000000, 'VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN / VIOL. OF SEC. 11 & 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000575, 00000000000, 'VIOL. OF SEC. 32 RA 7166/VIOL. OF RA 9516/VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000576, 00000000000, 'VIOL. OF SEC. 4 (a) IN REL. SEC. 6 RA 9208', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000577, 00000000000, 'VIOL. OF SEC. 4 (a) RA 9208', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000578, 00000000000, 'VIOL. OF SEC. 4 IN REL. TO  SEC. 6 (A & C) RA 9208  & VIOL. OF SEC. 10 PAR (b)  RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000579, 00000000000, 'VIOL. OF SEC. 5 & 11  ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000580, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2  RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000581, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 91 65', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000582, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000583, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000584, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000585, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / (MTCC CEBU CITY) ??? For verification', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000586, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000587, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / MALICIOUS MISCHIEF', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000588, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / ROBBERY / VIOL. OF RA 6539 / VIOLATION OF RA 6539 (CARNAPPING)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000589, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / ROBBERY BY THE USE OF FORCE UPON THINGS', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000590, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL OF 8294 / VIOL OF SEC 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000591, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000592, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF COMELEC GUN BAN RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000593, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF PD 1866 AS AMENDED BY RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000594, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF PD 533', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000595, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000596, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF RA 10591  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000597, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 10 RA 7610 IN REL 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000598, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000599, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF RA 8294 AMENDED RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000600, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000601, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000602, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000603, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL TO COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000604, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL. COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000605, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000606, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9165 / VIOL. OF SEC. 77 OF PD 705', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000607, 00000000000, 'VIOL. OF SEC. 5 & 11 ART 2 RA 9168', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000608, 00000000000, 'VIOL. OF SEC. 5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000609, 00000000000, 'VIOL. OF SEC. 5 & 11 ART.  2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000610, 00000000000, 'VIOL. OF SEC. 5 & 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000611, 00000000000, 'VIOL. OF SEC. 5 & 11 ART. 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000612, 00000000000, 'VIOL. OF SEC. 5 & 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000613, 00000000000, 'VIOL. OF SEC. 5 & 11 RA 9165 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000614, 00000000000, 'VIOL. OF SEC. 5 & 11, ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000615, 00000000000, 'VIOL. OF SEC. 5 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000616, 00000000000, 'VIOL. OF SEC. 5 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000617, 00000000000, 'VIOL. OF SEC. 5 & 12 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000618, 00000000000, 'VIOL. OF SEC. 5 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000619, 00000000000, 'VIOL. OF SEC. 5 & 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000620, 00000000000, 'VIOL. OF SEC. 5 &11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000621, 00000000000, 'VIOL. OF SEC. 5 (a) RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000622, 00000000000, 'VIOL. OF SEC. 5 (a) RA 9262 / VIOL. OF RA 7610 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000623, 00000000000, 'VIOL. OF SEC. 5 (i) RA 9262 / ATTEMPTED PARRICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000624, 00000000000, 'VIOL. OF SEC. 5 ART  2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000625, 00000000000, 'VIOL. OF SEC. 5 ART 2 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000626, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000627, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000628, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000629, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / SWINDLING / ESTAFA UNDER ART. 318 RPC', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000630, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000631, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF RA 6539', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000632, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000633, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 32 RA 7166 / VIOL. OF SEC. 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000634, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000635, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000636, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 & 12 ART 2 RA 9165 / ILLEGAL POSSESSION OF F/A / VIOL. OF SEC. 6 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000637, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000638, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 RA 9165 (2 COUNTS)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000639, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 RA 9165 / THEFT', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000640, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 RA 9165 / VIOL. OF RA 8294(ILLEGAL POSSESION OF FIREARMS) / VIOL. OF SEC. 32 RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000641, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165/ VIOL. OF SEC.11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000642, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA 9165/VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000643, 00000000000, 'VIOL. OF SEC. 5 ART 2 RA9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000644, 00000000000, 'VIOL. OF SEC. 5 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000645, 00000000000, 'VIOL. OF SEC. 5 ART II RA 9165 / VIOL. OF SEC. 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000646, 00000000000, 'VIOL. OF SEC. 5 ART II RA 9165 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000647, 00000000000, 'VIOL. OF SEC. 5 ART. 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000648, 00000000000, 'VIOL. OF SEC. 5 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000649, 00000000000, 'VIOL. OF SEC. 5 ART. 2 RA 9165 / VIOL. OF SEC 11 ART II RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000650, 00000000000, 'VIOL. OF SEC. 5 ART. 2 RA 9165 / VIOL. OF SEC. 16 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000651, 00000000000, 'VIOL. OF SEC. 5 ART. 2 RA 9165/ VIOL. OF SEC. 11 ART 2 RA 9165/ VIOL. OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000652, 00000000000, 'VIOL. OF SEC. 5 ART. 2 RA 9165/VIOL. OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000653, 00000000000, 'VIOL. OF SEC. 5 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000654, 00000000000, 'VIOL. OF SEC. 5 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000655, 00000000000, 'VIOL. OF SEC. 5 PAR. (b) RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000656, 00000000000, 'VIOL. OF SEC. 5,  ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000657, 00000000000, 'VIOL. OF SEC. 5, 11  & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000658, 00000000000, 'VIOL. OF SEC. 5, 11 & 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000659, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000660, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000661, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165  ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000662, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. O RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000663, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF PD 1866 AS AMENDED BY RA 8294 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000664, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000665, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF RA 10591 / VIOL. OF SEC. 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000666, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000667, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF RA 9262', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000668, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000669, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 3 PD 1866 AS AMENDED RA 9516', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000670, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART 2 RA 9165 / VIOL. OF SEC. 32 RA 7166 IN REL. TO COMELEC GUN BAN', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000671, 00000000000, 'VIOL. OF SEC. 5, 11 & 12 ART. 2 RA 9165/VIOL. OF SEC. 28 RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000672, 00000000000, 'VIOL. OF SEC. 5, 11 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000673, 00000000000, 'VIOL. OF SEC. 5, 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000674, 00000000000, 'VIOL. OF SEC. 5, 11, & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000675, 00000000000, 'VIOL. OF SEC. 5, 11, & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000676, 00000000000, 'VIOL. OF SEC. 5, 11, & 12 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000677, 00000000000, 'VIOL. OF SEC. 5, 11, & 12 ART II RA 9165 / ATTEMPTED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000678, 00000000000, 'VIOL. OF SEC. 5, 11, & 12 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000679, 00000000000, 'VIOL. OF SEC. 5, 11, & 12 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000680, 00000000000, 'VIOL. OF SEC. 5, 11, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000681, 00000000000, 'VIOL. OF SEC. 5, 11, 13, 14 & 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000682, 00000000000, 'VIOL. OF SEC. 5, 12 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000683, 00000000000, 'VIOL. OF SEC. 5, 12 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000684, 00000000000, 'VIOL. OF SEC. 5, 6 & 11 ART 2 RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000685, 00000000000, 'VIOL. OF SEC. 5, 6, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000686, 00000000000, 'VIOL. OF SEC. 5, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000687, 00000000000, 'VIOL. OF SEC. 6 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000688, 00000000000, 'VIOL. OF SEC. 6 & 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000689, 00000000000, 'VIOL. OF SEC. 6 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000690, 00000000000, 'VIOL. OF SEC. 6 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000691, 00000000000, 'VIOL. OF SEC. 6 RA 7610 / VIOL OF RA 9775 / QUALIFIED TRAFFICKING IN PERSONS / VIOL. OF SEC. 4 & 6 OF RA 9775 / RAPE THRU SEXUAL ASSAULT / VIOL. OF SEC. 5 RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000692, 00000000000, 'VIOL. OF SEC. 6, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000693, 00000000000, 'VIOL. OF SEC. 6, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000694, 00000000000, 'VIOL. OF SEC. 7 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000695, 00000000000, 'VIOL. OF SEC. 7 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000696, 00000000000, 'VIOL. OF SEC. 7 & 15 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000697, 00000000000, 'VIOL. OF SEC. 7 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000698, 00000000000, 'VIOL. OF SEC. 7 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000699, 00000000000, 'VIOL. OF SEC. 7, 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000700, 00000000000, 'VIOL. OF SEC. 86 RA 8550 / VIOL. OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000701, 00000000000, 'VIOL. OF SEC. SEC. 11 & 12 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000702, 00000000000, 'VIOL. OF SEC./ 5, 11 & 12, RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000703, 00000000000, 'VIOL. OF SEC.11 & 12 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000704, 00000000000, 'VIOL. OF SEC.11 & 12 ART.II RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL);
INSERT INTO `cs_violations` (`id`, `violations_category_id`, `name`, `level`, `description`, `RepublicAct`, `min_year`, `max_year`, `min_month`, `max_month`, `min_day`, `max_day`, `status`, `created_on`, `modified_on`) VALUES
(00000000705, 00000000000, 'VIOL. OF SEC.11 & 12 ART.II RA 9165 / VIOL. OF RA 4136', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000706, 00000000000, 'VIOL. OF SEC.11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000707, 00000000000, 'VIOL. OF SEC.11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000708, 00000000000, 'VIOL. OF SEC.11ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000709, 00000000000, 'VIOL. OF SEC.3 NO.4 OF PD 1613', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000710, 00000000000, 'VIOL. OF SEC.5 & 11  ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000711, 00000000000, 'VIOL. OF SEC.5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000712, 00000000000, 'VIOL. OF SEC.5 & 11 ART II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000713, 00000000000, 'VIOL. OF SEC.5 & 11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000714, 00000000000, 'VIOL. OF SEC.5 & 11 ART.II RA 9165 / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000715, 00000000000, 'VIOL. OF SEC.5 & 11 ART.II RA 9165 / QUALIFIED TRESSPASS TO DWELLING (ART.280, PAR 1)', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000716, 00000000000, 'VIOL. OF SEC.5 & 11 ART.II RA 9165 / VIOL. OF RA 10591', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000717, 00000000000, 'VIOL. OF SEC.5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000718, 00000000000, 'VIOL. OF SEC.5 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000719, 00000000000, 'VIOL. OF SEC.5 ART.II RA 9165 / VIOL. OF SEC.32 RA 7166 IN REL. TO COMELEC RES. # 10015 IN REL. TO SEC.29 OF RA 10591 / FRUSTRATED MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000720, 00000000000, 'VIOL. OF SEC.5, 11 & 12 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000721, 00000000000, 'VIOL. OF SEC.5,11, & 12 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000722, 00000000000, 'VIOL. OF SEC.6 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000723, 00000000000, 'VIOL. OF SEC5 & 11 ART.II RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000724, 00000000000, 'VIOL. OIF SEC. 5 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000725, 00000000000, 'VIOL. SEC. 32 RA 7166/VIOL. OF SEC. 6 ART 2 RA 9165/VIOL. OF PD 1866/VIOL. OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000726, 00000000000, 'VIOL. SEC. 5 ART 2 RA 9165 / VIOL. OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000727, 00000000000, 'VIOL.OF RA 10591 / VIOL. OF SEC. 5 ART 2 RA 9165 / VIOL. OF SEC. 11 ART 2 9165 / VIOL. OF SEC. 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000728, 00000000000, 'VIOL.OF SEC. 11 & 12 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000729, 00000000000, 'VIOL.OF SEC. 11 & 12 ART. 2 RA 9165/VIOL. OF RA 8294/ COMELEC RES. NO. 9608', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000730, 00000000000, 'VIOL.OF SEC. 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000731, 00000000000, 'VIOL.OF SEC. 11 ART 2 RA 9165 / VIOL. OF BP BLG 6', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000732, 00000000000, 'VIOL.OF SEC. 11 ART. 2 RA 9165/VIOL. OF PD 1602', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000733, 00000000000, 'VIOL.OF SEC. 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000734, 00000000000, 'VIOL.OF SEC. 5&12 ART.2 RA 9165/VIOL.OF RA 8294/VIOL.OF SEC.21,BP 881IN COM GUN BAN / FRUSTRATED MURDER / MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000735, 00000000000, 'VIOL.OF SEC.5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000736, 00000000000, 'VIOL.OFSEC.5(A)ART)3 IN REL RA 7610/VIOL. OF SEC. 4(A) RA 9775', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000737, 00000000000, 'VIOL;. OF SEC. 5 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000738, 00000000000, 'VIOLATION  OF SEC. 5, RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000739, 00000000000, 'VIOLATION OF  RA 8353', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000740, 00000000000, 'VIOLATION OF ART 3 SEC 5 RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000741, 00000000000, 'VIOLATION OF PD 1866 & MURDER', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000742, 00000000000, 'VIOLATION OF PD 1866 AS AMENDED BY RA 8294 & VIOLATION OF SEC.11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000743, 00000000000, 'VIOLATION OF RA 6539 WITH HOMICIDE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000744, 00000000000, 'VIOLATION OF RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000745, 00000000000, 'VIOLATION OF RA 8294 & RA 7166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000746, 00000000000, 'VIOLATION OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000747, 00000000000, 'VIOLATION OF RA 9516 & VIOLATION OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000748, 00000000000, 'VIOLATION OF SEC 10 RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000749, 00000000000, 'VIOLATION OF SEC 11 & 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000750, 00000000000, 'VIOLATION OF SEC 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000751, 00000000000, 'VIOLATION OF SEC 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000752, 00000000000, 'VIOLATION OF SEC 16 RAM 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000753, 00000000000, 'VIOLATION OF SEC 5 & 11 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000754, 00000000000, 'VIOLATION OF SEC 5 & 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000755, 00000000000, 'VIOLATION OF SEC 5 & 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000756, 00000000000, 'VIOLATION OF SEC 5 ART 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000757, 00000000000, 'VIOLATION OF SEC 5 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000758, 00000000000, 'VIOLATION OF SEC 5 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000759, 00000000000, 'VIOLATION OF SEC 5& 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000760, 00000000000, 'VIOLATION OF SEC 5, 11 & 12 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000761, 00000000000, 'VIOLATION OF SEC 5, RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000762, 00000000000, 'VIOLATION OF SEC 6 & 11 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000763, 00000000000, 'VIOLATION OF SEC 7 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000764, 00000000000, 'VIOLATION OF SEC. 11 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000765, 00000000000, 'VIOLATION OF SEC. 11 & 26, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000766, 00000000000, 'VIOLATION OF SEC. 11 & 5, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000767, 00000000000, 'VIOLATION OF SEC. 11 & 5, ART. 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000768, 00000000000, 'VIOLATION OF SEC. 11 & 5, ART. 2 RA 9166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000769, 00000000000, 'VIOLATION OF SEC. 11 , ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000770, 00000000000, 'VIOLATION OF SEC. 11 ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000771, 00000000000, 'VIOLATION OF SEC. 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000772, 00000000000, 'VIOLATION OF SEC. 11&12, ART. 2 RA 9165 / VIOLATION OF RA 9516 / VIOLATION OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000773, 00000000000, 'VIOLATION OF SEC. 11, 12 & 5, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000774, 00000000000, 'VIOLATION OF SEC. 11, 12 & 5, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000775, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000776, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000777, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000778, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165 & ATTEMPTED MURDER / VIOL. OF PD 1866 AS AMENDED BY. RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000779, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165 & VIOLATION OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000780, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165 & VIOLATION OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000781, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165 / ROBBERY IN AN INHABITED HOUSE', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000782, 00000000000, 'VIOLATION OF SEC. 11, ART. 2 RA 9165/VIOLATION OF ART 151 OF RPC/VIOLATION OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000783, 00000000000, 'VIOLATION OF SEC. 12 & 16, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000784, 00000000000, 'VIOLATION OF SEC. 12 &11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000785, 00000000000, 'VIOLATION OF SEC. 12&11, ART. 2 RA 9165 /  VIOLATION OF PD 1866', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000786, 00000000000, 'VIOLATION OF SEC. 13, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000787, 00000000000, 'VIOLATION OF SEC. 16 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000788, 00000000000, 'VIOLATION OF SEC. 16, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000789, 00000000000, 'VIOLATION OF SEC. 5  ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000790, 00000000000, 'VIOLATION OF SEC. 5 & 11 ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000791, 00000000000, 'VIOLATION OF SEC. 5 & 11 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000792, 00000000000, 'VIOLATION OF SEC. 5 & 11, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000793, 00000000000, 'VIOLATION OF SEC. 5 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000794, 00000000000, 'VIOLATION OF SEC. 5 & 11, ART. 2 RA 9165 & VIOLATION OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000795, 00000000000, 'VIOLATION OF SEC. 5 & 11, ART. 2 RA 9165 / ESTAFA', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000796, 00000000000, 'VIOLATION OF SEC. 5 & 11, ART. 2 RA 9166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000797, 00000000000, 'VIOLATION OF SEC. 5 & 12 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000798, 00000000000, 'VIOLATION OF SEC. 5 & 12, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000799, 00000000000, 'VIOLATION OF SEC. 5 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000800, 00000000000, 'VIOLATION OF SEC. 5 & 2, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000801, 00000000000, 'VIOLATION OF SEC. 5 & 6 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000802, 00000000000, 'VIOLATION OF SEC. 5 &11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000803, 00000000000, 'VIOLATION OF SEC. 5 , ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000804, 00000000000, 'VIOLATION OF SEC. 5 ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000805, 00000000000, 'VIOLATION OF SEC. 5 ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000806, 00000000000, 'VIOLATION OF SEC. 5 ART. 2 RA 9165 / VIOL. OF RA 7610', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000807, 00000000000, 'VIOLATION OF SEC. 5, 11 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000808, 00000000000, 'VIOLATION OF SEC. 5, 11, 12  ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000809, 00000000000, 'VIOLATION OF SEC. 5, 12 & 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000810, 00000000000, 'VIOLATION OF SEC. 5, ART. 2 OF RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000811, 00000000000, 'VIOLATION OF SEC. 5, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000812, 00000000000, 'VIOLATION OF SEC. 5, ART. 2 RA 9166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000813, 00000000000, 'VIOLATION OF SEC. 5, IN REL. TO SEC 26, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000814, 00000000000, 'VIOLATION OF SEC. 5,& 11, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000815, 00000000000, 'VIOLATION OF SEC. 5,& 11, ART. 2 RA 9166', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000816, 00000000000, 'VIOLATION OF SEC. 5,11 &12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000817, 00000000000, 'VIOLATION OF SEC. 6 & 12, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000818, 00000000000, 'VIOLATION OF SEC. 6, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000819, 00000000000, 'VIOLATION OF SEC. 7, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000820, 00000000000, 'VIOLATION OF SEC.16, ART. 2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000821, 00000000000, 'VIOLATION OF SEC.5 ART.2 RA 9165 ', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000822, 00000000000, 'VIOLATION OF SEC5 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000823, 00000000000, 'VIOLATION. OF SEC. 5, ART. 2 RA 9165', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000824, 00000000000, 'VIOLO. OF SEC. 5 & 11, ART. 2 RA 9165/VIOL. OF RA 7166/VIOL. OF RA 8294', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000825, 00000000000, 'VOLATION OF PD 1866 & VIOLATION OF PD 532', '1', '', '', '1', '1', '0', '0', '0', '0', 'active', NULL, NULL),
(00000000826, 00000000000, 'violation1', '1', NULL, NULL, '1', '5', '1', '5', '1', '5', 'active', 1518413511, NULL),
(00000000827, 00000000000, 'Sample Violation', '1', NULL, NULL, '1', '1', '1', '1', '1', '1', 'active', 1518936044, NULL),
(00000000828, 00000000000, 'ABDUCTION W/ RAPE', '1', NULL, NULL, '1', '5', '1', '5', '1', '', 'deleted', 1518998499, NULL),
(00000000829, 00000000000, 'ABDUCTION W/ RAPE', '1', NULL, NULL, '1', '1', '', '', '', '', 'deleted', 1518999163, NULL),
(00000000830, 00000000000, 'asd', '1', NULL, NULL, '1', '5', '', '', '', '', 'active', 1519191600, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cs_violations_categories`
--

CREATE TABLE `cs_violations_categories` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `modified_on` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_violations_categories`
--

INSERT INTO `cs_violations_categories` (`id`, `name`, `description`, `status`, `created_on`, `modified_on`) VALUES
(00000000000, 'Default Category', 'Default Category', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `editrequest`
--

CREATE TABLE `editrequest` (
  `editRequestID` int(11) NOT NULL,
  `requestedBy` int(11) NOT NULL,
  `inmateId` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected','finished') NOT NULL,
  `reason` varchar(250) NOT NULL,
  `judgedBy` int(11) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isRead` tinyint(1) NOT NULL DEFAULT '1',
  `judgedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `inmate_id` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT '192x192.jpg',
  `added_by` int(11) UNSIGNED ZEROFILL NOT NULL,
  `img_set` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate`
--

CREATE TABLE `inmate` (
  `ref_formid` int(11) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `cell_no` varchar(255) NOT NULL,
  `inmate_fname` varchar(255) NOT NULL,
  `inmate_lname` varchar(255) NOT NULL,
  `inmate_mi` varchar(255) NOT NULL,
  `inmate_alias` varchar(255) NOT NULL,
  `status` enum('Active','Released','Transfer','Pending') CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT 'Pending',
  `inmate_type` enum('Pending','Detainee','Convict','Probation') NOT NULL DEFAULT 'Pending',
  `date_detained` datetime NOT NULL,
  `date_convicted` datetime NOT NULL,
  `date_probation` datetime NOT NULL,
  `datetime_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int(2) NOT NULL,
  `added_by` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `inmates_full`
--
CREATE TABLE `inmates_full` (
`inmate_id` varchar(255)
,`cell_no` varchar(255)
,`inmate_fname` varchar(255)
,`inmate_lname` varchar(255)
,`inmate_mi` varchar(255)
,`inmate_alias` varchar(255)
,`status` enum('Active','Released','Transfer','Pending')
,`inmate_type` enum('Pending','Detainee','Convict','Probation')
,`date_detained` datetime
,`date_convicted` datetime
,`date_probation` datetime
,`datetime_added` timestamp
,`added_by` int(11) unsigned zerofill
,`i_is_read` int(2)
,`nationality` varchar(255)
,`inmate_info_status` enum('Single','Married','Widow','Widower')
,`birthdate` date
,`age` int(11)
,`gender` enum('Male','Female','','')
,`born_in` varchar(255)
,`home_add` varchar(255)
,`province_add` varchar(255)
,`occupation` varchar(255)
,`father` varchar(255)
,`mother` varchar(255)
,`relative` varchar(255)
,`address` varchar(255)
,`filename` varchar(255)
,`file_added_by` int(11) unsigned zerofill
,`img_set` enum('0','1')
,`file_no` int(11)
,`taken_by` varchar(255)
,`date` date
,`classified_by` varchar(255)
,`verified_by` varchar(255)
,`r_thumb` varchar(255)
,`r_index` varchar(255)
,`r_middle` varchar(255)
,`r_ring` varchar(255)
,`r_little` varchar(255)
,`l_thumb` varchar(255)
,`l_index` varchar(255)
,`l_middle` varchar(255)
,`l_ring` varchar(255)
,`l_little` varchar(255)
,`l_amp` varchar(255)
,`r_amp` varchar(255)
,`left_thumb` varchar(255)
,`right_thumb` varchar(255)
,`left_hand` varchar(255)
,`right_hand` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `inmate_2d`
--

CREATE TABLE `inmate_2d` (
  `id` int(11) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `x_coor` int(11) NOT NULL,
  `y_coor` int(11) NOT NULL,
  `mark_name` varchar(255) NOT NULL,
  `mark_desc` text NOT NULL,
  `mark_type` enum('G1F','G2F','G3F','G4F','G5F','G6F','G1B','G2B','G3B','G4B','G5B','G6B','G1L','G2L','G3L','G1R','G2R','G3R','B1F','B2F','B3F','B4F','B5F','B6F','B1B','B2B','B3B','B4B','B5B','B6B','B1L','B2L','B3L','B1R','B2R','B3R') NOT NULL,
  `mark_filename` varchar(255) NOT NULL,
  `mark_img_set` int(11) NOT NULL,
  `mark_img_source` varchar(255) NOT NULL,
  `mark_addedby` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `markType` enum('scars','tattoo','birthmark','others') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_auth_visitor`
--

CREATE TABLE `inmate_auth_visitor` (
  `id` bigint(20) NOT NULL,
  `inmate_id` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `added_by` int(10) UNSIGNED ZEROFILL NOT NULL,
  `visit_filename` varchar(255) NOT NULL DEFAULT '192x192.jpg',
  `img_set` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_build`
--

CREATE TABLE `inmate_build` (
  `inmate_id` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `complexion` varchar(255) NOT NULL,
  `build` text NOT NULL,
  `hair` varchar(255) NOT NULL,
  `hair_peculiarities` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_case_info`
--

CREATE TABLE `inmate_case_info` (
  `cid` int(11) NOT NULL,
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
  `case_status` enum('0','1') NOT NULL DEFAULT '0',
  `counts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_conduct_rec`
--

CREATE TABLE `inmate_conduct_rec` (
  `id` int(11) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `date_occur` date NOT NULL,
  `rec_type` enum('Bad Conduct','Good Conduct','','') NOT NULL,
  `punishment` text NOT NULL,
  `cause` text NOT NULL,
  `warden_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `pointValue` int(255) NOT NULL,
  `pointUnit` enum('day','month','year','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_fp`
--

CREATE TABLE `inmate_fp` (
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
  `right_hand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_info`
--

CREATE TABLE `inmate_info` (
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
  `contactpersonnum` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `place` varchar(50) NOT NULL,
  `religion` enum('Roman Catholic,including Catholic Charismatic','Islam','Evangelicals (PCEC)','Iglesia Ni Cristo','Non-Roman Catholic and Protestant (NCCP)','Aglipayan','Seventh-day Adventist','Bible Baptist Church','United Church of Christ in the Philippines','Jehovah''s Witnesses','Other Protestants','Church of Christ','Jesus is Lord Church','Tribal Religions','United Pentecostal Church (Philippines) Inc.','Other Baptists','Philippine Independent Catholic Church','Unión Espiritista Cristiana de Filipinas, Inc.','Church of Jesus Christ of the Latter Day Saints	','Association of Fundamental Baptist Churches in the Philippines','Evangelical Christian Outreach Foundation','None','Convention of the Philippine Baptist Church','Crusaders of the Divine Church of Christ Inc.	','Buddhist','Lutheran Church of the Philippines','Iglesia sa Dios Espiritu Santo Inc.','Philippine Benevolent Missionaries Association','Faith Tabernacle Church (Living Rock Ministries)','Others') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_released`
--

CREATE TABLE `inmate_released` (
  `inmate_id` bigint(20) NOT NULL,
  `date_released` date NOT NULL,
  `type_released` enum('SERVED','PROBATION','SHIPPED','BONDED','ACQUITTED','DISMISSED','DEAD','GCTA','OTHERS') NOT NULL,
  `released_info` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `record` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_transfer`
--

CREATE TABLE `inmate_transfer` (
  `inmate_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `date_of_transfer` date NOT NULL,
  `transfer_to` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `warden_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `record` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `action` varchar(255) NOT NULL,
  `actor` int(11) UNSIGNED ZEROFILL NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `actor`, `time`, `agent`) VALUES
(1, 'Log in', 00000000001, '2018-03-07 08:37:36', 'Chrome  v.64.0.3282.186 on Unknown Windows OS');

-- --------------------------------------------------------

--
-- Table structure for table `logs_court`
--

CREATE TABLE `logs_court` (
  `csAppearanceId` int(11) NOT NULL,
  `logTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `mun_id` int(11) NOT NULL,
  `mun_name` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`mun_id`, `mun_name`, `province`, `status`) VALUES
(1, 'Cebu City', 'Cebu', 'active'),
(2, 'Danao City', 'Cebu', 'deleted'),
(3, 'muni', 'prov', 'deleted'),
(4, 'kj', 'kj', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `tempId` int(11) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `step` enum('2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_mi` varchar(255) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `birthdate` date NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `type` enum('Warden','Warden Administrator','General Administrator','Standard Administrator') NOT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active',
  `user_filename` varchar(255) NOT NULL DEFAULT '192x192.jpg',
  `img_set` enum('0','1') NOT NULL DEFAULT '0',
  `added_by` int(11) UNSIGNED ZEROFILL NOT NULL,
  `position` varchar(255) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `modified_on` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `password`, `email`, `user_fname`, `user_lname`, `user_mi`, `gender`, `birthdate`, `user_address`, `user_contact`, `type`, `status`, `user_filename`, `img_set`, `added_by`, `position`, `last_activity`, `created_on`, `modified_on`) VALUES
(00000000001, 'admin', '08f9ef3c42adfe2fbb0e979604c7eb30aa12705fac8b1a9ead899e67b46fd7348c0041721d2be1d64902b66535380e6ff68ee4ed1e9baebf7a7d3dc4285e5391', 'admin@gmail.com', 'CPDRC', 'Administrator', 'yow', 'Male', '0000-00-00', '0', '09434528795', 'Warden Administrator', 'Active', 'cd03b000d25df96f624c079d814eae33.jpg', '1', 00000000000, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_court`
--
CREATE TABLE `view_court` (
`court_id` int(12)
,`court_name` varchar(102)
);

-- --------------------------------------------------------

--
-- Structure for view `cs_cases_full`
--
DROP TABLE IF EXISTS `cs_cases_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cs_cases_full`  AS  select `c`.`id` AS `case_id`,`c`.`reasons_id` AS `reasons_id`,`c`.`case_no` AS `case_no`,`c`.`created_on` AS `case_created_on`,`c`.`modified_on` AS `case_modified_on`,`c`.`status` AS `case_status`,`c`.`reasons` AS `case_reasons`,`v`.`id` AS `violation_id`,`v`.`id` AS `id`,`v`.`violations_category_id` AS `violations_category_id`,`v`.`name` AS `name`,`v`.`level` AS `level`,`v`.`description` AS `description`,`v`.`RepublicAct` AS `RepublicAct`,`v`.`min_year` AS `min_year`,`v`.`max_year` AS `max_year`,`v`.`min_month` AS `min_month`,`v`.`max_month` AS `max_month`,`v`.`min_day` AS `min_day`,`v`.`max_day` AS `max_day`,`v`.`status` AS `status`,`v`.`created_on` AS `created_on`,`v`.`modified_on` AS `modified_on`,`vc`.`id` AS `violation_category_id`,`vc`.`name` AS `violation_category_name`,`vc`.`description` AS `violation_category_description` from ((`cs_cases` `c` left join `cs_violations` `v` on((`v`.`id` = `c`.`violation_id`))) left join `cs_violations_categories` `vc` on((`vc`.`id` = `v`.`violations_category_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `inmates_full`
--
DROP TABLE IF EXISTS `inmates_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inmates_full`  AS  (select `i`.`inmate_id` AS `inmate_id`,`i`.`cell_no` AS `cell_no`,`i`.`inmate_fname` AS `inmate_fname`,`i`.`inmate_lname` AS `inmate_lname`,`i`.`inmate_mi` AS `inmate_mi`,`i`.`inmate_alias` AS `inmate_alias`,`i`.`status` AS `status`,`i`.`inmate_type` AS `inmate_type`,`i`.`date_detained` AS `date_detained`,`i`.`date_convicted` AS `date_convicted`,`i`.`date_probation` AS `date_probation`,`i`.`datetime_added` AS `datetime_added`,`i`.`added_by` AS `added_by`,`i`.`is_read` AS `i_is_read`,`ii`.`nationality` AS `nationality`,`ii`.`status` AS `inmate_info_status`,`ii`.`birthdate` AS `birthdate`,`ii`.`age` AS `age`,`ii`.`gender` AS `gender`,`ii`.`born_in` AS `born_in`,`ii`.`home_add` AS `home_add`,`ii`.`province_add` AS `province_add`,`ii`.`occupation` AS `occupation`,`ii`.`father` AS `father`,`ii`.`mother` AS `mother`,`ii`.`relative` AS `relative`,`ii`.`address` AS `address`,`f`.`filename` AS `filename`,`f`.`added_by` AS `file_added_by`,`f`.`img_set` AS `img_set`,`ifp`.`file_no` AS `file_no`,`ifp`.`taken_by` AS `taken_by`,`ifp`.`date` AS `date`,`ifp`.`classified_by` AS `classified_by`,`ifp`.`verified_by` AS `verified_by`,`ifp`.`r_thumb` AS `r_thumb`,`ifp`.`r_index` AS `r_index`,`ifp`.`r_middle` AS `r_middle`,`ifp`.`r_ring` AS `r_ring`,`ifp`.`r_little` AS `r_little`,`ifp`.`l_thumb` AS `l_thumb`,`ifp`.`l_index` AS `l_index`,`ifp`.`l_middle` AS `l_middle`,`ifp`.`l_ring` AS `l_ring`,`ifp`.`l_little` AS `l_little`,`ifp`.`l_amp` AS `l_amp`,`ifp`.`r_amp` AS `r_amp`,`ifp`.`left_thumb` AS `left_thumb`,`ifp`.`right_thumb` AS `right_thumb`,`ifp`.`left_hand` AS `left_hand`,`ifp`.`right_hand` AS `right_hand` from (((`inmate` `i` left join `inmate_info` `ii` on((`ii`.`inmate_id` = `i`.`inmate_id`))) left join `file` `f` on((`f`.`inmate_id` = `i`.`inmate_id`))) left join `inmate_fp` `ifp` on((`ifp`.`inmate_id` = `i`.`inmate_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_court`
--
DROP TABLE IF EXISTS `view_court`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_court`  AS  select `a`.`court_id` AS `court_id`,concat(`a`.`court_name`,', ',`b`.`mun_name`) AS `court_name` from (`court` `a` join `municipality` `b` on((`a`.`court_mun` = `b`.`mun_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cell`
--
ALTER TABLE `cell`
  ADD PRIMARY KEY (`cellId`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`),
  ADD KEY `fkey_court_mun` (`court_mun`);

--
-- Indexes for table `cs_administrators`
--
ALTER TABLE `cs_administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_appearance_schedules`
--
ALTER TABLE `cs_appearance_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reason_id` (`reason_id`),
  ADD KEY `fkey_cas_court` (`place`);

--
-- Indexes for table `cs_appearance_schedule_personnels`
--
ALTER TABLE `cs_appearance_schedule_personnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appearance_schedule_id` (`appearance_schedule_id`);

--
-- Indexes for table `cs_cases`
--
ALTER TABLE `cs_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reasons_id` (`reasons_id`),
  ADD KEY `violation_id` (`violation_id`);

--
-- Indexes for table `cs_logs`
--
ALTER TABLE `cs_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_by` (`update_by`);

--
-- Indexes for table `cs_reasons`
--
ALTER TABLE `cs_reasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey_reasons_inmate` (`inmate_id`);

--
-- Indexes for table `cs_sessions`
--
ALTER TABLE `cs_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `cs_users`
--
ALTER TABLE `cs_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_violations`
--
ALTER TABLE `cs_violations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `violations_category_id` (`violations_category_id`);

--
-- Indexes for table `cs_violations_categories`
--
ALTER TABLE `cs_violations_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editrequest`
--
ALTER TABLE `editrequest`
  ADD PRIMARY KEY (`editRequestID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD UNIQUE KEY `inmate_id_2` (`inmate_id`),
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `inmate`
--
ALTER TABLE `inmate`
  ADD PRIMARY KEY (`inmate_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `ref_formid` (`ref_formid`);

--
-- Indexes for table `inmate_2d`
--
ALTER TABLE `inmate_2d`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `inmate_auth_visitor`
--
ALTER TABLE `inmate_auth_visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `inmate_build`
--
ALTER TABLE `inmate_build`
  ADD UNIQUE KEY `inmate_id_2` (`inmate_id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `inmate_case_info`
--
ALTER TABLE `inmate_case_info`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `inmate_id_2` (`inmate_id`);

--
-- Indexes for table `inmate_conduct_rec`
--
ALTER TABLE `inmate_conduct_rec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `warden_id` (`warden_id`);

--
-- Indexes for table `inmate_fp`
--
ALTER TABLE `inmate_fp`
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `inmate_info`
--
ALTER TABLE `inmate_info`
  ADD UNIQUE KEY `inmate_id_2` (`inmate_id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor` (`actor`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`mun_id`),
  ADD UNIQUE KEY `mun_name` (`mun_name`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`tempId`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `added_by` (`added_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cell`
--
ALTER TABLE `cell`
  MODIFY `cellId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cs_administrators`
--
ALTER TABLE `cs_administrators`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_appearance_schedules`
--
ALTER TABLE `cs_appearance_schedules`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_appearance_schedule_personnels`
--
ALTER TABLE `cs_appearance_schedule_personnels`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_cases`
--
ALTER TABLE `cs_cases`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_logs`
--
ALTER TABLE `cs_logs`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_reasons`
--
ALTER TABLE `cs_reasons`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_users`
--
ALTER TABLE `cs_users`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_violations`
--
ALTER TABLE `cs_violations`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=831;
--
-- AUTO_INCREMENT for table `cs_violations_categories`
--
ALTER TABLE `cs_violations_categories`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editrequest`
--
ALTER TABLE `editrequest`
  MODIFY `editRequestID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inmate`
--
ALTER TABLE `inmate`
  MODIFY `ref_formid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inmate_2d`
--
ALTER TABLE `inmate_2d`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inmate_auth_visitor`
--
ALTER TABLE `inmate_auth_visitor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inmate_case_info`
--
ALTER TABLE `inmate_case_info`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inmate_conduct_rec`
--
ALTER TABLE `inmate_conduct_rec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `mun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `court`
--
ALTER TABLE `court`
  ADD CONSTRAINT `fkey_court_mun` FOREIGN KEY (`court_mun`) REFERENCES `municipality` (`mun_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cs_appearance_schedules`
--
ALTER TABLE `cs_appearance_schedules`
  ADD CONSTRAINT `cs_appearance_schedules_ibfk_1` FOREIGN KEY (`reason_id`) REFERENCES `cs_reasons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_appearance_schedule_personnels`
--
ALTER TABLE `cs_appearance_schedule_personnels`
  ADD CONSTRAINT `cs_appearance_schedule_personnels_ibfk_1` FOREIGN KEY (`appearance_schedule_id`) REFERENCES `cs_appearance_schedules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_cases`
--
ALTER TABLE `cs_cases`
  ADD CONSTRAINT `cs_cases_ibfk_1` FOREIGN KEY (`reasons_id`) REFERENCES `cs_reasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cs_cases_ibfk_2` FOREIGN KEY (`violation_id`) REFERENCES `cs_violations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_reasons`
--
ALTER TABLE `cs_reasons`
  ADD CONSTRAINT `fkey_reasons_inmate` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON UPDATE CASCADE;

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

--
-- Constraints for table `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `fk_inmate_id` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
