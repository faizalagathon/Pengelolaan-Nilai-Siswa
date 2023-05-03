-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 12:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bindo_nilai_siswa_v3`
--
CREATE DATABASE IF NOT EXISTS `bindo_nilai_siswa_v3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bindo_nilai_siswa_v3`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `angkatan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`angkatan`) VALUES
('X'),
('XI'),
('XII'),
('XIII');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` char(1) NOT NULL,
  `is_walikelas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `alamat`, `password`, `jk`, `is_walikelas`) VALUES
(84, '838246395608903830', 'Puan Maharani12', 'rdeyhehdhdrhy', 'GZ0TMO0I', 'P', 0),
(85, '4678468554', 'Emilia', 'fxtjhxdtfhfrthtdfht', 'GC3JZYNQ', 'P', 0),
(86, '4678468554', 'Rizky', 'dhdghddfgdfg', 'G3ZYT8H8', 'L', 0),
(87, '1213453', 'Puan Maharani', 'iphuohuohuojho', 'GHFHFUWP', 'P', 0),
(88, '1213453754734', 'Kathryn', 'tyjdfjfthftjh', 'G8KNUVQB', 'P', 0),
(89, '838246395608903835', 'Paul', 'shsrghsgsg', 'GBOEJM36', 'P', 0),
(90, '322105409229604731', 'wompwomp', 'wsrgtesrgdergyerd', 'GGN5AYHZ', 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama`) VALUES
('-1', ''),
('DPIB-1', 'Desain Permodelan Informasi Bangunan 1'),
('DPIB-2', 'Desain Permodelan Informasi Bangunan 2'),
('DPIB-3', 'Desain Permodelan Informasi Bangunan 3'),
('DPIB-4', 'Desain Permodelan Informasi Bangunan 4'),
('DPIB-7', 'Desain Pemodelan 7 Infrastuktur dan Bangunan'),
('DPIB-9', 'Desain Pemodelan Infrastuktur dan Bangunan9'),
('R-2', 'RPL2'),
('RPL-1', 'Rekayasa Perangkat Lunak 1'),
('RPL-2', 'Rekayasa Perangkat Lunak 2'),
('RPL-3', 'Rekayasa Perangkat Lunak 3'),
('RPL-4', 'Rekayasa Perangkat Lunak 4'),
('RPL-5', 'Rekayasa Perangkat Lunak 5'),
('RPL-6', 'Rekayasa Perangkat Lunak 6'),
('RPL-7', 'Rekayasa dan Perangkat dan dandan Lunak 7'),
('T-1', 'TKR'),
('TKJ-1', 'Tehnik Komputer dan Jaringan 1'),
('TKJ-2', 'Tehnik Komputer dan Jaringan 2'),
('tkj-6', 'teknik komputer dan jaringan6'),
('tkj-7', 'teknik komputer dan jaringan7'),
('TKR-1', 'Teknik Kendaraan Ringan'),
('TKR-2', 'Teknik Kendaraan Ringan 2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `kode_jurusan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `angkatan`, `kode_jurusan`) VALUES
(7, 'XIII', 'RPL-2'),
(8, 'XII', 'DPIB-1'),
(9, 'XI', 'RPL-1'),
(14, 'XIII', 'RPL-2'),
(16, 'XIII', 'TKR-1'),
(17, 'XII', 'T-1'),
(18, 'X', 'TKR-2'),
(19, 'XIII', 'DPIB-9'),
(20, 'XIII', 'DPIB-7'),
(22, 'XI', 'tkj-7'),
(23, 'XII', 'RPL-7');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `nama_m` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`nama_m`) VALUES
('PAI'),
('PBO'),
('PJOK'),
('PPKn'),
('SUNDA'),
('WEB');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_m` varchar(50) NOT NULL,
  `nis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id`, `id_guru`, `nama_m`, `nis`) VALUES
(4, 84, 'PAI', 1234567891),
(13, 84, 'PAI', 1234567890),
(14, 84, 'PAI', 1234567899),
(15, 85, 'PBO', 1234567890),
(16, 85, 'PBO', 1234567899),
(17, 84, 'WEB', 1234567890),
(18, 90, 'SUNDA', 1234567890),
(19, 90, 'PPKn', 1234567890),
(20, 90, 'PPKn', 1234567899);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `uh` int(3) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(3) NOT NULL,
  `na` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_mengajar`, `tanggal`, `uh`, `uts`, `uas`, `na`) VALUES
(7, 13, '2023-04-26', 0, 0, 0, 0),
(8, 14, '2023-04-26', 0, 0, 0, 0),
(9, 13, '2023-04-27', 0, 0, 0, 0),
(10, 14, '2023-04-27', 0, 0, 0, 0),
(11, 13, '2023-04-27', 0, 0, 0, 0),
(12, 18, '2023-04-27', 0, 0, 0, 0),
(13, 19, '2023-05-02', 0, 0, 0, 0),
(14, 20, '2023-05-02', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jk` char(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_kelas`, `jk`, `nama`, `alamat`, `password`) VALUES
(12123434, 9, 'L', 'Mohamad Faizal Agathon', 'CIPTO', 'SOJBEG3Y'),
(1234567890, 9, 'L', 'Rendi', 'byuvuvgytucvycvgytuv', 'ydyufviy7ugvbuoihnoinhubuo'),
(1234567891, 8, 'L', 'Rendi Ramadhan', 'ghsgtsegsgsdgxdfgdsx', 'sgsrdgsefgsefsefgs'),
(1234567899, 9, 'L', 'Ramadhan', 'afefsfgsdgrdrgesgs', 'sdbghdrsgregefgfgsdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`angkatan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kelas_jurusan` (`kode_jurusan`),
  ADD KEY `fk_kelas_angkatan` (`angkatan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`nama_m`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mengajar_guru` (`id_guru`),
  ADD KEY `fk_mengajar_mapel` (`nama_m`),
  ADD KEY `fk_mengajar_siswa` (`nis`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_mengajar` (`id_mengajar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_siswa_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567900;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_kelas_angkatan` FOREIGN KEY (`angkatan`) REFERENCES `angkatan` (`angkatan`),
  ADD CONSTRAINT `fk_kelas_jurusan` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `fk_mengajar_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `fk_mengajar_mapel` FOREIGN KEY (`nama_m`) REFERENCES `mapel` (`nama_m`),
  ADD CONSTRAINT `fk_mengajar_siswa` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_mengajar` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
