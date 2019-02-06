-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2019 at 01:59 AM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.3.1-1+ubuntu18.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cantres`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc_1` text NOT NULL,
  `desc_2` text NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `p_1` int(11) NOT NULL,
  `p_2` int(11) NOT NULL,
  `p_3` int(11) NOT NULL,
  `p_4` int(11) NOT NULL,
  `s_1_start` date NOT NULL,
  `s_1_end` date NOT NULL,
  `s_2_start` date NOT NULL,
  `s_2_end` date NOT NULL,
  `s_3_start` date NOT NULL,
  `s_3_end` date NOT NULL,
  `s_4_start` date NOT NULL,
  `s_4_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `desc_1`, `desc_2`, `adults`, `children`, `p_1`, `p_2`, `p_3`, `p_4`, `s_1_start`, `s_1_end`, `s_2_start`, `s_2_end`, `s_3_start`, `s_3_end`, `s_4_start`, `s_4_end`) VALUES
(16, 'Can TerrA', 'Aparatment descripton line nu1', 'Television / Cocoina / Secador / 23m2 / Air Conditions', 5, 3, 30, 24, 50, 60, '2019-01-01', '2019-03-31', '2019-04-01', '2019-06-30', '2019-07-01', '2019-09-30', '2019-10-01', '2019-12-31'),
(17, 'CAN MAR', 'CAN MAR descripton line nu1', 'Television / Cocoina / Secador / 23m2 / Air Conditions', 8, 5, 35, 55, 40, 70, '2019-01-01', '2019-03-31', '2019-04-01', '2019-06-30', '2019-08-01', '2019-10-31', '2019-10-01', '2019-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_images`
--

CREATE TABLE `apartment_images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(512) NOT NULL,
  `apt_id` int(11) NOT NULL,
  `is_active` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartment_images`
--

INSERT INTO `apartment_images` (`id`, `img_name`, `apt_id`, `is_active`) VALUES
(26, '1547919276_slide_aire_1.jpg', 16, '1'),
(27, '1547919279_slide_aire_2.jpg', 16, '1'),
(28, '1547919283_slide_aire_3.jpg', 16, '1'),
(29, '1548118857_slide_mar_6.jpg', 17, '1'),
(30, '1548118860_slide_mar_4.jpg', 17, '1');

-- --------------------------------------------------------

--
-- Table structure for table `cc_payments`
--

CREATE TABLE `cc_payments` (
  `id` int(11) NOT NULL,
  `cc_name` varchar(255) NOT NULL,
  `cc_number` varchar(255) NOT NULL,
  `cc_cvv` int(11) NOT NULL,
  `cc_mm` int(11) NOT NULL,
  `cc_yy` int(11) NOT NULL,
  `res_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_payments`
--

INSERT INTO `cc_payments` (`id`, `cc_name`, `cc_number`, `cc_cvv`, `cc_mm`, `cc_yy`, `res_no`) VALUES
(1, 'Wasym Shykh', '4454545454545454545', 245, 11, 22, 11),
(3, 'Mujsdf Wasem', '45555555555445454', 554, 12, 20, 15);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `come_from` varchar(255) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `email`, `phone`, `region`, `come_from`, `note`) VALUES
(2, 'Waseem', 'Sheikh', 'test@test.com', '03201520120', 'Pakistan', 'Facebook', 'Hello World'),
(3, 'Ahmed', 'Ali', 'testing@test.com', '03104520120', 'France', 'Instagram', 'Hello World How are you'),
(4, 'Vikram', 'Kjil', 'kkjgldg@tetsgl.com', '03401520124', 'Itlay', 'Email', 'Hello World How are you'),
(5, 'Ahmed', 'Sheikh', 'tablabajao@yandex.com', '03104520120', 'Pakistan', 'Facebook', 'Hello World'),
(6, 'Ali', 'Sheikh', 'test@test.com', '03104520120', 'Pakistan', 'Email', 'hello worldz'),
(17, 'Waseem', 'Sheikh', 'test@test.com', '03201520120', 'Pakistan', 'Other', 'Hello World'),
(20, 'Muham', 'Wasm', 'testing@test.com', '454545454244', 'Itlay', 'Facebook', 'Nothing'),
(21, 'Muham', 'Wasm', 'test@test.com', '454545454244', 'Itlay', 'Facebook', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`name`, `value`) VALUES
('came_froms', 'Facebook, Instagram, Email List');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `res_no` int(11) NOT NULL,
  `reserve_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `apt_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `payment_via` varchar(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`res_no`, `reserve_date`, `start_date`, `end_date`, `apt_id`, `client_id`, `cost`, `payment_via`, `adults`, `children`, `status`) VALUES
(1, '2019-01-22', '2019-03-30', '2019-04-01', 16, 2, 84, 'paypal', 3, 2, '1'),
(2, '2019-01-22', '2019-01-02', '2019-01-10', 16, 3, 270, 'paypal', 2, 3, '1'),
(3, '2019-01-22', '2019-01-23', '2019-01-27', 16, 4, 150, 'Credit Card', 3, 1, '1'),
(4, '2019-01-22', '2019-03-30', '2019-04-01', 17, 5, 125, 'paypal', 1, 3, '1'),
(11, '2019-01-23', '2019-01-24', '2019-01-26', 17, 17, 116, 'Credit Card', 1, 2, '0'),
(14, '2019-02-06', '2019-02-07', '2019-02-20', 16, 20, 462, 'paypal', 2, 3, '0'),
(15, '2019-02-07', '2019-02-15', '2019-02-20', 17, 21, 210, 'Credit Card', 6, 3, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apartment_images`
--
ALTER TABLE `apartment_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cc_payments`
--
ALTER TABLE `cc_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`res_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `apartment_images`
--
ALTER TABLE `apartment_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cc_payments`
--
ALTER TABLE `cc_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `res_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
