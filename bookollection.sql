-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 avr. 2023 à 00:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `bookollection`
--

-- --------------------------------------------------------

CREATE TABLE `ajoutcollection` (
  `idUtilisateur` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `avis` varchar(200) DEFAULT NULL,
  `lu` tinyint(1) NOT NULL,
  `possede` tinyint(1) NOT NULL,
  `ajout` tinyint(1) NOT NULL,
  `dateCommentaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `ajoutevenement` (
  `idUtilisateur` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `auteur` (
  `idAuteur` int(11) NOT NULL,
  `nomAuteur` varchar(20) NOT NULL,
  `prenomAuteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `ecritpar` (
  `idLivre` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `enventesur` (
  `idLivre` int(11) NOT NULL,
  `idSite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nomEvenement` varchar(100) NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `description` text NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `nomGenre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `livre` (
  `idLivre` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `couverture` varchar(100) NOT NULL,
  `dateParution` date DEFAULT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `livreestregistre` (
  `idlivre` int(11) NOT NULL,
  `idregistre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `registre` (
  `idRegistre` int(11) NOT NULL,
  `nomRegistre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `sitecommercial` (
  `idSite` int(11) NOT NULL,
  `nomSite` varchar(20) NOT NULL,
  `urlSite` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(20) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `dateNaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `ajoutcollection`
  ADD PRIMARY KEY (`idUtilisateur`,`idLivre`),
  ADD KEY `idLivre` (`idLivre`);


ALTER TABLE `ajoutevenement`
  ADD PRIMARY KEY (`idUtilisateur`,`idEvenement`),
  ADD KEY `idEvenement` (`idEvenement`);


ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idAuteur`);


ALTER TABLE `ecritpar`
  ADD PRIMARY KEY (`idLivre`,`idAuteur`),
  ADD KEY `idAuteur` (`idAuteur`);


ALTER TABLE `enventesur`
  ADD PRIMARY KEY (`idLivre`,`idSite`),
  ADD KEY `idSite` (`idSite`);


ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`);


ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `nomGenre` (`nomGenre`);


ALTER TABLE `livre`
  ADD PRIMARY KEY (`idLivre`),
  ADD KEY `idGenre` (`idGenre`);


ALTER TABLE `livreestregistre`
  ADD PRIMARY KEY (`idlivre`,`idregistre`),
  ADD KEY `idregistre` (`idregistre`);


ALTER TABLE `registre`
  ADD PRIMARY KEY (`idRegistre`),
  ADD UNIQUE KEY `nomRegistre` (`nomRegistre`);


ALTER TABLE `sitecommercial`
  ADD PRIMARY KEY (`idSite`),
  ADD UNIQUE KEY `nomSite` (`nomSite`),
  ADD UNIQUE KEY `urlSite` (`urlSite`);


ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `ajoutcollection`
  ADD CONSTRAINT `ajoutcollection_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `ajoutcollection_ibfk_2` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);


ALTER TABLE `ajoutevenement`
  ADD CONSTRAINT `ajoutevenement_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `ajoutevenement_ibfk_2` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`);


ALTER TABLE `ecritpar`
  ADD CONSTRAINT `ecritpar_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `ecritpar_ibfk_2` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`);


ALTER TABLE `enventesur`
  ADD CONSTRAINT `enventesur_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `enventesur_ibfk_2` FOREIGN KEY (`idSite`) REFERENCES `sitecommercial` (`idSite`);


ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`);

ALTER TABLE `livreestregistre`
  ADD CONSTRAINT `livreestregistre_ibfk_1` FOREIGN KEY (`idRegistre`) REFERENCES `registre` (`idRegistre`),
  ADD CONSTRAINT `livreestregistre_ibfk_2` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);

COMMIT;
