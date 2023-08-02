-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 15.37
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bumil`
--

CREATE TABLE `bumil` (
  `id_bumil` int(11) NOT NULL,
  `nik_bumil` int(100) NOT NULL,
  `nama_bumil` varchar(100) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat_b` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bumil`
--

INSERT INTO `bumil` (`id_bumil`, `nik_bumil`, `nama_bumil`, `nama_suami`, `tanggal`, `alamat_b`) VALUES
(1, 0, 'Ayu', 'wawan', '1980-08-08', 'talaga 08/08'),
(16, 0, 'Siti', 'yanto', '1986-06-28', 'talaga 02/02'),
(19, 0, 'arini', 'rudianto', '1980-01-01', 'Talaga 06/02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_balita`
--

CREATE TABLE `daftar_balita` (
  `id_balita` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `ke` int(100) NOT NULL,
  `nik_balita` varchar(100) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `kia` int(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nik_ayah` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_balita`
--

INSERT INTO `daftar_balita` (`id_balita`, `id`, `no_kk`, `ke`, `nik_balita`, `nama_balita`, `tanggal_lahir`, `jenis_kelamin`, `kia`, `nama_ayah`, `nik_ayah`, `alamat`, `no_hp`) VALUES
(2, 13, '3603183110180029', 2, '3603181212220001', 'M. Nizam', '2022-12-12', 'Laki', 310048, 'Andri Nani', '3603182409950008', 'Talaga 02/02', '08111112'),
(3, 20, '1234567891023123', 1, '02000233819320', 'zahra putri yuliani', '2020-08-15', 'Perempuan', 1234, 'amim faisal', '123918298002938', 'rancakiyowo', '0981029892774'),
(10, 1, '3603030107100008', 2, '-', 'kenjo', '2022-11-01', 'Laki', 330048, 'Arif Maryanah', '3603030909890002', 'Talaga 02/02', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_bumil`
--

CREATE TABLE `daftar_bumil` (
  `id` int(11) NOT NULL,
  `id_bumil` int(100) NOT NULL,
  `nama_bumil` varchar(100) NOT NULL,
  `usia_bumil` int(100) NOT NULL,
  `usia_hamil` varchar(100) NOT NULL,
  `bb_bumil` varchar(100) NOT NULL,
  `t_darah` varchar(100) NOT NULL,
  `hb` int(100) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `hamil_brp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_bumil`
--

INSERT INTO `daftar_bumil` (`id`, `id_bumil`, `nama_bumil`, `usia_bumil`, `usia_hamil`, `bb_bumil`, `t_darah`, `hb`, `tanggal_periksa`, `hamil_brp`) VALUES
(1, 1, 'Ayu', 34, '12', '45', '12', 0, '2023-07-17', 0),
(2, 1, 'Ayu', 32, '12', '12', '12', 0, '2023-07-17', 0),
(3, 16, 'Siti', 23, '12', '12', '12', 12, '2023-07-17', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `tempat`, `waktu`) VALUES
(8, '2023-07-01', 'Posyandu melati rt 02/02', '16:19:00'),
(9, '2023-07-18', 'Posayandu angrek rt 06/03', '10:07:00'),
(10, '2023-07-19', 'Posyandu mawar rt 04/03', '11:08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_hadir` int(11) NOT NULL,
  `id_balita` int(100) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_hadir`, `id_balita`, `nama_balita`, `nama_ortu`, `tanggal`, `alamat`) VALUES
(11, 1, 'Ayu', 'Kohar', '2023-07-17', 'talaga 08/08'),
(12, 3, 'M. Nizam', 'Andri', '2023-07-17', 'Talaga 02/02'),
(13, 3, 'zahra putri yuliani', 'amim', '2023-07-19', 'rancakiyowo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa_balita`
--

CREATE TABLE `periksa_balita` (
  `id_periksa` int(11) NOT NULL,
  `id_hadir` int(100) NOT NULL,
  `nama_balita` varchar(100) NOT NULL,
  `usia_balita` varchar(100) NOT NULL,
  `tb_balita` decimal(10,0) NOT NULL,
  `bb_balita` decimal(10,0) NOT NULL,
  `vitamin` varchar(100) NOT NULL,
  `imunisasi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periksa_balita`
--

INSERT INTO `periksa_balita` (`id_periksa`, `id_hadir`, `nama_balita`, `usia_balita`, `tb_balita`, `bb_balita`, `vitamin`, `imunisasi`, `tanggal`) VALUES
(15, 1, 'Ayu', '0-6 bulan', '20', '15', 'vitamin A', 'Polio', '2023-07-17'),
(16, 3, 'M. Nizam', '0-6 bulan', '23', '17', 'vitamin C', 'Polio', '2023-07-17'),
(17, 3, 'zahra putri yuliani', '0-6 bulan', '23', '13', 'vitamin A', 'MMR', '2023-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regis`
--

CREATE TABLE `regis` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passworda` varchar(100) NOT NULL,
  `ulang_password` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `levela` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `regis`
--

INSERT INTO `regis` (`id`, `nama`, `username`, `passworda`, `ulang_password`, `no_hp`, `levela`) VALUES
(1, 'ikki', 'admin', '123', '123', '0123', 'admin'),
(2, 'sri', 'sri', '123', '123', '089529232588', 'kader'),
(12, 'bidan teti', 'bidan', '123', '123', '083874286324', 'bidan'),
(13, 'Andri Nani', 'andri', '123', '123', '085719653456', 'user'),
(20, 'Yuliani Putri Zahra', 'putri', '123', '123', '08929312372', 'user'),
(23, 'bahroni murni', 'murni', '123', '123', '088212993192', 'user'),
(27, 'asa', 'asa', '123', '123', '123', 'user'),
(28, 'sas', 'as', 'as', 'as', 'as', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bumil`
--
ALTER TABLE `bumil`
  ADD PRIMARY KEY (`id_bumil`);

--
-- Indeks untuk tabel `daftar_balita`
--
ALTER TABLE `daftar_balita`
  ADD PRIMARY KEY (`id_balita`),
  ADD KEY `id_balita` (`id_balita`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `daftar_bumil`
--
ALTER TABLE `daftar_bumil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bumil` (`id_bumil`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_hadir`),
  ADD KEY `id_balita` (`id_balita`);

--
-- Indeks untuk tabel `periksa_balita`
--
ALTER TABLE `periksa_balita`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_hadir` (`id_hadir`);

--
-- Indeks untuk tabel `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bumil`
--
ALTER TABLE `bumil`
  MODIFY `id_bumil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `daftar_balita`
--
ALTER TABLE `daftar_balita`
  MODIFY `id_balita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `daftar_bumil`
--
ALTER TABLE `daftar_bumil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_hadir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `periksa_balita`
--
ALTER TABLE `periksa_balita`
  MODIFY `id_periksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `regis`
--
ALTER TABLE `regis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
