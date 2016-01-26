-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 10:14 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flat_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressdetails`
--

CREATE TABLE IF NOT EXISTS `addressdetails` (
`FlatCode` mediumint(50) unsigned NOT NULL COMMENT 'The Vendor Code No. (By Corp. Purchase)',
  `AddressLine1` longtext,
  `AddressLine2` longtext,
  `City` text NOT NULL,
  `Pin` mediumint(6) NOT NULL,
  `Country` text NOT NULL,
  `State` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Contains Vendor''s Details';

--
-- Dumping data for table `addressdetails`
--

INSERT INTO `addressdetails` (`FlatCode`, `AddressLine1`, `AddressLine2`, `City`, `Pin`, `Country`, `State`) VALUES
(1, 'jkl', 'jkl', 'kln', 5, 'Kazakhstan', 'Aqtobe'),
(2, 'n', 'n', 'nnn', 2545, 'Namibia', 'Erongo'),
(3, 'k', 'k', 'k', 69, 'Kenya', 'Eastern'),
(4, 'jn', 'jn', 'j', 4, 'Namibia', 'Hardap'),
(5, '', '', '', 0, '-1', ''),
(6, 'hjk', 'hjk', 'jj', 8687, 'Iceland', 'Isafjordhur'),
(7, 'hj', 'hj', 'jcj', 534, 'Jamaica', 'Manchester'),
(8, 'j', 'j', 'j', 65, 'Jamaica', 'Clarendon'),
(9, 'fashion street', 'fashion street', 'las angeles', 101010, 'American Samoa', 'Western'),
(10, 'bjh', 'bjh', 'bh', 563, 'Bhutan', 'Bumthang'),
(11, 'jh', 'jh', '465', 55, 'Iceland', 'Isafjordhur'),
(12, 'jlk', 'jlk', 'jk', 5454, 'Namibia', 'Karas'),
(13, 'bjb', 'bjb', 'jhb', 54, 'Haiti', 'Nord'),
(14, 'hkj', 'hkj', 'ghj', 45, 'Europa Island', 'Europa Island'),
(15, 'bj', 'bj', 'bhj', 58, 'Bhutan', 'Bumthang');

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE IF NOT EXISTS `agreement` (
  `FlatCode` mediumint(50) unsigned NOT NULL,
`AgreementID` mediumint(50) unsigned NOT NULL,
  `Buyer` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SellerID` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreement`
--

INSERT INTO `agreement` (`FlatCode`, `AgreementID`, `Buyer`, `Time`, `SellerID`) VALUES
(11, 1, 'sja', '2015-10-02 17:15:45', 'sk'),
(11, 2, 'sja', '2015-10-02 17:16:39', 'sk'),
(11, 3, 'sja', '2015-10-02 17:17:14', 'sk'),
(11, 4, 'sja', '2015-10-02 17:17:56', 'sk'),
(11, 5, 'sja', '2015-10-02 17:41:36', 'sk'),
(12, 6, 'sja', '2015-10-02 17:41:40', ''),
(10, 7, 'sja', '2015-10-02 17:42:24', 'sk'),
(10, 8, 'sja', '2015-10-02 17:42:39', 'sk'),
(0, 9, '', '2015-10-12 06:03:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE IF NOT EXISTS `contactdetails` (
`FlatCode` mediumint(50) unsigned NOT NULL,
  `Telephone1` decimal(10,0) NOT NULL,
  `Telephone2` decimal(10,0) NOT NULL,
  `ContactPerson` mediumtext NOT NULL,
  `ContactPersonno.` decimal(10,0) NOT NULL,
  `FAX` decimal(10,0) NOT NULL,
  `Email` text NOT NULL,
  `Website` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactdetails`
--

