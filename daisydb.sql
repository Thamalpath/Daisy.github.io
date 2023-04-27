-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 10:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daisydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_role` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_mobile` varchar(50) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_username`, `admin_password`, `admin_role`, `admin_email`, `admin_mobile`, `admin_status`) VALUES
(1, 'admin', 'admin', 0, '', '', 1),
(2, 'Thamal', '123', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(20) NOT NULL,
  `cart_pro_id` int(20) NOT NULL,
  `cart_pro_qty` int(20) NOT NULL,
  `cart_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_pro_id`, `cart_pro_qty`, `cart_created_at`) VALUES
(1, 1, 2, 1, '2022-09-22 05:50:27'),
(2, 3, 2, 2, '2022-12-06 05:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Men\'s Wear', 1),
(2, 'Women\'s Wear', 1),
(3, 'Kid\'s Wear', 1),
(4, 'Foot Wear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `tracking_no` varchar(200) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(200) NOT NULL,
  `total_price` int(200) NOT NULL,
  `payment_mode` varchar(200) DEFAULT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(200) NOT NULL,
  `pro_id` int(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `price` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_slug` varchar(200) NOT NULL,
  `pro_original_price` double NOT NULL,
  `pro_selling_price` int(20) NOT NULL,
  `pro_qty` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `pro_small_description` text NOT NULL,
  `pro_description` text NOT NULL,
  `pro_meta_title` text NOT NULL,
  `pro_meta_description` text NOT NULL,
  `pro_meta_keywords` text NOT NULL,
  `pro_trending` tinyint(20) NOT NULL,
  `pro_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pro_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cat_id`, `sub_cat_id`, `pro_name`, `pro_slug`, `pro_original_price`, `pro_selling_price`, `pro_qty`, `image`, `image2`, `image3`, `image4`, `pro_small_description`, `pro_description`, `pro_meta_title`, `pro_meta_description`, `pro_meta_keywords`, `pro_trending`, `pro_created_at`, `pro_status`) VALUES
