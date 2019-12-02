-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2019 at 09:58 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_info`
--

DROP TABLE IF EXISTS `about_info`;
CREATE TABLE IF NOT EXISTS `about_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_info`
--

INSERT INTO `about_info` (`id`, `title`, `content`) VALUES
(1, 'About', '<p>about page text</p>\r\n\r\n<p>edited</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `created` date NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `content`, `created`, `posted_by`, `announcement_title`) VALUES
(1, '<p>test edited announcement</p>\r\n', '2019-11-27', 'newAdmin', 'edited title'),
(2, '<p>test</p>\r\n', '2019-12-01', 'newAdmin', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `poster` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`poster`, `created`, `title`, `content`, `post_id`) VALUES
('Sam Willis', '2019-09-18 00:00:00', 'title', '<p>This is an article that has a bunch of text. The quick brown fox jumps over the lazy dog.</p>\r\n', 1),
('newAdmin', '2019-12-01 00:00:00', 'About', 'About content here', 13),
('newAdmin', '2019-12-01 00:34:23', 'Font Test', '<h1>Test Heading</h1>\r\n\r\n<h2>Sub Heading</h2>\r\n\r\n<h3>Even Smaller Heading</h3>\r\n\r\n<p>Normal Text</p>\r\n\r\n<pre>\r\nFormatted Text</pre>\r\n', 11);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE IF NOT EXISTS `contact_info` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_title` varchar(255) NOT NULL,
  `contact_content` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `contact_title`, `contact_content`) VALUES
(1, 'Phone', '5011112233'),
(2, 'email', 'abaker@ualr.edu\r\n'),
(4, 'fax', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_content` text NOT NULL,
  `reply_user` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `thread_id` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`reply_id`, `reply_content`, `reply_user`, `parent_id`, `thread_id`, `created`) VALUES
(3, 'asdf', 'newUser', NULL, 2, '2019-10-02'),
(4, 'qwer', 'newAdmin', 3, 2, '2019-10-23'),
(5, 'comment level 2', 'testUser', 4, 2, '2019-10-14'),
(6, 'separate comment', 'BKeltch', NULL, 2, '2019-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

DROP TABLE IF EXISTS `opportunities`;
CREATE TABLE IF NOT EXISTS `opportunities` (
  `opp_id` int(11) NOT NULL AUTO_INCREMENT,
  `opp_title` varchar(255) NOT NULL,
  `opp_description` text NOT NULL,
  PRIMARY KEY (`opp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`opp_id`, `opp_title`, `opp_description`) VALUES
(6, 'Cybersecurity', '<h1>Cybersecurity</h1>\r\n\r\n<p>With over 300,000 open positions nation-wide in cybersecurity today and 1.1 million expected by 2021, the UA Little Rock Computer Science Department focuses on providing students the education and opportunities they need to thrive in this challenging discipline. We invite you to come to be a part of a community working hard to protect and defend our society against cybersecurity threats.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Discipline Description</p>\r\n\r\n<p>Job Opportunities</p>\r\n\r\n<p>Projects</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For more information, contact:</p>\r\n\r\n<p><a href=\"https://ualr.edu/computerscience/about/faculty-and-staff/philip-huff/\">Mr. Philip Huff</a><br />\r\nOffice: EIT 573<br />\r\nEmail:&nbsp;<a href=\"mailto:pdhuff@ualr.edu\">pdhuff@ualr.edu</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>test edit</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `date_asked` date NOT NULL,
  `resolved` tinyint(1) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `name`, `email`, `question`, `date_asked`, `resolved`) VALUES
(3, 'John Smith', 'example@email.com', 'test', '2019-12-02', 1),
(5, 'John Smith', 'example@email.com', 'test question', '2019-12-02', 1),
(6, 'John Smith', 'example@email.com', 'test question', '2019-12-02', 1),
(7, 'test ', 'example@email.com', 'testtesttest', '2019-12-02', 1),
(8, 'second test', 'example@email.com', 'this is another question\r\n', '2019-12-02', 1),
(9, 'new question', 'sxwillis@ualr.edu', 'Test Search Function...', '2019-12-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(255) NOT NULL,
  `resource_link` varchar(255) NOT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`, `resource_link`) VALUES
(1, 'StackOverflow', 'https://www.stackoverflow.com'),
(4, 'Student Forums', 'forum.php');

-- --------------------------------------------------------

--
-- Table structure for table `student_orgs`
--

DROP TABLE IF EXISTS `student_orgs`;
CREATE TABLE IF NOT EXISTS `student_orgs` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) NOT NULL,
  `org_description` text NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_orgs`
--

INSERT INTO `student_orgs` (`org_id`, `org_name`, `org_description`) VALUES
(1, 'Cybersecurity Club test', '<p>asdf</p>\r\n\r\n<p>test edit</p>\r\n'),
(2, 'UALR ACM', '<p>ACM Description</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `subject`, `description`, `created`, `posted_by`) VALUES
(2, 'Post Title', 'This is the post content', '2019-10-21', 'newUser'),
(3, 'asdf', 'asdfasdf', '2019-10-21', 'testUser'),
(4, 'Third Thread', 'This is another thread', '2019-10-22', 'newUser');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `role`) VALUES
('Sam', '$2y$10$ttMjVEy3XvDBHN7KRNFX3O.Z2JDxwWxjsVaNk3xFlflErjALbsI3C', 1, 'user'),
('test', '$2y$10$dOa/wDUqRMfJCsBF8NVHFeShG5ugk0TQ4uoCaMJ9SGqeM51UkHOFC', 2, 'user'),
('newAdmin', '$2y$10$i9kWbU2lt0aQm8/FNOoknexte45T32aVDSh3w.vnCakKtutw6WTMO', 6, 'admin'),
('roleTest', '$2y$10$J6TZDJMMuYnHCFOcHoNMF.bSJzWJXF2yaroyHIKNh1rfoTvNPH0QK', 5, 'admin'),
('newUser', '$2y$10$G.04KI7AyjZynMO4ZJv5C.CjCjd2h99y.LyF/Qw47yut9NdF3hPzy', 8, 'user'),
('testUser', '$2y$10$XQayvvA9EUwphjsr1YVvfOt1bYflp2xQ7j9G7brtkhq4IEXV0vEiq', 9, 'user'),
('foo', '$2y$10$NHiQEYsTNpl/Zv01hqFF1OYCwMWl1XQGEnpvC3k3qqjfuzL8Jn4ia', 21, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
