-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 03:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekaguskreonfixtelegram`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_checkbox_kemo`
--

CREATE TABLE `admin_checkbox_kemo` (
  `id_admin_checkbox_kemo` int(11) NOT NULL,
  `id_checkbox_kemo` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp_email` varchar(50) NOT NULL,
  `id_nama_poli` int(11) NOT NULL,
  `statusSelf` int(11) NOT NULL DEFAULT 0,
  `tglSelf` date DEFAULT NULL,
  `tgKreon` date NOT NULL,
  `komentar` text NOT NULL DEFAULT 'Belum ada Komentar',
  `penilaian` varchar(50) NOT NULL,
  `status_penilaian` int(10) NOT NULL DEFAULT 0,
  `tgl` date DEFAULT NULL,
  `dokumenpendukung` varchar(50) DEFAULT NULL,
  `dokumenpendukungsdm` varchar(50) DEFAULT NULL,
  `dokumenpendukungruang` varchar(50) DEFAULT NULL,
  `dokumenpendukungperalatan` varchar(50) DEFAULT NULL,
  `dokumenperlengkapanpenunjang` varchar(50) DEFAULT NULL,
  `is_status` int(11) DEFAULT 0,
  `a` int(2) NOT NULL,
  `b` int(2) NOT NULL,
  `c` int(2) NOT NULL,
  `d` int(2) NOT NULL,
  `e` int(2) NOT NULL,
  `f` int(2) NOT NULL,
  `g` int(2) NOT NULL,
  `h` int(2) NOT NULL,
  `i` int(2) NOT NULL,
  `j` int(2) NOT NULL,
  `k` int(2) NOT NULL,
  `l` int(2) NOT NULL,
  `m` int(2) NOT NULL,
  `n` int(2) NOT NULL,
  `o` int(2) NOT NULL,
  `p` int(2) NOT NULL,
  `q` int(2) NOT NULL,
  `r` int(2) NOT NULL,
  `s` int(2) NOT NULL,
  `t` int(2) NOT NULL,
  `u` int(2) NOT NULL,
  `v` int(2) NOT NULL,
  `w` int(2) NOT NULL,
  `x` int(2) NOT NULL,
  `y` int(2) NOT NULL,
  `z` int(2) NOT NULL,
  `a1` int(2) NOT NULL,
  `a2` int(2) NOT NULL,
  `a3` int(2) NOT NULL,
  `a4` int(2) NOT NULL,
  `a7` int(2) NOT NULL,
  `a8` int(2) NOT NULL,
  `a9` int(2) NOT NULL,
  `a10` int(2) NOT NULL,
  `a11` int(2) NOT NULL,
  `a12` int(2) NOT NULL,
  `a13` int(2) NOT NULL,
  `a14` int(2) NOT NULL,
  `a15` int(2) NOT NULL,
  `a16` int(2) NOT NULL,
  `a17` int(2) NOT NULL,
  `a18` int(2) NOT NULL,
  `a19` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_checkbox_kemo`
--

INSERT INTO `admin_checkbox_kemo` (`id_admin_checkbox_kemo`, `id_checkbox_kemo`, `nama_pemilik`, `alamat`, `telp_email`, `id_nama_poli`, `statusSelf`, `tglSelf`, `tgKreon`, `komentar`, `penilaian`, `status_penilaian`, `tgl`, `dokumenpendukung`, `dokumenpendukungsdm`, `dokumenpendukungruang`, `dokumenpendukungperalatan`, `dokumenperlengkapanpenunjang`, `is_status`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`, `x`, `y`, `z`, `a1`, `a2`, `a3`, `a4`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`) VALUES
(6, 6, 'Fajar Nugroho', 'Tempuran', 'fajarn@gmail.com', 3, 0, '2022-03-15', '0000-00-00', 'Belum ada Komentar', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 'Fajar Nugroho', 'Tempuran', 'fajarn@gmail.com', 3, 0, '2022-03-15', '0000-00-00', 'Belum ada Komentar', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkbox`
--

CREATE TABLE `checkbox` (
  `id_checkbox` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp_email` varchar(50) NOT NULL,
  `id_nama_poli` int(11) NOT NULL,
  `hasilSkor` varchar(20) NOT NULL,
  `statusSelf` int(11) NOT NULL DEFAULT 0,
  `tglSelf` date DEFAULT NULL,
  `komentar` text NOT NULL DEFAULT 'Belum ada Komentar',
  `penilaian` varchar(50) NOT NULL,
  `status_penilaian` int(10) NOT NULL DEFAULT 0,
  `hasilBpjs` varchar(20) NOT NULL DEFAULT 'BPJS belum menilai',
  `tgKreon` date DEFAULT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `dokumen` varchar(50) DEFAULT NULL,
  `is_status` int(11) DEFAULT 0,
  `a` int(2) NOT NULL,
  `b` int(2) NOT NULL,
  `c` int(2) NOT NULL,
  `d` int(2) NOT NULL,
  `e` int(2) NOT NULL,
  `aaa` int(2) NOT NULL,
  `aab` int(2) NOT NULL,
  `aac` int(2) NOT NULL,
  `aad` int(2) NOT NULL,
  `aae` int(2) NOT NULL,
  `aaf` int(2) NOT NULL,
  `aba` int(2) NOT NULL,
  `abb` int(2) NOT NULL,
  `abc` int(2) NOT NULL,
  `abd` int(2) NOT NULL,
  `abe` int(2) NOT NULL,
  `abf` int(2) NOT NULL,
  `aca` int(2) NOT NULL,
  `acb` int(2) NOT NULL,
  `acc` int(2) NOT NULL,
  `acd` int(2) NOT NULL,
  `ace` int(2) NOT NULL,
  `acf` int(2) NOT NULL,
  `ca` int(2) NOT NULL,
  `b1a` int(2) NOT NULL,
  `b1b` int(2) NOT NULL,
  `b1c` int(2) NOT NULL,
  `b1d` int(2) NOT NULL,
  `b2a` int(2) NOT NULL,
  `b2b` int(2) NOT NULL,
  `b2c` int(2) NOT NULL,
  `b2d` int(2) NOT NULL,
  `b2e` int(2) NOT NULL,
  `b2f` int(2) NOT NULL,
  `b2g` int(2) NOT NULL,
  `b2h` int(2) NOT NULL,
  `b2i` int(2) NOT NULL,
  `b2j` int(2) NOT NULL,
  `b2k` int(2) NOT NULL,
  `b2l` int(2) NOT NULL,
  `b2m` int(2) NOT NULL,
  `b2n` int(2) NOT NULL,
  `b2o` int(2) NOT NULL,
  `b2p` int(2) NOT NULL,
  `b2q` int(2) NOT NULL,
  `bba` int(2) NOT NULL,
  `bb1` int(2) NOT NULL,
  `bb2` int(2) NOT NULL,
  `bb3` int(2) NOT NULL,
  `bb4` int(2) NOT NULL,
  `bb5` int(2) NOT NULL,
  `bb6` int(2) NOT NULL,
  `bb7` int(2) NOT NULL,
  `bb8` int(2) NOT NULL,
  `bb9` int(2) NOT NULL,
  `bb10` int(2) NOT NULL,
  `bb11` int(2) NOT NULL,
  `bb12` int(2) NOT NULL,
  `bba1` int(2) NOT NULL,
  `bbb` int(2) NOT NULL,
  `bbc` int(2) NOT NULL,
  `bbd` int(2) NOT NULL,
  `bbe` int(2) NOT NULL,
  `bbf` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkbox`
--

INSERT INTO `checkbox` (`id_checkbox`, `nama_pemilik`, `alamat`, `telp_email`, `id_nama_poli`, `hasilSkor`, `statusSelf`, `tglSelf`, `komentar`, `penilaian`, `status_penilaian`, `hasilBpjs`, `tgKreon`, `id_nama_faskes`, `tgl`, `dokumen`, `is_status`, `a`, `b`, `c`, `d`, `e`, `aaa`, `aab`, `aac`, `aad`, `aae`, `aaf`, `aba`, `abb`, `abc`, `abd`, `abe`, `abf`, `aca`, `acb`, `acc`, `acd`, `ace`, `acf`, `ca`, `b1a`, `b1b`, `b1c`, `b1d`, `b2a`, `b2b`, `b2c`, `b2d`, `b2e`, `b2f`, `b2g`, `b2h`, `b2i`, `b2j`, `b2k`, `b2l`, `b2m`, `b2n`, `b2o`, `b2p`, `b2q`, `bba`, `bb1`, `bb2`, `bb3`, `bb4`, `bb5`, `bb6`, `bb7`, `bb8`, `bb9`, `bb10`, `bb11`, `bb12`, `bba1`, `bbb`, `bbc`, `bbd`, `bbe`, `bbf`) VALUES
(4, 'Agus', 'Salaman', '676', 1, '93.625', 0, '2021-12-18', 'tolak level kabid', 'tolakkabid', 1, '100', '2022-03-09', 1, '2021-11-26', '17_0504_0080_performancetest.docx', 0, 1, 1, 1, 1, 1, 100, 75, 100, 100, 100, 75, 100, 100, 100, 100, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 0, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(5, 'Fajar Nugroho', 'Tempuran', 'fajarn@gmail.com', 1, '70.71875', 0, NULL, '', '', 0, '59', '2022-03-15', 1, '2022-02-16', '17_0504_0076_MuhammadHaidar_0504204.pdf', 0, 1, 1, 1, 1, 1, 100, 75, 75, 75, 75, 75, 100, 100, 100, 100, 100, 100, 0, 100, 0, 0, 0, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 0, 100, 100, 100, 0, 100, 100, 75, 100, 100, 0, 100, 100),
(6, 'Fajar Nugroho', 'Tempuran', 'fajarn@gmail.com', 1, '61.96875', 0, NULL, '12345', 'tolakkabid', 1, '55', '2022-03-15', 6, '2022-03-15', '17_0504_0076_MuhammadHaidar_05042042.pdf', 0, 1, 1, 1, 1, 1, 100, 75, 100, 75, 100, 75, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 0, 100, 100, 0, 100, 0, 100, 75, 100, 0, 0, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `checkbox_hd`
--

CREATE TABLE `checkbox_hd` (
  `id_checkbox_hd` int(11) NOT NULL,
  `pimpinan_faskes` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp_email` varchar(50) NOT NULL,
  `kepemilikan` varchar(50) NOT NULL,
  `id_nama_poli` int(11) NOT NULL,
  `hasilSkor` varchar(20) NOT NULL,
  `statusSelf` int(11) NOT NULL DEFAULT 0,
  `tglSelf` date DEFAULT NULL,
  `komentar` text NOT NULL DEFAULT 'Belum ada Komentar',
  `penilaian` varchar(50) NOT NULL,
  `status_penilaian` int(10) NOT NULL DEFAULT 0,
  `hasilBpjs` varchar(20) NOT NULL DEFAULT 'BPJS belum menilai',
  `tgKreon` date DEFAULT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `dokumenkomitmen` varchar(50) DEFAULT NULL,
  `dokumensarana` varchar(50) DEFAULT NULL,
  `dokumenpendukung` varchar(50) DEFAULT NULL,
  `dokumenadm` varchar(50) DEFAULT NULL,
  `is_status` int(11) DEFAULT 0,
  `a` int(2) NOT NULL,
  `b` int(2) NOT NULL,
  `c` int(2) NOT NULL,
  `d` int(2) NOT NULL,
  `e` int(2) NOT NULL,
  `f` int(2) NOT NULL,
  `g` int(2) NOT NULL,
  `a1` int(2) NOT NULL,
  `a2` int(2) NOT NULL,
  `a3` int(2) NOT NULL,
  `a4` int(2) NOT NULL,
  `a5` int(2) NOT NULL,
  `a6` int(2) NOT NULL,
  `a7` int(2) NOT NULL,
  `a8` int(2) NOT NULL,
  `a9` int(2) NOT NULL,
  `a10` int(2) NOT NULL,
  `a11` int(2) NOT NULL,
  `a12` int(2) NOT NULL,
  `a13` int(2) NOT NULL,
  `a14` int(2) NOT NULL,
  `a15` int(2) NOT NULL,
  `a16` int(2) NOT NULL,
  `a17` int(2) NOT NULL,
  `a18` int(2) NOT NULL,
  `a19` int(2) NOT NULL,
  `a20` int(2) NOT NULL,
  `a21` int(2) NOT NULL,
  `a22` int(2) NOT NULL,
  `a23` int(2) NOT NULL,
  `a24` int(2) NOT NULL,
  `a25` int(2) NOT NULL,
  `a26` int(2) NOT NULL,
  `a27` int(2) NOT NULL,
  `a28` int(2) NOT NULL,
  `a29` int(2) NOT NULL,
  `a30` int(2) NOT NULL,
  `a31` int(2) NOT NULL,
  `a32` int(2) NOT NULL,
  `a33` int(2) NOT NULL,
  `a34` int(2) NOT NULL,
  `a35` int(2) NOT NULL,
  `a36` int(2) NOT NULL,
  `a37` int(2) NOT NULL,
  `a38` int(2) NOT NULL,
  `a39` int(2) NOT NULL,
  `a40` int(2) NOT NULL,
  `a41` int(2) NOT NULL,
  `a42` int(2) NOT NULL,
  `a43` int(2) NOT NULL,
  `a44` int(2) NOT NULL,
  `a45` int(2) NOT NULL,
  `a46` int(2) NOT NULL,
  `a47` int(2) NOT NULL,
  `a48` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkbox_hd`
--

INSERT INTO `checkbox_hd` (`id_checkbox_hd`, `pimpinan_faskes`, `alamat`, `telp_email`, `kepemilikan`, `id_nama_poli`, `hasilSkor`, `statusSelf`, `tglSelf`, `komentar`, `penilaian`, `status_penilaian`, `hasilBpjs`, `tgKreon`, `id_nama_faskes`, `tgl`, `dokumenkomitmen`, `dokumensarana`, `dokumenpendukung`, `dokumenadm`, `is_status`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`, `a32`, `a33`, `a34`, `a35`, `a36`, `a37`, `a38`, `a39`, `a40`, `a41`, `a42`, `a43`, `a44`, `a45`, `a46`, `a47`, `a48`) VALUES
(7, 'fajar', 'Tempuran', '12342133', 'rereyt', 2, '79.3', 0, '2021-12-18', '1. Saya Terima\r\n2. Tolak', 'tolakkabid', 1, '100', '2022-03-09', 1, NULL, 'Integration_System.pdf', 'Spinner_MuhammadAlfianSyah.pdf', 'Kajian_MuhammadAlfianSyah_17_0504_0080.docx', 'Kajian_MuhammadAlfianSyah_17_0504_0080.pdf', 0, 1, 1, 1, 0, 0, 0, 0, 100, 100, 0, 75, 75, 75, 0, 0, 100, 100, 100, 100, 100, 100, 100, 0, 100, 75, 100, 100, 100, 100, 0, 100, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(8, 'Fajar', 'Tempuran', 'fajarn@gmail.com', 'Muchlos', 2, '67', 0, NULL, 'tes2', 'tolakkabid', 1, '59', '2022-03-15', 1, '2022-02-16', '17_0504_0076_MuhammadHaidar_05042041.pdf', '17_0504_0080_Evaluasi3.pdf', '17_0504_0080_Muhammad_Alfian_Syah.pdf', '17_0504_0080_Muhammad_Alfian_Syah_TugasPert15.pdf', 0, 1, 1, 1, 1, 1, 1, 1, 100, 0, 100, 75, 75, 100, 100, 75, 100, 0, 100, 0, 100, 0, 100, 0, 100, 75, 0, 100, 0, 100, 0, 100, 0, 100, 0, 75, 50, 100, 0, 100, 0, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100),
(9, 'Wahyu', 'Tempuran', 'fajarn@gmail.com', 'Setyo', 2, '75.7', 0, NULL, '3213465', 'terimakabid', 1, '69', '2022-03-15', 6, '2022-03-15', '17_0504_0076_MuhammadHaidar_05042043.pdf', '17_0504_0080_Evaluasi31.pdf', '17_0504_0080_Muhammad_Alfian_Syah1.pdf', '17_0504_0080_Muhammad_Alfian_Syah_TugasPert151.pdf', 0, 1, 1, 0, 1, 1, 1, 0, 100, 100, 0, 75, 75, 75, 100, 75, 100, 0, 100, 0, 100, 0, 100, 0, 100, 75, 100, 100, 0, 100, 0, 100, 100, 100, 0, 75, 100, 0, 100, 100, 100, 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 75, 100, 75, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkbox_kemo`
--

CREATE TABLE `checkbox_kemo` (
  `id_checkbox_kemo` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp_email` varchar(50) NOT NULL,
  `id_nama_poli` int(11) NOT NULL,
  `statusSelf` int(11) NOT NULL,
  `tglSelf` date DEFAULT NULL,
  `tgKreon` date DEFAULT NULL,
  `komentar` text NOT NULL DEFAULT 'Belum ada komentar',
  `penilaian` varchar(50) NOT NULL,
  `status_penilaian` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `dokumenpendukung` varchar(50) NOT NULL,
  `dokumenpendukungsdm` varchar(50) NOT NULL,
  `dokumenpendukungruang` varchar(50) NOT NULL,
  `dokumenpendukungperalatan` varchar(50) NOT NULL,
  `dokumenperlengkapanpenunjang` varchar(50) NOT NULL,
  `is_status` int(11) NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `e` int(11) NOT NULL,
  `f` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `i` int(11) NOT NULL,
  `j` int(11) NOT NULL,
  `k` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `o` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `q` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `t` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `v` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `a7` int(11) NOT NULL,
  `a8` int(11) NOT NULL,
  `a9` int(11) NOT NULL,
  `a10` int(11) NOT NULL,
  `a11` int(11) NOT NULL,
  `a12` int(11) NOT NULL,
  `a13` int(11) NOT NULL,
  `a14` int(11) NOT NULL,
  `a15` int(11) NOT NULL,
  `a16` int(11) NOT NULL,
  `a17` int(11) NOT NULL,
  `a18` int(11) NOT NULL,
  `a19` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkbox_kemo`
--

INSERT INTO `checkbox_kemo` (`id_checkbox_kemo`, `nama_pemilik`, `alamat`, `telp_email`, `id_nama_poli`, `statusSelf`, `tglSelf`, `tgKreon`, `komentar`, `penilaian`, `status_penilaian`, `id_nama_faskes`, `tgl`, `dokumenpendukung`, `dokumenpendukungsdm`, `dokumenpendukungruang`, `dokumenpendukungperalatan`, `dokumenperlengkapanpenunjang`, `is_status`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`, `x`, `y`, `z`, `a1`, `a2`, `a3`, `a4`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`) VALUES
(1, 'Fajar Nugroho', 'Tempuran', 'fajarn@gmail.com', 3, 0, NULL, '2022-04-15', '54321', 'terimakabid', 1, 6, '2022-02-16', '17_0504_0076_MuhammadHaidar_05042045.pdf', '17_0504_0080_Evaluasi33.pdf', '17_0504_0080_Muhammad_Alfian_Syah_TugasPert153.pdf', '17_0504_0080_Muhammad_Alfian_Syah3.pdf', '17_0504_0080_MuhammadAlfianSyah1.pdf', 0, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `klinik_doc`
--

CREATE TABLE `klinik_doc` (
  `id_klinik_doc` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(11) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klinik_doc`
--

INSERT INTO `klinik_doc` (`id_klinik_doc`, `id_nama_faskes`, `tgl`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(2, 2, '2022-03-11', 1, '26092021', '2022-03-12', '2022-04-12', '31 Hari', '17_0504_0076_MuhammadHaidar_05042041.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `klinik_tm`
--

CREATE TABLE `klinik_tm` (
  `id_klinik_tm` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_jns_tng_mds` int(11) NOT NULL,
  `nama_tng_mds` varchar(255) NOT NULL,
  `jkn_kis` varchar(50) NOT NULL,
  `dokumen2` varchar(50) NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(11) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klinik_tm`
--

INSERT INTO `klinik_tm` (`id_klinik_tm`, `id_nama_faskes`, `tgl`, `id_jns_tng_mds`, `nama_tng_mds`, `jkn_kis`, `dokumen2`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(5, 2, '2022-03-11', 1, 'Iqbal Ridwan', 'Ya', '17_0504_0076_MuhammadHaidar_05042041.pdf', 1, '26092021', '2022-03-12', '2022-05-12', '62 Hari', '17_0504_0080_Evaluasi31.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `kreon_doc`
--

CREATE TABLE `kreon_doc` (
  `id_kreon_doc` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(11) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kreon_doc`
--

INSERT INTO `kreon_doc` (`id_kreon_doc`, `tgl`, `id_nama_faskes`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(2, '2022-03-11', 6, 1, '26092021', '2022-03-14', '2022-04-14', '31 Hari', '17_0504_0076_MuhammadHaidar_0504204.pdf', 2, 'BPJS belum memberi komentar'),
(3, '2022-03-15', 1, 1, '26092021', '2022-02-28', '2022-04-28', '59 Hari', '17_0504_0076_MuhammadHaidar_05042041.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `kreon_tm`
--

CREATE TABLE `kreon_tm` (
  `id_kreon_tm` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_jns_tng_mds` int(11) NOT NULL,
  `nama_tng_mds` varchar(255) NOT NULL,
  `jkn_kis` varchar(50) NOT NULL,
  `dokumen2` varchar(50) NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(10) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kreon_tm`
--

INSERT INTO `kreon_tm` (`id_kreon_tm`, `id_nama_faskes`, `tgl`, `id_jns_tng_mds`, `nama_tng_mds`, `jkn_kis`, `dokumen2`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(14, 6, '2022-03-11', 1, 'Fatkhur Rohman', 'Ya', '17_0504_0076_MuhammadHaidar_05042042.pdf', 1, '26092021', '2022-03-12', '2022-05-12', '61 Hari', '17_0504_0080_Evaluasi32.pdf', 2, 'BPJS belum memberi komentar'),
(15, 1, '2022-03-14', 1, 'Iqbal Ridwan', 'Ya', '17_0504_0076_MuhammadHaidar_05042044.pdf', 1, '26092021', '2022-03-15', '2022-04-15', '31 Hari', '17_0504_0080_Evaluasi34.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `m_jns_faskes`
--

CREATE TABLE `m_jns_faskes` (
  `id_jns_faskes` int(11) NOT NULL,
  `jns_nama_faskes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_jns_faskes`
--

INSERT INTO `m_jns_faskes` (`id_jns_faskes`, `jns_nama_faskes`) VALUES
(1, 'Rumah Sakit'),
(2, 'Klinik Utama'),
(3, 'Optik');

-- --------------------------------------------------------

--
-- Table structure for table `m_jns_tng_mds`
--

CREATE TABLE `m_jns_tng_mds` (
  `id_jns_tng_mds` int(11) NOT NULL,
  `jenis_tenaga_medis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_jns_tng_mds`
--

INSERT INTO `m_jns_tng_mds` (`id_jns_tng_mds`, `jenis_tenaga_medis`) VALUES
(1, 'Ahli Gizi'),
(2, 'Ahli teknologi laboratorium medik (analis/biologi)/ ATLM'),
(3, 'Analis Farmasi'),
(4, 'Apoteker'),
(5, 'Bidan'),
(6, 'Dokter Gigi\r\n'),
(7, 'Dokter Umum\r\n'),
(8, 'Elektromedis'),
(9, 'Fisikawan medik\r\n'),
(10, 'Fisioterapis'),
(11, 'Okupasi terapis\r\n'),
(12, 'Ortotis prostetis\r\n'),
(13, 'Perawat HD\r\n'),
(14, 'Perawat Onkologi\r\n'),
(15, 'Radiografer'),
(16, 'Radioterapis'),
(17, 'Refraksionis Optisien\r\n'),
(18, 'Sarjana Farmasi\r\n'),
(19, 'Spesialis Anak\r\n'),
(20, 'Spesialis Anastesi\r\n'),
(21, 'Spesialis Bedah'),
(22, 'Spesialis Bedah Mulut\r\n'),
(23, 'Spesialis Dalam\r\n'),
(24, 'Spesialis Gigi Endodonsi\r\n'),
(25, 'Spesialis Gigi Orthodonti\r\n'),
(26, 'Spesialis Gigi Pedodontis\r\n'),
(27, 'Spesialis Gigi Prsosthodonti'),
(28, 'Spesialis Jantung dan Pembuluh Darah\r\n'),
(29, 'Spesialis Jiwa\r\n'),
(30, '\r\nSpesialis Kulit Kelamin'),
(31, 'Spesialis Mata\r\n'),
(32, 'Spesialis Obsgyn\r\n'),
(33, 'Spesialis Orthopedi\r\n'),
(34, 'Spesialis Paru\r\n'),
(35, 'Spesialis Patologi Anatomi\r\n'),
(36, 'Spesialis Patologi Klinik\r\n'),
(37, 'Spesialis Radiologi\r\n'),
(38, 'Spesialis Rehab Medik'),
(39, 'Spesialis Saraf\r\n'),
(40, 'Spesialis THT\r\n'),
(41, 'Spesialis Urologi\r\n'),
(42, 'Subspesialis Bedah Anak\r\n'),
(43, 'Subspesialis Bedah Onkologi\r\n'),
(44, 'Subspesialis Bedah Saraf\r\n'),
(45, 'Subspesialis Endokrin\r\n'),
(46, 'Subspesialis Jiwa Anak dan Remaja\r\n'),
(47, 'Subspesialis Reumatologi\r\n'),
(48, 'Tenaga Biomedik\r\n'),
(49, 'Tenaga Teknik Kefarmasian\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `m_nama_faskes`
--

CREATE TABLE `m_nama_faskes` (
  `id_nama_faskes` int(11) NOT NULL,
  `nama_faskes` varchar(100) NOT NULL,
  `id_jns_faskes` int(11) NOT NULL,
  `kode_faskes` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_telegram` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_nama_faskes`
--

INSERT INTO `m_nama_faskes` (`id_nama_faskes`, `nama_faskes`, `id_jns_faskes`, `kode_faskes`, `id_user`, `id_telegram`) VALUES
(1, 'RS Syubbanul Wathon Kab Magelang', 1, 'RS001', 2, '965581589'),
(2, 'Klinik Pirikan', 2, 'KU001', 3, '965581589'),
(3, 'Optik Pirikan', 3, 'OP001', 4, '813616781'),
(4, 'Rumah Sakit Magelang', 1, 'RS002', 6, '813616781'),
(6, 'Rumah Sakit Tes', 1, 'KU0013123', 8, '5120634882');

-- --------------------------------------------------------

--
-- Table structure for table `m_nama_surat`
--

CREATE TABLE `m_nama_surat` (
  `id_nama_surat` int(11) NOT NULL,
  `nama_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_nama_surat`
--

INSERT INTO `m_nama_surat` (`id_nama_surat`, `nama_surat`) VALUES
(1, 'Ijin Bapeten alat Radiografi Umum'),
(2, 'Ijin Pelayanan HD dari Dinkes'),
(3, 'ijin radiologi dari Dinas Kesehatan'),
(4, 'Kalibrasi Alat'),
(5, 'Penetapan Kelas RS'),
(6, 'PKS Ambulan'),
(7, 'PKS Laboratorium'),
(8, 'PKS Limbah B3'),
(9, 'PKS PMI'),
(10, 'Rekomendasi Pernefri'),
(11, 'Sertifikat ACLS'),
(12, 'Sertifikat Akreditasi'),
(13, 'Sertifikat Kompetensi Dokter Spesialis HD'),
(14, 'Sertifikat Kompetensi Dokter Spesialis Phaco'),
(15, 'Sertifikat Pelatihan Peracikan Obat Sitostatika'),
(16, 'Sertifikat Perawat HD'),
(17, 'Sertifikat Perawat Onkologi'),
(18, 'Sertifikat Teknisi mesin HD'),
(19, 'SIKRO'),
(20, 'SIO'),
(21, 'SIP'),
(22, 'SIPA'),
(23, 'SK Tim Cancer Board'),
(24, 'SK Tim Unit Intensif '),
(25, 'STRRO'),
(26, 'Surat ijin edar bagi Kacamata Korektif'),
(27, 'Surat Ijin Usaha Perdagangan (SIUP) OPTIK'),
(28, 'Surat Tugas CS'),
(29, 'Surat Tugas Penanggung Jawab HFIS'),
(30, 'Surat Tugas Pengentry dan Pencetak SEP'),
(31, 'Surat Tugas Pengentry LUPIS'),
(32, 'Surat Tugas Pengentry tagihan klaim (INA-CBGs)/ koder'),
(33, 'Surat Tugas Personal In Charge (PIC) PRB');

-- --------------------------------------------------------

--
-- Table structure for table `nama_poli`
--

CREATE TABLE `nama_poli` (
  `id_nama_poli` int(11) NOT NULL,
  `nama_poli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nama_poli`
--

INSERT INTO `nama_poli` (`id_nama_poli`, `nama_poli`) VALUES
(1, 'Poli Nyeri'),
(2, 'Poli Hemodialisa'),
(3, 'Poli Kemoterapi');

-- --------------------------------------------------------

--
-- Table structure for table `optik_doc`
--

CREATE TABLE `optik_doc` (
  `id_optik_doc` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(11) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `optik_doc`
--

INSERT INTO `optik_doc` (`id_optik_doc`, `id_nama_faskes`, `tgl`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(2, 3, '2022-03-11', 1, '12345321', '2022-03-12', '2022-05-12', '61 Hari', '17_0504_0076_MuhammadHaidar_05042041.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `optik_tm`
--

CREATE TABLE `optik_tm` (
  `id_optik_tm` int(11) NOT NULL,
  `id_nama_faskes` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_jns_tng_mds` int(11) NOT NULL,
  `nama_tng_mds` varchar(255) NOT NULL,
  `jkn_kis` varchar(50) NOT NULL,
  `dokumen2` varchar(150) NOT NULL,
  `id_nama_surat` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tmt` date NOT NULL,
  `tat` date NOT NULL,
  `sisa_hari` varchar(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `status_penilaian` int(11) DEFAULT 0,
  `komentar` varchar(255) DEFAULT 'BPJS belum memberi komentar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `optik_tm`
--

INSERT INTO `optik_tm` (`id_optik_tm`, `id_nama_faskes`, `tgl`, `id_jns_tng_mds`, `nama_tng_mds`, `jkn_kis`, `dokumen2`, `id_nama_surat`, `nomor_surat`, `tmt`, `tat`, `sisa_hari`, `dokumen`, `status_penilaian`, `komentar`) VALUES
(4, 3, '2022-03-11', 1, 'Iqbal Ridwan', 'Ya', '17_0504_0076_MuhammadHaidar_0504204.pdf', 2, '12345322', '2022-03-12', '2022-05-12', '61 Hari', '17_0504_0080_Evaluasi3.pdf', 0, 'BPJS belum memberi komentar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('admin','faskes') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `no_telp`, `role`, `password`, `created_at`, `foto`, `is_active`) VALUES
(1, 'Adminisitrator', 'admin', 'admin@admin.com', '025123456789', 'admin', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1636975452, 'user.png', 1),
(2, 'RS Syubbanul Wathon Kab Magelang', 'rsbpjs', 'alfiandotid@gmail.com', '085647151215', 'faskes', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1637911171, 'user.png', 1),
(3, 'Klinik Utama Pirikan', 'klinikpirikan', 'muhalfian1899@gmail.com', '085743829160', 'faskes', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1638421999, 'user.png', 1),
(4, 'Optik Pirikan', 'optikpirikan', 'achirsyah.moeis12@gmail.com', '085743829300', 'faskes', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1638422047, 'user.png', 1),
(6, 'Rumah Sakit Magelang', 'rsmagelang', 'rsmagelang@gmail.com', '085647151216', 'faskes', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1639897567, 'user.png', 1),
(8, 'Rumah Sakit Tes', 'rstes', 'rstes@yahoo.com', '085743829166', 'faskes', '$2y$10$l5al6wFDU4U8tn5z3tAVlelK5yj.YTmEuVdD2XLDK.PvykR9v.r..', 1646628282, 'user.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_checkbox_kemo`
--
ALTER TABLE `admin_checkbox_kemo`
  ADD PRIMARY KEY (`id_admin_checkbox_kemo`),
  ADD KEY `admin_checkbox_kemo_ibfk_2` (`id_nama_poli`),
  ADD KEY `id_checkbox_kemo` (`id_checkbox_kemo`);

--
-- Indexes for table `checkbox`
--
ALTER TABLE `checkbox`
  ADD PRIMARY KEY (`id_checkbox`),
  ADD KEY `id_user` (`id_nama_faskes`),
  ADD KEY `checkbox_ibfk_2` (`id_nama_poli`);

--
-- Indexes for table `checkbox_hd`
--
ALTER TABLE `checkbox_hd`
  ADD PRIMARY KEY (`id_checkbox_hd`),
  ADD KEY `id_user` (`id_nama_faskes`),
  ADD KEY `checkbox_hd_ibfk_2` (`id_nama_poli`);

--
-- Indexes for table `checkbox_kemo`
--
ALTER TABLE `checkbox_kemo`
  ADD PRIMARY KEY (`id_checkbox_kemo`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`),
  ADD KEY `id_nama_poli` (`id_nama_poli`);

--
-- Indexes for table `klinik_doc`
--
ALTER TABLE `klinik_doc`
  ADD PRIMARY KEY (`id_klinik_doc`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_nama_surat`),
  ADD KEY `id_nama_surat` (`id_nama_surat`);

--
-- Indexes for table `klinik_tm`
--
ALTER TABLE `klinik_tm`
  ADD PRIMARY KEY (`id_klinik_tm`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_jns_tng_mds`),
  ADD KEY `id_jns_tng_mds` (`id_jns_tng_mds`),
  ADD KEY `id_nama_surat` (`id_nama_surat`);

--
-- Indexes for table `kreon_doc`
--
ALTER TABLE `kreon_doc`
  ADD PRIMARY KEY (`id_kreon_doc`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_nama_surat`),
  ADD KEY `id_nama_surat` (`id_nama_surat`);

--
-- Indexes for table `kreon_tm`
--
ALTER TABLE `kreon_tm`
  ADD PRIMARY KEY (`id_kreon_tm`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_jns_tng_mds`),
  ADD KEY `id_jns_tng_mds` (`id_jns_tng_mds`),
  ADD KEY `id_nama_surat` (`id_nama_surat`);

--
-- Indexes for table `m_jns_faskes`
--
ALTER TABLE `m_jns_faskes`
  ADD PRIMARY KEY (`id_jns_faskes`);

--
-- Indexes for table `m_jns_tng_mds`
--
ALTER TABLE `m_jns_tng_mds`
  ADD PRIMARY KEY (`id_jns_tng_mds`);

--
-- Indexes for table `m_nama_faskes`
--
ALTER TABLE `m_nama_faskes`
  ADD PRIMARY KEY (`id_nama_faskes`),
  ADD KEY `id_jenis_faskes` (`id_jns_faskes`),
  ADD KEY `m_id_faskes_ibfk_2` (`id_user`);

--
-- Indexes for table `m_nama_surat`
--
ALTER TABLE `m_nama_surat`
  ADD PRIMARY KEY (`id_nama_surat`);

--
-- Indexes for table `nama_poli`
--
ALTER TABLE `nama_poli`
  ADD PRIMARY KEY (`id_nama_poli`);

--
-- Indexes for table `optik_doc`
--
ALTER TABLE `optik_doc`
  ADD PRIMARY KEY (`id_optik_doc`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_nama_surat`),
  ADD KEY `id_nama_surat` (`id_nama_surat`);

--
-- Indexes for table `optik_tm`
--
ALTER TABLE `optik_tm`
  ADD PRIMARY KEY (`id_optik_tm`),
  ADD KEY `id_nama_faskes` (`id_nama_faskes`,`id_jns_tng_mds`),
  ADD KEY `id_nama_surat` (`id_nama_surat`),
  ADD KEY `id_jns_tng_mds` (`id_jns_tng_mds`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_checkbox_kemo`
--
ALTER TABLE `admin_checkbox_kemo`
  MODIFY `id_admin_checkbox_kemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkbox`
--
ALTER TABLE `checkbox`
  MODIFY `id_checkbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkbox_hd`
--
ALTER TABLE `checkbox_hd`
  MODIFY `id_checkbox_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkbox_kemo`
--
ALTER TABLE `checkbox_kemo`
  MODIFY `id_checkbox_kemo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klinik_doc`
--
ALTER TABLE `klinik_doc`
  MODIFY `id_klinik_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klinik_tm`
--
ALTER TABLE `klinik_tm`
  MODIFY `id_klinik_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kreon_doc`
--
ALTER TABLE `kreon_doc`
  MODIFY `id_kreon_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kreon_tm`
--
ALTER TABLE `kreon_tm`
  MODIFY `id_kreon_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_jns_faskes`
--
ALTER TABLE `m_jns_faskes`
  MODIFY `id_jns_faskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_jns_tng_mds`
--
ALTER TABLE `m_jns_tng_mds`
  MODIFY `id_jns_tng_mds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `m_nama_faskes`
--
ALTER TABLE `m_nama_faskes`
  MODIFY `id_nama_faskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_nama_surat`
--
ALTER TABLE `m_nama_surat`
  MODIFY `id_nama_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nama_poli`
--
ALTER TABLE `nama_poli`
  MODIFY `id_nama_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `optik_doc`
--
ALTER TABLE `optik_doc`
  MODIFY `id_optik_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `optik_tm`
--
ALTER TABLE `optik_tm`
  MODIFY `id_optik_tm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_checkbox_kemo`
--
ALTER TABLE `admin_checkbox_kemo`
  ADD CONSTRAINT `admin_checkbox_kemo_ibfk_1` FOREIGN KEY (`id_checkbox_kemo`) REFERENCES `checkbox_kemo` (`id_checkbox_kemo`),
  ADD CONSTRAINT `admin_checkbox_kemo_ibfk_3` FOREIGN KEY (`id_nama_poli`) REFERENCES `nama_poli` (`id_nama_poli`);

--
-- Constraints for table `checkbox`
--
ALTER TABLE `checkbox`
  ADD CONSTRAINT `checkbox_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `checkbox_ibfk_2` FOREIGN KEY (`id_nama_poli`) REFERENCES `nama_poli` (`id_nama_poli`);

--
-- Constraints for table `checkbox_hd`
--
ALTER TABLE `checkbox_hd`
  ADD CONSTRAINT `checkbox_hd_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `checkbox_hd_ibfk_2` FOREIGN KEY (`id_nama_poli`) REFERENCES `nama_poli` (`id_nama_poli`);

--
-- Constraints for table `checkbox_kemo`
--
ALTER TABLE `checkbox_kemo`
  ADD CONSTRAINT `checkbox_kemo_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `checkbox_kemo_ibfk_2` FOREIGN KEY (`id_nama_poli`) REFERENCES `nama_poli` (`id_nama_poli`);

--
-- Constraints for table `klinik_doc`
--
ALTER TABLE `klinik_doc`
  ADD CONSTRAINT `klinik_doc_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `klinik_doc_ibfk_2` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);

--
-- Constraints for table `klinik_tm`
--
ALTER TABLE `klinik_tm`
  ADD CONSTRAINT `klinik_tm_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `klinik_tm_ibfk_2` FOREIGN KEY (`id_jns_tng_mds`) REFERENCES `m_jns_tng_mds` (`id_jns_tng_mds`),
  ADD CONSTRAINT `klinik_tm_ibfk_3` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);

--
-- Constraints for table `kreon_doc`
--
ALTER TABLE `kreon_doc`
  ADD CONSTRAINT `kreon_doc_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `kreon_doc_ibfk_2` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);

--
-- Constraints for table `kreon_tm`
--
ALTER TABLE `kreon_tm`
  ADD CONSTRAINT `kreon_tm_ibfk_2` FOREIGN KEY (`id_jns_tng_mds`) REFERENCES `m_jns_tng_mds` (`id_jns_tng_mds`),
  ADD CONSTRAINT `kreon_tm_ibfk_3` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`) ON DELETE CASCADE,
  ADD CONSTRAINT `kreon_tm_ibfk_4` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);

--
-- Constraints for table `m_nama_faskes`
--
ALTER TABLE `m_nama_faskes`
  ADD CONSTRAINT `m_nama_faskes_ibfk_1` FOREIGN KEY (`id_jns_faskes`) REFERENCES `m_jns_faskes` (`id_jns_faskes`),
  ADD CONSTRAINT `m_nama_faskes_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `optik_doc`
--
ALTER TABLE `optik_doc`
  ADD CONSTRAINT `optik_doc_ibfk_1` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `optik_doc_ibfk_2` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);

--
-- Constraints for table `optik_tm`
--
ALTER TABLE `optik_tm`
  ADD CONSTRAINT `optik_tm_ibfk_2` FOREIGN KEY (`id_jns_tng_mds`) REFERENCES `m_jns_tng_mds` (`id_jns_tng_mds`),
  ADD CONSTRAINT `optik_tm_ibfk_3` FOREIGN KEY (`id_nama_faskes`) REFERENCES `m_nama_faskes` (`id_nama_faskes`),
  ADD CONSTRAINT `optik_tm_ibfk_4` FOREIGN KEY (`id_nama_surat`) REFERENCES `m_nama_surat` (`id_nama_surat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
