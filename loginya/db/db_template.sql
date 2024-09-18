-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Sep 2024 pada 17.59
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
-- Database: `db_template`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'ferdiodwi', 'ferdiodwi12@gmail.com', '$2y$10$uRei.ltOe6K5kozKuLuXK.89qDxdx383ZkqLaj4w4erSUnu7mYeKy'),
(7, 'rio', 'rio@gmail.com', '$2y$10$qO9fZXXV.bTwyZqO8usW0.uF9K6SyXbw.g5ls0UZLokC.xPadEz9S'),
(8, 'dio', 'dio@gmail.com', '$2y$10$uy6tzWEJAva90tA70j8pk.779nyb8Nf1hKdyPEIXBnWe/zu3Z21yC'),
(12, 'fadel', 'fadel@gamail.com', '$2y$10$qrk5m/gT546lcdxILuI2DeyijlaFJXw5c6TgYKW67rCYkvxot/fnm'),
(13, 'alvyn', 'alvyn@gmail.com', '$2y$10$oTWEPTTm7wJPdmcGabLimOAKXst7Bs0IgDsrA55/vqosa8i2llsYy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
