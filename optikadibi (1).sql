-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.12.90.2:3306
-- Erstellungszeit: 16. Jun 2015 um 23:41
-- Server Version: 5.5.41
-- PHP-Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `optikadibi`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=26 ;

--
-- Daten für Tabelle `komentar`
--

INSERT INTO `komentar` (`IDKomentar`, `Autor`, `Datum_Vrijeme`, `Email`, `Tekst`, `Novosti`) VALUES
(1, 'indira', '2015-06-11 14:22:59', 'ezugor1@etf.unsa.ba', 'neki komentar', 3),
(24, NULL, '2015-06-13 08:51:42', NULL, 'f7eb604aa1a47406a90a0869bcebbcee', 3),
(25, NULL, '2015-06-16 20:56:46', NULL, 'Pokusaj dodati jos jedan', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `Username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `Email` text COLLATE utf8_slovenian_ci NOT NULL,
  `privilegije` int(11) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Daten für Tabelle `korisnik`
--

INSERT INTO `korisnik` (`Username`, `Password`, `Email`, `privilegije`) VALUES
('ediba', '418f1b4bd5610af18bb58fde9b929017', 'sesshomaru_perfection@hotmail.com', 1),
('elma', 'ee10ce913a468513cb7a75e83980b506', 'egaze1@etf.unsa.ba', 0),
('indira', '50903704b95560c7521acc39db45de72', 'ezugor1@etf.unsa.ba', 0),
('testni', 'ddae956a9ae297ddc5995274926abaec', 'vljubovic@etf.unsa.ba', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `novosti`
--

INSERT INTO `novosti` (`IDNovosti`, `Naslov`, `Tekst`, `Autor`, `Datum`, `Detaljnije`, `Slika`) VALUES
(1, 'Novogodišnja noć uz Optiku DIBI', 'Optika DIBI je tu da Vam pruži najljepšu Novogodišnju noć, te nezaboravan provod. Kupovinom proizvoda u vrijednosti 200KM dobivate besplatnu ulaznicu za Novogdišnji party, koji se održava u prostorijama Sloge. ', 'Elma Gazetić', '2015-05-28 07:06:48', 'U slučaju kupovine proizvoda od 300KM dobivate dvije besplatne ulaznice, te besplatna pića u toku trajanja večeri ', 'https://scontent-vie1-1.xx.fbcdn.net/hphotos-xpa1/t31.0-8/1492349_10201876339784418_289981427_o.jpg'),
(2, 'Otvorena nova DIBI poslovnica', 'Dana 15.06.21015 u 19:00 je otvorena nova DIBI poslovnica u Beogradu, u ulici 16. oktobra, Zvezdara. Bilo je upriličeno veliko slavlje povodom proširivanja poslovanja optike DIBI, te prelaska na granice susjedne Srbije. Ovim je DIBI optika još jednom pokazala vrhunske kvalitete koje nudi.', 'Indira Zugor', '2015-05-28 15:21:58', 'DIBI Optika nudi sniženja na sve proizvode u vrijednosti 10%, koja se budu kupila u novootvorenoj filijali u roku od 24h.', 'http://www.glamshops.ro/pics/201311/thomas-opticien-optical-shop-by-pisi-design-studio-paris-1383260728-3.jpg'),
(3, 'Pokretna optika', 'Kako bi svojim mušterijama bili što bliži, DIBI optika je proširila svoju ponudu, te sada ujedno nudi i pokretnu malu DIBI optiku, koja će se privremeno locirati na ulicama Sarajeva, kako bi usputnim prolaznicima bez problema mogla očitati dioptriju, te bilo koji drugi oblik astigmatizma.', 'Esma Musić', '2015-05-28 21:30:32', 'Svi oblici uvidjanja dioptrije, te brzi pregledi bit ce besplatni prva tri dana, nakon čega će se vršiti naplata datih usluga.', 'http://i01.i.aliimg.com/img/pb/163/525/526/526525163_749.jpg');

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
