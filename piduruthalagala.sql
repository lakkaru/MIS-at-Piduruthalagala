-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2018 at 12:14 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piduruthalagala`
--

-- --------------------------------------------------------

--
-- Table structure for table `amendedroster`
--

DROP TABLE IF EXISTS `amendedroster`;
CREATE TABLE IF NOT EXISTS `amendedroster` (
  `amendedId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `20_04_1` varchar(2) NOT NULL,
  `20_04_2` varchar(2) NOT NULL,
  `04_12_1` varchar(2) NOT NULL,
  `04_12_2` varchar(2) NOT NULL,
  `12_20_1` varchar(2) NOT NULL,
  `12_20_2` varchar(2) NOT NULL,
  PRIMARY KEY (`amendedId`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=760 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amendedroster`
--

INSERT INTO `amendedroster` (`amendedId`, `date`, `20_04_1`, `20_04_2`, `04_12_1`, `04_12_2`, `12_20_1`, `12_20_2`) VALUES
(1, '2018-01-25', 'E', 'F', 'E', 'F', 'A', 'B'),
(2, '2018-01-26', 'A', 'B', 'A', 'B', 'A', 'B'),
(3, '2018-01-27', 'A', 'B', 'A', 'B', 'C', 'D'),
(4, '2018-01-28', 'O', 'P', 'O', 'P', 'O', 'P'),
(5, '2018-01-29', 'C', 'D', 'C', 'D', 'E', 'F'),
(6, '2018-01-30', 'O', 'P', 'O', 'P', 'O', 'P'),
(7, '2018-01-31', 'E', 'F', 'E', 'F', 'A', 'B'),
(8, '2018-02-01', 'A', 'B', 'A', 'B', 'A', 'B'),
(9, '2018-02-02', 'A', 'B', 'A', 'B', 'C', 'D'),
(10, '2018-02-03', 'O', 'P', 'O', 'P', 'O', 'P'),
(11, '2018-02-04', 'C', 'D', 'C', 'D', 'E', 'F'),
(12, '2018-02-05', 'E', 'F', 'E', 'F', 'E', 'F'),
(13, '2018-02-06', 'E', 'F', 'E', 'F', 'A', 'B'),
(14, '2018-02-07', 'A', 'B', 'A', 'B', 'A', 'B'),
(15, '2018-02-08', 'A', 'B', 'A', 'B', 'C', 'D'),
(16, '2018-02-09', 'C', 'D', 'C', 'D', 'C', 'D'),
(17, '2018-02-10', 'C', 'D', 'C', 'D', 'E', 'F'),
(18, '2018-02-11', 'E', 'F', 'E', 'F', 'E', 'F'),
(19, '2018-02-12', 'E', 'F', 'E', 'F', 'A', 'B'),
(20, '2018-02-13', 'A', 'B', 'A', 'B', 'A', 'B'),
(21, '2018-02-14', 'A', 'B', 'A', 'B', 'C', 'D'),
(22, '2018-02-15', 'C', 'D', 'C', 'D', 'C', 'D'),
(23, '2018-02-16', 'C', 'D', 'C', 'D', 'E', 'F'),
(24, '2018-02-17', 'E', 'F', 'E', 'F', 'E', 'F'),
(25, '2018-02-18', 'E', 'F', 'E', 'F', 'A', 'B'),
(26, '2018-02-19', 'A', 'B', 'A', 'B', 'A', 'B'),
(27, '2018-02-20', 'A', 'B', 'A', 'B', 'C', 'D'),
(28, '2018-02-21', 'C', 'D', 'C', 'D', 'C', 'D'),
(29, '2018-02-22', 'C', 'D', 'C', 'D', 'E', 'F'),
(30, '2018-02-23', 'E', 'F', 'E', 'F', 'E', 'F'),
(31, '2018-02-24', 'E', 'F', 'E', 'F', 'A', 'B'),
(32, '2018-02-25', 'A', 'B', 'A', 'B', 'A', 'B'),
(33, '2018-02-26', 'A', 'B', 'A', 'B', 'C', 'D'),
(34, '2018-02-27', 'C', 'D', 'C', 'D', 'C', 'D'),
(35, '2018-02-28', 'C', 'D', 'C', 'D', 'E', 'F'),
(36, '2018-03-01', 'E', 'F', 'E', 'F', 'E', 'F'),
(37, '2018-03-02', 'E', 'F', 'E', 'F', 'A', 'B'),
(38, '2018-03-03', 'A', 'B', 'A', 'B', 'A', 'B'),
(39, '2018-03-04', 'A', 'B', 'A', 'B', 'C', 'D'),
(40, '2018-03-05', 'C', 'D', 'C', 'D', 'C', 'D'),
(41, '2018-03-06', 'C', 'D', 'C', 'D', 'E', 'F'),
(42, '2018-03-07', 'E', 'F', 'E', 'F', 'E', 'F'),
(43, '2018-03-08', 'E', 'F', 'E', 'F', 'A', 'B'),
(44, '2018-03-09', 'A', 'B', 'A', 'B', 'A', 'B'),
(45, '2018-03-10', 'A', 'B', 'A', 'B', 'C', 'D'),
(46, '2018-03-11', 'C', 'D', 'C', 'D', 'C', 'D'),
(47, '2018-03-12', 'C', 'D', 'C', 'D', 'E', 'F'),
(48, '2018-03-13', 'E', 'F', 'E', 'F', 'E', 'F'),
(49, '2018-03-14', 'E', 'F', 'E', 'F', 'A', 'B'),
(50, '2018-03-15', 'A', 'B', 'A', 'B', 'A', 'B'),
(51, '2018-03-16', 'A', 'B', 'A', 'B', 'C', 'D'),
(52, '2018-03-17', 'C', 'D', 'C', 'D', 'C', 'D'),
(53, '2018-03-18', 'C', 'D', 'C', 'D', 'E', 'F'),
(54, '2018-03-19', 'E', 'F', 'E', 'F', 'E', 'F'),
(55, '2018-03-20', 'E', 'F', 'E', 'F', 'A', 'B'),
(56, '2018-03-21', 'A', 'B', 'A', 'B', 'A', 'B'),
(57, '2018-03-22', 'A', 'B', 'A', 'B', 'C', 'D'),
(58, '2018-03-23', 'C', 'D', 'C', 'D', 'C', 'D'),
(59, '2018-03-24', 'C', 'D', 'C', 'D', 'E', 'F'),
(60, '2018-03-25', 'E', 'F', 'E', 'F', 'E', 'F'),
(61, '2018-03-26', 'E', 'F', 'E', 'F', 'A', 'B'),
(62, '2018-03-27', 'A', 'B', 'A', 'B', 'A', 'B'),
(63, '2018-03-28', 'A', 'B', 'A', 'B', 'C', 'D'),
(64, '2018-03-29', 'C', 'D', 'C', 'D', 'C', 'D'),
(65, '2018-03-30', 'C', 'D', 'C', 'D', 'E', 'F'),
(66, '2018-03-31', 'E', 'F', 'E', 'F', 'E', 'F'),
(67, '2018-04-01', 'E', 'F', 'E', 'F', 'A', 'B'),
(68, '2018-04-02', 'A', 'B', 'A', 'B', 'A', 'B'),
(69, '2018-04-03', 'A', 'B', 'A', 'B', 'C', 'D'),
(70, '2018-04-04', 'C', 'D', 'C', 'D', 'C', 'D'),
(71, '2018-04-05', 'C', 'D', 'C', 'D', 'E', 'F'),
(72, '2018-04-06', 'E', 'F', 'E', 'F', 'E', 'F'),
(73, '2018-04-07', 'E', 'F', 'E', 'F', 'A', 'B'),
(74, '2018-04-08', 'A', 'B', 'A', 'B', 'A', 'B'),
(75, '2018-04-09', 'A', 'B', 'A', 'B', 'C', 'D'),
(76, '2018-04-10', 'C', 'D', 'C', 'D', 'C', 'D'),
(77, '2018-04-11', 'C', 'D', 'C', 'D', 'E', 'F'),
(78, '2018-04-12', 'E', 'F', 'E', 'F', 'E', 'F'),
(79, '2018-04-13', 'E', 'F', 'E', 'F', 'A', 'B'),
(80, '2018-04-14', 'A', 'B', 'A', 'B', 'A', 'B'),
(81, '2018-04-15', 'A', 'B', 'A', 'B', 'C', 'D'),
(82, '2018-04-16', 'C', 'D', 'C', 'D', 'C', 'D'),
(83, '2018-04-17', 'C', 'D', 'C', 'D', 'E', 'F'),
(84, '2018-04-18', 'E', 'F', 'E', 'F', 'E', 'F'),
(85, '2018-04-19', 'E', 'F', 'E', 'F', 'A', 'B'),
(86, '2018-04-20', 'A', 'B', 'A', 'B', 'A', 'B'),
(87, '2018-04-21', 'A', 'B', 'A', 'B', 'C', 'D'),
(88, '2018-04-22', 'C', 'D', 'C', 'D', 'C', 'D'),
(89, '2018-04-23', 'C', 'D', 'C', 'D', 'E', 'F'),
(90, '2018-04-24', 'E', 'F', 'E', 'F', 'E', 'F'),
(91, '2018-04-25', 'E', 'F', 'E', 'F', 'A', 'B'),
(92, '2018-04-26', 'A', 'B', 'A', 'B', 'A', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `appliedleave`
--

DROP TABLE IF EXISTS `appliedleave`;
CREATE TABLE IF NOT EXISTS `appliedleave` (
  `leaveId` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  `applicant` int(5) NOT NULL,
  `covering` int(5) NOT NULL,
  `lDate1` varchar(15) NOT NULL,
  `from1` varchar(5) NOT NULL,
  `to1` varchar(5) NOT NULL,
  `lDate2` varchar(15) DEFAULT NULL,
  `from2` varchar(5) DEFAULT NULL,
  `to2` varchar(5) DEFAULT NULL,
  `lDate3` varchar(15) DEFAULT NULL,
  `from3` varchar(5) DEFAULT NULL,
  `to3` varchar(5) DEFAULT NULL,
  `lNumber` int(5) NOT NULL,
  `lType` varchar(20) NOT NULL,
  `noOfLeave` int(2) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`leaveId`),
  KEY `serviceNumber` (`serviceNumber`),
  KEY `applicant` (`applicant`,`covering`),
  KEY `covering` (`covering`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appliedleave`
--

INSERT INTO `appliedleave` (`leaveId`, `date`, `applicant`, `covering`, `lDate1`, `from1`, `to1`, `lDate2`, `from2`, `to2`, `lDate3`, `from3`, `to3`, `lNumber`, `lType`, `noOfLeave`, `serviceNumber`) VALUES
(3, '2016-10-22', 1618, 2038, '2016-10-22', '12', '24', '2016-10-23', '00', '24', '2016-10-24', '00', '12', 23, 'Casual Leave', 5, 1618),
(4, '2016-10-22', 1618, 1549, '2016-10-22', '12', '24', '2016-10-23', '00', '12', NULL, NULL, NULL, 3242, 'Vacation Leave', 2, 1618),
(5, '2016-10-21', 1618, 1549, '2016-10-22', '12', '24', '2016-10-23', '00', '12', NULL, NULL, NULL, 24, 'Casual Leave', 2, 1618),
(7, '2016-10-22', 1618, 1493, '2016-10-22', '12', '24', '2016-10-23', '00', '12', NULL, NULL, NULL, 445, 'Medical Leave', 2, 1618),
(8, '2016-10-22', 1618, 1493, '2015-10-05', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 78, 'Medical Leave', 3, 1618),
(9, '2016-10-22', 1618, 1233, '2016-10-22', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 444445, 'Medical Leave', 4, 1618),
(10, '2016-10-24', 2038, 1849, '2016-10-30', '12', '24', '2016-10-31', '00', '24', '2016-11-01', '00', '12', 392, 'Vacation Leave', 5, 1233),
(11, '2016-10-24', 1549, 1493, '2016-10-29', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 87, 'Medical Leave', 5, 876),
(12, '2016-11-01', 1618, 1493, '2016-11-01', '12', '24', '2016-11-02', '00', '24', NULL, NULL, NULL, 22, 'Duty Leave', 2, 876),
(13, '2016-11-01', 1618, 1849, '2016-11-01', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 34, 'Lieu Leave', 3, 876),
(14, '2016-11-01', 1618, 1849, '2016-11-01', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 223, 'Nopay Leave', 4, 876);

-- --------------------------------------------------------

--
-- Table structure for table `diesel`
--

DROP TABLE IF EXISTS `diesel`;
CREATE TABLE IF NOT EXISTS `diesel` (
  `dieselId` int(10) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `serviceNumber` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`dieselId`),
  UNIQUE KEY `date_2` (`date`),
  KEY `serviceNumber` (`serviceNumber`),
  KEY `date` (`date`),
  KEY `date_3` (`date`),
  KEY `date_4` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diesel`
--

INSERT INTO `diesel` (`dieselId`, `amount`, `stock`, `serviceNumber`, `date`) VALUES
(26, 100, 1500, 1618, '2016-09-01'),
(35, 100, 1200, 1618, '2016-10-20'),
(46, 0, 1400, 1233, '2016-10-01'),
(47, 0, 1200, 876, '2016-11-01'),
(48, 0, 1000, 876, '2016-09-08'),
(49, 0, 121, 1618, '2017-09-01'),
(61, 0, 1850, 876, '2018-01-01'),
(62, 0, 1500, 876, '2017-12-01'),
(63, 100, 1850, 876, '2018-01-04'),
(64, 400, 1500, 2012, '2017-12-11'),
(65, 400, 1900, 876, '2018-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `equipment` varchar(15) NOT NULL,
  `event` varchar(15) NOT NULL,
  `description` varchar(25) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`eventId`),
  KEY `user_id` (`serviceNumber`),
  KEY `serviceNumber` (`serviceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `date`, `equipment`, `event`, `description`, `serviceNumber`) VALUES
