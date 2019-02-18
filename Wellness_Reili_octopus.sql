-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 18 Février 2019 à 15:40
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Wellness_Reili_octopus`
--
CREATE DATABASE IF NOT EXISTS `Wellness_Reili_octopus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Wellness_Reili_octopus`;

-- --------------------------------------------------------

--
-- Structure de la table `octopus_comments`
--

CREATE TABLE `octopus_comments` (
  `comments_id` int(11) NOT NULL,
  `comments_comment` varchar(350) NOT NULL,
  `users_id` int(11) NOT NULL,
  `dateRDV_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_comments`
--

INSERT INTO `octopus_comments` (`comments_id`, `comments_comment`, `users_id`, `dateRDV_id`) VALUES
(1, 'Mon premier commentaire de batard', 20, 20),
(3, 'Rendez-vous agréable et fort sympathique. Merci', 34, 38),
(5, 'Rendez-vous agréable et fort sympathique', 34, 38);

-- --------------------------------------------------------

--
-- Structure de la table `octopus_dateRDV`
--

CREATE TABLE `octopus_dateRDV` (
  `dateRDV_id` int(11) NOT NULL,
  `dateRDV_dateRDV` date NOT NULL,
  `dateRDV_validate` tinyint(1) NOT NULL DEFAULT '0',
  `users_id` int(11) NOT NULL,
  `prestations_id` int(11) NOT NULL,
  `timeRDV_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_dateRDV`
--

INSERT INTO `octopus_dateRDV` (`dateRDV_id`, `dateRDV_dateRDV`, `dateRDV_validate`, `users_id`, `prestations_id`, `timeRDV_id`) VALUES
(7, '2019-01-31', 0, 20, 2, 2),
(11, '2019-03-19', 0, 29, 3, 2),
(13, '2019-01-31', 1, 31, 1, 3),
(18, '2019-02-28', 1, 28, 1, 2),
(20, '2019-02-27', 1, 20, 1, 1),
(23, '2019-07-19', 1, 9, 1, 1),
(24, '2019-02-08', 0, 34, 1, 2),
(25, '2019-02-21', 1, 34, 2, 3),
(26, '2019-02-08', 0, 35, 1, 2),
(27, '2019-02-08', 0, 37, 1, 2),
(28, '2019-02-14', 0, 37, 3, 2),
(29, '2019-02-09', 0, 36, 2, 3),
(30, '2020-05-21', 1, 36, 1, 1),
(33, '2019-02-20', 0, 33, 2, 1),
(35, '2019-02-14', 0, 33, 2, 4),
(36, '2019-02-15', 0, 34, 2, 3),
(37, '2019-02-26', 0, 41, 2, 4),
(38, '2019-02-17', 0, 34, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `octopus_prestations`
--

CREATE TABLE `octopus_prestations` (
  `prestations_id` int(11) NOT NULL,
  `prestations_name` varchar(50) NOT NULL,
  `prestations_description` varchar(450) NOT NULL,
  `prestations_image` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_prestations`
--

