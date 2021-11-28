-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Νοε 2021 στις 14:02:58
-- Έκδοση διακομιστή: 10.4.21-MariaDB
-- Έκδοση PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `hotel`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `room_id`, `check_in_date`, `check_out_date`, `total_price`, `created_time`, `updated_time`) VALUES
(1, 24, 1, '2021-11-15', '2021-11-30', 100, '2021-10-15 17:06:07', '2021-10-15 17:30:30'),
(7, 23, 9, '2021-10-23', '2021-10-29', 1800, '2021-10-23 02:00:17', '2021-10-23 02:00:17'),
(9, 29, 8, '2021-10-23', '2021-11-05', 3640, '2021-10-23 02:06:01', '2021-10-23 02:06:01'),
(10, 29, 6, '2021-10-23', '2021-11-05', 4160, '2021-10-23 02:07:31', '2021-10-23 02:07:31'),
(11, 29, 5, '2021-10-24', '2021-11-28', 14000, '2021-10-24 15:20:49', '2021-10-24 15:20:49'),
(27, 23, 9, '2024-11-02', '2024-11-03', 300, '2021-11-01 11:08:09', '2021-11-01 11:08:09'),
(31, 23, 3, '2026-11-02', '2026-11-03', 420, '2021-11-01 11:11:33', '2021-11-01 11:11:33'),
(33, 23, 6, '2030-11-02', '2030-11-03', 320, '2021-11-01 11:23:11', '2021-11-01 11:23:11'),
(34, 23, 10, '2021-11-10', '2021-11-18', 3280, '2021-11-01 16:28:35', '2021-11-01 16:28:35'),
(35, 35, 2, '2021-11-02', '2021-11-02', 0, '2021-11-02 22:39:11', '2021-11-02 22:39:11'),
(36, 23, 1, '2021-11-04', '2021-11-05', 350, '2021-11-04 16:16:11', '2021-11-04 16:16:11'),
(37, 23, 2, '2021-11-05', '2021-11-05', 0, '2021-11-05 12:56:28', '2021-11-05 12:56:28');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `favorite`
--

INSERT INTO `favorite` (`user_id`, `room_id`, `created_time`, `updated_time`) VALUES
(23, 1, '2021-11-04 16:16:36', '2021-11-04 16:16:36'),
(23, 2, '2021-10-27 21:02:41', '2021-10-27 21:02:41'),
(23, 4, '2021-10-18 22:20:59', '2021-10-18 22:20:59'),
(23, 10, '2021-11-04 16:43:44', '2021-11-04 16:43:44'),
(28, 6, '2021-10-19 08:49:45', '2021-10-19 08:49:45'),
(29, 4, '2021-10-28 20:43:41', '2021-10-28 20:43:41'),
(29, 5, '2021-10-24 15:21:04', '2021-10-24 15:21:04'),
(30, 1, '2021-10-31 18:49:55', '2021-10-31 18:49:55'),
(30, 3, '2021-11-04 16:27:57', '2021-11-04 16:27:57');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `review`
--

CREATE TABLE `review` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `rate` int(10) UNSIGNED NOT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `review`
--

