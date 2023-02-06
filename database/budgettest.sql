-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 06:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgettest`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `code` varchar(45) NOT NULL DEFAULT '',
  `codename` varchar(200) NOT NULL DEFAULT '',
  `budgetcode` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `amountremain` int(11) NOT NULL DEFAULT 0,
  `coopid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`code`, `codename`, `budgetcode`, `year`, `id`, `amount`, `amountremain`, `coopid`, `status`) VALUES
('', 'TRANSPORT', '0001', 2023, 1, 170000, 100000, 11, 0),
('', 'FEDERATION AND UNION FEES', '0002', 2023, 2, 130000, 200000, 11, 0),
('', 'WATER AND ELECTRICITY', '0004', 2023, 3, 700000, 700000, 11, 0),
('', 'FERTILIZERS', '0005', 2023, 4, 5000000, 5000000, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `amadeni`
--

CREATE TABLE `amadeni` (
  `id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `pieceno` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `ayishyuwe` int(11) NOT NULL,
  `asigaye` int(11) NOT NULL,
  `datetopay` date NOT NULL,
  `type` varchar(60) NOT NULL,
  `owner` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amadeni`
--

INSERT INTO `amadeni` (`id`, `reason`, `pieceno`, `value`, `ayishyuwe`, `asigaye`, `datetopay`, `type`, `owner`, `date`, `coopid`) VALUES
(1, 'CONSTRUCTION', 1, 30000, 0, 30000, '2021-03-26', 'member', 'EMMANUEL', '2021-03-10', 11);

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
  `status` varchar(20) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset`, `value`, `depreciation`, `date`, `status`, `coopid`) VALUES
(1, 'VEHIV RAD 901D', 7800000, 25, '2009-02-01', 'fixed', 11),
(2, 'BATIMENT', 4300000, 5, '2003-01-23', 'fixed', 11);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `bankname` varchar(45) NOT NULL DEFAULT '',
  `account` varchar(20) NOT NULL DEFAULT '',
  `particulars` varchar(200) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL DEFAULT 0,
  `bordereau` varchar(45) NOT NULL DEFAULT '',
  `action` varchar(25) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `proof` varchar(20) NOT NULL,
  `slip` varchar(20) NOT NULL,
  `bline` varchar(100) NOT NULL,
  `coopid` int(11) NOT NULL,
  `refno` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bankname`, `account`, `particulars`, `amount`, `bordereau`, `action`, `balance`, `date`, `proof`, `slip`, `bline`, `coopid`, `refno`, `status`) VALUES
(1, 'COGEBANQUE', '01311050110-18', 'ndayizeye theogene', 78000000, 'VERSEMENT', 'debit', 78000000, '2021-03-15', 'Slip', '', '', 11, '', 1),
(2, 'COGEBANQUE', '01311050110-18', 'EMMANUEL', 500000, 'ALIMENTATION DE CAISSE', 'credit', 77500000, '2021-03-23', 'Credit', '', '', 11, '', 1),
(3, 'COGEBANQUE', '01311050110-18', 'EMMANUEL', 5000000, 'MAK TECHNO', 'credit', 72500000, '2021-03-16', 'Cheque', '4566', 'INFORMATISATION', 11, '', 1),
(4, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 30000, 'klsdjfl', 'debit', 72530000, '2021-03-26', 'Slip', '212121212', '', 11, '1198756', 1),
(5, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 30000, 'No Reason', 'credit', 72500000, '2021-03-26', 'Credit', '', '', 11, '2548752', 1),
(6, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 100000, 'No Reason', 'credit', 72400000, '2021-03-26', 'Cheque', '4444', 'INFORMATISATION', 11, '32456821', 1),
(7, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 40000, 'No Reason', 'credit', 72360000, '2021-03-26', 'Transfer', 'To BANK OF KIGALI', 'To 00266-06502075-16', 11, '1256', 1),
(8, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 40000, 'No Reason', 'credit', 72320000, '2021-03-26', 'Transfer', 'To BANK OF KIGALI', 'To 00266-06502075-16', 11, '1256', 0),
(9, 'BANK OF KIGALI', '00266-06502075-16', 'MUTONIWASE Alice', 40000, 'No Reason', 'debit', 40000, '2021-03-26', 'Transfer', 'from BANK OF KIGALI', 'From 00266-06502075-16', 11, '1256', 0),
(10, 'COGEBANQUE', '01311050110-18', ' ', 20000, ' ', 'debit', 78020000, '2021-03-26', 'Transfer', 'From Caisse COGEBANQ', 'From Caisset 01311050110-18', 11, '703', 1),
(11, 'COGEBANQUE', '01311050110-18', ' ', 10000, ' ', 'debit', 78010000, '2021-03-26', 'Transfer', 'From Caisse COGEBANQ', 'From Caisset 01311050110-18', 11, '704', 1);

-- --------------------------------------------------------

--
-- Table structure for table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `bankname` varchar(45) DEFAULT '',
  `account` varchar(20) DEFAULT '',
  `particulars` varchar(65) NOT NULL DEFAULT '',
  `amount` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(45) NOT NULL DEFAULT '',
  `action` varchar(25) NOT NULL DEFAULT '0',
  `balance` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `budgetline` varchar(100) DEFAULT NULL,
  `coopid` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `refno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caisse`
--

INSERT INTO `caisse` (`id`, `bankname`, `account`, `particulars`, `amount`, `reason`, `action`, `balance`, `date`, `budgetline`, `coopid`, `status`, `refno`) VALUES
(1, 'COGEBANQUE', '01311050110-18', 'EMMANUEL', 500000, 'ALIMENTATION DE CAISSE', 'debit', 500000, '2021-03-23 00:00:00', '', 11, 1, ''),
(2, '', '', 'KALISA', 50000, 'BOULONS CENTRE', 'credit', 450000, '2021-03-25 00:00:00', '3', 11, 1, ''),
(3, 'hand', '', 'VENTE DE FV', 10000, 'hand', 'debit', 460000, '2021-03-25 00:00:00', NULL, 11, 1, ''),
(4, 'hand', '', 'VENTE DE FV', 10000, 'hand', 'debit', 470000, '2021-03-25 00:00:00', NULL, 11, 1, ''),
(5, '', '', 'KALISA', 50000, 'BOULONS CENTRE', 'credit', 420000, '2021-03-25 00:00:00', '3', 11, 1, ''),
(6, '', '', 'EMMANUEL', 5000, 'KUGURA MAZOUT', 'credit', 415000, '2021-03-26 00:00:00', '2', 11, 1, ''),
(7, '', '', 'EMMANUEL', 5000, 'bla bla bla', 'credit', 410000, '2021-03-26 00:00:00', '1', 11, 1, ''),
(8, '', '', 'BIZIMANA Mathias', 4000, 'KUGURA MAZOUT', 'credit', 411000, '2021-03-26 00:00:00', '2', 11, 1, ''),
(9, '', '', 'EMMANUEL', 5000, 'KUZIGAMA', 'credit', 406000, '2021-03-26 00:00:00', '1', 11, 1, ''),
(10, '', '', 'EMMANUEL', 100000, 'KUGURA MAZOUT', 'credit', 306000, '2021-03-26 00:00:00', 'MAZOUT', 11, 1, ''),
(11, '', '', 'BIZIMANA Mathias', 5000, 'sadkflj', 'credit', 301000, '2021-03-26 00:00:00', 'MAZOUT', 11, 1, ''),
(14, 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 30000, 'No Reason', 'debit', 336000, '2021-03-26 00:00:00', '', 11, 1, ''),
(15, '', '', 'HABIYAREMYE', 5000, 'KUZIGAMA', 'credit', 331000, '2021-03-26 00:00:00', 'KUZIGAMIRA ABAHINZI', 11, 1, ''),
(16, '', '', 'EMMANUEL', 5000, 'KUGURA MAZOUT', 'credit', 331000, '2021-03-26 00:00:00', 'MAZOUT', 11, 1, ''),
(17, '', '', 'MUTONI ALICE', 60000, 'GUHEMBA ABAKOZI', 'credit', 271000, '2021-03-26 00:00:00', 'SALAIRE DES PERSONNELS PERM', 11, 1, ''),
(18, '', '', 'EMMANUEL', 50000, 'KUGURA AMORTISSEUR', 'credit', 281000, '2021-03-26 00:00:00', 'PIECES', 11, 1, ''),
(19, '', '', 'EMMANUEL', 5000, 'KUGURA MAZOUT', 'credit', 276000, '2021-03-26 00:00:00', 'KUZIGAMIRA ABAHINZI', 11, 1, '688'),
(20, '', '', 'HABIYAREMYE', 100000, 'KUZIGAMA', 'credit', 181000, '2021-03-26 00:00:00', 'PIECES', 11, 1, '689'),
(21, '', '', 'EMMANUEL', 5000, 'KUGURA MAZOUT', 'credit', 176000, '2021-03-26 00:00:00', 'KUZIGAMIRA ABAHINZI', 11, 1, '688'),
(22, '', '', 'EMMANUEL', 100000, 'KUZIGAMA', 'credit', 81000, '2021-03-26 00:00:00', 'SALAIRE DES PERSONNELS PERM', 11, 1, '689'),
(23, '', '', 'NDAHAYO', 5000, 'KUZIGAMA', 'credit', 76000, '2021-03-26 00:00:00', 'KUZIGAMIRA ABAHINZI', 11, 1, '688'),
(24, '', '', 'NDAHAYO', 5000, 'KWISYURA SOFTWARE', 'credit', 76000, '2021-03-26 00:00:00', 'INFORMATISATION', 11, 1, '689'),
(25, 'hand', '', 'AMAFARANGA YASAGUTSE', 5000, 'hand', 'debit', 81000, '2021-03-26 00:00:00', NULL, 11, 0, '700'),
(26, 'hand', '', 'AYISHYUWE NA ZIGGY', 5000, 'hand', 'debit', 81000, '2021-03-26 00:00:00', NULL, 11, 0, '701'),
(27, 'caisse', '', '', 20000, 'Transfer to COGEBANQUE ', 'credit', 61000, '2021-03-26 00:00:00', '', 11, 0, '703'),
(28, 'caisse', '', '', 10000, 'Transfer to COGEBANQUE ', 'credit', 71000, '2021-03-26 00:00:00', '', 11, 0, '704');

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

CREATE TABLE `cells` (
  `CellId` int(4) NOT NULL,
  `SectorCode` int(4) DEFAULT NULL,
  `CellName` varchar(20) DEFAULT NULL,
  `CellCode` int(6) DEFAULT NULL,
  `CellStatus` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cells`
--

INSERT INTO `cells` (`CellId`, `SectorCode`, `CellName`, `CellCode`, `CellStatus`) VALUES
(1, 1101, 'Akabahizi', 110101, 1),
(2, 1101, 'Akabeza', 110102, 1),
(3, 1101, 'Gacyamo', 110103, 1),
(4, 1101, 'Kigarama', 110104, 1),
(5, 1101, 'Kinyange', 110105, 1),
(6, 1101, 'Kora', 110106, 1),
(7, 1102, 'Nyamweru', 110201, 1),
(8, 1102, 'Nzove', 110202, 1),
(9, 1102, 'Taba', 110203, 1),
(10, 1103, 'Kigali', 110301, 1),
(11, 1103, 'Mwendo', 110302, 1),
(12, 1103, 'Nyabugogo', 110303, 1),
(13, 1103, 'Ruriba', 110304, 1),
(14, 1103, 'Rwesero', 110305, 1),
(15, 1104, 'Kamuhoza', 110401, 1),
(16, 1104, 'Katabaro', 110402, 1),
(17, 1104, 'Kimisagara', 110403, 1),
(18, 1105, 'Kankuba', 110501, 1),
(19, 1105, 'Kavumu', 110502, 1),
(20, 1105, 'Mataba', 110503, 1),
(21, 1105, 'Ntungamo', 110504, 1),
(22, 1105, 'Nyarufunzo', 110505, 1),
(23, 1105, 'Nyarurenzi', 110506, 1),
(24, 1105, 'Runzenze', 110507, 1),
(25, 1106, 'Amahoro', 110601, 1),
(26, 1106, 'Kabasengerez', 110602, 1),
(27, 1106, 'Kabeza', 110603, 1),
(28, 1106, 'Nyabugogo', 110604, 1),
(29, 1106, 'Rugenge', 110605, 1),
(30, 1106, 'Tetero', 110606, 1),
(31, 1106, 'Ubumwe', 110607, 1),
(32, 1107, 'Munanira I', 110701, 1),
(33, 1107, 'Munanira Ii', 110702, 1),
(34, 1107, 'Nyakabanda I', 110703, 1),
(35, 1107, 'Nyakabanda I', 110704, 1),
(36, 1108, 'Cyivugiza', 110801, 1),
(37, 1108, 'Gasharu', 110802, 1),
(38, 1108, 'Mumena', 110803, 1),
(39, 1108, 'Rugarama', 110804, 1),
(40, 1109, 'Agatare', 110901, 1),
(41, 1109, 'Biryogo', 110902, 1),
(42, 1109, 'Kiyovu', 110903, 1),
(43, 1109, 'Rwampara', 110904, 1),
(44, 1110, 'Kabuguru I', 111001, 1),
(45, 1110, 'Kabuguru II', 111002, 1),
(46, 1110, 'Rwezamenyo I', 111003, 1),
(47, 1110, 'Rwezamenyo I', 111004, 1),
(48, 1201, 'Kinyaga', 120101, 1),
(49, 1201, 'Musave', 120102, 1),
(50, 1201, 'Mvuzo', 120103, 1),
(51, 1201, 'Ngara', 120104, 1),
(52, 1201, 'Nkuzuzu', 120105, 1),
(53, 1201, 'Nyabikenke', 120106, 1),
(54, 1201, 'Nyagasozi', 120107, 1),
(55, 1202, 'Karuruma', 120201, 1),
(56, 1202, 'Nyamabuye', 120202, 1),
(57, 1202, 'Nyamugari', 120203, 1),
(58, 1203, 'Gasagara', 120301, 1),
(59, 1203, 'Gicaca', 120302, 1),
(60, 1203, 'Kibara', 120303, 1),
(61, 1203, 'Munini', 120304, 1),
(62, 1203, 'Murambi', 120305, 1),
(63, 1204, 'Musezero', 120401, 1),
(64, 1204, 'Ruhango', 120402, 1),
(65, 1205, 'Akamatamu', 120501, 1),
(66, 1205, 'Bweramvura', 120502, 1),
(67, 1205, 'Kabuye', 120503, 1),
(68, 1205, 'Kidashya', 120504, 1),
(69, 1205, 'Ngiryi', 120505, 1),
(70, 1206, 'Agateko', 120601, 1),
(71, 1206, 'Buhiza', 120602, 1),
(72, 1206, 'Muko', 120603, 1),
(73, 1206, 'Nkusi', 120604, 1),
(74, 1206, 'Nyabuliba', 120605, 1),
(75, 1206, 'Nyakabungo', 120606, 1),
(76, 1206, 'Nyamitanga', 120607, 1),
(77, 1207, 'Kamatamu', 120701, 1),
(78, 1207, 'Kamutwa', 120702, 1),
(79, 1207, 'Kibaza', 120703, 1),
(80, 1208, 'Kamukina', 120801, 1),
(81, 1208, 'Kimihurura', 120802, 1),
(82, 1208, 'Rugando', 120803, 1),
(83, 1209, 'Bibare', 120901, 1),
(84, 1209, 'Kibagabaga', 120902, 1),
(85, 1209, 'Nyagatovu', 120903, 1),
(86, 1210, 'Gacuriro', 121001, 1),
(87, 1210, 'Gasharu', 121002, 1),
(88, 1210, 'Kagugu', 121003, 1),
(89, 1210, 'Murama', 121004, 1),
(90, 1211, 'Bwiza', 121101, 1),
(91, 1211, 'Cyaruzinge', 121102, 1),
(92, 1211, 'Kibenga', 121103, 1),
(93, 1211, 'Masoro', 121104, 1),
(94, 1211, 'Mukuyu', 121105, 1),
(95, 1211, 'Rudashya', 121106, 1),
(96, 1212, 'Butare', 121201, 1),
(97, 1212, 'Gasanze', 121202, 1),
(98, 1212, 'Gasura', 121203, 1),
(99, 1212, 'Gatunga', 121204, 1),
(100, 1212, 'Muremure', 121205, 1),
(101, 1212, 'Sha', 121206, 1),
(102, 1212, 'Shango', 121207, 1),
(103, 1213, 'Nyabisindu', 121301, 1),
(104, 1213, 'Nyarutarama', 121302, 1),
(105, 1213, 'Rukiri I', 121303, 1),
(106, 1213, 'Rukiri Ii', 121304, 1),
(107, 1214, 'Bisenga', 121401, 1),
(108, 1214, 'Gasagara', 121402, 1),
(109, 1214, 'Kabuga I', 121403, 1),
(110, 1214, 'Kabuga Ii', 121404, 1),
(111, 1214, 'Kinyana', 121405, 1),
(112, 1214, 'Mbandazi', 121406, 1),
(113, 1214, 'Nyagahinga', 121407, 1),
(114, 1214, 'Ruhanga', 121408, 1),
(115, 1215, 'Gasabo', 121501, 1),
(116, 1215, 'Indatemwa', 121502, 1),
(117, 1215, 'Kabaliza', 121503, 1),
(118, 1215, 'Kacyatwa', 121504, 1),
(119, 1215, 'Kibenga', 121505, 1),
(120, 1215, 'Kigabiro', 121506, 1),
(121, 1301, 'Gahanga', 130101, 1),
(122, 1301, 'Kagasa', 130102, 1),
(123, 1301, 'Karembure', 130103, 1),
(124, 1301, 'Murinja', 130104, 1),
(125, 1301, 'Nunga', 130105, 1),
(126, 1301, 'Rwabutenge', 130106, 1),
(127, 1302, 'Gatenga', 130201, 1),
(128, 1302, 'Karambo', 130202, 1),
(129, 1302, 'Nyanza', 130203, 1),
(130, 1302, 'Nyarurama', 130204, 1),
(131, 1303, 'Kagunga', 130301, 1),
(132, 1303, 'Kanserege', 130302, 1),
(133, 1303, 'Kinunga', 130303, 1),
(134, 1304, 'Kanserege', 130401, 1),
(135, 1304, 'Muyange', 130402, 1),
(136, 1304, 'Rukatsa', 130403, 1),
(137, 1305, 'Busanza', 130501, 1),
(138, 1305, 'Kabeza', 130502, 1),
(139, 1305, 'Karama', 130503, 1),
(140, 1305, 'Rubirizi', 130504, 1),
(141, 1306, 'Gasharu', 130601, 1),
(142, 1306, 'Kagina', 130602, 1),
(143, 1306, 'Kicukiro', 130603, 1),
(144, 1306, 'Ngoma', 130604, 1),
(145, 1307, 'Bwerankori', 130701, 1),
(146, 1307, 'Karugira', 130702, 1),
(147, 1307, 'Kigarama', 130703, 1),
(148, 1307, 'Nyarurama', 130704, 1),
(149, 1307, 'Rwampara', 130705, 1),
(150, 1308, 'Ayabaraya', 130801, 1),
(151, 1308, 'Cyimo', 130802, 1),
(152, 1308, 'Gako', 130803, 1),
(153, 1308, 'Gitaraga', 130804, 1),
(154, 1308, 'Mbabe', 130805, 1),
(155, 1308, 'Rusheshe', 130806, 1),
(156, 1309, 'Gatare', 130901, 1),
(157, 1309, 'Niboye', 130902, 1),
(158, 1309, 'Nyakabanda', 130903, 1),
(159, 1310, 'Kamashashi', 131001, 1),
(160, 1310, 'Nonko', 131002, 1),
(161, 1310, 'Rwimbogo', 131003, 1),
(162, 2101, 'Gahondo', 210101, 1),
(163, 2101, 'Kavumu', 210102, 1),
(164, 2101, 'Kibinja', 210103, 1),
(165, 2101, 'Nyanza', 210104, 1),
(166, 2101, 'Rwesero', 210105, 1),
(167, 2102, 'Gitovu', 210201, 1),
(168, 2102, 'Kimirama', 210202, 1),
(169, 2102, 'Masangano', 210203, 1),
(170, 2102, 'Munyinya', 210204, 1),
(171, 2102, 'Rukingiro', 210205, 1),
(172, 2102, 'Shyira', 210206, 1),
(173, 2103, 'Kadaho', 210301, 1),
(174, 2103, 'Karama', 210302, 1),
(175, 2103, 'Nyabinyenga', 210303, 1),
(176, 2103, 'Nyarurama', 210304, 1),
(177, 2103, 'Rubona', 210305, 1),
(178, 2104, 'Cyeru', 210401, 1),
(179, 2104, 'Mbuye', 210402, 1),
(180, 2104, 'Mututu', 210403, 1),
(181, 2104, 'Rwotso', 210404, 1),
(182, 2105, 'Butansinda', 210501, 1),
(183, 2105, 'Butara', 210502, 1),
(184, 2105, 'Gahombo', 210503, 1),
(185, 2105, 'Gasoro', 210504, 1),
(186, 2105, 'Mulinja', 210505, 1),
(187, 2106, 'Cyerezo', 210601, 1),
(188, 2106, 'Gatagara', 210602, 1),
(189, 2106, 'Kiruli', 210603, 1),
(190, 2106, 'Mpanga', 210604, 1),
(191, 2106, 'Ngwa', 210605, 1),
(192, 2106, 'Nkomero', 210606, 1),
(193, 2107, 'Gati', 210701, 1),
(194, 2107, 'Migina', 210702, 1),
(195, 2107, 'Nyamiyaga', 210703, 1),
(196, 2107, 'Nyamure', 210704, 1),
(197, 2107, 'Nyundo', 210705, 1),
(198, 2108, 'Bugali', 210801, 1),
(199, 2108, 'Cyotamakara', 210802, 1),
(200, 2108, 'Kagunga', 210803, 1),
(201, 2108, 'Katarara', 210804, 1),
(202, 2109, 'Gahunga', 210901, 1),
(203, 2109, 'Kabirizi', 210902, 1),
(204, 2109, 'Kabuga', 210903, 1),
(205, 2109, 'Kirambi', 210904, 1),
(206, 2109, 'Rurangazi', 210905, 1),
(207, 2110, 'Gacu', 211001, 1),
(208, 2110, 'Gishike', 211002, 1),
(209, 2110, 'Mubuga', 211003, 1),
(210, 2110, 'Mushirarungu', 211004, 1),
(211, 2110, 'Nyarusange', 211005, 1),
(212, 2110, 'Runga', 211006, 1),
(213, 2201, 'Cyiri', 220101, 1),
(214, 2201, 'Gasagara', 220102, 1),
(215, 2201, 'Gikonko', 220103, 1),
(216, 2201, 'Mbogo', 220104, 1),
(217, 2202, 'Gabiro', 220201, 1),
(218, 2202, 'Nyabitare', 220202, 1),
(219, 2202, 'Nyakibungo', 220203, 1),
(220, 2202, 'Nyeranzi', 220204, 1),
(221, 2203, 'Akaboti', 220301, 1),
(222, 2203, 'Bwiza', 220302, 1),
(223, 2203, 'Sabusaro', 220303, 1),
(224, 2203, 'Umunini', 220304, 1),
(225, 2204, 'Duwani', 220401, 1),
(226, 2204, 'Kibirizi', 220402, 1),
(227, 2204, 'Muyira', 220403, 1),
(228, 2204, 'Ruturo', 220404, 1),
(229, 2205, 'Agahabwa', 220501, 1),
(230, 2205, 'Gatovu', 220502, 1),
(231, 2205, 'Impinga', 220503, 1),
(232, 2205, 'Nyabikenke', 220504, 1),
(233, 2205, 'Rubona', 220505, 1),
(234, 2205, 'Rusagara', 220506, 1),
(235, 2206, 'Gakoma', 220601, 1),
(236, 2206, 'Kabumbwe', 220602, 1),
(237, 2206, 'Mamba', 220603, 1),
(238, 2206, 'Muyaga', 220604, 1),
(239, 2206, 'Ramba', 220605, 1),
(240, 2207, 'Cyumba', 220701, 1),
(241, 2207, 'Muganza', 220702, 1),
(242, 2207, 'Remera', 220703, 1),
(243, 2207, 'Rwamiko', 220704, 1),
(244, 2207, 'Saga', 220705, 1),
(245, 2208, 'Baziro', 220801, 1),
(246, 2208, 'Kibayi', 220802, 1),
(247, 2208, 'Kibu', 220803, 1),
(248, 2208, 'Mugombwa', 220804, 1),
(249, 2208, 'Mukomacara', 220805, 1),
(250, 2209, 'Gitega', 220901, 1),
(251, 2209, 'Mukiza', 220902, 1),
(252, 2209, 'Nyabisagara', 220903, 1),
(253, 2209, 'Runyinya', 220904, 1),
(254, 2210, 'Bukinanyana', 221001, 1),
(255, 2210, 'Gatovu', 221002, 1),
(256, 2210, 'Kigarama', 221003, 1),
(257, 2210, 'Kimana', 221004, 1),
(258, 2211, 'Bweya', 221101, 1),
(259, 2211, 'Cyamukuza', 221102, 1),
(260, 2211, 'Dahwe', 221103, 1),
(261, 2211, 'Gisagara', 221104, 1),
(262, 2211, 'Mukande', 221105, 1),
(263, 2212, 'Higiro', 221201, 1),
(264, 2212, 'Nyamugari', 221202, 1),
(265, 2212, 'Nyaruteja', 221203, 1),
(266, 2212, 'Umubanga', 221204, 1),
(267, 2213, 'Gatoki', 221301, 1),
(268, 2213, 'Munazi', 221302, 1),
(269, 2213, 'Rwanza', 221303, 1),
(270, 2213, 'Shyanda', 221304, 1),
(271, 2213, 'Zivu', 221305, 1),
(272, 2301, 'Kirarangombe', 230101, 1),
(273, 2301, 'Nkanda', 230102, 1),
(274, 2301, 'Nteko', 230103, 1),
(275, 2301, 'Runyombyi', 230104, 1),
(276, 2301, 'Shororo', 230105, 1),
(277, 2302, 'Coko', 230201, 1),
(278, 2302, 'Cyahinda', 230202, 1),
(279, 2302, 'Gasasa', 230203, 1),
(280, 2302, 'Muhambara', 230204, 1),
(281, 2302, 'Rutobwe', 230205, 1),
(282, 2303, 'Gakoma', 230301, 1),
(283, 2303, 'Kibeho', 230302, 1),
(284, 2303, 'Mbasa', 230303, 1),
(285, 2303, 'Mpanda', 230304, 1),
(286, 2303, 'Mubuga', 230305, 1),
(287, 2303, 'Nyange', 230306, 1),
(288, 2304, 'Cyanyirankora', 230401, 1),
(289, 2304, 'Gahurizo', 230402, 1),
(290, 2304, 'Kimina', 230403, 1),
(291, 2304, 'Kivu', 230404, 1),
(292, 2304, 'Rugerero', 230405, 1),
(293, 2305, 'Gorwe', 230501, 1),
(294, 2305, 'Murambi', 230502, 1),
(295, 2305, 'Nyamabuye', 230503, 1),
(296, 2305, 'Ramba', 230504, 1),
(297, 2305, 'Rwamiko', 230505, 1),
(298, 2306, 'Muganza', 230601, 1),
(299, 2306, 'Rukore', 230602, 1),
(300, 2306, 'Samiyonga', 230603, 1),
(301, 2306, 'Uwacyiza', 230604, 1),
(302, 2307, 'Giheta', 230701, 1),
(303, 2307, 'Ngarurira', 230702, 1),
(304, 2307, 'Ngeri', 230703, 1),
(305, 2307, 'Ntwali', 230704, 1),
(306, 2307, 'Nyarure', 230705, 1),
(307, 2308, 'Bitare', 230801, 1),
(308, 2308, 'Mukuge', 230802, 1),
(309, 2308, 'Murama', 230803, 1),
(310, 2308, 'Nyamirama', 230804, 1),
(311, 2308, 'Nyanza', 230805, 1),
(312, 2308, 'Yaramba', 230806, 1),
(313, 2309, 'Fugi', 230901, 1),
(314, 2309, 'Kibangu', 230902, 1),
(315, 2309, 'Kiyonza', 230903, 1),
(316, 2309, 'Mbuye', 230904, 1),
(317, 2309, 'Nyamirama', 230905, 1),
(318, 2309, 'Rubona', 230906, 1),
(319, 2310, 'Gihemvu', 231001, 1),
(320, 2310, 'Kabere', 231002, 1),
(321, 2310, 'Mishungero', 231003, 1),
(322, 2310, 'Nyabimata', 231004, 1),
(323, 2310, 'Ruhinga', 231005, 1),
(324, 2311, 'Maraba', 231101, 1),
(325, 2311, 'Mwoya', 231102, 1),
(326, 2311, 'Nkakwa', 231103, 1),
(327, 2311, 'Nyagisozi', 231104, 1),
(328, 2312, 'Gitita', 231201, 1),
(329, 2312, 'Kabere', 231202, 1),
(330, 2312, 'Remera', 231203, 1),
(331, 2312, 'Ruyenzi', 231204, 1),
(332, 2312, 'Uwumusebeya', 231205, 1),
(333, 2313, 'Gabiro', 231301, 1),
(334, 2313, 'Giseke', 231302, 1),
(335, 2313, 'Nyarugano', 231303, 1),
(336, 2313, 'Rugogwe', 231304, 1),
(337, 2313, 'Ruramba', 231305, 1),
(338, 2314, 'Bunge', 231401, 1),
(339, 2314, 'Cyuna', 231402, 1),
(340, 2314, 'Gikunzi', 231403, 1),
(341, 2314, 'Mariba', 231404, 1),
(342, 2314, 'Raranzige', 231405, 1),
(343, 2314, 'Rusenge', 231406, 1),
(344, 2401, 'Nyakibanda', 240101, 1),
(345, 2401, 'Nyumba', 240102, 1),
(346, 2401, 'Ryakibogo', 240103, 1),
(347, 2401, 'Shori', 240104, 1),
(348, 2402, 'Muyogoro', 240201, 1),
(349, 2402, 'Nyakagezi', 240202, 1),
(350, 2402, 'Rukira', 240203, 1),
(351, 2402, 'Sovu', 240204, 1),
(352, 2403, 'Buhoro', 240301, 1),
(353, 2403, 'Bunazi', 240302, 1),
(354, 2403, 'Gahororo', 240303, 1),
(355, 2403, 'Kibingo', 240304, 1),
(356, 2403, 'Muhembe', 240305, 1),
(357, 2404, 'Gishihe', 240401, 1),
(358, 2404, 'Kabatwa', 240402, 1),
(359, 2404, 'Kabuga', 240403, 1),
(360, 2404, 'Karambi', 240404, 1),
(361, 2404, 'Musebeya', 240405, 1),
(362, 2404, 'Nyabisindu', 240406, 1),
(363, 2404, 'Rugarama', 240407, 1),
(364, 2404, 'Shanga', 240408, 1),
(365, 2405, 'Byinza', 240501, 1),
(366, 2405, 'Gahana', 240502, 1),
(367, 2405, 'Gitovu', 240503, 1),
(368, 2405, 'Kabona', 240504, 1),
(369, 2405, 'Sazange', 240505, 1),
(370, 2406, 'Buremera', 240601, 1),
(371, 2406, 'Gasumba', 240602, 1),
(372, 2406, 'Kabuye', 240603, 1),
(373, 2406, 'Kanyinya', 240604, 1),
(374, 2406, 'Shanga', 240605, 1),
(375, 2406, 'Shyembe', 240606, 1),
(376, 2407, 'Gatobotobo', 240701, 1),
(377, 2407, 'Kabuga', 240702, 1),
(378, 2407, 'Mutunda', 240703, 1),
(379, 2407, 'Mwulire', 240704, 1),
(380, 2407, 'Rugango', 240705, 1),
(381, 2407, 'Rusagara', 240706, 1),
(382, 2407, 'Tare', 240707, 1),
(383, 2408, 'Bukomeye', 240801, 1),
(384, 2408, 'Buvumu', 240802, 1),
(385, 2408, 'Icyeru', 240803, 1),
(386, 2408, 'Rango A', 240804, 1),
(387, 2409, 'Butare', 240901, 1),
(388, 2409, 'Kaburemera', 240902, 1),
(389, 2409, 'Matyazo', 240903, 1),
(390, 2409, 'Ngoma', 240904, 1),
(391, 2410, 'Busheshi', 241001, 1),
(392, 2410, 'Gatovu', 241002, 1),
(393, 2410, 'Karama', 241003, 1),
(394, 2410, 'Mara', 241004, 1),
(395, 2410, 'Muhororo', 241005, 1),
(396, 2410, 'Rugogwe', 241006, 1),
(397, 2410, 'Ruhashya', 241007, 1),
(398, 2411, 'Buhimba', 241101, 1),
(399, 2411, 'Gafumba', 241102, 1),
(400, 2411, 'Kimirehe', 241103, 1),
(401, 2411, 'Kimuna', 241104, 1),
(402, 2411, 'Kiruhura', 241105, 1),
(403, 2411, 'Mugogwe', 241106, 1),
(404, 2412, 'Gatwaro', 241201, 1),
(405, 2412, 'Kamwambi', 241202, 1),
(406, 2412, 'Kibiraro', 241203, 1),
(407, 2412, 'Mwendo', 241204, 1),
(408, 2412, 'Nyamabuye', 241205, 1),
(409, 2412, 'Nyaruhombo', 241206, 1),
(410, 2412, 'Shyunga', 241207, 1),
(411, 2413, 'Cyendajuru', 241301, 1),
(412, 2413, 'Gisakura', 241302, 1),
(413, 2413, 'Kabusanza', 241303, 1),
(414, 2413, 'Mugobore', 241304, 1),
(415, 2413, 'Nyangazi', 241305, 1),
(416, 2414, 'Cyarwa', 241401, 1),
(417, 2414, 'Cyimana', 241402, 1),
(418, 2414, 'Gitwa', 241403, 1),
(419, 2414, 'Mpare', 241404, 1),
(420, 2414, 'Rango B', 241405, 1),
(421, 2501, 'Bushigishigi', 250101, 1),
(422, 2501, 'Byimana', 250102, 1),
(423, 2501, 'Gifurwe', 250103, 1),
(424, 2501, 'Kizimyamurir', 250104, 1),
(425, 2501, 'Munini', 250105, 1),
(426, 2501, 'Rambya', 250106, 1),
(427, 2502, 'Gitega', 250201, 1),
(428, 2502, 'Karama', 250202, 1),
(429, 2502, 'Kiyumba', 250203, 1),
(430, 2502, 'Ngoma', 250204, 1),
(431, 2502, 'Nyanza', 250205, 1),
(432, 2502, 'Nyanzoga', 250206, 1),
(433, 2503, 'Kigeme', 250301, 1),
(434, 2503, 'Ngiryi', 250302, 1),
(435, 2503, 'Nyabivumu', 250303, 1),
(436, 2503, 'Nyamugari', 250304, 1),
(437, 2503, 'Nzega', 250305, 1),
(438, 2503, 'Remera', 250306, 1),
(439, 2504, 'Bakopfu', 250401, 1),
(440, 2504, 'Gatare', 250402, 1),
(441, 2504, 'Mukongoro', 250403, 1),
(442, 2504, 'Ruganda', 250404, 1),
(443, 2504, 'Shyeru', 250405, 1),
(444, 2505, 'Kavumu', 250501, 1),
(445, 2505, 'Murambi', 250502, 1),
(446, 2505, 'Musenyi', 250503, 1),
(447, 2505, 'Nyabisindu', 250504, 1),
(448, 2505, 'Nyamiyaga', 250505, 1),
(449, 2506, 'Bwama', 250601, 1),
(450, 2506, 'Kamegeri', 250602, 1),
(451, 2506, 'Kirehe', 250603, 1),
(452, 2506, 'Kizi', 250604, 1),
(453, 2506, 'Nyarusiza', 250605, 1),
(454, 2506, 'Rususa', 250606, 1),
(455, 2507, 'Bugarama', 250701, 1),
(456, 2507, 'Bugarura', 250702, 1),
(457, 2507, 'Gashiha', 250703, 1),
(458, 2507, 'Karambo', 250704, 1),
(459, 2507, 'Ruhunga', 250705, 1),
(460, 2507, 'Uwindekezi', 250706, 1),
(461, 2508, 'Bwenda', 250801, 1),
(462, 2508, 'Gakanka', 250802, 1),
(463, 2508, 'Kibibi', 250803, 1),
(464, 2508, 'Nyakiza', 250804, 1),
(465, 2509, 'Kagano', 250901, 1),
(466, 2509, 'Mujuga', 250902, 1),
(467, 2509, 'Mukungu', 250903, 1),
(468, 2509, 'Shaba', 250904, 1),
(469, 2509, 'Uwingugu', 250905, 1),
(470, 2510, 'Manwari', 251001, 1),
(471, 2510, 'Mutiwingoma', 251002, 1),
(472, 2510, 'Ngambi', 251003, 1),
(473, 2510, 'Ngara', 251004, 1),
(474, 2511, 'Gitondorero', 251101, 1),
(475, 2511, 'Gitwa', 251102, 1),
(476, 2511, 'Ruhinga', 251103, 1),
(477, 2511, 'Sovu', 251104, 1),
(478, 2511, 'Suti', 251105, 1),
(479, 2511, 'Yonde', 251106, 1),
(480, 2512, 'Gasave', 251201, 1),
(481, 2512, 'Jenda', 251202, 1),
(482, 2512, 'Masagara', 251203, 1),
(483, 2512, 'Masangano', 251204, 1),
(484, 2512, 'Masizi', 251205, 1),
(485, 2512, 'Nyagisozi', 251206, 1),
(486, 2513, 'Gatovu', 251301, 1),
(487, 2513, 'Nyarurambi', 251302, 1),
(488, 2513, 'Rugano', 251303, 1),
(489, 2513, 'Runege', 251304, 1),
(490, 2513, 'Rusekera', 251305, 1),
(491, 2513, 'Sekera', 251306, 1),
(492, 2514, 'Buteteri', 251401, 1),
(493, 2514, 'Cyobe', 251402, 1),
(494, 2514, 'Gashwati', 251403, 1),
(495, 2515, 'Bitandara', 251501, 1),
(496, 2515, 'Musaraba', 251502, 1),
(497, 2515, 'Mutengeri', 251503, 1),
(498, 2515, 'Nkomane', 251504, 1),
(499, 2515, 'Nyarwungo', 251505, 1),
(500, 2515, 'Twiya', 251506, 1),
(501, 2516, 'Buhoro', 251601, 1),
(502, 2516, 'Gasarenda', 251602, 1),
(503, 2516, 'Gatovu', 251603, 1),
(504, 2516, 'Kaganza', 251604, 1),
(505, 2516, 'Nkumbure', 251605, 1),
(506, 2516, 'Nyamigina', 251606, 1),
(507, 2517, 'Bigumira', 251701, 1),
(508, 2517, 'Gahira', 251702, 1),
(509, 2517, 'Kibyagira', 251703, 1),
(510, 2517, 'Mudasomwa', 251704, 1),
(511, 2517, 'Munyege', 251705, 1),
(512, 2517, 'Rugogwe', 251706, 1),
(513, 2601, 'Buhanda', 260101, 1),
(514, 2601, 'Gitisi', 260102, 1),
(515, 2601, 'Murama', 260103, 1),
(516, 2601, 'Rubona', 260104, 1),
(517, 2601, 'Rwinyana', 260105, 1),
(518, 2602, 'Kamusenyi', 260201, 1),
(519, 2602, 'Kirengeri', 260202, 1),
(520, 2602, 'Mahembe', 260203, 1),
(521, 2602, 'Mpanda', 260204, 1),
(522, 2602, 'Muhororo', 260205, 1),
(523, 2602, 'Ntenyo', 260206, 1),
(524, 2602, 'Nyakabuye', 260207, 1),
(525, 2603, 'Bihembe', 260301, 1),
(526, 2603, 'Karambi', 260302, 1),
(527, 2603, 'Munanira', 260303, 1),
(528, 2603, 'Remera', 260304, 1),
(529, 2603, 'Rwesero', 260305, 1),
(530, 2603, 'Rwoga', 260306, 1),
(531, 2604, 'Burima', 260401, 1),
(532, 2604, 'Gisali', 260402, 1),
(533, 2604, 'Kinazi', 260403, 1),
(534, 2604, 'Rubona', 260404, 1),
(535, 2604, 'Rutabo', 260405, 1),
(536, 2605, 'Bweramvura', 260501, 1),
(537, 2605, 'Gitinda', 260502, 1),
(538, 2605, 'Kirwa', 260503, 1),
(539, 2605, 'Muyunzwe', 260504, 1),
(540, 2605, 'Nyakogo', 260505, 1),
(541, 2605, 'Rukina', 260506, 1),
(542, 2606, 'Cyanza', 260601, 1),
(543, 2606, 'Gisanga', 260602, 1),
(544, 2606, 'Kabuga', 260603, 1),
(545, 2606, 'Kizibere', 260604, 1),
(546, 2606, 'Mbuye', 260605, 1),
(547, 2606, 'Mwendo', 260606, 1),
(548, 2606, 'Nyakarekare', 260607, 1),
(549, 2607, 'Gafunzo', 260701, 1),
(550, 2607, 'Gishweru', 260702, 1),
(551, 2607, 'Kamujisho', 260703, 1),
(552, 2607, 'Kigarama', 260704, 1),
(553, 2607, 'Kubutare', 260705, 1),
(554, 2607, 'Mutara', 260706, 1),
(555, 2607, 'Nyabibugu', 260707, 1),
(556, 2607, 'Saruheshyi', 260708, 1),
(557, 2608, 'Gako', 260801, 1),
(558, 2608, 'Kareba', 260802, 1),
(559, 2608, 'Kayenzi', 260803, 1),
(560, 2608, 'Kebero', 260804, 1),
(561, 2608, 'Nyagisozi', 260805, 1),
(562, 2608, 'Nyakabungo', 260806, 1),
(563, 2608, 'Nyarurama', 260807, 1),
(564, 2609, 'Buhoro', 260901, 1),
(565, 2609, 'Bunyogombe', 260902, 1),
(566, 2609, 'Gikoma', 260903, 1),
(567, 2609, 'Munini', 260904, 1),
(568, 2609, 'Musamo', 260905, 1),
(569, 2609, 'Nyamagana', 260906, 1),
(570, 2609, 'Rwoga', 260907, 1),
(571, 2609, 'Tambwe', 260908, 1),
(572, 2701, 'Biringaga', 270101, 1),
(573, 2701, 'Kigarama', 270102, 1),
(574, 2701, 'Kivumu', 270103, 1),
(575, 2701, 'Makera', 270104, 1),
(576, 2701, 'Nyarunyinya', 270105, 1),
(577, 2701, 'Shori', 270106, 1),
(578, 2702, 'Buramba', 270201, 1),
(579, 2702, 'Butare', 270202, 1),
(580, 2702, 'Kabuye', 270203, 1),
(581, 2702, 'Kavumu', 270204, 1),
(582, 2702, 'Kibyimba', 270205, 1),
(583, 2702, 'Ngarama', 270206, 1),
(584, 2702, 'Ngoma', 270207, 1),
(585, 2702, 'Sholi', 270208, 1),
(586, 2703, 'Gisharu', 270301, 1),
(587, 2703, 'Gitega', 270302, 1),
(588, 2703, 'Jurwe', 270303, 1),
(589, 2703, 'Mubuga', 270304, 1),
(590, 2703, 'Rubyiniro', 270305, 1),
(591, 2703, 'Ryakanimba', 270306, 1),
(592, 2704, 'Budende', 270401, 1),
(593, 2704, 'Ndago', 270402, 1),
(594, 2704, 'Remera', 270403, 1),
(595, 2704, 'Ruhina', 270404, 1),
(596, 2704, 'Rukeri', 270405, 1),
(597, 2705, 'Kanyinya', 270501, 1),
(598, 2705, 'Nganzo', 270502, 1),
(599, 2705, 'Nyamirama', 270503, 1),
(600, 2705, 'Remera', 270504, 1),
(601, 2705, 'Tyazo', 270505, 1),
(602, 2706, 'Matyazo', 270601, 1),
(603, 2706, 'Munazi', 270602, 1),
(604, 2706, 'Nyagasozi', 270603, 1),
(605, 2706, 'Rukaragata', 270604, 1),
(606, 2706, 'Rwasare', 270605, 1),
(607, 2706, 'Rwigerero', 270606, 1),
(608, 2707, 'Gashorera', 270701, 1),
(609, 2707, 'Masangano', 270702, 1),
(610, 2707, 'Mbuga', 270703, 1),
(611, 2707, 'Muvumba', 270704, 1),
(612, 2707, 'Nyarusozi', 270705, 1),
(613, 2708, 'Gahogo', 270801, 1),
(614, 2708, 'Gifumba', 270802, 1),
(615, 2708, 'Gitarama', 270803, 1),
(616, 2708, 'Remera', 270804, 1),
(617, 2709, 'Mbiriri', 270901, 1),
(618, 2709, 'Musongati', 270902, 1),
(619, 2709, 'Ngaru', 270903, 1),
(620, 2709, 'Rusovu', 270904, 1),
(621, 2710, 'Gasagara', 271001, 1),
(622, 2710, 'Gasharu', 271002, 1),
(623, 2710, 'Karambo', 271003, 1),
(624, 2710, 'Nyamirambo', 271004, 1),
(625, 2710, 'Ruhango', 271005, 1),
(626, 2711, 'Gasave', 271101, 1),
(627, 2711, 'Kanyana', 271102, 1),
(628, 2711, 'Kibaga', 271103, 1),
(629, 2711, 'Mpinga', 271104, 1),
(630, 2711, 'Nsanga', 271105, 1),
(631, 2712, 'Kinini', 271201, 1),
(632, 2712, 'Mbare', 271202, 1),
(633, 2712, 'Mubuga', 271203, 1),
(634, 2712, 'Ruli', 271204, 1),
(635, 2801, 'Gihinga', 280101, 1),
(636, 2801, 'Gihira', 280102, 1),
(637, 2801, 'Kigembe', 280103, 1),
(638, 2801, 'Nkingo', 280104, 1),
(639, 2802, 'Bitare', 280201, 1),
(640, 2802, 'Bunyonga', 280202, 1),
(641, 2802, 'Muganza', 280203, 1),
(642, 2802, 'Nyamirembe', 280204, 1),
(643, 2803, 'Bugarama', 280301, 1),
(644, 2803, 'Cubi', 280302, 1),
(645, 2803, 'Kayonza', 280303, 1),
(646, 2803, 'Kirwa', 280304, 1),
(647, 2803, 'Mataba', 280305, 1),
(648, 2803, 'Nyamirama', 280306, 1),
(649, 2804, 'Busoro', 280401, 1),
(650, 2804, 'Gaseke', 280402, 1),
(651, 2804, 'Giko', 280403, 1),
(652, 2804, 'Muyange', 280404, 1),
(653, 2805, 'Jenda', 280501, 1),
(654, 2805, 'Kabugondo', 280502, 1),
(655, 2805, 'Mbati', 280503, 1),
(656, 2805, 'Mugina', 280504, 1),
(657, 2805, 'Nteko', 280505, 1),
(658, 2806, 'Buhoro', 280601, 1),
(659, 2806, 'Cyambwe', 280602, 1),
(660, 2806, 'Karengera', 280603, 1),
(661, 2806, 'Kivumu', 280604, 1),
(662, 2806, 'Mpushi', 280605, 1),
(663, 2806, 'Rukambura', 280606, 1),
(664, 2807, 'Kabuga', 280701, 1),
(665, 2807, 'Kazirabonde', 280702, 1),
(666, 2807, 'Marembo', 280703, 1),
(667, 2808, 'Bibungo', 280801, 1),
(668, 2808, 'Kabashumba', 280802, 1),
(669, 2808, 'Kidahwe', 280803, 1),
(670, 2808, 'Mukinga', 280804, 1),
(671, 2808, 'Ngoma', 280805, 1),
(672, 2809, 'Gitare', 280901, 1),
(673, 2809, 'Kambyeyi', 280902, 1),
(674, 2809, 'Kigusa', 280903, 1),
(675, 2809, 'Nyagishubi', 280904, 1),
(676, 2809, 'Ruyanza', 280905, 1),
(677, 2810, 'Bihembe', 281001, 1),
(678, 2810, 'Kigese', 281002, 1),
(679, 2810, 'Masaka', 281003, 1),
(680, 2810, 'Nyarubuye', 281004, 1),
(681, 2810, 'Sheli', 281005, 1),
(682, 2811, 'Bugoba', 281101, 1),
(683, 2811, 'Buguri', 281102, 1),
(684, 2811, 'Gishyeshye', 281103, 1),
(685, 2811, 'Murehe', 281104, 1),
(686, 2811, 'Mwirute', 281105, 1),
(687, 2811, 'Remera', 281106, 1),
(688, 2811, 'Taba', 281107, 1),
(689, 2812, 'Gihara', 281201, 1),
(690, 2812, 'Kabagesera', 281202, 1),
(691, 2812, 'Kagina', 281203, 1),
(692, 2812, 'Muganza', 281204, 1),
(693, 2812, 'Ruyenzi', 281205, 1),
(694, 3101, 'Burunga', 310101, 1),
(695, 3101, 'Gasura', 310102, 1),
(696, 3101, 'Gitarama', 310103, 1),
(697, 3101, 'Kayenzi', 310104, 1),
(698, 3101, 'Kibuye', 310105, 1),
(699, 3101, 'Kiniha', 310106, 1),
(700, 3101, 'Nyarusazi', 310107, 1),
(701, 3102, 'Birambo', 310201, 1),
(702, 3102, 'Musasa', 310202, 1),
(703, 3102, 'Mwendo', 310203, 1),
(704, 3102, 'Rugobagoba', 310204, 1),
(705, 3102, 'Tongati', 310205, 1),
(706, 3103, 'Buhoro', 310301, 1),
(707, 3103, 'Cyanya', 310302, 1),
(708, 3103, 'Kigarama', 310303, 1),
(709, 3103, 'Munanira', 310304, 1),
(710, 3103, 'Musasa', 310305, 1),
(711, 3103, 'Ngoma', 310306, 1),
(712, 3104, 'Gasharu', 310401, 1),
(713, 3104, 'Gitega', 310402, 1),
(714, 3104, 'Kanunga', 310403, 1),
(715, 3104, 'Kirambo', 310404, 1),
(716, 3104, 'Munanira', 310405, 1),
(717, 3104, 'Nyamiringa', 310406, 1),
(718, 3104, 'Ruhinga', 310407, 1),
(719, 3104, 'Rwariro', 310408, 1),
(720, 3105, 'Kagabiro', 310501, 1),
(721, 3105, 'Murangara', 310502, 1),
(722, 3105, 'Nyagatovu', 310503, 1),
(723, 3105, 'Ryaruhanga', 310504, 1),
(724, 3106, 'Mubuga', 310601, 1),
(725, 3106, 'Muhororo', 310602, 1),
(726, 3106, 'Nkoto', 310603, 1),
(727, 3106, 'Nyarunyinya', 310604, 1),
(728, 3106, 'Shyembe', 310605, 1),
(729, 3107, 'Bukiro', 310701, 1),
(730, 3107, 'Kabaya', 310702, 1),
(731, 3107, 'Kamina', 310703, 1),
(732, 3107, 'Kareba', 310704, 1),
(733, 3107, 'Nyamushishi', 310705, 1),
(734, 3107, 'Nzaratsi', 310706, 1),
(735, 3108, 'Byogo', 310801, 1),
(736, 3108, 'Gasharu', 310802, 1),
(737, 3108, 'Gisayura', 310803, 1),
(738, 3108, 'Kanyege', 310804, 1),
(739, 3108, 'Kinyonzwe', 310805, 1),
(740, 3108, 'Murengezo', 310806, 1),
(741, 3108, 'Rwufi', 310807, 1),
(742, 3109, 'Bubazi', 310901, 1),
(743, 3109, 'Gacaca', 310902, 1),
(744, 3109, 'Gisanze', 310903, 1),
(745, 3109, 'Gitwa', 310904, 1),
(746, 3109, 'Kibirizi', 310905, 1),
(747, 3109, 'Mataba', 310906, 1),
(748, 3109, 'Nyarugenge', 310907, 1),
(749, 3109, 'Ruragwe', 310908, 1),
(750, 3110, 'Gisiza', 311001, 1),
(751, 3110, 'Gitega', 311002, 1),
(752, 3110, 'Gitovu', 311003, 1),
(753, 3110, 'Kabuga', 311004, 1),
(754, 3110, 'Mubuga', 311005, 1),
(755, 3110, 'Mucyimba', 311006, 1),
(756, 3110, 'Rufungo', 311007, 1),
(757, 3110, 'Rwungo', 311008, 1),
(758, 3110, 'Tyazo', 311009, 1),
(759, 3111, 'Biguhu', 311101, 1),
(760, 3111, 'Kabingo', 311102, 1),
(761, 3111, 'Kinyovu', 311103, 1),
(762, 3111, 'Kivumu', 311104, 1),
(763, 3111, 'Nyabikeri', 311105, 1),
(764, 3111, 'Nyamugwagwa', 311106, 1),
(765, 3111, 'Rubona', 311107, 1),
(766, 3111, 'Rugobagoba', 311108, 1),
(767, 3112, 'Bigugu', 311201, 1),
(768, 3112, 'Bisesero', 311202, 1),
(769, 3112, 'Gasata', 311203, 1),
(770, 3112, 'Munini', 311204, 1),
(771, 3112, 'Nyakamira', 311205, 1),
(772, 3112, 'Nyarusanga', 311206, 1),
(773, 3112, 'Rubazo', 311207, 1),
(774, 3112, 'Rubumba', 311208, 1),
(775, 3113, 'Bihumbe', 311301, 1),
(776, 3113, 'Gakuta', 311302, 1),
(777, 3113, 'Gisovu', 311303, 1),
(778, 3113, 'Gitabura', 311304, 1),
(779, 3113, 'Kavumu', 311305, 1),
(780, 3113, 'Murehe', 311306, 1),
(781, 3113, 'Rutabi', 311307, 1),
(782, 3201, 'Bushaka', 320101, 1),
(783, 3201, 'Kabihogo', 320102, 1),
(784, 3201, 'Nkira', 320103, 1),
(785, 3201, 'Remera', 320104, 1),
(786, 3202, 'Bugina', 320201, 1),
(787, 3202, 'Congo-nil', 320202, 1),
(788, 3202, 'Mataba', 320203, 1),
(789, 3202, 'Murambi', 320204, 1),
(790, 3202, 'Ruhingo', 320205, 1),
(791, 3202, 'Shyembe', 320206, 1),
(792, 3202, 'Teba', 320207, 1),
(793, 3203, 'Buhindure', 320301, 1),
(794, 3203, 'Nkora', 320302, 1),
(795, 3203, 'Nyagahinika', 320303, 1),
(796, 3203, 'Rukaragata', 320304, 1),
(797, 3204, 'Bunyoni', 320401, 1),
(798, 3204, 'Bunyunju', 320402, 1),
(799, 3204, 'Kabere', 320403, 1),
(800, 3204, 'Kabujenje', 320404, 1),
(801, 3204, 'Karambi', 320405, 1),
(802, 3204, 'Nganzo', 320406, 1),
(803, 3205, 'Haniro', 320501, 1),
(804, 3205, 'Muyira', 320502, 1),
(805, 3205, 'Tangabo', 320503, 1),
(806, 3206, 'Kabuga', 320601, 1),
(807, 3206, 'Kagano', 320602, 1),
(808, 3206, 'Kageyo', 320603, 1),
(809, 3206, 'Kagusa', 320604, 1),
(810, 3206, 'Karambo', 320605, 1),
(811, 3206, 'Mwendo', 320606, 1),
(812, 3207, 'Kirwa', 320701, 1),
(813, 3207, 'Mburamazi', 320702, 1),
(814, 3207, 'Rugeyo', 320703, 1),
(815, 3207, 'Twabugezi', 320704, 1),
(816, 3208, 'Gabiro', 320801, 1),
(817, 3208, 'Gisiza', 320802, 1),
(818, 3208, 'Murambi', 320803, 1),
(819, 3208, 'Nyarubuye', 320804, 1),
(820, 3209, 'Biruyi', 320901, 1),
(821, 3209, 'Kaguriro', 320902, 1),
(822, 3209, 'Magaba', 320903, 1),
(823, 3209, 'Rurara', 320904, 1),
(824, 3210, 'Bumba', 321001, 1),
(825, 3210, 'Cyarusera', 321002, 1),
(826, 3210, 'Gitwa', 321003, 1),
(827, 3210, 'Mageragere', 321004, 1),
(828, 3210, 'Sure', 321005, 1),
(829, 3211, 'Busuku', 321101, 1),
(830, 3211, 'Cyivugiza', 321102, 1),
(831, 3211, 'Mubuga', 321103, 1),
(832, 3211, 'Ngoma', 321104, 1),
(833, 3211, 'Terimbere', 321105, 1),
(834, 3212, 'Gatare', 321201, 1),
(835, 3212, 'Gihira', 321202, 1),
(836, 3212, 'Kavumu', 321203, 1),
(837, 3212, 'Nyakarera', 321204, 1),
(838, 3212, 'Rugasa', 321205, 1),
(839, 3212, 'Rundoyi', 321206, 1),
(840, 3213, 'Kabona', 321301, 1),
(841, 3213, 'Mberi', 321302, 1),
(842, 3213, 'Remera', 321303, 1),
(843, 3213, 'Ruronde', 321304, 1),
(844, 3301, 'Buringo', 330101, 1),
(845, 3301, 'Butaka', 330102, 1),
(846, 3301, 'Hehu', 330103, 1),
(847, 3301, 'Kabumba', 330104, 1),
(848, 3301, 'Mutovu', 330105, 1),
(849, 3301, 'Nsherima', 330106, 1),
(850, 3301, 'Rusiza', 330107, 1),
(851, 3302, 'Gacurabwenge', 330201, 1),
(852, 3302, 'Gasiza', 330202, 1),
(853, 3302, 'Gihonga', 330203, 1),
(854, 3302, 'Kageshi', 330204, 1),
(855, 3302, 'Makoro', 330205, 1),
(856, 3302, 'Nyacyonga', 330206, 1),
(857, 3302, 'Rusura', 330207, 1),
(858, 3303, 'Busigari', 330301, 1),
(859, 3303, 'Cyanzarwe', 330302, 1),
(860, 3303, 'Gora', 330303, 1),
(861, 3303, 'Kinyanzovu', 330304, 1),
(862, 3303, 'Makurizo', 330305, 1),
(863, 3303, 'Rwangara', 330306, 1),
(864, 3303, 'Rwanzekuma', 330307, 1),
(865, 3303, 'Ryabizige', 330308, 1),
(866, 3304, 'Amahoro', 330401, 1),
(867, 3304, 'Bugoyi', 330402, 1),
(868, 3304, 'Kivumu', 330403, 1),
(869, 3304, 'Mbugangari', 330404, 1),
(870, 3304, 'Nengo', 330405, 1),
(871, 3304, 'Rubavu', 330406, 1),
(872, 3304, 'Umuganda', 330407, 1),
(873, 3305, 'Kamuhoza', 330501, 1),
(874, 3305, 'Karambo', 330502, 1),
(875, 3305, 'Mahoko', 330503, 1),
(876, 3305, 'Musabike', 330504, 1),
(877, 3305, 'Nkomane', 330505, 1),
(878, 3305, 'Rusongati', 330506, 1),
(879, 3305, 'Yungwe', 330507, 1),
(880, 3306, 'Kanyirabigog', 330601, 1),
(881, 3306, 'Kirerema', 330602, 1),
(882, 3306, 'Muramba', 330603, 1),
(883, 3306, 'Nyamikongi', 330604, 1),
(884, 3306, 'Nyamirango', 330605, 1),
(885, 3306, 'Nyaruteme', 330606, 1),
(886, 3307, 'Bihungwe', 330701, 1),
(887, 3307, 'Kanyundo', 330702, 1),
(888, 3307, 'Micinyiro', 330703, 1),
(889, 3307, 'Mirindi', 330704, 1),
(890, 3307, 'Ndoranyi', 330705, 1),
(891, 3307, 'Rungu', 330706, 1),
(892, 3307, 'Rwanyakayaga', 330707, 1),
(893, 3308, 'Bisizi', 330801, 1),
(894, 3308, 'Gikombe', 330802, 1),
(895, 3308, 'Kanyefurwe', 330803, 1),
(896, 3308, 'Nyarushyamba', 330804, 1),
(897, 3309, 'Burushya', 330901, 1),
(898, 3309, 'Busoro', 330902, 1),
(899, 3309, 'Kinigi', 330903, 1),
(900, 3309, 'Kiraga', 330904, 1),
(901, 3309, 'Munanira', 330905, 1),
(902, 3309, 'Rubona', 330906, 1),
(903, 3310, 'Bahimba', 331001, 1),
(904, 3310, 'Gatovu', 331002, 1),
(905, 3310, 'Kavomo', 331003, 1),
(906, 3310, 'Kigarama', 331004, 1),
(907, 3310, 'Mukondo', 331005, 1),
(908, 3310, 'Nyundo', 331006, 1),
(909, 3310, 'Terimbere', 331007, 1),
(910, 3311, 'Buhaza', 331101, 1),
(911, 3311, 'Burinda', 331102, 1),
(912, 3311, 'Byahi', 331103, 1),
(913, 3311, 'Gikombe', 331104, 1),
(914, 3311, 'Murambi', 331105, 1),
(915, 3311, 'Murara', 331106, 1),
(916, 3311, 'Rukoko', 331107, 1),
(917, 3312, 'Basa', 331201, 1),
(918, 3312, 'Gisa', 331202, 1),
(919, 3312, 'Kabilizi', 331203, 1),
(920, 3312, 'Muhira', 331204, 1),
(921, 3312, 'Rugerero', 331205, 1),
(922, 3312, 'Rushubi', 331206, 1),
(923, 3312, 'Rwaza', 331207, 1),
(924, 3401, 'Arusha', 340101, 1),
(925, 3401, 'Basumba', 340102, 1),
(926, 3401, 'Kijote', 340103, 1),
(927, 3401, 'Kora', 340104, 1),
(928, 3401, 'Muhe', 340105, 1),
(929, 3401, 'Rega', 340106, 1),
(930, 3402, 'Bukinanyana', 340201, 1),
(931, 3402, 'Gasizi', 340202, 1),
(932, 3402, 'Kabatezi', 340203, 1),
(933, 3402, 'Kareba', 340204, 1),
(934, 3402, 'Nyirakigugu', 340205, 1),
(935, 3402, 'Rega', 340206, 1),
(936, 3403, 'Gasiza', 340301, 1),
(937, 3403, 'Gasura', 340302, 1),
(938, 3403, 'Gisizi', 340303, 1),
(939, 3403, 'Guriro', 340304, 1),
(940, 3403, 'Kavumu', 340305, 1),
(941, 3403, 'Nyamitanzi', 340306, 1),
(942, 3404, 'Batikoti', 340401, 1),
(943, 3404, 'Cyamvumba', 340402, 1),
(944, 3404, 'Gihorwe', 340403, 1),
(945, 3404, 'Myuga', 340404, 1),
(946, 3404, 'Ngando', 340405, 1),
(947, 3404, 'Rugarama', 340406, 1),
(948, 3405, 'Busoro', 340501, 1),
(949, 3405, 'Cyamabuye', 340502, 1),
(950, 3405, 'Gatagara', 340503, 1),
(951, 3405, 'Gihirwa', 340504, 1),
(952, 3405, 'Kadahenda', 340505, 1),
(953, 3405, 'Karengera', 340506, 1),
(954, 3406, 'Gatovu', 340601, 1),
(955, 3406, 'Kintobo', 340602, 1),
(956, 3406, 'Nyagisozi', 340603, 1),
(957, 3406, 'Nyamugari', 340604, 1),
(958, 3406, 'Rukondo', 340605, 1),
(959, 3406, 'Ryinyo', 340606, 1),
(960, 3407, 'Gasizi', 340701, 1),
(961, 3407, 'Jaba', 340702, 1),
(962, 3407, 'Kanyove', 340703, 1),
(963, 3407, 'Rubaya', 340704, 1),
(964, 3407, 'Rugeshi', 340705, 1),
(965, 3407, 'Rukoma', 340706, 1),
(966, 3407, 'Rurengeri', 340707, 1),
(967, 3408, 'Gisizi', 340801, 1),
(968, 3408, 'Mulinga', 340802, 1),
(969, 3408, 'Mwiyanike', 340803, 1),
(970, 3408, 'Nkomane', 340804, 1),
(971, 3408, 'Nyamasheke', 340805, 1),
(972, 3408, 'Rwantobo', 340806, 1),
(973, 3409, 'Birembo', 340901, 1),
(974, 3409, 'Guriro', 340902, 1),
(975, 3409, 'Kibisabo', 340903, 1),
(976, 3409, 'Mutaho', 340904, 1),
(977, 3409, 'Nyundo', 340905, 1),
(978, 3409, 'Rugamba', 340906, 1),
(979, 3410, 'Gakoro', 341001, 1),
(980, 3410, 'Marangara', 341002, 1),
(981, 3410, 'Nyagahondo', 341003, 1),
(982, 3410, 'Nyarutembe', 341004, 1),
(983, 3410, 'Rurembo', 341005, 1),
(984, 3410, 'Tyazo', 341006, 1),
(985, 3411, 'Gahondo', 341101, 1),
(986, 3411, 'Gitega', 341102, 1),
(987, 3411, 'Kirimbogo', 341103, 1),
(988, 3411, 'Murambi', 341104, 1),
(989, 3411, 'Mwana', 341105, 1),
(990, 3411, 'Rwaza', 341106, 1),
(991, 3412, 'Cyimanzovu', 341201, 1),
(992, 3412, 'Kanyamitana', 341202, 1),
(993, 3412, 'Kintarure', 341203, 1),
(994, 3412, 'Mpinga', 341204, 1),
(995, 3412, 'Mutanda', 341205, 1),
(996, 3412, 'Shaki', 341206, 1),
(997, 3501, 'Bungwe', 350101, 1),
(998, 3501, 'Cyahafi', 350102, 1),
(999, 3501, 'Gashubi', 350103, 1),
(1000, 3501, 'Kabarondo', 350104, 1),
(1001, 3501, 'Ruhindage', 350105, 1),
(1002, 3502, 'Cyome', 350201, 1),
(1003, 3502, 'Gatsibo', 350202, 1),
(1004, 3502, 'Kamasiga', 350203, 1),
(1005, 3502, 'Karambo', 350204, 1),
(1006, 3502, 'Ruhanga', 350205, 1),
(1007, 3502, 'Rusumo', 350206, 1),
(1008, 3503, 'Gatare', 350301, 1),
(1009, 3503, 'Gatega', 350302, 1),
(1010, 3503, 'Kajinge', 350303, 1),
(1011, 3503, 'Marantima', 350304, 1),
(1012, 3503, 'Rugendabari', 350305, 1),
(1013, 3503, 'Runyinya', 350306, 1),
(1014, 3504, 'Busunzu', 350401, 1),
(1015, 3504, 'Gaseke', 350402, 1),
(1016, 3504, 'Kabaya', 350403, 1),
(1017, 3504, 'Mwendo', 350404, 1),
(1018, 3504, 'Ngoma', 350405, 1),
(1019, 3504, 'Nyenyeri', 350406, 1),
(1020, 3505, 'Kageshi', 350501, 1),
(1021, 3505, 'Kirwa', 350502, 1),
(1022, 3505, 'Mukore', 350503, 1),
(1023, 3505, 'Muramba', 350504, 1),
(1024, 3505, 'Nyamata', 350505, 1),
(1025, 3505, 'Rwamamara', 350506, 1),
(1026, 3506, 'Birembo', 350601, 1),
(1027, 3506, 'Gitwa', 350602, 1),
(1028, 3506, 'Murinzi', 350603, 1),
(1029, 3506, 'Nyamugeyo', 350604, 1),
(1030, 3506, 'Rugeshi', 350605, 1),
(1031, 3506, 'Tetero', 350606, 1),
(1032, 3507, 'Binana', 350701, 1),
(1033, 3507, 'Gitega', 350702, 1),
(1034, 3507, 'Matare', 350703, 1),
(1035, 3507, 'Rutare', 350704, 1),
(1036, 3507, 'Rwamiko', 350705, 1),
(1037, 3508, 'Bugarura', 350801, 1),
(1038, 3508, 'Gasiza', 350802, 1),
(1039, 3508, 'Mashya', 350803, 1),
(1040, 3508, 'Nganzo', 350804, 1),
(1041, 3508, 'Ngoma', 350805, 1),
(1042, 3508, 'Rutagara', 350806, 1),
(1043, 3509, 'Bweramana', 350901, 1),
(1044, 3509, 'Mubuga', 350902, 1),
(1045, 3509, 'Myiha', 350903, 1),
(1046, 3509, 'Rugogwe', 350904, 1),
(1047, 3509, 'Rusororo', 350905, 1),
(1048, 3509, 'Sanza', 350906, 1),
(1049, 3510, 'Bijyojyo', 351001, 1),
(1050, 3510, 'Bitabage', 351002, 1),
(1051, 3510, 'Kabageshi', 351003, 1),
(1052, 3510, 'Kibanda', 351004, 1),
(1053, 3510, 'Kinyovi', 351005, 1),
(1054, 3511, 'Kaseke', 351101, 1),
(1055, 3511, 'Kazabe', 351102, 1),
(1056, 3511, 'Mugano', 351103, 1),
(1057, 3511, 'Nyange', 351104, 1),
(1058, 3511, 'Rususa', 351105, 1),
(1059, 3511, 'Torero', 351106, 1),
(1060, 3512, 'Bambiro', 351201, 1),
(1061, 3512, 'Gaseke', 351202, 1),
(1062, 3512, 'Nsibo', 351203, 1),
(1063, 3512, 'Vuganyana', 351204, 1),
(1064, 3513, 'Birembo', 351301, 1),
(1065, 3513, 'Kagano', 351302, 1),
(1066, 3513, 'Kanyana', 351303, 1),
(1067, 3513, 'Musenyi', 351304, 1),
(1068, 3513, 'Nyabipfura', 351305, 1),
(1069, 3513, 'Rutovu', 351306, 1),
(1070, 3601, 'Nyange', 360101, 1),
(1071, 3601, 'Pera', 360102, 1),
(1072, 3601, 'Ryankana', 360103, 1),
(1073, 3602, 'Butanda', 360201, 1),
(1074, 3602, 'Gatereri', 360202, 1),
(1075, 3602, 'Nyamihanda', 360203, 1),
(1076, 3602, 'Rwambogo', 360204, 1),
(1077, 3603, 'Gikungu', 360301, 1),
(1078, 3603, 'Kiyabo', 360302, 1),
(1079, 3603, 'Murwa', 360303, 1),
(1080, 3603, 'Nyamuzi', 360304, 1),
(1081, 3603, 'Rasano', 360305, 1),
(1082, 3604, 'Birembo', 360401, 1),
(1083, 3604, 'Buhokoro', 360402, 1),
(1084, 3604, 'Kabakobwa', 360403, 1),
(1085, 3604, 'Kacyuma', 360404, 1),
(1086, 3604, 'Kamurehe', 360405, 1),
(1087, 3604, 'Karemereye', 360406, 1),
(1088, 3604, 'Muti', 360407, 1),
(1089, 3604, 'Rusayo', 360408, 1),
(1090, 3605, 'Cyendajuru', 360501, 1),
(1091, 3605, 'Gakomeye', 360502, 1),
(1092, 3605, 'Giheke', 360503, 1),
(1093, 3605, 'Kamashangi', 360504, 1),
(1094, 3605, 'Kigenge', 360505, 1),
(1095, 3605, 'Ntura', 360506, 1),
(1096, 3605, 'Rwega', 360507, 1),
(1097, 3605, 'Turambi', 360508, 1),
(1098, 3606, 'Burunga', 360601, 1),
(1099, 3606, 'Gatsiro', 360602, 1),
(1100, 3606, 'Gihaya', 360603, 1),
(1101, 3606, 'Kagara', 360604, 1),
(1102, 3606, 'Kamatita', 360605, 1),
(1103, 3606, 'Shagasha', 360606, 1),
(1104, 3607, 'Kizura', 360701, 1),
(1105, 3607, 'Mpinga', 360702, 1),
(1106, 3607, 'Nyamigina', 360703, 1),
(1107, 3608, 'Cyingwa', 360801, 1),
(1108, 3608, 'Gahungeri', 360802, 1),
(1109, 3608, 'Hangabashi', 360803, 1),
(1110, 3608, 'Mashesha', 360804, 1),
(1111, 3609, 'Cyangugu', 360901, 1),
(1112, 3609, 'Gihundwe', 360902, 1),
(1113, 3609, 'Kamashangi', 360903, 1),
(1114, 3609, 'Kamurera', 360904, 1),
(1115, 3609, 'Ruganda', 360905, 1),
(1116, 3610, 'Cyarukara', 361001, 1),
(1117, 3610, 'Gakoni', 361002, 1),
(1118, 3610, 'Shara', 361003, 1),
(1119, 3611, 'Gahinga', 361101, 1),
(1120, 3611, 'Kabahinda', 361102, 1),
(1121, 3611, 'Kabasigirira', 361103, 1),
(1122, 3611, 'Kagarama', 361104, 1),
(1123, 3611, 'Karambi', 361105, 1),
(1124, 3611, 'Miko', 361106, 1),
(1125, 3611, 'Tara', 361107, 1),
(1126, 3612, 'Gitwa', 361201, 1),
(1127, 3612, 'Kamanyenga', 361202, 1),
(1128, 3612, 'Kangazi', 361203, 1),
(1129, 3612, 'Kinyaga', 361204, 1),
(1130, 3612, 'Rugabano', 361205, 1),
(1131, 3613, 'Bigoga', 361301, 1),
(1132, 3613, 'Bugarura', 361302, 1),
(1133, 3613, 'Ishywa', 361303, 1),
(1134, 3613, 'Kamagimbo', 361304, 1),
(1135, 3613, 'Rwenje', 361305, 1),
(1136, 3614, 'Gatare', 361401, 1),
(1137, 3614, 'Kiziguro', 361402, 1),
(1138, 3614, 'Mataba', 361403, 1),
(1139, 3614, 'Ryamuhirwa', 361404, 1),
(1140, 3615, 'Gasebeya', 361501, 1),
(1141, 3615, 'Gaseke', 361502, 1),
(1142, 3615, 'Kamanu', 361503, 1),
(1143, 3615, 'Kiziho', 361504, 1),
(1144, 3615, 'Mashyuza', 361505, 1),
(1145, 3615, 'Nyabintare', 361506, 1),
(1146, 3616, 'Gatare', 361601, 1),
(1147, 3616, 'Kabagina', 361602, 1),
(1148, 3616, 'Kabuye', 361603, 1),
(1149, 3616, 'Kanoga', 361604, 1),
(1150, 3616, 'Karangiro', 361605, 1),
(1151, 3616, 'Murambi', 361606, 1),
(1152, 3616, 'Rusambu', 361607, 1),
(1153, 3617, 'Butambamo', 361701, 1),
(1154, 3617, 'Kigenge', 361702, 1),
(1155, 3617, 'Murya', 361703, 1),
(1156, 3617, 'Nyenji', 361704, 1),
(1157, 3617, 'Rebero', 361705, 1),
(1158, 3617, 'Rwinzuki', 361706, 1),
(1159, 3618, 'Karenge', 361801, 1),
(1160, 3618, 'Muhehwe', 361802, 1),
(1161, 3618, 'Mushaka', 361803, 1),
(1162, 3618, 'Rubugu', 361804, 1),
(1163, 3618, 'Ruganda', 361805, 1),
(1164, 3701, 'Buvungira', 370101, 1),
(1165, 3701, 'Mpumbu', 370102, 1),
(1166, 3701, 'Ngoma', 370103, 1),
(1167, 3701, 'Nyarusange', 370104, 1),
(1168, 3702, 'Gasheke', 370201, 1),
(1169, 3702, 'Impala', 370202, 1),
(1170, 3702, 'Kagatamu', 370203, 1),
(1171, 3702, 'Karusimbi', 370204, 1),
(1172, 3703, 'Bisumo', 370301, 1),
(1173, 3703, 'Murambi', 370302, 1),
(1174, 3703, 'Mutongo', 370303, 1),
(1175, 3703, 'Rugari', 370304, 1),
(1176, 3704, 'Butare', 370401, 1),
(1177, 3704, 'Gitwa', 370402, 1),
(1178, 3704, 'Jarama', 370403, 1),
(1179, 3704, 'Kibingo', 370404, 1),
(1180, 3704, 'Mubuga', 370405, 1),
(1181, 3705, 'Gako', 370501, 1),
(1182, 3705, 'Mubumbano', 370502, 1),
(1183, 3705, 'Ninzi', 370503, 1),
(1184, 3705, 'Rwesero', 370504, 1),
(1185, 3705, 'Shara', 370505, 1),
(1186, 3706, 'Kibogora', 370601, 1),
(1187, 3706, 'Kigarama', 370602, 1),
(1188, 3706, 'Kigoya', 370603, 1),
(1189, 3706, 'Raro', 370604, 1),
(1190, 3706, 'Susa', 370605, 1),
(1191, 3707, 'Gasovu', 370701, 1),
(1192, 3707, 'Gitwe', 370702, 1),
(1193, 3707, 'Kabuga', 370703, 1),
(1194, 3707, 'Kagarama', 370704, 1),
(1195, 3707, 'Rushyarara', 370705, 1),
(1196, 3708, 'Gasayo', 370801, 1),
(1197, 3708, 'Gashashi', 370802, 1),
(1198, 3708, 'Higiro', 370803, 1),
(1199, 3708, 'Miko', 370804, 1),
(1200, 3708, 'Mwezi', 370805, 1),
(1201, 3709, 'Cyimpindu', 370901, 1),
(1202, 3709, 'Karengera', 370902, 1),
(1203, 3709, 'Muhororo', 370903, 1),
(1204, 3709, 'Nyarusange', 370904, 1),
(1205, 3710, 'Gatare', 371001, 1),
(1206, 3710, 'Mutongo', 371002, 1),
(1207, 3710, 'Nyakabingo', 371003, 1),
(1208, 3710, 'Rugari', 371004, 1),
(1209, 3710, 'Vugangoma', 371005, 1),
(1210, 3711, 'Gisoke', 371101, 1),
(1211, 3711, 'Kagarama', 371102, 1),
(1212, 3711, 'Nyagatare', 371103, 1),
(1213, 3711, 'Nyakavumu', 371104, 1),
(1214, 3712, 'Kigabiro', 371201, 1),
(1215, 3712, 'Kinunga', 371202, 1),
(1216, 3712, 'Mariba', 371203, 1),
(1217, 3712, 'Muyange', 371204, 1),
(1218, 3712, 'Ntango', 371205, 1),
(1219, 3713, 'Banda', 371301, 1),
(1220, 3713, 'Gakenke', 371302, 1),
(1221, 3713, 'Jurwe', 371303, 1),
(1222, 3713, 'Murambi', 371304, 1),
(1223, 3714, 'Kanazi', 371401, 1),
(1224, 3714, 'Ntendezi', 371402, 1),
(1225, 3714, 'Save', 371403, 1),
(1226, 3714, 'Wimana', 371404, 1),
(1227, 3715, 'Burimba', 371501, 1),
(1228, 3715, 'Mataba', 371502, 1),
(1229, 3715, 'Mugera', 371503, 1),
(1230, 3715, 'Nyamugari', 371504, 1),
(1231, 3715, 'Shangi', 371505, 1),
(1232, 4101, 'Cyohoha', 410101, 1),
(1233, 4101, 'Gitare', 410102, 1),
(1234, 4101, 'Rwamahwa', 410103, 1),
(1235, 4102, 'Butangampund', 410201, 1),
(1236, 4102, 'Karengeri', 410202, 1),
(1237, 4102, 'Taba', 410203, 1),
(1238, 4103, 'Gasiza', 410301, 1),
(1239, 4103, 'Giko', 410302, 1),
(1240, 4103, 'Kayenzi', 410303, 1),
(1241, 4103, 'Mukoto', 410304, 1),
(1242, 4103, 'Nyirangarama', 410305, 1),
(1243, 4104, 'Busoro', 410401, 1),
(1244, 4104, 'Butare', 410402, 1),
(1245, 4104, 'Gahororo', 410403, 1),
(1246, 4104, 'Gitumba', 410404, 1),
(1247, 4104, 'Karama', 410405, 1),
(1248, 4104, 'Mwumba', 410406, 1),
(1249, 4104, 'Ndarage', 410407, 1),
(1250, 4105, 'Budakiranya', 410501, 1),
(1251, 4105, 'Migendezo', 410502, 1),
(1252, 4105, 'Rudogo', 410503, 1),
(1253, 4106, 'Burehe', 410601, 1),
(1254, 4106, 'Marembo', 410602, 1),
(1255, 4106, 'Rwili', 410603, 1),
(1256, 4107, 'Butunzi', 410701, 1),
(1257, 4107, 'Karegamazi', 410702, 1),
(1258, 4107, 'Marembo', 410703, 1),
(1259, 4107, 'Rebero', 410704, 1),
(1260, 4108, 'Gitatsa', 410801, 1),
(1261, 4108, 'Kamushenyi', 410802, 1),
(1262, 4108, 'Kigarama', 410803, 1),
(1263, 4108, 'Mubuga', 410804, 1),
(1264, 4108, 'Murama', 410805, 1),
(1265, 4108, 'Sayo', 410806, 1),
(1266, 4109, 'Kabuga', 410901, 1),
(1267, 4109, 'Kigarama', 410902, 1),
(1268, 4109, 'Kivugiza', 410903, 1),
(1269, 4109, 'Nyamyumba', 410904, 1),
(1270, 4109, 'Shengampuli', 410905, 1),
(1271, 4110, 'Bukoro', 411001, 1),
(1272, 4110, 'Mushari', 411002, 1),
(1273, 4110, 'Ngiramazi', 411003, 1),
(1274, 4110, 'Rurenge', 411004, 1),
(1275, 4111, 'Bubangu', 411101, 1),
(1276, 4111, 'Gatwa', 411102, 1),
(1277, 4111, 'Mugambazi', 411103, 1),
(1278, 4111, 'Mvuzo', 411104, 1),
(1279, 4112, 'Kabuga', 411201, 1),
(1280, 4112, 'Karambo', 411202, 1),
(1281, 4112, 'Mugote', 411203, 1),
(1282, 4112, 'Munyarwanda', 411204, 1),
(1283, 4113, 'Kajevuba', 411301, 1),
(1284, 4113, 'Kiyanza', 411302, 1),
(1285, 4113, 'Mahaza', 411303, 1),
(1286, 4114, 'Buraro', 411401, 1),
(1287, 4114, 'Bwimo', 411402, 1),
(1288, 4114, 'Mberuka', 411403, 1),
(1289, 4114, 'Mbuye', 411404, 1),
(1290, 4115, 'Gako', 411501, 1),
(1291, 4115, 'Kirenge', 411502, 1),
(1292, 4115, 'Taba', 411503, 1),
(1293, 4116, 'Bugaragara', 411601, 1),
(1294, 4116, 'Kijabagwe', 411602, 1),
(1295, 4116, 'Muvumu', 411603, 1),
(1296, 4116, 'Rubona', 411604, 1),
(1297, 4116, 'Rutonde', 411605, 1),
(1298, 4117, 'Barari', 411701, 1),
(1299, 4117, 'Gahabwa', 411702, 1),
(1300, 4117, 'Misezero', 411703, 1),
(1301, 4117, 'Nyirabirori', 411704, 1),
(1302, 4117, 'Taba', 411705, 1),
(1303, 4201, 'Birambo', 420101, 1),
(1304, 4201, 'Butereri', 420102, 1),
(1305, 4201, 'Byibuhiro', 420103, 1),
(1306, 4201, 'Kamina', 420104, 1),
(1307, 4201, 'Kirabo', 420105, 1),
(1308, 4201, 'Mwumba', 420106, 1),
(1309, 4201, 'Ruhanga', 420107, 1),
(1310, 4202, 'Kiruku', 420201, 1),
(1311, 4202, 'Mbirima', 420202, 1),
(1312, 4202, 'Nyange', 420203, 1),
(1313, 4202, 'Nyanza', 420204, 1),
(1314, 4203, 'Muhaza', 420301, 1),
(1315, 4203, 'Muhororo', 420302, 1),
(1316, 4203, 'Muramba', 420303, 1),
(1317, 4203, 'Mutanda', 420304, 1),
(1318, 4203, 'Rukore', 420305, 1),
(1319, 4204, 'Buheta', 420401, 1),
(1320, 4204, 'Kagoma', 420402, 1),
(1321, 4204, 'Nganzo', 420403, 1),
(1322, 4204, 'Rusagara', 420404, 1),
(1323, 4205, 'Nyacyina', 420501, 1),
(1324, 4205, 'Rukura', 420502, 1),
(1325, 4205, 'Rutabo', 420503, 1),
(1326, 4205, 'Rutenderi', 420504, 1),
(1327, 4205, 'Taba', 420505, 1),
(1328, 4206, 'Gakindo', 420601, 1),
(1329, 4206, 'Gashyamba', 420602, 1),
(1330, 4206, 'Gatwa', 420603, 1),
(1331, 4206, 'Karukungu', 420604, 1),
(1332, 4207, 'Kamubuga', 420701, 1),
(1333, 4207, 'Kidomo', 420702, 1),
(1334, 4207, 'Mbatabata', 420703, 1),
(1335, 4207, 'Rukore', 420704, 1),
(1336, 4208, 'Kanyanza', 420801, 1),
(1337, 4208, 'Karambo', 420802, 1),
(1338, 4208, 'Kirebe', 420803, 1),
(1339, 4209, 'Cyintare', 420901, 1),
(1340, 4209, 'Gasiza', 420902, 1),
(1341, 4209, 'Rugimbu', 420903, 1),
(1342, 4209, 'Ruhinga', 420904, 1),
(1343, 4209, 'Sereri', 420905, 1),
(1344, 4210, 'Buyange', 421001, 1),
(1345, 4210, 'Gikombe', 421002, 1),
(1346, 4210, 'Nyundo', 421003, 1),
(1347, 4211, 'Gasiho', 421101, 1),
(1348, 4211, 'Munyana', 421102, 1),
(1349, 4211, 'Murambi', 421103, 1),
(1350, 4211, 'Raba', 421104, 1),
(1351, 4212, 'Gahinga', 421201, 1),
(1352, 4212, 'Munyana', 421202, 1),
(1353, 4212, 'Mutego', 421203, 1),
(1354, 4212, 'Nkomane', 421204, 1),
(1355, 4212, 'Rutabo', 421205, 1),
(1356, 4212, 'Rutenderi', 421206, 1),
(1357, 4212, 'Rwamambe', 421207, 1),
(1358, 4213, 'Busake', 421301, 1),
(1359, 4213, 'Bwenda', 421302, 1),
(1360, 4213, 'Gasiza', 421303, 1),
(1361, 4213, 'Gihinga', 421304, 1),
(1362, 4213, 'Huro', 421305, 1),
(1363, 4213, 'Musagara', 421306, 1),
(1364, 4213, 'Musenyi', 421307, 1),
(1365, 4213, 'Ruganda', 421308, 1),
(1366, 4213, 'Rwinkuba', 421309, 1),
(1367, 4214, 'Bumba', 421401, 1),
(1368, 4214, 'Gisiza', 421402, 1),
(1369, 4214, 'Karyango', 421403, 1),
(1370, 4214, 'Nganzo', 421404, 1),
(1371, 4214, 'Va', 421405, 1),
(1372, 4215, 'Kabatezi', 421501, 1),
(1373, 4215, 'Kiryamo', 421502, 1),
(1374, 4215, 'Mubuga', 421503, 1),
(1375, 4215, 'Mwiyando', 421504, 1),
(1376, 4215, 'Rwa', 421505, 1),
(1377, 4216, 'Buranga', 421601, 1),
(1378, 4216, 'Gahinga', 421602, 1),
(1379, 4216, 'Gisozi', 421603, 1),
(1380, 4216, 'Mucaca', 421604, 1),
(1381, 4217, 'Busoro', 421701, 1),
(1382, 4217, 'Gikingo', 421702, 1),
(1383, 4217, 'Jango', 421703, 1),
(1384, 4217, 'Ruli', 421704, 1),
(1385, 4217, 'Rwesero', 421705, 1),
(1386, 4218, 'Gataba', 421801, 1),
(1387, 4218, 'Kamonyi', 421802, 1),
(1388, 4218, 'Murambi', 421803, 1),
(1389, 4218, 'Nyundo', 421804, 1),
(1390, 4218, 'Rumbi', 421805, 1),
(1391, 4218, 'Rurembo', 421806, 1),
(1392, 4219, 'Burimba', 421901, 1),
(1393, 4219, 'Busanane', 421902, 1),
(1394, 4219, 'Joma', 421903, 1),
(1395, 4219, 'Kageyo', 421904, 1),
(1396, 4219, 'Mbogo', 421905, 1),
(1397, 4219, 'Razi', 421906, 1),
(1398, 4219, 'Rwankuba', 421907, 1),
(1399, 4219, 'Shyombwe', 421908, 1),
(1400, 4301, 'Gisesero', 430101, 1),
(1401, 4301, 'Kavumu', 430102, 1),
(1402, 4301, 'Nyagisozi', 430103, 1),
(1403, 4301, 'Sahara', 430104, 1),
(1404, 4302, 'Bukinanyana', 430201, 1),
(1405, 4302, 'Buruba', 430202, 1),
(1406, 4302, 'Cyanya', 430203, 1),
(1407, 4302, 'Kabeza', 430204, 1),
(1408, 4302, 'Migeshi', 430205, 1),
(1409, 4302, 'Rwebeya', 430206, 1),
(1410, 4303, 'Gakoro', 430301, 1),
(1411, 4303, 'Gasakuza', 430302, 1),
(1412, 4303, 'Kabirizi', 430303, 1),
(1413, 4303, 'Karwasa', 430304, 1),
(1414, 4304, 'Kigabiro', 430401, 1),
(1415, 4304, 'Kivumu', 430402, 1),
(1416, 4304, 'Mbwe', 430403, 1),
(1417, 4304, 'Muharuro', 430404, 1),
(1418, 4305, 'Mudakama', 430501, 1),
(1419, 4305, 'Murago', 430502, 1),
(1420, 4305, 'Rubindi', 430503, 1),
(1421, 4305, 'Rungu', 430504, 1),
(1422, 4306, 'Birira', 430601, 1),
(1423, 4306, 'Buramira', 430602, 1),
(1424, 4306, 'Kivumu', 430603, 1),
(1425, 4306, 'Mbizi', 430604, 1),
(1426, 4307, 'Bisoke', 430701, 1),
(1427, 4307, 'Kaguhu', 430702, 1),
(1428, 4307, 'Kampanga', 430703, 1),
(1429, 4307, 'Nyabigoma', 430704, 1),
(1430, 4307, 'Nyonirima', 430705, 1),
(1431, 4308, 'Cyabararika', 430801, 1),
(1432, 4308, 'Kigombe', 430802, 1),
(1433, 4308, 'Mpenge', 430803, 1),
(1434, 4308, 'Ruhengeri', 430804, 1),
(1435, 4309, 'Cyivugiza', 430901, 1),
(1436, 4309, 'Cyogo', 430902, 1),
(1437, 4309, 'Mburabuturo', 430903, 1),
(1438, 4309, 'Songa', 430904, 1),
(1439, 4310, 'Cyabagarura', 431001, 1),
(1440, 4310, 'Garuka', 431002, 1),
(1441, 4310, 'Kabazungu', 431003, 1),
(1442, 4310, 'Nyarubuye', 431004, 1),
(1443, 4310, 'Rwambogo', 431005, 1),
(1444, 4311, 'Bikara', 431101, 1),
(1445, 4311, 'Gashinga', 431102, 1),
(1446, 4311, 'Mubago', 431103, 1),
(1447, 4311, 'Rugeshi', 431104, 1),
(1448, 4311, 'Ruyumba', 431105, 1),
(1449, 4312, 'Cyivugiza', 431201, 1),
(1450, 4312, 'Kabeza', 431202, 1),
(1451, 4312, 'Kamwumba', 431203, 1),
(1452, 4312, 'Muhabura', 431204, 1),
(1453, 4312, 'Ninda', 431205, 1),
(1454, 4313, 'Gasongero', 431301, 1),
(1455, 4313, 'Kamisave', 431302, 1),
(1456, 4313, 'Murandi', 431303, 1),
(1457, 4313, 'Murwa', 431304, 1),
(1458, 4313, 'Rurambo', 431305, 1),
(1459, 4314, 'Bumara', 431401, 1),
(1460, 4314, 'Kabushinge', 431402, 1),
(1461, 4314, 'Musezero', 431403, 1),
(1462, 4314, 'Nturo', 431404, 1),
(1463, 4314, 'Nyarubuye', 431405, 1),
(1464, 4315, 'Gakingo', 431501, 1),
(1465, 4315, 'Kibuguzo', 431502, 1),
(1466, 4315, 'Mudende', 431503, 1),
(1467, 4315, 'Mugari', 431504, 1),
(1468, 4401, 'Bungwe', 440101, 1),
(1469, 4401, 'Bushenya', 440102, 1),
(1470, 4401, 'Mudugari', 440103, 1),
(1471, 4401, 'Tumba', 440104, 1),
(1472, 4402, 'Gatsibo', 440201, 1),
(1473, 4402, 'Mubuga', 440202, 1),
(1474, 4402, 'Muhotora', 440203, 1),
(1475, 4402, 'Nyamicucu', 440204, 1),
(1476, 4402, 'Rusumo', 440205, 1),
(1477, 4403, 'Gasiza', 440301, 1),
(1478, 4403, 'Gisovu', 440302, 1),
(1479, 4403, 'Kabyiniro', 440303, 1),
(1480, 4403, 'Kagitega', 440304, 1),
(1481, 4403, 'Kamanyana', 440305, 1),
(1482, 4403, 'Nyagahinga', 440306, 1),
(1483, 4404, 'Butare', 440401, 1),
(1484, 4404, 'Ndongozi', 440402, 1),
(1485, 4404, 'Ruyange', 440403, 1),
(1486, 4405, 'Buramba', 440501, 1),
(1487, 4405, 'Gisizi', 440502, 1),
(1488, 4405, 'Kidakama', 440503, 1),
(1489, 4405, 'Nyangwe', 440504, 1),
(1490, 4405, 'Rwasa', 440505, 1),
(1491, 4406, 'Gabiro', 440601, 1),
(1492, 4406, 'Musenda', 440602, 1),
(1493, 4406, 'Rwambogo', 440603, 1),
(1494, 4406, 'Rwasa', 440604, 1),
(1495, 4407, 'Mariba', 440701, 1),
(1496, 4407, 'Musasa', 440702, 1),
(1497, 4407, 'Runoga', 440703, 1);
INSERT INTO `cells` (`CellId`, `SectorCode`, `CellName`, `CellCode`, `CellStatus`) VALUES
(1498, 4408, 'Kabaya', 440801, 1),
(1499, 4408, 'Kayenzi', 440802, 1),
(1500, 4408, 'Kiringa', 440803, 1),
(1501, 4408, 'Nyamabuye', 440804, 1),
(1502, 4409, 'Gafuka', 440901, 1),
(1503, 4409, 'Nkenke', 440902, 1),
(1504, 4409, 'Nkumba', 440903, 1),
(1505, 4409, 'Ntaruka', 440904, 1),
(1506, 4410, 'Bugamba', 441001, 1),
(1507, 4410, 'Kaganda', 441002, 1),
(1508, 4410, 'Musasa', 441003, 1),
(1509, 4410, 'Rutovu', 441004, 1),
(1510, 4411, 'Bukwashuri', 441101, 1),
(1511, 4411, 'Gashanje', 441102, 1),
(1512, 4411, 'Murwa', 441103, 1),
(1513, 4411, 'Nyirataba', 441104, 1),
(1514, 4412, 'Kivumu', 441201, 1),
(1515, 4412, 'Nyamugari', 441202, 1),
(1516, 4412, 'Rubona', 441203, 1),
(1517, 4412, 'Rushara', 441204, 1),
(1518, 4413, 'Cyahi', 441301, 1),
(1519, 4413, 'Gafumba', 441302, 1),
(1520, 4413, 'Karangara', 441303, 1),
(1521, 4413, 'Rurembo', 441304, 1),
(1522, 4414, 'Kilibata', 441401, 1),
(1523, 4414, 'Mucaca', 441402, 1),
(1524, 4414, 'Nyanamo', 441403, 1),
(1525, 4414, 'Rukandabyuma', 441404, 1),
(1526, 4415, 'Gaseke', 441501, 1),
(1527, 4415, 'Gatare', 441502, 1),
(1528, 4415, 'Gitovu', 441503, 1),
(1529, 4415, 'Rusekera', 441504, 1),
(1530, 4416, 'Kabona', 441601, 1),
(1531, 4416, 'Ndago', 441602, 1),
(1532, 4416, 'Ruhanga', 441603, 1),
(1533, 4417, 'Gacundura', 441701, 1),
(1534, 4417, 'Gashoro', 441702, 1),
(1535, 4417, 'Ruconsho', 441703, 1),
(1536, 4417, 'Rugari', 441704, 1),
(1537, 4501, 'Karenge', 450101, 1),
(1538, 4501, 'Kigabiro', 450102, 1),
(1539, 4501, 'Kivumu', 450103, 1),
(1540, 4501, 'Rwesero', 450104, 1),
(1541, 4502, 'Bwisige', 450201, 1),
(1542, 4502, 'Gihuke', 450202, 1),
(1543, 4502, 'Mukono', 450203, 1),
(1544, 4502, 'Nyabushingit', 450204, 1),
(1545, 4503, 'Gacurabwenge', 450301, 1),
(1546, 4503, 'Gisuna', 450302, 1),
(1547, 4503, 'Kibali', 450303, 1),
(1548, 4503, 'Kivugiza', 450304, 1),
(1549, 4503, 'Murama', 450305, 1),
(1550, 4503, 'Ngondore', 450306, 1),
(1551, 4503, 'Nyakabungo', 450307, 1),
(1552, 4503, 'Nyamabuye', 450308, 1),
(1553, 4503, 'Nyarutarama', 450309, 1),
(1554, 4504, 'Gasunzu', 450401, 1),
(1555, 4504, 'Muhambo', 450402, 1),
(1556, 4504, 'Nyakabungo', 450403, 1),
(1557, 4504, 'Nyambare', 450404, 1),
(1558, 4504, 'Nyaruka', 450405, 1),
(1559, 4504, 'Rwankonjo', 450406, 1),
(1560, 4505, 'Gatobotobo', 450501, 1),
(1561, 4505, 'Murehe', 450502, 1),
(1562, 4505, 'Tanda', 450503, 1),
(1563, 4506, 'Gihembe', 450601, 1),
(1564, 4506, 'Horezo', 450602, 1),
(1565, 4506, 'Kabuga', 450603, 1),
(1566, 4506, 'Muhondo', 450604, 1),
(1567, 4506, 'Nyamiyaga', 450605, 1),
(1568, 4507, 'Bugomba', 450701, 1),
(1569, 4507, 'Gatoma', 450702, 1),
(1570, 4507, 'Mulindi', 450703, 1),
(1571, 4507, 'Nyarwambu', 450704, 1),
(1572, 4507, 'Rukurura', 450705, 1),
(1573, 4508, 'Kabuga', 450801, 1),
(1574, 4508, 'Nyiragifumba', 450802, 1),
(1575, 4508, 'Nyiravugiza', 450803, 1),
(1576, 4508, 'Remera', 450804, 1),
(1577, 4508, 'Rusekera', 450805, 1),
(1578, 4508, 'Ryaruyumba', 450806, 1),
(1579, 4509, 'Gakenke', 450901, 1),
(1580, 4509, 'Miyove', 450902, 1),
(1581, 4509, 'Mubuga', 450903, 1),
(1582, 4510, 'Cyamuganga', 451001, 1),
(1583, 4510, 'Gatenga', 451002, 1),
(1584, 4510, 'Kiruhura', 451003, 1),
(1585, 4510, 'Mutarama', 451004, 1),
(1586, 4510, 'Rugerero', 451005, 1),
(1587, 4510, 'Rusambya', 451006, 1),
(1588, 4511, 'Cyamuhinda', 451101, 1),
(1589, 4511, 'Kigoma', 451102, 1),
(1590, 4511, 'Mwendo', 451103, 1),
(1591, 4511, 'Ngange', 451104, 1),
(1592, 4511, 'Rebero', 451105, 1),
(1593, 4512, 'Gaseke', 451201, 1),
(1594, 4512, 'Kabeza', 451202, 1),
(1595, 4512, 'Musenyi', 451203, 1),
(1596, 4512, 'Mutandi', 451204, 1),
(1597, 4512, 'Nyarubuye', 451205, 1),
(1598, 4513, 'Gahumuliza', 451301, 1),
(1599, 4513, 'Jamba', 451302, 1),
(1600, 4513, 'Kabeza', 451303, 1),
(1601, 4513, 'Kabuga', 451304, 1),
(1602, 4513, 'Karambo', 451305, 1),
(1603, 4513, 'Kiziba', 451306, 1),
(1604, 4513, 'Mataba', 451307, 1),
(1605, 4514, 'Butare', 451401, 1),
(1606, 4514, 'Kigogo', 451402, 1),
(1607, 4514, 'Kinishya', 451403, 1),
(1608, 4514, 'Rusasa', 451404, 1),
(1609, 4514, 'Rutete', 451405, 1),
(1610, 4514, 'Rwagihura', 451406, 1),
(1611, 4514, 'Yaramba', 451407, 1),
(1612, 4515, 'Gihanga', 451501, 1),
(1613, 4515, 'Gishambashay', 451502, 1),
(1614, 4515, 'Gishari', 451503, 1),
(1615, 4515, 'Muguramo', 451504, 1),
(1616, 4515, 'Nyamiyaga', 451505, 1),
(1617, 4516, 'Cyeya', 451601, 1),
(1618, 4516, 'Cyuru', 451602, 1),
(1619, 4516, 'Gisiza', 451603, 1),
(1620, 4516, 'Kinyami', 451604, 1),
(1621, 4516, 'Mabare', 451605, 1),
(1622, 4516, 'Munyinya', 451606, 1),
(1623, 4517, 'Gitega', 451701, 1),
(1624, 4517, 'Kamutora', 451702, 1),
(1625, 4517, 'Karurama', 451703, 1),
(1626, 4518, 'Bikumba', 451801, 1),
(1627, 4518, 'Gasharu', 451802, 1),
(1628, 4518, 'Gatwaro', 451803, 1),
(1629, 4518, 'Kigabiro', 451804, 1),
(1630, 4518, 'Munanira', 451805, 1),
(1631, 4518, 'Nkoto', 451806, 1),
(1632, 4519, 'Cyandaro', 451901, 1),
(1633, 4519, 'Gasambya', 451902, 1),
(1634, 4519, 'Gashirira', 451903, 1),
(1635, 4519, 'Kabare', 451904, 1),
(1636, 4519, 'Rebero', 451905, 1),
(1637, 4519, 'Ruhondo', 451906, 1),
(1638, 4520, 'Cyeru', 452001, 1),
(1639, 4520, 'Kigabiro', 452002, 1),
(1640, 4520, 'Nyagahinga', 452003, 1),
(1641, 4521, 'Bushara', 452101, 1),
(1642, 4521, 'Kitazigurwa', 452102, 1),
(1643, 4521, 'Nyabishambi', 452103, 1),
(1644, 4521, 'Nyabubare', 452104, 1),
(1645, 4521, 'Shangasha', 452105, 1),
(1646, 5101, 'Mununu', 510101, 1),
(1647, 5101, 'Nyagasambu', 510102, 1),
(1648, 5101, 'Nyakagunga', 510103, 1),
(1649, 5101, 'Nyamirama', 510104, 1),
(1650, 5101, 'Nyarubuye', 510105, 1),
(1651, 5101, 'Sasabirago', 510106, 1),
(1652, 5102, 'Gihumuza', 510201, 1),
(1653, 5102, 'Kagezi', 510202, 1),
(1654, 5102, 'Kanyangese', 510203, 1),
(1655, 5102, 'Kibare', 510204, 1),
(1656, 5102, 'Mutamwa', 510205, 1),
(1657, 5102, 'Rugarama', 510206, 1),
(1658, 5102, 'Runyinya', 510207, 1),
(1659, 5102, 'Rweri', 510208, 1),
(1660, 5103, 'Binunga', 510301, 1),
(1661, 5103, 'Bwinsanga', 510302, 1),
(1662, 5103, 'Cyinyana', 510303, 1),
(1663, 5103, 'Gati', 510304, 1),
(1664, 5103, 'Kavumu', 510305, 1),
(1665, 5103, 'Ruhimbi', 510306, 1),
(1666, 5103, 'Ruhunda', 510307, 1),
(1667, 5104, 'Bicaca', 510401, 1),
(1668, 5104, 'Byimana', 510402, 1),
(1669, 5104, 'Kabasore', 510403, 1),
(1670, 5104, 'Kangamba', 510404, 1),
(1671, 5104, 'Karenge', 510405, 1),
(1672, 5104, 'Nyabubare', 510406, 1),
(1673, 5104, 'Nyamatete', 510407, 1),
(1674, 5105, 'Bwiza', 510501, 1),
(1675, 5105, 'Cyanya', 510502, 1),
(1676, 5105, 'Nyagasenyi', 510503, 1),
(1677, 5105, 'Sibagire', 510504, 1),
(1678, 5105, 'Sovu', 510505, 1),
(1679, 5106, 'Byeza', 510601, 1),
(1680, 5106, 'Kabare', 510602, 1),
(1681, 5106, 'Karambi', 510603, 1),
(1682, 5106, 'Karitutu', 510604, 1),
(1683, 5106, 'Kitazigurwa', 510605, 1),
(1684, 5106, 'Murambi', 510606, 1),
(1685, 5106, 'Nsinda', 510607, 1),
(1686, 5106, 'Ntebe', 510608, 1),
(1687, 5106, 'Nyarusange', 510609, 1),
(1688, 5107, 'Kaduha', 510701, 1),
(1689, 5107, 'Nkungu', 510702, 1),
(1690, 5107, 'Rweru', 510703, 1),
(1691, 5107, 'Zinga', 510704, 1),
(1692, 5108, 'Binunga', 510801, 1),
(1693, 5108, 'Bwana', 510802, 1),
(1694, 5108, 'Cyarukamba', 510803, 1),
(1695, 5108, 'Cyimbazi', 510804, 1),
(1696, 5108, 'Nkomangwa', 510805, 1),
(1697, 5108, 'Nyarubuye', 510806, 1),
(1698, 5109, 'Akabare', 510901, 1),
(1699, 5109, 'Budahanda', 510902, 1),
(1700, 5109, 'Kagarama', 510903, 1),
(1701, 5109, 'Musha', 510904, 1),
(1702, 5109, 'Nyabisindu', 510905, 1),
(1703, 5109, 'Nyakabanda', 510906, 1),
(1704, 5110, 'Akinyambo', 511001, 1),
(1705, 5110, 'Bujyujyu', 511002, 1),
(1706, 5110, 'Murehe', 511003, 1),
(1707, 5110, 'Ntebe', 511004, 1),
(1708, 5110, 'Nyarukombe', 511005, 1),
(1709, 5111, 'Bicumbi', 511101, 1),
(1710, 5111, 'Bushenyi', 511102, 1),
(1711, 5111, 'Mwulire', 511103, 1),
(1712, 5111, 'Ntunga', 511104, 1),
(1713, 5112, 'Bihembe', 511201, 1),
(1714, 5112, 'Gatare', 511202, 1),
(1715, 5112, 'Gishore', 511203, 1),
(1716, 5112, 'Munini', 511204, 1),
(1717, 5112, 'Rwimbogo', 511205, 1),
(1718, 5113, 'Akanzu', 511301, 1),
(1719, 5113, 'Kigarama', 511302, 1),
(1720, 5113, 'Murama', 511303, 1),
(1721, 5113, 'Rugarama', 511304, 1),
(1722, 5114, 'Byinza', 511401, 1),
(1723, 5114, 'Kabatasi', 511402, 1),
(1724, 5114, 'Kabuye', 511403, 1),
(1725, 5114, 'Karambi', 511404, 1),
(1726, 5114, 'Mabare', 511405, 1),
(1727, 5114, 'Nawe', 511406, 1),
(1728, 5201, 'Cyagaju', 520101, 1),
(1729, 5201, 'Kabeza', 520102, 1),
(1730, 5201, 'Nyamikamba', 520103, 1),
(1731, 5201, 'Nyamirembe', 520104, 1),
(1732, 5201, 'Nyangara', 520105, 1),
(1733, 5201, 'Nyarurema', 520106, 1),
(1734, 5201, 'Rwensheke', 520107, 1),
(1735, 5202, 'Bushara', 520201, 1),
(1736, 5202, 'Cyenkwanzi', 520202, 1),
(1737, 5202, 'Gikagati', 520203, 1),
(1738, 5202, 'Gikundamvura', 520204, 1),
(1739, 5202, 'Kabuga', 520205, 1),
(1740, 5202, 'Ndego', 520206, 1),
(1741, 5202, 'Nyakiga', 520207, 1),
(1742, 5203, 'Kamate', 520301, 1),
(1743, 5203, 'Karama', 520302, 1),
(1744, 5203, 'Kizirakome', 520303, 1),
(1745, 5203, 'Mbare', 520304, 1),
(1746, 5203, 'Musenyi', 520305, 1),
(1747, 5203, 'Ndama', 520306, 1),
(1748, 5203, 'Nyagashanga', 520307, 1),
(1749, 5203, 'Nyamirama', 520308, 1),
(1750, 5203, 'Rubagabaga', 520309, 1),
(1751, 5203, 'Rwenyemera', 520310, 1),
(1752, 5203, 'Rwisirabo', 520311, 1),
(1753, 5204, 'Bayigaburire', 520401, 1),
(1754, 5204, 'Kaduha', 520402, 1),
(1755, 5204, 'Kanyeganyege', 520403, 1),
(1756, 5204, 'Katabagemu', 520404, 1),
(1757, 5204, 'Kigarama', 520405, 1),
(1758, 5204, 'Nyakigando', 520406, 1),
(1759, 5204, 'Rubira', 520407, 1),
(1760, 5204, 'Rugazi', 520408, 1),
(1761, 5204, 'Rutoma', 520409, 1),
(1762, 5205, 'Gataba', 520501, 1),
(1763, 5205, 'Gitenga', 520502, 1),
(1764, 5205, 'Kabungo', 520503, 1),
(1765, 5205, 'Karambo', 520504, 1),
(1766, 5205, 'Karujumba', 520505, 1),
(1767, 5205, 'Tovu', 520506, 1),
(1768, 5206, 'Bwera', 520601, 1),
(1769, 5206, 'Byimana', 520602, 1),
(1770, 5206, 'Cyembogo', 520603, 1),
(1771, 5206, 'Kagitumba', 520604, 1),
(1772, 5206, 'Kanyonza', 520605, 1),
(1773, 5206, 'Matimba', 520606, 1),
(1774, 5206, 'Nyabwishongw', 520607, 1),
(1775, 5206, 'Rwentanga', 520608, 1),
(1776, 5207, 'Bibare', 520701, 1),
(1777, 5207, 'Gakoma', 520702, 1),
(1778, 5207, 'Mahoro', 520703, 1),
(1779, 5207, 'Mimuri', 520704, 1),
(1780, 5207, 'Rugari', 520705, 1),
(1781, 5208, 'Bufunda', 520801, 1),
(1782, 5208, 'Gatete', 520802, 1),
(1783, 5208, 'Gihengeri', 520803, 1),
(1784, 5208, 'Gishororo', 520804, 1),
(1785, 5208, 'Kagina', 520805, 1),
(1786, 5208, 'Rugarama', 520806, 1),
(1787, 5209, 'Kibirizi', 520901, 1),
(1788, 5209, 'Kijojo', 520902, 1),
(1789, 5209, 'Musheri', 520903, 1),
(1790, 5209, 'Ntoma', 520904, 1),
(1791, 5209, 'Nyagatabire', 520905, 1),
(1792, 5209, 'Nyamiyonga', 520906, 1),
(1793, 5209, 'Rugarama I', 520907, 1),
(1794, 5209, 'Rugarama Ii', 520908, 1),
(1795, 5210, 'Barija', 521001, 1),
(1796, 5210, 'Bushoga', 521002, 1),
(1797, 5210, 'Cyabayaga', 521003, 1),
(1798, 5210, 'Gakirage', 521004, 1),
(1799, 5210, 'Kamagiri', 521005, 1),
(1800, 5210, 'Nsheke', 521006, 1),
(1801, 5210, 'Nyagatare', 521007, 1),
(1802, 5210, 'Rutaraka', 521008, 1),
(1803, 5210, 'Ryabega', 521009, 1),
(1804, 5211, 'Gahurura', 521101, 1),
(1805, 5211, 'Gashenyi', 521102, 1),
(1806, 5211, 'Nyakagarama', 521103, 1),
(1807, 5211, 'Rukomo Ii', 521104, 1),
(1808, 5211, 'Rurenge', 521105, 1),
(1809, 5212, 'Cyenjonjo', 521201, 1),
(1810, 5212, 'Gasinga', 521202, 1),
(1811, 5212, 'Kabare', 521203, 1),
(1812, 5212, 'Kazaza', 521204, 1),
(1813, 5212, 'Mishenyi', 521205, 1),
(1814, 5212, 'Rugarama', 521206, 1),
(1815, 5212, 'Rukorota', 521207, 1),
(1816, 5212, 'Rutare', 521208, 1),
(1817, 5212, 'Rwempasha', 521209, 1),
(1818, 5212, 'Ryeru', 521210, 1),
(1819, 5213, 'Gacundezi', 521301, 1),
(1820, 5213, 'Kabeza', 521302, 1),
(1821, 5213, 'Kirebe', 521303, 1),
(1822, 5213, 'Ntoma', 521304, 1),
(1823, 5213, 'Nyarupfubire', 521305, 1),
(1824, 5213, 'Nyendo', 521306, 1),
(1825, 5213, 'Rutungu', 521307, 1),
(1826, 5213, 'Rwimiyaga', 521308, 1),
(1827, 5214, 'Gishuro', 521401, 1),
(1828, 5214, 'Gitengure', 521402, 1),
(1829, 5214, 'Nkoma', 521403, 1),
(1830, 5214, 'Nyabitekeri', 521404, 1),
(1831, 5214, 'Nyagatoma', 521405, 1),
(1832, 5214, 'Shonga', 521406, 1),
(1833, 5214, 'Tabagwe', 521407, 1),
(1834, 5301, 'Kigabiro', 530101, 1),
(1835, 5301, 'Kimana', 530102, 1),
(1836, 5301, 'Teme', 530103, 1),
(1837, 5301, 'Viro', 530104, 1),
(1838, 5302, 'Gatsibo', 530201, 1),
(1839, 5302, 'Manishya', 530202, 1),
(1840, 5302, 'Mugera', 530203, 1),
(1841, 5302, 'Nyabicwamba', 530204, 1),
(1842, 5302, 'Nyagahanga', 530205, 1),
(1843, 5303, 'Bukomane', 530301, 1),
(1844, 5303, 'Cyabusheshe', 530302, 1),
(1845, 5303, 'Karubungo', 530303, 1),
(1846, 5303, 'Mpondwa', 530304, 1),
(1847, 5303, 'Nyamirama', 530305, 1),
(1848, 5303, 'Rubira', 530306, 1),
(1849, 5304, 'Kabarore', 530401, 1),
(1850, 5304, 'Kabeza', 530402, 1),
(1851, 5304, 'Karenge', 530403, 1),
(1852, 5304, 'Marimba', 530404, 1),
(1853, 5304, 'Nyabikiri', 530405, 1),
(1854, 5304, 'Simbwa', 530406, 1),
(1855, 5305, 'Busetsa', 530501, 1),
(1856, 5305, 'Gituza', 530502, 1),
(1857, 5305, 'Kintu', 530503, 1),
(1858, 5305, 'Nyagisozi', 530504, 1),
(1859, 5306, 'Akabuga', 530601, 1),
(1860, 5306, 'Gakenke', 530602, 1),
(1861, 5306, 'Gakoni', 530603, 1),
(1862, 5306, 'Nyabisindu', 530604, 1),
(1863, 5307, 'Agakomeye', 530701, 1),
(1864, 5307, 'Mbogo', 530702, 1),
(1865, 5307, 'Ndatemwa', 530703, 1),
(1866, 5307, 'Rubona', 530704, 1),
(1867, 5308, 'Bibare', 530801, 1),
(1868, 5308, 'Gakorokombe', 530802, 1),
(1869, 5308, 'Mamfu', 530803, 1),
(1870, 5308, 'Rumuli', 530804, 1),
(1871, 5308, 'Taba', 530805, 1),
(1872, 5309, 'Murambi', 530901, 1),
(1873, 5309, 'Nyamiyaga', 530902, 1),
(1874, 5309, 'Rwankuba', 530903, 1),
(1875, 5309, 'Rwimitereri', 530904, 1),
(1876, 5310, 'Bugamba', 531001, 1),
(1877, 5310, 'Karambi', 531002, 1),
(1878, 5310, 'Kigasha', 531003, 1),
(1879, 5310, 'Ngarama', 531004, 1),
(1880, 5310, 'Nyarubungo', 531005, 1),
(1881, 5311, 'Gitinda', 531101, 1),
(1882, 5311, 'Kibare', 531102, 1),
(1883, 5311, 'Mayange', 531103, 1),
(1884, 5311, 'Murambi', 531104, 1),
(1885, 5311, 'Nyagitabire', 531105, 1),
(1886, 5311, 'Nyamirama', 531106, 1),
(1887, 5312, 'Bushobora', 531201, 1),
(1888, 5312, 'Butiruka', 531202, 1),
(1889, 5312, 'Kigabiro', 531203, 1),
(1890, 5312, 'Nyagakombe', 531204, 1),
(1891, 5312, 'Rurenge', 531205, 1),
(1892, 5312, 'Rwarenga', 531206, 1),
(1893, 5313, 'Bugarama', 531301, 1),
(1894, 5313, 'Gihuta', 531302, 1),
(1895, 5313, 'Kanyangese', 531303, 1),
(1896, 5313, 'Matare', 531304, 1),
(1897, 5313, 'Matunguru', 531305, 1),
(1898, 5313, 'Remera', 531306, 1),
(1899, 5314, 'Kiburara', 531401, 1),
(1900, 5314, 'Munini', 531402, 1),
(1901, 5314, 'Nyamatete', 531403, 1),
(1902, 5314, 'Rwikiniro', 531404, 1),
(1903, 5401, 'Juru', 540101, 1),
(1904, 5401, 'Kahi', 540102, 1),
(1905, 5401, 'Kiyenzi', 540103, 1),
(1906, 5401, 'Urugarama', 540104, 1),
(1907, 5402, 'Cyarubare', 540201, 1),
(1908, 5402, 'Gitara', 540202, 1),
(1909, 5402, 'Kirehe', 540203, 1),
(1910, 5402, 'Rubimba', 540204, 1),
(1911, 5402, 'Rubumba', 540205, 1),
(1912, 5403, 'Cyabajwa', 540301, 1),
(1913, 5403, 'Cyinzovu', 540302, 1),
(1914, 5403, 'Kabura', 540303, 1),
(1915, 5403, 'Rusera', 540304, 1),
(1916, 5404, 'Bwiza', 540401, 1),
(1917, 5404, 'Kayonza', 540402, 1),
(1918, 5404, 'Mburabuturo', 540403, 1),
(1919, 5404, 'Nyagatovu', 540404, 1),
(1920, 5404, 'Rugendabari', 540405, 1),
(1921, 5405, 'Bunyentongo', 540501, 1),
(1922, 5405, 'Muko', 540502, 1),
(1923, 5405, 'Murama', 540503, 1),
(1924, 5405, 'Nyakanazi', 540504, 1),
(1925, 5405, 'Rusave', 540505, 1),
(1926, 5406, 'Buhabwa', 540601, 1),
(1927, 5406, 'Karambi', 540602, 1),
(1928, 5406, 'Murundi', 540603, 1),
(1929, 5406, 'Ryamanyoni', 540604, 1),
(1930, 5407, 'Kageyo', 540701, 1),
(1931, 5407, 'Migera', 540702, 1),
(1932, 5407, 'Nyamugari', 540703, 1),
(1933, 5407, 'Nyawera', 540704, 1),
(1934, 5408, 'Byimana', 540801, 1),
(1935, 5408, 'Isangano', 540802, 1),
(1936, 5408, 'Karambi', 540803, 1),
(1937, 5408, 'Kiyovu', 540804, 1),
(1938, 5409, 'Gikaya', 540901, 1),
(1939, 5409, 'Musumba', 540902, 1),
(1940, 5409, 'Rurambi', 540903, 1),
(1941, 5409, 'Shyogo', 540904, 1),
(1942, 5410, 'Kawangire', 541001, 1),
(1943, 5410, 'Rukara', 541002, 1),
(1944, 5410, 'Rwimishinya', 541003, 1),
(1945, 5411, 'Bugambira', 541101, 1),
(1946, 5411, 'Nkamba', 541102, 1),
(1947, 5411, 'Ruyonza', 541103, 1),
(1948, 5411, 'Umubuga', 541104, 1),
(1949, 5412, 'Gihinga', 541201, 1),
(1950, 5412, 'Mbarara', 541202, 1),
(1951, 5412, 'Mukoyoyo', 541203, 1),
(1952, 5412, 'Nkondo', 541204, 1),
(1953, 5501, 'Butezi', 550101, 1),
(1954, 5501, 'Muhamba', 550102, 1),
(1955, 5501, 'Murehe', 550103, 1),
(1956, 5501, 'Nyagasenyi', 550104, 1),
(1957, 5501, 'Nyakagezi', 550105, 1),
(1958, 5501, 'Rubimba', 550106, 1),
(1959, 5502, 'Curazo', 550201, 1),
(1960, 5502, 'Cyunuzi', 550202, 1),
(1961, 5502, 'Muganza', 550203, 1),
(1962, 5502, 'Nyamiryango', 550204, 1),
(1963, 5502, 'Rwabutazi', 550205, 1),
(1964, 5502, 'Rwantonde', 550206, 1),
(1965, 5503, 'Cyanya', 550301, 1),
(1966, 5503, 'Kigarama', 550302, 1),
(1967, 5503, 'Kiremera', 550303, 1),
(1968, 5503, 'Nyakerera', 550304, 1),
(1969, 5503, 'Nyankurazo', 550305, 1),
(1970, 5504, 'Gatarama', 550401, 1),
(1971, 5504, 'Rugarama', 550402, 1),
(1972, 5504, 'Ruhanga', 550403, 1),
(1973, 5504, 'Rwanteru', 550404, 1),
(1974, 5505, 'Gahama', 550501, 1),
(1975, 5505, 'Kirehe', 550502, 1),
(1976, 5505, 'Nyabigega', 550503, 1),
(1977, 5505, 'Nyabikokora', 550504, 1),
(1978, 5505, 'Rwesero', 550505, 1),
(1979, 5506, 'Kamombo', 550601, 1),
(1980, 5506, 'Mwoga', 550602, 1),
(1981, 5506, 'Saruhembe', 550603, 1),
(1982, 5506, 'Munini', 550604, 1),
(1983, 5507, 'Bwiyorere', 550701, 1),
(1984, 5507, 'Kankobwa', 550702, 1),
(1985, 5507, 'Mpanga', 550703, 1),
(1986, 5507, 'Mushongi', 550704, 1),
(1987, 5507, 'Nasho', 550705, 1),
(1988, 5507, 'Nyakabungo', 550706, 1),
(1989, 5507, 'Rubaya', 550707, 1),
(1990, 5508, 'Gasarabwayi', 550801, 1),
(1991, 5508, 'Kabuga', 550802, 1),
(1992, 5508, 'Mubuga', 550803, 1),
(1993, 5508, 'Musaza', 550804, 1),
(1994, 5508, 'Nganda', 550805, 1),
(1995, 5509, 'Bisagara', 550901, 1),
(1996, 5509, 'Cyamigurwa', 550902, 1),
(1997, 5509, 'Rugarama', 550903, 1),
(1998, 5509, 'Rwanyamuhang', 550904, 1),
(1999, 5509, 'Rwayikona', 550905, 1),
(2000, 5510, 'Cyambwe', 551001, 1),
(2001, 5510, 'Kagese', 551002, 1),
(2002, 5510, 'Ntaruka', 551003, 1),
(2003, 5510, 'Rubirizi', 551004, 1),
(2004, 5510, 'Rugoma', 551005, 1),
(2005, 5511, 'Bukora', 551101, 1),
(2006, 5511, 'Kagasa', 551102, 1),
(2007, 5511, 'Kazizi', 551103, 1),
(2008, 5511, 'Kiyanzi', 551104, 1),
(2009, 5511, 'Nyamugari', 551105, 1),
(2010, 5512, 'Mareba', 551201, 1),
(2011, 5512, 'Nyabitare', 551202, 1),
(2012, 5512, 'Nyarutunga', 551203, 1),
(2013, 5601, 'Cyerwa', 560101, 1),
(2014, 5601, 'Giseri', 560102, 1),
(2015, 5601, 'Munege', 560103, 1),
(2016, 5601, 'Mutsindo', 560104, 1),
(2017, 5602, 'Ihanika', 560201, 1),
(2018, 5602, 'Jarama', 560202, 1),
(2019, 5602, 'Karenge', 560203, 1),
(2020, 5602, 'Kibimba', 560204, 1),
(2021, 5602, 'Kigoma', 560205, 1),
(2022, 5603, 'Akaziba', 560301, 1),
(2023, 5603, 'Karaba', 560302, 1),
(2024, 5603, 'Nyamirambo', 560303, 1),
(2025, 5604, 'Birenga', 560401, 1),
(2026, 5604, 'Gahurire', 560402, 1),
(2027, 5604, 'Karama', 560403, 1),
(2028, 5604, 'Kinyonzo', 560404, 1),
(2029, 5604, 'Umukamba', 560405, 1),
(2030, 5605, 'Cyasemakamba', 560501, 1),
(2031, 5605, 'Gahima', 560502, 1),
(2032, 5605, 'Gatonde', 560503, 1),
(2033, 5605, 'Karenge', 560504, 1),
(2034, 5605, 'Mahango', 560505, 1),
(2035, 5606, 'Akabungo', 560601, 1),
(2036, 5606, 'Mugatare', 560602, 1),
(2037, 5606, 'Ntanga', 560603, 1),
(2038, 5606, 'Nyamugari', 560604, 1),
(2039, 5606, 'Nyange', 560605, 1),
(2040, 5607, 'Gitaraga', 560701, 1),
(2041, 5607, 'Kigabiro', 560702, 1),
(2042, 5607, 'Mvumba', 560703, 1),
(2043, 5607, 'Rurenge', 560704, 1),
(2044, 5607, 'Sakara', 560705, 1),
(2045, 5608, 'Karwema', 560801, 1),
(2046, 5608, 'Kibare', 560802, 1),
(2047, 5608, 'Mutenderi', 560803, 1),
(2048, 5608, 'Muzingira', 560804, 1),
(2049, 5608, 'Nyagasozi', 560805, 1),
(2050, 5609, 'Bugera', 560901, 1),
(2051, 5609, 'Kinunga', 560902, 1),
(2052, 5609, 'Ndekwe', 560903, 1),
(2053, 5609, 'Nyamagana', 560904, 1),
(2054, 5610, 'Buliba', 561001, 1),
(2055, 5610, 'Kibatsi', 561002, 1),
(2056, 5610, 'Nyaruvumu', 561003, 1),
(2057, 5610, 'Nyinya', 561004, 1),
(2058, 5611, 'Gituza', 561101, 1),
(2059, 5611, 'Ntovi', 561102, 1),
(2060, 5611, 'Rubago', 561103, 1),
(2061, 5611, 'Rubona', 561104, 1),
(2062, 5611, 'Rwintashya', 561105, 1),
(2063, 5612, 'Akagarama', 561201, 1),
(2064, 5612, 'Muhurire', 561202, 1),
(2065, 5612, 'Musya', 561203, 1),
(2066, 5612, 'Rugese', 561204, 1),
(2067, 5612, 'Rujambara', 561205, 1),
(2068, 5612, 'Rwikubo', 561206, 1),
(2069, 5613, 'Gafunzo', 561301, 1),
(2070, 5613, 'Kibonde', 561302, 1),
(2071, 5613, 'Nkanga', 561303, 1),
(2072, 5613, 'Rukoma', 561304, 1),
(2073, 5614, 'Nyagasozi', 561401, 1),
(2074, 5614, 'Nyagatugunda', 561402, 1),
(2075, 5614, 'Ruhembe', 561403, 1),
(2076, 5614, 'Ruhinga', 561404, 1),
(2077, 5701, 'Biryogo', 570101, 1),
(2078, 5701, 'Kabuye', 570102, 1),
(2079, 5701, 'Kagomasi', 570103, 1),
(2080, 5701, 'Mwendo', 570104, 1),
(2081, 5701, 'Ramiro', 570105, 1),
(2082, 5702, 'Juru', 570201, 1),
(2083, 5702, 'Kabukuba', 570202, 1),
(2084, 5702, 'Mugorore', 570203, 1),
(2085, 5702, 'Musovu', 570204, 1),
(2086, 5702, 'Rwinume', 570205, 1),
(2087, 5703, 'Biharagu', 570301, 1),
(2088, 5703, 'Burenge', 570302, 1),
(2089, 5703, 'Kampeka', 570303, 1),
(2090, 5703, 'Nyakayaga', 570304, 1),
(2091, 5703, 'Tunda', 570305, 1),
(2092, 5704, 'Bushenyi', 570401, 1),
(2093, 5704, 'Gakomeye', 570402, 1),
(2094, 5704, 'Nyamigina', 570403, 1),
(2095, 5704, 'Rango', 570404, 1),
(2096, 5704, 'Rugarama', 570405, 1),
(2097, 5705, 'Gakamba', 570501, 1),
(2098, 5705, 'Kagenge', 570502, 1),
(2099, 5705, 'Kibenga', 570503, 1),
(2100, 5705, 'Kibirizi', 570504, 1),
(2101, 5705, 'Mbyo', 570505, 1),
(2102, 5706, 'Gicaca', 570601, 1),
(2103, 5706, 'Musenyi', 570602, 1),
(2104, 5706, 'Nyagihunika', 570603, 1),
(2105, 5706, 'Rulindo', 570604, 1),
(2106, 5707, 'Bitaba', 570701, 1),
(2107, 5707, 'Kagasa', 570702, 1),
(2108, 5707, 'Rugunga', 570703, 1),
(2109, 5707, 'Rurenge', 570704, 1),
(2110, 5708, 'Gihembe', 570801, 1),
(2111, 5708, 'Murama', 570802, 1),
(2112, 5708, 'Ngeruka', 570803, 1),
(2113, 5708, 'Nyakayenzi', 570804, 1),
(2114, 5708, 'Rutonde', 570805, 1),
(2115, 5709, 'Cyugaro', 570901, 1),
(2116, 5709, 'Kanzenze', 570902, 1),
(2117, 5709, 'Kibungo', 570903, 1),
(2118, 5710, 'Kanazi', 571001, 1),
(2119, 5710, 'Kayumba', 571002, 1),
(2120, 5710, 'Maranyundo', 571003, 1),
(2121, 5710, 'Murama', 571004, 1),
(2122, 5710, 'Nyamata y\' U', 571005, 1),
(2123, 5711, 'Gihinga', 571101, 1),
(2124, 5711, 'Kabuye', 571102, 1),
(2125, 5711, 'Murambi', 571103, 1),
(2126, 5711, 'Ngenda', 571104, 1),
(2127, 5711, 'Rugando', 571105, 1),
(2128, 5712, 'Kabeza', 571201, 1),
(2129, 5712, 'Karera', 571202, 1),
(2130, 5712, 'Kimaranzara', 571203, 1),
(2131, 5712, 'Ntarama', 571204, 1),
(2132, 5712, 'Nyabagendwa', 571205, 1),
(2133, 5713, 'Bihari', 571301, 1),
(2134, 5713, 'Gatanga', 571302, 1),
(2135, 5713, 'Gikundamvura', 571303, 1),
(2136, 5713, 'Kindama', 571304, 1),
(2137, 5713, 'Ruhuha', 571305, 1),
(2138, 5714, 'Batima', 571401, 1),
(2139, 5714, 'Kintambwe', 571402, 1),
(2140, 5714, 'Mazane', 571403, 1),
(2141, 5714, 'Nemba', 571404, 1),
(2142, 5714, 'Nkanga', 571405, 1),
(2143, 5714, 'Sharita', 571406, 1),
(2144, 5715, 'Kabagugu', 571501, 1),
(2145, 5715, 'Kamabuye', 571502, 1),
(2146, 5715, 'Nziranziza', 571503, 1),
(2147, 5715, 'Rebero', 571504, 1),
(2148, 5715, 'Rutare', 571505, 1);

-- --------------------------------------------------------

--
-- Table structure for table `combination`
--

CREATE TABLE `combination` (
  `id` int(11) NOT NULL,
  `Level_id` varchar(200) NOT NULL DEFAULT '0',
  `Combination` varchar(110) NOT NULL,
  `coopid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combination`
--

INSERT INTO `combination` (`id`, `Level_id`, `Combination`, `coopid`, `status`) VALUES
(1, '1', '01311050110-18', 11, 1),
(2, '2', '00266-06502075-16', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `combinationcaisse`
--

CREATE TABLE `combinationcaisse` (
  `Level_id` int(2) NOT NULL DEFAULT 0,
  `Combination` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `combinations`
--

CREATE TABLE `combinations` (
  `Level_id` int(2) NOT NULL DEFAULT 0,
  `Combination` varchar(200) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL DEFAULT 0000,
  `id` int(11) NOT NULL,
  `season` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cooperatives`
--

CREATE TABLE `cooperatives` (
  `id` int(11) NOT NULL,
  `union_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `village_id` int(5) NOT NULL DEFAULT 0,
  `website` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(30) NOT NULL DEFAULT '',
  `logo` varchar(200) NOT NULL DEFAULT '',
  `p_signature` varchar(200) NOT NULL DEFAULT '',
  `inserted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `coop_type` int(11) NOT NULL,
  `area` float NOT NULL,
  `e_status` int(11) NOT NULL,
  `zone` varchar(40) NOT NULL,
  `bloc` varchar(40) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `fertilizer_pyt_mean` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `DistrictId` varchar(10) NOT NULL,
  `ProvinceCode` int(11) DEFAULT NULL,
  `DistrictName` varchar(12) DEFAULT NULL,
  `DistrictCode` varchar(12) DEFAULT NULL,
  `DistrictStatus` varchar(14) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`DistrictId`, `ProvinceCode`, `DistrictName`, `DistrictCode`, `DistrictStatus`) VALUES
('1', 1, 'Nyarugenge', '11', '1'),
('2', 1, 'Gasabo', '12', '1'),
('3', 1, 'Kicukiro', '13', '1'),
('4', 2, 'Nyanza', '21', '1'),
('5', 2, 'Gisagara', '22', '1'),
('6', 2, 'Nyaruguru', '23', '1'),
('7', 2, 'Huye', '24', '1'),
('8', 2, 'Nyamagabe', '25', '1'),
('9', 2, 'Ruhango', '26', '1'),
('10', 2, 'Muhanga', '27', '1'),
('11', 2, 'Kamonyi', '28', '1'),
('12', 3, 'Karongi', '31', '1'),
('13', 3, 'Rutsiro', '32', '1'),
('14', 3, 'Rubavu', '33', '1'),
('15', 3, 'Nyabihu', '34', '1'),
('16', 3, 'Ngororero', '35', '1'),
('17', 3, 'Rusizi', '36', '1'),
('18', 3, 'Nyamasheke', '37', '1'),
('19', 4, 'Rulindo', '41', '1'),
('20', 4, 'Gakenke', '42', '1'),
('21', 4, 'Musanze', '43', '1'),
('22', 4, 'Burera', '44', '1'),
('23', 4, 'Gicumbi', '45', '1'),
('24', 5, 'Rwamagana', '51', '1'),
('25', 5, 'Nyagatare', '52', '1'),
('26', 5, 'Gatsibo', '53', '1'),
('27', 5, 'Kayonza', '54', '1'),
('28', 5, 'Kirehe', '55', '1'),
('29', 5, 'Ngoma', '56', '1'),
('30', 5, 'Bugesera', '57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `amount` int(11) NOT NULL DEFAULT 0,
  `reason` varchar(100) NOT NULL DEFAULT '',
  `account` varchar(200) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL,
  `duedate` date NOT NULL DEFAULT '0000-00-00',
  `origine` varchar(60) NOT NULL,
  `compte` varchar(50) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`amount`, `reason`, `account`, `id`, `duedate`, `origine`, `compte`, `receiver`, `coopid`) VALUES
(5000000, 'MAK TECHNO', 'INFORMATISATION', 1, '2021-03-16', 'COGEBANQUE', '01311050110-18', 'EMMANUEL', 11),
(50000, ' ', '3', 2, '2021-03-25', 'caisse', ' ', ' ', 11),
(50000, ' ', '3', 3, '2021-03-25', 'caisse', ' ', ' ', 11),
(5000, ' ', '2', 4, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' ', '', 5, '2021-03-26', 'caisse', ' ', ' ', 11),
(4000, ' ', '', 6, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' ', 'KUZIGAMIRA ABAHINZI', 7, '2021-03-26', 'caisse', ' ', ' ', 11),
(100000, ' ', 'MAZOUT', 8, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' ', 'MAZOUT', 9, '2021-03-26', 'caisse', ' ', ' ', 11),
(100000, 'No Reason', 'INFORMATISATION', 10, '2021-03-26', 'COGEBANQUE', '01311050110-18', 'MUTONIWASE Alice', 11),
(5000, ' ', 'KUZIGAMIRA ABAHINZI', 11, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' ', 'MAZOUT', 12, '2021-03-26', 'caisse', ' ', ' ', 11),
(60000, ' GUHEMBA ABAKOZI', 'SALAIRE DES PERSONNELS PERM', 13, '2021-03-26', 'caisse', ' ', ' ', 11),
(50000, ' KUGURA AMORTISSEUR', 'PIECES', 14, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' KUGURA MAZOUT', 'KUZIGAMIRA ABAHINZI', 15, '2021-03-26', 'caisse', ' ', ' ', 11),
(100000, ' KUZIGAMA', 'PIECES', 16, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' KUGURA MAZOUT', 'KUZIGAMIRA ABAHINZI', 17, '2021-03-26', 'caisse', ' ', ' ', 11),
(100000, ' KUZIGAMA', 'SALAIRE DES PERSONNELS PERM', 18, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' KUZIGAMA', 'KUZIGAMIRA ABAHINZI', 19, '2021-03-26', 'caisse', ' ', ' ', 11),
(5000, ' KWISYURA SOFTWARE', 'INFORMATISATION', 20, '2021-03-26', 'caisse', ' ', ' ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodid` int(11) NOT NULL,
  `foodname` varchar(60) NOT NULL,
  `foodowner` varchar(60) NOT NULL,
  `jkj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `source` varchar(80) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `source`, `amount`, `date`, `coopid`) VALUES
(1, 'STATION', 30000, '2021-03-17', 11),
(2, 'VENTE FV', 800000, '2021-03-18', 11);

-- --------------------------------------------------------

--
-- Table structure for table `instititution`
--

CREATE TABLE `instititution` (
  `id` int(11) NOT NULL,
  `liability` varchar(200) NOT NULL DEFAULT '',
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instititution`
--

INSERT INTO `instititution` (`id`, `liability`, `coopid`) VALUES
(1, 'FV', 11),
(2, 'LOCATION DE BATIMENT', 11),
(3, 'STATION', 11),
(4, 'CAPITAL', 11),
(5, 'CREDIT FROM BANK', 11),
(6, 'IMPANO', 11);

-- --------------------------------------------------------

--
-- Table structure for table `itubyamutungo`
--

CREATE TABLE `itubyamutungo` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `caisseno` int(11) NOT NULL,
  `bankdate` date NOT NULL,
  `creditdate` date NOT NULL,
  `picture` varchar(100) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itubyamutungo`
--

INSERT INTO `itubyamutungo` (`id`, `date`, `reason`, `amount`, `caisseno`, `bankdate`, `creditdate`, `picture`, `coopid`) VALUES
(1, '2021-03-16', 'MAK TECHNO', 5000000, 0, '2021-03-16', '0000-00-00', '', 11),
(2, '2021-03-25', 'BOULONS CENTRE', 50000, 2, '0000-00-00', '0000-00-00', '', 11),
(3, '2021-03-25', '', 10000, 3, '0000-00-00', '0000-00-00', '', 11),
(4, '2021-03-25', '', 10000, 4, '0000-00-00', '0000-00-00', '', 11),
(5, '2021-03-25', 'BOULONS CENTRE', 50000, 5, '0000-00-00', '0000-00-00', '', 11),
(6, '2021-03-26', 'KUGURA MAZOUT', 5000, 6, '0000-00-00', '0000-00-00', '', 11),
(7, '2021-03-26', 'bla bla bla', 5000, 7, '0000-00-00', '0000-00-00', '', 11),
(8, '2021-03-26', 'KUGURA MAZOUT', 4000, 8, '0000-00-00', '0000-00-00', '', 11),
(9, '2021-03-26', 'KUZIGAMA', 5000, 9, '0000-00-00', '0000-00-00', '', 11),
(10, '2021-03-26', 'KUGURA MAZOUT', 100000, 10, '0000-00-00', '0000-00-00', '', 11),
(11, '2021-03-26', 'sadkflj', 5000, 11, '0000-00-00', '0000-00-00', '', 11),
(12, '2021-03-26', 'No Reason', 100000, 0, '2021-03-26', '0000-00-00', '', 11),
(13, '2021-03-26', 'KUZIGAMA', 5000, 13, '0000-00-00', '0000-00-00', '', 11),
(14, '2021-03-26', 'KUGURA MAZOUT', 5000, 14, '0000-00-00', '0000-00-00', '', 11),
(15, '2021-03-26', 'GUHEMBA ABAKOZI', 60000, 15, '0000-00-00', '0000-00-00', '', 11),
(16, '2021-03-26', 'KUGURA AMORTISSEUR', 50000, 16, '0000-00-00', '0000-00-00', '', 11),
(17, '2021-03-26', 'KUGURA MAZOUT', 5000, 17, '0000-00-00', '0000-00-00', '', 11),
(18, '2021-03-26', 'KUZIGAMA', 100000, 18, '0000-00-00', '0000-00-00', '', 11),
(19, '2021-03-26', 'KUGURA MAZOUT', 5000, 19, '0000-00-00', '0000-00-00', '', 11),
(20, '2021-03-26', 'KUZIGAMA', 100000, 20, '0000-00-00', '0000-00-00', '', 11),
(21, '2021-03-26', 'KUZIGAMA', 5000, 21, '0000-00-00', '0000-00-00', '', 11),
(22, '2021-03-26', 'KWISYURA SOFTWARE', 5000, 22, '0000-00-00', '0000-00-00', '', 11);

-- --------------------------------------------------------

--
-- Table structure for table `iyongeramutungo`
--

CREATE TABLE `iyongeramutungo` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `caisseno` int(11) NOT NULL,
  `bankdate` date NOT NULL,
  `creditdate` date NOT NULL,
  `picture` varchar(100) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iyongeramutungo`
--

INSERT INTO `iyongeramutungo` (`id`, `date`, `reason`, `amount`, `caisseno`, `bankdate`, `creditdate`, `picture`, `coopid`) VALUES
(1, '2021-03-15', 'VERSEMENT', 78000000, 0, '2021-03-15', '0000-00-00', '', 11),
(2, '2021-03-10', 'CONSTRUCTION', 30000, 0, '0000-00-00', '2021-03-10', '', 11),
(3, '2021-03-26', '', 200000, 12, '0000-00-00', '0000-00-00', '', 11),
(4, '2021-03-26', '', 5000, 13, '0000-00-00', '0000-00-00', '', 11),
(5, '2021-03-26', 'klsdjfl', 30000, 0, '2021-03-26', '0000-00-00', '', 11),
(6, '2021-03-26', 'AMAFARANGA YASAGUTSE', 5000, 23, '0000-00-00', '0000-00-00', '', 11),
(7, '2021-03-26', 'AYISHYUWE NA ZIGGY', 5000, 24, '0000-00-00', '0000-00-00', '', 11),
(8, '2021-03-26', 'Transfer from bank COGEBANQUE (01311050110-18)', 20000, 25, '0000-00-00', '0000-00-00', '', 11),
(9, '2021-03-26', 'Transfer from bank COGEBANQUE (01311050110-18)', 10000, 26, '0000-00-00', '0000-00-00', '', 11);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_id` int(11) NOT NULL,
  `Level` varchar(40) NOT NULL DEFAULT '',
  `coopid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Level_id`, `Level`, `coopid`, `status`) VALUES
(1, 'COGEBANQUE', 11, 1),
(2, 'BANK OF KIGALI', 11, 0);

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
  `item` varchar(60) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `pprice`, `sprice`, `year`, `term`, `item`, `coopid`) VALUES
(1, 85000, 100000, 0, 0, 'SIMA', 11),
(2, 1067, 1200, 0, 0, 'CARBURANT', 11);

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
  `date` date NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabilities`
--

INSERT INTO `liabilities` (`id`, `source`, `amount`, `date`, `coopid`) VALUES
(1, 'CAPITAL', 5000, '2021-03-22', 11),
(2, 'CREDIT FROM BANK', 8000, '2021-03-15', 11),
(3, 'LOCATION DE BATIMENT', 20000, '2021-03-15', 11),
(4, 'FV', 7000000, '2021-03-15', 11);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `names` varchar(45) NOT NULL DEFAULT '',
  `username` varchar(30) NOT NULL DEFAULT '',
  `users_category_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `institution_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `names`, `username`, `users_category_id`, `password`, `institution_id`) VALUES
(19, 'BIZIMANA Mathias', 'bm', 4, '123', 11),
(15, 'MAK', 'MAK', 4, 'MAK1', 11),
(29, 'KAMALI Alphonse', 'test', 4, '$2y$10$OIoBqwVEV6g1mFeZeLlscultolekGq6I4GYoP60Cn.gk.b4TTZpA6', 11),
(31, 'testuser2', 'testuser2', 4, '$2y$10$KODK5iNmsIJac6UQyYTC9u1ENVkPqRmt214RsJw3cryFl.LQKYwjm', 11);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerid`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'test', '123'),
(6, 'user1', 'xx');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provincecode` int(11) NOT NULL,
  `provincename` varchar(17) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provincecode`, `provincename`) VALUES
(1, 'Kigali City'),
(2, 'AMAJYEPFO'),
(3, 'West'),
(4, 'North'),
(5, 'East');

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

-- --------------------------------------------------------

--
-- Table structure for table `retained`
--

CREATE TABLE `retained` (
  `id` int(11) NOT NULL,
  `pprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `item` varchar(60) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revisedbudget`
--

CREATE TABLE `revisedbudget` (
  `id` int(11) NOT NULL,
  `bline1` varchar(200) NOT NULL,
  `bline1amount` int(11) NOT NULL,
  `bline2` varchar(200) NOT NULL,
  `bline2amount` int(11) NOT NULL,
  `revisedamount` int(11) NOT NULL,
  `operationdate` date NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revisedbudget`
--

INSERT INTO `revisedbudget` (`id`, `bline1`, `bline1amount`, `bline2`, `bline2amount`, `revisedamount`, `operationdate`, `coopid`) VALUES
(1, 'FEDERATION AND UNION FEES', 200000, 'TRANSPORT', 100000, 50000, '2023-02-04', 11),
(2, 'FEDERATION AND UNION FEES', 150000, 'TRANSPORT', 150000, 20000, '2023-02-04', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `SectorId` int(3) DEFAULT NULL,
  `DistrictCode` int(2) DEFAULT NULL,
  `SectorName` varchar(12) DEFAULT NULL,
  `SectorCode` int(4) DEFAULT NULL,
  `SectorStatus` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`SectorId`, `DistrictCode`, `SectorName`, `SectorCode`, `SectorStatus`) VALUES
(1, 11, 'Gitega', 1101, 1),
(2, 11, 'Kanyinya', 1102, 1),
(3, 11, 'Kigali', 1103, 1),
(4, 11, 'Kimisagara', 1104, 1),
(5, 11, 'Mageregere', 1105, 1),
(6, 11, 'Muhima', 1106, 1),
(7, 11, 'Nyakabanda', 1107, 1),
(8, 11, 'Nyamirambo', 1108, 1),
(9, 11, 'Nyarugenge', 1109, 1),
(10, 11, 'Rwezamenyo', 1110, 1),
(11, 12, 'Bumbogo', 1201, 1),
(12, 12, 'Gatsata', 1202, 1),
(13, 12, 'Gikomero', 1203, 1),
(14, 12, 'Gisozi', 1204, 1),
(15, 12, 'Jabana', 1205, 1),
(16, 12, 'Jali', 1206, 1),
(17, 12, 'Kacyiru', 1207, 1),
(18, 12, 'Kimihurura', 1208, 1),
(19, 12, 'Kimironko', 1209, 1),
(20, 12, 'Kinyinya', 1210, 1),
(21, 12, 'Ndera', 1211, 1),
(22, 12, 'Nduba', 1212, 1),
(23, 12, 'Remera', 1213, 1),
(24, 12, 'Rusororo', 1214, 1),
(25, 12, 'Rutunga', 1215, 1),
(26, 13, 'Gahanga', 1301, 1),
(27, 13, 'Gatenga', 1302, 1),
(28, 13, 'Gikondo', 1303, 1),
(29, 13, 'Kagarama', 1304, 1),
(30, 13, 'Kanombe', 1305, 1),
(31, 13, 'Kicukiro', 1306, 1),
(32, 13, 'Kigarama', 1307, 1),
(33, 13, 'Masaka', 1308, 1),
(34, 13, 'Niboye', 1309, 1),
(35, 13, 'Nyarugunga', 1310, 1),
(36, 21, 'Busasamana', 2101, 1),
(37, 21, 'Busoro', 2102, 1),
(38, 21, 'Cyabakamyi', 2103, 1),
(39, 21, 'Kibilizi', 2104, 1),
(40, 21, 'Kigoma', 2105, 1),
(41, 21, 'Mukingo', 2106, 1),
(42, 21, 'Muyira', 2107, 1),
(43, 21, 'Ntyazo', 2108, 1),
(44, 21, 'Nyagisozi', 2109, 1),
(45, 21, 'Rwabicuma', 2110, 1),
(46, 22, 'Gikonko', 2201, 1),
(47, 22, 'Gishubi', 2202, 1),
(48, 22, 'Kansi', 2203, 1),
(49, 22, 'Kibirizi', 2204, 1),
(50, 22, 'Kigembe', 2205, 1),
(51, 22, 'Mamba', 2206, 1),
(52, 22, 'Muganza', 2207, 1),
(53, 22, 'Mugombwa', 2208, 1),
(54, 22, 'Mukindo', 2209, 1),
(55, 22, 'Musha', 2210, 1),
(56, 22, 'Ndora', 2211, 1),
(57, 22, 'Nyanza', 2212, 1),
(58, 22, 'Save', 2213, 1),
(59, 23, 'Busanze', 2301, 1),
(60, 23, 'Cyahinda', 2302, 1),
(61, 23, 'Kibeho', 2303, 1),
(62, 23, 'Kivu', 2304, 1),
(63, 23, 'Mata', 2305, 1),
(64, 23, 'Muganza', 2306, 1),
(65, 23, 'Munini', 2307, 1),
(66, 23, 'Ngera', 2308, 1),
(67, 23, 'Ngoma', 2309, 1),
(68, 23, 'Nyabimata', 2310, 1),
(69, 23, 'Nyagisozi', 2311, 1),
(70, 23, 'Ruheru', 2312, 1),
(71, 23, 'Ruramba', 2313, 1),
(72, 23, 'Rusenge', 2314, 1),
(73, 24, 'Gishamvu', 2401, 1),
(74, 24, 'Huye', 2402, 1),
(75, 24, 'Karama', 2403, 1),
(76, 24, 'Kigoma', 2404, 1),
(77, 24, 'Kinazi', 2405, 1),
(78, 24, 'Maraba', 2406, 1),
(79, 24, 'Mbazi', 2407, 1),
(80, 24, 'Mukura', 2408, 1),
(81, 24, 'Ngoma', 2409, 1),
(82, 24, 'Ruhashya', 2410, 1),
(83, 24, 'Rusatira', 2411, 1),
(84, 24, 'Rwaniro', 2412, 1),
(85, 24, 'Simbi', 2413, 1),
(86, 24, 'Tumba', 2414, 1),
(87, 25, 'Buruhukiro', 2501, 1),
(88, 25, 'Cyanika', 2502, 1),
(89, 25, 'Gasaka', 2503, 1),
(90, 25, 'Gatare', 2504, 1),
(91, 25, 'Kaduha', 2505, 1),
(92, 25, 'Kamegeri', 2506, 1),
(93, 25, 'Kibirizi', 2507, 1),
(94, 25, 'Kibumbwe', 2508, 1),
(95, 25, 'Kitabi', 2509, 1),
(96, 25, 'Mbazi', 2510, 1),
(97, 25, 'Mugano', 2511, 1),
(98, 25, 'Musange', 2512, 1),
(99, 25, 'Musebeya', 2513, 1),
(100, 25, 'Mushubi', 2514, 1),
(101, 25, 'Nkomane', 2515, 1),
(102, 25, 'Tare', 2516, 1),
(103, 25, 'Uwinkingi', 2517, 1),
(104, 26, 'Bweramana', 2601, 1),
(105, 26, 'Byimana', 2602, 1),
(106, 26, 'Kabagali', 2603, 1),
(107, 26, 'Kinazi', 2604, 1),
(108, 26, 'Kinihira', 2605, 1),
(109, 26, 'Mbuye', 2606, 1),
(110, 26, 'Mwendo', 2607, 1),
(111, 26, 'Ntongwe', 2608, 1),
(112, 26, 'Ruhango', 2609, 1),
(113, 27, 'Cyeza', 2701, 1),
(114, 27, 'Kabacuzi', 2702, 1),
(115, 27, 'Kibangu', 2703, 1),
(116, 27, 'Kiyumba', 2704, 1),
(117, 27, 'Muhanga', 2705, 1),
(118, 27, 'Mushishiro', 2706, 1),
(119, 27, 'Nyabinoni', 2707, 1),
(120, 27, 'Nyamabuye', 2708, 1),
(121, 27, 'Nyarusange', 2709, 1),
(122, 27, 'Rongi', 2710, 1),
(123, 27, 'Rugendabari', 2711, 1),
(124, 27, 'Shyogwe', 2712, 1),
(125, 28, 'Gacurabwenge', 2801, 1),
(126, 28, 'Karama', 2802, 1),
(127, 28, 'Kayenzi', 2803, 1),
(128, 28, 'Kayumbu', 2804, 1),
(129, 28, 'Mugina', 2805, 1),
(130, 28, 'Musambira', 2806, 1),
(131, 28, 'Ngamba', 2807, 1),
(132, 28, 'Nyamiyaga', 2808, 1),
(133, 28, 'Nyarubaka', 2809, 1),
(134, 28, 'Rugarika', 2810, 1),
(135, 28, 'Rukoma', 2811, 1),
(136, 28, 'Runda', 2812, 1),
(137, 31, 'Bwishyura', 3101, 1),
(138, 31, 'Gashari', 3102, 1),
(139, 31, 'Gishyita', 3103, 1),
(140, 31, 'Gitesi', 3104, 1),
(141, 31, 'Mubuga', 3105, 1),
(142, 31, 'Murambi', 3106, 1),
(143, 31, 'Murundi', 3107, 1),
(144, 31, 'Mutuntu', 3108, 1),
(145, 31, 'Rubengera', 3109, 1),
(146, 31, 'Rugabano', 3110, 1),
(147, 31, 'Ruganda', 3111, 1),
(148, 31, 'Rwankuba', 3112, 1),
(149, 31, 'Twumba', 3113, 1),
(150, 32, 'Boneza', 3201, 1),
(151, 32, 'Gihango', 3202, 1),
(152, 32, 'Kigeyo', 3203, 1),
(153, 32, 'Kivumu', 3204, 1),
(154, 32, 'Manihira', 3205, 1),
(155, 32, 'Mukura', 3206, 1),
(156, 32, 'Murunda', 3207, 1),
(157, 32, 'Musasa', 3208, 1),
(158, 32, 'Mushonyi', 3209, 1),
(159, 32, 'Mushubati', 3210, 1),
(160, 32, 'Nyabirasi', 3211, 1),
(161, 32, 'Ruhango', 3212, 1),
(162, 32, 'Rusebeya', 3213, 1),
(163, 33, 'Bugeshi', 3301, 1),
(164, 33, 'Busasamana', 3302, 1),
(165, 33, 'Cyanzarwe', 3303, 1),
(166, 33, 'Gisenyi', 3304, 1),
(167, 33, 'Kanama', 3305, 1),
(168, 33, 'Kanzenze', 3306, 1),
(169, 33, 'Mudende', 3307, 1),
(170, 33, 'Nyakiriba', 3308, 1),
(171, 33, 'Nyamyumba', 3309, 1),
(172, 33, 'Nyundo', 3310, 1),
(173, 33, 'Rubavu', 3311, 1),
(174, 33, 'Rugerero', 3312, 1),
(175, 34, 'Bigogwe', 3401, 1),
(176, 34, 'Jenda', 3402, 1),
(177, 34, 'Jomba', 3403, 1),
(178, 34, 'Kabatwa', 3404, 1),
(179, 34, 'Karago', 3405, 1),
(180, 34, 'Kintobo', 3406, 1),
(181, 34, 'Mukamira', 3407, 1),
(182, 34, 'Muringa', 3408, 1),
(183, 34, 'Rambura', 3409, 1),
(184, 34, 'Rugera', 3410, 1),
(185, 34, 'Rurembo', 3411, 1),
(186, 34, 'Shyira', 3412, 1),
(187, 35, 'BWIRA', 3501, 1),
(188, 35, 'GATUMBA', 3502, 1),
(189, 35, 'HINDIRO', 3503, 1),
(190, 35, 'KABAYA', 3504, 1),
(191, 35, 'KAGEYO', 3505, 1),
(192, 35, 'KAVUMU', 3506, 1),
(193, 35, 'MATYAZO', 3507, 1),
(194, 35, 'MUHANDA', 3508, 1),
(195, 35, 'MUHORORO', 3509, 1),
(196, 35, 'NDARO', 3510, 1),
(197, 35, 'NGORORERO', 3511, 1),
(198, 35, 'NYANGE', 3512, 1),
(199, 35, 'SOVU', 3513, 1),
(200, 36, 'Bugarama', 3601, 1),
(201, 36, 'Butare', 3602, 1),
(202, 36, 'Bweyeye', 3603, 1),
(203, 36, 'Gashonga', 3604, 1),
(204, 36, 'Giheke', 3605, 1),
(205, 36, 'Gihundwe', 3606, 1),
(206, 36, 'Gikundamvura', 3607, 1),
(207, 36, 'Gitambi', 3608, 1),
(208, 36, 'Kamembe', 3609, 1),
(209, 36, 'Muganza', 3610, 1),
(210, 36, 'Mururu', 3611, 1),
(211, 36, 'Nkanka', 3612, 1),
(212, 36, 'Nkombo', 3613, 1),
(213, 36, 'Nkungu', 3614, 1),
(214, 36, 'Nyakabuye', 3615, 1),
(215, 36, 'Nyakarenzo', 3616, 1),
(216, 36, 'Nzahaha', 3617, 1),
(217, 36, 'Rwimbogo', 3618, 1),
(218, 37, 'Bushekeri', 3701, 1),
(219, 37, 'Bushenge', 3702, 1),
(220, 37, 'Cyato', 3703, 1),
(221, 37, 'Gihombo', 3704, 1),
(222, 37, 'Kagano', 3705, 1),
(223, 37, 'Kanjongo', 3706, 1),
(224, 37, 'Karambi', 3707, 1),
(225, 37, 'Karengera', 3708, 1),
(226, 37, 'Kirimbi', 3709, 1),
(227, 37, 'Macuba', 3710, 1),
(228, 37, 'Mahembe', 3711, 1),
(229, 37, 'Nyabitekeri', 3712, 1),
(230, 37, 'Rangiro', 3713, 1),
(231, 37, 'Ruharambuga', 3714, 1),
(232, 37, 'Shangi', 3715, 1),
(233, 41, 'BASE', 4101, 1),
(234, 41, 'BUREGA', 4102, 1),
(235, 41, 'BUSHOKI', 4103, 1),
(236, 41, 'BUYOGA', 4104, 1),
(237, 41, 'CYINZUZI', 4105, 1),
(238, 41, 'CYUNGO', 4106, 1),
(239, 41, 'KINIHIRA', 4107, 1),
(240, 41, 'KISARO', 4108, 1),
(241, 41, 'MASORO', 4109, 1),
(242, 41, 'MBOGO', 4110, 1),
(243, 41, 'MURAMBI', 4111, 1),
(244, 41, 'NGOMA', 4112, 1),
(245, 41, 'NTARABANA', 4113, 1),
(246, 41, 'RUKOZO', 4114, 1),
(247, 41, 'RUSIGA', 4115, 1),
(248, 41, 'SHYORONGI', 4116, 1),
(249, 41, 'TUMBA', 4117, 1),
(250, 42, 'Busengo', 4201, 1),
(251, 42, 'Coko', 4202, 1),
(252, 42, 'Cyabingo', 4203, 1),
(253, 42, 'Gakenke', 4204, 1),
(254, 42, 'Gashenyi', 4205, 1),
(255, 42, 'Janja', 4206, 1),
(256, 42, 'Kamubuga', 4207, 1),
(257, 42, 'Karambo', 4208, 1),
(258, 42, 'Kivuruga', 4209, 1),
(259, 42, 'Mataba', 4210, 1),
(260, 42, 'Minazi', 4211, 1),
(261, 42, 'Mugunga', 4212, 1),
(262, 42, 'Muhondo', 4213, 1),
(263, 42, 'Muyongwe', 4214, 1),
(264, 42, 'Muzo', 4215, 1),
(265, 42, 'Nemba', 4216, 1),
(266, 42, 'Ruli', 4217, 1),
(267, 42, 'Rusasa', 4218, 1),
(268, 42, 'Rushashi', 4219, 1),
(269, 43, 'Busogo', 4301, 1),
(270, 43, 'Cyuve', 4302, 1),
(271, 43, 'Gacaca', 4303, 1),
(272, 43, 'Gashaki', 4304, 1),
(273, 43, 'Gataraga', 4305, 1),
(274, 43, 'Kimonyi', 4306, 1),
(275, 43, 'Kinigi', 4307, 1),
(276, 43, 'Muhoza', 4308, 1),
(277, 43, 'Muko', 4309, 1),
(278, 43, 'Musanze', 4310, 1),
(279, 43, 'Nkotsi', 4311, 1),
(280, 43, 'Nyange', 4312, 1),
(281, 43, 'Remera', 4313, 1),
(282, 43, 'Rwaza', 4314, 1),
(283, 43, 'Shingiro', 4315, 1),
(284, 44, 'Bungwe', 4401, 1),
(285, 44, 'Butaro', 4402, 1),
(286, 44, 'Cyanika', 4403, 1),
(287, 44, 'Cyeru', 4404, 1),
(288, 44, 'Gahunga', 4405, 1),
(289, 44, 'Gatebe', 4406, 1),
(290, 44, 'Gitovu', 4407, 1),
(291, 44, 'Kagogo', 4408, 1),
(292, 44, 'Kinoni', 4409, 1),
(293, 44, 'Kinyababa', 4410, 1),
(294, 44, 'Kivuye', 4411, 1),
(295, 44, 'Nemba', 4412, 1),
(296, 44, 'Rugarama', 4413, 1),
(297, 44, 'Rugengabari', 4414, 1),
(298, 44, 'Ruhunde', 4415, 1),
(299, 44, 'Rusarabuye', 4416, 1),
(300, 44, 'Rwerere', 4417, 1),
(301, 45, 'Bukure', 4501, 1),
(302, 45, 'Bwisige', 4502, 1),
(303, 45, 'Byumba', 4503, 1),
(304, 45, 'Cyumba', 4504, 1),
(305, 45, 'Giti', 4505, 1),
(306, 45, 'Kageyo', 4506, 1),
(307, 45, 'Kaniga', 4507, 1),
(308, 45, 'Manyagiro', 4508, 1),
(309, 45, 'Miyove', 4509, 1),
(310, 45, 'Mukarange', 4510, 1),
(311, 45, 'Muko', 4511, 1),
(312, 45, 'Mutete', 4512, 1),
(313, 45, 'Nyamiyaga', 4513, 1),
(314, 45, 'Nyankenke', 4514, 1),
(315, 45, 'Rubaya', 4515, 1),
(316, 45, 'Rukomo', 4516, 1),
(317, 45, 'Rushaki', 4517, 1),
(318, 45, 'Rutare', 4518, 1),
(319, 45, 'Ruvune', 4519, 1),
(320, 45, 'Rwamiko', 4520, 1),
(321, 45, 'Shangasha', 4521, 1),
(322, 51, 'Fumbwe', 5101, 1),
(323, 51, 'Gahengeri', 5102, 1),
(324, 51, 'Gishali', 5103, 1),
(325, 51, 'Karenge', 5104, 1),
(326, 51, 'Kigabiro', 5105, 1),
(327, 51, 'Muhazi', 5106, 1),
(328, 51, 'Munyaga', 5107, 1),
(329, 51, 'Munyiginya', 5108, 1),
(330, 51, 'Musha', 5109, 1),
(331, 51, 'Muyumbu', 5110, 1),
(332, 51, 'Mwulire', 5111, 1),
(333, 51, 'Nyakaliro', 5112, 1),
(334, 51, 'Nzige', 5113, 1),
(335, 51, 'Rubona', 5114, 1),
(336, 52, 'GATUNDA', 5201, 1),
(337, 52, 'KARAMA', 5202, 1),
(338, 52, 'KARANGAZI', 5203, 1),
(339, 52, 'KATABAGEMU', 5204, 1),
(340, 52, 'KIYOMBE', 5205, 1),
(341, 52, 'MATIMBA', 5206, 1),
(342, 52, 'MIMURI', 5207, 1),
(343, 52, 'MUKAMA', 5208, 1),
(344, 52, 'MUSHERI', 5209, 1),
(345, 52, 'NYAGATARE', 5210, 1),
(346, 52, 'RUKOMO', 5211, 1),
(347, 52, 'RWEMPASHA', 5212, 1),
(348, 52, 'RWIMIYAGA', 5213, 1),
(349, 52, 'TABAGWE', 5214, 1),
(350, 53, 'Gasange', 5301, 1),
(351, 53, 'Gatsibo', 5302, 1),
(352, 53, 'Gitoki', 5303, 1),
(353, 53, 'Kabarore', 5304, 1),
(354, 53, 'Kageyo', 5305, 1),
(355, 53, 'Kiramuruzi', 5306, 1),
(356, 53, 'Kiziguro', 5307, 1),
(357, 53, 'Muhura', 5308, 1),
(358, 53, 'Murambi', 5309, 1),
(359, 53, 'Ngarama', 5310, 1),
(360, 53, 'Nyagihanga', 5311, 1),
(361, 53, 'Remera', 5312, 1),
(362, 53, 'Rugarama', 5313, 1),
(363, 53, 'Rwimbogo', 5314, 1),
(364, 54, 'Gahini', 5401, 1),
(365, 54, 'Kabare', 5402, 1),
(366, 54, 'Kabarondo', 5403, 1),
(367, 54, 'Mukarange', 5404, 1),
(368, 54, 'Murama', 5405, 1),
(369, 54, 'Murundi', 5406, 1),
(370, 54, 'Mwiri', 5407, 1),
(371, 54, 'Ndego', 5408, 1),
(372, 54, 'Nyamirama', 5409, 1),
(373, 54, 'Rukara', 5410, 1),
(374, 54, 'Ruramira', 5411, 1),
(375, 54, 'Rwinkwavu', 5412, 1),
(376, 55, 'Gahara', 5501, 1),
(377, 55, 'Gatore', 5502, 1),
(378, 55, 'Kigarama', 5503, 1),
(379, 55, 'Kigina', 5504, 1),
(380, 55, 'Kirehe', 5505, 1),
(381, 55, 'Mahama', 5506, 1),
(382, 55, 'Mpanga', 5507, 1),
(383, 55, 'Musaza', 5508, 1),
(384, 55, 'Mushikiri', 5509, 1),
(385, 55, 'Nasho', 5510, 1),
(386, 55, 'Nyamugari', 5511, 1),
(387, 55, 'Nyarubuye', 5512, 1),
(388, 56, 'Gashanda', 5601, 1),
(389, 56, 'Jarama', 5602, 1),
(390, 56, 'Karembo', 5603, 1),
(391, 56, 'Kazo', 5604, 1),
(392, 56, 'Kibungo', 5605, 1),
(393, 56, 'Mugesera', 5606, 1),
(394, 56, 'Murama', 5607, 1),
(395, 56, 'Mutenderi', 5608, 1),
(396, 56, 'Remera', 5609, 1),
(397, 56, 'Rukira', 5610, 1),
(398, 56, 'Rukumberi', 5611, 1),
(399, 56, 'Rurenge', 5612, 1),
(400, 56, 'Sake', 5613, 1),
(401, 56, 'Zaza', 5614, 1),
(402, 57, 'Gashora', 5701, 1),
(403, 57, 'Juru', 5702, 1),
(404, 57, 'Kamabuye', 5703, 1),
(405, 57, 'Mareba', 5704, 1),
(406, 57, 'Mayange', 5705, 1),
(407, 57, 'Musenyi', 5706, 1),
(408, 57, 'Mwogo', 5707, 1),
(409, 57, 'Ngeruka', 5708, 1),
(410, 57, 'Ntarama', 5709, 1),
(411, 57, 'Nyamata', 5710, 1),
(412, 57, 'Nyarugenge', 5711, 1),
(413, 57, 'Rilima', 5712, 1),
(414, 57, 'Ruhuha', 5713, 1),
(415, 57, 'Rweru', 5714, 1),
(416, 57, 'Shyara', 5715, 1);

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
  `amountremain` int(11) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`code`, `codename`, `year`, `id`, `amount`, `amountremain`, `coopid`) VALUES
(0, 'VENTE FV', 2021, 1, 7800000, 7000000, 11),
(0, 'STATION', 2021, 2, 500000, 470000, 11),
(0, 'Ibihano', 2021, 3, 150000, 150000, 11),
(0, 'Imisanzu', 2021, 4, 600000, 600000, 11),
(0, 'Cantine', 2021, 5, 1000000, 1000000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item` varchar(45) NOT NULL DEFAULT '',
  `impamvu` varchar(100) NOT NULL,
  `quantityadded` int(11) NOT NULL,
  `quantityremoved` int(11) NOT NULL,
  `action` varchar(25) NOT NULL DEFAULT '0',
  `currentquantity` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `up` int(11) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item`, `impamvu`, `quantityadded`, `quantityremoved`, `action`, `currentquantity`, `balance`, `date`, `up`, `coopid`) VALUES
(1, 'SIMA', 'CONSTRUCTION', 20, 0, 'credit', 20, 0, '2021-03-23 00:00:00', 0, 11),
(2, 'CARBURANT', 'TRANSPORT', 4580, 0, 'credit', 4580, 0, '2021-03-10 00:00:00', 0, 11),
(3, 'CARBURANT', 'CONSTRUCTION', 0, 20, 'debit', 4560, 0, '2021-03-02 00:00:00', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `category` varchar(30) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_category`
--

CREATE TABLE `users_category` (
  `id` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `institution_category` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `VillageId` int(5) NOT NULL,
  `CellCode` int(6) DEFAULT NULL,
  `VillageName` varchar(19) DEFAULT NULL,
  `VillageCode` int(8) DEFAULT NULL,
  `VillageStatus` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cooperatives`
--
ALTER TABLE `cooperatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodid`);

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
-- Indexes for table `itubyamutungo`
--
ALTER TABLE `itubyamutungo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iyongeramutungo`
--
ALTER TABLE `iyongeramutungo`
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
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerid`);

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
-- Indexes for table `revisedbudget`
--
ALTER TABLE `revisedbudget`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_category`
--
ALTER TABLE `users_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `amadeni`
--
ALTER TABLE `amadeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `combination`
--
ALTER TABLE `combination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `combinations`
--
ALTER TABLE `combinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cooperatives`
--
ALTER TABLE `cooperatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instititution`
--
ALTER TABLE `instititution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itubyamutungo`
--
ALTER TABLE `itubyamutungo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `iyongeramutungo`
--
ALTER TABLE `iyongeramutungo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levelscaisse`
--
ALTER TABLE `levelscaisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retained`
--
ALTER TABLE `retained`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revisedbudget`
--
ALTER TABLE `revisedbudget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_category`
--
ALTER TABLE `users_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
