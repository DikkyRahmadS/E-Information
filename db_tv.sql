-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2023 pada 18.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `data`) VALUES
(3, 'PENDAFTARAN BEASISWA KAJIAN KEISLAMAN'),
(4, 'BUKAN TERPANDAI, TAPI PALING MANFAAT'),
(5, 'DOKUMENTASI WISUDA PERIODE II TAHUN 2019'),
(6, 'Pengumuman Pemberian Keringanan dan Penyesuaian Uang Kuliah Tunggal Tahun Akademik 2019/2020 	Pengumuman Pemberian Keringanan dan Penyesuaian Uang Kuliah Tunggal Tahun Akademik 2019/2020 	Pengumuman Pemberian Keringanan dan Penyesuaian Uang Kuliah Tunggal'),
(7, 'satu dua tiga empat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `gambar`, `keterangan`) VALUES
(7, 'PKS-BRIN1-1024x683.jpg', 'Fakultas Sains dan Teknologi Jalin Perjanjian Kerja Sama (PKS) dengan Pusat Riset Fotonik Badan Riset dan Inovasi Nasional (BRIN)'),
(8, 'WhatsApp-Image-2023-08-18-at-10_46_03-1024x768.jpg', 'Fakultas Sains dan Teknologi Jalin Perjanjian Kerja Sama (PKS) dengan Pusat Riset Fotonik Badan Riset dan Inovasi Nasional (BRIN)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `text`
--

CREATE TABLE `text` (
  `id_text` int(11) NOT NULL,
  `data` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `text`
--

INSERT INTO `text` (`id_text`, `data`) VALUES
(3, 'Kegiatan Persiapan Awal Perkuliahan Semester Ganjol Tahun Akademik 2023/2024 August 18, 2023');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indeks untuk tabel `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id_text`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `text`
--
ALTER TABLE `text`
  MODIFY `id_text` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
