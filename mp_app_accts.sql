-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2023 at 09:46 PM
-- Server version: 8.0.33-0ubuntu0.20.04.4
-- PHP Version: 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci488_fall23`
--

-- --------------------------------------------------------

--
-- Table structure for table `mp_app_accts`
--

CREATE TABLE `mp_app_accts` (
  `mpa_id` int NOT NULL,
  `mpa_name` varchar(50) NOT NULL,
  `mpa_email` varchar(50) NOT NULL,
  `mpa_password` varchar(255) NOT NULL,
  `mpa_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mpa_ipad` varchar(16) NOT NULL,
  `mpa_apik` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mp_app_accts`
--

INSERT INTO `mp_app_accts` (`mpa_id`, `mpa_name`, `mpa_email`, `mpa_password`, `mpa_timestamp`, `mpa_ipad`, `mpa_apik`) VALUES
(1, 'Maria', 'maria@gmail.com', 'bc8ffe80e3ba521c3233ad01c6453b77742b2d5b16bcfdb0351cea9b7bb4bf0a', '2023-11-23 22:17:51', '67.162.98.199', ''),
(2, 'DUKE', 'thecat@gmail.com', '2a8e6b8919de62e7604bb6d5b34100bfd90fcc4f020afe702f1ce96346dcd8d1', '2023-11-23 22:19:15', '67.162.98.199', ''),
(3, 'test', 'test@test.com', '68a4b70864b273e6a5764d4bd64880cb71cdf63a94dd6b0e1cd0dc408089600c', '2023-11-23 22:20:37', '67.162.98.199', ''),
(4, 'Michael Schmidt', 'security@gmail.com', '50c749d99cf3290ff714fc40daed41b5e1a26992f015432f4fe07498b93ee7e1', '2023-11-23 22:22:21', '67.162.98.199', ''),
(5, 'Stacey Mom', 'mom@fow.com', 'bae5394bf0f02427c361b4d922792fd5137a49299a5ff6763d85f437d857ffa3', '2023-11-24 18:24:58', '67.162.98.199', ''),
(6, 'Duke Alexander', 'duke@cat.com', 'e9028bb754840d476972b5e39a01b0ac4494a88a87a5104f57998bae42a6b81d', '2023-11-25 00:30:41', '67.162.98.199', ''),
(7, 'Mary', 'mother@christ.com', '8c8b16e8c6daa6f67c3a7f9abcb1c206e669b8dba2c99d6afd2c79583caec93a', '2023-11-25 00:39:30', '67.162.98.199', ''),
(8, 'Alfred', 'fjones@gmail.com', '5721f7b7511871c3510b70b1e52a02d5b8452b4d6030d05aa4d160df8d4de772', '2023-11-25 00:44:58', '67.162.98.199', ''),
(9, 'Scotty', 'doesnt@know.com', '5de33204abc47df243aa12bf5d4af743620f146707b92a552ea48edb8c275192', '2023-11-25 03:44:27', '67.162.98.199', ''),
(10, 'Chirag', 'chirag@gmail.com', '1fc98a2cc859e12a899ebf57c0050abc6cba000f1ad1b2264f606cbbd5574700', '2023-11-28 18:37:18', '164.68.62.15', ''),
(11, 'Knuckles', 'hedge@hog.com', 'eb874f43102cc0418457e7baf82fed034857e1301eb0663dc0988bd0c684f4f2', '2023-11-28 21:15:13', '164.68.62.15', 'd41d8cd98f00b204e9800998ecf8427e'),
(12, 'Will', 'willy@gmail.com', '79b58ff6128339935eb0cd136e1cbfb4ef7ede0f9bbcbaad26add5afce5203cf', '2023-11-30 20:58:26', '164.68.62.15', 'd41d8cd98f00b204e9800998ecf8427e'),
(13, 'Jalebi Baby', 'jalebi@gmail.com', '2380af0b6ad364804433ca1c9b30c4b8e5d555e8e0b04a0ec639d305a3369470', '2023-12-01 01:41:10', '67.162.98.199', 'd41d8cd98f00b204e9800998ecf8427e'),
(14, 'Dua Lipa', 'dualipa@gmail.com', '7db11766c923be94b6fc2591fa7e0f338307291018e9efe5fa6bf0ba35cbacd9', '2023-12-01 01:45:32', '67.162.98.199', 'd41d8cd98f00b204e9800998ecf8427e'),
(15, 'Butter BTS', 'butter@gmail.com', '5679140375a7edfd6f7b8db40ff8c7aa3de5c8567d0aa5ca4e0ff46a2434b245', '2023-12-01 02:01:40', '67.162.98.199', 'd41d8cd98f00b204e9800998ecf8427e'),
(16, 'Angel Bby', 'angelita@gmail.com', 'b2d557e4b1f55f14fd2a7f9f2e25a1692d8ce48345ed0bf182f43c6e5502ff35', '2023-12-01 16:16:15', '164.68.62.15', 'd41d8cd98f00b204e9800998ecf8427e'),
(17, 'Prof Knuckles', 'knuck@gmail.com', 'cf1dce1ba3ee737ab66b67c121725097c28b08a4309623f0a390284b7cfbcec2', '2023-12-05 20:47:57', '164.68.61.169', 'd41d8cd98f00b204e9800998ecf8427e'),
(18, 'chicken', 'chicken@gmail.com', '3bd3ed0942a44fa5e2cf3464e5ef8ae0bb9ace0c2a975e282eeae53ab8edf45b', '2023-12-11 18:00:36', '164.68.59.81', 'd41d8cd98f00b204e9800998ecf8427e'),
(19, 'chicken', 'nuggets@gmail.com', '3bd3ed0942a44fa5e2cf3464e5ef8ae0bb9ace0c2a975e282eeae53ab8edf45b', '2023-12-11 18:02:20', '164.68.59.81', 'd41d8cd98f00b204e9800998ecf8427e'),
(20, 'booger', 'boogie@gmail.com', '842dabddbfbc10a0cf4adf37998f2c8429f3eb04eab55e8bc20fb511434a92e3', '2023-12-11 18:10:59', '164.68.59.81', 'd41d8cd98f00b204e9800998ecf8427e'),
(21, 'Eres Mia', 'romeo@gmail.com', '5cfc14671476eea2d1ee8c18976ad5dc44d942aa47a937fdfdfaf447ce5771d3', '2023-12-12 00:15:47', '67.162.98.199', 'd41d8cd98f00b204e9800998ecf8427e'),
(22, 'Assembly', 'assemb@gmail.com', 'c9519dbafbaaa84cc35e79ad59f5e55d5940f977a5f00b3263cb43972624f63a', '2023-12-12 01:09:36', '67.162.98.199', '82cbe901f6c6e2831e86464bc5922f5e'),
(23, 'Treasure', 'island@gmail.com', 'dbe826410f07f630a605621fb5209536efb48fdbc230e6b7dce9be55ee7afc92', '2023-12-12 02:09:34', '67.162.98.199', '5f9ae7bf00600b936d862d26cc1aa97c'),
(24, 'Andrew', 'andrew@gmail.com', '3a413e7eb1427a5d363fc0f92e41671623f05871525fd3460ce65a0d710f199f', '2023-12-12 02:20:39', '67.162.98.199', '1f7dc9853d0498073621ebcd90db31dc'),
(25, 'syy', 's@y.org', '0a86050fb37a4def36885da9557f5b22a9e191767a80e7a4a2415410a4462b68', '2023-12-12 03:05:58', '98.253.136.171', '1c19ec78399a14200cc28117fb9e9722');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mp_app_accts`
--
ALTER TABLE `mp_app_accts`
  ADD PRIMARY KEY (`mpa_id`),
  ADD UNIQUE KEY `mpa_email` (`mpa_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mp_app_accts`
--
ALTER TABLE `mp_app_accts`
  MODIFY `mpa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