INSERT INTO `review` (`review_id`, `room_id`, `user_id`, `rate`, `comment`, `created_time`, `updated_time`) VALUES
(15, 4, 23, 4, 'I suggest', '2021-10-22 22:54:50', '2021-10-22 22:54:50'),
(19, 1, 23, 3, 'new comment with ajax', '2021-10-27 21:34:40', '2021-10-27 21:34:40'),
(21, 1, 23, 5, 'fabulus', '2021-10-27 21:38:54', '2021-10-27 21:38:54'),
(23, 1, 23, 5, 'marvelus', '2021-10-27 21:42:43', '2021-10-27 21:42:43'),
(29, 7, 23, 5, 'Ajax comment', '2021-10-27 21:58:52', '2021-10-27 21:58:52'),
(31, 7, 23, 5, 'Ajax comment2', '2021-10-27 22:07:42', '2021-10-27 22:07:42'),
(39, 4, 23, 5, 'good ', '2021-10-27 22:57:55', '2021-10-27 22:57:55'),
(47, 4, 23, 5, 'bariemai', '2021-10-27 23:24:45', '2021-10-27 23:24:45'),
(48, 7, 23, 5, 'it will not work today...', '2021-10-27 23:25:45', '2021-10-27 23:25:45'),
(49, 7, 23, 5, 'aman', '2021-10-27 23:26:31', '2021-10-27 23:26:31'),
(51, 9, 23, 5, 'please', '2021-10-27 23:37:14', '2021-10-27 23:37:14'),
(55, 9, 29, 1, 'no hope', '2021-10-27 23:51:15', '2021-10-27 23:51:15'),
(56, 9, 29, 1, 'no hope', '2021-10-27 23:51:36', '2021-10-27 23:51:36'),
(60, 4, 23, 5, 'last try', '2021-10-28 00:06:49', '2021-10-28 00:06:49'),
(62, 4, 23, 4, 'ok ti na sas pw', '2021-10-28 00:12:00', '2021-10-28 00:12:00'),
(63, 3, 23, 5, 'oti na nai', '2021-10-28 00:16:37', '2021-10-28 00:16:37'),
(64, 3, 23, 5, 'not yeat', '2021-10-28 00:18:16', '2021-10-28 00:18:16'),
(65, 3, 23, 5, 'when', '2021-10-28 00:21:50', '2021-10-28 00:21:50'),
(73, 8, 23, 3, 'good', '2021-10-28 09:16:15', '2021-10-28 09:16:15'),
(81, 3, 29, 5, 'ok', '2021-10-28 09:36:01', '2021-10-28 09:36:01'),
(82, 3, 29, 2, 'mpa', '2021-10-28 09:36:40', '2021-10-28 09:36:40'),
(87, 2, 23, 5, 'nice', '2021-10-28 09:50:35', '2021-10-28 09:50:35'),
(89, 6, 29, 3, 'yes', '2021-10-28 15:51:32', '2021-10-28 15:51:32'),
(92, 6, 29, 4, 'review with js injection <script>alert(Ha ha!)</script>', '2021-10-28 16:22:07', '2021-10-28 16:22:07'),
(94, 4, 29, 5, 'review with js injection <script>alert(Ha ha!)</script>', '2021-10-28 16:27:02', '2021-10-28 16:27:02'),
(95, 4, 29, 5, 'review with js injection <script>alert(Ha ha!)</script>', '2021-10-28 16:28:36', '2021-10-28 16:28:36'),
(96, 2, 29, 5, 'review with js injection <script>alert(Ha ha!)</script> ', '2021-10-28 16:34:05', '2021-10-28 16:34:05'),
(97, 2, 29, 5, 'review with js injection <script>alert(Ha ha!)</script> ', '2021-10-28 16:38:00', '2021-10-28 16:38:00'),
(98, 2, 29, 5, 'it will not work today...', '2021-10-28 16:39:08', '2021-10-28 16:39:08'),
(99, 2, 29, 5, 'review with js injection <script>alert(Ha ha!)</script>', '2021-10-28 16:39:15', '2021-10-28 16:39:15'),
(100, 4, 29, 5, 'nice location!', '2021-10-28 20:45:31', '2021-10-28 20:45:31'),
(102, 1, 30, 3, 'good stuff', '2021-10-31 18:50:43', '2021-10-31 18:50:43'),
(103, 10, 23, 5, 'Aha Santorini is the best!', '2021-11-01 16:28:32', '2021-11-01 16:28:32'),
(104, 3, 23, 4, 'good', '2021-11-01 22:10:23', '2021-11-01 22:10:23'),
(105, 3, 23, 4, 'good', '2021-11-01 22:11:48', '2021-11-01 22:11:48'),
(106, 3, 23, 3, '', '2021-11-01 22:15:09', '2021-11-01 22:15:09'),
(107, 1, 23, 4, 'nice', '2021-11-04 16:16:07', '2021-11-04 16:16:07');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `room`
--

