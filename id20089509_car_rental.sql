-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2023 at 12:56 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20089509_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookedcar`
--

CREATE TABLE `bookedcar` (
  `id` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `start_date` varchar(11) NOT NULL,
  `booked_for` int(3) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookedcar`
--

INSERT INTO `bookedcar` (`id`, `user_id`, `car_id`, `start_date`, `booked_for`, `date`) VALUES
(4, 4, 7, '2023-01-03', 5, '2023-01-01 21:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `Vehicle_id` int(6) NOT NULL,
  `Vehicle_model` varchar(100) NOT NULL,
  `Vehicle_number` varchar(20) NOT NULL,
  `seating_capacity` int(15) NOT NULL,
  `rent_per_day` int(7) NOT NULL,
  `car_image` varchar(255) NOT NULL,
  `availability` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`Vehicle_id`, `Vehicle_model`, `Vehicle_number`, `seating_capacity`, `rent_per_day`, `car_image`, `availability`, `user_id`) VALUES
(6, 'swift', 'hr 26 gg5511', 5, 200, '1672580246swift.png', 1, 5),
(7, 'fortuner', 'hr 26 ww 0101', 10, 5000, '1672587143fortuner.png', 0, 5),
(8, 'belano', 'hr 26 dd 1122', 5, 5000, '1672587199belano.png', 1, 1),
(9, 'Swiftl', 'Hr26 ff 2222', 5, 5000, '16731693521672580246swift.png', 1, 1),
(10, 'Veanue', 'Hr26 gg 3333', 6, 1000, '1673169437images.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` varchar(3) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `is_admin`, `date`) VALUES
(1, 'sunita devi', 'sunita@gmail.com', 123456789, '$2y$10$/MRoDk/2Fabp.iZNTYpVQu.RQMt6V8Wx8MdRrj.PvdCCRU6O0ffo6', '1', '2022-12-30 08:40:22'),
(3, 'tushar', 'tushar@gmail.com', 9560912476, '$2y$10$/MRoDk/2Fabp.iZNTYpVQu.RQMt6V8Wx8MdRrj.PvdCCRU6O0ffo6', '0', '2022-12-31 16:53:31'),
(4, 'deepika', 'deepika@gmail.com', 8448902006, '$2y$10$qI3BzyWgPntl3/fG0BAnPubHZoNdrev2LADlLOZuBSlPrfATTFKlW', '0', '2022-12-31 17:04:02'),
(5, 'yogesh', 'yogesh@gmail.com', 9017209020, '$2y$10$F4nz5wLQ2t9/2QiGC5vlU.J4GGJ0WkhKOSu12rrkU6fAZQ8pThxEa', '1', '2023-01-01 10:54:29'),
(7, 'ramkishan', 'ramkishan@gmail.com', 9953937604, '$2y$10$Z8dK63Lf54f37bKgSv9JMO0qIEViAAyM/s2YFffCH6EJSIU80qb9G', '0', '2023-01-04 07:33:36'),
(8, 'rao', 'rao@gmail.com', 9955995599, '$2y$10$13FfwpW.cxtV9IRiOWsGpuxGxWaEdXLVw1oGfqnCUnSofUztI0Zgy', '0', '2023-01-04 07:49:29'),
(9, 'Akash', 'akashstark981050@gmail.com', 8586087969, '$2y$10$yfj1sgAz9WRbgz2vNd7nsuI8v33dZaLCZhh/OglPHz4zv9aMQGn62', '0', '2023-01-05 07:42:46'),
(10, 'amar', 'a@a.com', 8887778880, '$2y$10$OGIrzOBRImTPS5fY.X2GcO7Q.rGuzF7gqqGpPphyHteA5afDUngna', '0', '2023-02-22 05:01:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookedcar`
--
ALTER TABLE `bookedcar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookedcar`
--
ALTER TABLE `bookedcar`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `Vehicle_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
