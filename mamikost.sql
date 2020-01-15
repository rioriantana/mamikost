-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15 Jan 2020 pada 15.18
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamikost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosts`
--

CREATE TABLE `kosts` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remove_at` timestamp NULL DEFAULT NULL,
  `kost` int(11) DEFAULT NULL,
  `available_room_count` int(11) DEFAULT NULL,
  `amenities` varchar(255) DEFAULT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `large` varchar(255) DEFAULT NULL,
  `description` longtext,
  `owner_id` int(11) DEFAULT NULL,
  `price_day` int(11) DEFAULT NULL,
  `price_week` int(11) DEFAULT NULL,
  `price_month` int(11) DEFAULT NULL,
  `price_year` int(11) DEFAULT NULL,
  `province` varchar(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `distric` varchar(255) DEFAULT NULL,
  `location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kosts`
--

INSERT INTO `kosts` (`id`, `caption`, `timestamp`, `updated_at`, `created_at`, `remove_at`, `kost`, `available_room_count`, `amenities`, `imgUrl`, `large`, `description`, `owner_id`, `price_day`, `price_week`, `price_month`, `price_year`, `province`, `city`, `distric`, `location`) VALUES
(13, 'Kost Kost an mahal', '2020-01-15 01:39:49', '2020-01-14 18:39:49', '2020-01-14 18:39:49', NULL, 15, 3, 'tv,kulkas,ac,kamar mandi dalam', 'https://static.mamikos.com/uploads/cache/data/style/2019-12-11/XJw1eqyi-540x720.jpg', '16', 'Kamar berada di LANTAI 3 | BISA BOOKING dulu sebelum kehabisan | bisa BERDUA tambah 50ribu/hari | GRATIS laundry | sudah tersedia kasur disetiap kamar | lokasi kos strategis dekat dengan Universitas Katholik Parahyangan, Universitas Pasundan, Universitas Pendidikan Indonesia, Pasar Sederhana, Plaza Sentrasari, RS HA Rotinsulu Lung, juga terjangkau dengan mini market, warung makan, SPBU dan atm | YUK buruan BOOKING kamar idaman kamu', 10, NULL, NULL, 1000000, NULL, 'Jawa Barat', 'Bandung', 'Cidadap', 1342);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_01_14_080629_update_user_table', 1),
(2, '2020_01_14_221212_add_province_to_users_table', 2),
(3, '2020_01_14_222139_add_kost_to_users_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balances` int(11) NOT NULL DEFAULT '0',
  `is_premium` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charged_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `balances`, `is_premium`, `created_at`, `updated_at`, `charged_at`) VALUES
(1, 'rioriantana', 'riolusadin@gmail.com', NULL, '$2y$10$zj95bMQDLqRaPR6DxOm38uoR8jrmivi.e/Wjkmi6xngnOBYbXOifW', 'rsjEXH7wLyJYnvdsMyqH8BGSVKBkWLOC', 'rsjEXH7wLyJYnvdsMyqH8BGSVKBkWLOC', 0, 0, '2020-01-13 23:36:44', '2020-01-14 12:46:39', '2020-01-15 20:43:41'),
(10, 'riooke123', 'riooke123@gmail.com', NULL, '$2y$10$LMDjcz/5sOs9Kbf0x.sqPOh49r3YZii9RAeiSy3tu81IYpmEQ0sx6', 'PZdB5CQgPunsy1G8eMEdIgKp4sYEtidB', 'PZdB5CQgPunsy1G8eMEdIgKp4sYEtidB', 0, 0, '2020-01-14 01:10:49', '2020-01-14 13:32:49', '2020-01-15 20:43:41'),
(11, 'riooke124', 'riooke124@gmail.com', NULL, '$2y$10$rfX37Nka6dU6UKLLv7/yGOGRWfbDDE.mE68WVFKVse8CWROZxj60S', '2qnz3cFj21GervLeAqBpNDClDY5atZqA', '2qnz3cFj21GervLeAqBpNDClDY5atZqA', 0, 0, '2020-01-14 01:15:27', '2020-01-14 13:24:23', '2020-01-15 20:43:41'),
(18, 'riooke124', 'riooke12456@gmail.com', NULL, '$2y$10$a6CwDMxcyXD4kIJvshnUI.my.GK.hsnaDVhhGnRA.d9fnT1AMs2Te', 'iObfPgnyN8vNK86RA0txLF3txRNxok7y', 'iObfPgnyN8vNK86RA0txLF3txRNxok7y', 0, 0, '2020-01-14 13:25:35', '2020-01-14 13:25:35', '2020-01-15 20:43:41'),
(19, 'riooke124', 'riooke124567@gmail.com', NULL, '$2y$10$DS/.G4DyzAwpQj6Q769c7e5YMBWAwlI/6n2UYXbbduai4yx.ZjPaO', 'UcDgI3fk2fY2hJ2Mphsm3OFiz8y2JPLh', 'UcDgI3fk2fY2hJ2Mphsm3OFiz8y2JPLh', 0, 0, '2020-01-14 13:27:23', '2020-01-14 13:27:23', '2020-01-15 20:43:41'),
(20, 'riookebla', 'riookeblablaoke@gmail.com', NULL, '$2y$10$Fs4jdf75Voo/GLuKACqazOVHRSEk9zb/nry/BvLOL.DH9ExrfX3gS', 'UeWU1jmX6XEtz3U02iP48NT8yhh9ts87', 'UeWU1jmX6XEtz3U02iP48NT8yhh9ts87', 50, 0, '2020-01-14 18:58:17', '2020-01-14 18:58:17', '2020-01-15 20:43:41'),
(21, 'riookebla', 'dhannyoke@gmail.com', NULL, '$2y$10$H9nF.SUKUXs6YOP812809enLp5Pt0t6TExsN6VDuyvUKJTztVUhh2', 'nKURdbKcR7QEzllLM7JrZs3S2djKZ8bu', 'nKURdbKcR7QEzllLM7JrZs3S2djKZ8bu', 50, 0, '2020-01-15 06:44:49', '2020-01-15 06:44:49', '2020-01-15 20:44:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kosts`
--
ALTER TABLE `kosts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kosts`
--
ALTER TABLE `kosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
