-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2024 at 01:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jumlahdata` () RETURNS INT(11)  BEGIN
DECLARE total INT;
SELECT COUNT(*) INTO total FROM siswa;
RETURN total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_ekstra` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_siswa`, `id_ekstra`, `keterangan`) VALUES
(16, 34, 1, 'INSERT'),
(17, 35, 2, 'INSERT'),
(18, 36, 3, 'INSERT'),
(19, 37, 4, 'INSERT'),
(20, 38, 5, 'INSERT'),
(21, 38, 5, 'DELETE'),
(22, 39, 5, 'INSERT'),
(23, 39, 5, 'DELETE'),
(24, 40, 5, 'INSERT'),
(25, 40, 5, 'DELETE'),
(26, 41, 3, 'INSERT'),
(27, 41, 3, 'DELETE'),
(28, 42, 2, 'INSERT'),
(29, 42, 4, 'DELETE'),
(30, 43, 1, 'INSERT');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`) VALUES
(1, 'Volly'),
(2, 'Futsal'),
(3, 'Karate'),
(4, 'Renang'),
(5, 'Seni'),
(6, 'Basket');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL DEFAULT '0',
  `nama_siswa` varchar(45) NOT NULL DEFAULT '0',
  `gender` varchar(15) NOT NULL DEFAULT '0',
  `foto_siswa` varchar(50) NOT NULL DEFAULT '0',
  `alamat` varchar(150) NOT NULL DEFAULT '0',
  `id_ekstra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `gender`, `foto_siswa`, `alamat`, `id_ekstra`) VALUES
(34, '32602200049', 'Benaya Mula Syafiq', 'Laki-laki', 'WhatsApp Image 2024-01-09 at 02.15.17_ff88622b.jpg', 'Brebes, Jawa Tengah', 1),
(35, '32602200071', 'Hadana Maulana', 'Laki-laki', 'WhatsApp Image 2024-01-09 at 03.34.46_6d6df1e9.jpg', 'Tegal, Jawa Tengah', 2),
(36, '32602200074', 'Helmi Septianto', 'Laki-laki', 'WhatsApp Image 2024-01-09 at 03.28.44_384287dd.jpg', 'Pati, Jawa Tengah', 3),
(37, '32602200012', 'Ibra Andnan', 'Laki-laki', 'WhatsApp Image 2024-01-09 at 02.47.35_2065cda3.jpg', 'Banjarnegara, Jawa Tengah', 4),
(43, '23456', 'amin', 'Laki-laki', 'WhatsApp Image 2024-01-09 at 03.29.47_3fc2c2c7.jpg', 'asaal', 1);

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `siswa_before_delete` BEFORE DELETE ON `siswa` FOR EACH ROW BEGIN
INSERT INTO catatan(id_siswa, id_ekstra, keterangan)
VALUES (OLD.id_siswa, OLD.id_ekstra, "DELETE");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_catatan` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
INSERT INTO catatan(id_siswa, id_ekstra, keterangan)
VALUES (NEW.id_siswa, NEW.id_ekstra, "INSERT");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_siswa`
-- (See below for the actual view)
--
CREATE TABLE `view_siswa` (
`id_siswa` int(11)
,`nama_siswa` varchar(45)
,`gender` varchar(15)
,`nisn` varchar(15)
,`id_ekstra` int(11)
,`nama_ekstra` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`gender` AS `gender`, `siswa`.`nisn` AS `nisn`, `siswa`.`id_ekstra` AS `id_ekstra`, `ekstra`.`nama_ekstra` AS `nama_ekstra` FROM (`siswa` join `ekstra` on(`siswa`.`id_ekstra` = `ekstra`.`id_ekstra`)) WHERE `siswa`.`id_ekstra` = `ekstra`.`id_ekstra``id_ekstra`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `FK_siswa_ekstra` (`id_ekstra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_siswa_ekstra` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
