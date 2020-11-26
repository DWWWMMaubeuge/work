-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 26 nov. 2020 à 20:07
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
(43, 'Développeur web'),
(44, 'Formateurs professionnels');

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
(49, 50, 0, 0, '2020-11-26 18:05:27'),
(52, 21, 43, 34, '2020-11-26 18:33:43'),
(53, 49, 43, 34, '2020-11-26 19:08:32'),
(54, 49, 44, 35, '2020-11-26 19:22:48'),
(55, 21, 44, 35, '2020-11-26 19:23:37');

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
(62, 'PHP', b'1', 43, 34),
(63, 'SAVOIR-ETRE', b'1', 44, 35);

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
  `Administrateur` bit(1) NOT NULL,
  `Formateur` bit(1) NOT NULL,
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

INSERT INTO `Membres` (`ID`, `Pseudo`, `Prenom`, `Nom`, `Email`, `MDP`, `Administrateur`, `Formateur`, `Fixe`, `Mobile`, `Github`, `Site`, `Avatar`, `Date_of_registration`) VALUES
(21, 'The-Evil-Fox', NULL, NULL, 'stevenhonor@live.fr', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'1', b'1', NULL, NULL, 'The-Evil-Fox', NULL, '21.gif', '2020-11-08 04:28:38'),
(37, 'xavierB', NULL, NULL, 'xavier.bourget@gmail.com', '99392cc4385deda732abcc2a3ae13203018547f8c55382c2c3685bc96b563f2b', b'1', b'1', NULL, NULL, '', NULL, 'default.png', '2020-11-20 03:06:09'),
(38, 'Routierdusamedi', NULL, NULL, 'zjzmrvxvcdqdggstno@avxrja.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-21 17:55:04'),
(39, 'ahanchir@live.fr', NULL, NULL, 'ahanchir@live.fr', 'ba4a04de0859b67efc547059a33afb3e12e0dc6329720de821c3f8f446d3b490', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-21 20:41:27'),
(40, 'testeurpro', NULL, NULL, 'zkmijdkqjzbksqebry@mhzayt.com', '18a0e6b9288a3ec118bbb0d2f056537755885a25ed84258090e1e5857bf79320', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 01:31:59'),
(41, 'testeurpronumero2', NULL, NULL, 'dsfsdfsdfsdfsdf@dsfsdfsdfsdfsdf.cz', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 01:38:28'),
(42, 'testemail', NULL, NULL, 'pocejaw990@bcpfm.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:05:07'),
(43, 'testEmail2', NULL, NULL, 'kerkuregne@nedoz.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:06:52'),
(44, 'JustinTest', NULL, NULL, 'yekkidalmi@nedoz.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-23 02:09:29'),
(45, 'TestEmail4', NULL, NULL, 'klw50716@cuoly.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-24 00:01:26'),
(46, 'JohnShepard', NULL, NULL, 'gta77682@bcaoo.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-24 00:37:56'),
(47, 'LeRoutier', NULL, NULL, 'hux99152@bcaoo.com', 'af8809fd981a620b0c30599a42246288836788170b6e952ddaec1a6ad827cdb5', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-24 23:44:45'),
(48, 'Fred', NULL, NULL, 'damlevufya@nedoz.com', 'af8809fd981a620b0c30599a42246288836788170b6e952ddaec1a6ad827cdb5', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-24 23:52:58'),
(49, 'Testcompte59', NULL, NULL, 'fdr75054@eoopy.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-26 18:03:46'),
(50, 'TestComptefddfdfdf', NULL, NULL, 'zvp46474@eoopy.com', '8d150051e155cd5a77030a8c8c2ea9a59f4a0b82e42f140be50faf79005a0f07', b'0', b'0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-26 18:05:27');

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
(21, b'1', 35),
(37, b'0', 0),
(38, b'0', 0),
(39, b'0', 0),
(40, b'0', 0),
(41, b'0', 0),
(42, b'0', 0),
(43, b'0', 0),
(44, b'0', 0),
(45, b'0', 0),
(46, b'0', 0),
(47, b'0', 0),
(48, b'0', 0),
(49, b'0', 34),
(50, b'0', 0);

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
(344, '2020-11-26 19:25:23', 49, 63, 44, 35, 5, 'NOV'),
(345, '2020-11-26 19:26:03', 49, 62, 43, 34, 9, 'NOV');

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
(34, '2020-08-13', '2021-05-20', 43, b'1', 'Rousies'),
(35, '2020-11-20', '2021-03-14', 44, b'1', 'Télétravail');

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
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `FormationsUtilisateur`
--
ALTER TABLE `FormationsUtilisateur`
  MODIFY `LIGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `Invitations`
--
ALTER TABLE `Invitations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `Options`
--
ALTER TABLE `Options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `Resultats`
--
ALTER TABLE `Resultats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT pour la table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
