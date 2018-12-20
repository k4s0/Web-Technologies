-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 05:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfighters`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'bibite'),
(2, 'primi'),
(3, 'secondi'),
(4, 'dessert'),
(5, 'panini'),
(6, 'pizze');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(3) NOT NULL,
  `address` varchar(35) COLLATE utf8_bin NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `address`, `birthday`) VALUES
(24, 'via,ladino,3', '1997-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(3) NOT NULL,
  `producer_id` int(3) NOT NULL,
  `client_id` int(3) NOT NULL,
  `ammount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `client_id` int(3) NOT NULL,
  `producer_id` int(3) NOT NULL,
  `state` int(2) NOT NULL,
  `date` date NOT NULL,
  `deliveryPlace` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `producer_id`, `state`, `date`, `deliveryPlace`, `description`) VALUES
(1, 24, 5, 0, '2018-12-04', 'a fanculo', 'coca-cola');

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `ID` int(3) NOT NULL,
  `companyName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`ID`, `companyName`) VALUES
(4, 'Latte Divino'),
(5, 'El Kebab Albanese'),
(23, 'Azienda22ahsdhas');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `producer_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `productName` varchar(20) COLLATE utf8_bin NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `description` varchar(100) COLLATE utf8_bin NOT NULL,
  `productPrice` float NOT NULL,
  `category` int(3) NOT NULL,
  `image_path` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`producer_id`, `product_id`, `productName`, `availability`, `description`, `productPrice`, `category`, `image_path`) VALUES
(4, 0, 'Paino Veggy', 1, 'panino per gnagna', 5, 5, 'img/img.png'),
(4, 1, 'Coca-Cola', 1, 'bibita', 2, 1, 'img/img.png'),
(4, 2, 'Fanta', 1, 'fanta', 2, 1, 'img/img.png'),
(5, 1, 'El Kebab', 1, 'panino kebab', 7, 5, 'img/img.png'),
(5, 2, 'coca-cola', 1, 'coca-cola albanese', 1, 1, 'img/img.png');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `AutoIncrementProductsID` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
        SET NEW.product_id = (
             SELECT IFNULL(MAX(products.product_id), 0) + 1
             FROM products
             WHERE products.producer_id  = NEW.producer_id
        );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(3) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `permission` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `lastName`, `email`, `username`, `password`, `permission`) VALUES
(4, 'lucy', 'zoffoli', 'lucy@email.it', 'lucy', 'prova', 1),
(5, 'anis', 'lico', 'anis@email.it', 'anis', 'prova', 1),
(13, 'davide', 'gatto', 'maio@mail.it', 'miaomiao', '$2y$10$jjx0VTFed7pjvmaw0MXSMedyvxqlmyCdBmSvZrdoDZuEoHsoRvQqa', 0),
(20, 'Lorenzo', 'Casini', 'porovasaasd@gmail.it', 'ciccio', '$2y$10$RH0/KTXv4EycOrlwoKjIJOMuN4F7cvTO9oxms804BaCziagyqLKX.', 1),
(23, 'Lorenzo', 'Casini', 'porovasaasbdhsaasd@gmail.it', 'cicciohjahasddasdas', '$2y$10$WJjazwbUX2AfrKw5DWQVPua/JjznLUDo1nsy/2CQEchcVqI/jwtd.', 1),
(24, 'Lorenzo', 'casini', 'casini@mailmail.it', 'caso', '$2y$10$O/n857GodBL6YX136noPuu6crz2U0XnPZh2zPjvmRdw8AOkpcSgoG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `fk_coupon_producer` (`producer_id`),
  ADD KEY `fk_coupon_client` (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_order_client` (`client_id`),
  ADD KEY `FK_order_producer` (`producer_id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`producer_id`,`product_id`),
  ADD KEY `fk_products_categories` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_user` FOREIGN KEY (`client_id`) REFERENCES `users` (`ID`);

--
-- Constraints for table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `fk_coupon_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `fk_coupon_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `FK_order_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);

--
-- Constraints for table `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `fk_producer_user` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_products_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
