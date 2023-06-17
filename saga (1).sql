-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 04:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saga`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `bobot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `name`, `ket`, `bobot`) VALUES
(1, 'Peraturan Baris Berbaris (PBB) ', '1-5=kurang baik, 6-7=baik, 8-10=sangat baik', '1-10'),
(2, 'Fisik', '1-5=tidak mendukung, 6-7=mendukung, 8-10=sangat mendukung', '1-10'),
(3, 'Pengetahuan', '1-5=kurang baik, 6-7=baik, 8-10=sangat baik', '1-10');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `nis` int(128) NOT NULL,
  `pbb` int(128) NOT NULL,
  `fisik` int(128) NOT NULL,
  `pengetahuan` int(128) NOT NULL,
  `klasifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `name`, `nis`, `pbb`, `fisik`, `pengetahuan`, `klasifikasi`) VALUES
(20, 'Alvira Widi Astuti', 12016001, 6, 8, 8, 'Lulus'),
(22, 'Alvira Widi Astuti', 12016001, 6, 8, 8, 'Lulus'),
(23, 'Alvira Widi Astuti', 12016001, 6, 8, 8, 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `testing_normal`
--

CREATE TABLE `testing_normal` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `nis` int(128) NOT NULL,
  `pbb` int(50) NOT NULL,
  `fisik` int(50) NOT NULL,
  `pengetahuan` int(50) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_normal`
--

INSERT INTO `testing_normal` (`id`, `name`, `nis`, `pbb`, `fisik`, `pengetahuan`, `klasifikasi`) VALUES
(2, 'pira', 1234, 5, 5, 5, 'tidak lulus'),
(3, 'pirul', 2345, 8, 7, 6, 'lulus');

-- --------------------------------------------------------

--
-- Table structure for table `uji`
--

CREATE TABLE `uji` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nis` int(20) NOT NULL,
  `pbb` int(20) NOT NULL,
  `fisik` int(20) NOT NULL,
  `pengetahuan` int(20) NOT NULL,
  `klasifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uji`
--

INSERT INTO `uji` (`id`, `name`, `nis`, `pbb`, `fisik`, `pengetahuan`, `klasifikasi`) VALUES
(1, 'Alvira Widi Astuti', 5213, 3, 3, 3, 'Lulus'),
(2, 'Anik Nafiah', 12016002, 3, 3, 2, 'Lulus'),
(4, 'Alvira Widi Astuti', 12016002, 4, 4, 4, 'Lulus'),
(5, 'Vira', 12016003, 1, 1, 1, 'Tidak Lulus'),
(7, 'Octavia Indriyani', 12016006, 6, 4, 8, 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `uji_normal`
--

CREATE TABLE `uji_normal` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nis` int(20) NOT NULL,
  `pbb` int(20) NOT NULL,
  `fisik` int(20) NOT NULL,
  `pengetahuan` int(20) NOT NULL,
  `klasifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nis` int(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nis`, `email`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'Alvira Widi Astuti', 12016001, 'alvirawidia@gmail.com', 'XII TKJ 2', 'Boyolali', '2001-09-19', 'default.jpg', '$2y$10$6byJv9jGW4LO3X7EFC21tu.lY3xlBn/wFfgoRQcXuU1YSPEDFengS', 1, 1, 1681219115),
(7, 'Anik Nafiah', 12016002, 'aniknafiah@gmail.com', 'XII  MM 1', 'Boyolali', '2002-06-05', 'default.jpg', '$2y$10$AMWSIGVbxR1o2EnMa4uWO.NZMWGaEDuTUK1rMtPwIp4VnTAkh/ZrW', 2, 1, 1681528986),
(10, 'Octavia Indriyani', 12016003, 'octavia@gmail.com', '0', '0', '0000-00-00', 'default.jpg', '$2y$10$1SE6Ebz3PUJVW/lL0WF7AuRPyQriXPn7hb0Lp8jNYyDZOELB/tyTe', 2, 1, 1683200351),
(11, 'liyana', 12016015, 'liyana@gmail.com', '0', '0', '0000-00-00', 'default.jpg', '$2y$10$Y3s9bcrRa64p.fdbiX1kPO14ExSRf4YqYLxiytYbxYMsQDLZM/IY2', 2, 1, 1683811140);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Panitia'),
(2, 'Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Panitia'),
(2, 'Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'panitia', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-fw fa-user-circle', 1),
(4, 2, 'View Data Diri', 'user/view_datadiri', '', 1),
(5, 1, 'Profil', 'user', 'fas fa-fw fa-user-circle', 1),
(6, 1, 'Data Peserta', 'panitia/tabel', 'fas fa-fw fa-table', 1),
(7, 2, 'Edit Data Diri', 'user/editdata', 'fas fa-fw fa-user', 1),
(9, 2, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Ubah Password', 'user/ubahpassword', 'fas fa-fw fa-key', 1),
(11, 1, 'Kriteria', 'panitia/kriteria', 'fas fa-fw fa-bars', 1),
(12, 1, 'Data Testing', 'panitia/testing', 'fas fa-fw fa-th-large', 1),
(13, 1, 'Data Uji', 'panitia/uji', 'fas fa-fw fa-th', 1),
(14, 1, 'Prediksi', 'panitia/prediksi', 'fas fa-fw fa-calculator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'alvirawidia@gmail.com', 'Fn97JQJc4GM4GKHk0+Sjws2zNyGSzBrrfyZj2eGFfus=', 1681219120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_normal`
--
ALTER TABLE `testing_normal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uji`
--
ALTER TABLE `uji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uji_normal`
--
ALTER TABLE `uji_normal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `testing_normal`
--
ALTER TABLE `testing_normal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uji`
--
ALTER TABLE `uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uji_normal`
--
ALTER TABLE `uji_normal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
