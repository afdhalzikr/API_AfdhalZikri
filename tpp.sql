-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 10:04 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kinerja`
--

CREATE TABLE `kinerja` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `jumlah_hari_kerja` int(10) NOT NULL,
  `hadir` int(10) DEFAULT NULL,
  `izin` int(10) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `cuti` int(11) DEFAULT NULL,
  `tanpa_alasan` int(11) DEFAULT NULL,
  `terlambat` int(11) DEFAULT NULL,
  `cepat_pulang` int(11) DEFAULT NULL,
  `uwas` int(11) DEFAULT NULL,
  `upacara` int(11) DEFAULT NULL,
  `wirid` int(11) DEFAULT NULL,
  `apel` int(11) DEFAULT NULL,
  `senam` int(11) DEFAULT NULL,
  `skp` int(11) DEFAULT NULL,
  `orientasi_pelayanan` int(11) DEFAULT NULL,
  `integritas` int(11) DEFAULT NULL,
  `komitmen` int(11) DEFAULT NULL,
  `disiplin` int(11) DEFAULT NULL,
  `kerjasama` int(11) DEFAULT NULL,
  `kepemimpinan` int(11) DEFAULT NULL,
  `lkh` int(11) DEFAULT NULL,
  `sop` int(11) DEFAULT NULL,
  `pegawai_nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinerja`
--

INSERT INTO `kinerja` (`id`, `tahun`, `bulan`, `jumlah_hari_kerja`, `hadir`, `izin`, `sakit`, `cuti`, `tanpa_alasan`, `terlambat`, `cepat_pulang`, `uwas`, `upacara`, `wirid`, `apel`, `senam`, `skp`, `orientasi_pelayanan`, `integritas`, `komitmen`, `disiplin`, `kerjasama`, `kepemimpinan`, `lkh`, `sop`, `pegawai_nip`) VALUES
(1, 2018, 'januari', 20, 12, 3, 1, 4, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4, 60, 1, 1, 1, 1, '178292992');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pangkat_golongan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tpp_maksimal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `pangkat_golongan`, `jabatan`, `tpp_maksimal`) VALUES
('1415781990200', 'Usman', 'III B', 'Fungsional', 2000000),
('1467289910000', 'Anita', 'III A', 'Staf Departemen PSDM', 30000000),
('178292992', 'Azmi', 'III B', 'Pranata', 2000000),
('738390300', 'Anamar', 'iva', 'Camat', 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Afdhal Zikri', 'afdhal@gmail.com', '$2y$10$YHzvpyxCiEHj1Cv3LwMww.SrwWcF.mJFEatYDhwroiD4iacLyFJMi', 'GujGLRH1PMXEylJ5FgEUPK6PH6J13QlyfF5Y1ylwYxkYiq7lcpwzWcRB6S2Q', '2018-10-14 20:01:04', '2018-10-14 20:01:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_nip` (`pegawai_nip`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
