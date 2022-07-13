-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 juil. 2022 à 20:52
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
                               `id` int(11) NOT NULL,
                               `commentaire` varchar(45) DEFAULT NULL,
                               `date` date DEFAULT NULL,
                               `id_userc` int(11) DEFAULT NULL,
                               `id_postc` int(11) DEFAULT NULL,
                               `verification` enum('en cours','validee') NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `date`, `id_userc`, `id_postc`, `verification`) VALUES
                                                                                                    (101, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (102, 'wow', '2014-06-22', NULL, 10, 'validee'),
                                                                                                    (103, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (104, 'ss', '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (105, 'ss', '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (106, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (107, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (108, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (109, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (110, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (111, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (112, NULL, '2014-06-22', NULL, 10, 'en cours'),
                                                                                                    (113, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (114, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (115, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (116, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (117, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (118, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (119, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (120, NULL, '2015-06-22', NULL, 10, 'en cours'),
                                                                                                    (121, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (122, 'un commentaire', '2015-06-22', NULL, 3, 'validee'),
                                                                                                    (123, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (124, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (125, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (126, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (127, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (128, 'voilalalala', '2015-06-22', NULL, 3, 'validee'),
                                                                                                    (129, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (130, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (131, NULL, '2015-06-22', NULL, 3, 'en cours'),
                                                                                                    (132, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (133, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (134, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (135, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (136, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (137, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (138, NULL, '2015-06-22', NULL, 12, 'en cours'),
                                                                                                    (139, 'le commentaireeee', '2015-06-22', NULL, 12, 'validee'),
                                                                                                    (140, NULL, '2017-06-22', NULL, 3, 'en cours');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
                        `id` int(11) NOT NULL,
                        `titre` varchar(45) DEFAULT NULL,
                        `date_modif` date DEFAULT NULL,
                        `img` varchar(45) DEFAULT NULL,
                        `id_user` int(11) DEFAULT NULL,
                        `chapo` varchar(45) DEFAULT NULL,
                        `date_mjr` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `titre`, `date_modif`, `img`, `id_user`, `chapo`, `date_mjr`) VALUES
    (3, 'voyage c\'est cool', '2022-03-01', 'cherry.jpg', 1, 'voyage', '2022-03-02'),
(8, 'FES', '2022-06-16', 'marrakech.jpg', NULL, 'Les meilleurs vacances au souley', '2022-06-02'),
(9, 'Irlande', '2022-06-30', 'falaises-de-moher.jpg', NULL, 'Falaise', '2022-06-15'),
(10, 'Malte', '2022-06-29', 'falaises-de-moher.jpg', NULL, 'Vamos', '2022-06-01'),
(11, 'Guelmim', '2022-06-05', 'marrakech.jpg', NULL, 'Les meilleurs vacances au souley', '2022-06-01'),
(12, 'vietnam', '2022-06-09', '983794168.jpg', NULL, 'Vamos', '2022-06-14');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `statut` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `password`, `statut`) VALUES
(1, 'dupond', 'michele', 'michou@gmail.com', '862752f50fa68ebf41d03f0b00bef0a8', 'user'),
(2, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'bouhouch', 'zohra', 'zohra@gmail.com', 'bdc7f4fae58fa4d5b4b48226896aeea9', 'user'),
(4, '', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user'),
(5, 'mougni', 'nawel', 'adminmougni@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'dupond', 'michou', 'dupond@gmail.com', 'e18164fb58a9c2921f8def70b4d6ab47', 'user'),
(7, '', '', 'dupond@gmail.com', 'e18164fb58a9c2921f8def70b4d6ab47', 'user'),
(8, 'winwin', 'winwin', 'winwin@gmail.com', '3b51c79a7f111d2be9d347ac9bfe3abd', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_idx` (`id_userc`),
  ADD KEY `id_post_idx` (`id_postc`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_idx` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `id_postc` FOREIGN KEY (`id_postc`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_userc` FOREIGN KEY (`id_userc`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
