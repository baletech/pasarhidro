-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 12:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasarhidro`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'hairulhamdani88@gmail.com', 'HAIRUL88', 'HAIRUL', '081805617821'),
(2, 'danialpurnafiki88@gmail.com', 'DANIAL88', 'DANIAL', '083199584999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_address` text DEFAULT NULL,
  `kode_verifikasi` varchar(5) NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `kode_verifikasi`, `status_verifikasi`) VALUES
(1, 'Hairul Hamdani.LC', 'admin', 'admin', '+6281805617821', 'hairulhamdani77@gmail.com', 'Jl.otak Kokok Joben, Kce.montong Gading, Kabupaten Lombok Timur, NUSA TENGGARA BARAT.', '', 0),
(2, NULL, '90809', 'iiii', 'zxzx', NULL, NULL, '', 0),
(3, NULL, '001', '123', '001', NULL, NULL, '12345', 0),
(4, NULL, '002', '123', '002', NULL, NULL, '12345', 0),
(5, NULL, '', '123', '', NULL, NULL, '12345', 0),
(6, NULL, '083', '123', '083', NULL, NULL, '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_descriptio` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `admin_id`, `category_name`, `product_name`, `product_price`, `product_descriptio`, `product_image`, `product_status`, `date_created`) VALUES
(46, 0, '', 'pupuk biolk', 30000, '<p>BIOLK<br />\r\nMerupakan pupuk hayati dengan bahan aktif bakteri Bacillus sp. dan Pseudomonas sp. yang diaplikasikan untuk seed treatment dan dapat digunakan pada semua benih tanaman. BIO LK diformulasikan khusus untuk membantu tanaman dalam menghadapi cekaman kekeringan atau kadar air rendah. BIO LK berbentuk powder, berwarna coklat kehitaman dan memiliki variasi kemasan 100 gr, 250 gr dan 500 gr. BIO LK diaplikasikan dengan dosis 500 gr untuk kebutuhan benih 1 hektar.</p>\r\n', 'produk1657113168.png', 1, '2022-07-06 13:12:48'),
(48, 0, '', 'pupuk biosalin', 100000, '<p>BIO SALIN<br />\r\nMerupakan pupuk hayati dengan bahan aktif bakteri Pseudomonas sp. yang diaplikasikan untuk seed treatment dan dapat digunakan pada semua benih tanaman. BIO Salin diformulasikan khusus untuk membantu tanaman dalam menghadapi cekaman kadar garam tinggi (salin), seperti di wilayah pesisir pantai dan di lahan tergenang (rawa)..BIO Salin berbentuk powder, berwarna coklat kehitaman dan memiliki variasi kemasan 100 gr, 250 gr dan 500 gr. BIO Salin diaplikasikan dengan dosis 500 gr untuk kebutuhan benih 1 hektar.</p>\r\n', 'produk1657113313.png', 1, '2022-07-06 13:15:13'),
(49, 0, '', 'pupuk ecofert', 85000, '<p>Merupakan jenis pupuk hayati yang diperkaya dengan mikroorganisme unggulan yang bermanfaat bagi kesuburan tanah, dan dapat digunakan untuk tanaman pangan, hortikultura dan perkebunan. Butiran Ecofert berbentuk granul, berwarna abu-abu, dengan variasi kemasan 1 kg, 5 kg, dan 20 kg. Ecofert mengandung bahan aktif Aspergillus niger, Pseudomonas mendocina, Bacillus subtilis dan Bacollus flexus. Beberapa keunggulan yang didapat melalui penggunaan Ecofert adalah untuk meningkatkan tersedianya unsur hara N dan P, memacu pertumbuhan tanaman, meningkatkan penyerapan unsur hara tanah, dan meningkatkan efisiensi pemupukan sehingga dapat menghemat pupuk NPK hingga 25% dari dosis standar dengan dosis pemakaian Ecofert 20-40 kg/ha pada saat pengolahan tanah</p>\r\n', 'produk1657113416.jpg', 1, '2022-07-06 13:16:56'),
(51, 0, '', 'pupuk biodex', 250000, '<p>Merupakan bioaktivator perombak bahan organik. Biodex dibuat dengan menggunakan bahan aktif mikroba unggul yang memiliki kemampuan selulotik dan lignolitik tinggi seperti Trichoderma polysporum, T. viride, dan Fomitopsis meliae, sehingga waktu pengomposan relatif lebih singkat. Biodex berbentuk bubuk (powder) berwarna coklat kehitaman dan saat ini dijual dalam kemasan 2,5 kg. Biodex memiliki beberapa keunggulan, yaitu sesuai untuk limbah organik padat, tidak membutuhkan tambahan nutrisi, tidak perlu dilakukan pembalikan pada saat proses pengomposan dan sesuai untuk daerah tropis, dengan dosis pemakaian 2,5-5 kg/ton bahan organik.</p>\r\n', 'produk1657113583.jpg', 1, '2022-07-06 13:19:43'),
(52, 0, '', 'Pupuk biotara', 30000, '<p>Merupakan Pupuk Hayati yang adaptif dengan tanah masam di lahan rawa yang mampu meningkatkan produktivitas tanaman. Biotara mengandung bahan aktif Trichoderma sp., Bacillus sp, dan Azospirillum sp. Biotara berbentuk powder, berwarna coklat kehitaman, dengan variasi kemasan 2,5 kg, 10 kg dan 12,5 kg. Beberapa keunggulan dari Biotara antara lain, mampu mengikat unsur hara N dan P dalam tanah, mendekomposisi sisa-sisa bahan organik, meningkatkan pertumbuhan tanaman, peningkatan efisiensi pemupukan terutama N dan P hingga 30% dan meningkatkan hasil panen padi hingga 20% pada lahan rawa. Dosis pemakaian Biotara adalah 25 kg/ha saat pengolahan tanah.</p>\r\n', 'produk1657113677.png', 1, '2022-07-06 13:21:17'),
(54, 0, '', 'pupuk amoniak', 250000, '<p>Amoniak digunakan sebagai bahan mentah dalam industri kimia. Amoniak produksi Pupuk Kaltim dipasarkan dalam bentuk cair pada suhu -33 derajat Celsius dengan kemurnian minimal 99,5% dan campuran (impurity) berupa air maksimal 0,5%. Amoniak dibuat dari bahan baku gas bumi yang direaksikan dengan udara dan uap air yang diproses pada suhu dan tekanan tinggi secara bertahap melalui beberapa reaktor yang mengandung katalis. Pupuk Kaltim memiliki 5 (lima) pabrik Amoniak, yaitu Pabrik 1A, Pabrik 2, Pabrik 3, Pabrik 4, dan Pabrik 5. Kapasitas total mencapai 2,74 juta ton Amoniak per tahun.</p>\r\n', 'produk1657114058.jpg', 1, '2022-07-06 13:27:38'),
(55, 0, '', 'pnk', 10000, 'bjhsvucvuyv\"', 'produk1657273030.jpg', 1, '2022-07-08 09:37:10'),
(56, 0, '', 'Organik', 5000, 'Bla Bla Bla', 'produk1658988911.jpg', 1, '2022-07-28 06:15:11'),
(57, 6, '', 'Strawbery', 20000, 'Strawbery merupakan buah, berwarna merah, berasa manis, dan dapat dimakan.', 'produk1660935818.png', 1, '2022-08-19 19:03:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
