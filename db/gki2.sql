-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 07:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gki2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kdans`
--

CREATE TABLE `kdans` (
  `id_kdans` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `no_telepon` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `kdans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_email`
--

CREATE TABLE `newsletter_email` (
  `id_newsletter_email` int(11) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id_other` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text,
  `file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id_other`, `name`, `content`, `file`) VALUES
(1, 'judul_utama', 'Gereja Kristen Indonesia Adisucipto', NULL),
(2, 'judul_utama_deskripsi', 'Menjadi sahabat Kristus bagi sesama dan ciptaan-Nya', NULL),
(4, 'gambar_utama_home', NULL, '265a000371746103464f78ce2d60282a.jpg'),
(5, 'no_telepon', '(0274) 496554', NULL),
(6, 'email', 'admin@gkiadisucipto.or.id', NULL),
(7, 'sekilas_tentang_kami', 'Gereja Kristen Indonesia Adisucipto merupakan gereja yang terletak di Kalasan, Yogyakarta. Kami senantiasa bertumbuh bersama-sama membangun iman untuk mewujudkan dunia yang penuh kasih, sukacita, rasa bersyukur,  baik dalam keluarga maupun masyarakat', NULL),
(8, 'background_kdans', NULL, 'baa6f962f4942098385656e569e281cf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `nama_pelayanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `nama_pelayanan`) VALUES
(1, 'Komisi Pemuda');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id_permission` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id_permission`, `name`, `code`) VALUES
(1, 'Super Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `post_status` int(11) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `date`, `content`, `post_status`, `image`, `user_id`, `archive`) VALUES
(1, 'asdasdasd', '2018-11-23 01:04:04', '<p>asdasdasd</p>\r\n', 0, '71743cc175bf42d24bf8f14ea85bf840.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id_post_comment` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `comment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_home`
--

CREATE TABLE `slider_home` (
  `id_slider_home` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sosial_media`
--

CREATE TABLE `sosial_media` (
  `id_sosial_media` int(11) NOT NULL,
  `nama_sosial_media` varchar(225) NOT NULL,
  `link` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `email` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `image` text NOT NULL,
  `pelayanan_id` int(11) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `tanggal_lahir`, `email`, `pass`, `image`, `pelayanan_id`, `user_status`) VALUES
(1, 'Pebri Antara', '2018-11-22 00:00:00', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'kosong.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warta`
--

CREATE TABLE `warta` (
  `id_warta` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` datetime NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT '0',
  `download` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warta`
--

INSERT INTO `warta` (`id_warta`, `title`, `date`, `file`, `user_id`, `archive`, `download`, `views`) VALUES
(1, 'asdasd', '2018-10-15 12:41:04', '357b3108176f619cfa52c9d3b2818c31.pdf', 1, 1, 0, 0),
(2, 'Warta minggu pertama oktober', '2018-10-16 07:49:40', 'e523678bc1cb164e82e2e77dd4c0b79c.pdf', 1, 0, 0, 0),
(3, 'asdasdas', '2018-10-16 08:20:38', '08ef6998882b1690a3fa3c01d65b2717.pdf', 1, 1, 0, 0),
(4, 'asdasdasdasd', '2018-10-16 08:21:21', 'fcee238c6d9729e05d5aebcb3514a39b.pdf', 1, 1, 0, 0),
(5, 'Warta november', '2018-10-16 08:33:02', '9b4ba146cdbbe91fd46c2c41d539affb.pdf', 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `kdans`
--
ALTER TABLE `kdans`
  ADD PRIMARY KEY (`id_kdans`);

--
-- Indexes for table `newsletter_email`
--
ALTER TABLE `newsletter_email`
  ADD PRIMARY KEY (`id_newsletter_email`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id_other`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id_permission`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id_post_comment`);

--
-- Indexes for table `slider_home`
--
ALTER TABLE `slider_home`
  ADD PRIMARY KEY (`id_slider_home`);

--
-- Indexes for table `sosial_media`
--
ALTER TABLE `sosial_media`
  ADD PRIMARY KEY (`id_sosial_media`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warta`
--
ALTER TABLE `warta`
  ADD PRIMARY KEY (`id_warta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kdans`
--
ALTER TABLE `kdans`
  MODIFY `id_kdans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_email`
--
ALTER TABLE `newsletter_email`
  MODIFY `id_newsletter_email` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id_other` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id_permission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id_post_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_home`
--
ALTER TABLE `slider_home`
  MODIFY `id_slider_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sosial_media`
--
ALTER TABLE `sosial_media`
  MODIFY `id_sosial_media` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warta`
--
ALTER TABLE `warta`
  MODIFY `id_warta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
