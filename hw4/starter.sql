SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `starter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `starter`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `password`, `name`, `age`, `description`, `photo`) VALUES
(19,	'petya',	'$2y$10$VphKUgZvby0GQFUdPeisLu0THAxLsvnDqjl5iGz7BSzfUzMh44zda',	'Петя',	'1995-03-10',	'Хороший парень',	'photos/73728ce9c584973907e42459a85a5a9f.jpg');