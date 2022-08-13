-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 02:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gelato`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `bahan_baku` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `bahan_baku`, `stok`) VALUES
(1, 'Roti', 22),
(2, 'Garam', 15),
(3, 'Mentega', 9),
(4, 'Telur', 15),
(5, 'Tepung Terigu', 16),
(6, 'Jeruk', 16),
(7, 'Blueberry', 16),
(8, 'Daging Sapi', 20),
(9, 'Kecap Manis', 20),
(10, 'Wortel', 20),
(11, 'Bebek', 20),
(12, 'Sauce Barbeque', 20),
(13, 'Susu', 20),
(14, 'Coklat', 20),
(15, 'Cream', 20),
(16, 'Creps', 20),
(17, 'Strobery', 20),
(18, 'Pisang', 20),
(19, 'Green tea', 20),
(20, 'Ubi', 20),
(21, 'Kiwi', 23),
(22, 'Soda', 20),
(23, 'Mangga', 20),
(24, 'Markisa', 20),
(25, 'Nasi', 20),
(26, 'Ayam', 20),
(27, 'Cabe', 20),
(29, 'Timun', 20),
(30, 'Sambal', 20),
(31, 'Kelapa', 20),
(33, 'Kacang', 20),
(34, 'Alpukat', 52),
(35, 'Marjan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahanbaku` int(12) NOT NULL,
  `id_makanan` int(12) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah_pakai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahanbaku`, `id_makanan`, `id_bahan`, `jumlah_pakai`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 5, 1),
(6, 2, 6, 1),
(7, 2, 7, 1),
(8, 3, 8, 1),
(9, 3, 9, 1),
(10, 3, 10, 1),
(11, 4, 11, 1),
(12, 4, 12, 1),
(13, 5, 13, 1),
(14, 5, 14, 1),
(15, 5, 15, 1),
(16, 5, 16, 1),
(17, 6, 15, 1),
(18, 6, 13, 1),
(19, 6, 17, 1),
(20, 7, 13, 1),
(21, 7, 15, 1),
(22, 7, 18, 1),
(23, 8, 13, 1),
(24, 8, 15, 1),
(25, 8, 19, 1),
(26, 8, 20, 1),
(28, 9, 21, 1),
(29, 9, 15, 1),
(30, 9, 22, 1),
(31, 10, 23, 1),
(32, 10, 24, 1),
(33, 10, 22, 1),
(34, 11, 25, 1),
(35, 11, 26, 1),
(36, 11, 27, 1),
(37, 11, 4, 1),
(38, 11, 29, 1),
(39, 11, 30, 1),
(40, 12, 26, 1),
(41, 12, 13, 1),
(42, 12, 31, 1),
(43, 13, 8, 1),
(44, 13, 31, 1),
(45, 13, 13, 1),
(46, 14, 13, 1),
(47, 14, 17, 1),
(48, 14, 23, 1),
(49, 14, 33, 1),
(50, 14, 34, 1),
(51, 15, 8, 1),
(52, 15, 33, 1),
(53, 16, 22, 1),
(54, 16, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_bahan`
--

CREATE TABLE `history_bahan` (
  `id_history` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `tanggal` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_bahan`
--

INSERT INTO `history_bahan` (`id_history`, `id_bahan`, `jumlah`, `status`, `tanggal`) VALUES
(2, 2, 6, 'Masuk', '2019-08-03'),
(3, 4, 6, 'Masuk', '2019-08-03'),
(6, 34, 10, 'Masuk', '2019-08-14'),
(7, 21, 2, 'Masuk', '2019-08-14'),
(8, 1, 2, 'Masuk', '2019-08-15'),
(9, 1, 0, 'Masuk', '2019-08-15'),
(10, 34, 0, 'Masuk', '2019-08-15'),
(11, 34, 0, 'Masuk', '2019-08-15'),
(12, 1, 0, 'Masuk', '2019-08-15'),
(13, 1, 0, 'Masuk', '2019-08-15'),
(14, 34, 0, 'Masuk', '2019-08-15'),
(15, 1, 0, 'Masuk', '2019-08-15'),
(16, 34, 0, 'Masuk', '2019-08-15'),
(17, 34, 0, 'Masuk', '2019-08-15'),
(18, 1, 0, 'Masuk', '2019-08-15'),
(19, 34, 0, 'Masuk', '2019-08-15'),
(20, 34, 0, 'Masuk', '2019-08-15'),
(21, 34, 22, 'Masuk', '2019-08-15'),
(22, 1, 20, 'Masuk', '2019-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `history_pesan`
--

CREATE TABLE `history_pesan` (
  `id_history` int(11) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL,
  `tanggal` varchar(64) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `history_pesan`
--

INSERT INTO `history_pesan` (`id_history`, `nama_pelanggan`, `no_meja`, `id_makanan`, `jumlah_makanan`, `tanggal`, `status`) VALUES
(5, 'guntur', 1, 1, 5, '2019-07-30', 1),
(6, 'guntur', 1, 2, 1, '2019-07-30', 1),
(8, 'guntur', 1, 2, 2, '2019-08-01', 1),
(13, 'guntur', 1, 1, 2, '2019-08-02', 1),
(14, 'guntur', 1, 1, 1, '2019-08-03', 1),
(18, 'guntur', 1, 1, 1, '2019-08-04', 1),
(19, 'guntur', 1, 1, 3, '2019-08-14', 0),
(20, 'guntur', 1, 1, 1, '2019-08-15', 0),
(22, 'guntur', 1, 2, 4, '2019-08-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `pelayanan` text NOT NULL,
  `makanan` text NOT NULL,
  `tempat` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `jumlah_kursi`) VALUES
(1, 2),
(2, 4),
(3, 6),
(4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `harga_makanan` int(15) NOT NULL,
  `status` int(11) NOT NULL,
  `foto_makanan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `status`, `foto_makanan`) VALUES
