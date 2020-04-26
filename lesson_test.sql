-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 04:10 PM
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
(9, 'Aim 123'),
(10, 'Aim12');

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
  `id` int(11) NOT NULL,
  `postid` char(6) CHARACTER SET utf8 NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `slug` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `content` text CHARACTER SET utf8 DEFAULT NULL,
  `public_at` datetime DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `postid`, `title`, `slug`, `created_by`, `content`, `public_at`, `is_publish`, `deleted`, `created_at`) VALUES
(12, 'post12', 'What is the difference between Coding and Programming?', '', 'AKIASZ001', '<h3 xss=removed>Nam Tempor Soluta Nobis Eleifend Option Assum.</h3><p xss=removed>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p><h4 xss=removed>5 Myths That Prevent Job Seekers From Overcoming Failure</h4><p xss=removed>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Cras suscipit, quam vitae adipiscing faucibus, risus nibh laoreet odio, a porttitor metus eros ut enim. Morbi augue velit, tempus mattis dignissim nec, porta sed risus. Donec eget magna eu lorem tristique pellentesque eget eu dui. Fusce lacinia tempor malesuada. Ut lacus sapien, placerat a ornare nec, elementum sit amet felis. Maecenas pretium lorem hendrerit eros sagittis fermentum.</p><h4 xss=removed>5 Myths That Prevent Job Seekers From Overcoming Failure</h4><p xss=removed>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vitae ante enim. Fusce sed elit est. Suspendisse sit amet mauris in quam pretium faucibus et aliquam odio.</p>', '2019-04-19 12:48:17', 1, 0, '2020-04-19 07:18:17');

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parent` varchar(11) DEFAULT NULL,
  `icon` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `icon`) VALUES
(14, 'SSC', NULL, 'icon-line-awesome-columns'),
(15, 'MPPSC', NULL, 'icon-line-awesome-slideshare'),
(16, 'NCRT', NULL, 'icon-line-awesome-mortar-board'),
(17, 'FEATURED', NULL, 'icon-line-awesome-soundcloud');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_id` char(9) NOT NULL,
  `name` varchar(64) NOT NULL,
  `review` decimal(5,2) NOT NULL,
  `review_counter` int(11) NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `name`, `review`, `review_counter`, `is_publish`, `description`, `created`, `last_update`, `deleted`) VALUES
