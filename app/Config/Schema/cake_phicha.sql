-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Septembre 2015 à 10:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cake_phicha`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `content` longtext,
  `post_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `online` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(100) DEFAULT NULL,
	`content` text,
	`created` datetime DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created`) VALUES
(1, 'Rapid application development', 'Article content ...', '2015-06-20 23:38:33'),
(2, 'How to upload files', 'Article content ...', '2015-06-20 23:38:33'),
(3, 'Creating a plugin', 'Article content ...', '2015-06-20 23:38:33');

-- --------------------------------------------------------

--
-- Structure de la table `carousels`
--

CREATE TABLE IF NOT EXISTS `carousels` (
	`id` smallint(6) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`subtitle` varchar(200) NOT NULL,
	`slug` varchar(50) NOT NULL,
	`photographer` varchar(100) NOT NULL,
	`content` longtext NOT NULL,
	`type` varchar(20) NOT NULL DEFAULT 'gallerie',
	`photo` varchar(100) NOT NULL,
	`photo_dir` varchar(200) DEFAULT NULL,
	`online` tinyint(1) DEFAULT '1',
	`user_id` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`modified` datetime NOT NULL,
	`remove` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `carousels`
--

INSERT INTO `carousels` (`id`, `name`, `subtitle`, `slug`, `photographer`, `content`, `type`, `photo`, `photo_dir`, `online`, `user_id`, `created`, `modified`, `remove`) VALUES
(1, 'jean', '', 'jean', 'philippe', '', 'image/jpeg', '20150703_095603.jpg', '1', 1, 0, '2015-09-24 18:04:50', '2015-09-24 20:26:52', 0),
(3, 'leon', '', 'leon', 'philippe', '', 'image/jpeg', '20150706_133938.jpg', '3', 0, 0, '2015-09-24 18:54:19', '2015-09-24 20:55:10', 0),
(4, 'compostelle', '', '', 'philippe', '', 'image/jpeg', '20150711_091035.jpg', '4', 0, 0, '2015-09-24 19:47:08', '2015-09-24 21:47:08', 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`slug` varchar(255) NOT NULL,
	`post_count` int(11) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `enews`
--

CREATE TABLE IF NOT EXISTS `enews` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`mail` varchar(255) NOT NULL,
	`created` datetime NOT NULL,
	`modified` datetime NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `enews`
--

INSERT INTO `enews` (`id`, `mail`, `created`, `modified`) VALUES
(1, 'philippe@sfr.fr', '2015-09-24 18:52:19', '2015-09-24 18:52:19');

-- --------------------------------------------------------

--
-- Structure de la table `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
	`id` smallint(6) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`subtitle` varchar(200) NOT NULL,
	`slug` varchar(50) NOT NULL,
	`photographer` varchar(100) NOT NULL,
	`content` longtext NOT NULL,
	`type` varchar(20) NOT NULL DEFAULT 'gallerie',
	`photo` varchar(100) NOT NULL,
	`photo_dir` varchar(200) DEFAULT NULL,
	`online` tinyint(1) DEFAULT '1',
	`user_id` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`modified` datetime NOT NULL,
	`remove` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `homes`
--

