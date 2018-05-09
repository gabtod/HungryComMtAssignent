-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 09, 2018 at 12:15 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hungry`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Chinese'),
(2, 'Burgers'),
(3, 'Sushi'),
(4, 'Pizza'),
(5, 'Seafood'),
(6, 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `category-restaurant`
--

CREATE TABLE `category-restaurant` (
  `restaurantIId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category-restaurant`
--

INSERT INTO `category-restaurant` (`restaurantIId`, `categoryId`) VALUES
(4, 6),
(3, 2),
(1, 5),
(1, 3),
(6, 1),
(6, 3),
(5, 1),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientId` int(11) NOT NULL,
  `clientName` varchar(100) NOT NULL,
  `clientSurname` varchar(150) NOT NULL,
  `clientUsername` varchar(150) NOT NULL,
  `clientEmail` varchar(150) NOT NULL,
  `clientPhoneNumber` varchar(50) DEFAULT NULL,
  `clientAddress` varchar(250) NOT NULL,
  `clientPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientId`, `clientName`, `clientSurname`, `clientUsername`, `clientEmail`, `clientPhoneNumber`, `clientAddress`, `clientPassword`) VALUES
(1, 'Gabriela', 'Todorova', 'gabi', 'gabriela.todorova.a100822@mcast.edu.mt', NULL, 'Qawra', 'gabrielatodorova'),
(2, 'Ana', 'Abela', 'ana', 'ana@gmail.com', '99998888', 'Valletta, Malta', 'ana'),
(3, 'Gabriela', 'Todorova', 'gab', 'gabriela.todorova.a100822@mcast.edu.mt', '11222233', 'Qawra', 'gab');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemDescription` varchar(300) DEFAULT NULL,
  `itemPrice` float(100,2) NOT NULL,
  `itemQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `itemDescription`, `itemPrice`, `itemQuantity`) VALUES
