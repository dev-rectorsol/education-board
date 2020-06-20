-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 07:40 AM
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
-- Database: `chahat`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `details` text DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `status`, `details`, `deleted`, `created`) VALUES
(31, 1, '{\"dirname\":\"uploads\\/images\\/medium\",\"basename\":\"tempMail_n_medium-700x500.png\",\"extension\":\"png\",\"filename\":\"tempMail_n_medium-700x500\",\"status\":1,\"last_modified\":\"June 11 2020 07:43:08.\",\"size\":6088,\"dime\":{\"0\":700,\"1\":500,\"2\":3,\"3\":\"width=\\\"700\\\" height=\\\"500\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}}', 0, '2020-06-11 00:00:00'),
(32, 1, '{\"dirname\":\"uploads\\/images\\/medium\",\"basename\":\"WhatsApp_Image_2020-02-20_at_16_42_06_medium-1280x720.jpeg\",\"extension\":\"jpeg\",\"filename\":\"WhatsApp_Image_2020-02-20_at_16_42_06_medium-1280x720\",\"status\":1,\"last_modified\":\"June 11 2020 07:43:08.\",\"size\":233070,\"dime\":{\"0\":1280,\"1\":720,\"2\":2,\"3\":\"width=\\\"1280\\\" height=\\\"720\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2020-06-11 00:00:00'),
(33, 1, '{\"dirname\":\"uploads\\/images\\/medium\",\"basename\":\"diwali-in-varanasi_medium-640x350.jpg\",\"extension\":\"jpg\",\"filename\":\"diwali-in-varanasi_medium-640x350\",\"status\":1,\"last_modified\":\"June 11 2020 07:43:08.\",\"size\":322021,\"dime\":{\"0\":640,\"1\":350,\"2\":2,\"3\":\"width=\\\"640\\\" height=\\\"350\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2020-06-11 00:00:00'),
(34, 1, '{\"dirname\":\"uploads\\/images\\/medium\",\"basename\":\"UCuwGVi-steve-jobs-wallpaper_medium-1920x1200.png\",\"extension\":\"png\",\"filename\":\"UCuwGVi-steve-jobs-wallpaper_medium-1920x1200\",\"status\":1,\"last_modified\":\"June 11 2020 07:43:22.\",\"size\":149452,\"dime\":{\"0\":1920,\"1\":1200,\"2\":3,\"3\":\"width=\\\"1920\\\" height=\\\"1200\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}}', 0, '2020-06-11 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
