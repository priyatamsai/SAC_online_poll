-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2019 at 06:46 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sac`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

DROP TABLE IF EXISTS `contestant`;
CREATE TABLE IF NOT EXISTS `contestant` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `ph_no` int(15) NOT NULL,
  `date` date NOT NULL,
  `post_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`id`, `name`, `year`, `branch`, `cgpa`, `ph_no`, `date`, `post_id`) VALUES
(11, 'b', 4, 'ece', 7, 123, '2017-11-03', 1),
(12, 'c', 4, 'cs', 9, 123, '2017-11-03', 2),
(13, 'd', 4, 'me', 7, 123, '2017-11-03', 2),
(14, 'e', 3, 'cs', 9, 123, '2017-11-03', 3),
(15, 'f', 3, 'ce', 8.5, 123, '2017-11-03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `count` int(10) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `name`, `count`) VALUES
(1, 'gensec', 3),
(2, 'has', 2),
(3, 'tas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`) VALUES
(10),
(13),
(14),
(10),
(13),
(14),
(10),
(12),
(14),
(10),
(12),
(14),
(10),
(13),
(15),
(11),
(13),
(15),
(10),
(13),
(14),
(10),
(13),
(15),
(11),
(12),
(15),
(15),
(10),
(15),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`roll_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll_no`, `name`) VALUES
(21, 'b1512', 'abc'),
(22, 'b1513', 'ab'),
(23, 'b1580', 'n111'),
(24, 'b15056', 'n22'),
(26, 'b46747', 'nhj'),
(27, 'B1509', 'dgsd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 0),
('officer', 'd31d86d0de8dd34fc535c67e480deaa2', 1),
('poll', 'b0f6dfb42fa80caee6825bfecd30f094', 2);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `id` int(10) NOT NULL,
  `rand_no` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id`, `rand_no`, `status`) VALUES
(20, '123', 1),
(21, '589', 1),
(23, '545', 1),
(24, '907', 0),
(26, '613', 1),
(27, '527', 1),
(333, '706', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
