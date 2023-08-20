-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 14.46
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengiriman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminis123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang_pengiriman` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_jenis` varchar(255) NOT NULL,
  `barang_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_pengiriman`, `barang_nama`, `barang_jenis`, `barang_jumlah`) VALUES
(1, 0, 'Monitor', '1', 3),
(2, 1, 'Monitor', '1', 3),
(3, 2, 'PC', '1', 1),
(4, 3, 'Baju', '2', 10),
(5, 4, 'Monitor', '1', 2),
(6, 5, 'Mouse', '2', 2),
(14, 7, 'Mouse', '1', 4),
(15, 8, 'Monitor', '1', 1),
(16, 9, 'Monitor', '1', 1),
(17, 10, 'Casing PC', '1', 1),
(18, 11, 'Baju', '2', 3),
(20, 6, 'Keyboard', '1', 0),
(21, 12, 'Baju', '1', 0),
(39, 14, 'Casing PC', '1', 0),
(40, 13, 'Monitor', '1', 0),
(41, 13, 'Mouse', '1', 0),
(42, 13, 'Keyboard', '1', 0),
(43, 15, 'Casing PC', '1', 1),
(44, 15, 'Monitor', '1', 1),
(46, 16, 'PC', '2', 5),
(48, 17, 'PC', '2', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `harga_perkilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`harga_perkilo`) VALUES
(9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengirim`
--

CREATE TABLE `pengirim` (
  `id_pengirim` int(11) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `hp_pengirim` varchar(20) NOT NULL,
  `alamat_pengirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengirim`
--

INSERT INTO `pengirim` (`id_pengirim`, `nama_pengirim`, `hp_pengirim`, `alamat_pengirim`) VALUES
(1, 'Agung Barokah', '089506939968', 'Jl. Teluk Angsan Rawa '),
(3, 'Dede Riyanto', '0896725462131', 'Jl. Wisma Asri No. 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `pengiriman_tgl` date NOT NULL,
  `pengiriman_pengirim` int(11) NOT NULL,
  `pengiriman_penerima` varchar(255) NOT NULL,
  `pengiriman_tujuan` varchar(255) NOT NULL,
  `pengiriman_berat` int(11) NOT NULL,
  `pengiriman_harga` int(11) NOT NULL,
  `pengiriman_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `pengiriman_tgl`, `pengiriman_pengirim`, `pengiriman_penerima`, `pengiriman_tujuan`, `pengiriman_berat`, `pengiriman_harga`, `pengiriman_status`) VALUES
(6, '2022-01-15', 1, 'Galan', 'Jl. Pelni', 5, 25000, 2),
(8, '2022-01-15', 3, 'Agung', 'Jl. K.H. Agus Salim No.75', 1, 5000, 0),
(9, '2022-01-15', 1, 'Faqih', 'Jl. K.H. Agus Salim', 1, 5000, 0),
(12, '2022-01-15', 3, 'Faishal', 'Jl. K.H. Agus Salim No.75', 2, 10000, 2),
(13, '2022-01-15', 3, 'Pak Mardi', 'Jl. K.H. Agus Salim No.74', 5, 25000, 1),
(14, '2022-01-24', 3, 'Galan', 'Jl. Pelni', 3, 15000, 1),
(15, '2022-01-26', 1, 'Faishal', 'Jl. Wisma Asri', 5, 25000, 1),
(16, '2022-01-27', 3, 'Faishal', 'Jl. K.H. Agus Salim No.74', 10, 70000, 0),
(17, '2022-01-27', 1, 'Faishal', 'Jl. Pelni', 3, 30000, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `pengirim`
--
ALTER TABLE `pengirim`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pengirim`
--
ALTER TABLE `pengirim`
  MODIFY `id_pengirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
