-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 nov. 2022 à 12:25
-- Version du serveur : 5.5.68-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `media_photo`
--

-- --------------------------------------------------------

--
-- Structure de la table `access_user_gallery`
--
DROP TABLE IF EXISTS `access_user_gallery`;
CREATE TABLE `access_user_gallery` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `access_user_gallery`
--

INSERT INTO `access_user_gallery` (`id`, `gallery_id`, `user_id`) VALUES
(1, 9, 3),
(2, 11, 2),
(3, 16, 2),
(5, 15, 3),
(6, 12, 2),
(7, 13, 4),
(8, 20, 3),
(9, 24, 22);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `name`, `description`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(8, 'Fleurs', 'De belles fleurs de printemps...', '2022-11-14 19:34:41', '2022-11-14 20:05:46', 0, 2),
(9, 'Nature', 'La nature à un état pur...', '2022-11-14 19:35:12', '2022-11-14 19:35:12', 1, 2),
(10, 'Animaux', 'Les plus belles boules de poils...', '2022-11-14 19:35:31', '2022-11-14 19:35:31', 0, 2),
(11, 'Genshin Impact', 'Genshin Impact Games', '2022-11-14 19:35:55', '2022-11-14 19:35:55', 1, 3),
(12, 'voitures', 'c', '2022-11-14 19:37:22', '2022-11-15 09:00:27', 0, 4),
(13, 'CHAT', 'J', '2022-11-14 19:40:38', '2022-11-14 19:54:18', 1, 3),
(14, 'Vidéo games', 'Monster Hunter all generation', '2022-11-14 19:43:12', '2022-11-14 19:43:12', 0, 3),
(15, 'été', 'c\'est la saison d\'été !', '2022-11-14 19:43:14', '2022-11-14 19:43:14', 1, 4),
(16, 'UnOrdinary', 'BD fanart', '2022-11-14 19:45:26', '2022-11-14 19:45:26', 0, 3),
(17, 'Dead By Daylight', 'DBD content', '2022-11-14 19:50:26', '2022-11-14 19:50:26', 0, 3),
(18, 'LESSERAFIM', 'Girl group 2022', '2022-11-14 22:53:39', '2022-11-14 23:00:47', 0, 4),
(19, 'NewJeans', 'K-pop girl group 2022', '2022-11-14 23:02:17', '2022-11-14 23:02:17', 0, 4),
(20, 'Nancy', 'Place Stan', '2022-11-14 23:14:31', '2022-11-14 23:14:31', 0, 2),
(21, 'Centre Pompidou Paris', 'Voyage de 2022', '2022-11-15 08:16:41', '2022-11-15 08:16:41', 0, 4),
(22, 'Cite du train Mulhouse', 'Voyage de 2022', '2022-11-15 08:22:03', '2022-11-15 08:22:03', 0, 4),
(23, 'Gérardmer Vosges', 'Voyage de 2019', '2022-11-15 08:38:24', '2022-11-15 08:38:24', 0, 3),
(24, 'Xiao fan', 'Xiao genshin impact ', '2022-11-15 08:45:13', '2022-11-15 08:45:13', 0, 2),
(26, 'chien', 'C\'est mon chien blue !!', '2022-11-15 09:16:59', '2022-11-15 09:31:23', 0, 4),
(27, 'Musée de l\'auto Mulhouse', 'Voyage de 2022', '2022-11-15 09:36:49', '2022-11-15 09:36:49', 0, 3),
(28, 'Snake', 'Snaaake', '2022-11-15 09:39:09', '2022-11-15 09:39:09', 0, 22),
(29, 'Wallpaper', 'Genshin Impact', '2022-11-15 09:41:25', '2022-11-15 09:58:46', 1, 22),
(30, 'Pokemon', 'Eevee and evolution', '2022-11-15 09:45:37', '2022-11-15 09:45:37', 0, 22),
(31, 'Dragon', 'Dragons', '2022-11-15 09:47:21', '2022-11-15 09:47:21', 0, 22),
(32, 'Sunset', 'Coucher de soleil', '2022-11-15 09:48:26', '2022-11-15 09:48:26', 0, 2),
(33, 'Troyes', 'photos de cathédrale', '2022-11-15 09:53:24', '2022-11-15 09:53:24', 0, 2),
(34, 'Wallpaper desktop', 'des fonds decran magnifiques', '2022-11-15 09:57:48', '2022-11-15 09:57:48', 0, 3),
(36, 'Kuki Shinobu', 'Best Healer of the game', '2022-11-15 10:17:00', '2022-11-15 10:17:00', 1, 22),
(37, 'Soleil', 'C\'est magnifique !', '2022-11-15 10:20:13', '2022-11-15 10:20:13', 0, 20),
(39, 'ezze', 'ezeza', '2022-11-15 11:48:10', '2022-11-15 11:48:10', 0, 29);

