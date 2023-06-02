-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juin 2023 à 16:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `conservatoireefrei`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('admin', '123'),
('secretaireNumero1', '!Ks9p#mD4Z');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `IDELEVE` int(11) NOT NULL,
  `BOURSE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`IDELEVE`, `BOURSE`) VALUES
(106, 400),
(141, 400),
(180, 300),
(191, 500),
(195, 540),
(196, 200),
(197, 300),
(198, 100),
(199, 150),
(200, 120),
(201, 500),
(202, 300);

-- --------------------------------------------------------

--
-- Structure de la table `heure`
--

CREATE TABLE `heure` (
  `TRANCHE` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `heure`
--

INSERT INTO `heure` (`TRANCHE`) VALUES
('10h-12h'),
('14h-15h'),
('18h-19h'),
('9h-13h');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `IDPROF` int(11) NOT NULL,
  `IDELEVE` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `DATEINSCRIPTION` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`IDPROF`, `IDELEVE`, `NUMSEANCE`, `DATEINSCRIPTION`) VALUES
(4, 106, 1, '2023-05-28 23:57:00'),
(4, 106, 2, '2023-05-28 19:05:06'),
(4, 141, 1, '2023-05-29 11:20:47'),
(4, 191, 1, '2023-05-27 16:10:49'),
(4, 197, 1, '2023-05-27 16:11:59'),
(4, 198, 1, '2023-05-27 16:12:04'),
(4, 202, 1, '2023-05-29 11:16:20'),
(140, 141, 10, '2023-05-29 16:23:56'),
(140, 180, 10, '2023-05-29 16:23:57'),
(140, 191, 10, '2023-05-29 16:23:58'),
(140, 195, 10, '2023-05-29 16:24:00'),
(140, 196, 10, '2023-05-29 16:24:01'),
(140, 197, 10, '2023-05-29 16:24:04'),
(140, 198, 10, '2023-05-29 16:24:05'),
(140, 199, 10, '2023-05-29 16:24:06'),
(140, 200, 10, '2023-05-29 16:24:07'),
(140, 201, 10, '2023-05-29 16:24:09'),
(193, 106, 7, '2023-05-27 15:44:47'),
(193, 106, 8, '2023-05-27 15:45:50'),
(193, 141, 7, '2023-05-27 15:44:50'),
(193, 141, 8, '2023-05-27 15:45:52'),
(194, 106, 9, '2023-05-27 15:46:39');

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE `instrument` (
  `LIBELLE` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`LIBELLE`) VALUES
('baterie'),
('flûte'),
('guitare'),
('piano'),
('violon');

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `JOUR` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`JOUR`) VALUES
('jeudi'),
('lundi'),
('mardi'),
('mercredi'),
('samedi'),
('vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `NIVEAU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`NIVEAU`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Structure de la table `payer`
--

