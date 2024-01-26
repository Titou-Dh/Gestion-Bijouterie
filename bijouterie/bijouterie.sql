-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 avr. 2023 à 01:29
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bijouterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`cat`) VALUES
('Bague'),
('bb'),
('Bracelet'),
('hghgh'),
('kjkjkj'),
('kk'),
('nn');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `numserie` varchar(20) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `qte` int(4) NOT NULL,
  `pu` decimal(8,3) NOT NULL,
  `poids` decimal(6,3) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `karat` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`numserie`, `libelle`, `qte`, `pu`, `poids`, `categorie`, `karat`) VALUES
('0012DDS', 'dsdsddddgvdg', 2, '122.000', '4.000', 'Bague', 9),
('0012DDSS', 'wxwxwxw', 3, '122.000', '4.000', 'Bague', 18),
('0013', 'B13', 5, '123.000', '-2.000', 'Bague', 18),
('00140014', 'BNBG', 1, '432.000', '114.000', 'Bague', 9),
('0014098', 'gdgdg', 2, '231.000', '4.000', 'Bague', 9),
('001412', 'dsdsddddgvdg', 2, '-1.000', '4.000', 'Bague', 9),
('0014121', 'B12', 1, '122.000', '4.000', 'Bague', 9),
('0014123', 'wxwxwxw', 2, '-2.000', '4.000', 'Bague', 9),
('00142344', 'dsdsddddgvdg', 1, '122.000', '4.000', 'Bague', 9),
('0014567', 'BN4545', 1, '123.000', '4.000', 'Bague', 9),
('0014654', 'wxwxwxw', 3, '231.000', '4.000', 'Bague', 9),
('0014655', 'dsdsddddgvdg', 1, '122.000', '4.000', 'Bague', 9),
('0014ACX', 'BA00243D', 3, '231.000', '2.000', 'Bague', 9),
('0014CSSE', 'BN4545', 3, '132.000', '4.000', 'Bague', 9),
('0014CVFF', 'ccccccc', 3, '132.000', '4.000', 'Bague', 9),
('0014CX', 'wxwxwxw', 2, '132.000', '4.000', 'Bague', 18),
('0014DAQSQSS', 'dsdsddddgvdg', 3, '123.000', '4.000', 'Bague', 9),
('0014DD', 'gdgdg', 2, '432.000', '4.000', 'Bague', 9),
('0014DDDD', 'dsdsddddgvdg', 3, '132.000', '4.000', 'Bague', 9),
('0014DDS', 'wxwxwxw', 3, '123.000', '4.000', 'bb', 9),
('0014DSS', 'gdgdg', 2, '132.000', '4.000', 'bb', 9),
('0014G', 'BN4545', 2, '123.000', '4.000', 'Bague', 18),
('0014hh', 'BN4545', 3, '123.000', '4.000', 'Bague', 9),
('0014HJJ', 'BN4545', 1, '132.000', '4.000', 'Bague', 9),
('0014HJK', 'B12', 1, '432.000', '4.000', 'Bague', 9),
('0014LK', 'gdgdg', 3, '231.000', '4.000', 'Bague', 18),
('0014QX', 'B12', 2, '231.000', '4.000', 'Bracelet', 18),
('0014SCX', 'gdgdg', 2, '123.000', '4.000', 'Bague', 9),
('0014SD', 'gdgdg', 1, '123.000', '4.000', 'Bague', 9),
('0014VC', 'dsdsddddgvdg', 2, '122.000', '4.000', 'Bague', 9),
('0014VD', 'dsdsddddgvdg', 2, '231.000', '4.000', 'Bague', 9),
('0014XSZ', 'wxwxwxw', 4, '132.000', '4.000', 'bb', 9),
('0014ZE', 'wxwxwxw', 2, '231.000', '4.000', 'bb', 9),
('0018', 'b18', 6, '231.000', '12.560', 'Bague', 18),
('0020', 'b020', 5, '123.000', '12.560', 'Bague', 9),
('12344', 'gdgdg', 1, '-1.000', '4.000', 'Bague', 9),
('azeaze', 'cvccv', 1, '123.000', '1.200', 'Bague', 9),
('B0021', 'B21', 13, '321.000', '21.000', 'Bague', 18),
('B0022', 'B22', 10, '432.000', '12.560', 'Bague', 18),
('B021', 'B20', 5, '231.000', '12.560', 'Bague', 18),
('B566', 'cvccv', 2, '123.000', '1.200', 'Bague', 18),
('B76', 'cvccv', 1, '123.000', '1.200', '', 0),
('BA45', 'BN4545', 1, '12.000', '12.560', 'Bague', 18),
('BN21', 'sdsdsdsd', 6, '122.000', '4.000', '', 0),
('BN45', 'BN4545', 12, '132.000', '4.000', '', 0),
('br001001', 'wxwxwxw', 2, '132.000', '3.600', 'Bague', 9),
('br00189', 'ccccccc', 1, '231.000', '4.000', 'Bague', 9),
('br001ADX', 'ccccccc', 3, '123.000', '4.000', 'Bague', 9),
('br001DDD', 'dsdsddddgvdg', 3, '231.000', '4.000', 'Bague', 9),
('br001VCD', 'dsdsddddgvdg', 2, '132.000', '4.000', 'Bague', 9),
('br002', 'br02', 7, '122.000', '12.560', 'Bracelet', 9),
('br003', 'br03', 11, '231.000', '12.560', 'Bracelet', 18),
('cdcd', 'ccccccc', 40, '231.000', '12.560', 'Bague', 9),
('kk01', 'k01', 6, '231.000', '12.000', 'kk', 18),
('nhhgh', 'dsdsddddgvdg', 1, '122.000', '4.000', 'Bague', 9),
('qsqsqs&&', 'sdsdsd', 1, '12.000', '4.000', 'Bague', 9),
('wxcwxc', 'wxcwxc', 6, '123.000', '12.560', 'Bague', 9),
('Xssds', 'BN4545', 3, '231.000', '4.000', 'Bague', 9);

