-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 10:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `barang`, `id_kategori`, `id_satuan`, `harga`, `stok`) VALUES
('DB-21102901', 'Komik One Piece Volume 96', 7, 1, '20000', 60),
('DB-21102902', 'Lifeboy', 11, 1, '3000', 20),
('DB-21102903', 'Teh Gelas', 10, 10, '18000', 9),
('DB-21103101', 'Kopi Liong bulan', 10, 1, '1500', 1),
('DB-21103102', 'Kopi Liong bulan', 10, 11, '23000', 29),
('DB-21103103', 'Teh Sari Wangi', 10, 7, '10000', 6),
('DB-21103104', 'Evo Diplomat Biru 16btng', 12, 8, '16000', 5),
('DB-21103105', 'Evo Diplomat Biru 16btng - 10bks', 12, 9, '80500', 2),
('DB-21103106', 'Redmi 10 6/128', 5, 2, '2500000', 20),
('DB-21103107', 'Lenovo Ideapad S145', 1, 2, '5700000', 3),
('DB-21110401', 'Terigu', 14, 6, '8000', 25),
('DB-21110801', 'Indomie Soto', 9, 1, '3000', 0),
('DB-21110802', 'Indomie Soto 40 bks', 9, 10, '97000', 6),
('DB-21111201', 'Kopi Kapal Api', 10, 1, '1500', 40),
('DB-21111202', 'Kopi Kapal Api', 10, 10, '98000', 4),
('DB-21111501', 'GGF Filter 12btng', 12, 8, '20000', 22),
('DB-21111502', 'Yupi Candy 24x192gr', 9, 10, '45000', 9),
('DB-21111503', 'Magnum Filter 12btng - 10bks', 12, 13, '167000', 4),
('DB-21111504', 'Samsu Kretek 12btng -10bks', 12, 13, '179500', 7),
('DB-21111505', 'GGF Filter 12btng 20bks', 12, 13, '374000', 15),
('DB-21111506', 'Indomie Goreng Rendang 40 bks', 9, 10, '110000', 4),
('DB-21111507', 'Ultra Milk 24x200ml Coklat', 10, 10, '120000', 12),
('DB-21111508', 'Envio Kretek 12btng -10bks', 12, 13, '91000', 0),
('DB-21111801', 'pop mie', 9, 10, '300000', 6),
('DB-21111802', 'Envio Kretek 12btng', 12, 8, '16000', 16),
('DB-21111803', 'Teh Pucuk', 10, 10, '140000', 20),
('DB-21120501', 'Sampurna Mild 16btng-10bks', 12, 13, '250000', 5),
('DB-21123101', 'Komik One Punch Man Volume 17', 7, 1, '24000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `id_user`, `id_barang`, `jumlah_keluar`, `tanggal_keluar`, `keterangan`) VALUES
('D-BK-21103101011', 1, 'DB-21102901', 2, '2021-10-28', 'Yg dikirim Volume 95'),
('D-BK-21110401011', 1, 'DB-21102903', 1, '2021-11-04', 'Explayed'),
('D-BK-21110801011', 1, 'DB-21103107', 1, '2021-11-04', 'Laptop Tidak Nyala'),
('D-BK-21112501011', 1, 'DB-21111506', 2, '2021-11-25', 'Explayed'),
('D-BK-22011301011', 1, 'DB-21102902', 6, '2022-01-14', 'Ilang');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` varchar(100) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah_masuk` varchar(50) NOT NULL,
  `harga_beli` int(25) NOT NULL,
  `total_harga` int(25) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `id_supplier`, `id_user`, `id_barang`, `jumlah_masuk`, `harga_beli`, `total_harga`, `tanggal_masuk`) VALUES
