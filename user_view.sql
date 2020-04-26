-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 10:24 AM
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
-- Structure for view `user_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS  select `logme`.`logid` AS `logid`,`logme`.`email` AS `email`,`logme`.`phone` AS `phone`,`logme`.`role` AS `role`,`logme`.`status` AS `status`,`logme`.`joindate` AS `joindate`,`user_details`.`name` AS `name`,`user_details`.`details` AS `details`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image`,group_concat(`roles_users`.`role_id` separator ',') AS `role_id`,
group_concat(`roles`.`name` separator ',') AS `role_name` from ((((`logme` join `user_details` on(`logme`.`logid` = `user_details`.`user_id`)) left join `thumbnail` on(`logme`.`logid` = `thumbnail`.`root`)) left join `roles_users` on(`logme`.`logid` = `roles_users`.`user_id`)) left join `roles` on(`roles`.`id` = `roles_users`.`role_id`)) group by `logme`.`logid` ;

--
-- VIEW  `user_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
