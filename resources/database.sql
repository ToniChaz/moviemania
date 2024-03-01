CREATE DATABASE IF NOT EXISTS moviewise;

use moviewise;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `birthdate` date NOT NULL DEFAULT '0000-00-00',
  `email` varchar(100) NOT NULL DEFAULT '',
  `isAdmin` boolean NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`username`, `name`, `password`, `birthdate`, `email`, `isAdmin`) VALUES
('user1', 'User One', 'password1', '1990-01-15', 'user1@example.com', false),
('user2', 'User Two', 'password2', '1985-07-22', 'user2@example.com', true),
('user3', 'User Three', 'password3', '1978-04-10', 'user3@example.com', false),
('user4', 'User Four', 'password4', '1995-09-28', 'user4@example.com', false),
('user5', 'User Five', 'password5', '1982-11-03', 'user5@example.com', true),
('user6', 'User Six', 'password6', '1973-06-18', 'user6@example.com', false),
('user7', 'User Seven', 'password7', '1998-12-09', 'user7@example.com', false),
('user8', 'User Eight', 'password8', '1987-03-26', 'user8@example.com', true),
('user9', 'User Nine', 'password9', '1979-08-14', 'user9@example.com', false),
('user10', 'User Ten', 'password10', '1991-05-31', 'user10@example.com', false);