-- --------------------------------------------------------

--
-- Structure de la table `gallery_to_tag`
--
DROP TABLE IF EXISTS `gallery_to_tag`;
CREATE TABLE `gallery_to_tag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery_to_tag`
--

INSERT INTO `gallery_to_tag` (`id`, `tag_id`, `gallery_id`) VALUES
(19, 40, 9),
(20, 42, 11),
(21, 43, 11),
(22, 44, 12),
(23, 51, 12),
(24, 59, 15),
(25, 60, 15),
(26, 61, 15),
(27, 66, 16),
(28, 67, 16),
(29, 70, 15),
(30, 71, 13),
(31, 72, 8),
(32, 73, 18),
(33, 74, 18),
(34, 75, 18),
(35, 76, 19),
(36, 77, 19),
(37, 83, 19),
(38, 84, 20),
(39, 85, 21),
(40, 87, 22),
(41, 88, 22),
(42, 91, 22),
(43, 94, 23),
(44, 95, 24),
(45, 97, 24),
(46, 98, 24),
(47, 99, 24),
(48, 111, 10),
(52, 122, 27),
(53, 123, 28),
(54, 124, 28),
(56, 126, 29),
(57, 127, 28),
(58, 128, 30),
(59, 130, 28),
(60, 131, 31),
(62, 133, 31),
(63, 150, 34),
(64, 151, 34),
(68, 160, 36),
(69, 161, 36),
(70, 164, 37);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--
DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `type` text,
  `file` text,
  `added_date` datetime DEFAULT NULL,
  `gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`picture_id`, `type`, `file`, `added_date`, `gallery_id`) VALUES
(36, 'jpg', '1c78a30eaeb04c1a615ba22ac197610a.jpg', NULL, 11),
(37, 'jpg', '1ce5d0de84593c7f6f7df182c0fb15bf.jpg', NULL, 11),
(38, 'jpg', '2c58820bcb92d45275506a84661f7919.jpg', NULL, 11),
(39, 'jpg', '1144794.jpg', NULL, 11),
(40, 'jpg', 'Screenshot_20221103-191601__01.jpg', NULL, 11),
(41, 'png', 'unknown-4.png', NULL, 11),
(42, 'jpg', '1663f25af62790a4db99b9035dfd92e9.jpg', NULL, 11),
(43, 'jpg', '339271f071ac033f5ed75a28d64f295c.jpg', NULL, 11),
(44, 'jpg', 'ferrari.jpg', NULL, 12),
(45, 'jpg', 'mercedes.jpg', NULL, 12),
(46, 'jpg', 'porsh.jpg', NULL, 12),
(47, 'jpg', 'flowers-g513b9b481_1280.jpg', NULL, 9),
(48, 'jpg', '1140729.jpg', NULL, 14),
(49, 'jpg', 'Fatalis.jpg', NULL, 14),
(50, 'jpg', 'Fatalis2.jpg', NULL, 14),
(51, 'jpg', 'wallpaper.jpg', NULL, 14),
(52, 'jpg', 'wallpaper2.jpg', NULL, 14),
(53, 'jpg', 'ananas.jpg', NULL, 15),
(54, 'jpg', 'lunettes.jpg', NULL, 15),
(55, 'jpg', 'soleil.jpg', NULL, 15),
(56, 'jpg', '1c460b28a3c9e47b581b9402aa1c43e4.jpg', NULL, 16),
(57, 'jpg', '245b9a209ed8892b3c4bd7957db80817.jpg', NULL, 16),
(58, 'jpg', 'aeeb672703d46b721e46f249418a398d.jpg', NULL, 16),
(59, 'jpg', 'bc7511814834bebf37d25b198615255f.jpg', NULL, 16),
(60, 'jpg', 'c1ddfc4025f8b0082f19ccbed0eaf0d3.jpg', NULL, 16),
(61, 'jpg', 'd4e19e6d490b4d1aca98d5030c01c48e.jpg', NULL, 16),
(62, 'jpg', 'd6d578e783ba5bd8796c433ca940756c.jpg', NULL, 16),
(63, 'jpg', 'imagdzaes.jpg', NULL, 13),
(64, 'jpg', 'inAex.jpg', NULL, 13),
(65, 'jpg', 'index.jpg', NULL, 13),
(67, 'jpg', 'inEZEdex.jpg', NULL, 13),
(68, 'jpg', 'fox-g55940dc1e_1920.jpg', NULL, 10),
(70, 'jpg', 'cherry-blossom-tree-g8cbf24bb5_1920.jpg', NULL, 8),
(71, 'jpg', 'le_sserafim_1214277.jpg', NULL, 18),
(72, 'jpg', 'lessera1.jpg', NULL, 18),
(73, 'jpg', 'lessera2.jpg', NULL, 18),
(74, 'jpg', 'LE-SSERAFIM-ANTIFRAGILE-DANCE-PRACTICE.jpg', NULL, 18),
(75, 'jpg', 'le_ssera_win.jpg', NULL, 18),
(76, 'jpg', 'lesserafim-live.jpg', NULL, 18),
(77, 'jpg', 'newjeans.jpg', NULL, 19),
(78, 'jpg', 'album.jpg', NULL, 19),
(79, 'jpg', 'hypeboy.jpg', NULL, 19),
(80, 'jpg', 'newjeans_161720.jpg', NULL, 19),
(81, 'jpg', 'NewJeans-Cookie-MV.jpg', NULL, 19),
(82, 'jpeg', 'IMG_20181111_100742-02_(2).jpeg', NULL, 10),
(83, 'jpg', 'carrementfleurs_fleurs_marguerite.jpg', NULL, 8),
(84, 'jpg', 'IMG_20221005_193537.jpg', NULL, 20),
(85, 'jpg', 'IMG_20221005_193735.jpg', NULL, 20),
(86, 'jpg', 'IMG_20221011_193303.jpg', NULL, 20),
(87, 'jpg', 'IMG_20221005_195324.jpg', NULL, 20),
(88, 'jpg', 'IMG_20221011_194351.jpg', NULL, 20),
(89, 'jpg', 'IMG_20221005_194324.jpg', NULL, 20),
(90, 'jpg', 'DSC_0141_(3_2).JPG', NULL, 21),
(91, 'jpg', 'DSC_0142_(3_2).JPG', NULL, 21),
(92, 'jpg', 'DSC_0145_(3_2).JPG', NULL, 21),
(93, 'jpg', 'DSC_0146_(3_2).JPG', NULL, 21),
(94, 'jpg', 'DSC_0147_(3_2).JPG', NULL, 21),
(95, 'jpg', 'DSC_0148_(3_2).JPG', NULL, 21),
(96, 'jpg', 'DSC_0149_(3_2).JPG', NULL, 21),
(97, 'jpg', 'DSC_0150_(3_2).JPG', NULL, 21),
(98, 'jpg', 'DSC_0151_(3_2).JPG', NULL, 21),
(99, 'jpg', 'DSC_0152_(3_2).JPG', NULL, 21),
(100, 'jpg', 'DSC_0154_(3_2).JPG', NULL, 21),
(101, 'jpg', 'DSC_0155_(3_2).JPG', NULL, 21),
(102, 'jpg', 'DSC_0156_(3_2).JPG', NULL, 21),
(103, 'jpg', 'DSC_0158_(3_2).JPG', NULL, 21),
(104, 'jpg', 'DSC_0162_(3_2).JPG', NULL, 21),
(105, 'jpg', 'DSC_0165_(3_2).JPG', NULL, 21),
(106, 'jpg', 'IMG_20220808_123318_(4_3).jpg', NULL, 22),
(107, 'jpg', 'IMG_20220808_123626_(4_3).jpg', NULL, 22),
(108, 'jpg', 'IMG_20220808_123959_(4_3).jpg', NULL, 22),
(109, 'jpg', 'IMG_20220808_125944_(4_3).jpg', NULL, 22),
(110, 'jpg', 'IMG_20220808_131342_(4_3).jpg', NULL, 22),
(111, 'jpg', 'IMG_20220808_131727_(4_3).jpg', NULL, 22),
(112, 'jpg', 'IMG_20220808_131821_(4_3).jpg', NULL, 22),
(113, 'jpg', 'IMG_20220808_133653_(4_3).jpg', NULL, 22),
(114, 'jpg', 'IMG_20220808_153115_(4_3).jpg', NULL, 22),
(115, 'jpg', 'IMG_20220808_152856_(4_3).jpg', NULL, 22),
(117, 'jpg', 'IMG_20220808_144758.jpg', NULL, 22),
(118, 'jpg', 'IMG_20220808_143813_(4_3).jpg', NULL, 22),
(119, 'jpg', 'IMG_20220808_142825_(4_3).jpg', NULL, 22),
(120, 'jpg', 'IMG_20220808_140730_(4_3).jpg', NULL, 22),
(121, 'jpg', 'IMG_20220808_140232_(4_3).jpg', NULL, 22),
(122, 'jpg', 'IMG_20220808_143322_(4_3).jpg', NULL, 22),
(123, 'jpg', 'DSC_0229_(3_2).JPG', NULL, 23),
(124, 'jpg', 'DSC_0231_(3_2).JPG', NULL, 23),
(125, 'jpg', 'DSC_0250_(3_2).JPG', NULL, 23),
(126, 'jpg', 'DSC_0272_(3_2).JPG', NULL, 23),
(127, 'jpg', 'DSC_0315_(3_2).JPG', NULL, 23),
(128, 'jpg', '0828e3cd5772c4d2b9b3515c936b02c7.jpg', NULL, 24),
(129, 'jpg', '1c78a30eaeb04c1a615ba22ac197610a.jpg', NULL, 24),
(130, 'jpg', '8dfe7985d4f2555b06a06f2ed2adc7dd.jpg', NULL, 24),
(131, 'jpg', '972d6b0cc43a1bee814bea653a561a78.jpg', NULL, 24),
(132, 'jpg', 'b5cf15777654649578ec40aa8f39231c.jpg', NULL, 24),
(133, 'jpg', 'bd0f7e650f204cbb11bd614dfe7f9168.jpg', NULL, 24),
(134, 'jpg', 'd98e607aa72add58239a12f1d17985a9.jpg', NULL, 24),
(135, 'jpg', 'ed990708785a8972cad6d9335186e8c5.jpg', NULL, 24),
(136, 'jpg', 'Screenshot_20221030-015854_(1).jpg', NULL, 24),
(137, 'jpg', 'Screenshot_20221103-191601__01.jpg', NULL, 24),
(138, 'png', 'unknown-3.png', NULL, 24),
(139, 'jpg', 'DSC_0322_(3_2).JPG', NULL, 23),
(154, 'jpg', '63734826a6df18.88205872.jpg', NULL, 10),
(167, 'jpg', '637349b54f2c71.91675587.jpg', NULL, 23),
(169, 'jpg', '637349d9916493.32718642.jpg', NULL, 23),
(170, 'jpg', '63734cbf26e688.21809772.jpg', NULL, 9),
(171, 'jpg', '63734d3c4102d5.36130679.jpg', NULL, 23),
(172, 'jpg', '63734d48a84565.69809252.jpg', NULL, 23),
(173, 'jpg', '63734d5808e2f2.40554242.jpg', NULL, 23),
(174, 'jpg', '63734d5d1d6f38.43666424.jpg', NULL, 26),
(175, 'jpg', '63734d682b55b6.31552378.jpg', NULL, 23),
(177, 'jpg', '63734e0452a1f4.59179225.jpg', NULL, 26),
(178, 'jpg', '63734e38750946.02262692.jpg', NULL, 26),
(179, 'jpg', '63734f4f4daad9.38120518.jpg', NULL, 26),
(180, 'jpg', '63734fb8aa3d25.90436952.jpg', NULL, 27),
(181, 'jpg', '63734fc641d4f2.30208940.jpg', NULL, 27),
(182, 'jpg', '63734fcc0d7a55.91498549.jpg', NULL, 24),
(183, 'jpg', '63734fcf609855.20839291.jpg', NULL, 27),
(184, 'jpg', '63734fdbe26408.27596987.jpg', NULL, 27),
(185, 'jpg', '63734fe5b16346.15329491.jpg', NULL, 27),
(187, 'jpg', '63734ff3479f06.15007146.jpg', NULL, 27),
(189, 'jpg', '63735005dab139.35985942.jpg', NULL, 27),
(190, 'jpg', '6373500e482004.76686078.jpg', NULL, 27),
(191, 'jpg', '6373501858dd11.90093307.jpg', NULL, 27),
(192, 'jpg', '637350286e1fb8.72985869.jpg', NULL, 27),
(193, 'jpg', '6373503a693cc1.78216913.jpg', NULL, 27),
(194, 'jpg', '6373503db9a813.64894373.jpg', NULL, 28),
(195, 'jpg', '63735044e0cb33.90192345.jpg', NULL, 27),
(196, 'jpg', '63735049268168.33763790.jpg', NULL, 28),
(197, 'jpg', '6373504f75f784.03318686.jpg', NULL, 28),
(198, 'jpg', '63735052ca7cb4.74264002.jpg', NULL, 27),
(199, 'jpg', '637350633582d7.26080841.jpg', NULL, 27),
(200, 'jpg', '6373506be13202.38295748.jpg', NULL, 28),
(201, 'jpg', '63735071d4fbc0.61201655.jpg', NULL, 28),
(202, 'jpg', '6373507a5b79b2.21128645.jpg', NULL, 28),
(204, 'jpg', '637350bc4cf478.92549168.jpg', NULL, 29),
(205, 'jpg', '63735146d21003.82674571.jpg', NULL, 29),
(206, 'jpg', '637351b4b43e07.78784184.jpg', NULL, 20),
(207, 'jpg', '637351c267af27.73804131.jpg', NULL, 30),
(208, 'jpg', '637351c79fac03.56909745.jpg', NULL, 30),
(209, 'jpg', '637351ccb5e3b4.06589026.jpg', NULL, 30),
(210, 'jpg', '637351d23927b1.35654961.jpg', NULL, 30),
(211, 'jpg', '637351d6d94c70.56242428.jpg', NULL, 30),
(212, 'jpg', '637351dec64da4.12728450.jpg', NULL, 30),
(213, 'jpg', '637351e4444e01.85032135.jpg', NULL, 30),
(214, 'jpg', '637351e984c941.13768833.jpg', NULL, 30),
(215, 'jpg', '637351eeeefea0.36896598.jpg', NULL, 30),
(216, 'jpg', '637351ff9d45b5.14829529.jpg', NULL, 30),
(217, 'jpg', '637352203f1868.78072906.jpg', NULL, 20),
(218, 'jpg', '6373524f434a62.02467171.jpg', NULL, 31),
(219, 'jpg', '6373525663b368.39504886.jpg', NULL, 31),
(220, 'jpg', '6373527123cce1.57019226.jpg', NULL, 32),
(221, 'jpg', '63735277ea3338.42900354.jpg', NULL, 32),
(222, 'jpg', '6373528518b0e8.54035129.jpg', NULL, 32),
(223, 'jpg', '63735290a53cb3.26606608.jpg', NULL, 32),
(224, 'jpg', '6373529c586994.46238918.jpg', NULL, 12),
(225, 'jpg', '637352a01e8eb7.01269331.jpg', NULL, 32),
(226, 'jpg', '637352a98f9d71.83678599.jpg', NULL, 32),
(227, 'jpg', '637352b5e7aa34.66945242.jpg', NULL, 32),
(228, 'jpg', '637352bd905f05.92318207.jpg', NULL, 32),
(229, 'jpg', '637352c5b2c7f1.03990673.jpg', NULL, 12),
(230, 'jpg', '637352d03987b2.38081819.jpg', NULL, 32),
(231, 'jpg', '637352e1553ea8.82921968.jpg', NULL, 32),
(232, 'jpg', '637352e376e056.60243504.jpg', NULL, 12),
(233, 'jpg', '637352fdd6aab8.58783589.jpg', NULL, 32),
(234, 'jpg', '63735308bbd5d3.81279247.jpg', NULL, 32),
(235, 'jpg', '6373534844e660.83581212.jpg', NULL, 12),
(236, 'jpg', '63735396786aa9.50935353.jpg', NULL, 33),
(237, 'jpg', '6373539f08d355.14315756.jpg', NULL, 33),
(238, 'jpg', '637353a673b2e3.44981613.jpg', NULL, 33),
(239, 'jpg', '637353b00c7f57.98767126.jpg', NULL, 33),
(240, 'jpg', '637353bcdefaa1.07468936.jpg', NULL, 33),
(241, 'jpg', '637353cace34e0.91357566.jpg', NULL, 33),
(242, 'jpg', '637353d50506c0.77056588.jpg', NULL, 33),
(243, 'jpg', '637353dcb4c364.09035847.jpg', NULL, 33),
(244, 'jpg', '637353e45dfdc0.54338954.jpg', NULL, 33),
(245, 'jpg', '637353f68cb1a6.36883360.jpg', NULL, 33),
(246, 'jpeg', '637354085f15f4.46021701.jpeg', NULL, 33),
(247, 'jpg', '63735419edc501.58242635.jpg', NULL, 33),
(248, 'jpg', '6373542226ba90.42242780.jpg', NULL, 33),
(249, 'jpg', '637354ae418011.83790203.jpg', NULL, 34),
(250, 'jpg', '637354bab09bb4.24158232.jpg', NULL, 34),
(251, 'jpg', '637354c46faa71.09834592.jpg', NULL, 34),
(252, 'jpg', '637354d2093da6.36135162.jpg', NULL, 34),
(253, 'jpg', '637354f6bafa15.08505704.jpg', NULL, 34),
(254, 'jpg', '63735501bbf129.55819613.jpg', NULL, 34),
(255, 'jpg', '63735510ed3ce6.89317524.jpg', NULL, 34),
(256, 'jpg', '6373551fb3df94.80523361.jpg', NULL, 34),
(257, 'jpg', '63735529e27226.13915123.jpg', NULL, 34),
(258, 'jpg', '63735533b6da57.74144966.jpg', NULL, 34),
(259, 'jpg', '63735540babc77.91732117.jpg', NULL, 34),
(260, 'jpg', '63735550f01a74.74556921.jpg', NULL, 34),
(265, 'png', '6373591e4f1695.89443777.png', NULL, 36),
(266, 'png', '637359293b0913.63242707.png', NULL, 36),
(267, 'png', '6373592e397f69.80150401.png', NULL, 36),
(268, 'png', '6373593ee26724.54662689.png', NULL, 36),
(269, 'png', '637359515dc7d2.30071982.png', NULL, 36),
(270, 'jpg', '637359e8b7ce73.91709141.jpg', NULL, 37),
(271, 'jpg', '637359fab7b1c0.07348323.jpg', NULL, 37);

-- --------------------------------------------------------

--
-- Structure de la table `picture_to_tag`
--
DROP TABLE IF EXISTS `picture_to_tag`;
CREATE TABLE `picture_to_tag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture_to_tag`
--

INSERT INTO `picture_to_tag` (`id`, `tag_id`, `picture_id`) VALUES
(8, 37, 36),
(9, 38, 36),
(10, 39, 41),
(11, 41, 43),
(12, 45, 44),
(13, 46, 44),
(14, 47, 45),
(15, 48, 47),
(16, 49, 45),
(18, 52, 44),
(19, 53, 49),
(20, 54, 48),
(21, 55, 48),
(22, 56, 48),
(23, 57, 49),
(24, 58, 51),
(25, 62, 53),
(26, 63, 53),
(27, 64, 54),
(28, 65, 53),
(29, 68, 55),
(30, 69, 55),
(31, 78, 81),
(32, 79, 79),
(33, 80, 78),
(34, 81, 73),
(35, 82, 75),
(36, 86, 99),
(37, 89, 114),
(38, 90, 115),
(39, 92, 115),
(40, 93, 118),
(41, 96, 138),
(42, 100, 128),
(43, 101, 134),
(44, 102, 136),
(45, 103, 137),
(46, 104, 137),
(48, 106, 133),
(49, 107, 128),
(50, 108, 130),
(51, 109, 134),
(52, 110, 129),
(58, 120, 123),
(59, 121, 169),
(60, 129, 87),
(61, 134, 224),
(62, 135, 224),
(63, 136, 229),
(64, 137, 229),
(65, 138, 229),
(66, 139, 232),
(67, 140, 232),
(68, 141, 220),
(69, 142, 46),
(70, 143, 220),
(71, 144, 46),
(72, 145, 234),
(73, 146, 235),
(74, 147, 228),
(75, 148, 235),
(76, 149, 227),
(77, 152, 256),
(78, 153, 257),
(79, 154, 255),
(82, 162, 266),
(83, 163, 268),
(84, 165, 270),
(85, 166, 270),
(86, 167, 271);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`tag_id`, `name`) VALUES
(37, '#XIAO'),
(38, '#Genshin Impact'),
(39, '#Kuki'),
(40, '#NATURE'),
(41, '#FLEUR'),
(42, '#Genshin Impact'),
(43, '#LOVER'),
(44, '#sport'),
(45, '#ferrari'),
(46, '#rouge'),
(47, '#mercedes'),
(48, '#SOLEIL'),
(49, '#bleu'),
(51, '#voitures'),
(52, '#voitures'),
(53, '#Fatalis'),
(54, '#Cute'),
(55, '#LOUP'),
(56, '#MH Rise'),
(57, '#Dragon'),
(58, '#Wallpaper'),
(59, '#plage'),
(60, '#goodVibe'),
(61, '#soleil'),
(62, '#plage'),
(63, '#ananas'),
(64, '#lunettes'),
(65, '#lunettes'),
(66, '#BD'),
(67, '#WEBTOON'),
(68, '#plage'),
(69, '#sable'),
(70, '#sable'),
(71, '#CHAAAAAAT'),
(72, '#fleurs'),
(73, '#kpop'),
(74, '#fearless'),
(75, '#antifragile'),
(76, '#attention'),
(77, '#cookie'),
(78, '#cookie'),
(79, '#HypeBoy'),
(80, '#album'),
(81, '#antifragile'),
(82, '#win'),
(83, '#kpop'),
(84, '#octobrerose'),
(85, '#tableaux'),
(86, '#toureiffel'),
(87, '#sncf'),
(88, '#tgv'),
(89, '#tgv'),
(90, '#corail'),
(91, '#trains'),
(92, '#intercités'),
(93, '#record'),
(94, '#foret'),
(95, '#Xiao'),
(96, '#Cute'),
(97, '#LoveXiao'),
(98, '#BestCaracter'),
(99, '#Genshin Impact'),
(100, '#Xiao'),
(101, '#wallpaper'),
(102, '#meme'),
(103, '#sleep'),
(104, '#cute'),
(106, '#wallpaper'),
(107, '#Meme'),
(108, '#StyleBD'),
(109, '#Stars'),
(110, '#Wallpaper'),
(111, '#Animaux'),
(112, '#Kuki'),
(113, '#Kuki'),
(114, '#Cute'),
(115, '#Meme'),
(116, '#Kuki'),
(117, '#PAIMON'),
(118, '#Healer'),
(119, '#Inazuma'),
(120, '#manège'),
(121, '#canard'),
(122, '#voiture'),
(123, '#Snake'),
(124, '#Venomous'),
(126, '#Genshin Impact'),
(127, '#Colors'),
(128, '#Eevee'),
(129, '#verdure'),
(130, '#Reptiles'),
(131, '#Dragons'),
(133, '#Reptiles'),
(134, '#Nissan'),
(135, '#GT R'),
(136, '#Nissan'),
(137, '#GT R'),
(138, '#Godzilla'),
(139, '#Nissan'),
(140, '#GT R'),
(141, '#chartreux'),
(142, '#4x4'),
(143, '#Troyes'),
(144, '#Porsche'),
(145, '#Bar-sur-Aube'),
(146, '#Toyota'),
(147, '#amance'),
(148, '#Supra'),
(149, '#wallpapaer'),
(150, '#violet'),
(151, '#ciel'),
(152, '#dune'),
(153, '#roses'),
(154, '#galaxie'),
(155, '#Kuki'),
(156, '#GT R'),
(157, '#Nissan'),
(158, '#Reptiles'),
(159, '#Reptilesr'),
(160, '#Kuki Shinobu'),
(161, '#Kuki'),
(162, '#Kuki'),
(163, '#Kuki'),
(164, '#Soleil'),
(165, '#lunettes'),
(166, '#lunettes de soleil'),
(167, '#chaud'),
(168, '#animeaux'),
(169, '#chien'),
(170, '#chat'),
(172, '#animeaux'),
(173, '#xjs');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text,
  `fullname` text,
  `mail_address` text,
  `password` text,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `mail_address`, `password`, `level`) VALUES
(2, 'Paulo', 'Paul Smart', 'paul@mediaphoto.com', '$2y$12$ab0daq3V64CqdK6Q5UvfBOoYs.nbShbMHO1859UqVhhgk4u3mcXea', 5),
(3, 'Gérardo', 'Gérard Menvuça', 'gerard@mediaphoto.com', '$2y$12$ZwDcq48UhVon4MUww1Su3uLJ0z8H5k4vr8Nnyi4qQ5FLw8Uq3i3ZO', 5),
(4, 'Elsa', 'Elsa Rose', 'elsa@mediaphoto.com', '$2y$12$lvc.COaKySQHhilld0RMw.wJrfIjLe2jju5RDhOhjmtnURaTKWx0.', 5),
(5, 'Pablo', 'Pablo S', 'pablo@gmail.com', '$2y$12$qeOT318X2sdotv42FZoNq.skqL.UjWNNOM0RB4EjfX12KLnQctOLe', 5),
(20, 'Patate', 'Patate Carotte', 'patate@gmail.com', '$2y$12$XSGR/uEuGdTMtAFM6oLN..o2a6pjcNoW354lsYvrnSp6qCckMcjY2', 5),
(22, 'StarCobra', 'Damien Poirot', 'adressemail@mail.com', '$2y$12$WX.GLd7r5.2wGT9fyOvgSeacpZfNyAloanfgyZZ41bP5ry1vuugTK', 5),
(29, 'léo9', 'léo Six', 'leo@gmail.com', '$2y$12$tNR6bYH0H8DwJQM9tRsrDeW8I7bpXKPNb0Dy.rT52LQUCEiGGD.sK', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `access_user_gallery`
--
ALTER TABLE `access_user_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_user_gallery_gallery_id` (`gallery_id`),
  ADD KEY `access_user_gallery_user_id` (`user_id`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `gallery_gallery_id` (`user_id`);

--
-- Index pour la table `gallery_to_tag`
--
ALTER TABLE `gallery_to_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_to_tag_tag_id` (`tag_id`),
  ADD KEY `gallery_to_tag_gallery_id` (`gallery_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `picture_gallery_id` (`gallery_id`);

--
-- Index pour la table `picture_to_tag`
--
ALTER TABLE `picture_to_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picture_to_tag_tag_id` (`tag_id`),
  ADD KEY `picture_to_tag_picture_id` (`picture_id`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `access_user_gallery`
--
ALTER TABLE `access_user_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `gallery_to_tag`
--
ALTER TABLE `gallery_to_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT pour la table `picture_to_tag`
--
ALTER TABLE `picture_to_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `access_user_gallery`
--
ALTER TABLE `access_user_gallery`
  ADD CONSTRAINT `access_user_gallery_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `access_user_gallery_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_gallery_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `gallery_to_tag`
--
ALTER TABLE `gallery_to_tag`
  ADD CONSTRAINT `gallery_to_tag_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`),
  ADD CONSTRAINT `gallery_to_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`gallery_id`);

--
-- Contraintes pour la table `picture_to_tag`
--
ALTER TABLE `picture_to_tag`
  ADD CONSTRAINT `picture_to_tag_picture_id` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `picture_to_tag_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
