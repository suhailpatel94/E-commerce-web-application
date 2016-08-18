-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 06:39 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `product` varchar(250) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT '0',
  `total` float(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `img_url`, `product`, `price`, `quantity`, `total`) VALUES
(42, 'a', 'product_images/cg2.jpg', 'Grinder', 5.00, 3, 15.00),
(43, 'aa', 'product_images/apple.jpg', 'Apple', 5.00, 1, 5.00),
(44, 'a', 'product_images/cg1.jpg', 'coffee grinder', 10.00, 4, 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category`, `img`) VALUES
(1, 'Fruits', 'product_images/apple.jpg'),
(2, 'kitchen', 'product_images/cg1.jpg'),
(3, 'Vegetables', 'product_images/green pepper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
  `id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `img_url` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` float(10,2) NOT NULL,
  `featured` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`id`, `description`, `img_url`, `name`, `category`, `price`, `featured`) VALUES
(1, '', 'product_images/cg2.jpg', 'Grinder', 'kitchen', 5.00, 1),
(2, '', 'product_images/apple.jpg', 'Apple', 'fruits', 5.00, 1),
(3, '', 'product_images/Red Pepper.jpg', 'Red Pepper', 'vegetables', 5.00, 0),
(4, '', 'product_images/fuji apples.jpg', 'Fuji Apples', 'fruits', 6.00, 0),
(5, '', 'product_images/cg1.jpg', 'coffee grinder', 'kitchen', 10.00, 1),
(6, '', 'product_images/mango1.jpg', 'Mango', 'Fruits', 8.00, 0),
(7, '', 'product_images/banana.jpg', 'Banana', 'Fruits', 6.00, 0),
(8, '', 'product_images/beetroot.jpg', 'Beetroot', 'Vegetables', 4.00, 0),
(9, '', 'product_images/lemon.jpg', 'Lemon', 'Fruits', 3.00, 0),
(10, '', 'product_images/potato.jpg', 'Potato', 'Vegetables', 3.00, 0),
(11, '', 'product_images/tomato.jpg', 'Tomato', 'Vegetables', 3.00, 0),
(12, '', 'product_images/cauliflower.jpg', 'cauliflower', 'Vegetables', 3.00, 0),
(13, '', 'product_images/fork.jpg', 'Fork', 'Kitchen', 2.00, 0),
(14, '', 'product_images/knife.jpeg', 'Knife', 'Kitchen', 2.00, 1),
(15, '', 'product_images/blender.jpg', 'Blender', 'Kitchen', 20.00, 1),
(16, '', 'product_images/mixer.jpg', 'Mixer', 'Kitchen', 12.00, 1),
(17, '', 'product_images/onion.jpg', 'Onion', 'Vegetables', 6.00, 0),
(18, '', 'product_images/plate.jpeg', 'Plate', 'Kitchen', 5.00, 1),
(19, '', 'product_images/spoon.jpg', 'Spoon', 'Kitchen', 2.00, 0),
(20, '', 'product_images/teacup.jpeg', 'Tea cup', 'Kitchen', 4.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`) VALUES
(15, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'a.a@a.co', 0),
(16, 'aa', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 'a@a.c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
