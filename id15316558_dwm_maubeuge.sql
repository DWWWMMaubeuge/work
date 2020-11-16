-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 16 nov. 2020 à 12:30
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
  `SECURE_KEY` int(255) NOT NULL,
  `DATE_OF_INVITATION` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Matieres`
--

CREATE TABLE `Matieres` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Categorie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Active` bit(1) NOT NULL,
  `ID_Formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Matieres`
--

INSERT INTO `Matieres` (`id`, `Nom`, `Categorie`, `Active`, `ID_Formation`) VALUES
(19, 'HTML', 'Front', b'1', 1),
(20, 'CSS', 'Front', b'1', 1),
(21, 'JAVASCRIPT', 'Front', b'1', 1),
(22, 'PHP', 'Back', b'1', 1),
(23, 'AJAX', 'Front', b'1', 1),
(24, 'JQUERY', 'Front', b'1', 1),
(25, 'RESPONSIVE', 'Front', b'1', 1),
(26, 'SQL', 'Back', b'1', 1),
(27, 'COMPOSER', 'Back', b'1', 1),
(28, 'SYMFONY', 'Back', b'1', 1),
(29, 'DOCTRINE', 'Back', b'1', 1),
(30, 'TWIG', 'Front', b'1', 1),
(31, 'AGILE', 'Autres', b'1', 1),
(32, 'GIT', 'Autres', b'1', 1),
(33, 'Python', 'Back', b'1', 1),
(34, 'SEO', 'Autres', b'1', 1),
(35, 'RGPD', 'Autres', b'1', 1),
(36, 'COFFRAGE', 'FRONT', b'1', 2),
(37, 'MOULAGE', 'FRONT', b'1', 2),
(38, 'LECTURE DE PLANS', 'FRONT', b'1', 2);

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
  `Admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `Membres` (`ID`, `Pseudo`, `Prenom`, `Nom`, `Email`, `MDP`, `Admin`, `Fixe`, `Mobile`, `Github`, `Site`, `Avatar`, `Date_of_registration`) VALUES
(21, 'The-Evil-Fox', 'Steven', 'Durieux', 'stevenhonor@live.fr', '@59199Hergnies', '1', NULL, NULL, 'The-Evil-Fox', 'http://adriaticstuff.000webhostapp.com/profil.php', '21.gif', '2020-11-08 04:28:38'),
(31, 'CompteTest', NULL, NULL, 'varovrkignbcnodgww@miucce.online', '@59199Hergnies', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 16:14:38'),
(32, 'compteTest2', NULL, NULL, 'rpcizrwldhtzhhmqhz@wqcefp.online', '@59199Hergnies', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:02:03'),
(33, 'DEV', NULL, NULL, 'test@test.com', 'dsfsdfds', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:52:42'),
(34, 'DEV', NULL, NULL, 'test@test.com', 'dsfsdfds', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:52:55'),
(35, 'DEV', NULL, NULL, 'test@test.com', 'dsfsdfds', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:52:58'),
(36, 'DEV', NULL, NULL, 'test@test.com', 'dsfsdfds', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:52:58'),
(37, 'DEV', NULL, NULL, 'test@test.com', 'dsfsdfds', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 17:52:58'),
(38, 'Maçon', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:45:05'),
(39, 'Maçon2', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:45:08'),
(40, 'Maçon3', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:45:08'),
(41, 'Maçon4', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:45:08'),
(42, 'Maçon5', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:45:08'),
(43, 'formateurpro1', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:46:32'),
(44, 'formateurpro2', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:46:36'),
(45, 'formateurpro3', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:46:36'),
(46, 'formateurpro4', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:46:36'),
(47, 'formateurpro5', NULL, NULL, 'macon@macon.com', '6545454', '0', NULL, NULL, NULL, NULL, 'default.png', '2020-11-12 18:46:36'),
(48, 'xavierB', NULL, NULL, 'xavier.bourget@gmail.com', 'xavierB', '1', NULL, NULL, NULL, NULL, 'default.png', '2020-11-13 14:58:26');

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
(21, b'1', 1),
(31, b'0', 2),
(32, b'0', 3),
(33, b'1', 1),
(34, b'1', 1),
(35, b'1', 1),
(36, b'1', 1),
(37, b'1', 1),
(38, b'1', 2),
(39, b'1', 2),
(40, b'1', 2),
(41, b'1', 2),
(42, b'1', 2),
(43, b'1', 3),
(44, b'1', 3),
(45, b'1', 3),
(46, b'1', 3),
(47, b'1', 3),
(48, b'0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Resultats`
--

CREATE TABLE `Resultats` (
  `ID` int(11) NOT NULL,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_USER` int(11) NOT NULL,
  `ID_MATIERE` int(11) NOT NULL,
  `RESULTAT` int(11) NOT NULL,
  `MOIS` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Resultats`
--

INSERT INTO `Resultats` (`ID`, `TIME_OF_INSERTION`, `ID_USER`, `ID_MATIERE`, `RESULTAT`, `MOIS`) VALUES
(232, '2020-11-13 23:52:42', 21, 19, 9, 'NOV'),
(233, '2020-11-13 23:52:45', 21, 22, 9, 'NOV'),
(234, '2020-11-13 23:52:48', 21, 20, 9, 'NOV'),
(235, '2020-11-13 23:52:50', 21, 21, 8, 'NOV'),
(236, '2020-11-13 23:52:52', 21, 24, 5, 'NOV'),
(237, '2020-11-13 23:52:53', 21, 23, 6, 'NOV'),
(238, '2020-11-13 23:52:57', 21, 25, 7, 'NOV'),
(239, '2020-11-13 23:52:59', 21, 26, 6, 'NOV'),
(240, '2020-11-13 23:53:02', 21, 27, 5, 'NOV'),
(241, '2020-11-13 23:53:03', 21, 30, 8, 'NOV'),
(242, '2020-11-13 23:53:09', 21, 29, 5, 'NOV'),
(243, '2020-11-13 23:53:11', 21, 28, 5, 'NOV'),
(244, '2020-11-13 23:53:13', 21, 31, 2, 'NOV'),
(245, '2020-11-13 23:53:15', 21, 32, 9, 'NOV'),
(246, '2020-11-13 23:53:16', 21, 33, 0, 'NOV'),
(247, '2020-11-13 23:53:23', 21, 34, 2, 'NOV'),
(248, '2020-11-13 23:53:24', 21, 35, 0, 'NOV');

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
(1, '2020-08-17', '2021-03-30', 1),
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
-- AUTO_INCREMENT pour la table `Inscriptions`
--
ALTER TABLE `Inscriptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `Invitations`
--
ALTER TABLE `Invitations`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `Options`
--
ALTER TABLE `Options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `Resultats`
--
ALTER TABLE `Resultats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT pour la table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `ID_SESSION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
