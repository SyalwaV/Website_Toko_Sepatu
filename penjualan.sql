-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 02:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Jenis` (IN `id_jen` VARCHAR(20), IN `bahan_jen` VARCHAR(100), IN `kualitas_jen` VARCHAR(50), IN `merek_jen` VARCHAR(50))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO jenis_produk (id_jenis,bahan,kualitas,merek)
VALUES (id_jen, bahan_jen,kualitas_jen,merek_jen);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM jenis_produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Pelanggan` (IN `id_pel` VARCHAR(20), IN `nama_pel` VARCHAR(100), IN `no_pel` VARCHAR(50), IN `alamat_pel` VARCHAR(100))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO pelanggan (id_pelanggan,nama_pelanggan,nomor_telepon,alamat)
VALUES (id_pel, nama_pel, no_pel,alamat_pel);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM pelanggan;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Pembayaran` (IN `id_pem` VARCHAR(20), IN `jum_pem` INT, IN `total_pem` INT, IN `tanggal_pem` DATE, IN `id_trans` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO pembayaran (id_pembayaran,jumlah_beli,total_bayar,tanggal_pembayaran,id_transaksi)
VALUES (id_pem, jum_pem,total_pem,tanggal_pem,id_trans);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM pembayaran;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Penjual` (IN `id_pen` VARCHAR(20), IN `nama_pen` VARCHAR(100), IN `alamat_pen` VARCHAR(50), IN `no_pen` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO penjual (id_penjual,nama_penjual,alamat,nomor_telepon)
VALUES (id_pen, nama_pen, alamat_pen,no_pen);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM penjual;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Produk` (IN `id_prod` VARCHAR(20), IN `nama_prod` VARCHAR(100), IN `warna_prod` VARCHAR(20), IN `stok_prod` INT, IN `harga_prod` INT, `id_jen` VARCHAR(20), IN `id_sup` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO produk (id_produk,nama_tas,warna,stok,harga,id_jenis,id_supplier)
VALUES (id_prod, nama_prod,warna_prod,stok_prod,harga_prod,id_jen,id_sup);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Supplier` (IN `id_sup` VARCHAR(20), IN `nama_sup` VARCHAR(100), IN `no_sup` VARCHAR(50), IN `alamat_sup` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO supplier (id_supplier,nama_supplier,alamat,nomor_telepon)
VALUES (id_sup, nama_sup,no_sup,alamat_sup);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM supplier;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Transaksi` (IN `id_trans` VARCHAR(20), IN `warna_trans` VARCHAR(100), IN `jumlah_trans` INT, IN `id_pen` VARCHAR(20), IN `id_prod` VARCHAR(20), `id_pel` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
INSERT INTO transaksi (id_transaksi,warna,jumlah_beli,id_penjual,id_produk,id_pelanggan)
VALUES (id_trans, warna_trans,jumlah_trans,id_pen,id_prod,id_pel);
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM transaksi;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Jenis` (IN `id_jen` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM jenis_produk WHERE id_jenis = id_jen;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM jenis_produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Pelanggan` (IN `id_pel` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM pelanggan WHERE id_pelanggan = id_pel;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM pelanggan;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Pembayaran` (IN `id_pem` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM pembayaran WHERE id_pembayaran = id_pem;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM pembayaran;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Penjual` (IN `id_pen` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM penjual WHERE id_penjual = id_pen;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM penjual;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Produk` (IN `id_prod` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM produk WHERE id_produk = id_prod;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Supplier` (IN `id_sup` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM supplier WHERE id_supplier = id_sup;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM supplier;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Transaksi` (IN `id_trans` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
DELETE FROM transaksi WHERE id_transaksi = id_trans;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM transaksi;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Jenis` (IN `id_jen` VARCHAR(20), IN `bahan_jen` VARCHAR(100), IN `kualitas_jen` VARCHAR(50), IN `merek_jen` VARCHAR(50))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE jenis_produk set bahan = bahan_jen,kualitas = kualitas_jen,merek = merek_jen WHERE id_jenis = id_jen;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM jenis_produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Pelanggan` (IN `id_pel` VARCHAR(20), IN `nama_pel` VARCHAR(100), IN `no_pel` VARCHAR(50), IN `alamat_pel` VARCHAR(100))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE pelanggan SET nama_pelanggan = nama_pel,nomor_telepon = no_pel,
alamat = alamat_pel WHERE id_pelanggan = id_pel;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM OWNER;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Pembayaran` (IN `id_pem` VARCHAR(20), IN `jum_pem` INT, IN `total_pem` INT, IN `tanggal_pem` DATE, IN `id_trans` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE pembayaran set jumlah_beli = jum_pem, total_bayar = total_pem, tanggal_pembayaran = tanggal_pem, id_transaksi = id_trans WHERE id_pembayaran = id_pem;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM pembayaran;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Penjual` (IN `id_pen` VARCHAR(20), IN `nama_pen` VARCHAR(100), IN `alamat_pen` VARCHAR(100), IN `no_pen` VARCHAR(50))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE penjual SET nama_penjual = nama_pen,
alamat = alamat_pen, nomor_telepon = no_pen WHERE id_penjual = id_pen;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM OWNER;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Produk` (IN `id_prod` VARCHAR(20), IN `nama_prod` VARCHAR(100), IN `warna_prod` VARCHAR(20), IN `stok_prod` INT, IN `harga_prod` INT, `id_jen` VARCHAR(20), IN `id_sup` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE produk SET nama_tas = nama_prod,warna = warna_prod,stok = stok_prod,harga = harga_prod, id_jenis = id_jenis, id_supplier = id_sup WHERE id_produk = id_prod;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM produk;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Supplier` (IN `id_sup` VARCHAR(20), IN `nama_sup` VARCHAR(100), IN `no_sup` VARCHAR(50), IN `alamat_sup` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE supplier set nama_supplier = nama_sup,nomor_telepon = no_sup,alamat = alamat_sup WHERE id_supplier = id_sup;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM supplier;
COMMIT;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Transaksi` (IN `id_trans` VARCHAR(20), IN `warna_trans` VARCHAR(100), IN `jumlah_trans` INT, IN `id_pen` VARCHAR(20), IN `id_prod` VARCHAR(20), `id_pel` VARCHAR(20))  BEGIN
DECLARE KODE_ERROR CHAR(5) DEFAULT '00000';

DECLARE CONTINUE HANDLER FOR SQLEXCEPTION, SQLWARNING
BEGIN
GET DIAGNOSTICS CONDITION 1
 	KODE_ERROR = RETURNED_SQLSTATE;
END;

START TRANSACTION;
SAVEPOINT satu;
UPDATE transaksi set warna = warna_trans, jumlah_beli = jumlah_trans, id_penjual = id_pen, id_produk = id_prod, id_pelanggan = id_pel WHERE id_transaksi = id_trans;
IF KODE_ERROR != '00000' THEN
	ROLLBACK TO satu;
END IF;
SELECT * FROM transaksi;
COMMIT;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `form_login`
--

CREATE TABLE `form_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis` varchar(20) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `kualitas` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis`, `bahan`, `kualitas`, `merek`) VALUES
('10', 'Kain', 'Original', 'Adidas'),
('11', 'Kulit', 'Original', 'Louis Vitton'),
('12', 'Katun', 'Original', 'Nevada'),
('13', 'Katun', 'Kw', 'Coach'),
('14', 'katun', 'Original', 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `nomor_telepon`, `alamat`) VALUES
('1', 'Syalwa', '0895600515451', 'Banda Aceh'),
('2', 'Rara', '0812600514512', 'Banda Aceh'),
('4', 'Joko', '081234567682', 'Bogor'),
('5', 'Rehan', '0895356143421', 'Bogor');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `jumlah_beli`, `total_bayar`, `tanggal_pembayaran`, `id_transaksi`) VALUES
('12', 9, 500, '2022-06-11', '79'),
('13', 3, 500, '2022-06-09', '78'),
('14', 2, 500, '2022-06-16', '23'),
('15', 2, 500, '2022-06-08', '23');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` varchar(20) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama_penjual`, `alamat`, `nomor_telepon`) VALUES
('10', 'Fachrazi', 'Padang', '0895322145127'),
('11', 'Rian', 'Surabaya', '08342156126754'),
('12', 'Koko', 'Jakarta', '0865383416321'),
('13', 'Vonna', 'Banda Aceh', '08123456122154'),
('14', 'BestiiEE', 'Pidie Jaya', '084367542435');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_tas` varchar(100) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_jenis` varchar(20) DEFAULT NULL,
  `id_supplier` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_tas`, `warna`, `stok`, `harga`, `id_jenis`, `id_supplier`) VALUES
('54', 'Hugo', 'hitam', 1, 100, '14', '38'),
('55', 'Nike', 'Purple', 10, 900, '14', '38'),
('56', 'Lv', 'Hitam', 5, 500, '12', '35'),
('57', 'Adidas sport', 'Hitam', 8, 900, '12', '37'),
('58', 'Coach', 'Purple', 1, 900, '13', '35');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `nomor_telepon`, `alamat`) VALUES
('34', 'Lugowo', '089483493', 'Jl.wedana'),
('35', 'Hartono', '0895122144567', 'Papua'),
('36', 'popo', '0895365490', 'Jalan Wedana'),
('37', 'Muslihat', '0812453467719', 'Bandung'),
('38', 'Gea', '0895322145127', 'Padang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `jumlah_beli` int(20) DEFAULT NULL,
  `id_penjual` varchar(20) DEFAULT NULL,
  `id_produk` varchar(20) DEFAULT NULL,
  `id_pelanggan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `warna`, `jumlah_beli`, `id_penjual`, `id_produk`, `id_pelanggan`) VALUES
('100', 'Hijao', 2, '14', '58', '5'),
('112', 'Hitam', 2, '10', '56', '1'),
('120', 'Hitam', 2, '11', '54', '1'),
('23', 'biru', 1, '13', '56', '2'),
('78', 'Pink', 4, '10', '56', '1'),
('79', 'Coklat', 1, '14', '56', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_produk` (`id_jenis`),
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
