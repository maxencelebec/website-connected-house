-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 11 mai 2018 à 07:56
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `virifocus`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

DROP TABLE IF EXISTS `capteurs`;
CREATE TABLE IF NOT EXISTS `capteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime(6) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_habitation` int(10) DEFAULT NULL,
  `id_piece` int(10) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `etat` int(10) DEFAULT NULL,
  `id_capteur` varchar(30) DEFAULT NULL,
  `valeur` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id`, `timestamp`, `id_user`, `id_habitation`, `id_piece`, `type`, `nom`, `etat`, `id_capteur`, `valeur`) VALUES
(3, NULL, 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 9000),
(2, NULL, 27, 7, 39, 'humidité', 'Humidité 1', 0, 'XXXX', 0),
(16, '2018-05-10 15:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 24),
(15, '2018-05-10 14:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 24),
(14, '2018-05-10 13:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 23),
(7, '2018-05-10 06:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 23),
(8, '2018-05-10 07:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 22),
(9, '2018-05-10 08:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 22),
(33, NULL, 29, 11, 60, 'presence', 'ici', NULL, 'xxx', NULL),
(32, NULL, 29, 11, 59, 'humidite', 'mouillé', NULL, 'xxx', NULL),
(31, NULL, 29, 11, 60, 'humidite', 'eau', NULL, 'xxx', NULL),
(30, NULL, 29, 11, 61, 'porte', 'door de dehors', NULL, 'xxx', NULL),
(29, NULL, 29, 11, 60, 'temperature', 'chaleur', NULL, 'xxx', 22),
(28, NULL, 29, 11, 60, 'luminosite', 'lumiere', NULL, 'ok', NULL),
(27, NULL, 29, 11, 11, 'luminosite', 'salut', NULL, 'ok', NULL),
(34, NULL, 29, 11, 60, 'porte', 'porte cave', NULL, 'xxx', NULL),
(35, NULL, 27, 7, 39, 'humidite', 'coucou', NULL, 'xxx', NULL),
(36, NULL, 27, 7, 63, 'luminosite', 'lum', NULL, 'xxx', NULL),
(37, NULL, 29, 11, 61, 'humidite', 'mouillé', NULL, 'xxx', NULL),
(38, NULL, 29, 11, 59, 'temperature', 'chaleur', NULL, 'xxx', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `habitation`
--

DROP TABLE IF EXISTS `habitation`;
CREATE TABLE IF NOT EXISTS `habitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pays` varchar(40) DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `code_postal` int(20) DEFAULT NULL,
  `adresse` text,
  `type` varchar(20) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `surface` int(10) DEFAULT NULL,
  `mode` int(10) DEFAULT NULL,
  `id_user` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `habitation`
--

INSERT INTO `habitation` (`id`, `pays`, `ville`, `code_postal`, `adresse`, `type`, `nom`, `surface`, `mode`, `id_user`) VALUES
(1, 'France', 'Asnières-sur-Seine', 92600, '12 rue de mon cul, 200', NULL, NULL, 200, 0, 23),
(2, 'France', 'Asnières-sur-Seine', 92600, '12 rue de mon cul, 200', NULL, NULL, 200, 0, 23),
(3, 'France', 'Paris', 75006, '28 rue Notre Dame des Champs', NULL, NULL, 2000, 0, 24),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 24),
(5, 'France', 'Paris', 75006, '28 rue Notre Dame des Champs', NULL, NULL, 300, 0, 25),
(6, 'France', 'Asnières-sur-Seine', 92799, '13 rue de mon cul', NULL, NULL, 300, 0, 26),
(7, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Maison 1 VL', 20000, 0, 27),
(8, 'france', 'paris', 75016, 'test2', NULL, 'Maison 2 VL', 2042, NULL, 27),
(9, 'France', 'Asnières-sur-Seine', 92600, '15 rue waldeck rousseau', NULL, 'home mi', 400, NULL, 28),
(10, 'France', 'Asnières-sur-Seine', 92600, '12 rue waldeck rousseau', NULL, 'coccina', 300, NULL, 28),
(11, 'France', 'Asnières-sur-Seine', 92600, '12 rue waldeck rousseau', NULL, 'pouloulou', 300, NULL, 29),
(12, 'France', 'Asnières-sur-Seine', 92600, '12 rue waldeck rousseau', NULL, 'Normandie', 30, NULL, 29);

-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `nom` varchar(16) NOT NULL,
  `surface` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_habitation` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id`, `type`, `nom`, `surface`, `id_user`, `id_habitation`) VALUES
(21, 'cave', 'cave à vin', 30, 26, 6),
(16, 'salon', 'Salle à fumer', 10, 26, 6),
(17, 'cuisine', 'cuisine maman', 7, 26, 6),
(32, 'salle_de_bain', 'salle du haut', 10, 26, 6),
(36, 'chambre', 'Chambre de Max', 10, 26, 6),
(37, 'cuisine', 'Cocina', 20, 27, 7),
(38, 'chambre', 'Chambre 1', 23, 27, 7),
(39, 'salon', 'Saloon', 45, 27, 7),
(60, 'chambre', 'robert', 60, 29, 11),
(59, 'salle_de_bain', 'jacquie', 40, 29, 11),
(58, 'cave', 'biquette', 10, 28, 10),
(57, 'salle_de_bain', 'ma salle de bain', 11, 28, 10),
(56, 'chambre', 'chambre max', 15, 28, 9),
(55, 'cuisine', 'cochinana', 10, 27, 8),
(61, 'cuisine', 'conchita', 11, 29, 11),
(62, 'cuisine', 'coucou', 3, 29, 12),
(63, 'chambre', 'chambre max', 20, 27, 7);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `essai` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `essai`) VALUES
(1, 12),
(2, 13),
(9, 14),
(8, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(40) DEFAULT NULL,
  `password` text,
  `name` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `address` text,
  `postal_code` int(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `phone_number_home` int(20) DEFAULT NULL,
  `phone_number_portable` int(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `name`, `firstname`, `address`, `postal_code`, `city`, `country`, `phone_number_home`, `phone_number_portable`, `type`) VALUES
(15, 'thierry.lincoln@isep.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lincoln', 'Thierry', '12 de mon cul', 92600, 'Asnières-sur-Seine', 'France', 1831931, 19391939, NULL),
(20, 'famille.lebec@wanadoo.fr', '558e62b37930a34393f7f997985186b167d3321a', 'Lebec', 'Aude', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 22929229, 92929292, NULL),
(19, 'maxence.lbc@gmail.com', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Maxence', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 101010101, 101010101, NULL),
(22, 'andreas365@hotmail.fr', 'e4ff4ad07cfd70e0f373b21ebfd575d144c34f9f', 'Lebec', 'Andreas', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101012, NULL),
(26, 'cresc.lebec@hotmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Cresc', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101010, NULL),
(27, 'vlebrun@juniorisep.com', 'e78444dc0758cb0f6e3345e633dc16da0e4b7d9b', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, NULL),
(28, 'andreas@hotmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'andreas669@hotmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Andreas', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1212121212, 658856338, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
