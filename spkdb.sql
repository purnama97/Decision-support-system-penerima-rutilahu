-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 12:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_admin`
--

CREATE TABLE `as_admin` (
  `userID` int(5) NOT NULL,
  `userNIP` varchar(16) NOT NULL,
  `userFullName` varchar(45) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userLevel` enum('A','U') NOT NULL,
  `userBlocked` enum('Y','N') NOT NULL,
  `userName` varchar(15) NOT NULL,
  `userPassword` varchar(75) NOT NULL,
  `createDate` date NOT NULL,
  `modifiedDate` date NOT NULL,
  `modifiedUserID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_admin`
--

INSERT INTO `as_admin` (`userID`, `userNIP`, `userFullName`, `userPhone`, `userLevel`, `userBlocked`, `userName`, `userPassword`, `createDate`, `modifiedDate`, `modifiedUserID`) VALUES
(1, '1997200220191001', 'Ipur Purnama', '082115784351', 'A', 'N', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-10-05', '2019-10-05', 1),
(2, '1992200220191001', 'Maman', '082115784352', 'U', 'N', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2019-10-05', '2019-10-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_kriteria`
--

CREATE TABLE `as_kriteria` (
  `criteriaID` int(5) NOT NULL,
  `criteriaName` varchar(35) NOT NULL,
  `criteriaWeight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_kriteria`
--

INSERT INTO `as_kriteria` (`criteriaID`, `criteriaName`, `criteriaWeight`) VALUES
(3, 'Kondisi Ruangan', 3),
(4, 'Jenis Lantai', 2),
(5, 'Kondisi Atap', 4),
(6, 'Kondisi Dinding', 4),
(7, 'Kondisi Sumber Penerangan', 2),
(8, 'Kondisi Pembuangan Akhir', 3),
(9, 'Kondisi Sumber Air Minum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `as_nilai`
--

CREATE TABLE `as_nilai` (
  `nilaiID` int(5) NOT NULL,
  `penilaianID` int(5) NOT NULL,
  `C1` float NOT NULL,
  `C2` float NOT NULL,
  `C3` float NOT NULL,
  `C4` float NOT NULL,
  `C5` float NOT NULL,
  `C6` float NOT NULL,
  `C7` float NOT NULL,
  `modifiedUserID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_nilai`
--

INSERT INTO `as_nilai` (`nilaiID`, `penilaianID`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`, `C7`, `modifiedUserID`) VALUES
(1, 2, 1, 3, 3, 1, 2, 3, 1, 1),
(2, 3, 3, 1, 3, 3, 1, 3, 2, 1),
(3, 4, 2, 2, 2, 2, 3, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_penerima`
--

CREATE TABLE `as_penerima` (
  `penerimaID` int(7) NOT NULL,
  `penerimaNoKK` varchar(16) NOT NULL,
  `penerimaName` varchar(35) NOT NULL,
  `penerimaDusun` varchar(25) NOT NULL,
  `penerimaRT` varchar(4) NOT NULL,
  `penerimaRW` varchar(4) NOT NULL,
  `penerimaKet` varchar(100) NOT NULL,
  `modifiedUserID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_penerima`
--

INSERT INTO `as_penerima` (`penerimaID`, `penerimaNoKK`, `penerimaName`, `penerimaDusun`, `penerimaRT`, `penerimaRW`, `penerimaKet`, `modifiedUserID`) VALUES
(3, '327805010189***1', 'Maman Sutarma', 'Sukaraja', '001', '001', '-', 1),
(4, '327805010489***1', 'Uded  ', 'Sukaraja', '001', '001', '-', 1),
(5, '327805010160***1', 'Abdul Basri', 'Sukaraja', '001', '001', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_penilaian`
--

CREATE TABLE `as_penilaian` (
  `penilaianID` int(5) NOT NULL,
  `penerimaID` int(5) NOT NULL,
  `priodeID` int(5) NOT NULL,
  `modifiedUserID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_penilaian`
--

INSERT INTO `as_penilaian` (`penilaianID`, `penerimaID`, `priodeID`, `modifiedUserID`) VALUES
(2, 3, 3, 1),
(3, 4, 3, 1),
(4, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `as_priode`
--

CREATE TABLE `as_priode` (
  `priodeID` int(5) NOT NULL,
  `priodeName` varchar(25) NOT NULL,
  `priodeYear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_priode`
--

INSERT INTO `as_priode` (`priodeID`, `priodeName`, `priodeYear`) VALUES
(3, 'Priode 1', 2019),
(4, 'Priode 2', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `as_subkriteria`
--

CREATE TABLE `as_subkriteria` (
  `subID` int(5) NOT NULL,
  `criteriaID` int(5) NOT NULL,
  `subName` varchar(45) NOT NULL,
  `subNilai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `as_subkriteria`
--

INSERT INTO `as_subkriteria` (`subID`, `criteriaID`, `subName`, `subNilai`) VALUES
(1, 3, 'Sempit <= 9 M2', 3),
(2, 3, 'Sedang 10-13 M2', 2),
(3, 3, 'Lebih dari > 14 M2', 1),
(4, 4, 'Buruk (Tanah,Bambu,Kayu Kualitas Rendah)', 3),
(5, 4, 'Sedang (Aci / Semen)', 2),
(6, 4, 'Baik (Keramik)', 1),
(7, 5, 'Buruk (Injuk, Seng, Anyaman)', 3),
(8, 5, 'Sedang (Asbes, Genteng)', 2),
(9, 5, 'Baik (Beton)', 1),
(10, 6, 'Buruk (Bambu, Rumbia)', 3),
(11, 6, 'Sedang (Seng, GRC, Triplek, Kayu)', 2),
(12, 6, 'Baik (Tembok,Beton)', 1),
(13, 7, 'Baik (PLN <= 450)', 3),
(14, 7, 'Sedang(PLN 900 - 1300)', 2),
(15, 7, 'Baik (PLN >=2.200)', 1),
(16, 8, 'Baik (Saluran Limbah, Tank)', 1),
(17, 8, 'Sedang (Kolam, Sawah, Sungai)', 2),
(18, 8, 'Buruk (Lubang Tanah)', 3),
(19, 9, 'Baik (Air Isi Ulang / Kemasan)', 1),
(20, 9, 'Sedang (Sumur Bor. Pompa)', 2),
(21, 9, 'Buruk (Air Sungai, Air Hujan)', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_admin`
--
ALTER TABLE `as_admin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `as_kriteria`
--
ALTER TABLE `as_kriteria`
  ADD PRIMARY KEY (`criteriaID`);

--
-- Indexes for table `as_nilai`
--
ALTER TABLE `as_nilai`
  ADD PRIMARY KEY (`nilaiID`),
  ADD KEY `penilaianID` (`penilaianID`);

--
-- Indexes for table `as_penerima`
--
ALTER TABLE `as_penerima`
  ADD PRIMARY KEY (`penerimaID`);

--
-- Indexes for table `as_penilaian`
--
ALTER TABLE `as_penilaian`
  ADD PRIMARY KEY (`penilaianID`),
  ADD KEY `penerimaID` (`penerimaID`),
  ADD KEY `priodeID` (`priodeID`),
  ADD KEY `modifiedUserID` (`modifiedUserID`);

--
-- Indexes for table `as_priode`
--
ALTER TABLE `as_priode`
  ADD PRIMARY KEY (`priodeID`);

--
-- Indexes for table `as_subkriteria`
--
ALTER TABLE `as_subkriteria`
  ADD PRIMARY KEY (`subID`),
  ADD KEY `criteriaID` (`criteriaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_admin`
--
ALTER TABLE `as_admin`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `as_kriteria`
--
ALTER TABLE `as_kriteria`
  MODIFY `criteriaID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `as_nilai`
--
ALTER TABLE `as_nilai`
  MODIFY `nilaiID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `as_penerima`
--
ALTER TABLE `as_penerima`
  MODIFY `penerimaID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `as_penilaian`
--
ALTER TABLE `as_penilaian`
  MODIFY `penilaianID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `as_priode`
--
ALTER TABLE `as_priode`
  MODIFY `priodeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_subkriteria`
--
ALTER TABLE `as_subkriteria`
  MODIFY `subID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
