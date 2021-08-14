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
  `numero` varchar(20) NOT NULL,
  `numero1` varchar(18) NOT NULL,
  `password` varchar(200) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `categories` varchar(60) NOT NULL,
  `numero_compte` varchar(30) NOT NULL,
  `code` tinyint(3) NOT NULL,
  `society` varchar(60) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription_client`
--

INSERT INTO `inscription_client` (`id`, `email_ocd`, `email_user`, `denomination`, `adresse`, `numero_cci`, `id_entreprise`, `user`, `numero`, `numero1`, `password`, `permission`, `categories`, `numero_compte`, `code`, `society`, `date`, `heure`, `etat`, `status`, `active`, `logo`) VALUES
(6, 'souame@yahoo.fr', 'souame@yahoo.fr', 'Hotel Assovon', '', '', '', 'zapo martial', '0022597338899', '', 'test', 'user:boss', 'Responsable', '', 0, '', 'Sam 14 AoÃ»t 2021', '20:43:00', 'connecte', 2, 'on', '9198224.png'),
(17, 'souame@yahoo.fr', 'douhoret@yahoo.fr', 'Hotel Assovon', '', '', '', 'douhoret tiero achille', '0383727262', '0383727262', 'test', 'user:employes', 'Receptionniste', '', 0, '', 'Dim 08 AoÃ»t 2021', '17:55:00', '', 4, 'on', '4043607.png'),
(18, 'souame@yahoo.fr', 'phlippe@gmail.com', 'Hotel Assovon', '', '', '', 'kouame yao philipe', '049887336362', '049887336362', '$2y$12$hWh0P.PIla5E9RJPFJ34.OMHffh7h.M8UEOgyKXPq1MN8MgQB2oqG', 'user:gestionnaire', 'Gestionnaire', '', 0, '', 'Lun 09 AoÃ»t 2021', '18:01:00', '', 3, 'on', '9198224.png'),
(16, 'souame@yahoo.fr', 'emmanuel@yahoo.fr', 'Hotel Assovon', '', '', '', 'kouame adou franck', '033333309', '033333309', '$2y$12$0XkGVxrNp6ZwpJ5hWeZr2.TS4N3HEWUyAWjHXxWgf30M4DtWnQBzu', 'user:gestionnaire', 'Gestionnaire', '', 0, '', 'Sam 31 Juillet 2021', '13:01:00', '', 3, 'on', '4043607.png'),
(19, 'souame@yahoo.fr', 'koua@yahoo.fr', 'Hotel Assovon', '', '', '', 'kouame kady marc', '0734938222', '0734938222', '$2y$12$RgG1Oxkt29NJ2yl9elfKDO51Llj1T2.dVuAMFMw0Nq.rh5CoQUH2y', 'user:gestionnaire', 'Gestionnaire', '', 1, 'Vridi Home 3 Ã©toiles', 'Sam 14 AoÃ»t 2021', '21:14:00', '', 3, 'off', '9198224.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
