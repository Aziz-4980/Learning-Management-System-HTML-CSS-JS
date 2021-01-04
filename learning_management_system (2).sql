-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 11:33 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_management_system`
--
CREATE DATABASE IF NOT EXISTS `learning_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `learning_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Email`, `Password`, `Type`) VALUES
('admin@gmail.com', '1234', 'Administrator'),
('aziz@gmail.com', 'qwert', 'Teacher'),
('azoz@gmail.com', 'thymk', 'Teacher'),
('byu@gmail.com', 'byuu', 'Department Manager'),
('hassan@gmail.com', '90876', 'Teacher'),
('irum@gmail.com', '11111111', 'Teacher'),
('oniae@gmail.com', '12345678', 'Student'),
('qawi@hotmail.com', '1987', 'Teacher'),
('sis@gmail.com', '1234', 'Teacher'),
('sn8357225@gmail.com', '123456', 'Student'),
('vicky@gmail.com', 'vicky', 'Department Manager');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `AdminID` int(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `AdminName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`AdminID`, `Email`, `AdminName`) VALUES
(1, 'admin@gmail.com', 'ABC Khan');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment` (
  `AssignmentNo` int(5) NOT NULL,
  `CourseCode` int(5) NOT NULL,
  `AssignmentTopic` varchar(30) NOT NULL,
  `UploadDateTime` datetime NOT NULL,
  `DueDateTime` datetime NOT NULL,
  `SubmissionDateTime` datetime NOT NULL,
  `AssignmentFile` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `CourseCode` int(5) NOT NULL,
  `DeptNo` int(3) NOT NULL,
  `SemesterID` int(5) NOT NULL,
  `TeacherID` int(10) NOT NULL,
  `Program` varchar(10) NOT NULL,
  `CourseName` varchar(50) NOT NULL,
  `CreditHours` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE `dept` (
  `DeptNo` int(11) NOT NULL,
  `DeptName` varchar(50) NOT NULL,
  `ManagerID` varchar(30) NOT NULL,
  `ManagerName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`DeptNo`, `DeptName`, `ManagerID`, `ManagerName`) VALUES
(14, 'QASMS', 'vicky@gmail.com', 'Vicky'),
(17, 'Chemistry', 'chem@gmail.com', 'Vicky'),
(18, 'Information Technology', 'IT@gmail.com', 'Faraz Khan');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

DROP TABLE IF EXISTS `lecture`;
CREATE TABLE `lecture` (
  `LectureNo` int(5) NOT NULL,
  `CourseCode` int(5) NOT NULL,
  `LectureTopic` varchar(30) NOT NULL,
  `UploadDateTime` datetime NOT NULL,
  `LectureFile` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `DeptNo` int(3) NOT NULL,
  `SemesterID` int(5) NOT NULL,
  `FallSemester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `StudentID` int(10) NOT NULL,
  `DeptNo` int(3) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `SemesterID` int(5) NOT NULL,
  `StudentName` varchar(30) NOT NULL,
  `Program` varchar(10) NOT NULL,
  `SemesterNo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `TeacherID` int(10) NOT NULL,
  `DeptNo` int(3) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TeacherName` varchar(30) NOT NULL,
  `Designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `email` (`Email`) USING BTREE;

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`AssignmentNo`),
  ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseCode`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `SemesterID` (`SemesterID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`DeptNo`),
  ADD UNIQUE KEY `DeptName` (`DeptName`),
  ADD UNIQUE KEY `ManagerID` (`ManagerID`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`LectureNo`),
  ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemesterID`),
  ADD KEY `deptNo` (`DeptNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `Email` (`Email`),
  ADD KEY `SemesterID` (`SemesterID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `DeptNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `account` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
