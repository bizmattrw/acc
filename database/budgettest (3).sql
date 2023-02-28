-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 03:21 PM
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
('', 'TRANSPORT', '001', 2023, 1, 2000000, 2000000, 11, 0),
('', 'GUHEMBA ABAHINZI', '0010', 2023, 2, 5000000, 2000000, 11, 1),
('', 'FEDERATION AND UNION', '002', 2023, 3, 3000000, 3000000, 11, 0),
('', 'FERTILIZERS', '003', 2023, 4, 10000000, 10000000, 11, 0),
('', 'CREDIT NAEB', '004', 2023, 5, 4000000, 4000000, 11, 0),
('', 'BRD', '005', 2023, 6, 7000000, 7000000, 11, 0),
('', 'CDMS', '006', 2023, 7, 2000000, 2000000, 11, 0),
('', 'MANAGEMENT FEES COOPERATIVE', '008', 2023, 8, 4000000, 4000000, 11, 0),
('', 'SALARIES', '009', 2023, 9, 10000000, 10000000, 11, 0),
('', 'CAR VEHICLE MAINTAINANCE', '011', 2023, 10, 2000000, 2000000, 11, 0),
('', 'GUHEMBA ABASOROMYI', '012', 2023, 11, 5000000, 3680000, 11, 1);

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
(1, 'KUGURIZA ABAHINZI', 1, 200000, 0, 200000, '2023-02-28', 'member', 'COOPERATIVE ACCOUNTANT', '2023-02-26', 11);

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
(1, 'BK', '5050', 'OPENING BALANCE 2022', 5000000, 'REMAINING AMOUNT', 'debit', 5000000, '2023-02-26', 'Slip', '464564', '', 11, '34543', 1),
(2, 'BK', '5050', 'MUSHUBI TEA FACTORY', 95000000, 'GUHEMBA ABAHINZI /2/2023', 'debit', 100000000, '2023-02-26', 'Slip', '3454353', '', 11, '34543', 1),
(3, 'BK', '5050', 'GUHEMBA ABAHIZI 2/2023 SACCO MUSHUBI', 3000000, 'unknown', 'credit', 97000000, '2023-02-26', 'Cheque', 'dfgddg', 'GUHEMBA ABAHINZI', 11, '34543', 1),
(4, 'BK', '5050', 'COOP ACCOUNTANT', 7000000, 'GUHEMBA ABASOROMYI 2/2023', 'credit', 90000000, '2023-02-26', 'Credit', '', '', 11, '34543', 1),
(5, 'BK', '5050', 'COOP ACCOUNTANT', 100000, 'GUHEMBA ABAHINZI /2/2023', 'credit', 89900000, '2023-02-26', 'Credit', '', '', 11, '34543', 1),
(6, 'BK', '5050', 'COOP ACCOUNTANT', 120000, 'GUHEMBA', 'credit', 89780000, '2023-02-26', 'Credit', '', '', 11, '34543', 0);

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
(1, 'BK', '5050', 'COOP ACCOUNTANT', 7000000, 'GUHEMBA ABASOROMYI 2/2023', 'debit', 7000000, '2023-02-26 00:00:00', '', 11, 1, '34543'),
(2, '', '', 'MUHAMED', 300000, 'GUHEMBWA 2/2023', 'credit', 6700000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'rrderte54354334'),
(3, '', '', 'MATHIAS', 100000, 'GUHEMBWA 2/2023', 'credit', 6900000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'DDSF456'),
(4, '', '', 'MUHAMED', 300000, 'GUHEMBWA 2/2023', 'credit', 6600000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'rrderte54354334'),
(5, '', '', 'MATHIAS', 100000, 'GUHEMBWA 2/2023', 'credit', 6800000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'DDSF456'),
(6, '', '', 'MUHAMED', 300000, 'GUHEMBWA 2/2023', 'credit', 6500000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'rrderte54354334'),
(7, '', '', 'MATHIAS', 100000, 'GUHEMBWA 2/2023', 'credit', 6700000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 1, 'DDSF456'),
(8, 'BK', '5050', 'COOP ACCOUNTANT', 100000, 'GUHEMBA ABAHINZI /2/2023', 'debit', 6800000, '2023-02-26 00:00:00', '', 11, 1, '34543'),
(9, 'BK', '5050', 'COOP ACCOUNTANT', 120000, 'GUHEMBA', 'debit', 6920000, '2023-02-26 00:00:00', '', 11, 1, '34543'),
(10, '', '', 'MUHAMED', 120000, 'GUHEMBWA 2/2023', 'credit', 6800000, '2023-02-26 00:00:00', 'GUHEMBA ABASOROMYI', 11, 0, '899889');

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
(1, '1', '5050', 11, 1),
(2, '1', '2020', 11, 0),
(3, '2', '123', 11, 0);

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
  `fertilizer_pyt_mean` varchar(200) NOT NULL,
  `tin_no` varchar(40) NOT NULL,
  `rca_no` varchar(40) NOT NULL,
  `pays_pluckers` tinyint(4) NOT NULL DEFAULT 0
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
(3000000, 'unknown', 'GUHEMBA ABAHINZI', 1, '2023-02-26', 'BK', '5050', 'GUHEMBA ABAHIZI 2/2023 SACCO MUSHUBI', 11),
(300000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 2, '2023-02-26', 'caisse', ' ', ' ', 11),
(100000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 3, '2023-02-26', 'caisse', ' ', ' ', 11),
(300000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 4, '2023-02-26', 'caisse', ' ', ' ', 11),
(100000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 5, '2023-02-26', 'caisse', ' ', ' ', 11),
(300000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 6, '2023-02-26', 'caisse', ' ', ' ', 11),
(100000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 7, '2023-02-26', 'caisse', ' ', ' ', 11),
(120000, ' GUHEMBWA 2/2023', 'GUHEMBA ABASOROMYI', 8, '2023-02-26', 'caisse', ' ', ' ', 11);

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
(1, 'AMANDE', 65000, '2023-02-26', 11);

