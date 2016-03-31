-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2016 at 01:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `archi`
--

-- --------------------------------------------------------

--
-- Table structure for table `materiaux`
--

CREATE TABLE IF NOT EXISTS `materiaux` (
  `ID` int(250) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `soustype` varchar(100) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `vente` int(1) NOT NULL,
  `prix` int(10) NOT NULL,
  `lattitude` decimal(65,30) NOT NULL,
  `longitude` decimal(65,30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `materiaux`
--

INSERT INTO `materiaux` (`ID`, `type`, `soustype`, `entreprise`, `vente`, `prix`, `lattitude`, `longitude`, `telephone`, `mail`, `postal`, `ville`, `adresse`) VALUES
(1, 'deblais', '', 'entreprise', 0, 50, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 50, 'sdf@sdf.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(2, 'deblais', '', 'entreprise', 0, 100, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 100, 'sdf@sdf.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(3, 'deblais', '', 'entreprise', 0, 30, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 30, 'qsd@qsd.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(4, 'Sable', 'Mou', 'entreprise', 1, 50, '0.000000000000000000000000000000', '0.000000000000000000000000000000', 6521243, 'qsdfdfs@frfe.fr', '', '', ''),
(5, 'Sable', 'Dur', 'tinkie winki', 0, 20, '0.000000000000000000000000000000', '0.000000000000000000000000000000', 2402502, 'sdfsd@qsdqs.fr', '', '', ''),
(6, 'deblais', '', 'entreprise', 0, 200, '48.712602600000000000000000000000', '2.243757100000000000000000000000', 661192905, 'mail@mail.com', '91120', 'Palaiseau', 'rue de paris');

-- --------------------------------------------------------

--
-- Table structure for table `users_bem`
--

CREATE TABLE IF NOT EXISTS `users_bem` (
  `ID` int(250) NOT NULL AUTO_INCREMENT,
  `role` int(2) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `longitude` decimal(65,30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lattitude` decimal(65,30) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `postal` int(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `lien` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_bem`
--

INSERT INTO `users_bem` (`ID`, `role`, `pseudo`, `nom`, `mail`, `longitude`, `password`, `lattitude`, `adresse`, `postal`, `ville`, `lien`) VALUES
(1, 1, 'badabouh', 'hinfray', '', '0.000000000000000000000000000000', 'B89-c4gT', '0.000000000000000000000000000000', '', 0, '', ''),
(2, 2, 'jean-charles', '', '', '0.000000000000000000000000000000', 'jean-charles', '0.000000000000000000000000000000', '', 0, '', ''),
(3, 3, 'entreprise', '', '', '1.432201000000000000000000000000', 'entreprise', '48.856234000000000000000000000000', '8 le clos aux boeufs', 28260, 'Anet', ''),
(4, 4, 'client', 'client', '', '2.234749000000000000000000000000', 'client', '48.896556000000000000000000000000', '17 rue des étudiants', 92400, 'Courbevoie', ''),
(5, 4, 'alex', '', '', '1.432169000000000000000000000000', 'zdsf', '48.855990400000000000000000000000', '8 le clos aux boeufs', 28260, 'anet', ''),
(6, 4, 'Timothee', '', 'test@test.com', '2.245748000000000000000000000000', 'test', '48.714509000000000000000000000000', 'test', 91120, 'Palaiseau', ''),
(7, 4, 'badass', '', 'hoxaquwyf@gmail.com', '1.432169000000000000000000000000', 'Pa$$w0rd!', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(8, 4, 'sqd', '', 'wecegip@gmail.com', '1.432169000000000000000000000000', 'Pa$$w0rd!', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(9, 0, 'SQDF', '', 'DVX@SD.FR', '1.432169000000000000000000000000', 'dsf', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(10, 0, 'dsfg', '', 'DVX@SD.FR', '1.432169000000000000000000000000', 'sqdf', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(14, 0, 'dzqfg', '', 'zderrhg@sdff.fr', '1.432169000000000000000000000000', 'password', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(15, 0, 'aqrdfgjh', '', 'rowakiza@gmail.com', '1.432169000000000000000000000000', 'Pa$$w0rd!', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', ''),
(16, 0, 'qsd', '', 'qsd@qsd.fr', '1.432169000000000000000000000000', 'qsd', '48.855990400000000000000000000000', '8 Le Clos Aux Boeufs', 28260, 'Anet', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
