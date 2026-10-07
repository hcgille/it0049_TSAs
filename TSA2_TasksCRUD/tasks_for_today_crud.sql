-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2026 at 05:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks_for_today_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `is_archived`, `created_at`) VALUES
(1, 'Review MVC concepts', 'completed', '2026-10-04', 1, '2026-10-05 22:03:50'),
(2, 'Prepare project folders', 'completed', '2026-10-04', 0, '2026-10-05 22:03:50'),
(3, 'Create the database tables', 'completed', '2026-10-04', 0, '2026-10-05 22:03:50'),
(4, 'Finish CodeIgniter routes', 'in progress', '2026-10-05', 0, '2026-10-05 22:03:50'),
(5, 'Design the task pages', 'pending', '2026-10-05', 0, '2026-10-05 22:03:50'),
(6, 'Test the profile page', 'pending', '2026-10-05', 0, '2026-10-05 22:03:50'),
(7, 'Review the source code', 'pending', '2026-10-06', 0, '2026-10-05 22:03:50'),
(8, 'Take website screenshots', 'pending', '2026-10-06', 0, '2026-10-05 22:03:50'),
(9, 'Submit the laboratory activity', 'pending', '2026-10-06', 0, '2026-10-05 22:03:50'),
(10, 'Finish Technical Summative 2 IT0049', 'pending', '2026-10-07', 0, '2026-10-07 15:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'harroldgille', 'Harrold Jan Gille', 'harrold@example.com', '$2y$10$XkhbgtHCy1WKX2cuGOiywuGfwkpOWMFNUvakgsdnuuxOpsV7by3r6', '2026-10-05 22:04:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
