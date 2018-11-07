-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 07 nov. 2018 à 08:09
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `delta_domus`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_appartements`
--

DROP TABLE IF EXISTS `table_appartements`;
CREATE TABLE IF NOT EXISTS `table_appartements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proprietaire` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `superficie` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_proprietaire` (`id_proprietaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_capteurs`
--

DROP TABLE IF EXISTS `table_capteurs`;
CREATE TABLE IF NOT EXISTS `table_capteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_piece` int(11) NOT NULL,
  `type` text NOT NULL,
  `donnee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_consommation`
--

DROP TABLE IF EXISTS `table_consommation`;
CREATE TABLE IF NOT EXISTS `table_consommation` (
  `id_appartement` int(11) NOT NULL,
  `conso_electricité` float NOT NULL,
  `conso_gaz` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_lotissement`
--

DROP TABLE IF EXISTS `table_lotissement`;
CREATE TABLE IF NOT EXISTS `table_lotissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gestionnnaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_message_forum`
--

DROP TABLE IF EXISTS `table_message_forum`;
CREATE TABLE IF NOT EXISTS `table_message_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sujet` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_pieces`
--

DROP TABLE IF EXISTS `table_pieces`;
CREATE TABLE IF NOT EXISTS `table_pieces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_appartement` int(11) NOT NULL,
  `nom` text NOT NULL,
  `taille` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_roles`
--

DROP TABLE IF EXISTS `table_roles`;
CREATE TABLE IF NOT EXISTS `table_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_sujet_forum`
--

DROP TABLE IF EXISTS `table_sujet_forum`;
CREATE TABLE IF NOT EXISTS `table_sujet_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` text NOT NULL,
  `date_creation` date NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_utilisateur`
--

DROP TABLE IF EXISTS `table_utilisateur`;
CREATE TABLE IF NOT EXISTS `table_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `image_profil` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tr_lotissement_appartement`
--

DROP TABLE IF EXISTS `tr_lotissement_appartement`;
CREATE TABLE IF NOT EXISTS `tr_lotissement_appartement` (
  `id_lotissement` int(11) NOT NULL,
  `id_appartement` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tr_role_utilisateur_maison`
--

DROP TABLE IF EXISTS `tr_role_utilisateur_maison`;
CREATE TABLE IF NOT EXISTS `tr_role_utilisateur_maison` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tr_utilisateur_appartements`
--

DROP TABLE IF EXISTS `tr_utilisateur_appartements`;
CREATE TABLE IF NOT EXISTS `tr_utilisateur_appartements` (
  `id_utilisateur` int(11) NOT NULL,
  `id_appartement` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
