-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2024 pada 04.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `nip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nama`, `alamat`, `telepon`, `agama`, `foto`, `nip`) VALUES
(4, 'Hilmi An Naufal', 'Jln Babakan Ciwaringin Cirebon', '08977575545', 'Islam', '633.WhatsApp Image 2024-02-19 at 20.57.52.jpeg', '697'),
(7, 'Messi Ahmad', 'Jln Pancuran Kulon Sumedang', '0851567871', 'Islam', '505.WhatsApp Image 2024-02-21 at 20.07.05.jpeg', '836'),
(8, 'Kirana Nur Lestari', 'Jln Babakan Ciwaringin Cirebon', '08563864395', 'Kristen', '364.WhatsApp Image 2024-03-02 at 11.27.27.jpeg', '860'),
(12, 'Hilmi An Naufal Ganteng', 'Jln Pesantren Babakan Ciwaringin Cirebon', '0895764834', 'Islam', '749.WhatsApp Image 2024-02-24 at 14.02.48 (1).jpeg', '869'),
(13, 'Ahmad Rama Fadhilah', 'Jln Ciasem Surga Dunia Timur', '08513372542', 'Islam', '297.IMG_1734-scaled.jpg', '701'),
(14, 'Andi Makaroni', 'Jln Kuningan Jawa Barat', '0894374637', 'Kristen', '', '656');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id` int(11) NOT NULL,
  `no_ujian` char(7) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `nilai_ujian` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_nilai_ujian`
--

