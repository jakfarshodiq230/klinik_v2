-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2021 pada 16.26
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik_jerni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `kd_petugas` int(11) NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `kd_kunjungan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`tgl_kunjungan`, `no_pasien`, `kd_petugas`, `jam_kunjungan`, `kd_kunjungan`) VALUES
('2021-02-06', 19, 18, '16:58:24', 19),
('2021-02-06', 26, 18, '17:02:19', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`, `nama`, `alamat`) VALUES
(9, 'maful', 'maful', 'Maful P Arnandi', 'Klapa, Punggelan, Banjarnegara.'),
(10, 'rasya', 'rasya', 'Rasya P Arnandi', 'Punggelan'),
(14, 'jakfar', '827ccb0eea8a706c4c34a16891f84e7b', 'Jakfar Shodiq', 'jalan tukiman'),
(15, 'Shodiq', '827ccb0eea8a706c4c34a16891f84e7b', 'Shodiq wow', 'Wkwkwkkw'),
(16, '1310011201892005', '827ccb0eea8a706c4c34a16891f84e7b', 'aaaaaaaaaaaaa', 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kd_obat` int(11) NOT NULL,
  `nm_obat` varchar(300) NOT NULL,
  `jml_obat` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `jml_obat`, `ukuran`, `harga`) VALUES
(1, 'Paracetamol', 22, 10, 10000),
(4, 'Jamu kamu', 20, 2, 200000),
(5, 'Komik', 200, 1, 1000),
(7, 'Jakfar Shodiq', 0, 13, 1222),
(8, 'ompong', 11, 13, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_pasien` int(11) NOT NULL,
  `nm_pasien` varchar(300) NOT NULL,
  `j_kel` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `usia` int(3) NOT NULL,
  `no_tlp` int(14) NOT NULL,
  `nm_kk` varchar(300) NOT NULL,
  `hub_kel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nm_pasien`, `j_kel`, `agama`, `alamat`, `tgl_lhr`, `usia`, `no_tlp`, `nm_kk`, `hub_kel`) VALUES
(16, 'Meni Riatri', 'Wanita', 'Islam', 'Punggelan', '1996-01-06', 18, 123123, 'Sugiarso Sudir', 'Anak Kandung'),
(18, 'Anggit Pratitis', 'Pria', 'Islam', 'Punggelan', '1996-01-06', 18, 123123, 'Sugiarso Sudir', 'Anak Kandung'),
(19, 'Dea Melinda Utami', 'Wanita', 'Islam', 'Punggelan', '2013-01-06', 1, 123123, 'David', 'Anak Kandung'),
(20, 'David', 'Pria', 'Islam', 'Jalan Tukiman Desa Mengkirau', '1986-01-06', 24, 123123, 'Prayit', 'Anak Kandung'),
(26, 'Jerni', 'Wanita', 'Islam', 'Rohil', '1999-09-20', 21, 6799999, 'Waruwu', 'Anak Kandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `kd_petugas` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `nm_petugas` varchar(300) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `sip` enum('pagi','siang','malam','') NOT NULL,
  `tmpat_lhr` varchar(300) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `kd_user`, `nm_petugas`, `pekerjaan`, `sip`, `tmpat_lhr`, `no_tlp`, `alamat`) VALUES
(18, 9, 'jakfar shodiq', 'dokter', 'pagi', 'aqqqqqqqqqq', '12', 'ssaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(10) NOT NULL,
  `sejarah` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `sejarah`, `visi`, `misi`) VALUES
