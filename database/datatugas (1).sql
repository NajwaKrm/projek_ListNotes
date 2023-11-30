-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 04.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran_kritik`
--

CREATE TABLE `saran_kritik` (
  `id` int(11) NOT NULL,
  `kritik_saran` text NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saran_kritik`
--

INSERT INTO `saran_kritik` (`id`, `kritik_saran`, `tanggal_input`) VALUES
(1, 'Hayy kaa kaa', '2023-10-09 02:41:12'),
(2, 'Assalamulaikum Wrb', '2023-10-09 02:43:38'),
(3, 'Cekk', '2023-10-09 02:49:21'),
(6, 'Haiii', '2023-10-09 04:13:12'),
(7, 'hayyy', '2023-10-09 07:10:38'),
(8, 'jhhvjhjvvjhvj', '2023-10-09 13:44:28'),
(10, 'hayh kak', '2023-10-10 01:19:43'),
(11, 'Hallo Kak / Develpoer yang ounya website ini mhon banget ', '2023-10-10 01:31:17'),
(12, 'Haii', '2023-10-10 23:58:38'),
(13, 'Hallo kAK', '2023-10-12 10:20:45'),
(14, 'HALLO KAK ', '2023-10-12 10:22:01'),
(15, 'iguguggiuiiuiuhi', '2023-10-12 09:39:48'),
(16, 'webnya sangat bagus', '2023-10-12 09:56:36'),
(17, '', '2023-11-04 09:34:24'),
(18, 'nnnmnmm,,m,kkjjmh', '2023-11-04 09:34:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `nama_tugas` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `nama_tugas`, `tanggal`, `waktu`) VALUES
(13, 'bmc', '2023-11-30', '23:34:00'),
(14, 'tugas merangkum mulok', '2023-11-30', '10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Abdirizal023', '$2y$10$dTyPWIIadZbyMNfQ3iWjg.kHcU5xX7LGBVzndpf.z0UDc1cDQ5IIi'),
(3, 'awa', '$2y$10$/7ZFtJ3wqJJXREm./hynJu3LTnCyJLWPpfi63ReG27yRGRPIct3LG'),
(4, 'aqa', '$2y$10$FWiZQMJfXl4DAJBmpiXwgeAJYMeOR7cRlKwHRPmibL02UWuDT85bS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saran_kritik`
--
ALTER TABLE `saran_kritik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saran_kritik`
--
ALTER TABLE `saran_kritik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
