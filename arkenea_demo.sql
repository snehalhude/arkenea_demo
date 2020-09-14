-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `dob`, `image`, `created`, `modified`) VALUES
(4,	'Snehal Hude',	'snehal@fghgf.com',	5675675675,	'gfhfghf',	'2020-09-10',	'Screen_Shot_2016-07-01_at_19_41_12(2).png',	'2020-09-12 12:21:55',	'0000-00-00 00:00:00'),
(6,	'Snehal Hude dfgdfgd',	'admin@admin.com',	4534534534,	'gdfgdf dfgd',	'0000-00-00',	'scan0185.jpg',	'2020-09-12 12:54:57',	'0000-00-00 00:00:00'),
(10,	'Snehal Hude',	'admin@admiddn.com',	5675675675,	'sdfdsf',	'2020-09-10',	'Screen_Shot_2016-07-01_at_19_28_07.png',	'2020-09-12 01:23:43',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL COMMENT 'for forget password',
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `is_verified` smallint(1) NOT NULL COMMENT '1=> Verified 0=>Not Verified',
  `status` smallint(1) NOT NULL COMMENT '1=> Active 0=>Inactive 2 => Pending',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `user_type`, `is_verified`, `status`, `created`, `modified`) VALUES
(1,	'Admin',	'admin@admin.com',	2147483647,	'e10adc3949ba59abbe56e057f20f883e',	'',	'admin',	1,	0,	'2020-07-05 13:01:44',	'2020-07-05 13:01:44'),
(10,	'Snehal Hude',	'snehal@gmail.com',	0,	'e10adc3949ba59abbe56e057f20f883e',	'',	'user',	0,	0,	'2020-09-12 01:25:24',	'0000-00-00 00:00:00');

-- 2020-09-12 11:27:41
