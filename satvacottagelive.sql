-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 08:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satvacottagelive`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `paragraph` text NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `roomrate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `heading`, `subheading`, `paragraph`, `roomname`, `roomrate`) VALUES
(1, 'Welcome to Satva Cottages', 'Holidays Well Spent', 'Satva Cottages is all about being trendy yet a handcrafted excellence.\r\n		  Being located in the heart of Anjuna surrounded by nature, greenery and a peaceful environment.\r\n		  <br>\r\n		  The rooms in their embrace are a picture of  elegance and tranquillity. Walk the length of the\r\n		  balconies with private gardens, feast your eyes on the flowers &amp; enjoy the sound of silence.\r\n		  <br>\r\n		  We assure you at all times that Satva Cottages is the perfect choice at any time of the year to\r\n		  have a relaxing holiday, to enjoy a romantic break, to hold a business meeting, to unwind with\r\n		  family get together or more. Goa has something for all and we have discovered the same with\r\n		  Satva Cottages only for you\r\n		  <br>\r\n		  Our aim and motto is to make you feel at home. It would be our privilege to have you as our\r\n		  guests and ensure that your Goa holiday is memory of a lifetime.', 'Executive Room', '1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `calling_number` varchar(20) NOT NULL,
  `whatsapp_number` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `facebook_profile` varchar(255) NOT NULL,
  `instagram_profile` varchar(255) NOT NULL,
  `address_text` text NOT NULL,
  `google_maps_link` text NOT NULL,
  `maps_iframe_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `calling_number`, `whatsapp_number`, `email_address`, `facebook_profile`, `instagram_profile`, `address_text`, `google_maps_link`, `maps_iframe_code`) VALUES
(2, '8975381431', '9923119989', 'avinhospitality99@gmail.com', 'https://www.facebook.com/profile.php?id=100090924912434', 'https://www.instagram.com/satva_1234/', 'SURVEY NO 199/2B , SORRANTO WADDO , ANJUNA GOA 403509 LAND MARK – BEHIND GINGER TREE', 'https://goo.gl/maps/DtzETnEf8PcJdYJ26', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3843.088152880155!2d73.74162091485229!3d15.586938289180493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDM1JzEzLjAiTiA3M8KwNDQnMzcuNyJF!5e0!3m2!1sen!2sin!4v1675940262945!5m2!1sen!2sin\" width=\"1200\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, 'main_image.png');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amenities` text DEFAULT NULL,
  `image_folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `rate`, `amenities`, `image_folder`) VALUES
(1, 'Room 1', '100.00', 'WiFi, TV, Air conditioning', 'room1'),
(2, 'Room 2', '120.00', 'WiFi, TV, Mini fridge', 'room2'),
(3, 'Room 3', '150.00', 'WiFi, TV, Kitchenette, Balcony', 'room3'),
(4, 'Room 4', '200.00', 'WiFi, TV, Air conditioning, Jacuzzi', 'room4');

-- --------------------------------------------------------

--
-- Table structure for table `tour_services`
--

CREATE TABLE `tour_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_services`
--

INSERT INTO `tour_services` (`id`, `name`, `image`) VALUES
(6, 'yash', 'uploads/yash/dddepth-323.jpg'),
(7, 'dann', 'uploads/dann/webdev.png'),
(9, 's', 'uploads/s/hhholographic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$yQHPWhltGU2PMLeyOG.2CuQSbINv7rTfPNs.JTKXRf05CMPEPR67e');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'Administrator', 'admin', 'password123', '2023-05-11 07:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_services`
--
ALTER TABLE `tour_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_services`
--
ALTER TABLE `tour_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
