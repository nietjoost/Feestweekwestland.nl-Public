-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 apr 2021 om 19:14
-- Serverversie: 10.4.18-MariaDB
-- PHP-versie: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feestweekwestland`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dorp`
--

DROP TABLE IF EXISTS `dorp`;
CREATE TABLE `dorp` (
  `id` int(11) NOT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `img` varchar(30) NOT NULL DEFAULT '/img/dorpen/default.jpg',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `dorp`
--

INSERT INTO `dorp` (`id`, `naam`, `img`, `updated_at`, `created_at`) VALUES
(6, 'Poeldijk', '/img/dorpen/default.jpg', '2021-04-30', '2021-04-30'),
(7, 'Naaldwijk', '/img/dorpen/default.jpg', '2021-04-30', '2021-04-30'),
(8, 'Wateringen', '/img/dorpen/default.jpg', '2021-04-30', '2021-04-30'),
(9, '\'s-Gravenzande', '/img/dorpen/default.jpg', '2021-04-30', '2021-04-30'),
(10, 'Monster', '/img/dorpen/default.jpg', '2021-04-30', '2021-04-30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `dorp_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `opmerking` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `evenement`
--

INSERT INTO `evenement` (`id`, `naam`, `dorp_id`, `img`, `start_date`, `end_date`, `opmerking`, `created_at`, `updated_at`) VALUES
(2, 'Feestweek Poeldijk', 6, NULL, '2021-08-26', '2021-08-30', 'Het dorps feest van het Westland', '2021-04-30', '2021-04-30'),
(3, 'Feestweek Naaldwijk', 7, NULL, '2021-08-23', '2021-08-29', 'De beste feestweek van het westland', '2021-04-30', '2021-04-30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `imagemanager`
--

DROP TABLE IF EXISTS `imagemanager`;
CREATE TABLE `imagemanager` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `dorp_id` int(11) DEFAULT NULL,
  `evenement_id` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `imagemanager`
--

INSERT INTO `imagemanager` (`id`, `img`, `dorp_id`, `evenement_id`, `updated_at`, `created_at`) VALUES
(2, 'Monster.jpg', 0, NULL, '2017-04-03', '2017-04-03'),
(4, 'Poeldijk.png', 6, NULL, '2021-04-30', '2021-04-30'),
(5, 'Naaldwijk.png', 7, NULL, '2021-04-30', '2021-04-30'),
(6, 'Wateringen.png', 8, NULL, '2021-04-30', '2021-04-30'),
(7, '\'s-Gravenzande.png', 9, NULL, '2021-04-30', '2021-04-30'),
(8, 'Monster.png', 10, NULL, '2021-04-30', '2021-04-30'),
(9, '1619801769.png', NULL, 2, '2021-04-30', '2021-04-30'),
(10, '1619801838.png', NULL, 3, '2021-04-30', '2021-04-30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `evenement_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `dorp`
--
ALTER TABLE `dorp`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `imagemanager`
--
ALTER TABLE `imagemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `dorp`
--
ALTER TABLE `dorp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `imagemanager`
--
ALTER TABLE `imagemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