(65, '2016-10-20', 'PCN1620', 'Maintenance', 'ry er rerere', 876),
(70, '2016-10-08', 'STL', 'Fault', 'test adding success', 1618),
(81, '2016-10-08', 'STL', 'Fault', 'test success.', 1618),
(82, '2016-10-08', 'STL', 'Maintenance', 'test mtce', 1618),
(89, '2016-10-08', 'STL', 'Maintenance', 'test adding success edit', 1618),
(91, '2016-10-08', 'NM7200V', 'Fault', 'test date', 1618),
(98, '2016-10-07', 'PCN1620', 'Maintenance', 'test', 1618),
(99, '2016-10-16', 'STL', 'Maintenance', 'erfghujnjhy', 1618),
(100, '2016-10-16', 'STL', 'Maintenance', 'show test', 1618),
(101, '2016-10-18', 'Antenna', 'Maintenance', 'test', 1618),
(102, '2016-10-18', 'Antenna', 'Maintenance', 'gstew', 1618),
(103, '2016-10-20', 'PCN1620', 'Maintenance', 'rewtwta', 1233),
(104, '2016-10-20', 'PCN1620', 'Fault', 'xfgdthxhhx', 1233),
(105, '2016-10-20', 'PCN1620', 'Maintenance', 'test', 1618),
(106, '2016-10-24', 'UPS', 'Maintenance', 'jrygkjl;-', 1233),
(107, '2016-10-24', 'UPS', 'Fault', '][uoytujh', 1233),
(108, '2016-10-26', 'PCN1620', 'Maintenance', 'sgzduzjxgj', 1233),
(109, '2016-11-02', 'STL', 'Maintenance', 'tyiuihoi', 876);

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

