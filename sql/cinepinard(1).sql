-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Février 2016 à 14:19
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cinepinard`
--
CREATE DATABASE IF NOT EXISTS `cinepinard` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cinepinard`;

-- --------------------------------------------------------

--
-- Structure de la table `genres_associations`
--

CREATE TABLE `genres_associations` (
  `id` int(11) NOT NULL,
  `id_movies_genre` int(11) NOT NULL,
  `id_wines_genre` int(11) NOT NULL,
  `moderation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Associations genres de film et genres de vins';

--
-- Contenu de la table `genres_associations`
--

INSERT INTO `genres_associations` (`id`, `id_movies_genre`, `id_wines_genre`, `moderation`) VALUES
(1, 13025, 2, 1),
(2, 13026, 5, 1),
(3, 13016, 2, 1),
(4, 13001, 3, 1),
(5, 13027, 1, 1),
(6, 13047, 5, 1),
(7, 13040, 1, 1),
(8, 13005, 5, 1),
(9, 13002, 4, 1),
(10, 13013, 5, 1),
(11, 13049, 5, 1),
(12, 13006, 5, 1),
(13, 13007, 1, 1),
(14, 13054, 1, 1),
(15, 13008, 1, 1),
(16, 13009, 3, 1),
(17, 13010, 4, 1),
(18, 13022, 4, 1),
(19, 13033, 5, 1),
(20, 13036, 5, 1),
(21, 13012, 3, 1),
(22, 13014, 2, 1),
(23, 13015, 1, 1),
(24, 13031, 4, 1),
(25, 13053, 1, 1),
(26, 13043, 5, 1),
(27, 13048, 5, 1),
(28, 13028, 3, 1),
(29, 13018, 4, 1),
(30, 13024, 4, 1),
(31, 13021, 3, 1),
(32, 13051, 5, 1),
(33, 13050, 2, 1),
(34, 13023, 4, 1),
(35, 13019, 3, 1),
(36, 13025, 7, 1),
(37, 13026, 6, 1),
(38, 13016, 7, 1),
(39, 13001, 10, 1),
(40, 13027, 9, 1),
(41, 13047, 10, 1),
(42, 13040, 9, 1),
(43, 13005, 6, 1),
(44, 13002, 10, 1),
(45, 13013, 10, 1),
(46, 13049, 10, 1),
(47, 13006, 6, 1),
(48, 13007, 9, 1),
(49, 13054, 9, 1),
(50, 13008, 9, 1),
(51, 13009, 7, 1),
(52, 13010, 10, 1),
(53, 13022, 6, 1),
(54, 13033, 10, 1),
(55, 13036, 6, 1),
(56, 13012, 7, 1),
(57, 13014, 7, 1),
(58, 13015, 9, 1),
(59, 13031, 6, 1),
(60, 13053, 9, 1),
(61, 13043, 10, 1),
(62, 13048, 10, 1),
(63, 13028, 10, 1),
(64, 13018, 6, 1),
(65, 13024, 10, 1),
(66, 13021, 7, 1),
(67, 13051, 10, 1),
(68, 13050, 7, 1),
(69, 13023, 6, 1),
(70, 13019, 10, 1),
(71, 13025, 12, 1),
(72, 13026, 13, 1),
(73, 13016, 12, 1),
(74, 13001, 11, 1),
(75, 13027, 13, 1),
(76, 13047, 11, 1),
(77, 13040, 13, 1),
(78, 13005, 13, 1),
(79, 13002, 13, 1),
(80, 13013, 11, 1),
(81, 13049, 11, 1),
(82, 13006, 13, 1),
(83, 13007, 11, 1),
(84, 13054, 13, 1),
(85, 13008, 13, 1),
(86, 13009, 12, 1),
(87, 13010, 13, 1),
(88, 13022, 12, 1),
(89, 13033, 11, 1),
(90, 13036, 13, 1),
(91, 13012, 12, 1),
(92, 13014, 12, 1),
(93, 13015, 13, 1),
(94, 13031, 12, 1),
(95, 13053, 11, 1),
(96, 13043, 11, 1),
(97, 13048, 11, 1),
(98, 13028, 11, 1),
(99, 13018, 12, 1),
(100, 13024, 13, 1),
(101, 13021, 12, 1),
(102, 13051, 11, 1),
(103, 13050, 12, 1),
(104, 13023, 12, 1),
(105, 13019, 11, 1),
(106, 13025, 15, 1),
(107, 13026, 16, 1),
(108, 13016, 15, 1),
(109, 13001, 15, 1),
(110, 13027, 15, 1),
(111, 13047, 15, 1),
(112, 13040, 15, 1),
(113, 13005, 16, 1),
(114, 13002, 16, 1),
(115, 13013, 15, 1),
(116, 13049, 15, 1),
(117, 13006, 16, 1),
(118, 13007, 15, 1),
(119, 13054, 15, 1),
(120, 13008, 15, 1),
(121, 13009, 15, 1),
(122, 13010, 16, 1),
(123, 13022, 15, 1),
(124, 13033, 15, 1),
(125, 13036, 16, 1),
(126, 13012, 15, 1),
(127, 13014, 15, 1),
(128, 13015, 15, 1),
(129, 13031, 15, 1),
(130, 13053, 15, 1),
(131, 13043, 15, 1),
(132, 13048, 15, 1),
(133, 13028, 15, 1),
(134, 13018, 15, 1),
(135, 13024, 16, 1),
(136, 13021, 15, 1),
(137, 13051, 15, 1),
(138, 13050, 15, 1),
(139, 13023, 15, 1),
(140, 13019, 15, 1),
(141, 13025, 14, 1),
(142, 13016, 14, 1),
(143, 13027, 14, 1),
(144, 13047, 16, 1),
(145, 13040, 14, 1),
(146, 13013, 16, 1),
(147, 13049, 16, 1),
(148, 13054, 14, 1),
(149, 13008, 14, 1),
(150, 13009, 14, 1),
(151, 13022, 14, 1),
(152, 13033, 16, 1),
(153, 13012, 14, 1),
(154, 13014, 14, 1),
(155, 13015, 14, 1),
(156, 13031, 14, 1),
(157, 13043, 16, 1),
(158, 13048, 16, 1),
(159, 13018, 14, 1),
(160, 13021, 14, 1),
(161, 13051, 16, 1),
(162, 13050, 14, 1),
(163, 13023, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `movies_genres`
--

CREATE TABLE `movies_genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Genres des films';

--
-- Contenu de la table `movies_genres`
--

INSERT INTO `movies_genres` (`id`, `name`) VALUES
(13001, 'Aventure'),
(13002, 'Comédie dramatique'),
(13005, 'Comédie'),
(13006, 'Dessin animé'),
(13007, 'Documentaire'),
(13008, 'Drame'),
(13009, 'Epouvante-horreur'),
(13010, 'Erotique'),
(13012, 'Fantastique'),
(13013, 'Comédie musicale'),
(13014, 'Guerre'),
(13015, 'Historique'),
(13016, 'Arts martiaux'),
(13018, 'Policier'),
(13019, 'Western'),
(13021, 'Science fiction'),
(13022, 'Espionnage'),
(13023, 'Thriller'),
(13024, 'Romance'),
(13025, 'Action'),
(13026, 'Animation'),
(13027, 'Biopic'),
(13028, 'Péplum'),
(13031, 'Judiciaire'),
(13033, 'Expérimental'),
(13036, 'Famille'),
(13040, 'Classique'),
(13043, 'Musical'),
(13047, 'Bollywood'),
(13048, 'Opera'),
(13049, 'Concert'),
(13050, 'Sport event'),
(13051, 'Show'),
(13053, 'Movie night'),
(13054, 'Drama');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Rôles des utilisateurs';

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL,
  `millesime` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stock vins';

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `photo` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_postcode` varchar(255) NOT NULL,
  `delivery_town` varchar(255) NOT NULL,
  `delivery_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fiches utilisateurs';

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `nickname`, `email`, `password`, `role_id`, `photo`, `phone_number`, `address`, `postcode`, `town`, `country`, `delivery_name`, `delivery_address`, `delivery_postcode`, `delivery_town`, `delivery_country`) VALUES
(1, 'prenom', 'admin1', 'pseudo-admin', 'admin@admin.fr', '$2y$10$XL.HeF0pJmrKRCSpxXT3ReTrdIY9c2QcqvI86dYn89/l/ZFneWMXy', 1, 'uploads/1.jpg', '0606060606', 'adresse de l''administrateur', '33500', 'Libourne', 'France', '', '', '', '', ''),
(2, 'prénom-utilisateur', 'nom-utilisateur', 'pseudo-utilisateur', 'user@user.fr', '$2y$10$wLcgdOLvycqYp4t7Db57.eHUqmxCPTAjsSBbGtB8z0x.xmHKOvXvS', 2, 'uploads/2.png', '0556565656', 'adresse de l''utilisateur', '33000', 'Bordeaux', 'france', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `users_notes_comments`
--

CREATE TABLE `users_notes_comments` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL,
  `perfect_match` tinyint(1) NOT NULL DEFAULT '0',
  `note` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `moderation` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Notes et commentaires sur les associations des utilisateurs';

-- --------------------------------------------------------

--
-- Structure de la table `users_preferences`
--

CREATE TABLE `users_preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Préférences utilisateurs';

-- --------------------------------------------------------

--
-- Structure de la table `wines`
--

CREATE TABLE `wines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `appellation` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `moderation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Détail des vins';

--
-- Contenu de la table `wines`
--

INSERT INTO `wines` (`id`, `name`, `appellation`, `country`, `description`, `image`, `categorie_id`, `genre_id`, `moderation`) VALUES
(1, 'CHARDONNAY VIOGNIER 2014 - LAURENT MIQUEL', 'Pays d''Oc IGP', '', 'Un blanc unique et original ou quand la fraîcheur et l’élégance du Chardonnay rencontre le fruité et la rondeur du Viognier\n\nDéjà passé maître dans la production et l’élevage du Viognier, Laurent Miquel nous surprend avec cette cuvée unique et originale à laquelle il assemble un cépage très différent : le Chardonnay. Ce dernier vient soutenir et compléter avec une aisance folle le Viognier, apportant harmonieusement sa part d’élégance et de fraîcheur aux notes subtiles d’abricot et de pêche caractéristiques du cépage rhodanien. Le résultat est bluffant : fruité et finesse s’articulent parfaitement et font de ce blanc à petit prix un vin très bien calibré pour accompagner un repas entier.', '', 2, 6, 1),
(2, 'LES ENFANTS TERRIBLES 2014 - CHARDONNAY - AEGERTER PERE ET FILS', 'Pays d''Oc IGP ', '', 'Un vin à petit prix indispensable pour égayer vos apéritifs !\n\nEn plein pays d’Oc, sur les sols argilo-calcaires idéalement ensoleillés du Languedoc-Roussillon, la maison Aegerter produit le cépage blanc emblématique de la Bourgogne : le Chardonnay ! De cette rencontre naît ce blanc floral, fruité, facile et convivial... pourquoi s''en passer ?', '', 2, 6, 1),
(3, 'JACQUERE 2015 - DOMAINE DE ROUZAN', 'Savoie AOP', '', 'Un nectar frais et aromatique, à boire sans chichi !\n\nAvec cette Jacquère, le domaine de Rouzan nous prouve sa capacité à créer des vins d''une belle qualité, frais et équilibrés.  Cette cuvée, friande et cristalline nous accueille au nez sur des notes fleuries et amyliques de banane, pêche et fleur d’oranger. La bouche poursuit ce chemin aromatique, portée par une minéralité et une belle persistance aromatique. Un vin au rapport qualité-prix-plaisir implacable !', '', 2, 6, 1),
(4, 'BLANC DES DEMOISELLES 2014 - CELLIER DES DEMOISELLES', 'Corbières AOP ', '', 'Une véritable référence du Cellier,  l''un des vins le plus récompensé de toute la région Languedoc - Roussillon sur les dix dernières années\n\nCe Blanc des Demoiselles nous ravit par ses arômes de fruits exotiques et de fleurs blanches. Une véritable gourmandise à partager en toutes occasions !', '', 2, 6, 1),
(5, 'ENTRE DEUX MERS 2014 - CHATEAU HAUT NADEAU', 'Entre-Deux-Mers AOC ', '', 'Coup de coeur de nos sommeliers !\n\nCet Entre-Deux-Mers a été élu à l''unanimité "Coup de Coeur" par nos sommeliers lors de leur dernière dégustation de vins blancs en Bordeaux. Ce côté très frais et fruité vous envahit dès la première gorgée, et votre palais est séduit par l''équilibre très cristallin et fin de cette cuvée. Avec un tel rapport qualité - prix, vous êtes sûr de faire le bon choix pour accompagner vos plateaux de fruits de mer et poissons cuisinés. Ne passez pas à côté !!!', '', 2, 6, 1),
(6, 'CLOSERIE DU BAILLI 2014', 'Côtes de Bourg AOC ', '', 'Un vin de plaisir à petit prix !\n\nLa Closerie du Bailli 2014 attire tout de suite l''oeil avec sa robe jaune étincelante. Gras et fruité, avec un remarquable équilibre finement boisé aux notes vanillées, ce Côtes de Bourg se poursuit sur une belle longueur en bouche réhaussée par une pointe de fraicheur. Ce vin offre un rapport prix-plaisir très intéressant et s''adaptera à toutes les circonstances !', '', 2, 6, 1),
(7, 'FAVUGNE BIANCO 2014 – TEANUM', 'San Severo DOC ', 'ITALIE', 'Vous êtes nombreux à succomber aux charmes de Favugnë Rosso… Attendez de déguster son acolyte : Le Favugnë Bianco !\n\nComposée de cépages autochtones (60% Bombino, 40% Trebbiano), ce Favugnë Bianco arbore une très belle robe jaune aux reflets verts dégageant des arômes de fruits jaunes et mûrs. Velouté, gras et d’une fraîcheur irrésistible : Un blanc absolument parfait pour accompagner des antipasti ou les poissons grillés.', '', 2, 6, 1),
(8, 'SAUVIGNON T''AIR D''OC 2014 - DOMAINE GAYDA', 'Languedoc / Pays d''Oc IGP ', '', 'Un blanc chaleureux et fédérateur, au bon petit goût de "reviens-y" !\n\nRécolté à parfaite maturité, le Sauvignon offre une cuvée mono-cépage tout en vivacité et en fraîcheur. Au nez, les fruits exotiques et les agrumes s’accordent à merveille et se prolongent avec délice jusqu’en bouche où longueur et équilibre sont de rigueur. Comment lui résister ? Un vin de charme à petit prix : du plaisir sans limite !', '', 2, 6, 1),
(9, 'LE VIN DE MI-NUIT 2015 - VIGNOBLES DOM BRIAL', ' Languedoc / Côtes Catalanes IGP', '', 'Le vin de Mi-Nuit... Une tradition chez Dom Brial !\n\nDe la fraîcheur à revendre, du fruit à gogo et une finesse toujours présente ! Chaque année, les vendanges de Mi-nuit sont très attendues ! Elles sont ouvertes à toutes et tous. Le domaine invite les curieux, les amateurs et les novices à participer à cet évènement. Avant l''aube, équipé d''une lampe frontale, chacun se lance à la cueillette du Chardonnay à la fraîcheur de la  nuit. Une cuvée réalisée en partie par des gens comme vous et nous, qui sont devenus pendant une nuit, un peu vignerons ! C''est LE rapport qualité-prix-plaisir du Languedoc !', '', 2, 6, 1),
(10, 'FERNAND CHARDONNAY 2014\n\n', ' Languedoc / Pays d''Oc IGP ', '', 'Partage et convivialité !\n\nCe vin à la robe limpide et brillante présente des reflets argentés. Il offre un bouquet riche, complexe, aux nuances de fruits, de noisettes, de notes beurrées. La bouche est séduisante par sa palette aromatique avec un fruité agréable et une belle fraîcheur. Le vin de copain pas excellence !', '', 2, 6, 1),
(11, 'CUSTOZA 2015 – ZENATO', ' Vénétie / Custoza DOC', 'ITALIE', 'Coup de cœur : Un excellent vin blanc italien, parfait pour l’apéritif … Et pour le porte-monnaie !\n\nCustoza est un blanc vif et cristallin au joli bouquet aromatique, présentant des notes délicates florales et herbacées ainsi que de notes gourmandes de pomme. La bouche fraîche et bien équilibrée propose des saveurs à la fois douces et épicées. Allez-y les yeux fermés, le rapport plaisir/prix est des plus séduisants.', '', 2, 6, 1),
(12, 'CLASSIC 2014 - DOMAINE DU TARIQUET', 'Sud-Ouest / Côtes de Gascogne IGP ', '', 'Le domaine Tariquet a réussi à proposer un vin de tous les instants ! A l''apéritif, sur un repas, en famille, entre amis, à deux..\n\nChaque gorgée dégustée sera une véritable explosion de fruits, d''agrumes, accompagnée d''une agréable fraîcheur qui systématiquement fera appel à une nouvelle gorgée. Le conseil de nos sommeliers : avoir toujours une bouteille au frais... au cas où !', '', 2, 6, 1),
(13, 'PINOT BLANC 2013 - EVIDENCE - GUSTAVE LORENTZ', 'Alsace / Alsace AOC ', '', 'De la fraîcheur, de la minéralité, du naturel : un Pinot blanc cristallin et fédérateur !!!\n\nFière de son terroir et cette belle nature qui leur offre de si magnifiques vins, c’est comme une évidence que la maison Gustave Lorentz a créé une gamme bio. Limpide et brillant, ce Pinot Blanc 2013 offre un nez frais et aérien aux arômes de fleurs blanches. La bouche est vive et sèche, parfaitement équilibrée grâce à une belle acidité bien intégrée et une agréable minéralité. Un vin sec et gourmand aux arômes croquants : une évidence autour de salades composées, de fruits de mer et de volailles !', '', 2, 6, 1),
(14, 'CABERNET-SAUVIGNON 2013 - VILLA DES ANGES', ' Languedoc / Pays d''Oc IGP ', '', 'Tout est séduisant dans cette cuvée : son fruit, sa note Parker, son prix. Facile et léger, ce rouge d’une grande fraîcheur n’oublie cependant pas d’en imposer en concentration et en intensité. Vous pouvez y aller les yeux fermés, impossible de se tromper !', '', 1, 1, 1),
(15, 'FAVUGNE ROSSO 2014 – TEANUM', 'Pouilles / San Severo DOC ', '', 'Un choix sûr, une découverte, un petit prix....\n\nFier de son cépage, le Montepulciano, ce vin italien est le parfait compagnon de vos apéritifs-dînatoires et barbecues. Le Favùgnë 2014 ne peut que vous faire craquer. !!! Avec un tel rapport qualité-prix, vous auriez tort de vous en priver', '', 1, 1, 1),
(16, 'DOMAINE DES VALS 2014 - CELLIER DES DEMOISELLES', 'Languedoc / Corbières AOP ', '', 'La célèbre Cuvée Tendresse change de nom, mais la qualité reste la même !\n\nAnciennement nommée Tendresse, cette nouvelle cuvée Domaine des Vals continue à jouer la carte de la séduction. Sa  robe profonde aux reflets violacés charmeurs ouvre sur un vin puissant aux arômes de fruits rouges et noirs. Frais et rond, ce vin de plaisir sur le fruit sera parfait pour une soirée en tête à tête où pour un apéro-dinatoire simple et convivial entre amis. Un vin rouge du Languedoc séducteur !', '', 1, 1, 1),
(17, 'FERNAND MERLOT 2014', ' Languedoc / Pays d''Oc IGP ', '', 'Partage et convivialité !\n\nCe vin présente une belle robe intense à la teinte pourpre. Il dégage des arômes de fruits rouges tels que la fraise et la framboise. La bouche séduit par sa structure, son ampleur, sa plénitude ainsi que par sa palette aromatique très agréable en final. Le vin de copain pas excellence !', '', 1, 1, 1),
(18, 'SYRAH T''AIR D''OC 2014 - DOMAINE GAYDA', ' Languedoc / Pays d''Oc IGP ', '', 'Du fruit et un prix mini : un vin de copain comme on les aime !\n\nCette cuvée 100% Syrah tout en fraîcheur et en fruit, à la bouche ronde et savoureuse, s’apprécie en toute simplicité. Croyez-nous, ce vin de franchise, ayant la gourmandise pour acolyte, vous réserve de biens beaux moments de partage (repas improvisés, apéritifs dinatoires) ! Un véritable souffle de fruits rouges et d’épices !', '', 1, 1, 1),
(19, 'TANNAT-MERLOT 2014 - ALAIN BRUMONT', ' Sud-Ouest / IGP Côtes de Gascogne', '', 'De l''audace et du génie pour un résultat 100% plaisir\n\nColoré et charmeur, léger et friand, ce vin de pays élaboré par Alain Brumont, réputé pour la grande qualité de ses vins, se laisse découvrir sans complexe. Un rouge de caractère au prix léger qui saura faire plaisir à table en toutes occasions.', '', 1, 1, 1),
(20, 'LA BETE 2014 - DOMAINE DE GIVAUDAN', 'Rhône / Côtes du Rhône AOC', '', 'La Bête va faire frissonner vos papilles  : vous allez rugir de plaisir !!!\n\nDes fruits mûrs et acidulés, une matière soyeuse et généreuse, avec des tanins savoureux... C''est du plaisir à chaque gorgée, la sensation de croquer directement les fruits, comme la framboise, la baie sauvage ou encore la groseille. Un vin facile à accorder, qui peut même être apprécier dès l''apéritif.  Tout comme pour les 2 précédents millésimes, ce 2014 a reçu tous les suffrages de nos sommeliers  : domptez et adoptez la Bête...', '', 1, 1, 1),
(21, 'GUILHEM 2014 - MOULIN DE GASSAC', 'Languedoc / Pays d''Hérault IGP', '', 'Un vin de pays réalisé par le rebelle du Languedoc. Un rouge pur plaisir signé Daumas Gassac, réference incontournable dans sa catégorie.\n\nL''esprit innovateur et pourtant si fidèle au terroir se retrouve dans ce "simple vin de pays". Rond et fruité, le soyeux et le charnu de sa bouche le rendent terriblement gourmand. Un vin que les bons vivants qualifieraient de vin "glouglou" tellement le plaisir est au rendez-vous de chaque gorgée...', '', 1, 1, 1),
(22, 'CANTICUM ROSSO 2013 – TEANUM', ' Pouilles / Puglia IGP', 'ITALIE', 'Une des meilleures ventes de vins Italiens ! Des clients VINATIS enchantés... Vous vous laissez tenter ? \n\nC’est sous le soleil et face à la mer adriatique que naît cette cuvée gourmande aux parfums de garrigues et de petits fruits rouges. Fier de son cépage, le Montepulciano (apparenté au Pinot Noir), ce vin aux parfums de cèdre, d''épices et de caramel déroule en bouche avec puissance. Fougueux, boisé mais sans excès, il se veut sur le fruit  !', '', 1, 1, 1),
(23, 'HECULA 2013 - BODEGAS CASTANO', 'Murcie / Yecla D.O.', 'ESPAGNE', '"Un produit étonnant et remarquable à ce prix" - Robert Parker\n\nHecula, LA référence espagnole qui ne déçoit jamais, prouve à nouveau son statut d’incontournable avec ce nouveau millésime 2013 ! Il faut dire qu’on ne peut résister longtemps à l’appeler de ce verre chaleureux, d’un beau rouge cerise ! Au nez, les fruits et les épices se bousculent avec une harmonie et une gourmandise irrésistible. Un régal pour les papilles et un modèle d’équilibre : encore une belle performance !', '', 1, 1, 1),
(24, 'COTEAUX BOURGUIGNONS GRANDE QV 2014 - VIGNERONS DE BEL AIR', ' Bourgogne / Coteaux Bourguignons AOC', '', 'Le Coteaux Bourguignons triplement médaillé d’OR !\n\nLa grande QV offre un accès immédiat à l’univers des vins de Bourgogne à un prix tout mini. Elégant et innovant par son étiquette originale, ce vin riche et gourmand possède un profil aromatique si séducteur et un fruit tellement pur qu’il se déguste aussi bien en accompagnement d’une viande rouge grillée que d’un dessert fruité. La Bourgogne à petit prix, du plaisir sans limite !', '', 1, 1, 1),
(25, ' L’ANCÊTRE 2014 - DOMAINE DU SACRE CŒUR', 'Languedoc / Saint-Chinian AOC ', '', 'Un vin velouté, charnu et très expressif : un coup de cœur unanime !\n\nL’Ancêtre est la cuvée idéale pour se faire plaisir sans se ruiner. Conçue à partir de Syrah, de Grenache et de vieux Carignan âgé entre 80 et 120 ans, ce vin fruité et légèrement torréfié n’en reste pas moins une bouteille qui supportera volontiers quelques années de cave. Un régal à prix imbattable !', '', 1, 1, 1),
(26, 'LES DARONS 2014 - BY JEFF CARREL', 'Languedoc / Languedoc AOC', '', '"Un vin qui m’a coupé le souffle" - Robert Parker\n\nComposé en majorité de raisins issus de vignes de plus de quarante ans, Les Darons (les Pères en argot) porte bien son nom ! Charmeur avec son nez fruité et épicé, équilibré et puissant, il possède des nuances légèrement toastées (bien qu’élevé en fût) qui apportent un relief et une générosité des plus appréciables. Un vin solide et sûr de lui qui s’adresse à ceux qui ont suffisamment de bouteille pour apprécier les bonnes choses de la vie !', '', 1, 1, 1),
(27, ' GRANDE RESERVE CRU CLASSE 2014 - CHATEAU SAINTE MARGUERITE', 'Provence / Côtes de Provence Cru Classé AOC ', '', 'Une référence en Cru Classé de Provence !\n\nLa cuvée Grande Réserve 2014 du Château Sainte Marguerite, un rosé tout en délicatesse, précis et à ouvrir en toute occasion  ! 100 % Valeur sûre !', '', 3, 11, 1),
(28, ' ELOGE CRU CLASSE 2014 - DOMAINE DE LA CROIX', 'Provence / Côtes de Provence Cru Classé AOC /', '', 'L''un des plus grands vignobles de Provence Cru Classé !\n\nLe Domaine de la Croix s''étend sur 100 ha de vignes, face à la mer à Ramatuelle. Ce terroir unique de la presqu''île de Saint-Tropez produit des vins aromatiques, élégants, bien équilibrés et d''une fraîcheur en bouche remarquable. Cette cuvée phare du domaine est pleine de vitalité, de senteurs de fruits et de finesse.', '', 3, 11, 1),
(29, 'PATRIMONIO ROSE 2014 - DOMAINE D''E CROCE', 'Corse / Patrimonio AOC ', 'CORSE', 'Le complice idéal de votre été !\n\nComposé à 100% de Nielluciu, l’un des cépages traditionnels corse, ce rosé floral et frais semble être conçu pour les repas en extérieur. Un régal avec une cuisine méditerranéenne ou un buffet froid et, bien sûr, un incontournable pour vos barbecues. Il ne manque plus que le chant des cigales pour se croire sur l’Ile de Beauté !', '', 3, 11, 1),
(30, ' MIRAVAL ROSE 2015', 'Provence / Côtes de Provence AOP ', '', 'Mis en bouteille par Jolie-Pitt & Perrin, ce rosé de star est avant tout une magnifique réussite !\n\nLa cuvée phare du couple-star Angelina Jolie-Brad Pitt, vinifiée par la famille Perrin, autre star du Rhône, a été l’un des grands succès des millésimes 2012 et 2013 (élu meilleur rosé du monde par Wine Spectator). Et le 2015 n''est pas en reste, on vous le promet ! Encore plus aboutit que son prédécesseur, ce rosé vraiment réussi se déploie sur des notes de fleurs blanches, de fruits rouges et une trame acide extrêmement rafraîchissante. Déroulez le tapis rouge, le rosé le plus people de la terre s’invite chez vous !\n\n15,50 €\n\nEn stock\n24H', '', 3, 11, 1),
(31, ' IKON 2014 - CHÂTEAU HERMITAGE SAINT MARTIN', 'Provence / Côtes de Provence AOC /', '', ' Un style rare pour vos moments d’exception !\nUn rosé complet, frais et léger d''une grande classe. Des notes de fruits frais comme la pêche, et de légères touches d''agrumes pour donner un côté acidulé. Ce rosé Suave, minéral et élégant vous accompagnera dans vos plus grands moments cet été. D''une grande justesse c''est la perfection assurée.\n', '', 3, 11, 1),
(32, ' TARIQUET ROSE DE PRESSEE 2015 - DOMAINE DU TARIQUET', 'Sud-Ouest / Côtes de Gascogne IGP /', '', 'Compagnon de soif et de plaisir, le vin rosé de Tariquet est à boire avec la plus grande simplicité pour la saveur et la fraîcheur de son fruit !\n\nDe sa robe grenadine s’échappe un nez intense et subtil aux nuances d’épices douces, de framboises sauvages et de pétales de fleurs. Opulent, frais et gourmand, le fruit de ce rosé charnu et aérien est magnifiquement préservé par une capsule à vis, comme une incitation à boire ce rosé dans l’immédiateté de sa prime jeunesse. Idéal à consommer à l’apéritif ou au cours d’un repas, il accompagne à merveille les tapas, la cuisine d’été, italienne, épicée et exotique. Le rosé "passe-partout" qui ne vous décevra jamais !', '', 3, 11, 1),
(33, ' MISS - CLOS DU CENTENAIRE', '', '', 'M.I.S.S, Made In South & Sea, le rosé bercé par les brises de la Méditerranée !\n\nAvec un tirage unique de 6000 bouteilles, cette cuvée MISS est issue des cépages nobles du Sud de la France (grenache, cinsault). Au nez, des nuances d’agrumes se mêlent aux fleurs blanches pour créer un bouquet gourmand et raffiné. En bouche, l’entrée en matière est veloutée, la finale fraîche, longue et tonique procure un agréable sentiment de gourmandise. A apprécier sous une tonnelle mais toujours dans de jolis verres qui exalteront les arômes délicats et complexes de ce rosé qui sait se faire espiègle et enchanteur !', '', 3, 11, 1),
(34, 'LES JOLIES FILLES 2014', 'Provence / Côtes de Provence AOC ', '', 'Le rosé qui va vous faire de l’œil pendant tout l’été !!!\n\nLes Jolies Filles c’est l’histoire d’un rosé moderne et sûr de lui qui, sans détour, assume ce qu’il est : un rosé tendance ! Frais et élégant avec ses parfums enivrants d’agrumes et de fruits rouges, ce vin de soif offre une robe douce "en mode" pétales de rose. Une bouteille séduisante pour les hommes, un must-have pour les femmes, ce rosé réunira tout le monde sur un point essentiel : le plaisir de le boire !', '', 3, 11, 1),
(35, ' TERRE D''AIXPRESSION - ROSE 2014', 'Provence / Coteaux d''Aix en Provence AOC ', '', 'Issu de l''Agriculture Biologique, ce vin vif, rond et fruité fera le bonheur de tous !\n\nBIO & BON, une cuvée ronde et fruitée, à goûter les yeux fermés. Un vin rosé de copain par excellence : votre allié de choc pour cet été !  ', '', 3, 11, 1),
(36, ' DAME JEANNE ROSE 2014 - BERGERIE DU CAPUCIN', 'Pic-Saint-Loup Coteaux du Languedoc AOC ', '', 'Le rosé qui se déguste comme on goûte un moment de partage\n\nTypique de sa région, cette cuvée fait cohabiter avec subtilité des arômes de fruits rouges frais à des notes plus suaves et poivrées de garrigues peuplées de chênes verts. Comment résister alors à l’appel des copains, du barbecue et des soirées estivales. C’est bien simple on en entendrait presque les cigales chanter ! Avec la Dame Jeanne rosé, l’été est vraiment arrivé !', '', 3, 11, 1),
(37, ' LE PETIT DIABLE 2015 - DOMAINE DES DIABLES', 'Provence / Côtes de Provence AOC /', '', 'Un véritable petit péché mignon...!!!\n\nDe la finesse, de la fraîcheur, un fruité tout en douceur... Nous avons été séduit par son incroyable subtilité, qui laisse s''exprimer toute une palette aromatique des plus inattendues. Contrairement à son grand frère, Rose Bonbon, est beaucoup plus sur le côté fin des arômes frais de fruits à chair blanche comme la pêche, ou sur certains petits fruits rouges comme la fraise. Une fraîcheur constante qui rend ce vin très convivial et qui saura mettre d''accord tous vos convives. Une fois de plus une vraie réussite pour un vrai moment de bonheur ! Vos papilles en redemanderont !', '', 3, 11, 1),
(38, ' CORAIL 2014 - CHATEAU DE ROQUEFORT', 'Provence / Côtes de Provence AOC ', '', 'Un des meilleurs rosés de Provence ! TOP Meilleurs Rosés dans la RVF 2015 !!!\n\nCe rosé nous laisse sous le charme par sa composition à base de raisins typiquement aptes à faire du vin rouge ! Et pourtant... les yeux fermés, la cuvée s’apparente à un vin blanc très vif ! Tentez l''expérience avec ce rosé au bel équilibre, à la finesse pour un moment de pur plaisir ! Une valeur sûre qu''il faut absolument goûter cet été !', '', 3, 11, 1),
(39, 'CHATEAU TROTANOY 2011', ' Bordeaux / Pomerol AOC ', '', 'Un vin de grande classe!\n\nCe Château Trotanoy 2011 est un monstre qui fait preuve d''autorité tout en douceur et élégance. Il présente un belle couleur sombre et intense et s''ouvre lentement à l''aération pour dévoiler toute son intensité avec un nez riche aux notes fruitées, de violette, d''épices douces.. En bouche, le vin est magnifique avec une attaque soyeuse et des tanins fins. C''est une vraie délicatesse, un grand vin de garde! ', '', 1, 2, 1),
(40, ' CHATEAU TERTRE ROTEBOEUF 2012', 'Bordeaux / Saint-Emilion Grand Cru AOC ', '', 'L’un des plus beaux joyaux de Saint-Emilion : à l’aveugle, ce vin pourrait égaler bien des grands, si ce n’est les surpasser !\n\nAvec un vigneron érudit comme François Mitjaville, tout est fait pour éviter la production de "grands vin "boîtes de conserves"" comme il les appelle, et le résultat est au rendez-vous ! On retrouve un bouquet riche et intense, composé d’herbes fumées, de cerise noire, de chocolat et de café. Sa concentration exceptionnelle ainsi que ses tanins incroyablement doux sont le résultat d’un Merlot sain et parfaitement mur, qui s’exprime ici avec opulence. L’un des bordeaux les plus luxuriants et les plus sensuels !', '', 1, 2, 1),
(41, ' MALBEC - ARGENTINO 2010 - CATENA ZAPATA', 'Mendoza / Vin Rouge ', 'ARGENTINE', 'Avec l’Argentino, Catena Zapata réalise l’un des plus beaux vins d’Amérique latine. Un coup de maître !\n\nMillésime après millésime, ce Malbec d’exception maintien avec une régularité folle un niveau de concentration et de complexité qui le place toujours au rang des bouteilles les plus prometteuses d’Amérique du Sud. Une véritable prouesse et une superbe promesse d’avenir pour ce vin au très beau potentiel de garde.', '', 1, 2, 1),
(42, 'CLOS DES GRIVES - 2013 - DOMAINE LAURENT COMBIER', 'Rhône / Crozes-Hermitage AOC ', '', 'Le Clos des Grives, La référence en Crozes-Hermitage.\nLe "Clos des Grives" est la cuvée prestige du domaine Laurent Combier, née au sud de l''AOC elle offre un vin net et généreux, porté sur le fruit confituré. Son nez envoutant exhale des arômes de pivoine, le boisé est marqué mais parfaitement intégré grâce à un élevage maîtrisé. Charmeur et complexe, il affiche aujourd''hui un plaisir certain que le temps rendra encore meilleur ! Repéré par les plus fins dégustateurs, son nom fait aujourd''hui couler beaucoup d''encre, et ses cuvées s''arrachent comme des petits pains... "Le Crozes quasi-parfait" - Bettane et Desseauve 2015', '', 1, 2, 1),
(43, ' ROC DE CAMBES 2011', 'Bordeaux / Côtes de Bourg AOC', '', '"Grand style, volume spectaculaire, charnu et intense, allonge brillante, très profond, racé, un très grand Roc de Cambes." – Guide Bettane et Desseauve\n\nLa clémence des conditions climatiques de l’année 2010 a renforcé le caractère de Roc de Cambes. Modèle d’élégance s’il en est, ce millésime à la finesse exquise oscille entre une grande complexité aromatique (épices, cuir, chocolat et cerise noire) et une puissance remarquable. Le fruit, magnifié, est ici porté à son plus haut niveau de concentration. Rares sont les Côtes de Bourg capables d’atteindre un tel niveau.', '', 1, 2, 1),
(44, ' NAPANOOK 2009 - DOMINUS ESTATE', 'Californie / Napa Valley ', 'CALIFORNIE', '"Considéré par Moueix comme l''un de ses vins préférés de la dernière décennie, il fait effectivement partie de l''une de ses plus belles réalisation." - Robert Parker\n\nPropriété de Christian Moueix, lui-même propriétaire de Petrus, Napanook est le "second vin" du domaine Dominus. Dominus Estate, l''exemple de la réussite de l''exportation du savoir-faire français... Une cuvée riche en bouche, avec des arômes de bonbon à la menthe, gousse de vanille. On retrouve le même équilibre et longueur que son grand frère.', '', 1, 2, 1),
(45, ' DON MELCHOR 2009 - CONCHA Y TORO', 'CHILI / Central Valley ', 'CHILI', 'LA référence chilienne :  La crème des crèmes !!!\n\nS’il est un domaine incontournable au Chili, c’est certainement Concha y Toro ! Et s’il est une cuvée à connaître absolument de la maison Concha y Toro, c’est bien le Don Melchor ! Nous ne serions en dire plus sur ce vin emblématique qui incarne à lui seul ce qu’il se fait de mieux au Chili !', '', 1, 2, 1),
(46, 'DOMAINE LA CROIX DES VIGNES 2011', 'Rhône / Saint-Joseph AOC', '', 'La quintessence du Saint-Joseph !\n\nExtrêmement séduisant avec ses notes de fruit mûrs, d’épices douces et de réglisse, ce Saint-Joseph harmonieux et satiné est une pure merveille capable de sublimer vos plus beaux plats de viande rouge et de ravir vos amis amateurs de bonne chère. Grâce à sa fraîcheur et à sa complexité aromatique, vos repas entre gourmets-épicuriens vont prendre une saveur magnifique.', '', 1, 2, 1),
(47, ' CHATEAU LA CREATION 2012', 'Bordeaux / Pomerol AOC ', '', 'Nos sommeliers ont craqué pour ce délicieux Pomerol!\n\nSitué près du Château de Sales et du Clos René, ce cru de 4,6 hectares (Ex Tour Robert), racheté par la famille de Gay a été rebaptisé La Création. Pour ce premier millésime 2012, ce Pomerol plein de charme et de promesse est une réussite majeure! Le nez dévoile un vin très fruité, moderne, avec un léger boisé. En bouche, le vin a une bonne stucture, un fruit rouge craquant avec une texture soyeuse qui s''étire avec sensualité. Un vin de longue garde..', '', 1, 2, 1),
(48, 'COTE ROTIE - EMINENCE 2014 - REMI NIERO', 'Rhône / Côte-Rôtie AOP ', '', 'Les plus grands noms n''ont qu''à bien se tenir !\n\nNotre coup de Coeur Sommelier lors du dernier salon d''Ampuis 2016 !!!\n\nCette cuvée est un concentré de plaisir ! Harmonie, charme, et explosion d''arômes de petits fruits rouges et noirs, sont au rendez-vous. Sa texture déjà soyeuse, sa droiture et sa fraicheur, aux tanins racés et à la longue finale gourmande, font de ce vin notre coup de coeur à un prix vraiment raisonnable. Et pour les plus impatients : c''est déjà un vrai délice ! En un mot: Superbe !', '', 1, 2, 1),
(49, ' VIEILLES VIGNES 2007 - CHATEAU BOUSCASSE', 'Sud-Ouest / Madiran AOC ', '', 'Le top du top en Madiran !\n\nProduite à partir des vignes âgées de plus de 50 ans et issue des meilleurs terroirs de Bouscassé, la cuvée Vieilles Vignes s’impose comme la plus prestigieuse de la gamme du château. En résulte un vin en 100% tannat, à la trame fine, droite et intelligemment conçue. Ses arômes délicats de fruits rouges bien mûrs et son boisé discret relayé par des notes de cigare et de moka en font un Madiran d’exception au superbe potentiel de garde !', '', 1, 2, 1),
(50, ' CHATEAU LA CROIX DU CASSE 2012', 'Bordeaux / Pomerol AOC /', '', 'Un Pomerol très représentatif de son terroir\n\nD’une belle robe couleur rubis, ce millésime 2012 de La Croix du Casse offre des arômes expressifs de fruits rouges et noirs, d’épices, avec une légère touche vanillée. L’attaque en bouche est ronde et évolue sur de la chair. Onctueuse, avec du volume, on retrouve aussi en bouche les arômes du nez. Un vin rond, gourmand dans un style très Pomerol !', '', 1, 2, 1),
(51, 'CHATEAU LE PETIT CLOCHER D''ARGENT 2013', ' Bordeaux / Pomerol AOC ', '', 'Découvrez un Pomerol d''une typicité unique, dégusté et sélectionné par nos sommeliers !\n\nLe Petit Clocher d''Argent, c''est avant tout une production confidentielle pour ce cru, vinifié à la fois sur des techniques traditionnelles avec une touche de fraicheur. Ce millésime 2013 se caractérise par sa grande finesse, sa robe vive et attrayante. Le bouquet expressif mêle les fruits frais et le boisé torréfié. Une véritable réussite ! Le Petit Clocher d''Argent 2013 est une petite bombe de simplicité, pour un Pomerol de caractère et de terroir, juste parfait pour les amateurs !', '', 1, 2, 1),
(52, ' CHATEAU HAUT-MAZERIS 2010', ' Bordeaux / Canon Fronsac AOC', '', '"Sur le 2010, ce domaine exceptionnel a de nouveau réalisé un vin formidable" – Robert Parker\n\nParmi les coteaux les plus élevés des vins de Bordeaux, le Château Haut-Mazeris offre sa richesse, son équilibre et ses tanins soyeux. Un rapport qualité-prix saisissant pour un Canon-Fronsac noté 91/100 par Robert Parker. Plus la peine de patienter, le millésime 2010 est enfin prêt pour la dégustation.\n', '', 1, 2, 1),
(53, 'FIEFS DE LAGRANGE 2011', ' Bordeaux / Saint-Julien AOC ', '', ' Le 2nd vin d’une des figures incontournables en Saint-Julien.      \n\n Les Fiefs de Lagrange est le second vin de la propriété Lagrange et fait l’objet du même soin. Fin et élégant, il offre une belle typicité, un fruité présent ainsi qu’une structure bien équilibrée ou matière et souplesse des tanins bénéficient d’une belle dose de fraîcheur. Extrêmement fidèle à son aîné, il se veut plus accessible, tant à la dégustation qu’à l’achat…Un second vin de Château Lagrange, une valeur sûre !\n', '', 1, 2, 1),
(54, 'MADIRAN ODE D''AYDIE 2012 - CHATEAU D''AYDIE', 'Sud-Ouest / Madiran AOC ', '', 'Un grand classique de l’appellation Madiran\n\nLaissez-vous charmer par ce vin rouge séduisant, où élégance et puissance s’entendent dans une plénitude qui marque le palais de son empreinte. Un classique des vins du Sud-Ouest et un fleuron du Château, impossible de se tromper.', '', 1, 2, 1),
(55, 'L''ARBOUSE 2013 - MAS BRUGUIERE', 'Languedoc / Pic-Saint-Loup Coteaux du Languedoc AOC /', '', 'Mas Bruguière et la passion du vin: une véritable histoire de famille !\n\nLe domaine a complètement été convertie en bio pour produire des vins au plaisir immédiat tout en respectant au mieux le caractère du terroir Pic St Loup. L''Arbouse en est le plus beau reflet : gorgé de fruits frais et bien mûrs comme le cassis et la myrtille, avec quelques notes fumées, il nous surprend agréablement par son équilibre soyeux et déjà à maturité. Un grand Pic St Loup à un prix très abordable !\n', '', 1, 2, 1),
(56, ' CHATEAU HAUT-MAZERIS 2010', 'Bordeaux / Canon Fronsac AOC', '', '"Sur le 2010, ce domaine exceptionnel a de nouveau réalisé un vin formidable" – Robert Parker\n\nParmi les coteaux les plus élevés des vins de Bordeaux, le Château Haut-Mazeris offre sa richesse, son équilibre et ses tanins soyeux. Un rapport qualité-prix saisissant pour un Canon-Fronsac noté 91/100 par Robert Parker. Plus la peine de patienter, le millésime 2010 est enfin prêt pour la dégustation.\n', '', 1, 2, 1),
(57, 'CLOS TRIGUEDINA 2011 - DOMAINE TRIGUEDINA', 'Sud-Ouest / Cahors AOP ', '', 'Un "Cahors au sommet son appellation" - Guide de la Revue des Vins de France 2015\n\nC''est un vin de repas qui accompagnera à merveille vos viandes rouges. Promis à la garde, cette cuvée  pourra être dégustée dès maintenant, mais après un carafage indispensable de quelques heures ! Un vin de plaisir à partager autour d''une table de gastronome !!!', '', 1, 2, 1),
(58, 'DE BATTRE MON COEUR S''EST ARRETE 2014 - DOMAINE DU CLOS DES FEES', 'Languedoc / Côtes du Roussillon Villages AOC ', '', 'Le nouveau millésime de De Battre mon Coeur s''est arrêté est enfin sorti !\nTout en sincérité, ce vin d’épicurien vous envoûtera de sa douceur.\n\nHervé Bizeul nous offre ici un vin du Languedoc complexe, doté d’une gamme aromatique impressionnante. Tout en sincérité, ce vin d’épicurien vous envoûtera de sa douceur. Encore une fois, ce vin rouge du Clos des Fées déclare son amour profond pour son terroir. Un véritable délice.\n', '', 1, 2, 1),
(59, ' CHATEAU PEYRABON 2012 - CRU BOURGEOIS', 'Bordeaux / Haut-Médoc AOC', '', 'Une belle réussite en Haut-Médoc... à prix doux !!\n\nLe Château Peyrabon 2012 présente une belle robe d''un rouge profond. Il dégage un bouquet d''arômes délicat porté sur des notes de fruits rouges et noirs, de cacao, d''épices. En bouche, le vin est très agréable, on retrouve principalement les fruits frais (prune, cerise) avec un très léger boisé. Valeur sûre en Haut-Médoc, ce millésime 2012 est très réussi!', '', 1, 3, 1),
(60, ' CLOS DE SIXTE 2013 - DOMAINE GRAND VENEUR', 'Rhône / Lirac AOC /', '', 'Une superbe combinaison de fruits, de tanins et de suavité. Une référence du Lirac, en haut de tableau incontestablement...\n\nDélicat et viril à la fois, ce Lirac, c''est une main de fer dans un gant de velours !  Le Domaine du Grand Veneur est devenu une référence : le plaisir est là et la promesse d''une jolie garde est assurée ! N''hésitez pas, le rapport qualité-prix est épatant !', '', 1, 3, 1),
(61, ' DOMAINE LA ROCHE 2013', 'Bordeaux / Pessac-Léognan AOC ', '', 'Top rapport qualité prix pour ce Pessac-Léognan très réussi! \n\nCe Domaine La Roche 2013 s''habille d''une très belle robe pourpre. Il développe un nez riche aux parfums complexes de fruits rouges et noirs, réhaussés d''épices, de vanille et de réglisse. La bouche offre une belle structure avec un palais ample, étoffé sans astringence ni amertume, et avec une belle finale fruitée. Prêt à boire et sur le fruit, il sera le compagnon idéal sur les viandes!', '', 1, 3, 1),
(62, ' LA CROIX DE CARBONNIEUX 2012 - SECOND VIN CHATEAU CARBONNIEUX', 'Bordeaux / Pessac-Léognan AOC /', '', 'Le second vin du Château Carbonnieux ne déroge pas à la constante qualité du domaine.\n\nLes vins du Château Carbonnieux, aux caractères fruités, souples et élégants comptent parmi eux cet excellent second vin fourni en notes végétales de poivrons doux et de prunes. Sa matière maîtrisée sur les épices offre un volume très intéressant qui se mariera à merveille avec une belle viande rouge ou un canard.', '', 1, 3, 1),
(63, ' CROZES HERMITAGE 2014 - ALAIN GRAILLOT', 'Rhône / Crozes-Hermitage AOC ', '', 'Le Crozes-Hermitage d’Alain Graillot, un des meilleurs vignerons de l’appellation\n\nUn Crozes-Hermitage superbement typé, exprimant des arômes de fruits rouges et de violette, doublés d’une intensité colorante et de tanins bien présents. Fin, puissant et structuré, le plaisir est présent dès sa jeunesse et assure pleinement une heureuse évolution. Interdiction d’hésiter.', '', 1, 3, 1),
(64, ' MOULIN A VENT CLOS DES THORINS 2010 - CHATEAU DES JACQUES', 'Beaujolais / Moulin à Vent AOC ', '', '"La plus accessible des grandes cuvées de la maison", Guide Bettane et Desseauve 2012\n\nCaractérisé par une texture de fruit charnue, ce vin ample et suave aux doux arômes de mûres, de compote de figues, de réglisse et de poudre de cacao s’inscrit comme "la plus accessible des grandes cuvées de la maison" par son côté foncièrement chaleureux, gourmand et d’une belle finesse. A déguster autour d’une cuisine de caractère pour en apprécier l’immense potentiel !', '', 1, 3, 1),
(65, ' NEBBIOLO 2013 - LANGHE DOC – PELISSERO', ' Piémont / Langhe DOC ', 'ITALIE', 'Invitez à votre table ce Nebbiolo racé et découvrez une harmonie gustative incomparable...\n\nVous ne pourrez pas rester indifférent à la typicité de ce cépage : Arômes profonds de fraises et de framboises... Une cuvée fraîche et moelleuse aux arômes délicieusement boisés. Un véritable hommage au Nebbiolo !', '', 1, 3, 1),
(66, 'LES HAUTS DE SMITH 2012', 'Bordeaux / Pessac-Léognan AOC ', '', 'Il fait toujours parti des meilleurs seconds vins sur le marché et son rapport qualité prix plaisir est toujours excellent !! \n\nSecond vin du Château Smith Haut Lafitte, Grand Cru Classé de Graves, les Hauts de Smith sont vinifiés dans le même superbe chai souterrain que le grand vin (lui-même noté 95 par Robert Parker). Ce millésime 2012 présente une belle robe rouge sombre, brilante. Le nez est expressif et élégant sur des notes de fruits rouges, d''épices, de vanille, de fleurs. En bouche, l''attaque est fine et onctueuse avec une belle texture de tanin. La bouche est déjà très plaisante (ronde, harmonieuse, bien équilibrée) et se poursuit sur une finale d''une belle longueur très fraîche et aromatique. Ce second vin saura vous faire approcher au plus de ce pur-sang tout en vous éloignant au plus loin de son prix !', '', 1, 3, 1),
(67, ' LE SAINT-ESTEPHE DE MONTROSE', 'Bordeaux / Saint-Estèphe AOC', '', 'Le reflet du grand terroir de Montrose\n\nMis en bouteille en 2011, Le Saint-Estèphe de Montrose est un vin atypique de Bordeaux. Créé par M.Delmas, il s''agit d''un vin non millésimé issu de l''assemblage des millésimes 2007 (27%), 2008 (30%), 2009 (37%) et 2010 (6%). Ce vin est le reflet de son appelation et du grand terroir de Montrose: riche, complexe avec une belle fraicheur. Une belle découverte et un vrai coup de coeur pour ce vin original, faites vos stocks!', '', 1, 3, 1),
(68, 'BARON DE BRANE 2009', ' Bordeaux / Margaux AOC', '', 'Un assemblage de cuves sélectionnées pour leur souplesse sur un millésime de rêve...\n\nAu coeur du somptueux terroir de Margaux, le second vin de Brane-Cantenac bénéficie des mêmes graves exceptionnelles que le grand frère : il décline cabernets et merlot dans le même style racé, fin et harmonieux, mais dans une approche plus souple. ', '', 1, 3, 1),
(69, ' MAGNUM MADEMOISELLE L 2012', 'Bordeaux / Haut-Médoc AOC', '', 'Une cuvée élaborée par l''équipe du Château La Lagune !!\n\nCe millésime 2012 présente une belle robe intense. Son nez dégage des notes de cassis, d''épices. On retrouve en bouche tous les arômes du nez sur des tanins souples et veloutés. Sexy et charmeur, c''est une vraie réussite à déguster dans sa jeunesse.', '', 1, 3, 1),
(70, ' COTE ROTIE - LES MÉANDRES 2012 - DOMAINE GUY BERNARD', ' Rhône / Côte-Rôtie AOC ', '', 'Une Côte-Rôtie à moins de 30 € ! Une réussite à tous points de vues !\n\nLes Méandres est un mariage subtil entre souplesse et équilibre. Un vin complet sur ce millésime 2012, déjà très élégant à la dégustation. Un véritable coup de coeur qualité-prix qu''ont eu nos sommeliers avec cette cuvée dégustée au Salon des Vins d''Ampuis. Un concentré de plaisir, sans se ruiner, à savourer de suite pour les plus impatients (après un passage en carafe) !', '', 1, 3, 1),
(71, 'CHAMPELROSE 2013 - DOMAINE COURBIS', 'Rhône / Cornas AOC', '', 'Un Cornas signé par les frères Courbis, valeur sûre et montante de l''appellation ! \n\nSur un terroir façonné par leurs mains, cette pure syrah séduira par son ampleur, sa richesse aromatique et sa texture soyeuse. Carafage indispensable pour une dégustation rapide. Ce Cornas taillé pour la garde pourra être conservé jusqu''en 2025.', '', 1, 3, 1),
(72, ' ROSSO DI MONTALCINO 2013 - CONTI COSTANTI', 'Toscane / Rosso Di Montalcino ', 'ITALIE', 'Toute la chaleur de la Toscane...Des cépages uniques pour des sensations gustatives incroyables !!! \n\nUne cuvée d''une grande classe : Ses arômes fruités vous envoutent délicatement (cerise noire et prune). Une fois en bouche, des saveurs légèrement mentholées et de violette se développent avec une fraîcheur incroyable. Il s''accommodera au mieux en accompagnement de lasagnes, ou de viandes (rouges ou blanches) en sauces.', '', 1, 3, 1),
(73, ' CHATEAU SOCIANDO-MALLET 2011', 'Bordeaux / Haut-Médoc AOC', '', 'Une révélation du millésime !\n\nChâteau Sociando-Mallet produit des vins d''une belle régularité. Ce millésime 2011 ne déroge pas à la règle. D''une couleur sombre et profonde, il dégage un nez aux arômes complexes de pettis fruits mûrs avec un boisé très élégant. Après une attaque chaleureuse, on retrouve beaucoup de finesse et d''élégance dans ce millésime. Dense, épicé, d''une belle matière avec une longue finale, ce vin est d''une élégance extrême.', '', 1, 3, 1),
(74, 'CHATEAU LANESSAN 2005', 'Bordeaux / Haut-Médoc AOC ', '', 'De loin la meilleure performance de la propriété sur cet exceptionnel millésime 2005. \n\nAlliant la maturité du fruit, la fraîcheur des épices ainsi qu''une bonne constitution de tanins, le résultat est à la hauteur du plaisir. Représentatif de son appellation, il possède en lui les 4 cépages de la région Bordelaise. Elégant et délicat au nez, plus dense et charnu en bouche, c''est un des plus beaux cru bourgeois de ce millésime 2005!', '', 1, 3, 1),
(75, ' CROZES-HERMITAGE - ROCHE PIERRE 2012 - DOMAINE BELLE', 'Rhône / Crozes-Hermitage AOC', '', ' " Je suis époustouflé, (...) l''un des meilleurs vins de cette appellation."  R. Parker\n\nDès l’ouverture le nez explose de fruits noirs, d’épices douces, de muscade, de mûre sauvage, de cerise noire. La bouche encore jeune, fougueuse part sur une attaque est franche et virile. Ses tanins puissants et démonstratifs donnent tout son caractère au vin. Son élevage en fûts de chêne français ont canalisé sa force et assagir son tempérament ; mais il faudra être encore un peu patients pour profiter pleinement de ses qualités ! Une Belle Réussite ! Ce 2012 est à nos yeux un des plus beaux millésimes de ces dix dernières années.\n', '', 1, 3, 1),
(76, ' PROBUS 2005 - CLOS TRIGUEDINA', ' Sud-Ouest / Cahors AOC /', '', 'Un des fleuron de l’appellation Cahors !\n\nHommage à l’Empereur Probus, cette cuvée vêtue d’une robe sombre, incarne au mieux la réputation de "maître du Malbec" de Jean-Luc Baldès. Son nez exubérant mais élégant, dense et crémeux,  laisse échapper des notes de fruits noirs compotés sur un boisé subtil, mis en exergue par des effluves de réglisse, de terre humide, d’olives noires, de truffe et de cuir. Bref, le Malbec dans sa plus belle expression !', '', 1, 3, 1),
(77, 'AMIRAL DE BEYCHEVELLE 2011', 'Bordeaux / Saint-Julien AOC ', '', '" Considéré comme l''un des meilleurs seconds vins des Crus Classés Bordelais "\n\nL''Amiral de Beychevelle est l''ambassadeur du Château Beychevelle. Ce second vin bénéficie des mêmes soins que son glorieux ainé. Ce millésime 2011 présente une belle robe sombre laissant place à un nez riche et complexe. La bouche est expressive avec un vin équilibré, rond et gourmand sur des tanins mûrs et veloutés. Un second vin très séducteur plein d''élégance !', '', 1, 3, 1),
(78, ' CHATEAU PONTET CANET 2000 - 5EME CRU CLASSE', 'Bordeaux / Pauillac AOC ', '', '"De loin le meilleur Pontet-Canet" - Wine Spectator -\n\nCe Château Pontet-Canet 2000 présente une belle robe rouge sombre qui séduit par sa profondeur. Le nez est précis et dévoile des arômes de fruits noirs (cassis, mûre), avec des notes grillées et vanillées. L''attaque en bouche est pulpeuse, les tanins sont racés avec une matière qui mélange charme et velouté. La finale est persistante, d''une grande longueur sur des sensations crémeuses. Un très beau vin de garde!', '', 1, 3, 1),
(79, 'CHATEAU TALBOT 2010', 'Bordeaux / Saint-Julien AOC ', '', '"L’un des meilleurs Talbot de ces dernières années et peut-être même encore au-dessus des millésimes 1986 et 1982" - Robert Parker\n\nVéritable trait d’union entre la finesse des Margaux et la puissance des Pauillac, cette propriété parmi les plus justement populaires du Médoc vient de produire une série de grands millésimes dont le 2010 en est la vedette. Champion de la longévité, son côté généreux et extraverti en fait un vin aimable et rond dès sa toute première jeunesse grâce à ses tanins soyeux et suaves. Un Saint-Julien hors-pair, aussi sexy que puissant !', '', 1, 3, 1),
(80, 'CHATEAU LAGRANGE 2010', 'Bordeaux / Saint-Julien AOC /', '', 'D''un classicisme médocain exemplaire !\n\nConsidéré comme un très grand millésime, le 2010 offre des notes d’herbes grillées, de chocolat, de cassis et de café, dans un vin structuré, racé et très équilibré. Un Saint-Julien qui allie indéniablement la puissance au raffinement et qui offre surtout un fruit plein d''éclat et réellement délicieux.', '', 1, 3, 1),
(81, ' CHATEAU MOULIN DE CLOTTE 2010', 'Bordeaux / Castillon - Côtes de Bordeaux ', '', 'Une belle réussite 100% plaisir!\n\nChâteau Moulin de Clotte 2010 annonce une belle robe rouge profonde. Il développe un bouquet riche avec des notes florales, de fruits rouges, d''épices grillées. En bouche, le vin est complet et doux sur des notes de fruits, avec des tanins mûrs et bien texturés pour finir sur une longue finale. Une belle réussite 100% plaisir à découvrir de toute urgence!', '', 1, 4, 1),
(82, ' CHATEAU PERTHUS 2011', ' Bordeaux / Côtes de Bourg AOC ', '', 'Le lauréat de notre dégustation à l''aveugle en Côtes de Bourg !\n\nLe Chateau PERTHUS bénéficie d''un élevage en fût de chêne de 12 mois. A la dégustation, l''ensemble proprosé est d''une élégance convaincante : une matière ample aux tanins polis, un ensemble fondu sur le fruit enrobé de fraicheur. Oui, ce Côtes de Bourg a tout pour plaire ! Il accompagnera à merveille des viandes rouges !  Une valeur qualité-prix-plaisir 100% gagnante !', '', 1, 4, 1),
(83, ' UNE ET MILLE NUITS 2012 - DOMAINE CANET VALETTE', 'Languedoc / Saint-Chinian AOC ', '', 'Un rouge dans la plus pure tradition du Languedoc\n\nAvec ses 5 grands cépages traditionnels du Languedoc, ce Saint-Chinian AOC est une véritable bombe aromatique. Les arômes de fruits noirs et de garrigue laissent éclater toute l’élégance et la chaleur du Une et Mille Nuits. Un vin complexe hybride, à mi-chemin entre le vin de soif et le vin de garde.', '', 1, 4, 1),
(84, 'CHATEAU GLORIT 2009', 'Bordeaux / Blaye - Côtes de bordeaux ', '', 'Une évidence dans l’appellation Blayes Côtes de Bordeaux !\n\n- FORMAT MAGNUM -\n\nUn millésime 2009 plusieurs fois médaillé aux accents charmeurs de fruits rouges mûrs et au boisé légèrement toasté. Ample, étoffé et puissant, il possède un ensemble équilibré et bien construit pour une finesse et une élégance remarquable !', '', 1, 4, 1),
(85, ' CLOS DE LA CROIX DE PIERRE 2011 - LOUIS JADOT', 'Bourgogne / Pernand-Vergelesses 1er Cru AOC', '', 'Un 1er Cru de Bourgogne qui séduit par son fruit et sa puissance\n\nLe Clos de la Croix de Pierre est situé sur le premier cru « En Caradeux » et tient son nom d''une grande croix en pierre située au bord du climat. Séduisant dès sa robe rubis profond aux reflets brillants, il tient toutes ses promesses à la dégustation grâce à ses arômes très fruités de petits fruits noirs. Puissante et parfaitement structurée, portée par des tanins souples et soyeux, la bouche se révèle d’une grande finesse et d’une belle persistance. Un premier cru gourmand à partager autour d''une belle tablée !', '', 1, 4, 1),
(86, ' CHAMBOLLE MUSIGNY 2012 - BOUCHARD PERE ET FILS', 'Bourgogne / Chambolle-Musigny AOC ', '', 'Un charme sans pareil et ravageur : impossible de résister à ce cru idéal pour les amoureux de la Bourgogne !\n\nTendre et délicat, charpenté et élégant, ce Chambolle Musigny très séduisant avec son bouquet expressif de petits fruits rouges, saura enthousiasmer tous les dégustateurs, même les plus pointus ! Un charme sans pareil et ravageur : impossible de résister à ce cru idéal pour les amoureux de la Bourgogne !', '', 1, 4, 1),
(87, ' CÔTE RÔTIE - CHAMPON''S 2013 - DOMAINE STEPHANE PICHAT', 'Rhône / Côte-Rôtie AOC /', '', '"Un concentré de minéralité à la texture exquise (...) " R. Parker\n\nProfitez-en, avant qu''il ne soit trop tard !\n\nTendre, sauvage et suave, le Champon''s de Stéphane Pichat est une jolie merveille que les amateurs connaissent bien..." Carrément sexy", selon Robert Parker, ce 2013  exprime un nez intense de prune, caressé par des arômes de café qui se confirment en bouche sur des notes poivrées. Un Côte Rôtie de caractère qui aura encore beaucoup de choses à dire d''ici 4/5 ans !\n', '', 1, 4, 1),
(88, ' CHATEAUNEUF-DU- PAPE SIGNATURE 2011 - DOMAINE LA BARROCHE', 'Rhône / Châteauneuf-du-Pape AOC ', '', '"Déjà superbe" – Robert Parker', '', 1, 4, 1),
(89, ' LARMES DES FEES 2009 - LAURENT MIQUEL', ' Languedoc / Saint-Chinian AOC ', '', 'Jeune vigneron talentueux, Julien Barrot nous offre un vin du Rhône incroyable d’élégance et de générosité. Un Châteauneuf du Pape qui transcende un millésime 2011 déjà de grande qualité. L’authenticité et l’harmonie d’un vin au service de la mythique appellation. N’attendez plus, il est déjà prêt à boire.', '', 1, 4, 1),
(90, ' SOTANUM 2013 - LES VINS DE VIENNE', 'Rhône / Vin de Pays des Collines Rhodaniennes', '', 'Un vin haut de gamme qui s’impose et en impose par sa profondeur et sa fraîcheur\n\nCe vin de pays montre une belle élégance en bouche, conjuguée à des arômes complexes d''une grande finesse. Profond et tout en souplesse, ses arômes de fruits mûrs font de lui un vin des plus gourmands. Aérez le deux heures avant la dégustation : il s''ouvrira pour un plaisir encore plus intense. Préparez-vous à ce grand vin de pays qui ne manquera pas de vous surprendre.', '', 1, 4, 1),
(91, 'VOLNAY 1ER CRU CAILLERETS 2011', 'Bourgogne / Volnay 1er Cru AOC', '', 'Suave et subtil, ce Volnay 1er Cru s’inscrit parmi les plus fins de la Côte de Beaune.\n\nD’une parfaite harmonie entre sa structure et son élégance, ce 1er cru séducteur, riche et complexe s’exprimera avec volupté autour de viande d’agneau, de canard ou de gibier léger. Avec son excellent potentiel de garde, ce vin léger et fruité mérite qu’on l’oublie quelques années en cave !', '', 1, 4, 1),
(92, 'POMMARD 1ER CRU CHAPONNIERES 2010', 'Bourgogne / Pommard 1er Cru AOC ', '', 'Une superbe entrée au cœur des Pommard 1er cru !\n\nCe Pommard d’un joli rubis cerisé dévoile un nez élégant et distingué, typique du sud de cette région. Dynamique en bouche, il libère une belle énergie marquée par une acidité en retrait qui rend les tanins ronds et accessibles. Un incontournable à accompagner des grands classiques de la gastronomie française.', '', 1, 4, 1),
(93, 'CLOS DE LA BOUSSE D''OR 2011', ' Bourgogne / Volnay 1er Cru AOC ', '', 'Un vin de grande classe, à conserver jalousement !\n\nIssu d''une parcelle d’à peine plus de 2 hectares, ce Volnay 1er Cru offre un bouquet aromatique chargé de notes de fruits noirs complétées par un boisé élégant. En bouche, on retrouve cette complexité aromatique sous une texture grasse et des tanins fermes mais dénués de dureté.Petite production, appellation prestigieuse, long potentiel de garde, dégustation mémorable : voici ce qu''on appelle un vin recherché des amateurs ! ', '', 1, 4, 1);
INSERT INTO `wines` (`id`, `name`, `appellation`, `country`, `description`, `image`, `categorie_id`, `genre_id`, `moderation`) VALUES
(94, ' CORTON LE CLOS DU ROI GRAND CRU 2013 - DOMAINE DE LA VOUGERAIE', 'Bourgogne / Corton AOC /', '', 'Un Corton qui s''impose par la magie de ses parfums\n\nD’une élégance pure, le Clos du Roi 2013 est d’une magnifique intensité de fruit évoquant les fruits rouges agrémentés d’une note de tabac. En bouche, sa souplesse et son fruité que l’on pourrait qualifier "d’aérien" repose sur des tanins d’une grande douceur. Soyeux et très raffiné, il concentre "les meilleures qualités de son millésime." Attention, tirage limité : une pièce quasi-unique !!!', '', 1, 4, 1),
(95, ' VOSNE ROMANEE 1ER CRU LES SUCHOTS 2011 - LOUIS JADOT', 'Bourgogne / Vosne Romanée 1er Cru AOC ', '', 'Un Vosne Romanée premier cru élégant et sensuel !\n\nSitué au nord de Nuits Saint George, le vignoble de Vosne Romanée s’étend sur 105 précieux hectares. Les Suchots a un nez envoutant qui exhale des arômes de cerise, fraise et de sous-bois. Concentré et moelleux, il possède une belle persistance aromatique et est soutenu par des tanins veloutés issu d’un élevage en fût de chêne de 20 mois. Découvrez sans plus tarder ce vin de plaisir, ambassadeur de son appelation', '', 1, 4, 1),
(96, 'DOMAINE DE L''AURAGE 2010', 'Bordeaux / Castillon - Côtes de Bordeaux', '', 'Découvrez un secret de sommelier avec cette étoile montante des Côtes-de-Castillon !\n\n- FORMAT MAGNUM -\n\nLe domaine de l’Aurage –ancien Château Cadet- est la propriété de Caroline et Louis Mitjavile. Il ne leur manquerait pas grand chose pour classer leur production parmi la prestigieuse appellation Saint-Emilion Grand cru. Mais ces vignerons sans concession préfèrent de loin élaborer un vin comme à leur image, sans subir la contrainte de cépages imposés. Une vin résolument moderne, à surveiller de près !', '', 1, 4, 1),
(97, ' CHATEAU LES PINS RIVESALTES PRIMAGE 2012 - VIGNOBLES DOM BRIAL', 'Languedoc / Rivesaltes AOC ', '', 'Le Rivesaltes rouge signé Dom Brial\n\nVoici un Rivesaltes intense, gorgé de soleil, aux notes prononcées de mûre sauvage. Très dense avec ses tanins présents et onctueux, Primage est un vin doux naturel de choix pour accompagner un apéritif, un foie gras poêlé ou des desserts chocolatés. Faites entrer le soleil et le fruit dans vos repas gastronomiques !', '', 1, 5, 1),
(98, ' VINTAGE 2013 - MAS AMIEL', 'Languedoc / Maury AOC ', '', 'Un savoir-faire unique, une typicité garantie, un plaisir universel.\n\nLa puissance dans un gant de velours : ce Maury est un concentré de fruits et de fraîcheur, le tout enrobé d''une finesse ciselée. A la fois charnu, frais et fruité, il s’accorde parfaitement avec les desserts aux fruits rouges ou au chocolat. LA VALEUR SURE EN VIN DOUX NATUREL !', '', 1, 5, 1),
(99, ' LBV 2009 - PORTO BURMESTER', 'Spiritueux / Porto ', '', 'Découvrez un porto d''exception avec la cuvée LBV (Late Bottled Vintage) \n\nConsidéré comme le roi des Porto, le Vintage présente des qualités organoleptiques exceptionnelles ! Produite exclusivement les meilleures années, cette cuvée LBV est issue de vendanges tardives et vieillie en fûts de chêne durant 3 années. Sa couleur foncée, ses arômes de fruits mûrs, ses tanins puissants sont autant de saveurs à découvrir au moment de votre apéritif, de vos desserts chocolatés, et même de votre digestif. Les amateurs le dégusteront bien frais, sans glaçon.', '', 1, 5, 1),
(100, ' VINTAGE CHARLES DUPUY 2009 - MAS AMIEL', ' Languedoc / Maury AOC ', '', 'Un vin qu''il faut absolument avoir goûté !!!\n\nCe magnifique Vintage Charles Dupuy est un véritable chef d''oeuvre ! L''immense savoir-faire d''Olivier Decelle nous surprendra toujours... Un nectar tout en velour, à l''équilibre subtil et magique. Une superbe expérience gustative...!', '', 1, 5, 1),
(101, ' MAURY 1974 - DOMAINE LAFAGE', 'Languedoc / Maury AOC ', '', 'Un accès privilégiés aux grands millésimes\n\nLes Vins Doux Naturels permettent un potentiel de garde particulièrement élevé, tout en conservant une fraicheur remarquable. Avec ce Maury 1974, les amateurs de vins prestigieux et confidentiels s’offriront des instants de dégustation mémorables sur des fromages et des desserts chocolatés. Une bouteille hors-norme !', '', 1, 5, 1),
(102, ' MAURY 1929 - DOMAINE LAFAGE', 'Languedoc / Maury AOC ', '', 'Un must-have pour les collectionneurs\n\nLes amateurs de desserts chocolatés, de digestifs et de cigares verront dans ce Maury 1929 le summum de l’élégance. Son format ½ bouteille vous permettra de vous offrir un moment de dégustation d’exception sans craindre de gâcher ce nectar rarissime. Une pure merveille !', '', 1, 5, 1),
(103, ' CHARDONNAY POR ESCUDO ROJO 2013', 'Central Valley / Vin Blanc ', 'CHILI', 'Escudo Rojo blanc : La signature Baron de Rothschild en terre chilienne !!! Découvrez l''équilibre parfait entre la fraîcheur du fruit et des notes boisées.\n\nIssu à 100% du cépage Chardonnay, Escudo Rojo appartient à l''une des plus illustres familles du vin, celle de la Baronne Philippine de Rothschild.  Un vin qui se caractérise par une expression aromatique intense, fraîche et puissante, très bien équilibrée.  Il peut être dégusté maintenant comme dans plusieurs années. A tester de toute urgence avec des viandes blanches ou des filets de poissons.....\n', '', 2, 7, 1),
(104, ' TRADITION LES GRANDS ROUSSOTS 2010 - DOMAINE BADOZ', 'Jura / Côtes du Jura AOC ', '', 'L''alliance de la fraîcheur du Chardonnay à l''opulence du Savagnin, une belle découverte !\n\nAssemblage de Chardonnay et de Savagnin vieillit durant 3 années en fût de chêne, les "Grands Roussots" dévoile un nez généreux à la fois floral (chèvrefeuille) et fruité (citron, nectarine séchée, pomme jaune). L’attaque est fraiche, la bouche se développe sur des notes épicées, tapissée d’arômes d’amandes et de noix. La finale, longue et pure, laisse présager un beau potentiel de garde pour ce vin racé !', '', 2, 7, 1),
(105, ' SANCERRE PENTE DE MAIMBRAY 2014 - DOMAINE PAUL VATTAN', 'Loire / Sancerre AOC /', '', 'Une valeur sûre qui se confirme...Vous risquez même de provoquer des occasions juste pour le plaisir d''ouvrir une autre bouteille !!!\n\nUne belle robe dorée, qui rappelle au nez le citron et l’acacia, ce Sancerre ferme et ample en bouche, régale par sa fraîcheur et sa vivacité. En accompagnement de poissons ou d’un plateau de fruits de mer, pour sublimer vos repas de fête ou vos têtes à têtes estivaux... Une chose est sûre ce Sancerre fait partie des grands Sancerre.', '', 2, 7, 1),
(106, ' CHARDONNAY TETE DE CUVEE 2013 - DOMAINE DU TARIQUET', 'Sud-Ouest / Côtes de Gascogne IGP /', '', 'A découvrir absolument : le must de Tariquet dans une cuvée confidentielle !!!\n\nQuand l''un des plus grands cépages blancs est travaillé par la star du sud-ouest, on est sous le charme. Vinifié et élevé sur les lies fines avec bâtonnage, pendant 12 mois en fût de chêne neuf, ce chardonnay propose une étonnante complexité. Cette cuvée, fermentée en fûts, est produite en petite quantité et uniquement lorsque le millésime le permet. Le nez présente des notes d’ananas frais et de “lait de coco”, soutenues par un boisé élégant et fondu. Un vin d’une grande finesse avec une finale ample marquée par la fraîcheur. A l''apéritif ou sur des accords insolites, osez Tête de Cuvée : vous serez surpris par son succès !', '', 2, 7, 1),
(107, ' PRESTIGE BLANC 2014 - CHATEAU PUECH HAUT', 'Languedoc / Languedoc AOC /', '', 'Un Classique, une valeur sûre de l''appellation.\n\nCette cuvée du célèbre Château Puech-Haut, version blanc, est à connaître. Ses arômes de fruits frais, sa bouche tendre et suave, riche et longue, saura accompagner vos meilleurs petits plats. Il en a "dans le ventre", on croque dans sa chair et on en redemande. ', '', 2, 7, 1),
(108, ' BLANC FUTS DE CHENE 2014 - JEAN-PAUL BRUN - DOMAINE DES TERRES DOREES', 'Beaujolais / Beaujolais AOC', '', 'N''ayons pas peur de le dire : probablement le meilleur Beaujolais blanc\n\nCe Beaujolais blanc bouscule les préjugés pour nous faire voyager au cœur des vraies saveurs du Beaujolais. Jean Paul Brun se surpasse et nous séduit une nouvelle fois. En dégustation à l''aveugle, il nous a bluffé. Une très belle surprise.', '', 2, 7, 1),
(109, ' LA CROIX DE CARBONNIEUX 2012 - SECOND VIN DU CHATEAU CARBONNIEUX', 'Bordeaux / Pessac-Léognan AOC ', '', ' Le second Vin du Château Carbonnieux Blanc : un délice à l''apéritif !!\n\nTerres, vignes et savoir-faire, vos papilles sauront reconnaître la "griffe" d''un château mondialement célèbre. Finesse et minéralité, parfums de fleurs et de fruits, une élégante minéralité au léger goût exotique...', '', 2, 7, 1),
(110, ' CHABLIS 1ER CRU COTE DE LECHET 2012 - LA CHABLISIENNE', 'Bourgogne / Chablis 1er cru AOC ', '', 'Un premier cru d''une grande finesse, de la dentelle !\n\nCe Premier Cru, vin rare, solaire et aérien, est issu de vieilles vignes et a bénéficié d’un élevage de 12 mois. Au nez, il libère des parfums soutenus de fleurs, verveine, accompagnés de notes salines et une pointe citronnée. La bouche, fraiche et équilibrée révèle une très belle tension minérale. Un joli joyau du terroir à découvrir avec le temps.', '', 2, 7, 1),
(111, ' MANON 2014 - CLOS MARIE', 'Languedoc / Languedoc AOC', '', 'le Clos Marie a su encore une fois mettre en avant tout son savoir-faire.\n\nUn grand blanc du Languedoc qu''il faut absolument connaître ! Une association de cépages hors du commun, de la matière, des arômes et un équilibre des plus élégants. A connaître absolument !!!', '', 2, 7, 1),
(112, ' LA MOUSSIERE 2014 - ALPHONSE MELLOT', 'Loire / Sancerre AOC ', '', '"Un vin frais et d’une longue persistance, sûrement le meilleur Sancerre que j’ai testé" - Robert Parker\n\n"Vif comme un regard, doux comme un baiser". Voilà qui représente bien cette cuvée. Vous voulez découvrir les vins blancs de l’appellation Sancerre ? Alors prenez ce qu''il y a de mieux : La Moussière d''Alphonse Mellot est une référence. Un must à saisir les yeux fermés.', '', 2, 7, 1),
(113, ' CHATEAU DE TRACY 2013', 'Loire / Pouilly-fumé AOC ', '', 'Domaine recommandé par Robert Parker, savourez ce nectar, il saura vous séduire en toutes occasions...', '', 2, 7, 1),
(114, ' CHATEAU MONTUS BLANC 2011', 'Sud-Ouest / Pacherenc du Vic Bihl AOC ', '', 'Château de Tracy, noté 2** en 2015 aux Guides Bettane & Desseauve et Gault & Millau, est le domaine incontournable pour les amoureux du sauvignon. Sa personnalité est un mariage parfait entre terroir, cépage et vinification. Une valeur sûre, un grand sauvignon de Loire. Sa structure et sa trame aromatique sont d''une justesse remarquable. Des arômes dominants de fruits exotiques et d''agrumes...Une touche très minérale en fin de dégustation...Découvrez avec gourmandise, une cuvée envoûtante, vive et  charmeuse... ', '', 2, 7, 1),
(115, ' AUXEY-DURESSES 2013 - LOUIS JADOT', 'Bourgogne / Auxey-Duresses AOC ', '', 'Depuis quatre ans, cette cuvée retient toute l''attention de nos sommeliers !\n\nVinifié en fûts de chêne, comme les grands vins blancs de la Maison JADOT, cet Auxey-Duresses blanc a vieilli pendant une dizaine de mois. Ce 2013 est très limpide, d''une couleur or, exprimant des arômes de pomme reinette et d''amande fraîche. Aujourd''hui d''une très belle complexité aromatique, typique des grands blancs de la Côte de Beaune, vous avez une très bonne raison de vous laisser convaincre par son prix des plus abordables !', '', 2, 7, 1),
(116, ' VIN JAUNE 2008 - DOMAINE BADOZ', 'Jura / Côtes du Jura AOC ', '', 'Goutez au plus prestigieux des vins du jura !\n\nAprès un long et minutieux élevage en fût de chêne de 6 ans et 3 mois, ce vin paré d''une robe dorée libère de délicats arômes épicés de miel, de noix, d’amandes et de curry. Suave et onctueux en bouche, il offre une grande complexité aromatique, dominé par la noix, la pomme verte et relevé par les épices. Un vin ample et harmonieux à déguster sur un simple morceau de comté ou un rôti de veau aux agrumes et à garder jusqu''à 100 années !', '', 2, 7, 1),
(117, ' SCHISTE 2014 - DOMAINE DES ARDOISIERES', ' Savoie / Allobrogie IGP ', '', 'Découvrez les vins de Savoie comme vous ne les avez jamais goûtés !\n\n" Un blanc de grande envergure ! " - La Revue du Vin de France 2016\n\nSchiste est un blanc tout en rondeur, ample, avec une superbe structure, des notes légèrement toastées et une belle acidité. Il s’accordera à merveille dès l’apéritif sur des petits toasts de poissons, des crustacés et bien évidemment sur un magnifique plateau de fromage. Un splendide blanc de garde ! \n', '', 2, 7, 1),
(118, ' SANCERRE BLANC LES ROMAINS 2014 - DOMAINE VACHERON', ' Loire / Sancerre AOC ', '', 'La grande cuvée de l''excellent domaine Vacheron !!! Précise, minérale et fine. Un vrai plaisir d''épicurien à partager...\n\nLes Romains du domaine Vacheron est l''un des plus grands Sancerre. Ce vin bio est issu d''une sélection parcellaire sur un terroir de silex, le tout élevé en fût de chêne. Le vin se révèle riche, puissant et élégant, doté d''une belle minéralité qui lui confère beaucoup d''élan. Des arômes (menthe, fruits jaunes, fleurs blanches) se mélangent délicatement pour le plus grand bonheur des amateurs de cette appellation.', '', 2, 7, 1),
(119, ' GROS MANSENG DOUX 2014 - DOMAINE ALAIN BRUMONT', 'Sud-Ouest / Côtes de Gascogne VDP', '', 'Une explosion de douceur et de fraîcheur pour cette cuvée du célèbre domaine Alain Brumont !\n\nUn équilibre parfait entre le sucre et l''acidité. A l''apéritif, sur vos repas exotiques ou encore vos desserts, il charmera à coup sur !!! Et avec un tel rapport qualité - prix, c''est 100 % PLAISIR !!', '', 2, 8, 1),
(120, ' PREMIERES GRIVES 2014 - DOMAINE DU TARIQUET', 'Sud-Ouest / Côtes de Gascogne IGP', '', 'Dangereusement bon, cette cuvée a fait la notoriété et le succès du Domaine Tariquet. Ne pas le connaître est un péché... \n\nC''est un vin qui se glisse entre 2 sensations : celle d''une onctuosité enjôleuse, conjuguée à une profonde fraîcheur. Ce duo moelleux/fraîcheur, qui fonctionne à merveille, lui donne cette originalité si recherchée. Le plaisir de se faire plaisir ! ', '', 2, 8, 1),
(121, ' MUSCAT SAINT JEAN DE MINERVOIS 2014 - DOMAINE DU SACRE CŒUR', ' Languedoc / Saint-Jean de Minervois AOC ', '', 'L’atout cœur de vos repas de fêtes !\n\nComment résister au charme de ce Muscat Saint-Jean-de-Minervois ? Parfaitement équilibré entre fraîcheur et sucrosité, ce moelleux gourmand dévoile de délicieuses notes d’agrumes et de fruits exotiques. Idéal à l’apéritif, en accompagnement d’un foie gras ou d’un dessert au fruit, il va sublimer votre repas et subjuguer vos papilles !', '', 2, 8, 1),
(122, ' VENDEMIAIRE OCTOBRE 2009 - CHATEAU BOUSCASSE', 'Sud-Ouest / Pacherenc du Vic Bihl AOC', '', 'Osez l’originalité avec ce moelleux d’octobre : fraîcheur et gourmandise garanties !\n\nCette vendange tardive d''octobre est un délice avec ses notes de fruits exotiques, de mangue et d’abricot. Riche, équilibré et bourré de fraîcheur, sa bouche gourmande donne une sensation de fruits croquants tandis que son moelleux s’affirme dans la plus grande finesse. Tenue irréprochable et sans dominante sucrée, c’est certain, vous ne pourrez plus l’oublier ! (Elaboré par Alain Brumont, propriétaire du Château Montus, 2** au Guide RVF 2007 (producteur de très grands vins dans les meilleurs crus)).\n', '', 2, 8, 1),
(123, ' JURANCON BALLET D''OCTOBRE 2014 - DOMAINE CAUHAPE', ' Sud-Ouest / Jurançon AOC', '', 'Fraicheur et douceur pour ce jurançon moelleux, signé par l''un des plus beaux et des plus célèbres domaines de l''AOC !!!\n\nUn climat caractéristique qui allie rigueur montagnarde et douceur océane., conjugué à la qualité du terroir, précieux mélange d''argile, de silice et de galets, permet d''exprimer la quintessence des cépages nobles du jurançon: le gros et le petit manseng.', '', 2, 8, 1),
(124, ' MASCARON SAUTERNES 2010', 'Bordeaux / Sauternes AOC ', '', 'Un Sauternes au rapport qualité prix bluffant !\n\nLe vin présente une robe jaune doré éclatante. Au nez, ce liquoreux dévoile des arômes de coing, de figue sèche et de gelée d''abricot. En bouche, on retrouve une grande richesse aromatique avec un équilibre entre le sucre et l''alcool. La finale, complexe et enveloppante, laisse apparaitre des notes de miel et de pain d''épices. Ce Masacaron Sauternes 2010 possède toute l''onctuosité et l''acidité nécessaires pour que le fruité s''exprime de façon magistrale!', '', 2, 8, 1),
(125, ' LES DERNIERES GRIVES - PETIT MANSENG 2014 - DOMAINE DU TARIQUET', 'Sud-Ouest / Côtes de Gascogne IGP /', '', 'Le summum de chez Tariquet !\n\nLe nouveau millésime est enfin arrivé : Perle du domaine, produite en quantité limitée et seulement dans les meilleures années, la cuvée Les Dernières Grives est un vin moelleux issu de raisins cueillis à surmaturité, aux confins de l''automne.', '', 2, 8, 1),
(126, ' PORTO NIEPOORT WHITE', 'Spiritueux / Porto /', '', 'L''intensité aromatique mêlée à la douceur et la légèreté !\n\nProduit exclusivement à partir de raisins blancs, il est vieillit un an dans de grands réservoirs en chêne puis 3 ans dans des vieux fûts de petite taille. Le « White » mêle des arômes de fruits secs, de pruneau, de noix, d’amandes et vous séduira par sa douceur et sa structure tout en légèreté.', '', 2, 8, 1),
(127, ' JURANCON 2013 - DOMAINE UROULAT', ' Sud-Ouest / Jurançon AOC', '', 'Un régal de douceur, un modèle de grâce et d’équilibre : un Jurançon absolument somptueux !\n\nEquilibré et de fin par son harmonie entre la douceur du fruit et la nervosité de son acidité, ce vin moelleux est un vrai petit bijou. Ses arômes de fruits frais (abricot, mangue, fruits exotiques) se prolongent dans une finale délicieuse et gourmande, jamais alourdie par une liqueur excessive. Un allié de choix pour accompagner avec raffinement vos foies gras et desserts en tous genres.', '', 2, 8, 1),
(128, ' MACVIN - DOMAINE ROLET ET FILS', ' Jura / Macvin AOC /', '', 'LE produit phare du Jura, le vin de dessert par excellence !\n\nCette spécialité du Jura (mutation du moût avec de l''eau de vie) bénéficie d''un vieillissement deux fois plus long que la norme en vigueur. Ce travail de patience est récompensé par ce Macvin aux arômes de confit et de raisins secs. Une magnifique originalité  ! Et si vous avez encore des doutes, testez-le avec un dessert au chocolat ou un simple melon des Charentes… plaisir garanti !', '', 2, 8, 1),
(129, ' TOKAJI LATE HARVEST 2009 - KESOI SZURETELESU - KIKELET PINCE', 'Hongrie / Vin', 'HONGRIE', 'Proclamé par Louis XIV « Vin des Rois, Roi des vins », ce célèbre Tokaj venu tout droit de Hongrie va surprendre par sa finesse !\n\nL''occasion de découvrir un nectar sans se tromper !\n\nVinatis vous invite à découvrir ce somptueux nectar : un vin blanc moelleux de type vendanges tardives surprenant ! Excellent en apéritif, ce célèbre vin accompagne à merveille un foie gras poêlé, les desserts ou les fromages à pâte persillée comme les bleus.  En bouche, les arômes de fruits sont présents et gourmands (pêche, poire, ananas). La finale est souple, vive et donne à ce grand vin un style original et racé. Un très bel exemple de vendanges tardives.', '', 2, 8, 1),
(130, ' MONTAGNY 1ER CRU 2012 - OLIVIER LEFLAIVE', ' Bourgogne / Montagny 1er Cru AOC', '', 'Une cuvée qui marque tout le savoir-faire d''Olivier Leflaive !\n\nLe soin apporté à la vinification et à l’élevage de cette cuvée se ressent avec ce vin flatteur parfaitement équilibré entre le gras et la vivacité. Sa longue finale, ses arômes d’agrumes, de fleurs blanches et d’amande grillée nous invite à savourer ce bijou du terroir autour d''un poisson grillé.', '', 2, 9, 1),
(131, ' SAINT AUBIN 1ER CRU EN REMILLY 2011 - OLIVIER LEFLAIVE', 'Bourgogne / Saint-Aubin 1er Cru ', '', 'Une jolie fraîcheur et une belle concentration pour ce premier cru !\nCe Saint-Aubin s''ouvre sur un nez fin et subtil s''épanouissant sur des arômes minéraux rehaussés de notes d''amande, de cannelle et d''épices. Un vin d''une belle concentration, à la texture minérale bien équilibrée qui s''épanouit dans une longue finale...Une cuvée enfin prête à boire !', '', 2, 9, 1),
(132, ' CHEVALIER-MONTRACHET 2012 - BOUCHARD PERE ET FILS', 'Bourgogne / Chevalier-Montrachet AOC', '', 'Onctueux, complexe et riche... L''excellence de la Bourgogne !\n\nDécrite dans le magazine Bourgogne Aujourd''hui comme "une cuvée d''un très haut niveau", ce Chevalier-Montrachet délivre un bouquet délicat et raffiné aux notes intenses d''agrumes, de fruits secs, de fleur d''oranger et d''épices marié à une délicieuse note grillée. Magnifiquement équilibré entre la richesse et la minéralité, il se révèle tout à la fois complexe et léger... L''élégance à son paroxysme !', '', 2, 9, 1),
(133, ' BEAUJOLAIS VILLAGES BLANC 2014 - DOMAINE DES NUGUES', 'Beaujolais / Beaujolais Villages AOC ', '', '"Au niveau des Grands Bourgognes !", comme le considère la Revue des Vins de France.\n\nRévélation du Beaujolais, le Domaine des Nugues confirme et signe ! La complexité aromatique et la fraîcheur de son Beaujolais Blanc interpellent : partagez le bonheur de faire découvrir ce magnifique chardonnay !', '', 2, 10, 1),
(134, ' BOURGOGNE ALIGOTE 2014 - CAVE DE GENOUILLY', 'Bourgogne / Bourgogne Aligoté AOC ', '', 'Un bourgogne aligoté franc et typique !\n\nDes senteurs délicates de fleurs blanches et d''agrumes, une bouche fraîche et équilibrée, cet aligoté a tout pour plaire ! Sa persistance aromatique fera sensation lors de votre prochain apéritif ou au moment de passer à table. Toujours à un prix des plus attractifs: craquez pour cette petite bombe de saveurs !', '', 2, 10, 1),
(135, ' PETITE MARIE 2014 - DOMAINE DU SACRE CŒUR', ' Languedoc / Saint-Chinian AOC', '', 'Une originalité qui va vous convaincre dès le premier verre !\n\nSi l’appellation Saint-Chinian ne produit des blancs que depuis 2004, ces derniers sont cependant extrêmement savoureux, frais, et minéraux. Produit sur des sols à dominante calcaire, Petite Marie est un vin expressif et tendu qui fera forte impression en accompagnement de poissons en sauce et de viandes blanches à la crème.', '', 2, 10, 1),
(136, ' LES TRUFFIERES 2014 - DOMAINE DE MAUPERTHUIS', 'Bourgogne / Bourgogne AOC ', '', 'Un coup de coeur de nos sommeliers à ne rater sous aucun prétexte !\n\nUne robe resplendissante, un vin aromatique à souhait, nous vous faisons partager une belle découverte avec ce Bourgogne Chardonnay Les Truffières ! La richesse de ce "simple" Bourgogne étonne et sa fraicheur minérale interpelle ! Ample et persistante, la bouche de ce vin charmeur finira par vous convaincre !', '', 2, 10, 1),
(137, ' MACON VILLAGES 2014 - JOSEPH DROUHIN', 'Bourgogne / Mâcon Villages AOC', '', 'Le Mâcon signé Drouhin : succès garanti !\n\nMinéral et gourmand, le chardonnay séduit immédiatement au nez par ses arômes floraux et fruités. En bouche, son attaque franche donne l’impression de croquer dans le fruit à pleines dents et sa finale souple et fraîche est d’une légèreté des plus agréables. Petit prix pour grand plaisir, tout est réuni pour vous faire apprécier votre verre… et vous rendre incapable de refuser le second !', '', 2, 10, 1),
(138, ' PETIT CHABLIS PAS SI PETIT 2014 - LA CHABLISIENNE', ' Bourgogne / Petit Chablis AOC', '', 'Un beau Petit Chablis qui n’est effectivement "pas si petit, nous le confirmons" – Bettane&Desseauve 2016\n\nC’est le vin à essayer pour découvrir cette appellation : moins complexe qu''un Chablis, plus facile et agréable à déguster... Texturé, élégant, simple et typé, ce vin séduit sans détour par sa minéralité rafraîchissante et ses arômes d''agrumes et de fleurs. Un chardonnay made in Chablis dans toute sa splendeur.', '', 2, 10, 1),
(139, ' BOURGOGNE COTE CHALONNAISE 2014 - CAVE DE GENOUILLY', 'Bourgogne / Bourgogne AOC ', '', 'Du gras, de la vivacité et de la finesse, comment résister ?\n\nFloral et fruité, ce 2014 affiche en grand sa fraîcheur qui s''affirme en bouche par une belle vivacité. Son équilibre, sa finesse et son gras nous ont séduits ! Une bouteille idéale à l''apéritif pour sa fraîcheur ou pour accompagner une blanquette de veau.', '', 2, 10, 1),
(140, ' CHABLIS 2014 - DOMAINE DU CHARDONNAY', 'Bourgogne / Chablis AOC', '', '" Une belle surpise en dégustation à l''aveugle" - Robert Parker\n\nAvec sa minéralité iodée, ses notes d''agrumes, d''amandes, de chèvrefeuille et son intense fraîcheur, ce Chablis nous a fait fondre de bonheur à la dégustation ! La bouche, portée sur les fruits blancs, dévoile un vin ample et harmonieux tout en étant léger et digeste. Une harmonie de saveurs qui vous suprendra comme elle a conquis Robert Parker !', '', 2, 10, 1),
(141, ' SAINT VERAN 2013 - JOSEPH DROUHIN', 'Bourgogne / Saint-Véran AOC', '', 'Une grande pureté aromatique et un équilibre pertinent entre matière et acidité.\n\nDe la fraîcheur, une belle tension, sans complexe ce Saint-Véran propose un rapport qualité/prix des plus engageants ! Lors d''une dégustation à l''aveugle, nos sommeliers ont relevé une grande pureté aromatique et un équilibre pertinent entre matière et acidité. Fruité à souhait, vous servirez ce Saint Véran frais (12/13°), il s''imposera de lui même à l''apéritif :  coup de foudre assuré !', '', 2, 10, 1),
(142, ' COUVENT DES JACOBINS 2014 - LOUIS JADOT', 'Bourgogne / Bourgogne AOC', '', 'Une valeur sûre signée par un grand nom de la Bourgogne...\n\nCette cuvée de la célèbre Maison Louis Jadot fait partie de ses succès éternels. Un Chardonnay fruité, suave, aux arômes expressifs et charmeurs. Un Bourgogne Blanc parfait à l''apéritif comme sur des entrées ! Une valeur sûre pour ceux qui ne connaissent pas encore...', '', 2, 10, 1),
(143, ' PETIT CHABLIS 2014 - DOMAINE MOREAU-NAUDET', 'Bourgogne / Petit Chablis AOC ', '', 'Un Petit-Chablis tout en minéralité !\n\nSa robe pâle, d’un doré tendre, laisse échapper des nuances de fleurs blanches, d’agrumes et de pierre à fusil. La bouche, très sèche, permet d’apprécier un retour minéral tout à fait caractéristique de cette appellation. Le vin idéal pour accompagner fruits de mer et crustacés !!!', '', 2, 10, 1),
(144, ' BLANC - MENETOU-SALON MOROGUES 2014 - DOMAINE HENRY PELLE', 'Loire / Menetou-salon AOC ', '', 'Vif et généreux, avec son fruit presque "croustillant", ce vin plaît et donne envie !\n\nUn 100% Sauvignon qui ne déroge pas à la règle : Finesse, gourmandise, fraîcheur et équilibre. Un vin blanc qui ne peut pas vous laisser indifférent. Dès la première gorgée, le charme opère... Un Menetou - Salon digne de sa réputation et à un prix des plus honnêtes !  Vous verrez, vous y reviendrez !', '', 2, 10, 1),
(145, ' TAVEL 2014 - E. GUIGAL', 'Rhône / Tavel AOC /', '', 'Tavel,  le Roi des Rosés\n\nUne référence de la Vallée du Rhône signée Guigal. Ce Tavel à la séduction immédiate a la personnalité d''un vin de gastronomie. Equilibré, structuré mais sachant aussi faire preuve de gourmandise et d''élégance, il permet des accords mets-vins d''une grande variété. Une fois que vous l''aurez goûté, il sera difficile de vous en passer.', '', 3, 12, 1),
(146, ' CHATEAU HENRI BONNAUD 2014', 'Palette AOC / Vin Rosé', '', 'L''un des plus beaux domaine de Provence...\n\nLa gamme Château d''Henri Bonnaud répond aux mêmes exigences que la gamme Quintessence mais permet aux amateurs de vins de Provence d''avoir des cuvées plus accessibles et qui se dégustent dès aujourd''hui. Avec son passage en barrique de 8 mois, ce rosé pourra vous surprendre encore dans quelques temps. Une structure bien équilibré qui révèle une grande qualité de savoir-faire. Un grand nom de la Provence à un prix très accessible ! ', '', 3, 12, 1),
(147, ' CUVEE MINUTY PRESTIGE ROSE 2014', ' Provence / Côtes de Provence AOP /', '', ' Le célèbre rosé recherché par tous les amateurs. \n\nCe 2014 est doté d''un parfait équilibre entre  fraîcheur, structure et minéralité. On a adoré son coté charmeur, léger et aérien, dont la complexité rappelle à bon escient que l''on est en présence d''un "grand" rosé.', '', 3, 12, 1),
(148, ' ROSE 2014 - CHATEAU PIBARNON', ' Provence / Bandol AOC ', '', ' Un joyau de la Provence !\n\nCe rosé possède une superbe typicité, fait preuve de finesse et de complexité. Signé Pibarnon, l''un des meilleurs domaines de Bandol : une référence mondiale !', '', 3, 12, 1),
(149, ' COEUR DE GRAIN 2014 - CHATEAU ROMASSAN - DOMAINES OTT', 'Provence / Bandol AOC ', '', 'LE ROSE LE PLUS CÉLÈBRE DU MONDE !!!\n\nL''élite des rosés. Récolté à la main, tri très sélectif, vieillissement en foudre de chêne. Célèbre entre tous, le rosé Coeur de grain séduit depuis les années 30 : aromatique, souple, nerveux et élégant. Idéal sur des crevettes flambées, une viande rouge très tendre ou un filet de poisson, ce Bandol inégalable reste LA référence des vins de Bandol.', '', 3, 12, 1),
(150, 'CUVEE MINUTY PRESTIGE ROSE 2014', 'Provence / Côtes de Provence Cru Classé AOC', '', ' Le célèbre rosé recherché par tous les amateurs. \n\nCe 2012 est doté d''un parfait équilibre entre  fraîcheur, structure et minéralité. On a adoré son coté charmeur, léger et aérien, dont la complexité rappelle à bon escient que l''on est en présence d''un "grand" rosé.', '', 3, 12, 1),
(151, ' DOMAINE TEMPIER -  ROSE 2014', ' Provence / Bandol AOC ', '', 'Un petit bijou d''épices et de fruits que les connaisseurs s''arrachent\n\nEncore plus de plaisir avec le Magnum de ce joyau de la Provence. Épicé et fruité à souhait, ce rosé est une véritable explosion d’arômes. Il sera l’atout séducteur de votre table, pour un dîner plus que parfait. Ne passez pas à côté de cette perle provençale, vous le regretteriez.', '', 3, 12, 1),
(152, 'COEUR DE GRAIN 2014 - CHATEAU ROMASSAN - DOMAINES OTT', 'Provence / Bandol AOC', '', 'LE ROSE LE PLUS CÉLÈBRE DU MONDE !!!\nL''élite des rosés. Récolté à la main, tri très sélectif, vieillissement en foudre de chêne. Célèbre entre tous, le rosé Coeur de grain séduit depuis les années 30 : aromatique, souple, nerveux et élégant. Idéal sur des crevettes flambées, une viande rouge très tendre ou un filet de poisson, ce Bandol inégalable reste LA référence des vins de Bandol.', '', 3, 12, 1),
(153, ' LES CONFIDENTIELLES 2014 - DOMAINE SAINT ANDRE DE FIGUIERE', 'Provence / Côte de Provence La Londe AOP ', '', 'Le "must" du Domaine Saint André de Figuière\n\nC''est sur un terroir d''exception que le Domaine Saint André de Figuière a créé cette cuvée. Une production parcellaire, des quantités très limitées, et une collection de médailles, la cuvée Confidentielle mérite bien son titre de rosé exceptionnel. Quelle réussite.', '', 3, 12, 1),
(154, ' ROSE 2014 - DOMAINE TEMPIER', 'Provence / Bandol AOC ', '', 'Un petit bijou d''épices et de fruits que les connaisseurs s''arrachent\n\nUn joyau de la Provence. Épicé et fruité à souhait, ce rosé est une véritable explosion d’arômes. Il sera l’atout séducteur de votre table, pour un dîner plus que parfait. Ne passez pas à côté de cette perle provençale, vous le regretteriez.', '', 3, 12, 1),
(155, ' COEUR DE GRAIN 2014 - CHATEAU DE SELLE - DOMAINES OTT', 'Provence / Côtes de Provence AOC', '', 'L''un des premiers rosés présent sur les belles tables du monde entier !\n\nUn très grand Côtes de Provence alliant finesse et matière. Des notes de pamplemousse associées aux épices... qui en feront le compagnon idéal des mets les plus fins comme des coquilles St Jacques ou plus original une viande sauce aigre doux. C''est une référence... Un incontournable !', '', 3, 12, 1),
(156, ' LES SORCIERES ROSE 2014 - DOMAINE DU CLOS DES FEES', 'Languedoc / Côtes du Roussillon AOC', '', 'Surprenez vos invités et ensorcelez vos apéritifs estivaux !\n\nUne nouvelle gourmandise du Languedoc signée Hervé Bizeul. Avec sa fraîcheur et ses arômes fruités, Les Sorcières Rosé est une cuvée insolite qui fera saliver vos amis. Débouchez une bouteille à l’apéritif ou sur une cuisine estivale, vous ferez sensation.', '', 3, 13, 1),
(157, ' ROSE BONBON 2015 - DOMAINE DES DIABLES', 'Provence / Côtes de Provence', '', 'Le rosé qui va vous faire succomber !\n\nOn croque littéralement dans les fruits frais: agrumes, fruits rouges et toujours cette pointe acidulée en finale. Friand, d''une fraîcheur admirable, rond, légèrement sucré, ses fins parfums dansent sur les papilles et flattent le palais sans concession. A découvrir à l''apéritif entre amis sous le parasol ! Nous avons adoré le style, son coté "tendance", et maintenant son coté "Rosé de gastronomie"', '', 3, 13, 1),
(158, ' 6EME SENS 2014 - GERARD BERTRAND', ' Languedoc / Pays d''Oc IGP ', '', 'Déboucher une bouteille de vin, c''est éveiller ses sens  : d''abord le toucher, l''ouie, la vue, l''odorat et enfin le goût ! Ce rosé souple et gouleyant vous transportera à la découverte du 6ème SENS !\n\nCette cuvée  "6ème sens" est remplie de soleil, de fleurs, de plaisirs simples et de tendresse. L''assemblage Syrah/Grenache offre une belle rondeur, avec l''acidité nécessaire, juste ce qu''il faut pour qu''il mérite toute votre attention. Nous l''apprécions pour sa facilité, sa franchise et son équilibre... Le tout à un si petit prix !', '', 3, 13, 1),
(159, ' BYO CABERNET-MERLOT 2014 - DOMAINE UBY', 'Sud-Ouest / Côtes de Gascogne IGP ', '', 'Un rosé au style 100% UBY !\nDe l’apéritif au dessert en passant par des grillades estivales, Uby fait encore un carton plein. Un petit prix 100% réussi !\n\nAvec ses arômes de framboise et de groseille, ce rosé au style 100% Uby est une gourmandise: un vrai bonbon associé à une grande fraîcheur.', '', 3, 13, 1),
(160, 'I QUERCIOLI REGGIANO LAMBRUSCO DOLCE - DOMAINE MEDICI ERMETE', ' Emilie - Romagne / Lambrusco D.O.C', '', 'Ce Lambrusco doux, aux arômes de cerises, fraises fera des miracles à l''apéritif : Séduction garantie pour vos convives !\n\nNotre COUP DE COEUR à tous !!! La clef de son succès ? Ses petites bulles, fines, légères, et tellement festives ! Ce Lambrusco fait partie des plus appréciés, ses arômes explosifs de fruits rouges, la gourmandise du raisin et sa fameuse effervescence extravagante ne vous laisseront pas de marbre !', '', 4, 14, 1),
(161, ' LIBESCO REGGIANO LAMBRUSCO SECCO - DOMAINE MEDICI ERMETE', 'Emilie - Romagne / Lambrusco D.O.C ', '', 'Un Lambrusco sec, fruité et léger pour accompagner tout un repas !\n\nEt si c''était ça la Dolce Vita ?\n\nAgréablement frais et fruité, ce vin mousseux sec accompagne parfaitement tout un repas gourmet aux accents italiens : Une planche d’anti-pasti, une pizza dans la pure tradition napolitaine ou encore un risotto à la milanaise. Jouer les prolongations jusqu’au dessert avec le I Quercioli Reggiano Lambrusco du même domaine, plus sucré et très gourmand…\n', '', 4, 14, 1),
(162, ' UBY O2 ROSE 2014 - DOMAINE UBY', 'Effervescent / Sud-Ouest ', '', 'Une véritable friandise pétillante pour des apéritifs originaux !\n\nO2 est de retour ! La cuvée effervescente du domaine Uby revient avec un rosé pétillant qui ravira vos moments de détente. Epatez vos amis, Uby O2 sort des sentiers battus et sera parfait, autant à l’apéritif que pour un dessert fruité.', '', 4, 16, 1),
(163, ' FRV100 - JEAN-PAUL BRUN', 'Effervescent / Beaujolais ', '', 'Souvent copiée, rarement égalée, découvrez l''une des plus belles réussites de Jean Paul BRUN, vigneron de génie !\n\nSes caractéristiques : 7.5% d''alcool, sa méthode d''élaboration ancestrale et 100% naturelle. Son créateur est un génie : Jean-Paul BRUN, un vigneron anti-conventionnel à la réussite exemplaire. Son domaine, les Terres Dorées (Beaujolais). Terres, vignes, vinifications : rien n''est laissé au hasard, seul compte le goût et le plaisir. Il a osé créer un vin effervescent, une anti-thèse du champagne. Résultat : c''est un vin rosé pétillant et original. ', '', 4, 16, 1),
(164, ' CHAMPAGNE DUVAL LEROY - PRESTIGE BRUT ROSE 1ER CRU – DEMI-BOUTEILLE', ' Champagne / Champagne AOC ', '', 'Cette grande maison de Champagne nous offre un Brut Rosé des plus séducteurs ! \nCe rosé d''exception révèle, grâce au Pinot Noir, un parfait équilibre entre la fraîcheur et la robe du vin ou s''expriment des notes de groseilles et de framboises. Sa bouche gourmande satisfera tous les amateurs. Une valeur sûre, à savourer avec délectation !', '', 4, 16, 1),
(165, ' BRUT ROSE - CHAMPAGNE MICHEL FURDYNA', 'Champagne / Champagne Rosé ', '', 'Le champagne des gourmands !\n\nUn champagne rosé au fruité élégant, et dont la finesse ne vous laissera pas indifférent. Un vrai Rosé de saignée qui se fait remarquer par sa gourmandise et sa qualité, signé de la Maison Furdyna. A apprécier à l''apéritif !', '', 4, 16, 1),
(166, 'BRUT ROSE - CHAMPAGNE DEUTZ', 'Champagne AOC / Champagne Rosé ', '', '"Le Brut Rosé est fabuleux", Robert PARKER\n\nDélicate avec ses accents de fruits d’été, la cuvée Brut Rosé offre un bouquet doux et ouvert sur des arômes de cerise, de mûre, de grenade et de groseille. Dès le nez, il révèle un caractère rond mais bien affirmé qui oscille entre franchise et friandise. Il peut être apprécié à l’apéritif mais possède également suffisamment de puissance pour le boire à table au cours du dîner. Un champagne rosé à la fraîcheur et à la gourmandise fédératrice !', '', 4, 16, 1),
(167, ' CHAMPAGNE LANSON ROSE LABEL', 'Champagne AOC / Champagne Rosé ', '', 'Une reconnaissance mondiale pour un plaisir simple et gorgé de tendresse !\n\nLe Rosé Label de Lanson accompagnera les grandes et petites célébrations de votre vie. Vos apéritifs et vos desserts seront marqués aux bulles roses par son originalité et sa finesse. Un Champagne Rosé brut qui traverse les décennies avec panache.', '', 4, 16, 1),
(168, 'LADY ROSE - CHAMPAGNE DUVAL LEROY', 'Champagne AOC / Champagne Rosé ', '', 'Un Champagne Brut Rosé gourmand à souhait !\n\nA la mise en bouche, la cuvée Lady Rosé révèle des arômes de fraises des bois compotée, les papilles sont réveillées par une touche d''acidité s''ouvrant alors sur une profonde vinosité  caractéristique d''un bon rosé. Un équilibre des plus justes entre fraîcheur et suavité ! Cette Lady Rosé débutera de la meilleure des façons un repas gourmand !', '', 4, 16, 1),
(169, 'CHAMPAGNE RUINART - BRUT ROSE', 'Champagne AOC / Champagne Rosé', '', ' L''un des meilleurs champagnes rosés, réunissant finesse et puissance.\n\nUn bouquet intense de fruits rouges et de pétales de rose rivalise de fraîcheur avec une bouche vive et soyeuse.', '', 4, 16, 1),
(170, 'CHAMPAGNE HENRIOT - BRUT ROSE', 'Champagne AOC / Champagne Rosé ', '', 'Le Brut Rosé de la Maison Henriot !\n\nSensuel et élégant, avec une légère teinte rosée, ce champagne est dominé par un nez fruité intense et possède un palais équilibré aux délicates notes de fruits rouges ! ', '', 4, 16, 1),
(171, ' RIALTO - PROSECCO - CANTINA COLLI EUGANEI', 'Vénétie / Prosecco DOC /', '', 'Un Prosecco au  rapport plaisir/prix des plus irrésistibles !!! Idéal pour un cocktail improvisé : Surprenez vos amis !\n\nCe Prosecco, frais et léger, aux agréables arômes fruités et floraux prend grand soin de votre portefeuille et de vos papilles. C’est le compagnon idéal des petits et grands moments de votre vie ou tout simplement pour un apéro entre amis. Lancez-vous dans la préparation de ce fameux cocktail Vénitien, le Spritz, composé notamment de Prosecco et d''Apérol. A ce prix-là, faîtes votre stock et gardez-en toujours au frais.', '', 4, 15, 1),
(172, ' MOSCATO RAFFAELO - RAPHAEL DAL BO', ' Vénétie / Effervescent Blanc ', 'ITALIE', 'Un Moscato très gourmand, délicieusement fruité. Craquez sans compter pour ce vin finement pétillant ...\n\nCette cuvée a séduit à l''unanimité nos sommeliers pour ces fabuleux arômes de pomme, de poire qui se poursuivent en bouche au travers de fines bulles. Ses effluves de fleurs d''orangers vous emporte de suite dans un petit coin d''Italie. Fraîcheur…Douceur...Juste ce qu’il faut pour partager un vrai moment de bonheur !!!', '', 4, 15, 1),
(173, ' PROSECCO VAL D''OCA TREVISO DOC - VITE GIALLO 2014- VAL D''OCA', ' Vénétie / Prosecco DOC', 'ITALIE', 'Un des Prosecco les plus vendus dans le monde ... C''est le bon moment pour célébrer vos petits et grands évènements à prix MINI !!!\n\nCe Prosecco, frais et léger, aux agréables arômes fruités et floraux prend grand soin de votre portefeuille et de vos papilles. Lancez-vous dans la préparation de ce fameux cocktail Vénitien, le Spritz, composé notamment de Prosecco et d''Apérol. A ce prix-là, faites votre stock et gardez-en toujours au frais...', '', 4, 15, 1),
(174, ' CAVA CYGNUS RESERVA', 'Catalogne / Cava /', 'ESPAGNE', ' Plus de 50 Cava dégustés pour trouver la perle rare : A ce prix là, vous avez le compagnon idéal pour vos petites et grandes célébrations !\n\nCygnus offre une complexité aromatique où se mêlent harmonieusement des arômes fruités et de noix fumées, sur des notes miellées et briochées. Une belle effervescence en bouche et une longue finale complètent cette dégustation, s’apparentant selon 1+1=3 au ballet gracieux du cygne… Savourez ces  jolies bulles catalanes à l’apéritif ou avec un dessert fruité à la crème. Ayez toujours une bouteille au frais et faîtes-en le compagnon de vos petites et grandes célébrations !', '', 4, 15, 1),
(175, ' CUVEE CHAMBERAN - CLAIRETTE DE DIE TRADITION – UJVR', 'Rhône / Clairette de Die AOP ', '', 'Des petites bulles gorgées de fruits et de douceur !!!\n\nAvec son faible degré d''alcool, ses délicats parfums de roses, d''agrumes et d''abricot ainsi que ses bulles si fines, la cuvée Chambéran de L''union des jeunes viticulteurs récoltants va littéralement envoûter vos papilles !! Une belle fraîcheur associée à une légère douceur :  tout est là pour qu''une gorgée en appelle une autre. C''est une gourmandise à servir bien frais !!', '', 4, 15, 1),
(176, ' UBY O2 2014 - DOMAINE UBY', 'Sud-Ouest / Vin Mousseux de Qualité', '', 'L’effervescent de l’un des domaines les plus en vogue du moment !\n\nEn matière d''arômes et de légèreté, Uby atteint presque son paroxysme avec O², une cuvée effervescente et entièrement conçue sous le signe de la fraîcheur. Ses bulles, fines et légères, laissent échapper un subtil bouquet de fruits de la passion, d’ananas et d’agrumes qui, en bouche, se mêle au pétillant dans un festival de fraîcheur et de douceur. La boisson originale de l’été, à prix tout petit : à découvrir absolument !', '', 4, 15, 1),
(177, ' I FOSSILI - PROSECCO EXTRA DRY - CANTINA COLLI EUGANEI', 'Vénétie / Prosecco DOC ', 'ITALIE', 'Un vrai coup de cœur pour ce Prosecco qui a séduit haut la main tous nos sommeliers. Des petites bulles, un prix léger pour embellir vos repas et soirées.\n\n\nSi vous souhaitez le meilleur tout en prenant soin de votre budget, ce Prosecco I Fossili Extra-dry, est l''effervescent qu''il vous faut pour accompagner  toutes vos célébrations. Vous serez conquis par sa grande fraîcheur et ses toutes fines bulles qui mettront vos papilles en fête. Légèrement sucré, il fera pétiller votre apéritif.', '', 4, 15, 1),
(178, ' MUSCAT PETITS GRAINS - EFFERVESCENT - AEGERTER PERE ET FILS', ' Languedoc / Vin Mousseux de Qualité', '', 'Des petites bulles pour accompagner vos moments de gourmandise\n\nSur les vignes ensoleillées du Languedoc-Roussillon, la maison Aegerter cultive le cépage blanc emblématique de la famille des Muscats : le Muscat Blanc à petits grains. De cette rencontre originale, les Aegerter ont su extraire une cuvée effervescente légère et gourmande à souhait. Un nectar empli de douceur, pour des moments de convivialité chaleureux.  ', '', 4, 15, 1),
(179, ' CREMANT D''ALSACE - DOMAINE DU MOULIN DE DUSENBACH', 'Alsace / Cremant Alsace AOC', '', 'Les petites bulles de tous les instants !\n\nElaboré dans la plus pure tradition champenoise, ce Crémant d’Alsace s’apprécie de l’apéritif au dessert grâce à ses fines bulles, son élégance et son côté sec et racé. Riche en notes d’agrumes et de fruits mûrs (pêche blanche), il excelle en bouche par sa rondeur et sa fraîcheur dans une harmonie des plus savoureuses. Délicat et raffiné, cet effervescent réussi le juste équilibre entre la légèreté et l’exubérance : le compagnon idéal des petites fêtes et des grands évènements !', '', 4, 15, 1),
(180, ' CREMANT DE BOURGOGNE - DOMAINE VOARICK', ' Bourgogne / Crémant de Bourgogne AOC /', '', 'Une révélation lors d''une dégustation à l''aveugle parmi quelques champagnes  : un Crémant de Bourgogne haut de gamme qui rime avec prestige !\n\nGourmand et complexe avec son nez de tarte au citron meringuée et de fruits blancs évoluant vers l’acacia et le miel, il exalte littéralement en bouche dans un halo de fraîcheur avec ses notes d’agrumes confits et de pain grillé. Un effervescent harmonieux et persistant qui fera la part belle à vos apéritifs et plats à base de poisson !', '', 4, 15, 1),
(181, ' CHAMPAGNE MICHEL FURDYNA - BRUT CARTE BLANCHE', 'Champagne AOC / Champagne Blanc', '', ' Succès assuré avec ce champagne de tous les moments !\n\nFrais et expressif, régalez-vous de ses parfums d''agrumes, stimulés par une fine effervescence.  Une cuvée de propriétaire qui propose un excellent compromis en rapport qualité /prix/plaisir. Les avis laissés par nos clients en attestent !', '', 4, 15, 1),
(182, ' CHAMPAGNE THIERRY MASSIN - CUVEE SELECTION BRUT', 'Champagne AOC / Champagne Blanc ', '', 'Un champagne de tout premier choix \n\nSon nez très expressif de fruits jaunes se confirme en bouche par une belle onctuosité et une bulle légère. La finale s''épanouit harmonieusement sur des notes florales séductrices. Un vin fin et délicat, au rapport qualité-prix absolument parfait. A boire très frais.', '', 4, 15, 1),
(183, 'CHAMPAGNE GOSSET - GRANDE RESERVE', ' Champagne / Champagne AOC /', '', '\n\nLa cuvée Grande Réserve offre un nez ouvert et expressif. Riche en promesse, cette entrée en matière gourmande et rafraîchissante ne déçoit pas en bouche, grâce à son goût chaleureux et consistant faisant écho à la richesse et au charme de ce vin. Un incontournable pour les amateurs de grands champagne !', '', 4, 15, 1),
(184, 'CHAMPAGNE VEUVE CLICQUOT - BRUT CARTE JAUNE', 'Champagne / Champagne AOC ', '', 'Un grand classique en champagne !\n\nSigne de fête, de luxe et d’élégance, le Brut Carte Jaune est avant tout un grand vin incarnant l’expression pérenne du style de la Maison Veuve Clicquot. On apprécie la finesse de ses bulles, sa chair équilibrée et séductrice. Les notes de fruits blancs aux légères saveurs to', '', 4, 15, 1),
(185, 'CHAMPAGNE HATON & FILS - CUVEE RENE HATON - BLANC DE BLANCS 1ER CRU', 'Champagne / Champagne AOC', '', 'Un Blanc de Blancs, classé en 1er Cru, qui fera parler de lui !! \n\nLogé dans une bouteille magnifique, ce Brut Premier Cru réserve de belles sensations.', '', 4, 15, 1),
(186, ' CHAMPAGNE TSARINE - CUVEE PREMIUM', 'Champagne / Champagne AOC ', '', 'Un tourbillon de plaisir à regarder ET à déguster !\n\nD''une grande légèreté et d''une agréable fraîcheur, il laisse échapper de ses fines fines bulles de subtils arômes de fleur de tilleul, de citronnelle, d''orange amère et de coing. Envoûtant de la bouteille au verre, ce champagne n''est qu''élégance !', '', 4, 15, 1),
(187, 'CHAMPAGNE MUMM CORDON ROUGE ', 'Champagne / Champagne AOC ', '', 'L’une des plus célèbres maisons de champagne !\n\nSouple et très fruité ce champagne universel et bien composé offre des arômes de fruits frais, d’abricots secs, de zestes d’agrumes et de brioche grillée. Etendard de l’excellence de la Maison MUMM, la cuvée Mumm Cordon Rouge régale ses amateurs par sa fraîcheur, son intensité et sa constance gustative.', '', 4, 15, 1),
(188, ' CHAMPAGNE BRIMONCOURT - BRUT REGENCE', 'Champagne / Champagne AOC ', '', 'Légèreté, élégance et partage pour ce champagne audacieux !\n\nLa cuvée "Brut Régence" incarne l’esprit et la signature de la jeune Maison Brimoncourt. Ce champagne issu d’un assemblage dominé par l’élégance du Chardonnay propose une belle mousse généreuse au moment du service. Son nez frais et fruité dévoile une belle rondeur en bouche ainsi qu''une structure ample et harmonieuse portée par une superbe longueur. Un Champagne fin, galant, de belle facture qui invite au partage !', '', 4, 15, 1),
(189, ' CHAMPAGNE LE BRUN DE NEUVILLE - CUVEE AUTHENTIQUE', 'Champagne / Champagne AOC', '', 'La presse internationale est unanime : une cuvée de plaisir et de gourmandise\n\nLe dosage de cette cuvée favorise l''expression des arômes d''agrumes, de fruits secs, de noisette et d''amande grillée. Les dégustateurs pourront apprécier sa fraîcheur éclatante, son parfum évoquant la crème, la brioche et les épices. La cuvée Authentique de la maison Le Brun de Neuville est marquée par un retour aux techniques anciennes de champagnisation : une vinification traditionnelle, une fermentation malolactique, et un tirage sous bouchage liège.', '', 4, 15, 1),
(190, ' DIAMANT BRUT - CHAMPAGNE VRANKEN', 'Champagne / Champagne AOC ', '', 'Luxe et élégance, du flacon à la dégustation !!!\n\nDe fines bulles onctueuses pétillent dans le verre et des intenses senteurs végétales et boisées s’échappent délicatement du  magnifique flacon, rappelant les prismes d’un diamant. La dégustation promet un  voyage gustatif sous le signe du luxe. L’effervescence frivole flatte le palais tout en élégance ; la bouche est empreinte de notes de fruits sirupeux et de saveurs briochées sur une finale légèrement musquée. Ce champagne d’une classe folle fera son petit effet à l’apéritif ou à un cocktail dînatoire !', '', 4, 15, 1),
(191, 'MOSCATO RAFFAELO - RAPHAEL DAL BO', 'Vénétie /  Blanc ', '', 'Un Moscato très gourmand, délicieusement fruité. Craquez sans compter pour ce vin finement pétillant ...\n\nCette cuvée a séduit à l''unanimité nos sommeliers pour ces fabuleux arômes de pomme, de poire qui se poursuivent en bouche au travers de fines bulles. Ses effluves de fleurs d''orangers vous emporte de suite dans un petit coin d''Italie. Fraîcheur…Douceur...Juste ce qu’il faut pour partager un vrai moment de bonheur !!!', '', 4, 14, 1);

-- --------------------------------------------------------

--
-- Structure de la table `wines_categories`
--

CREATE TABLE `wines_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='catégories de vins';

--
-- Contenu de la table `wines_categories`
--

INSERT INTO `wines_categories` (`id`, `name`) VALUES
(1, 'vins rouges'),
(2, 'vins blancs'),
(3, 'vins rosés'),
(4, 'effervescents');

-- --------------------------------------------------------

--
-- Structure de la table `wines_genres`
--

CREATE TABLE `wines_genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='genres des vins';

--
-- Contenu de la table `wines_genres`
--

INSERT INTO `wines_genres` (`id`, `name`, `id_categorie`) VALUES
(1, 'rouge fruité', 1),
(2, 'rouge puissant', 1),
(3, 'rouge boisé', 1),
(4, 'rouge souple', 1),
(5, 'rouge sucré', 1),
(6, 'blanc fruité', 2),
(7, 'blanc puissant', 2),
(8, 'blanc sucré', 2),
(9, 'blanc souple', 2),
(10, 'blanc sec', 2),
(11, 'rosé fruité', 3),
(12, 'rosé puissant', 3),
(13, 'rosé sucré', 3),
(14, 'effervescent rouge', 4),
(15, 'effervescent blanc', 4),
(16, 'effervescent rosé', 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `genres_associations`
--
ALTER TABLE `genres_associations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies_genres`
--
ALTER TABLE `movies_genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_notes_comments`
--
ALTER TABLE `users_notes_comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_preferences`
--
ALTER TABLE `users_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wines_categories`
--
ALTER TABLE `wines_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wines_genres`
--
ALTER TABLE `wines_genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `genres_associations`
--
ALTER TABLE `genres_associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
--
-- AUTO_INCREMENT pour la table `movies_genres`
--
ALTER TABLE `movies_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13055;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users_notes_comments`
--
ALTER TABLE `users_notes_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users_preferences`
--
ALTER TABLE `users_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wines`
--
ALTER TABLE `wines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT pour la table `wines_categories`
--
ALTER TABLE `wines_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `wines_genres`
--
ALTER TABLE `wines_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
