-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 juil. 2021 à 18:29
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
  `id_fact` varchar(10) NOT NULL,
  `type` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `id_fact` (`id_fact`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=548 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bord_informations`
--

INSERT INTO `bord_informations` (`id`, `email_ocd`, `id_chambre`, `type_logement`, `dat`, `chambre`, `check_in`, `check_out`, `time1`, `time2`, `date1`, `date2`, `montant`, `mode`, `mont_restant`, `encaisser`, `rete_payer`, `id_fact`, `type`) VALUES
(547, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-07-20', 'chambre A-13', '2021-07-09', '2021-07-10', '07:01:00', '07:01:00', '2021-07-09', '2021-07-10', '4000', 1, '', '', '', '0.0004', 'client facturÃ©'),
(543, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-07-08', 'chambre B-11', '2021-07-09', '2021-07-18', '10:14:00', '10:14:00', '2021-07-09', '2021-07-18', '10000', 1, '', '', '', '0.0002', 'client facturÃ©'),
(544, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-07-08', 'chambre 12C', '2021-07-09', '2021-07-17', '07:00:00', '07:00:00', '2021-07-09', '2021-07-17', '5000', 3, '', '', '', '0.0003', 'rÃ©servation client'),
(545, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-07-08', 'chambre D-10', '2021-07-09', '2021-07-17', '07:00:00', '07:00:00', '2021-07-09', '2021-07-17', '12000', 3, '', '', '', '0.0003', 'rÃ©servation client'),
(539, 'souame@yahoo.fr', 5185462, 'chambre triple', '2021-07-14', 'appartement A5', '2021-07-10', '2021-07-11', '18:03:00', '18:03:00', '2021-07-10', '2021-07-11', '10000', 1, '0', '', '', '0.0001', 'client facturÃ©'),
(546, 'souame@yahoo.fr', 5630844, 'chambre triple', '2021-07-20', 'chambre B-11', '2021-07-09', '2021-07-10', '07:01:00', '07:01:00', '2021-07-09', '2021-07-10', '4000', 1, '', '', '', '0.0004', 'client facturÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(11) NOT NULL,
  `chambre` varchar(40) NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chambre` (`id_chambre`),
  KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `id_chambre`, `chambre`, `email_ocd`, `type_logement`, `cout_nuite`, `cout_pass`, `occupant`, `nombre_lits`, `equipement`, `equipements`, `infos`, `icons`, `type`) VALUES
