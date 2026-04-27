-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2019 pada 17.12
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acl_resources`
--

CREATE TABLE `acl_resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('module','controller','action','other') NOT NULL DEFAULT 'other',
  `parent` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `acl_resources`
--

INSERT INTO `acl_resources` (`id`, `name`, `type`, `parent`, `created`, `modified`) VALUES
(1, 'welcome', 'module', NULL, '2012-11-12 12:07:26', NULL),
(2, 'auth', 'module', NULL, '2012-11-12 04:00:23', NULL),
(3, 'auth/login', 'controller', 2, '2012-11-12 12:43:42', '2012-11-12 12:44:06'),
(4, 'auth/logout', 'controller', 2, '2012-11-12 12:43:56', NULL),
(5, 'auth/user', 'controller', 2, '2012-11-12 04:07:59', '2012-11-12 08:29:29'),
(6, 'acl', 'module', 0, '2012-02-02 13:47:43', NULL),
(7, 'acl/resource', 'controller', 6, '2012-02-02 13:47:57', NULL),
(8, 'acl/resource/index', 'action', 7, '2012-02-02 13:48:21', NULL),
(9, 'acl/resource/add', 'action', 7, '2012-02-02 13:48:35', '2012-10-16 17:26:12'),
(10, 'acl/resource/edit', 'action', 7, '2012-02-02 13:48:50', '2012-07-09 18:44:38'),
(11, 'acl/resource/delete', 'action', 7, '2012-02-02 13:49:06', NULL),
(12, 'acl/role', 'controller', 6, '2012-07-12 17:54:16', NULL),
(13, 'acl/role/index', 'action', 12, '2012-07-12 17:55:29', NULL),
(14, 'acl/role/add', 'action', 12, '2012-07-12 17:56:00', NULL),
(15, 'acl/role/edit', 'action', 12, '2012-07-12 17:56:19', NULL),
(16, 'acl/role/delete', 'action', 12, '2012-07-12 17:56:55', NULL),
(17, 'acl/rule', 'controller', 6, '2012-07-12 17:53:04', NULL),
(18, 'acl/rule/edit', 'action', 17, '2012-07-12 17:53:25', NULL),
(19, 'utils', 'module', NULL, NULL, NULL),
(20, 'dashboard', 'module', NULL, NULL, NULL),
(21, 'api', 'module', NULL, NULL, NULL),
(22, 'samples', 'module', NULL, NULL, NULL),
(23, 'pro', 'module', NULL, NULL, NULL),
(24, 'pro/myprofile', 'controller', 23, NULL, NULL),
(25, 'pro/myprofile/index', 'action', 24, NULL, NULL),
(26, 'pro/myprofile/user', 'controller', 24, NULL, NULL),
(27, 'pro/myprofile/edit', 'action', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `acl_roles`
--

CREATE TABLE `acl_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=26 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `acl_roles`
--

INSERT INTO `acl_roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrator', '2011-12-27 12:00:00', NULL),
(2, 'Guest', '2011-12-27 12:00:00', NULL),
(3, 'Staf', '2012-11-12 04:30:02', '2012-11-12 04:30:39'),
(4, 'Manager', '2012-11-12 04:30:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `acl_role_parents`
--

CREATE TABLE `acl_role_parents` (
  `role_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `acl_role_parents`
--

INSERT INTO `acl_role_parents` (`role_id`, `parent`, `order`) VALUES
(3, 2, 0),
(4, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `acl_rules`
--

CREATE TABLE `acl_rules` (
  `role_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `access` enum('allow','deny') NOT NULL DEFAULT 'deny',
  `priviledge` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `acl_rules`
--

INSERT INTO `acl_rules` (`role_id`, `resource_id`, `access`, `priviledge`) VALUES
(1, 1, 'allow', NULL),
(1, 2, 'allow', NULL),
(1, 3, 'allow', NULL),
(1, 4, 'allow', NULL),
(1, 5, 'allow', NULL),
(1, 19, 'allow', NULL),
(1, 20, 'allow', NULL),
(1, 21, 'allow', NULL),
(1, 22, 'allow', NULL),
(1, 23, 'allow', NULL),
(1, 24, 'allow', NULL),
(1, 25, 'allow', NULL),
(1, 26, 'allow', NULL),
(1, 27, 'allow', NULL),
(2, 1, 'allow', NULL),
(2, 3, 'allow', NULL),
(2, 4, 'allow', NULL),
(4, 2, 'allow', NULL),
(4, 5, 'allow', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_autologin`
--

CREATE TABLE `auth_autologin` (
  `user` int(11) NOT NULL,
  `series` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_autologin`
--

INSERT INTO `auth_autologin` (`user`, `series`, `key`, `created`) VALUES
(1704, '45020bb370d0e932f40385c025658e7ebfe926e66b29c91b238972ac31a668b9', 'cacf750f62a6a7bc6cd0ffd0d668c6412c9d9a00c159cb247c398bca40fe7bd2', '2016-05-10 15:16:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `registered` datetime NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `kec_id` int(11) DEFAULT NULL,
  `desa_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users`
--

INSERT INTO `auth_users` (`id`, `nip`, `first_name`, `last_name`, `username`, `email`, `password`, `lang`, `registered`, `role_id`, `level_id`, `kec_id`, `desa_id`) VALUES
(1704, '0', 'Didik', 'Kurniawan', 'admin', 'admin@sidak.org', '$2a$08$DLloBFxMByaPf864MkGfH.W4qjiDDcnrnUVWjPdYvSD59CvgDLc1K', 'id', '2012-03-15 19:23:59', 1, NULL, NULL, NULL),
(1705, '12312', 'mekar', 'sari', 'mekarsari', 'taufik799@gmail.com', '$2a$08$DLloBFxMByaPf864MkGfH.W4qjiDDcnrnUVWjPdYvSD59CvgDLc1K', 'id', '2018-04-18 21:24:12', 1, 1, 13, '13.06.'),
(1706, '222222222222222222', 'taufik', 'tau', 'taufik', 'aataufik799@gmail.com', '$2a$08$UO4ezoqyWfJZsYCBCx6nrews9kYR6rqHQBM07GKmi/zh8Wvh8FbpK', 'en', '2018-04-20 20:18:17', 1, NULL, 13, '13.01.'),
(1707, '4444', '44444', '4444', 'admin2', 'admin2@admin.com', '$2a$08$lOgqUb7wKv1jPKF0FwX6tetLzILO8UMfeLFq1cBhS19RVk9Ge0hKm', 'en', '2018-04-20 20:19:02', 1, NULL, 13, '13.02.'),
(1708, 'usman', 'usman', 'usman', 'manager', 'admin@admin.com', '$2a$08$HrJ7Ufnhj49YROkxOAayIeRDp4IiDLgGEoJle9o8glzFScRbbrrza', 'id', '2018-04-24 15:02:33', 4, NULL, 13, '13.02.'),
(1710, '111111', 'amin', 'aminA', 'pelayanan', 'amin@amin.com', '$2a$08$hMPlySPtgDqk5sKRzX3C2OlHEqeLKczerov1XkbYXLUd8DsRltz3C', 'id', '2018-04-24 15:39:12', 4, NULL, 13, '13.03.'),
(1711, '12321322', '123123', '1231231', 'tetstest', 'aaaaa@aaa.com', '$2a$08$oVvRrX4eeswCN4x8RiboJeCC5s5rA9xUfhjuvxwjYElT.8cFDa8YW', 'id', '2018-04-26 09:45:21', 3, NULL, 13, '13.04.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_master`
--

CREATE TABLE `auth_users_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users_master`
--

INSERT INTO `auth_users_master` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `registered`) VALUES
(1002, 'Diane', 'Murphy', 'dmurphy', 'dmurphy@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1056, 'Mary', 'Patterson', 'mpatterso', 'mpatterso@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1076, 'Jeff', 'Firrelli', 'jeff.firrelli', 'jeff.firrelli@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1088, 'William', 'Patterson', 'wpatterson', 'wpatterson@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1102, 'Gerard', 'Bondur', 'gbondur', 'gbondur@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1143, 'Anthony', 'Bow', 'abow', 'abow@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1165, 'Leslie', 'Jennings', 'ljennings', 'ljennings@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1166, 'Leslie', 'Thompson', 'lthompson', 'lthompson@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1188, 'Julie', 'Firrelli', 'julie.firrelli', 'julie.firrelli@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1216, 'Steve', 'Patterson', 'spatterson', 'spatterson@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1286, 'Foon Yue', 'Tseng', 'ftseng', 'ftseng@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1323, 'George', 'Vanauf', 'gvanauf', 'gvanauf@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1337, 'Loui', 'Bondur', 'lbondur', 'lbondur@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1370, 'Gerard', 'Hernandez', 'ghernande', 'ghernande@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1401, 'Pamela', 'Castillo', 'pcastillo', 'pcastillo@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1501, 'Larry', 'Bott', 'lbott', 'lbott@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1504, 'Barry', 'Jones', 'bjones', 'bjones@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1611, 'Andy', 'Fixter', 'afixter', 'afixter@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1612, 'Peter', 'Marsh', 'pmarsh', 'pmarsh@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1619, 'Tom', 'King', 'tking', 'tking@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1621, 'Mami', 'Nishi', 'mnishi', 'mnishi@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1625, 'Yoshimi', 'Kato', 'ykato', 'ykato@classicmodelcars.com', '', '2012-03-01 05:54:30'),
(1702, 'Martin', 'Gerard', 'mgerard', 'mgerard@classicmodelcars.com', '', '2012-03-01 05:54:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users__ori`
--

CREATE TABLE `auth_users__ori` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `registered` datetime NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_users__ori`
--

INSERT INTO `auth_users__ori` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `lang`, `registered`, `role_id`) VALUES
(1002, 'Diane', 'Murphy', 'dmurphy', 'dmurphy@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1056, 'Mary', 'Patterson', 'mpatterso', 'mpatterso@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1076, 'Jeff', 'Firrelli', 'jeff.firrelli', 'jeff.firrelli@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1088, 'William', 'Patterson', 'wpatterson', 'wpatterson@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1102, 'Gerard', 'Bondur', 'gbondur', 'gbondur@classicmodelcars.com', '$2a$08$/9GPAwtVkFug2y5yBIhmPOZWSev.Myt.ruNENXo9DT4VrqTwNBE2K', 'en', '2012-03-01 05:54:30', NULL),
(1143, 'Anthony', 'Bow', 'abow', 'abow@classicmodelcars.com', '$2a$08$w6grERmP9T3r7FOBAuxLjO0l9H05ZgFTgGUY26hA89/g/Wq.QLqye', NULL, '2012-03-01 05:54:30', NULL),
(1165, 'Leslie', 'Jennings', 'ljennings', 'ljennings@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1166, 'Leslie', 'Thompson', 'lthompson', 'lthompson@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1216, 'Steve', 'Patterson', 'spatterson', 'spatterson@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1337, 'Loui', 'Bondur', 'lbondur', 'lbondur@classicmodelcars.com', '$2a$08$tGx5NElKJIm2hkX3OwRYSOp/VZ/r.oaB2YHdK.HBCDM921rfUVAta', NULL, '2012-03-01 05:54:30', NULL),
(1370, 'Gerard', 'Hernandez', 'ghernande', 'ghernande@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1401, 'Pamela', 'Castillo', 'pcastillo', 'pcastillo@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1501, 'Larry', 'Bott', 'lbott', 'lbott@classicmodelcars.com', '$2a$08$Njus3nhJ9bX5YYGra6xRu.ldrTylOMebKHXW/Wfl0o2wMvtppY476', NULL, '2012-03-01 05:54:30', NULL),
(1504, 'Barry', 'Jones', 'bjones', 'bjones@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1611, 'Andy', 'Fixter', 'afixter', 'afixter@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1612, 'Peter', 'Marsh', 'pmarsh', 'pmarsh@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1619, 'Tom', 'King', 'tking', 'tking@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1621, 'Mami', 'Nishi', 'mnishi', 'mnishi@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1625, 'Yoshimi', 'Kato', 'ykato', 'ykato@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1702, 'Martin', 'Gerard', 'mgerard', 'mgerard@classicmodelcars.com', '', NULL, '2012-03-01 05:54:30', NULL),
(1703, 'Ardi', 'Soebrata', 'ardissoebrata', 'ardissoebrata@gmail.com', '$2a$08$KZRME/RCMM.ikhJvS9IQtOD/qQcM/922akreUjQ7fgL6BanTAwsIm', 'en', '2012-03-09 12:57:48', 4),
(1704, 'Administrator', 'Tea', 'admin', 'admin@example.com', '$2a$08$dxSn4NG3GUxu3XGLr4niIuemUHBohdWdBobNsRi6WpBE.h8zHNmXO', 'id', '2012-03-15 19:23:59', 1),
(1706, 'Test', 'TestLast', 'test', 'test@test.com', 'test', 'en', '2012-11-09 10:58:34', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_resources`
--
ALTER TABLE `acl_resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `acl_roles`
--
ALTER TABLE `acl_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `acl_role_parents`
--
ALTER TABLE `acl_role_parents`
  ADD PRIMARY KEY (`role_id`,`parent`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD PRIMARY KEY (`role_id`,`resource_id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Indexes for table `auth_autologin`
--
ALTER TABLE `auth_autologin`
  ADD PRIMARY KEY (`user`,`series`);

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `auth_users_master`
--
ALTER TABLE `auth_users_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `auth_users__ori`
--
ALTER TABLE `auth_users__ori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl_resources`
--
ALTER TABLE `acl_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `acl_roles`
--
ALTER TABLE `acl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1712;
--
-- AUTO_INCREMENT for table `auth_users_master`
--
ALTER TABLE `auth_users_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1703;
--
-- AUTO_INCREMENT for table `auth_users__ori`
--
ALTER TABLE `auth_users__ori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1707;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acl_role_parents`
--
ALTER TABLE `acl_role_parents`
  ADD CONSTRAINT `acl_role_parents_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `acl_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acl_role_parents_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `acl_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `acl_rules`
--
ALTER TABLE `acl_rules`
  ADD CONSTRAINT `acl_rules_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `acl_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acl_rules_ibfk_2` FOREIGN KEY (`resource_id`) REFERENCES `acl_resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users__ori`
--
ALTER TABLE `auth_users__ori`
  ADD CONSTRAINT `auth_users__ori_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `acl_roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
