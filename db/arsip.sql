-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 03:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `id_surat_masuk` int(11) DEFAULT NULL,
  `tgl_disposisi` date DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `id_surat_masuk`, `tgl_disposisi`, `catatan`) VALUES
(2, 3, '2021-06-09', '<p>Saya Tidak Bisa Hadir</p>\r\n'),
(3, 4, '2021-06-10', '<p>Sudah Dibaca</p>\r\n'),
(4, 5, '2022-06-25', '<p>Males</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Undangan'),
(2, 'Khusus'),
(3, 'Spesial'),
(4, 'Elite');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_surat_keluar` varchar(255) DEFAULT NULL,
  `no_agenda_surat_keluar` varchar(255) DEFAULT NULL,
  `tgl_surat_keluar` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `tujuan_surat` varchar(255) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id`, `id_kategori`, `no_surat_keluar`, `no_agenda_surat_keluar`, `tgl_surat_keluar`, `tgl_kirim`, `tujuan_surat`, `perihal`, `file_surat`) VALUES
(2, 1, 'SK-001', 'NASK-001', '2021-06-09', '2021-06-09', 'Sappo', '<p>Surat Keluar</p>\r\n', 'Koala.jpg'),
(3, 2, 'SK-002', 'NASK-002', '2022-06-18', '2022-06-19', '132222', '', 'ckeditor4-export-pdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_surat_masuk` varchar(255) DEFAULT NULL,
  `no_agenda_surat_masuk` varchar(255) DEFAULT NULL,
  `tgl_surat_masuk` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `asal_surat` varchar(255) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `file_surat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id`, `id_kategori`, `no_surat_masuk`, `no_agenda_surat_masuk`, `tgl_surat_masuk`, `tgl_terima`, `asal_surat`, `perihal`, `file_surat`) VALUES
(3, 1, 'SM-001', 'NASM-001', '2021-06-09', '2021-06-09', 'Rian', '<p>Surat Masuk</p>\r\n', '1214074-Adrian Bimo Hernawan Pratama-D4 TI 1C- Tugas Writing Assignment--.pdf'),
(4, 1, 'SM-002', 'NASM-002', '2021-06-10', '2021-06-10', 'asdasd', '<p>asdasdasd</p>\r\n', 'Penguins.jpg'),
(6, 2, 'SM-003', 'NASM-003', '2022-06-18', '2022-06-19', 'Adrian', '', 'g18bulk.jpg'),
(8, 2, 'SM-004', 'NASM-004', '2022-06-24', '2022-06-25', 'Adrian Bimo', '<p>sadasdasdasdasd</p>\r\n', 'Screenshot (577).png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `level` enum('admin','pimpinan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
