-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:02 AM
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
-- Database: `lesson_test`
--

-- --------------------------------------------------------

--
-- Structure for view `article_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `article_view`  AS  select `article`.`id` AS `id`,`article`.`postid` AS `postid`,`article`.`title` AS `title`,`article`.`slug` AS `slug`,`article`.`created_by` AS `created_by`,`article`.`content` AS `content`,`article`.`public_at` AS `public_at`,`article`.`is_publish` AS `is_publish`,`article`.`deleted` AS `deleted`,`article`.`created_at` AS `created_at`,`user_details`.`user_id` AS `user_id`,`user_details`.`name` AS `name`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image` from ((`article` left join `user_details` on(`article`.`created_by` = `user_details`.`user_id`)) left join `thumbnail` on(`article`.`postid` = `thumbnail`.`root`)) group by `article`.`postid` order by `article`.`created_at` desc ;

--
-- VIEW  `article_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
