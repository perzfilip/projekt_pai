CREATE TABLE `Users` (
	`user_id` INT NOT NULL UNIQUE,
	`login` varchar(30) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`firstName` varchar(30) NOT NULL,
	`lastName` varchar(30) NOT NULL,
	`status` INT(30) NOT NULL,
	`role` INT NOT NULL,
	`class` INT,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `Status` (
	`status_id` INT NOT NULL AUTO_INCREMENT,
	`statusName` varchar(40) NOT NULL,
	PRIMARY KEY (`status_id`)
);

CREATE TABLE `Roles` (
	`role_id` INT NOT NULL AUTO_INCREMENT,
	`roleName` varchar(30) NOT NULL,
	PRIMARY KEY (`role_id`)
);

CREATE TABLE `Classes` (
	`class_id` INT NOT NULL AUTO_INCREMENT,
	`className` varchar(10) NOT NULL,
	PRIMARY KEY (`class_id`)
);

CREATE TABLE `Sets` (
	`set_id` INT NOT NULL AUTO_INCREMENT,
	`setName` varchar(50) NOT NULL,
	`language` INT(50) NOT NULL,
	`createdBy` INT NOT NULL,
	PRIMARY KEY (`set_id`)
);

CREATE TABLE `Languages` (
	`language_id` INT NOT NULL AUTO_INCREMENT,
	`languageName` varchar(30) NOT NULL,
	PRIMARY KEY (`language_id`)
);

CREATE TABLE `Flashcards` (
	`flashcard_id` INT NOT NULL AUTO_INCREMENT,
	`word` varchar(100) NOT NULL,
	`definition` varchar(100) NOT NULL,
	`Set` INT NOT NULL,
	PRIMARY KEY (`flashcard_id`)
);

CREATE TABLE `Sets_to_classes` (
	`class` INT NOT NULL,
	`set` INT NOT NULL,
	PRIMARY KEY (`class`,`set`)
);

CREATE TABLE `users_progress` (
	`user` INT NOT NULL,
	`set` INT NOT NULL,
	`progress` INT,
	PRIMARY KEY (`user`,`set`)
);

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk0` FOREIGN KEY (`status`) REFERENCES `Status`(`status_id`);

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk1` FOREIGN KEY (`role`) REFERENCES `Roles`(`role_id`);

ALTER TABLE `Users` ADD CONSTRAINT `Users_fk2` FOREIGN KEY (`class`) REFERENCES `Classes`(`class_id`);

ALTER TABLE `Sets` ADD CONSTRAINT `Sets_fk0` FOREIGN KEY (`language`) REFERENCES `Languages`(`language_id`);

ALTER TABLE `Sets` ADD CONSTRAINT `Sets_fk1` FOREIGN KEY (`createdBy`) REFERENCES `Users`(`user_id`);

ALTER TABLE `Flashcards` ADD CONSTRAINT `Flashcards_fk0` FOREIGN KEY (`Set`) REFERENCES `Sets`(`set_id`);

ALTER TABLE `Sets_to_classes` ADD CONSTRAINT `Sets_to_classes_fk0` FOREIGN KEY (`class`) REFERENCES `Classes`(`class_id`);

ALTER TABLE `Sets_to_classes` ADD CONSTRAINT `Sets_to_classes_fk1` FOREIGN KEY (`set`) REFERENCES `Sets`(`set_id`);

ALTER TABLE `users_progress` ADD CONSTRAINT `users_progress_fk0` FOREIGN KEY (`user`) REFERENCES `Users`(`user_id`);

ALTER TABLE `users_progress` ADD CONSTRAINT `users_progress_fk1` FOREIGN KEY (`set`) REFERENCES `Sets`(`set_id`);

