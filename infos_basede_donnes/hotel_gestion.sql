-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 oct. 2021 à 22:23
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
-- Base de données : `hotel_gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `activer_compte`
--

CREATE TABLE `activer_compte` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bord_informations`
--

CREATE TABLE `bord_informations` (
  `id` int(11) NOT NULL,
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
  `code` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
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
  `types` int(2) NOT NULL,
  `active` varchar(5) NOT NULL,
  `codes` tinyint(2) NOT NULL,
  `society` varchar(100) NOT NULL,
  `id_visitor` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `id_chambre`, `chambre`, `email_ocd`, `type_logement`, `cout_nuite`, `cout_pass`, `occupant`, `nombre_lits`, `equipement`, `equipements`, `infos`, `icons`, `types`, `active`, `codes`, `society`, `id_visitor`) VALUES
(292, 9671637, 'chambre C02', 'ocd 22POI', 'chambre twin', '70000', '23000', 2, 2, '', '', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 4, 'on', 1, 'Hôtel 5 étoiles deux plateau', '342b001e757fee0b341f39cc8606468b'),
(290, 1401027, 'appartement B-14', 'ocd 22POI', 'chambre triple', '23000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi, <i style=\'font-size:14px\' class=\'fa\'></i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'></i> Déjeuner', 'toilletes, armoie ou penderie, espace pour pc', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on', 0, '', '342b001e757fee0b341f39cc8606468b'),
(291, 5722208, 'appartement B-15', 'ocd 22POI', 'dashbord', '20000', '12000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation', 'toilletes, armoie ou penderie, télephone, fer à repasser, séche cheveux, petit café', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0, 'on', 0, '', '342b001e757fee0b341f39cc8606468b'),
(288, 6342091, 'chambre A 16', 'ocd 22POI', 'studio double', '40000', '20000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi', 'toilletes, armoie ou penderie', 'très bon séjour', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'on', 0, '', '342b001e757fee0b341f39cc8606468b'),
(281, 8038386, 'appartement D-07', 'souame@yahoo.fr', 'studio double', '15000', '12000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'armoie ou penderie, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, fer Ã  repasser, rÃ©frigÃ©rateur, machine Ã  laver, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0, 'on', 0, '', ''),
(282, 6944708, 'chambre E-01', 'souame@yahoo.fr', 'chambre triple', '15000', '5000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi, <i style=\'font-size:14px\' class=\'fa\'>ïŠ¢</i> salle de baim, <i style=\'font-size:16px\' class=\'fas\'>ïƒ´</i> DÃ©jeuner', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, espace pour pc, baignoire ou douche, tÃ©lephone, microonde, rÃ©frigÃ©rateur, machine Ã  laver, papier toillete, sÃ©che cheveux, petit cafÃ©, dÃ©jeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0, 'off', 0, '', ''),
(284, 6509969, 'chambre C-03', 'souame@yahoo.fr', 'chambre triple', '12000', '10000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision, <i style=\'font-size:14px\' class=\'fa\'>ï‡«</i> wiffi', 'toilletes, armoie ou penderie, chaines satellite, prise prÃ¨s de lit, portant, baignoire ou douche, tÃ©lephone, microonde, papier toillete, sÃ©che cheveux, petit cafÃ©', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0, 'on', 0, '', ''),
(285, 3575752, 'chambre E-01', 'souame@yahoo.fr', 'chambre standard', '12000', '4000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'>ï‹œ</i> climatisation, <i style=\'font-size:13px\' class=\'fa\'>ï„ˆ</i> tÃ©lÃ©vision', 'armoie ou penderie, portant, baignoire ou douche', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 0, 'on', 0, '', ''),
(286, 1571490, 'chambre D-30', 'ocd 22POI', '<span class=', '50000', '20000', 3, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision', 'toilletes, armoie ou penderie, portant, baignoire ou douche, télephone, microonde, fer à repasser, séche cheveux, petit café, déjeuner', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 2, 'on', 0, '', '342b001e757fee0b341f39cc8606468b'),
(287, 9705651, 'chambre A 10', 'ocd 22POI', 'studio double', '30000', '220000', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi', 'toilletes, portant, baignoire ou douche, papier toillete', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 6, 'on', 0, '', '342b001e757fee0b341f39cc8606468b');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `numero` varchar(14) NOT NULL,
  `adresse` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `numero_facture` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `designation` varchar(150) NOT NULL,
  `fournisseur` varchar(60) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `nature` varchar(40) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `code` tinyint(2) NOT NULL,
  `society` varchar(100) NOT NULL,
  `calls` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`id`, `email_ocd`, `numero_facture`, `date`, `designation`, `fournisseur`, `user`, `nature`, `montant`, `status`, `code`, `society`, `calls`) VALUES
(46, 'souame@yahoo.fr', '3928282', '2021-08-12', 'rÃ©peration de porte chambre _02 , main d\'ouvre', 'djibril quncallerie', 'zapo martial,  <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial Ã  modifiÃ© le  10-08-2021Ã   10:20<span class=\"edit\"></span>', 'dÃ©pense effectuÃ©e', '25000', 1, 0, '', ''),
(47, 'souame@yahoo.fr', '34838', '2021-08-04', '10 casiers de sucrerie , bierre', 'depot spolibra vridi 202', 'zapo martial, <i class=\"fas fa-user-edit\" style=\"font-size:13px;color:#4e73df;\"></i>zapo martial Ã  payer la somme de 100000 xof  le  10-08-2021Ã   10:21 par   <span class=\"edit\"></span>', 'crÃ©dit fournisseur', '20000', 2, 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
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
  `calls` varchar(200) NOT NULL,
  `search_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `home_occupation`
--

CREATE TABLE `home_occupation` (
  `id` int(11) NOT NULL,
  `id_local` int(10) NOT NULL,
  `email_ocds` varchar(60) NOT NULL,
  `date` varchar(800) NOT NULL,
  `date_french` varchar(800) NOT NULL,
  `dates` varchar(800) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `code` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messanger`
--

CREATE TABLE `messanger` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `name` varchar(80) NOT NULL,
  `permission` varchar(60) NOT NULL,
  `message` varchar(300) NOT NULL,
  `email_user` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `code` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messanger`
--

INSERT INTO `messanger` (`id`, `email_ocd`, `name`, `permission`, `message`, `email_user`, `date`, `heure`, `code`) VALUES
(109, 'souame@yahoo.fr', 'zapo martial', 'boss', 'ok', 'souame@yahoo.fr', '2021-08-13', '23:22:00', 0),
(107, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '16:36:00', 0),
(108, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '23:22:00', 0),
(116, 'ocd 22POI', 'kouame franck', 'supgestionnaire', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-13', '13:11:00', 0),
(115, 'ocd 22POI', 'kouame franck', 'gestionnaire', 'ok', 'souame@yahoo.fr', '2021-10-13', '11:54:00', 0),
(114, 'ocd 22POI', 'zapo', 'boss', 'ok', 'zapomartial@yahoo.fr', '2021-10-13', '11:46:00', 0),
(117, 'ocd 22POI', 'kouame franck', 'supgestionnaire', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-13', '12:33:00', 0),
(118, 'ocd 22POI', 'kouame franck', 'supgestionnaire', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-13', '12:33:00', 0),
(119, 'ocd 22POI', 'kouame franck', 'supgestionnaire', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-13', '13:11:00', 0),
(120, 'ocd 22POI', 'zapo', 'boss', 'ok', 'zapomartial@yahoo.fr', '2021-10-13', '21:59:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `moyen_tresorie`
--

CREATE TABLE `moyen_tresorie` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `id_fact` varchar(10) NOT NULL,
  `montant` varchar(18) NOT NULL,
  `montant1` varchar(18) NOT NULL,
  `montant2` varchar(18) NOT NULL,
  `montant3` varchar(18) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `moyen_tresorie`
--

INSERT INTO `moyen_tresorie` (`id`, `date`, `email_ocd`, `email_user`, `id_fact`, `montant`, `montant1`, `montant2`, `montant3`, `code`) VALUES
(1, '2021-10-12', 'ocd 22POI', 'souame@yahoo.fr', '1.0E-5', '50000', '50000', '40000', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `new_message`
--

CREATE TABLE `new_message` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(70) NOT NULL,
  `email_user` varchar(70) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `new_message`
--

INSERT INTO `new_message` (`id`, `email_ocd`, `email_user`, `name`) VALUES
(50, 'ocd 22POI', 'zapomartial@yahoo.fr', 'zapo');

-- --------------------------------------------------------

--
-- Structure de la table `photo_chambre`
--

CREATE TABLE `photo_chambre` (
  `id` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `name_upload` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(213, 3575752, 'souame@yahoo.fr', '6098973.jpg'),
(214, 1571490, 'ocd 22POI', '2739410.jpg'),
(215, 1571490, 'ocd 22POI', '851363.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tresorie_customer`
--

CREATE TABLE `tresorie_customer` (
  `id` int(11) NOT NULL,
  `email_ocd` varchar(50) NOT NULL,
  `reservation` int(18) NOT NULL,
  `encaisse` bigint(18) NOT NULL,
  `depense` bigint(18) NOT NULL,
  `montant` bigint(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `code` tinyint(2) NOT NULL,
  `society` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_customer`
--

INSERT INTO `tresorie_customer` (`id`, `email_ocd`, `reservation`, `encaisse`, `depense`, `montant`, `reste`, `code`, `society`) VALUES
(3, 'ocd 22POI', 0, -23600, 10000, 0, '0', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `tresorie_user`
--

CREATE TABLE `tresorie_user` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `user_gestionnaire` varchar(60) NOT NULL,
  `entree` bigint(18) NOT NULL,
  `sorties` bigint(18) NOT NULL,
  `reservation` bigint(18) NOT NULL,
  `reste` varchar(18) NOT NULL,
  `code` tinyint(2) NOT NULL,
  `society` varchar(100) NOT NULL,
  `calls` varchar(100) NOT NULL,
  `moyen_paiement` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tresorie_user`
--

INSERT INTO `tresorie_user` (`id`, `date`, `email_ocd`, `user_gestionnaire`, `entree`, `sorties`, `reservation`, `reste`, `code`, `society`, `calls`, `moyen_paiement`) VALUES
(121, '2021-10-12', 'ocd 22POI', 'kouame franck', 165200, 250000, 0, '165200', 0, 'Hotel 5 etoils abidjan', 'transmis par le gestionnaire', '<img src=\"https://img.icons8.com/ios-glyphs/30/000000/cash-in-hand.png\" width=\"18px\" height=\"18px\"/> espéce caisse:50000xof,<img src=\"img/check_p.png\" width=\"18px\" height=\"18px\"> carte bancaire :50000xof,<img src=\"img/check_n.png\" width=\"18px\" height=\"18px\"> Mobile monney :40000xof,<img src=\"img/check.png\" width=\"25px\" height=\"25px\" alt=\"check\"> chéque :50000xof');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activer_compte`
--
ALTER TABLE `activer_compte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bord_informations`
--
ALTER TABLE `bord_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `id_fact` (`id_fact`),
  ADD KEY `id_chambre` (`id_chambre`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_chambre` (`id_chambre`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `active` (`active`),
  ADD KEY `code` (`codes`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `status` (`status`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_fact` (`id_fact`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `status` (`moyen_paiement`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `home_occupation`
--
ALTER TABLE `home_occupation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chambre` (`id_local`) USING BTREE,
  ADD KEY `id_fact` (`id_fact`),
  ADD KEY `email_ocd` (`email_ocds`),
  ADD KEY `type` (`type`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `messanger`
--
ALTER TABLE `messanger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `moyen_tresorie`
--
ALTER TABLE `moyen_tresorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fact` (`id_fact`),
  ADD KEY `code` (`code`),
  ADD KEY `email_user` (`email_user`);

--
-- Index pour la table `new_message`
--
ALTER TABLE `new_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `email_user` (`email_user`);

--
-- Index pour la table `photo_chambre`
--
ALTER TABLE `photo_chambre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ocd` (`email_ocd`),
  ADD KEY `id_chambre` (`id_chambre`) USING BTREE;

--
-- Index pour la table `tresorie_customer`
--
ALTER TABLE `tresorie_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_ocd` (`email_ocd`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `tresorie_user`
--
ALTER TABLE `tresorie_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `email_ocd` (`email_ocd`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bord_informations`
--
ALTER TABLE `bord_informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=729;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT pour la table `home_occupation`
--
ALTER TABLE `home_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT pour la table `messanger`
--
ALTER TABLE `messanger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `moyen_tresorie`
--
ALTER TABLE `moyen_tresorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `new_message`
--
ALTER TABLE `new_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `photo_chambre`
--
ALTER TABLE `photo_chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT pour la table `tresorie_customer`
--
ALTER TABLE `tresorie_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tresorie_user`
--
ALTER TABLE `tresorie_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
