-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 12:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websiteassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `productid`, `quantity`) VALUES
('0983aeb914758', '68cc3f7214a7a', '32154', 1),
('71620192932ee', '68cc3f7214a7a', '12345', 1),
('940c1eebb1251', '68cc3f7214a7a', '21543', 1),
('b6521eb33a392', '68cc3f7214a7a', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` varchar(255) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `creatorid` int(11) NOT NULL,
  `image` varchar(12) DEFAULT NULL,
  `tagid` int(11) NOT NULL,
  `datecreated` date DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` varchar(255) NOT NULL,
  `stock` int(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `sellerid` int(11) NOT NULL,
  `price` int(5) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `datecreated` date DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `stock`, `name`, `description`, `sellerid`, `price`, `image`, `datecreated`, `views`) VALUES
('12345', 20, 'Dungeons & Dragons 5th Edition', 'The 5th edition of the classic table top rpg Dungeons & Dragons.', 12345, 40, 'dnd.png', '0000-00-00', 5000),
('21543', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('23451', 35, 'Pathfinder 2nd Edition', 'The second edition of the popular Pathfinder system', 54321, 80, 'pathfinder.png', '0000-00-00', 2450),
('32154', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('34512', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('43215', 100, 'minis', 'models for items in game', 11111, 5, 'mini.png', '0000-00-00', 1000),
('45123', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('51234', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('54321', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000),
('67890', 100, 'Dice', 'Click clack math rocks', 11111, 5, 'dice.png', '0000-00-00', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswrd` varchar(255) NOT NULL,
  `userimage` varchar(12) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `gameids` int(11) DEFAULT NULL,
  `datejoined` date NOT NULL,
  `postids` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `pswrd`, `userimage`, `description`, `gameids`, `datejoined`, `postids`) VALUES
('68cc3f7214a7a', 'randomuser', 'randomemail@email.com', '$2y$10$Q2i4y3OpJPnjkIewaS.IH.5ajSrVHSgyzDrmafrDJ4XVhZOUz6CIi', NULL, NULL, NULL, '2020-05-16', NULL),
('a5d173872dd9b', '', '', '$2y$10$qoMUDsYfUfv/LTL.kbh92uzR4AcQL1SB1wPecQa.VMSUTNoFwC6jm', NULL, NULL, NULL, '2020-05-16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
