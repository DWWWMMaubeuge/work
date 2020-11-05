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
  `Categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Active` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Matieres` (`id`, `Nom`, `Categorie`, `Active`) VALUES
(28,	'HTML',	'Front',	CONV('1', 2, 10) + 0),
(29,	'CSS',	'Front',	CONV('1', 2, 10) + 0),
(30,	'JAVASCRIPT',	'Front',	CONV('1', 2, 10) + 0),
(31,	'PHP',	'Back',	CONV('1', 2, 10) + 0),
(32,	'AJAX',	'Front',	CONV('1', 2, 10) + 0),
(33,	'JQUERY',	'Front',	CONV('1', 2, 10) + 0),
(34,	'RESPONSIVE',	'Front',	CONV('1', 2, 10) + 0),
(35,	'SQL',	'Back',	CONV('1', 2, 10) + 0),
(36,	'COMPOSER',	'Back',	CONV('1', 2, 10) + 0),
(37,	'SYMFONY',	'Back',	CONV('1', 2, 10) + 0),
(38,	'DOCTRINE',	'Back',	CONV('1', 2, 10) + 0),
(39,	'TWIG',	'Front',	CONV('1', 2, 10) + 0),
(40,	'AGILE',	'Autres',	CONV('1', 2, 10) + 0),
(41,	'GIT',	'Autres',	CONV('1', 2, 10) + 0),
(42,	'Python',	'Back',	CONV('1', 2, 10) + 0),
(43,	'SEO',	'Autres',	CONV('1', 2, 10) + 0),
(44,	'RGPD',	'Autres',	CONV('1', 2, 10) + 0);

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
(1,	'The-Evil-Fox',	'Steven',	'Durieux',	'stevenhonor@live.fr',	'@59199Hergnies',	CONV('1', 2, 10) + 0,	'0327424577',	'0777696681',	'The-Evil-Fox',	'http://adriaticstuff.000webhostapp.com/index.php',	'default.png',	'2020-10-30 11:43:30'),
(2,	'JustinTest',	'',	NULL,	'test2@test.com',	'sdfsdfsdfsdf',	CONV('0', 2, 10) + 0,	NULL,	NULL,	NULL,	'',	'default.png',	'2020-11-03 20:31:37');

DROP TABLE IF EXISTS `Resultats`;
CREATE TABLE `Resultats` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_USER` int NOT NULL,
  `ID_MATIERE` int NOT NULL,
  `RESULTAT` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Resultats` (`ID`, `TIME_OF_INSERTION`, `ID_USER`, `ID_MATIERE`, `RESULTAT`) VALUES
(533,	'2020-11-03 20:45:40',	1,	28,	9),
(534,	'2020-11-03 20:45:42',	1,	29,	8),
(535,	'2020-11-03 20:45:43',	1,	30,	9),
(536,	'2020-11-03 20:45:53',	1,	31,	9),
(537,	'2020-11-03 20:45:54',	1,	32,	6),
(538,	'2020-11-03 20:45:58',	1,	33,	5),
(539,	'2020-11-03 20:46:01',	1,	34,	8),
(540,	'2020-11-03 20:46:03',	1,	35,	8),
(541,	'2020-11-03 20:46:04',	1,	36,	5),
(542,	'2020-11-03 20:46:05',	1,	37,	6),
(543,	'2020-11-03 20:46:07',	1,	38,	5),
(544,	'2020-11-03 20:46:08',	1,	39,	9),
(545,	'2020-11-03 20:46:11',	1,	40,	3),
(546,	'2020-11-03 20:46:15',	1,	41,	9),
(547,	'2020-11-03 20:46:17',	1,	42,	0),
(548,	'2020-11-03 20:46:21',	1,	43,	5),
(549,	'2020-11-03 20:46:22',	1,	44,	1),
(560,	'2020-11-04 00:56:40',	2,	28,	3),
(561,	'2020-11-04 00:56:41',	2,	29,	3);

DROP TABLE IF EXISTS `Visibilitée`;
CREATE TABLE `Visibilitée` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `HIDDEN` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Visibilitée` (`ID`, `HIDDEN`) VALUES
(1,	CONV('1', 2, 10) + 0),
(2,	CONV('0', 2, 10) + 0);

-- 2020-11-04 18:33:48
