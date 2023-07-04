-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 10:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `a_full_name` varchar(60) NOT NULL,
  `a_username` varchar(60) NOT NULL,
  `a_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_full_name`, `a_username`, `a_password`) VALUES
(1, 'Umar Shaikh', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `fruit_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `fruit_id`, `cart_qty`, `cart_total`, `user_id`) VALUES
(12, 1, 1, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_name` varchar(60) NOT NULL,
  `cat_fruits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_fruits`) VALUES
(1, 'Apples & Bananas', 6),
(2, 'Berries', 1),
(5, 'Citrus Fruits', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fruit`
--

CREATE TABLE `fruit` (
  `f_id` int(100) NOT NULL,
  `f_name` varchar(60) NOT NULL,
  `f_price` varchar(100) NOT NULL,
  `f_desc` text NOT NULL,
  `f_category` int(11) NOT NULL,
  `f_img` varchar(60) NOT NULL,
  `f_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fruit`
--

INSERT INTO `fruit` (`f_id`, `f_name`, `f_price`, `f_desc`, `f_category`, `f_img`, `f_qty`) VALUES
(1, 'Apples - Washington', '100', 'Washington is Medium to large, elongated bright red apple with creamy yellow flesh. Red Delicious is the most popular apple in the United States. Enjoy every bite of the All time favourite apples of the world.      ', 1, 'Apple_Washington.jpg', 36),
(4, 'Strawberry', '120', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque dolore, nam vero blanditiis repellat odio fugiat perferendis incidunt quasi quod magnam quis eos in eum tempore veniam tempora.                                ', 2, 'product-2.jpg', 195),
(5, 'Custard Apple', '299', 'The custard apple is a fruit of an evergreen plant. It can be spherical, heart-shaped, oblong, or irregular to look at. While it has an inedible and rough coat, on the inside it is soft. It has a sweet taste.\r\n#Good source of potassium and magnesium\r\n#Rich in vitamin C', 1, 'custard-apple.jpg', 50),
(6, 'Green Apple', '329', 'Green apples are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads.\r\n#Best addition to salads\r\n#Delicious and Natural', 1, 'green-apple.jpg', 100),
(7, 'Banana Golden', '90', 'Bnanan are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads.\r\n#Best addition to salads\r\n#Delicious and Natural', 1, 'banana-golden.jpg', 1200),
(8, 'Amla', '120', '                Amla are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads.\r\n#Best addition to salads\r\n#Delicious and Natural                ', 2, 'amla.jpg', 500),
(9, 'Orange', '120', '                Oranges are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads.\r\n#Best addition to salads\r\n#Delicious and Natural                ', 5, 'orange.jpg', 300),
(10, 'Sweet Lime', '320', 'Green apples are light green in colour and have crisp and juicy white flesh, which has a tart taste compared to red apples. Green apple has its share of die-hard fans who relish it as a snack and in recipes like salads.\r\n#Best addition to salads\r\n#Delicious and Natural', 5, 'sweet-lime.jpg', 600);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fruit_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `order_date` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_payment` varchar(100) NOT NULL,
  `fruit_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fruit_name`, `qty`, `price`, `total`, `order_date`, `status`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_payment`, `fruit_id`, `user_id`) VALUES
(7, 'Apples - Washington', 13, 100, 1300, '09-02-2023', 'On Delivery', 'Umarjhh', 'umar@mhhail.com', '66687', 'yhfyhfyhhh', 'Cash On Delivery', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Umar', 'umar@mail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fruit`
--
ALTER TABLE `fruit`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
