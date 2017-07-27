-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2017 at 02:38 PM
-- Server version: 10.1.11-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`price`, `category`, `description`, `id`, `name`, `rid`) VALUES
(395, 'barbecue', 'Rosemary coated chicken with a smokey wine glaze', 1, 'Drunken Chicken', 2),
(355, 'barbecue', 'Smoked BBQ chicken with aromatic spices', 2, 'Aromatic Smoked Chicken', 2),
(256, 'barbecue', '', 3, 'Vegetable Tetrazini', 2),
(330, 'barbecue', 'Served with mushroom sauce', 4, 'Chicken Steak', 2),
(160, 'Silver Platter Special', '', 9, 'Crispy Honey Chilly Chicken', 1),
(380, 'Silver Platter Special', 'with pepper sauce and shredded tortilla sheets', 10, 'Tortilla Lamb Skillet', 1),
(180, 'Silver Platter Special', '', 11, 'Banana Split', 1),
(120, 'Mocktail', '', 12, 'Day At The Beach', 1),
(120, 'Mocktail', '', 13, 'Litchi Mojito', 1),
(325, 'Seafood', 'Baby Octopus fried with butter, garlic and salt peppers ', 14, 'Baby Octopus', 3),
(225, 'Starter', '', 15, 'Pav Bhaji Fondae', 3),
(325, 'Continental', 'With lemon butter sauce and butter rice', 16, 'Grilled Fish', 3),
(225, 'Continental', 'Fresh vegetables tossed in butter and baked in cheese', 17, 'Vegetable -Au-Gratin', 3),
(395, 'Seafood', 'Fresh lobster stuffed with lobster meat and cheese', 18, 'Lobster Thermidor', 3),
(120, 'Special Drink', 'Rubri, Almond, Cashew, Raisin', 19, 'Passsion Fruits', 4),
(80, 'Special Drink', '', 20, 'Pineapple Malai', 4),
(80, 'Special Drink', '', 21, 'Banana Malai', 4),
(50, 'Syrup', '', 22, 'Litchi', 4),
(50, 'Syrup', '', 23, 'Tamarind', 4),
(15, 'Desert', '', 24, 'Chocolate Mrble', 5),
(5, 'Desert', '', 25, 'Gujia', 5),
(20, 'Desert', '', 26, 'Pineapple Jholbhora', 5),
(15, 'Desert', '', 27, 'Ice cream Sandesh', 5),
(20, 'Desert', '20/Plate', 28, 'Dhokla', 5),
(345, 'Thai Cuisine', 'Chicken and cashew nuts stir fried in sweets Thai basil and Gaeng kua paste', 29, 'Gaeng Kua Kai', 6),
(195, 'Non Vegetarian Appetizers', '', 30, 'Papaya Salad With Prawn', 6),
(175, 'Vegetarian Appetizers', '', 31, 'Papaya Salad', 6),
(165, 'Soups', '', 32, 'Hot and Sour Soup', 6),
(165, 'Soups', 'With kaffir lime leaves, lemon grass, glass noddles, mushroom and chilli paste', 33, 'Tom Yum', 6),
(199, 'Burger', 'Mix Veg Patty, caramelized onions and Garlic Atoli served with fries', 34, 'Garden''s Treasure', 7),
(289, 'Burger', 'Lamb Patty, Lettuce, tomato, mayo, mustard and barbecue sauce', 35, 'Lambhorghini', 7),
(349, 'Burger', 'Panko fried prawns, Wasabi mayo and cream cheese served with fries', 36, 'Love In Tokyo', 7),
(329, 'Pizza', 'Regular Size, Mozzarella, green chilli, onion rings and homemade pesto sauce', 37, 'Pesto Pesto', 7),
(359, 'Burger', 'Regular Size, Italian tomato sauce, grilled chicken and Mozzarella chesse', 38, 'Al Pachino', 7),
(350, 'Starter', 'Crumb fried prawns', 39, 'Prawn Cutlet', 9),
(200, 'Starter', 'boneless hilsa covered with bottle guard leaves', 40, 'Hilsa Cutlet', 9),
(95, 'Dal', 'A popular bengali dal with coconut', 41, 'Chholar Dal', 9),
(95, 'Dal', 'Lentils with distinct flavors of mango, ginger and coconut', 42, 'Moong Mohan Dal', 9),
(160, 'Vegetable', 'spicy and dry', 43, 'Bhaja Masala Aloo Dum', 9),
(85, 'Desert', '', 44, 'Mudpie Slice', 8),
(90, 'Desert', '', 45, 'Belgian Truffle', 8),
(90, 'Desert', '', 46, 'Lemon Meringue Pie', 8),
(70, 'Desert', '', 47, 'Cheese Cake', 8),
(60, 'Desert', '', 48, 'Fudge Brownie', 8),
(146, 'Nan', '', 49, 'Butter Nan', 10),
(140, 'Chinese', '', 50, 'Chicken Chowmien', 10),
(180, 'Chinese', '', 51, 'Chicken Szechwan', 10),
(160, 'Biryani', '', 52, 'Chicken Biryani', 10),
(140, 'Biryani', '', 53, 'Veg Biryani', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `ot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='details of order';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`address`, `phone`, `status`, `id`, `ot`, `uid`, `rid`) VALUES
('d238, rkh, iitkgp', 2147483647, 3, 1, '2017-03-01 09:42:32', 0, 5),
('d238, rkh, iitkgp', 2147483647, 3, 2, '2017-03-01 03:59:42', 0, 2),
('d238, rkh, iitkgp', 2147483647, 3, 3, '2017-03-01 09:42:08', 0, 7),
('d238, rkh, iitkgp', 2147483647, 3, 4, '2017-03-01 09:41:29', 0, 2),
('d238, rkh, iitkgp', 2147483647, 3, 5, '2017-03-01 09:43:02', 0, 1),
('d238, rkh, iitkgp', 2147483647, 3, 6, '2017-03-01 09:43:28', 0, 4),
('d238, rkh, iitkgp', 2147483647, 3, 7, '2017-03-01 09:44:10', 0, 10),
('d238, rkh, iitkgp', 2147483647, 3, 8, '2017-03-01 09:40:15', 0, 9),
('d238, rkh, iitkgp', 2147483647, 3, 9, '2017-03-01 09:45:43', 0, 10),
('d238, rkh, iitkgp', 2147483647, 3, 10, '2017-03-01 09:45:30', 0, 9),
('d238, rkh, iitkgp', 2147483647, 0, 11, '2017-03-01 09:53:44', 0, 2),
('d238, rkh, iitkgp', 2147483647, 0, 12, '2017-03-01 09:53:44', 0, 3),
('d238, rkh, iitkgp', 2147483647, 3, 13, '2017-03-01 09:55:39', 0, 10),
('d238, rkh, iitkgp', 2147483647, 0, 14, '2017-03-01 09:53:44', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `mid`, `oid`, `qty`) VALUES
(3, 25, 1, 3),
(4, 26, 1, 3),
(5, 27, 1, 3),
(6, 28, 1, 3),
(7, 1, 2, 2),
(8, 37, 3, 2),
(9, 38, 3, 1),
(10, 36, 3, 1),
(11, 35, 3, 1),
(12, 34, 3, 1),
(13, 1, 4, 1),
(14, 13, 5, 2),
(15, 23, 6, 2),
(16, 52, 7, 2),
(17, 51, 7, 2),
(18, 40, 8, 2),
(19, 41, 8, 2),
(20, 49, 9, 1),
(21, 50, 9, 1),
(22, 43, 10, 1),
(23, 39, 10, 1),
(24, 4, 11, 2),
(25, 18, 12, 2),
(26, 53, 13, 1),
(27, 39, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(60) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `url` text NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`doj`, `password`, `address`, `id`, `phone`, `url`, `name`) VALUES
('2017-03-01 13:39:15', 'Silver Platter', '101, Rajdanga Nabapally, Near HDFC Bank, Kasba, Kolkata', 1, '9856547832', 'https://b.zmtcdn.com/data/pictures/8/18287268/1e8cf55303d402c7ef46a6d9f3085c77_featured_v2.jpg?fit=around%7C400%3A400&crop=400%3A400%3B*%2C*', 'Silver Platter'),
('2017-03-01 13:39:15', 'Barbeque Nation', 'K1, RDB Boulevard, Block EP & GP, Sector 5, Salt Lake', 2, '9856547831', 'https://b.zmtcdn.com/data/pictures/8/41518/f1bf91593c3e6e8967dc2a76575a7e43.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', 'Barbeque Nation'),
('2017-03-01 13:39:15', 'Spice Kraft', '54/1/2A, Hazra Road, Ballygunge Phari, Near Hazra Law College, Ballygunge, Kolkata', 3, '9687982134', 'https://b.zmtcdn.com/data/pictures/2/18017612/5987e42f7de406976ddb170f35b207be.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', 'Spice Kraft'),
('2017-03-01 13:39:15', 'Paramount Sherbats & Syrups', '1/1/1D, Bankim Chatterjee Street, College Square, College Street, Kolkata', 4, '9845652135', 'https://b.zmtcdn.com/data/pictures/3/22173/b89eb0b4593aca146934b86e105a9475.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', 'Paramount Sherbats & Syrups'),
('2017-03-01 13:39:15', 'Balaram Mullick Sweets', '2, Paddapukur Road, Bhawanipur, Kolkata', 5, '9845876512', 'https://b.zmtcdn.com/data/daily_menus/941/60941/51e3239bc0ffb24f9e7162f8391c3b31.jpg', 'Balaram Mullick Sweets'),
('2017-03-01 13:39:15', 'SOI', '26, Jawaharlal Nehru Road, Near Indian Museum, New Market Area, Kolkata', 6, '9756458765', 'https://b.zmtcdn.com/data/reviews_photos/338/153ffcaf64ee8ab41a9b2e06973d6338.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', 'SOI'),
('2017-03-01 13:39:15', 'My Big Fat Belly', '22, Sarat Bose Road, Sreepally, Bhawanipur, Kolkata', 7, '9664981232', 'https://b.zmtcdn.com/data/pictures/5/18343765/bd1116912e391d78caffb1c68392f027_featured_v2.jpg?fit=around%7C400%3A400&crop=400%3A400%3B*%2C*', 'My Big Fat Belly'),
('2017-03-01 13:39:15', 'Little Pleasures', '1st Floor, 8/1, Loudon Street, Loudon Street Area, Kolkata', 8, '9854879865', 'https://b.zmtcdn.com/data/pictures/3/24513/db48e6d6491a140100161b171ea4a30c_featured_v2.jpg?fit=around%7C400%3A400&crop=400%3A400%3B*%2C*', 'Little Pleasures'),
('2017-03-01 13:39:15', '6 Ballygunge Place', '6, Ballygunge Place, Ballygunge, Kolkata', 9, '9787653223', 'https://b.zmtcdn.com/data/pictures/2/20002/830413a71449c21182ba114bb63cee08.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', '6 Ballygunge Place'),
('2017-03-01 13:39:15', 'India Restaurant', '34, Karl Marx Sarani, Kidderpore, Kolkata', 10, '9854322132', 'https://b.zmtcdn.com/data/pictures/0/16586220/e8771ddd864981ae1d6fb129f7a57cae.jpg?fit=around%7C200%3A200&crop=200%3A200%3B*%2C*', 'India Restaurant'),
('2017-02-28 21:59:49', 'test', 'iit kgp', 121, '9997396633', 'http://i1.wp.com/chaiwallahsofindia.com/wp-content/uploads/2013/12/chai-cup-mumbai.jpg', 'ROTI');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'sweet'),
(2, 'spicy'),
(3, 'indian'),
(4, 'chinese'),
(5, 'drinks'),
(6, 'barbecue');

-- --------------------------------------------------------

--
-- Table structure for table `tag_m`
--

CREATE TABLE `tag_m` (
  `mid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_m`
--

INSERT INTO `tag_m` (`mid`, `id`) VALUES
(1, 6),
(2, 2),
(2, 6),
(3, 6),
(4, 6),
(12, 5),
(13, 5),
(19, 5),
(20, 5),
(22, 5),
(23, 5),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(37, 2),
(43, 2),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(50, 4),
(51, 4),
(52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tag_r`
--

CREATE TABLE `tag_r` (
  `rid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_r`
--

INSERT INTO `tag_r` (`rid`, `id`) VALUES
(1, 5),
(1, 6),
(4, 5),
(5, 1),
(8, 1),
(9, 3),
(10, 3),
(10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `doj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='stores details of users';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`doj`, `password`, `name`, `id`, `phone`, `email`, `address`) VALUES
('2017-03-01 01:01:04', 'test', 'Manikya Singh', 0, '9997396633', 'manikyakpsingh@gmail.com', 'd238, rkh, iitkgp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`rid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mid` (`mid`,`oid`),
  ADD UNIQUE KEY `mid_2` (`mid`,`oid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurant_phone` (`phone`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_m`
--
ALTER TABLE `tag_m`
  ADD PRIMARY KEY (`mid`,`id`);

--
-- Indexes for table `tag_r`
--
ALTER TABLE `tag_r`
  ADD PRIMARY KEY (`rid`,`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
