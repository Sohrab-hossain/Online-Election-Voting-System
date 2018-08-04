-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2018 at 08:06 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `fatherName` varchar(200) DEFAULT NULL,
  `motherName` varchar(200) DEFAULT NULL,
  `nidNumber` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `presentDivisionId` int(11) DEFAULT NULL,
  `presentDistrictId` int(11) DEFAULT NULL,
  `presentSubDistrictId` int(11) DEFAULT NULL,
  `presentExtraAddress` varchar(300) DEFAULT NULL,
  `permanentDivisionId` int(11) DEFAULT NULL,
  `permanentDistrictId` int(11) DEFAULT NULL,
  `permanentSubDistrictId` int(11) DEFAULT NULL,
  `permanentExtraAddress` varchar(300) DEFAULT NULL,
  `workInstitute` varchar(200) DEFAULT NULL,
  `workPosition` varchar(200) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `fingerprint` varchar(500) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `contact` (`contact`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `fatherName` varchar(200) DEFAULT NULL,
  `motherName` varchar(200) DEFAULT NULL,
  `nidNumber` varchar(50) DEFAULT NULL,
  `nidCopy` varchar(500) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `presentDivisionId` int(11) DEFAULT NULL,
  `presentDistrictId` int(11) DEFAULT NULL,
  `presentSubDistrictId` int(11) DEFAULT NULL,
  `presentExtraAddress` varchar(300) DEFAULT NULL,
  `permanentDivisionId` int(11) DEFAULT NULL,
  `permanentDistrictId` int(11) DEFAULT NULL,
  `permanentSubDistrictId` int(11) DEFAULT NULL,
  `permanentExtraAddress` varchar(300) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `canPartySymbol` varchar(500) DEFAULT NULL,
  `canDetailsPdf` varchar(500) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `contact` (`contact`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `divisionId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divisionId` (`divisionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `candidateId` int(11) NOT NULL,
  `totalVote` int(11) DEFAULT NULL,
  PRIMARY KEY (`candidateId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

DROP TABLE IF EXISTS `subdistrict`;
CREATE TABLE IF NOT EXISTS `subdistrict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `districtId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districtId` (`districtId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `fatherName` varchar(200) DEFAULT NULL,
  `motherName` varchar(200) DEFAULT NULL,
  `nidNumber` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `presentDivisionId` int(11) DEFAULT NULL,
  `presentDistrictId` int(11) DEFAULT NULL,
  `presentSubDistrictId` int(11) DEFAULT NULL,
  `presentExtraAddress` varchar(300) DEFAULT NULL,
  `permanentDivisionId` int(11) DEFAULT NULL,
  `permanentDistrictId` int(11) DEFAULT NULL,
  `permanentSubDistrictId` int(11) DEFAULT NULL,
  `permanentExtraAddress` varchar(300) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `fingerprint` varchar(500) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `contact` (`contact`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
