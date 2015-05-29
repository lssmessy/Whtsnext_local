
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2015 at 06:14 AM
-- Server version: 5.1.66
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u643484656_acc`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Email_Code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Active` int(11) NOT NULL DEFAULT '0',
  `Profile` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `recovery_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `change_pwd` int(11) NOT NULL DEFAULT '0',
  `Profession` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Skills` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Request_Ids` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Sent_Ids` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `Common` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `Prefs` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prefs_set` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=73 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
