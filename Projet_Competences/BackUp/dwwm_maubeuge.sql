-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 nov. 2020 à 06:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dwwm_maubeuge`
--

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `name`) VALUES
(1, 'DWWM'),
(2, 'CUISINE'),
(3, 'SOUDURE');

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datex` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `id_skill` int(11) DEFAULT NULL,
  `id_session` int(11) NOT NULL,
  `result` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `results`
--

INSERT INTO `results` (`id`, `datex`, `id_user`, `id_skill`, `id_session`, `result`) VALUES
(1, '2020-11-04 16:35:39', 1, 1, 1, 1),
(2, '2020-11-04 16:35:39', 1, 1, 1, 2),
(3, '2020-11-04 16:35:39', 1, 1, 1, 3),
(4, '2020-11-04 16:35:39', 1, 1, 1, 4),
(5, '2020-11-04 16:35:39', 1, 1, 1, 5),
(6, '2020-11-05 14:03:28', 1, 1, 1, 1),
(7, '2020-11-05 14:03:28', 1, 1, 1, 2),
(8, '2020-11-18 13:49:00', 2, 1, 1, 15),
(9, '2020-11-18 13:49:00', 2, 2, 1, 38),
(10, '2020-11-18 13:49:00', 2, 3, 1, 55),
(11, '2020-11-18 13:49:00', 3, 1, 1, 73),
(12, '2020-11-18 13:49:00', 3, 2, 1, 66),
(13, '2020-11-18 13:49:00', 4, 2, 1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datex` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `name` varchar(255) COLLATE latin1_bin NOT NULL,
  `id_formation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datex` datetime DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `id_formation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `datex`, `name`, `id_formation`) VALUES
(1, '2020-11-18 13:26:07', 'HTML', 1),
(2, '2020-11-18 13:26:07', 'CSS', 1),
(3, '2020-11-18 13:26:07', 'JavaScript', 1),
(4, '2020-11-18 13:26:07', 'PHP', 1),
(5, '2020-11-18 13:26:07', 'AJAX', 1),
(6, '2020-11-18 13:26:07', 'Jquery', 1),
(7, '2020-11-18 13:26:07', 'RESPONS', 1),
(8, '2020-11-18 13:26:07', 'SQL', 1),
(9, '2020-11-18 13:26:07', 'Composer', 1),
(10, '2020-11-18 13:26:07', 'Symfony', 1),
(11, '2020-11-18 13:26:07', 'Doctrine', 1),
(12, '2020-11-18 13:26:07', 'Twig', 1),
(13, '2020-11-18 13:26:07', 'Agile', 1),
(14, '2020-11-18 13:26:07', 'GIT', 1),
(15, '2020-11-18 13:26:07', 'SEO', 1),
(16, '2020-11-18 13:26:07', 'RGPD', 1),
(17, '2020-11-18 13:28:55', 'patisserie', 2),
(18, '2020-11-18 13:28:55', 'sauce', 2),
(19, '2020-11-18 13:28:55', 'légumes', 2),
(20, '2020-11-18 13:28:55', 'les métaux', 3),
(21, '2020-11-18 13:28:55', 'les métaux', 3),
(22, '2020-11-18 13:28:55', 'les alliage', 3),
(23, '2020-11-18 13:28:55', 'soudure électrique', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datex` datetime DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE latin1_bin NOT NULL,
  `surname` varchar(255) COLLATE latin1_bin NOT NULL,
  `mail` varchar(255) COLLATE latin1_bin NOT NULL,
  `password` varchar(256) COLLATE latin1_bin NOT NULL,
  `id_formation` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  `type` varchar(255) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `datex`, `name`, `surname`, `mail`, `password`, `id_formation`, `id_session`, `type`) VALUES
(3, '2020-11-06 11:30:39', 'prÃ©nomtoto', 'toto', 'toto@mail.fr', '123', 0, 0, 'user'),
(5, '2020-11-18 13:39:01', 'trouvetout', '123', 'geo@gmail.com', '123', 1, 1, 'formateur'),
(6, '2020-11-18 13:39:01', 'picsou', 'oncle', 'oncle@gmail.com', '123', 0, 0, 'admin'),
(7, '2020-11-18 13:39:01', 'ligonnes', 'xavier', 'xligo@gmail.com', '123', 1, 1, 'user'),
(8, '2020-11-18 13:40:25', 'trouvetout', 'geo', 'geo@gmail.com', '123', 1, 1, 'formateur'),
(10, '2020-11-18 13:40:25', 'ligonnes', 'xavier', 'xligo@gmail.com', '123', 1, 1, 'user'),
(11, '2020-11-18 13:40:25', 'Castix', 'ferdinand', 'fcast@gmail.com', '123', 3, 3, 'user'),
(12, '2020-11-18 13:40:25', 'Lecuisinier', 'Max', 'cuisine@gmail.com', '123', 2, 2, 'user'),
(13, '2020-11-18 13:40:25', 'Lecomte', 'JP', 'compta@gmail.com', '123', 0, 0, 'admin'),
(14, '2020-11-18 13:40:25', 'bourgey', 'Xav', 'xav@gmail.com', '65829e542dd151f443cc997270c61e78c042a82d687cc13844bf2c1813714600', 1, 1, 'formateur'),
(15, '2020-11-18 13:40:25', 'durand', 'Sam', 'sam@gmail.com', '65829e542dd151f443cc997270c61e78c042a82d687cc13844bf2c1813714600', 2, 1, 'formateur'),
(16, '2020-11-18 13:40:25', 'admin', 'admin', 'admin', 'admin', 0, 0, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
