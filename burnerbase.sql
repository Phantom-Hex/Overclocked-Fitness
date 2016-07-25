-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2016 at 03:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `burnerbase`.`clients`(
  `user_id` INT(255) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(25) NOT NULL,
  `lastname` VARCHAR(25) NOT NULL,
  `age` INT(2) NOT NULL,
  `email` VARCHAR(36) NOT NULL,
  `gender` TEXT NOT NULL,
  `height` VARCHAR(5) NOT NULL,
  `weight` INT(3) NOT NULL,
  `chest` INT(2) NOT NULL,
  `waist` INT(2) NOT NULL,
  `hip` INT(2) NOT NULL,
  `forearm` INT(2) NOT NULL,
  `thigh` INT(2) NOT NULL,
  `calves` INT(2) NOT NULL,
  `inquiry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`user_id`),
  UNIQUE(`firstname`),
  UNIQUE(`lastname`),
  UNIQUE(`email`)
) ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

--
-- Table structure for table 'newsletter'
CREATE TABLE IF NOT EXISTS `burnerbase`.`newsletter`(
  `user_id` INT(255) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `email` VARCHAR(36) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(`user_id`),
  UNIQUE(`name`),
  UNIQUE(`email`)
) ENGINE = MyISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
