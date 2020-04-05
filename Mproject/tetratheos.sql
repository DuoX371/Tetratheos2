-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 08:49 PM
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

use tetratheos;
-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcementInfo` varchar(300) DEFAULT NULL,
  `announcementNote` varchar(300) DEFAULT NULL,
  `adminID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementInfo`, `announcementNote`, `adminID`) VALUES
('Today no class', '-Remind student to wear underwear', 'A101');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` varchar(20) NOT NULL,
  `dueDate` datetime NOT NULL DEFAULT current_timestamp(),
  `assignmentType` varchar(5) NOT NULL,
  `subjectID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `dueDate`, `assignmentType`, `subjectID`) VALUES
('DIP1CTS03a', '2020-03-12 14:00:00', 'a', 'DIP1CTS03'),
('DIP1CTS03b', '2020-03-28 23:58:29', 'b', 'DIP1CTS03'),
('DIP1ITC04a', '2020-03-28 23:58:36', 'a', 'DIP1ITC04'),
('DIP1MPR01a', '2020-04-06 14:00:00', 'a', 'DIP1MPR01'),
('DIP1PRG12a', '2020-03-28 23:59:16', 'a', 'DIP1PRG12'),
('DIP200a', '2020-03-28 23:59:23', 'a', 'DIP200'),
('DIP202a', '2020-03-28 23:59:33', 'a', 'DIP202'),
('DIP202b', '2020-03-28 23:59:38', 'b', 'DIP202'),
('DIP203a', '2020-03-28 23:59:51', 'a', 'DIP203'),
('DIP203b', '2020-03-28 23:59:55', 'b', 'DIP203'),
('DIP216', '2020-04-03 17:06:36', '-', 'DIP216'),
('DIP222a', '2020-03-29 00:00:09', 'a', 'DIP222'),
('DIP222b', '2020-03-29 00:00:13', 'b', 'DIP222');

-- --------------------------------------------------------

--
-- Table structure for table `assignmentmark`
--

CREATE TABLE `assignmentmark` (
  `studentID` varchar(20) NOT NULL,
  `assignmentID` varchar(20) NOT NULL,
  `mark` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignmentmark`
--

INSERT INTO `assignmentmark` (`studentID`, `assignmentID`, `mark`) VALUES
('B1900071', 'DIP1MPR01a', NULL),
('B1900071', 'DIP1PRG12a', NULL),
('B1900071', 'DIP202a', NULL),
('B1900071', 'DIP202b', NULL),
('B1900071', 'DIP203a', NULL),
('B1900071', 'DIP203b', NULL),
('B1900071', 'DIP222a', NULL),
('B1900071', 'DIP222b', NULL),
('B1900095', 'DIP1MPR01a', NULL),
('B1900095', 'DIP202a', NULL),
('B1900095', 'DIP202b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `subjectID` varchar(20) NOT NULL,
  `studentID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`subjectID`, `studentID`) VALUES
('DIP1ITC04', 'B1800931'),
('DIP1MPR01', 'B1900071'),
('DIP1MPR01', 'B1900095'),
('DIP1PRG12', 'B1900071'),
('DIP202', 'B1900071'),
('DIP202', 'B1900095'),
('DIP203', 'B1900071'),
('DIP222', 'B1900071');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` varchar(20) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `enrollmentKey` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lecturerID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`, `enrollmentKey`, `password`, `lecturerID`) VALUES
('DIP1CTS03', 'Computer Technology Essentials', 'comtech', 'abc', 'L102'),
('DIP1ITC04', 'Introduction to Networking', '', 'abc', 'L101'),
('DIP1MPR01', 'IT Mini Project', '', 'abc', 'L101'),
('DIP1PRG12', 'Introduction to Structured Programming', 'iseeuc', 'abc', 'L103'),
('DIP200', 'Introduction to Computer Architecture', 'comarch', 'abc', 'L105'),
('DIP202', 'Business Communication', 'busicom', 'abc', 'L104'),
('DIP203', 'Database Concepts and Practices', 'datadata', 'abc', 'L105'),
('DIP216', 'Industrial Internship', 'internintern', 'abc', 'L102'),
('DIP222', 'Python', 'paithon', 'abc', 'L104');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submissionID` varchar(20) NOT NULL,
  `submissionDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `submissionFile` longblob NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `subjectID` varchar(20) NOT NULL,
  `assignmentID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submissionID`, `submissionDateTime`, `submissionFile`, `studentID`, `subjectID`, `assignmentID`) VALUES
('SBMDIP1MPR01B1900071', '2020-04-04 14:12:11', 0x43565f4a482e646f6378, 'B1900071', 'DIP1MPR01', 'DIP1MPR01a'),
('SBMDIP1PRG12B1900071', '2020-04-05 02:15:16', 0x636172645f6e616d655f646174652e706466, 'B1900071', 'DIP1PRG12', 'DIP1PRG12a'),
('SBMDIP222B1900071', '2020-04-05 01:59:03', 0x6c65747465725f6e616d655f646174652e706466, 'B1900071', 'DIP222', 'DIP222a');

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
('L101', 'Steve', '012309283', 'steve321@gmail.com', '', 'l', 'abc'),
('L102', 'Koo', '0139283924', 'koo321@gmail.com', '', 'l', 'abc'),
('L103', 'Seeth', '0189283923', 'seeth11@gmail.com', '', 'l', 'abc'),
('L104', 'Fung', '0133293723', 'fung32@gmail.com', '', 'l', 'abc'),
('L105', 'Dew', '0134928392', 'dew0000@gmail.com', '', 'l', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`);

--
-- Indexes for table `assignmentmark`
--
ALTER TABLE `assignmentmark`
  ADD PRIMARY KEY (`studentID`,`assignmentID`);

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