DROP TABLE IF EXISTS `exchange`;
CREATE TABLE IF NOT EXISTS `exchange` (
  `exchangeId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `applicant1` int(5) NOT NULL,
  `exDate11` date NOT NULL,
  `exDate11From` varchar(5) NOT NULL,
  `exDate11To` varchar(5) NOT NULL,
  `exDate12` date DEFAULT NULL,
  `exDate12From` varchar(5) DEFAULT NULL,
  `exDate12To` varchar(5) DEFAULT NULL,
  `exDate13` date DEFAULT NULL,
  `exDate13From` varchar(5) DEFAULT NULL,
  `exDate13To` varchar(5) DEFAULT NULL,
  `applicant2` int(5) NOT NULL,
  `exDate21` date NOT NULL,
  `exDate21From` varchar(5) NOT NULL,
  `exDate21To` varchar(5) NOT NULL,
  `exDate22` date DEFAULT NULL,
  `exDate22From` varchar(5) DEFAULT NULL,
  `exDate22To` varchar(5) DEFAULT NULL,
  `exDate23` date DEFAULT NULL,
  `exDate23From` varchar(5) DEFAULT NULL,
  `exDate23To` varchar(5) DEFAULT NULL,
  `exNumber` smallint(6) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`exchangeId`),
  KEY `user_id` (`serviceNumber`),
  KEY `applicant1` (`applicant1`,`applicant2`,`serviceNumber`),
  KEY `applicant2` (`applicant2`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`exchangeId`, `date`, `applicant1`, `exDate11`, `exDate11From`, `exDate11To`, `exDate12`, `exDate12From`, `exDate12To`, `exDate13`, `exDate13From`, `exDate13To`, `applicant2`, `exDate21`, `exDate21From`, `exDate21To`, `exDate22`, `exDate22From`, `exDate22To`, `exDate23`, `exDate23From`, `exDate23To`, `exNumber`, `serviceNumber`) VALUES
(14, '2016-10-19', 1233, '2016-10-19', '12', '24', '2016-10-21', '00', '24', '2016-10-22', '00', '12', 1549, '2016-10-29', '12', '24', '2016-10-30', '00', '24', '2016-10-31', '00', '12', 76, 1618),
(15, '2016-10-24', 1549, '2016-10-22', '12', '24', '2016-10-23', '00', '24', '2016-10-24', '00', '12', 1849, '2016-11-07', '12', '24', '2016-11-08', '00', '24', '2016-11-09', '00', '12', 387, 1233),
(16, '2016-10-24', 1549, '2016-10-31', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 1618, '2016-10-24', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 67, 876),
(17, '2016-10-24', 1549, '2016-10-31', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 1618, '2016-10-24', '12', '24', NULL, NULL, NULL, NULL, NULL, NULL, 776, 876);

-- --------------------------------------------------------

--
-- Table structure for table `eyerunning`
--

DROP TABLE IF EXISTS `eyerunning`;
CREATE TABLE IF NOT EXISTS `eyerunning` (
  `runningId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hours` int(7) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`runningId`),
  UNIQUE KEY `date_7` (`date`),
  KEY `serviceNumber` (`serviceNumber`),
  KEY `date` (`date`),
  KEY `date_2` (`date`),
  KEY `date_3` (`date`),
  KEY `date_4` (`date`),
  KEY `date_5` (`date`),
  KEY `date_6` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eyerunning`
--

INSERT INTO `eyerunning` (`runningId`, `date`, `hours`, `serviceNumber`) VALUES
(1, '2016-09-25', 52411, 1233),
(2, '2016-09-26', 52430, 1233),
(3, '2016-09-27', 52448, 1233),
(4, '2016-09-28', 52466, 1233),
(5, '2016-09-29', 52484, 1233),
(6, '2016-09-30', 52502, 1233),
(7, '2016-10-01', 52520, 1233),
(8, '2016-10-02', 52538, 1233),
(9, '2016-10-03', 52556, 1233),
(10, '2016-10-04', 52574, 1233),
(11, '2016-10-05', 52593, 1233),
(12, '2016-10-06', 52611, 1233),
(13, '2016-10-07', 52630, 1233),
(14, '2016-10-08', 52648, 1233),
(15, '2016-10-09', 52666, 1233),
(16, '2016-10-10', 52684, 1233),
(17, '2016-10-11', 52702, 1233),
(18, '2016-10-12', 52720, 1233),
(19, '2016-10-13', 52738, 1233),
(20, '2016-10-14', 52757, 1233),
(21, '2016-10-15', 52775, 1233),
(22, '2016-10-16', 52793, 1233),
(23, '2016-10-17', 52811, 1233),
(24, '2016-10-18', 52829, 1233),
(25, '2016-10-19', 52847, 1233),
(26, '2016-10-20', 52866, 1233),
(27, '2016-10-21', 52884, 1233),
(28, '2016-10-22', 52903, 1233),
(29, '2016-10-23', 52921, 1233),
(30, '2016-10-24', 52939, 1233),
(31, '2016-10-25', 52957, 1233),
(55, '2016-09-01', 52411, 876),
(63, '2016-10-26', 52975, 876),
(64, '2016-10-27', 52993, 876),
(65, '2016-10-28', 53012, 876),
(66, '2016-10-29', 53031, 876),
(67, '2016-10-30', 53049, 876),
(68, '2016-10-31', 53067, 876),
(69, '2016-11-01', 53085, 876);

-- --------------------------------------------------------

--
-- Table structure for table `genrunning`
--

DROP TABLE IF EXISTS `genrunning`;
CREATE TABLE IF NOT EXISTS `genrunning` (
  `runningId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hours` int(7) NOT NULL,
  `minutes` int(3) NOT NULL DEFAULT '0',
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`runningId`),
  UNIQUE KEY `date_6` (`date`),
  KEY `serviceNumber` (`serviceNumber`),
  KEY `date` (`date`),
  KEY `date_2` (`date`),
  KEY `date_3` (`date`),
  KEY `date_4` (`date`),
  KEY `date_5` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genrunning`
--

INSERT INTO `genrunning` (`runningId`, `date`, `hours`, `minutes`, `serviceNumber`) VALUES
(1, '2016-09-25', 2213, 17, 876),
(2, '2016-09-26', 2213, 17, 876),
(3, '2016-09-27', 2213, 17, 876),
(4, '2016-09-28', 2213, 17, 876),
(5, '2016-09-29', 2213, 17, 1233),
(6, '2016-09-30', 2213, 17, 1233),
(7, '2016-10-01', 2213, 17, 1233),
(8, '2016-10-02', 2216, 55, 1233),
(9, '2016-10-03', 2216, 55, 1233),
(10, '2016-10-04', 2216, 55, 1233),
(11, '2016-10-05', 2216, 55, 1233),
(12, '2016-10-06', 2216, 55, 1233),
(13, '2016-10-07', 2216, 55, 1233),
(14, '2016-10-08', 2216, 55, 1233),
(15, '2016-10-09', 2216, 55, 1233),
(16, '2016-10-10', 2217, 10, 1233),
(17, '2016-10-11', 2218, 48, 1233),
(18, '2016-10-12', 2218, 46, 1233),
(19, '2016-10-13', 2220, 31, 1233),
(20, '2016-10-14', 2220, 31, 1233),
(21, '2016-10-15', 2221, 26, 1233),
(22, '2016-10-16', 2221, 28, 1233),
(23, '2016-10-17', 2222, 4, 1233),
(24, '2016-10-18', 2226, 24, 1233),
(25, '2016-10-19', 2227, 26, 1233),
(26, '2016-10-20', 2227, 26, 1233),
(27, '2016-10-21', 2227, 26, 1233),
(28, '2016-10-22', 2227, 26, 1233),
(29, '2016-10-23', 2227, 26, 1233),
(30, '2016-10-24', 2227, 26, 1233),
(31, '2016-10-25', 2227, 48, 1233),
(33, '2016-09-01', 2213, 17, 1233),
(34, '2016-10-26', 2227, 52, 876),
(35, '2016-10-27', 2227, 52, 876),
(36, '2016-10-28', 2227, 52, 876),
(37, '2016-10-29', 2227, 54, 876),
(38, '2016-10-30', 2227, 54, 876),
(39, '2016-10-31', 2227, 54, 876),
(40, '2016-11-01', 2228, 57, 876),
(41, '2016-11-02', 2228, 57, 876),
(43, '2018-01-01', 2229, 57, 876),
(44, '2018-01-23', 2290, 57, 876),
(45, '2017-12-01', 2220, 57, 876),
(46, '2018-01-04', 2235, 57, 876),
(47, '2018-01-25', 2300, 57, 876),
(48, '2018-01-24', 2295, 57, 876);

-- --------------------------------------------------------

--
-- Table structure for table `leavecounttt`
--

DROP TABLE IF EXISTS `leavecounttt`;
CREATE TABLE IF NOT EXISTS `leavecounttt` (
  `lTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `applicant` int(4) NOT NULL,
  `date` date NOT NULL,
  `lType` varchar(20) NOT NULL,
  `noOfLeave` int(2) NOT NULL,
  PRIMARY KEY (`lTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leavecounttt`
--

INSERT INTO `leavecounttt` (`lTypeId`, `applicant`, `date`, `lType`, `noOfLeave`) VALUES
(4, 1233, '2016-10-22', 'Casual Leave', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `leavesummery`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `leavesummery`;
CREATE TABLE IF NOT EXISTS `leavesummery` (
`name` varchar(25)
,`serviceNumber` int(5)
,`lDate` varchar(15)
,`noOfLeave` int(2)
,`lType` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `mtce`
--

DROP TABLE IF EXISTS `mtce`;
CREATE TABLE IF NOT EXISTS `mtce` (
  `mtceId` int(11) NOT NULL AUTO_INCREMENT,
  `nextDate` date NOT NULL,
  `equipment` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`mtceId`),
  KEY `serviceNumber` (`serviceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtce`
--

INSERT INTO `mtce` (`mtceId`, `nextDate`, `equipment`, `description`, `serviceNumber`) VALUES
(15, '2016-10-31', 'STL', 'test db return', 1618),
(16, '2016-10-30', 'PCN1620', 'test edit 09-30', 1618),
(19, '2017-05-19', 'STL', 'future test', 1618),
(20, '2018-01-31', 'STL', 'future test', 1618),
(21, '2016-12-01', 'STL', 'test', 1618),
(24, '2018-10-21', 'STL', 'test 2018', 1618),
(25, '2017-10-11', 'STL', 'srsd', 876),
(26, '2017-10-18', 'PCN1620', 'gfdfjfgjg', 1233),
(27, '2019-11-01', 'STL', 'yugiuho', 876),
(28, '2018-01-26', 'STL', 'test', 1618);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `noticeId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`noticeId`),
  KEY `serviceNumber` (`serviceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeId`, `date`, `description`, `serviceNumber`) VALUES
(3, '2016-09-01', 'septembet 1', 1233),
(8, '2016-10-01', '10 -01 test', 876),
(14, '2016-10-26', 'test', 876),
(16, '2018-01-24', 'test', 1618),
(17, '2018-01-24', 'gyyguu', 1618),
(18, '2018-01-24', 'testbcbc', 1618);

-- --------------------------------------------------------

--
-- Stand-in structure for view `regrunning`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `regrunning`;
CREATE TABLE IF NOT EXISTS `regrunning` (
`date` date
,`rHours` int(7)
,`eHours` int(7)
,`gHours` int(7)
,`gMinutes` int(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `repeater`
--

DROP TABLE IF EXISTS `repeater`;
CREATE TABLE IF NOT EXISTS `repeater` (
  `repeaterId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `txLocation` varchar(25) NOT NULL,
  `rxLocation` varchar(25) NOT NULL,
  `rxFrequency` smallint(6) NOT NULL,
  `maxLevel` smallint(6) NOT NULL,
  `minLevel` smallint(6) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`repeaterId`),
  KEY `user_id` (`serviceNumber`),
  KEY `user_id_2` (`serviceNumber`),
  KEY `user_id_3` (`serviceNumber`),
  KEY `user_id_4` (`serviceNumber`),
  KEY `serviceNumber` (`serviceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repeater`
--

INSERT INTO `repeater` (`repeaterId`, `date`, `txLocation`, `rxLocation`, `rxFrequency`, `maxLevel`, `minLevel`, `remarks`, `serviceNumber`) VALUES
(1, '2016-10-08', 'Nayabedda', 'Mount Peak', 6960, 95, 95, 'Kudaoya Morter race', 876),
(2, '2016-10-06', 'Nayabedda', 'Mount Peak', 6960, 90, 90, 'LOS check', 876),
(3, '2016-10-01', 'Negambo', 'Mount Peak', 6900, 40, 20, 'Colombo marathon LOS. Not success.', 876),
(4, '2016-11-03', 'Sooriyakanda', 'Near Tx Hall', 6900, 70, 70, 'Poya OB', 876);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rerunning`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `rerunning`;
CREATE TABLE IF NOT EXISTS `rerunning` (
`date` date
,`rHours` int(7)
,`eHours` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `runninghours`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `runninghours`;
CREATE TABLE IF NOT EXISTS `runninghours` (
`date` date
,`ru` bigint(12)
,`ey` bigint(12)
,`gem` bigint(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `rurunning`
--

DROP TABLE IF EXISTS `rurunning`;
CREATE TABLE IF NOT EXISTS `rurunning` (
  `runningId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `hours` int(7) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`runningId`),
  UNIQUE KEY `runningId_2` (`runningId`),
  KEY `serviceNumber` (`serviceNumber`),
  KEY `date` (`date`),
  KEY `date_2` (`date`),
  KEY `date_3` (`date`),
  KEY `date_4` (`date`),
  KEY `runningId` (`runningId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rurunning`
--

INSERT INTO `rurunning` (`runningId`, `date`, `hours`, `serviceNumber`) VALUES
(1, '2016-09-01', 137600, 876),
(2, '2016-09-25', 136900, 876),
(3, '2016-09-26', 137600, 876),
(4, '2016-09-27', 137600, 876),
(5, '2016-09-28', 137600, 876),
(6, '2016-09-29', 136849, 1233),
(7, '2016-09-30', 136870, 1233),
(8, '2016-10-01', 136891, 1233),
(9, '2016-10-02', 136912, 1233),
(10, '2016-10-03', 136933, 1233),
(11, '2016-10-04', 136954, 1233),
(12, '2016-10-05', 136975, 1233),
(13, '2016-10-06', 136997, 1233),
(14, '2016-10-07', 137017, 1233),
(15, '2016-10-08', 137038, 1233),
(16, '2016-10-09', 137059, 1233),
(17, '2016-10-10', 137080, 1233),
(18, '2016-10-11', 137101, 1233),
(19, '2016-10-12', 137122, 1233),
(20, '2016-10-13', 137148, 1233),
(21, '2016-10-14', 137164, 1233),
(22, '2016-10-15', 137185, 1233),
(23, '2016-10-16', 137208, 1233),
(24, '2016-10-17', 137226, 1233),
(25, '2016-10-18', 137247, 1233),
(26, '2016-10-19', 137268, 1233),
(27, '2016-10-20', 137289, 1233),
(28, '2016-10-21', 137309, 1233),
(29, '2016-10-22', 137331, 1233),
(30, '2016-10-23', 137351, 1233),
(31, '2016-10-24', 137373, 1233),
(32, '2016-10-25', 137394, 1233),
(38, '2016-10-26', 137415, 876),
(39, '2016-10-27', 137436, 876),
(40, '2016-10-28', 137467, 876),
(41, '2016-10-29', 137678, 876),
(42, '2016-10-30', 137499, 876),
(43, '2016-10-31', 137520, 876),
(44, '2016-11-01', 137542, 876);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `serviceNumber` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` text,
  `role` text NOT NULL,
  PRIMARY KEY (`serviceNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`serviceNumber`, `name`, `password`, `code`, `email`, `mobile`, `role`) VALUES
(245, 'srgbzdh', '15c479f17848014cabd273a1b9f0f957', 'F', '', '', 'user'),
(876, 'MMR Chandrasekara', 'a47581849c1413db8677f89d44e3f759', 'O', 'cha@gmail.com', '071-7180731', 'admin'),
(1233, 'WMP Weerasekara', '571a182747cc03954f6b556cf91434f0', 'C', '', '', 'user'),
(1493, 'WVPN Jayasingha', '5f637c03b8bffc69ec0b2389c6ad8cff', 'A', '', '', 'user'),
(1549, 'HPML Pathirana', '3472b8bfd56b7371f2358456befeae86', 'D', '', '', 'user'),
(1618, 'RMLP Karunasena', 'd5d075a6545df1eaff85dd80b29402e9', 'Inac', '', '071-5316597', 'admin'),
(1849, 'BRR Gunasena', '4404f4d4d87e825117bd41c91dc71660', 'Inac', '', '', 'user'),
(2012, 'AMAD Alahakoon', '71842c461c9cf9eb4f8036e7f1804afd', 'B', '', '', 'user'),
(2038, 'GSL Jayasingha', 'aedfa922bdf82de6da464018e468397b', 'E', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

DROP TABLE IF EXISTS `viewer`;
CREATE TABLE IF NOT EXISTS `viewer` (
  `viewerId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(75) NOT NULL,
  `resTel` varchar(11) NOT NULL,
  `mobTel` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `related` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `serviceNumber` int(5) NOT NULL,
  PRIMARY KEY (`viewerId`),
  KEY `user_id` (`serviceNumber`),
  KEY `serviceNumber` (`serviceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viewer`
--

INSERT INTO `viewer` (`viewerId`, `date`, `name`, `city`, `address`, `resTel`, `mobTel`, `email`, `related`, `description`, `serviceNumber`) VALUES
(9, '2016-11-02', 'WPM Ruwan Bandara', 'Kadugannawa', '', '', '081-2233211', 'ruwandan@gmail.com', 'Rupavahini', ' Bad reception ', 876),
(11, '2016-11-02', 'RMLP Karunasena', 'wariyapola', 'Wilbagedara', '', '', '', 'Rupavahini', 'no reception', 876),
(15, '2016-11-02', 'test', 'errrr', 'ewew', '054-8577774', '077-5777399', '', 'Rupavahini', 'test', 876);

-- --------------------------------------------------------

--
-- Structure for view `leavesummery`
--
DROP TABLE IF EXISTS `leavesummery`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `leavesummery`  AS  select `u`.`name` AS `name`,`l`.`applicant` AS `serviceNumber`,`l`.`lDate1` AS `lDate`,`l`.`noOfLeave` AS `noOfLeave`,`l`.`lType` AS `lType` from (`appliedleave` `l` join `user` `u`) where (`u`.`serviceNumber` = `l`.`applicant`) ;

-- --------------------------------------------------------

--
-- Structure for view `regrunning`
--
DROP TABLE IF EXISTS `regrunning`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `regrunning`  AS  select `re`.`date` AS `date`,`re`.`rHours` AS `rHours`,`re`.`eHours` AS `eHours`,`g`.`hours` AS `gHours`,`g`.`minutes` AS `gMinutes` from (`rerunning` `re` join `genrunning` `g`) where (`re`.`date` = `g`.`date`) ;

-- --------------------------------------------------------

--
-- Structure for view `rerunning`
--
DROP TABLE IF EXISTS `rerunning`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rerunning`  AS  select `r`.`date` AS `date`,`r`.`hours` AS `rHours`,`e`.`hours` AS `eHours` from (`rurunning` `r` join `eyerunning` `e`) where (`r`.`date` = `e`.`date`) ;

-- --------------------------------------------------------

--
-- Structure for view `runninghours`
--
DROP TABLE IF EXISTS `runninghours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `runninghours`  AS  select `a`.`date` AS `date`,(`a`.`rHours` - `b`.`rHours`) AS `ru`,(`a`.`eHours` - `b`.`eHours`) AS `ey`,(((`a`.`gHours` * 60) - (`b`.`gHours` * 60)) + (`a`.`gMinutes` - `b`.`gMinutes`)) AS `gem` from (`regrunning` `a` join `regrunning` `b` on((`a`.`date` = (`b`.`date` + 1)))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appliedleave`
--
ALTER TABLE `appliedleave`
  ADD CONSTRAINT `appliedleave_ibfk_1` FOREIGN KEY (`applicant`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appliedleave_ibfk_2` FOREIGN KEY (`covering`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appliedleave_ibfk_3` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `diesel`
--
ALTER TABLE `diesel`
  ADD CONSTRAINT `diesel_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `exchange`
--
ALTER TABLE `exchange`
  ADD CONSTRAINT `exchange_ibfk_1` FOREIGN KEY (`applicant1`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exchange_ibfk_2` FOREIGN KEY (`applicant2`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exchange_ibfk_3` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `eyerunning`
--
ALTER TABLE `eyerunning`
  ADD CONSTRAINT `eyerunning_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `genrunning`
--
ALTER TABLE `genrunning`
  ADD CONSTRAINT `genrunning_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `mtce`
--
ALTER TABLE `mtce`
  ADD CONSTRAINT `mtce_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `repeater`
--
ALTER TABLE `repeater`
  ADD CONSTRAINT `repeater_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `rurunning`
--
ALTER TABLE `rurunning`
  ADD CONSTRAINT `rurunning_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `viewer`
--
ALTER TABLE `viewer`
  ADD CONSTRAINT `viewer_ibfk_1` FOREIGN KEY (`serviceNumber`) REFERENCES `user` (`serviceNumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
