-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 16 Juillet 2018 à 16:57
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `news`, `auteur`, `contenu`, `date`, `report`) VALUES
(1, 2, 'Test1', 'Ceci est un test', '2018-05-13 16:00:23', 0),
(13, 11, 'Johnny', '<p>. In ha<em>c habitasse</em> platea dictumst.<span style="text-decoration: underline;"> Sed porta sagittis sapien et ornare. Nu</span>nc rutrum ultrices ultricies.</p>', '2018-06-07 20:14:13', 2),
(14, 10, 'Commentateur pas modéré', '<p>Ceci est un commentaire non mod&eacute;r&eacute;.</p>', '2018-06-13 18:40:23', 0),
(15, 10, 'Commentateur 2', '<p>Ceci est un commentaire signal&eacute; mais pas mod&eacute;r&eacute;.</p>', '2018-06-13 18:41:02', 1),
(16, 10, 'Commentateur 3', '<p>Ceci est un commentaire signal&eacute; et mod&eacute;r&eacute;.</p>', '2018-06-13 18:41:22', 2);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) NOT NULL,
  `auteur` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `chapitre` int(2) NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contenu` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime NOT NULL,
  `imgPath` text
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `chapitre`, `titre`, `contenu`, `dateAjout`, `dateModif`, `imgPath`) VALUES
(4, 'JForteroche', 1, 'Test tiny MCE', '<p>Eminuit autem inter humilia supergressa iam impotentia fines mediocrium delictorum nefanda Clematii cuiusdam Alexandrini nobilis mors repentina; cuius socrus cum misceri sibi generum, flagrans eius amore, non impetraret, ut ferebatur, per palatii pseudothyrum introducta, oblato pretioso reginae monili id adsecuta est, ut ad Honoratum tum comitem orientis formula missa letali omnino scelere nullo contactus idem Clematius nec hiscere nec loqui permissus occideretur.</p>\r\n<p>Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>', '2018-05-30 11:33:34', '2018-06-13 18:36:47', NULL),
(10, 'JForteroche', 1, 'Prologue', '<p>Cras libero purus, interdum non semper in, ornare ac enim. Vestibulum eleifend nunc in augue molestie porta. Praesent a odio volutpat eros posuere dictum sed eget nulla. Mauris vulputate vestibulum elit in ullamcorper. Cras velit ipsum, malesuada id posuere quis, fermentum et elit. Sed ut rhoncus velit, sed tempus sapien. Aliquam id turpis sed lectus mollis mattis.</p>', '2018-05-30 19:34:34', '2018-06-13 18:37:41', NULL),
(11, 'JForteroche', 2, 'Chapitre 2', '<div id="lipsum">\r\n<p>Vivamus dignissim molestie tortor sed gravida. In pellentesque quam enim, nec faucibus ante commodo a. Ut scelerisque sapien velit, vel semper lectus ullamcorper ac. Nunc pellentesque cursus dignissim. Vivamus sem neque, iaculis vel magna et, dapibus condimentum libero. In ut diam urna. Vivamus eu faucibus ipsum, sed consequat nibh.</p>\r\n<p>Pellentesque enim lorem, vehicula eu justo sit amet, iaculis consequat massa. Fusce nec mauris mi. Donec mattis augue non pretium hendrerit. Duis tempor erat eget sagittis tristique. Sed at rutrum risus. Duis vitae sapien venenatis, laoreet odio ac, imperdiet sapien. Etiam egestas odio nec dolor auctor feugiat. Pellentesque sagittis massa et pellentesque eleifend. Mauris suscipit ipsum purus, placerat vestibulum erat viverra non. Curabitur vel tristique lorem.</p>\r\n</div>', '2018-06-07 20:13:12', '2018-06-13 18:38:14', NULL),
(12, 'Admin', 2, 'J.Forteroche en dédicace', '<p>Donec viverra nulla nec dui vestibulum, vel eleifend sapien tristique. Integer consectetur fringilla pharetra. Suspendisse nec vestibulum metus, tincidunt accumsan felis. Ut mattis ante felis, pretium ultrices est lacinia a. Donec convallis odio ullamcorper, rhoncus felis vel, ornare dolor. Vivamus nibh nisi, dapibus quis nunc eget, ultricies tempor diam. Quisque a tincidunt ligula. In ultrices nunc sed lacinia placerat.</p>', '2018-06-07 20:20:47', '2018-06-13 18:38:51', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
