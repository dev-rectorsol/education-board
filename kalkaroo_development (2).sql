-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2020 at 09:38 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalkaroo_development`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `article_view`
-- (See below for the actual view)
--
CREATE TABLE `article_view` (
`id` int(11)
,`postid` char(6)
,`title` text
,`slug` varchar(128)
,`created_by` varchar(32)
,`content` text
,`public_at` datetime
,`is_publish` tinyint(1)
,`deleted` tinyint(1)
,`created_at` timestamp
,`user_id` varchar(10)
,`name` varchar(32)
,`thumb` text
,`image` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `searches`
-- (See below for the actual view)
--
CREATE TABLE `searches` (
`id` char(32)
,`name` mediumtext
,`slug` mediumtext
,`created` datetime
,`is_publish` tinyint(4)
,`isthat` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users`
-- (See below for the actual view)
--
CREATE TABLE `users` (
`logid` char(9)
,`email` varchar(32)
,`phone` varchar(10)
,`role` char(5)
,`status` enum('active','deactive')
,`joindate` datetime
,`name` varchar(32)
,`details` text
,`thumb` text
,`image` text
,`role_id` text
,`role_name` text
,`deleted` tinyint(1)
);

-- --------------------------------------------------------

--
-- Structure for view `article_view`
--
DROP TABLE IF EXISTS `article_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `article_view`  AS  select `article`.`id` AS `id`,`article`.`postid` AS `postid`,`article`.`title` AS `title`,`article`.`slug` AS `slug`,`article`.`created_by` AS `created_by`,`article`.`content` AS `content`,`article`.`public_at` AS `public_at`,`article`.`is_publish` AS `is_publish`,`article`.`deleted` AS `deleted`,`article`.`created_at` AS `created_at`,`user_details`.`user_id` AS `user_id`,`user_details`.`name` AS `name`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image` from ((`article` left join `user_details` on((`article`.`created_by` = `user_details`.`user_id`))) left join `thumbnail` on((`article`.`postid` = convert(`thumbnail`.`root` using utf8)))) group by `article`.`postid` order by `article`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `searches`
--
DROP TABLE IF EXISTS `searches`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `searches`  AS  select `article`.`postid` AS `id`,`article`.`title` AS `name`,`article`.`slug` AS `slug`,`article`.`created_at` AS `created`,`article`.`is_publish` AS `is_publish`,concat('article') AS `isthat` from `article` union select `course`.`course_id` AS `id`,`course`.`name` AS `name`,`course`.`slug` AS `slug`,`course`.`created` AS `created`,`course`.`is_publish` AS `is_publish`,concat('course') AS `isthat` from `course` union select `tests`.`testid` AS `id`,`tests`.`title` AS `name`,`tests`.`slug` AS `slug`,`tests`.`created` AS `created`,`tests`.`is_publish` AS `is_publish`,concat('tests') AS `isthat` from `tests` ;

-- --------------------------------------------------------

--
-- Structure for view `users`
--
DROP TABLE IF EXISTS `users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users`  AS  select `logme`.`logid` AS `logid`,`logme`.`email` AS `email`,`logme`.`phone` AS `phone`,`logme`.`role` AS `role`,`logme`.`status` AS `status`,`logme`.`joindate` AS `joindate`,`user_details`.`name` AS `name`,`user_details`.`details` AS `details`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image`,group_concat(`roles_users`.`role_id` separator ',') AS `role_id`,group_concat(`roles`.`name` separator ',') AS `role_name`,`logme`.`deleted` AS `deleted` from ((((`logme` join `user_details` on((`logme`.`logid` = `user_details`.`user_id`))) left join `thumbnail` on((`logme`.`logid` = `thumbnail`.`root`))) left join `roles_users` on((`logme`.`logid` = `roles_users`.`user_id`))) left join `roles` on((`roles`.`id` = `roles_users`.`role_id`))) group by `logme`.`logid` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
