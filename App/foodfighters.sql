-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 15, 2018 alle 17:14
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.2.12

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
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `categories`
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
-- Struttura della tabella `client`
--

CREATE TABLE `client` (
  `client_id` int(3) NOT NULL,
  `address` varchar(35) COLLATE utf8_bin NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`client_id`, `address`, `birthday`) VALUES
(3, 'via ladino,3', '1997-05-13'),
(6, 'via castel latino,125', '1997-07-26');

-- --------------------------------------------------------

--
-- Struttura della tabella `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(3) NOT NULL,
  `producer_id` int(3) NOT NULL,
  `client_id` int(3) NOT NULL,
  `ammount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `producer_id`, `client_id`, `ammount`) VALUES
(1, 5, 3, 1),
(2, 4, 6, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `client_id` int(3) NOT NULL,
  `state` int(2) NOT NULL,
  `date` date NOT NULL,
  `deliveryPlace` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `state`, `date`, `deliveryPlace`, `description`) VALUES
(1, 3, 0, '2018-12-15', 'aula 3.7', '- panino veggy\r\n- coca-cola');

-- --------------------------------------------------------

--
-- Struttura della tabella `producer`
--

CREATE TABLE `producer` (
  `ID` int(3) NOT NULL,
  `companyName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `producer`
--

INSERT INTO `producer` (`ID`, `companyName`) VALUES
(4, 'Latte Divino'),
(5, 'El Kebab Albanese');

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
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
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`producer_id`, `product_id`, `productName`, `availability`, `description`, `productPrice`, `category`, `image_path`) VALUES
(4, 0, 'Paino Veggy', 1, 'panino per gnagna', 5, 5, 'img/img.png'),
(4, 1, 'Coca-Cola', 1, 'bibita', 2, 1, 'img/img.png'),
(4, 2, 'Fanta', 1, 'fanta', 2, 1, 'img/img.png'),
(5, 1, 'El Kebab', 1, 'panino kebab', 7, 5, 'img/img.png'),
(5, 2, 'coca-cola', 1, 'coca-cola albanese', 1, 1, 'img/img.png');

--
-- Trigger `products`
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
-- Struttura della tabella `users`
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
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`ID`, `name`, `lastName`, `email`, `username`, `password`, `permission`) VALUES
(3, 'lorenzo', 'caisni', 'lorenzo@email.it', 'caso', 'prova', 0),
(4, 'lucy', 'zoffoli', 'lucy@email.it', 'lucy', 'prova', 1),
(5, 'anis', 'lico', 'anis@email.it', 'anis', 'prova', 1),
(6, 'simone', 'del gatto', 'gatto@email.it', 'miaomiao', 'prova', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indici per le tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indici per le tabelle `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `fk_coupon_producer` (`producer_id`),
  ADD KEY `fk_coupon_client` (`client_id`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_client` (`client_id`);

--
-- Indici per le tabelle `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`producer_id`,`product_id`),
  ADD KEY `fk_products_categories` (`category`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `producer`
--
ALTER TABLE `producer`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_client_user` FOREIGN KEY (`client_id`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `fk_coupon_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `fk_coupon_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Limiti per la tabella `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `fk_producer_user` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);

--
-- Limiti per la tabella `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_products_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
