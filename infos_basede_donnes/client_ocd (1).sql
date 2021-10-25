-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 25 oct. 2021 à 09:20
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `client_ocd`
--

-- --------------------------------------------------------

--
-- Structure de la table `activer_compte`
--

CREATE TABLE `activer_compte` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients_ocd`
--

CREATE TABLE `clients_ocd` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `option` varchar(30) NOT NULL,
  `montant` varchar(18) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_client`
--

CREATE TABLE `inscription_client` (
  `id` int(11) NOT NULL,
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
  `code` tinyint(2) NOT NULL,
  `society` varchar(60) NOT NULL,
  `societys` varchar(300) NOT NULL,
  `date` varchar(40) NOT NULL,
  `heure` time NOT NULL,
  `etat` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `active` varchar(5) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `id_visitor` varchar(200) NOT NULL,
  `token_pass` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription_client`
--

INSERT INTO `inscription_client` (`id`, `email_ocd`, `email_user`, `denomination`, `adresse`, `numero_cci`, `id_entreprise`, `user`, `numero`, `numero1`, `password`, `permission`, `categories`, `numero_compte`, `code`, `society`, `societys`, `date`, `heure`, `etat`, `status`, `active`, `logo`, `id_visitor`, `token_pass`) VALUES
(30, 'OCD-2200', 'zapomartial@yahoo.fr', 'hôtels saphir cocody', '36 rue de la pradelle', '', '', 'zapo', '038388209', '038388209', 'test', 'user:boss', 'dirigeant', '', 0, '', 'Array', '2021-10-24', '23:19:00', 'connecte', 1, 'on', '7935611.jpg', '63b6848e2c5f11d0813fddf13f9f023f', '44789fe2e75a3cece0d8b66b33b7ff86'),
(31, 'OCD-2200', 'koua@yahoo.fr', 'hôtels saphir cocody', '36 rue de la pradelle', '', '', 'kouassi emmanuel', '0383840399', '0383840399', 'test', 'user:gestionnaire', 'Gestionnaire', '', 1, 'hôtels saphir cocody', '', 'Mar 19 Octobre 2021', '19:55:00', '', 3, 'on', '7935611.jpg', '', ''),
(20, '', 'zap@za@soua', '', '', '', '', '', '', '', 'test', '', '', '', 0, '', '', 'Dim 24 Octobre 2021', '15:37:00', '', 1, '1', '', '', ''),
(32, 'OCD-2200', 'souame@yahoo.fr', 'hôtels saphir cocody', '36 rue de la pradelle', '', '', 'kouame franck', '083473662', '083473662', 'test', 'user:employes', 'Receptionniste', '', 1, 'hôtels saphir cocody', '', 'Dim 24 Octobre 2021', '15:42:00', '', 4, 'on', '7935611.jpg', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activer_compte`
--
ALTER TABLE `activer_compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_ocd` (`email_ocd`);

--
-- Index pour la table `clients_ocd`
--
ALTER TABLE `clients_ocd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription_client`
--
ALTER TABLE `inscription_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_user` (`email_user`),
  ADD KEY `password` (`password`),
  ADD KEY `email_ocd` (`email_ocd`) USING BTREE,
  ADD KEY `permission` (`permission`),
  ADD KEY `active` (`active`),
  ADD KEY `code` (`code`),
  ADD KEY `token_pass` (`token_pass`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients_ocd`
--
ALTER TABLE `clients_ocd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription_client`
--
ALTER TABLE `inscription_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
