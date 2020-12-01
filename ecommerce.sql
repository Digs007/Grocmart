-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 03:59 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `Category` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `Category`) VALUES
(1, 'vegetable'),
(2, 'fruits'),
(3, 'babycare'),
(4, 'kitchens');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerId` int(11) NOT NULL,
  `FirstName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNo` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerId`, `FirstName`, `LastName`, `PhoneNo`, `Username`, `Password`) VALUES
(1, 'Digvijay', 'Bhirud', '09960779242', 'digubhirud@rediffmail.com', '$2y$10$Nsklz/sXzZRO/rSSz/sB2.a2WUGO4/Us9BxbudYnLaNXOTauAmeay'),
(2, 'Digvijay', 'Bhirud', '09960779242', 'digubhirud@rediffmail.com4', '$2y$10$Qs.8PHJvOylW.BelfsmcFOC7V0VsAl6OrxlL6rYsfvidYihyA7ztu'),
(3, 'Digvijay', 'Bhirud', '09960779242', 'digubhirud@rediffmail.com9', '$2y$10$L/0TcPvY5w4nFnW/9P1k6OECx/khDWJSsOPDK590BmBKY8ifSpHuW'),
(4, 'dfs', 'sdff', '1111111111', 'digubhirud@rediffmail.com1', '$2y$10$Hk7HzPskYM9wX2Yc86GV2u12wPuOB6MCDeSY4NERAUS0kKQS6Ck.a'),
(5, 'Digvijay', 'Bhirud', '09960779242', 'digubhirud@rediffmail.com10', '$2y$10$K15KqNEetf55uy5cqhPX9eet2NVRS05PpGL1UICPkDox2MBaiDqNK');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Fullfilled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `ContactName` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DeliveryAddress` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Description` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `Name`, `CategoryId`, `Description`, `Price`) VALUES
(1, 'Lauki (Bottle Gourd) 1 kg', 1, 'Gourds are Protein rich green vegetables that are also very rich in Vitamin C, Fibres, Carbohydrates, Riboflavin and Zinc.', '16.00'),
(2, 'Brinjal Black (Big) 500 g', 1, 'Also known as Eggplant, Brinjals are full of Energy and Carbohydrates. It is used in a lot of vegetable curry preparations.', '37.00'),
(3, 'Onion 5 kg (Pack)', 1, 'Onion is an antioxidant rich vegetable that is also versatile and is used in different food preparations in India and across the world.', '270.00'),
(4, 'Tomato per kg', 1, 'Despite belonging from the Fruits family, Tomatoes are widely perceived as a vegetable and are used in several veggie preparations.', '39.99'),
(5, 'Dates Imported 400 g (Pack)', 2, 'Dates are fruits obtained from the Date Palm Tree. It is grown in Tropical regions of the world and has gained popularity because of its nutritional value.', '159.00'),
(6, 'Apple Royal Gala (6 Piece Pack)', 2, 'Apple is one of the most popular fruits worldwide. It is rich in Fiber, Potassium, Vitamin C, Vitamin K, Carbs and Calories.', '149.00'),
(7, 'Kiwi Green Jumbo 4 pcs (Pack)', 2, 'Despite our attempts to provide you with the most accurate information possible, the actual packaging, ingredients and colour of the product may sometimes vary.', '109.00'),
(8, 'Himalaya Baby Lotion 100 ml', 3, 'Himalaya Baby Lotion helps keep baby\'s skin soft and supple, protecting it from infection. This lotion is made from natural ingredients like Almond oil and Olive oil that help moisturize delicate skin, leaving it soft all day long.', '84.47'),
(9, 'Lizol Kitchen Power Cleaner Spray 450 ml', 4, 'Help protect your family from harmful foodborne illness with Lizol Kitchen Power Cleaner. The grease fighting power of this effective kitchen cleaner helps to clean up even the toughest kitchen messes, while removing 99. 9 percent of germs and deodorizing ', '126.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
