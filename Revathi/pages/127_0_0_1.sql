-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2018 at 02:35 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revathi-studentdb`
--
CREATE DATABASE IF NOT EXISTS `revathi-studentdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `revathi-studentdb`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `due`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `due`;
CREATE TABLE IF NOT EXISTS `due` (
`ADMN-NO` int(11)
,`SUBJECT` varchar(20)
,`T` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `feedb`
--

DROP TABLE IF EXISTS `feedb`;
CREATE TABLE IF NOT EXISTS `feedb` (
  `ADMN-NO` int(11) NOT NULL,
  `SUBJECT` varchar(20) NOT NULL,
  `MONTH-YEAR` date NOT NULL,
  `RECEIPT_ID` int(11) NOT NULL,
  `DATE-OF-PAYMENT` date NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  PRIMARY KEY (`ADMN-NO`,`SUBJECT`,`MONTH-YEAR`),
  KEY `SUBJECT` (`SUBJECT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feestructure`
--

DROP TABLE IF EXISTS `feestructure`;
CREATE TABLE IF NOT EXISTS `feestructure` (
  `SUBJECT` varchar(40) CHARACTER SET utf8 NOT NULL,
  `FEE` int(11) NOT NULL,
  `COUNT` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SUBJECT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feestructure`
--

INSERT INTO `feestructure` (`SUBJECT`, `FEE`, `COUNT`) VALUES
('VOCAL', 600, 0),
('VEENA', 200, 0),
('KEYBOARD', 1500, 0),
('VIOLIN', 1000, 0),
('GUITAR', 1000, 0),
('TABLA', 1000, 0),
('DRAWING', 1000, 0),
('DANCE', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentdb`
--

DROP TABLE IF EXISTS `studentdb`;
CREATE TABLE IF NOT EXISTS `studentdb` (
  `ADMN-NO` int(11) NOT NULL,
  `NAME` varchar(30) CHARACTER SET utf8 NOT NULL,
  `FATHERS-NAME` varchar(30) CHARACTER SET utf8 NOT NULL,
  `F-OCCUPATION` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DATE-OF-ADMN` date DEFAULT NULL,
  `ADDRESS` text CHARACTER SET utf8 NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `SUBJECT` varchar(150) CHARACTER SET utf8 NOT NULL,
  `FEES-TOTAL` int(11) DEFAULT NULL,
  `SCHOOL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ADMN-STATUS` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'open',
  PRIMARY KEY (`ADMN-NO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `due`
--
DROP TABLE IF EXISTS `due`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `due`  AS  select `a`.`ADMN-NO` AS `ADMN-NO`,`a`.`SUBJECT` AS `SUBJECT`,timestampdiff(MONTH,max(`a`.`MONTH-YEAR`),'2018-11-18') AS `T` from (`feedb` `a` join `studentdb` `b` on((`a`.`ADMN-NO` = `b`.`ADMN-NO`))) where (`b`.`ADMN-STATUS` = 'open') group by `a`.`ADMN-NO`,`a`.`SUBJECT` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
