-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 02:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numbers_atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(200) NOT NULL,
  `banner_title` text NOT NULL,
  `banner_subtitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_img`, `banner_title`, `banner_subtitle`) VALUES
(1, '87935162582610329c224a1.jpg', 'banner 1', 'banner Subtittle 3'),
(2, '7888916258259849884319f.png', 'banner 2', 'banner Subtittle 2'),
(4, '427941625912011d7bb73c2.png', 'banner title 3', 'banner Subtittle 3'),
(6, '1679162616310489ec59ad.png', 'banner title 4', 'banner Subtittle4');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_img` varchar(200) NOT NULL,
  `brand_create_at` datetime NOT NULL,
  `brand_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_img`, `brand_create_at`, `brand_updated_at`) VALUES
(1, 'Ready to Port', '75570162616304446e11dcb.png', '2021-07-13 13:27:26', '2021-06-24 11:20:34'),
(2, 'sim', '1567216261598776c87b263.png', '2021-07-13 12:34:38', '2021-06-24 11:20:34'),
(3, 'jio', '6161816261598856e39ccd4.png', '2021-07-13 12:34:46', '0000-00-00 00:00:00'),
(4, 'BSNL', '73558162615989343cb14ca.png', '2021-07-13 12:34:55', '0000-00-00 00:00:00'),
(5, 'Airtel', '91049162616306978b5e63a.png', '2021-07-13 13:27:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(300) NOT NULL,
  `category_desc` text NOT NULL,
  `category_img` varchar(300) NOT NULL,
  `category_create_at` datetime NOT NULL,
  `category_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_img`, `category_create_at`, `category_updated_at`) VALUES
(5, 'Super Vip Number', 'Super Vip Number', '612931624546384c070eea3.jpg', '2021-06-24 14:37:51', '2021-07-09 20:21:13'),
(6, ' Penta Number', 'penta type number', '337316245455083706f844.jpg', '2021-06-24 20:08:30', '2021-07-08 16:35:14'),
(7, 'Hexa Numbers', '<b>Electricity</b>', '6310416245473478fb78a0b.jpg', '2021-06-24 20:39:08', '0000-00-00 00:00:00'),
(10, '13 Special Numbers', '<b>13 Special Numbers</b>                                                ', '59835162546049876095d76.jpg', '2021-07-05 10:18:21', '2021-07-06 17:29:26'),
(11, 'Tetra Number', '<b>tetra number</b>', '35592162557240701f7d54f.jpg', '2021-07-06 17:23:29', '2021-07-09 20:18:33'),
(12, 'Zeros Number', '<b>Zeros Number</b>', '791711625572461ccc6d227.jpg', '2021-07-06 17:24:24', '0000-00-00 00:00:00'),
(13, 'Fancy Numbers', 'fanceyyyyyyyyyy', '600841625572501f3bfb8c5.jpg', '2021-07-06 17:25:03', '2021-07-09 12:37:27'),
(14, '786 Special Numbers', '<b>786 Special Number</b>', '9971625572550b5c583f5.jpg', '2021-07-06 17:25:52', '0000-00-00 00:00:00'),
(15, 'Tripling Numbers', '<b>Tripaling Number</b>', '5784216255725989ba4a454.jpg', '2021-07-06 17:26:40', '0000-00-00 00:00:00'),
(17, 'Special Digit Numbers', '<b>Special Digit Numbers</b>                                                ', '915821625572674ffcf10ea.jpg', '2021-07-06 17:27:56', '0000-00-00 00:00:00'),
(18, 'Counting Number', '<b>Counting Numbers</b>                                                ', '5427516255727060e4d0ff1.jpg', '2021-07-06 17:28:27', '2021-07-09 12:43:36'),
(25, 'Special', 'AAAAAAAAAAAaaaaaaaaaAAAAAaaaaaaaaaaaaAaaaaaaaaa', '24892162616917619fb4359.png', '2021-07-13 15:09:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_logo`
--

