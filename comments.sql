-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 09 Juillet 2018 à 09:31
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` mediumint(9) NOT NULL,
  `news` smallint(6) NOT NULL,
  `auteur` varchar(50) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `news`, `auteur`, `contenu`, `date`, `report`) VALUES
(1, 2, 'Test1', 'Ceci est un test', '2018-05-13 16:00:23', 0),
(13, 11, 'Johnny', '<p>. In ha<em>c habitasse</em> platea dictumst.<span style="text-decoration: underline;"> Sed porta sagittis sapien et ornare. Nu</span>nc rutrum ultrices ultricies.</p>', '2018-06-07 20:14:13', 2),
(14, 10, 'Commentateur pas modéré', '<p>Ceci est un commentaire non mod&eacute;r&eacute;.</p>', '2018-06-13 18:40:23', 0),
(15, 10, 'Commentateur 2', '<p>Ceci est un commentaire signal&eacute; mais pas mod&eacute;r&eacute;.</p>', '2018-06-13 18:41:02', 1),
(16, 10, 'Commentateur 3', '<p>Ceci est un commentaire signal&eacute; et mod&eacute;r&eacute;.</p>', '2018-06-13 18:41:22', 2),
(17, 20, 'Test commentaire', 'Test commentaire', '2018-07-09 10:04:22', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