INSERT INTO `contactdetails` (`FlatCode`, `Telephone1`, `Telephone2`, `ContactPerson`, `ContactPersonno.`, `FAX`, `Email`, `Website`) VALUES
(1, '0', '0', 'nk', '0', '0', 'lnkl', 'nlk'),
(2, '0', '0', 'nm', '0', '0', 'bn', 'b'),
(3, '0', '0', 'k', '0', '0', 'k', 'k'),
(4, '0', '0', 'jknj', '0', '0', 'nj', 'nj'),
(5, '0', '0', '', '0', '0', '', ''),
(6, '0', '0', 'i', '0', '0', 'i', 'i'),
(7, '0', '0', 'bj', '0', '0', 'bh', 'b'),
(8, '0', '0', 'jk', '0', '0', 'j', 'j'),
(9, '8948773941', '8955015949', 'imsherlock', '8430122325', '23456', 'tayal05@gmail.com', 'bestman.com'),
(10, '0', '0', 'hb', '0', '0', 'bj', 'kb'),
(11, '0', '0', 'ii', '0', '0', 'i', 'i'),
(14, '0', '0', 'nkj', '0', '0', 'nlk', 'nkjh'),
(15, '0', '0', 'bjh', '0', '0', 'jb', 'jk'),
(16, '0', '0', 'kggk', '0', '0', 'ghgh', 'kgh'),
(17, '0', '0', 'bjk', '0', '0', 'bkj', 'bkj'),
(18, '0', '0', 'bhj', '0', '0', 'bhj', 'bhj');

-- --------------------------------------------------------

--
-- Table structure for table `flatdetails`
--