CREATE TABLE `client_logo` (
  `logo_id` int(11) NOT NULL,
  `logo_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_logo`
--

INSERT INTO `client_logo` (`logo_id`, `logo_img`) VALUES
(1, '7271116258277410eb2d076.png'),
(3, '7442016260903976bc77675.jpg'),
(4, '9644416261631168efb31d3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `commission_id` int(11) NOT NULL,
  `from_amount` float(8,2) NOT NULL,
  `to_amount` float(8,2) NOT NULL,
  `commission_rs` float(8,2) NOT NULL,
  `commission_percent` int(11) NOT NULL,
  `commission_create_at` datetime NOT NULL,
  `commission_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`commission_id`, `from_amount`, `to_amount`, `commission_rs`, `commission_percent`, `commission_create_at`, `commission_updated_at`) VALUES
(1, 100.00, 50.00, 10.00, 2, '2021-06-24 16:01:14', '2021-06-24 11:42:31'),
(4, 1000.00, 10000.00, 40.00, 40, '2021-07-12 17:42:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_alter_email` varchar(100) NOT NULL,
  `customer_mobile` bigint(20) NOT NULL,
  `customer_alter_mobile` bigint(20) NOT NULL,
  `customer_company_name` varchar(150) NOT NULL,
  `customer_gst_no` varchar(150) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_pincode` int(11) NOT NULL,
  `customer_state` varchar(100) NOT NULL,
  `customer_status` varchar(100) NOT NULL,
  `customer_create_at` datetime NOT NULL,
  `customer_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_alter_email`, `customer_mobile`, `customer_alter_mobile`, `customer_company_name`, `customer_gst_no`, `customer_address`, `customer_pincode`, `customer_state`, `customer_status`, `customer_create_at`, `customer_updated_at`) VALUES
(1, 'luckyggg', 'lucky@gmail.com', 'lucky1@gmail.com', 9566666666, 96666666, 'Lucky Transport', '562235666', 'indrapuri bhopal', 462022, 'Madhya Pradesh', 'active', '2021-06-26 10:33:49', '2021-07-02 15:51:27'),
(4, 'Aayush', 'xyz@gmail.com', 'vivek11@gmail.com', 8269763363, 9098416867, 'AVS Prime', '123456789', 'xyz xyz', 462021, 'madhya pradesh', '', '2021-07-12 17:36:41', '0000-00-00 00:00:00'),
(5, 'shubham singh2', 'shubham@gmail.com', 'rocky@gamil.com', 8888888888, 9999999, 'avs', '0202020', 'bhopal', 462025, 'm.p.', '', '2021-07-13 13:40:06', '2021-07-13 13:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `gst_in` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `contact_1` bigint(20) NOT NULL,
  `contact_2` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `anniversary` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `customer_type` varchar(25) NOT NULL,
  `ragistration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`customer_id`, `customer_name`, `company_name`, `gst_in`, `email_id`, `contact_1`, `contact_2`, `address`, `gender`, `dob`, `anniversary`, `class_id`, `customer_type`, `ragistration_date`) VALUES
(1, 'vivek at', 'verifySoft', '', '', 7746839761, 0, 'testing', 'male', '1970-01-01', '1970-01-01', 1, '', '2020-09-01 00:00:00'),
(2, 'vivek at', '', '', 'demo@gmail.com', 70674280750, 0, 'test', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '2020-08-12 00:00:00'),
(3, 'ssssss', '', '', '', 70674280751, 0, 'Panager Barouda, Jabalpur, Madhya Pradesh 487661, India', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00'),
(4, 'vivek kumar', '', '', '', 70674280753, 0, 'Panager Barouda, Jabalpur, Madhya Pradesh 487661, India', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00'),
(5, 'tylor sw', '', '', '', 7067428055, 0, 'Panager Barouda, Jabalpur, Madhya Pradesh 487661, India', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00'),
(6, 'vivek', '', '', '', 1231231234, 0, 'test', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00'),
(7, 'vvvv', '', '', '', 1231231236, 0, 'test', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00'),
(8, 'vivek', '', '', '', 7067428075, 0, 'Panager Barouda, Jabalpur, Madhya Pradesh 487661, India', '', '0000-00-00', '0000-00-00', 1, 'food_delivery_app', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `profile_type_id` int(11) NOT NULL,
  `employee_login_id` varchar(200) NOT NULL,
  `employee_password` varchar(200) NOT NULL,
  `employee_first_name` varchar(100) NOT NULL,
  `employee_last_name` varchar(100) NOT NULL,
  `employee_contact_number` bigint(20) NOT NULL,
  `employee_email_id` varchar(100) NOT NULL,
  `employee_profile` varchar(100) NOT NULL,
  `employee_create_at` datetime NOT NULL,
  `employee_upadated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `profile_type_id`, `employee_login_id`, `employee_password`, `employee_first_name`, `employee_last_name`, `employee_contact_number`, `employee_email_id`, `employee_profile`, `employee_create_at`, `employee_upadated_at`) VALUES
(1, 1, 'admin111', '12345622', 'deepak', 'singh', 3265265655, 'deepak@gmail.com', 'admin', '2021-06-25 13:14:05', '2021-06-28 13:02:14'),
(2, 2, 'admin', '12345622', 'deepak', 'singh', 3265265655, 'deepak@gmail.com', 'admin', '2021-06-25 13:14:05', '2021-06-25 17:38:42'),
(5, 4, 'aayush', '123456', 'Rahul', 'Singh', 8269763363, 'eather18@gmail.com', 'accountant', '2021-07-12 17:40:50', '0000-00-00 00:00:00'),
(6, 4, 'deepak1', '12345', 'deepak ', 'singh', 999999999, 'deepak@gmail.com', 'admin', '2021-07-13 13:44:18', '2021-07-13 13:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `enquires`
--

CREATE TABLE `enquires` (
  `enquires_id` int(11) NOT NULL,
  `required_number` bigint(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_mobile_no` bigint(20) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_budget` bigint(20) NOT NULL,
  `enquiry_type` varchar(1000) NOT NULL,
  `enquiry_source` varchar(100) NOT NULL,
  `enquires_msg` text NOT NULL,
  `enquires_create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquires`
--

INSERT INTO `enquires` (`enquires_id`, `required_number`, `customer_name`, `customer_mobile_no`, `customer_city`, `customer_email`, `customer_budget`, `enquiry_type`, `enquiry_source`, `enquires_msg`, `enquires_create_at`) VALUES
(1, 9696969696, 'rahul', 99999999999, 'bhopal', 'rahul@gmail.com', 2000, 'contact_enquiry', '', 'Elon Musk is a visionary and he is well knowned to have the midas touch. Anything he tweets or gets involved in, goes up in prices. Elon Musk caused Bitcoin\'s price to soar when he tweeted about it. Proof: https://www.forbes.com/sites/jonathanponciano/2021/06/13/musk-denies-bitcoin-pump-and-dump-and-says-tesla-will-resume-transactions-once-this-mining-goal-is-reached/?sh=17fdcafeaa2a Elon Musk caused Doge Coin to soar when he tweeted about it. https://www.news.com.au/finance/money/investing/dogecoin-price-elon-musk-pumps-crypto-with-ceo-tweet/news-story/adb38ab506f84b632992bd8314068003 The most important question everyone has is: \"what is next?\" The short answer is a newly listed NASDAQ crypto mining company from Canada. Rumours have it that Elon Musk or Tesla might have or is going to acquire a stake in this newly listed NASDAQ. Many are waiting for his \"infamous\" tweets to send stock price soaring. With all the talk about going green, this newly listed Bitcoin and Ethereum mining company is a green company that mines bitcoin and ethereum using green energy. It is currently trading at less than USD$3.50 in NASDAQ, way lower than it\'s all time high in 2018. And Bitcoin and Ethereum have broken their all time high, making this stock highly undervalued. This company is Canadian company Hive Blockchain. You can check out their stock here:', '2021-07-20 16:38:13'),
(2, 9595959595, 'rohit', 88888888888, 'bhopal', 'rahul1@gmail.com', 5000, 'online_enquiry', '', '', '2021-07-26 16:38:18'),
(4, 99999999997, 'dsda', 7777, 'ddd', 'adsda', 77777, 'online_enquiry', 'asd', '', '2021-07-07 19:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `online_orders`
--

CREATE TABLE `online_orders` (
  `online_order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `online_order_details` text NOT NULL,
  `delivery_details` text NOT NULL,
  `cart_total` float(8,2) NOT NULL,
  `total_order_price` float(8,2) NOT NULL,
  `order_tax` float(8,2) NOT NULL,
  `delivery_charge` float(8,2) NOT NULL,
  `point_discount` float(8,2) DEFAULT NULL,
  `coupan_discount` float(8,2) DEFAULT NULL,
  `paid_amount` float(8,2) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `online_order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `order_status` varchar(25) NOT NULL,
  `delivery_person` int(11) NOT NULL,
  `order_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_orders`
--

INSERT INTO `online_orders` (`online_order_id`, `customer_id`, `online_order_details`, `delivery_details`, `cart_total`, `total_order_price`, `order_tax`, `delivery_charge`, `point_discount`, `coupan_discount`, `paid_amount`, `payment_method`, `online_order_date`, `delivery_date`, `order_status`, `delivery_person`, `order_updated_at`) VALUES
(1, 8, '[{\"item_id\":2,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"816801606737121bb5fb42c.jpg\",\"item_gst\":11},{\"item_id\":3,\"item_name\":\"Burger\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"654271606737143fee3dad4.jpg\",\"item_gst\":11}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"now\",\"time_slot\":\"no\",\"remark\":\"\"}]', 200.00, 364.00, 44.00, 105.00, 0.00, 0.00, 364.00, 'cash', '2020-11-15 17:42:21', '2020-11-15 00:00:00', 'placed', 0, NULL),
(2, 8, '[{\"item_id\":2,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"816801606737121bb5fb42c.jpg\",\"item_gst\":11}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"later\",\"time_slot\":\"09:00 TO 10:00\",\"remark\":\"\"}]', 100.00, 231.00, 11.00, 105.00, 0.00, 0.00, 231.00, 'cash', '2020-12-14 17:42:44', '2020-12-14 17:42:44', 'placed', 3, NULL),
(3, 8, '[{\"item_id\":2,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"816801606737121bb5fb42c.jpg\",\"item_gst\":11}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"now\",\"time_slot\":\"no\",\"remark\":\"\"}]', 100.00, 231.00, 11.00, 105.00, 0.00, 0.00, 231.00, 'online', '2020-12-14 17:42:44', '2020-12-14 00:00:00', 'placed', 3, NULL),
(4, 8, '[{\"item_id\":2,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"816801606737121bb5fb42c.jpg\",\"item_gst\":11},{\"item_id\":3,\"item_name\":\"Burger\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"654271606737143fee3dad4.jpg\",\"item_gst\":11}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"now\",\"time_slot\":\"no\",\"remark\":\"\"}]', 200.00, 364.00, 44.00, 105.00, 0.00, 0.00, 364.00, 'cash', '2020-11-30 17:42:21', '2020-11-30 00:00:00', 'placed', 0, NULL),
(5, 8, '[{\"item_id\":2,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"816801606737121bb5fb42c.jpg\",\"item_gst\":11},{\"item_id\":3,\"item_name\":\"Burger\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"654271606737143fee3dad4.jpg\",\"item_gst\":11}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"now\",\"time_slot\":\"no\",\"remark\":\"\"}]', 200.00, 364.00, 44.00, 105.00, 0.00, 0.00, 364.00, 'cash', '2020-11-17 17:42:21', '2020-11-17 00:00:00', 'placed', 3, NULL),
(6, 8, '[{\"item_id\":17,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"449031609320678f06373e2.jpg\",\"item_gst\":11,\"unit_qty\":\"1 pcs\"},{\"item_id\":15,\"item_name\":\"Pizza\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"449031609320678f06373e2.jpg\",\"item_gst\":11,\"unit_qty\":\"1 pcs\"}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"later\",\"time_slot\":\"17:00 TO 18:00\",\"remark\":\"\"}]', 520.00, 885.44, 245.44, 105.00, 0.00, 0.00, 885.44, 'cash', '2021-01-12 15:04:44', '2021-01-12 00:00:00', 'placed', 3, NULL),
(7, 8, '[{\"item_id\":17,\"item_name\":\"Nudels\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"449031609320678f06373e2.jpg\",\"item_gst\":11,\"unit_qty\":\"1 pcs\"},{\"item_id\":15,\"item_name\":\"Pizza\",\"item_qty\":1,\"item_price\":100,\"item_img\":\"449031609320678f06373e2.jpg\",\"item_gst\":11,\"unit_qty\":\"1 pcs\"}]', '[{\"name\":\"vivek\",\"mobile_no\":\"7067428075\",\"address\":\"Panager Barouda, Jabalpur, Madhya Pradesh 487661, India\",\"delivery_type\":\"later\",\"time_slot\":\"17:00 TO 18:00\",\"remark\":\"\"}]', 520.00, 885.44, 245.44, 105.00, 0.00, 0.00, 885.44, 'cash', '2021-01-12 15:04:44', '2021-01-12 00:00:00', 'canceled', 3, NULL),
(10, NULL, '[{\"item_id\":16,\"item_name\":\"Pizza\",\"item_qty\":\"1\",\"item_price\":\"60\",\"total_amount\":\"60\"}]', '', 60.96, 60.96, 0.96, 0.00, NULL, 0.00, 60.96, 'cash', '2021-02-21 22:51:40', '0000-00-00 00:00:00', 'completed', 0, NULL),
(11, NULL, '[{\"item_id\":15,\"item_name\":\"Pizza\",\"item_qty\":\"1\",\"item_price\":\"100\",\"total_amount\":\"100\"},{\"item_id\":16,\"item_name\":\"Pizza\",\"item_qty\":\"1\",\"item_price\":\"60\",\"total_amount\":\"60\"}]', '', 171.96, 171.96, 11.96, 0.00, NULL, 0.00, 171.96, 'cash', '2021-02-21 22:59:39', '0000-00-00 00:00:00', 'completed', 0, NULL),
(12, NULL, '[{\"item_id\":16,\"item_name\":\"Pizza\",\"item_qty\":\"4\",\"item_price\":\"60\",\"total_amount\":\"60\"},{\"item_id\":22,\"item_name\":\"Pizza\",\"item_qty\":\"1\",\"item_price\":\"60\",\"total_amount\":\"60\"}]', '', 121.92, 121.92, 1.92, 0.00, NULL, 0.00, 121.92, 'cash', '2021-02-22 12:57:37', '0000-00-00 00:00:00', 'completed', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outlet_details`
--

CREATE TABLE `outlet_details` (
  `outlet_id` int(11) NOT NULL,
  `outlet_name` varchar(150) NOT NULL,
  `outlet_image` varchar(300) NOT NULL DEFAULT 'outlet.png',
  `capacity` int(11) NOT NULL,
  `no_of_table` int(11) NOT NULL,
  `no_of_hall` int(11) NOT NULL,
  `hall_capacity` int(11) NOT NULL,
  `outlet_address` varchar(200) NOT NULL,
  `land_mark` int(11) NOT NULL,
  `outlet_letitude` int(11) NOT NULL,
  `outlet_longitude` int(11) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `states` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `outlet_tax` int(11) NOT NULL,
  `food_type` varchar(30) NOT NULL,
  `outlet_type` varchar(20) NOT NULL,
  `branch_root` int(11) NOT NULL,
  `outlet_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outlet_details`
--

INSERT INTO `outlet_details` (`outlet_id`, `outlet_name`, `outlet_image`, `capacity`, `no_of_table`, `no_of_hall`, `hall_capacity`, `outlet_address`, `land_mark`, `outlet_letitude`, `outlet_longitude`, `zip_code`, `country`, `states`, `city`, `outlet_tax`, `food_type`, `outlet_type`, `branch_root`, `outlet_status`) VALUES
(1, 'Milan Restorent', 'outlet.png', 50, 40, 5, 40, 'test', 0, 12345, 12345, 45, 'bhopal', 'mp', 'India', 40, 'weg', 'outlet', 0, 'active'),
(2, 'Sagar Gaire', 'outlet.png', 40, 40, 5, 50, 'test', 12345, 12345, 12345, 50, 'bhopal', 'mp', 'India', 22, 'weg', 'outlet', 0, 'active'),
(3, 'sagar Branch 1', 'outlet.png', 40, 0, 0, 0, 'test', 0, 12345, 12345, 14, 'bhopal', 'mp', 'India', 10, 'weg', 'branch', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `credit` float(8,2) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_note` text NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transction_id` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_create_at` datetime NOT NULL,
  `payment_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `vendor_id`, `order_id`, `amount`, `credit`, `payment_method`, `payment_note`, `payment_type`, `transction_id`, `payment_status`, `payment_create_at`, `payment_updated_at`) VALUES
(9, 0, 0, 0.00, 0.00, 1, 'payment done', 'new', 0, 'failed', '2021-07-03 15:32:33', '0000-00-00 00:00:00'),
(10, 0, 1, 2.00, 0.00, 5, 'payment done', 'refund', 2, 'successfull', '2021-07-03 15:33:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_name`) VALUES
(2, 'internet Banking\r\n'),
(4, 'phonepe'),
(5, 'upi\r\n\r\n'),
(6, 'Phonepe'),
(7, 'Gpay'),
(8, 'upi1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_current_no` varchar(50) NOT NULL,
  `product_vanity_no` text NOT NULL,
  `product_rate` float(8,2) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_rate` float(8,2) NOT NULL,
  `current_number` varchar(50) DEFAULT NULL,
  `product_cod_available` varchar(50) NOT NULL,
  `discount_percentage` float(5,1) NOT NULL,
  `flat_discount` float(5,1) NOT NULL,
  `product_create_at` datetime NOT NULL,
  `product_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `sub_category_id`, `product_type_id`, `product_type`, `product_current_no`, `product_vanity_no`, `product_rate`, `vendor_id`, `vendor_rate`, `current_number`, `product_cod_available`, `discount_percentage`, `flat_discount`, `product_create_at`, `product_updated_at`) VALUES
(6, 6, 0, 2, 'onsale', '9595959', '9554118595', 2000.00, 4, 1000.00, 'Postpaid', '', 2.0, 200.0, '2021-07-05 00:47:16', '2021-07-14 14:54:49'),
(12, 12, 1, 5, '1', '11111', '545454545454', 2000.00, 2, 1000.00, 'Prepaid', 'Yes', 1.0, 50.0, '2021-07-10 17:37:34', '2021-07-10 18:08:30'),
(13, 13, 1, 1, 'xyz', '222', '8269763363', 2000.00, 2, 1800.00, 'Postpaid', 'No', 10.0, 1.0, '2021-07-12 17:14:36', '2021-07-13 13:27:11'),
(14, 6, 1, 2, 'adddddd', '5555', '9554118595', 1050.00, 15, 800.00, 'Postpaid', 'Yes', 2.0, 2.0, '2021-07-13 14:41:08', '0000-00-00 00:00:00'),
(16, 14, 6, 4, 'new', '99999', '6666666688                                   ', 5000.00, 4, 3000.00, 'Postpaid', 'Yes', 2.0, 0.0, '2021-07-16 15:38:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_log`
--

CREATE TABLE `product_log` (
  `product_log_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `change_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_log`
--

INSERT INTO `product_log` (`product_log_id`, `product_id`, `user_id`, `change_description`) VALUES
(1, 1, 1, 'a to z\r\n'),
(2, 5, 5, 'z To a');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(200) NOT NULL,
  `product_type_create_at` datetime DEFAULT NULL,
  `product_type_updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`, `product_type_create_at`, `product_type_updated_at`) VALUES
(1, 'jio', '2021-06-15 17:05:00', NULL),
(2, 'vodafone\r\n', '2021-06-01 17:05:05', NULL),
(4, 'Idea', '2021-06-29 17:31:28', NULL),
(5, 'BSNL', '2021-06-29 17:31:40', NULL),
(6, 'Airtel', '2021-06-29 17:32:04', NULL),
(8, 'uninor', '2021-07-13 13:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_type`
--

CREATE TABLE `profile_type` (
  `profile_type_id` int(11) NOT NULL,
  `profile_type_name` varchar(200) NOT NULL,
  `profile_type_create_at` datetime DEFAULT NULL,
  `profile_type_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_type`
--

INSERT INTO `profile_type` (`profile_type_id`, `profile_type_name`, `profile_type_create_at`, `profile_type_updated`) VALUES
(1, 'admin', '2021-06-10 16:06:13', NULL),
(2, 'data entry\r\n', '2021-06-08 16:06:18', NULL),
(4, 'sale', '2021-06-29 16:48:02', '2021-06-29 16:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_detail`
--

CREATE TABLE `recharge_detail` (
  `recharge_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `recharge_amount` float(8,2) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recharge_date` datetime NOT NULL,
  `payment_id` varchar(250) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recharge_detail`
--

INSERT INTO `recharge_detail` (`recharge_id`, `customer_id`, `recharge_amount`, `user_id`, `recharge_date`, `payment_id`, `type`) VALUES
(1, 2, 100.00, NULL, '2020-09-11 22:35:55', '123', 'upi'),
(2, 2, 100.00, NULL, '2020-09-11 22:51:51', '123', 'upi');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(10) UNSIGNED NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `online_order_id` int(11) NOT NULL,
  `biller_id` int(11) DEFAULT NULL,
  `item` int(11) NOT NULL,
  `total_qty` double NOT NULL,
  `total_discount` double NOT NULL,
  `total_tax` double NOT NULL,
  `total_price` double NOT NULL,
  `grand_total` double NOT NULL,
  `order_tax_rate` double DEFAULT NULL,
  `order_tax` double DEFAULT NULL,
  `order_discount` double DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `shipping_cost` double DEFAULT NULL,
  `sale_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `return_amount` float(8,2) NOT NULL,
  `credit_amount` float(8,2) NOT NULL,
  `sale_to` int(11) NOT NULL DEFAULT 1,
  `sale_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `reference_no`, `user_id`, `customer_id`, `online_order_id`, `biller_id`, `item`, `total_qty`, `total_discount`, `total_tax`, `total_price`, `grand_total`, `order_tax_rate`, `order_tax`, `order_discount`, `coupon_id`, `coupon_discount`, `shipping_cost`, `sale_status`, `payment_status`, `document`, `paid_amount`, `return_amount`, `credit_amount`, `sale_to`, `sale_note`, `staff_note`, `created_at`, `updated_at`) VALUES
(1, '', 3, 1, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:07:47', '2021-05-24 09:07:47'),
(2, '', 3, 2, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:07:51', '2021-05-24 09:07:51'),
(3, '', 3, 2, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:07:51', '2021-05-24 09:07:51'),
(4, '', 3, 7, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:08:00', '2021-05-24 09:08:00'),
(5, '', 3, 4, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:08:01', '2021-05-24 09:08:01'),
(6, '', 5, 4, 1, 0, 1, 3, 0, 1.3, 259.7, 261, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:08:01', '2021-05-24 09:08:01'),
(7, '', 3, 4, 1, 0, 1, 3, 0, 1.3, 260, 262.61, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 262.61, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:44:37', '2021-05-24 09:44:37'),
(8, '', 6, 9, 1, 0, 1, 3, 0, 1.3, 260, 262.61, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 262.61, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:44:38', '2021-05-24 09:44:38'),
(9, '', 3, 9, 1, 0, 1, 3, 0, 1.3, 260, 261.3, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:46:54', '2021-05-24 09:46:54'),
(10, '', 3, 2, 1, 0, 1, 3, 0, 1.3, 260, 261.3, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:46:54', '2021-05-24 09:46:54'),
(11, '', 3, 2, 1, 0, 1, 3, 0, 1.3, 260, 261.3, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:46:55', '2021-05-24 09:46:55'),
(12, '', 7, 2, 1, 0, 1, 3, 0, 1.3, 260, 261.3, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:50:43', '2021-05-24 09:50:43'),
(13, '', 3, 5, 1, 0, 1, 3, 0, 1.3, 260, 261.3, NULL, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:51:22', '2021-05-24 09:51:22'),
(14, '', 3, 5, 1, 0, 1, 3, 0, 1.3, 260, 261.3, 0, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-24 09:52:37', '2021-05-24 09:52:37'),
(15, '', 3, 6, 1, 0, 1, 3, 0, 1.3, 260, 261.3, 0, 0, 5, 0, 0, 0, 0, 0, '0', NULL, 0.00, 0.00, 1, '0', '0', '2021-05-24 10:27:47', '2021-05-24 10:27:47'),
(16, '', 3, 5, 1, 0, 1, 4, 0, 1.6, 320, 321.6, 0, 0, 5, 0, 0, 0, 1, 1, '0', 321.6, 0.00, 0.00, 1, '0', '0', '2021-05-27 08:08:29', '2021-05-27 08:08:29'),
(17, '', 3, 18, 1, 0, 1, 5, 0, 7.6, 379.7, 387.3, 0, 0, 5, 0, 0, 0, 1, 1, '0', 387.3, 0.00, 0.00, 1, '0', '0', '2021-05-27 09:56:08', '2021-05-27 09:56:08'),
(18, '', 3, 7, 1, 0, 1, 3, 0, 1.3, 260, 261.3, 0, 0, 5, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-05-27 09:59:39', '2021-05-27 09:59:39'),
(19, '', 3, 17, 1, 0, 1, 5, 0, 1.9, 379.7, 381.6, 0, 0, 5, 0, 0, 0, 1, 1, '0', 381.6, 0.00, 0.00, 1, '0', '0', '2021-05-27 10:08:07', '2021-05-27 10:08:07'),
(20, '', 3, 17, 4, 0, 1, 5, 0, 1.9, 379.7, 381.6, 0, 0, 5, 0, 0, 0, 1, 1, '0', 381.6, 0.00, 0.00, 1, '0', '0', '2021-05-27 10:07:25', '2021-05-27 10:07:25'),
(21, '', 3, 8, 1, 0, 1, 110, 0, 130, 160, 7130, 0, 0, 5, 0, 0, 0, 1, 1, '0', 7130, 0.00, 0.00, 1, '0', '0', '2021-05-30 13:53:24', '2021-05-30 13:53:24'),
(22, '', 3, 17, 1, 0, 1, 30, 0, 163, 220, 2363, 0, 0, 5, 0, 0, 0, 1, 1, '0', 2363, 0.00, 0.00, 1, '0', '0', '2021-05-30 13:55:42', '2021-05-30 13:55:42'),
(23, '', 3, 18, 1, 0, 1, 3, 0, 1.3, 259.7, 247.95, 0, 0, 13.05, 0, 0, 0, 1, 1, '0', 247.95, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:00:43', '2021-06-08 09:00:43'),
(24, '', 3, 18, 1, 0, 1, 3, 0, 1.3, 260, 235.17, 0, 0, 26.13, 0, 0, 0, 1, 1, '0', 235.17, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:02:40', '2021-06-08 09:02:40'),
(25, '', 3, 18, 1, 0, 1, 3, 0, 1.3, 260, 235.17, 0, 0, 26.13, 0, 0, 0, 1, 1, '0', 235.17, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:08:07', '2021-06-08 09:08:07'),
(26, '', 3, 18, 1, 0, 1, 3, 0, 1.3, 260, 235.17, 0, 0, 26.13, 0, 0, 0, 1, 1, '0', 235.17, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:08:38', '2021-06-08 09:08:38'),
(27, '', 3, NULL, 1, 0, 1, 3, 0, 6.8, 219.7, 226.5, 0, 0, 0, 0, 0, 0, 1, 1, '0', 226.5, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:10:04', '2021-06-08 09:10:04'),
(28, '', 3, NULL, 1, 0, 1, 2, 0, 0.8, 160, 160.8, 0, 0, 0, 0, 0, 0, 1, 1, '0', 160.8, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:10:52', '2021-06-08 09:10:52'),
(29, '', 3, NULL, 1, 0, 1, 3, 0, 1.3, 260, 261.3, 0, 0, 0, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-06-08 09:11:53', '2021-06-08 09:11:53'),
(30, '', 3, 21, 1, 0, 1, 3, 0, 1.3, 260, 274.37, 5, 13.06, 0, 0, 0, 0, 1, 1, '0', 274.37, 0.00, 0.00, 1, '0', '0', '2021-06-08 11:06:04', '2021-06-08 11:06:04'),
(31, '', 3, NULL, 1, 0, 1, 3, 0, 0.8, 360, 425.74, 18, 64.94, 0, 0, 0, 0, 1, 1, '0', 425.74, 0.00, 0.00, 3, '0', '0', '2021-06-08 11:07:50', '2021-06-08 11:07:50'),
(32, '', 3, 18, 1, 0, 1, 2, 10, 6.3, 119.7, 110.78, 0.5, 0.58, 5.8, 0, 0, 0, 1, 1, '0', 110.78, 0.00, 0.00, 1, '0', '0', '2021-06-10 16:25:43', '2021-06-10 16:25:43'),
(33, '', 3, NULL, 1, 0, 1, 3, 0, 6.8, 219.7, 226.5, 0, 0, 5, 0, 0, 0, 0, 0, '0', NULL, 0.00, 0.00, 1, '0', '0', '2021-06-10 16:26:27', '2021-06-10 16:26:27'),
(34, '', 2, NULL, 1, 0, 1, 3, 0, 1.3, 260, 261.3, 0, 0, 0, 0, 0, 0, 1, 1, '0', 261.3, 0.00, 0.00, 1, '0', '0', '2021-06-11 12:35:15', '2021-06-11 12:35:15'),
(35, '', 5, NULL, 1, 0, 1, 4, 0, 7.3, 319.7, 327, 0, 0, 0, 0, 0, 0, 1, 1, '0', 327, 0.00, 0.00, 1, '0', '0', '2021-06-11 12:35:53', '2021-06-11 12:35:53'),
(36, '', 2, NULL, 1, 0, 1, 3, 0, 6.8, 220, 226.8, 0, 0, 5, 0, 0, 0, 0, 0, '0', NULL, 0.00, 0.00, 1, '0', '0', '2021-06-11 12:36:29', '2021-06-11 12:36:29'),
(37, '', 2, NULL, 2, 0, 1, 3, 0, 26, 260, 286, 0, 0, 0, 0, 0, 0, 1, 1, '0', 286, 0.00, 0.00, 1, '0', '0', '2021-06-11 12:46:41', '2021-06-11 12:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `service_area_code`
--

CREATE TABLE `service_area_code` (
  `service_area_id` int(11) NOT NULL,
  `service_area_name` varchar(150) NOT NULL,
  `service_area_code` varchar(50) NOT NULL,
  `expiry_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_area_code`
--

INSERT INTO `service_area_code` (`service_area_id`, `service_area_name`, `service_area_code`, `expiry_date`) VALUES
(2, 'punjab', 'A', 4),
(3, 'punjab', 'A', 48),
(4, 'Goa', 'G', 80);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `service_provider_id` int(11) NOT NULL,
  `service_provider_name` varchar(150) NOT NULL,
  `service_provider_code` varchar(50) NOT NULL,
  `service_provider_create_at` datetime NOT NULL,
  `service_provider_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`service_provider_id`, `service_provider_name`, `service_provider_code`, `service_provider_create_at`, `service_provider_updated_at`) VALUES
(1, 'airtel', 'B', '2021-07-14 15:36:31', '2021-07-14 15:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `staff_member`
--

CREATE TABLE `staff_member` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `outlet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_member`
--

INSERT INTO `staff_member` (`staff_id`, `name`, `email_address`, `mobile_no`, `user_name`, `user_password`, `user_status`, `role`, `outlet_id`) VALUES
(1, 'vivek', 'verify@gmail.com', 11111111, 'vivek', '12345', 'active', 'master admin', NULL),
(2, 'Lucky', 'lucky@gmail.com', 0, 'Lucky', 'Lucky@123', 'active', 'master admin', NULL),
(3, 'Aayush', 'ackkotechnosoft@gmail.com', 1231231233, 'aayush', '12345', 'active', 'delivery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(300) NOT NULL,
  `sub_category_desc` text NOT NULL,
  `sub_category_img` varchar(300) NOT NULL,
  `sub_category_create_at` datetime NOT NULL,
  `sub_category_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_desc`, `sub_category_img`, `sub_category_create_at`, `sub_category_updated_at`) VALUES
(1, 1, 'Octa Number', 'apple apple apple', '5537816256404443052fbbd.jpg', '2021-06-24 08:33:46', '2021-07-09 14:15:22'),
(3, 1, 'mirror number', 'mirror number description', '', '2021-07-09 14:18:51', '2021-07-09 14:23:36'),
(4, 11, 'tetra number', 'tetra number', '', '2021-07-09 14:43:35', '0000-00-00 00:00:00'),
(6, 5, 'xyz', 'xyz', '', '2021-07-12 17:11:29', '0000-00-00 00:00:00'),
(8, 5, 'mirror number', '', '', '2021-07-13 14:49:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `kot_id` int(11) DEFAULT NULL,
  `transaction_amount` float(8,1) NOT NULL,
  `ledger` float(8,1) DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `payment_id` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `online_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_id`, `bill_id`, `customer_id`, `vendor_id`, `kot_id`, `transaction_amount`, `ledger`, `transaction_date`, `payment_id`, `type`, `online_order_id`) VALUES
(1, 0, 8, 0, NULL, 0.0, NULL, '2020-12-14 15:55:47', '', 'cash', 3),
(2, 0, 8, 0, NULL, 0.0, NULL, '2020-12-14 16:02:47', '', 'cash', 3),
(3, 0, 8, 0, NULL, 231.0, NULL, '2020-12-14 16:27:01', '', 'cash', 3),
(4, 0, 8, 0, NULL, 231.0, NULL, '2020-12-14 16:30:54', '', 'online', 3),
(5, 0, 8, 0, NULL, 231.0, NULL, '2020-12-14 16:30:54', '', 'online', 3),
(6, 0, NULL, 0, NULL, 61.0, NULL, '2021-02-21 22:51:40', '', 'cash', 10),
(7, 0, NULL, 0, NULL, 172.0, NULL, '2021-02-21 22:59:39', '', 'cash', 11),
(8, 0, NULL, 0, NULL, 121.9, NULL, '2021-02-22 12:57:37', '', 'cash', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `like_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_like` int(11) NOT NULL,
  `user_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`like_id`, `product_id`, `user_like`, `user_view`) VALUES
(1, 5, 100, 500),
(2, 6, 200, 600);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `staff_id` int(11) NOT NULL,
  `dashboard` varchar(10) DEFAULT 'no',
  `track_location` varchar(10) DEFAULT 'no',
  `create_users` varchar(10) DEFAULT 'no',
  `restorent` varchar(10) NOT NULL,
  `restorent_list` varchar(10) NOT NULL,
  `add_branch` varchar(10) NOT NULL,
  `orders` varchar(10) NOT NULL,
  `pending_orders` varchar(10) NOT NULL,
  `placed_orders` varchar(10) NOT NULL,
  `dispatch_orders` varchar(10) NOT NULL,
  `delivered_orders` varchar(10) NOT NULL,
  `cancel_orders` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`staff_id`, `dashboard`, `track_location`, `create_users`, `restorent`, `restorent_list`, `add_branch`, `orders`, `pending_orders`, `placed_orders`, `dispatch_orders`, `delivered_orders`, `cancel_orders`) VALUES
(1, 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),
(2, 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', ''),
(4, 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', ''),
(5, 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', ''),
(6, 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_nickname` varchar(200) NOT NULL,
  `vendor_img` varchar(200) NOT NULL,
  `vendor_email_id` varchar(100) NOT NULL,
  `vendor_password` varchar(100) NOT NULL,
  `vendor_address` varchar(300) NOT NULL,
  `vendor_area` text NOT NULL,
  `vendor_mobile` bigint(20) NOT NULL,
  `vendor_website` varchar(150) NOT NULL,
  `vendor_paytm_number` varchar(150) NOT NULL,
  `vendor_gpay_number` varchar(150) NOT NULL,
  `vendor_bank_name` varchar(100) NOT NULL,
  `vendor_account_name` varchar(150) NOT NULL,
  `vendor_account_number` varchar(150) NOT NULL,
  `vendor_branch_location` varchar(50) NOT NULL,
  `vendor_ifsc_code` varchar(100) NOT NULL,
  `vendor_priority` varchar(150) NOT NULL,
  `vendor_register` varchar(20) NOT NULL,
  `cod_available` varchar(20) NOT NULL,
  `vendor_adhar_img` varchar(200) NOT NULL,
  `vendor_create_at` datetime DEFAULT NULL,
  `vendor_updated_at` datetime DEFAULT NULL,
  `vendor_status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_nickname`, `vendor_img`, `vendor_email_id`, `vendor_password`, `vendor_address`, `vendor_area`, `vendor_mobile`, `vendor_website`, `vendor_paytm_number`, `vendor_gpay_number`, `vendor_bank_name`, `vendor_account_name`, `vendor_account_number`, `vendor_branch_location`, `vendor_ifsc_code`, `vendor_priority`, `vendor_register`, `cod_available`, `vendor_adhar_img`, `vendor_create_at`, `vendor_updated_at`, `vendor_status`) VALUES
(2, 'sonu', 'rahul', '77049162591384308ca515f.png', 'sonu@gmail.com', 'ravi@123', ' bhopal', 'mp nagar', 6268993624, 'ravi.com', '6268993624', '6268993624', 'punjab national bank', '1111', '36526588452523', 'mp nagar', 'pub8873', 'first', 'Yes', 'Yes', 'ravi.jpeg', '2021-07-13 12:50:05', NULL, 'active'),
(4, 'raj', 'kunal', '992941626160832059f5bc2.png', 'raj@gmail.com', '123456666', 'bhopal', 'bhopal', 18595, 'rohit.com', '956652265', '95888666', 'hdfc bank', 'rohit kumar', '363285956665', 'indrapuri', 'hdfc02222', 'first', 'No', 'Yes', 'rohit.img', '2021-07-13 13:03:49', NULL, 'active'),
(9, 'kunal', 'rahul', '70764162616221363c12802.jpg', 'sonu@gmail.com', 'ravi@123', ' bhopal', 'mp nagar', 6268993624, 'ravi.com', '6268993624', '6268993624', 'punjab national bank', '1111', '36526588452523', 'mp nagar', 'pub8873', 'first', '', '', 'ravi.jpeg', '2021-07-13 13:13:36', NULL, 'active'),
(15, 'Aayush', 'Aayush`', '59486162616218608df65df.jpg', 'xyz@gmail.com', '12345', 'xyz', 'xzy', 826976363, 'www.xyz.com', '8269763363', '8269763363', 'sbi', 'Aayush', '900710110002194', 'bhopal', 'sbin00500', '5', 'Yes', 'Yes', '2003232', '2021-07-13 17:15:40', NULL, 'active'),
(16, 'rohit ', 'rohit', '853321626160764bc269abf.png', 'rohit@gmail.com', '12345', 'bhopal', 'indrapuri', 96969696, 'rohit.com', '959595956', '656566565', 'hdfc', 'rohit kumar', '2536363236522', 'bhopal', 'hdfc02222', '1', 'Yes', 'Yes', '2003232', '2021-07-13 12:49:44', NULL, 'active'),
(17, 'rahul', 'rocky', '341921626163548b60ce947.jpg', 'rahul@gmail.com', '123654', 'bhopal', 'indrapuri', 1111111111, 'rahul.com', '222222222', '222222222222222', 'sbi ', 'rahul singh', '989898989898', 'bhopal', 'sbin00500', '7', 'Yes', 'Yes', 'rohit.img', '2021-07-13 13:37:31', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_current_balance`
--

CREATE TABLE `vendor_current_balance` (
  `vendor_current_balance_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_avl_balance` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_current_balance`
--

INSERT INTO `vendor_current_balance` (`vendor_current_balance_id`, `vendor_id`, `vendor_avl_balance`) VALUES
(1, 1, 5000.00),
(2, 2, 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_priority`
--

CREATE TABLE `vendor_priority` (
  `vendor_priority_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `priority_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_priority`
--

INSERT INTO `vendor_priority` (`vendor_priority_id`, `vendor_id`, `priority`, `priority_limit`) VALUES
(1, 2, 10, 20),
(2, 4, 2, 20),
(3, 9, 10, 20),
(4, 2, 2, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_logo`
--
ALTER TABLE `client_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`commission_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `profile_type_id` (`profile_type_id`);

--
-- Indexes for table `enquires`
--
ALTER TABLE `enquires`
  ADD PRIMARY KEY (`enquires_id`);

--
-- Indexes for table `online_orders`
--
ALTER TABLE `online_orders`
  ADD PRIMARY KEY (`online_order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `outlet_details`
--
ALTER TABLE `outlet_details`
  ADD PRIMARY KEY (`outlet_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_log`
--
ALTER TABLE `product_log`
  ADD PRIMARY KEY (`product_log_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `profile_type`
--
ALTER TABLE `profile_type`
  ADD PRIMARY KEY (`profile_type_id`);

--
-- Indexes for table `recharge_detail`
--
ALTER TABLE `recharge_detail`
  ADD PRIMARY KEY (`recharge_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `service_area_code`
--
ALTER TABLE `service_area_code`
  ADD PRIMARY KEY (`service_area_id`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`service_provider_id`);

--
-- Indexes for table `staff_member`
--
ALTER TABLE `staff_member`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `online_order_id` (`online_order_id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_current_balance`
--
ALTER TABLE `vendor_current_balance`
  ADD PRIMARY KEY (`vendor_current_balance_id`);

--
-- Indexes for table `vendor_priority`
--
ALTER TABLE `vendor_priority`
  ADD PRIMARY KEY (`vendor_priority_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `client_logo`
--
ALTER TABLE `client_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `commission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquires`
--
ALTER TABLE `enquires`
  MODIFY `enquires_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_orders`
--
ALTER TABLE `online_orders`
  MODIFY `online_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `outlet_details`
--
ALTER TABLE `outlet_details`
  MODIFY `outlet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_log`
--
ALTER TABLE `product_log`
  MODIFY `product_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile_type`
--
ALTER TABLE `profile_type`
  MODIFY `profile_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recharge_detail`
--
ALTER TABLE `recharge_detail`
  MODIFY `recharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `service_area_code`
--
ALTER TABLE `service_area_code`
  MODIFY `service_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_member`
--
ALTER TABLE `staff_member`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_likes`
--
ALTER TABLE `user_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendor_current_balance`
--
ALTER TABLE `vendor_current_balance`
  MODIFY `vendor_current_balance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_priority`
--
ALTER TABLE `vendor_priority`
  MODIFY `vendor_priority_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`profile_type_id`) REFERENCES `profile_type` (`profile_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
