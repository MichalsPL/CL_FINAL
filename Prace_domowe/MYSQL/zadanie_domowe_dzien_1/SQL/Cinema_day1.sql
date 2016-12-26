-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~xenial.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 26 Gru 2016, 22:14
-- Wersja serwera: 5.7.16-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `Cinema_day1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Cinemas`
--

CREATE TABLE `Cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `adress` text COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Cinemas`
--

INSERT INTO `Cinemas` (`id`, `name`, `adress`) VALUES
(3, 'Iluzjon Filmoteki Narodowej', 'ul. Narbutta 50a'),
(4, 'Etnokino', 'Ul. Kredytowa 1, Warszawa'),
(5, 'Multikino Złote Tarasy', 'ul. Złota 59'),
(6, 'Kinoteka', 'pl. Defilad 1'),
(8, 'Praha', 'ul. Jagielloñska 26'),
(9, 'Alchemia', 'ul. Jezuicka 4'),
(11, 'Femina', 'al. Solidarności 115'),
(12, 'aa', 'aa'),
(13, 'aaaa', 'aaaa'),
(15, 'aa', 'jjk'),
(16, 'aa', 'aa'),
(17, 'aa', 'aaaaaaaaaa'),
(18, 'aa', 'aa'),
(19, '', ''),
(20, 'aa', 'aaaa'),
(21, 'aa', 'aa'),
(22, 'bgcv', 'hbsdzxm'),
(23, 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaa'),
(24, 'qqqqqqq', 'qqqqqqqqqqq'),
(25, 'aa', 'aa'),
(26, 'asd', 'das'),
(27, 'sqas', 'das'),
(28, '', ''),
(29, 'aaa', 'aaaaa'),
(30, 'aaa', 'aaaa'),
(31, 'hjgyjhhmb', 'hjgfnvgb'),
(32, 'jghgj', 'sasa'),
(33, 'jghgj', 'sasa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Movies`
--

CREATE TABLE `Movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` text COLLATE utf8_polish_ci,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Movies`
--

INSERT INTO `Movies` (`id`, `name`, `description`, `rating`) VALUES
(3, 'Ex Machina (2015)', 'Po wygraniu konkursu programista jednej z największych firm internetowych zostaje zaproszony do posiadłości swojego szefa. Na miejsce okazuje się, że jest częścią eksperymentu. ', 8),
(5, 'Chappie (2015)', 'Dwóch gangsterów kradnie policyjnego androida, by wykorzystać go do swoich celów. ', 8),
(6, 'Kopciuszek (2015)', 'Po śmierci ojca zła macocha Elli zamienia dziewczynę w służącą. Los Kopciuszka odmieni dopiero Dobra Wróżka.', 8),
(7, 'Sąsiady (2014)', 'Ksiądz odwiedza po kolędzie kamienicę, odkrywając tajemnice jej lokatorów. ', 3),
(8, 'Złota klatka (2013)', 'Sara, nastolatka z Gwatemali, wyrusza w niebezpieczną podróż do Los Angeles w poszukiwaniu lepszego życia.', 9),
(9, 'Body/Ciało (2015)', 'Cyniczny prokurator i jego cierpiąca na anoreksję córka próbują odnaleźć się po tragicznej śmierci najbliższej osoby.', 6),
(10, 'Fru! (2014)', 'Ptaszek, który nigdy wcześniej nie wychylił dzioba poza rodzinne gniazdo, zostaje przez pomyłkę przewodnikiem stada.', 5),
(11, 'Disco Polo (2015)', 'Młodzi muzycy z prowincji w błyskawiczny sposób zdobywają szczyty list przebojów.', 2),
(12, 'Asteriks i Obeliks: Osiedle Bogów (2014)', 'Juliusz Cezar decyduje się na budowę dzielnicy mieszkaniowej dla właścicieli rzymskich i nazywa ją Osiedlem Bogów.', 9),
(13, 'aa', 'dadsadas', NULL),
(14, 'sa', 'asda', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Payments`
--

CREATE TABLE `Payments` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=DYNAMIC;

--
-- Zrzut danych tabeli `Payments`
--

INSERT INTO `Payments` (`id`, `payment_type`, `payment_date`) VALUES
(1, 'cash', '2016-12-01 16:58:08'),
(2, 'ab', '2016-10-31 23:00:00'),
(3, 'transfer', '2016-11-24 23:00:00'),
(4, 'transfer', '2016-12-01 16:58:08'),
(5, 'transfer', '2016-12-01 17:12:22'),
(24, 'cash', '2016-12-01 16:58:08'),
(25, 'transfer', '2016-12-01 16:58:08'),
(26, 'transfer', '2016-12-01 17:16:57');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tickets`
--

CREATE TABLE `Tickets` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` decimal(5,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Tickets`
--

INSERT INTO `Tickets` (`id`, `quantity`, `price`) VALUES
(1, 12, '12.00'),
(2, 12, '12.00'),
(3, 1, '15.00'),
(4, 1, '15.00'),
(5, 1, '15.00'),
(6, 1, '15.00'),
(7, 1, '15.00'),
(8, 1, '15.00'),
(9, 1, '15.00'),
(10, 1, '15.00'),
(11, 1, '15.00'),
(12, 1, '15.00'),
(13, 2, '12.00'),
(14, 2, '12.00'),
(15, 76, '12.00'),
(16, 3, '12.00'),
(17, 3, '12.00'),
(18, 4, '12.00'),
(19, 75, '12.00'),
(20, 75, '12.00'),
(21, 75, '12.00'),
(22, 75, '12.00'),
(23, 75, '12.00'),
(24, 75, '12.00'),
(25, 2, '12.00'),
(26, 2, '12.00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Cinemas`
--
ALTER TABLE `Cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT dla tabeli `Movies`
--
ALTER TABLE `Movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT dla tabeli `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
