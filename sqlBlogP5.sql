-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 juil. 2023 à 12:41
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
                                                                                                             (64, 'Oman5', NULL, 'mescate.jpeg', 45, 'Mescate', '2023-07-24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
                                                                                                             (65, 'Amsterdam', NULL, 'Amsterdam.jpg', 45, 'Pays bas', '2023-07-24', 'Les Pays-Bas, malgré leur petite taille, possèdent les atouts des grands états de ce monde. C’est une contrée généreuse aux canaux paisibles et aux champs fleuris. Ses moulins à vent, ses fromages, ses poissons marinés, ses sabots ainsi que sa porcelaine '),
                                                                                                             (66, 'japon', NULL, 'japon.jpg', 45, 'Cerisier en fleur', '2023-07-24', 'Juillet marque le début des matsuri, les festivals d&#039;été au Japon. De nombreux hanabi (feux d&#039;artifice ?) ont régulièrement lieu dans les villes, au bord de l&#039;eau ou dans la montagne et de préférence les week-ends. Les Japonais profitent de'),
                                                                                                             (67, 'Bahamas', '2023-07-24', '55491-Bahamas.jpg', 45, 'Séjour aux Bahamas ', '2023-07-24', 'Au sud de l’île de Grand Bahama, séjournez au Viva Wyndham Fortuna Beach, un véritable coin de paradis. La formule All-inclusive vous permettra de vous détendre et de profiter '),
                                                                                                             (68, 'Floride', NULL, 'floride.jpeg', 45, 'Charme historique et plages sauvages', '2023-07-24', 'Amelia Island n’est pas vraiment une destination secrète, l’île ayant été classée parmi les plus belles au monde par les lecteurs du magazine Condé Nast. Elle est pourtant certainement l’une des destinations de vacances les moins mentionnées de Floride. C'),
                                                                                                             (70, 'hawai', NULL, 'hawai.jpg', 45, 'La plage de Poʻipū est l&#039;un des meilleur', '2023-07-24', 'Concurrent surprise sur la liste, la plage de Poʻipū place Kauaʻi en tête de liste alors que les visiteurs continuent de se rassembler sur ses rives éblouissantes. L&#039;endroit idéal pour la plupart des activités océaniques, ici vous pouvez plonger avec'),
                                                                                                             (71, 'Alhambra', NULL, 'alhambra.jpg', 45, 'Magnifique visite de plus de 3 heures à comme', '2023-07-24', 'Magnifique visite de plus de 3 heures à commencer tôt avec un guide. La mienne s appelle lola et parle un super français. Nous a inspiré de tout l art de ces palais et de leur histoire. Monument, décoration, jardins. ...tout est somptueux et le temps n à ');

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
                                                                                                    (175, 'Juste WoW ! C’est magnifique ! Le détail des ', '2024-07-23', 47, 71, 'validee'),
                                                                                                    (176, 'Un site magnifique et bien entretenu. Le circ', '2024-07-23', 46, 71, 'validee'),
                                                                                                    (177, 'Arrive de Malaga. Pas possible de rentrer san', '2024-07-23', 47, 71, 'validee'),
                                                                                                    (178, 'Hawaii est magique! Et pourtant, l&#039;archi', '2024-07-23', 47, 70, 'validee'),
                                                                                                    (179, 'Lieu réputé pour ses très nombreux complexes ', '2024-07-23', 47, 68, 'validee'),
                                                                                                    (180, 'Je me suis laissé tenté par Voyageurs du Mond', '2024-07-23', 47, 67, 'validee'),
                                                                                                    (181, 'Le Japon est connu pour plusieurs choses:\r\n\r\n', '2024-07-23', 46, 66, 'validee'),
                                                                                                    (182, 'C’est assez cliché certes, mais vous devez vr', '2024-07-23', 46, 65, 'validee'),
                                                                                                    (183, 'Sublime et inoubliable voyage à Oman. Voyageu', '2024-07-23', 46, 64, 'validee');

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
                                                                             (45, 'admin', 'admin', 'admin@gmail.com', '7dd12f3a9afa0282a575b8ef99dea2a0c1becb51', 'admin'),
                                                                             (46, 'lucie', 'lulu', 'lucie@gmail.com', 'c071fab07feee9cd455aaee498b56674f19ebd00', 'user'),
                                                                             (47, 'sanna', 'sanna', 'sanna@gmail.com', 'f1afdbce165595ddb77833809d6c13b5d59226ac', 'user');

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
