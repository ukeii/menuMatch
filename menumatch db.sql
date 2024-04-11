-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 avr. 2024 à 21:07
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menumatch`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergies`
--

CREATE TABLE `allergies` (
  `allergiesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ingredientsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dislikedpost`
--

CREATE TABLE `dislikedpost` (
  `dislikedPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoritespost`
--

CREATE TABLE `favoritespost` (
  `favoritePostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `posterPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likedpost`
--

CREATE TABLE `likedpost` (
  `likedPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int(11) NOT NULL,
  `posterPath` varchar(255) NOT NULL,
  `videoPath` varchar(255) NOT NULL,
  `creatorID` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `promotingDescription` text NOT NULL,
  `description` text NOT NULL,
  `ingredientID` int(11) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `optionsID` int(11) NOT NULL DEFAULT 0,
  `typeOfFood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`recipeID`, `posterPath`, `videoPath`, `creatorID`, `name`, `promotingDescription`, `description`, `ingredientID`, `origine`, `likes`, `optionsID`, `typeOfFood`) VALUES
(1, 'https://www.potimarron.com/images/wishlists/img/spaghettis-bolognaise-maison-DWMmS.jpg', '', 0, 'Pâtes Bolognaise', 'Des onctueuses pâtes parfumés avec une sauce tomate, du persil ainsi que de la viande.', 'des pâtes avec de la viandes hachés cuites dans de la sauce tomate et parfumés avec du persil. C\'est un plat inventé en italie, simple et rapide à faire.', 0, 'italie', 0, 0, 0),
(2, 'https://www.potimarron.com/images/wishlists/img/pates-a-la-carbonara-gJNsG.jpg', '', 0, 'pâtes carbonara', '', 'pate a la crème et lardons', 0, 'italie', 0, 0, 0),
(3, 'xxx', '', 0, 'xxx', '', 'xxx', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `seenpost`
--

CREATE TABLE `seenpost` (
  `seenPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `optionsID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `email`, `username`, `password`, `date`, `optionsID`) VALUES
(3, 'ugo1404.morelli@hotmail.fr', 'ukeii', '$2y$10$zDXMPi8WzCIYyvmQsH1hC.uNoF8Fe4UrV20Kr2fX2KBDcxYLhmyMC', '2024-04-09 16:43:38', 0);

-- --------------------------------------------------------

--
-- Structure de la table `weeklyrecipes`
--

CREATE TABLE `weeklyrecipes` (
  `userID` int(11) NOT NULL,
  `monday0` int(11) NOT NULL,
  `monday1` int(11) NOT NULL,
  `monday2` int(11) NOT NULL,
  `tuesday0` int(11) NOT NULL,
  `tuesday1` int(11) NOT NULL,
  `tuesday2` int(11) NOT NULL,
  `wednesday0` int(11) NOT NULL,
  `wednesday1` int(11) NOT NULL,
  `wednesday2` int(11) NOT NULL,
  `thursday0` int(11) NOT NULL,
  `thursday1` int(11) NOT NULL,
  `thursday2` int(11) NOT NULL,
  `friday0` int(11) NOT NULL,
  `friday1` int(11) NOT NULL,
  `friday2` int(11) NOT NULL,
  `saturday0` int(11) NOT NULL,
  `saturday1` int(11) NOT NULL,
  `saturday2` int(11) NOT NULL,
  `sunday0` int(11) NOT NULL,
  `sunday1` int(11) NOT NULL,
  `sunday2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`allergiesID`);

--
-- Index pour la table `dislikedpost`
--
ALTER TABLE `dislikedpost`
  ADD PRIMARY KEY (`dislikedPostID`);

--
-- Index pour la table `favoritespost`
--
ALTER TABLE `favoritespost`
  ADD PRIMARY KEY (`favoritePostID`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientID`);

--
-- Index pour la table `likedpost`
--
ALTER TABLE `likedpost`
  ADD PRIMARY KEY (`likedPostID`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeID`);

--
-- Index pour la table `seenpost`
--
ALTER TABLE `seenpost`
  ADD PRIMARY KEY (`seenPostID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `weeklyrecipes`
--
ALTER TABLE `weeklyrecipes`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `allergiesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dislikedpost`
--
ALTER TABLE `dislikedpost`
  MODIFY `dislikedPostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoritespost`
--
ALTER TABLE `favoritespost`
  MODIFY `favoritePostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `likedpost`
--
ALTER TABLE `likedpost`
  MODIFY `likedPostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `seenpost`
--
ALTER TABLE `seenpost`
  MODIFY `seenPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