('A-TP-21103001011', 2, 1, 'DB-21102903', '10', 18000, 180000, '2021-10-30'),
('A-TP-21110101011', 2, 1, 'DB-21103105', '2', 75000, 150000, '2021-11-02'),
('A-TP-21110101012', 2, 1, 'DB-21103107', '4', 5500000, 22000000, '2021-09-07'),
('A-TP-21110401011', 7, 1, 'DB-21102901', '50', 15000, 750000, '2021-11-12'),
('A-TP-21110401012', 2, 1, 'DB-21103104', '7', 15200, 106400, '2021-11-06'),
('A-TP-21110401013', 2, 1, 'DB-21110401', '25', 7000, 175000, '2021-10-15'),
('A-TP-21110501011', 7, 1, 'DB-21103106', '20', 2000000, 40000000, '2021-11-06'),
('A-TP-21110801011', 2, 1, 'DB-21103102', '25', 20000, 500000, '2021-09-10'),
('A-TP-21110801012', 2, 1, 'DB-21110802', '6', 91500, 549000, '2021-09-10'),
('A-TP-21110901011', 1, 1, 'DB-21103103', '6', 8700, 52200, '2021-11-06'),
('A-TP-21111201011', 2, 1, 'DB-21102902', '24', 2700, 64800, '2021-09-18'),
('A-TP-21111201012', 1, 1, 'DB-21111202', '4', 80000, 320000, '2021-09-08'),
('A-TP-21111501011', 1, 1, 'DB-21111201', '40', 1200, 48000, '2021-10-25'),
('A-TP-21111501012', 10, 1, 'DB-21111505', '15', 364000, 5460000, '2021-11-15'),
('A-TP-21111801011', 2, 1, 'DB-21111801', '6', 275000, 1650000, '2021-11-13'),
('A-TP-21111801012', 2, 1, 'DB-21111803', '20', 120000, 2400000, '2021-10-09'),
('A-TP-21112101011', 2, 1, 'DB-21111501', '12', 18800, 225600, '2021-11-08'),
('A-TP-21112501011', 2, 1, 'DB-21111506', '6', 85000, 510000, '2021-11-12'),
('A-TP-21112501012', 8, 1, 'DB-21102901', '12', 18000, 216000, '2021-11-25'),
('A-TP-21120101011', 1, 1, 'DB-21111504', '7', 150000, 1050000, '2021-12-01'),
('A-TP-21120201011', 10, 1, 'DB-21111503', '4', 140000, 560000, '2021-12-02'),
('A-TP-21120301011', 10, 1, 'DB-21111502', '9', 38000, 342000, '2021-12-03'),
('A-TP-21120501011', 10, 1, 'DB-21120501', '5', 200000, 1000000, '2021-12-05'),
('A-TP-21120601011', 7, 1, 'DB-21111501', '10', 18000, 180000, '2021-12-06'),
('A-TP-21122001011', 2, 1, 'DB-21102902', '2', 22000, 44000, '2021-12-20'),
('A-TP-21123101011', 2, 1, 'DB-21123101', '20', 20000, 400000, '2021-12-31'),
('A-TP-22011301011', 2, 1, 'DB-21111802', '16', 14000, 224000, '2022-01-13'),
('A-TP-22020201011', 2, 1, 'DB-21111507', '12', 100000, 1200000, '2022-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `invoice`, `id_barang`, `id_user`, `jumlah`, `total_harga`) VALUES
(1, '24122021001', 'DB-21103104', 1, 3, 48000),
(2, '24122021001', 'DB-21111201', 1, 20, 30000),
(4, '24122021002', 'DB-21102901', 1, 5, 100000),
(5, '24122021002', 'DB-21111506', 1, 3, 330000),
(7, '24122021003', 'DB-21111504', 23, 1, 179500),
(8, '24122021003', 'DB-21103103', 23, 4, 40000),
(9, '25122021004', 'DB-21103102', 1, 2, 46000),
(10, '25122021004', 'DB-21102903', 1, 4, 72000),
(11, '25122021004', 'DB-21102901', 1, 4, 80000),
(12, '25122021004', 'DB-21110802', 1, 1, 97000),
(13, '25122021004', 'DB-21103105', 1, 1, 80500),
(14, '25122021004', 'DB-21103101', 1, 2, 3000),
(16, '25122021005', 'DB-21103101', 1, 2, 3000),
(17, '25122021005', 'DB-21111502', 1, 4, 180000),
(19, '25122021006', 'DB-21103101', 1, 2, 3000),
(20, '25122021006', 'DB-21111502', 1, 4, 180000),
(21, '29122021007', 'DB-21111502', 1, 2, 90000),
(22, '29122021007', 'DB-21103105', 1, 1, 80500),
(23, '29122021007', 'DB-21120501', 1, 3, 750000),
(24, '30122021008', 'DB-21103104', 1, 1, 16000),
(25, '31122021009', 'DB-21123101', 1, 2, 48000),
(26, '31122021009', 'DB-21102901', 1, 5, 100000),
(27, '31122021009', 'DB-21103104', 1, 1, 16000),
(31, 'PY-22010501011', 'DB-21102902', 1, 2, 6000),
(32, 'PY-22010501012', 'DB-21103105', 1, 1, 80500),
(33, 'PY-22010501012', 'DB-21103103', 1, 5, 50000),
(34, 'PY-22011101011', 'DB-21103105', 1, 1, 80500),
(35, 'PY-22011101011', 'DB-21103102', 1, 5, 115000),
(36, 'PY-22011401011', 'DB-21103104', 1, 2, 32000),
(37, 'PY-22011401011', 'DB-21103102', 1, 1, 23000),
(39, 'PY-22011401012', 'DB-21102901', 1, 3, 60000),
(40, 'PY-22011401012', 'DB-21111502', 1, 1, 45000),
(41, 'PY-22013001011', 'DB-21103105', 1, 1, 80500),
(42, 'PY-22020201011', 'DB-21103104', 1, 2, 32000),
(43, 'PY-22020201011', 'DB-21103101', 1, 1, 1500),
(45, 'PY-22020201012', 'DB-21102901', 1, 2, 40000);

--
-- Triggers `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_penjualan` AFTER INSERT ON `detail_transaksi` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok-NEW.jumlah
    WHERE id_barang = NEW.id_barang;
   END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `alamat`) VALUES
