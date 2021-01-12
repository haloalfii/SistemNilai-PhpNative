-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 06:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(20) NOT NULL,
  `jeniskelamin_guru` varchar(2) NOT NULL,
  `nohp_guru` varchar(13) NOT NULL,
  `id_users` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jeniskelamin_guru`, `nohp_guru`, `id_users`) VALUES
('000001', 'Salsbila', 'P', '08945679802', 'guru1'),
('000002', 'M Royyan', 'L', '08135679567', 'guru2'),
('000003', 'Habib Dwi', 'L', '081555590908', 'guru3');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('10A', '10A'),
('10B', '10B'),
('10C', '10C');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(11) NOT NULL,
  `nilai_indo` int(11) NOT NULL,
  `nilai_inggris` int(11) NOT NULL,
  `nilai_mtk` int(11) NOT NULL,
  `rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai_indo`, `nilai_inggris`, `nilai_mtk`, `rata`) VALUES
('18.11.0174', 70, 90, 90, 83),
('18.11.2117', 75, 60, 100, 78),
('18.11.2207', 60, 100, 100, 87),
('18.11.3009', 79, 90, 87, 85);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jeniskelamin` varchar(2) NOT NULL,
  `nohp_siswa` varchar(13) NOT NULL,
  `thn_lahir` varchar(4) NOT NULL,
  `id_users` varchar(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_nilai` varchar(11) NOT NULL,
  `id_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jeniskelamin`, `nohp_siswa`, `thn_lahir`, `id_users`, `nip`, `id_nilai`, `id_kelas`) VALUES
('18.11.0174', 'David Sion', 'L', '085725895926', '2000', 'defsiswa', '000002', '18.11.0174', '10B'),
('18.11.2117', 'Riyan DIkcy', 'L', '08156532654', '2000', 'defsiswa', '000003', '18.11.2117', '10C'),
('18.11.2207', 'Dewi Arshieta', 'P', '081081081081', '2000', 'defsiswa', '000002', '18.11.2207', '10B'),
('18.11.3009', 'M Royyan', 'L', '08156532654', '2000', 'defsiswa', '000003', '18.11.3009', '10C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `level`) VALUES
('defguru', 'Guru', 'guru', 'guru123', 'guru'),
('defsiswa', 'Siswa', 'siswa', 'siswa123', 'siswa'),
('guru1', 'Salsabila', 'Salsa', 'salsa123', 'guru'),
('guru2', 'M Royyan', 'Royyan', 'royyan123', 'guru'),
('guru3', 'Habib Dwi', 'habib', 'habib123', 'guru'),
('siswa1', 'Alfian Luthfi', 'alfian', 'alfian123', 'siswa'),
('siswa2', 'Rinanda Isac', 'isac', 'isac123', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_users_guru` (`id_users`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_guru` (`nip`),
  ADD KEY `fk_kelas` (`id_kelas`),
  ADD KEY `fk_nilai` (`id_nilai`),
  ADD KEY `fk_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_users_guru` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_nilai` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
