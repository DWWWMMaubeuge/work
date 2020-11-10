-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 10 nov. 2020 à 16:24
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
(1, 'Développeur web'),
(2, 'Maçon'),
(3, 'Formateur professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `Inscriptions`
--

CREATE TABLE `Inscriptions` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SECURE_KEY` int(255) NOT NULL,
  `INVITATION_DATE` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(21, 'The-Evil-Fox', 'Steven', 'Durieux', 'stevenhonor@live.fr', '@59199Hergnies', '1', NULL, NULL, 'The-Evil-Fox', 'http://adriaticstuff.000webhostapp.com/index.php', 'default.png', '2020-11-08 04:28:38');

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
(21, b'1', 1);

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
(172, '2020-11-08 05:03:19', 21, 30, 8, 'NOVEMBRE'),
(173, '2020-11-08 05:03:34', 21, 25, 9, 'NOVEMBRE'),
(174, '2020-11-08 05:03:36', 21, 26, 8, 'NOVEMBRE'),
(175, '2020-11-08 05:03:40', 21, 22, 9, 'NOVEMBRE'),
(176, '2020-11-08 05:03:41', 21, 23, 6, 'NOVEMBRE'),
(177, '2020-11-08 05:03:42', 21, 24, 6, 'NOVEMBRE'),
(178, '2020-11-08 05:03:46', 21, 21, 7, 'NOVEMBRE'),
(179, '2020-11-08 05:03:47', 21, 20, 8, 'NOVEMBRE'),
(180, '2020-11-08 05:03:48', 21, 19, 10, 'NOVEMBRE'),
(181, '2020-11-08 05:03:52', 21, 27, 5, 'NOVEMBRE'),
(182, '2020-11-08 05:03:57', 21, 28, 6, 'NOVEMBRE'),
(183, '2020-11-08 05:04:01', 21, 29, 5, 'NOVEMBRE'),
(184, '2020-11-08 05:04:05', 21, 32, 9, 'NOVEMBRE'),
(185, '2020-11-08 05:04:07', 21, 31, 2, 'NOVEMBRE'),
(186, '2020-11-08 05:04:09', 21, 33, 0, 'NOVEMBRE'),
(187, '2020-11-08 05:04:22', 21, 34, 3, 'NOVEMBRE'),
(188, '2020-11-08 05:04:23', 21, 35, 1, 'NOVEMBRE');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Matieres`
--
ALTER TABLE `Matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `Membres`
--
ALTER TABLE `Membres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Options`
--
ALTER TABLE `Options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `Resultats`
--
ALTER TABLE `Resultats`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
