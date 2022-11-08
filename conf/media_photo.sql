-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 08 nov. 2022 à 15:38
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
-- Structure de la table `access_gallery_user`
--

DROP TABLE IF EXISTS `access_gallery_user`;
CREATE TABLE IF NOT EXISTS `access_gallery_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`gallery_id`,`user_id`),
  KEY `access_gallery_user_gallery_id_ibfk_1` (`gallery_id`),
  KEY `access_gallery_user_user_id_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gallery_to_tag`
--

DROP TABLE IF EXISTS `gallery_to_tag`;
CREATE TABLE IF NOT EXISTS `gallery_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tag_id`,`gallery_id`),
  KEY `gallery_to_tag_tag_id_ibfk_1` (`tag_id`),
  KEY `gallery_to_tag_gallery_id_ibfk_1` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `picture_to_gallery`
--

DROP TABLE IF EXISTS `picture_to_gallery`;
CREATE TABLE IF NOT EXISTS `picture_to_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`gallery_id`,`picture_id`),
  KEY `picture_to_gallery_gallery_id_ibfk_1` (`gallery_id`),
  KEY `picture_to_gallery_picture_id_ibfk_1` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `picture_to_tag`
--

DROP TABLE IF EXISTS `picture_to_tag`;
CREATE TABLE IF NOT EXISTS `picture_to_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tag_id`,`picture_id`),
  KEY `picture_to_tag_tag_id_ibfk_1` (`tag_id`),
  KEY `picture_to_tag_picture_id_ibfk_1` (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `passeword` text,
  `gallery_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `users_gallery_id_ibfk_1` (`gallery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `access_gallery_user`
--
ALTER TABLE `access_gallery_user`
  ADD CONSTRAINT `access_gallery_user_gallery_id_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `access_gallery_user_user_id_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gallery_to_tag`
--
ALTER TABLE `gallery_to_tag`
  ADD CONSTRAINT `gallery_to_tag_gallery_id_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `gallery_to_tag_tag_id_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `picture_to_gallery`
--
ALTER TABLE `picture_to_gallery`
  ADD CONSTRAINT `picture_to_gallery_gallery_id_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `picture_to_gallery_picture_id_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`);

--
-- Contraintes pour la table `picture_to_tag`
--
ALTER TABLE `picture_to_tag`
  ADD CONSTRAINT `picture_to_tag_picture_id_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `picture_to_tag_tag_id_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `users_gallery_id_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
