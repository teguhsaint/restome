-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 10:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restoku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `keterangan`) VALUES
(6, 'Air Mineral'),
(3, 'Camilan'),
(2, 'Cool Drink'),
(1, 'Hot Drink'),
(5, 'Makanan'),
(7, 'Salad');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `m_kategori` varchar(30) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `gambar_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `m_kategori`, `harga`, `gambar_menu`) VALUES
(25, 'Kentang Goreng', 'Camilan', 6000, ''),
(26, 'Brown Sugar', 'Cool Drink', 7000, ''),
(27, 'Aqua Medium', 'Air Mineral', 5000, ''),
(28, 'Aqua Besar', 'Air Mineral', 7000, ''),
(29, 'Udang Goreng', 'Makanan', 10000, ''),
(30, 'Salat Buah', 'Salad', 5000, ''),
(31, 'Seblak', 'Makanan', 8000, ''),
(32, 'Nasi Goreng Udang', 'Makanan', 12000, ''),
(33, 'Nasi Goreng Jawa', 'Makanan', 8000, ''),
(34, 'Nasi Goreng Cumi', 'Makanan', 12000, ''),
(35, 'Smoothies', 'Cool Drink', 6000, ''),
(36, 'Bubble Milk Tea', 'Cool Drink', 7000, ''),
(37, 'Cappucino', 'Hot Drink', 7000, ''),
(38, 'Cafe latte', 'Hot Drink', 7000, ''),
(39, 'Kopi susu vanilla', 'Hot Drink', 12000, ''),
(40, 'Kopi susu caramel', 'Hot Drink', 12000, ''),
(41, 'Kopi susu oreo', 'Hot Drink', 12000, ''),
(42, 'Matcha latte', 'Hot Drink', 12000, ''),
(43, 'Diet Fruit', 'Salad', 5000, ''),
(44, 'Citos', 'Camilan', 6000, ''),
(45, 'Makaroni Usus', 'Camilan', 4000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `nama_cafe` varchar(30) NOT NULL,
  `alamat_cafe` varchar(50) NOT NULL,
  `no_cafe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `nama_cafe`, `alamat_cafe`, `no_cafe`) VALUES
(1, 'Coffee Mewah', 'Jl. Sudirman No 11, Jombang, Jawa Timur', '6282338492520');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `tgl_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `keterangan` (`keterangan`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`m_kategori`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD CONSTRAINT `tb_menu_ibfk_1` FOREIGN KEY (`m_kategori`) REFERENCES `tb_kategori` (`keterangan`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
