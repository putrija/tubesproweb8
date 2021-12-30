-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 04:18 PM
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
(19, 'putriputri', 'putrijamalau23@gmail.com', '38cb4bf4429deb51f5a9a1a541ae135747c5bbf6', 'user', '907052'),
(20, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'user', ''),
(21, 'fayadh', 'fayadhfnst@gmail.com', '70793be5c63a22446c916590588e242544e5e960', 'user', '0'),
(22, 'felicia', 'felicia.nelvn@gmail.com', '4b2e174904abfde41ce4f669c4ad5cc9f4123c7e', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(200) NOT NULL,
  `id_kategori` int(200) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `jumlah` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama_barang`, `deskripsi`, `image`, `jumlah`) VALUES
(1, 1, 'iPhone 13 Pro', 'iPhone', 'iphone_13_pro.jpg', 77),
(2, 1, 'iPhone 13', 'iPhone', 'iPhone_13.jpg', 0),
(3, 2, 'iPad Pro Generasi 5', 'iPad', 'iPad_5.jpg', 25),
(4, 2, 'iPad Pro Generasi 4', 'iPad', 'iPad_4.jpg', 0),
(5, 3, 'Apple Watch SE', 'Watch', 'watch_SE.png', 0),
(6, 3, 'Apple Watch Series 7', 'Watch', 'watch_7.jpg', 0),
(7, 4, 'MacBook Pro M1 (2020)', 'Mac', 'macbook_pro_m1.jpg', 0),
(8, 4, 'MacBook Air M1 (2020)', 'Mac', 'macbook_air_m1.jpg', 0),
(9, 1, 'iPhone 12 Pro', 'iPhone', 'iPhone_12_promax.jpg', 0),
(10, 1, 'iPhone 12', 'iPhone', 'iphone_12.jpeg', 0),
(11, 1, 'iPhone SE', 'iPhone', 'iphone_SE.jpg', 0),
(12, 1, 'iPhone 11 Pro', 'iPhone', 'iPhone_11_pro.jpg', 0),
(13, 1, 'iPhone 11', 'iPhone', 'iphone_11.jpg', 0),
(14, 1, 'iPhone XR', 'iPhone', 'iphone_xr.jpg', 35),
(15, 1, 'iPhone XS', 'iPhone', 'iphone-xs.jpg', 0),
(16, 1, 'iPhone X', 'iPhone', 'iphone-x.jpg', 15),
(17, 2, 'iPad Pro Generasi 3', 'iPad', 'ipad_3.webp', 0),
(18, 2, 'iPad Air Generasi 4', 'iPad', 'ipad-air-4.webp', 50),
(19, 2, 'iPad Generasi 9', 'iPad', 'ipad-9.jpg', 0),
(20, 2, 'iPad Generasi 8', 'iPad', 'ipad-8.webp', 0),
(21, 2, 'iPad mini Generasi 6', 'iPad', 'ipad-mini-6.jpg', 0),
(22, 2, 'iPad mini Generasi 5', 'iPad', 'ipad-mini-5.jpg', 0),
(23, 3, 'Apple Watch Series 6', 'Watch', 'watch-6.jpg', 0),
(24, 3, 'Apple Watch Series 5', 'Watch', 'watch-5.jpg', 0),
(25, 3, 'Apple Watch Series 3', 'Watch', 'watch-3.jpg', 0),
(26, 4, 'MacBook Pro (16 Inci)', 'Mac', 'macbook-pro-16.webp', 0),
(27, 4, 'MacBook Pro (2020)', 'Mac', 'macbook-pro-2020.jpg', 50),
(28, 4, 'MacBook Air (2020)', 'Mac', 'macbook_air_2020.webp', 0),
(29, 4, 'MacBook Air (2017)', 'Mac', 'macbook-air-2017.webp', 25),
(30, 4, 'iMac M1 2021', 'Mac', 'imac_m1_pro.jpg', 0),
(31, 4, 'iMac Pro', 'Mac', 'imac-pro.webp', 0),
(32, 4, 'iMac 2020', 'Mac', 'imac_2020.jpg', 85),
(33, 4, 'Mac Mini M1 (2020)', 'Mac', 'mac_mini_m1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(200) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'iPhone'),
(2, 'iPad'),
(3, 'Watch'),
(4, 'Mac');

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
(26, 35, '2021-12-23 15:34:18', 'putri', 100),
(27, 36, '2021-12-23 17:53:57', 'putri', 100),
(28, 45, '2021-12-29 06:41:04', 'putri', 4);

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
(46, 35, '2021-12-23 15:34:05', 'putri', 300),
(49, 46, '2021-12-30 14:21:20', '', 76),
(50, 51, '2021-12-30 14:21:29', '', 45),
(51, 52, '2021-12-30 14:21:41', '', 44);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `idsaran` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `isi` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL DEFAULT 'umum',
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`idsaran`, `iduser`, `isi`, `waktu`, `tujuan`, `level`) VALUES
(35, 7, 'Apa saja jenis iPhone yang tersedia sekarang?', '1640877419', 'umum', 'user'),
(36, 2, 'untuk sekarang masih iPhone 13 Pro saja kak', '1640877458', '7', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(20) NOT NULL,
  `deskripsi` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idbarang`, `namabarang`, `deskripsi`, `image`, `stock`) VALUES
(46, 'iPhone 13 Pro', 'iPhone', 'iphone_13_pro.jpg', 77),
(47, 'iPad Air Generasi 4', 'iPad', 'ipad-air-4.webp', 50),
(48, 'iPad Pro Generasi 5', 'iPad', 'iPad_5.jpg', 25),
(49, 'iPhone X', 'iPhone', 'iphone-x.jpg', 15),
(50, 'iPhone XR', 'iPhone', 'iphone_xr.jpg', 35),
(51, 'iMac 2020', 'Mac', 'imac_2020.jpg', 85),
(52, 'MacBook Pro M1 (2020', 'Mac', 'macbook_pro_m1.jpg', 44),
(53, 'MacBook Pro (2020)', 'Mac', 'macbook-pro-2020.jpg', 50),
(54, 'MacBook Air (2017)', 'Mac', 'macbook-air-2017.webp', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `idsaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
