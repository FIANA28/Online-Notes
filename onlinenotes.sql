
  
--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `user_id`, `resetkey`, `time`, `status`) VALUES
(1, 1, '0fb312573cac0737aa1b6effa8cce3e0', 1605816254, 'pending');

-- --------------------------------------------------------

--
-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 29, 2020 at 09:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `onlinenotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resetkey` char(32) NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note`, `time`) VALUES
(7, 1, 'This is note', 1223456665),
(9, 10, 'border-left-width: 20px; border-left-width: 20px; border-left-width: 20px; border-left-width: 20px; border-left-width: 20px; ', 1605864388),
(28, 10, 'it works now!!!!!!!', 1605865213),
(30, 11, 'test for anna3', 1606475622);

-- --------------------------------------------------------

--
-- Table structure for table `rememberme`
--
  CREATE TABLE `rememberme` (
  `id` int(11) NOT NULL,
  `authentificator1` char(20) NOT NULL,
  `f2authentificator2` char(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rememberme`
--

INSERT INTO `rememberme` (`id`, `authentificator1`, `f2authentificator2`, `user_id`, `expires`) VALUES
(1, '2ea696b33931034bf2da', '8896fecf7a5e0986d3766cab58753a89c9503385b88792ff4c7fc6614c5fbbee', 9, '2020-12-04 14:35:54'),
(2, 'c525fc076f1991b9cdf9', '666e8eb88654273a34088ef8e3fac60afcc751f60739e69277d2a0c2e8c4374c', 11, '2020-12-12 11:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `activation` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `activation`) VALUES
(9, 'Anna', 'anna@anna.com', 'ANNAanna1', ''),
(10, 'Anna2', 'anna2@gmail.com', '78bb51160f959df6a64933c36d76ace16ba9971ad5086c95333c19a7bd1e8f9e', ''),
(11, 'Anna3', 'soinia4@gmail.com', 'aede378014491cfc8df54781f8a04f26cd480a2ae4069e60de831f7841457245', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rememberme`
--
ALTER TABLE `rememberme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rememberme`
--
ALTER TABLE `rememberme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
