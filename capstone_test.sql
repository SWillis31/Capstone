-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2019 at 04:53 PM
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `poster` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`poster`, `date`, `title`, `content`, `post_id`) VALUES
('Sam Willis', '2019-09-18', 'This Is A Test', 'This is an article that has a bunch of text. The quick brown fox jumps over the lazy dog. Sphinx of black quartz, judge my vow.', 1),
('Darien Patton', '2019-09-19', 'Test Article With Some Text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ornare arcu odio ut sem. Et netus et malesuada fames ac turpis egestas. At tempor commodo ullamcorper a lacus vestibulum sed arcu non. Sit amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sed enim ut sem viverra aliquet eget sit amet tellus. Viverra suspendisse potenti nullam ac tortor. Leo vel fringilla est ullamcorper eget nulla facilisi. Pharetra vel turpis nunc eget lorem dolor sed viverra ipsum. Praesent elementum facilisis leo vel fringilla est ullamcorper eget nulla. Sem fringilla ut morbi tincidunt. Ut eu sem integer vitae justo eget magna fermentum iaculis. Turpis cursus in hac habitasse. Iaculis eu non diam phasellus vestibulum lorem sed risus. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus. At erat pellentesque adipiscing commodo elit at imperdiet. Massa ultricies mi quis hendrerit. Sit amet consectetur adipiscing elit ut aliquam purus. Volutpat ac tincidunt vitae semper.\r\n\r\nQuis risus sed vulputate odio ut enim. Id semper risus in hendrerit gravida rutrum quisque non tellus. Magnis dis parturient montes nascetur ridiculus mus mauris. Aenean pharetra magna ac placerat vestibulum. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Blandit aliquam etiam erat velit scelerisque in dictum. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus. Malesuada fames ac turpis egestas maecenas pharetra convallis. Felis eget velit aliquet sagittis. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo integer. Amet porttitor eget dolor morbi non arcu risus quis. At consectetur lorem donec massa sapien faucibus et. Sagittis orci a scelerisque purus semper eget duis at tellus. Magna fringilla urna porttitor rhoncus. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. Pellentesque dignissim enim sit amet.\r\n\r\nVenenatis a condimentum vitae sapien pellentesque habitant. Imperdiet dui accumsan sit amet nulla. Mauris commodo quis imperdiet massa tincidunt. Pellentesque id nibh tortor id aliquet. Urna porttitor rhoncus dolor purus non enim praesent elementum. Volutpat diam ut venenatis tellus in. Feugiat nibh sed pulvinar proin gravida hendrerit. Quam elementum pulvinar etiam non quam lacus. Ultricies integer quis auctor elit sed. Nisl rhoncus mattis rhoncus urna neque viverra justo nec. Egestas maecenas pharetra convallis posuere morbi leo urna. Nunc mattis enim ut tellus elementum sagittis vitae et.\r\n\r\nMauris a diam maecenas sed enim ut sem viverra. Eget nunc scelerisque viverra mauris in aliquam. Pellentesque pulvinar pellentesque habitant morbi tristique. Urna condimentum mattis pellentesque id nibh tortor. Velit sed ullamcorper morbi tincidunt. Diam vel quam elementum pulvinar etiam. Fringilla est ullamcorper eget nulla facilisi etiam. At elementum eu facilisis sed odio morbi quis commodo. Habitant morbi tristique senectus et netus et malesuada. Sed risus pretium quam vulputate dignissim suspendisse in est. Sed odio morbi quis commodo odio aenean. Blandit volutpat maecenas volutpat blandit. Volutpat sed cras ornare arcu dui vivamus. Ullamcorper velit sed ullamcorper morbi tincidunt. Quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor. Vitae elementum curabitur vitae nunc sed velit dignissim sodales. Nisl suscipit adipiscing bibendum est.\r\n\r\nFaucibus purus in massa tempor nec. A erat nam at lectus. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat. Dictumst vestibulum rhoncus est pellentesque elit. Eget aliquet nibh praesent tristique. Mauris commodo quis imperdiet massa. Lorem mollis aliquam ut porttitor. Nullam non nisi est sit amet facilisis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Ullamcorper velit sed ullamcorper morbi tincidunt. Ac tincidunt vitae semper quis lectus nulla at. Mi ipsum faucibus vitae aliquet nec ullamcorper sit.\r\n\r\nId aliquet risus feugiat in ante. Egestas egestas fringilla phasellus faucibus scelerisque eleifend donec pretium. Blandit libero volutpat sed cras ornare arcu dui vivamus. Morbi enim nunc faucibus a pellentesque sit amet. Ornare arcu dui vivamus arcu felis bibendum. Nisi lacus sed viverra tellus. Faucibus a pellentesque sit amet porttitor eget dolor. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Morbi enim nunc faucibus a. Interdum velit euismod in pellentesque massa placerat duis ultricies lacus. Suspendisse in est ante in nibh. Vitae sapien pellentesque habitant morbi tristique senectus et. Libero nunc consequat interdum varius sit amet. Varius quam quisque id diam vel quam elementum pulvinar.\r\n\r\nPurus ut faucibus pulvinar elementum integer enim neque volutpat. Mauris vitae ultricies leo integer. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Ornare aenean euismod elementum nisi quis. Fermentum odio eu feugiat pretium nibh. Sed tempus urna et pharetra pharetra. Diam maecenas sed enim ut sem viverra. Nibh sed pulvinar proin gravida. In aliquam sem fringilla ut. Etiam tempor orci eu lobortis elementum nibh. Vel facilisis volutpat est velit egestas dui.\r\n\r\nA scelerisque purus semper eget duis. Dolor sit amet consectetur adipiscing elit. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Donec adipiscing tristique risus nec. Ut ornare lectus sit amet est placerat in egestas erat. Est ullamcorper eget nulla facilisi etiam dignissim. Et ultrices neque ornare aenean euismod elementum. Consectetur adipiscing elit pellentesque habitant morbi. Commodo odio aenean sed adipiscing diam donec adipiscing tristique risus. Non nisi est sit amet. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Elit ullamcorper dignissim cras tincidunt lobortis feugiat. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.\r\n\r\nFeugiat sed lectus vestibulum mattis ullamcorper. Morbi tristique senectus et netus et. Quisque id diam vel quam elementum pulvinar etiam. Ut morbi tincidunt augue interdum velit euismod in pellentesque massa. Mi in nulla posuere sollicitudin aliquam. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec sagittis. Nunc congue nisi vitae suscipit tellus. Arcu risus quis varius quam quisque id diam vel quam. Libero enim sed faucibus turpis in eu mi. Accumsan sit amet nulla facilisi. Sit amet commodo nulla facilisi nullam vehicula. At elementum eu facilisis sed odio morbi quis commodo. Velit euismod in pellentesque massa. Sed viverra ipsum nunc aliquet. Venenatis lectus magna fringilla urna porttitor.\r\n\r\nNisl pretium fusce id velit ut tortor pretium viverra. In metus vulputate eu scelerisque felis imperdiet proin fermentum. Feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Sem nulla pharetra diam sit amet nisl suscipit. Augue mauris augue neque gravida. A cras semper auctor neque vitae tempus. Pellentesque dignissim enim sit amet venenatis urna cursus eget. Lacus luctus accumsan tortor posuere. Gravida rutrum quisque non tellus orci. Sed egestas egestas fringilla phasellus faucibus. Interdum velit euismod in pellentesque massa placerat duis ultricies lacus.', 2);

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
  `opp_link` varchar(255) NOT NULL,
  PRIMARY KEY (`opp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`opp_id`, `opp_title`, `opp_description`, `opp_link`) VALUES
(1, 'Internship', 'Intern at this company.', 'https://www.google.com'),
(4, 'Test', 'Go here to waste time', 'https://www.reddit.com');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_name`, `resource_link`) VALUES
(1, 'StackOverflow', 'https://www.stackoverflow.com');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `role`) VALUES
('Sam', '$2y$10$ttMjVEy3XvDBHN7KRNFX3O.Z2JDxwWxjsVaNk3xFlflErjALbsI3C', 1, 'admin'),
('test', '$2y$10$dOa/wDUqRMfJCsBF8NVHFeShG5ugk0TQ4uoCaMJ9SGqeM51UkHOFC', 2, 'user'),
('newAdmin', '$2y$10$i9kWbU2lt0aQm8/FNOoknexte45T32aVDSh3w.vnCakKtutw6WTMO', 6, 'admin'),
('roleTest', '$2y$10$J6TZDJMMuYnHCFOcHoNMF.bSJzWJXF2yaroyHIKNh1rfoTvNPH0QK', 5, 'admin'),
('newUser', '$2y$10$G.04KI7AyjZynMO4ZJv5C.CjCjd2h99y.LyF/Qw47yut9NdF3hPzy', 8, 'user'),
('testUser', '$2y$10$XQayvvA9EUwphjsr1YVvfOt1bYflp2xQ7j9G7brtkhq4IEXV0vEiq', 9, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
