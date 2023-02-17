-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 fév. 2023 à 18:48
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `guide`
--

CREATE TABLE `guide` (
  `idGuide` int(4) NOT NULL,
  `nameGuide` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `guide`
--

INSERT INTO `guide` (`idGuide`, `nameGuide`, `niveau`) VALUES
(2, 'Leo', 'Niveau 2'),
(3, 'Christian', 'Niveau 3'),
(4, 'sam', 'niveau4'),
(5, 'leo', 'niveau3'),
(7, 'meryle', 'niveau5'),
(10, 'Jude', 'Niveau 1'),
(11, 'ADANVOESSI', 'Niveau 3'),
(13, 'sonagnon', 'Niveau 1'),
(14, 'Sonagnon', 'Niveau 2'),
(17, 'Hillaire', 'Niveau 5');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(100) NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `name`, `object`, `email`, `number`, `message`) VALUES
(1, 'Christ CHRIST', 'Demande de priÃ¨re', 'christ@gmail.com', 66336633, 'Christ JÃ©sus la parole faite chaire !'),
(2, 'Watson ADANVOESSI', 'Demande de priÃ¨re', 'watsonadanvoessi@gmail.com', 45454545, 'De la volontÃ© pour le pÃ¨re !'),
(3, 'Joseph KOKOU', 'demande de rÃ©servation', 'kokou@gmail.com', 94805989, 'Bonjour ! Je suis ici afin de demander comment se font les rÃ©servations avec vous .\r\nMerci !'),
(4, 'Yves ADANVOESSI', 'demande de rÃ©servation', 'yves@gmail.com', 96749570, 'La mise Ã  jour de mon profil chez vous !'),
(5, 'ADANVOESSI Yves', 'Voir mes rÃ©servations', 'yves@gmail.com', 96147095, 'Bonjour !\r\n\r\nJe suis vraiment dÃ©solÃ© de vous le demander sinon j&#039;aimerais demander si je peux avoir mes rÃ©servation en cours !\r\n\r\nMerci !');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `hotel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_Arr` date NOT NULL,
  `date_sort` date NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `room` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbr_room` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `hotel`, `date_Arr`, `date_sort`, `adult`, `child`, `room`, `nbr_room`, `userID`) VALUES
(1, 'azalai', '2023-02-01', '2023-02-05', 8, 2, '$21.00 - $30.00', 2, 23),
(2, 'azalai', '2023-02-01', '2023-02-05', 8, 2, '$21.00 - $30.00', 2, 23),
(3, 'golden tulip', '2023-02-18', '2023-03-25', 3, 2, '$90.00 - ', 3, 23),
(4, 'novotel', '2023-02-02', '2023-02-12', 2, 1, '$50.00 - $65.00', 2, 28),
(5, 'hotel du lac', '2023-02-04', '2023-04-09', 4, 3, '$31.00 - $45.00', 2, 29),
(6, 'hotel du lac', '2023-02-04', '2023-04-09', 5, 3, '$50.00 - $65.00', 2, 29),
(7, 'novotel', '2023-02-01', '2023-02-05', 3, 0, '$70.00 - $85.00', 2, 29),
(8, 'azalai', '2023-03-12', '2023-06-02', 6, 0, '$10.00 - $20.00', 4, 29),
(9, 'hotel du lac', '2023-02-02', '2023-02-05', 4, 1, '$50.00 - $65.00', 2, 29),
(10, 'azalai', '2023-02-28', '2023-03-17', 8, 2, '$31.00 - $45.00', 5, 34),
(11, 'hotel du lac', '2023-04-01', '2023-05-01', 2, 1, '$31.00 - $45.00', 2, 35),
(12, 'golden tulip', '2023-02-02', '2023-02-05', 4, 1, '$70.00 - $85.00', 2, 23),
(13, 'hotel du lac', '2023-03-01', '2023-03-12', 4, 2, '$70.00 - $85.00', 4, 34),
(14, 'azalai', '2023-03-12', '2023-04-09', 7, 3, '$21.00 - $30.00', 5, 34),
(15, 'novotel', '2023-02-03', '2023-02-05', 3, 1, '$31.00 - $45.00', 2, 29),
(16, 'golden tulip', '2023-02-03', '2023-02-12', 4, 1, '$31.00 - $45.00', 3, 37),
(17, 'hotel du lac', '2023-02-03', '2023-02-07', 1, 1, '$31.00 - $45.00', 1, 37),
(18, 'novotel', '2023-02-03', '2023-02-05', 4, 1, '$50.00 - $65.00', 3, 35);

-- --------------------------------------------------------

--
-- Structure de la table `tourisme`
--

CREATE TABLE `tourisme` (
  `id` int(4) NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idGuide` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tourisme`
--

INSERT INTO `tourisme` (`id`, `lname`, `fname`, `civilite`, `image`, `idGuide`) VALUES
(28, 'Maheu', 'Bevis', 'F', 'User.png', 3),
(29, 'Parizeau', 'Danielle', 'F', 'user_green.png', 4),
(30, 'Leroy', 'Aleron', 'M', 'User.png', 5),
(31, 'Couet', 'Aubert', 'M', 'user_green.png', 3),
(32, 'Marion', 'GOULOMET', 'M', 'User.png', 2),
(33, 'sonagnon', 'Judicael', 'F', 'User.png', 3),
(38, 'Eric', 'ZINSOU', '', 'User.png', 11),
(42, 'adanvoessi', 'Christ le Roi', 'M', 'User.png', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `type`, `email`, `password`) VALUES
(4, 'Jacques', 'KOUSSOUHON', 'user', 'jacques@gmail.com', '$2y$10$db9r1thT7wdE4VyhDne.zuqCwgXbv.x5QVHwsj/0220PULrbjl7BS'),
(7, 'Rosette', 'ZANNOU', 'admin', 'rosette@gmail.com', '$2y$10$uAs5We5s.CH6bu7a5UrmoeClg2Q8cDRcKePBDKNGzM90.eB14qgWK'),
(11, 'Jacquelline', 'DESON', 'user', 'deson@gmail.com', '$2y$10$p42aVqbXfrlL94R3f/4cNOffiFho7iEaeI3d/ervu1R4AdaqEhcuu'),
(13, 'CHRIST', 'Joseph', 'user', 'joseph@gmail.com', '$2y$10$6fHeF59osMFJ4.mkuaQ0sur.uCZXjZtTFKRqgPHqs/9Nf4Jie1bKu'),
(19, 'Aboudou', 'KOLADE', 'user', 'koladeaboudou@gmail.com', '$2y$10$tjMAzPv2UmTFh/8vGfgibejget524hBdOBXveX6i.vY/KVpS6nHtC'),
(23, 'Israel S.', 'ADANVOESSI', 'admin', 'israel@gmail.com', '$2y$10$LXVCs9oaRvcjPXKnrzijN.XOaR5R6LjzGQr8Li13Kufs9qBGB0fP.'),
(24, 'AZERTY', 'code', 'user', 'code2@gmail.com', '$2y$10$Ju5oAHeoYGxL6DRdaj.u3e3hJ5eGSl5k.cAKQC/RWmqS66ybeaE12'),
(25, 'CODE', 'azerty', 'user', 'code3@gmail.com', '$2y$10$pf4.4qdcRA34aSuWszaSduTJDs0pkiACX2uqLF.1CI.KRwjwb7SK2'),
(26, 'Codage', 'CODE', 'user', 'code4@gmauil.com', '$2y$10$aUhVudmzt4zXOYEAFpN93.ZVp3ApHfqCs2G1PyedwWwf0pDRr4mz6'),
(28, 'Louise', 'SOMABE', 'admin', 'louise@gmail.com', '$2y$10$MUortnM4zwVEFkIY0/71weUQCUqf.cXeRQdtb5aByr9Rxw/pIrr8a'),
(29, 'Zinsou', 'JOSEPH', 'user', 'zinsou@gmail.com', '$2y$10$prfqhqNMGYUsxjItHGFGEu4OesVtZ6/eH8Tjo5ax1SboFcpxNAmJW'),
(34, 'Brigitte', 'AMELAGODJI', 'user', 'brigitte@gmail.com', '$2y$10$STXccDae0IftaRAFhKTs6uSI24VCkrvLjijP1m5QSvwVwSzMvwyVS'),
(35, 'Yves', 'ADANVOESSI', 'user', 'yves@gmail.com', '$2y$10$LGGVoa4axqkvKTk.pMFxkOg5LRlvnawSFGz1tsHhyR0.eX0rCfqi.'),
(36, 'Justin', 'ADANVOESSI', 'user', 'justin@gmail.com', '$2y$10$gpNFI8w5hoh.VoIhDBQTZug90BuvKoSu3oTFCwesaXkUyYAIGgNt2'),
(37, 'Marcos', 'MEDENOU', 'user', 'marcos@gmail.com', '$2y$10$hkHbhVRemumEbmF9MIoyyuwUUqRSYDRigFlzRslJV8wlxSq0tg2De'),
(38, 'Donald', 'AHOSSI', 'user', 'donald@gmail.com', '$2y$10$0xPqElUDCMZY08ouHJwIMeqrBXLyBcQBC2zXmJWwEl1rxvIBe1oXS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`idGuide`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Index pour la table `tourisme`
--
ALTER TABLE `tourisme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGuide` (`idGuide`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `guide`
--
ALTER TABLE `guide`
  MODIFY `idGuide` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tourisme`
--
ALTER TABLE `tourisme`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tourisme`
--
ALTER TABLE `tourisme`
  ADD CONSTRAINT `tourisme_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `guide` (`idGuide`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
