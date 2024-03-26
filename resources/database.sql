CREATE DATABASE IF NOT EXISTS moviemania;

use moviemania;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `birthdate` date NOT NULL DEFAULT '1900-01-01',
  `email` varchar(100) NOT NULL DEFAULT '',
  `isAdmin` boolean NOT NULL DEFAULT false,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT 0,
  `refresh_token` varchar(60) NOT NULL DEFAULT '',
  `refresh_token_expires` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `name`, `password`, `birthdate`, `email`, `isAdmin`) VALUES
('admin1', 'John Smith', 'password1', '1990-01-15', 'john.smith@gmail.com', true),
('admin2', 'Emma Johnson', 'password2', '1985-07-22', 'emma.johnson@yahoo.com', true),
('admin3', 'Michael Brown', 'password3', '1978-04-10', 'michael.brown@hotmail.com', true),
('user4', 'Jennifer Martinez', 'password4', '1995-09-28', 'jennifer.martinez@aol.com', false),
('user5', 'David Lee', 'password5', '1982-11-03', 'david.lee@outlook.com', false),
('user6', 'Lisa Taylor', 'password6', '1973-06-18', 'lisa.taylor@gmail.com', false),
('user7', 'Christopher Wilson', 'password7', '1998-12-09', 'christopher.wilson@yahoo.com', false),
('user8', 'Sarah Garcia', 'password8', '1987-03-26', 'sarah.garcia@hotmail.com', false),
('user9', 'James Rodriguez', 'password9', '1979-08-14', 'james.rodriguez@aol.com', false),
('user10', 'Emily Martinez', 'password10', '1991-05-31', 'emily.martinez@outlook.com', false),
('user11', 'Daniel Thompson', 'password11', '1999-09-21', 'daniel.thompson@gmail.com', false),
('user12', 'Jessica Davis', 'password12', '1986-02-12', 'jessica.davis@yahoo.com', false),
('user13', 'Ryan Hernandez', 'password13', '1978-07-05', 'ryan.hernandez@hotmail.com', false),
('user14', 'Megan Lopez', 'password14', '1995-10-18', 'megan.lopez@aol.com', false),
('user15', 'Matthew Martinez', 'password15', '1980-11-24', 'matthew.martinez@outlook.com', false),
('user16', 'Ashley Lee', 'password16', '1972-06-29', 'ashley.lee@gmail.com', false),
('user17', 'Aiden Brown', 'password17', '1997-12-11', 'aiden.brown@yahoo.com', false),
('user18', 'Olivia Taylor', 'password18', '1989-03-27', 'olivia.taylor@hotmail.com', false),
('user19', 'Ethan Jackson', 'password19', '1981-08-15', 'ethan.jackson@aol.com', false),
('user20', 'Madison Harris', 'password20', '1992-05-01', 'madison.harris@outlook.com', false),
('user21', 'Noah Wilson', 'password21', '1975-01-22', 'noah.wilson@gmail.com', false),
('user22', 'Chloe Martinez', 'password22', '1998-10-03', 'chloe.martinez@yahoo.com', false),
('user23', 'William Brown', 'password23', '1984-06-14', 'william.brown@hotmail.com', false),
('user24', 'Ava Rodriguez', 'password24', '1977-04-07', 'ava.rodriguez@aol.com', false),
('user25', 'Logan Taylor', 'password25', '1993-09-24', 'logan.taylor@outlook.com', false),
('user26', 'Harper Johnson', 'password26', '1988-02-20', 'harper.johnson@gmail.com', false),
('user27', 'Alexander Garcia', 'password27', '1973-07-12', 'alexander.garcia@yahoo.com', false),
('user28', 'Evelyn Martinez', 'password28', '1980-10-28', 'evelyn.martinez@hotmail.com', false),
('user29', 'Charlotte Wilson', 'password29', '1995-03-08', 'charlotte.wilson@aol.com', false),
('user30', 'Jack Davis', 'password30', '1976-06-19', 'jack.davis@outlook.com', false),
('user31', 'Sophia Hernandez', 'password31', '2000-11-07', 'sophia.hernandez@gmail.com', false),
('user32', 'Benjamin Lopez', 'password32', '1987-02-01', 'benjamin.lopez@yahoo.com', false),
('user33', 'Mia Rodriguez', 'password33', '1979-07-06', 'mia.rodriguez@hotmail.com', false),
('user34', 'Lucas Brown', 'password34', '1994-09-19', 'lucas.brown@aol.com', false),
('user35', 'Grace Taylor', 'password35', '1981-12-30', 'grace.taylor@outlook.com', false),
('user36', 'Jackson Martinez', 'password36', '1974-05-15', 'jackson.martinez@gmail.com', false),
('user37', 'Lily Lee', 'password37', '1999-10-02', 'lily.lee@yahoo.com', false),
('user38', 'Liam Wilson', 'password38', '1983-03-11', 'liam.wilson@hotmail.com', false),
('user39', 'Aria Garcia', 'password39', '1970-08-22', 'aria.garcia@aol.com', false),
('user40', 'Elijah Thompson', 'password40', '1996-01-05', 'elijah.thompson@outlook.com', false),
('user41', 'Dylan Garcia', 'password41', '1982-04-18', 'dylan.garcia@gmail.com', false),
('user42', 'Savannah Martin', 'password42', '1997-03-30', 'savannah.martin@yahoo.com', false),
('user43', 'Brandon Rodriguez', 'password43', '1976-09-13', 'brandon.rodriguez@hotmail.com', false),
('user44', 'Isabella Lopez', 'password44', '1992-12-26', 'isabella.lopez@gmail.com', false),
('user45', 'Evan Moore', 'password45', '1989-05-20', 'evan.moore@yahoo.com', false),
('user46', 'Nora Thompson', 'password46', '1994-08-17', 'nora.thompson@hotmail.com', false),
('user47', 'Caleb Rivera', 'password47', '1971-02-28', 'caleb.rivera@aol.com', false),
('user48', 'Claire Ward', 'password48', '1984-11-09', 'claire.ward@outlook.com', false),
('user49', 'Victor Stewart', 'password49', '1997-06-12', 'victor.stewart@gmail.com', false),
('user50', 'Nina Powell', 'password50', '1978-03-25', 'nina.powell@yahoo.com', false);

