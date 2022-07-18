-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 juil. 2022 à 15:29
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(100) NOT NULL,
  `incoming_id` int(255) NOT NULL,
  `outgoing_id` int(255) NOT NULL,
  `message` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`message_id`, `incoming_id`, `outgoing_id`, `message`) VALUES
(1, 1657028434, 1439305516, 'hi murat'),
(2, 1657028434, 1439305516, 'how are you doing my buddy'),
(3, 1657028434, 1439305516, 'Please Tell me if you\'re okay'),
(4, 1657028434, 1439305516, 'i\'m really woried'),
(5, 1657028434, 1439305516, 'common my friend ...'),
(6, 1657028434, 1439305516, 'are you kidding'),
(7, 1657028434, 1439305516, 'are you kidding'),
(8, 1657028434, 1439305516, 'are you kidding'),
(9, 1657028434, 1439305516, 'are you kidding'),
(10, 1657028434, 1439305516, 'are you kidding'),
(11, 1657028434, 1439305516, 'are you kidding'),
(12, 1657028434, 1439305516, 'are you kidding'),
(13, 1657028434, 1439305516, 'are you kidding'),
(14, 1657028434, 1439305516, 'are you kidding'),
(15, 1657028434, 1439305516, 'can you please'),
(16, 1657028434, 1439305516, 'youre right im a dick'),
(17, 1657028434, 1439305516, 'can you please call me'),
(18, 1657028434, 1439305516, 'im wondering'),
(19, 1657028434, 1439305516, 'gofuck you\'re self'),
(20, 1657028434, 1439305516, 'bad ass hole'),
(21, 1657028434, 1439305516, 'go home buddy'),
(22, 1657028434, 1439305516, 'go hommies'),
(23, 1657028434, 1439305516, 'go hommies'),
(24, 1657028434, 1439305516, 'how are you doing'),
(25, 1657028434, 1439305516, 'really'),
(26, 1657028434, 1439305516, 'common bro'),
(27, 1657028434, 1439305516, 'go ahead speak'),
(28, 1657028434, 1439305516, 'right'),
(29, 1657028434, 400693907, 'hi Mazen How Are You ?'),
(30, 1418883892, 1657028434, 'Hi Larbi ...'),
(31, 1657028434, 1418883892, 'hello beauty ...'),
(32, 1418883892, 1657028434, 'so whats are you doing ?'),
(33, 1657028434, 1418883892, 'Nothing just Coding'),
(34, 1418883892, 1657028434, 'Good For You ,we should keep up with the competition'),
(35, 1657028434, 1418883892, 'yeah of course im planning on copeting on hackerrank'),
(36, 1657028434, 1439305516, 'Common bro'),
(37, 1657028434, 1439305516, 'Really bro'),
(38, 1657028434, 1439305516, 'are you kidding'),
(39, 1657028434, 1439305516, 'Fuck You'),
(40, 1657028434, 80533504, 'hi'),
(41, 1657028434, 80533504, 'hi'),
(42, 1657028434, 1439305516, 'go to hell'),
(43, 1657028434, 1439305516, ''),
(44, 1657028434, 1439305516, 'bro take it easy'),
(45, 1657028434, 80533504, 'hello'),
(46, 1418883892, 1657028434, 'are you free this night '),
(47, 1418883892, 1657028434, 'i need you to go out with me'),
(48, 1657028434, 1418883892, 'yeah of course it gonna be fun'),
(49, 1418883892, 1657028434, 'so we will meet to night'),
(50, 1657028434, 1418883892, 'right :)'),
(51, 1418883892, 400693907, 'how are you bro??'),
(52, 1418883892, 1657028434, 'So probably i might not meet you to night is it normal'),
(53, 1657028434, 1418883892, 'yeah of course there is no problem :('),
(54, 1577316852, 1439305516, 'Hi There Murat');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(128) NOT NULL,
  `unique_id` int(128) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(512) NOT NULL DEFAULT 'profile-male.svg',
  `status` varchar(256) NOT NULL,
  `uid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `image`, `status`, `uid`) VALUES
(37, 1657028434, 'Larbi', 'Wiran', 'admin@gmail.com', '$2y$10$ozW/z1b1nZu91M6LQRgNxOGVzRsqllAdC7GErdW1k0qY.XqapdrZO', '1657755490téléchargement.jpg', 'Active now', 'Larbi2001'),
(38, 1439305516, 'Murat', 'Fahim', 'admin2@gmail.com', '$2y$10$humrib3mZR4LHvlsKjboTOxQHLNqtSnAW1ms3TjRpSrmAvSZ6Kfc2', '1657906298mcgregor.jpg', 'Active now', 'Murat2'),
(39, 80533504, 'Nadya', 'Schumar', 'admin3@gmail.com', '$2y$10$4K9vfIXZQN5rjtEv/U/pa.3qWXwMpr9VEx8ezCDdG5gfHXyMybVk2', 'profile-male.svg', 'Active now', 'uid'),
(40, 1418883892, 'Manal', 'Ziraoui', 'admin4@gmail.com', '$2y$10$e3mE3pRGbl4YEqEPdiTC3.ymHLt6U6VEprWLPoqltZFUN9ebqDfIa', 'profile-male.svg', 'Active now', 'uid'),
(41, 400693907, 'Mazen', 'Adama', 'admin5@gmail.com', '$2y$10$M5woA1fQLoNtTV1N3Z/4Yu2WIMIW.ctnd7zT5jjwJLEdQsJ74t2h6', '1657907545Fayol.jpeg', 'deconnected', 'Mazen45'),
(42, 1577316852, 'Muhammed', 'Imranni', 'admin6@gmail.com', '$2y$10$ZNz4BnYK0aSXF1wJX11Q.OCFMMtjL/0Afk96cZa59VtRQJqrZNRV.', '1658146736generated_photos_5e68893c6d3b380006f22fa5.jpg', 'Active now', 'moha4452');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