INSERT INTO `octopus_prestations` (`prestations_id`, `prestations_name`, `prestations_description`, `prestations_image`) VALUES
(1, 'Soin Reïki', 'Méthode japonaise qui permet de réduire le stress, soulager la douleur, de rééquilibreer les énergies du corps, apaise l\'esprit...\nLe procédé se déroule alongé sur une table, habillé. Echange d\'énergies par apposition des mains entre donneur et receveur.', 'card1.jpeg'),
(2, 'Soin Cristaux', 'Soins Reïki combiner avec de la lithothérapie. Ajout de pierres énergétiques au soin reïki traditionnel ce qui augmente l\'efficacité du soin.', 'card2.jpeg'),
(3, 'Massage Californien', 'Plus communément appelé le « toucher du cœur », le massage californien est une pratique psycho-corporelle datant des années 70. Le massage californien est une approche globale qui vise autant la détente que l\'éveil d\'une conscience psychocorporelle.', 'card3.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `octopus_productCategory`
--

CREATE TABLE `octopus_productCategory` (
  `productCategory_id` int(11) NOT NULL,
  `productCategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_productCategory`
--

INSERT INTO `octopus_productCategory` (`productCategory_id`, `productCategory_name`) VALUES
(1, 'Pierres'),
(2, 'Colliers'),
(3, 'Bracelets'),
(4, 'Oulala');

-- --------------------------------------------------------

--
-- Structure de la table `octopus_products`
--

CREATE TABLE `octopus_products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(50) NOT NULL,
  `products_image` varchar(150) NOT NULL,
  `products_description` varchar(220) NOT NULL,
  `products_prix` varchar(20) NOT NULL,
  `productCategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_products`
--

INSERT INTO `octopus_products` (`products_id`, `products_name`, `products_image`, `products_description`, `products_prix`, `productCategory_id`) VALUES
(1, 'pierre1', 'pierre1.jpg', 'belle piere bleu', '35', 1),
(2, 'pierre2', 'pierre2.jpg', 'belle pierre', '35', 1),
(3, 'Bracelet1', 'bracelet1.jpeg', 'un jolie bracelet', '40', 3),
(4, 'collier23', 'collier1.jpg', 'un beau collier', '38', 2),
(5, 'Trucmuch', 'card1.png', 'J\'ai faim j\'ai soif', '12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `octopus_timeRDV`
--

CREATE TABLE `octopus_timeRDV` (
  `timeRDV_id` int(11) NOT NULL,
  `timeRDV_timeRDV` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_timeRDV`
--

INSERT INTO `octopus_timeRDV` (`timeRDV_id`, `timeRDV_timeRDV`) VALUES
(1, '9h30 à 10h30'),
(2, '11h à 12h'),
(3, '14h à 15h'),
(4, '16h30 à 17h30');

-- --------------------------------------------------------

--
-- Structure de la table `octopus_typeUsers`
--

CREATE TABLE `octopus_typeUsers` (
  `typeUsers_id` int(11) NOT NULL,
  `typeUsers_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_typeUsers`
--

INSERT INTO `octopus_typeUsers` (`typeUsers_id`, `typeUsers_name`) VALUES
(1, 'Administrateur'),
(2, 'SuperUtilisateur'),
(3, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `octopus_users`
--

CREATE TABLE `octopus_users` (
  `users_id` int(11) NOT NULL,
  `users_lastname` varchar(50) NOT NULL,
  `users_firstname` varchar(50) NOT NULL,
  `users_phone` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_password` varchar(350) NOT NULL,
  `users_adress` varchar(200) DEFAULT NULL,
  `users_birthdate` date DEFAULT NULL,
  `typeUsers_id` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `octopus_users`
--

INSERT INTO `octopus_users` (`users_id`, `users_lastname`, `users_firstname`, `users_phone`, `users_email`, `users_password`, `users_adress`, `users_birthdate`, `typeUsers_id`) VALUES
(9, 'Fitz', 'Gérald', 620304050, 'fitz.gerald@fouretout.com', '$argon2i$v=19$m=1024,t=2,p=2$d3djdi5uaEdCcmNNaEZpWA$jx5QjAjUUtboXdmA/LIftWn6UAxTei3XjBlpqC8CV3Y', NULL, '2018-09-14', 2),
(11, 'Nessance', 'Eva', 987654321, 'evanessance@musique.con', '$argon2i$v=19$m=1024,t=2,p=2$M1llbUhNdWxOS0JzSEVRVQ$/E+TLogz7743m2kK6gG7ei3g8l/YJCrbnVRgIlrjQzw', NULL, NULL, 3),
(14, 'Heee', 'Arnold', 235456784, 'hearnold@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$Q05qcHBDSUNOWFMzT2I4aw$DnG9G/r0ivITAybjh6LV8kCvmlx9FJm52P0obJfKipQ', NULL, NULL, 2),
(17, 'Mitsuko', 'Rita', 235361545, 'rita.mitsuko@free.com', '$argon2i$v=19$m=1024,t=2,p=2$eHFLSXpjZC9uelJCUWJnRw$F2EkrDKadUJs6bhKomGOif4htO/1jRujfpa8r/AF01Q', NULL, NULL, 3),
(19, 'Misieu', 'Toumbola', 548274918, 'mister.toumbolo@musique.con', '$argon2i$v=19$m=1024,t=2,p=2$MGF1OGhKa09jNVo4OTRqMA$WRXj40BiqfrUhotnjFlydjbdO9baCtt2v/mWo7Ub/9Q', NULL, NULL, 3),
(20, 'DuTrentreHuit', 'Amandine', 698476139, 'francs.cfa@afrique.poo', '$argon2i$v=19$m=1024,t=2,p=2$RDlCOXR3a3padnc5UUlISw$eM0N2pR64gmIyLjj5/et8tyLwqqw+ql7OrNfZ/F5V8M', NULL, '2019-01-30', 3),
(21, 'LECTER', 'Hannibal', 675251326, 'lecter.hannibal@human.meat', '$argon2i$v=19$m=1024,t=2,p=2$SHdMV1BqMTE3dWpQZjRJUQ$MMAZcyXnyS2eJkPODhOe7Ogjb2jFiywn/u1ZSRJDa04', NULL, NULL, 3),
(23, 'MANSON', 'Charles', 123456781, 'charles.manson@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$alJQSExFNldtMGMyQ1pPbQ$xV8rCHjWZNWda9x6UqgD30eW2d0k8N3FNuC78SOdceQ', NULL, NULL, 3),
(24, 'NEESON', 'Liam', 987654321, 'neeson.liam@taken.com', '$argon2i$v=19$m=1024,t=2,p=2$VUJOLnNpUnJpWlBTSGc0Vg$zAmRX8OBdiNg7ztqlzoeowBDvu8+aGnQoYi7gtEghz4', NULL, NULL, 2),
(25, 'PARKER', 'Peter', 123789345, 'spiderman@web.ny', '$argon2i$v=19$m=1024,t=2,p=2$NXo3ZkRHNkdrZExSU3lkOQ$OGLKHy9J3GDC6aOCrMS/DEkckuvsGiU4rlB3yxUU/b4', NULL, NULL, 3),
(27, 'WAYNE', 'Bruce', 333333333, 'imbatman@bat.man', '$argon2i$v=19$m=1024,t=2,p=2$SDl1dnpTSVkwNm1KcjNNLw$3h6tqNFYVHIfx0cYWy2Gg3ZNE8gCBSRMJoQnMupWN+w', NULL, NULL, 2),
(28, 'KENT', 'Clark', 222222222, 'superman@super.man', '$argon2i$v=19$m=1024,t=2,p=2$a0M2cjdiS1BmLmFNc243cg$8516f4UbFMSih99tSlGnOV1Nm02c56qCzJR66erx9V4', NULL, NULL, 3),
(29, 'LEPERS', 'Julien', 123456781, 'julien.leperce@question.chp', '$argon2i$v=19$m=1024,t=2,p=2$Q3FiNXNJZWJ3LkFMajNmSQ$7b5juqkpopb+LYo4Cn1wd/4R5cb/gdHaFBEdW8w0jYY', NULL, NULL, 3),
(30, 'Baudelaire', 'Annie', 620304050, 'Baudelaire@forever.vpn', '$argon2i$v=19$m=1024,t=2,p=2$NjV2YzEvdnVUeFU4QUpjYg$nGv02gZnEtakEEMNomeqhNWQaZnX6gEPcMm84nZ0TFY', NULL, '2019-01-26', 2),
(31, 'DelaMolleFesse', 'Jean-Edouard', 602030405, 'DelaMolle.Fesse@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$UkJlUnozTDR3VXh5VWZpcg$mPnhTzfSkHkLKljPkhMY1z/af3Ht0KA060gcAVMSUho', NULL, NULL, 3),
(32, 'Princess', 'Fanfan', 620304050, 'fanfan@princess.con', '$argon2i$v=19$m=1024,t=2,p=2$V1FNazEueGM3YkpzblhUYQ$tIi06fRBzerYeLwaTGMJmrmba31lNxcuppRMcZka6yQ', NULL, NULL, 2),
(33, 'Levasseur', 'Atchoum', 234567687, 'badik76@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$WG9NREtkay45TzhwR0lrYQ$sOxe7SQusHQ5fw7NPJKVUeCi+mGTtbZ5ShEoqYVkkUA', NULL, '1991-06-03', 2),
(34, 'Mallet', 'Angela', 654345678, 'angela.mallet@gmail.com', '$2y$10$yebStIliBQvNHWUNvq7LPOSs1oHpyqNSrnlPkkpp.EzFcVWQrKi5C', NULL, NULL, 1),
(35, 'Yassin', 'Assinele', 623544345, 'yass.yassi@gmail.com', '$2y$10$1eEHKhZXPmqjcKpv0tz5vexy.QKHqgq59cxmXcdor2Y2.OhTiJur.', NULL, NULL, 2),
(36, 'dujardin', 'jean', 610103040, 'jeandujardin@entretient.com', '$2y$10$ShicQ4s4o.0tZrge.jg94eHcXkPW2mMd0tMdz2m.DtoRkCaxgtwqa', NULL, NULL, 3),
(37, 'gicquel', 'elisa', 635335522, 'zaza.gicquel@gmail.com', '$2y$10$18afjn6EFs/btdrQnCLMYumBbGf9K3l4SUd6Fm1p3YyMD8neh73lK', NULL, NULL, 2),
(38, 'LIvassour', 'Karl', 102030405, 'badik76@gmail.com', '$2y$10$L6nLzhG1mRQCKYUDP/ebZuYNPQk7lqHL4.TesBcIb/xTfO/Es56dK', NULL, NULL, 1),
(39, 'Vonbërg', 'V-ndim', 792219233, 'benjamin.poret@gmail.com', '$2y$10$ClGO8kJylksRYCcn8WD4Re7vwIMLxG4.yzkm/ShIuS/3NmKj28G7a', NULL, NULL, 3),
(40, 'Jean', 'Jean', 600000001, 'jeanjean@gmail.com', '$2y$10$g7MR4mhbfZttkDG1IuGvzei7GOz4d7ub3kxUC988Fru1NAj7sat0i', NULL, NULL, 3),
(41, 'thorel', 'laëtitia', 675432176, 'laetis@gmail.com', '$2y$10$7JIj/EQmf8TazvYLzrZgEOcY8CK3vS5VheAJ05e2JfJmkyWOMezVS', NULL, NULL, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `octopus_comments`
--
ALTER TABLE `octopus_comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `octopus_comments_octopus_users_FK` (`users_id`),
  ADD KEY `octopus_comments_octopus_dateRDV0_FK` (`dateRDV_id`);

--
-- Index pour la table `octopus_dateRDV`
--
ALTER TABLE `octopus_dateRDV`
  ADD PRIMARY KEY (`dateRDV_id`),
  ADD KEY `octopus_dateRDV_octopus_users_FK` (`users_id`),
  ADD KEY `octopus_dateRDV_octopus_prestations0_FK` (`prestations_id`),
  ADD KEY `octopus_dateRDV_octopus_timeRDV1_FK` (`timeRDV_id`);

--
-- Index pour la table `octopus_prestations`
--
ALTER TABLE `octopus_prestations`
  ADD PRIMARY KEY (`prestations_id`);

--
-- Index pour la table `octopus_productCategory`
--
ALTER TABLE `octopus_productCategory`
  ADD PRIMARY KEY (`productCategory_id`);

--
-- Index pour la table `octopus_products`
--
ALTER TABLE `octopus_products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `octopus_products_octopus_productCategory_FK` (`productCategory_id`);

--
-- Index pour la table `octopus_timeRDV`
--
ALTER TABLE `octopus_timeRDV`
  ADD PRIMARY KEY (`timeRDV_id`);

--
-- Index pour la table `octopus_typeUsers`
--
ALTER TABLE `octopus_typeUsers`
  ADD PRIMARY KEY (`typeUsers_id`);

--
-- Index pour la table `octopus_users`
--
ALTER TABLE `octopus_users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `octopus_users_octopus_typeUsers_FK` (`typeUsers_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `octopus_comments`
--
ALTER TABLE `octopus_comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `octopus_dateRDV`
--
ALTER TABLE `octopus_dateRDV`
  MODIFY `dateRDV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `octopus_prestations`
--
ALTER TABLE `octopus_prestations`
  MODIFY `prestations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `octopus_productCategory`
--
ALTER TABLE `octopus_productCategory`
  MODIFY `productCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `octopus_products`
--
ALTER TABLE `octopus_products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `octopus_timeRDV`
--
ALTER TABLE `octopus_timeRDV`
  MODIFY `timeRDV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `octopus_typeUsers`
--
ALTER TABLE `octopus_typeUsers`
  MODIFY `typeUsers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `octopus_users`
--
ALTER TABLE `octopus_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `octopus_comments`
--
ALTER TABLE `octopus_comments`
  ADD CONSTRAINT `octopus_comments_octopus_dateRDV0_FK` FOREIGN KEY (`dateRDV_id`) REFERENCES `octopus_dateRDV` (`dateRDV_id`),
  ADD CONSTRAINT `octopus_comments_octopus_users_FK` FOREIGN KEY (`users_id`) REFERENCES `octopus_users` (`users_id`);

--
-- Contraintes pour la table `octopus_dateRDV`
--
ALTER TABLE `octopus_dateRDV`
  ADD CONSTRAINT `octopus_dateRDV_octopus_prestations0_FK` FOREIGN KEY (`prestations_id`) REFERENCES `octopus_prestations` (`prestations_id`),
  ADD CONSTRAINT `octopus_dateRDV_octopus_timeRDV1_FK` FOREIGN KEY (`timeRDV_id`) REFERENCES `octopus_timeRDV` (`timeRDV_id`),
  ADD CONSTRAINT `octopus_dateRDV_octopus_users_FK` FOREIGN KEY (`users_id`) REFERENCES `octopus_users` (`users_id`);

--
-- Contraintes pour la table `octopus_products`
--
ALTER TABLE `octopus_products`
  ADD CONSTRAINT `octopus_products_octopus_productCategory_FK` FOREIGN KEY (`productCategory_id`) REFERENCES `octopus_productCategory` (`productCategory_id`);

--
-- Contraintes pour la table `octopus_users`
--
ALTER TABLE `octopus_users`
  ADD CONSTRAINT `octopus_users_octopus_typeUsers_FK` FOREIGN KEY (`typeUsers_id`) REFERENCES `octopus_typeUsers` (`typeUsers_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
