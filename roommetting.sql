-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2024 pada 07.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roommetting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(255) NOT NULL,
  `id_room` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_department` varchar(255) NOT NULL,
  `start_date_time` varchar(255) NOT NULL,
  `end_date_time` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_room`, `id_user`, `id_department`, `start_date_time`, `end_date_time`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
('BOOKING240216000000000000001', 'RM240214000000001', 'USER240216000000000000003', 'DPRT240216000000000000004', '2024-02-16T11:51', '2024-02-16T14:54', 'Rapat', 'Approved', '2024-02-16 02:49:43', '2024-02-16 02:49:43'),
('BOOKING240216000000000000002', 'RM240214000000001', 'USER240216000000000000003', 'DPRT240216000000000000004', '2024-02-16T09:57', '2024-02-16T09:57', 'Rapat', 'Approved', '2024-02-16 02:57:15', '2024-02-16 04:00:59'),
('BOOKING240216000000000000003', 'RM240214000000006', 'USER240216000000000000003', 'DPRT240216000000000000004', '2024-02-16T10:48', '2024-02-16T15:52', 'Rapat', 'Approved', '2024-02-16 03:47:44', '2024-02-16 07:29:28'),
('BOOKING240216000000000000004', 'RM240214000000003', 'USER240216000000000000004', 'DPRT240216000000000000004', '2024-02-16T13:51', '2024-02-16T16:54', 'Rapat Bersama', 'Pending', '2024-02-16 06:51:39', '2024-02-16 06:51:39'),
('BOOKING240216000000000000005', 'RM240214000000005', 'USER240216000000000000004', 'DPRT240216000000000000004', '2024-02-16T19:07', '2024-02-16T21:07', 'Rapat divisi', 'Pending', '2024-02-16 12:08:08', '2024-02-16 12:08:08'),
('BOOKING240216000000000000006', 'RM240214000000006', 'USER240216000000000000004', 'DPRT240216000000000000004', '2024-02-16T20:09', '2024-02-16T22:11', 'Rapat Kerja', 'Rejected', '2024-02-16 12:08:36', '2024-02-16 12:21:47'),
('BOOKING240216000000000000007', 'RM240214000000001', 'USER240216000000000000004', 'DPRT240216000000000000004', '2024-02-16T20:29', '2024-02-16T20:29', 'Rapat', 'Approved', '2024-02-16 13:29:34', '2024-02-19 05:44:18'),
('BOOKING240219000000000000001', 'RM240214000000001', 'USER240219000000000000001', 'DPRT240216000000000000004', '2024-02-19T12:50', '2024-02-19T12:50', 'Rapat', 'Approved', '2024-02-19 05:50:41', '2024-02-19 05:56:55'),
('BOOKING240219000000000000002', 'RM240214000000001', 'USER240219000000000000001', 'DPRT240216000000000000004', '2024-02-19T12:50', '2024-02-19T12:50', 'Rapat', 'Pending', '2024-02-19 05:51:35', '2024-02-19 05:52:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `department`
--

CREATE TABLE `department` (
  `id_department` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `department`
--

INSERT INTO `department` (`id_department`, `department_name`, `department_description`, `created_at`, `updated_at`) VALUES
('DPRT240216000000000000003', 'IT', '-', '2024-02-16 02:29:32', '2024-02-16 02:29:32'),
('DPRT240216000000000000004', 'Sales', '-', '2024-02-16 02:35:50', '2024-02-16 02:35:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_02_11_153631_create_rooms_table', 1),
(7, '2024_02_11_153316_create_departements_table', 3),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2024_02_11_153909_create_bookings_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `id_room` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `location_room` varchar(255) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `image_room` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`id_room`, `room_name`, `location_room`, `room_capacity`, `image_room`, `created_at`, `updated_at`) VALUES
('RM240214000000001', 'Meeting Room A', 'Lantai 1', 10, 'upload/room/202402191115waves-2211925_1280.jpg', '2024-02-13 21:53:01', '2024-02-19 04:15:47'),
('RM240214000000002', 'Meeting Room B', 'Lantai 2', 20, 'upload/room/202402140508waves-2211925_1280.jpg', '2024-02-13 21:53:53', '2024-02-13 22:08:31'),
('RM240214000000003', 'Meeting Room C', 'Lantai 2', 15, 'upload/room/202402140509wisata1.jpeg', '2024-02-13 22:09:06', '2024-02-13 22:09:06'),
('RM240214000000004', 'Meeting Room D', 'Lantai 2', 20, 'upload/room/202402141258waves-2211925_1280.jpg', '2024-02-14 05:58:51', '2024-02-14 05:58:51'),
('RM240214000000005', 'Meeting Room E', 'Lantai 2', 20, 'upload/room/202402141259zakynthos-6514351_1280.jpg', '2024-02-14 05:59:11', '2024-02-14 05:59:11'),
('RM240214000000006', 'Meeting Room F', 'Lantai 2', 20, 'upload/room/202402191246Sponge_Cake-removebg-preview.png', '2024-02-14 05:59:27', '2024-02-19 05:46:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(255) NOT NULL,
  `id_department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `role` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_department`, `email`, `password`, `name`, `gender`, `address`, `phone_number`, `place_of_birth`, `date_of_birth`, `role`, `created_at`, `updated_at`) VALUES
('USER240216000000000000002', 'DPRT240216000000000000003', 'admin@gmail.com', '$2y$12$XydVfO7qyqKlPFyH1cQ0NON5r12U23BCcNJjJw1fAkoWiGUIqkCgK', 'IT', 'L', 'Padang', '08124565778', 'Padang', '2024-02-16', 'admin', '2024-02-16 02:31:18', '2024-02-16 06:49:51'),
('USER240216000000000000003', 'DPRT240216000000000000004', 'sales@gmail.com', '$2y$12$MoqemIzQieQpm2owGjVS0uiUFUhW/bKDce73tBz3fIqdG2mDTuSim', 'Sales', 'L', 'Padang', '087654543221', 'Padang', '2024-02-07', 'pegawai', '2024-02-16 02:36:43', '2024-02-16 06:41:29'),
('USER240216000000000000004', 'DPRT240216000000000000004', 'sales2@gmail.com', '$2y$12$p9shMQkwGRj4YMaDyeBpv.y/qU./Z5iVAWzqzn9WEpY.3eXaMRm0.', 'sales2', 'L', 'padang', '08726262615', 'padang', '2024-02-16', 'pegawai', '2024-02-16 06:50:43', '2024-02-16 06:50:43'),
('USER240219000000000000001', 'DPRT240216000000000000004', 'sales3@gmail.com', '$2y$12$kDhGWldKvhUxEznWD25ydOYiKg03X/I69WvZVnCHxabbFvGgc3c1K', 'sales 3', 'L', 'Padang', '08765445466', 'Padang', '2024-02-19', 'pegawai', '2024-02-19 05:48:51', '2024-02-19 05:48:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