INSERT INTO `tbl_nilai_ujian` (`id`, `no_ujian`, `pelajaran`, `nilai_ujian`, `jurusan`) VALUES
(19, 'UTS-001', 'Networking', 70, 'Teknik Informtika'),
(20, 'UTS-001', 'Hyper Text Markup Language', 50, 'Teknik Informtika'),
(21, 'UTS-001', 'CSS', 90, 'Teknik Informtika'),
(22, 'UTS-001', 'Java Script', 90, 'Teknik Informtika'),
(23, 'UTS-001', 'Object Oriented PHP', 75, 'Teknik Informtika'),
(24, 'UTS-001', 'Document Object Model (DOM)', 60, 'Teknik Informtika'),
(25, 'UTS-001', 'Asyncronous Function', 90, 'Teknik Informtika'),
(26, 'UTS-002', 'Networking', 50, 'Teknik Informtika'),
(27, 'UTS-002', 'Hyper Text Markup Language', 60, 'Teknik Informtika'),
(28, 'UTS-002', 'CSS', 90, 'Teknik Informtika'),
(29, 'UTS-002', 'Java Script', 90, 'Teknik Informtika'),
(30, 'UTS-002', 'Object Oriented PHP', 50, 'Teknik Informtika'),
(31, 'UTS-002', 'Document Object Model (DOM)', 80, 'Teknik Informtika'),
(32, 'UTS-002', 'Asyncronous Function', 70, 'Teknik Informtika'),
(33, 'UTS-002', 'Tajwid', 90, 'Pendidikan Islam'),
(34, 'UTS-002', 'Nahwu Shorof', 70, 'Pendidikan Islam'),
(35, 'UTS-002', 'Fiqih', 80, 'Pendidikan Islam'),
(36, 'UTS-002', 'Mantiq', 60, 'Pendidikan Islam'),
(37, 'UTS-002', 'Tauhid', 70, 'Pendidikan Islam'),
(38, 'UTS-002', 'Kitab Kuning', 70, 'Pendidikan Islam'),
(39, 'UTS-003', 'Networking', 80, 'Teknik Informtika'),
(40, 'UTS-003', 'Hyper Text Markup Language', 70, 'Teknik Informtika'),
(41, 'UTS-003', 'CSS', 80, 'Teknik Informtika'),
(42, 'UTS-003', 'Java Script', 90, 'Teknik Informtika'),
(43, 'UTS-003', 'Object Oriented PHP', 80, 'Teknik Informtika'),
(44, 'UTS-003', 'Document Object Model (DOM)', 90, 'Teknik Informtika'),
(45, 'UTS-003', 'Asyncronous Function', 40, 'Teknik Informtika'),
(46, 'UTS-003', 'Ilmu Pengetahuan Alam', 40, 'Sains Biologi'),
(47, 'UTS-003', 'Fisika', 30, 'Sains Biologi'),
(48, 'UTS-003', 'Matematika', 20, 'Sains Biologi'),
(49, 'UTS-003', 'Biologi', 50, 'Sains Biologi'),
(50, 'UTS-003', 'B. Indonesia', 50, 'Sains Biologi'),
(51, 'UTS-003', 'Kimia', 40, 'Sains Biologi'),
(52, 'UTS-004', 'Networking', 70, 'Teknik Informtika'),
(53, 'UTS-004', 'Hyper Text Markup Language', 50, 'Teknik Informtika'),
(54, 'UTS-004', 'CSS', 50, 'Teknik Informtika'),
(55, 'UTS-004', 'Java Script', 60, 'Teknik Informtika'),
(56, 'UTS-004', 'Object Oriented PHP', 70, 'Teknik Informtika'),
(57, 'UTS-004', 'Document Object Model (DOM)', 30, 'Teknik Informtika'),
(58, 'UTS-004', 'Asyncronous Function', 50, 'Teknik Informtika'),
(59, 'UTS-005', 'Networking', 60, 'Teknik Informtika'),
(60, 'UTS-005', 'Hyper Text Markup Language', 70, 'Teknik Informtika'),
(61, 'UTS-005', 'CSS', 80, 'Teknik Informtika'),
(62, 'UTS-005', 'Java Script', 40, 'Teknik Informtika'),
(63, 'UTS-005', 'Object Oriented PHP', 80, 'Teknik Informtika'),
(64, 'UTS-005', 'Document Object Model (DOM)', 90, 'Teknik Informtika'),
(65, 'UTS-005', 'Asyncronous Function', 85, 'Teknik Informtika'),
(66, 'UTS-006', 'Networking', 70, 'Teknik Informtika'),
(67, 'UTS-006', 'Hyper Text Markup Language', 90, 'Teknik Informtika'),
(68, 'UTS-006', 'CSS', 60, 'Teknik Informtika'),
(69, 'UTS-006', 'Java Script', 70, 'Teknik Informtika'),
(70, 'UTS-006', 'Object Oriented PHP', 90, 'Teknik Informtika'),
(71, 'UTS-006', 'Document Object Model (DOM)', 90, 'Teknik Informtika'),
(72, 'UTS-006', 'Asyncronous Function', 60, 'Teknik Informtika'),
(73, 'UTS-007', 'Networking', 80, 'Teknik Informtika'),
(74, 'UTS-007', 'Hyper Text Markup Language', 90, 'Teknik Informtika'),
(75, 'UTS-007', 'CSS', 60, 'Teknik Informtika'),
(76, 'UTS-007', 'Java Script', 70, 'Teknik Informtika'),
(77, 'UTS-007', 'Object Oriented PHP', 80, 'Teknik Informtika'),
(78, 'UTS-007', 'Document Object Model (DOM)', 90, 'Teknik Informtika'),
(79, 'UTS-007', 'Asyncronous Function', 70, 'Teknik Informtika'),
(80, 'UTS-007', 'Tajwid', 80, 'Pendidikan Islam'),
(81, 'UTS-007', 'Nahwu Shorof', 60, 'Pendidikan Islam'),
(82, 'UTS-007', 'Fiqih', 90, 'Pendidikan Islam'),
(83, 'UTS-007', 'Mantiq', 80, 'Pendidikan Islam'),
(84, 'UTS-007', 'Tauhid', 70, 'Pendidikan Islam'),
(85, 'UTS-007', 'Kitab Kuning', 50, 'Pendidikan Islam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `guru` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`id`, `pelajaran`, `jurusan`, `guru`) VALUES
(15, 'Networking', 'Teknik Informtika', 'Hilmi An Naufal'),
(16, 'Hyper Text Markup Language', 'Teknik Informtika', 'Messi Ahmad'),
(17, 'CSS', 'Teknik Informtika', 'Kirana Nur Lestari'),
(18, 'Java Script', 'Teknik Informtika', 'Hilmi An Naufal Ganteng'),
(19, 'Object Oriented PHP', 'Teknik Informtika', 'Ahmad Rama Fadhilah'),
(20, 'Document Object Model (DOM)', 'Teknik Informtika', 'Andi Makaroni'),
(21, 'Asyncronous Function', 'Teknik Informtika', 'Hilmi An Naufal'),
(22, 'Tajwid', 'Pendidikan Islam', 'Messi Ahmad'),
(23, 'Nahwu Shorof', 'Pendidikan Islam', 'Hilmi An Naufal'),
(24, 'Fiqih', 'Pendidikan Islam', 'Kirana Nur Lestari'),
(25, 'Mantiq', 'Pendidikan Islam', 'Ahmad Rama Fadhilah'),
(26, 'Tauhid', 'Pendidikan Islam', 'Andi Makaroni'),
(27, 'Kitab Kuning', 'Pendidikan Islam', 'Hilmi An Naufal'),
(28, 'Ilmu Pengetahuan Alam', 'Sains Biologi', 'Messi Ahmad'),
(29, 'Fisika', 'Sains Biologi', 'Ahmad Rama Fadhilah'),
(30, 'Matematika', 'Sains Biologi', 'Hilmi An Naufal Ganteng'),
(31, 'Biologi', 'Sains Biologi', 'Andi Makaroni'),
(32, 'B. Indonesia', 'Sains Biologi', 'Hilmi An Naufal'),
(33, 'Kimia', 'Sains Biologi', 'Hilmi An Naufal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama`, `alamat`, `akreditasi`, `status`, `email`, `visimisi`, `gambar`) VALUES
(2, 'Hilmi An Naufal Ganteng', 'Jln Pesantren No 01 Babakan Ciwaringin Cirebon', 'A', 'Negri', 'hilmiannaufal72@gmail.com', 'Semangat', '1.jpg'),
(3, 'Hilmi An Naufal Ganteng', 'Jln Pesantren No 01 Babakan Ciwaringin Cirebon', 'A', 'Negri', 'hilmiannaufal72@gmail.com', 'Semangat', '1.jpg'),
(9, 'Hilmi An Naufal Ganteng', 'Jln Pesantren No 01 Babakan Ciwaringin Cirebon', 'A', 'Negri', 'hilmiannaufal72@gmail.com', 'Semangat', '1.jpg'),
(10, 'Hilmi An Naufal Ganteng', 'Jln Pesantren No 01 Babakan Ciwaringin Cirebon', 'A', 'Negri', 'hilmiannaufal72@gmail.com', 'Semangat', '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` char(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `alamat`, `kelas`, `jurusan`, `foto`) VALUES
('NIS001', 'Hilmi An Naufal', 'Jln Babakan Ciwaringin Cirebon', 'XI', 'Teknik Informatika', '409.WhatsApp Image 2024-02-08 at 06.35.14.jpeg'),
('NIS002', 'Kirana Nur Lestari', 'Jln Babakan Ciwaringin Cirebon', 'XII', 'Pendidikan Islam', '462.Untitled design.jpg'),
('NIS003', 'Sehzade An Naufal', 'Jln Pesantren Ciwaringin Cirebon', 'XII', 'Sains Biologi', '405.Untitled design.jpg'),
('NIS004', 'Al Imron', 'Jln Kebon Jeruk Pasaleman Cirebon', 'X', 'Teknik Informatika', '495.graduated.png'),
('NIS005', 'Dzulfikar Muhammad', 'Jln Indah Raya Jakarta Selatan', 'XI', 'Teknik Informatika', '70.WhatsApp Image 2024-03-01 at 18.34.20.jpeg'),
('NIS006', 'Sehzade Kasep Tea', 'Jln Desa Babakan Ciwaringin Cirebon', 'XII', 'Sains Biologi', '959.WhatsApp Image 2024-03-07 at 08.11.04.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `no_ujian` char(7) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `nis` char(6) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_terendah` int(11) NOT NULL,
  `nilai_tertinggi` int(11) NOT NULL,
  `nilai_rata2` int(11) NOT NULL,
  `hasil_ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`no_ujian`, `tgl_ujian`, `nis`, `jurusan`, `total_nilai`, `nilai_terendah`, `nilai_tertinggi`, `nilai_rata2`, `hasil_ujian`) VALUES
('UTS-001', '2024-03-10', 'NIS001', 'Teknik Informatika', 525, 50, 90, 75, 'Lulus'),
('UTS-002', '2024-03-11', 'NIS002', 'Pendidikan Islam', 930, 50, 90, 72, 'Lulus'),
('UTS-003', '2024-03-11', 'NIS003', 'Sains Biologi', 760, 20, 90, 58, 'Gagal'),
('UTS-004', '2024-03-11', 'NIS004', 'Teknik Informatika', 380, 30, 70, 54, 'Gagal'),
('UTS-005', '2024-03-12', 'NIS005', 'Teknik Informatika', 505, 40, 90, 72, 'Gagal'),
('UTS-006', '2024-03-11', 'NIS006', 'Teknik Informatika', 530, 60, 90, 76, 'Lulus'),
('UTS-007', '2024-03-12', 'NIS005', 'Pendidikan Islam', 970, 50, 90, 75, 'Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(1, 'admin', '$2y$10$eLxfu2p/fk7qKJ1SLtl4Ous6FeRr7sU/YZJRcFJYXyvqgvq3WKPMG', 'Sehzade An Naufal', 'hgybbuh', 'Kepsek', 'WhatsApp Image 2024-02-21 at 20.07.05.jpeg'),
(2, 'naufal', '$2y$10$HlNSB6.GQZgqdCcwV2Suv.VsT8FtPIt1StPuhOpOf9mNvPm2XyI3u', 'Hilmi An Naufal', 'babakan', 'Kepsek', 'user.png'),
(3, 'dsds', '$2y$10$avo.dZrcw5gJX51gbj0IVuc4UK9olhhY561NIhBkcW2uukIUlEroi', 'Al Imron', 'sassd', 'Kepsek', 'Jidan_Menjaga Nilai Tradisi Pesantren dengan Melestarikan Budaya Bahtsu.docx'),
(4, 'administrator', '$2y$10$75crwGnXjnWY03ibbw4WCu3yRwBCYKgNIb0.lpOg0pS8BPM/YDuka', 'Hilmi An Naufal', 'Babakan', 'Kepsek', 'bdbf.PNG'),
(5, 'hilmi', '$2y$10$Sm.sjppZXNv8LWDieqHt6uk9bAUN5oTvKSk2yWeJRwnsWTFrse2x2', 'Moh Nurul Hilmi Anna', 'Jln Pesantren No 1 Babakan Ciwaringin Cirebon', 'Guru', 'graduated.png'),
(6, 'andi', '$2y$10$1e8k8UlFyfwpwtPdj7y71.jSPI902C4kjuMxA9EyvWRE5vX7tqY4m', 'Andi Makaroni', 'BABAKAN', 'Kepsek', 'WhatsApp Image 2024-03-02 at 11.27.27.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`no_ujian`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
