-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Décembre 2016 à 20:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `centre_appel`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE IF NOT EXISTS `adresses` (
  `idAdresse` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `App` varchar(16) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `country` varchar(100) NOT NULL,
  PRIMARY KEY (`idClient`,`numero`,`street`,`App`,`ville`,`province`,`postalCode`,`country`),
  UNIQUE KEY `adresse` (`idAdresse`),
  UNIQUE KEY `idClient` (`idClient`,`numero`,`street`,`App`,`ville`,`province`,`postalCode`,`country`),
  KEY `idClient_2` (`idClient`,`numero`,`street`,`App`,`ville`,`province`,`postalCode`,`country`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=173 ;

-- --------------------------------------------------------

--
-- Structure de la table `appel`
--

CREATE TABLE IF NOT EXISTS `appel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `Note` varchar(250) NOT NULL,
  `reponse` varchar(250) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `dateTimeAppel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `appel` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `name`) VALUES
(1, 'Internet'),
(2, 'TV'),
(3, 'Mobile'),
(4, 'T&eacute;l&eacute;phone residentiel');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=314 ;

-- --------------------------------------------------------

--
-- Structure de la table `clientproduit`
--

CREATE TABLE IF NOT EXISTS `clientproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idClient`,`idProduit`),
  UNIQUE KEY `client_produit` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

-- --------------------------------------------------------

--
-- Structure de la table `contactinfo`
--

CREATE TABLE IF NOT EXISTS `contactinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idClient` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `contenue` varchar(100) NOT NULL,
  `preferred` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: Type de contact',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contenue` (`contenue`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=393 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `Bureau` varchar(10) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `country` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logoPath` varchar(100) NOT NULL,
  PRIMARY KEY (`idEntreprise`),
  UNIQUE KEY `entreprise` (`idEntreprise`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `name`, `number`, `street`, `city`, `Bureau`, `province`, `postalCode`, `country`, `telephone`, `email`, `logoPath`) VALUES
