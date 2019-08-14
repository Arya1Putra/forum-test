-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 03:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_forum_tugas1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `post_id` int(11) NOT NULL,
  `post_judul` varchar(150) NOT NULL,
  `post_isi` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `post_kode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`post_id`, `post_judul`, `post_isi`, `user_id`, `post_kode`) VALUES
(1, 'NYARI IKAN MAS', 'KETEMU KANCIL', 'kim', 0),
(2, 'aaa', 'aaa', 'kim', 0),
(3, 'BUNKEI', 'ULULULULU', 'kim', 1),
(4, 'ARIGATONG', 'HAHAHAHAHAHA', 'amai', 3),
(5, 'OSHIETEYO', 'TOKYO GHOUL MA BRO', 'kim', 0),
(6, '', 'U know la', 'kim', 4),
(7, '', 'amai', 'kim', 3),
(8, '', 'U know what?\r\nKill that kancil', 'kim', 1),
(9, '', 'OSHIETEYO', 'kim', 5),
(10, '', 'OSHIETEYO', 'amai', 9),
(11, '', 'KONO ', 'amai', 10),
(12, '', 'KIISAAMAAA!!!!', 'ubi', 5),
(13, '', 'nandato?', 'ubi', 2),
(14, '', 'Nandayo omae', 'kim', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_pass`, `user_email`) VALUES
('amai', 'mono', 'amaimono@gmail.com'),
('Fuuta', 'loli', 'fuutaloli@gmail.com'),
('kim', 'raja', 'kimraja@gmail.com'),
('Mami', 'muma', 'mamimuma@gmail.com'),
('Mamu', 'mamo', 'mamimuma@gmail.com'),
('ubi', 'huri', 'ubihuri@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
