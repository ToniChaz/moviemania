CREATE DATABASE IF NOT EXISTS moviewise;

use moviewise;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `isAdmin` boolean NOT NULL DEFAULT false,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`username`, `email`, `isAdmin`) VALUES
('userOne', 'userone@example.com', false),
('userTwo', 'usertwo@example.com', false),
('adminUser', 'admin@example.com', true),
('userThree', 'userthree@example.com', false),
('userFour', 'userfour@example.com', false),
('userFive', 'userfive@example.com', false),
('userSix', 'usersix@example.com', false),
('userSeven', 'userseven@example.com', false),
('userEight', 'usereight@example.com', false),
('userNine', 'usernine@example.com', false);