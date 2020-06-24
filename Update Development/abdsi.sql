-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 09:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_abdsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_cctv`
--

CREATE TABLE `city_cctv` (
  `id_city_cctv` int(11) NOT NULL,
  `id_city_users` int(11) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `location_detail` text,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `ordering` int(5) DEFAULT '1',
  `source` varchar(255) DEFAULT NULL,
  `publish` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_cctv`
--

INSERT INTO `city_cctv` (`id_city_cctv`, `id_city_users`, `location_name`, `location_detail`, `longitude`, `latitude`, `ordering`, `source`, `publish`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(6, 1, 'Siak', 'Buatan II, Koto Gasib, Siak Regency, Riau, Indonesia', '101.84717113952111', '0.8240185108966684', 1, 'http://45.118.114.26/camera/PasirKoja.m3u8', '1', '2018-09-04 15:03:29', '1', '2020-02-12 13:50:29', '1');

-- --------------------------------------------------------

--
-- Table structure for table `core_module_admin`
--

CREATE TABLE `core_module_admin` (
  `ID` int(10) NOT NULL,
  `MENU_ACTIVE_OPEN` varchar(255) DEFAULT NULL,
  `MENU_NAME` varchar(100) NOT NULL,
  `MENU_LINK` varchar(200) DEFAULT NULL,
  `MENU_ICON` varchar(100) NOT NULL,
  `PARENT_ID` int(10) DEFAULT NULL,
  `SEGMENT` int(1) NOT NULL,
  `HIDE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_module_admin`
--

INSERT INTO `core_module_admin` (`ID`, `MENU_ACTIVE_OPEN`, `MENU_NAME`, `MENU_LINK`, `MENU_ICON`, `PARENT_ID`, `SEGMENT`, `HIDE`) VALUES
(1, '#', 'NAVIGASI', '#', '', NULL, 1, 1),
(2, '#', 'Dashboard', '#', 'ion-ios-pulse-strong', 1, 1, 1),
(3, 'Dashboard', 'Maps', 'Dashboard', '', 2, 1, 1),
(4, '#', 'Analytics', '#', 'ion-stats-bars bg-gradient-orange', 1, 1, 1),
(5, 'Planning', 'E-Planning', 'Planning', '', 4, 1, 1),
(6, 'Perizinan', 'E-Perizinan', 'Perizinan', '', 4, 1, 1),
(7, 'Puskesmas', 'E-Puskesmas', 'Puskesmas', '', 4, 1, 1),
(8, '#', 'ADMIN MODULES', '#', '', NULL, 1, 1),
(9, '#', 'Pengaturan', '#', 'ion-ios-gear-outline', 8, 1, 1),
(10, 'CCTV', 'CCTV', 'CCTV', '', 9, 1, 1),
(11, 'UMKM', 'Data UMKM', 'UMKM', '', 9, 1, 1),
(27, 'Summary', 'Summary', 'Summary', '', 2, 1, 1),
(28, 'Pregnancy', 'Pertanian', 'Pregnancy', '', 2, 1, 1),
(29, 'Users', 'Data User', 'Users', '', 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_citizen`
--

CREATE TABLE `m_citizen` (
  `ID` int(11) NOT NULL,
  `DISTRICT_ID` int(11) NOT NULL,
  `POPULATION` double DEFAULT NULL,
  `MALE` double DEFAULT NULL,
  `FEMALE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_citizen`
--

INSERT INTO `m_citizen` (`ID`, `DISTRICT_ID`, `POPULATION`, `MALE`, `FEMALE`) VALUES
(1, 1, 113208, 58776, 54432),
(2, 2, 29601, 15343, 14258),
(3, 3, 68004, 35247, 32757),
(4, 4, 18847, 9606, 9241),
(5, 5, 29277, 15139, 14138),
(6, 6, 28617, 14549, 14068),
(7, 7, 25290, 13055, 12235),
(8, 8, 8461, 4382, 4079),
(9, 9, 21851, 11341, 10510),
(10, 10, 12410, 6389, 6021);

-- --------------------------------------------------------

--
-- Table structure for table `m_citizen_village`
--

CREATE TABLE `m_citizen_village` (
  `ID` int(11) NOT NULL,
  `DISTRICT_ID` int(11) NOT NULL,
  `VILLAGE_NAME` varchar(50) NOT NULL,
  `POPULATION` double DEFAULT NULL,
  `MALE` double DEFAULT NULL,
  `FEMALE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_citizen_village`
--

INSERT INTO `m_citizen_village` (`ID`, `DISTRICT_ID`, `VILLAGE_NAME`, `POPULATION`, `MALE`, `FEMALE`) VALUES
(1, 1, 'Desa Ara', 36690, 19123, 17567),
(2, 1, 'Desa Bira', 18830, 9746, 9084),
(3, 1, 'Desa Darubiah', 3584, 1893, 1691),
(4, 1, 'Desa Lembanna', 3636, 1902, 1734),
(5, 1, 'Kel. Benjala', 10629, 5461, 5168),
(6, 1, 'Kel. Sapo Lohe', 5162, 2702, 2460),
(7, 1, 'Kel. Tanah Beru', 3353, 1753, 1600),
(8, 1, 'Kel. Tanah Lemo', 27017, 13976, 13041),
(9, 2, 'Desa Batang', 4307, 2220, 2087),
(10, 2, 'Desa Bonto Barua', 7749, 4062, 3687),
(11, 2, 'Desa Bonto Bulaeng', 3028, 1531, 1497),
(12, 2, 'Desa Bonto Marannu', 2079, 1079, 1000),
(13, 2, 'Desa Bonto Tangnga', 1182, 600, 582),
(14, 2, 'Desa Buhung Bundang', 1106, 576, 530),
(15, 2, 'Desa Caramming', 2033, 1063, 970),
(16, 2, 'Desa Dwi Tiro', 2308, 1193, 1115),
(17, 2, 'Desa Lamanda', 1446, 737, 709),
(18, 2, 'Desa Paku Balaho', 835, 438, 397),
(19, 2, 'Desa Talamanera', 4509, 2348, 2161),
(20, 2, 'Desa Tri Tiro', 3326, 1716, 1610),
(21, 2, 'Kel. Eka Tiro', 6818, 3477, 3341),
(22, 3, 'Desa Balang Pesoang', 7410, 3835, 3575),
(23, 3, 'Desa Balang Taroang', 12698, 6517, 6181),
(24, 3, 'Desa Baruga Riattang', 6735, 3528, 3207),
(25, 3, 'Desa Barugae', 6875, 3534, 3341),
(26, 3, 'Desa Batulohe', 7959, 4149, 3810),
(27, 3, 'Desa Bonto Bulaeng', 5299, 2778, 2521),
(28, 3, 'Desa Bonto Mangiring', 3940, 2095, 1845),
(29, 3, 'Desa Bonto Minasa', 1932, 999, 933),
(30, 3, 'Desa Bulo-Bulo', 2409, 1253, 1156),
(31, 3, 'Desa Jojjolo', 5929, 3082, 2847),
(32, 3, 'Desa Kambuno', 5826, 2985, 2841),
(33, 3, 'Desa Salassae', 2091, 1047, 1044),
(34, 3, 'Desa Sapo Bonto', 2403, 1235, 1168),
(35, 3, 'Desa Tibona', 2916, 1493, 1423),
(36, 3, 'Kel. Balla Saraja', 1996, 1014, 982),
(37, 3, 'Kel. Jawi Jawi', 2023, 1021, 1002),
(38, 3, 'Kel. Tanete', 1592, 811, 781),
(39, 4, 'Desa Barombong', 6820, 3484, 3336),
(40, 4, 'Desa Benteng Gattareng', 1357, 749, 608),
(41, 4, 'Desa Benteng Malewang', 1479, 765, 714),
(42, 4, 'Desa Bialo', 1503, 750, 753),
(43, 4, 'Desa Bonto Macinna', 3130, 1591, 1539),
(44, 4, 'Desa Bonto Masila', 2027, 1045, 982),
(45, 4, 'Desa Bonto Nyeleng', 1684, 861, 823),
(46, 4, 'Desa Bonto Raja', 2725, 1422, 1303),
(47, 4, 'Desa Bonto Sunggu', 1038, 545, 493),
(48, 4, 'Desa Bukit Harapan', 1485, 785, 700),
(49, 4, 'Desa Bukit Tinggi', 1535, 780, 755),
(50, 4, 'Desa Dampang', 1251, 692, 559),
(51, 4, 'Desa Gatareng', 1336, 679, 657),
(52, 4, 'Desa Padang', 953, 508, 445),
(53, 4, 'Desa Paenre Lompoe', 954, 483, 471),
(54, 4, 'Desa Palambare', 8084, 4034, 4050),
(55, 4, 'Desa Polewali', 7439, 3778, 3661),
(56, 4, 'Desa Taccorong', 2561, 1285, 1276),
(57, 4, 'Kel. Jalanjang', 3038, 1616, 1422),
(58, 4, 'Kel. Mario Rennu', 1906, 961, 945),
(59, 4, 'Kel. Matekko', 1103, 577, 526),
(60, 5, 'Desa Borong', 2434, 1238, 1196),
(61, 5, 'Desa Gunturu', 2052, 1060, 992),
(62, 5, 'Desa Karassing', 5136, 2600, 2536),
(63, 5, 'Desa Pataro', 3793, 1949, 1844),
(64, 5, 'Desa Singa', 3741, 1924, 1817),
(65, 5, 'Desa Tugondeng', 2711, 1390, 1321),
(66, 5, 'Kel. Bonto Kamase', 2516, 1309, 1207),
(67, 5, 'Kel. Tanuntung', 2889, 1553, 1336),
(68, 6, 'Desa Batu Nilamung', 1475, 744, 731),
(69, 6, 'Desa Bonto Baji', 1211, 652, 559),
(70, 6, 'Desa Bonto Biraeng', 1058, 543, 515),
(71, 6, 'Desa Bonto Rannu', 760, 391, 369),
(72, 6, 'Desa Lembang', 1222, 626, 596),
(73, 6, 'Desa Lembang Lohe', 281, 139, 142),
(74, 6, 'Desa Lembanna', 1331, 662, 669),
(75, 6, 'Desa Lolisang', 1203, 618, 585),
(76, 6, 'Desa Malleleng', 1385, 736, 649),
(77, 6, 'Desa Mattoanging', 1110, 603, 507),
(78, 6, 'Desa Pantama', 666, 337, 329),
(79, 6, 'Desa Pattiroang', 550, 281, 269),
(80, 6, 'Desa Possi Tanah', 713, 380, 333),
(81, 6, 'Desa Sangkala', 1641, 865, 776),
(82, 6, 'Desa Sapanang', 2018, 1066, 952),
(83, 6, 'Desa Tambangan', 1717, 890, 827),
(84, 6, 'Desa Tanah Toa', 1397, 704, 693),
(85, 6, 'Kel. Laikang', 1706, 891, 815),
(86, 6, 'Kel. Tanah Jaya', 2202, 1099, 1103),
(87, 7, 'Desa Arinhua', 2944, 1520, 1424),
(88, 7, 'Desa Balibo', 2210, 1151, 1059),
(89, 7, 'Desa Benteng Palioi', 1411, 745, 666),
(90, 7, 'Desa Garuntungan', 1227, 635, 592),
(91, 7, 'Desa Kahayya', 2425, 1267, 1158),
(92, 7, 'Desa Kindang', 953, 508, 445),
(93, 7, 'Desa Mattirowalie', 1434, 735, 699),
(94, 7, 'Desa Oro Gading', 1798, 909, 889),
(95, 7, 'Desa Sipaenre', 1331, 681, 650),
(96, 7, 'Desa Simba Palioi', 2554, 1286, 1268),
(97, 7, 'Desa Sopa', 1236, 657, 579),
(98, 7, 'Desa Tamaona', 1568, 832, 736),
(99, 7, 'Kel. Borong Rappoa', 1291, 673, 618),
(100, 8, 'Desa Anrang', 1198, 616, 582),
(101, 8, 'Desa Bajiminasa', 926, 480, 446),
(102, 8, 'Desa Batu Karopa', 1149, 604, 545),
(103, 8, 'Desa Bonto Bangun', 1314, 669, 645),
(104, 8, 'Desa Bonto Haru', 1536, 781, 755),
(105, 8, 'Desa Bontolohe', 814, 419, 395),
(106, 8, 'Desa Bonto Manai', 699, 361, 338),
(107, 8, 'Desa Matene', 586, 309, 277),
(108, 8, 'Desa Bulo Lohe', 14278, 7454, 6824),
(109, 8, 'Desa Karama', 3455, 1816, 1639),
(110, 8, 'Desa Pangalloang', 5264, 2729, 2535),
(111, 8, 'Desa Swatani', 2669, 1356, 1313),
(112, 8, 'Desa Tanah Harapan', 1689, 883, 806),
(113, 8, 'Desa Topanda', 5267, 2733, 2534),
(114, 8, 'Kel. Palampang', 2513, 1302, 1211),
(115, 9, 'Kel. Bentengnge', 678, 337, 341),
(116, 9, 'Kel. Bintarore', 1417, 730, 687),
(117, 9, 'Kel. Caile', 3101, 1548, 1553),
(118, 9, 'Kel. Ela-Ela', 1437, 743, 694),
(119, 9, 'Kel. Kalumeme', 1335, 681, 654),
(120, 9, 'Kel. Kasimpureng', 2703, 1360, 1343),
(121, 9, 'Kel. Loka', 1977, 976, 1001),
(122, 9, 'Kel. Tanah Kongkong', 603, 311, 292),
(123, 9, 'Kel. Terang-terang', 1179, 613, 566),
(124, 10, 'Desa Balleangin', 3684, 1855, 1829),
(125, 10, 'Desa Balong', 1535, 810, 725),
(126, 10, 'Desa Bijawang', 1705, 868, 837),
(127, 10, 'Desa Garanta', 2105, 1082, 1023),
(128, 10, 'Desa Lonrong', 3493, 1812, 1681),
(129, 10, 'Desa Manjalling', 492, 246, 246),
(130, 10, 'Desa Manyampa', 1941, 1009, 932),
(131, 10, 'Desa Paccaramengang', 685, 337, 348),
(132, 10, 'Desa Padang Loang', 586, 337, 348),
(133, 10, 'Desa Salemba', 953, 337, 348),
(134, 10, 'Desa Seppang', 1182, 600, 582),
(135, 10, 'Desa Tamatto', 1684, 861, 823),
(136, 10, 'Kel. Dannuang', 1291, 673, 618);

-- --------------------------------------------------------

--
-- Table structure for table `m_district`
--

CREATE TABLE `m_district` (
  `DISTRICT_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_district`
--

INSERT INTO `m_district` (`DISTRICT_ID`, `NAME`) VALUES
(1, 'Bonto Bahari'),
(2, 'Bontotiro'),
(3, 'Bulukumpa'),
(4, 'Gantarang'),
(5, 'Hero Lange-Lange'),
(6, 'Kajang'),
(7, 'Kindang'),
(8, 'Rilau Ale'),
(9, 'Ujung Bulu'),
(10, 'Ujung Loe'),
(11, 'Pusako'),
(12, 'Minas'),
(13, 'Koto Gasib'),
(14, 'Mempura');

-- --------------------------------------------------------

--
-- Table structure for table `m_users`
--

CREATE TABLE `m_users` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `FULLNAME` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `IMAGE` varchar(100) COLLATE latin1_general_ci DEFAULT 'default-avatar.png',
  `LEVEL` char(1) COLLATE latin1_general_ci DEFAULT NULL,
  `BLOKIR` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  `CONFIRM` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `m_users`
--

INSERT INTO `m_users` (`ID_USER`, `USERNAME`, `FULLNAME`, `PASSWORD`, `IMAGE`, `LEVEL`, `BLOKIR`, `CONFIRM`) VALUES
(4, 'admin', 'Administrator', 'e69dc2c09e8da6259422d987ccbe95b5', 'default-avatar.png', '1', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `m_users_level`
--

CREATE TABLE `m_users_level` (
  `LEVEL_ID` int(11) NOT NULL,
  `LEVEL_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_users_level`
--

INSERT INTO `m_users_level` (`LEVEL_ID`, `LEVEL_NAME`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `m_user_level_previlege`
--

CREATE TABLE `m_user_level_previlege` (
  `id_user_level` int(10) NOT NULL,
  `id_core_module_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user_level_previlege`
--

INSERT INTO `m_user_level_previlege` (`id_user_level`, `id_core_module_admin`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 8),
(1, 9),
(3, 1),
(3, 2),
(3, 3),
(1, 27),
(1, 11),
(1, 28),
(1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tb_location`
--

CREATE TABLE `tb_location` (
  `LOCATION_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_location`
--

INSERT INTO `tb_location` (`LOCATION_ID`, `NAME`) VALUES
(1, 'FASILITAS KESEHATAN'),
(2, 'KANTOR POLISI'),
(3, 'KANTOR PEMERINTAH'),
(4, 'TEMPAT WISATA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_location_detail`
--

CREATE TABLE `tb_location_detail` (
  `DETAIL_ID` int(11) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `LAT` varchar(50) DEFAULT NULL,
  `LONG` varchar(50) DEFAULT NULL,
  `DESC` text,
  `IMAGE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_location_detail`
--

INSERT INTO `tb_location_detail` (`DETAIL_ID`, `LOCATION_ID`, `NAME`, `LAT`, `LONG`, `DESC`, `IMAGE`) VALUES
(1, 1, 'RSUD Indramayu', '0.729007', '101.722792', 'J. Murahnara No. 7, Sindang', 'http://www.fujifilm.com.my/Products/digital_cameras/x/fujifilm_x_t1/sample_images/img/index/pic_01.jpg'),
(2, 2, 'RS Permata Medical Center', '0.803876', '101.921152', 'Panyindangan Wetan, Sindang', NULL),
(3, 3, 'Klinik Avicenna', '0.992143', '101.716162', 'Jl. Raya Rambatan Wetan', NULL),
(4, 4, 'Klinik Praga Medika', '1.092884', '101.795211', 'Jl. Jend. Sudirmna no.102D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pregnancy`
--

CREATE TABLE `tb_pregnancy` (
  `ID` int(11) NOT NULL,
  `YEAR` int(11) DEFAULT '0',
  `MONTH` int(11) DEFAULT '0',
  `JUMLAH_KEHAMILAN` int(11) DEFAULT '0',
  `BAYI_PRIA` int(11) DEFAULT '0',
  `BAYI_WANITA` int(11) DEFAULT '0',
  `BAYI_SELAMAT` int(11) DEFAULT '0',
  `BAYI_MENINGGAL` int(11) DEFAULT '0',
  `PERSALINAN_SELAMAT` int(11) DEFAULT '0',
  `PERSALINAN_MENINGGAL` int(11) DEFAULT '0',
  `TIDAK_KEGUGURAN` int(11) DEFAULT '0',
  `KEGUGURAN_1` int(11) DEFAULT '0',
  `KEGUGURAN_2` int(11) DEFAULT '0',
  `KEGUGURAN_3` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pregnancy`
--

INSERT INTO `tb_pregnancy` (`ID`, `YEAR`, `MONTH`, `JUMLAH_KEHAMILAN`, `BAYI_PRIA`, `BAYI_WANITA`, `BAYI_SELAMAT`, `BAYI_MENINGGAL`, `PERSALINAN_SELAMAT`, `PERSALINAN_MENINGGAL`, `TIDAK_KEGUGURAN`, `KEGUGURAN_1`, `KEGUGURAN_2`, `KEGUGURAN_3`) VALUES
(1, 2018, 1, 0, 2, 2, 4, 0, 4, 0, 0, 0, 0, 0),
(2, 2018, 2, 0, 2, 3, 5, 0, 5, 0, 0, 0, 0, 0),
(3, 2018, 3, 0, 3, 3, 6, 0, 6, 0, 0, 0, 0, 0),
(4, 2018, 4, 36, 6, 7, 13, 0, 13, 0, 29, 4, 1, 0),
(5, 2018, 5, 135, 6, 3, 9, 0, 9, 0, 112, 15, 34, 1),
(6, 2018, 6, 84, 10, 5, 15, 0, 15, 0, 71, 10, 3, 0),
(7, 2018, 7, 37, 10, 6, 16, 0, 16, 0, 31, 5, 1, 0),
(8, 2018, 8, 70, 7, 8, 15, 0, 15, 0, 58, 8, 3, 1),
(9, 2018, 9, 248, 6, 8, 14, 0, 14, 0, 209, 28, 8, 3),
(10, 2018, 10, 36, 6, 3, 8, 0, 9, 0, 30, 4, 1, 0),
(11, 2018, 11, 97, 3, 3, 6, 0, 6, 0, 81, 11, 3, 1),
(12, 2018, 12, 109, 4, 4, 8, 0, 8, 0, 90, 12, 3, 1),
(14, 2019, 1, 42, 11, 10, 21, 0, 21, 0, 35, 5, 1, 0),
(15, 2019, 2, 299, 10, 13, 22, 0, 23, 0, 248, 33, 9, 0),
(16, 2019, 3, 60, 8, 19, 27, 0, 27, 0, 50, 7, 2, 1),
(17, 2019, 4, 12, 13, 12, 25, 0, 25, 0, 10, 2, 0, 0),
(18, 2019, 5, 5, 14, 9, 23, 0, 23, 0, 4, 1, 0, 0),
(19, 2019, 6, 64, 9, 11, 20, 0, 20, 0, 53, 7, 2, 1),
(20, 2019, 7, 22, 5, 3, 8, 0, 8, 0, 18, 2, 1, 0),
(21, 2019, 8, 0, 4, 7, 11, 0, 11, 0, 0, 0, 0, 0),
(22, 2019, 9, 0, 3, 5, 8, 0, 8, 0, 0, 0, 0, 0),
(23, 2019, 10, 31, 10, 6, 16, 0, 16, 0, 26, 3, 1, 0),
(24, 2019, 11, 0, 6, 3, 9, 0, 9, 0, 0, 0, 0, 0),
(25, 2019, 12, 279, 0, 0, 8, 0, 8, 0, 0, 0, 0, 0),
(26, 2020, 1, 8, 23, 42, 31, 0, 74, 0, 232, 31, 8, 3),
(27, 2020, 2, 5, 12, 26, 28, 0, 44, 0, 7, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `ID_UMKM` int(11) NOT NULL,
  `PROVINCE_ID` int(11) DEFAULT NULL,
  `CITY_ID` int(11) DEFAULT NULL,
  `BRAND` varchar(100) DEFAULT NULL,
  `LOCATION_DETAIL` text,
  `LAT` varchar(100) DEFAULT NULL,
  `LONG` varchar(100) DEFAULT NULL,
  `CATEGORY` int(11) DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL,
  `OWNER` varchar(100) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `SINCE` date DEFAULT NULL,
  `EFFECT_ID` int(11) DEFAULT NULL,
  `IMAGE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_login_history`
--

CREATE TABLE `t_login_history` (
  `ID_HISTORY` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL DEFAULT '0',
  `LOGIN_DATE` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `IP_ADDRESS` varchar(50) NOT NULL,
  `DETAIL_LOGIN` text NOT NULL,
  `LOGIN_STATUS` varchar(50) NOT NULL,
  `NOTES` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login_history`
--

INSERT INTO `t_login_history` (`ID_HISTORY`, `USERNAME`, `LOGIN_DATE`, `IP_ADDRESS`, `DETAIL_LOGIN`, `LOGIN_STATUS`, `NOTES`) VALUES
(37, '', '2017-12-27 17:00:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(38, '', '2017-12-27 17:01:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(39, '', '2017-12-27 17:01:16', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(40, '', '2017-12-27 17:01:18', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(41, '', '2017-12-27 17:01:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(42, '', '2017-12-27 17:01:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(43, '', '2017-12-27 17:03:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(44, '', '2017-12-27 17:04:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(45, 'admin', '2017-12-27 17:05:32', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'Wrong Password !'),
(46, 'admin', '2017-12-27 17:05:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'Wrong Password !'),
(47, 'admin', '2017-12-27 17:05:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'Wrong Password !'),
(48, 'admin', '2017-12-27 17:06:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'Wrong Password !'),
(49, 'admin', '2017-12-27 17:07:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(50, 'ahsdkh', '2017-12-27 17:18:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(51, 'admin', '2017-12-27 17:18:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(52, 'admin', '2017-12-27 17:20:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(53, 'admin@itcomfy.com', '2017-12-27 22:29:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(54, 'admin', '2017-12-27 22:29:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(55, 'admin', '2017-12-27 22:52:39', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(56, 'admin', '2017-12-27 23:17:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(57, 'admin', '2017-12-27 23:29:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(58, 'admin', '2017-12-27 23:31:05', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(59, 'admin', '2017-12-28 00:37:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(60, 'op01', '2017-12-28 00:38:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(61, 'admin', '2017-12-28 00:54:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(62, 'op01', '2017-12-28 00:59:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(63, 'admin', '2017-12-28 01:04:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(64, 'admin', '2017-12-28 11:20:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(65, 'admin', '2017-12-28 12:07:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(66, 'admin', '2017-12-28 12:25:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(67, 'admin', '2017-12-28 13:40:02', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(68, 'admin', '2017-12-29 06:53:23', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(69, 'admin', '2018-01-05 15:39:46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(70, 'op01', '2018-01-05 15:40:06', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(71, 'op01', '2018-01-05 15:40:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(72, 'admin', '2018-01-19 15:02:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(73, 'admin', '2018-01-19 15:02:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(74, 'admin', '2018-01-19 15:02:51', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(75, 'admin', '2018-01-19 15:02:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'User & Password Not Found!'),
(76, 'op01', '2018-01-19 15:03:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '0', 'Wrong Password !'),
(77, 'op01', '2018-01-19 15:03:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', '1', 'Username & Password Match !'),
(78, 'admin', '2018-02-20 14:05:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '0', 'User & Password Not Found!'),
(79, 'admin', '2018-02-20 14:05:43', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '0', 'User & Password Not Found!'),
(80, 'op01', '2018-02-20 14:05:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0', '1', 'Username & Password Match !'),
(81, 'admin', '2018-03-23 09:29:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '0', 'User & Password Not Found!'),
(82, 'admin', '2018-03-23 09:29:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '0', 'User & Password Not Found!'),
(83, 'op01', '2018-03-23 09:29:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '1', 'Username & Password Match !'),
(84, 'admin', '2018-03-26 11:51:05', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '0', 'User & Password Not Found!'),
(85, 'admin', '2018-04-25 13:32:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '0', 'User & Password Not Found!'),
(86, 'admin', '2018-04-25 13:32:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '0', 'User & Password Not Found!'),
(87, 'op01', '2018-04-25 13:32:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0', '1', 'Username & Password Match !'),
(88, 'op01', '2018-09-04 14:10:45', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'Wrong Password !'),
(89, 'op01', '2018-09-04 14:10:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '1', 'Username & Password Match !'),
(90, 'admin', '2018-09-05 11:06:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'User & Password Not Found!'),
(91, 'admin', '2018-09-05 11:06:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'User & Password Not Found!'),
(92, 'op01', '2018-09-05 11:06:38', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'Wrong Password !'),
(93, 'op01', '2018-09-05 11:06:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '1', 'Username & Password Match !'),
(94, 'admin', '2018-09-05 14:35:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'User & Password Not Found!'),
(95, 'admin', '2018-09-05 14:35:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'User & Password Not Found!'),
(96, 'op01', '2018-09-05 14:35:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '1', 'Username & Password Match !'),
(97, 'op01', '2018-09-05 15:15:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'Wrong Password !'),
(98, 'op01', '2018-09-05 15:15:26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '1', 'Username & Password Match !'),
(99, 'op01', '2018-09-07 15:27:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '0', 'Wrong Password !'),
(100, 'op01', '2018-09-07 15:27:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '1', 'Username & Password Match !'),
(101, 'admin', '2019-02-13 16:14:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0', '0', 'User & Password Not Found!'),
(102, 'admin', '2019-02-13 16:14:08', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0', '0', 'User & Password Not Found!'),
(103, 'admin', '2019-02-13 16:14:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0', '0', 'User & Password Not Found!'),
(104, 'admin', '2019-02-13 16:14:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:65.0) Gecko/20100101 Firefox/65.0', '0', 'User & Password Not Found!'),
(105, 'admin', '2019-12-01 10:53:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '0', 'User & Password Not Found!'),
(106, 'admin', '2019-12-01 10:54:03', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '0', 'User & Password Not Found!'),
(107, 'op01', '2019-12-01 10:54:25', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '0', 'Wrong Password !'),
(108, 'op01', '2019-12-01 10:54:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', '1', 'Username & Password Match !'),
(109, 'admin', '2019-12-05 13:17:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(110, 'admin', '2019-12-05 13:17:33', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(111, 'admin', '2019-12-05 13:17:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(112, 'admin', '2019-12-05 13:17:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(113, 'admin', '2019-12-05 13:17:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(114, 'admin', '2019-12-05 13:17:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'User & Password Not Found!'),
(115, 'admin', '2019-12-05 13:18:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(116, 'admin', '2019-12-05 13:18:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(117, 'admin', '2019-12-05 13:20:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(118, 'admin', '2019-12-06 19:50:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(119, 'admin', '2019-12-06 19:50:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(120, 'admin', '2019-12-19 16:17:20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(121, 'admin', '2019-12-23 17:09:35', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(122, 'admin', '2019-12-23 17:09:40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(123, 'admin', '2019-12-25 21:18:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(124, 'admin', '2019-12-25 21:18:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(125, 'admin', '2019-12-26 11:40:19', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '0', 'Wrong Password !'),
(126, 'admin', '2019-12-26 11:40:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(127, 'admin', '2019-12-26 15:23:31', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(128, 'admin', '2019-12-27 14:01:46', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(129, 'admin', '2019-12-27 14:06:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', '1', 'Username & Password Match !'),
(130, 'admin', '2020-01-20 15:27:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(131, 'admin', '2020-01-30 14:42:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '0', 'Wrong Password !'),
(132, 'admin', '2020-01-30 14:42:44', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(133, 'admin', '2020-02-05 12:21:41', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '0', 'Wrong Password !'),
(134, 'admin', '2020-02-05 12:21:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(135, 'admin', '2020-02-05 14:02:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(136, 'admin', '2020-02-10 10:58:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '0', 'Wrong Password !'),
(137, 'admin', '2020-02-10 10:59:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(138, 'admin', '2020-02-11 17:01:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(139, 'admin', '2020-02-12 10:05:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(140, 'admin', '2020-02-12 13:20:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(141, 'admin', '2020-02-12 20:21:50', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(142, 'admin', '2020-02-12 22:56:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(143, 'admin', '2020-02-19 14:34:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '0', 'Wrong Password !'),
(144, 'admin', '2020-02-19 14:34:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:72.0) Gecko/20100101 Firefox/72.0', '1', 'Username & Password Match !'),
(145, 'admin', '2020-03-04 14:09:14', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:73.0) Gecko/20100101 Firefox/73.0', '1', 'Username & Password Match !'),
(146, 'admin', '2020-03-06 13:43:56', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:73.0) Gecko/20100101 Firefox/73.0', '0', 'Wrong Password !'),
(147, 'admin', '2020-03-06 13:44:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:73.0) Gecko/20100101 Firefox/73.0', '1', 'Username & Password Match !'),
(148, 'admin', '2020-03-14 01:33:09', '114.142.173.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:73.0) Gecko/20100101 Firefox/73.0', '1', 'Username & Password Match !'),
(149, 'admin', '2020-03-16 09:34:01', '118.99.118.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', '1', 'Username & Password Match !'),
(150, 'admin', '2020-03-16 10:56:03', '120.188.67.82', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1909) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', '1', 'Username & Password Match !'),
(151, 'admin', '2020-03-16 11:52:51', '118.99.118.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', '1', 'Username & Password Match !'),
(152, 'admin', '2020-03-16 12:26:51', '116.206.15.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0', '1', 'Username & Password Match !'),
(153, 'admin', '2020-06-23 15:59:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '0', 'Wrong Password !'),
(154, 'admin', '2020-06-23 15:59:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '1', 'Username & Password Match !'),
(155, 'admin', '2020-06-23 16:01:16', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '1', 'Username & Password Match !'),
(156, 'admin', '2020-06-23 20:54:53', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '0', 'Wrong Password !'),
(157, 'admin', '2020-06-23 20:54:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '1', 'Username & Password Match !'),
(158, 'admin', '2020-06-24 12:00:17', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '0', 'Wrong Password !'),
(159, 'admin', '2020-06-24 12:00:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', '1', 'Username & Password Match !');

-- --------------------------------------------------------

--
-- Table structure for table `_provinces`
--

CREATE TABLE `_provinces` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_provinces`
--

INSERT INTO `_provinces` (`id`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `_regencies`
--

CREATE TABLE `_regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `_regencies`
--

INSERT INTO `_regencies` (`id`, `province_id`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `_rf_business_category`
--

CREATE TABLE `_rf_business_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_rf_business_category`
--

INSERT INTO `_rf_business_category` (`category_id`, `name`) VALUES
(1, 'MIKRO'),
(2, 'KECIL 1'),
(3, 'KECIL 2'),
(4, 'KECIL 3'),
(5, 'MENENGAH');

-- --------------------------------------------------------

--
-- Table structure for table `_rf_business_type`
--

CREATE TABLE `_rf_business_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_rf_business_type`
--

INSERT INTO `_rf_business_type` (`type_id`, `name`) VALUES
(1, 'DRIVER ONLINE'),
(2, 'FASHION AKSESORIS'),
(3, 'FASHION BATIK/KAIN TRADISI'),
(4, 'JASA KONSULTAN'),
(5, 'JASA KESEHATAN');

-- --------------------------------------------------------

--
-- Table structure for table `_rf_effect_covid`
--

CREATE TABLE `_rf_effect_covid` (
  `effect_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_rf_effect_covid`
--

INSERT INTO `_rf_effect_covid` (`effect_id`, `name`) VALUES
(1, 'OMSET LEBIH TINGGI'),
(2, 'OMSET SAMA'),
(3, 'OMSET TURUN 10% - 30%'),
(4, 'OMSET TURUN 31% - 60%'),
(5, 'OMSET TURUN LEBIH DARI 60%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_cctv`
--
ALTER TABLE `city_cctv`
  ADD PRIMARY KEY (`id_city_cctv`,`id_city_users`);

--
-- Indexes for table `core_module_admin`
--
ALTER TABLE `core_module_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `m_citizen`
--
ALTER TABLE `m_citizen`
  ADD PRIMARY KEY (`ID`,`DISTRICT_ID`);

--
-- Indexes for table `m_citizen_village`
--
ALTER TABLE `m_citizen_village`
  ADD PRIMARY KEY (`ID`,`DISTRICT_ID`);

--
-- Indexes for table `m_district`
--
ALTER TABLE `m_district`
  ADD PRIMARY KEY (`DISTRICT_ID`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`ID_USER`,`USERNAME`);

--
-- Indexes for table `m_users_level`
--
ALTER TABLE `m_users_level`
  ADD PRIMARY KEY (`LEVEL_ID`);

--
-- Indexes for table `tb_location`
--
ALTER TABLE `tb_location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `tb_location_detail`
--
ALTER TABLE `tb_location_detail`
  ADD PRIMARY KEY (`DETAIL_ID`,`LOCATION_ID`);

--
-- Indexes for table `tb_pregnancy`
--
ALTER TABLE `tb_pregnancy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`ID_UMKM`);

--
-- Indexes for table `t_login_history`
--
ALTER TABLE `t_login_history`
  ADD PRIMARY KEY (`ID_HISTORY`,`USERNAME`,`LOGIN_DATE`);

--
-- Indexes for table `_provinces`
--
ALTER TABLE `_provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_regencies`
--
ALTER TABLE `_regencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regencies_province_id_index` (`province_id`);

--
-- Indexes for table `_rf_business_category`
--
ALTER TABLE `_rf_business_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `_rf_business_type`
--
ALTER TABLE `_rf_business_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `_rf_effect_covid`
--
ALTER TABLE `_rf_effect_covid`
  ADD PRIMARY KEY (`effect_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_cctv`
--
ALTER TABLE `city_cctv`
  MODIFY `id_city_cctv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_module_admin`
--
ALTER TABLE `core_module_admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `m_citizen`
--
ALTER TABLE `m_citizen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_citizen_village`
--
ALTER TABLE `m_citizen_village`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `m_district`
--
ALTER TABLE `m_district`
  MODIFY `DISTRICT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_users_level`
--
ALTER TABLE `m_users_level`
  MODIFY `LEVEL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_location`
--
ALTER TABLE `tb_location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_location_detail`
--
ALTER TABLE `tb_location_detail`
  MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pregnancy`
--
ALTER TABLE `tb_pregnancy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `ID_UMKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_login_history`
--
ALTER TABLE `t_login_history`
  MODIFY `ID_HISTORY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `_rf_business_category`
--
ALTER TABLE `_rf_business_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `_rf_business_type`
--
ALTER TABLE `_rf_business_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `_rf_effect_covid`
--
ALTER TABLE `_rf_effect_covid`
  MODIFY `effect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_regencies`
--
ALTER TABLE `_regencies`
  ADD CONSTRAINT `regencies_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `_provinces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
