-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 03:22 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `odoj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE IF NOT EXISTS `tb_task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `start_juz` int(2) NOT NULL,
  `reader` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=219 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_term`
--

CREATE TABLE IF NOT EXISTS `tb_term` (
  `id_term` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `group_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_term`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