(247, 5786785, 'chambre 12C', 'souame@yahoo.fr', 'chambre double', '14000', '5000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, prise prÃ¨s de lit, espace pour pc, portant, papier toillete', 'chambre double pour 2 personne avec un sÃ©jour infÃ©rieur Ã  19 jours', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(248, 9987670, 'chambre D-10', 'souame@yahoo.fr', 'sutdio double', '30000', '12000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, tÃ©lephone, machine Ã  laver, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(249, 5185462, 'appartement A5', 'souame@yahoo.fr', 'chambre triple', '15000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision', 'toilletes, armoie ou penderie, baignoire ou douche, tÃ©lephone, sÃ©che cheveux, petit cafÃ©', 'Dieu acomplira sa mission pour ma regularisation exceptionnel de 3 ans d\'ici fin juillet et surtout un CDI avant le 10 juillet , je prendrai 3 jours de jeune d\'ici le mardi 29 , mercredi 30 , jeudi 31 , Gloire lui reviendra Amen', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(250, 4890064, 'appartement B4', 'souame@yahoo.fr', 'sutdio double', '40000', '22000', 3, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 8),
(245, 6949311, 'chambre B-11', 'souame@yahoo.fr', 'chambre standard', '200000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, portant, baignoire ou douche, tÃ©lephone, microonde, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(244, 9697235, 'chambre A-13', 'souame@yahoo.fr', 'chambre twin', '3', '4000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(241, 6757594, 'chambre 10', 'souame@yahoo.fr', '', '1', '4', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(242, 5630844, 'chambre B-11', 'souame@yahoo.fr', 'chambre triple', '20000', '4000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, prise prÃ¨s de lit, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(243, 1293662, 'appartement A1', 'souame@yahoo.fr', '', '40000', '15000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, machine Ã  laver, papier toillete, sÃ©che cheveux', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0),
(251, 9568450, 'chambre A-10', 'souame@yahoo.fr', 'chambre double', '30000', '10000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, portant, baignoire ou douche, tÃ©lephone, microonde, fer Ã  repasser, rÃ©frigÃ©rateur, machine Ã  laver, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', 'Dieu acomplira sa mission pour ma regularisation exceptionnel de 3 ans d\'ici fin juillet et surtout un CDI avant le 10 juillet , je prendrai 3 .', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 2);

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
  `fournisseur` varchar(60) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `nature` varchar(40) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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
  `user` varchar(1000) NOT NULL,
  `clients` varchar(60) NOT NULL,
  `piece_identite` varchar(150) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `avance` varchar(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `montant_repas` varchar(18) NOT NULL,
  `tva` varchar(3) DEFAULT NULL,
  `mont_tva` varchar(18) NOT NULL,
  `id_fact` decimal(5,4) NOT NULL,
  `type` varchar(4) NOT NULL,
  `moyen_paiement` varchar(200) NOT NULL,
  `data_montant` varchar(100) NOT NULL,
  `types` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`moyen_paiement`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `civilite`, `email_ocd`, `adresse`, `check_in`, `check_out`, `time`, `time1`, `nombre`, `email_client`, `numero`, `user`, `clients`, `piece_identite`, `montant`, `avance`, `reste`, `montant_repas`, `tva`, `mont_tva`, `id_fact`, `type`, `moyen_paiement`, `data_montant`, `types`) VALUES
(284, '2021-07-08', 'sans', 'souame@yahoo.fr', '', '2021-07-09', '2021-07-18', '10:14:00', '10:14:00', 9, 'default@gmail.com', '093838373', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  08/07/2021 Ã  10:14  par  Mr Kouassi,<i class=\"fas fa-exclamation-circle\" style=\"font-size:13px;color:#AB040E;\"></i>  annulÃ©e le  06-07-2021Ã   16:47 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>Mr Kouassi</span>', 'DOUHORET ACHILLE', 'CNI 09383838', '90000', '0', '90000', '0', '', '0', '0.0002', '4', ' , , , ', '0,0,0,0', 'facture annulÃ©'),
(285, '2021-07-08', 'sans', 'souame@yahoo.fr', '', '2021-07-09', '2021-07-17', '07:00:00', '07:00:00', 8, 'default@gmail.com', '093287272', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  08/07/2021 Ã  07:00  par  Mr Kouassi', 'DOUHORET ACHILLE', 'CNI 09383838', '136000', '', '', '0', '', '0', '0.0003', '3', ' , , , ', '0,0,0,0', 'rÃ©servation client'),
(286, '2021-07-20', 'sans', 'souame@yahoo.fr', '', '2021-07-09', '2021-07-10', '07:01:00', '07:01:00', 1, 'default@gmail.com', '0292827722', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  20/07/2021 Ã  07:01  par  Mr Kouassi', 'zapo martial', 'CNI 09383838', '9440', '', '', '0', '18', '1440.00', '0.0004', '1', 'espÃ©ces :10000 xof,Carte Bancaire :5000 xof, , ', '10000,5000,0,0', 'client facturÃ©'),
(283, '2021-07-14', 'sans', 'souame@yahoo.fr', '', '2021-07-10', '2021-07-11', '18:07:00', '18:07:00', 1, 'default@gmail.com', '098765554', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  14/07/2021 Ã  18:00  par  Mr Kouassi,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  03-07-2021Ã   18:01 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>Mr Kouassi</span>,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  03-07-2021Ã   18:03 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>Mr Kouassi</span>,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  03-07-2021Ã   18:03 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>Mr Kouassi</span>,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  03-07-2021Ã   18:07 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>Mr Kouassi</span>', 'DOUHORET ACHILLE', 'CNI 09383838', '11800', '18000', '-6200', '0', '18', '1800', '0.0001', '1', ' , , , ', '0,0,0,0', 'client facturÃ©');

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
  `id_fact` varchar(10) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chambre` (`id_chambre`) USING BTREE,
  KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=409 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `home_occupation`
--

INSERT INTO `home_occupation` (`id`, `id_chambre`, `email_ocd`, `date`, `date_french`, `dates`, `id_fact`, `type`) VALUES
(407, 5630844, 'souame@yahoo.fr', '2021-07-09,2021-07-10', '09-07-2021,10-07-2021', '', '0.0004', 1),
(400, 5185462, 'souame@yahoo.fr', '2021-07-10,2021-07-11', '', '', '0.0001', 0),
(406, 9987670, 'souame@yahoo.fr', '2021-07-09,2021-07-10,2021-07-11,2021-07-12,2021-07-13,2021-07-14,2021-07-15,2021-07-16,2021-07-17', '09-07-2021,10-07-2021,11-07-2021,12-07-2021,13-07-2021,14-07-2021,15-07-2021,16-07-2021,17-07-2021', '', '0.0003', 3),
(405, 5786785, 'souame@yahoo.fr', '2021-07-09,2021-07-10,2021-07-11,2021-07-12,2021-07-13,2021-07-14,2021-07-15,2021-07-16,2021-07-17', '09-07-2021,10-07-2021,11-07-2021,12-07-2021,13-07-2021,14-07-2021,15-07-2021,16-07-2021,17-07-2021', '', '0.0003', 3),
(404, 6949311, 'souame@yahoo.fr', '2021-07-09,2021-07-10,2021-07-11,2021-07-12,2021-07-13,2021-07-14,2021-07-15,2021-07-16,2021-07-17,2021-07-18', '09-07-2021,10-07-2021,11-07-2021,12-07-2021,13-07-2021,14-07-2021,15-07-2021,16-07-2021,17-07-2021,18-07-2021', '', '0.0002', 1),
(408, 9697235, 'souame@yahoo.fr', '2021-07-09,2021-07-10', '09-07-2021,10-07-2021', '', '0.0004', 1);

-- --------------------------------------------------------

--
-- Structure de la table `moyen_tresorie`
--

DROP TABLE IF EXISTS `moyen_tresorie`;
CREATE TABLE IF NOT EXISTS `moyen_tresorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(60) NOT NULL,
  `id_fact` varchar(10) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `montant1` varchar(18) NOT NULL,
  `montant2` varchar(18) NOT NULL,
  `montant3` varchar(18) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fact` (`id_fact`),
  KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_chambre`
--

INSERT INTO `photo_chambre` (`id`, `id_chambre`, `email_ocd`, `name_upload`) VALUES
(190, 9568450, 'souame@yahoo.fr', '3307819.jpg'),
(189, 9568450, 'souame@yahoo.fr', '6068315.jpg'),
(188, 9568450, 'souame@yahoo.fr', '1926773.jpg');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_customer`
--

INSERT INTO `tresorie_customer` (`id`, `email_ocd`, `reservation`, `encaisse`, `depense`, `montant`, `reste`) VALUES
(2, 'souame@yahoo.fr', 0, 145440, 0, 0, '0');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_user`
--

INSERT INTO `tresorie_user` (`id`, `date`, `email_ocd`, `user_gestionnaire`, `entree`, `sorties`, `reservation`, `reste`) VALUES
(85, '2021-07-22', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '66080'),
(84, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', -2520, 0, 0, '0'),
(83, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 18360, 0, 0, '0'),
(82, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 9720, 0, 0, '0'),
(81, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 3060, 0, 0, '0'),
(80, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', 3060, 0, 0, '0'),
(79, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', -96000, 0, 0, '0'),
(78, '2021-07-05', 'souame@yahoo.fr', 'Mr Kouassi', 43740, 0, 0, '0'),
(77, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', 9160, 0, 0, '0'),
(76, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 60666, 0, 10000, '41000'),
(75, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 27028, 0, 65001, '25719'),
(74, '2021-07-15', 'souame@yahoo.fr', 'Mr Kouassi', 1105666, 0, 270000, '742880'),
(73, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 166790, 0, 100000, '35520'),
(72, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 42560, 0, 171000, '145040'),
(71, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', -800, 0, 60600, '17200'),
(70, '2021-07-12', 'souame@yahoo.fr', 'Mr Kouassi', 2520, 0, 30000, '6520'),
(86, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 21280, 0, 0, '0'),
(87, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 21240, 0, 0, '0'),
(88, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', -84960, 0, 0, '0'),
(89, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', 75520, 0, 0, '0'),
(90, '2021-07-06', 'souame@yahoo.fr', 'Mr Kouassi', 240720, 0, 0, '0'),
(91, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', -99120, 0, 0, '0'),
(92, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 127440, 0, 0, '0'),
(93, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 173460, 0, 0, '0'),
(94, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', -95580, 0, 0, '0'),
(95, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 14160, 0, 30000, '39620'),
(96, '2021-07-14', 'souame@yahoo.fr', 'Mr Kouassi', 12980, 150000, 0, '0'),
(97, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 130980, 0, 103500, '555880'),
(98, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', -42480, 0, 0, '0'),
(99, '2021-07-13', 'souame@yahoo.fr', 'Mr Kouassi', 400880, 0, 10145000, '-9700120'),
(100, '2021-07-07', 'souame@yahoo.fr', 'Mr Kouassi', 130760, 0, 63000, '146820'),
(101, '2021-07-20', 'souame@yahoo.fr', 'Mr Kouassi', -47200, 0, -72000, '-51040');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
