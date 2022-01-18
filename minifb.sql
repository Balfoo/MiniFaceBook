-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 01 jan. 2022 à 13:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `minifb`
--

-- --------------------------------------------------------

--
-- Structure de la table `ecrit`
--

DROP TABLE IF EXISTS `ecrit`;
CREATE TABLE IF NOT EXISTS `ecrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text,
  `dateEcrit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idAmi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ecrit`
--

INSERT INTO `ecrit` (`id`, `titre`, `contenu`, `dateEcrit`, `image`, `idAuteur`, `idAmi`) VALUES
(15, 'titre', 'J\'aime les kinders, on est d\'accord kinder c\'est enfant ?', '2021-12-30 04:12:32', NULL, 2, 3),
(14, 'titre', 'coucou toi', '2021-12-30 03:12:06', NULL, 3, 3),
(16, 'titre', 'test', '2021-12-30 04:12:33', NULL, 2, 3),
(19, 'titre', 'hola', '2021-12-30 04:12:02', NULL, 2, 3),
(11, 'teste id auteur', 'teste id auteur', '2021-12-02 09:12:39', NULL, 6, 3),
(18, 'titre', 'bite', '2021-12-30 04:12:06', NULL, 2, 3),
(12, 'cc ', 'CC comment ça vas tous !!', '2021-12-03 01:12:10', NULL, 5, 6),
(17, 'titre', 'test', '2021-12-30 04:12:46', NULL, 2, 3),
(20, 'titre', '18h', '2021-12-30 06:12:34', NULL, 2, 3),
(21, 'titre', 'test', '2021-12-30 18:03:26', NULL, 2, 3),
(22, 'titre', 'ok', '2021-12-30 18:03:00', NULL, 2, 3),
(23, 'titre', 'Cc coment ça va', '2021-12-30 22:02:57', NULL, 8, 3),
(24, 'titre', 'hello\r\n', '2021-12-30 22:10:13', NULL, 3, 3),
(25, 'titre', 'hello\r\n', '2021-12-30 22:12:11', NULL, 4, 2),
(26, 'titre', 'OMG\r\n', '2021-12-30 22:12:29', NULL, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

DROP TABLE IF EXISTS `lien`;
CREATE TABLE IF NOT EXISTS `lien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur1` int(11) NOT NULL,
  `idUtilisateur2` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`id`, `idUtilisateur1`, `idUtilisateur2`, `etat`) VALUES
(17, 2, 7, 'amis'),
(2, 2, 5, 'amis'),
(16, 6, 7, 'attente'),
(5, 5, 6, 'amis'),
(15, 6, 2, 'amis'),
(14, 6, 3, 'amis'),
(12, 3, 5, 'amis'),
(9, 2, 4, 'amis'),
(13, 3, 2, 'amis'),
(18, 8, 2, 'amis'),
(19, 8, 6, 'attente'),
(22, 4, 3, 'attente'),
(21, 3, 8, 'attente'),
(26, 9, 4, 'attente'),
(24, 4, 7, 'attente'),
(25, 6, 4, 'attente'),
(27, 9, 6, 'attente'),
(28, 9, 5, 'attente'),
(29, 9, 2, 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `remember` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `email`, `remember`, `avatar`, `genre`, `description`) VALUES
(2, 'florent', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'florent.hode@gmail?com', '0ccd03c8eac92dc6bc20b6b2b9131adf797089cc', NULL, 'Bueno', 'J\'adore les kinders surtout les Buenos'),
(3, 'remi', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', 'remi.leemann@gmail.com', NULL, NULL, 'Surprise', 'J\'adore le chocolat, mais en particulier les Kinder Surprises :D'),
(4, 'manu', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'manu.p@gmail.com', NULL, NULL, 'Bueno', 'Bueno, c\'est Bueno'),
(5, 'angele', '*FA0BB9CA9329D4F3FD4D91F116560BB5B4E0BADD', 'angelique0petit@gmail.com', 'a632bfe7af82f4f213590cb76e92bcc3c954e344', NULL, 'Choco\'bon', 'Les Choco\'Bon c\'est la vie même si ça fait grossir mdr'),
(6, 'louis', '*8132715747A8DAD79112E9D508C2B7D26C7879D2', 'louabal70@gmail.com', '5cd059614ecabc86d158899ccdc24ca6f7d1a230', NULL, 'Choco\'bon', 'Les kinderss c\'est pour les enfants... non pas pour moi ou alors je suis un grand enfant'),
(7, 'louise', '*BE2D99F9B0C4D8BB7A2DF59F1F5072039080E555', 'Louise.09@gmail.com', NULL, NULL, 'Choco\'bon', 'J\'adore Les kinder'),
(8, 'alexandra', '*F028FA6349DA23EDC6EB8F6083035B7E0C0A6692', 'alexandra@gmail.com', NULL, NULL, 'Barre', 'Kinder, c\'est de la Barre mdrr non ça c\'est Carambar'),
(9, 'clémence', '*272BF9367D7F096A3CF6F280595FC32046AFACDE', 'clemence@gmail.com', NULL, NULL, 'Surprise', 'Les Kinders <3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
