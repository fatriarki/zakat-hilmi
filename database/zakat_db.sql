-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 11:07 AM
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
-- Database: `zakat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `id_mustahik` int(200) NOT NULL,
  `kategori_mustahik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`id_mustahik`, `kategori_mustahik`) VALUES
(1, 'fakir'),
(2, 'miskin'),
(3, 'amil'),
(4, 'muallaf'),
(5, 'riqab'),
(6, 'gharim'),
(7, 'fisabilillah'),
(8, 'ibnusabil');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(200) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `jml_tanggungan` int(50) NOT NULL,
  `jml_bayar` int(11) NOT NULL,
  `uang` int(50) NOT NULL,
  `beras` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jml_tanggungan`, `jml_bayar`, `uang`, `beras`) VALUES
(7, 'rafi', 2, 2, 70000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(200) NOT NULL,
  `jenis_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `jenis_bayar`) VALUES
(1, 'beras'),
(2, 'uang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_distribusi`
--

CREATE TABLE `tb_distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jml_tanggungan` int(11) NOT NULL,
  `besar` float NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_distribusi`
--

INSERT INTO `tb_distribusi` (`id_distribusi`, `nama`, `kategori`, `jml_tanggungan`, `besar`, `waktu`) VALUES
(5, 'hilmi', 'amil', 2, 5, '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran_zakat`
--

CREATE TABLE `tb_pembayaran_zakat` (
  `id_pembayaran` int(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kategori` enum('beras','uang') NOT NULL,
  `nominal` int(15) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran_zakat`
--

INSERT INTO `tb_pembayaran_zakat` (`id_pembayaran`, `jenis`, `kategori`, `nominal`, `nama_lengkap`) VALUES
(36, 'Zakat Fitrah', 'beras', 2, 'rafi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_zakat`
--

CREATE TABLE `tb_zakat` (
  `id_zakat` int(10) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_zakat`
--

INSERT INTO `tb_zakat` (`id_zakat`, `jenis_zakat`) VALUES
(1, 'Zakat Penghasilan'),
(2, 'Zakat Maal'),
(3, 'Zakat Fitrah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`id_mustahik`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD PRIMARY KEY (`id_distribusi`);

--
-- Indexes for table `tb_pembayaran_zakat`
--
ALTER TABLE `tb_pembayaran_zakat`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_zakat`
--
ALTER TABLE `tb_zakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mustahik`
--
ALTER TABLE `mustahik`
  MODIFY `id_mustahik` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  MODIFY `id_distribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembayaran_zakat`
--
ALTER TABLE `tb_pembayaran_zakat`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_zakat`
--
ALTER TABLE `tb_zakat`
  MODIFY `id_zakat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