-- --------------------------------------------------------

--
-- Structure de la table `stock0`
--

CREATE TABLE `stock0` (
  `numserie` varchar(20) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `qte` int(4) NOT NULL,
  `pu` decimal(8,3) NOT NULL,
  `poids` decimal(6,3) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `karat` int(2) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock0`
--

INSERT INTO `stock0` (`numserie`, `libelle`, `qte`, `pu`, `poids`, `categorie`, `karat`, `date`) VALUES
('0014', 'ccccccc', 0, '122.000', '0.000', 'Bague', 18, ''),
('0014', 'B12', 0, '132.000', '4.000', '', 0, '11-04-2023 01:18:05'),
('00141', 'vvvvv', 0, '432.000', '0.000', '', 0, '10-04-2023 16:27:32'),
('001414', 'gdgdg', 0, '132.000', '4.000', '', 0, '10-04-2023 17:48:18'),
('12', 'B12', 0, '165.000', '0.000', 'Bague', 18, ''),
('BA45', 'bbbbb', 0, '12.000', '0.000', 'Bague', 9, '10-04-2023 16:38:13'),
('bbb', 'ssdsds', 0, '12.790', '0.000', 'Bague', 18, ''),
('br001', 'br01', 0, '12.000', '0.000', 'Bracelet', 9, '10-04-2023 16:30:23'),
('br001', 'dddd', 0, '123.000', '0.000', 'Bague', 9, '10-04-2023 16:31:31'),
('cxws', 'dsdsd', 0, '12.000', '0.000', 'Bague', 18, ''),
('ddddd', 'ddddd', 0, '0.000', '0.000', 'Bague', 9, ''),
('mmmmm', 'aaaa', 0, '12.000', '0.000', 'Bague', 18, '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `user` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `niveau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user`, `email`, `pass`, `niveau`) VALUES
('khaled', 'khaledbenhloua77@gmail.com', '9af15b336e6a9619928537df30b2e6a2376569fcf9d7e773eccede65606529a0', 'Administrateur'),
('rhayem', '', '9af15b336e6a9619928537df30b2e6a2376569fcf9d7e773eccede65606529a0', 'Administrateur'),
('test', '', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'Administrateur'),
('test2', '', '60303ae22b998861bce3b28f33eec1be758a213c86c93c076dbe9f558c11c752', ''),
('test3', '', 'fd61a03af4f77d870fc21e05e7e80678095c92d808cfb3b5c279ee04c74aca13', ''),
('test4', '', 'a4e624d686e03ed2767c0abd85c14426b0b1157d2ce81d27bb4fe4f6f01d688a', '');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `numserie` varchar(20) NOT NULL,
  `pv` decimal(8,3) NOT NULL,
  `qtv` int(10) NOT NULL,
  `datev` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`numserie`, `pv`, `qtv`, `datev`, `user`) VALUES
('0012', '450.000', 1, '07-04-2023 22:40:02', 'khaled'),
('0014', '170.000', 1, '07-04-2023 23:01:49', 'khaled'),
('0015', '13.000', 1, '07-04-2023 23:03:21', 'khaled'),
('0014', '1020.000', 6, '07-04-2023 23:17:10', 'khaled'),
('00141', '1800.000', 4, '10-04-2023 16:24:43', 'khaled'),
('br001', '52.000', 4, '10-04-2023 16:30:23', 'khaled'),
('br001', '910.000', 7, '10-04-2023 16:31:31', 'khaled'),
('ba45', '26.000', 2, '10-04-2023 16:38:13', 'khaled'),
('001414', '135.000', 1, '10-04-2023 17:48:18', 'khaled'),
('0014014', '170.000', 1, '11-04-2023 00:28:41', 'khaled'),
('0014', '135.000', 1, '11-04-2023 01:18:05', 'khaled'),
('0014', '450.000', 1, '13-04-2023 15:25:42', 'khaled'),
('bbbnnnnn', '20.000', 1, '16-03-2023 18:37:22', 'khaled'),
('eee', '30.000', 2, '16-03-2023 23:38:06', 'test'),
('eee', '30.000', 2, '17-03-2023 09:31:18', 'khaled');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`cat`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numserie`),
  ADD KEY `catégorie` (`categorie`);

--
-- Index pour la table `stock0`
--
ALTER TABLE `stock0`
  ADD PRIMARY KEY (`numserie`,`date`),
  ADD KEY `catégorie` (`categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`user`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`datev`,`user`),
  ADD KEY `numserie` (`numserie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
