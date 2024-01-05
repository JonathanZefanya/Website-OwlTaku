-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2024 pada 09.19
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
('12190604721', 'Khalid Fadilah', 'Sistem Informasi', '085612452321', 'Samarinda', 'Sekretaris', '2020'),
('20200803069', 'Adriel', 'Sistem Informasi', '086152421625', 'Padang', 'Divisi Intelent', '2020'),
('20200803125', 'Agung Dwi Sahputra', 'Sistem Informasi', '082110860615', 'Perum Bumi Cikampek Baru cc2 No.13 Rt.08 Rw.07 Desa Balonggandu, Kec. Jatisari, Kab. Karawang', 'Divisi PSDM', '2022');

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

--
-- Dumping data untuk tabel `reqruitment`
--

INSERT INTO `reqruitment` (`nim`, `nama`, `prodi`, `no_telp`, `alamat`, `hobi`, `sertifikat_organisasi`, `pengalaman_organisasi`, `motivasi`, `nilai`, `nilai_akhir`, `status`) VALUES
(1152200010, 'Matthew TirtaWidjaja', 'Teknik Informatika', '083807914090', 'Gunung Sindur', 'Gaming', '_e75cacfa-7134-44fb-ab73-64f9d879b560.jpeg', '_2561b791-ec73-4f37-bd7f-718547fa6278.jpeg', 'Saya suka jepang\r\n', 10, 3, 'Tidak Lolos');

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
-- Dumping data untuk tabel `tb_event`
--

INSERT INTO `tb_event` (`kode_event`, `nama_event`, `tema_event`, `pemateri`, `deskripsi`, `waktu`, `tanggal`, `tempat`, `link_daftar`, `status`) VALUES
(202212001, 'Webinar Implementasi ERP pada UMKM', 'IMPLEMENTASI ERP UNTUK PELAKU UMKM', 'Bpk. Yulhendri , ST, M.T|Dr. Ir. Agung Terminanto, MBA, IPM, CEL, CEA', 'Enterprise Resource Planning (ERP) adalah suatu sistem yang sering digunakan oleh\r\nperusahaan dan sangat dibutuhkan di segala sektor pada jaman modern ini. Dimana ERP dapat\r\nmemberikan efektifitas dan efisiensi bagi suatu perusahaan disegala bidang yang ada pada\r\nperusahaan itu. ERP dapat digunakan sebagai salah satu opsi dalam memecahkan suatu masalah\r\nuntuk sebuah perusahaan dengan bisnis yang memiliki kompleksitas yang rumit. Dengan\r\nmenggunakan sistem ERP, diharapkan agar suatu perusahaan dapat mengatur data dan informasi\r\ndengan skala yang banyak dan besar untuk nantinya dapat diolah dan diatur sesuai dengan\r\nkebutuhan perusahaan.\r\nSesuai dengan fakta-fakta yang ada, maka tidak diragukan lagi bahwa sistem ERP sendiri\r\nmenjadi suatu sistem yang sangat dibutuhkan oleh perusahaan-perusahaan untuk melakukan\r\nintegrasi akan segala bagian yang ada serta setiap proses kegiatan yang ada dalam perusahaan\r\ntersebut. Karena sudah banyak perusahaan besar yang memakai sistem ERP, maka dalam\r\nwebinar kali ini kita akan melakukan sebuah webinar yang bertujuan agar UMKM dapat\r\nmenggunakan sistem tersebut. Seperti kita ketahui bahwa masih banyak permasalahan yang\r\ndialami oleh UMKM yang berdiri dan beroperasi di Indonesia, maka dari itu saya ingin\r\nmelakukan perancangan sistem ERP pada UMKM-UMKM yang ada sehingga para mitra dapat\r\nmencapai target dengan efektif dan efisien, dengan bagaimana para mitra mendapatkan laporan\r\nyang akurat\r\nMaka dari itu, dengan dilakukannya webinar ini bertujuan untuk memudahkan mitra dalam\r\nmemperoleh laporan inventory, transaksi, juga laporan keuangan perusahaan dengan merancang\r\nsistem yang akan dibuat.', '09:00 s/d Selesai', '13 Juli 2022', 'Zoom Meeting', 'https://docs.google.com/forms/d/e/1FAIpQLSdMqEOa5Oc7C85isewakOoy95FtgeP44_vxU5BLCZr8AQxgHQ/viewform', 'belum'),
(202212006, 'Webinar Big Data', 'Big Data ', 'Salma Hanipah', 'Bebas', '08.00 s/d Selesai', '20 Agustus 2022', 'Monas', 'Link Gform', 'belum');

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
  MODIFY `kode_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202212007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
