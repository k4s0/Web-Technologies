-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 22, 2018 alle 08:22
-- Versione del server: 10.1.37-MariaDB
-- Versione PHP: 7.3.0

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
(1, 'cliente,1', '2018-12-03');

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
(4, 3, 1, 2.3);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
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
-- Dump dei dati per la tabella `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `producer_id`, `state`, `date`, `deliveryPlace`, `description`) VALUES
(2, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 2 <br/> In consegna presso: Ingresso<br/>'),
(3, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 2 <br/> product: Panino Albanese qnt: 1 <br/> In consegna presso: Ingresso<br/>'),
(4, 1, 2, 0, '2018-12-22', '3.7', 'product: Torta della Nonna qnt: 1 <br/> Utilizzato CouponIn consegna presso: 3.7<br/>'),
(5, 1, 3, 0, '2018-12-22', '3.7', 'product: Birra Albanese qnt: 1 <br/> Utilizzato CouponIn consegna presso: 3.7<br/>'),
(6, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(7, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(8, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(9, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 1 <br/> In consegna presso: Ingresso'),
(10, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(11, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 1 <br/> In consegna presso: Ingresso'),
(12, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(13, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 1 <br/> In consegna presso: Ingresso'),
(14, 1, 2, 0, '2018-12-22', '3.7', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: 3.7'),
(15, 1, 3, 0, '2018-12-22', '3.7', 'product: Birra Albanese qnt: 1 <br/> product: Panino Albanese qnt: 1 <br/> In consegna presso: 3.7'),
(16, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(17, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 1 <br/> In consegna presso: Ingresso'),
(18, 1, 2, 0, '2018-12-22', 'Ingresso', 'product: Torta della Nonna qnt: 1 <br/> In consegna presso: Ingresso'),
(19, 1, 3, 0, '2018-12-22', 'Ingresso', 'product: Birra Albanese qnt: 1 <br/> In consegna presso: Ingresso');

-- --------------------------------------------------------

--
-- Struttura della tabella `places`
--

CREATE TABLE `places` (
  `place_id` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `places`
--

INSERT INTO `places` (`place_id`) VALUES
('3.7'),
('Biblioteca'),
('Ingresso'),
('Segreteria');

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
(2, 'Latte Divino'),
(3, 'El kebab albanese');

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
(2, 1, 'coca-cola', 1, 'coca-cola merdosa', 2, 1, '/Assets/images/product-image.jpg'),
(2, 2, 'Torta della Nonna', 1, 'torta della nonna', 5, 4, '/Assets/images/product-image.jpg'),
(3, 1, 'Birra Albanese', 1, 'birra albanese molto alcolica', 25, 1, '/Assets/images/product-image.jpg'),
(3, 2, 'Panino Albanese', 1, 'panino con droga', 15, 5, '/Assets/images/product-image.jpg');

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
(1, 'Cliente', 'Cliente', 'cliente@mail.it', 'cliente', '$2y$10$/UZN.Pbb5Cl5qnKi4LTJ7.BmxZx5BAGtS/2BKjSnUxGip/KdcnvOO', 0),
(2, 'fornitore', 'fornitore', 'fornitore@mail.it', 'fornitore', '$2y$10$.XaV1zRB9pzKj050DCcUPe3nwDHg7H2QbZZFlo0qlWQcAmz7jSk2u', 1),
(3, 'fornitore2', 'fornitore2', 'fornitore2@mail.it', 'fornitore2', '$2y$10$2N6AMTEY4aJmgWoqzU8W0upou52R5mGk5nKmoGPNTlwGy3.N6xpgi', 1);

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
  ADD KEY `FK_order_client` (`client_id`),
  ADD KEY `FK_order_producer` (`producer_id`),
  ADD KEY `FK_deliveryPlace` (`deliveryPlace`);

--
-- Indici per le tabelle `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

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
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `producer`
--
ALTER TABLE `producer`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `FK_deliveryPlace` FOREIGN KEY (`deliveryPlace`) REFERENCES `places` (`place_id`),
  ADD CONSTRAINT `FK_order_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `FK_order_producer` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`ID`);

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