INSERT INTO `homes` (`id`, `name`, `subtitle`, `slug`, `photographer`, `content`, `type`, `photo`, `photo_dir`, `online`, `user_id`, `created`, `modified`, `remove`) VALUES
(2, 'puente la reina', '', 'puente', 'philippe', '', 'image/jpeg', '20150706_194107.jpg', '2', 1, 0, '2015-09-24 20:41:15', '2015-09-24 22:45:58', 0),
(3, '', '', '', '', '', 'image/jpeg', '20150712_095114.jpg', '3', 0, 0, '2015-09-24 21:13:52', '2015-09-24 23:13:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`type` varchar(10) DEFAULT 'image',
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`file` varchar(255) DEFAULT NULL,
	`ref` varchar(250) NOT NULL,
	`ref_id` int(20) NOT NULL,
	`position` int(11) NOT NULL DEFAULT '0',
	`name` varchar(200) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `portfolios`
--

CREATE TABLE IF NOT EXISTS `portfolios` (
	`id` smallint(6) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`subtitle` varchar(200) NOT NULL,
	`slug` varchar(50) NOT NULL,
	`photographer` varchar(100) NOT NULL,
	`content` longtext NOT NULL,
	`type` varchar(20) NOT NULL DEFAULT 'gallerie',
	`photo` varchar(100) NOT NULL,
	`photo_dir` varchar(200) DEFAULT NULL,
	`online` tinyint(1) DEFAULT '1',
	`user_id` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`modified` datetime NOT NULL,
	`remove` tinyint(1) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `subtitle`, `slug`, `photographer`, `content`, `type`, `photo`, `photo_dir`, `online`, `user_id`, `created`, `modified`, `remove`) VALUES
(1, 'Mariages', '', 'mariage', 'philippe', '', 'image/jpeg', 'Chardon-Phil-11.jpg', '1', 1, 0, '2015-09-22 10:31:26', '2015-09-22 16:39:51', 0),
(2, 'Portraits', '', 'portraits', 'philippe', '', 'image/jpeg', 'portrait_005.jpg', '2', 1, 0, '2015-09-22 10:54:18', '2015-09-22 15:13:33', 0),
(3, 'Industries Paysages', '', 'industries', 'philippe', '', 'image/jpeg', 'g-m-395.jpg', '3', 1, 0, '2015-09-22 12:36:06', '2015-09-22 15:41:12', 0),
(4, 'architecture', '', 'gastronomie', 'philippe', '', 'image/jpeg', 'DidS17.jpg', '4', 1, 0, '2015-09-22 14:35:35', '2015-09-22 16:38:19', 0),
(5, 'gastronomie', '', 'gastronomie', 'philippe', '', 'image/jpeg', 'cch886.jpg', '5', 1, 0, '2015-09-22 14:39:02', '2015-09-22 16:39:02', 0),
(6, 'test', '', 'test', 'philippe', '', 'image/jpeg', '20150711_091035.jpg', '6', 1, 0, '2015-09-24 17:54:03', '2015-09-24 19:54:03', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) DEFAULT NULL,
	`slug` varchar(255) DEFAULT NULL,
	`content` text,
	`type` varchar(255) DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	`online` int(1) DEFAULT '0',
	`user_id` int(11) DEFAULT NULL,
	`category_id` int(1) DEFAULT '0',
	`media_id` int(11) NOT NULL,
	PRIMARY KEY (`id`),
	KEY `fk_posts_users1` (`user_id`),
	KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(150) NOT NULL,
	`username` varchar(255) DEFAULT NULL,
	`mail` varchar(255) DEFAULT NULL,
	`password` varchar(255) DEFAULT NULL,
	`firstname` varchar(255) DEFAULT NULL,
	`lastname` varchar(255) DEFAULT NULL,
	`active` tinyint(1) DEFAULT '0',
	`avatar` int(1) DEFAULT '1',
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	`role` varchar(50) NOT NULL DEFAULT 'member',
	`token` varchar(255) DEFAULT NULL,
	`lastlogin` datetime NOT NULL,
	PRIMARY KEY (`id`),
	KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `mail`, `password`, `firstname`, `lastname`, `active`, `avatar`, `created`, `modified`, `role`, `token`, `lastlogin`) VALUES
(1, '', 'philippe', 'atelfoto@msn.com', 'f75477a9e7b96de2812087154592b09153396896', '', NULL, 1, 1, '2015-09-21 22:45:18', '2015-09-24 22:22:27', 'admin', '', '2015-09-24 22:22:27'),
(2, '', 'tata', 'philippewagner2@sfr.fr', '498d8c85c26293ee656121cffca40eb4c27bbc38', NULL, NULL, 1, 1, '2015-09-24 16:42:19', '2015-09-24 16:51:23', 'admin', '', '2015-09-24 16:49:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ------------------------------------------------------------------

--
-- Structure de la table `meta`
--
CREATE TABLE IF NOT EXISTS `metas` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`robots` varchar(255) NOT NULL,
	`keywords` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- ------------------------------------------------------------------

--
-- Structure de la table `robots`
--
CREATE TABLE IF NOT EXISTS `robots` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `robots`
--

INSERT INTO `enews` (`id`, `name`) VALUES
(1, 'Index, Follow' ),
(2, 'No index, follow' ),
(3, 'Index, Nofollow' ),
(4, 'No index, no follow', );






