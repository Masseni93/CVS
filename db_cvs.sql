-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 jan. 2018 à 14:34
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_cvs`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeuses`
--

CREATE TABLE `codeuses` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `date_naissance` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `codeuses`
--

INSERT INTO `codeuses` (`id`, `nom`, `prenoms`, `date_naissance`, `photo`, `specialisation`, `email`, `telephone`, `mdp`, `description`) VALUES
(1, 'SYLLA', 'Masseni Coulibaly', '24/07/1993', 'FB_IMG_1510061762366.jpg', 'Codeuse', 'massenicoolsylla@gmail.com', '08226806', '3c31c4b82b302800e5c035225c51f6ba', 'MotivÃ©e, Dynamique, Polyvalente et Rigoureuse');

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `github` varchar(50) NOT NULL,
  `id_codeuse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`id`, `facebook`, `twitter`, `github`, `id_codeuse`) VALUES
(1, 'https://web.facebook.com/masseni.sylla.77', 'https://twitter.com/MasseniSylla', 'https://github.com/search?q=Masseni93&type=Users&u', 1);

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE `diplomes` (
  `id` int(11) NOT NULL,
  `annee_obtention` varchar(50) NOT NULL,
  `nom_diplome` varchar(50) NOT NULL,
  `ecole_obtention` varchar(50) NOT NULL,
  `id_codeuse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `annee_obtention`, `nom_diplome`, `ecole_obtention`, `id_codeuse`) VALUES
(1, '2017', 'Certificat d\'honneur de Huawei', 'Huawei Technologies', 1),
(2, '2016', 'Licence en RÃ©seaux et TÃ©lÃ©communications', 'Groupe Cerco', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_codeuse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `poste`, `date_debut`, `date_fin`, `entreprise`, `description`, `id_codeuse`) VALUES
(1, 'Stagiaire', '2017-09-16', '2018-01-20', 'SHEISTHECODE', 'Suivie de la formation sheisthecode', 1),
(2, 'Stagiaire', '2017-04-14', '2017-06-16', 'HUAWEI', 'Dans le cadre du programme Graine de l\'Avenir lancÃ© par le Gouvernement et HUAWEI Technologies, j\'ai bÃ©nÃ©ficiÃ© d\'un stage au DÃ©partement Achat de HUAWEI', 1),
(3, 'ConseillÃ¨re Communautaire', '2016-07-25', '2017-04-10', 'ONG IAHCI', 'J\'avais pour responsabilitÃ© de suivre des malades atteints de la tuberculose jusqu\'Ã  ce qu\'ils soient guÃ©ris', 1),
(4, 'Stagiaire', '2014-01-14', '2014-04-14', 'INTELSYS', 'Stagiaire au Service Informatique afin de soutenir mon diplÃ´me de Brevet de Technicien SupÃ©rieur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `interets`
--

CREATE TABLE `interets` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `id_codeuse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interets`
--

INSERT INTO `interets` (`id`, `titre`, `description`, `id_codeuse`) VALUES
(1, 'Sport', 'Football, Handball', 1),
(2, 'LittÃ©rature', 'Lecture', 1),
(3, 'Sciences', 'MathÃ©matique', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `codeuses`
--
ALTER TABLE `codeuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interets`
--
ALTER TABLE `interets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `codeuses`
--
ALTER TABLE `codeuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `interets`
--
ALTER TABLE `interets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
