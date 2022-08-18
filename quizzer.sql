-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2021 at 09:17 AM
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
-- Database: `quizzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `person_and_quiz`
--

DROP TABLE IF EXISTS `person_and_quiz`;
CREATE TABLE IF NOT EXISTS `person_and_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_and_quiz`
--

INSERT INTO `person_and_quiz` (`id`, `person_id`, `quiz_name`, `password`) VALUES
(1, 1, 'tube light', 'tubelight@123'),
(4, 1, 'wear', 'wear@123'),
(5, 1, 'tube light3', 'tube light3'),
(6, 1, 'sdfgh', 'neext@123'),
(7, 1, '4', 'wear@123'),
(8, 1, 'sun', 'sun@123');

-- --------------------------------------------------------

--
-- Table structure for table `person_and_response`
--

DROP TABLE IF EXISTS `person_and_response`;
CREATE TABLE IF NOT EXISTS `person_and_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `status` enum('submitted','not_submitted') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_and_response`
--

INSERT INTO `person_and_response` (`id`, `person_id`, `quiz_id`, `status`) VALUES
(1, 1, 4, 'submitted'),
(2, 1, 7, 'not_submitted'),
(3, 1, 6, 'not_submitted'),
(4, 1, 8, 'submitted'),
(5, 2, 8, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_and_ques`
--

DROP TABLE IF EXISTS `quiz_and_ques`;
CREATE TABLE IF NOT EXISTS `quiz_and_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option1` varchar(30) NOT NULL,
  `option2` varchar(30) NOT NULL,
  `option3` varchar(30) NOT NULL,
  `option4` varchar(30) NOT NULL,
  `corr_ans` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_and_ques`
--

INSERT INTO `quiz_and_ques` (`id`, `quiz_id`, `question`, `option1`, `option2`, `option3`, `option4`, `corr_ans`) VALUES
(1, 4, '2+2=??', '1', '2', '3', '4', 'Option4'),
(3, 4, '2+2=??', '1', '1', '1', '1', 'Option1'),
(4, 6, '9+9=??', '1', '1', '1', '1', 'Option2'),
(5, 8, 'sun rises in?', 'east', 'west', 'north', 'south', 'Option1'),
(6, 8, 'capital of india', 'prayag', 'lucknow', 'beneras', 'delhi', 'Option4'),
(7, 8, 'cap of up', 'pr', 'lucknow', 'raipur', 'aligarh', 'Option1');

-- --------------------------------------------------------

--
-- Table structure for table `response_table`
--

DROP TABLE IF EXISTS `response_table`;
CREATE TABLE IF NOT EXISTS `response_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `choosen_option` enum('Option1','Option2','Option3','Option4') NOT NULL,
  `corr_option` enum('Option1','Option2','Option3','Option4') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `person_id` (`person_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response_table`
--

INSERT INTO `response_table` (`id`, `quiz_id`, `question_id`, `person_id`, `choosen_option`, `corr_option`) VALUES
(1, 4, 1, 1, 'Option4', 'Option4'),
(2, 4, 3, 1, 'Option3', 'Option1'),
(3, 8, 5, 1, 'Option1', 'Option1'),
(4, 8, 6, 1, 'Option2', 'Option4'),
(5, 8, 7, 1, 'Option2', 'Option1'),
(6, 8, 5, 2, 'Option1', 'Option1'),
(7, 8, 6, 2, 'Option2', 'Option4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'anurag', 'anurag@gmail.com', 6266880477, '2b374d1b1b95d01859140ae5a85f90dc'),
(2, 'shreya', 'shreya@gmail.com', 6266880123, '131f3c43b33e8ee2ea8dcf1eb5454aa9');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `person_and_quiz`
--
ALTER TABLE `person_and_quiz`
  ADD CONSTRAINT `person_and_quiz_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `person_and_response`
--
ALTER TABLE `person_and_response`
  ADD CONSTRAINT `person_and_response_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `person_and_response_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `person_and_quiz` (`id`);

--
-- Constraints for table `quiz_and_ques`
--
ALTER TABLE `quiz_and_ques`
  ADD CONSTRAINT `quiz_and_ques_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `person_and_quiz` (`id`);

--
-- Constraints for table `response_table`
--
ALTER TABLE `response_table`
  ADD CONSTRAINT `response_table_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `person_and_quiz` (`id`),
  ADD CONSTRAINT `response_table_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `response_table_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `quiz_and_ques` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
