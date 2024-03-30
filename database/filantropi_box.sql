-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 03:50 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filantropi_box`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_canvaser`
--

CREATE TABLE `biodata_canvaser` (
  `id` int NOT NULL,
  `id_akun` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodata_canvaser`
--

INSERT INTO `biodata_canvaser` (`id`, `id_akun`, `nama`, `email`, `kontak`, `alamat`) VALUES
(2, 2, 'Said Muhammad Naufal', 'said@gmail.com', '085270110212', 'I forgor'),
(4, 3, 'Syauqi Bilqisthi', '', '', ''),
(6, 4, 'Arini Balqis', 'kk', '0909', 'mm'),
(9, 5, 'user', 'user@mail.com', '080812124422', 'Tembung Jln Mesjid Perumahan Merpati');

-- --------------------------------------------------------

--
-- Table structure for table `data_box`
--

CREATE TABLE `data_box` (
  `id` int NOT NULL,
  `id_box` int NOT NULL,
  `mitra_id` int NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_box`
--

INSERT INTO `data_box` (`id`, `id_box`, `mitra_id`, `gambar`) VALUES
(1, 999, 1, 'foto_box_img_00001.jpg'),
(12, 3000, 2, NULL),
(13, 1000, 1, NULL),
(15, 3, 2, 'foto_box_1_img_65fc34d53c303.jpg'),
(16, 2, 2, 'foto_box_2_img_65fc34d54231d.png'),
(17, 1, 2, 'foto_box_3_img_65fc34d544741.png'),
(18, 11, 4, 'foto_box_1_img_65fce857bb622.jpg'),
(19, 12, 4, 'foto_box_2_img_65fce857c5b4d.png'),
(20, 13, 4, 'foto_box_3_img_65fce857c935a.jpg'),
(21, 14, 4, 'foto_box_4_img_65fce857cdabd.png'),
(22, 15, 4, 'foto_box_5_img_65fce857d02e4.jpg'),
(23, 16, 4, 'foto_box_6_img_65fce857d49e0.png'),
(25, 3333, 7, 'foto_box_1_img_65fd3d3e4ad7e.jpg'),
(26, 7001, 8, 'foto_box_1_img_65fd3e086b594.jpg'),
(27, 7002, 8, 'foto_box_2_img_65fd3e086eda8.png'),
(28, 7003, 8, 'foto_box_3_img_65fd3e0870dbc.jpg'),
(29, 4444, 9, 'foto_box_1_img_65fd43be1b9d1.png'),
(30, 5555, 9, 'foto_box_2_img_65fd43be1fad9.jpg'),
(31, 6666, 9, 'foto_box_3_img_65fd43be22b16.png'),
(32, 7777, 10, 'foto_box_1_img_65fd44294194e.jpg'),
(33, 4321, 11, 'foto_box_1_img_65fd511deeb5f.jpg'),
(34, 321, 11, 'foto_box_2_img_65fd511df1d29.jpg'),
(35, 21, 11, 'foto_box_3_img_65fd511e008d0.jpg'),
(36, 5553, 12, 'foto_box_1_img_660023941a1d7.png'),
(37, 7568, 13, 'foto_box_1_img_66002d2fd8adb.jpg'),
(38, 2534, 13, 'foto_box_2_img_66002d2fdcc92.jpg'),
(39, 1234, 11, 'foto_box_1_img_660049e089de7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_mitra_box`
--

CREATE TABLE `data_mitra_box` (
  `id` int NOT NULL,
  `nama_usaha` varchar(200) NOT NULL,
  `nama_penanggung_jawab` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `latlong_lokasi` varchar(100) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `foto_usaha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_penanggung_jawab` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_mitra_box`
--

INSERT INTO `data_mitra_box` (`id`, `nama_usaha`, `nama_penanggung_jawab`, `alamat`, `no_wa`, `latlong_lokasi`, `jenis_usaha`, `foto_usaha`, `foto_penanggung_jawab`, `keterangan`, `deleted`) VALUES
(1, 'Bakso Tanpa Tepung', 'Harianto', 'Jln. Meteorologi', '085211223344', '3.6218983959889837, 98.70811929276934', 'Makanan', NULL, NULL, NULL, 1),
(2, 'Farhan Kebab', 'Farhan bin Laden', 'Jln. Meteorologi', '08761283922', '3.7218983959889837, 98.70811929276934', 'Makanan', 'foto_usaha_img_65ea9bd9a84b6.jpg', 'foto_penanggung_jawab_img_65eaa00ec389b.png', NULL, 1),
(3, 'Denis Burito', 'Denis Herlanto', 'Jln Cemara', '085270120506', '3.6218983959889837, 98.90811929276934', 'Makanan', 'foto_usaha_img_65eae0d6aebcf.png', 'foto_penanggung_jawab_img_65eae121c945e.jpg', NULL, 1),
(4, 'Rapika Laundry', 'Dedi Hidayat', 'Jln. Meteorologi', '085212141516', '3.621842844798971, 98.70866454990889', 'Laundry', 'foto_usaha_img_65ebce5225654.png', 'foto_penanggung_jawab_img_65ebce522a078.jpg', NULL, 1),
(5, 'a', 'a', 'a', 'a', '3.621831, 98.7086446', 'a', NULL, NULL, 'a', 1),
(6, 'b', 'b', 'b', 'b', '3.6218983959889837, 97.70811929276934', 'b', NULL, NULL, NULL, 1),
(7, 'c', 'c', 'c', 'c', '3.6218273, 98.7086351', 'c', NULL, NULL, 'c', 1),
(8, 'Apotek Kita Bisa', 'Koko Molen', 'Jln. Meteorologi', '085212340987', '3.6218281, 98.7086405', 'Apotek', NULL, NULL, 'Apotek mas ku', 1),
(9, 'd', 'd', 'd', 'd', '3.6218361, 98.7086409', 'd', NULL, NULL, 'd', 1),
(10, 'e', 'e', 'e', 'e', '3.621837, 98.7086407', 'e', NULL, NULL, 'e', 1),
(11, 'Ayam Penyet Cak Soleh', 'Aurelio Putra Vanevi', 'Geulanggang Teungoh, Kec. Kuala, Kabupaten Bireuen, Aceh', '085270110203', '3.6218238, 98.7086435', 'Rumah Makan', 'foto_usaha_img_65fd511de50ac.jpg', 'foto_penanggung_jawab_img_65fd511dea16a.jpg', 'Ayam penyet cak soleh, Ayam penyet terenak di seluruh Bireuen', 1),
(12, 'f', 'f', 'f', 'f', '3.6087147394169765, 98.72863769531251', 'f', 'foto_usaha_img_660023940531f.jpg', 'foto_penanggung_jawab_img_6600239410362.jpg', 'f', 1),
(13, 'Lim Kok Tong Pemuda', 'Ganjar Lobet', 'Jl.Pemuda Baru II No.28, Jl. Pegadaian No.Simpang 30, Kota Medan, Sumatera Utara 20151', '085212094567', '3.583800042458898, 98.68110895156862', 'Cafe', 'foto_usaha_img_66002d2fcc8a8.jpg', 'foto_penanggung_jawab_img_66002d2fd1429.jpg', 'Cafe Lim Kok Tong Pemuda', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_mitra_penyaluran`
--

CREATE TABLE `data_mitra_penyaluran` (
  `id` int NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `jenis_mitra` varchar(100) NOT NULL,
  `alamat_mitra` varchar(200) NOT NULL,
  `latlong_lokasi` varchar(100) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `foto_lokasi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto_mitra` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_penanggung_jawab` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `keterangan` varchar(200) NOT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_mitra_penyaluran`
--

INSERT INTO `data_mitra_penyaluran` (`id`, `nama_mitra`, `jenis_mitra`, `alamat_mitra`, `latlong_lokasi`, `no_wa`, `foto_lokasi`, `foto_mitra`, `nama_penanggung_jawab`, `keterangan`, `deleted`) VALUES
(1, 'Kita Berbagi', 'Organisasi', 'Jln. Meteorologi', '3.621842844798971, 98.70866454990889', '085270153456', 'foto_lokasi_img_65ee6e526ab84.png', 'foto_mitra_img_65ee6e5267fc4.png', 'Dedi Hidayat', 'Kita Berbagi menyebarkan kebahagiaan', 1),
(2, 'ss', 'Orang', 'sss', '9090', '0852', NULL, NULL, NULL, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_program`
--

CREATE TABLE `data_program` (
  `id` int NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  `kategori_id` int NOT NULL,
  `keterangan_program` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_program`
--

INSERT INTO `data_program` (`id`, `nama_program`, `kategori_id`, `keterangan_program`, `start`, `end`, `gambar`, `deleted`) VALUES
(1, 'We Stand for Palestinian', 5, 'Saat ini di palestina sudah tak ada tempat yang aman untuk berlindung, tak ada air bersih untuk diminum, tak ada makanan yang membuat kenyang. Masyarakat gaza bergantung dengan air tanah yang payau, padahal air payau sangat membahayakan kesehatan dan kebersihan.  Semua fasilitas vital dibombardir!. Maka dari itu kami ingin mengirim bantuan sebanyaknya untuk saudara kita yang berada di palestina', '2024-03-01', '2024-04-01', 'gambar_img_65fe533419033.jpg', 1),
(2, 'Sekolah', 1, 'SMK TRITECH Informatika telah meluncurkan program bantuan pendidikan yang bertujuan untuk meningkatkan kualitas pembelajaran bagi siswa-siswinya. Program ini mencakup berbagai aspek, mulai dari penyediaan perangkat dan peralatan pendidikan hingga pelatihan bagi para guru dalam penerapan teknologi informasi.', '2024-03-08', '2024-04-17', 'gambar_img_65fe539762481.jpg', 1),
(4, 'Penyaluran Dana Bantuan Kesehatan', 3, 'Program bantuan kesehatan merupakan inisiatif yang bertujuan untuk meningkatkan akses masyarakat terhadap layanan kesehatan yang berkualitas. Selain itu, program bantuan kesehatan juga sering kali mencakup penyuluhan dan promosi kesehatan guna meningkatkan kesadaran masyarakat akan pentingnya menjaga kesehatan secara holistik.', '2024-03-23', '2024-05-23', 'gambar_img_65fe560773bae.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int NOT NULL,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nik`, `username`, `password`, `level_user`, `foto`, `deleted`) VALUES
(1, '001', 'admin1', 'admin', 'admin', NULL, 1),
(2, '0121021391317', 'said123', 'muhammad', 'canvaser', NULL, 1),
(3, '1200003039', 'syauqi', 'qiqi', 'canvaser', NULL, 1),
(4, '111111111111', 'arini', '123', 'canvaser', NULL, 1),
(5, '00000000001', 'user', 'user', 'canvaser', 'profil_img_5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kolektif`
--

CREATE TABLE `laporan_kolektif` (
  `id` int NOT NULL,
  `id_canvaser` int NOT NULL,
  `id_box` int NOT NULL,
  `jumlah_kolektif` int NOT NULL,
  `tanggal_kolektif` date NOT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laporan_kolektif`
--

INSERT INTO `laporan_kolektif` (`id`, `id_canvaser`, `id_box`, `jumlah_kolektif`, `tanggal_kolektif`, `keterangan`) VALUES
(9, 5, 4, 120000, '2024-03-22', 'Seratus dua puluh ribu rupiah'),
(10, 5, 999, 1000000, '2024-03-23', 'Satu juta rupiah'),
(11, 5, 4444, 300000, '2024-03-23', 'tiga ratus ribu rupiah'),
(12, 5, 1000, 250000, '2024-03-23', 'dua ratus lima puluh ribu rupiah'),
(13, 5, 3333, 125000, '2024-03-23', 'seratus dua puluh lima ribu rupiah'),
(14, 5, 5553, 45000, '2024-03-24', 'To the best');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_canvaser`
--
ALTER TABLE `biodata_canvaser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_pengguna_ibfk_1` (`id_akun`);

--
-- Indexes for table `data_box`
--
ALTER TABLE `data_box`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_box` (`id_box`),
  ADD KEY `mitra_id` (`mitra_id`);

--
-- Indexes for table `data_mitra_box`
--
ALTER TABLE `data_mitra_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mitra_penyaluran`
--
ALTER TABLE `data_mitra_penyaluran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_program`
--
ALTER TABLE `data_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kolektif`
--
ALTER TABLE `laporan_kolektif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata_canvaser`
--
ALTER TABLE `biodata_canvaser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_box`
--
ALTER TABLE `data_box`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `data_mitra_box`
--
ALTER TABLE `data_mitra_box`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_mitra_penyaluran`
--
ALTER TABLE `data_mitra_penyaluran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_program`
--
ALTER TABLE `data_program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan_kolektif`
--
ALTER TABLE `laporan_kolektif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata_canvaser`
--
ALTER TABLE `biodata_canvaser`
  ADD CONSTRAINT `biodata_canvaser_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `data_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `data_box`
--
ALTER TABLE `data_box`
  ADD CONSTRAINT `data_box_ibfk_1` FOREIGN KEY (`mitra_id`) REFERENCES `data_mitra_box` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
