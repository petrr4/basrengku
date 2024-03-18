-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 07.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basreng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `phone_number`, `email`, `profile_picture`) VALUES
(30, 'bane', '$2y$10$ZhOiSzXaL1F7RDJGTs3BB.8GrRLq1P4wo9.1e1JJoWZKZtGNiHGBS', '0987', 'anji@ng', 'profile_pictures/rolan_1.jpg'),
(31, 'admin', '$2y$10$91RN0tcZIWcf4.N0V4EM..Kvbb35j0zXgXCY9XP4JDK76cfvWXv.O', '0876', 'admin@7', 'profile_pictures/rolan.jpg'),
(32, 'jonathanmanik_', '$2y$10$N47JOYcyAKLfLAyJHl2xG.w622oO5RlQ2jkamjhxoieR5e0r9xg.S', '081268510037', 'jonathanmanikraja@gmail.com', 'profile_pictures/723625_3.jpg'),
(33, 'ran', '$2y$10$g2P9zTftqW32TCcvwPXA6ezvtIa3DgYfxgOME3ZocXX5xH2pFj4jW', '8998', 'ran@gmail.com', 'profile_pictures/carlos.png'),
(34, 'paskal', '$2y$10$Txemg2LFDQOra09gP9xsYeBVAtixFYsj126HqxOrH9.VVC7ZG7CKO', '01303', 'paskal12@gmail.com', 'profile_pictures/crosby.jpg'),
(36, 'pieng', '$2y$10$YypC5k1Dsn9JbGz9zLpfze0vVhHzjLpe/G4SA4Z2iC3OocCwSaBEy', '0811', 'aku@gmail.com', 'profile_pictures/721996.jpg'),
(42, 'piero', '$2y$10$biqRcXIKik2WbtCMi3wH4.UF5sY/RQmcsCwKO2SPyMrMV47Y8Icde', '082121', 'piero@gmail.com', 'profile_pictures/723625_2.jpg'),
(43, 'carloss', '$2y$10$Sqa5heWPq/78arnPGLbfPuIGJaloidLSzKf/qNz5lD2Vr6yznZWDq', '007', 'antooasepp@gmail.com', 'profile_pictures/carlos_1.png'),
(44, 'Petra', '$2y$10$B5OoptiE0UExqoUcjhtQvOgHQMMQhPiQ/giTuZWi.kIYl7iaj8/iK', '08123', 'petraik111@gmail.com', 'profile_pictures/carlos_2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `kode_pesanan` varchar(15) NOT NULL,
  `tanggal_order` datetime DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `nama_order` varchar(255) DEFAULT NULL,
  `alamat_produk` varchar(255) DEFAULT NULL,
  `nomorhp_order` varchar(255) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL,
  `jumlah_produk` int(99) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `id_produk`, `kode_pesanan`, `tanggal_order`, `nama_produk`, `nama_order`, `alamat_produk`, `nomorhp_order`, `total_harga`, `status_order`, `jumlah_produk`, `email`, `status_pengiriman`) VALUES
(114, 2, 'X25RFRGKY4M1LXY', '2023-12-23 04:05:08', 'Makaroni', 'Jonathan', 'Penginapan cahaya, Jln. Putri Lopian', '081268510037', 50000, 'Dikonfirmasi', 2, 'jonathanmanikraja@gmail.com', 'Selesai'),
(115, 3, 'X25RFRGKY4M1LXY', '2023-12-23 04:05:08', 'Keripik ', 'Jonathan', 'Penginapan cahaya, Jln. Putri Lopian', '081268510037', 20000, 'Dikonfirmasi', 1, 'jonathanmanikraja@gmail.com', 'Selesai'),
(116, 3, '97KZAR2OE2FCPX2', '2023-12-23 04:05:39', 'Keripik ', 'Pieng', 'Penginapan cahaya, Jln. Putri Lopian', '081268510037', 20000, 'Dikonfirmasi', 1, 'jonathanmanikraja@gmail.com', 'Selesai'),
(117, 1, '97KZAR2OE2FCPX2', '2023-12-23 04:05:39', 'Basreng', 'Pieng', 'Penginapan cahaya, Jln. Putri Lopian', '081268510037', 15000, 'Dikonfirmasi', 1, 'jonathanmanikraja@gmail.com', 'Selesai'),
(118, 2, 'MWW097UMIUOSJPO', '2023-12-23 04:14:43', 'Makaroni', 'Jonathan', 'Penginapan cahaya, Jln. Putri Lopian', '081268510037', 25000, 'Dikonfirmasi', 1, 'jonathanmanikraja@gmail.com', 'Sedang Diproses'),
(119, 2, 'RJESPQLZ0S283XP', '2023-12-23 10:57:54', 'Makaroni', 'Petra', 'mawar 1', '0812', 25000, 'Dikonfirmasi', 1, 'ran@gmail.com', 'Selesai'),
(120, 1, 'RJESPQLZ0S283XP', '2023-12-23 10:57:54', 'Basreng', 'Petra', 'mawar 1', '0812', 15000, 'Dikonfirmasi', 1, 'ran@gmail.com', 'Selesai'),
(121, 3, 'XE82XCOFI1CMV19', '2023-12-23 11:18:37', 'Keripik ', 'Petra', 'simpang selayang', '1221', 20000, 'Menunggu Pembayaran', 1, 'ran@gmail.com', 'Sedang Diproses'),
(122, 3, 'TIVEIZXFLP5ZN9T', '2023-12-23 11:19:52', 'Keripik ', 'Petra', 'simalingkar', '3241', 20000, 'Menunggu Pembayaran', 1, 'ran@gmail.com', ''),
(123, 2, 'TIVEIZXFLP5ZN9T', '2023-12-23 11:19:52', 'Makaroni', 'Petra', 'simalingkar', '3241', 25000, 'Menunggu Pembayaran', 1, 'ran@gmail.com', ''),
(124, 4, 'JH14KFSSXSZIY63', '2023-12-23 13:08:20', 'Usus Kering', 'Petra', 'simpang selayang', '9898', 25000, 'Dikonfirmasi', 1, 'ran@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Basreng', 15000, 200, 'basreng.jpg', 'Basreng dengan banyak varian rasa'),
(2, 'Makaroni', 25000, 300, 'makaroni.jpg', 'Makaroni dengan banyak varian rasa'),
(3, 'Keripik ', 20000, 200, 'keripik.jpg', 'Keripik super pedas!!!'),
(4, 'Usus Kering', 25000, 300, 'usus.jpg', 'Usus Ayam Krispy!!!'),
(9, 'Nasi Goreng', 18000, 200, 'nasi goreng.jpg', 'Nasi goreng pasti enak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `pesan` varchar(30) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `username`, `email`, `phone_number`, `rate`, `pesan`, `foto`) VALUES
(1, 'Budi', 'cmdc@s', '811', '5', 'Enak kali bang', 0x6c616b692e6a7067),
(2, 'Santi', '2spdk@a', '823', '5', 'Mantap', 0x636577656b2e6a7067),
(31, 'jonathanmanik_', 'jonathanmanikraja@gmail.com', '081268510037', '5', 'gg gaming', ''),
(45, 'jonathanmanik_', 'jonathanmanikraja@gmail.com', '081268510037', '4', 'naise', ''),
(46, 'ran', 'ran@gmail.com', '8998', '5', 'enak betul masbro\r\n', ''),
(48, 'Petra', 'petraik111@gmail.com', '08123', '5', 'Enak x bang', ''),
(49, 'Petra', 'petraik111@gmail.com', '08123', '3', 'jpwjpwjswjpodwjopwwdedowpdjwop', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
