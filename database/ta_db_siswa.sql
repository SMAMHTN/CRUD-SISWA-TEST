-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 10:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin56', '$2y$10$1pc6/rMa8LEEvKi5E0ZfW.gJw/VulfUGbT6l4yferI6gbZa7AXcVC');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(100) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `jenjang_pendidikan`, `jumlah_kelas`, `is_delete`) VALUES
(0, 'Sekolah Dasar', 60, 0),
(1, 'Sekolah Menengah Pertama', 30, 0),
(2, 'Sekolah Menengah Atas', 30, 0),
(3, 'Mahasiswa', 5, 0),
(4, 'Sekolah Menengah Kejurusan', 20, 0),
(5, 'Taman Kanak-Kanak', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `akreditasi_sekolah` varchar(10) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `akreditasi_sekolah`, `id_jenjang`, `is_delete`) VALUES
(0, 'SD Serundul 2 Sentosa', 'Jalan Serundul', 'A', 0, 0),
(1, 'SMP Negeri 21 Semarang', 'Jalan Karangrejo No 12', 'A', 1, 0),
(2, 'SMA Negeri 4 Semarang', 'Jalan karang rejo no 12A', 'A', 2, 0),
(3, 'SMA 1 Sukadana', 'Jalan Kampung durian', 'C', 2, 0),
(4, 'SMA 1 Berau', 'Berau,Kaltim', 'B', 2, 0),
(5, 'TK Cemara', 'Pasar cemara', 'B', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `no_hp_siswa` int(11) NOT NULL,
  `wali_siswa` varchar(100) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `no_hp_siswa`, `wali_siswa`, `id_sekolah`, `id_jenjang`, `is_delete`) VALUES
(0, 'Joko', 23123, 'Sukirman', 0, 0, 0),
(1, 'Fabian', 23123, 'Agus', 1, 1, 0),
(2, 'Fatwa', 213123, 'Fuad', 2, 2, 0),
(3, 'Anggara', 21312233, 'Sony', 3, 2, 0),
(4, 'Widodo', 5745, 'Paijem', 0, 0, 0),
(5, 'Sukijem', 4367568, 'Sukirman', 0, 0, 0),
(6, 'Paijem', 4367568, 'Paijo', 1, 1, 0),
(26, 'Tono', 2121, 'Tinem', 4, 2, 0),
(56, 'Sendi', 50, 'Diki', 5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'testing', '$2y$10$1pc6/rMa8LEEvKi5E0ZfW.gJw/VulfUGbT6l4yferI6gbZa7AXcVC'),
(2, 'aldim65', '$2y$10$sDg4aPhidjeGOUdENu0xBu/rUcNnheP58LVbRbPBWrq1irzfJAKGu');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sekolah`
-- (See below for the actual view)
--
CREATE TABLE `view_sekolah` (
`id_sekolah` int(11)
,`nama_sekolah` varchar(100)
,`alamat_sekolah` varchar(100)
,`akreditasi_sekolah` varchar(10)
,`jenjang_pendidikan` varchar(100)
,`jumlah_kelas` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`id_siswa` int(11)
,`nama_siswa` varchar(100)
,`no_hp_siswa` int(11)
,`wali_siswa` varchar(100)
,`nama_sekolah` varchar(100)
,`alamat_sekolah` varchar(100)
,`akreditasi_sekolah` varchar(10)
,`jenjang_pendidikan` varchar(100)
,`jumlah_kelas` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_sekolah`
--
DROP TABLE IF EXISTS `view_sekolah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sekolah`  AS SELECT `sekolah`.`id_sekolah` AS `id_sekolah`, `sekolah`.`nama_sekolah` AS `nama_sekolah`, `sekolah`.`alamat_sekolah` AS `alamat_sekolah`, `sekolah`.`akreditasi_sekolah` AS `akreditasi_sekolah`, `jenjang`.`jenjang_pendidikan` AS `jenjang_pendidikan`, `jenjang`.`jumlah_kelas` AS `jumlah_kelas` FROM (`sekolah` join `jenjang` on(`sekolah`.`id_jenjang` = `jenjang`.`id_jenjang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`no_hp_siswa` AS `no_hp_siswa`, `siswa`.`wali_siswa` AS `wali_siswa`, `sekolah`.`nama_sekolah` AS `nama_sekolah`, `sekolah`.`alamat_sekolah` AS `alamat_sekolah`, `sekolah`.`akreditasi_sekolah` AS `akreditasi_sekolah`, `jenjang`.`jenjang_pendidikan` AS `jenjang_pendidikan`, `jenjang`.`jumlah_kelas` AS `jumlah_kelas` FROM ((`siswa` left join `sekolah` on(`siswa`.`id_sekolah` = `sekolah`.`id_sekolah`)) left join `jenjang` on(`siswa`.`id_jenjang` = `jenjang`.`id_jenjang`)) WHERE `siswa`.`is_delete` = 0 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
