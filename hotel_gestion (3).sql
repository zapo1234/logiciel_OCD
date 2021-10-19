-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 13 juin 2021 à 10:50
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
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bord_informations`
--

INSERT INTO `bord_informations` (`id`, `email_ocd`, `id_chambre`, `type_logement`, `dat`, `chambre`, `check_in`, `check_out`, `time1`, `time2`, `date1`, `date2`, `montant`, `mode`, `mont_restant`, `encaisser`, `rete_payer`, `id_fact`, `type`) VALUES
(176, 'souame@yahoo.fr', 6757594, '', '2021-06-10', 'chambre 10', '2021-06-11', '2021-06-13', '14:03:00', '14:03:00', '2021-06-11', '2021-06-13', '1', 1, '', '', '', '0.0014', 'client facturÃ©'),
(175, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-10', 'chambre B-11', '2021-06-11', '2021-06-13', '14:03:00', '14:03:00', '2021-06-11', '2021-06-13', '2', 1, '', '', '', '0.0014', 'client facturÃ©'),
(174, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-30', 'chambre B-11', '2021-06-07', '2021-06-07', '16:36:00', '19:36:00', '2021-06-07', '2021-06-07', '1000', 2, '', '', '', '0.0013', 'horaire client'),
(173, 'souame@yahoo.fr', 6757594, '', '2021-06-30', 'chambre 10', '2021-06-07', '2021-06-07', '16:36:00', '19:36:00', '2021-06-07', '2021-06-07', '4', 2, '', '', '', '0.0013', 'horaire client'),
(172, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-09', 'chambre B-11', '2021-06-07', '2021-06-07', '16:36:00', '19:36:00', '2021-06-07', '2021-06-07', '1000', 2, '', '', '', '0.0009', 'horaire client'),
(171, 'souame@yahoo.fr', 6757594, '', '2021-06-09', 'chambre 10', '2021-06-07', '2021-06-07', '16:36:00', '19:36:00', '2021-06-07', '2021-06-07', '4', 2, '', '', '', '0.0009', 'horaire client'),
(166, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-24', 'chambre 12C', '2021-06-07', '2021-06-07', '11:30:00', '13:34:00', '2021-06-07', '2021-06-07', '5000', 2, '', '', '', '0.0005', 'horaire client'),
(167, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-24', 'chambre D-10', '2021-06-07', '2021-06-07', '11:30:00', '13:34:00', '2021-06-07', '2021-06-07', '12000', 2, '', '', '', '0.0005', 'horaire client'),
(168, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-10', 'chambre A-15', '2021-06-07', '2021-06-07', '15:21:00', '16:21:00', '2021-06-07', '2021-06-07', '1000', 2, '', '', '', '0.0006', 'horaire client'),
(169, 'souame@yahoo.fr', 6757594, '', '2021-06-10', 'chambre 10', '2021-06-07', '2021-06-07', '15:21:00', '16:21:00', '2021-06-07', '2021-06-07', '4', 2, '', '', '', '0.0006', 'horaire client'),
(170, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-10', 'chambre B-11', '2021-06-03', '2021-06-05', '11:44:00', '11:44:00', '2021-06-03', '2021-06-05', '1000', 1, '', '', '', '0.0007', 'client facturÃ©'),
(165, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-06-03', 'chambre A-13', '2021-06-09', '2021-06-12', '11:37:00', '11:37:00', '2021-06-09', '2021-06-12', '3', 1, '', '', '', '0.0002', 'client facturÃ©'),
(164, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-03', 'chambre D-10', '2021-06-09', '2021-06-12', '11:36:00', '11:36:00', '2021-06-09', '2021-06-12', '30000', 1, '', '', '', '0.0001', 'client facturÃ©'),
(163, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-03', 'chambre 12C', '2021-06-09', '2021-06-12', '11:36:00', '11:36:00', '2021-06-09', '2021-06-12', '14000', 1, '', '', '', '0.0001', 'client facturÃ©'),
(177, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-10', 'chambre A-15', '2021-06-10', '2021-06-13', '19:00:00', '19:00:00', '2021-06-10', '2021-06-13', '30000', 1, '', '', '', '0.0015', 'client facturÃ©'),
(178, 'souame@yahoo.fr', 1293662, '', '2021-06-10', 'appartement A1', '2021-06-10', '2021-06-13', '19:00:00', '19:00:00', '2021-06-10', '2021-06-13', '40000', 1, '', '', '', '0.0015', 'client facturÃ©'),
(179, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-10', 'chambre B-11', '2021-06-20', '2021-06-21', '19:25:00', '19:25:00', '2021-06-20', '2021-06-21', '2', 1, '', '', '', '0.0016', 'client facturÃ©'),
(180, 'souame@yahoo.fr', 5630844, 'chambre triple', '2021-06-24', 'chambre B-11', '2021-06-09', '2021-06-12', '16:09:00', '16:09:00', '2021-06-09', '2021-06-12', '20000', 1, '', '', '', '0.0017', 'client facturÃ©'),
(181, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-10', 'chambre 12C', '2021-07-22', '2021-07-25', '17:54:00', '17:54:00', '2021-07-22', '2021-07-25', '14000', 1, '', '', '', '0.0018', 'client facturÃ©'),
(182, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-11', 'chambre 12C', '2021-07-04', '2021-07-10', '18:33:00', '18:33:00', '2021-07-04', '2021-07-10', '14000', 1, '', '', '', '0.0019', 'client facturÃ©'),
(183, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-11', 'chambre D-10', '2021-07-04', '2021-07-10', '18:33:00', '18:33:00', '2021-07-04', '2021-07-10', '30000', 1, '', '', '', '0.0019', 'client facturÃ©'),
(184, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-09', 'chambre A-15', '2021-06-27', '2021-06-29', '18:40:00', '18:40:00', '2021-06-27', '2021-06-29', '30000', 1, '', '', '', '0.002', 'client facturÃ©'),
(185, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-09', 'chambre B-11', '2021-06-27', '2021-06-29', '18:40:00', '18:40:00', '2021-06-27', '2021-06-29', '2', 1, '', '', '', '0.002', 'client facturÃ©'),
(186, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-11', 'chambre 12C', '2021-06-13', '2021-06-27', '18:45:00', '18:45:00', '2021-06-13', '2021-06-27', '14000', 1, '', '', '', '0.0021', 'client facturÃ©'),
(187, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-11', 'chambre D-10', '2021-06-13', '2021-06-27', '18:45:00', '18:45:00', '2021-06-13', '2021-06-27', '30000', 1, '', '', '', '0.0021', 'client facturÃ©'),
(188, 'souame@yahoo.fr', 6757594, '', '2021-06-09', 'chambre 10', '2021-06-20', '2021-06-27', '18:52:00', '18:52:00', '2021-06-20', '2021-06-27', '1', 1, '', '', '', '0.0022', 'client facturÃ©'),
(189, 'souame@yahoo.fr', 5630844, 'chambre triple', '2021-06-09', 'chambre B-11', '2021-06-27', '2021-06-30', '18:57:00', '18:57:00', '2021-06-27', '2021-06-30', '20000', 1, '', '', '', '0.0023', 'client facturÃ©'),
(190, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-10', 'chambre 12C', '2021-07-20', '2021-07-29', '19:01:00', '19:01:00', '2021-07-20', '2021-07-29', '14000', 3, '', '', '', '0.0024', 'rÃ©servation client'),
(191, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-10', 'chambre D-10', '2021-07-20', '2021-07-29', '19:01:00', '19:01:00', '2021-07-20', '2021-07-29', '30000', 3, '', '', '', '0.0024', 'rÃ©servation client'),
(192, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-16', 'chambre A-15', '2021-06-20', '2021-06-21', '19:04:00', '19:04:00', '2021-06-20', '2021-06-21', '30000', 1, '', '', '', '0.0025', 'client facturÃ©'),
(193, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-09', 'chambre B-11', '2021-07-24', '2021-07-25', '19:07:00', '19:07:00', '2021-07-24', '2021-07-25', '2', 1, '', '', '', '0.0026', 'client facturÃ©'),
(194, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-09', 'chambre A-15', '2021-07-25', '2021-07-30', '19:25:00', '19:25:00', '2021-07-25', '2021-07-30', '30000', 1, '', '', '', '0.0027', 'client facturÃ©'),
(195, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-06-09', 'chambre A-13', '2021-06-26', '2021-06-27', '19:52:00', '19:52:00', '2021-06-26', '2021-06-27', '3', 1, '', '', '', '0.0028', 'client facturÃ©'),
(196, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-06-11', 'chambre A-13', '2021-07-23', '2021-07-25', '19:54:00', '19:54:00', '2021-07-23', '2021-07-25', '3', 3, '', '', '', '0.0029', 'rÃ©servation client'),
(197, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-06-09', 'chambre A-13', '2021-06-10', '2021-06-10', '01:34:00', '02:37:00', '2021-06-10', '2021-06-10', '3', 2, '', '', '', '0.0001', 'horaire client'),
(198, 'souame@yahoo.fr', 5630844, 'chambre triple', '2021-06-09', 'chambre B-11', '2021-06-10', '2021-06-10', '01:34:00', '02:37:00', '2021-06-10', '2021-06-10', '20000', 2, '', '', '', '0.0001', 'horaire client'),
(199, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-09', 'chambre 12C', '2021-06-29', '2021-06-30', '08:46:00', '08:46:00', '2021-06-29', '2021-06-30', '14000', 3, '', '', '', '0.0002', 'rÃ©servation client'),
(200, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-09', 'chambre D-10', '2021-06-29', '2021-06-30', '08:46:00', '08:46:00', '2021-06-29', '2021-06-30', '30000', 3, '', '', '', '0.0002', 'rÃ©servation client'),
(201, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-09', 'chambre 12C', '2021-06-30', '2021-07-02', '08:51:00', '08:51:00', '2021-06-30', '2021-07-02', '14000', 1, '', '', '', '0.0002', 'client facturÃ©'),
(202, 'souame@yahoo.fr', 9987670, 'sutdio double', '2021-06-09', 'chambre D-10', '2021-06-30', '2021-07-02', '08:51:00', '08:51:00', '2021-06-30', '2021-07-02', '30000', 1, '', '', '', '0.0002', 'client facturÃ©'),
(203, 'souame@yahoo.fr', 6949311, 'chambre standard', '2021-06-09', 'chambre B-11', '2021-06-30', '2021-07-02', '08:51:00', '08:51:00', '2021-06-30', '2021-07-02', '2', 1, '', '', '', '0.0002', 'client facturÃ©'),
(204, 'souame@yahoo.fr', 1293662, '', '2021-06-16', 'appartement A1', '2021-06-27', '2021-06-30', '08:52:00', '08:52:00', '2021-06-27', '2021-06-30', '40000', 3, '118000', '2000', '118000', '0.0003', 'rÃ©servation client'),
(205, 'souame@yahoo.fr', 5786785, 'chambre double', '2021-06-15', 'chambre 12C', '2021-07-11', '2021-07-13', '08:54:00', '08:54:00', '2021-07-11', '2021-07-13', '14000', 1, '', '', '', '0.0004', 'client facturÃ©'),
(206, 'souame@yahoo.fr', 6757594, '', '2021-06-15', 'chambre 10', '2021-07-11', '2021-07-13', '08:54:00', '08:54:00', '2021-07-11', '2021-07-13', '1', 1, '', '', '', '0.0004', 'client facturÃ©'),
(207, 'souame@yahoo.fr', 5630844, 'chambre triple', '2021-06-03', 'chambre B-11', '2021-07-24', '2021-07-30', '08:58:00', '08:58:00', '2021-07-24', '2021-07-30', '20000', 1, '', '', '', '0.0004', 'client facturÃ©'),
(208, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-09', 'chambre A-15', '2021-06-24', '2021-06-25', '10:15:00', '10:15:00', '2021-06-24', '2021-06-25', '30000', 1, '230000', '', '', '0.0005', 'client facturÃ©'),
(209, 'souame@yahoo.fr', 9697235, 'chambre twin', '2021-06-09', 'chambre A-13', '2021-06-24', '2021-06-25', '10:15:00', '10:15:00', '2021-06-24', '2021-06-25', '3', 1, '230000', '', '', '0.0005', 'client facturÃ©'),
(210, 'souame@yahoo.fr', 6757594, '', '2021-06-09', 'chambre 10', '2021-07-21', '2021-07-24', '09:53:00', '09:53:00', '2021-07-21', '2021-07-24', '1', 3, '', '', '', '0.0006', 'rÃ©servation client'),
(211, 'souame@yahoo.fr', 8274360, 'studio double', '2021-06-09', 'chambre A-15', '2021-07-21', '2021-07-24', '09:53:00', '09:53:00', '2021-07-21', '2021-07-24', '30000', 3, '', '', '', '0.0006', 'rÃ©servation client');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chambre` (`id_chambre`),
  KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `id_chambre`, `chambre`, `email_ocd`, `type_logement`, `cout_nuite`, `cout_pass`, `occupant`, `nombre_lits`, `equipement`, `equipements`, `infos`, `icons`) VALUES
