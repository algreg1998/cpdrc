-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 06:10 AM
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
(1, 1, 500, 'active');

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
(1, 'RTC Branch 1', 1, 'active');

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
,`description` text
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
  `linked_id` varchar(255) NOT NULL,
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
  `status` enum('Active') DEFAULT 'Active',
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
('a8c7df2b32573f396a728cca2baa6ba0', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1518325752, ''),
('bb8e1ac00a61fe039b79df65fe0e5a2e', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1518325752, 'a:5:{s:9:"user_data";s:0:"";s:12:"is_logged_in";b:1;s:9:"user_type";s:20:"Warden Administrator";s:7:"user_id";s:11:"00000000001";s:9:"logged_in";a:6:{s:8:"username";s:5:"admin";s:8:"password";s:128:"08f9ef3c42adfe2fbb0e979604c7eb30aa12705fac8b1a9ead899e67b46fd7348c0041721d2be1d64902b66535380e6ff68ee4ed1e9baebf7a7d3dc4285e5391";s:5:"fname";s:5:"CPDRC";s:5:"lname";s:13:"Administrator";s:4:"type";s:20:"Warden Administrator";s:7:"user_id";s:11:"00000000001";}}');

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
  `description` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `height` float NOT NULL,
  `weight` float NOT NULL,
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
  `counts` int(11) NOT NULL,
  `commencing` varchar(255) NOT NULL,
  `expire_good` date NOT NULL,
  `expire_bad` date NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `case_status` enum('0','1') NOT NULL DEFAULT '0'
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
  `religion` enum() NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `relative` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `contactpersonnum` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_released`
--

CREATE TABLE `inmate_released` (
  `inmate_id` varchar(255) NOT NULL,
  `date_released` date NOT NULL,
  `type_released` enum('SERVED','PROBATION','SHIPPED','BONDED','ACQUITTED','DISMISSED','DEAD','GCTA','OTHERS') NOT NULL,
  `released_info` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `record` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inmate_transfer`
--

CREATE TABLE `inmate_transfer` (
  `inmate_id` varchar(255) NOT NULL,
  `date_of_transfer` date NOT NULL,
  `transfer_to` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `warden_id` bigint(20) UNSIGNED ZEROFILL NOT NULL,
  `record` int(11) NOT NULL
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
(1, 'Log in', 00000000001, '2018-02-11 05:09:18', 'Chrome  v.63.0.3239.132 on Unknown Windows OS');

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
(1, 'Cebu City', 'Cebu', 'active');

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
(00000000001, 'admin', '08f9ef3c42adfe2fbb0e979604c7eb30aa12705fac8b1a9ead899e67b46fd7348c0041721d2be1d64902b66535380e6ff68ee4ed1e9baebf7a7d3dc4285e5391', 'admin@gmail.com', 'CPDRC', 'Administrator', 'yow', 'Male', '0000-00-00', '0', '09434528795', 'Warden Administrator', 'Active', 'cd03b000d25df96f624c079d814eae33.jpg', '1', 00000000000, '', 0, 0, 0),
(00000000002, 'asd', '1320c4dfbcbd404e791276ce5dbef76492dc5421e602948e962c4d95a4b967a56e21a8661e0e33681d3af43ea9680cf2b5d24ef8cfc87df2ba01541e1e4adf7a', '', 'asd', 'asd', 'asd', 'Male', '0000-00-00', 'asdsafasasf', '092343565656', 'Warden', 'Deactive', '192x192.jpg', '1', 00000000001, '', 0, 0, 0),
(00000000003, 'fsa', '5ef4b4a5c101768c80aed959249c7d820e81f5248d383efa7961a5725d8fd3b55df431b1191085def8edd199290ae6a4c802856d19265ec4439cdfa878b83840', '', 'fas', 'fsa', 'fas', 'Male', '0000-00-00', 'fs', 'fsa', 'Warden', 'Active', '192x192.jpg', '1', 00000000001, '', 0, 0, 0);

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
  ADD PRIMARY KEY (`editRequestID`),
  ADD KEY `inmateId` (`inmateId`);

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
-- Indexes for table `inmate_released`
--
ALTER TABLE `inmate_released`
  ADD KEY `inmate_id` (`inmate_id`);

--
-- Indexes for table `inmate_transfer`
--
ALTER TABLE `inmate_transfer`
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
  ADD PRIMARY KEY (`tempId`);

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
  MODIFY `cellId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cs_violations_categories`
--
ALTER TABLE `cs_violations_categories`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `mun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Constraints for table `cs_violations`
--
ALTER TABLE `cs_violations`
  ADD CONSTRAINT `cs_violations_ibfk_1` FOREIGN KEY (`violations_category_id`) REFERENCES `cs_violations_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `editrequest`
--
ALTER TABLE `editrequest`
  ADD CONSTRAINT `fk_in` FOREIGN KEY (`inmateId`) REFERENCES `inmate` (`inmate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_ff` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`added_by`) REFERENCES `user_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `inmate_released`
--
ALTER TABLE `inmate_released`
  ADD CONSTRAINT `fk_inReleased` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `inmate_transfer`
--
ALTER TABLE `inmate_transfer`
  ADD CONSTRAINT `fk_inTrans` FOREIGN KEY (`inmate_id`) REFERENCES `inmate` (`inmate_id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_lg` FOREIGN KEY (`actor`) REFERENCES `user_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
