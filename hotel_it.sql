-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2020 pada 14.12
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
  `harga` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_kamar`
--

INSERT INTO `category_kamar` (`id`, `hotel_id`, `nama_category`, `harga`, `slug`, `id_pembuat`, `created_at`, `updated_at`) VALUES
(4, 1, 'Vanillaa Delux', 2000, 'vanillaa-delux', 2, '2020-08-14 13:17:58', '2020-10-02 15:44:04'),
(15, 3, 'Ploriddaa class', 57, 'ploriddaa-class', 27, '2020-08-18 14:45:46', '2020-09-23 08:29:53'),
(23, 6, 'Grenn Room', 10, 'grenn-room', 27, '2020-09-18 16:15:46', '2020-10-01 14:57:32'),
(24, 1, 'Iorin Room', 3000, 'iorin-room', 2, '2020-10-01 22:38:13', '2020-10-02 15:36:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `kode_diskon` varchar(50) DEFAULT NULL,
  `kamar_id` int(11) NOT NULL,
  `type` enum('potongan harga','persen') NOT NULL,
  `diskon` int(11) NOT NULL,
  `diskon_start` datetime NOT NULL,
  `diskon_end` datetime NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `kode_diskon`, `kamar_id`, `type`, `diskon`, `diskon_start`, `diskon_end`, `id_pembuat`, `created_at`, `updated_at`) VALUES
(10, NULL, 4, 'potongan harga', 500, '2020-10-19 02:02:00', '2020-12-03 01:01:00', 2, '2020-10-19 22:34:44', '2020-10-19 15:34:44');

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
  `fasilitas_icon_hotel` varchar(191) NOT NULL,
  `fasilitas_text_hotel` varchar(191) NOT NULL,
  `check_in` datetime DEFAULT CURRENT_TIMESTAMP,
  `check_out` datetime DEFAULT CURRENT_TIMESTAMP,
  `gambar_hotel` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `category_hotel_id`, `nama_hotel`, `kota`, `alamat`, `fasilitas_icon_hotel`, `fasilitas_text_hotel`, `check_in`, `check_out`, `gambar_hotel`, `content`, `slug`, `id_pembuat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hotel Vegas', 'Bandung', 'Jalan Kebun Binatang no.69', '[\"fas fa-code\",\"fab fa-500px\",\"far fa-address-card\",\"fab fa-500px\"]', '[\"warung\",\"free smoke\",\"swiming\",\"dinner\"]', NULL, NULL, 'images/hotel/p-hotel.png', '<b> Deskripsi Hotel</b><br><h3>Hotel ini adalah hotel tterbaikkkkk</h3>', 'hotel-vegas', 2, '2020-08-09 09:47:09', '2020-10-29 09:11:11'),
(3, 1, 'Florida Hotel', 'Solo', 'Jln. cempaka solo', '[\"fas fa-user\",\"fab fa-500px\",\"far fa-address-card\",\"fab fa-500px\"]', '[\"warung\",\"free smoke\",\"swiming\",\"dinner\"]', '2020-09-18 02:04:00', '2020-09-18 02:04:00', 'images/hotel/florida-hotel.png', '<b> Florida Hotel</b><br><h3>Hotel Paling Mantapk</h3>', 'florida-hotel', 0, '2020-08-14 13:12:03', '2020-11-01 13:22:52'),
(6, 1, 'Hotel Horizon', 'Bandung', 'Jln. cempaka solo', '[\"fas fa-smoking\",\"fas fa-spa\",\"fas fa-parking\",\"fab fa-500px\"]', '[\"warung\",\"free smoke\",\"swiming\",\"dinner\"]', '2020-09-18 02:04:00', '2020-09-18 02:04:00', 'images/hotel/hotel-horizon.jpeg', 'Hotel terbaik pastinyaa', 'hotel-horizon', 27, '2020-09-18 16:14:17', '2020-11-01 13:22:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas_icon_kamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas_text_kamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kamar` enum('tersedia','tidak tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_kamar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `kode_kamar` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `fasilitas_icon_kamar`, `fasilitas_text_kamar`, `status_kamar`, `gambar_kamar`, `kapasitas_kamar`, `jumlah_kamar`, `category_id`, `kode_kamar`, `content`) VALUES
(10, '[\"far fa-address-card\",\"fas fa-air-freshener\",\"fas fa-ambulance\",\"fas fa-ambulance\",\"fas fa-ambulance\"]', '[\"free wifi\",\"free warnet\",\"up smoking\",\"free coffe\",\"free teah\"]', 'tersedia', 'images/kamar/vanillaa-delux.png', 2, 6, 4, '', 'Kamar untuk raja, rakyat minggir duluu bos'),
(15, '[\"fas fa-code\",\"fab fa-500px\",\"far fa-address-card\",\"fas fa-ambulance\",\"fas fa-ambulance\"]', '[\"free wifi\",\"free warnet\",\"up smoking\",\"free coffe\",\"free teah\"]', 'tersedia', 'images/kamar/ploriddaa-class.png', 6, 3, 15, '', '<p>23</p>'),
(21, '[\"fas fa-bed\",\"fas fa-wifi\",\"fas fa-tv\",\"fas fa-ambulance\",\"fas fa-ambulance\"]', '[\"free wifi\",\"free warnet\",\"up smoking\",\"free coffe\",\"free teah\"]', 'tersedia', 'images/kamar/grenn-room.jpeg', 4, 10, 23, 'KPzZ7f', 'Kamar terbaik dengan fasilitas mantap'),
(22, '[\"fas fa-wifi\",\"far fa-comment-alt\",\"fas fa-smoking\",\"fas fa-coffee\",\"fas fa-ambulance\"]', '[\"free wifi\",\"free computer\",\"up smoking\",\"free coffe\",\"Free Ambulance\"]', 'tersedia', 'images/kamar/iorin-room.jpeg', 2, 2, 24, 'rRlWOa', '<p>Kamar Terbai</p>');

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
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('Male','Female') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `last_name`, `no_telpon`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `gambar`) VALUES
(1, 2, NULL, '123', NULL, NULL, 'Bandung', 'images/profile/Rifqi njir.jpeg'),
(12, 20, 'Iqbal', '123456744', 'Male', NULL, 'Bandungggggg', NULL),
(13, 1, NULL, '86545', 'Female', NULL, NULL, 'images/profile/Teguh Iqbal Prayoga.png'),
(19, 27, NULL, '0812412512', NULL, NULL, NULL, NULL),
(22, 30, 'pertama', '089637494466', NULL, NULL, NULL, NULL),
(23, 31, 'rian', '08963670264', NULL, NULL, NULL, NULL),
(24, 32, 'Iqbal', '94384383488', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_reservasi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_kamar_id` bigint(20) UNSIGNED NOT NULL,
  `durasi_reservasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `kode_reservasi`, `user_id`, `jumlah`, `check_in`, `check_out`, `category_kamar_id`, `durasi_reservasi`, `created_at`, `updated_at`) VALUES
