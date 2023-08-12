-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 11:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin123@gmail.com', '$2y$10$koJ7B2WUphopTVv7l2lTKuo8XZkRt4izdinjcUIVG/oZ7tXD.wm1S', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `vehicle_id`, `from_date`, `to_date`, `payment_method`, `message`, `status`) VALUES
(124, 37, 1, '2023-08-03', '2023-08-08', '', 'k', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Audi', 'loremas voluptatem deserunt libero minima, alias hic quos maiores'),
(2, 'BMW', 'loremas voluptatem deserunt libero minima, alias hic quos maiores'),
(8, 'Honda', '\r\nloremas voluptatem deserunt libero minima, alias hic quos maiores'),
(9, 'Suzuki', 'loremas voluptatem deserunt libero minima, alias hic quos maiores\r\n\r\n'),
(10, 'Hyundai', ' lorem voluptatem deserunt libero minima, alias hic quos maiores');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(11, 'Ram Thapa', 'ram@gmail.com', 'Generally, an ERD does not define business processes, but graphically displays business data patterns.');

-- --------------------------------------------------------

--
-- Table structure for table `owner_booking`
--

CREATE TABLE `owner_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner_brand`
--

CREATE TABLE `owner_brand` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_brand`
--

INSERT INTO `owner_brand` (`id`, `user_id`, `name`, `description`) VALUES
(7, 39, 'Ford', 'rgethrvtetgv'),
(9, 59, 'Audi', 'rybteZA');

-- --------------------------------------------------------

--
-- Table structure for table `owner_vehicle`
--

CREATE TABLE `owner_vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `owner_brand_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `model_year` year(4) NOT NULL,
  `seat` int(11) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `paper_work` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner_vehicle`
--

INSERT INTO `owner_vehicle` (`id`, `name`, `user_id`, `owner_brand_id`, `price`, `model_year`, `seat`, `vehicle_no`, `description`, `image`, `paper_work`) VALUES
(7, 'Ford', 39, 7, '7000', 2020, 5, 'na1-pa972', '4vyrehvter', '62601fe9e29e6.jpeg', '62601fe9e29e9.jpeg'),
(8, 'Audi E-Tron GT', 59, 9, '8000', 2021, 4, 'na11-pa831', 'ebsfzg zvadz', '6262e1a5516b9.jpeg', '6262e1a5516be.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'renter',
  `license` varchar(250) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `license`, `code`) VALUES
(37, 'Ram Thapa', 'ram@gmail.com', '$2y$10$zn9fp5vT.C67CqURxAy4Pupfx5n0izXbG72PeUL3kUd76lMAUocy2', '9875404532', 'Renter', '6233041b37a8f.jpeg', 686128),
(39, 'Sam Lal', 'sam@gmail.com', '$2y$10$Gk.twySNPCk0zHz0xsfeB.XeVEpXVvJFWFWVAgZosUQ4ixWOoUnsq', '9875404543', 'Owner', '623330639cf91.jpeg', 0),
(58, 'Test Test', 'test@gmail.com', '$2y$10$z36Y4dzXblPcQ49VUNTT9OjqbX8lA2hupU8VylBWR/IqAv7D/n/uO', '9856476534', 'Renter', '6240826e24cd0.jpeg', 0),
(59, 'Hari Har', 'hari@gmail.com', '$2y$10$8oTetzGVtSIFaoHkKOGeM.WjYVqNIlPrIC.U2n66q2AlMYAKSceMa', '9856476554', 'Owner', '62480af4cfdd6.jpeg', 0),
(60, 'Ankit Simkhada', 'ankit@gmail.com', '$2y$10$jwF8Ud.m/TiqlwDVawMHVu3b88FnJLebiEO18hsTGVCETS5YYbNLa', '9856476534', 'Renter', '624f20ca9f42a.jpeg', 0),
(61, 'Renter renter', 'renter@gmail.com', '$2y$10$VTSCDs3zbr42ADn8Qm3OHeyJL8jE4Gup7x4yB/.qPy7rflMCK99nC', '9876563561', 'Renter', '628b85d747085.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `model_year` year(4) NOT NULL,
  `seat` int(11) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `paper_work` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `category_id`, `price`, `model_year`, `seat`, `vehicle_no`, `description`, `image`, `paper_work`) VALUES
(1, 'Audi A8', 1, '10000', 2011, 5, 'na7-ba123', 'lorwem voluptatem deserunt libero minima, alias hic quos maiores', '64ca31a6ee6d2.jpeg', '64ca31a6ee6d3.jpeg'),
(11, 'Hyundai Creta', 10, '6000', 2018, 6, 'na1-pa232', 'loremas voluptatem deserunt libero minima, alias hic quos maiores', '6237ed8e9612b.jpeg', '6237ed8e96137.jpeg'),
(12, 'Honda CR-V', 8, '9000', 2016, 7, 'na2-ba383', 'lorem voluptatem deserunt libero minima, alias hic quos maiores', '62360607d56f6.jpeg', '62360607d56f9.jpeg'),
(16, 'Suzuki S-Cross', 9, '8000', 2019, 6, 'na7-ba783', 'lorem loremas voluptatem deserunt libero minima, alias hic quos maiores', '62360634d4047.jpeg', '62360634d404a.jpeg'),
(22, 'Hyundai Venue', 10, '8000', 2020, 6, 'na11-pa453', 'hvhtu gjh', '62657347b351c.jpeg', '62657347b351f.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_booking`
--
ALTER TABLE `owner_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `owner_brand`
--
ALTER TABLE `owner_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_vehicle`
--
ALTER TABLE `owner_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_brand_id` (`owner_brand_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `owner_booking`
--
ALTER TABLE `owner_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `owner_brand`
--
ALTER TABLE `owner_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `owner_vehicle`
--
ALTER TABLE `owner_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
