-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2024 at 06:45 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdlv2401`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `watermark` varchar(100) NOT NULL,
  `short_desp` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `name`, `watermark`, `short_desp`, `image`) VALUES
(2, 'Web Developer', 'Sultan Mahmud', 'Mahmud', 'I love to work.', '671be4d80fd9a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `header_logo` varchar(100) NOT NULL,
  `footer_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '671bdc3a51d2a.png', '671b97705c060.png');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `link`) VALUES
(1, 'Home', 'home'),
(2, 'Expertise', 'skillbar'),
(4, 'Portfolio', 'portfolio'),
(5, 'Testimonial', 'testimonial'),
(6, 'Contact', 'contact'),
(8, 'Services', 'service');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Clarke Mullen', 'vogiqaw@mailinator.com', 'Ullamco suscipit inv', 'Adipisci voluptate i', '2024-11-03 01:31:14'),
(2, 'Desiree Rodgers', 'pikape@mailinator.com', 'In sed voluptatem f', 'Doloribus inventore ', '2024-11-03 01:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `image`) VALUES
(3, 'Php', 'back end', '672663bd6cc38.png'),
(4, 'laravel', 'back end', '672662c750083.jpeg'),
(5, 'web', 'front end design', '672662f5adcdd.jpg'),
(6, 'html', 'front end', '672663120335b.jpg'),
(7, 'css', 'design', '672663329b5f9.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desp` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `short_desp`, `status`) VALUES
(3, 'php', 'back end ', '0'),
(4, 'html', 'front end development', '1'),
(5, 'bootstrap', 'front end ', '1'),
(6, 'web', 'development', '1');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `percentage` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `status`) VALUES
(2, 'PHP', 85, '1'),
(3, 'JavaScript', 85, '0'),
(4, 'CSS', 90, '1'),
(5, 'Tailwind', 70, '1'),
(7, 'HTML', 90, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `dob`, `photo`) VALUES
(1, 'rasel', 'jarujek@mailinator.com', '$2y$10$gD.fNaAH0wO7FLaqHpvCi.aeh9I1radwitHfdW1p3nnQFXiWdJg8m', 'male', '1982-04-09', '67154c4b08143.jpg'),
(2, 'sultan mahmud', 'biduzecuzu@mailinator.com', '$2y$10$XFR/4BGTXWsKIHOWVVFcr.inV/hmu3ygrVDms82QURGaN7SXc9YT6', 'male', '1977-03-25', '67154ee10cf36.jpg'),
(3, 'Flynn Keith', 'zusebuzegu@mailinator.com', '$2y$10$GX9MF4P5BipU.C6pRY364.xBKTh319tGrVtKpBPY3bnwLCrjYcVba', 'female', '1981-04-02', NULL),
(4, 'sultan', 'wikocesaci@mailinator.com', '$2y$10$rs4xpl3d5OC6s09U6pKZJ.F//yd1LzGI4Ehi.zm83rHkJcjzKp3oy', 'male', '1987-06-09', '6712ae44be52f.jpg'),
(5, ' Swanson', 'runub@mailinator.com', '$2y$10$OCVBvKA.IlvpVGl5Brr80e4Qjm.yysDbNJOUG1psTXiNfAcn4kvdO', 'female', '1977-04-22', '67153e25f05d5.jpg'),
(6, 'Eve Mueller', 'badidova@mailinator.com', '$2y$10$yLF1H2iOq/0o9cgHH2.Tvud4i6GVIdjzGPpO9TKcVGMztjbCXXO9G', 'female', '1973-05-25', '671554ca57260.jpg'),
(7, 'sultan mahmud', 'rilomix@mailinator.com', '$2y$10$TeNtF1mX5GOaHcR6EXI9heMfS4GgsMtZ3hSTzAI3tq5C5DYnDvxQO', 'female', '1998-09-09', '671a5cfc8c170.jpg'),
(8, 'Barclay Clements', 'nysomy@mailinator.com', '$2y$10$CJw8FYhkfMsa7J3ht6Jcx.UkP8RNq7DvjGnhifHHDXTDeAp9uE7qO', 'female', '1971-12-07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
