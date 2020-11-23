-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 23 nov. 2020 à 02:22
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

CREATE DATABASE 'id15316558_dwm_maubeuge',
USE 'id15316558_dwm_maubeuge';

CREATE TABLE `Formations` (
  `ID_FORMATION` int(11) NOT NULL,
  `FORMATION` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Formations`
--

INSERT INTO `Formations` (`ID_FORMATION`, `FORMATION`) VALUES
(4, 'Développeurs web'),
(5, 'Formateurs professionnels'),
(6, 'Maçon'),
(7, 'Cuisine'),
(8, 'Chauffeur poids lourds'),
(9, 'Vendeur'),
(10, 'Cariste');

-- --------------------------------------------------------

--
-- Structure de la table `FormationsUtilisateur`
--

CREATE TABLE `FormationsUtilisateur` (
  `LIGNE` int(11) NOT NULL,
  `USER` int(255) NOT NULL,
  `IDENTIFIANT_FORMATION` int(255) NOT NULL,
  `IDENTIFIANT_SESSION` int(255) NOT NULL,
  `REJOINS_LE` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `FormationsUtilisateur`
--

INSERT INTO `FormationsUtilisateur` (`LIGNE`, `USER`, `IDENTIFIANT_FORMATION`, `IDENTIFIANT_SESSION`, `REJOINS_LE`) VALUES
(27, 21, 4, 21, '2020-11-20 03:02:20'),
(28, 37, 4, 21, '2020-11-20 03:06:09'),
(30, 21, 4, 22, '2020-11-20 03:14:55'),
(31, 21, 7, 25, '2020-11-21 16:11:29'),
(32, 38, 8, 26, '2020-11-21 17:55:04'),
(33, 21, 8, 26, '2020-11-21 17:56:20'),
(34, 39, 4, 21, '2020-11-21 20:41:27'),
(35, 40, 8, 26, '2020-11-23 01:31:59'),
(36, 41, 9, 27, '2020-11-23 01:38:28'),
(37, 42, 5, 24, '2020-11-23 02:05:07'),
(38, 43, 8, 26, '2020-11-23 02:06:52'),
(39, 44, 5, 24, '2020-11-23 02:09:29');

-- --------------------------------------------------------

--
-- Structure de la table `Inscriptions`
--

CREATE TABLE `Inscriptions` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ID_FORMATION` int(255) NOT NULL,
  `SECURE_KEY` int(255) NOT NULL,
  `ROLE` bit(1) NOT NULL,
  `SESSION_NUMBER` int(255) NOT NULL,
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
  `Session_ID` int(255) NOT NULL,
  `Role` bit(1) NOT NULL,
  `DATE_OF_INVITATION` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Invitations`
--

INSERT INTO `Invitations` (`ID`, `Email`, `FormationID`, `Session_ID`, `Role`, `DATE_OF_INVITATION`) VALUES
(38, 'stevenhonor@live.fr', 6, 28, b'0', '2020-11-23 02:10:52');

-- --------------------------------------------------------

--
-- Structure de la table `Matieres`
--

CREATE TABLE `Matieres` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Active` bit(1) NOT NULL,
  `ID_Formation` int(11) NOT NULL,
  `ID_Session` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Matieres`
--

INSERT INTO `Matieres` (`id`, `Nom`, `Active`, `ID_Formation`, `ID_Session`) VALUES
(50, 'PHP', b'1', 4, 22),
(51, 'SQL', b'1', 4, 21),
(52, 'Conduite', b'0', 8, 26);

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
(21, 'The-Evil-Fox', 'Steven', 'Durieux', 'stevenhonor@live.fr', '@59199Hergnies', b'1', b'1', NULL, NULL, 'The-Evil-Fox', 'http://adriaticstuff.000webhostapp.com/index.php', '21.gif', '2020-11-08 04:28:38'),
(37, 'xavierB', NULL, NULL, 'xavier.bourget@gmail.com', '99392cc4385deda732abcc2a3ae13203018547f8c55382c2c3685bc96b563f2b', b'0', b'1', NULL, NULL, '', NULL, 'default.png', '2020-11-20 03:06:09'),
(38, 'Routierdusamedi', NULL, NULL, 'zjzmrvxvcdqdggstno@avxrja.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-21 17:55:04'),
(39, 'ahanchir@live.fr', NULL, NULL, 'ahanchir@live.fr', 'ba4a04de0859b67efc547059a33afb3e12e0dc6329720de821c3f8f446d3b490', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-21 20:41:27'),
(40, 'testeurpro', NULL, NULL, 'zkmijdkqjzbksqebry@mhzayt.com', '18a0e6b9288a3ec118bbb0d2f056537755885a25ed84258090e1e5857bf79320', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 01:31:59'),
(41, 'testeurpronumero2', NULL, NULL, 'dsfsdfsdfsdfsdf@dsfsdfsdfsdfsdf.cz', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 01:38:28'),
(42, 'testemail', NULL, NULL, 'pocejaw990@bcpfm.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:05:07'),
(43, 'testEmail2', NULL, NULL, 'kerkuregne@nedoz.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:06:52'),
(44, 'JustinTest', NULL, NULL, 'yekkidalmi@nedoz.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:09:29');

-- --------------------------------------------------------

--
-- Structure de la table `Options`
--

CREATE TABLE `Options` (
  `ID` int(11) NOT NULL,
  `HIDDEN` bit(1) NOT NULL,
  `SESSION` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Options`
--

INSERT INTO `Options` (`ID`, `HIDDEN`, `SESSION`) VALUES
(21, b'1', 21),
(37, b'0', 22),
(38, b'0', 26),
(39, b'0', 21),
(40, b'0', 26),
(41, b'0', 27),
(42, b'0', 24),
(43, b'0', 26),
(44, b'0', 24);

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
  `ID_SESSION` int(255) NOT NULL,
  `RESULTAT` int(11) NOT NULL,
  `MOIS` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Resultats`
--

INSERT INTO `Resultats` (`ID`, `TIME_OF_INSERTION`, `ID_USER`, `ID_MATIERE`, `FORMATION`, `ID_SESSION`, `RESULTAT`, `MOIS`) VALUES
(333, '2020-11-21 17:57:16', 38, 52, 8, 26, 9, 'NOV'),
(334, '2020-11-21 20:42:56', 39, 51, 4, 21, 8, 'NOV'),
(335, '2020-11-21 21:15:56', 21, 52, 8, 26, 5, 'NOV'),
(336, '2020-11-23 01:42:52', 21, 51, 4, 21, 7, 'NOV');

-- --------------------------------------------------------

--
-- Structure de la table `Sessions`
--

CREATE TABLE `Sessions` (
  `ID_SESSION` int(11) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL,
  `ID_FORMATION` int(11) NOT NULL,
  `STATUS` bit(1) NOT NULL,
  `EMPLACEMENT` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Sessions`
--

INSERT INTO `Sessions` (`ID_SESSION`, `DATE_DEBUT`, `DATE_FIN`, `ID_FORMATION`, `STATUS`, `EMPLACEMENT`) VALUES
(21, '2020-08-17', '2021-03-31', 4, b'1', 'Rousies'),
(22, '2020-10-23', '2021-03-31', 4, b'1', 'Télétravail'),
(23, '2020-11-21', '2021-11-21', 6, b'0', 'Paris'),
(24, '2020-11-21', '2020-11-22', 5, b'1', 'Valenciennes'),
(25, '2020-11-21', '2020-11-29', 7, b'1', 'Hergnies'),
(26, '2020-11-08', '2020-11-28', 8, b'1', 'Prouvy'),
(27, '2020-11-12', '2020-11-30', 9, b'1', 'Paris'),
(28, '2020-11-23', '2020-11-24', 6, b'1', 'Prouvy');

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
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `FormationsUtilisateur`
--
ALTER TABLE `FormationsUtilisateur`
  MODIFY `LIGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `Invitations`
--
ALTER TABLE `Invitations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `Options`
--
ALTER TABLE `Options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `Resultats`
--
ALTER TABLE `Resultats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT pour la table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
