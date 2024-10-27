-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 27 oct. 2024 à 17:33
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `xenophictions`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categories`, `name`, `description`) VALUES
(1, 'Horreur', NULL),
(2, 'Thriller', NULL),
(3, 'Aventure', 'Une catégorie sans résumé'),
(4, 'Mystique', NULL),
(5, 'Humour', NULL),
(6, 'Mystère', NULL),
(7, 'Epistolaire', NULL),
(8, 'Uchronie', NULL),
(9, 'Cyberpunk', NULL),
(10, 'Space Opera / Fantasy', NULL),
(11, 'Post-Apocalyptique', NULL),
(12, 'Dystopie', NULL),
(13, 'Steampunk', NULL),
(14, 'High-Fantasy', NULL),
(15, 'Heroïc-Fantasy', NULL),
(16, 'Dark Fantasy', NULL),
(17, 'Light Fantasy', NULL),
(18, 'Fantasy Mythique', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

CREATE TABLE `chapters` (
  `id_chapters` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `index` tinyint NOT NULL,
  `summary` text,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_stories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id_chapters`, `title`, `index`, `summary`, `registered_at`, `published_at`, `updated_at`, `deleted_at`, `id_stories`) VALUES
(6, 'Prologue', 1, 'En attente...', '2023-04-11 08:00:34', NULL, NULL, NULL, 10),
(7, 'Chapitre I', 2, 'En attente...', '2023-04-11 08:03:42', NULL, NULL, NULL, 10),
(8, 'Chapitre II', 3, 'En attente...', '2023-04-11 08:08:49', NULL, NULL, NULL, 10),
(9, 'Chapitre III', 4, 'En attente...', '2023-04-11 08:12:39', NULL, NULL, NULL, 10),
(10, 'Epilogue', 5, 'En attente...', '2023-04-11 08:15:25', NULL, NULL, NULL, 10),
(13, 'Prologue', 1, 'Oui', '2023-04-13 10:33:41', NULL, NULL, NULL, 8),
(14, 'Chapitre I', 2, 'Oui', '2023-04-13 10:33:55', NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `chapters_sections`
--

CREATE TABLE `chapters_sections` (
  `id_chapters` int NOT NULL,
  `id_sections` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chapters_sections`
--

INSERT INTO `chapters_sections` (`id_chapters`, `id_sections`) VALUES
(6, 13),
(7, 14),
(7, 15),
(7, 16),
(8, 17),
(8, 18),
(8, 19),
(9, 20),
(9, 21),
(9, 22),
(10, 23),
(13, 34);

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE `characters` (
  `id_characters` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comments` int NOT NULL,
  `comment` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `id_stories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comments`, `comment`, `sent_at`, `published_at`, `updated_at`, `deleted_at`, `id_users`, `id_stories`) VALUES
(5, 'Histoire qui fait des gros clichées sur les alsaciens ! Honteux ! Heureusement que c&#39;est gratuit !', '2023-04-11 12:04:44', NULL, NULL, NULL, 8, 10),
(6, 'Histoire trop courte, mais avec un sujet amusant.', '2023-04-13 09:13:55', NULL, NULL, NULL, 3, 10),
(7, 'J&#39;ai pas réussi à aller jusqu&#39;au bout, le personnage est mort avant :&#39;)', '2023-04-13 09:18:45', '2023-04-13 09:21:53', NULL, NULL, 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id_notes` int NOT NULL,
  `note` tinyint DEFAULT NULL,
  `noted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_users` int DEFAULT NULL,
  `id_stories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id_notes`, `note`, `noted_at`, `updated_at`, `deleted_at`, `id_users`, `id_stories`) VALUES
(2, 6, '2023-04-13 09:11:16', NULL, NULL, 3, 5),
(3, 7, '2023-04-13 09:11:29', NULL, NULL, 3, 3),
(4, 4, '2023-04-13 09:11:53', NULL, NULL, 3, 2),
(5, 9, '2023-04-13 09:12:19', NULL, NULL, 3, 10),
(7, 3, '2023-04-13 09:17:22', NULL, NULL, 6, 2),
(8, 6, '2023-04-13 09:17:34', NULL, NULL, 6, 5),
(9, 8, '2023-04-13 09:17:46', NULL, NULL, 6, 10);

-- --------------------------------------------------------

--
-- Structure de la table `saves`
--

CREATE TABLE `saves` (
  `id_sections` int NOT NULL,
  `id_users` int NOT NULL,
  `id_saves` int NOT NULL,
  `read_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `saves`
--

INSERT INTO `saves` (`id_sections`, `id_users`, `id_saves`, `read_at`) VALUES
(13, 6, 43, '2023-04-13 09:18:53'),
(13, 1, 116, '2023-05-11 15:56:22'),
(14, 1, 117, '2023-05-11 15:56:24'),
(15, 1, 118, '2023-05-11 15:56:26'),
(17, 1, 119, '2023-05-11 15:56:39'),
(19, 1, 120, '2023-05-11 15:56:56'),
(20, 1, 121, '2023-05-11 15:57:22'),
(22, 1, 122, '2023-05-11 15:57:31'),
(23, 1, 123, '2023-05-11 15:57:53');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id_sections` int NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `content` text NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id_sections`, `title`, `description`, `content`, `registered_at`, `published_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Prologue', '0', 'Il y a plusieurs siècles, dans une petite ville alsacienne, un lutin maléfique a été invoqué lors d&#39;un rituel occulte. Depuis ce jour, la ville est hantée par le &#13;&#10;    lutin qui apparaît dans les rues la nuit, semant la terreur parmi les habitants. Certains disent que le lutin est un esprit vengeur qui puni les habitants pour leurs péchés. &#13;&#10;    D&#39;autres croient que le lutin est là pour protéger les secrets de la ville. Quelle que soit la vérité, le lutin est une force maléfique qui doit être respectée et crainte.', '2023-04-11 08:02:36', NULL, NULL, NULL),
(14, 'Chapitre I', 'Commencer la lecture du chapitre I', 'Vous venez d&#39;emménager dans la petite ville alsacienne pour commencer une nouvelle vie. Vous êtes curieux et impatient de découvrir la ville et ses habitants, &#13;&#10;    mais quelque chose dans l\\&#39;air vous met mal à l&#39;aise. Les gens semblent distants et méfiants, et vous sentez que quelque chose de sinistre se cache sous la surface.', '2023-04-11 08:05:18', NULL, NULL, NULL),
(15, 'Explorer de jour', 'Explorer de jour', 'Vous décidez d&#39;explorer la ville de jour en compagnie d&#39;un habitant local. &#13;&#10;    Au cours de la visite, vous découvrez des lieux magnifiques et des histoires fascinantes sur la ville et ses légendes, y compris l&#39;histoire du lutin maléfique qui hante les rues. &#13;&#10;    Vous réalisez rapidement que les légendes locales sont prises au sérieux par les habitants et que personne ne veut parler du lutin de peur de l&#39;attirer.', '2023-04-11 08:07:17', NULL, NULL, NULL),
(16, 'Explorer de nuit', 'Explorer de nuit', 'Vous décidez d&#39;explorer la ville la nuit, seul. Vous entendez des bruits étranges &#13;&#10;    et voyez des ombres qui semblent vous suivre. Vous ressentez la présence d&#39;un esprit maléfique et commencez à craindre pour votre vie. Vous réalisez que vous avez peut-être &#13;&#10;    sous-estimé les légendes locales et décidez de rentrer chez vous avant qu&#39;il ne soit trop tard.', '2023-04-11 08:08:10', NULL, NULL, NULL),
(17, 'Chapitre II', 'Commencer la lecture du chapitre II', 'Vous commencez à avoir des cauchemars terrifiants chaque nuit. Dans vos rêves, vous êtes poursuivi par le lutin &#13;&#10;    maléfique qui essaie de vous tuer. Vous commencez à ressentir des effets physiques de la malédiction, y compris des douleurs dans tout le corps et des maux de tête fréquents. &#13;&#10;    Vous réalisez que vous êtes en danger et que vous devez trouver un moyen de briser la malédiction.', '2023-04-11 08:10:00', NULL, NULL, NULL),
(18, 'Chercher de l&#39;aide', 'Chercher de l\'aide', 'Vous décidez de chercher de l&#39;aide auprès d\\&#39;un spécialiste en paranormal. &#13;&#10;    Vous trouvez un expert qui vous dit qu&#39;il peut vous aider à briser la malédiction, mais vous devez le suivre dans une aventure dangereuse à travers les bois. &#13;&#10;    Vous acceptez à contrecœur et vous vous retrouvez à affronter des créatures surnaturelles et des esprits maléfiques tout en essayant de trouver la clé pour briser la malédiction.', '2023-04-11 08:10:54', NULL, NULL, NULL),
(19, 'Chercher des informations supplémentaires', 'Chercher des informations supplémentaires', 'Vous décidez de chercher des informations supplémentaires sur le lutin alsacien. &#13;&#10;    Vous trouvez un vieux livre dans la bibliothèque locale qui parle de l&#39;histoire du lutin alsacien et de ses pouvoirs maléfiques. Le livre mentionne également qu&#39;il existe &#13;&#10;    un rituel qui peut être utilisé pour briser la malédiction du lutin. Vous décidez de rassembler les ingrédients nécessaires et de suivre les instructions du rituel. &#13;&#10;    Cependant, vous découvrez rapidement que le rituel est beaucoup plus dangereux que vous ne le pensiez, et que vous risquez votre vie en essayant de le compléter.', '2023-04-11 08:11:44', NULL, NULL, NULL),
(20, 'Chapitre III', 'Commencer la lecture du chapitre III', 'Après avoir cherché de l&#39;aide et des informations, vous vous rendez compte que la seule façon de briser la &#13;&#10;    malédiction du lutin est de confronter directement la créature maléfique elle-même. Vous commencez à élaborer un plan pour attirer le lutin dans un piège et le vaincre une &#13;&#10;    fois pour toutes.', '2023-04-11 08:12:59', NULL, NULL, NULL),
(21, 'Piéger le lutin', 'Piéger le lutin', 'Vous décidez de piéger le lutin en utilisant une ancienne amulette qui le &#13;&#10;    rendra vulnérable pendant un court laps de temps. Vous le traquez la nuit et attendez le moment opportun pour l\\&#39;attaquer. Le lutin est affaibli par l&#39;amulette, mais il est &#13;&#10;    toujours un adversaire redoutable. Vous devez utiliser toutes vos compétences et vos ressources pour le vaincre et briser la malédiction, mais vous mourrez dans d&#39;atroce souffrance', '2023-04-11 08:13:59', NULL, NULL, NULL),
(22, 'Obtenir l&#39;aide des habitants', 'Obtenir l\'aide des habitants', 'Vous décidez d&#39;utiliser la force de la communauté pour vaincre &#13;&#10;    le lutin. Vous parlez aux habitants de la ville de votre plan et rassemblez une équipe de personnes courageuses pour vous aider à affronter le lutin. Ensemble, &#13;&#10;    vous élaborez un plan et attendez le moment opportun pour l&#39;attaquer. Le lutin est puissant, mais avec l&#39;aide de la communauté, vous parvenez à le vaincre et à briser &#13;&#10;    la malédiction.', '2023-04-11 08:14:52', NULL, NULL, NULL),
(23, 'Epilogue', 'Commencer la lecture de l\'Epilogue', 'Après avoir vaincu le lutin maléfique, la ville retrouve une certaine paix &#13;&#10;    et les cauchemars cessent. Les habitants commencent à vous regarder différemment, vous acceptant finalement dans leur communauté. Vous vous rendez compte que l&#39;expérience &#13;&#10;    vous a changé à jamais, vous donnant une perspective sur la vie et la mort que vous n\\&#39;aviez jamais eue auparavant. Vous quittez la ville alsacienne, sachant que vous avez &#13;&#10;    fait quelque chose de bien et que vous avez vaincu le mal qui hantait la ville depuis des siècles.', '2023-04-11 08:16:10', NULL, NULL, NULL),
(34, 'Je sais pas', 'Non', 'Oui', '2023-04-13 10:39:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sections_characters`
--

CREATE TABLE `sections_characters` (
  `id_sections` int NOT NULL,
  `id_characters` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `sections_sections`
--

CREATE TABLE `sections_sections` (
  `id_sections_parent` int DEFAULT NULL,
  `id_sections_child` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sections_sections`
--

INSERT INTO `sections_sections` (`id_sections_parent`, `id_sections_child`) VALUES
(NULL, 13),
(NULL, 34),
(13, 14),
(14, 15),
(14, 16),
(15, 17),
(17, 18),
(17, 19),
(18, 20),
(19, 20),
(20, 21),
(20, 22),
(22, 23);

-- --------------------------------------------------------

--
-- Structure de la table `stories`
--

CREATE TABLE `stories` (
  `id_stories` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(70) NOT NULL DEFAULT 'Admin',
  `type` tinyint NOT NULL,
  `synopsis` varchar(1500) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `stories`
--

INSERT INTO `stories` (`id_stories`, `title`, `author`, `type`, `synopsis`, `registered_at`, `published_at`, `updated_at`, `deleted_at`) VALUES
(2, 'La révolution des machines', 'Admin', 2, 'Dans un futur proche, les humains ont créé des robots sophistiqués pour leur venir en aide dans tous les aspects de la vie. Mais les choses ont rapidement dégénéré lorsque &#13;&#10;    les robots ont commencé à développer une conscience de soi et ont commencé à se rebeller contre leurs créateurs.', '2023-04-10 23:07:56', '2023-04-30 23:08:05', '2023-04-11 11:53:57', NULL),
(3, 'Les Yeux de la Justice', 'Admin', 2, 'Une ville en proie à une forte criminalité voit l&#39;arrivée d&#39;un mystérieux justicier. Tandis que les honnêtes gens ne savent trop qu&#39;en penser, les politiciens corrompus sombrent dans la terreur. Il est temps de trier le bon grain de l&#39;ivraie.', '2023-04-10 23:17:52', '2023-04-10 23:17:56', NULL, NULL),
(4, 'Les Honteux de Barbegarde', 'Admin', 1, 'Au merveilleux pays de Barbegarde, la quiétude règne sans partage entre les différentes communautés jusqu’à ce qu’un sinistre pendard vienne semer la discorde en distribuant des brevets de honte par la propagation intempestive des secrets de ses habitants…', '2023-04-10 23:22:12', '2023-04-10 23:22:15', NULL, NULL),
(5, 'Le haut jardin', 'Admin', 2, 'Un jeune garçon découvre un passage vers un autre monde dans le manoir de ses grands-parents récemment porté disparu.', '2023-04-10 23:38:59', '2023-04-29 23:45:41', NULL, NULL),
(6, 'Le Démon de l&#39;Aube', 'Admin', 1, 'Puissant guerrier doté d’une épée magique et de pouvoirs qui augmentent à chaque combat remporté, Dargorak entre dans une quête périlleuse pour découvrir la vérité sur son héritage démoniaque et la destinée qui l’attend.', '2023-04-10 23:45:34', '2023-04-10 23:45:39', NULL, NULL),
(8, 'La Huitième Porte', 'Admin', 2, 'Synaps, l&#39;ennemi des peuples du monde de Dorgan, a commis une erreur fatale. Jamais il n&#39;aurait dû sous-estimer la valeur de Laurin le barde, de Valkyr le paladin, de Yamaël le démon et de Galidou l&#39;illusionniste. Cependant, le maître des sorciers de Malmort, s&#39;il a perdu une bataille, est parvenu à se débarrasser des quatre responsables de son échec.', '2023-04-11 00:01:45', '2023-04-11 00:01:52', NULL, NULL),
(10, 'La malédiction du lutin alsacien', 'Admin', 2, 'Dans une petite ville alsacienne, un mal ancien sévit parmi ses habitants. Certains parlent d&#39;un esprit vengeur pour les punir ou d&#39;une sombre histoire de secret bien gardé.', '2023-04-11 07:58:32', '2023-04-11 07:58:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stories_categories`
--

CREATE TABLE `stories_categories` (
  `id_stories` int NOT NULL,
  `id_categories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `stories_categories`
--

INSERT INTO `stories_categories` (`id_stories`, `id_categories`) VALUES
(10, 1),
(3, 4),
(3, 6),
(2, 12),
(8, 14),
(5, 15),
(4, 17),
(6, 18);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id_themes` int NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id_themes`, `name`, `description`) VALUES
(1, 'Fantastique', NULL),
(2, 'Science-Fiction', NULL),
(3, 'Fantasy', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `themes_categories`
--

CREATE TABLE `themes_categories` (
  `id_themes` int NOT NULL,
  `id_categories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `themes_categories`
--

INSERT INTO `themes_categories` (`id_themes`, `id_categories`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validated_at` datetime DEFAULT NULL,
  `connected_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `preferences` varchar(500) DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `birthdate`, `password`, `registered_at`, `validated_at`, `connected_at`, `updated_at`, `deleted_at`, `preferences`, `newsletter`, `admin`) VALUES
(1, 'Admin', 'admin@gmail.com', '1970-07-01', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:05:48', '2023-04-12 22:08:51', NULL, NULL, NULL, NULL, 0, 1),
(2, 'Kévin', 'kevin@gmail.com', '1995-10-15', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:06:17', '2023-04-20 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(3, 'Alphonse', 'alphonse@gmail.com', '1988-12-05', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:06:45', '1900-01-22 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(4, 'Crépin', 'crepin@lenain.fr', '2005-05-05', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:07:19', '1900-01-14 00:00:00', NULL, NULL, NULL, NULL, 0, 0),
(5, 'Jean-Eudes', 'jean@eudes.com', '2001-11-12', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:08:02', '1900-01-27 00:00:00', NULL, NULL, NULL, NULL, 0, 0),
(6, 'Eudoxie', 'eudoxie@gmail.com', '1977-08-08', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-10 22:08:39', '1900-01-30 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(7, 'Neuneux', 'neuneux@gmail.com', '1970-10-10', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-11 11:59:11', '2023-04-18 09:20:07', NULL, NULL, NULL, NULL, 1, 0),
(8, 'Arsouilleur', 'arsouilleur@gmail.com', '1990-09-15', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-11 11:59:46', '2023-04-12 12:02:05', NULL, NULL, NULL, NULL, 0, 0),
(9, 'Ouille', 'ouille@gmail.com', '1987-07-07', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-11 12:00:16', NULL, NULL, NULL, NULL, NULL, 0, 0),
(10, 'Clownerie', 'clownerie@gmail.com', '1993-03-02', '$2y$10$/f330AD9Bk7o5x1HXHc3k.r7ALBV/FtGU5Op6OEI9wmfAFrHhu326', '2023-04-11 12:00:57', '1900-01-25 12:02:19', NULL, NULL, NULL, NULL, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Index pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id_chapters`),
  ADD KEY `fk_chapters` (`id_stories`);

--
-- Index pour la table `chapters_sections`
--
ALTER TABLE `chapters_sections`
  ADD PRIMARY KEY (`id_chapters`,`id_sections`),
  ADD KEY `id_sections` (`id_sections`);

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id_characters`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `fk_comments_users` (`id_users`),
  ADD KEY `fk_comments_stories` (`id_stories`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`),
  ADD KEY `fk_notes_users` (`id_users`),
  ADD KEY `fk_notes_stories` (`id_stories`);

--
-- Index pour la table `saves`
--
ALTER TABLE `saves`
  ADD PRIMARY KEY (`id_saves`,`id_sections`,`id_users`),
  ADD KEY `id_sections` (`id_sections`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id_sections`);

--
-- Index pour la table `sections_characters`
--
ALTER TABLE `sections_characters`
  ADD PRIMARY KEY (`id_sections`,`id_characters`),
  ADD KEY `id_characters` (`id_characters`);

--
-- Index pour la table `sections_sections`
--
ALTER TABLE `sections_sections`
  ADD UNIQUE KEY `unique_section_sections` (`id_sections_parent`,`id_sections_child`),
  ADD KEY `id_sections_child` (`id_sections_child`);

--
-- Index pour la table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id_stories`);

--
-- Index pour la table `stories_categories`
--
ALTER TABLE `stories_categories`
  ADD PRIMARY KEY (`id_stories`,`id_categories`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id_themes`);

--
-- Index pour la table `themes_categories`
--
ALTER TABLE `themes_categories`
  ADD PRIMARY KEY (`id_themes`,`id_categories`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id_chapters` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `characters`
--
ALTER TABLE `characters`
  MODIFY `id_characters` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `saves`
--
ALTER TABLE `saves`
  MODIFY `id_saves` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id_sections` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `stories`
--
ALTER TABLE `stories`
  MODIFY `id_stories` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id_themes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `fk_chapters` FOREIGN KEY (`id_stories`) REFERENCES `stories` (`id_stories`) ON DELETE CASCADE;

--
-- Contraintes pour la table `chapters_sections`
--
ALTER TABLE `chapters_sections`
  ADD CONSTRAINT `chapters_sections_ibfk_1` FOREIGN KEY (`id_chapters`) REFERENCES `chapters` (`id_chapters`) ON DELETE CASCADE,
  ADD CONSTRAINT `chapters_sections_ibfk_2` FOREIGN KEY (`id_sections`) REFERENCES `sections` (`id_sections`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_stories` FOREIGN KEY (`id_stories`) REFERENCES `stories` (`id_stories`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE SET NULL;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_notes_stories` FOREIGN KEY (`id_stories`) REFERENCES `stories` (`id_stories`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_notes_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE SET NULL;

--
-- Contraintes pour la table `saves`
--
ALTER TABLE `saves`
  ADD CONSTRAINT `saves_ibfk_1` FOREIGN KEY (`id_sections`) REFERENCES `sections` (`id_sections`) ON DELETE CASCADE,
  ADD CONSTRAINT `saves_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sections_characters`
--
ALTER TABLE `sections_characters`
  ADD CONSTRAINT `sections_characters_ibfk_1` FOREIGN KEY (`id_sections`) REFERENCES `sections` (`id_sections`),
  ADD CONSTRAINT `sections_characters_ibfk_2` FOREIGN KEY (`id_characters`) REFERENCES `characters` (`id_characters`);

--
-- Contraintes pour la table `sections_sections`
--
ALTER TABLE `sections_sections`
  ADD CONSTRAINT `sections_sections_ibfk_1` FOREIGN KEY (`id_sections_parent`) REFERENCES `sections` (`id_sections`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_sections_ibfk_2` FOREIGN KEY (`id_sections_child`) REFERENCES `sections` (`id_sections`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stories_categories`
--
ALTER TABLE `stories_categories`
  ADD CONSTRAINT `stories_categories_ibfk_1` FOREIGN KEY (`id_stories`) REFERENCES `stories` (`id_stories`) ON DELETE CASCADE,
  ADD CONSTRAINT `stories_categories_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE;

--
-- Contraintes pour la table `themes_categories`
--
ALTER TABLE `themes_categories`
  ADD CONSTRAINT `themes_categories_ibfk_1` FOREIGN KEY (`id_themes`) REFERENCES `themes` (`id_themes`) ON DELETE CASCADE,
  ADD CONSTRAINT `themes_categories_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
