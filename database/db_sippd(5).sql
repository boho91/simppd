-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 10:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sippd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE IF NOT EXISTS `bidang` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `kode_bidang` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `urusan`, `kode_bidang`, `bidang`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(1, 1, '01', 'Pendidikan', '2', '2016-06-30 00:36:43', '', '0000-00-00 00:00:00'),
(2, 1, '02', 'Kesehatan', '2', '2016-07-27 07:18:52', '', '0000-00-00 00:00:00'),
(3, 1, '03', 'Pekerjaan Umum', '2', '2016-07-27 07:19:51', '2', '2016-08-01 11:17:36'),
(4, 1, '04', 'Perumahan ', '2', '2016-07-27 07:20:15', '2', '2016-08-01 11:17:52'),
(5, 1, '05', 'Penataan Ruang', '2', '2016-07-27 07:20:59', '2', '2016-08-01 11:18:14'),
(6, 1, '06', 'Perencanaan Pembangunan', '2', '2016-07-27 07:21:13', '2', '2016-08-01 11:18:44'),
(7, 1, '07', 'Perhubungan', '2', '2016-07-27 07:21:35', '2', '2016-08-01 11:19:08'),
(8, 1, '08', 'Lingkungan Hidup', '2', '2016-07-27 07:21:56', '2', '2016-08-01 11:19:28'),
(9, 1, '09', 'Pertanahan', '2', '2016-07-27 07:22:07', '2', '2016-08-01 11:19:48'),
(10, 1, '10', 'Kependudukan dan Catatan Sipil', '2', '2016-07-27 07:22:20', '2', '2016-08-01 11:20:15'),
(11, 1, '11', 'Pemberdayaan Perempuan dan Perlindungan Anak', '2', '2016-07-27 07:22:53', '2', '2016-08-01 11:20:49'),
(12, 1, '12', 'Keluarga Berencana dan Keluarga Sehjahtera', '2', '2016-07-27 07:23:06', '2', '2016-08-01 11:21:22'),
(13, 1, '13', 'Sosial', '2', '2016-07-27 07:23:20', '2', '2016-08-01 11:21:39'),
(14, 1, '14', 'Ketenagakerjaan', '2', '2016-07-27 07:23:31', '2', '2016-08-01 11:21:59'),
(15, 1, '15', 'Koperasi dan UKM', '2', '2016-08-01 11:22:33', '2', '2016-08-01 11:22:43'),
(16, 1, '16', 'Penanaman Modal Daerah', '2', '2016-08-01 11:23:03', '', '0000-00-00 00:00:00'),
(17, 1, '17', 'Kebudayaan', '2', '2016-08-01 11:23:15', '', '0000-00-00 00:00:00'),
(18, 1, '18', 'Pemuda dan Olahraga', '2', '2016-08-01 11:23:31', '', '0000-00-00 00:00:00'),
(19, 1, '19', 'Kesatuan Bangsa dan Politik Dalam negeri', '2', '2016-08-01 11:23:55', '', '0000-00-00 00:00:00'),
(20, 1, '20', 'Pemerintahan Umum', '2', '2016-08-01 11:24:13', '', '0000-00-00 00:00:00'),
(21, 1, '21', 'Kepegawaian', '2', '2016-08-01 11:24:38', '', '0000-00-00 00:00:00'),
(22, 1, '22', 'Pemberdayaan Masyarakat', '2', '2016-08-01 11:24:56', '', '0000-00-00 00:00:00'),
(23, 1, '23', 'Statistik', '2', '2016-08-01 11:25:15', '', '0000-00-00 00:00:00'),
(24, 1, '24', 'Kearsipan', '2', '2016-08-01 11:25:25', '', '0000-00-00 00:00:00'),
(25, 1, '25', 'Komunikasi dan Informatika', '2', '2016-08-01 11:25:41', '', '0000-00-00 00:00:00'),
(26, 2, '01', 'Pertanian', '2', '2016-08-01 11:25:58', '', '0000-00-00 00:00:00'),
(27, 2, '02', 'Energi dan Sumber Daya Mineral', '2', '2016-08-01 11:26:19', '', '0000-00-00 00:00:00'),
(28, 2, '03', 'Pariwisata', '2', '2016-08-01 11:26:47', '', '0000-00-00 00:00:00'),
(29, 2, '04', 'Perikanan', '2', '2016-08-01 11:27:03', '', '0000-00-00 00:00:00'),
(30, 2, '05', 'Perdagangan', '2', '2016-08-01 11:27:17', '', '0000-00-00 00:00:00'),
(31, 2, '06', 'Perindustrian', '2', '2016-08-01 11:27:45', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
  `id` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `kecamatan`, `desa`) VALUES
(1, 4, 'BANE'),
(2, 4, 'BARU'),
(3, 4, 'KAHEAN'),
(4, 4, 'MARTOBA'),
(5, 4, 'MELAYU'),
(6, 4, 'SIGULANG-GULANG'),
(7, 4, 'SUKADAME'),
(8, 5, 'ASUHAN'),
(9, 5, 'MERDEKA'),
(10, 5, 'KEBUN SAYUR'),
(11, 5, 'PAHLAWAN'),
(12, 5, 'PARDOMUAN'),
(13, 5, 'SIOPAT SUHU'),
(14, 5, 'TOMUAN'),
(15, 7, 'BAH KAPUL'),
(16, 7, 'BAH SORMA'),
(17, 7, 'BUKIT SOFA'),
(18, 7, 'GURILLA'),
(19, 7, 'SETIA NEGARA'),
(20, 3, 'NAGAPITA'),
(21, 3, 'NAGAPITU'),
(22, 3, 'PONDOK SAYUR'),
(23, 3, 'SUMBER JAYA'),
(24, 3, 'TAMBUN NABOLON'),
(25, 3, 'TANJUNG PINGGIR'),
(26, 3, 'TANJUNG TONGAH'),
(27, 6, 'AEK NAULI'),
(28, 6, 'KARO'),
(29, 6, 'KRISTEN'),
(30, 6, 'MARTIMBANG'),
(31, 6, 'SIMALUNGUN'),
(32, 6, 'TOBA'),
(33, 8, 'MARIHAT JAYA'),
(34, 8, 'NAGAHUTA TIMUR'),
(35, 8, 'PEMATANG MARIHAT'),
(36, 8, 'TONG MARIMBUN'),
(37, 8, 'SIMARIMBUN'),
(38, 8, 'NAGAHUTA'),
(39, 1, 'BARINGIN PANCUR NAULI'),
(40, 1, 'MEKAR NAULI'),
(41, 1, 'PARDAMEAN'),
(42, 1, 'PARHORASAN NAULI'),
(43, 1, 'SUKAMAJU'),
(44, 1, 'SUKAMAKMUR'),
(45, 1, 'SUKARAJA'),
(46, 2, 'BANJAR'),
(47, 2, 'BANTAN'),
(48, 2, 'DWIKORA'),
(49, 2, 'PROKLAMASI'),
(50, 2, 'SIMARITO'),
(51, 2, 'SIPINGGOL-PINGGOL'),
(52, 2, 'TELADAN'),
(53, 2, 'TIMBANG GALUNG');

-- --------------------------------------------------------

--
-- Table structure for table `dpa`
--

CREATE TABLE IF NOT EXISTS `dpa` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `id_rekening_belanja` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `sub_uraian` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL,
  `item` text NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `level` enum('parent1','parent2','parent3','parent4','uraian','sub uraian','item') NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Terima','Tolak') NOT NULL DEFAULT 'Terima',
  `capaian_program` text NOT NULL,
  `target_capaian_program` text NOT NULL,
  `masukan` text NOT NULL,
  `target_masukan` text NOT NULL,
  `keluaran` text NOT NULL,
  `target_keluaran` text NOT NULL,
  `hasil` text NOT NULL,
  `target_hasil` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `sumber_dana` text NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `jenis_sumber_dana` varchar(111) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpa`
--

INSERT INTO `dpa` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `id_rekening_belanja`, `skpd`, `uraian`, `sub_uraian`, `created_by`, `created_date`, `mod_by`, `mod_date`, `parent_id`, `parentCategory`, `item`, `volume`, `satuan`, `harga_satuan`, `level`, `status_verifikasi`, `capaian_program`, `target_capaian_program`, `masukan`, `target_masukan`, `keluaran`, `target_keluaran`, `hasil`, `target_hasil`, `sasaran_kegiatan`, `sumber_dana`, `lokasi_kegiatan`, `jenis_sumber_dana`) VALUES
(1, 2020, 1, 1, 1, 1, 1, 24, '', '', '2', '2016-07-17 01:22:46', '2', '2016-07-17 02:34:53', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '3', '', 'Dana Alokasi Khusus'),
(2, 2020, 1, 1, 1, 1, 2, 24, '', '', '2', '2016-07-17 01:22:46', '', '0000-00-00 00:00:00', 1, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(3, 2020, 1, 1, 1, 1, 3, 24, '', '', '2', '2016-07-17 01:22:46', '', '0000-00-00 00:00:00', 2, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(4, 2020, 1, 1, 1, 1, 4, 24, '', '', '2', '2016-07-17 01:22:46', '', '0000-00-00 00:00:00', 3, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(5, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:22:46', '', '0000-00-00 00:00:00', 4, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(6, 2020, 1, 1, 1, 1, 8, 24, '', 'Gaji', '2', '2016-07-17 01:22:58', '', '0000-00-00 00:00:00', 5, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(7, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:23:17', '', '0000-00-00 00:00:00', 6, 0, 'Kepala Dinas', 1, 'ob', 7000000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(8, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:23:39', '', '0000-00-00 00:00:00', 6, 0, 'Kepala Bidang', 7, 'ob', 5000000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(9, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:23:58', '', '0000-00-00 00:00:00', 6, 0, 'Kepala Seksi', 9, 'ob', 4000000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(10, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:24:13', '', '0000-00-00 00:00:00', 6, 0, 'Staff', 12, 'ob', 2500000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(11, 2020, 1, 1, 1, 5, 1, 24, '', '', '2', '2016-07-17 01:40:16', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '2', '', 'Dana Alokasi Umum'),
(12, 2020, 1, 1, 1, 5, 2, 24, '', '', '2', '2016-07-17 01:40:16', '', '0000-00-00 00:00:00', 11, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(13, 2020, 1, 1, 1, 5, 3, 24, '', '', '2', '2016-07-17 01:40:16', '', '0000-00-00 00:00:00', 12, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(14, 2020, 1, 1, 1, 5, 4, 24, '', '', '2', '2016-07-17 01:40:16', '', '0000-00-00 00:00:00', 13, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(15, 2020, 1, 1, 1, 5, 6, 24, '', '', '2', '2016-07-17 01:40:16', '', '0000-00-00 00:00:00', 14, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(16, 2020, 1, 1, 1, 5, 6, 24, '', 'asd', '2', '2016-07-17 01:40:22', '', '0000-00-00 00:00:00', 15, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(17, 2020, 1, 1, 1, 5, 6, 24, '', '', '2', '2016-07-17 01:40:34', '', '0000-00-00 00:00:00', 16, 0, 'asd', 12, 'km', 12000000, 'item', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(18, 2020, 1, 1, 1, 5, 6, 24, '', '', '2', '2016-07-18 18:37:17', '', '0000-00-00 00:00:00', 16, 0, 'asdasd', 12, 'asd', 250000, 'item', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(19, 2020, 1, 1, 1, 5, 6, 24, '', '', '2', '2016-07-18 19:26:14', '', '0000-00-00 00:00:00', 16, 0, 'asd', 2, 'sd', 1312313, 'item', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum');

-- --------------------------------------------------------

--
-- Table structure for table `dpa_perubahan`
--

CREATE TABLE IF NOT EXISTS `dpa_perubahan` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `id_rekening_belanja` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `sub_uraian` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL,
  `item` text NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `level` enum('parent1','parent2','parent3','parent4','uraian','sub uraian','item') NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Terima','Tolak') NOT NULL DEFAULT 'Terima',
  `capaian_program` text NOT NULL,
  `target_capaian_program` text NOT NULL,
  `masukan` text NOT NULL,
  `target_masukan` text NOT NULL,
  `keluaran` text NOT NULL,
  `target_keluaran` text NOT NULL,
  `hasil` text NOT NULL,
  `target_hasil` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `sumber_dana` text NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `jenis_sumber_dana` varchar(111) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dpa_perubahan`
--

INSERT INTO `dpa_perubahan` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `id_rekening_belanja`, `skpd`, `uraian`, `sub_uraian`, `created_by`, `created_date`, `mod_by`, `mod_date`, `parent_id`, `parentCategory`, `item`, `volume`, `satuan`, `harga_satuan`, `level`, `status_verifikasi`, `capaian_program`, `target_capaian_program`, `masukan`, `target_masukan`, `keluaran`, `target_keluaran`, `hasil`, `target_hasil`, `sasaran_kegiatan`, `sumber_dana`, `lokasi_kegiatan`, `jenis_sumber_dana`) VALUES
(1, 2020, 1, 1, 1, 1, 1, 24, '', '', '2', '2016-07-17 01:39:06', '2', '2016-07-17 02:34:49', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '2', '', 'Dana Alokasi Umum'),
(2, 2020, 1, 1, 1, 1, 2, 24, '', '', '2', '2016-07-17 01:39:06', '', '0000-00-00 00:00:00', 1, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(3, 2020, 1, 1, 1, 1, 3, 24, '', '', '2', '2016-07-17 01:39:06', '', '0000-00-00 00:00:00', 2, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(4, 2020, 1, 1, 1, 1, 4, 24, '', '', '2', '2016-07-17 01:39:06', '', '0000-00-00 00:00:00', 3, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(5, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:39:06', '', '0000-00-00 00:00:00', 4, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(6, 2020, 1, 1, 1, 1, 8, 24, '', 'gaji', '2', '2016-07-17 01:39:18', '', '0000-00-00 00:00:00', 5, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(7, 2020, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-17 01:39:39', '', '0000-00-00 00:00:00', 6, 0, 'staff', 12, 'ob', 3000000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Umum'),
(8, 2020, 1, 1, 1, 6, 1, 24, '', '', '2', '2016-07-18 22:12:17', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '3', '', 'Dana Alokasi Khusus'),
(9, 2020, 1, 1, 1, 6, 2, 24, '', '', '2', '2016-07-18 22:12:17', '', '0000-00-00 00:00:00', 8, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(10, 2020, 1, 1, 1, 6, 3, 24, '', '', '2', '2016-07-18 22:12:17', '', '0000-00-00 00:00:00', 9, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(11, 2020, 1, 1, 1, 6, 4, 24, '', '', '2', '2016-07-18 22:12:17', '', '0000-00-00 00:00:00', 10, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(12, 2020, 1, 1, 1, 6, 15, 24, '', '', '2', '2016-07-18 22:12:17', '', '0000-00-00 00:00:00', 11, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(13, 2020, 1, 1, 1, 6, 15, 24, '', 'asadad', '2', '2016-07-18 22:12:43', '', '0000-00-00 00:00:00', 12, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus'),
(14, 2020, 1, 1, 1, 6, 15, 24, '', '', '2', '2016-07-18 22:12:57', '', '0000-00-00 00:00:00', 13, 0, 'asd', 12, 'ad', 10000000, 'item', 'Belum Verifikasi', '', '', '', '', '', '', '', '', '', '', '', 'Dana Alokasi Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_renja`
--

CREATE TABLE IF NOT EXISTS `evaluasi_renja` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kesesuaian` enum('Ya','Tidak') NOT NULL,
  `evaluasi` text NOT NULL,
  `tindak_lanjut` text NOT NULL,
  `hasil_tindak_lanjut` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_renja`
--

INSERT INTO `evaluasi_renja` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `tahun`, `kesesuaian`, `evaluasi`, `tindak_lanjut`, `hasil_tindak_lanjut`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(1, 1, 1, 1, 6, 24, 2020, 'Ya', '', '', '', '2', '2016-07-16 16:39:46', '', '0000-00-00 00:00:00'),
(2, 1, 1, 1, 6, 27, 2020, 'Tidak', 'asd', 'asd', 'asda', '2', '2016-07-16 16:47:23', '', '0000-00-00 00:00:00'),
(3, 1, 1, 1, 5, 24, 2020, 'Ya', '', '', '', '2', '2016-07-17 22:43:04', '', '0000-00-00 00:00:00'),
(4, 1, 1, 1, 1, 24, 2017, 'Ya', '', '', '', '2', '2016-07-27 11:01:42', '', '0000-00-00 00:00:00'),
(5, 1, 1, 1, 5, 24, 2017, 'Ya', '', '', '', '2', '2016-07-27 11:02:44', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_renstra`
--

CREATE TABLE IF NOT EXISTS `evaluasi_renstra` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `realisasi_target_tahun1` varchar(111) NOT NULL,
  `realisasi_anggaran_tahun1` bigint(20) NOT NULL,
  `realisasi_target_tahun2` varchar(111) NOT NULL,
  `realisasi_anggaran_tahun2` bigint(20) NOT NULL,
  `realisasi_target_tahun3` varchar(111) NOT NULL,
  `realisasi_anggaran_tahun3` bigint(20) NOT NULL,
  `realisasi_target_tahun4` varchar(111) NOT NULL,
  `realisasi_anggaran_tahun4` bigint(20) NOT NULL,
  `realisasi_target_tahun5` varchar(111) NOT NULL,
  `realisasi_anggaran_tahun5` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_renstra`
--

INSERT INTO `evaluasi_renstra` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `tahun`, `realisasi_target_tahun1`, `realisasi_anggaran_tahun1`, `realisasi_target_tahun2`, `realisasi_anggaran_tahun2`, `realisasi_target_tahun3`, `realisasi_anggaran_tahun3`, `realisasi_target_tahun4`, `realisasi_anggaran_tahun4`, `realisasi_target_tahun5`, `realisasi_anggaran_tahun5`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(1, 1, 1, 1, 6, 24, 2020, '100', 1000000000, '100', 0, '100', 0, '100', 0, '100', 0, '2', '2016-07-16 16:40:50', '', '0000-00-00 00:00:00'),
(2, 1, 1, 1, 1, 24, 2017, '', 0, '', 0, '', 0, '', 0, '', 0, '2', '2016-07-27 10:57:43', '', '0000-00-00 00:00:00'),
(3, 1, 1, 1, 1, 10, 2017, '', 0, '', 0, '', 0, '', 0, '', 0, '2', '2016-07-27 10:59:21', '', '0000-00-00 00:00:00'),
(4, 1, 1, 51, 9, 24, 2020, '', 0, '', 0, '', 0, '', 0, '', 0, '2', '2016-08-12 08:29:42', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_rkpd`
--

CREATE TABLE IF NOT EXISTS `evaluasi_rkpd` (
  `id` bigint(20) NOT NULL,
  `skpd` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `urusan` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `sasaran` varchar(255) NOT NULL,
  `indikator_kinerja_program` varchar(255) NOT NULL,
  `indikator_keluaran_kegiatan` varchar(255) NOT NULL,
  `target_rpjmd_k` bigint(255) NOT NULL DEFAULT '0',
  `target_rpjmd_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rpjmd1_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rpjmd1_rp` bigint(255) NOT NULL DEFAULT '0',
  `target_kinerja_rkpd_k` bigint(255) NOT NULL DEFAULT '0',
  `target_kinerja_rkpd_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_1_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_1_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_2_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_2_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_3_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_3_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_4_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_kinerja_triwulan_4_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rkpd_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rkpd_rp` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rpjmd_k` bigint(255) NOT NULL DEFAULT '0',
  `realisasi_capaian_kinerja_rpjmd_rp` bigint(255) NOT NULL DEFAULT '0',
  `target_capaian_kinerja_dan_realisasi_rpjmd_k` bigint(255) NOT NULL DEFAULT '0',
  `target_capaian_kinerja_dan_realisasi_rpjmd_rp` bigint(255) NOT NULL DEFAULT '0',
  `tahun_anggaran` varchar(255) NOT NULL,
  `triwulan` enum('Triwulan I','Triwulan II','Triwulan III','Triwulan IV') NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `modified_date` datetime NOT NULL,
  `satuan_kinerja` varchar(111) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluasi_rkpd`
--

INSERT INTO `evaluasi_rkpd` (`id`, `skpd`, `kode`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `indikator_kinerja_program`, `indikator_keluaran_kegiatan`, `target_rpjmd_k`, `target_rpjmd_rp`, `realisasi_capaian_kinerja_rpjmd1_k`, `realisasi_capaian_kinerja_rpjmd1_rp`, `target_kinerja_rkpd_k`, `target_kinerja_rkpd_rp`, `realisasi_kinerja_triwulan_1_k`, `realisasi_kinerja_triwulan_1_rp`, `realisasi_kinerja_triwulan_2_k`, `realisasi_kinerja_triwulan_2_rp`, `realisasi_kinerja_triwulan_3_k`, `realisasi_kinerja_triwulan_3_rp`, `realisasi_kinerja_triwulan_4_k`, `realisasi_kinerja_triwulan_4_rp`, `realisasi_capaian_kinerja_rkpd_k`, `realisasi_capaian_kinerja_rkpd_rp`, `realisasi_capaian_kinerja_rpjmd_k`, `realisasi_capaian_kinerja_rpjmd_rp`, `target_capaian_kinerja_dan_realisasi_rpjmd_k`, `target_capaian_kinerja_dan_realisasi_rpjmd_rp`, `tahun_anggaran`, `triwulan`, `created_by`, `created_date`, `modified_by`, `modified_date`, `satuan_kinerja`) VALUES
(2, 24, '', '1', '1', '1', '5', '', 'mantap', 'horas', 0, 0, 0, 0, 210, 120000000, 2, 20000000, 1, 0, 3, 0, 1, 0, 7, 0, 0, 0, 0, 0, '2017', 'Triwulan I', '2', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'perda'),
(3, 24, '', '1', '1', '1', '6', '', '', '', 0, 0, 0, 0, 130, 100000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017', 'Triwulan I', '2', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 24, '', '1', '1', '1', '1', '', 'outcome', 'output', 0, 0, 0, 0, 12, 20000000, 5, 500000000, 4, 20000000, 3, 20000000, 5, 20000000, 17, 560000000, 0, 0, 0, 0, '2017', 'Triwulan I', '2', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'perda'),
(24, 24, '', '1', '1', '2', '2', '', '', '', 0, 0, 0, 0, 210, 100000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017', 'Triwulan I', '3', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(26, 24, '', '1', '1', '1', '1', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020', 'Triwulan I', '2', '2016-07-28 18:21:51', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `form2_laporan_kemajuan_sumber_dana_dak`
--

CREATE TABLE IF NOT EXISTS `form2_laporan_kemajuan_sumber_dana_dak` (
  `id` bigint(20) NOT NULL,
  `urusan` varchar(255) NOT NULL,
  `skpd` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `pmk` text NOT NULL,
  `tgl_pmk` date NOT NULL,
  `juknis` text NOT NULL,
  `tgl_juknis` date NOT NULL,
  `penyusunan_rencana_kerja` text NOT NULL,
  `tgl_penyusunan_rencana_kerja` date NOT NULL,
  `penetapan_dpa` text NOT NULL,
  `tgl_penetapan_dpa` date NOT NULL,
  `sk_penetapan_pelaksanaan_kegiatan` text NOT NULL,
  `tgl_sk_penetapan_pelaksanaan_kegiatan` date NOT NULL,
  `tgl_pelaksanaan_tender` date NOT NULL,
  `pelaksanaan_tender` text NOT NULL,
  `persiapan_pekerjaan_swakelola` text NOT NULL,
  `tgl_persiapan_pekerjaan_swakelola` date NOT NULL,
  `pelaksanaan_pekerjaan_kontrak` text NOT NULL,
  `tgl_pelaksanaan_pekerjaan_kontrak` date NOT NULL,
  `pelaksanaan_pekerjaan_swakelola` text NOT NULL,
  `tgl_pelaksanaan_pekerjaan_swakelola` date NOT NULL,
  `penerbitan_spp` text NOT NULL,
  `tgl_penerbitan_spp` date NOT NULL,
  `penerbitan_spm` text NOT NULL,
  `tgl_penerbitan_spm` date NOT NULL,
  `penerbitan_sp2d` text NOT NULL,
  `tgl_penerbitan_sp2d` date NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `bulan` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(255) NOT NULL,
  `mod_date` datetime NOT NULL,
  `is_perubahan` int(11) NOT NULL,
  `id_dpa` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form2_laporan_kemajuan_sumber_dana_dak`
--

INSERT INTO `form2_laporan_kemajuan_sumber_dana_dak` (`id`, `urusan`, `skpd`, `bidang`, `program`, `kegiatan`, `pmk`, `tgl_pmk`, `juknis`, `tgl_juknis`, `penyusunan_rencana_kerja`, `tgl_penyusunan_rencana_kerja`, `penetapan_dpa`, `tgl_penetapan_dpa`, `sk_penetapan_pelaksanaan_kegiatan`, `tgl_sk_penetapan_pelaksanaan_kegiatan`, `tgl_pelaksanaan_tender`, `pelaksanaan_tender`, `persiapan_pekerjaan_swakelola`, `tgl_persiapan_pekerjaan_swakelola`, `pelaksanaan_pekerjaan_kontrak`, `tgl_pelaksanaan_pekerjaan_kontrak`, `pelaksanaan_pekerjaan_swakelola`, `tgl_pelaksanaan_pekerjaan_swakelola`, `penerbitan_spp`, `tgl_penerbitan_spp`, `penerbitan_spm`, `tgl_penerbitan_spm`, `penerbitan_sp2d`, `tgl_penerbitan_sp2d`, `tahun`, `bulan`, `created_by`, `created_date`, `mod_by`, `mod_date`, `is_perubahan`, `id_dpa`) VALUES
(1, '1', '24', '1', 1, 1, 'asdasd', '2016-07-19', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '2016-07-18', '', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '', '2016-07-18', '2020', 0, '2', '2016-07-18 21:45:28', '', '0000-00-00 00:00:00', 0, 7),
(2, '1', '24', '1', 1, 1, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '2020', 0, '2', '2016-07-18 22:11:44', '', '0000-00-00 00:00:00', 0, 8),
(3, '1', '24', '1', 1, 6, '', '2016-07-18', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '2020', 0, '2', '2016-07-18 22:16:02', '', '0000-00-00 00:00:00', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `forum_konsultasi_publik`
--

CREATE TABLE IF NOT EXISTS `forum_konsultasi_publik` (
  `id` bigint(20) NOT NULL DEFAULT '0',
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `indikator_kinerja` text NOT NULL COMMENT 'Indikator Kinerja Program/Kegiatan',
  `sasaran_kegiatan` text NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `target_capaian_kinerja` text NOT NULL,
  `kebutuhan_dana` bigint(20) NOT NULL COMMENT ' Kebutuhan Dana/ Pagu Indikatif ',
  `sumber_dana` int(11) NOT NULL,
  `catatan_penting` text NOT NULL,
  `target_capaian_kinerja_a2` text NOT NULL,
  `kebutuhan_dana_a2` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `sumber_usulan` enum('Renstra','Bukan Renstra') NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Diizinkan','Tidak Diizinkan') NOT NULL,
  `keterangan` text NOT NULL,
  `alasan_tolak_renja` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` bigint(20) NOT NULL,
  `jenis_musrenbang` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE IF NOT EXISTS `jenis_kegiatan` (
  `id` int(11) NOT NULL,
  `jenis_kegiatan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `jenis_kegiatan`) VALUES
(1, 'Kegiatan Baru'),
(2, 'Kegiatan Lanjutan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `kecamatan`) VALUES
(1, 'Siantar Marihat'),
(2, 'Siantar Barat'),
(3, 'Siantar Martoba'),
(4, 'Siantar Utara'),
(5, 'Siantar Timur'),
(6, 'Siantar Selatan'),
(7, 'Siantar Sitalasari'),
(8, 'Siantar Marimbun');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` bigint(20) NOT NULL,
  `program` bigint(20) NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `program`, `kode_kegiatan`, `kegiatan`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(12, 51, '03', 'Penyediaan jasa perbaikan peralatan kerja', '2', '2016-08-01 15:48:37', '', '0000-00-00 00:00:00'),
(11, 51, '03', 'Penyediaan jasa perbaikan peralatan kerja', '2', '2016-08-01 15:36:17', '', '0000-00-00 00:00:00'),
(10, 51, '02', 'Penyediaan Jasa Komunikasi, sumber daya air dan listrik', '2', '2016-08-01 15:35:53', '', '0000-00-00 00:00:00'),
(9, 51, '01', 'Penyediaan Jasa Surat Menyurat', '2', '2016-08-01 15:35:19', '', '0000-00-00 00:00:00'),
(13, 51, '04', 'Penyediaan alat tulis kantor', '2', '2016-08-01 15:48:52', '', '0000-00-00 00:00:00'),
(14, 51, '05', 'Penyediaan barang cetakan dan penggandaan ', '2', '2016-08-01 15:49:37', '', '0000-00-00 00:00:00'),
(15, 52, '01', 'Pengadaan peralatan gedung kantor', '2', '2016-08-01 15:50:50', '', '0000-00-00 00:00:00'),
(16, 52, '03', 'Rehab sedang/berat gedung kantor', '2', '2016-08-01 15:51:33', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_musrenbang_kecamatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan_musrenbang_kecamatan` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kunci` tinyint(4) NOT NULL DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_tahun_1` bigint(20) NOT NULL,
  `pagu_tahun_2` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status` varchar(155) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_musrenbang_kecamatan`
--

INSERT INTO `kegiatan_musrenbang_kecamatan` (`id`, `kd_skpd`, `kd_urusan`, `kd_bidang`, `kd_kegiatan`, `tahun`, `kunci`, `sasaran_daerah`, `prioritas_daerah`, `sasaran_kegiatan`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`, `uraian`, `kecamatan`, `kelurahan`, `volume`, `satuan`, `pagu_tahun_1`, `pagu_tahun_2`, `sumber_dana`, `urutan`, `sumber_usulan`, `status`, `status_forum_skpd`, `keterangan_forum_skpd`, `foto`, `kd_prog`, `latitude`, `longitude`) VALUES
(20, 24, 1, 20, 9, 2017, 1, '3', '3', '-', '', '2016-08-01 16:00:31', '2', '2016-08-17 19:49:04', '2', 'Menyediakan jasa surat menyurat', 1, 17, '23', 'eksemplar', 5633333, 7500000, 3, '', 'Musrenbang Desa', 'lanjut', 'Terima', '', '', 51, '', ''),
(21, 25, 1, 20, 11, 2017, 0, '3', '4', '-', '', '2016-08-01 16:10:04', '2', '2016-08-17 19:49:44', '2', '-', 3, 3, '45', 'kg', 45777777, 50000000, 3, '', 'Musrenbang Kecamatan', '', 'Terima', '', '', 51, '', ''),
(22, 24, 1, 20, 9, 2017, 1, '1', '4', '-', '', '2016-08-02 04:14:17', '2', '2016-08-17 19:49:26', '2', 'aasd', 1, 39, '12', 'kubik', 212000000, 300000000, 3, '', 'Musrenbang Desa', '', 'Terima', '', '', 51, '', ''),
(23, 24, 1, 20, 16, 2017, 1, '2', '3', '-', '', '2016-08-02 04:15:26', '2', '0000-00-00 00:00:00', '', '-', 4, 21, '11', 'kubik', 455000000, 500000000, 2, '', 'Musrenbang Desa', '', 'Terima', '', 'jalanrusak.jpg', 52, '', ''),
(24, 25, 1, 20, 11, 2017, 1, '4', '3', '-', '', '2016-08-02 04:17:30', '2', '0000-00-00 00:00:00', '', '-', 7, 44, '56', 'fgh', 45343450, 50000000, 1, '', 'Musrenbang Desa', '', 'Terima', '', 'jalan-rusak.jpg', 51, '', ''),
(25, 24, 1, 20, 9, 2017, 1, '1', '3', '-', '', '2016-08-03 07:56:41', '2', '2016-08-17 19:49:52', '2', '-', 2, 0, '34', 'df', 67000000, 70000000, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(26, 24, 1, 20, 9, 2017, 1, '4', '5', '-', '', '2016-08-03 07:59:43', '2', '0000-00-00 00:00:00', '', '-', 1, 0, '12', 'sd', 44400000, 50000000, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(27, 25, 1, 20, 9, 2017, 1, '3', '3', '-', '', '2016-08-03 08:01:06', '2', '0000-00-00 00:00:00', '', '-', 4, 3, '45', 'sd', 100000000, 150000000, 3, '', 'Musrenbang Desa', '', 'Terima', '', '', 51, '', ''),
(28, 24, 1, 20, 15, 2017, 1, '1', '4', '-', '', '2016-08-03 08:24:38', '2', '0000-00-00 00:00:00', '', '-', 1, 40, '45', 'sd', 23000000, 70000000, 1, '', 'Musrenbang Desa', '', 'Terima', '', '', 52, '', ''),
(29, 24, 1, 20, 10, 2017, 1, '1', '3', '-', '', '2016-08-03 10:32:15', '2', '2016-08-17 19:50:04', '2', '-', 1, 39, '12', 'km', 125000000, 250000000, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(30, 24, 1, 20, 13, 2017, 0, '1', '3', 'asd', '', '2016-08-10 18:50:09', '2', '0000-00-00 00:00:00', '', 'asd', 2, 49, '12', 'sf', 646456757, 789898796, 3, '', 'Musrenbang Kecamatan', '', 'Terima', '', 'jalanrusak.jpg', 51, '', ''),
(31, 25, 1, 20, 10, 2017, 1, '1', '4', 'asd', '', '2016-08-18 01:40:21', '2', '0000-00-00 00:00:00', '', 'aaa', 1, 40, '12', '234f', 464, 464, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(32, 25, 1, 20, 11, 2017, 1, '4', '3', 'asd', '', '2016-08-18 01:44:15', '2', '0000-00-00 00:00:00', '', 'aaa', 3, 22, '12', 'asd', 123, 1244, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(33, 25, 1, 20, 9, 2017, 1, '4', '5', 'asd', '', '2016-08-18 01:49:31', '2', '0000-00-00 00:00:00', '', 'aaa', 5, 9, '455', 'ggh', 6767, 7878, 2, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(34, 24, 1, 20, 16, 2017, 1, '2', '5', 'asd', '', '2016-08-18 01:51:05', '2', '0000-00-00 00:00:00', '', 'asd', 5, 10, '111', 'aaaa', 3333333333, 455555555, 2, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', ''),
(35, 24, 1, 20, 15, 2017, 1, '1', '3', 'assaa', '', '2016-08-18 01:53:37', '2', '0000-00-00 00:00:00', '', 'aaa', 7, 19, '56', 'fghfg', 678678, 6786866, 1, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', ''),
(36, 24, 1, 20, 12, 2017, 1, '3', '3', 'dsf', '', '2016-08-18 02:00:37', '2', '0000-00-00 00:00:00', '', 'assaas', 3, 22, '565', 'vb', 8799780, 89089089, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(37, 25, 1, 20, 12, 2017, 1, '4', '3', 'aaa', '', '2016-08-18 02:10:27', '2', '0000-00-00 00:00:00', '', 'aaaa', 4, 4, '44', 'swd', 678787, 78788778, 1, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 51, '', ''),
(38, 24, 1, 20, 16, 2017, 1, '1', '3', '78hjh', '', '2016-08-18 02:14:37', '2', '0000-00-00 00:00:00', '', 'tyty', 2, 51, '676', 'hjkh', 87789, 79878, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', ''),
(39, 24, 1, 20, 15, 2017, 1, '4', '3', 'ujh', '', '2016-08-18 02:17:13', '2', '0000-00-00 00:00:00', '', 'hbjgfh', 3, 23, '67', '789gh', 6768, 67867, 2, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', ''),
(40, 24, 1, 20, 15, 2017, 1, '4', '5', 'ass', '', '2016-08-18 02:20:05', '2', '0000-00-00 00:00:00', '', 'asas', 3, 25, '567', 'cfgh', 67869, 78990, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', ''),
(41, 24, 1, 20, 16, 2017, 1, '3', '3', 'awer', '', '2016-08-22 17:25:26', '2', '0000-00-00 00:00:00', '', 'asd', 1, 40, '34', 'dsf', 5675678, 6786789, 3, '', 'Musrenbang Kelurahan', '', 'Terima', '', '', 52, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_musrenbang_kelurahan`
--

CREATE TABLE IF NOT EXISTS `kegiatan_musrenbang_kelurahan` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kunci` tinyint(4) NOT NULL DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_tahun_1` bigint(20) NOT NULL,
  `pagu_tahun_2` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status` varchar(155) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_musrenbang_kelurahan`
--

INSERT INTO `kegiatan_musrenbang_kelurahan` (`id`, `kd_skpd`, `kd_urusan`, `kd_bidang`, `kd_prog`, `kd_kegiatan`, `tahun`, `kunci`, `sasaran_daerah`, `prioritas_daerah`, `sasaran_kegiatan`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`, `uraian`, `kecamatan`, `kelurahan`, `volume`, `satuan`, `pagu_tahun_1`, `pagu_tahun_2`, `sumber_dana`, `urutan`, `sumber_usulan`, `status`, `status_forum_skpd`, `keterangan_forum_skpd`, `foto`, `latitude`, `longitude`) VALUES
(1, 24, 1, 20, 51, 10, 2017, 0, '1', '3', '-', '', '2016-08-03 10:32:15', '2', '0000-00-00 00:00:00', '', '-', 1, 39, '12', 'km', 125000000, 250000000, 3, '', '', '', 'Terima', '', 'jalanrusak.jpg', '', ''),
(2, 24, 1, 20, 51, 10, 2016, 0, '1', '', 'asd', '', '2016-08-17 19:09:20', '2', '0000-00-00 00:00:00', '', 'asd', 1, 39, '123', 'asd', 12234324345, 345343343335, 3, '', '', '', 'Terima', '', '', '', ''),
(3, 25, 1, 20, 51, 10, 2017, 0, '1', '4', 'asd', '', '2016-08-18 01:40:20', '2', '0000-00-00 00:00:00', '', 'aaa', 1, 40, '12', '234f', 464, 464, 3, '', '', '', 'Terima', '', '', '', ''),
(4, 25, 1, 20, 51, 11, 2017, 0, '4', '3', 'asd', '', '2016-08-18 01:44:09', '2', '0000-00-00 00:00:00', '', 'aaa', 3, 22, '12', 'asd', 123, 1244, 3, '', '', '', 'Terima', '', '', '', ''),
(5, 25, 1, 20, 51, 9, 2017, 0, '4', '5', 'asd', '', '2016-08-18 01:49:30', '2', '0000-00-00 00:00:00', '', 'aaa', 5, 9, '455', 'ggh', 6767, 7878, 2, '', '', '', 'Terima', '', '', '', ''),
(6, 24, 1, 20, 52, 16, 2017, 0, '2', '5', 'asd', '', '2016-08-18 01:50:56', '2', '0000-00-00 00:00:00', '', 'asd', 5, 10, '111', 'aaaa', 3333333333, 455555555, 2, '', '', '', 'Terima', '', '', '', ''),
(7, 24, 1, 20, 52, 15, 2017, 0, '1', '3', 'assaa', '', '2016-08-18 01:53:21', '2', '0000-00-00 00:00:00', '', 'aaa', 7, 19, '56', 'fghfg', 678678, 6786866, 1, '', '', '', 'Terima', '', '', '', ''),
(8, 24, 1, 20, 51, 12, 2017, 0, '3', '3', 'dsf', '', '2016-08-18 02:00:14', '2', '0000-00-00 00:00:00', '', 'assaas', 3, 22, '565', 'vb', 8799780, 89089089, 3, '', '', '', 'Terima', '', '', '', ''),
(9, 25, 1, 20, 51, 12, 2017, 0, '4', '3', 'aaa', '', '2016-08-18 02:09:59', '2', '0000-00-00 00:00:00', '', 'aaaa', 4, 4, '44', 'swd', 678787, 78788778, 1, '', '', '', 'Terima', '', '', '', ''),
(10, 24, 1, 20, 52, 16, 2017, 0, '1', '3', '78hjh', '', '2016-08-18 02:14:30', '2', '0000-00-00 00:00:00', '', 'tyty', 2, 51, '676', 'hjkh', 87789, 79878, 3, '', '', '', 'Terima', '', '', '', ''),
(11, 24, 1, 20, 52, 15, 2017, 0, '4', '3', 'ujh', '', '2016-08-18 02:17:11', '2', '0000-00-00 00:00:00', '', 'hbjgfh', 3, 23, '67', '789gh', 6768, 67867, 2, '', '', '', 'Terima', '', '', '', ''),
(12, 24, 1, 20, 52, 15, 2017, 0, '4', '5', 'ass', '', '2016-08-18 02:20:03', '2', '0000-00-00 00:00:00', '', 'asas', 3, 25, '567', 'cfgh', 67869, 78990, 3, '', '', '', 'Terima', '', 'tujuan.PNG', '', ''),
(13, 24, 1, 20, 52, 16, 2017, 0, '3', '3', 'awer', '', '2016-08-22 17:25:25', '2', '0000-00-00 00:00:00', '', 'asd', 1, 40, '34', 'dsf', 5675678, 6786789, 3, '', '', '', 'Terima', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_musrenbang_kota`
--

CREATE TABLE IF NOT EXISTS `kegiatan_musrenbang_kota` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) DEFAULT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) DEFAULT '0',
  `kunci` tinyint(4) DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_indikatif` bigint(20) NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_program` varchar(111) NOT NULL,
  `target_hasil_program` varchar(111) NOT NULL,
  `tolak_ukur_keluaran_kegiatan` varchar(111) NOT NULL,
  `target_keluaran_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_kegiatan` varchar(111) NOT NULL,
  `target_hasil_kegiatan` varchar(111) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status_usulan` enum('Terima','Tolak') NOT NULL,
  `keterangan_status_usulan` text NOT NULL,
  `id_musrenbang_kecamatan` int(11) NOT NULL,
  `id_renja` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_musrenbang_kota`
--

INSERT INTO `kegiatan_musrenbang_kota` (`id`, `kd_skpd`, `kd_urusan`, `kd_bidang`, `kd_prog`, `kd_kegiatan`, `tahun`, `kunci`, `sasaran_daerah`, `prioritas_daerah`, `sasaran_kegiatan`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`, `uraian`, `kecamatan`, `kelurahan`, `volume`, `satuan`, `pagu_indikatif`, `pagu_prakiraan_maju`, `sumber_dana`, `urutan`, `jenis_kegiatan`, `tolak_ukur_hasil_program`, `target_hasil_program`, `tolak_ukur_keluaran_kegiatan`, `target_keluaran_kegiatan`, `tolak_ukur_hasil_kegiatan`, `target_hasil_kegiatan`, `sumber_usulan`, `status_usulan`, `keterangan_status_usulan`, `id_musrenbang_kecamatan`, `id_renja`, `foto`, `latitude`, `longitude`) VALUES
(2, 25, 1, 20, 51, 11, 2017, 1, '3', '4', '-', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '-', 3, 3, '45', 'kg', 45777777, 50000000, 3, '', '', '', '', '', '', '', '', 'Musrenbang Kecamatan', 'Terima', '', 21, 0, '', '', ''),
(6, 24, 1, 20, 51, 9, 2017, 1, '1', '3', '-', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '-', 2, 0, '34', 'df', 67000000, 70000000, 3, '', '', '', '', '', '', '', '', 'Musrenbang Kelurahan', 'Terima', '', 25, 0, '', '', ''),
(7, 24, 1, 20, 51, 9, 2017, 1, '4', '5', '-', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '-', 1, 0, '12', 'sd', 44400000, 50000000, 3, '', '', '', '', '', '', '', '', 'Musrenbang Kelurahan', 'Terima', '', 26, 0, '', '', ''),
(10, 24, 1, 20, 51, 10, 2017, 1, '1', '3', '-', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '-', 1, 39, '12', 'km', 125000000, 250000000, 3, '', '', '', '', '', '', '', '', 'Musrenbang Kelurahan', 'Terima', '', 29, 0, '', '', ''),
(11, 25, 1, 1, 1, 5, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 1, '12', 'km', 1231232, 0, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 1, '', '', ''),
(12, 25, 1, 1, 2, 3, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 1, '12', 'km', 50000000, 50000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 2, '', '', ''),
(13, 24, 1, 1, 1, 5, 2017, 1, '1', '3', 'sdf', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 1, '12', 'km', 150000000, 0, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 3, '', '', ''),
(14, 24, 1, 1, 1, 1, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 0, 0, '12', 'km', 250000000, 100000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 4, '', '', ''),
(15, 24, 1, 1, 2, 2, 2017, 1, '1', '3', 'Sasaran Kegiatan *', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 1, '12', 'km', 150000000, 120000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 5, '', '', ''),
(16, 24, 1, 1, 2, 2, 2017, 1, '1', '3', 'Sasaran Kegiatan *', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 1, '12', 'km', 150000000, 120000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 6, '', '', ''),
(17, 24, 1, 1, 1, 6, 2017, 1, '1', '3', 'asdas', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 1, 0, '12', 'km', 21500000, 14500000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 7, '', '', ''),
(18, 24, 1, 1, 1, 6, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 0, 0, '12', 'km', 17900000, 125000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 8, '', '', ''),
(19, 24, 1, 1, 1, 6, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 0, 0, '12', 'km', 17900000, 125000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 9, '', '', ''),
(20, 24, 1, 1, 1, 6, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 0, 0, '12', 'km', 17900000, 125000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 10, '', '', ''),
(21, 24, 1, 1, 1, 5, 2017, 1, '1', '3', 'asd', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', 'Pembuatan gorong-gorong Desa sitio tio', 0, 0, '12', 'km', 123123123123, 0, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 11, '', '', ''),
(22, 24, 1, 1, 1, 1, 2017, 1, '1', '3', 'asdas', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', 'sad', 1, 1, '12', 'km', 123000000, 240000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 12, '', '', ''),
(23, 24, 1, 1, 2, 2, 2017, 1, '1', '3', '', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 0, 0, '12', 'km', 780000000, 0, 2, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 19, '', '', ''),
(24, 24, 1, 20, 51, 9, 2017, 1, '1', '3', '', '', '2016-08-05 16:26:48', 'admin', '0000-00-00 00:00:00', '', '', 5, 13, '12', 'km', 450000000, 450000000, 3, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 29, 24, '', '', ''),
(26, 24, 1, 20, 51, 13, 2017, 1, '1', '3', 'asd', '', '2016-08-17 19:47:52', 'admin', '0000-00-00 00:00:00', '', 'asd', 2, 49, '12', 'sf', 646456757, 789898796, 3, '', '', '', '', '', '', '', '', 'Musrenbang Kecamatan', 'Terima', '', 30, 0, '', '', ''),
(27, 24, 1, 20, 51, 9, 2017, 1, '1', '3', '', '', '2016-08-17 19:47:53', 'admin', '0000-00-00 00:00:00', '', '', 1, 43, '12', 'sf', 200000000, 250000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 30, 25, '', '', ''),
(28, 24, 1, 20, 51, 9, 2017, 1, '1', '3', '', '', '2016-08-17 19:47:53', 'admin', '0000-00-00 00:00:00', '', '', 1, 40, '12', 'sf', 250000000, 300000000, 1, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 30, 26, '', '', ''),
(29, 24, 1, 20, 51, 9, 2017, 1, '1', '3', '', '', '2016-08-17 19:47:53', 'admin', '0000-00-00 00:00:00', '', '', 2, 48, '12', 'sf', 121, 453, 3, '', '', '', '', '', '', '', '', 'Renja', 'Terima', '', 30, 27, '', '', ''),
(30, 24, 1, 20, 52, 15, 2017, 1, '1', '3', 'aasd', '', '2016-08-18 09:25:48', '2', '0000-00-00 00:00:00', '', 'asd', 3, 22, '45', 'dfgds', 6768, 8568, 1, '', '', '', '', '', '', '', '', 'Pokok Pikiran Dprd', 'Terima', '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_rpjmd`
--

CREATE TABLE IF NOT EXISTS `kegiatan_rpjmd` (
  `id` bigint(100) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `indikator_kinerja` text NOT NULL,
  `kondisi_kinerja_awal` varchar(255) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `id_musrenbang_rpjmd` int(11) NOT NULL,
  `target_tahun1` bigint(20) NOT NULL,
  `dana_tahun1` bigint(20) NOT NULL,
  `target_tahun2` bigint(20) NOT NULL,
  `dana_tahun2` bigint(20) NOT NULL,
  `target_tahun3` bigint(20) NOT NULL,
  `dana_tahun3` bigint(20) NOT NULL,
  `target_tahun4` bigint(20) NOT NULL,
  `dana_tahun4` bigint(20) NOT NULL,
  `target_tahun5` bigint(20) NOT NULL,
  `dana_tahun5` bigint(20) NOT NULL,
  `target_akhir` bigint(20) NOT NULL,
  `dana_akhir` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(111) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(111) NOT NULL,
  `satuan_target_kinerja` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_rpjmd`
--

INSERT INTO `kegiatan_rpjmd` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `indikator_kinerja`, `kondisi_kinerja_awal`, `id_rpjmd`, `id_musrenbang_rpjmd`, `target_tahun1`, `dana_tahun1`, `target_tahun2`, `dana_tahun2`, `target_tahun3`, `dana_tahun3`, `target_tahun4`, `dana_tahun4`, `target_tahun5`, `dana_tahun5`, `target_akhir`, `dana_akhir`, `created_date`, `created_by`, `mod_date`, `mod_by`, `satuan_target_kinerja`) VALUES
(2, 1, 1, 1, 5, 24, 'adasds', 'asdsa', 1, 0, 0, 12222000, 0, 1000000000, 0, 2000000000, 0, 1200000000, 0, 1200000, 0, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'perda'),
(3, 1, 1, 1, 6, 24, '2 hari\n', 'kosng', 1, 0, 0, 1200000, 0, 12000000, 0, 0, 0, 0, 0, 0, 0, 0, '2016-07-14 23:30:08', '2', '0000-00-00 00:00:00', '', 'km'),
(4, 1, 1, 1, 1, 24, 'cukup', 'belum ada', 1, 0, 100, 1250000000, 210, 1350000000, 120, 1270000000, 240, 1220000000, 145, 1210000000, 815, 6300000000, '2016-07-21 01:13:07', '2', '0000-00-00 00:00:00', '', 'kecamatan'),
(7, 1, 20, 51, 10, 24, 'a', 'b', 1, 1, 0, 2000000, 0, 3000000, 0, 4000000, 0, 5000000, 0, 6000000, 0, 20000000, '2016-08-11 15:18:45', 'admin', '0000-00-00 00:00:00', '', 'km'),
(8, 1, 20, 51, 9, 25, 'c', 'd', 1, 3, 0, 1000000, 0, 2500000, 0, 3000000, 0, 25470000, 0, 45454544, 0, 77424544, '2016-08-11 18:46:24', 'admin', '0000-00-00 00:00:00', '', 'ton'),
(9, 1, 20, 52, 16, 24, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-14 15:30:18', '2', '0000-00-00 00:00:00', '', ''),
(10, 1, 20, 51, 11, 25, '', 'asd', 1, 6, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-14 17:18:12', 'admin', '0000-00-00 00:00:00', '', ''),
(11, 1, 20, 51, 11, 24, '', '', 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-14 17:20:30', 'admin', '0000-00-00 00:00:00', '', ''),
(12, 1, 20, 52, 16, 24, '', 'd', 1, 4, 0, 12, 0, 23, 0, 34, 0, 45, 0, 56, 0, 170, '2016-08-14 17:20:30', 'admin', '0000-00-00 00:00:00', '', ''),
(13, 1, 20, 51, 12, 24, 'asd', 'go', 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016-08-14 17:20:30', 'admin', '0000-00-00 00:00:00', '', 'efek');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_skpd`
--

CREATE TABLE IF NOT EXISTS `kegiatan_skpd` (
  `id` bigint(20) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `program` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_skpd`
--

INSERT INTO `kegiatan_skpd` (`id`, `kegiatan`, `skpd`, `tahun`, `created_by`, `created_date`, `mod_by`, `mod_date`, `program`) VALUES
(65, 16, 27, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 52),
(64, 15, 27, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 52),
(63, 9, 25, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(62, 11, 25, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(61, 12, 25, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(60, 10, 25, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(50, 15, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 52),
(51, 16, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 52),
(52, 13, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(53, 14, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(54, 10, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(55, 12, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(56, 11, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51),
(57, 9, 24, 0, '2', '2016-08-01', '', '0000-00-00 00:00:00', 51);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kecamatan`, `kelurahan`) VALUES
(1, 4, 'BANE'),
(2, 4, 'BARU'),
(3, 4, 'KAHEAN'),
(4, 4, 'MARTOBA'),
(5, 4, 'MELAYU'),
(6, 4, 'SIGULANG-GULANG'),
(7, 4, 'SUKADAME'),
(8, 5, 'ASUHAN'),
(9, 5, 'MERDEKA'),
(10, 5, 'KEBUN SAYUR'),
(11, 5, 'PAHLAWAN'),
(12, 5, 'PARDOMUAN'),
(13, 5, 'SIOPAT SUHU'),
(14, 5, 'TOMUAN'),
(15, 7, 'BAH KAPUL'),
(16, 7, 'BAH SORMA'),
(17, 7, 'BUKIT SOFA'),
(18, 7, 'GURILLA'),
(19, 7, 'SETIA NEGARA'),
(20, 3, 'NAGAPITA'),
(21, 3, 'NAGAPITU'),
(22, 3, 'PONDOK SAYUR'),
(23, 3, 'SUMBER JAYA'),
(24, 3, 'TAMBUN NABOLON'),
(25, 3, 'TANJUNG PINGGIR'),
(26, 3, 'TANJUNG TONGAH'),
(27, 6, 'AEK NAULI'),
(28, 6, 'KARO'),
(29, 6, 'KRISTEN'),
(30, 6, 'MARTIMBANG'),
(31, 6, 'SIMALUNGUN'),
(32, 6, 'TOBA'),
(33, 8, 'MARIHAT JAYA'),
(34, 8, 'NAGAHUTA TIMUR'),
(35, 8, 'PEMATANG MARIHAT'),
(36, 8, 'TONG MARIMBUN'),
(37, 8, 'SIMARIMBUN'),
(38, 8, 'NAGAHUTA'),
(39, 1, 'BARINGIN PANCUR NAULI'),
(40, 1, 'MEKAR NAULI'),
(41, 1, 'PARDAMEAN'),
(42, 1, 'PARHORASAN NAULI'),
(43, 1, 'SUKAMAJU'),
(44, 1, 'SUKAMAKMUR'),
(45, 1, 'SUKARAJA'),
(46, 2, 'BANJAR'),
(47, 2, 'BANTAN'),
(48, 2, 'DWIKORA'),
(49, 2, 'PROKLAMASI'),
(50, 2, 'SIMARITO'),
(51, 2, 'SIPINGGOL-PINGGOL'),
(52, 2, 'TELADAN'),
(53, 2, 'TIMBANG GALUNG');

-- --------------------------------------------------------

--
-- Table structure for table `kendala_realisasi_fisik_dan_keuangan_dau`
--

CREATE TABLE IF NOT EXISTS `kendala_realisasi_fisik_dan_keuangan_dau` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `id_dpa` int(11) NOT NULL,
  `pejabat_pelaksana_kegiatan` text NOT NULL,
  `manfaat_kegiatan` text NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `skpd` int(11) NOT NULL,
  `kendala` text NOT NULL,
  `tindak_lanjut` text NOT NULL,
  `pihak_pembantu` varchar(100) NOT NULL,
  `kuasa_pengguna_anggaran` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` varchar(100) NOT NULL,
  `mod_by` datetime NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `is_perubahan` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendala_realisasi_fisik_dan_keuangan_dau`
--

INSERT INTO `kendala_realisasi_fisik_dan_keuangan_dau` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `id_dpa`, `pejabat_pelaksana_kegiatan`, `manfaat_kegiatan`, `lokasi_kegiatan`, `skpd`, `kendala`, `tindak_lanjut`, `pihak_pembantu`, `kuasa_pengguna_anggaran`, `created_date`, `created_by`, `mod_date`, `mod_by`, `tahun`, `bulan`, `is_perubahan`) VALUES
(1, 1, 1, 1, 1, 0, '', 'koyo-koyo', '', 24, 'kurang semangat', 'beli powerade', 'indomaret', '', '2016-07-18 13:34:08', '2', '2016-07-18 13:34:29', '0000-00-00 00:00:00', 2020, 1, 0),
(2, 1, 1, 1, 1, 0, '', 'ads', '', 24, 'asd', 'asdasd', 'asdad', '', '2016-07-18 13:35:44', '2', '', '0000-00-00 00:00:00', 2020, 2, 0),
(3, 1, 1, 1, 1, 0, '', 'asd', '', 24, 'asd', 'asdas', 'asdad', '', '2016-07-18 13:36:08', '2', '', '0000-00-00 00:00:00', 2020, 3, 0),
(4, 1, 1, 1, 1, 0, '', 'sd', '', 24, 'asd', 'asd', 'asdasd', '', '2016-07-18 13:37:24', '2', '', '0000-00-00 00:00:00', 2020, 1, 0),
(5, 1, 1, 1, 1, 0, '', 'sad', '', 24, 'asd', 'asd', 'asdasd', '', '2016-07-18 13:46:52', '2', '', '0000-00-00 00:00:00', 2020, 1, 1),
(6, 1, 1, 1, 5, 18, '', 'asd', '', 24, 'asdasda123', 'asda24', 'asdasd', '', '2016-07-18 20:18:48', '2', '', '0000-00-00 00:00:00', 2020, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kua`
--

CREATE TABLE IF NOT EXISTS `kua` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `pagu_tahun_n_min_1` bigint(20) NOT NULL,
  `pagu_tahun_n` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `id_musrenbang` bigint(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=312 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kua`
--

INSERT INTO `kua` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `pagu_tahun_n_min_1`, `pagu_tahun_n`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang`, `parent_id`, `parentCategory`) VALUES
(1, 2017, 1, 1, 2, 2, 24, 12500000, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 2, 0, 0),
(2, 2017, 1, 1, 2, 2, 24, 1240000, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 3, 1, 0),
(3, 2017, 1, 1, 1, 1, 24, 10000000, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 4, 2, 0),
(4, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 6, 0, 0),
(5, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 7, 0, 0),
(6, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 8, 0, 0),
(7, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 10, 0, 0),
(8, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 11, 0, 0),
(9, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 12, 0, 0),
(10, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 14, 0, 0),
(11, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 15, 0, 0),
(12, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 16, 0, 0),
(13, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 18, 0, 0),
(14, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 19, 0, 0),
(15, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 20, 0, 0),
(16, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 22, 0, 0),
(17, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 23, 0, 0),
(18, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 24, 0, 0),
(19, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 26, 0, 0),
(20, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 27, 0, 0),
(21, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 28, 0, 0),
(22, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 30, 0, 0),
(23, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 31, 0, 0),
(24, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 32, 0, 0),
(25, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 34, 0, 0),
(26, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 35, 0, 0),
(27, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 36, 0, 0),
(28, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 38, 0, 0),
(29, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 39, 0, 0),
(30, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 40, 0, 0),
(31, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 42, 0, 0),
(32, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 43, 0, 0),
(33, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 44, 0, 0),
(34, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 46, 0, 0),
(35, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 47, 0, 0),
(36, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 48, 0, 0),
(37, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 50, 0, 0),
(38, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 51, 0, 0),
(39, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 52, 0, 0),
(40, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 54, 0, 0),
(41, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 55, 0, 0),
(42, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 56, 0, 0),
(43, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 58, 0, 0),
(44, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 59, 0, 0),
(45, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 60, 0, 0),
(46, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 62, 0, 0),
(47, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 63, 0, 0),
(48, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 64, 0, 0),
(49, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 66, 0, 0),
(50, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 67, 0, 0),
(51, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 68, 0, 0),
(52, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 70, 0, 0),
(53, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 71, 0, 0),
(54, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 72, 0, 0),
(55, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 74, 0, 0),
(56, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 75, 0, 0),
(57, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 76, 0, 0),
(58, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 78, 0, 0),
(59, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 79, 0, 0),
(60, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 80, 0, 0),
(61, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 82, 0, 0),
(62, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 83, 0, 0),
(63, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 84, 0, 0),
(64, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 86, 0, 0),
(65, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 87, 0, 0),
(66, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 88, 0, 0),
(67, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 90, 0, 0),
(68, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 91, 0, 0),
(69, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 92, 0, 0),
(70, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 94, 0, 0),
(71, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 95, 0, 0),
(72, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 96, 0, 0),
(73, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 98, 0, 0),
(74, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 99, 0, 0),
(75, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 100, 0, 0),
(76, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 102, 0, 0),
(77, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 103, 0, 0),
(78, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 104, 0, 0),
(79, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 106, 0, 0),
(80, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 107, 0, 0),
(81, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 108, 0, 0),
(82, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 110, 0, 0),
(83, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 111, 0, 0),
(84, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 112, 0, 0),
(85, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 114, 0, 0),
(86, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 115, 0, 0),
(87, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 116, 0, 0),
(88, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 118, 0, 0),
(89, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 119, 0, 0),
(90, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 120, 0, 0),
(91, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 122, 0, 0),
(92, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 123, 0, 0),
(93, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 124, 0, 0),
(94, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 126, 0, 0),
(95, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 127, 0, 0),
(96, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 128, 0, 0),
(97, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 130, 0, 0),
(98, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 131, 0, 0),
(99, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 132, 0, 0),
(100, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 134, 0, 0),
(101, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 135, 0, 0),
(102, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 136, 0, 0),
(103, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 138, 0, 0),
(104, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 139, 0, 0),
(105, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 140, 0, 0),
(106, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 142, 0, 0),
(107, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 143, 0, 0),
(108, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 144, 0, 0),
(109, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 146, 0, 0),
(110, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 147, 0, 0),
(111, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 148, 0, 0),
(112, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 150, 0, 0),
(113, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 151, 0, 0),
(114, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 152, 0, 0),
(115, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 154, 0, 0),
(116, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 155, 0, 0),
(117, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 156, 0, 0),
(118, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 158, 0, 0),
(119, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 159, 0, 0),
(120, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 160, 0, 0),
(121, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 162, 0, 0),
(122, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 163, 0, 0),
(123, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 164, 0, 0),
(124, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 166, 0, 0),
(125, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 167, 0, 0),
(126, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 168, 0, 0),
(127, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 170, 0, 0),
(128, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 171, 0, 0),
(129, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 172, 0, 0),
(130, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 174, 0, 0),
(131, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 175, 0, 0),
(132, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 176, 0, 0),
(133, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 178, 0, 0),
(134, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 179, 0, 0),
(135, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 180, 0, 0),
(136, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 182, 0, 0),
(137, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 183, 0, 0),
(138, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 184, 0, 0),
(139, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 186, 0, 0),
(140, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 187, 0, 0),
(141, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 188, 0, 0),
(142, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 190, 0, 0),
(143, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 191, 0, 0),
(144, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 192, 0, 0),
(145, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 194, 0, 0),
(146, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 195, 0, 0),
(147, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 196, 0, 0),
(148, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 198, 0, 0),
(149, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 199, 0, 0),
(150, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 200, 0, 0),
(151, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 202, 0, 0),
(152, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 203, 0, 0),
(153, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 204, 0, 0),
(154, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 206, 0, 0),
(155, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 207, 0, 0),
(156, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 208, 0, 0),
(157, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 210, 0, 0),
(158, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 211, 0, 0),
(159, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 212, 0, 0),
(160, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 214, 0, 0),
(161, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 215, 0, 0),
(162, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 216, 0, 0),
(163, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 218, 0, 0),
(164, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 219, 0, 0),
(165, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 220, 0, 0),
(166, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 222, 0, 0),
(167, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 223, 0, 0),
(168, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 224, 0, 0),
(169, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 226, 0, 0),
(170, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 227, 0, 0),
(171, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 228, 0, 0),
(172, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 230, 0, 0),
(173, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 231, 0, 0),
(174, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 232, 0, 0),
(175, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 234, 0, 0),
(176, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 235, 0, 0),
(177, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 236, 0, 0),
(178, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 238, 0, 0),
(179, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 239, 0, 0),
(180, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 240, 0, 0),
(181, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 242, 0, 0),
(182, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 243, 0, 0),
(183, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 244, 0, 0),
(184, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 246, 0, 0),
(185, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 247, 0, 0),
(186, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 248, 0, 0),
(187, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 250, 0, 0),
(188, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 251, 0, 0),
(189, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 252, 0, 0),
(190, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 254, 0, 0),
(191, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 255, 0, 0),
(192, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 256, 0, 0),
(193, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 258, 0, 0),
(194, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 259, 0, 0),
(195, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 260, 0, 0),
(196, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 262, 0, 0),
(197, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 263, 0, 0),
(198, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 264, 0, 0),
(199, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 266, 0, 0),
(200, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 267, 0, 0),
(201, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 268, 0, 0),
(202, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 270, 0, 0),
(203, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 271, 0, 0),
(204, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 272, 0, 0),
(205, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 274, 0, 0),
(206, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 275, 0, 0),
(207, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 276, 0, 0),
(208, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 278, 0, 0),
(209, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 279, 0, 0),
(210, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 280, 0, 0),
(211, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 282, 0, 0),
(212, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 283, 0, 0),
(213, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 284, 0, 0),
(214, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 286, 0, 0),
(215, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 287, 0, 0),
(216, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 288, 0, 0),
(217, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 290, 0, 0),
(218, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 291, 0, 0),
(219, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 292, 0, 0),
(220, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 294, 0, 0),
(221, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 295, 0, 0),
(222, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 296, 0, 0),
(223, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 298, 0, 0),
(224, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 299, 0, 0),
(225, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 300, 0, 0),
(226, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 302, 0, 0),
(227, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 303, 0, 0),
(228, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 304, 0, 0),
(229, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 306, 0, 0),
(230, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 307, 0, 0),
(231, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 308, 0, 0),
(232, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 310, 0, 0),
(233, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 311, 0, 0),
(234, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 312, 0, 0),
(235, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 314, 0, 0),
(236, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 315, 0, 0),
(237, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 316, 0, 0),
(238, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 318, 0, 0),
(239, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 319, 0, 0),
(240, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 320, 0, 0),
(241, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 322, 0, 0),
(242, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 323, 0, 0),
(243, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 324, 0, 0),
(244, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 326, 0, 0),
(245, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 327, 0, 0),
(246, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 328, 0, 0),
(247, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 330, 0, 0),
(248, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 331, 0, 0),
(249, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 332, 0, 0),
(250, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 334, 0, 0),
(251, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 335, 0, 0),
(252, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 336, 0, 0),
(253, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 338, 0, 0),
(254, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 339, 0, 0),
(255, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 340, 0, 0),
(256, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 342, 0, 0),
(257, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 343, 0, 0),
(258, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 344, 0, 0),
(259, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 346, 0, 0),
(260, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 347, 0, 0),
(261, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 348, 0, 0),
(262, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 350, 0, 0),
(263, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 351, 0, 0),
(264, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 352, 0, 0),
(265, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 354, 0, 0),
(266, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 355, 0, 0),
(267, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 356, 0, 0),
(268, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 358, 0, 0),
(269, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 359, 0, 0),
(270, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 360, 0, 0),
(271, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 362, 0, 0),
(272, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 363, 0, 0),
(273, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 364, 0, 0),
(274, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 366, 0, 0),
(275, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 367, 0, 0),
(276, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 368, 0, 0),
(277, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 370, 0, 0),
(278, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 371, 0, 0),
(279, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 372, 0, 0),
(280, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 374, 0, 0),
(281, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 375, 0, 0),
(282, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 376, 0, 0),
(283, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 378, 0, 0),
(284, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 379, 0, 0),
(285, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 380, 0, 0),
(286, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 382, 0, 0),
(287, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 383, 0, 0),
(288, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 384, 0, 0),
(289, 2017, 1, 1, 2, 2, 24, 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 386, 0, 0),
(290, 2017, 1, 1, 2, 2, 24, 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 387, 0, 0),
(291, 2017, 1, 1, 1, 5, 24, 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 390, 0, 0),
(292, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 391, 0, 0),
(293, 2017, 1, 1, 2, 2, 24, 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 392, 0, 0),
(294, 2017, 1, 1, 2, 2, 24, 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 393, 0, 0),
(295, 2017, 1, 1, 1, 6, 24, 0, 21500000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 394, 0, 0),
(296, 2017, 1, 1, 1, 6, 24, 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 395, 0, 0),
(297, 2017, 1, 1, 1, 6, 24, 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 396, 0, 0),
(298, 2017, 1, 1, 1, 6, 24, 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 397, 0, 0),
(299, 2017, 1, 1, 1, 5, 24, 0, 123123123123, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 398, 0, 0),
(300, 2017, 1, 1, 1, 1, 24, 0, 123000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 399, 0, 0),
(301, 2017, 1, 1, 1, 5, 24, 0, 21000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 400, 0, 0),
(302, 2017, 1, 1, 1, 1, 24, 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 401, 0, 0),
(303, 2017, 1, 1, 1, 5, 25, 125000000, 21000000, '2', '2016-07-07 13:22:29', '2', '2016-07-07 13:40:03', 0, 0, 0),
(304, 2020, 1, 1, 2, 2, 27, 12000000, 21000000, '2', '2016-07-19 17:52:39', '', '0000-00-00 00:00:00', 0, 0, 0),
(305, 2017, 1, 20, 51, 9, 24, 0, 5633333, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 1, 0, 0),
(306, 2017, 1, 20, 52, 15, 24, 0, 23000000, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 9, 0, 0),
(307, 2017, 1, 1, 1, 5, 24, 0, 150000000, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 13, 0, 0),
(308, 2017, 1, 1, 1, 6, 24, 0, 21500000, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 17, 0, 0),
(309, 2017, 1, 1, 1, 5, 24, 0, 123123123123, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 21, 0, 0),
(310, 2017, 1, 20, 51, 9, 24, 0, 5633333, 'admin', '2016-08-11 14:17:32', '', '0000-00-00 00:00:00', 25, 0, 0),
(311, 2017, 1, 20, 51, 9, 24, 0, 121, 'admin', '2016-08-18 09:27:09', '', '0000-00-00 00:00:00', 29, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kua_perubahan`
--

CREATE TABLE IF NOT EXISTS `kua_perubahan` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `target` varchar(100) NOT NULL,
  `pagu_sebelum_perubahan` bigint(20) NOT NULL,
  `pagu_setelah_perubahan` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `id_musrenbang` bigint(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL,
  `status_kua` enum('Data Perubahan','Data Baru') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=306 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kua_perubahan`
--

INSERT INTO `kua_perubahan` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `sasaran_kegiatan`, `target`, `pagu_sebelum_perubahan`, `pagu_setelah_perubahan`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang`, `parent_id`, `parentCategory`, `status_kua`) VALUES
(1, 2017, 1, 1, 2, 2, 24, '', '', 125000000, 12000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 2, 0, 0, 'Data Perubahan'),
(2, 2017, 1, 1, 2, 2, 24, '', '', 1240000, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 3, 1, 0, 'Data Perubahan'),
(3, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 4, 2, 0, 'Data Perubahan'),
(4, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 6, 0, 0, 'Data Perubahan'),
(5, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 7, 0, 0, 'Data Perubahan'),
(6, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 8, 0, 0, 'Data Perubahan'),
(7, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 10, 0, 0, 'Data Perubahan'),
(8, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 11, 0, 0, 'Data Perubahan'),
(9, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 12, 0, 0, 'Data Perubahan'),
(10, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 14, 0, 0, 'Data Perubahan'),
(11, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 15, 0, 0, 'Data Perubahan'),
(12, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 16, 0, 0, 'Data Perubahan'),
(13, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 18, 0, 0, 'Data Perubahan'),
(14, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 19, 0, 0, 'Data Perubahan'),
(15, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 20, 0, 0, 'Data Perubahan'),
(16, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 22, 0, 0, 'Data Perubahan'),
(17, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 23, 0, 0, 'Data Perubahan'),
(18, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 24, 0, 0, 'Data Perubahan'),
(19, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 26, 0, 0, 'Data Perubahan'),
(20, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 27, 0, 0, 'Data Perubahan'),
(21, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 28, 0, 0, 'Data Perubahan'),
(22, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 30, 0, 0, 'Data Perubahan'),
(23, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 31, 0, 0, 'Data Perubahan'),
(24, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 32, 0, 0, 'Data Perubahan'),
(25, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 34, 0, 0, 'Data Perubahan'),
(26, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 35, 0, 0, 'Data Perubahan'),
(27, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 36, 0, 0, 'Data Perubahan'),
(28, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 38, 0, 0, 'Data Perubahan'),
(29, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 39, 0, 0, 'Data Perubahan'),
(30, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 40, 0, 0, 'Data Perubahan'),
(31, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 42, 0, 0, 'Data Perubahan'),
(32, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 43, 0, 0, 'Data Perubahan'),
(33, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 44, 0, 0, 'Data Perubahan'),
(34, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 46, 0, 0, 'Data Perubahan'),
(35, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 47, 0, 0, 'Data Perubahan'),
(36, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 48, 0, 0, 'Data Perubahan'),
(37, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 50, 0, 0, 'Data Perubahan'),
(38, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 51, 0, 0, 'Data Perubahan'),
(39, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 52, 0, 0, 'Data Perubahan'),
(40, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 54, 0, 0, 'Data Perubahan'),
(41, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 55, 0, 0, 'Data Perubahan'),
(42, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 56, 0, 0, 'Data Perubahan'),
(43, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 58, 0, 0, 'Data Perubahan'),
(44, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 59, 0, 0, 'Data Perubahan'),
(45, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 60, 0, 0, 'Data Perubahan'),
(46, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 62, 0, 0, 'Data Perubahan'),
(47, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 63, 0, 0, 'Data Perubahan'),
(48, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 64, 0, 0, 'Data Perubahan'),
(49, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 66, 0, 0, 'Data Perubahan'),
(50, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 67, 0, 0, 'Data Perubahan'),
(51, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 68, 0, 0, 'Data Perubahan'),
(52, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 70, 0, 0, 'Data Perubahan'),
(53, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 71, 0, 0, 'Data Perubahan'),
(54, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 72, 0, 0, 'Data Perubahan'),
(55, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 74, 0, 0, 'Data Perubahan'),
(56, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 75, 0, 0, 'Data Perubahan'),
(57, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 76, 0, 0, 'Data Perubahan'),
(58, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 78, 0, 0, 'Data Perubahan'),
(59, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 79, 0, 0, 'Data Perubahan'),
(60, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 80, 0, 0, 'Data Perubahan'),
(61, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 82, 0, 0, 'Data Perubahan'),
(62, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 83, 0, 0, 'Data Perubahan'),
(63, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 84, 0, 0, 'Data Perubahan'),
(64, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 86, 0, 0, 'Data Perubahan'),
(65, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 87, 0, 0, 'Data Perubahan'),
(66, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 88, 0, 0, 'Data Perubahan'),
(67, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 90, 0, 0, 'Data Perubahan'),
(68, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 91, 0, 0, 'Data Perubahan'),
(69, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 92, 0, 0, 'Data Perubahan'),
(70, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 94, 0, 0, 'Data Perubahan'),
(71, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 95, 0, 0, 'Data Perubahan'),
(72, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 96, 0, 0, 'Data Perubahan'),
(73, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 98, 0, 0, 'Data Perubahan'),
(74, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 99, 0, 0, 'Data Perubahan'),
(75, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 100, 0, 0, 'Data Perubahan'),
(76, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 102, 0, 0, 'Data Perubahan'),
(77, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 103, 0, 0, 'Data Perubahan'),
(78, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 104, 0, 0, 'Data Perubahan'),
(79, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 106, 0, 0, 'Data Perubahan'),
(80, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 107, 0, 0, 'Data Perubahan'),
(81, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 108, 0, 0, 'Data Perubahan'),
(82, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 110, 0, 0, 'Data Perubahan'),
(83, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 111, 0, 0, 'Data Perubahan'),
(84, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 112, 0, 0, 'Data Perubahan'),
(85, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 114, 0, 0, 'Data Perubahan'),
(86, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 115, 0, 0, 'Data Perubahan'),
(87, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 116, 0, 0, 'Data Perubahan'),
(88, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 118, 0, 0, 'Data Perubahan'),
(89, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 119, 0, 0, 'Data Perubahan'),
(90, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 120, 0, 0, 'Data Perubahan'),
(91, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 122, 0, 0, 'Data Perubahan'),
(92, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 123, 0, 0, 'Data Perubahan'),
(93, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 124, 0, 0, 'Data Perubahan'),
(94, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 126, 0, 0, 'Data Perubahan'),
(95, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 127, 0, 0, 'Data Perubahan'),
(96, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 128, 0, 0, 'Data Perubahan'),
(97, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 130, 0, 0, 'Data Perubahan'),
(98, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 131, 0, 0, 'Data Perubahan'),
(99, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 132, 0, 0, 'Data Perubahan'),
(100, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 134, 0, 0, 'Data Perubahan'),
(101, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 135, 0, 0, 'Data Perubahan'),
(102, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 136, 0, 0, 'Data Perubahan'),
(103, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 138, 0, 0, 'Data Perubahan'),
(104, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 139, 0, 0, 'Data Perubahan'),
(105, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 140, 0, 0, 'Data Perubahan'),
(106, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 142, 0, 0, 'Data Perubahan'),
(107, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 143, 0, 0, 'Data Perubahan'),
(108, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 144, 0, 0, 'Data Perubahan'),
(109, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 146, 0, 0, 'Data Perubahan'),
(110, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 147, 0, 0, 'Data Perubahan'),
(111, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 148, 0, 0, 'Data Perubahan'),
(112, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 150, 0, 0, 'Data Perubahan'),
(113, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 151, 0, 0, 'Data Perubahan'),
(114, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 152, 0, 0, 'Data Perubahan'),
(115, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 154, 0, 0, 'Data Perubahan'),
(116, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 155, 0, 0, 'Data Perubahan'),
(117, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 156, 0, 0, 'Data Perubahan'),
(118, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 158, 0, 0, 'Data Perubahan'),
(119, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 159, 0, 0, 'Data Perubahan'),
(120, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 160, 0, 0, 'Data Perubahan'),
(121, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 162, 0, 0, 'Data Perubahan'),
(122, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 163, 0, 0, 'Data Perubahan'),
(123, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 164, 0, 0, 'Data Perubahan'),
(124, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 166, 0, 0, 'Data Perubahan'),
(125, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 167, 0, 0, 'Data Perubahan'),
(126, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 168, 0, 0, 'Data Perubahan'),
(127, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 170, 0, 0, 'Data Perubahan'),
(128, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 171, 0, 0, 'Data Perubahan'),
(129, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 172, 0, 0, 'Data Perubahan'),
(130, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 174, 0, 0, 'Data Perubahan'),
(131, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 175, 0, 0, 'Data Perubahan'),
(132, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 176, 0, 0, 'Data Perubahan'),
(133, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 178, 0, 0, 'Data Perubahan'),
(134, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 179, 0, 0, 'Data Perubahan'),
(135, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 180, 0, 0, 'Data Perubahan'),
(136, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 182, 0, 0, 'Data Perubahan'),
(137, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 183, 0, 0, 'Data Perubahan'),
(138, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 184, 0, 0, 'Data Perubahan'),
(139, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 186, 0, 0, 'Data Perubahan'),
(140, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 187, 0, 0, 'Data Perubahan'),
(141, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 188, 0, 0, 'Data Perubahan'),
(142, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 190, 0, 0, 'Data Perubahan'),
(143, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 191, 0, 0, 'Data Perubahan'),
(144, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 192, 0, 0, 'Data Perubahan'),
(145, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 194, 0, 0, 'Data Perubahan'),
(146, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 195, 0, 0, 'Data Perubahan'),
(147, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 196, 0, 0, 'Data Perubahan'),
(148, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 198, 0, 0, 'Data Perubahan'),
(149, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 199, 0, 0, 'Data Perubahan'),
(150, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 200, 0, 0, 'Data Perubahan'),
(151, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 202, 0, 0, 'Data Perubahan'),
(152, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 203, 0, 0, 'Data Perubahan'),
(153, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 204, 0, 0, 'Data Perubahan'),
(154, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 206, 0, 0, 'Data Perubahan'),
(155, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 207, 0, 0, 'Data Perubahan'),
(156, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 208, 0, 0, 'Data Perubahan'),
(157, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 210, 0, 0, 'Data Perubahan'),
(158, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 211, 0, 0, 'Data Perubahan'),
(159, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 212, 0, 0, 'Data Perubahan'),
(160, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 214, 0, 0, 'Data Perubahan'),
(161, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 215, 0, 0, 'Data Perubahan'),
(162, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 216, 0, 0, 'Data Perubahan'),
(163, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 218, 0, 0, 'Data Perubahan'),
(164, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 219, 0, 0, 'Data Perubahan'),
(165, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 220, 0, 0, 'Data Perubahan'),
(166, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 222, 0, 0, 'Data Perubahan'),
(167, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 223, 0, 0, 'Data Perubahan'),
(168, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 224, 0, 0, 'Data Perubahan'),
(169, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 226, 0, 0, 'Data Perubahan'),
(170, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 227, 0, 0, 'Data Perubahan'),
(171, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 228, 0, 0, 'Data Perubahan'),
(172, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 230, 0, 0, 'Data Perubahan'),
(173, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 231, 0, 0, 'Data Perubahan'),
(174, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 232, 0, 0, 'Data Perubahan'),
(175, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 234, 0, 0, 'Data Perubahan'),
(176, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 235, 0, 0, 'Data Perubahan'),
(177, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 236, 0, 0, 'Data Perubahan'),
(178, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 238, 0, 0, 'Data Perubahan'),
(179, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 239, 0, 0, 'Data Perubahan'),
(180, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 240, 0, 0, 'Data Perubahan'),
(181, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 242, 0, 0, 'Data Perubahan'),
(182, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 243, 0, 0, 'Data Perubahan'),
(183, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 244, 0, 0, 'Data Perubahan'),
(184, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 246, 0, 0, 'Data Perubahan'),
(185, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 247, 0, 0, 'Data Perubahan'),
(186, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 248, 0, 0, 'Data Perubahan'),
(187, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 250, 0, 0, 'Data Perubahan'),
(188, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 251, 0, 0, 'Data Perubahan'),
(189, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 252, 0, 0, 'Data Perubahan'),
(190, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 254, 0, 0, 'Data Perubahan'),
(191, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 255, 0, 0, 'Data Perubahan'),
(192, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 256, 0, 0, 'Data Perubahan'),
(193, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 258, 0, 0, 'Data Perubahan'),
(194, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 259, 0, 0, 'Data Perubahan'),
(195, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 260, 0, 0, 'Data Perubahan'),
(196, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 262, 0, 0, 'Data Perubahan'),
(197, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 263, 0, 0, 'Data Perubahan'),
(198, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 264, 0, 0, 'Data Perubahan'),
(199, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 266, 0, 0, 'Data Perubahan'),
(200, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 267, 0, 0, 'Data Perubahan'),
(201, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 268, 0, 0, 'Data Perubahan'),
(202, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 270, 0, 0, 'Data Perubahan'),
(203, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 271, 0, 0, 'Data Perubahan'),
(204, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 272, 0, 0, 'Data Perubahan'),
(205, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 274, 0, 0, 'Data Perubahan'),
(206, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 275, 0, 0, 'Data Perubahan'),
(207, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 276, 0, 0, 'Data Perubahan'),
(208, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 278, 0, 0, 'Data Perubahan'),
(209, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 279, 0, 0, 'Data Perubahan'),
(210, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 280, 0, 0, 'Data Perubahan'),
(211, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 282, 0, 0, 'Data Perubahan'),
(212, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 283, 0, 0, 'Data Perubahan'),
(213, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 284, 0, 0, 'Data Perubahan'),
(214, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 286, 0, 0, 'Data Perubahan'),
(215, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 287, 0, 0, 'Data Perubahan'),
(216, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 288, 0, 0, 'Data Perubahan'),
(217, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 290, 0, 0, 'Data Perubahan'),
(218, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 291, 0, 0, 'Data Perubahan'),
(219, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 292, 0, 0, 'Data Perubahan'),
(220, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 294, 0, 0, 'Data Perubahan'),
(221, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 295, 0, 0, 'Data Perubahan'),
(222, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 296, 0, 0, 'Data Perubahan'),
(223, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 298, 0, 0, 'Data Perubahan'),
(224, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 299, 0, 0, 'Data Perubahan'),
(225, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 300, 0, 0, 'Data Perubahan'),
(226, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 302, 0, 0, 'Data Perubahan'),
(227, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 303, 0, 0, 'Data Perubahan'),
(228, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 304, 0, 0, 'Data Perubahan'),
(229, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 306, 0, 0, 'Data Perubahan'),
(230, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 307, 0, 0, 'Data Perubahan'),
(231, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 308, 0, 0, 'Data Perubahan'),
(232, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 310, 0, 0, 'Data Perubahan'),
(233, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 311, 0, 0, 'Data Perubahan'),
(234, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 312, 0, 0, 'Data Perubahan'),
(235, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 314, 0, 0, 'Data Perubahan'),
(236, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 315, 0, 0, 'Data Perubahan'),
(237, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 316, 0, 0, 'Data Perubahan'),
(238, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 318, 0, 0, 'Data Perubahan'),
(239, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 319, 0, 0, 'Data Perubahan'),
(240, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 320, 0, 0, 'Data Perubahan'),
(241, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 322, 0, 0, 'Data Perubahan'),
(242, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 323, 0, 0, 'Data Perubahan'),
(243, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 324, 0, 0, 'Data Perubahan'),
(244, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 326, 0, 0, 'Data Perubahan'),
(245, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 327, 0, 0, 'Data Perubahan'),
(246, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 328, 0, 0, 'Data Perubahan'),
(247, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 330, 0, 0, 'Data Perubahan'),
(248, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 331, 0, 0, 'Data Perubahan'),
(249, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 332, 0, 0, 'Data Perubahan'),
(250, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 334, 0, 0, 'Data Perubahan'),
(251, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 335, 0, 0, 'Data Perubahan'),
(252, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 336, 0, 0, 'Data Perubahan'),
(253, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 338, 0, 0, 'Data Perubahan'),
(254, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 339, 0, 0, 'Data Perubahan'),
(255, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 340, 0, 0, 'Data Perubahan'),
(256, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 342, 0, 0, 'Data Perubahan'),
(257, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 343, 0, 0, 'Data Perubahan'),
(258, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 344, 0, 0, 'Data Perubahan'),
(259, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 346, 0, 0, 'Data Perubahan'),
(260, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 347, 0, 0, 'Data Perubahan'),
(261, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 348, 0, 0, 'Data Perubahan'),
(262, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 350, 0, 0, 'Data Perubahan'),
(263, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 351, 0, 0, 'Data Perubahan'),
(264, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 352, 0, 0, 'Data Perubahan'),
(265, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 354, 0, 0, 'Data Perubahan'),
(266, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 355, 0, 0, 'Data Perubahan'),
(267, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 356, 0, 0, 'Data Perubahan'),
(268, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 358, 0, 0, 'Data Perubahan'),
(269, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 359, 0, 0, 'Data Perubahan'),
(270, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 360, 0, 0, 'Data Perubahan'),
(271, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 362, 0, 0, 'Data Perubahan'),
(272, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 363, 0, 0, 'Data Perubahan'),
(273, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 364, 0, 0, 'Data Perubahan'),
(274, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 366, 0, 0, 'Data Perubahan'),
(275, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 367, 0, 0, 'Data Perubahan'),
(276, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 368, 0, 0, 'Data Perubahan'),
(277, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 370, 0, 0, 'Data Perubahan'),
(278, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 371, 0, 0, 'Data Perubahan'),
(279, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 372, 0, 0, 'Data Perubahan'),
(280, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 374, 0, 0, 'Data Perubahan'),
(281, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 375, 0, 0, 'Data Perubahan'),
(282, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 376, 0, 0, 'Data Perubahan'),
(283, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 378, 0, 0, 'Data Perubahan'),
(284, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 379, 0, 0, 'Data Perubahan'),
(285, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 380, 0, 0, 'Data Perubahan'),
(286, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 382, 0, 0, 'Data Perubahan'),
(287, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 383, 0, 0, 'Data Perubahan'),
(288, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 384, 0, 0, 'Data Perubahan'),
(289, 2017, 1, 1, 2, 2, 24, '', '', 0, 140000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 386, 0, 0, 'Data Perubahan'),
(290, 2017, 1, 1, 2, 2, 24, '', '', 0, 12300000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 387, 0, 0, 'Data Perubahan'),
(291, 2017, 1, 1, 1, 5, 24, '', '', 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 390, 0, 0, 'Data Perubahan'),
(292, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 391, 0, 0, 'Data Perubahan'),
(293, 2017, 1, 1, 2, 2, 24, '', '', 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 392, 0, 0, 'Data Perubahan'),
(294, 2017, 1, 1, 2, 2, 24, '', '', 0, 150000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 393, 0, 0, 'Data Perubahan'),
(295, 2017, 1, 1, 1, 6, 24, '', '', 0, 21500000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 394, 0, 0, 'Data Perubahan'),
(296, 2017, 1, 1, 1, 6, 24, '', '', 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 395, 0, 0, 'Data Perubahan'),
(297, 2017, 1, 1, 1, 6, 24, '', '', 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 396, 0, 0, 'Data Perubahan'),
(298, 2017, 1, 1, 1, 6, 24, '', '', 0, 17900000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 397, 0, 0, 'Data Perubahan'),
(299, 2017, 1, 1, 1, 5, 24, '', '', 0, 123123123123, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 398, 0, 0, 'Data Perubahan'),
(300, 2017, 1, 1, 1, 1, 24, '', '', 0, 123000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 399, 0, 0, 'Data Perubahan'),
(301, 2017, 1, 1, 1, 5, 24, '', '', 0, 21000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 400, 0, 0, 'Data Perubahan'),
(302, 2017, 1, 1, 1, 1, 24, '', '', 0, 250000000, 'admin', '2016-07-07 13:04:24', '', '0000-00-00 00:00:00', 401, 0, 0, 'Data Perubahan'),
(303, 2017, 1, 1, 1, 5, 25, '', '', 125100000, 21000000, '2', '2016-07-07 13:22:29', '2', '2016-07-07 13:40:03', 0, 0, 0, 'Data Perubahan'),
(304, 2017, 1, 1, 1, 1, 24, 'sdf', 'sdf', 150000, 2100000, '2', '2016-07-11 16:39:39', '', '0000-00-00 00:00:00', 0, 0, 0, 'Data Perubahan'),
(305, 2017, 1, 1, 1, 1, 24, '', '', 250000000, 0, '2', '2016-07-11 17:00:51', '', '0000-00-00 00:00:00', 0, 0, 0, 'Data Perubahan');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pengadaan_barang_jasa`
--

CREATE TABLE IF NOT EXISTS `laporan_pengadaan_barang_jasa` (
  `id` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian_kegiatan` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `proses_pengadaan` enum('Pelelangan Umum','Pelelangan Terbatas','Pemilihan Langsung','Penunjukan Langsung') NOT NULL,
  `jenis_belanja` enum('Belanja Langsung','Belanja Tidak Langsung') NOT NULL,
  `jenis_belanja_langsung` enum('Belanja Pegawai','Belanja Barang dan Jasa','Belanja Modal') NOT NULL,
  `jenis_belanja_tidak_langsung` enum('Belanja pegawai','Belanja bunga','Belanja subsidi','Belanja hibah','Bantuan sosial','Belanja bagi hasil','Bantuan keuangan','Belanja tidak terduga') NOT NULL,
  `tgl_proses_pengadaan` date NOT NULL,
  `tanda_tangan_kontrak` date NOT NULL,
  `pelaksanaan` date NOT NULL,
  `pho` date NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `triwulan` enum('Triwulan I','Triwulan II','Triwulan III','Triwulan IV') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_pengadaan_barang_jasa`
--

INSERT INTO `laporan_pengadaan_barang_jasa` (`id`, `skpd`, `uraian_kegiatan`, `volume`, `satuan`, `biaya`, `proses_pengadaan`, `jenis_belanja`, `jenis_belanja_langsung`, `jenis_belanja_tidak_langsung`, `tgl_proses_pengadaan`, `tanda_tangan_kontrak`, `pelaksanaan`, `pho`, `keterangan`, `tahun`, `triwulan`) VALUES
(2, 23, 'Pembelian baju dinas', '50 Baju', 'Baju', '160000000', 'Pemilihan Langsung', 'Belanja Langsung', 'Belanja Pegawai', 'Belanja pegawai', '2015-11-20', '2015-11-20', '2015-11-28', '2015-12-01', '-', 2015, 'Triwulan I'),
(4, 23, 'Pembelian baju dinas', '50 Baju', 'Baju', '30000000', 'Penunjukan Langsung', 'Belanja Langsung', 'Belanja Pegawai', 'Belanja pegawai', '2015-11-07', '2015-11-10', '2015-12-05', '2015-11-29', '-', 2014, 'Triwulan I'),
(5, 24, 'Pembelian sepeda motor', 'asd', 'asd', '50000000', 'Penunjukan Langsung', 'Belanja Langsung', 'Belanja Pegawai', 'Belanja pegawai', '2015-10-29', '0000-00-00', '0000-00-00', '0000-00-00', '-', 2015, 'Triwulan I'),
(6, 23, 'Pembelian baju dinas', '10 unit', 'Baju', '25000000', 'Penunjukan Langsung', 'Belanja Langsung', 'Belanja Pegawai', 'Belanja pegawai', '2015-11-20', '2015-11-20', '2015-11-22', '2015-12-03', '-', 2015, 'Triwulan II'),
(7, 10, 'Pembelian baju dinas', '10', 'Baju', '15000000', 'Pelelangan Umum', 'Belanja Langsung', 'Belanja Pegawai', 'Belanja pegawai', '2015-12-03', '2015-11-21', '2015-11-23', '2015-11-28', '', 2015, 'Triwulan I');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_kegiatan_renja`
--

CREATE TABLE IF NOT EXISTS `lokasi_kegiatan_renja` (
  `id` bigint(20) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `lokasi` enum('Kabupaten','detail') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(256) NOT NULL DEFAULT '',
  `body` text,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_by` enum('sender','receiver') DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `subject`, `body`, `is_read`, `deleted_by`, `created_at`) VALUES
(1, 3, 2, 'sdas', '<div class="post-text" itemprop="text">\r\n\r\n<p>As title says I want to cut a string without breaking any words or HTML tags, now I found this function which sorts the html tags problem out <em>(slightly modified by myself)</em></p>\r\n\r\n<pre style="" class="lang-php prettyprint prettyprinted"><code><span class="kwd">function</span><span class="pln"> substrhtml</span><span class="pun">(</span><span class="pln">$str</span><span class="pun">,</span><span class="pln">$start</span><span class="pun">,</span><span class="pln">$len</span><span class="pun">){</span><span class="pln">\r\n\r\n    $str_clean </span><span class="pun">=</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">strip_tags</span><span class="pun">(</span><span class="pln">$str</span><span class="pun">),</span><span class="pln">$start</span><span class="pun">,</span><span class="pln">$len</span><span class="pun">);</span><span class="pln">\r\n\r\n    </span><span class="kwd">if</span><span class="pun">(</span><span class="pln">preg_match_all</span><span class="pun">(</span><span class="str">''/\\&lt;[^&gt;]+&gt;/is''</span><span class="pun">,</span><span class="pln">$str</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">,</span><span class="pln">PREG_OFFSET_CAPTURE</span><span class="pun">)){</span><span class="pln">\r\n\r\n        </span><span class="kwd">for</span><span class="pun">(</span><span class="pln">$i</span><span class="pun">=</span><span class="lit">0</span><span class="pun">;</span><span class="pln">$i</span><span class="pun">&lt;</span><span class="pln">count</span><span class="pun">(</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">]);</span><span class="pln">$i</span><span class="pun">++){</span><span class="pln">\r\n\r\n            </span><span class="kwd">if</span><span class="pun">(</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">1</span><span class="pun">]</span><span class="pln"> </span><span class="pun">&lt;</span><span class="pln"> $len</span><span class="pun">){</span><span class="pln">\r\n\r\n                $str_clean </span><span class="pun">=</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">$str_clean</span><span class="pun">,</span><span class="lit">0</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">1</span><span class="pun">])</span><span class="pln"> </span><span class="pun">.</span><span class="pln"> $matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">0</span><span class="pun">]</span><span class="pln"> </span><span class="pun">.</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">$str_clean</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">1</span><span class="pun">]);</span><span class="pln">\r\n\r\n            </span><span class="pun">}</span><span class="kwd">else</span><span class="pln"> </span><span class="kwd">if</span><span class="pun">(</span><span class="pln">preg_match</span><span class="pun">(</span><span class="str">''/\\&lt;[^&gt;]+&gt;$/is''</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">0</span><span class="pun">])){</span><span class="pln">\r\n\r\n                $str_clean </span><span class="pun">=</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">$str_clean</span><span class="pun">,</span><span class="lit">0</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">1</span><span class="pun">])</span><span class="pln"> </span><span class="pun">.</span><span class="pln"> $matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">0</span><span class="pun">]</span><span class="pln"> </span><span class="pun">.</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">$str_clean</span><span class="pun">,</span><span class="pln">$matches</span><span class="pun">[</span><span class="lit">0</span><span class="pun">][</span><span class="pln">$i</span><span class="pun">][</span><span class="lit">1</span><span class="pun">]);</span><span class="pln">\r\n\r\n                </span><span class="kwd">break</span><span class="pun">;</span><span class="pln">\r\n\r\n            </span><span class="pun">}</span><span class="pln">\r\n\r\n        </span><span class="pun">}</span><span class="pln">\r\n\r\n        </span><span class="kwd">return</span><span class="pln"> $str_clean</span><span class="pun">;</span><span class="pln">\r\n\r\n    </span><span class="pun">}</span><span class="kwd">else</span><span class="pun">{</span><span class="pln">\r\n\r\n        </span><span class="kwd">return</span><span class="pln"> substr</span><span class="pun">(</span><span class="pln">$str</span><span class="pun">,</span><span class="pln">$start</span><span class="pun">,</span><span class="pln">$len</span><span class="pun">);</span><span class="pln">\r\n\r\n    </span><span class="pun">}</span><span class="pln">\r\n\r\n</span><span class="pun">}</span></code></pre>\r\n\r\n<p><a href="http://littlebearisland.com/entry113.html" rel="nofollow">Source</a></p>\r\n\r\n<p>but it still cuts words in half mid sentence which I don''t want to happen, any ideas on how to sort this?</p>\r\n\r\n<p>As always any help is appreciated and thanks in advance.</p>\r\n    </div>', '1', 'receiver', '2015-07-29 19:21:06'),
(2, 3, 25, 'ads', 'asdasdasda', '1', NULL, '2015-08-06 12:13:58'),
(3, 1, 2, 'Re: asdad', 'sdsds', '1', 'receiver', '2015-11-10 17:58:08'),
(4, 2, 1, 'asd', 'asdasd', '1', 'sender', '2015-11-09 21:45:04'),
(5, 1, 2, 'asd', 'asd', '1', 'receiver', '2015-11-02 13:02:08'),
(21, 1, 2, 'asd', 'asd', '1', 'receiver', '2015-11-10 17:56:48'),
(24, 2, 3, 'sa', 'asdasd', '0', NULL, '2016-07-18 23:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE IF NOT EXISTS `misi` (
  `id` int(11) NOT NULL,
  `tahun_rpjmd` int(100) NOT NULL,
  `misi` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `tahun_rpjmd`, `misi`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 1, 'Mewujudkan Pemerintahan Yang Bersih', '<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:RelyOnVML/>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--></p><p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="&#45;-"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman","serif";}\r\n</style>\r\n<![endif]--></p><p>Pemerintahan yang yang bersih mempunyai makna bahwa proses penyusunan kebijakan, dan perencanaan pembangunan melalui proses yang demokratis dan transparan dengan mengikutsertakan masyarakat sehingga kebijakan yang dikeluarkan oleh pemerintah memenuhi azas keadilan. Pemerintahan yang akuntabel menggambarkan kemampuan untuk menjawab harapan masyarakat berupa pemerintahan yang bersih, profesional, dan mampu memberikan pelayanan yang terbaik bagi warga kota serta pertanggungjawaban secara konstruktif dan proporsional.</p><p>Untuk itu, <strong>tujuan</strong> yang akan diwujudkan sebagai cermin dari penyelesaian perjalanan misi ke-1 ini pada akhir nantinya adalah <em>meningkatnya kualitas tata kelola pemerintah yang baik</em>.&nbsp; Berdasarkan tujuan yang akan diwujudkan sebagai bentuk akhir dalam menjalankan misi guna mendukung terwujudnya visi yang dicita-citakan maka <strong>sasaran</strong> pembangunan yang ditetapkan adalah :</p><p>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Meningkatnya kinerja PNS / THL di lingkungan Pemerintahan Kota Pematangsiantar;</p><p>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Terwujudnya pemerintahan yang responsif, transparan dan akuntabel<em>.</em></p>', '2016-06-30 14:19:23', '2', '2016-06-30 14:21:08', '2');

-- --------------------------------------------------------

--
-- Table structure for table `musrenbang_kegiatan_rpjmd`
--

CREATE TABLE IF NOT EXISTS `musrenbang_kegiatan_rpjmd` (
  `id` bigint(100) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `indikator_kinerja` text NOT NULL,
  `kondisi_kinerja_awal` varchar(255) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `target_tahun1` bigint(20) NOT NULL,
  `dana_tahun1` bigint(20) NOT NULL,
  `target_tahun2` bigint(20) NOT NULL,
  `dana_tahun2` bigint(20) NOT NULL,
  `target_tahun3` bigint(20) NOT NULL,
  `dana_tahun3` bigint(20) NOT NULL,
  `target_tahun4` bigint(20) NOT NULL,
  `dana_tahun4` bigint(20) NOT NULL,
  `target_tahun5` bigint(20) NOT NULL,
  `dana_tahun5` bigint(20) NOT NULL,
  `target_akhir` bigint(20) NOT NULL,
  `dana_akhir` bigint(20) NOT NULL,
  `status_verifikasi` enum('Belum Diverifikasi','Diizinkan','Tidak Diizinkan') NOT NULL,
  `alasan_tolak` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `satuan_target_kinerja` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musrenbang_kegiatan_rpjmd`
--

INSERT INTO `musrenbang_kegiatan_rpjmd` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `indikator_kinerja`, `kondisi_kinerja_awal`, `id_rpjmd`, `target_tahun1`, `dana_tahun1`, `target_tahun2`, `dana_tahun2`, `target_tahun3`, `dana_tahun3`, `target_tahun4`, `dana_tahun4`, `target_tahun5`, `dana_tahun5`, `target_akhir`, `dana_akhir`, `status_verifikasi`, `alasan_tolak`, `created_date`, `created_by`, `mod_date`, `mod_by`, `satuan_target_kinerja`) VALUES
(1, 1, 20, 51, 10, 24, 'a', 'b', 1, 0, 2000000, 0, 3000000, 0, 4000000, 0, 5000000, 0, 6000000, 0, 20000000, 'Diizinkan', '', '2016-08-06 10:20:11', '2', '2016-08-11 14:59:46', '2', 'km'),
(2, 1, 20, 51, 11, 24, '', '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Diizinkan', '', '2016-08-11 13:57:56', '2', '2016-08-14 16:35:41', '2', ''),
(3, 1, 20, 51, 9, 25, 'c', 'd', 1, 0, 1000000, 0, 2500000, 0, 3000000, 0, 25470000, 0, 45454544, 0, 77424544, 'Diizinkan', '', '2016-08-11 18:44:00', '2', '2016-08-11 18:46:06', '2', 'ton'),
(4, 1, 20, 52, 16, 24, '', 'd', 1, 0, 12, 0, 23, 0, 34, 0, 45, 0, 56, 0, 170, 'Diizinkan', '', '0000-00-00 00:00:00', '', '2016-08-14 16:34:56', '2', ''),
(5, 1, 20, 51, 12, 24, 'asd', 'go', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Diizinkan', '', '0000-00-00 00:00:00', '', '2016-08-14 16:45:52', '2', 'efek'),
(6, 1, 20, 51, 11, 25, '', 'asd', 1, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Diizinkan', '', '2016-08-14 16:37:32', '2', '2016-08-14 16:39:25', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `panduan_usulan`
--

CREATE TABLE IF NOT EXISTS `panduan_usulan` (
  `id` int(11) NOT NULL,
  `jenis_usulan` int(11) NOT NULL,
  `nama_usulan` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panduan_usulan`
--

INSERT INTO `panduan_usulan` (`id`, `jenis_usulan`, `nama_usulan`, `harga`, `satuan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 1, 'Jembatan Bentang Lebar 8m ', 5475927, 'm2', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 2, '1 paket bibit perikanan (lele 500 ekor dan pakan 30kg) ', 680000, 'paket', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 1, 'Konstruksi Jalan Paving Baru Lebar 2m ', 779128, 'm', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 2, '1 paket bibit perikanan (nila 500 ekor dan pakan 30kg) ', 617500, 'paket', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `partisipatif`
--

CREATE TABLE IF NOT EXISTS `partisipatif` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) DEFAULT '0',
  `kunci` tinyint(4) DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_indikatif` bigint(20) NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_program` varchar(111) NOT NULL,
  `target_hasil_program` varchar(111) NOT NULL,
  `tolak_ukur_keluaran_kegiatan` varchar(111) NOT NULL,
  `target_keluaran_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_kegiatan` varchar(111) NOT NULL,
  `target_hasil_kegiatan` varchar(111) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status_usulan` enum('Terima','Tolak') NOT NULL,
  `keterangan_status_usulan` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan_dasar`
--

CREATE TABLE IF NOT EXISTS `pelayanan_dasar` (
  `id` bigint(20) NOT NULL,
  `pelayanan_dasar` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayanan_dasar`
--

INSERT INTO `pelayanan_dasar` (`id`, `pelayanan_dasar`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 'Pelayanan Kesehatan Dasar', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Pelayanan Kesehatan Rujukan', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Penyelidikan', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'Promosi', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE IF NOT EXISTS `pemberitahuan` (
  `id` bigint(20) NOT NULL,
  `pesan` text NOT NULL,
  `link` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `pesan`, `link`, `created_date`, `created_by`, `mod_date`, `mod_by`, `status`) VALUES
(1, 'BADAN KEPEGAWAIAN DAERAH menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=6', '2016-07-04 22:58:40', '2', '2016-07-19 02:37:24', '2', 1),
(2, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=10', '2016-07-04 23:13:55', '2', '0000-00-00 00:00:00', '', 1),
(3, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=11', '2016-07-06 15:41:42', '2', '2016-07-19 12:07:48', '2', 1),
(4, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=13', '2016-07-07 00:15:22', '3', '2016-07-21 16:43:21', '2', 1),
(5, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=15', '2016-07-14 16:36:35', '2', '2016-07-21 16:42:51', '2', 1),
(6, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=16', '2016-07-14 16:37:23', '2', '2016-07-19 12:07:53', '2', 1),
(7, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=17', '2016-07-14 19:32:42', '2', '2016-07-18 23:45:14', '2', 1),
(8, 'Badan Pemberdayaan Masyarakat menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=18', '2016-07-15 17:41:50', '2', '2016-07-18 23:45:10', '2', 1),
(9, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=19', '2016-07-27 11:18:56', '2', '2016-07-27 11:25:10', '2', 1),
(10, 'Badan Lingkungan Hidup, Kebersihan Dan Pertamanan menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=22', '2016-07-28 18:15:41', '2', '0000-00-00 00:00:00', '', 0),
(11, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=24', '2016-08-02 04:31:45', '2', '0000-00-00 00:00:00', '', 0),
(12, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=25', '2016-08-06 02:24:21', '2', '0000-00-00 00:00:00', '', 0),
(13, 'Badan Kepegawaian Daerah menambahkan Renja yang bukan berdasarkan Renstra.', 'index.php?r=renja/view&id=27', '2016-08-06 03:03:36', '2', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penanggungjawabanggarandpa`
--

CREATE TABLE IF NOT EXISTS `penanggungjawabanggarandpa` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pokok_pikiran_dprd`
--

CREATE TABLE IF NOT EXISTS `pokok_pikiran_dprd` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) NOT NULL DEFAULT '0',
  `kunci` tinyint(4) NOT NULL DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_tahun_1` bigint(20) NOT NULL,
  `pagu_tahun_2` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status` varchar(155) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokok_pikiran_dprd`
--

INSERT INTO `pokok_pikiran_dprd` (`id`, `kd_skpd`, `kd_urusan`, `kd_bidang`, `kd_kegiatan`, `tahun`, `kunci`, `sasaran_daerah`, `prioritas_daerah`, `sasaran_kegiatan`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`, `uraian`, `kecamatan`, `kelurahan`, `volume`, `satuan`, `pagu_tahun_1`, `pagu_tahun_2`, `sumber_dana`, `urutan`, `sumber_usulan`, `status`, `status_forum_skpd`, `keterangan_forum_skpd`, `foto`, `kd_prog`, `latitude`, `longitude`) VALUES
(1, 24, 1, 20, 15, 2017, 0, '1', '3', 'aasd', '', '2016-08-18 09:07:40', '2', '2016-08-18 09:25:47', '2', 'asd', 3, 22, '45', 'dfgds', 6768, 8568, 1, '', 'Pokok Pikiran Dprd', 'lanjut', 'Terima', '', '', 52, '', ''),
(2, 25, 1, 20, 11, 2017, 0, '3', '3', 'asd', '', '2016-08-18 10:13:06', '2', '0000-00-00 00:00:00', '', 'asd', 4, 2, '34', 'km', 500000000, 700000000, 1, '', 'Pokok Pikiran Dprd', '', 'Terima', '', 'DSC_0027.JPG', 51, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `politis`
--

CREATE TABLE IF NOT EXISTS `politis` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) DEFAULT '0',
  `kunci` tinyint(4) DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_indikatif` bigint(20) NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_program` varchar(111) NOT NULL,
  `target_hasil_program` varchar(111) NOT NULL,
  `tolak_ukur_keluaran_kegiatan` varchar(111) NOT NULL,
  `target_keluaran_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_kegiatan` varchar(111) NOT NULL,
  `target_hasil_kegiatan` varchar(111) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status_usulan` enum('Terima','Tolak') NOT NULL,
  `keterangan_status_usulan` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppas`
--

CREATE TABLE IF NOT EXISTS `ppas` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `sasaran` text NOT NULL,
  `target` text NOT NULL,
  `plafon_anggaran` bigint(20) NOT NULL COMMENT 'Plafon Anggaran Sementara',
  `plafon_anggaran_setelah_perubahan` int(11) NOT NULL DEFAULT '0',
  `skpd` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `id_musrenbang_kota` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `is_perubahan` int(11) NOT NULL DEFAULT '0',
  `status_ppas` varchar(111) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppas`
--

INSERT INTO `ppas` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `target`, `plafon_anggaran`, `plafon_anggaran_setelah_perubahan`, `skpd`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang_kota`, `tahun`, `is_perubahan`, `status_ppas`) VALUES
(1, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 2, 2017, 0, ''),
(2, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 3, 2017, 0, ''),
(3, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 4, 2017, 0, ''),
(4, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 6, 2017, 0, ''),
(5, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 7, 2017, 0, ''),
(6, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 8, 2017, 0, ''),
(7, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 10, 2017, 0, ''),
(8, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 11, 2017, 0, ''),
(9, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 12, 2017, 0, ''),
(10, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 14, 2017, 0, ''),
(11, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 15, 2017, 0, ''),
(12, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 16, 2017, 0, ''),
(13, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 18, 2017, 0, ''),
(14, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 19, 2017, 0, ''),
(15, 1, 1, 1, 1, '', '', 2500000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 20, 2017, 0, ''),
(16, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 22, 2017, 0, ''),
(17, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 23, 2017, 0, ''),
(18, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 24, 2017, 0, ''),
(19, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 26, 2017, 0, ''),
(20, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 27, 2017, 0, ''),
(21, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 28, 2017, 0, ''),
(22, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 30, 2017, 0, ''),
(23, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 31, 2017, 0, ''),
(24, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 32, 2017, 0, ''),
(25, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 34, 2017, 0, ''),
(26, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 35, 2017, 0, ''),
(27, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 36, 2017, 0, ''),
(28, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 38, 2017, 0, ''),
(29, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 39, 2017, 0, ''),
(30, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 40, 2017, 0, ''),
(31, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 42, 2017, 0, ''),
(32, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 43, 2017, 0, ''),
(33, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 44, 2017, 0, ''),
(34, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 46, 2017, 0, ''),
(35, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 47, 2017, 0, ''),
(36, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 48, 2017, 0, ''),
(37, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 50, 2017, 0, ''),
(38, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 51, 2017, 0, ''),
(39, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 52, 2017, 0, ''),
(40, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 54, 2017, 0, ''),
(41, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 55, 2017, 0, ''),
(42, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 56, 2017, 0, ''),
(43, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 58, 2017, 0, ''),
(44, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 59, 2017, 0, ''),
(45, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 60, 2017, 0, ''),
(46, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 62, 2017, 0, ''),
(47, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 63, 2017, 0, ''),
(48, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 64, 2017, 0, ''),
(49, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 66, 2017, 0, ''),
(50, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 67, 2017, 0, ''),
(51, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 68, 2017, 0, ''),
(52, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 70, 2017, 0, ''),
(53, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 71, 2017, 0, ''),
(54, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 72, 2017, 0, ''),
(55, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 74, 2017, 0, ''),
(56, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 75, 2017, 0, ''),
(57, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 76, 2017, 0, ''),
(58, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 78, 2017, 0, ''),
(59, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 79, 2017, 0, ''),
(60, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 80, 2017, 0, ''),
(61, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 82, 2017, 0, ''),
(62, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 83, 2017, 0, ''),
(63, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 84, 2017, 0, ''),
(64, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 86, 2017, 0, ''),
(65, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 87, 2017, 0, ''),
(66, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 88, 2017, 0, ''),
(67, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 90, 2017, 0, ''),
(68, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 91, 2017, 0, ''),
(69, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 92, 2017, 0, ''),
(70, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 94, 2017, 0, ''),
(71, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 95, 2017, 0, ''),
(72, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 96, 2017, 0, ''),
(73, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 98, 2017, 0, ''),
(74, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 99, 2017, 0, ''),
(75, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 100, 2017, 0, ''),
(76, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 102, 2017, 0, ''),
(77, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 103, 2017, 0, ''),
(78, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 104, 2017, 0, ''),
(79, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 106, 2017, 0, ''),
(80, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 107, 2017, 0, ''),
(81, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 108, 2017, 0, ''),
(82, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 110, 2017, 0, ''),
(83, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 111, 2017, 0, ''),
(84, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 112, 2017, 0, ''),
(85, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 114, 2017, 0, ''),
(86, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 115, 2017, 0, ''),
(87, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 116, 2017, 0, ''),
(88, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 118, 2017, 0, ''),
(89, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 119, 2017, 0, ''),
(90, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 120, 2017, 0, ''),
(91, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 122, 2017, 0, ''),
(92, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 123, 2017, 0, ''),
(93, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 124, 2017, 0, ''),
(94, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 126, 2017, 0, ''),
(95, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 127, 2017, 0, ''),
(96, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 128, 2017, 0, ''),
(97, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 130, 2017, 0, ''),
(98, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 131, 2017, 0, ''),
(99, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 132, 2017, 0, ''),
(100, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 134, 2017, 0, ''),
(101, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 135, 2017, 0, ''),
(102, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 136, 2017, 0, ''),
(103, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 138, 2017, 0, ''),
(104, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 139, 2017, 0, ''),
(105, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 140, 2017, 0, ''),
(106, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 142, 2017, 0, ''),
(107, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 143, 2017, 0, ''),
(108, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 144, 2017, 0, ''),
(109, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 146, 2017, 0, ''),
(110, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 147, 2017, 0, ''),
(111, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 148, 2017, 0, ''),
(112, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 150, 2017, 0, ''),
(113, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 151, 2017, 0, ''),
(114, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 152, 2017, 0, ''),
(115, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 154, 2017, 0, ''),
(116, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 155, 2017, 0, ''),
(117, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 156, 2017, 0, ''),
(118, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 158, 2017, 0, ''),
(119, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 159, 2017, 0, ''),
(120, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 160, 2017, 0, ''),
(121, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 162, 2017, 0, ''),
(122, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 163, 2017, 0, ''),
(123, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 164, 2017, 0, ''),
(124, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 166, 2017, 0, ''),
(125, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 167, 2017, 0, ''),
(126, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 168, 2017, 0, ''),
(127, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 170, 2017, 0, ''),
(128, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 171, 2017, 0, ''),
(129, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 172, 2017, 0, ''),
(130, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 174, 2017, 0, ''),
(131, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 175, 2017, 0, ''),
(132, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 176, 2017, 0, ''),
(133, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 178, 2017, 0, ''),
(134, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 179, 2017, 0, ''),
(135, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 180, 2017, 0, ''),
(136, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 182, 2017, 0, ''),
(137, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 183, 2017, 0, ''),
(138, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 184, 2017, 0, ''),
(139, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 186, 2017, 0, ''),
(140, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 187, 2017, 0, ''),
(141, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 188, 2017, 0, ''),
(142, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 190, 2017, 0, ''),
(143, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 191, 2017, 0, ''),
(144, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 192, 2017, 0, ''),
(145, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 194, 2017, 0, ''),
(146, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 195, 2017, 0, ''),
(147, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 196, 2017, 0, ''),
(148, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 198, 2017, 0, ''),
(149, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 199, 2017, 0, ''),
(150, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 200, 2017, 0, ''),
(151, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 202, 2017, 0, ''),
(152, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 203, 2017, 0, ''),
(153, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 204, 2017, 0, ''),
(154, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 206, 2017, 0, ''),
(155, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 207, 2017, 0, ''),
(156, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 208, 2017, 0, ''),
(157, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 210, 2017, 0, ''),
(158, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 211, 2017, 0, ''),
(159, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 212, 2017, 0, ''),
(160, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 214, 2017, 0, ''),
(161, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 215, 2017, 0, ''),
(162, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 216, 2017, 0, ''),
(163, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 218, 2017, 0, ''),
(164, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 219, 2017, 0, ''),
(165, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 220, 2017, 0, ''),
(166, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 222, 2017, 0, ''),
(167, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 223, 2017, 0, ''),
(168, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 224, 2017, 0, ''),
(169, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 226, 2017, 0, ''),
(170, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 227, 2017, 0, ''),
(171, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 228, 2017, 0, ''),
(172, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 230, 2017, 0, ''),
(173, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 231, 2017, 0, ''),
(174, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 232, 2017, 0, ''),
(175, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 234, 2017, 0, ''),
(176, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 235, 2017, 0, ''),
(177, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 236, 2017, 0, ''),
(178, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 238, 2017, 0, ''),
(179, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 239, 2017, 0, ''),
(180, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 240, 2017, 0, ''),
(181, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 242, 2017, 0, ''),
(182, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 243, 2017, 0, ''),
(183, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 244, 2017, 0, ''),
(184, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 246, 2017, 0, ''),
(185, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 247, 2017, 0, ''),
(186, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 248, 2017, 0, ''),
(187, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 250, 2017, 0, ''),
(188, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 251, 2017, 0, ''),
(189, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 252, 2017, 0, ''),
(190, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 254, 2017, 0, ''),
(191, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 255, 2017, 0, ''),
(192, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 256, 2017, 0, ''),
(193, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 258, 2017, 0, ''),
(194, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 259, 2017, 0, ''),
(195, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 260, 2017, 0, ''),
(196, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 262, 2017, 0, ''),
(197, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 263, 2017, 0, ''),
(198, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 264, 2017, 0, ''),
(199, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 266, 2017, 0, ''),
(200, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 267, 2017, 0, ''),
(201, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 268, 2017, 0, ''),
(202, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 270, 2017, 0, ''),
(203, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 271, 2017, 0, ''),
(204, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 272, 2017, 0, ''),
(205, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 274, 2017, 0, ''),
(206, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 275, 2017, 0, ''),
(207, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 276, 2017, 0, ''),
(208, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 278, 2017, 0, ''),
(209, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 279, 2017, 0, ''),
(210, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 280, 2017, 0, ''),
(211, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 282, 2017, 0, ''),
(212, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 283, 2017, 0, ''),
(213, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 284, 2017, 0, ''),
(214, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 286, 2017, 0, ''),
(215, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 287, 2017, 0, ''),
(216, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 288, 2017, 0, ''),
(217, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 290, 2017, 0, ''),
(218, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 291, 2017, 0, ''),
(219, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 292, 2017, 0, ''),
(220, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 294, 2017, 0, ''),
(221, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 295, 2017, 0, ''),
(222, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 296, 2017, 0, ''),
(223, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 298, 2017, 0, ''),
(224, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 299, 2017, 0, ''),
(225, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 300, 2017, 0, ''),
(226, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 302, 2017, 0, ''),
(227, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 303, 2017, 0, ''),
(228, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 304, 2017, 0, ''),
(229, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 306, 2017, 0, ''),
(230, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 307, 2017, 0, ''),
(231, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 308, 2017, 0, ''),
(232, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 310, 2017, 0, ''),
(233, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 311, 2017, 0, ''),
(234, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 312, 2017, 0, ''),
(235, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 314, 2017, 0, ''),
(236, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 315, 2017, 0, ''),
(237, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 316, 2017, 0, ''),
(238, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 318, 2017, 0, ''),
(239, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 319, 2017, 0, ''),
(240, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 320, 2017, 0, ''),
(241, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 322, 2017, 0, ''),
(242, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 323, 2017, 0, ''),
(243, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 324, 2017, 0, ''),
(244, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 326, 2017, 0, ''),
(245, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 327, 2017, 0, ''),
(246, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 328, 2017, 0, ''),
(247, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 330, 2017, 0, ''),
(248, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 331, 2017, 0, ''),
(249, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 332, 2017, 0, ''),
(250, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 334, 2017, 0, ''),
(251, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 335, 2017, 0, ''),
(252, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 336, 2017, 0, ''),
(253, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 338, 2017, 0, ''),
(254, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 339, 2017, 0, ''),
(255, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 340, 2017, 0, ''),
(256, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 342, 2017, 0, ''),
(257, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 343, 2017, 0, ''),
(258, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 344, 2017, 0, ''),
(259, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 346, 2017, 0, ''),
(260, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 347, 2017, 0, ''),
(261, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 348, 2017, 0, ''),
(262, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 350, 2017, 0, ''),
(263, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 351, 2017, 0, ''),
(264, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 352, 2017, 0, ''),
(265, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 354, 2017, 0, ''),
(266, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 355, 2017, 0, ''),
(267, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 356, 2017, 0, ''),
(268, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 358, 2017, 0, ''),
(269, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 359, 2017, 0, ''),
(270, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 360, 2017, 0, ''),
(271, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 362, 2017, 0, ''),
(272, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 363, 2017, 0, ''),
(273, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 364, 2017, 0, ''),
(274, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 366, 2017, 0, ''),
(275, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 367, 2017, 0, ''),
(276, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 368, 2017, 0, ''),
(277, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 370, 2017, 0, ''),
(278, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 371, 2017, 0, ''),
(279, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 372, 2017, 0, ''),
(280, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 374, 2017, 0, ''),
(281, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 375, 2017, 0, ''),
(282, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 376, 2017, 0, ''),
(283, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 378, 2017, 0, ''),
(284, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 379, 2017, 0, ''),
(285, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 380, 2017, 0, ''),
(286, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 382, 2017, 0, ''),
(287, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 383, 2017, 0, ''),
(288, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 384, 2017, 0, ''),
(289, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 386, 2017, 0, ''),
(290, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 387, 2017, 0, ''),
(291, 1, 1, 1, 5, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 390, 2017, 0, ''),
(292, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 391, 2017, 0, ''),
(293, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 392, 2017, 0, ''),
(294, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 393, 2017, 0, ''),
(295, 1, 1, 1, 6, '', '', 21500000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 394, 2017, 0, ''),
(296, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 395, 2017, 0, ''),
(297, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 396, 2017, 0, ''),
(298, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 397, 2017, 0, ''),
(299, 1, 1, 1, 5, '', '', 123123123123, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 398, 2017, 0, ''),
(300, 1, 1, 1, 1, '', '', 123000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 399, 2017, 0, ''),
(301, 1, 1, 1, 5, '', '', 21000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 400, 2017, 0, ''),
(302, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 401, 2017, 0, ''),
(303, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 2017, 0, ''),
(304, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 3, 2017, 0, ''),
(305, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 4, 2017, 0, ''),
(306, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 6, 2017, 0, ''),
(307, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 7, 2017, 0, ''),
(308, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 8, 2017, 0, ''),
(309, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 10, 2017, 0, ''),
(310, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 11, 2017, 0, ''),
(311, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 12, 2017, 0, ''),
(312, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 14, 2017, 0, ''),
(313, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 15, 2017, 0, ''),
(314, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 16, 2017, 0, ''),
(315, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 18, 2017, 0, ''),
(316, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 19, 2017, 0, ''),
(317, 1, 1, 1, 1, '', '', 2500000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 20, 2017, 0, ''),
(318, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 22, 2017, 0, ''),
(319, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 23, 2017, 0, ''),
(320, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 24, 2017, 0, ''),
(321, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 26, 2017, 0, ''),
(322, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 27, 2017, 0, ''),
(323, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 28, 2017, 0, ''),
(324, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 30, 2017, 0, ''),
(325, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 31, 2017, 0, ''),
(326, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 32, 2017, 0, ''),
(327, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 34, 2017, 0, ''),
(328, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 35, 2017, 0, ''),
(329, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 36, 2017, 0, ''),
(330, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 38, 2017, 0, ''),
(331, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 39, 2017, 0, ''),
(332, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 40, 2017, 0, ''),
(333, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 42, 2017, 0, ''),
(334, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 43, 2017, 0, ''),
(335, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 44, 2017, 0, ''),
(336, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 46, 2017, 0, ''),
(337, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 47, 2017, 0, ''),
(338, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 48, 2017, 0, ''),
(339, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 50, 2017, 0, ''),
(340, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 51, 2017, 0, ''),
(341, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 52, 2017, 0, ''),
(342, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 54, 2017, 0, ''),
(343, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 55, 2017, 0, ''),
(344, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 56, 2017, 0, ''),
(345, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 58, 2017, 0, ''),
(346, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 59, 2017, 0, ''),
(347, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 60, 2017, 0, ''),
(348, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 62, 2017, 0, ''),
(349, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 63, 2017, 0, ''),
(350, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 64, 2017, 0, ''),
(351, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 66, 2017, 0, ''),
(352, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 67, 2017, 0, ''),
(353, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 68, 2017, 0, ''),
(354, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 70, 2017, 0, ''),
(355, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 71, 2017, 0, ''),
(356, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 72, 2017, 0, ''),
(357, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 74, 2017, 0, ''),
(358, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 75, 2017, 0, ''),
(359, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 76, 2017, 0, ''),
(360, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 78, 2017, 0, ''),
(361, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 79, 2017, 0, ''),
(362, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 80, 2017, 0, ''),
(363, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 82, 2017, 0, ''),
(364, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 83, 2017, 0, ''),
(365, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 84, 2017, 0, ''),
(366, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 86, 2017, 0, ''),
(367, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 87, 2017, 0, ''),
(368, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 88, 2017, 0, ''),
(369, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 90, 2017, 0, ''),
(370, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 91, 2017, 0, ''),
(371, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 92, 2017, 0, ''),
(372, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 94, 2017, 0, ''),
(373, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 95, 2017, 0, ''),
(374, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 96, 2017, 0, ''),
(375, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 98, 2017, 0, ''),
(376, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 99, 2017, 0, ''),
(377, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 100, 2017, 0, ''),
(378, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 102, 2017, 0, ''),
(379, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 103, 2017, 0, ''),
(380, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 104, 2017, 0, ''),
(381, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 106, 2017, 0, ''),
(382, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 107, 2017, 0, ''),
(383, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 108, 2017, 0, ''),
(384, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 110, 2017, 0, ''),
(385, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 111, 2017, 0, ''),
(386, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 112, 2017, 0, ''),
(387, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 114, 2017, 0, ''),
(388, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 115, 2017, 0, ''),
(389, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 116, 2017, 0, ''),
(390, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 118, 2017, 0, ''),
(391, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 119, 2017, 0, ''),
(392, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 120, 2017, 0, ''),
(393, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 122, 2017, 0, ''),
(394, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 123, 2017, 0, ''),
(395, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 124, 2017, 0, ''),
(396, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 126, 2017, 0, ''),
(397, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 127, 2017, 0, ''),
(398, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 128, 2017, 0, ''),
(399, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 130, 2017, 0, ''),
(400, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 131, 2017, 0, ''),
(401, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 132, 2017, 0, ''),
(402, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 134, 2017, 0, ''),
(403, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 135, 2017, 0, ''),
(404, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 136, 2017, 0, ''),
(405, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 138, 2017, 0, ''),
(406, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 139, 2017, 0, ''),
(407, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 140, 2017, 0, ''),
(408, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 142, 2017, 0, ''),
(409, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 143, 2017, 0, ''),
(410, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 144, 2017, 0, ''),
(411, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 146, 2017, 0, ''),
(412, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 147, 2017, 0, ''),
(413, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 148, 2017, 0, ''),
(414, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 150, 2017, 0, ''),
(415, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 151, 2017, 0, ''),
(416, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 152, 2017, 0, ''),
(417, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 154, 2017, 0, '');
INSERT INTO `ppas` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `target`, `plafon_anggaran`, `plafon_anggaran_setelah_perubahan`, `skpd`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang_kota`, `tahun`, `is_perubahan`, `status_ppas`) VALUES
(418, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 155, 2017, 0, ''),
(419, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 156, 2017, 0, ''),
(420, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 158, 2017, 0, ''),
(421, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 159, 2017, 0, ''),
(422, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 160, 2017, 0, ''),
(423, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 162, 2017, 0, ''),
(424, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 163, 2017, 0, ''),
(425, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 164, 2017, 0, ''),
(426, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 166, 2017, 0, ''),
(427, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 167, 2017, 0, ''),
(428, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 168, 2017, 0, ''),
(429, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 170, 2017, 0, ''),
(430, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 171, 2017, 0, ''),
(431, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 172, 2017, 0, ''),
(432, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 174, 2017, 0, ''),
(433, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 175, 2017, 0, ''),
(434, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 176, 2017, 0, ''),
(435, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 178, 2017, 0, ''),
(436, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 179, 2017, 0, ''),
(437, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 180, 2017, 0, ''),
(438, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 182, 2017, 0, ''),
(439, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 183, 2017, 0, ''),
(440, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 184, 2017, 0, ''),
(441, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 186, 2017, 0, ''),
(442, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 187, 2017, 0, ''),
(443, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 188, 2017, 0, ''),
(444, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 190, 2017, 0, ''),
(445, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 191, 2017, 0, ''),
(446, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 192, 2017, 0, ''),
(447, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 194, 2017, 0, ''),
(448, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 195, 2017, 0, ''),
(449, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 196, 2017, 0, ''),
(450, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 198, 2017, 0, ''),
(451, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 199, 2017, 0, ''),
(452, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 200, 2017, 0, ''),
(453, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 202, 2017, 0, ''),
(454, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 203, 2017, 0, ''),
(455, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 204, 2017, 0, ''),
(456, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 206, 2017, 0, ''),
(457, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 207, 2017, 0, ''),
(458, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 208, 2017, 0, ''),
(459, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 210, 2017, 0, ''),
(460, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 211, 2017, 0, ''),
(461, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 212, 2017, 0, ''),
(462, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 214, 2017, 0, ''),
(463, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 215, 2017, 0, ''),
(464, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 216, 2017, 0, ''),
(465, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 218, 2017, 0, ''),
(466, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 219, 2017, 0, ''),
(467, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 220, 2017, 0, ''),
(468, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 222, 2017, 0, ''),
(469, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 223, 2017, 0, ''),
(470, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 224, 2017, 0, ''),
(471, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 226, 2017, 0, ''),
(472, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 227, 2017, 0, ''),
(473, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 228, 2017, 0, ''),
(474, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 230, 2017, 0, ''),
(475, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 231, 2017, 0, ''),
(476, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 232, 2017, 0, ''),
(477, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 234, 2017, 0, ''),
(478, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 235, 2017, 0, ''),
(479, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 236, 2017, 0, ''),
(480, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 238, 2017, 0, ''),
(481, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 239, 2017, 0, ''),
(482, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 240, 2017, 0, ''),
(483, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 242, 2017, 0, ''),
(484, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 243, 2017, 0, ''),
(485, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 244, 2017, 0, ''),
(486, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 246, 2017, 0, ''),
(487, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 247, 2017, 0, ''),
(488, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 248, 2017, 0, ''),
(489, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 250, 2017, 0, ''),
(490, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 251, 2017, 0, ''),
(491, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 252, 2017, 0, ''),
(492, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 254, 2017, 0, ''),
(493, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 255, 2017, 0, ''),
(494, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 256, 2017, 0, ''),
(495, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 258, 2017, 0, ''),
(496, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 259, 2017, 0, ''),
(497, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 260, 2017, 0, ''),
(498, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 262, 2017, 0, ''),
(499, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 263, 2017, 0, ''),
(500, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 264, 2017, 0, ''),
(501, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 266, 2017, 0, ''),
(502, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 267, 2017, 0, ''),
(503, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 268, 2017, 0, ''),
(504, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 270, 2017, 0, ''),
(505, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 271, 2017, 0, ''),
(506, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 272, 2017, 0, ''),
(507, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 274, 2017, 0, ''),
(508, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 275, 2017, 0, ''),
(509, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 276, 2017, 0, ''),
(510, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 278, 2017, 0, ''),
(511, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 279, 2017, 0, ''),
(512, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 280, 2017, 0, ''),
(513, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 282, 2017, 0, ''),
(514, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 283, 2017, 0, ''),
(515, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 284, 2017, 0, ''),
(516, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 286, 2017, 0, ''),
(517, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 287, 2017, 0, ''),
(518, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 288, 2017, 0, ''),
(519, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 290, 2017, 0, ''),
(520, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 291, 2017, 0, ''),
(521, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 292, 2017, 0, ''),
(522, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 294, 2017, 0, ''),
(523, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 295, 2017, 0, ''),
(524, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 296, 2017, 0, ''),
(525, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 298, 2017, 0, ''),
(526, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 299, 2017, 0, ''),
(527, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 300, 2017, 0, ''),
(528, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 302, 2017, 0, ''),
(529, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 303, 2017, 0, ''),
(530, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 304, 2017, 0, ''),
(531, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 306, 2017, 0, ''),
(532, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 307, 2017, 0, ''),
(533, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 308, 2017, 0, ''),
(534, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 310, 2017, 0, ''),
(535, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 311, 2017, 0, ''),
(536, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 312, 2017, 0, ''),
(537, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 314, 2017, 0, ''),
(538, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 315, 2017, 0, ''),
(539, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 316, 2017, 0, ''),
(540, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 318, 2017, 0, ''),
(541, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 319, 2017, 0, ''),
(542, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 320, 2017, 0, ''),
(543, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 322, 2017, 0, ''),
(544, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 323, 2017, 0, ''),
(545, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 324, 2017, 0, ''),
(546, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 326, 2017, 0, ''),
(547, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 327, 2017, 0, ''),
(548, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 328, 2017, 0, ''),
(549, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 330, 2017, 0, ''),
(550, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 331, 2017, 0, ''),
(551, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 332, 2017, 0, ''),
(552, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 334, 2017, 0, ''),
(553, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 335, 2017, 0, ''),
(554, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 336, 2017, 0, ''),
(555, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 338, 2017, 0, ''),
(556, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 339, 2017, 0, ''),
(557, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 340, 2017, 0, ''),
(558, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 342, 2017, 0, ''),
(559, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 343, 2017, 0, ''),
(560, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 344, 2017, 0, ''),
(561, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 346, 2017, 0, ''),
(562, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 347, 2017, 0, ''),
(563, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 348, 2017, 0, ''),
(564, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 350, 2017, 0, ''),
(565, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 351, 2017, 0, ''),
(566, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 352, 2017, 0, ''),
(567, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 354, 2017, 0, ''),
(568, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 355, 2017, 0, ''),
(569, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 356, 2017, 0, ''),
(570, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 358, 2017, 0, ''),
(571, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 359, 2017, 0, ''),
(572, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 360, 2017, 0, ''),
(573, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 362, 2017, 0, ''),
(574, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 363, 2017, 0, ''),
(575, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 364, 2017, 0, ''),
(576, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 366, 2017, 0, ''),
(577, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 367, 2017, 0, ''),
(578, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 368, 2017, 0, ''),
(579, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 370, 2017, 0, ''),
(580, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 371, 2017, 0, ''),
(581, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 372, 2017, 0, ''),
(582, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 374, 2017, 0, ''),
(583, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 375, 2017, 0, ''),
(584, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 376, 2017, 0, ''),
(585, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 378, 2017, 0, ''),
(586, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 379, 2017, 0, ''),
(587, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 380, 2017, 0, ''),
(588, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 382, 2017, 0, ''),
(589, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 383, 2017, 0, ''),
(590, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 384, 2017, 0, ''),
(591, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 386, 2017, 0, ''),
(592, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 387, 2017, 0, ''),
(593, 1, 1, 1, 5, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 390, 2017, 0, ''),
(594, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 391, 2017, 0, ''),
(595, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 392, 2017, 0, ''),
(596, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 393, 2017, 0, ''),
(597, 1, 1, 1, 6, '', '', 21500000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 394, 2017, 0, ''),
(598, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 395, 2017, 0, ''),
(599, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 396, 2017, 0, ''),
(600, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 397, 2017, 0, ''),
(601, 1, 1, 1, 5, '', '', 1, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 398, 2017, 0, ''),
(602, 1, 1, 1, 1, '', '', 123000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 399, 2017, 0, ''),
(603, 1, 1, 1, 5, '', '', 21000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 400, 2017, 0, ''),
(604, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 401, 2017, 0, ''),
(605, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 2017, 0, ''),
(606, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 3, 2017, 0, ''),
(607, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 4, 2017, 0, ''),
(608, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 6, 2017, 0, ''),
(609, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 7, 2017, 0, ''),
(610, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 8, 2017, 0, ''),
(611, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 10, 2017, 0, ''),
(612, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 11, 2017, 0, ''),
(613, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 12, 2017, 0, ''),
(614, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 14, 2017, 0, ''),
(615, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 15, 2017, 0, ''),
(616, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 16, 2017, 0, ''),
(617, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 18, 2017, 0, ''),
(618, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 19, 2017, 0, ''),
(619, 1, 1, 1, 1, '', '', 2500000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 20, 2017, 0, ''),
(620, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 22, 2017, 0, ''),
(621, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 23, 2017, 0, ''),
(622, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 24, 2017, 0, ''),
(623, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 26, 2017, 0, ''),
(624, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 27, 2017, 0, ''),
(625, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 28, 2017, 0, ''),
(626, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 30, 2017, 0, ''),
(627, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 31, 2017, 0, ''),
(628, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 32, 2017, 0, ''),
(629, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 34, 2017, 0, ''),
(630, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 35, 2017, 0, ''),
(631, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 36, 2017, 0, ''),
(632, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 38, 2017, 0, ''),
(633, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 39, 2017, 0, ''),
(634, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 40, 2017, 0, ''),
(635, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 42, 2017, 0, ''),
(636, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 43, 2017, 0, ''),
(637, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 44, 2017, 0, ''),
(638, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 46, 2017, 0, ''),
(639, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 47, 2017, 0, ''),
(640, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 48, 2017, 0, ''),
(641, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 50, 2017, 0, ''),
(642, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 51, 2017, 0, ''),
(643, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 52, 2017, 0, ''),
(644, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 54, 2017, 0, ''),
(645, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 55, 2017, 0, ''),
(646, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 56, 2017, 0, ''),
(647, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 58, 2017, 0, ''),
(648, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 59, 2017, 0, ''),
(649, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 60, 2017, 0, ''),
(650, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 62, 2017, 0, ''),
(651, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 63, 2017, 0, ''),
(652, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 64, 2017, 0, ''),
(653, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 66, 2017, 0, ''),
(654, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 67, 2017, 0, ''),
(655, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 68, 2017, 0, ''),
(656, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 70, 2017, 0, ''),
(657, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 71, 2017, 0, ''),
(658, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 72, 2017, 0, ''),
(659, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 74, 2017, 0, ''),
(660, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 75, 2017, 0, ''),
(661, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 76, 2017, 0, ''),
(662, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 78, 2017, 0, ''),
(663, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 79, 2017, 0, ''),
(664, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 80, 2017, 0, ''),
(665, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 82, 2017, 0, ''),
(666, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 83, 2017, 0, ''),
(667, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 84, 2017, 0, ''),
(668, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 86, 2017, 0, ''),
(669, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 87, 2017, 0, ''),
(670, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 88, 2017, 0, ''),
(671, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 90, 2017, 0, ''),
(672, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 91, 2017, 0, ''),
(673, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 92, 2017, 0, ''),
(674, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 94, 2017, 0, ''),
(675, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 95, 2017, 0, ''),
(676, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 96, 2017, 0, ''),
(677, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 98, 2017, 0, ''),
(678, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 99, 2017, 0, ''),
(679, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 100, 2017, 0, ''),
(680, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 102, 2017, 0, ''),
(681, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 103, 2017, 0, ''),
(682, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 104, 2017, 0, ''),
(683, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 106, 2017, 0, ''),
(684, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 107, 2017, 0, ''),
(685, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 108, 2017, 0, ''),
(686, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 110, 2017, 0, ''),
(687, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 111, 2017, 0, ''),
(688, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 112, 2017, 0, ''),
(689, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 114, 2017, 0, ''),
(690, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 115, 2017, 0, ''),
(691, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 116, 2017, 0, ''),
(692, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 118, 2017, 0, ''),
(693, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 119, 2017, 0, ''),
(694, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 120, 2017, 0, ''),
(695, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 122, 2017, 0, ''),
(696, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 123, 2017, 0, ''),
(697, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 124, 2017, 0, ''),
(698, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 126, 2017, 0, ''),
(699, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 127, 2017, 0, ''),
(700, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 128, 2017, 0, ''),
(701, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 130, 2017, 0, ''),
(702, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 131, 2017, 0, ''),
(703, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 132, 2017, 0, ''),
(704, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 134, 2017, 0, ''),
(705, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 135, 2017, 0, ''),
(706, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 136, 2017, 0, ''),
(707, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 138, 2017, 0, ''),
(708, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 139, 2017, 0, ''),
(709, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 140, 2017, 0, ''),
(710, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 142, 2017, 0, ''),
(711, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 143, 2017, 0, ''),
(712, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 144, 2017, 0, ''),
(713, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 146, 2017, 0, ''),
(714, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 147, 2017, 0, ''),
(715, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 148, 2017, 0, ''),
(716, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 150, 2017, 0, ''),
(717, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 151, 2017, 0, ''),
(718, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 152, 2017, 0, ''),
(719, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 154, 2017, 0, ''),
(720, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 155, 2017, 0, ''),
(721, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 156, 2017, 0, ''),
(722, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 158, 2017, 0, ''),
(723, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 159, 2017, 0, ''),
(724, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 160, 2017, 0, ''),
(725, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 162, 2017, 0, ''),
(726, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 163, 2017, 0, ''),
(727, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 164, 2017, 0, ''),
(728, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 166, 2017, 0, ''),
(729, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 167, 2017, 0, ''),
(730, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 168, 2017, 0, ''),
(731, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 170, 2017, 0, ''),
(732, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 171, 2017, 0, ''),
(733, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 172, 2017, 0, ''),
(734, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 174, 2017, 0, ''),
(735, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 175, 2017, 0, ''),
(736, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 176, 2017, 0, ''),
(737, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 178, 2017, 0, ''),
(738, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 179, 2017, 0, ''),
(739, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 180, 2017, 0, ''),
(740, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 182, 2017, 0, ''),
(741, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 183, 2017, 0, ''),
(742, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 184, 2017, 0, ''),
(743, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 186, 2017, 0, ''),
(744, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 187, 2017, 0, ''),
(745, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 188, 2017, 0, ''),
(746, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 190, 2017, 0, ''),
(747, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 191, 2017, 0, ''),
(748, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 192, 2017, 0, ''),
(749, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 194, 2017, 0, ''),
(750, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 195, 2017, 0, ''),
(751, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 196, 2017, 0, ''),
(752, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 198, 2017, 0, ''),
(753, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 199, 2017, 0, ''),
(754, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 200, 2017, 0, ''),
(755, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 202, 2017, 0, ''),
(756, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 203, 2017, 0, ''),
(757, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 204, 2017, 0, ''),
(758, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 206, 2017, 0, ''),
(759, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 207, 2017, 0, ''),
(760, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 208, 2017, 0, ''),
(761, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 210, 2017, 0, ''),
(762, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 211, 2017, 0, ''),
(763, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 212, 2017, 0, ''),
(764, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 214, 2017, 0, ''),
(765, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 215, 2017, 0, ''),
(766, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 216, 2017, 0, ''),
(767, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 218, 2017, 0, ''),
(768, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 219, 2017, 0, ''),
(769, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 220, 2017, 0, ''),
(770, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 222, 2017, 0, ''),
(771, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 223, 2017, 0, ''),
(772, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 224, 2017, 0, ''),
(773, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 226, 2017, 0, ''),
(774, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 227, 2017, 0, ''),
(775, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 228, 2017, 0, ''),
(776, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 230, 2017, 0, ''),
(777, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 231, 2017, 0, ''),
(778, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 232, 2017, 0, ''),
(779, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 234, 2017, 0, ''),
(780, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 235, 2017, 0, ''),
(781, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 236, 2017, 0, ''),
(782, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 238, 2017, 0, ''),
(783, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 239, 2017, 0, ''),
(784, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 240, 2017, 0, ''),
(785, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 242, 2017, 0, ''),
(786, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 243, 2017, 0, ''),
(787, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 244, 2017, 0, ''),
(788, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 246, 2017, 0, ''),
(789, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 247, 2017, 0, ''),
(790, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 248, 2017, 0, ''),
(791, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 250, 2017, 0, ''),
(792, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 251, 2017, 0, ''),
(793, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 252, 2017, 0, ''),
(794, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 254, 2017, 0, ''),
(795, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 255, 2017, 0, ''),
(796, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 256, 2017, 0, ''),
(797, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 258, 2017, 0, ''),
(798, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 259, 2017, 0, ''),
(799, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 260, 2017, 0, ''),
(800, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 262, 2017, 0, ''),
(801, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 263, 2017, 0, ''),
(802, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 264, 2017, 0, ''),
(803, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 266, 2017, 0, ''),
(804, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 267, 2017, 0, ''),
(805, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 268, 2017, 0, ''),
(806, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 270, 2017, 0, ''),
(807, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 271, 2017, 0, ''),
(808, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 272, 2017, 0, ''),
(809, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 274, 2017, 0, ''),
(810, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 275, 2017, 0, ''),
(811, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 276, 2017, 0, ''),
(812, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 278, 2017, 0, ''),
(813, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 279, 2017, 0, ''),
(814, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 280, 2017, 0, ''),
(815, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 282, 2017, 0, ''),
(816, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 283, 2017, 0, ''),
(817, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 284, 2017, 0, ''),
(818, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 286, 2017, 0, ''),
(819, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 287, 2017, 0, ''),
(820, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 288, 2017, 0, ''),
(821, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 290, 2017, 0, ''),
(822, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 291, 2017, 0, ''),
(823, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 292, 2017, 0, ''),
(824, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 294, 2017, 0, ''),
(825, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 295, 2017, 0, ''),
(826, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 296, 2017, 0, ''),
(827, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 298, 2017, 0, ''),
(828, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 299, 2017, 0, ''),
(829, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 300, 2017, 0, ''),
(830, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 302, 2017, 0, ''),
(831, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 303, 2017, 0, ''),
(832, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 304, 2017, 0, ''),
(833, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 306, 2017, 0, '');
INSERT INTO `ppas` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `target`, `plafon_anggaran`, `plafon_anggaran_setelah_perubahan`, `skpd`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang_kota`, `tahun`, `is_perubahan`, `status_ppas`) VALUES
(834, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 307, 2017, 0, ''),
(835, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 308, 2017, 0, ''),
(836, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 310, 2017, 0, ''),
(837, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 311, 2017, 0, ''),
(838, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 312, 2017, 0, ''),
(839, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 314, 2017, 0, ''),
(840, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 315, 2017, 0, ''),
(841, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 316, 2017, 0, ''),
(842, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 318, 2017, 0, ''),
(843, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 319, 2017, 0, ''),
(844, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 320, 2017, 0, ''),
(845, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 322, 2017, 0, ''),
(846, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 323, 2017, 0, ''),
(847, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 324, 2017, 0, ''),
(848, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 326, 2017, 0, ''),
(849, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 327, 2017, 0, ''),
(850, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 328, 2017, 0, ''),
(851, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 330, 2017, 0, ''),
(852, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 331, 2017, 0, ''),
(853, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 332, 2017, 0, ''),
(854, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 334, 2017, 0, ''),
(855, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 335, 2017, 0, ''),
(856, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 336, 2017, 0, ''),
(857, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 338, 2017, 0, ''),
(858, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 339, 2017, 0, ''),
(859, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 340, 2017, 0, ''),
(860, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 342, 2017, 0, ''),
(861, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 343, 2017, 0, ''),
(862, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 344, 2017, 0, ''),
(863, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 346, 2017, 0, ''),
(864, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 347, 2017, 0, ''),
(865, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 348, 2017, 0, ''),
(866, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 350, 2017, 0, ''),
(867, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 351, 2017, 0, ''),
(868, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 352, 2017, 0, ''),
(869, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 354, 2017, 0, ''),
(870, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 355, 2017, 0, ''),
(871, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 356, 2017, 0, ''),
(872, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 358, 2017, 0, ''),
(873, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 359, 2017, 0, ''),
(874, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 360, 2017, 0, ''),
(875, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 362, 2017, 0, ''),
(876, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 363, 2017, 0, ''),
(877, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 364, 2017, 0, ''),
(878, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 366, 2017, 0, ''),
(879, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 367, 2017, 0, ''),
(880, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 368, 2017, 0, ''),
(881, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 370, 2017, 0, ''),
(882, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 371, 2017, 0, ''),
(883, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 372, 2017, 0, ''),
(884, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 374, 2017, 0, ''),
(885, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 375, 2017, 0, ''),
(886, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 376, 2017, 0, ''),
(887, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 378, 2017, 0, ''),
(888, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 379, 2017, 0, ''),
(889, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 380, 2017, 0, ''),
(890, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 382, 2017, 0, ''),
(891, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 383, 2017, 0, ''),
(892, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 384, 2017, 0, ''),
(893, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 386, 2017, 0, ''),
(894, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 387, 2017, 0, ''),
(895, 1, 1, 1, 5, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 390, 2017, 0, ''),
(896, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 391, 2017, 0, ''),
(897, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 392, 2017, 0, ''),
(898, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 393, 2017, 0, ''),
(899, 1, 1, 1, 6, '', '', 21500000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 394, 2017, 0, ''),
(900, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 395, 2017, 0, ''),
(901, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 396, 2017, 0, ''),
(902, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 397, 2017, 0, ''),
(903, 1, 1, 1, 5, '', '', 1, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 398, 2017, 0, ''),
(904, 1, 1, 1, 1, '', '', 123000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 399, 2017, 0, ''),
(905, 1, 1, 1, 5, '', '', 21000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 400, 2017, 0, ''),
(906, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 401, 2017, 0, ''),
(907, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 2017, 0, ''),
(908, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 3, 2017, 0, ''),
(909, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 4, 2017, 0, ''),
(910, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 6, 2017, 0, ''),
(911, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 7, 2017, 0, ''),
(912, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 8, 2017, 0, ''),
(913, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 10, 2017, 0, ''),
(914, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 11, 2017, 0, ''),
(915, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 12, 2017, 0, ''),
(916, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 14, 2017, 0, ''),
(917, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 15, 2017, 0, ''),
(918, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 16, 2017, 0, ''),
(919, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 18, 2017, 0, ''),
(920, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 19, 2017, 0, ''),
(921, 1, 1, 1, 1, '', '', 2500000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 20, 2017, 0, ''),
(922, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 22, 2017, 0, ''),
(923, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 23, 2017, 0, ''),
(924, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 24, 2017, 0, ''),
(925, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 26, 2017, 0, ''),
(926, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 27, 2017, 0, ''),
(927, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 28, 2017, 0, ''),
(928, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 30, 2017, 0, ''),
(929, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 31, 2017, 0, ''),
(930, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 32, 2017, 0, ''),
(931, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 34, 2017, 0, ''),
(932, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 35, 2017, 0, ''),
(933, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 36, 2017, 0, ''),
(934, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 38, 2017, 0, ''),
(935, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 39, 2017, 0, ''),
(936, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 40, 2017, 0, ''),
(937, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 42, 2017, 0, ''),
(938, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 43, 2017, 0, ''),
(939, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 44, 2017, 0, ''),
(940, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 46, 2017, 0, ''),
(941, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 47, 2017, 0, ''),
(942, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 48, 2017, 0, ''),
(943, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 50, 2017, 0, ''),
(944, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 51, 2017, 0, ''),
(945, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 52, 2017, 0, ''),
(946, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 54, 2017, 0, ''),
(947, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 55, 2017, 0, ''),
(948, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 56, 2017, 0, ''),
(949, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 58, 2017, 0, ''),
(950, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 59, 2017, 0, ''),
(951, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 60, 2017, 0, ''),
(952, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 62, 2017, 0, ''),
(953, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 63, 2017, 0, ''),
(954, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 64, 2017, 0, ''),
(955, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 66, 2017, 0, ''),
(956, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 67, 2017, 0, ''),
(957, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 68, 2017, 0, ''),
(958, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 70, 2017, 0, ''),
(959, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 71, 2017, 0, ''),
(960, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 72, 2017, 0, ''),
(961, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 74, 2017, 0, ''),
(962, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 75, 2017, 0, ''),
(963, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 76, 2017, 0, ''),
(964, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 78, 2017, 0, ''),
(965, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 79, 2017, 0, ''),
(966, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 80, 2017, 0, ''),
(967, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 82, 2017, 0, ''),
(968, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 83, 2017, 0, ''),
(969, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 84, 2017, 0, ''),
(970, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 86, 2017, 0, ''),
(971, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 87, 2017, 0, ''),
(972, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 88, 2017, 0, ''),
(973, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 90, 2017, 0, ''),
(974, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 91, 2017, 0, ''),
(975, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 92, 2017, 0, ''),
(976, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 94, 2017, 0, ''),
(977, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 95, 2017, 0, ''),
(978, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 96, 2017, 0, ''),
(979, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 98, 2017, 0, ''),
(980, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 99, 2017, 0, ''),
(981, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 100, 2017, 0, ''),
(982, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 102, 2017, 0, ''),
(983, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 103, 2017, 0, ''),
(984, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 104, 2017, 0, ''),
(985, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 106, 2017, 0, ''),
(986, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 107, 2017, 0, ''),
(987, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 108, 2017, 0, ''),
(988, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 110, 2017, 0, ''),
(989, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 111, 2017, 0, ''),
(990, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 112, 2017, 0, ''),
(991, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 114, 2017, 0, ''),
(992, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 115, 2017, 0, ''),
(993, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 116, 2017, 0, ''),
(994, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 118, 2017, 0, ''),
(995, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 119, 2017, 0, ''),
(996, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 120, 2017, 0, ''),
(997, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 122, 2017, 0, ''),
(998, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 123, 2017, 0, ''),
(999, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 124, 2017, 0, ''),
(1000, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 126, 2017, 0, ''),
(1001, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 127, 2017, 0, ''),
(1002, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 128, 2017, 0, ''),
(1003, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 130, 2017, 0, ''),
(1004, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 131, 2017, 0, ''),
(1005, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 132, 2017, 0, ''),
(1006, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 134, 2017, 0, ''),
(1007, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 135, 2017, 0, ''),
(1008, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 136, 2017, 0, ''),
(1009, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 138, 2017, 0, ''),
(1010, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 139, 2017, 0, ''),
(1011, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 140, 2017, 0, ''),
(1012, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 142, 2017, 0, ''),
(1013, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 143, 2017, 0, ''),
(1014, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 144, 2017, 0, ''),
(1015, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 146, 2017, 0, ''),
(1016, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 147, 2017, 0, ''),
(1017, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 148, 2017, 0, ''),
(1018, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 150, 2017, 0, ''),
(1019, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 151, 2017, 0, ''),
(1020, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 152, 2017, 0, ''),
(1021, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 154, 2017, 0, ''),
(1022, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 155, 2017, 0, ''),
(1023, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 156, 2017, 0, ''),
(1024, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 158, 2017, 0, ''),
(1025, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 159, 2017, 0, ''),
(1026, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 160, 2017, 0, ''),
(1027, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 162, 2017, 0, ''),
(1028, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 163, 2017, 0, ''),
(1029, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 164, 2017, 0, ''),
(1030, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 166, 2017, 0, ''),
(1031, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 167, 2017, 0, ''),
(1032, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 168, 2017, 0, ''),
(1033, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 170, 2017, 0, ''),
(1034, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 171, 2017, 0, ''),
(1035, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 172, 2017, 0, ''),
(1036, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 174, 2017, 0, ''),
(1037, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 175, 2017, 0, ''),
(1038, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 176, 2017, 0, ''),
(1039, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 178, 2017, 0, ''),
(1040, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 179, 2017, 0, ''),
(1041, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 180, 2017, 0, ''),
(1042, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 182, 2017, 0, ''),
(1043, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 183, 2017, 0, ''),
(1044, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 184, 2017, 0, ''),
(1045, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 186, 2017, 0, ''),
(1046, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 187, 2017, 0, ''),
(1047, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 188, 2017, 0, ''),
(1048, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 190, 2017, 0, ''),
(1049, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 191, 2017, 0, ''),
(1050, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 192, 2017, 0, ''),
(1051, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 194, 2017, 0, ''),
(1052, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 195, 2017, 0, ''),
(1053, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 196, 2017, 0, ''),
(1054, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 198, 2017, 0, ''),
(1055, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 199, 2017, 0, ''),
(1056, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 200, 2017, 0, ''),
(1057, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 202, 2017, 0, ''),
(1058, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 203, 2017, 0, ''),
(1059, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 204, 2017, 0, ''),
(1060, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 206, 2017, 0, ''),
(1061, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 207, 2017, 0, ''),
(1062, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 208, 2017, 0, ''),
(1063, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 210, 2017, 0, ''),
(1064, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 211, 2017, 0, ''),
(1065, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 212, 2017, 0, ''),
(1066, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 214, 2017, 0, ''),
(1067, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 215, 2017, 0, ''),
(1068, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 216, 2017, 0, ''),
(1069, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 218, 2017, 0, ''),
(1070, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 219, 2017, 0, ''),
(1071, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 220, 2017, 0, ''),
(1072, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 222, 2017, 0, ''),
(1073, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 223, 2017, 0, ''),
(1074, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 224, 2017, 0, ''),
(1075, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 226, 2017, 0, ''),
(1076, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 227, 2017, 0, ''),
(1077, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 228, 2017, 0, ''),
(1078, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 230, 2017, 0, ''),
(1079, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 231, 2017, 0, ''),
(1080, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 232, 2017, 0, ''),
(1081, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 234, 2017, 0, ''),
(1082, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 235, 2017, 0, ''),
(1083, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 236, 2017, 0, ''),
(1084, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 238, 2017, 0, ''),
(1085, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 239, 2017, 0, ''),
(1086, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 240, 2017, 0, ''),
(1087, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 242, 2017, 0, ''),
(1088, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 243, 2017, 0, ''),
(1089, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 244, 2017, 0, ''),
(1090, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 246, 2017, 0, ''),
(1091, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 247, 2017, 0, ''),
(1092, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 248, 2017, 0, ''),
(1093, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 250, 2017, 0, ''),
(1094, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 251, 2017, 0, ''),
(1095, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 252, 2017, 0, ''),
(1096, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 254, 2017, 0, ''),
(1097, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 255, 2017, 0, ''),
(1098, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 256, 2017, 0, ''),
(1099, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 258, 2017, 0, ''),
(1100, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 259, 2017, 0, ''),
(1101, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 260, 2017, 0, ''),
(1102, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 262, 2017, 0, ''),
(1103, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 263, 2017, 0, ''),
(1104, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 264, 2017, 0, ''),
(1105, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 266, 2017, 0, ''),
(1106, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 267, 2017, 0, ''),
(1107, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 268, 2017, 0, ''),
(1108, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 270, 2017, 0, ''),
(1109, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 271, 2017, 0, ''),
(1110, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 272, 2017, 0, ''),
(1111, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 274, 2017, 0, ''),
(1112, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 275, 2017, 0, ''),
(1113, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 276, 2017, 0, ''),
(1114, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 278, 2017, 0, ''),
(1115, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 279, 2017, 0, ''),
(1116, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 280, 2017, 0, ''),
(1117, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 282, 2017, 0, ''),
(1118, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 283, 2017, 0, ''),
(1119, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 284, 2017, 0, ''),
(1120, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 286, 2017, 0, ''),
(1121, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 287, 2017, 0, ''),
(1122, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 288, 2017, 0, ''),
(1123, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 290, 2017, 0, ''),
(1124, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 291, 2017, 0, ''),
(1125, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 292, 2017, 0, ''),
(1126, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 294, 2017, 0, ''),
(1127, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 295, 2017, 0, ''),
(1128, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 296, 2017, 0, ''),
(1129, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 298, 2017, 0, ''),
(1130, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 299, 2017, 0, ''),
(1131, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 300, 2017, 0, ''),
(1132, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 302, 2017, 0, ''),
(1133, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 303, 2017, 0, ''),
(1134, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 304, 2017, 0, ''),
(1135, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 306, 2017, 0, ''),
(1136, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 307, 2017, 0, ''),
(1137, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 308, 2017, 0, ''),
(1138, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 310, 2017, 0, ''),
(1139, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 311, 2017, 0, ''),
(1140, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 312, 2017, 0, ''),
(1141, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 314, 2017, 0, ''),
(1142, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 315, 2017, 0, ''),
(1143, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 316, 2017, 0, ''),
(1144, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 318, 2017, 0, ''),
(1145, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 319, 2017, 0, ''),
(1146, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 320, 2017, 0, ''),
(1147, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 322, 2017, 0, ''),
(1148, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 323, 2017, 0, ''),
(1149, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 324, 2017, 0, ''),
(1150, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 326, 2017, 0, ''),
(1151, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 327, 2017, 0, ''),
(1152, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 328, 2017, 0, ''),
(1153, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 330, 2017, 0, ''),
(1154, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 331, 2017, 0, ''),
(1155, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 332, 2017, 0, ''),
(1156, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 334, 2017, 0, ''),
(1157, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 335, 2017, 0, ''),
(1158, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 336, 2017, 0, ''),
(1159, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 338, 2017, 0, ''),
(1160, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 339, 2017, 0, ''),
(1161, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 340, 2017, 0, ''),
(1162, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 342, 2017, 0, ''),
(1163, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 343, 2017, 0, ''),
(1164, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 344, 2017, 0, ''),
(1165, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 346, 2017, 0, ''),
(1166, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 347, 2017, 0, ''),
(1167, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 348, 2017, 0, ''),
(1168, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 350, 2017, 0, ''),
(1169, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 351, 2017, 0, ''),
(1170, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 352, 2017, 0, ''),
(1171, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 354, 2017, 0, ''),
(1172, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 355, 2017, 0, ''),
(1173, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 356, 2017, 0, ''),
(1174, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 358, 2017, 0, ''),
(1175, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 359, 2017, 0, ''),
(1176, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 360, 2017, 0, ''),
(1177, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 362, 2017, 0, ''),
(1178, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 363, 2017, 0, ''),
(1179, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 364, 2017, 0, ''),
(1180, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 366, 2017, 0, ''),
(1181, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 367, 2017, 0, ''),
(1182, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 368, 2017, 0, ''),
(1183, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 370, 2017, 0, ''),
(1184, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 371, 2017, 0, ''),
(1185, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 372, 2017, 0, ''),
(1186, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 374, 2017, 0, ''),
(1187, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 375, 2017, 0, ''),
(1188, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 376, 2017, 0, ''),
(1189, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 378, 2017, 0, ''),
(1190, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 379, 2017, 0, ''),
(1191, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 380, 2017, 0, ''),
(1192, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 382, 2017, 0, ''),
(1193, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 383, 2017, 0, ''),
(1194, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 384, 2017, 0, ''),
(1195, 1, 1, 2, 2, '', '', 140000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 386, 2017, 0, ''),
(1196, 1, 1, 2, 2, '', '', 12300000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 387, 2017, 0, ''),
(1197, 1, 1, 1, 5, '', '', 150000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 390, 2017, 0, ''),
(1198, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 391, 2017, 0, ''),
(1199, 1, 1, 2, 2, '', '', 150000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 392, 2017, 0, ''),
(1200, 1, 1, 2, 2, '', '', 150000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 393, 2017, 0, ''),
(1201, 1, 1, 1, 6, '', '', 21500000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 394, 2017, 0, ''),
(1202, 1, 1, 1, 6, '', '', 17900000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 395, 2017, 0, ''),
(1203, 1, 1, 1, 6, '', '', 17900000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 396, 2017, 0, ''),
(1204, 1, 1, 1, 6, '', '', 17900000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 397, 2017, 0, ''),
(1205, 1, 1, 1, 5, '', '', 1, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 398, 2017, 0, ''),
(1206, 1, 1, 1, 1, '', '', 123000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 399, 2017, 0, ''),
(1207, 1, 1, 1, 5, '', '', 21000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 400, 2017, 0, ''),
(1208, 1, 1, 1, 1, '', '', 250000000, 0, 25, 'admin', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 401, 2017, 0, ''),
(1209, 1, 1, 2, 4, 'asdasd', '', 12000000, 0, 24, '2', '2016-07-19 17:12:47', '', '0000-00-00 00:00:00', 0, 2020, 0, ''),
(1210, 1, 1, 1, 6, '', '', 2100000, 0, 24, '2', '2016-07-19 17:33:01', '', '0000-00-00 00:00:00', 0, 2020, 0, ''),
(1211, 1, 1, 2, 2, 'asd', '123', 54546754, 0, 24, '2', '2016-07-29 10:13:08', '', '0000-00-00 00:00:00', 0, 2020, 0, ''),
(1212, 1, 20, 51, 9, '', '', 5633333, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 1, 2017, 0, ''),
(1213, 1, 20, 52, 15, '', '', 23000000, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 9, 2017, 0, ''),
(1214, 1, 1, 1, 5, '', '', 150000000, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 13, 2017, 0, ''),
(1215, 1, 1, 1, 6, '', '', 21500000, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 17, 2017, 0, ''),
(1216, 1, 1, 1, 5, '', '', 123123123123, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 21, 2017, 0, ''),
(1217, 1, 20, 51, 9, '', '', 5633333, 0, 24, 'admin', '2016-08-11 14:17:31', '', '0000-00-00 00:00:00', 25, 2017, 0, ''),
(1218, 1, 20, 51, 9, '', '', 121, 0, 24, 'admin', '2016-08-18 09:27:09', '', '0000-00-00 00:00:00', 29, 2017, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ppas_perubahan`
--

CREATE TABLE IF NOT EXISTS `ppas_perubahan` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `sasaran` text NOT NULL,
  `target` text NOT NULL,
  `plafon_anggaran` bigint(20) NOT NULL COMMENT 'Plafon Anggaran Sementara',
  `plafon_anggaran_setelah_perubahan` bigint(20) NOT NULL,
  `skpd` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `id_musrenbang_kota` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status_ppas` enum('Data Perubahan','Data Baru') NOT NULL,
  `is_perubahan` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=310 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppas_perubahan`
--

INSERT INTO `ppas_perubahan` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `target`, `plafon_anggaran`, `plafon_anggaran_setelah_perubahan`, `skpd`, `created_by`, `created_date`, `mod_by`, `mod_date`, `id_musrenbang_kota`, `tahun`, `status_ppas`, `is_perubahan`) VALUES
(1, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 2, 2017, 'Data Perubahan', 1),
(2, 1, 1, 2, 2, 'adsad', 'asd', 12500000, 15000000, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 3, 2017, 'Data Perubahan', 1),
(3, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 4, 2017, 'Data Perubahan', 1),
(4, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 6, 2017, 'Data Perubahan', 1),
(5, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 7, 2017, 'Data Perubahan', 1),
(6, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 8, 2017, 'Data Perubahan', 1),
(7, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 10, 2017, 'Data Perubahan', 1),
(8, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 11, 2017, 'Data Perubahan', 1),
(9, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 12, 2017, 'Data Perubahan', 1),
(10, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 14, 2017, 'Data Perubahan', 1),
(11, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 15, 2017, 'Data Perubahan', 1),
(12, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 16, 2017, 'Data Perubahan', 1),
(13, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 18, 2017, 'Data Perubahan', 1),
(14, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 19, 2017, 'Data Perubahan', 1),
(15, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 20, 2017, 'Data Perubahan', 1),
(16, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 22, 2017, 'Data Perubahan', 1),
(17, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 23, 2017, 'Data Perubahan', 1),
(18, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 24, 2017, 'Data Perubahan', 1),
(19, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 26, 2017, 'Data Perubahan', 1),
(20, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 27, 2017, 'Data Perubahan', 1),
(21, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 28, 2017, 'Data Perubahan', 1),
(22, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 30, 2017, 'Data Perubahan', 1),
(23, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 31, 2017, 'Data Perubahan', 1),
(24, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 32, 2017, 'Data Perubahan', 1),
(25, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 34, 2017, 'Data Perubahan', 1),
(26, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 35, 2017, 'Data Perubahan', 1),
(27, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 36, 2017, 'Data Perubahan', 1),
(28, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 38, 2017, 'Data Perubahan', 1),
(29, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 39, 2017, 'Data Perubahan', 1),
(30, 1, 1, 1, 1, '', '', 2100000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 40, 2017, 'Data Perubahan', 1),
(31, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 42, 2017, 'Data Perubahan', 1),
(32, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 43, 2017, 'Data Perubahan', 1),
(33, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 44, 2017, 'Data Perubahan', 1),
(34, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 46, 2017, 'Data Perubahan', 1),
(35, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 47, 2017, 'Data Perubahan', 1),
(36, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 48, 2017, 'Data Perubahan', 1),
(37, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 50, 2017, 'Data Perubahan', 1),
(38, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 51, 2017, 'Data Perubahan', 1),
(39, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 52, 2017, 'Data Perubahan', 1),
(40, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 54, 2017, 'Data Perubahan', 1),
(41, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 55, 2017, 'Data Perubahan', 1),
(42, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 56, 2017, 'Data Perubahan', 1),
(43, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 58, 2017, 'Data Perubahan', 1),
(44, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 59, 2017, 'Data Perubahan', 1),
(45, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 60, 2017, 'Data Perubahan', 1),
(46, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 62, 2017, 'Data Perubahan', 1),
(47, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 63, 2017, 'Data Perubahan', 1),
(48, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 64, 2017, 'Data Perubahan', 1),
(49, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 66, 2017, 'Data Perubahan', 1),
(50, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 67, 2017, 'Data Perubahan', 1),
(51, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 68, 2017, 'Data Perubahan', 1),
(52, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 70, 2017, 'Data Perubahan', 1),
(53, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 71, 2017, 'Data Perubahan', 1),
(54, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 72, 2017, 'Data Perubahan', 1),
(55, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 74, 2017, 'Data Perubahan', 1),
(56, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 75, 2017, 'Data Perubahan', 1),
(57, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 76, 2017, 'Data Perubahan', 1),
(58, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 78, 2017, 'Data Perubahan', 1),
(59, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 79, 2017, 'Data Perubahan', 1),
(60, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 80, 2017, 'Data Perubahan', 1),
(61, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 82, 2017, 'Data Perubahan', 1),
(62, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 83, 2017, 'Data Perubahan', 1),
(63, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 84, 2017, 'Data Perubahan', 1),
(64, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 86, 2017, 'Data Perubahan', 1),
(65, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 87, 2017, 'Data Perubahan', 1),
(66, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 88, 2017, 'Data Perubahan', 1),
(67, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 90, 2017, 'Data Perubahan', 1),
(68, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 91, 2017, 'Data Perubahan', 1),
(69, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 92, 2017, 'Data Perubahan', 1),
(70, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 94, 2017, 'Data Perubahan', 1),
(71, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 95, 2017, 'Data Perubahan', 1),
(72, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 96, 2017, 'Data Perubahan', 1),
(73, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 98, 2017, 'Data Perubahan', 1),
(74, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 99, 2017, 'Data Perubahan', 1),
(75, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 100, 2017, 'Data Perubahan', 1),
(76, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 102, 2017, 'Data Perubahan', 1),
(77, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 103, 2017, 'Data Perubahan', 1),
(78, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 104, 2017, 'Data Perubahan', 1),
(79, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 106, 2017, 'Data Perubahan', 1),
(80, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 107, 2017, 'Data Perubahan', 1),
(81, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 108, 2017, 'Data Perubahan', 1),
(82, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 110, 2017, 'Data Perubahan', 1),
(83, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 111, 2017, 'Data Perubahan', 1),
(84, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 112, 2017, 'Data Perubahan', 1),
(85, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 114, 2017, 'Data Perubahan', 1),
(86, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 115, 2017, 'Data Perubahan', 1),
(87, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 116, 2017, 'Data Perubahan', 1),
(88, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 118, 2017, 'Data Perubahan', 1),
(89, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 119, 2017, 'Data Perubahan', 1),
(90, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 120, 2017, 'Data Perubahan', 1),
(91, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 122, 2017, 'Data Perubahan', 1),
(92, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 123, 2017, 'Data Perubahan', 1),
(93, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 124, 2017, 'Data Perubahan', 1),
(94, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 126, 2017, 'Data Perubahan', 1),
(95, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 127, 2017, 'Data Perubahan', 1),
(96, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 128, 2017, 'Data Perubahan', 1),
(97, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 130, 2017, 'Data Perubahan', 1),
(98, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 131, 2017, 'Data Perubahan', 1),
(99, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 132, 2017, 'Data Perubahan', 1),
(100, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 134, 2017, 'Data Perubahan', 1),
(101, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 135, 2017, 'Data Perubahan', 1),
(102, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 136, 2017, 'Data Perubahan', 1),
(103, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 138, 2017, 'Data Perubahan', 1),
(104, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 139, 2017, 'Data Perubahan', 1),
(105, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 140, 2017, 'Data Perubahan', 1),
(106, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 142, 2017, 'Data Perubahan', 1),
(107, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 143, 2017, 'Data Perubahan', 1),
(108, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 144, 2017, 'Data Perubahan', 1),
(109, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 146, 2017, 'Data Perubahan', 1),
(110, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 147, 2017, 'Data Perubahan', 1),
(111, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 148, 2017, 'Data Perubahan', 1),
(112, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 150, 2017, 'Data Perubahan', 1),
(113, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 151, 2017, 'Data Perubahan', 1),
(114, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 152, 2017, 'Data Perubahan', 1),
(115, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 154, 2017, 'Data Perubahan', 1),
(116, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 155, 2017, 'Data Perubahan', 1),
(117, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 156, 2017, 'Data Perubahan', 1),
(118, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 158, 2017, 'Data Perubahan', 1),
(119, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 159, 2017, 'Data Perubahan', 1),
(120, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 160, 2017, 'Data Perubahan', 1),
(121, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 162, 2017, 'Data Perubahan', 1),
(122, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 163, 2017, 'Data Perubahan', 1),
(123, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 164, 2017, 'Data Perubahan', 1),
(124, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 166, 2017, 'Data Perubahan', 1),
(125, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 167, 2017, 'Data Perubahan', 1),
(126, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 168, 2017, 'Data Perubahan', 1),
(127, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 170, 2017, 'Data Perubahan', 1),
(128, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 171, 2017, 'Data Perubahan', 1),
(129, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 172, 2017, 'Data Perubahan', 1),
(130, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 174, 2017, 'Data Perubahan', 1),
(131, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 175, 2017, 'Data Perubahan', 1),
(132, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 176, 2017, 'Data Perubahan', 1),
(133, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 178, 2017, 'Data Perubahan', 1),
(134, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 179, 2017, 'Data Perubahan', 1),
(135, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 180, 2017, 'Data Perubahan', 1),
(136, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 182, 2017, 'Data Perubahan', 1),
(137, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 183, 2017, 'Data Perubahan', 1),
(138, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 184, 2017, 'Data Perubahan', 1),
(139, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 186, 2017, 'Data Perubahan', 1),
(140, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 187, 2017, 'Data Perubahan', 1),
(141, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 188, 2017, 'Data Perubahan', 1),
(142, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 190, 2017, 'Data Perubahan', 1),
(143, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 191, 2017, 'Data Perubahan', 1),
(144, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 192, 2017, 'Data Perubahan', 1),
(145, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 194, 2017, 'Data Perubahan', 1),
(146, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 195, 2017, 'Data Perubahan', 1),
(147, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 196, 2017, 'Data Perubahan', 1),
(148, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 198, 2017, 'Data Perubahan', 1),
(149, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 199, 2017, 'Data Perubahan', 1),
(150, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 200, 2017, 'Data Perubahan', 1),
(151, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 202, 2017, 'Data Perubahan', 1),
(152, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 203, 2017, 'Data Perubahan', 1),
(153, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 204, 2017, 'Data Perubahan', 1),
(154, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 206, 2017, 'Data Perubahan', 1),
(155, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 207, 2017, 'Data Perubahan', 1),
(156, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 208, 2017, 'Data Perubahan', 1),
(157, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 210, 2017, 'Data Perubahan', 1),
(158, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 211, 2017, 'Data Perubahan', 1),
(159, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 212, 2017, 'Data Perubahan', 1),
(160, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 214, 2017, 'Data Perubahan', 1),
(161, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 215, 2017, 'Data Perubahan', 1),
(162, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 216, 2017, 'Data Perubahan', 1),
(163, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 218, 2017, 'Data Perubahan', 1),
(164, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 219, 2017, 'Data Perubahan', 1),
(165, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 220, 2017, 'Data Perubahan', 1),
(166, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 222, 2017, 'Data Perubahan', 1),
(167, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 223, 2017, 'Data Perubahan', 1),
(168, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 224, 2017, 'Data Perubahan', 1),
(169, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 226, 2017, 'Data Perubahan', 1),
(170, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 227, 2017, 'Data Perubahan', 1),
(171, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 228, 2017, 'Data Perubahan', 1),
(172, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 230, 2017, 'Data Perubahan', 1),
(173, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 231, 2017, 'Data Perubahan', 1),
(174, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 232, 2017, 'Data Perubahan', 1),
(175, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 234, 2017, 'Data Perubahan', 1),
(176, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 235, 2017, 'Data Perubahan', 1),
(177, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 236, 2017, 'Data Perubahan', 1),
(178, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 238, 2017, 'Data Perubahan', 1),
(179, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 239, 2017, 'Data Perubahan', 1),
(180, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 240, 2017, 'Data Perubahan', 1),
(181, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 242, 2017, 'Data Perubahan', 1),
(182, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 243, 2017, 'Data Perubahan', 1),
(183, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 244, 2017, 'Data Perubahan', 1),
(184, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 246, 2017, 'Data Perubahan', 1),
(185, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 247, 2017, 'Data Perubahan', 1),
(186, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 248, 2017, 'Data Perubahan', 1),
(187, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 250, 2017, 'Data Perubahan', 1),
(188, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 251, 2017, 'Data Perubahan', 1),
(189, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 252, 2017, 'Data Perubahan', 1),
(190, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 254, 2017, 'Data Perubahan', 1),
(191, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 255, 2017, 'Data Perubahan', 1),
(192, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 256, 2017, 'Data Perubahan', 1),
(193, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 258, 2017, 'Data Perubahan', 1),
(194, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 259, 2017, 'Data Perubahan', 1),
(195, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 260, 2017, 'Data Perubahan', 1),
(196, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 262, 2017, 'Data Perubahan', 1),
(197, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 263, 2017, 'Data Perubahan', 1),
(198, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 264, 2017, 'Data Perubahan', 1),
(199, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 266, 2017, 'Data Perubahan', 1),
(200, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 267, 2017, 'Data Perubahan', 1),
(201, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 268, 2017, 'Data Perubahan', 1),
(202, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 270, 2017, 'Data Perubahan', 1),
(203, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 271, 2017, 'Data Perubahan', 1),
(204, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 272, 2017, 'Data Perubahan', 1),
(205, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 274, 2017, 'Data Perubahan', 1),
(206, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 275, 2017, 'Data Perubahan', 1),
(207, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 276, 2017, 'Data Perubahan', 1),
(208, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 278, 2017, 'Data Perubahan', 1),
(209, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 279, 2017, 'Data Perubahan', 1),
(210, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 280, 2017, 'Data Perubahan', 1),
(211, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 282, 2017, 'Data Perubahan', 1),
(212, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 283, 2017, 'Data Perubahan', 1),
(213, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 284, 2017, 'Data Perubahan', 1),
(214, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 286, 2017, 'Data Perubahan', 1),
(215, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 287, 2017, 'Data Perubahan', 1),
(216, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 288, 2017, 'Data Perubahan', 1),
(217, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 290, 2017, 'Data Perubahan', 1),
(218, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 291, 2017, 'Data Perubahan', 1),
(219, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 292, 2017, 'Data Perubahan', 1),
(220, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 294, 2017, 'Data Perubahan', 1),
(221, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 295, 2017, 'Data Perubahan', 1),
(222, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 296, 2017, 'Data Perubahan', 1),
(223, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 298, 2017, 'Data Perubahan', 1),
(224, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 299, 2017, 'Data Perubahan', 1),
(225, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 300, 2017, 'Data Perubahan', 1),
(226, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 302, 2017, 'Data Perubahan', 1),
(227, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 303, 2017, 'Data Perubahan', 1),
(228, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 304, 2017, 'Data Perubahan', 1),
(229, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 306, 2017, 'Data Perubahan', 1),
(230, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 307, 2017, 'Data Perubahan', 1),
(231, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 308, 2017, 'Data Perubahan', 1),
(232, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 310, 2017, 'Data Perubahan', 1),
(233, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 311, 2017, 'Data Perubahan', 1),
(234, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 312, 2017, 'Data Perubahan', 1),
(235, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 314, 2017, 'Data Perubahan', 1),
(236, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 315, 2017, 'Data Perubahan', 1),
(237, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 316, 2017, 'Data Perubahan', 1),
(238, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 318, 2017, 'Data Perubahan', 1),
(239, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 319, 2017, 'Data Perubahan', 1),
(240, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 320, 2017, 'Data Perubahan', 1),
(241, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 322, 2017, 'Data Perubahan', 1),
(242, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 323, 2017, 'Data Perubahan', 1),
(243, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 324, 2017, 'Data Perubahan', 1),
(244, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 326, 2017, 'Data Perubahan', 1),
(245, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 327, 2017, 'Data Perubahan', 1),
(246, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 328, 2017, 'Data Perubahan', 1),
(247, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 330, 2017, 'Data Perubahan', 1),
(248, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 331, 2017, 'Data Perubahan', 1),
(249, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 332, 2017, 'Data Perubahan', 1),
(250, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 334, 2017, 'Data Perubahan', 1),
(251, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 335, 2017, 'Data Perubahan', 1),
(252, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 336, 2017, 'Data Perubahan', 1),
(253, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 338, 2017, 'Data Perubahan', 1),
(254, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 339, 2017, 'Data Perubahan', 1),
(255, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 340, 2017, 'Data Perubahan', 1),
(256, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 342, 2017, 'Data Perubahan', 1),
(257, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 343, 2017, 'Data Perubahan', 1),
(258, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 344, 2017, 'Data Perubahan', 1),
(259, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 346, 2017, 'Data Perubahan', 1),
(260, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 347, 2017, 'Data Perubahan', 1),
(261, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 348, 2017, 'Data Perubahan', 1),
(262, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 350, 2017, 'Data Perubahan', 1),
(263, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 351, 2017, 'Data Perubahan', 1),
(264, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 352, 2017, 'Data Perubahan', 1),
(265, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 354, 2017, 'Data Perubahan', 1),
(266, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 355, 2017, 'Data Perubahan', 1),
(267, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 356, 2017, 'Data Perubahan', 1),
(268, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 358, 2017, 'Data Perubahan', 1),
(269, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 359, 2017, 'Data Perubahan', 1),
(270, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 360, 2017, 'Data Perubahan', 1),
(271, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 362, 2017, 'Data Perubahan', 1),
(272, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 363, 2017, 'Data Perubahan', 1),
(273, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 364, 2017, 'Data Perubahan', 1),
(274, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 366, 2017, 'Data Perubahan', 1),
(275, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 367, 2017, 'Data Perubahan', 1),
(276, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 368, 2017, 'Data Perubahan', 1),
(277, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 370, 2017, 'Data Perubahan', 1),
(278, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 371, 2017, 'Data Perubahan', 1),
(279, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 372, 2017, 'Data Perubahan', 1),
(280, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 374, 2017, 'Data Perubahan', 1),
(281, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 375, 2017, 'Data Perubahan', 1),
(282, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 376, 2017, 'Data Perubahan', 1),
(283, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 378, 2017, 'Data Perubahan', 1),
(284, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 379, 2017, 'Data Perubahan', 1),
(285, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 380, 2017, 'Data Perubahan', 1),
(286, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 382, 2017, 'Data Perubahan', 1),
(287, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 383, 2017, 'Data Perubahan', 1),
(288, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 384, 2017, 'Data Perubahan', 1),
(289, 1, 1, 2, 2, '', '', 140000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 386, 2017, 'Data Perubahan', 1),
(290, 1, 1, 2, 2, '', '', 12300000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 387, 2017, 'Data Perubahan', 1),
(291, 1, 1, 1, 5, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 390, 2017, 'Data Perubahan', 1),
(292, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 391, 2017, 'Data Perubahan', 1),
(293, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 392, 2017, 'Data Perubahan', 1),
(294, 1, 1, 2, 2, '', '', 150000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 393, 2017, 'Data Perubahan', 1),
(295, 1, 1, 1, 6, '', '', 21500000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 394, 2017, 'Data Perubahan', 1),
(296, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 395, 2017, 'Data Perubahan', 1),
(297, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 396, 2017, 'Data Perubahan', 1),
(298, 1, 1, 1, 6, '', '', 17900000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 397, 2017, 'Data Perubahan', 1),
(299, 1, 1, 1, 5, '', '', 123123123123, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 398, 2017, 'Data Perubahan', 1),
(300, 1, 1, 1, 1, '', '', 123000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 399, 2017, 'Data Perubahan', 1),
(301, 1, 1, 1, 5, '', '', 21000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 400, 2017, 'Data Perubahan', 1),
(302, 1, 1, 1, 1, '', '', 250000000, 0, 24, 'admin', '2016-07-07 13:04:38', '', '0000-00-00 00:00:00', 401, 2017, 'Data Perubahan', 1),
(303, 1, 1, 1, 1, 'asd', 'asd', 210000, 1300000, 24, '2', '2016-07-11 01:40:34', '', '0000-00-00 00:00:00', 0, 2017, 'Data Perubahan', 1),
(304, 1, 1, 1, 1, 'asd', 'asd', 12, 2133123, 24, '2', '2016-07-11 01:41:59', '', '0000-00-00 00:00:00', 0, 2017, 'Data Perubahan', 1),
(305, 1, 1, 2, 2, 'asdasdasd', 'oke', 2112000, 2121222, 25, '2', '2016-07-11 01:42:43', '', '0000-00-00 00:00:00', 0, 2017, 'Data Perubahan', 1),
(306, 1, 1, 2, 3, 'asd', 'asd', 1000000, 122222, 27, '2', '2016-07-11 01:50:12', '', '0000-00-00 00:00:00', 0, 2017, 'Data Perubahan', 1),
(307, 1, 1, 1, 1, 'asd', 'asd', 250000000, 1200000, 24, '2', '2016-07-11 01:54:00', '', '0000-00-00 00:00:00', 0, 2017, 'Data Perubahan', 1),
(308, 1, 1, 2, 4, 'asd', 'asd', 1200000, 3222222, 27, '2', '2016-07-11 01:54:30', '', '0000-00-00 00:00:00', 0, 2017, 'Data Baru', 1),
(309, 1, 1, 1, 6, 'asd', 'asd', 2100000, 14000000, 24, '2', '2016-07-19 17:13:19', '', '0000-00-00 00:00:00', 0, 2020, 'Data Perubahan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_daerah`
--

CREATE TABLE IF NOT EXISTS `prioritas_daerah` (
  `id` bigint(20) NOT NULL,
  `tahun_perencanaan` int(11) NOT NULL,
  `prioritas` text NOT NULL,
  `prioritas_ke` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas_daerah`
--

INSERT INTO `prioritas_daerah` (`id`, `tahun_perencanaan`, `prioritas`, `prioritas_ke`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(3, 2017, 'Meningkatkan Pelayanan Kesehatan', 1, '2016-06-29 18:10:26', '2', '2016-07-13 23:11:07', '2'),
(4, 2017, 'Meningkatkan Kualitas Pendidikan', 2, '2016-07-01 10:01:26', '2', '2016-07-13 23:10:34', '2'),
(5, 2017, 'Mewujudkan Pemerintahan Yang Bersih', 2, '2016-07-13 23:07:25', '2', '2016-07-13 23:10:51', '2');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` bigint(20) NOT NULL,
  `bidang` bigint(20) NOT NULL,
  `kode_program` varchar(100) NOT NULL,
  `program` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `bidang`, `kode_program`, `program`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(5, 31, '02', 'Penataan Struktur Industri', '2', '2016-08-01 11:29:38', '', '0000-00-00 00:00:00'),
(4, 31, '01', 'Pengembangan Industri Kecil dan Menengah', '2', '2016-08-01 11:29:22', '', '0000-00-00 00:00:00'),
(6, 31, '03', 'Pengembangan Sentra-sentra Industri Potensial', '2', '2016-08-01 11:29:53', '', '0000-00-00 00:00:00'),
(7, 30, '01', 'Perlindungan Konsumen dan Pengamanan Perdagangan', '2', '2016-08-01 11:30:28', '', '0000-00-00 00:00:00'),
(8, 30, '02', 'Peningkatan Kerjasama Perdagangan Internasional', '2', '2016-08-01 11:30:45', '', '0000-00-00 00:00:00'),
(9, 30, '03', 'Peningkatan dan Pengembangan Ekspor', '2', '2016-08-01 11:30:59', '', '0000-00-00 00:00:00'),
(10, 30, '04', 'Peningkatan Efisiensi Perdagangan Dalam Negeri', '2', '2016-08-01 11:31:14', '', '0000-00-00 00:00:00'),
(11, 30, '05', 'Pembinaan Pedagang Kaki Lima dan Asongan', '2', '2016-08-01 11:31:34', '', '0000-00-00 00:00:00'),
(12, 29, '01', 'Pengembangan Budidaya Perikanan ', '2', '2016-08-01 11:31:55', '', '0000-00-00 00:00:00'),
(13, 29, '02', 'Pengembangan Sistem Penyuluhan Perikanan', '2', '2016-08-01 11:32:11', '', '0000-00-00 00:00:00'),
(14, 29, '03', 'Optimalisasi Pengelolaan dan Pemasaran Produksi Perikanan', '2', '2016-08-01 11:32:35', '', '0000-00-00 00:00:00'),
(15, 28, '01', 'Pengembangan Pemasaran Pariwisata', '2', '2016-08-01 11:32:53', '', '0000-00-00 00:00:00'),
(16, 28, '02', 'Pengembangan Destinasi Pariwisata', '2', '2016-08-01 11:33:05', '', '0000-00-00 00:00:00'),
(17, 28, '03', 'Pengembangan Kemitraan Pariwisata', '2', '2016-08-01 11:33:18', '', '0000-00-00 00:00:00'),
(18, 27, '01', 'Peningkatan Pelayanan Bidang Energi dan Ketenagalistrikan ', '2', '2016-08-01 11:33:36', '', '0000-00-00 00:00:00'),
(19, 27, '02', 'Peningkatan Pelayanan Bidang Pertambangan Umum', '2', '2016-08-01 11:33:49', '', '0000-00-00 00:00:00'),
(20, 26, '01', 'Peningkatan Kemampuan SDM Pertanian (Petani dan Aparatur)', '2', '2016-08-01 11:34:57', '', '0000-00-00 00:00:00'),
(21, 26, '02', 'Peningkatan Ketahanan Pangan', '2', '2016-08-01 11:35:11', '', '0000-00-00 00:00:00'),
(22, 26, '03', 'Peningkatan Kesejahteraan Petani', '2', '2016-08-01 11:35:27', '', '0000-00-00 00:00:00'),
(23, 26, '04', 'Pengembangan Agribisnis', '2', '2016-08-01 11:35:40', '', '0000-00-00 00:00:00'),
(24, 26, '05', 'Pemberdayaan Penyuluh', '2', '2016-08-01 11:35:55', '', '0000-00-00 00:00:00'),
(25, 26, '06', 'Peningkatan Penerapan Teknologi Pertanian, Perkebunan dan Kehutanan', '2', '2016-08-01 11:36:09', '', '0000-00-00 00:00:00'),
(26, 26, '07', 'Penyediaan Sarana dan Prasarana Infrastruktur Pertanian', '2', '2016-08-01 11:36:24', '', '0000-00-00 00:00:00'),
(27, 26, '08', 'Rehabilitasi Hutan dan Lahan', '2', '2016-08-01 11:36:37', '', '0000-00-00 00:00:00'),
(28, 26, '09', 'Pencegahan dan Penanggulangan Penyakit Ternak', '2', '2016-08-01 11:36:50', '', '0000-00-00 00:00:00'),
(29, 26, '10', 'Peningkatan Produksi Hasil Peternakan', '2', '2016-08-01 11:37:04', '', '0000-00-00 00:00:00'),
(30, 26, '11', 'Peningkatan Pemasaran Hasil Peternakan', '2', '2016-08-01 11:37:18', '', '0000-00-00 00:00:00'),
(31, 26, '12', 'Peningkatan Pemasaran Hasil Produksi pertanian dan Perkebunan', '2', '2016-08-01 11:37:48', '', '0000-00-00 00:00:00'),
(32, 25, '01', 'Pengembangan Komunikasi, Informasi dan Media Massa', '2', '2016-08-01 11:38:11', '', '0000-00-00 00:00:00'),
(33, 25, '02', 'Kerjasama Informasi dengan Mas Media', '2', '2016-08-01 11:38:25', '', '0000-00-00 00:00:00'),
(34, 24, '01', 'Perbaikan Sistem Administrasi Kearsipan', '2', '2016-08-01 11:38:47', '', '0000-00-00 00:00:00'),
(35, 24, '02', 'Penyelamatan dan Pelestarian Dokumen/Arsip Daerah', '2', '2016-08-01 11:39:00', '', '0000-00-00 00:00:00'),
(36, 24, '03', 'Pemeliharaan Rutin/Berkala Sarana dan Prasarana Kearsipan', '2', '2016-08-01 11:39:13', '', '0000-00-00 00:00:00'),
(37, 23, '01', 'Pengembangan Data/Informasi/Statistik Daerah', '2', '2016-08-01 11:39:39', '', '0000-00-00 00:00:00'),
(38, 22, '01', 'Peningkatan Keberadaan Masyarakat ', '2', '2016-08-01 11:39:59', '', '0000-00-00 00:00:00'),
(39, 22, '02', 'Pengembangan Lembaga Ekonomi Kelurahan', '2', '2016-08-01 11:40:29', '', '0000-00-00 00:00:00'),
(40, 22, '03', 'Peningkatan Partisipasi Masyarakat Dalam Membangun Kelurahan', '2', '2016-08-01 11:40:45', '', '0000-00-00 00:00:00'),
(41, 22, '04', 'Peningkatan Kapasitas Aparatur Pemerintah Kelurahan', '2', '2016-08-01 11:41:06', '', '0000-00-00 00:00:00'),
(42, 21, '01', 'Pendidikan Kedinasan', '2', '2016-08-01 11:41:21', '', '0000-00-00 00:00:00'),
(43, 21, '02', 'Peningkatan Kapasitas Sumberdaya Aparatur', '2', '2016-08-01 11:41:35', '', '0000-00-00 00:00:00'),
(44, 21, '03', 'Pembinaan dan Pengembangan Aparatur', '2', '2016-08-01 11:41:47', '', '0000-00-00 00:00:00'),
(45, 20, '01', 'Peningkatan Kapasitas Lembaga Perwakilan Rakyat Daerah', '2', '2016-08-01 11:42:07', '', '0000-00-00 00:00:00'),
(46, 20, '02', 'Peningkatan Layanan Kedinasan Kepala Daerah/Wakil Kepala Daerah', '2', '2016-08-01 11:42:19', '', '0000-00-00 00:00:00'),
(47, 20, '03', 'Peningkatan dan Pengembangan Pengelolaan Keuangan Daerah ', '2', '2016-08-01 11:42:37', '', '0000-00-00 00:00:00'),
(48, 20, '04', 'Pembinaan dan Fasilitasi Pengelolaan Keuangan Daerah ', '2', '2016-08-01 11:42:51', '', '0000-00-00 00:00:00'),
(49, 20, '05', 'Peningkatan Sistem Pengawasan Internal dan Pengendalian Kebijakan Kepala Daerah', '2', '2016-08-01 11:43:04', '', '0000-00-00 00:00:00'),
(50, 20, '06', 'Penataan Peraturan Perundang-undangan', '2', '2016-08-01 11:43:18', '', '0000-00-00 00:00:00'),
(51, 20, '07', 'Pelayanan Administrasi Perkantoran', '2', '2016-08-01 11:43:34', '', '0000-00-00 00:00:00'),
(52, 20, '08', 'Peningkatan Sarana dan Prasarana Aparatur', '2', '2016-08-01 11:43:47', '', '0000-00-00 00:00:00'),
(53, 20, '09', 'Peningkatan Kapasitas Sumber Daya Aparatur', '2', '2016-08-01 11:43:59', '', '0000-00-00 00:00:00'),
(54, 20, '10', 'Peningkatan Pengembangan Sistem Pelaporan Capaian Kinerja dan Keuangan', '2', '2016-08-01 11:44:11', '', '0000-00-00 00:00:00'),
(55, 20, '11', 'Program Mengintensifkan Penanganan Pengaduan Masyarakat', '2', '2016-08-01 11:44:21', '', '0000-00-00 00:00:00'),
(56, 20, '12', 'Peningkatan Disiplin Aparatur', '2', '2016-08-01 11:44:32', '', '0000-00-00 00:00:00'),
(57, 19, '01', 'Peningkatan Keamanan dan Kenyamanan Lingkungan', '2', '2016-08-01 11:44:52', '', '0000-00-00 00:00:00'),
(58, 19, '02', 'Peningkatan Pemberantasan Penyakit Masyarakat', '2', '2016-08-01 11:45:02', '', '0000-00-00 00:00:00'),
(59, 19, '03', 'Pengembangan Wawasan Kebangsaan', '2', '2016-08-01 11:45:17', '', '0000-00-00 00:00:00'),
(60, 19, '04', 'Kemitraan Pengembangan Wawasan Kebangsaan', '2', '2016-08-01 11:45:29', '', '0000-00-00 00:00:00'),
(61, 19, '05', 'Pendidikan Politik Masyarakat', '2', '2016-08-01 11:45:40', '', '0000-00-00 00:00:00'),
(62, 19, '06', 'Koordinasi Dukungan Kelancaran Penyelenggaraan Pemilu', '2', '2016-08-01 11:45:55', '2', '2016-08-01 11:46:29'),
(63, 19, '07', 'Peningkatan Pemahaman, Penghayatan, Pengamalan dan Pengembangan Nilai-nilai Keagamaaan', '2', '2016-08-01 11:46:41', '', '0000-00-00 00:00:00'),
(64, 16, '01', 'Peningkatan Promosi dan Kerjasama Investasi', '2', '2016-08-01 11:47:04', '', '0000-00-00 00:00:00'),
(65, 16, '02', 'Peningkatan Iklim Investasi dan Realisasi Investasi', '2', '2016-08-01 11:47:18', '', '0000-00-00 00:00:00'),
(66, 16, '03', 'Penyiapan Potensi Sumberdaya, Sarana dan Prasarana Daerah', '2', '2016-08-01 11:47:38', '', '0000-00-00 00:00:00'),
(67, 17, '01', 'Pengelolaan Kekayaan Budaya', '2', '2016-08-01 11:48:06', '', '0000-00-00 00:00:00'),
(68, 17, '02', 'Pengembangan Nilai Budaya', '2', '2016-08-01 11:48:17', '', '0000-00-00 00:00:00'),
(69, 18, '01', 'Peningkatan Peran Serta Pemuda', '2', '2016-08-01 11:48:31', '', '0000-00-00 00:00:00'),
(70, 18, '02', 'Peningkatan Sarana Prasarana Olahraga ', '2', '2016-08-01 11:48:42', '', '0000-00-00 00:00:00'),
(71, 18, '03', 'Pembinaan dan Pemasyarakatan Olahraga ', '2', '2016-08-01 11:48:55', '', '0000-00-00 00:00:00'),
(72, 15, '01', 'Iklim Usaha Kecil Menengah yang Kondusif', '2', '2016-08-01 11:49:18', '', '0000-00-00 00:00:00'),
(73, 15, '02', 'Pengembangan Kewirausahaan dan Keunggulan UKM', '2', '2016-08-01 11:49:30', '', '0000-00-00 00:00:00'),
(74, 15, '03', 'Pengembangan Sistem Dukungan Bagi Usaha Mikro Kecil Menengah', '2', '2016-08-01 11:49:45', '', '0000-00-00 00:00:00'),
(75, 14, '01', 'Peningkatan Kualitas dan Produktivitas Tenaga Kerja', '2', '2016-08-01 11:50:02', '', '0000-00-00 00:00:00'),
(76, 14, '02', 'Peningkatan Kesempatan Kerja', '2', '2016-08-01 11:50:14', '', '0000-00-00 00:00:00'),
(77, 14, '03', 'Perlindungan dan Pengembangan Lembaga Ketenagakerjaan', '2', '2016-08-01 11:50:27', '', '0000-00-00 00:00:00'),
(78, 13, '01', 'Pemberdayaan Fakir Miskin, Komunitas Adat Terpencil (KAT) dan Penyandang masalah kesejahteraan sosial (PMKS) Lainnya', '2', '2016-08-01 11:50:43', '', '0000-00-00 00:00:00'),
(79, 13, '02', 'Pelayanan dan Rehabilitasi Kesejahteraan Sosial ', '2', '2016-08-01 11:50:58', '', '0000-00-00 00:00:00'),
(80, 13, '03', 'Para Penyandang Cacat dan Trauma', '2', '2016-08-01 11:51:09', '', '0000-00-00 00:00:00'),
(81, 13, '04', 'Pemberdayaan Kelembagaan Kesejahteraan Sosial', '2', '2016-08-01 11:51:26', '', '0000-00-00 00:00:00'),
(82, 12, '01', 'Keluarga Berencana (KB)', '2', '2016-08-01 11:51:56', '', '0000-00-00 00:00:00'),
(83, 12, '02', 'Kesehatan Reproduksi Remaja', '2', '2016-08-01 11:52:07', '', '0000-00-00 00:00:00'),
(84, 12, '03', 'Pelayanan Kontrasepsi', '2', '2016-08-01 11:52:19', '', '0000-00-00 00:00:00'),
(85, 12, '04', 'Pembinaan Peran Serta Masyarakat Dalam Pelayanan KB/KR Yang Mandiri', '2', '2016-08-01 11:52:34', '', '0000-00-00 00:00:00'),
(86, 12, '05', 'Pengembangan Pusat Pelayanan Informasi dan Konseling KKR', '2', '2016-08-01 11:52:44', '2', '2016-08-01 11:53:14'),
(87, 12, '06', 'peningkatan penanggulangan narkoba, PMS termasuk HIV/AIDS', '2', '2016-08-01 11:53:27', '', '0000-00-00 00:00:00'),
(88, 11, '01', 'Keserasian Kebijakan Peningkatan Kualitas Anak dan Perempuan', '2', '2016-08-01 11:53:45', '', '0000-00-00 00:00:00'),
(89, 11, '02', 'Penguatan Kelembagaan Pengarusutamaan Gender dan Anak', '2', '2016-08-01 11:53:59', '', '0000-00-00 00:00:00'),
(90, 11, '03', 'Peningkatan Kualitas Hidup dan Perlindungan Perempuan', '2', '2016-08-01 11:54:11', '', '0000-00-00 00:00:00'),
(91, 11, '04', 'Peningkatan Peran Serta dan Kesetaraan Gender Dalam Pembangunan', '2', '2016-08-01 11:54:27', '', '0000-00-00 00:00:00'),
(92, 10, '01', 'Penataan Administrasi Kependudukan ', '2', '2016-08-01 11:54:47', '', '0000-00-00 00:00:00'),
(93, 9, '01', 'Penataan Penguasaan, Pemilikan, Penggunaan dan Pemanfaatan Tanah (P4T)', '2', '2016-08-01 11:55:04', '', '0000-00-00 00:00:00'),
(94, 9, '02', 'Penyelesaian Konflik-konflik Pertanahan', '2', '2016-08-01 11:55:19', '', '0000-00-00 00:00:00'),
(95, 8, '01', 'Pengembangan Kinerja Pengelolaan Persampahan', '2', '2016-08-01 11:55:35', '', '0000-00-00 00:00:00'),
(96, 8, '02', 'Pengendalian Pencemaran dan Perusakan Lingkungan Hidup', '2', '2016-08-01 11:55:47', '', '0000-00-00 00:00:00'),
(97, 8, '03', 'Peningkatan Kualitas dan Akses Informasi Sumber Daya Alam dan Lingkungan Hidup', '2', '2016-08-01 11:56:03', '', '0000-00-00 00:00:00'),
(98, 8, '04', 'Peningkatan Pengendalian Polusi', '2', '2016-08-01 11:56:15', '', '0000-00-00 00:00:00'),
(99, 8, '05', 'Pengelolaan Ruang Terbuka Hijau (RTH)', '2', '2016-08-01 11:56:34', '', '0000-00-00 00:00:00'),
(100, 7, '01', 'Pembangunan Prasarana dan Fasilitas Perhubungan', '2', '2016-08-01 11:57:07', '', '0000-00-00 00:00:00'),
(101, 7, '02', 'Rehabilitasi dan Pemeliharaan Prasarana dan Fasilitas LLAJ', '2', '2016-08-01 11:57:25', '', '0000-00-00 00:00:00'),
(102, 7, '03', 'Peningkatan Pelayanan Angkutan ', '2', '2016-08-01 11:57:41', '', '0000-00-00 00:00:00'),
(103, 7, '04', 'Pembangunan Sarana dan Prasarana Perhubungan ', '2', '2016-08-01 11:58:04', '', '0000-00-00 00:00:00'),
(104, 7, '05', 'Pengendalian dan Pengamanan Lalu Lintas', '2', '2016-08-01 11:58:17', '2', '2016-08-01 11:58:42'),
(105, 7, '06', 'Peningkatan Kelaikan Pengoperasian Kendaraan Bermotor', '2', '2016-08-01 11:58:57', '', '0000-00-00 00:00:00'),
(106, 7, '07', 'Peningkatan Kapasitas Sumber Daya Aparatur', '2', '2016-08-01 11:59:14', '', '0000-00-00 00:00:00'),
(107, 6, '01', 'Pengembangan Data/Informasi', '2', '2016-08-01 11:59:37', '', '0000-00-00 00:00:00'),
(108, 6, '02', 'Kerjasama Pembangunan', '2', '2016-08-01 11:59:50', '', '0000-00-00 00:00:00'),
(109, 6, '03', 'Pengembangan Wilayah Perbatasan', '2', '2016-08-01 12:00:05', '', '0000-00-00 00:00:00'),
(110, 6, '04', 'Pengembangan Wilayah Strategis dan Cepat Tumbuh', '2', '2016-08-01 12:00:17', '', '0000-00-00 00:00:00'),
(111, 6, '05', 'Peningkatan Kapasitas Kelembagaan Perencanaan Pembangunan Daerah', '2', '2016-08-01 12:00:29', '', '0000-00-00 00:00:00'),
(112, 6, '06', 'Perencanaan Pembangunan Daerah', '2', '2016-08-01 12:00:48', '', '0000-00-00 00:00:00'),
(113, 6, '07', 'Perencanaan Pembangunan Ekonomi', '2', '2016-08-01 12:01:00', '', '0000-00-00 00:00:00'),
(114, 6, '08', 'Perencanaan Sosial Budaya', '2', '2016-08-01 12:01:15', '', '0000-00-00 00:00:00'),
(115, 6, '09', 'Perencanaan Prasarana Wilayah dan Sumber Daya Alam ', '2', '2016-08-01 12:01:31', '', '0000-00-00 00:00:00'),
(116, 5, '01', 'Perencanaan Tata Ruang', '2', '2016-08-01 12:01:52', '', '0000-00-00 00:00:00'),
(117, 5, '02', 'Pemanfaatan Ruang ', '2', '2016-08-01 12:02:04', '', '0000-00-00 00:00:00'),
(118, 5, '03', 'Pengendalian Pemanfaatan Ruang', '2', '2016-08-01 12:02:22', '', '0000-00-00 00:00:00'),
(119, 4, '01', 'Pengembangan Perumahan', '2', '2016-08-01 12:02:40', '', '0000-00-00 00:00:00'),
(120, 3, '01', 'Pembangunan Jalan dan Jembatan ', '2', '2016-08-01 12:02:58', '', '0000-00-00 00:00:00'),
(121, 3, '02', 'Rehabilitasi/Pemeliharaan Jalan', '2', '2016-08-01 12:03:10', '', '0000-00-00 00:00:00'),
(122, 3, '03', 'Sistem Informasi/data base Jalan dan Jembatan', '2', '2016-08-01 12:03:22', '', '0000-00-00 00:00:00'),
(123, 3, '04', 'Peningkatan Sarana dan Prasarana Kebinamargaan', '2', '2016-08-01 12:03:33', '', '0000-00-00 00:00:00'),
(124, 3, '05', 'Pembangunan Saluran Drainase/Gorong-gorong', '2', '2016-08-01 12:03:46', '', '0000-00-00 00:00:00'),
(125, 3, '06', 'Pengelolaan Jaringan Irigasi', '2', '2016-08-01 12:03:58', '', '0000-00-00 00:00:00'),
(126, 3, '07', 'Pengembangan Wilayah Strategis dan Cepat Tumbuh', '2', '2016-08-01 12:04:09', '', '0000-00-00 00:00:00'),
(127, 3, '08', 'Pencegahan Bahaya Kebakaran', '2', '2016-08-01 12:04:20', '', '0000-00-00 00:00:00'),
(128, 3, '09', 'Pengelolaan TPA', '2', '2016-08-01 12:04:31', '', '0000-00-00 00:00:00'),
(129, 2, '01', 'Pencegahan dan Penanggulangan Penyakit Menular', '2', '2016-08-01 12:04:51', '', '0000-00-00 00:00:00'),
(130, 2, '02', 'Obat dan Perbekalan Kesehatan', '2', '2016-08-01 12:05:03', '', '0000-00-00 00:00:00'),
(131, 2, '03', 'Pengawasan Obat dan Makanan', '2', '2016-08-01 12:05:15', '', '0000-00-00 00:00:00'),
(132, 2, '04', 'Peningkatan Pelayanan Kesehatan Anak Balita', '2', '2016-08-01 12:05:27', '', '0000-00-00 00:00:00'),
(133, 2, '05', 'Pengembangan Lingkungan Sehat', '2', '2016-08-01 12:05:37', '', '0000-00-00 00:00:00'),
(134, 2, '06', 'Promosi Kesehatan dan Pemberdayaan Masyarakat', '2', '2016-08-01 12:05:49', '', '0000-00-00 00:00:00'),
(135, 3, '07', 'Pencegahan Penyakit Tidak Menular', '2', '2016-08-01 12:06:02', '', '0000-00-00 00:00:00'),
(136, 2, '08', 'Peningkatan Mutu Pelayanan Kesehatan', '2', '2016-08-01 12:06:17', '', '0000-00-00 00:00:00'),
(137, 2, '09', 'Pengadaan, Peningkatan dan Perbaikan Sarana dan Prasarana Puskesmas/Puskesmas Pembantu dan Jaringannya', '2', '2016-08-01 12:06:30', '', '0000-00-00 00:00:00'),
(138, 2, '10', 'Peningkatan Sarana dan Prasarana Rumah Sakit', '2', '2016-08-01 12:06:40', '', '0000-00-00 00:00:00'),
(139, 2, '11', 'Upaya Kesehatan Masyarakat', '2', '2016-08-01 12:06:52', '', '0000-00-00 00:00:00'),
(140, 2, '12', 'Kemitraan Peningkatan Pelayanan Kesehatan', '2', '2016-08-01 12:07:03', '', '0000-00-00 00:00:00'),
(141, 2, '13', 'Peningkatan Gizi Masyarakat', '2', '2016-08-01 12:07:18', '', '0000-00-00 00:00:00'),
(142, 2, '14', 'Peningkatan Pelayanan Kesehatan Lansia', '2', '2016-08-01 12:07:29', '', '0000-00-00 00:00:00'),
(143, 2, '15', 'Peningkatan Keselamatan Ibu Melahirkan dan Anak ', '2', '2016-08-01 12:07:42', '', '0000-00-00 00:00:00'),
(144, 1, '01', 'Pendidikan Anak Usia Dini', '2', '2016-08-01 12:08:07', '', '0000-00-00 00:00:00'),
(145, 1, '02', 'Wajib Belajar Pendidikan Dasar 9 Tahun', '2', '2016-08-01 12:08:20', '', '0000-00-00 00:00:00'),
(146, 1, '03', 'Pendidikan Menengah', '2', '2016-08-01 12:08:32', '', '0000-00-00 00:00:00'),
(147, 1, '04', 'Pendidikan Non Formal', '2', '2016-08-01 12:08:43', '', '0000-00-00 00:00:00'),
(148, 1, '05', 'Peningkatan Mutu Pendidikan dan Tenaga Kependidikan', '2', '2016-08-01 12:08:54', '', '0000-00-00 00:00:00'),
(149, 1, '06', 'Managemen Pelayanan Pendidikan', '2', '2016-08-01 12:09:14', '', '0000-00-00 00:00:00'),
(150, 1, '07', 'Pengembangan Budaya Baca dan Pembinaan Perpustakaan', '2', '2016-08-01 12:09:33', '', '0000-00-00 00:00:00'),
(151, 1, '08', 'Publikasi dan Sosialisasi Minat dan Budaya Baca', '2', '2016-08-01 12:09:45', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_fisik_dan_keuangan_dak_dpa`
--

CREATE TABLE IF NOT EXISTS `realisasi_fisik_dan_keuangan_dak_dpa` (
  `id` bigint(20) NOT NULL,
  `id_dpa` bigint(20) NOT NULL,
  `realisasi_fisik` bigint(20) NOT NULL,
  `realisasi_keuangan` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `kontrak` bigint(20) NOT NULL,
  `swakelola` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(111) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(111) NOT NULL,
  `is_perubahan` int(11) NOT NULL,
  `kuasa_pengguna_anggaran` varchar(111) NOT NULL,
  `pejabat_pelaksana_kegiatan` varchar(111) NOT NULL,
  `penerima_manfaat` text NOT NULL,
  `dana_pendamping` bigint(20) NOT NULL,
  `kesesuaian_sasaran_dan_lokasi_dengan_rkpd` enum('Ya','Tidak') NOT NULL,
  `kesesuaian_antara_dpa_dengan_juknis` enum('Ya','Tidak') NOT NULL,
  `modifikasi_masalah` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi_fisik_dan_keuangan_dak_dpa`
--

INSERT INTO `realisasi_fisik_dan_keuangan_dak_dpa` (`id`, `id_dpa`, `realisasi_fisik`, `realisasi_keuangan`, `tahun`, `bulan`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `harga_satuan`, `volume`, `kontrak`, `swakelola`, `created_date`, `created_by`, `mod_date`, `mod_by`, `is_perubahan`, `kuasa_pengguna_anggaran`, `pejabat_pelaksana_kegiatan`, `penerima_manfaat`, `dana_pendamping`, `kesesuaian_sasaran_dan_lokasi_dengan_rkpd`, `kesesuaian_antara_dpa_dengan_juknis`, `modifikasi_masalah`) VALUES
(4, 8, 100, 5000000, 2020, 1, 1, 1, 1, 1, 24, 5000000, 7, 0, 5000000, '2016-07-18 20:43:55', '2', '0000-00-00 00:00:00', '', 0, 'Rizal', 'Lubis', '', 0, 'Tidak', 'Tidak', '-'),
(3, 7, 0, 7000000, 2020, 1, 1, 1, 1, 1, 24, 7000000, 1, 1000000, 5000000, '2016-07-18 20:38:59', '2', '0000-00-00 00:00:00', '', 0, 'Galih', 'Siswanto', 'Kota Pematangsiantar', 1000000, 'Ya', 'Ya', '-'),
(5, 14, 100, 120000000, 2020, 2, 1, 1, 1, 6, 24, 10000000, 12, 50000000, 0, '2016-07-18 22:14:41', '2', '0000-00-00 00:00:00', '', 1, 'Galih', 'Siswanto', '-', 70000000, 'Ya', 'Ya', 'dgf');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi_fisik_dan_keuangan_dau_dpa`
--

CREATE TABLE IF NOT EXISTS `realisasi_fisik_dan_keuangan_dau_dpa` (
  `id` bigint(20) NOT NULL,
  `id_dpa` bigint(20) NOT NULL,
  `realisasi_fisik` bigint(20) NOT NULL,
  `realisasi_keuangan` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `kontrak` bigint(20) NOT NULL,
  `swakelola` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(111) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(111) NOT NULL,
  `is_perubahan` int(11) NOT NULL,
  `kuasa_pengguna_anggaran` varchar(111) NOT NULL,
  `pejabat_pelaksana_kegiatan` varchar(111) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi_fisik_dan_keuangan_dau_dpa`
--

INSERT INTO `realisasi_fisik_dan_keuangan_dau_dpa` (`id`, `id_dpa`, `realisasi_fisik`, `realisasi_keuangan`, `tahun`, `bulan`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `harga_satuan`, `volume`, `kontrak`, `swakelola`, `created_date`, `created_by`, `mod_date`, `mod_by`, `is_perubahan`, `kuasa_pengguna_anggaran`, `pejabat_pelaksana_kegiatan`) VALUES
(4, 17, 100, 144000000, 2020, 1, 1, 1, 1, 5, 24, 12000000, 12, 144000000, 0, '2016-07-18 01:12:36', '2', '0000-00-00 00:00:00', '', 0, '', ''),
(9, 7, 0, 1600000, 2020, 1, 1, 1, 1, 1, 24, 3000000, 12, 0, 1600000, '2016-07-18 19:04:19', '2', '0000-00-00 00:00:00', '', 1, '', ''),
(7, 18, 0, 2000000, 2020, 2, 1, 1, 1, 5, 24, 250000, 12, 0, 2000000, '2016-07-18 18:41:59', '2', '0000-00-00 00:00:00', '', 0, 'asd', 'asd'),
(10, 17, 90, 10000000, 2020, 1, 1, 1, 1, 5, 24, 12000000, 12, 10000000, 0, '2016-07-27 11:06:14', '2', '0000-00-00 00:00:00', '', 0, 'sihombing', 'nababan');

-- --------------------------------------------------------

--
-- Table structure for table `rekening_belanja`
--

CREATE TABLE IF NOT EXISTS `rekening_belanja` (
  `id` bigint(20) NOT NULL,
  `uraian` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `kode1` varchar(100) NOT NULL,
  `kode2` varchar(111) NOT NULL,
  `kode3` varchar(111) NOT NULL,
  `kode4` varchar(111) NOT NULL,
  `kode5` varchar(111) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1674 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening_belanja`
--

INSERT INTO `rekening_belanja` (`id`, `uraian`, `parent_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 'BELANJA', 0, '5', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'BELANJA TIDAK LANGSUNG', 1, '5', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Belanja Pegawai', 2, '5', '1', '1', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'Belanja Gaji dan Tunjangan', 3, '5', '1', '1', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'Gaji Pokok PNS/ Uang Representasi', 4, '5', '1', '1', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 'Tunjangan Keluarga', 4, '5', '1', '1', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 'Tunjangan Jabatan', 4, '5', '1', '1', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 'Tunjangan Fungsional', 4, '5', '1', '1', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 'Tunjangan Fungsional Umum', 4, '5', '1', '1', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(10, 'Tunjangan Beras', 4, '5', '1', '1', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(11, 'Tunjangan PPh/Tunjangan Khusus', 4, '5', '1', '1', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(12, 'Pembulatan Gaji', 4, '5', '1', '1', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(13, 'Iuran Jaminan Kesehatan', 4, '5', '1', '1', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(14, 'Uang Paket', 4, '5', '1', '1', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 'Tunjangan Badan Musyawarah', 4, '5', '1', '1', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(16, 'Tunjangan Komisi', 4, '5', '1', '1', '01', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(17, 'Tunjangan Badan Anggaran', 4, '5', '1', '1', '01', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(18, 'Tunjangan Badan Kehormatan', 4, '5', '1', '1', '01', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(19, 'Tunjangan Alat Kelengkapan Lainnya', 4, '5', '1', '1', '01', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(20, 'Tunjangan Perumahan', 4, '5', '1', '1', '01', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(21, 'Iuran Jaminan Kematian/Uang Duka Wafat/Tewas', 4, '5', '1', '1', '01', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(22, 'Uang Jasa Pengabdian', 4, '5', '1', '1', '01', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(23, 'Iuran Jaminan Kecelakaan Kerja', 4, '5', '1', '1', '01', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(24, 'Biaya Penunjang Operasional Pimpinan DPRD', 4, '5', '1', '1', '01', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(25, 'Tunjangan Kesehatan DPRD', 4, '5', '1', '1', '01', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(26, 'Biaya Penyelenggaraan Jenazah', 4, '5', '1', '1', '01', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(27, 'Belanja Tambahan Penghasilan PNS', 3, '5', '1', '1', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(28, 'Tambahan Penghasilan berdasarkan beban kerja', 27, '5', '1', '1', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(29, 'Tambahan Penghasilan berdasarkan tempat bertugas', 27, '5', '1', '1', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(30, 'Tambahan Penghasilan berdasarkan kondisi kerja', 27, '5', '1', '1', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(31, 'Tambahan Penghasilan berdasarkan kelangkaan profesi', 27, '5', '1', '1', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(32, 'Tambahan Penghasilan Berdasarkan Pertimbangan Objektif', 27, '5', '1', '1', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(33, 'Tunjangan Kinerja', 27, '5', '1', '1', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(34, 'Belanja Penerimaan lainnya Pimpinan dan anggota DPRD serta KDH/WKDH', 3, '5', '1', '1', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(35, 'Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD', 34, '5', '1', '1', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(36, 'Biaya Penunjang Operasional KDH/WKDH', 34, '5', '1', '1', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(37, 'Dst ...............', 34, '5', '1', '1', '03', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(38, 'Biaya Pemungutan Pajak Bumi dan Bangunan', 3, '5', '1', '1', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(39, 'Biaya Pemungutan Pajak Bumi dan Bangunan Pertambangan', 38, '5', '1', '1', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(40, 'Biaya Pemungutan Pajak Bumi dan Bangunan Perkebunan', 38, '5', '1', '1', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(41, 'Biaya Pemungutan Pajak Bumi dan Bangunan Perhutanan', 38, '5', '1', '1', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(42, 'Insentif Pemungutan Pajak Daerah', 3, '5', '1', '1', '05', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(43, 'Insentif Pemungutan Pajak Daerah - Pajak Kendaraan Bermotor', 42, '5', '1', '1', '05', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(44, 'Insentif Pemungutan Pajak Daerah - Bea Balik Nama Kendaraan Bermotor', 42, '5', '1', '1', '05', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(45, 'Insentif Pemungutan Pajak Daerah - Pajak Bahan Bakar Kendaraan Bermotor', 42, '5', '1', '1', '05', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(46, 'Insentif Pemungutan Pajak Daerah - Pajak Air Permukaan', 42, '5', '1', '1', '05', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(47, 'Insentif Pemungutan Pajak Daerah - Pajak Rokok', 42, '5', '1', '1', '05', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(48, 'Insentif Pemungutan Pajak Daerah - Pajak Hotel', 42, '5', '1', '1', '05', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(49, 'Insentif Pemungutan Pajak Daerah - Pajak Restoran', 42, '5', '1', '1', '05', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(50, 'Insentif Pemungutan Pajak Daerah - Pajak Hiburan', 42, '5', '1', '1', '05', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(51, 'Insentif Pemungutan Pajak Daerah - Pajak Reklame', 42, '5', '1', '1', '05', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(52, 'Insentif Pemungutan Pajak Daerah - Pajak Penerangan Jalan', 42, '5', '1', '1', '05', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(53, 'Insentif Pemungutan Pajak Daerah - Pajak Parkir', 42, '5', '1', '1', '05', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(54, 'Insentif Pemungutan Pajak Daerah - Pajak Air Tanah', 42, '5', '1', '1', '05', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(55, 'Insentif Pemungutan Pajak Daerah - Pajak Sarang Burung Walet', 42, '5', '1', '1', '05', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(56, 'Insentif Pemungutan Pajak Daerah - Pajak Mineral Bukan Logam dan Batuan', 42, '5', '1', '1', '05', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(57, 'Insentif Pemungutan Pajak Daerah - Pajak Bumi dan Bangunan Pedesaan dan Perkotaan', 42, '5', '1', '1', '05', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(58, 'Insentif Pemungutan Pajak Daerah - Bea Perolehan Hak Atas Tanah dan Bangunan', 42, '5', '1', '1', '05', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(59, 'Insentif Pemungutan Retribusi Daerah', 3, '5', '1', '1', '06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(60, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Kesehatan', 59, '5', '1', '1', '06', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(61, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Persampahan/ Kebersihan', 59, '5', '1', '1', '06', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(62, 'Insentif Pemungutan Retribusi Daerah - Penggantian Biaya Cetak Kartu Tanda Penduduk dan Akta Catatan', 59, '5', '1', '1', '06', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(63, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pemakaman dan Pengabuan Mayat', 59, '5', '1', '1', '06', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(64, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Parkir di Tepi Jalan Umum', 59, '5', '1', '1', '06', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(65, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pasar', 59, '5', '1', '1', '06', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(66, 'Insentif Pemungutan Retribusi Daerah - Pengujian Kendaraan Bermotor', 59, '5', '1', '1', '06', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(67, 'Insentif Pemungutan Retribusi Daerah - Pemeriksaan Alat Pemadam Kebakaran', 59, '5', '1', '1', '06', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(68, 'Insentif Pemungutan Retribusi Daerah - Penggantian Biaya Cetak Peta', 59, '5', '1', '1', '06', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(69, 'Insentif Pemungutan Retribusi Daerah - Penyediaan dan/atau Penyedotan Kakus', 59, '5', '1', '1', '06', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(70, 'Insentif Pemungutan Retribusi Daerah - Pengolahan Limbah Cair', 59, '5', '1', '1', '06', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(71, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Tera/Tera Ulang', 59, '5', '1', '1', '06', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(72, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pendidikan', 59, '5', '1', '1', '06', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(73, 'Insentif Pemungutan Retribusi Daerah - Pengendalian Menara Telekomunikasi', 59, '5', '1', '1', '06', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(74, 'Insentif Pemungutan Retribusi Daerah - Pemakaian Kekayaan Daerah', 59, '5', '1', '1', '06', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(75, 'Insentif Pemungutan Retribusi Daerah - Pasar Grosir dan/ atau Pertokoan', 59, '5', '1', '1', '06', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(76, 'Insentif Pemungutan Retribusi Daerah - Tempat Pelelangan', 59, '5', '1', '1', '06', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(77, 'Insentif Pemungutan Retribusi Daerah - Terminal', 59, '5', '1', '1', '06', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(78, 'Insentif Pemungutan Retribusi Daerah - Tempat Khusus Parkir', 59, '5', '1', '1', '06', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(79, 'Insentif Pemungutan Retribusi Daerah - Tempat Penginapan/ Pesanggrahan/ Villa', 59, '5', '1', '1', '06', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(80, 'Insentif Pemungutan Retribusi Daerah - Rumah Potong Hewan', 59, '5', '1', '1', '06', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(81, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Kepelabuhan', 59, '5', '1', '1', '06', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(82, 'Insentif Pemungutan Retribusi Daerah - Tempat Rekreasi dan Olah raga', 59, '5', '1', '1', '06', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(83, 'Insentif Pemungutan Retribusi Daerah - Penyeberangan Air', 59, '5', '1', '1', '06', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(84, 'Insentif Pemungutan Retribusi Daerah - Penjualan Produksi Usaha Daerah', 59, '5', '1', '1', '06', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(85, 'Insentif Pemungutan Retribusi Daerah - Izin Mendirikan Bangunan', 59, '5', '1', '1', '06', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(86, 'Insentif Pemungutan Retribusi Daerah - Izin Tempat Penjualan Minuman Beralkohol', 59, '5', '1', '1', '06', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(87, 'Insentif Pemungutan Retribusi Daerah - Izin Gangguan', 59, '5', '1', '1', '06', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(88, 'Insentif Pemungutan Retribusi Daerah - Izin Trayek', 59, '5', '1', '1', '06', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(89, 'Insentif Pemungutan Retribusi Daerah - Izin Perikanan', 59, '5', '1', '1', '06', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(90, 'Insentif Pemungutan Retribusi Daerah - Pengendalian Lalu Lintas', 59, '5', '1', '1', '06', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(91, 'Insentif Pemungutan Retribusi Daerah - Perpanjangan Izin Mempekerjakan Tenaga Kerja Asing (IMTA)', 59, '5', '1', '1', '06', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(92, 'Tambahan Penghasilan Lain', 3, '5', '1', '1', '07', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(93, 'Tambahan Penghasilan Guru PNSD', 92, '5', '1', '1', '07', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(94, 'Tunjangan Profesi Guru PNSD', 92, '5', '1', '1', '07', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(95, 'BELANJA LANGSUNG', 1, '5', '2', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(96, 'BELANJA PEGAWAI', 95, '5', '2', '1', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(97, 'Belanja Pegawai BLUD', 96, '5', '2', '1', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(98, 'Belanja pegawai BLUD', 97, '5', '2', '1', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(99, 'Uang Lembur', 96, '5', '2', '1', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(100, 'Uang Lembur PNS', 99, '5', '2', '1', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(101, 'Uang Lembur Non PNS', 99, '5', '2', '1', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(102, 'BELANJA BARANG DAN JASA', 95, '5', '2', '2', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(103, 'Belanja Bahan Pakai Habis', 102, '5', '2', '2', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(104, 'Belanja alat tulis kantor', 103, '5', '2', '2', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(105, 'Belanja dokumen/administrasi tender (Tidak digunakan)', 103, '5', '2', '2', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(106, 'Belanja alat listrik dan elektronik', 103, '5', '2', '2', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(107, 'Belanja perangko, materai dan benda pos lainnya', 103, '5', '2', '2', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(108, 'Belanja peralatan kebersihan dan bahan pembersih', 103, '5', '2', '2', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(109, 'Belanja Bahan Bakar Minyak/Gas (digunakan langsung untuk kegiatan)', 103, '5', '2', '2', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(110, 'Belanja pengisian tabung pemadam kebakaran', 103, '5', '2', '2', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(111, 'Belanja pengisian tabung gas', 103, '5', '2', '2', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(112, 'Belanja Logistik (Kebutuhan Pokok Harian Rumah Tangga KDH/WKDH, RUmah Sakit dan Panti)', 103, '5', '2', '2', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(113, 'Belanja Seminar Kit Peserta', 103, '5', '2', '2', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(114, 'Belanja Penghargaan (hadiah dalam bentuk benda)', 103, '5', '2', '2', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(115, 'Belanja peralatan/perlengkapan pakai habis', 103, '5', '2', '2', '01', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(116, 'Belanja Bahan/Material', 102, '5', '2', '2', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(117, 'Belanja bahan baku bangunan', 116, '5', '2', '2', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(118, 'Belanja bahan/bibit tanaman', 116, '5', '2', '2', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(119, 'Belanja bibit ternak/ikan', 116, '5', '2', '2', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(120, 'Belanja bahan obat-obatan', 116, '5', '2', '2', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(121, 'Belanja bahan kimia', 116, '5', '2', '2', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(122, 'Belanja Persediaan Makanan Pokok', 116, '5', '2', '2', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(123, 'Belanja Bahan Percontohan/Promosi', 116, '5', '2', '2', '02', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(124, 'Belanja Bahan Pengujian Kendaraan', 116, '5', '2', '2', '02', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(125, 'Belanja Bahan Makanan Ternak', 116, '5', '2', '2', '02', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(126, 'Belanja Bahan/Material Dekorasi', 116, '5', '2', '2', '02', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(127, 'Belanja bahan/material alat tera ulang', 116, '5', '2', '2', '02', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(128, 'Belanja Bahan Praktek/Keterampilan', 116, '5', '2', '2', '02', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(129, 'dst....', 116, '5', '2', '2', '02', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(130, 'Belanja Jasa Kantor', 102, '5', '2', '2', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(131, 'Belanja telepon', 130, '5', '2', '2', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(132, 'Belanja air', 130, '5', '2', '2', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(133, 'Belanja listrik', 130, '5', '2', '2', '03', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(134, 'Belanja Jasa pengumuman lelang/ pemenang lelang (tidak digunakan)', 130, '5', '2', '2', '03', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(135, 'Belanja surat kabar/majalah', 130, '5', '2', '2', '03', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(136, 'Belanja kawat/faksimili/internet/VPN', 130, '5', '2', '2', '03', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(137, 'Belanja paket/pengiriman', 130, '5', '2', '2', '03', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(138, 'Belanja Sertifikasi/kalibrasi/akreditasi', 130, '5', '2', '2', '03', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(139, 'Belanja Jasa Transaksi Keuangan', 130, '5', '2', '2', '03', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(140, 'Belanja jasa administrasi pungutan Pajak Penerangan Jalan Umum', 130, '5', '2', '2', '03', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(141, 'Belanja jasa administrasi pungutan Pajak Bahan Bakar Kendaraan Bermotor', 130, '5', '2', '2', '03', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(142, 'Belanja Jasa Laboratorium', 130, '5', '2', '2', '03', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(143, 'Belanja Jasa Publikasi', 130, '5', '2', '2', '03', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(144, 'Belanja jasa akomodasi', 130, '5', '2', '2', '03', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(145, 'Belanja pajak bumi dan bangunan', 130, '5', '2', '2', '03', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(146, 'Belanja Jasa Notaris', 130, '5', '2', '2', '03', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(147, 'Belanja jasa pemandu pelayanan pajak', 130, '5', '2', '2', '03', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(148, 'Belanja Jasa Tata Boga', 130, '5', '2', '2', '03', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(149, 'Belanja retribusi sampah', 130, '5', '2', '2', '03', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(150, 'Belanja Transportasi', 130, '5', '2', '2', '03', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(151, 'Belanja Jasa Ongkos Naik Haji Petugas Pemandu Haji Daerah', 130, '5', '2', '2', '03', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(152, 'Belanja Premi Asuransi', 102, '5', '2', '2', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(153, 'Belanja Premi Asuransi Kesehatan', 152, '5', '2', '2', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(154, 'Belanja Premi Asuransi Barang Milik Daerah', 152, '5', '2', '2', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(155, 'Dst', 152, '5', '2', '2', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(156, 'Belanja Perawatan Kendaraan Bermotor', 102, '5', '2', '2', '05', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(157, 'Belanja Jasa Service', 156, '5', '2', '2', '05', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(158, 'Belanja Penggantian Suku Cadang', 156, '5', '2', '2', '05', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(159, 'Belanja Bahan Bakar Minyak/Gas dan pelumas', 156, '5', '2', '2', '05', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(160, 'Belanja Jasa KIR', 156, '5', '2', '2', '05', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(161, 'Belanja Pajak Kendaraan Bermotor', 156, '5', '2', '2', '05', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(162, 'Belanja Bea Balik Nama Kendaraan Bermotor', 156, '5', '2', '2', '05', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(163, 'dst..', 156, '5', '2', '2', '05', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(164, 'Belanja Cetak dan Penggandaan', 102, '5', '2', '2', '06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(165, 'Belanja cetak', 164, '5', '2', '2', '06', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(166, 'Belanja Penggandaan', 164, '5', '2', '2', '06', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(167, '...', 164, '5', '2', '2', '06', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(168, 'Belanja Sewa Rumah/Gedung/Gudang/Parkir', 102, '5', '2', '2', '07', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(169, 'Belanja sewa rumah jabatan/rumah dinas', 168, '5', '2', '2', '07', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(170, 'Belanja sewa gedung/ kantor/tempat', 168, '5', '2', '2', '07', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(171, 'Belanja sewa ruang rapat/pertemuan', 168, '5', '2', '2', '07', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(172, 'Belanja sewa tempat parkir/uang tambat/hanggar sarana mobilitas', 168, '5', '2', '2', '07', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(173, 'Dst....................................', 168, '5', '2', '2', '07', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(174, 'Belanja Sewa Sarana Mobilitas', 102, '5', '2', '2', '08', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(175, 'Belanja sewa Sarana Mobilitas Darat', 174, '5', '2', '2', '08', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(176, 'Belanja sewa Sarana Mobilitas Air', 174, '5', '2', '2', '08', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(177, 'Belanja sewa Sarana Mobilitas Udara', 174, '5', '2', '2', '08', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(178, 'Dst', 174, '5', '2', '2', '08', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(179, 'Belanja Sewa Alat Berat', 102, '5', '2', '2', '09', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(180, 'Belanja sewa Eskavator', 179, '5', '2', '2', '09', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(181, 'Belanja sewa Buldoser', 179, '5', '2', '2', '09', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(182, 'Belanja sewa crane', 179, '5', '2', '2', '09', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(183, 'dst...', 179, '5', '2', '2', '09', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(184, 'Belanja Sewa Perlengkapan dan Peralatan Kantor', 102, '5', '2', '2', '10', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(185, 'Belanja sewa meja kursi', 184, '5', '2', '2', '10', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(186, 'Belanja sewa komputer dan printer', 184, '5', '2', '2', '10', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(187, 'Belanja sewa proyektor', 184, '5', '2', '2', '10', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(188, 'Belanja sewa generator', 184, '5', '2', '2', '10', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(189, 'Belanja sewa tenda', 184, '5', '2', '2', '10', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(190, 'Belanja sewa pakaian adat/tradisional', 184, '5', '2', '2', '10', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(191, 'Belanja sewa taman/bunga untuk taman hias', 184, '5', '2', '2', '10', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(192, 'Belanja sewa sound system dan alat musik', 184, '5', '2', '2', '10', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(193, 'Belanja sewa mesin', 184, '5', '2', '2', '10', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(194, 'Belanja sewa bandwidth', 184, '5', '2', '2', '10', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(195, 'Belanja sewa peralatan dapur', 184, '5', '2', '2', '10', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(196, 'Belanja sewa alat telekomunikasi', 184, '5', '2', '2', '10', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(197, 'Belanja sewa alat praktek', 184, '5', '2', '2', '10', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(198, 'Belanja sewa billboard', 184, '5', '2', '2', '10', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(199, 'Belanja sewa alat pendingin', 184, '5', '2', '2', '10', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(200, 'Belanja Sewa Alat Musik', 184, '5', '2', '2', '10', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(201, 'Belanja Sewa Stand', 184, '5', '2', '2', '10', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(202, 'dst...', 184, '5', '2', '2', '10', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(203, 'Belanja Makanan dan  Minuman', 102, '5', '2', '2', '11', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(204, 'Belanja makanan dan minuman harian pegawai', 203, '5', '2', '2', '11', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(205, 'Belanja makanan dan minuman rapat', 203, '5', '2', '2', '11', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(206, 'Belanja makanan dan minuman tamu', 203, '5', '2', '2', '11', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(207, 'Belanja makanan dan minuman kegiatan', 203, '5', '2', '2', '11', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(208, 'Belanja makanan dan minuman Harian Pengaman', 203, '5', '2', '2', '11', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(209, 'dst...', 203, '5', '2', '2', '11', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(210, 'Belanja Pakaian Dinas dan Atributnya', 102, '5', '2', '2', '12', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(211, 'Belanja pakaian Dinas KDH/WKDH/DPRD', 210, '5', '2', '2', '12', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(212, 'Belanja Pakaian Sipil Harian (PSH)', 210, '5', '2', '2', '12', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(213, 'Belanja Pakaian Sipil Lengkap (PSL)', 210, '5', '2', '2', '12', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(214, 'Belanja Pakaian Dinas Harian (PDH)', 210, '5', '2', '2', '12', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(215, 'Belanja Pakaian Dinas Upacara (PDU)', 210, '5', '2', '2', '12', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(216, 'dst...', 210, '5', '2', '2', '12', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(217, 'Belanja Pakaian Kerja', 102, '5', '2', '2', '13', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(218, 'Belanja pakaian kerja lapangan', 217, '5', '2', '2', '13', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(219, 'Belanja Pakaian Kerja.', 217, '5', '2', '2', '13', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(220, 'Belanja Pakaian khusus dan hari-hari tertentu', 102, '5', '2', '2', '14', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(221, 'Belanja pakaian KORPRI', 220, '5', '2', '2', '14', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(222, 'Belanja pakaian adat daerah', 220, '5', '2', '2', '14', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(223, 'Belanja pakaian batik tradisional', 220, '5', '2', '2', '14', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(224, 'Belanja pakaian olahraga', 220, '5', '2', '2', '14', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(225, 'Belanja pakaian Paskibra', 220, '5', '2', '2', '14', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(226, 'dst..', 220, '5', '2', '2', '14', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(227, 'Belanja Perjalanan Dinas', 102, '5', '2', '2', '15', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(228, 'Belanja perjalanan dinas dalam daerah', 227, '5', '2', '2', '15', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(229, 'Belanja perjalanan dinas luar daerah', 227, '5', '2', '2', '15', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(230, 'Belanja perjalanan dinas luar negeri*****', 227, '5', '2', '2', '15', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(231, 'Belanja Perjalanan Pindah Tugas', 102, '5', '2', '2', '16', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(232, 'Belanja perjalanan pindah tugas dalam daerah', 231, '5', '2', '2', '16', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(233, 'Belanja perjalanan pindah tugas luar daerah', 231, '5', '2', '2', '16', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(234, 'Belanja Pemulangan Pegawai', 102, '5', '2', '2', '17', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(235, 'Belanja pemulangan pegawai yang pensiun dalam daerah', 234, '5', '2', '2', '17', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(236, 'Belanja pemulangan pegawai yang pensiun luar daerah', 234, '5', '2', '2', '17', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(237, 'Belanja Pemeliharaan', 102, '5', '2', '2', '18', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(238, 'Belanja Pemeliharan Tanah', 237, '5', '2', '2', '18', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(239, 'Belanja Pemeliharan Peralatan dan Mesin', 237, '5', '2', '2', '18', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(240, 'Belanja Pemeliharan Gedung dan Bangunan', 237, '5', '2', '2', '18', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(241, 'Belanja Pemeliharan Jalan, Irigasi, dan Jaringan', 237, '5', '2', '2', '18', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(242, 'Belanja Pemeliharan Aset Tetap Lainnya', 237, '5', '2', '2', '18', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(243, 'Belanja Pemeliharaan Jembatan', 237, '5', '2', '2', '18', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(244, 'Belanja Pemeliharaan Sistim dan Jaringan Komputer', 237, '5', '2', '2', '18', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(245, 'Belanja Pemeliharaan Embung, Chakdam dan Grounsill', 237, '5', '2', '2', '18', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(246, 'Belanja Pemeliharaan Sungai', 237, '5', '2', '2', '18', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(247, 'Belanja Jasa Konsultansi', 102, '5', '2', '2', '19', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(248, 'Belanja Jasa Konsultansi Penelitian', 247, '5', '2', '2', '19', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(249, 'Belanja Jasa Konsultansi Perencanaan', 247, '5', '2', '2', '19', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(250, 'Belanja Jasa Konsultansi Pengawasan', 247, '5', '2', '2', '19', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(251, 'Belanja jasa konsultansi keuangan', 247, '5', '2', '2', '19', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(252, 'Belanja jasa konsultansi apraisal', 247, '5', '2', '2', '19', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(253, 'Belanja jasa konsultansi survellen/assesmen', 247, '5', '2', '2', '19', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(254, 'Belanja jasa konsultansi design', 247, '5', '2', '2', '19', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(255, 'Belanja jasa konsultansi AMDAL', 247, '5', '2', '2', '19', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(256, 'Belanja jasa konsultansi teknologi informasi', 247, '5', '2', '2', '19', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(257, 'Belanja jasa konsultansi Akreditasi', 247, '5', '2', '2', '19', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(258, 'Belanja Jasa Konsultansi Pendampingan', 247, '5', '2', '2', '19', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(259, 'Belanja Barang Untuk Diserahkan kepada Masyarakat/Pihak Ketiga', 102, '5', '2', '2', '20', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(260, 'Belanja Barang Yang Akan Diserahkan Kepada Masyarakat', 259, '5', '2', '2', '20', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(261, 'Belanja Barang Yang Akan Diserahkan Kepada Pihak Ketiga', 259, '5', '2', '2', '20', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(262, 'Belanja Barang Untuk Dijual kepada Masyarakat/Pihak Ketiga', 102, '5', '2', '2', '21', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(263, 'Belanja Barang Yang Akan Dijual Kepada Masyarakat', 262, '5', '2', '2', '21', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(264, 'Belanja Barang Yang Akan Dijual Kepada Pihak Ketiga', 262, '5', '2', '2', '21', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(265, 'Belanja Beasiswa Pendidikan PNS', 102, '5', '2', '2', '22', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(266, 'Belanja beasiswa tugas belajar D3', 265, '5', '2', '2', '22', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(267, 'Belanja beasiswa tugas belajar S1', 265, '5', '2', '2', '22', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(268, 'Belanja beasiswa tugas belajar S2', 265, '5', '2', '2', '22', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(269, 'Belanja beasiswa tugas belajar S3', 265, '5', '2', '2', '22', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(270, 'Dst', 265, '5', '2', '2', '22', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(271, 'Belanja kursus, pelatihan, sosialisasi dan bimbingan teknis PNS', 102, '5', '2', '2', '23', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(272, 'Belanja kursus.', 271, '5', '2', '2', '23', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(273, 'Belanja Pelatihan.', 271, '5', '2', '2', '23', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(274, 'Belanja Sosialisasi.', 271, '5', '2', '2', '23', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(275, 'Belanja Bimbingan Teknis.', 271, '5', '2', '2', '23', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(276, 'Belanja Magang.', 271, '5', '2', '2', '23', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(277, 'Belanja Jasa Lembaga', 102, '5', '2', '2', '24', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(278, 'Belanja jasa lembaga Kesenian', 277, '5', '2', '2', '24', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(279, 'Belanja jasa Lembaga Tes Psikologi', 277, '5', '2', '2', '24', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(280, 'Belanja jasa lembaga akreditasi', 277, '5', '2', '2', '24', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(281, 'Belanja jasa lembaga sertifikasi', 277, '5', '2', '2', '24', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(282, 'Belanja jasa lembaga kalibrasi', 277, '5', '2', '2', '24', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(283, 'Belanja jasa lembaga Pengadilan', 277, '5', '2', '2', '24', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(284, 'Belanja jasa lembaga pengamanan', 277, '5', '2', '2', '24', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(285, 'Belanja jasa lembaga penyedia sopir', 277, '5', '2', '2', '24', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(286, 'Belanja jasa lembaga kesehatan', 277, '5', '2', '2', '24', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(287, 'Belanja Jasa Lembaga Pendidikan', 277, '5', '2', '2', '24', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(288, 'Belanja Jasa Lembaga Kajian', 277, '5', '2', '2', '24', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(289, 'Belanja Jasa Lembaga Pengujian Mutu', 277, '5', '2', '2', '24', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(290, 'Belanja Honorarium Non Pegawai', 102, '5', '2', '2', '25', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(291, 'Honorarium Tenaga Ahli/Narasumber/Instruktur', 290, '5', '2', '2', '25', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(292, 'Belanja Jasa Moderator', 290, '5', '2', '2', '25', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(293, 'Belanja Jasa Pelayanan Tindak Medik dan Jaga', 290, '5', '2', '2', '25', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(294, 'Belanja Jasa Pengawas', 290, '5', '2', '2', '25', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(295, 'Belanja Jasa Penguji', 290, '5', '2', '2', '25', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(296, 'Belanja Jasa Petugas Asrama', 290, '5', '2', '2', '25', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(297, 'Belanja Jasa Anggota Korp Musik', 290, '5', '2', '2', '25', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(298, 'Belanja Jasa Pelaksana Upacara Hari-Hari Besar', 290, '5', '2', '2', '25', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(299, 'Belanja Jasa Sukarelawan', 290, '5', '2', '2', '25', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(300, 'Belanja Jasa Buruh/Tukang/Mandor', 290, '5', '2', '2', '25', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(301, 'Belanja Jasa Pelayanan IB/TE', 290, '5', '2', '2', '25', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(302, 'Belanja Jasa Penerjemah', 290, '5', '2', '2', '25', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(303, 'Belanja Jasa Penguburan Kelayan Panti/Pasien Rumah Sakit', 290, '5', '2', '2', '25', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(304, 'Belanja Jasa Pembuatan Peta (Manual/Tematik/Digital)', 290, '5', '2', '2', '25', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(305, 'Belanja Jasa Pemeriksa Berkas Kepangkatan/Hasil Tes/Ujian/Wawancara', 290, '5', '2', '2', '25', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(306, 'Belanja Jasa Pelaku Seni', 290, '5', '2', '2', '25', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(307, 'Belanja Jasa MC/Pembawa Acara', 290, '5', '2', '2', '25', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(308, 'Belanja Jasa Pengaman kantor', 290, '5', '2', '2', '25', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(309, 'Belanja Jasa Petugas Kebersihan', 290, '5', '2', '2', '25', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(310, 'Belanja Jasa Sopir', 290, '5', '2', '2', '25', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(311, 'Belanja Jasa Peliputan', 290, '5', '2', '2', '25', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(312, 'Belanja Jasa Petugas RPH', 290, '5', '2', '2', '25', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(313, 'Belanja Jasa Saksi', 290, '5', '2', '2', '25', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(314, 'Belanja Jasa Penceramah/Rohaniwan', 290, '5', '2', '2', '25', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(315, 'Belanja Jasa Petugas Lapangan', 290, '5', '2', '2', '25', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(316, 'Belanja Jasa Desain', 290, '5', '2', '2', '25', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(317, 'Belanja Jasa Loundry', 290, '5', '2', '2', '25', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(318, 'Belanja Jasa Petugas Rumah Jabatan (Khusus KDH/Wakil KDH)*', 290, '5', '2', '2', '25', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(319, 'Belanja Jasa Pengamanan Ujian', 290, '5', '2', '2', '25', '0034', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(320, 'Belanja Jasa Dekorator', 290, '5', '2', '2', '25', '0035', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(321, 'Belanja Honorarium Penulisan Buletin', 290, '5', '2', '2', '25', '0036', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(322, 'Uang Untuk Diberikan Pada Pihak Ketiga/Masyarakat', 102, '5', '2', '2', '26', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(323, 'Uang untuk diberikan kepada Pihak Ketiga', 322, '5', '2', '2', '26', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(324, 'Uang Untuk Kebutuhan Kelayan/Atlit  (SPP dan Uang saku)', 322, '5', '2', '2', '26', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(325, 'Uang Untuk Hadiah Lomba', 322, '5', '2', '2', '26', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(326, 'Uang Akibat Keputusan Pengadilan', 322, '5', '2', '2', '26', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(327, 'Honorarium PNS', 102, '5', '2', '2', '27', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(328, 'Honorarium Panitia Pelaksana Kegiatan (Tidak dipakai)', 327, '5', '2', '2', '27', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(329, 'Honorarium Tim Pengadaan Barang dan Jasa', 327, '5', '2', '2', '27', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(330, 'Honorarium Tenaga Ahi/Instruktur/Narasumber', 327, '5', '2', '2', '27', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(331, 'Honorarium Pengelola Keuangan Daerah', 327, '5', '2', '2', '27', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(332, 'Honorarium Pengelola Asset Daerah', 327, '5', '2', '2', '27', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(333, 'Honorarium Pelayanan Tindak Medik dan Jaga', 327, '5', '2', '2', '27', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(334, 'Honorarium Tim Pembina Samsat', 327, '5', '2', '2', '27', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(335, 'Honorarium Pengelola SIPKD', 327, '5', '2', '2', '27', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(336, 'Honorarium Pengelola Situs/Website/Portal Pemprov Sumbar', 327, '5', '2', '2', '27', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(337, 'Honorarium Petugas Teknis Lapangan', 327, '5', '2', '2', '27', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(338, 'Honorarium Pengawas (Kelas/Ujian)', 327, '5', '2', '2', '27', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(339, 'Honorarium Pengelola Bahan Kepustakaan/Arsip', 327, '5', '2', '2', '27', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(340, 'Honorarium Kuasa Hukum Khusus Pemerintah Daerah', 327, '5', '2', '2', '27', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(341, 'Honorarium Tim Anggaran Pemerintah Daerah (TAPD)', 327, '5', '2', '2', '27', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(342, 'Honorarium Badan Pertimbangan Jabatan dan Kepangkatan (BAPERJAKAT)', 327, '5', '2', '2', '27', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(343, 'Honorarium Tim Penyelenggaraan Haji Daerah  (TPHD)', 327, '5', '2', '2', '27', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(344, 'Honorarium Pembantu Panitia Penyelenggara Ibadah Haji', 327, '5', '2', '2', '27', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(345, 'Honorarium Penyidik Pegawai Negeri Sipil', 327, '5', '2', '2', '27', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(346, 'Honorarium Peneliti (LITBANG)', 327, '5', '2', '2', '27', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(347, 'Honorarium Penulis Karya Tulis Ilmiah (LITBANG)', 327, '5', '2', '2', '27', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(348, 'Honorarium Editor (LITBANG)', 327, '5', '2', '2', '27', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(349, 'Honorarium Tim Petugas Pos Check Point', 327, '5', '2', '2', '27', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(350, 'Honorarium Majelis Pertimbangan Pegawai (MPP)', 327, '5', '2', '2', '27', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(351, 'Honorarium Tim Penilai Daerah (TPD)', 327, '5', '2', '2', '27', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(352, 'Honorarium Unsur Pengarah Penanggulangan Bencana', 327, '5', '2', '2', '27', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(353, 'Honorarium Pengawas', 327, '5', '2', '2', '27', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(354, 'Honorarium Petugas Pemeriksa Hasil Pengukuran Kinerja SKPD', 327, '5', '2', '2', '27', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(355, 'Honorarium Pengelola SIMGAJI PNSD', 327, '5', '2', '2', '27', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(356, 'Honorarium Satuan Tugas PUSDALOPS Penanggulangan Bencana', 327, '5', '2', '2', '27', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(357, 'Honorarium Pengelola Data Transaksi Harian dan Rekapitulasi Transaksi Harian', 327, '5', '2', '2', '27', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(358, 'Honorarium Pengelolaan Dana Bantuan Operasional Sekolah', 327, '5', '2', '2', '27', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(359, 'Honorarium Tim Laporan Penyelenggaraan Pemerintahan Daerah', 327, '5', '2', '2', '27', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(360, 'Honorarium Tim LKPJ Kepala Daerah dan AMJ', 327, '5', '2', '2', '27', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(361, 'Honorarium Tim Penyusunan Memori Serah Terima Jabatan KDH', 327, '5', '2', '2', '27', '0034', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(362, 'Honorarium Non PNS', 102, '5', '2', '2', '28', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(363, 'Honorarium Tenaga Ahli/Instruktur/Narasumber', 362, '5', '2', '2', '28', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(364, 'Honorarium Pegawai Honorer/Tidak Tetap', 362, '5', '2', '2', '28', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(365, 'Honorarium Pengelola SIPKD', 362, '5', '2', '2', '28', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');
INSERT INTO `rekening_belanja` (`id`, `uraian`, `parent_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(366, 'Honorarium Pembantu Panitia Penyelenggara Ibadah Haji', 362, '5', '2', '2', '28', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(367, 'Honorarium Pengolah Data (LITBANG)', 362, '5', '2', '2', '28', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(368, 'Honorarium Penulis Karya Tulis Ilmiah (LITBANG)', 362, '5', '2', '2', '28', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(369, 'Honorarium Penyunting Lepas (LITBANG)', 362, '5', '2', '2', '28', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(370, 'Honorarium Editor (LITBANG)', 362, '5', '2', '2', '28', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(371, 'Honorarium Pengelola Situs/Website/Portal Pemprov Sumbar', 362, '5', '2', '2', '28', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(372, 'Honorarium Unsur Pengarah Penanggulangan Bencana', 362, '5', '2', '2', '28', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(373, 'Honorarium Pengelolaan Dana Bantuan Operasional Sekolah', 362, '5', '2', '2', '28', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(374, 'Honorarium Pengelola SIMGAJI PNSD', 362, '5', '2', '2', '28', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(375, 'Honorarium Satuan Tugas PUSDALOPS Penanggulangan Bencana', 362, '5', '2', '2', '28', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(376, 'Honorarium Pelayanan Tindak Medik dan Jaga', 362, '5', '2', '2', '28', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(377, 'Honorarium Tim Penyelenggaraan Haji Daerah (TPHD)', 362, '5', '2', '2', '28', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(378, 'Honorarium Petugas Teknis Lapangan', 362, '5', '2', '2', '28', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(379, 'Honorarium Sarjana Pemberdayaan Masyarakat Nagari', 362, '5', '2', '2', '28', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(380, 'Belanja Jasa Pelayanan IB/TE', 362, '5', '2', '2', '28', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(381, 'Honorarium Tim Penilai Daerah (TPD)', 362, '5', '2', '2', '28', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(382, 'Honorarium Tim Petugas Pos Check Point', 362, '5', '2', '2', '28', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(383, 'Belanja barang dan Jasa BLUD', 102, '5', '2', '2', '29', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(384, 'Belanja barang dan jasa BLUD', 383, '5', '2', '2', '29', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(385, 'Belanja Kontribusi', 102, '5', '2', '2', '30', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(386, 'Belanja Kontribusi Pelatihan/Magang', 385, '5', '2', '2', '30', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(387, 'Belanja Kontribusi Pagelaran/Even', 385, '5', '2', '2', '30', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(388, 'Belanja Kontribusi Penyaji', 385, '5', '2', '2', '30', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(389, 'Belanja Kontribusi Tahunan LSO', 385, '5', '2', '2', '30', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(390, 'Belanja Jasa Lainnya.', 102, '5', '2', '2', '31', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(391, 'Belanja Jasa Event Organizer (Untuk Acara Nasional dan Internasional)', 390, '5', '2', '2', '31', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(392, 'Belanja Jasa Cleaning Service', 390, '5', '2', '2', '31', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(393, 'Belanja Jasa  Alih Media', 390, '5', '2', '2', '31', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(394, 'Belanja Jasa Kostumisasi Aplikasi', 390, '5', '2', '2', '31', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(395, 'Belanja Jasa Pendampingan Sistim Informasi', 390, '5', '2', '2', '31', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(396, 'Belanja Jasa Layanan Pengembangan Sumber Daya Manusia', 390, '5', '2', '2', '31', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(397, 'Belanja Vakasi/Verifikasi', 102, '5', '2', '2', '33', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(398, 'Belanja Vakasi.', 397, '5', '2', '2', '33', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(399, 'Belanja Verifikasi.', 397, '5', '2', '2', '33', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(400, 'BELANJA MODAL', 95, '5', '2', '3', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(401, 'Belanja modal Pengadaan Tanah Perkampungan', 400, '5', '2', '3', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(402, 'Belanja modal Pengadaan Tanah Kampung', 401, '5', '2', '3', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(403, 'Belanja modal Pengadaan Tanah Emplasmen', 401, '5', '2', '3', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(404, 'Belanja modal Pengadaan Tanah Kuburan', 401, '5', '2', '3', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(405, 'Dst.......', 401, '5', '2', '3', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(406, 'Belanja modal Pengadaan Tanah Pertanian', 400, '5', '2', '3', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(407, 'Belanja modal Pengadaan Tanah Sawah Satu Tahun Ditanami', 406, '5', '2', '3', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(408, 'Belanja modal Pengadaan Tanah Tegalan', 406, '5', '2', '3', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(409, 'Belanja modal Pengadaan Tanah Ladang', 406, '5', '2', '3', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(410, 'Dst.......', 406, '5', '2', '3', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(411, 'Belanja modal Pengadaan Tanah Perkebunan', 400, '5', '2', '3', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(412, 'Belanja modal Pengadaan Tanah Perkebunan .........', 411, '5', '2', '3', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(413, 'Dst.......', 411, '5', '2', '3', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(414, 'Belanja modal Pengadaan Kebun Campuran', 400, '5', '2', '3', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(415, 'Belanja modal Pengadaan Bidang Tanah Yang Tidak Ada Jaringan Pengairan', 414, '5', '2', '3', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(416, 'Belanja modal Pengadaan Tumbuh Liar Bercampur Jenis Lain', 414, '5', '2', '3', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(417, 'Dst.......', 414, '5', '2', '3', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(418, 'Belanja modal Pengadaan Hutan', 400, '5', '2', '3', '05', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(419, 'Belanja modal Pengadaan Hutan Lebat', 418, '5', '2', '3', '05', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(420, 'Belanja modal Pengadaan Hutan Belukar', 418, '5', '2', '3', '05', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(421, 'Belanja modal Pengadaan Hutan Tanaman Jenis', 418, '5', '2', '3', '05', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(422, 'Belanja modal Pengadaan Hutan Alam Sejenis/Hutan Rawa', 418, '5', '2', '3', '05', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(423, 'Belanja modal Pengadaan Hutan Untuk Penggunaan Khusus', 418, '5', '2', '3', '05', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(424, 'Dst.......', 418, '5', '2', '3', '05', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(425, 'Belanja modal Pengadaan  Kolam Ikan', 400, '5', '2', '3', '06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(426, 'Belanja modal Pengadaan Tambak', 425, '5', '2', '3', '06', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(427, 'Belanja modal Pengadaan Air Tawar', 425, '5', '2', '3', '06', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(428, 'Dst.......', 425, '5', '2', '3', '06', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(429, 'Belanja modal Pengadaan Tanah Danau/Rawa', 400, '5', '2', '3', '07', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(430, 'Belanja modal Pengadaan tanah Rawa', 429, '5', '2', '3', '07', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(431, 'Belanja modal Pengadaan tanah Danau', 429, '5', '2', '3', '07', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(432, 'Belanja modal Pengadaan Tanah Tandus/Rusak', 400, '5', '2', '3', '08', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(433, 'Belanja modal Pengadaan Tanah Tandus', 432, '5', '2', '3', '08', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(434, 'Belanja modal Pengadaan Tanah Rusak', 432, '5', '2', '3', '08', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(435, 'Belanja modal Pengadaan Tanah Alang-alang dan Padang Rumput', 400, '5', '2', '3', '09', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(436, 'Belanja modal Pengadaan tanah Alang-alang', 435, '5', '2', '3', '09', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(437, 'Belanja modal Pengadaan tanah Padang Rumput', 435, '5', '2', '3', '09', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(438, 'Belanja modal Pengadaan Tanah Pengguna Lain', 400, '5', '2', '3', '10', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(439, 'Belanja modal Pengadaan Tanah Pengguna Lain...', 438, '5', '2', '3', '10', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(440, 'Dst.......', 438, '5', '2', '3', '10', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(441, 'Belanja modal Pengadaan Tanah Untuk Bangunan Gedung', 400, '5', '2', '3', '11', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(442, 'Belanja modal Pengadaan Tanah Bangunan Perumahan/Gedung Tempat Tinggal', 441, '5', '2', '3', '11', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(443, 'Belanja modal Pengadaan Tanah Untuk Bangunan Gedung Perdagangan/Perusahaan', 441, '5', '2', '3', '11', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(444, 'Belanja modal Pengadaan Tanah Untuk Bangunan Industri', 441, '5', '2', '3', '11', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(445, 'Belanja modal Pengadaan Tanah Untuk Bangunan Tempat Kerja/Jasa', 441, '5', '2', '3', '11', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(446, 'Belanja modal Pengadaan Tanah Kosong', 441, '5', '2', '3', '11', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(447, 'Belanja modal Pengadaan Tanah Peternakan', 441, '5', '2', '3', '11', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(448, 'Belanja modal Pengadaan Tanah Bangunan Pengairan', 441, '5', '2', '3', '11', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(449, 'Belanja modal Pengadaan Tanah Bangunan Jalan dan Jembatan', 441, '5', '2', '3', '11', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(450, 'Belanja modal Pengadaan Tanah Lembiran/Bantaran/Lepe-lepe/Setren dst', 441, '5', '2', '3', '11', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(451, 'Dst.......', 441, '5', '2', '3', '11', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(452, 'Belanja modal Pengadaan Tanah Pertambangan', 400, '5', '2', '3', '12', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(453, 'Belanja modal Pengadaan Pertambangan .........', 452, '5', '2', '3', '12', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(454, 'Dst.......', 452, '5', '2', '3', '12', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(455, 'Belanja modal Pengadaan Tanah Untuk Bangunan Bukan Gedung', 400, '5', '2', '3', '13', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(456, 'Belanja modal Pengadaan Tanah Lapangan Olah Raga', 455, '5', '2', '3', '13', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(457, 'Belanja modal Pengadaan Tanah Lapangan Parkir', 455, '5', '2', '3', '13', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(458, 'Belanja modal Pengadaan Tanah Lapangan Penimbun Barang', 455, '5', '2', '3', '13', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(459, 'Belanja modal Pengadaan Tanah Lapangan Pemancar dan Studio Alam', 455, '5', '2', '3', '13', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(460, 'Belanja modal Pengadaan Tanah Lapangan Pengujian/Pengolahan', 455, '5', '2', '3', '13', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(461, 'Belanja modal Pengadaan Tanah Lapangan Terbang', 455, '5', '2', '3', '13', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(462, 'Belanja modal Pengadaan Tanah Untuk Bangunan Jalan', 455, '5', '2', '3', '13', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(463, 'Belanja modal Pengadaan Tanah Untuk Bangunan Air', 455, '5', '2', '3', '13', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(464, 'Belanja modal Pengadaan Tanah Untuk Bangunan Instalasi', 455, '5', '2', '3', '13', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(465, 'Belanja modal Pengadaan Tanah Untuk Bangunan Jaringan', 455, '5', '2', '3', '13', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(466, 'Belanja modal Pengadaan Tanah Untuk Bangunan Bersejarah', 455, '5', '2', '3', '13', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(467, 'Belanja modal Pengadaan Tanah Untuk Bangunan Gedung Olah Raga', 455, '5', '2', '3', '13', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(468, 'Belanja modal Pengadaan Tanah Untuk Bangunan Tempat Ibadah', 455, '5', '2', '3', '13', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(469, 'Dst.......', 455, '5', '2', '3', '13', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(470, 'Belanja modal Pengadaan Alat-Alat Besar Darat', 400, '5', '2', '3', '14', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(471, 'Belanja modal Pengadaan Tractor', 470, '5', '2', '3', '14', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(472, 'Belanja modal Pengadaan Grader', 470, '5', '2', '3', '14', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(473, 'Belanja modal  Pengadaan Excavator', 470, '5', '2', '3', '14', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(474, 'Belanja modal Pengadaan Pile Driver', 470, '5', '2', '3', '14', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(475, 'Belanja modal Pengadaan Hauler', 470, '5', '2', '3', '14', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(476, 'Belanja modal Pengadaan Asphal Equipment', 470, '5', '2', '3', '14', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(477, 'Belanja modal Pengadaan Compacting Equipment', 470, '5', '2', '3', '14', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(478, 'Belanja modal Pengadaan Aggregate $ Concrete Equipment', 470, '5', '2', '3', '14', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(479, 'Belanja modal Pengadaan Loader', 470, '5', '2', '3', '14', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(480, 'Belanja modal Pengadaan Alat Pengangkat', 470, '5', '2', '3', '14', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(481, 'Belanja modal Pengadaan Mesin Proses', 470, '5', '2', '3', '14', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(482, 'Belanja modal Pengadaan Amroll Truck', 470, '5', '2', '3', '14', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(483, 'Belanja modal pengadaan Tangki Minyak', 470, '5', '2', '3', '14', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(484, 'Dst.............', 470, '5', '2', '3', '14', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(485, 'Belanja Modal Pengadaan Kontainer Sampah', 470, '5', '2', '3', '14', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(486, 'Belanja modal Pengadaan Alat-Alat Besar Apung', 400, '5', '2', '3', '15', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(487, 'Belanja modal Pengadaan Dredger', 486, '5', '2', '3', '15', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(488, 'Belanja modal Pengadaan Floating Excavator', 486, '5', '2', '3', '15', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(489, 'Belanja modal Pengadaan Amphibi Dredger', 486, '5', '2', '3', '15', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(490, 'Belanja modal Pengadaan Kapal Tarik', 486, '5', '2', '3', '15', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(491, 'Belanja modal Pengadaan Mesin Proses Apung', 486, '5', '2', '3', '15', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(492, 'Dst.......', 486, '5', '2', '3', '15', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(493, 'Belanja modal Pengadaan Alat-alat Bantu', 400, '5', '2', '3', '16', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(494, 'Belanja modal Pengadaan Alat Penarik', 493, '5', '2', '3', '16', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(495, 'Belanja modal Pengadaan Feeder', 493, '5', '2', '3', '16', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(496, 'Belanja modal Pengadaan Compressor', 493, '5', '2', '3', '16', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(497, 'Belanja modal Pengadaan Electric Generating Set', 493, '5', '2', '3', '16', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(498, 'Belanja modal Pengadaan Pompa', 493, '5', '2', '3', '16', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(499, 'Belanja modal Pengadaan Mesin Bor', 493, '5', '2', '3', '16', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(500, 'Belanja modal Pengadaan Unit Pemeliharaan Lapangan', 493, '5', '2', '3', '16', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(501, 'Belanja modal Pengadaan Alat Pengolahan Air Kotor', 493, '5', '2', '3', '16', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(502, 'Belanja modal Pengadaan Pembangkit Uap Air Panas/Sistem Generator', 493, '5', '2', '3', '16', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(503, 'Belanja Modal Pengadaan Trailer', 493, '5', '2', '3', '16', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(504, 'dst....', 493, '5', '2', '3', '16', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(505, 'Belanja modal Pengadaan Alat Angkutan Darat Bermotor', 400, '5', '2', '3', '17', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(506, 'Belanja modal Pengadaan Kendaraan Dinas Bermotor Perorangan', 505, '5', '2', '3', '17', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(507, 'Belanja modal Pengadaan Kendaraan Bermotor Penumpang', 505, '5', '2', '3', '17', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(508, 'Belanja modal Pengadaan Kendaraan Bermotor Angkutan Barang', 505, '5', '2', '3', '17', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(509, 'Belanja modal Pengadaan Kendaraan Bermotor Khusus', 505, '5', '2', '3', '17', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(510, 'Belanja modal Pengadaan Kendaraan Bermotor Beroda Dua', 505, '5', '2', '3', '17', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(511, 'Belanja modal Pengadaan Kendaraan Bermotor Beroda Tiga', 505, '5', '2', '3', '17', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(512, 'Belanja modal Pengadaan Alat Angkutan Darat Tak Bermotor', 400, '5', '2', '3', '18', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(513, 'Belanja modal Pengadaan Kendaraan Bermotor Angkutan Barang', 512, '5', '2', '3', '18', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(514, 'Belanja modal Pengadaan Kendaraan Tak Bermotor Berpenumpang', 512, '5', '2', '3', '18', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(515, 'Belanja modal Pengadaan Alat Angkut Apung Bermotor', 400, '5', '2', '3', '19', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(516, 'Belanja modal Pengadaan Alat Angkut Apung Bermotor Barang', 515, '5', '2', '3', '19', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(517, 'Belanja modal Pengadaan Alat Angkut Apung Bermotor Penumpang', 515, '5', '2', '3', '19', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(518, 'Belanja modal Pengadaan Alat Angkut Apung Bermotor Khusus', 515, '5', '2', '3', '19', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(519, 'Belanja modal Pengadaan Alat Angkut Apung Tak Bermotor', 400, '5', '2', '3', '20', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(520, 'Belanja modal Pengadaan Alat Angkut Apung Tak Bermotor Untuk Barang', 519, '5', '2', '3', '20', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(521, 'Belanja modal Pengadaan Alat Angkut Apung Tak Bermotor Penumpang', 519, '5', '2', '3', '20', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(522, 'Belanja modal Pengadaan Alat Angkut Apung Tak Bermotor Khusus', 519, '5', '2', '3', '20', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(523, 'Belanja modal Pengadaan Alat Angkut Bermotor Udara', 400, '5', '2', '3', '21', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(524, 'Belanja modal Pengadaan Pesawat Terbang', 523, '5', '2', '3', '21', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(525, 'Dst.......', 523, '5', '2', '3', '21', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(526, 'Belanja modal Pengadaan Alat Bengkel Bermesin', 400, '5', '2', '3', '22', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(527, 'Belanja modal Pengadaan Perkakas Konstruksi Logam Terpasang pada Pondasi', 526, '5', '2', '3', '22', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(528, 'Belanja modal Pengadaan Perkakas Konstruksi Logam yang Berpindah', 526, '5', '2', '3', '22', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(529, 'Belanja modal Pengadaan Perkakas Bengkel Listrik', 526, '5', '2', '3', '22', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(530, 'Belanja modal Pengadaan Perkakas Bengkel Service', 526, '5', '2', '3', '22', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(531, 'Belanja modal Pengadaan Perkakas Pengangkat Bermesin', 526, '5', '2', '3', '22', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(532, 'Belanja modal Pengadaan Perkakas Bengkel Kayu', 526, '5', '2', '3', '22', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(533, 'Belanja modal Pengadaan Perkakas Bengkel Khusus', 526, '5', '2', '3', '22', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(534, 'Belanja modal Pengadaan Peralatan Las', 526, '5', '2', '3', '22', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(535, 'Belanja modal Pengadaan Perkakas Pabrik Es', 526, '5', '2', '3', '22', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(536, 'Dst.......', 526, '5', '2', '3', '22', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(537, 'Belanja modal Pengadaan Alat Bengkel Tak Bermesin', 400, '5', '2', '3', '23', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(538, 'Belanja modal Pengadaan Perkakas Bengkel Konstruksi Logam', 537, '5', '2', '3', '23', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(539, 'Belanja modal Pengadaan Perkakas Bengkel Listrik', 537, '5', '2', '3', '23', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(540, 'Belanja modal Pengadaan Perkakas Bengkel Service', 537, '5', '2', '3', '23', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(541, 'Belanja modal Pengadaan Perkakas Pengangkat', 537, '5', '2', '3', '23', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(542, 'Belanja modal Pengadaan Perkakas Standar (Standart Tool)', 537, '5', '2', '3', '23', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(543, 'Belanja modal Pengadaan Perkakas Khusus (Special Tool)', 537, '5', '2', '3', '23', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(544, 'Belanja modal Pengadaan Perkakas Bengkel Kerja', 537, '5', '2', '3', '23', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(545, 'Belanja modal Pengadaan Peralatan Tukang-tukang Besi', 537, '5', '2', '3', '23', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(546, 'Belanja modal Pengadaan Peralatan Tukang Kayu', 537, '5', '2', '3', '23', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(547, 'Belanja modal Pengadaan Peralatan Tukang Kulit', 537, '5', '2', '3', '23', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(548, 'Belanja modal PengadaanPeralatan Ukur, Gip & Feting', 537, '5', '2', '3', '23', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(549, 'Dst.......', 537, '5', '2', '3', '23', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(550, 'Belanja modal Pengadaan Alat Ukur', 400, '5', '2', '3', '24', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(551, 'Belanja modal Pengadaan Alat Ukur universal', 550, '5', '2', '3', '24', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(552, 'Belanja modal Pengadaan Alat Ukur/Test Intelegensia', 550, '5', '2', '3', '24', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(553, 'Belanja modal Pengadaan Alat Ukur/Test Alat Kepribadian', 550, '5', '2', '3', '24', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(554, 'Belanja modal Pengadaan Alat Ukur /Test Klinis Lain', 550, '5', '2', '3', '24', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(555, 'Belanja modal Pengadaan Alat Calibrasi', 550, '5', '2', '3', '24', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(556, 'Belanja modal Pengadaan Oscilloscope', 550, '5', '2', '3', '24', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(557, 'Belanja modal Pengadaan Universal Tester', 550, '5', '2', '3', '24', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(558, 'Belanja modal Pengadaan Alat Ukur/Pembanding', 550, '5', '2', '3', '24', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(559, 'Belanja modal Pengadaan Alat Ukur Lainnya', 550, '5', '2', '3', '24', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(560, 'Belanja modal Pengadaan Alat Timbangan/Blora', 550, '5', '2', '3', '24', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(561, 'Belanja modal Pengadaan Anak Timbangan/Biasa', 550, '5', '2', '3', '24', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(562, 'Belanja modal Pengadaan Takaran Kering', 550, '5', '2', '3', '24', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(563, 'Belanja modal Pengadaan Takaran Bahan Bangunan 2 HL', 550, '5', '2', '3', '24', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(564, 'Belanja modal Pengadaan Takaran Latex/Getah Susu', 550, '5', '2', '3', '24', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(565, 'Belanja modal Pengadaan Gelas Takar Berbagai Capasitas', 550, '5', '2', '3', '24', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(566, 'Dst.......', 550, '5', '2', '3', '24', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(567, 'Belanja modal Pengadaan Alat Pengolahan', 400, '5', '2', '3', '25', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(568, 'Belanja modal Pengadaan Alat Pengolahan Tanah dan Tanaman', 567, '5', '2', '3', '25', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(569, 'Belanja modal pengadaan Alat Panen/Pengolahan', 567, '5', '2', '3', '25', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(570, 'Belanja modal Pengadaan Alat-Alat Peternakan', 567, '5', '2', '3', '25', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(571, 'Belanja modal Pengadaan Alat Penyimpanan Hasil Percobaan Pertanian', 567, '5', '2', '3', '25', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(572, 'Belanja modal Pengadaan Alat Laboratorium Pertanian', 567, '5', '2', '3', '25', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(573, 'Belanja modal Pengadaan Alat Procesing', 567, '5', '2', '3', '25', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(574, 'Belanja modal Pengadaan Alat Pasca Panen', 567, '5', '2', '3', '25', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(575, 'Belanja modal Pengadaan Alat Produksi Perikanan', 567, '5', '2', '3', '25', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(576, 'Dst.......', 567, '5', '2', '3', '25', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(577, 'Belanja modal Pengadaan Alat Pemeliharaan Tanaman/Alat Penyimpan', 400, '5', '2', '3', '26', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(578, 'Belanja modal Pengadaan Alat Pemeliharaan Tanaman', 577, '5', '2', '3', '26', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(579, 'Belanja modal Pengadaan Alat Panen', 577, '5', '2', '3', '26', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(580, 'Belanja modal Pengadaan Alat Penyimpanan', 577, '5', '2', '3', '26', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(581, 'Belanja modal Pengadaan Alat Laboratorium', 577, '5', '2', '3', '26', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(582, 'Belanja modal Pengadaan Alat Penangkap Ikan', 577, '5', '2', '3', '26', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(583, 'Dst.......', 577, '5', '2', '3', '26', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(584, 'Belanja modal Pengadaan Alat Kantor', 400, '5', '2', '3', '27', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(585, 'Belanja modal Pengadaan Mesin Ketik', 584, '5', '2', '3', '27', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(586, 'Belanja modal Pengadaan Mesin Hitung/Jumlah', 584, '5', '2', '3', '27', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(587, 'Belanja modal Pengadaan Alat Reproduksi (Pengganda)', 584, '5', '2', '3', '27', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(588, 'Belanja modal Pengadaan Alat Penyimpanan Perlengkapan Kantor', 584, '5', '2', '3', '27', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(589, 'Belanja modal Pengadaan Alat Kantor Lainnya', 584, '5', '2', '3', '27', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(590, 'Dst.......', 584, '5', '2', '3', '27', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(591, 'Belanja modal Pengadaan Alat Rumah Tangga', 400, '5', '2', '3', '28', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(592, 'Belanja modal Pengadaan Meubelair', 591, '5', '2', '3', '28', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(593, 'Belanja modal Pengadaan Alat Pengukur Waktu', 591, '5', '2', '3', '28', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(594, 'Belanja modal Pengadaan Alat Pembersih', 591, '5', '2', '3', '28', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(595, 'Belanja modal Pengadaan Alat Pendingin', 591, '5', '2', '3', '28', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(596, 'Belanja modal Pengadaan Alat Dapur', 591, '5', '2', '3', '28', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(597, 'Belanja modal Pengadaan Alat Rumah Tangga Lainnya (Home Use)', 591, '5', '2', '3', '28', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(598, 'Belanja modal Pengadaan Alat Pemadam Kebakaran', 591, '5', '2', '3', '28', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(599, 'Dst.......', 591, '5', '2', '3', '28', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(600, 'Belanja Modal Pengadaan Sistim Komputer', 400, '5', '2', '3', '29', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(601, 'Belanja modal Pengadaan Komputer Unit/Jaringan', 600, '5', '2', '3', '29', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(602, 'Belanja modal Pengadaan Peralatan Komputer Mainframe', 600, '5', '2', '3', '29', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(603, 'Belanja modal Pengadaan Peralatan Mini Komputer', 600, '5', '2', '3', '29', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(604, 'Belanja modal Pengadaan Peralatan Personal Komputer', 600, '5', '2', '3', '29', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(605, 'Belanja modal Pengadaan Peralatan Jaringan', 600, '5', '2', '3', '29', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(606, 'Belanja Modal Pengadaan Printer', 600, '5', '2', '3', '29', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(607, 'Belanja Modal Pengadaan Perangkat Lunak Komputer', 600, '5', '2', '3', '29', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(608, 'Belanja modal Pengadaan Meja Dan Kursi Kerja/Rapat Pejabat', 400, '5', '2', '3', '30', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(609, 'Belanja modal Pengadaan Meja Kerja Pejabat', 608, '5', '2', '3', '30', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(610, 'Belanja modal Pengadaan Meja Rapat Pejabat', 608, '5', '2', '3', '30', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(611, 'Belanja modal Pengadaan Kursi Kerja Pejabat', 608, '5', '2', '3', '30', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(612, 'Belanja modal Pengadaan Kursi Rapat Pejabat', 608, '5', '2', '3', '30', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(613, 'Belanja modal Pengadaan Kursi Hadap Depan Meja Kerja Pejabat', 608, '5', '2', '3', '30', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(614, 'Belanja modal Pengadaan Kursi Tamu di Ruangan Pejabat', 608, '5', '2', '3', '30', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(615, 'Belanja modal Pengadaan Lemari dan Arsip Pejabat', 608, '5', '2', '3', '30', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(616, 'Belanja modal Pengadaan Kursi Ruang Tunggu', 608, '5', '2', '3', '30', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(617, 'Dst...', 608, '5', '2', '3', '30', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(618, 'Belanja modal Pengadaan Alat Studio', 400, '5', '2', '3', '31', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(619, 'Belanja modal Pengadaan Peralatan Studio Visual', 618, '5', '2', '3', '31', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(620, 'Belanja modal Pengadaan Peralatan Studio Video dan Film', 618, '5', '2', '3', '31', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(621, 'Belanja modal Pengadaan Peralatan Studio Video dan Film A', 618, '5', '2', '3', '31', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(622, 'Belanja modal Pengadaan Peralatan Cetak', 618, '5', '2', '3', '31', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(623, 'Belanja modal Pengadaan Peralatan Computing', 618, '5', '2', '3', '31', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(624, 'Belanja modal Pengadaan Peralatan Pemetaan Ukur', 618, '5', '2', '3', '31', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(625, 'Belanja Modal Pengadaan Sound System', 618, '5', '2', '3', '31', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(626, 'Belanja modal Pengadaan Alat Komunikasi', 400, '5', '2', '3', '32', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(627, 'Belanja modal Pengadaan Alat Komunikasi Telephone', 626, '5', '2', '3', '32', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(628, 'Belanja modal Pengadaan Alat Komunikasi Radio SSB', 626, '5', '2', '3', '32', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(629, 'Belanja modal Pengadaan Alat Komunikasi Radio HF/FM', 626, '5', '2', '3', '32', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(630, 'Belanja modal Pengadaan Alat Komunikasi Radio VHF', 626, '5', '2', '3', '32', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(631, 'Belanja modal Pengadaan Alat Komunikasi Radio UHF', 626, '5', '2', '3', '32', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(632, 'Belanja modal Pengadaan Alat Komunikasi Sosial', 626, '5', '2', '3', '32', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(633, 'Belanja modal Pengadaan Alat-alat Sandi', 626, '5', '2', '3', '32', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(634, 'Belanja Modal Pengadaan Alat Komunikasi Mesin Faksimili', 626, '5', '2', '3', '32', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(635, 'Dst..', 626, '5', '2', '3', '32', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(636, 'Belanja modal Pengadaan Peralatan Pemancar', 400, '5', '2', '3', '33', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(637, 'Belanja modal Pengadaan Peralatan Pemancar MF/MW', 636, '5', '2', '3', '33', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(638, 'Belanja modal pengadaan Peralatan Pemancar HF/SW', 636, '5', '2', '3', '33', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(639, 'Belanja modal Pengadaan Peralatan Pemancar VHF/FM', 636, '5', '2', '3', '33', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(640, 'Belanja modal Pengadaan Peralatan Pemancar UHF', 636, '5', '2', '3', '33', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(641, 'Belanja modal Pengadaan Peralatan Pemancar SHF', 636, '5', '2', '3', '33', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(642, 'Belanja modal Pengadaan Peralatan Antena MF/MW', 636, '5', '2', '3', '33', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(643, 'Belanja modal Pengadaan Peralatan Antena HF/SW', 636, '5', '2', '3', '33', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(644, 'Belanja modal Pengadaan Peralatan Antena VHF/FM', 636, '5', '2', '3', '33', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(645, 'Belanja modal Pengadaan Peralatan Antena UHF', 636, '5', '2', '3', '33', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(646, 'Belanja modal Pengadaan Peralatan Antena SHF/Parabola', 636, '5', '2', '3', '33', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(647, 'Belanja modal Pengadaan Peralatan Translator VHF/VHF', 636, '5', '2', '3', '33', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(648, 'Belanja modal Pengadaan Peralatan Translator UHF/UHF', 636, '5', '2', '3', '33', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(649, 'Belanja modal Pengadaan Peralatan Translator VHF/UHF', 636, '5', '2', '3', '33', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(650, 'Belanja modal Pengadaan Peralatan Translator UHF/VHF', 636, '5', '2', '3', '33', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(651, 'Belanja modal Pengadaan Peralatan Microvawe FPU', 636, '5', '2', '3', '33', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(652, 'Belanja modal Pengadaan Peralatan Microvawe Terestrial', 636, '5', '2', '3', '33', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(653, 'Belanja modal Pengadaan Peralatan Microvawe TVRO', 636, '5', '2', '3', '33', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(654, 'Belanja modal Pengadaan Peralatan Dummy Load', 636, '5', '2', '3', '33', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(655, 'Belanja modal Pengadaan Switcher Antena', 636, '5', '2', '3', '33', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(656, 'Belanja modal Pengadaan Switcher/Menara Antena', 636, '5', '2', '3', '33', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(657, 'Belanja modal Pengadaan Feeder', 636, '5', '2', '3', '33', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(658, 'Belanja modal Pengadaan Humitity Control', 636, '5', '2', '3', '33', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(659, 'Belanja modal Pengadaan Program Input Equipment', 636, '5', '2', '3', '33', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(660, 'Belanja modal Pengadaan Peralatan Antena Penerima VHF', 636, '5', '2', '3', '33', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(661, 'Dst.......', 636, '5', '2', '3', '33', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(662, 'Belanja modal Pengadaan Alat Kedokteran', 400, '5', '2', '3', '34', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(663, 'Belanja modal Pengadaan Alat Kedokteran Umum', 662, '5', '2', '3', '34', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(664, 'Belanja modal Pengadaan Alat Kedokteran Gigi', 662, '5', '2', '3', '34', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(665, 'Belanja modal Pengadaan Alat Kedokteran Keluarga Berencana', 662, '5', '2', '3', '34', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(666, 'Belanja modal Pengadaan Alat Kedokteran Mata', 662, '5', '2', '3', '34', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(667, 'Belanja modal Pengadaan Alat Kedokteran T.H.T', 662, '5', '2', '3', '34', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(668, 'Belanja modal Pengadaan Alat Rotgen', 662, '5', '2', '3', '34', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(669, 'Belanja modal Pengadaan Alat Farmasi', 662, '5', '2', '3', '34', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(670, 'Belanja modal Pengadaan Alat Kedokteran Bedah', 662, '5', '2', '3', '34', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(671, 'Belanja modal Pengadaan Alat Kesehatan Kebidanan dan Penyakit Kandungan', 662, '5', '2', '3', '34', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(672, 'Belanja modal Pengadaan Alat Kedokteran Bagian Penyakit Dalam', 662, '5', '2', '3', '34', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(673, 'Belanja modal Pengadaan Mortuary', 662, '5', '2', '3', '34', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(674, 'Belanja modal Pengadaan Alat Kesehatan Anak', 662, '5', '2', '3', '34', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(675, 'Belanja modal Pengadaan Poliklinik Set', 662, '5', '2', '3', '34', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(676, 'Belanja modal Pengadaan Alat Kedokteran Penderita Cacat Tubuh', 662, '5', '2', '3', '34', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(677, 'Belanja modal Pengadaan Alat Kedokteran Neurologi (syaraf)', 662, '5', '2', '3', '34', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(678, 'Belanja modal Pengadaan Alat Kedokteran Jantung', 662, '5', '2', '3', '34', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(679, 'Belanja modal Pengadaan Alat Kedokteran Nuklir', 662, '5', '2', '3', '34', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(680, 'Belanja modal Pengadaan Alat Kedokteran Radiologi', 662, '5', '2', '3', '34', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(681, 'Belanja modal Pengadaan Alat Kedokteran Kulit dan Kelamin', 662, '5', '2', '3', '34', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(682, 'Belanja modal Pengadaan Alat Kedokteran Gawat Darurat', 662, '5', '2', '3', '34', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(683, 'Belanja modal Pengadaan Alat Kedokteran Jiwa', 662, '5', '2', '3', '34', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(684, 'Belanja modal Pengadaan Alat Kedokteran Hewan', 662, '5', '2', '3', '34', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(685, 'Belanja Modal Pengadaan Alat Kedokteran Intensive Care Unit', 662, '5', '2', '3', '34', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(686, 'Belanja Modal Pengadaan Alat Kedokteran Paru', 662, '5', '2', '3', '34', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(687, 'Belanja modal Pengadaan Alat Kesehatan', 400, '5', '2', '3', '35', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(688, 'Belanja modal Pengadaan Alat Kesehatan Perawatan', 687, '5', '2', '3', '35', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(689, 'Belanja modal Pengadaan Alat Kesehatan Rehabilitasi Medis', 687, '5', '2', '3', '35', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(690, 'Belanja modal Pengadaan Alat Kesehatan Matra Laut', 687, '5', '2', '3', '35', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(691, 'Belanja modal Pengadaan Alat Kesehatan Matra Udara', 687, '5', '2', '3', '35', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(692, 'Belanja modal Pengadaan Alat Kesehatan Kedokteran Kepolisian', 687, '5', '2', '3', '35', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(693, 'Belanja modal Pengadaan Alat Kesehatan Olahraga', 687, '5', '2', '3', '35', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(694, 'Dst.......', 687, '5', '2', '3', '35', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(695, 'Belanja modal Pengadaan Unit-Unit Laboratorium', 400, '5', '2', '3', '36', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(696, 'Belanja modal Pengadaan Alat Laboratorium Kimia Air', 695, '5', '2', '3', '36', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(697, 'Belanja modal Pengadaan Alat Laboratorium Microbiologi', 695, '5', '2', '3', '36', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(698, 'Belanja modal Pengadaan Alat Laboratorium Hidro Kimia', 695, '5', '2', '3', '36', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(699, 'Belanja modal Pengadaan Alat Laboratorium Model/Hidrolika', 695, '5', '2', '3', '36', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(700, 'Belanja modal Pengadaan Alat laboratorium Buatan/Geologi', 695, '5', '2', '3', '36', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(701, 'Belanja modal Pengadaan Alat Laboratorium Bahan Bangunan Konstruksi', 695, '5', '2', '3', '36', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(702, 'Belanja modal Pengadaan Alat Laboratorium Aspal Cat & Kimia', 695, '5', '2', '3', '36', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(703, 'Belanja modal Pengadaan Alat laboratorium Mekanik Tanah dan Batuan', 695, '5', '2', '3', '36', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(704, 'Belanja modal Pengadaan Alat Laboratorium Cocok Tanam', 695, '5', '2', '3', '36', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(705, 'Belanja modal Pengadaan Alat Laboratorium Logam, Mesin, Listrik', 695, '5', '2', '3', '36', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(706, 'Belanja modal Pengadaan Alat Laboratorium Logam, Mesin Listrik A', 695, '5', '2', '3', '36', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(707, 'Belanja modal Pengadaan Alat Laboratorium Umum', 695, '5', '2', '3', '36', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(708, 'Belanja modal Pengadaan Alat Laboratorium Umum A', 695, '5', '2', '3', '36', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(709, 'Belanja modal Pengadaan Alat Laboratorium Kedokteran', 695, '5', '2', '3', '36', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(710, 'Belanja modal Pengadaan Alat Laboratorium Microbiologi', 695, '5', '2', '3', '36', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(711, 'Belanja modal Pengadaan Alat Laboratorium Kimia', 695, '5', '2', '3', '36', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');
INSERT INTO `rekening_belanja` (`id`, `uraian`, `parent_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(712, 'Belanja modal Pengadaan Alat Laboratorium Microbiologi A', 695, '5', '2', '3', '36', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(713, 'Belanja modal Pengadaan Alat Laboratorium Patologi', 695, '5', '2', '3', '36', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(714, 'Belanja modal Pengadaan Alat Laboratorium Immunologi', 695, '5', '2', '3', '36', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(715, 'Belanja modal Pengadaan Alat Laboratorium Hematologi', 695, '5', '2', '3', '36', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(716, 'Belanja modal Pengadaan Alat Laboratorium Film', 695, '5', '2', '3', '36', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(717, 'Belanja modal Pengadaan Alat Laboratorium Makanan', 695, '5', '2', '3', '36', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(718, 'Belanja modal Pengadaan Alat Laboratorium Standarisasi, Kalibrasi dan Instrumentasi', 695, '5', '2', '3', '36', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(719, 'Belanja modal Pengadaan Alat Laboratorium Farmasi', 695, '5', '2', '3', '36', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(720, 'Belanja modal Pengadaan Alat Laboratorium Fisika', 695, '5', '2', '3', '36', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(721, 'Belanja modal Pengadaan Alat Laboratorium Hidrodinamika', 695, '5', '2', '3', '36', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(722, 'Belanja modal Pengadaan Alat Laboratorium Klimatologi', 695, '5', '2', '3', '36', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(723, 'Belanja modal Pengadaan Alat Laboratorium Proses Peleburan', 695, '5', '2', '3', '36', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(724, 'Belanja modal Pengadaan Alat Laboratorium Pasir', 695, '5', '2', '3', '36', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(725, 'Belanja modal Pengadaan Alat Laboratorium Proses Pembuatan Cetakan', 695, '5', '2', '3', '36', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(726, 'Belanja modal Pengadaan Alat Laboratorium Proses Pembuatan Pola', 695, '5', '2', '3', '36', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(727, 'Belanja modal Pengadaan Alat Laboratorium Metalography', 695, '5', '2', '3', '36', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(728, 'Belanja modal Pengadaan Alat Laboratorium Proses Pengelasan', 695, '5', '2', '3', '36', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(729, 'Belanja modal Pengadaan Alat Laboratorium Uji Proses Pengelasan', 695, '5', '2', '3', '36', '0034', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(730, 'Belanja modal Pengadaan Alat Laboratorium Proses Pembuatan Logam', 695, '5', '2', '3', '36', '0035', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(731, 'Belanja modal Pengadaan Alat Laboratorium Matrologie', 695, '5', '2', '3', '36', '0036', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(732, 'Belanja modal Pengadaan Alat Laboratorium Proses Pelapisan Logam', 695, '5', '2', '3', '36', '0037', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(733, 'Belanja modal Pengadaan Alat Laboratorium Proses Pengolahan Panas', 695, '5', '2', '3', '36', '0038', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(734, 'Belanja modal Pengadaan Alat Laboratorium Proses Teknologi Textil', 695, '5', '2', '3', '36', '0039', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(735, 'Belanja modal Pengadaan Alat Laboratorium Uji Tekstel', 695, '5', '2', '3', '36', '0040', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(736, 'Belanja modal Pengadaan Alat Laboratorium Proses Teknologi Keramik', 695, '5', '2', '3', '36', '0041', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(737, 'Belanja modal Pengadaan Alat Laboratorium Proses Teknologi Kulit Karet', 695, '5', '2', '3', '36', '0042', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(738, 'Belanja modal Pengadaan Alat Laboratorium Uji Kulit, Karet dan Plastik', 695, '5', '2', '3', '36', '0043', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(739, 'Belanja modal Pengadaan Alat Laboratorium Uji Keramik', 695, '5', '2', '3', '36', '0044', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(740, 'Belanja modal Pengadaan Alat Laboratorium Proses Teknologi Selulosa', 695, '5', '2', '3', '36', '0045', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(741, 'Belanja modal Pengadaan Alat Laboratorium Pertanian', 695, '5', '2', '3', '36', '0046', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(742, 'Belanja modal Pengadaan Alat Laboratorium Pertanian A', 695, '5', '2', '3', '36', '0047', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(743, 'Belanja modal Pengadaan Alat Laboratorium Pertanian B', 695, '5', '2', '3', '36', '0048', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(744, 'Belanja modal Pengadaan Alat Laboratorium Elektronika dan Daya', 695, '5', '2', '3', '36', '0049', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(745, 'Belanja modal Pengadaan Alat Laboratorium Energi Surya', 695, '5', '2', '3', '36', '0050', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(746, 'Belanja modal Pengadaan Alat Laboratorium Konversi Batubara dan Biomas', 695, '5', '2', '3', '36', '0051', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(747, 'Belanja modal Pengadaan Alat Laboratorium Oceanografi', 695, '5', '2', '3', '36', '0052', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(748, 'Belanja modal Pengadaan Alat Laboratorium Lingkungan Perairan', 695, '5', '2', '3', '36', '0053', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(749, 'Belanja modal Pengadaan Alat Laboratorium Biologi Peralatan', 695, '5', '2', '3', '36', '0054', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(750, 'Belanja modal Pengadaan Alat Laboratorium Biologi', 695, '5', '2', '3', '36', '0055', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(751, 'Belanja modal Pengadaan Alat Laboratorium Geofisika', 695, '5', '2', '3', '36', '0056', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(752, 'Belanja modal Pengadaan Alat Laboratorium Tambang', 695, '5', '2', '3', '36', '0057', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(753, 'Belanja modal Pengadaan Alat Laboratorium Proses/Teknik Kimia', 695, '5', '2', '3', '36', '0058', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(754, 'Belanja modal Pengadaan Alat Laboratorium Proses Industri', 695, '5', '2', '3', '36', '0059', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(755, 'Belanja modal Pengadaan Alat Laboratorium Kesehatan Kerja', 695, '5', '2', '3', '36', '0060', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(756, 'Belanja modal Pengadaan Laboratorium Kearsipan', 695, '5', '2', '3', '36', '0061', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(757, 'Belanja modal Pengadaan Laboratorium Hematologi & Urinalisis', 695, '5', '2', '3', '36', '0062', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(758, 'Belanja modal Pengadaan Laboratorium Hematologi & Urinalisis A', 695, '5', '2', '3', '36', '0063', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(759, 'Belanja modal Pengadaan Alat Laboratorium Lainnya', 695, '5', '2', '3', '36', '0064', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(760, 'Belanja Modal Pengadaan Alat-alat Laboratorium Peternakan', 695, '5', '2', '3', '36', '0065', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(761, 'Dst..', 695, '5', '2', '3', '36', '0066', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(762, 'Belanja modal Pengadaan Alat Peraga/Praktek Sekolah', 400, '5', '2', '3', '37', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(763, 'Belanja modal Pengadaan Bidang Studi : Bahasa Indonesia', 762, '5', '2', '3', '37', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(764, 'Belanja modal Pengadaan Bidang Studi : Matematika', 762, '5', '2', '3', '37', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(765, 'Belanja modal Pengadaan Bidang Studi : IPA Dasar', 762, '5', '2', '3', '37', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(766, 'Belanja modal Pengadaan Bidang Studi : IPA Lanjutan', 762, '5', '2', '3', '37', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(767, 'Belanja modal Pengadaan Bidang Studi : IPA Menengah', 762, '5', '2', '3', '37', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(768, 'Belanja modal Pengadaan Bidang Studi : IPA Atas', 762, '5', '2', '3', '37', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(769, 'Belanja modal Pengadaan Bidang Studi : IPS', 762, '5', '2', '3', '37', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(770, 'Belanja modal Pengadaan Bidang Studi : Agama Islam', 762, '5', '2', '3', '37', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(771, 'Belanja modal Pengadaan Bidang Studi : Ketrampilan', 762, '5', '2', '3', '37', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(772, 'Belanja modal Pengadaan Bidang Studi : Kesenian', 762, '5', '2', '3', '37', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(773, 'Belanja modal Pengadaan Bidang Studi : Olah Raga', 762, '5', '2', '3', '37', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(774, 'Belanja modal Pengadaan Bidang Studi : PMP', 762, '5', '2', '3', '37', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(775, 'Belanja modal Pengadaan Alat Peraga/Praktek Sekolah Bidang Pendidikan/Keterampilan Lain-lain', 762, '5', '2', '3', '37', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(776, 'Belanja Modal Pengadaan Miniatur PLTMH', 762, '5', '2', '3', '37', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(777, 'Belanja modal Pengadaan Unit Alat Laboratorium Kimia Nuklir', 400, '5', '2', '3', '38', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(778, 'Belanja modal Pengadaan Analytical instrument', 777, '5', '2', '3', '38', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(779, 'Belanja modal Pengadaan Instrument Probe/Sensor', 777, '5', '2', '3', '38', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(780, 'Belanja modal Pengadaan General Laboratory Tool', 777, '5', '2', '3', '38', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(781, 'Belanja modal Pengadaan Instrument Probe/Sensor A', 777, '5', '2', '3', '38', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(782, 'Belanja modal Pengadaan Glassware Plastic/Utensils', 777, '5', '2', '3', '38', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(783, 'Belanja modal Pengadaan Laboratory Safety Equipment', 777, '5', '2', '3', '38', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(784, 'Dst.......', 777, '5', '2', '3', '38', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(785, 'Belanja modal Pengadaan Alat Laboratorium Fisika Nuklir / Elektronika', 400, '5', '2', '3', '39', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(786, 'Belanja modal Pengadaan Radiation Detector', 785, '5', '2', '3', '39', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(787, 'Belanja modal Pengadaan Modular Counting and Scentific', 785, '5', '2', '3', '39', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(788, 'Belanja modal Pengadaan Assembly/Accounting System', 785, '5', '2', '3', '39', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(789, 'Belanja modal Pengadaan Recorder Display', 785, '5', '2', '3', '39', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(790, 'Belanja modal Pengadaan System/Power Supply', 785, '5', '2', '3', '39', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(791, 'Belanja modal Pengadaan Measuring / Testing Device', 785, '5', '2', '3', '39', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(792, 'Belanja modal Pengadaan Opto Electronics', 785, '5', '2', '3', '39', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(793, 'Belanja modal Pengadaan Accelator', 785, '5', '2', '3', '39', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(794, 'Belanja modal Pengadaan Reactor Expermental System', 785, '5', '2', '3', '39', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(795, 'Dst.......', 785, '5', '2', '3', '39', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(796, 'Belanja modal Pengadaan Alat Proteksi Radiasi / Proteksi Lingkungan', 400, '5', '2', '3', '40', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(797, 'Belanja modal Pengadaan Alat Ukur Fisika Kesehatan', 796, '5', '2', '3', '40', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(798, 'Belanja modal Pengadaan Alat Kesehatan Kerja', 796, '5', '2', '3', '40', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(799, 'Belanja modal Pengadaan Proteksi Lingkungan', 796, '5', '2', '3', '40', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(800, 'Belanja modal Pengadaan Meteorological Equipment', 796, '5', '2', '3', '40', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(801, 'Belanja modal Pengadaan Sumber Radiasi', 796, '5', '2', '3', '40', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(802, 'Dst.......', 796, '5', '2', '3', '40', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(803, 'Belanja modal Pengadaan Radiation Aplication and Non Destructive Testing Laboratory (BATAM)', 400, '5', '2', '3', '41', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(804, 'Belanja modal Pengadaan Radiation Application Equipment', 803, '5', '2', '3', '41', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(805, 'Belanja modal Pengadaan Non Destructive Test (NDT) Device', 803, '5', '2', '3', '41', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(806, 'Belanja modal Pengadaan Peralatan Umum Kedoteran /Klinik Nuklir', 803, '5', '2', '3', '41', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(807, 'Belanja modal Pengadaan Peralatan Hidrologi', 803, '5', '2', '3', '41', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(808, 'Dst.......', 803, '5', '2', '3', '41', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(809, 'Belanja modal Pengadaan Alat Laboratorium Lingkungan Hidup', 400, '5', '2', '3', '42', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(810, 'Belanja modal Pengadaan Alat laboratorium Kualitas Air dan tanah', 809, '5', '2', '3', '42', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(811, 'Belanja modal Pengadaan Alat Laboratorium Kualitas Udara', 809, '5', '2', '3', '42', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(812, 'Belanja modal Pengadaan Alat Laboratorium Kebisingan dan Getaran', 809, '5', '2', '3', '42', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(813, 'Belanja modal Pengadaan Laboratorium Lingkungan', 809, '5', '2', '3', '42', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(814, 'Belanja modal Pengadaan Alat Laboratorium Penunjang', 809, '5', '2', '3', '42', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(815, 'Dst.......', 809, '5', '2', '3', '42', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(816, 'Belanja modal Pengadaan Peralatan Laboratorium Hidrodinamika', 400, '5', '2', '3', '43', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(817, 'Belanja modal Pengadaan Towing Carriage', 816, '5', '2', '3', '43', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(818, 'Belanja modal Pengadaan Wave Generator and Absorber', 816, '5', '2', '3', '43', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(819, 'Belanja modal Pengadaan Data Accquistion and Analyzing System', 816, '5', '2', '3', '43', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(820, 'Belanja modal Pengadaan Cavitation Tunnel', 816, '5', '2', '3', '43', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(821, 'Belanja modal Pengadaan Overhead Cranes', 816, '5', '2', '3', '43', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(822, 'Belanja modal Pengadaan Peralatan umum', 816, '5', '2', '3', '43', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(823, 'Belanja modal Pengadaan Pemesinan : Model Ship Workshop', 816, '5', '2', '3', '43', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(824, 'Belanja modal Pengadaan Pemesinan : Propeller Model Workshop', 816, '5', '2', '3', '43', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(825, 'Belanja modal Pengadaan Pemesinan : Mechanical Workshop', 816, '5', '2', '3', '43', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(826, 'Belanja modal Pengadaan Pemesinan : Precision Mechanical Workshop', 816, '5', '2', '3', '43', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(827, 'Belanja modal Pengadaan Pemesinan Painting Shop', 816, '5', '2', '3', '43', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(828, 'Belanja modal Pengadaan Pemesinan : Ship Model Preparation Shop', 816, '5', '2', '3', '43', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(829, 'Belanja modal Pengadaan Pemesinan : Electrical Workshop', 816, '5', '2', '3', '43', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(830, 'Belanja modal Pengadaan MOB', 816, '5', '2', '3', '43', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(831, 'Belanja modal Pengadaan Photo and Film Equipment', 816, '5', '2', '3', '43', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(832, 'Dst.......', 816, '5', '2', '3', '43', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(833, 'Belanja modal Pengadaan Senjata Api', 400, '5', '2', '3', '44', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(834, 'Belanja modal Pengadaan Senjata Genggam', 833, '5', '2', '3', '44', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(835, 'Belanja modal Senjata Pinggang', 833, '5', '2', '3', '44', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(836, 'Belanja modal Senjata Bahu/Senjata Laras Panjang', 833, '5', '2', '3', '44', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(837, 'Belanja modal Senapan Mesin', 833, '5', '2', '3', '44', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(838, 'Belanja modal Mortir', 833, '5', '2', '3', '44', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(839, 'Belanja modal Anti Lapis Baja', 833, '5', '2', '3', '44', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(840, 'Belanja modal Artileri Medan (Armed)', 833, '5', '2', '3', '44', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(841, 'Belanja modal Artileri Pertahanan Udara (Arhanud)', 833, '5', '2', '3', '44', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(842, 'Belanja modal Peluru Kendali/Rudal', 833, '5', '2', '3', '44', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(843, 'Belanja modal Kavaleri', 833, '5', '2', '3', '44', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(844, 'Belanja modal Senjata Lain-lain', 833, '5', '2', '3', '44', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(845, 'Belanja modal Pengadaan Persenjataan Non Senjata Api', 400, '5', '2', '3', '45', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(846, 'Belanja modal Pengadaan Alat Keamanan', 845, '5', '2', '3', '45', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(847, 'Belanja modal Pengadaan Non Senjata Api', 845, '5', '2', '3', '45', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(848, 'Belanja modal Pengadaan Amunisi', 400, '5', '2', '3', '46', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(849, 'Belanja modal Pengadaan Amunisi Umum', 848, '5', '2', '3', '46', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(850, 'Belanja modal Pengadaan Amunisi Darat', 848, '5', '2', '3', '46', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(851, 'Belanja modal Pengadaan Senjata Sinar', 400, '5', '2', '3', '47', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(852, 'Belanja modal Pengadaan Laser', 851, '5', '2', '3', '47', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(853, 'Dst.......', 851, '5', '2', '3', '47', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(854, 'Belanja modal Pengadaan Alat Keamanan dan Perlindungan', 400, '5', '2', '3', '48', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(855, 'Belanja modal Pengadaan Alat Bantu Keamanan', 854, '5', '2', '3', '48', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(856, 'Belanja modal Pengadaan Alat Perlindungan', 854, '5', '2', '3', '48', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(857, 'Belanja modal Pengadaan Alat Bantu Lalu Lintas Darat dan Air', 854, '5', '2', '3', '48', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(858, 'Dst.......', 854, '5', '2', '3', '48', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(859, 'Belanja modal Pengadaan Bangunan Gedung Tempat Kerja', 400, '5', '2', '3', '49', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(860, 'Belanja modal Pengadaan Bangunan Gedung Kantor', 859, '5', '2', '3', '49', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(861, 'Belanja modal Pengadaan Bangunan Gudang', 859, '5', '2', '3', '49', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(862, 'Belanja modal Pengadaan Bangunan Gudang Untuk Bengkel', 859, '5', '2', '3', '49', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(863, 'Belanja modal Pengadaan Bangunan Gedung Instalasi', 859, '5', '2', '3', '49', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(864, 'Belanja modal Pengadaan Bangunan Gedung Laboratorium', 859, '5', '2', '3', '49', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(865, 'Belanja modal Pengadaan Bangunan Kesehatan', 859, '5', '2', '3', '49', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(866, 'Belanja modal Pengadaan Bangunan Oceanarium/Opservatorium', 859, '5', '2', '3', '49', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(867, 'Belanja modal Pengadaan Bangunan Gedung Tempat Ibadah', 859, '5', '2', '3', '49', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(868, 'Belanja modal Pengadaan Bangunan Gedung Tempat Pertemuan', 859, '5', '2', '3', '49', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(869, 'Belanja modal Pengadaan Bangunan Gedung Tempat Pendidikan', 859, '5', '2', '3', '49', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(870, 'Belanja modal Pengadaan Bangunan Gedung Tempat Olah Raga', 859, '5', '2', '3', '49', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(871, 'Belanja modal Pengadaan Bangunan Gedung Pertokoan/Koperasi/Pasar', 859, '5', '2', '3', '49', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(872, 'Belanja modal Pengadaan Bangunan Gedung Untuk Pos Jaga', 859, '5', '2', '3', '49', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(873, 'Belanja modal Pengadaan Bangunan Gedung Garasi/Pool', 859, '5', '2', '3', '49', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(874, 'Belanja modal Pengadaan Bangunan Gedung Pemotongan Hewan', 859, '5', '2', '3', '49', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(875, 'Belanja modal Pengadaan Bangunan Gedung Pabrik', 859, '5', '2', '3', '49', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(876, 'Belanja modal Pengadaan Bangunan Stasiun Bus', 859, '5', '2', '3', '49', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(877, 'Belanja modal Pengadaan Bangunan Kandang Hewan/Ternak', 859, '5', '2', '3', '49', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(878, 'Belanja modal Pengadaan Bangunan Gedung Perpustakaan', 859, '5', '2', '3', '49', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(879, 'Belanja modal Pengadaan Bangunan Gedung Museum', 859, '5', '2', '3', '49', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(880, 'Belanja modal Pengadaan Bangunan Gedung Terminal/Pelabuhan/Bandar', 859, '5', '2', '3', '49', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(881, 'Belanja modal Pengadaan Bangunan Pengujian Kelaikan', 859, '5', '2', '3', '49', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(882, 'Belanja modal Pengadaan Bangunan Lembaga Pemasyarakatan', 859, '5', '2', '3', '49', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(883, 'Belanja modal Pengadaan Bangunan Rumah Tahanan', 859, '5', '2', '3', '49', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(884, 'Belanja modal Pengadaan Bangunan Gedung Kramatorium', 859, '5', '2', '3', '49', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(885, 'Belanja modal Pengadaan Bangunan Pembakaran Bangkai Hewan', 859, '5', '2', '3', '49', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(886, 'Belanja modal Pengadaan Bangunan Gedung Tempat Kerja Lainnya', 859, '5', '2', '3', '49', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(887, 'Belanja modal Pengadaan Bangunan Gedung Tempat Tinggal', 400, '5', '2', '3', '50', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(888, 'Belanja modal Pengadaan Bangunan Rumah Negara Golongan I', 887, '5', '2', '3', '50', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(889, 'Belanja modal Pengadaan Bangunan Rumah Negara Golongan II', 887, '5', '2', '3', '50', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(890, 'Belanja modal Pengadaan Bangunan Rumah Negara Goloongan III', 887, '5', '2', '3', '50', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(891, 'Belanja modal Pengadaan Bangunan Mess/Wisma/Bungalow/Tempat Peristirahatan', 887, '5', '2', '3', '50', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(892, 'Belanja modal Pengadaan Bangunan Asrama', 887, '5', '2', '3', '50', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(893, 'Belanja modal Pengadaan Bangunan Hotel', 887, '5', '2', '3', '50', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(894, 'Belanja modal Pengadaan Bangunan Motel', 887, '5', '2', '3', '50', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(895, 'Belanja modal Pengadaan Bangunan Flat/Rumah Susun', 887, '5', '2', '3', '50', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(896, 'Belanja Modal Pengadaan Bangunan Evakuasi', 887, '5', '2', '3', '50', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(897, 'Dts.....', 887, '5', '2', '3', '50', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(898, 'Belanja modal Pengadaan Bangunan Menara', 400, '5', '2', '3', '51', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(899, 'Belanja modal Pengadaan Bangunan Menara Perambuan Penerang Pantai', 898, '5', '2', '3', '51', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(900, 'Belanja modal Pengadaan Bangunan Perambut Penerangan Pantai Tidak Bermenara', 898, '5', '2', '3', '51', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(901, 'Belanja modal Pengadaan Bangunan Menara Telekomunikasi', 898, '5', '2', '3', '51', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(902, 'Dst.......', 898, '5', '2', '3', '51', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(903, 'Belanja modal Pengadaan Bangunan Bersejarah', 400, '5', '2', '3', '52', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(904, 'Belanja modal Pengadaan Istana Peringatan', 903, '5', '2', '3', '52', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(905, 'Belanja modal Pengadaan Rumah Adat', 903, '5', '2', '3', '52', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(906, 'Belanja modal Pengadaan Rumah Peningggalan Sejarah', 903, '5', '2', '3', '52', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(907, 'Belanja modal Pengadaan Makam Sejarah', 903, '5', '2', '3', '52', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(908, 'Belanja modal Pengadaan Bangunan Tempat Ibadah Bersejarah', 903, '5', '2', '3', '52', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(909, 'Dst.......', 903, '5', '2', '3', '52', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(910, 'Belanja modal Pengadaan Tugu Peringatan', 400, '5', '2', '3', '53', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(911, 'Belanja modal Pengadaan Tugu Kemerdekaan', 910, '5', '2', '3', '53', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(912, 'Belanja modal Pengadaan Tugu Pembangunan', 910, '5', '2', '3', '53', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(913, 'Belanja modal Pengadaan Tugu Peringatan Lainnya', 910, '5', '2', '3', '53', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(914, 'Belanja modal Pengadaan Candi', 400, '5', '2', '3', '54', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(915, 'Belanja modal Pengadaan Candi Hindhu', 914, '5', '2', '3', '54', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(916, 'Belanja modal Pengadaan Candi Budha', 914, '5', '2', '3', '54', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(917, 'Belanja modal Pengadaan Candi Lainnya', 914, '5', '2', '3', '54', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(918, 'Belanja modal Pengadaan Monumen/Bangunan Bersejarah', 400, '5', '2', '3', '55', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(919, 'Belanja modal Pengadaan Bangunan Bersejarah lainnya', 918, '5', '2', '3', '55', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(920, 'Belanja modal Pengadaan Tugu Peringatan', 400, '5', '2', '3', '56', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(921, 'Belanja modal Pengadaan Tugu Peringatan', 920, '5', '2', '3', '56', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(922, 'Belanja modal Pengadaan Tugu Titik Kontrol/Pasti', 400, '5', '2', '3', '57', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(923, 'Belanja modal Pengadaan Tugu/Tanda Batas', 922, '5', '2', '3', '57', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(924, 'Dst.......', 922, '5', '2', '3', '57', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(925, 'Belanja modal Pengadaan Rambu-Rambu', 400, '5', '2', '3', '58', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(926, 'Belanja modal Pengadaan Rambu Bersuar Lalu Lintas Darat', 925, '5', '2', '3', '58', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(927, 'Belanja modal Pengadaan Rambu Tidak Bersuar', 925, '5', '2', '3', '58', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(928, 'Dst.......', 925, '5', '2', '3', '58', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(929, 'Belanja modal Pengadaan Rambu-Rambu Lalu Lintas Udara', 400, '5', '2', '3', '59', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(930, 'Belanja modal Pengadaan Rumwey/Threshold Light', 929, '5', '2', '3', '59', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(931, 'Belanja modal Pengadaan Visual Approach Slope Indicator (VASI)', 929, '5', '2', '3', '59', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(932, 'Belanja modal Pengadaan Approach Light', 929, '5', '2', '3', '59', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(933, 'Belanja modal Pengadaan Rumwey Identification Light (Rells)', 929, '5', '2', '3', '59', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(934, 'Belanja modal Pengadaan Signal', 929, '5', '2', '3', '59', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(935, 'Belanja modal Pengadaan Flood Light', 929, '5', '2', '3', '59', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(936, 'Dst.......', 929, '5', '2', '3', '59', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(937, 'Belanja modal Pengadaan Jalan', 400, '5', '2', '3', '60', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(938, 'Belanja modal Pengadaan Jalan Negara/Nasional', 937, '5', '2', '3', '60', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(939, 'Belanja modal Pengadaan Jalan Propinsi', 937, '5', '2', '3', '60', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(940, 'Belanja modal Pengadaan Jalan Kabupaten/Kota', 937, '5', '2', '3', '60', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(941, 'Belanja modal Pengadaan Jalan Desa', 937, '5', '2', '3', '60', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(942, 'Belanja modal Pengadaan Jalan Khusus', 937, '5', '2', '3', '60', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(943, 'Belanja modal Pengadaan Jalan Tol', 937, '5', '2', '3', '60', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(944, 'Belanja modal Pengadaan Jalan Kereta', 937, '5', '2', '3', '60', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(945, 'Belanja modal Pengadaan Landasan Pacu Pesawat Terbang', 937, '5', '2', '3', '60', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(946, 'Dst.......', 937, '5', '2', '3', '60', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(947, 'Belanja modal Pengadaan Jembatan', 400, '5', '2', '3', '61', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(948, 'Belanja modal Pengadaan Jembatan Negara/Nasional', 947, '5', '2', '3', '61', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(949, 'Belanja modal Pengadaan Jembatan Propinsi', 947, '5', '2', '3', '61', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(950, 'Belanja modal Pengadaan Jembatan Kabupaten/Kota', 947, '5', '2', '3', '61', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(951, 'Belanja modal Pengadaan Jembatan Desa', 947, '5', '2', '3', '61', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(952, 'Belanja modal Pengadaan Jembatan Khusus', 947, '5', '2', '3', '61', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(953, 'Belanja modal Pengadaan Jembatan Pada Jalan Tol', 947, '5', '2', '3', '61', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(954, 'Belanja modal Pengadaan Jembatan Pada Jalan Kereta Api', 947, '5', '2', '3', '61', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(955, 'Belanja modal Pengadaan Jembatan Pada Landasan Pacu Pesawat Terbang', 947, '5', '2', '3', '61', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(956, 'Belanja modal Pengadaan Jembatan Penyeberangan', 947, '5', '2', '3', '61', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(957, 'Dst.......', 947, '5', '2', '3', '61', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(958, 'Belanja modal Pengadaan Bangunan Air Irigasi', 400, '5', '2', '3', '62', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(959, 'Belanja modal Pengadaan Bangunan Waduk', 958, '5', '2', '3', '62', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(960, 'Belanja modal Pengadaan Bangunan Pengambilan Irigasi', 958, '5', '2', '3', '62', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(961, 'Belanja modal Pengadaan Bangunan Pembawa Irigasi', 958, '5', '2', '3', '62', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(962, 'Belanja modal Pengadaan Bangunan Pembuang Irigasi', 958, '5', '2', '3', '62', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(963, 'Belanja modal Pengadaan Bangunan Pengaman Irigasi', 958, '5', '2', '3', '62', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(964, 'Belanja modal Pengadaan Bangunan Pelengkap Irigasi', 958, '5', '2', '3', '62', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(965, 'Dst.......', 958, '5', '2', '3', '62', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(966, 'Belanja modal Pengadaan Bangunan Air Pasang Surut', 400, '5', '2', '3', '63', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(967, 'Belanja modal Pengadaan Bangunan Waduk', 966, '5', '2', '3', '63', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(968, 'Belanja modal Pengadaan Bangunan Pengambilan Pasang Surut', 966, '5', '2', '3', '63', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(969, 'Belanja modal Pengadaan Bangunan Pembawa Pasang Surut', 966, '5', '2', '3', '63', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(970, 'Belanja modal Pengadaan Bangunan Pembuang Pasang Surut', 966, '5', '2', '3', '63', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(971, 'Belanja modal Pengadaan Bangunan Pengaman Pasang Surut', 966, '5', '2', '3', '63', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(972, 'Belanja modal Pengadaan Bangunan Pelengkap Pasang Surut', 966, '5', '2', '3', '63', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(973, 'Belanja modal Pengadaan Bangunan Sawah Pasang Surut', 966, '5', '2', '3', '63', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(974, 'Dst.......', 966, '5', '2', '3', '63', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(975, 'Belanja modal Pengadaan Bangunan Air Rawa', 400, '5', '2', '3', '64', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(976, 'Belanja modal Pengadaan Bangunan Air Pengembang Rawa dan Poder', 975, '5', '2', '3', '64', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(977, 'Belanja modal Pengadaan Bangunan Pengembalian Pasang Rawa', 975, '5', '2', '3', '64', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(978, 'Belanja modal Pengadaan Bangunan Pembawa Pasang Rawa', 975, '5', '2', '3', '64', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(979, 'Belanja modal Pengadaan Bangunan Pembuang Pasang Rawa', 975, '5', '2', '3', '64', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(980, 'Belanja modal Pengadaan Bangunan Pengamanan Pasang Surut', 975, '5', '2', '3', '64', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(981, 'Belanja modal Pengadaan Bangunan Pelengkap Pasang Rawa', 975, '5', '2', '3', '64', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(982, 'Belanja modal Pengadaan Bangunan Sawah Pengembangan Rawa', 975, '5', '2', '3', '64', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(983, 'Dst.......', 975, '5', '2', '3', '64', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(984, 'Belanja modal Pengadaan Bangunan Pengaman Sungai dan Penanggulangan Bencana Alam', 400, '5', '2', '3', '65', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(985, 'Belanja modal Pengadaan Bangunan Waduk Penanggulangan Sungai', 984, '5', '2', '3', '65', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(986, 'Belanja modal Pengadaan Bangunan Pengambilan Pengamanan Sungai', 984, '5', '2', '3', '65', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(987, 'Belanja modal Pengadaan Bangunan Pembuang Pengaman', 984, '5', '2', '3', '65', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(988, 'Belanja modal Pengadaan Bangunan Pembuang Pengaman Sungai', 984, '5', '2', '3', '65', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(989, 'Belanja modal Pengadaan Bangunan Pengaman Pengamanan Sungai', 984, '5', '2', '3', '65', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(990, 'Belanja modal Pengadaan Bangunan Pelengkap Pengamanan Sungai', 984, '5', '2', '3', '65', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(991, 'Belanja modal Pengadaan Bangunan Pengaman Pengamanan Jalan', 984, '5', '2', '3', '65', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(992, 'Belanja Modal Pengadaan Bangunan pengaman pengamanan jalan', 984, '5', '2', '3', '65', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(993, 'Belanja modal Pengadaan Bangunan Pengembangan Sumber Air dan Air Tanah', 400, '5', '2', '3', '66', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(994, 'Belanja modal Pengadaan Bangunan Waduk Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(995, 'Belanja modal Pengadaan Bangunan Pengambilan Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(996, 'Belanja modal Pengadaan Bangunan Pembawa Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(997, 'Belanja modal Pengadaan Bangunan Pembuang Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(998, 'Belanja modal Pengadaan Bangunan Pengamanan Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(999, 'Belanja modal Pengadaan Bangunan Pelengkap Pengembangan Sumber Air', 993, '5', '2', '3', '66', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1000, 'Dst.......', 993, '5', '2', '3', '66', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1001, 'Belanja modal Pengadaan Bangunan Air Bersih/Baku', 400, '5', '2', '3', '67', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1002, 'Belanja modal Pengadaan Waduk Air Bersih/Air Baku', 1001, '5', '2', '3', '67', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1003, 'Belanja modal Pengadaan Bangunan Pengambilan Air Bersih/Baku', 1001, '5', '2', '3', '67', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1004, 'Belanja modal Pengadaan Bangunan Pembawa Air Bersih', 1001, '5', '2', '3', '67', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1005, 'Belanja modal Pengadaan Bangunan Pembuang Air Bersih/Air Baku', 1001, '5', '2', '3', '67', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1006, 'Belanja modal Pengadaan Bangunan Pelengkap Air Bersih/Air Baku', 1001, '5', '2', '3', '67', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1007, 'Dst.......', 1001, '5', '2', '3', '67', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1008, 'Belanja modal Pengadaan Bangunan Air Kotor', 400, '5', '2', '3', '68', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1009, 'Belanja modal Pengadaan Bangunan Pembawa Air Kotor', 1008, '5', '2', '3', '68', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1010, 'Belanja modal Pengadaan Bangunan Waduk Air Kotor', 1008, '5', '2', '3', '68', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1011, 'Belanja modal Pengadaan Bangunan Pembuangan Air Kotor', 1008, '5', '2', '3', '68', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1012, 'Belanja modal Pengadaan Bangunan Pengaman Air Kotor', 1008, '5', '2', '3', '68', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1013, 'Belanja modal Pengadaan Bangunan Pelengkap Air Kotor', 1008, '5', '2', '3', '68', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1014, 'Dst.......', 1008, '5', '2', '3', '68', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1015, 'Belanja modal Pengadaan Bangunan Air', 400, '5', '2', '3', '69', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1016, 'Belanja modal Pengadaan Bangunan Air Laut', 1015, '5', '2', '3', '69', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1017, 'Belanja modal Pengadaan Bangunan Air Tawar', 1015, '5', '2', '3', '69', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1018, 'Dst.......', 1015, '5', '2', '3', '69', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1019, 'Belanja modal Pengadaan Instalasi Air Minum Bersih', 400, '5', '2', '3', '70', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1020, 'Belanja modal Pengadaan Air Muka Tanah', 1019, '5', '2', '3', '70', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1021, 'Belanja modal Pengadaan Air Sumber /Mata Air', 1019, '5', '2', '3', '70', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1022, 'Belanja modal Pengadaan Air Tanah Dalam', 1019, '5', '2', '3', '70', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1023, 'Belanja modal Pengadaan Air Tanah Dangkal', 1019, '5', '2', '3', '70', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1024, 'Belanja modal Pengadaan Air Bersih/Air Baku Lainnya', 1019, '5', '2', '3', '70', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1025, 'Dst.......', 1019, '5', '2', '3', '70', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1026, 'Belanja modal Pengadaan Instalasi Air Kotor', 400, '5', '2', '3', '71', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1027, 'Belanja modal Pengadaan Instalasi Air Kotor', 1026, '5', '2', '3', '71', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1028, 'Belanja modal Pengadaan Instalasi Air Buangan Industri', 1026, '5', '2', '3', '71', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1029, 'Belanja modal Pengadaan Instalasi Air Buangan Pertanian', 1026, '5', '2', '3', '71', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1030, 'Dst.......', 1026, '5', '2', '3', '71', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1031, 'Belanja modal Pengadaan Instalasi Pengolahan Sampah Non Organik', 400, '5', '2', '3', '72', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1032, 'Belanja modal Pengadaan Instalasi Pengolahan Sampah Organik', 1031, '5', '2', '3', '72', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1033, 'Belanja modal Pengadaan Instalasi Pengolahan Sampah Non Organik', 1031, '5', '2', '3', '72', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1034, 'Belanja modal Pengadaan Instalasi Pengolahan Bahan Bangunan', 400, '5', '2', '3', '73', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1035, 'Belanja modal Pengadaan Instalasi Pengolahan Bahan Bangunan', 1034, '5', '2', '3', '73', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1036, 'Belanja modal Pengadaan Instalasi Pembangkit Listrik', 400, '5', '2', '3', '74', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1037, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Air', 1036, '5', '2', '3', '74', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1038, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Diesel', 1036, '5', '2', '3', '74', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1039, 'Belanja modal Pengadaan Pembangkit Liatrik Tenaga Mikro (Hidro)', 1036, '5', '2', '3', '74', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1040, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Angin (PLTAN)', 1036, '5', '2', '3', '74', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1041, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Uap (PLTU)', 1036, '5', '2', '3', '74', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1042, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Nuklir (PLTN)', 1036, '5', '2', '3', '74', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1043, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Gas (PLTG)', 1036, '5', '2', '3', '74', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1044, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Panas Bumi (PLTP)', 1036, '5', '2', '3', '74', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1045, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Tenaga Surya (PLTS)', 1036, '5', '2', '3', '74', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1046, 'Belanja modal Pengadaan Pembangkit Listrik Tenaga Biogas (PLTB)', 1036, '5', '2', '3', '74', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');
INSERT INTO `rekening_belanja` (`id`, `uraian`, `parent_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1047, 'Belanja modal Pengadaan Instalasi Pembangkit Listrik Tenaga Samudera/Gelombang Samudera (PLTSm)', 1036, '5', '2', '3', '74', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1048, 'Dst.......', 1036, '5', '2', '3', '74', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1049, 'Belanja modal Pengadaan Instalasi Gardu Listrik', 400, '5', '2', '3', '75', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1050, 'Belanja modal Pengadaan Instalasi Gardu Listrik Induk', 1049, '5', '2', '3', '75', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1051, 'Belanja modal Pengadaan Instalasi Gardu Listrik Distribusi', 1049, '5', '2', '3', '75', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1052, 'Belanja modal Pengadaan Instalasi Pusat Pengatur Listrik', 1049, '5', '2', '3', '75', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1053, 'Dst.......', 1049, '5', '2', '3', '75', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1054, 'Belanja modal Pengadaan Instalasi Pertahanan', 400, '5', '2', '3', '76', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1055, 'Belanja modal Pengadaan Instalasi Pertahanan Di Darat', 1054, '5', '2', '3', '76', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1056, 'Dst.......', 1054, '5', '2', '3', '76', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1057, 'Belanja modal Pengadaan Instalasi Gas', 400, '5', '2', '3', '77', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1058, 'Belanja modal Pengadaan Instalasi Gardu Gas', 1057, '5', '2', '3', '77', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1059, 'Belanja modal Pengadaan Instalasi Jaringan Pipa Gas', 1057, '5', '2', '3', '77', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1060, 'Dst.......', 1057, '5', '2', '3', '77', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1061, 'Belanja modal Pengadaan Instalasi Pengaman', 400, '5', '2', '3', '78', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1062, 'Belanja modal Pengadaan Instalasi Pengaman Penangkal Petir', 1061, '5', '2', '3', '78', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1063, 'Dst.......', 1061, '5', '2', '3', '78', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1064, 'Belanja modal Pengadaan Jaringan Air Minum', 400, '5', '2', '3', '79', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1065, 'Belanja modal Pengadaan Jaringan  Pembawa', 1064, '5', '2', '3', '79', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1066, 'Belanja modal Pengadaan Jaringan Induk Distribusi', 1064, '5', '2', '3', '79', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1067, 'Belanja modal Pengadaan Jaringan Cabang Distribusi', 1064, '5', '2', '3', '79', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1068, 'Belanja modal Pengadaan Jaringan Sambungan Kerumah', 1064, '5', '2', '3', '79', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1069, 'Dst.......', 1064, '5', '2', '3', '79', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1070, 'Belanja modal Pengadaan Jaringan Listrik', 400, '5', '2', '3', '80', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1071, 'Belanja modal Pengadaan Jaringan  Transmisi', 1070, '5', '2', '3', '80', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1072, 'Belanja modal Pengadaan Jaringan Distribusi', 1070, '5', '2', '3', '80', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1073, 'Belanja modal Pengadaan Jaringan Telepon', 400, '5', '2', '3', '81', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1074, 'Belanja modal Pengadaan Jaringan Telepon Di atas Tanah', 1073, '5', '2', '3', '81', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1075, 'Belanja modal Pengadaan Jaringan Telepon Di bawah Tanah', 1073, '5', '2', '3', '81', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1076, 'Belanja modal Pengadaan Jaringan Telepon Didalam Air', 1073, '5', '2', '3', '81', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1077, 'Belanja modal Pengadaan Jaringan Gas', 400, '5', '2', '3', '82', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1078, 'Belanja modal Pengadaan Jaringan Pipa Gas Transmisi', 1077, '5', '2', '3', '82', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1079, 'Belanja modal Pengadaan Jaringan Pipa Distribusi', 1077, '5', '2', '3', '82', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1080, 'Belanja modal Pengadaan Jaringan Pipa Dinas', 1077, '5', '2', '3', '82', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1081, 'Belanja modal Pengadaan Jaringan BBM', 1077, '5', '2', '3', '82', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1082, 'Dst.......', 1077, '5', '2', '3', '82', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1083, 'Belanja modal Pengadaan Buku', 400, '5', '2', '3', '83', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1084, 'Belanja modal Pengadaan Buku Umum', 1083, '5', '2', '3', '83', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1085, 'Belanja modal Pengadaan Buku Filsafat', 1083, '5', '2', '3', '83', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1086, 'Belanja modal Pengadaan Buku Agama', 1083, '5', '2', '3', '83', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1087, 'Belanja modal Pengadaan Buku Ilmu Sosial', 1083, '5', '2', '3', '83', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1088, 'Belanja modal Pengadaan Buku Ilmu Sastra dan Bahasa', 1083, '5', '2', '3', '83', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1089, 'Belanja modal Pengadaan Ilmu Matematika & Pengetahuan alam', 1083, '5', '2', '3', '83', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1090, 'Belanja modal Pengadaan Buku Ilmu Pengetahuan Praktis', 1083, '5', '2', '3', '83', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1091, 'Belanja modal Pengadaan Buku Arsitektur,  Kesenian, Olah raga', 1083, '5', '2', '3', '83', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1092, 'Belanja modal Pengadaan Buku Geografi, Biografi, Sejarah', 1083, '5', '2', '3', '83', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1093, 'Belanja modal Pengadaan Buku Ilmu Kebudayaan', 1083, '5', '2', '3', '83', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1094, 'Belanja Modal Pengadaan Kepustakaan Non Buku', 1083, '5', '2', '3', '83', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1095, 'Belanja modal Pengadaan Terbitan', 400, '5', '2', '3', '84', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1096, 'Belanja modal Pengadaan Terbitan Berkala', 1095, '5', '2', '3', '84', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1097, 'Belanja modal Pengadaan Buku Laporan', 1095, '5', '2', '3', '84', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1098, 'Dst.......', 1095, '5', '2', '3', '84', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1099, 'Belanja modal Pengadaan Barang-Barang Perpustakaan', 400, '5', '2', '3', '85', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1100, 'Belanja modal Pengadaan Peta', 1099, '5', '2', '3', '85', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1101, 'Belanja modal Pengadaan Naskah (Manuskrip)', 1099, '5', '2', '3', '85', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1102, 'Belanja modal Pengadaan Musik', 1099, '5', '2', '3', '85', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1103, 'Belanja modal Pengadaan Karya Grafika (Graphic Material)', 1099, '5', '2', '3', '85', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1104, 'Belanja modal Pengadaan Three Dimensional Artetacs and Realita', 1099, '5', '2', '3', '85', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1105, 'Belanja modal Pengadaan Bentuk Micro (Microform)', 1099, '5', '2', '3', '85', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1106, 'Belanja modal Pengadaan Rekaman Suara', 1099, '5', '2', '3', '85', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1107, 'Belanja modal Pengadaan Berkas Komputer (Computer Files)', 1099, '5', '2', '3', '85', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1108, 'Belanja modal Pengadaan Film Bergerak dan Rekaman Video', 1099, '5', '2', '3', '85', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1109, 'Belanja modal Pengadaan Tarscalt', 1099, '5', '2', '3', '85', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1110, 'Dst.......', 1099, '5', '2', '3', '85', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1111, 'Belanja modal Pengadaan Barang Bercorak Kebudayaan', 400, '5', '2', '3', '86', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1112, 'Belanja modal Pengadaan Pahatan', 1111, '5', '2', '3', '86', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1113, 'Belanja modal Pengadaan Lukisan', 1111, '5', '2', '3', '86', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1114, 'Belanja modal Pengadaan Alat Kesenian', 1111, '5', '2', '3', '86', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1115, 'Belanja modal Pengadaan Alat Olah Raga', 1111, '5', '2', '3', '86', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1116, 'Belanja modal Pengadaan Tanda Penghargaan', 1111, '5', '2', '3', '86', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1117, 'Belanja modal Pengadaan Maket dan Foto Dokumen', 1111, '5', '2', '3', '86', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1118, 'Belanja modal Pengadaan Benda-benda Bersejarah', 1111, '5', '2', '3', '86', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1119, 'Belanja modal Pengadaan Barang Kerajinan', 1111, '5', '2', '3', '86', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1120, 'Dst.......', 1111, '5', '2', '3', '86', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1121, 'Belanja modal Pengadaan Alat Olah Raga Lainnya', 400, '5', '2', '3', '87', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1122, 'Belanja modal Pengadaan Senam', 1121, '5', '2', '3', '87', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1123, 'Belanja modal Pengadaan Alat Olah Raga Air', 1121, '5', '2', '3', '87', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1124, 'Belanja modal Pengadaan Alat Olah Raga Udara', 1121, '5', '2', '3', '87', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1125, 'Belanja modal Pengadaan Alat Olah Raga Lainnya', 1121, '5', '2', '3', '87', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1126, 'Dst.......', 1121, '5', '2', '3', '87', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1127, 'Belanja modal Pengadaan Hewan', 400, '5', '2', '3', '88', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1128, 'Belanja modal Pengadaan Binatang Ternak', 1127, '5', '2', '3', '88', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1129, 'Belanja modal Pengadaan Binatang Unggas', 1127, '5', '2', '3', '88', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1130, 'Belanja modal Pengadaan Binatang Melata', 1127, '5', '2', '3', '88', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1131, 'Belanja modal Pengadaan Binatang Ikan', 1127, '5', '2', '3', '88', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1132, 'Belanja modal Pengadaan Hewan Kebun Binatang', 1127, '5', '2', '3', '88', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1133, 'Belanja modal Pengadaan Hewan Pengamanan', 1127, '5', '2', '3', '88', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1134, 'Dst.......', 1127, '5', '2', '3', '88', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1135, 'Belanja modal Pengadaan Tanaman', 400, '5', '2', '3', '89', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1136, 'Belanja modal Pengadaan Tanaman Perkebunan', 1135, '5', '2', '3', '89', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1137, 'Belanja modal Pengadaan Tanaman Holtikultura', 1135, '5', '2', '3', '89', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1138, 'Belanja modal Pengadaan Tanaman Kehutanan', 1135, '5', '2', '3', '89', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1139, 'Belanja modal Pengadaan Tanaman Hias', 1135, '5', '2', '3', '89', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1140, 'Belanja modal Pengadaan Tanaman Obat dan Kosmetika', 1135, '5', '2', '3', '89', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1141, 'Dst.......', 1135, '5', '2', '3', '89', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1142, 'Belanja Modal Dana BOS', 400, '5', '2', '3', '90', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1143, 'Belanja Modal Dana BOS', 1142, '5', '2', '3', '90', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1144, 'Belanja modal BLUD', 400, '5', '2', '3', '91', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1145, 'Belanja modal pengadaan tanah', 1144, '5', '2', '3', '91', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1146, 'Belanja modal pengadaan peralatan dan mesin', 1144, '5', '2', '3', '91', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1147, 'Belanja modal pengadaan jalan, irigasi dan jaringan', 1144, '5', '2', '3', '91', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1148, 'Belanja modal pengadaan gedung dan bangunan', 1144, '5', '2', '3', '91', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1149, 'Belanja Modal Pengadaan Aset Laiinnya', 1144, '5', '2', '3', '91', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1150, 'Belanja Modal Pengadaan Bangunan Fasilitas Umum', 400, '5', '2', '3', '92', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1151, 'Belanja Modal Pengadaan Bangunan Sarana Peribadahan', 1150, '5', '2', '3', '92', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1152, 'Belanja Modal Pengadaan Bangunan Sarana Wisata', 1150, '5', '2', '3', '92', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1153, 'Belanja Modal Pengadaan Bangunan Sarana Perdagangan', 1150, '5', '2', '3', '92', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1154, 'BEBAN', 0, '9', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1155, 'BEBAN OPERASI - LO', 1154, '9', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1156, 'Beban Pegawai - LO', 1155, '9', '1', '1', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1157, 'Beban Gaji dan Tunjangan - LO', 1156, '9', '1', '1', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1158, 'Gaji Pokok PNS / Uang Representasi - LO', 1157, '9', '1', '1', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1159, 'Tunjangan Keluarga - LO', 1157, '9', '1', '1', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1160, 'Tunjangan Jabatan - LO', 1157, '9', '1', '1', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1161, 'Tunjangan Fungsional - LO', 1157, '9', '1', '1', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1162, 'Tunjangan Fungsional Umum - LO', 1157, '9', '1', '1', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1163, 'Tunjangan Beras - LO', 1157, '9', '1', '1', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1164, 'Tunjangan PPh/Tunjangan Khusus - LO', 1157, '9', '1', '1', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1165, 'Pembulatan Gaji - LO', 1157, '9', '1', '1', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1166, 'Iuran Jaminan Kesehatan  - LO', 1157, '9', '1', '1', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1167, 'Uang Paket - LO', 1157, '9', '1', '1', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1168, 'Tunjangan Badan Musyawarah - LO', 1157, '9', '1', '1', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1169, 'Tunjangan Komisi - LO', 1157, '9', '1', '1', '01', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1170, 'Tunjangan Badan Anggaran - LO', 1157, '9', '1', '1', '01', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1171, 'Tunjangan Badan Kehormatan - LO', 1157, '9', '1', '1', '01', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1172, 'Tunjangan Alat Kelengkapan Lainnya - LO', 1157, '9', '1', '1', '01', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1173, 'Tunjangan Perumahan - LO', 1157, '9', '1', '1', '01', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1174, 'Uang Duka Wafat/Tewas - LO', 1157, '9', '1', '1', '01', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1175, 'Uang Jasa Pengabdian - LO', 1157, '9', '1', '1', '01', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1176, 'Belanja Penunjang Operasional Pimpinan DPRD - LO', 1157, '9', '1', '1', '01', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1177, 'Tunjangan Kesehatan DPRD - LO', 1157, '9', '1', '1', '01', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1178, 'Iuran Jaminan Kecelakaan Kerja - LO', 1157, '9', '1', '1', '01', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1179, 'Biaya Penyelenggaraan Jenazah - LO', 1157, '9', '1', '1', '01', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1180, 'Beban Tambahan Penghasilan PNS - LO', 1156, '9', '1', '1', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1181, 'Tambahan Penghasilan berdasarkan beban kerja  - LO', 1180, '9', '1', '1', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1182, 'Tambahan Penghasilan berdasarkan tempat bertugas - LO', 1180, '9', '1', '1', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1183, 'Tambahan Penghasilan berdasarkan kondisi kerja - LO', 1180, '9', '1', '1', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1184, 'Tambahan Penghasilan berdasarkan kelangkaan profesi  - LO', 1180, '9', '1', '1', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1185, 'Tambahan Penghasilan Berdasarkan Pertimbangan Objektif - LO', 1180, '9', '1', '1', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1186, 'Tunjangan Kinerja - LO', 1180, '9', '1', '1', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1187, 'Tambahan Penghasilan Guru PNSD - LO', 1180, '9', '1', '1', '02', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1188, 'Tunjangan Profesi Guru PNSD - LO', 1180, '9', '1', '1', '02', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1189, 'Beban Penerimaan lainnya Pimpinan dan anggota DPRD serta KDH/WKDH - LO', 1156, '9', '1', '1', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1190, 'Beban Tunjangan Komunikasi Intensif Pimpinan dan Anggota DPRD - LO', 1189, '9', '1', '1', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1191, 'Beban Penunjang Operasional KDH/WKDH - LO', 1189, '9', '1', '1', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1192, 'Dst', 1189, '9', '1', '1', '03', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1193, 'Beban Pemungutan Pajak Bumi dan Bangunan - LO', 1156, '9', '1', '1', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1194, 'Beban Pemungutan Pajak Bumi dan Bangunan Pertambangan - LO', 1193, '9', '1', '1', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1195, 'Beban Pemungutan Pajak Bumi dan Bangunan Perkebunan - LO', 1193, '9', '1', '1', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1196, 'Beban Pemungutan Pajak Bumi dan Bangunan Perhutanan - LO', 1193, '9', '1', '1', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1197, 'Insentif Pemungutan Pajak Daerah', 1156, '9', '1', '1', '05', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1198, 'Insentif Pemungutan Pajak Daerah - Pajak Kendaraan Bermotor - LO', 1197, '9', '1', '1', '05', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1199, 'Insentif Pemungutan Pajak Daerah - Bea Balik Nama Kendaraan Bermotor - LO', 1197, '9', '1', '1', '05', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1200, 'Insentif Pemungutan Pajak Daerah - Pajak Bahan Bakar Kendaraan Bermotor - LO', 1197, '9', '1', '1', '05', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1201, 'Insentif Pemungutan Pajak Daerah - Pajak Air Permukaan - LO', 1197, '9', '1', '1', '05', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1202, 'Insentif Pemungutan Pajak Daerah - Pajak Rokok - LO', 1197, '9', '1', '1', '05', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1203, 'Insentif Pemungutan Pajak Daerah - Pajak Hotel - LO', 1197, '9', '1', '1', '05', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1204, 'Insentif Pemungutan Pajak Daerah - Pajak Restoran - LO', 1197, '9', '1', '1', '05', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1205, 'Insentif Pemungutan Pajak Daerah - Pajak Hiburan - LO', 1197, '9', '1', '1', '05', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1206, 'Insentif Pemungutan Pajak Daerah - Pajak Reklame - LO', 1197, '9', '1', '1', '05', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1207, 'Insentif Pemungutan Pajak Daerah - Pajak Penerangan Jalan - LO', 1197, '9', '1', '1', '05', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1208, 'Insentif Pemungutan Pajak Daerah - Pajak Parkir - LO', 1197, '9', '1', '1', '05', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1209, 'Insentif Pemungutan Pajak Daerah - Pajak Air Tanah - LO', 1197, '9', '1', '1', '05', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1210, 'Insentif Pemungutan Pajak Daerah - Pajak Sarang Burung Walet - LO', 1197, '9', '1', '1', '05', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1211, 'Insentif Pemungutan Pajak Daerah - Pajak Mineral Bukan Logam dan Batuan - LO', 1197, '9', '1', '1', '05', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1212, 'Insentif Pemungutan Pajak Daerah - Pajak Bumi dan Bangunan Pedesaan dan Perkotaan - LO', 1197, '9', '1', '1', '05', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1213, 'Insentif Pemungutan Pajak Daerah - Bea Perolehan Hak Atas Tanah dan Bangunan - LO', 1197, '9', '1', '1', '05', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1214, 'Insentif Pemungutan Retribusi Daerah', 1156, '9', '1', '1', '06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1215, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Kesehatan - LO', 1214, '9', '1', '1', '06', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1216, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Persampahan/ Kebersihan - LO', 1214, '9', '1', '1', '06', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1217, 'Insentif Pemungutan Retribusi Daerah - Penggantian Biaya Cetak Kartu Tanda Penduduk dan Akta Catatan', 1214, '9', '1', '1', '06', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1218, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pemakaman dan Pengabuan Mayat - LO', 1214, '9', '1', '1', '06', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1219, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Parkir di Tepi Jalan Umum - LO', 1214, '9', '1', '1', '06', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1220, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pasar - LO', 1214, '9', '1', '1', '06', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1221, 'Insentif Pemungutan Retribusi Daerah - Pengujian Kendaraan Bermotor - LO', 1214, '9', '1', '1', '06', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1222, 'Insentif Pemungutan Retribusi Daerah - Pemeriksaan Alat Pemadam Kebakaran - LO', 1214, '9', '1', '1', '06', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1223, 'Insentif Pemungutan Retribusi Daerah - Penggantian Biaya Cetak Peta - LO', 1214, '9', '1', '1', '06', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1224, 'Insentif Pemungutan Retribusi Daerah - Penyediaan dan/atau Penyedotan Kakus - LO', 1214, '9', '1', '1', '06', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1225, 'Insentif Pemungutan Retribusi Daerah - Pengolahan Limbah Cair - LO', 1214, '9', '1', '1', '06', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1226, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Tera/Tera Ulang - LO', 1214, '9', '1', '1', '06', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1227, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Pendidikan - LO', 1214, '9', '1', '1', '06', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1228, 'Insentif Pemungutan Retribusi Daerah - Pengendalian Menara Telekomunikasi - LO', 1214, '9', '1', '1', '06', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1229, 'Insentif Pemungutan Retribusi Daerah - Pemakaian Kekayaan Daerah - LO', 1214, '9', '1', '1', '06', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1230, 'Insentif Pemungutan Retribusi Daerah - Pasar Grosir dan/ atau Pertokoan - LO', 1214, '9', '1', '1', '06', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1231, 'Insentif Pemungutan Retribusi Daerah - Tempat Pelelangan - LO', 1214, '9', '1', '1', '06', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1232, 'Insentif Pemungutan Retribusi Daerah - Terminal - LO', 1214, '9', '1', '1', '06', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1233, 'Insentif Pemungutan Retribusi Daerah - Tempat Khusus Parkir - LO', 1214, '9', '1', '1', '06', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1234, 'Insentif Pemungutan Retribusi Daerah - Tempat Penginapan/ Pesanggrahan/ Villa - LO', 1214, '9', '1', '1', '06', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1235, 'Insentif Pemungutan Retribusi Daerah - Rumah Potong Hewan - LO', 1214, '9', '1', '1', '06', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1236, 'Insentif Pemungutan Retribusi Daerah - Pelayanan Kepelabuhan - LO', 1214, '9', '1', '1', '06', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1237, 'Insentif Pemungutan Retribusi Daerah - Tempat Rekreasi dan Olah raga- LO', 1214, '9', '1', '1', '06', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1238, 'Insentif Pemungutan Retribusi Daerah - Penyebrangan Air - LO', 1214, '9', '1', '1', '06', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1239, 'Insentif Pemungutan Retribusi Daerah - Penjualan Produksi Usaha Daerah - LO', 1214, '9', '1', '1', '06', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1240, 'Insentif Pemungutan Retribusi Daerah - Izin Mendirikan Bangunan - LO', 1214, '9', '1', '1', '06', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1241, 'Insentif Pemungutan Retribusi Daerah - Izin Tempat Penjualan Minuman Beralkohol - LO', 1214, '9', '1', '1', '06', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1242, 'Insentif Pemungutan Retribusi Daerah - Izin Gangguan - LO', 1214, '9', '1', '1', '06', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1243, 'Insentif Pemungutan Retribusi Daerah - Izin Trayek - LO', 1214, '9', '1', '1', '06', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1244, 'Insentif Pemungutan Retribusi Daerah - Izin Perikanan - LO', 1214, '9', '1', '1', '06', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1245, 'Insentif Pemungutan Retribusi Daerah - Pengendalian Lalu Lintas - LO', 1214, '9', '1', '1', '06', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1246, 'Insentif Pemungutan Retribusi Daerah - Perpanjangan Izin Mempekerjakan Tenaga Kerja Asing (IMTA) - L', 1214, '9', '1', '1', '06', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1247, 'Uang Lembur - LO', 1156, '9', '1', '1', '07', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1248, 'Uang Lembur PNS - LO', 1247, '9', '1', '1', '07', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1249, 'Uang Lembur Non PNS - LO', 1247, '9', '1', '1', '07', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1250, 'Beban pegawai BLUD', 1156, '9', '1', '1', '08', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1251, 'Beban pegawai BLUD.', 1250, '9', '1', '1', '08', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1252, 'Beban Barang dan Jasa', 1155, '9', '1', '2', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1253, 'Beban Bahan Pakai Habis', 1252, '9', '1', '2', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1254, 'Beban Persediaan alat tulis kantor', 1253, '9', '1', '2', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1255, 'Beban Persediaan dokumen/administrasi tender', 1253, '9', '1', '2', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1256, 'Beban Persediaan alat listrik dan elektronik ( lampu pijar, battery kering)', 1253, '9', '1', '2', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1257, 'Beban Persediaan perangko, materai dan benda pos lainnya', 1253, '9', '1', '2', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1258, 'Beban Persediaan peralatan kebersihan dan bahan pembersih', 1253, '9', '1', '2', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1259, 'Beban Persediaan Bahan Bakar Minyak/Gas', 1253, '9', '1', '2', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1260, 'Beban Persediaan pengisian tabung pemadam kebakaran', 1253, '9', '1', '2', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1261, 'Beban Persediaan pengisian isi tabung gas', 1253, '9', '1', '2', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1262, 'Beban Logistik (Kebutuhan Pokok Harian Rumah Tangga KDH/WKDH, RUmah Sakit dan Panti)', 1253, '9', '1', '2', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1263, 'Beban Seminar Kit Peserta', 1253, '9', '1', '2', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1264, 'Beban Penghargaan (hadiah dalam bentuk benda)', 1253, '9', '1', '2', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1265, 'Beban peralatan/perlengkapan pakai habis', 1253, '9', '1', '2', '01', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1266, 'Beban Persediaan Bahan/ Material', 1252, '9', '1', '2', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1267, 'Beban Persediaan bahan baku bangunan', 1266, '9', '1', '2', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1268, 'Beban Persediaan bahan/bibit tanaman', 1266, '9', '1', '2', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1269, 'Beban Persediaan bibit ternak', 1266, '9', '1', '2', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1270, 'Beban Persediaan bahan obat-obatan', 1266, '9', '1', '2', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1271, 'Beban Persediaan bahan kimia', 1266, '9', '1', '2', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1272, 'Beban Persediaan Makanan Pokok', 1266, '9', '1', '2', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1273, 'Beban Bahan Percontohan/Promosi', 1266, '9', '1', '2', '02', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1274, 'Beban Bahan Pengujian Kendaraan', 1266, '9', '1', '2', '02', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1275, 'Beban Bahan Makanan Ternak', 1266, '9', '1', '2', '02', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1276, 'Beban Bahan/Material Dekorasi', 1266, '9', '1', '2', '02', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1277, 'Beban bahan/material alat tera ulang', 1266, '9', '1', '2', '02', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1278, 'Beban Bahan Praktek/Keterampilan', 1266, '9', '1', '2', '02', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1279, 'Beban Jasa Kantor', 1252, '9', '1', '2', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1280, 'Beban Jasa telepon', 1279, '9', '1', '2', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1281, 'Beban Jasa air', 1279, '9', '1', '2', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1282, 'Beban Jasa listrik', 1279, '9', '1', '2', '03', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1283, 'Beban Jasa pengumuman lelang/ pemenang lelang', 1279, '9', '1', '2', '03', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1284, 'Beban Jasa surat kabar/majalah', 1279, '9', '1', '2', '03', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1285, 'Beban Jasa kawat/faksimili/internet', 1279, '9', '1', '2', '03', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1286, 'Beban Jasa paket/pengiriman', 1279, '9', '1', '2', '03', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1287, 'Beban Jasa Sertifikasi', 1279, '9', '1', '2', '03', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1288, 'Beban Jasa Transaksi Keuangan', 1279, '9', '1', '2', '03', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1289, 'Beban Jasa administrasi pungutan Pajak Penerangan Jalan Umum', 1279, '9', '1', '2', '03', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1290, 'Beban Jasa administrasi pungutan Pajak Bahan Bakar Kendaraan Bermotor', 1279, '9', '1', '2', '03', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1291, 'Beban Jasa Laboratorium', 1279, '9', '1', '2', '03', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1292, 'Beban Jasa Publikasi', 1279, '9', '1', '2', '03', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1293, 'Beban  jasa akomodasi', 1279, '9', '1', '2', '03', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1294, 'Beban  pajak bumi dan bangunan', 1279, '9', '1', '2', '03', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1295, 'Beban Jasa Notaris', 1279, '9', '1', '2', '03', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1296, 'Beban  jasa pemandu pelayanan pajak', 1279, '9', '1', '2', '03', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1297, 'Beban  Jasa Tata Boga', 1279, '9', '1', '2', '03', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1298, 'Beban retribusi sampah', 1279, '9', '1', '2', '03', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1299, 'Beban Transportasi', 1279, '9', '1', '2', '03', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1300, 'Beban Jasa Ongkos Naik Haji Petugas Pemandu Haji Daerah', 1279, '9', '1', '2', '03', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1301, 'Beban Premi Asuransi', 1252, '9', '1', '2', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1302, 'Beban Jasa Premi Asuransi Kesehatan', 1301, '9', '1', '2', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1303, 'Beban Jasa Premi Asuransi Barang Milik Daerah', 1301, '9', '1', '2', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1304, 'Dst', 1301, '9', '1', '2', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1305, 'Beban Perawatan Kendaraan Bermotor', 1252, '9', '1', '2', '05', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1306, 'Beban Jasa Service', 1305, '9', '1', '2', '05', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1307, 'Beban Penggantian Suku Cadang', 1305, '9', '1', '2', '05', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1308, 'Beban Bahan Bakar Minyak/Gas dan pelumas', 1305, '9', '1', '2', '05', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1309, 'Beban Jasa KIR', 1305, '9', '1', '2', '05', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1310, 'Beban Pajak Kendaraan Bermotor', 1305, '9', '1', '2', '05', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1311, 'Beban Bea Balik Nama Kendaraan Bermotor', 1305, '9', '1', '2', '05', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1312, 'Beban Cetak dan Penggandaan', 1252, '9', '1', '2', '06', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1313, 'Beban Cetak', 1312, '9', '1', '2', '06', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1314, 'Beban Penggandaan', 1312, '9', '1', '2', '06', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1315, 'Beban Sewa Rumah/Gedung/Gudang/Parkir', 1252, '9', '1', '2', '07', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1316, 'Beban sewa rumah jabatan/rumah dinas', 1315, '9', '1', '2', '07', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1317, 'Beban sewa gedung/ kantor/tempat', 1315, '9', '1', '2', '07', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1318, 'Beban sewa ruang rapat/pertemuan', 1315, '9', '1', '2', '07', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1319, 'Beban sewa tempat parkir/uang tambat/hanggar sarana mobilitas', 1315, '9', '1', '2', '07', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1320, 'Dst ', 1315, '9', '1', '2', '07', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1321, 'Beban Sewa Sarana Mobilitas', 1252, '9', '1', '2', '08', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1322, 'Beban Sewa Sarana Mobilitas Darat', 1321, '9', '1', '2', '08', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1323, 'Beban Sewa Sarana Mobilitas Air', 1321, '9', '1', '2', '08', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1324, 'Beban Sewa Sarana Mobilitas Udara', 1321, '9', '1', '2', '08', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1325, 'Dst', 1321, '9', '1', '2', '08', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1326, 'Beban Sewa Alat Berat', 1252, '9', '1', '2', '09', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1327, 'Beban Sewa Eskavator', 1326, '9', '1', '2', '09', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1328, 'Beban Sewa Buldoser', 1326, '9', '1', '2', '09', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1329, 'Beban sewa crane', 1326, '9', '1', '2', '09', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1330, 'Beban Sewa Perlengkapan dan Peralatan Kantor', 1252, '9', '1', '2', '10', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1331, 'Beban sewa meja kursi', 1330, '9', '1', '2', '10', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1332, 'Beban sewa komputer dan printer', 1330, '9', '1', '2', '10', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1333, 'Beban sewa proyektor', 1330, '9', '1', '2', '10', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1334, 'Beban sewa generator', 1330, '9', '1', '2', '10', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1335, 'Beban sewa tenda', 1330, '9', '1', '2', '10', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1336, 'Beban sewa pakaian adat/tradisional', 1330, '9', '1', '2', '10', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1337, 'Beban sewa taman/bunga untuk taman hias', 1330, '9', '1', '2', '10', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1338, 'Beban sewa sound system dan alat musik', 1330, '9', '1', '2', '10', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1339, 'Beban sewa mesin', 1330, '9', '1', '2', '10', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1340, 'Beban sewa bandwidth', 1330, '9', '1', '2', '10', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1341, 'Beban sewa peralatan dapur', 1330, '9', '1', '2', '10', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1342, 'Beban sewa alat telekomunikasi', 1330, '9', '1', '2', '10', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1343, 'Beban sewa alat praktek', 1330, '9', '1', '2', '10', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1344, 'Beban sewa billboard', 1330, '9', '1', '2', '10', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1345, 'Beban sewa alat pendingin', 1330, '9', '1', '2', '10', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1346, 'Beban Sewa Alat Musik', 1330, '9', '1', '2', '10', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1347, 'Beban Sewa Stand', 1330, '9', '1', '2', '10', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1348, 'Beban Makanan dan Minuman', 1252, '9', '1', '2', '11', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1349, 'Beban makanan dan minuman harian pegawai', 1348, '9', '1', '2', '11', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1350, 'Beban makanan dan minuman rapat', 1348, '9', '1', '2', '11', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1351, 'Beban makanan dan minuman tamu', 1348, '9', '1', '2', '11', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1352, 'Beban makanan dan minuman pelatihan', 1348, '9', '1', '2', '11', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1353, 'Beban makanan dan minuman Harian Pengaman', 1348, '9', '1', '2', '11', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1354, 'Beban Pakaian Dinas dan Atributnya', 1252, '9', '1', '2', '12', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1355, 'Beban pakaian Dinas KDH dan WKDH', 1354, '9', '1', '2', '12', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1356, 'Beban Pakaian Sipil Harian (PSH)', 1354, '9', '1', '2', '12', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1357, 'BebanPakaian Sipil Lengkap (PSL)', 1354, '9', '1', '2', '12', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1358, 'Beban Pakaian Dinas Harian (PDH)', 1354, '9', '1', '2', '12', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1359, 'Beban Pakaian Dinas Upacara (PDU)', 1354, '9', '1', '2', '12', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1360, 'Dst', 1354, '9', '1', '2', '12', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1361, 'Belanja Pakaian Kerja', 1252, '9', '1', '2', '13', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1362, 'Beban pakaian kerja lapangan', 1361, '9', '1', '2', '13', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1363, 'Beban pakaian kerja..', 1361, '9', '1', '2', '13', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1364, 'Belanja Pakaian khusus dan hari-hari tertentu', 1252, '9', '1', '2', '14', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1365, 'Beban pakaian KORPRI', 1364, '9', '1', '2', '14', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1366, 'Beban pakaian adat daerah', 1364, '9', '1', '2', '14', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1367, 'Beban pakaian batik tradisional', 1364, '9', '1', '2', '14', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1368, 'Beban pakaian olahraga', 1364, '9', '1', '2', '14', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1369, 'Beban pakaian Paskibra', 1364, '9', '1', '2', '14', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1370, 'Beban Perjalanan Dinas', 1252, '9', '1', '2', '15', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1371, 'Beban perjalanan dinas dalam daerah', 1370, '9', '1', '2', '15', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1372, 'Beban perjalanan dinas luar daerah', 1370, '9', '1', '2', '15', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1373, 'Beban perjalanan dinas luar negeri', 1370, '9', '1', '2', '15', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1374, 'Beban Perjalanan Pindah Tugas', 1252, '9', '1', '2', '16', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1375, 'Beban perjalanan pindah tugas dalam daerah', 1374, '9', '1', '2', '16', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1376, 'Beban perjalanan pindah tugas luar daerah', 1374, '9', '1', '2', '16', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1377, 'Beban Pemulangan Pegawai', 1252, '9', '1', '2', '17', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1378, 'Beban pemulangan pegawai yang pensiun dalam daerah', 1377, '9', '1', '2', '17', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1379, 'Beban pemulangan pegawai yang pensiun luar daerah', 1377, '9', '1', '2', '17', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1380, 'Beban Pemeliharaan', 1252, '9', '1', '2', '18', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1381, 'Beban Pemeliharan Tanah', 1380, '9', '1', '2', '18', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1382, 'Beban Pemeliharan Peralatan dan Mesin', 1380, '9', '1', '2', '18', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1383, 'Beban Pemeliharan Gedung dan Bangunan', 1380, '9', '1', '2', '18', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1384, 'Beban Pemeliharan Jalan, Irigasi, dan Jaringan', 1380, '9', '1', '2', '18', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1385, 'Beban Pemeliharan Aset Tetap Lainnya', 1380, '9', '1', '2', '18', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1386, 'Beban Pemeliharaan Aset Leinnya', 1380, '9', '1', '2', '18', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1387, 'Beban Jasa Konsultasi', 1252, '9', '1', '2', '19', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1388, 'Beban Jasa Konsultansi Penelitian', 1387, '9', '1', '2', '19', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1389, 'Beban Jasa Konsultansi Perencanaan', 1387, '9', '1', '2', '19', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1390, 'Beban Jasa Konsultansi Pengawasan', 1387, '9', '1', '2', '19', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1391, 'Beban jasa konsultansi keuangan', 1387, '9', '1', '2', '19', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1392, 'Beban jasa konsultansi apraisal', 1387, '9', '1', '2', '19', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1393, 'Beban jasa konsultansi survellen/assesmen', 1387, '9', '1', '2', '19', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1394, 'Beban jasa konsultansi design', 1387, '9', '1', '2', '19', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1395, 'Beban jasa konsultansi AMDAL', 1387, '9', '1', '2', '19', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1396, 'Beban jasa konsultansi teknologi informasi', 1387, '9', '1', '2', '19', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1397, 'Beban jasa konsultansi Akreditasi', 1387, '9', '1', '2', '19', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1398, 'Belanja Jasa Konsultansi Pendampingan', 1387, '9', '1', '2', '19', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');
INSERT INTO `rekening_belanja` (`id`, `uraian`, `parent_id`, `kode1`, `kode2`, `kode3`, `kode4`, `kode5`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1399, 'Beban Barang Untuk Diserahkan kepada Masyarakat/Pihak Ketiga', 1252, '9', '1', '2', '20', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1400, 'Beban Barang Yang Akan Diserahkan Kepada Masyarakat', 1399, '9', '1', '2', '20', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1401, 'Beban Barang Yang Akan Diserahkan Kepada Pihak Ketiga', 1399, '9', '1', '2', '20', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1402, 'Beban Barang Untuk Dijual kepada Masyarakat/Pihak Ketiga', 1252, '9', '1', '2', '21', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1403, 'Beban Barang Yang Akan Dijual Kepada Masyarakat', 1402, '9', '1', '2', '21', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1404, 'Beban Barang Yang Akan Dijual Kepada Pihak Ketiga', 1402, '9', '1', '2', '21', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1405, 'Beban Beasiswa Pendidikan PNS', 1252, '9', '1', '2', '22', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1406, 'Beban beasiswa tugas belajar D3', 1405, '9', '1', '2', '22', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1407, 'Beban beasiswa tugas belajar S1', 1405, '9', '1', '2', '22', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1408, 'Beban beasiswa tugas belajar S2', 1405, '9', '1', '2', '22', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1409, 'Beban beasiswa tugas belajar S3', 1405, '9', '1', '2', '22', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1410, 'Dst', 1405, '9', '1', '2', '22', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1411, 'Beban kursus, pelatihan, sosialisasi dan bimbingan teknis PNS', 1252, '9', '1', '2', '23', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1412, 'Beban kursus-kursus singkat/ pelatihan', 1411, '9', '1', '2', '23', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1413, 'Beban sosialisasi', 1411, '9', '1', '2', '23', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1414, 'Beban bimbingan teknis', 1411, '9', '1', '2', '23', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1415, 'Beban Magang', 1411, '9', '1', '2', '23', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1416, 'Beban Honorarium Non Pegawai', 1252, '9', '1', '2', '24', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1417, 'Honorarium Tenaga Ahli/Narasumber/Instruktur - LO', 1416, '9', '1', '2', '24', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1418, 'Beban Jasa Moderator', 1416, '9', '1', '2', '24', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1419, 'Beban Jasa Pelayanan Tindak Medik dan Jaga', 1416, '9', '1', '2', '24', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1420, 'Beban Jasa Pengawas', 1416, '9', '1', '2', '24', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1421, 'Beban Jasa Penguji', 1416, '9', '1', '2', '24', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1422, 'Beban Jasa Petugas Asrama', 1416, '9', '1', '2', '24', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1423, 'Beban Jasa Anggota Korp Musik', 1416, '9', '1', '2', '24', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1424, 'Beban Jasa Pelaksana Upacara Hari-Hari Besar', 1416, '9', '1', '2', '24', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1425, 'Beban Jasa Sukarelawan', 1416, '9', '1', '2', '24', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1426, 'Beban Jasa Buruh/Tukang/Mandor', 1416, '9', '1', '2', '24', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1427, 'Beban Jasa Pelayanan IB/TE', 1416, '9', '1', '2', '24', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1428, 'Beban Jasa Penerjemah', 1416, '9', '1', '2', '24', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1429, 'Beban Jasa Penguburan Kelayan Panti/Pasien Rumah Sakit', 1416, '9', '1', '2', '24', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1430, 'Beban Jasa Pembuatan Peta (Manual/Tematik/Digital)', 1416, '9', '1', '2', '24', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1431, 'Beban Jasa Pemeriksa Berkas Kepangkatan/Hasil Tes/Ujian/Wawancara', 1416, '9', '1', '2', '24', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1432, 'Beban Jasa Pelaku Seni', 1416, '9', '1', '2', '24', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1433, 'Beban Jasa MC/Pembawa Acara', 1416, '9', '1', '2', '24', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1434, 'Beban Jasa Pengaman kantor', 1416, '9', '1', '2', '24', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1435, 'Beban Jasa Petugas Kebersihan', 1416, '9', '1', '2', '24', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1436, 'Beban Jasa Sopir', 1416, '9', '1', '2', '24', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1437, 'Beban Jasa Peliputan', 1416, '9', '1', '2', '24', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1438, 'Beban Jasa Petugas RPH', 1416, '9', '1', '2', '24', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1439, 'Beban Jasa Saksi', 1416, '9', '1', '2', '24', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1440, 'Beban Jasa Penceramah/Rohaniwan', 1416, '9', '1', '2', '24', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1441, 'Beban Jasa Petugas Lapangan', 1416, '9', '1', '2', '24', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1442, 'Beban Jasa Desain', 1416, '9', '1', '2', '24', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1443, 'Beban Jasa Loundry', 1416, '9', '1', '2', '24', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1444, 'Beban Jasa Petugas Rumah Jabatan (Khusus KDH/Wakil KDH)*', 1416, '9', '1', '2', '24', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1445, 'Beban Jasa Pengamanan Ujian', 1416, '9', '1', '2', '24', '0034', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1446, 'Beban Jasa Dekorator', 1416, '9', '1', '2', '24', '0035', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1447, 'Beban Honorarium Penulisan Buletin', 1416, '9', '1', '2', '24', '0036', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1448, 'Honorarium PNS', 1252, '9', '1', '2', '25', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1449, 'Honorarium Panitia Pelaksana Kegiatan - LO', 1448, '9', '1', '2', '25', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1450, 'Honorarium Tim Pengadaan Barang dan Jasa - LO', 1448, '9', '1', '2', '25', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1451, 'Honorarium Tenaga Ahli/Instruktur/Narasumber - LO', 1448, '9', '1', '2', '25', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1452, 'Honorarium Pengelola Keuangan Daerah - LO', 1448, '9', '1', '2', '25', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1453, 'Honorarium Pengelola Asset Daerah - LO', 1448, '9', '1', '2', '25', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1454, 'Honorarium Pelayanan Tindak Medik dan Jaga - LO', 1448, '9', '1', '2', '25', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1455, 'Honorarium Tim Pembina Samsat - LO', 1448, '9', '1', '2', '25', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1456, 'Honorarium Pengelola SIPKD - LO', 1448, '9', '1', '2', '25', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1457, 'Honorarium Pengelola Situs/Website/Portal Pemprov Sumbar - LO', 1448, '9', '1', '2', '25', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1458, 'Honorarium Petugas Teknis Lapangan - LO', 1448, '9', '1', '2', '25', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1459, 'Honorarium Pengawas (Kelas/Ujian) - LO', 1448, '9', '1', '2', '25', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1460, 'Honorarium Pengelola Bahan Kepustakaan/Arsip - LO', 1448, '9', '1', '2', '25', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1461, 'Honorarium Kuasa Hukum Khusus Pemerintah Daerah - LO', 1448, '9', '1', '2', '25', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1462, 'Honorarium Tim Anggaran Pemerintah Daerah (TAPD) - LO', 1448, '9', '1', '2', '25', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1463, 'Honorarium Badan Pertimbangan Jabatan dan Kepangkatan (BAPERJAKAT) - LO', 1448, '9', '1', '2', '25', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1464, 'Honorarium Tim Penyelenggaraan Haji Daerah  (TPHD) - LO', 1448, '9', '1', '2', '25', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1465, 'Honorarium Pembantu Panitia Penyelenggara Ibadah Haji - LO', 1448, '9', '1', '2', '25', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1466, 'Honorarium Penyidik Pegawai Negeri Sipil - LO', 1448, '9', '1', '2', '25', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1467, 'Honorarium Peneliti (LITBANG) - LO', 1448, '9', '1', '2', '25', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1468, 'Honorarium Penulis Karya Tulis Ilmiah (LITBANG) - LO', 1448, '9', '1', '2', '25', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1469, 'Honorarium Editor (LITBANG) - LO', 1448, '9', '1', '2', '25', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1470, 'Honorarium Tim Petugas Pos Check Point - LO', 1448, '9', '1', '2', '25', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1471, 'Honorarium Majelis Pertimbangan Pegawai (MPP) - LO', 1448, '9', '1', '2', '25', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1472, 'Honorarium Tim Penilai Daerah (TPD) - LO', 1448, '9', '1', '2', '25', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1473, 'Honorarium Unsur Pengarah Penanggulangan Bencana - LO', 1448, '9', '1', '2', '25', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1474, 'Honorarium Pengawas - LO', 1448, '9', '1', '2', '25', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1475, 'Honorarium Petugas Pemeriksa Hasil Pengukuran Kinerja SKPD - LO', 1448, '9', '1', '2', '25', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1476, 'Honorarium Pengelola SIMGAJI PNSD - LO', 1448, '9', '1', '2', '25', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1477, 'Honorarium Satuan Tugas PUSDALOPS Penanggulangan Bencana - LO', 1448, '9', '1', '2', '25', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1478, 'Honorarium Pengelola Data Transaksi Harian dan Rekapitulasi Transaksi Harian - LO', 1448, '9', '1', '2', '25', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1479, 'Honorarium Pengelolaan Dana Bantuan Operasional Sekolah - LO', 1448, '9', '1', '2', '25', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1480, 'Honorarium Tim Laporan Penyelenggaraan Pemerintahan Daerah - LO', 1448, '9', '1', '2', '25', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1481, 'Honorarium Tim LKPJ Kepala Daerah dan AMJ - LO', 1448, '9', '1', '2', '25', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1482, 'Honorarium Tim Penyusunan Memori Serah Terima Jabatan KDH - LO', 1448, '9', '1', '2', '25', '0034', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1483, 'Honorarium Non PNS', 1252, '9', '1', '2', '26', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1484, 'Honorarium Tenaga Ahli/Instruktur/Narasumber - LO', 1483, '9', '1', '2', '26', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1485, 'Honorarium Pegawai Honorer/Tidak Tetap - LO', 1483, '9', '1', '2', '26', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1486, 'Honorarium Pengelola SIPKD - LO', 1483, '9', '1', '2', '26', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1487, 'Honorarium Pembantu Panitia Penyelenggara Ibadah Haji - LO', 1483, '9', '1', '2', '26', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1488, 'Honorarium Pengolah Data (LITBANG) - LO', 1483, '9', '1', '2', '26', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1489, 'Honorarium Penulis Karya Tulis Ilmiah (LITBANG) - LO', 1483, '9', '1', '2', '26', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1490, 'Honorarium Penyunting Lepas (LITBANG) - LO', 1483, '9', '1', '2', '26', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1491, 'Honorarium Editor (LITBANG) - LO', 1483, '9', '1', '2', '26', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1492, 'Honorarium Pengelola Situs/Website/Portal Pemprov Sumbar - LO', 1483, '9', '1', '2', '26', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1493, 'Honorarium Unsur Pengarah Penanggulangan Bencana - LO', 1483, '9', '1', '2', '26', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1494, 'Honorarium Pengelolaan Dana Bantuan Operasional Sekolah - LO', 1483, '9', '1', '2', '26', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1495, 'Honorarium Pengelola SIMGAJI PNSD - LO', 1483, '9', '1', '2', '26', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1496, 'Honorarium Satuan Tugas PUSDALOPS Penanggulangan Bencana - LO', 1483, '9', '1', '2', '26', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1497, 'Honorarium Pelayanan Tindak Medik dan Jaga - LO', 1483, '9', '1', '2', '26', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1498, 'Honorarium Tim Penyelenggaraan Haji Daerah (TPHD) - LO', 1483, '9', '1', '2', '26', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1499, 'Honorarium Petugas Teknis Lapangan - LO', 1483, '9', '1', '2', '26', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1500, 'Honorarium Sarjana Pemberdayaan Masyarakat Nagari - LO', 1483, '9', '1', '2', '26', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1501, 'Beban Jasa Pelayanan IB/TE', 1483, '9', '1', '2', '26', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1502, 'Honorarium Tim Penilai Daerah (TPD) - LO', 1483, '9', '1', '2', '26', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1503, 'Honorarium Tim Petugas Pos Check Point - LO', 1483, '9', '1', '2', '26', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1504, 'Uang untuk diberikan kepada Pihak Ketiga/Masyarakat', 1252, '9', '1', '2', '27', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1505, 'Uang untuk diberikan kepada Pihak Ketiga - LO', 1504, '9', '1', '2', '27', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1506, 'Uang Akibat Keputusan Pengadilan - LO', 1504, '9', '1', '2', '27', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1507, 'Uang Untuk Kebutuhan Kelayan/Atlit  (SPP dan Uang saku) - LO', 1504, '9', '1', '2', '27', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1508, 'Uang Untuk Hadiah Lomba - LO', 1504, '9', '1', '2', '27', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1509, 'Beban Jasa Lembaga', 1252, '9', '1', '2', '28', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1510, 'Beban jasa lembaga Kesenian', 1509, '9', '1', '2', '28', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1511, 'Beban jasa Lembaga Tes Psikologi', 1509, '9', '1', '2', '28', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1512, 'Beban jasa lembaga akreditasi', 1509, '9', '1', '2', '28', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1513, 'Beban jasa lembaga sertifikasi', 1509, '9', '1', '2', '28', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1514, 'Beban jasa lembaga kalibrasi', 1509, '9', '1', '2', '28', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1515, 'Beban jasa lembaga Pengadilan', 1509, '9', '1', '2', '28', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1516, 'Beban jasa lembaga pengamanan', 1509, '9', '1', '2', '28', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1517, 'Beban jasa lembaga penyedia sopir', 1509, '9', '1', '2', '28', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1518, 'Beban jasa lembaga kesehatan', 1509, '9', '1', '2', '28', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1519, 'Beban Jasa Lembaga Pendidikan', 1509, '9', '1', '2', '28', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1520, 'Beban Jasa Lembaga Kajian', 1509, '9', '1', '2', '28', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1521, 'Beban Jasa Lembaga Pengujian Mutu', 1509, '9', '1', '2', '28', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1522, 'Beban barang dan Jasa BLUD', 1252, '9', '1', '2', '29', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1523, 'Beban barang dan Jasa BLUD.', 1522, '9', '1', '2', '29', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1524, 'Beban Kontribusi', 1252, '9', '1', '2', '30', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1525, 'Beban Kontribusi Pelatihan/Magang', 1524, '9', '1', '2', '30', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1526, 'Beban Kontribusi Pagelaran/Even', 1524, '9', '1', '2', '30', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1527, 'Beban Kontribusi Penyaji', 1524, '9', '1', '2', '30', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1528, 'Beban Kontribusi Tahunan LSO', 1524, '9', '1', '2', '30', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1529, 'Beban Jasa Lainnya', 1252, '9', '1', '2', '31', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1530, 'Beban Jasa Event Organizer (Untuk Acara Nasional dan Internasional)', 1529, '9', '1', '2', '31', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1531, 'Beban Jasa Cleaning Service', 1529, '9', '1', '2', '31', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1532, 'Beban Jasa  Alih Media', 1529, '9', '1', '2', '31', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1533, 'Beban Jasa Kostumisasi Aplikasi', 1529, '9', '1', '2', '31', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1534, 'Beban Jasa Pendampingan Sistim Informasi', 1529, '9', '1', '2', '31', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1535, 'Beban Jasa Layanan Pengembangan Sumber Daya Manusia', 1529, '9', '1', '2', '31', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1536, 'Beban Vakasi/Verifikasi', 1252, '9', '1', '2', '33', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1537, 'Beban Vakasi.', 1536, '9', '1', '2', '33', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1538, 'Beban Verifikasi.', 1536, '9', '1', '2', '33', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1539, 'Beban Penyusutan dan Amortisasi', 1155, '9', '1', '7', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1540, 'Beban Penyusutan Peralatan dan Mesin', 1539, '9', '1', '7', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1541, 'Beban Penyusutan Alat-Alat Besar Darat', 1540, '9', '1', '7', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1542, 'Beban Penyusutan Alat-Alat Besar Apung', 1540, '9', '1', '7', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1543, 'Beban Penyusutan Alat-alat Bantu', 1540, '9', '1', '7', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1544, 'Beban Penyusutan Alat Angkutan Darat Bermotor', 1540, '9', '1', '7', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1545, 'Beban Penyusutan Alat Angkutan Berat Tak Bermotor', 1540, '9', '1', '7', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1546, 'Beban Penyusutan Alat Angkut Apung Bermotor', 1540, '9', '1', '7', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1547, 'Beban Penyusutan Alat Angkut Apung Tak Bermotor', 1540, '9', '1', '7', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1548, 'Beban Penyusutan Alat Angkut Bermotor Udara', 1540, '9', '1', '7', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1549, 'Beban Penyusutan Alat Bengkel Bermesin', 1540, '9', '1', '7', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1550, 'Beban Penyusutan Alat Bengkel Tak Bermesin', 1540, '9', '1', '7', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1551, 'Beban Penyusutan Alat Ukur', 1540, '9', '1', '7', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1552, 'Beban Penyusutan Alat Pengolahan Pertanian', 1540, '9', '1', '7', '01', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1553, 'Beban Penyusutan Alat Pemeliharaan Tanaman/Alat Penyimpan Pertanian', 1540, '9', '1', '7', '01', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1554, 'Beban Penyusutan Alat Kantor', 1540, '9', '1', '7', '01', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1555, 'Beban Penyusutan Alat Rumah Tangga', 1540, '9', '1', '7', '01', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1556, 'Beban Penyusutan Peralatan Komputer', 1540, '9', '1', '7', '01', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1557, 'Beban Penyusutan Meja Dan Kursi Kerja/Rapat Pejabat', 1540, '9', '1', '7', '01', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1558, 'Beban Penyusutan Alat Studio', 1540, '9', '1', '7', '01', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1559, 'Beban Penyusutan Alat Komunikasi', 1540, '9', '1', '7', '01', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1560, 'Beban Penyusutan Peralatan Pemancar', 1540, '9', '1', '7', '01', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1561, 'Beban Penyusutan Alat Kedokteran', 1540, '9', '1', '7', '01', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1562, 'Beban Penyusutan Alat Kesehatan', 1540, '9', '1', '7', '01', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1563, 'Beban Penyusutan Unit-Unit Laboratorium', 1540, '9', '1', '7', '01', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1564, 'Beban Penyusutan Alat Peraga/Praktek Sekolah', 1540, '9', '1', '7', '01', '0024', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1565, 'Beban Penyusutan Unit Alat Laboratorium Kimia Nuklir', 1540, '9', '1', '7', '01', '0025', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1566, 'Beban Penyusutan Alat Laboratorium Fisika Nuklir / Elektronika', 1540, '9', '1', '7', '01', '0026', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1567, 'Beban Penyusutan Alat Proteksi Radiasi / Proteksi Lingkungan', 1540, '9', '1', '7', '01', '0027', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1568, 'Beban Penyusutan Radiation Aplication and Non Destructive Testing Laboratory (BATAM)', 1540, '9', '1', '7', '01', '0028', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1569, 'Beban Penyusutan Alat Laboratorium Lingkungan Hidup', 1540, '9', '1', '7', '01', '0029', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1570, 'Beban Penyusutan Peralatan Laboratorium Hidrodinamika', 1540, '9', '1', '7', '01', '0030', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1571, 'Beban Penyusutan Senjata Api', 1540, '9', '1', '7', '01', '0031', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1572, 'Beban Penyusutan Persenjataan Non Senjata Api', 1540, '9', '1', '7', '01', '0032', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1573, 'Beban Penyusutan Alat Keamanan dan Perlindungan', 1540, '9', '1', '7', '01', '0033', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1574, 'Beban Penyusutan Gedung dan Bangunan', 1539, '9', '1', '7', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1575, 'Beban Penyusutan Bangunan Gedung Tempat Kerja', 1574, '9', '1', '7', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1576, 'Beban Penyusutan Bangunan Gedung Tempat Tinggal', 1574, '9', '1', '7', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1577, 'Beban Penyusutan Bangunan Menara', 1574, '9', '1', '7', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1578, 'Beban Penyusutan Bangunan Bersejarah', 1574, '9', '1', '7', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1579, 'Beban Penyusutan Tugu Peringatan', 1574, '9', '1', '7', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1580, 'Beban Penyusutan Candi', 1574, '9', '1', '7', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1581, 'Beban Penyusutan Monumen/Bangunan Bersejarah', 1574, '9', '1', '7', '02', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1582, 'Beban Penyusutan Tugu Peringatan Lain', 1574, '9', '1', '7', '02', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1583, 'Beban Penyusutan Tugu Titik Kontrol/Pasti', 1574, '9', '1', '7', '02', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1584, 'Beban Penyusutan Bangunan Rambu-Rambu', 1574, '9', '1', '7', '02', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1585, 'Beban Penyusutan Bangunan Rambu-Rambu Lalu Lintas Udara', 1574, '9', '1', '7', '02', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1586, 'Beban Penyusutan Jalan, Irigasi, dan Jaringan', 1539, '9', '1', '7', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1587, 'Beban Penyusutan Jalan', 1586, '9', '1', '7', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1588, 'Beban Penyusutan Jembatan', 1586, '9', '1', '7', '03', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1589, 'Beban Penyusutan Bangunan Air Irigasi', 1586, '9', '1', '7', '03', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1590, 'Beban Penyusutan Bangunan Air Pasang Surut', 1586, '9', '1', '7', '03', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1591, 'Beban Penyusutan Bangunan Air Rawa', 1586, '9', '1', '7', '03', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1592, 'Beban Penyusutan Bangunan Pengaman Sungai dan Penanggulangan Bencana Alam', 1586, '9', '1', '7', '03', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1593, 'Beban Penyusutan Bangunan Pengembangan Sumber Air dan Air Tanah', 1586, '9', '1', '7', '03', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1594, 'Beban Penyusutan Bangunan Air Bersih/Baku', 1586, '9', '1', '7', '03', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1595, 'Beban Penyusutan Bangunan Air Kotor', 1586, '9', '1', '7', '03', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1596, 'Beban Penyusutan Bangunan Air', 1586, '9', '1', '7', '03', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1597, 'Beban Penyusutan Instalasi Air Minum/Air Bersih', 1586, '9', '1', '7', '03', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1598, 'Beban Penyusutan Instalasi Air Kotor', 1586, '9', '1', '7', '03', '0012', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1599, 'Beban Penyusutan Instalasi Pengolahan Sampah', 1586, '9', '1', '7', '03', '0013', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1600, 'Beban Penyusutan Instalasi Pengolahan Bahan Bangunan', 1586, '9', '1', '7', '03', '0014', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1601, 'Beban Penyusutan Instalasi Pembangkit Listrik', 1586, '9', '1', '7', '03', '0015', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1602, 'Beban Penyusutan Instalasi Gardu Listrik', 1586, '9', '1', '7', '03', '0016', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1603, 'Beban Penyusutan Instalasi Pertahanan', 1586, '9', '1', '7', '03', '0017', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1604, 'Beban Penyusutan Instalasi Gas', 1586, '9', '1', '7', '03', '0018', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1605, 'Beban Penyusutan Instalasi Pengaman', 1586, '9', '1', '7', '03', '0019', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1606, 'Beban Penyusutan Jaringan Air Minum', 1586, '9', '1', '7', '03', '0020', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1607, 'Beban Penyusutan Jaringan Listrik', 1586, '9', '1', '7', '03', '0021', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1608, 'Beban Penyusutan Jaringan Telepon', 1586, '9', '1', '7', '03', '0022', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1609, 'Beban Penyusutan Jaringan Gas', 1586, '9', '1', '7', '03', '0023', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1610, 'Beban Amortisasi Aset Tidak Berwujud', 1539, '9', '1', '7', '04', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1611, 'Beban Amortisasi Goodwill', 1610, '9', '1', '7', '04', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1612, 'Beban Amortisasi Lisensi dan frenchise', 1610, '9', '1', '7', '04', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1613, 'Beban Amortisasi Hak Cipta', 1610, '9', '1', '7', '04', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1614, 'Beban Amortisasi Paten', 1610, '9', '1', '7', '04', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1615, 'Beban Amortisasi Aset Tidat Berwujud Lainnya', 1610, '9', '1', '7', '04', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1616, 'Beban Penyisihan Piutang', 1155, '9', '1', '8', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1617, 'Beban Penyisihan Piutang Pendapatan', 1616, '9', '1', '8', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1618, 'Beban Penyisihan Piutang Pajak', 1617, '9', '1', '8', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1619, 'Beban Penyisihan Piutang Retribusi', 1617, '9', '1', '8', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1620, 'Beban Penyisihan Piutang Hasil Pengelolaan Kekayaan Daerah yang Dipisahkan', 1617, '9', '1', '8', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1621, 'Beban Penyisihan Piutang Lain-lain PAD yang Sah', 1617, '9', '1', '8', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1622, 'Beban Penyisihan Piutang Transfer Pemerintah Pusat', 1617, '9', '1', '8', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1623, 'Beban Penyisihan Piutang Transfer Pemerintah Pusat - Lainnya', 1617, '9', '1', '8', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1624, 'Beban Penyisihan Piutang Transfer Pemerintah Daerah Lainnya', 1617, '9', '1', '8', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1625, 'Beban Penyisihan Piutang Bantuan Keuangan', 1617, '9', '1', '8', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1626, 'Beban Penyisihan Piutang Hibah', 1617, '9', '1', '8', '01', '0009', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1627, 'Beban Penyisihan Piutang Pendapatan Lainnya', 1617, '9', '1', '8', '01', '0010', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1628, 'Dst', 1617, '9', '1', '8', '01', '0011', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1629, 'Beban Penyisihan Piutang Lainnya', 1616, '9', '1', '8', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1630, 'Beban Penyisihan Bagian Lancar Tagihan Jangka Panjang', 1629, '9', '1', '8', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1631, 'Beban Penyisihan Bagian Lancar Tagihan Pinjaman Jangka Panjang kepada Entitas Lainnya', 1629, '9', '1', '8', '02', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1632, 'Beban Penyisihan Bagian Lancar Tagihan Penjualan Angsuran', 1629, '9', '1', '8', '02', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1633, 'Beban Penyisihan Bagian lancar Tuntutan Ganti Rugi', 1629, '9', '1', '8', '02', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1634, 'Beban Penyisihan Uang Muka', 1629, '9', '1', '8', '02', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1635, 'Dst', 1629, '9', '1', '8', '02', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1636, 'Beban Lain-lain', 1155, '9', '1', '9', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1637, 'Beban Penurunan Nilai Investasi', 1636, '9', '1', '9', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1638, 'Beban Penurunan Nilai Investasi', 1637, '9', '1', '9', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1639, 'Beban Penyisihan Dana Bergulir', 1636, '9', '1', '9', '02', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1640, 'Beban Penyisihan Dana Bergulir', 1639, '9', '1', '9', '02', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1641, 'Beban Lain-lain', 1636, '9', '1', '9', '03', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1642, 'Beban Lain-lain', 1641, '9', '1', '9', '03', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1643, 'DEFISIT NON OPERASIONAL', 1154, '9', '3', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1644, 'Defisit Penjualan Aset Non Lancar - LO', 1643, '9', '3', '1', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1645, 'Defisit Penjualan Aset Non Lancar - LO', 1644, '9', '3', '1', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1646, 'Defisit Penjualan Aset Tanah - LO', 1645, '9', '3', '1', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1647, 'Defisit Penjualan Aset Peralatan dan Mesin - LO', 1645, '9', '3', '1', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1648, 'Defisit Penjualan Aset Gedung dan Bangunan - LO', 1645, '9', '3', '1', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1649, 'Defisit Penjualan Aset Non Lancar/Aset Tetap Lainnya - LO', 1645, '9', '3', '1', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1650, 'Defisit Pelepasan Investasi Jangka Panjang - LO', 1645, '9', '3', '1', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1651, 'Defisit Penjualan Aset Lain-lain - LO', 1645, '9', '3', '1', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1652, 'Dst', 1645, '9', '3', '1', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1653, 'Defisit Penyelesaian Kewajiban Jangka Panjang - LO', 1643, '9', '3', '2', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1654, 'Defisit Penyelesaian Kewajiban Jangka Panjang - LO', 1653, '9', '3', '2', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1655, 'Defisit Penyelesaian Utang Dalam Negeri Sektor Perbankan - LO', 1654, '9', '3', '2', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1656, 'Defisit Penyelesaian Utang Dari Lembaga Keuangan Bukan Bank - LO', 1654, '9', '3', '2', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1657, 'Defisit Penyelesaian Utang Dalam Negeri - Obligasi - LO', 1654, '9', '3', '2', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1658, 'Defisit Penyelesaian Utang Pemerintah Pusat - LO', 1654, '9', '3', '2', '01', '0004', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1659, 'Defisit Penyelesaian Utang Pemerintah Provinsi - LO', 1654, '9', '3', '2', '01', '0005', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1660, 'Defisit Penyelesaian Utang Pemerintah Kabupaten/Kota - LO', 1654, '9', '3', '2', '01', '0006', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1661, 'Defisit Penyelesaian Premium (Diskonto) Obligasi - LO', 1654, '9', '3', '2', '01', '0007', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1662, 'Dst', 1654, '9', '3', '2', '01', '0008', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1663, 'Defisit dari Kegiatan Non Operasional Lainnya - LO', 1643, '9', '3', '3', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1664, 'Defisit dari Kegiatan Non Operasional Lainnya - LO', 1663, '9', '3', '3', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1665, 'Defisit dari Kegiatan Non Operasional Lainnya - LO', 1664, '9', '3', '3', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1666, 'Defisit Pelepasan Investasi Jangka Pendek - LO', 1664, '9', '3', '3', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1667, 'Dst', 1664, '9', '3', '3', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1668, 'BEBAN LUAR BIASA', 1154, '9', '4', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1669, 'Beban Luar Biasa', 1668, '9', '4', '1', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1670, 'Beban Luar Biasa', 1669, '9', '4', '1', '01', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1671, 'Beban Bencana Alam', 1670, '9', '4', '1', '01', '0001', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1672, 'Beban Luar Biasa Lainnya', 1670, '9', '4', '1', '01', '0002', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1673, 'Dst', 1670, '9', '4', '1', '01', '0003', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `renja`
--

CREATE TABLE IF NOT EXISTS `renja` (
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `indikator_kinerja` text NOT NULL COMMENT 'Indikator Kinerja Program/Kegiatan',
  `sasaran_kegiatan` text NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `target_capaian_kinerja` text NOT NULL,
  `kebutuhan_dana` bigint(20) NOT NULL COMMENT ' Kebutuhan Dana/ Pagu Indikatif ',
  `sumber_dana` int(11) NOT NULL,
  `catatan_penting` text NOT NULL,
  `target_capaian_kinerja_a2` text NOT NULL,
  `kebutuhan_dana_a2` bigint(20) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `sumber_usulan` enum('Renstra','Bukan Renstra') NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Diizinkan','Tidak Diizinkan') NOT NULL,
  `keterangan` text NOT NULL,
  `alasan_tolak_renja` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renja`
--

INSERT INTO `renja` (`id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `uraian`, `indikator_kinerja`, `sasaran_kegiatan`, `lokasi_kegiatan`, `target_capaian_kinerja`, `kebutuhan_dana`, `sumber_dana`, `catatan_penting`, `target_capaian_kinerja_a2`, `kebutuhan_dana_a2`, `created_by`, `created_date`, `mod_by`, `mod_date`, `sumber_usulan`, `status_verifikasi`, `keterangan`, `alasan_tolak_renja`, `tahun`, `kecamatan`, `kelurahan`, `status_forum_skpd`, `keterangan_forum_skpd`, `foto`) VALUES
(1, 1, 1, 1, 5, 25, '', '', 'asd', 'Kota Pematangsiantar', '', 1231232, 1, '', '', 0, '2', '2016-07-04 13:45:46', '2', '2016-07-06 13:54:30', 'Renstra', 'Belum Verifikasi', '', '', 2017, 1, 1, 'Terima', 'asd', ''),
(2, 1, 1, 2, 3, 25, '', '', 'asd', 'Kota Pematangsiantar', '', 50000000, 1, '', '', 50000000, '2', '2016-07-04 14:06:47', '2', '2016-07-06 15:37:13', 'Renstra', '', '', '', 2017, 1, 1, 'Terima', '', ''),
(3, 1, 1, 1, 5, 24, '', '', 'sdf', 'Kota Pematangsiantar', '', 150000000, 1, '', '', 0, '2', '2016-07-04 22:21:13', '2', '2016-07-05 00:51:17', 'Bukan Renstra', 'Tidak Diizinkan', '', 'asdasd', 2017, 1, 1, 'Terima', '0000-00-00', ''),
(4, 1, 1, 1, 1, 24, '', '', 'asd', 'Kota Pematangsiantar', '', 250000000, 1, '', '', 100000000, '2', '2016-07-04 22:25:34', '2', '2016-07-06 15:33:24', 'Renstra', '', '', '', 2017, 0, 0, 'Terima', 'asdasd', ''),
(5, 1, 1, 2, 2, 24, '', '', 'Sasaran Kegiatan *', 'Kota Pematangsiantar', '', 150000000, 1, '', '', 120000000, '2', '2016-07-04 22:58:26', '2', '2016-07-05 00:33:54', 'Bukan Renstra', 'Tidak Diizinkan', '', '', 2017, 1, 1, 'Terima', '0000-00-00', ''),
(6, 1, 1, 2, 2, 24, '', '', 'Sasaran Kegiatan *', 'Kota Pematangsiantar', '', 150000000, 1, '', '', 120000000, '2', '2016-07-04 22:58:40', '2', '2016-07-19 02:37:22', 'Bukan Renstra', 'Diizinkan', '', '', 2017, 1, 1, 'Terima', '0000-00-00', ''),
(7, 1, 1, 1, 6, 24, '', '', 'asdas', 'Kota Pematangsiantar', '', 21500000, 1, '', '', 14500000, '2', '2016-07-04 23:11:49', '2', '2016-07-05 23:49:20', 'Bukan Renstra', 'Tidak Diizinkan', '', '', 2017, 1, 0, 'Terima', '0000-00-00', ''),
(8, 1, 1, 1, 6, 24, '', '', 'asd', 'Kota Pematangsiantar', '', 17900000, 1, '', '', 125000000, '2', '2016-07-04 23:12:33', '2', '2016-07-05 23:49:40', 'Bukan Renstra', 'Tidak Diizinkan', '', '', 2017, 0, 0, 'Terima', '0000-00-00', ''),
(9, 1, 1, 1, 6, 24, '', '', 'asd', 'Kota Pematangsiantar', '', 17900000, 1, '', '', 125000000, '2', '2016-07-04 23:13:49', '', '0000-00-00 00:00:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 0, 0, 'Terima', '0000-00-00', ''),
(10, 1, 1, 1, 6, 24, '', '', 'asd', 'Kota Pematangsiantar', '', 17900000, 1, '', '', 125000000, '2', '2016-07-04 23:13:55', '', '0000-00-00 00:00:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 0, 0, 'Terima', '0000-00-00', ''),
(11, 1, 1, 1, 5, 24, 'Pembuatan gorong-gorong Desa sitio tio', '', 'asd', 'Kota Pematangsiantar', '', 123123123123, 1, '', '', 0, '2', '2016-07-06 15:41:42', '2', '2016-07-07 00:46:47', 'Bukan Renstra', 'Diizinkan', '', '', 2017, 0, 0, 'Terima', '', ''),
(12, 1, 1, 1, 1, 24, 'sad', '', 'asdas', 'Kota Pematangsiantar', '', 123000000, 1, '', '', 240000000, '3', '2016-07-07 00:04:35', '', '0000-00-00 00:00:00', 'Renstra', 'Belum Verifikasi', '', '', 2017, 1, 1, 'Terima', '', ''),
(13, 1, 1, 1, 5, 24, 'asd', '', 'asd', 'Kota Pematangsiantar', '', 21000000, 1, '', '', 0, '3', '2016-07-07 00:15:21', '3', '2016-07-07 00:15:34', 'Bukan Renstra', 'Diizinkan', '', '', 2016, 0, 0, 'Terima', '', ''),
(14, 1, 1, 1, 1, 24, 'Keg. Pemutakhiran Data Base SIM', 'Jumlah Data Base SIM Mutakhir', 'Tersedia Data Base SIM Mutakhir', 'Kota Pematangsiantar', '', 100000000, 2, '', '', 0, '2', '2016-07-14 16:33:58', '2', '2016-07-14 16:34:48', 'Renstra', '', '', '', 2020, 1, 1, 'Terima', '', ''),
(15, 1, 1, 1, 5, 24, '', 'Jumlah kajian SIM', ' sasaran_kegiatan ', 'Kota Pematangsiantar', '', 200000000, 1, '', '', 0, '2', '2016-07-14 16:36:35', '2', '2016-07-14 16:39:46', 'Bukan Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(16, 1, 1, 1, 6, 24, '', 'Jumlah kajian potensi masalah Lalin dan angkutan', '', 'Kota Pematangsiantar', '', 200000000, 1, '', '', 0, '2', '2016-07-14 16:37:23', '2', '2016-07-14 16:39:50', 'Bukan Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(17, 1, 1, 2, 2, 24, '', '', '', 'Kota Pematangsiantar', '', 150000000, 1, '', '', 0, '2', '2016-07-14 19:32:42', '2', '2016-07-14 19:32:54', 'Bukan Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(18, 1, 1, 1, 6, 27, '', '', '', 'Kota Pematangsiantar', '', 200000000, 1, '', '', 210000000, '2', '2016-07-15 17:41:50', '2', '2016-07-15 17:41:59', 'Bukan Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(19, 1, 1, 2, 2, 24, '', '', '', 'Kota Pematangsiantar', '', 780000000, 2, '', '', 0, '2', '2016-07-27 11:18:56', '2', '2016-07-27 11:23:13', 'Bukan Renstra', 'Tidak Diizinkan', '', '', 2017, 0, 0, 'Terima', '', ''),
(20, 1, 1, 2, 3, 24, '', '', '', 'Kota Pematangsiantar', '', 45635432, 3, '', '', 0, '2', '2016-07-27 18:21:37', '', '0000-00-00 00:00:00', 'Renstra', 'Belum Verifikasi', '', '', 2020, 0, 0, 'Terima', '', ''),
(21, 1, 1, 1, 6, 25, '', '', '', 'Kota Pematangsiantar', '', 34345435, 3, '', '', 45355464, '2', '2016-07-28 18:14:43', '', '0000-00-00 00:00:00', 'Renstra', 'Belum Verifikasi', '', '', 2020, 0, 0, 'Terima', '', ''),
(22, 1, 1, 1, 5, 25, '', '', '', 'Kota Pematangsiantar', '', 43533453, 3, '', '', 34343343, '2', '2016-07-28 18:15:41', '2', '2016-07-28 18:16:49', 'Bukan Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(23, 1, 1, 2, 3, 25, '', '', '', 'Kota Pematangsiantar', '', 43564574, 2, '', '', 0, '2', '2016-07-28 18:19:04', '2', '2016-07-28 18:19:18', 'Renstra', 'Diizinkan', '', '', 2020, 0, 0, 'Terima', '', ''),
(24, 1, 20, 51, 9, 24, '', '-', '', 'Kota Pematangsiantar', '', 450000000, 3, '', '', 450000000, '2', '2016-08-02 04:31:45', '2', '2016-08-02 04:40:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 5, 13, 'Terima', '', '13619868_1175586552462746_183473908713817948_n.jpg'),
(25, 1, 20, 51, 9, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 200000000, 1, '', '', 250000000, '2', '2016-08-06 02:24:21', '', '0000-00-00 00:00:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 1, 43, 'Terima', '', 'jam tangan pria.jpg'),
(26, 1, 20, 51, 9, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 250000000, 1, '', '', 300000000, '2', '2016-08-06 03:01:04', '', '0000-00-00 00:00:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 1, 40, 'Terima', '', ''),
(27, 1, 20, 51, 9, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 121, 3, '', '', 453, '2', '2016-08-06 03:03:36', '', '0000-00-00 00:00:00', 'Bukan Renstra', 'Belum Verifikasi', '', '', 2017, 2, 48, 'Terima', '', 'jam tangan pria.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `renja_perubahan`
--

CREATE TABLE IF NOT EXISTS `renja_perubahan` (
  `id` bigint(20) NOT NULL,
  `status_renja` enum('Data Perubahan','Data Baru') NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `sasaran_kegiatan_setelah_perubahan` text NOT NULL,
  `lokasi_kegiatan` varchar(100) NOT NULL,
  `target_capaian_kinerja` text NOT NULL,
  `kebutuhan_dana` bigint(20) NOT NULL COMMENT ' Kebutuhan Dana/ Pagu Indikatif ',
  `kebutuhan_dana_setelah_perubahan` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `status_verifikasi` enum('Belum Verifikasi','Diizinkan','Tidak Diizinkan') NOT NULL,
  `keterangan` text NOT NULL,
  `alasan_tolak_renja` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `status_forum_skpd` enum('Terima','Tolak') NOT NULL,
  `keterangan_forum_skpd` text NOT NULL,
  `target` varchar(111) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renja_perubahan`
--

INSERT INTO `renja_perubahan` (`id`, `status_renja`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `uraian`, `sasaran_kegiatan`, `sasaran_kegiatan_setelah_perubahan`, `lokasi_kegiatan`, `target_capaian_kinerja`, `kebutuhan_dana`, `kebutuhan_dana_setelah_perubahan`, `sumber_dana`, `created_by`, `created_date`, `mod_by`, `mod_date`, `status_verifikasi`, `keterangan`, `alasan_tolak_renja`, `tahun`, `kecamatan`, `kelurahan`, `status_forum_skpd`, `keterangan_forum_skpd`, `target`, `foto`) VALUES
(1, 'Data Perubahan', 1, 1, 1, 5, 25, '', 'asd', '', 'Kota Pematangsiantar', '', 1231232, 0, 1, '2', '2016-07-04 13:45:46', '2', '2016-07-06 13:54:30', 'Belum Verifikasi', '', '', 2017, 1, 1, 'Terima', 'asd', '0', ''),
(2, 'Data Perubahan', 1, 1, 2, 3, 25, '', 'asd', '', 'Kota Pematangsiantar', '', 50000000, 0, 1, '2', '2016-07-04 14:06:47', '2', '2016-07-06 15:37:13', '', '', '', 2017, 1, 1, 'Terima', '', '0', ''),
(3, 'Data Perubahan', 1, 1, 1, 5, 24, '', 'sdf', '', 'Kota Pematangsiantar', '', 150000000, 0, 1, '2', '2016-07-04 22:21:13', '2', '2016-07-11 01:15:02', 'Tidak Diizinkan', 'as', 'asdasd', 2017, 1, 1, 'Terima', '0000-00-00', '0', ''),
(4, 'Data Perubahan', 1, 1, 1, 1, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 250000000, 0, 1, '2', '2016-07-04 22:25:34', '2', '2016-07-06 15:33:24', '', '', '', 2017, 0, 0, 'Terima', 'asdasd', '0', ''),
(5, 'Data Perubahan', 1, 1, 2, 2, 24, '', 'Sasaran Kegiatan *', '', 'Kota Pematangsiantar', '', 150000000, 0, 1, '2', '2016-07-04 22:58:26', '2', '2016-07-05 00:33:54', 'Tidak Diizinkan', '', '', 2017, 1, 1, 'Terima', '0000-00-00', '0', ''),
(6, 'Data Perubahan', 1, 1, 2, 2, 24, '', 'Sasaran Kegiatan *', '', 'Kota Pematangsiantar', '', 150000000, 0, 1, '2', '2016-07-04 22:58:40', '2', '2016-07-05 00:49:03', 'Tidak Diizinkan', '', 'asdasd', 2017, 1, 1, 'Terima', '0000-00-00', '0', ''),
(7, 'Data Perubahan', 1, 1, 1, 6, 24, '', 'asdas', '', 'Kota Pematangsiantar', '', 21500000, 0, 1, '2', '2016-07-04 23:11:49', '2', '2016-07-05 23:49:20', 'Tidak Diizinkan', '', '', 2017, 1, 0, 'Terima', '0000-00-00', '0', ''),
(8, 'Data Perubahan', 1, 1, 1, 6, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 17900000, 0, 1, '2', '2016-07-04 23:12:33', '2', '2016-07-05 23:49:40', 'Tidak Diizinkan', '', '', 2017, 0, 0, 'Terima', '0000-00-00', '0', ''),
(9, 'Data Perubahan', 1, 1, 1, 6, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 17900000, 0, 1, '2', '2016-07-04 23:13:49', '', '0000-00-00 00:00:00', 'Belum Verifikasi', '', '', 2017, 0, 0, 'Terima', '0000-00-00', '0', ''),
(10, 'Data Perubahan', 1, 1, 1, 6, 24, '', 'asd', '', 'Kota Pematangsiantar', '', 17900000, 0, 1, '2', '2016-07-04 23:13:55', '', '0000-00-00 00:00:00', 'Belum Verifikasi', '', '', 2017, 0, 0, 'Terima', '0000-00-00', '0', ''),
(11, 'Data Perubahan', 1, 1, 1, 5, 24, 'Pembuatan gorong-gorong Desa sitio tio', 'asd', '', 'Kota Pematangsiantar', '', 123123123123, 0, 1, '2', '2016-07-06 15:41:42', '2', '2016-07-06 19:27:35', 'Diizinkan', '', '', 2017, 0, 0, 'Terima', '', '0', ''),
(12, 'Data Perubahan', 1, 1, 2, 2, 24, '', 'Sasaran Kegiatan *', '', 'Kota Pematangsiantar', '', 150000000, 210000000, 1, '2', '2016-07-11 01:03:49', '', '0000-00-00 00:00:00', 'Belum Verifikasi', '', '', 2017, 1, 1, 'Terima', '', '0', ''),
(14, 'Data Perubahan', 1, 1, 1, 1, 24, 'sad', 'asdas', '', 'Kota Pematangsiantar', '', 123000000, 210000000, 1, '2', '2016-07-11 01:14:16', '', '0000-00-00 00:00:00', 'Belum Verifikasi', '', '', 2017, 1, 1, 'Terima', '', '0', ''),
(15, 'Data Perubahan', 1, 1, 1, 1, 24, 'sad', 'asdas', '', 'Kota Pematangsiantar', '', 123000000, 210000000, 1, '2', '2016-07-11 01:14:46', '', '0000-00-00 00:00:00', 'Belum Verifikasi', 'asd', '', 2017, 1, 1, 'Terima', '', '0', ''),
(16, 'Data Perubahan', 1, 1, 1, 1, 24, 'sad', 'asdas', '', 'Kota Pematangsiantar', '', 123000000, 150000000, 1, '2', '2016-07-11 01:20:49', '', '0000-00-00 00:00:00', 'Belum Verifikasi', 'asd', '', 2017, 1, 1, 'Terima', '', '0', ''),
(17, 'Data Baru', 1, 1, 1, 1, 27, '', 'asd', '', 'Kota Pematangsiantar', '', 0, 140000000, 1, '2', '2016-07-11 01:22:15', '', '0000-00-00 00:00:00', 'Belum Verifikasi', 'asd', '', 2017, 1, 1, 'Terima', '', '0', ''),
(18, 'Data Baru', 1, 1, 1, 1, 24, 'asdsad', 'asd', '', 'Kota Pematangsiantar', '', 0, 14000000, 1, '2', '2016-07-11 01:27:11', '2', '2016-07-11 01:28:13', 'Belum Verifikasi', 'asdsd', '', 2017, 2, 0, 'Terima', '', 'asd', ''),
(19, 'Data Baru', 1, 1, 1, 1, 24, 'sad', 'asdasd', '', 'Kota Pematangsiantar', '', 100000000, 120000000, 3, '2', '2016-07-15 11:19:05', '', '0000-00-00 00:00:00', 'Belum Verifikasi', '', '', 2020, 1, 0, 'Terima', '', '100', '');

-- --------------------------------------------------------

--
-- Table structure for table `renstra`
--

CREATE TABLE IF NOT EXISTS `renstra` (
  `tujuan` text NOT NULL,
  `id` bigint(20) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `sasaran_pembangunan` int(11) NOT NULL,
  `indikator_sasaran` text NOT NULL,
  `kode` varchar(100) NOT NULL,
  `indikator_kinerja_program_dan_kegiatan` text NOT NULL COMMENT 'Indikator Kinerja Program (outcome) dan Kegiatan (output)',
  `capaian_tahun_awal` text NOT NULL COMMENT 'Data Capaian pada Tahun Awal Perencanaan',
  `target_tahun_1` text NOT NULL,
  `pagu_tahun_1` bigint(20) NOT NULL,
  `target_tahun_2` text NOT NULL,
  `pagu_tahun_2` bigint(20) NOT NULL,
  `target_tahun_3` text NOT NULL,
  `pagu_tahun_3` bigint(20) NOT NULL,
  `target_tahun_4` text NOT NULL,
  `pagu_tahun_4` bigint(20) NOT NULL,
  `target_tahun_5` text NOT NULL,
  `pagu_tahun_5` bigint(20) NOT NULL,
  `target_akhir` text NOT NULL,
  `pagu_akhir` bigint(20) NOT NULL,
  `lokasi` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `tahun_perencanaan` int(11) NOT NULL,
  `id_rpjmd` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renstra`
--

INSERT INTO `renstra` (`tujuan`, `id`, `urusan`, `bidang`, `program`, `kegiatan`, `skpd`, `sasaran_pembangunan`, `indikator_sasaran`, `kode`, `indikator_kinerja_program_dan_kegiatan`, `capaian_tahun_awal`, `target_tahun_1`, `pagu_tahun_1`, `target_tahun_2`, `pagu_tahun_2`, `target_tahun_3`, `pagu_tahun_3`, `target_tahun_4`, `pagu_tahun_4`, `target_tahun_5`, `pagu_tahun_5`, `target_akhir`, `pagu_akhir`, `lokasi`, `created_by`, `created_date`, `mod_by`, `mod_date`, `tahun_perencanaan`, `id_rpjmd`, `foto`) VALUES
('asd', 1, 1, 1, 1, 1, 24, 1, 'asd', '', 'asdsd', '', '', 240000000, '', 250000000, '', 140000000, '', 250000000, '', 145000000, '', 350000000, 'asds', '2', '2016-07-03 12:07:56', '2', '2016-07-19 16:41:59', 2017, 1, ''),
('asd', 2, 1, 1, 1, 1, 10, 1, 'asd', '', 'asd', '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, 'asd', '3', '2016-07-04 01:40:52', '', '0000-00-00 00:00:00', 2017, 0, ''),
('df', 3, 1, 1, 1, 1, 24, 1, 'sdf', '', 'sdf', '', '', 123123, '', 3123, '', 123123, '', 1231, '', 3123123, '', 0, 'sd', '2', '2016-07-06 00:15:35', '2', '2016-07-19 16:42:13', 2017, 1, ''),
('asdas', 4, 1, 1, 1, 6, 24, 3, 'asdasd', '', 'asdasd', '', '', 1000000000, '', 1200000000, '', 1200000000, '', 1300000000, '', 1430000000, '', 6100000000, 'Kota Pematangsiantar', '2', '2016-07-16 16:26:11', '', '0000-00-00 00:00:00', 2020, 0, ''),
('Tujuan ', 5, 1, 1, 1, 3, 25, 1, 'Indikator Sasaran', '', 'Indikator Kinerja Program (outcome) dan Kegiatan', '', '', 1000000000, '', 1400000000, '', 1200000000, '', 1100000000, '', 2100000000, '', 3000000000, 'Kota Pematangsiantar', '2', '2016-07-19 17:03:26', '', '0000-00-00 00:00:00', 2020, 1, ''),
('asd', 6, 1, 1, 51, 12, 24, 3, 'asd', '', 'asd', '', '', 34324534, '', 53453434, '', 67675433, '', 65757567, '', 98878676, '', 89789777, 'asd', '2', '2016-07-27 18:20:29', '', '0000-00-00 00:00:00', 2020, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `rka`
--

CREATE TABLE IF NOT EXISTS `rka` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `id_rekening_belanja` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `sub_uraian` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL,
  `item` text NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `level` enum('parent1','parent2','parent3','parent4','uraian','sub uraian','item') NOT NULL,
  `status_verifikasi` enum('Terima','Tolak') NOT NULL,
  `is_perubahan` int(11) NOT NULL DEFAULT '0',
  `capaian_program` text NOT NULL,
  `target_capaian_program` text NOT NULL,
  `masukan` text NOT NULL,
  `target_masukan` text NOT NULL,
  `keluaran` text NOT NULL,
  `target_keluaran` text NOT NULL,
  `hasil` text NOT NULL,
  `target_hasil` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `sumber_dana` text NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rka`
--

INSERT INTO `rka` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `id_rekening_belanja`, `skpd`, `uraian`, `sub_uraian`, `created_by`, `created_date`, `mod_by`, `mod_date`, `parent_id`, `parentCategory`, `item`, `volume`, `satuan`, `harga_satuan`, `level`, `status_verifikasi`, `is_perubahan`, `capaian_program`, `target_capaian_program`, `masukan`, `target_masukan`, `keluaran`, `target_keluaran`, `hasil`, `target_hasil`, `sasaran_kegiatan`, `sumber_dana`, `lokasi_kegiatan`, `pagu_prakiraan_maju`) VALUES
(76, 2017, 1, 1, 2, 2, 1, 24, '', '', '2', '2016-07-13 01:53:22', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(77, 2017, 1, 1, 2, 2, 2, 24, '', '', '2', '2016-07-13 01:53:22', '', '0000-00-00 00:00:00', 76, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(78, 2017, 1, 1, 2, 2, 3, 24, '', '', '2', '2016-07-13 01:53:22', '', '0000-00-00 00:00:00', 77, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(79, 2017, 1, 1, 2, 2, 4, 24, '', '', '2', '2016-07-13 01:53:22', '', '0000-00-00 00:00:00', 78, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(80, 2017, 1, 1, 2, 2, 7, 24, '', '', '2', '2016-07-13 01:53:22', '', '0000-00-00 00:00:00', 79, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(81, 2017, 1, 1, 2, 2, 7, 24, '', 'dsdf', '2', '2016-07-13 01:53:31', '', '0000-00-00 00:00:00', 80, 0, '', 0, '', 0, 'sub uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(82, 2017, 1, 1, 1, 1, 1, 24, '', '', '2', '2016-07-13 02:01:39', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(83, 2017, 1, 1, 1, 1, 2, 24, '', '', '2', '2016-07-13 02:01:39', '', '0000-00-00 00:00:00', 82, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(55, 2017, 1, 1, 2, 3, 1, 24, '', '', '2', '2016-07-12 23:50:56', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(56, 2017, 1, 1, 2, 3, 2, 24, '', '', '2', '2016-07-12 23:50:56', '', '0000-00-00 00:00:00', 55, 0, '', 5, '', 500000, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(57, 2017, 1, 1, 2, 3, 3, 24, '', '', '2', '2016-07-12 23:50:56', '', '0000-00-00 00:00:00', 56, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(58, 2017, 1, 1, 2, 3, 4, 24, '', '', '2', '2016-07-12 23:50:56', '', '0000-00-00 00:00:00', 57, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(59, 2017, 1, 1, 2, 3, 13, 24, '', '', '2', '2016-07-12 23:50:56', '', '0000-00-00 00:00:00', 58, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(84, 2017, 1, 1, 1, 1, 3, 24, '', '', '2', '2016-07-13 02:01:39', '', '0000-00-00 00:00:00', 83, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(62, 2017, 1, 1, 1, 5, 1, 25, '', '', '2', '2016-07-13 00:16:10', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(63, 2017, 1, 1, 1, 5, 2, 25, '', '', '2', '2016-07-13 00:16:10', '', '0000-00-00 00:00:00', 62, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(64, 2017, 1, 1, 1, 5, 3, 25, '', '', '2', '2016-07-13 00:16:10', '', '0000-00-00 00:00:00', 63, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(65, 2017, 1, 1, 1, 5, 4, 25, '', '', '2', '2016-07-13 00:16:10', '', '0000-00-00 00:00:00', 64, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(66, 2017, 1, 1, 1, 5, 12, 25, '', '', '2', '2016-07-13 00:16:10', '', '0000-00-00 00:00:00', 65, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(67, 2017, 1, 1, 1, 5, 12, 25, '', '', '2', '2016-07-13 00:16:33', '', '0000-00-00 00:00:00', 65, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(68, 2017, 1, 1, 2, 4, 1, 25, '', '', '2', '2016-07-13 00:17:45', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(69, 2017, 1, 1, 2, 4, 2, 25, '', '', '2', '2016-07-13 00:17:45', '', '0000-00-00 00:00:00', 68, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(70, 2017, 1, 1, 2, 4, 3, 25, '', '', '2', '2016-07-13 00:17:45', '', '0000-00-00 00:00:00', 69, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(71, 2017, 1, 1, 2, 4, 4, 25, '', '', '2', '2016-07-13 00:17:45', '', '0000-00-00 00:00:00', 70, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(72, 2017, 1, 1, 2, 4, 15, 25, '', '', '2', '2016-07-13 00:17:45', '', '0000-00-00 00:00:00', 71, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(85, 2017, 1, 1, 1, 1, 4, 24, '', '', '2', '2016-07-13 02:01:39', '', '0000-00-00 00:00:00', 84, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(86, 2017, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-13 02:01:39', '', '0000-00-00 00:00:00', 85, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(87, 2017, 1, 1, 1, 1, 8, 24, '', 'asd', '2', '2016-07-13 02:01:47', '', '0000-00-00 00:00:00', 86, 0, '', 0, '', 0, 'sub uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(88, 2017, 1, 1, 1, 1, 8, 24, '', '', '2', '2016-07-13 02:01:59', '', '0000-00-00 00:00:00', 87, 0, 'ad', 12, 'asd', 123123232, 'item', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(89, 2020, 1, 1, 2, 4, 1, 27, '', '', '2', '2016-07-15 08:39:25', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '100', '', '', '', '', '', '', '', '', '', 100000000),
(90, 2020, 1, 1, 2, 4, 2, 27, '', '', '2', '2016-07-15 08:39:25', '', '0000-00-00 00:00:00', 89, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(91, 2020, 1, 1, 2, 4, 3, 27, '', '', '2', '2016-07-15 08:39:25', '', '0000-00-00 00:00:00', 90, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(92, 2020, 1, 1, 2, 4, 4, 27, '', '', '2', '2016-07-15 08:39:25', '', '0000-00-00 00:00:00', 91, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(93, 2020, 1, 1, 2, 4, 13, 27, '', '', '2', '2016-07-15 08:39:25', '', '0000-00-00 00:00:00', 92, 0, '', 0, '', 0, 'uraian', 'Terima', 0, 'asdasd', '100', '', '', '', '', '', '', '', '', '', 0),
(94, 2020, 1, 1, 1, 6, 1, 24, '', '', '2', '2016-07-15 10:36:36', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(95, 2020, 1, 1, 1, 6, 2, 24, '', '', '2', '2016-07-15 10:36:36', '', '0000-00-00 00:00:00', 94, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(96, 2020, 1, 1, 1, 6, 3, 24, '', '', '2', '2016-07-15 10:36:36', '', '0000-00-00 00:00:00', 95, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(97, 2020, 1, 1, 1, 6, 4, 24, '', '', '2', '2016-07-15 10:36:36', '', '0000-00-00 00:00:00', 96, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(98, 2020, 1, 1, 1, 6, 15, 24, '', '', '2', '2016-07-15 10:36:36', '', '0000-00-00 00:00:00', 97, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(99, 2020, 1, 1, 1, 6, 11, 24, '', '', '2', '2016-07-16 01:12:59', '', '0000-00-00 00:00:00', 97, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(100, 2020, 1, 1, 1, 6, 15, 24, '', 'asdasd', '2', '2016-07-16 01:13:10', '', '0000-00-00 00:00:00', 98, 0, '', 0, '', 0, 'sub uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(101, 2020, 1, 1, 1, 6, 15, 24, '', '', '2', '2016-07-16 01:13:25', '', '0000-00-00 00:00:00', 100, 0, 'asd', 2, 'kg', 2100000, 'item', 'Tolak', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(102, 2020, 1, 1, 1, 5, 1, 24, '', '', '2', '2016-07-16 03:01:17', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 0, 'Terbagi rata', '', '', '', '', '', '', '', '', '', 'Kota Pematangsiantar', 180000000),
(103, 2020, 1, 1, 1, 5, 2, 24, '', '', '2', '2016-07-16 03:01:17', '', '0000-00-00 00:00:00', 102, 0, '', 0, '', 0, 'parent2', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(104, 2020, 1, 1, 1, 5, 3, 24, '', '', '2', '2016-07-16 03:01:17', '', '0000-00-00 00:00:00', 103, 0, '', 0, '', 0, 'parent3', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(105, 2020, 1, 1, 1, 5, 4, 24, '', '', '2', '2016-07-16 03:01:17', '', '0000-00-00 00:00:00', 104, 0, '', 0, '', 0, 'parent4', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(106, 2020, 1, 1, 1, 5, 10, 24, '', '', '2', '2016-07-16 03:01:17', '', '0000-00-00 00:00:00', 105, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(107, 2020, 1, 1, 1, 5, 10, 24, '', 'Beras Kencur', '2', '2016-07-16 03:01:27', '', '0000-00-00 00:00:00', 106, 0, '', 0, '', 0, 'sub uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(108, 2020, 1, 1, 1, 5, 10, 24, '', '', '2', '2016-07-16 03:01:48', '', '0000-00-00 00:00:00', 107, 0, 'Jatah Pegawai', 120, 'kg', 9000, 'item', 'Tolak', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(109, 2020, 1, 1, 1, 5, 5, 24, '', '', '2', '2016-07-16 03:05:16', '', '0000-00-00 00:00:00', 105, 0, '', 0, '', 0, 'uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(110, 2020, 1, 1, 1, 5, 5, 24, '', 'asdsad', '2', '2016-07-16 03:05:24', '', '0000-00-00 00:00:00', 109, 0, '', 0, '', 0, 'sub uraian', 'Terima', 0, '', '', '', '', '', '', '', '', '', '', '', 0),
(111, 2020, 1, 1, 1, 5, 5, 24, '', '', '2', '2016-07-16 03:05:40', '', '0000-00-00 00:00:00', 110, 0, 'Gaji', 100, 'ob', 3000000, 'item', 'Tolak', 0, '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rka_perubahan`
--

CREATE TABLE IF NOT EXISTS `rka_perubahan` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `urusan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `kegiatan` int(11) NOT NULL,
  `id_rekening_belanja` int(11) NOT NULL,
  `skpd` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `sub_uraian` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentCategory` int(11) NOT NULL,
  `item` text NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga_satuan` bigint(20) NOT NULL,
  `level` enum('parent1','parent2','parent3','parent4','uraian','sub uraian','item') NOT NULL,
  `status_verifikasi` enum('Terima','Tolak') NOT NULL,
  `capaian_program` text NOT NULL,
  `target_capaian_program` text NOT NULL,
  `masukan` text NOT NULL,
  `target_masukan` text NOT NULL,
  `keluaran` text NOT NULL,
  `target_keluaran` text NOT NULL,
  `hasil` text NOT NULL,
  `target_hasil` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `sumber_dana` text NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rka_perubahan`
--

INSERT INTO `rka_perubahan` (`id`, `tahun`, `urusan`, `bidang`, `program`, `kegiatan`, `id_rekening_belanja`, `skpd`, `uraian`, `sub_uraian`, `created_by`, `created_date`, `mod_by`, `mod_date`, `parent_id`, `parentCategory`, `item`, `volume`, `satuan`, `harga_satuan`, `level`, `status_verifikasi`, `capaian_program`, `target_capaian_program`, `masukan`, `target_masukan`, `keluaran`, `target_keluaran`, `hasil`, `target_hasil`, `sasaran_kegiatan`, `sumber_dana`, `lokasi_kegiatan`, `pagu_prakiraan_maju`) VALUES
(8, 2017, 1, 1, 2, 3, 1, 24, '', '', '2', '2016-07-13 00:38:51', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(9, 2017, 1, 1, 2, 3, 2, 24, '', '', '2', '2016-07-13 00:38:51', '', '0000-00-00 00:00:00', 8, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(10, 2017, 1, 1, 2, 3, 3, 24, '', '', '2', '2016-07-13 00:38:51', '', '0000-00-00 00:00:00', 9, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(11, 2017, 1, 1, 2, 3, 4, 24, '', '', '2', '2016-07-13 00:38:51', '', '0000-00-00 00:00:00', 10, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(12, 2017, 1, 1, 2, 3, 8, 24, '', '', '2', '2016-07-13 00:38:51', '', '0000-00-00 00:00:00', 11, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(13, 2017, 1, 1, 2, 3, 8, 24, '', '', '2', '2016-07-13 00:39:38', '', '0000-00-00 00:00:00', 11, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(24, 2017, 1, 1, 2, 3, 8, 24, '', 'asdasd', '2', '2016-07-13 01:56:38', '', '0000-00-00 00:00:00', 13, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(25, 2017, 1, 1, 2, 3, 8, 24, '', '', '2', '2016-07-13 01:56:48', '', '0000-00-00 00:00:00', 24, 0, 'asd', 23, 'asd', 123123, 'item', 'Tolak', '', '', '', '', '', '', '', '', '', '', '', 0),
(26, 2020, 1, 1, 2, 3, 1, 24, '', '', '2', '2016-07-15 10:39:55', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 2000000),
(27, 2020, 1, 1, 2, 3, 2, 24, '', '', '2', '2016-07-15 10:39:55', '', '0000-00-00 00:00:00', 26, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(28, 2020, 1, 1, 2, 3, 3, 24, '', '', '2', '2016-07-15 10:39:55', '', '0000-00-00 00:00:00', 27, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(29, 2020, 1, 1, 2, 3, 4, 24, '', '', '2', '2016-07-15 10:39:55', '', '0000-00-00 00:00:00', 28, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(30, 2020, 1, 1, 2, 3, 26, 24, '', '', '2', '2016-07-15 10:39:55', '', '0000-00-00 00:00:00', 29, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 120000),
(31, 2020, 1, 1, 2, 4, 1, 24, '', '', '2', '2016-07-15 10:58:39', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(32, 2020, 1, 1, 2, 4, 2, 24, '', '', '2', '2016-07-15 10:58:39', '', '0000-00-00 00:00:00', 31, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(33, 2020, 1, 1, 2, 4, 3, 24, '', '', '2', '2016-07-15 10:58:39', '', '0000-00-00 00:00:00', 32, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(34, 2020, 1, 1, 2, 4, 4, 24, '', '', '2', '2016-07-15 10:58:39', '', '0000-00-00 00:00:00', 33, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(35, 2020, 1, 1, 2, 4, 13, 24, '', '', '2', '2016-07-15 10:58:39', '', '0000-00-00 00:00:00', 34, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(36, 2020, 1, 1, 2, 4, 13, 24, '', 'asdasd', '2', '2016-07-15 10:58:50', '', '0000-00-00 00:00:00', 35, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(37, 2020, 1, 1, 2, 4, 13, 24, '', '', '2', '2016-07-15 10:59:05', '', '0000-00-00 00:00:00', 36, 0, 'asd', 12, 'asd', 1212121, 'item', 'Tolak', '', '', '', '', '', '', '', '', '', '', '', 0),
(38, 2020, 1, 1, 1, 6, 1, 24, '', '', '2', '2016-07-16 01:13:45', '', '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 'parent1', 'Terima', 'Mahua', '', '', '', '', '', '', '', '', '', '', 120000000),
(39, 2020, 1, 1, 1, 6, 2, 24, '', '', '2', '2016-07-16 01:13:45', '', '0000-00-00 00:00:00', 38, 0, '', 0, '', 0, 'parent2', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(40, 2020, 1, 1, 1, 6, 3, 24, '', '', '2', '2016-07-16 01:13:45', '', '0000-00-00 00:00:00', 39, 0, '', 0, '', 0, 'parent3', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(41, 2020, 1, 1, 1, 6, 4, 24, '', '', '2', '2016-07-16 01:13:45', '', '0000-00-00 00:00:00', 40, 0, '', 0, '', 0, 'parent4', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(42, 2020, 1, 1, 1, 6, 12, 24, '', '', '2', '2016-07-16 01:13:45', '', '0000-00-00 00:00:00', 41, 0, '', 0, '', 0, 'uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(43, 2020, 1, 1, 1, 6, 12, 24, '', 'asd asd', '2', '2016-07-16 01:13:52', '', '0000-00-00 00:00:00', 42, 0, '', 0, '', 0, 'sub uraian', 'Terima', '', '', '', '', '', '', '', '', '', '', '', 0),
(44, 2020, 1, 1, 1, 6, 12, 24, '', '', '2', '2016-07-16 01:14:03', '', '0000-00-00 00:00:00', 43, 0, 'asd', 2, 'ad', 25000000, 'item', 'Tolak', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rpjmd`
--

CREATE TABLE IF NOT EXISTS `rpjmd` (
  `id` int(11) NOT NULL,
  `tahun_rpjmd` int(100) NOT NULL,
  `visi` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpjmd`
--

INSERT INTO `rpjmd` (`id`, `tahun_rpjmd`, `visi`, `keterangan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 2015, 'Pematangsiantar Mantap, Maju, dan Jaya', '<p><!--[if gte mso 9]><xml>\r\n <o:OfficeDocumentSettings>\r\n  <o:RelyOnVML/>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]--></p><p><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val="Cambria Math"/>\r\n   <m:brkBin m:val="before"/>\r\n   <m:brkBinSub m:val="&#45;-"/>\r\n   <m:smallFrac m:val="off"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val="0"/>\r\n   <m:rMargin m:val="0"/>\r\n   <m:defJc m:val="centerGroup"/>\r\n   <m:wrapIndent m:val="1440"/>\r\n   <m:intLim m:val="subSup"/>\r\n   <m:naryLim m:val="undOvr"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"\r\n  DefSemiHidden="true" DefQFormat="false" DefPriority="99"\r\n  LatentStyleCount="267">\r\n  <w:LsdException Locked="false" Priority="0" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>\r\n  <w:LsdException Locked="false" Priority="9" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>\r\n  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>\r\n  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>\r\n  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>\r\n  <w:LsdException Locked="false" Priority="10" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Title"/>\r\n  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>\r\n  <w:LsdException Locked="false" Priority="11" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>\r\n  <w:LsdException Locked="false" Priority="22" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>\r\n  <w:LsdException Locked="false" Priority="20" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="59" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Table Grid"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>\r\n  <w:LsdException Locked="false" Priority="1" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>\r\n  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>\r\n  <w:LsdException Locked="false" Priority="34" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>\r\n  <w:LsdException Locked="false" Priority="29" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>\r\n  <w:LsdException Locked="false" Priority="30" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>\r\n  <w:LsdException Locked="false" Priority="60" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="61" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="62" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="63" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="64" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="65" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="66" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="67" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="68" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="69" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="70" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Dark List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="71" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="72" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="73" SemiHidden="false"\r\n   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>\r\n  <w:LsdException Locked="false" Priority="19" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="21" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>\r\n  <w:LsdException Locked="false" Priority="31" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>\r\n  <w:LsdException Locked="false" Priority="32" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>\r\n  <w:LsdException Locked="false" Priority="33" SemiHidden="false"\r\n   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>\r\n  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>\r\n  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;\r\n	mso-para-margin:0cm;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman","serif";}\r\n</style>\r\n<![endif]--></p><p class="MsoNormal"><span lang="SV" style="mso-ansi-language:SV">Makna Visi tersebut adalah :</span></p><p class="MsoNormal"><span lang="SV" style="mso-ansi-language:SV">&nbsp;</span></p><table class="MsoNormalTable" style="border-collapse:collapse;mso-yfti-tbllook:480;mso-padding-alt:0cm 5.4pt 0cm 5.4pt" border="0" cellpadding="0" cellspacing="0"><tbody><tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes"><td style="width:94.8pt;padding:0cm 5.4pt 0cm 5.4pt" valign="top" width="126"><p class="MsoNormal" style="text-align:justify;line-height:150%"><strong style="mso-bidi-font-weight:normal"><span lang="SV" style="mso-ansi-language:SV">MANTAP <span style="mso-tab-count:1">&nbsp;&nbsp;&nbsp;&nbsp; </span>:</span></strong></p></td><td style="width:335.55pt;padding:0cm 5.4pt 0cm 5.4pt" valign="top" width="447"><p class="MsoNormal" style="text-align:justify;line-height:150%"><span lang="SV" style="mso-ansi-language:SV">dalam arti bahwa semua potensi daerah baik sumber daya alam maupun sumber daya manusia dalam keadaan stabil sehingga mampu memberikan andil dalam pembangunan daerah.</span></p></td></tr><tr style="mso-yfti-irow:1"><td style="width:94.8pt;padding:0cm 5.4pt 0cm 5.4pt" valign="top" width="126"><p class="MsoNormal" style="text-align:justify;line-height:150%"><strong style="mso-bidi-font-weight:normal"><span lang="SV" style="font-variant:small-caps; mso-ansi-language:SV">MAJU</span></strong><strong style="mso-bidi-font-weight:normal"><span lang="SV" style="mso-ansi-language:SV"> <span style="mso-tab-count:1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:</span></strong></p></td><td style="width:335.55pt;padding:0cm 5.4pt 0cm 5.4pt" valign="top" width="447"><p class="MsoNormal" style="text-align:justify;line-height:150%"><span lang="SV" style="mso-ansi-language:SV">dalam arti kinerja pembangunan daerah ditandai oleh adanya laju pertumbuhan dan peningkatan grafik di sektor-sektor prioritas yang secara langsung berdampak positif bagi peningkatan kualitas kehidupan serta penguatan posisi daya saing ekonomi, sosial dan budaya masyarakat kota Pematangsiantar secara berkelanjutan.</span></p></td></tr><tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes;height:99.2pt"><td style="width:94.8pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n  height:99.2pt" valign="top" width="126"><p class="MsoNormal" style="text-align:justify;line-height:150%"><strong style="mso-bidi-font-weight:normal"><span lang="SV" style="font-variant:small-caps; mso-ansi-language:SV">JAYA<span style="mso-tab-count:2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>:</span></strong></p></td><td style="width:335.55pt;padding:0cm 5.4pt 0cm 5.4pt;\r\n  height:99.2pt" valign="top" width="447"><p class="MsoNormal" style="text-align:justify;line-height:150%"><span lang="SV" style="mso-ansi-language:SV">dalam arti hasil pembangunan daerah yang telah dilaksanakan oleh pemerintah kota dan masyarakat<span style="mso-spacerun:yes">&nbsp; </span>Pematangsiantar<span style="mso-spacerun:yes">&nbsp; </span>berhasil dengan<span style="mso-spacerun:yes">&nbsp;&nbsp; </span>sukses sesuai dengan target-target yang ditetapkan dalam kinerja pembangunan.</span></p></td></tr></tbody></table>', '2016-06-30 14:04:19', '2', '0000-00-00 00:00:00', ''),
(3, 2010, 'gh', '', '2016-07-27 11:27:09', '2', '0000-00-00 00:00:00', ''),
(4, 2018, 'MAkmur', '', '2016-07-29 10:31:54', '2', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sasaran_daerah`
--

CREATE TABLE IF NOT EXISTS `sasaran_daerah` (
  `id` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `misi` bigint(20) NOT NULL,
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sasaran_daerah`
--

INSERT INTO `sasaran_daerah` (`id`, `tahun`, `misi`, `sasaran_daerah`, `prioritas_daerah`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 2014, 1, 'Meningkatkan kinerja PNS/THL di lingkungan Pemerintah Kota Pematangsiantar', 3, '2016-06-30 14:23:11', '2', '2016-07-13 23:12:24', '2'),
(2, 2014, 1, 'Terwujudnya pemerintahan yang responsif, transparan dan akuntabel', 3, '2016-07-07 23:07:27', '2', '0000-00-00 00:00:00', ''),
(3, 2014, 1, 'Meningkatnya angka melek huruf (AMH), yaitu proporsi penduduk berusia 15 tahun keatas yang dapat membaca dan menulis dalam huruf latin atau lainnya, sehingga mencapai nilai maksimum 99,80%', 4, '2016-07-07 23:08:36', '2', '0000-00-00 00:00:00', ''),
(4, 2017, 1, 'Meningkatnya angka rata-rata lama sekolah, yaitu rata-rata jumlah tahun yang dihabiskan oleh penduduk usia 15 tahun ke atas untuk menempuh semua jenis pendidikan formal yang pernah dijalani, menjadi + 12 tahun', 4, '2016-08-01 16:08:25', '2', '0000-00-00 00:00:00', ''),
(5, 2017, 1, 'asd', 3, '2016-08-06 10:39:04', '2', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun_aktif` year(4) NOT NULL,
  `triwulan_aktif` enum('Triwulan I','Triwulan II','Triwulan III','Triwulan IV') NOT NULL,
  `nama_kepala_badan` varchar(255) NOT NULL,
  `nip_kepala_badan` varchar(255) NOT NULL,
  `pangkat_kepala_badan` varchar(255) NOT NULL,
  `ijinkan_input_dpa_murni` enum('Ya','Tidak') NOT NULL,
  `ijinkan_input_dpa_perubahan` enum('Ya','Tidak') NOT NULL,
  `ijinkan_perubahan_renja` enum('Ya','Tidak') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama`, `tahun_aktif`, `triwulan_aktif`, `nama_kepala_badan`, `nip_kepala_badan`, `pangkat_kepala_badan`, `ijinkan_input_dpa_murni`, `ijinkan_input_dpa_perubahan`, `ijinkan_perubahan_renja`) VALUES
(1, 'Sistem Informasi Pelaporan Keuangan dan Evaluasi RKPD Kabupaten Mandailing Natal', 2015, 'Triwulan I', 'Abu Hanifah, SH', '19610220 198603 1 002', 'Pembina Utama Muda', 'Ya', 'Ya', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE IF NOT EXISTS `skpd` (
  `id` int(11) NOT NULL,
  `bidang_urusan` int(11) NOT NULL,
  `kode` varchar(111) NOT NULL,
  `nama_skpd` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `nama_penanda_tangan_dokumen` varchar(255) NOT NULL,
  `nip_penanda_tangan_dokumen` varchar(255) NOT NULL,
  `pangkat_penanda_tangan_dokumen` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`id`, `bidang_urusan`, `kode`, `nama_skpd`, `alamat`, `no_telp`, `nama_penanda_tangan_dokumen`, `nip_penanda_tangan_dokumen`, `pangkat_penanda_tangan_dokumen`) VALUES
(1, 1, '01', 'SEKRETARIAT DAERAH KABUPATEN', '-', '-', 'asd', 'asda', 'asd'),
(2, 0, '', 'BAGIAN TATA PEMERINTAHAN UMUM', '-', '-', '', '', ''),
(3, 0, '', 'BAGIAN HUKUM DAN ORGANISASI', '-', '-', '', '', ''),
(4, 0, '', 'BAGIAN PEREKONOMIAN', '-', '-', '', '', ''),
(5, 0, '', 'BAGIAN KESEJAHTERAAN RAKYAT', '-', '-', '', '', ''),
(6, 0, '', 'BAGIAN LAYANAN PENGADAAN BARANG DAN JASA', '-', '-', '', '', ''),
(7, 0, '', 'BAGIAN UMUM', '-', '-', '', '', ''),
(8, 0, '', 'BAGIAN HUMAS DAN PROTOKOLER', '-', '-', '', '', ''),
(9, 0, '', 'SEKRETARIAT DPRD', '-', '-', '', '', ''),
(10, 0, '', 'DINAS PENDIDIKAN', '-', '-', '', '', ''),
(11, 0, '', 'DINAS KESEHATAN', '-', '-', '', '', ''),
(12, 0, '', 'DINAS KEPENDUDUKAN CATATAN SIPIL, SOSIAL TENAGA KERJA DAN TRANSMIGRASI', '-', '-', '', '', ''),
(13, 0, '', 'DINAS PEKERJAAN UMUM', '-', '-', '', '', ''),
(14, 0, '', 'DINAS PERTAMBANGAN ENERGI', '-', '-', '', '', ''),
(15, 0, '', 'DINAS PERINDAG, KOPERASI UMUM DAN PASAR', '-', '-', '', '', ''),
(16, 0, '', 'DINAS PERTANIAN', '-', '-', '', '', ''),
(17, 0, '', 'DINAS KELAUTAN DAN PERIKANAN', '-', '-', '', '', ''),
(18, 0, '', 'DINAS PEMUDA DAN OLAHRAGA, KEBUDAYAAN DAN PARIWISATA', '-', '-', '', '', ''),
(19, 0, '', 'DINAS PERHUBUNGAN DAN INFORMATIKA', '-', '-', '', '', ''),
(20, 0, '', 'DINAS KEHUTANAN DAN PERKEBUNAN', '-', '-', '', '', ''),
(21, 0, '', 'DINAS PENGELOLAAN KEUANGAN DAN ASET DAERAH', '-', '-', '', '', ''),
(22, 0, '', 'INSPEKTORAT', '-', '-', '', '', ''),
(23, 1, '', 'BAPPEDA', '-', '-', 'Ir. Renward Simanjuntak', '13232124343', 'PEMBINA'),
(24, 0, '', 'BADAN KEPEGAWAIAN DAERAH', '-', '-', '', '', ''),
(25, 0, '', 'BADAN LINGKUNGAN HIDUP, KEBERSIHAN DAN PERTAMANAN', '-', '-', 'asd', '123123123123123', 'Penata Muda Tingkat I'),
(26, 0, '', 'BLU STAIM', '-', '-', '', '', ''),
(27, 0, '', 'BADAN PEMBERDAYAAN MASYARAKAT', '-', '-', '', '', ''),
(28, 0, '', 'BADAN PELAKSANAAN PENYULUHAN DAN KETAHANAN PANGAN', '-', '-', '', '', ''),
(29, 0, '', 'KANTOR PERPUSTAKAAN DAN ARSIP DAERAH', '-', '-', '', '', ''),
(30, 0, '', 'KANTOR PUSAT PENANGGULANGAN MALARIA', '-', '-', '', '', ''),
(31, 0, '', 'KANTOR KESBANG LINMAS', '-', '-', '', '', ''),
(32, 0, '', 'KANTOR PEMBERDAYAAN PEREMPUAN, PERLINDUNGAN ANAK DAN KB', '-', '-', '', '', ''),
(33, 0, '', 'RSUD PENYABUNGAN', '-', '-', '', '', ''),
(34, 0, '', 'RSUD NATAL', '-', '-', '', '', ''),
(35, 0, '', 'KANTOR LATIHAN KERJA', '-', '-', '', '', ''),
(36, 0, '', 'SATUAN POLISI PAMONG PRAJA', '-', '-', '', '', ''),
(37, 0, '', 'KANTOR PELAYANAN PERIJINAN TERPADU', '-', '-', '', '', ''),
(38, 0, '', 'BADAN PENANGGULANGAN BENCANA DAERAH', '-', '-', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `spm`
--

CREATE TABLE IF NOT EXISTS `spm` (
  `id` bigint(20) NOT NULL,
  `kd_pelayanan_dasar` bigint(20) NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `nilai` int(3) NOT NULL,
  `batas_waktu` int(4) NOT NULL,
  `kd_skpd` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spm`
--

INSERT INTO `spm` (`id`, `kd_pelayanan_dasar`, `indikator`, `nilai`, `batas_waktu`, `kd_skpd`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 1, 'Cakupan Kunjungan Ibu Hamil K4', 95, 2015, 11, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 1, 'Cakupan Ibu hamil dengan komplikasi yang ditangani', 80, 2015, 11, '2016-08-17 04:27:51', '2', '0000-00-00 00:00:00', ''),
(3, 1, 'Cakupan pelayanan Ibu Nifas', 90, 2015, 11, '2016-08-17 04:31:51', '2', '0000-00-00 00:00:00', ''),
(4, 1, 'Cakupan neonatal  dengan komplikasi yang ditangani', 80, 2010, 11, '2016-08-17 04:32:46', '2', '0000-00-00 00:00:00', ''),
(5, 1, 'Cakupan kunjungan bayi', 90, 2010, 11, '2016-08-17 04:33:25', '2', '0000-00-00 00:00:00', ''),
(6, 1, 'Cakupan Desa/Kelurahan Universal Child Immunization (UCI).', 100, 2010, 11, '2016-08-17 04:34:05', '2', '0000-00-00 00:00:00', ''),
(7, 1, 'Cakupan pelayanan anak balita.', 90, 2010, 11, '2016-08-17 04:34:35', '2', '0000-00-00 00:00:00', ''),
(8, 1, 'Cakupan pemberian makanan pendamping ASI pada anak usia 6-24 bulan keluarga miskin.', 100, 2010, 11, '2016-08-17 04:35:05', '2', '0000-00-00 00:00:00', ''),
(9, 1, 'Cakupan Balita gizi buruk mendapat perawatan', 100, 2010, 11, '2016-08-17 04:35:46', '2', '0000-00-00 00:00:00', ''),
(10, 1, 'Cakupan penjaringan kesehatan siswa SD dan setingkat', 100, 2010, 11, '2016-08-17 04:36:18', '2', '0000-00-00 00:00:00', ''),
(11, 1, 'Cakupan peserta KB Aktif', 70, 2010, 11, '2016-08-17 04:36:45', '2', '0000-00-00 00:00:00', ''),
(12, 1, 'Cakupan pelayanan kesehatan dasar masyarakat miskin', 100, 2015, 11, '2016-08-17 04:38:05', '2', '0000-00-00 00:00:00', ''),
(13, 2, 'Cakupan pelayanan kesehatan rujukan pasien masyarakat miskin.', 100, 2015, 11, '2016-08-17 04:38:37', '2', '0000-00-00 00:00:00', ''),
(14, 2, 'Cakupan pelayanan gawat darurat level 1 yg harus diberikan sarana kesehatan (RS) di Kab/Kota.', 100, 2015, 11, '2016-08-17 04:39:10', '2', '0000-00-00 00:00:00', ''),
(15, 3, 'Cakupan Desa/Kelurahan mengalami KLB yang dilakukan penyelidikan epidemiologi <24 jam', 100, 2015, 11, '2016-08-17 04:39:43', '2', '0000-00-00 00:00:00', ''),
(16, 4, 'Cakupan Desa Siaga Aktif', 80, 2023, 11, '2016-08-17 04:40:08', '2', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE IF NOT EXISTS `sumber_dana` (
  `id` int(11) NOT NULL,
  `jenis_sumber_dana` enum('Dana Alokasi Khusus','Dana Alokasi Umum') NOT NULL,
  `sumber_dana` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `jenis_sumber_dana`, `sumber_dana`) VALUES
(1, 'Dana Alokasi Khusus', 'APBD'),
(2, 'Dana Alokasi Umum', 'APBN DAU'),
(3, 'Dana Alokasi Khusus', 'APBN DAK');

-- --------------------------------------------------------

--
-- Table structure for table `teknokratis`
--

CREATE TABLE IF NOT EXISTS `teknokratis` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) DEFAULT '0',
  `kunci` tinyint(4) DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_indikatif` bigint(20) NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_program` varchar(111) NOT NULL,
  `target_hasil_program` varchar(111) NOT NULL,
  `tolak_ukur_keluaran_kegiatan` varchar(111) NOT NULL,
  `target_keluaran_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_kegiatan` varchar(111) NOT NULL,
  `target_hasil_kegiatan` varchar(111) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status_usulan` enum('Terima','Tolak') NOT NULL,
  `keterangan_status_usulan` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_evaluasi_rkpd`
--

CREATE TABLE IF NOT EXISTS `temp_evaluasi_rkpd` (
  `id` bigint(20) NOT NULL,
  `skpd` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `urusan` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `sasaran` varchar(255) NOT NULL,
  `indikator_kinerja_program` varchar(255) NOT NULL,
  `indikator_keluaran_kegiatan` varchar(255) NOT NULL,
  `target_rpjmd_k` varchar(255) NOT NULL,
  `target_rpjmd_rp` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rpjmd1_k` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rpjmd1_rp` varchar(255) NOT NULL,
  `target_kinerja_rkpd_k` varchar(255) NOT NULL,
  `target_kinerja_rkpd_rp` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_1_k` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_1_rp` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_2_k` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_2_rp` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_3_k` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_3_rp` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_4_k` varchar(255) NOT NULL,
  `realisasi_kinerja_triwulan_4_rp` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rkpd_k` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rkpd_rp` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rpjmd_k` varchar(255) NOT NULL,
  `realisasi_capaian_kinerja_rpjmd_rp` varchar(255) NOT NULL,
  `target_capaian_kinerja_dan_realisasi_rpjmd_k` varchar(255) NOT NULL,
  `target_capaian_kinerja_dan_realisasi_rpjmd_rp` varchar(255) NOT NULL,
  `tahun_anggaran` varchar(255) NOT NULL,
  `triwulan` enum('Triwulan I','Triwulan II','Triwulan III','Triwulan IV') NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `mod_by` varchar(255) NOT NULL,
  `mod_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_evaluasi_rkpd`
--

INSERT INTO `temp_evaluasi_rkpd` (`id`, `skpd`, `kode`, `urusan`, `bidang`, `program`, `kegiatan`, `sasaran`, `indikator_kinerja_program`, `indikator_keluaran_kegiatan`, `target_rpjmd_k`, `target_rpjmd_rp`, `realisasi_capaian_kinerja_rpjmd1_k`, `realisasi_capaian_kinerja_rpjmd1_rp`, `target_kinerja_rkpd_k`, `target_kinerja_rkpd_rp`, `realisasi_kinerja_triwulan_1_k`, `realisasi_kinerja_triwulan_1_rp`, `realisasi_kinerja_triwulan_2_k`, `realisasi_kinerja_triwulan_2_rp`, `realisasi_kinerja_triwulan_3_k`, `realisasi_kinerja_triwulan_3_rp`, `realisasi_kinerja_triwulan_4_k`, `realisasi_kinerja_triwulan_4_rp`, `realisasi_capaian_kinerja_rkpd_k`, `realisasi_capaian_kinerja_rkpd_rp`, `realisasi_capaian_kinerja_rpjmd_k`, `realisasi_capaian_kinerja_rpjmd_rp`, `target_capaian_kinerja_dan_realisasi_rpjmd_k`, `target_capaian_kinerja_dan_realisasi_rpjmd_rp`, `tahun_anggaran`, `triwulan`, `created_by`, `created_date`, `mod_by`, `mod_date`) VALUES
(3, 24, '', '1', '1', '1', '5', 'asd asdasd', 'Jumlah kajian SIM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020', 'Triwulan I', '2', '2016-07-14 23:20:04', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `top_down`
--

CREATE TABLE IF NOT EXISTS `top_down` (
  `id` bigint(20) NOT NULL,
  `kd_skpd` tinyint(2) NOT NULL,
  `kd_urusan` int(11) NOT NULL,
  `kd_bidang` int(11) NOT NULL,
  `kd_prog` int(11) NOT NULL,
  `kd_kegiatan` int(11) NOT NULL,
  `tahun` int(4) DEFAULT '0',
  `kunci` tinyint(4) DEFAULT '1',
  `sasaran_daerah` text NOT NULL,
  `prioritas_daerah` text NOT NULL,
  `sasaran_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `pagu_indikatif` bigint(20) NOT NULL,
  `pagu_prakiraan_maju` bigint(20) NOT NULL,
  `sumber_dana` int(11) NOT NULL,
  `urutan` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_program` varchar(111) NOT NULL,
  `target_hasil_program` varchar(111) NOT NULL,
  `tolak_ukur_keluaran_kegiatan` varchar(111) NOT NULL,
  `target_keluaran_kegiatan` varchar(111) NOT NULL,
  `tolak_ukur_hasil_kegiatan` varchar(111) NOT NULL,
  `target_hasil_kegiatan` varchar(111) NOT NULL,
  `sumber_usulan` varchar(111) NOT NULL,
  `status_usulan` enum('Terima','Tolak') NOT NULL,
  `keterangan_status_usulan` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `uniondpa`
--
CREATE TABLE IF NOT EXISTS `uniondpa` (
`id` bigint(20)
,`tahun` int(11)
,`urusan` int(11)
,`bidang` int(11)
,`program` int(11)
,`kegiatan` int(11)
,`id_rekening_belanja` int(11)
,`skpd` int(11)
,`uraian` text
,`sub_uraian` text
,`created_by` varchar(100)
,`created_date` datetime
,`mod_by` varchar(100)
,`mod_date` datetime
,`parent_id` int(11)
,`parentCategory` int(11)
,`item` text
,`volume` int(11)
,`satuan` varchar(100)
,`harga_satuan` bigint(20)
,`level` varchar(10)
,`status_verifikasi` varchar(16)
,`capaian_program` text
,`target_capaian_program` text
,`masukan` text
,`target_masukan` text
,`keluaran` text
,`target_keluaran` text
,`hasil` text
,`target_hasil` text
,`sasaran_kegiatan` text
,`sumber_dana` text
,`lokasi_kegiatan` text
,`jenis_sumber_dana` varchar(111)
,`jenis_dpa` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `union_ppas`
--
CREATE TABLE IF NOT EXISTS `union_ppas` (
`id` bigint(20)
,`urusan` int(11)
,`bidang` int(11)
,`program` int(11)
,`kegiatan` int(11)
,`sasaran` text
,`target` text
,`plafon_anggaran` bigint(20)
,`plafon_anggaran_setelah_perubahan` bigint(20)
,`skpd` int(11)
,`created_by` varchar(100)
,`created_date` datetime
,`mod_by` varchar(100)
,`mod_date` datetime
,`id_musrenbang_kota` int(11)
,`tahun` int(11)
,`is_perubahan` varchar(14)
,`status_ppas` varchar(111)
);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(5) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `id_musrenbang_cam` bigint(20) NOT NULL,
  `id_musrenbang_kel` bigint(20) NOT NULL,
  `id_musrenbang_kota` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `foto`, `id_musrenbang_cam`, `id_musrenbang_kel`, `id_musrenbang_kota`) VALUES
(2, 'DSC_0015.JPG', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `urusan`
--

CREATE TABLE IF NOT EXISTS `urusan` (
  `id` int(11) NOT NULL,
  `kode_urusan` varchar(55) NOT NULL,
  `urusan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urusan`
--

INSERT INTO `urusan` (`id`, `kode_urusan`, `urusan`) VALUES
(1, '1', 'Urusan Wajib'),
(2, '2', 'Urusan Pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `skpd` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_telp` varchar(255) NOT NULL,
  `level` enum('operator dinas','admin bappeda') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `password_md5`, `nama_lengkap`, `skpd`, `email`, `nomor_telp`, `level`, `status`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 23, 'admin@admin.com', 'asdasd', 'admin bappeda', 'Aktif'),
(3, 'disdik', 'disdik', '50ac30d9f12601fd112aecbc560d1cea', 'Admin Dinas Pendidikan', 24, 'fnaci4775@gmail.com', '08122', 'operator dinas', 'Aktif'),
(4, 'dinaspertanian', 'dinaspertanian', '10a45fc6d2fb1e0413e83fac264a6e35', 'Joko', 16, 'fnaci4775@gmail.com', '081332098096', 'operator dinas', 'Aktif'),
(5, 'baling', 'baling', '2bce7b2ca7f6950f2c1500190145ff5a', 'Badan Lingkungan Hidup', 25, 'fnaci4775@gmail.com', '081332098096', 'operator dinas', 'Aktif'),
(6, 'bappeda', 'bappeda', '5cb3c68711a767288e4031f09c2305e5', 'Bappeda', 23, 'fnaci4775@gmail.com', '081332098096', 'operator dinas', 'Aktif'),
(7, 'hukum', 'hukum', '417b2b0c8cb56c1067034fb791630679', 'hukum', 3, 'hukum', 'hukum', 'operator dinas', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE IF NOT EXISTS `usulan` (
  `id` int(11) NOT NULL,
  `usulan` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `mod_date` datetime NOT NULL,
  `mod_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id`, `usulan`, `created_date`, `created_by`, `mod_date`, `mod_by`) VALUES
(1, 'Usulan Fisik', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Usulan non Fisik', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure for view `uniondpa`
--
DROP TABLE IF EXISTS `uniondpa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `uniondpa` AS select `dpa`.`id` AS `id`,`dpa`.`tahun` AS `tahun`,`dpa`.`urusan` AS `urusan`,`dpa`.`bidang` AS `bidang`,`dpa`.`program` AS `program`,`dpa`.`kegiatan` AS `kegiatan`,`dpa`.`id_rekening_belanja` AS `id_rekening_belanja`,`dpa`.`skpd` AS `skpd`,`dpa`.`uraian` AS `uraian`,`dpa`.`sub_uraian` AS `sub_uraian`,`dpa`.`created_by` AS `created_by`,`dpa`.`created_date` AS `created_date`,`dpa`.`mod_by` AS `mod_by`,`dpa`.`mod_date` AS `mod_date`,`dpa`.`parent_id` AS `parent_id`,`dpa`.`parentCategory` AS `parentCategory`,`dpa`.`item` AS `item`,`dpa`.`volume` AS `volume`,`dpa`.`satuan` AS `satuan`,`dpa`.`harga_satuan` AS `harga_satuan`,`dpa`.`level` AS `level`,`dpa`.`status_verifikasi` AS `status_verifikasi`,`dpa`.`capaian_program` AS `capaian_program`,`dpa`.`target_capaian_program` AS `target_capaian_program`,`dpa`.`masukan` AS `masukan`,`dpa`.`target_masukan` AS `target_masukan`,`dpa`.`keluaran` AS `keluaran`,`dpa`.`target_keluaran` AS `target_keluaran`,`dpa`.`hasil` AS `hasil`,`dpa`.`target_hasil` AS `target_hasil`,`dpa`.`sasaran_kegiatan` AS `sasaran_kegiatan`,`dpa`.`sumber_dana` AS `sumber_dana`,`dpa`.`lokasi_kegiatan` AS `lokasi_kegiatan`,`dpa`.`jenis_sumber_dana` AS `jenis_sumber_dana`,0 AS `jenis_dpa` from `dpa` union all select `dpa_perubahan`.`id` AS `id`,`dpa_perubahan`.`tahun` AS `tahun`,`dpa_perubahan`.`urusan` AS `urusan`,`dpa_perubahan`.`bidang` AS `bidang`,`dpa_perubahan`.`program` AS `program`,`dpa_perubahan`.`kegiatan` AS `kegiatan`,`dpa_perubahan`.`id_rekening_belanja` AS `id_rekening_belanja`,`dpa_perubahan`.`skpd` AS `skpd`,`dpa_perubahan`.`uraian` AS `uraian`,`dpa_perubahan`.`sub_uraian` AS `sub_uraian`,`dpa_perubahan`.`created_by` AS `created_by`,`dpa_perubahan`.`created_date` AS `created_date`,`dpa_perubahan`.`mod_by` AS `mod_by`,`dpa_perubahan`.`mod_date` AS `mod_date`,`dpa_perubahan`.`parent_id` AS `parent_id`,`dpa_perubahan`.`parentCategory` AS `parentCategory`,`dpa_perubahan`.`item` AS `item`,`dpa_perubahan`.`volume` AS `volume`,`dpa_perubahan`.`satuan` AS `satuan`,`dpa_perubahan`.`harga_satuan` AS `harga_satuan`,`dpa_perubahan`.`level` AS `level`,`dpa_perubahan`.`status_verifikasi` AS `status_verifikasi`,`dpa_perubahan`.`capaian_program` AS `capaian_program`,`dpa_perubahan`.`target_capaian_program` AS `target_capaian_program`,`dpa_perubahan`.`masukan` AS `masukan`,`dpa_perubahan`.`target_masukan` AS `target_masukan`,`dpa_perubahan`.`keluaran` AS `keluaran`,`dpa_perubahan`.`target_keluaran` AS `target_keluaran`,`dpa_perubahan`.`hasil` AS `hasil`,`dpa_perubahan`.`target_hasil` AS `target_hasil`,`dpa_perubahan`.`sasaran_kegiatan` AS `sasaran_kegiatan`,`dpa_perubahan`.`sumber_dana` AS `sumber_dana`,`dpa_perubahan`.`lokasi_kegiatan` AS `lokasi_kegiatan`,`dpa_perubahan`.`jenis_sumber_dana` AS `jenis_sumber_dana`,1 AS `jenis_dpa` from `dpa_perubahan`;

-- --------------------------------------------------------

--
-- Structure for view `union_ppas`
--
DROP TABLE IF EXISTS `union_ppas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `union_ppas` AS select `ppas`.`id` AS `id`,`ppas`.`urusan` AS `urusan`,`ppas`.`bidang` AS `bidang`,`ppas`.`program` AS `program`,`ppas`.`kegiatan` AS `kegiatan`,`ppas`.`sasaran` AS `sasaran`,`ppas`.`target` AS `target`,`ppas`.`plafon_anggaran` AS `plafon_anggaran`,`ppas`.`plafon_anggaran_setelah_perubahan` AS `plafon_anggaran_setelah_perubahan`,`ppas`.`skpd` AS `skpd`,`ppas`.`created_by` AS `created_by`,`ppas`.`created_date` AS `created_date`,`ppas`.`mod_by` AS `mod_by`,`ppas`.`mod_date` AS `mod_date`,`ppas`.`id_musrenbang_kota` AS `id_musrenbang_kota`,`ppas`.`tahun` AS `tahun`,`ppas`.`is_perubahan` AS `is_perubahan`,`ppas`.`status_ppas` AS `status_ppas` from `ppas` union all select `ppas_perubahan`.`id` AS `id`,`ppas_perubahan`.`urusan` AS `urusan`,`ppas_perubahan`.`bidang` AS `bidang`,`ppas_perubahan`.`program` AS `program`,`ppas_perubahan`.`kegiatan` AS `kegiatan`,`ppas_perubahan`.`sasaran` AS `sasaran`,`ppas_perubahan`.`target` AS `target`,`ppas_perubahan`.`plafon_anggaran` AS `plafon_anggaran`,`ppas_perubahan`.`plafon_anggaran_setelah_perubahan` AS `plafon_anggaran_setelah_perubahan`,`ppas_perubahan`.`skpd` AS `skpd`,`ppas_perubahan`.`created_by` AS `created_by`,`ppas_perubahan`.`created_date` AS `created_date`,`ppas_perubahan`.`mod_by` AS `mod_by`,`ppas_perubahan`.`mod_date` AS `mod_date`,`ppas_perubahan`.`id_musrenbang_kota` AS `id_musrenbang_kota`,`ppas_perubahan`.`tahun` AS `tahun`,`ppas_perubahan`.`status_ppas` AS `status_ppas`,`ppas_perubahan`.`is_perubahan` AS `is_perubahan` from `ppas_perubahan`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpa`
--
ALTER TABLE `dpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpa_perubahan`
--
ALTER TABLE `dpa_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_renja`
--
ALTER TABLE `evaluasi_renja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_renstra`
--
ALTER TABLE `evaluasi_renstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_rkpd`
--
ALTER TABLE `evaluasi_rkpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form2_laporan_kemajuan_sumber_dana_dak`
--
ALTER TABLE `form2_laporan_kemajuan_sumber_dana_dak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_musrenbang_kecamatan`
--
ALTER TABLE `kegiatan_musrenbang_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_musrenbang_kelurahan`
--
ALTER TABLE `kegiatan_musrenbang_kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_musrenbang_kota`
--
ALTER TABLE `kegiatan_musrenbang_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_rpjmd`
--
ALTER TABLE `kegiatan_rpjmd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_skpd`
--
ALTER TABLE `kegiatan_skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendala_realisasi_fisik_dan_keuangan_dau`
--
ALTER TABLE `kendala_realisasi_fisik_dan_keuangan_dau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kua`
--
ALTER TABLE `kua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kua_perubahan`
--
ALTER TABLE `kua_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pengadaan_barang_jasa`
--
ALTER TABLE `laporan_pengadaan_barang_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_kegiatan_renja`
--
ALTER TABLE `lokasi_kegiatan_renja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`), ADD KEY `sender` (`sender_id`), ADD KEY `reciever` (`receiver_id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musrenbang_kegiatan_rpjmd`
--
ALTER TABLE `musrenbang_kegiatan_rpjmd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan_usulan`
--
ALTER TABLE `panduan_usulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partisipatif`
--
ALTER TABLE `partisipatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelayanan_dasar`
--
ALTER TABLE `pelayanan_dasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokok_pikiran_dprd`
--
ALTER TABLE `pokok_pikiran_dprd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `politis`
--
ALTER TABLE `politis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppas`
--
ALTER TABLE `ppas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppas_perubahan`
--
ALTER TABLE `ppas_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prioritas_daerah`
--
ALTER TABLE `prioritas_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisasi_fisik_dan_keuangan_dak_dpa`
--
ALTER TABLE `realisasi_fisik_dan_keuangan_dak_dpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisasi_fisik_dan_keuangan_dau_dpa`
--
ALTER TABLE `realisasi_fisik_dan_keuangan_dau_dpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening_belanja`
--
ALTER TABLE `rekening_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renja`
--
ALTER TABLE `renja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renja_perubahan`
--
ALTER TABLE `renja_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renstra`
--
ALTER TABLE `renstra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rka`
--
ALTER TABLE `rka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rka_perubahan`
--
ALTER TABLE `rka_perubahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpjmd`
--
ALTER TABLE `rpjmd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sasaran_daerah`
--
ALTER TABLE `sasaran_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spm`
--
ALTER TABLE `spm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknokratis`
--
ALTER TABLE `teknokratis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_evaluasi_rkpd`
--
ALTER TABLE `temp_evaluasi_rkpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_down`
--
ALTER TABLE `top_down`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `dpa`
--
ALTER TABLE `dpa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dpa_perubahan`
--
ALTER TABLE `dpa_perubahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `evaluasi_renja`
--
ALTER TABLE `evaluasi_renja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `evaluasi_renstra`
--
ALTER TABLE `evaluasi_renstra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `evaluasi_rkpd`
--
ALTER TABLE `evaluasi_rkpd`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `form2_laporan_kemajuan_sumber_dana_dak`
--
ALTER TABLE `form2_laporan_kemajuan_sumber_dana_dak`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kegiatan_musrenbang_kecamatan`
--
ALTER TABLE `kegiatan_musrenbang_kecamatan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `kegiatan_musrenbang_kelurahan`
--
ALTER TABLE `kegiatan_musrenbang_kelurahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kegiatan_musrenbang_kota`
--
ALTER TABLE `kegiatan_musrenbang_kota`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `kegiatan_rpjmd`
--
ALTER TABLE `kegiatan_rpjmd`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kegiatan_skpd`
--
ALTER TABLE `kegiatan_skpd`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `kendala_realisasi_fisik_dan_keuangan_dau`
--
ALTER TABLE `kendala_realisasi_fisik_dan_keuangan_dau`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kua`
--
ALTER TABLE `kua`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=312;
--
-- AUTO_INCREMENT for table `kua_perubahan`
--
ALTER TABLE `kua_perubahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `laporan_pengadaan_barang_jasa`
--
ALTER TABLE `laporan_pengadaan_barang_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lokasi_kegiatan_renja`
--
ALTER TABLE `lokasi_kegiatan_renja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `musrenbang_kegiatan_rpjmd`
--
ALTER TABLE `musrenbang_kegiatan_rpjmd`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `panduan_usulan`
--
ALTER TABLE `panduan_usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `partisipatif`
--
ALTER TABLE `partisipatif`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelayanan_dasar`
--
ALTER TABLE `pelayanan_dasar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pokok_pikiran_dprd`
--
ALTER TABLE `pokok_pikiran_dprd`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `politis`
--
ALTER TABLE `politis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppas`
--
ALTER TABLE `ppas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1219;
--
-- AUTO_INCREMENT for table `ppas_perubahan`
--
ALTER TABLE `ppas_perubahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=310;
--
-- AUTO_INCREMENT for table `prioritas_daerah`
--
ALTER TABLE `prioritas_daerah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `realisasi_fisik_dan_keuangan_dak_dpa`
--
ALTER TABLE `realisasi_fisik_dan_keuangan_dak_dpa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `realisasi_fisik_dan_keuangan_dau_dpa`
--
ALTER TABLE `realisasi_fisik_dan_keuangan_dau_dpa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rekening_belanja`
--
ALTER TABLE `rekening_belanja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1674;
--
-- AUTO_INCREMENT for table `renja`
--
ALTER TABLE `renja`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `renja_perubahan`
--
ALTER TABLE `renja_perubahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `renstra`
--
ALTER TABLE `renstra`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rka`
--
ALTER TABLE `rka`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `rka_perubahan`
--
ALTER TABLE `rka_perubahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `rpjmd`
--
ALTER TABLE `rpjmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sasaran_daerah`
--
ALTER TABLE `sasaran_daerah`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skpd`
--
ALTER TABLE `skpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `spm`
--
ALTER TABLE `spm`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teknokratis`
--
ALTER TABLE `teknokratis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_evaluasi_rkpd`
--
ALTER TABLE `temp_evaluasi_rkpd`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `top_down`
--
ALTER TABLE `top_down`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
