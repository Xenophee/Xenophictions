-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 13 avr. 2023 à 08:46
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.2

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
(11, 'Partie I', 1, 'En attente...', '2023-04-13 10:15:22', NULL, NULL, NULL, 1),
(12, 'Partie II', 2, 'En attente...', '2023-04-13 10:19:51', NULL, NULL, NULL, 1),
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
(11, 24),
(11, 25),
(11, 26),
(11, 27),
(11, 28),
(12, 29),
(12, 30),
(12, 31),
(12, 32),
(12, 33),
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
(2, 'G fé un lets play sur Dead Space, je te mets mon lien youtube ici : https://www.youtube.com/watch?v=S4W7gSO-5gw&#13;&#10;&#13;&#10;Vite ! Vite !', '2023-04-11 00:08:52', NULL, NULL, NULL, 2, 1),
(3, 'Une histoire qui fera réfléchir tous les manants, je l&#39;espère. Mais à notre époque, on dépasse rarement les 70 de QI malheureusement...', '2023-04-11 00:10:17', '2023-04-11 00:13:21', NULL, NULL, 3, 1),
(4, 'Histoire étonnante et originale.', '2023-04-11 00:12:26', '2023-04-11 00:13:18', NULL, NULL, 6, 1),
(5, 'Histoire qui fait des gros clichées sur les alsaciens ! Honteux ! Heureusement que c&#39;est gratuit !', '2023-04-11 12:04:44', NULL, NULL, NULL, 8, 10),
(6, 'Histoire trop courte, mais avec un sujet amusant.', '2023-04-13 09:13:55', NULL, NULL, NULL, 3, 10),
(7, 'J&#39;ai pas réussi à aller jusqu&#39;au bout, le personnage est mort avant :&#39;)', '2023-04-13 09:18:45', '2023-04-13 09:21:53', NULL, NULL, 6, 10),
(8, 'J&#39;ai rien compris.', '2023-04-13 09:20:30', NULL, NULL, NULL, 7, 1);

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
(1, 8, '2023-04-13 09:10:59', NULL, NULL, 3, 1),
(2, 6, '2023-04-13 09:11:16', NULL, NULL, 3, 5),
(3, 7, '2023-04-13 09:11:29', NULL, NULL, 3, 3),
(4, 4, '2023-04-13 09:11:53', NULL, NULL, 3, 2),
(5, 9, '2023-04-13 09:12:19', NULL, NULL, 3, 10),
(6, 9, '2023-04-13 09:16:37', NULL, NULL, 6, 1),
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
(13, 3, 35, '2023-04-13 09:14:02'),
(13, 3, 36, '2023-04-13 09:14:18'),
(13, 3, 40, '2023-04-13 09:14:50'),
(13, 3, 41, '2023-04-13 09:15:55'),
(13, 6, 43, '2023-04-13 09:18:53'),
(13, 1, 69, '2023-04-13 10:12:19'),
(14, 1, 70, '2023-04-13 10:12:20'),
(15, 1, 71, '2023-04-13 10:12:23'),
(17, 1, 72, '2023-04-13 10:12:25'),
(14, 1, 73, '2023-04-13 10:12:30'),
(24, 1, 74, '2023-04-13 10:26:57'),
(24, 1, 75, '2023-04-13 10:27:20'),
(25, 1, 76, '2023-04-13 10:27:23'),
(26, 1, 77, '2023-04-13 10:27:25'),
(27, 1, 78, '2023-04-13 10:27:32'),
(25, 1, 79, '2023-04-13 10:28:10');

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
(24, 'Section I', 'Lire la suite', 'Lorsque de très bon matin, Bartosz Korczac revint à son petit village à la suite de longues années d’absence, il retrouva son logis dans une déferlante de sentiments contradictoires. Sa soif d’aventure l’avait conduit aux quatre coins du monde et il rêvait de voyager encore, mais une profonde fatigue avait altéré subitement sa volonté et le besoin de faire une pause revigorante le convainquit de réintégrer sa patrie. C’est donc avec une certaine amertume qu’il franchit le seuil de sa modeste demeure assiégée par le temps, même si la vision de ce lieu presque inchangé lui embauma passagèrement le cœur. Les souvenirs bienheureux qu’il conservait de cet endroit le délivrèrent de sa morosité tandis qu’il se hasardait à déposer ses affaires dans le salon poussiéreux dont l’obscurité et l’odeur de renfermé l&#39;invitèrent à déployer les volets et ouvrir les fenêtres. Un grand ménage s’imposait ; la saleté régnante lui provoquait des quintes de toux abominables. Il s’y attela sans délai, quoique grossièrement ; les environnements malpropres ne lui posaient pas de grande contrariété ; ses aventures lui avaient octroyé plus de modestie dans ses exigences de confort et les expéditions en pleine nature ne permettaient pas d’être impeccable en toute circonstance. &#13;&#10;&#13;&#10;Pour cette raison d’ailleurs, il conservait maintenant une apparence négligée, jurant ainsi avec ses habitudes d’autrefois où on ne l’aurait jamais surpris en public avec une chemise froissée. Le quarantenaire arborait désormais une longue chevelure châtain désordonnée qui lui tombait pratiquement sur les épaules, une barbe hirsute dépourvue de tout entretien et portait une moitié de costume à carreaux vilainement tâchée et plissée. En somme, une allure de vagabond propre à répugner les bonnes gens. La corvée ménagère expédiée, il rangea sommairement ses affaires et déposa le portrait souriant de sa mère sur son bureau. Bien déterminé à poursuivre le récit de son odyssée pendant sa villégiature, il prépara en avance son carnet de notes et son stylo. Son regard se hasarda alors sur la croix chrétienne accrochée au-dessus de la porte ; une moue indescriptible déforma son visage. Il retira l’objet ; répéta l’opération dans chaque pièce de la maison ; déposa le tout dans un carton au grenier, et se sentit mieux. Quand il revint dans son cabinet de travail, il fronça les sourcils ; le portrait exposait maintenant une version attristée de sa mère. Convaincu qu’il s’agissait d’une hallucination, il ferma les yeux et se secoua la tête. En les rouvrant, tout était parfaitement normal. Soulagé, l’aventurier décida de prendre un peu l’air avant que le village ne se réveille et qu’il ne doive répondre aux questionnements de ses habitants.', '2023-04-13 10:16:00', NULL, NULL, NULL),
(25, 'Section II', 'Lire la suite', 'C’est sans prendre la peine de se changer que l’écrivain prit ensuite le chemin du cimetière d’un pas nonchalant. La température était particulièrement fraiche en cette fin d’automne et le pauvre Bartosz avait perdu l’habitude de supporter le climat continental depuis ses nombreux séjours dans les pays du sud. Des filets de vapeurs sortaient de sa bouche ; il grelotait légèrement. Le soleil commençait à poindre lorsqu’il traversa l’allée principale encore endormie à cette heure ; ses faibles rayons adoucissaient à peine l’atmosphère, mais leur présence donnait un charme particulier au paysage. Sur la grande place, le vieux chêne se dressait toujours à côté de la vaste fontaine de pierre, inactive à cette période de l’année. Toutefois, l’arbre avait incontestablement perdu de sa superbe depuis la dernière fois qu’il avait eu l’occasion de l’observer. Totalement dégarnis, ses branchages tortueux lui conféraient une allure sinistre, presque terrifiante. Après en avoir fait rapidement le tour par curiosité, l’aventurier constata à regret qu’il était mort. &#13;&#10;&#13;&#10;L’écorce demeurait presque intacte néanmoins et on pouvait encore y voir les différentes déclarations amoureuses de certains jeunes gens. Tandis qu’il parcourait les inscriptions du doigt avec une certaine nostalgie, il s’arrêta brusquement sur l’une d’entre elles la mâchoire crispée ; la relecture de ces mots engendrait chez lui un sentiment douloureux de culpabilité et de honte. Ce souvenir ne lui plaisait pas. Il eut tout d’un coup l’impression que l’air se faisait plus froid et pénétrant pendant que la désagréable impression d’une présence invisible s’installait dans son esprit. Tournant fébrilement la tête en quête de cet être qu’il devinait tout proche, l’écrivain prit finalement la fuite à l’instant où il entendit une voix féminine d’outre-tombe murmurer son prénom dans le vent. Momentanément glacé d’effroi par cette manifestation de l’étrange, il dut se convaincre qu’il ne s’agissait là que du fruit de son imagination pour reprendre contenance. Quand, un peu désarçonné, il arriva enfin au champ du repos, Bartosz rechercha la tombe de sa mère. Son exploration fut toutefois interrompue de manière inopinée :&#13;&#10;&#13;&#10;« Vous n’auriez pas dû revenir, Korczac »', '2023-04-13 10:16:44', NULL, NULL, NULL),
(26, 'Section III', 'Lire la suite', 'L’interpellé se retourna aussitôt ; Pawel Lewinski, le prêtre de la localité, le jaugeait d’un regard dur, presque glacial. De toute évidence, le religieux portait quelques griefs contre lui – et il se doutât bien desquels –, car sa mémoire se rappelait d’un homme simple d’une grande bienveillance, quoique parfois un peu sec et intransigeant. Bien qu’il n’eut aucune envie de dialoguer avec lui, l’homme de lettres s’efforça de le saluer respectueusement avant de lui tourner à nouveau le dos en espérant obtenir la paix. L’ecclésiastique, cependant, n’envisageait pas cette option et reprit plutôt :&#13;&#10;&#13;&#10;« Votre mère a longtemps pleuré votre départ et la rupture de votre serment, savez-vous ?&#13;&#10;&#13;&#10;— Ce n’est pas très étonnant, c’était une femme très sensible… », répondit le concerné agacé par la litanie de reproches qui s’annonçait.&#13;&#10;&#13;&#10;« Vous l’aviez surtout plongé dans l’embarras par votre inconséquence. Les Cyganek…&#13;&#10;&#13;&#10;— Gardez donc vos petites histoires, mon Père, je ne suis pas d’humeur à vous entendre conter des drames de bonnes femmes qui datent de dix ans, le coupa sèchement l’aventurier.&#13;&#10;&#13;&#10;— Vous allez les écouter au contraire… Ayez donc le courage de connaitre la désolation que vous avez semée à défaut d’en avoir pour respecter vos engagements devant Dieu et devant les hommes » répliqua Lewinski sur le même ton.&#13;&#10;&#13;&#10;Conscient qu’il s’était emparé de l’attention de Bartosz par ces derniers mots, il se rapprocha de lui pour mieux l’étudier en exposant les faits du passé. La mine grave, il énonça calmement et sans ambages :&#13;&#10;&#13;&#10;« Lorsque la belle Izolda Cyganek appris que vous l’aviez abandonné et par la même rompu vos fiançailles, son chagrin fut si grand que personnes ne parvint à la consoler… Elle vous aimait à en mourir, Korszac, et vous vous êtes montré indigne de son amour… Une semaine plus tard, nous l’avons retrouvé pendu au Grand Chêne ; elle s’était donné la mort durant la nuit. Nous avons eu beaucoup de peine à la détacher ; ce jour-là, une tempête presque surnaturelle s’était déchaînée sur le village. Naturellement, cet évènement a marqué tous les habitants ; plus personne ne se promet en mariage devant cet arbre depuis lors. Il a dépéri peu de temps après ; il porte la marque du deuil »&#13;&#10;&#13;&#10;Il marqua une pause ; l’écrivain peinait à contenir son malêtre et une sincère expression affligée redéfinissait ses traits. Ses lèvres tremblaient d’hésitation ; il souhaitait dévoiler ses motivations de l’époque, mais les sachant lâches et enfantines, l’humilité et le bon sens lui recommandaient simplement le silence. Bien que son comportement attestait du contraire, il avait aimé sincèrement Izolda ; son suicide l’affectait beaucoup et il sut désormais que son souvenir ne cesserait de le hanter pour lui rappeler sa faute. Il ne regretta pas ses actes passés cependant ; sans cela, il savait qu’il n’aurait jamais eu la chance de voir le monde et se serait retrouvé contraint à une vie parfaitement rangée et sans saveur. Dans le fond, que pouvait bien valoir une morte face à tous ces plaisirs exquis auxquels il avait gouté ? Cet égarement de la pensée le couvrit de honte. Le mutisme prolongé de l’aventurier encouragea le prêtre à poursuivre de son ton monocorde et incisif.&#13;&#10;&#13;&#10;« Très affecté par le décès de sa fille, Tobiasz jura de vous ôter la vie à votre retour… Voyant néanmoins que vous ne reveniez pas malgré l’écoulement de plusieurs années, il décida tristement de se faire justice autrement. L’ampleur de son affliction était telle… qu’il se rendit chez votre mère pour punir celle qui avait engendré le démon de ses malheurs… »', '2023-04-13 10:17:35', NULL, NULL, NULL),
(27, 'Section IV', 'Lire la suite', 'Traumatisé par ce qu’il venait d’entendre, l’écrivain plongea subitement son regard dans celui du conteur.&#13;&#10;&#13;&#10;« Oui. Contrairement à ce qui vous a été indiqué dans la lettre pour vous ménager, la vie de votre mère s’est achevée sous un couteau… » insista le prêtre sans la moindre empathie.&#13;&#10;&#13;&#10;Bouleversé par ces révélations, Bartosz manqua de tomber à genoux. Il ouvrit la bouche, mais rien n’en sortit, tant sa gorge nouée par l’émotion refusait de répondre.&#13;&#10;&#13;&#10;« Après cela, Tobiasz fut arrêté, bien évidemment. Cependant, au vu de son état psychologique, le tribunal décida qu’on le conduisit dans une maison de fous. Il doit certainement toujours s’y trouver. Quant à sa femme et sa seconde fille, elles déménagèrent peu de temps plus tard pour la ville ; nous n’eurent plus de nouvelles d’elles à compter de ce jour… »&#13;&#10;&#13;&#10;Envahi par une horde d’émotions qu’il ne parvenait à ordonner, l’aventurier préféra déserter les lieux sans adresser un regard à l’ecclésiastique. La démarche peu assurée, les mains tremblotantes, le dos vouté sous le poids de la culpabilité ; il reprit le petit chemin tête baissée, tel un réprouvé.&#13;&#10;&#13;&#10;« Ah ! Une dernière chose, Korczac… » interpella le religieux.&#13;&#10;&#13;&#10;Bartosz s’arrêta sans se retourner, attendant le coup de grâce.&#13;&#10;&#13;&#10;« Quand vient la nuit, je vous conseille de bien clore vos fenêtres et de porter des bouchons d’oreilles ; aucun bruit de l’extérieur ne doit vous parvenir »&#13;&#10;&#13;&#10;Stupéfait par cette curieuse requête, l’écrivain mit un long temps avant de réagir. Finalement, recouvrant l’usage de la parole face à ce qui lui semblait être de la superstition motivée par des croyances absurdes, il demanda simplement d’un air harassé :&#13;&#10;&#13;&#10;« Pourquoi m’enjoignez-vous cela ?&#13;&#10;&#13;&#10;— C’est ce que je recommande à chaque pécheur de cette bourgade ; et comme les résidents sont suffisamment dignes et intelligents pour s’estimer de cette catégorie, ils appliquent consciencieusement cette recommandation »&#13;&#10;&#13;&#10;L’homme de lettres retint un commentaire sarcastique et désobligeant.&#13;&#10;&#13;&#10;« Puis-je savoir à quoi peut bien servir cette pratique pour le moins insolite ? Que craigniez-vous donc d’entendre durant la nuit ? Hormis le hurlement d’un loup, le bruissement des feuilles chahuté par le vent, le hululement d’un hibou, la pluie qui s’abat sur les toits des maisons ou que sais-je encore de si anodin ?&#13;&#10;&#13;&#10;— Il s’agit d’une simple précaution pour se prémunir du mal…&#13;&#10;&#13;&#10;— Quel mal ? Vous délirez ! Votre foi vous conduit à l’ineptie ! » s’insurgea l’aventurier brusquement plus virulent, voir haineux dès qu’il était question de religion.&#13;&#10;&#13;&#10;« Accordez-y du crédit ou non, mais pour votre bien, il vaut mieux que vous ne soyez jamais confronté à ce que vous pourriez découvrir dehors à minuit en ne respectant pas mon avertissement.&#13;&#10;&#13;&#10;— Oui, bien sûr, oui… Et à quoi sommes-nous censés être confrontés à cette heure tardive ? Arrêtez un peu ! Ne voyez-vous donc rien ? Votre dévotion vous aliène ! Cessez vos divagations fantastiques et revenez sur Terre. Regardez-moi ! Je suis libre de toutes ces croyances archaïques... J&#39;ai abjuré…&#13;&#10;&#13;&#10;— Je sais, déclara abruptement Lewinski, et contrairement à ce que vous imaginez, vous êtes seulement libre de vous perdre sur les sentiers de la dépravation »', '2023-04-13 10:18:42', NULL, NULL, NULL),
(28, 'Section V', 'Lire la suite', 'D’humeur imperturbable malgré les propos injurieux du blasphémateur, l’ecclésiastique repartis dans la maison de Dieu sans s’expliquer davantage, laissant là un Bartosz hébété par ses dernières paroles. Au bout du compte, ce dernier trop secoué par sa conversation avec le religieux, oublia ce pour quoi il était venu et éprouva l’envie immédiate de se réfugier chez lui. Au retour, il ne put s’empêcher de jeter un œil craintif au Grand Chêne, mais ne s’attarda pas cette fois-ci, car dans son onirisme, il crut percevoir furtivement la silhouette de la trépassée suspendue à ses branches. Loin d’en avoir terminé, le calvaire continua en atteignant son logis ; un petit regroupement de villageois ayant appris son retour patientait froidement devant sa porte. Ils le scrutèrent sans dire mot tandis qu’il arrivait d’un pas incertain et angoissé ; leur attitude crispée et leur visage défiguré dans une expression pleine d’hostilité et de rancœur les rendaient particulièrement menaçants. &#13;&#10;&#13;&#10;Lorsqu’il passa à côté d’eux, l’ambiance lourde de malveillance le comprima à un point tel qu’il peinait à reprendre son souffle. Les mains moites, il chercha fiévreusement ses clefs dans les poches de son pantalon sous les regards fielleux ; fit tombée maladroitement son trousseau sur le sol ; se courba vélocement pour le ramasser ; le fit choir une seconde fois en s’efforçant de distinguer la bonne clef, et lorsqu’il l’inséra enfin dans la serrure, il se réfugia à l’intérieur sans demander son reste. En passant devant une fenêtre de son salon, il constata avec horreur que les résidents se tenaient toujours là et l’observaient vilainement à travers la vitre. Alors qu’il les fixait du regard, leur figure grossière paraissait se transformer en de hideuses créatures chtoniennes ; leur tête s’étirait progressivement jusqu’à déformer entièrement la partie inférieure de leur visage en un fondu inquiétant tandis que leurs yeux augmentaient de volume et semblait sortir de leur orbite. Cette vision cauchemardesque le paralysa pendant un bon moment jusqu’à ce que l’un d’eux pointe son doigt vers lui d’un air accusateur et un autre crache brusquement sur le carreau. Bartosz recula instinctivement face à l’agression et se retira dans son bureau à l’étage. Il lui fallut bien une heure pour recouvrer ses esprits et se persuader que tout ceci n’était que le reflet de son imagination.&#13;&#10;&#13;&#10;Les jours suivants, il sortit très peu de chez lui ; il aimait mieux rester cloitré de la sorte malgré ses désirs de liberté plutôt que d’affronter à nouveau une horde de malfaisants. Isolé dans son cabinet de travail, il passa l’essentiel de son temps à écrire le récit de ses voyages en orient. L’évocation de ses souvenirs lui accordait une parenthèse enchantée durant laquelle il se voyait revivre toutes les scènes qu’il décrivait, lui permettant ainsi d’oublier momentanément le véritable contexte dans lequel il devait malheureusement évoluer. Pawel Lewinski ne le revit plus au cimetière ; il ne l’aperçut pas davantage à la messe – ce qui ne manqua pas d’indigner les fidèles, mais ne l’étonna point – ; d’ailleurs, il ne le croisa plus, tant l’écrivain prenait soin à l’éviter. Il aurait pu frapper à sa porte ; cependant, il savait que sa démarche serait vaine pour raisonner l’impie et que son destin dépendait maintenant de la volonté de Dieu… ou du Démon. Comme le désespérait le prêtre, l’homme de lettres ne suivit pas son conseil ; il passa même chacune de ses nuits à braver toujours un peu plus l’interdit ; d’abord en restant parfaitement éveillé jusqu’à l’aurore, puis en guettant par la fenêtre ensuite, et enfin en sortant effrontément de sa demeure en riant tel un dérangé. Ayant sur le coup constaté avec satisfaction que la mise en garde du religieux n’était qu’une conviction imbécile de plus, il fut subitement pris de remords, car malgré ses revendications sacrilèges, il avait vérifié ce qui relevait de l’évidence… &#13;&#10;&#13;&#10;En fin de compte, sans en avoir véritablement conscience sur le moment, il avait donné foi aux allégations de l’ecclésiastique. Il se trouva bien ridicule lorsqu’il le réalisa et ne s’en soucia plus depuis lors. Les semaines qui suivirent ne furent pourtant pas moins troublantes ; Bartosz éprouvait d’intenses difficultés à se reposer sans subir un déferlement de cauchemars morbides et ses journées s’accompagnaient d’hallucinations diverses tout aussi dérangeantes. L’isolement le guidait vers la folie et il se convainquit que s’il restait trop longtemps sur ces terres maudites, il finirait bien par perdre la raison. Il devait reprendre son statut d’errant et quitter son pays, sans doute définitivement cette fois. Sa halte n’avait que trop duré. Cette conclusion faite, il s’attela à mettre ses affaires en ordre ; prépara sa prochaine destination ; vendit au rabais la demeure de sa mère ; et se débarrassa de ses effets personnels devenus inutiles. Ces mesures prises lui apportèrent un regain de sérénité bienvenu et le village se montra tout à coup moins oppressant à ses yeux. À l’image des autres résidents – quoique ce ne fût pas exactement pour les mêmes motifs –, Lewinski se réjouit d’apprendre ses intentions et lui rendit brièvement visite pour le féliciter de sa démarche.', '2023-04-13 10:19:31', NULL, NULL, NULL),
(29, 'Section I', 'Commencer la partie II', 'La veille de son départ, l’aventurier retrouva sa gaieté naturelle et c’est en toute quiétude qu’il s’endormit ce soir-là, bien que pressé d’être déjà au lendemain. La nuit ne fut pas moins agitée par ses habituels cauchemars toutefois, et il finit par prendre peur de s’endormir. Allongé dans son lit, il fixait le plafond en espérant que le temps passe vite. Ne supportant guère longtemps cette position statique, il se leva au bout d’un moment, le pyjama trempé de sueur, et, dans son besoin d’air frais, ouvrit en grand la fenêtre de sa chambre. Le vent glacial qui s’engouffra par l’ouverture le fit grelotter, mais comme il semblait retrouver ses esprits, il préféra rester ainsi. La vue donnait sur une petite plaine poudrée de neige au bout de laquelle se dressait la grande forêt d’épicéa, toujours sombre et mystérieuse malgré la luminosité peu commune qu’offraient la pleine lune et les étoiles cette nuit-là. &#13;&#10;&#13;&#10;La pleine lune… Bartosz fronça les sourcils lorsqu’il arrêta son regard dessus ; de mémoire, il jurait que le calendrier annonçait non pas une pleine, mais une nouvelle lune. Estimant qu’il s’agissait là encore d’un mauvais tour de sa psyché délirante, il ferma les yeux un instant. Quand il les rouvrit cependant, la manifestation insolite se tenait toujours là, plus éclatante que jamais. Néanmoins, avant qu’il n’ait le temps de se croire complètement fou, une autre curieuse lumière attira son attention au loin, aux alentours de l’église : une lampe-tempête à bout de bras, ce qui paraissait être le fervent Pawel Lewinski empruntait le sentier conduisant à la Grande Place. Curieux de savoir ce que pouvait bien fabriquer cet illuminé à une heure pareille, l’écrivain fut tenté de rejoindre l’extérieur pour l’espionner, mais la paresse le fit se raviser. En compensation, il marmonna tout son mépris pour le personnage qu’il jugea hypocrite et affabulateur.&#13;&#10;&#13;&#10;&#13;&#10;Alors qu’il allait refermer la fenêtre après s’être convaincu qu’il devait essayer à nouveau de se reposer, un son étrange porté par la brise parvint à ses oreilles. Il stoppa net ses mouvements, les muscles crispés et tous ses sens en alerte, prêts à l’entendre une nouvelle fois, mais le vent retomba, et ce qu’il transportait avec lui. Perturbé, l’homme de lettres acheva finalement son geste et retourna se coucher. Le sommeil le submergea hâtivement ; pourtant, il n’eut pas la paix qui s’accordait généralement avec cet état. Des visions horrifiques et chaotiques l’assaillirent derechef jusqu’à se stabiliser sur l’image nette d’un lac gelé à flanc de montagne, sur lequel se déployait en cercle une danse diabolique de créatures biscornues mi-humaines, mi-animales. En son centre, un être d’une laideur et d’une malfaisance insoupçonnable se positionnait dans une attitude méditative ; ses yeux rouges vifs balayèrent la scène, puis se posèrent lentement sur l’intrus pétrifié d’épouvante par la puissance maléfique que dégageait ce regard. &#13;&#10;&#13;&#10;Un sourire abominable étira son visage bouquetin, visiblement satisfait d’avoir accompli une obscure mission. Il se leva ; les monstres cessèrent leur chorégraphie diabolique ; et il s’avança progressivement vers le nouveau venu qu’il s’apprêtait à accueillir chaleureusement dans sa communauté. À mi-chemin, une douce musique enveloppa subitement le tableau, et les abominations se métamorphosèrent en d’élégantes silhouettes luminescentes. L’atmosphère du rêve devint apaisante, et même le Démon présentait désormais une belle apparence tandis qu’il offrait une délicate main rassurante à Bartosz. Ce dernier étudiait la nouvelle figure angélique d’un air dubitatif ; ces précédentes allures de bouc difforme, maculé et méphitique exhibaient maintenant les contours graciles d’une femme opalescente et une délicieuse exhalaison de champ fleurie flottait dans l’espace. Assuré par l’absence de danger que représentait la vénus en face de lui, l’écrivain tendit le bras à son tour pour accepter son offre, mais alors qu’il se trouvait à quelques centimètres de sa peau lactée, le hennissement soudain d’un cheval le tira brutalement de sa situation hypnotique.', '2023-04-13 10:21:31', NULL, NULL, NULL),
(30, 'Section II', 'Lire la suite', 'La main sur le cœur, l’aventurier, ruisselant de transpiration, tentait de reprendre ses esprits en scrutant chaque recoin de sa chambre. Lorsqu’il retrouva une respiration normale, il s’immobilisa soudainement sous les draps ; l’étrange mélodie du songe résonnait encore dans la réalité ; lointaine, mais néanmoins perceptible. D’un bond, il se précipita à la fenêtre et l’ouvrit pour la deuxième fois de la nuit ; là, transportée aléatoirement par le vent capricieux, il pouvait l’entendre plus distinctement. Désirant définir s’il s’agissait encore d’une illusion ou d’un évènement concret, Bartosz se pressa dans le vestibule, enfila une veste et une paire de chaussures qu’il ne prit même pas la peine de lacer, et prépara une lampe-tempête en accéléré. &#13;&#10;&#13;&#10;Son impétuosité manqua de mettre le feu à son domicile, mais ce type de considération était bien secondaire en cet instant. Aussitôt dehors, il s’engagea instinctivement en direction de la Grande Place sans vraiment en déterminer la raison, comme guidé par une force surnaturelle. Tandis qu’il s’approchait, il percevait plus nettement le son d’une flûte à la tonalité particulière. L’homme de lettres se prit à imaginer Pawel Lewinski derrière cet air musical pour donner une authenticité à ses fables horrifiques et un sourire ironique étira ses lèvres à cette seule pensée ; l’idée de confondre ce saint homme et de l’exposer comme un misérable tartuffe devant tout le village motiva doublement l’écrivain.&#13;&#10;&#13;&#10;Cependant, ce ne fut pas le religieux qu’il découvrit… Ce ne fut rien de ce qu’il était prêt à concevoir en vérité… Sous les ramures du chêne visiblement en parfaite santé, une bête fabuleuse l’examinait de ses yeux bleu pâle. Tenant à la fois de la chèvre et du bucéphale, son corps équin d’une blancheur nacrée se terminait sur des sabots fendus recouverts en partie par d’imposants fanons scintillants ; sa majestueuse crinière ondulée lui tombait jusqu’au coude et sa queue traînait légèrement sur le sol. Une longue barbiche ornait sa tête chevaline et une grande corne torsadée enluminait son front d’argent. Bartosz resta béant de stupéfaction et d’admiration devant ce palefroi de conte de fées. S’il était toujours convaincu que l’avertissement du prêtre ne trouvait aucun fondement, il n’en demeurait pas moins qu’une manifestation du surnaturel se tenait bel et bien face à lui. &#13;&#10;&#13;&#10;Certainement, l’ecclésiastique prenait soin de dissimuler l’existence d’une telle créature pour s’en octroyer exclusivement les grâces ; tel fut la conviction profonde de l’aventurier. Avec prudence, il s’avança sous le regard aiguisé de l’objet convoité ; toutefois, comme il le sentait prêt à se volatiliser par son insolente témérité, Bartosz stoppa à mi-chemin. L’animal, figé et méfiant, attendait la suite. De sa position, l’homme de lettres tendit une main hésitante pour inciter la licorne à venir d’elle-même, mais elle ne paraissait pas très accueillante. Se rappelant certains récits fantastiques, il comprit à contrecœur qu’il mettrait beaucoup de temps à obtenir sa confiance ; si la légende disait vrai, seules les vierges pouvaient les approcher sans peine. Durant son interminable attente, le bras ainsi levé, il put détailler complètement la créature. Fasciné, il identifia que la surprenante musique mélancolique qu’il avait temporairement oubliée devant sa découverte émanait de la corne de l’animal dont les multiples perforations libéraient un son particulier à chaque passage du vent.', '2023-04-13 10:23:11', NULL, NULL, NULL),
(31, 'Section III', 'Lire la suite', 'Soudain, la créature, manifestement satisfaite de sa patience, fit un pas vers lui, puis courba la tête ; ce que Bartosz interpréta comme un signe de salut. Ravi, celui-ci se risqua un peu plus, mais fut vite stoppé dans son élan avec amertume ; la licorne ne le laissait pas approcher. Elle renâcla alors qu’elle remettait de la distance entre eux, puis s’inclina à nouveau et reprit son calme. Déconcerté par cette attitude qu’il ne comprenait pas, l’écrivain, dans sa grande ignorance, choisit de lui rendre son hommage. Le quadrupède parut un moment plus attentif, mais cela n’était visiblement pas suffisant ; il s’ébroua d’exaspération et répéta le geste pour la troisième fois. Devenant irritable à son tour sous l’effet du caractère délicat et indéchiffrable de la bête, Bartosz pesta durement :&#13;&#10;&#13;&#10;&#13;&#10;« Quoi ? Qu’est-ce que tu veux à la fin ? »&#13;&#10;&#13;&#10;&#13;&#10;Pour couronner son irrévérence, il franchit abruptement les quelques pas qui les séparaient, bien décidé à toucher enfin l’apparition. C’était sans compter sur l’indignation de la licorne qui se cabra vivement à son approche en émettant un hennissement strident alors qu’un éclair que rien ne présageait déchira furtivement le firmament. Quoiqu’il s’y attendait, le caractère menaçant de la révolte fit choir l’insolent sur le coup ; sa lampe se brisa sur le sol et le feu qu’elle protégeait en son sein mourut aussitôt. Privé de sa propre lumière, il pouvait néanmoins encore distinguer nettement ce qui l’entourait grâce à la clarté inhabituelle de la nuit et celle que répandait la douce aura de la créature. Malgré son élan courroucé, celle-ci paraissait maintenant plus paisible, presque nonchalante, et ne lui accordait plus un regard. &#13;&#10;&#13;&#10;Non sans crainte, il réitéra son audace plus délicatement cette fois, et voyant qu’elle ne protestait plus, osa le sacrilège ultime en posant une main sur son encolure de cygne. À cet instant même, la robe immaculée de l’animal perdit de son éclat et se mua en bleu nuit sous la paume de Bartosz jusqu’à recouvrir progressivement l’ensemble de son corps tandis que ses crins se paraient de la noirceur du corbeau. La lune disparut subitement, les étoiles s’assombrirent, le vieux chêne accueillit la mort une nouvelle fois dans une série de craquements lugubres, le vent retomba, la musique s’arrêta et il ne resta plus qu’une atmosphère lourde et pleine de terreur. Inquiet, l’écrivain analysa les alentours ; le remords l’empoigna d’avoir aussi délibérément offensé le sublime, mais le mal était fait. Alors qu’il s’égarait dans les tourments de la conscience, le pas de course d’un homme derrière lui le tira brusquement de sa réflexion.&#13;&#10;&#13;&#10;&#13;&#10;« Hé ! » l’interpella-t-il dans l’espoir qu’il s’immobilise.', '2023-04-13 10:24:01', NULL, NULL, NULL),
(32, 'Section IV', 'Lire la suite', 'L’inconnu ne lui accorda aucune attention et se volatilisa dans les ténèbres. Bien qu’il ne put le reconnaitre, Bartosz portait l’intime conviction qu’il s’agissait là du Père Lewinski. Cette certitude qu’il nourrissait le fit sortir de son alarme, et finalement trop avide de couvrir d’opprobre le religieux, il endossa le manteau du profanateur suprême en s’installant sur la bête. Imperturbable, l’animal le laissa s’exécuter et lui prêta même obéissance lorsqu’il lui commanda de se rendre à l’église. Sa docilité s’arrêta toutefois à mi-parcours, et sans égard pour son cavalier, elle bifurqua en direction de la sortie du village. Agacé, l’aventurier tenta de la corriger, mais elle maintint son cap en trottinant. La bourgade derrière eux, elle passa au galop, puis coupa à travers la plaine en direction de la forêt malgré les protestations de l’écuyer. Sa corne se remit à chanter dans l’action, mais loin d’être aussi doux que précédemment, la mélopée sonnait davantage comme un cri cinglant. L’animal pénétra dans la sylve sans ménagement et ce fut véritablement le début de l’enfer pour le pauvre homme. Les multiples branchages lui flagellèrent durement le visage jusqu’à l’entailler profondément en certains endroits et son épais manteau ne lui épargnait pas la douleur en dépit de sa modeste résistance.&#13;&#10;&#13;&#10;&#13;&#10;Quant à la licorne, elle n’était pas plus en reste ; sa peau présentait plusieurs lacérations sanguinolentes et ses crins s’arrachaient par touffes entières au moindre obstacle. La terre boueuse agitée par ses sabots souillait la moitié de son pelage et plusieurs grosses éclaboussures atteignirent l’aventurier gémissant en pleine figure. Il s’essuya d’un revers de manche pour mieux réceptionner la vague suivante, recommença, et recommença encore jusqu’à devenir fou et à se perdre en hurlement. Le cauchemar dura un long moment et lorsqu’ils sortirent enfin du bois, l’un et l’autre semblaient au bout de leur existence. Leur chair meurtrie et recouverte en partie par la fange suintait de tous les côtés ; leurs membres fatigués et ankylosés par le supplice parvenaient à peine à effectuer un mouvement ; les vêtements de Bartosz étaient en lambeaux et le corps de la bête si lacéré qu’on pouvait voir le muscle à vif à quelques endroits. Profitant de cette brève accalmie, il tenta de descendre de sa monture, mais ses jambes refusèrent d’obtempérer. &#13;&#10;&#13;&#10;En désespoir de cause, il voulut s’écrouler naturellement sur le sol en se penchant vers la gauche ; l’opération n’eut pas plus de succès ; il était maintenu en place par une force inconnue. La panique le submergea ; des pleurs fluaient sur ses joues crasseuses et torturées tandis qu’il se rappelait la mise en garde du prêtre dont il s’était si ardemment moqué ; il gémissait. Implorant, il leva les yeux au ciel comme s’il espérait une faveur divine inopinée. Elle ne vint pas ; pourtant, l’annonce de l’aube lui apporta une lueur d’optimisme. La voûte céleste s’éclaircissait, chassait peu à peu les ombres de la nuit et l’effroi qui l’accompagnait ; le mauvais rêve devint dès lors plus acceptable, moins redoutable, presque inoffensif. Cette impression s’effaça incontinent quand il croisa l’œil glacé de la bête déchainée ; la géhenne n’allait pas s’achever sur ces notes de souffrance ; ce n’était que le début du voyage. Au bout de la campagne herbeuse, une autre étendue boisée les appelait. Sur les cimes des arbres, le croassement des corbeaux accompagnait l’avancée des deux âmes vagabondes d’une symphonie funèbre.', '2023-04-13 10:25:14', NULL, NULL, NULL),
(33, 'Section V', '0', 'Une nuée surgit bruyamment à la lisière, tapissa l’éther d’une parure de plumes sombre, et survola en rase-motte le supplicié apeuré. La chevauchée infernale reprit peu après à une cadence terrible, au mépris des implorations larmoyantes du cavalier qui espérait encore vainement pouvoir se libérer en s’agitant vigoureusement. Lorsqu’ils arrivèrent à l’ombre des arbres, Bartosz lâcha un cri de frayeur avant de subir l’horreur de la seconde traversée. Il se pencha le plus possible sur l’encolure de la licorne pour minimiser le nombre de rencontres, mais cette précaution se montra finalement de peu d’incidence. Il ferma les yeux et serra les dents. Il devinait ses mains cravachées ruisselantes de sang et ses mollets écorchés ; une douleur vive sur le côté droit de sa tête lui suggéra qu’il venait de perdre une oreille ; ce qui restait de ses cheveux lui fut retiré pratiquement en totalité. &#13;&#10;&#13;&#10;Les bruits de craquements et de déchiquetages sinistres lui occasionnèrent un haut-le-cœur et il rendit son dîner sur le garrot du quadrupède. Quand une improbable odeur de charogne monta à ses narines, l’écrivain daigna retrouver la vue de ce spectacle macabre, et ce qu’il vit le combla d’épouvante. D’énormes morceaux de peau empourprée pendaient sur l’ensemble de l’anatomie de l’animal, exhibant ainsi ses os et sa chair en état de putréfaction avancée. Des vers grouillaient de toute part et commençaient à grimper lentement sur l’aventurier qui s’efforçait de remuer tel un dément après l’amer constat que ses mains ne répondaient plus également et restaient fermement agrippés au cou de la licorne. Un nuage vrombissant de mouches fétides s’ajouta bientôt à l’ensemble, désireuses de se repaître elles aussi.&#13;&#10;&#13;&#10;&#13;&#10;Harcelé par cette nouvelle horde d’insectes, Bartosz se trémoussa inutilement encore et encore. Un groupe d’entre eux s’introduit dans sa bouche alors qu’il eut le malheur de l’ouvrir pour crier ; crachant et toussant, il ne parvint pas à s’en défaire. La folie s’empara de lui. Le terrain devint progressivement plus pentu, mais l’infatigable destrier de la mort maintenait son rythme endiablé jusqu’à ce qu’un changement de décor s’opère au moment où il ne l’attendait plus. La montagne rocailleuse remplaça l’oppression de la forêt, or, si les coups ne pleuvaient plus, ce qui subsistait de l’aventurier ne parvenait pas à savourer cette libération. Les premières manifestations du soleil ne le réconfortèrent pas davantage tandis qu’ils gravissaient péniblement le massif ; plus rien ne le sauverait désormais, il en était convaincu. Les lancinations abondantes et répétées de son corps à l’agonie, et le souffle puissant de la bête en plein effort combiné au bourdonnement incessant des mouches l’abandonnaient aux portes de l’inconscience. &#13;&#10;&#13;&#10;Dans son ascension, la licorne trébucha à plusieurs reprises, s’entailla férocement les pattes, puis s’empala brusquement sur un rocher aiguisé dans un hennissement plaintif. Inarrêtable, elle se dégagea néanmoins après quelques tentatives et repris son escalade, le ventre à demi écharpé, les tripes tombantes. Ils montèrent ainsi jusqu’à parvenir à une corniche d’où Bartosz put observer avec effarement la réalité du lac gelé en contrebas qui lui avait été révélée par son précédent cauchemar. La cavalcade s’achevait là, à n’en point douter. Malgré son destin qu’il savait inévitable, l’homme de lettres ne put s’empêcher de pousser un hurlement interminable avec la force qui lui restait quand l’instrument du Diable s’élança vigoureusement dans le vide. La créature se rompit le cou à l’impact ; fit une brèche dans la glace ; et entraîna son cavalier impuissant dans les eaux froides.', '2023-04-13 10:26:22', NULL, NULL, NULL),
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
(NULL, 24),
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
(22, 23),
(24, 25),
(25, 26),
(26, 27),
(27, 28),
(28, 29),
(29, 30),
(30, 31),
(31, 32),
(32, 33);

