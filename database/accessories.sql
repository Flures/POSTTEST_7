-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 03:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accessories`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'MonsGeek M3', 'Aluminium CNC Keyboard Wired Dengan Gasket Mount', 1200000, 'uploads/2023-10-23-MonsGeek M3.png'),
(2, 'Mousepad Takodachi', 'Mousepad Speed Type Bercorak Takodachi', 200000, 'uploads/2023-10-23-Mousepad Takodachi.png'),
(3, 'ThieAudio Monarch MK II', 'High End In Ear Monitor Dengan Konfigurasi 1DD+6BA+2EST', 16000000, 'uploads/2023-10-23-ThieAudio Monarch MK II.png'),
(4, 'Logitech MX Master S', 'Mouse Dengan Form Factor Ergonomic', 1200000, 'uploads/2023-10-23-Logitech MX Master S.png'),
(5, 'Razer Kiyo Pro', 'Webcam 1080p Yang Support 60fps', 1800000, 'uploads/2023-10-23-Razer Kiyo Pro.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'username', '$2y$10$haZzpJw4ZftBAYLI/7BMT.uzU04wS7yBjWgW9OsMjR.DQrOtPT/9q'),
(3, 'username2', '$2y$10$vNkScobUvrW.9BHf4nMADO/wtXLr74GXZcQ6hevf7XSkrTvnSbTBi'),
(4, 'wilson', '$2y$10$2Tqqwrpq8swK0AJlGv4zdOh/HG767QW3FML.UEDUyY6B07kWAe1dW'),
(5, 'elgato', '$2y$10$DP281OQRAtOSrZHl8ISXduUP1.2nJUUp3TcUZPJoNLPEFv7iXEQVK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
