-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Okt 2017 um 14:38
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kasse`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `buchung`
--

CREATE TABLE `buchung` (
  `buchungsnummer` int(11) NOT NULL,
  `zwecknummer` int(11) NOT NULL,
  `datum` date NOT NULL,
  `betrag` float NOT NULL,
  `user_von` int(11) NOT NULL,
  `user_zu` int(11) NOT NULL,
  `log` int(11) DEFAULT NULL,
  `anmerkung` varchar(255) DEFAULT NULL,
  `zum_loeschen_vorgemerkt` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Daten für Tabelle `buchung`
--

INSERT INTO `buchung` (`buchungsnummer`, `zwecknummer`, `datum`, `betrag`, `user_von`, `user_zu`, `log`, `anmerkung`, `zum_loeschen_vorgemerkt`) VALUES
(1, 1, '2017-06-26', 12.22, 1, 2, 1, 'Geschenk für Peter', NULL),
(2, 2, '2017-06-26', 123.12, 2, 1, 1, NULL, NULL),
(3, 1, '2017-06-28', 56.54, 1, 2, 1, 'Geschenk für Peter', NULL),
(4, 2, '2017-06-28', 526.54, 1, 2, 1, 'Geschenk für Peter', NULL),
(5, 1, '2017-06-29', 56.54, 2, 1, 1, NULL, 1),
(6, 1, '2017-07-01', 356.54, 1, 2, 1, 'Geschenk für Peter', NULL),
(7, 1, '0000-00-00', 132.99, 3, 1, 1, 'asdf', NULL),
(8, 1, '2017-09-18', 1231.11, 5, 1, 1, 'Gelt', NULL),
(9, 1, '2017-09-18', 79.33, 3, 1, 1, 'asdf2 :-)', NULL),
(10, 1, '2017-09-18', 123.55, 3, 1, 1, 'qwe', NULL),
(11, 1, '2017-09-18', 532.99, 4, 2, 1, 'Test122', NULL),
(12, 1, '2017-09-18', 93, 6, 1, 1, 'räumen', NULL),
(13, 1, '2017-09-21', 223.44, 5, 3, 1, 'Nichts', NULL),
(14, 1, '2017-09-21', 123.33, 2, 1, 1, '', NULL),
(15, 1, '2017-09-21', 22.99, 1, 2, 1, '', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `geloescht`
--

CREATE TABLE `geloescht` (
  `buchungsnummer` int(11) NOT NULL,
  `zwecknummer` int(11) NOT NULL,
  `datum` date NOT NULL,
  `betrag` float NOT NULL,
  `user_von` int(11) NOT NULL,
  `user_zu` int(11) NOT NULL,
  `log` int(11) DEFAULT NULL,
  `anmerkung` varchar(255) DEFAULT NULL,
  `zum_loeschen_vorgemerkt` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontostand` float NOT NULL,
  `zinsen` tinyint(1) NOT NULL,
  `erstellt_am` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zuletzt_geaendert` timestamp NULL DEFAULT NULL,
  `passwort` varchar(255) NOT NULL,
  `verein` int(10) NOT NULL,
  `gruppe` int(10) NOT NULL,
  `hausbewohner` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `vorname`, `nachname`, `email`, `kontostand`, `zinsen`, `erstellt_am`, `zuletzt_geaendert`, `passwort`, `verein`, `gruppe`, `hausbewohner`) VALUES
(1, 'Sven', 'Haberzettl', 'mail@sven-haberzettl.de', 548.89, 1, '2017-06-26 07:36:24', NULL, '$2y$10$Frhg8vMSY.1dtgId3SiVPeQb23HB5mvRpWpiTnEARO0yAJFZKDGYy', 1, 1, 0),
(2, 'Jan', 'Nemeth', 'jan.nemeth@web.de', 432.65, 0, '2017-06-26 08:09:57', NULL, '$2y$10$yopaOg0oz2VQd3xQjBfjvecFwobDA1P9ryz8s0fuZ5qfQHSE0KNQq', 5, 5, 0),
(3, 'Peter', 'Salami', 'p_123wurst@web.de', 76.57, 0, '2017-06-28 10:16:44', NULL, 'passwort', 1, 5, 0),
(4, 'Erest', 'Nutzer', 'test.nutzer@web.de', -519.99, 0, '2017-07-06 17:25:58', NULL, 'passwort', 2, 15, 0),
(5, 'Bob', 'Müller', 'nutzerfurz@web.de', -100.44, 0, '2017-07-06 17:25:58', NULL, '$2y$10$yopaOg0oz2VQd3xQjBfjvecFwobDA1P9ryz8s0fuZ5qfQHSE0KNQq', 2, 15, 0),
(6, 'Emilia', 'Schmidt', 'derbeste@web.net', 0, 0, '2017-07-06 17:25:58', NULL, 'passwort', 1, 15, 0),
(7, 'Elena', 'Fester', 'einmalindeinemleben@web.de', 333, 0, '2017-07-06 17:25:58', NULL, '$2y$10$ERGU3vWB68m7IqMLBBb24uwnZ7GSKfMPEFyjDuP0.RD79sPDpICsi', 1, 99, 0),
(8, 'Max', 'Mustermann', 'max@mustermann.de', 0, 0, '2017-09-18 11:16:47', NULL, '$2y$10$ou2hysnlLDI6UDGTnyXD5Oo32yKPKlBQ2vL0mnfD9BbojPfRFcxeG', 1, 99, 0),
(9, 'Matthias', 'Sams', 'm.sams@gmail.com', 0, 0, '2017-09-21 13:00:30', NULL, '$2y$10$f/s5PNWVHPtQap/aQnHs1uW/AtLqxY0M4oVi5/n09gjVh9QFTY2S2', 0, 99, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usergroup`
--

CREATE TABLE `usergroup` (
  `gid` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Daten für Tabelle `usergroup`
--

INSERT INTO `usergroup` (`gid`, `gname`) VALUES
(1, 'Admin'),
(5, 'Kassenwart'),
(10, 'Getränkewart'),
(15, 'aktives Mitglied'),
(20, 'passives Mitglied'),
(99, 'Gast');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verein`
--

CREATE TABLE `verein` (
  `VNummer` int(11) NOT NULL,
  `VName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Daten für Tabelle `verein`
--

INSERT INTO `verein` (`VNummer`, `VName`) VALUES
(0, 'kein Verein'),
(1, 'SV Friedberg 1899 eV'),
(2, 'TSV Rot-Weiß Bibabuzzebach');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verwendungszweck`
--

CREATE TABLE `verwendungszweck` (
  `zwecknummer` int(11) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Daten für Tabelle `verwendungszweck`
--

INSERT INTO `verwendungszweck` (`zwecknummer`, `Beschreibung`) VALUES
(1, 'Querbuchung');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `buchung`
--
ALTER TABLE `buchung`
  ADD PRIMARY KEY (`buchungsnummer`);

--
-- Indizes für die Tabelle `geloescht`
--
ALTER TABLE `geloescht`
  ADD PRIMARY KEY (`buchungsnummer`);

--
-- Indizes für die Tabelle `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`gid`);

--
-- Indizes für die Tabelle `verein`
--
ALTER TABLE `verein`
  ADD PRIMARY KEY (`VNummer`);

--
-- Indizes für die Tabelle `verwendungszweck`
--
ALTER TABLE `verwendungszweck`
  ADD PRIMARY KEY (`zwecknummer`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `buchung`
--
ALTER TABLE `buchung`
  MODIFY `buchungsnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `geloescht`
--
ALTER TABLE `geloescht`
  MODIFY `buchungsnummer` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
