-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2017 at 09:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 

--
-- Database: `doreli_board`
CREATE DATABASE `doreli_board`;
USE `doreli_board`;
--

-- --------------------------------------------------------
--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `logo` blob NOT NULL,
  ##`admin_id` int(11) NOT NULL,
  PRIMARY KEY (`institution_id`),
  ##FOREIGN KEY (`admin_id`) REFERENCES `users`(`user_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table for institutions ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_picture` blob NOT NULL,
  PRIMARY KEY (`user_id`),
  FOREIGN KEY (`institution_id`) REFERENCES `institution`(`institution_id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='a table for regular members of an institution' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------



--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_type` enum('picture','audio','video','other') NOT NULL,
  `category` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `ad_file` blob NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `institution_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`),
  FOREIGN KEY (`institution_id`) REFERENCES `institution`(`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- ----------------------------------------------------------




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
