-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 07, 2019 alle 20:20
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
(4, 'dessert'),
(5, 'panini');

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
(30, 'VIA GIORGIO REGNOLI 12', '1994-04-12'),
(34, 'Castel Latino 155', '1997-07-26'),
(35, 'prova', '1997-07-26');

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
(1, 32, 30, 1.1),
(2, 31, 30, 2);

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
(1, 30, 31, 1, '2019-01-07', '3.7', 'product: Piadina Semplice qnt: 1 <br/> In consegna presso: 3.7'),
(2, 34, 33, 0, '2019-01-07', 'Biblioteca', 'product: Il cioccolatoso qnt: 1 <br/> In consegna presso: Biblioteca'),
(3, 34, 32, 0, '2019-01-07', 'Biblioteca', 'product: Cola qnt: 1 <br/> In consegna presso: Biblioteca');

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
(31, 'Malaghiotta'),
(32, 'La Romagna'),
(33, 'Pasticceria Creativa');

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
(31, 1, 'Piadina Classica', 1, 'Piadina Classica', 2.4, 5, '/upload/31/slider1.jpg'),
(31, 2, 'Piadina Semplice', 1, 'Piadina Semplice', 1, 5, '/upload/31/slider2.jpg'),
(31, 3, 'Acqua Minerale', 1, 'Acqua Minerale', 1, 1, '/upload/31/boarioAcqua.jpg'),
(32, 1, 'Insalatona', 1, 'Insalata di ingredienti misti', 1.4, 5, '/upload/32/slider2.jpg'),
(32, 2, 'Cola', 1, 'cola', 1.2, 1, '/upload/32/cola.jpg'),
(33, 1, 'Il vanigliato', 1, 'Cupcake alla vaniglia', 4.5, 4, '/upload/33/vanigliato.jpg'),
(33, 2, 'Il cioccolatoso', 1, 'Muffin con gocce di cioccolato', 3.5, 4, '/upload/33/muffin.jpg');

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
(30, 'Lucy', 'Zoffoli', 'lucy@hotmail.it', 'lucy', '$2y$10$3ZNaMbYPQV2Id4CMNhQto.yxMzY/sKDW18XiehffQFYWdQJ0703Yi', 0),
(31, 'marta', 'sanzucchi', 'malagiotta@azienda.it', 'marta', '$2y$10$u3ekf3Hufyv0FHbbI1KdKuckxIFQeA2T3SPJ37JUNWixHaH8.nXaa', 1),
(32, 'Marco', 'Rossi', 'marcoRossi@gmail.com', 'marco', '$2y$10$a72O/P9Vurz8Sl7mpqvzyejU3TTAgBymx5j0CgDmnZrfBN4EhTDPe', 1),
(33, 'Nicola', 'Cirillo', 'nicolacirillo@gmail.com', 'ciri', '$2y$10$nGec9rVPsl.b8QV7sQItfuDZcOMA3JvPzKEbYf6SyytlJT.sY0RIS', 1),
(34, 'Simone', 'Del Gatto', 'sdg97@gmail.com', 'sdg97', '$2y$10$ltTKh8cAbA7m9K66HbvReeoihmHtSyjImpsrL4A3/fRciW.xnjdm.', 0),
(35, 'prova', 'prova', 'prova@gmail.com', 'prova', '$2y$10$eeKmPlm4gQedbC/a6E2UMe/iHamd4XTwGsW2Q/3nKLWx/Vy2VJ14W', 0),
(36, 'Simone', 'Del Gatto', 'simonedelgatto1997@gmail.com', 'sdgAdmin', '$2y$10$eeKmPlm4gQedbC/a6E2UMe/iHamd4XTwGsW2Q/3nKLWx/Vy2VJ14W', 2),
(38, 'Lorenzo', 'Casini', 'lorenzocasini@gmail.com', 'casoAdmin', '$2y$10$eeKmPlm4gQedbC/a6E2UMe/iHamd4XTwGsW2Q/3nKLWx/Vy2VJ14W', 2),
(39, 'Anis', 'Lico', 'anislico@gmail.com', 'anisAdmin', '$2y$10$eeKmPlm4gQedbC/a6E2UMe/iHamd4XTwGsW2Q/3nKLWx/Vy2VJ14W', 2);

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
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `producer`
--
ALTER TABLE `producer`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
