-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 14 août 2021 à 21:45
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
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `id_fact` (`id_fact`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=725 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bord_informations`
--

INSERT INTO `bord_informations` (`id`, `email_ocd`, `id_chambre`, `type_logement`, `dat`, `chambre`, `check_in`, `check_out`, `time1`, `time2`, `date1`, `date2`, `montant`, `mode`, `mont_restant`, `encaisser`, `rete_payer`, `id_fact`, `type`) VALUES
(724, 'souame@yahoo.fr', 6880190, 'appartement meublÃ©', '2021-08-14', 'appartement 01 G', '2021-08-11', '2021-08-27', '10:48:00', '10:48:00', '2021-08-11', '2021-08-27', '15000', 1, '283200', '', '', '0.00008', 'client facturÃ©'),
(721, 'souame@yahoo.fr', 3534955, 'chambre triple', '2021-08-03', 'chambre B -05', '2021-08-19', '2021-08-28', '21:40:00', '21:40:00', '2021-08-19', '2021-08-28', '12000', 3, '', '', '', '0.00007', 'rÃ©servation client'),
(722, 'souame@yahoo.fr', 6874880, 'chambre triple', '2021-08-03', 'chambre D-09', '2021-08-19', '2021-08-28', '21:40:00', '21:40:00', '2021-08-19', '2021-08-28', '1500', 3, '', '', '', '0.00007', 'rÃ©servation client'),
(717, 'souame@yahoo.fr', 3998153, 'chambre single', '2021-08-11', 'chambre D-01', '2021-08-11', '2021-08-18', '20:29:00', '20:29:00', '2021-08-11', '2021-08-18', '5000', 3, '', '', '', '0.00005', 'rÃ©servation client'),
(718, 'souame@yahoo.fr', 6444951, 'chambre triple', '2021-08-11', 'chambre A -09', '2021-08-11', '2021-08-18', '20:29:00', '20:29:00', '2021-08-11', '2021-08-18', '12000', 3, '', '', '', '0.00005', 'rÃ©servation client'),
(719, 'souame@yahoo.fr', 2698490, 'sutdio double', '2021-08-17', 'appartement 01 C', '2021-08-18', '2021-08-28', '20:30:00', '20:30:00', '2021-08-18', '2021-08-28', '12000', 1, '', '', '', '0.00006', 'client facturÃ©'),
(720, 'souame@yahoo.fr', 3129515, 'chambre twin', '2021-08-17', 'appartement 01 B', '2021-08-18', '2021-08-28', '20:30:00', '20:30:00', '2021-08-18', '2021-08-28', '0', 1, '', '', '', '0.00006', 'client facturÃ©'),
(715, 'souame@yahoo.fr', 6444951, 'chambre triple', '2021-08-10', 'chambre A -09', '2021-08-13', '2021-08-13', '02:26:00', '03:26:00', '2021-08-13', '2021-08-13', '12000', 2, '', '', '', '0.00003', 'horaire client'),
(716, 'souame@yahoo.fr', 3998153, 'chambre single', '2021-08-17', 'chambre D-01', '2021-08-13', '2021-08-13', '03:27:00', '04:27:00', '2021-08-13', '2021-08-13', '5000', 2, '', '', '', '0.00004', 'horaire client'),
(713, 'souame@yahoo.fr', 6444951, 'chambre triple', '2021-08-11', 'chambre A -09', '2021-08-26', '2021-08-31', '20:25:00', '20:25:00', '2021-08-26', '2021-08-31', '12000', 1, '', '', '', '0.00002', 'client facturÃ©'),
(714, 'souame@yahoo.fr', 3129515, 'chambre twin', '2021-08-10', 'appartement 01 B', '2021-08-13', '2021-08-13', '02:26:00', '03:26:00', '2021-08-13', '2021-08-13', '0', 2, '', '', '', '0.00003', 'horaire client'),
(710, 'souame@yahoo.fr', 6216225, 'sutdio double', '2021-08-11', 'chambre D-02', '2021-08-11', '2021-08-20', '12:12:00', '12:12:00', '2021-08-11', '2021-08-20', '12000', 1, '', '', '', '0.00001', 'client facturÃ©'),
(711, 'souame@yahoo.fr', 4777870, 'chambre triple', '2021-08-13', 'chambre A -20', '2021-08-11', '2021-08-20', '12:20:00', '12:20:00', '2021-08-11', '2021-08-20', '5000', 1, '153000', '', '', '0.00001', 'client facturÃ©'),
(712, 'souame@yahoo.fr', 3998153, 'chambre single', '2021-08-11', 'chambre D-01', '2021-08-26', '2021-08-31', '20:25:00', '20:25:00', '2021-08-26', '2021-08-31', '5000', 1, '', '', '', '0.00002', 'client facturÃ©');

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
  `active` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chambre` (`id_chambre`),
  KEY `email_ocd` (`email_ocd`),
  KEY `active` (`active`)
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `id_chambre`, `chambre`, `email_ocd`, `type_logement`, `cout_nuite`, `cout_pass`, `occupant`, `nombre_lits`, `equipement`, `equipements`, `infos`, `icons`, `type`, `active`) VALUES
(261, 6216225, 'chambre D-02', 'souame@yahoo.fr', 'sutdio double', '20000', '12000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on'),
(260, 3998153, 'chambre D-01', 'souame@yahoo.fr', 'chambre single', '13000', '5000', 1, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 1, 'on'),
(257, 6444951, 'chambre A -09', 'souame@yahoo.fr', 'chambre triple', '15000', '12000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, baignoire ou douche, tÃ©lephone, microonde, fer Ã  repasser, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', 'Obtenez des codes de couleur HTML, HEX, valeurs RGB et HSL avec nos sÃ©lecteur de couleur, tableaux de couleur et des noms de couleur HTML. Allons-y!', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(258, 4777870, 'chambre A -20', 'souame@yahoo.fr', 'chambre triple', '20000', '5000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, microonde, rÃ©frigÃ©rateur, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(259, 8451107, 'chambre B -09', 'souame@yahoo.fr', 'chambre twin', '25000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'chaines satellite, prise prÃ¨s de lit, espace pour pc, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 4, 'off'),
(262, 655015, 'chambre D-04', 'souame@yahoo.fr', 'sutdio double', '12000', '5000', 1, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on'),
(263, 3129515, 'appartement 01 B', 'souame@yahoo.fr', 'chambre twin', '12000', '0', 1, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'chaines satellite, prise prÃ¨s de lit, espace pour pc, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 4, 'on'),
(264, 4909255, 'chambre B -10', 'souame@yahoo.fr', 'chambre triple', '50000', '10000', 3, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, espace pour pc, portant, tÃ©lephone, microonde, machine Ã  laver, sÃ©che cheveux, petit cafÃ©', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(265, 2698490, 'appartement 01 C', 'souame@yahoo.fr', 'sutdio double', '50000', '12000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on'),
(266, 8853331, 'chambre D-05', 'souame@yahoo.fr', 'studio double', '20000', '12000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'on'),
(267, 5667167, 'chambre A -10', 'souame@yahoo.fr', 'chambre standard', '30000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, chaines satellite, portant, baignoire ou douche, tÃ©lephone, microonde, papier toillete, petit cafÃ©', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 5, 'off'),
(268, 9007705, 'chambre B -14', 'souame@yahoo.fr', 'chambre double', '30000', '12000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 2, 'off'),
(269, 6880190, 'appartement 01 G', 'souame@yahoo.fr', 'appartement meublÃ©', '30000', '15000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, baignoire ou douche, tÃ©lephone, microonde, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 8, 'on'),
(270, 8972621, 'chambre A -11', 'souame@yahoo.fr', 'studio double', '50000', '20000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'on'),
(271, 6647666, 'chambre D-06', 'souame@yahoo.fr', 'studio double', '40000', '20000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'off'),
(272, 3083705, 'chambre D-09', 'souame@yahoo.fr', 'chambre twin', '40000', '15000', 3, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'armoie ou penderie, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 4, 'off'),
(273, 8448714, 'chambre B -12', 'souame@yahoo.fr', 'chambre standard', '30000', '20000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 5, 'on'),
(274, 3534955, 'chambre B -05', 'souame@yahoo.fr', 'chambre triple', '30000', '12000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(275, 6874880, 'chambre D-09', 'souame@yahoo.fr', 'chambre triple', '130000', '1500', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'armoie ou penderie, chaines satellite, prise prÃ¨s de lit, tÃ©lephone, microonde, rÃ©frigÃ©rateur, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(276, 9748787, 'chambre G -09', 'souame@yahoo.fr', 'chambre double', '50000', '15000', 2, 1, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant', '', '<i class=\"far fa-user\"></i>', 2, 'on'),
(277, 1530238, 'appartement B02', 'souame@yahoo.fr', 'appartement meublÃ©', '400000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision', 'toilletes, armoie ou penderie, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, machine Ã  laver, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 8, 'on'),
(283, 4840941, 'chambre D-04', 'souame@yahoo.fr', 'sutdio double', '20000', '15000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on'),
(278, 3775785, 'chambre B -10', 'souame@yahoo.fr', 'chambre standard', '22000', '12000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 5, 'on'),
(279, 8527413, 'chambre D-01', 'souame@yahoo.fr', 'sutdio double', '15000', '10000', 2, 3, '', '', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on'),
(280, 5371200, 'chambre B -12', 'souame@yahoo.fr', 'chambre triple', '120000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(281, 8038386, 'appartement D-07', 'souame@yahoo.fr', 'studio double', '15000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'armoie ou penderie, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, fer Ã  repasser, rÃ©frigÃ©rateur, machine Ã  laver, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'on'),
(282, 6944708, 'chambre E-01', 'souame@yahoo.fr', 'chambre triple', '15000', '5000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'off'),
(284, 6509969, 'chambre C-03', 'souame@yahoo.fr', 'chambre triple', '12000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, portant, baignoire ou douche, tÃ©lephone, microonde, papier toillete, sÃ©che cheveux, petit cafÃ©', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on'),
(285, 3575752, 'chambre E-01', 'souame@yahoo.fr', 'chambre standard', '12000', '4000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision', 'armoie ou penderie, portant, baignoire ou douche', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 5, 'on');

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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `email_ocd`, `numero_facture`, `date`, `designation`, `fournisseur`, `user`, `nature`, `montant`, `status`) VALUES
(46, 'souame@yahoo.fr', '3928282', '2021-08-12', 'rÃ©peration de porte chambre _02 , main d\'ouvre', 'djibril quncallerie', 'zapo martial,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial Ã  modifiÃ© le  10-08-2021Ã   10:20<span class=\"edit\"></span>', 'dÃ©pense effectuÃ©e', '25000', 1),
(47, 'souame@yahoo.fr', '34838', '2021-08-04', '10 casiers de sucrerie , bierre', 'depot spolibra vridi 202', 'zapo martial, <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial Ã  payer la somme de 100000 xof  le  10-08-2021Ã   10:21 par   <span class=\"edit\"></span>', 'crÃ©dit fournisseur', '20000', 2);

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
  `clients` varchar(60) NOT NULL,
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
  `code` tinyint(4) NOT NULL,
  `society` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`moyen_paiement`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `civilite`, `email_ocd`, `adresse`, `check_in`, `check_out`, `time`, `time1`, `nombre`, `email_client`, `numero`, `user`, `clients`, `piece_identite`, `montant`, `avance`, `reste`, `montant_repas`, `tva`, `mont_tva`, `remise`, `id_fact`, `type`, `moyen_paiement`, `data_montant`, `types`, `code`, `society`) VALUES
(363, '2021-08-13', 'sans', 'souame@yahoo.fr', '', '2021-08-11', '2021-08-20', '12:30:00', '12:30:00', 9, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  11/08/2021 Ã  12:12  par  zapo martial,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  13-08-2021Ã   12:20 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial</span>,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  13-08-2021Ã   12:30 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial</span>', 'Douhoret tiero achille', 'passeport 12390AF', '159000', '', '159000', '6000', '0', '0', '', '0.00001', '1', ' , , , ', '0,0,0,0', 'client facturÃ©', 0, ''),
(364, '2021-08-11', 'sans', 'souame@yahoo.fr', '', '2021-08-26', '2021-08-31', '20:25:00', '20:25:00', 5, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  11/08/2021 Ã  20:25  par  zapo martial', 'Douhoret tiero achille', 'passeport 12390AF', '85000', '', '', '0', '0', '0', '0', '0.00002', '1', ' , , , ', '0,0,0,0', 'client facturÃ©', 0, ''),
(365, '2021-08-10', 'sans', 'souame@yahoo.fr', '', '2021-08-13', '2021-08-13', '02:26:00', '03:26:00', 1, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  10/08/2021 Ã  20:26  par  zapo martial', 'Konan kouame', 'passeport 12390AF', '12000', '', '', '0', '0', '0', '0', '0.00003', '2', ' , , , ', '0,0,0,0', 'horaire client', 0, ''),
(366, '2021-08-17', 'sans', 'souame@yahoo.fr', '', '2021-08-13', '2021-08-13', '03:27:00', '04:27:00', 1, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  17/08/2021 Ã  20:28  par  zapo martial', 'Douhoret tiero achille', 'c 23456789', '5000', '', '', '0', '0', '0', '0', '0.00004', '2', ' , , , ', '0,0,0,0', 'horaire client', 0, ''),
(367, '2021-08-11', 'sans', 'souame@yahoo.fr', '', '2021-08-11', '2021-08-18', '20:29:00', '20:29:00', 7, 'default@gmail.com', '', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  11/08/2021 Ã  20:29  par  zapo martial', 'zapo martial', 'passeport 12390AF', '119000', '', '', '0', '0', '0', '0', '0.00005', '3', ' , , , ', '0,0,0,0', 'rÃ©servation client', 0, ''),
(368, '2021-08-17', 'sans', 'souame@yahoo.fr', '', '2021-08-18', '2021-08-28', '20:30:00', '20:30:00', 10, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  17/08/2021 Ã  20:30  par  zapo martial', 'Kouame konan ange', 'passeport 12390AF', '120000', '', '', '0', '0', '0', '0', '0.00006', '1', ' , , , ', '0,0,0,0', 'client facturÃ©', 0, ''),
(369, '2021-08-03', 'sans', 'souame@yahoo.fr', '', '2021-08-19', '2021-08-28', '21:40:00', '21:40:00', 9, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  03/08/2021 Ã  21:40  par  zapo martial', 'Kouame konan ange', 'passeport 12390AF', '121500', '', '', '0', '0', '0', '0', '0.00007', '3', ' , , , ', '0,0,0,0', 'rÃ©servation client', 0, ''),
(370, '2021-08-14', 'sans', 'souame@yahoo.fr', '', '2021-08-11', '2021-08-27', '10:49:00', '10:49:00', 16, 'default@gmail.com', '0022597338899', '<i class=\"fas fa-pen\"style=\"color:green;font-size:13px;\"></i> editÃ© le  10/08/2021 Ã  10:47  par  zapo martial,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  14-08-2021Ã   10:48 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial</span>,<i class=\"fas fa-list-alt\" style=\"font-size:13px;color:#66FF8F;\"></i>  modifiÃ© le  14-08-2021Ã   10:49 par   <span class=\"edit\"><i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial</span>', 'Kouame konan ange', 'passeport 12390AF', '283200', '0', '283200', '0', '18', '43200', '50000', '0.00008', '1', 'espÃ©ces :2400000xof, , , ', '2400000,0,0,0', 'client facturÃ©', 0, '');

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
  PRIMARY KEY (`id`),
  KEY `id_chambre` (`id_chambre`) USING BTREE,
  KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=597 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `home_occupation`
--

INSERT INTO `home_occupation` (`id`, `id_chambre`, `email_ocd`, `date`, `date_french`, `dates`, `id_fact`, `type`) VALUES
(596, 6880190, 'souame@yahoo.fr', '2021-08-11,2021-08-12,2021-08-13,2021-08-14,2021-08-15,2021-08-16,2021-08-17,2021-08-18,2021-08-19,2021-08-20,2021-08-21,2021-08-22,2021-08-23,2021-08-24,2021-08-25,2021-08-26,2021-08-27', '11-08-2021,12-08-2021,13-08-2021,14-08-2021,15-08-2021,16-08-2021,17-08-2021,18-08-2021,19-08-2021,20-08-2021,21-08-2021,22-08-2021,23-08-2021,24-08-2021,25-08-2021,26-08-2021,27-08-2021', '', '0.00008', 1),
(553, 3083705, 'souame@yahoo.fr', '', '', '', '0.00000', 5),
(556, 6944708, 'souame@yahoo.fr', '', '', '', '0.00000', 5),
(594, 6874880, 'souame@yahoo.fr', '2021-08-19,2021-08-20,2021-08-21,2021-08-22,2021-08-23,2021-08-24,2021-08-25,2021-08-26,2021-08-27,2021-08-28', '19-08-2021,20-08-2021,21-08-2021,22-08-2021,23-08-2021,24-08-2021,25-08-2021,26-08-2021,27-08-2021,28-08-2021', '', '0.00007', 3),
(582, 6216225, 'souame@yahoo.fr', '2021-08-11,2021-08-12,2021-08-13,2021-08-14,2021-08-15,2021-08-16,2021-08-17,2021-08-18,2021-08-19,2021-08-20', '11-08-2021,12-08-2021,13-08-2021,14-08-2021,15-08-2021,16-08-2021,17-08-2021,18-08-2021,19-08-2021,20-08-2021', '', '0.00001', 1),
(583, 4777870, 'souame@yahoo.fr', '2021-08-11,2021-08-12,2021-08-13,2021-08-14,2021-08-15,2021-08-16,2021-08-17,2021-08-18,2021-08-19,2021-08-20', '11-08-2021,12-08-2021,13-08-2021,14-08-2021,15-08-2021,16-08-2021,17-08-2021,18-08-2021,19-08-2021,20-08-2021', '', '0.00001', 1),
(584, 3998153, 'souame@yahoo.fr', '2021-08-26,2021-08-27,2021-08-28,2021-08-29,2021-08-30,2021-08-31', '26-08-2021,27-08-2021,28-08-2021,29-08-2021,30-08-2021,31-08-2021', '', '0.00002', 1),
(585, 6444951, 'souame@yahoo.fr', '2021-08-26,2021-08-27,2021-08-28,2021-08-29,2021-08-30,2021-08-31', '26-08-2021,27-08-2021,28-08-2021,29-08-2021,30-08-2021,31-08-2021', '', '0.00002', 1),
(586, 3129515, 'souame@yahoo.fr', '02:26,03:26', '02:26,03:26', '2021-08-10', '0.00003', 2),
(587, 6444951, 'souame@yahoo.fr', '02:26,03:26', '02:26,03:26', '2021-08-10', '0.00003', 2),
(588, 3998153, 'souame@yahoo.fr', '03:27,04:27', '03:27,04:27', '2021-08-17', '0.00004', 2),
(589, 3998153, 'souame@yahoo.fr', '2021-08-11,2021-08-12,2021-08-13,2021-08-14,2021-08-15,2021-08-16,2021-08-17,2021-08-18', '11-08-2021,12-08-2021,13-08-2021,14-08-2021,15-08-2021,16-08-2021,17-08-2021,18-08-2021', '', '0.00005', 3),
(590, 6444951, 'souame@yahoo.fr', '2021-08-11,2021-08-12,2021-08-13,2021-08-14,2021-08-15,2021-08-16,2021-08-17,2021-08-18', '11-08-2021,12-08-2021,13-08-2021,14-08-2021,15-08-2021,16-08-2021,17-08-2021,18-08-2021', '', '0.00005', 3),
(591, 2698490, 'souame@yahoo.fr', '2021-08-18,2021-08-19,2021-08-20,2021-08-21,2021-08-22,2021-08-23,2021-08-24,2021-08-25,2021-08-26,2021-08-27,2021-08-28', '18-08-2021,19-08-2021,20-08-2021,21-08-2021,22-08-2021,23-08-2021,24-08-2021,25-08-2021,26-08-2021,27-08-2021,28-08-2021', '', '0.00006', 1),
(592, 3129515, 'souame@yahoo.fr', '2021-08-18,2021-08-19,2021-08-20,2021-08-21,2021-08-22,2021-08-23,2021-08-24,2021-08-25,2021-08-26,2021-08-27,2021-08-28', '18-08-2021,19-08-2021,20-08-2021,21-08-2021,22-08-2021,23-08-2021,24-08-2021,25-08-2021,26-08-2021,27-08-2021,28-08-2021', '', '0.00006', 1),
(593, 3534955, 'souame@yahoo.fr', '2021-08-19,2021-08-20,2021-08-21,2021-08-22,2021-08-23,2021-08-24,2021-08-25,2021-08-26,2021-08-27,2021-08-28', '19-08-2021,20-08-2021,21-08-2021,22-08-2021,23-08-2021,24-08-2021,25-08-2021,26-08-2021,27-08-2021,28-08-2021', '', '0.00007', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messanger`
--

INSERT INTO `messanger` (`id`, `email_ocd`, `name`, `permission`, `message`, `email_user`, `date`, `heure`) VALUES
(109, 'souame@yahoo.fr', 'zapo martial', 'boss', 'ok', 'souame@yahoo.fr', '2021-08-13', '23:22:00'),
(107, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '16:36:00'),
(108, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '23:22:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `new_message`
--

INSERT INTO `new_message` (`id`, `email_ocd`, `email_user`, `name`) VALUES
(15, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(14, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(12, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(13, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(11, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(10, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(16, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(17, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(18, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(19, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(20, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(21, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(22, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(23, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(24, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(25, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(26, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(27, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(28, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(29, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(30, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(31, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(32, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(33, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(34, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(35, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(36, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(37, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(38, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial'),
(39, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo martial');

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
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_chambre`
--

INSERT INTO `photo_chambre` (`id`, `id_chambre`, `email_ocd`, `name_upload`) VALUES
(208, 3998153, 'souame@yahoo.fr', '2519173.PNG'),
(207, 3998153, 'souame@yahoo.fr', '1648320.PNG'),
(206, 8451107, 'souame@yahoo.fr', '8160839.PNG'),
(205, 8451107, 'souame@yahoo.fr', '4014139.PNG'),
(204, 4777870, 'souame@yahoo.fr', '992549.PNG'),
(203, 4777870, 'souame@yahoo.fr', '2202773.PNG'),
(200, 6444951, 'souame@yahoo.fr', '7864658.jpg'),
(201, 6444951, 'souame@yahoo.fr', '959671.jpg'),
(202, 6444951, 'souame@yahoo.fr', '6919704.jpg'),
(209, 6216225, 'souame@yahoo.fr', '4080756.PNG'),
(210, 6216225, 'souame@yahoo.fr', '2205383.PNG'),
(211, 6216225, 'souame@yahoo.fr', '2908237.PNG'),
(212, 3575752, 'souame@yahoo.fr', '9691747.jpg'),
(213, 3575752, 'souame@yahoo.fr', '6098973.jpg');

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
(2, 'souame@yahoo.fr', 0, 898700, 0, 0, '442200');

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
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_user`
--

INSERT INTO `tresorie_user` (`id`, `date`, `email_ocd`, `user_gestionnaire`, `entree`, `sorties`, `reservation`, `reste`) VALUES
(109, '2021-07-25', 'souame@yahoo.fr', 'zapo martial', 1067560, 100000, 15000, '-20000'),
(110, '2021-07-13', 'souame@yahoo.fr', 'zapo martial', 884000, 0, 0, '0'),
(111, '2021-07-12', 'souame@yahoo.fr', 'zapo martial', 0, 1000000, 0, '0'),
(112, '2021-07-13', 'souame@yahoo.fr', 'zapo martial', 0, 220000, 0, '0'),
(113, '2021-07-06', 'souame@yahoo.fr', 'zapo martial', -36000, 450000, 0, '0'),
(114, '2021-08-19', 'souame@yahoo.fr', 'zapo martial', 2099920, 0, 0, '0'),
(115, '2021-08-12', 'souame@yahoo.fr', 'zapo martial', 556700, 0, 70000, '282000'),
(116, '2021-08-10', 'souame@yahoo.fr', 'zapo martial', -141820, 0, 60000, '170880'),
(117, '2021-08-13', 'souame@yahoo.fr', 'zapo martial', 36000, 0, 0, '0'),
(118, '2021-08-11', 'souame@yahoo.fr', 'zapo martial', 348780, 550000, 0, '0'),
(119, '2021-08-09', 'souame@yahoo.fr', 'zapo martial', 537720, 145000, 30000, '666600');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
