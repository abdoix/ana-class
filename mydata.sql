-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2022 at 04:49 PM
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
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `dsc` text,
  `img` varchar(100) DEFAULT NULL,
  `idcat` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stars` enum('1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idcat` (`idcat`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `dsc`, `img`, `idcat`, `price`, `stars`) VALUES
(1, '2022 Complete Python', 'Learn Python like a Professional Start from the basics.', 'python/python.jpg', 1, 10.8, '3'),
(2, 'Machine Learning A-Z', 'Learn to create Machine Learning Algorithms', 'python/AI.jpg', 1, 15, '1'),
(3, 'The Python Mega Course 2022.', 'advanced Python programs! Learn Django, Flask & more!', 'python/database.jpg', 1, 30.5, '4'),
(4, 'Python and Django Full Stack.', 'Learn to build websites with Django!', 'python/django.jpg', 1, 15.2, '5'),
(5, 'Python for Financial', 'Learn numpy , pandas , matplotlib , quantopian , finance , and more', 'python/finance.jpg', 1, 9.12, '4'),
(6, 'The Web Developer Bootcamp', 'COMPLETELY REDONE - The only course you need to learn web development', 'web/bootcamp.jpg', 2, 20.2, '5'),
(10, 'Web Developer from Zero to Mastery', 'Learn HTML, CSS, Javascript, React, Node.js, Machine Learning & more!', 'web/z.jpg', 2, 20.2, '4'),
(7, 'The Complete 2022 Web Development', 'Become a Full-Stack Web Developer with just ONE course', 'web/complete.jpg', 2, 15, '5'),
(8, 'The Complete Web Developer Course 2.0', 'Learn Web Development by building 25 websites and mobile apps', 'web/course.jpg', 2, 90.02, '5'),
(11, 'The Advanced Web Developer Bootcamp', 'Learn React 16, Redux, D3, ES2015, Testing', 'web/advanced.jpg', 2, 5.55, '5');

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

DROP TABLE IF EXISTS `cate`;
CREATE TABLE IF NOT EXISTS `cate` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `dsc` text,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`idcat`, `name`, `dsc`, `title`) VALUES
(1, 'python', 'Take one of Python courses and learn how to code using this incredibly useful language. Its simple syntax and readability makes Python perfect for Flask, Django, data science, and machine learning. You’ll learn how to build everything from games to sites to apps. Choose from a range of courses that will appeal to...', 'Expand your career opportunities with Python'),
(2, 'Web Development', 'The world of web development is as wide as the internet itself. Much of our social and vocational lives play out on the internet, which prompts new industries aimed at creating, managing, and debugging the websites and applications that we increasingly rely on.', 'Build websites and applications with Web Development'),
(0, 'ALL', 'Choose from 183,000 online video courses with new additions published every month', 'A broad selection of courses');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `iduser` int(11) NOT NULL,
  `panierobj` json NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`iduser`, `panierobj`) VALUES
(1, '[]'),
(2, '[]');

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
(1, 'ee', 'M', '2', 'kk'),
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
(1, 'abdo', 'abdollahhomrani@gmail.com', '1231', '896829.jpg'),
(2, 'abd_abdo', 'abdellah@gmail.com', '123', '2191092.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
