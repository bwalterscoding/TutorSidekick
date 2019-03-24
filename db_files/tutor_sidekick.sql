-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 04:48 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutor_sidekick`
--

-- --------------------------------------------------------

--
-- Table structure for table `classdata`
--

CREATE TABLE `classdata` (
  `payment_earned` float NOT NULL,
  `class_length` float NOT NULL,
  `class_code` varchar(12) NOT NULL,
  `date_of_class` date NOT NULL,
  `class_start_time` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classdata`
--

INSERT INTO `classdata` (`payment_earned`, `class_length`, `class_code`, `date_of_class`, `class_start_time`) VALUES
(10, 0.5, 'HFTG7', '2019-03-18', '06:00'),
(10, 0.5, 'H3G5', '2019-03-18', '06:30'),
(10, 0.5, 'K3G4', '2019-03-18', '07:00'),
(10, 0.5, 'H1G2', '2019-03-18', '07:30'),
(10, 0.5, 'H3G7', '2019-03-18', '08:00'),
(10, 0.5, 'K3G6', '2019-03-18', '08:30'),
(10, 0.5, 'K3G6', '2019-03-18', '09:00'),
(10, 0.5, 'H1G3', '2019-03-18', '09:30'),
(10, 0.5, 'H2G5', '2019-03-19', '06:00'),
(10, 0.5, 'H2G6', '2019-03-19', '06:30'),
(10, 0.5, 'H3G5_2', '2019-03-19', '07:00'),
(10, 0.5, 'H3G6', '2019-03-19', '07:30'),
(10, 0.5, 'K2G1', '2019-03-19', '08:00'),
(10, 0.5, 'H1G3', '2019-03-19', '09:00'),
(10, 0.5, 'K2G6', '2019-03-19', '09:30'),
(10, 0.5, 'K3G2', '2019-03-19', '09:30'),
(10, 0.5, 'H1G5', '2019-03-19', '06:00'),
(10, 0.5, 'H3G5', '2019-03-20', '06:30'),
(10, 0.5, 'K3G4', '2019-03-20', '07:00'),
(10, 0.5, 'H3G6', '2019-03-13', '07:30'),
(10, 0.5, 'H3G7', '2019-03-20', '08:00'),
(10, 0.5, 'K3G6_1', '2019-03-20', '08:30'),
(10, 0.5, 'K3G6_2', '2019-03-20', '09:00'),
(10, 0.5, 'HFTG6', '2019-03-20', '09:30'),
(10, 0.5, 'H2G5', '2019-03-21', '06:00'),
(10, 0.5, 'H3G5', '2019-03-21', '07:00'),
(10, 0.5, 'H1G4', '2019-03-21', '06:30'),
(10, 0.5, 'K2G1', '2019-03-21', '08:00'),
(10, 0.5, 'H2G4', '2019-03-21', '08:30'),
(10, 0.5, 'K2G6', '2019-03-12', '08:30'),
(10, 0.5, 'K2G6', '2019-03-21', '09:00'),
(10, 0.5, 'K3G2', '2019-03-21', '09:30'),
(10, 0.5, 'H3G5', '2019-03-22', '06:30'),
(10, 0.5, 'K3G4', '2019-03-22', '07:00'),
(10, 0.5, 'H3G6', '2019-03-22', '07:30'),
(10, 0.5, 'H3G7', '2019-03-22', '08:00'),
(10, 0.5, 'K3G6_1', '2019-03-22', '08:30'),
(10, 0.5, 'K3G6_2', '2019-03-22', '09:00'),
(10, 0.5, 'H1G6_2', '2019-03-22', '09:30'),
(32.5, 2.5, 'BENTEST', '1989-05-12', '06:00'),
(56, 3.5, 'BENTEST', '1989-05-12', '07:00'),
(69, 3, 'BENTEST', '1989-05-12', '08:00'),
(69, 3, 'BENTEST', '1989-05-12', '09:00'),
(10, 0.5, 'BENTEST', '1989-05-12', '11:00'),
(10, 0.5, 'HFTG8', '2019-03-23', '06:00'),
(10, 0.5, 'H2G6', '2019-03-23', '06:30'),
(10, 0.5, 'H3G5', '2019-03-23', '07:00'),
(10, 0.5, 'H1G7', '2019-03-23', '07:30'),
(10, 0.5, 'HFTG9', '2019-03-23', '08:00'),
(10, 0.5, 'H2G4', '2019-03-23', '08:30'),
(10, 0.5, 'H1G9', '2019-03-23', '09:30'),
(10, 0.5, 'H3G2', '2019-03-23', '09:30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(50) NOT NULL,
  `class_code` varchar(8) NOT NULL,
  `age` int(2) NOT NULL,
  `location` varchar(50) NOT NULL,
  `level` varchar(2) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `class_code`, `age`, `location`, `level`, `birthday`) VALUES
