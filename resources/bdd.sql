DROP DATABASE IF EXISTS `xenophictions`;

CREATE DATABASE IF NOT EXISTS `xenophictions` CHARACTER SET 'utf8';
USE `xenophictions`;


CREATE TABLE `users`(
   `id_users` INT AUTO_INCREMENT,
   `username` VARCHAR(50) NOT NULL,
   `email` VARCHAR(150) NOT NULL,
   `birthdate` DATE NOT NULL,
   `password` VARCHAR(255) NOT NULL,
   `registered_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `validated_at` DATETIME,
   `connected_at` DATETIME,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `preferences` VARCHAR(500) ,
   `newsletter` BOOLEAN NOT NULL DEFAULT false,
   `admin` BOOLEAN NOT NULL DEFAULT false,
   PRIMARY KEY(`id_users`),
   UNIQUE(`username`),
   UNIQUE(`email`)
)ENGINE=InnoDB;

CREATE TABLE `stories`(
   `id_stories` INT AUTO_INCREMENT,
   `title` VARCHAR(150) NOT NULL,
   `author` VARCHAR(70) NOT NULL DEFAULT 'Xénophée',
   `type` TINYINT NOT NULL,
   `synopsis` VARCHAR(1500) NOT NULL,
   `registered_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `published_at` DATETIME,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   PRIMARY KEY(`id_stories`)
)ENGINE=InnoDB;

CREATE TABLE `themes`(
   `id_themes` INT AUTO_INCREMENT,
   `name` VARCHAR(70)  NOT NULL,
   `description` VARCHAR(300),
   PRIMARY KEY(`id_themes`)
)ENGINE=InnoDB;

CREATE TABLE `categories`(
   `id_categories` INT AUTO_INCREMENT,
   `name` VARCHAR(70) NOT NULL,
   `description` VARCHAR(300),
   PRIMARY KEY(`id_categories`)
)ENGINE=InnoDB;

CREATE TABLE `comments`(
   `id_comments` INT AUTO_INCREMENT,
   `comment` TEXT NOT NULL,
   `sent_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `published_at` DATETIME,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `id_users` INT,
   `id_stories` INT NOT NULL,
   PRIMARY KEY(`id_comments`),
   CONSTRAINT `fk_comments_users` FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`) ON DELETE SET NULL,
   CONSTRAINT `fk_comments_stories` FOREIGN KEY(`id_stories`) REFERENCES `stories`(`id_stories`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `notes`(
   `id_notes` INT AUTO_INCREMENT,
   `note` TINYINT,
   `noted_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `id_users` INT,
   `id_stories` INT NOT NULL,
   PRIMARY KEY(`id_notes`),
   CONSTRAINT `fk_notes_users` FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`) ON DELETE SET NULL,
   CONSTRAINT `fk_notes_stories` FOREIGN KEY(`id_stories`) REFERENCES `stories`(`id_stories`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `chapters`(
   `id_chapters` INT AUTO_INCREMENT,
   `title` VARCHAR(150)  NOT NULL,
   `index` TINYINT NOT NULL,
   `summary` TEXT,
   `registered_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `published_at` DATETIME,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   `id_stories` INT NOT NULL,
   PRIMARY KEY(`id_chapters`),
   CONSTRAINT `fk_chapters` FOREIGN KEY(`id_stories`) REFERENCES `stories`(`id_stories`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `sections`(
   `id_sections` INT AUTO_INCREMENT,
   `title` VARCHAR(150),
   `description` VARCHAR(250),
   `content` TEXT NOT NULL,
   `registered_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `published_at` DATETIME,
   `updated_at` DATETIME,
   `deleted_at` DATETIME,
   PRIMARY KEY(`id_sections`)
)ENGINE=InnoDB;

CREATE TABLE `characters`(
   `id_characters` INT AUTO_INCREMENT,
   `name` VARCHAR(100) NOT NULL,
   `role` VARCHAR(100) ,
   `description` TEXT,
   PRIMARY KEY(`id_characters`)
)ENGINE=InnoDB;


CREATE TABLE `saves`(
   `id_sections` INT,
   `id_users` INT,
   `id_saves` INT AUTO_INCREMENT,
   `read_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(`id_saves`, `id_sections`, `id_users`),
   FOREIGN KEY(`id_sections`) REFERENCES `sections`(`id_sections`) ON DELETE CASCADE,
   FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`) ON DELETE CASCADE
);


CREATE TABLE `themes_categories`(
   `id_themes` INT,
   `id_categories` INT,
   PRIMARY KEY(`id_themes`, `id_categories`),
   FOREIGN KEY(`id_themes`) REFERENCES `themes`(`id_themes`) ON DELETE CASCADE,
   FOREIGN KEY(`id_categories`) REFERENCES `categories`(`id_categories`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `stories_categories`(
   `id_stories` INT,
   `id_categories` INT,
   PRIMARY KEY(`id_stories`, `id_categories`),
   FOREIGN KEY(`id_stories`) REFERENCES `stories`(`id_stories`) ON DELETE CASCADE,
   FOREIGN KEY(`id_categories`) REFERENCES `categories`(`id_categories`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `chapters_sections`(
   `id_chapters` INT,
   `id_sections` INT,
   PRIMARY KEY(`id_chapters`, `id_sections`),
   FOREIGN KEY(`id_chapters`) REFERENCES `chapters`(`id_chapters`) ON DELETE CASCADE,
   FOREIGN KEY(`id_sections`) REFERENCES `sections`(`id_sections`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `sections_sections`(
   `id_sections_parent` INT NULL,
   `id_sections_child` INT NULL,
   UNIQUE KEY `unique_section_sections` (`id_sections_parent`, `id_sections_child`),
   FOREIGN KEY(`id_sections_parent`) REFERENCES `sections`(`id_sections`) ON DELETE CASCADE,
   FOREIGN KEY(`id_sections_child`) REFERENCES `sections`(`id_sections`) ON DELETE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `sections_characters`(
   `id_sections` INT,
   `id_characters` INT,
   PRIMARY KEY(`id_sections`, `id_characters`),
   FOREIGN KEY(`id_sections`) REFERENCES `sections`(`id_sections`),
   FOREIGN KEY(`id_characters`) REFERENCES `characters`(`id_characters`)
)ENGINE=InnoDB;
