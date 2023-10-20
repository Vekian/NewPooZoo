-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 05 sep. 2023 à 06:24
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `newpokemonzoo`
--
CREATE DATABASE IF NOT EXISTS `newpokemonzoo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `newpokemonzoo`;

-- --------------------------------------------------------

--
-- Structure de la table `fences`
--

DROP TABLE IF EXISTS `fences`;
CREATE TABLE IF NOT EXISTS `fences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameFence` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cleanliness` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `background` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `population` int NOT NULL,
  `zoo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zoo_id` (`zoo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fences`
--

INSERT INTO `fences` (`id`, `nameFence`, `cleanliness`, `type`, `background`, `population`, `zoo_id`) VALUES
(33, 'Reserve', 'Propre', 'Reserve', 'images/reserve.jpg', 7, 6),
(34, 'Enclos de la poiscaille', 'Propre', 'Aquarium', 'images/aquarium.jpg', 2, 6),
(39, 'Reserve', 'Correct', 'Reserve', 'images/reserve.jpg', 3, 7),
(40, 'Garage404', 'Propre', 'City', 'images/city.jpg', 5, 7),
(41, 'Prairie', 'Correct', 'Normal', 'images/normal.jpg', 1, 7),
(45, 'Reserve', 'Propre', 'Reserve', 'images/reserve.jpg', 0, 8),
(46, 'Saint-Germain', 'Propre', 'City', 'images/city.jpg', 1, 8),
(53, 'Grotte', 'Propre', 'Cavern', 'images/cavern.jpg', 2, 6),
(60, 'Mélanie', 'Propre', 'City', 'images/city.jpg', 1, 6),
(61, 'Reserve', 'Propre', 'Reserve', 'images/reserve.jpg', 1, 9),
(62, 'Forêt', 'Correct', 'Aquarium', 'images/aquarium.jpg', 6, 9),
(63, 'Prairie', 'Propre', 'Normal', 'images/normal.jpg', 3, 9),
(64, 'Grotte', 'Propre', 'Legendaire', 'images/legendaire.jpg', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `pokemons`
--

DROP TABLE IF EXISTS `pokemons`;
CREATE TABLE IF NOT EXISTS `pokemons` (
  `idPokemon` int NOT NULL AUTO_INCREMENT,
  `age` int NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `weight` int NOT NULL,
  `height` int NOT NULL,
  `health` int NOT NULL DEFAULT '100',
  `hungry` tinyint(1) NOT NULL,
  `sleepy` tinyint(1) NOT NULL,
  `sleeping` tinyint(1) NOT NULL,
  `sick` tinyint(1) NOT NULL,
  `species_id` int NOT NULL,
  `fence_id` int DEFAULT NULL,
  PRIMARY KEY (`idPokemon`),
  KEY `fence_id` (`fence_id`),
  KEY `species_id` (`species_id`)
) ENGINE=InnoDB AUTO_INCREMENT=687 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `diet` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Type1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Type2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `minWeight` int NOT NULL,
  `minHeight` int NOT NULL,
  `maxWeight` int NOT NULL,
  `maxHeight` int NOT NULL,
  `lifeExpectancy` int NOT NULL,
  `ageEvolution` int DEFAULT NULL,
  `idEvolution` int DEFAULT NULL,
  `nameEvolution` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `popularity` int NOT NULL,
  `babyId` int NOT NULL,
  `Legendary` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`id`, `name`, `sex`, `diet`, `Type1`, `Type2`, `avatar`, `minWeight`, `minHeight`, `maxWeight`, `maxHeight`, `lifeExpectancy`, `ageEvolution`, `idEvolution`, `nameEvolution`, `popularity`, `babyId`, `Legendary`) VALUES
(1, 'Bulbizarre', 'Random', 'Végétarien', 'Plante', 'Poison', 'images/bulbizarre.gif', 2, 12, 7, 70, 10, 5, 2, 'Herbizarre', 10, 1, 0),
(2, 'Herbizarre', 'Random', 'Végétarien', 'Plante', 'Poison', 'images/herbizarre.gif', 8, 70, 13, 100, 15, 10, 3, 'Florizarre', 20, 13, 0),
(3, 'Florizarre', 'Random', 'Omnivore', 'Plante', 'Poison', 'images/florizarre.gif', 30, 110, 100, 200, 20, NULL, NULL, NULL, 40, 1, 0),
(4, 'Salamèche', 'Random', 'Carnivore', 'Feu', NULL, 'images/salamèche.gif', 2, 12, 8, 60, 10, 5, 5, 'Reptincel', 10, 4, 0),
(5, 'Reptincel', 'Random', 'Carnivore', 'Feu', NULL, 'images/reptincel.gif', 7, 48, 19, 110, 15, 10, 6, 'Dracaufeu', 20, 4, 0),
(6, 'Dracaufeu', 'Random', 'Carnivore', 'Feu', 'Vol', 'images/dracaufeu.gif', 30, 150, 91, 200, 20, NULL, NULL, NULL, 40, 4, 0),
(7, 'Carapuce', 'Random', 'Végétarien', 'Eau', NULL, 'images/carapuce.gif', 3, 10, 9, 50, 10, 5, 8, 'Carabaffe', 10, 7, 0),
(8, 'Carabaffe', 'Random', 'Omnivore', 'Eau', NULL, 'images/carabaffe.gif', 10, 35, 23, 100, 15, 10, 9, 'Tortank', 20, 7, 0),
(9, 'Tortank', 'Random', 'Omnivore', 'Eau', NULL, 'images/tortank.gif', 30, 80, 86, 160, 20, NULL, NULL, NULL, 40, 7, 0),
(10, 'Chenipan', 'Random', 'Végétarien', 'Insecte', NULL, 'images/chenipan.gif', 1, 12, 3, 30, 10, 5, 11, 'Chrysacier', 10, 10, 0),
(11, 'Chrysacier', 'Random', 'Omnivore', 'Insecte', NULL, 'images/chrysacier.gif', 4, 15, 10, 70, 15, 10, 12, 'Papilusion', 15, 10, 0),
(12, 'Papilusion', 'Random', 'Omnivore', 'Insecte', 'Vol', 'images/papilusion.gif', 15, 80, 32, 110, 20, NULL, NULL, NULL, 30, 10, 0),
(13, 'Aspicot', 'Random', 'Végétarien', 'Insecte', 'Poison', 'images/aspicot.gif', 1, 12, 3, 30, 10, 5, 14, 'Coconfort', 10, 13, 0),
(14, 'Coconfort', 'Random', 'Omnivore', 'Insecte', 'Poison', 'images/coconfort.gif', 4, 30, 10, 60, 15, 10, 15, 'Dardagnan', 20, 13, 0),
(15, 'Dardagnan', 'Random', 'Carnivore', 'Insecte', 'Poison', 'images/dardagnan.gif', 10, 60, 30, 100, 20, NULL, NULL, NULL, 30, 13, 0),
(16, 'Roucool', 'Random', 'Carnivore', 'Vol', 'Normal', 'images/roucool.gif', 1, 15, 2, 30, 10, 5, 17, 'Roucoups', 10, 16, 0),
(17, 'Roucoups', 'Random', 'Carnivore', 'Vol', 'Normal', 'images/roucoups.gif', 5, 40, 30, 100, 15, 10, 18, 'Roucarnage', 20, 16, 0),
(18, 'Roucarnage', 'Random', 'Carnivore', 'Vol', 'Normal', 'images/roucarnage.gif', 30, 100, 40, 150, 20, NULL, NULL, NULL, 40, 16, 0),
(19, 'Rattata', 'Random', 'Carnivore', 'Normal', NULL, 'images/rattata.gif', 2, 12, 4, 30, 10, 8, 20, 'Rattatac', 5, 19, 0),
(20, 'Rattatac', 'Random', 'Carnivore', 'Normal', NULL, 'images/rattatac.gif', 4, 30, 19, 70, 18, NULL, NULL, NULL, 10, 19, 0),
(21, 'Piafabec', 'Random', 'Carnivore', 'Vol', 'Normal', 'images/piafabec.gif', 1, 12, 2, 30, 10, 8, 22, 'Rapasdepic', 5, 21, 0),
(22, 'Rapasdepic', 'Random', 'Carnivore', 'Vol', 'Normal', 'images/rapasdepic.gif', 3, 30, 38, 120, 10, NULL, NULL, NULL, 15, 21, 0),
(23, 'Abo', 'Random', 'Carnivore', 'Poison', NULL, 'images/abo.gif', 3, 100, 7, 150, 12, 8, 24, 'Arbok', 10, 23, 0),
(24, 'Arbok', 'Random', 'Carnivore', 'Poison', NULL, 'images/arbok.gif', 30, 200, 65, 300, 20, NULL, NULL, NULL, 28, 23, 0),
(25, 'Pikachu', 'Random', 'Végétarien', 'Electrik', NULL, 'images/pikachu.gif', 3, 20, 6, 40, 16, 10, 26, 'Raichu', 35, 25, 0),
(26, 'Raichu', 'Random', 'Végétarien', 'Electrik', NULL, 'images/raichu.gif', 10, 35, 30, 80, 20, NULL, NULL, NULL, 15, 25, 0),
(27, 'Sabelette', 'Random', 'Végétarien', 'Sol', NULL, 'images/sabelette.gif', 4, 25, 12, 60, 10, 5, 28, 'Sablaireau', 10, 27, 0),
(28, 'Sablaireau', 'Random', 'Végétarien', 'Sol', NULL, 'images/sablaireau.gif', 15, 65, 30, 100, 20, NULL, NULL, NULL, 25, 27, 0),
(29, 'NidoranF', 'Female', 'Végétarien', 'Poison', NULL, 'images/nidoranF.gif', 3, 20, 7, 40, 10, 5, 30, 'Nidorina', 10, 29, 0),
(30, 'Nidorina', 'Female', 'Omnivore', 'Poison', NULL, 'images/nidorina.gif', 8, 45, 20, 80, 15, 10, 31, 'Nidoqueen', 20, 29, 0),
(31, 'Nidoqueen', 'Female', 'Carnivore', 'Poison', NULL, 'images/nidoqueen.gif', 10, 60, 60, 130, 20, NULL, NULL, NULL, 40, 29, 0),
(32, 'NidoranM', 'Male', 'Omnivore', 'Poison', NULL, 'images/nidoranM.gif', 4, 25, 9, 50, 10, 5, 33, 'Nidorino', 10, 31, 0),
(33, 'Nidorino', 'Male', 'Carnivore', 'Poison', NULL, 'images/nidorino.gif', 11, 55, 20, 90, 15, 10, 34, 'Nidoking', 20, 32, 0),
(34, 'Nidoking', 'Male', 'Carnivore', 'Poison', NULL, 'images/nidoking.gif', 30, 65, 62, 140, 20, NULL, NULL, NULL, 40, 32, 0),
(35, 'Mélofée', 'Random', 'Végétarien', 'Normal', NULL, 'images/mélofée.gif', 3, 20, 8, 60, 12, 8, 36, 'Mélodelfe', 10, 35, 0),
(36, 'Mélodelfe', 'Random', 'Végétarien', 'Normal', NULL, 'images/mélodelfe.gif', 15, 60, 40, 130, 18, NULL, NULL, NULL, 25, 35, 0);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameEmployee` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zoo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `zoo_id` (`zoo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`id`, `nameEmployee`, `age`, `sex`, `zoo_id`) VALUES
(6, 'Robert', 20, 'male', 6),
(7, 'Alexandre', 34, 'male', 7),
(8, 'Mathieu', 31, 'male', 8),
(9, 'Damien', 16, 'female', 9);

