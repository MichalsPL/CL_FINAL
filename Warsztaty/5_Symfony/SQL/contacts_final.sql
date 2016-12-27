-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~xenial.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 27 Gru 2016, 09:58
-- Wersja serwera: 5.7.16-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `contacts_final`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `houseNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `aptNo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `telephone`
--

CREATE TABLE `telephone` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D4E6F81A20C4B1C` (`personId`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E7927C74E7927C74` (`email`),
  ADD KEY `IDX_E7927C74A20C4B1C` (`personId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_450FF01034DCD176` (`person`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `telephone`
--
ALTER TABLE `telephone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81A20C4B1C` FOREIGN KEY (`personId`) REFERENCES `person` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `FK_E7927C74A20C4B1C` FOREIGN KEY (`personId`) REFERENCES `person` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `telephone`
--
ALTER TABLE `telephone`
  ADD CONSTRAINT `FK_450FF01034DCD176` FOREIGN KEY (`person`) REFERENCES `person` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