-- --------------------------------------------------------

--
-- Table structure for table `instititution`
--

CREATE TABLE `instititution` (
  `id` int(11) NOT NULL,
  `liability` varchar(200) NOT NULL DEFAULT '',
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2023-02-26', 'unknown', 3000000, 0, '2023-02-26', '0000-00-00', '', 11),
(2, '2023-02-26', 'GUHEMBWA 2/2023', 300000, 2, '0000-00-00', '0000-00-00', '', 11),
(3, '2023-02-26', 'GUHEMBWA 2/2023', 100000, 3, '0000-00-00', '0000-00-00', '', 11),
(4, '2023-02-26', 'GUHEMBWA 2/2023', 300000, 4, '0000-00-00', '0000-00-00', '', 11),
(5, '2023-02-26', 'GUHEMBWA 2/2023', 100000, 5, '0000-00-00', '0000-00-00', '', 11),
(6, '2023-02-26', 'GUHEMBWA 2/2023', 300000, 6, '0000-00-00', '0000-00-00', '', 11),
(7, '2023-02-26', 'GUHEMBWA 2/2023', 100000, 7, '0000-00-00', '0000-00-00', '', 11),
(8, '2023-02-26', 'GUHEMBWA 2/2023', 120000, 10, '0000-00-00', '2023-02-26', '', 11);

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
(1, '2023-02-26', 'REMAINING AMOUNT', 5000000, 0, '2023-02-26', '0000-00-00', '', 11),
(2, '2023-02-26', 'GUHEMBA ABAHINZI /2/2023', 95000000, 0, '2023-02-26', '0000-00-00', '', 11),
(3, '2023-02-26', 'KUGURIZA ABAHINZI', 200000, 0, '0000-00-00', '2023-02-26', 'bbb 621.JPG', 11);

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
(1, 'BK', 11, 1),
(2, 'COGEBANQUE', 11, 0);

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
  `year` year(4) NOT NULL,
  `item` varchar(60) NOT NULL,
  `coopid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `pprice`, `sprice`, `year`, `item`, `coopid`) VALUES
(1, 1700, 1700, 2023, 'ESSENCE', 11),
(2, 2000, 2000, 2023, 'MAZOUTU', 11),
(3, 4500, 4500, 2023, 'BOOTS', 11),
(4, 500, 600, 2023, 'NPK', 11),
(5, 200, 300, 2023, 'IMIFUKA', 11),
(6, 200, 200, 2023, 'AMAKARAMU', 11),
(7, 3000, 3000, 2023, 'SHITTING', 11),
(8, 3000, 3000, 2023, 'SHITTING12', 11),
(12, 1400, 1400, 2023, 'DRINKS', 11);

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

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `particular` varchar(200) NOT NULL,
  `operationdate` date NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id`, `action`, `particular`, `operationdate`, `photo`) VALUES
(1, 'debit', 'OPENING BALANCE 2022', '2023-02-26', ''),
(2, 'debit', 'MUSHUBI TEA FACTORY', '2023-02-26', ''),
(3, 'cheque', 'GUHEMBA ABAHIZI 2/2023 SACCO MUSHUBI', '2023-02-26', '');

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
(0, 'IMISARURO', 2023, 1, 2000000, 2000000, 11),
(0, 'AMANDE', 2023, 2, 450000, 385000, 11);

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
  `date` date NOT NULL,
  `up` int(11) NOT NULL,
  `coopid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item`, `impamvu`, `quantityadded`, `quantityremoved`, `action`, `currentquantity`, `balance`, `date`, `up`, `coopid`, `status`) VALUES
(1, 'AMAKARAMU', 'stock inventory', 80, 0, 'credit', 80, 0, '2023-02-26', 0, 11, 0),
(2, 'BOOTS', 'stock inventory', 200, 0, 'credit', 200, 0, '2023-02-24', 0, 11, 0),
(3, 'AMAKARAMU', 'stock inventory', 0, 20, 'debit', 60, 0, '2023-02-26', 0, 11, 1);

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
-- Indexes for table `piece`
--
ALTER TABLE `piece`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `amadeni`
--
ALTER TABLE `amadeni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `combination`
--
ALTER TABLE `combination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `combinations`
--
ALTER TABLE `combinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instititution`
--
ALTER TABLE `instititution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itubyamutungo`
--
ALTER TABLE `itubyamutungo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `iyongeramutungo`
--
ALTER TABLE `iyongeramutungo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
