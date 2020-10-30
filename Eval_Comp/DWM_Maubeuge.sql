-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `DWM_Maubeuge` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `DWM_Maubeuge`;

DROP TABLE IF EXISTS `Matieres`;
CREATE TABLE `Matieres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Matieres` (`id`, `Nom`) VALUES
(1,	'HTML'),
(2,	'CSS'),
(3,	'JAVASCRIPT'),
(4,	'PHP'),
(5,	'AJAX'),
(6,	'JQUERY'),
(7,	'RESPONSIVE'),
(8,	'SQL'),
(9,	'COMPOSER'),
(10,	'SYMFONY'),
(11,	'DOCTRINE'),
(12,	'TWIG'),
(13,	'AGILE'),
(14,	'GIT'),
(15,	'PYTHON'),
(16,	'SEO'),
(17,	'RGPD');

DROP TABLE IF EXISTS `Membres`;
CREATE TABLE `Membres` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Date_of_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Membres` (`ID`, `Nom`, `Prenom`, `Email`, `MDP`, `Date_of_inscription`) VALUES
(7,	'Durieux',	'Steven',	'stevenhonor@live.fr',	'@59199Hergnies',	'2020-10-30 11:43:30'),
(8,	'test@test.com',	'test@test.com',	'test@test.com',	'test@test.com',	'2020-10-30 11:44:18');

DROP TABLE IF EXISTS `Resultats`;
CREATE TABLE `Resultats` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_USER` int NOT NULL,
  `ID_MATIERE` int NOT NULL,
  `RESULTAT` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2020-10-30 14:45:17
