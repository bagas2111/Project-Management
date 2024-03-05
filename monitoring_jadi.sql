-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2024 pada 15.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_jadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtahapan`
--

CREATE TABLE `detailtahapan` (
  `id_detailtahapan` int(11) NOT NULL,
  `id_tahapan` int(11) NOT NULL,
  `nama_tugas` varchar(255) NOT NULL,
  `desc_tugas` varchar(500) NOT NULL,
  `status` varchar(30) NOT NULL,
  `deadline` date NOT NULL,
  `hasil_tugas` varchar(255) NOT NULL,
  `hari_pengumpulan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtahapan`
--

INSERT INTO `detailtahapan` (`id_detailtahapan`, `id_tahapan`, `nama_tugas`, `desc_tugas`, `status`, `deadline`, `hasil_tugas`, `hari_pengumpulan`) VALUES
(1, 1, 'bdsahbdsabuda', 'dasdmudnasndjasn', 'belum selesai', '2023-10-13', '', NULL),
(3, 1, 'dasdasd', 'dsadsadas', 'belum selesai', '2023-11-21', '', NULL),
(4, 1, 'dasdasd', 'dsadsadas', 'belum selesai', '2023-11-21', '', NULL),
(5, 1, 'coba web1', 'coba1', 'belum selesai', '2023-10-13', '', NULL),
(6, 1, 'dasdasd', 'dsadsadas', 'belum selesai', '2023-11-21', '', NULL),
(8, 10, 'dsadas', 'dasdas', 'selesai', '2023-10-16', '1697427828_P2-Soal Praktik.docx', '2023-10-16'),
(9, 8, 'dsadsad', 'dasdsadas', 'selesai', '2023-10-17', '1698208826_copy_AAAB3280-2122-4FA0-9956-B3BC447F3842.mov', '2023-10-25'),
(11, 11, 'coba coba aja dulu', 'dsadsadsa', 'selesai', '2023-10-17', '1698214762_1697522938_proposall.docx', '2023-10-25'),
(12, 16, 'dsadas', 'dasdas', 'belum selesai', '2023-10-19', '', NULL),
(13, 12, 'dsadsa', 'dsadsa', 'selesai', '2023-10-21', '', NULL),
(14, 12, 'dsadsa', 'dsadsadas', 'belum selesai', '2023-10-22', '', NULL),
(15, 8, 'dssdad', 'dsadsadas', 'selesai', '2023-10-14', '1698214137_1697522938_proposall.docx', '2023-10-25'),
(16, 12, 'dsadsads', 'dsadsa', 'belum selesai', '2023-10-25', '', NULL),
(17, 18, 'asdsadas', 'dsadasdasdsa', 'selesai', '2023-10-23', '', NULL),
(18, 18, 'dsadsadsa', 'dsadasdas', 'belum selesai', '2023-10-28', '', NULL),
(19, 8, 'dsadasd', 'sadasd', 'belum selesai', '2023-10-26', '', NULL),
(21, 20, 'DFD', 'DFD', 'belum selesai', '2024-03-05', '', NULL),
(22, 20, 'ERD', 'ERD dll', 'selesai', '2024-03-05', '1709402446_UKK BAGAS MONITORING.drawio', '2024-03-03'),
(23, 20, 'UI-UX', 'UI-UX', 'selesai', '2024-03-05', '1709402563_SNBP 2024.pdf', '2024-03-03'),
(24, 21, 'PPT', 'PPT yang telah dibuat', 'belum selesai', '2024-03-04', '', NULL),
(25, 21, 'source code', 'source code yang sudah dibuat', 'belum selesai', '2024-03-04', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `struktur` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `struktur`, `username`, `password`) VALUES
(8, 'admin', 'admin', 'admin', '7fcf4ba391c48784edde599889d6e3f1e47a27db36ecc050cc92f259bfac38afad2c68a1ae804d77075e8fb722503f3eca2b2c1006ee6f6c7b7628cb45fffd1d'),
(12, 'bagas', 'pegawai', 'bagas2111', '077980a78d756c99427ca32cf640525926f54dc07e9b50ca6d0d342dc92b28a1b252f6caf6d3d7cd2710ce12d2a62b5252e09f3e6b90ed6aef8165755fbf5cf8'),
(13, 'najwa', 'pegawai', 'njwaeel', '260cd866ec685cd6c59007c12c9a8f20d2bbef565f541959df9aa8dceba7aec84223d8943b079aadaf428307e74f70c089dd48489c8c1fcd79175ebed627f4e0'),
(14, 'risya', 'pegawai', 'risya', '36b5623606c2d0e78b7f8070823ae76eed6eb12d1c1b2534c63939bb849abc4af766a3801ad2010df36fc74657535e5726cb9d534861f6b13428edf7c63e96e4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `jenis_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(500) NOT NULL,
  `contact` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `jenis_perusahaan`, `alamat_perusahaan`, `contact`) VALUES
(1, 'PT QUINSIS', 'IT SUPPORT', 'UBUD VILAGE', '081211211002'),
(2, 'PT Aku Senang', 'IT SUPPORT', 'Graha Raya', '081318709737');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `no_po` int(11) NOT NULL,
  `tgl_po` date NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `ID_perusahaan` int(11) NOT NULL,
  `ID_Vendor` int(11) NOT NULL,
  `start_project` date NOT NULL,
  `deadline` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `selesai_project` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `no_po`, `tgl_po`, `nama_project`, `ID_perusahaan`, `ID_Vendor`, `start_project`, `deadline`, `status`, `selesai_project`) VALUES