(1, 'Target merupakan objek yang akan di tulis perjalanan hidupnya dengan berdasarkan pada kantren maupun tidak, terkenal maupun tidak, sesuai permintaan maupun tidak, atau sesuai dengan keinginan pribadi atau tidak. Paling penting anda harus memiliki dasar ku', 'Tulisan sesuai dengan tiga hal di atas (data, fakta, serta informasi) supaya anda tidak asal menulis saja. Tetapi ada referensi yang jelas dalam penulis riwayat hidup target tersebut. Bahkan data yang bisa di gunakan dapat di cari melalui media sosial, te', 'Judul yang anda tulis adalah yang mewakili isi biografi anda <br>\r\n1. pada contoh di atas jelas bahwa contohnya ayah sang pekerja keras <br>\r\n2. Setelah menjalankan semua langkah di atas <br>\r\n3. anda bisa mulai menulis dengan senang hati dan setelah sele');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_rm` int(11) NOT NULL,
  `kd_tindakan` int(11) NOT NULL,
  `kd_obat` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `diagnosa` varchar(300) NOT NULL,
  `resep` varchar(300) NOT NULL,
  `keluhan` varchar(300) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rm`, `kd_tindakan`, `kd_obat`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_pemeriksaan`, `ket`) VALUES
(22, 7, 4, 14, 19, 'stadium', 'aaaavvvvvvv', 'llllllllllllllllllllllll', '0000-00-00', 'kkkkkkkkkkkkkkk'),
(23, 8, 5, 14, 19, 'stadium', 'bbbbbbbbbb', 'bbbbbbbbbbb', '2021-02-19', 'bbbbbbbbbbbbbbbbbbb'),
(24, 5, 8, 9, 18, 'gejala', 'aaaaaaaaaa', 'aaaaaaaaaaa', '2021-02-20', 'aaaaaaaaaaaaa'),
(25, 8, 8, 14, 20, 'gejala', 'vvvvvvvvv', 'vvvvvvvvvv', '2021-02-20', 'vvvvvvvvvv'),
(26, 5, 8, 9, 18, 'gejala', 'vvvvvvvvv', 'vvvvvvv', '2021-02-20', 'vvvvvvvv'),
(27, 10, 7, 9, 18, 'gejala', 'cccccccccc', 'cccccccccccc', '2021-02-20', 'cccccccc'),
(28, 8, 8, 9, 18, 'gejala', 'zzzzzzzzzzzz', 'cccccccc', '2021-02-20', 'zzzzzzzzzzzzz'),
(29, 7, 8, 15, 19, 'gejala', 'aaaaaaaaaaaa', 'aaaaaaaaaaa', '2021-02-20', 'aaaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `kd_tindakan` int(11) NOT NULL,
  `nm_tindakan` varchar(300) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nm_tindakan`, `ket`) VALUES
(5, 'Rawat Inap', 'Di Rawat di Rumah Sakit'),
(7, 'Rawat Inap', 'UPT Puskesmas 1'),
(8, 'Rawat Jalan', 'Rawat Jalan dengan minum obat teratur'),
(10, 'Rawat', 'Rawat Oprasi'),
(11, 'Rawat inap', 'Rs.Regita ujung tanjung'),
(12, 'rawat wkwk', 'di rumah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`kd_kunjungan`),
  ADD KEY `kd_poli` (`kd_petugas`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kd_petugas`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_rm`),
  ADD KEY `kd_tindakan` (`kd_tindakan`),
  ADD KEY `kd_obat` (`kd_obat`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `no_pasien` (`no_pasien`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`kd_tindakan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `kd_kunjungan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `kd_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `no_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `kd_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `no_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `kd_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `fk_sm` FOREIGN KEY (`kd_petugas`) REFERENCES `petugas` (`kd_petugas`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`kd_user`) REFERENCES `login` (`kd_user`);

--
-- Ketidakleluasaan untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`kd_tindakan`) REFERENCES `tindakan` (`kd_tindakan`),
  ADD CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`kd_obat`) REFERENCES `obat` (`kd_obat`),
  ADD CONSTRAINT `rekam_medis_ibfk_3` FOREIGN KEY (`kd_user`) REFERENCES `login` (`kd_user`),
  ADD CONSTRAINT `rekam_medis_ibfk_4` FOREIGN KEY (`no_pasien`) REFERENCES `pasien` (`no_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
