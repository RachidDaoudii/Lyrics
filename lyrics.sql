-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2023 at 04:15 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyrics`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Maitre Gims'),
(4, 'Dadju'),
(31, 'la fouine');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(35, 'Rock'),
(34, 'Hip Hop'),
(33, 'Jaz'),
(27, 'pop');

-- --------------------------------------------------------

--
-- Table structure for table `musique`
--

DROP TABLE IF EXISTS `musique`;
CREATE TABLE IF NOT EXISTS `musique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `song` text,
  `Add_the` date DEFAULT NULL,
  `name_Artist` int(11) DEFAULT NULL,
  `cetegory` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_Artist` (`name_Artist`),
  KEY `cetegory` (`cetegory`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `musique`
--

INSERT INTO `musique` (`id`, `title`, `song`, `Add_the`, `name_Artist`, `cetegory`) VALUES
(1, 'Keep all the updated requirements in one place', 'Keep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one place\n                        ', '2026-02-03', 1, 33),
(2, 'Keep all the updated requirements in one place', 'Keep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one placeKeep all the updated requirements in one place\n                            ', '2008-03-04', 4, 34),
(3, 'Consider creating an acceptance criteria list', 'Consider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria listConsider creating an acceptance criteria list', '2008-03-04', 31, 35);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Daoudi', 'Rachid', 'daoudi@gmail.com', 'daoudi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
