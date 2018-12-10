-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 déc. 2018 à 10:54
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_proprietaire` int(11) NOT NULL,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `superficie` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_appartements`
--

INSERT INTO `table_appartements` (`ID`, `id_proprietaire`, `nom`, `adresse`, `superficie`) VALUES
(1, 137, 'Maison', '135 Avenue du général de Gaulle', 18),
(2, 137, 'Maison2', 'Adresse', 7);

-- --------------------------------------------------------

--
-- Structure de la table `table_capteurs`
--

DROP TABLE IF EXISTS `table_capteurs`;
CREATE TABLE IF NOT EXISTS `table_capteurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_piece` int(11) NOT NULL,
  `type` text NOT NULL,
  `donnee` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_capteurs`
--

INSERT INTO `table_capteurs` (`ID`, `id_piece`, `type`, `donnee`) VALUES
(2, 1, 'temp', 20),
(1, 1, 'lum', 1),
(3, 2, 'lum', 0),
(4, 2, 'temp', 19);

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
-- Structure de la table `table_droit`
--

DROP TABLE IF EXISTS `table_droit`;
CREATE TABLE IF NOT EXISTS `table_droit` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `droit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_droit`
--

INSERT INTO `table_droit` (`ID`, `id_role`, `id_capteur`, `droit`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 1, 1),
(6, 2, 2, 1),
(7, 2, 3, 1),
(8, 2, 4, 0),
(9, 1, 0, 1),
(10, 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_lotissement`
--

DROP TABLE IF EXISTS `table_lotissement`;
CREATE TABLE IF NOT EXISTS `table_lotissement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_gestionnnaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_message_forum`
--

DROP TABLE IF EXISTS `table_message_forum`;
CREATE TABLE IF NOT EXISTS `table_message_forum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_sujet` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_pieces`
--

DROP TABLE IF EXISTS `table_pieces`;
CREATE TABLE IF NOT EXISTS `table_pieces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_appartement` int(11) NOT NULL,
  `nom` text NOT NULL,
  `taille` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_pieces`
--

INSERT INTO `table_pieces` (`ID`, `id_appartement`, `nom`, `taille`) VALUES
(1, 1, 'Salon', 5),
(2, 1, 'Chambre', 5);

-- --------------------------------------------------------

--
-- Structure de la table `table_roles`
--

DROP TABLE IF EXISTS `table_roles`;
CREATE TABLE IF NOT EXISTS `table_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_roles`
--

INSERT INTO `table_roles` (`ID`, `nom`) VALUES
(1, 'Parent'),
(2, 'Enfant');

-- --------------------------------------------------------

--
-- Structure de la table `table_sujet_forum`
--

DROP TABLE IF EXISTS `table_sujet_forum`;
CREATE TABLE IF NOT EXISTS `table_sujet_forum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` text NOT NULL,
  `date_creation` date NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`ID`)
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
  `image_profil` text,
  `password` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `table_utilisateur`
--

INSERT INTO `table_utilisateur` (`ID`, `nom`, `prenom`, `email`, `image_profil`, `password`) VALUES
(137, 'nom_parent', 'prenom_parent', 'email', NULL, '07123e1f482356c415f684407a3b8723e10b2cbbc0b8fcd6282c49d37c9c1abc'),
(1, 'nom_admin', 'prenom_admin', 'admin', NULL, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(138, 'nom_enfant1', 'prenom_enfant2', 'email_enfant1', NULL, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
(139, 'nom_enfant2', 'prenom_enfant2', 'email_enfant2', NULL, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');

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

--
-- Déchargement des données de la table `tr_role_utilisateur_maison`
--

INSERT INTO `tr_role_utilisateur_maison` (`id_role`, `id_utilisateur`, `id_maison`) VALUES
(1, 137, 1),
(2, 138, 1),
(2, 139, 1),
(3, 137, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
