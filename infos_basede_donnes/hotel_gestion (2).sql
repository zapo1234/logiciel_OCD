-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 mai 2021 à 10:05
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
  `occupant` tinyint(3) NOT NULL,
  `dat` date NOT NULL,
  `dat1` varchar(10) NOT NULL,
  `piece_nature` varchar(100) NOT NULL,
  `chambre` varchar(20) NOT NULL,
  `check_in` varchar(10) NOT NULL,
  `check_out` varchar(10) NOT NULL,
  `date1` date NOT NULL,
  `date2` date NOT NULL,
  `time` time NOT NULL,
  `time1` time NOT NULL,
  `montant` bigint(18) NOT NULL,
  `repas` varchar(25) NOT NULL,
  `mode` char(2) NOT NULL,
  `mont_restant` varchar(18) NOT NULL,
  `encaisser` varchar(18) NOT NULL,
  `rete_payer` varchar(20) NOT NULL,
  `nbrs_jour` varchar(4) NOT NULL,
  `nbrs_heure` varchar(4) NOT NULL,
  `nombre_jours` tinyint(2) NOT NULL,
  `nombre_heures` tinyint(2) NOT NULL,
  `id_fact` varchar(10) NOT NULL,
  `num_choix` smallint(5) NOT NULL,
  `type` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `id_fact` (`id_fact`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bord_informations`
--

INSERT INTO `bord_informations` (`id`, `email_ocd`, `id_chambre`, `occupant`, `dat`, `dat1`, `piece_nature`, `chambre`, `check_in`, `check_out`, `date1`, `date2`, `time`, `time1`, `montant`, `repas`, `mode`, `mont_restant`, `encaisser`, `rete_payer`, `nbrs_jour`, `nbrs_heure`, `nombre_jours`, `nombre_heures`, `id_fact`, `num_choix`, `type`) VALUES
(21, 'souame@yahoo.fr', 2513027, 1, '2021-05-13', '2021-05-13', 'CNI 984736363', '2513027', '2021-05-23', '2021-05-30', '2021-05-23', '2021-05-30', '14:36:00', '14:36:00', 184000, 'sans', '1', '', '', '', '2300', '0', 0, 0, '0.0002', 3, '1'),
(19, 'souame@yahoo.fr', 12820, 3, '2021-05-13', '2021-05-13', 'CNI 984736363', '12820', '2021-05-23', '2021-05-30', '2021-05-23', '2021-05-30', '14:36:00', '14:36:00', 460000, 'sans', '1', '', '', '', '20', '0', 0, 0, '0.0002', 1, '1'),
(20, 'souame@yahoo.fr', 1968058, 3, '2021-05-13', '2021-05-13', 'CNI 984736363', '1968058', '2021-05-23', '2021-05-30', '2021-05-23', '2021-05-30', '14:36:00', '14:36:00', 46000, 'dejeuner', '1', '', '', '', '20', '0', 0, 0, '0.0002', 2, '1'),
(18, 'souame@yahoo.fr', 3896241, 2, '2021-05-13', '2021-05-13', 'CNI 984736363', '3896241', '2021-05-08', '2021-05-16', '2021-05-08', '2021-05-16', '14:32:00', '14:32:00', 24000, 'dejeuner', '1', '', '', '', '12', '0', 0, 0, '0.0001', 1, '1');

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
  `infos` varchar(100) NOT NULL,
  `icons` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chambre` (`id_chambre`),
  KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `id_chambre`, `chambre`, `email_ocd`, `type_logement`, `cout_nuite`, `cout_pass`, `occupant`, `nombre_lits`, `equipement`, `equipements`, `infos`, `icons`) VALUES
(223, 6015058, 'chambre A-10', 'souame@yahoo.fr', 'chambre triple', '12000', '0', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>');

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
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `email_ocd`, `date`, `designation`, `fournisseur`, `nature`, `montant`) VALUES
(1, 'souame@yahoo.fr', '2021-04-16', 'zapo', 'zapo', 'crÃ©dit fournisseur', 19000),
(2, 'souame@yahoo.fr', '2021-04-23', 'zapo', 'zapo', 'crÃ©dit fournisseur', 11000);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `email_client` varchar(60) NOT NULL,
  `numero` bigint(14) NOT NULL,
  `user` varchar(50) NOT NULL,
  `clients` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `infos_type` varchar(30) NOT NULL,
  `montant` int(18) NOT NULL,
  `avance` bigint(18) NOT NULL,
  `reste` bigint(18) NOT NULL,
  `tva` tinyint(2) NOT NULL,
  `id_fact` decimal(5,4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_ocd` (`email_ocd`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `email_ocd`, `check_in`, `check_out`, `email_client`, `numero`, `user`, `clients`, `description`, `infos_type`, `montant`, `avance`, `reste`, `tva`, `id_fact`, `type`, `status`) VALUES
(12, '2021-05-13', 'souame@yahoo.fr', '2021-05-08', '2021-05-16', 'zapomartial@yahoo.fr', 96544323, 'Mr Kouassi', 'zapo martial', '2021-05-13', 'SÃ©jour', 24000, 0, 0, 20, '0.0001', '1', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_chambre`
--

INSERT INTO `photo_chambre` (`id`, `id_chambre`, `email_ocd`, `name_upload`) VALUES
(164, 7877194, 'souame@yahoo.fr', '3445805.jpg'),
(163, 4724519, 'souame@yahoo.fr', '4633753.jpg');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_customer`
--

INSERT INTO `tresorie_customer` (`id`, `email_ocd`, `reservation`, `encaisse`, `depense`, `montant`) VALUES
(1, 'souame@yahoo.fr', 26434, 396624, 0, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_user`
--

INSERT INTO `tresorie_user` (`id`, `date`, `email_ocd`, `user_gestionnaire`, `entree`, `sorties`, `reservation`) VALUES
(1, '2021-05-06', 'souame@yahoo.fr', 'test', 0, 30000, 0),
(2, '2021-05-08', 'souame@yahoo.fr', 'Mr Kouassi', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
