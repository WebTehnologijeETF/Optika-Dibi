-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jun 2015 um 01:09
-- Server Version: 5.6.17
-- PHP-Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `dibioptics`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `IDKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `Autor` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `Datum_Vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Email` text COLLATE utf8_slovenian_ci,
  `Tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `Novosti` int(11) NOT NULL,
  PRIMARY KEY (`IDKomentar`),
  KEY `Novosti` (`Novosti`),
  KEY `Autor` (`Autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=78 ;

--
-- Daten für Tabelle `komentar`
--

INSERT INTO `komentar` (`IDKomentar`, `Autor`, `Datum_Vrijeme`, `Email`, `Tekst`, `Novosti`) VALUES
(65, NULL, '2015-06-11 07:29:04', NULL, 'morel', 26),
(75, NULL, '2015-06-11 22:55:26', NULL, 'morel sad ljudino?', 26),
(76, NULL, '2015-06-11 23:04:04', NULL, 'OLAAAAA', 1),
(77, 'elma', '2015-06-11 23:04:17', 'egazetic1@etf.unsa.ba', 'meeeee', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `Username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL DEFAULT '',
  `Password` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `Email` text COLLATE utf8_slovenian_ci NOT NULL,
  `privilegije` int(11) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Daten für Tabelle `korisnik`
--

INSERT INTO `korisnik` (`Username`, `Password`, `Email`, `privilegije`) VALUES
('ediba', 'f7eb604aa1a47406a90a0869bcebbcee', 'sesshomaru_perfection@hotmail.com', 1),
('elma', 'ee10ce913a468513cb7a75e83980b506', 'egazetic1@etf.unsa.ba', 0),
('indira', '3cd118d570694122b1202febccde72fb', 'ezugor1@etf.unsa.ba', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `IDNovosti` int(11) NOT NULL AUTO_INCREMENT,
  `Naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `Autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Detaljnije` text COLLATE utf8_slovenian_ci NOT NULL,
  `Slika` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`IDNovosti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=27 ;

--
-- Daten für Tabelle `novosti`
--

INSERT INTO `novosti` (`IDNovosti`, `Naslov`, `Tekst`, `Autor`, `Datum`, `Detaljnije`, `Slika`) VALUES
(1, 'Nesto da pise dodatno', 'Hajde Bgt nek se ima', 'Elma Gazeticeee', '2015-05-28 07:06:48', 'Nema ovdje nista', 'http://www.tvrtke.com/naocale-51527-149_L.jpg'),
(2, 'Optika Dibi nudi najbolju kvalitetu', 'Optika Dibi je najbolja optika i ona vam nudi super kvalitetu za povoljnu cijenu', 'Indira Zugoricee', '2015-05-28 15:21:58', '', 'http://www.womeninadria.com/wp-content/uploads/2015/02/vogue-na.jpg'),
(3, 'Nove lece na prodaju', 'Ima neki mali tekst ', 'Dibi alter ego', '2015-05-28 21:30:32', 'Samo dodatni detalji', 'http://jojo-optika.hr/images/shop/optika-jojo-djecje-naocale.jpg'),
(26, 'vcv', 'vcv', 'vcvc', '2015-06-10 20:52:58', 'cv', '');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`Novosti`) REFERENCES `novosti` (`IDNovosti`),
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`Novosti`) REFERENCES `novosti` (`IDNovosti`),
  ADD CONSTRAINT `komentar_ibfk_4` FOREIGN KEY (`Autor`) REFERENCES `korisnik` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
