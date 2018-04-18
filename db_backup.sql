-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2018 at 09:51 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.29-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` varchar(20) NOT NULL,
  `Customer_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_name`) VALUES
('101', 'RAHUL'),
('102', 'SID'),
('103', 'Sonu'),
('104', 'Suhas');

-- --------------------------------------------------------

--
-- Table structure for table `elect`
--

CREATE TABLE `elect` (
  `Rahul` varchar(30) DEFAULT NULL,
  `Suhas` varchar(30) DEFAULT NULL,
  `Shreys` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Product_ID` varchar(20) NOT NULL,
  `Std_price` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Product_ID`, `Std_price`) VALUES
('1', 'Banana'),
('2', 'Cherry'),
('3', 'Apple'),
('4', 'Chocloate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(20) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `voted` int(5) DEFAULT '0',
  `section` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `voted`, `section`) VALUES
('2015cse048', 'abcabc', 0, '1'),
('2015cse112', 'aabbcc', 0, '3'),
('2015cse134', 'baba', 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `candidate_name` varchar(20) NOT NULL,
  `votes` varchar(20) DEFAULT NULL,
  `section` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`candidate_name`, `votes`, `section`) VALUES
('Deekshitha', '0', '1'),
('Jaya', '0', '1'),
('Rahul', '2', '3'),
('Shreyas', '0', '3'),
('Suhas', '0', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`candidate_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
