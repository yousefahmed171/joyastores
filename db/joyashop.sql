-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 01:54 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joyashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `region_name` varchar(30) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `appartment_number` varchar(10) NOT NULL,
  `Notes` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id_address`, `country`, `city`, `region_name`, `street_name`, `building_name`, `appartment_number`, `Notes`, `userid`) VALUES
(7, 'egypt', 'Cairo', 'naser city', 'eltwfqye', '130', '111', 'Egy Bank city', 1),
(8, 'EGYPT', 'Cairo', 'naser', 'naser', '12582', '125', 'BETTON EGY BANK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `info_en` text NOT NULL,
  `info_ar` text NOT NULL,
  `logo_img` varchar(255) NOT NULL,
  `guide_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brand`, `name_en`, `name_ar`, `info_en`, `info_ar`, `logo_img`, `guide_img`) VALUES
(5, 'Joya Stores', 'جويا', 'income company ', 'income company ', '93817139_logo.png', '4367065_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_order` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `timenow` time NOT NULL,
  `datanow` date NOT NULL,
  `delivery` varchar(30) NOT NULL DEFAULT ' Cash on Delivery',
  `address` text NOT NULL,
  `approve` int(2) NOT NULL,
  `shiped` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `iduser` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_order`, `color`, `size`, `quantity`, `total`, `timenow`, `datanow`, `delivery`, `address`, `approve`, `shiped`, `archived`, `status`, `iduser`, `idproduct`) VALUES
(44, '#8888', 'S', '1', 0, '00:00:00', '0000-00-00', ' Cash on Delivery', 'Cairo, naser city , eltwfqye , 130 , 111, Egy Bank city', 0, 0, 0, 1, 1, 52),
(45, '#8888', 'M', '1', 0, '00:00:00', '0000-00-00', ' Cash on Delivery', 'Cairo, naser city , eltwfqye , 130 , 111, Egy Bank city', 0, 0, 0, 1, 1, 52),
(46, '#8888', 'S', '1', 0, '00:00:00', '0000-00-00', ' Cash on Delivery', 'Cairo, naser city , eltwfqye , 130 , 111, Egy Bank city', 0, 0, 0, 1, 1, 53);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(11) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `dataed` datetime NOT NULL,
  `idspecies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `name_en`, `name_ar`, `description`, `dataed`, `idspecies`) VALUES
