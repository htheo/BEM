-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 22 Mars 2016 à 17:51
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `archi`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiaux`
--

CREATE TABLE `materiaux` (
  `ID` int(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `soustype` varchar(100) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `lattitude` decimal(65,30) NOT NULL,
  `longitude` decimal(65,30) NOT NULL,
  `telephone` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `adresse` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `materiaux`
--

INSERT INTO `materiaux` (`ID`, `type`, `soustype`, `entreprise`, `prix`, `lattitude`, `longitude`, `telephone`, `mail`, `postal`, `ville`, `adresse`) VALUES
(1, 'deblais', '', 'entreprise', 50, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 50, 'sdf@sdf.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(2, 'deblais', '', 'entreprise', 100, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 100, 'sdf@sdf.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(3, 'deblais', '', 'entreprise', 30, '48.855990400000000000000000000000', '1.432169000000000000000000000000', 30, 'qsd@qsd.fr', '28260', 'Anet', '8 Le Clos Aux Boeufs'),
(4, 'Sables', 'Mou', 'entreprise lala', 50, '0.000000000000000000000000000000', '0.000000000000000000000000000000', 6521243, 'qsdfdfs@frfe.fr', '', '', ''),
(5, 'Sables', 'Dur', 'tinkie winki', 20, '0.000000000000000000000000000000', '0.000000000000000000000000000000', 2402502, 'sdfsd@qsdqs.fr', '', '', ''),
(6, 'deblais', '', 'entreprise', 200, '48.712602600000000000000000000000', '2.243757100000000000000000000000', 661192905, 'mail@mail.com', '91120', 'Palaiseau', 'rue de paris');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(250) NOT NULL,
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
  `lien` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `role`, `pseudo`, `nom`, `mail`, `longitude`, `password`, `lattitude`, `adresse`, `postal`, `ville`, `lien`) VALUES
(1, 1, 'badabouh', 'hinfray', '', '0.000000000000000000000000000000', 'B89-c4gT', '0.000000000000000000000000000000', '', 0, '', ''),
(2, 2, 'jean-charles', '', '', '0.000000000000000000000000000000', 'jean-charles', '0.000000000000000000000000000000', '', 0, '', ''),
(3, 3, 'entreprise', '', '', '1.432201000000000000000000000000', 'entreprise', '48.856234000000000000000000000000', '8 le clos aux boeufs', 28260, 'Anet', ''),
(4, 4, 'client', 'client', '', '2.234749000000000000000000000000', 'client', '48.896556000000000000000000000000', '17 rue des étudiants', 92400, 'Courbevoie', ''),
(5, 4, 'alex', '', '', '1.432169000000000000000000000000', 'zdsf', '48.855990400000000000000000000000', '8 le clos aux boeufs', 28260, 'anet', ''),
(6, 4, 'Timothee', '', 'test@test.com', '2.245748000000000000000000000000', 'test', '48.714509000000000000000000000000', 'test', 91120, 'Palaiseau', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `materiaux`
--
ALTER TABLE `materiaux`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `materiaux`
--
ALTER TABLE `materiaux`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