(1, 'Bell canada', 101, 'Boulevard Robert-Bourassa', 'Montr&eacute;al', '', 'Qu&eacute;bec ', 'H1S1M8', 'Canada', '514-227-4647', 'info@bell.ca', 'images/logo.png');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `idfaq` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`idfaq`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`idfaq`, `idCategorie`, `question`, `reponse`) VALUES
(18, 1, '&Agrave; quelle vitesse dois-je m&rsquo;attendre avec vos forfaits?', 'La vitesse diff&egrave;re selon le forfait choisi. Par exemple si vous optez pour le DUO extr&ecirc;me vous allez recevoir 20 Mbits en amont et 10 Mbits en aval, toute fois, la vitesse de transfert ne peut &ecirc;tre garanti suite &agrave; plusieurs facteurs : le c&acirc;blage, le mat&eacute;riel et bien s&ucirc;r votre ordinateur et sa configuration.pour ajouter de l&rsquo;utilisation ou pour g&eacute;rer vos avis.'),
(20, 1, 'J&rsquo;ai rat&eacute; mon rendez-vous de branchement, est ce que je pourrai avoir un autre?', 'Oui selon les disponibilit&eacute;s. Pri&egrave;re d&rsquo;appeler le service &agrave; la client&egrave;le au 514-227-4647 pour programmer un nouveau rendez-vous.'),
(19, 1, 'Le technicien vient de passer pour l&rsquo;installation et je n&rsquo;ai pas d&rsquo;&eacute;quipements, que dois-je faire?', 'D&rsquo;habitude, vous devez passer r&eacute;cup&eacute;rer votre kit 48h avant le passage du technicien si vous avez choisi l&rsquo;option &laquo; Sur Place &raquo;, &agrave; d&eacute;faut, vous pouvez passer juste apr&egrave;s le passage du technicien pour r&eacute;cup&eacute;rer votre Kit.'),
(21, 4, 'J&rsquo;ai d&eacute;j&agrave; un num&eacute;ro de t&eacute;l&eacute;phone avec mon fournisseur actuel, est-ce que je peux le garder avec Bell?', 'Oui, Bravo T&eacute;l&eacute;com vous offre le transfert de votre num&eacute;ro de t&eacute;l&eacute;phone gratuitement. &Agrave; condition que votre num&eacute;ro actuel soit toujours actif avec votre fournisseur de t&eacute;l&eacute;phone lors de la date du transfert.'),
(22, 4, 'Quel est le d&eacute;lai minimal pour un transfert de num&eacute;ro de t&eacute;l&eacute;phone vers Bravo Telecom?', 'Le d&eacute;lai minimal est de 5 jours ouvrables.'),
(23, 4, 'Comment puis-je faire des appels outre-mer?', 'Bravo T&eacute;l&eacute;com vous offre selon les forfaits &agrave; partir de 200min gratuites par mois d&rsquo;appel longue distance. Pour les appels outre-mer, vous devez vous procurer une carte d&rsquo;appel compatible avec la t&eacute;l&eacute;phonie IP, nous vous conseillons les marques Fona ou Ultra.'),
(24, 3, 'Comment installer la Cl&eacute; Internet mobile lors de la premi&egrave;re utilisation?', 'Une fois votre ordinateur en fonction, branchez votre Cl&eacute; Internet mobile sur l&rsquo;interface USB de l&rsquo;ordinateur. Le syst&egrave;me d&rsquo;exploitation devrait d&eacute;tecter et reconna&icirc;tre automatiquement le nouveau mat&eacute;riel. L&rsquo;assistant d&rsquo;installation d&eacute;marrera et vous devrez alors suivre les consignes d&rsquo;installations. &Agrave; la fin de l&rsquo;installation, une ic&ocirc;ne de raccourci du gestionnaire de connexion s&rsquo;affichera sur le bureau de votre ordinateur.'),
(25, 3, 'Le programme d&rsquo;ex&eacute;cution automatique ne r&eacute;pond pas. Que faire?', 'Si le programme d&rsquo;ex&eacute;cution automatique ne r&eacute;pond pas, cherchez le fichier AutoRun.exe dans le r&eacute;pertoire du lecteur Internet mobile (allez dans Poste de travail et ouvrez le lecteur Internet mobile). Ensuite, double-cliquez sur AutoRun.exe pour lancer le programme.'),
(26, 3, 'O&ugrave; puis-je utiliser ma Cl&eacute; Internet mobile?', 'Le r&eacute;seau de Vid&eacute;otron vous offre une couverture sur une grande partie de la province. De plus, avec notre d&eacute;ploiement progressif, vous verrez de nouveaux territoires s&rsquo;ajouter chaque mois. Pour en savoir plus, nous vous invitons &agrave; consulter notre site Web pour suivre l&rsquo;&eacute;volution de notre couverture.'),
(27, 2, 'Mon terminal illico ne r&eacute;pond pas, ou mon t&eacute;l&eacute;viseur pr&eacute;sente un &eacute;cran noir, bleu, flou ou enneig&eacute;. Que faire?', 'Assurez-vous que votre terminal est bien allum&eacute;.'),
(28, 2, 'Puis-je brancher plusieurs t&eacute;&eacute;viseurs sur un seul terminal illico?', 'Oui. Cependant, pour ce type de branchement, vous ne pouvez &ecirc;tre assist&eacute; par un conseiller en ligne ou un technicien sur la route. Vous devez donc vous r&eacute;f&eacute;rer &agrave; votre repr&eacute;sentant pour une solution personnalis&eacute;e.'),
(29, 2, 'Mon terminal illico affiche le message suivant : &laquo; Non autoris&eacute;. Pour vous abonner, veuillez appeler le num&eacute;ro &agrave; l''&eacute;cran &raquo;. Pourquoi?', 'Il est possible que la cha&icirc;ne que vous avez choisie ne soit pas incluse dans votre forfait.');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `idCategorie` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photoPath` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(9,2) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `idCategorie`, `title`, `photoPath`, `description`, `prix`) VALUES
(1, 1, 'Internet Cable 5', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '45.00'),
(2, 4, 'T&eacute;l&eacute;phone Performance', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '20.00'),
(3, 4, 'T&eacute;l&eacute;phone Libert&eacute;', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '30.00'),
(4, 2, 'Bell fibre TV', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '49.00'),
(5, 1, 'Internet Fibre', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '49.00'),
(6, 1, 'Internet hybrid', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '48.00'),
(7, 1, 'Internet Extra Fibre', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '98.99'),
(9, 2, 'TV Arabe', '', 'd&eacute;al pour passer des appels t&eacute;l&eacute;phoniques, consulter vos courriels et surfer sur le web a un prix tres abordable. ', '99.99');

-- --------------------------------------------------------

--
-- Structure de la table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `idProvince` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`idProvince`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `provinces`
--

INSERT INTO `provinces` (`idProvince`, `name`) VALUES
(1, 'Alberta'),
(2, 'Colombie britannique'),
(3, 'ile-du-Prince-&eacute;douard'),
(4, 'Manitoba'),
(5, 'Nouveau-Brunswick'),
(6, 'Nouvelle-&eacute;cosse'),
(7, 'Ontario'),
(8, 'Qu&eacute;bec'),
(9, 'Saskatchewan'),
(10, 'Terre-Neuve-et-Labrador'),
(11, 'Nunavut'),
(12, 'Territoires du Nord-Ouest'),
(13, 'Yukon');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`iduser`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Mohamed', 'Aboub', 'king', 'king'),
(2, 'Djamel', 'Aboub', 'vilo', 'vilo'),
(3, 'raphael', 'Ronald', 'admin', 'admin'),
(4, 'mohamed', 'mohamed', 'alo', 'c90e32d1e617ff4cb0ebd4789ded7ed10981a5e7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
