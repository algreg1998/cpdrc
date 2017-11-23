-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2015 at 12:12 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.22-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpdrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cs_administrators`
--

CREATE TABLE IF NOT EXISTS `cs_administrators` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
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
  `last_activity` int(11) unsigned DEFAULT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cs_administrators`
--

INSERT INTO `cs_administrators` (`id`, `type`, `username`, `password`, `email`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `position`, `photo`, `status`, `last_activity`, `created_on`, `modified_on`) VALUES
(00000000001, 'general', 'admin', '08f9ef3c42adfe2fbb0e979604c7eb30aa12705fac8b1a9ead899e67b46fd7348c0041721d2be1d64902b66535380e6ff68ee4ed1e9baebf7a7d3dc4285e5391', 'admin@cpdrc.com', 'John', 'Mark', 'Doe', 'Male', '1990-01-01', 'Prison Warden', NULL, 'active', 0, 2015, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cs_appearance_schedules`
--

CREATE TABLE IF NOT EXISTS `cs_appearance_schedules` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `reason_id` int(11) unsigned zerofill NOT NULL,
  `date` datetime NOT NULL,
  `place` varchar(255) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `is_read` int(2) NOT NULL DEFAULT '0',
  `time_departed` datetime NOT NULL,
  `time_returned` datetime NOT NULL,
  `remarks` text,
  PRIMARY KEY (`id`),
  KEY `reason_id` (`reason_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_appearance_schedule_personnels`
--

CREATE TABLE IF NOT EXISTS `cs_appearance_schedule_personnels` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `appearance_schedule_id` int(11) unsigned zerofill NOT NULL,
  `type` enum('judge','jail_officer','lawyer') DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appearance_schedule_id` (`appearance_schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_cases`
--

CREATE TABLE IF NOT EXISTS `cs_cases` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `reasons_id` int(11) unsigned zerofill NOT NULL,
  `case_no` varchar(15) NOT NULL,
  `violation_id` int(11) unsigned zerofill NOT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  `s_min_year` varchar(255) DEFAULT NULL,
  `s_max_year` varchar(255) DEFAULT NULL,
  `s_min_month` varchar(255) DEFAULT NULL,
  `s_max_month` varchar(255) DEFAULT NULL,
  `s_min_day` varchar(255) DEFAULT NULL,
  `s_max_day` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `reasons` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reasons_id` (`reasons_id`),
  KEY `violation_id` (`violation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `cs_cases_full`
--
CREATE TABLE IF NOT EXISTS `cs_cases_full` (
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

CREATE TABLE IF NOT EXISTS `cs_logs` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `linked_id` int(11) unsigned zerofill NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `table_field` varchar(255) DEFAULT NULL,
  `subject` text,
  `reasons` text,
  `update_by` int(11) unsigned zerofill NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `update_by` (`update_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_reasons`
--

CREATE TABLE IF NOT EXISTS `cs_reasons` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `inmate_id` varchar(20) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  `type` enum('Detainee','Convict','Probation','Pending') DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `number_of_years` float DEFAULT NULL,
  `number_of_months` float DEFAULT NULL,
  `number_of_days` float DEFAULT NULL,
  `court_order_number` varchar(255) NOT NULL,
  `is_read` int(2) NOT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_sessions`
--

CREATE TABLE IF NOT EXISTS `cs_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_sessions`
--

INSERT INTO `cs_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3b9a9903950de7d8a0e8d7156ed1858b', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 1424963829, ''),
('a3c02bce3151747e56d2fcf0b24e1fc7', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:35.0) Gecko/20100101 Firefox/35.0', 1424963830, '');

-- --------------------------------------------------------

--
-- Table structure for table `cs_users`
--

CREATE TABLE IF NOT EXISTS `cs_users` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `position` enum('judge','lawyer') NOT NULL DEFAULT 'judge',
  `photo` varchar(50) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `last_activity` int(11) unsigned DEFAULT NULL,
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  `deleted_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_violations`
--

CREATE TABLE IF NOT EXISTS `cs_violations` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `violations_category_id` int(11) unsigned zerofill NOT NULL,
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
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `violations_category_id` (`violations_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cs_violations_categories`
--

CREATE TABLE IF NOT EXISTS `cs_violations_categories` (
  `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `status` varchar(200) NOT NULL DEFAULT 'active',
  `created_on` int(11) unsigned DEFAULT NULL,
  `modified_on` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_convicted` datetime NOT NULL,
  `date_probation` datetime NOT NULL,
  `datetime_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int(2) NOT NULL,
  `added_by` int(11) unsigned zerofill NOT NULL,
  PRIMARY KEY (`inmate_id`),
  KEY `added_by` (`added_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `inmates_full`
--
CREATE TABLE IF NOT EXISTS `inmates_full` (
`inmate_id` varchar(255)
,`cell_no` varchar(255)
,`inmate_fname` varchar(255)
,`inmate_lname` varchar(255)
,`inmate_mi` varchar(255)
,`inmate_alias` varchar(255)
,`status` enum('Pending','Detainee','Convict','Probation')
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `username`, `password`, `user_fname`, `user_lname`, `user_mi`, `user_address`, `user_contact`, `type`, `status`, `user_filename`, `img_set`, `added_by`) VALUES
(00000000001, 'admin', 'admin', 'CPDRC', 'Administrator', '', 'Alang-alang Mandaue City', '09434528795', '1', 'Active', '192x192.jpg', '1', 00000000000);

-- --------------------------------------------------------

--
-- Structure for view `cs_cases_full`
--
DROP TABLE IF EXISTS `cs_cases_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cs_cases_full` AS select `c`.`id` AS `case_id`,`c`.`reasons_id` AS `reasons_id`,`c`.`case_no` AS `case_no`,`c`.`created_on` AS `case_created_on`,`c`.`modified_on` AS `case_modified_on`,`c`.`status` AS `case_status`,`c`.`reasons` AS `case_reasons`,`v`.`id` AS `violation_id`,`v`.`id` AS `id`,`v`.`violations_category_id` AS `violations_category_id`,`v`.`name` AS `name`,`v`.`level` AS `level`,`v`.`description` AS `description`,`v`.`RepublicAct` AS `RepublicAct`,`v`.`min_year` AS `min_year`,`v`.`max_year` AS `max_year`,`v`.`min_month` AS `min_month`,`v`.`max_month` AS `max_month`,`v`.`min_day` AS `min_day`,`v`.`max_day` AS `max_day`,`v`.`status` AS `status`,`v`.`created_on` AS `created_on`,`v`.`modified_on` AS `modified_on`,`vc`.`id` AS `violation_category_id`,`vc`.`name` AS `violation_category_name`,`vc`.`description` AS `violation_category_description` from ((`cs_cases` `c` left join `cs_violations` `v` on((`v`.`id` = `c`.`violation_id`))) left join `cs_violations_categories` `vc` on((`vc`.`id` = `v`.`violations_category_id`)));

-- --------------------------------------------------------

--
-- Structure for view `inmates_full`
--
DROP TABLE IF EXISTS `inmates_full`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inmates_full` AS select `i`.`inmate_id` AS `inmate_id`,`i`.`cell_no` AS `cell_no`,`i`.`inmate_fname` AS `inmate_fname`,`i`.`inmate_lname` AS `inmate_lname`,`i`.`inmate_mi` AS `inmate_mi`,`i`.`inmate_alias` AS `inmate_alias`,`i`.`status` AS `status`,`i`.`date_detained` AS `date_detained`,`i`.`date_convicted` AS `date_convicted`,`i`.`date_probation` AS `date_probation`,`i`.`datetime_added` AS `datetime_added`,`i`.`added_by` AS `added_by`,`i`.`is_read` AS `i_is_read`,`ii`.`nationality` AS `nationality`,`ii`.`status` AS `inmate_info_status`,`ii`.`birthdate` AS `birthdate`,`ii`.`age` AS `age`,`ii`.`gender` AS `gender`,`ii`.`born_in` AS `born_in`,`ii`.`home_add` AS `home_add`,`ii`.`province_add` AS `province_add`,`ii`.`occupation` AS `occupation`,`ii`.`father` AS `father`,`ii`.`mother` AS `mother`,`ii`.`relative` AS `relative`,`ii`.`address` AS `address`,`f`.`filename` AS `filename`,`f`.`added_by` AS `file_added_by`,`f`.`img_set` AS `img_set`,`ifp`.`file_no` AS `file_no`,`ifp`.`taken_by` AS `taken_by`,`ifp`.`date` AS `date`,`ifp`.`classified_by` AS `classified_by`,`ifp`.`verified_by` AS `verified_by`,`ifp`.`r_thumb` AS `r_thumb`,`ifp`.`r_index` AS `r_index`,`ifp`.`r_middle` AS `r_middle`,`ifp`.`r_ring` AS `r_ring`,`ifp`.`r_little` AS `r_little`,`ifp`.`l_thumb` AS `l_thumb`,`ifp`.`l_index` AS `l_index`,`ifp`.`l_middle` AS `l_middle`,`ifp`.`l_ring` AS `l_ring`,`ifp`.`l_little` AS `l_little`,`ifp`.`l_amp` AS `l_amp`,`ifp`.`r_amp` AS `r_amp`,`ifp`.`left_thumb` AS `left_thumb`,`ifp`.`right_thumb` AS `right_thumb`,`ifp`.`left_hand` AS `left_hand`,`ifp`.`right_hand` AS `right_hand` from (((`inmate` `i` left join `inmate_info` `ii` on((`ii`.`inmate_id` = `i`.`inmate_id`))) left join `file` `f` on((`f`.`inmate_id` = `i`.`inmate_id`))) left join `inmate_fp` `ifp` on((`ifp`.`inmate_id` = `i`.`inmate_id`)));

--
-- Constraints for dumped tables
--

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
-- Constraints for table `cs_logs`
--
ALTER TABLE `cs_logs`
  ADD CONSTRAINT `cs_logs_ibfk_1` FOREIGN KEY (`update_by`) REFERENCES `cs_administrators` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_violations`
--
ALTER TABLE `cs_violations`
  ADD CONSTRAINT `cs_violations_ibfk_1` FOREIGN KEY (`violations_category_id`) REFERENCES `cs_violations_categories` (`id`) ON DELETE CASCADE;

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
