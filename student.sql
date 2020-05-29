-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2020 at 03:53 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

DROP TABLE IF EXISTS `reg`;
CREATE TABLE IF NOT EXISTS `reg` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `pass` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`uid`, `name`, `pass`) VALUES
(47, 'Sachin', 222),
(44, 'Dsp', 1234),
(33, 'Rana', 1673),
(46, 'Redmi', 789),
(45, 'ekam', 4444),
(48, 'Brajodh', 333);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `rollno` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`uid`, `name`, `rollno`) VALUES
(43, 'Rana Brar', 3016),
(2, 'Balkar', 3010),
(34, 'DSP', 3007),
(35, 'Jagtar Singh', 78126),
(39, 'DSP', 3006),
(42, 'jaspal', 3026),
(40, 'rana', 3003),
(41, 'rana', 90),
(44, 'sukhneet', 44),
(45, 'Brajodh', 90),
(46, 'ekam', 56);

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

DROP TABLE IF EXISTS `student1`;
CREATE TABLE IF NOT EXISTS `student1` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `rollno` int(11) NOT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student1`
--

INSERT INTO `student1` (`uid`, `name`, `rollno`, `address`) VALUES
(41, 'jaspal', 5454, 'ghggh'),
(40, 'Brajodh Singh', 5454, 'jklkj'),
(39, 'Brajodh', 16, 'cg'),
(38, 'Rana Brar', 16, 'cp'),
(37, 'rana', 73, 'cg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
