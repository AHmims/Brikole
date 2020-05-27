-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 mai 2020 à 00:58
-- Version du serveur :  5.6.17
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_brikole`
--

-- --------------------------------------------------------

--
-- Structure de la table `association_2`
--

CREATE TABLE `association_2` (
  `id_profession` int(11) DEFAULT NULL,
  `id_bricoleur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `bricoleur`
--

CREATE TABLE `bricoleur` (
  `id_dossier` int(11) DEFAULT NULL,
  `id_bricoleur` int(11) NOT NULL,
  `prenom` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `telephone` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `lieu` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `verif_compte` tinyint(1) DEFAULT NULL,
  `Email` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `MP` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bricoleur`
--

INSERT INTO `bricoleur` (`id_dossier`, `id_bricoleur`, `prenom`, `nom`, `telephone`, `lieu`, `description`, `verif_compte`, `Email`, `MP`) VALUES
(NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Ach@gmail.com', '0000'),
(NULL, 2, 'Achraf', 'Chaoub', '0637994180', 'safi', NULL, NULL, 'Ach@hotmail.fr', '0000'),
(NULL, 3, 'chaouffs', 'Sara', '086674421', 'casablanca', NULL, NULL, 'achgg@gmail.com', 'achraf'),
(NULL, 4, 'ahc', 'ali', '09887384', 'Tanger', NULL, NULL, 'ai@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_bricoleur` int(11) DEFAULT NULL,
  `pseudo` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `commentaire` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id_dossier` int(11) NOT NULL,
  `id_document` int(11) DEFAULT NULL,
  `libelle_document` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `dossier_bricoleur`
--

CREATE TABLE `dossier_bricoleur` (
  `id_dossier` int(11) NOT NULL,
  `libelle_dossier` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_bricoleur` int(11) DEFAULT NULL,
  `refrence_image` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `type_image` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `id_profession` int(11) NOT NULL,
  `libelle_profession` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `sous_profession`
--

CREATE TABLE `sous_profession` (
  `id_Sprofession` int(11) NOT NULL,
  `id_profession` int(11) DEFAULT NULL,
  `libelle` varchar(254) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association_2`
--
ALTER TABLE `association_2`
  ADD KEY `FK_Association_2` (`id_bricoleur`),
  ADD KEY `FK_Association_8` (`id_profession`);

--
-- Index pour la table `bricoleur`
--
ALTER TABLE `bricoleur`
  ADD PRIMARY KEY (`id_bricoleur`),
  ADD KEY `FK_Association_4` (`id_dossier`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `FK_Association_6` (`id_bricoleur`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_dossier`);

--
-- Index pour la table `dossier_bricoleur`
--
ALTER TABLE `dossier_bricoleur`
  ADD PRIMARY KEY (`id_dossier`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `FK_Association_3` (`id_bricoleur`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id_profession`);

--
-- Index pour la table `sous_profession`
--
ALTER TABLE `sous_profession`
  ADD PRIMARY KEY (`id_Sprofession`),
  ADD KEY `FK_Association_1` (`id_profession`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bricoleur`
--
ALTER TABLE `bricoleur`
  MODIFY `id_bricoleur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `association_2`
--
ALTER TABLE `association_2`
  ADD CONSTRAINT `FK_Association_8` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`),
  ADD CONSTRAINT `FK_Association_2` FOREIGN KEY (`id_bricoleur`) REFERENCES `bricoleur` (`id_bricoleur`);

--
-- Contraintes pour la table `bricoleur`
--
ALTER TABLE `bricoleur`
  ADD CONSTRAINT `FK_Association_4` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_bricoleur` (`id_dossier`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_Association_6` FOREIGN KEY (`id_bricoleur`) REFERENCES `bricoleur` (`id_bricoleur`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `FK_Association_5` FOREIGN KEY (`id_dossier`) REFERENCES `dossier_bricoleur` (`id_dossier`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_Association_3` FOREIGN KEY (`id_bricoleur`) REFERENCES `bricoleur` (`id_bricoleur`);

--
-- Contraintes pour la table `sous_profession`
--
ALTER TABLE `sous_profession`
  ADD CONSTRAINT `FK_Association_1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id_profession`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
