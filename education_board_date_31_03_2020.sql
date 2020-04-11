-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 11:21 AM
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
-- Database: `education_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(5) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `house` varchar(32) DEFAULT NULL,
  `post` varchar(32) DEFAULT NULL,
  `dist` varchar(32) DEFAULT NULL,
  `state` varchar(12) DEFAULT NULL,
  `city` varchar(12) DEFAULT NULL,
  `country` varchar(6) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `house`, `post`, `dist`, `state`, `city`, `country`, `pincode`) VALUES
(1, '100', 'dlw', 'dlw', 'varanasi', 'UP', 'varanasi', 'India', '123456'),
(2, '200', 'akarmatta', 'dlw', 'varanasi', 'UP', 'varanasi', 'India', '123456'),
(3, '300', 'Raju Lal ', 'kakarmatta', 'varanasi', 'jgh.jpg', 'Varanasi', 'India', '221010'),
(4, '400', 'sdafsfsdf', 'kkaskasaska', 'varanasi', 'UP', 'Varansi', 'India', '222100');

-- --------------------------------------------------------

--
-- Table structure for table `aim`
--

CREATE TABLE `aim` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aim`
--

INSERT INTO `aim` (`id`, `title`) VALUES
(8, 'aim4'),
(6, 'aim144'),
(7, 'aim14'),
(9, 'Aim 123');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ansid` char(32) NOT NULL,
  `question` char(32) NOT NULL,
  `answers` text NOT NULL,
  `userid` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `postid` char(6) NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `public_at` datetime NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parent` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`) VALUES
(1, 'Category1', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `category` char(4) NOT NULL,
  `review` decimal(5,2) NOT NULL,
  `review_counter` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docfile`
--

