-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2015 at 10:50 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`ID` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `year` varchar(4) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `department_manager`
--

CREATE TABLE IF NOT EXISTS `department_manager` (
`ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
`ID` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `data` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `instractor`
--

CREATE TABLE IF NOT EXISTS `instractor` (
`ID` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `qa_member`
--

CREATE TABLE IF NOT EXISTS `qa_member` (
`ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `instructor_id` (`instructor_id`,`department_id`), ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `name` (`name`), ADD UNIQUE KEY `manager_id` (`manager_id`);

--
-- Indexes for table `department_manager`
--
ALTER TABLE `department_manager`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
 ADD PRIMARY KEY (`ID`), ADD KEY `file_ibfk_1` (`course_id`);

--
-- Indexes for table `instractor`
--
ALTER TABLE `instractor`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `qa_member`
--
ALTER TABLE `qa_member`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `user_name` (`user_name`), ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_manager`
--
ALTER TABLE `department_manager`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instractor`
--
ALTER TABLE `instractor`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qa_member`
--
ALTER TABLE `qa_member`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`ID`),
ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instractor` (`ID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `department_manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_manager`
--
ALTER TABLE `department_manager`
ADD CONSTRAINT `department_manager_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`ID`);

--
-- Constraints for table `instractor`
--
ALTER TABLE `instractor`
ADD CONSTRAINT `instractor_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`ID`);

--
-- Constraints for table `qa_member`
--
ALTER TABLE `qa_member`
ADD CONSTRAINT `qa_member_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
