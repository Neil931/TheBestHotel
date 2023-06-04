-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 11 avr. 2023 à 16:26
-- Version du serveur : 10.3.38-MariaDB-0+deb10u1
-- Version de PHP : 7.3.31-1~deb10u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elysy1942386`
--

-- --------------------------------------------------------

--
-- Structure de la table `neil_booking`
--

CREATE TABLE `neil_booking` (
  `booking_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `numPeople` int(11) NOT NULL,
  `total_payment` decimal(19,2) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `htl_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_booking`
--

INSERT INTO `neil_booking` (`booking_id`, `cust_id`, `arrival`, `departure`, `numPeople`, `total_payment`, `payment_id`, `room_id`, `htl_id`, `staff_id`) VALUES
(4, 1, '2022-12-01 18:34:29', '2022-12-02 18:34:29', 2, 200.00, 1, 1, 4, 1),
(5, 2, '2022-12-08 18:35:25', '2022-12-09 18:35:25', 1, 100.00, 1, 2, 5, 1),
(35, 43, '2023-04-04 00:00:00', '2023-04-05 00:00:00', 3, 100.00, 3, 1, 5, 2),
(36, 42, '2023-04-10 00:00:00', '2023-04-17 00:00:00', 2, 1050.00, 1, 2, 4, 1),
(37, 43, '2023-04-04 00:00:00', '2023-04-12 00:00:00', 3, 800.00, 3, 1, 5, 2),
(38, 43, '2023-04-04 00:00:00', '2023-04-20 00:00:00', 3, 1600.00, 3, 1, 5, 2),
(39, 43, '2023-04-04 00:00:00', '2023-04-13 00:00:00', 3, 900.00, 3, 1, 5, 2),
(40, 42, '2023-04-10 00:00:00', '2023-04-17 00:00:00', 2, 1050.00, 1, 2, 4, 1),
(41, 42, '2023-04-20 00:00:00', '2023-04-29 00:00:00', 2, 900.00, 3, 1, 4, 1),
(42, 44, '2023-04-12 00:00:00', '2023-04-18 00:00:00', 2, 600.00, 3, 1, 4, 1),
(43, 45, '2023-04-25 00:00:00', '2023-04-25 00:00:00', 1, 0.00, 1, 1, 4, 1),
(44, 46, '2023-04-03 00:00:00', '2023-04-10 00:00:00', 1, 1050.00, 2, 2, 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `neil_checkout`
--

CREATE TABLE `neil_checkout` (
  `checkout_id` int(11) NOT NULL,
  `checktime` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_checkout`
--

INSERT INTO `neil_checkout` (`checkout_id`, `checktime`, `status_id`, `booking_id`, `staff_id`) VALUES
(1, '2022-12-02 11:37:50', 1, 4, 2),
(2, '2022-12-09 18:38:58', 1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `neil_country`
--

CREATE TABLE `neil_country` (
  `country_id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name_country` varchar(80) NOT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_country`
--

INSERT INTO `neil_country` (`country_id`, `iso`, `name_country`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'ZA', 'Afrique-du-Sud', 27),
(3, 'al', 'Albanie', 355),
(4, 'dz', 'Algerie', 213),
(5, 'de', 'Allemagne', 49),
(6, 'ad', 'Andorre', 376),
(7, 'gb', 'Angleterre', 44),
(8, 'ao', 'Angola', 244),
(9, 'ai', 'Anguilla', 1264),
(10, 'ag', 'Antigua-et-Barbuda', 1268),
(11, 'an', 'Antilles-neerlande', 599),
(12, 'sa', 'Arabie-Saoudite', 966),
(13, 'ar', 'Argentine', 54),
(14, 'am', 'Armenie', 374),
(15, 'aw', 'Aruba', 297),
(16, 'au', 'Australie', 61),
(17, 'at', 'Autriche', 43),
(18, 'az', 'Azerbaidjan', 994),
(19, 'bs', 'Bahamas', 1242),
(20, 'bh', 'Bahrein', 973),
(21, 'bd', 'Bangladesh', 880),
(22, 'bb', 'Barbade', 1246),
(23, 'be', 'Belgique', 32),
(24, 'bz', 'Belize', 501),
(25, 'bj', 'Benin', 229),
(26, 'bm', 'Bermudes', 1441),
(27, 'bt', 'Bhoutan', 975),
(28, 'by', 'Bielorussie', 375),
(29, 'bo', 'Bolivie', 591),
(30, 'ba', 'Bosnie', 387),
(31, 'bw', 'Botswana', 267),
(32, 'br', 'Bresil', 55),
(33, 'bn', 'Brunei', 673),
(34, 'bg', 'Bulgarie', 359),
(35, 'bf', 'Burkina-Faso', 226),
(36, 'bi', 'Burundi', 257),
(37, 'kh', 'Cambodge', 855),
(38, 'cm', 'Cameroun', 237),
(39, 'ca', 'Canada', 1),
(40, 'cv', 'Cap-Vert', 238),
(41, 'cl', 'Chili', 56),
(42, 'cn', 'Chine', 86),
(43, 'cy', 'Chypre', 357),
(44, 'co', 'Colombie', 57),
(45, 'km', 'Comores', 269),
(46, 'cg', 'Congo', 242),
(47, 'kr', 'Coree-du-Sud', 82),
(48, 'cr', 'Costa-Rica', 506),
(49, 'ci', 'Cote-d-Ivoire', 225),
(50, 'hr', 'Croatie', 385),
(51, 'cu', 'Cuba', 53),
(52, 'dk', 'Danemark', 45),
(53, 'dj', 'Djibouti', 253),
(54, 'dm', 'Dominique', 1767),
(55, 'gb', 'Ecosse', 44),
(56, 'eg', 'Egypte', 20),
(57, 'ae', 'Emirats-Arabes-Unis', 971),
(58, 'ec', 'Equateur', 593),
(59, 'er', 'Erythree', 291),
(60, 'es', 'Espagne', 34),
(61, 'ee', 'Estonie', 372),
(62, 'us', 'Etats-Unis', 1),
(63, 'et', 'Ethiopie', 251),
(64, 'fi', 'Finlande', 358),
(65, 'fr', 'France', 33),
(66, 'ga', 'Gabon', 241),
(67, 'gm', 'Gambie', 220),
(68, 'ge', 'Georgie', 995),
(69, 'gh', 'Ghana', 233),
(70, 'gi', 'Gibraltar', 350),
(71, 'gr', 'Grece', 30),
(72, 'gd', 'Grenade', 1473),
(73, 'gl', 'Groenland', 299),
(74, 'fr', 'Guadeloupe', 590),
(75, 'gt', 'Guatemala', 502),
(76, 'gn', 'Guinee', 224),
(77, 'gq', 'Guinee-Equatoriale', 240),
(78, 'gw', 'Guinee-Bissau', 245),
(79, 'gy', 'Guyana', 592),
(80, 'fr', 'Guyane', 594),
(81, 'ht', 'Haiti', 509),
(82, 'hn', 'Honduras', 504),
(83, 'hk', 'Hong-Kong', 852),
(84, 'hu', 'Hongrie', 36),
(85, 'sh', 'Ile-Ascencion', 247),
(86, 'cx', 'Iles-Christmas', -61),
(87, 'mh', 'Iles-Marshall', 692),
(88, 'mu', 'Ile-Maurice', 230),
(89, 'sb', 'Ile-Salomon', 677),
(90, 'ky', 'Iles-Cayman', 1345),
(91, 'ck', 'Iles-Cook', 682),
(92, 'fk', 'Falklands-Malouines', 500),
(93, 'fo', 'iles-feroe', 298),
(94, 'fj', 'Iles-Fidji', 679),
(95, 'mp', 'Iles-Mariannes', 1670),
(96, 'tc', 'Turks-et-Caicos', 1649),
(97, 'vg', 'Iles-Vierges-GB', 1284),
(98, 'vi', 'Iles-ViergesGB', 1340),
(99, 'in', 'Inde', 91),
(100, 'id', 'Indonesie', 62),
(101, 'iq', 'Irak', 964),
(102, 'ie', 'Irlande', 353),
(103, 'gb', 'Irlande-du-Nord', 45),
(104, 'il', 'Israel', 972),
(105, 'it', 'Italie', 39),
(106, 'jm', 'Jamaïque', 1876),
(107, 'jp', 'Japon', 81),
(108, 'jo', 'Jordanie', 962),
(109, 'kz', 'Kazakhstan', 7),
(110, 'ke', 'Kenya', 254),
(111, 'kg', 'Kirghizistan', 996),
(112, 'ki', 'Kiribati', 686),
(113, 'xk', 'Kosovo', 381),
(114, 'kw', 'Koweit', 965),
(115, 'ls', 'Lesotho', 266),
(116, 'lv', 'Lettonie', 371),
(117, 'lb', 'Liban', 961),
(118, 'lr', 'Liberia', 231),
(119, 'ly', 'Libye', 218),
(120, 'li', 'Liechtenstein', 423),
(121, 'lt', 'Lituanie', 370),
(122, 'lu', 'Luxembourg', 352),
(123, 'mo', 'Macao', 853),
(124, 'mk', 'Macedoine', 389),
(125, 'mg', 'Madagascar', 261),
(126, 'my', 'Malaisie', 60),
(127, 'mw', 'Malawi', 265),
(128, 'mv', 'Maldives', 960),
(129, 'ml', 'Mali', 223),
(130, 'mt', 'Malte', 356),
(131, 'ma', 'Maroc', 212),
(132, 'fr', 'laMartinique', 596),
(133, 'mr', 'Mauritanie', 222),
(134, 'fr', 'Mayotte', 262),
(135, 'mx', 'Mexique', 52),
(136, 'fm', 'Micronesie', 691),
(137, 'mc', 'Monaco', 377),
(138, 'mn', 'Mongolie', 976),
(139, 'me', 'Montenegro', 382),
(140, 'ms', 'Montserrat', 1664),
(141, 'mz', 'Mozambique', 258),
(142, 'mm', 'Birmanie', 95),
(143, 'na', 'Namibie', 264),
(144, 'nr', 'Nauru', 674),
(145, 'np', 'Nepal', 977),
(146, 'ni', 'Nicaragua', 505),
(147, 'ne', 'Niger', 227),
(148, 'ng', 'Nigeria', 234),
(149, 'nu', 'Niue', 683),
(150, 'no', 'Norvege', 47),
(151, 'nc', 'Nouvelle-Caledonie', 687),
(152, 'nz', 'Nouvelle-Zelande', 64),
(153, 'om', 'Oman', 968),
(154, 'ug', 'Ouganda', 256),
(155, 'uz', 'Ouzbekistan', 998),
(156, 'pk', 'Pakistan', 92),
(157, 'pw', 'Palau', 680),
(158, 'ps', 'Palestine', 970),
(159, 'pa', 'Panama', 507),
(160, 'pg', 'Papouasie-Nouvelle-Guinee', 675),
(161, 'py', 'Paraguay', 595),
(162, 'gb', 'Pays-des-Galles', 46),
(163, 'nl', 'Pays-Bas', 31),
(164, 'pe', 'Perou', 51),
(165, 'ph', 'Philippines', 63),
(166, 'pl', 'Pologne', 48),
(167, 'fr', 'polynesiefrancaise', 689),
(168, 'pr', 'Puerto-Rico', 1),
(169, 'pt', 'Portugal', 351),
(170, 'qa', 'Qatar', 974),
(171, 'cf', 'Republique-Centrafricaine', 236),
(172, 'md', 'Moldavie', 373),
(173, 'cd', 'Congo-RDC', 243),
(174, 'do', 'Republique-Dominicaine', 1809),
(175, 'ir', 'Iran', 98),
(176, 'kp', 'CoreeduNord', 850),
(177, 'la', 'Laos', 856),
(178, 'cz', 'Republique-Tcheque', 420),
(179, 'fr', 'la-reunion', 262),
(180, 'ro', 'Roumanie', 40),
(181, 'gb', 'Royaume-Uni', 44),
(182, 'ru', 'Russie', 7),
(183, 'rw', 'Rwanda', 250),
(184, 'kn', 'St-Kitts', 1869),
(185, 'pm', 'saint-pierre-et-miquelon', 508),
(186, 'vc', 'St-Vincent-et-lesGrenadines', 1784),
(187, 'sh', 'Sainte-Helene', 290),
(188, 'lc', 'Sainte-Lucie', 1758),
(189, 'sm', 'Saint-Marin', 378),
(190, 'sv', 'Salvador', 503),
(191, 'ws', 'Samoa-occidental', 685),
(192, 'st', 'SaoTome-et-Principe', 239),
(193, 'sn', 'Senegal', 221),
(194, 'rs', 'Serbie', 381),
(195, 'sc', 'Seychelles', 248),
(196, 'sl', 'SierraLeone', 232),
(197, 'sg', 'Singapour', 65),
(198, 'sk', 'Slovaquie', 421),
(199, 'si', 'Slovenie', 386),
(200, 'so', 'Somalie', 252),
(201, 'sd', 'Soudan', 249),
(202, 'lk', 'SriLanka', 94),
(203, 'sd', 'Soudan-du-Sud', 211),
(204, 'se', 'Suede', 46),
(205, 'ch', 'Suisse', 41),
(206, 'sr', 'Surinam', 597),
(207, 'sz', 'Swaziland', 268),
(208, 'sy', 'Syrie', 963),
(209, 'tj', 'Tadjikistan', 992),
(210, 'tw', 'Taiwan', 886),
(211, 'tz', 'Tanzanie', 255),
(212, 'td', 'Tchad', 235),
(213, 'io', 'Diego-Garcia', 246),
(214, 'th', 'Thailande', 66),
(215, 'tl', 'Timor-oriental', 670),
(216, 'tg', 'Togo', 228),
(217, 'tk', 'tokelau', 690),
(218, 'to', 'Tonga', 676),
(219, 'tt', 'TrinidadetTobago', 1868),
(220, 'tn', 'Tunisie', 216),
(221, 'tm', 'Turkmenistan', 993),
(222, 'tr', 'Turquie', 90),
(223, 'tv', 'Tuvalu', 688),
(224, 'ua', 'Ukraine', 380),
(225, 'uy', 'Uruguay', 598),
(226, 'vu', 'Vanuatu', 678),
(227, 'va', 'Vatican', 397),
(228, 've', 'Venezuela', 58),
(229, 'vn', 'Vietnam', 84),
(230, 'wf', 'wallis-et-futuna', 681),
(231, 'ye', 'Yemen', 967),
(232, 'zm', 'Zambie', 260),
(233, 'zw', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Structure de la table `neil_customer`
--

CREATE TABLE `neil_customer` (
  `cust_id` int(11) NOT NULL,
  `cust_gender_id` int(11) NOT NULL,
  `cust_first_name` varchar(20) NOT NULL,
  `cust_last_name` varchar(20) NOT NULL,
  `cust_address1` varchar(40) NOT NULL,
  `cust_address2` varchar(40) DEFAULT NULL,
  `cust_address3` varchar(40) DEFAULT NULL,
  `cust_zipcode` varchar(20) NOT NULL,
  `cust_city_name` varchar(20) NOT NULL,
  `cust_country_id` int(11) NOT NULL,
  `cust_phone_num` varchar(20) NOT NULL,
  `cust_email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_customer`
--

INSERT INTO `neil_customer` (`cust_id`, `cust_gender_id`, `cust_first_name`, `cust_last_name`, `cust_address1`, `cust_address2`, `cust_address3`, `cust_zipcode`, `cust_city_name`, `cust_country_id`, `cust_phone_num`, `cust_email`) VALUES
(1, 1, 'DUPONT', 'HENRI', '9 RUE DES GRAVILLIER', NULL, NULL, '75003', '', 65, '0645675689', 'xxxx@hotmail.com'),
(7, 1, 'NEIL', 'SAIDI', '9 IMPASSE DES CHAMPS DERNIERS', '9 IMPASSE DES CHAMPS DERNIERS', '9 IMPASSE DES CHAMPS DERNIERS', '95320', 'ST LEU LA FORET', 65, '', 'hafsaidi@gmail.com'),
(13, 2, 'test', 'SAIDI', '9 IMPASSE DES CHAMPS DERNIERS', '9 IMPASSE DES CHAMPS DERNIERS', '9 IMPASSE DES CHAMPS DERNIERS', '95320', 'ST LEU LA FORET', 1, '', 'hafsaidi@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `neil_gender`
--

CREATE TABLE `neil_gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_gender`
--

INSERT INTO `neil_gender` (`gender_id`, `gender_name`) VALUES
(1, 'M.'),
(2, 'Mme'),
(3, 'Mle');

-- --------------------------------------------------------

--
-- Structure de la table `neil_hotel`
--

CREATE TABLE `neil_hotel` (
  `htl_id` int(11) NOT NULL,
  `htl_name` varchar(20) NOT NULL,
  `htl_address1` varchar(20) NOT NULL,
  `htl_address2` varchar(20) DEFAULT NULL,
  `htl_address3` varchar(20) DEFAULT NULL,
  `htl_zipcode` varchar(20) NOT NULL,
  `htl_city_name` varchar(20) NOT NULL,
  `htl_country_id` int(11) NOT NULL,
  `htl_phone_contact` varchar(20) DEFAULT NULL,
  `htl_email_contact` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_hotel`
--

INSERT INTO `neil_hotel` (`htl_id`, `htl_name`, `htl_address1`, `htl_address2`, `htl_address3`, `htl_zipcode`, `htl_city_name`, `htl_country_id`, `htl_phone_contact`, `htl_email_contact`) VALUES
(4, 'HOTEL PARIS', 'X IMPASSE DES CHAMPS', NULL, NULL, '60230', 'CHAMBLY', 65, '0647890034', 'contact@hotel1.com'),
(5, 'HOTEL PARERA', '9 DEL LA PASSA', NULL, NULL, '9230', 'PARERA', 41, '0657456923', 'contact@hotel2.com'),
(6, 'HOTEL PRINCE', 'AD1', 'AD2', 'AD3', '75003', 'paris', 65, '085678043', 'far@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `htlpurchase`
--

CREATE TABLE `neil_htlpurchase` (
  `htl_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dates_purchase` datetime DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_htlpurchase`
--

INSERT INTO `neil_htlpurchase` (`htl_id`, `product_id`, `dates_purchase`, `quantity`) VALUES
(4, 3, '2022-11-01 18:47:13', 20),
(5, 1, '2022-11-17 18:50:05', 5);

-- --------------------------------------------------------

--
-- Structure de la table `neil_inventory`
--

CREATE TABLE `neil_inventory` (
  `htl_id` int(11) NOT NULL,
  `date_inventory` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_inventory`
--

INSERT INTO `neil_inventory` (`htl_id`, `date_inventory`, `product_id`, `quantity`) VALUES
(4, '2023-01-30 18:50:35', 3, 1),
(5, '2023-01-30 18:50:47', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `neil_paymenttype`
--

CREATE TABLE `neil_paymenttype` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_paymenttype`
--

INSERT INTO `neil_paymenttype` (`payment_id`, `payment_type`) VALUES
(1, 'CARTE BANCAIRE'),
(2, 'CHEQUE'),
(3, 'ARGENT');

-- --------------------------------------------------------

--
-- Structure de la table `neil_product`
--

CREATE TABLE `neil_product` (
  `product_id` int(11) NOT NULL,
  `pvd_id` int(11) NOT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `price_product` decimal(19,2) DEFAULT 0.00,
  `description_product` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_product`
--

INSERT INTO `neil_product` (`product_id`, `pvd_id`, `reference`, `price_product`, `description_product`) VALUES
(1, 3, 'Y300', 50.00, 'DRAP '),
(2, 1, 'X400', 0.50, 'EAU'),
(3, 3, 'SERVIETTE', 10.00, 'SERVIETTE BAIN'),
(4, 3, 'T400', 4.00, 'DRAP');

-- --------------------------------------------------------

--
-- Structure de la table `neil_provider`
--

CREATE TABLE `neil_provider` (
  `pvd_id` int(11) NOT NULL,
  `pvd_name` varchar(20) NOT NULL,
  `pvd_address1` varchar(20) NOT NULL,
  `pvd_address2` varchar(20) DEFAULT NULL,
  `pvd_address3` varchar(20) DEFAULT NULL,
  `pvd_zipcode` varchar(20) NOT NULL,
  `pvd_city_name` varchar(20) NOT NULL,
  `pvd_country_id` int(11) NOT NULL,
  `pvd_contact_name` varchar(20) NOT NULL,
  `pvd_phone_num` varchar(20) NOT NULL,
  `pvd_email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `neil_provider` (`pvd_id`, `pvd_name`, `pvd_address1`, `pvd_address2`, `pvd_address3`, `pvd_zipcode`, `pvd_city_name`, `pvd_country_id`, `pvd_contact_name`, `pvd_phone_num`, `pvd_email`) VALUES
(1, 'WATER', '23 RUE DE GRENOBLE', NULL, NULL, '95400', 'TAVERNY', 65, 'VASSEUR', '0656789045', 'contact@water.fr'),
(3, 'LINGE', '45 RUE DE CONSTANTIN', NULL, NULL, '83500', 'CANNES', 65, 'IGLESIAS', '0646769035', 'contact@linge.fr'),
(4, 'PLOMBERIE PARIS', '3 RUE DES RIGOLES', NULL, NULL, '75020', 'PARIS', 65, 'SAMUEL', '0657896045', 'plmoberie@hotmail.com'),
(5, 'ELYSYS', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '75007', 'PARIS', 65, 'SAIDI HAFEDH', '0634577758', 'hafsaidi@gmail.com'),
(6, 'ELYSYS', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '75007', 'PARIS', 65, 'SAIDI HAFEDH', '0634577758', 'hafsaidi@gmail.com'),
(7, 'ELYSYS', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '31 avenue de sÃ©gur', '75007', 'PARIS', 65, 'SAIDI HAFEDH', '0634577758', 'hafsaidi@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `neil_repair`
--

CREATE TABLE `neil_repair` (
  `room_id` int(11) NOT NULL,
  `htl_id` int(11) NOT NULL,
  `pvd_id` int(11) DEFAULT NULL,
  `dates_review` date NOT NULL,
  `repairtype_id` int(11) DEFAULT NULL,
  `description_repair` varchar(200) DEFAULT NULL,
  `repair_status` tinyint(4) DEFAULT 0,
  `dates_repair` datetime DEFAULT NULL,
  `amount_repair` decimal(19,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_repair`
--

INSERT INTO `neil_repair` (`room_id`, `htl_id`, `pvd_id`, `dates_review`, `repairtype_id`, `description_repair`, `repair_status`, `dates_repair`, `amount_repair`) VALUES
(1, 4, 4, '2022-12-23', 2, 'PRISE HS', 0, NULL, 0.00),
(2, 5, 4, '2022-12-23', 1, 'MITIGEUR EN PANNE', 0, NULL, 0.00);

-- --------------------------------------------------------

--
-- Structure de la table `neil_repairtype`
--

CREATE TABLE `neil_repairtype` (
  `repairtype_id` int(11) NOT NULL,
  `repairtype_descrption` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_repairtype`
--

INSERT INTO `neil_repairtype` (`repairtype_id`, `repairtype_descrption`) VALUES
(1, 'PLOMBERIE'),
(2, 'ELECTRICITE'),
(3, 'MENUISERIE');

-- --------------------------------------------------------

--
-- Structure de la table `neil_role`
--

CREATE TABLE `neil_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_role`
--

INSERT INTO `neil_role` (`role_id`, `role_name`) VALUES
(2, 'RECEPTIONNISTE'),
(4, 'GARDIEN'),
(6, 'ENTRETIEN'),
(8, 'CUISINIER');

-- --------------------------------------------------------

--
-- Structure de la table `neil_room`
--

CREATE TABLE `neil_room` (
  `room_id` int(11) NOT NULL,
  `htl_id` int(11) NOT NULL,
  `num_room` int(11) NOT NULL,
  `typeroom_id` int(11) NOT NULL,
  `num_people` int(11) NOT NULL,
  `price_room` decimal(19,2) NOT NULL,
  `surface` decimal(19,2) DEFAULT 0.00,
  `handicap` tinyint(4) DEFAULT 0,
  `vip` tinyint(4) DEFAULT 0,
  `smoking` tinyint(4) DEFAULT 0,
  `animals` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `neil_room` (`room_id`, `htl_id`, `num_room`, `typeroom_id`, `num_people`, `price_room`, `surface`, `handicap`, `vip`, `smoking`, `animals`) VALUES
(1, 4, 104, 1, 2, 100.00, 25.00, 0, 0, 0, 1),
(2, 5, 105, 2, 3, 150.00, 40.00, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `neil_staff` (
  `staff_id` int(11) NOT NULL,
  `htl_id` char(20) NOT NULL,
  `staff_gender_id` int(11) NOT NULL,
  `staff_first_name` varchar(20) NOT NULL,
  `staff_last_name` varchar(20) NOT NULL,
  `staff_address1` varchar(20) NOT NULL,
  `staff_address2` varchar(20) DEFAULT NULL,
  `staff_address3` varchar(20) DEFAULT NULL,
  `staff_zipcode` varchar(20) NOT NULL,
  `staff_city_name` varchar(20) NOT NULL,
  `staff_country_id` int(11) NOT NULL,
  `staff_phone_num` varchar(20) NOT NULL,
  `staff_email` varchar(30) DEFAULT NULL,
  `staff_role_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `dates_recruitment` date NOT NULL,
  `dates_end_contract` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `neil_staff`
--

INSERT INTO `neil_staff` (`staff_id`, `htl_id`, `staff_gender_id`, `staff_first_name`, `staff_last_name`, `staff_address1`, `staff_address2`, `staff_address3`, `staff_zipcode`, `staff_city_name`, `staff_country_id`, `staff_phone_num`, `staff_email`, `staff_role_id`, `salary`, `dates_recruitment`, `dates_end_contract`) VALUES
(1, '4', 1, 'HAF', 'SAIDI', '4 RUE DES TULIPES', NULL, NULL, '75007', 'PARIS', 65, '0678905678', 'duhamel@yahoo.fr', 2, 30000, '2015-01-05', NULL),
(2, '5', 1, 'NEIL', 'SAIDI', '5 RUE DE LA CIGOGNE', NULL, NULL, '60400', 'HERBLAY', 65, '0658505078', 'hint@yahoo.fr', 8, 20000, '2021-01-14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `neil_statuscheckout`
--

CREATE TABLE `neil_statuscheckout` (
  `status_id` int(11) NOT NULL,
  `status_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `statuscheckout`
--

INSERT INTO `neil_statuscheckout` (`status_id`, `status_type`) VALUES
(1, 'OK'),
(2, 'PENDING'),
(3, 'FALSE');

-- --------------------------------------------------------

--
-- Structure de la table `neil_typeroom`
--

CREATE TABLE `neil_typeroom` (
  `typeroom_id` int(11) NOT NULL,
  `room_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `typeroom`
--

INSERT INTO `neil_typeroom` (`typeroom_id`, `room_description`) VALUES
(1, 'T1'),
(2, 'T2'),
(3, 'T3');

-- --------------------------------------------------------

--
-- Structure de la table `neil_users`
--

CREATE TABLE `neil_users` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `neil_users` (`id`, `staff_id`, `username`, `password`) VALUES
(1, 1, 'hafedh', 'bf2f749e80c970f50552e9d5f3e8434e78b88d35'),
(2, 2, 'neil', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `neil_booking`
--
ALTER TABLE `neil_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Index pour la table `neil_checkout`
--
ALTER TABLE `neil_checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Index pour la table `neil_country`
--
ALTER TABLE `neil_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Index pour la table `neil_customer`
--
ALTER TABLE `neil_customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `cust_gender_id` (`cust_gender_id`),
  ADD KEY `cust_country_id` (`cust_country_id`);

--
-- Index pour la table `neil_gender`
--
ALTER TABLE `neil_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Index pour la table `neil_hotel`
--
ALTER TABLE `neil_hotel`
  ADD PRIMARY KEY (`htl_id`),
  ADD KEY `htl_country_id` (`htl_country_id`);

--
-- Index pour la table `neil_htlpurchase`
--
ALTER TABLE `neil_htlpurchase`
  ADD PRIMARY KEY (`htl_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `neil_inventory`
--
ALTER TABLE `neil_inventory`
  ADD PRIMARY KEY (`htl_id`,`date_inventory`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `neil_paymenttype`
--
ALTER TABLE `neil_paymenttype`
  ADD PRIMARY KEY (`payment_id`);

--
-- Index pour la table `neil_product`
--
ALTER TABLE `neil_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `pvd_id` (`pvd_id`);

--
-- Index pour la table `neil_provider`
--
ALTER TABLE `neil_provider`
  ADD PRIMARY KEY (`pvd_id`),
  ADD KEY `pvd_country_id` (`pvd_country_id`);

--
-- Index pour la table `neil_repair`
--
ALTER TABLE `neil_repair`
  ADD PRIMARY KEY (`room_id`,`htl_id`),
  ADD KEY `pvd_id` (`pvd_id`),
  ADD KEY `repairtype_id` (`repairtype_id`);

--
-- Index pour la table `neil_repairtype`
--
ALTER TABLE `neil_repairtype`
  ADD PRIMARY KEY (`repairtype_id`);

--
-- Index pour la table `neil_role`
--
ALTER TABLE `neil_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `neil_room`
--
ALTER TABLE `neil_room`
  ADD PRIMARY KEY (`room_id`,`htl_id`);

--
-- Index pour la table `neil_staff`
--
ALTER TABLE `neil_staff`
  ADD PRIMARY KEY (`staff_id`,`htl_id`),
  ADD KEY `staff_gender_id` (`staff_gender_id`),
  ADD KEY `staff_country_id` (`staff_country_id`),
  ADD KEY `staff_role_id` (`staff_role_id`);

--
-- Index pour la table `neil_statuscheckout`
--
ALTER TABLE `neil_statuscheckout`
  ADD PRIMARY KEY (`status_id`);

--
-- Index pour la table `neil_typeroom`
--
ALTER TABLE `neil_typeroom`
  ADD PRIMARY KEY (`typeroom_id`);

--
-- Index pour la table `neil_users`
--
ALTER TABLE `neil_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `neil_booking`
--
ALTER TABLE `neil_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `neil_checkout`
--
ALTER TABLE `neil_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `neil_country`
--
ALTER TABLE `neil_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT pour la table `neil_customer`
--
ALTER TABLE `neil_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `neil_gender`
--
ALTER TABLE `neil_gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `neil_hotel`
--
ALTER TABLE `neil_hotel`
  MODIFY `htl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `neil_paymenttype`
--
ALTER TABLE `neil_paymenttype`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `neil_product`
--
ALTER TABLE `neil_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `neil_provider`
--
ALTER TABLE `neil_provider`
  MODIFY `pvd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `neil_repairtype`
--
ALTER TABLE `neil_repairtype`
  MODIFY `repairtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `neil_role`
--
ALTER TABLE `neil_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `neil_room`
--
ALTER TABLE `neil_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `neil_staff`
--
ALTER TABLE `neil_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `neil_statuscheckout`
--
ALTER TABLE `neil_statuscheckout`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `neil_typeroom`
--
ALTER TABLE `neil_typeroom`
  MODIFY `typeroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `neil_users`
--
ALTER TABLE `neil_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
