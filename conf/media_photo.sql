-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 13 nov. 2022 à 10:36
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `media_photo`
--

-- --------------------------------------------------------

--
-- Structure de la table `access_user_gallery`
--

DROP TABLE IF EXISTS `access_user_gallery`;
CREATE TABLE IF NOT EXISTS `access_user_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `access_user_gallery_gallery_id` (`gallery_id`),
  KEY `access_user_gallery_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`),
  KEY `gallery_gallery_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

-- --------------------------------------------------------

--
-- Structure de la table `gallery_to_tag`
--

DROP TABLE IF EXISTS `gallery_to_tag`;
CREATE TABLE IF NOT EXISTS `gallery_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_to_tag_tag_id` (`tag_id`),
  KEY `gallery_to_tag_gallery_id` (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_to_tag`
--


-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  `file` text,
  `added_date` datetime DEFAULT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `picture_gallery_id` (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

-- --------------------------------------------------------

--
-- Structure de la table `picture_to_tag`
--

DROP TABLE IF EXISTS `picture_to_tag`;
CREATE TABLE IF NOT EXISTS `picture_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `picture_to_tag_tag_id` (`tag_id`),
  KEY `picture_to_tag_picture_id` (`picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture_to_tag`
--


-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `fullname` text,
  `mail_address` text,
  `password` text,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `access_user_gallery`
--
ALTER TABLE `access_user_gallery`
  ADD CONSTRAINT `access_user_gallery_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `access_user_gallery_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_gallery_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gallery_to_tag`
--
ALTER TABLE `gallery_to_tag`
  ADD CONSTRAINT `gallery_to_tag_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `gallery_to_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`);

--
-- Contraintes pour la table `picture_to_tag`
--
ALTER TABLE `picture_to_tag`
  ADD CONSTRAINT `picture_to_tag_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `picture_to_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
