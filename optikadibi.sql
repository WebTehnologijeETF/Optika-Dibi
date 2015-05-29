-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.12.90.2:3306
-- Generation Time: May 29, 2015 at 01:04 AM
-- Server version: 5.5.41
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `optikadibi`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `IDKomentar` int(11) NOT NULL AUTO_INCREMENT,
  `Autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Datum_Vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Email` text COLLATE utf8_slovenian_ci,
  `Tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `Novosti` int(11) NOT NULL,
  PRIMARY KEY (`IDKomentar`),
  KEY `Novosti` (`Novosti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`IDKomentar`, `Autor`, `Datum_Vrijeme`, `Email`, `Tekst`, `Novosti`) VALUES
(5, 'Nepoznati', '2015-05-28 15:30:31', NULL, 'Joj jest ovo meni sve ludnica, prejaka optika, svaka cast', 1),
(6, 'Elma', '2015-05-28 15:31:07', 'egazetic1@etf.unsa.ba', 'Neki tekst cisto da se nadje', 2),
(7, 'Vedran Lj.', '2015-05-28 15:33:42', 'vljubovic@etf.unsa.ba', 'Mozda je ova optika dobra,ali ova Web stranica ne valja!', 1),
(8, 'Indira', '2015-05-28 21:26:48', 'bleee@etf.unsa.ba', 'okej, nova poruka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `Username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `Email` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`Username`, `Password`, `Email`) VALUES
('dibi', '2fc95515b761febbdc4194ebc075e1c9', 'ezugor1@etf.unsa.ba'),
('ediba', 'dibi', 'nesto@etf.unsa.ba');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
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
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`IDNovosti`, `Naslov`, `Tekst`, `Autor`, `Datum`, `Detaljnije`, `Slika`) VALUES
(1, 'Nesto da pise dodatno', 'Hajde Bgt nek se ima', 'Elma Gazetic', '2015-05-28 07:06:48', 'Nema ovdje nista', 'http://www.tvrtke.com/naocale-51527-149_L.jpg'),
(2, 'Optika Dibi nudi najbolju kvalitetu', 'Optika Dibi je najbolja optika i ona vam nudi super kvalitetu za povoljnu cijenu', 'Indira Zugor', '2015-05-28 15:21:58', '', 'http://www.womeninadria.com/wp-content/uploads/2015/02/vogue-na.jpg'),
(3, 'Nove lece na prodaju', 'Ima neki mali tekst ', 'Dibi alter ego', '2015-05-28 21:30:32', 'Samo dodatni detalji', 'http://jojo-optika.hr/images/shop/optika-jojo-djecje-naocale.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`Novosti`) REFERENCES `novosti` (`IDNovosti`),
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`Novosti`) REFERENCES `novosti` (`IDNovosti`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
