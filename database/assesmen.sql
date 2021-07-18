-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jul 2021 pada 09.14
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assesmen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_program` varchar(255) NOT NULL,
  `aktivitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `id_program`, `aktivitas`) VALUES
(1, '1', 'Duduk Rapi Di Kursi'),
(2, '3', 'Melihat Kiri dan Kanan'),
(4, '1', 'Duduk Melipat Tangan Di Kursi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_dt`
--

CREATE TABLE `penilaian_dt` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_program` varchar(255) NOT NULL,
  `id_aktivitas` varchar(255) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `op1` int(2) NOT NULL,
  `op2` int(2) NOT NULL,
  `op3` int(2) NOT NULL,
  `op4` int(2) NOT NULL,
  `op5` int(2) NOT NULL,
  `op6` int(2) NOT NULL,
  `op7` int(2) NOT NULL,
  `op8` int(2) NOT NULL,
  `op9` int(2) NOT NULL,
  `op10` int(2) NOT NULL,
  `op_total` int(2) NOT NULL,
  `rp` int(2) NOT NULL,
  `perhitungan` int(10) NOT NULL,
  `sesi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian_dt`
--

INSERT INTO `penilaian_dt` (`id`, `id_user`, `id_program`, `id_aktivitas`, `bulan`, `tahun`, `tanggal`, `hari`, `jam`, `op1`, `op2`, `op3`, `op4`, `op5`, `op6`, `op7`, `op8`, `op9`, `op10`, `op_total`, `rp`, `perhitungan`, `sesi`) VALUES
(2, '10', '1', '1', 'Juni', '2021', '2021-07-15', 'Kamis', '12:00', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 5, 3, 60, '1'),
(4, '10', '1', '4', 'Juni', '2021', '2021-07-17', 'Sabtu', '09:00', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 3, 3, 100, '1'),
(5, '2', '1', '1', 'Januari', '2021', '2021-01-01', 'Jumat', '10:00', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 3, 2, 67, '1'),
(6, '10', '3', '2', 'Juni', '2021', '2021-06-21', 'Sabtu', '10:20', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 3, 2, 67, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_dtt`
--

CREATE TABLE `penilaian_dtt` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_program` varchar(255) NOT NULL,
  `id_aktivitas` varchar(255) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `op1` int(2) NOT NULL,
  `op2` int(2) NOT NULL,
  `op3` int(2) NOT NULL,
  `op4` int(2) NOT NULL,
  `op5` int(2) NOT NULL,
  `op6` int(2) NOT NULL,
  `op7` int(2) NOT NULL,
  `op8` int(2) NOT NULL,
  `op9` int(2) NOT NULL,
  `op10` int(2) NOT NULL,
  `op_total` int(2) NOT NULL,
  `rp` int(2) NOT NULL,
  `perhitungan` int(10) NOT NULL,
  `sesi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian_dtt`
--

INSERT INTO `penilaian_dtt` (`id`, `id_user`, `id_program`, `id_aktivitas`, `bulan`, `tahun`, `tanggal`, `hari`, `jam`, `op1`, `op2`, `op3`, `op4`, `op5`, `op6`, `op7`, `op8`, `op9`, `op10`, `op_total`, `rp`, `perhitungan`, `sesi`) VALUES
(3, '10', '1', '1', 'Januari', '2020', '2021-07-16', 'Jumat', '10:00', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 3, 3, 100, '1'),
(4, '10', '1', '4', 'Januari', '2020', '2021-07-18', 'Minggu', '13:00', 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 4, 3, 75, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungan_dt`
--

CREATE TABLE `perhitungan_dt` (
  `id_perhitungan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `rata` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perhitungan_dt`
--

INSERT INTO `perhitungan_dt` (`id_perhitungan`, `id_user`, `bulan`, `tahun`, `rata`, `kategori`) VALUES
(12, 10, 'Januari', '2020', '80', 'Baik'),
(14, 10, 'Februari', '2020', '83', 'Cukup'),
(16, 10, 'Maret', '2020', '75', 'Cukup'),
(17, 10, 'April', '2020', '50', 'Kurang'),
(18, 10, 'Mei', '2020', '82', 'Baik'),
(19, 10, 'Juni', '2020', '75', 'Cukup'),
(23, 2, 'Januari', '2021', '67', 'Cukup'),
(24, 10, 'Juni', '2021', '75.6666666', 'Cukup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhitungan_dtt`
--

CREATE TABLE `perhitungan_dtt` (
  `id_perhitungan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `rata` varchar(10) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perhitungan_dtt`
--

INSERT INTO `perhitungan_dtt` (`id_perhitungan`, `id_user`, `bulan`, `tahun`, `rata`, `kategori`) VALUES
(14, 10, 'Februari', '2020', '45', 'Kurang'),
(16, 10, 'Maret', '2020', '75', 'Cukup'),
(17, 10, 'April', '2020', '50', 'Kurang'),
(18, 10, 'Mei', '2020', '82', 'Baik'),
(19, 10, 'Juni', '2020', '75', 'Baik'),
(23, 2, 'Januari', '2021', '67', 'Cukup'),
(24, 10, 'Juni', '2021', '75.6666666', 'Cukup'),
(25, 10, 'Januari', '2020', '87.5', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `kode_program` varchar(255) NOT NULL,
  `nama_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `kode_program`, `nama_program`) VALUES
(1, 'I.A.01', 'Duduk Mandiri Di Kursi'),
(3, 'I.A.02', 'Kontak Mata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_induk` varchar(15) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `rombel` varchar(50) NOT NULL,
  `layak_pip` varchar(10) NOT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_induk`, `jk`, `alamat`, `email`, `tempat_lahir`, `tanggal_lahir`, `rombel`, `layak_pip`, `role`) VALUES
(1, 'Aditya Aziz Fikhri', '10186018', 'Laki - Laki', 'Bireuen', 'aditfreedom11@gmail.com', 'Lhokseumawe', '1996-01-31', '-', '-', '0'),
(2, 'Muhammad Abidzar', '009001234', 'Laki - Laki', 'Bireuen', 'abidzar11@gmail.com', 'Bireuen', '2009-05-28', 'II C', 'Ya', '2'),
(9, 'Yuki Annisa Putri', '10186017', 'Perempuan', 'Bireuen', 'yuki@terapis.com', 'Lhokseumawe', '2000-03-31', '-', '-', '1'),
(10, 'MUHAMMAD FUJI', '121212', 'Laki - Laki', '-', 'fuji@gmail.com', 'Bireuen', '2021-07-15', 'II A', 'Ya', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `penilaian_dt`
--
ALTER TABLE `penilaian_dt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_dtt`
--
ALTER TABLE `penilaian_dtt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perhitungan_dt`
--
ALTER TABLE `perhitungan_dt`
  ADD PRIMARY KEY (`id_perhitungan`);

--
-- Indeks untuk tabel `perhitungan_dtt`
--
ALTER TABLE `perhitungan_dtt`
  ADD PRIMARY KEY (`id_perhitungan`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penilaian_dt`
--
ALTER TABLE `penilaian_dt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penilaian_dtt`
--
ALTER TABLE `penilaian_dtt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perhitungan_dt`
--
ALTER TABLE `perhitungan_dt`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `perhitungan_dtt`
--
ALTER TABLE `perhitungan_dtt`
  MODIFY `id_perhitungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
