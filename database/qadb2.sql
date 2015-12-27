-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2015 at 01:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qadb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `semster` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `department_id` int(12) DEFAULT NULL,
  `instructor_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `code` (`code`,`name`),
  KEY `department_id` (`department_id`,`instructor_id`),
  KEY `ins` (`instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `manager_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `man` (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `data` varchar(100) DEFAULT NULL,
  `type` varchar(6) NOT NULL,
  `course_id` int(12) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(4) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_name` (`user_name`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `teaches` FOREIGN KEY (`instructor_id`) REFERENCES `user` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `have` FOREIGN KEY (`department_id`) REFERENCES `department` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `manages` FOREIGN KEY (`manager_id`) REFERENCES `department` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `has` FOREIGN KEY (`course_id`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
