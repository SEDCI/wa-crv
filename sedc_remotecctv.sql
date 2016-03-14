-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 06:50 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sedc_remotecctv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registered_date` datetime NOT NULL,
  `registered_by` varchar(20) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `registered_date`, `registered_by`, `group_id`) VALUES
(1, 'admin', '$2y$10$dWMoZWJIUyohYjM3WE5mO.2nXpNyuA9m3uEiu7yp5eDp9blh6fFr6', '2015-12-02 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `port` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive, (I)nactive, (R)emoved',
  `date_updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `user_id`, `name`, `ip_address`, `port`, `date_added`, `status`, `date_updated`) VALUES
(1, 1, 'rockyhikvision', '::1', 80, '2015-12-02 00:00:00', 'A', '2016-01-12 10:45:23'),
(2, 2, 'hikvision', '::1', 80, '2015-12-04 08:43:33', 'A', '2016-01-11 14:31:02'),
(4, 1, 'hikvision1', '::1', 80, '2015-12-07 06:16:38', 'A', '2016-01-12 10:45:23'),
(5, 2, 'provision-isr', '::1', 80, '2015-12-07 07:00:35', 'A', '2016-01-13 19:25:10'),
(6, 2, 'q-see', '::1', 85, '2015-12-07 07:02:33', 'I', '2016-01-14 10:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `company` varchar(150) NOT NULL,
  `user_key` varchar(60) NOT NULL,
  `status` char(1) NOT NULL COMMENT '(A)ctive, (I)nactive, (R)emoved',
  `date_registered` datetime NOT NULL,
  `date_updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `last_name`, `first_name`, `company`, `user_key`, `status`, `date_registered`, `date_updated`) VALUES
(1, 'rocky', '$2y$10$dWMoZWJIUyohYjM3WE5mO.2nXpNyuA9m3uEiu7yp5eDp9blh6fFr6', 'rocky.borlaza@sedci.com', 'Borlaza', 'Rocky', 'South Eastern Data Center, Inc.', '123456789', 'A', '2015-12-02 00:00:00', '2015-12-07 11:25:18'),
(2, 'sedci2015', '$2y$10$dWMoZWJIUyohYjM3WE5mO.cjTzG8V6NHPonQ9zGBBFp6ePJdUVUz.', 'rocky.borlaza@southeasterndatacenter.com', 'Borlaza', 'Rocky', 'SEDCI', '133ca9db587707d0898fe62b56bbada2', 'A', '2015-12-03 08:01:58', '2016-01-20 16:00:35'),
(4, 'rich123', '$2y$10$dWMoZWJIUyohYjM3WE5mO.JZZLSmMQeCp3bk5KTdetyWkYphJgsUC', 'test@email.com', 'Fernandez', 'Rich', 'SEDCI', 'f483892b128dd2a2ef0da69e4b217ca6', 'A', '2015-12-07 09:58:39', '2015-12-07 09:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
