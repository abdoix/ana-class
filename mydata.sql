-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2022 at 07:51 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL,
  `city` varchar(100) DEFAULT 'none',
  `gender` enum('F','M') DEFAULT NULL,
  `age` varchar(100) DEFAULT 'none',
  `hobbies` varchar(100) DEFAULT 'none',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `city`, `gender`, `age`, `hobbies`) VALUES
(1, 'tanger', 'M', '15', 'kk'),
(2, 'marak', 'M', 'mois', 'music');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handler` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT 'none',
  `PASS` varchar(100) NOT NULL,
  `photo` varchar(100) DEFAULT 'none',
  PRIMARY KEY (`handler`,`PASS`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `handler` (`handler`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `handler`, `email`, `PASS`, `photo`) VALUES
(1, 'fifi', '$email', '123', 'helicopter-inside-view.jpg'),
(2, 'abd_abdo', 'abdellah@gmail.com', '123', '2191092.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