(1, 'talif', 'bogor'),
(2, 'naufal', 'ciomas'),
(3, 'kriti', 'cibinog'),
(4, 'rama', 'cangkrang'),
(5, 'savin', 'pop'),
(6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Laptop'),
(5, 'HandPhone'),
(7, 'Buku'),
(8, 'Bunga'),
(9, 'Makanan'),
(10, 'Minuman'),
(11, 'Sabun'),
(12, 'Rokok'),
(13, 'Sembako');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `jk`, `no_telp`, `alamat`) VALUES
(2, 'Umum', 'Pria', '98767', 'jaja'),
(3, 'Arif', 'Pria', '086789', 'Ciomas'),
(5, 'Riska', 'Wanita', '086789', 'dsds'),
(6, 'Banu', 'Pria', '09875', 'wd'),
(8, 'Naufal Hariz', 'Pria', '0812354323456', 'Pagelaran'),
(9, 'Solah', 'Pria', '08678987567', 'Ciomas');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
(1, 'Pieces'),
(2, 'Unit'),
(6, 'Kilo Gram'),
(7, 'Renceng'),
(8, 'Bungkus'),
(9, 'Pack'),
(10, 'Dus'),
(11, 'Ball'),
(12, 'Lusin'),
(13, 'Slop');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `no_telp`, `alamat`) VALUES
(1, 'PT Mayonara Indah Permai', '089756617283', 'Jakarta'),
(2, 'Lestari Makmur', '087892227443', 'Ciomas'),
(7, 'Xiaomi Indonesia', '089756617283', 'Jakarta Barat'),
(8, 'Gramedia Bogor', '0887656722311', 'Bogor'),
(9, 'Lenovo', '0856787654', 'Jakarta Selatan'),
(10, 'Toko Serba Guna Abadi', '085734563422', 'Bukit Asri');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `invoice` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `bayar` int(20) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`invoice`, `id_pelanggan`, `id_user`, `total`, `bayar`, `kembalian`, `tanggal`, `waktu`) VALUES
('24122021001', 5, 1, 78000, 80000, 2000, '2021-12-24', '11:17:16'),
('24122021002', 3, 1, 430000, 450000, 20000, '2021-12-24', '13:29:17'),
('24122021003', 8, 23, 219500, 220000, 500, '2021-12-24', '10:24:01'),
('25122021004', 2, 1, 378500, 400000, 21500, '2021-12-25', '19:06:12'),
('25122021005', 2, 1, 183000, 200000, 17000, '2021-12-25', '20:07:11'),
('25122021006', 2, 1, 183000, 200000, 17000, '2021-12-25', '14:03:07'),
('29122021007', 8, 1, 920500, 950000, 29500, '2021-12-29', '07:04:06'),
('30122021008', 8, 1, 16000, 20000, 4000, '2021-12-30', '23:05:08'),
('31122021009', 3, 1, 164000, 170000, 6000, '2021-12-31', '14:44:29'),
('PY-22010501011', 2, 1, 6000, 7000, 1000, '2022-01-05', '20:45:30'),
('PY-22010501012', 5, 1, 130500, 140000, 9500, '2022-01-05', '18:21:47'),
('PY-22011101011', 2, 1, 195500, 200000, 4500, '2022-01-11', '03:38:54'),
('PY-22011401011', 5, 1, 55000, 60000, 5000, '2022-01-14', '11:36:31'),
('PY-22011401012', 9, 1, 105000, 110000, 5000, '2022-01-14', '17:38:26'),
('PY-22013001011', 6, 1, 80500, 90000, 9500, '2022-01-30', '00:12:35'),
('PY-22020201011', 3, 1, 33500, 34000, 500, '2022-02-02', '16:08:21'),
('PY-22020201012', 2, 1, 40000, 50000, 10000, '2022-02-02', '16:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` enum('Admin','Kasir','Owner') NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(1, 'Abdul Talif', 'abdultalif85@gmail.com', 'avatar04.png', '$2y$10$.I8kX96a6z0K/Xq8/2.B4ulmAPt7GAD3iqdU8Be3L7iHDqZurYS/.', 'Admin', 1, 1633425423),
(22, 'Arif Rahman', 'abdultalif14@gmail.com', 'user5-128x128.jpg', '$2y$10$qHbPuF6hKBUBiitPiNPMAeKS7n72Hw7/UFnrNNgBPtL/WOVl4vCTm', 'Kasir', 1, 1638662263),
(23, 'Solah', 'solah@gmail.com', 'default.jpg', '$2y$10$1.50xNPcP/PA3bOPBD31AOOb4i9PiTbMC1dkej4likvI60SpfXBf6', 'Admin', 0, 1640242780);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE;

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
