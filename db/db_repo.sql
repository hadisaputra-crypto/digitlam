-- phpMyAdmin SQL Dump
-- version 5.2.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Bulan Mei 2026 pada 04.19
-- Versi server: 11.4.7-MariaDB-0ubuntu0.25.04.1
-- Versi PHP: 8.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_repo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `meta`, `created_at`, `updated_at`) VALUES
(1, 1, 'download_journal', '{\"journal_id\":2,\"journal_title\":\"Analisis Pengaruh Metode Pembelajaran Online terhadap Hasil Belajar\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/144.0.0.0 Safari\\/537.36\"}', '2026-01-22 11:41:49', '2026-01-22 11:41:49'),
(2, 1, 'view_journal', '{\"journal_id\":4,\"journal_title\":\"Aplikasi IoT dalam Monitoring Kesehatan Pasien\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/144.0.0.0 Safari\\/537.36\"}', '2026-01-22 13:52:05', '2026-01-22 13:52:05'),
(3, NULL, 'view_journal', '{\"journal_id\":1,\"journal_title\":\"Implementasi Machine Learning dalam Sistem Rekomendasi\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/144.0.0.0 Safari\\/537.36\"}', '2026-01-22 14:09:45', '2026-01-22 14:09:45'),
(4, NULL, 'view_journal', '{\"journal_id\":2,\"journal_title\":\"Analisis Pengaruh Metode Pembelajaran Online terhadap Hasil Belajar\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:150.0) Gecko\\/20100101 Firefox\\/150.0\"}', '2026-04-23 18:39:22', '2026-04-23 18:39:22'),
(5, NULL, 'view_journal', '{\"journal_id\":1,\"journal_title\":\"Implementasi Machine Learning dalam Sistem Rekomendasi\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:150.0) Gecko\\/20100101 Firefox\\/150.0\"}', '2026-04-23 18:42:07', '2026-04-23 18:42:07'),
(6, NULL, 'view_journal', '{\"journal_id\":2,\"journal_title\":\"Analisis Pengaruh Metode Pembelajaran Online terhadap Hasil Belajar\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Ubuntu; Linux x86_64; rv:150.0) Gecko\\/20100101 Firefox\\/150.0\"}', '2026-04-23 18:42:20', '2026-04-23 18:42:20'),
(7, NULL, 'view_journal', '{\"journal_id\":1,\"journal_title\":\"Implementasi Machine Learning dalam Sistem Rekomendasi\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-23 18:44:09', '2026-04-23 18:44:09'),
(8, 1, 'view_journal', '{\"journal_id\":1,\"journal_title\":\"Implementasi Machine Learning dalam Sistem Rekomendasi\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 18:49:17', '2026-04-26 18:49:17'),
(9, 1, 'download_journal', '{\"journal_id\":1,\"journal_title\":\"Implementasi Machine Learning dalam Sistem Rekomendasi\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 18:49:28', '2026-04-26 18:49:28'),
(10, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:33:02', '2026-04-26 20:33:02'),
(11, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:33:05', '2026-04-26 20:33:05'),
(12, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:36:54', '2026-04-26 20:36:54'),
(13, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:37:09', '2026-04-26 20:37:09'),
(14, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:37:15', '2026-04-26 20:37:15'),
(15, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:48:22', '2026-04-26 20:48:22'),
(16, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 20:54:21', '2026-04-26 20:54:21'),
(17, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:00:30', '2026-04-26 21:00:30'),
(18, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:21:01', '2026-04-26 21:21:01'),
(19, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:21:04', '2026-04-26 21:21:04'),
(20, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:26:47', '2026-04-26 21:26:47'),
(21, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:57:21', '2026-04-26 21:57:21'),
(22, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 21:57:26', '2026-04-26 21:57:26'),
(23, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-04-26 22:01:30', '2026-04-26 22:01:30'),
(24, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:28:24', '2026-05-04 19:28:24'),
(25, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:29:24', '2026-05-04 19:29:24'),
(26, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:29:33', '2026-05-04 19:29:33'),
(27, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:29:46', '2026-05-04 19:29:46'),
(28, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:30:05', '2026-05-04 19:30:05'),
(29, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:32:10', '2026-05-04 19:32:10'),
(30, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:42:30', '2026-05-04 19:42:30'),
(31, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 19:52:23', '2026-05-04 19:52:23'),
(32, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:03:18', '2026-05-04 20:03:18'),
(33, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:03:39', '2026-05-04 20:03:39'),
(34, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:07:23', '2026-05-04 20:07:23'),
(35, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:07:31', '2026-05-04 20:07:31'),
(36, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:09:45', '2026-05-04 20:09:45'),
(37, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:14:14', '2026-05-04 20:14:14'),
(38, NULL, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:14:26', '2026-05-04 20:14:26'),
(39, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:15:31', '2026-05-04 20:15:31'),
(40, NULL, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:15:43', '2026-05-04 20:15:43'),
(41, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:17:19', '2026-05-04 20:17:19'),
(42, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:18:20', '2026-05-04 20:18:20'),
(43, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:27:06', '2026-05-04 20:27:06'),
(44, NULL, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:27:22', '2026-05-04 20:27:22'),
(45, 1, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:28:00', '2026-05-04 20:28:00'),
(46, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:28:14', '2026-05-04 20:28:14'),
(47, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:29:49', '2026-05-04 20:29:49'),
(48, 1, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:33:03', '2026-05-04 20:33:03'),
(49, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:35:21', '2026-05-04 20:35:21'),
(50, NULL, 'download_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:35:25', '2026-05-04 20:35:25'),
(51, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:35:50', '2026-05-04 20:35:50'),
(52, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:36:01', '2026-05-04 20:36:01'),
(53, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:36:07', '2026-05-04 20:36:07'),
(54, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:36:24', '2026-05-04 20:36:24'),
(55, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:36:36', '2026-05-04 20:36:36'),
(56, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:37:02', '2026-05-04 20:37:02'),
(57, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:37:09', '2026-05-04 20:37:09'),
(58, 1, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:38:06', '2026-05-04 20:38:06'),
(59, 1, 'download_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:38:09', '2026-05-04 20:38:09'),
(60, 1, 'download_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:38:27', '2026-05-04 20:38:27'),
(61, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:38:41', '2026-05-04 20:38:41'),
(62, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:38:58', '2026-05-04 20:38:58'),
(63, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:41:24', '2026-05-04 20:41:24'),
(64, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:41:56', '2026-05-04 20:41:56'),
(65, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:42:08', '2026-05-04 20:42:08'),
(66, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:43:05', '2026-05-04 20:43:05'),
(67, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:50:30', '2026-05-04 20:50:30'),
(68, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:50:54', '2026-05-04 20:50:54'),
(69, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:51:30', '2026-05-04 20:51:30'),
(70, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:54:49', '2026-05-04 20:54:49'),
(71, NULL, 'download_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:54:53', '2026-05-04 20:54:53'),
(72, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:55:50', '2026-05-04 20:55:50'),
(73, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:56:11', '2026-05-04 20:56:11'),
(74, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:56:27', '2026-05-04 20:56:27'),
(75, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 20:58:28', '2026-05-04 20:58:28'),
(76, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:02:24', '2026-05-04 21:02:24'),
(77, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:03:23', '2026-05-04 21:03:23'),
(78, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit\\/605.1.15 (KHTML, like Gecko) Version\\/16.0 Mobile\\/15E148 Safari\\/604.1\"}', '2026-05-04 21:03:28', '2026-05-04 21:03:28'),
(79, 1, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:03:42', '2026-05-04 21:03:42'),
(80, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:04:28', '2026-05-04 21:04:28'),
(81, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:09:33', '2026-05-04 21:09:33'),
(82, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:12:37', '2026-05-04 21:12:37'),
(83, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:13:36', '2026-05-04 21:13:36'),
(84, NULL, 'view_journal', '{\"journal_id\":7,\"journal_title\":\"Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:14:06', '2026-05-04 21:14:06'),
(85, NULL, 'view_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:14:12', '2026-05-04 21:14:12'),
(86, NULL, 'download_journal', '{\"journal_id\":6,\"journal_title\":\"Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya\",\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (X11; Linux x86_64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/147.0.0.0 Safari\\/537.36\"}', '2026-05-04 21:14:28', '2026-05-04 21:14:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Naskah Adat', 'naskah-adat', 'Naskah Adat', '2026-04-26 18:48:30', '2026-04-26 18:48:30'),
(7, 'Buku Adat & Budaya', 'buku-adat-budaya', 'Buku Adat & Budaya', '2026-04-26 19:48:28', '2026-04-26 19:48:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `authors` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `document_url` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('draft','published','rejected') NOT NULL DEFAULT 'draft',
  `visibility` enum('public','private') NOT NULL DEFAULT 'public',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `journals`
--

INSERT INTO `journals` (`id`, `title`, `slug`, `abstract`, `authors`, `year`, `category_id`, `keywords`, `document_url`, `file_path`, `file_size`, `uploaded_by`, `status`, `visibility`, `published_at`, `created_at`, `updated_at`) VALUES
(6, 'Menelusuri Jejak Kerajaan Melayu Jambi dan Perkembangannya', 'menelusuri-jejak-kerajaan-melayu-jambi-dan-perkembangannya', 'Buku ini mengkaji jejak sejarah dan perkembangan peradaban Melayu di Jambi sebagai salah satu pusat peradaban penting di Nusantara. Berangkat dari pandangan bahwa Jambi memiliki warisan sejarah yang kuat sejak masa kerajaan Melayu Sriwijaya, penulis berupaya mengungkap kembali peran strategis Jambi sebagai pusat pendidikan, budaya, dan peradaban yang telah lama terlupakan. Melalui pendekatan historis dan analisis terhadap berbagai sumber serta temuan ilmiah, buku ini menyoroti pentingnya revitalisasi nilai-nilai sejarah Melayu sebagai identitas dan kebanggaan daerah maupun bangsa. Selain itu, buku ini juga membuka ruang bagi penelitian lanjutan dengan menekankan bahwa kajian sejarah Melayu Jambi masih memiliki potensi besar untuk dikembangkan lebih mendalam dari berbagai perspektif. Dengan demikian, karya ini diharapkan dapat menjadi kontribusi penting dalam memperkaya khazanah sejarah dan memperkuat posisi Jambi dalam peta peradaban Indonesia.', 'Prof. H. Aulia Tasman, Ph.D', '2026', 7, 'Sejarah, Budaya, Melayu', 'https://drive.google.com/file/d/1-nWeYzQWIc9JAiax-gKWVXcVo6ktyQUM/view?usp=drive_link', 'journals/n8alOQELrvYhoPBwb1ThNOcC2OZp2TGYRWiJcXpq.pdf', 1529769, 1, 'published', 'public', '2026-05-04 17:00:00', '2026-04-26 20:30:13', '2026-05-04 20:09:40'),
(7, 'Kamus Melayu Jambi dialek SAD-indonesia kbpj 2021', 'kamus-melayu-jambi-dialek-sad-indonesia-kbpj-2021', 'Kamus Melayu Jambi Dialek Suku Anak Dalam–Indonesia merupakan upaya kodifikasi dan pelestarian bahasa daerah yang digunakan oleh komunitas Suku Anak Dalam (SAD) di Provinsi Jambi. Kamus ini disusun sebagai pengembangan dari karya sebelumnya dengan penambahan lema baru, perbaikan definisi, serta validasi data berdasarkan hasil penelitian lapangan. Pengumpulan data dilakukan secara langsung melalui interaksi dengan komunitas SAD di beberapa wilayah, kemudian dianalisis, disusun secara alfabetis, dan divalidasi oleh tim ahli bahasa.\r\nKamus ini bersifat dwibahasa, dengan bahasa Melayu Jambi dialek SAD sebagai bahasa sumber dan bahasa Indonesia sebagai bahasa sasaran. Isi kamus mencakup kosakata umum, istilah budaya, serta konsep-konsep khas yang mencerminkan kehidupan masyarakat SAD yang erat dengan alam dan tradisi. Selain sebagai referensi linguistik, kamus ini juga berfungsi sebagai media dokumentasi budaya untuk mencegah kepunahan bahasa daerah akibat berkurangnya jumlah penutur dan pengaruh modernisasi.\r\nDengan adanya kamus ini, diharapkan dapat mendukung pelestarian bahasa Melayu Jambi dialek SAD, memperkaya khazanah bahasa Indonesia, serta menjadi sumber rujukan bagi penelitian linguistik, budaya, dan pendidikan di masa mendatang.', 'Sukardi gao', '2026', 7, 'budaya melayu', 'https://drive.google.com/file/d/1KqnBrAbyhd68JRhWOCspV4MO_j11-GyP/view?usp=sharing', NULL, NULL, 1, 'published', 'private', '2026-05-04 17:00:00', '2026-05-04 20:32:50', '2026-05-04 21:04:23');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_25_143245_add_role_to_users_table', 1),
(6, '2025_10_25_143253_create_categories_table', 1),
(7, '2025_10_25_143317_create_journals_table', 1),
(8, '2025_10_25_143325_create_activity_logs_table', 1),
(9, '2026_01_22_210150_add_visibility_to_journals_table', 2),
(10, '2026_04_27_044039_add_document_url_to_journals_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','dosen_mahasiswa','guest') NOT NULL DEFAULT 'guest',
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `is_active`) VALUES
(1, 'Admin', 'adminrepo@gmail.com', NULL, '$2y$12$G8Xj3lEJ06ee/85nZtWX3u32KbfYgvP43xief1Tk0wSDJSzbHmT32', '3QaF4jb65vGnPFeS4oFNtkAW4ZpKRxLuO5MPcs7KMFfzucIT6e8hyXC4UZFN', '2025-12-12 03:04:44', '2025-12-12 03:04:44', 'admin', 1),
(2, 'Dr. Ahmad Wijaya', 'ahmad@example.com', NULL, '$2y$12$w3K.1cKj64FPinUJp0vRlum3gF/CW1r05PwzxVyHHOZeIAA8XKULa', NULL, '2025-12-12 03:04:44', '2025-12-12 03:04:44', 'dosen_mahasiswa', 1),
(3, 'Siti Nurhaliza', 'siti@example.com', NULL, '$2y$12$Sv.gIjBC.nZ7WHgOcHUeVuugGRhzpt//aNX9qE4b77xF2oQrjSdyy', NULL, '2025-12-12 03:04:44', '2025-12-12 03:04:44', 'dosen_mahasiswa', 1),
(4, 'Budi Santoso', 'budi@example.com', NULL, '$2y$12$T/kVdLuwPxYoENT5UpSBKuTlrtI2zdxDHMQBDb8BbYSir.tN12bu2', NULL, '2025-12-12 03:04:44', '2025-12-12 03:04:44', 'dosen_mahasiswa', 1),
(5, 'Guest User', 'guest@example.com', NULL, '$2y$12$mFj7aOFfF2/ajxzN4ZAKxOFgGjnEEllrM6nxBTMwxEKDEuBdsQyli', NULL, '2025-12-12 03:04:45', '2025-12-12 03:04:45', 'guest', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `journals_slug_unique` (`slug`),
  ADD KEY `journals_category_id_foreign` (`category_id`),
  ADD KEY `journals_uploaded_by_foreign` (`uploaded_by`);
ALTER TABLE `journals` ADD FULLTEXT KEY `journals_title_abstract_authors_keywords_fulltext` (`title`,`abstract`,`authors`,`keywords`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `journals_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