(2, 1, 1, 'Hot Juice Vila Nova Shirt', 'Hot Juice Vila Nova Shirt', 0, 2250, 20, '1663500229.jpg', '1663500230.jpg', '1663500231.jpg', '1663500232.jpg', '', 'Hot Juice Vila Nova Shirt. This beautiful piece is a part of Hot Juice\'s new stylish collection especially designed with modest beauty in mind, count on them to take you through the season with stylish ease. We make limited quantities for exclusivity in fabrics that are specially printed or sourced for our collections in small rolls. Order now before we sell out!', 'Hot Juice Vila Nova Shirt', '', 'Hot Juice Vila Nova Shirt Casual Gents', 1, '2022-09-18 08:54:43', 1),
(3, 1, 1, 'Hot Juice Cascais Shirt', 'Hot Juice Cascais Shirt', 0, 2350, 22, '1663500881.jpg', '1663500882.jpg', '1663500883.jpg', '1663500884.jpg', '', 'Hot Juice Cascais Shirt. This beautiful piece is a part of Hot Juice\'s new stylish collection especially designed with modest beauty in mind, count on them to take you through the season with stylish ease. We make limited quantities for exclusivity in fabrics that are specially printed or sourced for our collections in small rolls. Order now before we sell out!', 'Hot Juice Cascais Shirt', '', 'Hot Juice Cascais Shirt Gents Casual', 0, '2022-09-18 08:57:14', 1),
(4, 1, 1, 'Gents Casual Long Sleeve Shirt - Purple Printed', 'Gents Casual Long Sleeve Shirt - Purple Printed', 0, 2190, 25, '1663499112.jpg', '1663499113.jpg', '1663499114.jpg', '1663499115.jpg', '', 'Keep it professional with the solid performance of this Unlisted dress shirt. Designed for easy wear and care, this machine-washable style is cut from a breathable, lightweight cotton-blend fabric for all-day comfort in and out of the office. Sewn-in collar stays ensure a crisp, neat look, that works from day to night. The rounded hem is cut with a large silhouette for comfort and movement. We have limited pieces available so get it now while stocks last.', 'Gents Casual Long Sleeve Shirt - Purple Printed', '', 'Gents Casual Long Sleeve Shirt Purple Printed', 0, '2022-09-18 11:05:11', 1),
(5, 1, 1, 'Gents Floral Shirt - Light Blue', 'Gents Floral Shirt - Light Blue', 0, 1990, 20, '1663501575.jpg', '1663501576.jpg', '1663501577.jpg', '1663501578.jpg', '', 'Wash & Care - Wash dark colors separately. Fabric Composition - Linen. Model wears', 'Gents Floral Shirt - Light Blue', '', 'Gents Floral Shirt Gents Casual', 1, '2022-09-18 11:46:14', 1),
(6, 1, 1, 'Mosh Gents Short Sleeve Linen Shirt - Black', 'Mosh Gents Short Sleeve Linen Shirt - Black', 0, 2590, 20, '1663501883.jpg', '1663501884.jpg', '1663501885.jpg', '1663501886.jpg', '', 'Wash & Care - Wash dark colors separately. Fabric Composition - Linen. Model wears\r\n', 'Mosh Gents Short Sleeve Linen Shirt - Black', '', 'Mosh Gents Short Sleeve Linen Shirt Casual', 0, '2022-09-18 11:51:22', 1),
(7, 1, 2, 'Gents Sports T Shirt', 'Gents Sports T Shirt', 0, 1590, 20, '1663521332.jpg', '1663521333.jpg', '1663521334.jpg', '1663521335.jpg', '', 'Refresh your clothing with this awesome and stylish Sports T-Shirt for Mens from Beverly. Best way to look cool and comfortable and pair it with shorts or trackpant for the perfect Sports wear. It remains cool, dry & all day comfortable. Soft smooth & quick dry fabric best for training, gym, fitness & running.', 'Gents Sports T Shirt', '', 'Gents Sports T Shirt', 1, '2022-09-18 17:15:31', 1),
(8, 2, 11, 'Front Button Detail WW Dress', 'Front Button Detail WW Dress', 0, 6550, 25, '1663536048.jpg', '1663536049.jpg', '1663536050.jpg', '1663536051.jpeg', '', 'COMPOSITION:69% Polyester, 28% Nylon, 3% Spandex LENGTH:Knee 38\" SLEEVE:Short Solid Scuba Fabric Overlap with side gold buttons Semi Fitted No Collars', 'Front Button Detail WW Dress', '', 'Front Button Detail WW Dress Women', 1, '2022-09-18 21:20:47', 1),
(9, 2, 11, 'Walk with Confident WW Dress', 'Walk with Confident WW Dress', 0, 3990, 25, '1663536253.jpg', '1663536254.jpg', '1663536255.jpg', '1663536256.jpeg', '', 'COMPOSITION:100% Polyester LENGTH:Knee Length - 37 1/2\' Long Sleeve High Neck Waist Pleat Detail Back Invisible Zipper Gold Buttons On Back Neck & Sleeve Cuffs Semi Fitted Solid Woven Fabric', 'Walk with Confident WW Dress', '', 'Walk with Confident WW Dress Women', 1, '2022-09-18 21:24:12', 1),
(10, 2, 11, 'Sleeve Ruch WW Dress', 'Sleeve Ruch WW Dress', 4000, 3750, 25, '1663536492.jpg', '1663536493.jpg', '1663536494.jpg', '1663536495.jpeg', '', 'COMPOSITION:100% Polyester LENGTH:Short Length - 37\' Long SLeeve With Collar Front Open With Gold Metal Buttons Front Both Side Pocket Detail Sleeve Ruch Detail Semi Fitted Printed Woven Fabric', 'Sleeve Ruch WW Dress', '', 'Sleeve Ruch WW Dress Women ', 1, '2022-09-18 21:28:11', 1),
(11, 3, 25, 'Cord Hoodie Jacket', 'Cord Hoodie Jacket', 0, 1250, 15, '1663538426.jpg', '1663538427.jpg', '1663538428.jpg', '1663538429.jpg', '', 'Put together the perfect outfit for your child with quality everyday styles and create a comfortable and trendy look. Woven fabric has a distinct criss-cross pattern and a lightly textured surface for a clean and classic look.', 'Cord Hoodie Jacket ', '', 'Cord Hoodie Jacket Kids', 0, '2022-09-18 22:00:25', 1),
(12, 3, 19, 'Palm Short Sleeved Shirt', 'Palm Short Sleeved Shirt', 0, 1250, 20, '1663538658.jpg', '1663538659.jpg', '1663538660.jpg', '1663538661.jpg', '', 'Suit up for special occasions or everyday wear with cool shirts that allow for your child to move around and play. This product is made with organic cotton. Organic cotton is grown without the use of harmful chemicals. Organic cotton farming protects natural resources and farmers.', 'Palm Short Sleeved Shirt', '', 'Palm Short Sleeved Shirt Kids', 0, '2022-09-18 22:04:17', 1),
(13, 3, 19, 'Regular Fit Long Sleeved Shirt', 'Regular Fit Long Sleeved Shir', 0, 1500, 20, '1663538867.jpg', '1663538868.jpg', '1663538869.jpg', '1663538870.jpg', '', 'Bring light and colour into your child´s wardrobe with amazing spring and summer styles that ensure freedom of movement and a stylish look.', 'Regular Fit Long Sleeved Shirt', '', 'Regular Fit Long Sleeved Shirt Kids', 0, '2022-09-18 22:07:46', 1),
(14, 4, 26, 'Air Jordan 1Blue', 'Air Jordan 1Blue', 6000, 4990, 13, '1663540223.jpg', '1663540224.jpg', '1663540225.jpg', '1663540226.jpg', '', 'The better a shoe fits, the more you can focus on your speed. This is Air Jordan 1 Red this is an idea for Sneaker shoe, utilizing Nike’s innovative lacing technology to lock you in with one pull. The dual-sensity midsole offers the perfect balance of support and responsiveness, so you can make hard cuts while maintaining speed.\r\n\r\nNike FastFit technology offers a close, consistent fit with one simple motion. Just step in, pull up on the band and you’re ready to play', 'Air Jordan 1Blue', '', 'Air Jordan 1Blue Gents Shoe', 0, '2022-09-18 22:30:22', 1),
(15, 4, 26, 'Flip Flops Plain', 'Flip Flops Plain', 3000, 2490, 28, '1663540622.png', '1663540623.png', '1663540624.png', '1663540625.png', '', 'Soft rubber upper for a comfortable flip flop fit. Fuse technology for a seamless feel. Firm Solar soft foam at the out sole for durability.', 'Flip Flops Plain', '', 'Flip Flops Plain Casual Slippers\r\n', 0, '2022-09-18 22:37:01', 1),
(16, 4, 26, 'Black Loafer', 'Black Loafer', 0, 4700, 25, '1663540910.jpg', '1663540911.jpg', '1663540912.jpg', '1663540913.jpg', '', 'This is High Quality Imported Black Lauren Loafer Casual Shoes For Every one. Its Upper Part Material is Made with Genuine Leather.  This Shoes Sole Give More Clarity. and its Back side Sole is made with rubber Printed Emboss Logo With Gold Batch,  And It delivers an energized push-off. The more energy you give, and the more you get The Supportive cage wraps around the mid foot for a locked-down fit.', 'Black Loafer', '', 'Black Loafer Gents', 0, '2022-09-18 22:41:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `sub_cat_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `sub_cat_status`) VALUES
(1, 1, 'Men\'s Shirts\r\n', 1),
(2, 1, 'Men\'s T-Shirts', 1),
(3, 1, 'Men\'s Trousers', 1),
(4, 1, 'Men\'s Jeans', 1),
(5, 1, 'Men\'s Shorts', 1),
(6, 1, 'Men\'s Innerwear', 1),
(7, 1, 'Men\'s Accessories', 1),
(8, 2, 'Women\'s Tops', 1),
(9, 2, 'Women\'s T-Shirts', 1),
(10, 2, 'Women\'s Pants', 1),
(11, 2, 'Women\'s Dresses', 1),
(12, 2, 'Women\'s Jeans', 1),
(13, 2, 'Women\'s Skirts', 1),
(14, 2, 'Sarees', 1),
(15, 2, 'Women\'s Shorts', 1),
(16, 2, 'Women\'s Nightwear', 1),
(17, 2, 'Women\'s Innerwear', 1),
(18, 2, 'Women\'s Accessories', 1),
(19, 3, 'Kid\'s Shirts', 1),
(20, 3, 'Kid\'s T-Shirts', 1),
(21, 3, 'Kid\'s Trousers', 1),
(22, 3, 'Kid\'s Shorts', 1),
(23, 3, 'Kid\'s Frocks', 1),
(24, 3, 'Kid\'s Accessories', 1),
(25, 3, 'Kid\'s Jacket', 1),
(26, 4, 'Men Footwear', 1),
(27, 4, 'Women Footwear', 1),
(28, 4, 'Kid Footwear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_code` text NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_code`, `user_mobile`, `user_address`, `user_contact`, `user_image`) VALUES
(1, 'Thamal', 'thamalpathfx@gmail.com', '123456y', 'cc647e4af88b6f05adf14d7719eabb0c', '', '', '', ''),
(2, 'Thamal', 'thamalcreationbusiness712@gmail.com', '123456y', '46065755ec6acd58e70520c9dce289c0', '', '', '', ''),
(3, 'Pavan', 'sathsaraedirisinghe@gmail.com', '123456', 'f4a6ea44c59cb2771ff7d8ffbfe56b21', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`) USING BTREE;

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
