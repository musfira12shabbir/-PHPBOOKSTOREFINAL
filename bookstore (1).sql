-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 11:25 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `email`, `description`) VALUES
(5, 'William Shakespeare', '05.jpg', 'william@gmail.com', 'William Shakespeare was an English playwright, poet and actor.'),
(6, 'Roald Dahl', '1.jpg', 'roald@gmail.com', 'Roald Dahl was a British popular author of children\'s literature and short stories.'),
(7, 'Dan Brown', '10.jpg', 'dan@gmail.com', 'Daniel Gerhard Brown is an American author best known for his thriller novels.'),
(8, 'Danielle Steel', '06.jpg', 'danielle@gmail.com', 'Danielle Fernandes Dominique Schuelein-Steel is an American writer best known for her romantic novels.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_price` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `a_id` varchar(255) NOT NULL,
  `c_id` varchar(255) NOT NULL,
  `b_description` varchar(255) NOT NULL,
  `b_pdf` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `b_name`, `b_price`, `b_image`, `a_id`, `c_id`, `b_description`, `b_pdf`) VALUES
(1, 'example 123', '25000', '11.jpg', '8', '17', 'wwwwwwwwwwww', 0x626f6f6b2e706466),
(3, 'lawser', '9000', '02.jpg', '5', '18', 'Book wrote by William Shakespear', 0x626f6f6b2e706466),
(4, 'Marina', '5000', 'marina.jpg', '8', '19', 'Book wrote by Danielle steel', 0x6d6172696e612d6f626f6f6b6f2e706466);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `description`) VALUES
(15, 'Fiction', '01.jpg', 'Fiction is any creative work, chiefly any narrative work, portraying individuals etc.'),
(16, 'Fantasy', '02.jpg', 'fantasy novels tend to stay in the real world although there\'s often a lot of crossover.'),
(17, 'Mystery', '11.jpg', 'Mystery is a fiction genre where the nature of an event, usually a murder or other crime.'),
(18, 'Self-help ', '12.jpg', 'A self-help book is one that is written with the intention to instruct its readers on solving personal problems. '),
(19, 'Romantic ', '09.jpg', 'A romantic novel generally refers to a type of genre fiction novels.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
