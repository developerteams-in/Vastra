-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2024 at 07:11 AM
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
-- Database: `vstapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_size` varchar(10) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `product_name`, `product_price`, `product_image`, `product_size`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 1, 'ZARA t-shert', 564.00, '1732691515_86f799c5cc23dcca3f51.jpg', 'S', 1, 3, '2024-12-11 03:16:54', '2024-12-11 03:16:54'),
(15, 23, 'Arrivals ', 3215.00, '1732699982_3001b128334fa56e8078.jpg', 'XL', 1, 3, '2024-12-11 03:38:45', '2024-12-11 03:38:45'),
(16, 17, 'wrath', 23412.00, '1732692222_1544114e475dd5891d61.jpg', 'L', 2, 3, '2024-12-12 05:07:12', '2024-12-12 05:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` text DEFAULT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productCategory` varchar(100) NOT NULL,
  `productImage` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2024-11-18-120947', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1731931887, 3),
(4, '2024-11-22-130506', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1732281178, 4),
(5, '2024-11-23-052615', 'App\\Database\\Migrations\\CreateProductTable', 'default', 'App', 1732339674, 5),
(6, '2024-11-23-070354', 'App\\Database\\Migrations\\Orders', 'default', 'App', 1732345665, 6),
(7, '2024-11-23-092506', 'App\\Database\\Migrations\\Products', 'default', 'App', 1732354100, 7),
(8, '2024-11-29-093008', 'App\\Database\\Migrations\\CartItems', 'default', 'App', 1732872793, 8),
(11, '2024-11-29-093409', 'App\\Database\\Migrations\\Favorites', 'default', 'App', 1732958420, 9),
(12, '2024-11-30-092237', 'App\\Database\\Migrations\\CartItems', 'default', 'App', 1732959032, 10),
(13, '2024-12-07-051425', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1733548500, 11),
(14, '2024-12-07-051947', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1733548814, 12),
(15, '2024-12-07-052750', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1733549307, 13),
(16, '2024-12-10-045635', 'App\\Database\\Migrations\\CartItems', 'default', 'App', 1733806669, 14),
(17, '2024-12-10-052703', 'App\\Database\\Migrations\\CartItems', 'default', 'App', 1733808492, 15),
(18, '2024-12-10-092731', 'App\\Database\\Migrations\\CartItems', 'default', 'App', 1733822894, 16),
(19, '2024-12-11-124113', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1733921026, 17),
(20, '2024-12-12-094119', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1733996541, 18),
(21, '2024-12-12-094848', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1733997013, 19),
(22, '2024-12-12-102010', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1733998944, 20),
(24, '2024-12-12-103318', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1734000408, 21),
(25, '2024-12-12-110745', 'App\\Database\\Migrations\\AddUserIdToShippingAddress', 'default', 'App', 1734001703, 22),
(26, '2024-12-12-120325', 'App\\Database\\Migrations\\ShippingAddress', 'default', 'App', 1734005041, 23);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'pending', 10.00, '2024-11-23 12:43:24', '2024-11-23 12:43:24'),
(2, 1, 'completed', 63.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productCategory` varchar(50) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productDescription`, `productPrice`, `productCategory`, `productImage`, `created_at`, `updated_at`) VALUES
(1, 'ZARA t-shert', 'this is Zara products', 564.00, 'kids', '1732691515_86f799c5cc23dcca3f51.jpg', '2024-11-23 10:18:54', '2024-11-27 07:11:55'),
(2, 'ZARA t-shert', 'this Zara products', 534.00, 'kids', '1732690922_2a480140718b58065297.jpg', '2024-11-23 10:20:11', '2024-11-27 07:02:02'),
(3, 'ZARA T-shirt', 'this is a Zara product', 213.00, 'men', '1732689083_045201744c350dbd2c46.jpg', '2024-11-23 10:38:31', '2024-11-27 06:31:23'),
(4, 'vastra', 'this is vastra products ', 2321.00, 'kids', '1732690990_6fe0056532ec8fac7ae1.jpg', '2024-11-23 13:07:10', '2024-11-27 07:03:10'),
(5, 'VASTRA t-shirt ', 'VASTRA t-shirt For kids', 3726418.00, 'kids', '1732691076_5dacaa90483823b3829b.jpg', '2024-11-26 05:45:53', '2024-11-27 07:07:42'),
(6, 'ajwed', 'eqwdehqkedaue', 2341.00, 'kids', '1732691173_25677a35de9ca1e15193.jpg', '2024-11-26 05:48:40', '2024-11-27 07:06:13'),
(7, 'hedge', 'ekqwbekqhjeb', 34123452.00, 'kids', '1732691548_37477213d65a5fa6e242.jpg', '2024-11-26 05:54:34', '2024-11-27 07:12:28'),
(8, 'ZARA t-shirt', 'this is Zara products', 2334.00, 'ladies', '1732688061_96e0ad1cc020d6869b61.jpg', '2024-11-26 07:15:58', '2024-11-27 06:14:21'),
(9, 'vastra ', 'vassar products hjbfhsd', 3232.00, 'ladies', '1732688397_45a789d60b45ec6be6e8.jpg', '2024-11-26 09:13:52', '2024-11-27 06:19:57'),
(10, 'new', 'this new products fades', 2323.00, 'kids', '1732691578_3ca6680acba9bdbd6969.jpg', '2024-11-26 09:15:01', '2024-11-27 07:12:58'),
(11, 'new product', 'djgshfbds wtwrtrte', 3425.00, 'sport', '1732691925_e45feadc99cf83730860.jpg', '2024-11-26 09:19:12', '2024-11-27 07:18:45'),
(12, 'judge', 'gaffs gfsgf gfsggs', 344.00, 'men', '1732690033_522a01af4747848d16ad.jpg', '2024-11-26 09:24:06', '2024-11-27 06:47:13'),
(13, 'newarrivals', 'this is a newarrivals product ...', 434.00, 'ladies', '1732688651_03050ed465fe16661048.jpg', '2024-11-26 11:19:56', '2024-11-27 06:24:11'),
(14, 'NewArrivals ', 'NewArrivals NewArrivals NewArrivals ', 323.00, 'ladies', '1732689147_ea67d2ec8964ffa59ef5.jpg', '2024-11-26 11:39:12', '2024-11-27 06:32:27'),
(15, 'newarrivals', 'newarrivals newarrivals newarrivals newarrivals', 324.00, 'ladies', '1732689718_09c954f919a79818cae7.jpg', '2024-11-26 11:42:56', '2024-11-27 06:41:58'),
(16, 'eatgerfdz', 'rgaerghearhaeh', 3412.00, 'ladies', '1732689126_fbc7783e83a91d5a178b.jpg', '2024-11-26 11:43:50', '2024-11-27 06:32:06'),
(17, 'wrath', 'wargeshthgjhkjt', 23412.00, 'newarrivals', '1732692222_1544114e475dd5891d61.jpg', '2024-11-26 11:44:48', '2024-11-27 07:23:42'),
(18, 'vastra sport t-shirt ', 'this vastra product vastra sport t-shirt.', 3244.00, 'sport', '1732691954_932789ef520cfa1c56a4.jpg', '2024-11-27 05:30:39', '2024-11-27 07:19:14'),
(19, 'Men shirt ', 'uhjbfsvdgf. fhgshdf', 2313.00, 'men', '1732698381_17821e859c4b1fe56a01.jpg', '2024-11-27 09:06:21', '2024-11-27 09:06:21'),
(20, 'Men shirt ', 'njhb fbjshbdf fjbhs', 2133.00, 'men', '1732698580_942fdc03289d87d55323.jpg', '2024-11-27 09:09:40', '2024-11-27 09:09:40'),
(21, 'men shirt', 'men shirt new collection..', 4323.00, 'men', '1732698818_5b5a0157c159ef99c392.jpg', '2024-11-27 09:13:38', '2024-11-27 09:13:38'),
(22, 'Arrivals Today ', 'this is arrivals products for kids..', 4324.00, 'newarrivals', '1732699821_679d886e360b09938c67.jpg', '2024-11-27 09:30:21', '2024-11-27 09:30:21'),
(23, 'Arrivals ', 'Arrivals products for Men Jeans ', 3215.00, 'newarrivals', '1732699982_3001b128334fa56e8078.jpg', '2024-11-27 09:33:02', '2024-11-27 09:33:02'),
(24, 'Arrivals ', 'Arrivals cloth\'s Brand \'Vastra\' For kids', 4234.00, 'newarrivals', '1732700149_be1bcf75edb30e10ebd2.jpg', '2024-11-27 09:35:49', '2024-11-27 09:35:49'),
(25, 'Arrivals ', 'Arrivals Cloth\'s, Member Exclusive Prices.', 5734.00, 'newarrivals', '1732701033_873179fe6d219b72a304.jpg', '2024-11-27 09:50:33', '2024-11-27 09:50:33'),
(26, 'Arrivals', ' Arrivals New  Member Exclusive Prices', 4344.00, 'newarrivals', '1732701094_f6e1083be4993e89be32.jpg', '2024-11-27 09:51:34', '2024-11-27 09:51:34'),
(27, 'Overshirts', 'Overshirts new Arrivals Vastra Products ', 9875.00, 'men', '1732701698_39559a24295eb300544f.png', '2024-11-27 10:01:38', '2024-11-27 10:01:38'),
(28, 'New Sport Collection', 'New Sport Collection', 4355.00, 'sport', '1732701946_a16cf57963f0c7977424.jpg', '2024-11-27 10:05:46', '2024-11-27 10:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `full_name`, `phone_number`, `address`, `city`, `state`, `zip_code`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Manibhadra Singh', '6392601448', 'Mumbai,Kandivali,East', 'Mumbai', 'Maharashtra', '43432', 0, '2024-12-12 12:06:10', '2024-12-12 12:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$9V0/Ia1KiCA9koOejmSE8uUUUrFgJtroRfQVjQ3IQji5hVcYCy80i', 'admin'),
(2, 'vastra', 'vastra@gmail.com', '$2y$10$qfHqWuAmBBA4zE3W4P2e0.V45GywcdXZU.ymMOiFe1ON6rOaYCtOu', 'admin'),
(3, 'Manibhadra Singh', 'manibhadra@gmail.com', '$2y$10$TKcxlLMzOHiRBgdogHwVbuzh389eaZ/YaI0wOAXtxShGYBflAXyQ2', 'user'),
(4, 'user', 'user@gmail.com', '$2y$10$LJlMR4QQomUpTEAof6PeZu1X263STKkNdVoel9ua1D/lMDweqx6kS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
