-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 juin 2023 à 20:22
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

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
-- Structure de la table `article`
--

CREATE TABLE `article` (
                           `id` int(11) NOT NULL,
                           `titre` varchar(45) DEFAULT NULL,
                           `date_modif` date DEFAULT NULL,
                           `img` varchar(45) DEFAULT NULL,
                           `id_user` int(11) DEFAULT NULL,
                           `chapo` varchar(45) DEFAULT NULL,
                           `date_mjr` date DEFAULT NULL,
                           `descriptif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `date_modif`, `img`, `id_user`, `chapo`, `date_mjr`, `descriptif`) VALUES
                                                                                                             (21, 'Irland', '2023-06-13', 'Oman.jpg', 2, 'Falaise', '2022-12-06', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (25, 'Oman', '2023-06-13', 'Oman.jpg', 2, 'Mescate', '2023-01-01', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (48, 'Al hambra', '2023-06-13', 'al hambra.jpg', 2, 'Vamos2', '2023-01-01', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (49, 'Hawai', '2023-06-13', 'honolulu-oahu_489.jpg', 2, 'Vamos 2023', '2023-03-31', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (57, 'guelmim', '2023-06-13', 'IMAGE LAS VEGAS.jpg', 2, 'porte du sahara', '2023-05-19', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (58, 'la havane', '2023-06-13', 'la havane.jpg', 2, '​Bienvenue à La Havane', '2023-05-22', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (59, 'cuba', '2023-06-13', 'cuba.jpg', 2, 'Entre terre et mer', '2023-05-22', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (60, 'Al hambra', '2023-06-13', 'image malibu.jpg', 2, 'ESSA', '2023-05-25', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d'),
                                                                                                             (61, 'Funchal', '2023-06-13', 'funchal.jpg', 2, 'Madeir', '2023-06-01', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#039;imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux d');

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
                                                                                                    (148, 'Best view', '2025-12-22', 6, 21, 'validee'),
                                                                                                    (155, 'ppp', '2001-01-23', 6, 25, 'en cours'),
                                                                                                    (159, 'superbe plage', '2019-05-23', 13, 49, 'validee'),
                                                                                                    (160, 'magnifique séjour', '2019-05-23', 13, 49, 'validee'),
                                                                                                    (163, 'panorama exceptionnel', '2019-05-23', 13, 49, 'validee'),
                                                                                                    (164, 'essai', '2019-05-23', 13, 48, 'validee'),
                                                                                                    (167, 'ESSAIIIIIIIII', '2019-05-23', 6, 57, 'validee'),
                                                                                                    (168, 'essai 22222', '2019-05-23', 6, 57, 'en cours'),
                                                                                                    (169, 'excellent séjour', '2022-05-23', 13, 49, 'validee'),
                                                                                                    (170, 'Malgré les difficultés du pays le voyage s es', '2022-05-23', 13, 58, 'validee'),
                                                                                                    (171, 'super vacance', '2025-05-23', 6, 60, 'validee'),
                                                                                                    (172, 'GENIAL', '2008-06-23', 6, 61, 'validee'),
                                                                                                    (174, 'ESSAIE 2222', '2008-06-23', 6, 61, 'validee');

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
                                                                             (6, 'dupond2', 'louis', 'dupond2@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (7, 'dupond2', 'louis', 'dupond2@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (8, 'dupond2', 'louis', 'dupond2@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (9, 'lol', 'lol', '&lt;script&gt;alert(&quot;Say hello&quot;);&l', '9cdfb439c7876e703e307864c9167a15', 'user'),
                                                                             (10, 'lol2', 'LOL2', '<script>alert(\"Say hello\");</script>', '41df0f088fcc2e16ff5bb349470a7c8c', 'user'),
                                                                             (11, 'essai', 'aicha2', 'aicha2@gmail.com', '55f14f87762f3192d199ae5e333345f1', 'user'),
                                                                             (12, 'essai', 'aicha2', 'aicha2@gmail.com', '55f14f87762f3192d199ae5e333345f1', 'user'),
                                                                             (13, 'jacqueline', 'mimi', 'jacqueline@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (14, 'kawtar', 'essaie', 'kawtar@gmail.com', '5c774b016676351331263c2253b2570f', 'user'),
                                                                             (15, 'Hamza', 'Hamza', 'hamza@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (16, 'Hamza', 'Hamza', 'hamza@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (17, 'Hamza', 'Hamza', 'hamza@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
                                                                             (18, 'innscription', 'innscription', 'innscription@gmail.com', '84efdf18887fb4c625111e73d1006740', 'user'),
                                                                             (19, '', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user'),
                                                                             (20, 'inscription', 'prenom inscrit', 'inscription@gmail.com', '5483560e5d64e47aefc56eab275c4e69', 'user'),
                                                                             (21, 'inscription', 'prenom inscrit', 'inscription@gmail.com', '5483560e5d64e47aefc56eab275c4e69', 'user'),
                                                                             (22, 'inscription', 'prenom inscrit', 'inscription@gmail.com', '5483560e5d64e47aefc56eab275c4e69', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_idx` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_idx` (`id_userc`),
  ADD KEY `id_post_idx` (`id_postc`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
    ADD CONSTRAINT `id_postc` FOREIGN KEY (`id_postc`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_userc` FOREIGN KEY (`id_userc`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
