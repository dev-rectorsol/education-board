-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 08:43 AM
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
-- Structure for view `searches`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`kalkaroot`@`localhost` SQL SECURITY DEFINER VIEW `searches`  AS  select `article`.`postid` AS `id`,`article`.`title` AS `name`,`article`.`slug` AS `slug`,`article`.`created_at` AS `created`,`article`.`is_publish` AS `is_publish`,concat('article') AS `isthat` from `article` union select `course`.`course_id` AS `id`,`course`.`name` AS `name`,`course`.`slug` AS `slug`,`course`.`created` AS `created`,`course`.`is_publish` AS `is_publish`,concat('course') AS `isthat` from `course` union select `tests`.`testid` AS `id`,`tests`.`title` AS `name`,`tests`.`slug` AS `slug`,`tests`.`created` AS `created`,`tests`.`is_publish` AS `is_publish`,concat('tests') AS `isthat` from `tests` ;

--
-- VIEW  `searches`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
