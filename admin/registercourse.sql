-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 04:19 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registercourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `blobupload`
--

CREATE TABLE `blobupload` (
  `ID` int(11) NOT NULL,
  `blobupload` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `About` varchar(100) NOT NULL,
  `Startdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Name`, `About`, `Startdate`) VALUES
(101215, 'Php advanced', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2021-06-26'),
(101217, 'HTML', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '2021-06-29'),
(101227, 'SOmething', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', '2021-07-08'),
(101230, 'Php ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit', '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegisterID` int(20) NOT NULL,
  `courseid` int(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `Status` enum('confirm','decline') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegisterID`, `courseid`, `userid`, `Status`) VALUES
(51, 101227, 1900, 'confirm'),
(58, 101217, 1905, 'confirm'),
(59, 101215, 1911, 'confirm'),
(60, 101230, 1900, ''),
(61, 101215, 1905, NULL),
(62, 101227, 1905, NULL),
(63, 101230, 1905, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `UserID` int(50) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Contact` int(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`UserID`, `Name`, `Contact`, `Username`, `Password`, `Role`) VALUES
(1900, 'John Doe', 456125854, 'johndoe1900', '6579e96f76baa00787a28653876c6127', 'user'),
(1903, 'Ayesha', 25448456, 'ayesha1903', 'cec9818936add98229817fb432540b18', 'admin'),
(1905, 'vinita', 215648, 'vinita1905', '91565556484b7c2d85871a2130248fce', 'user'),
(1911, 'steve1907', 21025688, 'steve', 'd69403e2673e611d4cbd3fad6fd1788e', 'user'),
(1923, 'Sam White', 20156777, 'samwhite1901', '111f3a58e4e86e14927d8e5ce756df0a', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blobupload`
--
ALTER TABLE `blobupload`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegisterID`),
  ADD UNIQUE KEY `RegisterID` (`RegisterID`,`courseid`,`userid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blobupload`
--
ALTER TABLE `blobupload`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101232;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegisterID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `usertable` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