CREATE TABLE IF NOT EXISTS `flatdetails` (
`ID` mediumint(50) unsigned NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FlatTitle` mediumtext,
  `Area` int(11) DEFAULT NULL,
  `Landmark` text,
  `Type` text,
  `Price` int(50) unsigned DEFAULT NULL COMMENT 'MoneyisEverything:p',
  `PayTerm` varchar(20) NOT NULL,
  `PayMethod` varchar(6) NOT NULL,
  `Views` int(50) NOT NULL,
  `Username` text NOT NULL,
  `State` varchar(8) NOT NULL DEFAULT 'unsold'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flatdetails`
--

INSERT INTO `flatdetails` (`ID`, `Time`, `FlatTitle`, `Area`, `Landmark`, `Type`, `Price`, `PayTerm`, `PayMethod`, `Views`, `Username`, `State`) VALUES
(1, '2015-09-27 05:32:11', 'dlsk', 0, 'knk', 'jkl', 0, 'nkl', 'Cheque', 0, '', 'unsold'),
(2, '2015-09-27 05:32:11', 'naa', 0, 'jhj', 'nn', 0, 'j', 'Cheque', 0, '', 'unsold'),
(4, '2015-09-27 05:32:11', 'kya', 0, 'nkj', 'kjn', 0, 'njk', 'RTGS', 0, '', 'unsold'),
(5, '2015-09-27 05:32:11', 'nnm', 0, '', '', 0, '', 'RTGS', 0, '', 'unsold'),
(6, '2015-09-27 05:32:11', 'kj', 0, 'iii', 'hj', 0, 'i', 'RTGS', 0, '', 'unsold'),
(7, '2015-09-27 05:32:11', '?', 0, 'nkjh', 'hkj', 0, 'bh', 'RTGS', 0, '', 'unsold'),
(8, '2015-09-27 05:32:11', 'kya?', 0, 'kj', 'j', 0, 'jjj', 'RTGS', 0, '', 'unsold'),
(9, '2015-09-27 05:32:11', 'jalwa', 10, 'bar', 'sexy', 0, '3', 'RTGS', 0, '', 'unsold'),
(10, '2015-09-27 05:32:11', 'dskfjn', 0, 'b', 'bj', 0, 'b', 'RTGS', 0, 'sk', 'unsold'),
(11, '2015-09-27 05:36:06', 'naya sa', 0, 'iii', 'kj', 0, 'i', 'RTGS', 0, 'sk', 'unsold'),
(12, '2015-10-12 07:32:11', 'new', 0, 'hj', 'kj', 5000, 'ds.kfsdn', 'RTGS', 0, 'sk', 'unsold'),
(13, '2015-10-12 08:38:37', 'myfalt', 56, 'kathmandy', '2bhk', 1500, 'dksj', 'kj', 0, 'kjnds', 'unsold'),
(14, '2015-10-12 12:06:24', 'kya', 0, 'h', 'hjk', 0, 'kjb', 'RTGS', 0, 'sk', 'unsold'),
(15, '2015-10-12 12:11:32', '$flattitlev', 0, '$landmarkv', '$typev', 0, '$paytermv', '$payme', 0, '$username', 'unsold'),
(16, '2015-10-12 12:14:29', 'ekghar', 0, 'n', 'kljk', 656, 'ij', 'RTGS', 0, 'sk', 'unsold'),
(17, '2015-10-12 12:17:33', 'kj', 0, 'jkjk', 'j', 0, 'bkj', 'RTGS', 0, 'sk', 'unsold'),
(18, '2015-10-12 12:18:55', 'dslk', 0, 'ghj', 'nkj', 0, 'gk', 'RTGS', 0, 'sk', 'unsold'),
(19, '2015-10-12 12:20:11', 'kdsm', 0, 'hb', 'jb', 0, 'bkj', 'RTGS', 0, 'sk', 'unsold'),
(20, '2015-10-12 12:20:53', 'k', 0, 'bhj', 'bjk', 0, 'bhj', 'RTGS', 0, 'sk', 'unsold');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`Id` int(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(260) NOT NULL,
  `Pan` int(10) NOT NULL,
  `Contact` int(15) NOT NULL,
  `PerAddr` varchar(200) NOT NULL,
  `Answer` varchar(150) NOT NULL,
  `Gender` mediumtext NOT NULL,
  `BuyerSeller` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Id`, `FirstName`, `MiddleName`, `LastName`, `EmailId`, `Username`, `Password`, `Pan`, `Contact`, `PerAddr`, `Answer`, `Gender`, `BuyerSeller`) VALUES
(1, 'Ayushi', '', 'Gurha', 'ayushigurha@gmail.com', 'ayushi_gurha', 'gurha1234', 1234567890, 2147483647, 'F-4,KNGH,MNNIT,Allahabad', '', 'Female', 'Seller'),
(2, 'Ayushi', '', 'Gurha', 'ayushi@gmail.com', 'gurha_15', '$2y$10$iZbh.VagkB6VNYoBzVL.IeLOuqW4NzHghpjTfL3HdHh9uc9XVcS56', 2147483647, 2147483647, 'F-4,KNGH,MNNIT,Allahabad', '', 'Female', 'Buyer'),
(3, 'k', '', 'k', '2@w.c', 's', '$2y$10$gY6iIhzmyGd7qOjYk7hOjO0n1ctxvR.spdGof47tiPFe9.H5g9YSq', 1, 8, 's', 's', 'Male', 'Seller'),
(4, 'prakhar', '', 'tayal', 'tayal05@gmail.com', 'ak47', '$2y$10$jcStMppMfgGHRb3jEqYm/Oi0kyfefMEsVlPNjiXR70e7w.PbJzx5O', 123456789, 23456789, 'wertyuiop', '123456789', 'Male', 'Seller'),
(5, 'a', 's', 's', 'ska@dks.com', 'sk', '$2y$10$vtasmSG/0FKCpry5XTl74uJjI.Qqsnm1AUCrt56oo30TZw5s8tk1m', 0, 58, 'dd', 'ks', 'Male', 'Seller'),
(6, 'ayushi', '', 'gurha', 'aditigurha@gmail.com', 'gurha', '$2y$10$zvZI7/dxPnaIGBLEad/kdOdXhJ9t3QuehMaOSs9lsA/keFXKqV21S', 21648108, 2147483647, 'F-4, KNGH, MNNIT, Allahabad', 'gurha', 'Female', 'Seller'),
(7, 'kua', 'kjdks', 'khjk', 'hjh@fn.com', 'sja', '$2y$10$FrC1MMPgdedUowCV8NW84uB953zKgwqc5dgoASDTkKJwlHG3jhwz2', 0, 0, 'jkh', 'j', 'Male', 'Seller'),
(8, 'ayushi', '', 'gurha', 'ayu@uhuh.com', 'ay', '$2y$10$.Z9I/6ITLP6ty.qJxO7ZTeuhq54Cie6Lg3mcTGuRxOg/uBlWrMZ0C', 2147483647, 2147483647, 'F-4,KNGH,MNNIT,Allahabad', 'blah blah', 'Female', 'Buyer');

-- --------------------------------------------------------

--
-- Table structure for table `machinelearningkindaa`
--

CREATE TABLE IF NOT EXISTS `machinelearningkindaa` (
`ID` int(50) NOT NULL,
  `Buyername` varchar(50) NOT NULL,
  `SearchID` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machinelearningkindaa`
--

INSERT INTO `machinelearningkindaa` (`ID`, `Buyername`, `SearchID`) VALUES
(1, 'ay', 73167439);

-- --------------------------------------------------------

--
-- Table structure for table `mapin`
--

CREATE TABLE IF NOT EXISTS `mapin` (
`FlatCode` mediumint(50) unsigned NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Addr` varchar(250) NOT NULL,
  `Lat` float(10,6) NOT NULL,
  `Lng` float(10,6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapin`
--

INSERT INTO `mapin` (`FlatCode`, `Username`, `Addr`, `Lat`, `Lng`) VALUES
(1, 'gurha', 'Unnamed Road, Devipura-1, Bulandshahr, Uttar Pradesh 203001, India', 28.411484, 77.856903),
(4, 'sk', 'kathmandu', 27.717245, 85.323959),
(6, '', '', 0.000000, 0.000000);

-- --------------------------------------------------------

--
-- Table structure for table `mostsearched`
--

CREATE TABLE IF NOT EXISTS `mostsearched` (
`ID` int(11) NOT NULL,
  `Keyword` text NOT NULL,
  `Count` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mostsearched`
--

INSERT INTO `mostsearched` (`ID`, `Keyword`, `Count`) VALUES
(1, 'searching for new', 1),
(2, 'himatwala', 1),
(3, 'yolo', 1),
(4, 'allahabad', 1),
(5, '', 1),
(6, 'Bareilly', 1),
(7, 'jkl', 1),
(8, 'k', 1),
(9, 'bareily', 1),
(10, 'j', 1),
(11, 'nn', 1),
(12, 'n', 1),
(13, 'hjk', 1),
(14, 'fashion street', 1),
(15, 'ksd', 1),
(16, 'jn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`ID` mediumint(50) NOT NULL,
  `AgreementID` mediumint(50) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Seen` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `AgreementID`, `User`, `Seen`) VALUES
(2, 3, 'sja', 'y'),
(3, 4, 'sja', 'y'),
(4, 4, 'sk', 'y'),
(5, 5, 'sja', 'y'),
(6, 5, 'sk', 'y'),
(7, 6, 'sja', 'y'),
(8, 6, '', 'n'),
(9, 7, 'sja', 'y'),
(10, 7, 'sk', 'y'),
(11, 8, 'sja', 'y'),
(12, 8, 'sk', 'y'),
(13, 9, '', 'n'),
(14, 9, '', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressdetails`
--
ALTER TABLE `addressdetails`
 ADD PRIMARY KEY (`FlatCode`);

--
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
 ADD PRIMARY KEY (`AgreementID`);

--
-- Indexes for table `contactdetails`
--
ALTER TABLE `contactdetails`
 ADD PRIMARY KEY (`FlatCode`);

--
-- Indexes for table `flatdetails`
--
ALTER TABLE `flatdetails`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `Username` (`Username`), ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `machinelearningkindaa`
--
ALTER TABLE `machinelearningkindaa`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mapin`
--
ALTER TABLE `mapin`
 ADD PRIMARY KEY (`FlatCode`);

--
-- Indexes for table `mostsearched`
--
ALTER TABLE `mostsearched`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressdetails`
--
ALTER TABLE `addressdetails`
MODIFY `FlatCode` mediumint(50) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Vendor Code No. (By Corp. Purchase)',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `agreement`
--
ALTER TABLE `agreement`
MODIFY `AgreementID` mediumint(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contactdetails`
--
ALTER TABLE `contactdetails`
MODIFY `FlatCode` mediumint(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `flatdetails`
--
ALTER TABLE `flatdetails`
MODIFY `ID` mediumint(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `machinelearningkindaa`
--
ALTER TABLE `machinelearningkindaa`
MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mapin`
--
ALTER TABLE `mapin`
MODIFY `FlatCode` mediumint(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mostsearched`
--
ALTER TABLE `mostsearched`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `ID` mediumint(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
