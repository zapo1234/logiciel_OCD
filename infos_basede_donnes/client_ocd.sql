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
-- Base de données :  `client_ocd`
--

-- --------------------------------------------------------

--
-- Structure de la table `activer_compte`
--

DROP TABLE IF EXISTS `activer_compte`;
CREATE TABLE IF NOT EXISTS `activer_compte` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_ocd` (`email_ocd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_client`
--

DROP TABLE IF EXISTS `inscription_client`;
CREATE TABLE IF NOT EXISTS `inscription_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ocd` varchar(60) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `denomination` varchar(100) NOT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `numero_cci` varchar(30) DEFAULT NULL,
  `id_entreprise` varchar(60) DEFAULT NULL,
  `user` varchar(150) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `numero1` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `categories` varchar(60) DEFAULT NULL,
  `numero_compte` varchar(30) NOT NULL,
  `code` tinyint(3) NOT NULL,
  `society` varchar(120) NOT NULL,
  `date` varchar(40) NOT NULL,
  `heure` time NOT NULL,
  `etat` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `active` varchar(5) NOT NULL,
  `logo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_user` (`email_user`),
  KEY `password` (`password`),
  KEY `email_ocd` (`email_ocd`) USING BTREE,
  KEY `permission` (`permission`),
  KEY `active` (`active`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription_client`
--

INSERT INTO `inscription_client` (`id`, `email_ocd`, `email_user`, `denomination`, `adresse`, `numero_cci`, `id_entreprise`, `user`, `numero`, `numero1`, `password`, `permission`, `categories`, `numero_compte`, `code`, `society`, `date`, `heure`, `etat`, `status`, `active`, `logo`) VALUES
(6, 'souame@yahoo.fr', 'souame@yahoo.fr', 'Hotel Assovon', '', '', '', 'zapo martial', '0022597338899', '', 'test', 'user:boss', 'Responsable', '', 0, '', 'Lun 13 Septembre 2021', '09:11:00', '', 2, 'on', '9198224.png'),
(21, 'zapomartial@yahoo.fr', 'zapomartial@yahoo.fr', 'hotel', '', '', '', 'kouame ange', '0383840399', '', 'test', 'user:boss', NULL, '', 0, '', 'Lun 13 Septembre 2021', '09:11:00', '', 2, 'on', '7563599.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
