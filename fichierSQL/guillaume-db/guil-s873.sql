-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 oct. 2021 à 11:07
-- Version du serveur :  8.0.21
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guil-s873`
--

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `staff_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `staff_firstName` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `staff_email` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `staff_password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `staff_phone` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_firstName`, `staff_email`, `staff_password`, `staff_phone`, `active`) VALUES
(1, 'DUJARDIN', 'Fabrice', 'fabricedujardin873@gmail.com', '123456', '72.01.65', 1),
(2, 'DUJARDIN', 'Guillaume', 'guillaumedujardin873@gmail.com', '123456', '92.13.29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `week`
--

DROP TABLE IF EXISTS `week`;
CREATE TABLE IF NOT EXISTS `week` (
  `week_id` int NOT NULL AUTO_INCREMENT,
  `week_monday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_tuesday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_wednesday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_thursday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_friday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_saturday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_sunday_morning` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_monday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_tuesday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_wednesday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_thursday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_friday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_saturday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `week_sunday_afternoon` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`week_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
