CREATE DATABASE IF NOT EXISTS moviewise;

use moviewise;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `isAdmin` boolean NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`username`, `password`, `email`, `isAdmin`) VALUES
('userOne', 'qwerty1234', 'userone@example.com', false),
('userTwo', 'qwerty1234', 'usertwo@example.com', false),
('adminUser', 'qwerty1234', 'admin@example.com', true),
('userThree', 'qwerty1234', 'userthree@example.com', false),
('userFour', 'qwerty1234', 'userfour@example.com', false),
('userFive', 'qwerty1234', 'userfive@example.com', false),
('userSix', 'qwerty1234', 'usersix@example.com', false),
('userSeven', 'qwerty1234', 'userseven@example.com', false),
('userEight', 'qwerty1234', 'usereight@example.com', false),
('userNine', 'qwerty1234', 'usernine@example.com', false);