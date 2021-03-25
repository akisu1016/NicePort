-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2021 at 05:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nice_port`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Music'),
(2, 'Photo'),
(3, 'Movie'),
(4, 'Game'),
(5, 'Food'),
(6, 'Animals'),
(7, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_value` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_value`, `comment_date`, `user_id`) VALUES
(18, 'It is looks like good. ', '2021-03-17 13:20:04', 4),
(19, 'うまそう', '2021-03-17 13:20:13', 4),
(20, '零式やれ', '2021-03-17 13:34:23', 2),
(21, '\'素敵\'', '2021-03-19 10:28:34', 4),
(22, 'good!!', '2021-03-22 13:17:01', 4),
(23, 'good!!', '2021-03-22 20:21:56', 4),
(24, '面白すぎる', '2021-03-22 20:23:01', 4),
(25, 'roboroborobo', '2021-03-24 12:40:30', 6),
(26, 'nice', '2021-03-25 10:04:04', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(100) NOT NULL,
  `picture_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`picture_id`, `picture_url`) VALUES
(42, 'uploads/7ooKZ6TfBgnMI1eGwyODzwgzv9hJEXnu.jpg'),
(43, 'uploads/8d9e.jpeg'),
(44, 'uploads/d9730fc48fc1f2d675b7adc7f10bed62.jpeg'),
(45, 'uploads/pexels-bri-schneiter-346529.jpg'),
(46, 'uploads/20200828-135135-header-696x385.jpg'),
(47, 'uploads/cBE56mQPnfQZMyKML8osBtklpk.png'),
(48, 'uploads/pexels-cottonbro-4709822.jpg'),
(49, 'uploads/pexels-pixabay-45243.jpg'),
(50, 'uploads/pexels-rene-asmussen-1327430.jpg'),
(51, 'uploads/28.img_4313-1.jpg'),
(52, 'uploads/29.a471529_alice_b-1.jpg'),
(53, 'uploads/41.file-20191021-56215-1wq7k71.jpg'),
(54, 'uploads/45.cat-banner.jpg'),
(55, 'uploads/46.cute-3252251.jpg'),
(56, 'uploads/pexels-cottonbro-4709822.jpg'),
(57, 'uploads/pexels-luana-bento-3357078.jpg'),
(58, 'uploads/pexels-pixabay-45243.jpg'),
(59, 'uploads/pexels-cottonbro-4709822.jpg'),
(60, 'uploads/pexels-luana-bento-3357078.jpg'),
(61, 'uploads/pexels-pixabay-45243.jpg'),
(62, 'uploads/shukatu-trimed.jpg'),
(63, 'uploads/map_pin_shadow.png'),
(64, 'uploads/kinniku_hanasu.png'),
(65, 'uploads/pexels-alexandr-podvalny-2166553.jpg'),
(66, 'uploads/pexels-thorsten-technoman-338515.jpg'),
(67, 'uploads/pexels-oliver-sjÃ¶strÃ¶m-1020016.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_icon` text NOT NULL,
  `user_profile` text DEFAULT NULL,
  `mail_address` varchar(200) NOT NULL,
  `password` varchar(99) NOT NULL,
  `added_date` date NOT NULL,
  `deleted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_icon`, `user_profile`, `mail_address`, `password`, `added_date`, `deleted_date`) VALUES
(1, 'test_user', '', 'anything write', 'test@email.com', '$2y$10$vLRHMQgXGgJh6kbDaLd6relPN2CNNs/HBhyJIAS5gyPFljeP0k2LS', '2021-03-10', NULL),
(2, 'eample', '', 'create example', 'example@example.com', '$2y$10$v1195e9DRUjG4TLuZWBxtuJQutlLrage2cqlAva0GFBSaql9qU0yG', '2021-03-10', NULL),
(4, 'gomi_tachibana', 'uploads/icons/kaden_taijukei.png', 'test function.\r\nI like hoge.', 'test_test@email.com', '$2y$10$7vA1U.Mc2TJakNUCEj1Wn.XRHqSRnKVYGg5dtkaJqrzHwkXMNDCW2', '2021-03-12', NULL),
(6, 'robot', '', 'Hello, human.', 'robo@email.com', '$2y$10$RBlKcL0lTMscpPFKFGg9gOIY8Gy/./chSPAuFXf.sab0WsLIShnkC', '2021-03-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `work_id` int(100) NOT NULL,
  `work_title` varchar(20) NOT NULL,
  `detail` text DEFAULT NULL,
  `category_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nice` int(11) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`work_id`, `work_title`, `detail`, `category_id`, `user_id`, `nice`, `added_date`) VALUES
(25, 'crime food', 'If you eat this, your health is broken.\ni am hungry', 5, 4, 9, '2021-03-17'),
(26, 'いなりが入っているが？', 'I like a Inari sushi.\r\nI\'m hungry.\r\nhoge', 5, 4, 121, '2021-03-17'),
(27, 'Where is this?', 'I dont know this area.', 2, 1, 8, '2021-03-17'),
(28, 'FF14', 'Any other people should play this game.', 4, 1, 28, '2021-03-17'),
(30, 'sample', 'sample detail\r\nyou can write anything.', 1, 2, 42, '2021-03-17'),
(31, 'Cat is a God.', '???????????', 6, 2, 32, '2021-03-17'),
(33, '管楽器はいいぞ', 'I was tired writing any details in English.', 1, 2, 0, '2021-03-17'),
(43, 'beautiful world', 'I think so.', 2, 6, 21, '2021-03-24'),
(44, 'great fall', 'ヤベーところ', 7, 6, 0, '2021-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `works_comments`
--

CREATE TABLE `works_comments` (
  `work_id` int(255) NOT NULL,
  `comment_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works_comments`
--

INSERT INTO `works_comments` (`work_id`, `comment_id`) VALUES
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(22, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(23, 10),
(23, 11),
(22, 12),
(22, 13),
(22, 14),
(22, 15),
(21, 16),
(21, 17),
(25, 18),
(25, 19),
(28, 20),
(31, 21),
(30, 22),
(31, 23),
(35, 24),
(30, 25),
(31, 26);

-- --------------------------------------------------------

--
-- Table structure for table `works_pictures`
--

CREATE TABLE `works_pictures` (
  `work_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works_pictures`
--

INSERT INTO `works_pictures` (`work_id`, `picture_id`) VALUES
(25, 42),
(25, 43),
(26, 44),
(27, 45),
(28, 46),
(28, 47),
(29, 48),
(29, 49),
(30, 50),
(31, 51),
(31, 52),
(31, 53),
(31, 54),
(31, 55),
(32, 56),
(32, 57),
(32, 58),
(33, 59),
(33, 60),
(33, 61),
(35, 62),
(37, 63),
(41, 64),
(43, 65),
(43, 66),
(44, 67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `works_pictures`
--
ALTER TABLE `works_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `work_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
