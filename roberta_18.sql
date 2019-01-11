-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 11 Janvier 2019 à 06:22
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `roberta_18`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences_eleves`
--

CREATE TABLE `absences_eleves` (
  `ref_per` int(11) NOT NULL,
  `ref_cou` int(11) NOT NULL,
  `date_abs` date NOT NULL,
  `nb_abs` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `autorisations`
--

CREATE TABLE `autorisations` (
  `id_aut` int(11) NOT NULL,
  `nom_aut` varchar(30) NOT NULL,
  `code_aut` varchar(10) NOT NULL,
  `desc_aut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autorisations`
--

INSERT INTO `autorisations` (`id_aut`, `nom_aut`, `code_aut`, `desc_aut`) VALUES
(1, 'Gestion des utilisateurs', 'ADM_USR', 'Gestion complète des utilisateurs, permet entres autres choses la suppression des utilisateurs'),
(2, 'Gestion des utilisateurs', 'USR_USR', 'Gestion complète des utilisateurs'),
(3, 'Utilisation du site', 'ADM_SIT', 'Cette autorisation n''est pas utilisée'),
(4, 'Utilisation du site', 'USR_SIT', 'Accès aux parties publiques du site'),
(5, 'Droits d''accès', 'ADM_ARU', 'Création des droits d''accès et attribution des droits d''accès des droits d''accès aux fonctions'),
(6, 'Droits d''accès', 'USR_ARU', 'Attribution des droits d''accès des droits d''accès aux fonctions'),
(7, 'Fonction utilisateurs', 'ADM_FNC', 'Création et attribution des fonctions aux utilisateurs'),
(8, 'Fonction utilisateurs', 'USR_FNC', 'Attribution des fonctions aux utilisateurs'),
(9, 'Gestion des autorisations', 'ADM_AUT', 'Création d''autorisations'),
(10, 'Gestion des autorisations', 'USR_AUT', 'Cette autorisation n''est pas utiliseée');

-- --------------------------------------------------------

--
-- Structure de la table `aut_fnc`
--

CREATE TABLE `aut_fnc` (
  `ref_aut` int(11) NOT NULL,
  `ref_fnc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `aut_fnc`
--

INSERT INTO `aut_fnc` (`ref_aut`, `ref_fnc`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(8, 2),
(9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id_cla` int(11) NOT NULL,
  `nom_cla` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id_cla`, `nom_cla`) VALUES
(2, 'Classe de 1ère'),
(3, 'Classe de 2ème'),
(4, 'Classe de 3ème'),
(5, 'Classe de 4ème');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cou` int(11) NOT NULL,
  `nom_cour` text NOT NULL,
  `mat_cour` text NOT NULL,
  `hrs_debut` time NOT NULL,
  `hrs_fin` time NOT NULL,
  `ref_prof` int(11) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cou`, `nom_cour`, `mat_cour`, `hrs_debut`, `hrs_fin`, `ref_prof`, `ref_classe`, `ref_salle`) VALUES
(14, 'Cour de base', 'Robotique', '11:22:00', '22:22:00', 5, 2, 1),
(15, 'Cour avancer', 'Robotique', '07:30:00', '11:30:00', 9, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `fnc_per`
--

CREATE TABLE `fnc_per` (
  `ref_fnc` int(11) NOT NULL,
  `ref_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fnc_per`
--

INSERT INTO `fnc_per` (`ref_fnc`, `ref_per`) VALUES
(1, 8),
(2, 8),
(3, 8);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id_fnc` int(11) NOT NULL,
  `nom_fnc` varchar(30) NOT NULL,
  `abr_fnc` varchar(10) NOT NULL,
  `desc_fnc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`id_fnc`, `nom_fnc`, `abr_fnc`, `desc_fnc`) VALUES
(1, 'Administrateur', 'admin', 'Administrateur de la plateforme, bénéficie de tous les accès'),
(2, 'Gestionnaire de droits d''accès', 'Gest Accès', 'Utilisateur pouvant gérer les droits d''accès de l''ensemble des autres utilisateurs'),
(3, 'Utilisateur', 'UserSite', 'Accès aux parties principales du site');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id_per` int(11) NOT NULL,
  `nom_per` varchar(30) NOT NULL,
  `prenom_per` varchar(30) NOT NULL,
  `adresse_per` varchar(30) NOT NULL,
  `lieu_per` varchar(30) NOT NULL,
  `npa_per` int(11) NOT NULL,
  `mail_per` varchar(30) NOT NULL,
  `pass_per` varchar(30) NOT NULL,
  `date_per` varchar(30) NOT NULL,
  `tel_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnes`
--

INSERT INTO `personnes` (`id_per`, `nom_per`, `prenom_per`, `adresse_per`, `lieu_per`, `npa_per`, `mail_per`, `pass_per`, `date_per`, `tel_per`) VALUES
(8, 'Théron', 'Christian', 'Rue du midi, 33', 'Bienne', 2504, 'christian.theron@gmail.com', '123456', '08.10.1998', 786199820),
(9, 'Kerman ', 'Lavoie', 'Rue du moulin 16', 'Bienne', 2504, 'KermanLavoie@teleworm.us', '123456', '13.07.1998', 786199820),
(10, 'Eliot', 'Poirier', 'Rägetenstrasse 132', 'Hörhausen', 8507, 'EliotPoirier@teleworm.us', '123456', '12.06.1998', 786199820),
(11, 'Verrill', 'Pitre', 'Zürichstrasse 53', 'Autafond', 1782, 'VerrillPitre@dayrep.com', '123456', '18.05.1998', 786199820),
(12, 'Scoville', 'Gagnon', 'Via Vigizzi 82', 'Unterentfelden', 5035, ' ScovilleGagnon@rhyta.com', '123456', '05.10.1986', 786199820),
(13, 'Eugène', 'Sorel', 'Sondanella 73', 'Grugnay', 1955, 'EugeneSorel@teleworm.us', '123456', '22.07.1987', 786199820),
(14, 'Vernon', 'Bousquet', 'Hauptstrasse 47', 'Montagny-près-Yverdon', 1442, 'VernonBousquet@dayrep.com', '123456', '30.06.1965', 786199820),
(15, 'Manville', 'Bergeron', 'Pfaffacherweg 58', 'Schlieren', 8952, 'ManvilleBergeron@teleworm.us', '123456', '01.05.1978', 786199820);

-- --------------------------------------------------------

--
-- Structure de la table `ref_cla_per`
--

CREATE TABLE `ref_cla_per` (
  `ref_cla` int(11) NOT NULL,
  `ref_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ref_cla_per`
--

INSERT INTO `ref_cla_per` (`ref_cla`, `ref_per`) VALUES
(2, 9),
(2, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Structure de la table `ref_prof`
--

CREATE TABLE `ref_prof` (
  `id_prof` int(11) NOT NULL,
  `ref_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ref_prof`
--

INSERT INTO `ref_prof` (`id_prof`, `ref_per`) VALUES
(5, 9),
(6, 10),
(9, 11);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(30) NOT NULL,
  `lieu_salle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `lieu_salle`) VALUES
