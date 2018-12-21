-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 05:53 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `admin_photo` varchar(64) DEFAULT NULL,
  `active` int(4) NOT NULL DEFAULT '0',
  `activation_token` varchar(255) NOT NULL,
  `reset_token` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `username`, `password`, `email`, `admin_photo`, `active`, `activation_token`, `reset_token`) VALUES
(8, 'Max Nayeem', 'max.nayeem', '$2y$10$N412Z7tpp20y7Tri0tj51ekfaxI70EAy9s5zZJnizBzdwCJVvoyTu', 'max.nayeem@yahoo.com', '31.jpg', 1, '', ''),
(9, 'AHN Nayeem', 'ahnayeem', '$2y$10$4tlAlGd0QJMNMP/0AuBNJeiqs7dZBi5LtmOC4qlfVJ866.d2UCFxS', 'ahn.nayeem@gmail.com', '1.jpg', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ip_addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `qty`, `ip_addr`) VALUES
(16, 6, 5, '::1'),
(17, 9, 5, '::1'),
(18, 5, 5, '::1'),
(19, 1, 1, '::1'),
(20, 2, 1, '::1'),
(21, 1, 1, '127.0.0.1'),
(22, 4, 1, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_photo` varchar(64) DEFAULT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`, `category_photo`, `entry_date`, `status`) VALUES
(1, 'Easy T-shirt New', 'Lorem ipsum seet a meet', '1517060606levis-rust-polo-t-shirt.jpg', '2018-02-04 15:11:45', 1),
(2, 'T Shirt - Round Neck - Printed', 'Finished goods are usually packed in cartoon or poly packs', '1517391179men-s-t-shirt-250x250.jpg', '2018-02-04 15:11:47', 1),
(3, 'Men\'s Round Neck T-Shirt', 'Enriched by our vast industrial experience in this business, we are involved in offering an enormous quality range of Men\'s Round Neck T-Shirt.', '1517391218men-s-round-neck-t-shirt-250x250.jpg', '2018-01-31 09:38:36', 1),
(4, 'Men\'s Polo T-Shirt', 'We are highly acknowledged organization engaged in presenting remarkable range of Men\'s Polo T-Shirt.', '1517391243men-s-polo-t-shirt-250x250.jpg', '2018-02-04 15:11:49', 1),
(5, 'Hooded T Shirts', 'Hooded T Shirts. Lorem ipsum seet a meet.', '1517391286hooded-t-shirt-child-500x500.jpg', '2018-01-31 09:38:27', 1),
(6, 'Men\'s Printed T-Shirt', 'We offer our clients an exclusive range of Men\'s Printed T-Shirt', '1517391326men-s-printed-t-shirt-250x250.jpg', '2018-02-04 15:11:52', 1),
(7, 'Men\'s Fancy T-Shirt', 'Leveraging over the skills of our qualified team of professionals, we are instrumental in offering wide range of Men\'s Fancy T-Shirt.', '1517391383men-s-fancy-t-shirt-250x250.jpg', '2018-01-31 09:38:22', 1),
(8, 'Men\'s T-Shirt', 'Hooded T Shirts. Lorem ipsum seet a meet.', '1517391447collar-250x250.jpg', '2018-02-04 15:13:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `billing_address` text,
  `city` varchar(80) NOT NULL,
  `postcode` int(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `cpassword` varchar(80) NOT NULL,
  `newsletter` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email`, `phone`, `billing_address`, `city`, `postcode`, `password`, `cpassword`, `newsletter`) VALUES
(1, 'AH Nayeem', 'ahn.nayeem@gmail.com', '01748855224', 'Rangpur', 'Rangpur', 1200, '$2y$10$vRNZ5osAACq3aOhQ5wM4LehLXL9dLuOxtvPmJt/4WEvrSFts4lVQq', '$2y$10$VoOrmFpap0IIeViKAOd8uefEa83ZJeoRj0vK0.QnsJu.d0InB5M/m', 1),
(2, 'nayeem', 'nayeem@gmail.com', '0178582514', 'rangpur', 'rangpur', 1216, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `payment_method` varchar(32) NOT NULL,
  `total_amount` float NOT NULL,
  `status` varchar(16) DEFAULT NULL,
  `shipping_method` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(32) NOT NULL,
  `sub_text` varchar(100) NOT NULL,
  `product_photo` varchar(64) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `is_featured` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `sub_text`, `product_photo`, `product_desc`, `product_price`, `product_discount`, `product_qty`, `is_featured`) VALUES
(1, 1, 'T-shirt', 'T-Shirt', '1517063006levis-rust-polo-t-shirt.jpg', 'Lorem Ipsum Seet ammet.', 580, 10, 200, 0),
(2, 4, 'T-shirt New', 'T-Shirt', '1517550985collar-250x250.jpg', 'Lorem ipsum seet amet.Lorem ipsum seet amet.Lorem ipsum seet amet.Lorem ipsum seet amet.Lorem ipsum seet amet.', 420, 5, 20, 0),
(3, 1, 'dgdsfg', 'sdfgsdf', '1518182902men-s-round-neck-t-shirt-250x250.jpg', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsumlorem ipsum lorem lorem ipsum lorem ipsumlorem ipsum lorem ipsum', 100, 0, 7, 1),
(4, 1, 'T-shirt', '', '1518184186hooded-t-shirt-child-500x500.jpg', 'Lorem ipsum seet amet.Lorem ipsum seet amet.Lorem ipsum seet amet.', 599, 5, 5, 1),
(5, 1, 'Navy Blue Cotton T-shirt For Men', 'T-Shirt', '151850033531.jpg', 'Easy Fashion House is a trusted and reliable source for all your garment related needs from Bangladesh. Easy Fashion House manufactures and supplies quality products in all categories at a competitive price range from their own and sister production facility.', 350, 0, 50, 1),
(6, 1, 'Right Mask Black Cotton T-Shirt ', 'T-Shirt', '151850047121.jpg', 'Right Mask Aim to establish customer satisfaction.Right now in our country is not giving proper satisfaction as in their demand.we are here to try.', 510, 0, 15, 1),
(7, 1, 'Black Cotton T-Shirt For Men', 'T-Shirt', '151850058711.jpg', 'Right Mask Aim to establish customer satisfaction.Right now in our country is not giving proper satisfaction as in their demand.we are here to try.', 510, 0, 30, 1),
(8, 1, ' Exclusive Black And Ash Cotton ', 'T-Shirt', '15185006542.jpg', 'BD Exclusive offer exclusive imported products from USA, China, Hong- Kong other countries. All products are \"A\" Certified.', 510, 5, 25, 1),
(9, 1, 'Ash And Black Cotton T-shirt For', 'T-Shirt', '15185007901.jpg', 'BD Exclusive offer exclusive imported products from USA, China, Hong- Kong other countries. All products are \"A\" Certified.', 449, 0, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(32) NOT NULL,
  `payment_details` text NOT NULL,
  `status` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `company` varchar(128) NOT NULL,
  `billing_address` text,
  `city` varchar(80) NOT NULL,
  `postcode` int(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `cpassword` varchar(80) NOT NULL,
  `newsletter` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `company`, `billing_address`, `city`, `postcode`, `password`, `cpassword`, `newsletter`) VALUES
(1, 'AH Nayeem', 'max.nayeem.mn@gmail.com', '01748855224', 'Professional It', 'Rangpur', '0', 1212, '$2y$10$PHoZl7AHpVuLo/LVxVyZ5ePpv9vw8v6hL1bDhRTDdLee9D.eplA8m', '$2y$10$WTuBQA40Ec/G7Von2tsFe.9p1VbsDJVYnFNvPxMmITHEr8lMH5xze', 1),
(2, 'ah nayeem', 'admin@admin.com', '01748855224', 'Professional It', 'Rangpur', 'Rangpur', 1212, '$2y$10$kforNVtjKogUCGI/G6PVxOMzViPxWF4snK93OL.uiGwBoQF9bJ1kq', '$2y$10$bBDcP3W.SIBfp/suJ6xN2.uzEnNZkCxSc0s8ObNVEutq.GBBXd/iy', 1),
(3, 'Smart-Shop', 'smart@shop.com', '01748855224', 'Professional It', 'Rangpur', 'Rangpur', 1212, '$2y$10$DQFi/EHRyohAKjriTDahku6Uj5UsBJdTxnjWPKZahOkv5VW0x2Lq2', '$2y$10$zvg4CHwv5yTBgISfXOH1O.ZgZJ0t4C8eHnBgqHUcBCgTa1FaajBjm', 1),
(4, 'Max Nayeem', 'max.nayeem@yahoo.com', '01748855224', 'Professional It', 'Rangpur', 'Rangpur', 1212, '$2y$10$Bhw6ABoSRLLwX8AlokejPuqdGGT9Q.5d96MBdpMnHveLwaKb6eirO', '$2y$10$2iP83nLSUB79WVkYhjXZxuDHK.qcByJMwjWMMkDpGEL9xEvKIunpm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`customer_name`,`email`,`phone`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`name`,`email`,`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
