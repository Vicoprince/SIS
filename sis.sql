-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 06:04 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_unit` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `session`, `programme`, `course_title`, `course_code`, `course_unit`, `semester`, `level`) VALUES
(1, '2021/2022', 'Part-Time', 'Public Speaking', 'CSK 101', '3', 'Second Semester', 'ND 2'),
(2, '2019/2020', 'Part-Time', 'Use of English', 'CSK 103', '5', 'Second Semester', 'ND 2'),
(3, '2019/2020', 'Part-Time', 'Use of English', 'CSK 103', '5', 'Second Semester', 'ND 2'),
(4, '2020/2021', 'Full-Time', 'Logic and linear Algebra', 'CSK 101', '1', 'Second Semester', 'ND 1'),
(5, '2018/2019', 'Part-Time', 'Public Speaking', 'MTH 101', '5', 'Second Semester', 'ND 1'),
(6, '2018/2019', 'Part-Time', 'Public Speaking', 'MTH 101', '5', 'Second Semester', 'ND 1'),
(7, '2018/2019', 'Part-Time', 'Public Speaking', 'MTH 101', '3', 'Second Semester', 'ND 1'),
(8, '2021/2022', 'Part-Time', 'Public Speaking', 'CHT101', '5', 'Second Semester', 'ND 2');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` text NOT NULL,
  `co_code` varchar(30) NOT NULL,
  `subject_unit` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `course_title`, `co_code`, `subject_unit`) VALUES
(1, 'IT Essential ', 'CHT 101', 3),
(2, 'Use of English ', 'GNS 101', 2);

-- --------------------------------------------------------

--
-- Table structure for table `first_semester_courses`
--

CREATE TABLE IF NOT EXISTS `first_semester_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `coursetitle` varchar(100) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `c_unit` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `first_semester_courses`
--

INSERT INTO `first_semester_courses` (`id`, `session`, `term`, `coursetitle`, `course_id`, `c_unit`, `semester`, `level`) VALUES
(1, '2021/2022', 'Full-Time', 'Algebra and complex number', 'MTH 101', '3', 'First Semester', 'ND 1'),
(2, '2021/2022', 'Full-Time', 'Logic and linear Algebra', 'MTH 103', '3', 'First Semester', 'ND 1'),
(3, '2021/2022', 'Full-Time', 'Technical  writing', 'CSK 101', '2', 'First Semester', 'ND 1'),
(4, '2021/2022', 'Full-Time', 'Basics of communication', 'CSK 103', '2', 'First Semester', 'ND 1'),
(5, '2021/2022', 'Full-Time', 'Public Speaking', 'CSK 105', '2', 'First Semester', 'ND 1'),
(6, '2021/2022', 'Full-Time', 'Use of English', 'GNS 101', '2', 'First Semester', 'ND 1'),
(7, '2021/2022', 'Full-Time', 'Introduction to Entrepreneurship', 'EDP 101 ', '2', 'First Semester', 'ND 1'),
(8, '2021/2022', 'Full-Time', 'Trigonometry and Analytical geometry', 'MTH 105', '3', 'First Semester', 'ND 1'),
(9, '2021/2022', 'Full-Time', 'Calculus', 'MTH 107', '3', 'First Semester', 'ND 1'),
(10, '2021/2022', 'Full-Time', 'Introduction to Statistics', 'STAT 101', '2', 'First Semester', 'ND 1'),
(11, '2021/2022', 'Full-Time', 'Basic Electronics', 'CHT 101', '2', 'First Semester', 'ND 1'),
(12, '2021/2022', 'Full-Time', 'Basic electricity ', 'CHT 103', '2', 'First Semester', 'ND 1'),
(13, '2021/2022', 'Full-Time', 'International Computing Driving License (ICDL)', 'CSE 101', '3', 'First Semester', 'ND 1'),
(14, '2021/2022', 'Full-Time', 'Concept of information and communication technology', 'CSE 103', '2', 'First Semester', 'ND 1'),
(15, '2021/2022', 'Full-Time', 'Algebra and complex number', 'MTH 101', '2', 'First Semester', 'ND 1');

-- --------------------------------------------------------

--
-- Table structure for table `student2`
--

CREATE TABLE IF NOT EXISTS `student2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `program` varchar(13) NOT NULL,
  `roll_no` int(50) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `ques` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student2`
--

INSERT INTO `student2` (`id`, `fname`, `lname`, `dob`, `email`, `mobile`, `gender`, `program`, `roll_no`, `image`, `password`, `ques`, `answer`) VALUES
(1, 'Olu-Ajimati', 'Victor', '2001-05-22', 'oluajimativictor@gmail.com', '08121956127', 'Male', 'CSE', 248222, '', 'jesusvick', '2', '2001'),
(2, 'Adeogun', 'Samuel', '2000-02-28', 'adeogunsamuel@gmail.com', '08012439234', 'Male', 'BOP', 123452, 'FB_IMG_15545114680236504.jpg', 'password', '1', 'lagos'),
(6, 'Ariyo', 'Joshua', '2021-08-02', 'trinitejosh@gmail.com', '0806655983', 'Male', 'CSE', 248217, 'demo.jpg', 'trinite', '1', 'ondo'),
(7, 'toy', 'hus', '2021-07-28', 'mjkkjek@gmail.com', '0806655983', 'Female', 'DMT', 123456, '67326622_331589544417364_6453377396635598848_n.jpg', 'password', '1', 'akure'),
(8, 'grace', 'shedrack', '2021-04-14', 'shedygrace@gmail.com', '08102130723', 'Female', 'CNSS', 564556, '79362252_180909979719910_5801422393557647360_n.jpg', 'qwerty', '1', 'lagos');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