CREATE TABLE `payer` (
  `IDELEVE` int(11) NOT NULL,
  `LIBELLE` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DATEPAEMENT` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PAYE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payer`
--

INSERT INTO `payer` (`IDELEVE`, `LIBELLE`, `DATEPAEMENT`, `PAYE`) VALUES
(106, 'trimestre1', '02-02-2023 15:05:21', 1),
(106, 'trimestre2', '2023-05-27 16:06:36', 1),
(106, 'trimestre3', '2023-05-27 16:06:38', 1),
(106, 'trimestre4', '2023-05-27 16:06:39', 1),
(141, 'trimestre1', '02-02-2023 15:05:21', 1),
(141, 'trimestre2', '2023-05-27 16:06:59', 1),
(180, 'trimestre1', '02-02-2023 15:05:21', 1),
(180, 'trimestre2', '2023-05-27 16:06:43', 1),
(180, 'trimestre3', '2023-05-27 16:06:42', 1),
(195, 'trimestre1', '02-02-2023 15:05:21', 1),
(195, 'trimestre2', '2023-05-27 16:06:55', 1),
(196, 'trimestre1', '02-02-2023 15:05:21', 1),
(196, 'trimestre2', '2023-05-27 16:06:46', 1),
(197, 'trimestre2', '2023-05-27 16:10:19', 1),
(198, 'trimestre1', '02-02-2023 15:05:21', 1),
(198, 'trimestre2', '2023-05-27 16:06:51', 1),
(199, 'trimestre1', '02-02-2023 15:05:21', 1),
(199, 'trimestre2', '2023-05-27 16:06:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID` int(11) NOT NULL,
  `NOM` char(32) DEFAULT NULL,
  `PRENOM` char(32) DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `MAIL` char(32) DEFAULT NULL,
  `ADRESSE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID`, `NOM`, `PRENOM`, `TEL`, `MAIL`, `ADRESSE`) VALUES
(2, 'Baitiche', 'Sarah', 785566332, 'setif1311@gmail.com', '22 VOIE DES MOULINS SUD'),
(4, 'Boumaaz', 'Rayan', 625455889, 'RAYOU@gmail.com', '58 rue de Marseille'),
(5, 'Aissaoui', 'Rahma', 615544778, 'Yasmine@gmail.com', '14 avenue lucien francais, bat 3'),
(17, 'Selmani', 'Khedoudja', 754488552, 'yasmineaissoui@gmail.com', '14 avenue Lucien français'),
(53, 'Treille', 'Lucas', 645858995, 'lucas@treille.com', '58 av general leclerd'),
(101, 'Amara', 'Sacha', 612255447, 'sacha@amara.fr', '56 av du breton'),
(106, 'Zaza', 'Britanie', 615544773, 'Britanienie@outlook.com', '54av du Moulin vert'),
(118, 'Julien', 'Dorée', 521144555, 'sfy7@gmail.com', '45 rue du morais'),
(124, 'Morais', 'Vincent', 658899554, 'vins@gmail.com', '77 av du luvien'),
(140, 'Terpin', 'Celeste', 715458569, 'CslstTerpin@outlook.fr', '88 rue de Monod'),
(141, 'Habib', 'Hinda', 712547885, 'hinda@outlook.com', '44 rue du pont'),
(180, 'Laufer', 'Samuel', 715488996, 'samuellaufer@live.fr', '65 rue des chevaux'),
(183, 'Lin', 'Frank', 665588994, 'franklin@outlook.fr', '13 rue du moulin'),
(184, 'Hamidou', 'Salim', 715544773, 'Hamidou@live.com', '58 boulevard des Champs'),
(191, 'Pascal', 'Michel', 785544996, 'michelpaspas@outlook.fr', '28 rue des aliens'),
(192, 'Durant', 'Guillaume', 785566332, 'guiguidu@yahoo.fr', '49 rue des salomons'),
(193, 'Anckyr', 'Theodort', 645874123, 'theoankyky@outlook.fr', '45 avenue des rosiers'),
(194, 'Hamed', 'Laam', 745523985, 'laamHam@gmail.com', '52 boulevard des ruisseaux'),
(195, 'Pendaro', 'Mathieu', 751122348, 'pendaroro@gmail.com', '18 av des luciens'),
(196, 'Maneliose', 'Miléna', 654123589, 'milélé@life.com', '50 rue des livres perdus'),
(197, 'Lavoisier', 'Pierette', 654128965, 'piepierette@outlook.fr', '16 boulevard des jours'),
(198, 'Delange', 'Soleine', 754123695, 'sosodelange@gmail.com', '45 av des rues de paris'),
(199, 'Povalosky', 'Jeremie', 654899665, 'jéjépol@outlook.com', '75 av des superwomen'),
(200, 'Lafontnai', 'Flavie', 785458951, 'flavievie@gmail.com', '41 av des moulins rouges'),
(201, 'Pedroni', 'Pablo', 785412365, 'pedropolo@outlook.com', '21 rue du bourbier'),
(202, 'Juniera', 'Kilian', 758965412, 'kilianjuniera@gmail.com', '174 rue du grosier');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE `prof` (
  `IDPROF` int(11) NOT NULL,
  `INSTRUMENT` char(32) NOT NULL,
  `SALAIRE` double(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `prof`
--

INSERT INTO `prof` (`IDPROF`, `INSTRUMENT`, `SALAIRE`) VALUES
(4, 'violon', 1400.00),
(140, 'guitare', 1600.00),
(183, 'piano', 1245.00),
(184, 'guitare', 5000.00),
(192, 'flûte', 1782.00),
(193, 'baterie', 1650.00),
(194, 'baterie', 4000.00);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `IDPROF` int(11) NOT NULL,
  `NUMSEANCE` int(11) NOT NULL,
  `TRANCHE` char(32) NOT NULL,
  `JOUR` char(32) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `CAPACITE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`IDPROF`, `NUMSEANCE`, `TRANCHE`, `JOUR`, `NIVEAU`, `CAPACITE`) VALUES
(4, 1, '14h-15h', 'lundi', 2, 25),
(4, 2, '18h-19h', 'jeudi', 3, 27),
(4, 3, '18h-19h', 'mercredi', 2, 25),
(4, 11, '10h-12h', 'lundi', 1, 5),
(140, 4, '18h-19h', 'mercredi', 2, 25),
(140, 10, '18h-19h', 'jeudi', 1, 10),
(183, 5, '18h-19h', 'mercredi', 2, 25),
(192, 6, '10h-12h', 'jeudi', 1, 5),
(193, 7, '18h-19h', 'mardi', 2, 10),
(193, 8, '14h-15h', 'vendredi', 2, 15),
(194, 9, '10h-12h', 'jeudi', 1, 10),
(194, 12, '10h-12h', 'lundi', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `trim`
--

CREATE TABLE `trim` (
  `LIBELLE` char(32) NOT NULL,
  `DATEFIN` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `trim`
--

INSERT INTO `trim` (`LIBELLE`, `DATEFIN`) VALUES
('trimestre1', '31/03/2023'),
('trimestre2', '30/06/2023'),
('trimestre3', '30/09/2023'),
('trimestre4', '31/12/2023');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`IDELEVE`);

--
-- Index pour la table `heure`
--
ALTER TABLE `heure`
  ADD PRIMARY KEY (`TRANCHE`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`IDPROF`,`IDELEVE`,`NUMSEANCE`),
  ADD KEY `I_FK_INSCRIPTION_ELEVE` (`IDELEVE`),
  ADD KEY `I_FK_INSCRIPTION_SEANCE` (`IDPROF`,`NUMSEANCE`),
  ADD KEY `fk_numSeance` (`NUMSEANCE`);

--
-- Index pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`LIBELLE`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`JOUR`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`NIVEAU`),
  ADD KEY `NIVEAU` (`NIVEAU`);

--
-- Index pour la table `payer`
--
ALTER TABLE `payer`
  ADD PRIMARY KEY (`IDELEVE`,`LIBELLE`),
  ADD KEY `IDELEVE` (`IDELEVE`),
  ADD KEY `LIBELLE` (`LIBELLE`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`IDPROF`),
  ADD KEY `I_FK_PROF_INSTRUMENT` (`INSTRUMENT`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`IDPROF`,`NUMSEANCE`),
  ADD KEY `I_FK_SEANCE_JOUR` (`JOUR`),
  ADD KEY `I_FK_SEANCE_NIVEAU` (`NIVEAU`),
  ADD KEY `I_FK_SEANCE_PROF` (`IDPROF`),
  ADD KEY `fk_tranche` (`TRANCHE`),
  ADD KEY `NUMSEANCE` (`NUMSEANCE`);

--
-- Index pour la table `trim`
--
ALTER TABLE `trim`
  ADD PRIMARY KEY (`LIBELLE`);
ALTER TABLE `trim` ADD FULLTEXT KEY `LIBELLE` (`LIBELLE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `fk_idEleve` FOREIGN KEY (`IDELEVE`) REFERENCES `personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_insc_eleve` FOREIGN KEY (`IDELEVE`) REFERENCES `eleve` (`IDELEVE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inscr_prof` FOREIGN KEY (`IDPROF`) REFERENCES `prof` (`IDPROF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_numSeance` FOREIGN KEY (`NUMSEANCE`) REFERENCES `seance` (`NUMSEANCE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payer`
--
ALTER TABLE `payer`
  ADD CONSTRAINT `fk_paye_eleve` FOREIGN KEY (`IDELEVE`) REFERENCES `eleve` (`IDELEVE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_paye_lib` FOREIGN KEY (`LIBELLE`) REFERENCES `trim` (`LIBELLE`);

--
-- Contraintes pour la table `prof`
--
ALTER TABLE `prof`
  ADD CONSTRAINT `fk_idProf` FOREIGN KEY (`IDPROF`) REFERENCES `personne` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_refInstrument` FOREIGN KEY (`INSTRUMENT`) REFERENCES `instrument` (`LIBELLE`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_jour` FOREIGN KEY (`JOUR`) REFERENCES `jour` (`JOUR`),
  ADD CONSTRAINT `fk_prof` FOREIGN KEY (`IDPROF`) REFERENCES `prof` (`IDPROF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tranche` FOREIGN KEY (`TRANCHE`) REFERENCES `heure` (`TRANCHE`),
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`NIVEAU`) REFERENCES `niveau` (`NIVEAU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
