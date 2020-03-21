-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2020 at 10:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalka`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(5) NOT NULL AUTO_INCREMENT,
  `house` varchar(32) NOT NULL,
  `post` varchar(32) NOT NULL,
  `dist` varchar(32) NOT NULL,
  `state` varchar(12) NOT NULL,
  `city` varchar(12) NOT NULL,
  `country` varchar(6) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `house`, `post`, `dist`, `state`, `city`, `country`, `pincode`) VALUES
(1, 'dlw', 'dlw', 'varanasi', 'UP', 'varanasi', 'India', '123456'),
(2, 'akarmatta', 'dlw', 'varanasi', 'UP', 'varanasi', 'India', '123456'),
(3, 'Raju Lal ', 'kakarmatta', 'varanasi', 'jgh.jpg', 'Varanasi', 'India', '221010');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `ansid` char(32) NOT NULL,
  `question` char(32) NOT NULL,
  `answers` text NOT NULL,
  `userid` char(32) NOT NULL,
  PRIMARY KEY (`ansid`),
  KEY `question` (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `postid` char(6) NOT NULL,
  `title` text NOT NULL,
  `slug` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `public_at` datetime NOT NULL,
  `is_publish` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_at` char(6) NOT NULL,
  KEY `postid` (`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` char(5) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parent` varchar(32) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `category` char(4) NOT NULL,
  `review` decimal(5,2) NOT NULL,
  `review_counter` int(11) NOT NULL,
  `description` text NOT NULL,
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docfile`
--

DROP TABLE IF EXISTS `docfile`;
CREATE TABLE IF NOT EXISTS `docfile` (
  `docid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `type` enum('free','paid') NOT NULL,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `size` varchar(32) NOT NULL,
  `doctype` varchar(32) NOT NULL,
  `download` tinyint(1) NOT NULL,
  KEY `nodeid` (`nodeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indexing`
--

DROP TABLE IF EXISTS `indexing`;
CREATE TABLE IF NOT EXISTS `indexing` (
  `id` int(11) NOT NULL,
  `root` varchar(32) NOT NULL,
  `port` varchar(6) NOT NULL,
  KEY `root` (`root`),
  KEY `port` (`port`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_id` char(32) NOT NULL,
  `name` text NOT NULL,
  `subject` char(32) NOT NULL,
  `serial` varchar(4) NOT NULL,
  `description` text NOT NULL,
  KEY `subject` (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE IF NOT EXISTS `library` (
  `libid` char(32) NOT NULL,
  `user_id` char(32) NOT NULL,
  `resources` char(32) NOT NULL,
  `resourcestype` enum('course','video','test','doc') NOT NULL,
  `validity` datetime NOT NULL,
  PRIMARY KEY (`libid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logme`
--

DROP TABLE IF EXISTS `logme`;
CREATE TABLE IF NOT EXISTS `logme` (
  `logid` char(32) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` char(5) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `joindate` datetime NOT NULL,
  PRIMARY KEY (`logid`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logme`
--

INSERT INTO `logme` (`logid`, `phone`, `email`, `password`, `role`, `status`, `joindate`) VALUES
('100', '789456123', 'rit@gmail.com', '12345', 's', 'active', '2020-03-13 00:00:00'),
('200', '7894561232', 'rit1@gmail.com', '123456', 's', 'active', '2020-03-13 00:00:00'),
('300', '8951122122', 'rit12@gmail.com', '12345', 's', 'active', '2020-03-13 00:00:00'),
('400', '8951122124', 'rit123@gmail.com', '12345', 's', 'active', '2020-03-13 08:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` char(32) NOT NULL,
  `ip` varchar(24) NOT NULL,
  `lastlog` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `ip`, `lastlog`) VALUES
('200', '::1', '2020-03-13 08:03:11'),
('200', '::1', '2020-03-13 08:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` char(6) NOT NULL,
  `userid` char(32) NOT NULL,
  `totalprice` double(5,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `modeid` char(6) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_meta`
--

DROP TABLE IF EXISTS `order_meta`;
CREATE TABLE IF NOT EXISTS `order_meta` (
  `id` int(11) NOT NULL,
  `product_id` char(6) NOT NULL,
  `order_id` char(32) NOT NULL,
  `price` double(5,2) NOT NULL,
  `discount_price` double(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment` char(32) NOT NULL,
  `transaction` varchar(64) NOT NULL,
  `userid` char(32) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`payment`),
  KEY `userid` (`userid`),
  KEY `orderid` (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product` char(32) NOT NULL,
  `source` char(32) NOT NULL,
  `price` double(5,2) NOT NULL,
  `discount` double(5,2) NOT NULL,
  `tax_id` varchar(6) NOT NULL,
  KEY `product` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qusid` char(32) NOT NULL,
  `test` char(32) NOT NULL,
  `type` int(11) NOT NULL,
  `title` text NOT NULL,
  `answer` varchar(2) NOT NULL,
  `values` int(11) NOT NULL,
  PRIMARY KEY (`qusid`),
  KEY `test` (`test`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_meta`
--

DROP TABLE IF EXISTS `question_meta`;
CREATE TABLE IF NOT EXISTS `question_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` char(32) NOT NULL,
  `option` text NOT NULL,
  `count` varchar(2) NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ques` (`ques`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `result_id` int(11) NOT NULL,
  `test_id` char(32) NOT NULL,
  `user_id` char(32) NOT NULL,
  `obtained` int(6) NOT NULL,
  `attemptq` int(6) NOT NULL,
  `correctq` int(6) NOT NULL,
  `wrongq` int(6) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `test_id` (`test_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roleid` char(4) NOT NULL,
  `title` varchar(32) NOT NULL,
  KEY `roleid` (`roleid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `title`) VALUES
('s', 'student'),
('m', 'manager'),
('a', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` char(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `course` varchar(32) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(5) NOT NULL,
  `tag` varchar(128) NOT NULL,
  KEY `tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `testid` char(32) NOT NULL,
  `nodeid` char(32) NOT NULL,
  `title` text NOT NULL,
  `duration` varchar(12) NOT NULL,
  `nofqus` int(6) NOT NULL,
  `totalno` int(6) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thumbnail`
--

DROP TABLE IF EXISTS `thumbnail`;
CREATE TABLE IF NOT EXISTS `thumbnail` (
  `id` int(11) NOT NULL,
  `root` char(32) NOT NULL,
  `thumb` text NOT NULL,
  `image` text NOT NULL,
  KEY `root` (`root`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `address_id` char(5) NOT NULL,
  `image` text NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `name`, `user_id`, `address_id`, `image`, `mobile`, `details`) VALUES
(1, 'Ram Lal', '100', '1', 'xyz.jpg', '468465564654', 'njkskdsd\nnsdksknvvnxvn\nxncvxvnmxv,cxvmxnvx,m,xcv,mx'),
(2, 'Hari Lal', '200', '2', 'sdffd.jpg', '4684655654', 'njkskdsd\nnsdksknvvnxvn\nxncvxvnmxv,cxvmxnvx,m,xcv,mx'),
(3, 'Raju Lal Srivastava', '300', '3', 'jgh.jpg', '465645655', 'njkskdsd\nnsdksknvvnxvn\nxncvxvnmxv,cxvmxnvx,m,xcv,mx');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
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
  `time` varchar(32) NOT NULL,
  PRIMARY KEY (`videoid`),
  KEY `nodeid` (`nodeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
