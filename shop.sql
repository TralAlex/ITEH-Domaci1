-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 08:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE DATABASE shop;

USE shop;

CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `phone`, `address`) VALUES
( 'admin', 'admin', 'Admin', '1', 'USA'),
( 'mark', 'admin', 'Mark', '2', 'UAE'),
( 'stef', 'admin', 'Stef', '3', 'UK'),
( 'peter', 'admin', 'Peter', '4', 'RUS');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brandid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `brandname` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandname`) VALUES
('Samsung'),
('Apple'),
('Xiaomi'),
('Huawei');


-- -- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Productid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `storage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci,
  `Brandid` int,
  FOREIGN KEY (`Brandid`) REFERENCES brand(Brandid)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`model`, `ram`, `storage`, `price`, `colour`, `os`, `Brandid`,`slika`) VALUES
('12', '4','256','640$','black','IOS', 2,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg'),
('S21', '8','256','1040$','blue','Android', 1,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg'),
('Nova 3', '4','64','440$','black','Harmony', 4,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg'),
('12 lite', '6','64','240$','blue','Android', 3,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg'),
('13', '4','128','940$','red','IOS', 2,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg'),
('A53', '6','128','340$','blue','Android', 1,'https://www.mobilplanet.net/wp-content/uploads/2022/02/iphone-12-Black_4.jpg');

