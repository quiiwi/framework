-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Juin 2017 à 17:35
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(1, 2, 45, '2017-05-04 13:09:05', 'en cours de traitement'),
(2, 2, 45, '2017-05-04 14:54:15', 'en cours de traitement'),
(3, 2, 94, '2017-05-04 16:53:55', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 1, 6, 1, 45),
(2, 2, 6, 1, 45),
(3, 3, 5, 1, 49),
(4, 3, 6, 1, 45);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'm', 'test', 75000, 'test', 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dupon', 'Jean', 'jean.dupon@mail.fr', 'm', 'Paris', 75014, 'Bd Denfert-Rochereau', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(7, 'pantalon2', 'pantalon', 'pantalon blanc', 'Lorem ipsum dolor sit amet.', 'blanc', 'S', 'm', 'pantalon2_pantalon2.jpg', 65, 40),
(8, 'pull2', 'pull', 'pull gris', 'Lorem ipsum dolor sit amet.', 'gris', 'L', 'm', 'pull2_pull2.jpg', 55, 40),
(9, 'pull3', 'pull', 'pull laine', 'Lorem ipsum dolor sit amet.', 'gris chiné', 'M', 'm', 'pull3_pull2.jpg', 55, 70),
(10, 'robe1', 'robe', 'robe noire', 'Lorem ipsum dolor sit amet.', 'noir', 'S', 'f', 'robe1_robe1.jpg', 75, 100),
(11, 'robe2', 'robe', 'robe rouge', 'Lorem ipsum dolor sit amet.', 'rouge', 'M', 'f', 'robe2_robe2.jpg', 75, 120),
(12, 'dqsdqsd', 'pantalon', 'wxcwxxc', 'sdqsdqs d qd qsdqd qdqs qsd qq qsd qsd', 'blanc', 'S', 'm', 'dqdqsd.jpg', 15, 15),
(13, 'dqsdqsd', 'pantalon', 'wxcwxxc', 'sdqsdqs d qd qsdqd qdqs qsd qq qsd qsd', 'blanc', 'S', 'm', 'dqdqsd.jpg', 15, 15);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
