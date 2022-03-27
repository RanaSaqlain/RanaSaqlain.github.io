-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingbazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Age` int(10) NOT NULL,
  `Image` varchar(200) DEFAULT 'UploadImages/Default.png',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `FName`, `LName`, `Email`, `password`, `Age`, `Image`, `date_time`) VALUES
(10, 'Muhammad', 'Saqlain', 'msaqlain6666@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 22, 'UploadImages/Saqlain.jpeg', '2022-01-09 08:37:32'),
(11, 'Test', 'user', 'test@test.com', '60474c9c10d7142b7508ce7a50acf414', 12, 'UploadImages/Default.png', '2022-01-09 13:23:19'),
(12, 'Sharjeel', 'Ahmed', 'sharjeel90000@gmail.com', 'affcef8ace3539a5d7f945db0429d9c5', 20, 'UploadImages/IMG-20191017-WA0009.jpg', '2022-01-09 13:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Category_Status`) VALUES
(17, 'Pcs', 1),
(18, 'mob', 1),
(19, 'Laptop', 1),
(20, 'Electronics', 1),
(21, 'Toy Cars', 1),
(24, 'Men\'s Clothing', 1),
(25, 'Women\'s Cloths', 1),
(26, 'kid\'s Cloths', 1),
(27, 'Baby Cloths', 1),
(28, 'Westren Suits', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(59) NOT NULL DEFAULT '12345678',
  `Stripe_id` varchar(100) DEFAULT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `House` varchar(20) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Zipcode` varchar(15) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `Email`, `Password`, `Stripe_id`, `First_Name`, `Last_Name`, `Street`, `House`, `City`, `Zipcode`, `Phone`) VALUES
(1, 'test@test.com', '12345678', '0000', 'Test', 'user', 'Sargodha , Pakistan', 'h4', 'Sargodha', '40100', '03440794447'),
(2, '', '12345678', '0000', 'Hello', '', '', '', '', '', ''),
(3, 'test@gmail.com', '12345678', 'cus_LOauFAUjPRIe5j', 'test', 'Ahmed', 'street no 3', 'zafar colony', 'Sargodha', '40100', ''),
(4, 'sharjeel90000@gmail.com', '12345678', 'cus_LOcBuqtpifwG21', 'Sharjeel', 'Ahmed', 'street no 3', 'zafar colony', 'Sargodha', '3333333', '03099930195');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `DateAndTIme` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `Name`, `Email`, `Password`, `MobileNo`, `DateAndTIme`) VALUES
(4, 'Sharjeel Ahmed', 'sharjeeelahmed833195@gmail.com', 'Shar*1234', '030999301958c', '2022-01-14 18:03:21'),
(5, 'Baqir Alii', 'baqir@gmail.com', '7777', '03099930195', '2022-01-14 18:47:18'),
(14, 'Muhammad Saqlain', 'msaqlain6666@gmail.com', '12345', '034407', '2022-01-16 18:44:17'),
(17, 'Test user', 'test@test.com', 'test', '03440794447', '2022-01-16 18:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Amount` varchar(20) NOT NULL,
  `Payment_method` varchar(20) NOT NULL,
  `order_Status` varchar(11) NOT NULL,
  `orderTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `Customer_id`, `Amount`, `Payment_method`, `order_Status`, `orderTime`) VALUES
(1, 1, '100', 'Paypal', 'Active', '2022-Feb-27'),
(2, 2, '831', 'COD', 'Active', '2022-Mar-27'),
(3, 3, '1056', 'Stripe', 'Active', '2022-Mar-27'),
(4, 4, '45678', 'Stripe', 'Active', 'Mar-2022-Sun');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_Name` varchar(100) NOT NULL,
  `product_Description` varchar(500) NOT NULL,
  `product_Color` varchar(20) NOT NULL,
  `product_bprice` bigint(20) NOT NULL,
  `product_sprice` bigint(20) NOT NULL,
  `product_instock` int(11) NOT NULL,
  `product_Image` varchar(100) NOT NULL DEFAULT 'assets/ProductImages/Default.png',
  `C_ID` int(11) NOT NULL,
  `product_Status` int(11) NOT NULL DEFAULT 1,
  `product_img_admin` varchar(400) NOT NULL DEFAULT '../assets/ProductImages/Default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_Name`, `product_Description`, `product_Color`, `product_bprice`, `product_sprice`, `product_instock`, `product_Image`, `C_ID`, `product_Status`, `product_img_admin`) VALUES
(2, 'reborn', 'Position an element at the bottom of the viewport, from edge to edge. Be sure you understand the ramifications of fixed position in your project; you may need to add additional CSS.', 'Black', 1400000, 1500000, 2, 'assets/ProductImages/Reborn_1.jpg', 21, 1, '../assets/ProductImages/Reborn_1.jpg'),
(3, 'Demo 33', 'demo  is an description', 'brown', 89, 100, 10, 'assets/ProductImages/1.4.JPG', 18, 0, '../assets/ProductImages/1.4.JPG'),
(4, 'demo pc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Black', 120, 160, 12, 'assets/ProductImages/1.jfif', 17, 1, '../assets/ProductImages/1.jfif'),
(5, 'Demo mobile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Black', 1000, 1090, 0, 'assets/ProductImages/1.1.jfif', 18, 1, '../assets/ProductImages/1.1.jfif'),
(6, 'Demo mobile 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Black', 1000, 1100, 1, 'assets/ProductImages/1.2.jfif', 18, 1, '../assets/ProductImages/1.2.jfif'),
(7, 'Demo mobile 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'brown', 1200, 1222, 12, 'assets/ProductImages/1.3.jfif', 18, 1, '../assets/ProductImages/1.3.jfif'),
(8, 'Demo mobile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'abc', 1111, 1200, 111, 'assets/ProductImages/1.4.jfif', 18, 1, '../assets/ProductImages/1.4.jfif'),
(9, 'demo laptop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'unkown', 1000, 1200, 8, 'assets/ProductImages/2.1.jfif', 19, 1, '../assets/ProductImages/2.1.jfif'),
(10, 'demo laptop 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'jkj', 1189, 1300, 111, 'assets/ProductImages/2.2.jfif', 19, 1, '../assets/ProductImages/2.2.jfif'),
(11, 'Demo laptop 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'white', 1110, 1200, 1, 'assets/ProductImages/2.3.jfif', 19, 0, '../assets/ProductImages/2.3.jfif'),
(12, 'demo refregrator', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'silver', 500, 600, 2, 'assets/ProductImages/3.1.jfif', 20, 1, '../assets/ProductImages/3.1.jfif'),
(13, 'demo refregrator', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'fghjk', 3456, 45678, 2344, 'assets/ProductImages/3.4.jfif', 20, 1, '../assets/ProductImages/3.4.jfif'),
(14, 'Men Cloths', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'brown', 120, 150, 116, 'assets/ProductImages/4.1.jfif', 24, 1, '../assets/ProductImages/4.1.jfif'),
(15, 'Demo  product', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'dfghjk', 565, 789, 3, 'assets/ProductImages/4.3.jfif', 24, 1, '../assets/ProductImages/4.3.jfif'),
(16, 'womensuit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'red', 89, 100, 86, 'assets/ProductImages/5.2.jfif', 25, 1, '../assets/ProductImages/5.2.jfif'),
(17, 'kids cloth', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'demo', 123, 231, 0, 'assets/ProductImages/6.1.jfif', 26, 1, '../assets/ProductImages/6.1.jfif'),
(18, 'A set  of two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'demo', 67, 67, 66, 'assets/ProductImages/7.4.jfif', 27, 1, '../assets/ProductImages/7.4.jfif'),
(19, 'Mens suit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'silver', 70, 100, 2, 'assets/ProductImages/8.3.jfif', 28, 1, '../assets/ProductImages/8.3.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sale_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `Profit` varchar(20) NOT NULL,
  `sale_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sale_id`, `order_id`, `Profit`, `sale_status`) VALUES
(1, 1, '30', 1),
(2, 2, '208', 1),
(3, 3, '265', 1),
(4, 4, '42222', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soldproducts`
--

CREATE TABLE `soldproducts` (
  `sp_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `P_image` varchar(100) NOT NULL,
  `sold_quantity` varchar(10) NOT NULL,
  `soldprice` varchar(10) NOT NULL,
  `buyprice` varchar(10) NOT NULL,
  `profit` varchar(10) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soldproducts`
--

INSERT INTO `soldproducts` (`sp_id`, `product_id`, `p_name`, `P_image`, `sold_quantity`, `soldprice`, `buyprice`, `profit`, `Customer_id`, `order_id`, `sale_id`) VALUES
(1, 19, 'Mens suit', 'assets/ProductImages/8.3.jfif', '1', '100', '70', '30', 1, 1, 1),
(2, 17, 'kids cloth', 'assets/ProductImages/6.1.jfif', '1', '231', '123', '108', 2, 2, 2),
(3, 12, 'demo refregrator', 'assets/ProductImages/3.1.jfif', '1', '600', '500', '100', 2, 2, 2),
(4, 19, 'Mens suit', 'assets/ProductImages/8.3.jfif', '1', '100', '70', '30', 3, 3, 3),
(5, 15, 'Demo  product', 'assets/ProductImages/4.3.jfif', '1', '789', '565', '224', 3, 3, 3),
(6, 16, 'womensuit', 'assets/ProductImages/5.2.jfif', '1', '100', '89', '11', 3, 3, 3),
(7, 18, 'A set  of two', 'assets/ProductImages/7.4.jfif', '1', '67', '67', '0', 3, 3, 3),
(8, 13, 'demo refregrator', 'assets/ProductImages/3.4.jfif', '1', '45678', '3456', '42222', 4, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_catgory` (`C_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sale_id`);

--
-- Indexes for table `soldproducts`
--
ALTER TABLE `soldproducts`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soldproducts`
--
ALTER TABLE `soldproducts`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_catgory` FOREIGN KEY (`C_ID`) REFERENCES `category` (`Category_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
