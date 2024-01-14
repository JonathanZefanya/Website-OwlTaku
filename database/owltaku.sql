-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2024 pada 12.58
-- Versi server: 8.2.0
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `owltaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nim`, `nama`, `prodi`, `no_telp`, `alamat`, `username`, `password`) VALUES
('1151800035', 'Yukis Milalino Putra', 'Teknik Informatika', '0812-1336-5931', 'Perum Dekat ITI', 'Timester', 'Timester'),
('1152200022', 'Danardi Listyono', 'Teknik Informatika', '0851-5944-1960', 'Ciseeng', 'Ra', 'RaDragon'),
('1152200024', 'Jonathan Natannael Zefanya', 'Teknik Informatika', '083807914090', 'Tangerang Selatan', 'xead', 'xead0016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `thn_jabat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `prodi`, `no_telp`, `alamat`, `jabatan`, `thn_jabat`) VALUES
('1151800017', 'Yukis Milalino Putra', 'Teknik Informatika', '086152421625', 'Pamulang', 'Wakil Ketua', '2019'),
('1152200052', 'Axel Pratama Putra', 'Teknik Informatika', '082110860615', 'Pamulang', 'Ketua Owltaku', '2020'),
('1211900019', 'Deriantaka', 'Teknik Industri', '085612452321', 'Pamulang', 'All Role', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reqruitment`
--

CREATE TABLE `reqruitment` (
  `nim` int NOT NULL,
  `nama` varchar(60) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `sertifikat_organisasi` text,
  `pengalaman_organisasi` text,
  `motivasi` text NOT NULL,
  `nilai` float NOT NULL,
  `nilai_akhir` float NOT NULL,
  `status` enum('Tidak Lolos','Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_event`
--

CREATE TABLE `tb_event` (
  `kode_event` int NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tema_event` varchar(100) NOT NULL,
  `pemateri` varchar(100) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `link_daftar` text NOT NULL,
  `status` enum('belum','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `reqruitment`
--
ALTER TABLE `reqruitment`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`kode_event`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `kode_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202212009;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
