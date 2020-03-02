-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 01:36 PM
-- Server version: 5.5.15
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `piktion1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `pic_id` int(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `userid`, `description`, `pic_id`, `date`) VALUES
(23, 2, 'gdsg', 19, '2016-04-29 15:05:16'),
(24, 2, 'dgdg', 19, '2016-04-29 15:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(40) NOT NULL,
  `foldername` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `folder_pics`
--

CREATE TABLE IF NOT EXISTS `folder_pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(40) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `userid` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `action` varchar(20) DEFAULT NULL,
  `read` bit(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userid`, `added_by`, `pic_id`, `action`, `read`, `date`) VALUES
(1, 2, 4, 19, 'commented on', b'1', '2016-04-15 05:57:58'),
(2, 2, 3, 19, 'commented on', b'1', '2016-04-15 05:58:37'),
(3, 2, 5, 19, 'commented on', b'1', '2016-04-15 05:59:16'),
(4, 2, 4, 18, 'commented on', b'1', '2016-04-15 06:24:36'),
(5, 4, 2, 13, 'commented on', b'1', '2016-04-15 07:50:31'),
(6, 4, 2, 13, 'commented on', b'1', '2016-04-15 07:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `notify_folder`
--

CREATE TABLE IF NOT EXISTS `notify_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foldername` varchar(100) NOT NULL,
  `from_uid` int(40) NOT NULL,
  `userid` int(40) NOT NULL,
  `read` bit(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `picdetail`
--

CREATE TABLE IF NOT EXISTS `picdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `picname` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `likes` int(100) NOT NULL,
  `dislikes` int(100) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `liked_by` int(10) NOT NULL,
  `disliked_by` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `picdetail`
--

INSERT INTO `picdetail` (`id`, `userid`, `picname`, `caption`, `likes`, `dislikes`, `time`, `date`, `liked_by`, `disliked_by`, `report`) VALUES
(8, 3, 'ajax-loader.gif', '', 0, 0, '00:00:00', '2016-01-27', 0, 0, 0),
(12, 4, 'AADH0037.JPG', '', 0, 0, '00:00:00', '2016-02-16', 0, 0, 0),
(18, 2, '10989e6a0b4a9df354343baf3b6f5c2a.jpeg', '', 1, 0, '00:00:00', '2016-03-02', 2, 0, 0),
(19, 2, 'e2f9ec07b0341c23ecc52840c690dc76.jpg', 'hindi versions of how i met your mother', 0, 0, '00:00:00', '2016-04-04', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isactive` bit(1) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `isadmin` bit(1) NOT NULL,
  `followers` int(255) NOT NULL,
  `displaypic` varchar(150) NOT NULL,
  `coverimg` varchar(150) NOT NULL,
  `active` int(25) NOT NULL,
  `security` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `email`, `password`, `isactive`, `contact`, `dob`, `gender`, `profession`, `isadmin`, `followers`, `displaypic`, `coverimg`, `active`, `security`) VALUES
(2, 'abhishek', 'abhishek@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941baaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-1950733356ecb4a7b990a46bbc0319b4f221b63bad12edf53df12b005bd4deb9ef88ffe27f8cc083b4', b'1', '8456799955', '0000-00-00', 'Male', 'student', b'1', 0, 'dmyml.png', '221813_323146237781685_1171734372_n.jpg', 1, ''),
(3, 'sharmaabhi', 'sharmaabhi805@gmail.com', 'f18f057ea44a945a083a00e6fcc11637d186042daaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-147207225967e47d79a84d8b3e45c38522878d39444ec06f28c384407c69f8b951a4ff1a3eaf0f0cb2', b'1', '8451236945', '0000-00-00', 'Male', 'engineer', b'0', 0, 'dmyml.png', '', 1, ''),
(4, 'rahul', 'rahul@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941baaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-1950733356ecb4a7b990a46bbc0319b4f221b63bad12edf53df12b005bd4deb9ef88ffe27f8cc083b4', b'1', '7598456546', '1994-08-07', 'Male', '', b'0', 0, 'dmyml.png', '', 0, ''),
(5, 'gulati', 'gulati@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941baaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-1950733356ecb4a7b990a46bbc0319b4f221b63bad12edf53df12b005bd4deb9ef88ffe27f8cc083b4', b'1', '', '0000-00-00', 'Male', '', b'1', 0, 'dmyml.png', '', 0, ''),
(6, 'gurm', 'gurm@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941baaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-1950733356ecb4a7b990a46bbc0319b4f221b63bad12edf53df12b005bd4deb9ef88ffe27f8cc083b4', b'1', '457894', '1995-08-07', 'Male', '', b'0', 0, 'dmyml.png', '', 0, ''),
(7, 'shikha', 'shikha@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941baaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d31578-1950733356ecb4a7b990a46bbc0319b4f221b63bad12edf53df12b005bd4deb9ef88ffe27f8cc083b4', b'1', '784512', '1994-09-27', 'Female', '', b'0', 0, 'dmyfml.png', '', 0, ''),
(8, 'nitish', 'niti@hka.com', '9cf329729ce7b65b700389fd4947415eb9e20746aaadb007a5285c8ad46a7ac29ac88e4cb5500ef9f8d65f1de9d4347f8ffc4d9d97d3157814780928753f546a4a4b0f96a8a77bf5ae9b601714ea6dc811e07d909ecc7c3abef6cc1dfb631e0e35', b'1', '', '0000-00-00', '', '', b'1', 0, '', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
