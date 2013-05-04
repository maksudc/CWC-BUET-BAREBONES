-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2012 at 07:25 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codewarriors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'kawnayeen@hotmail.com', '50032bcd7eee659c1dbfa33282e6a0ff');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE IF NOT EXISTS `attendees` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`event_id`, `user_id`) VALUES
(1, 0),
(2, 0),
(2, 2),
(3, 0),
(3, 2),
(4, 2),
(5, 2),
(6, 0),
(7, 3),
(8, 2),
(16, 0),
(17, 2),
(19, 0),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`) VALUES
(1, 'PHP'),
(2, 'Ruby'),
(3, '.NET'),
(4, 'Perl');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `talk_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text,
  `rating` tinyint(1) DEFAULT NULL,
  `is_private` tinyint(1) DEFAULT '0',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `talk_id`, `user_id`, `body`, `rating`, `is_private`, `create_date`) VALUES
(1, 1, 1, 'Excellent session!', NULL, 0, '2012-01-23 20:01:53'),
(2, 1, 1, 'It did really open my eyes; as web developers we very often ignore the actual protocol that we''re sending stuff through. Understanding the underlying mechanics of HTTP is indeed really important and even though I was half asleep the talk did indeed have many valid points and was nicely presented.', NULL, 0, '2012-01-23 20:11:34'),
(4, 1, 1, 'Great talk! It''s very nice to listen the basics explained by a master. Specially some basics I even knew about, thought.', NULL, 0, '2012-01-23 20:36:27'),
(5, 1, 1, 'Although much of the talk was what you can see in Symfony2 caching documentation, but anyway it is a pleasure to hear Fabien live. Big todo to all of us, read the HTTP Specification.', NULL, 0, '2012-01-23 20:39:31'),
(6, 1, 2, 'I have a lot of thing to discuss', NULL, 0, '2012-01-24 20:18:18'),
(7, 1, 2, '', NULL, 0, '2012-01-24 20:18:29'),
(8, 1, 2, '', NULL, 0, '2012-01-25 09:17:27'),
(9, 2, 2, 'askdnas', NULL, 0, '2012-01-27 13:00:05'),
(10, 1, 2, 'echo(\\''sadsadsa\\'')', NULL, 0, '2012-01-28 13:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `summary` text CHARACTER SET latin1,
  `logo` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `href` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `total_attending` int(11) DEFAULT '0',
  `total_comments` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `user_id`, `title`, `summary`, `logo`, `category_id`, `location`, `href`, `start_date`, `end_date`, `is_active`, `total_attending`, `total_comments`, `create_date`) VALUES
(1, 1, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 1, '2012-01-20 10:11:12'),
(2, 1, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 1, '2012-01-24 10:13:46'),
(3, 1, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-24 10:18:35'),
(4, 0, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-24 09:18:27'),
(5, 0, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-24 09:18:41'),
(6, 0, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-24 16:45:56'),
(7, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 1, '2012-01-24 17:08:13'),
(8, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 1, 1, '2012-01-24 17:11:18'),
(9, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-24 18:02:24'),
(10, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 09:40:57'),
(11, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 09:44:04'),
(12, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 09:46:24'),
(13, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 09:46:42'),
(14, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 09:47:08'),
(15, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 10:21:20'),
(16, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 10:22:28'),
(17, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 1, 0, '2012-01-27 14:28:55'),
(18, 2, 'Php Expert Session 2012', 'This is the most prestigious session conducted for php  gurus in Bnagladesh.', '', 1, 'UIU', 'http://www.facebook.,com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-01-27 15:31:42'),
(19, 2, 'Raju Had a great Time', 'asndcjsakndjk\r\nasfdsakfndsnf', NULL, 1, 'UIU', 'http://www.facebook.com', '0000-00-00', '0000-00-00', 1, 1, 0, '2012-01-28 13:24:10'),
(20, 0, 'MVC', 'SDmsaklmdlsda', NULL, 4, 'UIU', 'http://www.facebook.com', '0000-00-00', '0000-00-00', 1, 0, 0, '2012-02-24 21:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE IF NOT EXISTS `event_category` (
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`event_id`, `category_id`) VALUES
(0, 0),
(0, 0),
(0, 0),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE IF NOT EXISTS `event_comments` (
  `event_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text,
  `rating` tinyint(4) DEFAULT NULL,
  `is_private` tinyint(4) DEFAULT '0',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `event_comments`
--

INSERT INTO `event_comments` (`event_comment_id`, `event_id`, `user_id`, `body`, `rating`, `is_private`, `create_date`) VALUES
(1, 2, 2, 'I am Munna', NULL, 0, '2012-01-25 13:08:33'),
(2, 2, 2, 'The things are going crazy', NULL, 0, '2012-01-25 13:12:29'),
(3, 7, 2, 'I am Munna', NULL, 0, '2012-01-26 21:15:18'),
(4, 7, 2, 'I am Munna', NULL, 0, '2012-01-26 21:17:05'),
(5, 8, 2, 'Hye', NULL, 0, '2012-01-26 21:17:39'),
(6, 1, 2, 'Hye', NULL, 0, '2012-01-27 06:27:11'),
(7, 2, 0, 'alert(\\''Hi\\'')', NULL, 0, '2012-01-27 15:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `talks`
--

CREATE TABLE IF NOT EXISTS `talks` (
  `talk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `summary` text,
  `speaker` varchar(50) NOT NULL DEFAULT '',
  `slide_link` varchar(200) DEFAULT NULL,
  `total_comments` int(11) DEFAULT '0',
  PRIMARY KEY (`talk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `talks`
--

INSERT INTO `talks` (`talk_id`, `event_id`, `title`, `summary`, `speaker`, `slide_link`, `total_comments`) VALUES
(1, 2, 'Profiling PHP Applications', 'The web is full of advice focussed on improving performance. Before you can optimise however, you need to find out if your code is actually slow; then you need to understand the code; and then you need to find out what you can optimise.\n\nThis talk introduces various tools and concepts to optimise the optimisation of your PHP applications.', 'Derick Rethans', NULL, 2),
(3, 17, 'what a talk ????', 'u really wanna talk ???', 'obviously me !!!', 'http://www.me.com', 2),
(4, 18, 'Greener Planet', 'asfdfdsfsdfsf', 'obviously me !!!', 'http://www.facebook.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `create_date`) VALUES
(1, 'phpfour@gmail.com', '', '2012-01-23 07:36:06'),
(2, 'mc65799@gmail.com', 'Raju', '2012-01-24 17:05:23'),
(3, 'salehwithdm@gmail.com', 'munna', '2012-01-26 09:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_photo`
--

CREATE TABLE IF NOT EXISTS `user_photo` (
  `user_id` int(11) NOT NULL,
  `user_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_photo`
--

INSERT INTO `user_photo` (`user_id`, `user_photo`) VALUES
(3, './uploads/user_photos/387643_306800436024210_291300497574204_771182_673208430_n.jpg'),
(2, './uploads/user_photos/iconnect.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
