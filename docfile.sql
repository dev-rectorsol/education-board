-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 09:00 AM
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
-- Table structure for table `docfile`
--

CREATE TABLE `docfile` (
  `docid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `root` varchar(32) NOT NULL,
  `type` enum('free','paid') DEFAULT NULL,
  `download` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docfile`
--

INSERT INTO `docfile` (`docid`, `nodeid`, `root`, `type`, `download`) VALUES
('DOC5eeb5fdc8fcf8', 'lect49', '', 'paid', 0),
('DOC5eeb5fdc9e82b', 'lect49', '', 'paid', 0),
('doc5eeb614b9c362', '66', 'lect50', 'paid', 0),
('doc5eeb6db2ebb59', '65', 'lect50', 'paid', 0),
('doc5eeb6fa018b20', '66', 'lect49', 'paid', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docfile`
--
ALTER TABLE `docfile`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `nodeid` (`nodeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
