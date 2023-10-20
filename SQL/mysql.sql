-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 sep. 2023 à 05:11
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
-- Base de données : `pokemonzoo`
--
CREATE DATABASE IF NOT EXISTS `pokemonzoo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pokemonzoo`;

-- --------------------------------------------------------

--
-- Structure de la table `fences`
--

DROP TABLE IF EXISTS `fences`;
CREATE TABLE IF NOT EXISTS `fences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameFence` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `cleanliness` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `background` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
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
  `sex` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
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

--
-- Déchargement des données de la table `pokemons`
--

INSERT INTO `pokemons` (`idPokemon`, `age`, `sex`, `weight`, `height`, `health`, `hungry`, `sleepy`, `sleeping`, `sick`, `species_id`, `fence_id`) VALUES
(237, 7, 'male', 6, 44, 100, 1, 0, 0, 1, 31, 40),
(238, 7, 'male', 6, 44, 100, 0, 0, 0, 0, 31, 40),
(239, 7, 'female', 4, 30, 62, 1, 0, 0, 1, 25, 40),
(240, 7, 'male', 4, 30, 90, 1, 1, 0, 1, 25, 40),
(241, 7, 'female', 12, 73, 71, 0, 1, 0, 1, 10, 41),
(244, 5, 'female', 9, 55, 82, 0, 0, 0, 0, 5, 39),
(245, 0, 'male', 2, 12, 100, 1, 1, 0, 0, 25, 40),
(247, 1, 'male', 4, 32, 100, 0, 0, 0, 0, 31, 46),
(633, 12, 'female', 37, 158, 95, 1, 0, 0, 0, 9, 34),
(637, 12, 'female', 37, 134, 84, 1, 0, 0, 1, 9, 34),
(641, 11, 'female', 33, 125, 100, 0, 0, 1, 0, 42, 53),
(654, 11, 'male', 35, 165, 100, 0, 0, 1, 0, 56, 33),
(656, 11, 'female', 19, 167, 86, 0, 0, 1, 0, 63, 53),
(658, 11, 'female', 60, 100, 100, 1, 0, 0, 1, 69, 33),
(661, 6, 'female', 10, 50, 100, 0, 0, 0, 0, 8, 33),
(662, 6, 'female', 10, 50, 95, 1, 0, 0, 0, 8, 33),
(663, 6, 'male', 4, 37, 100, 0, 1, 0, 0, 33, 33),
(669, 6, 'female', 6, 50, 95, 0, 0, 0, 0, 31, 60),
(670, 10, 'female', 43, 141, 100, 0, 0, 0, 0, 12, 62),
(671, 9, 'male', 20, 90, 98, 0, 0, 0, 0, 12, 62),
(672, 8, 'female', 25, 87, 100, 0, 0, 0, 0, 7, 62),
(673, 8, 'male', 25, 87, 100, 0, 0, 1, 1, 7, 62),
(674, 3, 'female', 25, 87, 100, 0, 0, 0, 1, 7, 62),
(675, 1, 'female', 13, 39, 100, 0, 0, 0, 0, 7, 62),
(676, 0, 'female', 7, 15, 100, 1, 1, 0, 0, 7, 61),
(677, 0, 'male', 3, 20, 100, 0, 0, 1, 0, 31, 63),
(678, 0, 'female', 3, 20, 100, 0, 0, 1, 0, 53, 63),
(679, 0, 'male', 2, 12, 100, 0, 0, 1, 0, 66, 63),
(684, 4, 'female', 122, 200, 100, 1, 0, 0, 0, 34, 64),
(685, 2, 'male', 10, 50, 67, 0, 0, 1, 0, 5, 33),
(686, 0, 'female', 30, 80, 100, 0, 1, 0, 0, 5, 33);

-- --------------------------------------------------------

