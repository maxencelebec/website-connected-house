-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 juin 2018 à 12:22
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

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
(43, NULL, 27, 7, 53, 'porte', 'Porte 2', 1, '', NULL),
(42, NULL, 27, 7, 53, 'luminosite', 'Luminosité', 1, 'xxx', NULL),
(41, NULL, 27, 7, 53, 'temperature', 'Temp1', 1, 'xxx', NULL),
(33, NULL, 27, 7, 50, 'temperature', 'temp1', 1, 'xxx', NULL),
(34, NULL, 27, 7, 51, 'presence', 'test', 0, 'xxx', NULL),
(35, NULL, 27, 7, 39, 'fenetre', 'Fenetre', 1, 'xxx', NULL),
(36, NULL, 27, 7, 39, 'presence', 'Ma Cave', 1, 'XXXXX', NULL),
(37, NULL, 27, 7, 52, 'humidite', 'hum', 1, 'XXX', NULL),
(38, NULL, 27, 7, 52, 'temperature', 'hejhe', 1, 'xx', NULL),
(39, NULL, 27, 7, 52, 'temperature', 'jhfkjhdf', 1, 'dsf', NULL),
(40, NULL, 27, 7, 39, 'fenetre', 'z', 1, 'jhgh', NULL),
(44, NULL, 30, 18, 57, 'porte', 'Lumière', 1, '3', NULL),
(46, NULL, 31, 19, 59, 'temperature', 'Froid', 1, '1234', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs_liste`
--

DROP TABLE IF EXISTS `capteurs_liste`;
CREATE TABLE IF NOT EXISTS `capteurs_liste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `id_habitation` int(10) NOT NULL,
  `id_piece` int(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `etat` int(10) NOT NULL,
  `id_capteur` varchar(30) NOT NULL,
  `valeur` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `code_technicien`
--

DROP TABLE IF EXISTS `code_technicien`;
CREATE TABLE IF NOT EXISTS `code_technicien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `code_technicien`
--

INSERT INTO `code_technicien` (`id`, `code`) VALUES
(1, 'azerty123456');

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
-- Structure de la table `graph_test`
--

DROP TABLE IF EXISTS `graph_test`;
CREATE TABLE IF NOT EXISTS `graph_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `valeur` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `graph_test`
--

INSERT INTO `graph_test` (`id`, `timestamp`, `type`, `nom`, `valeur`) VALUES
(1, '2018-05-15 08:00:00', 'temperature', 'temp1', 23),
(2, '2018-05-15 09:00:00', 'temperature', 'temp1', 23),
(3, '2018-05-15 10:00:00', 'temperature', 'temp1', 24),
(4, '2018-05-15 11:00:00', 'temperature', 'temp1', 25),
(5, '2018-05-15 12:00:00', 'temperature', 'temp1', 25),
(6, '2018-05-15 13:00:00', 'temperature', 'temp1', 22),
(7, '2018-05-15 14:00:00', 'temperature', 'temp1', 21),
(8, '2018-05-15 15:00:00', 'temperature', 'temp1', 19);

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
(18, 'Panam', 'Cachannary', 94230, 'appart 38', NULL, 'Nexity', 999999999, NULL, 30),
(19, 'France', 'Nantes', 44800, '3A Rue de la Jaloterie', NULL, 'Maison 1', 200, NULL, 31),
(20, 'France', 'Paris', 75016, '54 rue du Ranelagh', NULL, 'La Villa', 3000, NULL, 33),
(21, 'France', 'Asnières-sur-Seine', 92600, '12 rue waldeck rousseau', NULL, 'charo', 300, NULL, 19);

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
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_msg` set('1','2') NOT NULL,
  `Date_Heure` datetime DEFAULT CURRENT_TIMESTAMP,
  `contenu_msg` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_habitation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Date/Heure` (`Date_Heure`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_type_msg`, `Date_Heure`, `contenu_msg`, `id_utilisateur`, `id_habitation`) VALUES
(5, '2', '2018-05-11 09:51:07', 'Excusez-moi, j\'ai un problème avec ce capteur, il ne s\'allume plus malheuresement. ', 27, 10),
(3, '2', '2018-05-10 23:02:01', 'dw', 27, 10),
(4, '2', '2018-05-10 23:43:09', 'mm', 27, 10),
(6, '1', '2018-05-11 10:51:49', 'thurgghjj\r\n', 27, 9),
(7, '2', '2018-05-11 11:29:50', 'j\'ai un problème avec mon capteur ', 27, 9),
(8, '2', '2018-05-15 15:05:52', 'ce captenbfsdbfkj', 27, 9);

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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pieces`
--

INSERT INTO `pieces` (`id`, `type`, `nom`, `surface`, `id_user`, `id_habitation`) VALUES
(21, 'cave', 'cave à vin', 30, 26, 6),
(16, 'salon', 'Salle à fumer', 10, 26, 6),
(17, 'cuisine', 'cuisine maman', 7, 26, 6),
(32, 'salle_de_bain', 'salle du haut', 10, 26, 6),
(36, 'chambre', 'Chambre de Max', 10, 26, 6),
(50, 'cuisine', 'hello', 12, 27, 7),
(53, 'cuisine', 'Cuisine', 13, 27, 7),
(39, 'salon', 'Saloon', 45, 27, 7),
(51, 'cave', 'Ma Cave', 34, 27, 7),
(41, 'salon', 'Grand Salon', 345, 27, 9),
(42, 'entree', 'Entreee', 23, 27, 9),
(43, 'cuisine', 'Cuisina', 23, 28, 11),
(44, 'salon', 'saloooon', 22, 28, 13),
(45, 'entree', 'zeojf', 23, 28, 14),
(46, 'entree', 're', 34, 28, 16),
(47, 'salon', 'grezdfz', 23, 28, 16),
(48, 'toilettes', 'fdfz', 43, 28, 16),
(49, 'chambre', 'C1', 34, 29, 17),
(52, 'salle_de_bain', 'Test', 12, 27, 7),
(54, 'cave', 'Man Cave', 0, 30, 18),
(55, 'toilettes', 'Water closet', 41, 30, 18),
(56, 'salle_de_bain', 'Salle à Manger', 10, 30, 18),
(57, 'cave', 'Grenier', 8888, 30, 18),
(58, 'grenier', 'Cave', 8888, 30, 18),
(59, 'entree', 'Mot Elfique', 5, 31, 19),
(60, 'salon', 'Lounge', 50, 31, 19),
(61, 'salle_de_bain', 'H2O', 28, 31, 19),
(62, 'cuisine', 'Kuisine', 45, 31, 19),
(63, 'chambre', 'Grande Chambre', 45, 33, 20),
(64, 'entree', 'Entrée', 30, 33, 20),
(65, 'salle_de_bain', 'SdB 1', 20, 33, 20);

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
-- Structure de la table `stats`
--

DROP TABLE IF EXISTS `stats`;
CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `date` datetime(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stats`
--

INSERT INTO `stats` (`id`, `type`, `date`) VALUES
(1, 'connexion', '2018-06-05 07:25:56.000000'),
(2, 'connexion', '2018-06-05 07:26:34.000000'),
(3, 'connexion', '2018-06-04 07:26:34.000000'),
(4, 'connexion', '2018-06-01 00:00:00.000000'),
(5, 'connexion', '2018-06-02 00:00:00.000000'),
(6, 'connexion', '2018-05-30 00:00:00.000000'),
(7, 'connexion', '2018-05-30 00:00:00.000000'),
(8, 'connexion', '2018-07-31 00:00:00.000000'),
(9, 'connexion', '2018-05-31 00:00:00.000000'),
(10, 'connexion', '2018-06-01 00:00:00.000000'),
(11, 'connexion', '2018-07-31 00:00:00.000000'),
(12, 'connexion', '2018-06-06 07:12:22.000000'),
(13, 'connexion', '2018-06-10 07:33:45.000000'),
(14, 'connexion', '2018-06-06 09:06:52.000000'),
(15, 'connexion', '2018-06-06 09:35:02.000000'),
(16, 'connexion', '2018-06-06 09:41:37.000000'),
(17, 'connexion', '2018-06-06 12:20:16.000000'),
(18, 'connexion', '2018-06-06 12:21:14.000000'),
(19, 'connexion', '2018-06-06 12:21:29.000000'),
(20, 'connexion', '2018-06-06 12:21:50.000000');

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
-- Structure de la table `trame_courante`
--

DROP TABLE IF EXISTS `trame_courante`;
CREATE TABLE IF NOT EXISTS `trame_courante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_habitation` int(11) DEFAULT NULL,
  `id_piece` int(11) DEFAULT NULL,
  `type_trame` int(1) NOT NULL,
  `num_objet` varchar(4) NOT NULL,
  `type_req` int(1) NOT NULL,
  `type_capteur` int(1) NOT NULL,
  `num_capteur` varchar(2) NOT NULL,
  `valeur` varchar(4) NOT NULL,
  `tim` varchar(4) NOT NULL,
  `checksum` varchar(2) NOT NULL,
  `timestamp` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=713 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `trame_courante`
--

INSERT INTO `trame_courante` (`id`, `id_user`, `id_habitation`, `id_piece`, `type_trame`, `num_objet`, `type_req`, `type_capteur`, `num_capteur`, `valeur`, `tim`, `checksum`, `timestamp`) VALUES
(1, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0666', '0000', '65', '20180117095035'),
(2, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0019', '0000', '5d', '20180117095328'),
(3, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180117102717'),
(4, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0666', '0000', '65', '20180117102740'),
(5, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180117102840'),
(6, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0666', '0000', '65', '20180119144504'),
(7, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0066', '0001', '60', '20180119144837'),
(8, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0026', '0000', '5b', '20180119145137'),
(9, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0123', '0001', '5a', '20180119151139'),
(10, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0020', '0000', '55', '20180119153230'),
(11, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0019', '0000', '5d', '20180119154103'),
(12, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0019', '0001', '5e', '20180119154234'),
(13, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119154935'),
(14, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155012'),
(15, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155710'),
(16, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155712'),
(17, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155713'),
(18, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155714'),
(19, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155715'),
(20, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155716'),
(21, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155717'),
(22, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155718'),
(23, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155719'),
(24, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155723'),
(25, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155724'),
(26, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155725'),
(27, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155900'),
(28, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119155943'),
(29, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119160125'),
(30, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0001', '0000', '54', '20180119160137'),
(31, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119160223'),
(32, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119160343'),
(33, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0001', '0000', '54', '20180119160354'),
(34, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0001', '0001', '55', '20180119160408'),
(35, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119161232'),
(36, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119161315'),
(37, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0001', '0000', '54', '20180119161351'),
(38, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119161604'),
(39, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119165938'),
(40, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119170127'),
(41, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119171634'),
(42, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119171705'),
(43, NULL, NULL, NULL, 1, '009D', 1, 3, '02', '1265', '0128', '23', '20180119171753'),
(44, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184423'),
(45, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184440'),
(46, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184532'),
(47, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184533'),
(48, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184938'),
(49, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184941'),
(50, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184950'),
(51, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124184951'),
(52, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185048'),
(53, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185111'),
(54, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185112'),
(55, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185213'),
(56, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185323'),
(57, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185326'),
(58, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185330'),
(59, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185355'),
(60, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185407'),
(61, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185410'),
(62, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185535'),
(63, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185552'),
(64, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185558'),
(65, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185559'),
(66, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185608'),
(67, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185611'),
(68, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185636'),
(69, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0126', '1B', '20180124185637'),
(70, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126102920'),
(71, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126102938'),
(72, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126102951'),
(73, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103010'),
(74, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103412'),
(75, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103441'),
(76, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103444'),
(77, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103455'),
(78, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103522'),
(79, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103602'),
(80, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103632'),
(81, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103734'),
(82, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103742'),
(83, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103744'),
(84, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103745'),
(85, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103746'),
(86, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103747'),
(87, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103748'),
(88, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103749'),
(89, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103752'),
(90, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103753'),
(91, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103754'),
(92, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103755'),
(93, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103756'),
(94, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103757'),
(95, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103759'),
(96, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103801'),
(97, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103802'),
(98, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103803'),
(99, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103851'),
(100, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103852'),
(101, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103853'),
(102, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103854'),
(103, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103856'),
(104, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103857'),
(105, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103858'),
(106, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103859'),
(107, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103900'),
(108, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103902'),
(109, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103904'),
(110, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103905'),
(111, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103906'),
(112, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103907'),
(113, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103908'),
(114, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103910'),
(115, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103912'),
(116, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103913'),
(117, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103914'),
(118, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103915'),
(119, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103917'),
(120, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103918'),
(121, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103920'),
(122, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103921'),
(123, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103922'),
(124, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126103923'),
(125, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104004'),
(126, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104005'),
(127, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104007'),
(128, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104008'),
(129, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104010'),
(130, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104011'),
(131, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104012'),
(132, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104013'),
(133, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104015'),
(134, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104016'),
(135, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104017'),
(136, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104018'),
(137, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104019'),
(138, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104020'),
(139, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104022'),
(140, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104023'),
(141, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104024'),
(142, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104025'),
(143, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104026'),
(144, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104027'),
(145, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104029'),
(146, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104030'),
(147, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104031'),
(148, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104032'),
(149, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104033'),
(150, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104034'),
(151, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104036'),
(152, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104037'),
(153, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104039'),
(154, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104040'),
(155, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104041'),
(156, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104043'),
(157, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126104044'),
(158, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105142'),
(159, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105155'),
(160, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105156'),
(161, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105157'),
(162, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105158'),
(163, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105159'),
(164, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105201'),
(165, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105202'),
(166, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105203'),
(167, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105204'),
(168, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105205'),
(169, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105220'),
(170, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105221'),
(171, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105223'),
(172, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105224'),
(173, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105227'),
(174, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105228'),
(175, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105229'),
(176, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105230'),
(177, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105231'),
(178, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105232'),
(179, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105234'),
(180, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105235'),
(181, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105236'),
(182, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105237'),
(183, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105238'),
(184, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105239'),
(185, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105241'),
(186, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105242'),
(187, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105243'),
(188, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105244'),
(189, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105245'),
(190, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105246'),
(191, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105249'),
(192, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105250'),
(193, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105251'),
(194, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105252'),
(195, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105254'),
(196, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105255'),
(197, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105257'),
(198, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105258'),
(199, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105259'),
(200, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105300'),
(201, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105301'),
(202, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105302'),
(203, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105304'),
(204, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105305'),
(205, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105306'),
(206, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105307'),
(207, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105308'),
(208, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105309'),
(209, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105311'),
(210, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105312'),
(211, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105313'),
(212, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105314'),
(213, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '002B', '0127', '1B', '20180126105315'),
(214, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0019', '0127', '1B', '20180519162145'),
(215, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0016', '0127', '1B', '20180519162147'),
(216, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '001F', '0127', '1B', '20180522090700'),
(217, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0015', '0127', '1B', '20180522091401'),
(218, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0023', '0127', '1B', '20180522091734'),
(219, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0022', '0127', '1B', '20180522091735'),
(220, NULL, NULL, NULL, 1, '009D', 1, 3, '01', 'FFFF', '0127', '1B', '20180522165456'),
(221, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184931'),
(222, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184936'),
(223, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184939'),
(224, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184941'),
(225, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184943'),
(226, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184944'),
(227, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184946'),
(228, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184948'),
(229, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184951'),
(230, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184953'),
(231, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184955'),
(232, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184956'),
(233, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522184958'),
(234, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185000'),
(235, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185001'),
(236, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185004'),
(237, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185006'),
(238, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185007'),
(239, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185009'),
(240, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185012'),
(241, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185013'),
(242, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185015'),
(243, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185017'),
(244, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185020'),
(245, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185022'),
(246, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185024'),
(247, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185025'),
(248, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185027'),
(249, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185029'),
(250, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185030'),
(251, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185033'),
(252, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185035'),
(253, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185038'),
(254, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185040'),
(255, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185043'),
(256, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185045'),
(257, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185047'),
(258, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185048'),
(259, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185050'),
(260, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185052'),
(261, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185055'),
(262, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185057'),
(263, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185059'),
(264, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185100'),
(265, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185102'),
(266, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185104'),
(267, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185107'),
(268, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185109'),
(269, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185113'),
(270, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185115'),
(271, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185118'),
(272, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185120'),
(273, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185122'),
(274, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185123'),
(275, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185125'),
(276, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185127'),
(277, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185130'),
(278, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185133'),
(279, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185136'),
(280, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185138'),
(281, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185141'),
(282, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185143'),
(283, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185147'),
(284, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185149'),
(285, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185151'),
(286, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185152'),
(287, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185154'),
(288, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185156'),
(289, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185159'),
(290, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185201'),
(291, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185203'),
(292, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185204'),
(293, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185206'),
(294, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185208'),
(295, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185211'),
(296, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185213'),
(297, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185217'),
(298, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185219'),
(299, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185222'),
(300, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185224'),
(301, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185226'),
(302, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185227'),
(303, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185229'),
(304, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185231'),
(305, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185234'),
(306, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185237'),
(307, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185240'),
(308, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185242'),
(309, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185245'),
(310, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185247'),
(311, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185249'),
(312, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185250'),
(313, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185252'),
(314, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185254'),
(315, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185257'),
(316, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185259'),
(317, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185301'),
(318, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185302'),
(319, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185304'),
(320, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185307'),
(321, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185308'),
(322, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185310'),
(323, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185312'),
(324, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185315'),
(325, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185317'),
(326, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185321'),
(327, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185323'),
(328, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185326'),
(329, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185328'),
(330, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185330'),
(331, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185331'),
(332, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185333'),
(333, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185335'),
(334, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185336'),
(335, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185339'),
(336, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185341'),
(337, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185344'),
(338, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185346'),
(339, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185349'),
(340, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185351'),
(341, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185353'),
(342, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522185354'),
(343, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0010', '1271', 'B1', '20180522185356'),
(344, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193503'),
(345, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193504'),
(346, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193506'),
(347, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193508'),
(348, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193509'),
(349, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193511'),
(350, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193513'),
(351, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193516'),
(352, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193518'),
(353, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193520'),
(354, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193521'),
(355, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193523'),
(356, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193525'),
(357, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193528'),
(358, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193530'),
(359, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193532'),
(360, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193533'),
(361, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193535'),
(362, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193537'),
(363, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193540'),
(364, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193542'),
(365, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193545'),
(366, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193547'),
(367, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193549'),
(368, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193550'),
(369, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193552'),
(370, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193554'),
(371, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193557'),
(372, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193559'),
(373, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193601'),
(374, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193602'),
(375, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193604'),
(376, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193606'),
(377, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193609'),
(378, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193611'),
(379, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193614'),
(380, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193616'),
(381, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193618'),
(382, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193619'),
(383, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193621'),
(384, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193623'),
(385, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193626'),
(386, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193628'),
(387, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193630'),
(388, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193631'),
(389, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193633'),
(390, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193635'),
(391, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193638'),
(392, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193640'),
(393, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193643'),
(394, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193645'),
(395, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193647'),
(396, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193648'),
(397, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193650'),
(398, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193652'),
(399, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193655'),
(400, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193657'),
(401, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193659'),
(402, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193700'),
(403, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193702'),
(404, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193704'),
(405, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193707'),
(406, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193709'),
(407, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193711'),
(408, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193712'),
(409, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193714'),
(410, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193716'),
(411, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193717'),
(412, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193719'),
(413, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193721'),
(414, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193724'),
(415, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193726'),
(416, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193728'),
(417, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193729'),
(418, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193731'),
(419, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193733'),
(420, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193736'),
(421, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193738'),
(422, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193740'),
(423, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193741'),
(424, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193743'),
(425, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193745'),
(426, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193748'),
(427, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193750'),
(428, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193753'),
(429, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193755'),
(430, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193757'),
(431, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193758'),
(432, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193800'),
(433, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193802'),
(434, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193805'),
(435, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193807'),
(436, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193809'),
(437, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193810'),
(438, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193812'),
(439, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193814'),
(440, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193817'),
(441, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193819'),
(442, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193822'),
(443, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193824'),
(444, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193826'),
(445, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193827'),
(446, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193829'),
(447, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193831'),
(448, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193834'),
(449, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193836'),
(450, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193838'),
(451, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193839'),
(452, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193841'),
(453, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193843'),
(454, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193846'),
(455, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193848'),
(456, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '1B', '20180522193851'),
(457, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0017', '0127', '10', '20180522193853'),
(458, NULL, NULL, NULL, 1, '009D', 1, 3, '01', '0008', '0127', '1B', '20180523115630'),
(459, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605094636'),
(460, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '004A', '0ECR', '0\0', '20180605094640'),
(461, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0048', '0ECR', '0\0', '20180605094646'),
(462, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605094647'),
(463, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0048', '0ECR', '0\0', '20180605094653'),
(464, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '003A', '0ECR', '0\0', '20180605094659'),
(465, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094700'),
(466, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '003B', '0ECR', '0\0', '20180605094706'),
(467, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0044', '0ECR', '0\0', '20180605094712'),
(468, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094713'),
(469, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0035', '0ECR', '0\0', '20180605094719'),
(470, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '003D', '0ECR', '0\0', '20180605094726'),
(471, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605094732'),
(472, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094739'),
(473, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094745'),
(474, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605094752'),
(475, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094758'),
(476, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605094804'),
(477, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094805'),
(478, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605094811'),
(479, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0037', '0ECR', '0\0', '20180605094818'),
(480, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0047', '0ECR', '0\0', '20180605094824'),
(481, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094825'),
(482, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094831'),
(483, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094837'),
(484, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094838'),
(485, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094844'),
(486, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094850'),
(487, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094851'),
(488, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094857'),
(489, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094903'),
(490, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094904'),
(491, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605094910'),
(492, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605094916'),
(493, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094917'),
(494, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605094923'),
(495, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094929'),
(496, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094930'),
(497, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094936'),
(498, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605094943'),
(499, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605094949'),
(500, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605094955'),
(501, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605094956'),
(502, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095002'),
(503, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095008'),
(504, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095009'),
(505, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095015'),
(506, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095022'),
(507, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095028'),
(508, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095035'),
(509, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095041'),
(510, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095047'),
(511, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095048'),
(512, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095054'),
(513, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095100'),
(514, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095101'),
(515, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095107'),
(516, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095113'),
(517, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095114'),
(518, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605095120'),
(519, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095126'),
(520, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095127'),
(521, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0039', '0ECR', '0\0', '20180605095133'),
(522, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095140'),
(523, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605095146'),
(524, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095159'),
(525, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095206'),
(526, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095212'),
(527, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095219'),
(528, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095225'),
(529, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095226'),
(530, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095232'),
(531, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095238'),
(532, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095239'),
(533, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095245'),
(534, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095251'),
(535, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095252'),
(536, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095258'),
(537, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0034', '0ECR', '0\0', '20180605095304'),
(538, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605095305'),
(539, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095311'),
(540, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095317'),
(541, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095318'),
(542, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095324'),
(543, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095331'),
(544, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095337'),
(545, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095343'),
(546, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095344'),
(547, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095350'),
(548, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095356'),
(549, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095357'),
(550, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0036', '0ECR', '0\0', '20180605095403'),
(551, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0036', '0ECR', '0\0', '20180605095409'),
(552, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095410'),
(553, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095416'),
(554, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095423'),
(555, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095429'),
(556, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095436'),
(557, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605095442'),
(558, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605095448'),
(559, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095449'),
(560, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095455'),
(561, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095502'),
(562, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095508'),
(563, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605095514'),
(564, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095515'),
(565, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095521'),
(566, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095528'),
(567, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095534'),
(568, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095541'),
(569, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095547'),
(570, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095554'),
(571, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0034', '0ECR', '0\0', '20180605095600'),
(572, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095607'),
(573, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095613'),
(574, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095614'),
(575, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0030', '0ECR', '0\0', '20180605095620'),
(576, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095626'),
(577, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095627'),
(578, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095633');
INSERT INTO `trame_courante` (`id`, `id_user`, `id_habitation`, `id_piece`, `type_trame`, `num_objet`, `type_req`, `type_capteur`, `num_capteur`, `valeur`, `tim`, `checksum`, `timestamp`) VALUES
(579, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095639'),
(580, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095640'),
(581, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605095646'),
(582, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605095652'),
(583, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095653'),
(584, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095659'),
(585, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095705'),
(586, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095706'),
(587, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095712'),
(588, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095718'),
(589, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095719'),
(590, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095725'),
(591, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095731'),
(592, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095732'),
(593, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095738'),
(594, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095745'),
(595, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095751'),
(596, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095757'),
(597, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095758'),
(598, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095804'),
(599, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605095810'),
(600, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095811'),
(601, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605095817'),
(602, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095824'),
(603, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095830'),
(604, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095836'),
(605, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095837'),
(606, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095843'),
(607, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095849'),
(608, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095850'),
(609, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002F', '0ECR', '0\0', '20180605095856'),
(610, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095902'),
(611, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095903'),
(612, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095909'),
(613, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095916'),
(614, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095922'),
(615, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605095929'),
(616, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095935'),
(617, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095942'),
(618, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095948'),
(619, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605095954'),
(620, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605095955'),
(621, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100001'),
(622, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100008'),
(623, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100014'),
(624, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100015'),
(625, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100021'),
(626, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100027'),
(627, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100028'),
(628, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100034'),
(629, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100040'),
(630, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100041'),
(631, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100047'),
(632, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100053'),
(633, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100054'),
(634, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100100'),
(635, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100106'),
(636, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100107'),
(637, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100113'),
(638, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100119'),
(639, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100120'),
(640, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605100126'),
(641, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100133'),
(642, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100139'),
(643, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100145'),
(644, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100146'),
(645, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100152'),
(646, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605100158'),
(647, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100159'),
(648, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100205'),
(649, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100211'),
(650, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100212'),
(651, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100218'),
(652, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100225'),
(653, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100231'),
(654, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100237'),
(655, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100238'),
(656, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100244'),
(657, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100250'),
(658, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605100251'),
(659, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100257'),
(660, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100304'),
(661, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605100310'),
(662, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605100317'),
(663, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100323'),
(664, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100330'),
(665, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100336'),
(666, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100343'),
(667, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100349'),
(668, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002B', '0ECR', '0\0', '20180605100356'),
(669, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002E', '0ECR', '0\0', '20180605100402'),
(670, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002A', '0ECR', '0\0', '20180605100409'),
(671, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0006', '0ECR', '0\0', '20180605100410'),
(672, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002A', '0ECR', '0\0', '20180605102007'),
(673, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0023', '0ECR', '0\0', '20180605102013'),
(674, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605102014'),
(675, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0023', '0ECR', '0\0', '20180605102021'),
(676, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0021', '0ECR', '0\0', '20180605102026'),
(677, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605102027'),
(678, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0025', '0ECR', '0\0', '20180605102033'),
(679, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0024', '0ECR', '0\0', '20180605102040'),
(680, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0024', '0ECR', '0\0', '20180605102046'),
(681, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0023', '0ECR', '0\0', '20180605102053'),
(682, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0024', '0ECR', '0\0', '20180605102059'),
(683, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0025', '0ECR', '0\0', '20180605102106'),
(684, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0024', '0ECR', '0\0', '20180605102112'),
(685, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0023', '0ECR', '0\0', '20180605102119'),
(686, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0023', '0ECR', '0\0', '20180605102125'),
(687, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605102126'),
(688, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605102132'),
(689, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0033', '0ECR', '0\0', '20180605102138'),
(690, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605102139'),
(691, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0035', '0ECR', '0\0', '20180605103017'),
(692, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605103018'),
(693, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0032', '0ECR', '0\0', '20180605103024'),
(694, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '003F', '0ECR', '0\0', '20180605103030'),
(695, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605103031'),
(696, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0039', '0ECR', '0\0', '20180605103037'),
(697, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0028', '0ECR', '0\0', '20180605103043'),
(698, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605103044'),
(699, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0029', '0ECR', '0\0', '20180605103050'),
(700, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002D', '0ECR', '0\0', '20180605103056'),
(701, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605103057'),
(702, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0044', '0ECR', '0\0', '20180605103103'),
(703, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605103631'),
(704, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0027', '0ECR', '0\0', '20180605103637'),
(705, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605103638'),
(706, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0024', '0ECR', '0\0', '20180605103644'),
(707, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0021', '0ECR', '0\0', '20180605103650'),
(708, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0009', '0ECR', '0\0', '20180605103651'),
(709, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0029', '0ECR', '0\0', '20180605103657'),
(710, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '002C', '0ECR', '0\0', '20180605103703'),
(711, NULL, NULL, NULL, 1, '009D', 1, 1, '02', '0008', '0ECR', '0\0', '20180605103704'),
(712, NULL, NULL, NULL, 1, '009D', 1, 1, '01', '0031', '0ECR', '0\0', '20180605103710');

-- --------------------------------------------------------

--
-- Structure de la table `trame_rapide`
--

DROP TABLE IF EXISTS `trame_rapide`;
CREATE TABLE IF NOT EXISTS `trame_rapide` (
  `id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_habitation` int(11) DEFAULT NULL,
  `id_piece` int(11) DEFAULT NULL,
  `type_trame` int(1) DEFAULT NULL,
  `num_objet` varchar(4) DEFAULT NULL,
  `type_req` int(1) DEFAULT NULL,
  `type_capteur` int(1) DEFAULT NULL,
  `nbr` int(1) DEFAULT NULL,
  `donnees` int(1) DEFAULT NULL,
  `checksum` varchar(2) DEFAULT NULL,
  `timestamp` varchar(14) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `name`, `firstname`, `address`, `postal_code`, `city`, `country`, `phone_number_home`, `phone_number_portable`, `type`, `pass_token`, `date`) VALUES
(20, 'famille.lebec@wanadoo.fr', '558e62b37930a34393f7f997985186b167d3321a', 'Lebec', 'Aude', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 22929229, 92929292, '2', NULL, '2018-06-01 11:15:28'),
(19, 'maxence.lbc@gmail.com', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Maxence', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 101010101, 101010101, '2', NULL, '2018-06-02 11:15:28'),
(22, 'andreas365@hotmail.fr', 'e4ff4ad07cfd70e0f373b21ebfd575d144c34f9f', 'Lebec', 'Andreas', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101012, '2', NULL, '2018-06-03 11:15:28'),
(26, 'cresc.lebec@hotmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Cresc', '12 rue waldeck rousseau', 92600, 'Asnières-sur-Seine', 'France', 1010101010, 1010101010, '2', NULL, '2018-06-03 11:15:28'),
(27, 'vlebrun@juniorisep.com', 'e78444dc0758cb0f6e3345e633dc16da0e4b7d9b', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, '2', NULL, '2018-06-03 11:15:28'),
(28, 'pherisson@juniorisep.com', '65a4b98bb4f8b59adf3162b26e85b3b4cc36da18', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, '2', NULL, '2018-06-03 11:15:28'),
(29, 'tlincoln@isep.fr', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', 'Lincoln', 'Thierry', '54 rue du Ranelagh', 75016, 'Paris', 'France', 0, 625757865, '2', NULL, '2018-06-03 11:15:28'),
(31, 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Nguyen', 'Test', NULL, 44800, NULL, 'France', NULL, NULL, '2', NULL, '2018-06-05 11:15:28'),
(32, 'clmes43@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, '2018-06-06 11:12:28'),
(33, 'victorlebrun@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Lebrun', 'Victor', '54 rue du Ranelagh', 75016, 'Paris', 'France', 100000000, 625757865, '2', NULL, '2018-06-06 11:15:28'),
(34, 'maxence.lebec@gmail.com', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', 'Lebec', 'Maxence', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2018-06-06 14:19:15'),
(35, 'maxence.lebec@gmail.fr', 'cc973650fc0eb46f555fa7ad705b9b26793e24fe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, '2018-06-06 14:19:50');

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