(247, 5786785, 'chambre 12C', 'souame@yahoo.fr', 'chambre double', '14000', '5000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, prise prÃ¨s de lit, espace pour pc, portant, papier toillete', 'chambre double pour 2 personne avec un sÃ©jour infÃ©rieur Ã  19 jours', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(248, 9987670, 'chambre D-10', 'souame@yahoo.fr', 'sutdio double', '30000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, machine Ã  laver, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(245, 6949311, 'chambre B-11', 'souame@yahoo.fr', 'chambre standard', '2', '1000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(246, 8274360, 'chambre A-15', 'souame@yahoo.fr', 'studio double', '30000', '1000', 1, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(244, 9697235, 'chambre A-13', 'souame@yahoo.fr', 'chambre twin', '3', '4000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(241, 6757594, 'chambre 10', 'souame@yahoo.fr', '', '1', '4', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(242, 5630844, 'chambre B-11', 'souame@yahoo.fr', 'chambre triple', '20000', '4000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, prise prÃ¨s de lit, tÃ©lephone, microonde, rÃ©frigÃ©rateur, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>'),
(243, 1293662, 'appartement A1', 'souame@yahoo.fr', '', '40000', '15000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, portant, baignoire ou douche, tÃ©lephone, machine Ã  laver, papier toillete, sÃ©che cheveux', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>');

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
  `date` date NOT NULL,
  `designation` varchar(120) NOT NULL,
  `fournisseur` varchar(60) NOT NULL,
  `nature` varchar(40) NOT NULL,
  `montant` int(18) NOT NULL,
  `status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `email_ocd`, `date`, `designation`, `fournisseur`, `nature`, `montant`, `status`) VALUES
(1, 'souame@yahoo.fr', '2021-04-16', 'zapo', 'zapo', 'crÃ©dit fournisseur', 19000, 0),
(2, 'souame@yahoo.fr', '2021-04-23', 'zapo', 'zapo', 'crÃ©dit fournisseur', 11000, 0),
(3, 'souame@yahoo.fr', '2021-05-05', 'zapo', 'zapo', 'dÃ©pense effectuÃ©', 19000, 0);

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
  `user` varchar(50) NOT NULL,
  `clients` varchar(60) NOT NULL,
  `piece_identite` varchar(150) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `avance` varchar(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `montant_repas` varchar(18) NOT NULL,
  `tva` varchar(3) DEFAULT NULL,
  `id_fact` decimal(5,4) NOT NULL,
  `type` varchar(90) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `types` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_fact` (`id_fact`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `civilite`, `email_ocd`, `adresse`, `check_in`, `check_out`, `time`, `time1`, `nombre`, `email_client`, `numero`, `user`, `clients`, `piece_identite`, `montant`, `avance`, `reste`, `montant_repas`, `tva`, `id_fact`, `type`, `status`, `types`) VALUES
(161, '2021-06-09', 'sans', 'souame@yahoo.fr', '', '2021-06-10', '2021-06-10', '01:34:00', '02:37:00', 1, 'default@gmail.com', '50988766', 'Mr Kouassi', 'zapo martial', 'CNI 984736363', '280042', '', '', '0', '', '0.0001', '2', 0, ''),
(162, '2021-06-09', 'sans', 'souame@yahoo.fr', '', '2021-06-30', '2021-07-02', '08:51:00', '08:51:00', 2, 'default@gmail.com', '0987654444', 'Mr Kouassi', 'zapo martial', 'CNI 984736363', '123244.92', '', '', '15000', '23', '0.0002', '1', 0, 'client facturÃ©'),
(163, '2021-06-16', 'sans', 'souame@yahoo.fr', '36 rue de la pradelle', '2021-06-27', '2021-06-30', '08:52:00', '08:52:00', 3, 'default@gmail.com', '0998888', 'Mr Kouassi', 'zapo martial', 'CNI 984736363', '138000', '2000', '118000', '12000', '5', '0.0003', '3', 0, 'rÃ©servation client'),
(164, '2021-06-03', 'sans', 'souame@yahoo.fr', '', '2021-07-24', '2021-07-30', '08:58:00', '08:58:00', 6, 'default@gmail.com', '0988777676', 'Mr Kouassi', 'zapo martial', 'CNI 984736363', '84000', '', '', '', '', '0.0004', '1', 0, 'client facturÃ©'),
(165, '2021-06-09', 'sans', 'souame@yahoo.fr', '', '2021-06-24', '2021-06-25', '10:15:00', '10:15:00', 1, 'default@gmail.com', '098766544', 'Mr Kouassi', 'zapo martial', 'CNI 984736363', '36603.66', '3', '230000', '', '22', '0.0005', '1', 1, 'client facturÃ©'),
(166, '2021-06-09', 'sans', 'souame@yahoo.fr', '', '2021-07-21', '2021-07-24', '09:53:00', '09:53:00', 3, 'default@gmail.com', '08484884', 'Mr Kouassi', 'douhor tiero Achille', '09383838383', '90003', '', '', '', '', '0.0006', '3', 0, 'rÃ©servation client');

-- --------------------------------------------------------

--
-- Structure de la table `home_occupation`
--

DROP TABLE IF EXISTS `home_occupation`;
CREATE TABLE IF NOT EXISTS `home_occupation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chambre` int(10) NOT NULL,
  `date` varchar(800) NOT NULL,
  `dates` varchar(800) NOT NULL,
  `id_fact` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chambre` (`id_chambre`) USING BTREE,
  KEY `id_fact` (`id_fact`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `home_occupation`
--

INSERT INTO `home_occupation` (`id`, `id_chambre`, `date`, `dates`, `id_fact`) VALUES
(29, 9697235, '2021-06-09,2021-06-10,2021-06-11,2021-06-12', '', ''),
(28, 9987670, '2021-06-09,2021-06-10,2021-06-11,2021-06-12', '', ''),
(27, 5786785, '2021-06-09,2021-06-10,2021-06-11,2021-06-12', '', ''),
(37, 6757594, '16:36,19:36', '2021-06-30', ''),
(38, 6949311, '16:36,19:36', '2021-06-30', ''),
(39, 6949311, '2021-06-11,2021-06-12,2021-06-13', '', ''),
(40, 6757594, '2021-06-11,2021-06-12,2021-06-13', '', ''),
(41, 8274360, '2021-06-10,2021-06-11,2021-06-12,2021-06-13', '', ''),
(42, 1293662, '2021-06-10,2021-06-11,2021-06-12,2021-06-13', '', ''),
(43, 6949311, '2021-06-20,2021-06-21', '', ''),
(44, 5630844, '2021-06-09,2021-06-10,2021-06-11,2021-06-12', '', ''),
(45, 5786785, '2021-07-22,2021-07-23,2021-07-24,2021-07-25', '', ''),
(46, 5786785, '2021-07-04,2021-07-05,2021-07-06,2021-07-07,2021-07-08,2021-07-09,2021-07-10', '', ''),
(47, 9987670, '2021-07-04,2021-07-05,2021-07-06,2021-07-07,2021-07-08,2021-07-09,2021-07-10', '', ''),
(48, 8274360, '2021-06-27,2021-06-28,2021-06-29', '', ''),
(49, 6949311, '2021-06-27,2021-06-28,2021-06-29', '', ''),
(50, 5786785, '2021-06-13,2021-06-14,2021-06-15,2021-06-16,2021-06-17,2021-06-18,2021-06-19,2021-06-20,2021-06-21,2021-06-22,2021-06-23,2021-06-24,2021-06-25,2021-06-26,2021-06-27', '', ''),
(51, 9987670, '2021-06-13,2021-06-14,2021-06-15,2021-06-16,2021-06-17,2021-06-18,2021-06-19,2021-06-20,2021-06-21,2021-06-22,2021-06-23,2021-06-24,2021-06-25,2021-06-26,2021-06-27', '', ''),
(52, 6757594, '2021-06-20,2021-06-21,2021-06-22,2021-06-23,2021-06-24,2021-06-25,2021-06-26,2021-06-27', '', ''),
(53, 5630844, '2021-06-27,2021-06-28,2021-06-29,2021-06-30', '', ''),
(54, 5786785, '2021-07-20,2021-07-21,2021-07-22,2021-07-23,2021-07-24,2021-07-25,2021-07-26,2021-07-27,2021-07-28,2021-07-29', '', ''),
(55, 9987670, '2021-07-20,2021-07-21,2021-07-22,2021-07-23,2021-07-24,2021-07-25,2021-07-26,2021-07-27,2021-07-28,2021-07-29', '', ''),
(56, 8274360, '2021-06-20,2021-06-21', '', ''),
(57, 6949311, '2021-07-24,2021-07-25', '', ''),
(58, 8274360, '2021-07-25,2021-07-26,2021-07-27,2021-07-28,2021-07-29,2021-07-30', '', ''),
(59, 9697235, '2021-06-26,2021-06-27', '', ''),
(60, 9697235, '2021-07-23,2021-07-24,2021-07-25', '', ''),
(61, 9697235, '01:34,02:37', '2021-06-09', ''),
(62, 5630844, '01:34,02:37', '2021-06-09', ''),
(63, 5786785, '2021-06-29,2021-06-30', '', ''),
(64, 9987670, '2021-06-29,2021-06-30', '', ''),
(65, 5786785, '2021-06-30,2021-07-01,2021-07-02', '', ''),
(66, 9987670, '2021-06-30,2021-07-01,2021-07-02', '', ''),
(67, 6949311, '2021-06-30,2021-07-01,2021-07-02', '', ''),
(68, 1293662, '2021-06-27,2021-06-28,2021-06-29,2021-06-30', '', ''),
(69, 5786785, '2021-07-11,2021-07-12,2021-07-13', '', ''),
(70, 6757594, '2021-07-11,2021-07-12,2021-07-13', '', ''),
(71, 5630844, '2021-07-24,2021-07-25,2021-07-26,2021-07-27,2021-07-28,2021-07-29,2021-07-30', '', ''),
(72, 8274360, '2021-06-24,2021-06-25', '', ''),
(73, 9697235, '2021-06-24,2021-06-25', '', ''),
(74, 6757594, '2021-07-21,2021-07-22,2021-07-23,2021-07-24', '', ''),
(75, 8274360, '2021-07-21,2021-07-22,2021-07-23,2021-07-24', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_chambre`
--

INSERT INTO `photo_chambre` (`id`, `id_chambre`, `email_ocd`, `name_upload`) VALUES
(172, 5773776, 'souame@yahoo.fr', '7152254.jpg'),
(164, 7877194, 'souame@yahoo.fr', '3445805.jpg'),
(163, 4724519, 'souame@yahoo.fr', '4633753.jpg'),
(176, 510829, 'souame@yahoo.fr', '6399643.jpg'),
(177, 510829, 'souame@yahoo.fr', '4031851.jpg'),
(178, 510829, 'souame@yahoo.fr', '3052666.jpg'),
(184, 5786785, 'souame@yahoo.fr', '9557340.PNG'),
(183, 5786785, 'souame@yahoo.fr', '8611957.PNG'),
(181, 3432094, 'souame@yahoo.fr', '7467893.jpg'),
(182, 3432094, 'souame@yahoo.fr', '7200562.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_customer`
--

INSERT INTO `tresorie_customer` (`id`, `email_ocd`, `reservation`, `encaisse`, `depense`, `montant`, `reste`) VALUES
(1, 'souame@yahoo.fr', 0, 0, 0, 0, '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_user`
--

INSERT INTO `tresorie_user` (`id`, `date`, `email_ocd`, `user_gestionnaire`, `entree`, `sorties`, `reservation`, `reste`) VALUES
(56, '2021-06-09', 'souame@yahoo.fr', 'Mr Kouassi', 280042, 0, 0, '0'),
(55, '2021-06-09', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(54, '2021-06-09', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(53, '2021-06-09', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(52, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(51, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(50, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(49, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(48, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(47, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(46, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0, '0'),
(57, '2021-06-09', 'souame@yahoo.fr', 'Mr Kouassi', 345245, 0, 2000, '118000'),
(58, '2021-06-15', 'souame@yahoo.fr', 'Mr Kouassi', 126607, 0, 3, '230000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
