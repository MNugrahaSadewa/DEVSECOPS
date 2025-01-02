-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2024 at 05:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(25, 'nugraha', 'ed440526322bfa26905aa5d621a0c246'),
(26, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `action` varchar(500) NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `timestamp`) VALUES
(5, 1, '24', '2024-12-30 21:00:40'),
(6, 1, '25', '2024-12-30 21:01:05'),
(7, 25, '25', '2024-12-30 21:10:13'),
(8, 25, '25', '2024-12-30 21:27:07'),
(9, 25, '25', '2024-12-30 21:27:10'),
(10, 25, '25', '2024-12-30 21:27:15'),
(11, 25, 'Admin nugraha 25', '2024-12-30 21:35:59'),
(12, 25, 'Admin nugraha 25', '2024-12-30 21:36:07'),
(13, 25, 'Admin nugraha 25 Login in', '2024-12-30 21:37:34'),
(14, 25, 'Admin nugraha 25 Login in', '2024-12-30 21:37:39'),
(15, 25, 'Admin nugraha  Login in', '2024-12-30 21:38:35'),
(16, 25, '', '2024-12-30 21:42:34'),
(17, 25, '', '2024-12-30 21:42:38'),
(18, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 21:48:25'),
(19, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 21:48:27'),
(20, 25, '', '2024-12-30 21:49:41'),
(21, 25, '', '2024-12-30 21:49:43'),
(22, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:14:47'),
(23, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:14:49'),
(24, 25, 'Admin nugraha melakukan aksi Admin nugraha logged in', '2024-12-30 22:16:58'),
(25, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:17:00'),
(26, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:18:32'),
(27, 25, 'Admin nugraha melakukan aksi  logged out', '2024-12-30 22:18:33'),
(28, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:19:02'),
(29, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1103210234', '2024-12-30 22:19:34'),
(30, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:19:34'),
(31, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1103210234', '2024-12-30 22:19:44'),
(32, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:19:44'),
(33, 25, 'Admin nugraha melakukan aksi menambahkan data mahasiswa dengan NIM 103210078', '2024-12-30 22:21:05'),
(34, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:21:05'),
(35, 25, 'Admin nugraha melakukan aksi menambahkan data mahasiswa dengan NIM 1103217832', '2024-12-30 22:26:14'),
(36, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:26:14'),
(37, 25, 'Admin nugraha melakukan aksi  logged out', '2024-12-30 22:29:38'),
(38, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:29:44'),
(39, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:30:07'),
(40, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:30:07'),
(41, 25, 'Admin nugraha melakukan aksi  logged out', '2024-12-30 22:32:48'),
(42, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:32:54'),
(43, 25, 'Admin nugraha melakukan aksi menghapus data mahasiswa dengan NIM 1103210000', '2024-12-30 22:33:04'),
(44, 25, 'Admin nugraha melakukan aksi menambahkan data mahasiswa dengan NIM 1107457834', '2024-12-30 22:33:31'),
(45, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:33:31'),
(46, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1107457834', '2024-12-30 22:34:25'),
(47, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:34:25'),
(48, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1107457834', '2024-12-30 22:34:51'),
(49, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:34:51'),
(50, 25, 'Admin nugraha melakukan aksi menghapus data mahasiswa dengan NIM 1107457834', '2024-12-30 22:37:17'),
(51, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1103217832', '2024-12-30 22:40:23'),
(52, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:40:23'),
(53, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM 1103217832', '2024-12-30 22:40:52'),
(54, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:40:52'),
(55, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM tes 1103217832', '2024-12-30 22:41:46'),
(56, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:41:46'),
(57, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM  1103217832', '2024-12-30 22:43:04'),
(58, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM  1103210234', '2024-12-30 22:47:25'),
(59, 25, 'Admin nugraha melakukan aksi mengubah data mahasiswa dengan NIM  103210078', '2024-12-30 22:47:54'),
(60, 25, 'Admin nugraha melakukan aksi menambahkan data mahasiswa dengan NIM 3423423423', '2024-12-30 22:48:05'),
(61, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 22:48:05'),
(62, 25, 'Admin nugraha melakukan aksi menghapus data mahasiswa dengan NIM 3423423423', '2024-12-30 22:48:57'),
(63, 25, 'Admin nugraha melakukan aksi menambahkan data mahasiswa dengan NIM 21312', '2024-12-30 22:49:22'),
(64, 25, 'Admin nugraha melakukan aksi menghapus data mahasiswa dengan NIM 21312', '2024-12-30 22:49:32'),
(65, 25, 'Admin nugraha melakukan aksi  logged out', '2024-12-30 22:51:54'),
(66, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:52:03'),
(67, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 22:55:35'),
(68, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:55:46'),
(69, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 22:55:48'),
(70, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:58:26'),
(71, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 22:58:28'),
(72, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 22:59:30'),
(73, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:00:05'),
(74, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:00:54'),
(75, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:01:23'),
(76, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:01:44'),
(77, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:02:12'),
(78, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:02:57'),
(79, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:03:06'),
(80, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:03:07'),
(81, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:03:15'),
(82, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 23:03:51'),
(83, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:04:00'),
(84, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:04:51'),
(85, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:05:13'),
(86, 25, 'Admin nugraha melakukan aksi 25', '2024-12-30 23:08:12'),
(87, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:08:20'),
(88, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:08:53'),
(89, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:11:33'),
(90, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:13:23'),
(91, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:14:15'),
(92, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:14:19'),
(93, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:18:18'),
(94, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:18:20'),
(95, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:19:38'),
(96, 25, 'Admin nugraha melakukan aksi Admin logged out', '2024-12-30 23:19:40'),
(97, 25, 'Admin nugraha melakukan aksi  logged in', '2024-12-30 23:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kelas` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `kelas`, `jurusan`, `semester`) VALUES
(20, 'Febrian Yuda Pratama', '1103213067', 'TK-45_01', 'TEKNIK KOMPUTER', '9'),
(23, 'Muhammad Nugraha Sadewa', '1103210061', 'TK-45-01', 'TEKNIK KOMPUTER', '8'),
(24, 'Sultan Faiq Athallah', '1103213020', 'TK-45-01', 'TEKNIK KOMPUTER', '12'),
(25, 'Muhammad Maklufi Makbullah', '1103210023', 'TK-45-02', 'TEKNIK KOMPUTER', '1'),
(26, 'A GUS  VIRAL', '1103210234', 'TK-69-01', 'TEKNIK KOMPUTER', '69'),
(27, 'Vicidior', '103210078', 'TK-69-02', 'TEKNIK KOMPUTER', '2'),
(28, 'Prabowo Subianto', '1103217832', 'TK-01-01', 'TEKNIK KOMPUTER', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