(7, 'Jaket - Men', 'جاكت', 'this good ', '2018-01-27 14:11:25', 25),
(8, 'Bantalon - Men', 'بنطلون', 'this good ', '2018-01-27 14:11:45', 25),
(9, 'Qameus - Men ', 'قميص', 'this good ', '2018-01-27 14:12:02', 25),
(10, 'T-Shert - Men ', 'تيشيرت', 'this good ', '2018-01-27 14:12:20', 25),
(11, 'Bantalon - Women', 'بنطلون', 'women', '2018-01-27 14:12:53', 26),
(12, 'Jaket - Women', 'جاكت', 'women', '2018-01-27 14:13:07', 26),
(13, 'Bantalon - Boys', 'بنطلون', 'kids', '2018-01-28 18:34:29', 27),
(14, 'Jaket - Boys', 'جاكت', 'kids', '2018-01-28 18:34:43', 27),
(15, 'T-Shert - Boys', 'تيشيرت', 'kids', '2018-01-28 18:35:00', 27),
(16, 'Begama - Girs', 'بيجامة', 'Baby', '2018-01-28 18:33:15', 28),
(18, 'Bantalon  - Girs', 'بنطلون', 'Baby', '2018-01-28 18:33:31', 28),
(19, 'qameus  home', 'قميص بيت ', 'women ', '2018-02-01 00:17:45', 26);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `com_data` datetime NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comment`, `com_data`, `pro_id`, `user_id`) VALUES
(21, 'good', '2018-03-06 19:14:11', 49, 7),
(22, 'good', '2018-03-07 13:12:11', 52, 1),
(23, 'good ', '2018-03-07 21:30:38', 58, 1),
(24, 'good', '2018-03-11 16:35:36', 43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `web` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `web`, `link`) VALUES
(8, 'facebook', 'https://www.facebook.com'),
(9, 'twitter', 'https://www.twitter.com'),
(10, 'instagram', 'https://www.instagram.com'),
(11, 'youtube', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `main-slider`
--

CREATE TABLE `main-slider` (
  `id` int(11) NOT NULL,
  `pimg_en` varchar(255) NOT NULL,
  `pimg_ar` varchar(255) NOT NULL,
  `mimg_en` varchar(255) NOT NULL,
  `mimg_ar` varchar(255) NOT NULL,
  `nameslider` varchar(255) NOT NULL,
  `linkslider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main-slider`
--

INSERT INTO `main-slider` (`id`, `pimg_en`, `pimg_ar`, `mimg_en`, `mimg_ar`, `nameslider`, `linkslider`) VALUES
(10, '59600830_slide4.jpg', '43539429_slide5.jpg', '78784180_slide6.jpg', '87649537_slide6.jpg', 'joya', 'http://localhost/e-admin/index.php'),
(13, '49005127_Opening-Discount-EN.png', '13607788_Opening-Discount-EN.png', '41235351_slide6.jpg', '19827270_slide6.jpg', 'joya', 'http://localhost/e-admin/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `nameproduct` text NOT NULL,
  `idproduct` int(11) NOT NULL,
  `priceproduct` int(11) NOT NULL,
  `quantityproduct` int(11) NOT NULL,
  `colorproduct` varchar(30) NOT NULL,
  `sizeproduct` varchar(30) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `pricedelivery` int(11) NOT NULL,
  `address` text NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_size` text NOT NULL,
  `xs` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `2xl` int(11) NOT NULL,
  `3xl` int(11) NOT NULL,
  `4xl` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_after_sale` int(11) NOT NULL,
  `pro_sale` int(11) NOT NULL,
  `pro_seller` varchar(100) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '0',
  `visiblity` tinyint(4) NOT NULL DEFAULT '0',
  `pro_feature_en` text NOT NULL,
  `pro_feature_ar` text NOT NULL,
  `additional_information_en` text NOT NULL,
  `additional_information_ar` text NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_img2` varchar(255) NOT NULL,
  `pro_img3` varchar(255) NOT NULL,
  `pro_img4` varchar(255) NOT NULL,
  `pro_img5` varchar(255) NOT NULL,
  `idspecies` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `pro_name`, `pro_id`, `pro_size`, `xs`, `s`, `m`, `l`, `xl`, `2xl`, `3xl`, `4xl`, `pro_price`, `pro_after_sale`, `pro_sale`, `pro_seller`, `availability`, `visiblity`, `pro_feature_en`, `pro_feature_ar`, `additional_information_en`, `additional_information_ar`, `pro_img`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_img5`, `idspecies`, `idcat`, `idbrand`) VALUES
(43, 't-shert + bantalon ', 1, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 250, 150, 10, 'Qaudro', 0, 1, 'good, whit, color', '', 'clen_cold, machenauto', '', '669488453_product-1.jpg', '1107422891_product-2.jpg', '349245936_product-3.jpg', '86622975_product-4.jpg', '1050061526_product-1.jpg', 27, 15, 5),
(44, 'begama banaty', 301, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 250, 200, 0, 'Lara', 0, 1, 'Good,Best', '', '', '', '965073758_l1-1.jpg', '608297260_l1-3.jpg', '738812652_l1-2.jpg', '1194820439_l1-2.jpg', '908443934_l1-1.jpg', 26, 11, 5),
(45, 'begama banaty', 302, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 350, 250, 0, 'Lara', 0, 1, 'Best,Good', '', '', '', '1149981322_l5-1.jpg', '295241051_l5-2.jpg', '170836171_l5-3.jpg', '1129971544_l5-4.jpg', '427563778_l5-5.jpg', 26, 12, 5),
(46, 'qameus home ', 303, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 280, 230, 0, 'Lara', 0, 1, '', '', '', '', '1038399914_l10-3.jpg', '669230262_l10-4.jpg', '153924681_l11-1.jpg', '13684106_l11-3.jpg', '304277725_l11-4.jpg', 26, 19, 5),
(47, 'qameus home', 304, 'XXX-Large,', 0, 0, 0, 0, 0, 0, 0, 0, 280, 220, 0, 'Mrshemlo', 0, 1, '', '', '', '', '164037150_m4-1.jpg', '1402362720_m4-2.jpg', '991538304_m4-3.jpg', '342317820_m5-1.jpg', '587297750_m5-2.jpg', 26, 19, 5),
(48, 'Blover', 305, 'XXX-Large,', 0, 0, 0, 0, 0, 0, 0, 0, 350, 280, 0, 'Legato', 0, 1, 'Good,Turke', '', '', '', '637214617_1.jpg', '365641045_2.jpg', '705979403_3.jpg', '502223919_4.jpg', '303115867_1.jpg', 25, 10, 5),
(49, 'Blover', 306, 'XXX-Large,', 0, 0, 0, 0, 0, 0, 0, 0, 380, 280, 0, 'Legato', 0, 1, '', '', '', '', '1404040959_5.jpg', '843982326_6.jpg', '408371604_7.jpg', '1287639991_8.jpg', '340123199_5.jpg', 25, 10, 5),
(52, 'Sweatshirt', 5003, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 320, 240, 20, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately\r\n\r\n', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '875223399_5.jpg', '156291429_6.jpg', '998724611_7.jpg', '795141254_8.jpg', '1231698675_5.jpg', 25, 10, 5),
(53, 'Sweatshirt', 5004, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 360, 320, 10, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '1028459572_1.jpg', '1326282530_2.jpg', '630415595_3.jpg', '638032221_4.jpg', '1269953929_1.jpg', 25, 10, 5),
(54, 'Sweatshirt', 5001, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 350, 320, 20, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '593537359_9.jpg', '518016583_10.jpg', '107708548_11.jpg', '1365484483_12.jpg', '871522666_10.jpg', 25, 10, 5),
(55, 'Sweatshirt', 5002, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 360, 320, 20, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '590137848_5.jpg', '1359244875_6.jpg', '1094728515_7.jpg', '706108499_6.jpg', '273940319_7.jpg', 25, 10, 5),
(56, 'Sweatshirt', 5008, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 390, 320, 10, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '308753030_12.jpg', '718286493_11.jpg', '830212156_12.jpg', '317488482_10.jpg', '1251837549_9.jpg', 25, 10, 5),
(57, 'Sweatshirt', 5006, 'X-small,', 0, 0, 0, 0, 0, 0, 0, 0, 400, 350, 20, 'Legato', 0, 1, 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', 'Comfortable poly-cotton blend french terry fabric,\r\nEmbroidered Tommy Hilfiger signature branding,\r\nEach item sold separately', '', '', '574130025_2.jpg', '55037648_3.jpg', '30810755_4.jpg', '100048891_1.jpg', '1279679111_4.jpg', 25, 10, 5),
(58, 'jacket', 2569, 'XXX-Large', 0, 0, 0, 0, 0, 0, 0, 0, 450, 360, 20, 'Marshemlo', 0, 1, 'Soft and comfortable rich cotton fabric,\r\nEach item sold separately\r\n\r\n', 'Soft and comfortable rich cotton fabric,\r\nEach item sold separately\r\n\r\n', 'SKU 	GI121AT07DNG,\r\nColor 	Grey,\r\nSize shown in image 	S,\r\nStyle Type 	Slogan,\r\nSupplier Style No. 	TOPC2,\r\nProduct Material 	Cotton,\r\nModel Measurements 	Bust: 81 cm - Waist: 63 cm - Hips: 91 cm,\r\nModel Height 	173 cm,\r\nWashing Instructions 	Wash according to instructions on Care Label.,\r\nNeck Type 	Round Neck,\r\nApparel Type 	T-shirt', 'SKU 	GI121AT07DNG,\r\nColor 	Grey,\r\nSize shown in image 	S,\r\nStyle Type 	Slogan,\r\nSupplier Style No. 	TOPC2,\r\nProduct Material 	Cotton,\r\nModel Measurements 	Bust: 81 cm - Waist: 63 cm - Hips: 91 cm,\r\nModel Height 	173 cm,\r\nWashing Instructions 	Wash according to instructions on Care Label.,\r\nNeck Type 	Round Neck,\r\nApparel Type 	T-shirt', '1288887912_m57-1.jpg', '13468947_m57-2.jpg', '214728588_m57-3.jpg', '1067145143_m57-1.jpg', '1070458591_m57-3.jpg', 26, 12, 5),
(59, 'Tailored Blazer ', 36985, 'XXX-Large', 9, 10, 10, 5, 2, 3, 2, 1, 350, 280, 20, 'Marshemlo', 0, 1, 'Dual mock flap over pockets,\r\nEach item sold separately\r\n', 'Dual mock flap over pockets,\r\nEach item sold separately\r\n', 'SKU 	DO860AT71QHK,\r\nColor 	Pink,\r\nProduct Material 	73% Polyester 19% Viscose 8% Elastane,\r\nSize shown in image 	S,\r\nSupplier Style No. 	66902442,\r\nModel Measurements 	Bust: 89 cm - Waist: 65 cm - Hips: 90 cm,\r\nModel Height 	178 cm,\r\nWashing Instructions 	Wash according to instructions on Care Label.,\r\nNeck Type 	Collar Neck,\r\nApparel Type 	Blazer', 'SKU 	DO860AT71QHK,\r\nColor 	Pink,\r\nProduct Material 	73% Polyester 19% Viscose 8% Elastane,\r\nSize shown in image 	S,\r\nSupplier Style No. 	66902442,\r\nModel Measurements 	Bust: 89 cm - Waist: 65 cm - Hips: 90 cm,\r\nModel Height 	178 cm,\r\nWashing Instructions 	Wash according to instructions on Care Label.,\r\nNeck Type 	Collar Neck,\r\nApparel Type 	Blazer', '250746189_m63-1.jpg', '828964234_m63-2.jpg', '644142733_m63-3.jpg', '1275031679_m63-4.jpg', '1014818497_m63-1.jpg', 26, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id_rate` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id_rate`, `rate`, `pro_id`, `user_id`) VALUES
(16, 2, 49, 7),
(22, 2, 49, 1),
(26, 2, 58, 1),
(27, 3, 49, 1),
(29, 5, 53, 11),
(30, 2, 43, 1),
(31, 5, 52, 1),
(32, 3, 48, 1),
(33, 3, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `email_cust` varchar(150) NOT NULL,
  `email_server` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `phone`, `phone2`, `email_cust`, `email_server`) VALUES
(1, 1010737793, 1010940942, '', 'Cusomer@joya.com');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id_species` int(11) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `dataed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id_species`, `name_en`, `name_ar`, `dataed`) VALUES
(25, 'Men Clothing', 'ملابس رجالي ', '2018-01-27 13:13:23'),
(26, 'Women Clothing', 'ملابس نسائي ', '2018-01-27 13:14:02'),
(27, 'Boys Clothing', 'ملابس ولادي ', '2018-01-27 13:14:34'),
(28, 'Girs Clothing', 'ملابس بناتي ', '2018-01-27 13:14:55'),
(29, 'Baby Clothing', 'حديثي الولادة ', '2018-01-28 18:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `stikers`
--

CREATE TABLE `stikers` (
  `id` int(11) NOT NULL,
  `img_en` varchar(255) NOT NULL,
  `img_ar` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` enum('1','2','3','4') NOT NULL,
  `selected` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stikers`
--

INSERT INTO `stikers` (`id`, `img_en`, `img_ar`, `name`, `link`, `type`, `selected`) VALUES
(3, '89184571_boys-en.png', '96292115_boys-ar.png', 'Boys', 'http://www.google.com', '1', ''),
(4, '94451905_girls-en.png', '48556519_girls-ar.png', 'Girs', 'http://www.google.com', '2', ''),
(5, '6896972_men-en.png', '8193969_men-ar.png', 'Man', 'http://www.google.com', '3', ''),
(6, '48004150_women-en.png', '17001342_women-ar.png', 'Women', 'http://www.google.com', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastlname` varchar(30) NOT NULL,
  `birth-yaer` year(4) NOT NULL,
  `birth-month` int(11) NOT NULL,
  `birth-day` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(14) NOT NULL,
  `created` datetime NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street-name` varchar(255) NOT NULL,
  `building-number` varchar(50) NOT NULL,
  `appartment-no` int(11) NOT NULL,
  `specialinfo` text NOT NULL,
  `groupid` int(11) NOT NULL DEFAULT '0',
  `truststatus` int(11) NOT NULL DEFAULT '0',
  `regstatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `firstname`, `lastlname`, `birth-yaer`, `birth-month`, `birth-day`, `password`, `gender`, `email`, `phone`, `created`, `country`, `city`, `street-name`, `building-number`, `appartment-no`, `specialinfo`, `groupid`, `truststatus`, `regstatus`) VALUES
(1, 'yousef', 'yousef', 'yousef ahmed', 1994, 12, 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Male', 'yousefahmed171@gmail.com', '01010737794', '0000-00-00 00:00:00', 'egypt', 'cairo', 'street number 7 ', '315', 2, 'butoun Goverment Ouber', 1, 0, 0),
(4, 'hassan', '', 'hassn ahmed', 1994, 12, 12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', 'ahmed@gmail.com', '52525655', '0000-00-00 00:00:00', 'egypt', 'cairo', 'naser', '113', 0, '', 0, 0, 1),
(6, 'ali ali', '', 'alialia', 1994, 5, 25, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2', 'emlail@gmail.com', '2856', '0000-00-00 00:00:00', '', '', '', '', 0, '', 0, 0, 1),
(7, 'sara', 'sara', 'ahmed', 1994, 12, 3, '10a34637ad661d98ba3344717656fcc76209c2f8', 'Female', 'sara@gmail.com', '01010797793', '0000-00-00 00:00:00', 'egypt', 'cairo', 'naser city', '325', 0, '', 1, 0, 1),
(11, 'ahmed', '', 'ahmed yousef', 1996, 12, 12, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', 'ahmed@gmail.com', '1091709070', '2018-01-23 00:00:00', '', '', '', '', 0, '', 0, 0, 0),
(12, 'tamer', '', '', 0000, 0, 0, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'tamer@gmail.com', '0', '2018-01-29 20:54:56', '', '', '', '', 0, '', 0, 0, 0),
(15, 'ahmed', '', '', 0000, 0, 0, '', '', '', '0', '0000-00-00 00:00:00', '', '', '', '', 0, '', 0, 0, 0),
(18, 'samer', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'samer@gmail.com', '0', '2018-03-07 12:14:35', '', '', '', '', 0, '', 0, 0, 0),
(20, 'nora', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'nora@gmail.com', '0', '2018-03-07 15:57:31', '', '', '', '', 0, '', 0, 0, 0),
(21, 'dena', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'dena@gmail.com', '0', '2018-03-07 15:59:52', '', '', '', '', 0, '', 0, 0, 0),
(22, 'abdo', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'abdo@gmail.com', '0', '2018-03-07 16:00:36', '', '', '', '', 0, '', 0, 0, 0),
(23, 'tons', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'tons@gmail.com', '0', '2018-03-07 16:02:56', '', '', '', '', 0, '', 0, 0, 0),
(24, 'tonb', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'tonb@gmail.com', '0', '2018-03-07 16:03:47', '', '', '', '', 0, '', 0, 0, 0),
(25, 'boys', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'boys@gmail.com', '0', '2018-03-07 16:04:48', '', '', '', '', 0, '', 0, 0, 0),
(26, 'soma', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'soma@gmail.com', '0', '2018-03-07 16:06:57', '', '', '', '', 0, '', 0, 0, 0),
(27, 'bamby', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'bamby@gmail.com', '0', '2018-03-07 16:09:13', '', '', '', '', 0, '', 0, 0, 0),
(28, 'none', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'none@gmail.com', '0', '2018-03-07 16:24:11', '', '', '', '', 0, '', 0, 0, 0),
(29, 'bant', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'bant@gmail.com', '0', '2018-03-07 16:25:14', '', '', '', '', 0, '', 0, 0, 0),
(30, 'soso', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'soso@gmail.com', '0', '2018-03-07 16:27:09', '', '', '', '', 0, '', 0, 0, 0),
(31, 'nonoe', '', '', 0000, 0, 0, '9adcb29710e807607b683f62e555c22dc5659713', '', 'non@gmail.com', '0', '2018-03-07 16:27:56', '', '', '', '', 0, '', 0, 0, 0),
(32, 'yousef', '', 'yousef ahmed', 1994, 12, 3, '', 'Mel', '', '', '0000-00-00 00:00:00', '', '', '', '', 0, '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `idproduct` (`idproduct`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `id-species` (`idspecies`),
  ADD KEY `id-species_2` (`idspecies`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `proid` (`pro_id`),
  ADD KEY `userid` (`user_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `main-slider`
--
ALTER TABLE `main-slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `idbrand` (`idbrand`),
  ADD KEY `idcat` (`idcat`),
  ADD KEY `idspecies` (`idspecies`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id_rate`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id_species`);

--
-- Indexes for table `stikers`
--
ALTER TABLE `stikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `main-slider`
--
ALTER TABLE `main-slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id_species` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stikers`
--
ALTER TABLE `stikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`idspecies`) REFERENCES `species` (`id_species`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idspecies`) REFERENCES `species` (`id_species`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idcat`) REFERENCES `category` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`idbrand`) REFERENCES `brands` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