(1, 'Meat lovers', 'tomato sauce, pork, beef, pepperoni, ham, mozzarella', 13.00, 1),
(2, 'Calamari', NULL, 9.80, 1),
(3, 'Prawn Special', NULL, 12.00, 12),
(4, 'Platter for 2', 'Mussels, 12 Prince Prawnsm Fish Calamari and Calamari Heads', 30.00, 1),
(5, 'Solemate Platter', '18 Prince Prawns, Calamari (grilled), Calamari (fired), Missels and a Village Salad - Share between 3 people', 38.00, 1),
(6, 'Kingklip', NULL, 15.80, 1),
(7, 'Sole Fish', NULL, 17.50, 1),
(8, 'Cod Fish', NULL, 11.50, 1),
(9, 'Grilled fillet of Salmon', NULL, 16.80, 1),
(10, 'Platter for 1', 'Mussels, 6 Prince Prawns, Fish, Calamari, Calamari Heads', 16.50, 1),
(11, 'Full Deck Platter', '30 Princess Prawns, Mussels, Fish, Grilled and Fried Camalari - Share between 4', 59.00, 1),
(12, 'Maki Cucumber', NULL, 2.50, 6),
(13, 'Maki Crab Stick', NULL, 2.50, 6),
(14, 'Maki Avocado', NULL, 3.00, 6),
(15, 'Maki Prawn ', NULL, 5.00, 6),
(16, 'Maki Salmon', NULL, 5.50, 6),
(17, 'Maki Tuna', NULL, 5.50, 6),
(18, 'Nigiri Prawn', NULL, 4.50, 3),
(19, 'Nigiri Salmon', NULL, 6.00, 3),
(20, 'Nigiri Tuna', NULL, 6.00, 3),
(21, 'Nigiri Crab Stick', NULL, 2.50, 3),
(22, 'Nigiri Salmon Roses', NULL, 6.50, 3),
(23, 'Nigiri Kaki', 'Oysters', 9.50, 3),
(24, 'Sashimi Salmon Platter', NULL, 7.50, 3),
(25, 'Sashimi Tuna Platter', NULL, 7.50, 3),
(26, 'Sashimi Salmon Platter', NULL, 26.50, 15),
(27, 'Sashimi Tuna Platter', NULL, 26.50, 15),
(28, 'Rainbow Rolls', 'Salmon, Tuna, Avocado', 8.50, 8),
(29, 'Fashion Sandwich Vegetable', NULL, 3.50, 6),
(30, 'Fashion Sandwich Crab Stick ', NULL, 4.00, 6),
(31, 'Fashion Sandwich Prawn', NULL, 6.00, 6),
(32, 'Fashion Sandwich Salmon', NULL, 8.50, 6),
(33, 'Fashion Sandwich Tuna', NULL, 8.50, 6),
(34, 'Kypro Prawn Roll', 'A futomaki with rice, fresh prawn, lettuce & soy oregano sauce', 7.50, 6),
(35, 'Tarama Roll', 'A boat-sized sushi with rice, wrapped with zucchini, topped with tarama & fried calamari', 3.25, 3),
(36, 'Lemon Salmon Roll', 'A California roll-style sushi with rice, fresh salmon & zesty lemon mayo', 7.75, 8),
(37, 'Wasabi Prawn', 'A boat-shaped sushi with rice, fresh prawn & wasabi mayo', 3.25, 3),
(38, 'Crunchy Athena Roll', 'A California roll-style sushi with rice, prawn & pickled red onion', 7.75, 8),
(39, 'Salmon Tomato Roll', 'A California roll-style sushi with rice, fresh salmon, basil leaves, onion & tomato', 7.75, 8),
(40, 'Italian Kisses', NULL, 4.50, 3),
(41, 'Lemon Sorbet', NULL, 4.60, 1),
(42, 'Tiramisu', NULL, 4.50, 1),
(43, 'Apple Torte', NULL, 4.00, 1),
(44, 'Balkava', NULL, 4.00, 1),
(45, 'Hawaiian Pizza', 'Savoury ham and sweet pineapple on a tomato sauce base topped with mozzarella cheese.', 6.95, 1),
(46, 'Margherita Pizza', 'A tomato sauce base topped with mozzarella cheese, tomato chunks and oregano.', 6.15, 0),
(47, 'Pepperoni Lovers Pizza', 'A double decker of pepperoni (salami), mozzarella and our famous tomato sauce base.', 6.95, 1),
(48, 'Chicken Supreme Pizza', 'A tasty combination of tomato sauce, chicken, pepperoni (salami), red onions, mushrooms, green peppers and mozzarella cheese.', 9.40, 1),
(49, 'Capricciosa', 'Tomato sauce topped with ham, mushrooms, artichoke hearts, peas, eggs and mozzarella cheese.', 8.00, 1),
(50, 'Hangover Burger', 'BRIOCHE BUN, DOUBLE BEEF\r\nPATTY, FRIED EGG, CRISPY\r\nONIONS, CRISPY BACON,\r\nMELTED PROVOLONE CHEESE,\r\nLETTUCE, TOMATO &\r\nHUGO’S SAUCE', 6.95, 1),
(51, 'Veggie Burger', 'BRIOCHE BUN, VEGGIE PATTY,\r\nMIXED LEAVES, CRUNCHY\r\nCARROT STRINGS & TZATZIKI\r\nDRESSING', 6.95, 1),
(52, 'Chicken Burger', 'BRIOCHE BUN, BEER BATTERED\r\nCHICKEN FILLET, ONION,\r\nTOMATO, LETTUCE &\r\nCURRY MAYO', 5.95, 1),
(53, 'Bacon Burger', 'BRIOCHE BUN, DOUBLE BEEF\r\nPATTY, CRISPY BACON, MELTED\r\nPROVOLONE CHEESE,\r\nONION, TOMATO, LETTUCE\r\n& HUGO’S SAUCE', 5.95, 1),
(54, 'Hugo\'s Burger', 'BRIOCHE BUN, DOUBLE BEEF\r\nPATTY COATED IN CRUSHED\r\nPEPPER CORNS, LETTUCE,\r\nSAUTÉED MUSHROOMS\r\n& TRUFFLE SAUCE', 5.95, 1),
(55, 'Beef Curry', 'Traditional Indian Mild Curry', 11.00, 1),
(56, 'Chicken Korma', 'MEdium hot chichen with Spices, Butter, Green Herbs, peeled tomatoes served in an Iron Korai (Soak)', 8.90, 1),
(57, 'King Prawn Masala', 'BBQ king prawns cooked in spices with cream and butter', 13.75, 1),
(58, 'Chicken Malaya', 'Medium chicken with Pineapple', 8.90, 1),
(59, 'Lamp Dansak', 'Cooked with lentil, sweet, sour and hot taste, served with Pilau Rice', 15.50, 1),
(60, 'Beef Noodles', NULL, 4.95, 1),
(61, 'Vegetable Noodles', NULL, 4.65, 1),
(62, 'Singapore Noodles', NULL, 4.95, 1),
(63, 'Plain Noodles', NULL, 4.15, 0),
(64, 'Egg Rice', NULL, 3.55, 1),
(65, 'Special Rice', NULL, 4.75, 1),
(66, 'Mineral Water 0.500L', NULL, 1.00, 1),
(67, 'Water 1.5L', NULL, 3.00, 1),
(68, 'Coke', NULL, 2.00, 1),
(69, 'Ice Tea', NULL, 2.00, 1),
(70, 'Juice', NULL, 1.85, 1),
(71, 'Espresso', NULL, 2.00, 1),
(72, 'Cappucino', NULL, 2.50, 1),
(73, 'Soft Drink', NULL, 2.00, 1),
(74, 'Local Beer', NULL, 5.00, 1),
(75, 'Glass of Wine', NULL, 4.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locality`
--

CREATE TABLE `locality` (
  `localityId` int(11) NOT NULL,
  `localityName` varchar(150) NOT NULL,
  `localityPostCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locality`
--

INSERT INTO `locality` (`localityId`, `localityName`, `localityPostCode`) VALUES
(1, 'Valletta', 'VLT1030'),
(2, 'Bugibba', NULL),
(3, 'Sliema', NULL),
(4, 'Hamrun', NULL),
(5, 'Birkirkara', NULL),
(6, 'Marsaxlokk', NULL),
(7, 'Rabat', NULL),
(8, 'St Julians', NULL),
(9, 'Attard', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order-item`
--

CREATE TABLE `order-item` (
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `orderDescription` varchar(300) DEFAULT NULL,
  `clientId` int(11) NOT NULL,
  `orderTypeId` int(11) NOT NULL,
  `orderDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertype`
--

CREATE TABLE `ordertype` (
  `orderTypeId` int(11) NOT NULL,
  `orderTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertype`
--

INSERT INTO `ordertype` (`orderTypeId`, `orderTypeName`) VALUES
(1, 'Delivery'),
(2, 'Pick-Up');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurantId` int(11) NOT NULL,
  `rastaurantName` varchar(100) NOT NULL,
  `localityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurantId`, `rastaurantName`, `localityId`) VALUES
(1, 'Ocean Basket', 2),
(2, 'Pizza Hut', 3),
(3, 'Hugos Burgers', 8),
(4, 'Gate of India', 9),
(5, 'Peking', 4),
(6, 'Okurama', 6);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantitem`
--

CREATE TABLE `restaurantitem` (
  `restaurantIId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurantitem`
--

INSERT INTO `restaurantitem` (`restaurantIId`, `itemId`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 20),
(1, 21),
(1, 20),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 54),
(4, 56),
(4, 55),
(4, 57),
(4, 58),
(4, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(6, 34),
(6, 35),
(6, 36),
(6, 37),
(6, 38),
(6, 39),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(3, 75),
(3, 74),
(3, 73),
(3, 72),
(3, 71),
(3, 70),
(3, 68),
(3, 69),
(3, 67),
(3, 66),
(1, 75),
(1, 74),
(1, 73),
(1, 72),
(1, 71),
(1, 70),
(1, 69),
(1, 68),
(1, 67),
(1, 66),
(2, 75),
(2, 74),
(2, 73),
(2, 72),
(2, 71),
(2, 70),
(2, 69),
(2, 68),
(2, 67),
(2, 66),
(6, 75),
(6, 74),
(6, 73),
(6, 72),
(6, 71),
(6, 70),
(6, 69),
(6, 66),
(6, 68),
(6, 67),
(4, 75),
(4, 74),
(4, 73),
(4, 72),
(4, 71),
(4, 70),
(4, 69),
(4, 68),
(4, 67),
(4, 66),
(5, 75),
(5, 74),
(5, 73),
(5, 72),
(5, 71),
(5, 70),
(5, 69),
(5, 68),
(5, 67),
(5, 66);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `category-restaurant`
--
ALTER TABLE `category-restaurant`
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `restaurantIId` (`restaurantIId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`localityId`);

--
-- Indexes for table `order-item`
--
ALTER TABLE `order-item`
  ADD KEY `orderId` (`orderId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `clientId` (`clientId`),
  ADD KEY `orderTypeId` (`orderTypeId`),
  ADD KEY `orderDate` (`orderDate`);

--
-- Indexes for table `ordertype`
--
ALTER TABLE `ordertype`
  ADD PRIMARY KEY (`orderTypeId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantId`),
  ADD KEY `localityId` (`localityId`);

--
-- Indexes for table `restaurantitem`
--
ALTER TABLE `restaurantitem`
  ADD KEY `restaurantIId` (`restaurantIId`),
  ADD KEY `itemId` (`itemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `locality`
--
ALTER TABLE `locality`
  MODIFY `localityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordertype`
--
ALTER TABLE `ordertype`
  MODIFY `orderTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category-restaurant`
--
ALTER TABLE `category-restaurant`
  ADD CONSTRAINT `category-restaurant_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `category-restaurant_ibfk_2` FOREIGN KEY (`restaurantIId`) REFERENCES `restaurant` (`restaurantId`);

--
-- Constraints for table `order-item`
--
ALTER TABLE `order-item`
  ADD CONSTRAINT `order-item_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  ADD CONSTRAINT `order-item_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`orderTypeId`) REFERENCES `ordertype` (`orderTypeId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`clientId`) REFERENCES `client` (`clientId`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`localityId`) REFERENCES `locality` (`localityId`);

--
-- Constraints for table `restaurantitem`
--
ALTER TABLE `restaurantitem`
  ADD CONSTRAINT `restaurantitem_ibfk_1` FOREIGN KEY (`restaurantIId`) REFERENCES `restaurant` (`restaurantId`),
  ADD CONSTRAINT `restaurantitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
