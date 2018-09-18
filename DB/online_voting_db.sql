-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2018 at 07:00 PM
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
  `gender` varchar(10) DEFAULT NULL,
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
  `adminImage` varchar(300) DEFAULT NULL,
  `phoneNumber` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fingerprint` varchar(300) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'UA',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `phoneNumber` (`phoneNumber`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`),
  KEY `permanentDivisionId` (`permanentDivisionId`),
  KEY `permanentDistrictId` (`permanentDistrictId`),
  KEY `permanentSubDistrictId` (`permanentSubDistrictId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `fatherName`, `motherName`, `nidNumber`, `dateOfBirth`, `gender`, `presentDivisionId`, `presentDistrictId`, `presentSubDistrictId`, `presentExtraAddress`, `permanentDivisionId`, `permanentDistrictId`, `permanentSubDistrictId`, `permanentExtraAddress`, `workInstitute`, `workPosition`, `adminImage`, `phoneNumber`, `email`, `password`, `fingerprint`, `createDate`, `createIp`, `type`) VALUES
(1, 'Sohrab Hossain', 'Adbul Ahad', 'Jesmin Akter', '42783728394', '1994-02-03', 'Male', 1, 1, 4, 'na', 5, 37, 307, 'NA', 'NA', 'NA', 'FormalPic01.jpg', '01722968534', 'sohrab.zaf8888@gmail.com', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '', '2018-09-17', '::1', 'SA'),
(2, 'S.H.Zafran', 'Abdul Ahad', 'Jesmin Akter', '478273182481', '1995-02-03', 'Male', 1, 1, 4, 'NA', 1, 1, 4, 'NA', 'NA', 'NA', 'IMG_20180711_203222.jpg', '01914938888', 's.h56789@yahoo.com', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '', '2018-09-18', '::1', 'UA');

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
  `nidCopy` varchar(300) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `presentDivisionId` int(11) DEFAULT NULL,
  `presentDistrictId` int(11) DEFAULT NULL,
  `presentSubDistrictId` int(11) DEFAULT NULL,
  `presentExtraAddress` varchar(300) DEFAULT NULL,
  `permanentDivisionId` int(11) DEFAULT NULL,
  `permanentDistrictId` int(11) DEFAULT NULL,
  `permanentSubDistrictId` int(11) DEFAULT NULL,
  `permanentExtraAddress` varchar(300) DEFAULT NULL,
  `canImage` varchar(300) DEFAULT NULL,
  `phoneNumber` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `canPartySymbol` varchar(300) DEFAULT NULL,
  `canDetailsPdf` varchar(300) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `phoneNumber` (`phoneNumber`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`),
  KEY `permanentDivisionId` (`permanentDivisionId`),
  KEY `permanentDistrictId` (`permanentDistrictId`),
  KEY `permanentSubDistrictId` (`permanentSubDistrictId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countryId` (`countryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(1, 'Thakurgaon', 1),
(2, 'Dinajpur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India');

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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `divisionId`) VALUES
(1, 'Dhaka', 1),
(2, 'Gazipur', 1),
(3, 'Kishoreganj', 1),
(4, 'Manikganj', 1),
(5, 'Munshiganj', 1),
(6, 'Narayanganj', 1),
(7, 'Narsingdi', 1),
(8, 'Tangail', 1),
(9, 'Faridpur', 1),
(10, 'Gopalganj', 1),
(11, 'Madaripur', 1),
(12, 'Rajbari', 1),
(13, 'Shariatpur', 1),
(14, 'Brahmanbaria', 2),
(15, 'Comilla', 2),
(16, 'Chandpur', 2),
(17, 'Lakshmipur', 2),
(18, 'Noakhali', 2),
(19, 'Feni', 2),
(20, 'Khagrachhari', 2),
(21, 'Rangamati', 2),
(22, 'Bandarban', 2),
(23, 'Chittagong', 2),
(24, 'Cox\'s Bazar', 2),
(25, 'Jamalpur', 3),
(26, 'Mymensingh', 3),
(27, 'Netrokona', 3),
(28, 'Sherpur', 3),
(29, 'Bogura', 4),
(30, 'Chapainawabganj', 4),
(31, 'Joypurhat', 4),
(32, 'Naogaon', 4),
(33, 'Natore', 4),
(34, 'Pabna', 4),
(35, 'Rajshahi', 4),
(36, 'Sirajganj', 4),
(37, 'Thakurgaon', 5),
(38, 'Rangpur', 5),
(39, 'Panchagarh', 5),
(40, 'Nilphamari', 5),
(41, 'Lalmonirhat', 5),
(42, 'Kurigram', 5),
(43, 'Gaibandha', 5),
(44, 'Dinajpur', 5),
(45, 'Hafu', 5),
(46, 'Bagerhat', 6),
(47, 'Chuadanga', 6),
(48, 'Jessore', 6),
(49, 'Jhenaidah', 6),
(50, 'Khulna', 6),
(51, 'Kushtia', 6),
(52, 'Magura', 6),
(53, 'Meherpur', 6),
(54, 'Narail', 6),
(55, 'Satkhira', 6),
(56, 'Barisal', 7),
(57, 'Barguna', 7),
(58, 'Bhola', 7),
(59, 'Jhalokati', 7),
(60, 'Patuakhali', 7),
(61, 'Pirojpur', 7),
(62, 'Habiganj', 8),
(63, 'Moulvibazar', 8),
(64, 'Sunamganj', 8),
(65, 'Sylhet', 8);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Mymensingh'),
(4, 'Rajshahi'),
(5, 'Rangpur'),
(6, 'Khulna'),
(7, 'Barishal'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
CREATE TABLE IF NOT EXISTS `election` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districtId` int(11) DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `candidateId1` int(11) DEFAULT NULL,
  `candidateId2` int(11) DEFAULT NULL,
  `candidateId3` int(11) DEFAULT NULL,
  `candidateId4` int(11) DEFAULT NULL,
  `candidateId5` int(11) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districtId` (`districtId`),
  KEY `candidateId1` (`candidateId1`),
  KEY `candidateId2` (`candidateId2`),
  KEY `candidateId3` (`candidateId3`),
  KEY `candidateId4` (`candidateId4`),
  KEY `candidateId5` (`candidateId5`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `districtId`, `startTime`, `endTime`, `candidateId1`, `candidateId2`, `candidateId3`, `candidateId4`, `candidateId5`, `createDate`) VALUES
(1, 1, '06:00:00', '21:00:00', 1, 5, 1, 0, 0, '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `voterId` int(11) NOT NULL,
  `candidateId` int(11) DEFAULT NULL,
  `votingTime` time DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`voterId`),
  KEY `candidateId` (`candidateId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subdistrict`
--

DROP TABLE IF EXISTS `subdistrict`;
CREATE TABLE IF NOT EXISTS `subdistrict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `divisionId` int(11) DEFAULT NULL,
  `districtId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `divisionId` (`divisionId`),
  KEY `districtId` (`districtId`)
) ENGINE=MyISAM AUTO_INCREMENT=510 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subdistrict`
--

INSERT INTO `subdistrict` (`id`, `name`, `divisionId`, `districtId`) VALUES
(1, 'Dohar', 1, 1),
(2, 'Dhamrai', 1, 1),
(3, 'Keraniganj', 1, 1),
(4, 'Nawabganj', 1, 1),
(5, 'Savar', 1, 1),
(6, 'Tejgaon Circle', 1, 1),
(7, 'Gazipur Sadar', 1, 2),
(8, 'Kaliakair', 1, 2),
(9, 'Kaliganj', 1, 2),
(10, 'Kapasia', 1, 2),
(11, 'Sreepur', 1, 2),
(12, 'Austagram', 1, 3),
(13, 'Bajitpur', 1, 3),
(14, 'Bhairab', 1, 3),
(15, 'Hossainpur', 1, 3),
(16, 'Itna', 1, 3),
(17, 'Karimganj', 1, 3),
(18, 'Katiadi', 1, 3),
(19, 'Kishoreganj Sadar', 1, 3),
(20, 'Kuliarchar', 1, 3),
(21, 'Mithamain', 1, 3),
(22, 'Nikli', 1, 3),
(23, 'Pakundia', 1, 3),
(24, 'Tarail', 1, 3),
(25, 'Daulatpur', 1, 4),
(26, 'Ghior', 1, 4),
(27, 'Harirampur', 1, 4),
(28, 'Manikgonj Sadar', 1, 4),
(29, 'Saturia', 1, 4),
(30, 'Shivalaya', 1, 4),
(31, 'Singair', 1, 4),
(32, 'Gazaria', 1, 5),
(33, 'Lohajang', 1, 5),
(34, 'Munshiganj Sadar', 1, 5),
(35, 'Sirajdikhan', 1, 5),
(36, 'Sreenagar', 1, 5),
(37, 'Tongibari Upazila', 1, 5),
(38, 'Araihazar', 1, 6),
(39, 'Bandar', 1, 6),
(40, 'Narayanganj Sadar', 1, 6),
(41, 'Rupganj Upazila', 1, 6),
(42, 'Sonargaon', 1, 6),
(43, 'Narsingdi Sadar', 1, 7),
(44, 'Belabo', 1, 7),
(45, 'Monohardi', 1, 7),
(46, 'Palash', 1, 7),
(47, 'Raipura', 1, 7),
(48, 'Shibpur', 1, 7),
(49, 'Gopalpur', 1, 8),
(50, 'Basail', 1, 8),
(51, 'Bhuapur', 1, 8),
(52, 'Delduar', 1, 8),
(53, 'Ghatail', 1, 8),
(54, 'Kalihati', 1, 8),
(55, 'Madhupur', 1, 8),
(56, 'Mirzapur', 1, 8),
(57, 'Nagarpur', 1, 8),
(58, 'Sakhipur', 1, 8),
(59, 'Dhanbari', 1, 8),
(60, 'Tangail Sadar', 1, 8),
(61, 'Alfadanga', 1, 9),
(62, 'Bhanga', 1, 9),
(63, 'Boalmari', 1, 9),
(64, 'Charbhadrasan', 1, 9),
(65, 'Faridpur Sadar', 1, 9),
(66, 'Madhukhali', 1, 9),
(67, 'Nagarkanda', 1, 9),
(68, 'Sadarpur', 1, 9),
(69, 'Saltha', 1, 9),
(70, 'Gopalganj Sadar', 1, 10),
(71, 'Kashiani', 1, 10),
(72, 'Kotalipara', 1, 10),
(73, 'Muksudpur', 1, 10),
(74, 'Tungipara', 1, 10),
(75, 'Rajoir', 1, 11),
(76, 'Madaripur Sadar', 1, 11),
(77, 'Kalkini', 1, 11),
(78, 'Shibchar', 1, 11),
(79, 'Baliakandi', 1, 12),
(80, 'Goalandaghat', 1, 12),
(81, 'Pangsha', 1, 12),
(82, 'Rajbari Sadar', 1, 12),
(83, 'Kalukhali', 1, 12),
(84, 'Bhedarganj', 1, 13),
(85, 'Damudya', 1, 13),
(86, 'Gosairhat', 1, 13),
(87, 'Naria', 1, 13),
(88, 'Shariatpur Sadar', 1, 13),
(89, 'Zajira', 1, 13),
(90, 'Shakhipur', 1, 13),
(91, 'Akhaura', 2, 14),
(92, 'Bancharampur', 2, 14),
(93, 'Brahmanbaria Sadar', 2, 14),
(94, 'Kasba', 2, 14),
(95, 'Nabinagar', 2, 14),
(96, 'Nasirnagar', 2, 14),
(97, 'Sarail', 2, 14),
(98, 'Ashuganj', 2, 14),
(99, 'Bijoynagar', 2, 14),
(100, 'Barura', 2, 15),
(101, 'Brahmanpara', 2, 15),
(102, 'Burichang', 2, 15),
(103, 'Chandina', 2, 15),
(104, 'Chauddagram', 2, 15),
(105, 'Daudkandi', 2, 15),
(106, 'Debidwar', 2, 15),
(107, 'Homna', 2, 15),
(108, 'Laksam', 2, 15),
(109, 'Muradnagar', 2, 15),
(110, 'Nangalkot', 2, 15),
(111, 'Cumilla Adarsha Sadar', 2, 15),
(112, 'Meghna', 2, 15),
(113, 'Titas', 2, 15),
(114, 'Monohargonj', 2, 15),
(115, 'Cumilla Sadar Dakshin', 2, 15),
(116, 'Chandpur Sadar', 2, 16),
(117, 'Faridganj', 2, 16),
(118, 'Haimchar', 2, 16),
(119, 'Haziganj', 2, 16),
(120, 'Kachua', 2, 16),
(121, 'Matlab Dakshin', 2, 16),
(122, 'Matlab Uttar', 2, 16),
(123, 'Shahrasti', 2, 16),
(124, 'Lakshmipur Sadar', 2, 17),
(125, 'Raipur', 2, 17),
(126, 'Ramganj', 2, 17),
(127, 'Ramgati', 2, 17),
(128, 'Kamalnagar', 2, 17),
(129, 'Begumganj', 2, 18),
(130, 'Noakhali Sadar', 2, 18),
(131, 'Chatkhil', 2, 18),
(132, 'Companiganj', 2, 18),
(133, 'Hatiya', 2, 18),
(134, 'Senbagh', 2, 18),
(135, 'Sonaimuri', 2, 18),
(136, 'Subarnachar', 2, 18),
(137, 'Kabirhat', 2, 18),
(138, 'Chhagalnaiya', 2, 19),
(139, 'Daganbhuiyan', 2, 19),
(140, 'Feni Sadar', 2, 19),
(141, 'Parshuram', 2, 19),
(142, 'Sonagazi', 2, 19),
(143, 'Fulgazi', 2, 19),
(144, 'Dighinala', 2, 20),
(145, 'Khagrachhari', 2, 20),
(146, 'Lakshmichhari', 2, 20),
(147, 'Mahalchhari', 2, 20),
(148, 'Manikchhari', 1, 20),
(149, 'Matiranga', 2, 20),
(150, 'Panchhari', 2, 20),
(151, 'Ramgarh', 2, 20),
(152, 'Bagaichhari', 2, 21),
(153, 'Barkal', 2, 21),
(154, 'Kawkhali (Betbunia)', 2, 21),
(155, 'Belaichhari', 2, 21),
(156, 'Kaptai', 2, 21),
(157, 'Kaptai', 2, 21),
(158, 'Juraichhari', 2, 21),
(159, 'Langadu', 2, 21),
(160, 'Naniyachar', 2, 21),
(161, 'Rajasthali', 2, 21),
(162, 'Rangamati Sadar', 2, 21),
(163, 'Ali Kadam', 2, 22),
(164, 'Bandarban Sadar', 2, 22),
(165, 'Lama', 2, 22),
(166, 'Naikhongchhari', 2, 22),
(167, 'Rowangchhari', 2, 22),
(168, 'Ruma', 2, 22),
(169, 'Thanchi', 2, 22),
(170, 'Anwara', 2, 23),
(171, 'Banshkhali', 2, 23),
(172, 'Boalkhali', 2, 23),
(173, 'Chandanaish', 2, 23),
(174, 'Fatikchhari', 2, 23),
(175, 'Hathazari', 2, 23),
(176, 'Karnaphuli', 2, 23),
(177, 'Lohagara', 2, 23),
(178, 'Mirsharai', 2, 23),
(179, 'Patiya', 2, 23),
(180, 'Rangunia', 2, 23),
(181, 'Raozan', 2, 23),
(182, 'Sandwip', 2, 23),
(183, 'Satkania', 2, 23),
(184, 'Sitakunda', 2, 23),
(185, 'Bandar', 2, 23),
(186, 'Chandgaon', 2, 23),
(187, 'Double Mooring', 2, 23),
(188, 'Kotwali', 2, 23),
(189, 'Pahartali', 2, 23),
(190, 'Panchlaish', 2, 23),
(191, 'Bhujpur', 2, 23),
(192, 'Chakaria', 2, 24),
(193, 'Cox\'s Bazar Sadar', 2, 24),
(194, 'Kutubdia', 2, 24),
(195, 'Maheshkhali', 2, 24),
(196, 'Ramu', 2, 24),
(197, 'Teknaf', 2, 24),
(198, 'Ukhia', 2, 24),
(199, 'Pekua', 2, 24),
(200, 'Baksiganj', 3, 25),
(201, 'Dewanganj', 3, 25),
(202, 'Islampur', 3, 25),
(203, 'Jamalpur Sadar', 3, 25),
(204, 'Madarganj', 3, 25),
(205, 'Melandaha', 3, 25),
(206, 'Sarishabari', 3, 25),
(207, 'Trishal', 3, 26),
(208, 'Dhobaura', 3, 26),
(209, 'Fulbaria', 3, 26),
(210, 'Gaffargaon', 3, 26),
(211, 'Gauripur', 3, 26),
(212, 'Haluaghat', 3, 26),
(213, 'Ishwarganj', 3, 26),
(214, 'Mymensingh Sadar', 3, 26),
(215, 'Muktagachha', 3, 26),
(216, 'Nandail', 3, 26),
(217, 'Phulpur', 3, 26),
(218, 'Bhaluka', 3, 26),
(219, 'Tara Khanda', 3, 26),
(220, 'Atpara', 3, 27),
(221, 'Barhatta', 3, 27),
(222, 'Durgapur', 3, 27),
(223, 'Khaliajuri', 3, 27),
(224, 'Kalmakanda', 3, 27),
(225, 'Kendua', 3, 27),
(226, 'Madan', 3, 27),
(227, 'Mohanganj', 3, 27),
(228, 'Netrokona Sadar', 3, 27),
(229, 'Purbadhala', 3, 27),
(230, 'Jhenaigati', 3, 28),
(231, 'Nakla', 3, 27),
(232, 'Nalitabari', 3, 27),
(233, 'Sherpur Sadar', 3, 27),
(234, 'Sreebardi', 3, 27),
(235, 'Adamdighi', 4, 29),
(236, 'Bogura Sadar', 4, 29),
(237, 'Dhunat', 4, 29),
(238, 'Dhupchanchia', 4, 29),
(239, 'Gabtali', 4, 29),
(240, 'Kahaloo', 4, 29),
(241, 'Nandigram', 4, 29),
(242, 'Sariakandi', 4, 29),
(243, 'Shajahanpur', 4, 29),
(244, 'Sherpur', 4, 29),
(245, 'Shibganj', 4, 29),
(246, 'Sonatola', 4, 29),
(247, 'Bholahat', 4, 30),
(248, 'Gomastapur', 4, 30),
(249, 'Nachole', 4, 30),
(250, 'Nawabganj Sadar', 4, 30),
(251, 'Shibganj', 4, 30),
(252, 'Akkelpur', 4, 31),
(253, 'Joypurhat Sadar', 4, 31),
(254, 'Kalai', 4, 31),
(255, 'Khetlal', 4, 31),
(256, 'Panchbibi', 4, 31),
(257, 'Atrai', 4, 32),
(258, 'Badalgachhi', 4, 32),
(259, 'Manda', 4, 32),
(260, 'Dhamoirhat', 4, 32),
(261, 'Mohadevpur', 4, 32),
(262, 'Naogaon Sadar', 4, 32),
(263, 'Niamatpur', 4, 32),
(264, 'Patnitala', 4, 32),
(265, 'Porsha', 4, 32),
(266, 'Raninagar', 4, 32),
(267, 'Sapahar', 4, 32),
(268, 'Bagatipara', 4, 33),
(269, 'Baraigram', 4, 33),
(270, 'Gurudaspur', 4, 33),
(271, 'Lalpur', 4, 33),
(272, 'Natore Sadar', 4, 33),
(273, 'Singra', 4, 33),
(274, 'Naldanga', 4, 33),
(275, 'Ataikula', 4, 34),
(276, 'Atgharia', 4, 34),
(277, 'Bera', 4, 34),
(278, 'Bhangura', 4, 34),
(279, 'Chatmohar', 4, 34),
(280, 'Faridpur', 4, 34),
(281, 'Ishwardi', 4, 34),
(282, 'Pabna Sadar', 4, 34),
(283, 'Santhia', 4, 34),
(284, 'Sujanagar', 4, 34),
(285, 'Bagha', 4, 35),
(286, 'Bagmara Upazila', 4, 35),
(287, 'Charghat', 4, 35),
(288, 'Durgapur', 4, 35),
(289, 'Godagari', 4, 35),
(290, 'Mohanpur', 4, 35),
(291, 'Paba', 4, 35),
(292, 'Puthia', 4, 35),
(293, 'Tanore', 4, 35),
(294, 'Belkuchi', 4, 36),
(295, 'Chauhali', 4, 36),
(296, 'Kamarkhanda', 4, 36),
(297, 'Kazipur', 4, 36),
(298, 'Raiganj', 4, 36),
(299, 'Shahjadpur', 4, 36),
(300, 'Sirajganj Sadar', 4, 36),
(301, 'Tarash', 4, 36),
(302, 'Ullahpara', 4, 36),
(303, 'Baliadangi', 5, 37),
(304, 'Haripur', 5, 37),
(305, 'Pirganj', 5, 37),
(306, 'Ranisankail', 5, 37),
(307, 'Thakurgaon Sadar', 5, 37),
(308, 'Badarganj', 5, 38),
(309, 'Gangachhara', 5, 38),
(310, 'Kaunia', 5, 38),
(311, 'Rangpur Sadar', 5, 38),
(312, 'Mithapukur', 5, 38),
(313, 'Pirgachha', 5, 38),
(314, 'Pirganj', 5, 38),
(315, 'Taraganj', 5, 38),
(316, 'Atwari', 5, 39),
(317, 'Boda', 5, 39),
(318, 'Debiganj', 5, 39),
(319, 'Panchagarh Sadar', 5, 39),
(320, 'Tetulia', 5, 39),
(321, 'Dimla', 5, 40),
(322, 'Domar', 5, 40),
(323, 'Jaldhaka', 5, 40),
(324, 'Kishoreganj', 5, 40),
(325, 'Nilphamari Sadar', 5, 40),
(326, 'Saidpur', 5, 40),
(327, 'Aditmari', 5, 41),
(328, 'Hatibandha', 5, 41),
(329, 'Kaliganj', 5, 41),
(330, 'Lalmonirhat Sadar', 5, 41),
(331, 'Patgram', 5, 41),
(332, 'Bhurungamari', 5, 42),
(333, 'Char Rajibpur', 5, 42),
(334, 'Chilmari', 5, 42),
(335, 'Phulbari', 5, 42),
(336, 'Kurigram Sadar', 5, 42),
(337, 'Nageshwari', 5, 42),
(338, 'Rajarhat', 5, 42),
(339, 'Raomari', 5, 42),
(340, 'Ulipur', 5, 42),
(341, 'Phulchhari', 5, 43),
(342, 'Gaibandha Sadar', 5, 43),
(343, 'Gobindaganj', 5, 43),
(344, 'Palashbari', 5, 43),
(345, 'Sadullapur', 5, 43),
(346, 'Sughatta', 5, 43),
(347, 'Sundarganj', 5, 43),
(348, 'Birampur', 5, 44),
(349, 'Birganj', 5, 44),
(350, 'Biral', 5, 44),
(351, 'Bochaganj', 5, 44),
(352, 'Chirirbandar', 5, 44),
(353, 'Phulbari', 5, 44),
(354, 'Ghoraghat', 5, 44),
(355, 'Hakimpur', 5, 44),
(356, 'Kaharole', 5, 44),
(357, 'Khansama Upazila', 5, 44),
(358, 'Dinajpur Sadar', 5, 44),
(359, 'Nawabganj', 5, 44),
(360, 'Parbatipur', 5, 44),
(361, 'Bagerhat Sadar', 6, 46),
(362, 'Chitalmari', 6, 46),
(363, 'Fakirhat', 6, 46),
(364, 'Kachua', 6, 46),
(365, 'Mollahat', 6, 46),
(366, 'Mongla', 6, 46),
(367, 'Morrelganj', 6, 46),
(368, 'Rampal', 6, 46),
(369, 'Sarankhola', 6, 46),
(370, 'Alamdanga', 6, 47),
(371, 'Chuadanga Sadar', 6, 47),
(372, 'Damurhuda', 6, 47),
(373, 'Jibannagar', 6, 47),
(374, 'Abhaynagar', 6, 48),
(375, 'Bagherpara', 6, 48),
(376, 'Chaugachha', 6, 48),
(377, 'Jhikargachha', 6, 48),
(378, 'Keshabpur', 6, 48),
(379, 'Jashore Sadar', 6, 48),
(380, 'Manirampur', 6, 48),
(381, 'Sharsha', 6, 48),
(382, 'Harinakunda', 6, 49),
(383, 'Jhenaidah Sadar', 6, 49),
(384, 'Kaliganj', 6, 49),
(385, 'Kotchandpur', 6, 49),
(386, 'Maheshpur', 6, 49),
(387, 'Shailkupa', 6, 49),
(388, 'Batiaghata', 6, 50),
(389, 'Dacope', 6, 50),
(390, 'Dumuria', 6, 50),
(391, 'Dighalia', 6, 50),
(392, 'Koyra', 6, 50),
(393, 'Paikgachha', 6, 50),
(394, 'Phultala', 6, 50),
(395, 'Rupsha', 6, 50),
(396, 'Rupsha', 6, 50),
(397, 'Daulatpur', 6, 50),
(398, 'Khalishpur', 6, 50),
(399, 'Khan Jahan Ali', 6, 50),
(400, 'Kotwali', 6, 50),
(401, 'Sonadanga', 6, 50),
(402, 'Harintana', 6, 50),
(403, 'Bheramara', 6, 51),
(404, 'Daulatpur', 6, 51),
(405, 'Khoksa', 6, 51),
(406, 'Kumarkhali', 6, 51),
(407, 'Kushtia Sadar', 6, 51),
(408, 'Mirpur', 6, 51),
(409, 'Magura Sadar', 6, 52),
(410, 'Mohammadpur', 6, 52),
(411, 'Shalikha', 6, 52),
(412, 'Sreepur', 6, 52),
(413, 'Gangni', 6, 53),
(414, 'Meherpur Sadar', 6, 53),
(415, 'Mujibnagar', 6, 53),
(416, 'Kalia', 6, 54),
(417, 'Lohagara', 6, 54),
(418, 'Narail Sadar', 6, 54),
(419, 'Naragati', 6, 54),
(420, 'Assasuni', 6, 55),
(421, 'Debhata', 6, 55),
(422, 'Kalaroa', 6, 55),
(423, 'Kaliganj', 6, 55),
(424, 'Satkhira Sadar', 6, 54),
(425, 'Shyamnagar', 6, 55),
(426, 'Tala', 6, 55),
(427, 'Agailjhara', 7, 56),
(428, 'Babuganj', 7, 56),
(429, 'Bakerganj', 7, 56),
(430, 'Banaripara', 7, 56),
(431, 'Gaurnadi', 7, 56),
(432, 'Hizla', 7, 56),
(433, 'Barishal Sadar', 7, 56),
(434, 'Mehendiganj', 7, 56),
(435, 'Muladi', 7, 56),
(436, 'Wazirpur', 7, 56),
(437, 'Amtali', 7, 57),
(438, 'Bamna', 7, 57),
(439, 'Barguna Sadar', 7, 57),
(440, 'Betagi', 7, 57),
(441, 'Patharghata', 7, 57),
(442, 'Taltali', 7, 57),
(443, 'Bhola Sadar', 7, 58),
(444, 'Burhanuddin', 7, 58),
(445, 'Char Fasson', 7, 58),
(446, 'Daulatkhan', 7, 58),
(447, 'Lalmohan', 7, 58),
(448, 'Manpura', 7, 58),
(449, 'Tazumuddin', 7, 58),
(450, 'Jhalokati Sadar', 7, 59),
(451, 'Kathalia', 7, 59),
(452, 'Nalchity', 7, 59),
(453, 'Rajapur', 7, 59),
(454, 'Bauphal', 7, 60),
(455, 'Dashmina', 7, 60),
(456, 'Galachipa', 7, 60),
(457, 'Kalapara', 7, 60),
(458, 'Mirzaganj', 7, 60),
(459, 'Patuakhali Sadar', 7, 60),
(460, 'Rangabali', 7, 60),
(461, 'Dumki', 7, 60),
(462, 'Bhandaria', 7, 61),
(463, 'Kawkhali', 7, 61),
(464, 'Mathbaria', 7, 61),
(465, 'Nazirpur', 7, 61),
(466, 'Pirojpur Sadar', 7, 61),
(467, 'Nesarabad (Swarupkati)', 7, 61),
(468, 'Zianagar', 7, 61),
(469, 'Ajmiriganj', 8, 62),
(470, 'Bahubal', 8, 62),
(471, 'Baniyachong', 8, 62),
(472, 'Chunarughat', 8, 62),
(473, 'Habiganj Sadar', 8, 62),
(474, 'Lakhai', 8, 62),
(475, 'Madhabpur', 8, 62),
(476, 'Nabiganj', 8, 62),
(477, 'Sayestaganj', 8, 62),
(478, 'Barlekha', 8, 63),
(479, 'Juri', 8, 63),
(480, 'Kamalganj', 8, 63),
(481, 'Kulaura', 8, 63),
(482, 'Moulvibazar Sadar', 8, 63),
(483, 'Rajnagar', 8, 63),
(484, 'Sreemangal', 8, 63),
(485, 'Bishwamvarpur', 8, 64),
(486, 'Chhatak', 8, 64),
(487, 'Dakshin Sunamganj', 8, 64),
(488, 'Derai', 8, 64),
(489, 'Dharamapasha', 8, 64),
(490, 'Dowarabazar', 8, 64),
(491, 'Jagannathpur', 8, 64),
(492, 'Jagannathpur', 8, 64),
(493, 'Jamalganj', 8, 64),
(494, 'Sullah', 8, 64),
(495, 'Sunamganj Sadar', 8, 64),
(496, 'Tahirpur', 8, 64),
(497, 'Balaganj', 8, 65),
(498, 'Beanibazar', 8, 65),
(499, 'Bishwanath', 8, 65),
(500, 'Companigonj', 8, 65),
(501, 'Dakshin Surma', 8, 65),
(502, 'Fenchuganj', 8, 65),
(503, 'Golapganj', 8, 65),
(504, 'Gowainghat', 8, 65),
(505, 'Jaintiapur', 8, 65),
(506, 'Kanaighat', 8, 65),
(507, 'Osmani Nagar', 8, 65),
(508, 'Sylhet Sadar', 8, 65),
(509, 'Zakiganj', 8, 65);

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
  `gender` varchar(10) DEFAULT NULL,
  `presentDivisionId` int(11) DEFAULT NULL,
  `presentDistrictId` int(11) DEFAULT NULL,
  `presentSubDistrictId` int(11) DEFAULT NULL,
  `presentExtraAddress` varchar(300) DEFAULT NULL,
  `permanentDivisionId` int(11) DEFAULT NULL,
  `permanentDistrictId` int(11) DEFAULT NULL,
  `permanentSubDistrictId` int(11) DEFAULT NULL,
  `permanentExtraAddress` varchar(300) DEFAULT NULL,
  `voterImage` varchar(300) DEFAULT NULL,
  `phoneNumber` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fingerprint` varchar(300) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `createIp` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidNumber` (`nidNumber`),
  UNIQUE KEY `phoneNumber` (`phoneNumber`),
  UNIQUE KEY `email` (`email`),
  KEY `presentDivisionId` (`presentDivisionId`),
  KEY `presentDistrictId` (`presentDistrictId`),
  KEY `presentSubDistrictId` (`presentSubDistrictId`),
  KEY `permanentDivisionId` (`permanentDivisionId`),
  KEY `permanentDistrictId` (`permanentDistrictId`),
  KEY `permanentSubDistrictId` (`permanentSubDistrictId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
