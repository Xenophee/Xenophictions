-- https://wall.alphacoders.com/big.php?i=151833&lang=French

-- THEMES
INSERT INTO `themes` (`name`) 
    VALUES ('Fantastique'), ('Science-Fiction'), ('Fantasy');

-- CATEGORIES
INSERT INTO `categories` (`name`) 
    VALUES ('Horreur'), ('Thriller'), ('Aventure'), ('Mystique'), ('Humour'), ('Mystère'), ('Epistolaire'), ('Uchronie'), ('Cyberpunk'), ('Space Opera / Fantasy'),
    ('Post-Apocalyptique'), ('Dystopie'), ('Steampunk'), ('High-Fantasy'), ('Heroïc-Fantasy'), ('Dark Fantasy'), ('Light Fantasy'), ('Fantasy Mythique');

-- ASSOCIATION THEMES / CATEGORIES
INSERT INTO `themes_categories` (`id_themes`, `id_categories`) 
    VALUES (1,1), (1,2), (1,3), (1,4), (1,5), (1,6), (1,7), (2,8), (2,9), (2,10), (2,11), (2,12), (2,13),
    (3,14), (3,15), (3,16), (3,17), (3,18);