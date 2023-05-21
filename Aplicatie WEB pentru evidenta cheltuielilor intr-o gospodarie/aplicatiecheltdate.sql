-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 08:36 PM
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
-- Database: `aplicatiecheltdate`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `dataadaugarii` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL,
  `cheltuieli` bigint(50) NOT NULL,
  `economii` bigint(50) NOT NULL,
  `alimente` bigint(50) NOT NULL,
  `intretinere` bigint(50) NOT NULL,
  `educatie` bigint(50) NOT NULL,
  `distractie` bigint(50) NOT NULL,
  `altele` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`dataadaugarii`, `id`, `cheltuieli`, `economii`, `alimente`, `intretinere`, `educatie`, `distractie`, `altele`) VALUES
('2023-04-25', 16, 771011, 1123, 2123, 21312, 4213, 431231, 312132),
('2023-04-25', 18, 0, 0, 0, 0, 0, 0, 0),
('2023-04-25', 19, 2530, 2470, 700, 500, 450, 320, 560),
('2023-04-26', 20, 25313, 4687, 7003, 5002, 4503, 3202, 5603),
('2023-04-26', 21, 0, 4687, 7003, 5002, 4503, 3202, 5603),
('2023-04-26', 22, 0, 4687, 7003, 5002, 4503, 3202, 5603),
('2023-04-26', 23, 0, 0, 0, 0, 0, 0, 0),
('2023-04-26', 24, 904, 123, 213, 112, 323, 233, 23),
('2023-04-27', 25, 0, 0, 0, 0, 0, 0, 0),
('2023-04-29', 26, 379121, 312312, 31231, 3123, 323, 32132, 312312),
('2023-04-29', 27, 379121, 312312, 31231, 3123, 323, 32132, 312312),
('2023-04-29', 28, 379121, 312312, 31231, 3123, 323, 32132, 312312),
('2023-04-30', 29, 0, 0, 0, 0, 0, 0, 0),
('2023-04-30', 30, 1476, 111, 222, 33, 333, 444, 444),
('2023-04-30', 31, 1476, 111, 222, 33, 333, 444, 444),
('2023-05-10', 32, 3123661290, 321312, 3123, 2312, 312312, 3123312312, 31231),
('2023-05-10', 33, 840, 312, 312, 321, 69, 69, 69),
('2023-05-10', 34, 241101, 2312, 213312, 3123, 231, 3123, 21312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
