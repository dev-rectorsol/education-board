-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 08:57 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `question_meta`
--

CREATE TABLE `question_meta` (
  `id` int(11) NOT NULL,
  `qusid` varchar(32) DEFAULT NULL,
  `option` text NOT NULL,
  `count` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_meta`
--

INSERT INTO `question_meta` (`id`, `qusid`, `option`, `count`) VALUES
(25, 'qus2', 'omie', '1'),
(26, 'qus2', 'shubham', '2'),
(27, 'qus2', 'Shashvat', '3'),
(28, 'qus2', 'Arvind', '4'),
(29, 'qus2', 'Ashutosh', '5'),
(30, 'qus3', 'The number of degrees of arc in a circle is 360.', '1'),
(31, 'qus3', 'The number of radians of arc in a circle is ', '2'),
(32, 'qus3', 'The sum of the measures in degrees of the angles of a triangle is 180.', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question_meta`
--
ALTER TABLE `question_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques` (`qusid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_meta`
--
ALTER TABLE `question_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
