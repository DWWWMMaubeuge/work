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
(7,	'The-Evil-Fox',	'Steven',	'Durieux',	'stevenhonor@live.fr',	'mdpalacon',	CONV('1', 2, 10) + 0,	'',	'',	'The-Evil-Fox',	'http://adriaticstuff.000webhostapp.com/index.php',	'default.png',	'2020-10-30 11:43:30'),
(69,	'Testeur-Fou',	'Letesteur',	'Psychopathe',	'test@test.com',	'mdpalacon',	CONV('0', 2, 10) + 0,	'',	'',	'TesteurFou',	'',	'default.png',	'2020-11-02 16:28:58'),
(70,	'Quelqueunquivousveut',	NULL,	NULL,	'test@test.com',	'mdpalacon',	CONV('0', 2, 10) + 0,	NULL,	NULL,	NULL,	NULL,	'default.png',	'2020-11-02 21:06:13');

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
(500,	'2020-11-02 19:58:41',	7,	1,	10),
(501,	'2020-11-02 20:13:43',	7,	2,	8),
(502,	'2020-11-02 20:17:26',	7,	5,	5),
(503,	'2020-11-02 20:17:52',	7,	6,	5),
(504,	'2020-11-02 20:17:54',	7,	4,	9),
(505,	'2020-11-02 20:17:56',	7,	3,	9),
(506,	'2020-11-02 20:18:03',	7,	7,	9),
(507,	'2020-11-02 20:18:07',	7,	8,	9),
(508,	'2020-11-02 20:18:32',	7,	9,	5),
(509,	'2020-11-02 20:18:33',	7,	10,	6),
(510,	'2020-11-02 20:18:34',	7,	11,	5),
(511,	'2020-11-02 20:18:36',	7,	12,	9),
(512,	'2020-11-02 20:18:38',	7,	13,	2),
(513,	'2020-11-02 20:18:40',	7,	14,	9),
(514,	'2020-11-02 20:18:43',	7,	15,	0),
(515,	'2020-11-02 20:18:47',	7,	16,	5),
(516,	'2020-11-02 20:18:55',	7,	17,	5),
(517,	'2020-11-02 21:30:15',	7,	28,	9),
(518,	'2020-11-02 21:30:24',	7,	29,	8),
(519,	'2020-11-02 21:30:26',	7,	30,	8),
(520,	'2020-11-02 21:30:27',	7,	31,	9),
(521,	'2020-11-02 21:30:29',	7,	32,	5),
(522,	'2020-11-02 21:30:30',	7,	33,	5),
(523,	'2020-11-02 21:30:32',	7,	34,	8),
(524,	'2020-11-02 21:30:34',	7,	35,	9),
(525,	'2020-11-02 21:30:36',	7,	36,	5),
(526,	'2020-11-02 21:30:37',	7,	37,	6),
(527,	'2020-11-02 21:30:38',	7,	38,	5),
(528,	'2020-11-02 21:30:41',	7,	39,	9),
(529,	'2020-11-02 21:30:43',	7,	40,	2),
(530,	'2020-11-02 21:30:49',	7,	41,	9),
(531,	'2020-11-02 21:30:51',	7,	42,	0),
(532,	'2020-11-02 21:30:56',	7,	43,	5);

-- 2020-11-03 10:34:30
