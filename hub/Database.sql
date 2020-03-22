
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 25. 04 2018 kl. 18:06:24
-- Serverversion: 10.1.31-MariaDB
-- PHP-version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u675533851_main`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `title` varchar(5000) DEFAULT NULL,
  `rankbar` varchar(5000) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `profilepicture` varchar(5000) DEFAULT NULL,
  `Achievements` varchar(5000) DEFAULT NULL,
  `lastonline` varchar(5000) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `joindate` varchar(100) NOT NULL,
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=546 ;

--
-- Data dump for tabellen `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `rank`, `title`, `rankbar`, `level`, `profilepicture`, `Achievements`, `lastonline`, `ip`, `lastip`, `joindate`) VALUES
(543, 'Admin', 'Saltogpeber123@hotmail.com', '$2y$10$4dShYhAwDGecw452me0CcO0/wU2EBmZOBUfOA7b9kmjae8pzlJZ0S', 'Administrator', '', 'images/ranks/admin.png', 0, 'images/defaultpic.png', NULL, 'January 14, 2018, 1:11 pm', '85.27.193.47', '85.27.193.47', ''),
(544, 'default', '123', '$2y$10$bKLjmw34wDn4rsc70Pb7leSy0pDDn4EcTIM3V3kMPT74Hyp2k/XoW', 'Regular', '', 'images/ranks/regular.png', 0, 'images/defaultpic.png', NULL, NULL, '85.27.193.47', NULL, 'August 25, 2017'),
(545, 'PrivateDonut', 'me@privatedonut.com', '$2y$10$78L8yEMVBLvNWhjPABOb0uLbGttIZQEdsFkcsKtsXf1vIc6iNk1/2', 'Administrator', '', 'images/ranks/admin.png', 0, 'images/defaultpic.png', NULL, 'November 25, 2017, 12:16 pm', '75.66.224.142', '75.66.224.142', 'November 25, 2017');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `chatbox`
--

CREATE TABLE IF NOT EXISTS `chatbox` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Data dump for tabellen `chatbox`
--

INSERT INTO `chatbox` (`id`, `name`, `message`, `date`) VALUES
(10, 'PrivateDonut', 'Test', '11.25.17'),
(9, 'Admin', 'Test date.', '07.31.17'),
(11, 'Admin', 'Ey!', '01.14.18');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `postedby` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `replies` int(255) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `forum`
--

INSERT INTO `forum` (`id`, `title`, `message`, `postedby`, `date`, `views`, `replies`, `type`) VALUES
(0, 'Welcome to the forum!', 'The forum is now working.. Or something.', 'Admin', '08.08.17', 14, 0, 'News');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(5000) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `text` varchar(500) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Data dump for tabellen `news`
--

INSERT INTO `news` (`id`, `name`, `title`, `text`, `date`) VALUES
(38, 'Admin', 'Testing news again', 'assdfsdf', NULL),
(39, 'Admin', '123', '123', NULL),
(37, 'Admin', 'The site is live.', 'The site is live under a free hosting service. Feel free to register and debug. Thank you!', NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `quests`
--

CREATE TABLE IF NOT EXISTS `quests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `tooltip` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `reward` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `quests`
--

INSERT INTO `quests` (`id`, `title`, `tooltip`, `image`, `reward`) VALUES
(1, 'Register an account.', 'Register an account to complete this quest.', 'images/quest1.png', 1),
(3, 'Search for a profile', 'Search for a profile to complete this quest.', 'images/quest2.png', 1),
(4, 'Log in to your account', 'Log in to your account to complete this quest.', 'images/quest3.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
