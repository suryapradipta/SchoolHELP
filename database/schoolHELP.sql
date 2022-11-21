-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2022 at 03:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolHELP`
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

-- --------------------------------------------------------

--
-- Table structure for table `resourcerequest`
--

CREATE TABLE `resourcerequest` (
  `requestid` int(11) NOT NULL,
  `resourcetype` varchar(30) NOT NULL,
  `numrequired` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(24, 'd', 'd', 'd');

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
(2, 2, 1, 'school administrator'),
(1, 1, 66, 'schoolhe666'),
(41, 24, 2424, '2424');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `fullname`, `email`, `phone`) VALUES
(1, 'a', 'a', 'school help administrato udpdate', 'updated666@help.com', '55556666'),
(2, 'b', 'b', 'schooladministrator2', 'schooladministrator2@help.com', '222'),
(3, 'c', 'c', 'volunteer', 'volunteer@gmail.com', '123124'),
(41, 'kk', 'kk', 'kk', 'kk@m.com', '242424');

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
(3, '2022-11-08', 'tutor');

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
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `schoolid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schooladmin`
--
ALTER TABLE `schooladmin`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17172;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
