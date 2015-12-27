-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2015 at 03:29 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
`ID` int(12) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `semster` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `department_id` int(12) DEFAULT NULL,
  `instructor_id` int(12) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `code`, `name`, `semster`, `year`, `department_id`, `instructor_id`) VALUES
(25, 'ZXP302', 'data structures', 'fall', '2017', 2, 6),
(26, 'ZZP304', 'knsn', 'fall', '2017', 2, 7),
(27, 'XEP302', 'nojnjnd', 'fall', '2010', 3, 6),
(28, 'FgT450', 'kljoioji', 'summer', '2010', 3, 7),
(29, 'VFR202', ',lkpol', 'fall', '2014', 4, 8),
(30, 'BTG4243', 'nkljjknjkl', 'fall', '2016', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`ID` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `manager_id` int(12) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `name`, `manager_id`) VALUES
(2, 'CCE', 12),
(3, 'MDE', 13),
(4, 'AET', 14);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
`ID` int(12) NOT NULL,
  `data` varchar(100) DEFAULT NULL,
  `type` varchar(6) NOT NULL,
  `course_id` int(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`ID`, `data`, `type`, `course_id`) VALUES
(206, 'google.com', 'Course', 25),
(207, 'google.com', 'Course', 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`ID` int(12) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `user_name`, `email`, `name`, `password`, `type`) VALUES
(3, 'admin1', 'hhhbk@gmail.co', 'dido', 'pass', 0),
(4, 'admin2', 'knln', 'hoho', 'pass', 0),
(5, 'admin3', 'ii', 'jijo', 'pass', 0),
(6, 'instr1', 'kljljk', 'kln', 'pass', 1),
(7, 'instr2', 'klljkl', 'klmkl', 'pass', 1),
(8, 'instr3', 'njjunj', 'nj ', 'pass', 1),
(9, 'qa1', 'jioj', 'jbjb', 'pass', 2),
(10, 'qa2', 'mlk;m', 'kmk', 'pass', 2),
(11, 'qa3', 'jjno', 'nnk;ln', 'pass', 2),
(12, 'dM1', ';lklk', 'lkmlkm''', 'pass', 3),
(13, 'dM2', ';lmk', 'knkln', 'pass', 3),
(14, 'dM3', ';nj', 'klnkln', 'pass', 3),
(15, 'Waiting1', 'nknjk', 'lkmklml', 'pass', 4),
(16, 'Waiting2', '', '', '', 0),
(17, 'Waiting2', 'mkml', 'lknklnkl', 'pass', 4),
(18, 'waitin3', 'mk', 'kklmlk', 'pass', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `code` (`code`,`name`), ADD KEY `department_id` (`department_id`,`instructor_id`), ADD KEY `ins` (`instructor_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `name` (`name`), ADD UNIQUE KEY `man` (`manager_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
 ADD PRIMARY KEY (`ID`), ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `user_name` (`user_name`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `have` FOREIGN KEY (`department_id`) REFERENCES `department` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL,
ADD CONSTRAINT `teaches` FOREIGN KEY (`instructor_id`) REFERENCES `user` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `user` (`ID`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
ADD CONSTRAINT `has` FOREIGN KEY (`course_id`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
