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
-- Table structure for table `mp_app_logs`
--

CREATE TABLE `mp_app_logs` (
  `mpl_id` int NOT NULL,
  `mpl_mpa_id` int NOT NULL,
  `mpl_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mpl_ipad` varchar(16) NOT NULL,
  `mpl_query` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mp_app_logs`
--

INSERT INTO `mp_app_logs` (`mpl_id`, `mpl_mpa_id`, `mpl_timestamp`, `mpl_ipad`, `mpl_query`) VALUES
(1, 20, '2023-12-11 18:13:25', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5'),
(2, 20, '2023-12-11 18:24:28', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=hamlet'),
(3, 20, '2023-12-11 19:11:09', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&'),
(4, 20, '2023-12-11 19:11:49', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=merchantvenice&act=1'),
(5, 20, '2023-12-11 19:11:58', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=merchantvenice&act=1&scene=1'),
(6, 20, '2023-12-11 19:12:18', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=merchantvenice'),
(7, 20, '2023-12-11 19:12:21', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&'),
(8, 20, '2023-12-11 19:12:28', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&'),
(9, 20, '2023-12-11 19:28:04', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&'),
(10, 20, '2023-12-11 19:28:27', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=merrywives'),
(11, 20, '2023-12-11 19:28:38', '164.68.59.81', 'token=4e5984cc70b570b4581ca3d6fccccea5&work=hamlet'),
(12, 15, '2023-12-11 20:50:14', '164.68.59.81', 'token=9e8760b503b94e75bf0c9052c419e2e9?'),
(13, 15, '2023-12-11 20:50:23', '164.68.59.81', 'token=9e8760b503b94e75bf0c9052c419e2e9?work=hamlet'),
(14, 15, '2023-12-11 20:50:30', '164.68.59.81', 'token=9e8760b503b94e75bf0c9052c419e2e9?'),
(15, 15, '2023-12-11 20:50:42', '164.68.59.81', 'token=9e8760b503b94e75bf0c9052c419e2e9?work=othello'),
(16, 15, '2023-12-11 23:39:36', '67.162.98.199', 'token=?'),
(17, 15, '2023-12-11 23:42:20', '67.162.98.199', 'token=?'),
(18, 15, '2023-12-11 23:43:01', '67.162.98.199', 'token=?work=measure'),
(19, 15, '2023-12-11 23:43:12', '67.162.98.199', 'token=?work=measure&act=1&scene=1'),
(20, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?'),
(21, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?work=kingjohn'),
(22, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?'),
(23, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?work=pericles'),
(24, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?work=pericles'),
(25, 15, '0000-00-00 00:00:00', '67.162.98.199', 'token=?work=pericles&act=1&scene=1'),
(26, 15, '2023-12-12 00:08:18', '67.162.98.199', 'token=?'),
(27, 15, '2023-12-12 00:08:37', '67.162.98.199', 'token=?work=troilus'),
(28, 15, '2023-12-12 00:12:04', '67.162.98.199', 'token=d41d8cd98f00b204e9800998ecf8427e?'),
(29, 15, '2023-12-12 00:12:21', '67.162.98.199', 'token=d41d8cd98f00b204e9800998ecf8427e?work=juliuscaesar'),
(30, 21, '2023-12-12 00:26:06', '67.162.98.199', 'token=d41d8cd98f00b204e9800998ecf8427e?'),
(31, 22, '2023-12-12 01:09:41', '67.162.98.199', 'token=82cbe901f6c6e2831e86464bc5922f5e?'),
(32, 22, '2023-12-12 01:09:58', '67.162.98.199', 'token=82cbe901f6c6e2831e86464bc5922f5e?work=cymbeline'),
(33, 23, '2023-12-12 02:15:30', '67.162.98.199', 'token=5f9ae7bf00600b936d862d26cc1aa97c?'),
(34, 24, '2023-12-12 02:21:13', '67.162.98.199', 'token=1f7dc9853d0498073621ebcd90db31dc?'),
(35, 24, '2023-12-12 02:21:31', '67.162.98.199', 'token=1f7dc9853d0498073621ebcd90db31dc?work=hamlet'),
(36, 24, '2023-12-12 02:21:37', '67.162.98.199', 'token=1f7dc9853d0498073621ebcd90db31dc?work=merchantvenice'),
(37, 24, '2023-12-12 02:21:47', '67.162.98.199', 'token=1f7dc9853d0498073621ebcd90db31dc?work=merchantvenice&act1&scene2'),
(38, 25, '2023-12-12 03:06:22', '98.253.136.171', 'token=1c19ec78399a14200cc28117fb9e9722?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mp_app_logs`
--
ALTER TABLE `mp_app_logs`
  ADD PRIMARY KEY (`mpl_id`),
  ADD KEY `mpl_mpa_id` (`mpl_mpa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mp_app_logs`
--
ALTER TABLE `mp_app_logs`
  MODIFY `mpl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mp_app_logs`
--
ALTER TABLE `mp_app_logs`
  ADD CONSTRAINT `mp_app_logs_ibfk_1` FOREIGN KEY (`mpl_mpa_id`) REFERENCES `mp_app_accts` (`mpa_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
