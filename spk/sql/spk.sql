-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 03:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
`id` int(10) NOT NULL,
  `control_access` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `control_access`, `date_created`, `time_created`) VALUES
(3, 'spk@toxaswift.com', '02/Nov/2016', '2016-11-02 10:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `administratives`
--

CREATE TABLE IF NOT EXISTS `administratives` (
`id` int(10) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `school_motto` varchar(255) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `school_stamp` varchar(255) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administratives`
--

INSERT INTO `administratives` (`id`, `school_name`, `school_motto`, `school_logo`, `school_stamp`, `upload_date`, `upload_time`) VALUES
(3, 'SPK-GUEST HIGH SCHOOL', 'P.O BOX 314 Border Road Ikom, Four Corners Ikom.', 'admin/icon.png', 'admin/sign.png', '30/Dec/2016', '2016-12-30 07:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`id` int(10) NOT NULL,
  `classes` varchar(50) DEFAULT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classes`, `date_added`, `time_added`) VALUES
(6, 'JSS1', '30/Oct/2016', '2016-10-30 12:07:47'),
(7, 'JSS2', '30/Oct/2016', '2016-10-30 12:10:34'),
(8, 'JSS3', '30/Oct/2016', '2016-10-30 12:10:42'),
(12, 'SSS1', '14/Nov/2016', '2016-11-14 17:49:51'),
(13, 'SSS2', '14/Nov/2016', '2016-11-14 17:49:58'),
(15, 'SSS3', '24/Dec/2016', '2016-12-24 18:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `current_season`
--

CREATE TABLE IF NOT EXISTS `current_season` (
`id` int(10) NOT NULL,
  `current_session` varchar(20) DEFAULT NULL,
  `current_term` varchar(50) DEFAULT NULL,
  `date_declared` varchar(50) DEFAULT NULL,
  `time_declared` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_season`
--

INSERT INTO `current_season` (`id`, `current_session`, `current_term`, `date_declared`, `time_declared`) VALUES
(1, '2017/2018', 'First Term', '30/Oct/2016', '2016-10-30 10:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE IF NOT EXISTS `dates` (
`id` int(10) NOT NULL,
  `end_of_term` varchar(50) DEFAULT NULL,
  `next_term_begins` varchar(50) DEFAULT NULL,
  `date_declared` varchar(50) DEFAULT NULL,
  `time_declared` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `end_of_term`, `next_term_begins`, `date_declared`, `time_declared`) VALUES
(2, '21/06/2016', '30/01/2017', '25/Dec/2016', '2016-12-25 11:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `jss`
--

CREATE TABLE IF NOT EXISTS `jss` (
`id` int(10) NOT NULL,
  `jss_subjects` varchar(100) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jss`
--

INSERT INTO `jss` (`id`, `jss_subjects`, `upload_date`, `upload_time`) VALUES
(6, 'Business Studies', '28/Oct/2016', '2016-10-28 03:53:55'),
(7, 'Social Studies', '28/Oct/2016', '2016-10-28 03:54:08'),
(8, 'Physical &amp; Health Education', '28/Oct/2016', '2016-10-28 03:54:14'),
(9, 'Computer Science', '28/Oct/2016', '2016-10-28 03:54:19'),
(10, 'Basic Education', '28/Oct/2016', '2016-10-28 03:54:26'),
(11, 'Civic Education', '28/Oct/2016', '2016-10-28 03:54:32'),
(12, 'Introductory Technology', '28/Oct/2016', '2016-10-28 03:54:36'),
(13, 'Mathematics', '17/Jan/2017', '2017-01-17 17:14:12'),
(14, 'English Language', '17/Jan/2017', '2017-01-17 17:14:21'),
(15, 'Agric Science', '17/Jan/2017', '2017-01-17 17:14:39'),
(16, 'Christian Religious Knowledge', '17/Jan/2017', '2017-01-17 17:14:47'),
(17, 'Home Economics', '17/Jan/2017', '2017-01-17 17:14:53'),
(18, 'French', '17/Jan/2017', '2017-01-17 17:15:29'),
(19, 'Literature in English', '17/Jan/2017', '2017-01-17 17:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `jss_subject_number`
--

CREATE TABLE IF NOT EXISTS `jss_subject_number` (
`id` int(10) NOT NULL,
  `number_of_subject` int(10) DEFAULT NULL,
  `declared_date` varchar(20) DEFAULT NULL,
  `declared_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jss_subject_number`
--

INSERT INTO `jss_subject_number` (`id`, `number_of_subject`, `declared_date`, `declared_time`) VALUES
(1, 14, '01/Nov/2016', '2016-11-01 04:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `pin1`
--

CREATE TABLE IF NOT EXISTS `pin1` (
`id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `first_term_pin` varchar(100) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(20) DEFAULT NULL,
  `upload_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin1`
--

INSERT INTO `pin1` (`id`, `term`, `first_term_pin`, `serial_number`, `upload_date`, `upload_time`) VALUES
(117, 'First Term', '5600421327308683', '201611150', '15/Nov/2016', '2016-11-15 13:49:42'),
(118, 'First Term', '5666700058567830', '201611151', '15/Nov/2016', '2016-11-15 13:49:42'),
(119, 'First Term', '5649491580100306', '201611152', '15/Nov/2016', '2016-11-15 13:49:42'),
(120, 'First Term', '5600340201035503', '201611153', '15/Nov/2016', '2016-11-15 13:49:42'),
(121, 'First Term', '5617802101056891', '201611154', '15/Nov/2016', '2016-11-15 13:49:42'),
(122, 'First Term', '2557006842043119', '201612285', '28/Dec/2016', '2016-12-28 21:33:32'),
(123, 'First Term', '2501820546091791', '201612286', '28/Dec/2016', '2016-12-28 21:33:32'),
(124, 'First Term', '2580984866674062', '201612287', '28/Dec/2016', '2016-12-28 21:33:32'),
(125, 'First Term', '2561773000326001', '201612288', '28/Dec/2016', '2016-12-28 21:33:32'),
(126, 'First Term', '2510656002096728', '201612289', '28/Dec/2016', '2016-12-28 21:33:32'),
(127, 'First Term', '2785362244459115', '2017010710', '07/Jan/2017', '2017-01-07 02:25:37'),
(128, 'First Term', '2740776892870355', '2017010711', '07/Jan/2017', '2017-01-07 02:25:38'),
(129, 'First Term', '2751734360310688', '2017010712', '07/Jan/2017', '2017-01-07 02:25:38'),
(130, 'First Term', '2707064901902435', '2017010713', '07/Jan/2017', '2017-01-07 02:25:38'),
(131, 'First Term', '2758847579452091', '2017010714', '07/Jan/2017', '2017-01-07 02:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `pin2`
--

CREATE TABLE IF NOT EXISTS `pin2` (
`id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `second_term_pin` varchar(100) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(100) DEFAULT NULL,
  `upload_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin2`
--

INSERT INTO `pin2` (`id`, `term`, `second_term_pin`, `serial_number`, `upload_date`, `upload_time`) VALUES
(1, 'Second Term', '5190146863528070', '201612280', '28/Dec/2016', '2016-12-28 19:30:00'),
(2, 'Second Term', '5110500357031177', '201612281', '28/Dec/2016', '2016-12-28 19:30:00'),
(3, 'Second Term', '5150806589009854', '201612282', '28/Dec/2016', '2016-12-28 19:30:00'),
(4, 'Second Term', '5131146222100300', '201612283', '28/Dec/2016', '2016-12-28 19:30:00'),
(5, 'Second Term', '5150980590303490', '201612284', '28/Dec/2016', '2016-12-28 19:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `pin3`
--

CREATE TABLE IF NOT EXISTS `pin3` (
`id` int(10) NOT NULL,
  `term` varchar(20) DEFAULT NULL,
  `third_term_pin` varchar(50) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin3`
--

INSERT INTO `pin3` (`id`, `term`, `third_term_pin`, `serial_number`, `upload_date`, `upload_time`) VALUES
(1, 'Third Term', '0800454004047740', '201612270', '27/Dec/2016', '2016-12-27 21:55:18'),
(2, 'Third Term', '0895194680531030', '201612271', '27/Dec/2016', '2016-12-27 21:55:18'),
(3, 'Third Term', '0871820060407711', '201612272', '27/Dec/2016', '2016-12-27 21:55:18'),
(4, 'Third Term', '0871811000228932', '201612273', '27/Dec/2016', '2016-12-27 21:55:18'),
(5, 'Third Term', '0848036229996587', '201612274', '27/Dec/2016', '2016-12-27 21:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
`id` int(10) NOT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `students_sub_total` int(50) DEFAULT NULL,
  `students_sub_average` float(11,3) DEFAULT NULL,
  `class_position` int(10) DEFAULT NULL,
  `upload_date` varchar(20) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `reg_number`, `name`, `class`, `term`, `session`, `students_sub_total`, `students_sub_average`, `class_position`, `upload_date`, `upload_time`) VALUES
(1, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'First Term', '2017/2018', 696, 77.333, 3, '20/Jan/2017', '2017-01-20 00:50:19'),
(2, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'First Term', '2017/2018', 653, 72.556, 8, '20/Jan/2017', '2017-01-20 00:50:20'),
(3, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'First Term', '2017/2018', 640, 71.111, 9, '20/Jan/2017', '2017-01-20 00:50:20'),
(4, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'First Term', '2017/2018', 691, 76.778, 4, '20/Jan/2017', '2017-01-20 00:50:20'),
(5, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'First Term', '2017/2018', 720, 80.000, 2, '20/Jan/2017', '2017-01-20 00:50:20'),
(6, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'First Term', '2017/2018', 686, 76.222, 6, '20/Jan/2017', '2017-01-20 00:50:21'),
(7, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'First Term', '2017/2018', 600, 66.667, 10, '20/Jan/2017', '2017-01-20 00:50:21'),
(8, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'First Term', '2017/2018', 681, 75.667, 7, '20/Jan/2017', '2017-01-20 00:50:21'),
(9, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'First Term', '2017/2018', 757, 84.111, 1, '20/Jan/2017', '2017-01-20 00:50:22'),
(10, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'First Term', '2017/2018', 687, 76.333, 5, '20/Jan/2017', '2017-01-20 00:50:22'),
(11, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'First Term', '2017/2018', 608, 67.556, 10, '20/Jan/2017', '2017-01-20 01:24:06'),
(12, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'First Term', '2017/2018', 675, 75.000, 3, '20/Jan/2017', '2017-01-20 01:24:06'),
(13, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'First Term', '2017/2018', 682, 75.778, 1, '20/Jan/2017', '2017-01-20 01:24:06'),
(14, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'First Term', '2017/2018', 647, 71.889, 6, '20/Jan/2017', '2017-01-20 01:24:07'),
(15, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'First Term', '2017/2018', 639, 71.000, 7, '20/Jan/2017', '2017-01-20 01:24:07'),
(16, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'First Term', '2017/2018', 647, 71.889, 5, '20/Jan/2017', '2017-01-20 01:24:07'),
(17, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'First Term', '2017/2018', 676, 75.111, 2, '20/Jan/2017', '2017-01-20 01:24:08'),
(18, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'First Term', '2017/2018', 657, 73.000, 4, '20/Jan/2017', '2017-01-20 01:24:08'),
(19, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'First Term', '2017/2018', 618, 68.667, 9, '20/Jan/2017', '2017-01-20 01:24:09'),
(20, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'First Term', '2017/2018', 636, 70.667, 8, '20/Jan/2017', '2017-01-20 01:24:10'),
(21, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'First Term', '2017/2018', 582, 64.667, 8, '20/Jan/2017', '2017-01-20 01:58:43'),
(22, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'First Term', '2017/2018', 633, 70.333, 3, '20/Jan/2017', '2017-01-20 01:58:44'),
(23, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'First Term', '2017/2018', 643, 71.444, 2, '20/Jan/2017', '2017-01-20 01:58:44'),
(24, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'First Term', '2017/2018', 616, 68.444, 6, '20/Jan/2017', '2017-01-20 01:58:44'),
(25, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'First Term', '2017/2018', 680, 75.556, 1, '20/Jan/2017', '2017-01-20 01:58:44'),
(26, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'First Term', '2017/2018', 603, 67.000, 7, '20/Jan/2017', '2017-01-20 01:58:44'),
(27, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'First Term', '2017/2018', 623, 69.222, 4, '20/Jan/2017', '2017-01-20 01:58:45'),
(28, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'First Term', '2017/2018', 578, 64.222, 9, '20/Jan/2017', '2017-01-20 01:58:46'),
(29, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'First Term', '2017/2018', 535, 59.444, 10, '20/Jan/2017', '2017-01-20 01:58:46'),
(30, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'First Term', '2017/2018', 619, 68.778, 5, '20/Jan/2017', '2017-01-20 01:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `results1`
--

CREATE TABLE IF NOT EXISTS `results1` (
`id` int(10) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `ca` int(10) DEFAULT NULL,
  `project` int(10) DEFAULT NULL,
  `exam` int(10) DEFAULT NULL,
  `subject_total` int(10) DEFAULT NULL,
  `subject_rank` int(10) DEFAULT NULL,
  `date_of_upload` varchar(20) DEFAULT NULL,
  `time_of_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results1`
--

INSERT INTO `results1` (`id`, `class`, `term`, `session`, `reg_number`, `name`, `subjects`, `ca`, `project`, `exam`, `subject_total`, `subject_rank`, `date_of_upload`, `time_of_upload`) VALUES
(1, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'English Language', 30, 8, 42, 80, 4, '20/Jan/2017', '2017-01-20 00:25:56'),
(2, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'English Language', 20, 5, 35, 60, 9, '20/Jan/2017', '2017-01-20 00:25:56'),
(3, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'English Language', 25, 10, 50, 85, 3, '20/Jan/2017', '2017-01-20 00:25:56'),
(4, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'English Language', 18, 9, 49, 76, 3, '20/Jan/2017', '2017-01-20 00:25:56'),
(5, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'English Language', 19, 9, 52, 80, 4, '20/Jan/2017', '2017-01-20 00:25:56'),
(6, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'English Language', 22, 7, 51, 80, 4, '20/Jan/2017', '2017-01-20 00:25:56'),
(7, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'English Language', 21, 5, 42, 68, 4, '20/Jan/2017', '2017-01-20 00:25:56'),
(8, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'English Language', 30, 8, 55, 93, 1, '20/Jan/2017', '2017-01-20 00:25:56'),
(9, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'English Language', 30, 8, 52, 90, 1, '20/Jan/2017', '2017-01-20 00:25:56'),
(10, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'English Language', 29, 8, 55, 92, 1, '20/Jan/2017', '2017-01-20 00:25:56'),
(11, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Mathematics', 21, 10, 50, 81, 3, '20/Jan/2017', '2017-01-20 00:28:31'),
(12, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Mathematics', 22, 8, 42, 72, 5, '20/Jan/2017', '2017-01-20 00:28:31'),
(13, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Mathematics', 18, 9, 50, 77, 2, '20/Jan/2017', '2017-01-20 00:28:31'),
(14, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Mathematics', 11, 6, 42, 59, 10, '20/Jan/2017', '2017-01-20 00:28:31'),
(15, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Mathematics', 12, 5, 38, 55, 10, '20/Jan/2017', '2017-01-20 00:28:31'),
(16, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Mathematics', 18, 8, 40, 66, 7, '20/Jan/2017', '2017-01-20 00:28:31'),
(17, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Mathematics', 20, 6, 50, 76, 3, '20/Jan/2017', '2017-01-20 00:28:31'),
(18, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Mathematics', 8, 4, 30, 42, 10, '20/Jan/2017', '2017-01-20 00:28:31'),
(19, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Mathematics', 0, 10, 50, 60, 9, '20/Jan/2017', '2017-01-20 00:28:31'),
(20, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Mathematics', 30, 9, 55, 94, 1, '20/Jan/2017', '2017-01-20 00:28:31'),
(21, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Biology', 25, 7, 45, 77, 2, '20/Jan/2017', '2017-01-20 00:31:14'),
(22, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Biology', 20, 10, 50, 80, 4, '20/Jan/2017', '2017-01-20 00:31:14'),
(23, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Biology', 18, 9, 48, 75, 1, '20/Jan/2017', '2017-01-20 00:31:14'),
(24, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Biology', 16, 10, 40, 66, 7, '20/Jan/2017', '2017-01-20 00:31:14'),
(25, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Biology', 17, 8, 52, 77, 2, '20/Jan/2017', '2017-01-20 00:31:14'),
(26, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Biology', 25, 9, 45, 79, 2, '20/Jan/2017', '2017-01-20 00:31:14'),
(27, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Biology', 30, 10, 52, 92, 1, '20/Jan/2017', '2017-01-20 00:31:14'),
(28, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Biology', 15, 10, 50, 75, 1, '20/Jan/2017', '2017-01-20 00:31:14'),
(29, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Biology', 18, 5, 45, 68, 4, '20/Jan/2017', '2017-01-20 00:31:14'),
(30, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Biology', 20, 10, 50, 80, 4, '20/Jan/2017', '2017-01-20 00:31:14'),
(31, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Agric Science', 28, 10, 58, 96, 1, '20/Jan/2017', '2017-01-20 00:34:13'),
(32, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Agric Science', 16, 9, 48, 73, 4, '20/Jan/2017', '2017-01-20 00:34:13'),
(33, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Agric Science', 11, 10, 50, 71, 6, '20/Jan/2017', '2017-01-20 00:34:13'),
(34, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Agric Science', 25, 5, 50, 80, 4, '20/Jan/2017', '2017-01-20 00:34:13'),
(35, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Agric Science', 28, 8, 48, 84, 3, '20/Jan/2017', '2017-01-20 00:34:13'),
(36, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Agric Science', 20, 9, 37, 66, 7, '20/Jan/2017', '2017-01-20 00:34:13'),
(37, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Agric Science', 26, 6, 36, 68, 4, '20/Jan/2017', '2017-01-20 00:34:13'),
(38, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Agric Science', 15, 10, 46, 71, 6, '20/Jan/2017', '2017-01-20 00:34:13'),
(39, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Agric Science', 26, 9, 50, 85, 3, '20/Jan/2017', '2017-01-20 00:34:13'),
(40, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Agric Science', 30, 8, 45, 83, 2, '20/Jan/2017', '2017-01-20 00:34:13'),
(41, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Economics', 29, 9, 52, 90, 1, '20/Jan/2017', '2017-01-20 00:37:11'),
(42, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Economics', 28, 7, 41, 76, 3, '20/Jan/2017', '2017-01-20 00:37:11'),
(43, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Economics', 19, 10, 50, 79, 2, '20/Jan/2017', '2017-01-20 00:37:11'),
(44, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Economics', 18, 9, 49, 76, 3, '20/Jan/2017', '2017-01-20 00:37:11'),
(45, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Economics', 20, 8, 48, 76, 3, '20/Jan/2017', '2017-01-20 00:37:11'),
(46, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Economics', 21, 9, 45, 75, 1, '20/Jan/2017', '2017-01-20 00:37:11'),
(47, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Economics', 22, 8, 37, 67, 8, '20/Jan/2017', '2017-01-20 00:37:11'),
(48, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Economics', 23, 6, 42, 71, 6, '20/Jan/2017', '2017-01-20 00:37:11'),
(49, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Economics', 15, 5, 39, 59, 10, '20/Jan/2017', '2017-01-20 00:37:11'),
(50, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Economics', 20, 10, 60, 90, 1, '20/Jan/2017', '2017-01-20 00:37:11'),
(51, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Christian Religious Education', 25, 8, 32, 65, 8, '20/Jan/2017', '2017-01-20 00:40:13'),
(52, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Christian Religious Education', 19, 10, 45, 74, 2, '20/Jan/2017', '2017-01-20 00:40:13'),
(53, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Christian Religious Education', 20, 10, 40, 70, 2, '20/Jan/2017', '2017-01-20 00:40:13'),
(54, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Christian Religious Education', 21, 8, 47, 76, 3, '20/Jan/2017', '2017-01-20 00:40:13'),
(55, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Christian Religious Education', 27, 6, 47, 80, 4, '20/Jan/2017', '2017-01-20 00:40:13'),
(56, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Christian Religious Education', 18, 10, 58, 86, 2, '20/Jan/2017', '2017-01-20 00:40:13'),
(57, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Christian Religious Education', 11, 10, 58, 79, 2, '20/Jan/2017', '2017-01-20 00:40:13'),
(58, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Christian Religious Education', 17, 8, 40, 65, 8, '20/Jan/2017', '2017-01-20 00:40:13'),
(59, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Christian Religious Education', 22, 10, 41, 73, 4, '20/Jan/2017', '2017-01-20 00:40:13'),
(60, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Christian Religious Education', 28, 9, 57, 94, 1, '20/Jan/2017', '2017-01-20 00:40:13'),
(61, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Commerce', 18, 9, 50, 77, 2, '20/Jan/2017', '2017-01-20 00:42:42'),
(62, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Commerce', 22, 8, 49, 79, 2, '20/Jan/2017', '2017-01-20 00:42:42'),
(63, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Commerce', 23, 7, 33, 63, 6, '20/Jan/2017', '2017-01-20 00:42:42'),
(64, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Commerce', 19, 4, 32, 55, 10, '20/Jan/2017', '2017-01-20 00:42:42'),
(65, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Commerce', 25, 6, 53, 84, 3, '20/Jan/2017', '2017-01-20 00:42:42'),
(66, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Commerce', 28, 9, 58, 95, 1, '20/Jan/2017', '2017-01-20 00:42:42'),
(67, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Commerce', 30, 8, 42, 80, 4, '20/Jan/2017', '2017-01-20 00:42:42'),
(68, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Commerce', 23, 6, 39, 68, 4, '20/Jan/2017', '2017-01-20 00:42:42'),
(69, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Commerce', 24, 8, 43, 75, 1, '20/Jan/2017', '2017-01-20 00:42:42'),
(70, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Commerce', 25, 5, 33, 63, 6, '20/Jan/2017', '2017-01-20 00:42:42'),
(71, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Accounting', 11, 4, 41, 56, 10, '20/Jan/2017', '2017-01-20 00:45:44'),
(72, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Accounting', 29, 10, 59, 98, 1, '20/Jan/2017', '2017-01-20 00:45:44'),
(73, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Accounting', 16, 3, 30, 49, 10, '20/Jan/2017', '2017-01-20 00:45:44'),
(74, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Accounting', 24, 6, 37, 67, 8, '20/Jan/2017', '2017-01-20 00:45:44'),
(75, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Accounting', 25, 6, 39, 70, 2, '20/Jan/2017', '2017-01-20 00:45:44'),
(76, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Accounting', 30, 9, 48, 87, 1, '20/Jan/2017', '2017-01-20 00:45:44'),
(77, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Accounting', 30, 9, 46, 85, 3, '20/Jan/2017', '2017-01-20 00:45:44'),
(78, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Accounting', 18, 8, 53, 79, 2, '20/Jan/2017', '2017-01-20 00:45:44'),
(79, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Accounting', 19, 7, 49, 75, 1, '20/Jan/2017', '2017-01-20 00:45:44'),
(80, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Accounting', 27, 5, 53, 85, 3, '20/Jan/2017', '2017-01-20 00:45:44'),
(81, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'Government', 15, 10, 49, 74, 2, '20/Jan/2017', '2017-01-20 00:48:33'),
(82, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'Government', 16, 9, 50, 75, 1, '20/Jan/2017', '2017-01-20 00:48:33'),
(83, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'Government', 24, 10, 50, 84, 3, '20/Jan/2017', '2017-01-20 00:48:33'),
(84, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'Government', 26, 8, 51, 85, 3, '20/Jan/2017', '2017-01-20 00:48:33'),
(85, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'Government', 27, 9, 49, 85, 3, '20/Jan/2017', '2017-01-20 00:48:33'),
(86, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'Government', 18, 10, 58, 86, 2, '20/Jan/2017', '2017-01-20 00:48:33'),
(87, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'Government', 20, 5, 46, 71, 6, '20/Jan/2017', '2017-01-20 00:48:33'),
(88, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'Government', 5, 5, 26, 36, 10, '20/Jan/2017', '2017-01-20 00:48:33'),
(89, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'Government', 29, 9, 58, 96, 1, '20/Jan/2017', '2017-01-20 00:48:33'),
(90, 'SSS1', 'First Term', '2017/2018', '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'Government', 22, 6, 48, 76, 3, '20/Jan/2017', '2017-01-20 00:48:33'),
(91, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'English Language', 20, 9, 40, 69, 3, '20/Jan/2017', '2017-01-20 01:01:04'),
(92, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'English Language', 21, 8, 52, 81, 3, '20/Jan/2017', '2017-01-20 01:01:04'),
(93, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'English Language', 30, 10, 50, 90, 1, '20/Jan/2017', '2017-01-20 01:01:04'),
(94, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'English Language', 28, 6, 49, 83, 2, '20/Jan/2017', '2017-01-20 01:01:04'),
(95, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'English Language', 25, 5, 52, 82, 3, '20/Jan/2017', '2017-01-20 01:01:04'),
(96, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'English Language', 16, 8, 48, 72, 5, '20/Jan/2017', '2017-01-20 01:01:04'),
(97, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'English Language', 20, 8, 53, 81, 3, '20/Jan/2017', '2017-01-20 01:01:04'),
(98, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'English Language', 21, 9, 57, 87, 1, '20/Jan/2017', '2017-01-20 01:01:04'),
(99, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'English Language', 11, 6, 42, 59, 10, '20/Jan/2017', '2017-01-20 01:01:04'),
(100, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'English Language', 18, 7, 48, 73, 4, '20/Jan/2017', '2017-01-20 01:01:04'),
(101, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Mathematics', 25, 9, 50, 84, 3, '20/Jan/2017', '2017-01-20 01:03:26'),
(102, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Mathematics', 25, 8, 53, 86, 2, '20/Jan/2017', '2017-01-20 01:03:26'),
(103, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Mathematics', 18, 7, 49, 74, 2, '20/Jan/2017', '2017-01-20 01:03:26'),
(104, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Mathematics', 22, 8, 35, 65, 8, '20/Jan/2017', '2017-01-20 01:03:26'),
(105, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Mathematics', 23, 8, 48, 79, 2, '20/Jan/2017', '2017-01-20 01:03:26'),
(106, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Mathematics', 14, 4, 33, 51, 10, '20/Jan/2017', '2017-01-20 01:03:26'),
(107, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Mathematics', 18, 7, 50, 75, 1, '20/Jan/2017', '2017-01-20 01:03:26'),
(108, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Mathematics', 19, 5, 31, 55, 10, '20/Jan/2017', '2017-01-20 01:03:26'),
(109, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Mathematics', 20, 6, 39, 65, 8, '20/Jan/2017', '2017-01-20 01:03:26'),
(110, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Mathematics', 23, 10, 40, 73, 4, '20/Jan/2017', '2017-01-20 01:03:26'),
(111, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Biology', 20, 10, 40, 70, 2, '20/Jan/2017', '2017-01-20 01:06:01'),
(112, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Biology', 16, 7, 32, 55, 10, '20/Jan/2017', '2017-01-20 01:06:01'),
(113, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Biology', 19, 8, 41, 68, 4, '20/Jan/2017', '2017-01-20 01:06:01'),
(114, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Biology', 20, 9, 53, 82, 3, '20/Jan/2017', '2017-01-20 01:06:01'),
(115, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Biology', 28, 5, 36, 69, 3, '20/Jan/2017', '2017-01-20 01:06:01'),
(116, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Biology', 19, 8, 43, 70, 2, '20/Jan/2017', '2017-01-20 01:06:01'),
(117, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Biology', 26, 7, 47, 80, 4, '20/Jan/2017', '2017-01-20 01:06:01'),
(118, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Biology', 28, 5, 49, 82, 3, '20/Jan/2017', '2017-01-20 01:06:01'),
(119, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Biology', 30, 9, 51, 90, 1, '20/Jan/2017', '2017-01-20 01:06:01'),
(120, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Biology', 16, 4, 50, 70, 2, '20/Jan/2017', '2017-01-20 01:06:01'),
(121, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Agric Science', 10, 10, 40, 60, 9, '20/Jan/2017', '2017-01-20 01:08:10'),
(122, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Agric Science', 20, 9, 48, 77, 2, '20/Jan/2017', '2017-01-20 01:08:10'),
(123, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Agric Science', 21, 8, 41, 70, 2, '20/Jan/2017', '2017-01-20 01:08:10'),
(124, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Agric Science', 22, 7, 53, 82, 3, '20/Jan/2017', '2017-01-20 01:08:10'),
(125, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Agric Science', 20, 7, 49, 76, 3, '20/Jan/2017', '2017-01-20 01:08:10'),
(126, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Agric Science', 21, 8, 53, 82, 3, '20/Jan/2017', '2017-01-20 01:08:10'),
(127, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Agric Science', 27, 7, 47, 81, 3, '20/Jan/2017', '2017-01-20 01:08:10'),
(128, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Agric Science', 21, 5, 56, 82, 3, '20/Jan/2017', '2017-01-20 01:08:10'),
(129, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Agric Science', 18, 5, 43, 66, 7, '20/Jan/2017', '2017-01-20 01:08:10'),
(130, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Agric Science', 15, 7, 37, 59, 10, '20/Jan/2017', '2017-01-20 01:08:10'),
(131, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Christian Religious Education', 23, 9, 48, 80, 4, '20/Jan/2017', '2017-01-20 01:11:18'),
(132, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Christian Religious Education', 22, 8, 42, 72, 5, '20/Jan/2017', '2017-01-20 01:11:18'),
(133, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Christian Religious Education', 16, 7, 51, 74, 2, '20/Jan/2017', '2017-01-20 01:11:18'),
(134, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Christian Religious Education', 18, 9, 37, 64, 5, '20/Jan/2017', '2017-01-20 01:11:18'),
(135, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Christian Religious Education', 15, 5, 42, 62, 6, '20/Jan/2017', '2017-01-20 01:11:18'),
(136, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Christian Religious Education', 17, 6, 52, 75, 1, '20/Jan/2017', '2017-01-20 01:11:18'),
(137, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Christian Religious Education', 18, 9, 40, 67, 8, '20/Jan/2017', '2017-01-20 01:11:18'),
(138, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Christian Religious Education', 16, 10, 30, 56, 10, '20/Jan/2017', '2017-01-20 01:11:18'),
(139, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Christian Religious Education', 22, 10, 31, 63, 6, '20/Jan/2017', '2017-01-20 01:11:18'),
(140, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Christian Religious Education', 15, 5, 20, 40, 10, '20/Jan/2017', '2017-01-20 01:11:18'),
(141, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Commerce', 11, 6, 35, 52, 10, '20/Jan/2017', '2017-01-20 01:15:18'),
(142, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Commerce', 16, 7, 39, 62, 6, '20/Jan/2017', '2017-01-20 01:15:18'),
(143, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Commerce', 17, 10, 40, 67, 8, '20/Jan/2017', '2017-01-20 01:15:18'),
(144, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Commerce', 22, 9, 39, 70, 2, '20/Jan/2017', '2017-01-20 01:15:18'),
(145, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Commerce', 25, 10, 42, 77, 2, '20/Jan/2017', '2017-01-20 01:15:18'),
(146, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Commerce', 26, 9, 51, 86, 2, '20/Jan/2017', '2017-01-20 01:15:18'),
(147, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Commerce', 27, 8, 49, 84, 3, '20/Jan/2017', '2017-01-20 01:15:18'),
(148, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Commerce', 30, 5, 59, 94, 1, '20/Jan/2017', '2017-01-20 01:15:18'),
(149, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Commerce', 26, 7, 48, 81, 3, '20/Jan/2017', '2017-01-20 01:15:18'),
(150, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Commerce', 30, 8, 40, 78, 1, '20/Jan/2017', '2017-01-20 01:15:18'),
(151, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Government', 10, 5, 28, 43, 10, '20/Jan/2017', '2017-01-20 01:17:46'),
(152, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Government', 18, 6, 30, 54, 10, '20/Jan/2017', '2017-01-20 01:17:46'),
(153, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Government', 22, 9, 39, 70, 2, '20/Jan/2017', '2017-01-20 01:17:46'),
(154, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Government', 30, 7, 48, 85, 3, '20/Jan/2017', '2017-01-20 01:17:46'),
(155, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Government', 14, 9, 40, 63, 6, '20/Jan/2017', '2017-01-20 01:17:46'),
(156, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Government', 20, 10, 30, 60, 9, '20/Jan/2017', '2017-01-20 01:17:46'),
(157, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Government', 16, 8, 42, 66, 7, '20/Jan/2017', '2017-01-20 01:17:46'),
(158, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Government', 22, 9, 50, 81, 3, '20/Jan/2017', '2017-01-20 01:17:46'),
(159, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Government', 23, 8, 53, 84, 3, '20/Jan/2017', '2017-01-20 01:17:46'),
(160, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Government', 16, 9, 47, 72, 5, '20/Jan/2017', '2017-01-20 01:17:46'),
(161, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Economics', 19, 9, 38, 66, 7, '20/Jan/2017', '2017-01-20 01:20:06'),
(162, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Economics', 20, 9, 47, 76, 3, '20/Jan/2017', '2017-01-20 01:20:06'),
(163, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Economics', 25, 7, 41, 73, 4, '20/Jan/2017', '2017-01-20 01:20:06'),
(164, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Economics', 15, 10, 39, 64, 5, '20/Jan/2017', '2017-01-20 01:20:06'),
(165, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Economics', 16, 8, 50, 74, 2, '20/Jan/2017', '2017-01-20 01:20:06'),
(166, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Economics', 23, 6, 44, 73, 4, '20/Jan/2017', '2017-01-20 01:20:06'),
(167, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Economics', 16, 3, 29, 48, 10, '20/Jan/2017', '2017-01-20 01:20:06'),
(168, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Economics', 18, 10, 44, 72, 5, '20/Jan/2017', '2017-01-20 01:20:06'),
(169, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Economics', 19, 8, 52, 79, 2, '20/Jan/2017', '2017-01-20 01:20:06'),
(170, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Economics', 25, 10, 48, 83, 2, '20/Jan/2017', '2017-01-20 01:20:06'),
(171, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'Literature', 22, 10, 52, 84, 3, '20/Jan/2017', '2017-01-20 01:23:01'),
(172, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'Literature', 16, 9, 48, 73, 4, '20/Jan/2017', '2017-01-20 01:23:01'),
(173, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'Literature', 30, 9, 50, 89, 1, '20/Jan/2017', '2017-01-20 01:23:01'),
(174, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'Literature', 28, 8, 51, 87, 1, '20/Jan/2017', '2017-01-20 01:23:01'),
(175, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'Literature', 16, 7, 42, 65, 8, '20/Jan/2017', '2017-01-20 01:23:01'),
(176, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'Literature', 15, 10, 45, 70, 2, '20/Jan/2017', '2017-01-20 01:23:01'),
(177, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME6', 'Daya Staga', 'Literature', 22, 5, 38, 65, 8, '20/Jan/2017', '2017-01-20 01:23:01'),
(178, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'Literature', 19, 7, 41, 67, 8, '20/Jan/2017', '2017-01-20 01:23:01'),
(179, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'Literature', 23, 8, 39, 70, 2, '20/Jan/2017', '2017-01-20 01:23:01'),
(180, 'SSS2', 'First Term', '2017/2018', '20178SSS2SCHOOLNAME9', 'Egbo John', 'Literature', 20, 10, 40, 70, 2, '20/Jan/2017', '2017-01-20 01:23:01'),
(181, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Further Maths', 15, 4, 32, 51, 10, '20/Jan/2017', '2017-01-20 01:29:38'),
(182, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Further Maths', 18, 7, 41, 66, 7, '20/Jan/2017', '2017-01-20 01:29:38'),
(183, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Further Maths', 20, 5, 40, 65, 8, '20/Jan/2017', '2017-01-20 01:29:38'),
(184, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Further Maths', 15, 7, 39, 61, 9, '20/Jan/2017', '2017-01-20 01:29:38'),
(185, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Further Maths', 16, 4, 42, 62, 6, '20/Jan/2017', '2017-01-20 01:29:38'),
(186, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Further Maths', 15, 8, 30, 53, 10, '20/Jan/2017', '2017-01-20 01:29:38'),
(187, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Further Maths', 22, 6, 33, 61, 9, '20/Jan/2017', '2017-01-20 01:29:38'),
(188, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Further Maths', 28, 9, 48, 85, 3, '20/Jan/2017', '2017-01-20 01:29:38'),
(189, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Further Maths', 10, 0, 22, 32, 10, '20/Jan/2017', '2017-01-20 01:29:38'),
(190, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Further Maths', 8, 1, 18, 27, 10, '20/Jan/2017', '2017-01-20 01:29:38'),
(191, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Mathematics', 20, 10, 30, 60, 9, '20/Jan/2017', '2017-01-20 01:34:10'),
(192, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Mathematics', 15, 9, 38, 62, 6, '20/Jan/2017', '2017-01-20 01:34:10'),
(193, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Mathematics', 17, 8, 40, 65, 8, '20/Jan/2017', '2017-01-20 01:34:10'),
(194, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Mathematics', 19, 8, 41, 68, 4, '20/Jan/2017', '2017-01-20 01:34:10'),
(195, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Mathematics', 25, 10, 52, 87, 1, '20/Jan/2017', '2017-01-20 01:34:10'),
(196, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Mathematics', 19, 8, 49, 76, 3, '20/Jan/2017', '2017-01-20 01:34:10'),
(197, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Mathematics', 28, 7, 51, 86, 2, '20/Jan/2017', '2017-01-20 01:34:10'),
(198, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Mathematics', 19, 9, 49, 77, 2, '20/Jan/2017', '2017-01-20 01:34:10'),
(199, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Mathematics', 16, 8, 56, 80, 4, '20/Jan/2017', '2017-01-20 01:34:10'),
(200, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Mathematics', 10, 1, 21, 32, 10, '20/Jan/2017', '2017-01-20 01:34:10'),
(201, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'English Language', 30, 10, 50, 90, 1, '20/Jan/2017', '2017-01-20 01:37:17'),
(202, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'English Language', 16, 8, 48, 72, 5, '20/Jan/2017', '2017-01-20 01:37:17'),
(203, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'English Language', 22, 8, 49, 79, 2, '20/Jan/2017', '2017-01-20 01:37:17'),
(204, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'English Language', 23, 7, 52, 82, 3, '20/Jan/2017', '2017-01-20 01:37:17'),
(205, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'English Language', 28, 9, 49, 86, 2, '20/Jan/2017', '2017-01-20 01:37:17'),
(206, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'English Language', 17, 8, 41, 66, 7, '20/Jan/2017', '2017-01-20 01:37:17'),
(207, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'English Language', 18, 7, 39, 64, 5, '20/Jan/2017', '2017-01-20 01:37:17'),
(208, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'English Language', 22, 9, 40, 71, 6, '20/Jan/2017', '2017-01-20 01:37:17'),
(209, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'English Language', 23, 7, 39, 69, 3, '20/Jan/2017', '2017-01-20 01:37:17'),
(210, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'English Language', 15, 10, 30, 55, 10, '20/Jan/2017', '2017-01-20 01:37:17'),
(211, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Biology', 18, 10, 28, 56, 10, '20/Jan/2017', '2017-01-20 01:39:44'),
(212, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Biology', 19, 9, 39, 67, 8, '20/Jan/2017', '2017-01-20 01:39:44'),
(213, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Biology', 22, 8, 40, 70, 2, '20/Jan/2017', '2017-01-20 01:39:44'),
(214, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Biology', 15, 7, 47, 69, 3, '20/Jan/2017', '2017-01-20 01:39:44'),
(215, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Biology', 23, 6, 36, 65, 8, '20/Jan/2017', '2017-01-20 01:39:44'),
(216, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Biology', 25, 5, 49, 79, 2, '20/Jan/2017', '2017-01-20 01:39:44'),
(217, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Biology', 18, 2, 40, 60, 9, '20/Jan/2017', '2017-01-20 01:39:44'),
(218, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Biology', 19, 1, 50, 70, 2, '20/Jan/2017', '2017-01-20 01:39:44'),
(219, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Biology', 21, 4, 41, 66, 7, '20/Jan/2017', '2017-01-20 01:39:44'),
(220, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Biology', 30, 8, 41, 79, 2, '20/Jan/2017', '2017-01-20 01:39:44'),
(221, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Chemistry', 25, 7, 29, 61, 9, '20/Jan/2017', '2017-01-20 01:42:58'),
(222, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Chemistry', 26, 7, 42, 75, 1, '20/Jan/2017', '2017-01-20 01:42:58'),
(223, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Chemistry', 30, 8, 51, 89, 1, '20/Jan/2017', '2017-01-20 01:42:58'),
(224, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Chemistry', 16, 9, 37, 62, 6, '20/Jan/2017', '2017-01-20 01:42:58'),
(225, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Chemistry', 18, 5, 47, 70, 2, '20/Jan/2017', '2017-01-20 01:42:58'),
(226, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Chemistry', 22, 4, 57, 83, 2, '20/Jan/2017', '2017-01-20 01:42:58'),
(227, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Chemistry', 25, 3, 28, 56, 10, '20/Jan/2017', '2017-01-20 01:42:58'),
(228, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Chemistry', 19, 9, 33, 61, 9, '20/Jan/2017', '2017-01-20 01:42:58'),
(229, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Chemistry', 18, 9, 45, 72, 5, '20/Jan/2017', '2017-01-20 01:42:58'),
(230, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Chemistry', 15, 7, 39, 61, 9, '20/Jan/2017', '2017-01-20 01:42:58'),
(231, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Physics', 10, 10, 38, 58, 9, '20/Jan/2017', '2017-01-20 01:45:54'),
(232, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Physics', 15, 9, 40, 64, 5, '20/Jan/2017', '2017-01-20 01:45:54'),
(233, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Physics', 20, 7, 51, 78, 1, '20/Jan/2017', '2017-01-20 01:45:54'),
(234, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Physics', 25, 6, 49, 80, 4, '20/Jan/2017', '2017-01-20 01:45:54'),
(235, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Physics', 26, 4, 37, 67, 8, '20/Jan/2017', '2017-01-20 01:45:54'),
(236, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Physics', 27, 8, 59, 94, 1, '20/Jan/2017', '2017-01-20 01:45:54'),
(237, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Physics', 30, 7, 48, 85, 3, '20/Jan/2017', '2017-01-20 01:45:54'),
(238, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Physics', 18, 5, 30, 53, 10, '20/Jan/2017', '2017-01-20 01:45:54'),
(239, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Physics', 17, 4, 42, 63, 6, '20/Jan/2017', '2017-01-20 01:45:54'),
(240, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Physics', 20, 8, 57, 85, 3, '20/Jan/2017', '2017-01-20 01:45:54'),
(241, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Economics', 29, 10, 30, 69, 3, '20/Jan/2017', '2017-01-20 01:50:02'),
(242, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Economics', 26, 9, 32, 67, 8, '20/Jan/2017', '2017-01-20 01:50:02'),
(243, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Economics', 16, 8, 41, 65, 8, '20/Jan/2017', '2017-01-20 01:50:02'),
(244, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Economics', 14, 6, 53, 73, 4, '20/Jan/2017', '2017-01-20 01:50:02'),
(245, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Economics', 15, 6, 39, 60, 9, '20/Jan/2017', '2017-01-20 01:50:02'),
(246, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Economics', 22, 5, 48, 75, 1, '20/Jan/2017', '2017-01-20 01:50:02'),
(247, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Economics', 21, 4, 29, 54, 10, '20/Jan/2017', '2017-01-20 01:50:02'),
(248, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Economics', 30, 7, 37, 74, 2, '20/Jan/2017', '2017-01-20 01:50:02'),
(249, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Economics', 15, 7, 51, 73, 4, '20/Jan/2017', '2017-01-20 01:50:02'),
(250, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Economics', 10, 9, 47, 66, 7, '20/Jan/2017', '2017-01-20 01:50:02'),
(251, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Agric Science', 18, 10, 39, 67, 8, '20/Jan/2017', '2017-01-20 01:54:02'),
(252, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Agric Science', 28, 10, 39, 77, 2, '20/Jan/2017', '2017-01-20 01:54:02'),
(253, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Agric Science', 19, 10, 40, 69, 3, '20/Jan/2017', '2017-01-20 01:54:02'),
(254, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Agric Science', 29, 8, 51, 88, 1, '20/Jan/2017', '2017-01-20 01:54:02'),
(255, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Agric Science', 16, 7, 28, 51, 10, '20/Jan/2017', '2017-01-20 01:54:02'),
(256, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Agric Science', 26, 8, 42, 76, 3, '20/Jan/2017', '2017-01-20 01:54:02'),
(257, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Agric Science', 15, 5, 53, 73, 4, '20/Jan/2017', '2017-01-20 01:54:02'),
(258, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Agric Science', 25, 6, 41, 72, 5, '20/Jan/2017', '2017-01-20 01:54:02'),
(259, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Agric Science', 19, 6, 38, 63, 6, '20/Jan/2017', '2017-01-20 01:54:02'),
(260, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Agric Science', 15, 5, 47, 67, 8, '20/Jan/2017', '2017-01-20 01:54:02'),
(261, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'Geography', 30, 10, 30, 70, 2, '20/Jan/2017', '2017-01-20 01:57:00'),
(262, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'Geography', 22, 8, 39, 69, 3, '20/Jan/2017', '2017-01-20 01:57:00'),
(263, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'Geography', 23, 8, 22, 53, 10, '20/Jan/2017', '2017-01-20 01:57:00'),
(264, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'Geography', 18, 9, 33, 60, 9, '20/Jan/2017', '2017-01-20 01:57:00'),
(265, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'Geography', 19, 7, 42, 68, 4, '20/Jan/2017', '2017-01-20 01:57:00'),
(266, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'Geography', 20, 6, 52, 78, 1, '20/Jan/2017', '2017-01-20 01:57:00'),
(267, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'Geography', 30, 6, 28, 64, 5, '20/Jan/2017', '2017-01-20 01:57:00'),
(268, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'Geography', 16, 5, 39, 60, 9, '20/Jan/2017', '2017-01-20 01:57:00'),
(269, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'Geography', 16, 4, 40, 60, 9, '20/Jan/2017', '2017-01-20 01:57:00'),
(270, 'SSS3', 'First Term', '2017/2018', '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'Geography', 19, 4, 40, 63, 6, '20/Jan/2017', '2017-01-20 01:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
`id` int(10) NOT NULL,
  `sessions` varchar(20) DEFAULT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `sessions`, `date_added`, `time_added`) VALUES
(3, '2016/2017', '30/Oct/2016', '2016-10-30 09:23:14'),
(4, '2017/2018', '30/Oct/2016', '2016-10-30 09:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `sss`
--

CREATE TABLE IF NOT EXISTS `sss` (
`id` int(10) NOT NULL,
  `sss_subjects` varchar(100) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss`
--

INSERT INTO `sss` (`id`, `sss_subjects`, `upload_date`, `upload_time`) VALUES
(5, 'Further Maths', '27/Oct/2016', '2016-10-27 18:42:09'),
(6, 'Economics', '27/Oct/2016', '2016-10-27 18:42:13'),
(7, 'Government', '27/Oct/2016', '2016-10-27 18:42:30'),
(8, 'Physics', '27/Oct/2016', '2016-10-27 18:42:47'),
(9, 'Agric Science', '27/Oct/2016', '2016-10-27 18:42:52'),
(10, 'Geography', '28/Oct/2016', '2016-10-28 12:21:51'),
(11, 'Commerce', '28/Oct/2016', '2016-10-28 12:21:58'),
(12, 'Christian Religious Education', '28/Oct/2016', '2016-10-28 12:22:02'),
(13, 'Literature', '28/Oct/2016', '2016-10-28 12:22:16'),
(14, 'Accounting', '28/Oct/2016', '2016-10-28 12:22:21'),
(15, 'Mathematics', '29/Dec/2016', '2016-12-29 12:41:14'),
(16, 'English Language', '29/Dec/2016', '2016-12-29 12:41:23'),
(17, 'Biology', '29/Dec/2016', '2016-12-29 12:41:30'),
(18, 'Chemistry', '29/Dec/2016', '2016-12-29 12:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `sss_subject_number`
--

CREATE TABLE IF NOT EXISTS `sss_subject_number` (
`id` int(10) NOT NULL,
  `number_of_subject` int(10) DEFAULT NULL,
  `declared_date` varchar(20) DEFAULT NULL,
  `declared_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss_subject_number`
--

INSERT INTO `sss_subject_number` (`id`, `number_of_subject`, `declared_date`, `declared_time`) VALUES
(1, 9, '01/Nov/2016', '2016-11-01 04:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(10) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `othername` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `mob` varchar(50) DEFAULT NULL,
  `yob` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `address` text,
  `state` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `sponsor_name` varchar(50) DEFAULT NULL,
  `sponsor_phone` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `gen_password` varchar(20) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `date_of_reg` varchar(20) DEFAULT NULL,
  `time_of_reg` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `gender`, `firstname`, `lastname`, `othername`, `dob`, `mob`, `yob`, `contact_phone`, `address`, `state`, `nationality`, `sponsor_name`, `sponsor_phone`, `relationship`, `class`, `reg_number`, `gen_password`, `passport`, `date_of_reg`, `time_of_reg`) VALUES
(59, 'Male', 'Sunday', 'Onyinye', 'Agatha', '11', 'March', '1990', '07036798652', 'Ikom', 'Ebonyi', 'Nigerian', 'Mr Sunday', '07036798652', 'Parent', 'JSS1', '20174JSS1SCHOOLNAME1', 'spk', 'image/bs.png', '31/Dec/2016', '2016-12-31 20:49:39'),
(60, 'male', 'Ojukwu', 'Casweeney', 'Chisom', '21', 'March', '1992', '07036798652', 'Ikom', 'Anambra', 'Nigerian', 'Oliver Ojukwu', '07033733232', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME1', 'spk', 'image/c.jpg', '31/Dec/2016', '2016-12-31 20:56:27'),
(61, 'male', 'Esing', 'Steven', 'Agam', '5', 'July', '1991', '08148374669', 'Njar Abang Estate', 'Cross River', 'Nigerian', 'Chisom Ojukwu', '07036798652', 'Guardian', 'JSS3', '20176JSS3SCHOOLNAME1', 'spk', 'image/none.jpg', '31/Dec/2016', '2016-12-31 21:00:11'),
(62, 'Male', 'Sunday', 'William', 'Amobi', '21', 'May', '1994', '08148374669', 'Lagos', 'Ebonyi', 'Nigerian', 'Mr Sunday', '07036798652', 'Parent', 'JSS2', '20175JSS2SCHOOLNAME1', 'spk', 'image/FB_IMG_1455072646968.jpg', '04/Jan/2017', '2017-01-04 21:00:42'),
(63, 'male', 'Oha', 'Kingsley', 'Uzoma', '13', 'June', '1991', '08148374669', 'Aguda, Lagos', 'Imo', 'Nigerian', 'Mr Oha', '07036798652', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME1', 'spk', 'image/FB_IMG_1455072646968.jpg', '04/Jan/2017', '2017-01-04 21:05:43'),
(64, 'male', 'Umeanabuike', 'Chinonso', 'Balo', '2', 'May', '1993', '07036798652', 'Unubi, Anambra', 'Anambra', 'Nigerian', 'Mr Umeanabuike', '07036798652', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME1', 'spk', 'image/FB_IMG_1463906178171.jpg', '04/Jan/2017', '2017-01-04 21:07:43'),
(65, 'female', 'Oguchienti', 'Chidinma', 'Kareen', '18', 'January', '1995', '07031801992', 'Angel Max Lodge, Ifite Awka', 'Imo', 'Nigerian', 'Mr Israel Oguchienti', '07036798652', 'Parent', 'JSS1', '20174JSS1SCHOOLNAME2', 'spk', 'image/C360_2015-11-15-12-49-53.jpg', '04/Jan/2017', '2017-01-04 21:15:24'),
(66, 'female', 'Ojukwu', 'Queensy', 'Nneamaka', '11', 'September', '2005', '07036798652', 'Ikom', 'Anambra', 'Nigerian', 'Oliver Ojukwu', '07033733232', 'Parent', 'JSS1', '20174JSS1SCHOOLNAME3', 'spk', 'image/queen.PNG', '04/Jan/2017', '2017-01-04 21:21:03'),
(67, 'male', 'Ugwuogo', 'Chukwuemeka', 'Azubuike', '30', 'October', '1992', '07061883162', 'Rumuokoro, Port Harcourt', 'Abia', 'Nigerian', 'Mr Azubuike', '08034829455', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME2', 'spk', 'image/cas.gif', '07/Jan/2017', '2017-01-07 00:47:54'),
(68, 'Male', 'Ezeribe', 'John-Paul', 'Arinze', '4', 'March', '1989', '07060747700', 'Sabon Tasha Kaduna', 'Anambra', 'Nigerian', 'Mr Arinze', '08034829455', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME3', 'spk', 'image/papoo.PNG', '09/Jan/2017', '2017-01-09 07:42:46'),
(69, 'male', 'Akpuogwu', 'Angus', 'Tochuchukwu', '15', 'February', '1992', '07066676944', 'Rayfield, Jos', 'Anambra', 'Nigerian', 'Chief Angus Akpuogwu', '07033733232', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME4', 'spk', 'image/emm.PNG', '09/Jan/2017', '2017-01-09 07:48:37'),
(70, 'male', 'Ebe', 'Uchenna', 'Prince', '24', 'May', '1992', '07035815514', 'Nwafor Street, Orji, Imo State.', 'Imo', 'Nigerian', 'Mr Umunna', '07035815514', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME5', 'spk', 'image/p.PNG', '09/Jan/2017', '2017-01-09 08:07:33'),
(71, 'female', 'Ojukwu', 'Bianca', 'Chiemerie', '15', 'March', '2005', '07036798652', 'Ogoja Road, Ikom', 'Anambra', 'Nigerian', 'Oliver Ojukwu', '07033733232', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME6', 'spk', 'image/meme.PNG', '09/Jan/2017', '2017-01-09 08:43:42'),
(72, 'male', 'Ojukwu', 'Mark David', 'Obiolisa', '13', 'October', '2006', '07036798652', '39 Border Road, Ikom', 'Anambra', 'Nigerian', 'Oliver Ojukwu', '07033733232', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME7', 'spk', 'image/obi.PNG', '09/Jan/2017', '2017-01-09 08:51:03'),
(73, 'male', 'Ojukwu', 'Levi', 'Chinedu', '16', 'October', '1997', '07036798652', 'Ogun State', 'Anambra', 'Nigerian', 'Oliver Ojukwu', '07033733232', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME8', 'spk', 'image/nedu.PNG', '09/Jan/2017', '2017-01-09 10:12:21'),
(74, 'male', 'Udokanma', 'Echezona', '', '13', 'April', '1991', '08066257817', 'Nnewi, Anambra State', 'Anambra', 'Nigerian', 'Mr Udokanma', '08034829455', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME9', 'spk', 'image/eche.PNG', '09/Jan/2017', '2017-01-09 10:17:46'),
(76, 'male', 'Ikeh', 'Sylvester', 'Chinenye', '20', 'February', '1993', '08063824932', 'Abakaliki, Ebonyi', 'Anambra', 'Nigerian', 'Mr Ikeh', '07035815514', 'Parent', 'SSS3', '20179SSS3SCHOOLNAME10', 'spk', 'image/sly.PNG', '09/Jan/2017', '2017-01-09 10:26:35'),
(77, 'male', 'Umeanabuike', 'Chinazo', 'Ekene', '11', 'April', '1991', '07066684319', 'Ifite, Awka', 'Anambra', 'Nigerian', 'Mr Umeanabuike', '07066684319', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME2', 'spk', 'image/naz.PNG', '09/Jan/2017', '2017-01-09 10:34:54'),
(78, 'male', 'Chukwurah', 'Nwamaka', 'Ann', '28', 'September', '1993', '08107542361', 'Onitsha, Anambra', 'Anambra', 'Nigerian', 'Mr Chukwurah', '08034829455', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME3', 'spk', 'image/nwam.PNG', '09/Jan/2017', '2017-01-09 10:56:38'),
(79, 'female', 'Onyibor', 'Faithful', '', '10', 'July', '1991', '07035505396', 'Awka, Anambra', 'Anambra', 'Nigerian', 'Mr and Mrs Onyibor', '07035815514', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME4', 'spk', 'image/faith.PNG', '09/Jan/2017', '2017-01-09 10:59:03'),
(80, 'male', 'Chibundu', 'Prince', 'Patrick', '12', 'June', '1991', '07036798652', 'Awkuzu, Anambra', 'Anambra', 'Nigerian', 'Mr Chibundu', '07066684319', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME5', 'spk', 'image/pat.PNG', '09/Jan/2017', '2017-01-09 11:03:15'),
(81, 'male', 'Daya', 'Staga', 'Ifeanyi', '14', 'August', '1993', '07035815514', 'Onitsha, Anambra', 'Anambra', 'Nigerian', 'Chief Daya', '07035815514', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME6', 'spk', 'image/daya.PNG', '09/Jan/2017', '2017-01-09 11:08:38'),
(82, 'male', 'Omeluba', 'Bimbo', 'Anthony', '30', 'November', '1993', '08063824932', 'Lawanson, Lagos', 'Anambra', 'Nigerian', 'Mr Omeluba', '08034829455', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME7', 'spk', 'image/bim.PNG', '09/Jan/2017', '2017-01-09 11:11:39'),
(83, 'male', 'Ofor', 'Daniel', 'Kachi', '22', 'August', '1992', '07035505396', 'Onitsha, Anambra', 'Anambra', 'Nigerian', 'Mr Ofor', '07035815514', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME8', 'spk', 'image/dan.PNG', '09/Jan/2017', '2017-01-09 11:13:52'),
(84, 'male', 'Egbo', 'John', 'Henry', '23', 'May', '1991', '07060747700', 'Asaba', 'Anambra', 'Nigerian', 'John Henry', '07060747700', 'Self', 'SSS2', '20178SSS2SCHOOLNAME9', 'spk', 'image/john.PNG', '09/Jan/2017', '2017-01-09 11:15:56'),
(85, 'male', 'Akpu', 'Emmanuel', 'Afam', '10', 'June', '1986', '08033969672', 'Jos', 'Anambra', 'Nigerian', 'Chief Akpu Nnamdi', '08034829455', 'Parent', 'SSS2', '20178SSS2SCHOOLNAME10', 'spk', 'image/emma.PNG', '09/Jan/2017', '2017-01-09 11:21:40'),
(86, 'male', 'Egbu', 'Baruch', 'Esomchi', '15', 'March', '1992', '08160538763', 'germanhil okigwe,imo state', 'Abia', 'Nigerian', 'Sir Oluchukwu', '08148557552', 'Others', 'SSS1', '20177SSS1SCHOOLNAME2', 'spk', 'image/baruk.PNG', '17/Jan/2017', '2017-01-17 16:43:27'),
(87, 'male', 'Ibinuhi', 'David', 'Ibikunle', '10', 'August', '1991', '08135815924', 'NIPI Kaduna State', 'Kogi', 'Nigerian', 'Mr Raphael Jimoh', '07036798652', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME3', 'spk', 'image/dav.PNG', '17/Jan/2017', '2017-01-17 16:47:29'),
(88, 'male', 'Amasio', 'Destiny', 'Ponpoon', '29', 'June', '1992', '09026475636', '101 Isa Kaita U/Rimi', 'Edo', 'Nigerian', 'Amasio Joseph', '08022267121', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME4', 'spk', 'image/dex.PNG', '17/Jan/2017', '2017-01-17 16:54:25'),
(89, 'male', 'Isa', 'Dangana', 'Magaji', '11', 'April', '1990', '07033117803', 'NIPI Kaduna State', 'Taraba', 'Nigerian', 'Barr BM Isa', '08036155569', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME5', 'spk', 'image/dan.PNG', '17/Jan/2017', '2017-01-17 17:11:05'),
(90, 'male', 'Nwabueze', 'Precious', 'Uwazuruonye', '16', 'March', '1994', '09054015192', 'Federal Highway Patrol Barracks Ikeja Lagos', 'Delta', 'Nigerian', 'Mr &amp; Mrs Nwabueze', '08034829068', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME6', 'spk', 'image/pre.PNG', '17/Jan/2017', '2017-01-17 17:27:04'),
(91, 'male', 'Joshua', 'Kefas', 'Benjamin', '4', 'November', '1999', '07036798652', 'NIPI Kaduna State', 'Kaduna', 'Nigerian', 'Mr David', '07033733232', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME7', 'spk', 'image/dex.PNG', '17/Jan/2017', '2017-01-17 17:42:18'),
(92, 'female', 'Egbuna', 'Esther', 'Ify', '21', 'April', '1995', '07036798652', 'Sabon Tasha Kaduna State', 'Anambra', 'Nigerian', 'Mr Egbuna', '07036798652', 'Guardian', 'SSS1', '20177SSS1SCHOOLNAME8', 'spk', 'image/Esth.PNG', '17/Jan/2017', '2017-01-17 20:33:22'),
(93, 'female', 'Onukwube', 'Esther', 'Maryann', '25', 'March', '1995', '07036798652', 'NACC Family House Sabon Tasha, Kaduna  State', 'Anambra', 'Nigerian', 'Mr &amp; Mrs Onukwube', '07033733232', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME9', 'spk', 'image/oge.PNG', '17/Jan/2017', '2017-01-17 20:37:49'),
(94, 'female', 'Mmadu', 'Oluchi', 'Favour', '12', 'June', '1992', '07031801992', 'Barnawa, Kaduna State', 'Anambra', 'Nigerian', 'Mr &amp; Mrs Onyeka Mmadu', '07033733232', 'Parent', 'SSS1', '20177SSS1SCHOOLNAME10', 'spk', 'image/olii.PNG', '17/Jan/2017', '2017-01-17 20:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(10) NOT NULL,
  `reg_number` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `subjects` varchar(100) DEFAULT NULL,
  `term` varchar(50) DEFAULT NULL,
  `session` varchar(50) DEFAULT NULL,
  `registration_date` varchar(20) DEFAULT NULL,
  `registration_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=275 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `reg_number`, `name`, `class`, `subjects`, `term`, `session`, `registration_date`, `registration_time`) VALUES
(1, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '07/Jan/2017', '2017-01-07 01:21:26'),
(2, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '07/Jan/2017', '2017-01-07 01:21:38'),
(3, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:24:52'),
(4, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'English Language', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:24:58'),
(5, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Biology', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:07'),
(6, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:15'),
(7, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Physics', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:20'),
(8, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Economics', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:28'),
(9, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:45'),
(10, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:52'),
(11, '20179SSS3SCHOOLNAME3', 'Arize John Paul', 'SSS3', 'Geography', 'First Term', '2017/2018', '14/Jan/2017', '2017-01-14 22:25:59'),
(12, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:38:12'),
(13, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:38:23'),
(14, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:38:31'),
(15, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:38:43'),
(16, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:38:51'),
(17, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:39:09'),
(18, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:39:16'),
(19, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:39:27'),
(20, '20179SSS3SCHOOLNAME1', 'Oha Kingsley', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:39:34'),
(24, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:41:40'),
(25, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:41:49'),
(26, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:42:05'),
(27, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:42:23'),
(28, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:42:36'),
(29, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:42:45'),
(30, '20179SSS3SCHOOLNAME2', 'Ugwuogo Chukwuemeka', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:42:57'),
(31, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:45:21'),
(32, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:45:28'),
(33, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:45:35'),
(34, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:45:45'),
(35, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:45:56'),
(36, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:46:04'),
(37, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:46:17'),
(38, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:46:27'),
(39, '20179SSS3SCHOOLNAME4', 'Akpuogwu Angus', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:46:53'),
(40, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:47:26'),
(41, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:47:33'),
(42, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:47:40'),
(43, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:47:46'),
(44, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:47:52'),
(45, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:48:00'),
(46, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:48:06'),
(47, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:48:17'),
(48, '20179SSS3SCHOOLNAME5', 'Ebe Uchenna', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:48:40'),
(49, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:49:19'),
(50, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:49:27'),
(51, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:49:34'),
(52, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:49:42'),
(53, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:49:52'),
(54, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:50:01'),
(55, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:50:09'),
(56, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:50:20'),
(57, '20179SSS3SCHOOLNAME6', 'Ojukwu Bianca', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:50:27'),
(58, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:50:58'),
(59, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:05'),
(60, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:13'),
(61, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:20'),
(62, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:28'),
(63, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:35'),
(64, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:49'),
(65, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:51:56'),
(66, '20179SSS3SCHOOLNAME7', 'Ojukwu Mark David', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:52:03'),
(67, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:52:41'),
(68, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:52:49'),
(69, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:00'),
(70, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:12'),
(71, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:20'),
(72, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:27'),
(73, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:33'),
(74, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:39'),
(75, '20179SSS3SCHOOLNAME8', 'Ojukwu Levi', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:53:50'),
(76, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:54:25'),
(77, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:54:33'),
(78, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:54:41'),
(79, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:54:51'),
(80, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:54:58'),
(81, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:55:07'),
(82, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:55:15'),
(83, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:55:25'),
(84, '20179SSS3SCHOOLNAME9', 'Udokanma Echezona', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 19:55:32'),
(86, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Further Maths', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:00:32'),
(87, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:00:56'),
(88, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:03'),
(89, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:12'),
(90, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Chemistry', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:26'),
(91, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Physics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:35'),
(92, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:44'),
(93, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:01:51'),
(94, '20179SSS3SCHOOLNAME10', 'Ikeh Sylvester', 'SSS3', 'Geography', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:02:13'),
(95, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:05:44'),
(96, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:05:52'),
(97, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:01'),
(98, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:09'),
(99, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:19'),
(100, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:31'),
(101, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:39'),
(102, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:44'),
(103, '20178SSS2SCHOOLNAME1', 'Umeanabuike Chinonso', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:06:52'),
(104, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:07:26'),
(105, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:07:33'),
(106, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:07:41'),
(107, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:07:49'),
(108, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:07:57'),
(109, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:08:07'),
(110, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:08:14'),
(111, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:08:19'),
(112, '20178SSS2SCHOOLNAME10', 'Akpu Emmanuel', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:08:28'),
(113, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:09:12'),
(114, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:09:19'),
(115, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:09:31'),
(116, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:09:59'),
(117, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:10:11'),
(118, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:10:20'),
(119, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:10:36'),
(120, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:10:44'),
(121, '20178SSS2SCHOOLNAME2', 'Umeanabuike Chinazo', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:10:53'),
(122, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:11:37'),
(123, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:11:47'),
(124, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:11:58'),
(125, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:06'),
(126, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:24'),
(127, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:34'),
(128, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:42'),
(129, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:47'),
(130, '20178SSS2SCHOOLNAME3', 'Chukwurah Nwamaka', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:12:54'),
(131, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:13:29'),
(132, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:13:36'),
(133, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:13:46'),
(134, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:13:53'),
(135, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:14:03'),
(136, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:14:11'),
(137, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:14:18'),
(138, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:14:27'),
(139, '20178SSS2SCHOOLNAME4', 'Onyibor Faithful', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:14:33'),
(140, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:19'),
(141, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:29'),
(142, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:36'),
(143, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:42'),
(144, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:48'),
(145, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:15:55'),
(146, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:16:01'),
(147, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:16:07'),
(148, '20178SSS2SCHOOLNAME5', 'Chibundu Prince', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:16:16'),
(149, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:16:49'),
(150, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:00'),
(151, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:07'),
(152, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:16'),
(153, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:25'),
(154, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:42'),
(155, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:17:55'),
(156, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:18:00'),
(157, '20178SSS2SCHOOLNAME6', 'Daya Staga', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:18:07'),
(158, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:18:55'),
(159, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:02'),
(160, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:09'),
(161, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:16'),
(162, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:23'),
(163, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:30'),
(164, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:35'),
(165, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:42'),
(166, '20178SSS2SCHOOLNAME7', 'Omeluba Bimbo', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:19:57'),
(167, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:21:26'),
(168, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:21:32'),
(169, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:21:40'),
(170, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:21:47'),
(171, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:21:54'),
(172, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:22:01'),
(173, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:22:07'),
(174, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:22:14'),
(175, '20178SSS2SCHOOLNAME8', 'Ofor Daniel', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:22:20'),
(176, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:22:59'),
(177, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:08'),
(178, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:15'),
(179, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:21'),
(180, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:29'),
(181, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:35'),
(182, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:23:54'),
(183, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:24:05'),
(184, '20178SSS2SCHOOLNAME9', 'Egbo John', 'SSS2', 'Literature', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:24:14'),
(185, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:21'),
(186, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:27'),
(187, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:34'),
(188, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:41'),
(189, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:49'),
(190, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:43:55'),
(191, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:44:02'),
(192, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:44:09'),
(193, '20177SSS1SCHOOLNAME1', 'Ojukwu Casweeney', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:44:17'),
(194, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:44:51'),
(195, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:44:57'),
(196, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:04'),
(197, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:11'),
(198, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:18'),
(199, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:24'),
(200, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:35'),
(201, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:42'),
(202, '20177SSS1SCHOOLNAME10', 'Mmadu Oluchi', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:45:48'),
(203, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:27'),
(204, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:34'),
(205, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:40'),
(206, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:46'),
(207, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:51'),
(208, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:46:56'),
(209, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:47:03'),
(210, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:47:11'),
(211, '20177SSS1SCHOOLNAME2', 'Egbu Baruch', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:47:19'),
(212, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:48:59'),
(213, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:07'),
(214, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:12'),
(215, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:18'),
(216, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:24'),
(217, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:31'),
(218, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:44'),
(219, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:51'),
(220, '20177SSS1SCHOOLNAME3', 'Ibinuhi David', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:49:57'),
(221, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:50:43'),
(222, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:50:50'),
(223, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:50:55'),
(224, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:02'),
(225, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:08'),
(226, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:16'),
(227, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:21'),
(228, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:26'),
(229, '20177SSS1SCHOOLNAME4', 'Amasio Destiny', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:51:32'),
(230, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:06'),
(231, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:12'),
(232, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:29'),
(233, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:37'),
(234, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:45'),
(235, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:52:58'),
(236, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:53:06'),
(237, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:53:13'),
(238, '20177SSS1SCHOOLNAME5', 'Isa Dangana', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 20:53:18'),
(239, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:49:37'),
(240, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:49:46'),
(241, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:49:55'),
(242, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:02'),
(243, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:09'),
(244, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:15'),
(245, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:22'),
(246, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:30'),
(247, '20177SSS1SCHOOLNAME6', 'Nwabueze Precious', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:50:36'),
(248, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:51:33'),
(249, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:51:45'),
(250, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:51:54'),
(251, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:02'),
(252, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:08'),
(253, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:14'),
(254, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:21'),
(255, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:29'),
(256, '20177SSS1SCHOOLNAME7', 'Joshua Kefas', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:52:34'),
(257, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:53:53'),
(258, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:08'),
(259, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:14'),
(260, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:24'),
(261, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:32'),
(262, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:45'),
(263, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:54:52'),
(264, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:55:20'),
(265, '20177SSS1SCHOOLNAME8', 'Egbuna Esther', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:55:28'),
(266, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'English Language', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:02'),
(267, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Mathematics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:09'),
(268, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Biology', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:19'),
(269, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Agric Science', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:27'),
(270, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Economics', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:35'),
(271, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Christian Religious Education', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:43'),
(272, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Commerce', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:56:55'),
(273, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Accounting', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:57:03'),
(274, '20177SSS1SCHOOLNAME9', 'Onukwube Esther', 'SSS1', 'Government', 'First Term', '2017/2018', '17/Jan/2017', '2017-01-17 21:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `unused_pins`
--

CREATE TABLE IF NOT EXISTS `unused_pins` (
`id` int(20) NOT NULL,
  `term` varchar(50) DEFAULT NULL,
  `unused_pins` varchar(100) DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `upload_date` varchar(30) DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unused_pins`
--

INSERT INTO `unused_pins` (`id`, `term`, `unused_pins`, `serial_number`, `upload_date`, `upload_time`) VALUES
(21, 'Third Term', '0800454004047740', '201612270', '27/Dec/2016', '2016-12-27 20:55:18'),
(22, 'Third Term', '0895194680531030', '201612271', '27/Dec/2016', '2016-12-27 20:55:18'),
(23, 'Third Term', '0871820060407711', '201612272', '27/Dec/2016', '2016-12-27 20:55:18'),
(24, 'Third Term', '0871811000228932', '201612273', '27/Dec/2016', '2016-12-27 20:55:18'),
(25, 'Third Term', '0848036229996587', '201612274', '27/Dec/2016', '2016-12-27 20:55:18'),
(26, 'Second Term', '5190146863528070', '201612280', '28/Dec/2016', '2016-12-28 18:30:00'),
(27, 'Second Term', '5110500357031177', '201612281', '28/Dec/2016', '2016-12-28 18:30:00'),
(28, 'Second Term', '5150806589009854', '201612282', '28/Dec/2016', '2016-12-28 18:30:00'),
(29, 'Second Term', '5131146222100300', '201612283', '28/Dec/2016', '2016-12-28 18:30:01'),
(30, 'Second Term', '5150980590303490', '201612284', '28/Dec/2016', '2016-12-28 18:30:01'),
(36, 'First Term', '2785362244459115', '2017010710', '07/Jan/2017', '2017-01-07 01:25:38'),
(37, 'First Term', '2740776892870355', '2017010711', '07/Jan/2017', '2017-01-07 01:25:38'),
(38, 'First Term', '2751734360310688', '2017010712', '07/Jan/2017', '2017-01-07 01:25:38'),
(39, 'First Term', '2707064901902435', '2017010713', '07/Jan/2017', '2017-01-07 01:25:38'),
(40, 'First Term', '2758847579452091', '2017010714', '07/Jan/2017', '2017-01-07 01:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `used_pins`
--

CREATE TABLE IF NOT EXISTS `used_pins` (
`id` int(20) NOT NULL,
  `used_pins` varchar(50) DEFAULT NULL,
  `user_reg_number` varchar(50) DEFAULT NULL,
  `used_count` int(10) DEFAULT NULL,
  `user_class` varchar(50) DEFAULT NULL,
  `used_term` varchar(50) DEFAULT NULL,
  `used_session` varchar(50) DEFAULT NULL,
  `date_used` varchar(50) DEFAULT NULL,
  `time_used` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_pins`
--

INSERT INTO `used_pins` (`id`, `used_pins`, `user_reg_number`, `used_count`, `user_class`, `used_term`, `used_session`, `date_used`, `time_used`) VALUES
(43, '5666700058567830', '20168SCHOOLNAME1', 5, 'SSS2', 'First Term', '2017/2018', '15/Nov/2016', '2016-11-15 12:54:59'),
(44, '5600421327308683', '20166SCHOOLNAME4', 1, 'SSS2', 'First Term', '2017/2018', '24/Dec/2016', '2016-12-24 17:28:28'),
(45, '5649491580100306', '20168SCHOOLNAME1', 5, 'SSS2', 'First Term', '2017/2018', '25/Dec/2016', '2016-12-25 12:05:52'),
(46, '5666700058567830', '20168SCHOOLNAME1', 1, 'SSS2', 'First Term', '2016/2017', '26/Dec/2016', '2016-12-26 16:34:00'),
(47, '5617802101056891', '20168SCHOOLNAME3', 3, 'SSS2', 'First Term', '2017/2018', '27/Dec/2016', '2016-12-27 21:08:32'),
(48, '5600340201035503', '20168SCHOOLNAME2', 2, 'SSS2', 'First Term', '2017/2018', '28/Dec/2016', '2016-12-28 06:54:27'),
(49, '2557006842043119', '20168SCHOOLNAME1', 4, 'SSS2', 'First Term', '2017/2018', '28/Dec/2016', '2016-12-28 20:33:54'),
(50, '2501820546091791', '20167SCHOOLNAME2', 1, 'SSS2', 'First Term', '2017/2018', '29/Dec/2016', '2016-12-29 18:57:00'),
(51, '2580984866674062', '20177SSS1SCHOOLNAME10', 1, 'SSS1', 'First Term', '2017/2018', '20/Jan/2017', '2017-01-20 00:54:37'),
(52, '2561773000326001', '20179SSS3SCHOOLNAME2', 1, 'SSS3', 'First Term', '2017/2018', '20/Jan/2017', '2017-01-20 02:02:54'),
(53, '2510656002096728', '20177SSS1SCHOOLNAME2', 1, 'SSS1', 'First Term', '2017/2018', '20/Jan/2017', '2017-01-20 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address` text,
  `phone` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `lga` text,
  `nationality` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_of_reg` varchar(50) DEFAULT NULL,
  `time_of_reg` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `fullname`, `address`, `phone`, `state`, `lga`, `nationality`, `email`, `password`, `date_of_reg`, `time_of_reg`) VALUES
(15, 'mr', 'Casweeney Chisom', 'Ifite Awka', '07036798652', 'Anambra', 'Aguata', 'Nigerian', 'casweeno2000@gmail.com', 'godisgood', '24/Oct/2016', '2016-10-24 17:38:25'),
(16, 'mr', 'SPK Guest', 'NIPI, Kinshasha Road, Kaduna State', '07036798652', 'Kaduna', 'Kaduna North', 'Nigerian', 'guest@spk.com', 'password', '29/Dec/2016', '2016-12-29 17:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administratives`
--
ALTER TABLE `administratives`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_season`
--
ALTER TABLE `current_season`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss`
--
ALTER TABLE `jss`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss_subject_number`
--
ALTER TABLE `jss_subject_number`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin1`
--
ALTER TABLE `pin1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin2`
--
ALTER TABLE `pin2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin3`
--
ALTER TABLE `pin3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results1`
--
ALTER TABLE `results1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss`
--
ALTER TABLE `sss`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss_subject_number`
--
ALTER TABLE `sss_subject_number`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unused_pins`
--
ALTER TABLE `unused_pins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_pins`
--
ALTER TABLE `used_pins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `administratives`
--
ALTER TABLE `administratives`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `current_season`
--
ALTER TABLE `current_season`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dates`
--
ALTER TABLE `dates`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jss`
--
ALTER TABLE `jss`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `jss_subject_number`
--
ALTER TABLE `jss_subject_number`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pin1`
--
ALTER TABLE `pin1`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `pin2`
--
ALTER TABLE `pin2`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pin3`
--
ALTER TABLE `pin3`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `results1`
--
ALTER TABLE `results1`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sss`
--
ALTER TABLE `sss`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sss_subject_number`
--
ALTER TABLE `sss_subject_number`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=275;
--
-- AUTO_INCREMENT for table `unused_pins`
--
ALTER TABLE `unused_pins`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `used_pins`
--
ALTER TABLE `used_pins`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
