-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 08:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeemanagement`
--
CREATE DATABASE IF NOT EXISTS `employeemanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `employeemanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `ID` int(10) NOT NULL,
  `employeeID` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(30) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `employeeID`, `date`, `time`, `status`, `remark`) VALUES
(1, 2, '2020-11-03', '09:00:00', 'Clock In', ''),
(2, 1, '2020-11-01', '10:00:00', 'Clock In', ''),
(3, 2, '2020-11-03', '12:00:00', 'Clock Out', ''),
(6, 2, '2020-11-04', '09:00:00', 'Clock in', ''),
(7, 2, '2020-11-04', '12:00:00', 'Clock Out', ''),
(8, 2, '2020-11-08', '12:25:01', 'Clock In', 'Late 205.01666666667'),
(9, 2, '2020-11-08', '12:30:00', 'Clock Out', 'Rest'),
(21, 1, '2020-11-23', '00:00:00', 'Absence', ''),
(22, 1, '2020-11-24', '00:00:00', 'Absence', ''),
(23, 1, '2020-11-25', '00:00:00', 'Absence', ''),
(24, 2, '2020-11-21', '00:00:00', 'Absence', ''),
(25, 2, '2020-11-22', '00:00:00', 'Absence (With Leave Applied)', 'Leave ID: 4'),
(26, 2, '2020-11-23', '00:00:00', 'Absence (With Leave Applied)', 'Leave ID: 4'),
(27, 2, '2020-11-24', '00:00:00', 'Absence (With Leave Applied)', 'Leave ID: 4'),
(28, 2, '2020-11-25', '00:00:00', 'Absence', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_update_log`
--

DROP TABLE IF EXISTS `attendance_update_log`;
CREATE TABLE `attendance_update_log` (
  `id` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `update_time` time NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_update_log`
--

INSERT INTO `attendance_update_log` (`id`, `update_date`, `update_time`, `admin_id`) VALUES
(1, '2020-11-21', '00:00:00', 1),
(7, '2020-11-25', '16:10:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

DROP TABLE IF EXISTS `employeeinfo`;
CREATE TABLE `employeeinfo` (
  `ID` int(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `payroll` int(10) DEFAULT NULL,
  `work_start_time` time NOT NULL,
  `work_end_time` time NOT NULL,
  `rest_time` varchar(20) NOT NULL,
  `weekend_work` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeinfo`
--

INSERT INTO `employeeinfo` (`ID`, `name`, `gender`, `position`, `height`, `phone`, `email`, `address`, `payroll`, `work_start_time`, `work_end_time`, `rest_time`, `weekend_work`) VALUES
(1, 'aaa', 'male', 'cleck', 170, '0123456789', 'aaa@isp.com', '1-2-15, Condo. A', 1500, '00:00:00', '00:00:00', '+2 Hours 30 Minutes', 0),
(2, 'bbb', 'female', 'cleck', 170, '0123456789', 'bbb@isp.com', '1-2-15, Condo. A', 1500, '09:00:00', '18:00:00', '+1 Hour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplication`
--

DROP TABLE IF EXISTS `leaveapplication`;
CREATE TABLE `leaveapplication` (
  `ID` int(10) NOT NULL,
  `employeeID` int(10) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `dateRequest_start` date NOT NULL,
  `dateRequest_end` date NOT NULL,
  `approval` varchar(10) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapplication`
--

INSERT INTO `leaveapplication` (`ID`, `employeeID`, `reason`, `dateRequest_start`, `dateRequest_end`, `approval`, `remark`) VALUES
(1, 2, 'sick', '2020-11-09', '2020-11-09', 'Reject', ''),
(2, 2, 'Sick leave', '2020-11-11', '2020-11-11', 'Accept', 'sick'),
(3, 2, 'Bereavement leave (Immediate Family)', '2020-12-12', '2020-12-12', 'Pending', ''),
(4, 2, 'Bereavement leave (Immediate Family)', '2020-11-22', '2020-11-24', 'Accept', '');

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

DROP TABLE IF EXISTS `logininfo`;
CREATE TABLE `logininfo` (
  `employeeID` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `usertype` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`employeeID`, `username`, `password`, `usertype`) VALUES
(1, 'aaa', 'aaa', 'admin'),
(2, 'bbb', 'bbb', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `attendance_update_log`
--
ALTER TABLE `attendance_update_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendance_update_log`
--
ALTER TABLE `attendance_update_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employeeinfo` (`ID`);

--
-- Constraints for table `leaveapplication`
--
ALTER TABLE `leaveapplication`
  ADD CONSTRAINT `leaveapplication_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employeeinfo` (`ID`);

--
-- Constraints for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD CONSTRAINT `logininfo_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employeeinfo` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
