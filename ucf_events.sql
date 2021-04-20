-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2021 at 12:28 AM
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
-- Database: `ucf_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `e_id` int(6) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `e_date` date NOT NULL,
  `l_id` int(6) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `l_id` (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_name`, `category`, `e_date`, `l_id`, `phone`, `email`) VALUES
(1, 'Luda Concert', 'RSO', '2021-04-22', 1, '1234567890', 'luda@csa.ucf.edu'),
(2, 'Keynote Speaker', 'Public', '2021-05-20', 9, '5467981657', 'tstark@bsu.su.edu'),
(3, 'Watch Party', 'Private', '2021-06-25', 5, '5467985424', 'jlkj@um.edu'),
(4, 'Spirit Splash', 'Public', '2021-11-17', 1, '6547984562', 'noone@knights.ucf.edu'),
(5, 'Spring football game', 'Private', '2021-04-24', 4, '4566544568', 'someone@uf.edu'),
(6, 'Founders Day', 'RSO', '2021-06-29', 10, '7984561354', 'chupa@nyu.edu'),
(7, 'Workout Palooza', 'Public', '2021-04-30', 8, '6548798753', 'gymbud@uc.edu'),
(8, 'Rodeo Show', 'Private', '2021-05-18', 2, '7897456214', 'dugdimmodome@ut.edu'),
(9, 'Greek Life Intro', 'Private', '2021-06-26', 9, '9854562358', 'zeta@su.edu'),
(10, 'Bingo night', 'RSO', '2021-05-22', 6, '6542135755', 'oldchum@ua.edu'),
(11, 'Gala on the Gulf', 'Public', '2021-07-17', 3, '4652876545', 'tbay@usf.edu'),
(12, 'Swamp Things', 'Public', '2021-09-17', 4, '4561233215', 'campers@uf.edu'),
(13, 'Product Reveal', 'Private', '2021-06-23', 1, '6547983633', 'masterminds@knights.ucf.edu'),
(14, 'Governor Rally', 'Public', '2022-06-24', 7, '7987785355', 'office@ua.edu'),
(15, 'Drogomites', 'RSO', '2021-04-30', 4, '4654235486', 'drogomites@uf.edu'),
(16, 'DisneyLand Bears', 'Private', '2021-05-08', 8, '6548791357', 'sga@uc.edu'),
(17, 'Diversity Career Fair', 'RSO', '2021-05-10', 3, '6547982268', 'odi@usf.edu'),
(18, 'Dance Showcase', 'RSO', '2021-04-30', 1, '7987852134', 'bsu@knights.ucf.edu'),
(19, 'Internship Fair', 'Public', '2021-05-18', 4, '7985462315', 'aa@uf.edu'),
(20, 'Walk-In Vaccine', 'Public', '2021-04-30', 1, '4579852356', 'health@knights.ucf.edu');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `l_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`l_id`, `name`, `latitude`, `longitude`) VALUES
(1, 'University of Central Florida', '29', '-81'),
(2, 'University of Texas', '30', '98'),
(3, 'University of South Florida', '28', '82'),
(4, 'University of Florida', '30', '82'),
(5, 'University of Miami', '26', '80'),
(6, 'University of Arizona', '32', '111'),
(7, 'University of Arkansas', '36', '94'),
(8, 'University of California', '38', '122'),
(9, 'Stanford University', '37', '122'),
(10, 'University of New York', '41', '74');

-- --------------------------------------------------------

--
-- Table structure for table `rso`
--

DROP TABLE IF EXISTS `rso`;
CREATE TABLE IF NOT EXISTS `rso` (
  `rso_id` int(6) NOT NULL AUTO_INCREMENT,
  `rso_name` varchar(40) NOT NULL,
  `event_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  PRIMARY KEY (`rso_id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rso`
--

INSERT INTO `rso` (`rso_id`, `rso_name`, `event_id`, `user_id`) VALUES
(2, 'Black Student Union', 1, 7),
(3, 'Carribbean Student Association', 1, 7),
(4, 'NSBE', 6, 8),
(5, 'IEEE', 10, 9),
(6, 'LockPickers', 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
CREATE TABLE IF NOT EXISTS `university` (
  `u_id` int(6) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(40) NOT NULL,
  `l_id` int(3) DEFAULT NULL,
  `u_description` varchar(150) NOT NULL,
  `enrollment` int(8) NOT NULL,
  PRIMARY KEY (`u_id`),
  KEY `l_id` (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`u_id`, `u_name`, `l_id`, `u_description`, `enrollment`) VALUES
(2, 'University of Central Florida', 1, 'UCF Knights!', 66183),
(3, 'University of Texas', 2, 'Longhorn', 50950),
(4, 'University of South Florida', 3, 'Bull', 49591),
(5, 'University of Florida', 4, 'Go Gata', 52367),
(6, 'University of Miami', 5, 'The U', 17003),
(7, 'University of Arizona', 6, 'Wildcats', 44831),
(8, 'University of Arkansas', 7, 'Razorback', 27558),
(9, 'University of California', 8, 'Bears', 41910),
(10, 'University of New York', 10, 'Bobcat', 51123),
(11, 'Stanford University', 9, 'Tree', 16914);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `u_id` int(3) DEFAULT NULL,
  `rso_id` int(6) DEFAULT NULL,
  `event_id` int(3) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `u_id` (`u_id`),
  KEY `event_id` (`event_id`),
  KEY `rso_id` (`rso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_id`, `rso_id`, `event_id`, `username`, `f_name`, `l_name`, `email`, `password`, `role`) VALUES
(1, 2, NULL, NULL, 'dreallenfred', 'Aundre', 'Fredericks', 'aufredericks@knights.ucf.edu', 'fb3c0fe2f4b3c4d2f94c3cab5f7f4eb1', 1),
(2, 2, NULL, NULL, 'rayallen', 'Ray', 'Allen', 'raallen@knights.ucf.edu', '070dd72385b8b2b205db53237da57200', 3),
(3, 2, NULL, NULL, 'samsmith', 'Sam', 'Smith', 'sasmith@knights.ucf.edu', '332532dcfaa1cbf61e2a266bd723612c', 3),
(4, 2, NULL, NULL, 'leroyjenkins', 'Leroy', 'Jenkins', 'lejenkins@knights.ucf.edu', '430a4ead8a22bce7374f13abef17aa5b', 3),
(5, 2, NULL, NULL, 'prestonpike', 'Preston', 'Pike', 'prpike@knights.ucf.edu', '5f7254408c59aae289d6afdcddf397e5', 3),
(6, 2, NULL, NULL, 'zoeballagh', 'Zoe', 'Ballagh', 'zoballagh@knights.ucf.edu', 'c88a65120330cfc69d5dbe1916fc8cd2', 2),
(7, 2, NULL, NULL, 'blackpanther', 'King', 'TChalla', 'blpanther@knights.ucf.edu', '1ffd9e753c8054cc61456ac7fac1ac89', 2),
(8, 10, NULL, NULL, 'ironman', 'Tony', 'Stark', 'tostark@bobcats.nyu.edu', 'bcd31c714bca2c41ffca31bd03003311', 2),
(9, 9, NULL, NULL, 'captainamerica', 'Steve', 'Rogers', 'strogers@bears.uc.edu', 'ab334feeb31c05124cb73fa12571c2f6', 2),
(10, 11, NULL, NULL, 'blackwidow', 'Natasha', 'Romanoff', 'naromanoff@tree.su.edu', 'c9ad31e5740747285dae5c168715d2de', 2),
(11, 4, NULL, NULL, 'hulk', 'Bruce', 'Banner', 'brbanner@bulls.usf.edu', '76254239879f7ed7d73979f1f7543a7e', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `location` (`l_id`);

--
-- Constraints for table `rso`
--
ALTER TABLE `rso`
  ADD CONSTRAINT `rso_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `rso_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`e_id`);

--
-- Constraints for table `university`
--
ALTER TABLE `university`
  ADD CONSTRAINT `university_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `location` (`l_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`e_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `university` (`u_id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`rso_id`) REFERENCES `rso` (`rso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