(1, '', 'course Name', '0.00', 0, 0, 'Add a Description here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(2, 'C4', 'Course1', '0.00', 0, 0, 'Add a Description here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(3, 'C5', 'Course 2', '0.00', 0, 0, 'Add a Description here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(4, 'C6', 'Course 3', '0.00', 0, 0, 'Add a Description here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(5, '45e930ec3', 'sdsdf', '0.00', 0, 0, 'Add a Descrsdfiption here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(6, '55e930fd8', 'sdfsdfsf', '0.00', 0, 1, 'Add a Description heresdfs', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(7, '65e93102b', 'sfdfsdf', '0.00', 0, 0, 'Add a Description heresdfsf', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(8, 'COKI8', 'sdfsdf', '0.00', 0, 0, 'Add a Description heresdfsdf asdsd', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(9, 'COKI9', 'xffsdf', '0.00', 0, 0, 'Add a Description here', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(10, 'COKI10', 'werwer', '0.00', 0, 0, 'Add a Description herewrewer', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(11, 'COKI11', 'Sbana', '0.00', 0, 0, 'Add a Description heresdfsdf', '2020-04-13 09:20:48', '2020-04-13 03:51:46', 0),
(12, 'kalka12', 'sadas', '0.00', 0, 0, 'Add a Description here', '0000-00-00 00:00:00', '2020-04-13 04:25:08', 0),
(13, 'kalka13', 'Annamna', '0.00', 0, 1, '<ol><li>Add a Description here<u> xcvdfsdf sdfsdff<b>sdfsdff sdfsdf</b></u></li><li><u><b>dfdfgdfg</b></u></li></ol>', '2020-04-13 12:42:04', '2020-04-13 06:42:04', 0),
(14, 'kalka14', 'Annamna asddas', '0.00', 0, 1, '<ol><li>Add a Description here<u> xcvdfsdf sdfsdff<b>sdfsdff sdfsdf</b></u></li><li><u><b>dfdfgdfg</b></u></li></ol>', '2020-04-13 12:45:20', '2020-04-13 06:45:20', 0),
(15, 'kalka15', 'Anchalna', '0.00', 0, 1, 'sdjfksdfhsdkjfsdkfjsdfsdkfdhAdd a Description here', '2020-04-13 13:51:16', '2020-04-13 07:51:16', 0),
(16, 'kalka16', 'Hemalayan', '0.00', 0, 1, '<ol><li>asdsdadsadsasdadads</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li><li>assd</li><li>asd</li><li>das</li><li>as</li><li>d</li><li>asd</li><li>asd</li><li>asd</li><li>as</li><li>asd</li><li>asd</li><li>asd</li><li>as</li><li>das</li><li>da</li><li>s</li><li>asd</li><li>asd</li><li>asd</li></ol><p>asda</p><p>sda</p><p>sda</p><p>sd</p><p>asda</p><p>sd</p><table class=\"table table-bordered\"><tbody><tr><td>sasdasd</td><td>adasdasd</td><td>asdasdasd</td><td>adsasdasdasdasdasdadads</td><td>asdasdadaddasd</td></tr><tr><td>asdasdas</td><td>dasdadasd</td><td>asdasdsa</td><td>adada</td><td>dadasd</td></tr><tr><td>asdasdasdas</td><td>dasdasd</td><td>assdasdas</td><td>asdads</td><td>asdasdad</td></tr></tbody></table><p><br></p>', '2020-04-15 10:37:21', '2020-04-15 04:37:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_meta`
--

CREATE TABLE `course_meta` (
  `id` int(11) NOT NULL,
  `course_id` char(9) NOT NULL,
  `subid` varchar(32) NOT NULL,
  `serial` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_meta`
--

INSERT INTO `course_meta` (`id`, `course_id`, `subid`, `serial`) VALUES
(1, 'C6', '2', 1),
(2, 'C6', '3', 2),
(3, 'C6', '4', 3),
(4, 'C5', '4', 1),
(5, 'C5', '5', 2),
(6, 'C4', '4', 1),
(7, 'C4', '5', 2),
(8, 'C6', '6', 4),
(9, 'kalka16', 'sub11', 0),
(10, 'kalka16', '8', 1),
(11, 'kalka16', 'sub13', 2),
(12, 'kalka16', '6', 3),
(13, 'kalka16', '1', 4),
(14, 'kalka16', 'sub11', 5);

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
  `port` varchar(6) NOT NULL,
  `type` enum('tag','category') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indexing`
--

INSERT INTO `indexing` (`id`, `root`, `port`, `type`) VALUES
(198, 'post1', '5', 'tag'),
(199, 'post1', '14', 'category'),
(200, 'post1', '17', 'category'),
(201, 'post12', '5', 'tag'),
(202, 'post12', '14', 'category'),
(203, 'post12', '17', 'category');

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
  `id` int(11) NOT NULL,
  `lesson_id` char(9) NOT NULL,
  `name` text NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `lesson_id`, `name`, `is_publish`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(3, '3', 'Lesson 3', 0, '<p>Add a Description here</p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>hdgh</td><td>dfhdfh</td></tr><tr><td>dfdfh</td><td>dhgf</td></tr></tbody></table><p><br></p>', '2020-04-11 12:36:58', NULL, 0),
(4, 'lect4', 'Lesson text 1', 1, 'Deleted Lesson', '2020-04-13 19:47:58', '2020-04-13 19:17:58', 0),
(5, 'lect5', 'Lesson text 1', 1, 'Deleted Lesson', '2020-04-13 19:48:34', '2020-04-13 19:18:34', 0),
(6, 'lect6', 'fdfgfdgdfg', 1, 'Add a Description heredfgdfgdfg', '2020-04-13 19:54:11', '2020-04-13 19:24:11', 0),
(7, 'lect7', 'fdfgfdgdfg', 1, 'Add a Description heredfgdfgdfg', '2020-04-13 20:18:25', '2020-04-13 19:48:25', 0),
(8, 'lect8', 'xddfgdfg', 1, 'Add a Description heredfgdfgdgddgdgd', '2020-04-13 20:20:21', '2020-04-13 19:50:21', 0),
(10, 'lect10', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:22:13', '2020-04-13 19:52:13', 0),
(11, 'lect11', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:23:38', '2020-04-13 19:53:38', 0),
(12, 'lect12', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:24:03', '2020-04-13 19:54:03', 0),
(13, 'lect13', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:24:18', '2020-04-13 19:54:18', 0),
(14, 'lect14', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:24:49', '2020-04-13 19:54:49', 0),
(15, 'lect15', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:25:02', '2020-04-13 19:55:02', 0),
(16, 'lect16', 'sdfsdfqeqwe', 1, 'Add a Description herewqedw', '2020-04-13 20:25:12', '2020-04-13 19:55:12', 0),
(17, 'lect17', 'Lession Add', 1, 'nndkjndfkgfdkgjdgAdd a Description here', '2020-04-13 20:26:07', '2020-04-13 19:56:07', 0),
(18, 'lect18', 'dfsdfsdf', 1, 'Add a Description here sfsdfsdfsfdsdf', '2020-04-13 20:27:04', '2020-04-13 19:57:04', 0),
(19, 'lect19', 'dfsdfsdf', 1, 'Add a Description here sfsdfsdfsfdsdf', '2020-04-13 20:27:38', '2020-04-13 19:57:38', 0),
(20, 'lect20', 'dfsdfsdf', 1, 'Add a Description here sfsdfsdfsfdsdf', '2020-04-13 20:28:20', '2020-04-13 19:58:20', 0),
(21, 'lect21', 'dfsdfsdf', 1, 'Add a Description here sfsdfsdfsfdsdf', '2020-04-13 20:29:22', '2020-04-13 19:59:22', 0),
(22, 'lect22', 'lesson name', 1, 'Add a Description here', '2020-04-14 12:36:53', '2020-04-14 12:06:53', 0),
(23, 'lect23', 'Hlla Bolo', 1, '<ol><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li></ol>', '2020-04-14 12:40:34', '2020-04-14 12:10:34', 0);

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
  `product_id` varchar(9) NOT NULL,
  `product` char(32) NOT NULL,
  `price` double(5,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `tax_id` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product`, `price`, `discount`, `is_publish`, `tax_id`, `created_at`, `last_update`, `deleted`) VALUES
(1, 'pro1', 'First Product', 999.99, 999.99, 1, NULL, '2020-04-14 18:17:24', '2020-04-14 12:17:24', 0),
(2, 'pro2', 'Secound Product', 100.00, 80.00, 1, NULL, '2020-04-14 19:04:53', '2020-04-14 13:04:53', 0),
(3, 'pro3', 'Humalayan', 100.00, 99.00, 1, NULL, '2020-04-15 10:37:59', '2020-04-15 04:37:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `id` int(11) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `source` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`id`, `product_id`, `source`) VALUES
(17, 'pro1', 'C4'),
(18, 'pro2', 'C6'),
(19, 'pro2', '55e930fd8'),
(20, 'pro3', 'kalka16');

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
  `id` int(11) NOT NULL,
  `subject_id` char(9) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_id`, `name`, `description`, `is_publish`, `created_at`, `last_update`, `deleted`) VALUES
(1, '1', 'Subject 12', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(2, '2', 'Biology 1', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(3, '3', 'History1', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(4, '4', 'chemistry1', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(5, '5', 'physics 1', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(6, '6', 'Maths 1', 'Add a Description here', 0, '2020-04-11 12:38:10', '2020-04-13 04:13:32', 0),
(7, '8', 'sdsdad', 'Add a Descriptionasdasd here', 0, NULL, '2020-04-13 04:25:23', 0),
(9, 'sub1', 'dsdf', 'Add a Description heresdfsdf', 1, '2020-04-13 10:35:02', '2020-04-13 04:35:02', 0),
(10, 'sub10', 'sfdsdf', '<ol><li><span xss=removed>asasdasdasdasdasdas</span></li><li><span xss=removed>dfsdf</span></li><li><span xss=removed>dfvdfgdfg</span></li><li><span xss=removed>dfdfgfh</span></li><li><span xss=removed>dgdfgf<br></span>Add a Description here<u>asdad asasd<b>asdasdasd</b></u></li></ol>', 1, '2020-04-13 10:36:53', '2020-04-13 04:36:53', 0),
(12, 'sub11', 'sdfsdf', '<p>Add a Description heresdfsdf<span style=\"background-color: rgb(255, 239, 198);\">sfsdfsdfsdfsf</span></p><table class=\"table table-bordered\"><tbody><tr><td>sdfsdfsdfsdf</td><td>sdfsdf</td></tr><tr><td>sdfsdf</td><td><br></td></tr><tr><td>sdfsfsdfsdf</td><td>sdfsdf</td></tr><tr><td>sdfsdfsdfsf</td><td>sdfsf</td></tr><tr><td>sdfsdf</td><td>sdfsdf</td></tr></tbody></table><p><span style=\"background-color: rgb(255, 239, 198);\"><br></span></p>', 0, '2020-04-13 10:38:30', '2020-04-13 04:38:30', 0),
(14, 'sub13', 'sdfsdf', 'Add a Description heresdfsdfsdf', 0, '2020-04-13 10:39:40', '2020-04-13 04:39:40', 0),
(15, 'sub15', 'gdhfgh', 'Add a Description herefghfghfghfh', 0, '2020-04-13 10:39:56', '2020-04-13 04:39:56', 0),
(16, 'sub16', 'dsdfsf', 'Add a Description heresdfsfsdfsf', 0, '2020-04-13 10:49:03', '2020-04-13 04:49:03', 0),
(17, 'sub17', 'Anna Subject 345 234 ddfgdfg', 'Add a Description here sdfsdfsdfsdf', 1, '2020-04-13 10:51:11', '2020-04-13 04:51:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_meta`
--

CREATE TABLE `subject_meta` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(32) NOT NULL,
  `Lesson_id` varchar(32) NOT NULL,
  `Serial` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_meta`
--

INSERT INTO `subject_meta` (`id`, `subject_id`, `Lesson_id`, `Serial`) VALUES
(1, '6', '2', 1),
(2, '6', '3', 2);

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
(6, 'COVIT'),
(5, 'NCRT'),
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
(2, 'AKIASZ001', NULL, NULL),
(8, 'POST9', NULL, ' uploads/images/9.png'),
(9, 'kalka14', 'uploads/images/9.png', 'uploads/images/9.png'),
(10, 'kalka15', 'uploads/Ed Sheeran.png', 'uploads/Ed Sheeran.png'),
(11, 'post10', 'uploads/images\\/thumbnail/7_thumb-200x112.png', 'uploads/images\\/thumbnail/7_thumb-200x112.png'),
(12, 'post11', 'uploads/Ed Sheeran.png', 'uploads/Ed Sheeran.png'),
(13, 'pro1', 'uploads/images\\/thumbnail/7_thumb-200x112.png', 'uploads/images\\/thumbnail/7_thumb-200x112.png'),
(14, 'pro2', 'uploads/Ed Sheeran.png', 'uploads/Ed Sheeran.png'),
(15, 'C6', 'uploads/images\\/medium/img2_medium-780x408.jpg', 'uploads/images\\/medium/img2_medium-780x408.jpg'),
(16, '55e930fd8', 'uploads/images\\/medium/img2_medium-780x408.jpg', 'uploads/images\\/medium/img2_medium-780x408.jpg'),
(22, 'kalka16', 'uploads/images\\/medium/7_medium-1366x768.png', 'uploads/images\\/medium/7_medium-1366x768.png'),
(24, 'post1', 'uploads/images\\/medium/7_medium-1366x768.png', 'uploads/images\\/medium/7_medium-1366x768.png'),
(25, 'post12', 'uploads/images\\/medium/7_medium-1366x768.png', 'uploads/images\\/medium/7_medium-1366x768.png');

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
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
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
,`role_id` mediumtext
,`role_name` mediumtext
);

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
  `description` text DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `rate_count` int(11) DEFAULT NULL,
  `download` tinyint(1) NOT NULL DEFAULT 0,
  `time` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoid`, `nodeid`, `type`, `name`, `url`, `size`, `videotype`, `description`, `rating`, `rate_count`, `download`, `time`) VALUES
('W5e94767fa5bbd', 'lect17', 'paid', 'v2.mp4', 'uploads/v2.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '0'),
('W5e94767fbcd33', 'lect17', 'paid', 'v9.mp4', 'uploads/v9.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '0'),
('W5e94767fd5f7e', 'lect17', 'paid', 'v5.mp4', 'uploads/v5.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '0'),
('W5e94774306518', 'lect21', 'paid', 'v2.mp4', 'uploads/v2.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33'),
('W5e9477432ad9d', 'lect21', 'paid', 'v9.mp4', 'uploads/v9.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33'),
('W5e955a0577164', 'lect22', 'paid', 'v5.mp4', 'uploads/v5.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33'),
('W5e955a05a0b60', 'lect22', 'paid', 'v9.mp4', 'uploads/v9.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33'),
('W5e9565c6a40f4', 'lect23', 'paid', 'v3.mp4', 'uploads/v3.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33'),
('W5e9565c6c7e66', 'lect23', 'paid', 'v6.mp4', 'uploads/v6.mp4', '17018265', 'mp4', NULL, NULL, NULL, 0, '3:54:33');

-- --------------------------------------------------------

--
-- Structure for view `article_view`
--
DROP TABLE IF EXISTS `article_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`j03dso1bl3sm`@`localhost` SQL SECURITY DEFINER VIEW `article_view`  AS  select `article`.`id` AS `id`,`article`.`postid` AS `postid`,`article`.`title` AS `title`,`article`.`slug` AS `slug`,`article`.`created_by` AS `created_by`,`article`.`content` AS `content`,`article`.`public_at` AS `public_at`,`article`.`is_publish` AS `is_publish`,`article`.`deleted` AS `deleted`,`article`.`created_at` AS `created_at`,`user_details`.`user_id` AS `user_id`,`user_details`.`name` AS `name`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image` from ((`article` left join `user_details` on(`article`.`created_by` = `user_details`.`user_id`)) left join `thumbnail` on(`article`.`postid` = `thumbnail`.`root`)) group by `article`.`postid` order by `article`.`created_at` desc ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`j03dso1bl3sm`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS  select `logme`.`logid` AS `logid`,`logme`.`email` AS `email`,`logme`.`phone` AS `phone`,`logme`.`role` AS `role`,`logme`.`status` AS `status`,`logme`.`joindate` AS `joindate`,`user_details`.`name` AS `name`,`user_details`.`details` AS `details`,`thumbnail`.`thumb` AS `thumb`,`thumbnail`.`image` AS `image`,group_concat(`roles_users`.`role_id` separator ',') AS `role_id`,group_concat(`roles`.`name` separator ',') AS `role_name` from ((((`logme` join `user_details` on(`logme`.`logid` = `user_details`.`user_id`)) left join `thumbnail` on(`logme`.`logid` = `thumbnail`.`root`)) left join `roles_users` on(`logme`.`logid` = `roles_users`.`user_id`)) left join `roles` on(`roles`.`id` = `roles_users`.`role_id`)) group by `logme`.`logid` ;

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
  ADD PRIMARY KEY (`postid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `course_meta`
--
ALTER TABLE `course_meta`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lesson_id` (`lesson_id`) USING BTREE;

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
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject_meta`
--
ALTER TABLE `subject_meta`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_meta`
--
ALTER TABLE `course_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `indexing`
--
ALTER TABLE `indexing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject_meta`
--
ALTER TABLE `subject_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
