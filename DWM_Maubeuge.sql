-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `DWM_Maubeuge` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `DWM_Maubeuge`;

DROP TABLE IF EXISTS `Formations`;
CREATE TABLE `Formations` (
  `ID_FORMATION` int NOT NULL AUTO_INCREMENT,
  `FORMATION` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_FORMATION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Formations` (`ID_FORMATION`, `FORMATION`) VALUES
(1,	'Développeur web'),
(2,	'Maçon'),
(3,	'Formateur professionnel');

DROP TABLE IF EXISTS `Matieres`;
CREATE TABLE `Matieres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Active` bit(1) NOT NULL,
  `ID_Formation` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Matieres` (`id`, `Nom`, `Categorie`, `Active`, `ID_Formation`) VALUES
(28,	'HTML',	'Front',	CONV('1', 2, 10) + 0,	0),
(29,	'CSS',	'Front',	CONV('1', 2, 10) + 0,	0),
(30,	'JAVASCRIPT',	'Front',	CONV('1', 2, 10) + 0,	0),
(31,	'PHP',	'Back',	CONV('1', 2, 10) + 0,	0),
(32,	'AJAX',	'Front',	CONV('1', 2, 10) + 0,	0),
(33,	'JQUERY',	'Front',	CONV('1', 2, 10) + 0,	0),
(34,	'RESPONSIVE',	'Front',	CONV('1', 2, 10) + 0,	0),
(35,	'SQL',	'Back',	CONV('1', 2, 10) + 0,	0),
(36,	'COMPOSER',	'Back',	CONV('1', 2, 10) + 0,	0),
(37,	'SYMFONY',	'Back',	CONV('1', 2, 10) + 0,	0),
(38,	'DOCTRINE',	'Back',	CONV('1', 2, 10) + 0,	0),
(39,	'TWIG',	'Front',	CONV('1', 2, 10) + 0,	0),
(40,	'AGILE',	'Autres',	CONV('1', 2, 10) + 0,	0),
(41,	'GIT',	'Autres',	CONV('1', 2, 10) + 0,	0),
(42,	'Python',	'Back',	CONV('1', 2, 10) + 0,	0),
(43,	'SEO',	'Autres',	CONV('1', 2, 10) + 0,	0),
(44,	'RGPD',	'Autres',	CONV('1', 2, 10) + 0,	0);

DROP TABLE IF EXISTS `Membres`;
CREATE TABLE `Membres` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Admin` bit(1) NOT NULL,
  `Fixe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Github` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png',
  `Date_of_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Membres` (`ID`, `Pseudo`, `Prenom`, `Nom`, `Email`, `MDP`, `Admin`, `Fixe`, `Mobile`, `Github`, `Site`, `Avatar`, `Date_of_registration`) VALUES
(50,	'The-Evil-Fox',	'The-Evil-Fox',	'fghfghfghgfh',	'stevenhonor@live.fr',	'@59199Hergnies',	CONV('0', 2, 10) + 0,	'0327424577',	'0777696681',	'The-Evil-Fox',	'http://adriaticstuff.000webhostapp.com/index.php',	'default.png',	'2020-11-06 01:05:35');

DROP TABLE IF EXISTS `Options`;
CREATE TABLE `Options` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `HIDDEN` bit(1) NOT NULL,
  `FORMATION` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Options` (`ID`, `HIDDEN`, `FORMATION`) VALUES
(50,	CONV('0', 2, 10) + 0,	1);

DROP TABLE IF EXISTS `Resultats`;
CREATE TABLE `Resultats` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_USER` int NOT NULL,
  `ID_MATIERE` int NOT NULL,
  `RESULTAT` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2020-11-06 03:33:16
