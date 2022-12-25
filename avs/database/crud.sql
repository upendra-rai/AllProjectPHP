-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 02:50 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `sr_no` int(11) NOT NULL,
  `about` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`sr_no`, `about`, `des`, `about_image`) VALUES
(7, 'Prime Technologies LLP is a technology company providing services to startups & enterprises. Established in 2021.', 'it is headquartered at Bhopal in Central India and catering to clients in India. We have an excellent team of technology and project management specialists and have working with some of the repudiated names in the business world. Customers choose us for o', '63916172638029572d1a9.jpg'),
(8, 'What Is a Market?', 'A market is a place where two parties can gather to facilitate the exchange of goods and services. The parties involved are usually buyers and sellers. The market may be physical like a retail outlet, where people meet face-to-face, or virtual like an onl', '980991617258379cf9eb87c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `atm_card`
--

CREATE TABLE `atm_card` (
  `sr_no` int(11) NOT NULL,
  `atm_no` int(11) NOT NULL,
  `atm_status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atm_card`
--

INSERT INTO `atm_card` (`sr_no`, `atm_no`, `atm_status`, `customer_name`, `assign_date`) VALUES
(1, 1234566541, 'active', 'rohit', '2021-03-08'),
(2, 123, 'blocked', 'mohit', '2021-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `sr_no` int(11) NOT NULL,
  `blog_image` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`sr_no`, `blog_image`, `date`, `des`) VALUES
(1, '427811617188053b7deff7e.jpeg', '2013-03-01', 'Et repellendus molestiae qui est sed omnis voluptates magnam abc cbdkufhkhjsdkhjdkfhiuhgfkuhkdfjh'),
(10, '5780716171828811ae02b59.jpg', '0000-00-00', 'qq'),
(12, '724561617184680fdb1253f.png', '0000-00-00', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `sub_category` int(100) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`sr_no`, `image`, `category_name`, `sub_category`, `status`) VALUES
(1, 'pizza.jpg', 'tomato', 3, 'active'),
(2, 'burger.jpg', 'grocer', 2, 'active'),
(4, 'menu-burger.jpg', 'Electricity', 6, 'active'),
(5, 'menu-momo.jpg', 'Grocer', 2, 'inactive'),
(6, 'menu-pizza.jpg', 'Electricity', 8, 'active'),
(28, 'momo.jpg', 'Grocer', 8, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_repot`
--

CREATE TABLE `customer_repot` (
  `sr_no` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `mobile_no` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `colony` varchar(255) NOT NULL,
  `balance` int(150) NOT NULL,
  `delivery_type` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_repot`
--

INSERT INTO `customer_repot` (`sr_no`, `customer_name`, `mobile_no`, `email_id`, `colony`, `balance`, `delivery_type`, `status`) VALUES
(1, 'rahul', '9554118595', 'abc@gmail.com', 'subash', 150, 'home', 'active'),
(2, 'raj', '9554859565', 'abdks@gmail.com', 'bagpat', 200, 'home', 'active'),
(3, 'deepak', '9554859565', 'abdks@gmail.com', 'bagpat', 200, 'home', 'active'),
(4, 'rahul', '1231231235', 'abc@gmail.com', 'mp nagar', 150, 'home', 'active'),
(5, 'rahul', '1231231234', 'abc@gmail.com', 'awadhpuri', 150, 'home', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `expainse_details`
--

CREATE TABLE `expainse_details` (
  `expanse_id` int(11) NOT NULL,
  `expanse_head_id` int(11) NOT NULL,
  `expanse_subhead_id` int(11) NOT NULL,
  `expanse_amount` float(8,2) NOT NULL,
  `expanse_note` varchar(100) NOT NULL,
  `expanse_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expanse_head`
--

CREATE TABLE `expanse_head` (
  `expanse_head_id` int(11) NOT NULL,
  `expanse_head_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expanse_head`
--

INSERT INTO `expanse_head` (`expanse_head_id`, `expanse_head_name`) VALUES
(19, 'jjjjjjj'),
(24, 'lllllllll111122'),
(25, 'lllllllll'),
(26, 'lllllllll'),
(28, 'lllllllll1'),
(29, 'lllllllll1'),
(32, 'aaaaaaasssssss'),
(33, 'll');

-- --------------------------------------------------------

--
-- Table structure for table `expanse_subhead`
--

CREATE TABLE `expanse_subhead` (
  `expanse_subhead_id` int(11) NOT NULL,
  `expanse_head_id` int(11) NOT NULL,
  `expanse_subhead_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `future`
--

CREATE TABLE `future` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `future_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `future`
--

INSERT INTO `future` (`sr_no`, `name`, `des`, `future_image`) VALUES
(1, 'Our Mission', 'AVS Prime Technologies LLP was founded by three IT Professional with zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city.', '66708161726391878ea791b.png'),
(2, 'Our Vision', 'We are unceasingly working to strengthen our technical power to meet the latest technologies & concepts with high service standards in terms of web-solutions & technology all over the world', '814741617263943d7b58e19.jpeg'),
(4, 'Our Furure Plan', 'Started our journey from web-application designing/development we are striving up to develop the high quality software solution, ERP, CRM, digital marketing solution etc.', '886901617605654a9fd7ebc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`sr_no`, `name`, `des`, `main_image`) VALUES
(4, 'We offer modern solutions for growing your business', 'We are team of professionals in technology, we work professionally with our clients and deliver the best quality products as per their needs.', '136091617304256bd663822.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `sr_no` int(11) NOT NULL,
  `blog_image` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `des` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`sr_no`, `blog_image`, `date`, `des`) VALUES
(3, 'blog-3.jpg', '2021-03-02', 'Writing a blog post is a little like driving: nothing can prepare you for ... Even a well-formatted blog post consisting solely of text is likely to s'),
(7, '841141617191744b566de05.jpeg', '2021-03-25', 'The main research published in Nature consists mostly of papers (articles or letters) in lightly edited form. They are highly technical and dense, but'),
(10, '144191617215049fd17b7a1.jpg', '2020-12-09', 'Geology is the science and study of the solid and liquid matter that constitutes the earth. The field of geology encompasses the study of the composit'),
(11, '330681617219768334d7030.jpg', '2021-02-17', 'Take the guesswork out of writing great blogs, documents, articles, and posts. Instantly Fix Hundreds Of Types Of Mistakes That Spell-Checkers Can\'t F');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_report`
--

CREATE TABLE `recharge_report` (
  `recharge_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `recharge_amount` float(8,2) NOT NULL,
  `ledger_balance` float(8,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recharge_report`
--

INSERT INTO `recharge_report` (`recharge_id`, `customer_id`, `recharge_amount`, `ledger_balance`, `user_id`) VALUES
(1, 1, 500.00, 100.00, 2),
(2, 2, 200.00, 50.00, 1),
(3, 3, 200.00, 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`sr_no`, `name`, `des`) VALUES
(3, 'Digital Marketing', 'Social Media Marketing, SEO, SEM, SMO, Google Ad words, E-Mail Marketing, PPC Campaign. We offer 360 degrees in Digital Marketing Solutions.'),
(4, 'Mobile App Development', 'We build mobile apps for Android & IOS Operating System in all kind of screen size. Our approach is to use world-class technology with global practises.'),
(5, 'Graphic Designing', 'We make excellent logos, brochures, wedding cards, marketing templates, and much more. We convert creative thoughts into creative designs.'),
(6, 'E-Commerce Development', 'We keep you equipped to develop a perfect Electronic-Store and to make your e-commerce business more custom to connect with a lot of consumers on the cloud.'),
(7, 'Business Outsourcing', 'We have a team of professionals who communicate well to the customers in support, we are strongly focused on quality and customer satisfaction in BO.');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_name`) VALUES
(1, 'Morning'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sname` varchar(120) NOT NULL,
  `saddress` varchar(200) NOT NULL,
  `sclass` int(10) NOT NULL,
  `sphone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `saddress`, `sclass`, `sphone`) VALUES
(1, 'rohit', 'bhopal', 1, '9595488695'),
(2, 'mohit', 'indore', 2, '8899556644'),
(3, 'rohit', 'bhopal', 1, '9595488695'),
(4, 'mohit', 'indore', 2, '8899556644'),
(5, 'raj', 'lucknow', 3, '7262936622'),
(6, 'kisan', 'mumbai', 5, '9554118594'),
(7, 'raj', 'lucknow', 3, '7262936622'),
(8, 'kisan', 'mumbai', 5, '9554118594');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `cid` int(11) NOT NULL,
  `cname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`cid`, `cname`) VALUES
(1, 'B.tech'),
(2, 'BCA'),
(3, 'B.tech'),
(4, 'Bsc');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `sr_no` int(30) NOT NULL,
  `team_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`sr_no`, `team_image`, `name`, `post`, `des`) VALUES
(1, '33391617264942aa605fc4.png', 'Walter White', 'Chief Executive Officer', '1Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate'),
(2, '98549161726550259803d6e.jpg', 'Sarah Jhonson', 'Product Manager', 'Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.'),
(3, '127181617265516a587d161.jpg', 'William Anderson', 'CTO', 'Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.'),
(4, '78061617265530a3c9525b.jpg', 'Amanda Jepson', 'Accountant', 'Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.'),
(10, '34194161726614605f4fe97.jpg', 'Sarah Jhonson ali', 'Product Manager', 'Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.'),
(11, '77191161730196426e0c8c2.jpg', 'Sarah Jhonson', 'Product Manager', 'Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.'),
(12, '14139161730213867dedc54.jpg', 'William Anderson', 'CTO', 'Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `sr_no` int(11) NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`sr_no`, `testimonial_image`, `name`, `post`, `des`) VALUES
(1, '357791617303534be87f1a2.jpg', 'aakriti shrivastav', 'Designer', 'A designer is a person who plans the look or workings of something prior to it being made, by preparing drawings or plans.More formally, a designer is an agent that '),
(2, '9053916173069449a4f17f2.jpeg', 'Lucky Rai', 'Developer', 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.'),
(3, '924681617304802a5c78672.jpeg', 'Govinda ', 'Developer', 'Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa'),
(4, '59751161730482413233977.jpeg', 'Oaj', 'Designer', 'Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.'),
(5, '5004116173049247e143043.jpeg', 'Rahul kumar', 'Developer', 'Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam'),
(6, '618761617305000bc7f0aa4.jpg', 'bharti kumari', 'Product Manager', 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `sr_no` int(11) NOT NULL,
  `testimonials_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testmonial`
--

CREATE TABLE `testmonial` (
  `sr_no` int(11) NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_amount` float(8,2) NOT NULL,
  `ledger_balance` float(8,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_id`, `customer_id`, `transaction_amount`, `ledger_balance`, `product_id`, `product_quantity`, `user_id`, `shift_id`, `customer_type`, `transaction_date`) VALUES
(1, 1, 58.20, 11.20, 555, 3, 1, 1, 'acite', '2021-04-06 12:05:09'),
(2, 3, 58.20, 11.20, 555, 3, 2, 2, 'acite', '2021-04-06 12:05:09'),
(3, 2, 58.20, 11.20, 555, 3, 1, 2, 'acite', '2021-04-06 12:05:09'),
(4, 1, 58.20, 11.20, 555, 3, 1, 2, 'acite', '2021-04-06 12:05:09'),
(5, 5, 58.20, 11.20, 555, 3, 2, 1, 'acite', '2021-04-06 12:05:09'),
(6, 1, 58.20, 11.20, 555, 3, 1, 2, 'acite', '2021-04-05 12:05:09'),
(7, 5, 58.20, 11.20, 555, 3, 2, 1, 'acite', '2021-04-05 12:05:09'),
(8, 5, 58.20, 11.20, 555, 3, 2, 1, 'acite', '2021-04-07 12:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `userpassword` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `userpassword`) VALUES
(1, 'admin', '12345'),
(2, 'vivek', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `sr_no` int(11) NOT NULL,
  `work_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`sr_no`, `work_image`) VALUES
(4, '111071617110419d2f5a669.jpg'),
(16, '8792616171085490e180136.png'),
(21, '525171617219741c8c0931e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `atm_card`
--
ALTER TABLE `atm_card`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `customer_repot`
--
ALTER TABLE `customer_repot`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `expainse_details`
--
ALTER TABLE `expainse_details`
  ADD PRIMARY KEY (`expanse_id`),
  ADD KEY `expanse_head_id` (`expanse_head_id`),
  ADD KEY `expanse_subhead_id` (`expanse_subhead_id`);

--
-- Indexes for table `expanse_head`
--
ALTER TABLE `expanse_head`
  ADD PRIMARY KEY (`expanse_head_id`);

--
-- Indexes for table `expanse_subhead`
--
ALTER TABLE `expanse_subhead`
  ADD PRIMARY KEY (`expanse_subhead_id`),
  ADD KEY `expanse_head_id` (`expanse_head_id`);

--
-- Indexes for table `future`
--
ALTER TABLE `future`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `recharge_report`
--
ALTER TABLE `recharge_report`
  ADD PRIMARY KEY (`recharge_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `testmonial`
--
ALTER TABLE `testmonial`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shift_id` (`shift_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `atm_card`
--
ALTER TABLE `atm_card`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer_repot`
--
ALTER TABLE `customer_repot`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expainse_details`
--
ALTER TABLE `expainse_details`
  MODIFY `expanse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expanse_head`
--
ALTER TABLE `expanse_head`
  MODIFY `expanse_head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `expanse_subhead`
--
ALTER TABLE `expanse_subhead`
  MODIFY `expanse_subhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `future`
--
ALTER TABLE `future`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `recharge_report`
--
ALTER TABLE `recharge_report`
  MODIFY `recharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `sr_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testmonial`
--
ALTER TABLE `testmonial`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expainse_details`
--
ALTER TABLE `expainse_details`
  ADD CONSTRAINT `expainse_details_ibfk_1` FOREIGN KEY (`expanse_head_id`) REFERENCES `expanse_subhead` (`expanse_head_id`),
  ADD CONSTRAINT `expainse_details_ibfk_2` FOREIGN KEY (`expanse_subhead_id`) REFERENCES `expanse_head` (`expanse_head_id`);

--
-- Constraints for table `expanse_subhead`
--
ALTER TABLE `expanse_subhead`
  ADD CONSTRAINT `expanse_subhead_ibfk_1` FOREIGN KEY (`expanse_head_id`) REFERENCES `expanse_head` (`expanse_head_id`);

--
-- Constraints for table `recharge_report`
--
ALTER TABLE `recharge_report`
  ADD CONSTRAINT `recharge_report_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_repot` (`sr_no`),
  ADD CONSTRAINT `recharge_report_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_repot` (`sr_no`),
  ADD CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`),
  ADD CONSTRAINT `transaction_details_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
