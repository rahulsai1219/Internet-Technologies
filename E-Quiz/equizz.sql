-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 03:01 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('admin', 'pass123');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerId` int(11) NOT NULL,
  `studentId` varchar(50) NOT NULL,
  `answer` int(11) NOT NULL,
  `questionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerId`, `studentId`, `answer`, `questionId`) VALUES
(1, '123', 1, 1),
(2, '123', 4, 1),
(3, '123', 3, 2),
(4, '123', 1, 3),
(5, '2015cse129', 3, 4),
(6, '2015cse129', 3, 5),
(7, '2015cse129', 2, 1),
(8, '2015cse129', 0, 2),
(9, '2015cse129', 0, 3),
(10, '123', 2, 4),
(11, '123', 1, 5),
(12, '123', 1, 4),
(13, '123', 2, 5),
(14, '123', 3, 4),
(15, '123', 3, 5),
(16, '123', 0, 1),
(17, '123', 0, 1),
(18, '123', 0, 1),
(19, '123', 0, 1),
(20, '123', 0, 1),
(21, '123', 3, 6),
(22, '2015cse134', 3, 2),
(23, '2015cse134', 3, 3),
(24, '2015cse134', 3, 2),
(25, '2015cse134', 2, 3),
(26, '2015cse134', 2, 4),
(27, '2015cse134', 1, 5),
(28, '2015cse129', 4, 2),
(29, '2015cse129', 1, 3),
(30, '2015cse134', 2, 9),
(31, '2015cse134', 4, 10),
(32, '2015cse129', 1, 9),
(33, '2015cse129', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `name` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `blocked` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`name`, `id`, `password`, `blocked`) VALUES
('Shreyas', '2015cse129', '123', 0),
('Rahul sai', '2015cse134', '321', 0),
('Suhas', '2015cse136', '111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `id`, `password`) VALUES
('Venki', '123', '123'),
('Sanjeev', '321', '321');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionId` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) DEFAULT NULL,
  `option4` varchar(50) DEFAULT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `test_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 9, 'what', '1', '1', '1', '1', 1),
(2, 10, 'Is kavya human being?', 'yes', 'no', 'maybe', 'idk', 3),
(3, 10, 'bbbajabaj', 'aasd', 'jsfj', 'lisnfd', 'nisdo', 3),
(4, 11, 'Why?', 'a', 'bb', 'csks', 'sajblsdbjl', 3),
(5, 11, 'How.....??', 'n,jkhabj', 'lsfli', 'nlsufweiphf', 'bjlsflewipfhw', 2),
(6, 12, 'd', 'dsf', 'e', 'ey', 'yjhv', 4),
(7, 13, 'd', 'dsf', 'e', 'ey', 'yjhv', 4),
(8, 14, 'jfdf', 'jl', 'nlskg', 'klngsw', 'obnsgp', 1),
(9, 15, 'Why AI?', 'abc', 'bcd', 'def', 'fgh', 2),
(10, 15, 'How AI?', '123', '321', '345', '987', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `id`, `password`) VALUES
('Samuel', '123', '123'),
('shreyas', '2015cse129', 'shreyas'),
('Rahul sai', '2015cse134', 'rahul');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectId`, `name`, `faculty`) VALUES
(6, 'AI', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `name`, `subject_id`, `number_of_questions`, `duration`) VALUES
(15, 'Sample', 6, 2, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerId`);

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
