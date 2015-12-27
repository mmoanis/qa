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
(16, 'Waiting2', 'reko', 'reko', 'pass', 4),
(17, 'Waiting2', 'mkml', 'lknklnkl', 'pass', 4),
(18, 'waitin3', 'mk', 'kklmlk', 'pass', 4);


--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `name`, `manager_id`) VALUES
(2, 'CCE', 12),
(3, 'MDE', 13),
(4, 'AET', 14);

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
-- Dumping data for table `file`
--

INSERT INTO `file` (`data`, `type`, `course_id`) VALUES
(NULL, 'Course Specifications', 25),
(NULL, 'Course Specifications', 26),
(NULL, 'Course Specifications', 27),
(NULL, 'Course Specifications', 28),
(NULL, 'Course Specifications', 29),
(NULL, 'Course Specifications', 30),

(NULL, 'Materials & Labs', 25),
(NULL, 'Materials & Labs', 26),
(NULL, 'Materials & Labs', 27),
(NULL, 'Materials & Labs', 28),
(NULL, 'Materials & Labs', 29),
(NULL, 'Materials & Labs', 30),

(NULL, 'Assignments & Project Documents', 25),
(NULL, 'Assignments & Project Documents', 26),
(NULL, 'Assignments & Project Documents', 27),
(NULL, 'Assignments & Project Documents', 28),
(NULL, 'Assignments & Project Documents', 29),
(NULL, 'Assignments & Project Documents', 30),

(NULL, 'Midterm Exam', 25),
(NULL, 'Midterm Exam', 26),
(NULL, 'Midterm Exam', 27),
(NULL, 'Midterm Exam', 28),
(NULL, 'Midterm Exam', 29),
(NULL, 'Midterm Exam', 30),

(NULL, 'Final Exam', 25),
(NULL, 'Final Exam', 26),
(NULL, 'Final Exam', 27),
(NULL, 'Final Exam', 28),
(NULL, 'Final Exam', 29),
(NULL, 'Final Exam', 30),

(NULL, 'End of Course Report', 25),
(NULL, 'End of Course Report', 26),
(NULL, 'End of Course Report', 27),
(NULL, 'End of Course Report', 28),
(NULL, 'End of Course Report', 29),
(NULL, 'End of Course Report', 30);