('Bill', 'HFTG7', 0, 'Changchun,', '7', '0000-00-00'),
('Olivia', 'H3G5', 9, 'Beijing, C', '5', '2009-04-10'),
('Grace', 'K3G4', 8, 'China', '4', '0000-00-00'),
('Rose', 'K3G4', 8, 'China', '4', '0000-00-00'),
('Lisa', 'K3G4', 8, 'China', '4', '0000-00-00'),
('Tim', 'H1G2', 6, 'China', '1', '0000-00-00'),
('Grace', 'H3G7', 12, 'Dalian, Ch', '7', '2004-12-28'),
('Bobby', 'K3G6_1', 12, 'Beijing, China', '6', '0000-00-00'),
('Alex', 'K3G6_1', 11, 'Beijing, China', '6', '0000-00-00'),
('Dominique', 'K3G6_1', 12, 'China', '6', '0000-00-00'),
('Peter', 'K3G6_2', 12, 'China', '6', '0000-00-00'),
('Jason', 'K3G6_2', 12, 'China', '6', '0000-00-00'),
('Mimu', 'H1G3', 9, 'China', '6', '2011-03-27'),
('Marina', 'PE01', 40, 'Lima, Peru', '1', '0000-00-00'),
('Enrique', 'PE02', 41, 'Lima, Peru', '5', '0000-00-00'),
('Mayra', 'PE03', 31, 'Lima, Peru', '7', '0000-00-00'),
('Hugo', 'PE004', 31, 'Lima, Peru', '6', '0000-00-00'),
('Maria', 'PE05', 30, 'Lima, Peru', '2', '0000-00-00'),
('Fanny', 'PE06', 41, 'Lima, Peru', '2', '0000-00-00'),
('Angela', 'H2G5', 11, 'China', '5', '2008-03-09'),
('George', 'H2G6', 12, 'China', '6', '0000-00-00'),
('Dou Dou', 'H3G5_2', 11, 'Shanghai, China', '5', '2009-06-17'),
('Rachel', 'H3G6', 12, 'Beijing, China', '6', '2008-07-23'),
('Steven', 'K2G6', 12, 'China', '6', '0000-00-00'),
('Ellen', 'K2G6', 12, 'China', '6', '0000-00-00'),
('Kevin', 'K2G6', 12, 'China', '6', '0000-00-00'),
('Yuki', 'H1G5', 10, 'Jilan, China', '5', '2009-01-05'),
('Joy', 'H1G4', 8, 'China', '4', '0000-00-00'),
('Percy', 'H1G6', 12, 'Tianjin, China', '6', '2006-02-19'),
('Helen', 'H2G4', 11, 'Tianjin, China', '4', '0000-00-00'),
('Jack', 'K2G1', 7, 'China', '1', '0000-00-00'),
('Peter', 'H2G1', 7, 'China', '1', '0000-00-00'),
('Sean', 'H2G1', 7, 'China', '1', '0000-00-00'),
('Angel', 'K3G2', 7, 'Tianjin, China', '2', '0000-00-00'),
('Sarah', 'H3G2', 7, 'China', '2', '0000-00-00'),
('James', 'H3G2', 8, 'China', '2', '0000-00-00'),
('Mike', 'H1G6_2', 12, 'Guangzhou, China', '6', '0000-00-00'),
('Bear', 'HFTG8', 14, 'China', '8', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`) VALUES
('George', 'Washington', 'gdub1776', 'thegeorge@usa.gov', 'freedom'),
('ben', 'walters', 'waltersenglish', 'benwaltersenglish@gmail.com', 'Honda2004'),
('Delia', 'Salazar', 'dsalz', 'deliasalazar@gmail.com', 'nicholas17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