-- --------------------------------------------------------

--
-- Structure de la table `zoo`
--

DROP TABLE IF EXISTS `zoo`;
CREATE TABLE IF NOT EXISTS `zoo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameZoo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numberMaxFences` int NOT NULL,
  `pokedollars` int NOT NULL,
  `time` int NOT NULL,
  `popularity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `zoo`
--

INSERT INTO `zoo` (`id`, `nameZoo`, `password`, `numberMaxFences`, `pokedollars`, `time`, `popularity`) VALUES
(6, 'Zoo de Roanne', '$2y$10$WyPP3Ik4vNh0qwOVeYmkmeYM7ugHV94MW4.rivSo4nqd766.Yg9S.', 4, -8444, 162, 291),
(7, 'Zoo de Hamza', '$2y$10$HSoYXY4Q1iTdp6EH9T/vg.aYZT07rqooFB0/94qLiin1R.ldPymBm', 4, 231, 7, 115),
(8, 'Zoo de Mélanie', '$2y$10$GildiSD0wnKAmo5ITMt9auyB.gs.I5yRhMOk5sr198wy2E8pfjRB.', 4, 25, 1, 25),
(9, 'Zoo de quentin', '$2y$10$oD48qarcLiNLJEdLKKFrxeS08o7UT/JQP/zKB4LNBdQ0X.LowvXoG', 4, -66, 10, 130);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fences`
--
ALTER TABLE `fences`
  ADD CONSTRAINT `fence_of_zoo` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pokemons`
--
ALTER TABLE `pokemons`
  ADD CONSTRAINT `fence_of_animal` FOREIGN KEY (`fence_id`) REFERENCES `fences` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specie_of_animal` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `zoo_of_staff` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
