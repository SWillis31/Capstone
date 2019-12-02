-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2019 at 05:39 PM
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
(1, 'About', '<h1>&nbsp;</h1>\r\n\r\n<p>The Computer Science department offers courses covering a wide range of topics in Computer Science, including programming and programming languages, data structures and algorithms, assembly language, computer architecture, networking, operating systems, compilers, software engineering, file structures, database systems, graphics, artificial intelligence, and the theory of computation. The department seeks to prepare students both for careers in the computing industry and for advanced study in Computer Science. The department maintains close ties with local computing industries and encourages its students to participate in the many cooperative and internship opportunities made available through these contacts.</p>\r\n\r\n<p>The program educational objectives are:</p>\r\n\r\n<ul>\r\n	<li>Be successful in their careers as computer scientists in business, industry, or for advanced studies in the discipline.</li>\r\n	<li>Apply fundamental principles and practices of computer science for the design, development, and management of software systems.</li>\r\n	<li>Serve as role models of ethical and responsible behavior and foster teamwork and cooperation in their profession and their communities.</li>\r\n	<li>Engage in life-long learning, embracing the latest practices, methods, and technologies in their careers.</li>\r\n</ul>\r\n\r\n<p>The program has measurable program results that enable students, by the time of graduation, to have met the following ABET-approved student outcomes (SO&rsquo;s):</p>\r\n\r\n<ul>\r\n	<li>Analyze a complex computing problem and to apply principles of computing and other relevant disciplines to identify solutions.</li>\r\n	<li>Design, implement and evaluate a computing-based solution to meet a given set of computing requirements in the context of the program&rsquo;s discipline.</li>\r\n	<li>Communicate effectively in a variety of professional contexts.</li>\r\n	<li>Recognize professional responsibilities and make informed judgments in computing practice based on legal and ethical principles.</li>\r\n	<li>Function effectively as a member or leader of a team engaged in activities appropriate to the program&rsquo;s discipline.</li>\r\n	<li>Apply computer science theory and software development fundamentals to produce computing-based solutions.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n');

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
('Sam Willis', '2019-09-18 00:00:00', 'title', '<p>Today at UA Little Rock 4 students have come to their final day where they will be representing their project. This project will determine how their end of the year will look like and would their professor be impressed or ashamed of his students. This project represents what they have learned in their years in college and how they would use their knowledge. Stay tune in the next 24 hours for the live update on their project.   </p>\r\n', 1),
('newAdmin', '2019-12-01 00:00:00', 'About', 'Welcome to UA Little Rock! ', 13);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`opp_id`, `opp_title`, `opp_description`) VALUES
(6, 'Cybersecurity', '<p>With over 300,000 open positions nation-wide in cybersecurity today and 1.1 million expected by 2021, the UA Little Rock Computer Science Department focuses on providing students the education and opportunities they need to thrive in this challenging discipline. We invite you to come to be a part of a community working hard to protect and defend our society against cybersecurity threats.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Discipline Description</strong></p>\r\n\r\n<p>UA Little Rock a longstanding designation as a DHS and NSA Center of Academic Excellence in Information Assurance and provides the course offerings to prepare future cybersecurity professionals to hit the ground running in their careers. Our faculty come with rich industry experience and have a passion to build your skills and interest in cybersecurity defense operations. Our curriculum is dynamic to meet the constantly changing threat landscape in cybersecurity.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Job Opportunities&nbsp;</strong></p>\r\n\r\n<p>UA Little Rock sits in the capital city with two large military bases and numerous financial, energy, IT services and retail organizations. We have a strong relationship with our industry partners and work to identify local internships and job placements for our graduates. Through our research and workforce development initiatives, students are able to work closely with industry, the military, and government agencies throughout their academic careers.</p>\r\n\r\n<p>The average salaries for cybersecurity Analyst and related positions are as follows:</p>\r\n\r\n<ul>\r\n	<li>Application Security Engineer: $100,000 to $210,000</li>\r\n	<li>Network Security Analyst:$90,000 to $150,000</li>\r\n	<li>IS Security Manager:$120,00 to $180,000</li>\r\n	<li>Cybersecurity Analyst:$90,000 to $185,000</li>\r\n	<li>IS Security Engineer:$90,000 to $150,000</li>\r\n	<li>Penetration Tester:$80,000 to $130,000</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Projects</strong></p>\r\n\r\n<p>Here, students have the opportunity to work in cutting edge cybersecurity research both as graduates and undergraduates. Through NSF grant funding and in partnership with the Arkansas Department of Education and local industry, we develop enterprise-quality workouts in the UA Little Rock Cyber Gym. These workouts are immediately distributed to middle and high school students throughout the nation. The UA Little Rock Cyber Gym provides a safe and highly accessible cloud environment for students to learn hands-on cybersecurity skills. Our student researchers work to develop new competition-style cybersecurity workouts and find more effective techniques to distribute the content through cloud technologies.</p>\r\n\r\n<p>Housed in the Emerging Analytics Center, we also engage students in applied cybersecurity research using machine learning and 3-D visualization to target risk reduction. With over $15 million in funding, students work hand-in-hand with government and industry partners to develop solutions to the toughest challenges in cybersecurity.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For more information, contact:</p>\r\n\r\n<p><a href=\"https://ualr.edu/computerscience/about/faculty-and-staff/philip-huff/\">Mr. Philip Huff</a><br />\r\nOffice: EIT 573<br />\r\nEmail:&nbsp;<a href=\"mailto:pdhuff@ualr.edu\">pdhuff@ualr.edu</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(9, 'Data Visualization', '<p>When a computer screen alone is not enough to represent needed, special tools such as Virtual/Augmented Reality headsets or CAVE (CAVE Automatic Virtual Environments) are needed. Data Visualization at its core is the development of applications dedicated to the representation of complex data utilizing mediums ranging from the humble LCD screen to the emerging technologies of tomorrow. Immerse yourself in the data and manipulate it at your fingertips with a career in Data Visualization.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Discipline Description</strong></p>\r\n\r\n<p>Typically when visualizing data on paper, simple 2-dimensional graphs are used. When there is data that needs more than an X and a Y-axis, animations on a computer screen are used. What happens when the data that needs to be displayed has more than 3 axis? What happens when the data that needs to be visualized has more axis than you can count on two hands? What happens when your data has hundreds of axis? Visualization has the tools and techniques to accomplish this, but you are the one to put them to use.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Job Opportunities&nbsp;</strong></p>\r\n\r\n<p>Computer Information Research Scientists:</p>\r\n\r\n<ul>\r\n	<li>Median Salary: $118,370 per year</li>\r\n	<li>Job Growth: 16%</li>\r\n	<li>Increase in Jobs 2018-28: 5,200</li>\r\n</ul>\r\n\r\n<p>Computer Programmer:</p>\r\n\r\n<ul>\r\n	<li>Median Salary: $84,280</li>\r\n	<li>No. of Jobs 2018: 250,300</li>\r\n</ul>\r\n\r\n<p>Computer Systems Analysts:</p>\r\n\r\n<ul>\r\n	<li>Median Salary: $88,740</li>\r\n	<li>Job Growth: 9%</li>\r\n	<li>Increase in Jobs 2018-28: 56,000</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Projects</strong></p>\r\n\r\n<p>The&nbsp;<a href=\"http://eac-ualr.org/\">UA Little Rock&rsquo;s EAC</a>&nbsp;in collaboration with the&nbsp;<a href=\"https://seeds.thepower.group/\">SEEDS Cybersecurity Center</a>&nbsp;is developing a virtual-reality enabled visualizations network attacks in the electric power distribution industry.&nbsp;</p>\r\n\r\n<p>The Emerging Analytics Center at UA Little Rock has also participated in a past project for the visualization of multidimensional marketing data.</p>\r\n\r\n<p>Housed in the Emerging Analytics Center, we also engage students in applied cybersecurity research using machine learning and 3-D visualization to target risk reduction. With over $15 million in funding, students work hand-in-hand with government and industry partners to develop solutions to the toughest challenges in cybersecurity.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For more information, contact:</p>\r\n\r\n<p><a href=\"https://ualr.edu/computerscience/about/faculty-and-staff/jan-springer/\">Dr. Jan Springer</a><br />\r\nOffice: EIT 577<br />\r\nEmail:&nbsp;<a href=\"mailto:jpspringer@ualr.edu\">jpspringer@ualr.edu</a></p>\r\n\r\n<p>&nbsp;</p>\r\n');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`, `resource_link`) VALUES
(7, 'UA Little Rock', 'ualr.edu'),
(6, 'Google', 'google.com');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
('foo', '$2y$10$NHiQEYsTNpl/Zv01hqFF1OYCwMWl1XQGEnpvC3k3qqjfuzL8Jn4ia', 21, 'admin'),
('newAaron', '$2y$10$OZGZMJKT7Xe9dfZR1Y3bsOu4LdMSBo7/6JGFmbeyeLReo0GwzjlvO', 22, 'user'),
('notAaron', '$2y$10$wQIDlfDL7/l.kxv.uN.ZQO/WtTYqOeqiHZnmAGntNRAtBXRzAU.YC', 23, 'user'),
('bobdylan', '$2y$10$rs4pvlVucHocFiyemLFG2Oc7.ZP1aii8TOAcr9maotd7PSTgBICH.', 24, 'user'),
('bobdylan2', '$2y$10$IYa/F.LSUqobA4/ZLbwy5.K/w91Sg1E274PkJ8zgcrkVZ4J4EPLKC', 25, 'user'),
('bobbydylan', '$2y$10$xGBIZuma3bSZHu1iPYK7TuzaHKsiSY8L42cvaBf88GQcZPCGC1UHu', 26, 'user'),
('ishaisa', '$2y$10$3HFJmEAzErSfha2nN6L4VOB5.gMNobgDJad8YpjUmf4LHT9ci7Hpu', 27, 'user'),
('AaronDavid', '$2y$10$UZeHYla5SQWk9f.FeTcAOO3nJ11Wz6Kef6EGMXsjfRq8mqp6kgGYC', 28, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