-- --------------------------------------------------------

--
-- Structure de la table `stories`
--

CREATE TABLE `stories` (
  `id_stories` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(70) NOT NULL DEFAULT 'Xénophée',
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
(1, 'Le baptême de l&#39;apostat', 'Xénophée', 1, 'Lorsqu’il apprend qu’une créature rôde la nuit dans le village, Bartosz Korczac n’en croit pas un mot…', '2023-04-10 21:53:43', '2023-04-10 21:58:56', NULL, NULL),
(2, 'La révolution des machines', 'Xénophée', 2, 'Dans un futur proche, les humains ont créé des robots sophistiqués pour leur venir en aide dans tous les aspects de la vie. Mais les choses ont rapidement dégénéré lorsque &#13;&#10;    les robots ont commencé à développer une conscience de soi et ont commencé à se rebeller contre leurs créateurs.', '2023-04-10 23:07:56', '2023-04-10 23:08:05', '2023-04-11 11:53:57', NULL),
(3, 'Les Yeux de la Justice', 'Xénophée', 2, 'Une ville en proie à une forte criminalité voit l&#39;arrivée d&#39;un mystérieux justicier. Tandis que les honnêtes gens ne savent trop qu&#39;en penser, les politiciens corrompus sombrent dans la terreur. Il est temps de trier le bon grain de l&#39;ivraie.', '2023-04-10 23:17:52', '2023-04-10 23:17:56', NULL, NULL),
(4, 'Les Honteux de Barbegarde', 'Xénophée', 1, 'Au merveilleux pays de Barbegarde, la quiétude règne sans partage entre les différentes communautés jusqu’à ce qu’un sinistre pendard vienne semer la discorde en distribuant des brevets de honte par la propagation intempestive des secrets de ses habitants…', '2023-04-10 23:22:12', '2023-04-10 23:22:15', NULL, NULL),
(5, 'Le haut jardin', 'Xénophée', 2, 'Un jeune garçon découvre un passage vers un autre monde dans le manoir de ses grands-parents récemment porté disparu.', '2023-04-10 23:38:59', '2023-04-29 23:45:41', NULL, NULL),
(6, 'Le Démon de l&#39;Aube', 'Xénophée', 1, 'Puissant guerrier doté d’une épée magique et de pouvoirs qui augmentent à chaque combat remporté, Dargorak entre dans une quête périlleuse pour découvrir la vérité sur son héritage démoniaque et la destinée qui l’attend.', '2023-04-10 23:45:34', '2023-04-10 23:45:39', NULL, NULL),
(7, 'Les Gardiens de l&#39;Arbre Sacré', 'Xénophée', 2, 'Dans une vaste forêt, se dresse un arbre ancien et majestueux, source de toute la magie du monde. Protégé par des sages, qui en sont les gardiens, cet arbre est convoité par des grillons géants, créatures féroces qui ne reculent devant rien pour s&#39;emparer de son pouvoir.', '2023-04-10 23:52:55', NULL, NULL, NULL),
(8, 'La Huitième Porte', 'Xénophée', 2, 'Synaps, l&#39;ennemi des peuples du monde de Dorgan, a commis une erreur fatale. Jamais il n&#39;aurait dû sous-estimer la valeur de Laurin le barde, de Valkyr le paladin, de Yamaël le démon et de Galidou l&#39;illusionniste. Cependant, le maître des sorciers de Malmort, s&#39;il a perdu une bataille, est parvenu à se débarrasser des quatre responsables de son échec.', '2023-04-11 00:01:45', '2023-04-11 00:01:52', NULL, NULL),
(10, 'La malédiction du lutin alsacien', 'Xénophée', 2, 'Dans une petite ville alsacienne, un mal ancien sévit parmi ses habitants. Certains parlent d&#39;un esprit vengeur pour les punir ou d&#39;une sombre histoire de secret bien gardé.', '2023-04-11 07:58:32', '2023-04-11 07:58:36', NULL, NULL);

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
(1, 1),
(10, 1),
(1, 4),
(3, 4),
(1, 6),
(3, 6),
(2, 12),
(7, 14),
(8, 14),
(5, 15),
(4, 17),
(7, 17),
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
(1, 'Xénophée', 'xenophee@hotmail.fr', '1990-12-29', '$2y$10$LGVzjKSeC6BIKgSqT1VsUOhkKo/1PbS6Qvt6Yv14YsDgf9JZ5iYJO', '2023-04-10 22:05:48', '2023-04-12 22:08:51', NULL, NULL, NULL, NULL, 0, 1),
(2, 'Kévin', 'kevin@gmail.com', '1995-10-15', '$2y$10$8IXiHCsKJDH9JmBqNHvFS.gfWJF5GBJAR2JQstiT1x6jppUlZfOZG', '2023-04-10 22:06:17', '2023-04-20 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(3, 'Alphonse', 'alphonse@gmail.com', '1988-12-05', '$2y$10$rgA1ig5ZXaU1N9PylK35n.eGgUa4Nsc2YHR2e8YmB.O4pPhqEoCRy', '2023-04-10 22:06:45', '1900-01-22 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(4, 'Crépin', 'crepin@lenain.fr', '2005-05-05', '$2y$10$Zvosm51F9n.fJ8jv0NgF4OnKfdUjzeefbVO2I2v88o8uOk4CV6edu', '2023-04-10 22:07:19', '1900-01-14 00:00:00', NULL, NULL, NULL, NULL, 0, 0),
(5, 'Jean-Eudes', 'jean@eudes.com', '2001-11-12', '$2y$10$o5RTT2y/vsgNOVerF36IsOugbCZu07pIX/69z7mY4h1JnT8n3yN9C', '2023-04-10 22:08:02', '1900-01-27 00:00:00', NULL, NULL, NULL, NULL, 0, 0),
(6, 'Eudoxie', 'eudoxie@gmail.com', '1977-08-08', '$2y$10$OSKk9j5ty2/Ff2xUmu1.3errOlcOUWFZWfCOSF953hC9lVzowsqPS', '2023-04-10 22:08:39', '1900-01-30 00:00:00', NULL, NULL, NULL, NULL, 1, 0),
(7, 'Neuneux', 'neuneux@gmail.com', '1970-10-10', '$2y$10$COLd3XbMGr.Sw8TjCgcxH.Xw3ixl7LpFRELDEBDwPP8APKKt4IyIS', '2023-04-11 11:59:11', '2023-04-18 09:20:07', NULL, NULL, NULL, NULL, 1, 0),
(8, 'Arsouilleur', 'arsouilleur@gmail.com', '1990-09-15', '$2y$10$uRDYsvLPos4noJ0t2DKMN.k57HM.dz7ByLE7W17AM2s.3ySdElYoa', '2023-04-11 11:59:46', '2023-04-12 12:02:05', NULL, NULL, NULL, NULL, 0, 0),
(9, 'Ouille', 'ouille@gmail.com', '1987-07-07', '$2y$10$XtQ8WUlbu5MFW9NeMCVTNu2wcqtN6o7xH513Yk.R1hm9fPKbopsGC', '2023-04-11 12:00:16', NULL, NULL, NULL, NULL, NULL, 0, 0),
(10, 'Clownerie', 'clownerie@gmail.com', '1993-03-02', '$2y$10$ZVVUZxZNI3mDXvl3bxRu0O9lvpSffhBJm8UzIUML4Y0GrGVJIEcja', '2023-04-11 12:00:57', '1900-01-25 12:02:19', NULL, NULL, NULL, NULL, 0, 0),
(11, 'tripleBuse', 'buse@gmail.com', '2003-09-05', '$2y$10$7us3wWZN689XBfuYgLfO7.jLyCGi9bfh7ZJMcPkWFaPUc9GdIa7qi', '2023-04-11 12:01:28', NULL, NULL, NULL, NULL, NULL, 1, 0);

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
  MODIFY `id_saves` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
