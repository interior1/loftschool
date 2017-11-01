SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `burger` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `burger`;

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `client` (`id`, `name`, `phone`, `email`) VALUES
(1,	'Ivan',	'+79214445566',	'ivan@rambler.ru'),
(2,	'Вася',	'89114447733',	'vasya@yandex.ru'),
(3,	'Igor',	'+7 (345) 634 56 34',	'igor@mail.ru'),
(5,	'Юра',	'+7 (456) 746 57 45',	'u@mail.ru');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `str` varchar(100) DEFAULT NULL,
  `home` varchar(10) DEFAULT NULL,
  `korp` varchar(10) DEFAULT NULL,
  `flat` varchar(10) DEFAULT NULL,
  `floor` smallint(6) DEFAULT NULL,
  `comm` text,
  `payment` tinyint(1) DEFAULT NULL,
  `callback` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orders` (`id`, `client_id`, `str`, `home`, `korp`, `flat`, `floor`, `comm`, `payment`, `callback`) VALUES
(1,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(2,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(3,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(4,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(5,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(6,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(7,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(8,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(9,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(10,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(11,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(12,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(13,	3,	'Pushkina',	'23',	'2',	'45',	7,	'fertgfertgfve',	1,	1),
(17,	5,	'Ленина',	'55',	'2',	'89',	10,	'вапрвапрвапи',	1,	1),
(18,	5,	'Ленина',	'55',	'2',	'89',	10,	'вапрвапрвапи',	1,	1);