CREATE TABLE `room` (
  `room_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `count_of_guests` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `location_lat` decimal(10,7) NOT NULL,
  `location_long` decimal(10,7) NOT NULL,
  `description_short` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description_long` text COLLATE utf8_unicode_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `pet_friendly` tinyint(1) NOT NULL,
  `avg_reviews` decimal(10,7) DEFAULT NULL,
  `count_reviews` int(10) UNSIGNED DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `room`
--

INSERT INTO `room` (`room_id`, `type_id`, `name`, `city`, `area`, `photo_url`, `count_of_guests`, `price`, `address`, `location_lat`, `location_long`, `description_short`, `description_long`, `parking`, `wifi`, `pet_friendly`, `avg_reviews`, `count_reviews`, `created_time`, `updated_time`) VALUES
(1, 1, 'Hilton Hotel', 'Athens', 'Zwgrafou', 'room-1.jpg', 1, 350, 'Vasilis Sofeias 38', '37.9767030', '23.7504170', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n\r\nVestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.', 1, 1, 0, '4.0000000', 5, '2020-05-28 20:15:36', '2021-11-04 16:16:07'),
(2, 2, 'Megali Vretania Hotel', 'Athens', 'Syntagma', 'room-2.jpg', 2, 500, 'Vasilis Olgas, 115', '37.9765250', '23.7353970', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 1, 1, 0, '5.0000000', 5, '2020-05-28 20:15:36', '2021-10-28 16:39:15'),
(3, 3, 'Apollo Hotel', 'Athens', 'Kentro', 'room-3.jpg', 3, 420, 'Achilleos 10', '37.9853780', '23.7199320', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 1, 1, 1, '4.1250000', 8, '2020-05-28 20:15:36', '2021-11-01 22:15:09'),
(4, 2, 'Oscar Hotel', 'Athens', 'Kentro', 'room-4.jpg', 2, 250, 'Filadelfias 25', '37.9973410', '23.7219820', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.\r\n', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 0, 1, 0, '4.7143000', 14, '2020-05-28 20:15:36', '2021-10-31 15:51:02'),
(5, 2, 'Anatolia Hotel', 'Thessaloniki', 'Kentro', 'room-5.jpg', 2, 400, 'Lagkada 13', '40.6477560', '22.9342730', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 1, 1, 1, '3.5000000', 2, '2020-05-28 20:15:36', '2021-10-24 21:37:24'),
(6, 3, 'Nea Metropolis Hotel', 'Thessaloniki', 'Kentro', 'room-6.jpg', 3, 320, 'Siggrou 22', '40.6446290', '22.9409210', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 0, 1, 0, '3.5000000', 4, '2020-05-28 20:15:36', '2021-10-28 16:22:29'),
(7, 2, 'Airotel Galaxy Hotel', 'Kavala', 'Kentro', 'room-7.jpg', 2, 170, 'El. Venizelou 27', '40.9431210', '24.4100360', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 1, 1, 1, '4.7500000', 8, '2020-05-28 20:15:36', '2021-10-28 00:02:26'),
(8, 4, 'Egnatia City Hotel', 'Kavala', 'Kentro', 'room-8.jpg', 4, 280, '7is Merarchias 139', '40.9479970', '24.3874950', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.', 1, 1, 0, '4.3333000', 9, '2020-05-28 20:15:36', '2021-10-28 09:26:49'),
(9, 2, 'Villa Manos Hotel Santorini', 'Santorini', 'Xwra', 'room-9.jpg', 2, 300, 'Karterados', '36.4131770', '25.4478070', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.', 0, 1, 0, '3.2857000', 7, '2020-05-28 20:15:36', '2021-10-27 23:53:27'),
(10, 3, 'Volcano View Hotel Santorini', 'Santorini', 'Xwra', 'room-10.jpg', 3, 410, 'Fira', '36.4006410', '25.4377640', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.\r\n', 1, 1, 0, '5.0000000', 1, '2020-05-28 20:15:36', '2021-11-01 16:28:32');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `room_type`
--

CREATE TABLE `room_type` (
  `type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `room_type`
--

INSERT INTO `room_type` (`type_id`, `title`) VALUES
(1, 'Single Room'),
(2, 'Double Room'),
(3, 'Triple Room'),
(4, 'Fourfold Room');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `created_time`, `updated_time`) VALUES
(1, 'hotel_admin', 'hotel_admin@collegelink.gr', '', '2020-05-28 20:15:35', '2020-05-28 20:15:35'),
(11, 'John', 'john@doe.com', 'password', '2021-10-04 18:07:56', '2021-10-04 18:07:56'),
(12, 'George', 'george@example.com', 'password123', '2021-10-04 21:05:55', '2021-10-04 21:05:55'),
(13, 'Jimmy', 'j@example.com', '$2y$10$/.0B8H8DkgP7qnZ96FWeYegKf1DSdNByigK2xbF3jMwJo08ln67/i', '2021-10-04 21:22:23', '2021-10-04 21:22:23'),
(14, 'nikoleta', 'kostas@swissport.gr', '$2y$10$uq6dvSPBLfp.WMs8KZdK7OW6zjudA2BhemsbtnqNaEiCGTyrkoxe.', '2021-10-07 14:08:26', '2021-10-07 14:08:26'),
(17, 'doe', 'doe@example.com', '$2y$10$j4bOpTzO64joF5Mee7Mh7elYYqHt6MK7p6X1SOHRA9S8qNGgMlvN6', '2021-10-07 14:18:31', '2021-10-07 14:18:31'),
(18, 'eirini', 'eir@gmail.com', '$2y$10$93FIcxmF4E2nFaMNe7SlE.yeuCpbruakbcCVbDRo61Xtg2Q.jY4VG', '2021-10-07 14:25:09', '2021-10-07 14:25:09'),
(19, 'mike', 'mike2@gmail.com', '$2y$10$jIMa9te429c/yeZvpI276Ofs1.GI3cUtjELsp.ufBuy85a8KDMm1W', '2021-10-07 14:38:33', '2021-10-07 14:38:33'),
(20, 'xara', 'xar@gmail.com', '$2y$10$T2S35M0tXMH8FCyo8HcbgOkZ85ASbpxVTCpqbjcJzmYNolo286BXq', '2021-10-07 15:42:48', '2021-10-07 15:42:48'),
(21, 'boubis', 'boubis@gmail.com', '$2y$10$0FdeS.WyxzwznAaK7CoOw.A/9E.OKVAbZlQfylNnSkDxeajOgX6KC', '2021-10-07 20:46:06', '2021-10-07 20:46:06'),
(22, 'india', 'india@example.com', '$2y$10$WtMgtOpnCCbQfz0DNjf4AuE.64l59Pj0kLR0Gdzef2CVmsxC.1T3O', '2021-10-10 21:18:54', '2021-10-10 21:18:54'),
(23, 'u1', 'u1@gmail.com', '$2y$10$VI8ESdeE9c802t0TEK54..m4lsVfDp6aoWJpsplL8ZUQUr1shxeOe', '2021-10-14 19:20:25', '2021-10-14 19:20:25'),
(24, 'vana', 'vana@gmail.com', '$2y$10$Xs6h3V8x/d9r2nhjlybVL.gLq3tni/HLU5lYK/i10gaVErDPXJYu6', '2021-10-15 16:57:53', '2021-10-15 16:57:53'),
(25, 'aka', 'aka@gmail.com', '$2y$10$ghUQIzXjFHLd8Fk3xTG3DeA9WwFjkPXM3WAjgahfcUBQWFf/cdHha', '2021-10-15 20:31:39', '2021-10-15 20:31:39'),
(26, 'bill', 'xenos@gmail.com', '$2y$10$ppQCO8gF5v5oGyx/s3NeSeDfx1mUTJ7ormSlD/lYTHdDOwWQj.A6a', '2021-10-15 20:34:49', '2021-10-15 20:34:49'),
(27, 'dioni', 'dioni@yahoo.gr', '$2y$10$1DtdgKntPFCt46aaoOCHXOcCKUXR.h5f215mqSLa.FrTSFNmiyF1y', '2021-10-17 18:24:56', '2021-10-17 18:24:56'),
(28, 'onoma', 'onoma@onoma.gr', '$2y$10$GinPpSIAAlPODjfDwiGVIeDSLGjsMRGs8bBiDPlyh2WRTzgDICxE6', '2021-10-18 23:13:12', '2021-10-18 23:13:12'),
(29, 'manolis', 'manolis@gmail.com', '$2y$10$3TCeUspsP3eKHqRLBKc3RuzXduKUqhjVjW.xc590TvUcGxSWCy9xC', '2021-10-21 21:22:34', '2021-10-21 21:22:34'),
(30, 'ioanna', 'ioanna@in.gr', '$2y$10$D8bsJJY8iPBPpfdNcdu6quMqhWc6RnjdNgzKhHSzDncNwAIIh1gG.', '2021-10-24 21:52:30', '2021-10-24 21:52:30'),
(33, 'xristos', 'xristos@gmail.com', '$2y$10$P1WCSPSlQ6rYJKqY4SEx9u60Gwf54H5EKG5M8Jp6NSaJv19OxHhji', '2021-11-01 12:37:23', '2021-11-01 12:37:23'),
(35, 'xios', 'xios@xios.gr', '$2y$10$AFJUIQ3hU4Wg7AZkUpc/beX9LOCR3nJDqpylKojP6IlQ8OG.EuGoe', '2021-11-01 12:57:01', '2021-11-01 12:57:01'),
(40, 'kostas', 'kostas@gmail.com', '$2y$10$NKo879Ss.o8rjK8cZQDmCee.ojsYWtOtvnwEAOZQKN5TT.FQW53yq', '2021-11-04 17:57:37', '2021-11-04 17:57:37'),
(41, 'mari', 'mari@gmail.com', '$2y$10$fTwTDuCnvwSLvmzKf72fPeKa9k6kygPJ87nGVhFArB/JThlSeb5fK', '2021-11-04 18:05:20', '2021-11-04 18:05:20'),
(42, 'theo', 'theo@gmail.com', '$2y$10$XoiVzMB/tHqtC.wktsrkY./n8QCUFL1lvy54avlIzrqVgcw5MU8WC', '2021-11-04 18:06:17', '2021-11-04 18:06:17'),
(43, 'erasmia', 'erasmia@gmail.com', '$2y$10$gOgF7FuKnsQnhxOBotNzxeLXfB.VrpAaiqH05u1hP7ZJVYa0tFfhW', '2021-11-05 13:02:19', '2021-11-05 13:02:19');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_booking__room_idx` (`room_id`),
  ADD KEY `fk_booking__user_idx` (`user_id`);

--
-- Ευρετήρια για πίνακα `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`user_id`,`room_id`),
  ADD KEY `fk_favorite__room_idx` (`room_id`);

--
-- Ευρετήρια για πίνακα `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_review__room_idx` (`room_id`),
  ADD KEY `fk_review__user_idx` (`user_id`);

--
-- Ευρετήρια για πίνακα `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_room__room_type_idx` (`type_id`);

--
-- Ευρετήρια για πίνακα `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT για πίνακα `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT για πίνακα `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `room_type`
--
ALTER TABLE `room_type`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking__room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fk_favorite__room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favorite__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review__room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_review__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room__room_type` FOREIGN KEY (`type_id`) REFERENCES `room_type` (`type_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
