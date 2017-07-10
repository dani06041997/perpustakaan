-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 02:54 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`kd_buku` int(255) NOT NULL,
  `no_buku` varchar(255) DEFAULT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `copy` int(1) DEFAULT NULL,
  `fk_kategori` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `no_buku`, `Judul`, `penerbit`, `status`, `copy`, `fk_kategori`) VALUES
(1, 'B001', 'MA', 'MA', 1, 1, 2),
(2, 'B002', 'KONSPIRASI ALAM SEMESTA', 'Gramedia', 1, 1, 2),
(3, 'B004', 'KOALA KUMAL', 'Gramedia', 1, 1, 2),
(11, 'B006', 'JIKA SEMUA ADALAH KEHENDAKMU', 'Gramedia', 0, 1, 2),
(44, 'B003', 'MENGEJAR HALAL', 'Gramedia', 0, 1, 5),
(45, 'B007', 'INDONESIA JAYA', 'Gramedia', 1, 1, 2),
(48, 'B0011', 'SOEKARNO', 'Gramedia', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `buku_penulis`
--

CREATE TABLE IF NOT EXISTS `buku_penulis` (
  `fk_buku` int(255) DEFAULT NULL,
  `fk_penulis` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_penulis`
--

INSERT INTO `buku_penulis` (`fk_buku`, `fk_penulis`) VALUES
(1, 112),
(1, 113),
(2, 117),
(3, 114),
(3, 112),
(11, 112),
(44, 117),
(45, 117),
(48, 114);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE IF NOT EXISTS `detail_peminjaman` (
`id` int(11) NOT NULL,
  `kd_peminjaman` varchar(255) DEFAULT NULL,
  `kd_buku` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `terlambat` int(255) DEFAULT NULL,
  `denda` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `kd_peminjaman`, `kd_buku`, `jumlah`, `jatuh_tempo`, `tanggal_kembali`, `status`, `terlambat`, `denda`) VALUES
(38, '20170707001', 'B001', 1, '2017-07-21', '2017-06-15', 1, NULL, NULL),
(39, '20170707001', 'B002', 1, '2017-07-21', '2017-06-15', 1, NULL, NULL),
(40, '20170707001', 'B004', 1, '2017-07-21', '2017-06-15', 1, NULL, NULL),
(41, '20170707001', 'B006', 1, '2017-07-21', '2017-06-15', 0, NULL, NULL),
(42, '20170707001', 'B003', 1, '2017-07-21', '2017-06-15', 0, NULL, NULL),
(43, '20170615001', 'B002', 1, '2017-06-29', '2017-06-15', 1, NULL, NULL),
(44, '20170615001', 'B001', 1, '2017-06-29', '2017-06-15', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`kd_kategori` int(255) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
(1, 'IT'),
(2, 'UMUM'),
(5, 'ISLAM'),
(8, 'KULIAH AJA'),
(10, 'KULIAH AJA OY');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_buku`
--

CREATE TABLE IF NOT EXISTS `keranjang_buku` (
`id` int(11) NOT NULL,
  `fk_buku` varchar(255) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
`kd_transaksi` int(255) NOT NULL,
  `kd_member` varchar(255) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `fk_peminjaman` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12332 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kd_transaksi`, `kd_member`, `tanggal_pinjam`, `admin`, `fk_peminjaman`) VALUES
(12330, '1541180072', '2017-07-07', 'dani', '20170707001'),
(12331, '1541180062', '2017-06-15', 'dani', '20170615001');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
`id_penerbit` int(10) NOT NULL,
  `nama_penerbit` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `kota`) VALUES
(222, 'SIDU', 'PAPUA'),
(223, 'GRAMEDIA INDO', 'SUMATRA'),
(224, 'GUDANG GRAAM', 'KEDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE IF NOT EXISTS `penulis` (
`id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(112, 'RADITYA DIKA'),
(113, 'ARIES'),
(114, 'DANI PERMANA'),
(117, 'JOKO WIDODO P');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(255) NOT NULL,
  `nim_nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nim_nip`, `nama`, `alamat`, `no_telp`, `foto`, `email`, `tanggal_lahir`, `username`, `password`, `level`) VALUES
(1, '1541180071', 'Dani Permana', 'malanag', '081331969641', 'dani.jpg', '', '2017-05-02', 'dani', 'f45731e3d39a1b2330bbf93e9b3de59e', 'admin'),
(3, '1541180072', 'sasa', 'malang', '081331969641', 'sasa.jpg', '', '0000-00-00', 'sasa', 'f45731e3d39a1b2330bbf93e9b3de59e', 'user'),
(5, '1311313', 'eren zegger', 'arab', '(111) 111-111-111', '3.png', 'eren@gmail.com', '1997-05-30', 'eren', 'eren', 'user'),
(8, '1541180062', 'istaghna faza', 'sby', '(091) 781-611-111', '5e6d4516-6e8f-4969-950f-caaf20195831.jpg', 'dansdja@gmail.com', '2017-06-14', 'faza', 'e046cf5be5053667cba83298bc5080fa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`kd_buku`), ADD KEY `fk_kategori` (`fk_kategori`), ADD KEY `no_buku` (`no_buku`), ADD KEY `fk_penerbit` (`penerbit`);

--
-- Indexes for table `buku_penulis`
--
ALTER TABLE `buku_penulis`
 ADD KEY `fk_buku` (`fk_buku`), ADD KEY `fk_penulis` (`fk_penulis`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
 ADD PRIMARY KEY (`id`), ADD KEY `kd_buku` (`kd_buku`), ADD KEY `kd_peminjaman` (`kd_peminjaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `keranjang_buku`
--
ALTER TABLE `keranjang_buku`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_buku` (`fk_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`kd_transaksi`), ADD KEY `fk_peminjaman` (`fk_peminjaman`), ADD KEY `kd_member` (`kd_member`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
 ADD PRIMARY KEY (`id_penerbit`), ADD KEY `id_penerbit` (`id_penerbit`) USING BTREE;

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
 ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `nim_nip` (`nim_nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `kd_buku` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `kd_kategori` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `keranjang_buku`
--
ALTER TABLE `keranjang_buku`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
MODIFY `kd_transaksi` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12332;
--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
MODIFY `id_penerbit` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`fk_kategori`) REFERENCES `kategori` (`kd_kategori`);

--
-- Constraints for table `buku_penulis`
--
ALTER TABLE `buku_penulis`
ADD CONSTRAINT `buku_penulis_ibfk_1` FOREIGN KEY (`fk_buku`) REFERENCES `buku` (`kd_buku`),
ADD CONSTRAINT `buku_penulis_ibfk_2` FOREIGN KEY (`fk_penulis`) REFERENCES `penulis` (`id_penulis`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`kd_buku`) REFERENCES `buku` (`no_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`fk_peminjaman`) REFERENCES `detail_peminjaman` (`kd_peminjaman`),
ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`kd_member`) REFERENCES `user` (`nim_nip`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