(1, 'wer2343', 20, 1, '2020-11-03 09:12:50', '2020-12-09 17:00:00', 24, 1, '2020-11-03 09:12:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi_pembayaran`
--

CREATE TABLE `reservasi_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservasi_id` int(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `diskon_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reservasi_pembayaran`
--

INSERT INTO `reservasi_pembayaran` (`id`, `reservasi_id`, `tgl_pembayaran`, `diskon_id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '0000-00-00', NULL, 2000, '2020-11-05 07:52:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi_request`
--

CREATE TABLE `reservasi_request` (
  `id` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL,
  `name_guest` varchar(50) DEFAULT NULL,
  `spesial_request` varchar(100) DEFAULT NULL,
  `other_request` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi_request`
--

INSERT INTO `reservasi_request` (`id`, `reservasi_id`, `name_guest`, `spesial_request`, `other_request`) VALUES
(1, 1, NULL, '[null,null,null,null]', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `isi_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `last_login`, `remember_token`, `created_at`) VALUES
(1, 'Teguh Iqbal Prayoga', 'superadmin', 'iqbal.teguh782@gmail.com', '2020-08-09 14:36:59', '$2y$10$yfC8h.OKQhXgN6QssOnE/ufwsPQOwEBVQa.GtT55rBNI9YDIhzIMi', '2020-08-16 16:56:06', '7oTBKv0UM5w35Zxs7vm58DQ3OpEUh9YMIRQzu09By743YNiW6mJSlu52nan0', '2020-07-31 06:43:52'),
(2, 'Admin Hotel', 'admin', '41@gmail.com', '2020-08-09 14:36:59', '$2y$10$Gagejn3.5NjZZPou5mqgpO9pstxfIqdCeMFE.eR1dlatGBuWVQ/QK', '2020-11-06 13:53:05', 'ozKsvjl04cRpmb3kndHxERpwF9oHYMFVeIK0B1iNa9QLFvIIb7rSYjeUpEsy', '2020-08-02 03:19:57'),
(20, 'Tamu', 'tamu', 'tamu@gmail.com', '2020-09-02 00:00:00', '$2y$10$r4XKatDf5js7.7V6OpFGI.3fBHu/YJVEaXx55KnG2E0U1d2w5A/GS', '2020-11-01 19:37:05', '', '2020-08-09 05:56:36'),
(27, 'Admin', 'admin', '123@gmail.com', '2020-08-09 14:36:59', '$2y$10$pEwvrn.vF2lF1cIH0aqpn.vojt3lv0pi3aiLrhNDGDAumBiddmZY6', '2020-09-14 18:54:40', 'jL0r37gToySO4UQoZGK0NxmoQUN1JgbzjBwPKS2geT8wBjSgCiHjQhLnO5Hr', '2020-09-14 11:54:40'),
(30, 'damdam', 'tamu', 'sulthonadammaulana@gmail.com', NULL, '$2y$10$pXn3rVnxjpmtZuIxHuJRwuFGC8SdGPDzvsEYDtZMwuMt48CiaPoc.', '2020-11-01 20:38:16', 'GA2iv3OCoazuJvOBrZwWo1zlq555lhoe8dX1HLh2FvU1ikIiruyQDvTXG8yK', '2020-11-01 13:38:16'),
(31, 'rian', 'tamu', 'rian.alfazri96@gmail.com', NULL, '$2y$10$mFTfh03ElgHAaivK/sHS2uqJqqMRUS..HbibyLew0dB6PnwBS/RSm', '2020-11-01 20:41:39', '1P9iMKvNWp1jaweCzf0oxIx1n0ZVY3tWHdsUfmtBRqbYR1IsuTrmfthuzHbX5m3FlS3a7ATv7z1cDHGBrxVzfNJsibsJfT1wtikq', '2020-11-01 13:41:39'),
(32, 'Teguh', 'tamu', 'guh@gmail.com', NULL, '$2y$10$iaDFNLpXDjT1CKcj.qqfz.ntKkzCESrbphH39tuQnScycSHhZcN1y', '2020-11-04 13:01:40', 'DCmCeF8kXhrudj4ffn5y7liYlWf2ux3SVAfaSn4lHwZPnlCiE5CKhohFDIse', '2020-11-04 06:01:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whislist`
--

CREATE TABLE `whislist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
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
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reservasi_request`
--
ALTER TABLE `reservasi_request`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `whislist`
--
ALTER TABLE `whislist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category_hotel`
--
ALTER TABLE `category_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `category_kamar`
--
ALTER TABLE `category_kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reservasi_request`
--
ALTER TABLE `reservasi_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `whislist`
--
ALTER TABLE `whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
