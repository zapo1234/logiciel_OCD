-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 sep. 2021 à 09:16
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel_gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `activer_compte`
--

DROP TABLE IF EXISTS `activer_compte`;
CREATE TABLE IF NOT EXISTS `activer_compte` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bord_informations`
--

DROP TABLE IF EXISTS `bord_informations`;
CREATE TABLE IF NOT EXISTS `bord_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(60) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `type_logement` varchar(255) NOT NULL,
  `dat` date NOT NULL,
  `chambre` varchar(60) NOT NULL,
  `check_in` varchar(10) NOT NULL,
  `check_out` varchar(10) NOT NULL,
  `time1` time NOT NULL,
  `time2` time NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `montant` varchar(18) NOT NULL,
  `mode` tinyint(2) NOT NULL,
  `mont_restant` varchar(18) NOT NULL,
  `encaisser` varchar(18) NOT NULL,
  `rete_payer` varchar(20) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
  `type` varchar(40) NOT NULL,
  `code` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `id_fact` (`id_fact`),
  KEY `id_chambre` (`id_chambre`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=911 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(11) NOT NULL,
  `chambre` varchar(60) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `type_logement` varchar(30) NOT NULL,
  `cout_nuite` varchar(18) NOT NULL,
  `cout_pass` varchar(18) NOT NULL,
  `occupant` tinyint(2) NOT NULL,
  `nombre_lits` tinyint(2) NOT NULL,
  `equipement` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `equipements` varchar(300) NOT NULL,
  `infos` varchar(400) NOT NULL,
  `icons` varchar(200) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `active` varchar(5) NOT NULL,
  `code` tinyint(4) NOT NULL,
  `society` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chambre` (`id_chambre`),
  KEY `email_ocd` (`email_ocd`),
  KEY `active` (`active`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `numero` varchar(14) NOT NULL,
  `adresse` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

DROP TABLE IF EXISTS `depense`;
CREATE TABLE IF NOT EXISTS `depense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(60) NOT NULL,
  `numero_facture` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `designation` varchar(150) NOT NULL,
  `fournisseur` varchar(120) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `nature` varchar(40) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `code` int(11) NOT NULL,
  `society` varchar(80) NOT NULL,
  `calls` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`status`),
  KEY `code` (`code`),
  KEY `fournisseur` (`fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `email_ocd`, `numero_facture`, `date`, `designation`, `fournisseur`, `user`, `nature`, `montant`, `status`, `code`, `society`, `calls`) VALUES
(86, 'zapomartial@yahoo.fr', '133440', '2021-09-23', 'cie sodeci', 'cie sodeci', 'kouame ange,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>kouame ange Ã  modifiÃ© le  01-09-2021Ã   09:33<span class=\"edit\"></span>,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>kouame ange Ã  modifiÃ© le  03-09-2021Ã   11:41<span class=\"edit\"></span>', 'dÃ©pense effectuÃ©e', '50000', 1, 0, '', ''),
(87, 'zapomartial@yahoo.fr', '', '2021-09-08', 'cie sodeci mariam', 'cie sodeci', 'tino tino tino, <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>tino tino tino Ã  payer la somme de 20000 xof  le  09-09-2021Ã   11:59 par   <span class=\"edit\"></span>', 'remboursement effectuÃ©', '0', 4, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(89, 'zapomartial@yahoo.fr', '', '2021-09-30', 'GIL', 'spdeci', 'tino tino tino,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>tino tino tino Ã  modifiÃ© le  09-09-2021Ã   11:55<span class=\"edit\"></span>,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>tino tino tino Ã  modifiÃ© le  09-09-2021Ã   11:59<span class=\"edit\"></span>,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>tino tino tino Ã  modifiÃ© le  09-09-2021Ã   11:59<span class=\"edit\"></span>, <i class=\"fas fa-exclamation-circle\" style=\"font-size:13px;color:#AB040E;\"></i> tino tino tino a  annulÃ© le  10-09-2021Ã   09:04</span>', 'dÃ©pense effectuÃ©e', '50009', 3, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(90, 'zapomartial@yahoo.fr', '', '2021-09-17', 'cie sodeci', 'cie sodeci', 'kouame kady terry,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>kouame kady terry Ã  modifiÃ© le  07-09-2021Ã   17:26<span class=\"edit\"></span>,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>kouame kady terry Ã  modifiÃ© le  07-09-2021Ã   17:27<span class=\"edit\"></span>, <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>kouame kady terry Ã  payer la somme de 20000 xof  le  07-09-2021Ã   17:27 par   <span class=\"edit\"></span>', 'remboursement effectuÃ©', '0', 4, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(91, 'zapomartial@yahoo.fr', '', '2021-09-17', 'zapo martial', 'bock 66 treichvill', 'kouame kady terry', 'dÃ©pense effectuÃ©', '100000', 1, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(92, 'zapomartial@yahoo.fr', '', '2021-09-23', 'zapo martial', 'bock 66 treichvill', 'kouame kady terry', 'dÃ©pense effectuÃ©', '200000', 1, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(93, 'zapomartial@yahoo.fr', '', '2021-09-22', '10 cassire de coca', 'bock 66 treichvill', 'kouame kady terry', 'dÃ©pense effectuÃ©', '230000', 1, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(94, 'zapomartial@yahoo.fr', '', '2021-09-23', 'zapo martial', 'bock 66 treichvill', 'kouame kady terry', 'dÃ©pense effectuÃ©', '300000', 1, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(95, 'zapomartial@yahoo.fr', '', '2021-09-30', '10 cassire de coca', 'bock 66 treichvill', 'kouame kady terry', 'crÃ©dit fournisseur', '40000', 2, 1, 'Hotel Baleine Yamssoukro', 'transmis par Hotel Baleine Yamssoukro'),
(99, 'zapomartial@yahoo.fr', '23444', '2021-09-24', 'zapo martial', 'bock 66 treichvill', 'tino tino tino', 'crÃ©dit fournisseur', '40000', 2, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(100, 'zapomartial@yahoo.fr', '23444', '2021-09-16', '10 casiers de sucrerie', '20939982', 'tino tino tino', 'dÃ©pense effectuÃ©', '20000', 1, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(101, 'zapomartial@yahoo.fr', '2392980', '2021-09-16', '10 casiers de sucrerie', 'bock 66 treichvill', 'tino tino tino, <i class=\"fas fa-exclamation-circle\" style=\"font-size:13px;color:#AB040E;\"></i> koubo alexis troure a  annulÃ© le  11-09-2021Ã   12:49</span>', 'dÃ©pense effectuÃ©', '30000', 3, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(102, 'zapomartial@yahoo.fr', '2392980', '2021-09-23', 'facture cie , sodeci', 'bock chill', 'tino tino tino, <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>koubo alexis troure Ã  payer la somme de 50000 xof  le  11-09-2021Ã   12:48 par   <span class=\"edit\"></span>', 'remboursement effectuÃ©', '0', 4, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(103, 'zapomartial@yahoo.fr', '', '2021-09-16', '10 cassire de coca', 'bock 66 treichvill', 'tino tino tino', 'dÃ©pense effectuÃ©', '20000', 1, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi'),
(105, 'zapomartial@yahoo.fr', '2309828', '2021-09-16', '10 casiers de sucrerie', 'bock 66 treichvill', 'koubo alexis troure, <i class=\"fas fa-exclamation-circle\" style=\"font-size:13px;color:#AB040E;\"></i> koubo alexis troure a  annulÃ© le  11-09-2021Ã   12:42</span>', 'crÃ©dit fournisseur', '300000', 3, 2, 'Hotel baleine Abidjan vridi', 'transmis par Hotel baleine Abidjan vridi');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `civilite` varchar(150) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `time` time NOT NULL,
  `time1` time NOT NULL,
  `nombre` tinyint(3) NOT NULL,
  `email_client` varchar(60) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `user` varchar(1500) NOT NULL,
  `clients` varchar(100) NOT NULL,
  `piece_identite` varchar(150) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `avance` varchar(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `montant_repas` varchar(18) NOT NULL,
  `tva` varchar(3) DEFAULT NULL,
  `mont_tva` varchar(18) NOT NULL,
  `remise` varchar(18) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
  `type` varchar(4) NOT NULL,
  `moyen_paiement` varchar(200) NOT NULL,
  `data_montant` varchar(100) NOT NULL,
  `types` varchar(30) NOT NULL,
  `code` tinyint(3) NOT NULL,
  `society` varchar(80) NOT NULL,
  `calls` varchar(120) NOT NULL,
  `search_date` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`moyen_paiement`),
  KEY `code` (`code`),
  KEY `id_fact` (`id_fact`) USING BTREE,
  KEY `search_date` (`search_date`)
) ENGINE=MyISAM AUTO_INCREMENT=473 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `home_occupation`
--

DROP TABLE IF EXISTS `home_occupation`;
CREATE TABLE IF NOT EXISTS `home_occupation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(10) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `date` varchar(800) NOT NULL,
  `date_french` varchar(800) NOT NULL,
  `dates` varchar(800) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `code` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chambre` (`id_chambre`) USING BTREE,
  KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `type` (`type`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=788 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messanger`
--

DROP TABLE IF EXISTS `messanger`;
CREATE TABLE IF NOT EXISTS `messanger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(60) NOT NULL,
  `name` varchar(80) NOT NULL,
  `permission` varchar(60) NOT NULL,
  `message` varchar(300) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `moyen_tresorie`
--

DROP TABLE IF EXISTS `moyen_tresorie`;
CREATE TABLE IF NOT EXISTS `moyen_tresorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `montant1` varchar(18) NOT NULL,
  `montant2` varchar(18) NOT NULL,
  `montant3` varchar(18) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fact` (`id_fact`),
  KEY `code` (`code`),
  KEY `date` (`date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `new_message`
--

DROP TABLE IF EXISTS `new_message`;
CREATE TABLE IF NOT EXISTS `new_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(70) NOT NULL,
  `email_user` varchar(70) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `email_user` (`email_user`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo_chambre`
--

DROP TABLE IF EXISTS `photo_chambre`;
CREATE TABLE IF NOT EXISTS `photo_chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `name_upload` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `id_chambre` (`id_chambre`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tresorie_customer`
--

DROP TABLE IF EXISTS `tresorie_customer`;
CREATE TABLE IF NOT EXISTS `tresorie_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(50) NOT NULL,
  `reservation` int(18) NOT NULL,
  `encaisse` bigint(18) NOT NULL,
  `depense` bigint(18) NOT NULL,
  `montant` bigint(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `code` tinyint(4) NOT NULL,
  `society` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `email_ocd` (`email_ocd`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_customer`
--

INSERT INTO `tresorie_customer` (`id`, `email_ocd`, `reservation`, `encaisse`, `depense`, `montant`, `reste`, `code`, `society`) VALUES
(2, 'souame@yahoo.fr', 0, 1452300, 261000, 0, '11000', 0, ''),
(3, 'souame@yahoo.fr', 0, 1079300, 261000, 0, '11000', 1, ''),
(4, 'zapomartial@yahoo.fr', 0, -212400, 1220000, 0, '0', 1, 'Hotel Baleine Yamssoukro'),
(5, 'zapomartial@yahoo.fr', -100000, -9640, 0, 0, '-395100', 2, 'Hotel baleine Abidjan vridi');

-- --------------------------------------------------------

--
-- Structure de la table `tresorie_user`
--

DROP TABLE IF EXISTS `tresorie_user`;
CREATE TABLE IF NOT EXISTS `tresorie_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `user_gestionnaire` varchar(60) NOT NULL,
  `entree` bigint(18) NOT NULL,
  `sorties` bigint(18) NOT NULL,
  `reservation` bigint(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `code` tinyint(4) NOT NULL,
  `society` varchar(80) NOT NULL,
  `calls` varchar(120) NOT NULL,
  `moyen_paiement` varchar(800) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `facture`
--
ALTER TABLE `facture` ADD FULLTEXT KEY `clients` (`clients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
