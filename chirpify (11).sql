-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 apr 2023 om 16:08
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chirpify`
--
CREATE DATABASE IF NOT EXISTS `chirpify` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chirpify`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `dob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `dob`) VALUES
(58, 'PP_SLAYER_TIFFANY', 'test1@gmail.com', '$2y$10$X03XC6yp31ZJrUGmNxKM2OIH2JZVdsPECiEkWdamKLIBKkDD2SZ.6', 1111),
(59, 'PEREN_SAPP', 'test2@gmail.com', '$2y$10$L1Gey9u9Id8PQhTwy547s.vj580SH1rINaXrS.1Nb2W9wQ4dXHXhu', 1111),
(60, 'savannah', 'test3@gmail.com', '$2y$10$8VIkKS9SnyWEMVt4I56t2O/OImmUaojjOlyyrKC28Rv8UYWIihEpm', 1111),
(61, 'Sam', 'test4@gmail.com', '$2y$10$3LWg0vh.3866ny4Ngktd0Od9Qly9We18Ej2p26aOXg5y9x6B1vEae', 1111),
(62, 'Floortje ', 'test5@gmail.com', '$2y$10$zzxrz2LY4rWTZ295GjjSyuzrokO29se8.u0Q/i.WGWnc6DCd57DBG', 1111),
(63, 'Eduwardes', 'test6@gmail.com', '$2y$10$mmavafL7DW.vk7X8eQWJhegPtuLEuOASx6TamPXR0UeyAJXkUPnnm', 1212);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `tweet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `likes`
--

INSERT INTO `likes` (`id`, `account_id`, `tweet_id`) VALUES
(180, 58, 70),
(181, 58, 71),
(182, 58, 72),
(183, 58, 75),
(184, 58, 73);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `title` varchar(75) DEFAULT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `account_id` int(11) DEFAULT NULL,
  `account_username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `tweets`
--

INSERT INTO `tweets` (`id`, `title`, `content`, `likes`, `account_id`, `account_username`) VALUES
(70, 'doe het plz', 'plzzzzzz', 1, 58, 'PP_SLAYER_TIFFANY'),
(71, 'PP SLAYER TIFFANY ', 'Als je het nu niet d\'s vermorden', 1, 58, 'PP_SLAYER_TIFFANY'),
(72, 'Hi ik ben Savannah', '#rainbow', 1, 60, 'savannah'),
(73, 'pure pijn en drugs ', '', 1, 62, 'Floortje '),
(75, 'PP SLAYER NEVER DIES ', 'Dying is a skill issue ', 1, 58, 'PP_SLAYER_TIFFANY');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_user` (`account_id`),
  ADD KEY `tweet_user` (`tweet_id`);

--
-- Indexen voor tabel `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_to_account_id` (`account_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT voor een tabel `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `account_user` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tweet_user` FOREIGN KEY (`tweet_id`) REFERENCES `tweets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `id_to_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