(1, 'Roti Bakar', 10000, 1, 'img/makanan/makanan1.jpg'),
(2, 'Pancake', 20000, 1, 'img/makanan/makanan2.jpg'),
(3, 'Steak', 30000, 1, 'img/makanan/makanan3.jpg'),
(4, 'Bebek Bakar', 10000, 1, 'img/makanan/1.jpg'),
(5, 'Gelato blue and chocolate', 15000, 1, 'img/makanan/2.jpg'),
(6, 'Gelato cream stobery', 15000, 1, 'img/makanan/3.jpg'),
(7, 'Gelato creps and banana', 18000, 1, 'img/makanan/4.jpg'),
(8, 'Gelato 3 fun', 25000, 1, 'img/makanan/5.jpg'),
(9, 'Juice kiwi and cream', 15000, 0, 'img/makanan/6.jpg'),
(10, 'Juice mango and markisa', 15000, 0, 'img/makanan/7.jpg'),
(11, 'Nasi timbel ayam kumplit', 25000, 1, 'img/makanan/8.jpg'),
(12, 'Opor ayam', 20000, 1, 'img/makanan/9.jpg'),
(13, 'Rendang', 14000, 1, 'img/makanan/10.jpg'),
(14, 'Salad buah', 12000, 1, 'img/makanan/11.jpg'),
(15, 'Sate marangi', 17000, 1, 'img/makanan/12.jpg'),
(16, 'Blue sky white soda', 16000, 0, 'img/makanan/13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL,
  `status_meja` int(11) NOT NULL,
  `status_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `id_kursi`, `status_meja`, `status_nota`) VALUES
(1, 1, 0, 0),
(2, 1, 0, 0),
(3, 1, 0, 0),
(4, 1, 0, 0),
(5, 2, 0, 0),
(6, 2, 0, 0),
(7, 2, 0, 0),
(8, 2, 0, 0),
(9, 3, 0, 0),
(10, 3, 0, 0),
(11, 4, 0, 0),
(12, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL,
  `status_makanan` int(11) NOT NULL,
  `status_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `level` enum('Pelayan','Koki','Kasir','Pantry','Owner','Customer-service') NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `level`, `image`) VALUES
('alfa', '56aed7e7485ff03d5605b885b86e947e', 'test', 'Koki', 'img/55420.jpg'),
('defrag', 'a171f02b066a4f3142b6a9b0e5c354fd', 'defrag', 'Customer-service', 'img/default.jpg'),
('gabu', '2a8306749c80cfeb2a935fc5259971a7', 'ma boi', 'Kasir', 'img/39945255_1781544745277839_2504851010363588608_n.jpg'),
('guntur', '30d8692c0d2ac50d082f20cfc4648206', 'Guntur', 'Owner', 'img/55409.jpg'),
('jul', 'f05c8652de134d5c50729fa1b31d355b', 'jul', 'Pelayan', 'img/118866.jpg'),
('yuda', 'ac9053a8bd7632586c3eb663a6cf15e4', 'empat', 'Pantry', 'img/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indexes for table `history_bahan`
--
ALTER TABLE `history_bahan`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `history_pesan`
--
ALTER TABLE `history_pesan`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahanbaku` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `history_bahan`
--
ALTER TABLE `history_bahan`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `history_pesan`
--
ALTER TABLE `history_pesan`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