(3, 1112, '2023-10-09', 'coba 22 API', 1, 3, '2023-10-09', '2023-10-12', 'belum selesai', NULL),
(5, 1221, '2023-10-19', 'fdfsd', 1, 8, '2023-10-21', '2023-10-24', 'belum selesai', NULL),
(6, 213, '2023-10-25', 'fdsfsd', 2, 3, '2023-10-26', '2023-10-27', 'belum selesai', NULL),
(7, 211106, '2024-01-26', 'UKK', 2, 4, '2024-02-03', '2024-03-08', 'belum selesai', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id_pegawai` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `nama_struktur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id_pegawai`, `id_project`, `nama_struktur`) VALUES
(23, 35, 'dsasd'),
(18, 37, 'Manajer Proyek'),
(17, 37, 'dsadasda'),
(7, 1, 'co'),
(7, 3, 'PM'),
(6, 1, 'coba'),
(9, 1, 'ygy'),
(6, 4, 'sad'),
(10, 4, 'bla bla'),
(7, 4, 'dasdasdasdas'),
(9, 3, 'dsqa'),
(9, 4, '-'),
(7, 5, 'dasdad'),
(7, 6, 'dsa'),
(12, 7, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahapan`
--

CREATE TABLE `tahapan` (
  `id_tahapan` int(11) NOT NULL,
  `nama_tahapan` varchar(255) NOT NULL,
  `status` varchar(222) NOT NULL,
  `id_project` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `Deadline` date NOT NULL,
  `hasil_tahapan` varchar(500) NOT NULL,
  `tgl_actual` date DEFAULT NULL,
  `tgl_tugas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahapan`
--

INSERT INTO `tahapan` (`id_tahapan`, `nama_tahapan`, `status`, `id_project`, `start_date`, `Deadline`, `hasil_tahapan`, `tgl_actual`, `tgl_tugas`) VALUES
(8, 'dddd', 'selesai', 1, '2023-10-13', '2023-10-14', '1697189174_UAS DBb.docx', '2023-11-02', '2023-10-13'),
(11, 'coba2', 'selesai', 1, '2023-10-16', '2023-10-19', '1697786782_1696214229_UAS_PPB_Najwa .zip', '2023-10-04', '2023-10-20'),
(12, 'Project Baru 123', 'selesai', 1, '2023-10-17', '2023-10-20', '1698204211_1697297124_1697297095_1696312745_1695005611_1basis.docx', '2023-10-10', '2023-10-25'),
(13, 'design data ERD', 'selesai', 4, '2023-08-17', '2023-10-19', '1697522938_proposall.docx', '2023-08-22', '2023-10-17'),
(14, 'rancangan layar', 'selesai', 4, '2023-08-17', '2023-10-31', '1697785484_1694760056_UAS_BAGASKORO (1).zip', '2023-10-18', '2023-10-20'),
(15, 'web project', 'selesai', 4, '2023-10-17', '2023-11-02', '1697784860_1696214229_UAS_PPB_Najwa .zip', '2023-10-11', '2023-10-20'),
(16, 'Project 1112', 'selesai', 1, '2023-10-08', '2023-10-12', '1698204105_1697297124_1697297095_1696312745_1695005611_1basis.docx', '2023-10-17', '2023-10-25'),
(17, '1111', 'belum selesai', 3, '2023-10-08', '2023-10-12', '1698205545_1695005611_1basis.docx', '2023-10-10', '2023-10-25'),
(18, 'dsadsadas', 'selesai', 4, '2023-10-22', '2023-10-25', '1698203137_1697297124_1697297095_1696312745_1695005611_1basis.docx', '2023-10-10', '2023-10-25'),
(19, 'dasdas', 'selesai', 3, '2023-10-10', '2023-10-27', '1698206075_1697522938_proposall.docx', '2023-10-03', '2023-10-25'),
(20, 'QP', 'belum selesai', 7, '2024-02-03', '2024-03-04', '', NULL, NULL),
(21, 'QC', 'belum selesai', 7, '2024-02-03', '2024-03-06', '', NULL, NULL),
(22, 'HASIL AKHIR', 'belum selesai', 7, '2024-02-03', '2024-03-14', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `ID_Vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `jenis_vendor` varchar(255) NOT NULL,
  `alamat_vendor` varchar(500) NOT NULL,
  `contact` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`ID_Vendor`, `nama_vendor`, `jenis_vendor`, `alamat_vendor`, `contact`) VALUES
(1, 'PT LEGOSPAY', 'MAINTENANCE', 'UBUD VILAGE', '081318709737'),
(3, 'perusahaan2', 'abcdef', 'jalan saya suka gila 5', '0812211121'),
(4, 'PT bagas', 'PKL', 'graha raya cluster catalina', '08121121002'),
(5, 'PT SUMBER JAYA', 'IT COMPANY', 'jl suka suka gueh', '081241342312'),
(6, 'dasdsd', 'dsadasdas', 'dsadas', '2132'),
(7, 'perusahaan3', 'abcdef', 'jalan saya suka gila 5', '0812211121'),
(8, 'PT coba Vendor', 'PNAKND', 'dsfdfsdfdsfdsfdsfsd', '081211211002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailtahapan`
--
ALTER TABLE `detailtahapan`
  ADD PRIMARY KEY (`id_detailtahapan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `tahapan`
--
ALTER TABLE `tahapan`
  ADD PRIMARY KEY (`id_tahapan`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ID_Vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailtahapan`
--
ALTER TABLE `detailtahapan`
  MODIFY `id_detailtahapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tahapan`
--
ALTER TABLE `tahapan`
  MODIFY `id_tahapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ID_Vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
