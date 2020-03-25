-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tetratheos`
--

drop database tetratheos;
create database tetratheos;
use tetratheos;
-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `subjectID` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `mark` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`subjectID`, `studentID`, `mark`) VALUES
('DIP1MPR01', 'B1900071', NULL),
('DIP1MPR01', 'B1900095', NULL),
('DIP1PRG12', 'B1900071', NULL),
('DIP202', 'B1900071', NULL),
('DIP202', 'B1900095', NULL),
('DIP203', 'B1900071', NULL),
('DIP222', 'B1900071', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` varchar(20) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `lectureID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`, `description`, `lectureID`) VALUES
('DIP1CTS03', 'Computer Technology Essentials', 'Com tech', 'L102'),
('DIP1ITC04', 'Introduction to Networking', 'Networking', 'L101'),
('DIP1MPR01', 'IT Mini Project', 'final year killer', 'L101'),
('DIP1PRG12', 'Introduction to Structured Programming', 'C programming', 'L103'),
('DIP200', 'Introduction to Computer Architecture', 'Com Arch', 'L105'),
('DIP202', 'Business Communication', 'BUSINESS OF ALL COMMUNICATION TO TALK COMM', 'L104'),
('DIP203', 'Database Concepts and Practices', 'DATABASE LANAT\r\n', 'L105'),
('DIP222', 'Python', 'FONG DA BEST LECUTRER U SEE NOTHING', 'L104');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submissionID` varchar(20) NOT NULL,
  `submissionDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `adminID` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `subjectID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `userType` char(1) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `phoneNumber`, `email`, `address`, `userType`, `password`) VALUES
('A101', 'Sanda', '0147483647', 'sanda91@gmail.com', '', 'a', 'abc'),
('B1800931', 'Kai Sen', '0122308273', 'kaisen321@hotmail.com', '', 's', 'abc'),
('B1900071', 'Johann', '0122309882', 'choojiahan@gmail.com', '', 's', 'abc'),
('B1900095', 'Jia Le', '01237483432', 'yugidragon@gmail.com', '', 's', 'abc'),
('L101', 'Steve', '0139382732', 'steve69@yahoo.com', '', 'l', 'abc'),
('L102', 'Koo', '0139283924', 'koo321@gmail.com', '', 'l', 'abc'),
('L103', 'Seeth', '0189283923', 'seeth11@gmail.com', '', 'l', 'abc'),
('L104', 'Fung', '0138327883', 'fung32@gmail.com', '', 'l', 'abc'),
('L105', 'Dew', '0134928392', 'dew0000@gmail.com', '', 'l', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`subjectID`,`studentID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submissionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
