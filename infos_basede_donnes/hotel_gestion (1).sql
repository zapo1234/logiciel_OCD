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
(330, 9030476, 'chambre B-12', 'OCD-2200', '', '15000', '12000', 3, 4, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:16px\' class=\'fas\'></i> Déjeuner', 'toilletes, armoie ou penderie, portant, télephone, fer à repasser, machine à laver, séche cheveux, petit café', 'Bonjour Merci on as su créer votre groupe , merci beaucoup pour cette chambre', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>plus..', 4, 'on', 1, 'hotel saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(331, 2648469, 'appartement B-15', 'OCD-2200', 'chambre double', '25000', '23000', 2, 4, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:16px\' class=\'fas\'></i> Frigo/réfrigerateur, <i style=\'font-size:16px\' class=\'fas\'></i> Four/chauffage', 'toilletes, armoie ou penderie, chaines satellite, prise près de lit, espace pour pc', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> plus de 3 personnes', 2, 'on', 1, 'hotel saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(329, 8364335, 'appartement A-08', 'OCD-2200', '', '80000', '14000', 4, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi, <i style=\'font-size:14px\' class=\'fa\'></i> salle de baim', 'toilletes, armoie ou penderie', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 3, 'on', 1, 'hôtels saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(328, 8903907, 'appartement A-02', 'OCD-2200', '', '30000', '12000', 2, 2, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi, <i style=\'font-size:14px\' class=\'fa\'></i> salle de baim', 'toilletes, armoie ou penderie, espace pour pc, baignoire ou douche, télephone, microonde, papier toillete', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 4, 'on', 1, 'hôtels saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(327, 7839783, 'appartement A-08', 'OCD-2200', '', '200000', '10000', 3, 2, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi, <i style=\'font-size:14px\' class=\'fa\'></i> salle de baim', 'toilletes, armoie ou penderie, espace pour pc, portant, baignoire ou douche, télephone, microonde, fer à repasser, réfrigérateur', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 7, 'on', 0, 'hôtels saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(324, 6936114, 'Chambre A-10', 'OCD-2200', 'chambre standard', '30000', '12000', 2, 2, '', '', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 5, 'on', 1, 'hôtels saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f'),
(326, 4395685, 'chambre D-30', 'OCD-2200', 'chambre double', '3', '2', 2, 3, '<i style=\'font-size:13px\' class=\'fa\'></i> climatisation, <i style=\'font-size:13px\' class=\'fa\'></i> ventilateur, <i style=\'font-size:13px\' class=\'fa\'></i> télévision, <i style=\'font-size:14px\' class=\'fa\'></i> wiffi', 'toilletes, armoie ou penderie, portant', '', '<i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i> <i class=\"far fa-user\"></i>', 2, 'on', 1, 'hôtels saphir cocody', '63b6848e2c5f11d0813fddf13f9f023f');

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
  `code` tinyint(2) NOT NULL,
  `id_visitor` varchar(300) NOT NULL
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
  `code` tinyint(2) NOT NULL,
  `society` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messanger`
--

INSERT INTO `messanger` (`id`, `email_ocd`, `name`, `permission`, `message`, `email_user`, `date`, `heure`, `code`, `society`) VALUES
(109, 'souame@yahoo.fr', 'zapo martial', 'boss', 'ok', 'souame@yahoo.fr', '2021-08-13', '23:22:00', 0, ''),
(107, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '16:36:00', 0, ''),
(108, 'souame@yahoo.fr', 'zapo martial', 'supboss', 'zapo martial a suprimÃ© son message', 'souame@yahoo.fr', '2021-08-13', '23:22:00', 0, ''),
(180, 'OCD-2200', 'kouame franck', 'employes', 'merci', 'souame@yahoo.fr', '2021-10-24', '15:42:00', 1, 'hôtels saphir cocody'),
(179, 'OCD-2200', 'kouame franck', 'supemployes', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-24', '15:42:00', 1, 'hôtels saphir cocody'),
(178, 'OCD-2200', 'zapo', 'boss', 'merci', 'zapomartial@yahoo.fr', '2021-10-24', '15:39:00', 0, ''),
(177, 'OCD-2200', 'zapo', 'boss', 'ok', 'zapomartial@yahoo.fr', '2021-10-24', '15:39:00', 0, ''),
(176, 'OCD-2200', 'kouame franck', 'supemployes', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-22', '13:40:00', 1, 'hôtels saphir cocody'),
(175, 'OCD-2200', 'kouame franck', 'supemployes', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-24', '15:42:00', 1, 'hôtels saphir cocody'),
(174, 'OCD-2200', 'zapo', 'boss', 'ok', 'zapomartial@yahoo.fr', '2021-10-22', '00:29:00', 0, ''),
(173, 'OCD-2200', 'kouame franck', 'supemployes', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-22', '13:40:00', 1, 'hôtels saphir cocody'),
(171, 'OCD-2200', 'zapo', 'boss', 'OK', 'zapomartial@yahoo.fr', '2021-10-19', '20:06:00', 1, ''),
(172, 'OCD-2200', 'kouame franck', 'supemployes', 'kouame franck a suprimé son message', 'souame@yahoo.fr', '2021-10-24', '15:42:00', 1, 'hôtels saphir cocody');

-- --------------------------------------------------------

--
-- Structure de la table `moyen_tresorie`
--

CREATE TABLE `moyen_tresorie` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `email_ocd` varchar(60) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `id_fact` decimal(6,5) NOT NULL,
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
(61, '2021-10-12', 'OCD-2200', 'souame@yahoo.fr', '0.00002', '0', '0', '0', '0', '1'),
(60, '2021-10-23', 'OCD-2200', 'souame@yahoo.fr', '0.00001', '0', '0', '0', '0', '1'),
(59, '2021-10-19', 'OCD-2200', 'souame@yahoo.fr', '0.00002', '0', '0', '0', '0', '1'),
(58, '2021-10-23', 'OCD-2200', 'souame@yahoo.fr', '0.00001', '0', '0', '0', '0', '1');

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
(285, 2648469, 'OCD-2200', '5445058.jpg'),
(284, 2648469, 'OCD-2200', '6564864.jpg'),
(283, 2648469, 'OCD-2200', '541363.jpg'),
(282, 8364335, 'OCD-2200', '8350173.jpg'),
(281, 8903907, 'OCD-2200', '959328.jpg'),
(280, 7839783, 'OCD-2200', '176496.jpg'),
(279, 7839783, 'OCD-2200', '8933950.jpg');

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
(14, 'OCD-2200', 0, 612000, 120000, 0, '836004', 1, 'hôtels smaphir cocody ');

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
  `calls` varchar(200) NOT NULL,
  `moyen_paiement` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  ADD KEY `code` (`code`),
  ADD KEY `id_visitor` (`id_visitor`);

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
  ADD KEY `code` (`code`),
  ADD KEY `email_ocd` (`email_ocd`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=858;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `depense`
--
ALTER TABLE `depense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=430;

--
-- AUTO_INCREMENT pour la table `home_occupation`
--
ALTER TABLE `home_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=728;

--
-- AUTO_INCREMENT pour la table `messanger`
--
ALTER TABLE `messanger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT pour la table `moyen_tresorie`
--
ALTER TABLE `moyen_tresorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `new_message`
--
ALTER TABLE `new_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `photo_chambre`
--
ALTER TABLE `photo_chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT pour la table `tresorie_customer`
--
ALTER TABLE `tresorie_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `tresorie_user`
--
ALTER TABLE `tresorie_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
