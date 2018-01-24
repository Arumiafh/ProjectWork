-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 07:53 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sipkldssdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `WAKTU_ABSENSI` varchar(50) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ABSEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`ID_ABSEN`, `ACCOUNT_ID`, `WAKTU_ABSENSI`, `STATUS`) VALUES
(5, 4862, '16/01/2018 23:48:49', 'sudah'),
(6, 4862, '17/01/2018 01:22:20', 'sudah'),
(7, 4862, '18/01/2018 07:51:12', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SISWA_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(32) DEFAULT NULL,
  `ACCOUNT_EMAIL` varchar(50) DEFAULT NULL,
  `ROLE` varchar(10) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  KEY `FK_RELATIONSHIP_2` (`SISWA_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1111383 ;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`ACCOUNT_ID`, `SISWA_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_EMAIL`, `ROLE`, `STATUS`) VALUES
(1111381, 4862, 'Siswa_Arumia', 'arumiafh23', 'arumiafh@gmail.com', 'Siswa', 'verified'),
(1111382, 4863, 'Siswa', 'siswa123', 'siswa@example.com', 'Siswa', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun_admin`
--

CREATE TABLE IF NOT EXISTS `tb_akun_admin` (
  `ACCOUNT_ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEMBIMBING_ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ACCOUNT_EMAIL` varchar(50) NOT NULL,
  `ROLE` varchar(50) NOT NULL,
  PRIMARY KEY (`ACCOUNT_ADMIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_akun_admin`
--

INSERT INTO `tb_akun_admin` (`ACCOUNT_ADMIN_ID`, `PEMBIMBING_ID`, `USERNAME`, `PASSWORD`, `ACCOUNT_EMAIL`, `ROLE`) VALUES
(1, 1, 'admin', 'admin', 'admin@example.com', 'Admin'),
(2, 2, 'operator', 'operator', 'operator@example.com', 'Operator'),
(3, 3, 'VikoBasmalah', 'viko123', 'vikowicaksono@gmail.com', 'Admin'),
(4, 4, 'DyahAlifda', 'Dyah123', 'alifdadyah65@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
  `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SISWA_ID` int(11) NOT NULL,
  `PEMBIMBING_ID` int(11) NOT NULL,
  PRIMARY KEY (`DETAIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`DETAIL_ID`, `SISWA_ID`, `PEMBIMBING_ID`) VALUES
(1, 1, 2),
(2, 4862, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatansiswa`
--

CREATE TABLE IF NOT EXISTS `tb_kegiatansiswa` (
  `ID_KEGSIS` int(11) NOT NULL AUTO_INCREMENT,
  `SISWA_ID` int(11) DEFAULT NULL,
  `TGL_KEGSIS` date DEFAULT NULL,
  `ISI_KEGSIS` text,
  PRIMARY KEY (`ID_KEGSIS`),
  KEY `FK_RELATIONSHIP_7` (`SISWA_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_kegiatansiswa`
--

INSERT INTO `tb_kegiatansiswa` (`ID_KEGSIS`, `SISWA_ID`, `TGL_KEGSIS`, `ISI_KEGSIS`) VALUES
(1, 1, '2017-08-29', 'Aktivitas 1'),
(2, 4862, '2018-01-16', 'Merancang design atau mock up web perpustakaan menggunakan balsamiq');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `SISWA_ID` int(11) NOT NULL,
  `NILAI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NILAI_SIKAP` int(3) NOT NULL,
  `NILAI_KETERAMPILAN` int(3) NOT NULL,
  PRIMARY KEY (`NILAI_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`SISWA_ID`, `NILAI_ID`, `NILAI_SIKAP`, `NILAI_KETERAMPILAN`) VALUES
(4862, 10, 90, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE IF NOT EXISTS `tb_pembimbing` (
  `PEMBIMBING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `NIP` bigint(20) DEFAULT NULL,
  `NAMA_PEMBIMBING` varchar(50) DEFAULT NULL,
  `JENKEL_PEMBIMBING` varchar(20) DEFAULT NULL,
  `NOHP_PEMBIMBING` bigint(20) DEFAULT NULL,
  `ALAMAT_PEMBIMBING` text,
  `FOTODIRI_PEMBIMBING` text,
  `FOTOIDENTITAS_PEMBIMBING` text,
  PRIMARY KEY (`PEMBIMBING_ID`),
  KEY `FK_RELATIONSHIP_3` (`ACCOUNT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`PEMBIMBING_ID`, `ACCOUNT_ID`, `NIP`, `NAMA_PEMBIMBING`, `JENKEL_PEMBIMBING`, `NOHP_PEMBIMBING`, `ALAMAT_PEMBIMBING`, `FOTODIRI_PEMBIMBING`, `FOTOIDENTITAS_PEMBIMBING`) VALUES
(1, 1, 123, 'Admin', 'Laki-Laki', 123, 'test', 'download1.png', 'download.png'),
(2, 2, 123, 'Operator', 'Perempuan', 123, 'test', 'download.jpg', 'contoh.jpg'),
(3, 3, 9347285100, 'Viko Basmalah Wicaksono, S.Kom.', 'Laki-Laki', 81216672656, 'Gondomanan, Yogyakarta', 'blank.png', 'viko_basmalah.jpg'),
(4, 4, 6728164917, 'Dyah Alifda Prihaningrum, S.T.', 'Perempuan', 81335130888, 'Temon, Kulon Progo', 'blank.png', 'dyah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `SISWA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `DETAIL_ID` int(11) DEFAULT '0',
  `NIS` bigint(20) DEFAULT NULL,
  `NAMA_SISWA` varchar(50) DEFAULT NULL,
  `JENKEL_SISWA` varchar(20) DEFAULT NULL,
  `TEMPATLAHIR_SISWA` varchar(20) DEFAULT NULL,
  `TANGGALLAHIR_SISWA` date DEFAULT NULL,
  `AGAMA_SISWA` varchar(20) DEFAULT NULL,
  `ALAMAT_SISWA` text,
  `NOHP_SISWA` bigint(20) DEFAULT NULL,
  `ASAL_SMK` varchar(32) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `NOTELP_SMK` bigint(20) DEFAULT NULL,
  `ALAMAT_SMK` text,
  `TGL_MULAI` date DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `FOTODIRI_SISWA` text,
  `FOTOIDENTITAS_SISWA` text,
  PRIMARY KEY (`SISWA_ID`),
  KEY `FK_RELATIONSHIP_1` (`ACCOUNT_ID`),
  KEY `FK_RELATIONSHIP_5` (`DETAIL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4864 ;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`SISWA_ID`, `ACCOUNT_ID`, `DETAIL_ID`, `NIS`, `NAMA_SISWA`, `JENKEL_SISWA`, `TEMPATLAHIR_SISWA`, `TANGGALLAHIR_SISWA`, `AGAMA_SISWA`, `ALAMAT_SISWA`, `NOHP_SISWA`, `ASAL_SMK`, `JURUSAN`, `NOTELP_SMK`, `ALAMAT_SMK`, `TGL_MULAI`, `TGL_SELESAI`, `FOTODIRI_SISWA`, `FOTOIDENTITAS_SISWA`) VALUES
(4862, 1111381, 2, 3386, 'Arumia Fairuz Husna', 'Laki-Laki', 'Malang', '2000-03-23', 'Islam', 'Perumahan Asrikaton Indah Jl. Kebun Jeruk Blok G6 No. 20 Pakis, Malang', 89697067917, 'SMK Telkom Malang', 'Rekayasa Perangkat Lunak', 3414474, 'Jl. Danau Ranau No. 20', '2018-07-17', '2018-10-18', 'blank.png', 'Fat-Face-Tigger.jpg'),
(4863, 1111382, 0, 102, 'Siswa Moklet', 'Laki-Laki', 'Malang', '0001-03-23', 'Islam', 'Sawojajar, Malang', 89697067917, 'SMK Telkom Malang', 'Rekayasa Perangkat Lunak', 78787889898, 'HUYUHJKNJUU', '2018-06-06', '2018-07-05', 'blank.png', 'download_(2).png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
