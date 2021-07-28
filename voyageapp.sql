-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 juil. 2021 à 11:25
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voyageapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `ville` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `datedepart` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`id`, `ville`, `pays`, `photo`, `description`, `hotel`, `duree`, `prix`, `datedepart`) VALUES
(1, 'roma', 'italia', '121902263-60f9493d1bf4c.webp', 'L\'Hôtel Giolli propose de grandes chambres avec accès Wi-Fi, un service chaleureux et une réception ouverte 24h/24. Il est situé sur la Via Nazionale, à quelques pas de la gare Termini.', 'Hotel Giolli Nazionale', 4, 1000, '2021-08-20'),
(2, 'roma', 'italia', '121902263-60f94a689e310.webp', 'L\'Hôtel Giolli propose de grandes chambres avec accès Wi-Fi, un service chaleureux et une réception ouverte 24h/24. Il est situé sur la Via Nazionale, à quelques pas de la gare Termini.', 'Hotel Giolli Nazionale', 4, 1200, '2021-08-25'),
(4, 'France', 'Paris', '613088-60fa803c029f1.webp', 'L\'Hotel de l\'Aqueduc est situé dans le centre-ville de Paris, à côté de la Gare du Nord. Il dispose d\'une réception ouverte 24h/24 et de chambres avec ascenseur, télévision par satellite et connexion Wi-Fi gratuite.  L\'hôtel propose un petit-déjeuner buff', 'Hotel de l\'Aqueduc', 3, 1500, '2021-08-25'),
(5, 'Nantes', 'France', '681821-60fa816bc869f.webp', 'L’ibis Styles Nantes Centre Gare vous accueille dans le centre-ville, en face de la gare SNCF, à 400 mètres du château des ducs de Bretagne et du jardin botanique. Une connexion Wi-Fi est disponible gratuitement.  Les chambres climatisées sont insonorisée', 'l ibis Styles Nantes Centre Gare', 1, 400, '2021-04-25');

-- --------------------------------------------------------

--
-- Structure de la table `destination_user`
--

CREATE TABLE `destination_user` (
  `destination_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210722101612', '2021-07-22 12:16:16', 56),
('DoctrineMigrations\\Version20210722142021', '2021-07-22 16:20:28', 269),
('DoctrineMigrations\\Version20210722194515', '2021-07-22 21:45:23', 157),
('DoctrineMigrations\\Version20210722194945', '2021-07-22 21:49:59', 131),
('DoctrineMigrations\\Version20210722215609', '2021-07-22 23:56:20', 106),
('DoctrineMigrations\\Version20210723071216', '2021-07-23 09:12:25', 502);

-- --------------------------------------------------------

--
-- Structure de la table `participtions`
--

CREATE TABLE `participtions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `participtions`
--

INSERT INTO `participtions` (`id`, `id_user`, `id_destination`, `payment`) VALUES
(1, 2, 2, 1),
(2, 2, 1, 1),
(3, 2, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `username`) VALUES
(1, 'superadmin@gmail.com', '[\"admin\"]', '$argon2id$v=19$m=65536,t=4,p=1$cDJReEc2RkxiMjBCdFhjdw$WCjtnFrqqdhbAud2valcMXPsYMxAV4hrOeuzsB3N75g', 1, 'SuperAdmin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `destination_user`
--
ALTER TABLE `destination_user`
  ADD PRIMARY KEY (`destination_id`,`user_id`),
  ADD KEY `IDX_2E325F78816C6140` (`destination_id`),
  ADD KEY `IDX_2E325F78A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `participtions`
--
ALTER TABLE `participtions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `participtions`
--
ALTER TABLE `participtions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `destination_user`
--
ALTER TABLE `destination_user`
  ADD CONSTRAINT `FK_2E325F78816C6140` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2E325F78A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
