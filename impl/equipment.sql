-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 06:42 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_inventory2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `EQUIP_ID` int(11) NOT NULL,
  `EQUIP_NAME` varchar(30) NOT NULL,
  `EQUIP_DESCRIPTION` varchar(60) NOT NULL,
  `EQUIP_STATUS` enum('AVAILABLE','ONLOAN','LOST','RESERVED','RETIRED') NOT NULL,
  `EQUIP_CATEGORY` enum('NEW','OLD') NOT NULL,
  `EQUIP_PRICE` int(11) NOT NULL,
  `EQUIP_MANUFACTURER` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`EQUIP_ID`, `EQUIP_NAME`, `EQUIP_DESCRIPTION`, `EQUIP_STATUS`, `EQUIP_CATEGORY`, `EQUIP_PRICE`, `EQUIP_MANUFACTURER`) VALUES
(1213, '3D printer', 'Prints objects in 3D', 'AVAILABLE', 'NEW', 450, 'Unova Ltd'),
(7342, 'Lego Nxt Robot', 'A programmable robot', 'ONLOAN', 'OLD', 500, 'Lego Ltd'),
(1213, 'Barometer', 'Measures atmospheric pressure', 'LOST', 'OLD', 200, 'SciFi Ltd'),
(4509, 'Turtle Boat', 'Educational robots used in training', 'RESERVED', 'NEW', 600, 'RoboCo Ltd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
