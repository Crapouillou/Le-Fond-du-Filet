-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 15:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lefonddufilet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `photolink` varchar(50) NOT NULL,
  `id_articlepicture` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `articlepicture`
--

CREATE TABLE `articlepicture` (
  `id_articlepicture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE `keywords` (
  `keyword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paragraph`
--

CREATE TABLE `paragraph` (
  `id_paragraph` int(11) NOT NULL,
  `paragraph01` text NOT NULL,
  `paragraph02` text NOT NULL,
  `paragraph03` text NOT NULL,
  `paragraph04` text NOT NULL,
  `paragraph05` text NOT NULL,
  `paragraph06` text NOT NULL,
  `paragraph07` text NOT NULL,
  `paragraph08` text NOT NULL,
  `paragraph09` text NOT NULL,
  `paragraph10` text NOT NULL,
  `paragraph11` text NOT NULL,
  `paragraph12` text NOT NULL,
  `paragraph13` text NOT NULL,
  `paragraph14` text NOT NULL,
  `paragraph15` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `refine`
--

CREATE TABLE `refine` (
  `id_article` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `handle` varchar(50) NOT NULL,
  `roles` tinyint(1) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `handle`, `roles`, `mail`, `password`) VALUES
(13, 'azer', NULL, 'azzer@gmail.com', '$2y$10$Sjvm8EirMRRDtjyYbkq7zuiq1cPQdXFbwwG6tTQ5y4F'),
(14, 'azert', NULL, 'azzetr@gmail.com', '$2y$10$BCx3yA4fZFBKeLYz5gRl8.csaeYdAWbgoMnbJxwNvM4'),
(15, 'ooooo', NULL, 'oooo@hotmail.com', '$2y$10$.a8fU0kRa9e7Ws5JqdazkeW5qOzvlNhlBRKwcYGJyMD'),
(16, 'karl', NULL, 'karl@hotmail.com', '$2y$10$tm4KOSX3Az97zUH4L/ssrOjrJBAmQRYGOpDO24LOZYX'),
(17, 'patrick', NULL, 'patrick@gmail.com', '$2y$10$dUfzKH7urBXSS8uJ/Fu/luQNGkIeSU9xE97.InWwYIw');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `photolink` (`photolink`),
  ADD KEY `id_articlepicture` (`id_articlepicture`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `articlepicture`
--
ALTER TABLE `articlepicture`
  ADD PRIMARY KEY (`id_articlepicture`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Index pour la table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword`);

--
-- Index pour la table `paragraph`
--
ALTER TABLE `paragraph`
  ADD PRIMARY KEY (`id_paragraph`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `refine`
--
ALTER TABLE `refine`
  ADD PRIMARY KEY (`id_article`,`keyword`),
  ADD KEY `keyword` (`keyword`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `handle` (`handle`),
  ADD UNIQUE KEY `roles` (`roles`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `articlepicture`
--
ALTER TABLE `articlepicture`
  MODIFY `id_articlepicture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paragraph`
--
ALTER TABLE `paragraph`
  MODIFY `id_paragraph` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_articlepicture`) REFERENCES `articlepicture` (`id_articlepicture`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `paragraph`
--
ALTER TABLE `paragraph`
  ADD CONSTRAINT `paragraph_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`);

--
-- Contraintes pour la table `refine`
--
ALTER TABLE `refine`
  ADD CONSTRAINT `refine_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `refine_ibfk_2` FOREIGN KEY (`keyword`) REFERENCES `keywords` (`keyword`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
