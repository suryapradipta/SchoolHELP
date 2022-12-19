-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 07:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolhelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `userid` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `offerdate` date NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `offerstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`userid`, `requestid`, `offerdate`, `remarks`, `offerstatus`) VALUES
(42, 1, '2022-12-19', 'Halo test offer', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `schoolid` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `requestdate` date NOT NULL,
  `requeststatus` varchar(15) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`schoolid`, `requestid`, `requestdate`, `requeststatus`, `description`) VALUES
(2, 1, '2022-12-19', 'NEW', 'a'),
(2, 2, '2022-12-19', 'NEW', 'Resource Request 1'),
(2, 3, '2022-12-19', 'NEW', 'Tutorial Request 1'),
(2, 4, '2022-12-19', 'NEW', 'Tutorial Request 2'),
(2, 5, '2022-12-19', 'NEW', 'Resource Request 2'),
(2, 6, '2022-12-19', 'NEW', 'dhiyo');

-- --------------------------------------------------------

--
-- Table structure for table `resourcerequest`
--

CREATE TABLE `resourcerequest` (
  `requestid` int(11) NOT NULL,
  `resourcetype` varchar(30) NOT NULL,
  `numrequired` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resourcerequest`
--

INSERT INTO `resourcerequest` (`requestid`, `resourcetype`, `numrequired`) VALUES
(2, 'Mobile Device', 15),
(5, 'Mobile Device', 1515);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `schoolid` int(11) NOT NULL,
  `schoolname` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolid`, `schoolname`, `address`, `city`) VALUES
(1, 'HELP University', 'No. 15, Jalan Sri Semantan 1, Off, Jalan Semantan, Bukit Damansara, 50490 Kuala Lumpur, Malaysia', 'Kuala Lumpur'),
(2, 'ITB Stikom Bali', 'Jl. Raya Puputan No.86, Dangin Puri Klod, Kec. Denpasar Tim., Kota Denpasar, Bali 80234\r\n', 'Denpasar'),
(21, 'a', 'a', 'a'),
(22, 'b', 'b', 'b'),
(23, 'c', 'c', 'c'),
(24, 'd', 'd', 'd'),
(25, 'Marsudirini', 'Bekasi', 'Bekasi'),
(26, 'Bakta', 'Kediri', 'Tabanan');

-- --------------------------------------------------------

--
-- Table structure for table `schooladmin`
--

CREATE TABLE `schooladmin` (
  `userid` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schooladmin`
--

INSERT INTO `schooladmin` (`userid`, `schoolid`, `staffid`, `position`) VALUES
(2, 2, 1, 'School Administrator'),
(1, 1, 66, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tutorialrequest`
--

CREATE TABLE `tutorialrequest` (
  `requestid` int(11) NOT NULL,
  `proposeddate` date NOT NULL,
  `proposedtime` varchar(30) NOT NULL,
  `studentlevel` varchar(30) NOT NULL,
  `numstudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorialrequest`
--

INSERT INTO `tutorialrequest` (`requestid`, `proposeddate`, `proposedtime`, `studentlevel`, `numstudents`) VALUES
(1, '2023-12-15', '15:13', '5', 5),
(3, '2022-12-12', '15:15', '15', 15),
(4, '2022-12-15', '15:15', '15', 15),
(6, '2023-12-15', '01:53', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `fullname`, `email`, `phone`) VALUES
(1, 'HELP', '0cc175b9c0f1b6a831c399e269772661', 'HELP Admin', 'admin@help.com', '123'),
(2, 'stikom', '0cc175b9c0f1b6a831c399e269772661', 'Admin Stikom', 'D@Stikom-bali.ac.id', '123456'),
(42, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@a', '15'),
(43, 'b', '0cc175b9c0f1b6a831c399e269772661', 'b', 'b@b', '1'),
(44, 'enc', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@a', '1'),
(45, 'encrpyt', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@a', '1'),
(46, 'z', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a@a', '11'),
(47, 'e', '0cc175b9c0f1b6a831c399e269772661', '15', 'a@a', '15');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `userid` int(11) NOT NULL,
  `dateofbirth` date NOT NULL,
  `occupation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`userid`, `dateofbirth`, `occupation`) VALUES
(42, '2022-11-28', '34'),
(43, '0015-12-15', 'b'),
(44, '2345-12-05', 'a'),
(45, '5345-12-23', '5a'),
(46, '0545-05-04', '343'),
(47, '0001-12-15', '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`requestid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestid`),
  ADD KEY `schoolid` (`schoolid`);

--
-- Indexes for table `resourcerequest`
--
ALTER TABLE `resourcerequest`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`schoolid`);

--
-- Indexes for table `schooladmin`
--
ALTER TABLE `schooladmin`
  ADD PRIMARY KEY (`staffid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `schoolid` (`schoolid`);

--
-- Indexes for table `tutorialrequest`
--
ALTER TABLE `tutorialrequest`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `schooladmin`
--
ALTER TABLE `schooladmin`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17172;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `volunteer` (`userid`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`requestid`) REFERENCES `request` (`requestid`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`schoolid`) REFERENCES `school` (`schoolid`);

--
-- Constraints for table `resourcerequest`
--
ALTER TABLE `resourcerequest`
  ADD CONSTRAINT `resourcerequest_ibfk_1` FOREIGN KEY (`requestid`) REFERENCES `request` (`requestid`);

--
-- Constraints for table `schooladmin`
--
ALTER TABLE `schooladmin`
  ADD CONSTRAINT `schooladmin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `schooladmin_ibfk_2` FOREIGN KEY (`schoolid`) REFERENCES `school` (`schoolid`);

--
-- Constraints for table `tutorialrequest`
--
ALTER TABLE `tutorialrequest`
  ADD CONSTRAINT `tutorialrequest_ibfk_1` FOREIGN KEY (`requestid`) REFERENCES `request` (`requestid`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
