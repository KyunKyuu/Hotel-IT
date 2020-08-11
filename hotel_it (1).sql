-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2020 pada 19.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_it`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(100) NOT NULL,
  `judul_about` varchar(100) NOT NULL,
  `subjudul_about` text NOT NULL,
  `deskripsi_about` text NOT NULL,
  `subdeskripsi_about` text NOT NULL,
  `whychooseus_about` varchar(100) NOT NULL,
  `subwhychooseus_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_hotel`
--

CREATE TABLE `category_hotel` (
  `id` int(11) NOT NULL,
  `negara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category_hotel`
--

INSERT INTO `category_hotel` (`id`, `negara`) VALUES
(1, 'Indonesia'),
(2, 'Jepang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_kamar`
--

CREATE TABLE `category_kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `nama_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_kamar`
--

INSERT INTO `category_kamar` (`id`, `hotel_id`, `nama_category`, `harga`, `ukuran`) VALUES
(1, 1, 'Deluxe King', '1000', '1x1'),
(2, 2, 'Small Sweet', '2000', '1x2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon_kamar`
--

CREATE TABLE `diskon_kamar` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `persenan_diskon` int(11) NOT NULL,
  `harga_diskon` int(11) NOT NULL,
  `dsikon_mulai` datetime NOT NULL,
  `diskon_berakhir` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `category_hotel_id` int(11) NOT NULL,
  `nama_hotel` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `check_in` datetime DEFAULT CURRENT_TIMESTAMP,
  `check_out` datetime DEFAULT CURRENT_TIMESTAMP,
  `gambar_hotel` varchar(100) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `category_hotel_id`, `nama_hotel`, `kota`, `alamat`, `fasilitas`, `check_in`, `check_out`, `gambar_hotel`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Teguh Hotel', 'Bandung', '', 'Spaa', '2020-08-05 00:00:00', '2020-08-14 00:00:00', '', '', '2020-08-09 09:47:09', '2020-08-10 06:31:17'),
(2, 2, 'Anjay Hotel broo', 'Bandung', 'Jalan Taman Hewan', 'warner', NULL, NULL, 'images/hotel/anjay-hotel-slug.png', 'anjay-hotel-broo', '2020-08-10 10:56:10', '2020-08-10 23:38:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_kamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kamar` enum('tersedia','tidak tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_kamar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `kode_kamar`, `fasilitas_kamar`, `status_kamar`, `gambar_kamar`, `kapasitas_kamar`, `category_id`, `slug`, `content`, `created_at`, `updated_at`) VALUES
(1, '12 12', '124', 'tersedia', 'images/kamar/12.png', 0, 2, 'bdsg-askas', 'test jam segini', '2020-08-07 20:54:44', '2020-08-10 02:21:00'),
(6, 'sdf sdgs', '124', 'tersedia', '', 0, 1, 'sdf-sdgs', 'we', '2020-08-07 20:54:44', '2020-08-08 03:54:44'),
(7, 'Bdsg ASkas', '124', 'tersedia', 'images/kamar/bdsg-askas.png', 1, 2, 'bdsg-askas', 'qwe', '2020-08-09 15:41:19', '2020-08-09 22:43:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_access`
--

CREATE TABLE `login_access` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_30_204156_create_kamar_table', 1),
(5, '2020_07_30_204209_create_kelas_kamar_table', 1),
(6, '2020_07_30_204221_create_reservasi_table', 1),
(7, '2020_07_30_204234_create_reservasi_pembayaran_table', 1),
(8, '2020_07_30_204244_create_review_table', 1),
(9, '2020_07_30_204252_create_saran_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('41@gmail.com', '$2y$10$RKd93eIJtNMTla56S4SxAOwF/.awz4ygrABeb3y5l5D.Rqf7w2TIG', '2020-08-09 12:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `kode_reservasi` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `kamar_id` bigint(20) UNSIGNED NOT NULL,
  `no_telpon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi_pembayaran`
--

CREATE TABLE `reservasi_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservasi_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `diskon_id` int(11) DEFAULT NULL,
  `harga_category` int(11) DEFAULT NULL,
  `uang_bayar` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('sudah bayar','belum bayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `isi_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_kebersihan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_pelayanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_kenyamanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_servis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi_saran` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `alamat` text,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `user_id`, `negara`, `no_telpon`, `jenis_kelamin`, `alamat`, `gambar`) VALUES
(1, 2, NULL, '123', NULL, 'Bandung', 'images/profile/Rifqi njir.jpeg'),
(12, 20, NULL, '123456744', NULL, NULL, NULL),
(13, 1, NULL, '86545', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `status`, `last_login`, `remember_token`, `created_at`) VALUES
(1, 'Teguh', 'admin', 'iqbal.teguh782@gmail.com', '2020-08-09 14:36:59', '$2y$10$yfC8h.OKQhXgN6QssOnE/ufwsPQOwEBVQa.GtT55rBNI9YDIhzIMi', 'aktif', '2020-08-09 14:36:59', 'rw8jPiDbEbrPWhbXc7XLognn1lydHDuZMteTfqr94vawMChTprE6wwYd0uFo', '2020-07-31 06:43:52'),
(2, 'qinub', 'tamu', '41@gmail.com', '2020-08-09 05:02:03', '$2y$10$IyUHrCNYw2ZxAhptyAQ7Bu1bDqLbKXQbyk0rOARvPf3y9/TiAoVsq', 'aktif', '2020-08-10 05:48:57', '4hQPX52KcKMZf4I2I6LTkgnNW0a3RdATrxxWDKgowyEbKRSZPtwt7WA37kTt', '2020-08-02 03:19:57'),
(20, 'Teguh Iqbal Prayoga', 'tamu', 'teguh.iqbal782@gmail.com', NULL, '$2y$10$r4XKatDf5js7.7V6OpFGI.3fBHu/YJVEaXx55KnG2E0U1d2w5A/GS', 'aktif', '2020-08-08 23:39:18', '', '2020-08-09 05:56:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_hotel`
--
ALTER TABLE `category_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category_kamar`
--
ALTER TABLE `category_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diskon_kamar`
--
ALTER TABLE `diskon_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_access`
--
ALTER TABLE `login_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`kode_reservasi`);

--
-- Indeks untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category_hotel`
--
ALTER TABLE `category_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `category_kamar`
--
ALTER TABLE `category_kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diskon_kamar`
--
ALTER TABLE `diskon_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login_access`
--
ALTER TABLE `login_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `kode_reservasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
