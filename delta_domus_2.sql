-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Juin 2019 à 17:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `delta_domus`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_appartements`
--

CREATE TABLE IF NOT EXISTS `table_appartements` (
  `ID` int(11) NOT NULL,
  `id_proprietaire` int(11) NOT NULL,
  `nom` text NOT NULL,
  `adresse` text NOT NULL,
  `superficie` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_appartements`
--

INSERT INTO `table_appartements` (`ID`, `id_proprietaire`, `nom`, `adresse`, `superficie`) VALUES
(1, 137, 'Maison', '135 Avenue du général de Gaulle', 18),
(2, 137, 'Maison2', 'Adresse', 7),
(5, 156, 'maison', 'adresse', 1),
(6, 157, '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_capteurs`
--

CREATE TABLE IF NOT EXISTS `table_capteurs` (
  `ID` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `donnee` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_piece` (`id_piece`),
  KEY `id_type` (`id_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_capteurs`
--

INSERT INTO `table_capteurs` (`ID`, `id_piece`, `id_type`, `donnee`) VALUES
(2, 1, 1, 20),
(1, 1, 2, 1),
(3, 2, 2, 0),
(4, 2, 1, 19),
(38, 2, 2, 0),
(39, 2, 2, 1),
(40, 2, 2, 0),
(41, 3, 2, 1),
(5, 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `table_capteur_dispo`
--

CREATE TABLE IF NOT EXISTS `table_capteur_dispo` (
  `ID` int(11) NOT NULL,
  `nom` text NOT NULL,
  `description` text NOT NULL,
  `image` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_capteur_dispo`
--

INSERT INTO `table_capteur_dispo` (`ID`, `nom`, `description`, `image`) VALUES
(1, 'Température', 'Controlez votre chauffage depuis notre site. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida sem eu urna commodo, quis cursus magna luctus. Nulla pharetra mi ut urna varius laoreet. Quisque volutpat quam at nulla sagittis, pellentesque porttitor lectus rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor fermentum tempus. Aliquam id tincidunt nisl. Quisque ac nisl id velit iaculis dapibus. Suspendisse malesuada vel odio vitae ultricies. Praesent quam enim, imperdiet et volutpat ac, sagittis ut nulla. Ut id dolor nec purus vulputate ultrices lobortis vel augue. Proin iaculis leo et odio pharetra tristique. Ut at nisl erat. Nam porttitor sit amet ex vitae tempor. Vivamus ornare suscipit felis, ut varius libero cursus pharetra. Ut facilisis imperdiet neque a dignissim.', 'public/assets/imageCapteur/logo-heat.png'),
(2, 'Lumière', 'Lumière d''un clic de souris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida sem eu urna commodo, quis cursus magna luctus. Nulla pharetra mi ut urna varius laoreet. Quisque volutpat quam at nulla sagittis, pellentesque porttitor lectus rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor fermentum tempus. Aliquam id tincidunt nisl. Quisque ac nisl id velit iaculis dapibus. Suspendisse malesuada vel odio vitae ultricies. Praesent quam enim, imperdiet et volutpat ac, sagittis ut nulla. Ut id dolor nec purus vulputate ultrices lobortis vel augue. Proin iaculis leo et odio pharetra tristique. Ut at nisl erat. Nam porttitor sit amet ex vitae tempor. Vivamus ornare suscipit felis, ut varius libero cursus pharetra. Ut facilisis imperdiet neque a dignissim.', 'public/assets/imageCapteur/logo-light.png'),
(3, 'moteur', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `table_consommation`
--

CREATE TABLE IF NOT EXISTS `table_consommation` (
  `ID` int(11) NOT NULL,
  `id_appartement` int(11) NOT NULL,
  `conso_electricite` float NOT NULL,
  `conso_gaz` float NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_consommation`
--

INSERT INTO `table_consommation` (`ID`, `id_appartement`, `conso_electricite`, `conso_gaz`, `date`) VALUES
(1, 1, 110, 114, '2019-01-15'),
(2, 1, 116, 113.5, '2019-02-15'),
(3, 1, 105, 109.5, '2019-03-15'),
(4, 1, 92, 95.5, '2019-04-15'),
(5, 1, 79, 76, '2019-05-15'),
(6, 2, 108, 106, '2019-01-15'),
(7, 2, 117, 107, '2019-02-15'),
(8, 2, 99, 108.5, '2019-03-15'),
(9, 2, 96, 99.5, '2019-04-15'),
(10, 2, 87, 73, '2019-05-15');

-- --------------------------------------------------------

--
-- Structure de la table `table_donnees_capteurs`
--

CREATE TABLE IF NOT EXISTS `table_donnees_capteurs` (
  `id` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_capteur` (`id_capteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_droit`
--

CREATE TABLE IF NOT EXISTS `table_droit` (
  `ID` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `droit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_droit`
--

INSERT INTO `table_droit` (`ID`, `id_role`, `id_capteur`, `droit`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 1, 0),
(6, 2, 2, 0),
(7, 2, 3, 1),
(8, 2, 4, 0),
(9, 1, 0, 1),
(10, 2, 0, 0),
(21, 1, 4, 1),
(22, 2, 4, 1),
(0, 1, 41, 1);

-- --------------------------------------------------------

--
-- Structure de la table `table_faq`
--

CREATE TABLE IF NOT EXISTS `table_faq` (
  `ID` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_histo_capteur`
--

CREATE TABLE IF NOT EXISTS `table_histo_capteur` (
  `ID` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `donnee` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_lotissement`
--

CREATE TABLE IF NOT EXISTS `table_lotissement` (
  `ID` int(11) NOT NULL,
  `id_gestionnnaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_message_forum`
--

CREATE TABLE IF NOT EXISTS `table_message_forum` (
  `ID` int(11) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_pieces`
--

CREATE TABLE IF NOT EXISTS `table_pieces` (
  `ID` int(11) NOT NULL,
  `id_appartement` int(11) NOT NULL,
  `nom` text NOT NULL,
  `taille` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_pieces`
--

INSERT INTO `table_pieces` (`ID`, `id_appartement`, `nom`, `taille`) VALUES
(1, 1, 'Salon', 5),
(2, 1, 'Chambre', 5),
(3, 5, 'piece1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `table_roles`
--

CREATE TABLE IF NOT EXISTS `table_roles` (
  `ID` int(11) NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_roles`
--

INSERT INTO `table_roles` (`ID`, `nom`) VALUES
(1, 'Parent'),
(2, 'Enfant');

-- --------------------------------------------------------

--
-- Structure de la table `table_sujet_forum`
--

CREATE TABLE IF NOT EXISTS `table_sujet_forum` (
  `ID` int(11) NOT NULL,
  `auteur` text NOT NULL,
  `date_creation` date NOT NULL,
  `nom` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_trames`
--

CREATE TABLE IF NOT EXISTS `table_trames` (
  `ID` int(11) NOT NULL,
  `type_trame` tinyint(1) NOT NULL,
  `groupe` varchar(4) NOT NULL,
  `type_requete` tinyint(1) NOT NULL,
  `type_capteur` tinytext,
  `numero_capteur` tinyint(2) NOT NULL,
  `valeur` tinytext NOT NULL,
  `numero_trame` tinytext NOT NULL,
  `timestamp` datetime NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `table_type_capteurs`
--

CREATE TABLE IF NOT EXISTS `table_type_capteurs` (
  `id` int(11) NOT NULL,
  `valeur` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_type_capteurs`
--

INSERT INTO `table_type_capteurs` (`id`, `valeur`) VALUES
(1, 'temperature'),
(2, 'lumiere'),
(3, 'moteur');

-- --------------------------------------------------------

--
-- Structure de la table `table_utilisateur`
--

CREATE TABLE IF NOT EXISTS `table_utilisateur` (
  `ID` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `image_profil` text,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `table_utilisateur`
--

INSERT INTO `table_utilisateur` (`ID`, `nom`, `prenom`, `email`, `image_profil`, `password`, `admin`) VALUES
(0, 'Invite', 'Invite', 'Invite', NULL, '776B5BE62A979BDEC6D9238F6E7E355E985B1CA506181EECBB703A3A97875B5E', 0),
(137, 'nom_parent', 'prenom_parent', 'email', NULL, '07123e1f482356c415f684407a3b8723e10b2cbbc0b8fcd6282c49d37c9c1abc', 0),
(1, 'nom_admin', 'prenom_admin', 'admin', NULL, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1),
(138, 'nom_enfant', 'prenom_enfant2', 'email_enfant1', NULL, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(139, 'nom_enfant', 'prenom_enfant2', 'email_enfant2', NULL, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 0),
(156, 'nomHolder', 'prenomHolder', 'mailHolder', NULL, 'f4f263e439cf40925e6a412387a9472a6773c2580212a4fb50d224d3a817de17', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tr_lotissement_appartement`
--

CREATE TABLE IF NOT EXISTS `tr_lotissement_appartement` (
  `id_lotissement` int(11) NOT NULL,
  `id_appartement` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tr_role_utilisateur_maison`
--

CREATE TABLE IF NOT EXISTS `tr_role_utilisateur_maison` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL,
  KEY `id_role` (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tr_role_utilisateur_maison`
--

INSERT INTO `tr_role_utilisateur_maison` (`id_role`, `id_utilisateur`, `id_maison`) VALUES
(1, 137, 1),
(2, 138, 1),
(2, 139, 1),
(3, 137, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