CREATE TABLE `docfile` (
  `docid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `type` enum('free','paid') NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `size` varchar(32) NOT NULL,
  `doctype` varchar(32) NOT NULL,
  `download` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indexing`
--

CREATE TABLE `indexing` (
  `id` int(11) NOT NULL,
  `root` varchar(32) NOT NULL,
  `port` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'kogk44c00ksswwg44sssgg8c8sws8g0ogocgkg84', 10, 1, 0, NULL, 1584184675);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` char(32) NOT NULL,
  `name` text NOT NULL,
  `subject` char(32) NOT NULL,
  `serial` varchar(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `libid` char(32) NOT NULL,
  `user_id` char(32) NOT NULL,
  `resources` char(32) NOT NULL,
  `resourcestype` enum('course','video','test','doc') NOT NULL,
  `validity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` char(32) NOT NULL,
  `ip` varchar(24) NOT NULL,
  `lastlog` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `ip`, `lastlog`) VALUES
(1, '200', '::1', '2020-03-13 08:03:11'),
(2, '200', '::1', '2020-03-13 08:03:06'),
(3, '200', '100.0.0.100', '2020-03-16 09:03:21'),
(4, '400', '100.0.0.100', '2020-03-16 09:03:21'),
(5, '400', '192.168.0.1', '2020-03-16 10:03:04'),
(6, '400', '192.168.0.1', '2020-03-16 10:03:32'),
(7, '400', '192.168.0.1', '2020-03-16 10:03:20'),
(8, '400', '192.168.0.1', '2020-03-16 10:03:15'),
(9, '400', '192.168.0.1', '2020-03-16 10:03:35'),
(10, '400', '192.168.0.1', '2020-03-16 10:03:07'),
(11, '400', '192.168.0.1', '2020-03-16 10:03:06'),
(12, '400', '192.168.0.1', '2020-03-16 10:03:11'),
(13, '400', '192.168.0.1', '2020-03-16 10:03:35'),
(14, '400', '192.168.0.1', '2020-03-16 10:03:56'),
(15, '400', '192.168.0.1', '2020-03-16 10:03:43'),
(16, '400', '192.168.0.1', '2020-03-16 11:03:05'),
(17, '400', '192.168.0.1', '2020-03-16 11:03:33'),
(18, '400', '192.168.0.1', '2020-03-16 11:03:45'),
(200, '', '::1', '2020-03-19 07:03:49'),
(201, '200', '::1', '2020-03-19 07:03:07'),
(202, '200', '::1', '2020-03-19 07:03:49'),
(203, '200', '::1', '2020-03-19 07:03:25'),
(204, '200', '::1', '2020-03-19 07:03:10'),
(205, '200', '::1', '2020-03-19 07:03:41'),
(206, '200', '::1', '2020-03-19 07:03:55'),
(207, '200', '::1', '2020-03-19 07:03:21'),
(208, '200', '::1', '2020-03-19 07:03:31'),
(209, '200', '::1', '2020-03-19 07:03:47'),
(210, '200', '::1', '2020-03-19 07:03:19'),
(211, '200', '::1', '2020-03-19 07:03:32'),
(212, '200', '::1', '2020-03-19 07:03:56'),
(213, '200', '::1', '2020-03-19 07:03:44'),
(214, '200', '::1', '2020-03-19 07:03:10'),
(215, '200', '::1', '2020-03-19 07:03:39'),
(216, '200', '::1', '2020-03-19 07:03:11'),
(217, '300', '::1', '2020-03-20 08:03:12'),
(218, '300', '::1', '2020-03-20 08:03:39'),
(219, '200', '::1', '2020-03-20 08:03:59'),
(220, '200', '::1', '2020-03-20 08:03:42'),
(221, '200', '::1', '2020-03-20 08:03:57'),
(222, '200', '::1', '2020-03-20 08:03:38'),
(223, '200', '::1', '2020-03-20 08:03:57'),
(224, '200', '::1', '2020-03-20 08:03:22'),
(225, '200', '::1', '2020-03-20 08:03:10'),
(226, '200', '::1', '2020-03-20 08:03:11'),
(227, '200', '::1', '2020-03-20 08:03:25'),
(228, '200', '::1', '2020-03-20 08:03:59'),
(229, '200', '::1', '2020-03-20 08:03:38'),
(230, '200', '::1', '2020-03-20 08:03:44'),
(231, '200', '::1', '2020-03-20 08:03:06'),
(232, '200', '::1', '2020-03-20 08:03:00'),
(233, '200', '::1', '2020-03-20 08:03:26'),
(234, '200', '::1', '2020-03-20 08:03:06'),
(235, '200', '::1', '2020-03-20 08:03:25'),
(236, '200', '::1', '2020-03-20 08:03:56'),
(237, '200', '::1', '2020-03-20 08:03:26'),
(238, '200', '::1', '2020-03-20 08:03:41'),
(239, '200', '::1', '2020-03-20 09:03:24'),
(240, '200', '::1', '2020-03-20 09:03:47'),
(241, '300', '::1', '2020-03-20 09:03:17'),
(242, '200', '::1', '2020-03-20 10:03:27'),
(243, '200', '::1', '2020-03-21 06:03:33'),
(244, '200', '::1', '2020-03-23 03:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `logme`
--

CREATE TABLE `logme` (
  `logid` char(9) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `language` enum('english','hindi') DEFAULT NULL,
  `role` char(5) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `joindate` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logme`
--

INSERT INTO `logme` (`logid`, `phone`, `email`, `password`, `language`, `role`, `status`, `joindate`, `updated_at`) VALUES
('AKIASZ001', '7905004391', 'omie@gmail.com', '$2y$10$RiAZ5AQUiLJBlSyNagz/yOHVYzhhWv3t5LfADRTGI4TQaiAV3DUmK', 'english', 'a', 'active', '2020-03-13 00:00:00', '2020-03-18 11:43:03'),
('EDO100100', NULL, 'b@gmail.com', '$2y$10$WZZDwTr70g3zSDXtDDflZeOPMy9veO9ZneKEL0n0R184xj46v8nTS', NULL, 's', 'active', '2020-03-30 11:03:19', '2020-03-30 15:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `uri`, `method`, `params`, `api_key`, `ip_address`, `time`, `rtime`, `authorized`, `response_code`) VALUES
(1, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------dc86471a86024c76\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602388, 1.59393, '1', 201),
(2, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------9310426db8a20720\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602442, 0.394157, '1', 0),
(3, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------c07f8dac69e6dd4f\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602558, 0.0782301, '1', 0),
(4, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------2bbd95f48ea85a50\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602637, 0.157143, '1', 0),
(5, 'api/Login', 'post', 'a:12:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"86fd8d17-de9f-441c-a560-1736528be0cb\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602744, 0.129579, '1', 0),
(6, 'api/Login', 'post', 'a:12:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"e9a6934d-bd08-4e65-86eb-1e4f33910192\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602826, 0.222999, '1', 201),
(7, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------3c47f35839bdf500\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602869, 0.32407, '1', 201),
(8, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------6f7dbceb2640d8ef\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602905, 0.26103, '1', 201),
(9, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------205c489c311ace26\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602950, 0.208422, '1', 201),
(10, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------02fa45c52c6d47d3\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584602981, 0.0971799, '1', 201),
(11, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------b34b041a2f16f440\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603054, 0.161104, '1', 201),
(12, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------f61eccc30b08c44e\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603081, 0.322779, '1', 201),
(13, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------3567e5f9ec1732cf\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603271, 0.139919, '1', 201),
(14, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------8822b84224a4072c\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603347, 0.264792, '1', 201),
(15, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------312fcda55573967f\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603439, 0.135676, '1', 201),
(16, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------fd00e29d873f3d83\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603872, 0.278166, '1', 201),
(17, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------84d2e3c14a1662f0\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603896, 0.281119, '1', 201),
(18, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------6ffdd5a4508df4f4\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603944, 0.170359, '1', 201),
(19, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------234434975d33544c\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603970, 0.220311, '1', 201),
(20, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------b41190ac79762c25\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584603999, 0.108457, '1', 201),
(21, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"246\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------c8407a2a3300715a\";s:5:\"email\";s:4:\"root\";s:8:\"password\";s:5:\"admin\";}', '', '::1', 1584604014, 0.163954, '1', 204),
(22, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"246\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------aee0123d00ae023c\";s:5:\"email\";s:4:\"root\";s:8:\"password\";s:5:\"admin\";}', '', '::1', 1584604130, 0.199594, '1', 204),
(23, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"246\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------e627ff8ea7037baa\";s:5:\"email\";s:4:\"root\";s:8:\"password\";s:5:\"admin\";}', '', '::1', 1584604135, 0.154999, '1', 204),
(24, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------e6e1d137b9a0c28b\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584604151, 0.111509, '1', 201),
(25, 'api/signup/otp', 'put', 'a:11:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"84558422-f673-48d0-90d8-4ca5adacc59e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"17\";s:10:\"Connection\";s:10:\"keep-alive\";s:6:\"mobile\";s:10:\"7668498112\";}', '', '::1', 1584605929, 0.919467, '1', 201),
(26, 'api/users', 'get', 'a:10:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"0e1e2559-9486-4752-939b-a003b967f6f1\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"17\";s:10:\"Connection\";s:10:\"keep-alive\";}', '', '::1', 1584688264, 1.90539, '1', 200),
(27, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"256\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------e542d057d5fd2cb3\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:5:\"12345\";}', '', '::1', 1584691807, 0.232942, '1', 204),
(28, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------2b60db0b55209b54\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584691818, 0.128321, '1', 204),
(29, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------a9f984a4a5bf5536\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692005, 0.250493, '1', 204),
(30, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------56ae17612e5113df\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692168, 0.114027, '1', 204),
(31, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------6825de4554985700\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692180, 0.140713, '1', 204),
(32, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------e399c8539873aead\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692208, 0.0860889, '1', 204),
(33, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------24ee6f7fdf99fa91\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692270, 0.170467, '1', 204),
(34, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------5c22faee9bae0616\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692396, 0.256813, '1', 204),
(35, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------b82bd1aa7acbe679\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692417, 0.177258, '1', 204),
(36, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------7ef9c66fc3acc62c\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692477, 0.163793, '1', 204),
(37, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------79b9abe368127611\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692546, 0.11574, '1', 204),
(38, 'api/Login', 'post', 'a:12:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"249129fa-3bcf-4e75-9526-ecd8e7d11e71\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692626, 0.134079, '1', 204),
(39, 'api/Login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"7524829f-8c6b-4314-9cda-90f62d43df66\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692701, 0.160372, '1', 204),
(40, 'api/Login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"01d86a95-f43a-4266-b37d-34910e7aed86\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:80:\"multipart/form-data; boundary=--------------------------827250464519600781342123\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:14:\"Content-Length\";s:3:\"287\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692744, 0.306863, '1', 204),
(41, 'api/login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8769a102-fd87-461b-866c-e959b4e900e9\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692810, 0.139524, '1', 204),
(42, 'api/login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"2848c164-9997-4435-8874-0445b3dc802d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";}', '', '::1', 1584692832, 0.322264, '1', 201),
(43, 'api/login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"f32c9ca6-6d16-45cc-b245-ce5f2900b643\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";}', '', '::1', 1584692852, 0.086364, '1', 204),
(44, 'api/Login', 'post', 'a:7:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"257\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------bad4535c9ad3b088\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";}', '', '::1', 1584692900, 0.367161, '1', 204),
(45, 'api/login', 'post', 'a:13:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"df302ac9-ac39-4a43-9152-d36fb89d965d\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"38\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";}', '', '::1', 1584692923, 0.16898, '1', 204),
(46, 'api/login', 'post', 'a:14:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"a1d98c23-bf29-4922-954d-42ef7c267c9e\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"45\";s:6:\"Cookie\";s:43:\"ci_session=u0v0qcsp9lpl73dkscs6k2rf0vaphqej\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693088, 0.105505, '1', 204),
(47, 'api/login', 'post', 'a:14:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"8855e79c-ecc0-45c1-8680-01a8be2deabf\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"45\";s:6:\"Cookie\";s:43:\"ci_session=in6e7naibj3rkfnr5dku66jh8s26kis4\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";s:4:\"role\";s:1:\"s\";}', '', '::1', 1584693099, 0.3226, '1', 201),
(48, 'api/login', 'post', 'a:14:{s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:10:\"User-Agent\";s:21:\"PostmanRuntime/7.23.0\";s:6:\"Accept\";s:3:\"*/*\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:13:\"Postman-Token\";s:36:\"b2296ded-71a3-4a42-a1a2-b9728fb59656\";s:4:\"Host\";s:9:\"localhost\";s:12:\"Content-Type\";s:33:\"application/x-www-form-urlencoded\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:14:\"Content-Length\";s:2:\"45\";s:6:\"Cookie\";s:43:\"ci_session=in6e7naibj3rkfnr5dku66jh8s26kis4\";s:10:\"Connection\";s:10:\"keep-alive\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693179, 0.308308, '1', 201),
(49, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------fd505e8b2f18d869\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693282, 0.144112, '1', 201),
(50, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------cb7951ffa5bfe94d\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693357, 0.18238, '1', 201),
(51, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------5d77f125891aa5f5\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693397, 0.137795, '1', 201),
(52, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------cef93a6d8046c089\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693477, 0.178403, '1', 201),
(53, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------d5aa774327c990b0\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693501, 0.21852, '1', 201),
(54, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------995b5b81614da22e\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693610, 0.299046, '1', 201),
(55, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------06e4c76aecbf17fc\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693671, 0.136203, '1', 201),
(56, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------9d3cc4573c083e2b\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584693925, 0.199257, '1', 201),
(57, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------edb83fc294af9a35\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694019, 0.1715, '1', 201),
(58, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------8650d7455ff6b8f7\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694058, 0.101836, '1', 201),
(59, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------96339d1987d62bee\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694184, 0.316631, '1', 201),
(60, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------bd53fc468d179e21\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694206, 0.167158, '1', 201),
(61, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------71e18a42f4b36294\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694319, 0.203884, '1', 201),
(62, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------14d5737ec33b9cc4\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694406, 0.112315, '1', 201),
(63, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------727e8715cde55007\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694506, 0.259325, '1', 201),
(64, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------1a08dee71e3c5a9f\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694525, 0.192755, '1', 201),
(65, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------9a779a782a885e37\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694676, 0.20404, '1', 201),
(66, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------ab959eb0eaeff9c4\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694766, 0.134476, '1', 201),
(67, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------c60fdf4f7513551c\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694781, 0.292675, '1', 201),
(68, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------47e2ac5b3c4923e4\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694824, 0.143524, '1', 201),
(69, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------967b50347a7f21d5\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694847, 0.162707, '1', 201),
(70, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------b29a921acdaad87d\";s:5:\"email\";s:15:\"rit12@gmail.com\";s:8:\"password\";s:5:\"12345\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584694877, 0.165407, '1', 201),
(71, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------98409086bc50671e\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584699387, 0.241007, '1', 201),
(72, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------bfcaa807ba6642f5\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584770553, 0.814498, '1', 201),
(73, 'api/Login', 'post', 'a:8:{s:4:\"Host\";s:9:\"localhost\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:6:\"Accept\";s:3:\"*/*\";s:14:\"Content-Length\";s:3:\"351\";s:12:\"Content-Type\";s:70:\"multipart/form-data; boundary=------------------------16faa89f7da12b07\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:4:\"role\";s:1:\"a\";}', '', '::1', 1584933874, 1.79188, '1', 201),
(74, 'api/Login', 'post', 'a:16:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:1:\"0\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Postman-Token\";s:36:\"f11467d3-4e3c-b32b-ed58-2514864dccdf\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";}', '', '::1', 1585125739, 0.44133, '1', 204),
(75, 'api/Signup', 'post', 'a:18:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundarybV97p1ozAsBTFwjz\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"8b85d7b7-ebb3-7925-47bc-64b5d57559b6\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"mobile\";s:10:\"7905004391\";}', '', '::1', 1585283153, 0.56331, '1', 0),
(76, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundary8XmecQ665DGxzLj9\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"280d23d3-3336-f8ca-db18-e57a99b5c525\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=sa3uijo5mf3ttiqjgmhr94v11vcqk3km\";s:6:\"mobile\";s:10:\"7905004391\";}', '', '::1', 1585283191, 0.219044, '1', 404),
(77, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundaryawLNaMufgXV6ttii\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"ee08e5ad-3327-34d5-ff49-8ade7eec22bf\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=sa3uijo5mf3ttiqjgmhr94v11vcqk3km\";s:6:\"mobile\";s:10:\"8853120459\";}', '', '::1', 1585283310, 0.313454, '1', 201),
(78, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundarytXYwZBgDIzvUtMAV\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"c5333875-84f9-7fb1-d50f-0b95ba3587de\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=sa3uijo5mf3ttiqjgmhr94v11vcqk3km\";s:6:\"mobile\";s:10:\"8853120459\";}', '', '::1', 1585283331, 0.159369, '1', 404),
(79, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundarywNZPpSJxKvdv1x6W\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"ebe1ac53-d1e3-44c4-178d-65ebec0d6837\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=sa3uijo5mf3ttiqjgmhr94v11vcqk3km\";s:6:\"mobile\";s:10:\"8853120450\";}', '', '::1', 1585283393, 0.238131, '1', 0),
(80, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundarypyz0QB7v1GfYowO6\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"9faffb00-c92d-dc7b-7477-60ddbeb74591\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=sa3uijo5mf3ttiqjgmhr94v11vcqk3km\";s:6:\"mobile\";s:10:\"8853120450\";}', '', '::1', 1585283474, 0.619877, '1', 404),
(81, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundarylbPibEpybehA6wRA\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"19d18b2e-a087-1343-466b-a27ce41c2e38\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=324r09c6h3et9t4p93jhe5cv468uai9i\";s:6:\"mobile\";s:10:\"8853120456\";}', '', '::1', 1585283498, 0.362385, '1', 0),
(82, 'api/signup', 'post', 'a:19:{s:4:\"Host\";s:9:\"localhost\";s:10:\"Connection\";s:10:\"keep-alive\";s:14:\"Content-Length\";s:3:\"147\";s:13:\"Authorization\";s:22:\"Basic YWRtaW46MTIzNA==\";s:12:\"Content-Type\";s:68:\"multipart/form-data; boundary=----WebKitFormBoundaryvShQfKAfxeU1KLqQ\";s:10:\"User-Agent\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36\";s:13:\"Cache-Control\";s:8:\"no-cache\";s:14:\"Sec-Fetch-Dest\";s:5:\"empty\";s:5:\"email\";s:14:\"rit1@gmail.com\";s:8:\"password\";s:6:\"123456\";s:13:\"Postman-Token\";s:36:\"226ce77f-d511-2ea7-36dd-536279b363a4\";s:6:\"Accept\";s:3:\"*/*\";s:6:\"Origin\";s:51:\"chrome-extension://fhbjgbiflinjbdggehcddcbncdddomop\";s:14:\"Sec-Fetch-Site\";s:4:\"none\";s:14:\"Sec-Fetch-Mode\";s:4:\"cors\";s:15:\"Accept-Encoding\";s:17:\"gzip, deflate, br\";s:15:\"Accept-Language\";s:32:\"en-US,en;q=0.9,hi;q=0.8,mt;q=0.7\";s:6:\"Cookie\";s:43:\"ci_session=324r09c6h3et9t4p93jhe5cv468uai9i\";s:6:\"mobile\";s:10:\"8853120455\";}', '', '::1', 1585283572, 4.3544, '1', 201);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `key` varchar(64) NOT NULL,
  `code` varchar(6) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `key`, `code`, `time`) VALUES
(21, '9984661737', '172914', '2020-03-17 07:03:13'),
(20, '7668498112', '953507', '2020-03-19 08:03:50'),
(22, '7668498113', '106939', '2020-03-17 02:03:18'),
(12, '8951122124', '357692', '2020-03-16 11:03:46'),
(13, '8951122123', '798448', '2020-03-16 01:03:40'),
(23, '8853120455', '789022', '2020-03-27 05:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(6) NOT NULL,
  `userid` char(32) NOT NULL,
  `totalprice` double(5,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `modeid` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_meta`
--

CREATE TABLE `order_meta` (
  `id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `order_id` char(32) NOT NULL,
  `price` double(5,2) NOT NULL,
  `discount_price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment` char(32) NOT NULL,
  `transaction` varchar(64) NOT NULL,
  `userid` char(32) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` char(32) NOT NULL,
  `source` char(32) NOT NULL,
  `price` double(5,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `tax_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qusid` char(32) NOT NULL,
  `test` char(32) NOT NULL,
  `type` int(11) NOT NULL,
  `title` text NOT NULL,
  `answer` varchar(2) NOT NULL,
  `values` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_meta`
--

CREATE TABLE `question_meta` (
  `id` int(11) NOT NULL,
  `ques` char(32) NOT NULL,
  `option` text NOT NULL,
  `count` varchar(2) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `test_id` char(32) NOT NULL,
  `user_id` char(32) NOT NULL,
  `obtained` int(6) NOT NULL,
  `attemptq` int(6) NOT NULL,
  `correctq` int(6) NOT NULL,
  `wrongq` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'admin', 1, NULL, NULL, NULL),
(2, 'student', 'Student', 'Student', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` char(9) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
('AKIASZ001', 1),
('EDO100100', 2);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(128) NOT NULL,
  `setting_value` longtext NOT NULL,
  `autoload` varchar(8) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_name`, `setting_value`, `autoload`) VALUES
(1, 'application_name', 'Online Education Board', 'yes'),
(2, 'application_title', 'Online Education Board', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `course` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(5) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`) VALUES
(4, 'BIOLOGY'),
(1, 'ias'),
(5, 'NCRT'),
(3, 'SSC'),
(2, 'UPSC');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `title` text NOT NULL,
  `duration` varchar(12) NOT NULL,
  `nofqus` int(6) NOT NULL,
  `totalno` int(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thumbnail`
--

CREATE TABLE `thumbnail` (
  `id` int(11) NOT NULL,
  `root` char(32) NOT NULL,
  `thumb` text DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thumbnail`
--

INSERT INTO `thumbnail` (`id`, `root`, `thumb`, `image`) VALUES
(1, 'EDO100100', 'uploads/thumb/avatar-1.jpg', 'uploads/image/avatar-1.jpg'),
(2, 'AKIASZ001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_aim`
--

CREATE TABLE `user_aim` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `aim_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_aim`
--

INSERT INTO `user_aim` (`id`, `user_id`, `aim_id`) VALUES
(1, 'EDO100503', 1),
(2, 'EDO100503', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `name`, `mobile`, `details`, `updated_at`) VALUES
(2, 'AKIASZ001', 'Kali', '4684655654', 'njkskdsd\nnsdksknvvnxvn\nxncvxvnmxv,cxvmxnvx,m,xcv,mx', '2020-03-18 11:42:15'),
(24, 'EDO100100', 'bhawana', NULL, NULL, '2020-03-30 15:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `type` enum('free','paid') NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `size` varchar(32) NOT NULL,
  `videotype` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `rating` int(5) NOT NULL,
  `rate_count` int(11) NOT NULL,
  `download` tinyint(1) NOT NULL,
  `time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `aim`
--
ALTER TABLE `aim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ansid`),
  ADD KEY `question` (`question`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `docfile`
--
ALTER TABLE `docfile`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `nodeid` (`nodeid`);

--
-- Indexes for table `indexing`
--
ALTER TABLE `indexing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `root` (`root`),
  ADD KEY `port` (`port`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`libid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`user_id`);

--
-- Indexes for table `logme`
--
ALTER TABLE `logme`
  ADD PRIMARY KEY (`logid`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `order_meta`
--
ALTER TABLE `order_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment`),
  ADD KEY `userid` (`userid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qusid`),
  ADD KEY `test` (`test`);

--
-- Indexes for table `question_meta`
--
ALTER TABLE `question_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques` (`ques`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user_roles_role_Name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `setting_name` (`setting_name`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag` (`title`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `root` (`root`);

--
-- Indexes for table `user_aim`
--
ALTER TABLE `user_aim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoid`),
  ADD KEY `nodeid` (`nodeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aim`
--
ALTER TABLE `aim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_meta`
--
ALTER TABLE `order_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_meta`
--
ALTER TABLE `question_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_aim`
--
ALTER TABLE `user_aim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
