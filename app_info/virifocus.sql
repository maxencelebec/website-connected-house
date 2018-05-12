-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 12 mai 2018 à 08:47
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(10, '2018-05-10 09:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 21),
(11, '2018-05-10 10:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 22),
(12, '2018-05-10 11:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 23),
(13, '2018-05-10 12:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 23),
(17, '2018-05-10 16:24:12.000000', 27, 7, 37, 'temperature', 'temp 1', 0, 'XXXX', 24),
(18, NULL, 27, 7, 38, 'presence', 'pres1', 1, 'XXXX', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(7, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Maison 1 VL', 20000, 1, 27),
(8, 'france', 'paris', 75016, 'test2', NULL, 'Maison 2 VL', 2042, 2, 27),
(9, 'Italie', 'Venise', 29930, '23 rue de Paradis', NULL, 'Villa', 3940, NULL, 27),
(10, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Maison Test', 2042, NULL, 28),
(11, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(12, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(13, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(14, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(15, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(16, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'Victor Lebrun', 2042, NULL, 28),
(17, 'France', 'Mada', 29930, '23 rue de Paradis', NULL, 'Maison Maurice', 340, NULL, 29),
(18, 'France', 'Nantes', 44800, '3A Rue de la Jaloterie', NULL, 'Maison 1', 200, NULL, 30);

-- --------------------------------------------------------

--
-- Structure de la table `jeux_video`
--

DROP TABLE IF EXISTS `jeux_video`;
CREATE TABLE IF NOT EXISTS `jeux_video` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `possesseur` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux_video`
--

INSERT INTO `jeux_video` (`ID`, `nom`, `possesseur`, `console`, `prix`, `nbre_joueurs_max`, `commentaires`) VALUES
(1, 'Super Mario Bros', 'Florent', 'NES', 4, 1, 'Un jeu d\'anthologie !'),
(2, 'Sonic', 'Patrick', 'Megadrive', 2, 1, 'Pour moi, le meilleur jeu du monde !'),
(3, 'Zelda : ocarina of time', 'Florent', 'Nintendo 64', 15, 1, 'Un jeu grand, beau et complet comme on en voit rarement de nos jours'),
(4, 'Mario Kart 64', 'Florent', 'Nintendo 64', 25, 4, 'Un excellent jeu de kart !'),
(5, 'Super Smash Bros Melee', 'Michel', 'GameCube', 55, 4, 'Un jeu de baston délirant !'),
(6, 'Dead or Alive', 'Patrick', 'Xbox', 60, 4, 'Le plus beau jeu de baston jamais créé'),
(7, 'Dead or Alive Xtreme Beach Volley Ball', 'Patrick', 'Xbox', 60, 4, 'Un jeu de beach volley de toute beauté o_O'),
(8, 'Enter the Matrix', 'Michel', 'PC', 45, 1, 'Plutôt bof comme jeu, mais ça complète bien le film'),
(9, 'Max Payne 2', 'Michel', 'PC', 50, 1, 'Très réaliste, une sorte de film noir sur fond d\'histoire d\'amour. A essayer !'),
(10, 'Yoshi\'s Island', 'Florent', 'SuperNES', 6, 1, 'Le paradis des Yoshis :o)'),
(11, 'Commandos 3', 'Florent', 'PC', 44, 12, 'Un bon jeu d\'action où on dirige un commando pendant la 2ème guerre mondiale !'),
(12, 'Final Fantasy X', 'Patrick', 'PS2', 40, 1, 'Encore un Final Fantasy mais celui la est encore plus beau !'),
(13, 'Pokemon Rubis', 'Florent', 'GBA', 44, 4, 'Pika-Pika-chu !!!'),
(14, 'Starcraft', 'Michel', 'PC', 19, 8, 'Le meilleur jeux pc de tout les temps !'),
(15, 'Grand Theft Auto 3', 'Michel', 'PS2', 30, 1, 'Comme dans les autres Gta on ecrase tout le monde :) .'),
(16, 'Homeworld 2', 'Michel', 'PC', 45, 6, 'Superbe ! o_O'),
(17, 'Aladin', 'Patrick', 'SuperNES', 10, 1, 'Comme le dessin Animé !'),
(18, 'Super Mario Bros 3', 'Michel', 'SuperNES', 10, 2, 'Le meilleur Mario selon moi.'),
(19, 'SSX 3', 'Florent', 'Xbox', 56, 2, 'Un très bon jeu de snow !'),
(20, 'Star Wars : Jedi outcast', 'Patrick', 'Xbox', 33, 1, 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !'),
(21, 'Actua Soccer 3', 'Patrick', 'PS', 30, 2, 'Un jeu de foot assez bof ...'),
(22, 'Time Crisis 3', 'Florent', 'PS2', 40, 1, 'Un troisième volet efficace mais pas vraiment surprenant'),
(23, 'X-FILES', 'Patrick', 'PS', 25, 1, 'Un jeu censé ressembler a la série mais assez raté ...'),
(24, 'Soul Calibur 2', 'Patrick', 'Xbox', 54, 1, 'Un jeu bien axé sur le combat'),
(25, 'Diablo', 'Florent', 'PS', 20, 1, 'Comme sur PC mais la c\'est sur un ecran de télé :) !'),
(26, 'Street Fighter 2', 'Patrick', 'Megadrive', 10, 2, 'Le célèbre jeu de combat !'),
(27, 'Gundam Battle Assault 2', 'Florent', 'PS', 29, 1, 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement'),
(28, 'Spider-Man', 'Florent', 'Megadrive', 15, 1, 'Vivez l\'aventure de l\'homme araignée'),
(29, 'Midtown Madness 3', 'Michel', 'Xbox', 59, 6, 'Dans la suite des autres versions de Midtown Madness'),
(30, 'Tetris', 'Florent', 'Gameboy', 5, 1, 'Qui ne connait pas ? '),
(31, 'The Rocketeer', 'Michel', 'NES', 2, 1, 'Un super un film et un jeu de m*rde ...'),
(32, 'Pro Evolution Soccer 3', 'Patrick', 'PS2', 59, 2, 'Un petit jeu de foot sur PS2'),
(33, 'Ice Hockey', 'Michel', 'NES', 7, 2, 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)'),
(34, 'Sydney 2000', 'Florent', 'Dreamcast', 15, 2, 'Les JO de Sydney dans votre salon !'),
(35, 'NBA 2k', 'Patrick', 'Dreamcast', 12, 2, 'A votre avis :p ?'),
(36, 'Aliens Versus Predator : Extinction', 'Michel', 'PS2', 20, 2, 'Un shoot\'em up pour pc'),
(37, 'Crazy Taxi', 'Florent', 'Dreamcast', 11, 1, 'Conduite de taxi en folie !'),
(38, 'Le Maillon Faible', 'Mathieu', 'PS2', 10, 1, 'Le jeu de l\'émission'),
(39, 'FIFA 64', 'Michel', 'Nintendo 64', 25, 2, 'Le premier jeu de foot sur la N64 =) !'),
(40, 'Qui Veut Gagner Des Millions', 'Florent', 'PS2', 10, 1, 'Le jeu de l\'émission'),
(41, 'Monopoly', 'Sebastien', 'Nintendo 64', 21, 4, 'Bheuuu le monopoly sur N64 !'),
(42, 'Taxi 3', 'Corentin', 'PS2', 19, 4, 'Un jeu de voiture sur le film'),
(43, 'Indiana Jones Et Le Tombeau De L\'Empereur', 'Florent', 'PS2', 25, 1, 'Notre aventurier préféré est de retour !!!'),
(44, 'F-ZERO', 'Mathieu', 'GBA', 25, 4, 'Un super jeu de course futuriste !'),
(45, 'Harry Potter Et La Chambre Des Secrets', 'Mathieu', 'Xbox', 30, 1, 'Abracadabra !! Le célebre magicien est de retour !'),
(46, 'Half-Life', 'Corentin', 'PC', 15, 32, 'L\'autre meilleur jeu de tout les temps (surtout ses mods).'),
(47, 'Myst III Exile', 'Sébastien', 'Xbox', 49, 1, 'Un jeu de réflexion'),
(48, 'Wario World', 'Sebastien', 'Gamecube', 40, 4, 'Wario vs Mario ! Qui gagnera ! ?'),
(49, 'Rollercoaster Tycoon', 'Florent', 'Xbox', 29, 1, 'Jeu de gestion d\'un parc d\'attraction'),
(50, 'Splinter Cell', 'Patrick', 'Xbox', 53, 1, 'Jeu magnifique !');

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
(40, 'grenier', 'test', 12, 27, 7),
(41, 'salon', 'Grand Salon', 345, 27, 9),
(42, 'entree', 'Entreee', 23, 27, 9),
(43, 'cuisine', 'Cuisina', 23, 28, 11),
(44, 'salon', 'saloooon', 22, 28, 13),
(45, 'entree', 'zeojf', 23, 28, 14),
(46, 'entree', 're', 34, 28, 16),
(47, 'salon', 'grezdfz', 23, 28, 16),
(48, 'toilettes', 'fdfz', 43, 28, 16),
(49, 'chambre', 'C1', 34, 29, 17),
(50, 'entree', 'A', 1, 30, 18);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11');

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
  `pass_token` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `name`, `firstname`, `address`, `postal_code`, `city`, `country`, `phone_number_home`, `phone_number_portable`, `type`, `pass_token`) VALUES
(15, 'thierry.lincoln@isep.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lincoln', 'Thierry', '12 de mon cul', 92600, 'Asnières-sur-Seine', 'France', 1831931, 19391939, NULL, NULL),
(20, 'famille.lebec@wanadoo.fr', '558e62b37930a34393f7f997985186b167d3321a', 'Lebec', 'Aude', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 22929229, 92929292, NULL, NULL),
(19, 'maxence.lbc@gmail.com', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Maxence', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 101010101, 101010101, NULL, NULL),
(22, 'andreas365@hotmail.fr', 'e4ff4ad07cfd70e0f373b21ebfd575d144c34f9f', 'Lebec', 'Andreas', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101012, NULL, NULL),
(26, 'cresc.lebec@hotmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Cresc', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101010, NULL, NULL),
(27, 'vlebrun@juniorisep.com', 'e78444dc0758cb0f6e3345e633dc16da0e4b7d9b', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, NULL, NULL),
(28, 'pherisson@juniorisep.com', '65a4b98bb4f8b59adf3162b26e85b3b4cc36da18', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, NULL, NULL),
(29, 'tlincoln@isep.fr', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', 'Lincoln', 'Thierry', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, NULL, NULL),
(30, 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Nguyen', 'Vincent', '3A Rue de la Jaloterie', 44800, 'Nantes', 'France', 123456789, 123456789, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

DROP TABLE IF EXISTS `visiteurs`;
CREATE TABLE IF NOT EXISTS `visiteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
