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
  `adresse` varchar(150) NOT NULL,
  `numero_cci` varchar(30) NOT NULL,
  `id_entreprise` varchar(60) NOT NULL,
  `user` varchar(150) NOT NULL,
  `numero` bigint(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `categories` varchar(60) NOT NULL,
  `numero_compte` varchar(30) NOT NULL,
  `date` varchar(40) NOT NULL,
  `heure` time NOT NULL,
  `etat` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `logo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_user` (`email_user`),
  KEY `password` (`password`),
  KEY `email_ocd` (`email_ocd`) USING BTREE,
  KEY `permission` (`permission`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription_client`
--

INSERT INTO `inscription_client` (`id`, `email_ocd`, `email_user`, `denomination`, `adresse`, `numero_cci`, `id_entreprise`, `user`, `numero`, `password`, `permission`, `categories`, `numero_compte`, `date`, `heure`, `etat`, `status`, `logo`) VALUES
(1, 'souame@yahoo.fr', 'souame@yahoo.fr', 'zapo', '', '', '', 'Mr Kouassi', 9483737772, 'test', 'user:boss', '01', '', 'Vendr 09 Juillet 2021', '17:12:00', 'connecte', 0, 'zapo'),
(2, 'souame@yahoo.fr', 'kouame@yahoo.fr', 'zapo', '', '', '', 'zapo martial', 9484840928, 'zapo123za@', 'user:boos', 'Responsable', '', 'Vendr 09 Juillet 2021', '18:22:00', '', 2, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
