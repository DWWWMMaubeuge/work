-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 17 nov. 2020 à 20:56
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id15316558_dwm_maubeuge`
--

-- --------------------------------------------------------

--
-- Structure de la table `Formations`
--

CREATE TABLE `Formations` (
  `ID_FORMATION` int(11) NOT NULL,
  `FORMATION` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Formations`
--

INSERT INTO `Formations` (`ID_FORMATION`, `FORMATION`) VALUES
(1, 'Développeurs web'),
(2, 'Maçons'),
(3, 'Formateurs professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `FormationsUtilisateur`
--

CREATE TABLE `FormationsUtilisateur` (
  `LIGNE` int(11) NOT NULL,
  `USER` int(255) NOT NULL,
  `IDENTIFIANT_FORMATION` int(255) NOT NULL,
  `REJOINS_LE` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `FormationsUtilisateur`
--

INSERT INTO `FormationsUtilisateur` (`LIGNE`, `USER`, `IDENTIFIANT_FORMATION`, `REJOINS_LE`) VALUES
(6, 26, 2, '2020-11-17 20:28:51'),
(7, 25, 1, '2020-11-17 20:45:10'),
(8, 21, 2, '2020-11-17 20:46:35');

-- --------------------------------------------------------

--
-- Structure de la table `Inscriptions`
--

CREATE TABLE `Inscriptions` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ID_FORMATION` int(255) NOT NULL,
  `SECURE_KEY` int(255) NOT NULL,
  `INVITATION_DATE` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Invitations`
--

CREATE TABLE `Invitations` (
  `ID` int(255) NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FormationID` int(255) NOT NULL,
  `DATE_OF_INVITATION` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Invitations`
--

INSERT INTO `Invitations` (`ID`, `Email`, `FormationID`, `DATE_OF_INVITATION`) VALUES
(18, 'xavier.bourget@gmail.com', 2, '2020-11-17 20:23:19'),
(19, 'dcxjslngceqjqakxsg@wqcefp.online', 1, '2020-11-17 20:50:28');

-- --------------------------------------------------------

--
-- Structure de la table `Matieres`
--

CREATE TABLE `Matieres` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Active` bit(1) NOT NULL,
  `ID_Formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Matieres`
--

INSERT INTO `Matieres` (`id`, `Nom`, `Active`, `ID_Formation`) VALUES
(19, 'HTML', b'1', 1),
(20, 'CSS', b'1', 1),
(21, 'JAVASCRIPT', b'1', 1),
(22, 'PHP', b'1', 1),
(23, 'AJAX', b'1', 1),
(24, 'JQUERY', b'1', 1),
(25, 'RESPONSIVE', b'1', 1),
(26, 'SQL', b'1', 1),
(27, 'COMPOSER', b'1', 1),
(28, 'SYMFONY', b'1', 1),
(29, 'DOCTRINE', b'1', 1),
(30, 'TWIG', b'1', 1),
(31, 'AGILE', b'1', 1),
(32, 'GIT', b'1', 1),
(33, 'Python', b'1', 1),
(34, 'SEO', b'1', 1),
(35, 'RGPD', b'1', 1),
(36, 'COFFRAGE', b'1', 2),
(37, 'MOULAGE', b'1', 2),
(38, 'LECTURE DE PLANS', b'1', 2),
(42, 'PEDAGOGIE', b'1', 3),
(43, 'SAVOIR-FAIRE', b'1', 3),
(44, 'SAVOIR-ÊTRE', b'1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Membres`
--

CREATE TABLE `Membres` (
  `ID` int(11) NOT NULL,
  `Pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MDP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SuperAdmin` bit(1) NOT NULL,
  `Admin` bit(1) NOT NULL,
  `Fixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Site` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `Date_of_registration` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Membres`
--

INSERT INTO `Membres` (`ID`, `Pseudo`, `Prenom`, `Nom`, `Email`, `MDP`, `SuperAdmin`, `Admin`, `Fixe`, `Mobile`, `Github`, `Site`, `Avatar`, `Date_of_registration`) VALUES
(21, 'The-Evil-Fox', 'Steven', 'Durieux', 'stevenhonor@live.fr', '@59199Hergnies', b'1', b'0', NULL, NULL, 'The-Evil-Fox', 'http://adriaticstuff.000webhostapp.com/profil.php', '21.gif', '2020-11-08 04:28:38'),
(25, 'xavierB', NULL, NULL, 'xavier.bourget@gmail.com', 'xavierB', b'1', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-13 14:58:26'),
(26, 'CompteTest', NULL, NULL, 'dcxjslngceqjqakxsg@wqcefp.online', '@59199Hergnies', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-17 20:28:51');

-- --------------------------------------------------------

--
-- Structure de la table `Options`
--

CREATE TABLE `Options` (
  `ID` int(11) NOT NULL,
  `HIDDEN` bit(1) NOT NULL,
  `FORMATION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Options`
--

INSERT INTO `Options` (`ID`, `HIDDEN`, `FORMATION`) VALUES
(21, b'1', 2),
(25, b'0', 1),
(26, b'0', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Resultats`
--

CREATE TABLE `Resultats` (
  `ID` int(11) NOT NULL,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_USER` int(11) NOT NULL,
  `ID_MATIERE` int(11) NOT NULL,
  `FORMATION` int(11) NOT NULL,
  `RESULTAT` int(11) NOT NULL,
  `MOIS` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Resultats`
--

INSERT INTO `Resultats` (`ID`, `TIME_OF_INSERTION`, `ID_USER`, `ID_MATIERE`, `FORMATION`, `RESULTAT`, `MOIS`) VALUES
(249, '2020-11-17 14:51:42', 21, 19, 1, 6, 'NOV'),
(250, '2020-11-17 14:58:01', 21, 22, 1, 8, 'NOV'),
(251, '2020-11-17 14:58:02', 21, 20, 1, 6, 'NOV'),
(252, '2020-11-17 14:58:03', 21, 23, 1, 10, 'NOV'),
(253, '2020-11-17 14:58:04', 21, 24, 1, 9, 'NOV'),
(254, '2020-11-17 14:58:05', 21, 21, 1, 8, 'NOV'),
(255, '2020-11-17 14:58:06', 21, 27, 1, 7, 'NOV'),
(256, '2020-11-17 14:58:07', 21, 26, 1, 5, 'NOV'),
(257, '2020-11-17 14:58:07', 21, 25, 1, 8, 'NOV'),
(258, '2020-11-17 14:58:08', 21, 28, 1, 9, 'NOV'),
(259, '2020-11-17 14:58:08', 21, 29, 1, 9, 'NOV'),
(260, '2020-11-17 14:58:09', 21, 30, 1, 8, 'NOV'),
(261, '2020-11-17 14:58:10', 21, 33, 1, 8, 'NOV'),
(262, '2020-11-17 14:58:11', 21, 32, 1, 7, 'NOV'),
(263, '2020-11-17 14:58:11', 21, 31, 1, 8, 'NOV'),
(264, '2020-11-17 14:58:12', 21, 34, 1, 8, 'NOV'),
(265, '2020-11-17 14:58:13', 21, 35, 1, 8, 'NOV'),
(266, '2020-11-17 15:01:07', 21, 36, 2, 7, 'NOV'),
(267, '2020-11-17 15:02:19', 21, 37, 2, 6, 'NOV'),
(268, '2020-11-17 15:02:20', 21, 38, 2, 7, 'NOV'),
(269, '2020-11-17 15:12:58', 31, 38, 2, 8, 'NOV'),
(270, '2020-11-17 19:31:20', 24, 42, 3, 9, 'NOV'),
(271, '2020-11-17 19:33:14', 24, 20, 1, 9, 'NOV'),
(272, '2020-11-17 19:33:14', 24, 23, 1, 10, 'NOV'),
(273, '2020-11-17 19:33:15', 24, 21, 1, 10, 'NOV'),
(274, '2020-11-17 19:33:16', 24, 24, 1, 8, 'NOV'),
(275, '2020-11-17 19:33:17', 24, 27, 1, 8, 'NOV'),
(276, '2020-11-17 19:33:18', 24, 19, 1, 9, 'NOV'),
(277, '2020-11-17 19:33:19', 24, 22, 1, 9, 'NOV'),
(278, '2020-11-17 19:33:20', 24, 25, 1, 9, 'NOV'),
(279, '2020-11-17 19:33:20', 24, 28, 1, 10, 'NOV'),
(280, '2020-11-17 19:33:21', 24, 29, 1, 10, 'NOV'),
(281, '2020-11-17 19:33:22', 24, 26, 1, 10, 'NOV'),
(282, '2020-11-17 19:33:23', 24, 30, 1, 10, 'NOV'),
(283, '2020-11-17 19:33:24', 24, 33, 1, 10, 'NOV'),
(284, '2020-11-17 19:33:24', 24, 32, 1, 8, 'NOV'),
(285, '2020-11-17 19:33:25', 24, 35, 1, 10, 'NOV'),
(286, '2020-11-17 19:33:25', 24, 31, 1, 8, 'NOV'),
(287, '2020-11-17 19:33:26', 24, 34, 1, 9, 'NOV');

-- --------------------------------------------------------

--
-- Structure de la table `Sessions`
--

CREATE TABLE `Sessions` (
  `ID_SESSION` int(11) NOT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `ID_FORMATION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Sessions`
--

INSERT INTO `Sessions` (`ID_SESSION`, `DATE_DEBUT`, `DATE_FIN`, `ID_FORMATION`) VALUES
(1, '2020-08-17', '2020-03-30', 1),
(2, '2020-08-17', '2021-03-30', 2),
(3, '2020-08-17', '2021-03-30', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Formations`
--
ALTER TABLE `Formations`
  ADD PRIMARY KEY (`ID_FORMATION`);

--
-- Index pour la table `FormationsUtilisateur`
--
ALTER TABLE `FormationsUtilisateur`
  ADD PRIMARY KEY (`LIGNE`);

--
-- Index pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Invitations`
--
ALTER TABLE `Invitations`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Matieres`
--
ALTER TABLE `Matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Membres`
--
ALTER TABLE `Membres`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Options`
--
ALTER TABLE `Options`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Resultats`
--
ALTER TABLE `Resultats`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`ID_SESSION`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Formations`
--
ALTER TABLE `Formations`
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `FormationsUtilisateur`
--
ALTER TABLE `FormationsUtilisateur`
  MODIFY `LIGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `Invitations`
--
ALTER TABLE `Invitations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Options`
--
ALTER TABLE `Options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Resultats`
--
ALTER TABLE `Resultats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT pour la table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
