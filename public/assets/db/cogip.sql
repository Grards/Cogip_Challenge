-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 juil. 2023 à 13:52
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `tva` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `type_id`, `country`, `tva`, `created_at`, `updated_at`) VALUES
(11, 'Acme Corporation', 1, 'United States', 'US12345678', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(12, 'Global Widgets Inc.', 2, 'France', 'FR12345678901', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(13, 'Stellar Solutions Ltd.', 1, 'Germany', 'DE123456789', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(14, 'Pacific Ventures', 1, 'United States', 'US98765432', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(15, 'Nexus Industries', 2, 'Germany', 'DE123456789', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(16, 'Quantum Innovations', 2, 'France', 'FR55555555555', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(17, 'Swift Enterprises', 1, 'France', 'FR24681357903', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(18, 'Elite Systems Group', 2, 'United States', 'US24681357', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(19, 'Zenith Technologies', 1, 'France', 'FR98765432109', '2023-07-04 14:07:31', '2023-07-04 14:07:31'),
(20, 'Sunrise Logistics', 1, 'India', 'IN1234567890', '2023-07-04 14:07:31', '2023-07-04 14:07:31');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `company_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 11, 'john.doe@example.com', '1234567890', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(2, 'Jane Smith', 12, 'jane.smith@example.com', '9876543210', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(3, 'Michael Johnson', 12, 'michael.johnson@example.com', '5555555555', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(4, 'Emily Davis', 14, 'emily.davis@example.com', '9999999999', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(5, 'David Wilson', 15, 'david.wilson@example.com', '1111111111', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(6, 'Sarah Brown', 16, 'sarah.brown@example.com', '2222222222', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(7, 'Robert Taylor', 17, 'robert.taylor@example.com', '3333333333', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(8, 'Jessica Clark', 17, 'jessica.clark@example.com', '4444444444', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(9, 'William Anderson', 17, 'william.anderson@example.com', '6666666666', '2023-07-04 14:19:14', '2023-07-04 14:19:14'),
(10, 'Olivia Martinez', 19, 'olivia.martinez@example.com', '7777777777', '2023-07-04 14:19:14', '2023-07-04 14:19:14');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `id_company` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `ref`, `id_company`, `created_at`, `updated_at`, `due_date`, `price`) VALUES
(11, 'INV-001', 11, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-07 16:55:49', 0),
(12, 'INV-002', 11, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-08 15:35:12', 0),
(13, 'INV-003', 13, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-09 11:31:59', 0),
(14, 'INV-004', 13, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-10 09:41:31', 0),
(15, 'INV-005', 13, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-11 10:09:01', 0),
(16, 'INV-006', 14, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-12 08:13:40', 0),
(17, 'INV-007', 17, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-13 16:10:25', 0),
(18, 'INV-008', 18, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-14 14:20:12', 0),
(19, 'INV-009', 18, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-15 13:59:02', 0),
(20, 'INV-010', 19, '2023-07-04 14:17:27', '2023-07-04 14:17:27', '2023-07-16 17:33:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'read', '2023-07-04 12:24:13', '2023-07-04 12:24:13'),
(2, 'create', '2023-07-04 12:24:13', '2023-07-04 12:24:13'),
(3, 'update', '2023-07-04 12:24:13', '2023-07-04 12:24:13'),
(4, 'delete', '2023-07-04 12:24:13', '2023-07-04 12:24:13');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2023-07-04 12:13:07', '2023-07-04 12:13:07'),
(2, 'moderator', '2023-07-04 12:13:07', '2023-07-04 12:13:07'),
(3, 'admin', '2023-07-04 12:13:07', '2023-07-04 12:13:07');

-- --------------------------------------------------------

--
-- Structure de la table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 3),
(6, 2, 3),
(7, 3, 3),
(8, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Supplier', '2023-07-04 12:15:38', '2023-07-04 12:15:38'),
(2, 'Client', '2023-07-04 12:15:38', '2023-07-04 12:15:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `role_id`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'John', 1, 'Doe', 'john.doe@example.com', 'becode', '2023-07-04 12:27:21', '2023-07-04 12:27:21'),
(4, 'Muriel', 2, 'Smith', 'muriel.smith@example.com', 'becode', '2023-07-04 12:27:21', '2023-07-04 12:27:21'),
(5, 'Jean', 3, 'Christian', 'jean-christian@cogip.com', 'becode', '2023-07-04 12:27:21', '2023-07-04 12:27:21'),
(6, 'Bob', 1, 'Brown', 'bob.brown@example.com', 'becode', '2023-07-04 12:27:21', '2023-07-04 12:27:21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_company` (`id_company`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id`);

--
-- Contraintes pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
