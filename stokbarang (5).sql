-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 03:18 PM
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
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(5) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `email`, `password`, `level`, `code`) VALUES
(2, 'putrija', 'putrija@gmail.com', '8dd79c49d0be6850d0c633f2c2435db2bacbd0cb', 'admin', ''),
(3, 'put', 'put@gmail.com', '132aeadf736728a3f874cd17615dda27830e8cbd', 'user', ''),
(6, 'putrii', 'putrii@gmail.com', '46383631c172c7362fcb3d7196715a5b4b92b6af', 'user', ''),
(7, 'bintang', 'bintang@gmail.com', '1e1166f6d3034379d06cda378b8d8ad708d2afb6', 'user', ''),
(8, 'hihihi', 'hihihi@gmail.com', '3085296069762c17b36f0cb5db8110c654b4d669', 'user', ''),
(9, 'tubes', 'tubes@gmail.com', '7e37c810a75ab2fcf3cb7d8baacb368268d38e8f', 'user', ''),
(11, 'a', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'user', ''),
(14, 'makasih', 'makasih@gmail.com', '52001292f1348b1cebff1b711488e3471c731272', 'user', ''),
(16, 'marikitacoba', 'marikitacoba@gmail.c', '0eeec8b926e870f701cea577fb9a7b718141746d', 'user', ''),
(19, 'putriputri', 'putrijamalau23@gmail.com', '38cb4bf4429deb51f5a9a1a541ae135747c5bbf6', 'user', '0'),
(20, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'user', ''),
(21, 'fayadh', 'fayadhfnst@gmail.com', '70793be5c63a22446c916590588e242544e5e960', 'user', '0');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(20) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `kuantitas`) VALUES
(15, 11, '2021-12-16 03:59:20', 'putrija', 10),
(16, 14, '2021-12-16 05:47:09', 'putrija', 100),
(17, 15, '2021-12-16 05:48:01', 'putri', 200),
(21, 14, '2021-12-16 08:43:48', 'bintang', 1300),
(22, 16, '2021-12-16 09:03:23', 'putri', 1000),
(23, 15, '2021-12-16 09:06:26', 'putri', 10),
(24, 19, '2021-12-16 15:29:47', 'aa', 2),
(25, 14, '2021-12-16 19:33:36', 'a', 50);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(20) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `kuantitas`) VALUES
(22, 11, '2021-12-16 04:19:32', 'barang baru', 300),
(27, 13, '2021-12-16 04:57:28', 'putri', 150),
(33, 14, '2021-12-16 05:43:33', 'putri', 50),
(34, 14, '2021-12-16 08:41:40', 'putri', 650),
(35, 19, '2021-12-16 15:29:28', 'aa', 3),
(36, 14, '2021-12-16 19:33:10', 'a', 100);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `idsaran` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`idsaran`, `iduser`, `isi`) VALUES
(4, 11, 'minta tolong masukkan barang a');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `deskripsi` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
(14, 'Macbook Pro M1(2020)', 'Mac', 100),
(15, 'iPhone 13', 'iPhone', 90),
(16, 'iPhone 13 Pro', 'iPhone', 1),
(17, 'Apple Watch Series 7', 'Watch', 20),
(18, 'iPad Pro Generasi 5', 'iPad', 350);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`idsaran`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `idsaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
