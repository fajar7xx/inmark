-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 12:57 PM
-- Server version: 10.3.8-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inmark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_admin` tinyint(1) NOT NULL,
  `tgl_gabung` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`, `password`, `status_admin`, `tgl_gabung`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-07-17 07:13:21'),
(2, 'andichang', 'andichang', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2018-07-16 05:31:26'),
(3, 'fajar', 'fajar siagian', '24bc50d85ad8fa9cda686145cf1f8aca', 1, '2018-07-29 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `influencer`
--

CREATE TABLE `influencer` (
  `id_influencer` int(11) NOT NULL,
  `nm_lengkap` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `gbr_profil` varchar(255) NOT NULL,
  `tgl_gabung` datetime NOT NULL DEFAULT current_timestamp(),
  `aktif` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `influencer`
--

INSERT INTO `influencer` (`id_influencer`, `nm_lengkap`, `email`, `password`, `alamat`, `telp`, `gbr_profil`, `tgl_gabung`, `aktif`) VALUES
(1, 'andi chang', 'andi@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan thamrin sebelah mikroskil', '081211112222', 'img/uploads/man.png', '2018-07-17 00:00:00', 1),
(2, 'fajar setiawan', 'fajar@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan makmur gg dahlia 36', '081123456789', '', '2018-07-16 07:17:32', 1),
(3, 'azhari pradana', 'azhari@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan medan', '081266663525', '', '2018-07-19 00:00:00', 1),
(4, 'nadia sahputri', 'nadia@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan medan', '081254789845', '', '2018-07-19 00:00:00', 1),
(5, 'abil habibi', 'abil@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan polonia', '087798785825', '', '2018-07-19 00:00:00', 1),
(6, 'iqbal', 'iqbal@mail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'jalan gatot sibroto', '081165489534', '', '2018-07-19 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Blogger'),
(2, 'Youtube'),
(3, 'Twitter'),
(4, 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `lapor_proyek`
--

CREATE TABLE `lapor_proyek` (
  `id_laporproyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_influencer`
--

CREATE TABLE `pembayaran_influencer` (
  `id_pembayaraninf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_proyek`
--

CREATE TABLE `pembayaran_proyek` (
  `id_pembayaranproyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_uang`
--

CREATE TABLE `pengembalian_uang` (
  `id_pengembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nm_perusahaan` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `gbr_profil` varchar(50) NOT NULL,
  `nm_cp` varchar(100) NOT NULL,
  `no_cp` varchar(15) NOT NULL,
  `no_npwp` varchar(30) NOT NULL,
  `no_siup` varchar(30) NOT NULL,
  `tgl_gabung` datetime NOT NULL DEFAULT current_timestamp(),
  `status_aktif` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nm_perusahaan`, `email`, `password`, `alamat`, `telp`, `gbr_profil`, `nm_cp`, `no_cp`, `no_npwp`, `no_siup`, `tgl_gabung`, `status_aktif`) VALUES
(1, 'pt cabe keren', 'hi@cabek.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan medan KIM 2', '0611234567', 'img/uploads/perusahaan.png', 'bapak tan', '081299887766', '25.773.472.3-604.000', '517/0234/35.73.407/2015', '2018-07-16 09:41:00', 1),
(3, 'pt keren aja', 'apa@keren.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan medan - batang kuis km 10', '061234212', 'img/uploads/pt.png', 'bpk setiawan', '081388776543', '12341234123412341234', '', '2018-07-10 12:17:38', 1),
(4, 'Excel Aja', 'marketing@excel.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan medan', '', 'img/uploads/user2.png', 'ibnu sita', '', '', '', '2018-07-22 00:00:00', 1),
(5, 'Roti Enak Artis', 'kuy@rotienak.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan deli serdang', '', 'img/uploads/user.png', 'bang sabran', '', '', '', '2018-07-20 00:00:00', 1),
(6, 'SIOMAY', 'halo@siomay.com', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan tj morawa', '06188526485', 'img/uploads/user.png', 'acen wang', '', '', '', '2018-07-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil_influencer`
--

CREATE TABLE `profil_influencer` (
  `id_profilinf` int(11) NOT NULL,
  `id_influencer` int(11) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `kemampuan` text NOT NULL,
  `da` int(5) NOT NULL,
  `pa` int(5) NOT NULL,
  `akun_ig` varchar(100) NOT NULL,
  `akun_youtube` varchar(100) NOT NULL,
  `akun_twitter` varchar(100) NOT NULL,
  `akun_fb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil_influencer`
--

INSERT INTO `profil_influencer` (`id_profilinf`, `id_influencer`, `negara`, `kota`, `website`, `tentang`, `kemampuan`, `da`, `pa`, `akun_ig`, `akun_youtube`, `akun_twitter`, `akun_fb`) VALUES
(1, 1, 'Indonesia', 'Medan', 'https://www.fajarsiagian.com/', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dui metus, volutpat et ullamcorper eget, fringilla eu nisi. Ut rhoncus erat at sem luctus congue. Donec finibus lacus augue. Donec ornare, dui sit amet fermentum fringilla, quam nunc iaculis augue, vel pharetra risus urna id ligula. Donec nec mollis sapien. Nam eu pretium tortor. Pellentesque nec volutpat purus. Nullam sed bibendum dui.\r\n</p>\r\n<p>\r\nFusce nec lorem ut sem malesuada mattis. Suspendisse posuere enim volutpat est elementum, ut tristique risus sagittis. Pellentesque vestibulum urna ornare ultricies dapibus. Etiam varius, eros at laoreet aliquet, orci nunc iaculis urna, vitae dictum felis purus tempus metus. Donec facilisis purus tincidunt, viverra quam vitae, viverra mi. Maecenas eu fermentum nibh. Ut elementum vulputate tortor. Sed malesuada diam eget orci fringilla faucibus ac porta quam. Phasellus in lorem quis sapien scelerisque mollis ac ac urna. Curabitur sit amet enim vitae lacus blandit sodales. Donec vulputate erat dui, quis pulvinar orci placerat quis.\r\n</p>\r\n<p>\r\nAliquam erat volutpat. Quisque suscipit arcu et lorem elementum elementum. Vivamus ut porttitor risus, elementum tincidunt purus. Aliquam erat volutpat. Praesent tempus massa purus, eget molestie felis mattis non. Integer condimentum, massa eu tristique pretium, dolor quam aliquet odio, at rhoncus tortor sapien eu ex. Maecenas congue nec lectus ut malesuada. Maecenas commodo ipsum in eleifend consectetur.\r\n</p>\r\n<p>\r\nEtiam iaculis nisi vel turpis euismod auctor in non elit. Quisque eu urna sapien. Aenean at vestibulum elit. Nulla ullamcorper dolor iaculis, vehicula elit nec, molestie magna. Maecenas volutpat sodales ipsum eu varius. Nam mi ex, sollicitudin sed scelerisque quis, pulvinar ac tellus. In in magna justo. Ut condimentum augue at tincidunt volutpat. Integer sed nisi eu odio semper venenatis. Morbi ipsum nisi, molestie sit amet ipsum in, pulvinar laoreet tortor. Cras vehicula, purus ac malesuada mollis, arcu neque vulputate sapien, a posuere tortor purus a sapien. Suspendisse ut dictum diam, vitae dapibus leo.\r\n</p>\r\n<p>\r\nCras ut est non lorem maximus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. In non posuere mi. Aenean eget mattis nunc. Aliquam tincidunt hendrerit sem, id commodo velit semper non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur ut urna ullamcorper dolor congue fermentum eget id sem. Sed magna augue, rutrum eget iaculis et, mattis a massa. Cras eget feugiat augue, sed finibus erat. Suspendisse laoreet sagittis scelerisque. Etiam orci ex, imperdiet sagittis mi porttitor, posuere elementum magna. In pharetra massa vitae est interdum iaculis.\r\n</p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dui metus, volutpat et ullamcorper eget, fringilla eu nisi. Ut rhoncus erat at sem luctus congue. Donec finibus lacus augue. Donec ornare, dui sit amet fermentum fringilla, quam nunc iaculis augue, vel pharetra risus urna id ligula. Donec nec mollis sapien. Nam eu pretium tortor. Pellentesque nec volutpat purus. Nullam sed bibendum dui.\r\n</p>\r\n<p>\r\nFusce nec lorem ut sem malesuada mattis. Suspendisse posuere enim volutpat est elementum, ut tristique risus sagittis. Pellentesque vestibulum urna ornare ultricies dapibus. Etiam varius, eros at laoreet aliquet, orci nunc iaculis urna, vitae dictum felis purus tempus metus. Donec facilisis purus tincidunt, viverra quam vitae, viverra mi. Maecenas eu fermentum nibh. Ut elementum vulputate tortor. Sed malesuada diam eget orci fringilla faucibus ac porta quam. Phasellus in lorem quis sapien scelerisque mollis ac ac urna. Curabitur sit amet enim vitae lacus blandit sodales. Donec vulputate erat dui, quis pulvinar orci placerat quis.\r\n</p>\r\n<p>\r\nAliquam erat volutpat. Quisque suscipit arcu et lorem elementum elementum. Vivamus ut porttitor risus, elementum tincidunt purus. Aliquam erat volutpat. Praesent tempus massa purus, eget molestie felis mattis non. Integer condimentum, massa eu tristique pretium, dolor quam aliquet odio, at rhoncus tortor sapien eu ex. Maecenas congue nec lectus ut malesuada. Maecenas commodo ipsum in eleifend consectetur.\r\n</p>\r\n<p>\r\nEtiam iaculis nisi vel turpis euismod auctor in non elit. Quisque eu urna sapien. Aenean at vestibulum elit. Nulla ullamcorper dolor iaculis, vehicula elit nec, molestie magna. Maecenas volutpat sodales ipsum eu varius. Nam mi ex, sollicitudin sed scelerisque quis, pulvinar ac tellus. In in magna justo. Ut condimentum augue at tincidunt volutpat. Integer sed nisi eu odio semper venenatis. Morbi ipsum nisi, molestie sit amet ipsum in, pulvinar laoreet tortor. Cras vehicula, purus ac malesuada mollis, arcu neque vulputate sapien, a posuere tortor purus a sapien. Suspendisse ut dictum diam, vitae dapibus leo.\r\n</p>\r\n<p>\r\nCras ut est non lorem maximus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. In non posuere mi. Aenean eget mattis nunc. Aliquam tincidunt hendrerit sem, id commodo velit semper non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur ut urna ullamcorper dolor congue fermentum eget id sem. Sed magna augue, rutrum eget iaculis et, mattis a massa. Cras eget feugiat augue, sed finibus erat. Suspendisse laoreet sagittis scelerisque. Etiam orci ex, imperdiet sagittis mi porttitor, posuere elementum magna. In pharetra massa vitae est interdum iaculis.\r\n</p>', 30, 30, 'https://www.instagram.com/fajar.siagian/', 'https://www.youtube.com/user/fajar7xx', 'https://twitter.com/Fajar_Siagian_7', 'https://www.facebook.com/fajarsetiawan.siagian');

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id_profilper` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`id_profilper`, `id_perusahaan`, `negara`, `kota`, `website`, `tentang`) VALUES
(1, 1, 'Indonesia', 'Jakarta', 'www.cabeajakeren.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dui metus, volutpat et ullamcorper eget, fringilla eu nisi. Ut rhoncus erat at sem luctus congue. Donec finibus lacus augue. Donec ornare, dui sit amet fermentum fringilla, quam nunc iaculis augue, vel pharetra risus urna id ligula. Donec nec mollis sapien. Nam eu pretium tortor. Pellentesque nec volutpat purus. Nullam sed bibendum dui.\r\n</p>\r\n<p>\r\nFusce nec lorem ut sem malesuada mattis. Suspendisse posuere enim volutpat est elementum, ut tristique risus sagittis. Pellentesque vestibulum urna ornare ultricies dapibus. Etiam varius, eros at laoreet aliquet, orci nunc iaculis urna, vitae dictum felis purus tempus metus. Donec facilisis purus tincidunt, viverra quam vitae, viverra mi. Maecenas eu fermentum nibh. Ut elementum vulputate tortor. Sed malesuada diam eget orci fringilla faucibus ac porta quam. Phasellus in lorem quis sapien scelerisque mollis ac ac urna. Curabitur sit amet enim vitae lacus blandit sodales. Donec vulputate erat dui, quis pulvinar orci placerat quis.\r\n</p>\r\n<p>\r\nAliquam erat volutpat. Quisque suscipit arcu et lorem elementum elementum. Vivamus ut porttitor risus, elementum tincidunt purus. Aliquam erat volutpat. Praesent tempus massa purus, eget molestie felis mattis non. Integer condimentum, massa eu tristique pretium, dolor quam aliquet odio, at rhoncus tortor sapien eu ex. Maecenas congue nec lectus ut malesuada. Maecenas commodo ipsum in eleifend consectetur.\r\n</p>\r\n<p>\r\nEtiam iaculis nisi vel turpis euismod auctor in non elit. Quisque eu urna sapien. Aenean at vestibulum elit. Nulla ullamcorper dolor iaculis, vehicula elit nec, molestie magna. Maecenas volutpat sodales ipsum eu varius. Nam mi ex, sollicitudin sed scelerisque quis, pulvinar ac tellus. In in magna justo. Ut condimentum augue at tincidunt volutpat. Integer sed nisi eu odio semper venenatis. Morbi ipsum nisi, molestie sit amet ipsum in, pulvinar laoreet tortor. Cras vehicula, purus ac malesuada mollis, arcu neque vulputate sapien, a posuere tortor purus a sapien. Suspendisse ut dictum diam, vitae dapibus leo.\r\n</p>\r\n<p>\r\nCras ut est non lorem maximus tincidunt. Interdum et malesuada fames ac ante ipsum primis in faucibus. In non posuere mi. Aenean eget mattis nunc. Aliquam tincidunt hendrerit sem, id commodo velit semper non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur ut urna ullamcorper dolor congue fermentum eget id sem. Sed magna augue, rutrum eget iaculis et, mattis a massa. Cras eget feugiat augue, sed finibus erat. Suspendisse laoreet sagittis scelerisque. Etiam orci ex, imperdiet sagittis mi porttitor, posuere elementum magna. In pharetra massa vitae est interdum iaculis.\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_influencer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `diterima` tinyint(4) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `id_proyek`, `id_influencer`, `deskripsi`, `diterima`, `tgl_dibuat`) VALUES
(1, 1, 1, 'proposal 1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante lectus, molestie quis feugiat vitae, congue sed magna. Nunc ac porttitor metus. Vivamus congue ipsum felis, vel molestie mi ullamcorper quis. Aliquam maximus interdum massa vel interdum. Donec mollis hendrerit massa, sed congue ex ornare sed. Vivamus id elit iaculis, consequat libero sed, blandit elit. Suspendisse ullamcorper odio lacus. Vivamus interdum, lorem sit amet posuere bibendum, neque tellus maximus arcu, mollis pharetra tellus magna vitae nunc.\r\n\r\nMauris cursus hendrerit mauris, quis maximus lacus elementum id. Phasellus non massa neque. Etiam iaculis consequat erat. Proin posuere leo blandit lectus interdum, vel vulputate odio lobortis. Fusce eu nisl interdum, bibendum neque vel, feugiat dui. Pellentesque nec dolor imperdiet, semper tortor ac, tempor felis. Donec suscipit condimentum nibh, eget viverra orci. Suspendisse condimentum ex quis magna faucibus imperdiet. Curabitur auctor sapien at purus rutrum interdum. Curabitur eros quam, sagittis sit amet odio quis, consequat interdum dolor. Donec dictum ornare augue, a posuere purus blandit eu. Mauris quam mauris, dapibus hendrerit massa at, ornare rutrum eros.', 0, '2018-07-19 00:00:00'),
(2, 1, 2, 'proposal 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante lectus, molestie quis feugiat vitae, congue sed magna. Nunc ac porttitor metus. Vivamus congue ipsum felis, vel molestie mi ullamcorper quis. Aliquam maximus interdum massa vel interdum. Donec mollis hendrerit massa, sed congue ex ornare sed. Vivamus id elit iaculis, consequat libero sed, blandit elit. Suspendisse ullamcorper odio lacus. Vivamus interdum, lorem sit amet posuere bibendum, neque tellus maximus arcu, mollis pharetra tellus magna vitae nunc.\r\n\r\nMauris cursus hendrerit mauris, quis maximus lacus elementum id. Phasellus non massa neque. Etiam iaculis consequat erat. Proin posuere leo blandit lectus interdum, vel vulputate odio lobortis. Fusce eu nisl interdum, bibendum neque vel, feugiat dui. Pellentesque nec dolor imperdiet, semper tortor ac, tempor felis. Donec suscipit condimentum nibh, eget viverra orci. Suspendisse condimentum ex quis magna faucibus imperdiet. Curabitur auctor sapien at purus rutrum interdum. Curabitur eros quam, sagittis sit amet odio quis, consequat interdum dolor. Donec dictum ornare augue, a posuere purus blandit eu. Mauris quam mauris, dapibus hendrerit massa at, ornare rutrum eros.', 0, '2018-07-20 00:00:00'),
(3, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante lectus, molestie quis feugiat vitae, congue sed magna. Nunc ac porttitor metus. Vivamus congue ipsum felis, vel molestie mi ullamcorper quis. Aliquam maximus interdum massa vel interdum. Donec mollis hendrerit massa, sed congue ex ornare sed. Vivamus id elit iaculis, consequat libero sed, blandit elit. Suspendisse ullamcorper odio lacus. Vivamus interdum, lorem sit amet posuere bibendum, neque tellus maximus arcu, mollis pharetra tellus magna vitae nunc.\r\n\r\nMauris cursus hendrerit mauris, quis maximus lacus elementum id. Phasellus non massa neque. Etiam iaculis consequat erat. Proin posuere leo blandit lectus interdum, vel vulputate odio lobortis. Fusce eu nisl interdum, bibendum neque vel, feugiat dui. Pellentesque nec dolor imperdiet, semper tortor ac, tempor felis. Donec suscipit condimentum nibh, eget viverra orci. Suspendisse condimentum ex quis magna faucibus imperdiet. Curabitur auctor sapien at purus rutrum interdum. Curabitur eros quam, sagittis sit amet odio quis, consequat interdum dolor. Donec dictum ornare augue, a posuere purus blandit eu. Mauris quam mauris, dapibus hendrerit massa at, ornare rutrum eros.', 0, '2018-07-20 00:00:00'),
(4, 1, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante lectus, molestie quis feugiat vitae, congue sed magna. Nunc ac porttitor metus. Vivamus congue ipsum felis, vel molestie mi ullamcorper quis. Aliquam maximus interdum massa vel interdum. Donec mollis hendrerit massa, sed congue ex ornare sed. Vivamus id elit iaculis, consequat libero sed, blandit elit. Suspendisse ullamcorper odio lacus. Vivamus interdum, lorem sit amet posuere bibendum, neque tellus maximus arcu, mollis pharetra tellus magna vitae nunc.\r\n\r\nMauris cursus hendrerit mauris, quis maximus lacus elementum id. Phasellus non massa neque. Etiam iaculis consequat erat. Proin posuere leo blandit lectus interdum, vel vulputate odio lobortis. Fusce eu nisl interdum, bibendum neque vel, feugiat dui. Pellentesque nec dolor imperdiet, semper tortor ac, tempor felis. Donec suscipit condimentum nibh, eget viverra orci. Suspendisse condimentum ex quis magna faucibus imperdiet. Curabitur auctor sapien at purus rutrum interdum. Curabitur eros quam, sagittis sit amet odio quis, consequat interdum dolor. Donec dictum ornare augue, a posuere purus blandit eu. Mauris quam mauris, dapibus hendrerit massa at, ornare rutrum eros.', 0, '2018-07-20 12:00:00'),
(5, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ante lectus, molestie quis feugiat vitae, congue sed magna. Nunc ac porttitor metus. Vivamus congue ipsum felis, vel molestie mi ullamcorper quis. Aliquam maximus interdum massa vel interdum. Donec mollis hendrerit massa, sed congue ex ornare sed. Vivamus id elit iaculis, consequat libero sed, blandit elit. Suspendisse ullamcorper odio lacus. Vivamus interdum, lorem sit amet posuere bibendum, neque tellus maximus arcu, mollis pharetra tellus magna vitae nunc.\r\n\r\nMauris cursus hendrerit mauris, quis maximus lacus elementum id. Phasellus non massa neque. Etiam iaculis consequat erat. Proin posuere leo blandit lectus interdum, vel vulputate odio lobortis. Fusce eu nisl interdum, bibendum neque vel, feugiat dui. Pellentesque nec dolor imperdiet, semper tortor ac, tempor felis. Donec suscipit condimentum nibh, eget viverra orci. Suspendisse condimentum ex quis magna faucibus imperdiet. Curabitur auctor sapien at purus rutrum interdum. Curabitur eros quam, sagittis sit amet odio quis, consequat interdum dolor. Donec dictum ornare augue, a posuere purus blandit eu. Mauris quam mauris, dapibus hendrerit massa at, ornare rutrum eros.', 0, '2018-07-20 19:00:00'),
(6, 2, 4, 'proposal 1\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor nulla. Nulla tincidunt neque convallis, viverra ex in, egestas elit. Aliquam sollicitudin condimentum eros, id scelerisque lorem efficitur ut. Mauris molestie mattis nulla vitae dapibus. Phasellus commodo convallis quam, ac maximus erat vestibulum id. Integer sed vehicula tellus. Integer varius pretium neque ut imperdiet. Duis cursus leo quis orci volutpat, nec aliquam nunc aliquet. Aenean venenatis euismod lectus, ut vulputate lacus. Nulla tortor tortor, ullamcorper in dui et, hendrerit aliquet arcu. Suspendisse et tellus mattis, lacinia urna eu, fringilla nibh. Pellentesque lacinia nulla finibus pulvinar sagittis.', 0, '2018-07-22 00:00:00'),
(7, 3, 6, 'proposal 1\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor nulla. Nulla tincidunt neque convallis, viverra ex in, egestas elit. Aliquam sollicitudin condimentum eros, id scelerisque lorem efficitur ut. Mauris molestie mattis nulla vitae dapibus. Phasellus commodo convallis quam, ac maximus erat vestibulum id. Integer sed vehicula tellus. Integer varius pretium neque ut imperdiet. Duis cursus leo quis orci volutpat, nec aliquam nunc aliquet. Aenean venenatis euismod lectus, ut vulputate lacus. Nulla tortor tortor, ullamcorper in dui et, hendrerit aliquet arcu. Suspendisse et tellus mattis, lacinia urna eu, fringilla nibh. Pellentesque lacinia nulla finibus pulvinar sagittis.', 0, '2018-07-22 00:00:00'),
(8, 3, 5, 'proposal 1\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor nulla. Nulla tincidunt neque convallis, viverra ex in, egestas elit. Aliquam sollicitudin condimentum eros, id scelerisque lorem efficitur ut. Mauris molestie mattis nulla vitae dapibus. Phasellus commodo convallis quam, ac maximus erat vestibulum id. Integer sed vehicula tellus. Integer varius pretium neque ut imperdiet. Duis cursus leo quis orci volutpat, nec aliquam nunc aliquet. Aenean venenatis euismod lectus, ut vulputate lacus. Nulla tortor tortor, ullamcorper in dui et, hendrerit aliquet arcu. Suspendisse et tellus mattis, lacinia urna eu, fringilla nibh. Pellentesque lacinia nulla finibus pulvinar sagittis.', 0, '2018-07-22 00:00:00'),
(9, 3, 2, 'porposal 2\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor nulla. Nulla tincidunt neque convallis, viverra ex in, egestas elit. Aliquam sollicitudin condimentum eros, id scelerisque lorem efficitur ut. Mauris molestie mattis nulla vitae dapibus. Phasellus commodo convallis quam, ac maximus erat vestibulum id. Integer sed vehicula tellus. Integer varius pretium neque ut imperdiet. Duis cursus leo quis orci volutpat, nec aliquam nunc aliquet. Aenean venenatis euismod lectus, ut vulputate lacus. Nulla tortor tortor, ullamcorper in dui et, hendrerit aliquet arcu. Suspendisse et tellus mattis, lacinia urna eu, fringilla nibh. Pellentesque lacinia nulla finibus pulvinar sagittis.', 0, '2018-07-22 00:00:00'),
(10, 2, 3, 'proposal 2\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae tortor nulla. Nulla tincidunt neque convallis, viverra ex in, egestas elit. Aliquam sollicitudin condimentum eros, id scelerisque lorem efficitur ut. Mauris molestie mattis nulla vitae dapibus. Phasellus commodo convallis quam, ac maximus erat vestibulum id. Integer sed vehicula tellus. Integer varius pretium neque ut imperdiet. Duis cursus leo quis orci volutpat, nec aliquam nunc aliquet. Aenean venenatis euismod lectus, ut vulputate lacus. Nulla tortor tortor, ullamcorper in dui et, hendrerit aliquet arcu. Suspendisse et tellus mattis, lacinia urna eu, fringilla nibh. Pellentesque lacinia nulla finibus pulvinar sagittis.', 0, '2018-07-22 00:00:00'),
(11, 5, 2, 'proposal 1 \r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet purus eu lacus auctor dictum. In hac habitasse platea dictumst. Aliquam venenatis, justo sed blandit mattis, est quam consectetur orci, id consequat justo nulla sed risus. Maecenas semper id nisi quis rhoncus. Nulla ullamcorper aliquet neque, eu sollicitudin urna vulputate eget. Etiam dolor orci, gravida id lacinia elementum, cursus eu odio. Sed molestie, risus vel cursus dictum, quam eros finibus neque, non aliquet dolor turpis sit amet leo. Praesent vel elit ac enim lacinia pulvinar eget in elit. Aliquam luctus dui in imperdiet tincidunt. Nunc tincidunt tincidunt orci, vel lobortis ipsum.', 0, '2018-07-22 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul_proyek` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `dana` decimal(10,0) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `aktif` tinyint(4) NOT NULL,
  `selesai` tinyint(4) NOT NULL,
  `tgl_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `id_perusahaan`, `id_kategori`, `judul_proyek`, `deskripsi`, `dana`, `tgl_mulai`, `tgl_akhir`, `aktif`, `selesai`, `tgl_dibuat`) VALUES
(1, 1, 1, 'penulisan review hp A', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur auctor fringilla nulla at lacinia. Fusce ultricies nibh id mi venenatis condimentum a sit amet tortor. Nulla facilisis, sem et interdum hendrerit, mauris augue sagittis urna, nec venenatis libero diam a ipsum. Sed sit amet condimentum metus, ut rhoncus est. Ut convallis elementum ullamcorper. Cras egestas porttitor quam, facilisis rhoncus enim efficitur nec. Quisque fermentum quis mauris id ullamcorper. Mauris accumsan pharetra mauris, sed tristique augue lobortis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus ac orci nec enim varius accumsan. Sed viverra et est quis viverra. Morbi a euismod nulla. Aenean euismod porta odio. Maecenas nec ante quis enim pulvinar bibendum vitae ac neque. Donec efficitur mattis sollicitudin. Donec ut malesuada dolor.\r\n</p>\r\n<p>\r\nMaecenas accumsan justo eu massa aliquam, ut interdum velit tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget nisl ut nulla lacinia euismod non et quam. Suspendisse consectetur libero eu purus porttitor lacinia. Nullam vestibulum, lacus non porta ultricies, diam est placerat enim, ac bibendum est felis at tellus. Proin porttitor purus non tellus fringilla dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer pulvinar diam ac augue vehicula commodo. Vivamus et nibh vitae lectus consectetur tempor. Curabitur cursus lacinia magna, in vulputate quam convallis id. Sed ac ante nisl.\r\n</p>\r\n<p>\r\nQuisque ut hendrerit mi. Sed feugiat aliquam justo, nec elementum enim blandit non. Ut tempor massa id augue mattis feugiat. Maecenas convallis mi augue, eu mattis leo bibendum ut. Nam sed rutrum dui, sed elementum magna. Suspendisse eu porta lorem. Maecenas euismod dui purus. Suspendisse ut ultricies elit, nec sodales ipsum.\r\n</p>\r\n<p>\r\nVestibulum tincidunt venenatis enim, vel rhoncus augue tincidunt et. Proin sollicitudin maximus libero vitae consectetur. Fusce tellus elit, placerat a augue posuere, gravida consequat mi. Morbi et risus ut orci ornare faucibus ac quis nunc. Donec sed finibus tellus. Etiam eu velit tincidunt, ultrices magna eu, facilisis dui. Nulla commodo pharetra tortor vitae congue. Phasellus tortor tellus, consectetur non velit lobortis, viverra efficitur velit. Sed volutpat risus eu cursus sagittis.\r\n</p>\r\n<p>\r\nCurabitur egestas bibendum leo, sit amet bibendum augue pellentesque et. Morbi maximus fringilla ipsum, et condimentum massa. Pellentesque fringilla tincidunt ligula. Cras neque erat, imperdiet sit amet quam ac, convallis placerat tellus. Phasellus egestas nisi hendrerit sem lobortis molestie. Vestibulum pharetra euismod ligula, ut sodales arcu ullamcorper vel. Fusce volutpat eget lectus vitae dignissim.\r\n</p>', '500000', '2018-07-17 00:00:00', '2018-07-24 00:00:00', 1, 0, '2018-07-17 00:00:00'),
(2, 3, 4, 'Posting Produk baby di Instagram', 'Client kami dari brand produk perawatan baby dan anak membutuhkan micro influencer dengan kriteria :\r\n1. Wanita \r\n2. Followers instagram minimal 1000\r\n3. Memiliki anak berusia maksimal 2 tahun\r\nInfluencer hanya cukup posting di Instagram saja. Pembayaran dengan sistem barter produk perawatan baby dan anak senilai ratusan ribu rupiah\r\nBagi yang berminat, bisa isi form ya. Terimakasih ', '200000', '2018-07-17 00:00:00', '2018-07-24 00:00:00', 1, 0, '2018-07-17 00:00:00'),
(3, 1, 3, 'Live Tweet Smartfreen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper lorem quis velit ornare cursus auctor non massa. In at fermentum augue, at porttitor tellus. Nulla volutpat erat id finibus viverra. Sed dapibus sem enim, at consectetur leo placerat vel. Ut ultricies, orci eu vehicula accumsan, velit metus aliquet odio, et interdum lectus diam ut ex. Mauris quis eleifend ex, nec interdum felis. Quisque ultrices est laoreet, semper turpis nec, tristique augue. Duis fermentum nec magna ac commodo. Phasellus lectus ipsum, finibus nec efficitur non, varius id massa. Cras mi neque, egestas in est at, pulvinar consectetur lorem.\r\n\r\nMorbi placerat orci eget odio dictum, non bibendum metus maximus. Vivamus ornare orci aliquam, posuere mi vel, lacinia metus. Sed sit amet velit dui. Proin ornare enim quis dignissim tincidunt. Sed a placerat felis. In a metus in nunc mollis commodo. Vivamus convallis sed orci eget viverra. Morbi eget velit condimentum, consectetur velit et, molestie risus. Quisque at fermentum risus, vitae sodales ipsum. Duis molestie feugiat tortor, non blandit libero mattis in. Mauris at euismod lorem. Sed ultrices lobortis libero et lobortis. In hendrerit sapien vel ullamcorper sodales. Praesent bibendum mi quis erat mollis rhoncus. Nunc porttitor, nulla a molestie ultrices, ligula mauris egestas nibh, viverra iaculis nunc urna eu tellus.\r\n\r\nAliquam ac rhoncus augue. In quis nulla a tortor pharetra tempor et ut orci. Aliquam auctor ornare lacinia. Vestibulum feugiat lectus enim, eget porttitor nibh tristique nec. Etiam quis aliquam nibh. Morbi facilisis, dolor eget hendrerit efficitur, est quam fermentum est, ac ultrices neque metus vitae nisi. Duis varius turpis non pulvinar tincidunt. Nunc sollicitudin leo mauris, et placerat mauris facilisis nec. In lacus nibh, vehicula vulputate ultricies ac, ultrices nec arcu.\r\n\r\nEtiam at sapien consectetur, scelerisque lectus ut, pretium ligula. Nam ut ipsum eget dolor rhoncus rutrum eu nec elit. Integer in ex mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices lacus eget purus blandit vehicula. Quisque vestibulum diam ligula, sit amet posuere ante faucibus non. Vivamus in dui sed sem posuere placerat.\r\n\r\nInteger ac ullamcorper sem. Nam vitae imperdiet metus. Nunc a molestie mauris. In hac habitasse platea dictumst. Sed in diam viverra, pretium diam vitae, faucibus neque. Ut a convallis felis, vitae lobortis quam. Mauris euismod odio nec mauris consectetur volutpat. Integer tempor nec dui nec suscipit. Duis sed elit a urna tristique pulvinar. Maecenas vitae faucibus mauris, id convallis mauris. Pellentesque in ultricies tortor, nec sagittis purus. Ut eros mi, dapibus in scelerisque vel, consectetur vel nibh. Nam suscipit justo est, eu varius ex semper eu. Nunc pellentesque consectetur pharetra. Pellentesque consectetur viverra orci, vel porttitor nulla tincidunt sed. Duis rhoncus efficitur rhoncus.', '800000', '2018-07-19 00:00:00', '2018-07-26 00:00:00', 1, 0, '2018-07-18 00:00:00'),
(4, 3, 1, 'Blogger untuk Acara Olahraga', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper lorem quis velit ornare cursus auctor non massa. In at fermentum augue, at porttitor tellus. Nulla volutpat erat id finibus viverra. Sed dapibus sem enim, at consectetur leo placerat vel. Ut ultricies, orci eu vehicula accumsan, velit metus aliquet odio, et interdum lectus diam ut ex. Mauris quis eleifend ex, nec interdum felis. Quisque ultrices est laoreet, semper turpis nec, tristique augue. Duis fermentum nec magna ac commodo. Phasellus lectus ipsum, finibus nec efficitur non, varius id massa. Cras mi neque, egestas in est at, pulvinar consectetur lorem.\r\n\r\nMorbi placerat orci eget odio dictum, non bibendum metus maximus. Vivamus ornare orci aliquam, posuere mi vel, lacinia metus. Sed sit amet velit dui. Proin ornare enim quis dignissim tincidunt. Sed a placerat felis. In a metus in nunc mollis commodo. Vivamus convallis sed orci eget viverra. Morbi eget velit condimentum, consectetur velit et, molestie risus. Quisque at fermentum risus, vitae sodales ipsum. Duis molestie feugiat tortor, non blandit libero mattis in. Mauris at euismod lorem. Sed ultrices lobortis libero et lobortis. In hendrerit sapien vel ullamcorper sodales. Praesent bibendum mi quis erat mollis rhoncus. Nunc porttitor, nulla a molestie ultrices, ligula mauris egestas nibh, viverra iaculis nunc urna eu tellus.\r\n\r\nAliquam ac rhoncus augue. In quis nulla a tortor pharetra tempor et ut orci. Aliquam auctor ornare lacinia. Vestibulum feugiat lectus enim, eget porttitor nibh tristique nec. Etiam quis aliquam nibh. Morbi facilisis, dolor eget hendrerit efficitur, est quam fermentum est, ac ultrices neque metus vitae nisi. Duis varius turpis non pulvinar tincidunt. Nunc sollicitudin leo mauris, et placerat mauris facilisis nec. In lacus nibh, vehicula vulputate ultricies ac, ultrices nec arcu.\r\n\r\nEtiam at sapien consectetur, scelerisque lectus ut, pretium ligula. Nam ut ipsum eget dolor rhoncus rutrum eu nec elit. Integer in ex mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices lacus eget purus blandit vehicula. Quisque vestibulum diam ligula, sit amet posuere ante faucibus non. Vivamus in dui sed sem posuere placerat.\r\n\r\nInteger ac ullamcorper sem. Nam vitae imperdiet metus. Nunc a molestie mauris. In hac habitasse platea dictumst. Sed in diam viverra, pretium diam vitae, faucibus neque. Ut a convallis felis, vitae lobortis quam. Mauris euismod odio nec mauris consectetur volutpat. Integer tempor nec dui nec suscipit. Duis sed elit a urna tristique pulvinar. Maecenas vitae faucibus mauris, id convallis mauris. Pellentesque in ultricies tortor, nec sagittis purus. Ut eros mi, dapibus in scelerisque vel, consectetur vel nibh. Nam suscipit justo est, eu varius ex semper eu. Nunc pellentesque consectetur pharetra. Pellentesque consectetur viverra orci, vel porttitor nulla tincidunt sed. Duis rhoncus efficitur rhoncus.', '500000', '2018-07-20 00:00:00', '2018-07-20 00:00:00', 1, 0, '2018-07-18 00:00:00'),
(5, 3, 2, 'VLOG untuk review produk hp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ullamcorper lorem quis velit ornare cursus auctor non massa. In at fermentum augue, at porttitor tellus. Nulla volutpat erat id finibus viverra. Sed dapibus sem enim, at consectetur leo placerat vel. Ut ultricies, orci eu vehicula accumsan, velit metus aliquet odio, et interdum lectus diam ut ex. Mauris quis eleifend ex, nec interdum felis. Quisque ultrices est laoreet, semper turpis nec, tristique augue. Duis fermentum nec magna ac commodo. Phasellus lectus ipsum, finibus nec efficitur non, varius id massa. Cras mi neque, egestas in est at, pulvinar consectetur lorem.\r\n\r\nMorbi placerat orci eget odio dictum, non bibendum metus maximus. Vivamus ornare orci aliquam, posuere mi vel, lacinia metus. Sed sit amet velit dui. Proin ornare enim quis dignissim tincidunt. Sed a placerat felis. In a metus in nunc mollis commodo. Vivamus convallis sed orci eget viverra. Morbi eget velit condimentum, consectetur velit et, molestie risus. Quisque at fermentum risus, vitae sodales ipsum. Duis molestie feugiat tortor, non blandit libero mattis in. Mauris at euismod lorem. Sed ultrices lobortis libero et lobortis. In hendrerit sapien vel ullamcorper sodales. Praesent bibendum mi quis erat mollis rhoncus. Nunc porttitor, nulla a molestie ultrices, ligula mauris egestas nibh, viverra iaculis nunc urna eu tellus.\r\n\r\nAliquam ac rhoncus augue. In quis nulla a tortor pharetra tempor et ut orci. Aliquam auctor ornare lacinia. Vestibulum feugiat lectus enim, eget porttitor nibh tristique nec. Etiam quis aliquam nibh. Morbi facilisis, dolor eget hendrerit efficitur, est quam fermentum est, ac ultrices neque metus vitae nisi. Duis varius turpis non pulvinar tincidunt. Nunc sollicitudin leo mauris, et placerat mauris facilisis nec. In lacus nibh, vehicula vulputate ultricies ac, ultrices nec arcu.\r\n\r\nEtiam at sapien consectetur, scelerisque lectus ut, pretium ligula. Nam ut ipsum eget dolor rhoncus rutrum eu nec elit. Integer in ex mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultrices lacus eget purus blandit vehicula. Quisque vestibulum diam ligula, sit amet posuere ante faucibus non. Vivamus in dui sed sem posuere placerat.\r\n\r\nInteger ac ullamcorper sem. Nam vitae imperdiet metus. Nunc a molestie mauris. In hac habitasse platea dictumst. Sed in diam viverra, pretium diam vitae, faucibus neque. Ut a convallis felis, vitae lobortis quam. Mauris euismod odio nec mauris consectetur volutpat. Integer tempor nec dui nec suscipit. Duis sed elit a urna tristique pulvinar. Maecenas vitae faucibus mauris, id convallis mauris. Pellentesque in ultricies tortor, nec sagittis purus. Ut eros mi, dapibus in scelerisque vel, consectetur vel nibh. Nam suscipit justo est, eu varius ex semper eu. Nunc pellentesque consectetur pharetra. Pellentesque consectetur viverra orci, vel porttitor nulla tincidunt sed. Duis rhoncus efficitur rhoncus.', '1000000', '2018-07-20 00:00:00', '2018-07-27 00:00:00', 1, 0, '2018-07-18 06:00:00'),
(6, 3, 1, 'Review HP A Terbaru', 'dicari blogger dengan kriteria \r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur auctor fringilla nulla at lacinia. Fusce ultricies nibh id mi venenatis condimentum a sit amet tortor. Nulla facilisis, sem et interdum hendrerit, mauris augue sagittis urna, nec venenatis libero diam a ipsum. Sed sit amet condimentum metus, ut rhoncus est. Ut convallis elementum ullamcorper. Cras egestas porttitor quam, facilisis rhoncus enim efficitur nec. Quisque fermentum quis mauris id ullamcorper. Mauris accumsan pharetra mauris, sed tristique augue lobortis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus ac orci nec enim varius accumsan. Sed viverra et est quis viverra. Morbi a euismod nulla. Aenean euismod porta odio. Maecenas nec ante quis enim pulvinar bibendum vitae ac neque. Donec efficitur mattis sollicitudin. Donec ut malesuada dolor.\r\n</p>\r\n<p>\r\nMaecenas accumsan justo eu massa aliquam, ut interdum velit tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget nisl ut nulla lacinia euismod non et quam. Suspendisse consectetur libero eu purus porttitor lacinia. Nullam vestibulum, lacus non porta ultricies, diam est placerat enim, ac bibendum est felis at tellus. Proin porttitor purus non tellus fringilla dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer pulvinar diam ac augue vehicula commodo. Vivamus et nibh vitae lectus consectetur tempor. Curabitur cursus lacinia magna, in vulputate quam convallis id. Sed ac ante nisl.\r\n</p>\r\n<p>\r\nQuisque ut hendrerit mi. Sed feugiat aliquam justo, nec elementum enim blandit non. Ut tempor massa id augue mattis feugiat. Maecenas convallis mi augue, eu mattis leo bibendum ut. Nam sed rutrum dui, sed elementum magna. Suspendisse eu porta lorem. Maecenas euismod dui purus. Suspendisse ut ultricies elit, nec sodales ipsum.\r\n</p>\r\n<p>\r\nVestibulum tincidunt venenatis enim, vel rhoncus augue tincidunt et. Proin sollicitudin maximus libero vitae consectetur. Fusce tellus elit, placerat a augue posuere, gravida consequat mi. Morbi et risus ut orci ornare faucibus ac quis nunc. Donec sed finibus tellus. Etiam eu velit tincidunt, ultrices magna eu, facilisis dui. Nulla commodo pharetra tortor vitae congue. Phasellus tortor tellus, consectetur non velit lobortis, viverra efficitur velit. Sed volutpat risus eu cursus sagittis.\r\n</p>\r\n<p>\r\nCurabitur egestas bibendum leo, sit amet bibendum augue pellentesque et. Morbi maximus fringilla ipsum, et condimentum massa. Pellentesque fringilla tincidunt ligula. Cras neque erat, imperdiet sit amet quam ac, convallis placerat tellus. Phasellus egestas nisi hendrerit sem lobortis molestie. Vestibulum pharetra euismod ligula, ut sodales arcu ullamcorper vel. Fusce volutpat eget lectus vitae dignissim.\r\n</p>', '500000', '2018-07-24 13:00:00', '2018-07-24 13:00:00', 1, 0, '2018-07-24 00:00:00'),
(7, 1, 4, 'Posting Produk Makanan', 'posting produk makanan\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur auctor fringilla nulla at lacinia. Fusce ultricies nibh id mi venenatis condimentum a sit amet tortor. Nulla facilisis, sem et interdum hendrerit, mauris augue sagittis urna, nec venenatis libero diam a ipsum. Sed sit amet condimentum metus, ut rhoncus est. Ut convallis elementum ullamcorper. Cras egestas porttitor quam, facilisis rhoncus enim efficitur nec. Quisque fermentum quis mauris id ullamcorper. Mauris accumsan pharetra mauris, sed tristique augue lobortis vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus ac orci nec enim varius accumsan. Sed viverra et est quis viverra. Morbi a euismod nulla. Aenean euismod porta odio. Maecenas nec ante quis enim pulvinar bibendum vitae ac neque. Donec efficitur mattis sollicitudin. Donec ut malesuada dolor.\r\n</p>\r\n<p>\r\nMaecenas accumsan justo eu massa aliquam, ut interdum velit tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus eget nisl ut nulla lacinia euismod non et quam. Suspendisse consectetur libero eu purus porttitor lacinia. Nullam vestibulum, lacus non porta ultricies, diam est placerat enim, ac bibendum est felis at tellus. Proin porttitor purus non tellus fringilla dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer pulvinar diam ac augue vehicula commodo. Vivamus et nibh vitae lectus consectetur tempor. Curabitur cursus lacinia magna, in vulputate quam convallis id. Sed ac ante nisl.\r\n</p>\r\n<p>\r\nQuisque ut hendrerit mi. Sed feugiat aliquam justo, nec elementum enim blandit non. Ut tempor massa id augue mattis feugiat. Maecenas convallis mi augue, eu mattis leo bibendum ut. Nam sed rutrum dui, sed elementum magna. Suspendisse eu porta lorem. Maecenas euismod dui purus. Suspendisse ut ultricies elit, nec sodales ipsum.\r\n</p>\r\n<p>\r\nVestibulum tincidunt venenatis enim, vel rhoncus augue tincidunt et. Proin sollicitudin maximus libero vitae consectetur. Fusce tellus elit, placerat a augue posuere, gravida consequat mi. Morbi et risus ut orci ornare faucibus ac quis nunc. Donec sed finibus tellus. Etiam eu velit tincidunt, ultrices magna eu, facilisis dui. Nulla commodo pharetra tortor vitae congue. Phasellus tortor tellus, consectetur non velit lobortis, viverra efficitur velit. Sed volutpat risus eu cursus sagittis.\r\n</p>\r\n<p>\r\nCurabitur egestas bibendum leo, sit amet bibendum augue pellentesque et. Morbi maximus fringilla ipsum, et condimentum massa. Pellentesque fringilla tincidunt ligula. Cras neque erat, imperdiet sit amet quam ac, convallis placerat tellus. Phasellus egestas nisi hendrerit sem lobortis molestie. Vestibulum pharetra euismod ligula, ut sodales arcu ullamcorper vel. Fusce volutpat eget lectus vitae dignissim.\r\n</p>', '350000', '2018-07-24 05:00:00', '2018-07-24 06:00:00', 1, 0, '2018-07-24 00:00:00'),
(8, 4, 3, 'live twit acara peluncuran A', 'live twit acara peluncuran A\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sodales efficitur metus, vitae suscipit nisl bibendum in. Morbi euismod orci a vulputate convallis. Duis vulputate eleifend facilisis. Sed ut mi et orci aliquam euismod in ut leo. Proin scelerisque mi sit amet sapien interdum, non ultrices nunc egestas. Etiam gravida justo ut justo porta, vel hendrerit nisi iaculis. Sed placerat turpis ut magna volutpat, id volutpat odio convallis. Suspendisse potenti. Donec egestas lectus in lacus fermentum feugiat. Etiam at scelerisque felis, quis eleifend nulla.\r\n</p>\r\n<p>\r\nMaecenas sed lacus est. Fusce ipsum nulla, egestas eu massa scelerisque, egestas suscipit neque. Quisque bibendum varius tellus eu tincidunt. Donec suscipit quam sed velit fermentum interdum. Nullam euismod, erat pellentesque convallis vulputate, turpis est blandit arcu, id efficitur libero libero a mi. Nulla iaculis consectetur commodo. Aliquam erat volutpat. Curabitur eget hendrerit dui. Quisque diam mi, tempus in libero et, dapibus feugiat ligula. Duis luctus dignissim turpis, nec tristique dui euismod sit amet. Duis porttitor non augue sit amet facilisis. Donec at libero semper, efficitur eros a, accumsan orci. Aenean eu sollicitudin sapien, ac vestibulum ligula. Phasellus rhoncus tempor maximus. Aliquam placerat imperdiet tincidunt.\r\n</p>\r\n<p>\r\nDuis condimentum aliquam sapien, vel egestas dolor egestas quis. Aenean tempus, erat id condimentum vulputate, justo nulla sagittis quam, non commodo tellus lorem vitae est. Maecenas dignissim enim eu erat dignissim, nec porttitor est lobortis. Suspendisse molestie fringilla tortor, laoreet interdum odio pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras magna sapien, elementum eget ex non, cursus euismod odio. Phasellus porta ligula tellus, eu maximus tellus venenatis sed.\r\n</p>\r\n<p>\r\nEtiam convallis nibh et sodales rutrum. Vestibulum at pellentesque tortor, vel tincidunt neque. Nunc mattis congue est, sed tempus sem convallis nec. Donec tristique, tellus eu rutrum luctus, ipsum libero consequat eros, pretium aliquet ante ipsum ac ante. Donec lacus nibh, cursus in est at, accumsan sodales purus. Pellentesque vestibulum mauris et nulla vulputate, eget vulputate felis aliquam. Nulla pharetra ante at lacus venenatis pharetra. Aliquam malesuada erat in orci aliquet sagittis. Fusce accumsan semper lacus quis porttitor. Duis facilisis justo a eros laoreet vehicula. Quisque diam ligula, lacinia vitae interdum sed, tincidunt id neque. Ut eleifend turpis mi. Proin cursus eu sapien ac lacinia. Vivamus dignissim pharetra arcu sed rutrum. Nullam commodo tortor fringilla orci imperdiet hendrerit.\r\n</p>\r\n<p>\r\nNunc in orci id dolor tempus elementum. Quisque a consectetur arcu. Mauris pretium tempus commodo. Sed tempus nunc a mi efficitur, in commodo nibh vehicula. Pellentesque id nibh sit amet sem interdum cursus non malesuada purus. Etiam commodo mauris eu est cursus, vel viverra lacus bibendum. Nullam tincidunt enim facilisis, pulvinar metus et, tempor nulla. Nulla sapien risus, cursus nec interdum et, volutpat in felis. Vivamus ultrices magna at dui molestie, ac aliquam libero rhoncus. Nulla libero metus, feugiat vel elit at, malesuada consequat odio. Aliquam a pellentesque urna. Nulla egestas augue tellus, in vestibulum orci molestie finibus. Pellentesque volutpat, augue a luctus posuere, purus tortor lacinia risus, nec dictum dui mi eu augue. Nunc sit amet enim leo.\r\n</p>', '150000', '2018-07-24 00:00:00', '2018-07-31 00:00:00', 1, 0, '2018-07-23 00:00:00'),
(9, 5, 2, 'butuh video creator ', 'membuat video dan upload ke akun channelnya dengan syarat\r\n\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sodales efficitur metus, vitae suscipit nisl bibendum in. Morbi euismod orci a vulputate convallis. Duis vulputate eleifend facilisis. Sed ut mi et orci aliquam euismod in ut leo. Proin scelerisque mi sit amet sapien interdum, non ultrices nunc egestas. Etiam gravida justo ut justo porta, vel hendrerit nisi iaculis. Sed placerat turpis ut magna volutpat, id volutpat odio convallis. Suspendisse potenti. Donec egestas lectus in lacus fermentum feugiat. Etiam at scelerisque felis, quis eleifend nulla.\r\n</p>\r\n<p>\r\nMaecenas sed lacus est. Fusce ipsum nulla, egestas eu massa scelerisque, egestas suscipit neque. Quisque bibendum varius tellus eu tincidunt. Donec suscipit quam sed velit fermentum interdum. Nullam euismod, erat pellentesque convallis vulputate, turpis est blandit arcu, id efficitur libero libero a mi. Nulla iaculis consectetur commodo. Aliquam erat volutpat. Curabitur eget hendrerit dui. Quisque diam mi, tempus in libero et, dapibus feugiat ligula. Duis luctus dignissim turpis, nec tristique dui euismod sit amet. Duis porttitor non augue sit amet facilisis. Donec at libero semper, efficitur eros a, accumsan orci. Aenean eu sollicitudin sapien, ac vestibulum ligula. Phasellus rhoncus tempor maximus. Aliquam placerat imperdiet tincidunt.\r\n</p>\r\n<p>\r\nDuis condimentum aliquam sapien, vel egestas dolor egestas quis. Aenean tempus, erat id condimentum vulputate, justo nulla sagittis quam, non commodo tellus lorem vitae est. Maecenas dignissim enim eu erat dignissim, nec porttitor est lobortis. Suspendisse molestie fringilla tortor, laoreet interdum odio pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras magna sapien, elementum eget ex non, cursus euismod odio. Phasellus porta ligula tellus, eu maximus tellus venenatis sed.\r\n</p>\r\n<p>\r\nEtiam convallis nibh et sodales rutrum. Vestibulum at pellentesque tortor, vel tincidunt neque. Nunc mattis congue est, sed tempus sem convallis nec. Donec tristique, tellus eu rutrum luctus, ipsum libero consequat eros, pretium aliquet ante ipsum ac ante. Donec lacus nibh, cursus in est at, accumsan sodales purus. Pellentesque vestibulum mauris et nulla vulputate, eget vulputate felis aliquam. Nulla pharetra ante at lacus venenatis pharetra. Aliquam malesuada erat in orci aliquet sagittis. Fusce accumsan semper lacus quis porttitor. Duis facilisis justo a eros laoreet vehicula. Quisque diam ligula, lacinia vitae interdum sed, tincidunt id neque. Ut eleifend turpis mi. Proin cursus eu sapien ac lacinia. Vivamus dignissim pharetra arcu sed rutrum. Nullam commodo tortor fringilla orci imperdiet hendrerit.\r\n</p>\r\n<p>\r\nNunc in orci id dolor tempus elementum. Quisque a consectetur arcu. Mauris pretium tempus commodo. Sed tempus nunc a mi efficitur, in commodo nibh vehicula. Pellentesque id nibh sit amet sem interdum cursus non malesuada purus. Etiam commodo mauris eu est cursus, vel viverra lacus bibendum. Nullam tincidunt enim facilisis, pulvinar metus et, tempor nulla. Nulla sapien risus, cursus nec interdum et, volutpat in felis. Vivamus ultrices magna at dui molestie, ac aliquam libero rhoncus. Nulla libero metus, feugiat vel elit at, malesuada consequat odio. Aliquam a pellentesque urna. Nulla egestas augue tellus, in vestibulum orci molestie finibus. Pellentesque volutpat, augue a luctus posuere, purus tortor lacinia risus, nec dictum dui mi eu augue. Nunc sit amet enim leo.\r\n</p>', '800000', '2018-07-24 00:00:00', '2018-07-31 00:00:00', 1, 0, '2018-07-24 00:00:00'),
(10, 4, 2, 'KOmentari Video youtube Saya', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sodales efficitur metus, vitae suscipit nisl bibendum in. Morbi euismod orci a vulputate convallis. Duis vulputate eleifend facilisis. Sed ut mi et orci aliquam euismod in ut leo. Proin scelerisque mi sit amet sapien interdum, non ultrices nunc egestas. Etiam gravida justo ut justo porta, vel hendrerit nisi iaculis. Sed placerat turpis ut magna volutpat, id volutpat odio convallis. Suspendisse potenti. Donec egestas lectus in lacus fermentum feugiat. Etiam at scelerisque felis, quis eleifend nulla.\r\n</p>\r\n<p>\r\nMaecenas sed lacus est. Fusce ipsum nulla, egestas eu massa scelerisque, egestas suscipit neque. Quisque bibendum varius tellus eu tincidunt. Donec suscipit quam sed velit fermentum interdum. Nullam euismod, erat pellentesque convallis vulputate, turpis est blandit arcu, id efficitur libero libero a mi. Nulla iaculis consectetur commodo. Aliquam erat volutpat. Curabitur eget hendrerit dui. Quisque diam mi, tempus in libero et, dapibus feugiat ligula. Duis luctus dignissim turpis, nec tristique dui euismod sit amet. Duis porttitor non augue sit amet facilisis. Donec at libero semper, efficitur eros a, accumsan orci. Aenean eu sollicitudin sapien, ac vestibulum ligula. Phasellus rhoncus tempor maximus. Aliquam placerat imperdiet tincidunt.\r\n</p>\r\n<p>\r\nDuis condimentum aliquam sapien, vel egestas dolor egestas quis. Aenean tempus, erat id condimentum vulputate, justo nulla sagittis quam, non commodo tellus lorem vitae est. Maecenas dignissim enim eu erat dignissim, nec porttitor est lobortis. Suspendisse molestie fringilla tortor, laoreet interdum odio pulvinar euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras magna sapien, elementum eget ex non, cursus euismod odio. Phasellus porta ligula tellus, eu maximus tellus venenatis sed.\r\n</p>\r\n<p>\r\nEtiam convallis nibh et sodales rutrum. Vestibulum at pellentesque tortor, vel tincidunt neque. Nunc mattis congue est, sed tempus sem convallis nec. Donec tristique, tellus eu rutrum luctus, ipsum libero consequat eros, pretium aliquet ante ipsum ac ante. Donec lacus nibh, cursus in est at, accumsan sodales purus. Pellentesque vestibulum mauris et nulla vulputate, eget vulputate felis aliquam. Nulla pharetra ante at lacus venenatis pharetra. Aliquam malesuada erat in orci aliquet sagittis. Fusce accumsan semper lacus quis porttitor. Duis facilisis justo a eros laoreet vehicula. Quisque diam ligula, lacinia vitae interdum sed, tincidunt id neque. Ut eleifend turpis mi. Proin cursus eu sapien ac lacinia. Vivamus dignissim pharetra arcu sed rutrum. Nullam commodo tortor fringilla orci imperdiet hendrerit.\r\n</p>\r\n<p>\r\nNunc in orci id dolor tempus elementum. Quisque a consectetur arcu. Mauris pretium tempus commodo. Sed tempus nunc a mi efficitur, in commodo nibh vehicula. Pellentesque id nibh sit amet sem interdum cursus non malesuada purus. Etiam commodo mauris eu est cursus, vel viverra lacus bibendum. Nullam tincidunt enim facilisis, pulvinar metus et, tempor nulla. Nulla sapien risus, cursus nec interdum et, volutpat in felis. Vivamus ultrices magna at dui molestie, ac aliquam libero rhoncus. Nulla libero metus, feugiat vel elit at, malesuada consequat odio. Aliquam a pellentesque urna. Nulla egestas augue tellus, in vestibulum orci molestie finibus. Pellentesque volutpat, augue a luctus posuere, purus tortor lacinia risus, nec dictum dui mi eu augue. Nunc sit amet enim leo.\r\n</p>', '100000', '2018-07-24 00:00:00', '2018-07-31 00:00:00', 1, 0, '2018-07-23 12:00:00'),
(11, 5, 3, 'Ngetwit seharian tentang roti kami', 'kami meninginkan seorang influencer yang hobi dengan kuliner untuk ngetweet seharian tetnang produk roti kami \r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at augue tempor, auctor metus vel, imperdiet mi. Cras ac magna ut ex consectetur sollicitudin at at arcu. Ut venenatis ex non est tincidunt, sed ullamcorper dolor bibendum. Vivamus porttitor urna rhoncus ex semper, et consectetur mauris egestas. Quisque scelerisque efficitur posuere. Nulla erat odio, suscipit nec scelerisque ac, vulputate in sem. Duis posuere nisi sit amet felis gravida, quis feugiat tortor maximus. Proin ornare vitae neque ut sollicitudin. Cras varius eget diam sit amet tristique. Vestibulum id malesuada augue, sed consectetur lectus. Nunc sed interdum felis, non aliquet lacus.\r\n</p>\r\n<p>\r\nCras vel hendrerit velit. Nulla placerat, nibh in accumsan commodo, tortor libero egestas quam, vel facilisis leo ex nec urna. Nullam eget consectetur leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer tristique rhoncus mattis. Sed ornare eu justo at ultrices. Morbi quis quam sit amet massa porttitor hendrerit. Praesent varius sem in lorem eleifend, a hendrerit ligula gravida. Sed dictum rutrum enim sit amet pharetra.\r\n</p>', '850000', '2018-07-26 00:00:00', '2018-08-02 00:00:00', 1, 0, '2018-07-25 07:00:00'),
(12, 3, 4, 'Share Keseruan Moemenmu dan Uplaod Ke instagram', 'Kami mencari 3 Influencer dengan kriteria instagram min 2k Follower dantuk membuat foto menarik tetnang produk kami kemudian upload ke akun instagram masing masing. dan mention bebrapa teman menggunakan hastag #carimakan\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at augue tempor, auctor metus vel, imperdiet mi. Cras ac magna ut ex consectetur sollicitudin at at arcu. Ut venenatis ex non est tincidunt, sed ullamcorper dolor bibendum. Vivamus porttitor urna rhoncus ex semper, et consectetur mauris egestas. Quisque scelerisque efficitur posuere. Nulla erat odio, suscipit nec scelerisque ac, vulputate in sem. Duis posuere nisi sit amet felis gravida, quis feugiat tortor maximus. Proin ornare vitae neque ut sollicitudin. Cras varius eget diam sit amet tristique. Vestibulum id malesuada augue, sed consectetur lectus. Nunc sed interdum felis, non aliquet lacus.\r\n</p>\r\n<p>\r\nCras vel hendrerit velit. Nulla placerat, nibh in accumsan commodo, tortor libero egestas quam, vel facilisis leo ex nec urna. Nullam eget consectetur leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer tristique rhoncus mattis. Sed ornare eu justo at ultrices. Morbi quis quam sit amet massa porttitor hendrerit. Praesent varius sem in lorem eleifend, a hendrerit ligula gravida. Sed dictum rutrum enim sit amet pharetra.\r\n</p>', '1500000', '2018-07-27 00:00:00', '2018-08-03 00:00:00', 1, 0, '2018-07-25 15:00:00'),
(13, 6, 1, 'Tulis Artikel Review HP Somay', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at augue tempor, auctor metus vel, imperdiet mi. Cras ac magna ut ex consectetur sollicitudin at at arcu. Ut venenatis ex non est tincidunt, sed ullamcorper dolor bibendum. Vivamus porttitor urna rhoncus ex semper, et consectetur mauris egestas. Quisque scelerisque efficitur posuere. Nulla erat odio, suscipit nec scelerisque ac, vulputate in sem. Duis posuere nisi sit amet felis gravida, quis feugiat tortor maximus. Proin ornare vitae neque ut sollicitudin. Cras varius eget diam sit amet tristique. Vestibulum id malesuada augue, sed consectetur lectus. Nunc sed interdum felis, non aliquet lacus.\r\n</p>\r\n<p>\r\nCras vel hendrerit velit. Nulla placerat, nibh in accumsan commodo, tortor libero egestas quam, vel facilisis leo ex nec urna. Nullam eget consectetur leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer tristique rhoncus mattis. Sed ornare eu justo at ultrices. Morbi quis quam sit amet massa porttitor hendrerit. Praesent varius sem in lorem eleifend, a hendrerit ligula gravida. Sed dictum rutrum enim sit amet pharetra.\r\n</p>', '450000', '2018-07-28 00:00:00', '2018-08-04 00:00:00', 1, 0, '2018-07-25 16:00:00'),
(14, 6, 4, 'Posting Review HP Somay', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at augue tempor, auctor metus vel, imperdiet mi. Cras ac magna ut ex consectetur sollicitudin at at arcu. Ut venenatis ex non est tincidunt, sed ullamcorper dolor bibendum. Vivamus porttitor urna rhoncus ex semper, et consectetur mauris egestas. Quisque scelerisque efficitur posuere. Nulla erat odio, suscipit nec scelerisque ac, vulputate in sem. Duis posuere nisi sit amet felis gravida, quis feugiat tortor maximus. Proin ornare vitae neque ut sollicitudin. Cras varius eget diam sit amet tristique. Vestibulum id malesuada augue, sed consectetur lectus. Nunc sed interdum felis, non aliquet lacus.\r\n</p>\r\n<p>\r\nCras vel hendrerit velit. Nulla placerat, nibh in accumsan commodo, tortor libero egestas quam, vel facilisis leo ex nec urna. Nullam eget consectetur leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer tristique rhoncus mattis. Sed ornare eu justo at ultrices. Morbi quis quam sit amet massa porttitor hendrerit. Praesent varius sem in lorem eleifend, a hendrerit ligula gravida. Sed dictum rutrum enim sit amet pharetra.\r\n</p>', '850000', '2018-07-28 00:00:00', '2018-07-28 00:00:00', 1, 0, '2018-07-25 13:00:00'),
(15, 6, 2, 'Unboxing dan Review HP SOMAY', '<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at augue tempor, auctor metus vel, imperdiet mi. Cras ac magna ut ex consectetur sollicitudin at at arcu. Ut venenatis ex non est tincidunt, sed ullamcorper dolor bibendum. Vivamus porttitor urna rhoncus ex semper, et consectetur mauris egestas. Quisque scelerisque efficitur posuere. Nulla erat odio, suscipit nec scelerisque ac, vulputate in sem. Duis posuere nisi sit amet felis gravida, quis feugiat tortor maximus. Proin ornare vitae neque ut sollicitudin. Cras varius eget diam sit amet tristique. Vestibulum id malesuada augue, sed consectetur lectus. Nunc sed interdum felis, non aliquet lacus.\r\n</p>\r\n<p>\r\nCras vel hendrerit velit. Nulla placerat, nibh in accumsan commodo, tortor libero egestas quam, vel facilisis leo ex nec urna. Nullam eget consectetur leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer tristique rhoncus mattis. Sed ornare eu justo at ultrices. Morbi quis quam sit amet massa porttitor hendrerit. Praesent varius sem in lorem eleifend, a hendrerit ligula gravida. Sed dictum rutrum enim sit amet pharetra.\r\n</p>', '1200000', '2018-07-27 00:00:00', '2018-08-03 00:00:00', 1, 0, '2018-07-25 16:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`id_influencer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lapor_proyek`
--
ALTER TABLE `lapor_proyek`
  ADD PRIMARY KEY (`id_laporproyek`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pembayaran_influencer`
--
ALTER TABLE `pembayaran_influencer`
  ADD PRIMARY KEY (`id_pembayaraninf`);

--
-- Indexes for table `pembayaran_proyek`
--
ALTER TABLE `pembayaran_proyek`
  ADD PRIMARY KEY (`id_pembayaranproyek`);

--
-- Indexes for table `pengembalian_uang`
--
ALTER TABLE `pengembalian_uang`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `profil_influencer`
--
ALTER TABLE `profil_influencer`
  ADD PRIMARY KEY (`id_profilinf`),
  ADD KEY `id_influencer` (`id_influencer`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`id_profilper`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_influencer` (`id_influencer`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `influencer`
--
ALTER TABLE `influencer`
  MODIFY `id_influencer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lapor_proyek`
--
ALTER TABLE `lapor_proyek`
  MODIFY `id_laporproyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_influencer`
--
ALTER TABLE `pembayaran_influencer`
  MODIFY `id_pembayaraninf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_proyek`
--
ALTER TABLE `pembayaran_proyek`
  MODIFY `id_pembayaranproyek` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian_uang`
--
ALTER TABLE `pengembalian_uang`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil_influencer`
--
ALTER TABLE `profil_influencer`
  MODIFY `id_profilinf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  MODIFY `id_profilper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profil_influencer`
--
ALTER TABLE `profil_influencer`
  ADD CONSTRAINT `profil_influencer_ibfk_1` FOREIGN KEY (`id_influencer`) REFERENCES `influencer` (`id_influencer`);

--
-- Constraints for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD CONSTRAINT `profil_perusahaan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`id_influencer`) REFERENCES `influencer` (`id_influencer`),
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
