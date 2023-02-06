-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 12:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `code` varchar(45) NOT NULL DEFAULT '',
  `codename` varchar(200) NOT NULL DEFAULT '',
  `year` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `amountremain` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`code`, `codename`, `year`, `id`, `amount`, `amountremain`) VALUES
('', 'Amahugurwa/umusaruro', 2019, 1, 432000, 432000),
('', 'Inama zo gutegura igihembwe cyihinga 2020A&BB', 2019, 2, 120000, 120000),
('', 'Inama zo guhuza igishoro', 2019, 3, 60000, 60000),
('', 'Inama yo ku igerereranyamusaruro', 2019, 4, 30000, 30000),
('', 'Inama zo kumvikana igiciro', 2019, 5, 312000, 49100),
('', 'Inama zo gutegura amasezerano', 2019, 6, 24000, 24000),
('', 'Inama zabafatanyabikorwa', 2019, 7, 420000, 420000),
('', 'Shitingi zo kwanikaho umusaruro', 2019, 8, 960000, 960000),
('', 'Imashini ziputa umuceri', 2019, 9, 3500000, 3500000),
('', 'UBUCURUZI BW`IMIFUKA', 2019, 10, 23975000, 23975000),
('', 'INAMA YA WUO NAMAKOPERATIVE KU RWEGO RWIGIHUGU', 2019, 11, 105000, 105000),
('', 'Amahugurwa yababaruramari', 2019, 12, 210000, 210000),
('', 'Software', 2019, 13, 1450000, 1450000),
('', 'Ubugenzuzi bwohanze', 2019, 14, 2450000, 2450000),
('', 'Isuzuma ryimihigo', 2019, 15, 180000, 180000),
('', 'Inama zabacungamutungo', 2019, 16, 40000, 40000),
('', 'Inama zabagenzuzi', 2019, 17, 60000, 30000),
('', 'Amahugurwa yabashinzwe ibigega', 2019, 18, 60000, 60000),
('', 'Inama zabagize komisiyo zamasoko', 2019, 19, 30000, 30000),
('', 'Inama rusange', 2019, 20, 330000, 330000),
('', 'Inama za komite nyobozi', 2019, 21, 220000, 190000),
('', 'Inama za komite ngenzuzi', 2019, 22, 99000, 69000),
('', 'Kuzuza umugabane', 2019, 24, 1000000, 1000000),
('', 'Gukurikirana inama rusange zabanyamuryango', 2019, 25, 320000, 320000),
('', 'Umushuinga ubyara inyungu', 2019, 26, 3000000, 3000000),
('', 'Uruzitiro rwikibanza', 2019, 27, 1500000, 1500000),
('', 'Kuvugurura igisenge', 2019, 28, 3000000, 3000000),
('', 'Umwiherero nurugendo shuri', 2019, 29, 1500000, 1500000),
('', 'Imishahara yabakozi', 2019, 30, 5151024, 4911844),
('', 'Ubuvugizi', 2019, 31, 900000, 836250),
('', 'Amahoro yisuku rusange', 2019, 32, 60000, 0),
('', 'Ipatante', 2019, 33, 30000, 0),
('', 'Ibikoresho byisuku/umuriro namazi', 2019, 34, 180000, 170596),
('', 'Ibikoresho byabiro', 2019, 35, 560000, 487900),
('', 'Itumanaho', 2019, 36, 480000, 437000),
('', 'Ideni ryimvaho', 2019, 37, 472000, 472000),
('', 'Internet', 2019, 38, 36000, 36000),
('', 'Umunsi wabakozi', 2019, 39, 50000, 50000),
('', 'Kwakira abashyitsi', 2019, 40, 200000, 200000),
('', 'Amazi yo kunywa', 2019, 41, 115200, 110200),
('', 'Umusanzu wokubaka inzego/FUCORIRWA', 2019, 42, 12000000, 12000000),
('', 'Indi misanzu', 2019, 43, 200000, 200000),
('', 'Inkunga no kwibuka Genocide', 2019, 44, 500000, 500000),
('', 'Ibikorwa byareta/Agaciro', 2019, 45, 120000, 120000),
('', 'Imipira yo kwambara ', 2019, 46, 240000, 240000),
('', 'Ingendo nubutumwa bwakazi', 2019, 47, 1485000, 1438000),
('', 'Ibidateganyijwe', 2019, 48, 439626, 345368),
('', 'Umwiherero', 2019, 49, 290000, 290000),
('', 'Ibitarakozwe 2018', 2019, 50, 2287500, 846100),
('', 'Amashimwe', 2019, 51, 500000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `amadeni`
--

CREATE TABLE `amadeni` (
  `id` int(11) NOT NULL,
  `ideni` varchar(60) NOT NULL,
  `value` int(11) NOT NULL,
  `action` varchar(60) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `asset` varchar(60) NOT NULL,
  `value` int(11) NOT NULL,
  `depreciation` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bankname` varchar(45) NOT NULL DEFAULT '',
  `account` varchar(20) NOT NULL DEFAULT '',
  `particulars` varchar(65) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL DEFAULT '0',
  `bordereau` varchar(45) NOT NULL DEFAULT '',
  `action` varchar(25) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '0000-00-00',
  `proof` varchar(20) NOT NULL,
  `slip` varchar(20) NOT NULL,
  `bline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankname`, `account`, `particulars`, `amount`, `bordereau`, `action`, `balance`, `date`, `proof`, `slip`, `bline`) VALUES
(1, 'BK', '00088-006507428-26', 'UCORIVABU', 3824681, 'Repport', 'debit', 3824681, '2018-12-31', 'Slip', 'historique fin Dec/2', ''),
(2, 'BK', '00088-006507428-26', 'SAMSON', 173000, 'Imirimo yihuriro', 'credit', 3651681, '2019-01-08', 'Credit', '', ''),
(3, 'BK', '00088-006507428-26', 'Mushinzimana Phenias', 200000, 'Avance kumbaho', 'credit', 3505681, '2019-01-09', 'Cheque', '', 'Ibitarakozwe 2018'),
(4, 'BK', '00088-006507428-26', 'SAMSON', 29000, 'Azishyurwa umwanditsi', 'credit', 3476681, '2019-01-09', 'Credit', '', ''),
(5, 'BK', '00088-006507428-26', ' SAMSON', 146950, 'Imirimo yihuriro', 'credit', 3329731, '2019-01-14', 'Credit', '', ''),
(6, 'BK', '00088-006507428-26', 'Mushinzimana Phenias', 287600, 'Facture yimbaho yagemuye', 'credit', 3042131, '2019-01-14', 'Cheque', '', 'Ibitarakozwe 2018'),
(7, 'BK', '00088-006507428-26', 'SURWUMWE Innocent', 600000, 'Ibiti byikiraro', 'credit', 2442131, '2019-01-14', 'Cheque', '', 'Ibitarakozwe 2018'),
(8, 'BK', '00088-006507428-26', 'SIBOMANA Jonas', 70000, 'Abakarani guterura ibiti', 'credit', 2372131, '2019-01-14', 'Cheque', '', 'Ibitarakozwe 2018'),
(9, 'BK', '00088-006507428-26', 'IRAMBONA Alex', 130000, 'Imodoka gutwara ibiti', 'credit', 2242131, '2019-01-17', 'Cheque', '', 'Ibitarakozwe 2018'),
(10, 'BK', '00088-006507428-26', 'KEHMU', 52580, 'Umusanzu gutunga inama', 'debit', 2294711, '2019-01-17', 'Slip', 'Bordereau de verseme', ''),
(11, 'BK', '00088-006507428-26', 'KOIMUNYA', 52580, 'Umusanzu gutunga inama', 'debit', 2347291, '2019-01-17', 'Slip', 'Bordereau de verseme', ''),
(12, 'BK', '00088-006507428-26', 'SAMSON', 167100, 'Imirimo yihuriro', 'credit', 2180191, '2019-01-17', 'Credit', '', ''),
(13, 'BK', '00088-006507428-26', 'KOJMU', 52580, 'Umusanzu wogutunga inama', 'debit', 2232771, '2019-01-17', 'Slip', 'Bordereau de verseme', ''),
(14, 'BK', '00088-006507428-26', 'NCOGOZA Laurent', 262900, 'Facture yibyatunze inama', 'credit', 1969871, '2019-01-17', 'Cheque', '', 'Inama zo kumvikana igiciro'),
(15, 'BK', '00088-006507428-26', 'MUKASINE Drocelle', 63750, 'ubuvugizi', 'credit', 1906121, '2019-01-17', 'Cheque', '', 'Ubuvugizi'),
(16, 'BK', '00088-006507428-26', 'SAMSON', 150001, 'salaire/janvier', 'credit', 1756120, '2019-01-17', 'Cheque', '', 'Imishahara yabakozi'),
(17, 'BK', '00088-006507428-26', 'SAMSON', 132579, 'Imirimo yihuriro', 'credit', 1623541, '2019-01-28', 'Credit', '', ''),
(18, 'BK', '00088-006507428-26', 'SAMSON', 50000, 'Avance kumushahara', 'debit', 1673541, '2019-01-31', 'Slip', 'Bordereau de verseme', ''),
(19, 'BK', '00088-006507428-26', 'BK', 17951, 'Inyungu kumigabane', 'debit', 1691492, '2019-01-31', 'Slip', 'historique janvier', ''),
(20, 'BK', '00088-006507428-26', ' BK', 5458, 'charge Banquaire BK', 'credit', 1686034, '2019-01-31', 'Cheque', '', 'Ibidateganyijwe');

-- --------------------------------------------------------

--
-- Table structure for table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `bankname` varchar(45) NOT NULL DEFAULT '',
  `account` varchar(20) NOT NULL DEFAULT '',
  `particulars` varchar(65) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL DEFAULT '0',
  `reason` varchar(45) NOT NULL DEFAULT '',
  `action` varchar(25) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `budgetline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caisse`
--

INSERT INTO `caisse` (`id`, `bankname`, `account`, `particulars`, `amount`, `reason`, `action`, `balance`, `date`, `budgetline`) VALUES
(1, 'BK', '00088-006507428-26', 'SAMSON', 173000, 'Imirimo yihuriro', 'debit', 173000, '2019-01-08 00:00:00', ''),
(2, 'BK', '00088-006507428-26', 'SAMSON', 29000, 'Azishyurwa umwanditsi', 'debit', 202000, '2019-01-09 00:00:00', ''),
(3, 'BK', '00088-006507428-26', ' SAMSON', 146950, 'Imirimo yihuriro', 'debit', 348950, '2019-01-14 00:00:00', ''),
(4, 'BK', '00088-006507428-26', 'SAMSON', 167100, 'Imirimo yihuriro', 'debit', 516050, '2019-01-17 00:00:00', ''),
(5, 'BK', '00088-006507428-26', 'SAMSON', 132579, 'Imirimo yihuriro', 'debit', 648629, '2019-01-28 00:00:00', ''),
(8, 'caisse', '', 'Abakarani', 3500, 'Imirimo yihuriro', 'credit', -5500, '2019-01-03 00:00:00', 'Ibidateganyijwe'),
(9, 'caisse', '', 'Resto-Bar', 20600, 'Facture yibyatunze inama', 'credit', -26100, '2019-01-04 00:00:00', 'Ibidateganyijwe'),
(10, 'caisse', '', 'WASAC', 5000, 'Kwishyura umuririo', 'credit', -31100, '2019-01-04 00:00:00', 'Ibikoresho byisuku/umuriro namazi'),
(11, 'caisse', '', 'MOTARI', 1500, 'Urugendo rwo gusura imirimo yo gusana ikiraro', 'credit', -32600, '2019-01-08 00:00:00', 'Ibitarakozwe 2018'),
(13, 'caisse', '', 'Abafundi', 38600, 'Imirimo yo gusana ikiraro', 'credit', -38600, '2019-01-08 00:00:00', 'Ibitarakozwe 2018'),
(14, 'caisse', '', 'AKARERE', 30000, 'Ipatante', 'credit', -68600, '2019-01-08 00:00:00', 'Ipatante'),
(15, 'caisse', '', 'AKARERE', 10000, 'Isuku rusange ', 'credit', -78600, '2019-01-08 00:00:00', 'Amahoro yisuku rusange'),
(16, 'caisse', '', 'AKARERE', 50000, 'Isuku rusange ', 'credit', -128600, '2019-01-09 00:00:00', 'Amahoro yisuku rusange'),
(17, 'caisse', '', 'AKARERE', 10000, 'Isuku rusange ', 'credit', -138600, '2019-01-09 00:00:00', 'Ibidateganyijwe'),
(18, 'caisse', '', 'Papeterie', 25500, 'Ibikoresho byabiro', 'credit', -164100, '2019-01-09 00:00:00', 'Ibikoresho byabiro'),
(19, 'caisse', '', 'Julienne', 5000, 'Imirimo yihuriro', 'credit', -169100, '2019-01-09 00:00:00', 'Ingendo nubutumwa bwakazi'),
(20, 'caisse', '', 'Julienne', 29000, 'Imirimo yihuriro', 'credit', -198100, '2019-01-09 00:00:00', 'Ingendo nubutumwa bwakazi'),
(21, 'caisse', '', 'Umusuderi', 6500, 'kugura icyapa no kucyandikaho', 'credit', -204600, '2019-01-10 00:00:00', 'Ibikoresho byabiro'),
(22, 'caisse', '', 'MOTARI', 1300, 'Ingendo zogusura ikiraro', 'credit', -205900, '2019-01-10 00:00:00', 'Ibitarakozwe 2018'),
(23, 'caisse', '', 'EMMANUEL/UMUNYONZI', 1000, 'UMUNYIONZI WATUMWE', 'credit', -206900, '2019-01-10 00:00:00', 'Ingendo nubutumwa bwakazi'),
(24, 'caisse', '', 'ABAFUNDI', 33600, 'KUBAKA IKIRARO', 'credit', -240500, '2019-01-14 00:00:00', 'Ibitarakozwe 2018'),
(25, 'caisse', '', 'MOTARI', 3000, 'INGENDO ZO GUSURA IKIRARO', 'credit', -243500, '2019-01-14 00:00:00', 'Ibitarakozwe 2018'),
(26, 'caisse', '', 'QUINCAILLERIE', 37500, 'KUGURA IMISUMARI YUBAKISHWA IKIRARARO', 'credit', -281000, '2019-01-14 00:00:00', 'Ibitarakozwe 2018'),
(27, 'caisse', '', 'UMUNYONZI', 1000, 'GUTWARA IIMISUMARI', 'credit', -282000, '2019-01-14 00:00:00', 'Ibitarakozwe 2018'),
(28, 'caisse', '', 'BRIGITTE', 2000, 'umusinyateri', 'credit', -284000, '2019-01-14 00:00:00', 'Ingendo nubutumwa bwakazi'),
(29, 'caisse', '', 'EMMANUEL/UMUNYONZI', 1000, 'Gutumwa mu makoperative', 'credit', -285000, '2019-01-14 00:00:00', 'Ingendo nubutumwa bwakazi'),
(30, 'caisse', '', 'Papeterie', 1700, 'Gufotoza', 'credit', -286700, '2019-01-16 00:00:00', 'Ibikoresho byabiro'),
(31, 'caisse', '', 'CYIZA', 2000, 'Gutunganya ubusitani', 'credit', -288700, '2019-01-03 00:00:00', 'Ibidateganyijwe'),
(32, 'caisse', '', 'QUINCAILLERIE', 32700, 'IBIKORESHO KU KIRARRO', 'credit', -321400, '2019-01-17 00:00:00', 'Ibitarakozwe 2018'),
(33, 'caisse', '', 'ABAFUNDI', 31600, 'GUKORA IKIRARARO', 'credit', -353000, '2019-01-17 00:00:00', 'Ibitarakozwe 2018'),
(34, 'caisse', '', 'TIGO', 43000, 'itumanaho', 'credit', -396000, '2019-01-17 00:00:00', 'Itumanaho'),
(35, 'caisse', '', 'Papeterie', 30000, 'kugura ibikoresho', 'credit', -426000, '2019-01-17 00:00:00', 'Ibikoresho byabiro'),
(36, 'caisse', '', 'Abagize CA', 15000, 'Ifunguro nurugendo', 'credit', -441000, '2019-01-17 00:00:00', 'Inama za komite nyobozi'),
(37, 'caisse', '', 'umucuruzi', 4200, 'kugura amagurudu nibase', 'credit', -445200, '2019-01-17 00:00:00', 'Ibidateganyijwe'),
(38, 'caisse', '', 'umuturanyi', 8500, 'kugura igiti cya poto no kugishinga', 'credit', -453700, '2019-01-17 00:00:00', 'Ibidateganyijwe'),
(39, 'caisse', '', 'Boutique', 1000, 'kugura OMO', 'credit', -454700, '2019-01-17 00:00:00', 'Ibikoresho byisuku/umuriro namazi'),
(40, 'caisse', '', 'ABAGIZE NGENZUZI', 30000, 'ifunguro nurugendo CS', 'credit', -484700, '2019-01-19 00:00:00', 'Inama za komite ngenzuzi'),
(41, 'caisse', '', 'Boutique', 3000, 'KUGURA AMAZI YO KUNYWA', 'credit', -487700, '2019-01-23 00:00:00', 'Amazi yo kunywa'),
(44, 'caisse', '', 'PAAKM', 2704, 'KWISHYURA AMAZI YO GUKORESHA', 'credit', -495812, '2019-01-24 00:00:00', 'Ibikoresho byisuku/umuriro namazi'),
(45, 'caisse', '', 'Papeterie', 8400, 'IBIKORESHO BYA BIRO', 'credit', -504212, '2019-01-24 00:00:00', 'Ibikoresho byabiro'),
(46, 'caisse', '', 'RRA', 74179, 'UMUSORO KU BIHEMBO', 'credit', -578391, '2019-01-28 00:00:00', 'Imishahara yabakozi'),
(47, 'caisse', '', 'KOMITE NGENZUZI', 15000, 'ifunguro nurugendo ', 'credit', -593391, '2019-01-28 00:00:00', 'Inama zabagenzuzi'),
(48, 'caisse', '', 'NGENZUZI', 2000, 'AMAZI YO KUNYWA', 'credit', -595391, '2019-01-28 00:00:00', 'Amazi yo kunywa'),
(49, 'caisse', '', 'UKORA ISUKU', 20000, 'IMIRIMO YO GUKORA ISUKU', 'credit', -615391, '2019-01-30 00:00:00', 'Ibidateganyijwe'),
(50, 'caisse', '', 'UMUZAMU', 15000, 'Kwishyura umuzamu', 'credit', -630391, '2019-01-30 00:00:00', 'Imishahara yabakozi'),
(51, 'caisse', '', 'EXAMINATION', 20000, 'Kwishyura abakoresheje ikizamini', 'credit', -650391, '2019-01-30 00:00:00', 'Ibidateganyijwe'),
(52, 'Ayimukanywe 2018 ', '', 'UCORIVABU', 37600, 'AYIMUWE', 'debit', 0, '2018-12-31 00:00:00', ''),
(53, 'caisse', '', 'ABAGIZE INAMA YUBUYOBOZI', 9000, 'gukurikirana exam', 'credit', -9000, '2019-01-30 00:00:00', 'Ingendo nubutumwa bwakazi'),
(54, 'caisse', '', 'Boutique', 700, 'kugura isabune na PH', 'credit', -9700, '2019-01-31 00:00:00', 'Ibikoresho byisuku/umuriro namazi');

-- --------------------------------------------------------

--
-- Table structure for table `combination`
--

CREATE TABLE `combination` (
  `Level_id` int(2) NOT NULL DEFAULT '0',
  `Combination` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combination`
--

INSERT INTO `combination` (`Level_id`, `Combination`) VALUES
(1, '00088-006507428-26'),
(0, '0690');

-- --------------------------------------------------------

--
-- Table structure for table `combinationcaisse`
--

CREATE TABLE `combinationcaisse` (
  `Level_id` int(2) NOT NULL DEFAULT '0',
  `Combination` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `combinations`
--

CREATE TABLE `combinations` (
  `Level_id` int(2) NOT NULL DEFAULT '0',
  `Combination` varchar(200) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL DEFAULT '0000',
  `id` int(11) NOT NULL,
  `season` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `amount` int(11) NOT NULL DEFAULT '0',
  `reason` varchar(100) NOT NULL DEFAULT '',
  `account` varchar(200) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  `duedate` date NOT NULL DEFAULT '0000-00-00',
  `origine` varchar(60) NOT NULL,
  `compte` varchar(50) NOT NULL,
  `receiver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`amount`, `reason`, `account`, `id`, `duedate`, `origine`, `compte`, `receiver`) VALUES
(173000, 'Avance kumbaho', 'Ibitarakozwe 2018', 1, '2019-01-09', 'BK', '00088-006507428-26', 'Mushinzimana Phenias'),
(287600, 'Facture yimbaho yagemuye', 'Ibitarakozwe 2018', 2, '2019-01-14', 'BK', '00088-006507428-26', 'Mushinzimana Phenias'),
(600000, 'Ibiti byikiraro', 'Ibitarakozwe 2018', 3, '2019-01-14', 'BK', '00088-006507428-26', 'SURWUMWE Innocent'),
(70000, 'Abakarani guterura ibiti', 'Ibitarakozwe 2018', 4, '2019-01-14', 'BK', '00088-006507428-26', 'SIBOMANA Jonas'),
(130000, 'Imodoka gutwara ibiti', 'Ibitarakozwe 2018', 5, '2019-01-17', 'BK', '00088-006507428-26', 'IRAMBONA Alex'),
(262900, 'Facture yibyatunze inama', 'Inama zo kumvikana igiciro', 6, '2019-01-17', 'BK', '00088-006507428-26', 'NCOGOZA Laurent'),
(63750, 'ubuvugizi', 'Ubuvugizi', 7, '2019-01-17', 'BK', '00088-006507428-26', 'MUKASINE Drocelle'),
(150001, 'salaire/janvier', 'Imishahara yabakozi', 8, '2019-01-17', 'BK', '00088-006507428-26', 'SAMSON'),
(5458, 'charge Banquaire BK', 'Ibidateganyijwe', 9, '2019-01-31', 'BK', '00088-006507428-26', ' BK'),
(2000, 'Gutunganya ubusitani', 'Ibikoresho byisuku/umuriro namazi', 10, '2018-12-31', 'caisse', '', 'CYIZA'),
(3500, 'Imirimo yihuriro', 'Ibidateganyijwe', 11, '2019-01-03', 'caisse', '', 'Abakarani'),
(20600, 'Facture yibyatunze inama', 'Ibidateganyijwe', 12, '2019-01-04', 'caisse', '', 'Resto-Bar'),
(5000, 'Kwishyura umuririo', 'Ibikoresho byisuku/umuriro namazi', 13, '2019-01-04', 'caisse', '', 'WASAC'),
(1500, 'Urugendo rwo gusura imirimo yo gusana ikiraro', 'Ibitarakozwe 2018', 14, '2019-01-08', 'caisse', '', 'MOTARI'),
(38600, 'Imirimo yo gusana ikiraro', 'Ibitarakozwe 2018', 15, '2019-01-08', 'caisse', '', 'Abafundi'),
(30000, 'Ipatante', 'Ipatante', 16, '2019-01-08', 'caisse', '', 'AKARERE'),
(10000, 'Isuku rusange ', 'Amahoro yisuku rusange', 17, '2019-01-08', 'caisse', '', 'AKARERE'),
(50000, 'Isuku rusange ', 'Amahoro yisuku rusange', 18, '2019-01-09', 'caisse', '', 'AKARERE'),
(10000, 'Isuku rusange ', 'Ibidateganyijwe', 19, '2019-01-09', 'caisse', '', 'AKARERE'),
(25500, 'Ibikoresho byabiro', 'Ibikoresho byabiro', 20, '2019-01-09', 'caisse', '', 'Papeterie'),
(5000, 'Imirimo yihuriro', 'Ingendo nubutumwa bwakazi', 21, '2019-01-09', 'caisse', '', 'Julienne'),
(29000, 'Imirimo yihuriro', 'Ingendo nubutumwa bwakazi', 22, '2019-01-09', 'caisse', '', 'Julienne'),
(6500, 'kugura icyapa no kucyandikaho', 'Ibikoresho byabiro', 23, '2019-01-10', 'caisse', '', 'Umusuderi'),
(1300, 'Ingendo zogusura ikiraro', 'Ibitarakozwe 2018', 24, '2019-01-10', 'caisse', '', 'MOTARI'),
(1000, 'UMUNYIONZI WATUMWE', 'Ingendo nubutumwa bwakazi', 25, '2019-01-10', 'caisse', '', 'EMMANUEL/UMUNYONZI'),
(33600, 'KUBAKA IKIRARO', 'Ibitarakozwe 2018', 26, '2019-01-14', 'caisse', '', 'ABAFUNDI'),
(3000, 'INGENDO ZO GUSURA IKIRARO', 'Ibitarakozwe 2018', 27, '2019-01-14', 'caisse', '', 'MOTARI'),
(37500, 'KUGURA IMISUMARI YUBAKISHWA IKIRARARO', 'Ibitarakozwe 2018', 28, '2019-01-14', 'caisse', '', 'QUINCAILLERIE'),
(1000, 'GUTWARA IIMISUMARI', 'Ibitarakozwe 2018', 29, '2019-01-14', 'caisse', '', 'UMUNYONZI'),
(2000, 'umusinyateri', 'Ingendo nubutumwa bwakazi', 30, '2019-01-14', 'caisse', '', 'BRIGITTE'),
(1000, 'Gutumwa mu makoperative', 'Ingendo nubutumwa bwakazi', 31, '2019-01-14', 'caisse', '', 'EMMANUEL/UMUNYONZI'),
(1700, 'Gufotoza', 'Ibikoresho byabiro', 32, '2019-01-16', 'caisse', '', 'Papeterie'),
(2000, 'Gutunganya ubusitani', 'Ibidateganyijwe', 33, '2019-01-03', 'caisse', '', 'CYIZA'),
(32700, 'IBIKORESHO KU KIRARRO', 'Ibitarakozwe 2018', 34, '2019-01-17', 'caisse', '', 'QUINCAILLERIE'),
(31600, 'GUKORA IKIRARARO', 'Ibitarakozwe 2018', 35, '2019-01-17', 'caisse', '', 'ABAFUNDI'),
(43000, 'itumanaho', 'Itumanaho', 36, '2019-01-17', 'caisse', '', 'TIGO'),
(30000, 'kugura ibikoresho', 'Ibikoresho byabiro', 37, '2019-01-17', 'caisse', '', 'Papeterie'),
(15000, 'Ifunguro nurugendo', 'Inama za komite nyobozi', 38, '2019-01-17', 'caisse', '', 'Abagize CA'),
(4200, 'kugura amagurudu nibase', 'Ibidateganyijwe', 39, '2019-01-17', 'caisse', '', 'umucuruzi'),
(8500, 'kugura igiti cya poto no kugishinga', 'Ibidateganyijwe', 40, '2019-01-17', 'caisse', '', 'umuturanyi'),
(1000, 'kugura OMO', 'Ibikoresho byisuku/umuriro namazi', 41, '2019-01-17', 'caisse', '', 'Boutique'),
(30000, 'ifunguro nurugendo CS', 'Inama za komite ngenzuzi', 42, '2019-01-19', 'caisse', '', 'ABAGIZE NGENZUZI'),
(3000, 'KUGURA AMAZI YO KUNYWA', 'Amazi yo kunywa', 43, '2019-01-23', 'caisse', '', 'Boutique'),
(2704, 'KWISHYURA AMAZI YO GUKORESHA', 'Ibikoresho byisuku/umuriro namazi', 44, '2019-01-24', 'caisse', '', 'PAAKM'),
(2704, 'KWISHYURA AMAZI YO GUKORESHA', 'Ibikoresho byisuku/umuriro namazi', 45, '2019-01-24', 'caisse', '', 'PAAKM'),
(2704, 'KWISHYURA AMAZI YO GUKORESHA', 'Ibikoresho byisuku/umuriro namazi', 46, '2019-01-24', 'caisse', '', 'PAAKM'),
(8400, 'IBIKORESHO BYA BIRO', 'Ibikoresho byabiro', 47, '2019-01-24', 'caisse', '', 'Papeterie'),
(74179, 'UMUSORO KU BIHEMBO', 'Imishahara yabakozi', 48, '2019-01-28', 'caisse', '', 'RRA'),
(15000, 'ifunguro nurugendo ', 'Inama zabagenzuzi', 49, '2019-01-28', 'caisse', '', 'KOMITE NGENZUZI'),
(2000, 'AMAZI YO KUNYWA', 'Amazi yo kunywa', 50, '2019-01-28', 'caisse', '', 'NGENZUZI'),
(20000, 'IMIRIMO YO GUKORA ISUKU', 'Ibidateganyijwe', 51, '2019-01-30', 'caisse', '', 'UKORA ISUKU'),
(15000, 'Kwishyura umuzamu', 'Imishahara yabakozi', 52, '2019-01-30', 'caisse', '', 'UMUZAMU'),
(20000, 'Kwishyura abakoresheje ikizamini', 'Ibidateganyijwe', 53, '2019-01-30', 'caisse', '', 'EXAMINATION'),
(9000, 'gukurikirana exam', 'Ingendo nubutumwa bwakazi', 54, '2019-01-30', 'caisse', '', 'ABAGIZE INAMA YUBUYOBOZI'),
(700, 'kugura isabune na PH', 'Ibikoresho byisuku/umuriro namazi', 55, '2019-01-31', 'caisse', '', 'Boutique');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `source` varchar(80) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instititution`
--

CREATE TABLE `instititution` (
  `id` int(11) NOT NULL,
  `liability` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_id` int(11) NOT NULL,
  `Level` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Level_id`, `Level`) VALUES
(1, 'BK'),
(2, ' SACCO MASHYUZA '),
(3, ' SACCO MASHYUZA ');

-- --------------------------------------------------------

--
-- Table structure for table `levelcaisse`
--

CREATE TABLE `levelcaisse` (
  `Level_id` int(11) NOT NULL,
  `Level` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `pprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `item` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelscaisse`
--

CREATE TABLE `levelscaisse` (
  `id` int(11) NOT NULL,
  `liability` varchar(50) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `lid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `id` int(11) NOT NULL,
  `source` varchar(80) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `ideni` varchar(60) NOT NULL,
  `value` int(11) NOT NULL,
  `date` date NOT NULL,
  `lid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `names` varchar(200) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `chequeno` varchar(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `names`, `reason`, `amount`, `chequeno`, `date`) VALUES
(1, 'Mushinzimana Phenias', 'Avance kumbaho', 173000, '', '2019-01-09'),
(2, 'Mushinzimana Phenias', 'Facture yimbaho yagemuye', 287600, '', '2019-01-14'),
(3, 'SURWUMWE Innocent', 'Ibiti byikiraro', 600000, '', '2019-01-14'),
(4, 'SIBOMANA Jonas', 'Abakarani guterura ibiti', 70000, '', '2019-01-14'),
(5, 'IRAMBONA Alex', 'Imodoka gutwara ibiti', 130000, '', '2019-01-17'),
(6, 'UCORIVABU', 'Ayimukanywe 2018', 32600, 'caisse', '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `retained`
--

CREATE TABLE `retained` (
  `id` int(11) NOT NULL,
  `pprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `item` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `code` int(11) NOT NULL,
  `codename` varchar(80) NOT NULL,
  `year` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `amountremain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`code`, `codename`, `year`, `id`, `amount`, `amountremain`) VALUES
(0, 'Umusanzu wo kubaka inzego', 2019, 1, 38624850, 38624850),
(0, 'Imisanzu yo kugurira hamwe imifuka', 2019, 2, 25175000, 25175000),
(0, 'Abafatanyabikorwa/inganda', 2019, 3, 1700000, 1700000),
(0, 'Umusanzu wo kugura imashini', 2019, 4, 2800000, 2800000),
(0, 'Gutunga amahugurwa ninama', 2019, 5, 384000, 384000),
(0, 'Inyungu ku migabane', 2019, 6, 200000, 200000),
(0, 'Ayimukanywe yibikorwa', 2019, 7, 2287500, 2287500);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item` varchar(45) NOT NULL DEFAULT '',
  `quantityadded` int(11) NOT NULL,
  `quantityremoved` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `action` varchar(25) NOT NULL DEFAULT '0',
  `currentquantity` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `up` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amadeni`
--
ALTER TABLE `amadeni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combination`
--
ALTER TABLE `combination`
  ADD PRIMARY KEY (`Combination`);

--
-- Indexes for table `combinationcaisse`
--
ALTER TABLE `combinationcaisse`
  ADD PRIMARY KEY (`Combination`);

--
-- Indexes for table `combinations`
--
ALTER TABLE `combinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instititution`
--
ALTER TABLE `instititution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Level_id`);

--
-- Indexes for table `levelcaisse`
--
ALTER TABLE `levelcaisse`
  ADD PRIMARY KEY (`Level_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levelscaisse`
--
ALTER TABLE `levelscaisse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retained`
--
ALTER TABLE `retained`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `amadeni`
--
ALTER TABLE `amadeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `combinations`
--
ALTER TABLE `combinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instititution`
--
ALTER TABLE `instititution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `levelscaisse`
--
ALTER TABLE `levelscaisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `retained`
--
ALTER TABLE `retained`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
