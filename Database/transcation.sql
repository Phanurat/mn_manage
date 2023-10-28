-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 02:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mn_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `transcation`
--

CREATE TABLE `transcation` (
  `transcation_id` int(255) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `list_name` varchar(256) NOT NULL,
  `money` int(255) NOT NULL,
  `type` varchar(256) NOT NULL,
  `wallet` int(11) DEFAULT NULL,
  `not_income` varchar(255) DEFAULT NULL,
  `not_expense` varchar(255) DEFAULT NULL,
  `TEST_BANK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transcation`
--

INSERT INTO `transcation` (`transcation_id`, `user_id`, `user_name`, `list_name`, `money`, `type`, `wallet`, `not_income`, `not_expense`, `TEST_BANK`) VALUES
(5, 'c89a625cd7c63119a3b157e3e3301269420e12d5291b5efd9761c48bd2938294', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'test', 100, 'income', NULL, NULL, NULL, NULL),
(6, 'c89a625cd7c63119a3b157e3e3301269420e12d5291b5efd9761c48bd2938294', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'test', 100, 'income', NULL, NULL, NULL, NULL),
(7, 'c89a625cd7c63119a3b157e3e3301269420e12d5291b5efd9761c48bd2938294', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'kfdsgfdkgh', 10000, 'income', NULL, NULL, NULL, NULL),
(8, 'c89a625cd7c63119a3b157e3e3301269420e12d5291b5efd9761c48bd2938294', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'dfgfdgfdgfd', 1000000, 'income', NULL, NULL, NULL, NULL),
(9, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'test', 500, 'income', NULL, NULL, NULL, NULL),
(10, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'test', 9000, 'income', NULL, NULL, NULL, NULL),
(11, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'Test', 100, 'expense', NULL, NULL, NULL, NULL),
(12, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'Test', 100, 'expense', NULL, NULL, NULL, NULL),
(13, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'Test', 100, 'expense', NULL, NULL, NULL, NULL),
(14, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'Test', 100, 'expense', NULL, NULL, NULL, NULL),
(15, 'eda39f64c673b238b7319403f00da385980865953eec77b596e30484fd46c97c', '0a97eb6148d69aba8c6b11b5f8ca5de696a9ee674ce2905e39cce7db5ecfc090', 'bcvhfh', 100, 'income', 10000, NULL, NULL, NULL),
(16, '1b4f0e9851971998e732078544c96b36c3d01cedf7caa332359d6f1d83567014', '1b4f0e9851971998e732078544c96b36c3d01cedf7caa332359d6f1d83567014', 'xgdgfdgfd', 4565, 'expense', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transcation`
--
ALTER TABLE `transcation`
  ADD PRIMARY KEY (`transcation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transcation`
--
ALTER TABLE `transcation`
  MODIFY `transcation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
