-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2017 at 06:06 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` int(11) NOT NULL,
  `nama` varchar(250) collate latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(100) collate latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') collate latin1_general_ci NOT NULL,
  `prodi` varchar(75) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`) VALUES
(1130028, 'Parman', 'Blora', '1988-02-03', 'l', 'ti'),
(1130029, 'fitri hndayani', 'jakarta utara', '2017-03-01', 'p', 'ti'),
(1130018, 'Agus Yudoyono', 'Jakarta', '2017-03-10', 'p', 'si'),
(1130017, 'Rendi Pangalila', 'Jakarta', '2017-03-06', 'l', 'tj'),
(1130016, 'Budiantono', 'Jakarta', '2017-03-11', 'l', 'si'),
(1130078, 'Setya Novanto', 'Blora jaya', '2017-08-21', 'l', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(9) NOT NULL auto_increment,
  `judul` varchar(200) collate latin1_general_ci NOT NULL,
  `pengarang` varchar(100) collate latin1_general_ci NOT NULL,
  `penerbit` varchar(150) collate latin1_general_ci NOT NULL,
  `tahun_terbit` varchar(4) collate latin1_general_ci NOT NULL,
  `isbn` varchar(25) collate latin1_general_ci NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') collate latin1_general_ci NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(1, 'belajar php mudah', 'parman blora', 'elekmedia joz', '2013', '14343dfd', 1, 'rak3', '2017-03-02'),
(2, 'belajar codeigniter', 'parman', 'elekmedia', '2012', 'hjhjhj', 3, 'rak2', '2017-03-01'),
(5, 'apa aja', 'siapa aja', 'apa ka', '2007', '676', 6, 'rak2', '2017-04-18'),
(6, 'photosop', 'parman blora', 'elekmedia joz', '2005', 'dadad', 5, 'rak2', '2017-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `kode_pengajuan` varchar(20) collate latin1_general_ci NOT NULL,
  `nip` varchar(100) collate latin1_general_ci NOT NULL,
  `judul` varchar(100) collate latin1_general_ci NOT NULL,
  `tanggal_pangajuan` varchar(100) collate latin1_general_ci NOT NULL,
  `status` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`kode_pengajuan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`kode_pengajuan`, `nip`, `judul`, `tanggal_pangajuan`, `status`) VALUES
('PGJ-0001', '1130028', 'belajar codeigniter', '08-03-2017	', 'Disetujui'),
('PGJ-0002', '1130016', 'belajar codeigniter', '08-03-2017	', 'Disetujui'),
('PGJ-0006', '1130078', 'belajar php mudah', '18-08-2017', 'Belum Disetujui'),
('PGJ-0004', '1130028 ', 'belajar php mudah', '18-08-2017', 'Belum Disetujui'),
('PGJ-0005', '1130028 ', 'belajar codeigniter', '18-08-2017', 'Belum Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(255) collate latin1_general_ci NOT NULL,
  `jk` varchar(30) collate latin1_general_ci NOT NULL,
  `perlu` varchar(255) collate latin1_general_ci NOT NULL,
  `cari` varchar(255) collate latin1_general_ci NOT NULL,
  `saran` varchar(255) collate latin1_general_ci NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `jam_kunjung` time NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id`, `nama`, `jk`, `perlu`, `cari`, `saran`, `tgl_kunjung`, `jam_kunjung`) VALUES
(1, 'bejo', 'Laki-laki', 'baca', 'buku pemograman', 'perbanyak buku pemograman', '2017-08-15', '21:45:00'),
(2, 'Parman blora', 'Laki-laki', 'apa aja', 'apa aja', 'apa aja', '2017-08-15', '23:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kode_transaksi` varchar(50) collate latin1_general_ci NOT NULL,
  `judul` varchar(200) collate latin1_general_ci NOT NULL,
  `nim` varchar(11) collate latin1_general_ci NOT NULL,
  `nama` varchar(250) collate latin1_general_ci NOT NULL,
  `tgl_pinjam` varchar(30) collate latin1_general_ci NOT NULL,
  `tgl_kembali` varchar(30) collate latin1_general_ci NOT NULL,
  `status` varchar(100) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_transaksi`, `judul`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('TRK-0001', 'belajar codeigniter', '1130016', 'Budiantono', '09-03-2017', '23-03-2017', 'kembali'),
('TRK-0002', 'belajar codeigniter', '1130016', 'Budiantono', '14-04-2017', '21-04-2017', 'pinjam'),
('TRK-0003', 'belajar codeigniter', '1130016', 'Budiantono', '18-08-2017', '25-08-2017', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) collate latin1_general_ci NOT NULL,
  `password` varchar(100) collate latin1_general_ci NOT NULL,
  `nama` varchar(200) collate latin1_general_ci NOT NULL,
  `level` varchar(30) collate latin1_general_ci NOT NULL,
  `foto` varchar(200) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'avatar5.png'),
(2, 'user', 'user', 'user', 'user', 'login.png'),
(3, 'parman ', '12345', 'parman blora', 'user', 'parman.jpg'),
(5, '123456', '1234', 'agustus', 'siswa', 'IMG_20160916_092606.jpg'),
(6, '1130028 ', '12345', 'parman', 'siswa', 'PARMAN.jpg'),
(7, '1130078', '12345', 'Setya Novanto', 'siswa', 'IMG_20160916_092606.jpg');
