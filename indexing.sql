-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 12:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_board_article`
--

-- --------------------------------------------------------

--
-- Table structure for table `indexing`
--

CREATE TABLE `indexing` (
  `id` int(11) NOT NULL,
  `root` varchar(32) NOT NULL,
  `port` varchar(6) NOT NULL,
  `type` enum('tag','category') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indexing`
--

INSERT INTO `indexing` (`id`, `root`, `port`, `type`) VALUES
(5, '4', '6', 'tag'),
(6, '4', '7', 'tag'),
(7, '4', '2', 'category');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indexing`
--
ALTER TABLE `indexing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `root` (`root`),
  ADD KEY `port` (`port`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indexing`
--
ALTER TABLE `indexing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
