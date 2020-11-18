-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Nov 2020 pada 10.00
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edii_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `id` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki laki','Perempuan') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `g_darah` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `alamat_1` text NOT NULL,
  `alamat_2` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_tel` int(20) NOT NULL,
  `terdekat` varchar(255) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_riwayat_pel` int(11) NOT NULL,
  `id_riwayat_pek` int(11) NOT NULL,
  `skill` text NOT NULL,
  `ditempatkan` varchar(255) NOT NULL,
  `penghasilan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cookie`
--

CREATE TABLE `tbl_cookie` (
  `id_cookie` int(11) NOT NULL,
  `id_user_cookie` int(11) NOT NULL,
  `cookie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_cookie`
--

INSERT INTO `tbl_cookie` (`id_cookie`, `id_user_cookie`, `cookie`) VALUES
(1, 1, 'v35e2aqh514ugv6lvl9lkmuby98h2b3n'),
(2, 2, 'c36pgekgmrgycxoabugl64xxmdrbwqcpujnlxjya09r6k2ffqnuc107iq065x79s');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `browser_version` varchar(200) NOT NULL,
  `os` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `online` int(11) NOT NULL,
  `waktu_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`id_login`, `id_user`, `browser`, `browser_version`, `os`, `ip_address`, `online`, `waktu_login`) VALUES
(1, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:10:24'),
(2, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:10:57'),
(3, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:11:15'),
(4, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:13:17'),
(5, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:14:35'),
(6, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:15:00'),
(7, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:16:55'),
(8, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:17:55'),
(9, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:22:17'),
(10, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:22:44'),
(11, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 08:37:12'),
(12, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 09:05:50'),
(13, 1, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 09:15:02'),
(14, 2, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 09:21:12'),
(15, 2, 'Chrome', '86.0.4240.193', 'Mac OS X', '::1', 0, '2020-11-11 09:22:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan_terakhir`
--

CREATE TABLE `tbl_pendidikan_terakhir` (
  `id` int(11) NOT NULL,
  `bio_id` int(11) NOT NULL,
  `jenjang` varchar(255) DEFAULT NULL,
  `nama_institusi` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(255) DEFAULT NULL,
  `ipk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_kerja`
--

CREATE TABLE `tbl_riwayat_kerja` (
  `id` int(11) NOT NULL,
  `bio_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `pendapatan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_pelatihan`
--

CREATE TABLE `tbl_riwayat_pelatihan` (
  `id` int(11) NOT NULL,
  `bio_id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `aktif` int(1) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1 = Administrator 2 = User',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `password`, `aktif`, `level`, `created_at`) VALUES
(1, 'admin@admin.com', '$2y$10$NUBAXrkjkZSlXUW0y.ePduizp1glmG0eO4nMUTCqQ/JER87JPiYHq', 1, 1, '2020-11-18 07:07:55'),
(2, 'irfan@arifin.com', '$2y$10$AUhvrDviSt1UUJhKEWRIdetqtbDQ7qWemVvfI9IAYbytbXRWtsWGO', 1, 2, '2020-11-18 08:04:36'),
(3, 'irfan@test.com', '$2y$10$Ccc01.zC1PXQyf1kYvy22.IudunQQWEg7ZhgBGYe1B8heK6VkYnhm', 1, 2, '2020-11-18 08:15:31'),
(4, 'arv@irfan.com', '$2y$10$EPAfihO7n6Bfjnz3Lyh..ubjAdF5h.8LNzuU06Hxgl5kJQzsIarzO', 1, 2, '2020-11-18 08:18:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_cookie`
--
ALTER TABLE `tbl_cookie`
  ADD PRIMARY KEY (`id_cookie`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pendidikan_terakhir`
--
ALTER TABLE `tbl_pendidikan_terakhir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_riwayat_kerja`
--
ALTER TABLE `tbl_riwayat_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_riwayat_pelatihan`
--
ALTER TABLE `tbl_riwayat_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_cookie`
--
ALTER TABLE `tbl_cookie`
  MODIFY `id_cookie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendidikan_terakhir`
--
ALTER TABLE `tbl_pendidikan_terakhir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_kerja`
--
ALTER TABLE `tbl_riwayat_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
