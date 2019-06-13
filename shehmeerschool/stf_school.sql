-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 05:52 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stf_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Class` int(10) DEFAULT NULL,
  `Section` varchar(4) DEFAULT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(1000) NOT NULL,
  `File` varchar(50) DEFAULT NULL,
  `SNo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Class`, `Section`, `Title`, `Text`, `File`, `SNo`) VALUES
(1, 'B', 'aaa', 'bbb', NULL, 1),
(NULL, NULL, 'This is a title', 'This is an announcement available to all.', '', 2),
(1, 'null', 'This ia another titl', 'This is an announcement available to class 1 students only', '', 3),
(1, '', 'new title1', 'ann for class1 only', '', 4),
(0, 'A', 'final title', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Student` bigint(255) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Student`, `Date`, `Status`) VALUES
(111, '2018-12-09', 'Present'),
(111, '2018-11-13', 'Present'),
(111, '2018-11-15', 'Absent'),
(111, '2018-12-10', 'Leave'),
(111, '2018-12-12', 'Present'),
(123, '2018-12-12', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassNo` int(10) NOT NULL,
  `Section` varchar(2) NOT NULL,
  `StudentCount` int(50) NOT NULL,
  `ClassTeacher` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Name` varchar(50) NOT NULL,
  `Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Name`, `Code`) VALUES
('English', 1),
('Urdu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `Item` varchar(100) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `Student` bigint(255) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`Student`, `Date`, `Status`, `Amount`) VALUES
(111, '2018-11-10', 'Paid', 30000),
(111, '2018-12-10', 'Unpaid', 30000),
(123, '2018-12-12', 'Unpaid', 111);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `CNIC` varchar(20) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Occupation` varchar(20) DEFAULT NULL,
  `Mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`CNIC`, `Name`, `Occupation`, `Mobile`) VALUES
('42101-xxxx-xxx', 'Xyz', 'Professor', '0333-1234567');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `Student` bigint(255) NOT NULL,
  `Quiz1` float NOT NULL,
  `Quiz2` float NOT NULL,
  `Quiz3` float NOT NULL,
  `First_term` float NOT NULL,
  `Half_year` float NOT NULL,
  `Final` float NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`Student`, `Quiz1`, `Quiz2`, `Quiz3`, `First_term`, `Half_year`, `Final`, `Course`) VALUES
(111, 23, 21, 22, 44, 45, 89, 'English'),
(111, 0, 0, 0, 23, 0, 0, 'Urdu');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Teacher` int(255) NOT NULL,
  `Date` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`Teacher`, `Date`, `Status`, `Amount`) VALUES
(12, '2018-12-12', 'Unpaid', 1500),
(111, '2018-12-15', 'Paid', 111),
(12, '2018-12-11', 'Unpaid', 50);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Name` varchar(100) NOT NULL,
  `ID` int(255) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `CNIC` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `GrNo` bigint(255) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `GuardianName` varchar(100) DEFAULT NULL,
  `ClassNo` int(10) DEFAULT NULL,
  `Section` varchar(2) DEFAULT NULL,
  `RollNo` int(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Contact` varchar(100) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `GuardianCNIC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`GrNo`, `Name`, `GuardianName`, `ClassNo`, `Section`, `RollNo`, `Address`, `Contact`, `Password`, `DOB`, `Gender`, `Email`, `Photo`, `GuardianCNIC`) VALUES
(111, 'Abc', 'Xyz', 5, 'A', 23, 'Somewhere, in the middle of nowhere', '0900-78601', 'abc', '1998-12-01', 'Male', 'k163807@nu.edu.pk', '', '42101-xxxx-xxx'),
(123, 'aaa', 'Xyz', 5, 'A', 20, 'aa', 'aa', 'aa', '2008-10-10', 'Male', 'aaa@example.com', '', '42101-xxxx-xxx');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `SID` bigint(255) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Name` varchar(50) NOT NULL,
  `ID` int(255) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `CNIC` varchar(25) NOT NULL,
  `Salary` float NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Contact` varchar(25) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `DOB` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Name`, `ID`, `Password`, `Qualification`, `CNIC`, `Salary`, `Designation`, `Contact`, `Address`, `Gender`, `Photo`, `Email`, `DOB`) VALUES
('name', 3, 'qqq', 'qqq', 'qqq', 123, 'qqq', '', 'qqq', '', '', 'q', '0000-00-00'),
('mr. x', 12, 'NewPass', 'MS', '42101-xxxx-xxx', 1500, 'teacher', '0333-xxxxxxx', 'street x', 'male', '', 'mrx@example.com', '1990-10-10'),
('aaa', 111, 'aaa', 'aaa', 'aaa', 111, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', '0000-00-00'),
('Helena', 123, 'abc', 'MS', '42101-xxxxx-xx', 15000, 'Teacher', '123', 'Street X', 'Female', '', 'helena@example.com', '01-01-1990');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `TID` int(255) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`TID`, `Course`) VALUES
(123, 'English'),
(123, 'Urdu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `Student` (`Student`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassNo`,`Section`),
  ADD KEY `ClassTeacher` (`ClassTeacher`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD KEY `student` (`Student`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`CNIC`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD KEY `Course` (`Course`),
  ADD KEY `Student` (`Student`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD KEY `Teacher` (`Teacher`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`GrNo`),
  ADD KEY `Guardian` (`GuardianCNIC`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD KEY `SID` (`SID`),
  ADD KEY `Course` (`Course`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `TID` (`TID`),
  ADD KEY `Course` (`Course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `SNo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `GrNo` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_fk` FOREIGN KEY (`Student`) REFERENCES `student` (`GrNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_fk` FOREIGN KEY (`Student`) REFERENCES `student` (`GrNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_fk1` FOREIGN KEY (`Student`) REFERENCES `student` (`GrNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_fk2` FOREIGN KEY (`Course`) REFERENCES `course` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_fk` FOREIGN KEY (`Teacher`) REFERENCES `teacher` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_fk1` FOREIGN KEY (`GuardianCNIC`) REFERENCES `guardian` (`CNIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_fk1` FOREIGN KEY (`SID`) REFERENCES `student` (`GrNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_fk2` FOREIGN KEY (`Course`) REFERENCES `course` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_fk1` FOREIGN KEY (`TID`) REFERENCES `teacher` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaches_fk2` FOREIGN KEY (`Course`) REFERENCES `course` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
