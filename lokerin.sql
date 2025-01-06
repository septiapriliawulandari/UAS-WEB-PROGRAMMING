-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2025 pada 13.09
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lokerin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_posting` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `link_lamar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id`, `judul`, `deskripsi`, `tanggal_posting`, `gambar`, `link_lamar`) VALUES
(1, 'Teknisi Mesin', 'Perusahaan Surya Kencana sedang mencari Teknisi Mesin untuk bergabung dengan tim kami. Mari Bergabung pejuang loker :).', '2024-11-28', 'gambar1.jpg', 'lamar_teknisi.php'),
(2, 'Admin Sosial Media', 'Perusahaan Lokerin mencari Admin Medsos Wanita yang berpengalaman.', '2024-11-28', 'gambar2.jpg', 'lamar_admin.php'),
(3, 'Akuntansi', 'Kami mencari Akuntan yang berpengalaman dan Ahli di bidangnya.', '2024-11-28', 'gambar3.jpg', 'lamar_akuntansi.php'),
(7, 'Software Engineer', 'Perusahaan kami sedang membutuhkan seorang Software Engineer, jika anda memenuhi kriteria dan syarat yang kami perlukan, mari bergabung bersama perusahaan kami.', '2025-01-06', 'gambar4.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(3, 'Septi Aprilia Wulandari', 'septiapriliawulandari1@gmail.com', '$2y$10$pAlyozZzNPu6uLjmF4APJOSzo/k/ghDJ8vm/yKsQsRFqPVFFeyuVe', 'user'),
(5, 'wulandari', 'septiaaa@gmail.com', '$2y$10$Y9KELCZ6SspdMhOz2WOku.VA3WaJXdQqe4mMNSZqi3DGA6Uvk/DVS', 'user'),
(6, 'Septi Aprilia Wulandari', 'wulandrofficial@gmail.com', '$2y$10$9Ho8/Lt1/S8jycDhoM0HWulCnmM2mvPjhb98fY1m2idlo8o6GNkt.', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
