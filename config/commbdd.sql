-- CREATE TABLE `users_sections`(
--    `id_users` INT,
--    `id_sections` INT,
--    `read_at` DATETIME,
--    PRIMARY KEY(`id_users`, `id_sections`),
--    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`),
--    FOREIGN KEY(`id_sections`) REFERENCES `sections`(`id_sections`)
-- )ENGINE=InnoDB;

-- CREATE TABLE `saves`(
--    `id_sections` INT,
--    `id_users` INT,
--    `id_saves` INT AUTO_INCREMENT,
--    `read_at` DATETIME,
--    PRIMARY KEY(`id_saves`),
--    FOREIGN KEY(`id_sections`) REFERENCES `sections`(`id_sections`),
--    FOREIGN KEY(`id_users`) REFERENCES `users`(`id_users`)
-- )ENGINE=InnoDB;



-- CREATE TABLE `themes_categories`(
--    `id_themes` INT,
--    `id_categories` INT,
--    PRIMARY KEY(`id_themes`, `id_categories`),
--    FOREIGN KEY(`id_themes`) REFERENCES `themes`(`id_themes`),
--    FOREIGN KEY(`id_categories`) REFERENCES `categories`(`id_categories`),
--    CONSTRAINT `fk_themes_link` FOREIGN KEY(`id_themes`) REFERENCES `themes`(`id_themes`) ON DELETE CASCADE
--    CONSTRAINT `fk_categories_link` FOREIGN KEY(`id_categories`) REFERENCES `categories`(`id_categories`) ON DELETE CASCADE
-- )ENGINE=InnoDB;



INSERT INTO `saves` (`id_sections`, `id_users`) 
    VALUES (1,2), (2,2), (4,2), (12,2)