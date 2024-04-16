-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 16 avr. 2024 à 04:26
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `menuMatch`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergies`
--

CREATE TABLE `allergies` (
  `allergiesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ingredientsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `dislikedpost`
--

CREATE TABLE `dislikedpost` (
  `dislikedPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `favoritespost`
--

CREATE TABLE `favoritespost` (
  `favoritePostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `posterPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`ingredientID`, `name`, `posterPath`) VALUES
(1, 'Huile d\'olive', 'https://i.imgur.com/sUtufC6.png'),
(2, 'Sucre', 'https://i.imgur.com/DllDAIo.png'),
(3, 'persil', 'https://i.imgur.com/EQnrbRo.png'),
(4, 'vin rouge', 'https://i.imgur.com/kHwZIE5.png'),
(5, 'Tomate', 'https://i.imgur.com/sVmycXk.png'),
(6, 'Carotte', 'https://i.imgur.com/z1dcEaw.png'),
(7, 'Oignon', 'https://i.imgur.com/2qUBCnR.png'),
(8, 'Pâtes', 'https://i.imgur.com/PLYdpnc.png'),
(9, 'Ail', 'https://i.imgur.com/hpm4Aoa.png'),
(10, 'Celeri', 'https://i.imgur.com/jUcBiI0.png'),
(11, 'Viande Hachée', 'https://i.imgur.com/DuyCg7t.png'),
(12, 'Lardons', 'https://i.imgur.com/3mWtrgO.png'),
(13, 'Poivre', 'https://i.imgur.com/NXwaHwU.png'),
(14, 'Sel', 'https://i.imgur.com/kt5IwFO.png'),
(15, 'Crème Fraiche', 'https://i.imgur.com/GB2Urga.png'),
(16, 'Oeuf', 'https://i.imgur.com/9HXfox2.png'),
(17, 'Bierre', 'https://i.imgur.com/cFAwQZD.png'),
(18, 'Farine', 'https://i.imgur.com/EXQH2B3.png'),
(19, 'Filet de poisson', 'https://i.imgur.com/RHj1dWO.png'),
(20, 'Pois Chiches', 'https://leclicavrac.fr/610-large_default/pois-chiches-500g.jpg'),
(21, 'Courgette', 'https://i.imgur.com/9lNmf7j.png'),
(22, 'Cubes de bouillon', 'https://i.imgur.com/bHSnJhs.png'),
(23, 'Harissa', 'https://i.imgur.com/juElz2G.png'),
(24, 'Merguez', 'https://i.imgur.com/wWAEq9z.png'),
(25, 'Pilons de Poulet', 'https://i.imgur.com/5rOZY3x.png'),
(26, 'Concentré de tomate', 'https://i.imgur.com/b68XC5c.png'),
(27, 'Mélange 4 Epices', 'https://i.imgur.com/WzY5Zfe.png'),
(28, 'Navet', 'https://i.imgur.com/bKDjQ6h.png'),
(29, 'Beurre', 'https://i.imgur.com/5pIxRiT.png'),
(30, 'Lait', 'https://i.imgur.com/8UCOHnW.png'),
(31, 'Cheddar', 'https://i.imgur.com/wRRqgxe.png'),
(32, 'Aneth', 'https://i.imgur.com/jnyXt1l.png'),
(33, 'Fromage frais', 'https://i.imgur.com/1tSsLco.png'),
(34, 'Tortillas', 'https://i.imgur.com/fhSsn3M.png'),
(35, 'Saumon Fumé', 'https://i.imgur.com/cacYAaE.png'),
(36, 'Salade', 'https://i.imgur.com/ncFIsre.png'),
(37, 'Huile de friture', 'https://i.imgur.com/NiUyORT.png'),
(38, 'Coriandre', 'https://i.imgur.com/3RtwU4q.png'),
(39, 'Cumin', 'https://i.imgur.com/l6Q7QnG.png'),
(40, 'Persil', 'https://i.imgur.com/Fpg8B2U.png'),
(41, 'Fèves', 'https://i.imgur.com/3g3NR2n.png'),
(42, 'Paprika', 'https://i.imgur.com/5VNTjjf.png'),
(43, 'Basilic frais', 'https://i.imgur.com/WTgnsFx.png'),
(44, 'Vinaigre de riz', 'https://i.imgur.com/mIie2NR.png'),
(45, 'Sésame', 'https://i.imgur.com/tbdLg4F.png'),
(46, 'Avocat', 'https://i.imgur.com/esYypkh.png'),
(47, 'Concombre', 'https://i.imgur.com/gTtJOkv.png'),
(48, 'Crabe', 'https://i.imgur.com/w8ObOWw.png'),
(49, 'Feuille de nori', 'https://i.imgur.com/qwA3B89.png'),
(50, 'Riz rond', 'https://i.imgur.com/i4A9zLv.png'),
(51, 'Wasabi', 'https://i.imgur.com/5BVLc3k.png'),
(52, 'Sauce soja', 'https://i.imgur.com/qnLa0Yn.png'),
(53, 'Emmental', 'https://i.imgur.com/lPlgwbS.png'),
(54, 'Cornichons', 'https://i.imgur.com/NCsfBtW.png'),
(55, 'Mayonnaise', 'https://i.imgur.com/ZxFdWoE.png'),
(56, 'Pain a burger', 'https://i.imgur.com/tlHJRh4.png'),
(57, 'Ketchup', 'https://i.imgur.com/4wDesjp.png');

-- --------------------------------------------------------

--
-- Structure de la table `likedpost`
--

CREATE TABLE `likedpost` (
  `likedPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int(11) NOT NULL,
  `posterPath` varchar(255) NOT NULL,
  `videoPath` varchar(255) NOT NULL,
  `creatorID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `promotingDescription` text NOT NULL,
  `description` text NOT NULL,
  `ingredientID` varchar(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `optionsID` int(11) NOT NULL DEFAULT '0',
  `typeOfFood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`recipeID`, `posterPath`, `videoPath`, `creatorID`, `name`, `promotingDescription`, `description`, `ingredientID`, `origine`, `likes`, `optionsID`, `typeOfFood`) VALUES