(1, 'salle info 1', 'bd51'),
(2, 'salle info 2', 'bd52');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absences_eleves`
--
ALTER TABLE `absences_eleves`
  ADD KEY `id_per` (`ref_per`),
  ADD KEY `id_cou` (`ref_cou`);

--
-- Index pour la table `autorisations`
--
ALTER TABLE `autorisations`
  ADD PRIMARY KEY (`id_aut`);

--
-- Index pour la table `aut_fnc`
--
ALTER TABLE `aut_fnc`
  ADD PRIMARY KEY (`ref_aut`,`ref_fnc`),
  ADD KEY `id_fnc` (`ref_fnc`),
  ADD KEY `id_aut` (`ref_aut`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_cla`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cou`),
  ADD KEY `ref_prof` (`ref_prof`,`ref_classe`,`ref_salle`),
  ADD KEY `ref_salle` (`ref_salle`),
  ADD KEY `ref_classe` (`ref_classe`);

--
-- Index pour la table `fnc_per`
--
ALTER TABLE `fnc_per`
  ADD PRIMARY KEY (`ref_fnc`,`ref_per`),
  ADD KEY `id_fnc` (`ref_fnc`),
  ADD KEY `id_per` (`ref_per`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id_fnc`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_per`);

--
-- Index pour la table `ref_cla_per`
--
ALTER TABLE `ref_cla_per`
  ADD KEY `ref_cla` (`ref_cla`,`ref_per`),
  ADD KEY `ref_per` (`ref_per`);

--
-- Index pour la table `ref_prof`
--
ALTER TABLE `ref_prof`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `ref_per` (`ref_per`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `autorisations`
--
ALTER TABLE `autorisations`
  MODIFY `id_aut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_cla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id_fnc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `ref_prof`
--
ALTER TABLE `ref_prof`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `absences_eleves`
--
ALTER TABLE `absences_eleves`
  ADD CONSTRAINT `absences_eleves_ibfk_1` FOREIGN KEY (`ref_cou`) REFERENCES `cours` (`id_cou`),
  ADD CONSTRAINT `absences_eleves_ibfk_2` FOREIGN KEY (`ref_per`) REFERENCES `personnes` (`id_per`);

--
-- Contraintes pour la table `aut_fnc`
--
ALTER TABLE `aut_fnc`
  ADD CONSTRAINT `aut_fnc_ibfk_1` FOREIGN KEY (`ref_aut`) REFERENCES `autorisations` (`id_aut`),
  ADD CONSTRAINT `aut_fnc_ibfk_2` FOREIGN KEY (`ref_fnc`) REFERENCES `fonctions` (`id_fnc`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`ref_prof`) REFERENCES `ref_prof` (`id_prof`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_cla`);

--
-- Contraintes pour la table `fnc_per`
--
ALTER TABLE `fnc_per`
  ADD CONSTRAINT `fnc_per_ibfk_1` FOREIGN KEY (`ref_per`) REFERENCES `personnes` (`id_per`),
  ADD CONSTRAINT `fnc_per_ibfk_2` FOREIGN KEY (`ref_fnc`) REFERENCES `fonctions` (`id_fnc`);

--
-- Contraintes pour la table `ref_cla_per`
--
ALTER TABLE `ref_cla_per`
  ADD CONSTRAINT `ref_cla_per_ibfk_1` FOREIGN KEY (`ref_cla`) REFERENCES `classe` (`id_cla`),
  ADD CONSTRAINT `ref_cla_per_ibfk_2` FOREIGN KEY (`ref_per`) REFERENCES `personnes` (`id_per`);

--
-- Contraintes pour la table `ref_prof`
--
ALTER TABLE `ref_prof`
  ADD CONSTRAINT `ref_prof_ibfk_1` FOREIGN KEY (`ref_per`) REFERENCES `personnes` (`id_per`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
