-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 09.29
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rkh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(128) NOT NULL,
  `price` varchar(256) NOT NULL,
  `product_image` varchar(128) NOT NULL,
  `favorite` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `product_name`, `description`, `category`, `price`, `product_image`, `favorite`) VALUES
(1, 'Bangket Keju', 'On Going', 'Cookies', '65000', 'Bangket_Keju_1.jpg', 0),
(6, 'Chocolato Espresso', 'Kalau kamu pecinta kopi, brownies ini sangat cocok banget buat kamu. Karena makan brownies ditemenin kopi itu kenikmatan yang hakiki, ya kan? Sekali gigitan ngerasain sensasi coklat dan kopi dalam waktu yang sama, ditambah lagi aroma kopi dari brownies ini kuat banget, siapa coba yang ga suka aroma kopi, kamu suka kan? Soalnya wangi nya healing banget', 'Brownies', '75000', 'IMG_0079_-_Copy1.JPG', 1),
(7, 'Pie Buah', 'Pie buah rumah kue Haviyya mempunyai tekstur yg crunchy pada kulit nya.Perpaduan crunchy dan lembut nya vla yg manis & gurih di sertai buah yang segar, menimbulkan rasa happy bagi yg melihat & mencicipi nya', 'Pie', '5000', 'IMG_0564_-_Copy2.jpg', 1),
(8, 'Brownies Sekat', 'Brownies Sekat ini teksturnya chewy, dipanggang dengan loyang khusus, ditambah berbagai topping menarik untuk menggoda kita supaya milikin dia', 'Brownies', '120000', 'IMG_0078_-_Copy1.JPG', 0),
(9, 'Chocolate Cream Cheese', 'Coklat dan keju itu Perfect Match. Kalau kalian ngga suka keju, waktu makan brownies ini seketika lupa kalo ngga berteman sama keju. Perpaduan coklat dan kejunya bener-bener another level enaknya, Maa syaa Allah. Pernah ngga, jadi ngga bisa berkata-kata setelah makan sesuatu karena enaknya makanan itu? Kalian harus cobain sih gimana rasanya Chocolate Cream Cheese ini', 'Brownies', '120000', 'IMG_0074_-_Copy.JPG', 0),
(10, 'Milk Beng Beng', 'Dari namanya kita udah tau yaa brownies ini mengandung apa\r\nNah, varian ini rasanya lebih light daripada varian yang lain\r\nKarena varian ini ada rasa susunya\r\nJuga ditambah Beng Beng salah satu snack yang enaknya istiqomah hehehe', 'Brownies', '70000', 'IMG_0082_-_Copy.JPG', 0),
(11, 'Oreo Choco Ball', 'Brownies legendnya kita nih. Baidewei dia ganti nama. Dulu namanya Melted Brownie\r\nTapi kebanyakan orang manggil dia Brownies Oreo Atau \"Itu kak brownies yang ada bola-bola coklatnya\". So, we decided to change the name\r\nOreo Choco Ball, as many people describe. Walaupun namanya berubah tapi dia tetep seperti yang kamu tau kok \"Melted\". Imagine, kamu potong browniesnya, potong jadi beberapa bagian as much as you want, waktu kamu angkat potongannya kamu bisa liat lelehannya dan insyaa Allah you\'ll', 'Brownies', '75000', 'IMG_0072_-_Copy.JPG', 0),
(12, 'Fruity Brownie', 'Pretty, isn\'t it? Looks delicious right? Like how it looks, that\'s how it tastes ❤️ Chocolate mix fruits Yum.. Yum.. ????', 'Brownies', '65000', 'IMG_0073_-_Copy.JPG', 0),
(13, 'Bangket Mentega', 'On Going', 'Cookies', '65000', 'Bangket_Mentega_.jpg', 0),
(14, 'Cappuccino Tart', 'On Going', 'Cookies', '75000', 'Cappuccino_Tart_-_Copy.jpg', 0),
(15, 'Choco Chip Almond', 'On Going', 'Cookies', '70000', 'Choco_Chip_Almond_-_Copy.jpg', 0),
(16, 'Chui Kou So', 'On Going', 'Cookies', '65000', 'Chui_Kou_So.jpg', 0),
(17, 'Pie Susu', 'On Going', 'Pie', '4000', 'Pie_susu_-_Copy1.jpeg', 0),
(18, 'Skippy Choco Ball', 'On Going', 'Cookies', '70000', 'Skippy_Choco_Ball_-_Copy3.jpg', 1),
(19, 'Nastar Cup', 'On Going', 'Cookies', '70000', 'Nastar_Cup_-_Copy.jpg', 0),
(20, 'Nastar Premium', 'On Going', 'Cookies', '80000', 'Nastra_Premium_-_Copy2.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk_terlaris`
--

CREATE TABLE `tb_produk_terlaris` (
  `id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `product_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk_terlaris`
--

INSERT INTO `tb_produk_terlaris` (`id`, `product_name`, `description`, `category`, `price`, `product_image`) VALUES
(1, 'Pie Buah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p', 'Brownies', 15000, 'kue33.jpg'),
(2, 'Skippy Caramel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Brownies', 75000, 'kue3.jpg'),
(4, 'Oreo Choco Ball', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Brownies', 75000, 'kue2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Daffa Muttaqin', 'daffamuttaqin09@gmail.com', 'Logo-UPI-Universitas-Pendidikan-Indonesia-Original-PNG.png', '$2y$10$4/Da9h2cl.VjjjALLJZwK.UHcSSWJM.l5GaYQKlzGPgiI84AXmxrm', 1, 1, 1657887979),
(4, 'Abuy', 'abuy@upi.edu', 'muka_abuy.jpg', '$2y$10$eXa/rFpAM1garN.tR882beoi5GX2N9oWe.8wdhqB0EvCd9WPv9ZaW', 2, 1, 1657890030),
(6, 'Pon ', 'pon@upi.edu', 'coach_emot.jpg', '$2y$10$CoUxz3.GqZfEGe.K3Q.FweYXUOBx/p.oD0W4t67sECH109YEPKtcS', 2, 1, 1658653709),
(11, 'Shofa', 'shofa@pancabudi.ac.id', 'default.png', '$2y$10$DW91kOYPqsUr0MMyZVSseesD/dfXdyMaC1xH9aaTyi.KOLrNTRD7.', 2, 1, 1659267010),
(12, 'Dimas', 'dimas@upi.edu', 'default.png', '$2y$10$eKO6gIWEXhbVoXUGT3qIdOx1l28DDHUILYZY47.jk5MK7j8Xh0wSq', 2, 1, 1659325105);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 2, 'Beranda', 'user', 1),
(2, 2, 'Produk', 'user/produk', 1),
(3, 1, 'Admin', 'admin', 1),
(4, 2, 'Tentang', 'user/tentang', 1),
(5, 2, 'Profil', 'user/profil', 1),
(6, 2, 'Edit Profil', 'user/edit', 0),
(7, 2, 'Ubah Password', 'user/ubah_password', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk_terlaris`
--
ALTER TABLE `tb_produk_terlaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_produk_terlaris`
--
ALTER TABLE `tb_produk_terlaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