(1, 'https://www.potimarron.com/images/wishlists/img/spaghettis-bolognaise-maison-DWMmS.jpg', '', 0, 'Pâtes Bolognaise', 'Des onctueuses pâtes parfumés avec une sauce tomate, du persil ainsi que de la viande.', 'Hachez l\'ail, l\'oignon, puis coupez la carotte et le céleri en petits dés (enlevez les principales nervures du céleri).\r\nFaites chauffer l\'huile dans une casserole assez grande. Faites revenir l\'ail, l\'oignon, la carotte et le céleri à feu doux pendant 5 min en remuant.\r\nAugmenter la flamme, puis ajoutez le boeuf. Faites brunir et remuez de façon à ce que la viande ne fasse pas de gros paquets.\r\nAjoutez le bouillon, le vin rouge, les tomates préalablement coupées assez grossièrement, le sucre et le persil haché. Portez à ébullition.\r\nBaisser ensuite le feu et laissez mijoter à couvert 1h à 1h30, de façon à ce que le vin s\'évapore.\r\nFaites cuire les spaghetti, puis mettez-les dans un plat.\r\nAjoutez la sauce bolognaise.', '1,2,3,4,5,6,7,8,9,10,11', 'italie', 10, 0, 0),
(2, 'https://www.potimarron.com/images/wishlists/img/pates-a-la-carbonara-gJNsG.jpg', '', 0, 'Pâtes carbonara', 'Pâtes a la crème onctueuses accompagnées de petits morceaux de lardons.', 'Cuire les pâtes dans un grand volume d\'eau bouillante salée.\r\nEmincer les oignons et les faire revenir à la poêle. Dès qu\'ils ont bien dorés, y ajouter les lardons.\r\nPréparer dans un saladier la crème fraîche, les oeufs, le sel, le poivre et mélanger.\r\nRetirer les lardons du feu dès qu\'ils sont dorés et les ajouter à la crème.\r\nUne fois les pâtes cuite al dente, les égoutter et y incorporer la crème. Remettre sur le feu si le plat a refroidi.\r\nServir et bon appétit ! Vous pouvez également agrémenter votre plat avec des champignons.', '7,8,12,13,14,15', 'italie', 3, 0, 0),
(3, 'https://assets.afcdn.com/recipe/20201028/115069_w600.jpg', '', 0, 'Mac and cheese', 'Pâtes a la sauce fromagère onctueuse.', 'Cuire les macaronis le temps indiqué sur le paquet, les égoutter et réserver.\r\nDans une petite casserole, faire fondre le beurre à feu doux.\r\nUne fois bien fondu, ajouter la farine et bien mélanger.\r\nIncorporer le lait, assaisonner et remuer sans vous arrêter jusqu\'à ce que la sauce épaississe.\r\nHors du feu, ajouter le cheddar râpé et remuer jusqu\'à ce qu\'il soit complètement fondu.\r\nEnfin, verser les macaronis dans la sauce au fromage et remuer pour bien les enrober. C\'est prêt !', '13,14,18,29,8,30,31', 'USA', 1, 0, 0),
(4, 'https://assets.afcdn.com/recipe/20230614/143432_w1024h768c1cx3958cy2758cxt0cyt0cxb5760cyb3840.jpg', '', 0, 'Wrap au saumon fumé', 'Délicieux wraps frais au saumons fumé.', 'Tartiner les tortillas de blé avec le fromage frais.\r\nParsemer d\'aneth.\r\nRépartir le saumon fumé sur toute la surface.\r\nAjouter la salade, les tomates.\r\nSaler, poivrer\r\nRouler très serré le wrap et le mettre dans du film étirable.\r\nRéserver au frais, servir.', '5,13,14,32,33,34,35,36', 'france', 2, 0, 0),
(5, 'https://assets.afcdn.com/recipe/20170124/571_w157h157c1cx1500cy1000.webp', '', 0, 'Falafels', 'Des croquettes de pois chiche épicés.', 'Faites tremper les pois chiches et les fèves dans l\'eau 12 h, les égoutter et les cuire 45 mn à l\'auto cuiseur.\r\nPeler oignon et ail, les hacher ainsi que le persil.\r\nPasser les fèves et les pois chiches au mixer (ou robot).\r\nMélanger avec le persil, l\'oignon, l\'ail, la farine, les épices, le sel.\r\nPétrissez le tout avec vos mains en ajoutant un peu d\'eau si nécessaire. Rassemblez la pâte et laisser reposer au réfrigérateur pendant minimum 30 mn.\r\nFaçonner une trentaine de boulettes de la grosseur d\'une pièce de 2 euros.\r\nLes faire frire 2/3 mn puis les égoutter sur du papier absorbant.\r\nServir chaud ou froid avec des petites sauces tomates aux herbes, ou sauces yaourts.', '37,14,38,39,18,40,7,20,41,9,42', 'Lyban', 0, 0, 0),
(6, 'https://assets.afcdn.com/recipe/20131025/16373_w600.jpg', '', 4, 'sushi californien', 'Des maki inversé au crabe', 'Rincer le riz à l\'eau froide jusqu\'à ce que l\'eau qui s\'écoule soit claire. Laisser égoutter.\r\nFaire cuire le riz dans 15 cl d\'eau : porter à ébullition 2 minutes et laisser gonfler 10 minutes à petit feu couvert. Laisser refroidir.\r\nFaire bouillir le vinaigre de riz avec le sucre et le sel. Laisser refroidir. Incorporer l\'assaisonnement au riz.\r\nEmincer en fines et longues lamelles le concombre et l\'avocat.\r\nEtaler 1 cm de riz sur chacune des feuilles de nori.\r\nSaupoudrer de graines de sésame.\r\nRetourner la feuille de nori (pour que le riz se retrouve à l\'extérieur du rouleau) et étaler un peu wasabi.\r\nGarnir avec le concombre, l\'avocat et le crabe, puis rouler pour former le rouleau (plus facile si vous poséder un makisu : natte de bambou à rouler).\r\nCouper chaque rouleau en 8.', '14,44,2,45,46,47,48,49,50,51,52', 'Japon', 2, 0, 0),
(7, 'https://assets.afcdn.com/recipe/20180621/79724_w157h157c1cx1944cy2592cxt0cyt0cxb3888cyb5184.webp', '', 4, 'couscous poulet merguez', 'Le couscous de ma grand mère.', 'Lavez et épluchez les carottes, les navets et les tomates et les couper en cubes.\r\nDans un autocuiseur, versez 3 cuillères à soupe d\'huile d\'olive. Mettez à chauffer et faites-y dorer les pilons de poulet. Quand ils sont dorés, versez l\'équivalent d\'1 litre d\'eau et ajouter les cubes de bouillon de boeuf, le concentré de tomate, les carottes, navets et tomates, les épices à couscous et l\'harissa.\r\nFermez votre autocuiseur et compter 25 mn de cuisson une fois que celui-ci est monté en pression.\r\nEn attendant, lavez et coupez les courgettes en cubes et égouttez les pois chiches.\r\nUne fois les 25 mn écoulées, évacuez la vapeur de votre autocuiseur, ouvrez et rajouter les courgettes et les pois chiches.\r\nRemettez au feu : comptez 10 mn de cuisson une fois votre autocuiseur sous pression.\r\nFaites cuire vos merguez sur un grill ou à la poêle, mais pas avec les légumes.\r\nServez accompagné d\'une semoule fine.', '5,6,20,21,22,23,24,25,26,27,28', 'Maghreb', 1, 0, 0),
(8, 'https://assets.afcdn.com/recipe/20160531/29017_w600.jpg', '', 3, 'Fish and chips', 'Délicieux filets de poissons frits.', 'Mélangez la farine et la bière.\r\nAjoutez les jaunes d\'oeufs,\r\npuis les blancs d\'oeuf monté en neige ferme\r\nen soulevant la masse pour ne pas le \"casser\". La pâte à fish and chips est prête.\r\nTrempez les filets de poisson généreusement\r\net faites frire à 160°C ou 180°C pendant 3 ou 4 min.\r\nEgoutter soigneusement lorsque c\'est doré.\r\nServir avec des frites.', '16,17,18,19,37', 'Royaume-Uni', 0, 0, 0),
(9, 'https://assets.afcdn.com/recipe/20190206/87301_w1024h768c1cx2213cy1453cxt0cyt0cxb4500cyb3000.jpg', '', 3, 'Hamburger(américain)', 'Un burger qui crie AMERICA!!!', 'Tranchez de fines lamelles d\'emmental afin de recouvrir la partie inférieure de votre pain à burger. Mettez ensuite au four sur le mode grill le temps de faire fondre le fromage.\r\nCoupez l\'oignon de manière à obtenir de fines et grandes lamelles. Coupez la tomate en grandes tranches également. Coupez 2 à 3 grandes feuilles de salade en lamelles fines et longues.\r\nHachez en tout petits morceaux les cornichons et mélangez-les à la mayonnaise préalablement préparée.\r\nMettez au four la partie supérieure de votre pain à burger.\r\nFaites ensuite cuire à votre convenance votre steak haché dans une poêle avec du beurre ou de l\'huile ou utilisez un grill. Assaisonnez généreusement en sel et poivre.\r\nSortez ensuite les deux parties de votre pain à burger. Disposez sur la partie avec le fromage fondu votre steak haché sur lequel vous allez étaler votre mayonnaise. Déposez ensuite une à deux grandes tranches de tomate puis la salade verte.\r\nSur la partie supérieure de votre pain, étaler du ketchup de manière à le recouvrir complètement, puis disposez vos lamelles d\'oignons.\r\nRefermez. Bon appétit !', '53,7,5,11,54,36,55,56,57', 'USA', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `seenpost`
--

CREATE TABLE `seenpost` (
  `seenPostID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `optionsID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `email`, `username`, `password`, `date`, `optionsID`) VALUES
(3, 'ugo1404.morelli@hotmail.fr', 'ukeii', '$2y$10$zDXMPi8WzCIYyvmQsH1hC.uNoF8Fe4UrV20Kr2fX2KBDcxYLhmyMC', '2024-04-09 16:43:38', 0),
(4, 'yanisbensalah13@gmail.com', 'yanis', '$2y$10$4hMUwEZfnagHE05ULShhN.XS2kusFcaPUD3GGo8oZsUjLzrfy5m3u', '2024-04-15 16:28:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `weeklyrecipes`
--

CREATE TABLE `weeklyrecipes` (
  `userID` int(11) NOT NULL,
  `monday` int(11) NOT NULL,
  `tuesday` int(11) NOT NULL,
  `wednesday` int(11) NOT NULL,
  `thursday` int(11) NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `sunday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `weeklyrecipes`
--

INSERT INTO `weeklyrecipes` (`userID`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(3, 2, 3, 4, 5, 6, 7, 8);

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
  MODIFY `dislikedPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favoritespost`
--
ALTER TABLE `favoritespost`
  MODIFY `favoritePostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `likedpost`
--
ALTER TABLE `likedpost`
  MODIFY `likedPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `seenpost`
--
ALTER TABLE `seenpost`
  MODIFY `seenPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