--
-- Structure de la table `species`
--

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `diet` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Type1` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Type2` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Legendary` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `species`
--

INSERT INTO `species` (`id`, `name`, `diet`, `Type1`, `Type2`, `avatar`, `Legendary`) VALUES
(5, 'Carapuce', 'Végétarien', 'Eau', NULL, 'images/carapuce.gif', 0),
(6, 'Salamèche', 'Carnivore', 'Feu', NULL, 'images/salamèche.gif', 0),
(7, 'Psykokwak', 'Végétarien', 'Eau', NULL, 'images/psykokwak.gif', 0),
(8, 'Carabaffe', 'Végétarien', 'Eau', NULL, 'images/carabaffe.gif', 0),
(9, 'Tortank', 'Omnivore', 'Eau', NULL, 'images/tortank.gif', 0),
(10, 'Reptincel', 'Carnivore', 'Feu', NULL, 'images/reptincel.gif', 0),
(11, 'Dracaufeu', 'Carnivore', 'Feu', 'Vol', 'images/dracaufeu.gif', 0),
(12, 'Akwakwak', 'Carnivore', 'Eau', NULL, 'images/akwakwak.gif', 0),
(13, 'Bulbizarre', 'Végétarien', 'Plante', 'Poison', 'images/bulbizarre.gif', 0),
(14, 'Herbizarre', 'Végétarien', 'Plante', 'Poison', 'images/herbizarre.gif', 0),
(15, 'Florizarre', 'Végétarien', 'Plante', 'Poison', 'images/florizarre.gif', 0),
(16, 'Chenipan', 'Végétarien', 'Insecte', NULL, 'images/chenipan.gif', 0),
(17, 'Chrysacier', 'Végétarien', 'Insecte', NULL, 'images/chrysacier.gif', 0),
(18, 'Papilusion', 'Omnivore', 'Insecte', 'Vol', 'images/papilusion.gif', 0),
(19, 'Aspicot', 'Omnivore', 'Insecte', 'Poison', 'images/aspicot.gif', 0),
(20, 'Coconfort', 'Omnivore', 'Insecte', 'Poison', 'images/coconfort.gif', 0),
(21, 'Dardagnan', 'Carnivore', 'Insecte', 'Poison', 'images/dardagnan.gif', 0),
(22, 'Roucool', 'Carnivore', 'Vol', NULL, 'images/roucool.gif', 0),
(23, 'Roucoups', 'Carnivore', 'Vol', NULL, 'images/roucoups.gif', 0),
(24, 'Roucarnage', 'Carnivore', 'Vol', NULL, 'images/roucarnage.gif', 0),
(25, 'Rattata', 'Omnivore', 'Normal', NULL, 'images/rattata.gif', 0),
(26, 'Rattatac', 'Omnivore', 'Normal', NULL, 'images/rattatac.gif', 0),
(27, 'Piafabec', 'Carnivore', 'Vol', NULL, 'images/piafabec.gif', 0),
(28, 'Rapasdepic', 'Carnivore', 'Vol', NULL, 'images/rapasdepic.gif', 0),
(29, 'Abo', 'Carnivore', 'Poison', NULL, 'images/abo.gif', 0),
(30, 'Arbok', 'Carnivore', 'Poison', NULL, 'images/arbok.gif', 0),
(31, 'Pikachu', 'Végétarien', 'Electric', NULL, 'images/pikachu.gif', 0),
(32, 'Raichu', 'Omnivore', 'Electric', NULL, 'images/raichu.gif', 0),
(33, 'Metamorph', 'Végétarien', 'Normal', NULL, 'images/metamorph.gif', 0),
(34, 'Mewtwo', 'Omnivore', 'Psy', NULL, 'images/mewtwo.gif', 1),
(35, 'Artikodin', 'Végétarien', 'Vol', 'Glace', 'images/artikodin.gif', 1),
(36, 'Electhor', 'Carnivore', 'Vol', 'Electric', 'images/electhor.gif', 1),
(37, 'Sulfura', 'Carnivore', 'Vol', 'Feu', 'images/sulfura.gif', 1),
(38, 'Minidraco', 'Végétarien', 'Dragon', NULL, 'images/minidraco.gif', 1),
(39, 'Draco', 'Omnivore', 'Dragon', NULL, 'images/draco.gif', 1),
(40, 'Dracolosse', 'Carnivore', 'Dragon', NULL, 'images/dracolosse.gif', 1),
(41, 'Sabelette', 'Végétarien', 'Sol', NULL, 'images/sabelette.gif', 0),
(42, 'Sablaireau', 'Omnivore', 'Sol', NULL, 'images/sablaireau.gif', 0),
(43, 'NidoranM', 'Carnivore', 'Poison', NULL, 'images/nidoranM.gif', 0),
(44, 'Nidorino', 'Carnivore', 'Poison', NULL, 'images/nidorino.gif', 0),
(45, 'Nidoking', 'Carnivore', 'Poison', NULL, 'images/nidoking.gif', 0),
(46, 'NidoranF', 'Végétarien', 'Poison', NULL, 'images/nidoranF.gif', 0),
(47, 'Nidorina', 'Végétarien', 'Poison', NULL, 'images/nidorina.gif', 0),
(48, 'Nidoqueen', 'Végétarien', 'Poison', NULL, 'images/nidoqueen.gif', 0),
(49, 'Mélofée', 'Végétarien', 'Normal', NULL, 'images/mélofée.gif', 0),
(50, 'Mélodelfe', 'Végétarien', 'Normal', NULL, 'images/melodelfe.gif', 0),
(51, 'Goupix', 'Carnivore', 'Feu', NULL, 'images/goupix.gif', 0),
(52, 'Feunard', 'Carnivore', 'Feu', NULL, 'images/feunard.gif', 0),
(53, 'Rondoudou', 'Végétarien', 'Normal', NULL, 'images/rondoudou.gif', 0),
(54, 'Grodoudou', 'Végétarien', 'Normal', NULL, 'images/grodoudou.gif', 0),
(55, 'Nosferapti', 'Carnivore', 'Poison', 'Vol', 'images/nosferapti.gif', 0),
(56, 'Nosferalto', 'Carnivore', 'Poison', 'Vol', 'images/nosferalto.gif', 0),
(57, 'Mystherbe', 'Végétarien', 'Plante', 'Poison', 'images/mystherbe.gif', 0),
(58, 'Ortide', 'Végétarien', 'Plante', 'Poison', 'images/ortide.gif', 0),
(59, 'Rafflesia', 'Végétarien', 'Plante', 'Poison', 'images/rafflesia.gif', 0),
(60, 'Paras', 'Omnivore', 'Insecte', 'Plante', 'images/paras.gif', 0),
(61, 'Parasect', 'Omnivore', 'Insecte', 'Plante', 'images/parasect.gif', 0),
(62, 'Mimitoss', 'Végétarien', 'Insecte', 'Poison', 'images/mimitoss.gif', 0),
(63, 'Aéromite', 'Végétarien', 'Insecte', 'Poison', 'images/aéromite.gif', 0),
(64, 'Taupiqueur', 'Omnivore', 'Sol', NULL, 'images/taupiqueur.gif', 0),
(65, 'Triopiqueur', 'Omnivore', 'Sol', NULL, 'images/triopiqueur.gif', 0),
(66, 'Miaouss', 'Carnivore', 'Normal', NULL, 'images/miaouss.gif', 0),
(67, 'Persian', 'Carnivore', 'Normal', NULL, 'images/persian.gif', 0),
(68, 'Magicarpe', 'Omnivore', 'Eau', NULL, 'images/magicarpe.gif', 0),
(69, 'Leviator', 'Omnivore', 'Eau', 'Vol', 'images/leviator.gif', 0);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameEmployee` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
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
  `nameZoo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
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
  ADD CONSTRAINT `species_of_animal` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `zoo_of_staff` FOREIGN KEY (`zoo_id`) REFERENCES `zoo` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
