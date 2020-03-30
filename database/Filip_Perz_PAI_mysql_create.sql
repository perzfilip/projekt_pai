CREATE DATABASE `projekt_pai` CHARACTER SET utf8 COLLATE utf8_polish_ci;

USE `projekt_pai`;

CREATE TABLE `Users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`login` varchar(30) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`firstName` varchar(30) NOT NULL,
	`lastName` varchar(30) NOT NULL,
	`status` INT(30),
	`role` INT,
	`class` INT,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB;

CREATE TABLE `Status` (
	`status_id` INT NOT NULL AUTO_INCREMENT,
	`statusName` varchar(40) NOT NULL,
	PRIMARY KEY (`status_id`)
)ENGINE=InnoDB;

CREATE TABLE `Roles` (
	`role_id` INT NOT NULL AUTO_INCREMENT,
	`roleName` varchar(30) NOT NULL,
	PRIMARY KEY (`role_id`)
)ENGINE=InnoDB;

CREATE TABLE `Classes` (
	`class_id` INT NOT NULL AUTO_INCREMENT,
	`className` varchar(10) NOT NULL,
	PRIMARY KEY (`class_id`)
)ENGINE=InnoDB;

CREATE TABLE `Sets` (
	`set_id` INT NOT NULL AUTO_INCREMENT,
	`setName` varchar(50) NOT NULL,
	`language` INT(50),
	`createdBy` INT,
	PRIMARY KEY (`set_id`)
)ENGINE=InnoDB;

CREATE TABLE `Languages` (
	`language_id` INT NOT NULL AUTO_INCREMENT,
	`languageName` varchar(30) NOT NULL,
	PRIMARY KEY (`language_id`)
)ENGINE=InnoDB;

CREATE TABLE `Flashcards` (
	`flashcard_id` INT NOT NULL AUTO_INCREMENT,
	`word` varchar(100) NOT NULL,
	`definition` varchar(100) NOT NULL,
	`Set` INT,
	PRIMARY KEY (`flashcard_id`)
)ENGINE=InnoDB;

CREATE TABLE `Sets_to_classes` (
	`class` INT,
	`set` INT
)ENGINE=InnoDB;

CREATE TABLE `users_progress` (
	`user` INT,
	`set` INT,
	`progress` INT
)ENGINE=InnoDB;

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk0` FOREIGN KEY (`status`) REFERENCES `Status`(`status_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk1` FOREIGN KEY (`role`) REFERENCES `Roles`(`role_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk2` FOREIGN KEY (`class`) REFERENCES `Classes`(`class_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Sets` ADD CONSTRAINT `Sets_fk0` FOREIGN KEY (`language`) REFERENCES `Languages`(`language_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Sets` ADD CONSTRAINT `Sets_fk1` FOREIGN KEY (`createdBy`) REFERENCES `Users`(`user_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Flashcards` ADD CONSTRAINT `Flashcards_fk0` FOREIGN KEY (`Set`) REFERENCES `Sets`(`set_id`) ON UPDATE CASCADE ON DELETE cascade;

ALTER TABLE `Sets_to_classes` ADD CONSTRAINT `Sets_to_classes_fk0` FOREIGN KEY (`class`) REFERENCES `Classes`(`class_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `Sets_to_classes` ADD CONSTRAINT `Sets_to_classes_fk1` FOREIGN KEY (`set`) REFERENCES `Sets`(`set_id`) ON UPDATE CASCADE ON DELETE cascade;

ALTER TABLE `users_progress` ADD CONSTRAINT `users_progress_fk0` FOREIGN KEY (`user`) REFERENCES `Users`(`user_id`) ON UPDATE CASCADE ON DELETE SET NULL;

ALTER TABLE `users_progress` ADD CONSTRAINT `users_progress_fk1` FOREIGN KEY (`set`) REFERENCES `Sets`(`set_id`) ON UPDATE CASCADE ON DELETE SET NULL;

# klasy w szkole
INSERT INTO `classes` (`class_id`, `className`) VALUES
(1, 'ADMIN'), (2, '1A'), (3, '1B'), (4, '1C'), (5, '1D'),
(6, '2A'), (7, '2B'), (8, '2C'), (9, '2D'),
(10, '3A'), (11, '3B'), (12, '3C'), (13, '3D'),
(14, '4A'), (15, '4B'), (16, '4C'), (17, '4D');

# jezyki
insert into `languages` (language_id, languageName) values
(1, 'angielski'), (2, 'niemiecki'), (3, 'hiszpański'), (4, 'rosyjski');

# role
insert into `roles` (`role_id`, `roleName`) values
(1, 'ADMIN'), (2, 'nauczyciel'), (3, 'uczeń');

# statusy
insert into `status`(`status_id`, `statusName`) values (1, 'Aktywny'), (2, 'Niekatywny');

# konto Admin z hasłem admin
INSERT INTO `users` (`user_id`, `login`, `password`, `firstName`, `lastName`, `status`, `role`, `class`) VALUES ('1', 'Admin', '$argon2id$v=19$m=1024,t=2,p=2$dFRyeThDaTNZTkRHeDlsUg$dB6NdybtFDImmKUxuI1B3oNkrst2B26JLI1m76Pn1n4', 'Admin', 'Admin', '1', '1', NULL);
